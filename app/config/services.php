<?php

use flight\Engine;
use flight\database\PdoWrapper;
use flight\debug\database\PdoQueryCapture;
use Tracy\Debugger;

use app\models\UtilisateurModel;
use app\models\AdminModel;
use app\models\VarieteModel;
use app\models\ParcelleModel;
use app\models\CueilleurModel;
use app\models\CategorieDepenseModel;
use app\models\ConfigurationModel;
use app\models\CueilletteModel;
use app\models\DepenseModel;
use app\models\ResultatModel;


/** 
 * @var array $config This comes from the returned array at the bottom of the config.php file
 * @var Engine $app
 */

// uncomment the following line for MySQL
$dsn = 'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'] . ';charset=utf8mb4';

// uncomment the following line for SQLite
// $dsn = 'sqlite:' . $config['database']['file_path'];

// Uncomment the below lines if you want to add a Flight::db() service
// In development, you'll want the class that captures the queries for you. In production, not so much.
$pdoClass = Debugger::$showBar === true ? PdoQueryCapture::class : PdoWrapper::class;
$app->register('db', $pdoClass, [ $dsn, $config['database']['user'] ?? null, $config['database']['password'] ?? null ]);

// Got google oauth stuff? You could register that here
// $app->register('google_oauth', Google_Client::class, [ $config['google_oauth'] ]);

// Redis? This is where you'd set that up
// $app->register('redis', Redis::class, [ $config['redis']['host'], $config['redis']['port'] ]);


Flight::map('UtilisateurModel', function () {
    return new UtilisateurModel(Flight::db());
});

Flight::map('AdminModel', function () {
    return new AdminModel(Flight::db());
});

Flight::map('VarieteModel', function () {
    return new VarieteModel(Flight::db());
});

Flight::map('ParcelleModel', function () {
    return new ParcelleModel(Flight::db());
});

Flight::map('CueilleurModel', function () {
    return new CueilleurModel(Flight::db());
});

Flight::map('CategorieDepenseModel', function () {
    return new CategorieDepenseModel(Flight::db());
});

Flight::map('ConfigurationModel', function () {
    return new ConfigurationModel(Flight::db());
});

Flight::map('CueilletteModel', function () {
    return new CueilletteModel(Flight::db());
});

Flight::map('DepenseModel', function () {
    return new DepenseModel(Flight::db());
});

Flight::map('ResultatModel', function () {
    return new ResultatModel(Flight::db());
});