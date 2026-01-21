<?php

class Dosen {
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Ambil semua data dosen + info akunnya (username)
    public function getAllDosen()
    {
        $this->db->query("SELECT dosen.*, users.username 
                          FROM " . $this->table . " 
                          JOIN users ON dosen.user_id = users.user_id 
                          ORDER BY nama_dosen ASC");
        return $this->db->resultSet();
    }

    // Tambah Dosen (Sekaligus buat akun User)
    public function tambahDataDosen($data)
    {
        // 1. Siapkan Query Insert ke tabel USERS
        // Kita pakai Transaction manual lewat query karena class Database kita sederhana
        try {
            // A. Insert User dulu
            $queryUser = "INSERT INTO users (username, password, role) VALUES (:username, :password, 'dosen')";
            $this->db->query($queryUser);
            $this->db->bind('username', $data['nidn']); // Username default = NIDN
            $this->db->bind('password', password_hash('123', PASSWORD_DEFAULT)); // Password default = 123
            $this->db->execute();

            // Ambil ID user yang baru dibuat
            // Karena kita pakai PDO wrapper sederhana, kita ambil user terakhir berdasarkan username
            $this->db->query("SELECT user_id FROM users WHERE username = :username ORDER BY user_id DESC LIMIT 1");
            $this->db->bind('username', $data['nidn']);
            $user = $this->db->single();
            $newUserId = $user['user_id'];

            // B. Insert Profile Dosen
            $queryDosen = "INSERT INTO dosen (user_id, nidn, nama_dosen, email) 
                           VALUES (:user_id, :nidn, :nama_dosen, :email)";
            
            $this->db->query($queryDosen);
            $this->db->bind('user_id', $newUserId);
            $this->db->bind('nidn', $data['nidn']);
            $this->db->bind('nama_dosen', $data['nama_dosen']);
            $this->db->bind('email', $data['email']);
            
            $this->db->execute();

            return $this->db->rowCount(); // Berhasil jika return > 0

        } catch (PDOException $e) {
            return 0; // Gagal
        }
    }

    // Hapus Dosen (Otomatis hapus User karena ON DELETE CASCADE di database)
    public function hapusDataDosen($id)
    {
        // Kita cari dulu user_id nya berapa
        $this->db->query("SELECT user_id FROM " . $this->table . " WHERE dosen_id = :id");
        $this->db->bind('id', $id);
        $dosen = $this->db->single();
        $userId = $dosen['user_id'];

        // Hapus usernya, maka dosennya otomatis terhapus (Fitur Database)
        $this->db->query("DELETE FROM users WHERE user_id = :user_id");
        $this->db->bind('user_id', $userId);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function getDosenById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE dosen_id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // UPDATE DATA DOSEN
    public function updateDataDosen($data)
    {
        // Note: NIDN tidak kita update karena itu username (dikunci)
        // Kita hanya update Nama dan Email
        $query = "UPDATE " . $this->table . " SET 
                    nama_dosen = :nama_dosen,
                    email = :email
                  WHERE dosen_id = :dosen_id";
        
        $this->db->query($query);
        $this->db->bind('nama_dosen', $data['nama_dosen']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('dosen_id', $data['dosen_id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

}