<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use App\Models\PenilaianModel;
use App\Models\PesertaModel;
use App\Models\SabukModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $model = new SabukModel();
        $model1 = new PesertaModel();
        $model2= new PenilaianModel();
        $model3 = new KriteriaModel();
        $data =
            [
                'sabuk' => $model->getSabuk(),
                'peserta' => $model1->countPeserta(),
                'penilaian' => $model2->countPenilaian(),
                'kriteria' => $model3->countRule()
            ]
        ;
        return view('layout/header') . view('layout/sidebar') . view('layout/navbar') . view('dashboard', $data) . view('layout/footer');
    }
}
