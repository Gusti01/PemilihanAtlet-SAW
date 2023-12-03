<?php

namespace App\Controllers;
use App\Models\SabukModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $model = new SabukModel();
        $data['sabuk'] = $model->getSabuk();
        return view('layout/header') . view('layout/sidebar') . view('layout/navbar') . view('dashboard', $data) . view('layout/footer');
    }
}
