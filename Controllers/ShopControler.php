<?php

include_once 'DB.php';
if(!isset($_SESSION)) { session_start(); } 
include('../Models/Operations.php');
if(!$_SESSION['Filter']){
    $_SESSION['Filter'] = '';
    $_SESSION['i'] = 0;
}

if(isset($_GET['reset_filter'])){
    $_SESSION['Filter'] = NULL;
    header('Location: /Views/shop.html.php');
}

if(isset($_GET['search'])){
    if($_SESSION['i'] == 0) { $_SESSION['Filter'] = 'SELECT * FROM produit WHERE '; 
        $_SESSION['Filter'] = $_SESSION['Filter'].' Designation LIKE "%'.$_GET['search'].'%"';

    }else{$_SESSION['Filter'] = $_SESSION['Filter'].' AND Designation = "'.$_GET['search'].'"';}
    $_SESSION['i']++;
    header('Location: /Views/shop.html.php');
}
if(isset($_GET['Categorie'])){
    if($_SESSION['i'] == 0) {$_SESSION['Filter'] = 'SELECT * FROM produit WHERE ';
        $_SESSION['Filter'] = $_SESSION['Filter'].' Categorie = "'.$_GET['Categorie'].'"';
    }
    else{$_SESSION['Filter'] = $_SESSION['Filter'].' AND Categorie = "'.$_GET['Categorie'].'"';}
    $_SESSION['i']++;
    header('Location: /Views/shop.html.php');
}
if(isset($_GET['Brand'])){
    if($_SESSION['i'] == 0) {$_SESSION['Filter'] = 'SELECT * FROM produit WHERE ';
        $_SESSION['Filter'] = $_SESSION['Filter'].' Brand = "'.$_GET['Brand'].'"';
    }else{$_SESSION['Filter'] = $_SESSION['Filter'].' AND Brand = "'.$_GET['Brand'].'"';}
    $_SESSION['i']++;
    header('Location: /Views/shop.html.php');
}
if(isset($_GET['Size'])){
    if($_SESSION['i'] == 0) {$_SESSION['Filter'] = 'SELECT * FROM produit WHERE ';
        $_SESSION['Filter'] = $_SESSION['Filter'].' Size = "'.$_GET['Size'].'"';
    }
    else{ $_SESSION['Filter'] = $_SESSION['Filter'].' AND Size = "'.$_GET['Size'].'"';}
    $_SESSION['i']++;
    header('Location: /Views/shop.html.php');
}
if(isset($_GET['Prix'])){
    if($_SESSION['i'] == 0) {$_SESSION['Filter'] = 'SELECT * FROM produit WHERE ';
        $_SESSION['Filter'] = $_SESSION['Filter'].' Prix '.$_GET['Prix'];
    }
    else{ $_SESSION['Filter'] = $_SESSION['Filter'].' AND Prix '.$_GET['Prix'];}
    $_SESSION['i']++;
    header('Location: /Views/shop.html.php');
}





       


?>