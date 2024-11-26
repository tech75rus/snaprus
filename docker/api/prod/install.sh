#!/bin/sh

composer install

composer dump-env prod 

symfony console --no-interaction doctrine:migrations:migrate

php-fpm
