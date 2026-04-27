# Guia Completo: Hospedagem na Railway e Uso do Painel Administrativo

Este documento contém todas as instruções necessárias para hospedar o projeto **@LOJINHA** na plataforma Railway e utilizar o painel administrativo de forma eficiente. O projeto foi adaptado para funcionar perfeitamente em ambientes de container (Docker) com banco de dados MySQL.

## 1. Como Hospedar na Railway

A Railway é uma plataforma moderna de hospedagem que facilita o deploy de aplicações web. O projeto já foi configurado com um `Dockerfile`, script de inicialização (`docker-entrypoint.sh`) e configurações otimizadas (`php.ini`, `.htaccess`).

### Passo a Passo para o Deploy

**Passo 1: Preparar o Repositório**
Para hospedar na Railway, o método mais fácil é através do GitHub.
1. Crie uma conta no [GitHub](https://github.com/) se não possuir.
2. Crie um novo repositório privado.
3. Faça o upload de todos os arquivos da pasta `lojinha_railway` para este repositório.

**Passo 2: Criar o Projeto na Railway**
1. Acesse [Railway.app](https://railway.app/) e faça login com sua conta do GitHub.
2. Clique em **"New Project"** (Novo Projeto).
3. Selecione **"Deploy from GitHub repo"** e escolha o repositório que você acabou de criar.
4. A Railway começará a construir a aplicação imediatamente usando o `Dockerfile` fornecido.

**Passo 3: Adicionar o Banco de Dados MySQL**
1. No painel do seu projeto na Railway, clique no botão **"New"** (ou no ícone de "+").
2. Selecione **"Database"** e depois **"Add MySQL"**.
3. Aguarde alguns segundos até que o banco de dados seja provisionado.

**Passo 4: Conectar a Aplicação ao Banco de Dados**
A mágica da Railway é que ela pode injetar as variáveis de ambiente automaticamente.
1. Clique no serviço da sua aplicação (o repositório GitHub).
2. Vá até a aba **"Variables"** (Variáveis).
3. Clique em **"Reference Variable"** e adicione as seguintes variáveis referenciando o serviço MySQL:
   - `MYSQLHOST` referenciando `MYSQLHOST`
   - `MYSQLDATABASE` referenciando `MYSQLDATABASE`
   - `MYSQLUSER` referenciando `MYSQLUSER`
   - `MYSQLPASSWORD` referenciando `MYSQLPASSWORD`
   - `MYSQLPORT` referenciando `MYSQLPORT`
4. A aplicação será reiniciada automaticamente. O script `docker-entrypoint.sh` detectará a conexão e **criará todas as tabelas do banco de dados automaticamente**.

**Passo 5: Gerar um Domínio Público**
1. Ainda no serviço da sua aplicação, vá até a aba **"Settings"** (Configurações).
2. Na seção **"Networking"**, clique em **"Generate Domain"**.
3. A Railway fornecerá uma URL pública (ex: `seu-projeto.up.railway.app`).

### ⚠️ Aviso Importante sobre Uploads de Imagens
A Railway utiliza containers efêmeros. Isso significa que arquivos enviados via upload (como novas imagens de produtos ou a logo da loja) serão perdidos quando a aplicação for reiniciada. Para resolver isso:
1. Vá nas configurações do serviço da aplicação.
2. Na seção **"Volumes"**, clique em **"Add Volume"**.
3. Defina o caminho de montagem (Mount Path) como `/var/www/html/arquivos`.
4. Isso garantirá que todas as imagens enviadas pelo painel sejam salvas permanentemente.

---

## 2. Como Usar o Painel Administrativo

O painel administrativo é o coração da sua loja virtual, permitindo gerenciar produtos, clientes, configurações de pagamento e acompanhar visitantes em tempo real.

### Primeiro Acesso e Criação do Administrador

Após o deploy bem-sucedido, o banco de dados estará vazio (sem administradores).

1. Acesse a URL do painel: `https://seu-dominio.up.railway.app/@SERVIDOR/`
2. Como não há nenhum administrador cadastrado, o sistema redirecionará automaticamente para a página de cadastro (`cadastrar.php`).
3. Preencha o formulário com um **Login** e **Senha** de sua preferência.
4. Após o cadastro, você será redirecionado para a tela de login. Insira as credenciais que acabou de criar.

### Funcionalidades do Painel

O painel é dividido em várias seções acessíveis pelo menu lateral esquerdo:

#### Dashboard (Painel Principal)
Oferece uma visão geral em tempo real da sua loja. Você pode visualizar:
- Quantidade de usuários online no momento.
- Total de cliques (acessos via mobile e desktop).
- Tentativas de acesso por bots (bloqueados automaticamente).
- Total de clientes cadastrados e Pix gerados.
- Uma lista detalhada de quem está online, mostrando em qual etapa do funil de vendas o usuário se encontra (Produto, Checkout, Endereço, Pagamento, Pix).

#### Cadastros
Lista todos os clientes que iniciaram ou concluíram o processo de compra.
- Exibe Nome, E-mail, CPF, Celular, Endereço completo e o Produto comprado.
- Permite **excluir** o registro ou **bloquear** o IP do usuário caso seja uma tentativa de fraude.

#### Produtos
Gerenciamento do catálogo da loja.
- Lista todos os produtos cadastrados com suas respectivas imagens, valores e quantidade de vendas/cliques.
- Permite excluir produtos existentes.

#### Adicionar Produto
Formulário para inclusão de novos itens no catálogo.
- Requer o preenchimento de Nome, Valor, Valor com Desconto (Oferta), e Descrição detalhada.
- Permite o upload de duas imagens: a imagem principal do produto e uma imagem secundária para a descrição.

#### Estatísticas
Apresenta gráficos e métricas detalhadas sobre o desempenho da loja, conversões e acessos por dispositivo.

#### Bloqueados
Lista todos os endereços IP que foram bloqueados manualmente por você ou automaticamente pelo sistema anti-bot. Permite desbloquear IPs caso necessário.

#### Administrador
Permite alterar a senha do administrador atual ou cadastrar novos usuários com acesso ao painel.

#### Config Pix
Configuração essencial para o recebimento de pagamentos.
- **Chave Pix:** Insira sua chave Pix (CPF, CNPJ, E-mail, Celular ou Aleatória).
- **Cidade:** Cidade do beneficiário (obrigatório para o padrão BR Code).
- **Beneficiário:** Nome do recebedor que aparecerá no aplicativo do banco do cliente.
- **Descrição:** Descrição da transferência.

#### Config Loja
Personalização visual e de contato da loja.
- **Nome da Loja:** Título que aparecerá no topo do site.
- **Cor Principal:** Cor de destaque do layout (código hexadecimal, ex: `#11ce17`).
- **Logo:** Permite fazer o upload da logomarca da loja (formato PNG).
- **WhatsApp:** Número de contato para suporte ao cliente.

#### Config Apis
Configuração de notificações automatizadas.
- Permite configurar o envio de e-mails transacionais (confirmação de pedido, aguardando pagamento) usando a biblioteca PHPMailer integrada.
- Define os textos padrão que serão enviados via WhatsApp ou E-mail para os clientes.

---

## 3. Dicas de Segurança e Manutenção

- **Proteção Anti-Bot:** O sistema possui um arquivo `.htaccess` rigoroso que bloqueia automaticamente scanners de vulnerabilidade, crawlers agressivos e ferramentas de automação. Isso economiza recursos do servidor e protege contra fraudes.
- **Sessões:** O painel administrativo possui controle de tempo de sessão. Se você ficar inativo por muito tempo, será desconectado automaticamente por segurança.
- **Backup:** A Railway realiza backups automáticos do banco de dados MySQL. Recomenda-se verificar as configurações de retenção no painel da Railway.

Desenvolvido e adaptado para ambientes modernos de nuvem.
