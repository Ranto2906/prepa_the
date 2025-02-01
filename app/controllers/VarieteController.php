<?php

namespace app\controllers;

use Flight;

class VarieteController
{
    public function __construct()
    {
    }

    // Afficher les détails d'une variété de thé
    public function showDetails()
    {
        if (!isset($_GET['variete']) || empty($_GET['variete'])) {
            Flight::render('client/pages/variete-details', ['error' => 'Le paramètre "variete" est requis.']);
            return;
        }

        $id = $_GET['variete'];
        $variete = Flight::VarieteModel()->getVarieteById($id);

        if (!$variete) {
            Flight::render('client/pages/variete-details', ['error' => 'Variété non trouvée.']);
        } else {
            Flight::render('client/pages/variete-details', ['variete' => $variete]);
        }
    }

    // Rechercher des variétés de thé par nom
    public function searchVarietes()
    {
        if (!isset($_GET['nom']) || empty($_GET['nom'])) {
            Flight::render('client/pages/varietes', ['error' => 'Le paramètre "nom" est requis.']);
            return;
        }

        $keyword = $_GET['nom'];
        $results = Flight::VarieteModel()->searchVarieteByName($keyword);

        if (empty($results)) {
            Flight::render('client/pages/varietes', ['error' => 'Aucune variété trouvée pour ce nom.']);
        } else {
            Flight::render('client/pages/varietes', ['varietes' => $results]);
        }
    }

    // Récupérer toutes les variétés de thé
    public function getAllVarietes()
    {
        $results = Flight::VarieteModel()->getAllVarietes();

        if (empty($results)) {
            Flight::render('client/pages/varietes', ['error' => 'Aucune variété disponible.']);
        } else {
            Flight::render('client/pages/varietes', ['varietes' => $results]);
        }
    }

    // Ajouter une nouvelle variété de thé
    public function addVariete()
    {
        if (!isset($_POST['nom'], $_POST['occupation_m2'], $_POST['rendement_pied_kg'])) {
            Flight::render('client/pages/varietes-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $nom = $_POST['nom'];
        $occupation_m2 = $_POST['occupation_m2'];
        $rendement_pied_kg = $_POST['rendement_pied_kg'];

        $result = Flight::VarieteModel()->addVariete($nom, $occupation_m2, $rendement_pied_kg);

        if ($result) {
            Flight::render('client/pages/varietes-form', ['message' => 'Variété ajoutée avec succès.']);
        } else {
            Flight::render('client/pages/varietes-form', ['error' => 'Erreur lors de l\'ajout.']);
        }
    }

    // Modifier une variété existante
    public function updateVariete()
    {
        if (!isset($_POST['id'], $_POST['nom'], $_POST['occupation_m2'], $_POST['rendement_pied_kg'])) {
            Flight::render('client/pages/varietes-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $occupation_m2 = $_POST['occupation_m2'];
        $rendement_pied_kg = $_POST['rendement_pied_kg'];

        $variete = Flight::VarieteModel()->getVarieteById($id);
        if (!$variete) {
            Flight::render('client/pages/varietes-form', ['error' => 'Variété non trouvée.']);
            return;
        }

        $result = Flight::VarieteModel()->updateVariete($id, $nom, $occupation_m2, $rendement_pied_kg);

        if ($result) {
            Flight::render('client/pages/varietes-form', ['message' => 'Variété mise à jour avec succès.']);
        } else {
            Flight::render('client/pages/varietes-form', ['error' => 'Erreur lors de la mise à jour.']);
        }
    }

    // Supprimer une variété de thé
    public function deleteVariete()
    {
        if (!isset($_POST['id'])) {
            Flight::render('client/pages/varietes', ['error' => 'L\'ID de la variété est requis.']);
            return;
        }

        $id = $_POST['id'];
        $variete = Flight::VarieteModel()->getVarieteById($id);
        if (!$variete) {
            Flight::render('client/pages/varietes', ['error' => 'Variété non trouvée.']);
            return;
        }

        $result = Flight::VarieteModel()->deleteVariete($id);

        if ($result) {
            Flight::render('client/pages/varietes', ['message' => 'Variété supprimée avec succès.']);
        } else {
            Flight::render('client/pages/varietes', ['error' => 'Erreur lors de la suppression.']);
        }
    }
}
