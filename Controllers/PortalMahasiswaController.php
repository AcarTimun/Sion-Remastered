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
    public function khs()
    {
        $data['judul'] = 'Kartu Hasil Studi (KHS)';
        
        $user_id = $_SESSION['user']['id'];
        $db = new Database;
        $db->query("SELECT mahasiswa_id FROM mahasiswa WHERE user_id = :uid");
        $db->bind('uid', $user_id);
        $mhs = $db->single();
        $mahasiswaId = $mhs['mahasiswa_id'];

        // Query Manual ambil nilai
        $db->query("SELECT krs.*, mata_kuliah.nama_matkul, mata_kuliah.sks, mata_kuliah.kode_matkul, dosen.nama_dosen
                    FROM krs
                    JOIN kelas ON krs.kelas_id = kelas.kelas_id
                    JOIN mata_kuliah ON kelas.matkul_id = mata_kuliah.matkul_id
                    JOIN dosen ON kelas.dosen_id = dosen.dosen_id
                    WHERE krs.mahasiswa_id = :mid
                    ORDER BY mata_kuliah.semester_peruntukan ASC");
        $db->bind('mid', $mahasiswaId);
        $data['khs'] = $db->resultSet();

        // Hitung IPK
        $total_bobot = 0;
        $total_sks = 0;
        foreach($data['khs'] as $row) {
            $bobot = 0;
            if($row['grade'] == 'A') $bobot = 4;
            elseif($row['grade'] == 'B') $bobot = 3;
            elseif($row['grade'] == 'C') $bobot = 2;
            elseif($row['grade'] == 'D') $bobot = 1;
            
            $total_bobot += ($bobot * $row['sks']);
            $total_sks += $row['sks'];
        }
        $data['ipk'] = ($total_sks > 0) ? round($total_bobot / $total_sks, 2) : 0;

        $this->view('layouts/header', $data);
        $this->view('mahasiswa/khs/index', $data);
        $this->view('layouts/footer');
    }
    		// Halaman Keuangan Mahasiswa
    public function keuangan()
    {
        $data['judul'] = 'Keuangan Saya';
        
        // Ambil ID Mhs
        $user_id = $_SESSION['user']['id'];
        $db = new Database;
        $db->query("SELECT mahasiswa_id FROM mahasiswa WHERE user_id = :uid");
        $db->bind('uid', $user_id);
        $mhs = $db->single();
        
        $data['tagihan'] = $this->model('Keuangan')->getTagihanByMahasiswa($mhs['mahasiswa_id']);

        $this->view('layouts/header', $data);
        $this->view('mahasiswa/keuangan/index', $data); // Kita buat file ini
        $this->view('layouts/footer');
    }

    // Proses Upload Bukti
    public function bayar()
    {
        // Cek apakah ada file yang diupload
        if ($_FILES['bukti_pembayaran']['error'] === 4) {
            echo "<script>alert('Pilih gambar bukti transfer dulu!'); window.history.back();</script>";
            return false;
        }

        if( $this->model('Keuangan')->uploadBukti($_POST, $_FILES['bukti_pembayaran']) > 0 ) {
            echo "<script>alert('Bukti berhasil diupload! Tunggu validasi Admin.'); window.location.href='" . BASEURL . "/portalmahasiswa/keuangan';</script>";
        } else {
            echo "<script>alert('Gagal upload.'); window.history.back();</script>";
        }
    }
}