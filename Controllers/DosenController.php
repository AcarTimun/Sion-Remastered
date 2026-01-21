<?php

class DosenController extends Controller {

    public function __construct()
    {
        // Validasi: Hanya Admin yang boleh akses
        if ($_SESSION['user']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Dosen - Sion Remastered';
        $data['dosen'] = $this->model('Dosen')->getAllDosen();

        $this->view('layouts/header', $data);
        $this->view('dosen/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Dosen - Sion Remastered';

        $this->view('layouts/header', $data);
        $this->view('dosen/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        // Cek data masuk
        if( $this->model('Dosen')->tambahDataDosen($_POST) > 0 ) {
            // Disini bisa tambah Flash Message kalau mau (Next Level)
            header('Location: ' . BASEURL . '/dosen');
            exit;
        } else {
            // Gagal
            echo "<script>alert('Gagal menambah data! NIDN mungkin sudah ada.'); window.history.back();</script>";
        }
    }
    // ... (kode atasnya biarkan). jangan di copas ni. kebawah

    public function edit($id)
    {
        $data['judul'] = 'Edit Data Dosen - Sion Remastered';
        $data['dosen'] = $this->model('Dosen')->getDosenById($id);

        $this->view('layouts/header', $data);
        $this->view('dosen/edit', $data); // Kita akan buat file ini
        $this->view('layouts/footer');
    }

    public function update()
    {
        // Panggil Model Update
        // Kita pakai rowCount() >= 0 karena kalau data tidak ada yang berubah, rowCount return 0 (bukan error)
        if( $this->model('Dosen')->updateDataDosen($_POST) >= 0 ) {
            header('Location: ' . BASEURL . '/dosen');
            exit;
        } else {
             // Kalau error SQL
             echo "<script>alert('Gagal update data!'); window.history.back();</script>";
        }
    }

   
    public function delete($id)
    {
        if( $this->model('Dosen')->hapusDataDosen($id) > 0 ) {
            header('Location: ' . BASEURL . '/dosen');
            exit;
        }
    }
    
}