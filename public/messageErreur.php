<?php

require_once "../base.php";

session_start();

if (!isset($_SESSION["message_erreur"])){
    $_SESSION["message_erreur"]="Une erreur est survenue.";
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



    <title>cinéma</title>
</head>

<body>
<?php require_once BASE_PROJET."\src\_partials\header.php" ?>

<section class="container">

    <div class="bg-danger p-4">

        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="currentColor" class="bi bi-exclamation-triangle text-white" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
        </div>

        <h2 class="text-center m-4"><?= $_SESSION["message_erreur"] ?></h2>

        <div class="text-center"><a class="btn btn-jaune fs-3 mt-4" href="index.php">redirection....</a> </div>





    </div>


</section>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
