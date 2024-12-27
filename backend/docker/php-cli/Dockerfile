# Use the official PHP CLI image as the base image
FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    libpq-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (modify as needed)
RUN docker-php-ext-install pdo_mysql

# Set working directory
WORKDIR /app

# Copy application files
COPY . /app

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set permissions for Laravel directories
RUN addgroup --gid 1000 tag-box
RUN adduser --ingroup tag-box --shell /bin/sh tag-box

USER tag-box

# Set the default command to "php"
CMD ["php"]
