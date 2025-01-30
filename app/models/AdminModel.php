<?php

namespace app\models;

class AdminModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getById($id)
    {
        $query = "SELECT id, nom, email, role FROM admins WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    public function getAdminByEmail($email)
    {
        $query = "SELECT * FROM admins WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
