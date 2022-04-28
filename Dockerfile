FROM leandreaci/php:8.0
RUN apk add git
WORKDIR /var/www/html
COPY composer.json .
RUN composer install
COPY . .