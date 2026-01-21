<?php

class Database {
    // Kita gunakan konstanta dari Config.php
    // Tidak perlu ditulis manual lagi di sini
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; // Database Handler
    private $stmt; // Statement

    public function __construct()
    {
        // Data Source Name (DSN)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true, // Agar koneksi terjaga
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Agar error muncul jelas
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            // Jika error, hentikan program
            die("Koneksi Database Gagal: " . $e->getMessage());
        }
    }

    // Fungsi untuk menulis query SQL (SELECT, INSERT, dll)
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Binding data (Mencegah SQL Injection)
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

    // Ambil BANYAK data
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil SATU data
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Hitung baris yang berubah
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}