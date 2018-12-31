FROM richarvey/nginx-php-fpm:latest

RUN docker-php-ext-install mbstring bcmath

ADD ./docker/nginx/conf/nginx.conf /etc/nginx/nginx.conf
ADD . /app

CMD ["/start.sh"]