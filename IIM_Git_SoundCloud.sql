-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Mer 14 Septembre 2016 à 15:05
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `iim_git_soundcloud`
--

-- --------------------------------------------------------

--
-- Structure de la table `musics`
--

CREATE TABLE `musics` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'refers to id in users table',
  `title` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `musics`
--

INSERT INTO `musics` (`id`, `user_id`, `title`, `file`, `created_at`) VALUES
(1, 1, 'UN*DEUX - Shopping Day', 'musics/d0dbde0148d66ddf8ae815e014e2a668.1.mp3', '2015-10-01 13:35:05'),
(2, 1, 'FlicFlac - Can\'t Get Away (Bootleg)', 'musics/4baf839a4706fdc8caf286cd35dba410.1.mp3', '2015-10-02 11:41:26');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'encrypted passwords are better',
  `picture` varchar(255) NOT NULL COMMENT 'name of profile picture',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `picture`, `created_at`) VALUES
(1, 'Git', 'git@initiation.com', 'password', 'view/profil_pic/e8df43b8a90546b15da8591c89711879.1.jpg', '2015-10-01 11:13:46'),
(11, 'Nico', 'nico@gmail.com', '410ec15153a6dff0bed851467309bcbd', '', '2016-09-13 17:46:27'),
(12, 'Niconico', 'niconico@gmail.com', '990f1231beef96e676782e73d7ce8833', '', '2016-09-13 19:13:14');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;