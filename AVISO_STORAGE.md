# ⚠️ Aviso Importante: Armazenamento de Arquivos na Railway

## O Problema

A Railway utiliza containers efêmeros. Isso significa que **arquivos enviados via upload
(imagens de produtos, logo) serão perdidos** quando o container for reiniciado ou redeploy
for feito.

## O que é afetado

- Upload de logo da loja (`/arquivos/logo/`)
- Upload de imagens de produtos (`/arquivos/produtos/`)

## Soluções Recomendadas

### Opção 1 (Recomendada): Usar Railway Volume
A Railway oferece Volumes persistentes. Para configurar:
1. No painel da Railway, vá em seu serviço
2. Clique em **"Add Volume"**
3. Monte o volume em `/var/www/html/arquivos`
4. Isso garante persistência dos uploads

### Opção 2: Usar Cloudflare R2 ou AWS S3
Para uma solução mais robusta, considere migrar os uploads para um serviço de storage
externo como Cloudflare R2 (gratuito até 10GB) ou AWS S3.

### Opção 3 (Temporária): Manter imagens no repositório Git
As imagens de produtos já incluídas no projeto (`/arquivos/produtos/`) estão no repositório
e serão mantidas. Apenas **novos uploads** serão perdidos após reinicialização.

## Solução Implementada

Os arquivos de imagem originais do projeto estão incluídos no repositório Git e serão
preservados no deploy inicial. Para novos uploads, recomenda-se configurar um Volume
na Railway conforme a Opção 1 acima.
