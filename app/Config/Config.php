<?php

// Judul Website
define('APP_NAME', 'Sion Remastered');

// BASEURL: Alamat utama website
// Logika: Jika dijalankan di server lokal (htdocs), pakai folder name. 
// Jika pake php spark/serve, pakai port.

// Cara Cek Otomatis (Fleksibel)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST']; // localhost atau localhost:8080

// Jika diakses lewat folder (XAMPP/Laragon standard)
// Sesuaikan 'sion-remastered' dengan nama folder aslimu di htdocs/www
if (strpos($host, 'localhost') !== false && strpos($_SERVER['REQUEST_URI'], 'public') !== false) {
    // Deteksi folder project otomatis
    $path = str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']);
    define('BASEURL', $protocol . $host . $path . '/public');
} else {
    // Jika pake PHP Build-in Server (php -S localhost:8080 -t public)
    define('BASEURL', $protocol . $host);
}

// Credential Database (Opsional, kalau mau dipisah dari Database.php)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sion_remastered');