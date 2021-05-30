<?php


    include_once '../Models/Operations.php';
    $arr = array();
    $arr[0] = "Desg = 'XX'";
    $arr[1] = "Prix = 13 ";
    $arr[2] = "Prix = 'X' ";


    $string1 =  SearchForProduct($arr);
    echo $string1;




?>