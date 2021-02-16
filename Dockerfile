FROM php:7.4.15-apache

RUN apt-get update && apt-get install -y \
  vim-tiny \
  less \
  git \
  unzip \
  &&  apt-get clean

RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
    && php /tmp/composer-setup.php --install-dir=/usr/bin --filename=composer \
    && rm /tmp/composer-setup.php

RUN a2enmod rewrite
