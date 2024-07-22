-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 juil. 2024 à 02:11
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
  `type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `programs_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`programs_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formules`
--

INSERT INTO `formules` (`id`, `package_id`, `date_depart`, `statut`, `duree_sejour`, `prix_chambre_quadruple`, `prix_chambre_triple`, `prix_chambre_double`, `prix_chambre_single`, `child_discount`, `prix_bebe`, `prix_chambre_quadruple_promo`, `prix_chambre_triple_promo`, `prix_chambre_double_promo`, `prix_chambre_single_promo`, `type_id`, `created_at`, `programs_id`) VALUES
(34, 4, '2024-07-12', 'activé', 'Consectetur perferen', '100.00', '47.00', '88.00', '85.00', '5.00', '67.00', '1.00', '86.00', '26.00', '85.00', 9, '2024-07-20 12:20:55', '[2]'),
(44, 4, '2024-07-19', 'activé', 'Perferendis nostrud ', '93.00', '15.00', '61.00', '46.00', '53.00', '44.00', '94.00', '1.00', '67.00', '22.00', 6, '2024-07-20 12:20:44', '[1]'),
(50, 1, '2024-07-03', 'activé', 'In labore et molliti', '24.00', '12.00', '24.00', '57.00', '44.00', '59.00', '78.00', '93.00', '59.00', '28.00', 2, '2024-07-20 12:21:29', '[1,2]'),
(52, 5, '2024-07-16', 'activé', 'Fuga Id in vero id ', '49.00', '71.00', '75.00', '64.00', '50.00', '72.00', '81.00', '43.00', '61.00', '37.00', 11, '2024-07-20 12:20:13', '[4]'),
(54, 5, '2024-07-23', 'activé', 'Suscipit soluta ut c', '63.00', '92.00', '32.00', '97.00', '80.00', '76.00', '23.00', '24.00', '18.00', '32.00', 10, '2024-07-20 12:20:05', '[2]'),
(59, 3, '2024-07-01', 'activé', 'Aut ipsum et numqus', '73.00', '51.00', '94.00', '98.00', '47.00', '27.00', '51.00', '75.00', '77.00', '29.00', 5, '2024-07-20 12:21:47', '[1,2,4]'),
(60, 3, '1994-12-28', 'activé', 'Atque et molestiae e', '76.00', '88.00', '61.00', '58.00', '19.00', '11.00', '40.00', '89.00', '41.00', '74.00', 5, '2024-07-20 12:21:03', '[2,4]'),
(61, 4, '1994-05-06', 'désactivé', 'Commodi irure sint ', '19.00', '12.00', '28.00', '35.00', '83.00', '88.00', '46.00', '10.00', '90.00', '60.00', 6, '2024-07-20 12:20:20', '[5]'),
(62, 40, '1974-07-15', 'activé', 'Aliquip consectetur', '1500.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', 172, '2024-07-20 12:24:03', '[2,4]'),
(67, 1, '1979-02-26', 'désactivé', 'Eius excepturi conse', '19.00', '46.00', '14.00', '100.00', '18.00', '90.00', '84.00', '50.00', '93.00', '64.00', 2, '2024-07-20 12:21:19', '[4,5]'),
(68, 1, '1986-08-05', 'activé', 'Magni libero aut con', '56.00', '8.00', '85.00', '24.00', '56.00', '11.00', '54.00', '7.00', '44.00', '26.00', 2, '2024-07-20 12:21:12', '[4]'),
(70, 5, '2001-01-01', 'désactivé', 'Facere dolor fugiat', '84.00', '2.00', '1.00', '77.00', '37.00', '63.00', '21.00', '98.00', '86.00', '46.00', 10, '2024-07-20 12:19:56', '[1,4]'),
(71, 4, '1970-04-01', 'désactivé', 'Non nesciunt quasi ', '83.00', '8.00', '76.00', '23.00', '1.00', '78.00', '88.00', '25.00', '29.00', '3.00', 6, '2024-07-20 12:21:37', '[2,4]'),
(72, 3, '2024-07-01', 'activé', 'Aut ipsum et numqus', '73.00', '51.00', '94.00', '98.00', '47.00', '27.00', '51.00', '75.00', '77.00', '29.00', 5, '2024-07-20 12:21:56', '[2,4,5]'),
(111, 5, '2024-07-18', 'activé', '18 jours', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', '1000.00', 10, '2024-07-20 12:22:37', '[1,2,4,5]'),
(276, 34, '2024-07-05', 'activé', '5', '5.00', '9.00', '82.00', '57.00', '6.00', '64.00', '5.00', '84.00', '72.00', '90.00', 161, '2024-07-20 12:23:15', '[1,4]'),
(277, 34, '2024-07-17', 'activé', 'Facere assumenda iur', '34.00', '18.00', '82.00', '38.00', '95.00', '47.00', '18.00', '7.00', '95.00', '62.00', 161, '2024-07-20 12:23:06', '[1,2,5]'),
(278, 34, '2024-07-11', 'activé', 'Numquam temporibus q', '10.00', '36.00', '70.00', '14.00', '42.00', '45.00', '82.00', '73.00', '18.00', '79.00', 161, '2024-07-20 12:22:57', '[1,4,5]'),
(279, 34, '2024-07-25', 'activé', 'Tempora voluptate ni', '37.00', '9.00', '82.00', '57.00', '6.00', '64.00', '43.00', '84.00', '72.00', '90.00', 160, '2024-07-20 12:22:47', '[1,2]'),
(318, 40, '2024-07-05', 'activé', '5', '5.00', '9.00', '82.00', '57.00', '6.00', '64.00', '5.00', '84.00', '72.00', '90.00', 176, '2024-07-20 12:23:24', '[2,5]'),
(319, 40, '2024-07-17', 'activé', 'Facere assumenda iur', '34.00', '18.00', '82.00', '38.00', '95.00', '47.00', '18.00', '7.00', '95.00', '62.00', 174, '2024-07-20 12:23:47', '[2,4]'),
(320, 40, '2024-07-11', 'activé', 'Numquam temporibus q', '10.00', '36.00', '70.00', '14.00', '42.00', '45.00', '82.00', '73.00', '18.00', '79.00', 173, '2024-07-20 00:51:21', '[1,4]'),
(321, 40, '2024-07-25', 'activé', 'Tempora voluptate ni', '37.00', '9.00', '82.00', '57.00', '6.00', '64.00', '43.00', '84.00', '72.00', '90.00', 172, '2024-07-20 12:23:55', '[1,5]'),
(332, 43, '2024-07-03', 'activé', 'In labore et mollitis', '24.00', '12.00', '24.00', '57.00', '44.00', '59.00', '78.00', '93.00', '59.00', '28.00', 179, '2024-07-21 15:23:27', '[2]'),
(333, 43, '1979-02-26', 'activé', 'Eius excepturi conse', '19.00', '46.00', '14.00', '100.00', '18.00', '90.00', '84.00', '50.00', '93.00', '64.00', 179, '2024-07-21 15:21:31', '[4]'),
(334, 43, '1986-08-05', 'activé', 'Magni libero aut s', '56.00', '8.00', '85.00', '24.00', '56.00', '11.00', '54.00', '7.00', '44.00', '26.00', 179, '2024-07-21 15:23:47', '[2,5]'),
(335, 5, '1994-10-17', 'désactivé', '15', '96.00', '10.00', '23.00', '4.00', '20.00', '56.00', '58.00', '4.00', '81.00', '6.00', 10, '2024-07-20 12:15:42', '[1,2,4,5]'),
(336, 43, '1992-05-02', 'activé', '10', '72.00', '29.00', '8.00', '67.00', '12.00', '46.00', '89.00', '95.00', '31.00', '44.00', 179, '2024-07-21 15:21:55', '[4,5]'),
(337, 4, '1994-08-07', 'activé', 'Voluptas placeat qu', '90.00', '90.00', '50.00', '18.00', '23.00', '14.00', '30.00', '6.00', '9.00', '63.00', 6, '2024-07-20 12:18:11', '[\"2\"]'),
(338, 5, '1990-06-29', 'activé', 'Dolore quia omnis et', '14.00', '78.00', '57.00', '72.00', '10.00', '16.00', '24.00', '24.00', '74.00', '38.00', 10, '2024-07-20 16:50:07', '[1,4,6,12]'),
(340, 5, '1990-06-29', 'désactivé', 'Dolore quia omnis et', '14.00', '78.00', '57.00', '72.00', '10.00', '16.00', '24.00', '24.00', '74.00', '38.00', 10, '2024-07-20 20:18:24', '[6,9]'),
(342, 5, '1990-06-29', 'désactivé', 'Dolore quia omnis et', '14.00', '78.00', '57.00', '72.00', '10.00', '16.00', '24.00', '24.00', '74.00', '38.00', 10, '2024-07-20 20:58:45', '[1,4,6,12]'),
(364, 1, '1986-08-05', 'désactivé', 'Magni libero aut con', '56.00', '8.00', '85.00', '24.00', '56.00', '11.00', '54.00', '7.00', '44.00', '26.00', 2, '2024-07-21 14:40:15', '[4]'),
(365, 52, '2024-07-03', 'activé', 'In labore et mollitis', '24.00', '12.00', '24.00', '57.00', '44.00', '59.00', '78.00', '93.00', '59.00', '28.00', 185, '2024-07-21 15:25:46', '[2]'),
(366, 52, '1979-02-26', 'désactivé', 'Eius excepturi conse', '19.00', '46.00', '14.00', '100.00', '18.00', '90.00', '84.00', '50.00', '93.00', '64.00', 185, '2024-07-21 15:24:00', '[4]'),
(367, 52, '1986-08-05', 'désactivé', 'Magni libero aut s', '56.00', '8.00', '85.00', '24.00', '56.00', '11.00', '54.00', '7.00', '44.00', '26.00', 185, '2024-07-21 15:24:00', '[2,5]'),
(368, 52, '1992-05-02', 'désactivé', '10', '72.00', '29.00', '8.00', '67.00', '12.00', '46.00', '89.00', '95.00', '31.00', '44.00', 185, '2024-07-21 15:24:00', '[4,5]');

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
(444, 320, 4, 'Sans pension', '1975-01-22', '2017-02-26', 15376),
(445, 320, 4, 'Sans pension', '2024-07-01', '2024-07-16', 15),
(446, 320, 4, 'Sans pension', '2024-07-01', '2024-07-21', 20),
(459, 335, 6, 'Pension Complète', '2003-10-22', '2015-02-04', 4123),
(460, 337, 7, 'Pension Complète', '1974-12-29', '2012-09-02', 13762),
(461, 70, 5, 'Sans pension', '2015-10-16', '2016-11-09', 390),
(462, 54, 5, 'Pension Complète', '1984-06-25', '1985-07-30', 400),
(463, 52, 4, 'Pension Complète', '2014-12-20', '2024-06-20', 3470),
(464, 61, 6, 'Pension Complète', '2015-12-02', '2016-12-27', 391),
(465, 44, 4, 'Pension Complète', '2024-07-18', '2024-07-30', 12),
(466, 34, 4, 'Sans pension', '2024-07-01', '2024-07-23', 22),
(467, 60, 6, 'Sans pension', '1995-05-01', '1996-07-08', 434),
(468, 68, 5, 'Sans pension', '2009-03-10', '2018-03-13', 3290),
(469, 67, 4, 'Demi-pension', '2014-12-18', '2015-07-28', 222),
(470, 50, 4, 'Pension Complète', '1998-02-22', '2010-02-26', 4387),
(471, 50, 5, 'Pension Complète', '1985-10-25', '2000-06-17', 5349),
(472, 50, 4, 'Demi-pension', '1983-09-27', '2005-09-29', 8038),
(473, 50, 4, 'Demi-pension', '2024-07-24', '2024-08-08', 15),
(474, 50, 4, 'Demi-pension', '2024-07-24', '2024-07-31', 7),
(475, 50, 4, 'Sans pension', '2024-07-25', '2024-07-26', 1),
(476, 71, 4, 'Demi-pension', '1989-11-24', '2022-08-05', 11942),
(477, 59, 4, 'Pension Complète', '2024-07-01', '2024-07-28', 27),
(478, 59, 4, 'Pension Complète', '2024-07-01', '2024-07-29', 28),
(479, 59, 4, 'Pension Complète', '2024-07-01', '2024-07-30', 29),
(480, 72, 4, 'Pension Complète', '2024-07-01', '2024-07-28', 27),
(481, 72, 4, 'Pension Complète', '2024-07-01', '2024-07-29', 28),
(482, 72, 4, 'Pension Complète', '2024-07-01', '2024-07-30', 29),
(483, 111, 5, 'Demi-pension', '2024-07-25', '2024-07-27', 2),
(484, 279, 4, 'Pension Complète', '2024-06-05', '2024-06-22', 17),
(485, 278, 4, 'Pension Complète', '1975-01-22', '2017-02-26', 15376),
(486, 278, 4, 'Sans pension', '2024-07-01', '2024-07-16', 15),
(487, 278, 4, 'Demi-pension', '2024-07-01', '2024-07-21', 20),
(488, 277, 4, 'Pension Complète', '2023-04-22', '2024-09-03', 500),
(489, 276, 4, 'Pension Complète', '2024-06-01', '2024-06-06', 5),
(490, 318, 4, 'Pension Complète', '2024-06-01', '2024-06-06', 5),
(491, 319, 4, 'Demi-pension', '2023-04-22', '2024-09-03', 500),
(492, 321, 4, 'Pension Complète', '2024-06-05', '2024-06-22', 17),
(493, 62, 4, 'Pension Complète', '1999-01-30', '2014-10-25', 5747),
(496, 338, 5, 'Pension Complète', '1987-10-20', '1972-03-08', 0),
(499, 340, 5, 'Pension Complète', '1987-10-20', '1972-03-08', 0),
(501, 342, 5, 'Pension Complète', '1987-10-20', '1972-03-08', 0),
(546, 364, 5, 'Sans pension', '2009-03-10', '2018-03-13', 3290),
(547, 333, 4, 'Pension Complète', '2014-12-18', '2015-07-28', 222),
(548, 336, 4, 'Demi-pension', '1988-08-05', '2008-09-25', 7356),
(555, 332, 4, 'Pension Complète', '1998-02-22', '2010-02-26', 4387),
(556, 332, 5, 'Sans pension', '1985-10-25', '2000-06-17', 5349),
(557, 332, 4, 'Demi-pension', '1983-09-27', '2005-09-29', 8038),
(558, 332, 4, 'Sans pension', '2024-07-24', '2024-08-08', 15),
(559, 332, 4, 'Pension Complète', '2024-07-24', '2024-07-31', 7),
(560, 332, 4, 'Demi-pension', '2024-07-25', '2024-07-26', 1),
(561, 334, 5, 'Demi-pension', '2009-03-10', '2018-03-13', 3290),
(569, 366, 4, 'Pension Complète', '2014-12-18', '2015-07-28', 222),
(570, 367, 5, 'Demi-pension', '2009-03-10', '2018-03-13', 3290),
(571, 368, 4, 'Demi-pension', '1988-08-05', '2008-09-25', 7356),
(590, 365, 7, 'Pension Complète', '1998-02-22', '2010-02-26', 4387),
(591, 365, 5, 'Sans pension', '1985-10-25', '2000-06-17', 5349),
(592, 365, 4, 'Demi-pension', '1983-09-27', '2005-09-29', 8038),
(593, 365, 4, 'Sans pension', '2024-07-24', '2024-08-08', 15),
(594, 365, 4, 'Pension Complète', '2024-07-24', '2024-07-31', 7),
(595, 365, 4, 'Demi-pension', '2024-07-25', '2024-07-26', 1);

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
(1, 'Omra Octobre', 'OMRA OCTOBRE 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/6668d725d1d067.74923834_omra-octobre-18.jpg'),
(3, 'Omra Mars', 'OMRA Mai 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/omra-octobre-18.jpg'),
(4, 'Omra Avril', 'OMRA Avril 2024 Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/omra-octobre-19.jpg'),
(5, 'Omra Janvier', 'OMRA Mai Janvier Vivez une expérience riche en émotion. et revenez le cœur apaisé.\r\n\r\n', 'uploads/omra-octobre-18.jpg'),
(34, 'Paris', 'test', 'uploads/omra-octobre-19.jpg'),
(40, 'Paris 2', 'France', 'uploads/omra-octobre-19.jpg'),
(43, 'Omra Octobre 2', 'OMRA OCTOBRE 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/6668d725d1d067.74923834_omra-octobre-18.jpg'),
(52, 'Omra Octobre 2', 'OMRA OCTOBRE 2024\r\nVivez une expérience riche en émotion.\r\net revenez le cœur apaisé.', 'uploads/6668d725d1d067.74923834_omra-octobre-18.jpg');

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
(3, 'Lyon', 'activé');

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

CREATE TABLE `vols` (
  `id` int(11) NOT NULL,
  `formule_id` int(11) NOT NULL,
  `ville_depart_id` varchar(255) NOT NULL,
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
(663, 320, '2', 1, 'Accusamus iusto cons', 'Dolore debitis dolor', '2002-08-19 00:25:00', 'Vero laudantium qui', 'Saepe cupiditate ut ', '2011-02-23 20:43:00'),
(676, 335, 'Aliquid delectus la', 1, 'Tempor qui nemo id q', 'Quia accusantium eli', '2007-05-08 17:26:00', 'Tempore aliquam vel', 'Cum nulla delectus ', '2004-08-05 00:54:00'),
(677, 337, 'Sit vel est obcaeca', 1, 'Magni doloremque qui', 'Debitis est laborio', '2005-03-06 22:08:00', 'Dolore ea quaerat am', 'Enim magna sit omnis', '2012-06-01 08:54:00'),
(678, 70, 'Et recusandae Quam ', 1, 'Proident eveniet e', 'Tempor culpa sit e', '1998-06-07 08:41:00', 'Ut quo et in eius ve', 'Facere id mollitia ', '2000-11-23 01:49:00'),
(679, 54, '2', 1, 'Amet accusantium re', 'Aliquid possimus ma', '2007-02-06 09:15:00', 'Ut in qui est ipsum ', 'Placeat do iusto vo', '1975-08-17 19:20:00'),
(680, 52, '3', 1, 'Dicta tempore lauda', 'Rerum nisi officiis ', '1982-01-13 03:27:00', 'Amet velit eos dolo', 'Quo voluptatem est u', '1990-05-05 09:48:00'),
(681, 61, '0', 1, 'Dolorum quod sit ni', 'Vel id soluta dolore', '1974-05-11 01:31:00', 'Adipisci necessitati', 'Minus cupidatat cons', '2002-04-28 00:38:00'),
(682, 61, '0', 1, 'Voluptas id nisi exc', 'Unde sunt est aut ', '1970-03-13 23:56:00', 'Enim animi non inci', 'Fuga Sed voluptatem', '2022-12-23 22:03:00'),
(683, 44, '3', 1, 'vol n1d', 'vol n1', '1986-06-24 14:28:00', 'vol n1', 'vol n1', '1995-09-27 15:28:00'),
(684, 44, '2', 1, 'vol n3d', 'vol n3', '2024-07-16 13:43:00', 'vol n3', 'vol n3', '2024-07-22 13:43:00'),
(685, 34, '2', 1, 'z10', '1', '2024-07-25 20:49:00', 'ihih', 'oujguj', '2024-07-13 20:49:00'),
(686, 60, '3', 1, 'Vel numquam ea et nu', 'Exercitation volupta', '2002-05-27 11:15:00', 'Laudantium et odit ', 'Dicta non voluptates', '2019-01-07 18:10:00'),
(687, 68, 'P4', 1, 'Laudantium debitis ', 'Ut magna incididunt ', '2003-08-15 18:26:00', 'Earum et quia dicta ', 'Enim omnis eligendi ', '1986-10-25 14:59:00'),
(688, 68, 'P6', 1, 'Autem non magnam ape', 'Nihil voluptatem El', '1987-05-07 14:42:00', 'Tempore aliquip ape', 'Nihil at eu qui sit', '1981-09-19 22:19:00'),
(689, 68, 'P8', 1, 'vol n12', 'vol n12', '2024-07-22 13:18:00', 'vol n11', 'vol n11', '2024-07-19 13:18:00'),
(690, 67, 'Sousse', 1, 'Tempore nihil vel s', 'Commodi laboriosam ', '1980-07-01 19:46:00', 'Dicta sed eligendi d', 'Sit amet harum ani', '1975-12-14 07:16:00'),
(691, 67, 'Tunis', 1, 'Recusandae Cumque s', 'Iste optio Nam ut c', '2011-01-13 18:10:00', 'Hic in reprehenderit', 'Pariatur Culpa ab ', '1974-05-03 03:34:00'),
(692, 50, '3', 1, 'V1', 'Expedita proident q', '1998-12-23 05:17:00', 'Repellendus Officii', 'Accusantium laboris ', '1985-10-14 17:24:00'),
(693, 50, '2', 1, 'V2', 'Nihil et totam rerum', '2022-03-01 17:36:00', 'Qui velit dolorem mo', 'Aute dolores laboris', '2014-05-25 13:33:00'),
(694, 50, '3', 1, 'V3', 'Asperiores perferend', '2003-01-21 08:08:00', 'Quisquam accusantium', 'Eos consequatur pla', '2021-11-12 00:50:00'),
(695, 50, '2', 1, 'V4', 'vol n9', '2024-07-17 15:26:00', 'vol n11', 'vol n10', '2024-07-11 15:26:00'),
(696, 50, '2', 1, 'V5', 'vol n10', '2024-07-23 15:27:00', 'vol n10', 'vol n10', '2024-08-02 15:27:00'),
(697, 50, '2', 1, 'V6', 'vol n11', '2024-07-09 15:27:00', 'vol n11', 'vol n11', '2024-07-17 15:27:00'),
(698, 71, 'Totam velit repudian', 1, 'Vel sed et est nesc', 'Velit esse quam au', '1998-10-01 20:55:00', 'Eius delectus optio', 'In voluptatibus moll', '2003-02-25 04:02:00'),
(699, 59, '3', 1, 'Voluptate esse aliq', 'Numquam perspiciatis', '2003-03-22 03:53:00', 'Asperiores iusto mol', 'Molestiae mollit ani', '1977-01-16 11:07:00'),
(700, 72, '3', 1, 'Voluptate esse aliq', 'Numquam perspiciatis', '2003-03-22 03:53:00', 'Asperiores iusto mol', 'Molestiae mollit ani', '1977-01-16 11:07:00'),
(701, 111, '3', 1, '1', '1', '2024-07-16 21:54:00', 'ihih', 'oujguj', '2024-07-25 21:54:00'),
(702, 279, '3', 1, 's1', 'Animi totam nemo al', '1984-02-21 15:33:00', 'Sint veniam fugiat ', 'Amet voluptas ipsum', '1972-02-12 03:35:00'),
(703, 278, '2', 1, 'Accusamus iusto cons', 'Dolore debitis dolor', '2002-08-19 00:25:00', 'Vero laudantium qui', 'Saepe cupiditate ut ', '2011-02-23 20:43:00'),
(704, 277, '2', 1, 'Mollit sit et enim ', 'Quasi sit debitis mi', '1977-06-28 23:44:00', 'Voluptate voluptatem', 'Esse voluptas volup', '1983-12-27 17:11:00'),
(705, 276, '5', 1, 'v1', 'Animi totam nemo al', '1984-02-21 15:33:00', 'Sint veniam fugiat ', 'Amet voluptas ipsum', '1972-02-12 03:35:00'),
(706, 318, '5', 1, 'v1', 'Animi totam nemo al', '1984-02-21 15:33:00', 'Sint veniam fugiat ', 'Amet voluptas ipsum', '1972-02-12 03:35:00'),
(707, 319, '2', 1, 'Mollit sit et enim ', 'Quasi sit debitis mi', '1977-06-28 23:44:00', 'Voluptate voluptatem', 'Esse voluptas volup', '1983-12-27 17:11:00'),
(708, 321, '3', 1, 's1', 'Animi totam nemo al', '1984-02-21 15:33:00', 'Sint veniam fugiat ', 'Amet voluptas ipsum', '1972-02-12 03:35:00'),
(709, 62, 'Similique ratione en', 1, 'Quaerat facere est o', 'Dolore cumque dolori', '1972-11-06 06:57:00', 'Itaque sapiente et o', 'Culpa hic sint ipsa', '1988-05-07 17:24:00'),
(710, 62, 'Architecto est asper', 1, 'Deserunt qui pariatu', 'Odio atque cum offic', '1982-12-03 09:27:00', 'Excepturi similique ', 'Fuga Ex sint verit', '2014-01-25 02:01:00'),
(714, 338, 'Aut velit consequat', 1, 'Numquam aliqua Dolo', 'Beatae ea commodo et', '1996-03-03 22:09:00', 'Vel pariatur Do qui', 'Culpa animi est i', '2011-02-18 21:30:00'),
(717, 340, 'Aut velit consequat', 1, 'Numquam aliqua Dolo', 'Beatae ea commodo et', '1996-03-03 22:09:00', 'Vel pariatur Do qui', 'Culpa animi est i', '2011-02-18 21:30:00'),
(719, 342, 'Aut velit consequat', 1, 'Numquam aliqua Dolo', 'Beatae ea commodo et', '1996-03-03 22:09:00', 'Vel pariatur Do qui', 'Culpa animi est i', '2011-02-18 21:30:00'),
(758, 364, 'P4', 1, 'Laudantium debitis ', 'Ut magna incididunt ', '2003-08-15 18:26:00', 'Earum et quia dicta ', 'Enim omnis eligendi ', '1986-10-25 14:59:00'),
(759, 364, 'P6', 1, 'Autem non magnam ape', 'Nihil voluptatem El', '1987-05-07 14:42:00', 'Tempore aliquip ape', 'Nihil at eu qui sit', '1981-09-19 22:19:00'),
(760, 364, 'P8', 1, 'vol n12', 'vol n12', '2024-07-22 13:18:00', 'vol n11', 'vol n11', '2024-07-19 13:18:00'),
(761, 333, 'Sousse', 1, 'Tempore nihil vel s', 'Commodi laboriosam ', '1980-07-01 19:46:00', 'Dicta sed eligendi d', 'Sit amet harum ani', '1975-12-14 07:16:00'),
(762, 333, 'Tunis', 1, 'Recusandae Cumque s', 'Iste optio Nam ut c', '2011-01-13 18:10:00', 'Hic in reprehenderit', 'Pariatur Culpa ab ', '1974-05-03 03:34:00'),
(763, 336, 'Magna eius est volup', 1, 'Voluptatibus culpa b', 'Ea doloremque non do', '1981-03-09 10:12:00', 'Qui aperiam deserunt', 'Nostrud cillum repre', '2021-02-03 14:26:00'),
(770, 332, '3', 1, 'V1', 'Expedita proident q', '1998-12-23 05:17:00', 'Repellendus Officii', 'Accusantium laboris ', '1985-10-14 17:24:00'),
(771, 332, '2', 1, 'V2', 'Nihil et totam rerum', '2022-03-01 17:36:00', 'Qui velit dolorem mo', 'Aute dolores laboris', '2014-05-25 13:33:00'),
(772, 332, '3', 1, 'V3', 'Asperiores perferend', '2003-01-21 08:08:00', 'Quisquam accusantium', 'Eos consequatur pla', '2021-11-12 00:50:00'),
(773, 332, '2', 1, 'V4', 'vol n9', '2024-07-17 15:26:00', 'vol n11', 'vol n10', '2024-07-11 15:26:00'),
(774, 332, '2', 1, 'V5', 'vol n10', '2024-07-23 15:27:00', 'vol n10', 'vol n10', '2024-08-02 15:27:00'),
(775, 332, '2', 1, 'V6', 'vol n11', '2024-07-09 15:27:00', 'vol n11', 'vol n11', '2024-07-17 15:27:00'),
(776, 334, 'P4', 1, 'Laudantium debitis ', 'Ut magna incididunt ', '2003-08-15 18:26:00', 'Earum et quia dicta ', 'Enim omnis eligendi ', '1986-10-25 14:59:00'),
(777, 334, 'P6', 1, 'Autem non magnam ape', 'Nihil voluptatem El', '1987-05-07 14:42:00', 'Tempore aliquip ape', 'Nihil at eu qui sit', '1981-09-19 22:19:00'),
(778, 334, 'P8', 1, 'vol n12', 'vol n12', '2024-07-22 13:18:00', 'vol n11', 'vol n11', '2024-07-19 13:18:00'),
(786, 366, 'Sousse', 1, 'Tempore nihil vel s', 'Commodi laboriosam ', '1980-07-01 19:46:00', 'Dicta sed eligendi d', 'Sit amet harum ani', '1975-12-14 07:16:00'),
(787, 366, 'Tunis', 1, 'Recusandae Cumque s', 'Iste optio Nam ut c', '2011-01-13 18:10:00', 'Hic in reprehenderit', 'Pariatur Culpa ab ', '1974-05-03 03:34:00'),
(789, 367, 'P4', 1, 'Laudantium debitis ', 'Ut magna incididunt ', '2003-08-15 18:26:00', 'Earum et quia dicta ', 'Enim omnis eligendi ', '1986-10-25 14:59:00'),
(790, 367, 'P6', 1, 'Autem non magnam ape', 'Nihil voluptatem El', '1987-05-07 14:42:00', 'Tempore aliquip ape', 'Nihil at eu qui sit', '1981-09-19 22:19:00'),
(791, 367, 'P8', 1, 'vol n12', 'vol n12', '2024-07-22 13:18:00', 'vol n11', 'vol n11', '2024-07-19 13:18:00'),
(792, 368, 'Magna eius est volup', 1, 'Voluptatibus culpa b', 'Ea doloremque non do', '1981-03-09 10:12:00', 'Qui aperiam deserunt', 'Nostrud cillum repre', '2021-02-03 14:26:00'),
(811, 365, '3', 1, 'V1', 'Expedita proident q', '1998-12-23 05:17:00', 'Repellendus Officii', 'Accusantium laboris ', '1985-10-14 17:24:00'),
(812, 365, '2', 1, 'V2', 'Nihil et totam rerum', '2022-03-01 17:36:00', 'Qui velit dolorem mo', 'Aute dolores laboris', '2014-05-25 13:33:00'),
(813, 365, '3', 1, 'V3', 'Asperiores perferend', '2003-01-21 08:08:00', 'Quisquam accusantium', 'Eos consequatur pla', '2021-11-12 00:50:00'),
(814, 365, '2', 1, 'V4', 'vol n9', '2024-07-17 15:26:00', 'vol n11', 'vol n10', '2024-07-11 15:26:00'),
(815, 365, '2', 1, 'V5', 'vol n10', '2024-07-23 15:27:00', 'vol n10', 'vol n10', '2024-08-02 15:27:00'),
(816, 365, '2', 1, 'V6', 'vol n11', '2024-07-09 15:27:00', 'vol n11', 'vol n11', '2024-07-17 15:27:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=817;

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
