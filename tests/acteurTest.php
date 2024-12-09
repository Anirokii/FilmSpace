<?php
include_once __DIR__ . '/../app/model/Acteur.php'; // Include the Acteur modal

// Create an Acteur instance
$acteur = new Acteur();

// Test Create
echo "Creating a new actor...\n";
$acteur->create("DiCaprio", "Leonardo", "dicaprio.jpg", "1974-11-11");

// Test Get By ID
echo "Fetching actor with ID 1...\n";
print_r($acteur->getById(1));

// Test Update
echo "Updating actor with ID 1...\n";
$acteur->update(1, "DiCaprio", "Leonardo Wilhelm", "leo.jpg", "1974-11-11");

// Test Get All
echo "Fetching all actors...\n";
print_r($acteur->getAll());

// Test Delete
echo "Deleting actor with ID 1...\n";
$acteur->delete(1);
?>
