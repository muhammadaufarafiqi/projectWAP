# Menggunakan PHP 8.2 dengan Apache
FROM php:8.2-apache
# Set working directory (equivalent dengan -w flag)
WORKDIR /var/www/html
# Expose port 80 (equivalent dengan -p flag)
EXPOSE 80

Untuk menjalankannya, Dockerfile perlu