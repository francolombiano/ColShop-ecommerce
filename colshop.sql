-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 10 juin 2024 à 14:43
-- Version du serveur : 8.0.30
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `colshop`
--
CREATE DATABASE IF NOT EXISTS `colshop` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `colshop`;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produit` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` float NOT NULL,
  `stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `image`, `nom`, `description`, `price`, `stock`) VALUES
(2, 'avena.jpg', 'Avena Alpina', 'Boisson nutritionnelle avec avoine et de cannelle, faible en sucres, 100% naturelle. Présentation de 250 gr.', 5, 100),
(3, 'brevas.jpg', 'Brevas en Almibar', 'Telles que les préparait ma grand-mère, des figues fraîches en sirop conservées dans un bocal en verre. Présentation de 770 gr.', 8, 100),
(4, 'cafe.jpg', 'Cafe colombiano/colombien', 'Acqui&egrave;re le caf&eacute; colombien in&eacute;gal&eacute; et profite de son ar&ocirc;me et de sa saveur. Marque : Aguila Roja. Pr&eacute;sentation de 250 gr.', 7, 100),
(5, 'galletas.jpg', 'Galletas/Biscuits', 'Les saveurs secrètes sont déjà ici, disponibles en format de 300 gr. Marque: Ducales.', 4, 100),
(6, 'gudiz.jpg', 'Gudiz', 'Avec mes Gudiz je suis heureux avec mes pétales de maïs. Achetez-les frais et revivez ces doux moments de votre vie.', 3, 200),
(7, 'harina_pan.jpg', 'Harina Pan/ Farine Pain', 'Ne restez pas sans votre Harina Pan et profitez du goût de une arepa maison pour vous rappeler les petits déjeuners colombiens tout en savourant la France. Présentation de 1 kg.', 4, 150),
(8, 'malta.jpg', 'Pony Malta', 'La boisson des champions est maintenant ici, prête à accompagner vos repas, vos séances sportives ou simplement à déguster quand vous le désirez. Présentation de 330 ml.', 3, 180),
(9, 'milo.jpg', 'Milo', 'Produit énergétique aromatisé au chocolat pour la préparation de boissons chaudes ou froides à base de lait.', 14, 140),
(26, 'jalea.jpg', 'Jalea de borojo', 'Jalea du Choco colombien dans un pot en verre pour une meilleure conservation. Pr&eacute;sentation de 400 gr. Marque Coexito', 8, 90),
(44, 'leche.jpg', 'Leche/Lait', 'D&eacute;licieux lait de vache, enrichi de tous les nutriments dont vous avez besoin. Pr&eacute;sentation de 1L, marque Colanta, parce que Colanta sait mieux faire.', 3.5, 58),
(45, 'arepas.jpg', 'Arepas', 'D&eacute;licieuses arepas de ma&iuml;s blanc, fabriqu&eacute;es &agrave; la main dans la campagne colombienne. Pr&ecirc;ts &agrave; &ecirc;tre consomm&eacute;s. Paquet de 5 unit&eacute;s. Marque Goya.', 6.5, 50),
(46, 'Kolag.jpg', 'Kola granulada', 'La Kola granul&eacute;e du bocal rouge est arriv&eacute;e ! Profitez de notre offre sp&eacute;ciale : pour tout achat de 330 g, obtenez un cadeau de 85 g, tant que les stocks dureront ! Marque JGB.', 5, 80),
(47, 'frutino.jpg', 'Frutino', 'Ne restez pas sans pr&eacute;parer votre boisson rafra&icirc;chissante Frutino et revivez ces moments avec Pibe Valderrama.', 2.5, 56),
(48, 'arequipe.jpg', 'Arequipe Alpina', 'D&eacute;licieuse arequipe Alpina &agrave; base de lait en pr&eacute;sentation de 300 gr. Ne manquez pas la v&ocirc;tre. Quantit&eacute;s limit&eacute;es.', 15, 20);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `motPasse` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `civility` enum('Femme','Homme','Autre') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `role` enum('ROLE_USER','ROLE_ADMIN') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `telephone`, `email`, `motPasse`, `civility`, `ville`, `role`) VALUES
(30, 'Gwladys Jacobin', '0256698745', 'gladys@gmail.com', '$2y$10$zoLnHn0N/FI5K9UCSunuhuKJew0kN0de3yUzVhP3lJ0uS0pdHBFH6', 'Femme', 'Paris', 'ROLE_USER'),
(31, 'Mehdi Tolba', '0245589632', 'mehdi@gmail.com', '$2y$10$FgSWKNSu6SjQDuJWjwoTrOeymVfl/RXExo0glMf3QG8q6aXB9htZq', 'Homme', 'Marseille', 'ROLE_USER'),
(32, 'Carmen Herrera', '0512478956', 'carmen@gmail.com', '$2y$10$08IG9Cb8TvdllNbM67RaneJXhyk8pQHIOBvbsHDQv92ZuaB7GYXFG', 'Femme', 'Paris', 'ROLE_USER'),
(33, 'Issa Jafari', '0125457895', 'isa@gmail.com', '$2y$10$jhWCTFI2XRmdSZwsPKy5nevW5JZMXD0hi/HQzVr0vstclRPT63mgO', 'Homme', 'Paris', 'ROLE_USER'),
(34, 'Camila Arango', '0201456987', 'cami@gmail.com', '$2y$10$VkAHlwa0i8q9H5c82PxTy.ZGK6BaKC7CfHGhAW2IQCotDr1EY8Z9G', 'Femme', 'Paris', 'ROLE_ADMIN'),
(35, 'Natalia Villegas', '7845693256', 'naty@gmail.com', '$2y$10$/3nzEKCUMw7uL9oPlE2jAuj9Y7JbOdKWUDHSXY5gafr3CAfAS5N.C', 'Femme', 'Paris', 'ROLE_ADMIN'),
(36, 'Claudia Restrepo', '7845698523', 'clao@gmail.com', '$2y$10$a4CgQ4udB1IjPTdYXMAjFeTv./q/9l5w2FdCmGVdhYagPWWhmkB7O', 'Femme', 'Paris', 'ROLE_USER'),
(37, 'Sara Cuevas', '0602254789', 'sara@gmail.com', '$2y$10$Ra4aSdHV5P0gR5NUjc31U.d3ejeCnQj///usTzVgqJenC2pUD2706', 'Femme', 'Paris', 'ROLE_USER'),
(38, 'Miguel Tavera', '0605233598', 'migue@gmail.com', '$2y$10$XUxL.E7OYNqNzsiX6SkARuvp7KXs90ifZIQQD4sKdZ.Csz2lhoGbu', 'Homme', 'Monaco', 'ROLE_ADMIN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `fk_panier_users` (`id_user`),
  ADD KEY `fk_panier_produits` (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_produits` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`),
  ADD CONSTRAINT `fk_panier_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
