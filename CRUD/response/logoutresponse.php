<?php

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
session_unset();
session_destroy();
}else{
    header("Location: ../views/index.php");
}

?>