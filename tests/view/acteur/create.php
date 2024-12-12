<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Actor</title>
</head>
<body>
    <h1>Add New Actor</h1>
    <form method="POST" action="index.php?controller=Acteur&action=create">
        <label for="nom">Last Name:</label>
        <input type="text" id="nom" name="nom" required>
        <label for="prenom">First Name:</label>
        <input type="text" id="prenom" name="prenom" required>
        <label for="photo">Photo URL:</label>
        <input type="text" id="photo" name="photo" required>
        <label for="date_naissance">Date of Birth:</label>
        <input type="date" id="date_naissance" name="date_naissance" required>
        <button type="submit">Add</button>
    </form>
</body>
</html>
