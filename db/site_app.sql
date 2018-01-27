-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 27 jan. 2018 à 17:18
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_capteur` int(11) NOT NULL,
  `date_mesure` datetime NOT NULL,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `id_capteur`, `date_mesure`, `valeur`) VALUES
(1, 33, '2018-01-01 00:00:00', 19),
(2, 33, '2018-01-01 01:00:00', 18),
(3, 33, '2018-01-01 02:00:00', 19),
(4, 33, '2018-01-01 03:00:00', 20),
(5, 33, '2018-01-01 04:00:00', 19),
(6, 33, '2018-01-01 05:00:00', 20),
(7, 33, '2018-01-01 06:00:00', 19),
(8, 33, '2018-01-01 07:00:00', 19),
(9, 33, '2018-01-01 08:00:00', 19),
(10, 33, '2018-01-01 09:00:00', 20),
(11, 33, '2018-01-01 10:00:00', 19),
(12, 33, '2018-01-01 11:00:00', 18),
(13, 33, '2018-01-01 12:00:00', 17),
(14, 33, '2018-01-01 13:00:00', 16),
(15, 33, '2018-01-01 14:00:00', 16),
(16, 33, '2018-01-01 15:00:00', 17),
(17, 33, '2018-01-01 16:00:00', 16),
(18, 33, '2018-01-01 17:00:00', 18),
(19, 33, '2018-01-01 18:00:00', 20),
(20, 33, '2018-01-01 19:00:00', 20),
(21, 33, '2018-01-01 20:00:00', 21),
(22, 33, '2018-01-01 21:00:00', 20),
(23, 33, '2018-01-01 22:00:00', 20),
(24, 33, '2018-01-01 23:00:00', 19);

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

DROP TABLE IF EXISTS `capteurs`;
CREATE TABLE IF NOT EXISTS `capteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_emplacement` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `on_off` varchar(255) NOT NULL,
  `valeur` float DEFAULT NULL,
  `valeur_cible` float DEFAULT NULL,
  `favori` tinyint(1) NOT NULL DEFAULT '0',
  `id_type` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id`, `id_utilisateur`, `id_emplacement`, `reference`, `description`, `on_off`, `valeur`, `valeur_cible`, `favori`, `id_type`, `categorie`) VALUES
(1, 1, 1, 'température', 'capteur de température', 'ON', 20, 21, 1, 0, 'simple'),
(26, 4, 12, 'température', 'température', 'ON', 10, NULL, 0, 1, 'simple'),
(25, 3, 13, 'température', 'température', 'OFF', 10, NULL, 0, 0, 'simple'),
(44, 4, 5, 'reference', 'description', 'OFF', 2, NULL, 0, 5, 'simple'),
(38, 4, 5, 'reference', 'description', 'OFF', 10, NULL, 0, 4, 'objet'),
(53, 4, 30, 'reference', 'description', 'ON', 15, 30, 1, 3, 'objet'),
(54, 4, 30, 'reference', 'description', 'OFF', 10, NULL, 1, 1, 'simple'),
(55, 4, 5, 'reference', 'description', 'OFF', 5, NULL, 1, 7, 'simple'),
(56, 4, 30, 'reference', 'description', 'OFF', 10, NULL, 0, 1, 'simple');

-- --------------------------------------------------------

--
-- Structure de la table `cgu`
--

DROP TABLE IF EXISTS `cgu`;
CREATE TABLE IF NOT EXISTS `cgu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cgu`
--

INSERT INTO `cgu` (`id`, `texte`) VALUES
(1, '<div style=\"text-align: center;\"><b><font size=\"5\">Conditions Générales d\'Utilisation</font></b></div><div style=\"text-align: left;\"><b><br></b></div><div style=\"text-align: justify;\">Il n\'existe pas d\'obligation légale quant à la rédaction de conditions générales d\'utilisation (CGU). Toutefois, il est fortement recommandé de les inclure au site internet. En effet, le contrat de CGU encadre juridiquement les rapports et les conflits pouvant naître entre l\'éditeur du site et le visiteur. En revanche et conformément à la loi pour la confiance dans l\'économie numérique en date du 21 juin 2004, les mentions légales doivent obligatoirement figurer sur le site internet. Les CGU peuvent les reproduire ou indiquer un lien direct permettant d\'y accéder.</div><div style=\"text-align: left;\"><br></div><div style=\"text-align: left;\">Tout visiteur du site internet accepte les CGU pour l\'accès et l\'utilisation aux services proposés par le site.</div><div style=\"text-align: left;\">Les CGU informent les visiteurs sur différentes informations comme :</div><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><div style=\"text-align: left;\">- les mentions légales relatives à la société, à son siège social ;</div></blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><div style=\"text-align: left;\">- les conditions d\'accès au site ;</div><div style=\"text-align: left;\">- les différents services et les produits qu\'offre le site ;</div><div style=\"text-align: left;\">- les modalités relatives à la création d\'un compte visiteur, client ;</div><div style=\"text-align: left;\">- la propriété intellectuelle ;</div><div style=\"text-align: left;\">- la protection des données personnelles ;</div><div style=\"text-align: left;\">- la responsabilité de l\'éditeur et ses limites ;</div><div style=\"text-align: left;\">- la responsabilité du visiteur ;</div><div><div style=\"text-align: left;\">- les liens hypertextes ;</div></div><div><div><div style=\"text-align: left;\">- la durée du contrat ;</div></div></div><div><div><div style=\"text-align: left;\">- l\'évolution du contrat ;</div></div></div><div><div style=\"text-align: left;\">- la juridiction compétente et le droit applicable en cas de litige.</div></div></blockquote><div><div style=\"text-align: left;\"><br></div></div>');

-- --------------------------------------------------------

--
-- Structure de la table `emplacements`
--

DROP TABLE IF EXISTS `emplacements`;
CREATE TABLE IF NOT EXISTS `emplacements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_maison` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplacements`
--

INSERT INTO `emplacements` (`id`, `id_maison`, `nom`) VALUES
(30, 1, 'Chambre enfant'),
(12, 1, 'Garage'),
(13, 2, 'Salon'),
(5, 1, 'Salle de bain'),
(34, 4, 'Salon'),
(24, 2, 'Cuisine');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `lien`) VALUES
(1, 'http://localhost/site_app/Site/design/picture/camera_2.jpg'),
(2, 'http://localhost/site_app/Site/design/picture/capteur_2.jpg'),
(3, 'http://localhost/site_app/Site/design/picture/montre_2.jpg'),
(4, 'http://localhost/site_app/Site/design/picture/camera_2.jpg'),
(5, 'http://localhost/site_app/Site/design/picture/capteur_2.jpg'),
(6, 'http://localhost/site_app/Site/design/picture/montre_2.jpg'),
(7, 'http://localhost/site_app/Site/design/picture/camera_2.jpg'),
(8, 'http://localhost/site_app/Site/design/picture/capteur_2.jpg'),
(9, 'http://localhost/site_app/Site/design/picture/montre_2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `maisons`
--

DROP TABLE IF EXISTS `maisons`;
CREATE TABLE IF NOT EXISTS `maisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `nb_occupants` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maisons`
--

INSERT INTO `maisons` (`id`, `id_utilisateur`, `superficie`, `nb_occupants`) VALUES
(1, 4, 120, 3),
(2, 3, 90, 4),
(3, 5, 100, 2),
(4, 6, 100, 2),
(5, 7, 100, 2),
(6, 8, 100, 2),
(7, 9, 100, 2),
(8, 10, 100, 2),
(9, 11, 100, 2),
(10, 12, 100, 2),
(11, 20, 100, 2);

-- --------------------------------------------------------

--
-- Structure de la table `numeros_domisep`
--

DROP TABLE IF EXISTS `numeros_domisep`;
CREATE TABLE IF NOT EXISTS `numeros_domisep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `numeros_domisep`
--

INSERT INTO `numeros_domisep` (`id`, `numero`) VALUES
(1, '01.02.03.46.63'),
(2, 'domisep@isep.fr');

-- --------------------------------------------------------

--
-- Structure de la table `pannes`
--

DROP TABLE IF EXISTS `pannes`;
CREATE TABLE IF NOT EXISTS `pannes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `date_panne` datetime NOT NULL,
  `solution` text NOT NULL,
  `date_solution` datetime NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pannes`
--

INSERT INTO `pannes` (`id`, `description`, `date_panne`, `solution`, `date_solution`, `id_client`) VALUES
(1, 'Le capteur de température ne marche plus', '2017-11-01 09:12:09', 'Intervention - Changement du capteur', '2017-11-05 16:37:44', 5),
(2, 'Plus aucun capteur ne marche', '2017-11-07 14:06:34', 'Rebrancher la passerelle', '2017-11-09 18:35:13', 6),
(3, 'Le volet est bloqué', '2017-11-17 13:09:32', 'Intervention - Réparation du capteur', '2017-11-29 19:19:06', 6),
(4, 'Le capteur d\'humidité semble bloqué', '2018-01-03 10:06:32', 'Changer le capteur', '2018-01-04 14:11:18', 8),
(5, 'Les objets ne réagissent plus aux instructions', '2018-01-05 07:09:39', 'Rebrancher les CeMACs', '2018-01-09 19:12:45', 4),
(6, 'La lampe du salon reste allumée quand j\'essaye de l\'éteindre', '2018-01-08 11:06:38', 'Eteindre et rallumer le CeMAC', '2018-01-10 11:08:23', 8),
(7, 'Le CeMAC ne fonctionne plus', '2018-01-09 12:11:29', 'Changement du CeMAC', '2018-01-17 10:33:13', 7),
(8, 'Plus rien ne fonctionne', '2018-01-15 14:18:42', 'Intervention technicien', '2018-01-17 11:41:27', 20),
(9, 'Les capteurs du salon ne marchent plus', '2018-01-17 16:14:29', 'Rebrancher le CeMAC en charge des capteurs du salon', '2018-01-18 08:32:30', 11),
(10, 'Je n\'arrive pas à faire marcher les capteurs du garage', '2018-01-15 15:12:36', 'Rajouter un CeMAC qui couvre la garage', '2018-01-17 12:13:34', 5),
(11, 'L\'ampoule de la cuisine ne s\'allume plus', '2018-01-16 15:14:28', 'Changer l\'ampoule', '2018-01-16 18:33:15', 9),
(12, 'Le capteur de luminosité du garage de marche pas', '2018-01-16 09:37:06', 'Il n\'y a pas de lumière dans le garage', '2018-01-22 17:31:18', 10);

-- --------------------------------------------------------

--
-- Structure de la table `types_capteurs`
--

DROP TABLE IF EXISTS `types_capteurs`;
CREATE TABLE IF NOT EXISTS `types_capteurs` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `lien_image` text NOT NULL,
  `unite` varchar(255) NOT NULL DEFAULT '',
  `valeur_defaut` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `code_affichage` int(11) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `types_capteurs`
--

INSERT INTO `types_capteurs` (`id_type`, `type`, `categorie`, `lien_image`, `unite`, `valeur_defaut`, `max`, `min`, `code_affichage`) VALUES
(1, 'Température', 'simple', '../../design/picture/thermo_2.png', '°C', 10, 0, 0, 1),
(2, 'Luminosité', 'simple', '../../design/picture/soleil_2.png', 'lux', 100, 0, 0, 1),
(3, 'Radiateur', 'objet', '../../design/picture/radiateur_2.png', '°C', 15, 35, 0, 2),
(4, 'Lampe', 'objet', '../../design/picture/ampoule_2.png', '', NULL, 0, 0, 1),
(7, 'Humidité', 'simple', '../../design/picture/goutte_2.png', '%', 5, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categorie_utilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `adresse`, `mail`, `mot_de_passe`, `date_inscription`, `categorie_utilisateur`) VALUES
(1, 'CHABOTTE', 'Jack', '38, Chemin Du Lavarin Sud\r\n94230 CACHAN', 'jack.chabotte@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-12-13 19:45:42', 'admin'),
(2, 'MARGAND', 'Nanna', '96, place Stanislas\r\n54000 NANCY', 'nanna.margand@gmail.com', 'f32ae9f561808c6eca0c5ba245821a14b72129f4', '2017-02-21 09:45:40', 'admin'),
(3, 'MARCOUX', 'Sydney', '15, rue des six frères Ruellan\r\n57200 SARREGUEMINES', 'sydney.marcoux@gmail.com', 'abebc3297d0c5c956a2b3ee5f3cd76223189e68d', '2016-12-14 09:47:59', 'customer'),
(4, 'GUIBORD', 'Gabriel', '23, rue de Penthièvre\r\n07000 PRIVAS', 'gabriel.guibord@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-10-03 14:31:30', 'customer'),
(5, 'QUENNEVILLE', 'Cosette', '55, Rue Hubert de Lisle\r\n33310 LORMONT', 'cosette.quenneville@gmail.com', '61269e64862de4f51f68733e3d8c6727de5f91c8', '2016-05-01 18:45:32', 'customer'),
(6, 'VARIEUR', 'Aurélie', '17, place de Miremont\r\n92390 VILLENEUVE-LA-GARENNE', 'aurelie.varieur@gmail.com', '661b5fb56d7f6dbdfce631ad0071e03de9abed12', '2017-06-11 10:55:11', 'customer'),
(7, 'MOREAU', 'Alphonse', '19, avenue du Marechal Juin\r\n97436 SAINT-LEU', 'alphonse.moreau@gmail.com', '5604dd55bd14f314b3ce02069fe7c60a49d442a1', '2016-02-22 07:45:36', 'customer'),
(8, 'DUFOUR', 'Hamilton', '22, avenue de Provence\r\n26000 VALENCE', 'hamilton.dufour@gmail.com', '8af9adac02cdb4cd40010f1825cfdc8912bc3ffb', '2017-08-15 12:15:43', 'customer'),
(9, 'MARIER', 'Martin', '86, rue des six frères Ruellan\r\n44230 SAINT-SÉBASTIEN-SUR-LOIRE', 'martin.marier@gmail.com', 'a3710370d4530286d700c8288710a415b71c8fe2', '2017-11-12 09:45:40', 'customer'),
(10, 'LAMONTAGNE', 'Christine', '26, quai Saint-Nicolas\r\n59200 TOURCOING', 'christine.lamontagne@gmail.com', '3748d7b8d00a9b5604b477273e8f04f850778a3c', '2017-03-04 17:14:43', 'customer'),
(11, 'BELLEMARE', 'Gilles', '14, boulevard Amiral Courbet\r\n94310 ORLY', 'gilles.bellemar@gmail.com', 'ce27733ea14aec25d52c5b467fd50ac8ce2130dd', '2017-06-14 09:36:01', 'customer'),
(12, 'TESTO', 'Stérone', '42, rue du Test\r\n42000 TEST', 'testo.sterone@gmail.com', '6763500ac7e760efe19079d5452694951da17ab9', '2018-01-25 14:17:19', 'customer'),
(20, 'DUFOUR', 'Lewis', '78, Rue Hubert de Lisle\r\n33310 LORMONT', 'lewis.dufour@gmail.com', '43a169d3cbc04fdaae2e05a75683bcc62f92cfef', '2018-01-08 17:30:32', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
