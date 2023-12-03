<?php

namespace App\Controllers;

use App\Models\SabukModel;

class SabukController extends BaseController
{
    public function index(): string
    {
        $model = new SabukModel();
        $data['sabuk'] = $model->findAll();
        return view('layout/header') . view('layout/sidebar') . view('layout/navbar') . view('sabuk', $data) . view('layout/footer');
    }
    public function insertDataSabuk()
    {
        $Model = new SabukModel();

        $sabuk = $this->request->getPost('sabuk_karate');
        $data = [
            'sabuk_karate' => $sabuk
        ];

        // Panggil method insert pada model dan berikan data sebagai parameter
        $Model->insert($data);

        // Set pesan sukses dan arahkan ke halaman kriteria dengan pesan
        // Tambahkan pesan sukses atau redirect ke halaman lain sesuai kebutuhan Anda
        session()->setFlashdata('success', 'Data Siswa berhasil ditambahkan.');
        return redirect()->to('/sabuk');
    }
}
