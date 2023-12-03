<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index', ['filter' => 'logoutFilter']);
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'loginFilter']);
$routes->get('/peserta', 'PesertaController::index');
$routes->get('/sabuk', 'SabukController::index');
$routes->get('/kriteria', 'KriteriaController::index');
$routes->get('/penilaian', 'PenilaianController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');

$routes->post('/tambahKriteria', 'KriteriaController::insertDataKriteria');
$routes->post('/tambahPenilaian', 'PenilaianController::insertDataPenilaian');
$routes->post('/tambahSabuk', 'SabukController::insertDataSabuk');
$routes->post('/tambahPeserta', 'PesertaController::insertDataPeserta');
