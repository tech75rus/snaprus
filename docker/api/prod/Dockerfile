FROM php:8.3-fpm-alpine

RUN apk update && apk add --no-cache \ 
    $PHPIZE_DEPS \
    imagemagick-dev \
    composer \
    curl \
    freetype-dev \
    libjpeg-turbo-dev \
    jpeg-dev \
    libwebp-dev \
    libpng-dev \
    zlib-dev \
    libzip-dev \
    vim \
    php-ctype \
    php-xml \
    php-session \
    php-dom \
    php-tokenizer \
    php-fpm \
    php-mbstring \
    php-json \
    php-opcache \
    && docker-php-ext-install -j$(nproc) opcache bcmath zip pdo pdo_mysql \
    && pecl install imagick \
    && docker-php-ext-enable imagick

RUN apk add --no-cache bash \
    && curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash \
    && apk add symfony-cli

RUN adduser -D -u 1000 gladkix

COPY ./docker/api/prod/install.sh /install.sh
#COPY ./docker/api/prod/php.ini /usr/local/etc/php/php.ini
RUN chown gladkix:gladkix /install.sh

USER gladkix

WORKDIR /var/www/api

