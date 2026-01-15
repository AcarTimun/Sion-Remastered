<?php
// TAMPILKAN ERROR (Nanti dimatikan kalau sudah rilis)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if( !session_id() ) session_start();

// Panggil init
require_once '../app/init.php';

// Jalankan App
$app = new App;