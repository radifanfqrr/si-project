<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/karyawan/viewKaryawan', 'KaryawanController::viewKaryawan');
$routes->post('/karyawan/create', 'KaryawanController::create');
$routes->post('/karyawan/edit/(:num)', 'KaryawanController::edit/$1');
$routes->get('/karyawan/delete/(:num)', 'KaryawanController::delete/$1');
$routes->get('/kriteria/viewKriteria', 'KriteriaController::viewKriteria');
$routes->post('/kriteria/create', 'KriteriaController::create');
$routes->post('/kriteria/edit/(:num)', 'KriteriaController::edit/$1');
$routes->get('/kriteria/delete/(:num)', 'KriteriaController::delete/$1');
$routes->get('/penilaian/viewPenilaian', 'PenilaianController::viewPenilaian'); 
$routes->post('/penilaian/createPenilaian', 'PenilaianController::createPenilaian');
$routes->post('/penilaian/editPenilaian/(:num)/(:num)', 'PenilaianController::editPenilaian/$1/$2');
$routes->post('/penilaian/updateAllPenilaian', 'PenilaianController::updateAllPenilaian');
$routes->get('/penilaian/delete/(:num)/(:num)', 'PenilaianController::deletePenilaian/$1/$2');
$routes->get('/moora/viewNormalization', 'MooraController::viewNormalization');
// $routes->post('/penilaian/deletePenilaian', 'PenilaianController::deletePenilaian');











// $routes->get('/karyawan', 'KaryawanController::viewKaryawan');
// $routes->get('/karyawan/create', 'KaryawanController::create');
// $routes->post('/karyawan/create', 'KaryawanController::create');
// $routes->get('/karyawan/edit/(:num)', 'KaryawanController::edit/$1');
// $routes->post('/karyawan/edit/(:num)', 'KaryawanController::edit/$1');
// $routes->get('/karyawan/delete/(:num)', 'KaryawanController::delete/$1');





/*$routes->get('/', 'Home::index');
$routes->post('home/simpanmhs', 'Home::simpanmhs');
$routes->get('home/viewmhs', 'Home::viewmhs');
$routes->get('home/formeditmhs/(:num)', 'Home::formeditmhs/$1');
$routes->post('home/editmhs/(:num)', 'Home::editmhs/$1');
$routes->get('home/deletemhs/(:num)', 'Home::deleteMhs/$1');

$routes->get('/dashboard', 'Dashboard::index');
*/