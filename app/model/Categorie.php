<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class Categorie {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Create a new category
    public function create($name) {
        $sql = "INSERT INTO Categorie (nom) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':name' => $name
        ]);
    }

    // Get a category by ID
    public function getById($id) {
        $sql = "SELECT * FROM Categorie WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a category
    public function update($id, $name) {
        $sql = "UPDATE Categorie SET nom = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name
        ]);
    }

    // Delete a category by ID
    public function delete($id) {
        $sql = "DELETE FROM Categorie WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Get all categories
    public function getAll() {
        $sql = "SELECT * FROM Categorie ORDER BY id ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
