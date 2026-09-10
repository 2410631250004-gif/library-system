# Library System

## Description
Simple Library Information System

## Requirements
- PHP
- Composer
- MySQL
- Laravel

## Installation
1. Clone repository ini
   ```bash
   git clone https://github.com/2410631250004-gif/library-system.git
   ```
2. Masuk ke folder project
   ```bash
   cd library-system
   ```
3. Install dependency lewat Composer
   ```bash
   composer install
   ```
4. Copy file environment
   ```bash
   cp .env.example .env
   ```
5. Generate application key
   ```bash
   php artisan key:generate
   ```
6. Buat database baru di MySQL dengan nama `belajar-laravel`, lalu sesuaikan konfigurasi database di file `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=belajar-laravel
   DB_USERNAME=root
   DB_PASSWORD=
   ```
7. Jalankan migration
   ```bash
   php artisan migrate
   ```
8. Jalankan aplikasi
   ```bash
   php artisan serve
   ```
9. Akses lewat browser di `http://127.0.0.1:8000/`

## Author
Anastasya Puteri Taruk - 2410631250004 - 5A (https://github.com/2410631250004-gif/library-system)