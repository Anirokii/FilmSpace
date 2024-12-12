<?php
include_once __DIR__ . '/BaseController.php';

class ActeurController extends BaseController {
    private $acteurModel;

    public function __construct() {
        $this->acteurModel = $this->loadModel('Acteur'); // Load the Acteur model
    }

    // List all actors
    public function index() {
        $acteurs = $this->acteurModel->getAll(); // Fetch all actors
        $this->render('acteur/index', ['acteurs' => $acteurs]); // Render the test view
    }

    // Show a single actor
    public function show($id) {
        $acteur = $this->acteurModel->getById($id); // Fetch a single actor by ID
        $this->render('acteur/show', ['acteur' => $acteur]); // Render the test view
    }

    // Create a new actor
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $this->acteurModel->create(
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['photo'],
                $_POST['date_naissance']
            ); // Create the new actor
            header('Location: index.php?controller=Acteur&action=index');
            exit;
        } else {
            $this->render('acteur/create'); // Render the form view
        }
    }

    // Delete an actor
    public function delete($id) {
        $this->acteurModel->delete($id); // Delete the actor by ID
        header('Location: index.php?controller=Acteur&action=index');
        exit;
    }
}
