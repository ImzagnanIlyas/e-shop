<?php
    session_start();
    include('../Models/Operations.php');
    include_once '../Models/DB.php';
    
    if(isset($_POST['ref']) && isset($_POST['prix'])&& isset($_POST['designation'])
    && isset($_POST['categorie'])&& isset($_POST['prixacquisition'])&& isset($_POST['age'])
    && isset($_POST['size'])){
        $conn = connectBase();
        $respnse = $conn->exec(InsertProduit($_POST['ref'],$_POST['prix'],$_POST['designation'],$_POST['categorie'],$_POST['prixacquisition']
        ,$_POST['age'],$_POST['size']));

        header('Location: /Views/EditAndDeleteProducts.html');
        $conn = null;
    }else{
        $_SESSION['error_product'] = "All Informations are required";
        header('Location: /Views/AddProduct.html.php');
    }



?>