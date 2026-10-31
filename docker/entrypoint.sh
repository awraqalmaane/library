#!/bin/sh
set -e

cd /app

# Render (and most PaaS) tell us which port to listen on via $PORT
export PORT="${PORT:-8080}"

echo "==> Caching config, routes and views"
php artisan optimize

echo "==> Running migrations"
php artisan migrate --force

if [ "$RUN_SEED" = "true" ]; then
    echo "==> Seeding admin user (RUN_SEED=true)"
    php artisan db:seed --class=AdminUserSeeder --force
fi

echo "==> Starting FrankenPHP on port $PORT"
exec frankenphp run --config /app/docker/Caddyfile
