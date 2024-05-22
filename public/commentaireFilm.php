<?php

//Déterminer si le formulaire à été soumis
// Utilisation d'une variable superglobale $_SERVEUR
// $_SERVEUR : tableau associatif contenant des informations sur la requete http

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";



require_once "../base.php";
require_once BASE_PROJET."\src\database\db-films.php";
require_once BASE_PROJET."\src\database\db-commentaire.php";

session_start();

$pseudo = null;
if (isset ($_SESSION["pseudo"])) {
    $pseudo = $_SESSION["pseudo"];
    $id_utilisateur = $_SESSION["id_utilisateur"];
}else{
    $_SESSION["message_erreur"] = "Vous n'êtes pas connecté, connecté vous à un compte ou créer en un pour accèder à la page de création d'un commentaire.";
    header("Location: messageErreur.php");
    exit();
}


$pdo=getConnexion();




$erreurs = [];

$titre = "";
$avis = "";
$note = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //le formulaire à été soumis !
    //Traiter les données du formulaire
    //Récupérer les valeur saisie par l'utilisateur
    // Superglobale $_POST : tableau associatif

    $titre = $_POST["titre"];
    $avis = $_POST["avis"];
    $note = $_POST["note"];

    //Validation des données
    if (empty($titre)) {
        $erreurs ["titre"] = "Le titre est obligatoire.";
    }
    if (empty($avis)) {
        $erreurs ["avis"] = "L'avis est obligatoire.";
    }
    if (empty($note)) {
        $erreurs ["note"] = "La note est obligatoire.";
    }


    if (empty($erreurs)) {
        // Traitement des données (exemple insertion dans une base de données)
        //Redirigé l'utilisateur vers une autre page (la page d'accueil)

//2. Prépareration de la requête


        $id = null;

        if (isset($_GET["id"])) {
            $id = $_GET["id"];


            EnvoyerCommentaireFilm($titre, $avis, $note, $id_utilisateur, $id);

            header("Location: index.php");
            exit();


        }
    }

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
    <title>Login</title>
</head>
<body class="bg-light">
<!--Insertion d'un menu-->

<?php require_once BASE_PROJET."\src\_partials\header.php" ?>

<div class="container">
    <h3 class="ms-5">votre Évaluation</h3>

    <div class="w-75 mx-auto">
        <form action="" method="post" novalidate>

            <div class="mb-3">
                <label for="titre" class="form-label">Titre* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["titre"])) ? "border border-2 border-danger" : "" ?>"
                       id="titre"
                       name="titre"
                       value="<?= $titre ?>"
                       placeholder="Saisissez le titre">

                <?php if (isset($erreurs["titre"])) : ?>

                    <p class="form-text fs-5 text-rouge"> <?= $erreurs["titre"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="avis" class="form-label">Avis* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["avis"])) ? "border border-2 border-danger" : "" ?>"
                       id="avis"
                       name="avis"
                       value="<?= $avis ?>"
                       placeholder="Saisissez votre avis">

                <?php if (isset($erreurs["avis"])) : ?>

                    <p class="form-text fs-5 text-rouge"> <?= $erreurs["avis"] ?></p>

                <?php endif; ?>
            </div>



            <div class="mb-3">
                <label for="note" class="form-label">Votre note* :</label>
                <input type="number"
                       class="form-control <?= (isset($erreurs["note"])) ? "border border-2 border-danger" : "" ?>"
                       id="note"
                       name="note"
                       value="<?= $note ?>"
                       placeholder="Saisissez votre note de 0 à 5">

                <?php if (isset($erreurs["note"])) : ?>

                    <p class="form-text fs-5 text-rouge"> <?= $erreurs["note"] ?></p>

                <?php endif; ?>
            </div>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-3">Valider</button>
            </span>
        </form>
    </div>



</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>