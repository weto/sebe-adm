-- --------------------------------------------------------
-- Server OS:                    Linux
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2018-09-08 21:24:57
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for somos_educacao
CREATE DATABASE IF NOT EXISTS `somos_educacao` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `somos_educacao`;


-- Dumping structure for table somos_educacao.instituitions
CREATE TABLE IF NOT EXISTS `instituitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `fantasyname` varchar(100) NOT NULL,
  `note` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping structure for table somos_educacao.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `note` float DEFAULT '0',
  `instituition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_courses_instituitions` (`instituition_id`),
  CONSTRAINT `FK_courses_instituitions` FOREIGN KEY (`instituition_id`) REFERENCES `instituitions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping structure for table somos_educacao.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `average` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_students_courses` (`course_id`),
  CONSTRAINT `FK_students_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping structure for table somos_educacao.assessments
CREATE TABLE IF NOT EXISTS `assessments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` int(11) NOT NULL,
  `period` varchar(7) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_assessments_students` (`student_id`),
  CONSTRAINT `FK_assessments_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

