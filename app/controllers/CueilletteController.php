<?php

namespace app\controllers;

use Flight;

class CueilletteController
{
    public function __construct() {}

    public function addPage()
    {
        $listeCueilleur = Flight::CueilleurModel()->getAllCueilleurs();
        $listeParcelle = Flight::ParcelleModel()->getAllParcelles();
        Flight::render('client/pages/cueillettes-form', ['cueilleurs' => $listeCueilleur, 'parcelles' => $listeParcelle]);
    }

    // Afficher les détails d'une cueillette
    public function showDetails()
    {
        if (!isset($_GET['cueillette']) || empty($_GET['cueillette'])) {
            Flight::render('client/pages/cueillette-details', ['error' => 'Le paramètre "cueillette" est requis.']);
            return;
        }

        $id = $_GET['cueillette'];
        $cueillette = Flight::CueilletteModel()->getCueilletteById($id);

        if (!$cueillette) {
            Flight::render('client/pages/cueillette-details', ['error' => 'Cueillette non trouvée.']);
        } else {
            Flight::render('client/pages/cueillette-details', ['cueillette' => $cueillette]);
        }
    }

    // Récupérer toutes les cueillettes
    public function getAllCueillettes()
    {
        $results = Flight::CueilletteModel()->getAllCueillettes();

        if (empty($results)) {
            Flight::render('client/pages/cueillettes', ['error' => 'Aucune cueillette disponible.']);
        } else {
            Flight::render('client/pages/cueillettes', ['cueillettes' => $results]);
        }
    }

    // Ajouter une nouvelle cueillette
    public function addCueillette()
    {
        if (!isset($_POST['date'], $_POST['cueilleur_id'], $_POST['parcelle_id'], $_POST['poids_kg'])) {
            Flight::render('client/pages/cueillettes-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $date = $_POST['date'];
        $cueilleur_id = $_POST['cueilleur_id'];
        $parcelle_id = $_POST['parcelle_id'];
        $poids_kg = $_POST['poids_kg'];

        $result = Flight::CueilletteModel()->addCueillette($date, $cueilleur_id, $parcelle_id, $poids_kg);

        if ($result) {
            Flight::render('client/pages/cueillettes-form', ['message' => 'Cueillette ajoutée avec succès.']);
        } else {
            Flight::render('client/pages/cueillettes-form', ['error' => 'Erreur lors de l\'ajout.']);
        }
    }

    // Modifier une cueillette existante
    public function updateCueillette()
    {
        if (!isset($_POST['id'], $_POST['date'], $_POST['cueilleur_id'], $_POST['parcelle_id'], $_POST['poids_kg'])) {
            Flight::render('client/pages/cueillettes-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $id = $_POST['id'];
        $date = $_POST['date'];
        $cueilleur_id = $_POST['cueilleur_id'];
        $parcelle_id = $_POST['parcelle_id'];
        $poids_kg = $_POST['poids_kg'];

        $cueillette = Flight::CueilletteModel()->getCueilletteById($id);
        if (!$cueillette) {
            Flight::render('client/pages/cueillettes-form', ['error' => 'Cueillette non trouvée.']);
            return;
        }

        $result = Flight::CueilletteModel()->updateCueillette($id, $date, $cueilleur_id, $parcelle_id, $poids_kg);

        if ($result) {
            Flight::render('client/pages/cueillettes-form', ['message' => 'Cueillette mise à jour avec succès.']);
        } else {
            Flight::render('client/pages/cueillettes-form', ['error' => 'Erreur lors de la mise à jour.']);
        }
    }

    // Supprimer une cueillette
    public function deleteCueillette()
    {
        if (!isset($_POST['id'])) {
            Flight::render('client/pages/cueillettes', ['error' => 'L\'ID de la cueillette est requis.']);
            return;
        }

        $id = $_POST['id'];
        $cueillette = Flight::CueilletteModel()->getCueilletteById($id);
        if (!$cueillette) {
            Flight::render('client/pages/cueillettes', ['error' => 'Cueillette non trouvée.']);
            return;
        }

        $result = Flight::CueilletteModel()->deleteCueillette($id);

        if ($result) {
            Flight::render('client/pages/cueillettes', ['message' => 'Cueillette supprimée avec succès.']);
        } else {
            Flight::render('client/pages/cueillettes', ['error' => 'Erreur lors de la suppression.']);
        }
    }
}
