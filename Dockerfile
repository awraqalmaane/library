# syntax=docker/dockerfile:1

# ---------------------------------------------------------------
# Stage 1: build front-end assets (Vite / Tailwind)
# ---------------------------------------------------------------
FROM node:22-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
RUN npm run build

# ---------------------------------------------------------------
# Stage 2: PHP runtime (FrankenPHP = PHP 8.4 + Caddy web server)
# ---------------------------------------------------------------
FROM dunglas/frankenphp:1-php8.4 AS app

ENV APP_ENV=production \
    APP_DEBUG=false \
    PORT=80

RUN install-php-extensions pdo_pgsql pdo_mysql intl zip bcmath gd opcache pcntl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Install PHP dependencies first so this layer is cached between builds
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

# Copy the application and the compiled assets
COPY . .
COPY --from=assets /app/public/build ./public/build

RUN composer dump-autoload --optimize --no-dev --no-interaction \
    && sed -i 's/\r$//' docker/entrypoint.sh docker/Caddyfile \
    && chmod +x docker/entrypoint.sh \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

ENTRYPOINT ["/app/docker/entrypoint.sh"]
