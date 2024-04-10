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
    $_SESSION["message_erreur"] = "Le film demander n'éxiste pas ou n'éxiste plus.";
    header("Location: messageErreur.php");
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

<div class="container bg-light p-3 mb-5">

    <h3 class="text-center fw-semibold"><i class="bi bi-stars"></i> Avis</h3>

    <a href="commentaireFilm.php?id=<?=$id?>" class="btn btn-primary mx-2 text-blanc mb-3">commentaire</a>

    <p class="text-center">Ce que les utilisateurs pensent du jeu...</p>

    <ul class="list-group">
        <li class="list-group-item">
            <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i
                    class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>

            <h5> La VR c'est super :)</h5>

            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus blanditiis consectetur distinctio
                dolorem dolorum ducimus eaque illo, labore laboriosam maiores numquam officiis omnis pariatur quaerat
                quos rerum ut veniam vitae. </p>

            <div class="text-secondary">Avis de Ethan le 01/09/2023</div>
        </li>

        <li class="list-group-item">
            <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i
                    class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>

            <h5> La VR c'est super :)</h5>

            <p>Rien de plus à rajouter, la VR c'est génial :)</p>

            <div class="text-secondary">Avis de Ethan le 01/09/2023</div>
        </li>

        <li class="list-group-item">
            <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i> <i
                    class="bi bi-star-fill"></i> <i class="bi bi-star-fill"></i>

            <h5> La VR c'est super :)</h5>

            <p>Rien de plus à rajouter, la VR c'est génial :)</p>

            <div class="text-secondary">Avis de Ethan le 01/09/2023</div>
        </li>
    </ul>
</div>



<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>