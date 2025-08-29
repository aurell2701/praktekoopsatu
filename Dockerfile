FROM php:8.2-cli

# copy semua file ke container
COPY . /var/www/html

WORKDIR /var/www/html

# jalankan PHP built-in server di port 7860
CMD ["php", "-S", "0.0.0.0:7860", "-t", "/var/www/html"]