# ===============================
# Stage 1: Build Vite Assets
# ===============================
FROM node:18 AS frontend
WORKDIR /app

COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# ===============================
# Stage 2: PHP + Composer
# ===============================
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip libpq-dev libonig-dev libxml2-dev libzip-dev curl \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Copy build assets
COPY --from=frontend /app/public ./public

RUN composer install --no-dev --optimize-autoloader

# Storage permissions
RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs \
    && chmod -R 775 storage bootstrap/cache
RUN php artisan storage:link || true

# Expose port (for Render)
EXPOSE 80

CMD php artisan serve --host 0.0.0.0 --port 80
