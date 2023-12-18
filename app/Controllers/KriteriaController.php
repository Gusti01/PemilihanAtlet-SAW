<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

class KriteriaController extends BaseController
{
    public function index(): string
    {
        $model = new KriteriaModel();
        $data['kriteria'] = $model->findAll();
        return view('layout/header') . view('layout/sidebar') . view('layout/navbar') . view('kriteria', $data) . view('layout/footer');
    }
    public function insertDataKriteria()
    {
        $model = new KriteriaModel();

        $nama = $this->request->getPost('nama_kriteria');
        $bobot = $this->request->getPost('bobot');
        $data = [
            'nama_kriteria' => $nama,
            'bobot' =>$bobot
        ];

        // Panggil method insert pada model dan berikan data sebagai parameter
        $model->insert($data);

        // Set pesan sukses dan arahkan ke halaman kriteria dengan pesan
        // Tambahkan pesan sukses atau redirect ke halaman lain sesuai kebutuhan Anda
        session()->setFlashdata('success', 'Data Siswa berhasil ditambahkan.');
        return redirect()->to('/kriteria');
    }
    public function deleteDataKriteria($id)
    {
        $kriteriaModel = new KriteriaModel();

        // Panggil method delete pada model dan berikan ID sebagai parameter
        $kriteriaModel->delete($id);

        // Tambahkan pesan sukses atau redirect ke halaman lain sesuai kebutuhan Anda
        return redirect()->to('/kriteria')->with('success', 'Data deleted successfully');
    }
}
