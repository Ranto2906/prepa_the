<?php

namespace app\controllers;

use Flight;

class CategorieDepenseController
{
    public function __construct()
    {
    }

    public function updatePage() 
    {
        if (!isset($_GET['id'])) {
            Flight::redirect('/categorieDepense'); 
            return;
        }
    
        $toUpdate = Flight::CategorieDepenseModel()->getCategorieDepenseById($_GET['id']);
    
        if (!$toUpdate) {
            Flight::redirect('/categorieDepense');
            return;
        }
    
        Flight::render('client/pages/categories-form', ['categorie' => $toUpdate]);
    }


    // Afficher les détails d'une catégorie de dépense
    public function showDetails()
    {
        if (!isset($_GET['categorie']) || empty($_GET['categorie'])) {
            Flight::render('client/pages/categorie-details', ['error' => 'Le paramètre "categorie" est requis.']);
            return;
        }

        $id = $_GET['categorie'];
        $categorie = Flight::CategorieDepenseModel()->getCategorieDepenseById($id);

        if (!$categorie) {
            Flight::render('client/pages/categorie-details', ['error' => 'Catégorie non trouvée.']);
        } else {
            Flight::render('client/pages/categorie-details', ['categorie' => $categorie]);
        }
    }

    // Récupérer toutes les catégories de dépenses
    public function getAllCategoriesDepense()
    {
        $results = Flight::CategorieDepenseModel()->getAllCategoriesDepense();

        if (empty($results)) {
            Flight::render('client/pages/categories', ['error' => 'Aucune catégorie disponible.']);
        } else {
            Flight::render('client/pages/categories', ['categories' => $results]);
        }
    }

    // Ajouter une nouvelle catégorie de dépense
    public function addCategorieDepense()
    {
        if (!isset($_POST['nom'])) {
            Flight::render('client/pages/categories-form', ['error' => 'Le champ "nom" est requis.']);
            return;
        }

        $nom = $_POST['nom'];

        $result = Flight::CategorieDepenseModel()->addCategorieDepense($nom);

        if ($result) {
            Flight::render('client/pages/categories-form', ['message' => 'Catégorie ajoutée avec succès.']);
        } else {
            Flight::render('client/pages/categories-form', ['error' => 'Erreur lors de l\'ajout.']);
        }
    }

    // Modifier une catégorie existante
    public function updateCategorieDepense()
    {
        if (!isset($_POST['id'], $_POST['nom'])) {
            Flight::render('client/pages/categories-form', ['error' => 'Tous les champs sont requis.']);
            return;
        }

        $id = $_POST['id'];
        $nom = $_POST['nom'];

        $categorie = Flight::CategorieDepenseModel()->getCategorieDepenseById($id);
        if (!$categorie) {
            Flight::render('client/pages/categories-form', ['error' => 'Catégorie non trouvée.']);
            return;
        }

        $result = Flight::CategorieDepenseModel()->updateCategorieDepense($id, $nom);

        if ($result) {
            Flight::render('client/pages/categories-form', ['message' => 'Catégorie mise à jour avec succès.']);
        } else {
            Flight::render('client/pages/categories-form', ['error' => 'Erreur lors de la mise à jour.']);
        }
    }

    // Supprimer une catégorie de dépense
    public function deleteCategorieDepense()
    {
        if (!isset($_POST['id'])) {
            Flight::render('client/pages/categories', ['error' => 'L\'ID de la catégorie est requis.']);
            return;
        }

        $id = $_POST['id'];
        $categorie = Flight::CategorieDepenseModel()->getCategorieDepenseById($id);
        if (!$categorie) {
            Flight::render('client/pages/categories', ['error' => 'Catégorie non trouvée.']);
            return;
        }

        $result = Flight::CategorieDepenseModel()->deleteCategorieDepense($id);

        if ($result) {
            Flight::render('client/pages/categories', ['message' => 'Catégorie supprimée avec succès.']);
        } else {
            Flight::render('client/pages/categories', ['error' => 'Erreur lors de la suppression.']);
        }
    }
}
