

Documentação:
    - https://documenter.getpostman.com/view/22300616/2s83ziN4BG
    

  cp .env.example .env

  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

    