<?php

class MatkulController extends Controller {

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
        $data['judul'] = 'Data Mata Kuliah - Sion Remastered';
        $data['matkul'] = $this->model('Matkul')->getAllMatkul();

        $this->view('layouts/header', $data);
        $this->view('matkul/index', $data);
        $this->view('layouts/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Mata Kuliah';
        $this->view('layouts/header', $data);
        $this->view('matkul/create', $data);
        $this->view('layouts/footer');
    }

    public function store()
    {
        if( $this->model('Matkul')->tambahDataMatkul($_POST) > 0 ) {
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            echo "<script>alert('Gagal! Kode Matkul mungkin sudah ada.'); window.history.back();</script>";
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Mata Kuliah';
        $data['matkul'] = $this->model('Matkul')->getMatkulById($id);

        $this->view('layouts/header', $data);
        $this->view('matkul/edit', $data);
        $this->view('layouts/footer');
    }

    public function update()
    {
        if( $this->model('Matkul')->updateDataMatkul($_POST) >= 0 ) {
            header('Location: ' . BASEURL . '/matkul');
            exit;
        } else {
            echo "<script>alert('Gagal Update Data'); window.history.back();</script>";
        }
    }

    public function delete($id)
    {
        if( $this->model('Matkul')->hapusDataMatkul($id) > 0 ) {
            header('Location: ' . BASEURL . '/matkul');
            exit;
        }
    }
}