FROM ubuntu

RUN apt-get update -qq && DEBIAN_FRONTEND=noninteractive apt-get -q -y install php5 libapache2-mod-php5 php5-mcrypt php5-mysql php5-json php5-curl php5-cli git curl

ENV PHP_VERSION="system"

RUN php5enmod mcrypt
RUN a2enmod rewrite
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /app/
WORKDIR /app
RUN mkdir -p /app
RUN composer install --prefer-source --no-interaction --no-dev