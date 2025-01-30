<?php

namespace app\models;

class UtilisateurModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ajouter un nouvel utilisateur
    public function addUtilisateur($nom, $email, $mot_de_passe)
    {
        $query = "INSERT INTO utilisateur (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':mot_de_passe' => $mot_de_passe,
        ]);
    }

    // Récupérer un utilisateur par son ID
    public function getUtilisateurById($id)
    {
        $query = "SELECT id, nom, email, role FROM utilisateur WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Récupérer tous les utilisateurs
    public function getAllUtilisateurs()
    {
        $query = "SELECT id, nom, email, role FROM utilisateur";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Supprimer un utilisateur
    public function deleteUtilisateur($id)
    {
        $query = "DELETE FROM utilisateur WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    // Récupérer un utilisateur par son email
    public function getUtilisateurByEmail($email)
    {
        $query = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
