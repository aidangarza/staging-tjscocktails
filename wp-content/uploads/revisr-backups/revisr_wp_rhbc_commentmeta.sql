
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
DROP TABLE IF EXISTS `wp_rhbc_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rhbc_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_rhbc_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_rhbc_commentmeta` DISABLE KEYS */;
INSERT INTO `wp_rhbc_commentmeta` VALUES (1,21,'review','5'),(2,22,'review','3'),(3,23,'review','5'),(4,24,'review','4'),(5,25,'review','4'),(6,26,'review','2'),(7,27,'review','5'),(8,28,'review','4'),(9,29,'review','3'),(10,30,'review','5'),(11,31,'review','3'),(12,32,'review','3'),(13,33,'review','5'),(14,34,'review','4'),(15,35,'review','5'),(16,36,'review','3'),(17,37,'review','2'),(18,38,'review','4'),(19,39,'review','3'),(20,40,'review','4'),(21,41,'review','5'),(22,42,'review','4'),(23,43,'review','5'),(24,44,'review','4'),(25,45,'review','2'),(26,46,'review','5'),(27,47,'review','4'),(28,48,'review','3'),(29,49,'review','2'),(30,50,'review','5'),(31,51,'review','5'),(32,52,'review','4'),(33,53,'review','3'),(34,54,'review','2'),(35,55,'review','3'),(36,56,'review','3'),(37,57,'review','4'),(38,58,'review','5'),(39,59,'review','5'),(40,60,'review','4'),(41,61,'review','5'),(42,62,'review','3'),(43,63,'review','4'),(44,64,'review','4'),(45,65,'review','3'),(46,66,'review','2'),(47,67,'review','1'),(48,68,'review','5'),(49,69,'review','4'),(50,70,'review','5'),(51,71,'review','4'),(52,72,'review','3'),(53,73,'review','5'),(54,74,'review','3'),(55,75,'review','2'),(56,76,'review','4'),(57,77,'review','3'),(58,78,'review','4'),(59,79,'review','5'),(60,80,'review','3'),(61,81,'review','3'),(62,82,'review','3'),(63,83,'review','5'),(64,84,'review','4'),(65,85,'review','3'),(66,86,'review','5'),(67,87,'review','3'),(68,88,'review','4'),(69,89,'review','3'),(70,90,'review','4'),(71,91,'review','2'),(72,92,'review','4');
/*!40000 ALTER TABLE `wp_rhbc_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

