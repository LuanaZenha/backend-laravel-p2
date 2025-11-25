#!/usr/bin/env bash
set -euo pipefail

docker compose build
docker compose up -d

docker compose exec php bash -lc "rm -rf /tmp/laravel && composer create-project laravel/laravel:^11.0 /tmp/laravel"
docker compose exec php bash -lc "shopt -s dotglob && cp -r /tmp/laravel/* . && rm -rf /tmp/laravel"

docker compose exec php bash -lc "cp .env.example .env || true"
docker compose exec php bash -lc "sed -i 's/DB_HOST=.*/DB_HOST=mysql/' .env"
docker compose exec php bash -lc "sed -i 's/DB_PORT=.*/DB_PORT=3306/' .env"
docker compose exec php bash -lc "sed -i 's/DB_DATABASE=.*/DB_DATABASE=${DB_DATABASE:-backend_p2}/' .env"
docker compose exec php bash -lc "sed -i 's/DB_USERNAME=.*/DB_USERNAME=${DB_USERNAME:-backend}/' .env"
docker compose exec php bash -lc "sed -i 's/DB_PASSWORD=.*/DB_PASSWORD=${DB_PASSWORD:-backend}/' .env"
docker compose exec php bash -lc "php artisan key:generate"

docker compose exec php bash -lc "mkdir -p resources/views/layouts resources/views/categorias"

docker compose exec php bash -lc "shopt -s dotglob && cp -r /var/www/html-stubs/* /var/www/html/ || true"

docker compose exec php bash -lc "php artisan migrate"
docker compose exec php bash -lc "php artisan db:seed --class=CategorySeeder || true"

echo "Instalação concluída. Abra http://localhost:${APP_PORT:-8080}"

