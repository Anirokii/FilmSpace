<?php

class FavorisController extends BaseController {
    private $favorisModel;

    public function __construct() {
        $this->favorisModel = $this->loadModel('Favoris');
    }

    // Create a new favorite relationship
    public function create() {
        $user_id = $_POST['user_id'] ?? null;
        $film_id = $_POST['film_id'] ?? null;

        if (!$user_id || !$film_id) {
            echo "User ID or Film ID is missing.";
            return;
        }

        // Check if user and film exist in the database
        if (!$this->favorisModel->userExists($user_id)) {
            echo "User does not exist!";
            return;
        }

        if (!$this->favorisModel->filmExists($film_id)) {
            echo "Film does not exist!";
            return;
        }
        
        if ($this->favorisModel->isFavoriteExist($user_id, $film_id)) {
            echo "<script>alert('This film is already in your favorites!'); window.location.href='index.php?controller=Favoris&action=index&user_id=$user_id';</script>";
            return;
        }

        // If both exist, add the favorite relationship
        if ($this->favorisModel->addFavoris($user_id, $film_id)) {
            header("Location: index.php?controller=Favoris&action=index&user_id=$user_id");
            exit;
        } else {
            echo "Failed to add the favorite relationship!";
        }
    }

    // Display all favorites for a user
    public function index($user_id) {
        $favorites = $this->favorisModel->getFavorisByUser($user_id);
        $this->render('favoris/index', ['favorites' => $favorites]);
    }

    // Delete a favorite relationship dynamically
    public function delete($id, $user_id) {
        if ($this->favorisModel->deleteFavoris($id)) {
            header("Location: index.php?controller=Favoris&action=index&user_id=$user_id");
            exit;
        } else {
            echo "Failed to delete the favorite relationship!";
        }
    }
}
