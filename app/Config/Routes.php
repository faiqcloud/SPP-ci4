<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('guru', 'guru::index',['filter' => 'level:admin']);
$routes->get('guru/input', 'guru::input',['filter' => 'level:admin']);
$routes->post('guru/input', 'guru::input',['filter' => 'level:admin']);
$routes->get('guru/delete/(:num)', 'guru::delete/$1',['filter' => 'level:admin']);
$routes->get('guru/edit/(:num)', 'guru::edit/$1',['filter' => 'level:admin']);
$routes->post('guru/edit/(:num)', 'guru::edit/$1',['filter' => 'level:admin']);
$routes->get('guru/export', 'guru::exportToExcel',['filter' => 'level:admin']);


$routes->get('siswa', 'siswa::index',['filter' => 'level:admin']);
$routes->get('siswa/input', 'siswa::input',['filter' => 'level:admin']);
$routes->post('siswa/input', 'siswa::input',['filter' => 'level:admin']);
$routes->get('siswa/delete/(:num)', 'siswa::delete/$1',['filter' => 'level:admin']);
$routes->get('siswa/edit/(:num)', 'siswa::edit/$1',['filter' => 'level:admin']);
$routes->post('siswa/edit/(:num)', 'siswa::edit/$1',['filter' => 'level:admin']);
$routes->get('siswa/export', 'siswa::exportToExcel',['filter' => 'level:admin']);

$routes->get('spp', 'spp::index',['filter' => 'level:admin']);
$routes->get('spp/input', 'spp::input',['filter' => 'level:admin']);
$routes->post('spp/input', 'spp::input',['filter' => 'level:admin']);
$routes->get('spp/delete/(:segment)', 'spp::delete/$1',['filter' => 'level:admin']);
$routes->get('spp/edit/(:segment)', 'spp::edit/$1',['filter' => 'level:admin']);
$routes->post('spp/edit/(:segment)', 'spp::edit/$1',['filter' => 'level:admin']);
$routes->get('spp/detail', 'spp::detail',['filter' => 'level:admin']);

$routes->get('tahunan', 'tahunan::index',['filter' => 'level:admin']);
$routes->get('tahunan/input', 'tahunan::input',['filter' => 'level:admin']);
$routes->post('tahunan/input', 'tahunan::input',['filter' => 'level:admin']);
$routes->get('tahunan/delete/(:segment)', 'tahunan::delete/$1',['filter' => 'level:admin']);
$routes->get('tahunan/edit/(:segment)', 'tahunan::edit/$1',['filter' => 'level:admin']);
$routes->post('tahunan/edit/(:segment)', 'tahunan::edit/$1',['filter' => 'level:admin']);
$routes->get('tahunan/detail', 'tahunan::detail',['filter' => 'level:admin']);

$routes->get('pangkal', 'pangkal::index',['filter' => 'level:admin']);
$routes->get('pangkal/input', 'pangkal::input',['filter' => 'level:admin']);
$routes->post('pangkal/input', 'pangkal::input',['filter' => 'level:admin']);
$routes->get('pangkal/delete/(:segment)', 'pangkal::delete/$1',['filter' => 'level:admin']);
$routes->get('pangkal/edit/(:segment)', 'pangkal::edit/$1',['filter' => 'level:admin']);
$routes->post('pangkal/edit/(:segment)', 'pangkal::edit/$1',['filter' => 'level:admin']);
$routes->get('pangkal/detail', 'pangkal::detail',['filter' => 'level:admin']);

$routes->get('user', 'kuser::index',['filter' => 'level:admin']);
$routes->get('kuser/input', 'kuser::input',['filter' => 'level:admin']);
$routes->post('kuser/input', 'kuser::input',['filter' => 'level:admin']);
$routes->get('kuser/edit/(:num)', 'kuser::edit/$1',['filter' => 'level:admin']);
$routes->post('kuser/edit/(:num)', 'kuser::edit/$1',['filter' => 'level:admin']);
$routes->get('kuser/delete/(:num)', 'kuser::delete/$1',['filter' => 'level:admin']);

//user
$routes->get('cetak/laporan/(:num)', 'user::laporan/$1', ['filter' => 'level:user']);


//login
$routes->get('/', 'auth::login');
$routes->get('login', 'auth::login');
$routes->post('login/process', 'auth::loginProcess');

//logout
$routes->get('logout', 'auth::logout');

//redirect
$routes->get('admin', 'Home::index', ['filter' => 'level:admin']);
$routes->get('vuser', 'user::index', ['filter' => 'level:user']);

