
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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_rhbc_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_rhbc_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_rhbc_term_taxonomy` VALUES (1,1,'category','',0,0),(2,2,'category','',0,0),(3,3,'category','',0,0),(4,4,'category','',0,0),(5,5,'category','',0,0),(6,6,'category','',0,0),(7,7,'category','',0,0),(8,8,'category','',0,0),(9,9,'category','',0,0),(10,10,'post_tag','',0,0),(11,11,'post_tag','',0,0),(12,12,'post_tag','',0,0),(13,13,'post_tag','',0,0),(14,14,'post_tag','',0,0),(15,15,'post_tag','',0,0),(16,16,'post_tag','',0,0),(17,17,'post_tag','',0,0),(18,18,'post_tag','',0,0),(19,19,'post_tag','',0,0),(20,20,'post_tag','',0,0),(21,21,'post_tag','',0,0),(22,22,'post_tag','',0,0),(23,23,'post_tag','',0,0),(24,24,'post_tag','',0,0),(25,25,'post_tag','',0,0),(26,26,'post_tag','',0,0),(27,27,'post_tag','',0,0),(28,28,'post_tag','',0,0),(29,29,'post_tag','',0,0),(30,30,'post_tag','',0,0),(31,31,'post_tag','',0,0),(32,32,'post_tag','',0,0),(33,33,'post_tag','',0,0),(34,34,'post_tag','',0,0),(35,35,'recipe-cuisine','',0,0),(36,36,'recipe-category','',0,0),(37,37,'recipe-tag','',0,0),(38,38,'recipe-category','',0,0),(39,39,'recipe-category','',0,0),(40,40,'recipe-tag','',0,0),(41,41,'recipe-category','',0,0),(42,42,'recipe-tag','',0,0),(43,43,'recipe-tag','',0,0),(44,44,'recipe-tag','',0,0),(45,45,'recipe-tag','',0,0),(46,46,'recipe-category','',0,0),(47,47,'recipe-tag','',0,0),(48,48,'recipe-tag','',0,0),(49,49,'recipe-cuisine','',0,0),(50,50,'recipe-tag','',0,0),(51,51,'recipe-cuisine','',0,0),(52,52,'recipe-tag','',0,0),(53,53,'recipe-category','',0,0),(54,54,'recipe-cuisine','',0,0),(55,55,'recipe-tag','',0,0),(56,56,'recipe-tag','',0,0),(57,57,'recipe-category','',0,0),(58,58,'recipe-tag','',0,0),(59,59,'recipe-tag','',0,0),(60,60,'recipe-category','',0,0),(61,61,'recipe-tag','',0,0),(62,62,'recipe-cuisine','',0,0),(63,63,'recipe-tag','',0,0),(64,64,'recipe-category','',0,0),(65,65,'nav_menu','',0,39),(66,66,'post_format','',0,0),(67,67,'post_format','',0,0),(68,68,'post_format','',0,0),(69,69,'post_format','',0,0),(70,70,'post_format','',0,0),(71,71,'post_format','',0,0),(72,72,'post_format','',0,0),(73,73,'recipe-category','',0,2),(74,74,'recipe-category','',0,1),(75,75,'recipe-category','',0,1),(76,76,'recipe-category','',0,1),(77,77,'recipe-category','',0,1);
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

