FROM php:8-fpm

WORKDIR /var/www/html

COPY ./docker/app/local.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y \
    locales \
    zip \
    libzip-dev \
    unzip \
    git \
    curl \
    nano

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip bcmath
RUN docker-php-ext-configure zip
RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html/

EXPOSE 9000
CMD ["php-fpm"]