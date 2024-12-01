# Gunakan image PHP dengan versi yang sesuai
FROM php:8.2-cli

# Install dependencies seperti Composer, libzip (untuk Lumen), dan libpq (untuk PostgreSQL)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev \
    unzip \
    && docker-php-ext-install zip pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory di dalam container
WORKDIR /app

# Copy semua file proyek Lumen ke dalam container
COPY . /app

# Install dependencies Lumen menggunakan Composer
RUN composer install

# Expose port 8000 agar bisa diakses
EXPOSE 8000

# Jalankan PHP Built-in server di port 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
