<?php
include '../Controllers/PermissionsController.php';

    if(!isset($_SESSION)) { session_start(); } 
    include_once '../Models/DB.php';
    include('../Models/Operations.php');
    if(isset($_SESSION['Filter'])) $_SESSION['Filter'] = NULL;

    $_SESSION['Last_link_regist'] = $_SERVER['HTTP_REFERER'];

    if(isset($_POST['login']) && isset($_POST['password'])
    && isset($_POST['password2']) && isset($_POST['tel']) && isset($_POST['adresse'])
    && isset($_POST['email']) && isset($_POST['ville']) && $_POST['password'] == $_POST['password2']){
        $conn = connectBase();
        $respnse = $conn->exec(InsertClient('user',$_POST['login'],$_POST['password'],$_POST['tel'],
        $_POST['ville'],$_POST['adresse'],$_POST['email']));
        $conn = null;
        header('Location: /Views/Login.html.php');
        
    }else{
        $_SESSION['error_regist'] = "passwords do not matche";
        header('Location: /Views/Register.html.php');
    }

?>