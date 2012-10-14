-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 14 Octobre 2012 à 18:55
-- Version du serveur: 5.5.25
-- Version de PHP: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `sshconfig_gen`
--

-- --------------------------------------------------------

--
-- Structure de la table `sg_hosts`
--

CREATE TABLE `sg_hosts` (
  `id_host` tinyint(4) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(100) NOT NULL,
  `id_zone` varchar(100) NOT NULL,
  `id_infra` varchar(100) NOT NULL,
  `id_srv` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `port` int(5) NOT NULL,
  `identityfile` varchar(100) NOT NULL,
  `proxycommand` varchar(100) NOT NULL,
  PRIMARY KEY (`id_host`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

-- --------------------------------------------------------
