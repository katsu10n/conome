FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    nginx

RUN docker-php-ext-install zip pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# srcディレクトリの内容をコピー
COPY src /var/www/html

# Composerの依存関係インストール
RUN composer install --no-dev --optimize-autoloader

# Nginxの設定
COPY nginx.conf /etc/nginx/nginx.conf

# 権限の設定
RUN chown -R www-data:www-data /var/www/html

# Heroku用のポート設定
EXPOSE $PORT

# 起動コマンド
CMD php-fpm && nginx -g 'daemon off;'