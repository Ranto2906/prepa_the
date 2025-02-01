<?php

namespace app\controllers;

use Flight;

class CueilleurController
{
    public function __construct() {}

    public function updatePage()
    {
        if (!isset($_GET['id'])) {
            Flight::redirect('/cueilleurs');
            return;
        }

        $toUpdate = Flight::CueilleurModel()->getCueilleurById($_GET['id']);

        if (!$toUpdate) {
            Flight::redirect('/cueilleurs');
            return;
        }

        Flight::render('admin/pages/cueilleurs-form', ['cueilleur' => $toUpdate]);
    }

    // Afficher les détails d'un cueilleur
    public function showDetails()
    {
        if (!isset($_GET['cueilleur']) || empty($_GET['cueilleur'])) {
            Flight::render('admin/pages/cueilleur-details', ['error' => 'Le paramètre "cueilleur" est requis.']);
            return;
        }

        $id = $_GET['cueilleur'];
        $cueilleur = Flight::CueilleurModel()->getCueilleurById($id);

        if (!$cueilleur) {
            Flight::render('admin/pages/cueilleur-details', ['error' => 'Cueilleur non trouvé.']);
        } else {
            Flight::render('admin/pages/cueilleur-details', ['cueilleur' => $cueilleur]);
        }
    }

    // Récupérer tous les cueilleurs
    public function getAllCueilleurs()
    {
        $results = Flight::CueilleurModel()->getAllCueilleurs();

        if (empty($results)) {
            Flight::render('admin/pages/cueilleurs', ['error' => 'Aucun cueilleur disponible.']);
        } else {
            Flight::render('admin/pages/cueilleurs', ['cueilleurs' => $results]);
        }
    }

    // Ajouter un nouveau cueilleur
    public function addCueilleur()
    {
        if (!isset($_POST['nom'], $_POST['genre'], $_POST['date_naissance'])) {
            Flight::render('admin/pages/cueilleurs-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $nom = $_POST['nom'];
        $genre = $_POST['genre'];
        $date_naissance = $_POST['date_naissance'];

        $result = Flight::CueilleurModel()->addCueilleur($nom, $genre, $date_naissance);

        if ($result) {
            Flight::render('admin/pages/cueilleurs-form', ['message' => 'Cueilleur ajouté avec succès.']);
        } else {
            Flight::render('admin/pages/cueilleurs-form', ['error' => 'Erreur lors de l\'ajout.']);
        }
    }

    // Modifier un cueilleur existant
    public function updateCueilleur()
    {
        if (!isset($_POST['id'], $_POST['nom'], $_POST['genre'], $_POST['date_naissance'])) {
            Flight::render('admin/pages/cueilleurs-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $genre = $_POST['genre'];
        $date_naissance = $_POST['date_naissance'];

        $cueilleur = Flight::CueilleurModel()->getCueilleurById($id);
        if (!$cueilleur) {
            Flight::render('admin/pages/cueilleurs-form', ['error' => 'Cueilleur non trouvé.']);
            return;
        }

        $result = Flight::CueilleurModel()->updateCueilleur($id, $nom, $genre, $date_naissance);

        if ($result) {
            Flight::render('admin/pages/cueilleurs-form', ['message' => 'Cueilleur mis à jour avec succès.']);
        } else {
            Flight::render('admin/pages/cueilleurs-form', ['error' => 'Erreur lors de la mise à jour.']);
        }
    }

    // Supprimer un cueilleur
    public function deleteCueilleur()
    {
        if (!isset($_POST['id'])) {
            Flight::render('admin/pages/cueilleurs', ['error' => 'L\'ID du cueilleur est requis.']);
            return;
        }

        $id = $_POST['id'];
        $cueilleur = Flight::CueilleurModel()->getCueilleurById($id);
        if (!$cueilleur) {
            Flight::render('admin/pages/cueilleurs', ['error' => 'Cueilleur non trouvé.']);
            return;
        }

        $result = Flight::CueilleurModel()->deleteCueilleur($id);

        if ($result) {
            Flight::render('admin/pages/cueilleurs', ['message' => 'Cueilleur supprimé avec succès.']);
        } else {
            Flight::render('admin/pages/cueilleurs', ['error' => 'Erreur lors de la suppression.']);
        }
    }
}
