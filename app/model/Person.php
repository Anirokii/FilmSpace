<?php
include_once __DIR__ . '/../../config/database.php'; 

class Person {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Create a new person
    public function create($nom, $prenom, $email, $password, $role = 'user') {
        $sql = "INSERT INTO Person (nom, prenom, email, password, role) VALUES (:nom, :prenom, :email, :password, :role)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':role' => $role
        ]);
    }

    // Get a person by ID
    public function getById($id) {
        $sql = "SELECT * FROM Person WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a person's information
    public function update($id, $nom, $prenom, $email, $role) {
        $sql = "UPDATE Person SET nom = :nom, prenom = :prenom, email = :email, role = :role WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':role' => $role
        ]);
    }

    // Delete a person by ID
    public function delete($id) {
        $sql = "DELETE FROM Person WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Get all persons
    public function getAll() {
        $sql = "SELECT * FROM Person";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
