FROM php:7.2-fpm

RUN apt-get update
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y libpq-dev
#        && docker-php-ext-install -j$(nproc) mcrypt

RUN docker-php-ext-install mbstring exif opcache

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql zip \
    && docker-php-ext-install bcmath

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
