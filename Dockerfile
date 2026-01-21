FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files first
COPY composer.json composer.lock ./

# Install dependencies (without requiring the entire app)
RUN composer install --optimize-autoloader --no-dev --no-scripts --no-autoloader

# Now copy the rest of the application
COPY . .

# Generate autoloader
RUN composer dump-autoload --optimize --no-dev

# Copy nginx configuration
COPY ./docker/nginx/default.conf /etc/nginx/sites-available/default

# Copy start script
COPY ./docker/start.sh /start.sh
RUN chmod +x /start.sh

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Add after the existing docker-php-ext-install line
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Expose port
EXPOSE 8080

CMD ["/start.sh"]