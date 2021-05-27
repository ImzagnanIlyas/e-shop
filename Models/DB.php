<?php 
    function connectBase(){
        $servername = "localhost";
        $username = "root";
        $pswd = "";

    try {
            $conn = new PDO("mysql:host=$servername;dbname=magasin", $username, $pswd);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
    } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
    }
        return $conn;
    }
  

   
    // if($_POST['table'] == "client"){
    //     $oper = $_POST['operation_client'];
    //     switch($oper){
    //         case "Insert" : mysqli_query($lien, InsertClient($_POST['id'],$_POST['nom'],  $_POST['tel'], $_POST['ville'], $_POST['adress'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Delete" : mysqli_query($lien, DeleteClient($_POST['id'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Update" : mysqli_query($lien, UpdateClient($_POST['id'],$_POST['nom'],  $_POST['tel'], $_POST['ville'], $_POST['adress'])) or die ('Erreur SQL : '.mysqli_error($lien));
            
    //     }
    //     header('Location: Forms.php');
    // }

    // if($_POST['table'] == "produit"){
    //     $oper = $_POST['operation_produit'];
    //     switch($oper){
    //         case "Insert" : mysqli_query($lien, InsertProduit($_POST['ref'],$_POST['prix'],  $_POST['designation'], $_POST['catego'], $_POST['pricqui'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Delete" : mysqli_query($lien, DeleteProduit($_POST['ref'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Update" : mysqli_query($lien, UpdateProduit($_POST['ref'],$_POST['prix'],  $_POST['designation'], $_POST['catego'], $_POST['pricqui'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //     }
    //     header('Location: Forms.php');
    // }

    // if($_POST['table'] == "commande"){
    //     $oper = $_POST['operation_commande'];
    //     switch($oper){
    //         case "Insert" : mysqli_query($lien, InsertCommande($_POST['num'],$_POST['date'],  $_POST['numclt'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Delete" : mysqli_query($lien, DeleteCommande($_POST['num'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Update" : mysqli_query($lien, UpdateCommande($_POST['num'],$_POST['date'],  $_POST['numclt'])) or die ('Erreur SQL : '.mysqli_error($lien));
           
    //     }
    // }

    // if($_POST['table'] == "lignecommande"){
    //     $oper = $_POST['operation_lignecmd'];
    //     switch($oper){
    //         case "Insert" : mysqli_query($lien, InsertLigneCommande($_POST['refprod'],$_POST['ncmd'],  $_POST['qte'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Delete" : mysqli_query($lien, DeleteLigneCommande($_POST['refprod'], $_POST['ncmd'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //         case "Update" : mysqli_query($lien, UpdateLigneCommande($_POST['refprod'],$_POST['ncmd'],  $_POST['qte'])) or die ('Erreur SQL : '.mysqli_error($lien));
    //     }
    //     header('Location: Forms.php');
    // }

    
    
 



    //mysqli_close($lien); 
?>