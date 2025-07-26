# Stage 1: Node base (for building Vue assets)
FROM node:18-alpine AS node_base
WORKDIR /var/www/html

# Copy package.json and install dependencies
COPY ./package*.json ./
RUN npm install && npm run build

# Stage 2: PHP base (Laravel app)
FROM php:8.2-fpm-alpine AS php_base

# Install PHP extensions & system dependencies
RUN apk add --no-cache \
    git \
    unzip \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libwebp-dev \
    oniguruma-dev \
    libxml2-dev \
    libzip-dev \
    icu-dev \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy source code
COPY . .

# Copy build result from node_base
COPY --from=node_base /var/www/html/public/build /var/www/html/public/build

# Set permissions (optional)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
