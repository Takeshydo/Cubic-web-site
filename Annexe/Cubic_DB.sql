-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 jan. 2026 à 10:49
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `database`
--

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `pictures` mediumblob NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `damage` int NOT NULL,
  `defense` int NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`ID`, `name`, `content`, `price`, `pictures`, `type`, `damage`, `defense`, `rank`, `element`) VALUES
(1, 'épée magique du général.', 'épée en diamant enchanté\r\n\r\n', 500, 0x89504e470d0a1a0a0000000d49484452000000a0000000a0040300000079e17a1e00000024504c54450000000e3f3608252033ebcba4fdf02bc7ac1e8a77156355684e1e493615281e0b8967271acd474c0000000174524e530040e6d866000000af49444154785eedd7410dc3300c46e15108855018855128855108855218855118b9e9ff0fb1daba52a51efdde2d97ef6029b2fcb85ddb060808985aaf5957808080a9b528404040c6070878cf7aaab0000101191f20e0e1d6cf2c0b99551104041ccac205ab22080818c25b7565c1cfd40204047443ed2c4040c0745ded2d4040c08f5a9599e642050404b4f5535f65bfcf42ad080202b6d9aac28a82ae0d02020e75f5a3560401017b04781620e01f0ec28df23f100a5f0000000049454e44ae426082, 'DIAMANT', 14, 0, '', 'arme'),
(2, 'épée en fer du Combattant', 'épée de combattant agérie', 300, '', 'fer', 8, 0, '', 'arme'),
(3, 'Botte de Robin des bois', 'Botte en Cuir du Voleur', 100, '', 'Cuir', 0, 2, '', 'armure'),
(4, 'Plastron de Barbare', 'Plastron de combattant d\'élite', 400, '', 'fer', 0, 6, '', 'armure');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `pseudo`, `email`, `password`, `role`) VALUES
(9, 'UserTest', 'usertest@cubic.net', '$2y$10$0LGSRccbfNaKkMMzqK1zKOzWSsCtZTNRgbnGI1s.5hoC39PMl4d9O', 'ROLE_USER'),
(6, 'administrator', 'administrator@cubic.net', '$2y$10$rNYulLI9LPfGCW0blBredOi70XJ8gWs21fFnwTyQW35gUhcUpYotm', 'ROLE_ADMIN');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
