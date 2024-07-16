-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juil. 2024 à 16:59
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `albayt`
--

-- --------------------------------------------------------

--
-- Structure de la table `compagnies_aeriennes`
--

CREATE TABLE `compagnies_aeriennes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compagnies_aeriennes`
--

INSERT INTO `compagnies_aeriennes` (`id`, `nom`, `logo`) VALUES
(1, 'Saudi Airlines', 'uploads/download (4).png');

-- --------------------------------------------------------

--
-- Structure de la table `extras`
--

CREATE TABLE `extras` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `extras`
--

INSERT INTO `extras` (`id`, `nom`, `description`, `prix`) VALUES
(2, 'Miel de Cédre', 'Miel Premium Quality', '90.00');

-- --------------------------------------------------------

--
-- Structure de la table `formules`
--

CREATE TABLE `formules` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date_depart` date DEFAULT NULL,
  `statut` enum('activé','désactivé') NOT NULL,
  `duree_sejour` varchar(255) NOT NULL,
  `prix_chambre_quadruple` decimal(10,2) NOT NULL,
  `prix_chambre_triple` decimal(10,2) NOT NULL,
  `prix_chambre_double` decimal(10,2) NOT NULL,
  `prix_chambre_single` decimal(10,2) NOT NULL,
  `child_discount` decimal(10,2) NOT NULL,
  `prix_bebe` decimal(10,2) NOT NULL,
  `prix_chambre_quadruple_promo` decimal(10,2) NOT NULL,
  `prix_chambre_triple_promo` decimal(10,2) NOT NULL,
  `prix_chambre_double_promo` decimal(10,2) NOT NULL,
  `prix_chambre_single_promo` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formules`
--

INSERT INTO `formules` (`id`, `package_id`, `date_depart`, `statut`, `duree_sejour`, `prix_chambre_quadruple`, `prix_chambre_triple`, `prix_chambre_double`, `prix_chambre_single`, `child_discount`, `prix_bebe`, `prix_chambre_quadruple_promo`, `prix_chambre_triple_promo`, `prix_chambre_double_promo`, `prix_chambre_single_promo`, `description`, `type_id`) VALUES
(9, 5, '2024-07-18', 'activé', '18 jours', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '<p>test firt one</p>\r\n', 10),
(10, 1, '2000-05-05', 'activé', '15 jours', '1500.00', '1500.00', '1500.00', '1500.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '<p>17 OCTOBRE 2024</p>\r\n\r\n<p>D&eacute;part</p>\r\n\r\n<p><strong>PARIS &gt; M&eacute;dine</strong><br />\r\nVol r&eacute;gulier avec la compagnie a&eacute;rienne Royal Jordanian.</p>\r\n\r\n<p>17 OCTOBRE 2024</p>\r\n\r\n<p>Transfert</p>\r\n\r\n<p><strong>A&eacute;roport &gt; H&ocirc;tel</strong><br />\r\nTransfert de l&rsquo;a&eacute;roport vers l&rsquo;h&ocirc;tel en bus confort climatis&eacute;.</p>\r\n\r\n<p>17 OCTOBRE 2024</p>\r\n\r\n<p>Arriv&eacute;e &agrave; l&rsquo;h&ocirc;tel</p>\r\n\r\n<p><strong>BOSPHORUS WAQF AL SAFI 4*</strong><br />\r\nLa premi&egrave;re partie du s&eacute;jour se d&eacute;roulera dans un h&ocirc;tel 4 &eacute;toiles de renomm&eacute;e internationale, situ&eacute; en face du Masjid An&rsquo;Nabawi. Vous y s&eacute;journerez durant 5 nuits.</p>\r\n\r\n<p>18 OCTOBRE 2024</p>\r\n\r\n<p>Visite</p>\r\n\r\n<p><strong>VISITE RELIGIEUSE &Agrave; M&Eacute;DINE</strong><br />\r\nEn d&eacute;but de matin&eacute;e, vous effectuerez une visite religieuse &agrave; Madinah. Vous effectuerez une visite aux Martyrs de Ohoud ainsi que votre pri&egrave;re dans la mosqu&eacute;e de Qoba. Vous serez conduit en bus climatis&eacute;.</p>\r\n\r\n<p>18 OCTOBRE 2024</p>\r\n\r\n<p>Transfert</p>\r\n\r\n<p><strong>M&Eacute;DINE MAKKAH</strong><br />\r\nLe transfert de M&eacute;dine &agrave; Makkah se fera en d&eacute;but de matin&eacute;e dans un bus climatis&eacute;. La distance parcourue est de 480 km environ.</p>\r\n\r\n<p>18 OCTOBRE 2024</p>\r\n\r\n<p>Arriv&eacute;e &agrave; l&rsquo;h&ocirc;tel</p>\r\n\r\n<p><strong>SHERATON 5*</strong><br />\r\nS&eacute;jour dans un h&ocirc;tel 5 &eacute;toiles situ&eacute; en Face du Haram. Vous passerez 5 nuits dans l&rsquo;un des meilleurs h&ocirc;tels de la Mecque.</p>\r\n\r\n<p>19 OCTOBRE 2024</p>\r\n\r\n<p>Omra</p>\r\n\r\n<p><strong>Jour de la OMRA</strong><br />\r\nR&eacute;union &agrave; la r&eacute;ception de l&rsquo;h&ocirc;tel avant d&rsquo;accomplir les rites en groupe. D&eacute;part de l&rsquo;h&ocirc;tel &agrave; 13h00 apr&egrave;s avoir effectu&eacute; ses grandes ablutions et mis son &laquo; ihr&acirc;m &raquo;. Arr&ecirc;t dans le Miq&acirc;t &laquo; Abyar Ali &raquo; pour entrer dans l&rsquo;&eacute;tat de sacralisation et commencer la &laquo; Talbiyah &raquo;.</p>\r\n\r\n<p>20 OCTOBRE 2024</p>\r\n\r\n<p>Visite</p>\r\n\r\n<p><strong>Visite d&eacute;couverte</strong><br />\r\nVisite religieuse &agrave; Makkah en d&eacute;but de matin&eacute;e. Trajet en bus climatis&eacute;. Parcours du Hajj et quelques sites historiques.</p>\r\n\r\n<p>21 OCTOBRE 2024</p>\r\n\r\n<p>Transfert</p>\r\n\r\n<p><strong>MAKKAH JEDDAH</strong><br />\r\nTransfert de l&rsquo;h&ocirc;tel vers l&rsquo;a&eacute;roport de Jeddah en bus confort climatis&eacute;.</p>\r\n\r\n<p>21 MAI 2024</p>\r\n\r\n<p>Retour</p>\r\n\r\n<p><strong>JEDDAH &gt; PARIS</strong><br />\r\nVol r&eacute;gulier avec la compagnie a&eacute;rienne Saudi Airlines.</p>\r\n', 2),
(11, 1, '2024-07-12', 'activé', '15 jours', '1500.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '<p>test</p>\r\n', 3),
(13, 3, '2024-07-02', 'activé', '15', '2000.00', '2000.00', '2000.00', '2000.00', '500.00', '500.00', '1500.00', '1500.00', '1500.00', '1500.00', '<p><strong>Day1 : visite xyz</strong></p>\r\n\r\n<p><strong>Day2 : viste xyz1</strong></p>\r\n', 8),
(14, 4, '2024-07-16', 'activé', '15 jours', '1680.00', '1900.00', '2500.00', '2800.00', '150.00', '500.00', '0.00', '0.00', '0.00', '1500.00', '<p>TEST</p>\r\n', 9),
(15, 6, '2024-07-17', 'activé', '15 jours', '1990.00', '2090.00', '2190.00', '2490.00', '350.00', '150.00', '0.00', '0.00', '0.00', '0.00', '<p>test</p>\r\n', 7),
(29, 4, '2024-07-12', 'désactivé', 'Repudiandae corrupti', '81.00', '99.00', '11.00', '56.00', '61.00', '64.00', '59.00', '83.00', '82.00', '10.00', '', 6),
(30, 3, '2024-07-15', 'activé', 'Sed voluptatem dolor', '91.00', '62.00', '11.00', '19.00', '35.00', '73.00', '97.00', '60.00', '57.00', '18.00', '', 5),
(33, 1, '2024-07-10', 'désactivé', 'Officiis culpa comm', '42.00', '89.00', '32.00', '44.00', '73.00', '17.00', '74.00', '86.00', '58.00', '54.00', '<p>wess 1 octobre comfort</p>\r\n', 2),
(34, 4, '2024-07-12', 'activé', 'Consectetur perferen', '100.00', '47.00', '88.00', '85.00', '5.00', '67.00', '1.00', '86.00', '26.00', '85.00', '<p>avril comfort</p>\r\n', 9),
(36, 3, '2024-07-25', 'désactivé', 'Ratione quia cum lab', '44.00', '42.00', '46.00', '81.00', '13.00', '56.00', '54.00', '10.00', '47.00', '43.00', '', 8),
(37, 3, '2024-07-25', 'activé', 'Modi magni consequat', '53.00', '75.00', '80.00', '79.00', '7.00', '69.00', '53.00', '44.00', '9.00', '61.00', '<p>mars confort</p>\r\n\r\n<p>&nbsp;</p>\r\n', 5),
(41, 1, '2024-07-13', 'activé', 'Non quibusdam illum', '44.00', '47.00', '33.00', '44.00', '1.00', '26.00', '72.00', '87.00', '53.00', '16.00', '<p>omra oct 1</p>\r\n', 3),
(44, 4, NULL, 'activé', 'Perferendis nostrud ', '93.00', '15.00', '61.00', '46.00', '53.00', '44.00', '94.00', '1.00', '67.00', '22.00', '', 6),
(46, 6, '2024-07-25', 'activé', 'Tempora voluptate ni', '37.00', '9.00', '82.00', '57.00', '6.00', '64.00', '43.00', '84.00', '72.00', '90.00', '<p>s1</p>\r\n', 12),
(49, 1, '2024-07-17', 'activé', '10000', '5.00', '10.00', '15.00', '20.00', '25.00', '30.00', '35.00', '40.00', '45.00', '50.00', '<p>55</p>\r\n', 3),
(50, 1, '2024-07-03', 'activé', 'In labore et molliti', '24.00', '12.00', '24.00', '57.00', '44.00', '59.00', '78.00', '93.00', '59.00', '28.00', '<p>volo</p>\r\n', 2),
(52, 5, '2024-07-16', 'activé', 'Fuga Id in vero id ', '49.00', '71.00', '75.00', '64.00', '50.00', '72.00', '81.00', '43.00', '61.00', '37.00', '<p>aa</p>\r\n', 11),
(54, 5, '2024-07-23', 'activé', 'Suscipit soluta ut c', '63.00', '92.00', '32.00', '97.00', '80.00', '76.00', '23.00', '24.00', '18.00', '32.00', '<p>penion</p>\r\n', 10),
(55, 6, '2024-07-17', 'activé', 'Facere assumenda iur', '34.00', '18.00', '82.00', '38.00', '95.00', '47.00', '18.00', '7.00', '95.00', '62.00', '', 7),
(56, 3, '2024-07-12', 'désactivé', 'Fugiat cum et hic e', '61.00', '85.00', '60.00', '83.00', '32.00', '67.00', '36.00', '37.00', '56.00', '100.00', '', 5),
(57, 6, '2024-07-11', 'activé', 'Numquam temporibus q', '10.00', '36.00', '70.00', '14.00', '42.00', '45.00', '82.00', '73.00', '18.00', '79.00', '', 7),
(58, 3, '2024-07-11', 'activé', '1', '38.00', '25.00', '91.00', '44.00', '47.00', '78.00', '49.00', '47.00', '4.00', '6.00', '', 5),
(59, 3, '2024-07-01', 'désactivé', 'Aut ipsum et numqua', '73.00', '51.00', '94.00', '98.00', '47.00', '27.00', '51.00', '75.00', '77.00', '29.00', '', 5),
(60, 3, '1994-12-28', 'activé', 'Atque et molestiae e', '76.00', '88.00', '61.00', '58.00', '19.00', '11.00', '40.00', '89.00', '41.00', '74.00', '<p>date</p>\r\n', 5);

-- --------------------------------------------------------

--
-- Structure de la table `hebergements`
--

CREATE TABLE `hebergements` (
  `id` int(11) NOT NULL,
  `formule_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `type_pension` varchar(255) NOT NULL,
  `date_checkin` date NOT NULL,
  `date_checkout` date NOT NULL,
  `nombre_nuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hebergements`
--

INSERT INTO `hebergements` (`id`, `formule_id`, `hotel_id`, `type_pension`, `date_checkin`, `date_checkout`, `nombre_nuit`) VALUES
(176, 60, 6, 'Sans pension', '1995-05-01', '1973-07-08', 0),
(177, 59, 4, 'Pension Complète', '2024-07-01', '2024-07-28', 27),
(178, 59, 4, 'Pension Complète', '2024-07-01', '2024-07-29', 28),
(179, 59, 4, 'Pension Complète', '2024-07-01', '2024-07-30', 29),
(180, 56, 5, 'Sans pension', '1976-09-28', '2020-01-10', 15809),
(181, 58, 4, 'Demi-pension', '2024-07-01', '2024-07-12', 11),
(182, 58, 4, 'Demi-pension', '2024-07-01', '2024-07-12', 11),
(183, 58, 4, 'Demi-pension', '2024-07-01', '2024-07-12', 11),
(184, 58, 4, 'Sans pension', '2024-07-01', '2024-07-13', 12),
(185, 58, 4, 'Sans pension', '2024-07-01', '2024-07-13', 12),
(186, 58, 4, 'Sans pension', '2024-07-01', '2024-07-13', 12),
(187, 58, 4, 'Demi-pension', '2024-07-01', '2024-07-12', 11),
(188, 58, 4, 'Demi-pension', '2024-07-01', '2024-07-12', 11),
(189, 58, 4, 'Demi-pension', '2024-07-01', '2024-07-12', 11),
(190, 58, 4, 'Sans pension', '2024-07-01', '2024-07-13', 12),
(191, 58, 4, 'Sans pension', '2024-07-01', '2024-07-13', 12),
(192, 58, 4, 'Sans pension', '2024-07-01', '2024-07-13', 12),
(193, 49, 4, 'Pension Complète', '2024-06-29', '2024-07-09', 10),
(194, 49, 4, 'Sans pension', '2024-07-01', '2024-07-21', 20),
(195, 50, 4, 'Pension Complète', '1998-02-22', '2010-02-26', 4387),
(196, 50, 5, 'Pension Complète', '1985-10-25', '2000-06-17', 5349),
(197, 50, 4, 'Demi-pension', '1983-09-27', '2005-09-29', 8038),
(198, 50, 4, 'Demi-pension', '2024-07-24', '2024-08-08', 15),
(199, 50, 4, 'Demi-pension', '2024-07-24', '2024-07-31', 7),
(200, 50, 4, 'Sans pension', '2024-07-25', '2024-07-26', 1),
(201, 29, 4, 'Pension Complète', '2024-07-10', '2024-07-20', 10),
(202, 34, 4, 'Sans pension', '2024-07-01', '2024-07-23', 22),
(203, 52, 4, 'Pension Complète', '2014-12-20', '1997-06-20', 0),
(204, 54, 5, 'Pension Complète', '1984-06-25', '1985-07-30', 400),
(205, 46, 4, 'Demi-pension', '2024-06-01', '2024-06-30', 29),
(206, 55, 4, 'Demi-pension', '2023-04-22', '2024-09-03', 500),
(207, 57, 4, 'Sans pension', '1975-01-22', '2017-02-26', 15376),
(208, 57, 4, 'Pension Complète', '2024-07-01', '2024-07-16', 15),
(209, 57, 4, 'Demi-pension', '2024-07-01', '2024-07-21', 20);

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `etoiles` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `monument` varchar(255) NOT NULL,
  `image_gallery` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`id`, `nom`, `etoiles`, `ville`, `details`, `monument`, `image_gallery`) VALUES
(4, 'Hotels Hilton Al Madinah', 5, 'Madina', 'hotel 5*', 'en face de haram', NULL),
(5, 'Hotel Seabel Alhambra', 5, 'Makkah', 'Hotel 5*', 'En Face de haram', NULL),
(6, 'star', 4, 'medina', 'nice', '4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `hotel_gallery`
--

CREATE TABLE `hotel_gallery` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotel_gallery`
--

INSERT INTO `hotel_gallery` (`id`, `hotel_id`, `image_path`) VALUES
(4, 5, 'uploads/omra-octobre-formule-confort-16-2 (1).jpg'),
(5, 5, 'uploads/omra-octobre-formule-confort-17-2.jpg'),
(6, 5, 'uploads/omra-octobre-formule-confort-16-2.jpg'),
(7, 4, 'uploads/omra-octobre-formule-confort-17-2.jpg'),
(8, 4, 'uploads/omra-octobre-formule-confort-16-2.jpg'),
(9, 4, 'uploads/honning2jpg_5df8eb60a142a.jpg'),
(10, 4, 'uploads/usinage-acier-inoxydable.jpg'),
(11, 4, 'uploads/rectificationsoupapes01jpg_5dfb989139861.jpg'),
(12, 4, 'uploads/bc3bc6f8ad96.jpg'),
(13, 4, 'uploads/honning2jpg_5df8eb60a142a.jpg'),
(14, 4, 'uploads/usinage-acier-inoxydable.jpg'),
(15, 4, 'uploads/rectificationsoupapes01jpg_5dfb989139861.jpg'),
(16, 4, 'uploads/bc3bc6f8ad96.jpg'),
(17, 5, 'uploads/unrecognizable-man-working-in-factory-with-machine-2024-01-23-16-14-19-utc.jpg'),
(18, 5, 'uploads/22-1.png'),
(19, 5, 'uploads/skilled-worker-is-repairing-metal-part-using-machi-2023-11-27-04-50-52-utc.jpg'),
(20, 5, 'uploads/23-1.png'),
(21, 5, 'uploads/unrecognizable-man-working-in-factory-with-machine-2024-01-23-16-14-19-utc.jpg'),
(22, 5, 'uploads/22-1.png'),
(23, 5, 'uploads/skilled-worker-is-repairing-metal-part-using-machi-2023-11-27-04-50-52-utc.jpg'),
(24, 5, 'uploads/23-1.png'),
(25, 6, 'uploads/pexels-pixabay-413960.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `omra_packages`
--

CREATE TABLE `omra_packages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `omra_packages`
--

INSERT INTO `omra_packages` (`id`, `nom`, `description`, `photo`) VALUES
(1, 'Omra Octobre', 'OMRA OCTOBRE 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/6668d725d1d067.74923834_omra-octobre-18.jpg'),
(3, 'Omra Mars', 'OMRA Mai 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/omra-octobre-18.jpg'),
(4, 'Omra Avril', 'OMRA Avril 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/omra-octobre-19.jpg'),
(5, 'Omra Janvier', 'OMRA Mai Janvier Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/omra-octobre-18.jpg'),
(6, 'Paris', 'test', 'uploads/omra-octobre-19.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) DEFAULT 0,
  `babies` int(11) DEFAULT 0,
  `quadruple_rooms` int(11) DEFAULT 0,
  `triple_rooms` int(11) DEFAULT 0,
  `double_rooms` int(11) DEFAULT 0,
  `single_rooms` int(11) DEFAULT 0,
  `extras` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `formula_name` varchar(255) DEFAULT NULL,
  `departure_date` text DEFAULT NULL,
  `departure_city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `full_name`, `address`, `phone_number`, `email`, `adults`, `children`, `babies`, `quadruple_rooms`, `triple_rooms`, `double_rooms`, `single_rooms`, `extras`, `total_price`, `package_name`, `formula_name`, `departure_date`, `departure_city`) VALUES
(15, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(16, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(17, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(18, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(19, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(20, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(21, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(22, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(23, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(24, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(25, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(26, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(27, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(28, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(29, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(30, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(31, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(32, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(33, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(34, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(35, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(36, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(37, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(38, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(39, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(40, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(41, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(42, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(43, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(44, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(45, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(46, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(47, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(48, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(49, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(50, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(51, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(52, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(53, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(54, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(55, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(56, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(57, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(58, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 2, 2, 5, 2, 0, 0, '0', '7450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(59, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(60, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(61, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(62, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(63, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5360.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(64, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5360.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(65, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(66, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(67, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(68, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5360.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(69, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5360.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(70, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5360.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(71, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(72, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(73, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(74, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(75, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(76, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(77, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(78, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', '5450.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(79, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 3, 2, 5, 1, 1, 1, '0', '16240.00', 'Paris', 'Formule Express', '12/07/2024', 'Tunis'),
(80, 'Hadley Sanders', 'Aut ut aliqua Excep', '+33+1 (731) 644-7382', 'lyrybor@mailinator.com', 1, 2, 0, 1, 1, 1, 0, '0', '1270.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis');

-- --------------------------------------------------------

--
-- Structure de la table `type_formule_omra`
--

CREATE TABLE `type_formule_omra` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `formule_parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_formule_omra`
--

INSERT INTO `type_formule_omra` (`id`, `nom`, `formule_parent_id`) VALUES
(2, 'Formule Confrot', 1),
(3, 'Formule Simple', 1),
(5, 'Formule Confort', 3),
(6, 'Formule Confort', 4),
(7, 'Formule Express', 6),
(8, 'Formule Simple', 3),
(9, 'Formule Simple', 4),
(10, 'Formule Simple', 5),
(11, 'Formule Confort', 5),
(12, 'Formule Simple', 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$1myYw6JYxVGRay/AKK00aOz.nJ24N4B/D99X0Hh7maREUQ6ymKfPK', 'amin@digietab.tn'),
(2, 'admin', '$2a$04$lcRmaX8LwYpP6Q0dzhx9LuAhlsc/sTjUNoZT.L3gKl9wG43IKcq4u', 'amin@digietab.tns');

-- --------------------------------------------------------

--
-- Structure de la table `ville_depart`
--

CREATE TABLE `ville_depart` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `statut` enum('activé','désactivé') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville_depart`
--

INSERT INTO `ville_depart` (`id`, `nom`, `statut`) VALUES
(2, 'Tunis', 'activé'),
(3, 'Lyon', 'activé');

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id` int(11) NOT NULL,
  `formule_id` int(11) NOT NULL,
  `ville_depart_id` int(11) NOT NULL,
  `compagnie_aerienne_id` int(11) NOT NULL,
  `num_vol` varchar(255) NOT NULL,
  `airport_depart` varchar(255) NOT NULL,
  `heure_depart` datetime NOT NULL,
  `destination` varchar(255) NOT NULL,
  `airport_destination` varchar(255) NOT NULL,
  `heure_arrivee` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id`, `formule_id`, `ville_depart_id`, `compagnie_aerienne_id`, `num_vol`, `airport_depart`, `heure_depart`, `destination`, `airport_destination`, `heure_arrivee`) VALUES
(14, 44, 3, 1, 'vol n1d', 'vol n1', '1986-06-24 14:28:00', 'vol n1', 'vol n1', '1995-09-27 15:28:00'),
(15, 44, 2, 1, 'vol n3d', 'vol n3', '2024-07-16 13:43:00', 'vol n3', 'vol n3', '2024-07-22 13:43:00'),
(416, 60, 3, 1, 'Vel numquam ea et nu', 'Exercitation volupta', '2002-05-27 11:15:00', 'Laudantium et odit ', 'Dicta non voluptates', '2019-01-07 18:10:00'),
(417, 59, 2, 1, 'Voluptate esse aliq', 'Numquam perspiciatis', '2003-03-22 03:53:00', 'Asperiores iusto mol', 'Molestiae mollit ani', '1977-01-16 11:07:00'),
(418, 56, 3, 1, 'Odio laborum dolorib', 'Distinctio Velit e', '1981-01-15 03:58:00', 'Fugit optio recusa', 'Dolor amet vel volu', '2005-12-07 03:20:00'),
(419, 58, 2, 1, '1', '1', '1984-04-04 12:00:00', 'Laboriosam rem blan', 'Magna dolor fuga Hi', '2016-05-06 09:19:00'),
(420, 58, 2, 1, '1', '1', '1984-04-04 12:00:00', 'Laboriosam rem blan', 'Magna dolor fuga Hi', '2016-05-06 09:19:00'),
(421, 41, 2, 1, 'Rerum inventore et e', 'Aliquid voluptas vol', '1986-02-25 21:16:00', 'Dolore ullamco harum', 'Libero sed non volup', '1995-07-10 19:31:00'),
(422, 49, 2, 1, 'z10', 'Ut ut doloremque eu ', '2023-03-23 17:44:00', 'Qui laudantium sed ', 'Eu vel ipsum sapient', '2017-11-19 19:37:00'),
(423, 49, 2, 1, 'z20', 'vol n5', '2024-08-07 14:59:00', 'vol n6', 'vol n6', '2024-07-25 14:59:00'),
(424, 50, 3, 1, 'V1', 'Expedita proident q', '1998-12-23 05:17:00', 'Repellendus Officii', 'Accusantium laboris ', '1985-10-14 17:24:00'),
(425, 50, 2, 1, 'V2', 'Nihil et totam rerum', '2022-03-01 17:36:00', 'Qui velit dolorem mo', 'Aute dolores laboris', '2014-05-25 13:33:00'),
(426, 50, 3, 1, 'V3', 'Asperiores perferend', '2003-01-21 08:08:00', 'Quisquam accusantium', 'Eos consequatur pla', '2021-11-12 00:50:00'),
(427, 50, 2, 1, 'V4', 'vol n9', '2024-07-17 15:26:00', 'vol n11', 'vol n10', '2024-07-11 15:26:00'),
(428, 50, 2, 1, 'V5', 'vol n10', '2024-07-23 15:27:00', 'vol n10', 'vol n10', '2024-08-02 15:27:00'),
(429, 50, 2, 1, 'V6', 'vol n11', '2024-07-09 15:27:00', 'vol n11', 'vol n11', '2024-07-17 15:27:00'),
(430, 29, 3, 1, 'z10', '1', '2024-07-30 20:48:00', 'ihih', 'oujguj', '2024-07-26 20:49:00'),
(431, 34, 2, 1, 'z10', '1', '2024-07-25 20:49:00', 'ihih', 'oujguj', '2024-07-13 20:49:00'),
(432, 52, 3, 1, 'Dicta tempore lauda', 'Rerum nisi officiis ', '1982-01-13 03:27:00', 'Amet velit eos dolo', 'Quo voluptatem est u', '1990-05-05 09:48:00'),
(433, 54, 2, 1, 'Amet accusantium re', 'Aliquid possimus ma', '2007-02-06 09:15:00', 'Ut in qui est ipsum ', 'Placeat do iusto vo', '1975-08-17 19:20:00'),
(434, 46, 3, 1, 's1', 'Animi totam nemo al', '1984-02-21 15:33:00', 'Sint veniam fugiat ', 'Amet voluptas ipsum', '1972-02-12 03:35:00'),
(435, 55, 2, 1, 'Mollit sit et enim ', 'Quasi sit debitis mi', '1977-06-28 23:44:00', 'Voluptate voluptatem', 'Esse voluptas volup', '1983-12-27 17:11:00'),
(436, 57, 2, 1, 'Accusamus iusto cons', 'Dolore debitis dolor', '2002-08-19 00:25:00', 'Vero laudantium qui', 'Saepe cupiditate ut ', '2011-02-23 20:43:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compagnies_aeriennes`
--
ALTER TABLE `compagnies_aeriennes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formules`
--
ALTER TABLE `formules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `hebergements`
--
ALTER TABLE `hebergements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formule_id` (`formule_id`),
  ADD KEY `hebergements_ibfk_2` (`hotel_id`);

--
-- Index pour la table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Index pour la table `omra_packages`
--
ALTER TABLE `omra_packages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formule_parent_id` (`formule_parent_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ville_depart`
--
ALTER TABLE `ville_depart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vols`
--
ALTER TABLE `vols`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formule_id` (`formule_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compagnies_aeriennes`
--
ALTER TABLE `compagnies_aeriennes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formules`
--
ALTER TABLE `formules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `omra_packages`
--
ALTER TABLE `omra_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ville_depart`
--
ALTER TABLE `ville_depart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formules`
--
ALTER TABLE `formules`
  ADD CONSTRAINT `formules_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `omra_packages` (`id`),
  ADD CONSTRAINT `formules_ibfk_6` FOREIGN KEY (`type_id`) REFERENCES `type_formule_omra` (`id`);

--
-- Contraintes pour la table `hebergements`
--
ALTER TABLE `hebergements`
  ADD CONSTRAINT `hebergements_ibfk_1` FOREIGN KEY (`formule_id`) REFERENCES `formules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hebergements_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Contraintes pour la table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  ADD CONSTRAINT `hotel_gallery_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  ADD CONSTRAINT `type_formule_omra_ibfk_1` FOREIGN KEY (`formule_parent_id`) REFERENCES `omra_packages` (`id`);

--
-- Contraintes pour la table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`formule_id`) REFERENCES `formules` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
