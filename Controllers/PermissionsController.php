<?php
    if(!isset($_SESSION)) { session_start(); }

    /**
     * code to add in admin pages:
     * <?php adminPermission() ?>
     */
    function adminPermission(){
        if ( $_SESSION['role'] != "admin") {
            header("Localisation : /Views/errors/403.html.php");
        }
    }
    
    /**
     * code to add in client pages:
     * <?php clientPermission() ?>
     */
    function clientPermission(){
        if ( $_SESSION['role'] != "user") {
            header("Localisation : /Views/errors/403.html.php");
        }
    }
?>