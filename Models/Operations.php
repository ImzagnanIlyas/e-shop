<?php
include_once 'DB.php';
session_start();
function findUser($login, $password){
    $lien = connectBase();
    $request = "SELECT ID, login, password, Role FROM client WHERE login = ? AND password = ?";
    $prep  = $lien->prepare($request);
    $prep->execute(array($login, $password));

    $result = $prep->fetch();
    if($result['login'] == $login && $result['password'] == $password){
        $_SESSION['role'] = $result['Role'];
        return true;
    }else{
        return false;
    }
}


//Client
function InsertClient($id, $role, $login, $password,  $tel, $ville, $adresse, $email){
    $sql = 'INSERT INTO client VALUES("'.$id.'", "'.$role.'","'.$login.'","'.$password.'","'.$tel.'", "'.$ville.'","'.$adresse.'","'.$email.'")';
    return $sql;
}

function DeleteClient($id){
    $sql = 'DELETE FROM client WHERE ID = '.$id.'';
    return $sql;
}

function UpdateClient($id, $role, $login, $password,  $tel, $ville, $adresse, $email){
    $sql = 'UPDATE client SET role = "'.$role.'",  login = "'.$login.'", password = "'.$password.'", Tel = "'.$tel.'", Ville = "'.$ville.'", Adresse = "'.$adresse.'"
    , Email = "'.$email.'"
    WHERE ID = "'.$id.'"';
    return $sql;
}

function GetClients($id, $role, $login, $password,  $tel, $ville, $adresse, $email){
    $sql = 'UPDATE client SET role = "'.$role.'",  login = "'.$login.'", password = "'.$password.'", Tel = "'.$tel.'", Ville = "'.$ville.'", Adresse = "'.$adresse.'"
    , Email = "'.$email.'"
    WHERE ID = "'.$id.'"';
    return $sql;
}


//Produit
function InsertProduit($Référence , $Prix,  $Désignation, $Catégorie, $Prixacquisition){
    $sql = 'INSERT INTO produit VALUES("'.$Référence.'", "'.$Prix.'","'.$Désignation.'","'.$Catégorie.'","'.$Prixacquisition.'")';
    return $sql;
}

function DeleteProduit($Référence){
    $sql = 'DELETE FROM produit WHERE Référence = '.$Référence.'';
    return $sql;
}

function UpdateProduit($Référence , $Prix,  $Désignation, $Catégorie, $Prixacquisition){
    $sql = 'UPDATE produit SET Prix = "'.$Prix.'",  Désignation = "'.$Désignation.'", Catégorie = "'.$Catégorie.'", Prixacquisition = "'.$Prixacquisition.'"
    WHERE Référence = "'.$Référence.'"';
    return $sql;
}
//Commande
function InsertCommande($Num  , $Date,  $Numclt){
    $sql = 'INSERT INTO commande VALUES("'.$Num.'", "'.$Date.'","'.$Numclt.'")';
    return $sql;
}

function DeleteCommande($Num){
    $sql = 'DELETE FROM commande WHERE Num = '.$Num.'';
    return $sql;
}

function UpdateCommande($Num  , $Date,  $Numclt){
    $sql = 'UPDATE commande SET Date = "'.$Date.'",  Numclt = "'.$Numclt.'"
    WHERE Num = "'.$Num.'"';
    return $sql;
}

//LigneCommande
function InsertLigneCommande($Refprod , $Numcmd,  $Quantité){
    $sql = 'INSERT INTO lignedecommande VALUES("'.$Refprod.'", "'.$Numcmd.'","'.$Quantité.'")';
    return $sql;
}

function DeleteLigneCommande($Refprod, $Numcmd){
    $sql = 'DELETE FROM lignedecommande WHERE Refprod = "'.$Refprod.'" AND Numcmd = "'.$Numcmd.'"';
    return $sql;
}

function UpdateLigneCommande($Refprod, $Numcmd,  $Quantité){
    $sql = 'UPDATE lignedecommande SET Quantité = "'.$Quantité.'"
    WHERE Refprod = "'.$Refprod.'" AND Numcmd = "'.$Numcmd.'"';
    return $sql;
}
?>