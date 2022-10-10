
# API Marketing Campaign

API para alimentar um SPA de Campanhas de Marketing



## Requerimentos

Necessário sistema operacional macOS, Linux ou Windows (via [WSL2](https://docs.microsoft.com/en-us/windows/wsl/about))


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

## Executando o projeto sem Docker

O projeto pode ser executado normalmente em qualquer sistema operacional com os seguintes pré-requisitos:

- PHP 8.*
- Composer
- MySql
- Servidor Apache ou Nginx

**Execute os seguintes comandos:**

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


**Crie um banco de dados MySql e parametrize-o no arquivo .env**



Instale as dependências

```bash
    composer install
```

Execute o servido embutido do Laravel

```bash
  php artisan serve
```



Siga a [Documentação](https://documenter.getpostman.com/view/22300616/2s83ziN4BG) alterando somente a url base para http://localhost:8000
