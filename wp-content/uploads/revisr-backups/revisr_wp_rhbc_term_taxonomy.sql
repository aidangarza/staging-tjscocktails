
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
DROP TABLE IF EXISTS `wp_rhbc_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rhbc_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_rhbc_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_rhbc_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_rhbc_term_taxonomy` VALUES (1,1,'category','',0,1),(82,82,'category','',0,0),(81,81,'category','',0,0),(80,80,'category','',0,0),(79,79,'category','',0,0),(78,78,'category','',0,0),(10,10,'post_tag','',0,0),(11,11,'post_tag','',0,0),(12,12,'post_tag','',0,0),(13,13,'post_tag','',0,0),(14,14,'post_tag','',0,0),(15,15,'post_tag','',0,0),(16,16,'post_tag','',0,0),(17,17,'post_tag','',0,0),(18,18,'post_tag','',0,0),(19,19,'post_tag','',0,0),(20,20,'post_tag','',0,0),(21,21,'post_tag','',0,0),(22,22,'post_tag','',0,0),(23,23,'post_tag','',0,0),(24,24,'post_tag','',0,0),(25,25,'post_tag','',0,0),(26,26,'post_tag','',0,0),(27,27,'post_tag','',0,0),(28,28,'post_tag','',0,0),(29,29,'post_tag','',0,0),(30,30,'post_tag','',0,0),(31,31,'post_tag','',0,0),(32,32,'post_tag','',0,0),(33,33,'post_tag','',0,0),(34,34,'post_tag','',0,0),(95,95,'recipe-tag','',0,1),(96,96,'recipe-tag','',0,1),(94,94,'recipe-tag','',0,1),(93,93,'recipe-tag','',0,1),(92,92,'recipe-tag','',0,2),(91,91,'recipe-tag','',0,3),(90,90,'recipe-tag','',0,2),(88,88,'recipe-tag','',0,1),(89,89,'recipe-tag','',0,1),(86,86,'recipe-tag','',0,1),(87,87,'recipe-tag','',0,1),(85,85,'recipe-tag','',0,1),(83,83,'recipe-tag','',0,1),(84,84,'recipe-tag','',0,1),(97,97,'nav_menu','',0,4),(66,66,'post_format','',0,0),(67,67,'post_format','',0,0),(68,68,'post_format','',0,0),(69,69,'post_format','',0,0),(70,70,'post_format','',0,0),(71,71,'post_format','',0,0),(72,72,'post_format','',0,0),(73,73,'recipe-category','',0,3),(74,74,'recipe-category','',0,1),(75,75,'recipe-category','',0,1),(76,76,'recipe-category','',0,2),(77,77,'recipe-category','',0,1),(98,98,'recipe-category','',0,1),(99,99,'recipe-tag','',0,1);
/*!40000 ALTER TABLE `wp_rhbc_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

