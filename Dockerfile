FROM php:8.3-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    nginx

RUN docker-php-ext-install zip pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Node.jsとnpmのインストール
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# Nginxの設定
COPY nginx.conf /etc/nginx/nginx.conf

# 環境変数の設定
ENV PORT=8080

# ソースコードのコピー
COPY src /var/www/html

# Composerの依存関係インストール
RUN composer install --no-dev --optimize-autoloader

# npmの依存関係インストールとビルド
RUN npm ci && npm run build

# 権限の設定
RUN chown -R www-data:www-data /var/www/html

# 起動スクリプトのコピーと権限設定
COPY start.sh /start.sh
RUN chmod +x /start.sh

# コマンドを変更
CMD ["/start.sh"]