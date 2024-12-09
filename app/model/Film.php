<?php
include_once __DIR__ . '/../../config/database.php'; // Include the Database class

class Film {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Create a new film
    public function create($nom, $producteur, $lancement, $saison, $duree, $description, $rate_moyenne, $affichefilm) {
        $sql = "INSERT INTO Film (nom, producteur, lancement, saison, duree, description, rate_moyenne, affichefilm, created_at) 
                VALUES (:nom, :producteur, :lancement, :saison, :duree, :description, :rate_moyenne, :affichefilm, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':producteur' => $producteur,
            ':lancement' => $lancement,
            ':saison' => $saison,
            ':duree' => $duree,
            ':description' => $description,
            ':rate_moyenne' => $rate_moyenne,
            ':affichefilm' => $affichefilm
        ]);
    }

    // Get a film by ID
    public function getById($id) {
        $sql = "SELECT * FROM Film WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a film
    public function update($id, $nom, $producteur, $lancement, $saison, $duree, $description, $rate_moyenne, $affichefilm) {
        $sql = "UPDATE Film SET nom = :nom, producteur = :producteur, lancement = :lancement, 
                saison = :saison, duree = :duree, description = :description, 
                rate_moyenne = :rate_moyenne, affichefilm = :affichefilm 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':producteur' => $producteur,
            ':lancement' => $lancement,
            ':saison' => $saison,
            ':duree' => $duree,
            ':description' => $description,
            ':rate_moyenne' => $rate_moyenne,
            ':affichefilm' => $affichefilm
        ]);
    }

    // Delete a film by ID
    public function delete($id) {
        $sql = "DELETE FROM Film WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Get all films
    public function getAll() {
        $sql = "SELECT * FROM Film ORDER BY created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
