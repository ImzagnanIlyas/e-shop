<?php
	session_start();
    session_unset();
    session_destroy();
    if(isset($_COOKIE["member_login"])) {
        setcookie("member_login","",time() - 3600,"/");
    }
    header('Location: /index.php');
?>