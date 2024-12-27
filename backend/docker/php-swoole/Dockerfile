# Base image
FROM php:8.4-cli

# Set environment variable to prevent interactive prompts
ENV DEBIAN_FRONTEND=noninteractive

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    unzip \
    git \
    libbrotli-dev \
    curl \
    && docker-php-ext-install pdo_mysql sockets bcmath pcntl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Swoole via PECL
RUN pecl install swoole \
    && docker-php-ext-enable swoole

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g chokidar-cli chokidar\
    && apt-get clean

# Set working directory
WORKDIR /app

# Expose Octane server port
EXPOSE 8000
