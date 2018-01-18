-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 18 jan. 2018 à 22:32
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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id`, `id_utilisateur`, `id_emplacement`, `reference`, `description`, `on_off`, `valeur`, `valeur_cible`, `favori`, `id_type`, `categorie`) VALUES
(1, 1, 1, 'température', 'capteur de température', 'ON', 20, 21, 1, 0, 'simple'),
(33, 4, 17, 'température', 'température', 'ON', 10, 15, 1, 1, 'objet'),
(26, 4, 12, 'température', 'température', 'OFF', 10, NULL, 0, 1, 'simple'),
(25, 3, 13, 'température', 'température', 'OFF', 10, NULL, 0, 0, 'simple'),
(44, 4, 5, 'reference', 'description', 'OFF', 2, NULL, 1, 5, 'simple'),
(38, 4, 5, 'reference', 'description', 'OFF', 10, NULL, 1, 4, 'objet'),
(34, 4, 20, 'reference', 'description', 'OFF', 10, NULL, 1, 3, 'objet');

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
CREATE TABLE IF NOT EXISTS `catalogue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `vignette` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Structure de la table `consignes`
--

DROP TABLE IF EXISTS `consignes`;
CREATE TABLE IF NOT EXISTS `consignes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_capteur` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `directive` varchar(255) NOT NULL,
  `valeur` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplacements`
--

INSERT INTO `emplacements` (`id`, `id_maison`, `nom`) VALUES
(20, 1, 'Chambre enfant'),
(12, 1, 'Garage'),
(13, 2, 'Salon'),
(5, 1, 'Salle de bain'),
(14, 1, 'Chambre'),
(17, 1, 'Salon'),
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
(1, 'http://localhost/site_app/Site/design/picture/montre_2.jpg'),
(2, 'http://localhost/site_app/Site/design/picture/camera_2.jpg'),
(3, 'http://localhost/site_app/Site/design/picture/capteur_2.jpg'),
(4, 'http://localhost/site_app/Site/design/picture/montre_2.jpg'),
(5, 'http://localhost/site_app/Site/design/picture/camera_2.jpg'),
(6, 'http://localhost/site_app/Site/design/picture/capteur_2.jpg'),
(7, 'http://localhost/site_app/Site/design/picture/montre_2.jpg'),
(8, 'http://localhost/site_app/Site/design/picture/camera_2.jpg'),
(9, 'http://localhost/site_app/Site/design/picture/capteur_2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `maisons`
--

DROP TABLE IF EXISTS `maisons`;
CREATE TABLE IF NOT EXISTS `maisons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `superficie` int(11) NOT NULL,
  `nb_occupants` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maisons`
--

INSERT INTO `maisons` (`id`, `id_utilisateur`, `adresse`, `superficie`, `nb_occupants`) VALUES
(1, 4, '23, rue de Penthièvre\r\n07000 PRIVAS', 120, 3),
(2, 3, '15, rue des six frères Ruellan\r\n57200 SARREGUEMINES', 90, 4);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sending_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_customer`, `subject`, `message`, `sending_date`) VALUES
(24, 4, 'g', 'efsgrhdt', '2018-01-12 16:25:57'),
(2, 1, 'Problème technique', 'Bonjour, j\'ai un problème sur un de mes capteurs', '2017-11-25 23:14:04'),
(3, 2, 'Pas content', 'Il n\'y a rien qui marche', '2017-11-25 23:15:42'),
(23, 4, 'essdg', 'qsrdf', '2018-01-12 16:21:03'),
(22, 4, 'eqstd', 's', '2018-01-12 16:20:50'),
(6, 4, 'Problème technique', 'Mon capteur d\'humidité a pris l\'eau', '2017-12-10 22:45:09'),
(21, 4, 'eqstd', 's', '2018-01-12 16:20:34'),
(20, 4, 'eqstd', 's', '2018-01-12 16:20:15'),
(19, 4, 'thg', 'rjyhtgr', '2017-12-21 19:10:51'),
(18, 4, 'test', '', '2017-12-15 15:01:44'),
(17, 4, 'test', '', '2017-12-15 14:12:03'),
(16, 4, 'Problème capteur', 'J\'ai un problème', '2017-12-15 13:52:24'),
(25, 4, '', '', '2018-01-14 17:38:25'),
(26, 4, '', '', '2018-01-14 17:43:51'),
(27, 4, '', '', '2018-01-14 17:47:01'),
(28, 4, '', '', '2018-01-14 17:47:27'),
(29, 4, '', '', '2018-01-14 17:47:49'),
(30, 4, '', '', '2018-01-14 17:49:01'),
(31, 4, '', '', '2018-01-14 17:49:16'),
(32, 4, '', '', '2018-01-14 17:49:19'),
(33, 4, 'tjyrf', 'dtj', '2018-01-14 17:50:31'),
(34, 4, 'iètk', 'fit', '2018-01-14 17:50:41'),
(35, 4, 'fj', 'fyj', '2018-01-16 08:45:30'),
(36, 4, 'test', 'bla', '2018-01-18 09:50:58');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pannes`
--

INSERT INTO `pannes` (`id`, `description`, `date_panne`, `solution`, `date_solution`, `id_client`) VALUES
(1, 'Le capteur de température ne marche plus', '2017-11-01 09:12:09', 'Intervention - Changement du capteur', '2017-11-05 16:37:44', 5),
(2, 'Plus aucun capteur ne marche', '2017-11-07 14:06:34', 'Rebrancher la passerelle', '2017-11-09 18:35:13', 6),
(3, 'Le volet est bloqué', '2017-11-17 13:09:32', 'Intervention - Réparation du capteur', '2017-11-29 19:19:06', 6);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `types_capteurs`
--

INSERT INTO `types_capteurs` (`id_type`, `type`, `categorie`, `lien_image`, `unite`, `valeur_defaut`, `max`, `min`, `code_affichage`) VALUES
(1, 'Température', 'simple', 'http://localhost/site_app/Site/design/picture/thermo_2.png', '°C', 10, 0, 0, 1),
(2, 'Luminosité', 'simple', 'http://localhost/site_app/Site/design/picture/soleil_2.png', 'lux', 100, 0, 0, 1),
(3, 'Radiateur', 'objet', 'http://localhost/site_app/Site/design/picture/radiateur_2.png', '°C', 15, 35, 0, 2),
(4, 'Lampe', 'objet', 'http://localhost/site_app/Site/design/picture/ampoule_2.png', '', NULL, 0, 0, 1),
(5, 'Humidité', 'simple', 'http://localhost/site_app/Site/design/picture/goutte_2.png', '%', 2, NULL, NULL, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `adresse`, `mail`, `mot_de_passe`, `date_inscription`, `categorie_utilisateur`) VALUES
(1, 'CHABOTTE', 'Jack', '38, Chemin Du Lavarin Sud\r\n94230 CACHAN', 'jack.chabotte@gmail.com', '123456', '2017-12-21 09:45:40', 'admin'),
(2, 'MARGAND', 'Nanna', '96, place Stanislas\r\n54000 NANCY', 'nanna.margand@gmail.com', 'aVah8othie9', '2017-12-21 09:45:40', 'admin'),
(3, 'MARCOUX', 'Sydney', '15, rue des six frères Ruellan\r\n57200 SARREGUEMINES', 'sydney.marcoux@gmail.com', 'eipooC4c', '2017-12-21 09:45:40', 'customer'),
(4, 'GUIBORD', 'Gabriel', '23, rue de Penthièvre\r\n07000 PRIVAS', 'gabriel.guibord@gmail.com', '123456', '2017-12-21 09:45:40', 'customer'),
(5, 'QUENNEVILLE', 'Cosette', '55, Rue Hubert de Lisle\r\n33310 LORMONT', 'cosette.quenneville@gmail.com', 'test', '2017-12-21 09:45:40', 'customer'),
(6, 'VARIEUR', 'Aurélie', '17, place de Miremont\r\n92390 VILLENEUVE-LA-GARENNE', 'aurelie.varieur@gmail.com', 'keeTh0caeG', '2017-12-21 09:45:40', 'customer'),
(7, 'MOREAU', 'Alphonse', '19, avenue du Marechal Juin\r\n97436 SAINT-LEU', 'alphonse.moreau@gmail.com', 'xoeL4quoar', '2017-12-21 09:45:40', 'customer'),
(8, 'DUFOUR', 'Hamilton', '22, avenue de Provence\r\n26000 VALENCE', 'hamilton.dufour@gmail.com', 'eiPhee0hai', '2017-12-21 09:45:40', 'customer'),
(9, 'MARIER', 'Martin', '86, rue des six frères Ruellan\r\n44230 SAINT-SÉBASTIEN-SUR-LOIRE', 'martin.marier@gmail.com', 'she8ahLee3', '2017-12-21 09:45:40', 'customer'),
(10, 'LAMONTAGNE', 'Christine', '26, quai Saint-Nicolas\r\n59200 TOURCOING', 'christine.lamontagne@gmail.com', 'UQueen5JieY', '2017-12-21 09:45:40', 'customer'),
(11, 'BELLEMARE', 'Gilles', '14, boulevard Amiral Courbet\r\n94310 ORLY', 'gilles.bellemar@gmail.com', 'reWith0aeg', '2017-12-21 09:45:40', 'customer'),
(12, 'TESTO', 'Stérone', '42, rue du Test\r\n42000 TEST', 'test@gmail.com', '5a610fb13efa9', '2017-12-21 09:45:40', 'customer'),
(20, 'DUFOUR', 'Lewis', '78, Rue Hubert de Lisle\r\n33310 LORMONT', 'lewis.dufour@gmail.com', 'EDfg25d', '2018-01-08 17:30:32', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
