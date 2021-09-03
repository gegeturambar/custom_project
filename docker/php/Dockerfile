FROM php:8-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev;


RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl 
RUN pecl install apcu && docker-php-ext-enable apcu
RUN pecl install xdebug-3.0.0 && docker-php-ext-enable xdebug

RUN echo "xdebug.mode = debug" >> 	/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey = PHPSTORM" >> 	/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.default_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_autostart = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request = yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port = 9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_handler = dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_host = $(getent hosts docker.for.mac.localhost | awk '{ print $1 }')" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/html/
