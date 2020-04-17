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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Dumping data for table animals
#

INSERT INTO `animals` VALUES (1,19,'beach-1790049_960_720.jpg','Branquinho',3,'É um pouco arisco, não gosta muito de crianças, recompensa 300R$','Curitiba','PR','Perdido','2020-04-17 19:07:55','2020-04-17 19:07:55',NULL);
INSERT INTO `animals` VALUES (2,19,'cachorro 4654676.jpg','Bidu',1,'Meus filhos se apegaram muito nele, recompensa 500R$ para quem trouxer o cachorro na minha porta(sou mãe solteira não tenho como ir buscar)','Rio de Janeiro','RJ','Perdido','2020-04-17 19:13:29','2020-04-17 19:13:29',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Dumping data for table aros
#

INSERT INTO `aros` VALUES (1,NULL,NULL,NULL,'Dono',1,4);
INSERT INTO `aros` VALUES (2,1,'Dono',19,NULL,2,3);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Dumping data for table donos
#

INSERT INTO `donos` VALUES (19,'dayane','d@d.com.br','41246545464','97d5d0304c2b4651497f44a686aa02d03449054f0def8e133861776070e9f667',1,'2020-04-17 18:47:48','2020-04-17 18:47:48',NULL);

#
#  Foreign keys for table animals
#

ALTER TABLE `animals`
ADD CONSTRAINT `dono_id_fk` FOREIGN KEY (`dono_id`) REFERENCES `donos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
