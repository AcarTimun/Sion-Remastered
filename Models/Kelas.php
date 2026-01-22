<?php

class Kelas {
    private $table = 'kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        // Join 3 Tabel: Kelas -> Matkul -> Dosen
        $query = "SELECT kelas.*, mata_kuliah.nama_matkul, mata_kuliah.sks, mata_kuliah.semester_peruntukan, dosen.nama_dosen 
                  FROM " . $this->table . " 
                  JOIN mata_kuliah ON kelas.matkul_id = mata_kuliah.matkul_id
                  JOIN dosen ON kelas.dosen_id = dosen.dosen_id
                  ORDER BY mata_kuliah.semester_peruntukan ASC, kelas.hari ASC";
        
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getKelasById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE kelas_id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahKelas($data)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
                  VALUES (:matkul, :dosen, :kode, :hari, :mulai, :selesai, :kapasitas)";
        
        $this->db->query($query);
        $this->db->bind('matkul', $data['matkul_id']);
        $this->db->bind('dosen', $data['dosen_id']);
        $this->db->bind('kode', $data['kode_kelas']);
        $this->db->bind('hari', $data['hari']);
        $this->db->bind('mulai', $data['jam_mulai']);
        $this->db->bind('selesai', $data['jam_selesai']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateKelas($data)
    {
        $query = "UPDATE " . $this->table . " SET 
                    matkul_id = :matkul,
                    dosen_id = :dosen,
                    kode_kelas = :kode,
                    hari = :hari,
                    jam_mulai = :mulai,
                    jam_selesai = :selesai,
                    kapasitas = :kapasitas
                  WHERE kelas_id = :id";
        
        $this->db->query($query);
        $this->db->bind('matkul', $data['matkul_id']);
        $this->db->bind('dosen', $data['dosen_id']);
        $this->db->bind('kode', $data['kode_kelas']);
        $this->db->bind('hari', $data['hari']);
        $this->db->bind('mulai', $data['jam_mulai']);
        $this->db->bind('selesai', $data['jam_selesai']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->bind('id', $data['kelas_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusKelas($id)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE kelas_id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}