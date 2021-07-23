<?php

namespace App\Controllers;

use \App\Models\AdminModel;

class Admin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        return view('admin/login');
    }

    public function masuk()
    {
        // $model = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $row = $this->adminModel->getLogin($username);

        if ($row == NULL) {
            session()->setFlashdata('pesan', 'Username anda salah');
            return redirect()->to('/');
        } else {
            if ($password == $row->password) {
                $_SESSION['username'] = $username;
                $_SESSION['id_admin'] = $row->id_admin;

                session()->setFlashdata('pesan', 'Login Berhasil');

                return redirect()->to('/admin/dashboard');
            } else {
                session()->setFlashdata('pesan', 'Password Salah');
                return redirect()->to('/');
            }
        }
    }

    public function dashboard()
    {
        return view('admin/admin');
    }

    public function tambah()
    {
        return view('admin/tambah_admin');
    }

    public function data()
    {
        $data = [
            'admin' => $this->adminModel->getAdmin()
        ];

        return view('admin/data_admin', $data);
    }

    public function about($id)
    {
        $data = [
            'admin' => $this->adminModel->getAdmin($id)
        ];

        return view('admin/about', $data);
    }

    public function hapus($id)
    {
        $this->adminModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/admin/data');
    }

    public function simpan()
    {
        $this->adminModel->save([
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'email' => $this->request->getVar('email')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/admin/data');
    }
    public function update($id)
    {
        $this->adminModel->save([
            'id_admin' => $id,
            'password' => $this->request->getVar('password'),
            'email' => $this->request->getVar('email')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        $data = [
            'admin' => $this->adminModel->getAdmin($id)
        ];

        return view('admin/about', $data);
    }
}
