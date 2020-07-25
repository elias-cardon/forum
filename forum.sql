-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 25 juil. 2020 à 14:12
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
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `commentaires` varchar(255) NOT NULL,
  `membre` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_topics` int(11) NOT NULL,
  `date_heure` datetime NOT NULL,
  `titre` varchar(255) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `id_topics`, `date_heure`, `titre`, `id_utilisateurs`) VALUES
(38, 2, '2020-07-08 15:12:32', 'Bug remorque', 1),
(39, 2, '2020-07-08 15:31:04', 'Bug cabine', 1),
(40, 42, '2020-07-09 12:20:55', 'Bug personnage', 8),
(41, 42, '2020-07-09 12:38:47', 'Bug grimpe', 1),
(42, 35, '2020-07-16 14:30:50', 'Bug Kart', 1);

-- --------------------------------------------------------

--
-- Structure de la table `dislikes`
--

DROP TABLE IF EXISTS `dislikes`;
CREATE TABLE IF NOT EXISTS `dislikes` (
  `id` int(11) NOT NULL,
  `id_messages` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_messages` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_messages`, `id_utilisateurs`) VALUES
(12, 13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `date_heure` datetime NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_categorie`, `id_utilisateurs`, `date_heure`, `contenu`) VALUES
(13, 40, 1, '2020-07-15 14:34:15', 'Est-ce que ça marche ?'),
(14, 40, 1, '2020-07-16 14:24:08', 'Ça ne s\'affiche pas'),
(15, 42, 1, '2020-07-16 14:31:02', 'Ça roule doucement'),
(16, 42, 1, '2020-07-16 15:33:53', 'Ça roule pas !!!!');

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `date_heure` datetime NOT NULL,
  `login` varchar(255) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `visibilite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `titre`, `date_heure`, `login`, `id_utilisateurs`, `visibilite`) VALUES
(1, 'Halo', '2020-06-24 16:20:10', 'Jobba', 1, 0),
(2, 'EuroTruck Simulator 2', '2020-07-08 13:26:33', 'Jobba', 1, 0),
(34, 'Star Wars Battlefront II (2005)', '2020-07-09 10:51:51', 'admin', 8, 1),
(35, 'Mario Kart 8', '2020-07-09 10:52:07', 'admin', 8, 0),
(37, 'Pokemon Perle', '2020-07-09 10:55:43', 'admin', 8, 0),
(42, 'Assassin\'s Creed II', '2020-07-09 11:02:27', 'admin', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Jobba', '$2y$15$E7ti6ejCYqqC8OgZWWLude4lCTriuGzQXKvOnORp5vx6mQHlihf6G'),
(8, 'admin', '$2y$15$aK/z5KxrNr1ki9LMFHgFau4zit0YLmUFDIWa.TbrKQu9AK76jNwty');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
