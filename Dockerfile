# Install PHP dependencies using Composer's image.
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_MEMORY_LIMIT=-1
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

FROM php:8.4-cli-bookworm
WORKDIR /var/www/html

RUN set -eux; \
    apt-get update; \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        git \
        unzip \
        libzip-dev \
        libsqlite3-dev \
        libonig-dev \
        pkg-config \
    ; \
    docker-php-ext-configure zip; \
    docker-php-ext-install -j"$(nproc)" zip pdo pdo_sqlite mbstring bcmath; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/*

COPY --from=vendor /app/vendor ./vendor
COPY . .

RUN mkdir -p bootstrap/cache storage/framework/sessions storage/framework/views storage/framework/cache/data storage/logs \
    database \
    && chmod -R 775 storage bootstrap/cache \
    && touch database/database.sqlite \
    && cp .env.example .env \
    && sed -i '/^APP_KEY=/d' .env \
    && chmod +x docker/entrypoint.sh

ENV SESSION_DRIVER=file \
    CACHE_STORE=file \
    QUEUE_CONNECTION=sync \
    LOG_CHANNEL=stderr

EXPOSE 8080

ENTRYPOINT ["/var/www/html/docker/entrypoint.sh"]
