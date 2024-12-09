<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class FilmActeur {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Add a relationship between a film and an actor
    public function addRelation($film_id, $acteur_id) {
        $sql = "INSERT INTO film_acteur (film_id, acteur_id) VALUES (:film_id, :acteur_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':film_id' => $film_id,
            ':acteur_id' => $acteur_id
        ]);
    }

    // Delete a relationship between a film and an actor
    public function deleteRelation($film_id, $acteur_id) {
        $sql = "DELETE FROM film_acteur WHERE film_id = :film_id AND acteur_id = :acteur_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':film_id' => $film_id,
            ':acteur_id' => $acteur_id
        ]);
    }

    // Get all actors associated with a specific film
    public function getActorsByFilm($film_id) {
        $sql = "SELECT a.* FROM film_acteur fa 
                JOIN acteur a ON fa.acteur_id = a.id
                WHERE fa.film_id = :film_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':film_id' => $film_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all films associated with a specific actor
    public function getFilmsByActor($acteur_id) {
        $sql = "SELECT f.* FROM film_acteur fa 
                JOIN film f ON fa.film_id = f.id
                WHERE fa.acteur_id = :acteur_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':acteur_id' => $acteur_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
