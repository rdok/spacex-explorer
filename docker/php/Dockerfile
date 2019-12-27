FROM php:7.3-fpm-alpine3.9

RUN apk add --no-cache composer \
      && docker-php-ext-install pdo_mysql

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

COPY ./docker/wait-for /wait-for
RUN chmod +x /wait-for

WORKDIR /var/www

#COPY --chown=www-data:www-data . /var/www

#RUN composer install
#RUN chown -R www-data:www-data .

#ARG UID
#USER "${UID}"
#WORKDIR /var/www

