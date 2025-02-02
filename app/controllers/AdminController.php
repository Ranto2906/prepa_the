<?php

namespace app\controllers;

use Flight;

class AdminController
{

    public function __construct() {}


    public function loginPage()
    {
        Flight::render('admin/pages/login');
    }

    public function home()
    {
        $listeHabitations = Flight::HabitationModel()->getAllHabitations();
        Flight::render('admin/pages/index', ['liste' => $listeHabitations]);
    }

    public function login()
    {
        $email = $_POST['email'];
        $mdp = $_POST['password'];

        if (!isset($email, $mdp)) {
            Flight::render('admin/pages/login', ['message' => 'Email and password are required.']);
            return;
        }

        $client = Flight::AdminModel()->getAdminByEmail($email);

        if (!$client) {
            Flight::render('admin/pages/login', ['message' => 'Invalid username or password.']);
            return;
        }

        // Vérifier le mot de passe
        if ($mdp != $client['mot_de_passe']) {
            Flight::render('admin/pages/login', ['message' => 'Invalid password.']);
            return;
        }
        session_start();
        $_SESSION['admin'] = $client;

        // $listeHabitations = Flight::HabitationModel()->getAllHabitations();
        // Flight::render('admin/pages/index', ['liste' => $listeHabitations]);

        Flight::render('admin/pages/admin');
        return;
    }
}
