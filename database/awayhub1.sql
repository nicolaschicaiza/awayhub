-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: awayhub
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal` int NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,1061807588,1,5,5000);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` int NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Leche entera',3000),(2,'Galletas',1000);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cliente` (
  `id_cliente` int NOT NULL,
  `id_persona` int NOT NULL,
  `pedido` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `tbl_cliente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `tbl_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cliente`
--

LOCK TABLES `tbl_cliente` WRITE;
/*!40000 ALTER TABLE `tbl_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_domiciliario`
--

DROP TABLE IF EXISTS `tbl_domiciliario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_domiciliario` (
  `id_domiciliario` int NOT NULL,
  `id_persona` int NOT NULL,
  `vehiculo` int NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_domiciliario`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `tbl_domiciliario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `tbl_persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_domiciliario`
--

LOCK TABLES `tbl_domiciliario` WRITE;
/*!40000 ALTER TABLE `tbl_domiciliario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_domiciliario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_domicilio`
--

DROP TABLE IF EXISTS `tbl_domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_domicilio` (
  `id_domi` int NOT NULL,
  `id_pedido` int NOT NULL,
  `id_domiciliario` int NOT NULL,
  `estados` varchar(15) NOT NULL,
  PRIMARY KEY (`id_domi`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_domiciliario` (`id_domiciliario`),
  CONSTRAINT `tbl_domicilio_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedido` (`id_pedido`),
  CONSTRAINT `tbl_domicilio_ibfk_2` FOREIGN KEY (`id_domiciliario`) REFERENCES `tbl_domiciliario` (`id_domiciliario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_domicilio`
--

LOCK TABLES `tbl_domicilio` WRITE;
/*!40000 ALTER TABLE `tbl_domicilio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_establecimiento`
--

DROP TABLE IF EXISTS `tbl_establecimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_establecimiento` (
  `nombre_est` varchar(50) NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nombre_est`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_establecimiento`
--

LOCK TABLES `tbl_establecimiento` WRITE;
/*!40000 ALTER TABLE `tbl_establecimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pedido`
--

DROP TABLE IF EXISTS `tbl_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pedido` (
  `id_pedido` int NOT NULL,
  `id_cliente` int NOT NULL,
  `id_domi` int NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_domi` (`id_domi`),
  CONSTRAINT `tbl_pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`),
  CONSTRAINT `tbl_pedido_ibfk_2` FOREIGN KEY (`id_domi`) REFERENCES `tbl_domicilio` (`id_domi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pedido`
--

LOCK TABLES `tbl_pedido` WRITE;
/*!40000 ALTER TABLE `tbl_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_persona`
--

DROP TABLE IF EXISTS `tbl_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_persona` (
  `id_persona` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_persona`
--

LOCK TABLES `tbl_persona` WRITE;
/*!40000 ALTER TABLE `tbl_persona` DISABLE KEYS */;
INSERT INTO `tbl_persona` VALUES (1061807588,'Nicolas Chicaiza','1061807588','3008579244');
/*!40000 ALTER TABLE `tbl_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_producto`
--

DROP TABLE IF EXISTS `tbl_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_producto` (
  `id_producto` int NOT NULL,
  `id_pedido` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` varchar(25) NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_pedido` (`id_pedido`),
  CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_producto`
--

LOCK TABLES `tbl_producto` WRITE;
/*!40000 ALTER TABLE `tbl_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_vehiculo`
--

DROP TABLE IF EXISTS `tbl_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_vehiculo` (
  `id_vehiculo` int NOT NULL,
  `id_domiciliario` int NOT NULL,
  `tipo_vehi` varchar(10) NOT NULL,
  `capacidad` int NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `id_domiciliario` (`id_domiciliario`),
  CONSTRAINT `tbl_vehiculo_ibfk_1` FOREIGN KEY (`id_domiciliario`) REFERENCES `tbl_domiciliario` (`id_domiciliario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_vehiculo`
--

LOCK TABLES `tbl_vehiculo` WRITE;
/*!40000 ALTER TABLE `tbl_vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `cedula` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-21 20:17:20
