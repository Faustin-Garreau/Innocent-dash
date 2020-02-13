-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 13 fév. 2020 à 10:12
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Base de données :  `innodash`
--
-- --------------------------------------------------------
--
-- Structure de la table `activity`
--
CREATE TABLE `activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `application`
--
CREATE TABLE `application` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `googleDocs` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `application_activity`
--
CREATE TABLE `application_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` int(10) UNSIGNED NOT NULL,
  `activity_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `archive`
--
CREATE TABLE `archive` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `googleDocs` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `user`
--
CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthday` int(11) NOT NULL,
  `discord` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Déchargement des données de la table `user`
--
INSERT INTO `user` (`id`, `pseudo`, `password`, `email`, `birthday`, `discord`, `admin`) VALUES
(9, 'alann', '$2y$10$I1kWh8u20ll2IXtcgXYqHO81wpOwAoDWGsVNS0LUpG5p2/hh/npGS', NULL, 19, NULL, 1),
(10, 'tom', '$2y$10$5l4u3CcejzhnPV4zjECHyep7fQNfQAkPF67ifKXpQIe.paTLwkjiq', NULL, 19, NULL, 1),
(11, 'hassen', '$2y$10$dEQIbAh2JBcXUhCYUzwoEuKOv9aUIP0DmlrXLLzRWnJdNNrJz.8iq', NULL, 18, NULL, 1),
(12, 'faustin', '$2y$10$YZRsS1ouyInbnWiX/kWAmufFLEGKfbGl9pjN5jL/v7r/nQSnajSMe', NULL, 18, NULL, 1);
--
-- Index pour les tables déchargées
--
--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);
--
-- Index pour la table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `firstname` (`firstname`),
  ADD KEY `FK_user` (`user_id`);
--
-- Index pour la table `application_activity`
--
ALTER TABLE `application_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_app` (`app_id`),
  ADD KEY `FK_activity` (`activity_id`);
--
-- Index pour la table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_archive` (`user_id`);
--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `discord` (`discord`);
--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `application_activity`
--
ALTER TABLE `application_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
--
-- Contraintes pour la table `application_activity`
--
ALTER TABLE `application_activity`
  ADD CONSTRAINT `FK_activity` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `FK_app` FOREIGN KEY (`app_id`) REFERENCES `application` (`id`);
--
-- Contraintes pour la table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `FK_archive` FOREIGN KEY (`user_id`) REFERENCES `archive` (`id`);