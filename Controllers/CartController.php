<?php
    include('../Models/Operations.php');
    if(!isset($_SESSION)) { session_start(); } 

    if (isset($_GET['add'])) {
        $_SESSION['cart'][$_GET['add']] = $_GET['quant'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if (isset($_GET['delete'])) {
        unset($_SESSION['cart'][$_GET['delete']]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if (isset($_GET['increase'])) {
        $_SESSION['cart'][$_GET['increase']]++;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if (isset($_GET['decrease'])) {
        if ($_SESSION['cart'][$_GET['decrease']] > 1) {
            $_SESSION['cart'][$_GET['decrease']]--;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>