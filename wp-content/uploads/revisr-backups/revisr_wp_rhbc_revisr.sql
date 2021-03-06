
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
DROP TABLE IF EXISTS `wp_rhbc_revisr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rhbc_revisr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text,
  `event` varchar(42) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_rhbc_revisr` WRITE;
/*!40000 ALTER TABLE `wp_rhbc_revisr` DISABLE KEYS */;
INSERT INTO `wp_rhbc_revisr` VALUES (1,'2015-04-29 22:35:21','Successfully created a new repository.','init'),(2,'2015-04-29 22:38:06','Successfully backed up the database.','backup'),(3,'2015-04-29 22:38:34','Successfully pushed 1 commit to origin/.','push'),(4,'2015-04-29 22:38:34','Committed <a href=\"http://staging.tjscocktails.com/wp-admin/post.php?post=774&action=edit\">#1175f30</a> to the local repository.','commit'),(5,'2015-04-29 22:38:35','Successfully pushed 1 commit to origin/.','push'),(6,'2015-04-29 22:40:24','Successfully backed up the database.','backup'),(7,'2015-04-29 22:40:26','Successfully pushed 1 commit to origin/master.','push'),(8,'2015-04-29 22:40:26','The weekly backup was successful.','backup'),(9,'2015-04-30 23:59:51','Committed <a href=\"http://staging.tjscocktails.com/wp-admin/post.php?post=826&action=edit\">#2ed8912</a> to the local repository.','commit'),(10,'2015-05-01 00:00:10','Successfully pushed 1 commit to origin/master.','push'),(11,'2015-05-01 03:32:30','Successfully backed up the database.','backup'),(12,'2015-05-01 03:32:41','Successfully pushed 2 commits to origin/master.','push'),(13,'2015-05-01 03:32:41','Committed <a href=\"http://tjscocktails.com/wp-admin/post.php?post=828&action=edit\">#53e9295</a> to the local repository.','commit'),(14,'2015-05-01 03:32:42','Successfully pushed 0 commits to origin/master.','push'),(15,'2015-05-01 03:34:38','Successfully pushed 0 commits to origin/master.','push'),(16,'2015-05-03 18:19:47','Successfully backed up the database.','backup'),(17,'2015-05-03 18:19:56','Successfully pushed 2 commits to origin/master.','push'),(18,'2015-05-03 18:19:56','Committed <a href=\"http://tjscocktails.com/wp-admin/post.php?post=849&action=edit\">#4ca2cc5</a> to the local repository.','commit'),(19,'2015-05-03 18:19:57','Successfully pushed 0 commits to origin/master.','push'),(20,'2015-05-03 19:26:15','Committed <a href=\"http://tjscocktails.com/wp-admin/post.php?post=850&action=edit\">#50a750a</a> to the local repository.','commit');
/*!40000 ALTER TABLE `wp_rhbc_revisr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

