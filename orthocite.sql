-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Juillet 2016 à 23:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `orthocite`
--

-- --------------------------------------------------------

--
-- Structure de la table `doorgame_1`
--

CREATE TABLE IF NOT EXISTS `doorgame_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word_valid` varchar(40) NOT NULL,
  `word_invalid_1` varchar(40) NOT NULL,
  `word_invalid_2` varchar(40) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  `district` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `doorgame_2`
--

CREATE TABLE IF NOT EXISTS `doorgame_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word_valid` varchar(40) NOT NULL,
  `word_invalid` varchar(40) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  `district` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `guessgame`
--

CREATE TABLE IF NOT EXISTS `guessgame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(40) NOT NULL,
  `validornot` int(11) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `platformer`
--

CREATE TABLE IF NOT EXISTS `platformer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word_valid` varchar(40) NOT NULL,
  `word_invalid_1` varchar(40) NOT NULL,
  `word_invalid_2` varchar(40) NOT NULL,
  `word_invalid_3` varchar(40) NOT NULL,
  `word_invalid_4` varchar(40) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  `district` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rearranger`
--

CREATE TABLE IF NOT EXISTS `rearranger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(40) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  `district` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stopgame`
--

CREATE TABLE IF NOT EXISTS `stopgame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupe` int(11) NOT NULL,
  `word` varchar(40) NOT NULL,
  `term` varchar(40) NOT NULL,
  `validornot` int(11) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `superboss`
--

CREATE TABLE IF NOT EXISTS `superboss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(40) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `throwgame`
--

CREATE TABLE IF NOT EXISTS `throwgame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(40) NOT NULL,
  `validornot` int(11) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
