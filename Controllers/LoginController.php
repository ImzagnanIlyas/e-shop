<?php 
    include('../Models/Operations.php');
    include_once '../Models/DB.php';
    if(!isset($_SESSION)) { session_start(); } 
    // if(isset($_POST['login']) && isset($_POST['password'])){
    //         // $login = $_POST['login'];
    //         // $password = $_POST['password'];
    // }elseif(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
    //     $login = $_COOKIE['login'];
    //     $password = $_COOKIE['password'];
    // }else{
    //     header('Location: /Views/Login.html.php');
    // }

    if (isset($_POST['auth'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        if(findUser($_POST['login'],$_POST['password']) == true){   
            $_SESSION['login'] = $login;
            //$_SESSION['password'] = $password;
            if(isset($_POST["remember"])) {
                setcookie ("member_login",$_POST["login"],time()+ (10 * 365 * 24 * 60 * 60),"/");
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","",time() - 3600,"/");
                }
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{   
            $_SESSION['wrongLogin'] = $login;
            $_SESSION['error'] = "Identifiant ou mot de passe incorrect";
            header('Location: /Views/Login.html.php');
        }
    }

    function autoLogin(){
        if(isset($_COOKIE["member_login"])) {
            $data = findUserData($_COOKIE["member_login"]);
            if ($data) {
                $_SESSION['id'] = $data['ID'];
                $_SESSION['login'] = $data['login'];
                $_SESSION['role'] = $data['Role'];
            }
        }
    }
?>