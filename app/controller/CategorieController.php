<?php
include_once __DIR__ . '/BaseController.php';

class CategorieController extends BaseController
{
    private $categorieModel;

    public function __construct()
    {
        $this->categorieModel = $this->loadModel('Categorie');
    }

    // List all categories
    public function index()
    {
        $categories = $this->categorieModel->getAll(); // Fetch all categories
        $this->render('categorie/index', ['categories' => $categories]); // Render the test view
    }

    // Show a single category (optional)
    public function show($id)
    {
        $categorie = $this->categorieModel->getById($id); // Fetch a single category by ID
        $this->render('categorie/show', ['categorie' => $categorie]); // Render the test view
    }

    // Create a new category
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nom'])) {
            $this->categorieModel->create($_POST['nom']); // Add the category
            header('Location: index.php?controller=Categorie&action=index'); // Redirect to category list
            exit;
        } else {
            $this->render('categorie/create'); // Render the form again
        }
    }    

    // Delete a category
    public function delete($id)
    {
        $this->categorieModel->delete($id); // Delete the category by ID
        header('Location: index.php?controller=Categorie&action=index'); // Redirect to index
    }
}
