-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.32-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dump della struttura di tabella projectwork.experiences
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `agency` varchar(400) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `role` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `validity` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `FK1_id_student_experiences` (`id_student`),
  CONSTRAINT `FK1_id_student_experiences` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.experiences: ~6 rows (circa)
DELETE FROM `experiences`;
INSERT INTO `experiences` (`id`, `id_student`, `agency`, `start`, `end`, `role`, `description`, `validity`) VALUES
	(1, 1, 'Amazon', '2020-09-29', '2021-12-20', 'Driver ', 'Amazon deliveries', 1),
	(2, 1, 'Oracle Casinó', '2022-07-15', '2022-09-15', 'Croupier', 'Croupier of gaming tables such as Roulette, Texas Holdem, Black Jack and others.', 1),
	(5, 2, 'Cromodora wheels', '2006-03-29', '2007-02-02', 'Assembly line tester', 'I have acquired the concepts of production and quality control.', 1),
	(6, 2, 'Cumiana Opony Polska', '2014-02-26', '2015-03-16', 'Tyre mechanic', 'I have acquired mechanic skills and learned software applications by working with convErgence machine, in addiction I have learned the rudiments of the Polish language.', 1),
	(7, 2, 'Allin1Soft (Wroclaw)', '2015-03-20', '2016-03-26', 'Customer support', 'I have acquired work in team skills and learned software applications, in addiction I have acquired the basic concepts of front-end and back-end by work in close contact with these figures.', 1),
	(11, 1, 'x', '2024-06-21', '2024-06-29', 'gfff', 'xxx', 1);

-- Dump della struttura di tabella projectwork.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `flag` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.languages: ~8 rows (circa)
DELETE FROM `languages`;
INSERT INTO `languages` (`id`, `title`, `flag`) VALUES
	(1, 'English', 'https://img.icons8.com/?size=100&id=t3NE3BsOAQwq&format=png&color=000000'),
	(2, 'French', 'https://img.icons8.com/?size=100&id=YwnngGdMBmIV&format=png&color=000000'),
	(3, 'Spanish', 'https://img.icons8.com/?size=100&id=ly7tzANRt33n&format=png&color=000000'),
	(4, 'Italian', 'https://img.icons8.com/?size=100&id=WmOfu4e7Rvp7&format=png&color=000000'),
	(5, 'German', 'https://img.icons8.com/?size=100&id=vRrbNnaD93Ys&format=png&color=000000'),
	(6, 'Polish', 'https://img.icons8.com/?size=100&id=civsLZTDrVTT&format=png&color=000000'),
	(7, 'Chinese', 'https://img.icons8.com/?size=100&id=vZLJDLqVMupW&format=png&color=000000'),
	(8, 'Japan', 'https://img.icons8.com/?size=100&id=FeSjxToMjcoN&format=png&color=000000');

-- Dump della struttura di tabella projectwork.languages_level
CREATE TABLE IF NOT EXISTS `languages_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.languages_level: ~6 rows (circa)
DELETE FROM `languages_level`;
INSERT INTO `languages_level` (`id`, `level`) VALUES
	(1, 'A1'),
	(2, 'A2'),
	(3, 'B1'),
	(4, 'B2'),
	(5, 'C1'),
	(6, 'C2');

-- Dump della struttura di tabella projectwork.programming_languages
CREATE TABLE IF NOT EXISTS `programming_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(400) DEFAULT NULL,
  `icon` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.programming_languages: ~8 rows (circa)
DELETE FROM `programming_languages`;
INSERT INTO `programming_languages` (`id`, `title`, `icon`) VALUES
	(1, 'HTML', 'https://img.icons8.com/?size=100&id=20909&format=png&color=000000'),
	(2, 'CSS', 'https://img.icons8.com/?size=100&id=21278&format=png&color=000000'),
	(3, 'JAVASCRIPT', 'https://img.icons8.com/?size=100&id=108784&format=png&color=000000'),
	(4, 'PHP', 'https://img.icons8.com/?size=100&id=YrKoPXb4jv9l&format=png&color=000000'),
	(5, 'PYTHON', 'https://img.icons8.com/?size=100&id=l75OEUJkPAk4&format=png&color=000000'),
	(6, 'WORDPRESS', 'https://img.icons8.com/?size=100&id=13664&format=png&color=000000'),
	(8, 'C', 'https://img.icons8.com/?size=100&id=40670&format=png&color=000000'),
	(9, 'C++', 'https://img.icons8.com/?size=100&id=40669&format=png&color=000000'),
	(10, 'C#', 'https://img.icons8.com/?size=100&id=55251&format=png&color=000000');

-- Dump della struttura di tabella projectwork.programming_languages_level
CREATE TABLE IF NOT EXISTS `programming_languages_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.programming_languages_level: ~5 rows (circa)
DELETE FROM `programming_languages_level`;
INSERT INTO `programming_languages_level` (`id`, `level`) VALUES
	(1, '20%'),
	(2, '40%'),
	(3, '60%'),
	(4, '80%'),
	(5, '100%');

-- Dump della struttura di tabella projectwork.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `title` varchar(400) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `link_project` varchar(1000) DEFAULT NULL,
  `validity` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `FK1_id_student_projects` (`id_student`),
  CONSTRAINT `FK1_id_student_projects` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.projects: ~5 rows (circa)
DELETE FROM `projects`;
INSERT INTO `projects` (`id`, `id_student`, `title`, `description`, `link_project`, `validity`) VALUES
	(1, 1, 'Sasso carta forbici', 'The rock paper scissors game, have fun playing against the AI!', 'https://github.com/Andsof10/sasso-carta-forbice', 1),
	(5, 2, 'Calculator', 'Calculator personal ', 'https://colab.research.google.com/drive/1VOq7-aOQBx9M5yo3obRJznvT7lBtlzmh?usp=drive_link', 1),
	(19, 2, 'utkt', 'jj', 'jj', 1),
	(21, 1, 'utkt', 'xxx', 'xxx', 1),
	(22, 1, 'utkt', 'ggg', 'gg', 1);

-- Dump della struttura di tabella projectwork.social
CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `icon` varchar(1000) DEFAULT NULL,
  `validity` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.social: ~5 rows (circa)
DELETE FROM `social`;
INSERT INTO `social` (`id`, `title`, `icon`, `validity`) VALUES
	(1, 'github', 'https://img.icons8.com/?size=100&id=AZOZNnY73haj&format=png&color=000000', 1),
	(2, 'linkedin', 'https://img.icons8.com/?size=100&id=13930&format=png&color=000000', 1),
	(3, 'instagram', 'https://img.icons8.com/?size=100&id=Xy10Jcu1L2Su&format=png&color=000000', 1),
	(4, 'facebook', 'https://img.icons8.com/?size=100&id=118497&format=png&color=000000', 1),
	(5, 'X', 'https://img.icons8.com/?size=100&id=phOKFKYpe00C&format=png&color=000000', 1);

-- Dump della struttura di tabella projectwork.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(400) DEFAULT NULL,
  `surname` varchar(400) DEFAULT NULL,
  `img_profile` varchar(1000) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone_number` varchar(50) DEFAULT NULL,
  `fiscal_code` varchar(400) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `city_birth` varchar(400) DEFAULT NULL,
  `current_job` varchar(1000) DEFAULT NULL,
  `residence` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `cover_title` varchar(1000) DEFAULT NULL,
  `cover_image` varchar(1000) DEFAULT NULL,
  `educational_qualification` varchar(400) DEFAULT NULL,
  `cover_description` varchar(500) DEFAULT NULL,
  `notes_card` varchar(150) DEFAULT NULL,
  `validity` int(11) DEFAULT 1,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(400) DEFAULT NULL,
  `feedback` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fiscal_code` (`fiscal_code`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.students: ~10 rows (circa)
DELETE FROM `students`;
INSERT INTO `students` (`id`, `name`, `surname`, `img_profile`, `email`, `telephone_number`, `fiscal_code`, `birth_date`, `city_birth`, `current_job`, `residence`, `city`, `cover_title`, `cover_image`, `educational_qualification`, `cover_description`, `notes_card`, `validity`, `username`, `password`, `feedback`) VALUES
	(1, 'Andrea', '   Sofia', './uploads/869f2829b70936f416cf4c1debf123e0.jpg', 'cccccccccccc', 'xxxxxxxxx', 'SFONDR99M10H501F', '1999-08-13', NULL, 'Web Developer Full Stack', 'xxxxxxxxxxx', 'xxxxxxxxxxxxxxzzzz', 'agffffvgvvvvvvvvvvvvvvvvv', './uploads/832c47216a1f460cd38042d8b2d370cb.png', 'jjjjjjj.', 'dfgbvsdfgbvsdfbcccccccccccccccccccccc', 'Andrea is an engineer passionate about technology, always ready to solve complex problems with innovative solutions.', 1, 'andrea', '1c42f9c1ca2f65441465b43cd9339d6c', 'fffffffgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfg'),
	(2, 'Ivan', 'Murgia', './uploads/6820e2669d9690716c267670840a8082.jpg', 'murgiaivan.srd@gmail.com', '+39 3496128749', NULL, '1980-03-16', NULL, 'Web developer', 'Italy', 'Cagliari', 'Benvenuti nel mio portfolio', 'images/cover-image-ivan.jpg', 'Accountant', 'Esplorate i miei progetti', 'Ivan, a history teacher, loves to tell stories of the past with contagious enthusiasm.', 1, 'andrea2', '1c42f9c1ca2f65441465b43cd9339d6c', NULL),
	(3, 'Roberto', 'Baudo', 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29uZSUyMGNhc3VhbGl8ZW58MHx8MHx8fDA%3D', NULL, NULL, NULL, '2001-05-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Roberto is a talented cook who creates delicious dishes and always knows how to make every meal an unforgettable experience.', 1, NULL, NULL, NULL),
	(4, 'Anna', 'Gigio', NULL, NULL, NULL, NULL, '1987-08-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Anna is a dedicated athlete, spending hours in the gym to reach new goals and surpass his own limits.', 1, NULL, NULL, NULL),
	(5, 'Elisa', 'Francullo', 'https://plus.unsplash.com/premium_photo-1686777551229-d8eca134c66e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cGVyc29uZSUyMGElMjBjYXNvfGVufDB8fDB8fHww', NULL, NULL, NULL, '1995-03-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Elisa, a graphic designer, combines creativity and precision to transform ideas into beautiful visual works.', 1, NULL, NULL, NULL),
	(6, 'Giorgio', 'Mencaglia', 'https://www.therandomwalker.com/uploads/7/1/5/8/71585351/published/img-0928.jpg?1565487893', NULL, NULL, NULL, '1998-12-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Giorgio is a tireless traveler, always seeking new adventures and cultures to explore.', 1, NULL, NULL, NULL),
	(7, 'Sara', 'Biraglia', 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fHw%3D&w=1000&q=80', NULL, NULL, NULL, '1983-03-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sara is an emerging writer with a passion for captivating stories that capture readers\' imaginations.', 1, NULL, NULL, NULL),
	(8, 'Marco', 'Frio', 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg', NULL, NULL, NULL, '1979-02-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Marco, a musician, composes melodies that touch the heart and convey deep emotions through every note.', 1, NULL, NULL, NULL),
	(9, 'Laura', 'Cera', 'https://engineering.unl.edu/images/staff/Kayla-Person.jpg', NULL, NULL, NULL, '1997-09-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laura, a veterinarian, dedicates her life to caring for animals, showing empathy and professionalism.', 1, NULL, NULL, NULL),
	(10, 'Andrea', 'Villani', 'https://www.wilsoncenter.org/sites/default/files/media/images/person/james-person-1.jpg', NULL, NULL, NULL, '1970-03-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Andrea is an experienced photographer, capable of capturing unique moments with his lens, making every shot a work of art.', 1, NULL, NULL, NULL);

-- Dump della struttura di tabella projectwork.students_addresses
CREATE TABLE IF NOT EXISTS `students_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `id_address` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `house number` varchar(100) DEFAULT NULL,
  `zip code` varchar(100) DEFAULT NULL,
  `city_residence` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `validity` int(11) DEFAULT 1,
  `residence` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_id_student_address` (`id_student`),
  KEY `FK2_id_address` (`id_address`),
  CONSTRAINT `FK1_id_student_address` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_id_address` FOREIGN KEY (`id_address`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.students_addresses: ~0 rows (circa)
DELETE FROM `students_addresses`;
INSERT INTO `students_addresses` (`id`, `id_student`, `id_address`, `address`, `house number`, `zip code`, `city_residence`, `province`, `validity`, `residence`) VALUES
	(1, 1, NULL, 'Via ceccano', '43', '00172', 'Roma', 'RM', 1, 'Italy');

-- Dump della struttura di tabella projectwork.students_languages
CREATE TABLE IF NOT EXISTS `students_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `id_language` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `data_insert` datetime DEFAULT current_timestamp(),
  `validity` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `FK1_student` (`id_student`),
  KEY `FK2_language` (`id_language`),
  KEY `FK3_level` (`id_level`),
  CONSTRAINT `FK1_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_language` FOREIGN KEY (`id_language`) REFERENCES `languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK3_level` FOREIGN KEY (`id_level`) REFERENCES `languages_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.students_languages: ~4 rows (circa)
DELETE FROM `students_languages`;
INSERT INTO `students_languages` (`id`, `id_student`, `id_language`, `id_level`, `notes`, `data_insert`, `validity`) VALUES
	(3, 2, 6, 4, NULL, '2024-05-29 15:55:36', 1),
	(42, 1, 4, 6, NULL, '2024-06-15 16:07:51', 1),
	(46, 2, 1, 1, NULL, '2024-06-17 09:52:54', 1),
	(49, 1, 1, 4, NULL, '2024-06-19 09:21:05', 1);

-- Dump della struttura di tabella projectwork.students_programming
CREATE TABLE IF NOT EXISTS `students_programming` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `id_programming_language` int(11) DEFAULT NULL,
  `id_programming_level` int(11) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `data_insert` datetime DEFAULT current_timestamp(),
  `validity` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `FK1_programming_student` (`id_student`),
  KEY `FK2_programming_language` (`id_programming_language`),
  KEY `FK3_programming_level` (`id_programming_level`),
  CONSTRAINT `FK1_programming_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_programming_language` FOREIGN KEY (`id_programming_language`) REFERENCES `programming_languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK3_programming_level` FOREIGN KEY (`id_programming_level`) REFERENCES `programming_languages_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.students_programming: ~11 rows (circa)
DELETE FROM `students_programming`;
INSERT INTO `students_programming` (`id`, `id_student`, `id_programming_language`, `id_programming_level`, `notes`, `data_insert`, `validity`) VALUES
	(7, 2, 1, 4, NULL, '2024-05-29 15:56:54', 1),
	(8, 2, 2, 5, NULL, '2024-05-29 15:57:05', 1),
	(9, 2, 3, 3, NULL, '2024-05-29 15:57:15', 1),
	(11, 2, 5, 2, NULL, '2024-05-29 15:57:38', 1),
	(12, 2, 6, 3, NULL, '2024-05-29 15:57:47', 1),
	(24, 1, 5, 3, NULL, '2024-06-14 15:32:57', 1),
	(36, 1, 3, 3, NULL, '2024-06-14 15:51:42', 1),
	(44, 1, 6, 3, NULL, '2024-06-17 12:43:01', 1),
	(47, 1, 4, 3, NULL, '2024-06-18 11:21:20', 1),
	(49, 1, 2, 4, NULL, '2024-06-19 09:04:09', 1);

-- Dump della struttura di tabella projectwork.students_social
CREATE TABLE IF NOT EXISTS `students_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `id_social` int(11) DEFAULT NULL,
  `link_social` varchar(1000) DEFAULT NULL,
  `validity` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `FK1_students_socials_students` (`id_student`),
  KEY `FK2_id_social` (`id_social`),
  CONSTRAINT `FK1_students_socials_students` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_id_social` FOREIGN KEY (`id_social`) REFERENCES `social` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella projectwork.students_social: ~6 rows (circa)
DELETE FROM `students_social`;
INSERT INTO `students_social` (`id`, `id_student`, `id_social`, `link_social`, `validity`) VALUES
	(5, 2, 5, 'https://x.com/MurgiaivanSrd', 1),
	(6, 2, 4, 'https://www.facebook.com/ivan.murgia.14?locale=it_IT', 1),
	(7, 2, 2, 'https://www.linkedin.com/in/ivan-murgia-950030248/', 1),
	(30, 1, 2, '', 1),
	(31, 1, 3, '', 1),
	(35, 1, 5, '', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
