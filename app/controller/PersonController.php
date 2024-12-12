<?php
include_once __DIR__ . '/BaseController.php';

class PersonController extends BaseController {
    private $personModel;

    public function __construct() {
        $this->personModel = $this->loadModel('Person');
    }

    // Register a new user
    public function create() {
        if ($_POST) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($this->personModel->emailExists($email)) {
                echo "<script>alert('Email already exists'); window.location.href='index.php';</script>";
                return;
            }

            if ($password !== $confirm_password) {
                echo "<script>alert('Passwords do not match. Please try again.'); window.location.href='index.php?controller=Person&action=create';</script>";
                return;
            }

            if ($this->personModel->create($nom, $prenom, $email, $password, $confirm_password)) {
                header('Location: index.php?controller=Person&action=index');
            } else {
                echo "<script>alert('User creation failed'); window.location.href='index.php';</script>";
            }
        } else {
            $this->render('person/create');
        }
    }

    // List all users
    public function index() {
        $persons = $this->personModel->getAll();
        $this->render('person/index', ['persons' => $persons]);
    }

    // Update user's information
    public function update($id) {
        if ($_POST) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            if ($this->personModel->update($id, $nom, $prenom, $email, $role)) {
                header('Location: index.php?controller=Person&action=index');
            } else {
                echo "<script>alert('Update failed'); window.location.href='index.php';</script>";
            }
        } else {
            $person = $this->personModel->getById($id);
            $this->render('person/update', ['person' => $person]);
        }
    }

    // Delete a user
    public function delete($id) {
        if ($this->personModel->delete($id)) {
            header('Location: index.php?controller=Person&action=index');
        } else {
            echo "<script>alert('Delete failed'); window.location.href='index.php';</script>";
        }
    }
}
?>
