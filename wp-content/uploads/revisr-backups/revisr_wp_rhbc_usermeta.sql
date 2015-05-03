
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
DROP TABLE IF EXISTS `wp_rhbc_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_rhbc_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_rhbc_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_rhbc_usermeta` DISABLE KEYS */;
INSERT INTO `wp_rhbc_usermeta` VALUES (1,1,'nickname','aidangarza@gmail.com'),(2,1,'first_name','Aidan'),(3,1,'last_name','Garza'),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'wp_rhbc_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(11,1,'wp_rhbc_user_level','10'),(12,1,'dismissed_wp_pointers','wp360_locks,wp390_widgets,wp410_dfw'),(13,1,'session_tokens','a:6:{s:64:\"2effe4b8f31f8cec4e039affedda7623e32b926b55f1373ceada6baa8d054872\";a:4:{s:10:\"expiration\";i:1431460551;s:2:\"ip\";s:14:\"173.174.83.130\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36\";s:5:\"login\";i:1430250951;}s:64:\"f7673af197ea6d4db3e6c16767fee8a77ea3ed8902c4bcb02ece5225adfbe732\";a:4:{s:10:\"expiration\";i:1431634687;s:2:\"ip\";s:14:\"173.174.83.130\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36\";s:5:\"login\";i:1430425087;}s:64:\"74382879df430799accbb9f6e557a6c9e97138ca62e7206edff9b2adefb2df6d\";a:4:{s:10:\"expiration\";i:1431654180;s:2:\"ip\";s:14:\"173.174.83.130\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36\";s:5:\"login\";i:1430444580;}s:64:\"a64fbfce08f2ff6183b56fd309dad591b213cbafe8a1c7ac508f5d8ee42941a2\";a:4:{s:10:\"expiration\";i:1431654247;s:2:\"ip\";s:14:\"173.174.83.130\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36\";s:5:\"login\";i:1430444647;}s:64:\"829d8d7f90bf4be84ce2b12c09d635e0ac07c41ad2fd6970db1236a632809cbf\";a:4:{s:10:\"expiration\";i:1431654273;s:2:\"ip\";s:14:\"173.174.83.130\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36\";s:5:\"login\";i:1430444673;}s:64:\"314a0c11033a14fe0243ccfa47d17caabbceef02f090fafb3b2f5ac52a4b3b6c\";a:4:{s:10:\"expiration\";i:1431789926;s:2:\"ip\";s:14:\"173.174.83.130\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36\";s:5:\"login\";i:1430580326;}}'),(14,1,'wp_rhbc_dashboard_quick_press_last_post_id','773'),(15,1,'facebook','https://www.facebook.com/aidan.garza'),(16,1,'twitter','https://twitter.com/amgbuilder'),(17,1,'google',''),(18,1,'linkedin','https://www.linkedin.com/in/aidangarza'),(19,1,'user_active_status','active'),(20,1,'wp_rhbc_user_avatar','747'),(21,1,'wp_rhbc_user-settings','libraryContent=browse&editor=tinymce&wplink=1&hidetb=1'),(22,1,'wp_rhbc_user-settings-time','1430484224'),(23,1,'nav_menu_recently_edited','97'),(24,1,'managenav-menuscolumnshidden','a:4:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}'),(25,1,'metaboxhidden_nav-menus','a:8:{i:0;s:8:\"add-post\";i:1;s:18:\"add-revisr_commits\";i:2;s:10:\"add-recipe\";i:3;s:12:\"add-post_tag\";i:4;s:15:\"add-post_format\";i:5;s:19:\"add-recipe-category\";i:6;s:14:\"add-recipe-tag\";i:7;s:18:\"add-recipe-cuisine\";}'),(26,1,'wp_rhbc_media_library_mode','list'),(27,2,'nickname','dcolnar'),(28,2,'first_name',''),(29,2,'last_name',''),(30,2,'description',''),(31,2,'rich_editing','true'),(32,2,'comment_shortcuts','false'),(33,2,'admin_color','fresh'),(34,2,'use_ssl','0'),(35,2,'show_admin_bar_front','true'),(36,2,'wp_rhbc_capabilities','a:1:{s:6:\"editor\";b:1;}'),(37,2,'wp_rhbc_user_level','7'),(38,2,'dismissed_wp_pointers','wp360_locks,wp390_widgets'),(39,2,'user_active_status','active'),(41,2,'session_tokens','a:1:{s:64:\"ce7d81aa60eff4bcfb2530a6df430dcbf844045baa2e34c15a253f69d33f9b3b\";a:4:{s:10:\"expiration\";i:1430675792;s:2:\"ip\";s:14:\"104.189.168.66\";s:2:\"ua\";s:121:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36\";s:5:\"login\";i:1430502992;}}'),(42,1,'average_rating','2'),(43,2,'wp_rhbc_user_avatar','835'),(44,3,'nickname','galenrutledge'),(45,3,'first_name',''),(46,3,'last_name',''),(47,3,'description',''),(48,3,'rich_editing','true'),(49,3,'comment_shortcuts','false'),(50,3,'admin_color','fresh'),(51,3,'use_ssl','0'),(52,3,'show_admin_bar_front','true'),(53,3,'wp_rhbc_capabilities','a:1:{s:6:\"editor\";b:1;}'),(54,3,'wp_rhbc_user_level','7'),(55,3,'dismissed_wp_pointers','wp360_locks,wp390_widgets'),(56,3,'user_active_status','active'),(58,3,'session_tokens','a:1:{s:64:\"6b4ebea7f1f61090d51e9ba1a11df1830d2806d5ef46b6bd9f8c95c05d2c855c\";a:4:{s:10:\"expiration\";i:1431713348;s:2:\"ip\";s:14:\"104.189.168.66\";s:2:\"ua\";s:82:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:37.0) Gecko/20100101 Firefox/37.0\";s:5:\"login\";i:1430503748;}}'),(59,3,'wp_rhbc_user_avatar','836'),(60,4,'nickname','Killer_Tofu'),(61,4,'first_name',''),(62,4,'last_name',''),(63,4,'description',''),(64,4,'rich_editing','true'),(65,4,'comment_shortcuts','false'),(66,4,'admin_color','fresh'),(67,4,'use_ssl','0'),(68,4,'show_admin_bar_front','true'),(69,4,'wp_rhbc_capabilities','a:1:{s:6:\"editor\";b:1;}'),(70,4,'wp_rhbc_user_level','7'),(71,4,'dismissed_wp_pointers','wp360_locks,wp390_widgets'),(72,4,'user_active_status','inactive'),(73,4,'confirmation_hash','BvaYTunHoa');
/*!40000 ALTER TABLE `wp_rhbc_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

