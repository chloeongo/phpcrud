<?php
include '../connection/dbConnection.php';

session_start();

$pdo = dbConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['unameid']) && !empty($_POST['passwordid'])) {

        $stmt = $pdo->prepare('SELECT * FROM user WHERE username = :username');
        $stmt->execute(['username' => $_POST['unameid']]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($_POST['passwordid'], $user['password'])) {
            $_SESSION['user_id'] = $user['userId'];
            $_SESSION['username'] = $user['username'];

            header("Location: ../views/profile.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Please enter both username and password.";
    }
}
?>
