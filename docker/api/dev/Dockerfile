FROM php:8.3-fpm-alpine3.17

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
    git

RUN docker-php-ext-install -j$(nproc) opcache bcmath zip pdo pdo_mysql

# Это для установки Imagick библеотеки вручную настраивает и компилирует
RUN git clone https://github.com/Imagick/imagick.git --depth 1 /tmp/imagick && \
    cd /tmp/imagick && \
    phpize && \
    ./configure && \
# это строка нужна для версии PHP 8.4 на момент написания Dockerfile
#    ./configure CPPFLAGS='-Dphp_strtolower=zend_str_tolower' && \
    make && \
    make install

RUN docker-php-ext-enable imagick

RUN apk add --no-cache bash \
    && curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | bash \
    && apk add symfony-cli

RUN apk del git make autoconf pkgconfig && \
    rm -rf /var/cache/apk/* /tmp/imagick

RUN adduser -D -u 1000 gladkix

COPY ./docker/api/dev/install.sh /install.sh
RUN chown gladkix:gladkix /install.sh

WORKDIR /var/www/api
