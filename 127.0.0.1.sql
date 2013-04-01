-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Apr 2013 um 18:35
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `tech_invent`
--
CREATE DATABASE `tech_invent` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tech_invent`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` int(255) NOT NULL,
  `parent_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category_allocation`
--

CREATE TABLE IF NOT EXISTS `category_allocation` (
  `thing_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `color` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `name`, `begin`, `end`, `color`, `description`) VALUES
(1, 'Heute', '2013-03-31', '2013-03-31', 2147483647, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groupperms`
--

CREATE TABLE IF NOT EXISTS `groupperms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `perm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Daten für Tabelle `groupperms`
--

INSERT INTO `groupperms` (`id`, `group`, `perm`) VALUES
(16, 2, 3),
(18, 2, 4),
(19, 1, 3),
(20, 1, 4),
(21, 1, 5),
(22, 1, 6),
(23, 1, 7),
(25, 1, 8),
(26, 1, 9),
(27, 1, 12),
(28, 1, 13),
(29, 1, 11),
(30, 1, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
(2, 'user', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inventorys`
--

CREATE TABLE IF NOT EXISTS `inventorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Daten für Tabelle `inventorys`
--

INSERT INTO `inventorys` (`id`, `name`) VALUES
(49, 'aAsdASD'),
(2, 'dinge'),
(50, 'testinventory'),
(51, 'Testinventory2'),
(56, 'testinventory7'),
(55, 'testinventory6'),
(54, 'testinventory5'),
(53, 'testinventory4'),
(52, 'Testinventory3'),
(57, 'testinventory8'),
(58, 'testinventory9');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(5, 'jayjay', 'a0b049d7d2d13c957784acfaf8696d7b'),
(10, 'mkalte666', '7449adbd16ffeaa7d772c7e4fe316c2a'),
(13, 'Lukas', '9017bfc2c25a07e9609ba3015fe5b6ca'),
(17, 'test4', '86985e105f79b95d6bc918fb45ec7727');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `perms`
--

CREATE TABLE IF NOT EXISTS `perms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `perms`
--

INSERT INTO `perms` (`id`, `name`, `description`) VALUES
(3, 'login', ''),
(4, 'userdata_view', ''),
(5, 'users_view_list', ''),
(6, 'groups_view_list', ''),
(7, 'users_view_overview', ''),
(8, 'permissions_add', ''),
(9, 'groups_view_overview', ''),
(10, 'permissions_view_overview', ''),
(11, 'permissions_remove', ''),
(12, 'groups_add', ''),
(13, 'groups_remove', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Daten für Tabelle `usergroups`
--

INSERT INTO `usergroups` (`id`, `userid`, `group`) VALUES
(1, 4, 1),
(2, 5, 1),
(25, 5, 2),
(26, 10, 1),
(27, 10, 2),
(31, 13, 1),
(32, 13, 2),
(33, 17, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
