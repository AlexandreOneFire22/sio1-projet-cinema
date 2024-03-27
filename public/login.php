<?php

//Déterminer si le formulaire à été soumis
// Utilisation d'une variable superglobale $_SERVEUR
// $_SERVEUR : tableau associatif contenant des informations sur la requete http

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";



require_once "../base.php";
require_once BASE_PROJET."\src\config\db_config.php";
require_once BASE_PROJET."\src\database\db-utilisateurs.php";


$pdo=getConnexion();


$erreurs = [];
$email = "";
$mdp = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //le formulaire à été soumis !
    //Traiter les données du formulaire
    //Récupérer les valeur saisie par l'utilisateur
    // Superglobale $_POST : tableau associatif

    $email = $_POST["email_utilisateur"];
    $mdp = $_POST["mdp_utilisateur"];


    $emails = getVerifieEmail($email);


    if (empty($email)) {
        $erreurs ["email_utilisateur"] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs ["email_utilisateur"] = "L'email n'est pas valide.";
    }elseif (empty($emails)){
        $erreurs ["email_utilisateur"] = "cette adresse email n'est pas utiliser.";
    }
    if (empty($mdp)) {
        $erreurs ["mdp_utilisateur"] = "Le mot de passe est obligatoire.";
    }

    //Traiter les données

    if (empty($erreurs)) {

        $compte=getVerifieEmail($email);

        if (password_verify($mdp,$compte[0]["mdp_utilisateur"])){
            header("Location: index.php");
            exit();
        }else{
            $erreurs["mdp_utilisateur"] = "mot de passe erroné";
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
    <h3 class="ms-5">Se connecter :</h3>

    <div class="w-75 mx-auto">
        <form action="" method="post" novalidate>

            <div class="mb-3">
                <label for="email" class="form-label">Email* :</label>
                <input type="text"
                       class="form-control <?= (!empty($erreurs) ? "border border-2 border-danger" : "") ?>"
                       id="email"
                       name="email_utilisateur" placeholder="Saisissez votre email"
                       aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (!empty($erreurs) ? "border border-2 border-danger" : "") ?>"
                       id="mdp" name="mdp_utilisateur" placeholder="Saisissez votre mot de passe">

                <?php if (!empty($erreurs)) : ?>

                    <p class="form-text text-danger"> L'adresse mail ou le mot de passe sont incorrect.</p>

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