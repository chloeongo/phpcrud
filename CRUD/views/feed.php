<?php
session_start();
include '../response/feedresponse.php';
?>

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

<?php foreach ($posts as $post): ?>
 <?php
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM postlikes WHERE postId = :postId');
    $stmt->execute(['postId' => $post['postId']]);
    $likeCount = $stmt->fetchColumn();
  ?>
  
  <div id="feed">
    <h3><?= ($post['username']); ?></h3>
    <p><?= htmlspecialchars($post['body']); ?></p>
        <form id="likecounter" method="POST" action="../response/likeresponse.php">
        <input type="hidden" name="postId" value="<?= $post['postId'] ?>">
        <button id="likeBtn" type="submit">&#9825</button>
        <p><?= $likeCount; ?></p>
        </form>
  </div>
  
<?php endforeach; ?>

<?php include '../header&footer/footer.php' ?>
</body>
</html>