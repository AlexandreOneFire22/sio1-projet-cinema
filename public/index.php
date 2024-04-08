<?php

require_once "../base.php";
require_once BASE_PROJET."\src\database\db-films.php";

session_start();

$pseudo = null;
if (isset ($_SESSION["pseudo"])) {
    $pseudo = $_SESSION["pseudo"];
}


$films=getFilms();

?>

<style>
    card-img-top {
        height:400px;
        width: 200px;
    }
</style>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/cyborg-bootstrap.min.css" rel="stylesheet">



    <title>cinéma</title>
</head>
<body>
    <?php require_once BASE_PROJET."\src\_partials\header.php" ?>

    <section class="container">

    <div class="row">

        <?php for ($i = 0; $i < count($films); $i++) : ?>

        <?php
            $temps=$films[$i]["durée"];

            $minute=$temps%60;
            $heure=($temps-$minute)/60;

            if ($minute<=10){
                $minute="0$minute";
            }

            $temps="$heure H $minute"
        ?>


        <div class="col col-12 col-md-6 col-xl-3 h-100">
            <div class="card mb-3 m-4" style="height: 630px">
                <img src="<?= $films[$i]["image"] ?>" class="card-img-top p-0 p-2 img-fluid">
                <div class="card-body w-100">
                    <h5 class="card-title text-blanc"><?= $films[$i]["titre"] ?></h5>
                    <p class="card-text text-truncate text-blanc" style="max-width: 200px;"> <?= $films[$i]["résumé"] ?></p>
                </div>
                <div class="d-flex justify-content-evenly">
                    <p class="text-blanc align-self-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
                            <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z"/>
                            <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3"/>
                        </svg> <?= $temps ?></p>
                    <a href="details.php?id=<?=$films[$i]["id"]?>" class="btn btn-primary mx-2 text-blanc mb-3">Aller voir</a>
                </div>
            </div>
        </div>

        <?php endfor;?>

    </div>

    </section>

        <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>