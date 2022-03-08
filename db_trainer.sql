-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: sito_trainer
-- ------------------------------------------------------
-- Server version	5.7.37-log

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
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clienti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `eta` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altezza` float NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `dieta_id` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `credenziali_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `scheda_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trainer_id_idx` (`trainer_id`),
  KEY `dieta_id_idx` (`dieta_id`),
  KEY `credenziali_id_idx` (`credenziali_id`),
  CONSTRAINT `credenziali_id` FOREIGN KEY (`credenziali_id`) REFERENCES `credenziali` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `dieta_id` FOREIGN KEY (`dieta_id`) REFERENCES `dieta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES (1,'riccardo','lorenzini',23,70,180,2,1,NULL,2,'',1);
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credenziali`
--

DROP TABLE IF EXISTS `credenziali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `credenziali` (
  `username` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipo` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credenziali`
--

LOCK TABLES `credenziali` WRITE;
/*!40000 ALTER TABLE `credenziali` DISABLE KEYS */;
INSERT INTO `credenziali` VALUES ('pippo','1234',1,1),('topolino','123',2,0);
/*!40000 ALTER TABLE `credenziali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dieta`
--

DROP TABLE IF EXISTS `dieta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dieta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(1000) NOT NULL,
  `durata` varchar(10) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `cliente_id_idx` (`cliente_id`),
  CONSTRAINT `cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `clienti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dieta`
--

LOCK TABLES `dieta` WRITE;
/*!40000 ALTER TABLE `dieta` DISABLE KEYS */;
INSERT INTO `dieta` VALUES (1,'colazione....pranzo...cena....','1 mese','ipocalorica',1);
/*!40000 ALTER TABLE `dieta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documenti`
--

DROP TABLE IF EXISTS `documenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documenti` (
  `carta_identita` varchar(100) NOT NULL,
  `patente` varchar(100) NOT NULL,
  `cod_fiscale` varchar(45) NOT NULL,
  `certificato` varchar(100) NOT NULL,
  `credenziali_id` int(11) NOT NULL,
  KEY `credenziali_id_idx` (`credenziali_id`),
  CONSTRAINT `cred_doc` FOREIGN KEY (`credenziali_id`) REFERENCES `credenziali` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documenti`
--

LOCK TABLES `documenti` WRITE;
/*!40000 ALTER TABLE `documenti` DISABLE KEYS */;
INSERT INTO `documenti` VALUES ('ao123456','fi98765','pferds4656','si',2);
/*!40000 ALTER TABLE `documenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esercizio`
--

DROP TABLE IF EXISTS `esercizio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `esercizio` (
  `cod_esercizio` varchar(25) NOT NULL,
  `descrizione` varchar(45) NOT NULL,
  `tipologia` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_esercizio`),
  UNIQUE KEY `cod_esercizio_UNIQUE` (`cod_esercizio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esercizio`
--

LOCK TABLES `esercizio` WRITE;
/*!40000 ALTER TABLE `esercizio` DISABLE KEYS */;
INSERT INTO `esercizio` VALUES ('corsa','vel 5kmh','cardio');
/*!40000 ALTER TABLE `esercizio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazioni`
--

DROP TABLE IF EXISTS `prenotazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prenotazioni` (
  `data_ora` datetime NOT NULL,
  `durata` int(3) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  KEY `prenotazione_cliente_id_idx` (`cliente_id`),
  CONSTRAINT `prenotazione_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `clienti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazioni`
--

LOCK TABLES `prenotazioni` WRITE;
/*!40000 ALTER TABLE `prenotazioni` DISABLE KEYS */;
INSERT INTO `prenotazioni` VALUES ('2022-03-03 00:00:00',10000,1),('2022-03-09 18:53:00',30,1),('2022-03-09 18:53:00',30,1),('2022-03-09 18:53:00',30,1),('2022-03-24 11:06:00',90,1),('2022-03-17 20:09:00',60,1);
/*!40000 ALTER TABLE `prenotazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheda`
--

DROP TABLE IF EXISTS `scheda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scheda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `durata` time NOT NULL,
  `riposo` time NOT NULL,
  `sessioni_settimanali` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheda`
--

LOCK TABLES `scheda` WRITE;
/*!40000 ALTER TABLE `scheda` DISABLE KEYS */;
INSERT INTO `scheda` VALUES (1,'cardio','01:00:00','00:01:00',1);
/*!40000 ALTER TABLE `scheda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheda_esercizio`
--

DROP TABLE IF EXISTS `scheda_esercizio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scheda_esercizio` (
  `scheda_id` int(11) NOT NULL,
  `esercizio_cod_esercizio` varchar(25) NOT NULL,
  `rep_esercizio` varchar(6) NOT NULL,
  UNIQUE KEY `esercizio_cod_esercizio_UNIQUE` (`esercizio_cod_esercizio`),
  KEY `scheda_id_idx` (`scheda_id`),
  KEY `esercizio_cod_esercizio_idx` (`esercizio_cod_esercizio`),
  CONSTRAINT `esercizio_cod_esercizio` FOREIGN KEY (`esercizio_cod_esercizio`) REFERENCES `esercizio` (`cod_esercizio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `scheda_id` FOREIGN KEY (`scheda_id`) REFERENCES `scheda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheda_esercizio`
--

LOCK TABLES `scheda_esercizio` WRITE;
/*!40000 ALTER TABLE `scheda_esercizio` DISABLE KEYS */;
INSERT INTO `scheda_esercizio` VALUES (1,'corsa','2');
/*!40000 ALTER TABLE `scheda_esercizio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainer`
--

DROP TABLE IF EXISTS `trainer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trainer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `citta` varchar(45) NOT NULL,
  `indirizzo` varchar(45) NOT NULL,
  `p.iva` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `credenziali_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `p.iva_UNIQUE` (`p.iva`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `trainer_credenziali_id_idx` (`credenziali_id`),
  CONSTRAINT `trainer_credenziali_id` FOREIGN KEY (`credenziali_id`) REFERENCES `credenziali` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainer`
--

LOCK TABLES `trainer` WRITE;
/*!40000 ALTER TABLE `trainer` DISABLE KEYS */;
INSERT INTO `trainer` VALUES (2,'maurizio','costa','milano','via porta 6',123456789,NULL,1,'');
/*!40000 ALTER TABLE `trainer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-08 17:55:54
