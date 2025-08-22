# Gunakan official PHP image dengan Apache
FROM php:8.2-apache

# Salin file PHP ke direktori web
COPY index.php /var/www/html/

# (Opsional) Tambahkan ekstensi PHP jika diperlukan
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose port 80 (default untuk Apache)
EXPOSE 80

# Server akan otomatis dijalankan oleh Apache
