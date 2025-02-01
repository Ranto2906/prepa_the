<?php

namespace app\models;

class DepenseModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter une nouvelle dépense
    public function addDepense($date, $categorie_id, $montant)
    {
        $query = "INSERT INTO depense (date, categorie_id, montant) 
                  VALUES (:date, :categorie_id, :montant)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':date' => $date,
            ':categorie_id' => $categorie_id,
            ':montant' => $montant
        ]);
    }

    // Récupérer une dépense par ID
    public function getDepenseById($id)
    {
        $query = "SELECT d.*, c.nom AS categorie_nom 
                  FROM depense d
                  JOIN categorie_depense c ON d.categorie_id = c.id
                  WHERE d.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les dépenses
    public function getAllDepenses()
    {
        $query = "SELECT d.*, c.nom AS categorie_nom 
                  FROM depense d
                  JOIN categorie_depense c ON d.categorie_id = c.id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Modifier une dépense existante
    public function updateDepense($id, $date, $categorie_id, $montant)
    {
        $query = "UPDATE depense 
                  SET date = :date, categorie_id = :categorie_id, montant = :montant
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':date' => $date,
            ':categorie_id' => $categorie_id,
            ':montant' => $montant
        ]);
    }

    // Supprimer une dépense
    public function deleteDepense($id)
    {
        $query = "DELETE FROM depense WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
