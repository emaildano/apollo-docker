FROM composer:latest

ADD . /var/www/html/wordpress
WORKDIR /var/www/html/wordpress
RUN composer create-project
