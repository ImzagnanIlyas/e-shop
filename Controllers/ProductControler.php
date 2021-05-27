<?php
    session_start();
    include('../Models/Operations.php');
    include_once '../Models/DB.php';
    

    if(isset($_GET['DeleteP'])){
        $conn = connectBase();
        $respnse = $conn->exec(DeleteProduit($_GET['DeleteP']));
        $conn = null;
        header('Location: /Views/EditAndDeleteProducts.html.php');
    }
    if(isset($_GET['EditP'])){
        $conn = connectBase();
        $respnse = $conn->query(GetProduct($_GET['EditP']));
        $r = $respnse->fetch();
        
        $string = 'Ref='.$r['Reference'].'&Prix='.$r['Prix'].'&Des='.$r['Designation'].'&Cat='.$r['Categorie'].'&P='. $r['Prixacquisition'].'&Age='.$r['Age'].'&Size='.$r['Size'].'&B='.$r['Brand'].'';
        header('Location: /Views/EditProduct.html.php?'.$string.'');     
        $conn = null;   
    }
if(isset($_POST['addP'])){
    if(isset($_POST['ref']) && isset($_POST['prix']) && isset($_POST['designation'])
    && isset($_POST['categorie']) && isset($_POST['prixacquisition']) && isset($_POST['age'])
    && isset($_POST['size']) && isset($_POST['brand'])){
        $conn = connectBase();
        $respnse = $conn->exec(InsertProduit($_POST['ref'],$_POST['prix'],$_POST['designation'],$_POST['categorie'],$_POST['prixacquisition'],$_POST['age'],$_POST['size'],$_POST['brand']));
        header('Location: /Views/EditAndDeleteProducts.html.php');
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
        $respnse = $conn->exec(UpdateProduit($_POST['ref'],$_POST['prix'],$_POST['designation'],
        $_POST['categorie'],$_POST['prixacquisition'],$_POST['age'],$_POST['size'],$_POST['brand']));
        header('Location: /Views/EditAndDeleteProducts.html.php');
        $conn = null;
    }else{
        $_SESSION['error_product'] = "All Informations are required";
        header('Location: /Views/EditProduct.html.php');
    }
}
    


?>