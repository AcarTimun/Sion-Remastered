<?php

class KeuanganController extends Controller {

    public function __construct()
    {
        // Wajib Admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Keuangan & Tagihan';
        $data['tagihan'] = $this->model('Keuangan')->getAllTagihan();

        $this->view('layouts/header', $data);
        $this->view('keuangan/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $data['judul'] = 'Buat Tagihan Baru';
        $data['mahasiswa'] = $this->model('Mahasiswa')->getAllMahasiswa(); // Dropdown mhs

        $this->view('layouts/header', $data);
        $this->view('keuangan/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        if( $this->model('Keuangan')->buatTagihan($_POST) > 0 ) {
            header('Location: ' . BASEURL . '/keuangan');
            exit;
        }
    }

    // Validasi Pembayaran (Terima/Tolak)
    public function validasi($pembayaran_id, $tagihan_id, $aksi)
    {
        // Aksi: 'terima' atau 'tolak'
        $status = ($aksi == 'terima') ? 'Valid' : 'Tolak';
        
        $this->model('Keuangan')->validasiPembayaran($pembayaran_id, $tagihan_id, $status);
        header('Location: ' . BASEURL . '/keuangan');
        exit;
    }
}