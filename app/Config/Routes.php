<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
service('auth')->routes($routes);
$routes->get('/', 'Home::index');
$routes->get('afterlogin', 'Home::afterLogin');
// $routes->get('admin/dashboard', 'Home::admin');
// $routes->get('statistik', 'Home::siswa');
$routes->get('statistik', 'Home::admin');


// COBA T

$routes->get('gelombang_satu', 'Gelombang::satu');
$routes->get('form', 'Form::index');
$routes->post('ppdb/simpan', 'Form::simpan');

$routes->group('ppdb', function ($routes) {
    // tambah pendaftar
    $routes->get('form', 'Form::index', ['as' => 'ppdb.form']);
    $routes->post('simpan', 'Form::simpan', ['as' => 'ppdb_simpan']);

    // daftar calon siswa
    $routes->get('daftar', 'Form::daftar', ['as' => 'ppdb.daftar']);

    // detail calon siswa 
    $routes->get('detail/(:num)', 'Form::detail/$1', ['as' => 'ppdb.detail']);

    // update data
    $routes->post('update/(:num)', 'Form::update/$1');



    // gelombang
    $routes->get('gelombang_satu', 'Gelombang::satu', ['as' => 'ppdb.gelombang_satu']);


    $routes->get('form_gelombang/(:num)', 'Gelombang::form_gelombang/$1', ['as' => 'ppdb.form_gelombang']);
    $routes->post('submit_gelombang_form', 'Gelombang::simpan');



    $routes->get('calon-siswa', 'calonSiswa::calonSiswa');
});




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
