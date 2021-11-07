-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 03 nov. 2021 à 14:46
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_bordel_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `detail_personnage_autre`
--

DROP TABLE IF EXISTS `detail_personnage_autre`;
CREATE TABLE IF NOT EXISTS `detail_personnage_autre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `chance_obtenir_liste_sort_pourcentage` int(11) NOT NULL DEFAULT '0',
  `nb_degres_langages_additionnel` int(11) NOT NULL DEFAULT '0',
  `nb_points_histor` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detail_personnage_caracteristique`
--

DROP TABLE IF EXISTS `detail_personnage_caracteristique`;
CREATE TABLE IF NOT EXISTS `detail_personnage_caracteristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` int(11) NOT NULL DEFAULT '0',
  `norm` int(11) NOT NULL DEFAULT '0',
  `race` int(11) NOT NULL DEFAULT '0',
  `cc_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detail_personnage_competence`
--

DROP TABLE IF EXISTS `detail_personnage_competence`;
CREATE TABLE IF NOT EXISTS `detail_personnage_competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `degre` int(11) NOT NULL DEFAULT '0',
  `caract` int(11) NOT NULL DEFAULT '0',
  `innee` int(11) NOT NULL DEFAULT '0',
  `special_1` int(11) NOT NULL DEFAULT '0',
  `special_2` int(11) NOT NULL DEFAULT '0',
  `cc_total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detail_personnage_jr_bd_bo`
--

DROP TABLE IF EXISTS `detail_personnage_jr_bd_bo`;
CREATE TABLE IF NOT EXISTS `detail_personnage_jr_bd_bo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `carac` int(11) NOT NULL DEFAULT '0',
  `special_1` int(11) NOT NULL DEFAULT '0',
  `special_2` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_personnage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `password`, `id_personnage`) VALUES
(7, 'test', 'c450b912aaf654d09fe90380384e1194', 0),
(6, 'admin', 'f7a55df4ca556d00dc8f7b9241340325', 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnage_caracteristique`
--

DROP TABLE IF EXISTS `personnage_caracteristique`;
CREATE TABLE IF NOT EXISTS `personnage_caracteristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_competence`
--

DROP TABLE IF EXISTS `personnage_competence`;
CREATE TABLE IF NOT EXISTS `personnage_competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` int(11) NOT NULL,
  `cc_degre` int(11) DEFAULT NULL,
  `experience` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_complementaire`
--

DROP TABLE IF EXISTS `personnage_complementaire`;
CREATE TABLE IF NOT EXISTS `personnage_complementaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `point_de_vie_max` int(11) NOT NULL,
  `cc_point_de_vie` int(11) NOT NULL DEFAULT '0',
  `point_de_pouvoir_max` int(11) NOT NULL DEFAULT '0',
  `cc_point_de_pouvoir` int(11) NOT NULL DEFAULT '0',
  `base_defensif` int(11) NOT NULL DEFAULT '0',
  `base_offensif` int(11) NOT NULL DEFAULT '0',
  `type_armure` int(11) NOT NULL DEFAULT '0',
  `type_arme` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_identite`
--

DROP TABLE IF EXISTS `personnage_identite`;
CREATE TABLE IF NOT EXISTS `personnage_identite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `race` varchar(255) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `cheveux` varchar(255) DEFAULT NULL,
  `yeux` varchar(255) DEFAULT NULL,
  `signe_particulier` text,
  `argent` int(11) DEFAULT NULL,
  `point_de_pouvoir` int(11) DEFAULT NULL,
  `point_de_vie` int(11) DEFAULT NULL,
  `jr_essence` int(11) DEFAULT NULL,
  `jr_theurgie` int(11) DEFAULT NULL,
  `jr_poison` int(11) DEFAULT NULL,
  `jr_maladie` int(11) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bool_mort` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_langue`
--

DROP TABLE IF EXISTS `personnage_langue`;
CREATE TABLE IF NOT EXISTS `personnage_langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
