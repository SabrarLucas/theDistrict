-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 02 juin 2023 à 11:28
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `thedistrict`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `image`, `active`) VALUES
(1, 'Burger', 'dd75b58a7026f63af2482d4dccb3de87.webp', 1),
(2, 'Pizza', '0bf25dbad28a74183173f6d19156e218.webp', 1),
(3, 'Pasta', '77f58819279142345c2fb741cfa6a45e.webp', 1),
(4, 'Sandwich', '605384b8bfe8bc84fe8a471e7ff82b93.webp', 1),
(5, 'Veggie', 'e447eac866ec1b839522a87fa8d7a67e.webp', 0),
(6, 'Wrap', 'c4090162beb9cebbe1dabefc832da87d.webp', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `commanded_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `total` decimal(6,2) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `utilisateur_id`, `commanded_at`, `total`, `etat`) VALUES
(26, 1, '2023-05-24 15:11:17', '15.98', 0),
(27, 1, '2023-05-30 10:56:18', '6.00', 0),
(28, 1, '2023-05-30 11:31:37', '6.00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `image` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `categorie_id`, `libelle`, `description`, `prix`, `image`, `active`) VALUES
(1, 1, 'Crazy burger', 'zeuyigfzqeiflgereuhqbfzse', '12.63', '9880a60bb8b31ab3f985df933e612526.webp', 1),
(3, 4, 'Sand wich', 'regqesrgfqezrgfseregqtq', '6.00', 'f23aa05f3684f6554d8a39bfd152d548.webp', 1),
(6, 3, 'Les pâtes', 'rgsrgqrgqsrqsterfzert<rgferqgr', '13.65', 'd4d66d959e5e9158c6559191584b9677.webp', 1),
(7, 1, 'Burger miam', 'gfdthjyhfhjtfg', '13.00', '117921868cd173479a2d576b587c57a1.webp', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` varchar(20) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `telephone`, `adresse`, `cp`, `ville`) VALUES
(1, 'lucas.pinchon@mail.fr', '[\"ROLE_ADMIN\"]', '$2y$13$9W2jahUHRKQqrXiKINDbfuITjWEB5lggQF3dslkaXQQQN2/Yg7CG.', 'Pinchon', 'Lucas', '06 12 34 56 78', '30 Rue de Poulainville', '80000', 'Amiens'),
(2, 'popo@hgg.fr', '[\"ROLE_USER\"]', '$2y$13$lwheuBcWWAX.IhBcArNPIuFFfYPx/JggBkQzELak9IxKpJiN8hi2S', 'henry', 'popo', '0615858595', '55rue du pot', '47400', 'popocity');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2038A207BCF5E72D` (`categorie_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A207BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
