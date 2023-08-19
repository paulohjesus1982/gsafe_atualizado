# FROM php:7.4-apache

# # Update and upgrade
# RUN apt-get update && apt-get upgrade -y

# # #Linux Library
# # RUN apt-get update -y && apt-get install -y \
# # 	libicu-dev \
# # 	libmariadb-dev \
# # 	libzip-dev \
# # 	unzip \
# # 	zip \
# # 	zlib1g-dev \
# #     libzip-dev \
# # 	libpng-dev \
# # 	libjpeg-dev \
# # 	libfreetype6-dev \
# # 	libjpeg62-turbo-dev \
# # 	libpng-dev \
# # 	postgresql-client \
# # 	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
# #     && docker-php-ext-install gd pdo pdo_pgsql

# # Install system dependencies
# RUN apt-get install -y \
#     libicu-dev \
#     libmariadb-dev \
#     libzip-dev \
#     unzip \
#     zip \
#     zlib1g-dev \
#     libpng-dev \
#     libjpeg-dev \
#     libfreetype6-dev \
#     libjpeg62-turbo-dev \
#     libpng-dev \
#     postgresql-client \
#     libpq-dev

# # Mod Rewrite
# RUN a2enmod rewrite

# # Set working directory
# WORKDIR /var/www/html

# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # # Install Laravel dependencies
# # RUN composer install

# # # Set proper permissions
# # RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# # Expose port
# EXPOSE 80

# # Start Apache
# CMD ["apache2-foreground"]

# Use the official PHP image
FROM php:7.4-apache

# Update and upgrade
RUN apt-get update && apt-get upgrade -y

# Install system dependencies
RUN apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    libzip-dev \
    unzip \
    zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    postgresql-client \
    libpq-dev

# Enable Apache Rewrite module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy the application code
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Install PostgreSQL PDO extension
RUN docker-php-ext-install pdo pdo_pgsql

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
