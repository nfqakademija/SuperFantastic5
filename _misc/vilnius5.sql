-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for vilnius5
DROP DATABASE IF EXISTS `vilnius5`;
CREATE DATABASE IF NOT EXISTS `vilnius5` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vilnius5`;


-- Dumping structure for table vilnius5.books
DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `description_id` int(11) DEFAULT NULL,
  `added_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `IDX_4A1B2A927E3C61F9` (`owner_id`),
  KEY `IDX_4A1B2A92D9F966B` (`description_id`),
  CONSTRAINT `FK_4A1B2A927E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_4A1B2A92D9F966B` FOREIGN KEY (`description_id`) REFERENCES `descriptions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vilnius5.books: ~5 rows (approximately)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT IGNORE INTO `books` (`id`, `owner_id`, `description_id`, `added_at`) VALUES
	(1, 1, 1, '2015-01-01'),
	(2, 1, 2, '2015-01-02'),
	(3, 2, 2, '2015-01-03'),
	(4, 3, 3, '2015-01-04'),
	(5, 1, 4, '2015-01-05');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


-- Dumping structure for table vilnius5.book_tags
DROP TABLE IF EXISTS `book_tags`;
CREATE TABLE IF NOT EXISTS `book_tags` (
  `description_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`description_id`,`tag_id`),
  KEY `IDX_7621DF2ED9F966B` (`description_id`),
  KEY `IDX_7621DF2EBAD26311` (`tag_id`),
  CONSTRAINT `FK_7621DF2EBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  CONSTRAINT `FK_7621DF2ED9F966B` FOREIGN KEY (`description_id`) REFERENCES `descriptions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vilnius5.book_tags: ~5 rows (approximately)
/*!40000 ALTER TABLE `book_tags` DISABLE KEYS */;
INSERT IGNORE INTO `book_tags` (`description_id`, `tag_id`) VALUES
	(1, 5),
	(2, 5),
	(3, 7),
	(4, 1),
	(4, 5);
/*!40000 ALTER TABLE `book_tags` ENABLE KEYS */;


-- Dumping structure for table vilnius5.descriptions
DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE IF NOT EXISTS `descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_no` smallint(6) DEFAULT NULL,
  `isbn` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vilnius5.descriptions: ~4 rows (approximately)
/*!40000 ALTER TABLE `descriptions` DISABLE KEYS */;
INSERT IGNORE INTO `descriptions` (`id`, `author`, `title`, `cover_url`, `language`, `description`, `publisher`, `year`, `page_no`, `isbn`) VALUES
	(1, 'Vytautas Landsbergis', 'Pasakėčios', 'http://ecx.images-amazon.com/images/I/31ULDEQrdyL._SL194_.jpg', 'lt', 'bla bla bla', 'Kronta', '2011-05-05', 328, '9786094010446'),
	(2, 'Juozas Erlickas', 'Prisimynimai', 'http://ecx.images-amazon.com/images/I/31ULDEQrdyL._SL194_.jpg', 'lt', 'bla bla bla', 'Tyto alba', '2004', 150, '9789986163886'),
	(3, 'Arvydas Šliogeris', 'The Thing and Art: Two Essays on the Ontotopy of the Work of Art. (On the Boundary of Two Worlds)', 'http://ecx.images-amazon.com/images/I/51kVb79WAjL._SL194_.jpg', 'lt', 'bla bla bla', 'Rodopi', '2009', 180, '9789042025646'),
	(4, 'Ray Bradbury', 'Fahrenheit 451: A Novel', 'http://ecx.images-amazon.com/images/I/51kVb79WAjL._SL194_.jpg', 'en', ' The terrifyingly prophetic novel of a post-literate future.\r\n\r\nGuy Montag is a fireman. His job is to burn books, which are forbidden, being the source of all discord and unhappiness. Even so, Montag is unhappy; there is discord in his marriage. Are books hidden in his house? The Mechanical Hound of the Fire Department, armed with a lethal hypodermic, escorted by helicopters, is ready to track down those dissidents who defy society to preserve and read books.\r\n\r\nThe classic dystopian novel of a post-literate future, Fahrenheit 451 stands alongside Orwell’s 1984 and Huxley’s Brave New World as a prophetic account of Western civilization’s enslavement by the media, drugs and conformity.\r\n\r\nBradbury’s powerful and poetic prose combines with uncanny insight into the potential of technology to create a novel which, decades on from first publication, still has the power to dazzle and shock.', 'Simon & Schuster', '2013', 132, '9781451673319');
/*!40000 ALTER TABLE `descriptions` ENABLE KEYS */;


-- Dumping structure for table vilnius5.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reader_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `reserved_at` date NOT NULL,
  `taken_at` date DEFAULT NULL,
  `to_return_at` date DEFAULT NULL,
  `returned_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `IDX_E52FFDEE1717D737` (`reader_id`),
  KEY `IDX_E52FFDEED9F966B` (`description_id`),
  KEY `IDX_E52FFDEE16A2B381` (`book_id`),
  CONSTRAINT `FK_E52FFDEE16A2B381` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `FK_E52FFDEE1717D737` FOREIGN KEY (`reader_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_E52FFDEED9F966B` FOREIGN KEY (`description_id`) REFERENCES `descriptions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vilnius5.orders: ~7 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT IGNORE INTO `orders` (`id`, `reader_id`, `description_id`, `book_id`, `reserved_at`, `taken_at`, `to_return_at`, `returned_at`) VALUES
	(1, 1, 1, 1, '2015-01-01', '2015-01-02', '2015-01-03', '2015-01-04'),
	(2, 2, 1, NULL, '2015-01-03', NULL, NULL, NULL),
	(3, 2, 2, 2, '2015-01-01', '2015-01-02', '2015-01-03', NULL),
	(4, 3, 2, 3, '2015-01-01', '2015-01-02', '2015-01-06', '2015-01-06'),
	(5, 1, 2, 3, '2015-01-03', '2015-01-06', NULL, NULL),
	(6, 1, 3, 4, '2015-01-01', '2015-01-04', NULL, NULL),
	(7, 1, 4, 5, '2015-01-01', '2015-01-05', NULL, NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


-- Dumping structure for table vilnius5.tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vilnius5.tags: ~7 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT IGNORE INTO `tags` (`id`, `tag`) VALUES
	(1, 'mokslinė fantastika'),
	(2, 'politinė filosofija'),
	(3, 'C++'),
	(4, 'php'),
	(5, 'grožinė literatūra'),
	(6, 'istorija'),
	(7, 'filosofija');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table vilnius5.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table vilnius5.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `firstname`, `lastname`) VALUES
	(1, 'admin@domain.dom', 'admin@domain.dom', 'admin@domain.dom', 'admin@domain.dom', 0, '8hf1vm78dyg48g400wkkg40o0kwkk88', 'test', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Vardenis', 'Pavardenis'),
	(2, 'ordinary@domain.dom', 'ordinary@domain.dom', 'ordinary@domain.dom', 'ordinary@domain.dom', 0, 'jn4v1v0mc3wo04owcw8cwsc0gksk8ck', 'tester', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Paprastas', 'Vartotojas'),
	(3, 'kitas@domain.dom', 'kitas@domain.dom', 'kitas@domain.dom', 'kitas@domain.dom', 0, 'cloefdovahc8cksw84o8ockws4c4swk', 'tester', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Kitas', 'Vartotojas'),
	(4, 'admin', 'admin', 'redas.peskaitis@gmail.com', 'redas.peskaitis@gmail.com', 1, '9d9b8bd2uvwgockcwgc0ocookwsko0g', 'wLqX9Pd4hlhztqwwhh2Y2zI2AmZnoZYRP2n0rbNm4zFS0R0BHBP+xlu5le3ppM6R3hvZau3Z6ms1Q06sctdwog==', '2015-05-19 03:50:29', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'Admin', 'Main');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
