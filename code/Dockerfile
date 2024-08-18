# Example Dockerfile

# Use the official PHP image as the base image
FROM php:8.1-apache

# Copy your application files into the container
COPY . /var/www/html/

# Install any necessary PHP extensions, for example:
RUN docker-php-ext-install pdo pdo_pgsql

# Expose the necessary port
EXPOSE 80
