<?php
require 'Database.php';

$db = new Database();

$results = $db->select("
    SELECT u.id, u.name, u.email, p.title, p.body, p.created_at
    FROM users u
    JOIN posts p ON u.id = p.user_id
    WHERE u.active = 1
    ORDER BY p.created_at DESC");

$avatarPath = "public/avatar.jpg";
?>

<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <title>Social Feed</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .post {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 15px auto;
            max-width: 600px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .user {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .user img {
            width: 50px; height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .title { font-weight: bold; margin: 5px 0; }
        .date { color: gray; font-size: 0.9em; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Social Feed</h1>

    <?php foreach ($results as $row): ?>
        <div class="post">
            <div class="user">
                <img src="<?= $avatarPath ?>" alt="avatar">
                <div>
                    <div><?= htmlspecialchars($row['name']) ?></div>
                    <div class="date"><?= htmlspecialchars($row['created_at']) ?></div>
                </div>
            </div>
            <div class="title"><?= htmlspecialchars($row['title']) ?></div>
            <div><?= nl2br(htmlspecialchars($row['body'])) ?></div>
        </div>
    <?php endforeach; ?>
</body>
</html>

