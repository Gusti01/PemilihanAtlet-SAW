<?php

namespace App\Controllers;

use App\Models\LoginModel; 

class LoginController extends BaseController
{
    public function index()
    {
        return view('layout/header') . view('login') . view('layout/footer');
    }
    public function login()
    {
        $model = new LoginModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->cek_login($username, $password);
        if ($data) {
            // Jika data sesuai, simpan data pada session dan redirect ke halaman dashboard
            session()->set('user_id', $data['id']);
            session()->set('username', $data['username']);
            session()->setFlashdata('success', $data['username']);
            return redirect()->to('/dashboard');
        } else {
            // Jika data tidak sesuai, tampilkan pesan error pada halaman login
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->back();
        }
    }
    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('pesan', 'Berhasil Logout');
        return redirect()->to('/');
    }
}
