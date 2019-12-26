FROM php:7.3-fpm-alpine3.9

RUN apk add --no-cache composer \
      && docker-php-ext-install pdo_mysql

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

