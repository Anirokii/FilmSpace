<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class Favoris {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Check if a user exists in the users table
    public function userExists($user_id) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM person WHERE id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchColumn() > 0;
    }

    // Check if a film exists in the films table
    public function filmExists($film_id) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM film WHERE id = ?");
        $stmt->execute([$film_id]);
        return $stmt->fetchColumn() > 0;
    }

    public function isFavoriteExist($user_id, $film_id) {
        $query = "SELECT COUNT(*) AS count FROM favoris WHERE user_id = :user_id AND film_id = :film_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['user_id' => $user_id, 'film_id' => $film_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['count'] > 0;
    }
    

    // Add a new favorite relationship
    public function addFavoris($user_id, $film_id) {
        $stmt = $this->db->prepare("INSERT INTO favoris (user_id, film_id) VALUES (?, ?)");
        return $stmt->execute([$user_id, $film_id]);
    }

    // Get all favorites for a user
    public function getFavorisByUser($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM favoris WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Delete a favorite relationship
    public function deleteFavoris($id) {
        $stmt = $this->db->prepare("DELETE FROM favoris WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
