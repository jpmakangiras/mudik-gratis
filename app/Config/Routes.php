<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


// credentials
$routes->add('admin-panel', 'Home::admin_panel');
$routes->add('credentials/validate', 'CredentialsController::validate_user');


// dashboard
$routes->add('admin-panel/dashboard', 'DashboardController::index');

$routes->add('admin-panel/transportasi', 'DashboardController::master_transportasi');
$routes->add('admin-panel/transportasi/simpan', 'DashboardController::create_transportasi');

$routes->add('admin-panel/destinasi', 'DashboardController::master_destinasi');
$routes->add('admin-panel/destinasi/simpan', 'DashboardController::create_destinasi');

$routes->add('admin-panel/jadwal', 'DashboardController::master_jadwal');
$routes->add('admin-panel/jadwal/simpan', 'DashboardController::create_jadwal');

$routes->add('admin-panel/verifikasi', 'DashboardController::master_verifikasi');
$routes->get('admin-panel/verifikasi/simpan/(:segment)', 'DashboardController::update_verifikasi/$1');

// peserta
$routes->add('daftar-mudik', 'ParticipantController::index');
$routes->add('daftar-mudik/simpan', 'ParticipantController::create_peserta'); 
$routes->add('cek-status', 'ParticipantController::cek_status');
$routes->add('cek-status/status', 'ParticipantController::status_verifikasi_peserta');

$routes->add('logout', 'DashboardController::logout'); 

// api
$routes->add('api-verifikasi', 'ParticipantController::api_verifikasi'); 

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
