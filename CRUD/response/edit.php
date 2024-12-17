<?php
include '../connection/dbConnection.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['postId']) || !isset($_SESSION['user_id'])) {
        exit();
    }

    $postId = $_GET['postId'];
    $userId = $_SESSION['user_id'];

    $pdo = dbConnect();

    try { //selecteert de post en checkt of de post van de ingelogde user is
        $stmt = $pdo->prepare('SELECT * FROM post WHERE postId = :postId AND userId = :userId');
        $stmt->execute(['postId' => $postId, 'userId' => $userId]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            echo "Post not found or you do not have permission to edit this post.";
            exit();
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['postId'], $_POST['body'], $_SESSION['user_id'])) {
        echo "Missing required fields.";
        exit();
    }

    $postId = $_POST['postId'];
    $body = $_POST['body'];
    $userId = $_SESSION['user_id'];

    $pdo = dbConnect();

    try {
        $stmt = $pdo->prepare('UPDATE post SET body = :body WHERE postId = :postId AND userId = :userId');
        $stmt->execute([
            'body' => $body,
            'postId' => $postId,
            'userId' => $userId,
        ]);
        //checkt of de post echt geupdate is en stuurt de user terug
        if ($stmt->rowCount() > 0) {
            header("Location: ../views/profile.php");
            exit();
        } else {
            echo "No changes were made";
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
        exit();
    }
}
?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'GET') :  
//html styling > edit post pagina ?>
<!DOCTYPE html>
<html> 
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylefiles/styles.css">
    <link rel="icon" type="image/x-icon" href="../stylefiles/icon.png">
    <title>Z</title>
</head>
<body>
<?php include '../header&footer/header.php' ?>

<div id="editForm">
    <form method="POST" action="edit.php">
        <input type="hidden" name="postId" value="<?= htmlspecialchars($post['postId']) ?>">
        <label for="body">Edit your post:</label>
        <textarea id="body" name="body" required><?= htmlspecialchars($post['body']) ?></textarea>
        <br>
        <button id = "createPostBtn" type="submit">Save</button>
    </form>
</div>

<?php include '../header&footer/footer.php' ?>
</body>
</html>
<?php endif; ?>
