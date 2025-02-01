<?php

namespace app\models;

class ParcelleModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter une nouvelle parcelle
    public function addParcelle($numero, $surface_hectare, $variete_id)
    {
        $query = "INSERT INTO parcelle (numero, surface_hectare, variete_id) 
                  VALUES (:numero, :surface_hectare, :variete_id)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':numero' => $numero,
            ':surface_hectare' => $surface_hectare,
            ':variete_id' => $variete_id
        ]);
    }

    // Récupérer une parcelle par ID
    public function getParcelleById($id)
    {
        $query = "SELECT * FROM parcelle WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer toutes les parcelles
    public function getAllParcelles()
    {
        $query = "SELECT p.*, v.nom AS variete_nom 
                  FROM parcelle p 
                  JOIN variete_the v ON p.variete_id = v.id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Modifier une parcelle
    public function updateParcelle($id, $numero, $surface_hectare, $variete_id)
    {
        $query = "UPDATE parcelle 
                  SET numero = :numero, surface_hectare = :surface_hectare, variete_id = :variete_id 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':numero' => $numero,
            ':surface_hectare' => $surface_hectare,
            ':variete_id' => $variete_id
        ]);
    }

    // Supprimer une parcelle
    public function deleteParcelle($id)
    {
        $query = "DELETE FROM parcelle WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
