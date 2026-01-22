<?php

class Mahasiswa {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Ambil semua data mahasiswa + username loginnya
    public function getAllMahasiswa()
    {
        $this->db->query("SELECT mahasiswa.*, users.username 
                          FROM " . $this->table . " 
                          JOIN users ON mahasiswa.user_id = users.user_id 
                          ORDER BY nim ASC");
        return $this->db->resultSet();
    }

    // Ambil 1 data untuk Edit
    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE mahasiswa_id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambah Mahasiswa (Transaction: User + Profile)
    public function tambahDataMahasiswa($data)
    {
        try {
            // 1. Buat Akun Login (Tabel Users)
            $queryUser = "INSERT INTO users (username, password, role) VALUES (:username, :password, 'mahasiswa')";
            $this->db->query($queryUser);
            $this->db->bind('username', $data['nim']); // Username = NIM
            $this->db->bind('password', password_hash('123', PASSWORD_DEFAULT)); // Default Pass: 123
            $this->db->execute();

            // Ambil ID User yang baru dibuat
            $this->db->query("SELECT user_id FROM users WHERE username = :username ORDER BY user_id DESC LIMIT 1");
            $this->db->bind('username', $data['nim']);
            $user = $this->db->single();
            $newUserId = $user['user_id'];

            // 2. Buat Data Profil (Tabel Mahasiswa)
            $queryMhs = "INSERT INTO mahasiswa (user_id, nim, nama_mahasiswa, prodi, angkatan, semester_aktif) 
                         VALUES (:user_id, :nim, :nama, :prodi, :angkatan, 1)";
            
            $this->db->query($queryMhs);
            $this->db->bind('user_id', $newUserId);
            $this->db->bind('nim', $data['nim']);
            $this->db->bind('nama', $data['nama_mahasiswa']);
            $this->db->bind('prodi', $data['prodi']);
            $this->db->bind('angkatan', $data['angkatan']);
            
            $this->db->execute();

            return $this->db->rowCount();

        } catch (PDOException $e) {
            return 0; // Gagal (biasanya karena NIM kembar)
        }
    }

    // Update Mahasiswa
    public function updateDataMahasiswa($data)
    {
        // NIM tidak diupdate (karena Username Login), hanya Nama, Prodi, Angkatan
        $query = "UPDATE " . $this->table . " SET 
                    nama_mahasiswa = :nama,
                    prodi = :prodi,
                    angkatan = :angkatan
                  WHERE mahasiswa_id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama_mahasiswa']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('angkatan', $data['angkatan']);
        $this->db->bind('id', $data['mahasiswa_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // Hapus Mahasiswa (Cascade Delete User)
    public function hapusDataMahasiswa($id)
    {
        // Cari user_id dulu
        $this->db->query("SELECT user_id FROM " . $this->table . " WHERE mahasiswa_id = :id");
        $this->db->bind('id', $id);
        $mhs = $this->db->single();

        // Hapus User (Profil mahasiswa otomatis hilang karena setting database ON DELETE CASCADE)
        $this->db->query("DELETE FROM users WHERE user_id = :user_id");
        $this->db->bind('user_id', $mhs['user_id']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
}