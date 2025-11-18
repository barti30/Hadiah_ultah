# ===============================
# Stage 1: Build Vite/Tailwind
# ===============================
FROM node:18 AS frontend
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm install

COPY . .
RUN npm run build


# ===============================
# Stage 2: Laravel + PHP-FPM + Nginx
# ===============================
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libjpeg-dev nginx \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set project directory
WORKDIR /var/www/html

# Copy entire Laravel project
COPY . .

# Copy Vite build result
COPY --from=frontend /app/public/build ./public/build

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port
EXPOSE 80

# Start Nginx + PHP-FPM
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
