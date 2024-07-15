FROM php:8.3.9-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev mariadb-client \
    libmagickwand-dev --no-install-recommends \
    git curl wget zip unzip vim htop man procps;

RUN pecl install imagick \
    && docker-php-ext-enable imagick;

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug;

RUN docker-php-ext-install pdo_mysql opcache && \
    docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install sockets;

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-enable exif

# копируем кастомные конфиги PHP
COPY ./conf.d/* ${PHP_INI_DIR}/conf.d/


# создаем группу и пользователя под которым будет запускаться PHP
RUN groupadd -g 1000 phptools
RUN useradd -u 1000 -g phptools -G sudo -m phptools
RUN echo 'phptools:qwerty' | chpasswd
# указываем под каким пользователем запускать PHP
USER phptools


WORKDIR /var/www/public

#RUN apt-get update && apt-get install mariadb-client
#RUN apt-get install libmcrypt-dev 
#RUN apt-get install freetype-dev
#RUN pecl install redis xdebug 
#RUN docker-php-ext-install pdo_mysql opcache gd mcrypt mysqli pdo zip ftp \
#    && docker-php-ext-configure opcache --enable-opcache

#RUN apk --no-cache add --virtual .build-deps $PHPIZE_DEPS \
#    && apk --no-cache add --virtual .ext-deps libmcrypt-dev freetype-dev \
#    && docker-php-source extract \
#    #&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ \
    #                                 --with-png-dir=/usr/include/ \
    #                                 --with-jpeg-dir=/usr/include/ \
#    && docker-php-ext-install gd mcrypt mysqli pdo zip ftp \
#    && pecl install redis xdebug \
#    && docker-php-ext-enable redis \
#    && docker-php-ext-enable xdebug \
#    && docker-php-source delete \
#    && apk del .build-deps \
    # composer taken from (https://github.com/geshan/docker-php-composer-alpine)
#    && apk --no-cache add curl git openssh \
#    && curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer