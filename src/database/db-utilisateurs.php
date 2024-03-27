<?php
require_once BASE_PROJET."\src\config\db_config.php";

// fonction permettant de récupérer tous les films

function getUtilisateur():array
{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT * FROM utilisateur");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getMail():array
{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT 'email_utilisateur' FROM utilisateur");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}