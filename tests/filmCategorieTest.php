<?php
include_once __DIR__ . '/../app/model/FilmCategorie.php'; // Include the FilmCategorie modal

// Create a FilmCategorie instance
$filmCategorie = new FilmCategorie();

// Test Add Relation
echo "Adding a relation between film ID 1 and category ID 2...\n";
$filmCategorie->addRelation(1, 2);

// Test Get Categories By Film
echo "Fetching categories for film with ID 1...\n";
print_r($filmCategorie->getCategoriesByFilm(1));

// Test Get Films By Categorie
echo "Fetching films for category with ID 2...\n";
print_r($filmCategorie->getFilmsByCategorie(2));

// Test Delete Relation
echo "Deleting the relation between film ID 1 and category ID 2...\n";
$filmCategorie->deleteRelation(1, 2);
?>
