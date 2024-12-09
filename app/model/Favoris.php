<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class Favoris {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Add a film to a user's favorites
    public function create($user_id, $film_id) {
        $sql = "INSERT INTO Favoris (user_id, film_id, created_at) 
                VALUES (:user_id, :film_id, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $user_id,
            ':film_id' => $film_id
        ]);
    }

    // Get all favorites for a specific user
    public function getByUser($user_id) {
        $sql = "SELECT f.*, fi.nom AS film_name FROM Favoris f 
                JOIN Film fi ON f.film_id = fi.id
                WHERE f.user_id = :user_id ORDER BY f.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Remove a film from a user's favorites
    public function delete($id) {
        $sql = "DELETE FROM Favoris WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Check if a film is already in a user's favorites
    public function exists($user_id, $film_id) {
        $sql = "SELECT COUNT(*) as count FROM Favoris WHERE user_id = :user_id AND film_id = :film_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':film_id' => $film_id
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
}
?>
