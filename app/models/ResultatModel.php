<?php

namespace app\models;

class ResultatModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getResultats($date_debut, $date_fin) {
        $query = "SELECT
                    SUM(c.poids_kg) AS poids_total_cueillette,
                    SUM(p.surface_hectare * v.rendement_pied_kg - c.poids_kg) AS poids_restant,
                    SUM(d.montant) / SUM(c.poids_kg) AS cout_reviens_kg
                FROM
                    parcelle p
                    JOIN variete_the v ON p.variete_id = v.id
                    LEFT JOIN cueillette c ON p.id = c.parcelle_id
                    LEFT JOIN depense d ON d.date BETWEEN :date_debut AND :date_fin
                WHERE
                    c.date BETWEEN :date_debut AND :date_fin";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':date_debut', $date_debut);
        $stmt->bindParam(':date_fin', $date_fin);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
