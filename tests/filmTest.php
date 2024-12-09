<?php
include_once __DIR__ . '/../app/model/Film.php'; // Include the Film modal

// Create a Film instance
$film = new Film();

// Test Create
echo "Creating a new film...\n";
$film->create(
    "Interstellar",
    "Christopher Nolan",
    "2014-11-07",
    1,
    "169 minutes",
    "A team of explorers travel through a wormhole in space to save humanity.",
    8.6,
    "interstellar.jpg"
);

// Test Get By ID
echo "Fetching film with ID 1...\n";
print_r($film->getById(1));

// Test Update
echo "Updating film with ID 1...\n";
$film->update(
    1,
    "Interstellar Updated",
    "Christopher Nolan",
    "2014-11-07",
    2,
    "169 minutes",
    "Updated description",
    9.0,
    "interstellar_updated.jpg"
);

// Test Get All
echo "Fetching all films...\n";
print_r($film->getAll());

// Test Delete
echo "Deleting film with ID 1...\n";
$film->delete(1);
?>
