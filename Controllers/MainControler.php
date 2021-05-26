<?php 
    include('../Models/Operations.php');
    include_once '../Models/DB.php';

    session_start();
    $login = 'xoxo';
    $password = 'xoxo';
    if(isset($_POST['login']) && isset($_POST['password'])){
            // $login = $_POST['login'];
            // $password = $_POST['password'];
    }elseif(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
        $login = $_COOKIE['login'];
        $password = $_COOKIE['password'];
    }else{
        header('Location: /Views/Login.html.php');
    }

 

    if(findUser($_POST['login'],$_POST['password']) == true){   
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header('Location: /index.php');
    } 
    if(findUser($_POST['login'],$_POST['password']) == false){   
        $_SESSION['error'] = "Wrong Email or Password";
        header('Location: /Views/Login.html.php');
    }
?>