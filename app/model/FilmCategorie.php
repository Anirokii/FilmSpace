<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class FilmCategorie {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Add a relationship between a film and a category
    public function addRelation($film_id, $categorie_id) {
        $sql = "INSERT INTO film_categorie (film_id, categorie_id) VALUES (:film_id, :categorie_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':film_id' => $film_id,
            ':categorie_id' => $categorie_id
        ]);
    }

    // Delete a relationship between a film and a category
    public function deleteRelation($film_id, $categorie_id) {
        $sql = "DELETE FROM film_categorie WHERE film_id = :film_id AND categorie_id = :categorie_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':film_id' => $film_id,
            ':categorie_id' => $categorie_id
        ]);
    }

    // Get all categories associated with a specific film
    public function getCategoriesByFilm($film_id) {
        $sql = "SELECT c.* FROM film_categorie fc 
                JOIN categorie c ON fc.categorie_id = c.id
                WHERE fc.film_id = :film_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':film_id' => $film_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all films associated with a specific category
    public function getFilmsByCategorie($categorie_id) {
        $sql = "SELECT f.* FROM film_categorie fc 
                JOIN film f ON fc.film_id = f.id
                WHERE fc.categorie_id = :categorie_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':categorie_id' => $categorie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
