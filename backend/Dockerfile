# FROM php:8.2-fpm

# # system deps
# RUN apt-get update && apt-get install -y \
#     git zip unzip libonig-dev libpng-dev libzip-dev libpq-dev \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# # composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# WORKDIR /var/www

# # copy and install
# COPY . /var/www

# RUN composer install --no-interaction --prefer-dist

# # permissions
# RUN chown -R www-data:www-data /var/www

# # serve using built-in PHP server (for simplicity)
# CMD php artisan key:generate && php artisan migrate --force && php -S 0.0.0.0:8000 -t public


# FROM php:8.2-fpm

# # System dependencies
# RUN apt-get update && apt-get install -y \
#     git zip unzip libonig-dev libpng-dev libzip-dev libpq-dev nginx \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# # Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Set working directory
# WORKDIR /var/www/html

# # Copy application files
# COPY . .

# # Install dependencies
# RUN composer install --no-interaction --prefer-dist

# # Configure nginx
# RUN echo 'server {\
#     listen 80;\
#     root /var/www/html/public;\
#     index index.php index.html index.htm;\
#     \
#     location / {\
#         try_files \$uri \$uri/ /index.php?\$query_string;\
#     }\
#     \
#     location ~ \.php$ {\
#         fastcgi_pass 127.0.0.1:9000;\
#         fastcgi_index index.php;\
#         fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;\
#         include fastcgi_params;\
#     }\
# }' > /etc/nginx/sites-available/default

# # Set permissions
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# # Start services
# CMD service nginx start && php-fpm




FROM php:8.2-cli

# System dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip libonig-dev libpng-dev libzip-dev libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install dependencies
RUN composer install --no-interaction --prefer-dist

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 80

# Start PHP built-in server
CMD php -S 0.0.0.0:80 -t public