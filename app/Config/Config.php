<?php

// 1. Judul Website
define('APP_NAME', 'Sion Remastered');

// 2. Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sion_remastered');

// 3. BASEURL Otomatis (Versi Stabil/Anti-Gagal)
// Kita mendeteksi path folder berdasarkan lokasi file index.php berada
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];

// Ambil direktori tempat index.php berada (misal: /Sion-Remastered/public)
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);

// Bersihkan slash (Windows pakai backslash \, kita ubah jadi / biasa)
$scriptDir = str_replace('\\', '/', $scriptDir);

// Hapus slash di akhir jika ada (biar rapi)
$scriptDir = rtrim($scriptDir, '/');

// Gabungkan jadi BASEURL
define('BASEURL', $protocol . $host . $scriptDir);