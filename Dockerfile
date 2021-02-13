FROM php:7.4-apache 
RUN docker-php-ext-install mysqli
RUN apt-get update -y
# RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo pdo_mysql 
# pdo_pgsql
