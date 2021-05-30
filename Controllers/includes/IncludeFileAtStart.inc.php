<?php
    include '../Controllers/LoginController.php';
    if (!isset($_SESSION["cart"])) { $_SESSION["cart"] = array(); } 
    autoLogin();
?>