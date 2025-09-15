<?php
require 'Database.php';

$db = new Database();

$result = $db->select("
    SELECT u.id, u.name, u.email, u.birthdate, p.id AS post_id, p.title, p.body
    FROM users u
    JOIN posts p ON u.id = p.user_id
    WHERE MONTH(u.birthdate) = MONTH(CURDATE())
    ORDER BY p.id DESC
    LIMIT 1
");

if ($result) {
    $row = $result[0];
    echo "<h2>Last post of a user who has a birthday this month</h2>";
    echo "<b>Name:</b> " . htmlspecialchars($row['name']) . "<br>";
    echo "<b>Email:</b> " . htmlspecialchars($row['email']) . "<br>";
    echo "<b>Birthdate:</b> " . htmlspecialchars($row['birthdate']) . "<br><br>";
    echo "<b>Post Title:</b> " . htmlspecialchars($row['title']) . "<br>";
    echo "<b>Content:</b><br>" . nl2br(htmlspecialchars($row['body']));
} else {
    echo "No user found with a birthday this month.";
}
