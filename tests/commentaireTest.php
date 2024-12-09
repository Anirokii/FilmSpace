<?php
include_once __DIR__ . '/../app/model/Commentaire.php'; // Include the Commentaire modal

// Create a Commentaire instance
$commentaire = new Commentaire();

// Test Create
echo "Creating a new comment...\n";
$commentaire->create("Great movie!", 1, 1);

// Test Get By ID
echo "Fetching comment with ID 1...\n";
print_r($commentaire->getById(1));

// Test Get By Film
echo "Fetching comments for film with ID 1...\n";
print_r($commentaire->getByFilm(1));

// Test Get All
echo "Fetching all comments...\n";
print_r($commentaire->getAll());

// Test Delete
echo "Deleting comment with ID 1...\n";
$commentaire->delete(1);
?>
