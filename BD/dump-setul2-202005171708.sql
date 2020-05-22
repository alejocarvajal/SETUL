-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: setul2
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.16-MariaDB

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
-- Table structure for table `asignatura_test`
--

DROP TABLE IF EXISTS `asignatura_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignatura_test` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` bigint(20) unsigned NOT NULL,
  `asignatura_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `asignatura_test_test_id_foreign` (`test_id`),
  KEY `asignatura_test_asignatura_id_foreign` (`asignatura_id`),
  CONSTRAINT `asignatura_test_asignatura_id_foreign` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`),
  CONSTRAINT `asignatura_test_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignatura_test`
--

LOCK TABLES `asignatura_test` WRITE;
/*!40000 ALTER TABLE `asignatura_test` DISABLE KEYS */;
INSERT INTO `asignatura_test` VALUES (1,1,1);
/*!40000 ALTER TABLE `asignatura_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaturas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` VALUES (1,'Programacion 1','Programacion 1','2020-02-25 00:27:52','2020-02-25 00:34:04',NULL);
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (46,'2014_10_12_000000_create_users_table',1),(47,'2014_10_12_100000_create_password_resets_table',1),(48,'2018_09_23_174857_create_table_asignatura',1),(49,'2018_09_23_211207_create_table_test',1),(50,'2018_09_23_211530_create_table_test_asignatura',1),(51,'2018_09_24_163833_create_table_participantes',1),(52,'2018_09_24_180446_create_table_preguntas',1),(53,'2018_09_24_184126_create_table_respuestas',1),(54,'2018_09_25_233505_create_table_registro_juego',1),(55,'2019_05_08_223729_create_table_configuracion',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participantes`
--

DROP TABLE IF EXISTS `participantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `universidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opc1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opc2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `test_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participantes_test_id_foreign` (`test_id`),
  CONSTRAINT `participantes_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participantes`
--

LOCK TABLES `participantes` WRITE;
/*!40000 ALTER TABLE `participantes` DISABLE KEYS */;
INSERT INTO `participantes` VALUES (1,'Alejandro Carvajal','123','Universidad Libre Pereira','2137783','3116651076',1,1,'2020-05-18 03:06:42','2020-05-18 03:06:42',NULL),(2,'Cristian Camilo Agudelo','1234567','Universidad Libre Pereira','56432','1234569',1,1,'2020-05-18 03:07:00','2020-05-18 03:07:00',NULL);
/*!40000 ALTER TABLE `participantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dificultad` int(11) NOT NULL,
  `docente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asignatura_id` bigint(20) unsigned NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_asignatura_id_foreign` (`asignatura_id`),
  CONSTRAINT `preguntas_asignatura_id_foreign` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES (2,'En un lenguaje débilmente tipado',1,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(3,'Una cola es',2,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(4,'Imperativo, declarativo y orientado a objetos son',1,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(5,'Dado el siguiente pseudocódigo, en el que read() permite al usuario introducir un valor entero, ¿cuál será el valor final de la variable \"i\"?\ni:=1;\nread(n);\nwhile i < n do begin\ni := i + 1\nend;',3,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(6,'if, else, for y while son',1,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(7,'Un bucle o ciclo es',2,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(8,'La programación se puede definir como…',1,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(9,'El lenguaje ensamblador se sitúa',1,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(10,'¿Cuál es el código ASCII decimal de \"nueva línea\" (line feed)?',3,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(11,'¿Qué es un algoritmo?',1,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(12,'int, char, float, string y boolean son',2,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(13,'¿Qué significa EOF?',2,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(14,'Se considera que el primer lenguaje de alto nivel fue',2,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(15,'El número 1010 en binario se representa en decimal como',3,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(16,'¿Cuál es el código ASCII decimal de la letra A mayúscula?',2,'Sistemas',1,1,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL);
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_juego`
--

DROP TABLE IF EXISTS `registro_juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_juego` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `participante_id` bigint(20) unsigned NOT NULL,
  `pregunta_id` bigint(20) unsigned NOT NULL,
  `respuesta_id` bigint(20) unsigned DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registro_juego_participante_id_foreign` (`participante_id`),
  KEY `registro_juego_pregunta_id_foreign` (`pregunta_id`),
  KEY `registro_juego_respuesta_id_foreign` (`respuesta_id`),
  CONSTRAINT `registro_juego_participante_id_foreign` FOREIGN KEY (`participante_id`) REFERENCES `participantes` (`id`),
  CONSTRAINT `registro_juego_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`),
  CONSTRAINT `registro_juego_respuesta_id_foreign` FOREIGN KEY (`respuesta_id`) REFERENCES `respuestas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_juego`
--

LOCK TABLES `registro_juego` WRITE;
/*!40000 ALTER TABLE `registro_juego` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregunta_id` bigint(20) unsigned NOT NULL,
  `correcta` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respuestas_pregunta_id_foreign` (`pregunta_id`),
  CONSTRAINT `respuestas_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
INSERT INTO `respuestas` VALUES (2,'Un valor de un tipo puede ser tratado como de otro tipo siempre que se realice una conversión de forma explícita',2,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(3,'Un valor de un tipo puede ser tratado como de otro tipo',2,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(4,'Un valor de un tipo nunca puede ser tratado como de otro tipo',2,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(5,'Las anteriores respuestas no son correctas',2,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(6,'Una estructura de datos en la que las inserciones se realizan por un extremo y las extracciones por el otro extremo',3,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(7,'Una estructura de datos en la que las inserciones y extracciones se realizan por el mismo extremo',3,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(8,'Una estructura de datos en la que sólo se pueden realizar inserciones, pero nunca extracciones',3,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(9,'Las anteriores respuestas no son correctas',3,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(10,'Paradigmas de programación',4,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(11,'Modos de compilar el código fuente de un programa de ordenador',4,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(12,'Modos de definir el pseudocódigo de un programa de ordenador',4,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(13,'Las anteriores respuestas no son correctas',4,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(14,'Las anteriores respuestas no son correctas',5,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(15,'1 si el valor introducido es igual o menor que 0; el valor introducido menos uno en cualquier otro caso',5,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(16,'1 si el valor introducido es igual o menor que 1; el valor introducido en cualquier otro caso',5,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(17,'1 si el valor introducido es igual o menor que 1; el valor introducido más uno en cualquier otro caso',5,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(18,'Sentencias de control',6,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(19,'Funciones de acceso a datos',6,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(20,'Tipos de datos',6,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(21,'Las anteriores respuestas no son correctas',6,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(22,'Una sentencia que permite ejecutar un bloque aislado de código varias veces hasta que se cumpla (o deje de cumplirse) la condición asignada al bucle',7,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(23,'Una sentencia que permite decidir si se ejecuta o no se ejecuta una sola vez un bloque aislado de código',7,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(24,'Una sentencia que ejecuta otra sentencia que a su vez ejecuta la primera sentencia',7,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(25,'Las anteriores respuestas no son correctas',7,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(26,'el proceso de diseñar, codificar, depurar y mantener el código fuente de programas de ordenador',8,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(27,'la ejecución de programas de ordenador desde la línea de comandos',8,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(28,'la instalación de programas en sistemas operativos desde la línea de comandos',8,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(29,'Las anteriores respuestas no son correctas',8,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(30,'Más cerca del lenguaje máquina que de los lenguajes de alto nivel',9,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(31,'Más cerca de los lenguajes de alto nivel que del lenguaje máquina',9,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(32,'No es un lenguaje de programación',9,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(33,'Las anteriores respuestas no son correctas',9,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(34,'10',10,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(35,'13',10,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(36,'32',10,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(37,'Las anteriores respuestas no son correctas',10,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(38,'Un conjunto de instrucciones o reglas bien definidas, ordenadas y finitas que permiten realizar una actividad mediante pasos sucesivos que no generen dudas a quien deba realizar dicha actividad',11,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(39,'Es una igualdad entre dos expresiones algebraicas, denominadas miembros, en las que aparecen valores conocidos o datos, y desconocidos o incógnitas, relacionados mediante operaciones',11,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(40,'Es una relación de variables que pueden ser cuantificadas para calcular el valor de otras de muy difícil o imposible cálculo y que suministra una solución para un problema',11,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(41,'Las anteriores respuestas no son correctas',11,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(42,'Tipos de datos',12,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(43,'Funciones de acceso a datos',12,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(44,'Instrucciones de acceso a datos',12,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(45,'Sentencias de control',12,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(46,'End of file',13,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(47,'Empty or full',13,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(48,'End of floop',13,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(49,'Las anteriores respuestas no son correctas',13,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(50,'Fortran',14,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(51,'Ada',14,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(52,'C',14,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(53,'Java',14,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(54,'Las anteriores respuestas no son correctas',15,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(55,'8',15,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(56,'12',15,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(57,'16',15,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(58,'65',16,1,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(59,'32',16,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(60,'97',16,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL),(61,'126',16,0,0,'2020-02-25 02:04:13','2020-02-25 02:04:13',NULL);
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_configuracion`
--

DROP TABLE IF EXISTS `table_configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_configuracion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_configuracion`
--

LOCK TABLES `table_configuracion` WRITE;
/*!40000 ALTER TABLE `table_configuracion` DISABLE KEYS */;
INSERT INTO `table_configuracion` VALUES (1,'fondo_juego','images/Fondo2.jpg',NULL,NULL,NULL),(2,'cantidad_preguntas','9',NULL,NULL,NULL),(3,'fondo_modo_juego','images/Fondo2.jpg',NULL,NULL,NULL);
/*!40000 ALTER TABLE `table_configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `preguntas_total` int(11) NOT NULL,
  `preguntas_baja` int(11) NOT NULL,
  `preguntas_media` int(11) NOT NULL,
  `preguntas_alta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` VALUES (1,'Prueba programacion 1','Prueba programacion 1','2020-02-24',5,2,2,1,'2020-02-25 00:29:00','2020-02-25 00:29:00',NULL);
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@admin.com','$2y$10$4e0MAYputqAX1Fx/JDqGWO8qUozs3fax8w3mWokOgyC4zs1GOJiSe',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'setul2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-17 17:08:30
