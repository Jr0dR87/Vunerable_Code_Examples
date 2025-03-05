<?php
session_start();
require 'db.php';
require 'nav.php';

if (!isset($_SESSION['user_id'])) {
    echo 'You must be logged in to change your password.';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['new_password'];

    if (empty($newPassword)) {
        echo 'Please provide a new password.';
        return;
    }

    $email = $_SESSION['email'];

    $db = getDB();

    $stmt = $db->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $stmt = $db->prepare('UPDATE users SET password = ? WHERE email = ?');
        $stmt->execute([$newPassword, $email]);

        echo 'Your password has been updated successfully!';
    } else {
        echo 'No user found with that email address.';
    }
} else {
    echo '
    <h1>Change Your Password</h1>
    <form method="POST" action="">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br>
        <button type="submit">Change Password</button>
    </form>';
}

require 'footer.php';
?>
