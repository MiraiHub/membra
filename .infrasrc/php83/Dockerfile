FROM php:8.3-fpm
LABEL authors="grolandao@miraihub"

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libzip-dev \
    libbrotli-dev \
    openssl \
    zip \
    unzip \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip intl curl

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY .infrasrc/php83/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./backend/composer.json ./backend/composer.lock ./

RUN composer update --no-dev --no-scripts

COPY ./backend/ .

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www

EXPOSE 9000 9003 8000

CMD ["php-fpm"]