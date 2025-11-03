# Using webdevops/php-nginx image to reduce build memory usage
FROM webdevops/php-nginx:8.3

# install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# set working directory
WORKDIR /var/www/html

# copy application files
COPY . /var/www/html

# install application dependencies
RUN composer install --no-dev --optimize-autoloader

# set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# expose port 80
EXPOSE 80

# start nginx and php-fpm
CMD ["/usr/local/bin/entrypoint.sh"]

