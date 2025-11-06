<?php

/**
 * Model User
 * Menangani semua operasi database yang berkaitan dengan tabel users
 */
class User_model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Mengambil semua data pengguna dari database
     */
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    /**
     * Mengambil data pengguna berdasarkan ID
     * @param int $id - ID pengguna yang ingin diambil
     */
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambahkan di dalam class User_model
    // File: app/models/User_model.php (Tambahkan method ini)

    public function tambahDataUser($data)
    {
        // Pastikan kolom yang diisi sama dengan kolom di database Anda (asumsi: id, name, email)
        $query = "INSERT INTO " . $this->table . " (name, email) 
              VALUES (:name, :email)";

        $this->db->query($query);

        // Binding data menggunakan data dari POST
        // Gunakan filter_var atau trim untuk sanitasi sederhana
        $this->db->bind('name', htmlspecialchars($data['name']));
        $this->db->bind('email', htmlspecialchars($data['email']));

        $this->db->execute();

        return $this->db->rowCount();
    }
}
