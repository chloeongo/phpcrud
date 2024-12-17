<?php
include '../connection/dbConnection.php';


$pdo = dbConnect(); 

//laat de posts van de user zien
$stmt = $pdo->prepare('SELECT postId, body FROM post WHERE userId = :userId ORDER BY postId DESC');
$stmt->execute(['userId' => $_SESSION['user_id']]);
$posts = $stmt->fetchAll();

//laat de posts zien die de user heeft geliket
$stmt = $pdo->prepare('
    SELECT user.username, post.body, post.postId
    FROM postlikes
    INNER JOIN post ON postlikes.postId = post.postId
    INNER JOIN user ON post.userId = user.userId
    WHERE postlikes.userId = :userId
    ORDER BY post.postId DESC
');
$stmt->execute(['userId' => $_SESSION['user_id']]);
$likedposts = $stmt->fetchAll();
?>
