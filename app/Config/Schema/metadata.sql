# SQL-Front 5.1  (Build 4.16)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


# Host: localhost    Database: finder
# ------------------------------------------------------
# Server version 5.5.5-10.1.38-MariaDB

DROP DATABASE IF EXISTS `finder`;
CREATE DATABASE `finder` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `finder`;

#
# Source for table acos
#

DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Dumping data for table acos
#

INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'Animals',1,2);
INSERT INTO `acos` VALUES (2,NULL,NULL,NULL,'Comunicados',3,4);
INSERT INTO `acos` VALUES (3,NULL,NULL,NULL,'Donos',5,6);

#
# Source for table animals
#

DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dono_id` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `idade` tinyint(3) DEFAULT NULL,
  `informacoes` text,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dono_id_fk` (`dono_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table animals
#


#
# Source for table aros
#

DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Dumping data for table aros
#

INSERT INTO `aros` VALUES (1,NULL,NULL,NULL,'Dono',1,2);

#
# Source for table aros_acos
#

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Dumping data for table aros_acos
#

INSERT INTO `aros_acos` VALUES (1,1,1,'1','1','1','1');
INSERT INTO `aros_acos` VALUES (2,1,2,'1','1','1','1');
INSERT INTO `aros_acos` VALUES (3,1,3,'1','1','1','1');

#
# Source for table comunicados
#

DROP TABLE IF EXISTS `comunicados`;
CREATE TABLE `comunicados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table comunicados
#


#
# Source for table donos
#

DROP TABLE IF EXISTS `donos`;
CREATE TABLE `donos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `senha` varchar(300) DEFAULT NULL,
  `aro_parent_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

#
# Dumping data for table donos
#


#
#  Foreign keys for table animals
#

ALTER TABLE `animals`
ADD CONSTRAINT `dono_id_fk` FOREIGN KEY (`dono_id`) REFERENCES `donos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
