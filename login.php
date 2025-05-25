<?php
session_start();
require 'db.php'; // Use shared DB connection

// Greeting logic
$user = 'Guest';
$greeting = 'Welcome, Guest!';
if (isset($_SESSION['user_name'])) {
    $user = htmlspecialchars($_SESSION['user_name']);
    $greeting = "Welcome, $user!";
}

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Username and password are required.";
    } else {
        $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $account = $stmt->fetch();

        if ($account && password_verify($password, $account['password'])) {
            $_SESSION['user_id'] = $account['id'];
            $_SESSION['user_name'] = $account['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - JJAM Trading</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
  <h2>Login</h2>
  <form action="login.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
  </form>
  <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</div>

</body>
</html>