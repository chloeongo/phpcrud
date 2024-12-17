<?php
session_start();
?>

<style>
  h1{
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(218, 222, 247)   }
</style>

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

<div class="accountForms">
<h1 style="color: rgb(218, 222, 247);">Log in</h1>
<form id="loginForm" action="../response/login.php" method="POST">
    <label for="unameid">Username:</label>
    <input type="text" id="unameid" name="unameid"></input>
    <label>Password:</label>
    <input type="password" id="passwordid" name="passwordid"></input>
    <div class="button-text-wrapper">
    <input type="submit" id="loginBtn" value="Log in"></input>
    <p>or <a href="createaccount.php" class="loginLink"> register an account</a></p>
  </div>
</form>
</div>




<?php include '../header&footer/footer.php' ?>
</body>
</html>