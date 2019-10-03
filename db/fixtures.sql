-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

INSERT INTO `options` (`id`, `option`, `votes`, `vote_id`) VALUES
(1,	'Yes',	2,	1),
(2,	'No',	0,	1),
(3,	'maybe',	1,	2),
(4,	'probably not',	0,	2),
(18,	'yay',	1,	8),
(19,	'2',	0,	8),
(20,	'3',	0,	8),
(21,	'4',	0,	8),
(22,	'5',	0,	8),
(23,	'6',	0,	8);

INSERT INTO `submitted_votes` (`id`, `user_ip`, `votes_id`) VALUES
(1,	'127.0.0.1',	1),
(5,	'127.0.0.1',	2),
(6,	'127.0.0.1',	8);

INSERT INTO `votes` (`id`, `title`) VALUES
(1,	'Is this test question any good?'),
(2,	'Does my create vote page work?'),
(8,	'Now many options should work');

-- 2019-09-30 02:55:49
