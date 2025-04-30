FROM leandreaci/php:8.4
RUN apk add git
WORKDIR /var/www/html
COPY composer.json .
RUN composer install
COPY . .