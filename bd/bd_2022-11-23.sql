CREATE DATABASE  IF NOT EXISTS `guia_academica` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `guia_academica`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: guia_academica
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignatura` (
  `id_asignatura` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `horas_teoria` tinyint NOT NULL DEFAULT '0',
  `horas_practica` tinyint NOT NULL DEFAULT '0',
  `horas_laboratorio` tinyint NOT NULL DEFAULT '0',
  `nro_ciclo` tinyint NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_curricula` int NOT NULL,
  PRIMARY KEY (`id_asignatura`),
  KEY `fk_asignatura_curricula1_idx` (`id_curricula`),
  CONSTRAINT `fk_asignatura_curricula1` FOREIGN KEY (`id_curricula`) REFERENCES `curricula` (`id_curricula`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura`
--

LOCK TABLES `asignatura` WRITE;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
INSERT INTO `asignatura` VALUES (1,'MATEMÁTICA',2,2,0,1,NULL,1),(2,'COMUNICACIÓN Y REDACCIÓN',2,2,0,1,NULL,1),(3,'METODOLOGÍA DEL TRABAJO UNIVERSITARIO',0,4,0,1,NULL,1),(4,'FUNDAMENTOS DE PROGRAMACIÓN',2,0,2,1,NULL,1),(5,'QUÍMICA',2,0,2,1,NULL,1),(6,'MATEMÁTICA DISCRETA I',3,0,2,1,NULL,1),(7,'PROGRAMACIÓN GRÁFICA',2,0,4,1,NULL,1),(8,'ECOLOGÍA Y AMBIENTE',2,2,0,2,NULL,1),(9,'REALIDAD NACIONAL E INTERNACIONAL',0,4,0,2,NULL,1),(10,'FILOSOFÍA ÉTICA Y SOCIEDAD',2,2,0,2,NULL,1),(11,'MATEMÁTICA I',2,2,0,2,NULL,1),(12,'FÍSICA I',2,0,2,2,NULL,1),(13,'MATEMÁTICA DISCRETA II',3,2,0,2,NULL,1),(14,'PROGRAMACIÓN AVANZADA',2,2,2,2,NULL,1),(15,'TEORÍA GENERAL DE SISTEMAS',1,2,0,3,NULL,1),(16,'SISTEMAS ELÉCTRICOS Y ELECTRÓNICOS',2,4,0,3,NULL,1),(17,'ESTRUCTURA DE DATOS',2,2,2,3,NULL,1),(18,'ALGORITMOS Y PROGRAMACIÓN PARALELA',2,2,2,3,NULL,1),(19,'MATEMÁTICA II',3,2,0,3,NULL,1),(20,'ESTADÍSTICA Y PROBABILIDADES',3,0,2,3,NULL,1);
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curricula`
--

DROP TABLE IF EXISTS `curricula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curricula` (
  `id_curricula` int NOT NULL AUTO_INCREMENT,
  `regimen` char(2) NOT NULL,
  `anio` char(4) NOT NULL,
  `id_escuela` int NOT NULL,
  PRIMARY KEY (`id_curricula`),
  KEY `fk_curricula_escuela1_idx` (`id_escuela`),
  CONSTRAINT `fk_curricula_escuela1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curricula`
--

LOCK TABLES `curricula` WRITE;
/*!40000 ALTER TABLE `curricula` DISABLE KEYS */;
INSERT INTO `curricula` VALUES (1,'F2','2018',1);
/*!40000 ALTER TABLE `curricula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escuela`
--

DROP TABLE IF EXISTS `escuela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `escuela` (
  `id_escuela` int NOT NULL AUTO_INCREMENT,
  `abreviatura` char(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_facultad` int NOT NULL,
  PRIMARY KEY (`id_escuela`),
  KEY `fk_escuela_facultad1_idx` (`id_facultad`),
  CONSTRAINT `fk_escuela_facultad1` FOREIGN KEY (`id_facultad`) REFERENCES `facultad` (`id_facultad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escuela`
--

LOCK TABLES `escuela` WRITE;
/*!40000 ALTER TABLE `escuela` DISABLE KEYS */;
INSERT INTO `escuela` VALUES (1,'ESIS','ESCUELA PROFESIONAL DE INGENIERÍA EN INFORMÁTICA Y SISTEMAS',1);
/*!40000 ALTER TABLE `escuela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultad`
--

DROP TABLE IF EXISTS `facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facultad` (
  `id_facultad` int NOT NULL AUTO_INCREMENT,
  `abreviatura` char(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_facultad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultad`
--

LOCK TABLES `facultad` WRITE;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` VALUES (1,'FAIN','FACULTAD DE INGENIERÍA');
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prerrequisito`
--

DROP TABLE IF EXISTS `prerrequisito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prerrequisito` (
  `id_asignatura` int NOT NULL,
  `id_asignatura1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prerrequisito`
--

LOCK TABLES `prerrequisito` WRITE;
/*!40000 ALTER TABLE `prerrequisito` DISABLE KEYS */;
/*!40000 ALTER TABLE `prerrequisito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `situacion_asignatura`
--

DROP TABLE IF EXISTS `situacion_asignatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `situacion_asignatura` (
  `tipo` tinyint NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `id_usuario` int NOT NULL,
  `id_asignatura` int NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_asignatura`),
  KEY `fk_situacion_asignatura_asignatura_idx` (`id_asignatura`),
  CONSTRAINT `fk_situacion_asignatura_asignatura` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`),
  CONSTRAINT `fk_situacion_asignatura_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `situacion_asignatura`
--

LOCK TABLES `situacion_asignatura` WRITE;
/*!40000 ALTER TABLE `situacion_asignatura` DISABLE KEYS */;
INSERT INTO `situacion_asignatura` VALUES (1,'2022-11-23 00:00:00',1,1);
/*!40000 ALTER TABLE `situacion_asignatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `contrasenia` varchar(45) DEFAULT NULL,
  `tipo_usuario` tinyint DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido1` varchar(45) DEFAULT NULL,
  `apellido2` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ultima_sesion` datetime DEFAULT NULL,
  `estado_sesion` tinyint DEFAULT NULL,
  `ciclo` tinyint DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email_institucional` varchar(60) DEFAULT NULL,
  `id_curricula` int DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_curricula_idx` (`id_curricula`),
  CONSTRAINT `fk_usuario_curricula` FOREIGN KEY (`id_curricula`) REFERENCES `curricula` (`id_curricula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'2018-119025','1234',1,'Julio','Choquehuayta','Quenta','2001-04-27',NULL,NULL,8,'M',NULL,NULL,1),(2,'2015-119026','12345',1,'Carlos','Azañero','Otoya',NULL,NULL,NULL,8,'M',NULL,NULL,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'guia_academica'
--
/*!50003 DROP PROCEDURE IF EXISTS `cursos_por_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cursos_por_usuario`(IN _codigo VARCHAR(20))
BEGIN
	SELECT asignatura.id_asignatura, asignatura.nombre, asignatura.horas_teoria + asignatura.horas_laboratorio/2 + asignatura.horas_practica/2 as creditos, asignatura.nro_ciclo  FROM (asignatura INNER JOIN curricula ON asignatura.id_curricula = curricula.id_curricula) INNER JOIN usuario ON usuario.id_curricula = curricula.id_curricula WHERE usuario.codigo = _codigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-23  5:54:55
