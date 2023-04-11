<?php
    require_once("db.php");
    require_once("./Klase/Prijava.class.php");

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $smer_id = $_POST['smer'];

    // Validacije forme prijave
    if (strlen($ime) < 3) { echo "Ime nije validno, mora da ima najmanje tri slova"; }
    else if (strlen($ime) < 3) { echo "Ime nije validno, mora da ima najmanje tri slova"; }    
    else if (!is_int(intval($smer_id))) { echo "Smer nije validan"; }
    else {
        $prijva = new Prijava();        
        $prijva->ime = $ime;
        $prijva->prezime = $prezime;
        $prijva->smer_id = $smer_id;
        $prijva->datum_prijave = null;
        $prijva->bodova = null;

        $prijva->save();
        
        header('Location: index.php?id='.$pdo->lastInsertId());
        
               
    }

?>