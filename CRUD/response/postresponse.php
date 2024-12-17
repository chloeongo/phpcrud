<?php
include '../connection/dbConnection.php';

session_start();

$pdo = dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        if (isset($_POST['body']) && !empty($_POST['body'])) {

            if (strlen($_POST['body']) > 255) {
                echo 'Post can\'t be longer than 255 characters';
            } else {
                $stmt = $pdo->prepare('INSERT INTO post(userId, body) VALUES(:userId, :body)');

                    $stmt->execute([
                        'userId' => $_SESSION['user_id'],
                        'body' => $_POST['body'],
                    ]);
                    header("Location: ../views/profile.php");
                    exit();
            }
        } else {
            echo 'You have to write something.';
        }
    } else {
        echo 'Please log in or create an account.';
    }
}

?>
