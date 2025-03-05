<?php
session_start();
require 'db.php';
require 'nav.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo 'Please enter both your email and password.';
        return;
    }

    $db = getDB();

    $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            echo 'Login successful. Redirecting...';
            header('Location: index.php'); 
            exit();
        } else {
            echo 'Invalid email or password.';
        }
    } else {
        echo 'User not found.';
    }
}


echo '
<h1>Login</h1>
<form method="POST" action="">
    <label for="email">Email Address:</label>
    <input type="email" name="email" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>';

require 'footer.php';
?>
