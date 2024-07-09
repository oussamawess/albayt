-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 juil. 2024 à 13:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

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
(2, 'Miel de Cédre', 'Miel Premium Quality', 90.00);

-- --------------------------------------------------------

--
-- Structure de la table `formules`
--

CREATE TABLE `formules` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `statut` enum('activé','désactivé') NOT NULL,
  `duree_sejour` varchar(255) NOT NULL,
  `ville_depart_id` int(11) NOT NULL,
  `compagnie_aerienne_id` int(11) NOT NULL,
  `num_vol` varchar(255) NOT NULL,
  `airport_depart` varchar(255) NOT NULL,
  `heure_depart` datetime NOT NULL,
  `destination` varchar(255) NOT NULL,
  `airport_destination` varchar(255) NOT NULL,
  `heure_arrivee` datetime NOT NULL,
  `date_checkin1` date NOT NULL,
  `date_checkout1` date NOT NULL,
  `hotel1_id` int(11) NOT NULL,
  `nombre_nuit1` int(11) NOT NULL,
  `date_checkin2` date NOT NULL,
  `date_checkout2` date NOT NULL,
  `hotel2_id` int(11) NOT NULL,
  `nombre_nuit2` int(11) NOT NULL,
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

INSERT INTO `formules` (`id`, `package_id`, `nom`, `statut`, `duree_sejour`, `ville_depart_id`, `compagnie_aerienne_id`, `num_vol`, `airport_depart`, `heure_depart`, `destination`, `airport_destination`, `heure_arrivee`, `date_checkin1`, `date_checkout1`, `hotel1_id`, `nombre_nuit1`, `date_checkin2`, `date_checkout2`, `hotel2_id`, `nombre_nuit2`, `prix_chambre_quadruple`, `prix_chambre_triple`, `prix_chambre_double`, `prix_chambre_single`, `child_discount`, `prix_bebe`, `prix_chambre_quadruple_promo`, `prix_chambre_triple_promo`, `prix_chambre_double_promo`, `prix_chambre_single_promo`, `description`, `type_id`) VALUES
(9, 1, '', 'activé', '18 jours', 2, 1, '153', 'Carthage', '2024-06-12 22:24:00', 'Madinah', 'JDK', '2024-06-05 22:24:00', '2024-06-07', '2024-06-07', 4, 20, '2024-06-14', '2024-06-06', 5, 20, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, '<p>test</p>\r\n', 3),
(10, 1, '', 'activé', '15 jours', 2, 1, '153', 'Carthage', '2024-06-06 23:43:00', 'Madinah', 'JDK', '2024-06-18 23:43:00', '2024-06-14', '2024-06-20', 4, 1000, '2024-06-08', '2024-06-13', 5, 1000, 1500.00, 1500.00, 1500.00, 1500.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, '<p>17 OCTOBRE 2024</p>\r\n\r\n<p>D&eacute;part</p>\r\n\r\n<p><strong>PARIS &gt; M&eacute;dine</strong><br />\r\nVol r&eacute;gulier avec la compagnie a&eacute;rienne Royal Jordanian.</p>\r\n\r\n<p>17 OCTOBRE 2024</p>\r\n\r\n<p>Transfert</p>\r\n\r\n<p><strong>A&eacute;roport &gt; H&ocirc;tel</strong><br />\r\nTransfert de l&rsquo;a&eacute;roport vers l&rsquo;h&ocirc;tel en bus confort climatis&eacute;.</p>\r\n\r\n<p>17 OCTOBRE 2024</p>\r\n\r\n<p>Arriv&eacute;e &agrave; l&rsquo;h&ocirc;tel</p>\r\n\r\n<p><strong>BOSPHORUS WAQF AL SAFI 4*</strong><br />\r\nLa premi&egrave;re partie du s&eacute;jour se d&eacute;roulera dans un h&ocirc;tel 4 &eacute;toiles de renomm&eacute;e internationale, situ&eacute; en face du Masjid An&rsquo;Nabawi. Vous y s&eacute;journerez durant 5 nuits.</p>\r\n\r\n<p>18 OCTOBRE 2024</p>\r\n\r\n<p>Visite</p>\r\n\r\n<p><strong>VISITE RELIGIEUSE &Agrave; M&Eacute;DINE</strong><br />\r\nEn d&eacute;but de matin&eacute;e, vous effectuerez une visite religieuse &agrave; Madinah. Vous effectuerez une visite aux Martyrs de Ohoud ainsi que votre pri&egrave;re dans la mosqu&eacute;e de Qoba. Vous serez conduit en bus climatis&eacute;.</p>\r\n\r\n<p>18 OCTOBRE 2024</p>\r\n\r\n<p>Transfert</p>\r\n\r\n<p><strong>M&Eacute;DINE MAKKAH</strong><br />\r\nLe transfert de M&eacute;dine &agrave; Makkah se fera en d&eacute;but de matin&eacute;e dans un bus climatis&eacute;. La distance parcourue est de 480 km environ.</p>\r\n\r\n<p>18 OCTOBRE 2024</p>\r\n\r\n<p>Arriv&eacute;e &agrave; l&rsquo;h&ocirc;tel</p>\r\n\r\n<p><strong>SHERATON 5*</strong><br />\r\nS&eacute;jour dans un h&ocirc;tel 5 &eacute;toiles situ&eacute; en Face du Haram. Vous passerez 5 nuits dans l&rsquo;un des meilleurs h&ocirc;tels de la Mecque.</p>\r\n\r\n<p>19 OCTOBRE 2024</p>\r\n\r\n<p>Omra</p>\r\n\r\n<p><strong>Jour de la OMRA</strong><br />\r\nR&eacute;union &agrave; la r&eacute;ception de l&rsquo;h&ocirc;tel avant d&rsquo;accomplir les rites en groupe. D&eacute;part de l&rsquo;h&ocirc;tel &agrave; 13h00 apr&egrave;s avoir effectu&eacute; ses grandes ablutions et mis son &laquo; ihr&acirc;m &raquo;. Arr&ecirc;t dans le Miq&acirc;t &laquo; Abyar Ali &raquo; pour entrer dans l&rsquo;&eacute;tat de sacralisation et commencer la &laquo; Talbiyah &raquo;.</p>\r\n\r\n<p>20 OCTOBRE 2024</p>\r\n\r\n<p>Visite</p>\r\n\r\n<p><strong>Visite d&eacute;couverte</strong><br />\r\nVisite religieuse &agrave; Makkah en d&eacute;but de matin&eacute;e. Trajet en bus climatis&eacute;. Parcours du Hajj et quelques sites historiques.</p>\r\n\r\n<p>21 OCTOBRE 2024</p>\r\n\r\n<p>Transfert</p>\r\n\r\n<p><strong>MAKKAH JEDDAH</strong><br />\r\nTransfert de l&rsquo;h&ocirc;tel vers l&rsquo;a&eacute;roport de Jeddah en bus confort climatis&eacute;.</p>\r\n\r\n<p>21 MAI 2024</p>\r\n\r\n<p>Retour</p>\r\n\r\n<p><strong>JEDDAH &gt; PARIS</strong><br />\r\nVol r&eacute;gulier avec la compagnie a&eacute;rienne Saudi Airlines.</p>\r\n', 2),
(11, 1, '', 'activé', '15 jours', 2, 1, '153', 'Carthage', '2024-06-07 23:50:00', 'Madinah', 'JDK', '2024-06-13 23:50:00', '2024-06-14', '2024-06-13', 4, 15, '2024-06-14', '2024-06-14', 5, 15, 1500.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, 1000.00, '<p>test</p>\r\n', 2),
(13, 3, '', 'activé', '15', 3, 1, '9800', 'LMC', '2024-06-14 15:57:00', 'Madinah', 'JDK', '2024-06-14 15:57:00', '2024-06-14', '2024-06-14', 4, 5, '2024-06-18', '2024-06-20', 5, 5, 2000.00, 2000.00, 2000.00, 2000.00, 500.00, 500.00, 1500.00, 1500.00, 1500.00, 1500.00, '<p><strong>Day1 : visite xyz</strong></p>\r\n\r\n<p><strong>Day2 : viste xyz1</strong></p>\r\n', 5),
(14, 4, '', 'activé', '15 jours', 3, 1, '5321X', 'LMC', '2024-06-29 19:50:00', 'Madinah', 'JDK', '2024-08-30 19:50:00', '2024-06-21', '2024-06-28', 4, 8, '2024-06-28', '2024-08-02', 5, 8, 1680.00, 1900.00, 2500.00, 2800.00, 150.00, 500.00, 0.00, 0.00, 0.00, 1500.00, '<p>TEST</p>\r\n', 6),
(15, 6, '', 'activé', '15 jours', 2, 1, '153', 'Carthage', '2024-07-05 16:10:00', 'Madinah', 'JDK', '2024-07-12 16:10:00', '2024-07-05', '2024-07-06', 4, 5, '2024-07-12', '2024-07-12', 5, 5, 1990.00, 2090.00, 2190.00, 2490.00, 350.00, 150.00, 0.00, 0.00, 0.00, 0.00, '<p>test</p>\r\n', 7);

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `etoiles` int(11) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `pension` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `monument` varchar(255) NOT NULL,
  `image_gallery` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`id`, `nom`, `etoiles`, `ville`, `pension`, `details`, `monument`, `image_gallery`) VALUES
(4, 'Hotels Hilton Al Madinah', 5, 'Madina', 'Pension Complète', 'hotel 5*', 'en face de haram', NULL),
(5, 'Hotel Seabel Alhambra', 5, 'Makkah', 'Pension Complète', 'Hotel 5*', 'En Face de haram', NULL);

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
(24, 5, 'uploads/23-1.png');

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
(15, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(16, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(17, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(18, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(19, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(20, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(21, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(22, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(23, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(24, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(25, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(26, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(27, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(28, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(29, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(30, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(31, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(32, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(33, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(34, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, NULL, 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(35, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(36, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(37, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(38, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(39, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(40, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(41, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(42, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(43, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(44, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(45, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(46, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(47, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(48, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(49, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(50, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(51, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '13/06/2024', 'Tunis'),
(52, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(53, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(54, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(55, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(56, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(57, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(58, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 2, 2, 5, 2, 0, 0, '0', 7450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(59, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(60, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(61, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(62, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(63, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5360.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(64, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5360.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(65, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(66, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(67, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(68, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5360.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(69, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5360.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(70, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5360.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(71, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(72, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(73, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(74, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(75, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(76, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(77, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(78, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 0, 0, 5, 0, 0, 0, '0', 5450.00, 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(79, 'amin hcinet', '04 RUE OTHMAN KAAK', '+3394141684', 'Aminhcinet1@gmail.com', 5, 3, 2, 5, 1, 1, 1, '0', 16240.00, 'Paris', 'Formule Express', '12/07/2024', 'Tunis');

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
(7, 'Formule Express', 6);

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
(1, 'admin', '$2y$10$1myYw6JYxVGRay/AKK00aOz.nJ24N4B/D99X0Hh7maREUQ6ymKfPK', 'amin@digietab.tn');

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
  ADD KEY `ville_depart_id` (`ville_depart_id`),
  ADD KEY `compagnie_aerienne_id` (`compagnie_aerienne_id`),
  ADD KEY `hotel1_id` (`hotel1_id`),
  ADD KEY `hotel2_id` (`hotel2_id`),
  ADD KEY `type_id` (`type_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `omra_packages`
--
ALTER TABLE `omra_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ville_depart`
--
ALTER TABLE `ville_depart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formules`
--
ALTER TABLE `formules`
  ADD CONSTRAINT `formules_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `omra_packages` (`id`),
  ADD CONSTRAINT `formules_ibfk_2` FOREIGN KEY (`ville_depart_id`) REFERENCES `ville_depart` (`id`),
  ADD CONSTRAINT `formules_ibfk_3` FOREIGN KEY (`compagnie_aerienne_id`) REFERENCES `compagnies_aeriennes` (`id`),
  ADD CONSTRAINT `formules_ibfk_4` FOREIGN KEY (`hotel1_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `formules_ibfk_5` FOREIGN KEY (`hotel2_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `formules_ibfk_6` FOREIGN KEY (`type_id`) REFERENCES `type_formule_omra` (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
