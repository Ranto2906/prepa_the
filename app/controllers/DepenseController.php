<?php

namespace app\controllers;

use Flight;

class DepenseController
{
    public function __construct()
    {
    }

    public function addPage()
    {
        $listeCategories = Flight::CategorieDepenseModel()->getAllCategoriesDepense();
        Flight::render('clients/pages/depenses-form', ['categories' => $listeCategories]);
    }

    // Afficher les détails d'une dépense
    public function showDetails()
    {
        if (!isset($_GET['depense']) || empty($_GET['depense'])) {
            Flight::render('client/pages/depense-details', ['error' => 'Le paramètre "depense" est requis.']);
            return;
        }

        $id = $_GET['depense'];
        $depense = Flight::DepenseModel()->getDepenseById($id);

        if (!$depense) {
            Flight::render('client/pages/depense-details', ['error' => 'Dépense non trouvée.']);
        } else {
            Flight::render('client/pages/depense-details', ['depense' => $depense]);
        }
    }

    // Récupérer toutes les dépenses
    public function getAllDepenses()
    {
        $results = Flight::DepenseModel()->getAllDepenses();

        if (empty($results)) {
            Flight::render('client/pages/depenses', ['error' => 'Aucune dépense disponible.']);
        } else {
            Flight::render('client/pages/depenses', ['depenses' => $results]);
        }
    }

    // Ajouter une nouvelle dépense
    public function addDepense()
    {
        if (!isset($_POST['date'], $_POST['categorie_id'], $_POST['montant'])) {
            Flight::render('client/pages/depenses-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $date = $_POST['date'];
        $categorie_id = $_POST['categorie_id'];
        $montant = $_POST['montant'];

        $result = Flight::DepenseModel()->addDepense($date, $categorie_id, $montant);

        if ($result) {
            Flight::render('client/pages/depenses-form', ['message' => 'Dépense ajoutée avec succès.']);
        } else {
            Flight::render('client/pages/depenses-form', ['error' => 'Erreur lors de l\'ajout.']);
        }
    }

    // Modifier une dépense existante
    public function updateDepense()
    {
        if (!isset($_POST['id'], $_POST['date'], $_POST['categorie_id'], $_POST['montant'])) {
            Flight::render('client/pages/depenses-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $id = $_POST['id'];
        $date = $_POST['date'];
        $categorie_id = $_POST['categorie_id'];
        $montant = $_POST['montant'];

        $depense = Flight::DepenseModel()->getDepenseById($id);
        if (!$depense) {
            Flight::render('client/pages/depenses-form', ['error' => 'Dépense non trouvée.']);
            return;
        }

        $result = Flight::DepenseModel()->updateDepense($id, $date, $categorie_id, $montant);

        if ($result) {
            Flight::render('client/pages/depenses-form', ['message' => 'Dépense mise à jour avec succès.']);
        } else {
            Flight::render('client/pages/depenses-form', ['error' => 'Erreur lors de la mise à jour.']);
        }
    }

    // Supprimer une dépense
    public function deleteDepense()
    {
        if (!isset($_POST['id'])) {
            Flight::render('client/pages/depenses', ['error' => 'L\'ID de la dépense est requis.']);
            return;
        }

        $id = $_POST['id'];
        $depense = Flight::DepenseModel()->getDepenseById($id);
        if (!$depense) {
            Flight::render('client/pages/depenses', ['error' => 'Dépense non trouvée.']);
            return;
        }

        $result = Flight::DepenseModel()->deleteDepense($id);

        if ($result) {
            Flight::render('client/pages/depenses', ['message' => 'Dépense supprimée avec succès.']);
        } else {
            Flight::render('client/pages/depenses', ['error' => 'Erreur lors de la suppression.']);
        }
    }
}
