-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 avr. 2024 à 11:24
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `durée` int(11) NOT NULL,
  `résumé` text NOT NULL,
  `date_sortie` date NOT NULL,
  `pays` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `durée`, `résumé`, `date_sortie`, `pays`, `image`, `id_utilisateur`) VALUES
(1, 'Notre aventure ensemble', 90, 'Ce film retrace une vie partagé à deux dans la joie, l\'amour et la bonne humeur.', '2023-02-13', 'France', 'https://www.wallpaperuse.com/wallp/87-874338_m.jpg', 0),
(2, 'Où est mon pétrole !', 80, 'Ce film est une comédie dans un monde où le pétrole est devenu une dorée extrêmement rare, on suis l\'Amérique allant dans tous les pays à la recherche de pétrole.', '2019-12-25', 'Etats-Unis', 'https://img.freepik.com/photos-premium/fonds-ecran-feu-glace_777078-10852.jpg', 0),
(4, 'Le petit doigt', 180, 'Ce film est un long métrage de 3h dans le quelle nous suivons les aventures d\'un petit doigt', '2021-04-01', 'France', 'https://img.freepik.com/premium-photo/fire-ice-wallpapers-images-your-iphone-android-fire-ice-wallpapers-are-available-high-definition-high-definition-fire-ice-wallpaper-fire-ice_900101-32562.jpg', 0),
(5, 'Le petit doigt 2', 6000, 'Les créateurs du petit doigt se sont surpasser car il ont réussi à réaliser la suite du film en seulement 10h.', '2021-04-01', 'France', 'https://i.pinimg.com/originals/30/35/b2/3035b2d070543fd20dce395d0f44cdc5.jpg', 0),
(6, 'Vin Gazole', 100, 'Ce film est centrer sur le personnage de vin gazole, une version alternative d\'un monde parallèle très beauf du célèbre Vin Diesel.', '2022-04-10', 'Chine', 'https://i.pinimg.com/474x/69/6f/fb/696ffb0e0e737bbd3862258e8306b1b0.jpg', 0),
(7, 'My little poney éradique le monde', 170, 'Film d\'action dans le quelle les poneys de my little poney veulent éradiquer les humains de la surface de la planète, heureusement Winnie l\'ourson décide de les aider à se battre contre ses poneys avec ses amis.', '2026-09-01', 'Allemand', 'https://img.freepik.com/photos-premium/fonds-ecran-pour-iphone-violets-rouges_900775-7441.jpg?w=360', 0),
(8, 'Toad pose se couteau......', 150, 'Film d\'horreur dans le quelle Toad découvre les couteaux, il en deviens accro et affirme que le couteaux l\'ordonne de tuer.', '2024-10-31', 'Russie', 'https://img.freepik.com/photos-premium/fonds-ecran-iphone-qui-sont-hors-monde_900775-7624.jpg', 0),
(9, 'Les hippopotame ninja', 160, 'Après avoir manger des pastèques radioactive nos 4 hippopotame se transforme en hippopotame ninja et devienne également des justicier.', '2017-07-20', 'Brazil', 'https://img.freepik.com/photos-premium/arc-ciel-couleurs-est-colore-violet-orange_662214-90172.jpg', 0),
(10, 'Purple-Man', 140, 'Ce nouveau marvel est basé sur une histoire vrai d\'un super méchant qui contrôle la couleur violette, il s\'en servira pour faire le mal et principalement volé le sac à main des mamies de New-York.', '2016-01-01', 'Etat-Unis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1yRPgqtw85n7Yo8E6uUbMJZJfWSGvJqxd4R9ch_JConh7z1Cd2yO-J4EUshDzJMMVhDI&usqp=CAU', 0),
(11, 'Pascalou, la naissance du mal', 169, 'Durant son enfance, Pascalou Ramseyer semble nager dans l\'incompréhension de ses proches. Ce sentiment le poursuivra même jusqu\'au rejet de sa candidature à la formation des enseignants du site de Besançon. Désœuvré, il accueille la déclaration de guerre avec enthousiasme et se hisse jusqu\'au grade de caporal. Victime d\'une attaque au gaz, il est hospitalisé jusqu\'à la fin de la guerre puis démobilisé. À la fin du conflit, il commence à s\'investir dans le monde de la politique, et également à se faire connaître en France, grâce à son parti : le Parti national-socialiste des travailleurs français. ', '2024-03-18', 'France', 'https://i.pinimg.com/736x/07/74/81/077481a7c8ae1b027e790539f9d7f6ac.jpg', 0),
(12, 'Méteastro, le début de la fin', 90, 'Le site web Méteastro fût la cause de la 3ème guerre mondial, celle-ci mena le monde à sa perte.', '2024-03-16', 'France', 'https://i.pinimg.com/736x/0c/c9/b4/0cc9b4acd303bf26f5f9f8c9d83b3e63.jpg', 0),
(13, 'La révolte des outils de jardinage', 120, 'Les outils de jardinage en on marre de se sentir utiliser, c\'est pourquoi ils ont décidé de se révolté et d’éradiqué l\'humanité.', '2024-03-01', 'Allemagne', 'https://wallpapercave.com/wp/wp6078799.jpg', 0),
(19, 'Good Boy~', 62, 'C\'est l\'histoire d\'un bon Good Boy~', '2024-04-10', 'France', 'https://i.pinimg.com/736x/a5/ae/1d/a5ae1d250d4c8fe28b39225224a70d8d.jpg', 7),
(20, 'Alastor', 95, 'Alastor, démon de la radio, malgré ça puissance il garde constament le sourire. Pourtant......dans son ombre parfois son grand sourire n\'est plus.', '2013-07-13', 'France', 'https://e1.pxfuel.com/desktop-wallpaper/881/337/desktop-wallpaper-vertical-space-space.jpg', 7);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo_utilisateur` varchar(50) NOT NULL,
  `email_utilisateur` varchar(100) NOT NULL,
  `mdp_utilisateur` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_utilisateur`, `email_utilisateur`, `mdp_utilisateur`) VALUES
(2, 'Ethan', 'ethan@gmail.com', '$2y$10$QRGE/p.onsOvqZZwzfAsKeG7xm2KN3G/yyoMtAGpr9gV7QLygc/u6'),
(3, 'Ethan2', 'ethan2@gmail.com', '$2y$10$x.v4eSkj3KQUkNOiXhnjReZ7QuDqmTKnwairlKuFPQFZxStWo/kkW'),
(4, 'Ethan3', 'ethan3@gmail.com', '$2y$10$gtwMSVypwVX5wCQdjoTbxepNUiejcchfHkhlq.gcMIks2RIMzWeKm'),
(6, 'alexandre', 'alexandre@gmail.com', '$2y$10$.hFxN5chVgyy9Dpi99h5suZW7d/8wEowuveO84jDsC7ivtXD4XV8u'),
(7, 'Ethan <3', 'ethancoeur@gmail.com', '$2y$10$V36FULHkdvfGywa/jsxZ7OCKpnep3IUAY.oajXQrz5V/U82eb.4qG'),
(8, 'EthanLeTest', 'ethanletest@gmail.com', '$2y$10$4.sLhNDZ1P6fcpNFJzo6u.9MROAor9VlFdXkfeneKlRzJOYJRFsmq'),
(9, 'EthanLeTest2', 'ethanletest2@gmail.com', '$2y$10$GKjmVA4pC201Y8w8OgOYlOx356lFE5rW5me829WeQT8A1VpoCQqgy'),
(10, 'toto', 'toto@test.fr', '$2y$10$XBGCIrJbr6z69VzanPJLjebIY2gRRalN3MXbBvfNtvR8hYGEj4OPG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FILM_UTILISATEUR` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_FILM_UTILISATEUR` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
