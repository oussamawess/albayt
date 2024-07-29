-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 juil. 2024 à 19:45
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
(2, 'Aéroport Toulouse', 'TLS'),
(4, 'Aéroport Nantes', 'NTE'),
(5, 'Aéroport Paris', 'CDG'),
(7, 'Aéroport Lyon', 'LYS'),
(8, 'Aéroport Nice', 'NCE'),
(9, 'Aéroport Marseille', 'MRS'),
(10, 'Aéroport Lille', 'LIL'),
(11, 'Aéroport Brest', 'BES'),
(12, 'Aéroport Jeddah', 'JED'),
(13, 'Aéroport Medina', 'MED');

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
(6, 'Air France', 'uploads/Air_France_Logo.png'),
(7, 'TNU', 'uploads/tunis Air.png');

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
(2, 'Miel de Cédre', 'Miel Premium Quality', '90.00'),
(4, 'Miel a la Lavande', 'Le miel de lavande est très apprécié, notamment pour ses multiples bienfaits sur la santé humaine.', '80.00');

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
(373, 1, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 3, '2024-07-27 12:51:59', '[1,2,4,5,6,7]'),
(442, 1, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 2, '2024-07-27 13:44:33', '[1,4,5,7]'),
(443, 3, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 5, '2024-07-27 14:09:40', '[1,2,4,5,6,7]'),
(444, 3, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 8, '2024-07-27 14:09:47', '[1,2,4,5,6,7]'),
(445, 4, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 9, '2024-07-27 14:10:30', '[1,2,4,5,6,7]'),
(446, 4, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 6, '2024-07-27 14:10:53', '[1,2,4,5,6,7]'),
(447, 5, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 10, '2024-07-27 14:12:34', '[1,2,4,5,6,7]'),
(448, 5, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 11, '2024-07-27 14:13:59', '[1,2,4,5,6,7]'),
(449, 34, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 199, '2024-07-27 14:15:06', '[1,2,4,5,6,7]'),
(450, 34, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 160, '2024-07-27 14:14:48', '[1,2,4,5,6,7]'),
(451, 40, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 201, '2024-07-27 14:17:27', '[1,2,4,5,6,7]'),
(452, 40, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 173, '2024-07-27 14:15:40', '[1,4,5,7]'),
(453, 43, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 198, '2024-07-27 14:16:26', '[1,4,5,7]'),
(454, 43, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 179, '2024-07-27 14:16:16', '[1,2,4,5,6,7]'),
(455, 52, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 185, '2024-07-27 14:16:56', '[1,4,5,7]'),
(456, 52, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 186, '2024-07-27 14:17:38', '[1,2,4,5,6,7]'),
(457, 1, '1980-07-06', '2004-10-05', 'activé', 'Ea rem officiis quia', '20.00', '70.00', '18.00', '1.00', '13.00', '6.00', '83.00', '13.00', '89.00', '79.00', 2, '2024-07-29 17:44:09', '[1,2,4,6]');

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
(901, 456, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(902, 456, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(903, 456, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(904, 451, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(905, 451, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(906, 451, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(907, 455, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(908, 455, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(909, 455, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(913, 453, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(914, 453, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(915, 453, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(916, 454, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(917, 454, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(918, 454, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(919, 452, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(920, 452, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(921, 452, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(922, 449, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(923, 449, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(924, 449, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(925, 450, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(926, 450, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(927, 450, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(928, 448, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(929, 448, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(930, 448, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(931, 447, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(932, 447, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(933, 447, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(934, 446, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(935, 446, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(936, 446, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(937, 445, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(938, 445, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(939, 445, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(940, 444, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(941, 444, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(942, 444, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(943, 443, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(944, 443, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(945, 443, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(946, 442, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(947, 442, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(948, 442, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(955, 373, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(956, 373, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(957, 373, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(963, 457, 7, 'Petit déjeuner', '1980-01-03', '2011-07-22', 11523),
(964, 457, 7, 'Petit déjeuner', '1987-01-23', '2020-04-30', 12151),
(965, 457, 4, 'Petit déjeuner', '2019-11-09', '1983-06-13', 0),
(966, 457, 6, 'Sahour', '2000-09-14', '2014-05-17', 4993),
(967, 457, 6, 'Sahour', '1999-03-08', '2021-09-08', 8220),
(968, 457, 4, 'Petit déjeuner ensuite Iftar', '2024-07-03', '2024-07-10', 7);

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
(6, 'New Medinah Hotel', 4, 'Medina', 'Hôtels économiques à Medina les mieux notés', '3km', NULL),
(7, 'Pullan ZamZam Makkah ', 4, 'Makkah', 'Pullman ZamZam Makkah stands as a distinctive landmark in Makkah', '3.8km', NULL);

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
(5, 5, 'uploads/omra-octobre-formule-confort-17-2.jpg'),
(7, 4, 'uploads/omra-octobre-formule-confort-17-2.jpg'),
(26, 7, 'uploads/669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg'),
(32, 6, 'uploads/new medinah hotel.avif'),
(33, 7, 'uploads/pullman.jpg'),
(36, 6, 'uploads/66a021a294b131.21970312_66a01aac62cd57.92597814_669a8a491114c3.16856690_6668d725d1d067.74923834_omra-octobre-18.jpg'),
(37, 4, 'uploads/hotel1.jpg'),
(38, 4, 'uploads/hotel2.jpg'),
(39, 4, 'uploads/hotel3.jpg'),
(40, 4, 'uploads/hotel 4.jpg'),
(41, 5, 'uploads/hotel 4.jpg'),
(42, 5, 'uploads/hotel 4.jpg'),
(43, 5, 'uploads/hotel3.jpg'),
(44, 5, 'uploads/hotel2.jpg'),
(45, 5, 'uploads/hotel1.jpg'),
(46, 6, 'uploads/hotel3.jpg'),
(47, 6, 'uploads/hotel2.jpg'),
(48, 6, 'uploads/hotel 4.jpg'),
(49, 6, 'uploads/hotel1.jpg'),
(50, 7, 'uploads/hotel2.jpg'),
(51, 7, 'uploads/hotel 4.jpg'),
(52, 7, 'uploads/hotel1.jpg'),
(53, 7, 'uploads/hotel3.jpg');

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
(1, 'Paris', 'OMRA Paris 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a3fcb4ebfe66.54665327_paris.jpg'),
(3, 'Lyon', 'OMRA Lyon 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a3f8fe663379.73140357_lyon.jpg'),
(4, 'Toulouse', 'OMRA Toulouse 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a3f90a16e2e2.85837181_toulouse.jpg'),
(5, 'Nantes', 'OMRA Nantes Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a3f916137998.57914383_nantes.jpg'),
(34, 'Nice', 'OMRA Nice Vivez une expérience riche en émotion. et revenez le cœur apaisé.	', 'uploads/66a3f922899cd4.45974857_nice.jpg'),
(40, 'Marseille', 'OMRA Marseille Vivez une expérience riche en émotion. et revenez le cœur apaisé.	', 'uploads/66a3f92f534d85.06641322_marseille.jpg'),
(43, 'Lille', 'OMRA Lille 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a3f93eee9527.29928469_lille.jpg'),
(52, 'Brest', 'OMRA Brest 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a3f94ee55aa1.91613533_brest.jpg');

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
(1, 'Programme 1', '4 nuits à Médine\r\n4 nuits à Makkah ', 'uploads/66a4bf55583b21.59640469_makkah.jpg'),
(2, 'Programme 2', '5 nuits à Médine \r\n5 nuits à Makkah', 'uploads/66a4be20d6ab92.07264307_makkah2.jpg'),
(4, 'Programme 3', '6 nuits à Médine \r\n6 nuits à Makkah', 'uploads/66a4be3b6417f7.22039243_makkah3.jpeg'),
(5, 'Programme 4', '7 nuits à Médine \r\n7 nuits à Makkah', 'uploads/66a4be5878ccc4.21460091_medina1.jpg'),
(6, 'Programme 5', '8 nuits à Médine \r\n8 nuits à Makkah', 'uploads/66a4be9fd18697.71041625_medina2.jpg'),
(7, 'Programme 6', '9 nuits à Médine \r\n9 nuits à Makkah', 'uploads/66a4beb9348b42.27248419_medina3.jpg');

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
(80, 'Hadley Sanders', 'Aut ut aliqua Excep', '+33+1 (731) 644-7382', 'lyrybor@mailinator.com', 1, 2, 0, 1, 1, 1, 0, '0', '1270.00', 'Omra Octobre', 'Formule Confrot', '18/06/2024', 'Tunis'),
(81, 'wess', 'tunis', '+3342423524', 'ddfbdf', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(82, 'wess', 'tunis', '+3342423524', 'ddfbdf@gg.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(83, 'wess', 'tunis', '+3342423524', 'ddfbdf@gg.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(84, 'wess', 'tunis', '+33424235244444', 'ddfbdf@gg.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(85, 'wess', 'tunis', '+33123456789', 'ddfbdf@gg.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(86, 'wess sss', 'tunis', '+33123456789', 'ddfbdf@gg.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(87, 'wess sss', 'paris', '+33123456789', 'ddfbdf@gmail.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(88, 'wess sss', 'paris', '+3312 34 56 78 9', 'ddfbdf@gmail.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(89, 'wess sss', 'paris', '+3312 34 56 78 9', 'ddfbdf@gmail.com', 1, 1, 1, 0, 1, 0, 0, '0', '990.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(90, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(91, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(92, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(93, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(94, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(95, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(96, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL),
(97, 'wess wess', 'paris', '+33123456789', 'ss@gmail.com', 3, 2, 1, 3, 1, 1, 0, '0', '5500.00', 'Paris', 'Formule Simple', '31/08/2024', NULL);

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
(186, 'Formule Simple', 52),
(198, 'Formule Simple', 43),
(199, 'Formule Confort', 34),
(201, 'Formule Confrot', 40);

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
(2, 'Nantes', 'activé'),
(11, 'Paris', 'activé'),
(12, 'Toulouse', 'activé'),
(13, 'Lyon', 'activé'),
(14, 'Nice', 'activé'),
(15, 'Marseille', 'activé'),
(16, 'Lille', 'activé'),
(17, 'Brest', 'activé'),
(18, 'Makkah', 'activé'),
(19, 'Medina', 'activé'),
(20, 'Jeddah', 'activé');

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
(1232, 456, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1233, 456, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1234, 456, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1235, 456, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1236, 456, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1237, 451, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1238, 451, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1239, 451, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1240, 451, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1241, 451, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1242, 455, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1243, 455, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1244, 455, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1245, 455, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1246, 455, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1252, 453, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1253, 453, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1254, 453, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1255, 453, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1256, 453, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1257, 454, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1258, 454, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1259, 454, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1260, 454, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1261, 454, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1262, 452, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1263, 452, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1264, 452, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1265, 452, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1266, 452, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1267, 449, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1268, 449, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1269, 449, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1270, 449, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1271, 449, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1272, 450, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1273, 450, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1274, 450, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1275, 450, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1276, 450, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1277, 448, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1278, 448, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1279, 448, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1280, 448, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1281, 448, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1282, 447, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1283, 447, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1284, 447, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1285, 447, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1286, 447, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1287, 446, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1288, 446, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1289, 446, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1290, 446, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1291, 446, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1292, 445, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1293, 445, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1294, 445, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1295, 445, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1296, 445, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1297, 444, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1298, 444, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1299, 444, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1300, 444, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1301, 444, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1302, 443, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1303, 443, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1304, 443, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1305, 443, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1306, 443, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1307, 442, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1308, 442, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1309, 442, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1310, 442, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1311, 442, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1322, 373, '11', 2, 5, 4, 7, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1323, 373, '2', 20, 4, 12, 7, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1324, 373, '20', 19, 12, 13, 7, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1325, 373, '19', 2, 13, 4, 7, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1326, 373, '2', 11, 4, 5, 7, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1328, 457, '17', 19, 5, 10, 7, 'Aut ut sapiente ulla', '1992-03-02 11:17:00', '1986-11-22 22:39:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `compagnies_aeriennes`
--
ALTER TABLE `compagnies_aeriennes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `formules`
--
ALTER TABLE `formules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=458;

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=969;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ville_depart`
--
ALTER TABLE `ville_depart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `vols`
--
ALTER TABLE `vols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1329;

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
