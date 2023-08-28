-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 août 2023 à 12:23
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cv_php_db`
--

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entr`, `name_entr`, `adr_entr`) VALUES
(1, 'Ulamir', 'Morlaix'),
(2, 'Le Saint', 'Brest');

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_exp`, `titre_exp`, `start_exp`, `end_exp`, `tache_exp`, `id_entr_exp`) VALUES
(1, 'Agent de maintenance informatique', '2020-10-01', '2021-08-31', 'Reconditionnement de PC, Programmation C#, Formation de prise en main de matériel informatique', 1),
(2, 'Stage développement', '2023-04-01', '2023-06-01', 'Implémentation et Modification de Table BDD SQL, codage C# web, html/Css et JavaScript', 2);

--
-- Déchargement des données de la table `langage`
--

INSERT INTO `langage` (`id_lang`, `name_lang`, `lev_lang`) VALUES
(1, 'C#', 6),
(2, 'Java', 4),
(3, 'Html/Css', 6),
(4, 'PHP', 5),
(5, 'JavaScript', 4);

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre_projet`, `text_projet`, `img_projet`, `id_exp_projet`) VALUES
(1, 'Géstionnaire de stock C#', 'Gestion de stock en C#, permettant de répertorier des ordinateur et récupérer des données en base de données au forma tableur', 'gds4', 1),
(2, 'CV Web', 'Vous êtes dessus', 'cv_php', NULL);

--
-- Déchargement des données de la table `utilise`
--

INSERT INTO `utilise` (`id_ut`, `id_lang_ut`, `id_exp_ut`, `id_projet_ut`) VALUES
(19, 1, NULL, 1),
(20, 1, 2, NULL),
(21, 3, 2, NULL),
(22, 5, 2, NULL),
(23, 1, 1, NULL),
(24, 2, 1, NULL),
(25, 4, NULL, 2),
(26, 3, NULL, 2),
(27, 5, NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
