#!/bin/bash
sed -i "s/listen \$PORT;/listen ${PORT:-8080};/" /etc/nginx/nginx.conf
php-fpm -D
nginx -g 'daemon off;'