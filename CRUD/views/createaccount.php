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
<h1 style="color: rgb(218, 222, 247);">Register an account</h1>
<form id="regForm" action="../response/registration.php" method="POST">
    <label for="unameid">Username:</label>
    <input type="text" id="unameid" name="unameid" required></input>
    <label>Password:</label>
    <input type="password" id="passwordid" name="passwordid" required></input>
  <div class="button-text-wrapper">
    <input id="regBtn" type="submit" value="Create account"></input>
    <p>go back to <a href="index.php" class="loginLink">log in</p>
  </div>
</form>
</div>


<?php include '../header&footer/footer.php' ?>
</body>
</html>