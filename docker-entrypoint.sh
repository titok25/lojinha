#!/bin/bash
set -e

# =============================================
# docker-entrypoint.sh - @LOJINHA Railway
# Inicializa o banco de dados automaticamente
# =============================================

echo "==> Iniciando @LOJINHA..."

# Aguarda o MySQL ficar disponível
echo "==> Aguardando banco de dados MySQL..."
MAX_TRIES=30
COUNT=0

while [ $COUNT -lt $MAX_TRIES ]; do
    if php -r "
        \$conn = @mysqli_connect(
            getenv('MYSQLHOST') ?: 'localhost',
            getenv('MYSQLUSER') ?: 'root',
            getenv('MYSQLPASSWORD') ?: '',
            getenv('MYSQLDATABASE') ?: 'lojinha',
            (int)(getenv('MYSQLPORT') ?: 3306)
        );
        exit(\$conn ? 0 : 1);
    " 2>/dev/null; then
        echo "==> Banco de dados disponível!"
        break
    fi
    COUNT=$((COUNT + 1))
    echo "==> Tentativa $COUNT/$MAX_TRIES - aguardando MySQL..."
    sleep 2
done

if [ $COUNT -eq $MAX_TRIES ]; then
    echo "==> AVISO: Não foi possível conectar ao banco de dados. Iniciando mesmo assim..."
fi

# Inicializa o banco de dados (cria tabelas se não existirem)
echo "==> Verificando/inicializando banco de dados..."
php /var/www/html/api/init_db.php 2>&1 || echo "==> Aviso: init_db.php retornou erro (pode ser normal se tabelas já existem)"

# Ajusta a porta do Apache conforme variável PORT da Railway
PORT="${PORT:-80}"
echo "==> Configurando Apache na porta $PORT..."
sed -i "s/Listen 80/Listen $PORT/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:$PORT>/" /etc/apache2/sites-available/000-default.conf

echo "==> Iniciando Apache..."
exec "$@"
