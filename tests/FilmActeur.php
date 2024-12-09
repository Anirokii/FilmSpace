<?php
include_once __DIR__ . '/../app/model/FilmActeur.php'; // Include the FilmActeur modal

// Create a FilmActeur instance
$filmActeur = new FilmActeur();

// Test Add Relation
echo "Adding a relation between film ID 1 and actor ID 2...\n";
$filmActeur->addRelation(1, 2);

// Test Get Actors By Film
echo "Fetching actors for film with ID 1...\n";
print_r($filmActeur->getActorsByFilm(1));

// Test Get Films By Actor
echo "Fetching films for actor with ID 2...\n";
print_r($filmActeur->getFilmsByActor(2));

// Test Delete Relation
echo "Deleting the relation between film ID 1 and actor ID 2...\n";
$filmActeur->deleteRelation(1, 2);
?>
