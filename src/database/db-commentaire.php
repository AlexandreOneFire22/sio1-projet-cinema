<?php
require_once BASE_PROJET."\src\config\db_config.php";

function EnvoyerCommentaireFilm($titre,$avis,$note,$date,$id_utilisateur,$id_film):array{
    $pdo = getConnexion();

    $titre = str_replace("'","\'",$titre);
    $avis = str_replace("'","\'",$avis);

    $requete = $pdo->query("INSERT INTO `commentaire` (`id_commentaire`, `titre`, `avis`, `note`, `date`, `id_utilisateur`, `id_film`) 
            VALUES (NULL, '$titre', '$avis', '$note', '$date', '$id_utilisateur', '$id_film');");

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}