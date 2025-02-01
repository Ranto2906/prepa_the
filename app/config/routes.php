<?php

use app\controllers\UtilisateurController;
use app\controllers\AdminController;
use app\controllers\CategorieDepenseController;
use app\controllers\ConfigurationController;
use app\controllers\CueilleurController;
use app\controllers\ParcelleController;
use app\controllers\VarieteController;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

//users 
$Utilisateur_Controller = new UtilisateurController();
$router->get('/', [$Utilisateur_Controller, 'mainPage']);
$router->post('/', [$Utilisateur_Controller, 'login']);

//admin 
$Admin_Controller = new AdminController();
$router->get('/admin', [$Admin_Controller, 'loginPage']);
$router->post('/admin', [$Admin_Controller, 'login']);


//variete 
$Variete_Controller = new VarieteController();
$router->get('/varietes', [$Variete_Controller, 'getAllVarietes']);
$router->post('/varietes/add', [$Variete_Controller, 'addVariete']);
$router->post('/varietes/delete', [$Variete_Controller, 'deleteVariete']);
$router->post('/varietes/update', [$Variete_Controller, 'updateVariete']);

//parcelle 
$Parcelle_Controller = new ParcelleController();
$router->get('/parcelles', [$Parcelle_Controller, 'getAllParcelles']);
$router->post('/parcelles/add', [$Parcelle_Controller, 'addParcelle']);
$router->post('/parcelles/delete', [$Parcelle_Controller, 'deleteParcelle']);
$router->post('/parcelles/update', [$Parcelle_Controller, 'updateParcelle']);

//cueilleur 
$Cueilleur_Controller = new CueilleurController();
$router->get('/cueilleurs', [$Cueilleur_Controller, 'getAllCueilleurs']);
$router->post('/cueilleurs/add', [$Cueilleur_Controller, 'addCueilleur']);
$router->post('/cueilleurs/delete', [$Cueilleur_Controller, 'deleteCueilleur']);
$router->post('/cueilleurs/update', [$Cueilleur_Controller, 'updateCueilleur']);

//categorie depense 
$Categorie_Depense_Controller = new CategorieDepenseController();
$router->get('/categorieDepense', [$Categorie_Depense_Controller, 'getAllCategoriesDepense']);
$router->post('/categorieDepense/add', [$Categorie_Depense_Controller, 'addCategoriesDepense']);
$router->post('/categorieDepense/delete', [$Categorie_Depense_Controller, 'deleteCategoriesDepense']);
$router->post('/categorieDepense/update', [$Categorie_Depense_Controller, 'updateCategoriesDepense']);

//configuration
$Configuration_Controller = new ConfigurationController();
$router->get('/configuration', [$Configuration_Controller, 'showConfiguration']);
$router->post('/configuration/add', [$Configuration_Controller, 'saveConfiguration']);