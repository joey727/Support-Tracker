# Stage 1: Build dependencies
FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-interaction --optimize-autoloader

# Stage 2: Run Laravel app with Apache + PHP
FROM php:8.2-apache

# Install required extensions
RUN apt-get update && apt-get install -y \
    zip unzip git libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Enable Apache mod_rewrite for Laravel
RUN a2enmod rewrite

# Set document root to Laravel's public directory
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf && \
    sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/apache2.conf

# Copy app files
COPY . /var/www/html

# Copy vendor files from build stage
COPY --from=vendor /app/vendor /var/www/html/vendor

# Set working directory
WORKDIR /var/www/html

# Ensure storage and cache directories exist and are writable
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Generate app key, optimize, and cache configs
RUN php artisan key:generate --force || true && \
    php artisan config:cache || true && \
    php artisan route:cache || true && \
    php artisan view:cache || true

# Expose port 80 for Apache
EXPOSE 80

# Run migrations then start Apache
CMD php artisan migrate --force && apache2-foreground
