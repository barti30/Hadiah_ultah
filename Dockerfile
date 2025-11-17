# Base image PHP 8.2 with FPM
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    nginx \
    libzip-dev \
    libonig-dev \
    libpq-dev \
    libxml2-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate optimized config & route caches
RUN php artisan config:cache || true
RUN php artisan route:cache || true

# Expose port for Render
EXPOSE 8080

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]