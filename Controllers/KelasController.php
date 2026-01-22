<?php

class KelasController extends Controller {

    public function __construct()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Kelas - Sion Remastered';
        $data['kelas'] = $this->model('Kelas')->getAllKelas();

        $this->view('layouts/header', $data);
        $this->view('kelas/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $data['judul'] = 'Buka Kelas Baru';
        
        // Ambil Data Master untuk Dropdown (Select Option)
        $data['dosen'] = $this->model('Dosen')->getAllDosen();
        $data['matkul'] = $this->model('Matkul')->getAllMatkul();

        $this->view('layouts/header', $data);
        $this->view('kelas/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        if( $this->model('Kelas')->tambahKelas($_POST) > 0 ) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        } else {
            echo "<script>alert('Gagal membuat kelas'); window.history.back();</script>";
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Jadwal Kelas';
        $data['kelas'] = $this->model('Kelas')->getKelasById($id);
        
        // Ambil Data Master lagi untuk Dropdown
        $data['dosen'] = $this->model('Dosen')->getAllDosen();
        $data['matkul'] = $this->model('Matkul')->getAllMatkul();

        $this->view('layouts/header', $data);
        $this->view('kelas/edit', $data);
        $this->view('layouts/footer');
    }

    public function update()
    {
        if( $this->model('Kelas')->updateKelas($_POST) >= 0 ) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }

    public function delete($id)
    {
        if( $this->model('Kelas')->hapusKelas($id) > 0 ) {
            header('Location: ' . BASEURL . '/kelas');
            exit;
        }
    }
}