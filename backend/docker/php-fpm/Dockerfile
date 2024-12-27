# Use the official PHP-FPM image as the base image
FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    curl \
    zip \
    unzip \
    git \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo_mysql zip opcache \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app


# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set permissions for Laravel directories
RUN addgroup --gid 1000 tag-box
RUN adduser --ingroup tag-box --shell /bin/sh tag-box

# Set the user to www-data
USER tag-box

EXPOSE 9000
