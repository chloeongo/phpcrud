<?php
include '../connection/dbConnection.php';
session_start();

if (isset($_POST['postId'])) {
    $postId = $_POST['postId'];

    $pdo = dbConnect();
    
    //verwijderd de post eerst van postlikes table
    $stmt = $pdo->prepare("DELETE FROM postlikes WHERE postId = :postId");
    $stmt->execute(['postId' => $postId]);
    
    //verwijderd de post van post table
    $stmt = $pdo->prepare('DELETE FROM post WHERE postId = :postId');
    $stmt->execute(['postId' => $postId]);

    header("Location: ../views/profile.php");
    exit();
}
?>
