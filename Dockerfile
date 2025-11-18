# Stage 1: Build Vite/Tailwind
FROM node:18 AS frontend
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install
COPY . .
RUN npm run build

# Stage 2: Laravel + PHP-FPM
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpq-dev libpng-dev \
    && docker-php-ext-install zip pdo pdo_mysql

RUN php artisan migrate --force
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan route:clear
RUN php artisan view:clear

    # Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy source code Laravel
COPY . .

# Copy hasil build frontend
COPY --from=frontend /app/public/build ./public/build

# Install vendor
RUN composer install --no-dev --optimize-autoloader

# Storage permission
RUN mkdir -p /app/storage /app/bootstrap/cache \
 && chmod -R 777 /app/storage /app/bootstrap/cache

# Jalankan PHP-FPM
CMD ["php-fpm"]
