<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Aplikasi

Aplikasi ini dibuat dengan Framework Laravel yang memiliki basis PHP sebagai rangka kerja dan jQuery yang berbasis JavaScript untuk mengatur tampilan antarmuka.

Aplikasi ini dipakai untuk menghitung harga total pesanan yang dimiliki setiap orang dan memasukkan semua total pesanan tersebut ke dalam sebuah tagihan. Dari tagihan itu bisa dilihat berapa total biaya yang harus dikeluarkan setiap orang dan tagihan secara keseluruhan sampai diskon.

## Inisiasi Aplikasi

Clone aplikasi dari repositori ini atau download zip.

Buka cmd/terminal, arahkan direktori di dalam cmd/terminal ke folder project yang sudah di download kemudian jalankan perintah `composer install` dan jika perintah selesai dijalankan, jalankan perintah `npm installl` dan tunggu sampai selesai.

Gandakan berkas `.env.example` pada project dan ubah nama berkas hasil duplikasi tadi menjadi `.env`.

Buat database baru dan masukkan nama database tersebut ke dalam `.env` pada parameter `DB_DATABASE=`.

Ubah isi parameter `DB_USERNAME=` dan `DB_PASSWORD=` pada berkas `.env` hingga sesuai dengan username dan password pada konfigurasi database masing-masing.

Jalankan perintah `php artisan migrate:fresh` di dalam cmd/terminal yang sudah di arahkan ke direktori aplikasi, apabila sudah maka perintah `php artisan serve` bisa dijalankan.
