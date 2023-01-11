FROM php:8.1.2-apache
WORKDIR /var/www/html

COPY ./app/public /public

COPY ./app/src /src
COPY ./app/composer.json composer.json

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

#RUN curl -sS https://getcomposer.org/installer | php -- \ &&  mv composer.phar /usr/local/bin/composer

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN composer dump-autoload

RUN ls