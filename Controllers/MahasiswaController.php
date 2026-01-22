<?php

class MahasiswaController extends Controller {

    public function __construct()
    {
        // Cek Login & Role Admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Mahasiswa - Sion Remastered';
        $data['mhs'] = $this->model('Mahasiswa')->getAllMahasiswa();

        $this->view('layouts/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Mahasiswa';
        $this->view('layouts/header', $data);
        $this->view('mahasiswa/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        if( $this->model('Mahasiswa')->tambahDataMahasiswa($_POST) > 0 ) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            echo "<script>alert('Gagal! NIM mungkin sudah terdaftar.'); window.history.back();</script>";
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa')->getMahasiswaById($id);

        $this->view('layouts/header', $data);
        $this->view('mahasiswa/edit', $data);
        $this->view('layouts/footer');
    }

    public function update()
    {
        // Pakai >= 0 karena kalau data tidak berubah rowCount return 0 (bukan error)
        if( $this->model('Mahasiswa')->updateDataMahasiswa($_POST) >= 0 ) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            echo "<script>alert('Gagal Update Data'); window.history.back();</script>";
        }
    }

    public function delete($id)
    {
        if( $this->model('Mahasiswa')->hapusDataMahasiswa($id) > 0 ) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}