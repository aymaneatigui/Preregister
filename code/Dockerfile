# Use the official PHP image as the base image
FROM php:8.1-apache

# Install PostgreSQL client libraries and headers
RUN apt-get update && apt-get install -y libpq-dev

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Copy your application files into the container
COPY . /var/www/html/

# Expose the necessary port
EXPOSE 80
