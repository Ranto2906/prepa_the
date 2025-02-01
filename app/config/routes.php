<?php

use app\controllers\UtilisateurController;
use app\controllers\AdminController;
use app\controllers\CategorieDepenseController;
use app\controllers\ConfigurationController;
use app\controllers\CueilletteController;
use app\controllers\CueilleurController;
use app\controllers\DepenseController;
use app\controllers\ParcelleController;
use app\controllers\VarieteController;
use app\controllers\ResultatController;
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
$router->get('/varietes/addForm', function () {
    Flight::render('admin/pages/varietes-form');
});
$router->post('/varietes/add', [$Variete_Controller, 'addVariete']);
$router->post('/varietes/delete', [$Variete_Controller, 'deleteVariete']);
$router->get('/varietes/updateForm', [$Variete_Controller, 'updatePage']);
$router->post('/varietes/update', [$Variete_Controller, 'updateVariete']);

//parcelle 
$Parcelle_Controller = new ParcelleController();
$router->get('/parcelles', [$Parcelle_Controller, 'getAllParcelles']);
$router->get('/parcelles/addForm', function () {
    Flight::render('admin/pages/parcelles-form');
});
$router->post('/parcelles/add', [$Parcelle_Controller, 'addParcelle']);
$router->post('/parcelles/delete', [$Parcelle_Controller, 'deleteParcelle']);
$router->post('/parcelles/update', [$Parcelle_Controller, 'updateParcelle']);

//cueilleur 
$Cueilleur_Controller = new CueilleurController();
$router->get('/cueilleurs', [$Cueilleur_Controller, 'getAllCueilleurs']);
$router->get('/cueilleurs/addForm', function () {
    Flight::render('admin/pages/cueilleurs-form');
});
$router->post('/cueilleurs/add', [$Cueilleur_Controller, 'addCueilleur']);
$router->post('/cueilleurs/delete', [$Cueilleur_Controller, 'deleteCueilleur']);
$router->get('/cueilleurs/updateForm', [$Cueilleur_Controller, 'updatePage']);
$router->post('/cueilleurs/update', [$Cueilleur_Controller, 'updateCueilleur']);

//categorie depense 
$Categorie_Depense_Controller = new CategorieDepenseController();
$router->get('/categorieDepense', [$Categorie_Depense_Controller, 'getAllCategoriesDepense']);
$router->get('/categorieDepense/addForm', function () {
    Flight::render('admin/pages/categories-form');
});
$router->post('/categorieDepense/add', [$Categorie_Depense_Controller, 'addCategoriesDepense']);
$router->post('/categorieDepense/delete', [$Categorie_Depense_Controller, 'deleteCategoriesDepense']);
$router->post('/categorieDepense/updateForm', [$Categorie_Depense_Controller, 'updatePage']);
$router->post('/categorieDepense/update', [$Categorie_Depense_Controller, 'updateCategoriesDepense']);

//configuration
$Configuration_Controller = new ConfigurationController();
$router->get('/configuration', [$Configuration_Controller, 'showConfiguration']);
$router->get('/configuration/addForm', function () {
    Flight::render('admin/pages/configuration-form');
});
$router->post('/configuration/add', [$Configuration_Controller, 'saveConfiguration']);

//cueillette
$Cueillette_Controller = new CueilletteController();
$router->get('/cueillette', [$Cueillette_Controller, 'getAllCueillettes']);
$router->get('/cueillette/addForm', [$Cueillette_Controller, 'addPage']);
$router->post('/cueillette/add', [$Cueillette_Controller, 'addCueillette']);

//depenses
$Depense_Controller = new DepenseController();
$router->get('/depense', [$Depense_Controller, 'getAllDepenses']);
$router->get('/depense/addForm', [$Depense_Controller, 'addPage']);
$router->post('/depense/add', [$Depense_Controller, 'addDepense']);


//Resultat
$Resultat_Controller = new ResultatController();
$router->get('/resultat', function () {
    Flight::render('client/pages/resultat');
});
$router->post('/resultat', [$Resultat_Controller, 'showResultat']);
