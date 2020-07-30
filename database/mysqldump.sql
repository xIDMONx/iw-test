-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: iw
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

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
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `premiere_date` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (3,2,'Space Jam - El Juego del Siglo','Comedias','1996-12-01','¿Qué hay de nuevo, viejo? Diversión fuera de este mundo. Pequeñas criaturas del espacio llegan para secuestrar a los Looney Tunes para llevar diversión a su aburrido planeta. Para conservar su libertad, Bugs Bunny los reta a un juego de basketball pensando que los intrusos no tienen ninguna oportunidad de ganar.','2020-07-30 08:41:12','2020-07-30 09:07:27'),(4,1,'El arte de ser adulto','Comedias','2020-01-01','Pete Davidson es un comediante y actor estadounidense, miembro del elenco de Saturday Night Live. Ha realizado comedias de stand-up en varios espectáculos y recientemente incursionó como actor en cine y televisión. Ha sido elogiado por basar su comedia en su propia vida y emplear aspectos de su vida que lo hacen identificable con el público. Estos sucesos son justamente la base de El arte de ser adulto, una comedia dramática semi-autobiográfica que pasa por su infancia en Staten Island, la pérdida de su padre durante el ataque terrorista a las Torres Gemelas del WTC el 11 de septiembre y su entrada al mundo del stand-up.','2020-07-30 09:15:48','2020-07-30 09:15:48'),(5,3,'Rápidos y Furiosos','De acción','2009-01-01','Cuando un delito los sitúa de nuevo en Los Angeles, el ex-convicto y fugitivo Dom Toretto enciende nuevamente su enemistad con el agente Brian O\'Conner. Pero cuando ellos son obligados a encarar a un enemigo común, Dom y Brian deben ceder ante una nueva confianza incierta si ellos esperan maniobrar este circuito. Entre atracos a convoys y velocidades extremas en un túnel de precisión a través de la frontera internacional entre México y USA, dos hombres encontrarán el mejor modo de conseguir la venganza: llevándote a los límites de lo que es posible detrás de unas ruedas.','2020-07-30 09:18:37','2020-07-30 09:18:37'),(6,3,'Deberías haberte ido','De terror','2020-01-01','David es un escritor que espera poder redactar el guion de una película para volver a lanzar su carrera. Para ello, David se traslada, junto a su mujer y su hija, a una casa que la familia alquila en las montañas de Alemania. Sin embargo, algo en el inmueble no parece ir del todo bien. La estancia promete cambiar para siempre a una familia que debe enfrentarse a unos eventos inexplicables y, sobre todo, al aparente cambio que está sufriendo.','2020-07-30 09:19:53','2020-07-30 09:19:53');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL DEFAULT 0,
  `telephone` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Juan Carlos','Garcia Bonilla',26,'2481243218','jcarlos_gb74@hotmail.com','2020-07-29 19:06:44','$2y$10$02v50BqNR9iRfu.RA9AMt.wnwhPzNq0FoHHtsl/3uyRjhJ1RUh1.6',NULL,'2020-07-30 00:06:44','2020-07-30 00:06:44'),(2,'Fatima','de Ojeda Alcantar',24,'4274276231','fatimadeojeda@gmail.com','2020-07-30 04:14:07','$2y$10$YQgCqIqG9M8KB.qaaHKmxuf6cc4Cw3.HtaPA.TaIWSNZE83hu.4qe','yptyjrvbBW9SmGzNM6mCeN365Ovkgc7y34qynI2XWeswIpzH9AMMgSlweDF0','2020-07-30 00:10:39','2020-07-30 04:14:07'),(3,'Luis Enrique','Garcia Bonilla',24,'2481555453','layka30sep@gmail.com','2020-07-29 19:20:35','$2y$10$GHJbJ2G0ip.kXd6U8Zp9yOjyhmaU8oFBytIUMwYwW6lmg7OHdRGBy',NULL,'2020-07-30 00:20:35','2020-07-30 00:20:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-29 23:32:23
