FROM php:7.0-apache
MAINTAINER <lvpartners>

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install bcmath
RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY php.ini /usr/local/etc/php/

COPY vhost/site.conf /etc/apache2/sites-available/site.conf
RUN a2dissite 000-default
RUN a2ensite site
RUN a2enmod rewrite

# Include composer
RUN apt-get update -y
RUN apt-get install -y git zip zlib1g-dev && \
    docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php -- \
      --install-dir=/usr/local/bin \
      --filename=composer \

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libmagickwand-dev \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install imagick-3.4.1 \
    && docker-php-ext-enable imagick

RUN mkdir /var/www/assets

RUN usermod -u 1000 www-data

WORKDIR /var/www
