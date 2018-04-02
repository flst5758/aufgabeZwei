-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: aufgabe_zwei
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Serialdata`
--

DROP TABLE IF EXISTS `Serialdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Serialdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numberofpages` int(45) DEFAULT NULL,
  `numberofvolumes` int(11) DEFAULT NULL,
  `digitizationcost` int(45) DEFAULT NULL,
  `numberoftb` float(7,4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Serialdata`
--

LOCK TABLES `Serialdata` WRITE;
/*!40000 ALTER TABLE `Serialdata` DISABLE KEYS */;
INSERT INTO `Serialdata` VALUES (55,'sps','Sprachspiegel',12000,200,3000,0.2400),(56,'neb','Nebelspalter',125000,500,31250,2.5000),(57,'slz','Schweizerische Lehrerzeitung',22500,112,5625,0.4500),(58,'cur','Curaviva',30000,50,7500,0.6000),(59,'aut','Automobil',22500,48,5625,0.4500),(60,'hor','Horizonte',45000,79,11250,0.9000),(61,'dgn','Dr glai Nazi',56000,123,14000,1.1200),(62,'spg','Der Spiegel',225000,503,56250,4.5000),(63,'spi','Spick',1000000,1200,250000,20.0000),(64,'dit','die idenititären : die zeitschrift für vollid',12000,12,3000,0.2400);
/*!40000 ALTER TABLE `Serialdata` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-01 16:01:23
