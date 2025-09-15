<?php
require 'Database.php';

$db = new Database();

$results = $db->select("
    SELECT 
        DATE(created_at) AS post_date,
        HOUR(created_at) AS post_hour,
        COUNT(*) AS post_count
    FROM posts
    GROUP BY post_date, post_hour
    ORDER BY post_date, post_hour
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts by Hour</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 60%;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 15px;
            text-align: center;
        }
        th {
            background: #333;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Posts Count by Hour</h1>

    <table>
        <tr>
            <th>Date</th>
            <th>Hour</th>
            <th>Posts Count</th>
        </tr>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['post_date']) ?></td>
                <td><?= str_pad($row['post_hour'], 2, '0', STR_PAD_LEFT) ?>:00</td>
                <td><?= $row['post_count'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
