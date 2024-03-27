<?php
require_once "../../base.php";
// Récupérer la liste des étudiants dans la table etudiant

//1. connexion à la base de données db_intro
/**
 * @var PDO $pdo
 */

require "../config/db_config.php";

//2. Prépareration de la requête

$requete = $pdo->prepare("SELECT 'email_utilisateur' FROM utilisateur");

//3. Exécution de la requête
$requete->execute();

//4. Récupération des enregistrements
//1. enregistrement = 1 tableau associatif
$emails = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<pre>
    <?php print_r($emails);?>
</pre>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./assets/css/cyborg-bootstrap.min.css" rel="stylesheet">



    <title>cinéma</title>
</head>
<body>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>