<?php
/**
 * init_db.php - Inicialização automática do banco de dados
 * Executado pelo docker-entrypoint.sh na Railway
 * Cria as tabelas se não existirem
 */

require_once(__DIR__ . '/db.php');

echo "Verificando estrutura do banco de dados...\n";

$tabelas_criadas = 0;
$tabelas_existentes = 0;

// Função auxiliar para criar tabela se não existir
function criarTabela($conn, $nome, $sql) {
    global $tabelas_criadas, $tabelas_existentes;
    $check = mysqli_query($conn, "SHOW TABLES LIKE '$nome'");
    if (mysqli_num_rows($check) == 0) {
        if (mysqli_query($conn, $sql)) {
            echo "  [OK] Tabela '$nome' criada.\n";
            $tabelas_criadas++;
        } else {
            echo "  [ERRO] Falha ao criar '$nome': " . mysqli_error($conn) . "\n";
        }
    } else {
        echo "  [--] Tabela '$nome' já existe.\n";
        $tabelas_existentes++;
    }
}

// Tabela: acesso (administradores)
criarTabela($conn, 'acesso', "
    CREATE TABLE `acesso` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `login` text NOT NULL,
      `senha` text NOT NULL,
      `acesso` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: apis (configurações de notificação)
criarTabela($conn, 'apis', "
    CREATE TABLE `apis` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `zap` text NOT NULL,
      `email` text NOT NULL,
      `htmlemail` text NOT NULL,
      `texto1email` text NOT NULL,
      `textozap` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: bot (IPs de bots detectados)
criarTabela($conn, 'bot', "
    CREATE TABLE `bot` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `ip` text NOT NULL,
      `useragent` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: clientes (pedidos realizados)
criarTabela($conn, 'clientes', "
    CREATE TABLE `clientes` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` text NOT NULL,
      `email` text NOT NULL,
      `cpf` text NOT NULL,
      `celular` text NOT NULL,
      `cep` text NOT NULL,
      `endereco` text NOT NULL,
      `numero` text NOT NULL,
      `bairro` text NOT NULL,
      `cidade` text NOT NULL,
      `complemento` text NOT NULL,
      `destinatario` text NOT NULL,
      `quantidade` text NOT NULL,
      `valortotal` text NOT NULL,
      `itemcomprado` text NOT NULL,
      `ip` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: config (configurações da loja)
criarTabela($conn, 'config', "
    CREATE TABLE `config` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` text NOT NULL,
      `cor` text NOT NULL,
      `img` text NOT NULL,
      `numero` text NOT NULL,
      `texto` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: desktop (visitantes desktop)
criarTabela($conn, 'desktop', "
    CREATE TABLE `desktop` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `ip` text NOT NULL,
      `useragent` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: mobile (visitantes mobile)
criarTabela($conn, 'mobile', "
    CREATE TABLE `mobile` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `ip` text NOT NULL,
      `useragent` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: online (rastreamento em tempo real)
criarTabela($conn, 'online', "
    CREATE TABLE `online` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `ip` text NOT NULL,
      `etapa` text NOT NULL,
      `time` text NOT NULL,
      `cidade` text NOT NULL,
      `estado` text NOT NULL,
      `dispositivo` text NOT NULL,
      `hora` text NOT NULL,
      `situacao` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: pix (configurações de pagamento Pix)
criarTabela($conn, 'pix', "
    CREATE TABLE `pix` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `chave` text NOT NULL,
      `cidade` text NOT NULL,
      `descricao` text NOT NULL,
      `identificador` text NOT NULL,
      `beneficiario` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: pixgerado (histórico de Pix gerados)
criarTabela($conn, 'pixgerado', "
    CREATE TABLE `pixgerado` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `ip` text NOT NULL,
      `useragent` text NOT NULL,
      `valor` text NOT NULL,
      `produto` text NOT NULL,
      `hora` text NOT NULL,
      `time` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Tabela: produto (catálogo de produtos)
criarTabela($conn, 'produto', "
    CREATE TABLE `produto` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `codigo` text NOT NULL,
      `nome` text NOT NULL,
      `valor` text NOT NULL,
      `img` text NOT NULL,
      `oferta` text NOT NULL,
      `desconto` text NOT NULL,
      `descricao` text NOT NULL,
      `venda` text NOT NULL,
      `cliques` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");

// Inserir dados iniciais se as tabelas estiverem vazias
$check_config = mysqli_query($conn, "SELECT COUNT(*) as total FROM config");
$row = mysqli_fetch_assoc($check_config);
if ($row['total'] == 0) {
    mysqli_query($conn, "INSERT INTO config (nome, cor, img, numero, texto) VALUES ('MinhaLoja', '#11ce17', 'logo-loja.png', '00000000000', 'Olá, efetuei o pagamento na loja!')");
    echo "  [OK] Configuração inicial da loja inserida.\n";
}

$check_apis = mysqli_query($conn, "SELECT COUNT(*) as total FROM apis");
$row = mysqli_fetch_assoc($check_apis);
if ($row['total'] == 0) {
    mysqli_query($conn, "INSERT INTO apis (zap, email, htmlemail, texto1email, textozap) VALUES ('', '', '<html><body><h4>Olá, \$nome</h4> total a pagar \$valores</body></html>', 'Aguardando pagamento.', 'Olá, *\$nome*! Seu pedido foi confirmado.')");
    echo "  [OK] Configuração inicial de APIs inserida.\n";
}

$check_pix = mysqli_query($conn, "SELECT COUNT(*) as total FROM pix");
$row = mysqli_fetch_assoc($check_pix);
if ($row['total'] == 0) {
    mysqli_query($conn, "INSERT INTO pix (chave, cidade, descricao, identificador, beneficiario) VALUES ('', 'SUA CIDADE', 'Descricao da Loja', '', 'NomeBeneficiario')");
    echo "  [OK] Configuração inicial de Pix inserida.\n";
}

echo "\nBanco de dados inicializado!\n";
echo "  Tabelas criadas: $tabelas_criadas\n";
echo "  Tabelas já existentes: $tabelas_existentes\n";
echo "\nAcesse o painel admin em: /\@SERVIDOR/\n";
echo "Crie seu primeiro administrador em: /\@SERVIDOR/cadastrar.php\n";
?>
