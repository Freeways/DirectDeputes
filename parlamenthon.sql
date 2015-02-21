-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 08 Février 2015 à 08:49
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `parlamenthon`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `contenue` varchar(254) DEFAULT NULL,
  `dateC` date DEFAULT NULL,
  `dep` int(11) DEFAULT NULL,
  `usr` int(11) DEFAULT NULL,
  `subj` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `fk13` (`dep`),
  KEY `fk15` (`subj`),
  KEY `fk14` (`usr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commissions`
--

CREATE TABLE IF NOT EXISTS `commissions` (
  `id_commission` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_commission`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commissions`
--

INSERT INTO `commissions` (`id_commission`, `nom`) VALUES
(0, 'nida1');

-- --------------------------------------------------------

--
-- Structure de la table `deputes`
--

CREATE TABLE IF NOT EXISTS `deputes` (
  `id_deputy` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `cin` int(11) DEFAULT NULL,
  `login` varchar(254) DEFAULT NULL,
  `pswd` varchar(254) DEFAULT NULL,
  `votep` int(11) DEFAULT NULL,
  `votem` int(11) DEFAULT NULL,
  `reg` int(11) DEFAULT NULL,
  `com` int(11) DEFAULT NULL,
  `par` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_deputy`),
  KEY `fk1` (`reg`),
  KEY `com` (`com`),
  KEY `par` (`par`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `deputes`
--

INSERT INTO `deputes` (`id_deputy`, `nom`, `prenom`, `email`, `cin`, `login`, `pswd`, `votep`, `votem`, `reg`, `com`, `par`) VALUES
(0, 'fe', 'rg', 'efz', 68, 'ef', 'ef', 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messagesenvoyes`
--

CREATE TABLE IF NOT EXISTS `messagesenvoyes` (
  `id_messagesEnvoyé` int(11) NOT NULL,
  `contenu` varchar(254) DEFAULT NULL,
  `emetteurU` int(11) DEFAULT NULL,
  `emetteurD` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_messagesEnvoyé`),
  KEY `fk5` (`emetteurU`),
  KEY `fk6` (`emetteurD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messagesrecus`
--

CREATE TABLE IF NOT EXISTS `messagesrecus` (
  `id_messagesRecu` int(11) NOT NULL,
  `contenu` varchar(254) DEFAULT NULL,
  `recepteurU` int(11) DEFAULT NULL,
  `recepteurD` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_messagesRecu`),
  KEY `fk7` (`recepteurU`),
  KEY `fk8` (`recepteurD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `id_partie` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_partie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parties`
--

INSERT INTO `parties` (`id_partie`, `nom`) VALUES
(0, 'takatol');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id_region` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `regions`
--

INSERT INTO `regions` (`id_region`, `nom`) VALUES
(1, 'tunis'),
(2, 'Ariana');

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE IF NOT EXISTS `sujets` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(254) DEFAULT NULL,
  `contenue` varchar(254) DEFAULT NULL,
  `dateC` date DEFAULT NULL,
  `reg` int(8) NOT NULL,
  `votep` int(11) DEFAULT NULL,
  `votem` int(11) DEFAULT NULL,
  `dep` int(11) DEFAULT NULL,
  `usr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sujet`),
  UNIQUE KEY `dep` (`dep`),
  KEY `fk12` (`usr`),
  KEY `reg` (`reg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sujets`
--

INSERT INTO `sujets` (`id_sujet`, `titre`, `contenue`, `dateC`, `reg`, `votep`, `votem`, `dep`, `usr`) VALUES
(1, 'ze', 'ez', '0000-00-00', 1, 1, -1, NULL, 1),
(2, 'martyrs', '------------------------------------------------------------------------', '2015-02-25', 2, 3, 0, NULL, NULL),
(3, 'rg', 'rg', '0000-00-00', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `reg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk10` (`reg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `reg`) VALUES
(1, 'test', 'test', 'jfffg@hghgg.com', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk13` FOREIGN KEY (`dep`) REFERENCES `deputes` (`id_deputy`),
  ADD CONSTRAINT `fk15` FOREIGN KEY (`subj`) REFERENCES `sujets` (`id_sujet`),
  ADD CONSTRAINT `fk14` FOREIGN KEY (`usr`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `deputes`
--
ALTER TABLE `deputes`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`reg`) REFERENCES `regions` (`id_region`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`com`) REFERENCES `commissions` (`id_commission`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`par`) REFERENCES `parties` (`id_partie`);

--
-- Contraintes pour la table `messagesenvoyes`
--
ALTER TABLE `messagesenvoyes`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`emetteurU`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk6` FOREIGN KEY (`emetteurD`) REFERENCES `deputes` (`id_deputy`);

--
-- Contraintes pour la table `messagesrecus`
--
ALTER TABLE `messagesrecus`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`recepteurU`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk8` FOREIGN KEY (`recepteurD`) REFERENCES `deputes` (`id_deputy`);

--
-- Contraintes pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD CONSTRAINT `fk11` FOREIGN KEY (`dep`) REFERENCES `deputes` (`id_deputy`),
  ADD CONSTRAINT `fk12` FOREIGN KEY (`usr`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `sujets_ibfk_1` FOREIGN KEY (`reg`) REFERENCES `regions` (`id_region`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`reg`) REFERENCES `regions` (`id_region`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
