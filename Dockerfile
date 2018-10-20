FROM php:7.2
RUN apt-get update -y && apt-get install -y openssl zip unzip git gnupg libpng-dev
RUN curl https://deb.nodesource.com/setup_8.x | bash - && apt-get install -y nodejs npm
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring
WORKDIR /app
COPY . /app
RUN composer install
RUN npm install && npm run build --prod

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000