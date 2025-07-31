<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    try {
        $stmt->execute([$username, $password]);
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        $error = "Username sudah digunakan!";
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>🌸 Register</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Buat username" required><br>
        <input type="password" name="password" placeholder="Buat password" required><br>
        <button type="submit">Daftar</button>
        <a href="login.php">Sudah punya akun? Login di sini</a>
    </form>
</div>
