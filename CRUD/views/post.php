<?php
session_start();
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

<div class="makePost">
    <form method="POST" action="../response/postresponse.php">
        <label for="body">Create a post</label>
        <textarea id="body" name="body" type= "text" required></textarea><br>
        <input id="createPostBtn" type="submit" value="Post"></input>
    </form>
</div>    


<?php include '../header&footer/footer.php' ?>
</body>
</html>