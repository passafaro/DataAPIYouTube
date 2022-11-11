FROM php:7.3-apache
RUN docker-php-ext-install mysqli


# INSTALL PHP EXTENSIONS
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
#RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# ANABLE APACHE MOD REWRITE
RUN a2enmod rewrite

# ANABLE APACHE MOD HEADER
RUN a2enmod headers

# UPDATE APT-GET AND INSTALL LIBS
RUN apt-get update -y
RUN apt-get install -y openssl zip unzip git libnss3 libpng-dev


