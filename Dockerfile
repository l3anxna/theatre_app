FROM node:22-alpine AS frontend

WORKDIR /var/www

COPY package.json package-lock.json ./
RUN npm ci

COPY resources ./resources
COPY public ./public
COPY tailwind.config.js postcss.config.js vite.config.js ./

RUN npm run build
RUN test -f public/build/manifest.json \
    && test -n "$(find public/build/assets -name '*.css' -print -quit)"


FROM php:8.5-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    ca-certificates \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    default-mysql-client \
    nginx \
    supervisor \
    gettext-base \
    && docker-php-ext-install \
        pdo_mysql \
        pdo_sqlite \
        zip \
        mbstring \
        exif \
        pcntl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction

COPY --from=frontend /var/www/public/build ./public/build
RUN test -f public/build/manifest.json \
    && test -n "$(find public/build/assets -name '*.css' -print -quit)"

COPY docker/nginx-render.conf.template /etc/nginx/templates/default.conf.template
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/start-container /usr/local/bin/start-container
COPY docker/php-fpm-render.conf /usr/local/etc/php-fpm.d/zz-render.conf

RUN chmod +x /usr/local/bin/start-container \
    && rm -f /etc/nginx/sites-enabled/default \
    && touch database/database.sqlite \
    && chown -R www-data:www-data database storage bootstrap/cache

EXPOSE 8080

CMD ["start-container"]
