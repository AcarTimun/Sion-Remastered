<?php

class Matkul {
    private $table = 'mata_kuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatkul()
    {
        $this->db->query("SELECT * FROM " . $this->table . " ORDER BY semester_peruntukan ASC, nama_matkul ASC");
        return $this->db->resultSet();
    }

    public function getMatkulById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE matkul_id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMatkul($data)
    {
        $query = "INSERT INTO " . $this->table . " (kode_matkul, nama_matkul, sks, semester_peruntukan) 
                  VALUES (:kode, :nama, :sks, :smt)";
        
        $this->db->query($query);
        $this->db->bind('kode', $data['kode_matkul']);
        $this->db->bind('nama', $data['nama_matkul']);
        $this->db->bind('sks', $data['sks']);
        $this->db->bind('smt', $data['semester']); // Di form name="semester"
        
        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            return 0; // Biasanya error kalau Kode Matkul kembar
        }
    }

    public function updateDataMatkul($data)
    {
        $query = "UPDATE " . $this->table . " SET 
                    kode_matkul = :kode,
                    nama_matkul = :nama,
                    sks = :sks,
                    semester_peruntukan = :smt
                  WHERE matkul_id = :id";
        
        $this->db->query($query);
        $this->db->bind('kode', $data['kode_matkul']);
        $this->db->bind('nama', $data['nama_matkul']);
        $this->db->bind('sks', $data['sks']);
        $this->db->bind('smt', $data['semester']);
        $this->db->bind('id', $data['matkul_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMatkul($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE matkul_id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
}