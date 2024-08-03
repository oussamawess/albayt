-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 août 2024 à 18:17
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
  `programs_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`programs_id`)),
  `program_order` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`program_order`)),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formules`
--

INSERT INTO `formules` (`id`, `package_id`, `date_depart`, `date_retour`, `statut`, `duree_sejour`, `prix_chambre_quadruple`, `prix_chambre_triple`, `prix_chambre_double`, `prix_chambre_single`, `child_discount`, `prix_bebe`, `prix_chambre_quadruple_promo`, `prix_chambre_triple_promo`, `prix_chambre_double_promo`, `prix_chambre_single_promo`, `type_id`, `created_at`, `programs_id`, `program_order`, `description`) VALUES
(373, 1, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 3, '2024-08-03 16:15:36', '[1,4,5,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(442, 1, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 2, '2024-08-03 16:17:34', '[5,7,2,6]', '[5,7,2,4,6,1]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(443, 3, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 5, '2024-08-03 16:15:34', '[1,2,4,5,6,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(444, 3, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 8, '2024-08-03 16:14:58', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(445, 4, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 9, '2024-08-03 16:15:31', '[1,2,4,5,6,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(446, 4, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 6, '2024-08-03 16:14:55', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(447, 5, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 10, '2024-08-03 16:15:28', '[1,2,4,5,6,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(448, 5, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 11, '2024-08-03 16:14:52', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(449, 34, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 199, '2024-08-03 16:15:24', '[1,2,4,5,6,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(450, 34, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 160, '2024-08-03 16:14:49', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(451, 40, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 201, '2024-08-03 16:15:21', '[7,6,5,4,2,1]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(452, 40, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 173, '2024-08-03 16:14:45', '[1,4,5,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(453, 43, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 198, '2024-08-03 16:15:17', '[1,4,5,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(454, 43, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 179, '2024-08-03 16:14:41', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(455, 52, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 185, '2024-08-03 16:15:14', '[1,4,5,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(456, 52, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 186, '2024-08-03 16:14:36', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>'),
(471, 63, '2017-03-25', '1974-01-23', 'activé', '10', '32.00', '7.00', '36.00', '47.00', '31.00', '22.00', '18.00', '11.00', '68.00', '61.00', 222, '2024-08-01 15:47:40', '[1,7,6,2,5]', '[1,7,4,6,2,5]', '<p>hi</p>'),
(473, 63, '2017-03-25', '1974-01-23', 'activé', 'Praesentium saepe et', '32.00', '7.00', '36.00', '47.00', '31.00', '22.00', '18.00', '11.00', '68.00', '61.00', 222, '2024-08-01 15:19:12', '[1,6,2,7,5]', '[1,4,6,2,7,5]', '<p>hi</p>');

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
(996, 456, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(997, 456, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(998, 456, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1002, 443, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1003, 443, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1004, 443, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1005, 444, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1006, 444, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1007, 444, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1008, 445, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1009, 445, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1010, 445, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1011, 446, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1012, 446, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1013, 446, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1014, 447, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1015, 447, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1016, 447, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1017, 448, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1018, 448, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1019, 448, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1020, 450, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1021, 450, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1022, 450, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1023, 449, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1024, 449, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1025, 449, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1026, 452, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1027, 452, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1028, 452, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1029, 454, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1030, 454, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1031, 454, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1032, 453, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1033, 453, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1034, 453, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1035, 455, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1036, 455, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1037, 455, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1038, 451, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1039, 451, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1040, 451, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1094, 373, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1095, 373, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1096, 373, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1103, 473, 5, 'Sahour et Iftar', '2022-01-10', '1979-02-16', 0),
(1113, 471, 5, 'Sahour et Iftar', '2022-01-10', '1979-02-16', 0),
(1117, 442, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1118, 442, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1119, 442, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8);

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
(52, 'Brest', 'OMRA Brest 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a3f94ee55aa1.91613533_brest.jpg'),
(63, 'Brest order', 'OMRA Brest 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a3f94ee55aa1.91613533_brest.jpg'),
(64, 'Brest order', 'OMRA Brest 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a3f94ee55aa1.91613533_brest.jpg');

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
(2, 'formule confort', 1),
(3, 'formule essentielle', 1),
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
(201, 'Formule Confrot', 40),
(222, 'cnf', 63),
(224, 'cnf', 64);

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
(1366, 456, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1367, 456, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1368, 456, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1369, 456, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1370, 456, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1376, 443, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1377, 443, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1378, 443, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1379, 443, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1380, 443, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1381, 444, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1382, 444, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1383, 444, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1384, 444, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1385, 444, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1386, 445, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1387, 445, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1388, 445, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1389, 445, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1390, 445, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1391, 446, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1392, 446, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1393, 446, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1394, 446, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1395, 446, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1396, 447, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1397, 447, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1398, 447, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1399, 447, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1400, 447, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1401, 448, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1402, 448, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1403, 448, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1404, 448, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1405, 448, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1406, 450, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1407, 450, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1408, 450, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1409, 450, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1410, 450, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1411, 449, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1412, 449, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1413, 449, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1414, 449, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1415, 449, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1416, 452, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1417, 452, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1418, 452, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1419, 452, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1420, 452, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1421, 454, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1422, 454, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1423, 454, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1424, 454, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1425, 454, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1426, 453, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1427, 453, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1428, 453, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1429, 453, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1430, 453, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1431, 455, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1432, 455, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1433, 455, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1434, 455, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1435, 455, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1436, 451, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1437, 451, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1438, 451, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1439, 451, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1440, 451, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1489, 373, '11', 2, 5, 4, 7, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1490, 373, '2', 20, 4, 12, 7, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1491, 373, '20', 19, 12, 13, 7, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1492, 373, '19', 2, 13, 4, 7, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1493, 373, '2', 11, 4, 5, 7, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1500, 473, '20', 20, 10, 13, 6, 'Voluptatem Laboris ', '1979-09-01 00:54:00', '2007-05-05 17:51:00'),
(1510, 471, '20', 20, 10, 13, 6, 'Voluptatem Laboris ', '1979-09-01 00:54:00', '2007-05-05 17:51:00'),
(1514, 442, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1515, 442, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1516, 442, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1517, 442, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1518, 442, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `formules`
--
ALTER TABLE `formules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1120;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1519;

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
