FROM nginx:1.16-alpine

RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

COPY ./docker/wait-for-it.sh /wait-for-it.sh

