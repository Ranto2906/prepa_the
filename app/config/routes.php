<?php

use app\controllers\UtilisateurController;
use app\controllers\AdminController;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

//users controller
$Utilisateur_Controller = new UtilisateurController();
$router->get('/', [$Utilisateur_Controller, 'mainPage']);

$router->post('/', [$Utilisateur_Controller, 'login']);

//admin controller
$Admin_Controller = new AdminController();

$router->get('/admin', [$Admin_Controller, 'loginPage']);

$router->post('/admin', [$Admin_Controller, 'login']);
