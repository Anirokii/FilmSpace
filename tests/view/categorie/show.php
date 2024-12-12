<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category Details</title>
</head>
<body>
    <h1>Category Details</h1>
    <?php if ($categorie): ?>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($categorie['nom']); ?></p>
    <?php else: ?>
        <p>Category not found.</p>
    <?php endif; ?>
</body>
</html>
