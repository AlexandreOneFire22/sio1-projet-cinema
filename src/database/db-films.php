<?php
require_once BASE_PROJET."\src\config\db_config.php";

// fonction permettant de récupérer tous les films

function getFilms():array
{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT * FROM film");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getDetails($id):array
{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT * FROM film WHERE id = $id");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function EnvoyerFormulaire($titre,$duree,$resume,$date_sortie,$pays,$image):array{
    $pdo = getConnexion();
    $requete = $pdo->query("INSERT INTO `film` (`id`, `titre`, `durée`, `résumé`, `date_sortie`, `pays`, `image`,) 
            VALUES (NULL, '$titre', '$duree', '$resume', '$date_sortie', '$pays', '$image');");

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}