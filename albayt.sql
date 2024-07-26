-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 juil. 2024 à 17:21
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
-- Structure de la table `airports`
--

CREATE TABLE `airports` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `abrv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `airports`
--

INSERT INTO `airports` (`id`, `nom`, `abrv`) VALUES
(2, 'Aéroport Tunis Carthatge', 'CTR'),
(4, 'Aéroport Monastir', 'MNR'),
(5, 'Aéroport Paris', 'PRS'),
(7, 'Airport Lyon', 'ALY');

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
  `date_retour` date DEFAULT NULL,
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
  `type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `programs_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`programs_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formules`
--

INSERT INTO `formules` (`id`, `package_id`, `date_depart`, `date_retour`, `statut`, `duree_sejour`, `prix_chambre_quadruple`, `prix_chambre_triple`, `prix_chambre_double`, `prix_chambre_single`, `child_discount`, `prix_bebe`, `prix_chambre_quadruple_promo`, `prix_chambre_triple_promo`, `prix_chambre_double_promo`, `prix_chambre_single_promo`, `type_id`, `created_at`, `programs_id`) VALUES
(44, 4, '2024-07-19', '2024-07-12', 'activé', 'Perferendis nostrud ', '93.00', '15.00', '61.00', '46.00', '53.00', '44.00', '94.00', '1.00', '67.00', '22.00', 6, '2024-07-25 20:45:17', '[1]'),
(60, 3, '1994-12-28', '2024-07-24', 'activé', 'Atque et molestiae e', '76.00', '88.00', '61.00', '58.00', '19.00', '11.00', '40.00', '89.00', '41.00', '74.00', 5, '2024-07-25 20:45:25', '[2,4]'),
(71, 4, '1970-04-01', '2024-07-16', 'désactivé', 'Non nesciunt quasi ', '83.00', '8.00', '76.00', '23.00', '1.00', '78.00', '88.00', '25.00', '29.00', '3.00', 6, '2024-07-25 20:45:30', '[2,4]'),
(320, 40, '2024-07-11', '2024-07-16', 'activé', 'Numquam temporibus q', '10.00', '36.00', '70.00', '14.00', '42.00', '45.00', '82.00', '73.00', '18.00', '79.00', 172, '2024-07-26 15:19:33', '[1,4]'),
(332, 43, '2024-07-03', '2024-07-19', 'activé', 'In labore et mollitis', '24.00', '12.00', '24.00', '57.00', '44.00', '59.00', '78.00', '93.00', '59.00', '28.00', 179, '2024-07-25 20:46:32', '[2]'),
(334, 43, '1986-08-05', '2024-07-16', 'activé', 'Magni libero aut s', '56.00', '8.00', '85.00', '24.00', '56.00', '11.00', '54.00', '7.00', '44.00', '26.00', 179, '2024-07-25 20:46:37', '[2,5]'),
(335, 5, '1994-10-17', '2024-07-16', 'désactivé', '15', '96.00', '10.00', '23.00', '4.00', '20.00', '56.00', '58.00', '4.00', '81.00', '6.00', 10, '2024-07-25 20:44:58', '[1,2,4,5]'),
(336, 43, '1992-05-02', '2024-07-27', 'activé', '10', '72.00', '29.00', '8.00', '67.00', '12.00', '46.00', '89.00', '95.00', '31.00', '44.00', 179, '2024-07-25 20:46:25', '[4,5]'),
(337, 4, '1994-08-07', '2024-07-19', 'activé', 'Voluptas placeat qu', '90.00', '90.00', '50.00', '18.00', '23.00', '14.00', '30.00', '6.00', '9.00', '63.00', 6, '2024-07-25 20:45:09', '[2]'),
(367, 52, '1986-08-05', '2024-07-12', 'désactivé', 'Magni libero aut s', '56.00', '8.00', '85.00', '24.00', '56.00', '11.00', '54.00', '7.00', '44.00', '26.00', 185, '2024-07-25 20:46:43', '[2,5]'),
(373, 1, '1986-08-05', '2024-07-26', 'activé', 'Magni libero aut con', '56.00', '8.00', '85.00', '24.00', '56.00', '11.00', '54.00', '7.00', '44.00', '26.00', 3, '2024-07-25 20:52:13', '[4]'),
(374, 52, '2024-08-10', '2024-08-31', 'activé', '21', '4.00', '59.00', '89.00', '64.00', '76.00', '12.00', '14.00', '55.00', '28.00', '74.00', 185, '2024-07-24 11:38:14', '[1,2,5,6,9,10,11,12,14]'),
(411, 5, '2004-11-06', '2011-07-02', 'activé', 'Cillum reiciendis mi', '4.00', '1.00', '74.00', '14.00', '1.00', '64.00', '97.00', '89.00', '61.00', '27.00', 10, '2024-07-25 19:52:44', '[1,2,8,9,10,14,15]'),
(421, 1, '1975-11-24', '1976-11-15', 'activé', 'Impedit libero corr', '71.00', '99.00', '61.00', '69.00', '21.00', '62.00', '13.00', '19.00', '18.00', '73.00', 2, '2024-07-26 11:23:07', '[\"1\",\"2\",\"4\",\"7\",\"8\",\"10\",\"13\",\"14\",\"15\"]'),
(422, 5, '2018-06-01', '2003-12-04', 'activé', 'Quae enim deserunt c', '87.00', '71.00', '54.00', '76.00', '32.00', '30.00', '55.00', '41.00', '43.00', '17.00', 10, '2024-07-26 11:24:17', '[\"1\",\"6\",\"7\",\"9\",\"14\",\"15\"]'),
(423, 34, '2013-03-21', '2009-10-20', 'désactivé', 'Magna voluptas nihil', '41.00', '99.00', '50.00', '19.00', '22.00', '37.00', '11.00', '51.00', '51.00', '1.00', 160, '2024-07-26 11:25:48', '[\"2\",\"5\",\"6\",\"8\",\"10\",\"11\",\"13\",\"15\"]'),
(430, 52, '1995-01-27', '2009-09-10', 'activé', 'Quia voluptatem Nih', '29.00', '33.00', '18.00', '98.00', '97.00', '21.00', '57.00', '19.00', '14.00', '7.00', 185, '2024-07-26 11:43:55', '[\"4\",\"6\",\"7\",\"11\",\"13\",\"14\",\"15\"]'),
(431, 43, '2011-03-03', '1981-06-12', 'activé', 'Est odit blanditiis ', '100.00', '13.00', '75.00', '78.00', '50.00', '79.00', '85.00', '67.00', '58.00', '42.00', 179, '2024-07-26 11:44:15', '[\"2\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"11\",\"12\",\"13\",\"14\",\"15\"]'),
(432, 5, '1976-11-03', '2018-03-01', 'activé', 'Enim sapiente perfer', '53.00', '49.00', '50.00', '7.00', '83.00', '3.00', '43.00', '98.00', '54.00', '63.00', 10, '2024-07-26 14:49:28', '[1,2,5,10,13]'),
(434, 5, '2001-03-08', '2003-12-20', 'activé', 'Qui aut vel culpa do', '85.00', '60.00', '91.00', '15.00', '87.00', '99.00', '21.00', '29.00', '77.00', '95.00', 10, '2024-07-26 14:49:57', '[\"1\",\"2\",\"5\",\"6\",\"8\",\"9\",\"10\",\"12\",\"13\",\"14\",\"15\"]'),
(435, 43, '2021-07-03', '1972-12-13', 'activé', 'Magni sed voluptatib', '43.00', '82.00', '57.00', '95.00', '78.00', '7.00', '7.00', '18.00', '13.00', '70.00', 179, '2024-07-26 14:50:22', '[\"7\",\"8\",\"13\"]'),
(436, 1, '2022-07-14', '2006-09-26', 'désactivé', 'Veniam repellendus', '29.00', '12.00', '85.00', '44.00', '53.00', '22.00', '22.00', '51.00', '14.00', '55.00', 2, '2024-07-26 14:50:45', '[\"4\",\"5\",\"6\",\"9\",\"11\"]'),
(437, 43, '2023-05-14', '1999-07-27', 'désactivé', 'Neque duis qui sit e', '91.00', '79.00', '55.00', '24.00', '92.00', '25.00', '3.00', '55.00', '79.00', '37.00', 179, '2024-07-26 14:51:01', '[\"1\",\"5\",\"7\",\"10\",\"11\",\"13\",\"14\",\"15\"]'),
(438, 3, '2015-07-11', '1974-05-01', 'activé', 'Pariatur Iusto non ', '14.00', '26.00', '32.00', '74.00', '89.00', '78.00', '99.00', '53.00', '20.00', '83.00', 5, '2024-07-26 14:53:32', '[\"1\",\"6\",\"9\",\"11\",\"12\",\"13\",\"15\"]'),
(439, 43, '1971-02-27', '1990-04-13', 'désactivé', 'Qui quas aut laudant', '77.00', '99.00', '90.00', '91.00', '2.00', '69.00', '18.00', '92.00', '41.00', '73.00', 179, '2024-07-26 14:54:07', '[\"2\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"12\",\"15\"]'),
(440, 34, '2013-03-21', '2009-10-20', 'désactivé', 'Magna voluptas nihil', '41.00', '99.00', '50.00', '19.00', '22.00', '37.00', '11.00', '51.00', '51.00', '1.00', 160, '2024-07-26 15:17:14', '[\"2\",\"5\",\"6\",\"8\",\"10\",\"11\",\"13\",\"15\"]'),
(441, 40, '2024-07-11', '2024-07-16', 'désactivé', 'Numquam temporibus q', '10.00', '36.00', '70.00', '14.00', '42.00', '45.00', '82.00', '73.00', '18.00', '79.00', 173, '2024-07-26 15:19:18', '[1,4]');

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
(616, 374, 5, 'Sans pension', '1972-05-20', '1994-07-14', 8090),
(689, 411, 7, 'Pension Complète', '2014-10-10', '2004-08-27', 0),
(702, 335, 6, 'Pension Complète', '2003-10-22', '2015-02-04', 4123),
(703, 337, 7, 'Pension Complète', '1974-12-29', '2012-09-02', 13762),
(704, 44, 4, 'Pension Complète', '2024-07-18', '2024-07-30', 12),
(705, 60, 6, 'Sans pension', '1995-05-01', '1996-07-08', 434),
(706, 71, 4, 'Demi-pension', '1989-11-24', '2022-08-05', 11942),
(717, 336, 4, 'Demi-pension', '1988-08-05', '2008-09-25', 7356),
(718, 332, 4, 'Pension Complète', '1998-02-22', '2010-02-26', 4387),
(719, 332, 5, 'Sans pension', '1985-10-25', '2000-06-17', 5349),
(720, 332, 4, 'Demi-pension', '1983-09-27', '2005-09-29', 8038),
(721, 332, 4, 'Sans pension', '2024-07-24', '2024-08-08', 15),
(722, 332, 4, 'Pension Complète', '2024-07-24', '2024-07-31', 7),
(723, 332, 4, 'Demi-pension', '2024-07-25', '2024-07-26', 1),
(724, 334, 5, 'Demi-pension', '2009-03-10', '2018-03-13', 3290),
(725, 367, 5, 'Demi-pension', '2009-03-10', '2018-03-13', 3290),
(728, 373, 5, 'Sans pension', '2009-03-10', '2018-03-13', 3290),
(730, 421, 7, 'Sans pension', '2002-06-15', '1972-12-01', 0),
(731, 422, 6, 'Demi-pension', '1984-01-06', '1978-08-27', 0),
(732, 423, 4, 'Sans pension', '2024-04-18', '2009-08-20', 0),
(739, 430, 4, 'Sans pension', '1992-04-29', '1971-05-28', 0),
(740, 431, 6, 'Pension Complète', '2023-01-27', '2006-04-18', 0),
(743, 432, 6, 'Demi-pension', '2008-06-16', '2016-08-31', 2998),
(744, 434, 4, 'Demi-pension', '1997-08-07', '1983-08-19', 0),
(745, 435, 4, 'Demi-pension', '2005-05-27', '1975-02-04', 0),
(746, 436, 6, 'Demi-pension', '2017-06-27', '1974-09-17', 0),
(747, 437, 6, 'Sans pension', '2007-06-08', '2005-07-19', 0),
(748, 438, 7, 'Sans pension', '2013-08-28', '1999-08-01', 0),
(749, 439, 5, 'Sans pension', '2022-10-30', '2022-10-18', 0),
(750, 440, 4, 'Sans pension', '2024-04-18', '2009-08-20', 0),
(751, 441, 4, 'Sans pension', '1975-01-22', '2017-02-26', 15376),
(752, 441, 4, 'Sans pension', '2024-07-01', '2024-07-16', 15),
(753, 441, 4, 'Sans pension', '2024-07-01', '2024-07-21', 20),
(754, 320, 4, 'Sans pension', '1975-01-22', '2017-02-26', 15376),
(755, 320, 4, 'Sans pension', '2024-07-01', '2024-07-16', 15),
(756, 320, 4, 'Sans pension', '2024-07-01', '2024-07-21', 20);

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
(6, 'star', 4, 'medina', 'nice', '4', NULL),
(7, 'ten2 sas', 10, 'jeddah10', '10good', '10', NULL);

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
(25, 6, 'uploads/pexels-pixabay-413960.jpg'),
(26, 7, 'uploads/669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg');

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
(1, 'Paris', 'OMRA OCTOBRE 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/669fe5c6b9e4a8.53136682_669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg'),
(3, 'Lyon', 'OMRA Mai 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a01b222e4d01.22409944_66a01aac62cd57.92597814_669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg'),
(4, 'Toulouse', 'OMRA Avril 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a01b3076ce97.70597850_66a01aac62cd57.92597814_669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg'),
(5, 'Nantes', 'OMRA Mai Janvier Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a01aac62cd57.92597814_669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg'),
(34, 'Nice', 'test', 'uploads/66a01a3f2fc514.55483552_unrecognizable-man-working-in-factory-with-machine-2024-01-23-16-14-19-utc.jpg'),
(40, 'Marseille', 'France', 'uploads/66a01a4e075ab5.80796072_skilled-worker-is-repairing-metal-part-using-machi-2023-11-27-04-50-52-utc.jpg'),
(43, 'Lille', 'OMRA OCTOBRE 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a01b0b3dab49.97274621_66a01aac62cd57.92597814_669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg'),
(52, 'Brest', 'OMRA OCTOBRE 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a01a8a88d901.53742994_669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `programs`
--

INSERT INTO `programs` (`id`, `nom`, `description`, `photo`) VALUES
(1, 'VIP 1', 'very improtant  1', 'uploads/669a885398bea0.07711220_omra-octobre-formule-confort-16-2 (1).jpg'),
(2, 'VIP 2', 'very improtant people 2', 'uploads/669a87f3839774.27077780_omra-octobre-formule-confort-17-2.jpg'),
(4, 'VIP 3', 'Very Important People 3', 'uploads/unrecognizable-man-working-in-factory-with-machine-2024-01-23-16-14-19-utc.jpg'),
(5, 'VIP 4', 'VERY IMPORT', 'uploads/bc3bc6f8ad96.jpg'),
(6, 'VIP 5', 'DFB', ''),
(7, 'VIP 6', '', ''),
(8, 'VIP 7', '', ''),
(9, 'VIP 8', '', ''),
(10, 'VIP 9', '', ''),
(11, 'VIP 10', 'FGG', ''),
(12, 'VIP 11', 'WSFV', ''),
(13, 'VIP 12', '', ''),
(14, 'VIP 13', '', ''),
(15, 'VIP 14', '', '');

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
(8, 'Formule Simple', 3),
(9, 'Formule Simple', 4),
(10, 'Formule Simple', 5),
(11, 'Formule Confort', 5),
(160, 'Formule Simple', 34),
(161, 'Formule Express', 34),
(172, 'Formule Express', 40),
(173, 'Formule Simple', 40),
(174, 'Premium', 40),
(176, 'Premium VIP', 40),
(179, 'Formule Confrot', 43),
(185, 'Formule Confrot', 52),
(186, 'VIP 1', 52);

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
(11, 'Paris', 'activé'),
(12, 'Monastir', 'activé'),
(13, 'Lyon', 'activé');

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id` int(11) NOT NULL,
  `formule_id` int(11) NOT NULL,
  `ville_depart_id` varchar(255) NOT NULL,
  `ville_destination_id` int(11) NOT NULL,
  `airport_depart_id` int(11) NOT NULL,
  `airport_destination_id` int(11) NOT NULL,
  `compagnie_aerienne_id` int(11) NOT NULL,
  `num_vol` varchar(255) NOT NULL,
  `heure_depart` datetime NOT NULL,
  `heure_arrivee` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vols`
--

INSERT INTO `vols` (`id`, `formule_id`, `ville_depart_id`, `ville_destination_id`, `airport_depart_id`, `airport_destination_id`, `compagnie_aerienne_id`, `num_vol`, `heure_depart`, `heure_arrivee`) VALUES
(846, 374, '11', 11, 2, 5, 1, 'Dolores aute sit aut', '1978-02-18 20:43:00', '2011-11-25 21:05:00'),
(923, 411, '13', 13, 7, 7, 1, 'v1', '1990-08-28 04:17:00', '2005-05-03 06:59:00'),
(924, 411, '2', 2, 2, 2, 1, 'V2', '2024-07-30 15:24:00', '2024-08-01 15:24:00'),
(946, 335, '11', 12, 2, 2, 1, 'Tempor qui nemo id q', '2007-05-08 17:26:00', '2004-08-05 00:54:00'),
(947, 337, '12', 2, 5, 7, 1, 'Magni doloremque qui', '2005-03-06 22:08:00', '2012-06-01 08:54:00'),
(948, 44, '2', 12, 7, 2, 1, 'vol n1d', '1986-06-24 14:28:00', '1995-09-27 15:28:00'),
(949, 44, '2', 2, 5, 2, 1, 'vol n3d', '2024-07-16 13:43:00', '2024-07-22 13:43:00'),
(950, 60, '11', 2, 2, 7, 1, 'Vel numquam ea et nu', '2002-05-27 11:15:00', '2019-01-07 18:10:00'),
(951, 71, '12', 12, 5, 2, 1, 'Vel sed et est nesc', '1998-10-01 20:55:00', '2003-02-25 04:02:00'),
(952, 336, '13', 2, 7, 4, 1, 'Voluptatibus culpa b', '1981-03-09 10:12:00', '2021-02-03 14:26:00'),
(953, 332, '11', 12, 4, 7, 1, 'V1', '1998-12-23 05:17:00', '1985-10-14 17:24:00'),
(954, 332, '2', 2, 2, 5, 1, 'V2', '2022-03-01 17:36:00', '2014-05-25 13:33:00'),
(955, 332, '12', 12, 2, 2, 1, 'V3', '2003-01-21 08:08:00', '2021-11-12 00:50:00'),
(956, 332, '2', 2, 4, 5, 1, 'V4', '2024-07-17 15:26:00', '2024-07-11 15:26:00'),
(957, 332, '2', 12, 5, 5, 1, 'V5', '2024-07-23 15:27:00', '2024-08-02 15:27:00'),
(958, 332, '2', 2, 7, 7, 1, 'V6', '2024-07-09 15:27:00', '2024-07-17 15:27:00'),
(959, 334, '13', 12, 5, 2, 1, 'Laudantium debitis ', '2003-08-15 18:26:00', '1986-10-25 14:59:00'),
(960, 334, '2', 2, 7, 4, 1, 'Autem non magnam ape', '1987-05-07 14:42:00', '1981-09-19 22:19:00'),
(961, 334, '11', 12, 2, 7, 1, 'vol n12', '2024-07-22 13:18:00', '2024-07-19 13:18:00'),
(962, 367, '13', 11, 4, 4, 1, 'Laudantium debitis ', '2003-08-15 18:26:00', '1986-10-25 14:59:00'),
(963, 367, '12', 13, 7, 2, 1, 'Autem non magnam ape', '1987-05-07 14:42:00', '1981-09-19 22:19:00'),
(964, 367, '2', 2, 5, 4, 1, 'vol n12', '2024-07-22 13:18:00', '2024-07-19 13:18:00'),
(971, 373, '2', 11, 4, 4, 1, 'Laudantium debitis ', '2003-08-15 18:26:00', '1986-10-25 14:59:00'),
(972, 373, '12', 11, 5, 4, 1, 'Autem non magnam ape', '1987-05-07 14:42:00', '1981-09-19 22:19:00'),
(973, 373, '11', 11, 4, 4, 1, 'vol n12', '2024-07-22 13:18:00', '2024-07-19 13:18:00'),
(977, 421, '12', 11, 7, 2, 1, 'Soluta sit quia magn', '1982-01-06 06:27:00', '1997-02-23 20:22:00'),
(978, 422, '13', 13, 5, 5, 1, 'Quidem sint duis cup', '2019-10-25 16:36:00', '2002-07-26 19:45:00'),
(979, 423, '13', 2, 7, 4, 1, 'Quia quos minima qua', '2023-11-05 05:36:00', '2010-02-21 22:56:00'),
(986, 430, '12', 13, 2, 4, 1, 'Similique quibusdam ', '1979-09-08 15:12:00', '1984-01-16 20:31:00'),
(987, 431, '11', 13, 4, 2, 1, 'Accusantium excepteu', '2015-12-05 22:33:00', '1971-11-26 16:34:00'),
(990, 432, '12', 12, 5, 2, 1, 'Recusandae Mollitia', '2023-10-04 06:53:00', '1975-01-15 11:56:00'),
(991, 434, '2', 13, 7, 2, 1, 'Nulla est velit sit ', '2006-11-25 05:12:00', '2011-11-09 03:53:00'),
(992, 435, '13', 11, 2, 7, 1, 'Et proident sit qu', '1971-06-21 07:09:00', '1997-10-12 01:43:00'),
(993, 436, '13', 13, 2, 7, 1, 'Doloremque in labore', '1987-07-21 02:22:00', '2022-10-11 00:42:00'),
(994, 437, '11', 13, 5, 5, 1, 'Praesentium non ut q', '1984-07-09 20:29:00', '1978-09-21 19:14:00'),
(995, 438, '13', 12, 2, 5, 1, 'Adipisci dolorem nih', '1982-10-13 14:42:00', '2014-11-04 21:52:00'),
(996, 439, '11', 2, 2, 4, 1, 'Quae ut voluptates e', '2010-01-24 23:18:00', '1982-10-21 11:36:00'),
(997, 440, '13', 2, 7, 4, 1, 'Quia quos minima qua', '2023-11-05 05:36:00', '2010-02-21 22:56:00'),
(998, 441, '2', 2, 4, 5, 1, 'Accusamus iusto cons', '2002-08-19 00:25:00', '2011-02-23 20:43:00'),
(999, 320, '2', 2, 4, 5, 1, 'Accusamus iusto cons', '2002-08-19 00:25:00', '2011-02-23 20:43:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `programs`
--
ALTER TABLE `programs`
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
-- AUTO_INCREMENT pour la table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `compagnies_aeriennes`
--
ALTER TABLE `compagnies_aeriennes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `formules`
--
ALTER TABLE `formules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=757;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `omra_packages`
--
ALTER TABLE `omra_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ville_depart`
--
ALTER TABLE `ville_depart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

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
