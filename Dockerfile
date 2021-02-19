FROM php:7.4.15-apache

RUN apt-get update && apt-get install -y \
  vim-tiny \
  less \
  git \
  unzip \
  &&  apt-get clean

RUN a2enmod rewrite

RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
    && php /tmp/composer-setup.php --install-dir=/usr/bin --filename=composer \
    && rm /tmp/composer-setup.php

COPY flags/composer.json /var/www/
WORKDIR /var/www
RUN composer install
