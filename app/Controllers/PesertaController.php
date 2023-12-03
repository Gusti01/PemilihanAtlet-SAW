<?php

namespace App\Controllers;

use App\Models\SabukModel;
use App\Models\PesertaModel;

class PesertaController extends BaseController
{
    public function index()
    {
        $model = new SabukModel();
        $model1 = new PesertaModel();
        $data['sabuk'] = $model->findAll();
        $data['peserta'] = $model1->getPeserta();
        return view('layout/header') . view('layout/sidebar') . view('layout/navbar') . view('peserta', $data) . view('layout/footer');
    }
    public function insertDataPeserta()
    {
        $model = new PesertaModel();

        $nama = $this->request->getPost('nama');
        $usia = $this->request->getPost('usia');
        $alamat = $this->request->getPost('alamat');
        $perguruan_karate = $this->request->getPost('perguruan_karate');
        $id_sabuk = $this->request->getPost('id_sabuk');
        $data = [
            'nama' => $nama,
            'usia' => $usia,
            'alamat' => $alamat,
            'perguruan_karate' => $perguruan_karate,
            'id_sabuk' => $id_sabuk

        ];

        // Panggil method insert pada model dan berikan data sebagai parameter
        $model->insert($data);

        // Set pesan sukses dan arahkan ke halaman kriteria dengan pesan
        // Tambahkan pesan sukses atau redirect ke halaman lain sesuai kebutuhan Anda
        session()->setFlashdata('success', 'Data Siswa berhasil ditambahkan.');
        return redirect()->to('/peserta');
    }
}
