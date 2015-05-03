
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
DROP TABLE IF EXISTS `wp_rhbc_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rhbc_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_rhbc_terms` WRITE;
/*!40000 ALTER TABLE `wp_rhbc_terms` DISABLE KEYS */;
INSERT INTO `wp_rhbc_terms` VALUES (1,'Uncategorized','uncategorized',0),(82,'Rum','rum',0),(81,'Vodka','vodka',0),(80,'Tequila','tequila',0),(79,'Gin','gin',0),(78,'Whiskey','whiskey',0),(10,'audio','audio-2',0),(11,'background','background',0),(12,'blog','blog',0),(13,'facebook','facebook',0),(14,'featured','featured',0),(15,'gallery','gallery',0),(16,'gmap','gmap',0),(17,'google','google',0),(18,'grid','grid',0),(19,'image','image-2',0),(20,'link','link-2',0),(21,'mixcloud','mixcloud',0),(22,'quote','quote-2',0),(23,'recipe','recipe',0),(24,'self','self',0),(25,'simple','simple',0),(26,'slider','slider',0),(27,'soundcloud','soundcloud',0),(28,'standard','standard-2',0),(29,'status','status-2',0),(30,'test','test',0),(31,'twitter','twitter',0),(32,'video','video-2',0),(33,'vimeo','vimeo',0),(34,'youtube','youtube',0),(96,'olives','olives',0),(94,'vermouth','vermouth',0),(93,'vodka','vodka',0),(92,'pomegranate limeade','pomegranate-limeade',0),(91,'tequila','tequila',0),(90,'margarita','margarita',0),(89,'lager','lager',0),(88,'beer','beer',0),(95,'martini','martini',0),(87,'watermelon cucumber','watermelon-cucumber',0),(86,'gin','gin',0),(85,'honey','honey',0),(84,'lemon ginger echinacea','lemon-ginger-echinacea',0),(83,'whiskey','whiskey',0),(97,'Main Menu','main-menu',0),(66,'Gallery','post-format-gallery',0),(67,'Audio','post-format-audio',0),(68,'Link','post-format-link',0),(69,'Video','post-format-video',0),(70,'Quote','post-format-quote',0),(71,'Status','post-format-status',0),(72,'Image','post-format-image',0),(73,'Tequila','tequila',0),(74,'Whiskey','whiskey',0),(75,'Gin','gin',0),(76,'Warm-Weather','warm-weather',0),(77,'Vodka','vodka',0),(98,'Frozen','frozen',0),(99,'Frozen','frozen',0);
/*!40000 ALTER TABLE `wp_rhbc_terms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

