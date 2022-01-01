-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: inventario
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ict_categorias`
--

DROP TABLE IF EXISTS `ict_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_categorias` (
  `icp_id_categorias` int(11) NOT NULL AUTO_INCREMENT,
  `iccategoriasnombre` varchar(255) NOT NULL,
  PRIMARY KEY (`icp_id_categorias`),
  UNIQUE KEY `icp_id_categorias` (`icp_id_categorias`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_categorias`
--

LOCK TABLES `ict_categorias` WRITE;
/*!40000 ALTER TABLE `ict_categorias` DISABLE KEYS */;
INSERT INTO `ict_categorias` VALUES (1,'Asesoria tecnica y capacitacion'),(2,'Gastos en recursos de aprendizaje'),(3,'Gastos en equipamiento de apoyo pedagogico'),(4,'Gasto bienestar alumnos'),(5,'Gastos de Operacion'),(6,'Servicios basicos'),(7,'Servicios generales'),(8,'Multas e intereses'),(9,'Arriendo de inmuebles'),(10,'Arriendos de bienes muebles'),(11,'Gastos en construccion y mantencion de infraestructura'),(12,'Gastos mantencion y reparacion de bienes muebles'),(13,'Adquisicion de bienes muebles e inmuebles'),(14,'Egresos por recursos centralizados');
/*!40000 ALTER TABLE `ict_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_configuracion`
--

DROP TABLE IF EXISTS `ict_configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_configuracion` (
  `icp_id_configuracion` int(10) NOT NULL AUTO_INCREMENT,
  `icconfiguracion_rut` varchar(12) NOT NULL,
  `icconfiguracion_nombre` varchar(255) NOT NULL,
  `icconfiguracion_direccion` varchar(255) NOT NULL,
  `icconfiguracion_telefono1` varchar(14) NOT NULL,
  `icconfiguracion_cedula` varchar(12) NOT NULL,
  `icconfiguracion_nombredirector` varchar(255) NOT NULL,
  `icconfiguracion_apellidodirector` varchar(255) NOT NULL,
  `icconfiguracion_email` varchar(255) NOT NULL,
  `icconfiguracion_telefono2` varchar(14) NOT NULL,
  `icconfiguracion_telefono3` varchar(14) NOT NULL,
  PRIMARY KEY (`icp_id_configuracion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_configuracion`
--

LOCK TABLES `ict_configuracion` WRITE;
/*!40000 ALTER TABLE `ict_configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `ict_configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_producto`
--

DROP TABLE IF EXISTS `ict_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_producto` (
  `icp_id_producto` int(10) NOT NULL AUTO_INCREMENT,
  `icprod_codigo` varchar(13) NOT NULL,
  `icprod_tipo_subvencion` int(11) NOT NULL,
  `icprod_producto` varchar(255) NOT NULL,
  `icprod_tipo_doc` int(11) DEFAULT NULL,
  `icprod_numero_doc` varchar(255) DEFAULT NULL,
  `icprod_fecha_compra` date NOT NULL,
  `icprod_fecha_pago` date NOT NULL,
  `icprod_comentarios` varchar(255) NOT NULL,
  `icprod_proveedor` int(11) DEFAULT NULL,
  `icprod_precio` varchar(255) DEFAULT NULL,
  `icprod_cantidad` varchar(255) DEFAULT NULL,
  `icprod_tipo_pago` int(11) NOT NULL,
  `icprod_tipo_categoria` int(11) NOT NULL,
  `icprod_tipo_subcategoria` int(11) NOT NULL,
  `icprod_accion` varchar(255) NOT NULL,
  `icprod_estado_producto` varchar(255) NOT NULL,
  `icprod_fecha_recepcion` date NOT NULL,
  `icprod_ubicacion` varchar(255) NOT NULL,
  `icprod_fecha_baja` date NOT NULL,
  `icprod_nom_responsable` varchar(255) NOT NULL,
  PRIMARY KEY (`icp_id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_producto`
--

LOCK TABLES `ict_producto` WRITE;
/*!40000 ALTER TABLE `ict_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `ict_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_proveedor`
--

DROP TABLE IF EXISTS `ict_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_proveedor` (
  `icp_id_proveedor` int(10) NOT NULL AUTO_INCREMENT,
  `icp_rut` varchar(12) NOT NULL,
  `icp_nombre` varchar(255) NOT NULL,
  `icp_nombrecontacto` varchar(100) NOT NULL,
  `icp_telefono` varchar(255) DEFAULT NULL,
  `icp_celular` varchar(255) DEFAULT NULL,
  `icp_direccion` varchar(255) DEFAULT NULL,
  `icp_ciudad` varchar(255) NOT NULL,
  `icp_correo` varchar(255) DEFAULT NULL,
  `icp_sitioweb` varchar(255) DEFAULT NULL,
  `icp_giro` varchar(255) DEFAULT NULL,
  `icp_contacto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`icp_id_proveedor`),
  UNIQUE KEY `icp_id_proveedor` (`icp_id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_proveedor`
--

LOCK TABLES `ict_proveedor` WRITE;
/*!40000 ALTER TABLE `ict_proveedor` DISABLE KEYS */;
INSERT INTO `ict_proveedor` VALUES (50,'14.222.423-2','Pamela','Alejandra','452222222','56943434343','sgdghsfedhg','Temuco','pamela@gmail.com','www.inventario.cl','desarrollo web y base datos','zxcbfdsbgsrbs'),(53,'22.222.222-2','zoe','ayun','453 121212','9 77762655','Esta es la direccion','Temuco','zoyun@gmail.com','www.inventario.cl','Todos','Estos son los datos del contacto'),(54,'7.777.777-7','Libreria Ezequiel','Ismael','452713612','','Esmeralda 422','Angol','ismael@mail.com','www.libreriaezequiel.kon','','');
/*!40000 ALTER TABLE `ict_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_subcategorias`
--

DROP TABLE IF EXISTS `ict_subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_subcategorias` (
  `icp_id_subcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `icsubcategoriasnombre` varchar(255) NOT NULL,
  `icp_id_categorias` int(11) NOT NULL,
  PRIMARY KEY (`icp_id_subcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_subcategorias`
--

LOCK TABLES `ict_subcategorias` WRITE;
/*!40000 ALTER TABLE `ict_subcategorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `ict_subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_tipodocumentos`
--

DROP TABLE IF EXISTS `ict_tipodocumentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_tipodocumentos` (
  `icp_id_documentos` int(11) NOT NULL AUTO_INCREMENT,
  `ictipodocumento` varchar(255) NOT NULL,
  PRIMARY KEY (`icp_id_documentos`),
  UNIQUE KEY `icp_id_documentos` (`icp_id_documentos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_tipodocumentos`
--

LOCK TABLES `ict_tipodocumentos` WRITE;
/*!40000 ALTER TABLE `ict_tipodocumentos` DISABLE KEYS */;
INSERT INTO `ict_tipodocumentos` VALUES (1,'boleta'),(2,'factura'),(3,'Nota de debito');
/*!40000 ALTER TABLE `ict_tipodocumentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_tipopago`
--

DROP TABLE IF EXISTS `ict_tipopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_tipopago` (
  `icp_id_tipopago` int(11) NOT NULL AUTO_INCREMENT,
  `ictipopago` varchar(255) NOT NULL,
  PRIMARY KEY (`icp_id_tipopago`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_tipopago`
--

LOCK TABLES `ict_tipopago` WRITE;
/*!40000 ALTER TABLE `ict_tipopago` DISABLE KEYS */;
INSERT INTO `ict_tipopago` VALUES (1,'cheque'),(2,'efectivo'),(3,'otro'),(4,'nota de credito'),(5,'Tarjeta de Credito');
/*!40000 ALTER TABLE `ict_tipopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_tiposubvencion`
--

DROP TABLE IF EXISTS `ict_tiposubvencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_tiposubvencion` (
  `icp_id_tiposubvencion` int(11) NOT NULL AUTO_INCREMENT,
  `ictiposubvencion` varchar(255) NOT NULL,
  PRIMARY KEY (`icp_id_tiposubvencion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_tiposubvencion`
--

LOCK TABLES `ict_tiposubvencion` WRITE;
/*!40000 ALTER TABLE `ict_tiposubvencion` DISABLE KEYS */;
INSERT INTO `ict_tiposubvencion` VALUES (1,'subvencion general'),(2,'SEP'),(3,'PIE'),(4,'proretencion'),(5,'mantenimiento');
/*!40000 ALTER TABLE `ict_tiposubvencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ict_usuarios`
--

DROP TABLE IF EXISTS `ict_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ict_usuarios` (
  `icp_id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL,
  PRIMARY KEY (`icp_id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ict_usuarios`
--

LOCK TABLES `ict_usuarios` WRITE;
/*!40000 ALTER TABLE `ict_usuarios` DISABLE KEYS */;
INSERT INTO `ict_usuarios` VALUES (1,'Gabriel','Herrera','56987654321','gabriel@gmail.com','123456','asistente'),(2,'Martin','Herrera','56987654321','martin@gmail.com','123456','admin'),(3,'Israel','Palma','56987654321','israel@gmail.com','123456','asistente');
/*!40000 ALTER TABLE `ict_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `IdRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `ict_usuarios` int(11) NOT NULL,
  `fechaentrada` date NOT NULL,
  `horaentrada` time NOT NULL,
  `fechasalida` date DEFAULT NULL,
  `horasalida` time DEFAULT NULL,
  KEY `ict_usuarios` (`IdRegistro`),
  KEY `usuariobitacora` (`ict_usuarios`),
  CONSTRAINT `usuariobitacora` FOREIGN KEY (`ict_usuarios`) REFERENCES `ict_usuarios` (`icp_id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,1,'2021-12-06','03:22:04','2021-12-06','03:23:30'),(2,1,'2021-12-06','03:25:36','2021-12-06','03:34:35'),(3,2,'2021-12-06','03:34:52','2021-12-06','03:37:33'),(4,1,'2021-12-06','03:55:01','2021-12-06','03:56:59'),(5,1,'2021-12-06','03:59:07','2021-12-06','04:01:37'),(6,2,'2021-12-06','04:01:54','2021-12-06','04:08:52'),(7,1,'2021-12-06','04:09:00',NULL,NULL),(8,1,'2021-12-07','01:24:11',NULL,NULL),(9,2,'2021-12-18','19:40:45','2021-12-18','19:41:25'),(10,1,'2021-12-18','19:41:35','2021-12-18','19:46:23'),(11,2,'2021-12-18','20:00:52','2021-12-18','20:02:17'),(12,1,'2021-12-18','20:02:26','2021-12-18','21:05:02'),(13,2,'2021-12-18','21:05:16','2021-12-18','21:27:25'),(14,2,'2021-12-18','21:30:50','2021-12-18','21:37:03'),(15,2,'2021-12-18','22:33:05',NULL,NULL);
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-18 18:33:13
