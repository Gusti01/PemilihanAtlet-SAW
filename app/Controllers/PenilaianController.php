<?php

namespace App\Controllers;
use App\Models\PenilaianModel;
use App\Models\PesertaModel;

class PenilaianController extends BaseController
{
    public function index()
    {
        $model = new PenilaianModel();
        $model1 = new PesertaModel();
        $data['peserta'] = $model1->getPeserta();
        $data['penilaian'] = $model->getDataPenilaian();
        $data['skala'] = $model->penilaian();
        return view('layout/header') . view('layout/sidebar') . view('layout/navbar') . view('penilaian', $data) . view('layout/footer');
    }
    public function insertDataPenilaian()
    {
        $model = new PenilaianModel();

        $id_peserta = $this->request->getPost('id_peserta');
        $umur = $this->request->getPost('umur');
        $kedisiplinan = $this->request->getPost('kedisiplinan');
        $kesehatan = $this->request->getPost('kesehatan');
        $teknik_pukulan = $this->request->getPost('teknik_pukulan');
        $teknik_tendangan = $this->request->getPost('teknik_tendangan');
        $kekuatan_fisik = $this->request->getPost('kekuatan_fisik');
        $data = [
            'id_peserta' => $id_peserta,
            'umur' => $umur,
            'kedisiplinan' => $kedisiplinan,
            'kesehatan' => $kesehatan,
            'teknik_pukulan' => $teknik_pukulan,
            'teknik_tendangan' => $teknik_tendangan,
            'kekuatan_fisik' => $kekuatan_fisik

        ];

        // Panggil method insert pada model dan berikan data sebagai parameter
        $model->insert($data);

        // Set pesan sukses dan arahkan ke halaman kriteria dengan pesan
        // Tambahkan pesan sukses atau redirect ke halaman lain sesuai kebutuhan Anda
        session()->setFlashdata('success', 'Data Siswa berhasil ditambahkan.');
        return redirect()->to('/penilaian');
    }

    public function deleteDataPenilaian($id)
    {
        $penilaianModel = new PenilaianModel();

        // Panggil method delete pada model dan berikan ID sebagai parameter
        $penilaianModel->delete($id);

        // Tambahkan pesan sukses atau redirect ke halaman lain sesuai kebutuhan Anda
        return redirect()->to('/penilaian')->with('success', 'Data deleted successfully');
    }


}
