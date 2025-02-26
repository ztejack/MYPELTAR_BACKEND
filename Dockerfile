# Gunakan FrankenPHP sebagai base image
FROM dunglas/frankenphp:latest

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN pecl install --onlyreqdeps --force redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis
# Set working directory
WORKDIR /app

# Copy semua file Laravel ke dalam container
COPY . .

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permission storage dan bootstrap
RUN chmod -R 777 storage bootstrap/cache

# Expose port aplikasi
EXPOSE 8000

RUN php artisan key:generate

RUN php artisan migrate:fresh --seed

# Jalankan Laravel Octane dengan FrankenPHP
CMD ["php", "artisan", "octane:start", "--server=frankenphp", "--host=127.0.0.1", "--workers=8", "--max-requests=500", "--port=8000"]
