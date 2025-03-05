<?php
session_start();
require 'db.php';
require 'nav.php';

$db = getDB();
$stmt = $db->query('SELECT id, username, email, password FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h1>List of Users</h1>';
echo '<table border="1">';
echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th></tr>';

foreach ($users as $user) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($user['id']) . '</td>';
    echo '<td>' . htmlspecialchars($user['username']) . '</td>';
    echo '<td>' . htmlspecialchars($user['email']) . '</td>';
    echo '<td>' . htmlspecialchars($user['password']) . '</td>';
    echo '</tr>';
}

echo '</table>';

require 'footer.php';
?>
