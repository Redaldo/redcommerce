FROM php:8.2-fpm

# System deps
RUN apt-get update && apt-get install -y \
    libpq-dev libonig-dev libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl \
    && rm -rf /var/lib/apt/lists/*

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

# Laravel permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache


CMD ["php-fpm"]
