<!-- tests/view/film/show.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Film Details (Test View)</title>
</head>
<body>
    <h1>Film Details</h1>
    <?php if ($film): ?>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($film['id']); ?></p>
        <p><strong>Title:</strong> <?php echo htmlspecialchars($film['nom']); ?></p>
        <p><strong>Producer:</strong> <?php echo htmlspecialchars($film['producteur']); ?></p>
        <p><strong>Launch Date:</strong> <?php echo htmlspecialchars($film['lancement']); ?></p>
        <p><strong>Duration:</strong> <?php echo htmlspecialchars($film['duree']); ?> minutes</p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($film['description']); ?></p>
    <?php else: ?>
        <p>Film not found.</p>
    <?php endif; ?>
</body>
</html>
