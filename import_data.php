<?php
require 'Database.php';

$db = new Database();

function fetchJson($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// USERS
$users = fetchJson("https://jsonplaceholder.typicode.com/users");

foreach ($users as $user) {
    $birthdate = date("Y-m-d", strtotime(rand(1970, 2000) . "-" . rand(1, 12) . "-" . rand(1, 28)));

    $db->insert(
        "INSERT INTO users (id, name, email, active, birthdate) VALUES (?, ?, ?, ?, ?)",
        [$user['id'], $user['name'], $user['email'], 1, $birthdate]
    );
}

echo "Users imported successfully!<br>";

// POSTS 
$posts = fetchJson("https://jsonplaceholder.typicode.com/posts");

foreach ($posts as $post) {
    
    $randomDays = rand(0, 30);
    $randomHours = rand(0, 23);
    $randomMinutes = rand(0, 59);
    $randomSeconds = rand(0, 59);

    $created_at = date(
        "Y-m-d H:i:s",
        strtotime("-$randomDays days $randomHours hours $randomMinutes minutes $randomSeconds seconds")
    );

    $db->insert(
        "INSERT INTO posts (id, user_id, title, body, created_at, active) VALUES (?, ?, ?, ?, ?, ?)",
        [$post['id'], $post['userId'], $post['title'], $post['body'], $created_at, 1]
    );
}

echo "Posts imported successfully!";
