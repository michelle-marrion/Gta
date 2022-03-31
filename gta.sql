-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 oct. 2021 à 05:18
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gta`
--

-- --------------------------------------------------------

--
-- Structure de la table `collaborateurs`
--

DROP TABLE IF EXISTS `collaborateurs`;
CREATE TABLE IF NOT EXISTS `collaborateurs` (
  `id_collaborateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `date_add` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_fonction` int(11) NOT NULL,
  PRIMARY KEY (`id_collaborateur`),
  KEY `id_profil` (`id_profil`),
  KEY `id_fonction` (`id_fonction`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `collaborateurs`
--

INSERT INTO `collaborateurs` (`id_collaborateur`, `nom`, `prenom`, `mail`, `password`, `tel`, `date_add`, `date_update`, `date_delete`, `status`, `id_profil`, `id_fonction`) VALUES
(1, 'Ngami Yonwa', 'Marrion Michelle', 'ngamimarrion@gmail.com', 'michelle2806', ' 237 673 66 71 39', '2021-01-04 12:00:01', NULL, NULL, 1, 2, 3),
(2, 'Leader', 'Washi', 'leader@gmail.com', 'LD01', ' 23769067551', '2021-01-05 10:50:12', '2021-01-09 14:21:17', NULL, 1, 1, 2),
(3, 'Patrice', 'Eloimme', 'paston@gmail.com', 'PE001', '234567890990', '2021-01-05 13:07:43', '2021-01-06 16:46:01', '2021-01-07 11:10:07', 1, 1, 8),
(4, 'Yvie Farelle', 'Yonwa ', 'yvie@gmail.com', 'yvie2806', ' 237890432629', '2021-01-05 14:38:20', '2021-01-07 11:25:24', '2021-01-07 11:15:13', 0, 1, 8),
(5, 'Yvie Farelle', 'Yonwa ', 'yvie@gmail.com', 'yvie2806', '680587396', '2021-01-07 09:53:03', '2021-01-07 11:35:07', NULL, 1, 1, 4),
(8, 'ANNA', 'SUPER', 'anna@gmail.com', 'annna1', '650456789', '2021-01-09 13:52:09', NULL, NULL, 1, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `id_fonction` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(250) NOT NULL,
  `date_add` datetime DEFAULT current_timestamp(),
  `date_delete` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_fonction`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`id_fonction`, `designation`, `date_add`, `date_delete`, `date_update`, `status`) VALUES
(1, 'Stagiaire', '2021-01-04 11:42:55', NULL, NULL, 1),
(2, 'Community Manager', '2021-01-04 14:59:38', NULL, NULL, 1),
(3, 'Infographe', '2021-01-04 15:00:10', NULL, NULL, 1),
(4, 'Développeur Web', '2021-01-04 15:01:09', NULL, NULL, 1),
(5, 'DG', '2021-01-04 15:35:32', NULL, NULL, 1),
(6, 'Drh', '2021-01-04 15:39:20', NULL, NULL, 1),
(7, 'DRH', '2021-01-04 15:39:51', NULL, NULL, 1),
(8, 'Comptable', '2021-01-06 05:54:15', NULL, NULL, 1),
(9, 'Commerciaux', '2021-01-09 15:04:13', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

DROP TABLE IF EXISTS `pointage`;
CREATE TABLE IF NOT EXISTS `pointage` (
  `id_pointage` int(11) NOT NULL AUTO_INCREMENT,
  `id_collaborateur` int(11) NOT NULL,
  `date_add` datetime DEFAULT NULL,
  `heure_add` time DEFAULT NULL,
  `heure_begin` time DEFAULT NULL,
  `heure_end` time DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `heure_delete` time DEFAULT NULL,
  PRIMARY KEY (`id_pointage`),
  KEY `id_collaborateur` (`id_collaborateur`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pointage`
--

INSERT INTO `pointage` (`id_pointage`, `id_collaborateur`, `date_add`, `heure_add`, `heure_begin`, `heure_end`, `date_end`, `heure_delete`) VALUES
(53, 3, '2021-03-29 00:00:00', '13:34:49', '07:36:00', '19:36:00', '2021-03-29 00:00:00', '13:37:19'),
(52, 1, '2021-01-21 00:00:00', '05:18:37', '07:19:00', '10:19:00', '2021-01-21 00:00:00', '05:19:25'),
(51, 1, '2021-01-21 00:00:00', '05:17:50', '07:19:00', '10:19:00', '2021-01-21 00:00:00', '05:19:25'),
(50, 2, '2021-01-21 00:00:00', '05:16:29', NULL, NULL, '2021-01-21 00:00:00', '05:17:28'),
(49, 1, '2021-01-21 00:00:00', '05:14:25', '07:19:00', '10:19:00', '2021-01-21 00:00:00', '05:19:25'),
(48, 2, '2021-01-20 00:00:00', '17:36:39', NULL, NULL, NULL, NULL),
(47, 1, '2021-01-20 00:00:00', '17:28:45', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(46, 1, '2021-01-20 00:00:00', '05:23:59', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(45, 1, '2021-01-19 00:00:00', '09:19:55', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(42, 1, '2021-01-14 00:00:00', '06:02:13', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(41, 1, '2021-01-13 00:00:00', '09:30:14', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(40, 1, '2021-01-12 00:00:00', '09:40:45', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(39, 1, '2021-01-11 00:00:00', '09:22:14', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(38, 3, '2021-01-13 00:00:00', '13:41:38', '08:20:00', NULL, NULL, NULL),
(44, 3, '2021-01-14 00:00:00', '11:27:46', '08:20:00', NULL, NULL, NULL),
(35, 5, '2021-01-13 00:00:00', '04:20:45', NULL, NULL, NULL, NULL),
(36, 8, '2021-01-13 00:00:00', '04:26:36', NULL, NULL, '2021-01-13 00:00:00', '04:48:28'),
(43, 1, '2021-01-14 00:00:00', '09:26:46', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(30, 3, '2021-01-09 00:00:00', '13:40:56', '08:20:00', '17:44:00', '2021-01-09 00:00:00', '13:44:47'),
(29, 3, '2021-01-08 00:00:00', '16:12:58', '08:20:00', '17:44:00', '2021-01-09 00:00:00', '13:44:47'),
(28, 1, '2021-01-08 00:00:00', '09:25:25', '08:00:00', '17:29:00', '2021-01-20 00:00:00', '17:29:43'),
(26, 3, '2021-01-07 00:00:00', '16:02:10', '08:20:00', '17:44:00', '2021-01-09 00:00:00', '13:44:47'),
(27, 2, '2021-01-08 00:00:00', '05:39:51', '05:44:00', '09:55:00', '2021-01-08 00:00:00', '06:06:11');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(250) NOT NULL,
  `date_add` datetime DEFAULT current_timestamp(),
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `designation`, `date_add`, `date_update`) VALUES
(1, 'administrateur', '2021-01-04 11:56:54', NULL),
(2, 'user', '2021-01-06 05:50:30', NULL),
(3, 'Super Administrateur', '2021-01-09 14:59:51', NULL),
(4, 'non', '2021-01-09 15:00:24', NULL),
(5, 'dfgh', '2021-01-09 15:01:21', NULL),
(6, 'yesss', '2021-01-09 15:02:33', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
