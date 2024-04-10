<?php
require_once BASE_PROJET."\src\config\db_config.php";

function getVerifieEmail($email):array{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT * FROM `utilisateur` WHERE `email_utilisateur` LIKE '$email'");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function EnvoyerFormulaire($pseudo,$email,$mdpHacher):array{
    $pdo = getConnexion();
    $requete = $pdo->query("INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_utilisateur`, `email_utilisateur`, `mdp_utilisateur`) 
            VALUES (NULL, '$pseudo', '$email', '$mdpHacher');");

    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getPseudoByIdUtilisateur($id_utilisateur):array{
    $pdo = getConnexion();
    $requete = $pdo->query("SELECT `pseudo_utilisateur` FROM `utilisateur` WHERE `id_utilisateur` = $id_utilisateur");
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}