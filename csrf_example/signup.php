<?php
session_start();
require 'db.php';
require 'nav.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    if (empty($username) || empty($email) || empty($password)) {
        echo 'All fields are required!';
        return;
    }

    $db = getDB();
    $stmt = $db->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
    if ($stmt->execute([$username, $email, $password])) {
        echo 'User registered successfully!';
    } else {
        echo 'Error registering user. Please try again.';
    }
} else {
    echo '
    <h1>Sign Up</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Sign Up</button>
    </form>';
}
require 'footer.php';
?>   
