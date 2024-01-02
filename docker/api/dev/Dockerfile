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

COPY ./docker/api/dev/install.sh /install.sh
COPY ./docker/api/dev/php.ini /usr/local/etc/php/php.ini
RUN chown gladkix:gladkix /install.sh

USER gladkix

WORKDIR /var/www/api

#FROM php:fpm
#
#RUN apt-get update &&  apt-get install -y \
#		libfreetype6-dev \
#		libjpeg62-turbo-dev \
#		libpng-dev \
#    		zlib1g-dev \
#    		libzip-dev \
#    		vim \
#    		&& docker-php-ext-install gd opcache bcmath zip pdo pdo_mysql
#
#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
#	php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
#	php composer-setup.php && \
#	php -r "unlink('composer-setup.php');" && \
#	mv composer.phar /usr/local/bin/composer
#
#RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash && \
#	apt-get install -y symfony-cli
#
#RUN groupadd -g 1000 gladkix
#RUN useradd -u 1000 -g gladkix gladkix
#RUN mkdir -p /home/gladkix
#RUN chown -R gladkix:gladkix /home/gladkix
#
#USER gladkix
#
#WORKDIR /var/www/api
