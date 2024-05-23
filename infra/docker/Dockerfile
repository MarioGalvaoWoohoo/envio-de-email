# Use the official PHP image as a parent image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev \
    libonig-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www

# Ensure the bootstrap/cache directory exists and is writable
RUN mkdir -p /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www/bootstrap/cache

# Copy existing application directory permissions
COPY --chown=www-data:www-data . .

# Configurando permissoes e usuario.
RUN chown -R www-data:www-data ./ \
    && chmod -R 765 ./

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
