-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 déc. 2023 à 23:30
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
-- Base de données : `cv_php_db`
--

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entr`, `name_entr`, `adr_entr`) VALUES
(1, 'Ulamir', 'Morlaix'),
(2, 'Le Saint', 'Brest'),
(3, 'Le Télégramme', 'Morlaix');

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_exp`, `titre_exp`, `start_exp`, `end_exp`, `tache_exp`, `id_entr_exp`) VALUES
(1, 'Agent de maintenance informatique', '2020-10-01', '2021-08-31', 'Reconditionnement de PC, Programmation C#, Formation de prise en main de matériel informatique', 1),
(2, 'Stage développement', '2023-04-01', '2023-06-01', 'Implémentation et Modification de Table BDD SQL, codage C# web, html/Css et JavaScript', 2),
(3, 'Stage de développement', '2023-12-04', '2023-12-08', 'Création d\'un documentation API, création base donnée via Symfony, création d\'une API sous Symfony.', 3);

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_form`, `inti_form`, `start_date_form`, `end_date_form`, `form_end`, `desc_form`, `id_orga_form`) VALUES
(1, 'BTS SIO option SLAM', '2023-09-04', '2024-05-31', 0, 'Formation intensive en 1 an, centrée sur l’acquisition de pratiques professionnelles, permettant une reconversion adaptée aux contrainte des demandeurs, le BTS SIO permet d’acquérir des compétences variées couvrant un large spectre : fondamentaux et généralités de l’informatique (serveur, réseau, mise en service) ; développement d’applications sur client lourd, web et web mobile ; bases indispensables dans le domaine de la cybersécurité au niveau applicatif et sur l’environnement côté serveur.', 1);

--
-- Déchargement des données de la table `langage`
--

INSERT INTO `langage` (`id_lang`, `name_lang`, `lev_lang`, `img_lang`) VALUES
(1, 'C#', 6, 'cs'),
(2, 'Java', 5, 'Java'),
(3, 'Html', 6, 'html5'),
(4, 'PHP', 5, 'PHP'),
(5, 'JavaScript', 4, 'javascript'),
(6, 'Css', 6, 'css');

--
-- Déchargement des données de la table `orga_formation`
--

INSERT INTO `orga_formation` (`id_orga`, `name_orga`, `ville_orga`, `codep_orga`, `adr_orga`) VALUES
(1, 'Greta', 'Lannion', '22XXX', 'a changer plus tard');

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `titre_projet`, `text_projet`, `img_projet`, `id_exp_projet`, `id_form_projet`) VALUES
(1, 'Géstionnaire de stock C#', 'Gestion de stock en C#, permettant de répertorier des ordinateur et récupérer des données en base de données au forma tableur', 'gds4', 1, NULL),
(2, 'CV Web', 'Vous êtes dessus', 'cv_php', NULL, NULL),
(3, 'API pour la parti Footamateur du Télégramme', 'Création des API pour les article de Footamateur du site du Télégramme, ainsi que la documentation pour les developpeurs front-end.', 'footamateur', 3, NULL);

--
-- Déchargement des données de la table `utilise`
--

INSERT INTO `utilise` (`id_ut`, `id_lang_ut`, `id_exp_ut`, `id_projet_ut`, `id_form_ut`) VALUES
(19, 1, NULL, 1, NULL),
(20, 1, 2, NULL, NULL),
(21, 3, 2, NULL, NULL),
(22, 5, 2, NULL, NULL),
(23, 1, 1, NULL, NULL),
(24, 2, 1, NULL, NULL),
(25, 4, NULL, 2, NULL),
(26, 3, NULL, 2, NULL),
(27, 5, NULL, 2, NULL),
(28, 4, NULL, 3, NULL),
(29, 4, 3, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
