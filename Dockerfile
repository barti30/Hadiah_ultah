# =============================
# 1. BUILD FRONTEND (Vite)
# =============================
FROM node:18 AS frontend
WORKDIR /app

# Install dependencies
COPY package.json package-lock.json ./
RUN npm install

# Copy semua source code frontend
COPY . .

# Build Vite
RUN npm run build


# =============================
# 2. LARAVEL + PHP-FPM
# =============================
FROM php:8.2-fpm

# Install dependencies PHP
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set workdir
WORKDIR /app

# Copy source code Laravel
COPY . .

# Copy hasil build frontend
COPY --from=frontend /app/public/build /app/public/build

# Install vendor Laravel
RUN composer install --no-dev --optimize-autoloader

# Permissions storage
RUN mkdir -p /app/storage /app/bootstrap/cache \
    && chmod -R 777 /app/storage /app/bootstrap/cache

# Command default
CMD ["php-fpm"]
