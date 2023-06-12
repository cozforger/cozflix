<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('/', 'Home::index');
$routes->get('/filmx', 'Home::filmx');
$routes->get('/detail/(:segment)', 'Home::detail/$1');
$routes->get('/filmsaya/', 'Beli::filmsaya', ['filter' => 'adminOnly']);
$routes->get('/beli/(:segment)', 'Beli::index/$1', ['filter' => 'adminOnly']);
$routes->post('/beli/(:segment)', 'Beli::beli_insert/$1', ['filter' => 'adminOnly']);

$routes->get('/admin', 'Admin::index', ['filter' => 'adminOnly']);
$routes->get('/admin/transaksi', 'Transaksi::list', ['filter' => 'adminOnly']);

$routes->get('/admin/dompetku', 'Dompetku::list', ['filter' => 'adminOnly']);
$routes->get('/admin/dompetku/insert', 'Dompetku::insert', ['filter' => 'adminOnly']);
$routes->post('/admin/dompetku/insert', 'Dompetku::insert_save', ['filter' => 'adminOnly']);
$routes->get('/admin/dompetku/(:segment)', 'Dompetku::update/$1', ['filter' => 'adminOnly']);
$routes->post('/admin/dompetku/(:segment)', 'Dompetku::update_save/$1', ['filter' => 'adminOnly']);
$routes->get('/admin/dompetku/delete/(:segment)', 'Dompetku::delete/$1', ['filter' => 'adminOnly']);

$routes->get('/kategori', 'Kategori::list');
$routes->get('/kategori/insert', 'Kategori::insert');
$routes->post('/kategori/insert', 'Kategori::insert_save');
$routes->get('/kategori/(:segment)', 'Kategori::update/$1');
$routes->post('/kategori/(:segment)', 'Kategori::update_save/$1');
$routes->get('/kategori/delete/(:segment)', 'Kategori::delete/$1');

$routes->get('/admin/film', 'Film::list', ['filter' => 'adminOnly']);
$routes->get('/admin/film/insert', 'Film::insert', ['filter' => 'adminOnly']);
$routes->post('/admin/film/insert', 'Film::insert_save', ['filter' => 'adminOnly']);
$routes->get('/admin/film/(:segment)', 'Film::update/$1', ['filter' => 'adminOnly']);
$routes->post('/admin/film/(:segment)', 'Film::update_save/$1', ['filter' => 'adminOnly']);
$routes->get('/admin/film/delete/(:segment)', 'Film::delete/$1', ['filter' => 'adminOnly']);

$routes->get('/export/film_xls', 'FileExport::film_xls', ['filter' => 'adminOnly']);
$routes->get('/export/film_pdf', 'FileExport::film_pdf', ['filter' => 'adminOnly']);
$routes->get('/export/transaksi_pdf', 'FileExport::transaksi_pdf', ['filter' => 'adminOnly']);
$routes->get('/export/transaksi_xls', 'FileExport::transaksi_xls', ['filter' => 'adminOnly']);

$routes->get('/admin/chart/pie', 'Chart::pie', ['filter' => 'adminOnly']);
$routes->get('/admin/chart/line', 'Chart::line', ['filter' => 'adminOnly']);

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login_post');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register_post');
$routes->get('/logout', 'Auth::logout');

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
