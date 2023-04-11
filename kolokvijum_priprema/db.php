<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $baza = "k1primer";

    try{        
        $pdo = new PDO("mysql:host=$server;dbname=$baza;", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        // echo "Konekcija uspesna";
    }
    catch(PDOexception $e) {
        echo "Greska: ".$e->getMessage();
    }

?>