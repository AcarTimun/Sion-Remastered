<?php

class PortalMahasiswaController extends Controller {

    public function __construct()
    {
        // 1. Cek Login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // 2. Cek Role: WAJIB MAHASISWA
        if ($_SESSION['user']['role'] != 'mahasiswa') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Mahasiswa - Sion Remastered';
        $data['user'] = $_SESSION['user'];

        // Nanti disini kita load data SKS, IPK, dan Tagihan (Next Phase)
        
        $this->view('layouts/header', $data);
        $this->view('mahasiswa/dashboard', $data);
        $this->view('layouts/footer');
    }
}