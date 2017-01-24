-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: e_trgovina
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `idAdministrator` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(45) DEFAULT NULL,
  `Priimek` varchar(45) DEFAULT NULL,
  `Eposta` varchar(45) NOT NULL,
  `Geslo` char(128) NOT NULL,
  PRIMARY KEY (`idAdministrator`),
  UNIQUE KEY `idAdministrator_UNIQUE` (`idAdministrator`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'admin','admin','admin@e-trgovina.si','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artikli`
--

DROP TABLE IF EXISTS `artikli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artikli` (
  `idArtikla` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(45) NOT NULL,
  `Opis` mediumtext,
  `Zaloga` int(11) NOT NULL,
  `Cena` double NOT NULL,
  `Aktiven` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idArtikla`),
  UNIQUE KEY `idArtikla_UNIQUE` (`idArtikla`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artikli`
--

LOCK TABLES `artikli` WRITE;
/*!40000 ALTER TABLE `artikli` DISABLE KEYS */;
INSERT INTO `artikli` VALUES (1,'Apple iPad mini 3 Wi-Fi 16GB Space Gray','Najnaprednejši iPad mini ima senzor prstnih odtisov Touch ID, 7,9-palčni zaslon Retina, zmogljiv čip A7 s 64-bitno arhitekturo, kamero iSight, kamero FaceTime HD, hitro brezžično povezavo, iOS 8, iCloud in do 10 ur delovanja baterije.1 Prav tako je opremljen s številnimi odličnimi aplikacijami za delo in ustvarjalnost. Številne druge aplikacije pa so na voljo v trgovini App Store. ',20,357,0),(2,'Tablični računalnik LENOVO Miix 3 W8.1 BING','10,1-palčni tablični računalnik Lenovo MIIX 3, ki deluje s sistemom Windows 8.1 Bing in štirijedrno procesorsko tehnologijo, je odličen za produktivnost in zabavo na poti. Med lastnostmi, ki ga odlikujejo, so med drugim enoletna licenca za Office 365, sedemurna življenjska doba baterije in cena, ki vam bo prav gotovo všeč.',20,289.98,0),(3,'Apple iPad mini 3 Wi-Fi 16GB Gold','Najnaprednejši iPad mini ima senzor prstnih odtisov Touch ID, 7,9-palčni zaslon Retina, zmogljiv čip A7 s 64-bitno arhitekturo, kamero iSight, kamero FaceTime HD, hitro brezžično povezavo, iOS 8, iCloud in do 10 ur delovanja baterije.1 Prav tako je opremljen s številnimi odličnimi aplikacijami za delo in ustvarjalnost. Številne druge aplikacije pa so na voljo v trgovini App Store.',20,357,0),(4,'Apple iPad mini 3 Wi-Fi 16GB Silver','Najnaprednejši iPad mini ima senzor prstnih odtisov Touch ID, 7,9-palčni zaslon Retina, zmogljiv čip A7 s 64-bitno arhitekturo, kamero iSight, kamero FaceTime HD, hitro brezžično povezavo, iOS 8, iCloud in do 10 ur delovanja baterije.1 Prav tako je opremljen s številnimi odličnimi aplikacijami za delo in ustvarjalnost. Številne druge aplikacije pa so na voljo v trgovini App Store.',20,357,0),(5,'Tablični računalnik LENOVO YOGA TAB 3 10\" ','LENOVO YOGA TAB 3 10\" - tablični računalnik izdelan za vaše udobje!',0,209.99,0),(6,'Tablični računalnik XPLORE Atheros XP8772','Tablični računalnik XPLORE XP8772 vam nudi obilo zabave pri brskanju po internetu, poslušanju glasbe ali igranju osnovnih iger.',20,54.99,0),(7,'Tablični računalnik Trekstor SurfTab Wintron ','Tablični računalnik, pri katerem naj vas ne zavede nizka cena. Poganja ga Intelov procesor, ima 1 GB delovnega pomnilnika in naložen operacijski sistem Windows 10. Konfiguracija, ki bo z lahkoto kos enostavnejšim opravilom.',20,79.98,0),(8,'Tablični računalnik LENOVO Miix 300 Z3735F 10','10-palčni tablični računalnik Lenovo MIIX 3, ki deluje s sistemom Windows 10 in štirijedrno procesorsko tehnologijo, je odličen za produktivnost in zabavo na poti. ',0,259.99,0),(9,'Tablični računalnik LENOVO Tab A10-70','Edinstvena tablica Lenovo A10–70 vas bo razvedrila s svojim velikim zaslonom in sposobnostmi. Tablica vam ponuja čist in barvit pogled na dogajanje v digitalnem svetu. Zaslon je kot nalašč za gledanje filmov, slik in brskanje po spletu. Mogočni štiri-jedrni procesor vam omogoči uporabo večih programov istočasno. Izkusite tekočo in gladko Android izkušnjo. Nič več ne boste imeli težav z zatikanjem pri igranju iger ali predvajanju HD filmov. Vse to in še več po izjemni in ugodni ceni!',20,199.99,0),(10,'Tablični računalnik ASUS ZenPad 80','Odličen tablični računalnik - majhen, lep, zmogliv - to je ASUS ZenPad 80, katerega lahko vzamete s seboj na pot, ga uporabljate na dopustu, v delovne namene in podobno. Tablični računalnik vam bo na voljo za različna opravila in vas ne bo nikoli razočaral.',20,149.99,0);
/*!40000 ALTER TABLE `artikli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ddv`
--

DROP TABLE IF EXISTS `ddv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ddv` (
  `idDDV` int(11) NOT NULL,
  `Vrednost` double NOT NULL COMMENT 'Example: if the VAT is 22%, record must be 0.22',
  `Aktiven` tinyint(1) NOT NULL COMMENT '"True" if the VAT is active, "false" otherwise. !!NOTE!! only one record can have "true" value',
  PRIMARY KEY (`idDDV`),
  UNIQUE KEY `idDDV_UNIQUE` (`idDDV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ddv`
--

LOCK TABLES `ddv` WRITE;
/*!40000 ALTER TABLE `ddv` DISABLE KEYS */;
INSERT INTO `ddv` VALUES (0,1.22,0);
/*!40000 ALTER TABLE `ddv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `narocila`
--

DROP TABLE IF EXISTS `narocila`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `narocila` (
  `idNarocila` int(11) NOT NULL AUTO_INCREMENT,
  `idStranke` int(11) NOT NULL,
  `DatumOddaje` datetime NOT NULL COMMENT 'Date when the user has placed the order',
  `Potrjeno` tinyint(1) DEFAULT NULL COMMENT '"False" until order has not been confirmed by seller and passed to the Racuni table, "true" after that',
  `Znesek` double DEFAULT NULL,
  `DatumPotrditve` datetime DEFAULT NULL COMMENT 'Date when seller has confirmed the order',
  `idDDV` int(11) NOT NULL,
  PRIMARY KEY (`idNarocila`),
  UNIQUE KEY `idNarocila_UNIQUE` (`idNarocila`),
  KEY `fk_Narocila_Stranke1_idx` (`idStranke`),
  CONSTRAINT `fk_Narocila_Stranke1` FOREIGN KEY (`idStranke`) REFERENCES `stranke` (`idStranke`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `narocila`
--

LOCK TABLES `narocila` WRITE;
/*!40000 ALTER TABLE `narocila` DISABLE KEYS */;
INSERT INTO `narocila` VALUES (1,1,'2017-09-01 08:57:00',1,646,NULL,0),(2,1,'2017-09-01 12:20:00',0,429,NULL,0),(3,1,'2017-01-19 20:36:24',0,906.97,NULL,0),(4,1,'2017-01-19 20:55:41',0,646.98,NULL,0),(5,1,'2017-01-19 21:02:06',0,357,NULL,0),(6,1,'2017-01-19 21:03:40',0,149.99,NULL,0),(7,1,'2017-01-19 21:08:10',1,357,NULL,0),(8,1,'2017-01-19 21:09:03',1,259.99,NULL,0),(9,1,'2017-01-19 21:20:28',1,289.98,NULL,0),(10,1,'2017-01-19 21:21:26',1,357,NULL,0),(11,1,'2017-01-19 21:22:40',1,54.99,NULL,0),(12,1,'2017-01-19 21:24:23',1,357,NULL,0),(13,1,'2017-01-19 21:25:15',1,259.99,NULL,0),(14,1,'2017-01-19 21:25:47',1,209.99,NULL,0),(15,1,'2017-01-20 14:40:06',1,149.99,NULL,0),(16,1,'2017-01-20 14:45:18',1,289.97,NULL,0),(17,1,'2017-01-20 14:55:35',1,357,NULL,0),(18,1,'2017-01-20 14:57:16',1,289.98,NULL,0),(19,1,'2017-01-21 19:38:17',1,357,NULL,0),(20,1,'2017-01-21 19:41:56',1,289.98,NULL,0),(21,1,'2017-01-21 20:27:59',1,1071,NULL,0),(22,1,'2017-01-23 08:57:24',1,357,NULL,0);
/*!40000 ALTER TABLE `narocila` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `narocila_det`
--

DROP TABLE IF EXISTS `narocila_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `narocila_det` (
  `idNarocila_det` int(11) NOT NULL AUTO_INCREMENT,
  `idNarocila` int(11) NOT NULL,
  `idArtikla` int(11) NOT NULL,
  `Kolicina` int(11) DEFAULT NULL,
  PRIMARY KEY (`idNarocila_det`),
  UNIQUE KEY `idNarocila_det_UNIQUE` (`idNarocila_det`),
  KEY `fk_Narocila_det_Narocila_idx` (`idNarocila`),
  KEY `fk_Narocila_det_Artikli1_idx` (`idArtikla`),
  CONSTRAINT `fk_Narocila_det_Artikli1` FOREIGN KEY (`idArtikla`) REFERENCES `artikli` (`idArtikla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Narocila_det_Narocila` FOREIGN KEY (`idNarocila`) REFERENCES `narocila` (`idNarocila`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `narocila_det`
--

LOCK TABLES `narocila_det` WRITE;
/*!40000 ALTER TABLE `narocila_det` DISABLE KEYS */;
INSERT INTO `narocila_det` VALUES (1,1,1,1),(2,1,2,1),(3,2,7,1),(4,2,9,1),(5,2,10,1),(6,3,2,1),(7,3,8,1),(8,3,3,1),(9,4,1,1),(10,4,2,1),(11,5,1,1),(12,6,10,1),(13,7,1,1),(14,8,8,1),(15,9,2,1),(16,10,3,1),(17,11,6,1),(18,12,3,1),(19,13,8,1),(20,14,5,1),(21,15,10,1),(22,16,7,1),(23,16,5,1),(24,17,1,1),(25,18,2,1),(26,19,1,1),(27,20,2,1),(28,21,1,1),(29,21,3,1),(30,21,4,1),(31,22,1,1);
/*!40000 ALTER TABLE `narocila_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oceneartiklov`
--

DROP TABLE IF EXISTS `oceneartiklov`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oceneartiklov` (
  `idOceneArtikla` int(11) NOT NULL AUTO_INCREMENT,
  `idArtikla` int(11) NOT NULL,
  `idStranke` int(11) DEFAULT NULL,
  `Ocena` int(11) NOT NULL,
  `Mnenje` mediumtext,
  PRIMARY KEY (`idOceneArtikla`),
  UNIQUE KEY `idOceneArtikla_UNIQUE` (`idOceneArtikla`),
  KEY `fk_OceneArtiklov_Artikli1_idx` (`idArtikla`),
  KEY `fk_OceneArtiklov_Stranke1_idx` (`idStranke`),
  CONSTRAINT `fk_OceneArtiklov_Artikli1` FOREIGN KEY (`idArtikla`) REFERENCES `artikli` (`idArtikla`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OceneArtiklov_Stranke1` FOREIGN KEY (`idStranke`) REFERENCES `stranke` (`idStranke`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oceneartiklov`
--

LOCK TABLES `oceneartiklov` WRITE;
/*!40000 ALTER TABLE `oceneartiklov` DISABLE KEYS */;
/*!40000 ALTER TABLE `oceneartiklov` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodajalci`
--

DROP TABLE IF EXISTS `prodajalci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prodajalci` (
  `idProdajalca` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(45) DEFAULT NULL,
  `Priimek` varchar(45) DEFAULT NULL,
  `Eposta` varchar(45) NOT NULL,
  `Geslo` char(128) NOT NULL,
  `Aktiven` tinyint(1) NOT NULL COMMENT '"true" if the seller is active and has rights to manage store items, "false" otherwise',
  PRIMARY KEY (`idProdajalca`),
  UNIQUE KEY `idProdajalca_UNIQUE` (`idProdajalca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodajalci`
--

LOCK TABLES `prodajalci` WRITE;
/*!40000 ALTER TABLE `prodajalci` DISABLE KEYS */;
INSERT INTO `prodajalci` VALUES (1,'Nejc','Pušnik','neic.pusnik@gmail.com','acdb206b8ad04142c5ad29bfd4704bf7',0),(2,'Martin','Kozmelj','nyno.111@gmail.com','6635bd6b6c7b1f90b44d1b4f463be9d7',0),(3,'Luka','Bezovšek','luka.bezovsek@gmail.com','a29e2b1b328bca5eccba094e34155f28',0);
/*!40000 ALTER TABLE `prodajalci` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `racuni`
--

DROP TABLE IF EXISTS `racuni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `racuni` (
  `idRacuna` int(11) NOT NULL AUTO_INCREMENT,
  `idNarocila` int(11) NOT NULL,
  `idProdajalca` int(11) DEFAULT NULL COMMENT 'iD of the seller who has confirmed/ changed order',
  `Aktiven` tinyint(1) NOT NULL COMMENT '"false"  if the bill has been canceled',
  `Zakljucen` tinyint(1) NOT NULL COMMENT '"True" if the payment has been recieved and items have been shipped, "false" otherwise',
  `DatumSpremembe` datetime DEFAULT NULL COMMENT 'Date when the status has changed (Aktiven and/or Zakljucen)',
  PRIMARY KEY (`idRacuna`),
  UNIQUE KEY `idRacuna_UNIQUE` (`idRacuna`),
  KEY `fk_Racuni_Narocila1_idx` (`idNarocila`),
  KEY `fk_Racuni_Prodajalci1_idx` (`idProdajalca`),
  CONSTRAINT `fk_Racuni_Narocila1` FOREIGN KEY (`idNarocila`) REFERENCES `narocila` (`idNarocila`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Racuni_Prodajalci1` FOREIGN KEY (`idProdajalca`) REFERENCES `prodajalci` (`idProdajalca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `racuni`
--

LOCK TABLES `racuni` WRITE;
/*!40000 ALTER TABLE `racuni` DISABLE KEYS */;
INSERT INTO `racuni` VALUES (1,2,3,0,0,'2017-01-10 03:02:02'),(2,1,3,1,0,'2017-01-10 03:02:04'),(3,1,3,1,0,'2017-01-10 03:24:34'),(4,1,3,1,0,'2017-01-10 03:24:35'),(5,1,3,1,0,'2017-01-17 10:43:47'),(6,6,3,0,0,'2017-01-20 12:13:22'),(7,1,3,1,0,'2017-01-20 03:36:56'),(8,2,3,0,0,'2017-01-20 03:36:57'),(9,3,3,0,0,'2017-01-20 03:36:58'),(10,4,3,0,0,'2017-01-22 09:00:06'),(11,5,3,0,0,'2017-01-22 09:00:23'),(12,6,3,0,0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `racuni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slike`
--

DROP TABLE IF EXISTS `slike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slike` (
  `idSlike` int(11) NOT NULL AUTO_INCREMENT,
  `idArtikla` int(11) DEFAULT NULL,
  `Slika` blob,
  `naslovSlike` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSlike`),
  UNIQUE KEY `idSlike_UNIQUE` (`idSlike`),
  KEY `fk_Slike_Artikli1_idx` (`idArtikla`),
  CONSTRAINT `fk_Slike_Artikli1` FOREIGN KEY (`idArtikla`) REFERENCES `artikli` (`idArtikla`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slike`
--

LOCK TABLES `slike` WRITE;
/*!40000 ALTER TABLE `slike` DISABLE KEYS */;
INSERT INTO `slike` VALUES (1,1,NULL,'http://cdn.macrumors.com/article-new/2013/10/'),(2,1,NULL,'http://bargainclan.com/wp-content/uploads/201');
/*!40000 ALTER TABLE `slike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stranke`
--

DROP TABLE IF EXISTS `stranke`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stranke` (
  `idStranke` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(45) DEFAULT NULL,
  `Priimek` varchar(45) DEFAULT NULL,
  `Eposta` varchar(45) NOT NULL,
  `Geslo` char(128) NOT NULL,
  `Aktiven` tinyint(1) NOT NULL COMMENT '"True if the customer is active and has rights to access store items and buying them, "false" otherwise',
  PRIMARY KEY (`idStranke`),
  UNIQUE KEY `idStranke_UNIQUE` (`idStranke`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stranke`
--

LOCK TABLES `stranke` WRITE;
/*!40000 ALTER TABLE `stranke` DISABLE KEYS */;
INSERT INTO `stranke` VALUES (1,'Luka','Bezovšek','luka.bezovsek@gmail.com','7d1303e9680ea17c41a2cf6e79cd48ec',0),(2,'Janez','Novak','janez.novak@mail.com','cbae1003c4885a0fdf7840b112beda63',0),(3,'Petra','Oblak','petra.oblak@gmail.com','e38646fb06e2de28080ed4e06fedea8c',0);
/*!40000 ALTER TABLE `stranke` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-24  9:16:37
