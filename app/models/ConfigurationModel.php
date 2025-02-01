<?php

namespace app\models;

class ConfigurationModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter une configuration (uniquement si elle n'existe pas)
    // , $poids_min_journalier, $bonus_percent, $malus_percent
    public function addConfiguration($salaire_kg)
    {
        // , poids_min_journalier, bonus_percent, malus_percent
        $query = "INSERT INTO configuration (salaire_kg) 
                  VALUES (:salaire_kg)";
        //   , :poids_min_journalier, :bonus_percent, :malus_percent
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':salaire_kg' => $salaire_kg
            // ':poids_min_journalier' => $poids_min_journalier,
            // ':bonus_percent' => $bonus_percent,
            // ':malus_percent' => $malus_percent
        ]);
    }

    // Récupérer la configuration (on suppose qu'il y a une seule configuration globale)
    public function getConfiguration()
    {
        $query = "SELECT * FROM configuration LIMIT 1";
        $stmt = $this->db->query($query);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Mettre à jour la configuration existante
    // , $poids_min_journalier, $bonus_percent, $malus_percent
    public function updateConfiguration($salaire_kg)
    {
        $query = "UPDATE configuration 
                  SET salaire_kg = :salaire_kg

                  WHERE id = 1";
        // poids_min_journalier = :poids_min_journalier, 
        // bonus_percent = :bonus_percent, 
        // malus_percent = :malus_percent 
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':salaire_kg' => $salaire_kg
            // ':poids_min_journalier' => $poids_min_journalier,
            // ':bonus_percent' => $bonus_percent,
            // ':malus_percent' => $malus_percent
        ]);
    }
}
