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

function EnvoyerFormulaireFilm($titre,$duree,$resume,$date_sortie,$pays,$image,$id_utilisateur):array{
    $pdo = getConnexion();

    $resume = str_replace("'","\'",$resume);
    $titre = str_replace("'","\'",$titre);

    $requete = $pdo->query("INSERT INTO `film` (`id`, `titre`, `durée`, `résumé`, `date_sortie`, `pays`, `image`, `id_utilisateur`) 
            VALUES (NULL, '$titre', '$duree', '$resume', '$date_sortie', '$pays', '$image','$id_utilisateur');");

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getMemeFilm($titre,$date_sortie):array
{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT * FROM film WHERE titre LIKE '$titre' AND date_sortie LIKE '$date_sortie'");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getFilmsUtilisateur($id):array
{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT * FROM film WHERE id_utilisateur = $id");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function EnvoyerCommentaireFilm($titre,$avis,$note,$date,$id_utilisateur,$id_film):array{
    $pdo = getConnexion();

    $titre = str_replace("'","\'",$titre);
    $avis = str_replace("'","\'",$avis);

    $requete = $pdo->query("INSERT INTO `commentaire` (`id_commentaire`, `titre`, `avis`, `note`, `date`, `id_utilisateur`, `id_film`) 
            VALUES (NULL, '$titre', '$avis', '$note', '$date', '$id_utilisateur', '$id_film');");

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}