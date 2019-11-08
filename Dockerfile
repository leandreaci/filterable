FROM leandreaci/php7.3
RUN apk add git
WORKDIR /var/www/html
COPY composer.json .
RUN composer install
COPY . .