-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcontatos20192ta
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblcontatos`
--

DROP TABLE IF EXISTS `tblcontatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblcontatos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dt_nasc` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `obs` longtext,
  `codestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codestado_idx` (`codestado`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcontatos`
--

LOCK TABLES `tblcontatos` WRITE;
/*!40000 ALTER TABLE `tblcontatos` DISABLE KEYS */;
INSERT INTO `tblcontatos` VALUES (11,'Jhonson','(111)1111-1111','11111111111','pedrohenriquelm500@gmail.com','2019-09-04','M','asdasdasd',NULL),(12,'Morpheus','(111)1111-1111','111111111','pedrohenriquelm500@gmail.com','2019-09-04','M','asdasdasdasdasd',2),(13,'Tux','1142062441','98888-8888','pedrohenriquelm500@gmail.com','1975-12-19','M','asdasdasdasdasd',2),(14,'Morpheus Matrix','1142062441','(011)95555-6666','pedrohenriquelm500@gmail.com','1990-03-10','M','asdsadasd',1);
/*!40000 ALTER TABLE `tblcontatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblestado`
--

DROP TABLE IF EXISTS `tblestado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblestado` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblestado`
--

LOCK TABLES `tblestado` WRITE;
/*!40000 ALTER TABLE `tblestado` DISABLE KEYS */;
INSERT INTO `tblestado` VALUES (1,'SP','sp é meu pais'),(2,'RJ','terra de santa cruz');
/*!40000 ALTER TABLE `tblestado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-23 16:31:15
