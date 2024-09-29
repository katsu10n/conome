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

# 環境変数の設定
ENV PORT=8080

# 起動スクリプトの作成
COPY start.sh /start.sh
RUN chmod +x /start.sh

# start.shをコピー
COPY start.sh /start.sh

# 実行権限を付与
RUN chmod +x /start.sh

# コマンドを変更
CMD ["/start.sh"]

# Node.jsとnpmのインストール
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get update \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# 依存関係のインストール
RUN npm ci

# ビルド
RUN npm run production