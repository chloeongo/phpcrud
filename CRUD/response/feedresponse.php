<?php

include '../connection/dbConnection.php';


$pdo = dbConnect(); 

// selecteert de posts
$stmt = $pdo->prepare('
    SELECT user.username, post.body, post.postId
    FROM user
    INNER JOIN post ON user.userId = post.userId
    ORDER BY post.postId DESC
');
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

