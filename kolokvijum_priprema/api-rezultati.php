<?php
    require_once('db.php');
    require_once('Klase/Prijava.class.php');
    $smer_id = $_POST['smer_id'];

    //Posle kreirane klase prijava izvrsiti SELECT
    $prijave = Prijava::rezultatiZaSmer($smer_id);

    echo json_encode($prijave);

?>