-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: himatif_official
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'tak-berkategori','Tak Berkategori',0);
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `post_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'approved' COMMENT 'on_moderation|declined|approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_comments_parent_id_index` (`parent_id`),
  KEY `blog_comments_user_id_index` (`user_id`),
  KEY `blog_comments_post_id_index` (`post_id`),
  CONSTRAINT `blog_comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `blog_comments` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `blog_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
INSERT INTO `blog_comments` VALUES (1,NULL,77,1,'DWI LESTARI','G1A018087@default.test',NULL,'gtest','approved','2021-02-23 03:30:20','2021-02-23 03:30:20',NULL),(2,NULL,77,1,'DWI LESTARI','G1A018087@default.test',NULL,'halo','approved','2021-02-23 03:30:25','2021-02-23 03:30:25',NULL),(3,1,77,1,'DWI LESTARI','G1A018087@default.test',NULL,'baris baru','approved','2021-02-23 03:30:32','2021-02-23 03:30:32',NULL),(4,1,77,1,'DWI LESTARI','G1A018087@default.test',NULL,'wkwk','approved','2021-02-23 03:30:38','2021-02-23 03:30:38',NULL),(5,NULL,71,1,'ELLEN THERESIA  NADEAK','G1A018080@default.test',NULL,'why','approved','2021-02-23 03:30:54','2021-02-23 03:30:54',NULL),(6,2,77,1,'DWI LESTARI','G1A018087@default.test',NULL,'sd','approved','2021-02-23 03:32:16','2021-02-23 03:32:16',NULL);
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_post_categories`
--

DROP TABLE IF EXISTS `blog_post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `post_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_post_categories_category_id_index` (`category_id`),
  KEY `blog_post_categories_post_id_index` (`post_id`),
  CONSTRAINT `blog_post_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `blog_post_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post_categories`
--

LOCK TABLES `blog_post_categories` WRITE;
/*!40000 ALTER TABLE `blog_post_categories` DISABLE KEYS */;
INSERT INTO `blog_post_categories` VALUES (3,1,1);
/*!40000 ALTER TABLE `blog_post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft' COMMENT 'draft|published',
  `allow_comment` tinyint(1) NOT NULL DEFAULT 1,
  `moderate_comment` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_posts_user_id_index` (`user_id`),
  CONSTRAINT `blog_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (1,77,'LOREM IPSUM IS DOLOR SIT AMET','lorem-ipsum-is-dolor-sit-amet','<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam possimus modi itaque explicabo minima fugit quod illum, dolore corrupti tempora officia temporibus atque unde mollitia ad veniam non delectus. Itaque, odit. Quisquam sed deleniti, necessitatibus voluptatibus maxime odio officiis commodi temporibus consequuntur quam. Aliquam ipsa in sequi dignissimos minus doloribus odit nesciunt ipsum assumenda consequatur magni excepturi dicta similique saepe quae voluptatem at perspiciatis, iusto harum deserunt? Amet iste praesentium id cumque quia assumenda culpa ea eveniet, quis magnam, aliquam rerum vel quod consectetur eaque at illo possimus rem laboriosam veritatis. Dolores atque aliquid cumque sit! Nam quaerat tenetur debitis impedit animi explicabo rerum officia eligendi sequi natus odio earum consequuntur minus itaque molestiae atque facere quis voluptates, neque inventore! Minima doloremque minus totam eius tenetur, cum a consectetur vero nemo temporibus facilis vitae repudiandae blanditiis nam eos ex, perspiciatis vel et dolor pariatur, sequi rem odio. Debitis quas sit deserunt, officia aperiam doloremque reiciendis officiis animi maiores sint neque natus et labore architecto sequi nam veritatis minima quisquam alias rem quam similique nulla culpa. Harum ratione rem eos quibusdam, veniam aliquam dolores provident mollitia qui eaque, accusantium perspiciatis magnam assumenda nihil. Voluptatibus, dignissimos, fugiat, minima deserunt maiores deleniti quis accusantium alias tempora voluptatem sunt in necessitatibus delectus. Culpa similique iure neque, facere facilis numquam ipsam voluptatum quasi optio tempore debitis, explicabo nesciunt vel soluta, recusandae dolore ab ullam deserunt minima molestias itaque! Suscipit vero accusamus modi nulla perspiciatis esse, praesentium explicabo inventore expedita molestias ipsa doloribus quaerat dolores ratione eius reprehenderit? Accusantium ratione vitae quam, commodi itaque perspiciatis ullam error sunt veniam nemo fugit esse facere, adipisci praesentium consequuntur ducimus cumque doloremque. Soluta, esse. A, sint. Ea ut deserunt tempora quia deleniti iusto officiis quos eum at vitae quisquam vel sint dolore libero nobis, tempore dicta harum eius aspernatur molestiae fugiat iste. Cum id non ab nemo, voluptate distinctio aliquam magnam neque? Temporibus nemo modi eos blanditiis consequuntur sed quaerat neque qui ratione aut veniam atque asperiores iste earum sunt autem, dolorum eaque harum voluptatum eum incidunt expedita quas? Soluta architecto consequuntur a sunt earum, ipsum reprehenderit, perspiciatis dolorum laboriosam, sequi eum inventore? Temporibus reiciendis laborum architecto quaerat cumque assumenda modi pariatur voluptatem quae recusandae ea rerum tempore, rem unde ipsam id eveniet sapiente nam voluptatum optio ex perspiciatis! Quae omnis repellendus veniam? Unde excepturi asperiores tempora error rem esse inventore optio est quibusdam at quasi facilis, ad nam natus repellendus dicta modi aut fugiat mollitia nihil vel magni, corporis soluta? Ut rerum magni provident maxime natus. Quidem optio iusto dolorum voluptatum sed quam alias accusantium harum explicabo aliquid, molestiae nisi beatae voluptas ea quo inventore sapiente ullam suscipit esse autem ut in. Cumque vitae, doloribus sequi aliquam expedita, accusantium recusandae tenetur dolor eum quos fuga veritatis omnis beatae molestias? Quaerat accusantium nesciunt similique consectetur, inventore quo eaque, minus autem libero sapiente beatae animi quos laudantium? Officiis rerum distinctio ipsa eos in magni mollitia aliquam quibusdam! Tempore ea, dolorum error cumque id atque autem fugiat deleniti labore, modi provident.</p>',NULL,'publish',1,0,'2021-02-23 03:09:12','2021-02-23 03:14:53',NULL);
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisions`
--

LOCK TABLES `divisions` WRITE;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` VALUES (1,'Kerohanian'),(2,'Kewirausahaan'),(3,'Minat dan Bakat'),(4,'Information and Technology'),(5,'Pengabdian Masyarakat'),(6,'Pengembangan Sumber Daya Manusia');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forces`
--

DROP TABLE IF EXISTS `forces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forces`
--

LOCK TABLES `forces` WRITE;
/*!40000 ALTER TABLE `forces` DISABLE KEYS */;
INSERT INTO `forces` VALUES (1,2021,'Angkatan 2021'),(2,2020,'2020'),(3,2019,'GEZNINE'),(4,2018,'FORANDALS'),(5,2017,'The Next Informatics');
/*!40000 ALTER TABLE `forces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_answers`
--

DROP TABLE IF EXISTS `form_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` bigint(20) unsigned DEFAULT NULL,
  `is_over_date` tinyint(1) NOT NULL DEFAULT 0,
  `is_over_answer` tinyint(1) NOT NULL DEFAULT 0,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_answers_form_id_index` (`form_id`),
  CONSTRAINT `form_answers_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_answers`
--

LOCK TABLES `form_answers` WRITE;
/*!40000 ALTER TABLE `form_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_question_answers`
--

DROP TABLE IF EXISTS `form_question_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_question_answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `answer_id` bigint(20) unsigned DEFAULT NULL,
  `question_id` bigint(20) unsigned DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_question_answers_answer_id_index` (`answer_id`),
  KEY `form_question_answers_question_id_index` (`question_id`),
  CONSTRAINT `form_question_answers_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `form_answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `form_question_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `form_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_question_answers`
--

LOCK TABLES `form_question_answers` WRITE;
/*!40000 ALTER TABLE `form_question_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_question_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_questions`
--

DROP TABLE IF EXISTS `form_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` bigint(20) unsigned DEFAULT NULL,
  `question` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = text, 2 = textarea, 3 = radio, 4 = checkbox, 5 = select, 6 = tanggal, 7 = waktu, 8 = tanggal & waktu, 9 = file',
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `multiple_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `file_rules` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `form_questions_form_id_index` (`form_id`),
  CONSTRAINT `form_questions_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_questions`
--

LOCK TABLES `form_questions` WRITE;
/*!40000 ALTER TABLE `form_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bitly_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_fill_date` datetime DEFAULT NULL,
  `max_fill_answer` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = Draft, 2 = Buka, 3 = Tutup',
  `publish_at` datetime DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forms_user_id_index` (`user_id`),
  CONSTRAINT `forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_categories`
--

DROP TABLE IF EXISTS `gallery_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_categories`
--

LOCK TABLES `gallery_categories` WRITE;
/*!40000 ALTER TABLE `gallery_categories` DISABLE KEYS */;
INSERT INTO `gallery_categories` VALUES (1,'tak-berkategori','Tak Berkategori',0),(2,'kegiatan-1','Kegiatan 1',1);
/*!40000 ALTER TABLE `gallery_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'App\\Models\\Setting',4,'4f7b95b3-4da7-4f66-b31d-870fdf8e7689','logo','himatif','himatif.png','image/png','public','public',248147,'[]','[]','[]','[]',1,'2021-02-23 01:29:35','2021-02-23 01:29:35'),(2,'App\\Models\\Division',1,'9fee2e24-7a30-48b8-b691-2bc7aca91f9e','divisionPicture','Kerohanian','Kerohanian.png','image/png','public','public',7908,'[]','[]','[]','[]',2,'2021-02-23 01:29:57','2021-02-23 01:29:57'),(3,'App\\Models\\Division',2,'7ef520ab-349c-40bd-8b0d-56eb727cf01a','divisionPicture','KWU','KWU.png','image/png','public','public',6167,'[]','[]','[]','[]',3,'2021-02-23 01:30:05','2021-02-23 01:30:05'),(4,'App\\Models\\Division',3,'bfca418f-bf47-40e4-811a-152ccd1c0d42','divisionPicture','Minbak','Minbak.png','image/png','public','public',10366,'[]','[]','[]','[]',4,'2021-02-23 01:30:11','2021-02-23 01:30:11'),(5,'App\\Models\\Division',4,'50db1f9a-6aa1-4aaa-accf-c5b0558b3245','divisionPicture','IT','IT.png','image/png','public','public',5525,'[]','[]','[]','[]',5,'2021-02-23 01:30:17','2021-02-23 01:30:17'),(6,'App\\Models\\Division',5,'91d66673-d5b0-4110-adf5-09827c904796','divisionPicture','Pengabdian Masyarakat','Pengabdian-Masyarakat.png','image/png','public','public',10350,'[]','[]','[]','[]',6,'2021-02-23 01:30:24','2021-02-23 01:30:24'),(7,'App\\Models\\Division',6,'e2333146-9743-49d6-8704-050aa78598c9','divisionPicture','PSDM','PSDM.png','image/png','public','public',6873,'[]','[]','[]','[]',7,'2021-02-23 01:30:31','2021-02-23 01:30:31'),(11,'App\\Models\\Social_auth',4,'72f0405a-1916-4192-822a-f79a3223f985','social_auth_picture','AOh14GjTPHdvJdWwCwURfRbD1yxE5hL1VMFBOBnyYO_nPA=s96-c','AOh14GjTPHdvJdWwCwURfRbD1yxE5hL1VMFBOBnyYO_nPA=s96-c.jpeg','image/jpeg','public','public',4580,'[]','[]','[]','[]',8,'2021-02-23 03:05:12','2021-02-23 03:05:12'),(12,'App\\Models\\Blog_post',1,'83b65bef-7b69-4a6a-8a63-bf8a9010cadc','post_picture','umbrella_colorful_positive_138246_3840x2160','umbrella_colorful_positive_138246_3840x2160.jpg','image/jpeg','public','public',1385887,'[]','[]','[]','[]',9,'2021-02-23 03:09:12','2021-02-23 03:09:12'),(13,'App\\Models\\Picture_gallery',1,'0feb10dd-7bd8-415f-9c35-95b21f8edaad','galleryPictureItems','xps-7ZWVnVSaafY-unsplash','xps-7ZWVnVSaafY-unsplash.jpg','image/jpeg','public','public',976106,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',10,'2021-02-23 03:20:32','2021-02-23 03:20:32'),(14,'App\\Models\\Picture_gallery',1,'6d30901b-0896-49a0-9605-8c604dfcdd5e','galleryPictureItems','safar-safarov-LKsHwgzyk7c-unsplash','safar-safarov-LKsHwgzyk7c-unsplash.jpg','image/jpeg','public','public',671307,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',11,'2021-02-23 03:20:32','2021-02-23 03:20:32'),(15,'App\\Models\\Picture_gallery',1,'725d6b38-72a3-47f0-9709-70ddc86ce3a1','galleryPictureItems','pexels-rodrigo-souza-2531709','pexels-rodrigo-souza-2531709.jpg','image/jpeg','public','public',806079,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',12,'2021-02-23 03:20:32','2021-02-23 03:20:32'),(16,'App\\Models\\Picture_gallery',1,'f401f4f6-842d-4917-9982-78d094bc6de9','galleryPictureItems','pexels-pixabay-36039','pexels-pixabay-36039.jpg','image/jpeg','public','public',718248,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',13,'2021-02-23 03:20:32','2021-02-23 03:20:32'),(17,'App\\Models\\Picture_gallery',1,'2f84fa85-b885-4abd-86cc-8eb84c088302','galleryPictureItems','umbrella_colorful_positive_138246_3840x2160','umbrella_colorful_positive_138246_3840x2160.jpg','image/jpeg','public','public',1385887,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',14,'2021-02-23 03:20:33','2021-02-23 03:20:33'),(18,'App\\Models\\Picture_gallery',1,'26cb5c2a-c31f-4497-82a8-aed890a7df9c','galleryPictureItems','pexels-pixabay-265987','pexels-pixabay-265987.jpg','image/jpeg','public','public',1355444,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',15,'2021-02-23 03:20:33','2021-02-23 03:20:33'),(19,'App\\Models\\Picture_gallery',1,'a261af93-6497-4d51-86c8-72834067a635','galleryPictureItems','pexels-vincent-gerbouin-1174732','pexels-vincent-gerbouin-1174732.jpg','image/jpeg','public','public',1393929,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',16,'2021-02-23 03:20:33','2021-02-23 03:20:33'),(20,'App\\Models\\Picture_gallery',1,'392a3e4b-78d7-493e-845a-d31facf4b04d','galleryPictureItems','pexels-khairul-onggon-908055','pexels-khairul-onggon-908055.jpg','image/jpeg','public','public',773455,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',17,'2021-02-23 03:20:33','2021-02-23 03:20:33'),(21,'App\\Models\\Picture_gallery',1,'8a03531c-7a29-43b4-9947-5e873c25f2e7','galleryPictureItems','pexels-pavlo-luchkovski-337901','pexels-pavlo-luchkovski-337901.jpg','image/jpeg','public','public',1452765,'[]','{\"name\":\"Wallpaper\",\"description\":\"\"}','[]','[]',18,'2021-02-23 03:20:33','2021-02-23 03:20:33');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `force_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `members_force_id_index` (`force_id`),
  KEY `members_user_id_index` (`user_id`),
  CONSTRAINT `members_force_id_foreign` FOREIGN KEY (`force_id`) REFERENCES `forces` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,3,NULL,'Sekretaris',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,4,4,'AGUNG DESTIO','G1A018001',NULL,NULL,NULL,NULL,'2021-02-22 20:39:29',NULL),(3,5,4,'JEMMI ALPAROBI','G1A018002',NULL,NULL,NULL,NULL,'2021-02-22 20:39:29',NULL),(4,6,4,'MUHAMMAD IMMAMUL JALAL','G1A018003',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(5,7,4,'ALINUR FRADITA UTARI','G1A018004',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(6,8,4,'FITRI DWI RAHMATULAINI','G1A018005',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(7,9,4,'AKNIA FAZA HERYUANTI','G1A018007',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(8,10,4,'MELI TRI YANTI','G1A018008',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(9,11,4,'LOVIDA ROYANI','G1A018009',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(10,12,4,'ARUM PUTRI NOVI YANTI','G1A018010',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(11,13,4,'ETIA ROSALINA','G1A018011',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(12,14,4,'PUTRI RAHAYU','G1A018012',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(13,15,4,'RINDA AYU LESTARI','G1A018013',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(14,16,4,'MIFTAH FADHLURROHMAN','G1A018014',NULL,NULL,NULL,NULL,'2021-02-22 20:39:30',NULL),(15,17,4,'NEFERLY ARIF BUDIMAN','G1A018015',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(16,18,4,'INAYATI ISMI','G1A018017',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(17,19,4,'RISTIANAH','G1A018018',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(18,20,4,'HANIFAH NUR SAFITRI','G1A018019',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(19,21,4,'TEGAR KASIH SATRIA','G1A018020',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(20,22,4,'SAHRIAL IHSANI ISHAK','G1A018023',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(21,23,4,'STEFANI TASYA HALLATU','G1A018025',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(22,24,4,'ADITYA RIZKI ANANDA','G1A018026',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(23,25,4,'FEBRIDILLA NURUL MASYITA','G1A018027',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(24,26,4,'AJIE NOFRIZAN','G1A018028',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(25,27,4,'ALDJO DHIE FALETEHAN','G1A018029',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(26,28,4,'NURUL LAILA TUSYA\'DIAH','G1A018030',NULL,NULL,NULL,NULL,'2021-02-22 20:39:31',NULL),(27,29,4,'ANJAS WIRANTA TARIGAN','G1A018031',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(28,30,4,'PANJI RAMADHAN','G1A018032',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(29,31,4,'HAFIZ HIDAYAT','G1A018033',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(30,32,4,'INTAN PERMATA HATI','G1A018034',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(31,33,4,'ARSYI ARIF AGAMI','G1A018035',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(32,34,4,'RADEN MUHAMMAD HILMI NURHADI','G1A018036',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(33,35,4,'NAUFAL RIZKY ANANDA','G1A018037',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(34,36,4,'WINA SALSABILLA FANDINI','G1A018038',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(35,37,4,'SURYA EMPA LESMANA','G1A018041',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(36,38,4,'DWIKY RACHMANDA SYAINDA PUTRA','G1A018043',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(37,39,4,'FATMA JUWITA','G1A018044',NULL,NULL,NULL,NULL,'2021-02-22 20:39:32',NULL),(38,40,4,'TEDHY ERLANSYAH','G1A018045',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(39,41,4,'NAUFAL HAFIZH DHIYA ULHAQ','G1A018046',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(40,42,4,'AHZAMI JANATA','G1A018048',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(41,43,4,'DEVINA FITRIA','G1A018049',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(42,44,4,'VIRA RAHMA','G1A018050',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(43,45,4,'TIYA SUCI HAMIMMAH ','G1A018051',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(44,46,4,'YANTI SIMANJUNTAK','G1A018052',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(45,47,4,'WASEP TRIANSYAH','G1A018053',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(46,48,4,'RAHMAT FIKRI WAHYUDI','G1A018054',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(47,49,4,'MUHAMMAD FIKRI ABDILLAH ARIFIN','G1A018056',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(48,50,4,'HARIZALDY CAHYA PRATAMA','G1A018057',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(49,51,4,'EDWAR ANTONI','G1A018058',NULL,NULL,NULL,NULL,'2021-02-22 20:39:33',NULL),(50,52,4,'NORA ANGELLA','G1A018059',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(51,53,4,'EVA NURMALASARI','G1A018060',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(52,54,4,'RAHMAD ALNASIMAN','G1A018061',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(53,55,4,'RYAN FERNANDA','G1A018062',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(54,56,4,'MUHAMMAD FARABIE','G1A018063',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(55,57,4,'GUSMAN WIJAYA','G1A018064',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(56,58,4,'DANNY BRANTADIKARA','G1A018065',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(57,59,4,'NUR ANNISA APRILIANI HERMAN PUTRI','G1A018066',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(58,60,4,'MUHAMMAD REYHAN FIRDAUS','G1A018067',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(59,61,4,'FARREL ALIFYANDRA AKBAR','G1A018068',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(60,62,4,'WIGO ARYAGUNA','G1A018071',NULL,NULL,NULL,NULL,'2021-02-22 20:39:34',NULL),(61,63,4,'NATHASSJA ZHAFIRA KESUMA','G1A018072',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(62,64,4,'DEA FANIA','G1A018073',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(63,65,4,'MUHAMMAD PRATAMA HIDAYATULLAH','G1A018074',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(64,66,4,'IFFAN ALFITZIKI RAHMADANI','G1A018075',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(65,67,4,'FERNANDO FERDYANSYAH','G1A018076',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(66,68,4,'TRI ANNISA GUSTYANINGRUM','G1A018077',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(67,69,4,'NABILAH GHINANTI SUCI','G1A018078',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(68,70,4,'ACHMAD RILWANUL IZZATI','G1A018079',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(69,71,4,'ELLEN THERESIA  NADEAK','G1A018080',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(70,72,4,'M. AKBAR MAULANA','G1A018081',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(71,73,4,'FERDIANSYAH ASYRAF RIZQULLAH','G1A018082',NULL,NULL,NULL,NULL,'2021-02-22 20:39:35',NULL),(72,74,4,'MUHAMMAD AFIF AL YAQHZAN','G1A018083',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(73,75,4,'IQBAL MUHAMMAD GIBRAN','G1A018084',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(74,76,4,'MEYZAN AL YUTRA','G1A018086',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(75,77,4,'DWI LESTARI','G1A018087',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(76,78,4,'NORIZAM AG PRATAMA','G1A018088',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(77,79,4,'ELVINA SALSABILA','G1A018089',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(78,80,4,'MUHAMMAD HAMZAH ASYRAF','G1A018090',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(79,81,4,'RAJU WAHYUDI PRATAMA','G1A018091',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(80,82,4,'NURSITA','G1A018092',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(81,83,4,'WAHYU SYAHPUTRA','G1A018093',NULL,NULL,NULL,NULL,'2021-02-22 20:39:36',NULL),(82,84,3,'Ismiranda Syahfitri ','G1A019001',NULL,NULL,NULL,NULL,'2021-02-22 20:39:56',NULL),(83,85,3,'Yusuf Nasrulloh ','G1A019002',NULL,NULL,NULL,NULL,'2021-02-22 20:39:56',NULL),(84,86,3,'Firsti Eliora ','G1A019003',NULL,NULL,NULL,NULL,'2021-02-22 20:39:56',NULL),(85,87,3,'Ninda Puji Lestari ','G1A019005',NULL,NULL,NULL,NULL,'2021-02-22 20:39:56',NULL),(86,88,3,'Astuti Zahrroh ','G1A019006',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(87,89,3,'Renti Epana Sari ','G1A019007',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(88,90,3,'Balqis Nabila Aulia Putri ','G1A019008',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(89,91,3,'Wahyu Dwi Prasetio ','G1A019010',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(90,92,3,'Yahya Masykur Nurhamdi ','G1A019011',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(91,93,3,'Fedryanto Dartiko ','G1A019012',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(92,94,3,'Mufti Restu Mahesa ','G1A019014',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(93,95,3,'Febrianto Ramandes ','G1A019015',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(94,96,3,'Ridha Nafila ','G1A019017',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(95,97,3,'Rizki Gusmanto ','G1A019018',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(96,98,3,'Desi Ade Winda ','G1A019020',NULL,NULL,NULL,NULL,'2021-02-22 20:39:57',NULL),(97,99,3,'Muflihatun Robingah ','G1A019021',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(98,100,3,'Dewi Silvia Panjaitan ','G1A019022',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(99,101,3,'Adam idham r ','G1A019023',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(100,102,3,'Muhammad Gusfach Afrialdho Utama ','G1A019024',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(101,103,3,'Rifqi Naufal','G1A019025',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(102,104,3,'Aisyah Amalia Af ','G1A019026',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(103,105,3,'Daffa Khoiri ','G1A019027',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(104,106,3,'Muhammad Naufal Fahrezi ','G1A019028',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(105,107,3,'Rivaldi Arta Wijaya ','G1A019029',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(106,108,3,'Andrei Jonior Gustari ','G1A019030',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(107,109,3,'M.Pandu Patana ','G1A019031',NULL,NULL,NULL,NULL,'2021-02-22 20:39:58',NULL),(108,110,3,'Aidil syadam radihan ','G1A019032',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(109,111,3,'Muhammad Daffa Alfajri ','G1A019033',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(110,112,3,'Adde Nanda Caesario Putra ','G1A019034',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(111,113,3,'Febby novriananda putri ','G1A019035',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(112,114,3,'Yusni Meihesa ','G1A019036',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(113,115,3,'Muhammad Fajrianto ','G1A019037',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(114,116,3,'Diyah ishita azaharah ','G1A019038',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(115,117,3,'Sindhi Vinata ','G1A019039',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(116,118,3,'Hafidz M Wirawan ','G1A019040',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(117,119,3,'Faridho Catur Pamungkas ','G1A019041',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(118,120,3,'Gita Dwi Putriani ','G1A019042',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(119,121,3,'Siti Rochika Qori ','G1A019044',NULL,NULL,NULL,NULL,'2021-02-22 20:39:59',NULL),(120,122,3,'Ikhsan Adi Nugroho ','G1A019046',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(121,123,3,'Ahmad Faris ','G1A019047',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(122,124,3,'Refki Jorgi Pradana','G1A019048',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(123,125,3,'Bryan pasaribu ','G1A019049',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(124,126,3,'Gabriel Ananthasadewa ','G1A019050',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(125,127,3,'Jessy mandasari','G1A019051',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(126,128,3,'Hanan Raihana ','G1A019054',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(127,129,3,'Adha Dont Differatama ','G1A019055',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(128,130,3,'Agung Tri Saputra ','G1A019056',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(129,131,3,'Muhammad Rizki Fadilah ','G1A019057',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(130,132,3,'Miranda Tiara Sella ','G1A019059',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(131,133,3,'Abrar Abe Mujaddid ','G1A019060',NULL,NULL,NULL,NULL,'2021-02-22 20:40:00',NULL),(132,134,3,'Martin Mulyo Syahidin ','G1A019061',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(133,135,3,'Muhammad Wijaya Permana ','G1A019062',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(134,136,3,'Shaddam Muhammad Iqbal ','G1A019063',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(135,137,3,'Rhedo Francesco ','G1A019064',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(136,138,3,'Joi Pebrianty Hasian Lumbanraja ','G1A019065',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(137,139,3,'Randi Julian Saputra ','G1A019066',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(138,140,3,'Rolin Sanjaya Tamba ','G1A019068',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(139,141,3,'Muhammad Aulia Abdurrahman ','G1A019071',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(140,142,3,'Hendra Yesekyel Pangaribuan ','G1A019072',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(141,143,3,'Krisna Wahyudi ','G1A019073',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(142,144,3,'Nabilatul Balqis ','G1A019074',NULL,NULL,NULL,NULL,'2021-02-22 20:40:01',NULL),(143,145,3,'Firmansyah Alfarisi ','G1A019075',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(144,146,3,'Murfid Aqil ','G1A019076',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(145,147,3,'Muhammad Ikhsan Prasanidirta','G1A019077',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(146,148,3,'Rasya ratu meilani ','G1A019078',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(147,149,3,'Reza Utami ','G1A019080',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(148,150,3,'Annisa Kurniati ','G1A019081',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(149,151,3,'Alfath Arif Rizkullah','G1A019082',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(150,152,3,'Berlian Tri Saputra ','G1A019083',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(151,153,3,'Nofa Rima Yanti Nasution ','G1A019084',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(152,154,3,'Yogi Pratama ','G1A019085',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(153,155,3,'Rizky Aruni ','G1A019086',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(154,156,3,'Alan Syahlan Santriago ','G1A019088',NULL,NULL,NULL,NULL,'2021-02-22 20:40:02',NULL),(155,157,3,'Muhammad Rizky Aditya ','G1A019089',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(156,158,3,'Muhammad Ighfary Triputra ','G1A019090',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(157,159,3,' Muhammad Fikri Hidayatullah ','G1A019091',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(158,160,3,'Okto Redo ','G1A019092',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(159,161,3,'Nadila Zumitia Putri ','G1A019093',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(160,162,3,'Rizkianda Rahmansyah ','G1A019094',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(161,163,3,'Muhammad Alif Fachriansyah ','G1A019095',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(162,164,3,'Agung Rahmatsyah ','G1A019096',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(163,165,3,'Muhammad Syah Ramadani ','G1A019097',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(164,166,3,'Rahwini Harpa Helda ','G1A019098',NULL,NULL,NULL,NULL,'2021-02-22 20:40:03',NULL),(165,167,2,'Annisakina','G1A020001',NULL,NULL,NULL,NULL,'2021-02-22 20:40:17',NULL),(166,168,2,'Desi Fitria','G1A020002',NULL,NULL,NULL,NULL,'2021-02-22 20:40:17',NULL),(167,169,2,'Dzaky Faishalariq','G1A020003',NULL,NULL,NULL,NULL,'2021-02-22 20:40:17',NULL),(168,170,2,'Muhammad Ikhsanul Fiqri','G1A020004',NULL,NULL,NULL,NULL,'2021-02-22 20:40:17',NULL),(169,171,2,'M. Jumli Gazali','G1A020005',NULL,NULL,NULL,NULL,'2021-02-22 20:40:17',NULL),(170,172,2,'Ejiman Saputra','G1A020006',NULL,NULL,NULL,NULL,'2021-02-22 20:40:17',NULL),(171,173,2,'Muhammad Wahfi Udin','G1A020007',NULL,NULL,NULL,NULL,'2021-02-22 20:40:17',NULL),(172,174,2,'Muhammad Farchan Al Rahman','G1A020008',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(173,175,2,'Fadilla Mardini Kencana','G1A020009',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(174,176,2,'Silvia Rahma','G1A020010',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(175,177,2,'Ahmad Habibi','G1A020011',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(176,178,2,'Ghina Salsabila Putri','G1A020012',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(177,179,2,'Nabila Aulya Zalfa Putri','G1A020013',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(178,180,2,'Muhammad Nazly Firman Alfariz','G1A020014',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(179,181,2,'Aprieza Putri Salsabila','G1A020015',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(180,182,2,'Salsabila Adisty','G1A020016',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(181,183,2,'Wellaostul Azizah','G1A020017',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(182,184,2,'Exca Wella Monica','G1A020018',NULL,NULL,NULL,NULL,'2021-02-22 20:40:18',NULL),(183,185,2,'Ahmad Sopran','G1A020020',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(184,186,2,'Valleryan Virgil Zuliuskandar','G1A020021',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(185,187,2,'Aditio Pratama','G1A020022',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(186,188,2,'Rifki Dian Fitra','G1A020023',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(187,189,2,'Agnes Vera Nika','G1A020024',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(188,190,2,'Wiwit Selasti','G1A020025',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(189,191,2,'Dede Revanza','G1A020026',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(190,192,2,'Hizkia Tigor Sihotang','G1A020027',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(191,193,2,'Widya Nurul Huda','G1A020028',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(192,194,2,'Syafrizza Aulia Marizky','G1A020029',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(193,195,2,'Dania Dwi Safitri','G1A020030',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(194,196,2,'Kharisma Nur Azizah','G1A020031',NULL,NULL,NULL,NULL,'2021-02-22 20:40:19',NULL),(195,197,2,'Azvadennys Vasiguhamiaz','G1A020032',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(196,198,2,'Icha Dwi Aprilia Herani','G1A020033',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(197,199,2,'Rahmita Dwi Kurnia','G1A020034',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(198,200,2,'Muhadzib Nursaid','G1A020035',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(199,201,2,'Fadhilla Ilham Robbani','G1A020036',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(200,202,2,'M. Radhy Afif Lubis','G1A020037',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(201,203,2,'Putri Kartika','G1A020038',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(202,204,2,'Gilang Ramadhan','G1A020039',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(203,205,2,'Wahyu Ramadhani','G1A020040',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(204,206,2,'Dwinta Septiana','G1A020041',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(205,207,2,'Muhammad Assabillah','G1A020042',NULL,NULL,NULL,NULL,'2021-02-22 20:40:20',NULL),(206,208,2,'Frisca Dini','G1A020044',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(207,209,2,'Robby Mahendra','G1A020045',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(208,210,2,'Khalid Alrijali','G1A020046',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(209,211,2,'M. Hilmi Mubarok','G1A020047',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(210,212,2,'Rhoulan Dhamar Wanto','G1A020048',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(211,213,2,'Ryfaldi Manuel Nainggolan','G1A020049',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(212,214,2,'Kms. Muhammad Ridho','G1A020050',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(213,215,2,'Lusiya Melda Putri','G1A020051',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(214,216,2,'Muhammad Ikhsan Eza Hattami','G1A020052',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(215,217,2,'Arya Satya Ardiansyah','G1A020054',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(216,218,2,'Kerin Laurensyah Yudistira','G1A020055',NULL,NULL,NULL,NULL,'2021-02-22 20:40:21',NULL),(217,219,2,'Aqmal Tustri Kinanty','G1A020056',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(218,220,2,'Destri wahyuni saragih','G1A020057',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(219,221,2,'Liski Barjunta Bellsi','G1A020060',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(220,222,2,'Dicky Pratama','G1A020061',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(221,223,2,'Muhammad Royhan Nuristiyono','G1A020062',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(222,224,2,'Rizky Cakra Mandala','G1A020063',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(223,225,2,'Novsatriadi Iqbal','G1A020065',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(224,226,2,'Andre yulidiantoni','G1A020066',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(225,227,2,'Arif Rachman Setiawan','G1A020067',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(226,228,2,'Asih Mulyati','G1A020068',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(227,229,2,'Andre Wendi Anto','G1A020069',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(228,230,2,'Haekal Yanuarsyah','G1A020070',NULL,NULL,NULL,NULL,'2021-02-22 20:40:22',NULL),(229,231,2,'Bagus Angrea Putra','G1A020071',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(230,232,2,'Alya siti raihani','G1A020072',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(231,233,2,'Daffa Jesil Syaputra','G1A020073',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(232,234,2,'Gilang Rahmat Fadhilla','G1A020074',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(233,235,2,'Putri Aisyah Fatmawati','G1A020075',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(234,236,2,'Aulia Salsabyla Baladewa','G1A020076',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(235,237,2,'Raisya Ghina Inayah','G1A020077',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(236,238,2,'Lorensia Novena Artha Putri','G1A020079',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(237,239,2,'Nabila Gita Fitria','G1A020080',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(238,240,2,'Seto abdi Nugroho','G1A020081',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(239,241,2,'Swastomo Sabarno','G1A020082',NULL,NULL,NULL,NULL,'2021-02-22 20:40:23',NULL),(240,242,2,'Dea Zillan Zalilah','G1A020083',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(241,243,2,'Daffa Bagus Prayudha','G1A020084',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(242,244,2,'Muhammad Arif Al Ghozali','G1A020085',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(243,245,2,'Rangga Aditya Melinco','G1A020086',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(244,246,2,'Ferdian Rizki Ananda','G1A020087',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(245,247,2,'Arif Rahman Hakim','G1A020088',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(246,248,2,'Yusuf Pratama Nurcholik','G1A020089',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(247,249,2,'Muhammad Afiq Fachri','G1A020090',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(248,250,2,'Rastri Pratidina','G1A020091',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(249,251,2,'Sian Nadao Sinaga','G1A020092',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(250,252,2,'Muhammad Naufal Rofif','G1A020093',NULL,NULL,NULL,NULL,'2021-02-22 20:40:24',NULL),(251,253,2,'Putri Riza Umami','G1A020094',NULL,NULL,NULL,NULL,'2021-02-22 20:40:25',NULL),(252,254,2,'Muhammad Willdhan Arya Putra','G1A020095',NULL,NULL,NULL,NULL,'2021-02-22 20:40:25',NULL),(253,255,2,'Evlin Sitanggang','G1A020096',NULL,NULL,NULL,NULL,'2021-02-22 20:40:25',NULL),(254,256,2,'Andhika Amarullah','G1A020097',NULL,NULL,NULL,NULL,'2021-02-22 20:40:25',NULL),(255,257,2,'Wiki Netra Juansyah','G1A020098',NULL,NULL,NULL,NULL,'2021-02-22 20:40:25',NULL),(256,258,2,'Widya Zara Saputri','G1A020101',NULL,NULL,NULL,NULL,'2021-02-22 20:40:25',NULL),(257,259,2,'Wieke Arianty','G1A020102',NULL,NULL,NULL,NULL,'2021-02-22 20:40:25',NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2020_12_10_103301_create_media_table',1),(10,'2020_12_10_151032_create_settings_table',1),(11,'2020_12_17_122710_create_divisions_table',1),(12,'2020_12_18_042432_create_periods_table',1),(13,'2020_12_18_151530_create_forces_table',1),(14,'2020_12_18_153544_add_year_to_forces_table',1),(15,'2020_12_19_015615_create_positions_table',1),(16,'2020_12_19_054429_create_members_table',1),(17,'2020_12_19_110517_create_staff_table',1),(18,'2020_12_19_132000_add_division_id_to_positions_table',1),(19,'2020_12_19_133822_drop_parent_id_from_positions_table',1),(20,'2020_12_19_140533_add_order_level_to_positions_table',1),(21,'2020_12_22_072600_create_forms_table',1),(22,'2020_12_22_085315_create_form_questions_table',1),(23,'2020_12_29_141527_add_publish_at_to_forms_table',1),(24,'2020_12_30_072259_create_form_answers_table',1),(25,'2020_12_30_073101_create_form_question_answers_table',1),(26,'2021_01_12_155428_add_slug_to_forms_table',1),(27,'2021_01_12_160341_add_bitly_link_to_forms_table',1),(28,'2021_01_26_051413_rename_forms_table_columns',1),(29,'2021_01_28_141822_add_is_over_date_to_form_answers_table',1),(30,'2021_01_28_153702_add_user_id_to_members_table',1),(31,'2021_01_29_011419_create_social_auths_table',1),(32,'2021_02_04_001011_create_permission_tables',1),(33,'2021_02_06_095719_add_label_column_to_roles_table',1),(34,'2021_02_06_095844_add_label_column_to_permissions_table',1),(35,'2021_02_07_045330_add_soft_delete_to_users_table',1),(36,'2021_02_09_071902_create_blog_categories_table',1),(37,'2021_02_09_092030_create_blog_posts_table',1),(38,'2021_02_09_130156_create_blog_post_categories_table',1),(39,'2021_02_10_045636_create_blog_comments_table',1),(40,'2021_02_14_151127_create_picture_galleries_table',1),(41,'2021_02_14_151934_create_gallery_categories_table',1),(42,'2021_02_14_152118_create_picture_gallery_categories_table',1),(43,'2021_02_15_110242_add_status_to_picture_galleries_table',1),(44,'2021_02_16_020010_add_display_to_gallery_categories_table',1),(45,'2021_02_23_083559_add_role_name_to_positions_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(5,'App\\Models\\User',31),(6,'App\\Models\\User',49),(7,'App\\Models\\User',3),(7,'App\\Models\\User',77),(8,'App\\Models\\User',46),(9,'App\\Models\\User',26),(9,'App\\Models\\User',44),(9,'App\\Models\\User',55),(9,'App\\Models\\User',67),(9,'App\\Models\\User',68),(9,'App\\Models\\User',71),(9,'App\\Models\\User',75),(9,'App\\Models\\User',79),(10,'App\\Models\\User',4),(10,'App\\Models\\User',6),(10,'App\\Models\\User',9),(10,'App\\Models\\User',10),(10,'App\\Models\\User',11),(10,'App\\Models\\User',13),(10,'App\\Models\\User',19),(10,'App\\Models\\User',21),(10,'App\\Models\\User',22),(10,'App\\Models\\User',23),(10,'App\\Models\\User',24),(10,'App\\Models\\User',30),(10,'App\\Models\\User',32),(10,'App\\Models\\User',34),(10,'App\\Models\\User',42),(10,'App\\Models\\User',43),(10,'App\\Models\\User',52),(10,'App\\Models\\User',63),(10,'App\\Models\\User',66),(10,'App\\Models\\User',69),(10,'App\\Models\\User',73),(10,'App\\Models\\User',76),(10,'App\\Models\\User',83),(10,'App\\Models\\User',87),(10,'App\\Models\\User',91),(10,'App\\Models\\User',93),(10,'App\\Models\\User',96),(10,'App\\Models\\User',97),(10,'App\\Models\\User',103),(10,'App\\Models\\User',105),(10,'App\\Models\\User',110),(10,'App\\Models\\User',114),(10,'App\\Models\\User',117),(10,'App\\Models\\User',120),(10,'App\\Models\\User',125),(10,'App\\Models\\User',127),(10,'App\\Models\\User',128),(10,'App\\Models\\User',129),(10,'App\\Models\\User',131),(10,'App\\Models\\User',132),(10,'App\\Models\\User',134),(10,'App\\Models\\User',143),(10,'App\\Models\\User',145),(10,'App\\Models\\User',147),(10,'App\\Models\\User',151),(10,'App\\Models\\User',159),(11,'App\\Models\\User',4),(11,'App\\Models\\User',5),(11,'App\\Models\\User',6),(11,'App\\Models\\User',7),(11,'App\\Models\\User',8),(11,'App\\Models\\User',9),(11,'App\\Models\\User',10),(11,'App\\Models\\User',11),(11,'App\\Models\\User',12),(11,'App\\Models\\User',13),(11,'App\\Models\\User',14),(11,'App\\Models\\User',15),(11,'App\\Models\\User',16),(11,'App\\Models\\User',17),(11,'App\\Models\\User',18),(11,'App\\Models\\User',19),(11,'App\\Models\\User',20),(11,'App\\Models\\User',21),(11,'App\\Models\\User',22),(11,'App\\Models\\User',23),(11,'App\\Models\\User',24),(11,'App\\Models\\User',25),(11,'App\\Models\\User',26),(11,'App\\Models\\User',27),(11,'App\\Models\\User',28),(11,'App\\Models\\User',29),(11,'App\\Models\\User',30),(11,'App\\Models\\User',31),(11,'App\\Models\\User',32),(11,'App\\Models\\User',33),(11,'App\\Models\\User',34),(11,'App\\Models\\User',35),(11,'App\\Models\\User',36),(11,'App\\Models\\User',37),(11,'App\\Models\\User',38),(11,'App\\Models\\User',39),(11,'App\\Models\\User',40),(11,'App\\Models\\User',41),(11,'App\\Models\\User',42),(11,'App\\Models\\User',43),(11,'App\\Models\\User',44),(11,'App\\Models\\User',45),(11,'App\\Models\\User',46),(11,'App\\Models\\User',47),(11,'App\\Models\\User',48),(11,'App\\Models\\User',49),(11,'App\\Models\\User',50),(11,'App\\Models\\User',51),(11,'App\\Models\\User',52),(11,'App\\Models\\User',53),(11,'App\\Models\\User',54),(11,'App\\Models\\User',55),(11,'App\\Models\\User',56),(11,'App\\Models\\User',57),(11,'App\\Models\\User',58),(11,'App\\Models\\User',59),(11,'App\\Models\\User',60),(11,'App\\Models\\User',61),(11,'App\\Models\\User',62),(11,'App\\Models\\User',63),(11,'App\\Models\\User',64),(11,'App\\Models\\User',65),(11,'App\\Models\\User',66),(11,'App\\Models\\User',67),(11,'App\\Models\\User',68),(11,'App\\Models\\User',69),(11,'App\\Models\\User',70),(11,'App\\Models\\User',71),(11,'App\\Models\\User',72),(11,'App\\Models\\User',73),(11,'App\\Models\\User',74),(11,'App\\Models\\User',75),(11,'App\\Models\\User',76),(11,'App\\Models\\User',77),(11,'App\\Models\\User',78),(11,'App\\Models\\User',79),(11,'App\\Models\\User',80),(11,'App\\Models\\User',81),(11,'App\\Models\\User',82),(11,'App\\Models\\User',83),(11,'App\\Models\\User',84),(11,'App\\Models\\User',85),(11,'App\\Models\\User',86),(11,'App\\Models\\User',87),(11,'App\\Models\\User',88),(11,'App\\Models\\User',89),(11,'App\\Models\\User',90),(11,'App\\Models\\User',91),(11,'App\\Models\\User',92),(11,'App\\Models\\User',93),(11,'App\\Models\\User',94),(11,'App\\Models\\User',95),(11,'App\\Models\\User',96),(11,'App\\Models\\User',97),(11,'App\\Models\\User',98),(11,'App\\Models\\User',99),(11,'App\\Models\\User',100),(11,'App\\Models\\User',101),(11,'App\\Models\\User',102),(11,'App\\Models\\User',103),(11,'App\\Models\\User',104),(11,'App\\Models\\User',105),(11,'App\\Models\\User',106),(11,'App\\Models\\User',107),(11,'App\\Models\\User',108),(11,'App\\Models\\User',109),(11,'App\\Models\\User',110),(11,'App\\Models\\User',111),(11,'App\\Models\\User',112),(11,'App\\Models\\User',113),(11,'App\\Models\\User',114),(11,'App\\Models\\User',115),(11,'App\\Models\\User',116),(11,'App\\Models\\User',117),(11,'App\\Models\\User',118),(11,'App\\Models\\User',119),(11,'App\\Models\\User',120),(11,'App\\Models\\User',121),(11,'App\\Models\\User',122),(11,'App\\Models\\User',123),(11,'App\\Models\\User',124),(11,'App\\Models\\User',125),(11,'App\\Models\\User',126),(11,'App\\Models\\User',127),(11,'App\\Models\\User',128),(11,'App\\Models\\User',129),(11,'App\\Models\\User',130),(11,'App\\Models\\User',131),(11,'App\\Models\\User',132),(11,'App\\Models\\User',133),(11,'App\\Models\\User',134),(11,'App\\Models\\User',135),(11,'App\\Models\\User',136),(11,'App\\Models\\User',137),(11,'App\\Models\\User',138),(11,'App\\Models\\User',139),(11,'App\\Models\\User',140),(11,'App\\Models\\User',141),(11,'App\\Models\\User',142),(11,'App\\Models\\User',143),(11,'App\\Models\\User',144),(11,'App\\Models\\User',145),(11,'App\\Models\\User',146),(11,'App\\Models\\User',147),(11,'App\\Models\\User',148),(11,'App\\Models\\User',149),(11,'App\\Models\\User',150),(11,'App\\Models\\User',151),(11,'App\\Models\\User',152),(11,'App\\Models\\User',153),(11,'App\\Models\\User',154),(11,'App\\Models\\User',155),(11,'App\\Models\\User',156),(11,'App\\Models\\User',157),(11,'App\\Models\\User',158),(11,'App\\Models\\User',159),(11,'App\\Models\\User',160),(11,'App\\Models\\User',161),(11,'App\\Models\\User',162),(11,'App\\Models\\User',163),(11,'App\\Models\\User',164),(11,'App\\Models\\User',165),(11,'App\\Models\\User',166),(11,'App\\Models\\User',167),(11,'App\\Models\\User',168),(11,'App\\Models\\User',169),(11,'App\\Models\\User',170),(11,'App\\Models\\User',171),(11,'App\\Models\\User',172),(11,'App\\Models\\User',173),(11,'App\\Models\\User',174),(11,'App\\Models\\User',175),(11,'App\\Models\\User',176),(11,'App\\Models\\User',177),(11,'App\\Models\\User',178),(11,'App\\Models\\User',179),(11,'App\\Models\\User',180),(11,'App\\Models\\User',181),(11,'App\\Models\\User',182),(11,'App\\Models\\User',183),(11,'App\\Models\\User',184),(11,'App\\Models\\User',185),(11,'App\\Models\\User',186),(11,'App\\Models\\User',187),(11,'App\\Models\\User',188),(11,'App\\Models\\User',189),(11,'App\\Models\\User',190),(11,'App\\Models\\User',191),(11,'App\\Models\\User',192),(11,'App\\Models\\User',193),(11,'App\\Models\\User',194),(11,'App\\Models\\User',195),(11,'App\\Models\\User',196),(11,'App\\Models\\User',197),(11,'App\\Models\\User',198),(11,'App\\Models\\User',199),(11,'App\\Models\\User',200),(11,'App\\Models\\User',201),(11,'App\\Models\\User',202),(11,'App\\Models\\User',203),(11,'App\\Models\\User',204),(11,'App\\Models\\User',205),(11,'App\\Models\\User',206),(11,'App\\Models\\User',207),(11,'App\\Models\\User',208),(11,'App\\Models\\User',209),(11,'App\\Models\\User',210),(11,'App\\Models\\User',211),(11,'App\\Models\\User',212),(11,'App\\Models\\User',213),(11,'App\\Models\\User',214),(11,'App\\Models\\User',215),(11,'App\\Models\\User',216),(11,'App\\Models\\User',217),(11,'App\\Models\\User',218),(11,'App\\Models\\User',219),(11,'App\\Models\\User',220),(11,'App\\Models\\User',221),(11,'App\\Models\\User',222),(11,'App\\Models\\User',223),(11,'App\\Models\\User',224),(11,'App\\Models\\User',225),(11,'App\\Models\\User',226),(11,'App\\Models\\User',227),(11,'App\\Models\\User',228),(11,'App\\Models\\User',229),(11,'App\\Models\\User',230),(11,'App\\Models\\User',231),(11,'App\\Models\\User',232),(11,'App\\Models\\User',233),(11,'App\\Models\\User',234),(11,'App\\Models\\User',235),(11,'App\\Models\\User',236),(11,'App\\Models\\User',237),(11,'App\\Models\\User',238),(11,'App\\Models\\User',239),(11,'App\\Models\\User',240),(11,'App\\Models\\User',241),(11,'App\\Models\\User',242),(11,'App\\Models\\User',243),(11,'App\\Models\\User',244),(11,'App\\Models\\User',245),(11,'App\\Models\\User',246),(11,'App\\Models\\User',247),(11,'App\\Models\\User',248),(11,'App\\Models\\User',249),(11,'App\\Models\\User',250),(11,'App\\Models\\User',251),(11,'App\\Models\\User',252),(11,'App\\Models\\User',253),(11,'App\\Models\\User',254),(11,'App\\Models\\User',255),(11,'App\\Models\\User',256),(11,'App\\Models\\User',257),(11,'App\\Models\\User',258),(11,'App\\Models\\User',259);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('2b91a7e241cb59f734a34019fddbc365d5133b553b1d9d0ccf9461c1d4f0eb6c5182b5792219eed8',49,1,'Personal Access Token','[]',0,'2021-02-23 01:48:29','2021-02-23 01:48:29','2022-02-23 08:48:29'),('4a65cab28b06c1e44db1a5d6db35ae4f9cc5fde541914267e759e025ceda97dcdc34c7960da05025',2,1,'Personal Access Token','[]',0,'2021-02-23 01:45:33','2021-02-23 01:45:33','2022-02-23 08:45:33'),('57ad5df9d7ed905738323c813a02533ef8bb23c2bc9b95c3844a165db05eb17c2ff864daff3cee39',3,1,'Personal Access Token','[]',0,'2021-02-22 20:28:15','2021-02-22 20:28:15','2022-02-23 03:28:15'),('674d173fadbb354b64253acacd4b1dbd494912903c13c2aa854db490cc6e87f4a24f06b6f758ae36',31,1,'Personal Access Token','[]',0,'2021-02-23 01:32:05','2021-02-23 01:32:05','2022-02-23 08:32:05'),('7ab8a0f8c228e05e608a412464f7c697afb73dc72fb04f23b56943b8c7665d9c7797261d9deb2838',3,1,'Personal Access Token','[]',0,'2021-02-23 01:29:15','2021-02-23 01:29:15','2022-02-23 08:29:15'),('7e3ede39a5cb0bae756488c8046df9145161dcc852b61ae736121321355b64ab165d01ef28336c33',77,1,'Personal Access Token','[]',0,'2021-02-23 02:31:22','2021-02-23 02:31:22','2022-02-23 09:31:22'),('7f51456c82b8ec11c62290df69670977349c8fc93bcdbe8f3651878148429087e9b2d61ba6dab750',71,1,'Personal Access Token','[]',0,'2021-02-23 01:52:09','2021-02-23 01:52:09','2022-02-23 08:52:09'),('9763b53b552f74aa1aa68525cf49e6937559d34d5b944aefe298be82bc5e95743316ec0b9eea6470',3,1,'Personal Access Token','[]',0,'2021-02-22 20:20:25','2021-02-22 20:20:25','2022-02-23 03:20:25'),('b990d50f96923039134e917785653504b09460fc5f2009709ed40c8557ef9c46954802864020b8b7',46,1,'Personal Access Token','[]',0,'2021-02-23 01:49:32','2021-02-23 01:49:32','2022-02-23 08:49:32'),('d8def20ee9626231ec034d7e37f6ef16ffb6453b5e1da561d7aebd7aef4f16128530146cba184107',77,1,'Personal Access Token','[]',0,'2021-02-23 01:44:34','2021-02-23 01:44:34','2022-02-23 08:44:34'),('fa5778b43d77d29a759199963a8ad827ffdda45ef6353e26db8a781c69bfe10e5c29c9fc20fcf233',31,1,'Personal Access Token','[]',0,'2021-02-23 01:46:28','2021-02-23 01:46:28','2022-02-23 08:46:28');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','BZkbvPCqwcKd6qtC5RPAMRxP39myBsnIBWu07Mtb',NULL,'http://localhost',1,0,0,'2021-02-22 20:17:41','2021-02-22 20:17:41'),(2,NULL,'Laravel Password Grant Client','UKTKmySaWV6I6ELof6ovxISv44tSkL6o0sNmM1cN','users','http://localhost',0,1,0,'2021-02-22 20:17:41','2021-02-22 20:17:41');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2021-02-22 20:17:41','2021-02-22 20:17:41');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `periods`
--

DROP TABLE IF EXISTS `periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periods`
--

LOCK TABLES `periods` WRITE;
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;
INSERT INTO `periods` VALUES (1,'2020 / 2021',1);
/*!40000 ALTER TABLE `periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create_user','Menambah User','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(2,'read_user','Melihat User','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(3,'update_user','Mengubah User','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(4,'delete_user','Menghapus User','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(5,'create_site_setting','Menambah Pengaturan Situs','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(6,'read_site_setting','Melihat Pengaturan Situs','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(7,'update_site_setting','Mengubah User','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(8,'delete_site_setting','Menghapus Pengaturan Situs','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(9,'create_blog_post','Menambah Posting Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(10,'read_blog_post','Melihat Posting Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(11,'update_blog_post','Mengubah Posting Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(12,'delete_blog_post','Menghapus Posting Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(13,'create_blog_category','Menambah Kategori Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(14,'read_blog_category','Melihat Kategori Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(15,'update_blog_category','Mengubah Kategori Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(16,'delete_blog_category','Menghapus Kategori Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(17,'create_blog_comment','Menambah Komentar Posting Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(18,'read_blog_comment','Melihat Komentar Posting Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(19,'update_blog_comment','Mengubah Komentar Posting BLog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(20,'delete_blog_comment','Menghapus Komentar Posting Blog','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(21,'create_member','Menambah Anggota','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(22,'read_member','Melihat Anggota','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(23,'update_member','Mengubah Anggota','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(24,'delete_member','Menghapus Anggota','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(25,'create_period','Menambah Periode','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(26,'read_period','Melihat Periode','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(27,'update_period','Mengubah Periode','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(28,'delete_period','Menghapus Periode','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(29,'create_force','Menambah Angkatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(30,'read_force','Melihat Angkatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(31,'update_force','Mengubah Angkatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(32,'delete_force','Menghapus Angkatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(33,'create_division','Menambah Divisi','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(34,'read_division','Melihat Divisi','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(35,'update_division','Mengubah Divisi','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(36,'delete_division','Menghapus Divisi','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(37,'create_position','Menambah Jabatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(38,'read_position','Melihat Jabatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(39,'update_position','Mengubah Jabatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(40,'delete_position','Menghapus Jabatan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(41,'create_staff','Menambah Pengurus / Staff','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(42,'read_staff','Melihat Pengurus / Staff','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(43,'update_staff','Mengubah Pengurus / Staff','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(44,'delete_staff','Menghapus Pengurus / Staff','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(45,'create_mail','Menambah Surat Menyurat','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(46,'read_mail','Melihat Surat Menyurat','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(47,'update_mail','Mengubah Surat Menyurat','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(48,'delete_mail','Menghapus Surat Menyurat','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(49,'create_inventory','Menambah Inventaris','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(50,'read_inventory','Melihat Inventaris','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(51,'update_inventory','Mengubah Inventaris','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(52,'delete_inventory','Menghapus Inventaris','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(53,'create_finance','Menambah Keuangan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(54,'read_finance','Melihat Keuangan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(55,'update_finance','Mengubah Keuangan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(56,'delete_finance','Menghapus Keuangan','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(57,'create_form','Menambah Formulir','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(58,'read_form','Melihat Formulir','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(59,'update_form','Mengubah Formulir','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(60,'delete_form','Menghapus Formulir','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(61,'create_archive','Menambah File dan Arsip','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(62,'read_archive','Melihat File dan Arsip','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(63,'update_archive','Mengubah File dan Arsip','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(64,'delete_archive','Menghapus File dan Arsip','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(65,'create_gallery','Menambah Galeri Foto','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(66,'read_gallery','Melihat Galeri Foto','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(67,'update_gallery','Mengubah Galeri Foto','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(68,'delete_gallery','Menghapus Galeri Foto','web','2021-02-22 20:19:56','2021-02-22 20:19:56');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture_galleries`
--

DROP TABLE IF EXISTS `picture_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'publish' COMMENT 'status|draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `picture_galleries_user_id_index` (`user_id`),
  CONSTRAINT `picture_galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture_galleries`
--

LOCK TABLES `picture_galleries` WRITE;
/*!40000 ALTER TABLE `picture_galleries` DISABLE KEYS */;
INSERT INTO `picture_galleries` VALUES (1,77,'Wallpaper',NULL,'publish','2021-02-23 03:19:56','2021-02-23 03:22:13',NULL);
/*!40000 ALTER TABLE `picture_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture_gallery_categories`
--

DROP TABLE IF EXISTS `picture_gallery_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture_gallery_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `gallery_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `picture_gallery_categories_category_id_index` (`category_id`),
  KEY `picture_gallery_categories_gallery_id_index` (`gallery_id`),
  CONSTRAINT `picture_gallery_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `gallery_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `picture_gallery_categories_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `picture_galleries` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture_gallery_categories`
--

LOCK TABLES `picture_gallery_categories` WRITE;
/*!40000 ALTER TABLE `picture_gallery_categories` DISABLE KEYS */;
INSERT INTO `picture_gallery_categories` VALUES (1,2,1);
/*!40000 ALTER TABLE `picture_gallery_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `division_id` bigint(20) unsigned DEFAULT NULL,
  `order_level` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `positions_parent_id_index` (`parent_id`),
  KEY `positions_division_id_index` (`division_id`),
  CONSTRAINT `positions_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `positions_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,NULL,NULL,1,'Pembina','builder'),(2,NULL,NULL,2,'Ketua Umum','chairman'),(3,NULL,NULL,2,'Wakil Ketua Umum','vice_chairman'),(4,NULL,NULL,3,'Dewan Penasehat Organisasi','dpo'),(5,NULL,NULL,4,'Badan Pertimbangan Organisasi','bpo'),(6,NULL,NULL,5,'Sekretaris','secretary'),(7,NULL,NULL,5,'Bendahara','treasurer'),(8,NULL,NULL,6,'Biro Kestari','head_of_division'),(9,NULL,NULL,6,'Biro Dana Usaha','head_of_division'),(10,NULL,1,7,'Kepala Bidang Kerohanian','head_of_division'),(11,NULL,2,7,'Kepala Bidang Kewirausahaan','head_of_division'),(12,NULL,3,7,'Kepala Bidang Minat dan Bakat','head_of_division'),(13,NULL,4,7,'Kepala Bidang IT','head_of_division'),(14,NULL,5,7,'Kepala Bidang Pengabdian Masyarakat','head_of_division'),(15,NULL,6,7,'Kepala Bidang PSDM','head_of_division'),(16,10,1,8,'Anggota Bidang Kerohanian','staff'),(17,11,2,8,'Anggota Bidang Kewirausahaan','staff'),(18,12,3,8,'Anggota Bidang Minat dan Bakat','staff'),(19,13,4,8,'Anggota Bidang IT','staff'),(20,14,5,8,'Anggota Bidang Pengabdian Masyarakat','staff'),(21,15,6,8,'Anggota Bidang PSDM','staff');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(6,1),(6,5),(6,6),(6,7),(7,1),(7,5),(7,6),(7,7),(9,1),(9,2),(9,3),(9,4),(9,5),(9,6),(9,7),(9,8),(9,9),(9,10),(9,11),(10,1),(10,2),(10,3),(10,4),(10,5),(10,6),(10,7),(10,8),(10,9),(10,10),(10,11),(11,2),(11,3),(11,4),(11,5),(11,6),(11,7),(11,8),(11,9),(11,10),(11,11),(12,2),(12,3),(12,4),(12,5),(12,6),(12,7),(12,8),(12,9),(12,10),(12,11),(13,1),(13,7),(14,1),(14,2),(14,5),(14,6),(14,7),(14,8),(14,9),(14,10),(14,11),(15,1),(15,7),(16,1),(16,7),(18,1),(18,2),(18,5),(18,6),(18,7),(18,8),(18,9),(18,10),(18,11),(20,7),(21,7),(22,1),(22,2),(22,3),(22,4),(22,5),(22,6),(22,7),(22,9),(23,7),(24,7),(25,7),(26,1),(26,2),(26,3),(26,4),(26,5),(26,6),(26,7),(26,9),(27,7),(28,7),(29,7),(30,1),(30,2),(30,3),(30,4),(30,5),(30,6),(30,7),(30,9),(31,7),(32,7),(33,7),(34,1),(34,2),(34,3),(34,4),(34,5),(34,6),(34,7),(34,9),(35,7),(36,7),(37,7),(38,1),(38,2),(38,3),(38,4),(38,5),(38,6),(38,7),(38,9),(39,7),(40,7),(41,7),(42,1),(42,2),(42,3),(42,4),(42,5),(42,6),(42,7),(42,9),(43,7),(44,7),(45,7),(46,1),(46,2),(46,3),(46,4),(46,5),(46,6),(46,7),(47,7),(48,7),(49,7),(50,1),(50,2),(50,3),(50,4),(50,5),(50,6),(50,7),(50,8),(50,9),(50,10),(50,11),(51,7),(52,7),(53,8),(54,1),(54,2),(54,3),(54,4),(54,5),(54,6),(54,8),(55,8),(56,8),(57,7),(57,8),(57,9),(58,1),(58,2),(58,3),(58,4),(58,5),(58,6),(58,7),(58,8),(58,9),(59,7),(59,9),(60,7),(60,9),(61,5),(61,6),(61,7),(61,8),(61,9),(61,10),(62,1),(62,2),(62,3),(62,4),(62,5),(62,6),(62,7),(62,8),(62,9),(62,10),(63,5),(63,6),(63,7),(63,8),(63,9),(63,10),(64,5),(64,6),(64,7),(64,8),(64,9),(64,10),(65,7),(65,9),(66,1),(66,2),(66,3),(66,4),(66,5),(66,6),(66,7),(66,8),(66,9),(66,10),(66,11),(67,7),(67,9),(68,7),(68,9);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super_admin','Super Admin','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(2,'builder','Pembina','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(3,'dpo','Dewan Penasehat Organisasi','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(4,'bpo','Badan Penasehat Organisasi','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(5,'chairman','Ketua Umum','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(6,'vice_chairman','Wakil Ketua Umum','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(7,'secretary','Sekretaris','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(8,'treasurer','Bendahara','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(9,'head_of_division','Kepala Divisi','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(10,'staff','Pengurus / Staff','web','2021-02-22 20:19:56','2021-02-22 20:19:56'),(11,'member','Anggota','web','2021-02-22 20:19:56','2021-02-22 20:19:56');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'siteName','Himatif UNIB Official'),(2,'siteDescription','Website profil resmi Himpunan Mahasiswa Teknik Informatika Universitas Bengkulu'),(3,'siteIcon',NULL),(4,'organizationLogo',NULL),(5,'organizationPhoneNumber',NULL),(6,'organizationEmail',NULL),(7,'organizationAddress',NULL),(8,'organizationSocialMedia','[]'),(9,'organizationName','HIMATIF'),(10,'organizationUniversity','UNIVERSITAS BENGKULU'),(11,'organizationDesc','Himpunan Mahasiswa Teknik Informatika (HIMATIF) di bentuk di Bengkulu (Universitas Bengkulu) pada tanggal 22 september 2006 Himatif merupakan tempat bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya serta mengabdi sebagai kewajiban seorang mahasiswa. Kepengurusan HIMATIF di bagi menjadi 6 devisi bidang, yaitu Bidang Kerohanian, Bidang IT, Bidang Pendidikan, Bidang Olahraga dan Kesenian, Bidang Pengabdian Masyarakat, Bidang Kewirausahaan'),(12,'organizationTagLine','Wadah bagi mahasiswa Teknik Informatika Universitas Bengkulu untuk berkarya dan mengabdi.'),(13,'allowComment','1'),(14,'moderateComment','0'),(15,'googleVerifyCode',NULL),(16,'alexaVerifyCode',NULL),(17,'bingVerifyCode',NULL),(18,'yandexVerifyCode',NULL),(19,'googleAnalyticsId',NULL),(20,'facebookAuthorId',NULL),(21,'facebookAppId',NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_auths`
--

DROP TABLE IF EXISTS `social_auths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_auths` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_auths_user_id_index` (`user_id`),
  CONSTRAINT `social_auths_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_auths`
--

LOCK TABLES `social_auths` WRITE;
/*!40000 ALTER TABLE `social_auths` DISABLE KEYS */;
INSERT INTO `social_auths` VALUES (4,77,'google','109754463826704078874','{\"sub\":\"109754463826704078874\",\"name\":\"Febrianto\",\"given_name\":\"Febrianto\",\"picture\":\"https:\\/\\/lh3.googleusercontent.com\\/a-\\/AOh14GjTPHdvJdWwCwURfRbD1yxE5hL1VMFBOBnyYO_nPA=s96-c\",\"email\":\"nextlife.sy@gmail.com\",\"email_verified\":true,\"locale\":\"id\",\"id\":\"109754463826704078874\",\"verified_email\":true,\"link\":null}','2021-02-23 03:05:12','2021-02-23 03:05:12');
/*!40000 ALTER TABLE `social_auths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `period_id` bigint(20) unsigned DEFAULT NULL,
  `position_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_period_id_index` (`period_id`),
  KEY `staff_position_id_index` (`position_id`),
  KEY `staff_user_id_index` (`user_id`),
  CONSTRAINT `staff_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `staff_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (94,1,1,2),(95,1,2,31),(96,1,3,49),(97,1,6,77),(98,1,7,46),(99,1,8,44),(100,1,9,79),(101,1,10,75),(102,1,11,68),(103,1,12,71),(104,1,13,26),(105,1,14,67),(106,1,15,55),(107,1,16,10),(108,1,16,11),(109,1,16,13),(110,1,16,19),(111,1,16,34),(112,1,16,42),(113,1,16,73),(114,1,16,87),(115,1,16,91),(116,1,16,93),(117,1,16,97),(118,1,16,129),(119,1,16,131),(120,1,16,132),(121,1,16,151),(122,1,16,159),(123,1,18,4),(124,1,18,6),(125,1,18,9),(126,1,18,23),(127,1,18,30),(128,1,18,66),(129,1,18,76),(130,1,18,96),(131,1,18,117),(132,1,18,125),(133,1,18,128),(134,1,18,143),(135,1,18,147),(136,1,19,21),(137,1,19,22),(138,1,19,24),(139,1,19,32),(140,1,19,43),(141,1,19,52),(142,1,19,63),(143,1,19,69),(144,1,19,83),(145,1,19,103),(146,1,19,105),(147,1,19,110),(148,1,19,114),(149,1,19,120),(150,1,19,127),(151,1,19,134),(152,1,19,145);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','super.admin@default.test',NULL,'$2y$10$aAvoBxGA5qEaNDxOVGMRw.gQkIc4i/SgJ1pYx.EfINtukpzIfD4Lq',NULL,'2021-02-22 20:19:57',NULL,NULL),(2,'Pembina HIMATIF','pembina@default.test',NULL,'$2y$10$SG14d5qe.I8Z49Kiu0pdZumxGSu8pIc1AoQI.6FVoZdd4EUQnSLYa',NULL,'2021-02-22 20:19:57',NULL,NULL),(3,'Sekretaris','sekretaris@default.test',NULL,'$2y$10$tVwYd5Aoy.rbKkID/nCg1OVhB8VLQihONIjiOiQuGcUyhSdfPhDNm',NULL,'2021-02-22 20:19:57',NULL,NULL),(4,'AGUNG DESTIO','G1A018001@default.test',NULL,'$2y$10$jumGV90cz09R4T7eO0QYEO236xHFUTIMN8NOUoHjoybFH1GpaNreq',NULL,'2021-02-22 20:39:29',NULL,NULL),(5,'JEMMI ALPAROBI','G1A018002@default.test',NULL,'$2y$10$N2lkasifykVAu7bn1rGDZOHjyCG1lQxgyV83pVdVediTAcPpgZF.K',NULL,'2021-02-22 20:39:29',NULL,NULL),(6,'MUHAMMAD IMMAMUL JALAL','G1A018003@default.test',NULL,'$2y$10$4icwVchSNuTTjqp3KSpUQOCk0onZJB/WtslHGItoZPJDuIGzVAS4K',NULL,'2021-02-22 20:39:30',NULL,NULL),(7,'ALINUR FRADITA UTARI','G1A018004@default.test',NULL,'$2y$10$TSBIFWprGagLHJmhlsqRqOFm4xAZQT/4gSQO8VeEd/VxaRjFj.k66',NULL,'2021-02-22 20:39:30',NULL,NULL),(8,'FITRI DWI RAHMATULAINI','G1A018005@default.test',NULL,'$2y$10$gO6RgTS9blmFbKf0BHWNuOHNlT8BrqyfP9iOVfK5LPEWtQvSxkGUO',NULL,'2021-02-22 20:39:30',NULL,NULL),(9,'AKNIA FAZA HERYUANTI','G1A018007@default.test',NULL,'$2y$10$STmMNbUMyX6nLvd.thH1L.YsscAHoI9kUf9keN4NNIcMk9UuDpO9i',NULL,'2021-02-22 20:39:30',NULL,NULL),(10,'MELI TRI YANTI','G1A018008@default.test',NULL,'$2y$10$ZhVqomVEBHtsgsOSM/apm.8bhzXrndAQnfUzkK2SMaxzhNbWpyae6',NULL,'2021-02-22 20:39:30',NULL,NULL),(11,'LOVIDA ROYANI','G1A018009@default.test',NULL,'$2y$10$jhjq3pCmA425kC0Ptl/t/u2moGCIq2lcMA8YFqa8nT5eUoNz28Nli',NULL,'2021-02-22 20:39:30',NULL,NULL),(12,'ARUM PUTRI NOVI YANTI','G1A018010@default.test',NULL,'$2y$10$EEhiTPIcWgmt7I4/2Sxf2e/yBC.4UPl02fcCvEwJTnYcCzH8/t4/W',NULL,'2021-02-22 20:39:30',NULL,NULL),(13,'ETIA ROSALINA','G1A018011@default.test',NULL,'$2y$10$f/gx/CUB4q9W8JoW587W4uGMhUXt67sAx.Ri8S.jz21/leZMYUr4K',NULL,'2021-02-22 20:39:30',NULL,NULL),(14,'PUTRI RAHAYU','G1A018012@default.test',NULL,'$2y$10$QZIx8nqst0YcN4BU0m7XEOsdxNda/dHeWa0669sMa1qcxtabKLvGG',NULL,'2021-02-22 20:39:30',NULL,NULL),(15,'RINDA AYU LESTARI','G1A018013@default.test',NULL,'$2y$10$.qYRT6oxE1nHpJh//IQ6qecTgcUAO/m2PrQWfVXcQQDaUjc0HzLsK',NULL,'2021-02-22 20:39:30',NULL,NULL),(16,'MIFTAH FADHLURROHMAN','G1A018014@default.test',NULL,'$2y$10$mxZaVGQ5.B2tZNbeEVV.6.SY136RO5d0Bhb5ZrBMJt8Uqm1h/V6ba',NULL,'2021-02-22 20:39:30',NULL,NULL),(17,'NEFERLY ARIF BUDIMAN','G1A018015@default.test',NULL,'$2y$10$ACqIj5ii57HePPYICtYaEekKB4DI4DMVPXXX9U/5ukda6d/mai64a',NULL,'2021-02-22 20:39:31',NULL,NULL),(18,'INAYATI ISMI','G1A018017@default.test',NULL,'$2y$10$LoI3DqBcWTW/NPCBQO2D6eK3YBFiItGLmrVr.i3qMbQ51RJM7ICGu',NULL,'2021-02-22 20:39:31',NULL,NULL),(19,'RISTIANAH','G1A018018@default.test',NULL,'$2y$10$lBnVGvP7U0BLuynuu28FTuMBbo69NYEPwvwwk4x6zroNyT0u2fxA6',NULL,'2021-02-22 20:39:31',NULL,NULL),(20,'HANIFAH NUR SAFITRI','G1A018019@default.test',NULL,'$2y$10$pprp2SdR.tUgXk0HSuKpsOqccDBD.qprCrADfHH.9MOuv4SaKrMYW',NULL,'2021-02-22 20:39:31',NULL,NULL),(21,'TEGAR KASIH SATRIA','G1A018020@default.test',NULL,'$2y$10$PGtZ7BaQc4CCapivVecPoeC6GbJlG3WJLu/U1LIXBQikDn.08ZKI.',NULL,'2021-02-22 20:39:31',NULL,NULL),(22,'SAHRIAL IHSANI ISHAK','G1A018023@default.test',NULL,'$2y$10$xHOiv6dFs4gvJX5pFF6saONAHwEhzyMmgTVOIO2UXItP6/1XnIgla',NULL,'2021-02-22 20:39:31',NULL,NULL),(23,'STEFANI TASYA HALLATU','G1A018025@default.test',NULL,'$2y$10$GA8UfN92mWmTLApRAQUHOekYgeY/JUwNxPfdWlXC5S58dJgE56JC.',NULL,'2021-02-22 20:39:31',NULL,NULL),(24,'ADITYA RIZKI ANANDA','G1A018026@default.test',NULL,'$2y$10$jambOQ6L4zpeDXSZKzMG6uamzYwUVISNtNPtYY4a6cZiGoRtbxJ3i',NULL,'2021-02-22 20:39:31',NULL,NULL),(25,'FEBRIDILLA NURUL MASYITA','G1A018027@default.test',NULL,'$2y$10$.UcXhgKT0BJ0oFMMSVxZCePgyq1/L1Y7b5VWEsBy/Flk34Qm1j1R2',NULL,'2021-02-22 20:39:31',NULL,NULL),(26,'AJIE NOFRIZAN','G1A018028@default.test',NULL,'$2y$10$JOglfBGRdV4M3kUTQwstAuaEhjgYiD3tmBdiWeIQLOGxiD.EbXyVC',NULL,'2021-02-22 20:39:31',NULL,NULL),(27,'ALDJO DHIE FALETEHAN','G1A018029@default.test',NULL,'$2y$10$NVTrXw7GbzBgLuAbidMRBONHMPH9vTqag0JspwEhmOIb0dc8.vfPW',NULL,'2021-02-22 20:39:31',NULL,NULL),(28,'NURUL LAILA TUSYA\'DIAH','G1A018030@default.test',NULL,'$2y$10$OMx8SW.dlni871buxMFDHet.dWVDmd2YSszPcr3Hmt6WaP1H5QI32',NULL,'2021-02-22 20:39:31',NULL,NULL),(29,'ANJAS WIRANTA TARIGAN','G1A018031@default.test',NULL,'$2y$10$RhyhFsM8.unfIibUwXfiUezM5e.BXAKv.edNUmLvC3huGBXtoMNPC',NULL,'2021-02-22 20:39:32',NULL,NULL),(30,'PANJI RAMADHAN','G1A018032@default.test',NULL,'$2y$10$VOvnGp7sbc9u1AlhKHV9LeZBXEI5kMz4OtWecxGxL17S4HJ1.0lZ2',NULL,'2021-02-22 20:39:32',NULL,NULL),(31,'HAFIZ HIDAYAT','G1A018033@default.test',NULL,'$2y$10$EaNCHadn0nr6y878EuJwh.FA0qdJyAzeA3xJ2O0khpwOXEeSp8f9y',NULL,'2021-02-22 20:39:32',NULL,NULL),(32,'INTAN PERMATA HATI','G1A018034@default.test',NULL,'$2y$10$zSIiOM8pnM7owTF0F8Mx4eK2kk1g7SlSQm52NVELUHq9FiTE8T0Oe',NULL,'2021-02-22 20:39:32',NULL,NULL),(33,'ARSYI ARIF AGAMI','G1A018035@default.test',NULL,'$2y$10$NPpKc2vss/oLeF88FxRW7.nsKXRfOYg0f/TF30Byn4ebcSbT5DVKS',NULL,'2021-02-22 20:39:32',NULL,NULL),(34,'RADEN MUHAMMAD HILMI NURHADI','G1A018036@default.test',NULL,'$2y$10$8NVCGPmRIRlagd0mcXfPNuFftpj6Lhp6Ossj.gfTglYrWOOlQaWva',NULL,'2021-02-22 20:39:32',NULL,NULL),(35,'NAUFAL RIZKY ANANDA','G1A018037@default.test',NULL,'$2y$10$WBuUmWGtc0rAjRxZ.1Av.uOQhX.m3TYGRaYi4LFMrKt8dliXUFyme',NULL,'2021-02-22 20:39:32',NULL,NULL),(36,'WINA SALSABILLA FANDINI','G1A018038@default.test',NULL,'$2y$10$v2o54FDV1gGiYLCY6egR7OGW3wjmO8j2b1AovgwV9LORBt02OeBQK',NULL,'2021-02-22 20:39:32',NULL,NULL),(37,'SURYA EMPA LESMANA','G1A018041@default.test',NULL,'$2y$10$LLs.OgVwggOiaLZg4IoGX.CXnDB9gpeExHmwAlEFZoXDEDWdCkwYy',NULL,'2021-02-22 20:39:32',NULL,NULL),(38,'DWIKY RACHMANDA SYAINDA PUTRA','G1A018043@default.test',NULL,'$2y$10$44ETGLF1Mp3HEL0/gk4abe6Fiz/3S2kcSmLvHycBbdTbts06MI9MW',NULL,'2021-02-22 20:39:32',NULL,NULL),(39,'FATMA JUWITA','G1A018044@default.test',NULL,'$2y$10$4krxcHr1xwXqN3NdiHLuoutFkMAw/5aT6JLCgSY2FekVwxYJH1Mr6',NULL,'2021-02-22 20:39:32',NULL,NULL),(40,'TEDHY ERLANSYAH','G1A018045@default.test',NULL,'$2y$10$cxtwe2aeX9ARO28zsQcT.uUSKUDMxuh33KlJ1WVt8UkRZpkPkzJ1G',NULL,'2021-02-22 20:39:33',NULL,NULL),(41,'NAUFAL HAFIZH DHIYA ULHAQ','G1A018046@default.test',NULL,'$2y$10$juvL9M9YasSrsC3aDE6wEOEPZCtyf37w.FfS0Uw2C6cIlbffal6Ni',NULL,'2021-02-22 20:39:33',NULL,NULL),(42,'AHZAMI JANATA','G1A018048@default.test',NULL,'$2y$10$mNuJlQoZRlAvUpvKy2DaCO5mf5MEbpCPqhRy7dfl9i3VhFm.FHo7K',NULL,'2021-02-22 20:39:33',NULL,NULL),(43,'DEVINA FITRIA','G1A018049@default.test',NULL,'$2y$10$eX/ZT/9S737FqcmfihGH3eyHHzeoKmhNIc4NN4UpME4IEKyR/Tn1u',NULL,'2021-02-22 20:39:33',NULL,NULL),(44,'VIRA RAHMA','G1A018050@default.test',NULL,'$2y$10$80I7H8pVxI9WSqs8X2PfH.j/KFpuGMgmiuArrVQ7/Otnfr3dfKvQi',NULL,'2021-02-22 20:39:33',NULL,NULL),(45,'TIYA SUCI HAMIMMAH ','G1A018051@default.test',NULL,'$2y$10$7.Xjz0k.ybE7ogoTt8Y8vOTTznaNxT/YmKhCokG.fOHqD6ol9c7Kq',NULL,'2021-02-22 20:39:33',NULL,NULL),(46,'YANTI SIMANJUNTAK','G1A018052@default.test',NULL,'$2y$10$TXcJ6VMDeIb.YO631Uz5mu4ByDL2ULHAFUYqfn9FTgEuKwt/olzXK',NULL,'2021-02-22 20:39:33',NULL,NULL),(47,'WASEP TRIANSYAH','G1A018053@default.test',NULL,'$2y$10$.u5rbKJrnykRFNCNVckIcOY4VDpNh0b8ZJf5qaYytqINuFNxoGAX2',NULL,'2021-02-22 20:39:33',NULL,NULL),(48,'RAHMAT FIKRI WAHYUDI','G1A018054@default.test',NULL,'$2y$10$6/aFK1dYGDnvL2ETttbKTuxuuel5PAmb9UWR2DFebzJlgQxIWJk62',NULL,'2021-02-22 20:39:33',NULL,NULL),(49,'MUHAMMAD FIKRI ABDILLAH ARIFIN','G1A018056@default.test',NULL,'$2y$10$BBsAQXyLTLcraQ6Izk.FSOZ8XiITItnaeebhgxzAHoPHc31WGzVui',NULL,'2021-02-22 20:39:33',NULL,NULL),(50,'HARIZALDY CAHYA PRATAMA','G1A018057@default.test',NULL,'$2y$10$oklmYEA3rdSBXNWDSxks5.ETUchUZvDOrz1bq53wK156AiwmzE1BK',NULL,'2021-02-22 20:39:33',NULL,NULL),(51,'EDWAR ANTONI','G1A018058@default.test',NULL,'$2y$10$ukvB5WwDC7dss2Tqaag5u.L4RZjmENiemEOll7hgJ4ThB/TOxGCNG',NULL,'2021-02-22 20:39:33',NULL,NULL),(52,'NORA ANGELLA','G1A018059@default.test',NULL,'$2y$10$POcNd7xyepPZ.tnVOJVHAeGTpepV17JeH3W5uqWA4vLNOj85GAlsC',NULL,'2021-02-22 20:39:34',NULL,NULL),(53,'EVA NURMALASARI','G1A018060@default.test',NULL,'$2y$10$7f6gctsO60jAhw.WJFW8J.M7RjzX/2taY6krlARjqJN.9J/giY/PS',NULL,'2021-02-22 20:39:34',NULL,NULL),(54,'RAHMAD ALNASIMAN','G1A018061@default.test',NULL,'$2y$10$5Lm2.cwnSaShnhohUZhZCuCJReGXENHjXg9XyNSJMwpRcxXNL4YXS',NULL,'2021-02-22 20:39:34',NULL,NULL),(55,'RYAN FERNANDA','G1A018062@default.test',NULL,'$2y$10$1JCGPqswrgtUfOmQ4oxn9O0O7UYUngsR8ATsOT0JlpVq4ZvHSQOSS',NULL,'2021-02-22 20:39:34',NULL,NULL),(56,'MUHAMMAD FARABIE','G1A018063@default.test',NULL,'$2y$10$LaIYxZtQNuCIm7gJsVmNpew9G8cPjOpg4ftZS6f7e3N9tYdS.ynZC',NULL,'2021-02-22 20:39:34',NULL,NULL),(57,'GUSMAN WIJAYA','G1A018064@default.test',NULL,'$2y$10$uGlk2RzOWzIucE4MAC.wCeBIswhbsuB155hfILHWSIttq/E4JJwTu',NULL,'2021-02-22 20:39:34',NULL,NULL),(58,'DANNY BRANTADIKARA','G1A018065@default.test',NULL,'$2y$10$7cQS26dYC33bdP8/.7WwT.uUM2VPhusYb1rgWyw0haWfxCxvKLXaa',NULL,'2021-02-22 20:39:34',NULL,NULL),(59,'NUR ANNISA APRILIANI HERMAN PUTRI','G1A018066@default.test',NULL,'$2y$10$XFrjmnmkHkODEq/jg3/rAuJpYSbUhXmT7bTnZmPi1XMYvq3bGp3xK',NULL,'2021-02-22 20:39:34',NULL,NULL),(60,'MUHAMMAD REYHAN FIRDAUS','G1A018067@default.test',NULL,'$2y$10$T7fxT3A2IZH2ABEwgVQZ6e/a.cY6tyMdjQanJtHYeOBeFtsbqCPrK',NULL,'2021-02-22 20:39:34',NULL,NULL),(61,'FARREL ALIFYANDRA AKBAR','G1A018068@default.test',NULL,'$2y$10$pZgYOgZzTyIZ.TP4tm8RmusML5iVxQsZyG7U0bukIBu.BejQ7tg0y',NULL,'2021-02-22 20:39:34',NULL,NULL),(62,'WIGO ARYAGUNA','G1A018071@default.test',NULL,'$2y$10$nLxsPHJGn9K/OrUDkKRzhul0xc73DEgzix/t6gxqFwawxhxQXshZq',NULL,'2021-02-22 20:39:34',NULL,NULL),(63,'NATHASSJA ZHAFIRA KESUMA','G1A018072@default.test',NULL,'$2y$10$ueW9.zZPCC2XHUxlXCaTBOJF0ZG.8IHRtgALOwFQn/OyVXVMlmD8a',NULL,'2021-02-22 20:39:35',NULL,NULL),(64,'DEA FANIA','G1A018073@default.test',NULL,'$2y$10$hGk0zVmHAcZ8dlxlqv7YI.40sx5WdkDP2.TkVxShUM3XTU2y5P7gC',NULL,'2021-02-22 20:39:35',NULL,NULL),(65,'MUHAMMAD PRATAMA HIDAYATULLAH','G1A018074@default.test',NULL,'$2y$10$Q2ZlWt82SWwnZ.IVNFIWyuEDioGXkee./ufOVmThWfpVL40BZ3zXu',NULL,'2021-02-22 20:39:35',NULL,NULL),(66,'IFFAN ALFITZIKI RAHMADANI','G1A018075@default.test',NULL,'$2y$10$4H37pP0dhX26TBSRwLW6fuOv6ckGtmSkDskHOhqFChwxuzXjI9EXG',NULL,'2021-02-22 20:39:35',NULL,NULL),(67,'FERNANDO FERDYANSYAH','G1A018076@default.test',NULL,'$2y$10$4v8BCSjrIS4/VEzmrfOaS.w4bcD/P4sYXhhnvXPt1pS0pfziHwtQe',NULL,'2021-02-22 20:39:35',NULL,NULL),(68,'TRI ANNISA GUSTYANINGRUM','G1A018077@default.test',NULL,'$2y$10$Y4jQjyJd.W2OfpMpjhzlMO2bGYZwDeDHtbBaxgeRSxqCNRPfpa0CS',NULL,'2021-02-22 20:39:35',NULL,NULL),(69,'NABILAH GHINANTI SUCI','G1A018078@default.test',NULL,'$2y$10$1EvQrQpT54f2pBrEhhzcoet6vP56n0ziZUi/pAl.feS/gmXzaXUOi',NULL,'2021-02-22 20:39:35',NULL,NULL),(70,'ACHMAD RILWANUL IZZATI','G1A018079@default.test',NULL,'$2y$10$XU43kpNtUpQlD8x/fxwHCuF7D9cLt5lQOsynRjNVuPFRxvIQoT7Oi',NULL,'2021-02-22 20:39:35',NULL,NULL),(71,'ELLEN THERESIA  NADEAK','G1A018080@default.test',NULL,'$2y$10$lIOYGvhPPPDFoeW9D0A9iO.e./J.GIFqlIFOEdliAuBhWQBIduGfS',NULL,'2021-02-22 20:39:35',NULL,NULL),(72,'M. AKBAR MAULANA','G1A018081@default.test',NULL,'$2y$10$dWhO0U7JHRMcXv9.npqEbeQAnpXNGZrRGwHOR52vUgrJIajakJ8X6',NULL,'2021-02-22 20:39:35',NULL,NULL),(73,'FERDIANSYAH ASYRAF RIZQULLAH','G1A018082@default.test',NULL,'$2y$10$jwHO2OOHgBWK5lfLHkhCduHVCBVM0CntWEWP9y6F4AOvt6qWw9ul2',NULL,'2021-02-22 20:39:35',NULL,NULL),(74,'MUHAMMAD AFIF AL YAQHZAN','G1A018083@default.test',NULL,'$2y$10$scFluy04nmZWv8zuTmGD9u0O39TokVPnxlmP.e/n6wGUXitcwe8O2',NULL,'2021-02-22 20:39:36',NULL,NULL),(75,'IQBAL MUHAMMAD GIBRAN','G1A018084@default.test',NULL,'$2y$10$JGumv3muuFN7G0sIV7RJE.kRghqXXSMc/hqcZG3mZo3qVQ44Omczi',NULL,'2021-02-22 20:39:36',NULL,NULL),(76,'MEYZAN AL YUTRA','G1A018086@default.test',NULL,'$2y$10$Nesj6ZnP66jY2fxwVT5/dOa3qeqvv6AIbms2KJPGLvZmOfGlVqzMS',NULL,'2021-02-22 20:39:36',NULL,NULL),(77,'DWI LESTARI','G1A018087@default.test',NULL,'$2y$10$q2JED58ocdfhXRXhupJar.suwOJd2yFBXC6YKhROU7L6dUgLecB/y',NULL,'2021-02-22 20:39:36',NULL,NULL),(78,'NORIZAM AG PRATAMA','G1A018088@default.test',NULL,'$2y$10$JRsU1P2JoBjwh/jttoXrMOvT4poxMC125OMrVQvzzKBZMR2hZJCW.',NULL,'2021-02-22 20:39:36',NULL,NULL),(79,'ELVINA SALSABILA','G1A018089@default.test',NULL,'$2y$10$LPB3nAL7X7JwmKVjyMlPLOf5m9oSMhfE4DJGrH5b8jtjEqSHwHHwW',NULL,'2021-02-22 20:39:36',NULL,NULL),(80,'MUHAMMAD HAMZAH ASYRAF','G1A018090@default.test',NULL,'$2y$10$3K5VlfPp1ggHb4faZITf0OxcnqmrisXL0Vop6SlYTS/RvGfuclsv.',NULL,'2021-02-22 20:39:36',NULL,NULL),(81,'RAJU WAHYUDI PRATAMA','G1A018091@default.test',NULL,'$2y$10$TvXNvTnOScXMlU4bbd/Ciua52jLA5CWROYO4foPaIrbV7ITQTai9K',NULL,'2021-02-22 20:39:36',NULL,NULL),(82,'NURSITA','G1A018092@default.test',NULL,'$2y$10$4uw32L3TSUb5iSEYEbQMSOHo4dvqWmH/pr6u9ZgYiI/R.L3vlY4su',NULL,'2021-02-22 20:39:36',NULL,NULL),(83,'WAHYU SYAHPUTRA','G1A018093@default.test',NULL,'$2y$10$ouhkAcUXLvFKyK3YWdDfA.1LmO7xNWDek3cqnqgHHSwiQ85wWYoGi',NULL,'2021-02-22 20:39:36',NULL,NULL),(84,'Ismiranda Syahfitri ','G1A019001@default.test',NULL,'$2y$10$pTfoq1tLSCGWiW2.qcrdIOzxiN4FIk.UihYyu46GPPOGwRFBLeiDe',NULL,'2021-02-22 20:39:56',NULL,NULL),(85,'Yusuf Nasrulloh ','G1A019002@default.test',NULL,'$2y$10$M/4etGtmPtQwrQjgBF2iZeLo3gNRQs0f9qqeT3ueyheFCBYkQVVKu',NULL,'2021-02-22 20:39:56',NULL,NULL),(86,'Firsti Eliora ','G1A019003@default.test',NULL,'$2y$10$KuzM7p4h4OkxKFgH23ADuezVVyeyAwyqStJMKWfHXZJ4CFoC2m1rG',NULL,'2021-02-22 20:39:56',NULL,NULL),(87,'Ninda Puji Lestari ','G1A019005@default.test',NULL,'$2y$10$RdI.fWAOB5rvcOP0aUn6LOq31WFyOtx9/sbS9EFPOc9Kf.6g2hvea',NULL,'2021-02-22 20:39:56',NULL,NULL),(88,'Astuti Zahrroh ','G1A019006@default.test',NULL,'$2y$10$T5xY38vlKnFYntjCRrZ1/OYpgIyZPWsC3SbuYGWijHxU7jlCCTage',NULL,'2021-02-22 20:39:57',NULL,NULL),(89,'Renti Epana Sari ','G1A019007@default.test',NULL,'$2y$10$M5kjiKwGVQI1VKryXgTEDuhxby65KiADn74tBrSCte1ZeLu1jpmLG',NULL,'2021-02-22 20:39:57',NULL,NULL),(90,'Balqis Nabila Aulia Putri ','G1A019008@default.test',NULL,'$2y$10$stXJV6CQ5dI6NI086pKr/uvcMgixXqXl/DGUNDaxOYWkgvnCQpXzO',NULL,'2021-02-22 20:39:57',NULL,NULL),(91,'Wahyu Dwi Prasetio ','G1A019010@default.test',NULL,'$2y$10$HY2RMsn6ozYHrSrNEBpbDOiA/wX8NVMRbJ4YIG4e3UBi2IZUkSS9K',NULL,'2021-02-22 20:39:57',NULL,NULL),(92,'Yahya Masykur Nurhamdi ','G1A019011@default.test',NULL,'$2y$10$tryX0iBpfPrtvOn8nTuz3eQkiWbc4U3kjsTYaq.O/HJX9D7Xw142q',NULL,'2021-02-22 20:39:57',NULL,NULL),(93,'Fedryanto Dartiko ','G1A019012@default.test',NULL,'$2y$10$aNe2IxH7Tt8iGd1iNGWyJ.Rrqw5JqcM1wJfa2uEpIDPoid.BX2QY2',NULL,'2021-02-22 20:39:57',NULL,NULL),(94,'Mufti Restu Mahesa ','G1A019014@default.test',NULL,'$2y$10$QJD0WCsqREQFm/W4.WCWAOCLYuvfBr./eUTwa3oQGeGW85TPu3Jwa',NULL,'2021-02-22 20:39:57',NULL,NULL),(95,'Febrianto Ramandes ','G1A019015@default.test',NULL,'$2y$10$MZqtxv7XvXsfrI.KF0zWXeJFqauMDnYvjotjUxql1GdSDLhINwAFO',NULL,'2021-02-22 20:39:57',NULL,NULL),(96,'Ridha Nafila ','G1A019017@default.test',NULL,'$2y$10$4Q0Kb4VfykBLkPl3DbKtP.ajdpTptxAnhf6BHgiQXSinD/8Hv3t.S',NULL,'2021-02-22 20:39:57',NULL,NULL),(97,'Rizki Gusmanto ','G1A019018@default.test',NULL,'$2y$10$euYMDvoDdN5PZBrDET890.FoMJZIVh.GuEzkrg59Ry3eyURxBcBHe',NULL,'2021-02-22 20:39:57',NULL,NULL),(98,'Desi Ade Winda ','G1A019020@default.test',NULL,'$2y$10$DJlKV4T8jNb/YkLm7yVFzuvXJLHY/ArzWKdl6vuI0Mxwu46Gh2XVW',NULL,'2021-02-22 20:39:57',NULL,NULL),(99,'Muflihatun Robingah ','G1A019021@default.test',NULL,'$2y$10$6Gt9gOyHMgxlki3o890xR.BrUcZTHPDbxLCNscBegNi8MAVlp8zBW',NULL,'2021-02-22 20:39:58',NULL,NULL),(100,'Dewi Silvia Panjaitan ','G1A019022@default.test',NULL,'$2y$10$El1j2eaA0O8pwLDlL2oB5eIGSeblClIpa//nGR3mfbNgMlY4hqkTi',NULL,'2021-02-22 20:39:58',NULL,NULL),(101,'Adam idham r ','G1A019023@default.test',NULL,'$2y$10$WusWTT8Lhwk5HnVtEoxL1ekiQpbBdpy7vvql/i.41PBVWVbw.mJCO',NULL,'2021-02-22 20:39:58',NULL,NULL),(102,'Muhammad Gusfach Afrialdho Utama ','G1A019024@default.test',NULL,'$2y$10$K0nYBtn47sV6pAq8fJcRRugiVSqkAqtJtNW2fGZ94bsQdhzaK6fBm',NULL,'2021-02-22 20:39:58',NULL,NULL),(103,'Rifqi Naufal','G1A019025@default.test',NULL,'$2y$10$i.iCMAZlybE06dIQUjdLVO3fr/UN3GqBoAemyHkoQSskNHOpTI6vG',NULL,'2021-02-22 20:39:58',NULL,NULL),(104,'Aisyah Amalia Af ','G1A019026@default.test',NULL,'$2y$10$9nXJPITK5pFAFzb2nhtxnOqAxFik5fm5zmDlMH1FqYdaBfwVWIpni',NULL,'2021-02-22 20:39:58',NULL,NULL),(105,'Daffa Khoiri ','G1A019027@default.test',NULL,'$2y$10$j8yqCFGrPLbrvKxty/ckreztchhFMcQDCnfdQMfpOcXpD.UP/D52G',NULL,'2021-02-22 20:39:58',NULL,NULL),(106,'Muhammad Naufal Fahrezi ','G1A019028@default.test',NULL,'$2y$10$kN3bdZYWU1y0Jjn7ZvSgAOMbTRAnB/.v.NUM31Ti5O9FwBuvA/y2y',NULL,'2021-02-22 20:39:58',NULL,NULL),(107,'Rivaldi Arta Wijaya ','G1A019029@default.test',NULL,'$2y$10$PTU3dX92I9H6Z/yZJk5.5um2dF8PrI/v0xhyDNIqaGDuYMTCBtOaK',NULL,'2021-02-22 20:39:58',NULL,NULL),(108,'Andrei Jonior Gustari ','G1A019030@default.test',NULL,'$2y$10$T5ih8/GWRkt8il8GZOZ7FuOKlTO7/rSLII7oOQorEq/.kTiHF8DFy',NULL,'2021-02-22 20:39:58',NULL,NULL),(109,'M.Pandu Patana ','G1A019031@default.test',NULL,'$2y$10$/YKrSgwvht4jCe94e/lmZesUHESYNd31QGRZlcJ83n8hoFI.GMzO6',NULL,'2021-02-22 20:39:58',NULL,NULL),(110,'Aidil syadam radihan ','G1A019032@default.test',NULL,'$2y$10$gdl4S1uy9FU2lG5JrGZR6OPIqa.Mqsjgl9MioIyC0TMUE64gCidQ.',NULL,'2021-02-22 20:39:58',NULL,NULL),(111,'Muhammad Daffa Alfajri ','G1A019033@default.test',NULL,'$2y$10$XcpbUeZytTPfBvGw6ItJ2O9rPSk/aeMr1DgxTw0EKyZwGj1J.7IaC',NULL,'2021-02-22 20:39:59',NULL,NULL),(112,'Adde Nanda Caesario Putra ','G1A019034@default.test',NULL,'$2y$10$xVaKoJOeINsKZg8NzLouoOPvv8zOunwm6rYefbIgvUsWq5Dvj9sBe',NULL,'2021-02-22 20:39:59',NULL,NULL),(113,'Febby novriananda putri ','G1A019035@default.test',NULL,'$2y$10$P1M7NZK.dZQXqWWRHPTlf.z4XoU03qxFmNV6qG2iwJSGhuSnycxpC',NULL,'2021-02-22 20:39:59',NULL,NULL),(114,'Yusni Meihesa ','G1A019036@default.test',NULL,'$2y$10$qdcf2hrl1/gACA/fB7Ji6uuiNnVPJCGABlOdAtsz65izwIOc2vj1W',NULL,'2021-02-22 20:39:59',NULL,NULL),(115,'Muhammad Fajrianto ','G1A019037@default.test',NULL,'$2y$10$AnYblUnbVUvv87UjCFzUgOQRodh5DO1HMk1hmb33L8/9wD1bAPjCi',NULL,'2021-02-22 20:39:59',NULL,NULL),(116,'Diyah ishita azaharah ','G1A019038@default.test',NULL,'$2y$10$l/.2sjvSugNX2WTXUvXmOOey79WTNAwPe47M64V21hQFUp7.PHjEO',NULL,'2021-02-22 20:39:59',NULL,NULL),(117,'Sindhi Vinata ','G1A019039@default.test',NULL,'$2y$10$CsORF81Vm5g./czOr.gLCO36djt9k2A8l7ckHAudw4R3yTOsCkzM.',NULL,'2021-02-22 20:39:59',NULL,NULL),(118,'Hafidz M Wirawan ','G1A019040@default.test',NULL,'$2y$10$8Em2BLRvSCfiVTJDGnA/AOoB/Riwj0enwEX7bKCeIQe.5MHE6OI3a',NULL,'2021-02-22 20:39:59',NULL,NULL),(119,'Faridho Catur Pamungkas ','G1A019041@default.test',NULL,'$2y$10$sGgmic8ELC/6QR/3.PdJveLKudQVeKqOLo/MH2x4oQDnFIxXvYVQK',NULL,'2021-02-22 20:39:59',NULL,NULL),(120,'Gita Dwi Putriani ','G1A019042@default.test',NULL,'$2y$10$8eLJCvg8674jMDgEyN2OT.snuZa0JMsXqw6KWnKZYHqlVDDwBt3r6',NULL,'2021-02-22 20:39:59',NULL,NULL),(121,'Siti Rochika Qori ','G1A019044@default.test',NULL,'$2y$10$RwL4ZT38WDIi9kkYn49yRenG7hbCzdfZQhJHoqaH6GVedu9f5iN0K',NULL,'2021-02-22 20:39:59',NULL,NULL),(122,'Ikhsan Adi Nugroho ','G1A019046@default.test',NULL,'$2y$10$9NdB4YeLZ.Sct971bblsE.ngvuwISjRUiVIIwtZZ6Nuq9ckspxPxu',NULL,'2021-02-22 20:40:00',NULL,NULL),(123,'Ahmad Faris ','G1A019047@default.test',NULL,'$2y$10$gqtzWhh0tarB1Bs/XGxgGeS7EO0ptEtOuziUOK6NvppxwPBaXLYUa',NULL,'2021-02-22 20:40:00',NULL,NULL),(124,'Refki Jorgi Pradana','G1A019048@default.test',NULL,'$2y$10$KHFAYXy.JCQCMKYM9C8nceqojFAgE5wcOzH4UZqwJyefqW4raXzN6',NULL,'2021-02-22 20:40:00',NULL,NULL),(125,'Bryan pasaribu ','G1A019049@default.test',NULL,'$2y$10$M7j.UWmbn48vjB9MIRXyYOAQfvqw6uK4/7px./WpaBP1yKaTBp3tK',NULL,'2021-02-22 20:40:00',NULL,NULL),(126,'Gabriel Ananthasadewa ','G1A019050@default.test',NULL,'$2y$10$7dFCXPRsBFwbAxVOkXKsbe0J62f.8NADXxD.uMGwxNRZ8yht9Bhp2',NULL,'2021-02-22 20:40:00',NULL,NULL),(127,'Jessy mandasari','G1A019051@default.test',NULL,'$2y$10$YYVg4.VFvngXf.7X7ivuwu2iL1pWAQceuYdVk6Kr6fEJu4DxN9bMG',NULL,'2021-02-22 20:40:00',NULL,NULL),(128,'Hanan Raihana ','G1A019054@default.test',NULL,'$2y$10$S0LycjaAlAbEJIyh/tPyMOPiYHQApka3GCX5j7nU.qiEHTethHECa',NULL,'2021-02-22 20:40:00',NULL,NULL),(129,'Adha Dont Differatama ','G1A019055@default.test',NULL,'$2y$10$H0LN8rtELysXiM/5YdeqP.qm37NfFU6yVPdyVqKIH3ZKfsnHhNr5O',NULL,'2021-02-22 20:40:00',NULL,NULL),(130,'Agung Tri Saputra ','G1A019056@default.test',NULL,'$2y$10$T.2IdxC8gYA3JUI68NfPMufVRZ7ywtDhlNVcC424mJ6GcYyelvaGi',NULL,'2021-02-22 20:40:00',NULL,NULL),(131,'Muhammad Rizki Fadilah ','G1A019057@default.test',NULL,'$2y$10$3.s5.xUEQGswqTojXCR/1en5SEuB4TWdieqNGv0zoC/I0x1ZdKRoa',NULL,'2021-02-22 20:40:00',NULL,NULL),(132,'Miranda Tiara Sella ','G1A019059@default.test',NULL,'$2y$10$dHUcY2ke1kGSCgWlMLVXvOujA3yP1.cpJm25kzKnPnMUMTgSGmf7e',NULL,'2021-02-22 20:40:00',NULL,NULL),(133,'Abrar Abe Mujaddid ','G1A019060@default.test',NULL,'$2y$10$33Q3T5fWSCIme0cAtY8oneKJIwGUPpWRa86dUyav77GrdAxTsph8C',NULL,'2021-02-22 20:40:00',NULL,NULL),(134,'Martin Mulyo Syahidin ','G1A019061@default.test',NULL,'$2y$10$Qupp7kuguG9auyqECj3aGugDrfy5EWIUUQJRfiiVNzzCuzY1/dyVW',NULL,'2021-02-22 20:40:01',NULL,NULL),(135,'Muhammad Wijaya Permana ','G1A019062@default.test',NULL,'$2y$10$6F49/I.TQaMQG6TEEhrzcOMn2YG1Jxoz6wpGg6smlTVcd9TUC9Uya',NULL,'2021-02-22 20:40:01',NULL,NULL),(136,'Shaddam Muhammad Iqbal ','G1A019063@default.test',NULL,'$2y$10$JXX/acVSP3z8Ie8AD.adc.JmE05Oty1I360jytRYJRbPQqO52e7zC',NULL,'2021-02-22 20:40:01',NULL,NULL),(137,'Rhedo Francesco ','G1A019064@default.test',NULL,'$2y$10$wJ1ASc6nd0hHFIVN4lTYU.NptP1rvQ.h7jwEng.AzPqtSgv1PuhrO',NULL,'2021-02-22 20:40:01',NULL,NULL),(138,'Joi Pebrianty Hasian Lumbanraja ','G1A019065@default.test',NULL,'$2y$10$z2rXyYwl/mnRe8f45maKPOgxSqzBwf6TyebooXAJWoWnVQDpQSI.i',NULL,'2021-02-22 20:40:01',NULL,NULL),(139,'Randi Julian Saputra ','G1A019066@default.test',NULL,'$2y$10$2vNLrCxvXl9J0K6BEd2X6eM5TYjF1w8jfJytSh4b3J1kR23fC11fa',NULL,'2021-02-22 20:40:01',NULL,NULL),(140,'Rolin Sanjaya Tamba ','G1A019068@default.test',NULL,'$2y$10$73isOeh70ftxTnmL5RJXqOnVP/XxkJG9/MtbgWWaHAVdQk.uJVCli',NULL,'2021-02-22 20:40:01',NULL,NULL),(141,'Muhammad Aulia Abdurrahman ','G1A019071@default.test',NULL,'$2y$10$UM4K/eM9aQsrwh8WQJavyON7W8A68XQ18iJVcGe7vlsWsCBb9qtxW',NULL,'2021-02-22 20:40:01',NULL,NULL),(142,'Hendra Yesekyel Pangaribuan ','G1A019072@default.test',NULL,'$2y$10$3A/k33ZqwM10FDr5vG6KNOAj.tBmWA4QfVUQL30QwRcf2nWpLwV/y',NULL,'2021-02-22 20:40:01',NULL,NULL),(143,'Krisna Wahyudi ','G1A019073@default.test',NULL,'$2y$10$BzTEmF4GBNUA0xOMETaN4Oopolbryblh0Gt5s4Yf7WYQuV3OPYUfy',NULL,'2021-02-22 20:40:01',NULL,NULL),(144,'Nabilatul Balqis ','G1A019074@default.test',NULL,'$2y$10$ZpNsNhS3e1mCeptemz/iFud075luwPPX/Wz8NhtXFYKYQW6q75BOC',NULL,'2021-02-22 20:40:01',NULL,NULL),(145,'Firmansyah Alfarisi ','G1A019075@default.test',NULL,'$2y$10$urbYD7DLBTbk6WgXmbsG5eFyZxrUG41/YnXp5BpTzS1u2DgY8wsZu',NULL,'2021-02-22 20:40:02',NULL,NULL),(146,'Murfid Aqil ','G1A019076@default.test',NULL,'$2y$10$0xk25UG3JDvxQ9V6wye8F.gPu1C8SymLL4nUP20uNu3LsDD7vGjFm',NULL,'2021-02-22 20:40:02',NULL,NULL),(147,'Muhammad Ikhsan Prasanidirta','G1A019077@default.test',NULL,'$2y$10$q21Q/770zHmwHvjcG/A7o.IzqUn9CeDe7AohU9Th48tQqNPe0uY/G',NULL,'2021-02-22 20:40:02',NULL,NULL),(148,'Rasya ratu meilani ','G1A019078@default.test',NULL,'$2y$10$2Aw1uK74DTjXz/HrdNG6xOs2UuKgeClpLJmf6VtrdQiNq.wvIGHZy',NULL,'2021-02-22 20:40:02',NULL,NULL),(149,'Reza Utami ','G1A019080@default.test',NULL,'$2y$10$ki7Trn.bRuUwTythFl6wVuOyIUtDXTos1I5U8Zpr0WPITZwp2xG4S',NULL,'2021-02-22 20:40:02',NULL,NULL),(150,'Annisa Kurniati ','G1A019081@default.test',NULL,'$2y$10$7T23K43QeZQs8Wquwu48HOj3q.PfthjzDbhSGWrTZS1NxlluarEMe',NULL,'2021-02-22 20:40:02',NULL,NULL),(151,'Alfath Arif Rizkullah','G1A019082@default.test',NULL,'$2y$10$Tob4bOylCXz8VX2OsUnoseEM55ESCq7EuTtIdQqUzsq1lzWBga/Mq',NULL,'2021-02-22 20:40:02',NULL,NULL),(152,'Berlian Tri Saputra ','G1A019083@default.test',NULL,'$2y$10$VypBW1BbPZnFR.fYxoqagOCmFRkyABMz9CFVO91oUcEcupTf39APS',NULL,'2021-02-22 20:40:02',NULL,NULL),(153,'Nofa Rima Yanti Nasution ','G1A019084@default.test',NULL,'$2y$10$yR/c4cyAZcmCpBD/qkrEh.PJa/rltFyL/djl7OTRtJHQ9JuR03OT.',NULL,'2021-02-22 20:40:02',NULL,NULL),(154,'Yogi Pratama ','G1A019085@default.test',NULL,'$2y$10$w3sx1oH02qJbfLUwrWK2B.xskmjOAuiGM0xlwA6BLV33K14msaFqu',NULL,'2021-02-22 20:40:02',NULL,NULL),(155,'Rizky Aruni ','G1A019086@default.test',NULL,'$2y$10$dO6XzFNjIjopgO57VNTMiO6gP8K280N/9IoGxTYjJVuOAJD1kw3TC',NULL,'2021-02-22 20:40:02',NULL,NULL),(156,'Alan Syahlan Santriago ','G1A019088@default.test',NULL,'$2y$10$gLX6LM0h3YLkvcWUpf2YuOlwJjQ/i1x30SZz8uttQOeDqFcmT4kYi',NULL,'2021-02-22 20:40:02',NULL,NULL),(157,'Muhammad Rizky Aditya ','G1A019089@default.test',NULL,'$2y$10$GEODTzri7lxaT88sIUHDcuWlk18u4ZFTOefo1EfgX/cSlDwysfN2S',NULL,'2021-02-22 20:40:03',NULL,NULL),(158,'Muhammad Ighfary Triputra ','G1A019090@default.test',NULL,'$2y$10$tAITykNZGZhTpA9U1n7T0.3mbQfi1WbdnGNk5FMV98eIHGmyWqRTS',NULL,'2021-02-22 20:40:03',NULL,NULL),(159,' Muhammad Fikri Hidayatullah ','G1A019091@default.test',NULL,'$2y$10$Pn5ceU.e30DXl8W2ohVX/OtvOhR.rgZqmodiNk9xefbGaLyd1nw/2',NULL,'2021-02-22 20:40:03',NULL,NULL),(160,'Okto Redo ','G1A019092@default.test',NULL,'$2y$10$LWVgO.RknUARgqEdHNWQDO7Ev1qRoqB92wHUgON.TuKRc.fDizC8m',NULL,'2021-02-22 20:40:03',NULL,NULL),(161,'Nadila Zumitia Putri ','G1A019093@default.test',NULL,'$2y$10$yp1xiQuzQUkZvSJPkUcJ7e/360H9031gbNNY/Kbnx2W7BXcwJ428a',NULL,'2021-02-22 20:40:03',NULL,NULL),(162,'Rizkianda Rahmansyah ','G1A019094@default.test',NULL,'$2y$10$bTYb4qphbxLxoAYXlQXWFehwtgnpZWMWajbtC3nbOtc13vvetKFzK',NULL,'2021-02-22 20:40:03',NULL,NULL),(163,'Muhammad Alif Fachriansyah ','G1A019095@default.test',NULL,'$2y$10$tE/0MRwE3clcRSQ6kUlRe.h8w9AzuAKY5s1z9tw2bam77S6PQkddW',NULL,'2021-02-22 20:40:03',NULL,NULL),(164,'Agung Rahmatsyah ','G1A019096@default.test',NULL,'$2y$10$QxdMuFkQ/p4ija9F97k3tepOchdpwZJJJOBDLtQXGHX3kZM3sPsfW',NULL,'2021-02-22 20:40:03',NULL,NULL),(165,'Muhammad Syah Ramadani ','G1A019097@default.test',NULL,'$2y$10$W7vk4N42z13fcU.Lf5ghbuK4y93nPHQjgj4ENNEZf4K3L//ZNsck.',NULL,'2021-02-22 20:40:03',NULL,NULL),(166,'Rahwini Harpa Helda ','G1A019098@default.test',NULL,'$2y$10$pelPrqGdU977egRRn1wBsOqbaWlh1SXAT1qafEjHYjERRPgVNXqqq',NULL,'2021-02-22 20:40:03',NULL,NULL),(167,'Annisakina','G1A020001@default.test',NULL,'$2y$10$8BtIi/SMdzpE9lwquZapi.cKz/1Ex4n8ErTuXFsERtRlVX1SS2U/m',NULL,'2021-02-22 20:40:17',NULL,NULL),(168,'Desi Fitria','G1A020002@default.test',NULL,'$2y$10$ZnIe25C66J895CXIAbSfAulSkNUsogtDV4vu6PhqEnT0y2OPeo.fe',NULL,'2021-02-22 20:40:17',NULL,NULL),(169,'Dzaky Faishalariq','G1A020003@default.test',NULL,'$2y$10$jbPuBG0rRdL.YoT2qFg2S.7iRIMMVD66z02cBH/kCw6Pc/Rmk9zfK',NULL,'2021-02-22 20:40:17',NULL,NULL),(170,'Muhammad Ikhsanul Fiqri','G1A020004@default.test',NULL,'$2y$10$LlMmGMCshXmUxpEyDhdFTeYsV8YlDQX/rSSPlRGoX.GqqJSaNt/H6',NULL,'2021-02-22 20:40:17',NULL,NULL),(171,'M. Jumli Gazali','G1A020005@default.test',NULL,'$2y$10$592G3KB6H3/ke0um8c9l7eKqPiMGyfGKqxsfRVk869/SMROzHMMGa',NULL,'2021-02-22 20:40:17',NULL,NULL),(172,'Ejiman Saputra','G1A020006@default.test',NULL,'$2y$10$943/LaXCX0Bc0MmOhLHAluj3Eb2DA1DfjV.0VQUruWqGMrXk2oY92',NULL,'2021-02-22 20:40:17',NULL,NULL),(173,'Muhammad Wahfi Udin','G1A020007@default.test',NULL,'$2y$10$jVnpuaX0RSRnOzna.Gh6ueYBlqBT1GZMPS2lCS/dN52O8XAQoZG2u',NULL,'2021-02-22 20:40:17',NULL,NULL),(174,'Muhammad Farchan Al Rahman','G1A020008@default.test',NULL,'$2y$10$otTOuCZt4M8uxkDU/mDPCeypRiwF.CQLwiOQYVwlRBU6VbhlI6uEi',NULL,'2021-02-22 20:40:18',NULL,NULL),(175,'Fadilla Mardini Kencana','G1A020009@default.test',NULL,'$2y$10$flWLDXTQegHDxfogBNsca.wzSstZYT.sHyx8brewmi7xdAIvAUWYy',NULL,'2021-02-22 20:40:18',NULL,NULL),(176,'Silvia Rahma','G1A020010@default.test',NULL,'$2y$10$49J5lzhNnTUWL/BqOhGpmOv3aAibYFldfssiK2ZRUNZ6iqeW7ExCu',NULL,'2021-02-22 20:40:18',NULL,NULL),(177,'Ahmad Habibi','G1A020011@default.test',NULL,'$2y$10$kvMLtmpWUxWrpkBVrFEIg.KF/kNRc7s7bb1VXeBCxAzYx4hK4L90S',NULL,'2021-02-22 20:40:18',NULL,NULL),(178,'Ghina Salsabila Putri','G1A020012@default.test',NULL,'$2y$10$lioFTA6aA8R5iR3hAUu5R.IOzACFZ/Bh.cnhu6yOhgQdrVgtvZn6S',NULL,'2021-02-22 20:40:18',NULL,NULL),(179,'Nabila Aulya Zalfa Putri','G1A020013@default.test',NULL,'$2y$10$XLUeirb0/vU1owgCNTZ/h.stkX60nbZRvpGi3hnoN0/phyl1kRwJK',NULL,'2021-02-22 20:40:18',NULL,NULL),(180,'Muhammad Nazly Firman Alfariz','G1A020014@default.test',NULL,'$2y$10$igLkdWTNLEqc1Bm/cLtASOOedZTiZ4C8PXCiVwPRX7uL1Lr1pmJ4S',NULL,'2021-02-22 20:40:18',NULL,NULL),(181,'Aprieza Putri Salsabila','G1A020015@default.test',NULL,'$2y$10$Zq7kpxYmbmYuIbH98r1mFeb3VuniLczVjr6nESFRU1y9ZUbdu1ZFW',NULL,'2021-02-22 20:40:18',NULL,NULL),(182,'Salsabila Adisty','G1A020016@default.test',NULL,'$2y$10$ebUJYM.kJ.giNodUTysjiOnl6OzKEij1OXH7wJbcRmzIoxq0L6Sdy',NULL,'2021-02-22 20:40:18',NULL,NULL),(183,'Wellaostul Azizah','G1A020017@default.test',NULL,'$2y$10$a2J.o9kgM9EOw5MEB0SuxOsdgQGC5POl5Trezly.gEADquslr9/Oy',NULL,'2021-02-22 20:40:18',NULL,NULL),(184,'Exca Wella Monica','G1A020018@default.test',NULL,'$2y$10$cM6hP43A/utxUx8wAe9c5e1dxrH1RTENntM6M5Y.Io4gE.YDE6E2i',NULL,'2021-02-22 20:40:18',NULL,NULL),(185,'Ahmad Sopran','G1A020020@default.test',NULL,'$2y$10$I25INOHsvK1vPzKIhdaMIO0JTklOy7QDymfQTblNPUVuZM3WsPhdS',NULL,'2021-02-22 20:40:19',NULL,NULL),(186,'Valleryan Virgil Zuliuskandar','G1A020021@default.test',NULL,'$2y$10$A7M2S9cKnAN3H/SvYkmc1enDgczL.vjSJ1alHhAnc7TAtEg5CacJS',NULL,'2021-02-22 20:40:19',NULL,NULL),(187,'Aditio Pratama','G1A020022@default.test',NULL,'$2y$10$MfTULQhHSNpzWwTZeaCfge/JUhwOMIk6PWVBRfVpx.pWqSWgcl0vO',NULL,'2021-02-22 20:40:19',NULL,NULL),(188,'Rifki Dian Fitra','G1A020023@default.test',NULL,'$2y$10$k7cJrEB9l8oO0XQdRcy8AuTJS5s0P7JKRWOd8.kKXt6h66xVUfntG',NULL,'2021-02-22 20:40:19',NULL,NULL),(189,'Agnes Vera Nika','G1A020024@default.test',NULL,'$2y$10$im1LMTWGKU2aBpJHycNifuw1Ss12AvDmm5flI8MZ7v.kVIkT6qWc2',NULL,'2021-02-22 20:40:19',NULL,NULL),(190,'Wiwit Selasti','G1A020025@default.test',NULL,'$2y$10$9E/nWo9m97rSioUfaWEtb.ZWdagGBAtc8fOCWrYJBi6VbgDmjMUX.',NULL,'2021-02-22 20:40:19',NULL,NULL),(191,'Dede Revanza','G1A020026@default.test',NULL,'$2y$10$xih4JN835UeoWarobceoIe4qRSO0.2/N06MPExBOTL7bk0qiKq0li',NULL,'2021-02-22 20:40:19',NULL,NULL),(192,'Hizkia Tigor Sihotang','G1A020027@default.test',NULL,'$2y$10$7qHd38id4SBVDpPLPdVoHOT/Tfwp5CPq7lNIvlBPUk8pFLwGauQxC',NULL,'2021-02-22 20:40:19',NULL,NULL),(193,'Widya Nurul Huda','G1A020028@default.test',NULL,'$2y$10$A9zoZOLK1f3Dts66X6tMc.f6sj0TFIKvM0tCEeQ6CMfvIdIpL9/Cy',NULL,'2021-02-22 20:40:19',NULL,NULL),(194,'Syafrizza Aulia Marizky','G1A020029@default.test',NULL,'$2y$10$uD0RWPvFGudX7TJnN95qtuPBGmGEYnlSkaBx1FVrkydxcwJxzGBxm',NULL,'2021-02-22 20:40:19',NULL,NULL),(195,'Dania Dwi Safitri','G1A020030@default.test',NULL,'$2y$10$B/ag4mDiU2743MVE3TVUmeEGp0O9ckuZUuRjaRrEYxsUejF0mmlPW',NULL,'2021-02-22 20:40:19',NULL,NULL),(196,'Kharisma Nur Azizah','G1A020031@default.test',NULL,'$2y$10$QcM68bGASiM72.GxHna93eU60V1UALrGtUPfF4OinZtF2cbvwuhuK',NULL,'2021-02-22 20:40:19',NULL,NULL),(197,'Azvadennys Vasiguhamiaz','G1A020032@default.test',NULL,'$2y$10$Zkyaw/bk8ch/E9T8h/Pp7ej.3NArk7/2WsZV1k1cIhjHYk31O/3m2',NULL,'2021-02-22 20:40:20',NULL,NULL),(198,'Icha Dwi Aprilia Herani','G1A020033@default.test',NULL,'$2y$10$qMUSN84PAGYL0tJ9CUjOJeflHxanDGD03xy/B3kiFxRgGC8Y.R.le',NULL,'2021-02-22 20:40:20',NULL,NULL),(199,'Rahmita Dwi Kurnia','G1A020034@default.test',NULL,'$2y$10$256JwBCdHVOmWmDC985aVe/dWpFY4AurzpPWYPGOhWbJ5V6CAugrS',NULL,'2021-02-22 20:40:20',NULL,NULL),(200,'Muhadzib Nursaid','G1A020035@default.test',NULL,'$2y$10$rITTCCC99N0iveUgBCbEOutTB4excMtmatft1Gmi7xhWOJoiGttKK',NULL,'2021-02-22 20:40:20',NULL,NULL),(201,'Fadhilla Ilham Robbani','G1A020036@default.test',NULL,'$2y$10$ZFJWNnXs3AuOeF03mz3cOezhhqG1.rMqv4rCO/4lSGVOKTTc8nIBq',NULL,'2021-02-22 20:40:20',NULL,NULL),(202,'M. Radhy Afif Lubis','G1A020037@default.test',NULL,'$2y$10$fl9TbbTgKI5HigKK181PoeQCbebOxklyxPOM3IqtL8bh2MsBjXI/y',NULL,'2021-02-22 20:40:20',NULL,NULL),(203,'Putri Kartika','G1A020038@default.test',NULL,'$2y$10$sxcU//qILYv4.IKpozYNheqgvQiwI9jnasdqCaAVm.iW4Gqgax.Xq',NULL,'2021-02-22 20:40:20',NULL,NULL),(204,'Gilang Ramadhan','G1A020039@default.test',NULL,'$2y$10$e7aBtOH9g1pO8gGeyKhTj.8h7wjytEmv04HxtVRKcfmX89wDPWmw6',NULL,'2021-02-22 20:40:20',NULL,NULL),(205,'Wahyu Ramadhani','G1A020040@default.test',NULL,'$2y$10$d6dLr16QttAAWeC1Kmg9sOZorSOa8YaFwdFwDS54gTRilEwndYO/i',NULL,'2021-02-22 20:40:20',NULL,NULL),(206,'Dwinta Septiana','G1A020041@default.test',NULL,'$2y$10$G1/u/lC6iZ1g4o5VyqXQzeYTi2hxY.AP7fht89o7ItIjjDL6hH5A.',NULL,'2021-02-22 20:40:20',NULL,NULL),(207,'Muhammad Assabillah','G1A020042@default.test',NULL,'$2y$10$PMavrXbBpgfM1etvp5flK.y634MdosaW2MjLeCzoD0/9Ha1g/kaO6',NULL,'2021-02-22 20:40:20',NULL,NULL),(208,'Frisca Dini','G1A020044@default.test',NULL,'$2y$10$mq/zqVlaesatSoaFd1TdI.RKbNAXeJpyc99vCJBVq15cNknk1YAd6',NULL,'2021-02-22 20:40:21',NULL,NULL),(209,'Robby Mahendra','G1A020045@default.test',NULL,'$2y$10$5cVit3ZfNkdXLU7U5wnRc.H1Qf3ymcOO0uwcLhJH5OOcODCFbOOTG',NULL,'2021-02-22 20:40:21',NULL,NULL),(210,'Khalid Alrijali','G1A020046@default.test',NULL,'$2y$10$AzBWosh0b51S5.a6KK5UF.si/zbJc0lgpAPiW1TD14xIIRSa7hac.',NULL,'2021-02-22 20:40:21',NULL,NULL),(211,'M. Hilmi Mubarok','G1A020047@default.test',NULL,'$2y$10$y5W4unPGE5Jp5dkOT2QBS.0/4bXRYmeuj8hg2wgPrjFtUkN.kb0FS',NULL,'2021-02-22 20:40:21',NULL,NULL),(212,'Rhoulan Dhamar Wanto','G1A020048@default.test',NULL,'$2y$10$Bc6mlplsE6ofarI6OLFiIegwoTI723iMnZbXXR4YGevOjQaP6POXi',NULL,'2021-02-22 20:40:21',NULL,NULL),(213,'Ryfaldi Manuel Nainggolan','G1A020049@default.test',NULL,'$2y$10$NeCdixJ9ShESQpoF1.dxx.h6LM6f5zyHRkgZEa1344lP4jL67wB0m',NULL,'2021-02-22 20:40:21',NULL,NULL),(214,'Kms. Muhammad Ridho','G1A020050@default.test',NULL,'$2y$10$DXl.kZPZratWnRsvhzOjm.j3fpbRRhz9BWxMFv2iDXuBbJJATM3sa',NULL,'2021-02-22 20:40:21',NULL,NULL),(215,'Lusiya Melda Putri','G1A020051@default.test',NULL,'$2y$10$vX.UU2dk9XoA3omvrloJwe1Ru3zXw22XDIeRtyj0DxTLetGecebXC',NULL,'2021-02-22 20:40:21',NULL,NULL),(216,'Muhammad Ikhsan Eza Hattami','G1A020052@default.test',NULL,'$2y$10$8cmEhRYzRMEuejYt.yAA9uuTxSSSvXCivgAUhkumFBbMkVuVKPe4O',NULL,'2021-02-22 20:40:21',NULL,NULL),(217,'Arya Satya Ardiansyah','G1A020054@default.test',NULL,'$2y$10$IzvbKejejQv0mr2wU3x2WugwrfAl0QVd5o.OgEGvjs2Img4VUwXPe',NULL,'2021-02-22 20:40:21',NULL,NULL),(218,'Kerin Laurensyah Yudistira','G1A020055@default.test',NULL,'$2y$10$8u0gzeGraA0EJy7VZOssnOQRJY5BKk8a0uIy.X6Kj7EH/.4k2sRlG',NULL,'2021-02-22 20:40:21',NULL,NULL),(219,'Aqmal Tustri Kinanty','G1A020056@default.test',NULL,'$2y$10$X3FhwxoSF/RwPqKD5BJFGOH4s9OKpCPKChVQQkqrCuFC2Baxu0hEa',NULL,'2021-02-22 20:40:22',NULL,NULL),(220,'Destri wahyuni saragih','G1A020057@default.test',NULL,'$2y$10$IeJQqLvRZXXCrRaEgZNkO.ZYkOMIUuNR5/tPyKbwHLbtHaiUdFSka',NULL,'2021-02-22 20:40:22',NULL,NULL),(221,'Liski Barjunta Bellsi','G1A020060@default.test',NULL,'$2y$10$2GpqIdXlC44H/6Kkd01KRO52FsV3bE9kmuMDgksPgPg4GF3/g9f9a',NULL,'2021-02-22 20:40:22',NULL,NULL),(222,'Dicky Pratama','G1A020061@default.test',NULL,'$2y$10$ThFy3P/kaAjstx1GUoCK8eOs6/ldwyUg2HTpKxffoRfNFQAxK24ei',NULL,'2021-02-22 20:40:22',NULL,NULL),(223,'Muhammad Royhan Nuristiyono','G1A020062@default.test',NULL,'$2y$10$qOWFygZKovs1YMRf5jn1A..OxkIbzXBLBcCSrlwUupggFEryo5fUa',NULL,'2021-02-22 20:40:22',NULL,NULL),(224,'Rizky Cakra Mandala','G1A020063@default.test',NULL,'$2y$10$jm8yPA8i1pT.hrBvujUEyu39ygRrdFTehXyQw4Lg1dq.pMRjko.Iy',NULL,'2021-02-22 20:40:22',NULL,NULL),(225,'Novsatriadi Iqbal','G1A020065@default.test',NULL,'$2y$10$ZLc0RE/lMLh4eWD.wUx7a.GEhW3wJnvD7POib7jqm71iRM8kU5NCi',NULL,'2021-02-22 20:40:22',NULL,NULL),(226,'Andre yulidiantoni','G1A020066@default.test',NULL,'$2y$10$mZAyI4hXoGRzfKKn7hBRAOL3VxP9Y3lH9fkBJ3/nGyDsI33AlnWu.',NULL,'2021-02-22 20:40:22',NULL,NULL),(227,'Arif Rachman Setiawan','G1A020067@default.test',NULL,'$2y$10$PsDHq29tywgpyd5NuIJS5OUH.4nMQNJLiVymQp.q9ifrUSm/FD732',NULL,'2021-02-22 20:40:22',NULL,NULL),(228,'Asih Mulyati','G1A020068@default.test',NULL,'$2y$10$Mj36pOaik1LmozeDDX3Zwed5ydxkaEwq3dFFQd..efAVZC19kNKMm',NULL,'2021-02-22 20:40:22',NULL,NULL),(229,'Andre Wendi Anto','G1A020069@default.test',NULL,'$2y$10$UtnUHB6gXa2FJqJ8Sgas9eZJwkfRIJtwHXnut796kRmMkNcvdzkuO',NULL,'2021-02-22 20:40:22',NULL,NULL),(230,'Haekal Yanuarsyah','G1A020070@default.test',NULL,'$2y$10$tVzcX50Zs6tbmqkPCa4sL.oniPzQcrQSjft2aPlFllehRJuXfuGEK',NULL,'2021-02-22 20:40:22',NULL,NULL),(231,'Bagus Angrea Putra','G1A020071@default.test',NULL,'$2y$10$nOjoXJh.U6K3fOPN3f6JFeJ6BPqSKKoCvDb8h0hRsKfSx29JyAMdS',NULL,'2021-02-22 20:40:23',NULL,NULL),(232,'Alya siti raihani','G1A020072@default.test',NULL,'$2y$10$fPpWZRMYLgBr3qD8gIz6pucOlnJ1uVTPPVEFUjper6NUSALhYkc8y',NULL,'2021-02-22 20:40:23',NULL,NULL),(233,'Daffa Jesil Syaputra','G1A020073@default.test',NULL,'$2y$10$5ePCViwP5zemr9krLWclqun4tKVNaG9f0dox9t861uf321M144LIS',NULL,'2021-02-22 20:40:23',NULL,NULL),(234,'Gilang Rahmat Fadhilla','G1A020074@default.test',NULL,'$2y$10$gQaq08wxlfcHoWfzobo/j.qWUSeM1DIBRYe0RhWL7rNRh0ijmbp4a',NULL,'2021-02-22 20:40:23',NULL,NULL),(235,'Putri Aisyah Fatmawati','G1A020075@default.test',NULL,'$2y$10$3LS3tRu5T.OzuGA/mL2OA.yPYVQqWR4NJKUahmQXLlBnp9Jtl09F6',NULL,'2021-02-22 20:40:23',NULL,NULL),(236,'Aulia Salsabyla Baladewa','G1A020076@default.test',NULL,'$2y$10$K1/pjLkWcHavcEe2MItfpeQ9HazdaghP0uan/LYpEy8I6dJR/zGT.',NULL,'2021-02-22 20:40:23',NULL,NULL),(237,'Raisya Ghina Inayah','G1A020077@default.test',NULL,'$2y$10$56Kyp/t.6Dpgi1Q6utz2pu/09AtPUE5yIRwUFV2Est1pyfnpTeMbu',NULL,'2021-02-22 20:40:23',NULL,NULL),(238,'Lorensia Novena Artha Putri','G1A020079@default.test',NULL,'$2y$10$eD8kOhpUa/57sY.35b1EFe1AccupcDY3mbGWT8N.7WQFOENsrvItK',NULL,'2021-02-22 20:40:23',NULL,NULL),(239,'Nabila Gita Fitria','G1A020080@default.test',NULL,'$2y$10$3QYvccN0XheeUN5F0dVVCeHe1Uldfxf9/k/Qcr8FbYDST9EEfBWmO',NULL,'2021-02-22 20:40:23',NULL,NULL),(240,'Seto abdi Nugroho','G1A020081@default.test',NULL,'$2y$10$5lp/P3ugp6gOj9HQAjV.Nenr358N52A3PAu/I3N06qhX17qtIES3W',NULL,'2021-02-22 20:40:23',NULL,NULL),(241,'Swastomo Sabarno','G1A020082@default.test',NULL,'$2y$10$dl/RxgmYSEUEjuntnXxZSOC9h6m28dcsUksK01mxTlzgyG4ZLKrcy',NULL,'2021-02-22 20:40:23',NULL,NULL),(242,'Dea Zillan Zalilah','G1A020083@default.test',NULL,'$2y$10$roxFbNeL9lBPREbcACzrCepyn.nwFhbHkbybg5nEJze8ShVylUlw2',NULL,'2021-02-22 20:40:24',NULL,NULL),(243,'Daffa Bagus Prayudha','G1A020084@default.test',NULL,'$2y$10$k/.Hnyr0FC.66oFabozPY.bBENylhn0AosLzoCD5f0UXvQYuIxJUS',NULL,'2021-02-22 20:40:24',NULL,NULL),(244,'Muhammad Arif Al Ghozali','G1A020085@default.test',NULL,'$2y$10$gGXPfUgISTYwqkRBFeP76OEOz55c.eah30Ov6.r5xd5iPInHHsOWS',NULL,'2021-02-22 20:40:24',NULL,NULL),(245,'Rangga Aditya Melinco','G1A020086@default.test',NULL,'$2y$10$S0fD6OQYqtej463m5xW3Guz1XHNfm31WI.B4x453raISDR/zHLuty',NULL,'2021-02-22 20:40:24',NULL,NULL),(246,'Ferdian Rizki Ananda','G1A020087@default.test',NULL,'$2y$10$L36kUj8J5DlKBHNoZ5JHRuSWC5tK8rzR73u2JiygO7JNZZSqmKtD.',NULL,'2021-02-22 20:40:24',NULL,NULL),(247,'Arif Rahman Hakim','G1A020088@default.test',NULL,'$2y$10$CFM0R6ZSVx9lZW.mec4PyesBrmcE4cXYoLJ.fEtGnCw0gp6jaw4O6',NULL,'2021-02-22 20:40:24',NULL,NULL),(248,'Yusuf Pratama Nurcholik','G1A020089@default.test',NULL,'$2y$10$h0qtH4yWehngRukz2dmOBe2FMtR1wcGR.5AGU86Ug2ZAY2m9kXPDy',NULL,'2021-02-22 20:40:24',NULL,NULL),(249,'Muhammad Afiq Fachri','G1A020090@default.test',NULL,'$2y$10$2sPLwVuUqW6CenGzZaxpRuhUHCy1TKBAp1RJu9OSxkrEsnEG1fzn6',NULL,'2021-02-22 20:40:24',NULL,NULL),(250,'Rastri Pratidina','G1A020091@default.test',NULL,'$2y$10$yQ74L8f5MdYi0oGYvC5qlu/jwo/2kkDQNR802JqvvUUmLpWf9vCzK',NULL,'2021-02-22 20:40:24',NULL,NULL),(251,'Sian Nadao Sinaga','G1A020092@default.test',NULL,'$2y$10$u0mv0KcXuZCiLL25Z51Ds.uDrvJ0Fq58BAggXCDmfdA.0x/RtUTta',NULL,'2021-02-22 20:40:24',NULL,NULL),(252,'Muhammad Naufal Rofif','G1A020093@default.test',NULL,'$2y$10$gpgo60WF0ZG0casIP9vQo.UQby1Uut8LsDzpOhW/xWThR5k3.Hi1C',NULL,'2021-02-22 20:40:24',NULL,NULL),(253,'Putri Riza Umami','G1A020094@default.test',NULL,'$2y$10$Q84p/pKRQeUWIy7VbiVphen9eG1Z9sM5y8h7FWGCA4ercmUnbc9VO',NULL,'2021-02-22 20:40:25',NULL,NULL),(254,'Muhammad Willdhan Arya Putra','G1A020095@default.test',NULL,'$2y$10$.d2TXSsIhFCXHozNd5Xzped37f8iimQqA4A/HGLDU88vawIvf7kQG',NULL,'2021-02-22 20:40:25',NULL,NULL),(255,'Evlin Sitanggang','G1A020096@default.test',NULL,'$2y$10$7Q.wiKjDWCUC5P9QcazY/.oTWNk3a/lKkn4v9ys9UsGMNWW9jliHW',NULL,'2021-02-22 20:40:25',NULL,NULL),(256,'Andhika Amarullah','G1A020097@default.test',NULL,'$2y$10$F63drR4xz52wE5o89RMQ8uWqnc4xuHzNFi2bJZ4hjxG/eOCy/Czqi',NULL,'2021-02-22 20:40:25',NULL,NULL),(257,'Wiki Netra Juansyah','G1A020098@default.test',NULL,'$2y$10$GdLvauCbU5cXgcEBHs5hWuvemhWZKnqjNfViifDwt6uwYIOfn7hzS',NULL,'2021-02-22 20:40:25',NULL,NULL),(258,'Widya Zara Saputri','G1A020101@default.test',NULL,'$2y$10$QRusk8uwEh0nOMo0jA89FeN2IJyo5XduJpYO3DHIZTVGy051eNRBy',NULL,'2021-02-22 20:40:25',NULL,NULL),(259,'Wieke Arianty','G1A020102@default.test',NULL,'$2y$10$gKojGWyHuq6vZ6DC5XgSeeUoe5qskbmMUpWcUNNtQ5NLFZbAPqkem',NULL,'2021-02-22 20:40:25',NULL,NULL);
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

-- Dump completed on 2021-02-23 17:33:34
