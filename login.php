<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login 💖</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #loader {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: #fff0f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        #loader img {
            width: 120px;
            animation: bounce 1s infinite;
        }

        #loader p {
            margin-top: 15px;
            font-size: 16px;
            color: #d63384;
            font-weight: 500;
            animation: fadeInText 1s ease-in-out infinite alternate;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        @keyframes fadeInText {
            from { opacity: 0.5; }
            to { opacity: 1; }
        }

        .container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.6s ease-in-out;
        }

        .container.show {
            opacity: 1;
        }

        .container h2 {
            color: #d63384;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        button {
            background-color: #ff4f91;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        button:hover {
            background-color: #e84380;
        }

        a {
            display: block;
            margin-top: 15px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- Loader -->
<div id="loader">
    <img src="https://media.giphy.com/media/JIX9t2j0ZTN9S/giphy.gif" alt="Loading...">
    <p>Loading... Kucing sedang ngoding 🐱💻</p>
</div>

<!-- Form Login -->
<div class="container" id="loginContainer">
    <h2>💖 Login</h2>
    <?php if (!empty($error)) echo "<div class='error-message'>$error</div>"; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
        <a href="register.php">Belum punya akun? Daftar di sini</a>
    </form>
</div>

<!-- Script -->
<script>
    window.addEventListener("load", function () {
        const loader = document.getElementById("loader");
        const loginContainer = document.getElementById("loginContainer");

        setTimeout(() => {
            loader.style.opacity = "0";
            setTimeout(() => {
                loader.style.display = "none";
                loginContainer.classList.add("show");
            }, 500);
        }, 2000);
    });
</script>

</body>
</html>
