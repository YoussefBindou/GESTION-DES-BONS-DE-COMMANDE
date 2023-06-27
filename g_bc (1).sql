-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 juin 2023 à 00:27
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `g_bc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `super_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `email`, `password`, `super_admin`) VALUES
(4, 'echarfi', 'mr', 'anasskhayy@gmail.com', '123', 1),
(5, 'ssdaoui', 'anass', 'anaskhay@gmail.com', '123', 0),
(8, 'admin', 'khya', 'aya@gmail.com', '123', 0),
(9, 'amraoui', 'moloud', 'doyouloveme@gmail.co', '123', 0),
(10, 'bindou', 'Bindou', 'youssefbindo@gmail.c', '123', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bon_commande`
--

CREATE TABLE `bon_commande` (
  `id_bcmd` int(11) NOT NULL,
  `num_bc` int(11) NOT NULL,
  `date_bnc` date NOT NULL,
  `object` varchar(400) NOT NULL,
  `date_ouverture` date NOT NULL,
  `num_consult` int(11) NOT NULL,
  `date_consult` date NOT NULL,
  `num_dec` int(11) NOT NULL,
  `date_dec` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  `offre_retenue` varchar(255) DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `date_reception` date DEFAULT NULL,
  `facture_numero` int(11) DEFAULT NULL,
  `date_signataire_ordonnateur` date DEFAULT NULL,
  `date_signataire_tresorier_payeur` date DEFAULT NULL,
  `op_numero` int(11) DEFAULT NULL,
  `ov_numero` int(11) DEFAULT NULL,
  `be` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bon_commande`
--

INSERT INTO `bon_commande` (`id_bcmd`, `num_bc`, `date_bnc`, `object`, `date_ouverture`, `num_consult`, `date_consult`, `num_dec`, `date_dec`, `id_admin`, `offre_retenue`, `montant`, `date_reception`, `facture_numero`, `date_signataire_ordonnateur`, `date_signataire_tresorier_payeur`, `op_numero`, `ov_numero`, `be`) VALUES
(7, 444, '2023-06-29', 'object...', '2023-06-25', 32, '2023-06-25', 123, '2023-05-31', 5, '1', 0, '2023-07-02', 0, '2023-07-08', '2023-06-14', 444, 0, 1),
(8, 123, '2023-06-29', 'object...', '2023-06-25', 32, '2023-06-25', 123, '2023-05-31', 5, '1', 0, '2023-07-02', 0, '2023-07-08', '2023-06-14', 444, 0, 1),
(10, 255, '2023-06-01', 'object...', '2023-06-07', 123, '2023-06-01', 322, '2023-06-01', 4, '1', 0, '0000-00-00', 0, '0000-00-00', '0000-00-00', 0, 0, 1),
(11, 122, '2023-06-24', 'object...', '2023-07-08', 351, '2023-07-01', 664, '2023-06-25', 8, '74444', 10000, '2023-06-23', 624139253, '2023-06-18', '2023-06-28', 66, 77, 55);

-- --------------------------------------------------------

--
-- Structure de la table `checkboxes`
--

CREATE TABLE `checkboxes` (
  `id_check` int(11) NOT NULL,
  `checkbox_name` varchar(255) DEFAULT NULL,
  `checkbox_value` varchar(255) DEFAULT NULL,
  `id_bcmd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `checkboxes`
--

INSERT INTO `checkboxes` (`id_check`, `checkbox_name`, `checkbox_value`, `id_bcmd`) VALUES
(244, 'DETERMATION BESOINS', NULL, 7),
(245, 'DECISION NORMITION DE LA COMMITION', NULL, 7),
(246, 'devis', NULL, 7),
(247, 'P.V.O', NULL, 7),
(248, 'BC', NULL, 7),
(249, 'CFich deng', NULL, 7),
(261, 'DETERMATION BESOINS', NULL, 8),
(262, 'DECISION NORMITION DE LA COMMITION', NULL, 8),
(263, 'devis', NULL, 8),
(264, 'P.V.O', NULL, 8),
(265, 'BC', NULL, 8),
(266, 'CFich deng', NULL, 8),
(267, 'B.L', NULL, 8),
(268, 'P.V.R', NULL, 8),
(269, 'ARM', NULL, 8),
(270, 'Attachement', NULL, 8),
(271, 'facture', NULL, 8),
(272, 'accuse de reception', NULL, 8),
(273, 'OP', NULL, 8),
(274, 'OV', NULL, 8),
(275, 'Decesion reception', NULL, 8),
(276, 'Attestation administrative', NULL, 8),
(277, 'DETERMATION BESOINS', NULL, 11),
(278, 'DECISION NORMITION DE LA COMMITION', NULL, 11),
(279, 'devis', NULL, 11),
(280, 'P.V.O', NULL, 11),
(281, 'BC', NULL, 11),
(282, 'CFich deng', NULL, 11),
(283, 'B.L', NULL, 11),
(284, 'P.V.R', NULL, 11),
(285, 'ARM', NULL, 11),
(286, 'Attachement', NULL, 11),
(287, 'facture', NULL, 11),
(288, 'accuse de reception', NULL, 11),
(289, 'OP', NULL, 11),
(290, 'OV', NULL, 11),
(291, 'Decesion reception', NULL, 11),
(292, 'Attestation administrative', NULL, 11),
(563, 'devis', NULL, 10),
(564, 'P.V.O', NULL, 10),
(565, 'BC', NULL, 10),
(566, 'CFich deng', NULL, 10),
(567, 'B.L', NULL, 10),
(568, 'P.V.R', NULL, 10),
(569, 'ARM', NULL, 10),
(570, 'Attachement', NULL, 10),
(571, 'facture', NULL, 10),
(572, 'accuse de reception', NULL, 10),
(573, 'OP', NULL, 10),
(574, 'OV', NULL, 10),
(575, 'Decesion reception', NULL, 10),
(576, 'Attestation administrative', NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_ste` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `localite` varchar(60) NOT NULL,
  `offre` double NOT NULL,
  `id_bnc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_ste`, `nom`, `localite`, `offre`, `id_bnc`) VALUES
(85, '444', '1111', 11111, 7),
(87, 'SAMAR', 'dakhla', 1000000, 8),
(88, 'STE KINDO', 'dakhla', 1000000, 8),
(89, 'bando', 'agadir', 5000000, 11),
(90, 'messi', 'dakhla', 10000, 11),
(93, 'messi', '9999', 222, 10);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `name_admin` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `num_bon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `name_admin`, `email`, `message`, `id_admin`, `num_bon`) VALUES
(17, 'ssdaoui', 'anaskhay@gmail.com', 'hhhhh', 4, 6),
(18, 'ssdaoui', 'anaskhay@gmail.com', 'nn', 5, 6),
(19, 'ssdaoui', 'anaskhay@gmail.com', 'u', 4, 88888),
(20, 'ssdaoui', 'anaskhay@gmail.com', 'kkkk', 4, 5555555),
(21, 'echarfi', 'anasskhayy@gmail.com', 'ka', 5, 444),
(22, 'ssdaoui', 'anaskhay@gmail.com', 'tata', 5, 444),
(23, 'echarfi', 'anasskhayy@gmail.com', 'nhznzsnsnsnsnsn', 5, 444),
(24, 'echarfi', 'anasskhayy@gmail.com', 'profprooofprooof', 5, 444),
(25, 'admin', 'aya@gmail.com', 'si charfi', 5, 444);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `bon_commande`
--
ALTER TABLE `bon_commande`
  ADD PRIMARY KEY (`id_bcmd`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Index pour la table `checkboxes`
--
ALTER TABLE `checkboxes`
  ADD PRIMARY KEY (`id_check`),
  ADD KEY `id_bcmd` (`id_bcmd`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_ste`),
  ADD KEY `fk_admineuu` (`id_bnc`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `bon_commande`
--
ALTER TABLE `bon_commande`
  MODIFY `id_bcmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `checkboxes`
--
ALTER TABLE `checkboxes`
  MODIFY `id_check` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_ste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bon_commande`
--
ALTER TABLE `bon_commande`
  ADD CONSTRAINT `bon_commande_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `checkboxes`
--
ALTER TABLE `checkboxes`
  ADD CONSTRAINT `fk_adminef` FOREIGN KEY (`id_bcmd`) REFERENCES `bon_commande` (`id_bcmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `fk_admineuu` FOREIGN KEY (`id_bnc`) REFERENCES `bon_commande` (`id_bcmd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_admine` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
