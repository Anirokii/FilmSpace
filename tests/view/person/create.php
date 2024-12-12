<h2>Register a New User</h2>
<form method="POST" action="index.php?controller=Person&action=create">
    <label>Nom</label>
    <input type="text" name="nom" required><br>

    <label>Prénom</label>
    <input type="text" name="prenom" required><br>

    <label>Email</label>
    <input type="email" name="email" required><br>

    <label>Password</label>
    <input type="password" name="password" required><br>

    <label>Confirm Password</label>
    <input type="password" name="confirm_password" required><br>

    <input type="submit" value="Register">
</form>
