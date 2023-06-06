-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 06 juin 2023 à 20:08
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `houbi_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `user_id`, `product_id`, `created`) VALUES
(41, '202306062F37', 16, 14, '2023-06-06 16:08:33'),
(42, '202306065840', 16, 14, '2023-06-06 17:36:38'),
(43, '202306066174', 16, 15, '2023-06-06 19:36:02'),
(44, '20230606874A', 16, 14, '2023-06-06 19:36:22'),
(45, '2023060619B7', 16, 14, '2023-06-06 19:38:00'),
(46, '20230606E100', 16, 14, '2023-06-06 19:38:40'),
(47, '20230606FB51', 16, 14, '2023-06-06 19:39:47'),
(48, '202306064685', 16, 16, '2023-06-06 19:42:44'),
(49, '2023060658AC', 16, 16, '2023-06-06 19:45:26'),
(50, '202306063FAE', 16, 8, '2023-06-06 19:47:25'),
(51, '20230606478D', 16, 8, '2023-06-06 19:48:23');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(10) NOT NULL AUTO_INCREMENT,
  `title_produit` varchar(100) DEFAULT NULL,
  `description_produit` text DEFAULT NULL,
  `prix_produit` varchar(100) DEFAULT NULL,
  `image_produit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `title_produit`, `description_produit`, `prix_produit`, `image_produit`) VALUES
(8, 'Nour', 'Caftan sir&egrave;ne', '369', 'IMG_2047-scaled.jpg'),
(14, 'Hiba', 'HIHI', '356', 'IMG_2007-scaled.jpg'),
(15, 'Sara', NULL, '235', 'IMG_2036-scaled.jpg'),
(16, 'Aicha', NULL, '399', 'IMG_2084-scaled.jpg'),
(17, 'Souk', NULL, '400', 's-l400.jpg'),
(18, 'Dina', NULL, '250', 'dina1.jpg'),
(20, 'Basma', NULL, '325', 'Basma.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nompre_user` varchar(100) DEFAULT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `pass_user` varchar(250) DEFAULT NULL,
  `tel_user` varchar(10) DEFAULT NULL,
  `address_user` text DEFAULT NULL,
  `login_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nompre_user`, `email_user`, `pass_user`, `tel_user`, `address_user`, `login_user`) VALUES
(16, 'Hiba', 'elbouzidihiba02@icloud.com', '$2y$10$f546b4AS6jbf9IlvKBXX1OjP2oun/5FLS1quJrLRJ7hDEpLoD.Jfm', '0628313257', '95b  avenue du general leclerc, Bat B, 4eme etage', 'Hiba'),
(18, 'a', 'A@A', '$2y$10$fTXQSCI4uGseDPEd8AVs9eqqUmR1G6lLwaTUX5xHzhYKqql7kvGua', 'a', 'a', 'a'),
(19, 'admin', 'admin@admin.fr', '$2y$10$2GXvukYQPmrTiPEN7ItrLuLJLlXiQXi6ZK/diE0JtjMKTJEj6xlq6', '0987654456', 'admin', 'admin'),
(20, 'Hiba', 'elbouzidihiba02@icloud.com', '$2y$10$.PL9RTGBo8cZ1javtUdxkO0qIrs9ZqhNNyl3p3AWyH7S9UZCZmyvy', '12345678', '95b  avenue du general leclerc, Bat B, 4eme etage', 'basma');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id_produit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
