<?php
include_once __DIR__ . '/../app/model/Favoris.php'; // Include the Favoris modal

// Create a Favoris instance
$favoris = new Favoris();

// Test Create
echo "Adding a film to user's favorites...\n";
$favoris->create(1, 1);

// Test Get By User
echo "Fetching all favorites for user with ID 1...\n";
print_r($favoris->getByUser(1));

// Test Exists
echo "Checking if film ID 1 is already in user ID 1's favorites...\n";
var_dump($favoris->exists(1, 1));

// Test Delete
echo "Removing a film from user's favorites...\n";
$favoris->delete(1);
?>
