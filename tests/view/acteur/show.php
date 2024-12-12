<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actor Details</title>
</head>
<body>
    <h1>Actor Details</h1>
    <?php if ($acteur): ?>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($acteur['prenom'] . ' ' . $acteur['nom']); ?></p>
        <p><strong>Photo:</strong> <img src="<?php echo htmlspecialchars($acteur['photo']); ?>" alt="Actor Photo"></p>
        <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($acteur['date_naissance']); ?></p>
    <?php else: ?>
        <p>Actor not found.</p>
    <?php endif; ?>
</body>
</html>
