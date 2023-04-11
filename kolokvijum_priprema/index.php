<?php
    require_once('db.php');
    $query = $pdo->query("select * from smer");
    $smerovi =  $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./static/style.css">
    <title>Пријава испита</title>
</head>
<body>
    <div class="container">
        <img src="./static/logo.png">
        <h1>Пријава испита</h1>
        <?php
            foreach($smerovi as $smer) {
                ?>
                <div class="smer">
                    <h2><?= $smer->naziv ?></h2>
                    <p><?= $smer->opis?></p>
                </div>
                <?php
            }
        ?>
        <hr>
        <?php
            if(isset($_GET['id'])){
                echo "<h3>Upisani ste sa brojem: ". $_GET['id'] ."</h3>";
            }            
        ?>
        <div class="forma-prijava">
            <form action="./prijava.php" method="POST">
                <div class="input-pair">
                    <label for="ime">Име: </label>
                    <input type="text" name="ime">
                </div>
                <div class="input-pair">
                    <label for="prezime">Презиме: </label>
                    <input type="prezime" name="prezime">
                </div>
                <div class="input-pair">
                    <label for="smer">Смер: </label>
                    <select name="smer" id="">
                        <option value=""></option>
                        <?php
                            foreach($smerovi as $smer) {
                                ?>
                                <option value=<?= $smer->id ?>><?=$smer->naziv?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <input type="submit" value="Пријави се">
            </form>
        </div>
    </div>
</body>
</html>