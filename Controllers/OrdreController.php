<?php 
    include_once '../Models/Operations.php';
    if(!isset($_SESSION)) { session_start(); } 
    $conn = connectBase();

    if (isset($_POST['ordre'])) {
        // Insert Commande
        $respnse = $conn->exec(InsertCommande(0,date('Y-m-d'),$_SESSION['id']));
        $idCommande = $conn->lastInsertId();

        // Inerts LigneDeCommande
        foreach ($_SESSION['cart'] as $key => $value) {
            $respnse = $conn->exec(InsertLigneCommande($key, $idCommande, $value));
        }

        unset($_SESSION['cart']);
        header('Location: /Views/checkout.html.php?end=1');
    }
?>