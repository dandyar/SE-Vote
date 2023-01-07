FROM php:7.4-apache

COPY ports.conf /etc/apache2/ports.conf

RUN apt-get update \
    && apt-get install -y libzip-dev libpng-dev libjpeg-dev libfreetype-dev libwebp-dev \
    && docker-php-ext-install zip

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp
RUN docker-php-ext-install gd mysqli pdo_mysql

# Use the default production configuration
RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN a2enmod rewrite