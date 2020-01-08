FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
        libzip-dev \
        libnss3 \
        libx11-6 \
        libu2f-udev \
        wget \
        unzip \
        zip \
    && docker-php-ext-install zip pdo_mysql

# Chrome Browser
ADD https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb  .

RUN apt-get install -yf ./google-chrome-stable_current_amd64.deb \
    && rm ./google-chrome-stable_current_amd64.deb \
    && rm -rf /var/lib/apt/lists/*
