<?php

class Controller {
    // Fungsi untuk menampilkan View
    public function view($view, $data = [])
    {
        // Logika Baru: Folder Views sejajar dengan app
        // Jalurnya: ../Views/nama_file.php
        if (file_exists('../Views/' . $view . '.php')) {
            require_once '../Views/' . $view . '.php';
        } else {
            die("View '$view' tidak ditemukan di folder Views!");
        }
    }

    // Fungsi untuk memanggil Model
    public function model($model)
    {
        // Logika Baru: Folder Models sejajar dengan app
        // Jalurnya: ../Models/nama_file.php
        if (file_exists('../Models/' . $model . '.php')) {
            require_once '../Models/' . $model . '.php';
            return new $model;
        } else {
            die("Model '$model' tidak ditemukan di folder Models!");
        }
    }
}