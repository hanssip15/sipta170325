#!/bin/bash

# Load environment variables dari .env
export $(grep -v '^#' .env | xargs)

# Fungsi untuk menunggu database siap
echo "Menunggu database siap..."
until php -r "try { new PDO('mysql:host=${DB_HOST};dbname=${DB_DATABASE}', '${DB_USERNAME}', '${DB_PASSWORD}'); echo 'Database siap.\n'; } catch (PDOException \$e) { exit(1); }"; do
    sleep 3
    echo "Menunggu database..."
done

# Jalankan migrasi
echo "Menjalankan migrasi..."
if php artisan migrate --force; then
    echo "Migrasi berhasil."
else
    echo "Gagal menjalankan migrasi."
    exit 1
fi

# Jalankan seeder
echo "Menjalankan seeder..."
if php artisan db:seed --force; then
    echo "Seeder berhasil."
else
    echo "Gagal menjalankan seeder."
    exit 1
fi

# Jalankan server Laravel
echo "Menjalankan server Laravel..."
php artisan serve --host=0.0.0.0 --port=8000