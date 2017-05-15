FROM eboraas/apache-php


RUN rm -Rf /var/www/html/index.html

EXPOSE 80 443