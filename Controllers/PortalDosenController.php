<?php

class PortalDosenController extends Controller {

    public function __construct()
    {
        // 1. Cek Login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        // 2. Cek Role: WAJIB DOSEN
        if ($_SESSION['user']['role'] != 'dosen') {
            // Kalau admin atau mahasiswa nyasar kesini, tendang balik
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Dosen - Sion Remastered';
        $data['user'] = $_SESSION['user'];

        // Kita cari data detail dosen berdasarkan user_id yang sedang login
        // (Opsional: nanti kita aktifkan kalau Model Dosen sudah punya fungsi getDosenByUserId)
        // $data['profil'] = $this->model('Dosen')->getProfil($_SESSION['user']['id']);

        $this->view('layouts/header', $data);
        $this->view('dosen/dashboard', $data);
        $this->view('layouts/footer');
    }
}