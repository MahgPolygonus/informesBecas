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
$routes->get('/api/Comuna', 'ComunaController::index');
$routes->get('/api/Comuna/(:segment)', 'ComunaController::getone/$1');
$routes->get('/api/IES', 'IESController::index');
$routes->get('/api/IES/(:segment)', 'IESController::getone/$1');
$routes->get('/api/Tecnologia', 'TecnologiaController::index');
$routes->get('/api/Tecnologia/(:segment)', 'TecnologiaController::getone/$1');
$routes->get('/api/Tecnologia/Ies/(:segment)', 'TecnologiaController::getTecnologiaByIES/$1');
$routes->get('/api/Aspirante', 'AspiranteController::index');
$routes->get('/api/Aspirante/Id/(:segment)', 'AspiranteController::getone/$1');
$routes->get('/api/Aspirante/Ies/(:segment)', 'AspiranteController::getAspiranteByIES/$1');
$routes->get('/api/Aspirante/Lgtbi', 'AspiranteController::getAspirantesByLgtbi');
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
