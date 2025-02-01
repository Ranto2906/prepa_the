<?php

namespace app\controllers;

use Flight;

class ResultatController
{
    public function __construct() {}


    public function showResultat()
    {
        if(!isset($_POST['debut'], $_POST['fin'])) {
            Flight::render('client/pages/resultat', ['error' => 'Les dates de début et de fin sont requises.']);
            return;
        }
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];

        $resultats = Flight::ResultatModel()->getResultats($debut, $fin);
        Flight::render('client/pages/resultat', ['resultats' => $resultats]);
    }
}
