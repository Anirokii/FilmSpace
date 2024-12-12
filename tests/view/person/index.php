<h2>List of Users</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($persons as $person): ?>
        <tr>
            <td><?php echo $person['id']; ?></td>
            <td><?php echo $person['nom']; ?></td>
            <td><?php echo $person['prenom']; ?></td>
            <td><?php echo $person['email']; ?></td>
            <td><?php echo $person['role']; ?></td>
            <td>
                <a href="index.php?controller=Person&action=update&id=<?php echo $person['id']; ?>">Edit</a>
                <a href="index.php?controller=Person&action=delete&id=<?php echo $person['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
