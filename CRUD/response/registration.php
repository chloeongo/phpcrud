<?php
include '../connection/dbConnection.php';

$pdo = dbConnect(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['unameid']) && !empty($_POST['passwordid'])) {
        try {
            $stmt = $pdo->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');

            $stmt->execute([
                'username' => $_POST['unameid'],
                'password' => password_hash($_POST['passwordid'], PASSWORD_BCRYPT)
            ]);

            header("Location: ../views/index.php");
            exit();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { //error 23000 duplicate entry
                echo 'This username is already taken.';
            } 
        }
    } 
}
?>
