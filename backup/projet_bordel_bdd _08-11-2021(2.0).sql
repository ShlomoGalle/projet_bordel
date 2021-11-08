-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 nov. 2021 à 21:20
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
-- Structure de la table `arme`
--

DROP TABLE IF EXISTS `arme`;
CREATE TABLE IF NOT EXISTS `arme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `utilise_avec_bouclier` int(11) NOT NULL DEFAULT '0',
  `maladresse` int(11) NOT NULL DEFAULT '0',
  `coup_crit_primaire` varchar(255) DEFAULT NULL,
  `coup_crit_secondaire` varchar(255) DEFAULT NULL,
  `portee` float NOT NULL DEFAULT '1.5',
  `modificateur_comp` varchar(255) DEFAULT NULL,
  `modificateur_val` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL DEFAULT '0',
  `poids` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `arme`
--

INSERT INTO `arme` (`id`, `name`, `type`, `utilise_avec_bouclier`, `maladresse`, `coup_crit_primaire`, `coup_crit_secondaire`, `portee`, `modificateur_comp`, `modificateur_val`, `prix`, `poids`) VALUES
(1, 'Épée Large', 'Tranchante', 1, 3, 'TA', NULL, 1.5, NULL, NULL, 1000, 2),
(2, 'Dague', 'Tranchante', 1, 1, 'PE', NULL, 4.5, 'comp_manoeuvreetmouvement_cottedemaille_total, comp_manoeuvreetmouvement_plate_total', -15, 300, 0.5),
(3, 'Gourdin', 'Contondante', 1, 4, 'CO', NULL, 0.6, 'BO', -10, 1, 2.5),
(4, 'Fleau', 'Deux mains', 0, 8, 'CO', 'PE', 1.5, 'BO', 10, 1900, 3),
(5, 'Arc Long', 'Projectile', 1, 5, 'PE', NULL, 30, NULL, NULL, 1000, 1.5);

-- --------------------------------------------------------

--
-- Structure de la table `armure`
--

DROP TABLE IF EXISTS `armure`;
CREATE TABLE IF NOT EXISTS `armure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `materiaux` varchar(255) DEFAULT NULL,
  `modificateur_comp` varchar(255) DEFAULT NULL,
  `modificateur_val` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL DEFAULT '0',
  `poids` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `armure`
--

INSERT INTO `armure` (`id`, `name`, `type`, `materiaux`, `modificateur_comp`, `modificateur_val`, `prix`, `poids`) VALUES
(1, 'Bouclier', 'bouclier', 'bois', 'BD', 20, 55, 7.5),
(2, 'Jambière en cuir', 'jambiere', 'cuir', 'manoeuvre_et_mouvement', -4, 200, 0),
(3, 'Brassière en cuir', 'brassiere', 'cuir', 'BO', -4, 200, 0),
(4, 'Casque en cuir', 'casque', 'cuir', 'comp_physique_perception_total', -4, 25, 0),
(5, 'Jambière en métal', 'jambiere', 'metal', 'manoeuvre_et_mouvement', -7, 400, 0),
(6, 'Brassière en métal', 'brassiere', 'metal', 'BO', -7, 400, 0),
(7, 'Casque en métal', 'casque', 'metal', 'comp_physique_perception_total', -7, 400, 0),
(8, 'Armure de Cuir Rigide', 'armure', 'cuirrigide', NULL, NULL, 1000, 7),
(9, 'Armure de Cuir Souple', 'armure', 'cuirsouple', NULL, NULL, 300, 7),
(10, 'Armure de Plates', 'armure', 'plate', NULL, NULL, 5000, 12.5),
(11, 'Armure de Cotte de Mailles', 'armure', 'cottedemaille', NULL, NULL, 3500, 10);

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

DROP TABLE IF EXISTS `batiment`;
CREATE TABLE IF NOT EXISTS `batiment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carte` int(11) DEFAULT NULL COMMENT '(id_ville)',
  `id_proprietaire` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prix` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`id`, `id_carte`, `id_proprietaire`, `name`, `type`, `prix`) VALUES
(1, 1, NULL, 'La Chopine Pleine\r\n', 'taverne', 3000000),
(2, 1, NULL, 'L\'Arsenal du Chasseur', 'magasin', 6000000),
(3, 1, NULL, 'Le Forgeron Ardent', 'magasin', 5000000),
(4, 1, NULL, 'Le Poney Frétillant', 'taverne', 3000000),
(5, 1, NULL, 'A la truie qui file', 'taverne', 3000000),
(6, 1, NULL, 'L\'Auberge des Gobelins', 'taverne', 3000000),
(7, 1, NULL, 'Le Tambour Cassé', 'taverne', 3000000),
(8, 1, NULL, 'Le Dragon Dragueur', 'taverne', 3000000),
(9, 2, NULL, 'test', 'taverne', 3000000);

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_evenement` text,
  `img` varchar(255) DEFAULT NULL,
  `code_area` text NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `environnement` varchar(255) DEFAULT NULL,
  `coordonnee_x` int(11) DEFAULT NULL,
  `coordonee_y` int(11) DEFAULT NULL,
  `accessibilite` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id`, `id_evenement`, `img`, `code_area`, `type`, `environnement`, `coordonnee_x`, `coordonee_y`, `accessibilite`) VALUES
(1, NULL, '1_minastirith.png', '<map name=\"image-map\"><area target=\"\" alt=\"La Chopine Pleine\" title=\"La Chopine Pleine\" href=\"\" coords=\"321,423,298,418,305,385,329,390\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 1)\"><area target=\"\" alt=\"L\'Arsenal du Chasseur\" title=\"L\'Arsenal du Chasseur\" href=\"\" coords=\"399,405,430,374,410,356,381,388\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 2)\"><area target=\"\" alt=\"Le Forgeron Ardent\" title=\"Le Forgeron Ardent\" href=\"\" coords=\"471,369,491,350,519,382,500,398\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 3)\"><area target=\"\" alt=\"Le Poney Frétillant\" title=\"Le Poney Frétillant\" href=\"\" coords=\"360,378,399,342,383,326,365,340,343,361\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 4)\"><area target=\"\" alt=\"A la truie qui file\" title=\"A la truie qui file\" href=\"\" coords=\"649,529,658,495,627,488,618,518\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 5)\"><area target=\"\" alt=\"L\'Auberge des Gobelins\" title=\"L\'Auberge des Gobelins\" href=\"\" coords=\"323,587,299,569,319,548,343,570\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 6)\"><area target=\"\" alt=\"Le Tambour Cassé\" title=\"Le Tambour Cassé\" href=\"\" coords=\"469,187,470,130,503,132,506,186\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 7)\"><area target=\"\" alt=\"Le Dragon Dragueur\" title=\"Le Dragon Dragueur\" href=\"\" coords=\"196,645,183,622,162,635,175,659\" shape=\"poly\" onclick=\"click_on_img(\'batiment\', 8)\"><area target=\"\" alt=\"Plaine de Minas Tirith\" title=\"Plaine de Minas Tirith\" href=\"\" coords=\"3,440,88,475,119,594,188,699,297,774,412,830,407,810,416,791,477,790,491,803,489,826,601,764,707,682,774,571,802,442,800,423,893,415,893,899,1,894\" shape=\"poly\" onclick=\"click_on_img(\'exterieur\', 2)\"></map>', 'ville', NULL, 1, 1, 1),
(2, '1,2,3,4,15', 'plaine.jpg', '<map name=\"image-map\">          <area target=\"\" alt=\"ville\" title=\"ville\" href=\"\" coords=\"0,2,0,798,1196,798,1198,2\" shape=\"poly\" onclick=\"click_on_img(\'exterieur\', 1)\">      </map>', 'exterieur', 'plaine', 1, 2, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_personnage_autre`
--

INSERT INTO `detail_personnage_autre` (`id`, `id_personnage`, `chance_obtenir_liste_sort_pourcentage`, `nb_degres_langages_additionnel`, `nb_points_histor`) VALUES
(1, 1, 40, 10, 4),
(2, 2, 40, 10, 4),
(3, 3, 3, 4, 4),
(4, 4, 3, 4, 4),
(5, 5, 3, 4, 4),
(6, 6, 40, 10, 4),
(7, 7, 40, 10, 4),
(8, 8, 40, 10, 4),
(9, 9, 200, 10, 4),
(10, 10, 3, 4, 4),
(11, 11, 200, 10, 4),
(12, 12, 40, 10, 4);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_personnage_caracteristique`
--

INSERT INTO `detail_personnage_caracteristique` (`id`, `id_personnage`, `caracteristique_force_val`, `caracteristique_force_norm`, `caracteristique_force_race`, `caracteristique_agilite_val`, `caracteristique_agilite_norm`, `caracteristique_agilite_race`, `caracteristique_constitution_val`, `caracteristique_constitution_norm`, `caracteristique_constitution_race`, `caracteristique_intelligence_val`, `caracteristique_intelligence_norm`, `caracteristique_intelligence_race`, `caracteristique_intuition_val`, `caracteristique_intuition_norm`, `caracteristique_intuition_race`, `caracteristique_presence_val`, `caracteristique_presence_norm`, `caracteristique_presence_race`) VALUES
(1, 1, 79, 5, 0, 86, 5, 15, 44, 0, 10, 74, 0, 5, 51, 0, 5, 77, 5, 15),
(2, 2, 67, 0, 0, 31, 0, 15, 84, 5, 10, 20, -5, 5, 91, 10, 5, 80, 5, 15),
(3, 3, 50, 0, 5, 86, 5, -5, 33, 0, 15, 49, 0, 0, 21, -5, -5, 43, 0, -5),
(4, 4, 23, -5, 5, 56, 0, -5, 56, 0, 15, 100, 25, 0, 64, 0, -5, 51, 0, -5),
(5, 5, 23, -5, 5, 56, 0, -5, 56, 0, 15, 100, 25, 0, 64, 0, -5, 51, 0, -5),
(6, 6, 79, 5, 0, 54, 0, 15, 83, 5, 10, 79, 5, 5, 39, 0, 5, 86, 5, 15),
(7, 7, 23, -5, 0, 53, 0, 15, 27, 0, 10, 80, 5, 5, 79, 5, 5, 85, 5, 15),
(8, 8, 95, 15, 0, 75, 5, 15, 63, 0, 10, 49, 0, 5, 34, 0, 5, 40, 0, 15),
(9, 9, 56, 0, 0, 35, 0, 15, 77, 5, 10, 96, 15, 5, 58, 0, 5, 89, 5, 15),
(10, 10, 95, 15, 5, 41, 0, -5, 84, 5, 15, 26, 0, 0, 65, 0, -5, 109, 35, -5),
(11, 11, 84, 5, 0, 32, 0, 15, 42, 0, 10, 23, -5, 5, 63, 0, 5, 21, -5, 15),
(12, 12, 32, 0, 0, 35, 0, 15, 81, 5, 10, 75, 5, 5, 78, 5, 5, 104, 35, 15);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_personnage_competence`
--

INSERT INTO `detail_personnage_competence` (`id`, `id_personnage`, `comp_manoeuvreetmouvement_sansarmure_degre`, `comp_manoeuvreetmouvement_sansarmure_carac`, `comp_manoeuvreetmouvement_sansarmure_innee`, `comp_manoeuvreetmouvement_sansarmure_special_1`, `comp_manoeuvreetmouvement_sansarmure_special_2`, `comp_manoeuvreetmouvement_cuirsouple_degre`, `comp_manoeuvreetmouvement_cuirsouple_carac`, `comp_manoeuvreetmouvement_cuirsouple_innee`, `comp_manoeuvreetmouvement_cuirsouple_special_1`, `comp_manoeuvreetmouvement_cuirsouple_special_2`, `comp_manoeuvreetmouvement_cuirrigide_degre`, `comp_manoeuvreetmouvement_cuirrigide_carac`, `comp_manoeuvreetmouvement_cuirrigide_innee`, `comp_manoeuvreetmouvement_cuirrigide_special_1`, `comp_manoeuvreetmouvement_cuirrigide_special_2`, `comp_manoeuvreetmouvement_cottedemaille_degre`, `comp_manoeuvreetmouvement_cottedemaille_carac`, `comp_manoeuvreetmouvement_cottedemaille_innee`, `comp_manoeuvreetmouvement_cottedemaille_special_1`, `comp_manoeuvreetmouvement_cottedemaille_special_2`, `comp_manoeuvreetmouvement_plate_degre`, `comp_manoeuvreetmouvement_plate_carac`, `comp_manoeuvreetmouvement_plate_innee`, `comp_manoeuvreetmouvement_plate_special_1`, `comp_manoeuvreetmouvement_plate_special_2`, `comp_arme_tranchantunemain_degre`, `comp_arme_tranchantunemain_carac`, `comp_arme_tranchantunemain_innee`, `comp_arme_tranchantunemain_special_1`, `comp_arme_tranchantunemain_special_2`, `comp_arme_contondantunemain_degre`, `comp_arme_contondantunemain_carac`, `comp_arme_contondantunemain_innee`, `comp_arme_contondantunemain_special_1`, `comp_arme_contondantunemain_special_2`, `comp_arme_deuxmains_degre`, `comp_arme_deuxmains_carac`, `comp_arme_deuxmains_innee`, `comp_arme_deuxmains_special_1`, `comp_arme_deuxmains_special_2`, `comp_arme_armedelance_degre`, `comp_arme_armedelance_carac`, `comp_arme_armedelance_innee`, `comp_arme_armedelance_special_1`, `comp_arme_armedelance_special_2`, `comp_arme_projectile_degre`, `comp_arme_projectile_carac`, `comp_arme_projectile_innee`, `comp_arme_projectile_special_1`, `comp_arme_projectile_special_2`, `comp_arme_armedhast_degre`, `comp_arme_armedhast_carac`, `comp_arme_armedhast_innee`, `comp_arme_armedhast_special_1`, `comp_arme_armedhast_special_2`, `comp_generale_escalade_degre`, `comp_generale_escalade_carac`, `comp_generale_escalade_innee`, `comp_generale_escalade_special_1`, `comp_generale_escalade_special_2`, `comp_generale_equitation_degre`, `comp_generale_equitation_carac`, `comp_generale_equitation_innee`, `comp_generale_equitation_special_1`, `comp_generale_equitation_special_2`, `comp_generale_natation_degre`, `comp_generale_natation_carac`, `comp_generale_natation_innee`, `comp_generale_natation_special_1`, `comp_generale_natation_special_2`, `comp_generale_pistage_degre`, `comp_generale_pistage_carac`, `comp_generale_pistage_innee`, `comp_generale_pistage_special_1`, `comp_generale_pistage_special_2`, `comp_subterfuge_embuscade_degre`, `comp_subterfuge_embuscade_carac`, `comp_subterfuge_embuscade_innee`, `comp_subterfuge_embuscade_special_1`, `comp_subterfuge_embuscade_special_2`, `comp_subterfuge_filatdissim_degre`, `comp_subterfuge_filatdissim_carac`, `comp_subterfuge_filatdissim_innee`, `comp_subterfuge_filatdissim_special_1`, `comp_subterfuge_filatdissim_special_2`, `comp_subterfuge_crochetage_degre`, `comp_subterfuge_crochetage_carac`, `comp_subterfuge_crochetage_innee`, `comp_subterfuge_crochetage_special_1`, `comp_subterfuge_crochetage_special_2`, `comp_subterfuge_desarmementdepiege_degre`, `comp_subterfuge_desarmementdepiege_carac`, `comp_subterfuge_desarmementdepiege_innee`, `comp_subterfuge_desarmementdepiege_special_1`, `comp_subterfuge_desarmementdepiege_special_2`, `comp_magie_lecturederune_degre`, `comp_magie_lecturederune_carac`, `comp_magie_lecturederune_innee`, `comp_magie_lecturederune_special_1`, `comp_magie_lecturederune_special_2`, `comp_magie_utilisationdobjet_degre`, `comp_magie_utilisationdobjet_carac`, `comp_magie_utilisationdobjet_innee`, `comp_magie_utilisationdobjet_special_1`, `comp_magie_utilisationdobjet_special_2`, `comp_magie_directiondesort_degre`, `comp_magie_directiondesort_carac`, `comp_magie_directiondesort_innee`, `comp_magie_directiondesort_special_1`, `comp_magie_directiondesort_special_2`, `comp_physique_developcorporel_degre`, `comp_physique_developcorporel_carac`, `comp_physique_developcorporel_innee`, `comp_physique_developcorporel_special_1`, `comp_physique_developcorporel_special_2`, `comp_physique_perception_degre`, `comp_physique_perception_carac`, `comp_physique_perception_innee`, `comp_physique_perception_special_1`, `comp_physique_perception_special_2`) VALUES
(1, 1, 0, 20, 52, 0, 0, -25, 20, 0, 0, -15, -25, 20, 0, 0, -30, -25, 5, 0, 0, -45, -25, 5, 0, 0, -60, 0, 5, 5, 0, 0, -25, 5, 0, 0, 0, -25, 5, 0, 0, 0, -25, 20, 0, 0, 0, 0, 20, 5, 0, 0, -25, 5, 0, 0, 0, -25, 20, 0, 0, 0, 0, 5, 5, 0, 0, 0, 20, 10, 0, 0, 0, 5, 5, 0, 0, -25, 0, 0, 0, 0, 0, 20, 10, 0, 0, -25, 5, 0, 0, 0, -25, 5, 0, 0, 0, 0, 5, 10, 0, 0, 0, 5, 5, 0, 0, -25, 20, 0, 0, 0, 0, 10, 5, 0, 5, 0, 5, 15, 0, 0),
(2, 2, 0, 15, 52, 0, 0, -25, 15, 0, 0, -15, -25, 15, 0, 0, -30, -25, 0, 0, 0, -45, -25, 0, 0, 0, -60, 0, 0, 5, 0, 0, -25, 0, 0, 0, 0, -25, 0, 0, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 0, -25, 0, 0, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 0, 0, 15, 10, 0, 0, 0, 0, 5, 0, 0, -25, 0, 0, 0, 0, 0, 20, 10, 0, 0, -25, 0, 0, 0, 0, -25, 15, 0, 0, 0, 0, 0, 10, 0, 0, 0, 15, 5, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 5, 0, 15, 15, 0, 0),
(3, 3, 0, 0, 52, 0, 0, -25, 0, 0, 0, -15, 0, 0, 5, 0, -30, 0, 5, 15, 0, -45, -25, 5, 0, 0, -60, -25, 5, 0, 0, 0, 0, 5, 20, 0, 0, -25, 5, 0, 0, 0, 0, 0, 5, 0, 0, -25, 0, 0, 0, 0, -25, 5, 0, 0, 0, 0, 0, 5, 0, 0, -25, -10, 0, 0, 0, -25, 0, 0, 0, 0, -25, 0, 0, 0, 0, -25, 0, 0, 0, 0, -25, -5, 0, 0, 0, 0, 0, 5, 0, 0, 0, -10, 5, 0, 0, -25, 0, 0, 0, 0, -25, -10, 0, 0, 0, -25, 0, 0, 0, 0, 0, 15, 15, 0, 5, 0, -10, 10, 0, 0),
(4, 4, 0, -5, 52, 0, 0, -25, -5, 0, 0, -15, 0, -5, 5, 0, -30, 0, 0, 15, 0, -45, -25, 0, 0, 0, -60, -25, 0, 0, 0, 0, 0, 0, 20, 0, 0, -25, 0, 0, 0, 0, 0, -5, 5, 0, 0, -25, -5, 0, 0, 0, -25, 0, 0, 0, 0, 0, -5, 5, 0, 0, -25, -5, 0, 0, 0, -25, -5, 0, 0, 0, -25, 25, 0, 0, 0, -25, 0, 0, 0, 0, -25, -5, 0, 0, 0, 0, 25, 5, 0, 0, 0, -5, 5, 0, 0, -25, 25, 0, 0, 0, -25, -5, 0, 0, 0, -25, -5, 0, 0, 0, 0, 15, 15, 0, 5, 0, -5, 10, 0, 0),
(5, 5, 0, -5, 52, 0, 0, -25, -5, 0, 0, -15, 0, -5, 5, 0, -30, 0, 0, 15, 0, -45, -25, 0, 0, 0, -60, -25, 0, 0, 0, 0, 0, 0, 20, 0, 0, -25, 0, 0, 0, 0, 0, -5, 5, 0, 0, -25, -5, 0, 0, 0, -25, 0, 0, 0, 0, 0, -5, 5, 0, 0, -25, -5, 0, 0, 0, -25, -5, 0, 0, 0, -25, 25, 0, 0, 0, -25, 0, 0, 0, 0, -25, -5, 0, 0, 0, 0, 25, 5, 0, 0, 0, -5, 5, 0, 0, -25, 25, 0, 0, 0, -25, -5, 0, 0, 0, -25, -5, 0, 0, 0, 0, 15, 15, 0, 5, 0, -5, 10, 0, 0),
(6, 6, 0, 15, 52, 0, 0, -25, 15, 0, 0, -15, -25, 15, 0, 0, -30, -25, 5, 0, 0, -45, -25, 5, 0, 0, -60, 0, 5, 5, 0, 0, -25, 5, 0, 0, 0, -25, 5, 0, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 0, -25, 5, 0, 0, 0, -25, 15, 0, 0, 0, 0, 5, 5, 0, 0, 0, 15, 10, 0, 0, 0, 10, 5, 0, 0, -25, 0, 0, 0, 0, 0, 20, 10, 0, 0, -25, 10, 0, 0, 0, -25, 5, 0, 0, 0, 0, 10, 10, 0, 0, 0, 5, 5, 0, 0, -25, 15, 0, 0, 0, 0, 15, 15, 0, 5, 0, 5, 15, 0, 0),
(7, 7, 0, 15, 52, 0, 0, -25, 15, 0, 0, -15, -25, 15, 0, 0, -30, -25, -5, 0, 0, -45, -25, -5, 0, 0, -60, 0, -5, 5, 0, 0, -25, -5, 0, 0, 0, -25, -5, 0, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 0, -25, -5, 0, 0, 0, -25, 15, 0, 0, 0, 0, 10, 5, 0, 0, 0, 15, 10, 0, 0, 0, 10, 5, 0, 0, -25, 0, 0, 0, 0, 0, 20, 10, 0, 0, -25, 10, 0, 0, 0, -25, 10, 0, 0, 0, 0, 10, 10, 0, 0, 0, 10, 5, 0, 0, -25, 15, 0, 0, 0, 0, 10, 5, 0, 5, 0, 10, 15, 0, 0),
(8, 8, 0, 20, 52, 0, 0, -25, 20, 0, 0, -15, -25, 20, 0, 0, -30, -25, 15, 0, 0, -45, -25, 15, 0, 0, -60, 0, 15, 5, 0, 0, -25, 15, 0, 0, 0, -25, 15, 0, 0, 0, -25, 20, 0, 0, 0, 0, 20, 5, 0, 0, -25, 15, 0, 0, 0, -25, 20, 0, 0, 0, 0, 5, 5, 0, 0, 0, 20, 10, 0, 0, 0, 5, 5, 0, 0, -25, 0, 0, 0, 0, 0, 15, 10, 0, 0, -25, 5, 0, 0, 0, -25, 5, 0, 0, 0, 0, 5, 10, 0, 0, 0, 5, 5, 0, 0, -25, 20, 0, 0, 0, 0, 10, 5, 0, 5, 0, 5, 15, 0, 0),
(9, 9, 0, 15, 10, 0, 0, -25, 15, 0, 0, -15, -25, 15, 5, 0, -30, -25, 0, 15, 0, -45, -25, 0, 0, 0, -60, 0, 0, 5, 0, 0, -25, 0, 20, 0, 0, -25, 0, 0, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 0, -25, 0, 0, 0, 0, -25, 15, 0, 0, 0, 0, 5, 5, 0, 0, 0, 15, 10, 0, 0, 0, 20, 5, 0, 0, -25, 0, 0, 0, 0, 0, 20, 10, 0, 0, -25, 20, 0, 0, 0, -25, 5, 0, 0, 0, 0, 20, 10, 0, 0, 0, 5, 5, 0, 0, -25, 15, 0, 0, 0, 0, 15, 20, 0, 5, 0, 5, 15, 0, 0),
(10, 10, 0, -5, 5, 0, 0, -25, -5, 0, 0, -15, 0, -5, 5, 0, -30, 0, 20, 15, 0, -45, -25, 20, 15, 0, -60, -25, 20, 0, 0, 0, 0, 20, 25, 0, 0, -25, 20, 0, 0, 0, 0, -5, 5, 0, 0, -25, -5, 0, 0, 0, -25, 20, 0, 0, 0, 0, -5, 5, 0, 0, -25, -5, 0, 0, 0, -25, -5, 0, 0, 0, -25, 0, 0, 0, 0, -25, 0, 0, 0, 0, -25, 30, 0, 0, 0, 0, 0, 5, 0, 0, 0, -5, 5, 0, 0, -25, 0, 0, 0, 0, -25, -5, 15, 0, 0, -25, -5, 10, 0, 0, 0, 20, 30, 0, 5, 0, -5, 10, 0, 0),
(11, 11, 0, 15, 20, 0, 0, -25, 15, 15, 0, -15, -25, 15, 15, 0, -30, -25, 5, 15, 0, -45, -25, 5, 15, 0, -60, 0, 5, 5, 0, 0, -25, 5, 0, 0, 0, -25, 5, 0, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 0, -25, 5, 0, 0, 0, -25, 15, 0, 0, 0, 0, 5, 20, 0, 0, 0, 15, 25, 0, 0, 0, 0, 20, 0, 0, -25, 0, 0, 0, 0, 0, 10, 10, 0, 0, -25, 0, 5, 0, 0, -25, 5, 0, 0, 0, 0, 0, 15, 0, 0, 0, 5, 5, 0, 0, -25, 15, 0, 0, 0, 0, 10, 25, 0, 5, 0, 5, 15, 0, 0),
(12, 12, 0, 15, 58, 0, 0, -25, 15, 20, 0, -15, -25, 15, 15, 0, -30, -25, 0, 15, 0, -45, -25, 0, 15, 0, -60, 0, 0, 10, 0, 0, -25, 0, 0, 0, 0, -25, 0, 0, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 0, -25, 0, 0, 0, 0, -25, 15, 0, 0, 0, 0, 10, 5, 0, 0, 0, 15, 10, 0, 0, 0, 10, 5, 0, 0, -25, 0, 0, 0, 0, 0, 50, 10, 0, 0, -25, 10, 0, 0, 0, -25, 10, 0, 0, 0, 0, 10, 10, 0, 0, 0, 10, 5, 0, 0, -25, 15, 0, 0, 0, 0, 15, 5, 0, 5, 0, 10, 15, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_personnage_jr_bd_bo`
--

INSERT INTO `detail_personnage_jr_bd_bo` (`id`, `id_personnage`, `jr_essence_carac`, `jr_essence_special_1`, `jr_essence_raciale`, `jr_theurgie_carac`, `jr_theurgie_special_1`, `jr_theurgie_raciale`, `jr_poison_carac`, `jr_poison_special_1`, `jr_poison_raciale`, `jr_maladie_carac`, `jr_maladie_special_1`, `jr_maladie_raciale`, `base_defensif_detail_carac`, `base_defensif_detail_special_1`, `base_defensif_detail_special_2`, `base_offensif_detail_special_1`, `base_offensif_detail_special_2`) VALUES
(1, 1, 5, 0, 0, 5, 0, 0, 10, 0, 10, 10, 0, 100, 20, 0, 0, 0, 0),
(2, 2, 0, 0, 0, 15, 0, 0, 15, 0, 10, 15, 0, 100, 15, 0, 0, 0, 0),
(3, 3, 0, 0, 40, -10, 0, 0, 15, 0, 10, 15, 0, 10, 0, 0, 0, 0, 0),
(4, 4, 25, 0, 40, -5, 0, 0, 15, 0, 10, 15, 0, 10, -5, 0, 0, 0, 0),
(5, 5, 25, 0, 40, -5, 0, 0, 15, 0, 10, 15, 0, 10, -5, 0, 0, 0, 0),
(6, 6, 10, 0, 0, 5, 0, 0, 15, 0, 10, 15, 0, 100, 15, 0, 0, 0, 0),
(7, 7, 10, 0, 0, 10, 0, 0, 10, 0, 10, 10, 0, 100, 15, 0, 0, 0, 0),
(8, 8, 5, 0, 0, 5, 0, 0, 10, 0, 10, 10, 0, 100, 20, 0, 0, 0, 0),
(9, 9, 20, 0, 0, 5, 0, 0, 15, 0, 10, 15, 0, 100, 15, 0, 0, 0, 0),
(10, 10, 0, 0, 40, -5, 0, 0, 20, 0, 10, 20, 0, 10, -5, 10, 0, 10, 0),
(11, 11, 0, 0, 0, 5, 0, 0, 10, 0, 10, 10, 0, 100, 15, 0, 0, 0, 0),
(12, 12, 10, 0, 0, 10, 0, 0, 15, 0, 10, 15, 0, 100, 15, 0, 0, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `password`, `id_personnage`) VALUES
(1, 'test', 'c450b912aaf654d09fe90380384e1194', 9),
(2, 'admin', '1a33e30edfcd79fce1fd8e5d29e249a2', 6),
(3, 'test2', 'c450b912aaf654d09fe90380384e1194', 10),
(4, 'testtest', 'c450b912aaf654d09fe90380384e1194', 0),
(5, 'hava', 'c24ef401a26e2edbde7bbe4caa4414aa', 11),
(6, 'tete', '99c18a4b18cc636fd5aafd5c9edd144c', 12);

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `utilisable` varchar(255) DEFAULT 'non' COMMENT '"oui" => pour toujours\r\n"non" => pas utilisable\r\nchiffre => nombre d''utilisation',
  `sort_charge` varchar(255) DEFAULT NULL,
  `modificateur_val` int(11) DEFAULT NULL,
  `poids` float NOT NULL DEFAULT '0',
  `prix` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id`, `name`, `type`, `utilisable`, `sort_charge`, `modificateur_val`, `poids`, `prix`) VALUES
(1, 'Cidre', 'soin', '1', NULL, 1, 1, 15),
(2, 'Hydromel', 'soin', '1', NULL, 1, 1, 15),
(3, 'Pain de route (1 mois)', 'soin', '60', NULL, 3, 3, 150000),
(4, 'Rations de piste (7 jours)', 'soin', '14', NULL, 2, 6, 1000),
(5, 'Rations normal (7 jours)', 'soin', '14', NULL, 1, 9, 300),
(6, 'Repas Normal', 'soin', '1', NULL, 5, 2, 300),
(7, 'Repas léger', 'soin', '1', NULL, 1, 1, 50),
(8, 'Repas copieux', 'soin', '1', NULL, 10, 3, 800),
(9, 'Corde', 'autre', 'oui', NULL, NULL, 3, 40),
(10, 'Corde Supérieur', 'autre', 'oui', NULL, NULL, 1.5, 40000),
(11, 'Torche', 'autre', '1', NULL, NULL, 1, 30),
(12, 'Outre 1/2 litre', 'autre', 'non', NULL, NULL, 0.5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `objet_loot_batiment`
--

DROP TABLE IF EXISTS `objet_loot_batiment`;
CREATE TABLE IF NOT EXISTS `objet_loot_batiment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_objet` int(11) DEFAULT NULL,
  `id_batiment` int(11) DEFAULT NULL,
  `type_objet` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `objet_loot_batiment`
--

INSERT INTO `objet_loot_batiment` (`id`, `id_objet`, `id_batiment`, `type_objet`) VALUES
(1, 1, 1, 'objet'),
(2, 9, 1, 'objet'),
(3, 2, 1, 'objet'),
(4, 5, 1, 'objet'),
(5, 7, 1, 'objet'),
(6, 1, 4, 'objet'),
(7, 2, 4, 'objet'),
(8, 5, 4, 'objet'),
(9, 7, 4, 'objet'),
(10, 9, 4, 'objet'),
(11, 11, 4, 'objet'),
(12, 1, 5, 'objet'),
(13, 2, 5, 'objet'),
(14, 3, 5, 'objet'),
(15, 4, 5, 'objet'),
(16, 5, 5, 'objet'),
(17, 6, 5, 'objet'),
(18, 7, 5, 'objet'),
(19, 8, 5, 'objet'),
(20, 9, 5, 'objet'),
(21, 10, 5, 'objet'),
(22, 11, 5, 'objet'),
(23, 12, 5, 'objet'),
(24, 1, 2, 'arme'),
(25, 2, 2, 'arme'),
(26, 5, 2, 'arme'),
(27, 1, 3, 'armure'),
(28, 2, 3, 'armure'),
(29, 3, 3, 'armure'),
(30, 4, 3, 'armure'),
(31, 8, 3, 'armure'),
(32, 9, 3, 'armure'),
(33, 11, 3, 'armure');

-- --------------------------------------------------------

--
-- Structure de la table `personnage_arme`
--

DROP TABLE IF EXISTS `personnage_arme`;
CREATE TABLE IF NOT EXISTS `personnage_arme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) DEFAULT NULL,
  `id_objet` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `utilise_avec_bouclier` int(11) NOT NULL DEFAULT '0',
  `maladresse` int(11) NOT NULL DEFAULT '0',
  `coup_crit_primaire` varchar(255) DEFAULT NULL,
  `coup_crit_secondaire` varchar(255) DEFAULT NULL,
  `portee` float NOT NULL DEFAULT '1.5',
  `modificateur_comp` varchar(255) DEFAULT NULL,
  `modificateur_val` int(11) DEFAULT NULL,
  `equipee` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'équipée ? ',
  `enchantement_val` int(11) NOT NULL DEFAULT '0',
  `sort_charge` varchar(255) DEFAULT NULL,
  `sort_utilisation_par_jour` int(11) DEFAULT NULL,
  `poids` float NOT NULL DEFAULT '0',
  `prix` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage_armure`
--

DROP TABLE IF EXISTS `personnage_armure`;
CREATE TABLE IF NOT EXISTS `personnage_armure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `materiaux` varchar(255) DEFAULT NULL,
  `modificateur_comp` varchar(255) DEFAULT NULL,
  `modificateur_val` int(11) DEFAULT NULL,
  `equipee` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'équipée ? ',
  `enchantement_val` int(11) NOT NULL DEFAULT '0',
  `prix` int(11) NOT NULL DEFAULT '0',
  `poids` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage_capacite`
--

INSERT INTO `personnage_capacite` (`id`, `id_personnage`, `capacite_infravision`, `capacite_vision_nocturne`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(3, 3, 0, 0),
(4, 4, 0, 0),
(5, 5, 0, 0),
(6, 6, 1, 1),
(7, 7, 0, 1),
(8, 8, 0, 0),
(9, 9, 0, 0),
(10, 10, 1, 1),
(11, 11, 0, 1),
(12, 12, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage_caracteristique`
--

INSERT INTO `personnage_caracteristique` (`id`, `id_personnage`, `caracteristique_force_total`, `caracteristique_agilite_total`, `caracteristique_constitution_total`, `caracteristique_intelligence_total`, `caracteristique_intuition_total`, `caracteristique_presence_total`) VALUES
(1, 1, 5, 20, 10, 5, 5, 20),
(2, 2, 0, 15, 15, 0, 15, 20),
(3, 3, 5, 0, 15, 0, -10, -5),
(4, 4, 0, -5, 15, 25, -5, -5),
(5, 5, 0, -5, 15, 25, -5, -5),
(6, 6, 5, 15, 15, 10, 5, 20),
(7, 7, -5, 15, 10, 10, 10, 20),
(8, 8, 15, 20, 10, 5, 5, 15),
(9, 9, 0, 15, 15, 20, 5, 20),
(10, 10, 20, -5, 20, 0, -5, 30),
(11, 11, 5, 15, 10, -25, 5, 10),
(12, 12, 0, 15, 15, 10, 10, 50);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage_competence`
--

INSERT INTO `personnage_competence` (`id`, `id_personnage`, `comp_manoeuvreetmouvement_sansarmure_total_val`, `comp_manoeuvreetmouvement_sansarmure_total_experience`, `comp_manoeuvreetmouvement_sansarmure_total_niveau`, `comp_manoeuvreetmouvement_cuirsouple_total_val`, `comp_manoeuvreetmouvement_cuirsouple_total_experience`, `comp_manoeuvreetmouvement_cuirsouple_total_niveau`, `comp_manoeuvreetmouvement_cuirrigide_total_val`, `comp_manoeuvreetmouvement_cuirrigide_total_experience`, `comp_manoeuvreetmouvement_cuirrigide_total_niveau`, `comp_manoeuvreetmouvement_cottedemaille_total_val`, `comp_manoeuvreetmouvement_cottedemaille_total_experience`, `comp_manoeuvreetmouvement_cottedemaille_total_niveau`, `comp_manoeuvreetmouvement_plate_total_val`, `comp_manoeuvreetmouvement_plate_total_experience`, `comp_manoeuvreetmouvement_plate_total_niveau`, `comp_arme_tranchantunemain_total_val`, `comp_arme_tranchantunemain_total_experience`, `comp_arme_tranchantunemain_total_niveau`, `comp_arme_contondantunemain_total_val`, `comp_arme_contondantunemain_total_experience`, `comp_arme_contondantunemain_total_niveau`, `comp_arme_deuxmains_total_val`, `comp_arme_deuxmains_total_experience`, `comp_arme_deuxmains_total_niveau`, `comp_arme_armedelance_total_val`, `comp_arme_armedelance_total_experience`, `comp_arme_armedelance_total_niveau`, `comp_arme_projectile_total_val`, `comp_arme_projectile_total_experience`, `comp_arme_projectile_total_niveau`, `comp_arme_armedhast_total_val`, `comp_arme_armedhast_total_experience`, `comp_arme_armedhast_total_niveau`, `comp_generale_escalade_total_val`, `comp_generale_escalade_total_experience`, `comp_generale_escalade_total_niveau`, `comp_generale_equitation_total_val`, `comp_generale_equitation_total_experience`, `comp_generale_equitation_total_niveau`, `comp_generale_natation_total_val`, `comp_generale_natation_total_experience`, `comp_generale_natation_total_niveau`, `comp_generale_pistage_total_val`, `comp_generale_pistage_total_experience`, `comp_generale_pistage_total_niveau`, `comp_subterfuge_embuscade_total_val`, `comp_subterfuge_embuscade_total_experience`, `comp_subterfuge_embuscade_total_niveau`, `comp_subterfuge_filatdissim_total_val`, `comp_subterfuge_filatdissim_total_experience`, `comp_subterfuge_filatdissim_total_niveau`, `comp_subterfuge_crochetage_total_val`, `comp_subterfuge_crochetage_total_experience`, `comp_subterfuge_crochetage_total_niveau`, `comp_subterfuge_desarmementdepiege_total_val`, `comp_subterfuge_desarmementdepiege_total_experience`, `comp_subterfuge_desarmementdepiege_total_niveau`, `comp_magie_lecturederune_total_val`, `comp_magie_lecturederune_total_experience`, `comp_magie_lecturederune_total_niveau`, `comp_magie_utilisationdobjet_total_val`, `comp_magie_utilisationdobjet_total_experience`, `comp_magie_utilisationdobjet_total_niveau`, `comp_magie_directiondesort_total_val`, `comp_magie_directiondesort_total_experience`, `comp_magie_directiondesort_total_niveau`, `comp_physique_developcorporel_total_val`, `comp_physique_developcorporel_total_experience`, `comp_physique_developcorporel_total_niveau`, `comp_physique_perception_total_val`, `comp_physique_perception_total_experience`, `comp_physique_perception_total_niveau`) VALUES
(1, 1, 72, 0, 1, -20, 0, 1, -35, 0, 1, -65, 0, 1, -80, 0, 1, 10, 0, 1, -20, 0, 1, -20, 0, 1, -5, 0, 1, 25, 0, 1, -20, 0, 1, -5, 0, 1, 10, 0, 1, 30, 0, 1, 10, 0, 1, -25, 0, 1, 30, 0, 1, -20, 0, 1, -20, 0, 1, 15, 0, 1, 10, 0, 1, -5, 0, 1, 20, 0, 1, 20, 0, 1),
(2, 2, 67, 0, 1, -25, 0, 1, -40, 0, 1, -70, 0, 1, -85, 0, 1, 5, 0, 1, -25, 0, 1, -25, 0, 1, -10, 0, 1, 20, 0, 1, -25, 0, 1, -10, 0, 1, 20, 0, 1, 25, 0, 1, 5, 0, 1, -25, 0, 1, 30, 0, 1, -25, 0, 1, -10, 0, 1, 10, 0, 1, 20, 0, 1, -10, 0, 1, 25, 0, 1, 30, 0, 1),
(3, 3, 52, 0, 1, -40, 0, 1, -25, 0, 1, -25, 0, 1, -65, 0, 1, -20, 0, 1, 25, 0, 1, -20, 0, 1, 5, 0, 1, -25, 0, 1, -20, 0, 1, 5, 0, 1, -35, 0, 1, -25, 0, 1, -25, 0, 1, -25, 0, 1, -30, 0, 1, 5, 0, 1, -5, 0, 1, -25, 0, 1, -35, 0, 1, -25, 0, 1, 35, 0, 1, 0, 0, 1),
(4, 4, 47, 0, 1, -45, 0, 1, -30, 0, 1, -30, 0, 1, -70, 0, 1, -25, 0, 1, 20, 0, 1, -25, 0, 1, 0, 0, 1, -30, 0, 1, -25, 0, 1, 0, 0, 1, -30, 0, 1, -30, 0, 1, 0, 0, 1, -25, 0, 1, -30, 0, 1, 30, 0, 1, 0, 0, 1, 0, 0, 1, -30, 0, 1, -30, 0, 1, 35, 0, 1, 5, 0, 1),
(5, 5, 47, 0, 1, -45, 0, 1, -30, 0, 1, -30, 0, 1, -70, 0, 1, -25, 0, 1, 20, 0, 1, -25, 0, 1, 0, 0, 1, -30, 0, 1, -25, 0, 1, 0, 0, 1, -30, 0, 1, -30, 0, 1, 0, 0, 1, -25, 0, 1, -30, 0, 1, 30, 0, 1, 0, 0, 1, 0, 0, 1, -30, 0, 1, -30, 0, 1, 35, 0, 1, 5, 0, 1),
(6, 6, 67, 0, 1, -25, 0, 1, -40, 0, 1, -65, 0, 1, -80, 0, 1, 10, 0, 1, -20, 0, 1, -20, 0, 1, -10, 0, 1, 20, 0, 1, -20, 0, 1, -10, 0, 1, 10, 0, 1, 25, 0, 1, 15, 0, 1, -25, 0, 1, 30, 0, 1, -15, 0, 1, -20, 0, 1, 20, 0, 1, 10, 0, 1, -10, 0, 1, 35, 0, 1, 20, 0, 1),
(7, 7, 67, 0, 1, -25, 0, 1, -40, 0, 1, -75, 0, 1, -90, 0, 1, 0, 0, 1, -30, 0, 1, -30, 0, 1, -10, 0, 1, 20, 0, 1, -30, 0, 1, -10, 0, 1, 15, 0, 1, 25, 0, 1, 15, 0, 1, -25, 0, 1, 30, 0, 1, -15, 0, 1, -15, 0, 1, 20, 0, 1, 15, 0, 1, -10, 0, 1, 20, 0, 1, 25, 0, 1),
(8, 8, 72, 0, 1, -20, 0, 1, -35, 0, 1, -55, 0, 1, -70, 0, 1, 20, 0, 1, -10, 0, 1, -10, 0, 1, -5, 0, 1, 25, 0, 1, -10, 0, 1, -5, 0, 1, 10, 0, 1, 30, 0, 1, 10, 0, 1, -25, 0, 1, 25, 0, 1, -20, 0, 1, -20, 0, 1, 15, 0, 1, 10, 0, 1, -5, 0, 1, 20, 0, 1, 20, 0, 1),
(9, 9, 25, 0, 1, -25, 0, 1, -35, 0, 1, -55, 0, 1, -70, 0, 1, 5, 0, 1, -5, 0, 1, -25, 0, 1, -10, 0, 1, 20, 0, 1, -25, 0, 1, -10, 0, 1, 10, 0, 1, 25, 0, 1, 25, 0, 1, -25, 0, 1, 30, 0, 1, -5, 0, 1, -20, 0, 1, 30, 0, 1, 10, 0, 1, -10, 0, 1, 40, 0, 1, 20, 0, 1),
(10, 10, 0, 0, 1, -45, 0, 1, -30, 0, 1, -10, 0, 1, -50, 0, 1, -5, 0, 1, 45, 0, 1, -5, 0, 1, 0, 0, 1, -30, 0, 1, -5, 0, 1, 0, 0, 1, -30, 0, 1, -30, 0, 1, -25, 0, 1, -25, 0, 1, 5, 0, 1, 5, 0, 1, 0, 0, 1, -25, 0, 1, -15, 0, 1, -20, 0, 1, 55, 0, 1, 5, 0, 1),
(11, 11, 35, 0, 1, -10, 0, 1, -25, 0, 1, -50, 0, 1, -65, 0, 1, 10, 0, 1, -20, 0, 1, -20, 0, 1, -10, 0, 1, 20, 0, 1, -20, 0, 1, -10, 0, 1, 25, 0, 1, 40, 0, 1, 20, 0, 1, -25, 0, 1, 20, 0, 1, -20, 0, 1, -20, 0, 1, 15, 0, 1, 10, 0, 1, -10, 0, 1, 40, 0, 1, 20, 0, 1),
(12, 12, 73, 0, 1, -5, 0, 1, -25, 0, 1, -55, 0, 1, -70, 0, 1, 10, 0, 1, -25, 0, 1, -25, 0, 1, -10, 0, 1, 20, 0, 1, -25, 0, 1, -10, 0, 1, 15, 0, 1, 25, 0, 1, 15, 0, 1, -25, 0, 1, 60, 0, 1, -15, 0, 1, -15, 0, 1, 20, 0, 1, 15, 0, 1, -10, 0, 1, 25, 0, 1, 25, 0, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage_complementaire`
--

INSERT INTO `personnage_complementaire` (`id`, `id_personnage`, `point_de_vie_max`, `cc_point_de_vie`, `point_de_pouvoir_max`, `cc_point_de_pouvoir`, `base_defensif`, `base_offensif`, `type_armure`, `type_arme`) VALUES
(1, 1, 5, 0, 1, 1, 20, 0, '', ''),
(2, 2, 5, 0, 2, 2, 15, 0, '', ''),
(3, 3, 5, 0, 0, 0, 0, 0, '', ''),
(4, 4, 5, 0, 4, 4, -5, 0, '', ''),
(5, 5, 5, 0, 4, 4, -5, 0, '', ''),
(6, 6, 25, 25, 2, 2, 15, 3, '1', '2'),
(7, 7, 20, 20, 2, 2, 15, 0, '', ''),
(8, 8, 20, 20, 0, 0, 20, 0, '', ''),
(9, 9, 40, 40, 3, 3, 15, 0, '', ''),
(10, 10, 55, 55, 1, 1, 5, 10, '', ''),
(11, 11, 40, 40, 1, 1, 15, 0, '', ''),
(12, 12, 25, 25, 2, 2, 15, 0, '', '');

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
  `signeparticulier` text,
  `id_carte_actuelle` int(11) DEFAULT NULL,
  `argent` int(11) DEFAULT NULL,
  `point_de_pouvoir` int(11) DEFAULT NULL,
  `point_de_vie` int(11) DEFAULT NULL,
  `jr_essence_total` int(11) DEFAULT NULL,
  `jr_theurgie_total` int(11) DEFAULT NULL,
  `jr_poison_total` int(11) DEFAULT NULL,
  `jr_maladie_total` int(11) DEFAULT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bool_mort` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage_identite`
--

INSERT INTO `personnage_identite` (`id`, `nom`, `race`, `taille`, `age`, `poids`, `cheveux`, `yeux`, `signeparticulier`, `id_carte_actuelle`, `argent`, `point_de_pouvoir`, `point_de_vie`, `jr_essence_total`, `jr_theurgie_total`, `jr_poison_total`, `jr_maladie_total`, `date_creation`, `bool_mort`) VALUES
(1, 't', 'Elfe Noldor', 50, 15, 30, 't', 't', '', 0, 1370000, 1, 0, 5, 5, 20, 110, '2021-11-07 14:12:42', 0),
(2, 't', 'Elfe Noldor', 50, 15, 30, 't', 't', '', 1, 3020000, 2, 0, 0, 15, 25, 115, '2021-11-07 14:18:12', 0),
(3, 'yes', 'Nain', 50, 15, 30, 'ye', 'ye', '', 0, 820000, 0, 0, 40, -10, 25, 25, '2021-11-07 18:07:22', 0),
(4, 'tete', 'Nain', 50, 15, 30, 'tete', 'tete', '', 0, 1670000, 4, 0, 65, -5, 25, 25, '2021-11-07 18:12:03', 0),
(5, 'tete', 'Nain', 50, 15, 30, 'tete', 'tete', '', 1, 1670000, 4, 0, 65, -5, 25, 25, '2021-11-07 18:12:04', 0),
(6, 't', 'Elfe Noldor', 50, 15, 30, 't', 't', '', 1, 1720000, 2, 25, 10, 5, 25, 115, '2021-11-07 18:21:48', 0),
(7, 't', 'Elfe Noldor', 50, 15, 30, 't', 't', '', 1, 1170000, 2, 20, 10, 10, 20, 110, '2021-11-07 18:44:46', 0),
(8, 't', 'Elfe Noldor', 50, 15, 30, 't', 't', '', 1, 20000, 0, 20, 5, 5, 20, 110, '2021-11-07 18:48:11', 0),
(9, 't', 'Elfe Noldor', 50, 15, 30, 't', 't', '', 1, 1220000, 3, 40, 20, 5, 25, 115, '2021-11-08 02:30:59', 0),
(10, 'test', 'Nain', 50, 15, 30, 'test', 'test', '', 1, 20000, 1, 55, 40, -5, 30, 30, '2021-11-08 13:15:27', 0),
(11, 'hava', 'Elfe Noldor', 157, 22, 74, 'marron', 'marron', 'triple menton', 1, 20000, 1, 40, 0, 5, 20, 110, '2021-11-08 20:40:32', 0),
(12, 'tete', 'Elfe Noldor', 50, 15, 30, 'tete', 'tete', 'tetet tete\' tete', 1, 20000, 2, 25, 10, 10, 25, 115, '2021-11-08 20:53:15', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage_langue`
--

INSERT INTO `personnage_langue` (`id`, `id_personnage`, `Adunaic`, `Apysaic`, `Atliduk`, `Haradaic`, `Khuzdul`, `Kuduk`, `Labba`, `Logathig`, `Nahaiduk`, `Noirparler`, `Orque`, `Pukael`, `Quenya`, `Rohirric`, `Sindarin`, `Sylvain`, `Umitic`, `Varadja`, `Waildyth`, `Westron`) VALUES
(1, 1, 3, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 0, 0, 0, 0, 5),
(2, 2, 3, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 0, 0, 0, 0, 5),
(3, 3, 4, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 5),
(4, 4, 4, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 5),
(5, 5, 4, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 5),
(6, 6, 3, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 0, 0, 0, 0, 5),
(7, 7, 5, 5, 3, 5, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 0, 0, 0, 0, 5),
(8, 8, 5, 5, 5, 3, 0, 0, 0, 5, 0, 5, 0, 0, 5, 0, 5, 0, 0, 0, 0, 5),
(9, 9, 3, 5, 2, 1, 5, 0, 4, 0, 0, 0, 0, 0, 5, 0, 5, 0, 0, 0, 0, 5),
(10, 10, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 4, 0, 0, 0, 5),
(11, 11, 3, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 0, 5, 0, 5, 0, 0, 0, 0, 5),
(12, 12, 3, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 5, 0, 0, 0, 0, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage_liste_sort`
--

INSERT INTO `personnage_liste_sort` (`id`, `id_personnage`, `liste`, `acquis`, `apprentissage`) VALUES
(1, 1, 'Les voies du froid', 0, 40),
(2, 2, 'Les voies du froid', 1, 0),
(3, 3, 'Les voies du froid', 0, 3),
(4, 4, 'Les voies du froid', 0, 3),
(5, 5, 'Les voies du froid', 0, 3),
(6, 6, 'Les voies du froid', 1, 0),
(7, 7, 'Les voies du froid', 0, 40),
(8, 8, 'Les voies du froid', 1, 0),
(9, 9, 'Les voies du feu', 1, 0),
(10, 9, 'Les voies de la lumière', 1, 0),
(11, 9, 'Les voies du froid', 0, 40),
(14, 11, 'Les voies du froid', 1, 0),
(13, 10, 'Les voies du feu', 0, 3),
(15, 11, 'Les voies de la lumière', 1, 0),
(16, 11, 'Les voies du feu', 0, 60),
(17, 12, 'Les voies du froid', 0, 40);

-- --------------------------------------------------------

--
-- Structure de la table `personnage_objet`
--

DROP TABLE IF EXISTS `personnage_objet`;
CREATE TABLE IF NOT EXISTS `personnage_objet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) DEFAULT NULL,
  `id_objet` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `utilisable` varchar(255) DEFAULT 'non' COMMENT '"oui" => pour toujours\r\n"non" => pas utilisable\r\nchiffre => nombre d''utilisation',
  `sort_charge` varchar(255) DEFAULT NULL,
  `poids` float NOT NULL DEFAULT '0',
  `prix` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
