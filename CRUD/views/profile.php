<?php
session_start();
include '../response/profilepost.php';
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


<div id="profile">
<h1>Hello, 
  <?php echo $_SESSION['username']; ?>
</h1>
<form id="logoutForm" action="../response/logoutresponse.php" method="POST">
<button >Log out</button>
</form>
</div>

<div id="postsContainer">

  <div id="postColumn">
    <h2 id="postH">My posts:</h2>
    <?php foreach ($posts as $post) : ?>
    <div id="profilePost">
      <p><?= htmlspecialchars($post['body']) ?></p>  
      <div id="udBtns">
        <form id="editBtn" action="../response/edit.php" method="GET">
          <input type="hidden" name="postId" value="<?= $post['postId'] ?>">
          <button type="submit">edit</button>
        </form>
        <form id="deleteBtn" action="../response/delete.php" method="POST">
          <input type="hidden" name="postId" value="<?= $post['postId'] ?>">
          <button>delete</button>
        </form>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <div id="likedColumn">
    <h2 id="likedH">Liked:</h2>
    <?php foreach ($likedposts as $likedpost) : ?>

    <?php
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM postlikes WHERE postId = :postId');
    $stmt->execute(['postId' => $likedpost['postId']]);
    $likeCount = $stmt->fetchColumn();
    ?>

    <div id="profileLikedPost">
      <h3><?= htmlspecialchars($likedpost['username']); ?></h3>
      <p><?= htmlspecialchars($likedpost['body']) ?></p>  

      <form id="likecounter" method="POST" action="../response/likeresponse.php">
        <input type="hidden" name="postId" value="<?= $likedpost['postId'] ?>">
        <button id="likeBtn" type="submit">&#9825</button>
        <p><?= $likeCount; ?></p>
      </form>

    </div>
    <?php endforeach; ?>
  </div>

</div>

<?php include '../header&footer/footer.php' ?>
</body>
</html>