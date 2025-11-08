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
        $this->view('templates/header');
        $this->view('list', $data);
        $this->view('templates/footer', $data);
    }

    // Tampilkan detail user berdasarkan id
    public function detail($id)
    {
        $data["judul"] = "Detail user";
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('detail', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        //mengecek requet yg masuk merupakan POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //memanggil method tambahUser pada User_model
            if ($this->model('User_model')->tambahUser($_POST) > 0) {
                //Set Flaher untuk pesan sukses
                Flasher::setFlash('BERHASIL', 'ditambahkan', 'sukses');
                //Kembalikan kehalaman user
                header('Location: ' . BASEURL . '/user');
                exit;
            } else {
                //set flasher untuk pesan gagal
                Flasher::setFlash('Gagal!', 'ditambahkan', 'danger');
                //kembalikan kehalaman user
                header('Location: ' . BASEURL . "/user");
                exit;
            }
        } else {
            $data["judul"] = "Tambah Data User";

            $this->view('templates/header', $data);
            $this->view('tambah', $data);
            $this->view('templates/footer', $data);
        }
    }

    public function edit($id)
    {
        $data["judul"] = "Edit Data User";
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('edit', $data);
        $this->view('templates/footer', $data);
    }

    public function update()
    {
        //mengecek requet yg masuk merupakan POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //memanggil method tambahUser pada User_model
            if ($this->model('User_model')->editUser($_POST) > 0) {
                //Set Flaher untuk pesan sukses
                Flasher::setFlash('BERHASIL', 'diubah', 'sukses');
                //Kembalikan kehalaman user
                header('Location: ' . BASEURL . '/user');
                exit;
            } else {
                //set flasher untuk pesan gagal
                Flasher::setFlash('Gagal!', 'diubah', 'danger');
                //kembalikan kehalaman user
                header('Location: ' . BASEURL . "/user");
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/user');
        }
    }

    public function hapus($id)
    {
        //memanggil method hapusUser pada User_model
        if ($this->model('User_model')->hapusUser($id) > 0) {
            //Set Flaher untuk pesan sukses
            Flasher::setFlash('BERHASIL', 'dihapus', 'sukses');
            //Kembalikan kehalaman user
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            //set flasher untuk pesan gagal
            Flasher::setFlash('Gagal!', 'dihapus', 'danger');
            //kembalikan kehalaman user
            header('Location: ' . BASEURL . "/user");
            exit;
        }
    }
}
