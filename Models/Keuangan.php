<?php

class Keuangan {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // [ADMIN] Ambil Semua Tagihan (Join ke Mahasiswa)
    public function getAllTagihan()
    {
        $this->db->query("SELECT tagihan.*, mahasiswa.nim, mahasiswa.nama_mahasiswa 
                          FROM tagihan 
                          JOIN mahasiswa ON tagihan.mahasiswa_id = mahasiswa.mahasiswa_id 
                          ORDER BY tagihan.tanggal_terbit DESC");
        return $this->db->resultSet();
    }

    // [ADMIN] Buat Tagihan Baru
    public function buatTagihan($data)
    {
        $query = "INSERT INTO tagihan (mahasiswa_id, judul_tagihan, total_tagihan, sisa_tagihan, jatuh_tempo, status) 
                  VALUES (:mhs, :judul, :total, :total, :tempo, 'Belum Lunas')"; // Sisa awal = Total
        
        $this->db->query($query);
        $this->db->bind('mhs', $data['mahasiswa_id']);
        $this->db->bind('judul', $data['judul_tagihan']);
        $this->db->bind('total', $data['total_tagihan']);
        $this->db->bind('tempo', $data['jatuh_tempo']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    // [ADMIN] Validasi Pembayaran
    public function validasiPembayaran($pembayaran_id, $tagihan_id, $status)
    {
        try {
            // 1. Update Status Pembayaran
            $this->db->query("UPDATE pembayaran SET status_validasi = :status WHERE pembayaran_id = :pid");
            $this->db->bind('status', $status);
            $this->db->bind('pid', $pembayaran_id);
            $this->db->execute();

            // 2. Jika Valid, Update Tagihan jadi LUNAS & Sisa 0
            if ($status == 'Valid') {
                $this->db->query("UPDATE tagihan SET status = 'Lunas', sisa_tagihan = 0 WHERE tagihan_id = :tid");
                $this->db->bind('tid', $tagihan_id);
                $this->db->execute();
            }

            return 1;
        } catch (PDOException $e) {
            return 0;
        }
    }

    // [MAHASISWA] Ambil Tagihan Saya
    public function getTagihanByMahasiswa($mhs_id)
    {
        // Join ke Pembayaran untuk cek status terakhir (Pending/Valid)
        $this->db->query("SELECT tagihan.*, pembayaran.status_validasi, pembayaran.bukti_pembayaran 
                          FROM tagihan 
                          LEFT JOIN pembayaran ON tagihan.tagihan_id = pembayaran.tagihan_id 
                          WHERE tagihan.mahasiswa_id = :mid 
                          ORDER BY tagihan.jatuh_tempo ASC");
        $this->db->bind('mid', $mhs_id);
        return $this->db->resultSet();
    }

    // [MAHASISWA] Upload Bukti Bayar
    public function uploadBukti($data, $file)
    {
        // 1. Upload File Gambar
        $targetDir = "../public/uploads/bukti/"; // Pastikan folder ini ada!
        if (!file_exists($targetDir)) mkdir($targetDir, 0777, true); // Buat folder jika belum ada

        $fileName = time() . '_' . basename($file['name']);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($file['tmp_name'], $targetFilePath);

        // 2. Insert ke Tabel Pembayaran
        $query = "INSERT INTO pembayaran (tagihan_id, jumlah_bayar, bukti_pembayaran, status_validasi) 
                  VALUES (:tid, :jml, :bukti, 'Pending')";
        
        $this->db->query($query);
        $this->db->bind('tid', $data['tagihan_id']);
        $this->db->bind('jml', $data['jumlah_bayar']);
        $this->db->bind('bukti', $fileName);

        $this->db->execute();
        return $this->db->rowCount();
    }
}