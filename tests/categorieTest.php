<?php
include_once __DIR__ . '/../app/model/Categorie.php'; // Include the Categorie modal

// Create a Categorie instance
$categorie = new Categorie();

// Test Create
echo "Creating a new category...\n";
$categorie->create("Action");

// Test Get By ID
echo "Fetching category with ID 1...\n";
print_r($categorie->getById(1));

// Test Update
echo "Updating category with ID 1...\n";
$categorie->update(1, "Adventure");

// Test Get All
echo "Fetching all categories...\n";
print_r($categorie->getAll());

// Test Delete
echo "Deleting category with ID 1...\n";
$categorie->delete(1);
?>
