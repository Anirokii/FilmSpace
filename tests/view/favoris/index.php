<h2>Your Favorite Films</h2>

<?php if (!empty($favorites)): ?>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Favorite ID</th>
            <th>User ID</th>
            <th>Film ID</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($favorites as $fav): ?>
            <tr>
                <td><?= $fav['id'] ?></td>
                <td><?= $fav['user_id'] ?></td>
                <td><?= $fav['film_id'] ?></td>
                <td>
                    <!-- Delete button -->
                    <a href="index.php?controller=Favoris&action=delete&id=<?= $fav['id'] ?>&user_id=<?= $fav['user_id'] ?>" onclick="return confirm('Are you sure you want to delete this favorite?')">
                        🗑️ Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
<?php else: ?>
    <p>No favorites added yet.</p>
<?php endif; ?>

<!-- Form to add a new Favorite -->
<h3>Add a New Favorite</h3>
<form action="index.php?controller=Favoris&action=create" method="POST">
    <label>User ID:</label>
    <input type="number" name="user_id" placeholder="Enter User ID" required>

    <label>Film ID:</label>
    <input type="number" name="film_id" placeholder="Enter Film ID" required>

    <button type="submit">Add Favorite</button>
</form>
    