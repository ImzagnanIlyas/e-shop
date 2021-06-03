<?php

session_start();
include('../Models/Operations.php');
include_once '../Models/DB.php';

if(isset($_GET['DeleteC'])){
    $conn = connectBase();
    $respnse = $conn->exec(DeleteClient($_GET['DeleteC']));
    $conn = null;
    header('Location: /Views/EditAndDeleteProductsAndUsers.html.php');
}
if(isset($_GET['EditC'])){
    $conn = connectBase();
    $respnse = $conn->query(GetClient($_GET['EditC']));
    $r = $respnse->fetch();
    
    $string = 'I='.$r['ID'].'&R='.$r['Role'].'&log='.$r['login'].'&Tel='. $r['Tel'].'&Vi='.$r['Ville'].'&Ad='.$r['Adresse'].'&Em='.$r['Email'].'';
    header('Location: /Views/EditUser.html.php?'.$string.'');     
    $conn = null;   
}
if(isset($_POST['addC'])){
    if(isset($_POST['login'])
    && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['tele'])
    && isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['ville'])
    && $_POST['password'] == $_POST['password2']){
        $conn = connectBase();
        $respnse = $conn->exec(InsertClient($_POST['role'],$_POST['login'],$_POST['password'],$_POST['tele'],$_POST['ville'],$_POST['adresse'],$_POST['email']));
        $conn = null;
        header('Location: /Views/EditAndDeleteProductsAndUsers.html.php');
        
    }else{
        $_SESSION['error_user'] = "Passwords do not match";
        header('Location: /Views/AddUser.html.php');
    }
}elseif(isset($_POST['EditC'])){
    if(isset($_POST['id']) && isset($_POST['login'])
    && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['tele'])
    && isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['ville'])
    && $_POST['password'] == $_POST['password2']){
        $conn = connectBase();
        $respnse = $conn->exec(UpdateClient($_POST['id'],$_POST['role'],$_POST['login'],
        $_POST['password'],$_POST['tele'],$_POST['ville'],$_POST['adresse'],$_POST['email']));
        $conn = null;
        header('Location: /Views/EditAndDeleteProductsAndUsers.html.php');
        
    }else{
        $_SESSION['error_user'] = "Passwords do not match";
        header('Location: /Views/EditUser.html.php');
    }
}
    



?>