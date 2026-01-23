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
    public function nilai()
    {
        $data['judul'] = 'Input Nilai Mahasiswa';
        
        // Cari Dosen ID dulu dari session user
        $user_id = $_SESSION['user']['id'];
        $db = new Database;
        $db->query("SELECT dosen_id FROM dosen WHERE user_id = :uid");
        $db->bind('uid', $user_id);
        $dosen = $db->single();
        
        // Ambil kelas yang diajar dosen ini
        $data['kelas_ajar'] = $this->model('Nilai')->getKelasByDosen($dosen['dosen_id']);

        $this->view('layouts/header', $data);
        $this->view('dosen/nilai/index', $data); 
        $this->view('layouts/footer');
    }

    // 2. Halaman Form Input Nilai (Detail Kelas)
    public function input_nilai($kelas_id)
    {
        $data['judul'] = 'Input Nilai';
        $data['peserta'] = $this->model('Nilai')->getPesertaKelas($kelas_id);
        
        // Ambil info kelas buat judul
        $data['info_kelas'] = $this->model('Kelas')->getKelasById($kelas_id); 

        $this->view('layouts/header', $data);
        $this->view('dosen/nilai/input', $data);
        $this->view('layouts/footer');
    }

    // 3. Proses Simpan Nilai (Bulk Update)
    public function store_nilai()
    {
        // Loop data dari form array
        $dataNilai = $_POST['nilai'];
        $kelas_id = $_POST['kelas_id'];

        foreach ($dataNilai as $krs_id => $nilai) {
            $tugas = $nilai['tugas'];
            $uts = $nilai['uts'];
            $uas = $nilai['uas'];

            // Panggil model update
            $this->model('Nilai')->updateNilai($krs_id, $tugas, $uts, $uas);
        }

        echo "<script>alert('Nilai berhasil disimpan!'); window.location.href='" . BASEURL . "/portaldosen/input_nilai/$kelas_id';</script>";
    }
}