<?php

class Krs {
    private $table = 'krs';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Ambil daftar mata kuliah yang SUDAH diambil oleh mahasiswa tertentu
    public function getKrsByMahasiswa($mhs_id)
    {
        $query = "SELECT krs.krs_id, kelas.kode_kelas, kelas.hari, kelas.jam_mulai, kelas.jam_selesai,
                         mata_kuliah.nama_matkul, mata_kuliah.sks, mata_kuliah.kode_matkul,
                         dosen.nama_dosen
                  FROM " . $this->table . "
                  JOIN kelas ON krs.kelas_id = kelas.kelas_id
                  JOIN mata_kuliah ON kelas.matkul_id = mata_kuliah.matkul_id
                  JOIN dosen ON kelas.dosen_id = dosen.dosen_id
                  WHERE krs.mahasiswa_id = :id
                  ORDER BY kelas.hari DESC";

        $this->db->query($query);
        $this->db->bind('id', $mhs_id);
        return $this->db->resultSet();
    }

    // Input KRS (Mahasiswa mengambil kelas)
    public function tambahKrs($data)
    {
        // Cek dulu apakah sudah pernah ambil kelas ini? (Biar gak dobel)
        // Logika sederhana: Cek ID Kelas dan ID Mahasiswa
        $this->db->query("SELECT * FROM " . $this->table . " WHERE mahasiswa_id = :mhs AND kelas_id = :kelas");
        $this->db->bind('mhs', $data['mahasiswa_id']);
        $this->db->bind('kelas', $data['kelas_id']);
        $this->db->execute();
        
        if($this->db->rowCount() > 0) {
            return 0; // Gagal, sudah diambil
        }

        // Kalau belum, insert
        $query = "INSERT INTO " . $this->table . " (mahasiswa_id, kelas_id) VALUES (:mhs, :kelas)";
        $this->db->query($query);
        $this->db->bind('mhs', $data['mahasiswa_id']);
        $this->db->bind('kelas', $data['kelas_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Hapus KRS (Batal ambil)
    public function hapusKrs($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE krs_id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // Hitung Total SKS yang sudah diambil
    public function hitungTotalSks($mhs_id)
    {
        $query = "SELECT SUM(mata_kuliah.sks) as total_sks 
                  FROM " . $this->table . "
                  JOIN kelas ON krs.kelas_id = kelas.kelas_id
                  JOIN mata_kuliah ON kelas.matkul_id = mata_kuliah.matkul_id
                  WHERE krs.mahasiswa_id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $mhs_id);
        $result = $this->db->single();
        return $result['total_sks'] ?? 0;
    }
}