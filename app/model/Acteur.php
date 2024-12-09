<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class Acteur {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Create a new actor
    public function create($nom, $prenom, $photo, $date_naissance) {
        $sql = "INSERT INTO Acteur (nom, prenom, photo, date_naissance) 
                VALUES (:nom, :prenom, :photo, :date_naissance)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':photo' => $photo,
            ':date_naissance' => $date_naissance
        ]);
    }

    // Get an actor by ID
    public function getById($id) {
        $sql = "SELECT * FROM Acteur WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update an actor's information
    public function update($id, $nom, $prenom, $photo, $date_naissance) {
        $sql = "UPDATE Acteur SET nom = :nom, prenom = :prenom, photo = :photo, 
                date_naissance = :date_naissance WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':photo' => $photo,
            ':date_naissance' => $date_naissance
        ]);
    }

    // Delete an actor by ID
    public function delete($id) {
        $sql = "DELETE FROM Acteur WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Get all actors
    public function getAll() {
        $sql = "SELECT * FROM Acteur ORDER BY nom ASC, prenom ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
