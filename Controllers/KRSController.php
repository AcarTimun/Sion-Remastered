<?php

class KrsController extends Controller {

    public function __construct()
    {
        // Cek Login & Role Mahasiswa
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'mahasiswa') {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }
    }

    // Halaman List KRS (Keranjang Belanja)
    public function index()
    {
        $data['judul'] = 'Kartu Rencana Studi (KRS)';
        
        // 1. Cari Data Mahasiswa berdasarkan User ID yang login
        $user_id = $_SESSION['user']['id'];
        // Kita pakai query manual kecil disini untuk dapat mahasiswa_id
        $mhsModel = $this->model('Mahasiswa'); // Pastikan Model Mahasiswa punya getByUserId atau kita query manual di model User
        // Biar cepat, kita asumsikan di session sudah kita simpan id user, 
        // tapi kita butuh mahasiswa_id. 
        // EDIT: Cara paling aman, kita panggil model Mahasiswa.
        // (Nanti di Model Mahasiswa tambahkan fungsi getMhsByUserId kalau belum ada,
        //  tapi sementara kita pakai teknik query langsung di controller ini via Model Mahasiswa yang ada)
        
        // Agar rapi, kita ambil semua kelas yang sudah diambil
        // Tapi kita butuh ID MAHASISWA (bukan ID USER).
        // Kita query dulu ID Mahasiswa-nya.
        $db = new Database;
        $db->query("SELECT mahasiswa_id FROM mahasiswa WHERE user_id = :uid");
        $db->bind('uid', $user_id);
        $mhs = $db->single();
        $mahasiswaId = $mhs['mahasiswa_id'];

        $data['krs'] = $this->model('Krs')->getKrsByMahasiswa($mahasiswaId);
        $data['total_sks'] = $this->model('Krs')->hitungTotalSks($mahasiswaId);

        $this->view('layouts/header', $data);
        $this->view('mahasiswa/krs/index', $data); // Kita buat folder baru
        $this->view('layouts/footer');
    }

    // Halaman Pilih Kelas (Etalase Toko)
    public function create()
    {
        $data['judul'] = 'Ambil Mata Kuliah Baru';
        
        // Tampilkan SEMUA kelas yang tersedia (dari Model Kelas Tahap 5)
        $data['kelas_tersedia'] = $this->model('Kelas')->getAllKelas();

        $this->view('layouts/header', $data);
        $this->view('mahasiswa/krs/create', $data);
        $this->view('layouts/footer');
    }

    // Proses Simpan
    public function store($kelas_id)
    {
        // 1. Cari ID Mahasiswa lagi
        $user_id = $_SESSION['user']['id'];
        $db = new Database;
        $db->query("SELECT mahasiswa_id FROM mahasiswa WHERE user_id = :uid");
        $db->bind('uid', $user_id);
        $mhs = $db->single();
        
        $data = [
            'mahasiswa_id' => $mhs['mahasiswa_id'],
            'kelas_id' => $kelas_id
        ];

        // 2. Input
        if( $this->model('Krs')->tambahKrs($data) > 0 ) {
            header('Location: ' . BASEURL . '/krs');
            exit;
        } else {
            // Gagal (biasanya karena sudah diambil)
            echo "<script>alert('Gagal! Anda mungkin sudah mengambil kelas ini.'); window.location.href='" . BASEURL . "/krs';</script>";
        }
    }

    // Hapus Matkul dari KRS
    public function delete($krs_id)
    {
        if( $this->model('Krs')->hapusKrs($krs_id) > 0 ) {
            header('Location: ' . BASEURL . '/krs');
            exit;
        }
    }
}