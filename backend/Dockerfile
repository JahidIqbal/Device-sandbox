# Builder s
FROM php:8.2-cli AS builder

RUN apt-get update && apt-get install -y \
    git zip unzip libonig-dev libpng-dev libzip-dev libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN php -d memory_limit=-1 /usr/bin/composer install --no-interaction --prefer-dist --no-scripts --optimize-autoloader
COPY . .

# Production stage
FROM php:8.2-cli
WORKDIR /app
COPY --from=builder /app /app
EXPOSE 80

CMD sh -c "php artisan key:generate --force && php artisan migrate --force && php -S 0.0.0.0:80 -t public"
