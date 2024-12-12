<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Categories</title>
</head>
<body>
    <h1>List of Categories</h1>
    <?php if (!empty($categories)): ?>
        <ul>
            <?php foreach ($categories as $categorie): ?>
                <li>
                    <?php echo htmlspecialchars($categorie['nom']); ?>
                    <a href="index.php?controller=Categorie&action=show&id=<?php echo $categorie['id']; ?>">View</a>
                    <a href="index.php?controller=Categorie&action=delete&id=<?php echo $categorie['id']; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No categories available.</p>
    <?php endif; ?>
</body>
</html>
