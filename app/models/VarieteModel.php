<?php

namespace app\models;


class VarieteModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter une nouvelle variété de thé
    public function addVariete($nom, $occupation_m2, $rendement_pied_kg)
    {
        $query = "INSERT INTO variete_the (nom, occupation_m2, rendement_pied_kg) 
                  VALUES (:nom, :occupation_m2, :rendement_pied_kg)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nom' => $nom,
            ':occupation_m2' => $occupation_m2,
            ':rendement_pied_kg' => $rendement_pied_kg,
        ]);
    }

    // Récupérer une variété par son ID
    public function getVarieteById($id)
    {
        $query = "SELECT * FROM variete_the WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les variétés de thé
    public function getAllVarietes()
    {
        $query = "SELECT * FROM variete_the";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Mettre à jour une variété de thé
    public function updateVariete($id, $nom, $occupation_m2, $rendement_pied_kg)
    {
        $query = "UPDATE variete_the 
                  SET nom = :nom, occupation_m2 = :occupation_m2, rendement_pied_kg = :rendement_pied_kg 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':occupation_m2' => $occupation_m2,
            ':rendement_pied_kg' => $rendement_pied_kg,
        ]);
    }

    // Supprimer une variété de thé
    public function deleteVariete($id)
    {
        $query = "DELETE FROM variete_the WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
