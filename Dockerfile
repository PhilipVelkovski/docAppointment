FROM php:8.0-apache

WORKDIR .

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . .

EXPOSE 80
