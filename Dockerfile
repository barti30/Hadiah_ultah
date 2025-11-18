# ===========================
# Stage 1: Build Frontend (Vite/Tailwind)
# ===========================
FROM node:18 AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

COPY . .
RUN npm run build


# ===========================
# Stage 2: Laravel + PHP-FPM
# ===========================
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git libzip-dev libpng-dev libpq-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy Laravel source code
COPY . .

# Copy hasil build frontend
COPY --from=frontend /app/public/build ./public/build

# Install vendor
RUN composer install --no-dev --optimize-autoloader

# Laravel optimize
RUN php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# Permissions
RUN mkdir -p /app/storage /app/bootstrap/cache \
 && chown -R www-data:www-data /app/storage /app/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
