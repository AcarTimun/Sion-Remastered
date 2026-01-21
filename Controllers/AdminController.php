<?php

class AdminController extends Controller {
    
    public function __construct()
    {
        // 1. Cek apakah user sudah login?
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // 2. Cek apakah role-nya admin?
        if ($_SESSION['user']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Admin - Sion Remastered';
        $data['user'] = $_SESSION['user'];

        // Memanggil View dengan Layout
        // Karena folder Views ada di root, path '../Views/...' di Controller.php sudah benar
        $this->view('layouts/header', $data);
        $this->view('admin/dashboard', $data);
        $this->view('layouts/footer');
    }
}