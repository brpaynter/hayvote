-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT 0,
  `vote_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vote_id` (`vote_id`),
  CONSTRAINT `options_ibfk_4` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `submitted_votes`;
CREATE TABLE `submitted_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `votes_id` (`votes_id`),
  CONSTRAINT `submitted_votes_ibfk_1` FOREIGN KEY (`votes_id`) REFERENCES `votes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2019-09-30 02:55:25
