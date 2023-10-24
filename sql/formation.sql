-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 oct. 2023 à 12:03
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

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_form` int(11) NOT NULL,
  `inti_form` varchar(255) NOT NULL,
  `start_date_form` date NOT NULL,
  `end_date_form` date NOT NULL,
  `form_end` tinyint(1) NOT NULL,
  `desc_form` text NOT NULL,
  `id_orga_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_form`, `inti_form`, `start_date_form`, `end_date_form`, `form_end`, `desc_form`, `id_orga_form`) VALUES
(1, 'BTS SIO option SLAM', '2023-09-04', '2024-05-31', 0, 'Formation intensive en 1 an, centrée sur l’acquisition de pratiques professionnelles, permettant une reconversion adaptée aux contrainte des demandeurs, le BTS SIO permet d’acquérir des compétences variées couvrant un large spectre : fondamentaux et généralités de l’informatique (serveur, réseau, mise en service) ; développement d’applications sur client lourd, web et web mobile ; bases indispensables dans le domaine de la cybersécurité au niveau applicatif et sur l’environnement côté serveur.', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `id_orga_form` (`id_orga_form`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`id_orga_form`) REFERENCES `orga_formation` (`id_orga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
