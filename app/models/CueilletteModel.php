<?php

namespace app\models;


class CueilletteModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter une nouvelle cueillette
    public function addCueillette($date, $cueilleur_id, $parcelle_id, $poids_kg)
    {
        $query = "INSERT INTO cueillette (date, cueilleur_id, parcelle_id, poids_kg) 
                  VALUES (:date, :cueilleur_id, :parcelle_id, :poids_kg)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':date' => $date,
            ':cueilleur_id' => $cueilleur_id,
            ':parcelle_id' => $parcelle_id,
            ':poids_kg' => $poids_kg
        ]);
    }

    // Récupérer une cueillette par ID
    public function getCueilletteById($id)
    {
        $query = "SELECT c.*, cu.nom AS cueilleur_nom, p.numero AS parcelle_numero 
                  FROM cueillette c
                  JOIN cueilleur cu ON c.cueilleur_id = cu.id
                  JOIN parcelle p ON c.parcelle_id = p.id
                  WHERE c.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les cueillettes
    public function getAllCueillettes()
    {
        $query = "SELECT c.*, cu.nom AS cueilleur_nom, p.numero AS parcelle_numero 
                  FROM cueillette c
                  JOIN cueilleur cu ON c.cueilleur_id = cu.id
                  JOIN parcelle p ON c.parcelle_id = p.id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Modifier une cueillette existante
    public function updateCueillette($id, $date, $cueilleur_id, $parcelle_id, $poids_kg)
    {
        $query = "UPDATE cueillette 
                  SET date = :date, cueilleur_id = :cueilleur_id, parcelle_id = :parcelle_id, poids_kg = :poids_kg
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':date' => $date,
            ':cueilleur_id' => $cueilleur_id,
            ':parcelle_id' => $parcelle_id,
            ':poids_kg' => $poids_kg
        ]);
    }

    // Supprimer une cueillette
    public function deleteCueillette($id)
    {
        $query = "DELETE FROM cueillette WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
