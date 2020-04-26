FROM php:7.2-apache

ADD ./public /var/www/html/

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

EXPOSE 80

# On partage un dossier de log
VOLUME /var/www/html/

