FROM php:7.4-apache
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite

COPY . /var/www/html/

RUN sed -i -e 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i -e 's|/var/www/html|/var/www/html/public|g' /etc/apache2/apache2.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www/html
RUN composer install
RUN composer dump-autoload --optimize