<?php

namespace app\controllers;

use Flight;

class ParcelleController
{
    public function __construct() {}

    // Afficher les détails d'une parcelle
    public function showDetails()
    {
        if (!isset($_GET['parcelle']) || empty($_GET['parcelle'])) {
            Flight::render('admin/pages/parcelle-details', ['error' => 'Le paramètre "parcelle" est requis.']);
            return;
        }

        $id = $_GET['parcelle'];
        $parcelle = Flight::ParcelleModel()->getParcelleById($id);

        if (!$parcelle) {
            Flight::render('admin/pages/parcelle-details', ['error' => 'Parcelle non trouvée.']);
        } else {
            Flight::render('admin/pages/parcelle-details', ['parcelle' => $parcelle]);
        }
    }

    // Récupérer toutes les parcelles
    public function getAllParcelles()
    {
        $results = Flight::ParcelleModel()->getAllParcelles();

        if (empty($results)) {
            Flight::render('admin/pages/parcelles', ['error' => 'Aucune parcelle disponible.']);
        } else {
            Flight::render('admin/pages/parcelles', ['parcelles' => $results]);
        }
    }

    // Ajouter une nouvelle parcelle
    public function addParcelle()
    {
        if (!isset($_POST['numero'], $_POST['surface_hectare'], $_POST['variete_id'])) {
            Flight::render('admin/pages/parcelles-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $numero = $_POST['numero'];
        $surface_hectare = $_POST['surface_hectare'];
        $variete_id = $_POST['variete_id'];

        $result = Flight::ParcelleModel()->addParcelle($numero, $surface_hectare, $variete_id);

        if ($result) {
            Flight::render('admin/pages/parcelles-form', ['message' => 'Parcelle ajoutée avec succès.']);
        } else {
            Flight::render('admin/pages/parcelles-form', ['error' => 'Erreur lors de l\'ajout.']);
        }
    }

    // Modifier une parcelle existante
    public function updateParcelle()
    {
        if (!isset($_POST['id'], $_POST['numero'], $_POST['surface_hectare'], $_POST['variete_id'])) {
            Flight::render('admin/pages/parcelles-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $id = $_POST['id'];
        $numero = $_POST['numero'];
        $surface_hectare = $_POST['surface_hectare'];
        $variete_id = $_POST['variete_id'];

        $parcelle = Flight::ParcelleModel()->getParcelleById($id);
        if (!$parcelle) {
            Flight::render('admin/pages/parcelles-form', ['error' => 'Parcelle non trouvée.']);
            return;
        }

        $result = Flight::ParcelleModel()->updateParcelle($id, $numero, $surface_hectare, $variete_id);

        if ($result) {
            Flight::render('admin/pages/parcelles-form', ['message' => 'Parcelle mise à jour avec succès.']);
        } else {
            Flight::render('admin/pages/parcelles-form', ['error' => 'Erreur lors de la mise à jour.']);
        }
    }

    // Supprimer une parcelle
    public function deleteParcelle()
    {
        if (!isset($_POST['id'])) {
            Flight::render('admin/pages/parcelles', ['error' => 'L\'ID de la parcelle est requis.']);
            return;
        }

        $id = $_POST['id'];
        $parcelle = Flight::ParcelleModel()->getParcelleById($id);
        if (!$parcelle) {
            Flight::render('admin/pages/parcelles', ['error' => 'Parcelle non trouvée.']);
            return;
        }

        $result = Flight::ParcelleModel()->deleteParcelle($id);

        if ($result) {
            Flight::render('admin/pages/parcelles', ['message' => 'Parcelle supprimée avec succès.']);
        } else {
            Flight::render('admin/pages/parcelles', ['error' => 'Erreur lors de la suppression.']);
        }
    }
}
