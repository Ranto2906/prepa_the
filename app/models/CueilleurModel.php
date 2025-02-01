<?php

namespace app\models;


class CueilleurModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter un nouveau cueilleur
    public function addCueilleur($nom, $genre, $date_naissance)
    {
        $query = "INSERT INTO cueilleur (nom, genre, date_naissance) 
                  VALUES (:nom, :genre, :date_naissance)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nom' => $nom,
            ':genre' => $genre,
            ':date_naissance' => $date_naissance
        ]);
    }

    // Récupérer un cueilleur par ID
    public function getCueilleurById($id)
    {
        $query = "SELECT * FROM cueilleur WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer tous les cueilleurs
    public function getAllCueilleurs()
    {
        $query = "SELECT * FROM cueilleur";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Modifier un cueilleur
    public function updateCueilleur($id, $nom, $genre, $date_naissance)
    {
        $query = "UPDATE cueilleur 
                  SET nom = :nom, genre = :genre, date_naissance = :date_naissance 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':genre' => $genre,
            ':date_naissance' => $date_naissance
        ]);
    }

    // Supprimer un cueilleur
    public function deleteCueilleur($id)
    {
        $query = "DELETE FROM cueilleur WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }
}
