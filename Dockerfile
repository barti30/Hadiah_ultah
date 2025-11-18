FROM node:18 AS frontend

WORKDIR /app

# Copy file untuk vite dan tailwind
COPY package.json package-lock.json ./
RUN npm install

COPY . .
RUN npm run build


# PHP Stage
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpq-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

# Copy hasil build Tailwind/Vite dari stage node
COPY --from=frontend /app/public/build ./public/build

RUN composer install --no-dev --optimize-autoloader

# Jalankan Laravel dengan port Railway
CMD php artisan serve --host=0.0.0.0 --port=${PORT}