<?php
include_once 'DB.php';
if(!isset($_SESSION)) { session_start(); } 

function findUser($login, $password){
    $lien = connectBase();
    $request = "SELECT ID, login, password, Role FROM client WHERE login = ? AND password = ?";
    $prep  = $lien->prepare($request);
    $prep->execute(array($login, $password));

    $result = $prep->fetch();
    if($result['login'] == $login && $result['password'] == $password){
        $_SESSION['id'] = $result['ID'];
        $_SESSION['role'] = $result['Role'];
        return true;
    }else{
        return false;
    }
}

function findUserData($login){
    $lien = connectBase();
    $request = "SELECT * FROM client WHERE login = ?";
    $prep  = $lien->prepare($request);
    $prep->execute(array($login));

    $result = $prep->fetch();
    if($result){
        return $result;
    }else{
        return NULL;
    }
}

//Client
function InsertClient($role, $login, $password,  $tel, $ville, $adresse, $email){
    $sql = 'INSERT INTO client(Role, login, password, Tel, Ville, Adresse, Email)
    VALUES("'.$role.'", "'.$login.'","'.$password.'","'.$tel.'","'.$ville.'", "'.$adresse.'","'.$email.'")';
    return $sql;
}

function DeleteClient($id){
    $sql = 'DELETE FROM client WHERE ID = '.$id.'';
    return $sql;
}

function UpdateClient($id, $role, $login, $password,  $tel, $ville, $adresse, $email){
    $sql = 'UPDATE client SET role = "'.$role.'",  login = "'.$login.'", password = "'.$password.'", Tel = "'.$tel.'", Ville = "'.$ville.'", Adresse = "'.$adresse.'"
    , Email = "'.$email.'"
    WHERE ID = '.$id.'';
    return $sql;
}

function GetClient($id){
    $sql = 'SELECT * FROM client WHERE ID = '.$id.'';
    return $sql;
}
function GetAllClients(){
    $sql = 'SELECT ID , Role, login, password, Tel, Ville, Adresse, Email FROM client';
    return $sql;
}


//Produit
function InsertProduit($Prix,  $Désignation, $Catégorie, $Prixacquisition, $age, $size, $brand,$image){
    $sql = 'INSERT INTO produit(Prix,Designation,Categorie,Prixacquisition,Age,Size,Brand,Image) VALUES('.$Prix.',"'.$Désignation.'","'.$Catégorie.'",
    '.$Prixacquisition.','.$age.',"'.$size.'","'.$brand.'","'.$image.'")';
    return $sql;
}

function DeleteProduit($Référence){
    $sql = 'DELETE FROM produit WHERE Reference = '.$Référence.'';
    return $sql;
}

function UpdateProduit($Référence , $Prix,  $Désignation, $Catégorie, $Prixacquisition,$age, $size, $brand,$image){
    $sql = 'UPDATE produit SET Prix = '.$Prix.',  Designation = "'.$Désignation.'", Categorie = "'.$Catégorie.'",
    Prixacquisition = '.$Prixacquisition.', Age = '.$age.',Size = "'.$size.'",
    Brand = "'.$brand.'", Image = "'.$image.'"
     WHERE Reference = '.$Référence;
    return $sql;
}

function GetProduct($Référence){
    $sql = 'SELECT * FROM Produit WHERE Reference = "'.$Référence.'"';
    return $sql;
}

function GetAllProduct(){
    $sql = 'SELECT Reference , Prix, Designation, Categorie, Prixacquisition, Age, Size, Brand, Image FROM produit';
    return $sql;
}

function SearchForProduct($array){
    $string = '';
    $i = 0;
    while($array[$i] != NULL){
            $string = $string.' '.$array[$i].' AND ' ; ++$i;
    };
    // for( $i = 0; $i < sizeof($array) ; $i++){ $string = $string.' '.$array[$i].' AND ';};
    $sql = 'SELECT * FROM produit WHERE '.$string.'';
    return $sql;
}

function GetCategories(){
    $sql = 'SELECT Categorie FROM `produit` GROUP BY Categorie';
    return $sql;
}

function GetSizes(){
    $sql = 'SELECT Size FROM `produit` GROUP BY Size';
    return $sql;
}

function GetBrands(){
    $sql = 'SELECT Brand FROM `produit` GROUP BY Brand';
    return $sql;
}



//Commande
// function InsertCommande($Num  , $Date,  $Numclt){
//     $sql = 'INSERT INTO commande VALUES("'.$Num.'", "'.$Date.'","'.$Numclt.'")';
//     return $sql;
// }

// function DeleteCommande($Num){
//     $sql = 'DELETE FROM commande WHERE Num = '.$Num.'';
//     return $sql;
// }

// function UpdateCommande($Num  , $Date,  $Numclt){
//     $sql = 'UPDATE commande SET Date = "'.$Date.'",  Numclt = "'.$Numclt.'"
//     WHERE Num = "'.$Num.'"';
//     return $sql;
// }

// //LigneCommande
// function InsertLigneCommande($Refprod , $Numcmd,  $Quantité){
//     $sql = 'INSERT INTO lignedecommande VALUES("'.$Refprod.'", "'.$Numcmd.'","'.$Quantité.'")';
//     return $sql;
// }

// function DeleteLigneCommande($Refprod, $Numcmd){
//     $sql = 'DELETE FROM lignedecommande WHERE Refprod = "'.$Refprod.'" AND Numcmd = "'.$Numcmd.'"';
//     return $sql;
// }

// function UpdateLigneCommande($Refprod, $Numcmd,  $Quantité){
//     $sql = 'UPDATE lignedecommande SET Quantité = "'.$Quantité.'"
//     WHERE Refprod = "'.$Refprod.'" AND Numcmd = "'.$Numcmd.'"';
//     return $sql;
// }
?>