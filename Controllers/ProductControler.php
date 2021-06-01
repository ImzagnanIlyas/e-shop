<?php
    if(!isset($_SESSION)) { session_start(); } 
    include('../Models/Operations.php');
    include_once '../Models/DB.php';
    

    if(isset($_GET['DeleteP'])){
        $conn = connectBase();
        $respnse = $conn->exec(DeleteProduit($_GET['DeleteP']));
        $conn = null;
        header('Location: /Views/EditAndDeleteProductsAndUsers.html.php');
    }
    if(isset($_GET['EditP'])){
        $conn = connectBase();
        $respnse = $conn->query(GetProduct($_GET['EditP']));
        $r = $respnse->fetch();
        $st = 'R='.$r['Reference'].'&p='.$r['Prix'].'&D='.$r['Designation'].'&C='.$r['Categorie'].'&P='. $r['Prixacquisition'].'&A='.$r['Age'].'&S='.$r['Size'].'&B='.$r['Brand'].'&I='.$r['Image'].'';
        header('Location: /Views/EditProduct.html.php?'.$st.'');     
        $conn = null;   
    }
if(isset($_POST['addP'])){
    if(isset($_POST['prix']) && isset($_POST['designation'])
    && isset($_POST['categorie']) && isset($_POST['prixacquisition']) && isset($_POST['age'])
    && isset($_POST['size']) && isset($_POST['brand'])){
        $conn = connectBase();

        $target_dir = "../Assets/img/product/"; //C:\wamp64\www\e-shop\Assets\img
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $respnse = $conn->exec(InsertProduit($_POST['prix'],$_POST['designation'],$_POST['categorie'],$_POST['prixacquisition'],$_POST['age'],$_POST['size'],
        $_POST['brand'],$target_file));
        header('Location: /Views/EditAndDeleteProductsAndUsers.html.php');
        $conn = null;
    }else{
        $_SESSION['error_product'] = "All Informations are required";
        header('Location: /Views/AddProduct.html.php');
    }
}elseif(isset($_POST['EditP'])){
    if(isset($_POST['ref']) && isset($_POST['prix']) && isset($_POST['designation'])
    && isset($_POST['categorie']) && isset($_POST['prixacquisition']) && isset($_POST['age'])
    && isset($_POST['size']) && isset($_POST['brand'])){
        $conn = connectBase();
        
        $target_dir = "../Assets/img/product/"; //C:\wamp64\www\e-shop\Assets\img
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $respnse = $conn->exec(UpdateProduit($_POST['ref'],$_POST['prix'],$_POST['designation'],
        $_POST['categorie'],$_POST['prixacquisition'],$_POST['age'],$_POST['size'],$_POST['brand'],$target_file));
        header('Location: /Views/EditAndDeleteProductsAndUsers.html.php');
        $conn = null;
    }else{
        $_SESSION['error_product'] = "All Informations are required";
        header('Location: /Views/EditProduct.html.php');
    }
}
    


?>