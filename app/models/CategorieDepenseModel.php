<?php

namespace app\models;

class CategorieDepenseModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter une nouvelle catégorie de dépense
    public function addCategorieDepense($nom)
    {
        $query = "INSERT INTO categorie_depense (nom) VALUES (:nom)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':nom' => $nom]);
    }

    // Récupérer une catégorie par ID
    public function getCategorieDepenseById($id)
    {
        $query = "SELECT * FROM categorie_depense WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les catégories de dépenses
    public function getAllCategoriesDepense()
    {
        $query = "SELECT * FROM categorie_depense";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Modifier une catégorie de dépense
    public function updateCategorieDepense($id, $nom)
    {
        $query = "UPDATE categorie_depense SET nom = :nom WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id, ':nom' => $nom]);
    }

    // Supprimer une catégorie de dépense
    public function deleteCategorieDepense($id)
    {
        $query = "DELETE FROM categorie_depense WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
