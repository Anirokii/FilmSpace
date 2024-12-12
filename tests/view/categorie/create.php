<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Category</title>
</head>
<body>
    <h1>Add New Category</h1>
    <form method="POST" action="index.php?controller=Categorie&action=create">
        <label for="nom">Category Name:</label>
        <input type="text" id="nom" name="nom" required>
        <button type="submit">Add</button>
    </form>
</body>
</html>
