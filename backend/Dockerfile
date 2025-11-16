FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip libonig-dev libpng-dev libzip-dev libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy PHP project files
COPY . .

# Install PHP dependencies
# RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN php -d memory_limit=-1 /usr/bin/composer install --no-interaction --prefer-dist


EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
