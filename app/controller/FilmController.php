<?php
include_once __DIR__ . '/BaseController.php';

class FilmController extends BaseController {
    private $filmModel;

    public function __construct() {
        $this->filmModel = $this->loadModel('Film');
    }

    // List all films
    public function index() {
        $films = $this->filmModel->getAll();
        $this->render('film/index', ['films' => $films]);
    }

    // Show a single film
    public function show($id) {
        $film = $this->filmModel->getById($id);
        $this->render('film/show', ['film' => $film]);
    }

    // Add a new film (simplified for now)
    public function create($data) {
        if (!empty($data)) {
            $this->filmModel->create(
                $data['nom'],
                $data['producteur'],
                $data['lancement'],
                $data['saison'],
                $data['duree'],
                $data['description'],
                $data['rate_moyenne'],
                $data['affichefilm']
            );
            header('Location: index.php?controller=Film&action=index'); // Redirect after creation
        } else {
            $this->render('film/create');
        }
    }

    // Delete a film
    public function delete($id) {
        $this->filmModel->delete($id);
        header('Location: index.php?controller=Film&action=index'); // Redirect after deletion
    }
}
?>
