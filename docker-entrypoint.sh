#!/bin/bash

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