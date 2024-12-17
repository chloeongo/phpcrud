<?php
session_start();
include '../connection/dbConnection.php';

$pdo = dbConnect();


if (isset($_SESSION['user_id']) && isset($_POST['postId'])) {
    $userId = $_SESSION['user_id'];
    $postId = $_POST['postId'];

    //telt hoeveel likes een post heeft
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM postlikes WHERE postId = :postId');
    $stmt->execute(['postId' => $postId]);
    $likeCount = $stmt->fetch();

    //kijkt of de user de post al geliket heeft
    $stmt = $pdo->prepare('SELECT * FROM postlikes WHERE postId = :postId AND userId = :userId');
    $stmt->execute(['postId' => $postId, 'userId' => $userId]);
    $like = $stmt->fetch();

    if ($like) {
        //unliket de post als de post al geliket is
        $stmt = $pdo->prepare('DELETE FROM postlikes WHERE postId = :postId AND userId = :userId');
        $stmt->execute(['postId' => $postId, 'userId' => $userId]);
    } else {
        // geeft de post een like
        $stmt = $pdo->prepare('INSERT INTO postlikes (postId, userId) VALUES (:postId, :userId)');
        $stmt->execute(['postId' => $postId, 'userId' => $userId]);
    }
}

//stuurt de user terug naar de pagina waar hij laatst was
header('Location: ' . $_SERVER['HTTP_REFERER']);

exit();
?>
