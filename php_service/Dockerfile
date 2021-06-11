FROM php:8.0-apache
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
RUN mkdir -p /tmp/php/cache /tmp/php/logs && chmod -R 757 /tmp/php