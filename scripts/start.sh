#!/usr/bin/env bash
set -euo pipefail

docker compose up -d
docker compose exec php bash -lc "php artisan migrate --force"
docker compose exec php bash -lc "php artisan db:seed --class=CategorySeeder || true"

echo "Aplicação iniciada em http://localhost:${APP_PORT:-8080}"

