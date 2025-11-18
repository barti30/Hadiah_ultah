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

# Install system dependencies + nginx + supervisor
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libjpeg-dev nginx supervisor \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set project directory
WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Copy Vite build output
COPY --from=frontend /app/public/build ./public/build

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy Nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Copy supervisor config
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose port (Railway uses this)
EXPOSE 80

# Start supervisor (runs nginx + php-fpm)
CMD ["/usr/bin/supervisord", "-n"]()
