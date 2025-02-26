-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 fév. 2025 à 06:16
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `s_management_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee_academiques`
--

CREATE TABLE `annee_academiques` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `debut_annee` varchar(255) DEFAULT NULL,
  `fin_annee` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `annee_academiques`
--

INSERT INTO `annee_academiques` (`id`, `libelle`, `debut_annee`, `fin_annee`, `created_at`, `updated_at`) VALUES
(1, '2023-2024', '18-09-2023', '2024-06-14', '20240120', '2024-08-20 15:29:23'),
(2, '2024-2025', '16-09-2024', '2025-06-20', '20240120', '2024-08-20 15:29:23'),
(3, '2025-2026', '2025-08-21', '2026-09-20', '2024-08-20 15:29:33', '2024-08-21 15:30:15'),
(4, '2026-2027', '2026-08-21', '2027-06-20', '2024-08-20 18:06:52', '2024-08-22 13:12:11');

-- --------------------------------------------------------

--
-- Structure de la table `belletins`
--

CREATE TABLE `belletins` (
  `id` int(12) NOT NULL,
  `discipline_id` int(11) DEFAULT NULL,
  `coef_disc` float DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `moy` float DEFAULT NULL,
  `moy_coef` float DEFAULT NULL,
  `rang_mat` varchar(255) DEFAULT NULL,
  `appreciation` varchar(255) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `effectif_c` int(50) DEFAULT NULL,
  `niveau_id` bigint(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `libelle`, `effectif_c`, `niveau_id`, `created_at`, `updated_at`) VALUES
(1, '6eme5', 15, 1, '2024-08-29 07:05:26', '2024-08-29 07:05:26'),
(2, '5eme5', 7, 1, '20240120', '20240120'),
(3, 'Tle D', 23, 7, '20240302', '20240302'),
(4, '1ere D1', 19, 6, '20240302', '20240302'),
(5, '6ème1', 10, 14, '2024-08-29 01:05:25', '2024-08-29 01:05:25'),
(6, '5ème4', 23, 15, '2024-08-29 21:00:20', '2024-08-29 21:00:20'),
(7, '2nde C1', 23, 19, '2024-10-22 13:56:07', '2024-10-22 13:56:07'),
(8, '2nde A1', 21, 19, '2024-10-22 14:29:12', '2024-10-22 14:29:12');

-- --------------------------------------------------------

--
-- Structure de la table `cycles`
--

CREATE TABLE `cycles` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `annee_academique_id` bigint(20) DEFAULT NULL,
  `etablissement_id` bigint(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `cycles`
--

INSERT INTO `cycles` (`id`, `libelle`, `annee_academique_id`, `etablissement_id`, `created_at`, `updated_at`) VALUES
(1, '1er Cycle', 1, 1, '20240303', '20240303'),
(2, '2e Cycle', 1, 1, '20240303', '20240303'),
(3, '1er Cycle', 2, 9, '20240303', '20240303'),
(4, '2e Cycle', 2, 9, '20240303', '20240303'),
(5, '1er Cycle', 1, 3, '2024-08-28 18:50:03', '2024-08-28 18:50:03'),
(6, '2e Cycle', 1, 3, '2024-08-28 18:38:13', '2024-08-28 18:38:13'),
(7, '1er Cycle', 1, 9, '2024-09-14 09:10:45', '2024-09-14 09:10:45');

-- --------------------------------------------------------

--
-- Structure de la table `details`
--

CREATE TABLE `details` (
  `id` int(20) NOT NULL,
  `nom_detail` varchar(255) DEFAULT NULL,
  `discipline_id` int(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `details`
--

INSERT INTO `details` (`id`, `nom_detail`, `discipline_id`, `created_at`, `updated_at`) VALUES
(1, 'Composition Française', 1, '20240604', '20240604'),
(2, 'Dictée question', 1, '20240604', '20240604'),
(3, 'Expression Ecrite', 1, '20240604', '20240604');

-- --------------------------------------------------------

--
-- Structure de la table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `type_disc` varchar(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `disciplines`
--

INSERT INTO `disciplines` (`id`, `libelle`, `type_disc`, `created_at`, `updated_at`) VALUES
(1, 'Anglais', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(2, 'Histoire-Geographie', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(3, 'Français', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(4, 'Espagnol', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(5, 'Allemand', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(6, 'Science de la vie et de la terre', 'Science', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(7, 'Philisophie', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(8, 'Physique-Chimie', 'Science', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(9, 'Mathématiques', 'Science', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(10, 'Chinois', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(11, 'Grec', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(12, 'Education Physique et Sportive', 'Autre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(13, 'Musique', 'Autre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(14, 'Arabe', 'Lettre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(15, 'Conduite', 'Autre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(16, 'Arts Plastiques', 'Autre', '2024-06-17 12:29:03', '2024-06-17 12:29:03'),
(17, 'EDHC', 'Autre', '2024-06-17 12:29:03', '2024-06-17 12:29:03');

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenoms` varchar(255) DEFAULT NULL,
  `date_nais` varchar(255) DEFAULT NULL,
  `lieu_nais` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL,
  `redoublant` varchar(10) DEFAULT NULL,
  `regime` varchar(50) DEFAULT NULL,
  `affecte` varchar(10) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `classe_id` bigint(20) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenoms`, `date_nais`, `lieu_nais`, `sexe`, `nationalite`, `matricule`, `redoublant`, `regime`, `affecte`, `photo`, `classe_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'KOUAME', 'N\'guessan Bedel', '1990-04-07', 'Tiebissou', 'H', 'Ivoirienne', '07055027P', 'Non', 'Boursier', 'Oui', 'photo_KOFFI_1724348347_cdELqfAsaR.jpg', 6, 36, '20240120', '20240302'),
(2, 'ALLIALI', 'Nogues', '01-01-1996', 'Cocody', 'H', 'Ivoirienne', '07055027R', 'Non', 'Boursier', 'Oui', 'IMG_20220718_130757~2.jpg', 1, NULL, '20240120', '20240302'),
(4, 'ALLIALI', 'Ahou rosalie', '01-03-1988', 'Didievi', 'F', 'Ivoirienne', '06012283R', 'Non', 'Non Boursier', 'Oui', 'photo_KOFFI_1724348347_cdELqfAsaR.jpg', 6, 36, '20240302', '20240302'),
(5, 'ALLIALI', 'Yao Richard', '01-01-2011', 'Abidjan', 'H', 'Ivoirienne', '07092883H', 'Non', 'Non Boursier', 'Non', 'Richard.jpg', 1, NULL, '20240302', '20240302'),
(6, 'KONATE', 'Karim', '02-04-2006', 'Ouagadougou', 'H', 'Ivoirienne', '10012283R', 'Non', 'Non Boursier', 'Oui', 'IMG-20230616-WA0001.jpg', 2, NULL, '20240302', '20240302'),
(7, 'KOFFI', 'Konan Paulin', '1998-08-22', 'Bingerville', 'H', 'Ivoirienne', '07055027D', 'Non', 'Boursier', 'Oui', 'photo_KOFFI_1724348347_cdELqfAsaR.jpg', 1, 36, '2024-08-22 11:53:44', '2024-08-22 17:39:07');

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

CREATE TABLE `etablissements` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse_postale` varchar(255) DEFAULT NULL,
  `localisation` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `commune` varchar(255) DEFAULT NULL,
  `quartier` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `etablissements`
--

INSERT INTO `etablissements` (`id`, `nom`, `statut`, `code`, `telephone`, `email`, `adresse_postale`, `localisation`, `logo`, `photo`, `region`, `departement`, `ville`, `commune`, `quartier`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Jules verne', 'Privé', '00652', '0793637373', 'jv@gmail.com', ' BP 02 COCODY 09', NULL, 'jw.PNG', NULL, 'Lagunes', 'Abidjan sud', 'Abidjan', 'Cocody', 'Lauriers', NULL, NULL, NULL),
(2, 'Sdsd', 'Public', '54545', '2344234234', 'dsd@yahoo.com', 'dvfd', NULL, 'image.png', NULL, 'Bfgfg', 'Ggfgtf', 'Utyty', 'Thtrhth', 'Tthty', NULL, NULL, NULL),
(3, 'College Moderne Didievi', 'Semi-privé', '445455', '5344344344', 'cmd@hotmail.com', 'BP 89 Didievi', NULL, NULL, NULL, 'Bcvvbcbdf', 'Fgdfgdfggf', 'Gfhhf', 'Fghfghgh', 'Ghgfhff', NULL, '2024-08-24 11:50:47', '2024-08-24 11:50:47'),
(4, 'Dfsdffs', 'Privé', '4333', '4345453224', 'dsdf@gmail.com', 'dfgfdgfd', NULL, 'Capture.PNG', NULL, 'Ghgbghffgffgf', 'Gfhfghfghfhf', 'Hfghfghhfg', 'H', 'Fg', NULL, NULL, NULL),
(9, 'Lycee Moderne De Didievi', 'Privé', '00651', '+225 0759711172', 'lmd@gmail.com', 'BP 221 Didievi', 'Didiévi, Sur La Route De Yamoussoukro', 'logo_lycee_moderne_de_didievi_1724500247_kdpaihdhql.png', '', NULL, NULL, 'Didievi', NULL, NULL, 36, '2024-08-24 11:50:47', '2024-08-25 11:06:15');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `coef` float DEFAULT NULL,
  `discipline_id` int(11) DEFAULT NULL,
  `coef_disc` float DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT current_timestamp(),
  `updated_at` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `type`, `coef`, `discipline_id`, `coef_disc`, `classe_id`, `user_id`, `periode_id`, `created_at`, `updated_at`) VALUES
(1, 'Interrogation', 1, 2, 2, 6, 33, 4, '2024-09-30 11:34:18', '2024-09-30 11:34:18'),
(2, 'Devoir de niveau', 2, 2, 2, 6, 33, 4, '2024-09-30 11:36:40', '2024-09-30 11:36:40'),
(3, 'Devoir de niveau', 2, 1, 2, 1, 33, 5, '2024-10-22 14:31:12', '2024-10-22 14:31:12');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `intervenir`
--

CREATE TABLE `intervenir` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `classe_id` bigint(20) DEFAULT NULL,
  `pp` tinyint(1) DEFAULT 0,
  `created_at` varchar(255) DEFAULT current_timestamp(),
  `updated_at` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `intervenir`
--

INSERT INTO `intervenir` (`id`, `user_id`, `classe_id`, `pp`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 0, '2024-08-29 21:28:57', '2024-08-29 21:28:57'),
(2, 6, 2, 0, '2024-08-29 21:28:57', '2024-08-29 21:28:57'),
(3, 27, 2, 0, '2024-08-29 21:28:57', '2024-08-29 21:28:57'),
(4, 33, 6, 1, '2024-08-29 21:29:29', '2024-08-29 21:29:29'),
(5, 33, 1, 0, '2024-10-22 12:52:39', '2024-10-22 12:52:39'),
(6, 33, 7, 0, '2024-10-22 14:22:59', '2024-10-22 14:22:59'),
(7, 29, 8, 0, '2024-10-22 14:29:58', '2024-10-22 14:29:58');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_27_083959_create_sessions_table', 1),
(7, '2023_11_09_115757_create_roles_table', 2),
(8, '2023_11_09_120951_add_role_id_to_users_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `moyennes`
--

CREATE TABLE `moyennes` (
  `id` int(12) NOT NULL,
  `moy` varchar(255) DEFAULT NULL,
  `moy_coef` varchar(255) DEFAULT NULL,
  `rang` varchar(255) DEFAULT NULL,
  `appreciation` varchar(255) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `discipline_id` int(11) DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT current_timestamp(),
  `updated_at` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveaus`
--

CREATE TABLE `niveaus` (
  `id` bigint(20) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `cycle_id` bigint(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `niveaus`
--

INSERT INTO `niveaus` (`id`, `libelle`, `cycle_id`, `created_at`, `updated_at`) VALUES
(1, '6ème', 3, '20240604', '20240604'),
(2, '5ème', 3, '20240604', '20240604'),
(3, '4ème', 1, '20240604', '20240604'),
(4, '3ème', 1, '20240604', '20240604'),
(5, '2nde A', 2, '20240604', '20240604'),
(6, '2nde C', 2, '20240604', '20240604'),
(7, '1ère A', 2, '20240604', '20240604'),
(8, '1ère C', 2, '20240604', '20240604'),
(9, '1ère D', 2, '20240604', '20240604'),
(10, 'Tle A1', 2, '20240604', '20240604'),
(11, 'Tle A2', 2, '20240604', '20240604'),
(12, 'Tle C', 2, '20240604', '20240604'),
(13, 'Tle D', 2, '20240604', '20240604'),
(14, '6ème', 5, '2024-08-28 22:53:07', '2024-08-28 22:53:07'),
(15, '5ème', 5, '2024-08-28 22:57:33', '2024-08-28 22:57:33'),
(16, '4ème', 5, '2024-08-28 22:58:07', '2024-08-28 22:58:07'),
(17, '3ème', 5, '2024-08-28 22:58:36', '2024-08-28 22:58:36'),
(18, '6ème', 7, '2024-09-14 11:29:26', '2024-09-14 11:29:26'),
(19, '2nde', 4, '2024-09-14 11:39:15', '2024-09-14 11:39:15'),
(20, '1ère', 4, '2024-09-14 11:40:20', '2024-09-14 11:40:20');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(12) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `evaluation_id` int(11) DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT current_timestamp(),
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `note`, `evaluation_id`, `eleve_id`, `created_at`, `updated_at`) VALUES
(1, '12.00', 1, 4, '2024-09-30 11:34:41', '2024-09-30 11:34:41'),
(2, '14.00', 1, 1, '2024-09-30 11:34:56', '2024-09-30 11:34:56'),
(3, '16.50', 2, 4, '2024-10-02 13:27:21', '2024-10-02 13:27:21'),
(4, '15.00', 2, 1, '2024-10-02 13:27:49', '2024-10-02 13:27:49'),
(5, '15.75', 3, 7, '2024-10-22 14:31:33', '2024-10-22 14:31:33');

-- --------------------------------------------------------

--
-- Structure de la table `notes_old`
--

CREATE TABLE `notes_old` (
  `id` bigint(20) NOT NULL,
  `note1` varchar(255) DEFAULT NULL,
  `coef_n1` int(11) DEFAULT NULL,
  `note2` varchar(255) DEFAULT NULL,
  `coef_n2` int(11) DEFAULT NULL,
  `note3` varchar(255) DEFAULT NULL,
  `coef_n3` int(11) DEFAULT NULL,
  `note4` varchar(255) DEFAULT NULL,
  `coef_n4` int(11) DEFAULT NULL,
  `note5` varchar(255) DEFAULT NULL,
  `coef_n5` int(11) DEFAULT NULL,
  `note6` varchar(255) DEFAULT NULL,
  `coef_n6` int(11) DEFAULT NULL,
  `note7` varchar(255) DEFAULT NULL,
  `coef_n7` int(11) DEFAULT NULL,
  `eleve_id` bigint(20) DEFAULT NULL,
  `discipline_id` bigint(20) DEFAULT NULL,
  `coefDisci` int(8) DEFAULT NULL,
  `moy` double DEFAULT NULL,
  `appreciation` varchar(255) DEFAULT NULL,
  `rangEleve` varchar(8) DEFAULT NULL,
  `period` int(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `notes_old`
--

INSERT INTO `notes_old` (`id`, `note1`, `coef_n1`, `note2`, `coef_n2`, `note3`, `coef_n3`, `note4`, `coef_n4`, `note5`, `coef_n5`, `note6`, `coef_n6`, `note7`, `coef_n7`, `eleve_id`, `discipline_id`, `coefDisci`, `moy`, `appreciation`, `rangEleve`, `period`, `user_id`) VALUES
(1, '17.5', 2, '15', 1, '12.75', 1, '13', 1, '16', 1, '16', 1, '11.5', 1, 2, 8, 2, 14.91, NULL, '1 er', NULL, 6),
(2, '13.5', 2, '15', 2, '14', 3, '18', 1, '12.5', 4, '1', 1, '1', 1, 2, 9, 3, 12.07, 'Bien', '1 er', 1, 6),
(5, '11', 4, '13', 4, '14', 1, '10', 1, '1', 1, '1', 1, '1', 1, 1, 8, NULL, 9.46, NULL, '4 è', NULL, 6),
(6, '10', 4, '13', 4, '16', 1, '11', 1, '1', 1, '1', 1, '1', 1, 1, 9, NULL, 9.38, NULL, '2 è', NULL, 6),
(7, '13', 4, '12', 4, '11', 1, '10', 1, '1', 1, '1', 1, '1', 1, 4, 8, NULL, 9.54, NULL, '2 è', NULL, 6),
(8, '13', 4, '12', 4, '11', 1, '10', 1, '1', 1, '1', 1, '1', 1, 5, 8, NULL, 9.54, NULL, '2 è ex', NULL, 6),
(9, '16', 2, '18', 2, '17', 3, '15', 4, '1', 1, '1', 1, '1', 1, 4, 9, 3, 13, 'Assez Bien', NULL, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(12) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `anne_academique_id` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT current_timestamp(),
  `updated_at` varchar(255) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `periodes`
--

CREATE TABLE `periodes` (
  `id` int(20) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `libelle` varchar(80) DEFAULT NULL,
  `annee_academique_id` int(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `periodes`
--

INSERT INTO `periodes` (`id`, `type`, `libelle`, `annee_academique_id`, `created_at`, `updated_at`) VALUES
(1, 'Trimestre', '1er Trimestre', 1, '2024-08-27 22:12:49', '2024-08-27 22:12:49'),
(2, 'Trimestre', '2e Trimestre', 1, '2024-08-27 22:12:49', '2024-08-27 22:12:49'),
(3, 'Trimestre', '3e Trimestre', 1, '2024-08-27 22:12:49', '2024-08-27 22:12:49'),
(4, 'Trimestre', '1er Trimestre', 2, '2024-08-27 22:13:11', '2024-08-27 22:13:11'),
(5, 'Trimestre', '2e Trimestre', 2, '2024-08-27 22:13:11', '2024-08-27 22:13:11'),
(6, 'Trimestre', '3e Trimestre', 2, '2024-08-27 22:13:11', '2024-08-27 22:13:11');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 34, 'token', '6eadaecc9053a08159d43e0e9f76bfec6b115d71f6a9f6b41907d6ff8d559f2e', '[\"*\"]', NULL, NULL, '2024-03-24 14:30:05', '2024-03-24 14:30:05'),
(2, 'App\\Models\\User', 34, 'token', '7df5bf4b19861065c8b088bdd2d9bfe1cab69fd3f45301bcabaac702dc2d99d8', '[\"*\"]', NULL, NULL, '2024-03-24 14:30:34', '2024-03-24 14:30:34'),
(3, 'App\\Models\\User', 34, 'token', '16b9a8f1562ad738f6102c00723d537ca2dd41da4a2c769673bfae0658797541', '[\"*\"]', NULL, NULL, '2024-03-24 14:31:43', '2024-03-24 14:31:43'),
(4, 'App\\Models\\User', 34, 'token', '117e8b4fd900163119f159f418c71f5880532ddccb40fb1bf2ad680ba015af11', '[\"*\"]', NULL, NULL, '2024-03-24 14:35:07', '2024-03-24 14:35:07'),
(5, 'App\\Models\\User', 34, 'token', '1179e9f7554be3aaa77cffbb9d83b386c395453def35a3928e19421eb16cc68a', '[\"*\"]', NULL, NULL, '2024-03-24 14:36:49', '2024-03-24 14:36:49'),
(6, 'App\\Models\\User', 34, 'token', 'f3cd9e7f848d4432da097e64bf012c643911a5897a48a70428e165063ef763e6', '[\"*\"]', NULL, NULL, '2024-03-24 14:39:09', '2024-03-24 14:39:09'),
(7, 'App\\Models\\User', 1, 'token', '5c3be5e38a780064e9918be028ba008d4061f4b0f802aed97a4e564d9144d354', '[\"*\"]', NULL, NULL, '2024-03-24 14:45:53', '2024-03-24 14:45:53'),
(8, 'App\\Models\\User', 1, 'token', 'c64890676188c1cf90bf2fdc5445af0aaa468f16beeb6e84c49ef7c8698639ee', '[\"*\"]', NULL, NULL, '2024-03-24 14:47:55', '2024-03-24 14:47:55'),
(9, 'App\\Models\\User', 1, 'token', '2f40fa3acac78b699858b06e04770e8560cb67957baefa8a0f3fe54853815dbc', '[\"*\"]', NULL, NULL, '2024-03-24 14:48:06', '2024-03-24 14:48:06'),
(10, 'App\\Models\\User', 1, 'token', '134f1a3b58a8e5be83a6c0f0c38d1365d76c43c3fd0619267621e5e13c55fd2f', '[\"*\"]', NULL, NULL, '2024-03-24 14:48:46', '2024-03-24 14:48:46'),
(11, 'App\\Models\\User', 1, 'token', 'abd76d27f7770aa8ae39961ef3cab2398903b8c333cf18347806126c37bb64fc', '[\"*\"]', NULL, NULL, '2024-03-24 14:50:36', '2024-03-24 14:50:36'),
(12, 'App\\Models\\User', 1, 'token', 'ffee31998cc3df16ccfe04dbdf8786099d420bd239db939735649ef448ca520f', '[\"*\"]', NULL, NULL, '2024-03-24 14:51:42', '2024-03-24 14:51:42'),
(13, 'App\\Models\\User', 1, 'token', '402ccb558854705aeffcc6381c59517c72d72ce0572e7e35e9107204c392b2e7', '[\"*\"]', NULL, NULL, '2024-03-24 14:55:37', '2024-03-24 14:55:37'),
(14, 'App\\Models\\User', 1, 'token', '5808ae6bb1da8607a4c76d65b58251cb8830c144878b4d380f236a538b4cec39', '[\"*\"]', NULL, NULL, '2024-03-24 14:56:26', '2024-03-24 14:56:26'),
(15, 'App\\Models\\User', 1, 'token', 'e55ebfc48e04c55e9b18c29ceb91a6ebd2052d6aa6ed21f11db08031bceba7e6', '[\"*\"]', NULL, NULL, '2024-03-24 14:58:03', '2024-03-24 14:58:03'),
(16, 'App\\Models\\User', 1, 'token', '7f1f5ff240c1541fb7572ccc7435a249d72e7ac424d6eccafc7d1709d6f3df83', '[\"*\"]', NULL, NULL, '2024-03-24 15:00:06', '2024-03-24 15:00:06'),
(17, 'App\\Models\\User', 1, 'token', '2eb37acd1d82f36d53c9ceed52b18f59f1a02ccbd250969f7b604a2a49280282', '[\"*\"]', NULL, NULL, '2024-03-24 15:00:19', '2024-03-24 15:00:19'),
(18, 'App\\Models\\User', 1, 'token', 'da10dc0fcdd7c88279456c297a47f78d97ec8596b2ec0b21312a04e62fab5242', '[\"*\"]', NULL, NULL, '2024-03-24 15:00:31', '2024-03-24 15:00:31'),
(19, 'App\\Models\\User', 1, 'token', '2cec5772e3461af5a7f50c6f47d3eb8dbfafc301c03626a6c3b841e004613798', '[\"*\"]', NULL, NULL, '2024-03-24 15:02:14', '2024-03-24 15:02:14'),
(20, 'App\\Models\\User', 1, 'token', '05b46f4b5bee071ee79f75e3a85c13333ee8b0a45ab6399c2bc8cea3a22a88e9', '[\"*\"]', NULL, NULL, '2024-03-24 15:02:22', '2024-03-24 15:02:22'),
(21, 'App\\Models\\User', 1, 'token', 'ccc38943237fa0d24e2a5c0b731a4c75101659f91f0705d16e0dd7753b3d02c8', '[\"*\"]', NULL, NULL, '2024-03-24 15:02:27', '2024-03-24 15:02:27'),
(22, 'App\\Models\\User', 1, 'token', '164d21e1fb019a29d6faaa4f3762939e3ab0f97b8831ede6c65acc99a6ade4ae', '[\"*\"]', NULL, NULL, '2024-03-24 15:02:40', '2024-03-24 15:02:40'),
(23, 'App\\Models\\User', 1, 'token', 'e2d6c00cfd77f06199baea92c55fcbd1578bb829265456f28bb12e79caadbdb7', '[\"*\"]', NULL, NULL, '2024-03-24 15:02:48', '2024-03-24 15:02:48'),
(24, 'App\\Models\\User', 1, 'token', '4fc6a718e52b03bafba4b253de277c7cbaeba052c15094e3ed462083067ac4b7', '[\"*\"]', NULL, NULL, '2024-03-24 15:11:01', '2024-03-24 15:11:01'),
(25, 'App\\Models\\User', 1, 'token', 'c6b3c3e751e906c4275db70239d6f16ecff12454320ddae7aba84fabe3903827', '[\"*\"]', NULL, NULL, '2024-03-24 15:13:23', '2024-03-24 15:13:23'),
(26, 'App\\Models\\User', 1, 'token', '85dc9c78ca9ae62957a025d0bf0dfdea33509aaf82ca532a9308168dadd0313a', '[\"*\"]', NULL, NULL, '2024-03-24 15:14:43', '2024-03-24 15:14:43'),
(27, 'App\\Models\\User', 1, 'token', 'f5d5cf628b21870684889aac7737363ce200ca4e9426834479d14c717d5a461c', '[\"*\"]', NULL, NULL, '2024-03-24 15:19:26', '2024-03-24 15:19:26'),
(28, 'App\\Models\\User', 1, 'token', '2c41d21376b96ad2653cdaf585cd34537163fb1e47b7fefd516ba00d0468cff0', '[\"*\"]', NULL, NULL, '2024-03-24 15:22:12', '2024-03-24 15:22:12'),
(29, 'App\\Models\\User', 6, 'token', '610586ecfe63ce9355f35fbc389ee49ce9f459f148cd5761060b03e199af12ff', '[\"*\"]', NULL, NULL, '2024-03-24 15:25:14', '2024-03-24 15:25:14'),
(30, 'App\\Models\\User', 6, 'token', '2e805db1fbdfe77b5892643ba3bc941d3747265bc5a19fb8e91f85b040f2cbb1', '[\"*\"]', NULL, NULL, '2024-03-24 15:39:05', '2024-03-24 15:39:05'),
(31, 'App\\Models\\User', 6, 'token', '60a8b2bf5713bc839efa7c8265016af67e241171e4d3fca22dfa626a95f9fa81', '[\"*\"]', NULL, NULL, '2024-03-24 15:43:44', '2024-03-24 15:43:44'),
(32, 'App\\Models\\User', 6, 'token', 'fb14f072afac901d7bdfa85c443899bc65601e3bfa8eefe4aaf40772275c9156', '[\"*\"]', NULL, NULL, '2024-03-25 10:14:49', '2024-03-25 10:14:49'),
(33, 'App\\Models\\User', 6, 'token', 'eea0bcd1c32c14ce9b1eda100557b3efa37d1036ab982470368f46882e96493f', '[\"*\"]', NULL, NULL, '2024-03-25 10:39:15', '2024-03-25 10:39:15'),
(34, 'App\\Models\\User', 6, 'token', '5b16ea5c4a435ae33d62ca1b2eebb0652c92f0795ecd4d8ed844442b18d4dfc7', '[\"*\"]', NULL, NULL, '2024-03-25 11:40:04', '2024-03-25 11:40:04'),
(35, 'App\\Models\\User', 6, 'token', '9fcb06e7a6790a6e4e9eb0a39736fd66df9338af9dc75e6cdb81f1db2fb51ad4', '[\"*\"]', NULL, NULL, '2024-03-25 12:08:17', '2024-03-25 12:08:17'),
(36, 'App\\Models\\User', 6, 'token', 'bd031a1c199dbbfdcf3ab0d98cf42f7eb133548c54343b1282021efd5c54f5fa', '[\"*\"]', NULL, NULL, '2024-06-03 15:43:22', '2024-06-03 15:43:22'),
(37, 'App\\Models\\User', 6, 'token', '3069946d7da06b3319b14321860dfcb93993cf7a3aa2b6cbb5d162922c72d626', '[\"*\"]', NULL, NULL, '2024-06-04 10:00:34', '2024-06-04 10:00:34'),
(38, 'App\\Models\\User', 6, 'token', 'd5773bed3a52790b3ae7f3d1accb4e77b310d99425734c8282d7a03b9c24fa47', '[\"*\"]', NULL, NULL, '2024-06-04 10:05:45', '2024-06-04 10:05:45'),
(39, 'App\\Models\\User', 6, 'token', 'de100b1723b01ead4f5d5a78de8a9c3d3ed706dfdb973ea036b43fb520033ca4', '[\"*\"]', NULL, NULL, '2024-06-04 10:08:49', '2024-06-04 10:08:49'),
(40, 'App\\Models\\User', 6, 'token', '83cf78c2a75e9057dd4cb28aabf83d2e45340ab2d9ef6f542be574ea7ccf3d79', '[\"*\"]', NULL, NULL, '2024-06-04 10:10:51', '2024-06-04 10:10:51'),
(41, 'App\\Models\\User', 6, 'token', '71e397f06d4629f290861ccc961eb7054e7fd4ab21a0a4df35605b967ba30990', '[\"*\"]', NULL, NULL, '2024-06-04 10:16:45', '2024-06-04 10:16:45'),
(42, 'App\\Models\\User', 6, 'token', 'eb82d468f65382fd6475515b85a77ccc84b76c3825ab8b11cefe4717b3ccbf63', '[\"*\"]', NULL, NULL, '2024-06-04 10:18:18', '2024-06-04 10:18:18'),
(43, 'App\\Models\\User', 6, 'token', 'a301f949c9f49d0a451ff3d6cf79fae40f78fc350585961c829462fbbde78bcc', '[\"*\"]', NULL, NULL, '2024-06-04 10:20:00', '2024-06-04 10:20:00'),
(44, 'App\\Models\\User', 6, 'token', 'dc0704f44a30ffc872c6e8bddefc36f627d2b0390e9c63e88ebe55b2df17ebca', '[\"*\"]', NULL, NULL, '2024-06-04 10:45:45', '2024-06-04 10:45:45'),
(45, 'App\\Models\\User', 6, 'token', '8baf0f085adc39dcf49d241153044d12468fa93053e12935b2368058903651b2', '[\"*\"]', NULL, NULL, '2024-06-04 10:48:13', '2024-06-04 10:48:13'),
(46, 'App\\Models\\User', 6, 'token', '6b055e73963fe63aec33606aa0ad31253043af899a942e7541468a98f9ffa5d3', '[\"*\"]', NULL, NULL, '2024-06-04 10:50:38', '2024-06-04 10:50:38'),
(47, 'App\\Models\\User', 6, 'token', 'e07487df5bdbebd8ea2cb3a3a4c9e1c0d06c0c2e4f108d60b7c34a0268b3c598', '[\"*\"]', NULL, NULL, '2024-06-04 11:09:32', '2024-06-04 11:09:32'),
(48, 'App\\Models\\User', 6, 'token', '944de30175a51cab454934ada6945fc04ccbde062ec1df3016e3030c12f54171', '[\"*\"]', NULL, NULL, '2024-06-04 11:18:04', '2024-06-04 11:18:04'),
(49, 'App\\Models\\User', 6, 'token', 'd14ada74cc93c439f1c37fdaac13fe6c2bd84058446f194e3435a00504cf6910', '[\"*\"]', NULL, NULL, '2024-06-04 11:20:02', '2024-06-04 11:20:02'),
(50, 'App\\Models\\User', 6, 'token', '89cf537508c6709740bab34b42b27c341f3912518ca99c3a4392ba81f4634573', '[\"*\"]', NULL, NULL, '2024-06-04 11:22:01', '2024-06-04 11:22:01'),
(51, 'App\\Models\\User', 6, 'token', 'f7653f33f17fd067905e41fd194a5981d3bf7de5c83182dad978be81913d6d35', '[\"*\"]', NULL, NULL, '2024-06-04 11:23:48', '2024-06-04 11:23:48'),
(52, 'App\\Models\\User', 6, 'token', '2a4526bbe0bb83a36914100014036603836f3a970791de2c037aac9e0760f4ea', '[\"*\"]', NULL, NULL, '2024-06-04 11:24:42', '2024-06-04 11:24:42'),
(53, 'App\\Models\\User', 6, 'token', '604586a8f38e56133b18d131b041dda438ee7021bcf1d33169c82481e673a3a7', '[\"*\"]', NULL, NULL, '2024-06-04 11:26:01', '2024-06-04 11:26:01'),
(54, 'App\\Models\\User', 6, 'token', 'd3ca0fb9eb5ea6cf41abcd72f947870f6c52ae03f40dd69919902b749cada94b', '[\"*\"]', NULL, NULL, '2024-06-04 11:29:28', '2024-06-04 11:29:28'),
(55, 'App\\Models\\User', 6, 'token', 'a0a5658ada9ea174e1c38c996705a75a35de584cb7214e9bdaeba315e6b63519', '[\"*\"]', NULL, NULL, '2024-06-04 11:30:21', '2024-06-04 11:30:21'),
(56, 'App\\Models\\User', 6, 'token', 'c5b22e4f49bfbe54768d08cda2ef2a94087a0ead22ad60420b3acf29e6f3f532', '[\"*\"]', NULL, NULL, '2024-06-04 11:36:46', '2024-06-04 11:36:46'),
(57, 'App\\Models\\User', 6, 'token', 'ae77d51b0b2d9b4c3602b568dbf1b20e4b0a0a25f105ca1b2a396e6afc2e3344', '[\"*\"]', NULL, NULL, '2024-06-04 11:45:45', '2024-06-04 11:45:45'),
(58, 'App\\Models\\User', 6, 'token', '356646b65c1990800416113f391a16d1f93c6df90e8a00179d55d5b5f76a8382', '[\"*\"]', NULL, NULL, '2024-06-04 12:20:53', '2024-06-04 12:20:53'),
(59, 'App\\Models\\User', 6, 'token', '4274e7f7af06786e5269e7c8ee0045315fbd25791ddcc35c492b5e59515b7ad8', '[\"*\"]', NULL, NULL, '2024-06-04 12:23:13', '2024-06-04 12:23:13'),
(60, 'App\\Models\\User', 6, 'token', 'efe61b25aac55fb784dda0237ecfdf7a52ac1876208624aed295262065506095', '[\"*\"]', NULL, NULL, '2024-06-04 12:24:51', '2024-06-04 12:24:51'),
(61, 'App\\Models\\User', 6, 'token', 'bf965ea5c45b39128f12e909197975274d62deb0f5cd0df9634cbb6183915ccf', '[\"*\"]', NULL, NULL, '2024-06-04 12:33:42', '2024-06-04 12:33:42'),
(62, 'App\\Models\\User', 6, 'token', '9c2651fea458e599dda9e52589eef4919a272cbfa1540f69134830463233b5d6', '[\"*\"]', NULL, NULL, '2024-06-04 12:36:46', '2024-06-04 12:36:46'),
(63, 'App\\Models\\User', 6, 'token', 'a5a3a160900f6362f973961f62b64f61558fe84c9cfc512fec161895724222e1', '[\"*\"]', NULL, NULL, '2024-06-04 12:39:28', '2024-06-04 12:39:28'),
(64, 'App\\Models\\User', 6, 'token', 'c7f80add7196034ff3cafd8c9d4686a131d47995ec67b2759378cdb3906b3df9', '[\"*\"]', NULL, NULL, '2024-06-04 12:41:28', '2024-06-04 12:41:28'),
(65, 'App\\Models\\User', 6, 'token', 'a17c54696478e850b7ce6506ae25cea61eb8d95afbe3c3ac2a538ce49ba08f12', '[\"*\"]', NULL, NULL, '2024-06-04 12:47:44', '2024-06-04 12:47:44'),
(66, 'App\\Models\\User', 6, 'token', '61ff6d782580a3bfda952f2c8f1bd75fc04cf8fc5c3865a68bff68c9ee8eb6ae', '[\"*\"]', NULL, NULL, '2024-06-04 12:49:25', '2024-06-04 12:49:25'),
(67, 'App\\Models\\User', 6, 'token', 'd0429af5a3ac7f0ea1df8387f9b87cc4f9bc82c1a1736eee71a86024c9932ef8', '[\"*\"]', NULL, NULL, '2024-06-04 12:51:34', '2024-06-04 12:51:34'),
(68, 'App\\Models\\User', 6, 'token', '45637da71438ae1d58f51f871fb96a19ddd6203142b3f63f25a3b93cb37cfc1b', '[\"*\"]', NULL, NULL, '2024-06-04 12:55:35', '2024-06-04 12:55:35'),
(69, 'App\\Models\\User', 6, 'token', 'fa527719c96799473d0f2a6aaf2b6ed8c8d0f34d21ce8b7ebdaa73a9bdc99121', '[\"*\"]', NULL, NULL, '2024-06-04 12:58:06', '2024-06-04 12:58:06'),
(70, 'App\\Models\\User', 1, 'token', '9f49658b28eb6dc4ebfa4d7a99465de9eec683c19733323dc353af2f16eb8b01', '[\"*\"]', NULL, NULL, '2024-06-17 12:11:19', '2024-06-17 12:11:19'),
(71, 'App\\Models\\User', 6, 'token', '04538dd1000eb5365e6c79ac1d30a7952d012af594d4b11a7457247d86323313', '[\"*\"]', NULL, NULL, '2024-06-17 12:30:20', '2024-06-17 12:30:20'),
(72, 'App\\Models\\User', 6, 'token', '79e7148e82a76c644e1b44893fea15361b229e0261dc176dd48eddfbbb8bdd10', '[\"*\"]', NULL, NULL, '2024-06-17 13:17:08', '2024-06-17 13:17:08'),
(73, 'App\\Models\\User', 6, 'token', 'f727dd2cd7f3442924c1175ff94549ef69936a7d03f71e612a911dbc0966c5d4', '[\"*\"]', NULL, NULL, '2024-06-17 13:21:28', '2024-06-17 13:21:28'),
(74, 'App\\Models\\User', 6, 'token', 'd5c5ed5aad737d94933ca02ced377403a8364a74389ee1a7fc316257cc6e478b', '[\"*\"]', NULL, NULL, '2024-06-17 14:06:41', '2024-06-17 14:06:41'),
(75, 'App\\Models\\User', 6, 'token', 'bbafb7d019a69bf5a1ec609b52d0781429f6dd44e44f8ba54bb2b9b52008ad6b', '[\"*\"]', NULL, NULL, '2024-06-17 14:09:02', '2024-06-17 14:09:02'),
(76, 'App\\Models\\User', 6, 'token', 'a85cfac5b2f0b67e4bf1b559b0141b6e366ffc1da55298ed1547332d662cde73', '[\"*\"]', NULL, NULL, '2024-06-17 14:14:44', '2024-06-17 14:14:44'),
(77, 'App\\Models\\User', 6, 'token', '53cfbb0425c6fcc71dcd27f9fb2492279a779306cd0d52817f02ce1cd35cffa1', '[\"*\"]', NULL, NULL, '2024-06-18 12:20:13', '2024-06-18 12:20:13'),
(78, 'App\\Models\\User', 6, 'token', 'c03ea87885dd74fb9ce4ab5f4beb9de3280a58db4256dcf9ffc0f977000db072', '[\"*\"]', NULL, NULL, '2024-06-18 12:20:38', '2024-06-18 12:20:38'),
(79, 'App\\Models\\User', 6, 'token', 'a595e2df832ba17b911d42c6327d0e5b9c6da352adf08325257ddaa897bbc6ee', '[\"*\"]', NULL, NULL, '2024-06-18 12:25:04', '2024-06-18 12:25:04'),
(80, 'App\\Models\\User', 6, 'token', '9995ff3e00f3acfc207fd7d3cfe856fe05e31954069e537fdbdf50ec00ca35d9', '[\"*\"]', NULL, NULL, '2024-06-18 12:28:16', '2024-06-18 12:28:16'),
(81, 'App\\Models\\User', 6, 'token', '14f7c94d4fc64b55f2eef9659a512d549dc2d6dbfa1eebf4788d034249762ffd', '[\"*\"]', NULL, NULL, '2024-06-18 12:32:50', '2024-06-18 12:32:50'),
(82, 'App\\Models\\User', 6, 'token', '20ed9d2894fca915349431dddddf399ba2e264a5de9f5a5479aece685e2e4bb1', '[\"*\"]', NULL, NULL, '2024-06-18 12:34:52', '2024-06-18 12:34:52'),
(83, 'App\\Models\\User', 6, 'token', 'ddcdd3b50fdd98aa4f87f0e488377c43ec3583427372a18ff6aec7f6bd060a9f', '[\"*\"]', NULL, NULL, '2024-06-18 13:01:40', '2024-06-18 13:01:40'),
(84, 'App\\Models\\User', 6, 'token', 'b78378abf37189bd94cc3ad60f12963617ee3528972fbeba7f8c8e25e8386666', '[\"*\"]', NULL, NULL, '2024-06-18 13:06:05', '2024-06-18 13:06:05'),
(85, 'App\\Models\\User', 6, 'token', '6718be161a9db38693009112953d9827eeacef99de71ad6857fb2974f144a9a6', '[\"*\"]', NULL, NULL, '2024-06-18 13:14:58', '2024-06-18 13:14:58'),
(86, 'App\\Models\\User', 6, 'token', '1036c6e3723426099d17e178571e1efb151a5333cdb3a297dcee11326b2f4602', '[\"*\"]', NULL, NULL, '2024-06-18 13:22:36', '2024-06-18 13:22:36'),
(87, 'App\\Models\\User', 6, 'token', '53d6758d23f05c4d7dc040fe6ca2386af584b7ab5c63f1546f75bc1d7291462c', '[\"*\"]', NULL, NULL, '2024-08-13 13:56:18', '2024-08-13 13:56:18'),
(88, 'App\\Models\\User', 6, 'token', 'c1a2317357b4a5234b81b5a5f71483ec1ab6e3511fc0db5e81ffaa4f176257f9', '[\"*\"]', NULL, NULL, '2024-08-13 16:36:41', '2024-08-13 16:36:41'),
(89, 'App\\Models\\User', 6, 'token', '2c399c4adbdd47cdc3f4ff4c8befdfe8bdb80c03ba1a729055cd3062ecd2d0f4', '[\"*\"]', NULL, NULL, '2024-08-13 16:39:17', '2024-08-13 16:39:17'),
(90, 'App\\Models\\User', 6, 'token', 'cf256f0966d7b3762cdaf9c76c1c7cc1a3045d91ab3b979ef81e492832544b19', '[\"*\"]', NULL, NULL, '2025-01-31 15:50:46', '2025-01-31 15:50:46'),
(91, 'App\\Models\\User', 6, 'token', 'ea6c58b2962b81feaec19bf93672e5d1227ce9af47fc08706a7f97028827457e', '[\"*\"]', NULL, NULL, '2025-01-31 15:51:11', '2025-01-31 15:51:11'),
(92, 'App\\Models\\User', 6, 'token', '13d1b9b31de8dcb15b3019b36d0381dcff8ec26492d4f241d631f63d7ef8d23b', '[\"*\"]', NULL, NULL, '2025-01-31 15:51:26', '2025-01-31 15:51:26'),
(93, 'App\\Models\\User', 6, 'token', 'bc1d8b47b2ad01e0c973a81de9d8e53f3636ba0d99ae9a89d5744ef0a714be4b', '[\"*\"]', NULL, NULL, '2025-01-31 15:51:36', '2025-01-31 15:51:36');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrateur de l\'équipe des développeurs', '2023-11-09 12:25:01', '2023-11-09 12:25:01'),
(2, 'Dirigeant', NULL, '2023-11-09 12:25:01', '2023-11-09 12:25:01'),
(3, 'Enseignant', NULL, '2023-11-09 12:25:01', '2023-11-09 12:25:01'),
(4, 'Enseignant principal', NULL, '2023-11-09 12:25:01', '2023-11-09 12:25:01'),
(5, 'Educateur', NULL, '2023-11-09 12:25:01', '2023-11-09 12:25:01'),
(6, 'Censeur', NULL, '2023-11-09 12:25:01', '2023-11-09 12:25:01'),
(7, 'Econome', NULL, '2023-11-09 12:25:01', '2023-11-09 12:25:01');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` int(20) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `niveau_id` int(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `libelle`, `niveau_id`, `created_at`, `updated_at`) VALUES
(1, 'A', 19, '2024-09-15 10:56:57', '2024-09-15 10:56:57'),
(2, 'C', 19, '2024-09-15 11:12:08', '2024-09-15 11:12:08'),
(3, 'A1', 20, '2024-09-15 11:20:39', '2024-09-15 11:20:39');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6FMxlUu1COD4hjecImTJ3VITj7Ts4QS8U0SBDvIZ', 1, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibVZoRVhhU0JJZHl3WVhUNm9uOFNZNG52QVJOWk9CdXdRQm56WEZHQSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRZUTVmb2ttdEVnY2NOVTFsMGNiV29PekxETGRFMjZRMmtkM0pXZC50M282bVB2OXZLdlZyYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1702400996);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenoms` varchar(255) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `passwords` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `discip_princ` bigint(20) UNSIGNED DEFAULT NULL,
  `discip_second` bigint(20) UNSIGNED DEFAULT NULL,
  `discipline_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenoms`, `sexe`, `telephone`, `email`, `profile_photo_path`, `login`, `passwords`, `role_id`, `created_by`, `discip_princ`, `discip_second`, `discipline_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ALLIALI', 'Nogues', NULL, '0506439352', 'alliali.dev@gmail.com', '_20180112_232437.JPG', 'alliali01', '$2y$12$wa5h.lQqJ0PFYONCApo.5O2vwDNAkYjhbySSG2atHAOlt.QlxTabu', 1, NULL, 0, NULL, NULL, NULL, '2023-11-09 12:25:01', '2024-03-24 12:39:49'),
(6, 'YAO', 'Koffi Serge', NULL, '0745899828', 'koffi@gmail.com', 'IMG_20100101_023120_933_1262313421897.jpg', 'yao02', '$2y$12$sHBe1kln7A3G9U1ZntrSzOytDgzEZqZtZY0NQX.ATbrJWDDC2wgGC', 4, NULL, 8, 9, NULL, NULL, '2024-01-22 00:00:00', '2024-06-03 15:42:34'),
(7, 'ZADI', 'Soro', NULL, '0743453423', 'zadi@gmail.com', 'WhatsApp Image 2024-01-08 at 08.43.50_485fcf43.jpg', 'arobase12', 'XbLtOWVZBJW1/feLNKs', 5, NULL, NULL, NULL, NULL, NULL, '2024-01-22 00:00:00', '2024-03-02 00:00:00'),
(27, 'Ouattara', 'Toure', NULL, '0134342343', 'toure@gmail.com', 'WhatsApp Image 2024-01-08 at 08.43.50_8d9d3c66.jpg', 'kolo65', '$2y$12$fdkhDAlS1dl.W3UlilRGYeOsZnfmWvGDkb/xD5Do9CLuX9Y0fqcN6', 7, NULL, NULL, NULL, NULL, NULL, '2024-01-22 00:00:00', '2024-03-02 00:00:00'),
(29, 'KOUAKOU', 'Kouadio Prosper', 'H', '9768788787', 'kp@gmail.com', 'YVEO_logo.png', 'kprosper01', '$2y$12$NOxCg6vqxcRff8I5oI578.kJeu.WNjNdowMN5lgtAoWQ2EGn1m9oW', 3, 36, 3, NULL, NULL, NULL, '1970-08-23 06:18:40', '2024-03-24 11:56:32'),
(30, 'CAMARA', 'Laye', NULL, '0508494473', 'camara@gmail.com', 'Richard.jpg', 'camara02', '$2y$12$ksBFmda5uuTZ0YmEit7EKuAm/vizkys0eeORWZJY6sNivKEGPZsw2', 4, NULL, 3, NULL, NULL, NULL, '2024-03-20 13:47:19', '2024-03-20 13:47:19'),
(31, 'AKJ', 'Soldat', NULL, '0544105096', 'akj@cc.ci', 'Avatar.png', 'akj09', '$2y$12$DNkuyEyoO7WKE485G0AfsuHOVGrnMBsojiFe/9GxJrNTbIhidUSGi', 6, NULL, 1, NULL, NULL, NULL, '2024-03-20 13:56:26', '2024-03-24 12:03:34'),
(32, 'BAMBA', 'Youssof', NULL, '0194474389', 'bb@gmail.com', 'Avatar.png', 'bby20', '$2y$12$87RBd6YoYrKj91QyOIj50eboEMdgsVe3UX6iSH5TcLS1RjAKc7osG', 4, NULL, 1, NULL, NULL, NULL, '2024-03-20 14:16:01', '2024-03-20 14:16:01'),
(33, 'N\'GUESSAN', 'AMENAN LAETICIA', 'F', '+225 0145434524', 'nal@gmail.com', NULL, 'qwwqw24', '$2y$12$zNgyLPyMq0syF2bWNRZUh.qc.wsd1yeoNzBm2k0iTn5AJQhMgSMdC', 3, 36, 2, 0, '[\"1\",\"2\"]', NULL, '2024-03-20 14:21:20', '2024-10-02 14:48:14'),
(36, 'djaha', 'kouame firmin', NULL, '+225 0546502067', 'allialin43@gmail.com', 'profile-photo_djaha_1724411223_6IEsv3PvI2.JPG', NULL, '$2y$12$SF/zPnw53F7929Jku.9tfuUF0qYqXb9mwn7AvcaxgzZII47U1kX/.', 2, NULL, NULL, NULL, NULL, NULL, '2024-08-23 11:07:03', '2024-08-23 11:07:03'),
(37, 'KOUADIO', 'Yao Marcelin', NULL, '+225 0759711172', 'kouadio@gmail.com', 'avatar_kouadio_1724945348_syu1m4ddc8.png', NULL, '$2y$12$X5knbj.9885PanFp3YcXnu9rzVLkS6xiLCXKOXcKnBs0mthfHz0Ma', 3, NULL, 3, 0, NULL, NULL, '2024-08-29 15:29:09', '2024-08-29 15:29:09'),
(38, 'BAKAYOKO', 'Mamadou', NULL, '+225 0504781648', 'bakayoko@gmail.com', 'photo.png', NULL, '$2y$12$uZO487GVvg6ebKKW2/z/W.db5LLnTyZRBMaQ7oyTeKeciasps.eKS', 3, NULL, 1, 0, NULL, NULL, '2024-08-29 15:44:46', '2024-08-29 15:44:46'),
(39, 'BAKAYOKO', 'Mamadou', 'H', '+225 0504781647', 'bakayolo@gmail.com', 'photo.png', NULL, '$2y$12$8Q/DUCVMDOQW2icCjT9AOOKqdbd5M/Y46LCy0311FWpU9aBRpZZFK', 3, 36, 3, 11, NULL, NULL, '2024-08-29 15:48:37', '2024-08-29 16:38:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee_academiques`
--
ALTER TABLE `annee_academiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `belletins`
--
ALTER TABLE `belletins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe_id` (`niveau_id`);

--
-- Index pour la table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annee_academique_id` (`annee_academique_id`,`etablissement_id`),
  ADD KEY `etablissement_id` (`etablissement_id`);

--
-- Index pour la table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe_id` (`classe_id`);

--
-- Index pour la table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `intervenir`
--
ALTER TABLE `intervenir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`classe_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `moyennes`
--
ALTER TABLE `moyennes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaus`
--
ALTER TABLE `niveaus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cycle_id` (`cycle_id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes_old`
--
ALTER TABLE `notes_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eleve_id` (`eleve_id`,`discipline_id`,`user_id`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annee_academique_id` (`annee_academique_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee_academiques`
--
ALTER TABLE `annee_academiques`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `belletins`
--
ALTER TABLE `belletins`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `intervenir`
--
ALTER TABLE `intervenir`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `moyennes`
--
ALTER TABLE `moyennes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveaus`
--
ALTER TABLE `niveaus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `notes_old`
--
ALTER TABLE `notes_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cycles`
--
ALTER TABLE `cycles`
  ADD CONSTRAINT `cycles_ibfk_1` FOREIGN KEY (`annee_academique_id`) REFERENCES `annee_academiques` (`id`),
  ADD CONSTRAINT `cycles_ibfk_2` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
