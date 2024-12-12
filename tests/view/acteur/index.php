<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Actors</title>
</head>
<body>
    <h1>List of Actors</h1>
    <?php if (!empty($acteurs)): ?>
        <ul>
            <?php foreach ($acteurs as $acteur): ?>
                <li>
                    <strong><?php echo htmlspecialchars($acteur['prenom'] . ' ' . $acteur['nom']); ?></strong>
                    <a href="index.php?controller=Acteur&action=show&id=<?php echo $acteur['id']; ?>">View</a>
                    <a href="index.php?controller=Acteur&action=delete&id=<?php echo $acteur['id']; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No actors available.</p>
    <?php endif; ?>
</body>
</html>
