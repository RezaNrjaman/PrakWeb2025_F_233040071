<?php

/**
 * Controller User
 * Mengatur tampilan daftar user dan detail user
 */
class User extends Controller
{
    // Method utama - routing berdasarkan parameter id
    public function index()
    {
        $data["judul"] = "Data user";
        $data['users'] = $this->model('User_model')->getAllUsers();
        $this->view('list', $data);
    }

    // Tampilkan detail user berdasarkan id
    public function detail($id)
    {
        $data["judul"] = "Detail user";
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('detail', $data);
    }

    // Tambahkan di dalam class User
    public function tambah()
    {
        // Pengecekan apakah request yang datang adalah POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Proses Insert Data
            if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . 'user');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . 'user');
                exit;
            }
        } else {
            // Jika request bukan POST (misal GET), tampilkan halaman form
            $data['judul'] = 'Tambah User';
            // Asumsi Anda membuat view baru untuk form input
            $this->view('templates/header', $data);
            $this->view('user/tambah', $data); // Buat file views/user/tambah.php
            $this->view('templates/footer');
        }
    }
}
