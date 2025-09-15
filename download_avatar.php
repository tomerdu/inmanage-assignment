<?php

$url = "https://cdn2.vectorstock.com/i/1000x1000/23/81/default-avatar-profile-icon-vector-18942381.jpg";

// Checking if the file exist

if (!file_exists(__DIR__ . "/public")) {
    mkdir(__DIR__ . "/public", 0777, true);
}

$savePath = __DIR__ . "/public/avatar.jpg";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$imageData = curl_exec($ch);
curl_close($ch);

// Saving the image
file_put_contents($savePath, $imageData);

echo "Avatar downloaded successfully!";
