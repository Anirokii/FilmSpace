<?php
include_once __DIR__ . '/../app/model/Person.php';

// Create a Person instance
$person = new Person();

// Test Create
echo "Creating a new person...\n";
$person->create("John", "Doe", "johndoe@example.com", "password123", "user");

// Test Get By ID
echo "Fetching person with ID 1...\n";
print_r($person->getById(1));

// Test Update
echo "Updating person with ID 1...\n";
$person->update(1, "John", "Smith", "johnsmith@example.com", "admin");

// Test Get All
echo "Fetching all persons...\n";
print_r($person->getAll());

// Test Delete
echo "Deleting person with ID 1...\n";
$person->delete(1);
?>
