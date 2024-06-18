FROM php:8.2.20-apache-bullseye

RUN apt-get update -y && apt-get install -y zip unzip git sqlite3 libsqlite3-dev

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /var/www/html
COPY .env.example /var/www/html/.env

WORKDIR /var/www/html

RUN composer install && php artisan key:generate

RUN sqlite3 database/database.sqlite < database/database_backup.sql

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
