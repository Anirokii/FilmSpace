<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class Commentaire {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Create a new comment
    public function create($contenu, $user_id, $film_id) {
        $sql = "INSERT INTO Commentaire (contenu, user_id, film_id, created_at) 
                VALUES (:contenu, :user_id, :film_id, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':contenu' => $contenu,
            ':user_id' => $user_id,
            ':film_id' => $film_id
        ]);
    }

    // Get a comment by ID
    public function getById($id) {
        $sql = "SELECT * FROM Commentaire WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get all comments for a specific film
    public function getByFilm($film_id) {
        $sql = "SELECT c.*, p.nom AS user_name FROM Commentaire c 
                JOIN Person p ON c.user_id = p.id
                WHERE c.film_id = :film_id ORDER BY c.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':film_id' => $film_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Delete a comment by ID
    public function delete($id) {
        $sql = "DELETE FROM Commentaire WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Get all comments
    public function getAll() {
        $sql = "SELECT c.*, p.nom AS user_name, f.nom AS film_name 
                FROM Commentaire c 
                JOIN Person p ON c.user_id = p.id
                JOIN Film f ON c.film_id = f.id
                ORDER BY c.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
