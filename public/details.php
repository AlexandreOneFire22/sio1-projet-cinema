<?php
// Récupère le paramètre d'URL "prenom"
// Tester la présence du paramètre

$id = null;

if(isset($_GET["id"])) {
    $id = $_GET["id"];


    require_once "..\base.php";
    require_once BASE_PROJET."/src/database/db-films.php";
    require_once BASE_PROJET."\src\database\db-utilisateurs.php";

    session_start();

    $pseudo = null;
    if (isset ($_SESSION["pseudo"])) {
        $pseudo = $_SESSION["pseudo"];
    }


    $details = getDetails($id);
}

if ($details===[]){
    header("Location: message_erreur.php");
    exit();
}

$temps=$details[0]["durée"];

$minute=$temps%60;
$heure=($temps-$minute)/60;

if ($minute<=10){
    $minute="0$minute";
}


$temps="$heure H $minute";

$dateImplode=explode("-",$details[0]["date_sortie"]);

$date= implode("/",array_reverse($dateImplode));

if ($details[0]["id_utilisateur"]==0) {
    $pseudoFilm = "Admin";
}else{
    $pseudoFilm = getPseudoByIdUtilisateur($details[0]["id_utilisateur"]);
    $pseudoFilm = $pseudoFilm[0]["pseudo_utilisateur"];
}


?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="assets/css/cyborg-bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>détails</title>
</head>
<body class="text-blanc">

<?php include_once BASE_PROJET."\src\_partials\header.php" ?>

<section class="container mt-3">

    <div class="d-flex justify-content-start bg-light">
        <div>
            <img src="<?=$details[0]["image"]?>" width="300px" class="m-3 img-fluid">
        </div>
        <div class="d-flex flex-column mb-3 container-fluid" style="height: 450px;">

            <div> <h1 class="m-3 mx-5"><?= $details[0]["titre"] ?></h1></div>

            <div class="text-center m-3 mx-5 px-5"> <?= $details[0]["résumé"] ?></div>

            <div class="mt-auto p-2">
                <div class="d-flex justify-content-evenly">

                    <div><i class="bi bi-clock"></i>  : <?= $temps ?></div>
                    <div> <i class="bi bi-globe-americas"></i>  : <?= $details[0]["pays"] ?></div>
                    <div> <i class="bi bi-calendar-event"></i>  : <?= $date ?></div>

                </div>
            </div>


            <div class="mt-auto p-2">
                <div class="d-flex justify-content-end me-5 pe-5">

                    <div><i class="bi bi-person-fill"></i>  : <?= $pseudoFilm ?></div>

                </div>
            </div>
        </div>
    </div>

</section>



<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>