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
  
?>