<?php   
    require_once('db.php');
    require_once('Klase/Prijava.class.php');
    $prijavaId = $_POST['prijava_id'];
    $brojBodova = $_POST['broj_bodova'];

    // POSLE KREIRANE KLASE PRIJAVA IZVRSITI UPDATE
    $lik = Prijava::getOne($prijavaId);
    print_r($lik);
    $lik->unesiRezultat($brojBodova);

?>