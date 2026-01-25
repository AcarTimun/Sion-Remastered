<?php

class User {
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    // Update Password Baru
    public function updatePassword($id, $newHash)
    {
        $query = "UPDATE " . $this->table . " SET password = :pass WHERE user_id = :id";
        
        $this->db->query($query);
        $this->db->bind('pass', $newHash);
        $this->db->bind('id', $id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
}