<?php

//Déterminer si le formulaire à été soumis
// Utilisation d'une variable superglobale $_SERVEUR
// $_SERVEUR : tableau associatif contenant des informations sur la requete http

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";



require_once "../base.php";
require_once BASE_PROJET."\src\database\db-utilisateurs.php";

$pdo=getConnexion();




$erreurs = [];
$pseudo = null;
$email = "";
$mdp = "";
$mdpVerif = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //le formulaire à été soumis !
    //Traiter les données du formulaire
    //Récupérer les valeur saisie par l'utilisateur
    // Superglobale $_POST : tableau associatif

    $pseudo = $_POST["pseudo_utilisateur"];
    $email = $_POST["email_utilisateur"];
    $mdp = $_POST["mdp_utilisateur"];
    $mdpVerif = $_POST["mdpVerif"];

    $emails = getVerifieEmail($email);

    //Validation des données
    if (empty($pseudo)) {
        $erreurs ["pseudo_utilisateur"] = "Le pseudo est obligatoire.";
    }
    if (empty($email)) {
        $erreurs ["email_utilisateur"] = "L'email est obligatoire.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs ["email_utilisateur"] = "L'email n'est pas valide.";
    }elseif (!empty($emails)){
        $erreurs ["email_utilisateur"] = "cette adresse email est déjà utilisé.";
    }
    if (empty($mdp)) {
        $erreurs ["mdp_utilisateur"] = "Le mot de passe est obligatoire.";
    }
    if (empty($mdpVerif)) {
        $erreurs ["mdpVerif"] = "Le mot de passe doit être à nouveau saisie.";
    }elseif ($mdp!=$mdpVerif){
        $erreurs ["mdpVerif"] = "Le mot de passe saisie est différent, il doit être identique.";
    }

    //Traiter les données

    if (empty($erreurs)) {
        // Traitement des données (exemple insertion dans une base de données)
        //Redirigé l'utilisateur vers une autre page (la page d'accueil)

//2. Prépareration de la requête

        $mdpHacher=password_hash($mdp,PASSWORD_DEFAULT);

        EnvoyerFormulaire($pseudo,$email,$mdpHacher);

        session_start();
        $_SESSION["pseudo"] = $pseudo;

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
    <h3 class="ms-5">Se créer un compte :</h3>

    <div class="w-75 mx-auto">
        <form action="" method="post" novalidate>

            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["pseudo_utilisateur"])) ? "border border-2 border-danger" : "" ?>"
                       id="pseudo"
                       name="pseudo_utilisateur"
                       value="<?= $pseudo ?>"
                       placeholder="Saisissez votre pseudo">

                <?php if (isset($erreurs["pseudo_utilisateur"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["pseudo_utilisateur"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email* :</label>
                <input type="text"
                       class="form-control <?= (isset($erreurs["email_utilisateur"])) ? "border border-2 border-danger" : "" ?>"
                       id="email"
                       name="email_utilisateur" value="<?= $email ?>" placeholder="Saisissez votre email"
                       aria-describedby="emailHelp">

                <?php if (isset($erreurs["email_utilisateur"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["email_utilisateur"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (isset($erreurs["mdp_utilisateur"])) ? "border border-2 border-danger" : "" ?>"
                       id="mdp" name="mdp_utilisateur" placeholder="Saisissez votre mot de passe">

                <?php if (isset($erreurs["mdp_utilisateur"])) : ?>

                    <p class="form-text text-danger"> <?= $erreurs["mdp_utilisateur"] ?></p>

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