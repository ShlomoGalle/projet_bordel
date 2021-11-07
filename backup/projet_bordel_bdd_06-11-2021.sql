-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 06 nov. 2021 à 17:38
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
  `caracteristique_force_val` int(11) NOT NULL DEFAULT '0',
  `caracteristique_force_norm` int(11) NOT NULL DEFAULT '0',
  `caracteristique_force_race` int(11) NOT NULL DEFAULT '0',
  `caracteristique_agilite_val` int(11) NOT NULL DEFAULT '0',
  `caracteristique_agilite_norm` int(11) NOT NULL DEFAULT '0',
  `caracteristique_agilite_race` int(11) NOT NULL DEFAULT '0',
  `caracteristique_constitution_val` int(11) NOT NULL DEFAULT '0',
  `caracteristique_constitution_norm` int(11) NOT NULL DEFAULT '0',
  `caracteristique_constitution_race` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intelligence_val` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intelligence_norm` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intelligence_race` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intuition_val` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intuition_norm` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intuition_race` int(11) NOT NULL DEFAULT '0',
  `caracteristique_presence_val` int(11) NOT NULL DEFAULT '0',
  `caracteristique_presence_norm` int(11) NOT NULL DEFAULT '0',
  `caracteristique_presence_race` int(11) NOT NULL DEFAULT '0',
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
  `comp_manoeuvreetmouvement_sansarmure_degre` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_sansarmure_carac` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_sansarmure_innee` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_sansarmure_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_sansarmure_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirsouple_degre` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirsouple_carac` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirsouple_innee` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirsouple_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirsouple_special_2` int(11) NOT NULL DEFAULT '-15',
  `comp_manoeuvreetmouvement_cuirrigide_degre` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirrigide_carac` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirrigide_innee` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirrigide_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirrigide_special_2` int(11) NOT NULL DEFAULT '-30',
  `comp_manoeuvreetmouvement_cottedemaille_degre` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cottedemaille_carac` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cottedemaille_innee` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cottedemaille_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cottedemaille_special_2` int(11) NOT NULL DEFAULT '-45',
  `comp_manoeuvreetmouvement_plate_degre` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_plate_carac` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_plate_innee` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_plate_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_plate_special_2` int(11) NOT NULL DEFAULT '-60',
  `comp_arme_tranchantunemain_degre` int(11) NOT NULL DEFAULT '0',
  `comp_arme_tranchantunemain_carac` int(11) NOT NULL DEFAULT '0',
  `comp_arme_tranchantunemain_innee` int(11) NOT NULL DEFAULT '0',
  `comp_arme_tranchantunemain_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_arme_tranchantunemain_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_arme_contondantunemain_degre` int(11) NOT NULL DEFAULT '0',
  `comp_arme_contondantunemain_carac` int(11) NOT NULL DEFAULT '0',
  `comp_arme_contondantunemain_innee` int(11) NOT NULL DEFAULT '0',
  `comp_arme_contondantunemain_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_arme_contondantunemain_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_arme_deuxmains_degre` int(11) NOT NULL DEFAULT '0',
  `comp_arme_deuxmains_carac` int(11) NOT NULL DEFAULT '0',
  `comp_arme_deuxmains_innee` int(11) NOT NULL DEFAULT '0',
  `comp_arme_deuxmains_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_arme_deuxmains_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedelance_degre` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedelance_carac` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedelance_innee` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedelance_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedelance_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_arme_projectile_degre` int(11) NOT NULL DEFAULT '0',
  `comp_arme_projectile_carac` int(11) NOT NULL DEFAULT '0',
  `comp_arme_projectile_innee` int(11) NOT NULL DEFAULT '0',
  `comp_arme_projectile_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_arme_projectile_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedhast_degre` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedhast_carac` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedhast_innee` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedhast_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedhast_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_generale_escalade_degre` int(11) NOT NULL DEFAULT '0',
  `comp_generale_escalade_carac` int(11) NOT NULL DEFAULT '0',
  `comp_generale_escalade_innee` int(11) NOT NULL DEFAULT '0',
  `comp_generale_escalade_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_generale_escalade_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_generale_equitation_degre` int(11) NOT NULL DEFAULT '0',
  `comp_generale_equitation_carac` int(11) NOT NULL DEFAULT '0',
  `comp_generale_equitation_innee` int(11) NOT NULL DEFAULT '0',
  `comp_generale_equitation_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_generale_equitation_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_generale_natation_degre` int(11) NOT NULL DEFAULT '0',
  `comp_generale_natation_carac` int(11) NOT NULL DEFAULT '0',
  `comp_generale_natation_innee` int(11) NOT NULL DEFAULT '0',
  `comp_generale_natation_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_generale_natation_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_generale_pistage_degre` int(11) NOT NULL DEFAULT '0',
  `comp_generale_pistage_carac` int(11) NOT NULL DEFAULT '0',
  `comp_generale_pistage_innee` int(11) NOT NULL DEFAULT '0',
  `comp_generale_pistage_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_generale_pistage_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_embuscade_degre` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_embuscade_carac` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_embuscade_innee` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_embuscade_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_embuscade_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_filatdissim_degre` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_filatdissim_carac` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_filatdissim_innee` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_filatdissim_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_filatdissim_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_crochetage_degre` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_crochetage_carac` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_crochetage_innee` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_crochetage_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_crochetage_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_desarmementdepiege_degre` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_desarmementdepiege_carac` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_desarmementdepiege_innee` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_desarmementdepiege_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_desarmementdepiege_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_magie_lecturederune_degre` int(11) NOT NULL DEFAULT '0',
  `comp_magie_lecturederune_carac` int(11) NOT NULL DEFAULT '0',
  `comp_magie_lecturederune_innee` int(11) NOT NULL DEFAULT '0',
  `comp_magie_lecturederune_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_magie_lecturederune_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_magie_utilisationdobjet_degre` int(11) NOT NULL DEFAULT '0',
  `comp_magie_utilisationdobjet_carac` int(11) NOT NULL DEFAULT '0',
  `comp_magie_utilisationdobjet_innee` int(11) NOT NULL DEFAULT '0',
  `comp_magie_utilisationdobjet_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_magie_utilisationdobjet_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_magie_directiondesort_degre` int(11) NOT NULL DEFAULT '0',
  `comp_magie_directiondesort_carac` int(11) NOT NULL DEFAULT '0',
  `comp_magie_directiondesort_innee` int(11) NOT NULL DEFAULT '0',
  `comp_magie_directiondesort_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_magie_directiondesort_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_physique_developcorporel_degre` int(11) NOT NULL DEFAULT '0',
  `comp_physique_developcorporel_carac` int(11) NOT NULL DEFAULT '0',
  `comp_physique_developcorporel_innee` int(11) NOT NULL DEFAULT '0',
  `comp_physique_developcorporel_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_physique_developcorporel_special_2` int(11) NOT NULL DEFAULT '0',
  `comp_physique_perception_degre` int(11) NOT NULL DEFAULT '0',
  `comp_physique_perception_carac` int(11) NOT NULL DEFAULT '0',
  `comp_physique_perception_innee` int(11) NOT NULL DEFAULT '0',
  `comp_physique_perception_special_1` int(11) NOT NULL DEFAULT '0',
  `comp_physique_perception_special_2` int(11) NOT NULL DEFAULT '0',
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
  `jr_essence_carac` int(11) NOT NULL DEFAULT '0',
  `jr_essence_special_1` int(11) NOT NULL DEFAULT '0',
  `jr_essence_raciale` int(11) NOT NULL DEFAULT '0',
  `jr_theurgie_carac` int(11) NOT NULL DEFAULT '0',
  `jr_theurgie_special_1` int(11) NOT NULL DEFAULT '0',
  `jr_theurgie_raciale` int(11) NOT NULL DEFAULT '0',
  `jr_poison_carac` int(11) NOT NULL DEFAULT '0',
  `jr_poison_special_1` int(11) NOT NULL DEFAULT '0',
  `jr_poison_raciale` int(11) NOT NULL DEFAULT '0',
  `jr_maladie_carac` int(11) NOT NULL DEFAULT '0',
  `jr_maladie_special_1` int(11) NOT NULL DEFAULT '0',
  `jr_maladie_raciale` int(11) NOT NULL DEFAULT '0',
  `base_defensif_detail_carac` int(11) NOT NULL DEFAULT '0',
  `base_defensif_detail_special_1` int(11) NOT NULL DEFAULT '0',
  `base_defensif_detail_special_2` int(11) NOT NULL DEFAULT '0',
  `base_offensif_detail_special_1` int(11) NOT NULL DEFAULT '0',
  `base_offensif_detail_special_2` int(11) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `password`, `id_personnage`) VALUES
(11, 'floflo', '96061610f219b908d5385c02813b648d', 0),
(10, 'admin', '1a33e30edfcd79fce1fd8e5d29e249a2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnage_capacite`
--

DROP TABLE IF EXISTS `personnage_capacite`;
CREATE TABLE IF NOT EXISTS `personnage_capacite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `capacite_infravision` int(11) NOT NULL DEFAULT '0',
  `capacite_vision_nocturne` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_caracteristique`
--

DROP TABLE IF EXISTS `personnage_caracteristique`;
CREATE TABLE IF NOT EXISTS `personnage_caracteristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `caracteristique_force_total` int(11) NOT NULL DEFAULT '0',
  `caracteristique_agilite_total` int(11) NOT NULL DEFAULT '0',
  `caracteristique_constitution_total` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intelligence_total` int(11) NOT NULL DEFAULT '0',
  `caracteristique_intuition_total` int(11) NOT NULL DEFAULT '0',
  `caracteristique_presence_total` int(11) NOT NULL DEFAULT '0',
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
  `comp_manoeuvreetmouvement_sansarmure_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_sansarmure_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_sansarmure_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_manoeuvreetmouvement_cuirsouple_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirsouple_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirsouple_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_manoeuvreetmouvement_cuirrigide_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirrigide_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cuirrigide_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_manoeuvreetmouvement_cottedemaille_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cottedemaille_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_cottedemaille_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_manoeuvreetmouvement_plate_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_plate_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_manoeuvreetmouvement_plate_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_arme_tranchantunemain_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_arme_tranchantunemain_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_arme_tranchantunemain_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_arme_contondantunemain_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_arme_contondantunemain_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_arme_contondantunemain_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_arme_deuxmains_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_arme_deuxmains_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_arme_deuxmains_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_arme_armedelance_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedelance_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedelance_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_arme_projectile_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_arme_projectile_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_arme_projectile_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_arme_armedhast_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedhast_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_arme_armedhast_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_generale_escalade_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_generale_escalade_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_generale_escalade_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_generale_equitation_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_generale_equitation_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_generale_equitation_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_generale_natation_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_generale_natation_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_generale_natation_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_generale_pistage_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_generale_pistage_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_generale_pistage_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_subterfuge_embuscade_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_embuscade_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_embuscade_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_subterfuge_filatdissim_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_filatdissim_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_filatdissim_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_subterfuge_crochetage_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_crochetage_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_crochetage_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_subterfuge_desarmementdepiege_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_desarmementdepiege_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_subterfuge_desarmementdepiege_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_magie_lecturederune_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_magie_lecturederune_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_magie_lecturederune_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_magie_utilisationdobjet_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_magie_utilisationdobjet_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_magie_utilisationdobjet_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_magie_directiondesort_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_magie_directiondesort_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_magie_directiondesort_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_physique_developcorporel_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_physique_developcorporel_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_physique_developcorporel_total_niveau` int(11) NOT NULL DEFAULT '1',
  `comp_physique_perception_total_val` int(11) NOT NULL DEFAULT '0',
  `comp_physique_perception_total_experience` int(11) NOT NULL DEFAULT '0',
  `comp_physique_perception_total_niveau` int(11) NOT NULL DEFAULT '1',
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
  `type_armure` varchar(255) DEFAULT NULL,
  `type_arme` varchar(255) DEFAULT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_langue`
--

DROP TABLE IF EXISTS `personnage_langue`;
CREATE TABLE IF NOT EXISTS `personnage_langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `Adunaic` tinyint(4) NOT NULL DEFAULT '0',
  `Apysaic` tinyint(4) NOT NULL DEFAULT '0',
  `Atliduk` tinyint(4) NOT NULL DEFAULT '0',
  `Haradaic` tinyint(4) NOT NULL DEFAULT '0',
  `Khuzdul` tinyint(4) NOT NULL DEFAULT '0',
  `Kuduk` tinyint(4) NOT NULL DEFAULT '0',
  `Labba` tinyint(4) NOT NULL DEFAULT '0',
  `Logathig` tinyint(4) NOT NULL DEFAULT '0',
  `Nahaiduk` tinyint(4) NOT NULL DEFAULT '0',
  `Noirparler` tinyint(4) NOT NULL DEFAULT '0',
  `Orque` tinyint(4) NOT NULL DEFAULT '0',
  `Pukael` tinyint(4) NOT NULL DEFAULT '0',
  `Quenya` tinyint(4) NOT NULL DEFAULT '0',
  `Rohirric` tinyint(4) NOT NULL DEFAULT '0',
  `Sindarin` tinyint(4) NOT NULL DEFAULT '0',
  `Sylvain` tinyint(4) NOT NULL DEFAULT '0',
  `Umitic` tinyint(4) NOT NULL DEFAULT '0',
  `Varadja` tinyint(4) NOT NULL DEFAULT '0',
  `Waildyth` tinyint(4) NOT NULL DEFAULT '0',
  `Westron` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_liste_sort`
--

DROP TABLE IF EXISTS `personnage_liste_sort`;
CREATE TABLE IF NOT EXISTS `personnage_liste_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  `liste` varchar(255) NOT NULL,
  `acquis` tinyint(4) NOT NULL DEFAULT '0',
  `apprentissage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
