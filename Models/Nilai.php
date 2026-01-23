<?php

class Nilai {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Ambil daftar kelas yang diajar oleh Dosen tertentu
    public function getKelasByDosen($dosen_id)
    {
        $this->db->query("SELECT kelas.*, mata_kuliah.nama_matkul, mata_kuliah.sks 
                          FROM kelas 
                          JOIN mata_kuliah ON kelas.matkul_id = mata_kuliah.matkul_id
                          WHERE kelas.dosen_id = :did
                          ORDER BY kelas.hari DESC");
        $this->db->bind('did', $dosen_id);
        return $this->db->resultSet();
    }

    // Ambil daftar mahasiswa di dalam kelas tertentu (Beserta nilainya)
    public function getPesertaKelas($kelas_id)
    {
        $this->db->query("SELECT krs.*, mahasiswa.nim, mahasiswa.nama_mahasiswa 
                          FROM krs 
                          JOIN mahasiswa ON krs.mahasiswa_id = mahasiswa.mahasiswa_id
                          WHERE krs.kelas_id = :kid
                          ORDER BY mahasiswa.nim ASC");
        $this->db->bind('kid', $kelas_id);
        return $this->db->resultSet();
    }

    // Simpan Nilai Per Mahasiswa
    public function updateNilai($krs_id, $tugas, $uts, $uas)
    {
        // 1. Hitung Rumus Nilai Akhir (NA)
        // Bobot: Tugas 30%, UTS 30%, UAS 40%
        $na = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);

        // 2. Tentukan Grade Huruf
        if ($na >= 85) $grade = 'A';
        elseif ($na >= 75) $grade = 'B';
        elseif ($na >= 60) $grade = 'C';
        elseif ($na >= 50) $grade = 'D';
        else $grade = 'E';

        // 3. Update ke Database
        $query = "UPDATE krs SET 
                    nilai_tugas = :tugas, 
                    nilai_uts = :uts, 
                    nilai_uas = :uas, 
                    nilai_akhir = :na, 
                    grade = :grade 
                  WHERE krs_id = :id";
        
        $this->db->query($query);
        $this->db->bind('tugas', $tugas);
        $this->db->bind('uts', $uts);
        $this->db->bind('uas', $uas);
        $this->db->bind('na', $na);
        $this->db->bind('grade', $grade);
        $this->db->bind('id', $krs_id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}