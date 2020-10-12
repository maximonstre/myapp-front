FROM php:7.2-apache

ADD ./public /var/www/html/

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

#ENV PASSWORD=defaultpassword
#ENV MAIL=defaultmail

#ADD docker-entrypoint.sh /docker-entrypoint.sh
#ENTRYPOINT /docker-entrypoint.sh
#CMD ["motdepasse"]

EXPOSE 80
EXPOSE 443
# On partage un dossier de log
#VOLUME /var/www/html/
