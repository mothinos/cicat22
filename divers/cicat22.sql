-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Mars 2017 à 09:59
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cicat22`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_event` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `event_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id_event`, `titre`, `date`, `description`, `lieu`, `event_img`) VALUES
(27, 'test1', '2017-12-31', 'RIEN', 'ici', ''),
(28, 'lol', '2014-11-28', 'rien', 'ici', '');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `nom_partenaire` varchar(255) NOT NULL,
  `competences` varchar(255) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `site` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`id_partenaire`, `nom_partenaire`, `competences`, `secteur`, `site`) VALUES
(1, 'Thomas', 'developpe le site web', 'd\'habitude je fais des lumières', 'lanef.ddns.net'),
(2, 'Alan', 'cpnum', 'developpeur Web', 'www.alan.fr'),
(3, 'Luc', 'porteur de projet', 'aide à domicile', 'www.luc.fr'),
(4, 'APF22', 'nous accueil', 'aide les personnes paralisées', 'www.apf.asso.fr');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `status` enum('root','admin','basic') NOT NULL DEFAULT 'basic'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `status`) VALUES
(33, 'admin', 'admin@admin.admin', '$2y$10$PSuGQEcvmIOG6pNH.j5nNu5G9T25G5p2WfhkyK6jw6jEBImLxPo2a', NULL, '2017-03-28 16:32:49', NULL, NULL, NULL, 'admin'),
(34, 'basic', 'basic@basic.basic', '$2y$10$41Kn4Bb2ptCvYMGGgqxUp.hcszKBLKLPTFdQJyn/8Jo1CpoAH2kxi', NULL, '2017-03-28 16:49:20', NULL, NULL, NULL, 'basic'),
(35, 'root', 'root@root.root', '$2y$10$qqprjUuTNZvPPFkgR.M0SubpR4gHaR394d/naGU1mEf69T.tTAysG', NULL, '2017-03-28 17:04:01', NULL, NULL, NULL, 'root');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
