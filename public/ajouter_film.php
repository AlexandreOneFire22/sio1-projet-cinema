<?php

//Déterminer si le formulaire à été soumis
// Utilisation d'une variable superglobale $_SERVEUR
// $_SERVEUR : tableau associatif contenant des informations sur la requete http

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";



require_once "../base.php";
require_once BASE_PROJET."\src\database\db-film.php";

$pdo=getConnexion();




$erreurs = [];

$titre = "";
$duree = "";
$resume = "";
$date_sortie = "";
$pays = "";
$image = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //le formulaire à été soumis !
    //Traiter les données du formulaire
    //Récupérer les valeur saisie par l'utilisateur
    // Superglobale $_POST : tableau associatif

    $titre = $_POST["titre"];
    $duree = $_POST["durée"];
    $resume = $_POST["résumé"];
    $date_sortie = $_POST["date_sortie"];
    $pays = $_POST["pays"];
    $image = $_POST["image"];

    //Validation des données
    if (empty($titre)) {
        $erreurs ["titre"] = "Le titre est obligatoire.";
    }
    if (empty($duree)) {
        $erreurs ["durée"] = "La durée est obligatoire.";
    }
    if (empty($resume)) {
        $erreurs ["résumé"] = "Le résumé est obligatoire.";
    }
    if (empty($date_sortie)) {
        $erreurs ["date_sortie"] = "La date de sortie est obligatoire";
    }
    if (empty($pays)) {
        $erreurs ["pays"] = "Le pays est obligatoire.";
    }
    if (empty($image)) {
        $erreurs ["image"] = "L'image est obligatoire.";
    }

    //Traiter les données

    if (empty($erreurs)) {
        // Traitement des données (exemple insertion dans une base de données)
        //Redirigé l'utilisateur vers une autre page (la page d'accueil)

//2. Prépareration de la requête

        EnvoyerFormulaire($titre,$duree,$resume,$date_sortie,$pays,$image);

        header("Location: index.php");
        exit();
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
    <h3 class="ms-5">Ajouter un film :</h3>

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

                    <p class="form-text text-danger"> <?= $erreurs["titre"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="durée" class="form-label">Durée* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["durée"])) ? "border border-2 border-danger" : "" ?>"
                       id="durée"
                       name="durée"
                       value="<?= $duree ?>"
                       placeholder="Saisissez la durée sous la forme JJ MM AAAA">

                <?php if (isset($erreurs["durée"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["durée"] ?></p>

                <?php endif; ?>
            </div>











            <div class="mb-3">
                <label for="résumé" class="form-label">Titre* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["titre"])) ? "border border-2 border-danger" : "" ?>"
                       id="titre"
                       name="titre"
                       value="<?= $titre ?>"
                       placeholder="Saisissez le titre">

                <?php if (isset($erreurs["titre"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["titre"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="mdpVerif" class="form-label"> confirmé votre mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs["mdpVerif"])) ? "border border-2 border-danger" : "" ?>"
                       id="mdpVerif" name="mdpVerif" placeholder="Saisissez à nouveau votre mot de passe">

                <?php if (isset($erreurs["mdpVerif"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["mdpVerif"] ?></p>

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