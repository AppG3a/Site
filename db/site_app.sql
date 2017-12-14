-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 14 déc. 2017 à 19:15
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
  `valeur` float NOT NULL,
  `valeur_cible` float DEFAULT NULL,
  `favori` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id`, `id_utilisateur`, `id_emplacement`, `reference`, `description`, `on_off`, `valeur`, `valeur_cible`, `favori`) VALUES
(1, 1, 1, 'température', 'capteur de température', 'ON', 20, 21, 0),
(2, 1, 1, 'humidité', 'capteur d\'humidité', 'OFF', 23.3, NULL, 0),
(3, 4, 1, 'température', 'Capteur de température', 'ON', 20, NULL, 1),
(4, 4, 1, 'humidité', 'Capteur d\'humidité', 'ON', 23.5, NULL, 0),
(5, 4, 2, 'température', 'Capteur de température', 'OFF', 21, NULL, 0),
(27, 4, 12, 'humidité', 'humidité', 'OFF', 10, NULL, 1),
(26, 4, 12, 'température', 'température', 'OFF', 10, NULL, 1),
(25, 3, 13, 'température', 'température', 'OFF', 10, NULL, 0);

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
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categorie` varchar(255) NOT NULL
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
(1, '<div style=\"text-align: center;\"><b>Conditions Générales d\'Utilisation</b></div><div style=\"text-align: left;\"><b><br></b></div><div style=\"text-align: justify;\">Il n\'existe pas d\'obligation légale quant à la rédaction de conditions générales d\'utilisation (CGU). Toutefois, il est fortement recommandé de les inclure au site internet. En effet, le contrat de CGU encadre juridiquement les rapports et les conflits pouvant naître entre l\'éditeur du site et le visiteur. En revanche et conformément à la loi pour la confiance dans l\'économie numérique en date du 21 juin 2004, les mentions légales doivent obligatoirement figurer sur le site internet. Les CGU peuvent les reproduire ou indiquer un lien direct permettant d\'y accéder.</div><div style=\"text-align: left;\"><br></div><div style=\"text-align: left;\">Tout visiteur du site internet accepte les CGU pour l\'accès et l\'utilisation aux services proposés par le site.</div><div style=\"text-align: left;\">Les CGU informent les visiteurs sur différentes informations comme :</div><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><div style=\"text-align: left;\">- les mentions légales relatives à la société, à son siège social ;</div></blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><div style=\"text-align: left;\">- les conditions d\'accès au site ;</div><div style=\"text-align: left;\">- les différents services et les produits qu\'offre le site ;</div><div style=\"text-align: left;\">- les modalités relatives à la création d\'un compte visiteur, client ;</div><div style=\"text-align: left;\">- la propriété intellectuelle ;</div><div style=\"text-align: left;\">- la protection des données personnelles ;</div><div style=\"text-align: left;\">- la responsabilité de l\'éditeur et ses limites ;</div><div style=\"text-align: left;\">- la responsabilité du visiteur ;</div><div><div style=\"text-align: left;\">- les liens hypertextes ;</div></div><div><div><div style=\"text-align: left;\">- la durée du contrat ;</div></div></div><div><div><div style=\"text-align: left;\">- l\'évolution du contrat ;</div></div></div><div><div style=\"text-align: left;\">- la juridiction compétente et le droit applicable en cas de litige.</div></div></blockquote><div><div style=\"text-align: left;\"><br></div></div>');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emplacements`
--

INSERT INTO `emplacements` (`id`, `id_maison`, `nom`) VALUES
(1, 1, 'Salon'),
(2, 1, 'Cuisine'),
(12, 1, 'Garage'),
(13, 2, 'Salon'),
(5, 1, 'Salle de bain');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lien` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_customer`, `subject`, `message`, `sending_date`) VALUES
(2, 1, 'Problème technique', 'Bonjour, j\'ai un problème sur un de mes capteurs', '2017-11-25 23:14:04'),
(3, 2, 'Pas content', 'Il n\'y a rien qui marche', '2017-11-25 23:15:42'),
(6, 4, 'Problème technique', 'Mon capteur d\'humidité a pris l\'eau', '2017-12-10 22:45:09');

-- --------------------------------------------------------

--
-- Structure de la table `numeros_domisep`
--

DROP TABLE IF EXISTS `numeros_domisep`;
CREATE TABLE IF NOT EXISTS `numeros_domisep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `numeros_domisep`
--

INSERT INTO `numeros_domisep` (`id`, `numero`) VALUES
(1, '0102030405');

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
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `categorie_utilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `adresse`, `mail`, `pseudo`, `mot_de_passe`, `categorie_utilisateur`) VALUES
(1, 'CHABOTTE', 'Jack', '38, Chemin Du Lavarin Sud\r\n94230 CACHAN', 'jack.chabotte@gmail.com', 'Porche1975', '123', 'admin'),
(2, 'MARGAND', 'Nanna', '96, place Stanislas\r\n54000 NANCY', 'nanna.margand@gmail.com', 'Colened', 'aVah8othie9', 'admin'),
(3, 'MARCOUX', 'Sydney', '15, rue des six frères Ruellan\r\n57200 SARREGUEMINES', 'sydney.marcoux@gmail.com', 'Canualal', 'eipooC4c', 'customer'),
(4, 'GUIBORD', 'Gabriel', '23, rue de Penthièvre\r\n07000 PRIVAS', 'gabriel.guibord@gmail.com', 'Offied', '1234', 'customer'),
(5, 'QUENNEVILLE', 'Cosette', '55, Rue Hubert de Lisle\r\n33310 LORMONT', 'cosette.quenneville@gmail.com', 'Niatand', 'test', 'customer'),
(6, 'VARIEUR', 'Aurélie', '17, place de Miremont\r\n92390 VILLENEUVE-LA-GARENNE', 'aurelie.varieur@gmail.com', 'Timentep', 'keeTh0caeG', 'customer'),
(7, 'MOREAU', 'Alphonse', '19, avenue du Marechal Juin\r\n97436 SAINT-LEU', 'alphonse.moreau@gmail.com', 'Grearlacte1948', 'xoeL4quoar', 'customer'),
(8, 'DUFOUR', 'Hamilton', '22, avenue de Provence\r\n26000 VALENCE', 'hamilton.dufour@gmail.com', 'Thestrand', 'eiPhee0hai', 'customer'),
(9, 'MARIER', 'Martin', '86, rue des six frères Ruellan\r\n44230 SAINT-SÉBASTIEN-SUR-LOIRE', 'martin.marier@gmail.com', 'Siblen', 'she8ahLee3', 'customer'),
(10, 'LAMONTAGNE', 'Christine', '26, quai Saint-Nicolas\r\n59200 TOURCOING', 'christine.lamontagne@gmail.com', 'Buttleace', 'UQueen5JieY', 'customer'),
(11, 'BELLEMARE', 'Gilles', '14, boulevard Amiral Courbet\r\n94310 ORLY', 'gilles.bellemar@gmail.com', 'Hasuld', 'reWith0aeg', 'customer'),
(12, 'Testo', 'Stérone', '42, rue du Test\r\n42000 TEST', 'test@gmail.com', 'Testos', 'test', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
