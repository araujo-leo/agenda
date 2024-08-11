-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdagendatb
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbamigos`
--

DROP TABLE IF EXISTS `tbamigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbamigos` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datanasc` date NOT NULL,
  `tel` varchar(20) NOT NULL,
  `usuario_cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `usuario_cod` (`usuario_cod`),
  CONSTRAINT `tbamigos_ibfk_1` FOREIGN KEY (`usuario_cod`) REFERENCES `tbusuario` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbamigos`
--

LOCK TABLES `tbamigos` WRITE;
/*!40000 ALTER TABLE `tbamigos` DISABLE KEYS */;
INSERT INTO `tbamigos` VALUES (1,'Rafael','rafa@teste.com','0000-00-00','03101974',1);
/*!40000 ALTER TABLE `tbamigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcomercio`
--

DROP TABLE IF EXISTS `tbcomercio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcomercio` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `contato` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario_cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `usuario_cod` (`usuario_cod`),
  CONSTRAINT `tbcomercio_ibfk_1` FOREIGN KEY (`usuario_cod`) REFERENCES `tbusuario` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcomercio`
--

LOCK TABLES `tbcomercio` WRITE;
/*!40000 ALTER TABLE `tbcomercio` DISABLE KEYS */;
INSERT INTO `tbcomercio` VALUES (1,'José da Silva','Skol','11947455689','jose@ambev.com',1);
/*!40000 ALTER TABLE `tbcomercio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuario` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (1,'Leonardo','leo@teste.com','$2y$10$uFAa2AZXY3jmRaCIRNsHi.uqf2n8yzuDpGORcKfQt5CK.VRvv1RdG','../storage/uploads/imagens/IMG_0645.JPG');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bdagendatb'
--

--
-- Dumping routines for database 'bdagendatb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-10 16:35:43
