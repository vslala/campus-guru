-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: campusguru
-- ------------------------------------------------------
-- Server version	5.5.40-log

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `q_id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `answers_q_id_foreign` (`q_id`),
  CONSTRAINT `answers_q_id_foreign` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,2,'priyanka','Well .....Wat I\'ve seen in this site so far is awesome ','2015-04-26 12:14:06','2015-04-26 12:14:06'),(2,2,'priyanka','I think this site is awesome.....','2015-04-26 12:32:28','2015-04-26 12:32:28'),(3,2,'vaibhav','I Think Its cool... Well Optimised For PC As well As Phones.. Yeah It Might Be Better if This Had Games He he\r\n\r\n... \r\nOverall 9/10\r\nYeah 1 Missing Cuz Of games loL ;) :P\r\n','2015-04-26 15:00:45','2015-04-26 15:00:45'),(4,2,'Skatailiha','I think This site should have a page in Facebook to promote and get publicity more fast.\r\nNot even in Facebook But in all other Social sites .\r\n\r\n','2015-04-28 06:22:56','2015-04-28 06:22:56'),(5,2,'saurabh2456','Ek no. Website bro.... ','2015-04-28 08:12:11','2015-04-28 08:12:11'),(9,2,'Rashmi','Alas! I feel so isolated in this site coz there\'s no one from my University :( ','2015-04-29 08:36:03','2015-04-29 08:36:03'),(10,3,'vs_lala','Who the heck is Jon Snow... :/  - - - - -Pakka koi series h jo maine nai dekhi - -- --- - ---- ','2015-04-29 11:49:20','2015-04-29 11:49:20'),(11,3,'vs_lala','Eddard Stark','2015-04-29 12:38:11','2015-04-29 12:38:11'),(12,3,'preeteshjain','Answer agar bata diya to spoiler ho jaega aapke liye bahut bada. *maintains silence*','2015-04-29 14:05:25','2015-04-29 14:05:25'),(13,3,'Vaibhav The Almighty','Ned or Lyeanna Stark :P Or Tony Stark :D ¿¿¿','2015-04-29 14:21:43','2015-04-29 14:21:43'),(14,2,'tengallonhead','Good job mate ! It was easy to get used to the layout of this website.It is interactive ,thus needs some more eggheads from other colleges as well','2015-04-29 16:54:01','2015-04-29 16:54:01'),(15,3,'vs_lala','Well , Got To Be\r\nMrs.Stark','2015-04-30 18:05:04','2015-04-30 18:05:04'),(16,2,'atulitrockstar','Damn Gud Website Broda But Gaming Is Missing','2015-05-02 08:55:04','2015-05-02 08:55:04'),(17,4,'vs_lala','Ok So U Can Go For --> Asus Z Series (97) Or Asus Rampage Series...\r\nAnd I Have GOt To Say , Nice PC ... And We Dont Predict , We Recommend ;) . ♦ Happy Gaming ♦','2015-05-02 09:15:14','2015-05-02 09:15:14'),(18,5,'Vaibhav The Almighty','U Should Give All The Information First!\r\nLike Motherboard , Ur Budget, Ur Preference(nVidia Or AMD) \r\nThen Too If You Want To Know What Is Best For That \r\nThen There Is\r\nHD 9990 \r\nGTX 690\r\nGTX 770 , 780\r\nOr U Can Apply 2x GTX 780...\r\nHappy Gaming :D :D','2015-05-03 04:17:21','2015-05-03 04:17:21'),(19,6,'atulitrockstar','After 2040 One Funny thing is going to happen that our childrens are not going to make us fool in the field of technology ','2015-05-03 12:41:16','2015-05-03 12:41:16'),(20,6,'vs_lala','I don\'t know much about 2040, but looking at the present technology scenario, I think that each and every single thing will become smart and everything will proceed close to unity. I found this wonderful video on technology in 2025,  and 80% of the things shown in that is possible today. Must Watch: <br>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/RDKm5Arx_uo\" frameborder=\"0\" allowfullscreen></iframe>','2015-05-04 16:31:52','2015-05-04 16:31:52'),(21,6,'priyanka','The most amazing thing would b that I\'ll be the richest woman of dat time','2015-05-04 17:15:09','2015-05-04 17:15:09'),(22,7,'vs_lala','That\'s a total myth. <br>\r\nFirst of all, diamond being the hardest substance cannot be just ingested by licking. And somehow, if you do that, the scientists and the doctors will come running for the anatomy of your tongue <i>(Hypothetically Speaking)</i>. <br>\r\nAnd if I have to pay attention that how licking the diamond can kill you then pay attention to the meaning of licking in <b>slang</b>, which means <b>\"to steal\"</b>, and that would definately gonna kill you. \r\n<br>\r\n<div class=\"form-group\">\r\n <img src=\"https://s-media-cache-ak0.pinimg.com/236x/3b/ff/f6/3bfff64462221ed56e10efe38e04e02a.jpg\" class=\"img img-responsive img-thumbnail\" />\r\n</div>','2015-05-04 17:22:19','2015-05-04 17:22:19'),(23,3,'vs_lala','Please tell me the answer now (:p)','2015-05-05 10:30:38','2015-05-05 10:30:38'),(24,7,'Vaibhav The Almighty','95% People Will Not Be Killed By Swallowing A Diamond But The Other Unlucky 5%  Can Suffer From swollen vein or group of veins in the region of the anus.\r\nSo \r\nListen To 1 Thing Carefully. If You Got A Diamond. Think About Jewelery Not Food. :D :D \r\nAnd Slap The Person Who Says \"Eat Diamonds For Breakfast And Shine All Day\" ;) :D\r\n<img src=\"data:image/jpeg;base64,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\" class=\"img img-responsive img-thumbnail\">','2015-05-06 14:37:49','2015-05-06 14:37:49'),(25,8,'mudit','They play a very important role in soceity','2015-05-06 18:03:35','2015-05-06 18:03:35'),(26,8,'vs_lala','A teacher is someone who imparts knowledge and values to the students. But, looking at the current scenario, the  place of teacher is being replaced by the technology. Now-a-days students get most of the knowledge from the internet and I think teachers are not well qualified to teach in most of the schools and colleges and yet they are given the responsibility to shape the future of our country. \r\n<div class=\"form-group\">\r\n <img src=\"http://i.dailymail.co.uk/i/pix/2010/12/28/article-1342152-0C9791B2000005DC-396_634x408.jpg\" style=\"height: 200px;\" />\r\n</div>\r\n<br>\r\nAnd this is what i see in the future, as it has already started. ','2015-05-07 13:23:45','2015-05-07 13:23:45'),(27,8,'priyanka','Teachers play very important role in a our life.....toh unko achha Hona chiye na ki moody n khadus....power ka galat use krte hn teachers .....n they should b pure role models not smone to laugh on or smone to hate......phelomena mam I hope you could read this I really wish ki jo aapne atyaachar hm masoom Bchho par kiye vo Aap pr b ho aapko b koi scale se Sar Pe mare toh Apko pta Chlega ki Ksa Lgta h u devil','2015-05-07 18:44:48','2015-05-07 18:44:48'),(28,8,'janice4111990','Well each and every answer is either a view or a thought of each one of us but with tht we can\'t forget the set of students tht a teacher is dealing with in her/ his daily life. And if we students expect our teachers to b good to us then they should remember the relationship between dronacharya and eklavya who dedicated his thumb to his guru as his gurudakshina apart frm tht fact tht ge he was not at all a part of gurukul.','2015-05-08 16:07:35','2015-05-08 16:07:35');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `q_id` int(10) unsigned NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `attachments_q_id_foreign` (`q_id`),
  CONSTRAINT `attachments_q_id_foreign` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
INSERT INTO `attachments` VALUES (1,2,'Time-to-get-personal.jpg','image/jpeg','57222','images/vs_lala/attachments/Time-to-get-personal.jpg','2015-04-26 11:36:23','2015-04-26 11:36:23'),(2,6,'robot_blue.jpg','image/jpeg','45651','images/Vaibhav The Almighty/attachments/robot_blue.jpg','2015-05-03 04:22:13','2015-05-03 04:22:13');
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
INSERT INTO `blog_comments` VALUES (1,2,'Thanks for sharing this, Priyanka. Pr gusse mai lagg rahi mjhe :D :D ','vs_lala','2015-04-30 12:32:10','2015-04-30 12:32:10'),(2,1,'Its edge technology. Eight Billion transistor (:p) Sure took them loads of time to build it ☻. So, do you know how much does it cost.','vs_lala','2015-04-30 12:36:02','2015-04-30 12:36:02'),(3,4,'Ur blog is gud......bt as the technology is increasing rapidly so does its misuse......by 2080 there will be no one bcoz according to me when everyone will be a superhero then....... no one will be','priyanka','2015-05-08 17:11:23','2015-05-08 17:11:23'),(4,4,'I think there should be such technology which can save thousands of people from an earthquake or the glaciars from global warming.....v can survive on a pseudo leg or an eye bt nt fr long ......on the other hand I think its gross to hav a plastic body part','priyanka','2015-05-08 17:14:31','2015-05-08 17:14:31'),(5,4,'Haha! First of all its not plastic. Secondly, if we have all these technology present today. And in 2080, I think we wont be bothered bt earthquake or volcanoes as we would move to the next phase which is civilization 2 and we would instead be using these calamities for our own benefits. We will survive. M sure ;)','vs_lala','2015-05-08 17:30:07','2015-05-08 17:30:07');
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_views`
--

DROP TABLE IF EXISTS `blog_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_views` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned NOT NULL,
  `total_views` bigint(20) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_views`
--

LOCK TABLES `blog_views` WRITE;
/*!40000 ALTER TABLE `blog_views` DISABLE KEYS */;
INSERT INTO `blog_views` VALUES (4,1,1,'vs_lala','2015-05-01 03:50:29','2015-05-01 03:50:29'),(5,2,1,'vs_lala','2015-05-01 03:53:54','2015-05-01 03:53:54'),(6,3,1,'vs_lala','2015-05-01 03:54:02','2015-05-01 03:54:02'),(7,3,1,'vister_5542f93de67e9','2015-05-01 03:55:41','2015-05-01 03:55:41'),(8,3,1,'vister_5542f97b12c95','2015-05-01 03:56:43','2015-05-01 03:56:43'),(9,3,1,'vister_5542f97b7d20c','2015-05-01 03:56:43','2015-05-01 03:56:43'),(10,3,1,'vister_5542f97c29333','2015-05-01 03:56:44','2015-05-01 03:56:44'),(11,1,1,'vister_554310246ef3d','2015-05-01 05:33:24','2015-05-01 05:33:24'),(12,3,1,'tani_td','2015-05-01 08:30:48','2015-05-01 08:30:48'),(13,1,1,'tani_td','2015-05-01 09:42:33','2015-05-01 09:42:33'),(14,2,1,'tani_td','2015-05-01 09:43:36','2015-05-01 09:43:36'),(15,3,1,'vister_5543560d5827c','2015-05-01 10:31:41','2015-05-01 10:31:41'),(16,3,1,'vister_55435652dfd68','2015-05-01 10:32:50','2015-05-01 10:32:50'),(17,3,1,'vister_554356535b679','2015-05-01 10:32:51','2015-05-01 10:32:51'),(18,3,1,'vister_55435653b1d0e','2015-05-01 10:32:51','2015-05-01 10:32:51'),(19,3,1,'vister_5543568eb7b3b','2015-05-01 10:33:50','2015-05-01 10:33:50'),(20,3,1,'vister_5543568f57b16','2015-05-01 10:33:51','2015-05-01 10:33:51'),(21,3,1,'vister_5543568fe1359','2015-05-01 10:33:51','2015-05-01 10:33:51'),(22,3,1,'vister_554356cab7093','2015-05-01 10:34:50','2015-05-01 10:34:50'),(23,3,1,'vister_554356cb7cf5b','2015-05-01 10:34:51','2015-05-01 10:34:51'),(24,3,1,'vister_554356cbf2178','2015-05-01 10:34:51','2015-05-01 10:34:51'),(25,3,1,'vister_55435706e77d8','2015-05-01 10:35:50','2015-05-01 10:35:50'),(26,3,1,'vister_5543570748c9d','2015-05-01 10:35:51','2015-05-01 10:35:51'),(27,3,1,'vister_55435707c359e','2015-05-01 10:35:51','2015-05-01 10:35:51'),(28,3,1,'vister_55435742c0db8','2015-05-01 10:36:50','2015-05-01 10:36:50'),(29,3,1,'vister_554357434e7b4','2015-05-01 10:36:51','2015-05-01 10:36:51'),(30,3,1,'vister_55435743d78ff','2015-05-01 10:36:51','2015-05-01 10:36:51'),(31,3,1,'vister_5543577e95b1b','2015-05-01 10:37:50','2015-05-01 10:37:50'),(32,3,1,'vister_5543577eebc73','2015-05-01 10:37:50','2015-05-01 10:37:50'),(33,3,1,'vister_5543577f6b9b7','2015-05-01 10:37:51','2015-05-01 10:37:51'),(34,3,1,'vister_554357babd1d6','2015-05-01 10:38:50','2015-05-01 10:38:50'),(35,3,1,'vister_554357bb2908a','2015-05-01 10:38:51','2015-05-01 10:38:51'),(36,3,1,'vister_554357bb96248','2015-05-01 10:38:51','2015-05-01 10:38:51'),(37,3,1,'vister_554357f6c3abc','2015-05-01 10:39:50','2015-05-01 10:39:50'),(38,3,1,'vister_554357f751411','2015-05-01 10:39:51','2015-05-01 10:39:51'),(39,3,1,'vister_554357f80c27e','2015-05-01 10:39:52','2015-05-01 10:39:52'),(40,3,1,'vister_55438ba492aa8','2015-05-01 14:20:20','2015-05-01 14:20:20'),(41,3,1,'vister_554397d1809e3','2015-05-01 15:12:17','2015-05-01 15:12:17'),(42,3,1,'shreya','2015-05-01 17:49:34','2015-05-01 17:49:34'),(43,3,1,'vister_5543be3bc3e0e','2015-05-01 17:56:11','2015-05-01 17:56:11'),(44,3,1,'vister_5543be3d13270','2015-05-01 17:56:13','2015-05-01 17:56:13'),(45,3,1,'vister_5543be3d7d947','2015-05-01 17:56:13','2015-05-01 17:56:13'),(46,3,1,'vister_5543be7d56ae4','2015-05-01 17:57:17','2015-05-01 17:57:17'),(47,3,1,'vister_5543be7d6beaa','2015-05-01 17:57:17','2015-05-01 17:57:17'),(48,3,1,'vister_5543be7d7aefb','2015-05-01 17:57:17','2015-05-01 17:57:17'),(49,3,1,'vister_5543beb9ef8fa','2015-05-01 17:58:17','2015-05-01 17:58:17'),(50,3,1,'vister_5543beba150b1','2015-05-01 17:58:18','2015-05-01 17:58:18'),(51,3,1,'vister_5543beba2fe2f','2015-05-01 17:58:18','2015-05-01 17:58:18'),(52,3,1,'vister_5543bef9dd4bb','2015-05-01 17:59:21','2015-05-01 17:59:21'),(53,3,1,'vister_5543bf285223d','2015-05-01 18:00:08','2015-05-01 18:00:08'),(54,3,1,'vister_5543bf3b85882','2015-05-01 18:00:27','2015-05-01 18:00:27'),(55,3,1,'vister_5543bf516880e','2015-05-01 18:00:49','2015-05-01 18:00:49'),(56,3,1,'vister_5543bf8188ab2','2015-05-01 18:01:37','2015-05-01 18:01:37'),(57,3,1,'vister_5543bfaa5f298','2015-05-01 18:02:18','2015-05-01 18:02:18'),(58,2,1,'vister_5543cc6a4c2a8','2015-05-01 18:56:42','2015-05-01 18:56:42'),(59,2,1,'vister_5543cca7eeaf4','2015-05-01 18:57:43','2015-05-01 18:57:43'),(60,2,1,'vister_5543cca8153ee','2015-05-01 18:57:44','2015-05-01 18:57:44'),(61,2,1,'vister_5543cca829a49','2015-05-01 18:57:44','2015-05-01 18:57:44'),(62,2,1,'vister_5543cce45b29e','2015-05-01 18:58:44','2015-05-01 18:58:44'),(63,2,1,'vister_5543cce4723cb','2015-05-01 18:58:44','2015-05-01 18:58:44'),(64,2,1,'vister_5543cce480258','2015-05-01 18:58:44','2015-05-01 18:58:44'),(65,2,1,'vister_5543d6a692063','2015-05-01 19:40:22','2015-05-01 19:40:22'),(66,2,1,'vister_5543d6b1af4ed','2015-05-01 19:40:33','2015-05-01 19:40:33'),(67,1,1,'vister_5543d6b9a0a12','2015-05-01 19:40:41','2015-05-01 19:40:41'),(68,2,1,'vister_5543dec9767f6','2015-05-01 20:15:05','2015-05-01 20:15:05'),(69,1,1,'atulitrockstar','2015-05-04 09:24:47','2015-05-04 09:24:47'),(70,4,1,'vs_lala','2015-05-08 15:38:16','2015-05-08 15:38:16'),(71,4,1,'vister_554cd8e05371d','2015-05-08 15:40:16','2015-05-08 15:40:16'),(72,4,1,'vister_554cd8e79cbdd','2015-05-08 15:40:23','2015-05-08 15:40:23'),(73,4,1,'vister_554cd91e9f122','2015-05-08 15:41:18','2015-05-08 15:41:18'),(74,4,1,'vister_554cd91eb52fe','2015-05-08 15:41:18','2015-05-08 15:41:18'),(75,4,1,'vister_554cd91ed8962','2015-05-08 15:41:18','2015-05-08 15:41:18'),(76,4,1,'vister_554cd9f9ef30e','2015-05-08 15:44:57','2015-05-08 15:44:57'),(77,4,1,'vister_554cda4240fab','2015-05-08 15:46:10','2015-05-08 15:46:10'),(78,4,1,'vister_554cda430a1f5','2015-05-08 15:46:11','2015-05-08 15:46:11'),(79,4,1,'vister_554cda437d7ae','2015-05-08 15:46:11','2015-05-08 15:46:11'),(80,4,1,'vister_554cda4440faa','2015-05-08 15:46:12','2015-05-08 15:46:12'),(81,4,1,'vister_554cdaa76dfcf','2015-05-08 15:47:51','2015-05-08 15:47:51'),(82,4,1,'vister_554cdaa7eaccd','2015-05-08 15:47:51','2015-05-08 15:47:51'),(83,4,1,'vister_554cdaa8ac83c','2015-05-08 15:47:52','2015-05-08 15:47:52'),(84,4,1,'vister_554cdce0e57b3','2015-05-08 15:57:20','2015-05-08 15:57:20'),(85,4,1,'vister_554cdd1f20cd3','2015-05-08 15:58:23','2015-05-08 15:58:23'),(86,4,1,'vister_554cdd1f81d67','2015-05-08 15:58:23','2015-05-08 15:58:23'),(87,4,1,'vister_554cdd1fdcbc6','2015-05-08 15:58:23','2015-05-08 15:58:23'),(88,4,1,'vister_554cdd5b68536','2015-05-08 15:59:23','2015-05-08 15:59:23'),(89,4,1,'vister_554cdd5bbeb3c','2015-05-08 15:59:23','2015-05-08 15:59:23'),(90,4,1,'vister_554cdd5c20e8b','2015-05-08 15:59:24','2015-05-08 15:59:24'),(91,4,1,'vister_554cdd8c7eaff','2015-05-08 16:00:12','2015-05-08 16:00:12'),(92,4,1,'vister_554cdd9720b55','2015-05-08 16:00:23','2015-05-08 16:00:23'),(93,4,1,'vister_554cdd97cba4f','2015-05-08 16:00:23','2015-05-08 16:00:23'),(94,4,1,'vister_554cdd9838006','2015-05-08 16:00:24','2015-05-08 16:00:24'),(95,4,1,'vister_554cddd325d29','2015-05-08 16:01:23','2015-05-08 16:01:23'),(96,4,1,'vister_554cddd3a60d2','2015-05-08 16:01:23','2015-05-08 16:01:23'),(97,4,1,'vister_554cddd42649d','2015-05-08 16:01:24','2015-05-08 16:01:24'),(98,4,1,'vister_554cde0f387e3','2015-05-08 16:02:23','2015-05-08 16:02:23'),(99,4,1,'vister_554cde0fbaebb','2015-05-08 16:02:23','2015-05-08 16:02:23'),(100,4,1,'vister_554cde1035757','2015-05-08 16:02:24','2015-05-08 16:02:24'),(101,4,1,'vister_554cde4b1ecb6','2015-05-08 16:03:23','2015-05-08 16:03:23'),(102,4,1,'vister_554cde4b7663e','2015-05-08 16:03:23','2015-05-08 16:03:23'),(103,4,1,'vister_554cde4beecab','2015-05-08 16:03:23','2015-05-08 16:03:23'),(104,4,1,'vister_554cde8717de7','2015-05-08 16:04:23','2015-05-08 16:04:23'),(105,4,1,'vister_554cde8768193','2015-05-08 16:04:23','2015-05-08 16:04:23'),(106,4,1,'vister_554cde87c0a86','2015-05-08 16:04:23','2015-05-08 16:04:23'),(107,4,1,'vister_554cdec334e27','2015-05-08 16:05:23','2015-05-08 16:05:23'),(108,4,1,'vister_554cdec38be1a','2015-05-08 16:05:23','2015-05-08 16:05:23'),(109,4,1,'vister_554cdec3ea7fe','2015-05-08 16:05:23','2015-05-08 16:05:23'),(110,4,1,'vister_554cdeff24087','2015-05-08 16:06:23','2015-05-08 16:06:23'),(111,4,1,'vister_554cdeff9071e','2015-05-08 16:06:23','2015-05-08 16:06:23'),(112,4,1,'vister_554cdf0034d9d','2015-05-08 16:06:24','2015-05-08 16:06:24'),(113,4,1,'vister_554cdf3b1a7ca','2015-05-08 16:07:23','2015-05-08 16:07:23'),(114,4,1,'vister_554cdf3b6980f','2015-05-08 16:07:23','2015-05-08 16:07:23'),(115,4,1,'vister_554cdf3bc039f','2015-05-08 16:07:23','2015-05-08 16:07:23'),(116,4,1,'vister_554cdf77203eb','2015-05-08 16:08:23','2015-05-08 16:08:23'),(117,4,1,'vister_554cdf7770e95','2015-05-08 16:08:23','2015-05-08 16:08:23'),(118,4,1,'vister_554cdf77cc0c3','2015-05-08 16:08:23','2015-05-08 16:08:23'),(119,4,1,'janice4111990','2015-05-08 16:08:37','2015-05-08 16:08:37'),(120,4,1,'vister_554cdfb322575','2015-05-08 16:09:23','2015-05-08 16:09:23'),(121,4,1,'vister_554cdfb379f33','2015-05-08 16:09:23','2015-05-08 16:09:23'),(122,4,1,'vister_554cdfb3cc6f3','2015-05-08 16:09:23','2015-05-08 16:09:23'),(123,4,1,'priyanka','2015-05-08 17:06:02','2015-05-08 17:06:02'),(124,4,1,'vister_554ceda01e9cf','2015-05-08 17:08:48','2015-05-08 17:08:48'),(125,4,1,'vister_554cede752ec7','2015-05-08 17:09:59','2015-05-08 17:09:59'),(126,4,1,'vister_554cedeb98244','2015-05-08 17:10:03','2015-05-08 17:10:03');
/*!40000 ALTER TABLE `blog_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'vaibhav','nVidia Titan X Review!','The 980 didn’t get us to a point where one graphics processor could handle the demands of 4K at enthusiast-class detail levels. But the GeForce GTX Titan X is based on GM200, composed of eight billion transistors. Eight. Billion. That’s almost three billion more than the GeForce GTX 980’s GM204 and one billion more than GK110, the original GeForce GTX Titan’s cornerstone.\r\n\r\nIn their final form, those transistors manifest as a 601mm² piece of silicon, which is about nine percent larger than GK110. The GM200 GPU is manufactured on the same 28nm high-k metal gate process, so this is simply a larger, more complex chip. And yet it’s rated for the same 250W maximum board power. With higher clock rates. And twice as much memory. Superficially, the math seems off. But it isn’t.\r\n\r\nWell , I ll Give It\r\n8/10!\r\nWay Too Expensive! \r\nHope You All Like It!\r\n~Vaibhav','2015-04-27 08:00:07','2015-04-27 08:00:07'),(2,'priyanka','new rule in rgpv','Hey everyone,I just visited rgpv Bhopal yesterday...I went there fr applying persuation bt I ws late coz now d date is gone ,thanks to my teachers fr a great support they gave me .....anyways there is dis new rule in rgpv according to which if u get a back in any subjct thn u can either apply fr revaluation or persuation or retotal.....and there is very small diffrnce btween reval n persuade n its dat in persuation u can see ur copy getting rechecked in front of u,rest all the things r same in both .....and fr those idiots who say dat \"reval me copy check ni hoti\" so fr u people d big info is \"copy check hoti h genius\". I would like to thanks those foresaken people who scared me n confused me so much about d system......a big punch  to all d people who just tlk rubbish widout knowing anything about rules in rgpv ....I pray fr u people ki tum dhoop Me sadd k papad bn jao or tumhare ghr me Nal chle jaye or tum colg. Bina nhaye ao thn..... Dats all :)','2015-04-30 07:10:29','2015-04-30 07:25:00'),(3,'vs_lala','Tough Motivation','Hey! Everyone! I am writing this blog to express my thoughts on MOTIVATION. If you guys are like me, then you will see that motivation comes in many forms. If I\'m stuck in a rug or need a pick me up, I will go and pick someone\'s biography and starts reading it trying to relate my situations with him or I go to youtube and start searching for people who were in same situation etc. It gives me motivation. <br> We all need to find our own motivation. That means getting away from our computer (unless you are reading my blog.. then by all means, carry on). Most motivational posters and quotes are contradictory these days anyways. Take a look at these for example: <div class=\"form-group\"> <img src=\"http://toughmotivation.files.wordpress.com/2013/06/tumblr_m56zg1n2m31rrjjxto1_500.jpg?w=221&h=300\" style=\"height: 200px; \" class=\"img img-responsive img-thumbnail\"> <img src=\"http://toughmotivation.files.wordpress.com/2013/06/tumblr_l3k03hs4sn1qb13xjo1_400.jpg?w=300&h=278\" class=\"img img-responsive img-thumbnail\" style=\"height: 200px;\"> </div> <div class=\"form-group\"> <img src=\"http://toughmotivation.files.wordpress.com/2013/06/tumblr_mav0q8xxad1qey5neo1_500.png?w=300&h=286\" class=\"img img-responsive img-thumbnail\" style=\"height: 200px;\"> <img src=\"http://toughmotivation.files.wordpress.com/2013/06/10-motivational-quotes-kick-start-large-msg-134307587259.jpg?w=300&h=274\" style=\"height: 200px;\"> </div> <br> See, now aren’t you feeling conflicted? <br> These are just a few examples and the point I am trying to make is that, each and everyone has their own motivation. We are the best indicators of what works best for us or don\'t. Try to find what makes you <b>YOU</b> Audios\r\n','2015-05-01 02:19:43','2015-05-01 02:19:43'),(4,'vs_lala','Some Humans are Becoming Non-Biological than Biological','Today, an average citizen has the access to wide variety of technology. Not far back into the past where humans could not have survived a dengue fever, now can survive a cancer. That is all because of the advancement of technology and our access to it. Today, we have access to the array of biotechnology implants and  personal medical devices. These include fully artificial organs that never fail, bionic eyes and ears providing Superman-like senses, nano-scale brain interfaces to augment the wearer\'s intelligence, synthetic blood and bodily fluids that can filter deadly toxins and provide hours\' worth of oxygen in a single breath. \r\n<p>Some of the more broad minded adventurous citizens undergoing voluntary amputations to  gain prosthetic arms and legs, to gain more strength and endurance by orders of magnitude, giving them edge over an average citizen.  And these limbs can look as natural as human parts because of the artificial skin which is based on the nano technology. </p>\r\n<p>These upgrades has become available over a series of incremental steps being taken by the people from generations, but today these are just taken for granted. These trends are being practiced by the people all over the world even in the developing countries because of the exponential trend in price performance.</p>\r\n<p>I imagine,  Were a fully upgraded person of the 2080s to travel back in time a century and be integrated into the population, they would be superior in almost every way imaginable. They could run faster and for longer distances than the greatest athletes of the time; they could survive multiple gunshot wounds; they could cope with some of the most hostile environments on Earth without too much trouble. Intellectually, they would be considered geniuses – thanks to various devices merged directly with their brain. </p>\r\n\r\n<div class=\"form-group\">\r\n <img class=\"img img-responsive img-thumbnail\" src=\"http://www.futuretimeline.net/21stcentury/images/eye_bionic.jpg\"  />\r\n</div>','2015-05-08 15:38:05','2015-05-08 15:46:10');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Education and Reference','2015-04-26 10:11:16','2015-04-26 10:11:16'),(2,'Entertainment and Music','2015-04-26 10:11:16','2015-04-26 10:11:16'),(3,'Environment','2015-04-26 10:11:16','2015-04-26 10:11:16'),(4,'Relationships','2015-04-26 10:11:16','2015-04-26 10:11:16'),(5,'Food & Drinks','2015-04-26 10:11:16','2015-04-26 10:11:16'),(6,'Games & Recreation','2015-04-26 10:11:16','2015-04-26 10:11:16'),(7,'Science & Mathematics','2015-04-26 10:11:16','2015-04-26 10:11:16'),(8,'Computer Science','2015-04-26 10:11:16','2015-04-26 10:11:16'),(9,'Sports','2015-04-26 10:11:16','2015-04-26 10:11:16'),(10,'Travel','2015-04-26 10:11:16','2015-04-26 10:11:16'),(11,'Machinery','2015-04-26 10:11:16','2015-04-26 10:11:16'),(12,'Information Technology','2015-04-26 10:11:16','2015-04-26 10:11:16'),(13,'Civil','2015-04-26 10:11:16','2015-04-26 10:11:16'),(14,'Electricals and Electronics','2015-04-26 10:11:16','2015-04-26 10:11:16'),(15,'other','2015-04-26 10:11:16','2015-04-26 10:11:16');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ans_id` int(10) unsigned NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'Thank you Priyanka ','vs_lala','2015-04-26 14:03:52','2015-04-26 14:03:52'),(2,3,'Sure looking forward to it brother ','vs_lala','2015-04-26 15:02:06','2015-04-26 15:02:06'),(3,3,'Well , Then Add Some Background Music Too :P','vaibhav','2015-04-26 15:55:16','2015-04-26 15:55:16'),(4,3,'And I thought you are smart :p','vs_lala','2015-04-26 16:25:46','2015-04-26 16:25:46'),(5,4,'Its upto the users to promote it :) \r\nAnd i will take care of the functional aspects of the website. ','vs_lala','2015-04-28 06:50:34','2015-04-28 06:50:34'),(6,3,'Ur Using The Wrong Tense! :P','Vaibhav The Almighty','2015-04-28 14:43:40','2015-04-28 14:43:40'),(7,5,'Thanks bro :) \r\nAnd let the world know  ☺','vs_lala','2015-04-28 15:16:57','2015-04-28 15:16:57'),(8,2,'Thank you! Once Again ☻','vs_lala','2015-04-28 17:39:31','2015-04-28 17:39:31'),(9,3,'again read the previous comment :p :/','vs_lala','2015-04-28 17:40:37','2015-04-28 17:40:37'),(10,10,'Game of Thrones bhai :D :D','shubhamatkare','2015-04-29 11:49:50','2015-04-29 11:49:50'),(11,10,'tune diya nai :(','vs_lala','2015-04-29 11:51:43','2015-04-29 11:51:43'),(12,9,'then spread the word, Rashmi ;)','vs_lala','2015-04-29 12:10:10','2015-04-29 12:10:10'),(13,10,'Yo got the answer -> Jon Snow is a fictional character in the A Song of Ice and Fire series of fantasy novels by American author George R. R. Martin, and its television adaptation Game of Thrones. ','vs_lala','2015-04-29 12:37:49','2015-04-29 12:37:49'),(14,9,'yeh... i\'ll try (y)','Rashmi','2015-04-29 13:16:12','2015-04-29 13:16:12'),(15,11,'He\'s the father! Not the mother.','preeteshjain','2015-04-29 14:04:21','2015-04-29 14:04:21'),(16,11,'Oops... I think he was born from his father @_@','vs_lala','2015-04-29 14:13:52','2015-04-29 14:13:52'),(17,9,'^.^ ','vs_lala','2015-04-29 14:51:09','2015-04-29 14:51:09'),(18,14,'Thanks mate! Yes it needs user base then its gonna blossom. And looking forward to all of ur suggestions ','vs_lala','2015-04-29 17:51:37','2015-04-29 17:51:37'),(19,10,'\"Game of Thrones \" Your Favourite One :) Lala :D ','shifu ','2015-05-01 07:48:58','2015-05-01 07:48:58'),(20,10,'Nahi re! Maine dekha hi nai abhi tak. Wo google search ka result h. And uski maa ka naam batana bht mushkil h Qki unlog ne story ko bht gande tareeke se twist kiya hua h. Mjhe dekhna h ye ab :-S:-S','vs_lala','2015-05-01 10:05:50','2015-05-01 10:05:50'),(21,17,'Thanks For The Help Bro ','atulitrockstar','2015-05-02 09:24:48','2015-05-02 09:24:48'),(22,17,'Your welcome! If you have any other question feel free to ask. ','vs_lala','2015-05-02 09:32:04','2015-05-02 09:32:04'),(23,17,'Okz bro ','atulitrockstar','2015-05-02 10:18:15','2015-05-02 10:18:15'),(24,17,'And one more thing that 550 watts PSU is sufficienct for intel core i7 and other components of my PC I mean in this PSU will the processor heat or will it be on the risk ','atulitrockstar','2015-05-02 10:20:14','2015-05-02 10:20:14'),(25,17,'Yeah!!!\r\n550W PSU Is 100% Appropriate For Your Rig...\r\nAnd No The Processor Will Not Heat !\r\n:D :D','Vaibhav The Almighty','2015-05-02 10:39:54','2015-05-02 10:39:54'),(26,17,'550 watts is more than enough to handle your pc with single GPU. Although, if in future you want to upgrade it then to be future proof I would suggest 650 watts PSU. But make sure it is a certified PSU, becoz some PSU in market does not give what they say. So, go for certified one.','vs_lala','2015-05-02 10:45:15','2015-05-02 10:45:15'),(27,17,'Yo  !!','atulitrockstar','2015-05-02 13:19:49','2015-05-02 13:19:49'),(28,18,'Hmmmm Thanks ','atulitrockstar','2015-05-03 06:42:29','2015-05-03 06:42:29'),(29,19,'No matter in what age are we in, our children will always find a way to fool us (:p)','vs_lala','2015-05-04 16:13:40','2015-05-04 16:13:40'),(30,21,'haha, well said. I hope you do.  ','vs_lala','2015-05-05 10:26:19','2015-05-05 10:26:19'),(31,23,'I don\'t know. I guess we\'ll have to wait. :D','shubhamatkare','2015-05-05 12:10:29','2015-05-05 12:10:29'),(32,25,'Wah! kya answer diya h (:D) (:D)','vs_lala','2015-05-07 13:10:30','2015-05-07 13:10:30'),(33,26,'Haha','mudit','2015-05-07 14:12:51','2015-05-07 14:12:51'),(34,26,'Its true ','vs_lala','2015-05-07 15:11:37','2015-05-07 15:11:37'),(35,26,'Right said......vo Japan k Sare e-teachers yha le ao n yha k human teachers Vha bhej do','priyanka','2015-05-07 18:39:23','2015-05-07 18:39:23'),(36,27,'I think you shared your personal thoughts rather than considering the social aspect of teachers in the modern society. \r\n','vs_lala','2015-05-07 18:54:36','2015-05-07 18:54:36'),(37,28,'Its his job to deal with all type of students, and in today\'s generation its merely about money. Teachers dont even care about the students performance . And talking about gurudakshina, we all pay loads of gurudakshina :D :D\r\nM not saying that there are no good teachers but the trend is technology and each and every one should make use of it. ','vs_lala','2015-05-08 17:05:34','2015-05-08 17:05:34');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complains`
--

DROP TABLE IF EXISTS `complains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `complain` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complains`
--

LOCK TABLES `complains` WRITE;
/*!40000 ALTER TABLE `complains` DISABLE KEYS */;
INSERT INTO `complains` VALUES (2,'If you are in hcet u can be sure of one thing that whenever you will need some help from the collge, you wont get it. Our principal is bhadua and I don\'t know who made him principal. Change him...','hitkarini college of engineering and technology','vs_lala','2015-04-27 18:49:25','2015-04-27 18:49:25'),(3,'There are no wall mirrors in the bathrooms... Dafuqq','hitkarini college of engineering and technology','shubhamatkare','2015-04-29 10:52:36','2015-04-29 10:52:36');
/*!40000 ALTER TABLE `complains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `confessions`
--

DROP TABLE IF EXISTS `confessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `confessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `confession` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confessions`
--

LOCK TABLES `confessions` WRITE;
/*!40000 ALTER TABLE `confessions` DISABLE KEYS */;
INSERT INTO `confessions` VALUES (7,'Ek baar hum sab dost samosa khaane gaye. So, we bought 3 samosa aur cheena jhapti mai ek samosa nali mai gir gaya. But we picked it up, and tabi hamara ek aur dost aaya, Anshuman, aur usko laga wo samosa uske liye h and he ate it. So, Sorry Anshuman (:D) (:D)','St. Gabriel Se. Sc. School','vs_lala','2015-05-02 19:43:02','2015-05-02 19:43:02');
/*!40000 ALTER TABLE `confessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_tags`
--

DROP TABLE IF EXISTS `discussion_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `d_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `discussion_tags_tag_unique` (`tag`),
  KEY `discussion_tags_d_id_foreign` (`d_id`),
  CONSTRAINT `discussion_tags_d_id_foreign` FOREIGN KEY (`d_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_tags`
--

LOCK TABLES `discussion_tags` WRITE;
/*!40000 ALTER TABLE `discussion_tags` DISABLE KEYS */;
INSERT INTO `discussion_tags` VALUES (1,'#Comp',1,'2015-04-26 15:46:46','2015-04-26 15:46:46'),(2,'#Real',1,'2015-04-26 15:46:46','2015-04-26 15:46:46'),(3,'#Gaming',1,'2015-04-26 15:46:46','2015-04-26 15:46:46'),(4,'#Computer',2,'2015-04-28 06:19:31','2015-04-28 06:19:31'),(5,'#technology',2,'2015-04-28 06:19:31','2015-04-28 06:19:31'),(6,'#',2,'2015-04-28 06:19:31','2015-04-28 06:19:31'),(7,'Social',3,'2015-04-29 10:50:54','2015-04-29 10:50:54'),(8,'Awareness',3,'2015-04-29 10:50:54','2015-04-29 10:50:54'),(9,'Which',4,'2015-05-03 12:37:46','2015-05-03 12:37:46'),(10,'Is',4,'2015-05-03 12:37:46','2015-05-03 12:37:46'),(11,'The',4,'2015-05-03 12:37:46','2015-05-03 12:37:46'),(12,'Best',4,'2015-05-03 12:37:46','2015-05-03 12:37:46'),(13,'#young',5,'2015-05-05 18:29:18','2015-05-05 18:29:18'),(14,'#love',5,'2015-05-05 18:29:18','2015-05-05 18:29:18'),(15,'#danger',5,'2015-05-05 18:29:18','2015-05-05 18:29:18');
/*!40000 ALTER TABLE `discussion_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussions`
--

LOCK TABLES `discussions` WRITE;
/*!40000 ALTER TABLE `discussions` DISABLE KEYS */;
INSERT INTO `discussions` VALUES (1,'vaibhav','AMD VS nVidia','Computer Science','Well I Am With nVidia !\r\nLets See Which Is Better? :D :D','2015-04-26 15:46:46','2015-04-26 15:46:46'),(2,'Skatailiha','I want assemble a PC,so need help.','Education and Reference','To assemble a PC \r\n','2015-04-28 06:19:31','2015-04-28 06:19:31'),(3,'shubhamatkare','What are your views on Barkha Dutt\'s befitting reply to the British journalist?','other','You can view the full conversation here, https://www.youtube.com/watch?v=eLbw1gieFqc ','2015-04-29 10:50:54','2015-04-29 10:50:54'),(4,'atulitrockstar','Which Is The Best Intel Core i7 4790K Or Intel Cire i7 4820k ','Information Technology','Comparing These Two Heavy Processors Which Is The Best One For Only 1 Purpose Gaming !!','2015-05-03 12:37:46','2015-05-03 12:37:46'),(5,'vs_lala','Is young love Dangerous?','Relationships','In my opinion, love at a young age could be dangerous as the adolescence goes through alot of changes at that time and they are kind of stuck in between the dependence of childhood and the independence of adulthood, yet do not occupy extreme yet. And at t','2015-05-05 18:29:18','2015-05-05 18:29:18');
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disliked_answers`
--

DROP TABLE IF EXISTS `disliked_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disliked_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ans_id` int(10) unsigned NOT NULL,
  `q_id` int(10) unsigned NOT NULL,
  `dislike` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disliked_answers`
--

LOCK TABLES `disliked_answers` WRITE;
/*!40000 ALTER TABLE `disliked_answers` DISABLE KEYS */;
INSERT INTO `disliked_answers` VALUES (1,'Rashmi',1,2,0,'2015-04-29 13:20:49','2015-04-29 13:20:49'),(2,'vs_lala',25,8,0,'2015-05-07 13:24:10','2015-05-07 13:24:10'),(3,'mudit',25,8,0,'2015-05-07 14:11:01','2015-05-07 14:11:01');
/*!40000 ALTER TABLE `disliked_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disliked_discussions`
--

DROP TABLE IF EXISTS `disliked_discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disliked_discussions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rep_id` int(10) unsigned NOT NULL,
  `d_id` int(10) unsigned NOT NULL,
  `dislike` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disliked_discussions`
--

LOCK TABLES `disliked_discussions` WRITE;
/*!40000 ALTER TABLE `disliked_discussions` DISABLE KEYS */;
/*!40000 ALTER TABLE `disliked_discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disliked_statuses`
--

DROP TABLE IF EXISTS `disliked_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disliked_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `disliked_statuses_status_id_foreign` (`status_id`),
  CONSTRAINT `disliked_statuses_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disliked_statuses`
--

LOCK TABLES `disliked_statuses` WRITE;
/*!40000 ALTER TABLE `disliked_statuses` DISABLE KEYS */;
INSERT INTO `disliked_statuses` VALUES (1,'priyanka',2,'2015-04-26 12:12:14','2015-04-26 12:12:14'),(2,'vs_lala',3,'2015-04-26 12:13:48','2015-04-26 12:13:48'),(3,'priyanka',3,'2015-04-26 12:26:26','2015-04-26 12:26:26'),(4,'vaibhav',3,'2015-04-26 15:45:31','2015-04-26 15:45:31'),(5,'vaibhav',2,'2015-04-26 15:45:35','2015-04-26 15:45:35'),(6,'vaibhav',4,'2015-04-26 15:48:14','2015-04-26 15:48:14'),(8,'agam_2508',20,'2015-04-29 16:44:36','2015-04-29 16:44:36');
/*!40000 ALTER TABLE `disliked_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `display_pictures`
--

DROP TABLE IF EXISTS `display_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `display_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_size` int(10) unsigned NOT NULL,
  `likeCount` int(10) unsigned DEFAULT NULL,
  `dislikeCount` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `display_pictures`
--

LOCK TABLES `display_pictures` WRITE;
/*!40000 ALTER TABLE `display_pictures` DISABLE KEYS */;
INSERT INTO `display_pictures` VALUES (1,'vs_lala','10305331_10152299996411840_2838423379987999325_n.jpg','image/jpeg','images/vs_lala/10305331_10152299996411840_2838423379987999325_n.jpg',20272,2,NULL,'2015-04-26 09:44:41','2015-05-03 04:14:59'),(2,'priyanka','C360_2015-04-26-09-23-33-185.jpg','image/jpeg','images/priyanka/C360_2015-04-26-09-23-33-185.jpg',650813,4,NULL,'2015-04-26 12:03:37','2015-05-02 09:13:11'),(3,'vaibhav','DSCN1118_20150305093541155.jpg','image/jpeg','images/vaibhav/DSCN1118_20150305093541155.jpg',3772554,1,NULL,'2015-04-26 15:41:07','2015-04-29 15:26:22'),(4,'shifu ','11160391_808584585899171_1231250831_n.jpg','image/jpeg','images/shifu /11160391_808584585899171_1231250831_n.jpg',20714,3,NULL,'2015-04-27 05:03:04','2015-04-28 02:33:31'),(5,'Vaibhav The Almighty','IMG_20150317_175706.jpg','image/jpeg','images/Vaibhav The Almighty/IMG_20150317_175706.jpg',870785,4,NULL,'2015-04-27 08:02:57','2015-04-28 02:34:22'),(6,'Skatailiha','DSC_0002.jpg','image/jpeg','images/Skatailiha/DSC_0002.jpg',789406,1,NULL,'2015-04-28 06:14:42','2015-04-28 06:16:10'),(7,'saurabh2456','IMG_20140114_120811.jpg','image/jpeg','images/saurabh2456/IMG_20140114_120811.jpg',95235,1,NULL,'2015-04-28 08:16:58','2015-04-28 09:53:38'),(8,'Diksha','AhqCK0QBnNY4WcFDkNL_12hVdf5LUZ3i9A76PZo08t3N.jpg','image/jpeg','images/Diksha/AhqCK0QBnNY4WcFDkNL_12hVdf5LUZ3i9A76PZo08t3N.jpg',180925,1,NULL,'2015-04-28 10:29:50','2015-04-29 12:39:13'),(9,'Rashmi','ras.jpg','image/jpeg','images/Rashmi/ras.jpg',99257,1,NULL,'2015-04-29 08:52:46','2015-04-29 16:40:21'),(10,'shubhamatkare','AdobePhotoshopExpress_d36dffe1820f44fda8101a4dc65f56c9.jpg','image/jpeg','images/shubhamatkare/AdobePhotoshopExpress_d36dffe1820f44fda8101a4dc65f56c9.jpg',1626555,NULL,NULL,'2015-04-29 10:40:03','2015-04-29 10:40:03'),(11,'YumanPatel','11140331_744887718963959_3548001497307779181_n.jpg','image/jpeg','images/YumanPatel/11140331_744887718963959_3548001497307779181_n.jpg',63688,NULL,NULL,'2015-04-29 11:41:23','2015-04-29 11:41:23'),(12,'preeteshjain','SE (50).jpg','image/jpeg','images/preeteshjain/SE (50).jpg',701291,NULL,NULL,'2015-04-29 14:06:30','2015-04-29 14:06:30'),(13,'tengallonhead','207125.jpg','image/jpeg','images/tengallonhead/207125.jpg',104195,1,NULL,'2015-04-29 16:58:19','2015-04-29 17:48:07'),(14,'ashukaran','AdobePhotoshopExpress_032350c4984147bca1eec49da7c04422.jpg','image/jpeg','images/ashukaran/AdobePhotoshopExpress_032350c4984147bca1eec49da7c04422.jpg',222298,1,NULL,'2015-04-30 02:25:08','2015-04-30 07:24:05'),(15,'tani_td','IMG_20150412_192109.jpg','image/jpeg','images/tani_td/IMG_20150412_192109.jpg',47352,1,NULL,'2015-04-30 16:27:27','2015-05-01 04:01:05'),(16,'mudit','TMPDOODLE1430506213065.jpg','image/jpeg','images/mudit/TMPDOODLE1430506213065.jpg',362308,1,NULL,'2015-05-01 18:50:23','2015-05-01 19:08:18'),(17,'riya','11132007_1041005915914084_1254238341_n.jpg','image/jpeg','images/riya/11132007_1041005915914084_1254238341_n.jpg',85222,1,NULL,'2015-05-02 08:43:18','2015-05-02 08:46:41'),(18,'atulitrockstar','FB_IMG_1430557166009.jpg','image/jpeg','images/atulitrockstar/FB_IMG_1430557166009.jpg',77507,1,NULL,'2015-05-02 09:00:21','2015-05-02 09:10:17'),(19,'janice4111990','fuiD6.jpg','image/jpeg','images/janice4111990/fuiD6.jpg',13962,NULL,NULL,'2015-05-06 14:25:45','2015-05-06 14:25:45'),(20,'Milan','Hitman120511.jpg','image/jpeg','images/Milan/Hitman120511.jpg',109637,1,NULL,'2015-05-07 04:06:01','2015-05-08 14:58:09');
/*!40000 ALTER TABLE `display_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liked_answers`
--

DROP TABLE IF EXISTS `liked_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liked_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ans_id` int(10) unsigned NOT NULL,
  `q_id` int(10) unsigned NOT NULL,
  `like` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liked_answers`
--

LOCK TABLES `liked_answers` WRITE;
/*!40000 ALTER TABLE `liked_answers` DISABLE KEYS */;
INSERT INTO `liked_answers` VALUES (1,'priyanka',1,2,0,'2015-04-26 12:14:44','2015-04-26 12:14:44'),(2,'vs_lala',1,2,0,'2015-04-26 12:29:27','2015-04-26 12:29:27'),(3,'priyanka',2,2,0,'2015-04-26 12:32:37','2015-04-26 12:32:37'),(4,'vs_lala',3,2,0,'2015-04-26 15:01:38','2015-04-26 15:01:38'),(5,'vs_lala',4,2,0,'2015-04-28 06:49:45','2015-04-28 06:49:45'),(6,'vs_lala',5,2,0,'2015-04-28 17:54:28','2015-04-28 17:54:28'),(7,'vs_lala',9,2,0,'2015-04-29 12:10:14','2015-04-29 12:10:14'),(8,'Rashmi',1,2,0,'2015-04-29 13:20:40','2015-04-29 13:20:40'),(9,'vs_lala',12,3,0,'2015-04-29 16:31:12','2015-04-29 16:31:12'),(10,'vs_lala',14,2,0,'2015-04-29 18:19:41','2015-04-29 18:19:41'),(11,'shifu ',11,3,0,'2015-05-01 07:49:07','2015-05-01 07:49:07'),(12,'shifu ',12,3,0,'2015-05-01 07:49:20','2015-05-01 07:49:20'),(13,'shifu ',13,3,0,'2015-05-01 07:49:23','2015-05-01 07:49:23'),(14,'shifu ',15,3,0,'2015-05-01 07:49:27','2015-05-01 07:49:27'),(15,'vs_lala',13,3,0,'2015-05-01 10:06:51','2015-05-01 10:06:51'),(16,'vs_lala',15,3,0,'2015-05-01 10:06:55','2015-05-01 10:06:55'),(17,'atulitrockstar',17,4,0,'2015-05-02 09:25:12','2015-05-02 09:25:12'),(18,'vs_lala',21,6,0,'2015-05-05 10:25:18','2015-05-05 10:25:18'),(19,'mudit',22,7,0,'2015-05-05 11:38:42','2015-05-05 11:38:42'),(20,'Oshine',22,7,0,'2015-05-05 12:45:50','2015-05-05 12:45:50'),(21,'vs_lala',24,7,0,'2015-05-07 03:09:25','2015-05-07 03:09:25'),(22,'mudit',25,8,0,'2015-05-07 14:11:05','2015-05-07 14:11:05'),(23,'janice4111990',25,8,0,'2015-05-08 16:02:18','2015-05-08 16:02:18'),(24,'janice4111990',26,8,0,'2015-05-08 16:02:50','2015-05-08 16:02:50'),(25,'janice4111990',27,8,0,'2015-05-08 16:03:26','2015-05-08 16:03:26'),(26,'vs_lala',26,8,0,'2015-05-09 17:18:24','2015-05-09 17:18:24');
/*!40000 ALTER TABLE `liked_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liked_discussions`
--

DROP TABLE IF EXISTS `liked_discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liked_discussions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rep_id` int(10) unsigned NOT NULL,
  `d_id` int(10) unsigned NOT NULL,
  `like` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liked_discussions`
--

LOCK TABLES `liked_discussions` WRITE;
/*!40000 ALTER TABLE `liked_discussions` DISABLE KEYS */;
INSERT INTO `liked_discussions` VALUES (1,'vaibhav',2,1,0,'2015-04-27 07:56:10','2015-04-27 07:56:10'),(2,'vs_lala',1,1,0,'2015-04-27 13:11:03','2015-04-27 13:11:03'),(3,'vs_lala',2,1,0,'2015-04-27 13:11:08','2015-04-27 13:11:08'),(4,'Skatailiha',3,2,0,'2015-04-28 06:27:05','2015-04-28 06:27:05'),(5,'Vaibhav The Almighty',6,2,0,'2015-04-28 07:53:29','2015-04-28 07:53:29'),(6,'Vaibhav The Almighty',2,1,0,'2015-04-28 07:54:25','2015-04-28 07:54:25'),(7,'shifu ',7,3,0,'2015-05-01 07:46:40','2015-05-01 07:46:40'),(8,'vs_lala',7,3,0,'2015-05-01 10:09:44','2015-05-01 10:09:44'),(9,'vs_lala',6,2,0,'2015-05-01 10:17:18','2015-05-01 10:17:18'),(10,'vs_lala',8,1,0,'2015-05-01 10:52:33','2015-05-01 10:52:33'),(11,'Vaibhav The Almighty',9,1,0,'2015-05-02 10:41:52','2015-05-02 10:41:52'),(12,'vs_lala',5,2,0,'2015-05-03 03:02:45','2015-05-03 03:02:45'),(13,'atulitrockstar',6,2,0,'2015-05-03 03:33:45','2015-05-03 03:33:45'),(14,'Vaibhav The Almighty',11,4,0,'2015-05-03 14:42:40','2015-05-03 14:42:40'),(15,'atulitrockstar',11,4,0,'2015-05-03 15:09:12','2015-05-03 15:09:12'),(16,'vs_lala',11,4,0,'2015-05-04 04:19:04','2015-05-04 04:19:04'),(17,'Vaibhav The Almighty',22,1,0,'2015-05-06 14:20:16','2015-05-06 14:20:16'),(18,'tani_td',24,5,0,'2015-05-07 03:27:22','2015-05-07 03:27:22'),(19,'atulitrockstar',14,4,0,'2015-05-08 05:23:05','2015-05-08 05:23:05'),(20,'atulitrockstar',12,4,0,'2015-05-08 05:23:25','2015-05-08 05:23:25');
/*!40000 ALTER TABLE `liked_discussions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liked_display_pictures`
--

DROP TABLE IF EXISTS `liked_display_pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liked_display_pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dp_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `liked_display_pictures_dp_id_foreign` (`dp_id`),
  CONSTRAINT `liked_display_pictures_dp_id_foreign` FOREIGN KEY (`dp_id`) REFERENCES `display_pictures` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liked_display_pictures`
--

LOCK TABLES `liked_display_pictures` WRITE;
/*!40000 ALTER TABLE `liked_display_pictures` DISABLE KEYS */;
INSERT INTO `liked_display_pictures` VALUES (1,'vs_lala',1,'2015-04-26 10:09:28','2015-04-26 10:09:28'),(2,'vs_lala',2,'2015-04-26 12:15:53','2015-04-26 12:15:53'),(3,'vaibhav',2,'2015-04-26 15:50:08','2015-04-26 15:50:08'),(4,'shifu ',2,'2015-04-27 04:52:45','2015-04-27 04:52:45'),(5,'vs_lala',5,'2015-04-27 13:06:37','2015-04-27 13:06:37'),(6,'vs_lala',4,'2015-04-27 18:52:43','2015-04-27 18:52:43'),(7,'vaibhav',4,'2015-04-28 02:33:13','2015-04-28 02:33:13'),(8,'Vaibhav The Almighty',4,'2015-04-28 02:33:31','2015-04-28 02:33:31'),(9,'Vaibhav The Almighty',5,'2015-04-28 02:33:43','2015-04-28 02:33:43'),(10,'shifu ',5,'2015-04-28 02:33:59','2015-04-28 02:33:59'),(11,'priyanka',5,'2015-04-28 02:34:22','2015-04-28 02:34:22'),(12,'vs_lala',6,'2015-04-28 06:16:10','2015-04-28 06:16:10'),(13,'vs_lala',7,'2015-04-28 09:53:38','2015-04-28 09:53:38'),(14,'vs_lala',8,'2015-04-29 12:39:13','2015-04-29 12:39:13'),(15,'vs_lala',3,'2015-04-29 15:26:22','2015-04-29 15:26:22'),(16,'vs_lala',9,'2015-04-29 16:40:21','2015-04-29 16:40:21'),(17,'vs_lala',13,'2015-04-29 17:48:07','2015-04-29 17:48:07'),(18,'vs_lala',14,'2015-04-30 07:24:05','2015-04-30 07:24:05'),(19,'vs_lala',15,'2015-05-01 04:01:05','2015-05-01 04:01:05'),(20,'vs_lala',16,'2015-05-01 19:08:18','2015-05-01 19:08:18'),(21,'vs_lala',17,'2015-05-02 08:46:41','2015-05-02 08:46:41'),(22,'vs_lala',18,'2015-05-02 09:10:17','2015-05-02 09:10:17'),(23,'Vaibhav The Almighty',2,'2015-05-02 09:13:11','2015-05-02 09:13:11'),(24,'Vaibhav The Almighty',1,'2015-05-03 04:14:59','2015-05-03 04:14:59'),(25,'vs_lala',20,'2015-05-08 14:58:09','2015-05-08 14:58:09');
/*!40000 ALTER TABLE `liked_display_pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liked_statuses`
--

DROP TABLE IF EXISTS `liked_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liked_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `liked_statuses_status_id_foreign` (`status_id`),
  CONSTRAINT `liked_statuses_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liked_statuses`
--

LOCK TABLES `liked_statuses` WRITE;
/*!40000 ALTER TABLE `liked_statuses` DISABLE KEYS */;
INSERT INTO `liked_statuses` VALUES (1,'vs_lala',1,'2015-04-26 11:48:29','2015-04-26 11:48:29'),(2,'Diksha',1,'2015-04-26 12:06:30','2015-04-26 12:06:30'),(3,'priyanka',2,'2015-04-26 12:12:06','2015-04-26 12:12:06'),(4,'priyanka',3,'2015-04-26 12:26:32','2015-04-26 12:26:32'),(5,'vaibhav',3,'2015-04-26 15:47:30','2015-04-26 15:47:30'),(6,'vaibhav',4,'2015-04-26 15:48:16','2015-04-26 15:48:16'),(7,'vs_lala',6,'2015-04-26 16:07:12','2015-04-26 16:07:12'),(8,'vs_lala',4,'2015-04-26 16:07:18','2015-04-26 16:07:18'),(9,'priyanka',6,'2015-04-26 16:14:44','2015-04-26 16:14:44'),(10,'priyanka',4,'2015-04-26 16:19:39','2015-04-26 16:19:39'),(11,'priyanka',7,'2015-04-27 03:25:33','2015-04-27 03:25:33'),(12,'priyanka',8,'2015-04-27 03:54:23','2015-04-27 03:54:23'),(13,'vs_lala',10,'2015-04-27 04:26:59','2015-04-27 04:26:59'),(14,'shifu ',10,'2015-04-27 04:45:56','2015-04-27 04:45:56'),(15,'shifu ',9,'2015-04-27 04:47:45','2015-04-27 04:47:45'),(16,'shifu ',8,'2015-04-27 04:47:48','2015-04-27 04:47:48'),(20,'vs_lala',14,'2015-04-27 12:15:56','2015-04-27 12:15:56'),(21,'Vaibhav The Almighty',14,'2015-04-27 14:19:48','2015-04-27 14:19:48'),(22,'vs_lala',15,'2015-04-27 15:53:00','2015-04-27 15:53:00'),(23,'priyanka',16,'2015-04-28 02:40:26','2015-04-28 02:40:26'),(24,'priyanka',15,'2015-04-28 02:41:46','2015-04-28 02:41:46'),(26,'priyanka',11,'2015-04-28 04:56:14','2015-04-28 04:56:14'),(27,'Skatailiha',11,'2015-04-28 06:20:49','2015-04-28 06:20:49'),(28,'Skatailiha',14,'2015-04-28 06:20:59','2015-04-28 06:20:59'),(30,'Skatailiha',15,'2015-04-28 06:21:03','2015-04-28 06:21:03'),(31,'Skatailiha',16,'2015-04-28 06:21:06','2015-04-28 06:21:06'),(32,'Vaibhav The Almighty',16,'2015-04-28 07:55:54','2015-04-28 07:55:54'),(33,'Vaibhav The Almighty',17,'2015-04-28 07:56:14','2015-04-28 07:56:14'),(34,'vs_lala',17,'2015-04-28 11:52:37','2015-04-28 11:52:37'),(35,'shifu ',18,'2015-04-29 05:16:19','2015-04-29 05:16:19'),(36,'shifu ',17,'2015-04-29 05:16:24','2015-04-29 05:16:24'),(37,'shifu ',16,'2015-04-29 05:16:29','2015-04-29 05:16:29'),(38,'shifu ',15,'2015-04-29 05:16:33','2015-04-29 05:16:33'),(39,'shifu ',14,'2015-04-29 05:16:38','2015-04-29 05:16:38'),(41,'vs_lala',20,'2015-04-29 05:29:56','2015-04-29 05:29:56'),(42,'Vaibhav The Almighty',22,'2015-04-29 11:39:09','2015-04-29 11:39:09'),(43,'vs_lala',22,'2015-04-29 12:10:39','2015-04-29 12:10:39'),(44,'vs_lala',18,'2015-04-29 12:20:29','2015-04-29 12:20:29'),(45,'tengallonhead',17,'2015-04-29 17:24:41','2015-04-29 17:24:41'),(46,'priyanka',18,'2015-04-30 06:57:51','2015-04-30 06:57:51'),(47,'vs_lala',23,'2015-05-01 03:18:09','2015-05-01 03:18:09'),(48,'priyanka',22,'2015-05-01 05:34:42','2015-05-01 05:34:42'),(49,'priyanka',23,'2015-05-01 05:34:43','2015-05-01 05:34:43'),(50,'shifu ',23,'2015-05-01 07:44:02','2015-05-01 07:44:02'),(51,'shifu ',22,'2015-05-01 07:44:06','2015-05-01 07:44:06'),(52,'shifu ',20,'2015-05-01 07:44:12','2015-05-01 07:44:12'),(55,'vs_lala',31,'2015-05-02 08:32:17','2015-05-02 08:32:17'),(56,'vs_lala',32,'2015-05-02 08:42:21','2015-05-02 08:42:21'),(57,'riya',32,'2015-05-02 08:46:04','2015-05-02 08:46:04'),(58,'riya',31,'2015-05-02 08:46:10','2015-05-02 08:46:10'),(59,'vs_lala',34,'2015-05-02 14:09:25','2015-05-02 14:09:25'),(60,'vs_lala',27,'2015-05-02 15:42:40','2015-05-02 15:42:40'),(61,'tani_td',34,'2015-05-02 15:44:23','2015-05-02 15:44:23'),(62,'tani_td',22,'2015-05-03 07:46:50','2015-05-03 07:46:50'),(63,'priyanka',31,'2015-05-04 17:23:32','2015-05-04 17:23:32'),(64,'vs_lala',35,'2015-05-05 07:51:13','2015-05-05 07:51:13'),(65,'Angelravina',35,'2015-05-05 20:14:57','2015-05-05 20:14:57'),(66,'Angelravina',34,'2015-05-05 20:15:01','2015-05-05 20:15:01'),(67,'Angelravina',31,'2015-05-05 20:15:07','2015-05-05 20:15:07'),(68,'vs_lala',37,'2015-05-06 14:25:39','2015-05-06 14:25:39'),(69,'vs_lala',38,'2015-05-07 17:05:15','2015-05-07 17:05:15');
/*!40000 ALTER TABLE `liked_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_04_01_114141_create_statuses_table',1),('2015_04_01_131601_create_profiles_table',1),('2015_04_01_131803_create_display_pictures_table',1),('2015_04_01_133543_create_profile_visits_table',1),('2015_04_02_155920_create_blogs_table',1),('2015_04_02_172736_create_questions_table',1),('2015_04_02_173017_create_question_tags_table',1),('2015_04_03_024415_create_answers_table',1),('2015_04_03_052400_create_comments_table',1),('2015_04_03_062539_create_liked_answers_table',1),('2015_04_03_062551_create_disliked_answers_table',1),('2015_04_04_140548_create_attachments_table',1),('2015_04_05_155616_create_discussions_table',1),('2015_04_05_162043_create_discussion_tags_table',1),('2015_04_05_165830_create_replies_table',1),('2015_04_05_171238_create_liked_discussions_table',1),('2015_04_05_171250_create_disliked_discussions_table',1),('2015_04_06_180834_create_liked_statuses_table',1),('2015_04_06_180848_create_disliked_statuses_table',1),('2015_04_07_115331_create_complains_table',1),('2015_04_07_164144_create_confessions_table',1),('2015_04_10_143823_create_liked_display_pictures_table',1),('2015_04_12_054815_create_categories_table',1),('2015_04_24_153632_create_send_messages_table',1),('2015_04_29_064358_create_suggestions_table',2),('2015_04_30_090029_create_blog_comments_table',3),('2015_04_30_104232_create_blog_views_table',3),('2015_05_05_083458_create_notifications_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `n_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `n_for` int(10) unsigned NOT NULL,
  `n_id_of` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (4,'vaibhav','vs_lala',2,1,'2015-05-06 04:31:49','2015-05-06 04:31:49'),(5,'vaibhav','Vaibhav The Almighty',2,1,'2015-05-06 14:19:23','2015-05-06 14:19:23'),(6,'vaibhav','Vaibhav The Almighty',2,1,'2015-05-06 14:25:53','2015-05-06 14:25:53'),(8,'priyanka','Vaibhav The Almighty',1,7,'2015-05-06 14:37:49','2015-05-06 14:37:49'),(12,'vaibhav','vs_lala',2,1,'2015-05-07 18:51:24','2015-05-07 18:51:24');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_visits`
--

DROP TABLE IF EXISTS `profile_visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `count` int(10) unsigned NOT NULL,
  `profile_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `profile_visits_profile_id_foreign` (`profile_id`),
  CONSTRAINT `profile_visits_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_visits`
--

LOCK TABLES `profile_visits` WRITE;
/*!40000 ALTER TABLE `profile_visits` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_visits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about_me` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rashi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'vs_lala','I make things','varunshrivastava007@gmail.com','9827983762','1994-07-16','Taurus','Madhya Pradesh','Jabalpur','http://campusguru.eu1.frbit.net','2015-04-26 09:43:55','2015-04-26 09:43:55'),(2,'priyanka','Well m beginner in coding n design ......planning fr javascript','priyankarano1994.yadav@gmail.com','8602042302','1994-02-02','Libra','madhya pradesh','jabalpur','no....not yet','2015-04-26 12:01:26','2015-04-26 12:01:26'),(3,'vaibhav','I Think GOD Has Bigger Plans For me Than I Have For Myself :)','iammagnificient@gmail.com','7770898626','','Taurus','Solid','Vaibhav\'s City','','2015-04-26 14:44:39','2015-04-26 15:45:03'),(4,'preeteshjain','','','','1994-03-17','Taurus','','','','2015-04-26 17:35:14','2015-04-26 17:35:14'),(5,'shifu ','Foodie :)\r\nWish Me On 5 September !!\r\nLove myself I do. Not everything, but I love the good as well as the bad. I love my crazy lifestyle, and I love my hard discipline. I love my freedom of speech and the way my eyes get dark when I\'m tired. I love that I have learned to trust people with my heart, even if it will get broken. I am proud of everything that I am and will become. (;','shifa.sid05@gmail.com','8103190859','1994-09-05','Aqarius','Madhya Pradesh ','Jabalpur ','NOT YET :\'(','2015-04-27 04:50:11','2015-04-29 05:18:40'),(6,'Vaibhav The Almighty','I Think God Has Bigger Plans For Me Than I Have For Myself!','','','','Taurus','Solid','','','2015-04-27 08:03:59','2015-04-27 08:03:59'),(7,'Diksha','','','','','Aries','','','','2015-04-27 13:03:45','2015-04-28 10:31:14'),(8,'Skatailiha','There is nil to tell ','swapnilkatailiha@gmail.com','9407207083','1987-08-24','Sagittarius','Madhya Pradesh','jabalpur','https://www.facebook.com/aviations.edge?ref=aymt_homepage_panel','2015-04-28 06:29:51','2015-04-28 06:44:07'),(9,'saurabh2456','','','','','Taurus','','','','2015-04-28 08:21:22','2015-04-28 08:21:22'),(10,'Rashmi','','','','','Libra','Uttar Pradesh','Lucknow','','2015-04-29 08:41:17','2015-04-29 08:41:17'),(11,'shubhamatkare','Soon to be grad.','shubhamatkare@yahoo.com','+91-8871468039','30/01/1994','','Madhya Pradesh','Jabalpur','https://www.facebook.com/shubham.atkare','2015-04-29 10:43:03','2015-04-29 10:55:40'),(12,'YumanPatel','','loverboyuman@gmail.com','8818959646','2000-06-30','Scorpio','M.P.','Jabalpur','','2015-04-29 11:29:25','2015-04-29 11:29:25'),(13,'tengallonhead','One word : Nigga','s.abhijeetpratap@yahoo.com','','1994-03-24','Aries','Madhya Pradesh','Jabalpur','','2015-04-29 17:00:17','2015-04-29 17:00:17'),(14,'tani_td','','tanyadas12@gmail.com','','9 Aug 1994','Leo','Madhya Pradesh','Indore','','2015-04-30 16:30:38','2015-04-30 16:30:38'),(15,'mudit','','muditkanojia@gmail.com','','1994-07-24','Leo','madhya pradesh','jabalpur','','2015-05-01 18:55:43','2015-05-01 18:55:43'),(16,'shreya','I m cute girl ;)','sheryaj5@gmail.com','8103876054','1994-07-24','Leo','m.p.','jabalpur','','2015-05-02 04:03:43','2015-05-02 14:30:08'),(17,'Angelravina','','','','','Libra','Madhya Pradesh','Jabalpur','','2015-05-05 20:23:43','2015-05-05 20:23:43'),(18,'Milan','Hell Yeah!','milankapoor0.mk@gmail.com','9826509766','1999-03-22','Leo','MP','JBP','','2015-05-07 04:04:13','2015-05-07 04:04:13');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_tags`
--

DROP TABLE IF EXISTS `question_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `q_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `question_tags_tag_unique` (`tag`),
  KEY `question_tags_q_id_foreign` (`q_id`),
  CONSTRAINT `question_tags_q_id_foreign` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_tags`
--

LOCK TABLES `question_tags` WRITE;
/*!40000 ALTER TABLE `question_tags` DISABLE KEYS */;
INSERT INTO `question_tags` VALUES (3,'#first',2,'2015-04-26 11:36:23','2015-04-26 11:36:23'),(4,'#upload',2,'2015-04-26 11:36:23','2015-04-26 11:36:23'),(5,'#TvShows',3,'2015-04-29 11:08:51','2015-04-29 11:08:51'),(6,'Information',4,'2015-05-02 08:50:43','2015-05-02 08:50:43'),(7,'Technology',4,'2015-05-02 08:50:43','2015-05-02 08:50:43'),(8,'Graphics',5,'2015-05-02 13:34:11','2015-05-02 13:34:11'),(9,'Card',5,'2015-05-02 13:34:11','2015-05-02 13:34:11'),(10,'#Science',6,'2015-05-03 04:22:13','2015-05-03 04:22:13'),(11,'#scienctific',7,'2015-05-04 17:13:45','2015-05-04 17:13:45'),(12,'facts',7,'2015-05-04 17:13:45','2015-05-04 17:13:45'),(13,'#impofteacher',8,'2015-05-06 14:29:41','2015-05-06 14:29:41');
/*!40000 ALTER TABLE `question_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (2,'vs_lala','What do you think about this website?','other','Its time to get more personal.','2015-04-26 11:36:23','2015-04-26 11:36:23'),(3,'shubhamatkare','Who is Jon Snow\'s mother?','Entertainment and Music','Just answer this question','2015-04-29 11:08:51','2015-04-29 11:08:51'),(4,'atulitrockstar','Which Motherboard You All Will Predict ','Information Technology','So Guys I Am Buying An Intel Core i7 4790K\r\nMy Other Specs Are \r\nGskill Ripjaws DDR3 1600MHZ\r\nCorsair 550Watts PSU\r\nIntel Core i7 4790K\r\n1TB Samsung HDD\r\nAnd Now Its Confusing Me Which Motherboard You Will Predict \r\nMy Motherboard Budget Is 13000','2015-05-02 08:50:43','2015-05-02 08:50:43'),(5,'atulitrockstar','Best Graphics Card ','Information Technology','Which Is The Best Graphics Card For Intel Core i7 4790K That I Should Pair','2015-05-02 13:34:11','2015-05-02 13:34:11'),(6,'Vaibhav The Almighty','What Will Be The Most Amazing Thing After 2040??? ','other','What Will Be The Changes , What Things Will Prevail The World , What Thing Or Who Will Rule The World??','2015-05-03 04:22:13','2015-05-03 04:22:13'),(7,'priyanka','diamond kills','Science & Mathematics','Does eating diamond or even licking it kills?','2015-05-04 17:13:45','2015-05-04 17:13:45'),(8,'janice4111990','What is the place of teacher in today\'s generation?','Education and Reference','Ur views and suggestions regarding this discussion ','2015-05-06 14:29:41','2015-05-06 14:29:41');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `d_id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reply` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `replies_d_id_foreign` (`d_id`),
  CONSTRAINT `replies_d_id_foreign` FOREIGN KEY (`d_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (3,2,'vs_lala','So, basically which type of PC you wish to assemble. A high end gaming PC or simple Budget one. ','2015-04-28 06:26:15','2015-04-28 06:26:15'),(4,2,'Skatailiha','A high Config and Gaming  Pc\r\n','2015-04-28 06:27:55','2015-04-28 06:27:55'),(5,2,'vs_lala','For the first build we would be using an AMD processor FX-6300 which offers good processing power coupled with over clocking potential. The second best option would be Intel based and it is meant for advanced users as the Processor and motherboard used is required to over clock only then you will get the benefit of the RIG’s full potential. For all  1st time buyers I would suggest to go ahead with the AMD build or the core i 3 build but if you want more performance from the money spent be my guest to try the 2nd build with Intel G- 3258.','2015-04-28 06:31:58','2015-04-28 06:31:58'),(6,2,'Vaibhav The Almighty','Alright!!!\r\nTo Assemble A Good Gaming PC Under An Adequate Budget You Can Use These Components!-->\r\nFor A Total AMD Build...\r\nProcessor --> AMD FX 8350 (8 Cores) Or An AMD Fx 6300 (6 Cores)\r\nRam --> G.Skill Ripjaws X 2x 4GB Ram (Total = 8GB) 1866 MHz\r\nGPU --> AMD Radeon HD 7770 (Mid End Good AMD GPU)\r\nMotherboard --> ASUS Crosshair V Formula-Z AM3+ AMD 990FX + SB950 8 x SATA 6Gb/s USB 3.0 ATX AMD Gaming Motherboard with 3-Way SLI/CrossFireX Support and UEFI BIOS (A Bit Expensive But It Will Provide Everything, And Supports SLI And Crossfire So You Will Be FutreProof)\r\nCase --> Cooler Master K380 I Like This!\r\n\r\nHope You Like This Build!\r\n\r\nNow Intel\r\nProcessor --> i5 3570K\r\nRam --> G.Skill Ripjaws X 2x 4GB Ram (Total = 8GB) 1866 MHz\r\nGPU --> nVidia GTX 750ti Or A GTX 760\r\nMotherboard --> ASRock Z77 Extreme4 LGA 1155 Intel Z77 HDMI SATA 6Gb/s USB 3.0 ATX \r\nCase --> Cooler Master K380 I Like This!\r\n\r\nI Will Go With The Intel Build.... \r\nBut Its Your Choice! \r\nGood Day!','2015-04-28 07:52:56','2015-04-28 07:52:56'),(7,3,'vs_lala','I think Barkha Dutt was not befitting Leslee Udwin, she was correct with her views when she objected Norah on the subject that India is unsafe for women. India is not unsafe, there are crimes everywhere. United States and United Kingdom has more crime and rape cases reported every year.  So, I completely disagree with Norah stating that India is unsafe. And at the same time Leslee Udwin has put forward some great objectives which needs to be done. And I would like to than Leslee for being so outspoken with her thoughts.','2015-04-29 13:13:02','2015-04-29 13:13:02'),(10,2,'atulitrockstar','If U Have High I mean Enough Budget I recommend u the devil canoyon Intel core i5 4690k which has a clock speed of 3.5 ghz','2015-05-03 06:41:18','2015-05-03 06:41:18'),(11,4,'Vaibhav The Almighty','Comparing i7 4790k And i7 4820k.. I will go With i7 4790k and there\'s No Doubt There... Its Cheap and Better. Better Clock speed , Better performance , Newer And Is Better Not Only for Gaming but for Everything\r\n.. Hope This helps\r\n... Happy Gaming','2015-05-03 14:42:18','2015-05-03 14:42:18'),(12,4,'atulitrockstar','Yupzzz Thanks A Lot ','2015-05-03 15:09:33','2015-05-03 15:09:33'),(14,4,'vs_lala','<p class=\"tahoma\">Here are the comparisons between the two CPU\'s: <br><br>\r\n\r\n<table class=\"table\">\r\n <thead>\r\n   <th>Performance</th>\r\n</thead>\r\n<tbody>\r\n <tr>\r\n   <td>Core i7 4790K</td>\r\n   <td>8.2</td>\r\n</tr>\r\n<tr>\r\n   <td>Core i7 4820K</td>\r\n   <td>7.3</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table class=\"table\">\r\n <thead>\r\n   <th>Single-Core Performance</th>\r\n</thead>\r\n<tbody>\r\n <tr>\r\n   <td>Core i7 4790K</td>\r\n   <td>10</td>\r\n</tr>\r\n<tr>\r\n   <td>Core i7 4820K</td>\r\n   <td>8.9</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table class=\"table\">\r\n <thead>\r\n   <th>Over-Clocking</th>\r\n</thead>\r\n<tbody>\r\n <tr>\r\n   <td>Core i7 4790K</td>\r\n   <td>8.6</td>\r\n</tr>\r\n<tr>\r\n   <td>Core i7 4820K</td>\r\n   <td>8.1</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table class=\"table\">\r\n <thead>\r\n   <th>Value</th>\r\n</thead>\r\n<tbody>\r\n <tr>\r\n   <td>Core i7 4790K</td>\r\n   <td>6.4</td>\r\n</tr>\r\n<tr>\r\n   <td>Core i7 4820K</td>\r\n   <td>6.6</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table class=\"table\">\r\n <thead>\r\n   <th>Varun Shrivastava\'s Score</th>\r\n</thead>\r\n<tbody>\r\n <tr>\r\n   <td>Core i7 4790K</td>\r\n   <td>8.9</td>\r\n</tr>\r\n<tr>\r\n   <td>Core i7 4820K</td>\r\n   <td>8.2</td>\r\n</tr>\r\n</tbody>\r\n</table></p>\r\n','2015-05-05 11:03:16','2015-05-05 11:03:16'),(21,1,'vs_lala','Nvidia hardware is cooler and quieter across the board. The better among the two can be seen from their yearly sales and nvidia left AMD by far. And if we come to how well both hardwares perform, I would say that nvidia provides great value for money as compared to the AMD hardware. \r\nThere was a time, several years ago, when it appeared AMD was the absolute price-performance victor. Yet there is reason to believe Nvidia’s dominance won’t end soon.\r\nAnd if this trends continues than in future there will only be Intel\'s and Nvidia\'a video cards that will exist. \r\n<br>\r\n<img src=\"http://d2voxljetmfocm.cloudfront.net/wp-content/uploads/2012/10/nvidia-2.jpeg?1a0a52\" class=\"img img-responsive img-thumbnail\" style=\"height: 200px;\" />','2015-05-06 04:31:49','2015-05-06 04:31:49'),(22,1,'Vaibhav The Almighty','I Dont Agree With You!\r\nAMD IS Cooler And Quieter If We Compare nVidia AND AMD\'s Equivalent Cards!\r\nSo You Are Saying That HD 7990 Makes Noise And Become Hot ?\r\nAlright Lets Compare nVidia\'s Top GPU (GTX Titan --> 836 MHz) And AMD\'s Top GPU(HD 7990 950 MHz)...  For Gaming, U Must Be Knowing That HD 7990 Defeats Titan As I Can Run All The Games At 4K That Titan Was Unable To Achieve... .... Pros Of HD 7990 --> Higher Bandwidth, Higher Clock Speed, Higher Texture Rate, More Shading Units, Wider Memory Bus, Higher Pixel Rate, More FPS While Gaming! ....  Pros OF GTX Titan --> Energy Efficient...  And HD 7990 Is A Bit Cheaper Too. So I Think AMD Provides Greater Value For Money Than nVidia! And Talking About Intel , They Dont Have A Single External Card Launched And They Have No Card That Can Compete With This Generation Cards...  <img src=\"http://www.blogcdn.com/www.engadget.com/media/2013/04/amd-radeon-hd-7990.jpg\" class=\"img img-responsive img-thumbnail\" style=\"height: 200px;\">','2015-05-06 14:19:23','2015-05-06 14:19:23'),(23,1,'Vaibhav The Almighty','I Agree nVidia Is A Bit Quiet And Cool Than AMD (Comparing Overall) But, nVidia VS AMD Is Like Triple H VS The Rock ! I Like Both Of Dem! But We Cant Say Which One Rules! :D :D \r\n<img src=\"http://oyster.ignimgs.com/wordpress/write.ign.com/153696/2013/10/nvidia-vs-amd.jpg\" class=\"img img-responsive img-thumbnail\" style=\"height: 200px; border: 2px black;\">','2015-05-06 14:25:53','2015-05-06 14:25:53'),(24,5,'Vaibhav The Almighty','Everything Is Fair In Love And War! \r\nLoL ... We Have Seen 3 People Near Us Getting Married At Young Age So I Think , No Harm Done !','2015-05-06 14:28:06','2015-05-06 14:28:06'),(25,1,'vs_lala','As far as the gaming is concerned both cards can play equally as long as you know your requirements. But, nvidia has <b>cuda cores</b> which makes it a bit costlier than AMD but makes a huge performance difference when it comes to the task such as graphics designing, video editing, photoshop etc...  and that\'s because of cuda cores because nvidia renders everything faster. So, bottom line is <i> No card is better than the other, as long as you know your requirements.</i> But right now nvidia holds an edge. <br>\r\nAudios (;)','2015-05-07 18:51:24','2015-05-07 18:51:24');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `send_messages`
--

DROP TABLE IF EXISTS `send_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `send_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reciever_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `send_messages`
--

LOCK TABLES `send_messages` WRITE;
/*!40000 ALTER TABLE `send_messages` DISABLE KEYS */;
INSERT INTO `send_messages` VALUES (1,'vs_lala','priyanka','first message','Pehla message website ka meri taraf se tujhe ','1231395_508494949240686_497549141_a.jpg','files','2015-04-26 14:07:26','2015-04-26 14:07:26'),(2,'vaibhav','','Like My Profile Pic','Jald Se Jald','','','2015-04-26 15:53:52','2015-04-26 15:53:52'),(3,'vs_lala','','How is the user experiance','Kaisa laga user experiance.\r\nAnd kuch aur agar add karna h jo tujhe kami lagg rahi ho toh bata dena :)','Time-to-get-personal.jpg','files','2015-04-26 17:35:50','2015-04-26 17:35:50'),(4,'vs_lala','preeteshjain','Set YOur Dp','Dp daal duniya k samne aa :D :D','','','2015-04-26 17:53:21','2015-04-26 17:53:21'),(5,'vs_lala','shifu ','Message Check','Ye feature b h iska\r\nYou can send personal messages to each other. with files attaached','favicon.jpg','files','2015-04-27 05:08:39','2015-04-27 05:08:39'),(6,'vs_lala','','User Experiance?','Kaisi lagi website \r\nand agar koi b error ya kuch aur tujhe lagta h add karna chahiye toh do tell me\r\n','Time-to-get-personal.jpg','files','2015-04-27 05:11:25','2015-04-27 05:11:25'),(8,'vs_lala','priyanka','Good Morning','http://campusguru.eu1.frbit.net <br>\r\nThis is our website','','','2015-04-28 02:13:02','2015-04-28 02:13:02'),(9,'vs_lala','neelima','kaisa lagg raha user experiance','And upload your dp','','','2015-04-28 16:46:26','2015-04-28 16:46:26'),(10,'Rashmi','vs_lala','','kaisa banaya tune ... bhot accha h','','','2015-04-29 08:55:38','2015-04-29 08:55:38'),(11,'shubhamatkare','vs_lala','Kaaye badda?','Sab sahi chal rha na?','0405bf369a2e9e4e0fbf5f5528747f4c.600x.jpg','files','2015-04-29 10:46:25','2015-04-29 10:46:25'),(12,'vs_lala','shubhamatkare','sab badiya','Everything is just fine ;D','','','2015-04-29 10:51:38','2015-04-29 10:51:38'),(13,'vs_lala','Rashmi','Bas Bann Gaya :()','Actually bht sari technologies use ki h. Tu jabalpur aana mai sikha dunga :D','AoeiCcHPIigpeK6YXTCRGKZm2_DX3c2TtzLe-6pQ918h.jpg','files','2015-04-29 11:43:10','2015-04-29 11:43:10'),(14,'vs_lala','Diksha','J Lo tumhara project ka code','Niche diye gaye link pr click kare file download kar le :p','ChatApplication.zip','files','2015-04-29 12:43:40','2015-04-29 12:43:40'),(15,'Rashmi','vs_lala','','tujhe pta h mai aane wali thi abhi bt mere practical start ho gye :( kabhi na kbi aungi....are yr mje apni branch me kuch b ni ata :( isliye m sad','','','2015-04-29 13:18:55','2015-04-29 13:18:55'),(16,'vs_lala','mahi','Welcome to the Campus Guru','Share your thoughts with the world. Ask questions if you have one. Participate in the most liked image module. Post complains regarding colleges. Confess which is in your heart. And much much more... \r\nThanks for joining :)','','','2015-04-29 14:09:48','2015-04-29 14:09:48'),(17,'vs_lala','mahi','Welcome to the Campus Guru','Thanks for registering with campus guru. Its sololy based on college fun connecting everyone around the globe. If you have question in mind ASK, if you have to discuss something, DISCUSS. Upset with something complain. Have something in heart you feel guilty about, CONFESS. Get the most likes in your do and be displayed on the home page. And a lot more... Enjoy\r\n','','','2015-04-29 15:22:36','2015-04-29 15:22:36'),(18,'vs_lala','neelima','Welcome to the Campus Guru','Thanks for registering with campus guru. Its sololy based on college fun connecting everyone around the globe. If you have question in mind ASK, if you have to discuss something, DISCUSS. Upset with something complain. Have something in heart you feel guilty about, CONFESS. Get the most likes in your do and be displayed on the home page. And a lot more... Enjoy','','','2015-04-29 15:24:32','2015-04-29 15:24:32'),(19,'vs_lala','vaibhav','Welcome to the Campus Guru','Thanks for registering with campus guru. Its sololy based on college fun connecting everyone around the globe. If you have question in mind ASK, if you have to discuss something, DISCUSS. Upset with something complain. Have something in heart you feel guilty about, CONFESS. Get the most likes in your do and be displayed on the home page. And a lot more... Enjoy','','','2015-04-29 15:26:51','2015-04-29 15:26:51'),(20,'vs_lala','YumanPatel','Welcome to the Campus Guru','Thanks for registering with campus guru. Its sololy based on college fun connecting everyone around the globe. If you have question in mind ASK, if you have to discuss something, DISCUSS. Upset with something COMPLAIN. Have something in heart you feel guilty about, CONFESS. Get the most likes in your do and be displayed on the home page. And a lot more... Enjoy','','','2015-04-29 15:45:34','2015-04-29 15:45:34'),(21,'vs_lala','Rashmi','meri pic','Tjhe apni pic bhejne ka mann kia ;D','WP_20150429_003.jpg','files','2015-04-29 18:31:15','2015-04-29 18:31:15'),(22,'vs_lala','priyanka','Code Interviews','Ye ebook bht pyaari h, isme na badi badi companies k interview experiances share kiye h and example k through samjhaya h, ki kaise answer karna chahiye.','CrackCodeInterviewQuestions.pdf','files','2015-04-30 08:17:30','2015-04-30 08:17:30'),(23,'vs_lala','shubhamatkare','Comment to blogs','Added another feature. Now, users can also comment to blogs and see their blog views.\r\nCheers (:D)','','','2015-04-30 12:37:20','2015-04-30 12:37:20'),(24,'Rashmi','vs_lala','','nice pic ;D','','','2015-05-01 02:33:32','2015-05-01 02:33:32'),(25,'vs_lala','tani_td','New Features Available','Added comments and page views to the blogs.\r\nSuggestion box for user\'s to post suggestions for the website. \r\nShare blog with anyone now, and they dont require login to view them anymore.\r\nAudios\r\n\r\nCheck my new blog\r\nhttp://campusguru.eu1.frbit.net/user/show/blog/3','','','2015-05-01 03:59:18','2015-05-01 03:59:18'),(26,'vs_lala','Rashmi',':) (:p)','Thank You...\r\n\r\nAnd i added new features to blog and now we can share our blog\'s url with everyone and they can view the blog without requiring them to sign in.\r\n:)','','','2015-05-01 04:00:33','2015-05-01 04:00:33'),(27,'Rashmi','vs_lala','','nice... :)','','','2015-05-01 14:22:56','2015-05-01 14:22:56'),(28,'vs_lala','mudit','Welcome to the Campus Guru','Hello Mudit! Thanks for joining Campus Guru, a forum based on students. It has got whole loads of  features like a Q&A section for all your question. A Discussion section if you want to start any discussion. Post status and if you have the most likes your status will be displayed in the home page same with your display picture. And loads of other features and if you feel that the site should give something more than feel free to put it in the suggestion box. \r\nEnjoy L:)','53c8afacfd39a27f2220f9ade1298521a6663aff.jpg','files','2015-05-01 18:44:45','2015-05-01 18:44:45'),(29,'vs_lala','shifu ','meri photo','Tujhe pic send karne ka mann kar raha ','InstagramCapture_2e5ebcde-c3e1-4829-976d-34b51d8557be.jpg','files','2015-05-02 19:51:13','2015-05-02 19:51:13'),(30,'vs_lala','priyanka','First Phase','This is for requirement gathering. Its incomplete bt bata do ki sahi jaa raha ki nai.','TPOManagement.docx','files','2015-05-07 18:35:29','2015-05-07 18:35:29');
/*!40000 ALTER TABLE `send_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `likeCount` int(10) unsigned DEFAULT NULL,
  `dislikeCount` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'vs_lala','Nothing Lasts forever, so live it up...drink it down...laugh it off....avoid the bullshit & never have regrets becoz at one point everything you did was exactly what you wanted... Life is a celebration.. Keep on celebrating... And remember that the FAILURE is SUCCESS IN PROGRESS.\r\nCheers :)',2,NULL,'2015-04-26 09:47:07','2015-04-26 12:06:30'),(2,'priyanka','Mangoes in front of me....yumm yumm',1,2,'2015-04-26 12:11:24','2015-04-26 15:45:35'),(3,'priyanka','Mangoes in front of me.....yumm yumm',2,3,'2015-04-26 12:11:50','2015-04-26 15:47:30'),(4,'vaibhav','Do not take life too seriously. You will never get out of it alive.',3,1,'2015-04-26 15:47:26','2015-04-26 16:19:39'),(5,'vaibhav','Oh Ho',NULL,NULL,'2015-04-26 15:48:26','2015-04-26 15:48:26'),(6,'vaibhav','A successful man is one who makes more money than his wife can spend. A successful woman is one who can find such a man.\r\n#Truth_Spoken',2,NULL,'2015-04-26 15:49:23','2015-04-26 16:14:44'),(7,'vs_lala','Believing there\'s no God means I can\'t really be forgiven except by kindness and faulty memories. That\'s good; it makes me want to be more thoughtful. I have to try to treat people right the first time around.\r\n',1,NULL,'2015-04-26 16:23:39','2015-04-27 03:25:33'),(8,'priyanka','Gudmorning to all.....if anyone wants to certify for html and JavaScript then MCP  certification test is being held in our city,registration fees is 2999® and last day for it is 31 may if anyone intrested may contact sameer sir classes wright town the official testing center for more information',2,NULL,'2015-04-27 03:31:29','2015-04-27 04:47:48'),(9,'priyanka','There\'s also OCJP test for java certificaton......MCP is organised my Microsoft company ',1,NULL,'2015-04-27 03:56:21','2015-04-27 04:47:45'),(10,'priyanka','There\'s also OCJP test for java certificaton......MCP is organised my Microsoft company ',2,NULL,'2015-04-27 03:57:02','2015-04-27 04:45:56'),(11,'vs_lala','Good morning everyone! ',2,NULL,'2015-04-27 03:59:03','2015-04-28 06:20:50'),(14,'Vaibhav The Almighty','Always remember that you are absolutely unique. Just like everyone else.\r\nHe He!!!',4,NULL,'2015-04-27 08:04:59','2015-04-29 05:16:38'),(15,'vs_lala','Its party time! Woohooo ',4,NULL,'2015-04-27 15:23:37','2015-04-29 05:16:33'),(16,'vs_lala','I always write \'Wake-Up\' on my \'to-do\' list so that I can complete atleast one task in a day. \r\nGood Morning! ',4,NULL,'2015-04-27 22:54:57','2015-04-29 05:16:29'),(17,'Vaibhav The Almighty','Laugh and the world laughs with you, snore and you sleep alone.\r\n-_-',4,NULL,'2015-04-28 07:55:49','2015-04-29 17:24:41'),(18,'vs_lala','A day without sunshine is like, you know, NIGHT :p\r\nGood Night! ☻',3,NULL,'2015-04-28 18:58:39','2015-04-30 06:57:51'),(20,'shifu ',' It takes a lot of energy to be negative. You have to work at it. But smiling is painless. I’d rather spend my energy smiling. GOOD Morning ',2,1,'2015-04-29 05:21:41','2015-05-01 07:44:12'),(22,'Vaibhav The Almighty','When A Pen Is Dropped Suddenly Off My Hand While Writing , It Just Teleports To An Alternate Dimension And Is Never Seen Again!\r\n#RIP_ThePen!',5,NULL,'2015-04-29 10:55:57','2015-05-03 07:46:50'),(23,'vs_lala','Looking for a once in a life time experience? Go Skydiving with no Parachute (:p) ☻',3,NULL,'2015-05-01 02:43:22','2015-05-01 07:44:02'),(27,'shreya','Don\'t feel know when someone doubts your caliber just be proud of yourself bcoz people alwz doubt the GOLD for it\'s purity NOT the IRON :) ',1,NULL,'2015-05-02 04:00:23','2015-05-02 15:42:40'),(31,'vs_lala','It is not the fall that kills you, it\'s the sudden stop at the end ;S',4,NULL,'2015-05-02 05:41:00','2015-05-05 20:15:07'),(32,'riya','Enjoy d little things in life ....\r\nFor one day \r\nu will look back \r\nn realize \r\nthey were the big things.... ',2,NULL,'2015-05-02 08:38:55','2015-05-02 08:46:04'),(34,'tani_td','Intelligent people are more likely to avoid conflict which explains why some people notice everything but choose to say nothing.',3,NULL,'2015-05-02 13:12:10','2015-05-05 20:15:01'),(35,'vs_lala','Why cry for someone when you can laugh next to someone? aain (;) (:p)',2,NULL,'2015-05-05 04:03:18','2015-05-05 20:14:57'),(37,'vs_lala','Finally, the notification system is live. Now, you all will be notified when someone replies to your post. And tomorrow is my midsem so gotta study for it. Audios :) ',1,NULL,'2015-05-05 11:24:17','2015-05-06 14:25:39'),(38,'Vaibhav The Almighty','People With Greatest Advice Have Most Problems!\r\n#TRUTH',1,NULL,'2015-05-06 14:29:42','2015-05-07 17:05:15');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suggestions`
--

DROP TABLE IF EXISTS `suggestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suggestions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suggestion` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suggestions`
--

LOCK TABLES `suggestions` WRITE;
/*!40000 ALTER TABLE `suggestions` DISABLE KEYS */;
INSERT INTO `suggestions` VALUES (1,'vs_lala','Add a notification system for new messages :)','2015-05-01 04:23:58','2015-05-01 04:23:58');
/*!40000 ALTER TABLE `suggestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `college` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Varun Shrivastava','vs_lala','varunshrivastava007@gmail.com','$2y$10$AOYbQ3gi2jPi0SRU8XqVCOaR4wLwiPqeqfpcseKa3FR/lLvotIIUC','HCET','cs','2NqAqgvyn4hyQjEM7Ho6gnqR4vQiOf1fe4fPaSuuWSEF2EOTSoLABgq7GtPL','2015-04-26 09:42:36','2015-05-09 17:26:52'),(2,'Vaibhav Shrivastava','vaibhav','iammagnifiient@gmail.com','$2y$10$jp7QukY32Z1ICU2AFYBgjO71R7Gz2sbT3KK7vFCTmG9RlYm9A6phe','HCET','cs','9ziOtddblNXzxNN6M2OQvirwK2EFJRcc7yP6I617ZSWBGJp6GYA15vc5M77m','2015-04-26 11:54:24','2015-05-06 14:39:52'),(3,'Akshay Tiwari','guru ki fauj','shubhamtiwari.tiwari07@gmail.com','$2y$10$SMGNpetXpC7guG0cKiw8NOcW96dQmZA0JEry8OoTpclpAZc1jT4JC','hcet','cs',NULL,'2015-04-26 11:55:31','2015-04-26 11:55:31'),(4,'Rashmi Dixit','Rashmi','rashmidixit.1@gmail.com','$2y$10$LfNCqDgP02HPpt25k3Ie7OYyDRUj417QbM9h9kHovUy7w2n6E1DXa','School of Management Sciences','ec','FF9cM8Iu1d7pwCw3kqTtJdIiJIebBo469gPxNaGgGwYb0qOJew6pjXKKLaAf','2015-04-26 11:56:07','2015-05-01 14:23:07'),(5,'priyanka yadav','priyanka','priyankarano1994.yadav@gmail.com','$2y$10$n.QgfdBK4.q8.BPjLJMKY.2A5BGGsf2ounnUmwd.l/B51mFoW/ShC','hitkarni','it','F6PAGQ6dAlSH71qwm1oLLeevRwmHOWEqcGvW8tbicIfuQTkEJYFteScMndvH','2015-04-26 11:58:13','2015-04-30 14:13:56'),(6,'Diksha Gupta','Diksha','diksha24gupta24@gmail.com','$2y$10$VVaAE.bMJQgzgF1YojUrYONtbkGtcrjdFR3VNLL8.SC/OmdRbdkWa','hcet','cs','WQebXVXl7BFycHjg6XQtdK0MDz40x8YpDXbS8kHw3MF1cBKWoTSDMPdCzOJi','2015-04-26 12:03:52','2015-04-28 10:32:04'),(7,'Bhanupriya burman','bpriya','bpriyaburman@gmail.com','$2y$10$vm/.GO702wQS40tYJf4B.udhqDO1fpavK.5s.tfc.zyIMVP1pqi9C','hcet','cs',NULL,'2015-04-26 12:05:17','2015-04-26 12:05:17'),(8,'Rahul Dubey','Rahul Dubey142','RahulDubey95@gmail.com','$2y$10$on54cRtLJA2O210A0dYag.1BSM8OQuXVnyYel6KW7.v8meWGFX786','hcet','cs',NULL,'2015-04-26 12:15:44','2015-04-26 12:15:44'),(9,'Shubham Sethi','#sethishubham','Shubhams55@gmail.com','$2y$10$YGNrlZkSugI3KIGquhnfpOhFNzYGZvBO6LZshu/WYOR.hSHb0etN2','hithkarini collage of engineering and technology','cs',NULL,'2015-04-26 12:57:42','2015-04-26 12:57:42'),(10,'Shubham sethi','Shubham Sethi','Shubhamsethi8055@gmail.com','$2y$10$gWCd3snb9reeIhe4fa.2mOKM/MIQJDdHzAGWqTq3zEYZBx4qt5Gve','hitkarini collage of engineering and technology','cs',NULL,'2015-04-26 13:07:42','2015-04-26 13:07:42'),(11,'Ishu Neekhra','Ishu','i1995.ishu@yahoo.com','$2y$10$cBUuX8ZhE7EDgZSxPYjCcu7.7gVNnhFjUjC1MOYc/m7q3I9Mblr6e','HCET','cs',NULL,'2015-04-26 14:23:34','2015-04-26 14:23:34'),(12,'Dorothy Timothy','Varsha Thakur','92shree@gmail.com','$2y$10$WzHjVOAJWQ0bRNgetS7.wOjG3x1gxWxm9HPN5YKrMRaJpZc5U1F6G','H .C .E .T','cs',NULL,'2015-04-26 14:34:07','2015-04-26 14:34:07'),(13,'Shifa Siddiqui','shifu ','shifa.sid05@gmail.com','$2y$10$Qb8cQcYuwD.pZ3nogu/u7OGtYiU7REA6PRUEZyD9i9j.xZL.KQIxG','hitkarini college of engineering and technology','cs','g4A0zegD3YamXRGlkAQXfVN4Kk481Ca3LiymhsTp4jgXNmlHPJWeaG6gsRlQ','2015-04-26 15:04:30','2015-04-28 02:34:01'),(14,'karanshrivastava','DNA breZe','karanshrivastava17@yahoo.com','$2y$10$HCSNzFQ.VDQOF97wjjArTek6CQwIV3BpcA.kLjsY0jwZdvhIMHIfm','NVAS','civil',NULL,'2015-04-26 15:06:47','2015-04-26 15:06:47'),(15,'Neha Rai','nehajec','neharaineha111@gmail.com','$2y$10$Lhrrjex5IRix9oHH9xZtueGhajEIcA6CgsLItv9jvQYfIYY7E/BSC','Jabalpur Engineering College','cs',NULL,'2015-04-26 15:08:13','2015-04-26 15:08:13'),(16,'Nikita Wadhwani','sweet_nikz','sweetnikz0210@gmail.com','$2y$10$nPXWsuy2N1TiKikjnK8Wtua04LYaQz7O9FdFseENbjydBfrj55/oW','hcet','cs',NULL,'2015-04-26 16:28:13','2015-04-26 16:28:13'),(17,'Preetesh Jain','preeteshjain','preeteshjain17@yahoo.in','$2y$10$/XymkZoBefWHra8gwas0Ve3BRfGoek8TX6B0B/1ROCEwmiNO9vIji','HCET','cs','JkK3N4egAZeJfR8XB28IGHu4YdNVT8Z10XZougI02ZRbMFcLwtv3KkTZ3JBJ','2015-04-26 17:32:26','2015-04-26 17:37:00'),(18,'Praniti Gupta','flyhigh_sky','pranitigupta79@gmail.com','$2y$10$jp4wEDvkxGIVvNWx2RGrTOIY6/svJYuqAX6KLPBZiy2jQiJgEHz.q','Vindhya Institute of Technology & Science','cs','3m0uP94EWqbyiVTUsknxlOKg5a0Z4q4tcSuwm6qzmrB2JfyW4DJyZkLJNy3z','2015-04-26 19:08:21','2015-04-26 19:12:41'),(19,'arshita nayyar','aishniak','anayyar015@gmail.com','$2y$10$JDW1WQS1r.NqtityyrIqM.CHWz8Ogt8ISQ.0CKsLck5q0hsqfTCPO','h.c.e.t','ec',NULL,'2015-04-27 02:31:45','2015-04-27 02:31:45'),(20,'Tania Das','tani_td','tanyadas12@gmail.com','$2y$10$G9KnfnGbRyeUq6cPprzmfuIV0nZfoLmQxPfx6ryqzmhvugLmKmXke','Vindhya Institute Of Technology & Science','cs','wUJZq2viYd5jiC2CJvg1TFtsynO1qIpxgYbhRtFIgnDfDpXvVuzr86he8AaP','2015-04-27 07:46:41','2015-05-02 13:28:08'),(21,'Vaibhav Shrivastava','Vaibhav The Almighty','thealmighty@gmail.com','$2y$10$0UC9DmrO9XtZC9pMFQJmWeTWPyAbDg0d6oA.U0zRPefg7dzHws5NC','Hogwarts','cs','D7pOPGK1YQN4uzHRofqFKqV5SRd9r2ClSg6p731FW1dSt7QOEZmIQwvFaMxI','2015-04-27 08:01:42','2015-05-06 14:38:52'),(22,'Shrshti Agrawal','shrshti27','shrshtiagrawal@gmail.com','$2y$10$ZTlgizS6ENlFoH4IYU9pfecmIy6XIcUQl9THUUSkmKsJebLjCwxbO','HCET','cs',NULL,'2015-04-27 13:08:12','2015-04-27 13:08:12'),(23,'Mayank Jain','mayank693','mayank-jain@live.in','$2y$10$pk0DR1MFsQbEitUeqoTmwOhVqB2PGLcv84XzliS7hbLGYqudMKWtG','HCET','cs',NULL,'2015-04-28 06:01:01','2015-04-28 06:01:01'),(24,'Swapnil katailiha','Skatailiha','swapnilkatailiha@gmail.com','$2y$10$4J2Cyrzd1fkA56HtCxMK..Cxq0t33lXF4zMVsJ/dIj8oYxC.8h1M.','St.Gabriel Hs.sec. School Jabalpur','cs','WNC5dYBHi3JbJiiM7Kulp32dJcQJUbbp34d0MSMqCQ4zTRp9aulYHiUmRE9r','2015-04-28 06:08:19','2015-04-28 06:55:46'),(25,'Saurabh Vishwakarma','saurabh2456','saurabh2456@yahoo.com','$2y$10$7AIRg4tqdfPJTU6P09vC3ugRd9/CcbZZhNjonEL43fKHfuNqIErKO','HCET','cs',NULL,'2015-04-28 07:59:38','2015-04-28 07:59:38'),(26,'Neelima Sadhukhan','neelima','neelsd23@gmail.com','$2y$10$GALJ2qtlJXUKVmfDwQhJVuIN5Kn7QPAcIYiv3kbCzMR11Xbh/hUHe','GGITS','cs',NULL,'2015-04-28 14:23:51','2015-04-28 14:23:51'),(27,'manish kumar vishwakarma','manish','manishvishwakarma7@live.com','$2y$10$aH4jKK.RzeT5AinzQ12K2uLPU/7frOnhP3e03D31dXXqs7l6Yzp9W','hcet','cs',NULL,'2015-04-29 03:18:53','2015-04-29 03:18:53'),(28,'mohini soni','mahi','mohini.soni.2010.17@gmail.com','$2y$10$b8GHjKc9jzQSOr4KMyQdyezWtBpr1vpy1r0w/lDySL0/no4EAPlVq','hcet','cs',NULL,'2015-04-29 03:56:40','2015-04-29 03:56:40'),(29,'Shubham Atkare','shubhamatkare','shubhamatkare@yahoo.com','$2y$10$AGV0o6njRwVaVdPsQhOGr.HL1u1DkY2yI5jFxvo/h4zf8lyQN7vTe','Hitkarini College of Engineering and Technology','cs','6iDjFwggn9pQ1qqfP67yLshMVKz3G7x4KQXO9gYsUpFDXNI1GKqaNqYzV1GB','2015-04-29 10:37:47','2015-04-29 11:48:15'),(30,'Yuman Patel','YumanPatel','loverboyuman@gmail.com','$2y$10$PGcFHGGNAs9lRZ1f5GAM5uJ4q3AtoVu4dz1E2ptLJF/eVilQOGc4.','St. Gabriel Se. Sc. School','cs',NULL,'2015-04-29 11:24:52','2015-04-29 11:24:52'),(31,'agam shrivastava','agam_2508','shrivastaavaagam2508@gmail.com','$2y$10$OpeaAcqcrzruxlKF0okWcuxk4c/12eqjaFd9Z8rvkqb01DBK5JI2.','hcet','ec',NULL,'2015-04-29 16:43:46','2015-04-29 16:43:46'),(32,'Abhijeet Pratap Singh','tengallonhead','s.abhijeetpratap@yahoo.com','$2y$10$VEP/C4OxE74g8PnhX1Hg0OcDoztUZ83NxKQgaFXYUrgB.gwAnhwDC','Gyan Ganga Institute of Technology and Sciences','ec','MQNSAnbV9D3S8mtl7tLAo2d9bK0rXnZ2XX0HGFeOzRJUGm4VGPEyKEAKGuYh','2015-04-29 16:43:50','2015-04-30 15:58:22'),(33,'Ishita Tembhurne ','Ishita Nkt','ishitatemb@gmail.com','$2y$10$ggZGRpqSqWkiklIMMGGqLeOBMJzCn29ceLdGfiROrjPhMJRRngNfK','Ggits ','ec',NULL,'2015-04-29 17:58:41','2015-04-29 17:58:41'),(34,'gagan Shrivastava','gagan','shrivastavagagan678@rediffmail.com','$2y$10$geLbblGcdQoHRpPjxjSFU.CdJzxXM0/6h.XSKS9jvTDnWlfbgm3Ra','ggits','ec',NULL,'2015-04-30 01:57:23','2015-04-30 01:57:23'),(35,'ashu singh karan','ashukaran','ashu.karan007@gmail.com','$2y$10$xZKqTbj.N/1QIN3Qq8QeNOFDaDRZE51Rp/hjXRjAEb5xA.hEh8m6S','ggits','ec',NULL,'2015-04-30 02:22:55','2015-04-30 02:22:55'),(36,'shivarth shrivastava','bond007','shivarth.shrivastava@gmail.com','$2y$10$BxQuvUrXhM7sDITZDG.V1eCyvMSza3v.eGqwmBYoKsLWZ/b0Ib7ti','hcet','mech','QvWg0iuzs91RWdvC1RAkljJH4PVtryvyzGIbRJyx2OOEAIQntgMvSJ6GLHcc','2015-05-01 05:09:14','2015-05-01 05:11:11'),(37,'Aman Anand','MECH_AMAN','aman.anand007@gmail.com','$2y$10$cJ6MPaktxSDY8TBdi7h/r.zQhT0d3ZKYR1lVxEBPQTnr.ZUvdofrO','global','mech',NULL,'2015-05-01 12:02:33','2015-05-01 12:02:33'),(38,'sherya jain ','shreya','sheryaj5@gmail.com','$2y$10$XdBfgJ0rhXF.DFVk8dfV0.eYDYRnW89FhZZK62EXohGQvDefvfqbS','hcet college ','cs','ZBdys5zzzqQimwBc0FWxiyDRT4es6gr7Tf1SPuY8hZob20AaS0Qo9nFGv6dd','2015-05-01 17:11:29','2015-05-02 14:38:18'),(39,'mudit kanojia','mudit','muditkanojia@gmail.com','$2y$10$PzMBP5ILclrBqeSj2J6MseaPC8vPq6Kpd/MbRG6qasu4tHYTE9epm','jec jabalpur','cs','d0xzbQc2WcuWbyidF1XZ5fPupxp2lhjHxnqpoKYdbRIE5pTeDkA3tPaX7zgd','2015-05-01 18:00:24','2015-05-01 18:56:20'),(40,'Riya Kohli','riya','riyakohli97@gmail.com','$2y$10$DByAawYMTZwibKmS/QaZYeFdx5dSFtgMFX6pbaTTgo6pWRSTEiyo2','st gabriels sr sec school','null','NcybKVp2TCudF5Ir4Y0i62Fjnh0oDlUvt1Fi4n4GXsyEJSYQ5T5ZT3bGV4W4','2015-05-02 08:25:01','2015-05-05 08:42:25'),(41,'Atulit Mehra','atulitrockstar','cool.atulithd@gmail.com','$2y$10$RoIuPaKwKOASSNUzbqlRp.wB5ffYOPgtCVyhdvsn1jl3uKnIhXpBe','St.Gabriels Senior Secondary School','it','TlQuILmQ9zTe3OFU4dis5IIJyIQr06r0Cx6E0TNdJXMXB7OSNXuzbFFTNC8D','2015-05-02 08:40:34','2015-05-02 13:12:18'),(42,'anirudh rajan','raghavan','anirudh.rajan1@gmail.com','$2y$10$K7LK7gRr4pBmTCebTy11rOX/hubknA2NGPBwPi9a2j1L7jIm1ZQZK','hcet','it','yvgq8GZN9rKTTbToaRV0y73e8jePiBGi6j8OqU13oN8rY7E6LJRCBAwdRPCX','2015-05-04 19:31:05','2015-05-04 19:35:53'),(43,'disha talreja','disha','dtalreja32@gmail.com','$2y$10$J2TiqAiWfq86zmSAUhVVFe55bcGM8GXcN457YqLPGbLtBaubhqaoq','jabalpur engg. college','ec',NULL,'2015-05-05 06:35:06','2015-05-05 06:35:06'),(44,'Akshita sharma','Oshine','akshita2709@gmail.com','$2y$10$TSp6CghSV8h2T2gf3ohSBeHfXxv/3ouJJ3w/w.ZTSiW/ItfGATsTu','Hcet','cs',NULL,'2015-05-05 12:45:05','2015-05-05 12:45:05'),(45,'Ravina Rangari','Angelravina','ravinarangari89@gmail.com','$2y$10$6oJzto3/YWX/7ctwi.2zKeM91XEUkMI1.5iouWMWfJCphqsdYM2m6','hitkarini college of engineering and technology','ec',NULL,'2015-05-05 19:53:28','2015-05-05 19:53:28'),(46,'Janice Dhillon','janice4111990','janice4111990@gmail.com','$2y$10$uDNwDYFwNkKVkY5frPrB0OgrzUXlcRsQxISItoHnv8bnrhExExXrm','St. Aloysius College ','Education  ',NULL,'2015-05-06 14:24:24','2015-05-06 14:24:24'),(47,'Milan Kapoor','Milan','milankapoor0.mk@gmail.com','$2y$10$IWKXX/4PIzFZ7nMBiwkHAeFYfqbVLeV52C0kNCfCtbvpkm0RaT7LS','St.Gabriels SS School','auto','cpwEpDRHQFr84cERiK5WUmGVDAo36hPYos1xtHqeVZd5NbmnEX3LZAVli4qQ','2015-05-07 04:01:51','2015-05-07 04:06:08');
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

-- Dump completed on 2015-05-09 17:59:52
