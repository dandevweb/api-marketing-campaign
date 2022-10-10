
# API Marketing Campaign

API para alimentar um SPA de Campanhas de Marketing



## Documentação

[Documentação](https://documenter.getpostman.com/view/22300616/2s83ziN4BG)




## Stack utilizada


**Back-end:** PHP 8.1, Laravel 9, JWT-auth 2.0, Laravel Sail

## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/dandevweb/api-marketing-campaign
```

Entre no diretório do projeto

```bash
  cd api-marketing-campaign
```

Crie o arquivo .env a partir do arquivo .env.example

```bash
  cp .env.example .env
```

Instale as dependências

```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Com o Docker "startado", Inicie o servidor

```bash
  ./vendor/bin/sail up -d
```

Crie um alias para facilitar os comandos do Sail

```bash
  alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```

Execute a migrações com a base populada

```bash
  sail php artisan migrate --seed
```

Execute quarquer comando dentro do container utilizando "sail". Exemplos:

```bash
  sail php down
```
```bash
  sail up -d
```
```bash
  sail php --version
```

Siga a [Documentação](https://documenter.getpostman.com/view/22300616/2s83ziN4BG)
