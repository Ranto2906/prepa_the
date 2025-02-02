<?php

namespace app\controllers;

use Flight;

class UtilisateurController
{

    public function __construct() {}

    public function mainPage()
    {
        Flight::render('client/pages/login');
    }

    public function loginAdmin()
    {
        Flight::render('admin/pages/logIn');
    }

    public function home()
    {
        $listeHabitations = Flight::HabitationModel()->getAllHabitations();
        Flight::render('client/pages/index', ['liste' => $listeHabitations]);
    }

    // Inscription d'un client
    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['signup-password'];
        $password2 = $_POST['confirm-password'];

        if (!isset($email, $name, $password, $password2)) {
            Flight::render('client/pages/logIn', ['message' => 'All fields are required.']);
        }

        if (Flight::UtilisateurModel()->getUtilisateurByEmail($email)) {
            Flight::render('client/pages/logIn', ['message' => 'Email non Valide.']);
            return;
        }

        if ($password != $password2) {
            Flight::render('client/pages/logIn', ['message' => 'Verifier le mot de passe']);
            return;
        }

        $result = Flight::UtilisateurModel()->addUtilisateur(
            $name,
            $email,
            $password
        );

        if ($result) {
            Flight::render('client/pages/logIn', ['message' => 'Registration successful.']);
            return;
        } else {
            Flight::render('client/pages/logIn', ['message' => 'Failed to register client.']);
            return;
        }
    }


    // Connexion d'un client
    public function login()
    {
        $email = $_POST['email'];
        $mdp = $_POST['password'];

        if (!isset($email, $mdp)) {
            Flight::render('client/pages/logIn', ['message' => 'Email and password are required.']);
            return;
        }

        $client = Flight::UtilisateurModel()->getUtilisateurByEmail($email);

        if (!$client) {
            Flight::render('client/pages/logIn', ['message' => 'Invalid username or password.']);
            return;
        }

        // Vérifier le mot de passe
        if ($mdp != $client['mot_de_passe']) {
            Flight::render('client/pages/logIn', ['message' => 'Invalid password.']);
            return;
        }
        session_start();
        $_SESSION['client'] = $client;

        // $listeHabitations = Flight::HabitationModel()->getAllHabitations();
        // Flight::render('client/pages/index', ['liste' => $listeHabitations]);

        Flight::render('client/pages/index');
        return;
    }
}
