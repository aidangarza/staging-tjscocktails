
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
DROP TABLE IF EXISTS `wp_rhbc_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rhbc_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_rhbc_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_rhbc_term_relationships` DISABLE KEYS */;
INSERT INTO `wp_rhbc_term_relationships` VALUES (1,1,0),(18,1,0),(61,1,0),(28,1,0),(32,1,0),(16,1,0),(40,1,0),(30,1,0),(18,66,0),(16,12,0),(16,14,0),(16,23,0),(16,28,0),(16,30,0),(44,1,0),(18,12,0),(18,15,0),(18,23,0),(18,26,0),(18,30,0),(24,10,0),(34,1,0),(24,11,0),(24,12,0),(24,23,0),(24,30,0),(24,67,0),(28,68,0),(28,12,0),(28,17,0),(28,20,0),(28,23,0),(28,30,0),(30,69,0),(30,12,0),(30,23,0),(30,30,0),(30,32,0),(30,33,0),(36,1,0),(32,70,0),(32,12,0),(32,22,0),(32,23,0),(32,30,0),(34,10,0),(38,1,0),(34,12,0),(34,21,0),(34,23,0),(34,30,0),(34,67,0),(36,69,0),(36,12,0),(36,23,0),(36,24,0),(36,30,0),(36,32,0),(22,1,0),(38,10,0),(42,1,0),(38,12,0),(38,23,0),(38,27,0),(38,30,0),(38,67,0),(40,71,0),(40,12,0),(40,23,0),(40,29,0),(40,30,0),(40,31,0),(42,10,0),(42,12,0),(42,23,0),(42,25,0),(42,30,0),(42,67,0),(22,69,0),(44,12,0),(44,23,0),(44,28,0),(44,30,0),(46,1,0),(46,12,0),(46,16,0),(46,23,0),(46,28,0),(46,30,0),(22,12,0),(22,23,0),(22,30,0),(22,32,0),(22,34,0),(61,72,0),(61,12,0),(61,19,0),(61,23,0),(61,30,0),(772,96,0),(772,95,0),(772,94,0),(772,93,0),(767,92,0),(767,91,0),(768,91,0),(768,90,0),(769,86,0),(768,89,0),(766,85,0),(768,88,0),(766,84,0),(769,87,0),(766,83,0),(821,97,0),(823,97,0),(824,97,0),(822,97,0),(764,1,0),(767,73,0),(768,73,0),(766,74,0),(769,75,0),(769,76,0),(770,1,0),(772,77,0),(24,1,0),(845,98,0),(845,73,0),(845,76,0),(845,92,0),(845,91,0),(845,90,0),(845,99,0);
/*!40000 ALTER TABLE `wp_rhbc_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

