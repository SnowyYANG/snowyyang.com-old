-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2018 at 09:48 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET time_zone = "+08:00";

--
-- Database: `snowy`
--
CREATE DATABASE IF NOT EXISTS `snowy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `snowy`;

-- --------------------------------------------------------

--
-- Table structure for table `mc_s`
--

CREATE TABLE IF NOT EXISTS `mc_s` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(63) NOT NULL,
  `s` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uri` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `browser` varchar(128) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `rfwiki_history`
--

CREATE TABLE IF NOT EXISTS `rfwiki_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Table structure for table `rfwiki_logs`
--

CREATE TABLE IF NOT EXISTS `rfwiki_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` tinyint(4) NOT NULL,
  `page` int(11) NOT NULL,
  `memo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `time` (`time`)
);

-- --------------------------------------------------------

--
-- Table structure for table `rfwiki_pages`
--

CREATE TABLE IF NOT EXISTS `rfwiki_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(64) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(32) NOT NULL,
  `content` longtext NOT NULL,
  `html` longtext NOT NULL,
  `fulltext` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
);

-- --------------------------------------------------------

--
-- Table structure for table `rfwiki_qanda`
--

CREATE TABLE IF NOT EXISTS `rfwiki_qanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `qip` varchar(32) NOT NULL,
  `qtime` datetime NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `atime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

-- --------------------------------------------------------

--
-- Table structure for table `rfwiki_requests`
--

CREATE TABLE IF NOT EXISTS `rfwiki_requests` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uri` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `browser` varchar(128) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `world_requests`
--

CREATE TABLE IF NOT EXISTS `world_requests` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uri` varchar(255) NOT NULL,
  `referer` varchar(255) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `browser` varchar(128) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `world_users`
--

CREATE TABLE IF NOT EXISTS `world_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `un` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `qq` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rfwiki_pages`
--
ALTER TABLE `rfwiki_pages` ADD FULLTEXT KEY `fulltext` (`fulltext`);
