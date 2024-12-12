<!DOCTYPE html>
<html>
<head>
    <title>All Films</title>
</head>
<body>
    <h1>List of Films</h1>
    <?php if (!empty($films)): ?>
        <?php foreach ($films as $film): ?>
            <div>
                <h2><?php echo htmlspecialchars($film['nom']); ?></h2>
                <p><?php echo htmlspecialchars($film['description']); ?></p>
                <a href="index.php?controller=Film&action=show&id=<?php echo $film['id']; ?>">View Details</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No films available.</p>
    <?php endif; ?>
    <a href="index.php?controller=Film&action=create&nom=heloooo&lancement=2024&saison=hiver&duree=1h&description=hello&rate_moyenne=5&affichefilm=heyy">add film</a>
</body>
</html>
