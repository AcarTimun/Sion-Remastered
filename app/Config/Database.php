<?php

class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = ''; // Default XAMPP/Laragon biasanya kosong
    private $db_name = 'sion_remastered';

    private $dbh; // Database Handler
    private $stmt; // Statement

    public function __construct()
    {
        // Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true, // Agar koneksi terjaga
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Agar error muncul jelas
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            // Jika error, hentikan program dan tampilkan pesan
            die("Koneksi Database Gagal: " . $e->getMessage());
        }
    }

    // Fungsi untuk menulis query SQL (SELECT, INSERT, dll)
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Binding data (Mencegah SQL Injection)
    // Contoh: WHERE id = :id
    public function bind($param, $value, $type = null)
    {
        if( is_null($type) ) {
            switch( true ) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi Query
    public function execute()
    {
        $this->stmt->execute();
    }

    // Ambil BANYAK data (Contoh: Daftar Mahasiswa)
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil SATU data (Contoh: Detail Profil Budi)
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Hitung berapa baris yang berubah (Untuk cek berhasil insert/update/delete)
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}