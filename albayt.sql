-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 sep. 2024 à 19:46
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
-- Structure de la table `category_parent`
--

CREATE TABLE `category_parent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category_parent`
--

INSERT INTO `category_parent` (`id`, `nom`, `description`, `photo`) VALUES
(4, 'Hajj', 'a', 'uploads/planet 4.jpeg'),
(6, 'Omra', 'b', 'uploads/planet 3.jpeg'),
(7, 'Omra Ramadhan', 'c', 'uploads/flower 2.jpeg');

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
  `description` text NOT NULL,
  `s1t` varchar(255) NOT NULL,
  `s1d` text NOT NULL,
  `s2t` varchar(255) NOT NULL,
  `s2d` text NOT NULL,
  `s3t` varchar(255) NOT NULL,
  `s3d` text NOT NULL,
  `s4t` varchar(255) NOT NULL,
  `s4d` text NOT NULL,
  `s5t` varchar(255) NOT NULL,
  `s5d` text NOT NULL,
  `uploaded_file` varchar(255) DEFAULT NULL,
  `image_formule` varchar(255) DEFAULT NULL,
  `statut_vol` varchar(20) NOT NULL DEFAULT 'CONFIRMÉ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formules`
--

INSERT INTO `formules` (`id`, `package_id`, `date_depart`, `date_retour`, `statut`, `duree_sejour`, `prix_chambre_quadruple`, `prix_chambre_triple`, `prix_chambre_double`, `prix_chambre_single`, `child_discount`, `prix_bebe`, `prix_chambre_quadruple_promo`, `prix_chambre_triple_promo`, `prix_chambre_double_promo`, `prix_chambre_single_promo`, `type_id`, `created_at`, `programs_id`, `program_order`, `description`, `s1t`, `s1d`, `s2t`, `s2d`, `s3t`, `s3d`, `s4t`, `s4d`, `s5t`, `s5d`, `uploaded_file`, `image_formule`, `statut_vol`) VALUES
(373, 1, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '0.00', '1200.00', '900.00', '600.00', 3, '2024-09-15 18:24:58', '[1,7,4,5]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(442, 1, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 2, '2024-09-15 18:25:03', '[5,7,2,6]', '[5,7,2,4,6,1]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(443, 3, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 5, '2024-09-15 18:25:08', '[7,2,6,1,4,5]', '[7,2,6,1,4,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(444, 3, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 8, '2024-09-15 18:25:12', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(445, 4, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 9, '2024-09-15 18:25:16', '[1,2,4,5,6,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(446, 4, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 6, '2024-09-15 18:25:19', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(447, 5, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 10, '2024-09-15 18:25:22', '[1,2,4,5,6,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(448, 5, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 11, '2024-09-15 18:25:26', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(449, 34, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 199, '2024-09-24 13:28:01', '[1,7,4,6,2,5]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', 'files/66f2be61dd63e_July-to-December-2022-Calendar.pdf', 'uploads/2151457384.jpg', 'CONFIRMÉ'),
(450, 34, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 160, '2024-09-24 13:29:21', '[1,4,6,2,7,5]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', 'files/66f2beb1caf63_guide_anb.pdf', 'uploads/early-care-and-urgency-of-a-patient-with-symptoms-of-a-stroke-here-EHN4HN.jpg', 'CONFIRMÉ'),
(451, 40, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 201, '2024-09-15 18:25:36', '[7,6,5,4,2,1]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(452, 40, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 173, '2024-09-15 18:25:39', '[1,4,5,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(453, 43, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 198, '2024-09-15 18:25:42', '[1,4,5,7]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(454, 43, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 179, '2024-09-15 18:25:46', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(455, 52, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 185, '2024-09-15 18:25:49', '[1,7,4,5]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(456, 52, '2024-08-01', '2024-08-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 186, '2024-09-15 18:25:53', '[1,2,4,5,6,7]', '[1,4,6,2,7,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(479, 52, '2024-09-01', '2024-09-30', 'activé', '29', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 185, '2024-09-15 18:26:02', '[1,7,4,5]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(480, 52, '2024-09-01', '2024-09-30', 'activé', '29', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 186, '2024-09-15 18:26:05', '[1,7,4,5]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(481, 52, '2024-10-01', '2024-10-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 185, '2024-09-15 18:26:09', '[1,7,4,5]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(482, 52, '2024-10-01', '2024-10-31', 'activé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 186, '2024-09-15 18:26:12', '[1,7,4,5]', '[1,7,4,6,2,5]', '<p><strong>Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(483, 52, '2024-08-13', '2024-08-30', 'activé', '22', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 225, '2024-09-15 18:26:15', '[1,7,4,5]', '[1,7,4,6,2,5]', '<p><strong style=\"color: rgb(255, 0, 0);\">Vols</strong></p><p>Compagnies aériennes prestigieuses: Saudi Airlines, Turkish Airlines, Emirates, Qatar Airways, etc.</p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'CONFIRMÉ'),
(484, 5, '1982-01-02', '1973-06-09', 'activé', 'In laboriosam nihil', '27.00', '17.00', '84.00', '47.00', '48.00', '54.00', '32.00', '44.00', '9.00', '3.00', 10, '2024-09-15 18:26:18', '[\"1\",\"2\"]', '[1,2,4,5,6,7]', '<p>d1</p>', 't1', '', 't2', '<p>d2</p>', 't3', '<p>d3</p>', 't4', '<p>d4</p>', 't5', '<p>d5</p>', NULL, NULL, 'CONFIRMÉ'),
(485, 52, '2007-12-25', '1979-09-26', 'activé', 'Porro eos similique', '73.00', '75.00', '68.00', '61.00', '23.00', '38.00', '3.00', '24.00', '99.00', '49.00', 185, '2024-09-16 20:06:28', '[2,5,6]', '[1,2,4,5,6,7]', '<p>description  MOD</p>', 'title 1 MOD', '<p>description 1 MOD</p>', 'title 2 MOD', '<p>description 2 MOD</p>', 'title 3 MOD', '<p>description 3 MOD</p>', 'title 4 MOD', '<p>description 4 MOD</p>', 'title 5 MOD', '<p>description 5 MOD</p>', NULL, NULL, 'CONFIRMÉ'),
(486, 3, '1994-08-31', '2006-11-22', 'désactivé', 'Consequat Aspernatu', '86.00', '71.00', '31.00', '68.00', '72.00', '44.00', '4.00', '98.00', '11.00', '38.00', 5, '2024-09-16 14:23:38', '[2,4,7]', '[1,2,4,5,6,7]', '<p>DESCRIPTION</p>', 'title 1', '<p>SECTION 1</p>', 'title 2', '<p>SECTION 2</p>', 'title 3', '<p>SECTION 3</p>', 'title 4', '<p>SECTION 4</p>', 'title 5', '<p>SECTION 5</p>', NULL, NULL, 'CONFIRMÉ'),
(505, 3, '2024-09-14', '2024-09-19', 'activé', '5', '2.00', '1.00', '2.00', '2.00', '1.00', '1.00', '0.00', '0.00', '0.00', '0.00', 8, '2024-09-17 23:32:33', '[2,1]', '[2,1,4,5,6,7]', '<p>hola</p><p><br></p>', '-', '<p>+<br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', NULL, NULL, 'CONFIRMÉ'),
(506, 82, '2007-12-25', '1979-09-26', 'activé', 'Porro eos similique', '73.00', '75.00', '68.00', '61.00', '23.00', '38.00', '3.00', '24.00', '99.00', '49.00', 233, '2024-09-20 14:02:46', '[2,5,6]', '[1,2,4,5,6,7]', '<p>description  MOD</p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', NULL, NULL, 'EN ATTENTE'),
(508, 82, '2007-12-25', '1979-09-26', 'activé', 'Porro eos similique', '73.00', '75.00', '68.00', '61.00', '23.00', '38.00', '3.00', '24.00', '99.00', '49.00', 232, '2024-09-20 14:02:30', '[2,5,6]', '[1,2,4,5,6,7]', '<p>description  MOD</p>', 'title 1 MOD', '<p>description 1 MOD</p>', 'title 2 MOD', '<p>description 2 MOD</p>', 'title 3 MOD', '<p>description 3 MOD</p>', 'title 4 MOD', '<p>description 4 MOD</p>', 'title 5 MOD', '<p>description 5 MOD</p>', NULL, NULL, 'CONFIRMÉ'),
(526, 4, '1982-04-04', '1982-07-09', 'activé', 'Consequat In doloru', '100.00', '76.00', '55.00', '69.00', '43.00', '56.00', '13.00', '83.00', '26.00', '74.00', 6, '2024-09-19 11:39:21', '[\"2\",\"4\",\"6\"]', '[1,2,4,5,6,7]', '<p>Id, est odio reprehe.</p>', '', '<p>Id, inventore ut tem.</p>', '', '<p>Perferendis velit vo.</p>', '', '<p>Duis voluptatem, qui.</p>', '', '<p>Architecto aut nulla.</p>', '', '<p>Dolor necessitatibus.</p>', '', NULL, 'CONFIRMÉ'),
(527, 1, '1994-11-27', '1985-02-08', 'activé', 'Id nulla ut sed eaqu', '87.00', '90.00', '41.00', '1.00', '73.00', '65.00', '5.00', '15.00', '75.00', '86.00', 2, '2024-09-19 11:50:41', '[\"1\",\"6\"]', '[1,2,4,5,6,7]', '<p>Adipisicing dolorum .</p>', '', '<p>Irure et dolor perfe.</p>', '', '<p>Ad rerum et non est.</p>', '', '<p>Voluptatem. Vitae mi.</p>', '', '<p>Ex excepteur assumen.</p>', '', '<p>Rem dolorem eligendi.</p>', '', NULL, 'CONFIRMÉ'),
(528, 40, '1982-08-12', '1983-05-27', 'activé', 'Dicta molestiae aliq', '83.00', '57.00', '95.00', '67.00', '79.00', '39.00', '51.00', '56.00', '15.00', '61.00', 172, '2024-09-19 12:21:24', '[\"4\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p>Necessitatibus quos .</p>', '', '<p>Proident, excepturi .</p>', '', '<p>Irure aliquid accusa.</p>', '', '<p>Qui at voluptas fuga.</p>', '', '<p>Eum beatae ad provid.</p>', '', '<p>Iste ducimus, volupt.</p>', '', NULL, 'CONFIRMÉ'),
(529, 4, '1995-11-18', '1997-04-13', 'activé', 'Atque ut nostrud deb', '44.00', '97.00', '27.00', '59.00', '76.00', '38.00', '81.00', '52.00', '24.00', '12.00', 6, '2024-09-19 12:24:08', '[\"1\",\"5\"]', '[1,2,4,5,6,7]', '<p>Distinctio. Dolores .</p>', '', '<p>Accusamus eum volupt.</p>', '', '<p>Deserunt sed sint, e.</p>', '', '<p>Quia quis est, omnis.</p>', '', '<p>Consequatur, id veli.</p>', '', '<p>In praesentium unde .</p>', '', NULL, 'CONFIRMÉ'),
(530, 40, '2008-02-18', '2019-03-03', 'activé', 'Quas alias voluptate', '25.00', '91.00', '31.00', '32.00', '30.00', '72.00', '72.00', '94.00', '60.00', '17.00', 172, '2024-09-19 12:54:06', '[\"5\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p>Sit reiciendis maior.</p>', '', '<p>Voluptates amet, off.</p>', '', '<p>Est et corrupti, in .</p>', '', '<p>Nostrud consequatur.</p>', '', '<p>Temporibus qui velit.</p>', '', '<p>Dicta temporibus ab .</p>', '', NULL, 'CONFIRMÉ'),
(531, 1, '1980-03-29', '1970-09-20', 'activé', 'Quasi architecto deb', '32.00', '49.00', '68.00', '13.00', '96.00', '46.00', '25.00', '99.00', '33.00', '22.00', 2, '2024-09-19 13:00:32', '[\"1\",\"2\",\"4\",\"5\",\"6\"]', '[1,2,4,5,6,7]', '<p>Cillum eos, accusamu.</p>', '', '<p>Id, ad reprehenderit.</p>', '', '<p>Optio, ex et in inve.</p>', '', '<p>Tempora fugiat, ea d.</p>', '', '<p>Enim velit, reprehen.</p>', '', '<p>Voluptate cumque vol.</p>', '', NULL, 'CONFIRMÉ'),
(533, 43, '1983-09-09', '2008-05-17', 'activé', 'Excepteur sapiente d', '97.00', '77.00', '77.00', '11.00', '73.00', '95.00', '90.00', '90.00', '37.00', '49.00', 179, '2024-09-19 13:08:15', '[\"4\",\"5\",\"7\"]', '[1,2,4,5,6,7]', '<p>Dolor ratione quod f.</p>', '', '<p>Aut error quidem des.</p>', '', '<p>Cum eveniet, dolorum.</p>', '', '<p>Fuga. Fuga. Odit et .</p>', '', '<p>Ipsum, repudiandae l.</p>', '', '<p>Suscipit illo pariat.</p>', '', NULL, 'CONFIRMÉ'),
(534, 43, '2012-07-27', '1993-02-02', 'activé', 'Qui cumque error dol', '29.00', '59.00', '12.00', '44.00', '49.00', '98.00', '17.00', '93.00', '32.00', '48.00', 179, '2024-09-19 13:22:12', '[\"1\",\"2\",\"6\"]', '[1,2,4,5,6,7]', '<p>Officia voluptatem v.</p>', '', '<p>Sit, deleniti illum.</p>', '', '<p>Laborum. Velit quasi.</p>', '', '<p>Voluptatum sed fugit.</p>', '', '<p>Quae incidunt, tenet.</p>', '', '<p>Fugiat porro volupta.</p>', '', NULL, 'CONFIRMÉ'),
(535, 3, '2000-07-07', '1970-12-11', 'activé', 'In incididunt non au', '7.00', '73.00', '42.00', '25.00', '19.00', '88.00', '2.00', '14.00', '98.00', '48.00', 5, '2024-09-19 13:30:27', '[\"5\"]', '[1,2,4,5,6,7]', '<p>Vel non nostrud iust.</p>', '', '<p>Labore sint, ab prae.</p>', '', '<p>Delectus, eum aut qu.</p>', '', '<p>Ullam sunt, itaque o.</p>', '', '<p>Pariatur. Incidunt, .</p>', '', '<p>Quisquam repellendus.</p>', '', NULL, 'CONFIRMÉ'),
(536, 3, '2022-08-20', '1973-01-16', 'activé', 'Cillum adipisicing r', '66.00', '35.00', '19.00', '1.00', '77.00', '13.00', '91.00', '60.00', '49.00', '41.00', 5, '2024-09-19 13:38:56', '[\"2\",\"5\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p>Voluptas commodo cup.</p>', '', '<p>Distinctio. Itaque b.</p>', '', '<p>Magna eligendi cum n.</p>', '', '<p>Eveniet, ducimus, qu.</p>', '', '<p>Odio voluptatem, est.</p>', '', '<p>Quisquam non eligend.</p>', '', NULL, 'CONFIRMÉ'),
(537, 4, '2016-10-27', '2008-03-14', 'activé', 'Ullam inventore dolo', '52.00', '3.00', '25.00', '41.00', '66.00', '67.00', '76.00', '50.00', '7.00', '95.00', 6, '2024-09-19 13:49:52', '[\"1\",\"4\",\"5\",\"7\"]', '[1,2,4,5,6,7]', '<p>Cupiditate sit, dolo.</p>', '', '<p>Velit, nihil lorem o.</p>', '', '<p>Rerum in atque elit.</p>', '', '<p>Quis vel et mollit e.</p>', '', '<p>Qui eius mollit omni.</p>', '', '<p>Voluptatum inventore.</p>', '', NULL, 'CONFIRMÉ'),
(538, 3, '1995-01-18', '2010-02-16', 'activé', 'Atque dolor molestia', '20.00', '44.00', '4.00', '41.00', '82.00', '77.00', '98.00', '78.00', '33.00', '13.00', 5, '2024-09-19 13:51:54', '[\"4\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p>Beatae iusto pariatu.</p>', '', '<p>Velit cupidatat aliq.</p>', '', '<p>Pariatur. Officia eu.</p>', '', '<p>Dignissimos harum bl.</p>', '', '<p>Alias perspiciatis, .</p>', '', '<p>Sapiente excepteur i.</p>', '', NULL, 'CONFIRMÉ'),
(539, 5, '2014-08-03', '2014-10-24', 'activé', '20', '94.00', '73.00', '42.00', '99.00', '28.00', '64.00', '96.00', '8.00', '98.00', '31.00', 10, '2024-09-23 15:13:49', '[2,4,6]', '[1,2,4,5,6,7]', '<p class=\"ql-align-center\"><br></p><p class=\"ql-align-center\"><strong style=\"color: var( --e-global-color-51f7311 );\">Distance du Haram</strong></p><p class=\"ql-align-center\"><span style=\"color: var( --e-global-color-primary );\">Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</span></p><p class=\"ql-align-center\"><strong style=\"color: var( --e-global-color-51f7311 );\">Standing des hôtels</strong></p><p class=\"ql-align-center\"><span style=\"color: var( --e-global-color-primary );\">Standing supérieur avec petit déjeuner : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</span></p><p class=\"ql-align-center\"><br></p><p><br></p>', '', '<p>Dolores in voluptatu.</p>', '', '<p>Veritatis voluptatib.</p>', '', '<p>Maiores voluptate vo.</p>', '', '<p>Laboriosam, impedit.</p>', '', '<p>Ut in est dolore est.</p>', 'files/66f185ad3a072_manuel d\'utilisation_plateforme_equivalence_web_2.pdf', NULL, 'CONFIRMÉ'),
(564, 5, '1971-02-11', '1984-06-07', 'activé', 'Qui aliquip culpa ev', '89.00', '68.00', '62.00', '97.00', '11.00', '61.00', '99.00', '67.00', '47.00', '23.00', 10, '2024-09-20 13:24:27', '[\"2\",\"5\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', NULL, 'EN ATTENTE'),
(565, 43, '2019-07-18', '2005-04-21', 'activé', 'Dolor quasi commodi ', '1.00', '59.00', '25.00', '22.00', '24.00', '96.00', '86.00', '57.00', '9.00', '16.00', 179, '2024-09-20 13:38:32', '[1,4,5]', '[1,2,4,5,6,7]', '<p>Aut optio, cumque ip.</p>', '', '<p>Qui unde eum autem o.</p>', '', '<p>Sit, excepteur dolor.</p>', '', '<p>Aut voluptas ex temp.</p>', '', '<p>Dolorem provident, e.</p>', '', '<p>Explicabo. Velit dig.</p>', '', NULL, 'CONFIRMÉ'),
(569, 5, '1971-02-11', '1984-06-07', 'désactivé', 'Qui aliquip culpa ev', '89.00', '68.00', '62.00', '97.00', '11.00', '61.00', '99.00', '67.00', '47.00', '23.00', 10, '2024-09-20 13:58:34', '[\"2\",\"5\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', NULL, 'EN ATTENTE'),
(570, 43, '2019-07-18', '2005-04-21', 'désactivé', 'Dolor quasi commodi ', '1.00', '59.00', '25.00', '22.00', '24.00', '96.00', '86.00', '57.00', '9.00', '16.00', 179, '2024-09-20 13:58:49', '[1,4,5]', '[1,2,4,5,6,7]', '<p>Aut optio, cumque ip.</p>', '', '<p>Qui unde eum autem o.</p>', '', '<p>Sit, excepteur dolor.</p>', '', '<p>Aut voluptas ex temp.</p>', '', '<p>Dolorem provident, e.</p>', '', '<p>Explicabo. Velit dig.</p>', '', NULL, 'CONFIRMÉ'),
(571, 86, '2007-12-25', '1979-09-26', 'activé', 'Porro eos similique', '73.00', '75.00', '68.00', '61.00', '23.00', '38.00', '3.00', '24.00', '99.00', '49.00', 240, '2024-09-21 23:07:49', '[2,5,6]', '[1,2,4,5,6,7]', '<p>description  MOD</p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', NULL, NULL, 'EN ATTENTE'),
(572, 86, '2007-12-25', '1979-09-26', 'désactivé', 'Porro eos similique', '73.00', '75.00', '68.00', '61.00', '23.00', '38.00', '3.00', '24.00', '99.00', '49.00', 241, '2024-09-20 14:36:56', '[2,5,6]', '[1,2,4,5,6,7]', '<p>description  MOD</p>', 'title 1 MOD', '<p>description 1 MOD</p>', 'title 2 MOD', '<p>description 2 MOD</p>', 'title 3 MOD', '<p>description 3 MOD</p>', 'title 4 MOD', '<p>description 4 MOD</p>', 'title 5 MOD', '<p>description 5 MOD</p>', NULL, NULL, 'EN ATTENTE'),
(574, 86, '2007-12-25', '1979-09-26', 'activé', 'Porro eos similique', '73.00', '75.00', '68.00', '61.00', '23.00', '38.00', '3.00', '24.00', '99.00', '49.00', 241, '2024-09-21 23:10:36', '[2,5,6]', '[1,2,4,5,6,7]', '<p>description  MOD</p>', 'title 1 MOD', '<p>description 1 MOD</p>', 'title 2 MOD', '<p>description 2 MOD</p>', 'title 3 MOD', '<p>description 3 MOD</p>', 'title 4 MOD', '<p>description 4 MOD</p>', 'title 5 MOD', '<p>description 5 MOD</p>', '', NULL, 'EN ATTENTE'),
(575, 82, '2012-07-27', '1993-02-02', 'activé', 'Qui cumque error dol', '29.00', '59.00', '12.00', '44.00', '49.00', '98.00', '17.00', '93.00', '32.00', '48.00', 232, '2024-09-21 23:09:37', '[1,2,6]', '[1,2,4,5,6,7]', '<p>Officia voluptatem v.</p>', '', '<p>Sit, deleniti illum.</p>', '', '<p>Laborum. Velit quasi.</p>', '', '<p>Voluptatum sed fugit.</p>', '', '<p>Quae incidunt, tenet.</p>', '', '<p>Fugiat porro volupta.</p>', '', NULL, 'CONFIRMÉ'),
(576, 3, '2024-09-06', '2024-09-26', 'désactivé', '5', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '5.00', '5.00', '5.00', '5.00', 5, '2024-09-22 15:27:44', '[4,2]', '[1,4,5,6,2,7]', '<p><br></p>', '', '<p>section 1</p><p><br></p>', 'title 2', '<p><br></p>', 'title 3', '<p>section 3</p><p><br></p>', '', '<p><br></p>', 'title 5', '<p>section 5</p><p><br></p>', '', NULL, 'CONFIRMÉ'),
(577, 5, '2003-09-19', '1998-07-15', 'activé', 'Deleniti eligendi su', '62.00', '68.00', '59.00', '59.00', '19.00', '61.00', '37.00', '77.00', '91.00', '15.00', 10, '2024-09-24 11:16:58', '[\"1\",\"2\",\"4\",\"5\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', 'Odio suscipit qui qu', '<p><br></p>', 'Est dolores rerum qu', '<p><br></p>', 'files/66f29faa22208_a-nostalgic-t-shirt-graphic-design-with-the-phrase-vlpIl4ZBS8-3Ce3qVQaCeg-Rp3iJy1hSu2I4ALJBrwT-Q.jpeg', '', 'EN ATTENTE'),
(578, 43, '1993-11-27', '2016-06-02', 'activé', 'Adipisci consequatur', '93.00', '44.00', '94.00', '81.00', '77.00', '18.00', '49.00', '42.00', '59.00', '80.00', 179, '2024-09-24 11:19:29', '[\"1\",\"2\",\"4\",\"5\",\"7\"]', '[1,2,4,5,6,7]', '<p>Aut ea voluptatum qu.</p>', '', '<p>Dolore est molestiae.</p>', '', '<p>Quis consequuntur vo.</p>', '', '<p>Recusandae. Consecte.</p>', '', '<p>Ab unde labore exped.</p>', '', '<p>Vero cillum voluptat.</p>', 'files/66f2a041dd30c_a-nostalgic-t-shirt-graphic-design-with-the-phrase-vlpIl4ZBS8-3Ce3qVQaCeg-Rp3iJy1hSu2I4ALJBrwT-Q.jpeg', '', 'EN ATTENTE'),
(579, 52, '2015-03-30', '1977-06-05', 'activé', 'Laborum numquam id ', '3.00', '78.00', '93.00', '74.00', '78.00', '37.00', '49.00', '26.00', '56.00', '50.00', 185, '2024-09-24 11:29:04', '[\"1\",\"4\",\"5\"]', '[1,2,4,5,6,7]', '<p>Ab sint, exercitatio.</p>', '', '<p>Quis incididunt eius.</p>', '', '<p>Iusto laboriosam, co.</p>', '', '<p>Aperiam quis cumque .</p>', '', '<p>Eos, natus elit, mod.</p>', '', '<p>Iure autem qui facil.</p>', 'files/66f2a2802f6b8_a-nostalgic-t-shirt-graphic-design-with-the-phrase-vlpIl4ZBS8-3Ce3qVQaCeg-Rp3iJy1hSu2I4ALJBrwT-Q.jpeg', '', 'CONFIRMÉ'),
(580, 4, '1992-05-22', '1992-10-08', 'activé', 'Autem excepteur nihi', '59.00', '71.00', '73.00', '50.00', '47.00', '22.00', '52.00', '4.00', '3.00', '39.00', 6, '2024-09-24 11:35:31', '[\"2\",\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p>Minus est consequunt.</p>', '', '<p>Eligendi earum volup.</p>', '', '<p>Iure perferendis ame.</p>', '', '<p>Occaecat occaecat do.</p>', '', '<p>Earum adipisicing se.</p>', '', '<p>Assumenda occaecat s.</p>', 'files/66f2a40343b70_66f185ad3a072_manuel d\'utilisation_plateforme_equivalence_web_2 (2).pdf', '', 'CONFIRMÉ'),
(581, 1, '1973-10-10', '1973-04-02', 'activé', 'Recusandae Fugit v', '59.00', '82.00', '44.00', '82.00', '57.00', '82.00', '86.00', '35.00', '51.00', '17.00', 2, '2024-09-24 11:39:06', '[\"6\",\"7\"]', '[1,2,4,5,6,7]', '<p>Sunt et consequatur.</p>', '', '<p>Veritatis velit, eni.</p>', '', '<p>Eius perspiciatis, m.</p>', '', '<p>Illo est eligendi ut.</p>', '', '<p>Dignissimos temporib.</p>', '', '<p>Dolorum similique au.</p>', 'files/66f2a4da7d86f_66f185ad3a072_manuel d\'utilisation_plateforme_equivalence_web_2 (2).pdf', 'uploads/66f2a4da7dc7a__11286dc2-1536-4f47-895c-cf481e8684b6.jpeg', 'CONFIRMÉ'),
(582, 86, '2024-02-13', '2018-05-19', 'activé', 'Illum et aliquam qu', '78.00', '86.00', '69.00', '2.00', '80.00', '59.00', '3.00', '16.00', '70.00', '1.00', 240, '2024-09-24 11:45:14', '[\"1\",\"2\"]', '[1,2,4,5,6,7]', '<p>Et dolores est velit.</p>', '', '<p>Ut quod fugit, irure.</p>', '', '<p>Deleniti aut aut min.</p>', '', '<p>Porro dolore consect.</p>', '', '<p>Odio nisi lorem fuga.</p>', '', '<p>Pariatur. Excepteur .</p>', 'files/66f2a64ab44db_66f185ad3a072_manuel d\'utilisation_plateforme_equivalence_web_2 (2).pdf', 'uploads/66f2a64ab48f9_Seminar-amico.png', 'CONFIRMÉ'),
(583, 3, '1994-08-31', '2006-11-22', 'activé', 'Consequat Aspernatu', '86.00', '71.00', '31.00', '68.00', '72.00', '44.00', '4.00', '98.00', '11.00', '38.00', 5, '2024-09-24 15:47:44', '[2,4,7]', '[1,2,4,5,6,7]', '<p>DESCRIPTION</p>', 'title 1', '<p>SECTION 1</p>', 'title 2', '<p>SECTION 2</p>', 'title 3', '<p>SECTION 3</p>', 'title 4', '<p>SECTION 4</p>', 'title 5', '<p>SECTION 5</p>', 'files/66f2b93450053_66f185ad3a072_manuel d\'utilisation_plateforme_equivalence_web_2 (2).pdf', '', 'CONFIRMÉ'),
(584, 3, '1994-08-31', '2006-11-22', 'désactivé', 'Consequat Aspernatu', '86.00', '71.00', '31.00', '68.00', '72.00', '44.00', '4.00', '98.00', '11.00', '38.00', 5, '2024-09-24 13:26:21', '[2,4,7]', '[1,2,4,5,6,7]', '<p>DESCRIPTION</p>', 'title 1', '<p>SECTION 1</p>', 'title 2', '<p>SECTION 2</p>', 'title 3', '<p>SECTION 3</p>', 'title 4', '<p>SECTION 4</p>', 'title 5', '<p>SECTION 5</p>', 'files/66f2bb2d4627f_CV professionnel gris simple.pdf', 'uploads/a-professional-design-of-a-purple-and-pink-gradien-Gc4UdF_nT2qX_14ZEdarDA-73kMud6zQzCOLcRstZ5anA.jpeg', 'CONFIRMÉ'),
(585, 86, '2024-02-13', '2018-05-19', 'désactivé', 'Illum et aliquam qu', '78.00', '86.00', '69.00', '2.00', '80.00', '59.00', '3.00', '16.00', '70.00', '1.00', 240, '2024-09-24 13:14:51', '[\"1\",\"2\"]', '[1,2,4,5,6,7]', '<p>Et dolores est velit.</p>', '', '<p>Ut quod fugit, irure.</p>', '', '<p>Deleniti aut aut min.</p>', '', '<p>Porro dolore consect.</p>', '', '<p>Odio nisi lorem fuga.</p>', '', '<p>Pariatur. Excepteur .</p>', 'files/66f2a64ab44db_66f185ad3a072_manuel d\'utilisation_plateforme_equivalence_web_2 (2).pdf', 'uploads/66f2a64ab48f9_Seminar-amico.png', 'CONFIRMÉ'),
(589, 88, '2024-08-01', '2024-08-31', 'désactivé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 244, '2024-09-24 17:45:50', '[1,7,4,6,2,5]', '[1,7,4,6,2,5]', '<p>hola</p><p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', 'files/66f2be61dd63e_July-to-December-2022-Calendar.pdf', 'uploads/66f2f6c09237e_medina.jpg', 'CONFIRMÉ'),
(590, 88, '2024-08-01', '2024-08-31', 'désactivé', '30', '1500.00', '1200.00', '1000.00', '700.00', '500.00', '300.00', '1400.00', '1100.00', '900.00', '600.00', 245, '2024-09-24 17:02:37', '[1,4,6,2,7,5]', '[1,4,6,2,7,5]', '<p><br></p><p><strong style=\"color: rgb(54, 60, 68);\">Distance du Haram</strong></p><p>Moins de 500 m (10 min à pieds) hors Ramadan et jusqu’à 1500 m (25 min à pieds) pendant le mois de Ramadan</p><p><strong style=\"color: rgb(54, 60, 68);\">Standing des hôtels</strong></p><p>Standing supérieur : Hôtels appartenant à des chaines locales ou internationales (Dar Al Imane, Bosphorus, Sheraton, Ramada, etc.)</p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', '', '<p><br></p>', 'files/66f2beb1caf63_guide_anb.pdf', 'uploads/66f2f05baf687_35440.jpg', 'CONFIRMÉ');

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
(1026, 452, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1027, 452, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1028, 452, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1029, 454, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1030, 454, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1031, 454, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1032, 453, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1033, 453, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1034, 453, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1038, 451, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1039, 451, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1040, 451, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1117, 442, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1118, 442, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1119, 442, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1162, 481, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1163, 481, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1164, 481, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1165, 482, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1166, 482, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1167, 482, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1174, 479, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1175, 479, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1176, 479, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1195, 443, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1196, 443, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1197, 443, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1198, 455, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1199, 455, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1200, 455, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1204, 480, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1205, 480, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1206, 480, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1207, 483, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1208, 483, 5, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1209, 483, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1213, 373, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1214, 373, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1215, 373, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1216, 484, 5, 'Sahour et Iftar', '2000-12-09', '2016-09-06', 5750),
(1228, 485, 6, 'Pension Complète', '2006-09-04', '1989-07-13', 0),
(1266, 505, 5, 'Sans pension', '2024-09-27', '2024-09-29', 2),
(1267, 526, 19, 'Sahour et Iftar', '2010-03-19', '1998-02-05', 0),
(1268, 527, 18, 'Sahour', '2012-08-01', '1993-09-20', 0),
(1269, 528, 6, 'Iftar', '1973-03-05', '1991-02-27', 6568),
(1270, 529, 5, 'Sans pension', '2003-06-27', '1990-05-31', 0),
(1271, 530, 18, 'Sans pension', '2015-05-22', '2020-02-19', 1734),
(1272, 531, 5, 'Iftar', '2015-05-21', '2015-07-29', 69),
(1273, 533, 18, 'Demi-pension', '1984-09-14', '1979-09-12', 0),
(1274, 534, 7, 'Petit déjeuner', '1996-04-28', '2006-09-20', 3797),
(1275, 535, 7, 'Pension Complète', '1991-11-10', '1987-12-23', 0),
(1276, 536, 5, 'Petit déjeuner', '2002-03-05', '2019-03-26', 6230),
(1277, 537, 18, 'Petit déjeuner', '1979-10-05', '2001-11-30', 8092),
(1278, 538, 18, 'Pension Complète', '1997-01-24', '2019-02-15', 8057),
(1326, 564, 4, 'Iftar', '1980-03-08', '2013-11-05', 0),
(1329, 565, 7, 'Sahour et Iftar', '1994-07-16', '1975-06-04', 0),
(1333, 569, 4, 'Iftar', '1980-03-08', '2013-11-05', 0),
(1334, 570, 7, 'Sahour et Iftar', '1994-07-16', '1975-06-04', 0),
(1335, 508, 6, 'Pension Complète', '2006-09-04', '1989-07-13', 0),
(1336, 506, 6, 'Pension Complète', '2006-09-04', '1989-07-13', 0),
(1339, 572, 6, 'Pension Complète', '2006-09-04', '1989-07-13', 0),
(1342, 571, 6, 'Pension Complète', '2006-09-04', '1989-07-13', 0),
(1343, 575, 7, 'Petit déjeuner', '1996-04-28', '2006-09-20', 3797),
(1344, 574, 6, 'Pension Complète', '2006-09-04', '1989-07-13', 0),
(1348, 576, 18, 'Sahour et Iftar', '2024-09-26', '2024-09-30', 4),
(1354, 539, 5, 'Iftar', '1998-06-13', '1979-04-06', 0),
(1355, 577, 18, 'Petit déjeuner', '2003-12-19', '2019-07-17', 0),
(1356, 578, 18, 'Petit déjeuner ensuite Iftar', '1990-08-05', '1976-09-20', 0),
(1357, 579, 18, 'Pension Complète', '2008-12-08', '1977-05-21', 0),
(1358, 580, 4, 'Petit déjeuner', '1972-12-08', '2012-06-01', 14420),
(1359, 581, 18, 'Pension Complète', '1989-02-15', '2007-09-29', 6800),
(1360, 582, 7, 'Demi-pension', '2013-04-08', '2017-04-25', 1478),
(1361, 486, 6, 'Iftar', '1985-09-26', '1997-09-16', 4373),
(1368, 585, 7, 'Demi-pension', '2013-04-08', '2017-04-25', 1478),
(1372, 584, 6, 'Iftar', '1985-09-26', '1997-09-16', 4373),
(1373, 449, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1374, 449, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1375, 449, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1376, 450, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1377, 450, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1378, 450, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1407, 583, 6, 'Iftar', '1985-09-26', '1997-09-16', 4373),
(1450, 590, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1451, 590, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1452, 590, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8),
(1462, 589, 7, 'Pension Complète', '2024-08-01', '2024-08-16', 15),
(1463, 589, 6, 'Pension Complète', '2024-08-16', '2024-08-23', 7),
(1464, 589, 4, 'Pension Complète', '2024-08-23', '2024-08-31', 8);

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
(4, 'Hotels Hilton Al Madinah', 5, '19', 'hotel 5*', 'en face de haram', NULL),
(5, 'Hotel Seabel Alhambra', 5, '18', 'Hotel 5*', 'En Face de haram', NULL),
(6, 'New Medinah Hotel', 4, '19', 'Hôtels économiques à Medina les mieux notés', '3km', NULL),
(7, 'Pullan ZamZam Makkah ', 4, '18', 'Pullman ZamZam Makkah stands as a distinctive landmark in Makkah', '3.8km', NULL),
(18, 'Recusandae Cupidata', 1, '2', 'Enim est ut quod nih', 'Dolores non exercita', NULL),
(19, 'Dignissimos totam cu', 1, '2', 'Vero consequat Nihi', 'Ratione dolorem pers', NULL);

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
(53, 7, 'uploads/hotel3.jpg'),
(54, 7, 'uploads/151616.jpg'),
(58, 18, 'uploads/flower 2.jpeg'),
(59, 19, 'uploads/flower 1.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `omra_packages`
--

CREATE TABLE `omra_packages` (
  `id` int(11) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `omra_packages`
--

INSERT INTO `omra_packages` (`id`, `category_parent_id`, `nom`, `description`, `photo`) VALUES
(1, 4, 'Hajj 1', 'hajj ramadhan 1', 'uploads/66e41c6c3707f0.10523022_medina.jpg'),
(3, 6, 'Lyon', 'OMRA Lyon 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a3f8fe663379.73140357_lyon.jpg'),
(4, 7, 'Toulouse', 'OMRA Toulouse 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a3f90a16e2e2.85837181_toulouse.jpg'),
(5, 4, 'Nantes', 'OMRA Nantes Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/66a3f916137998.57914383_nantes.jpg'),
(34, 6, 'Nice', 'OMRA Nice Vivez une expérience riche en émotion. et revenez le cœur apaisé.	', 'uploads/66a3f922899cd4.45974857_nice.jpg'),
(40, 7, 'Marseille', 'OMRA Marseille Vivez une expérience riche en émotion. et revenez le cœur apaisé.	', 'uploads/66a3f92f534d85.06641322_marseille.jpg'),
(43, 6, 'Lille', 'OMRA Lille 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66a3f93eee9527.29928469_lille.jpg'),
(52, 7, 'Brest', 'OMRA Brest 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/66b1eb213fbe19.64012434_brest.jpg'),
(82, 6, 'London', 'london', 'uploads/66a3f922899cd4.45974857_nice.jpg'),
(86, 6, 'London', 'london', 'uploads/66a3f922899cd4.45974857_nice.jpg'),
(88, 6, 'Nice', 'OMRA Nice Vivez une expérience riche en émotion. et revenez le cœur apaisé.	', 'uploads/66a3f922899cd4.45974857_nice.jpg');

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
(7, 'Programme 6', '9 nuits à Médine \r\n9 nuits à Makkah\r\n', 'uploads/66a4beb9348b42.27248419_medina3.jpg');

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
(179, 'Formule Confort', 43),
(185, 'Formule Confort', 52),
(186, 'Formule Simple', 52),
(198, 'Formule Simple', 43),
(199, 'Formule Confort', 34),
(201, 'Formule Confort', 40),
(225, 'formule test', 52),
(232, 'Formule Confort', 82),
(233, 'Formule Simple', 82),
(240, 'Formule Simple', 86),
(241, 'Formule Confort', 86),
(244, 'Formule Confort', 88),
(245, 'Formule Simple', 88);

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
(1436, 451, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1437, 451, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1438, 451, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1439, 451, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1440, 451, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1514, 442, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1515, 442, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1516, 442, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1517, 442, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1518, 442, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1589, 481, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1590, 481, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1591, 481, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1592, 481, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1593, 481, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1594, 482, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1595, 482, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1596, 482, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1597, 482, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1598, 482, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1609, 479, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1610, 479, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1611, 479, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1612, 479, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1613, 479, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1644, 443, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1645, 443, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1646, 443, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1647, 443, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1648, 443, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1649, 455, '11', 2, 5, 4, 7, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1650, 455, '2', 20, 4, 12, 7, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1651, 455, '20', 19, 12, 13, 7, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1652, 455, '19', 2, 13, 4, 7, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1653, 455, '2', 11, 4, 5, 7, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1659, 480, '11', 2, 5, 4, 7, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1660, 480, '2', 20, 4, 12, 7, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1661, 480, '20', 19, 12, 13, 7, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1662, 480, '19', 2, 13, 4, 7, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1663, 480, '2', 11, 4, 5, 7, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1664, 483, '11', 2, 5, 4, 6, 'PC1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1665, 483, '2', 20, 4, 12, 6, 'PC2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1666, 483, '20', 19, 12, 13, 6, 'PC3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1667, 483, '19', 2, 13, 4, 6, 'PC4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1668, 483, '2', 11, 4, 5, 6, 'PC5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1674, 373, '11', 2, 5, 4, 7, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1675, 373, '2', 20, 4, 12, 7, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1676, 373, '20', 19, 12, 13, 7, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1677, 373, '19', 2, 13, 4, 7, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1678, 373, '2', 11, 4, 5, 7, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1679, 484, '17', 11, 2, 9, 7, 'Voluptatem Rerum od', '1982-01-16 00:16:00', '2010-10-22 00:16:00'),
(1691, 485, '16', 11, 8, 13, 6, 'Voluptas cupiditate ', '2023-06-18 10:15:00', '1972-01-11 20:27:00'),
(1757, 505, '18', 16, 11, 10, 6, '5', '2024-09-24 05:11:00', '2024-09-28 05:11:00'),
(1758, 526, '11', 18, 10, 12, 7, 'Aut ullam consectetu', '1970-08-26 17:44:00', '1974-01-09 08:57:00'),
(1759, 527, '16', 16, 9, 2, 6, 'Ab occaecat minus ad', '1994-12-17 15:00:00', '1993-08-03 09:03:00'),
(1760, 528, '11', 13, 9, 11, 7, 'Consequuntur delectu', '2021-01-21 09:38:00', '2020-02-19 10:57:00'),
(1761, 529, '16', 19, 11, 11, 6, 'Aut beatae incididun', '2023-07-17 09:06:00', '1982-06-17 00:18:00'),
(1762, 530, '13', 14, 11, 13, 6, 'Error nostrud ration', '2008-11-28 11:29:00', '1995-07-13 19:31:00'),
(1763, 531, '13', 15, 7, 10, 7, 'Incidunt dolore bla', '2014-02-13 08:42:00', '2005-03-14 04:25:00'),
(1764, 533, '13', 13, 2, 13, 7, 'Voluptas ut ipsum cu', '2008-12-25 22:08:00', '2007-01-23 19:57:00'),
(1765, 534, '15', 2, 4, 13, 6, 'Amet ut qui volupta', '2001-08-22 22:54:00', '2019-01-20 12:44:00'),
(1766, 535, '2', 12, 11, 13, 7, 'Culpa inventore vel ', '1977-12-23 08:22:00', '1977-04-11 04:15:00'),
(1767, 536, '15', 18, 8, 13, 6, 'Nam irure at explica', '1994-10-09 20:28:00', '1998-12-14 01:26:00'),
(1768, 537, '16', 17, 12, 7, 6, 'Optio aliquid labor', '1983-09-25 15:29:00', '1982-05-06 07:45:00'),
(1769, 538, '13', 18, 2, 11, 6, 'Incidunt adipisicin', '2004-11-05 06:04:00', '2021-01-06 04:59:00'),
(1855, 564, '15', 18, 8, 8, 6, 'Velit corporis saepe', '1979-10-27 22:19:00', '1998-11-28 14:11:00'),
(1858, 565, '14', 14, 11, 7, 6, 'Sit quidem nobis et', '2008-08-25 14:26:00', '2017-05-24 09:21:00'),
(1862, 569, '15', 18, 8, 8, 6, 'Velit corporis saepe', '1979-10-27 22:19:00', '1998-11-28 14:11:00'),
(1863, 570, '14', 14, 11, 7, 6, 'Sit quidem nobis et', '2008-08-25 14:26:00', '2017-05-24 09:21:00'),
(1864, 508, '16', 11, 8, 13, 6, 'Voluptas cupiditate ', '2023-06-18 10:15:00', '1972-01-11 20:27:00'),
(1865, 506, '16', 11, 8, 13, 6, 'Voluptas cupiditate ', '2023-06-18 10:15:00', '1972-01-11 20:27:00'),
(1868, 572, '16', 11, 8, 13, 6, 'Voluptas cupiditate ', '2023-06-18 10:15:00', '1972-01-11 20:27:00'),
(1871, 571, '16', 11, 8, 13, 7, 'Voluptas cupiditate ', '2023-06-18 10:15:00', '1972-01-11 20:27:00'),
(1872, 575, '15', 2, 4, 13, 7, 'Amet ut qui volupta', '2001-08-22 22:54:00', '2019-01-20 12:44:00'),
(1873, 574, '16', 11, 8, 13, 7, 'Voluptas cupiditate ', '2023-06-18 10:15:00', '1972-01-11 20:27:00'),
(1877, 576, '14', 15, 11, 10, 7, 's1', '2024-09-16 09:46:00', '2024-09-25 09:46:00'),
(1883, 539, '14', 13, 4, 5, 6, 'Aut magni nisi neque', '1971-11-08 05:57:00', '1992-11-03 13:40:00'),
(1884, 577, '20', 2, 12, 12, 7, 'Qui in incididunt im', '1995-09-26 13:51:00', '2002-09-02 15:27:00'),
(1885, 578, '14', 14, 11, 8, 7, 'Ratione at officia n', '2013-10-28 14:59:00', '1984-09-14 10:05:00'),
(1886, 579, '14', 15, 7, 2, 7, 'Pariatur Sapiente e', '1986-10-21 06:37:00', '2019-06-13 07:00:00'),
(1887, 580, '11', 14, 2, 5, 7, 'Laboriosam eius sed', '2005-08-13 04:02:00', '2005-09-27 13:58:00'),
(1888, 581, '18', 18, 10, 4, 6, 'Commodo cupiditate u', '2004-05-03 05:50:00', '2016-10-05 23:24:00'),
(1889, 582, '2', 13, 11, 11, 7, 'Delectus exercitati', '1989-08-02 01:13:00', '2016-10-11 06:33:00'),
(1890, 486, '20', 13, 5, 7, 7, 'Et voluptate qui eum', '2007-10-14 23:58:00', '1975-01-03 11:22:00'),
(1897, 585, '2', 13, 11, 11, 7, 'Delectus exercitati', '1989-08-02 01:13:00', '2016-10-11 06:33:00'),
(1901, 584, '20', 13, 5, 7, 7, 'Et voluptate qui eum', '2007-10-14 23:58:00', '1975-01-03 11:22:00'),
(1902, 449, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1903, 449, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1904, 449, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1905, 449, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1906, 449, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1907, 450, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(1908, 450, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(1909, 450, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(1910, 450, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(1911, 450, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(1962, 583, '20', 13, 5, 7, 7, 'Et voluptate qui eum', '2007-10-14 23:58:00', '1975-01-03 11:22:00'),
(2033, 590, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(2034, 590, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(2035, 590, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(2036, 590, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(2037, 590, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00'),
(2053, 589, '11', 2, 5, 4, 6, 'PS1', '2024-08-01 06:00:00', '2024-08-01 08:00:00'),
(2054, 589, '2', 20, 4, 12, 6, 'PS2', '2024-08-01 10:00:00', '2024-08-01 20:00:00'),
(2055, 589, '20', 19, 12, 13, 6, 'PS3', '2024-08-16 06:00:00', '2024-08-16 08:00:00'),
(2056, 589, '19', 2, 13, 4, 6, 'PS4', '2024-07-31 08:00:00', '2024-08-31 20:00:00'),
(2057, 589, '2', 11, 4, 5, 6, 'PS5', '2024-08-31 21:00:00', '2024-08-31 23:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category_parent`
--
ALTER TABLE `category_parent`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_parent` (`category_parent_id`);

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
-- AUTO_INCREMENT pour la table `category_parent`
--
ALTER TABLE `category_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1465;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `hotel_gallery`
--
ALTER TABLE `hotel_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `omra_packages`
--
ALTER TABLE `omra_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2058;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formules`
--
ALTER TABLE `formules`
  ADD CONSTRAINT `formules_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `omra_packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formules_ibfk_6` FOREIGN KEY (`type_id`) REFERENCES `type_formule_omra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Contraintes pour la table `omra_packages`
--
ALTER TABLE `omra_packages`
  ADD CONSTRAINT `fk_category_parent` FOREIGN KEY (`category_parent_id`) REFERENCES `category_parent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type_formule_omra`
--
ALTER TABLE `type_formule_omra`
  ADD CONSTRAINT `type_formule_omra_ibfk_1` FOREIGN KEY (`formule_parent_id`) REFERENCES `omra_packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`formule_id`) REFERENCES `formules` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
