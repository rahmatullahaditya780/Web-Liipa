-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: liipa
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('liipa-cache-1c31ecdcf43a4c45335e125fdd661c66','i:1;',1781161840),('liipa-cache-1c31ecdcf43a4c45335e125fdd661c66:timer','i:1781161840;',1781161840),('liipa-cache-283d6ecc86d4fdf6ede8bf34a5df1c3a','i:1;',1781161613),('liipa-cache-283d6ecc86d4fdf6ede8bf34a5df1c3a:timer','i:1781161613;',1781161613),('liipa-cache-5c785c036466adea360111aa28563bfd556b5fba','i:2;',1781117919),('liipa-cache-5c785c036466adea360111aa28563bfd556b5fba:timer','i:1781117919;',1781117919);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Aksesoris','aksesoris','2026-06-10 10:11:48','2026-06-10 10:11:48'),(2,'Tas','tas','2026-06-10 10:11:48','2026-06-10 10:11:48'),(3,'Pakaian','pakaian','2026-06-10 10:11:48','2026-06-10 10:11:48');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_06_11_000001_create_categories_table',1),(5,'2026_06_11_000002_create_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,0) NOT NULL DEFAULT '0',
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL DEFAULT '0.0',
  `color_variants_count` tinyint unsigned NOT NULL DEFAULT '1',
  `marketplace_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_name_index` (`name`),
  KEY `products_category_id_created_at_index` (`category_id`,`created_at`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Gantungan Kunci Perca','gantungan-kunci-perca','Aksesoris unik dari kain perca pilihan, dibuat tangan oleh pengrajin lokal.',15000,NULL,'https://down-id.img.susercontent.com/file/id-11134207-7qul6-lhh5spslfvtz9e',4.5,3,NULL,1,1,'2026-06-10 10:11:48','2026-06-10 22:22:56'),(2,'Baju Patchwork','baju-patchwork','Baju unik dari kain perca dengan motif patchwork yang khas.',30000,NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9JxF-1I7yhPNbTTFQuRK8Pm_pdmR-8zTJxA&s',4.2,2,NULL,1,3,'2026-06-10 10:11:48','2026-06-10 10:11:48'),(3,'Bros Kain Perca','bros-kain-perca','Aksesoris unik dari kain perca, cocok untuk pelengkap gaya harianmu.',15000,NULL,'https://down-id.img.susercontent.com/file/id-11134207-7qul6-lhh5spslfvtz9e',4.5,3,NULL,1,1,'2026-06-10 10:11:48','2026-06-10 10:11:48'),(4,'Scrunchie Perca','scrunchie-perca','Ikat rambut dari kain perca berkualitas dengan beragam pilihan warna.',15000,NULL,'https://down-id.img.susercontent.com/file/id-11134207-7qul6-lhh5spslfvtz9e',4.5,3,NULL,1,1,'2026-06-10 10:11:48','2026-06-10 10:11:48'),(5,'Outer Patchwork','outer-patchwork','Outer kasual dari kain perca daur ulang, nyaman dipakai sehari-hari.',30000,NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9JxF-1I7yhPNbTTFQuRK8Pm_pdmR-8zTJxA&s',4.2,2,NULL,0,3,'2026-06-10 10:11:48','2026-06-10 10:11:48'),(6,'Tas Coba','tas-coba','Tas Coba',20000,NULL,'https://i.pinimg.com/736x/83/f6/31/83f6312d1da610bf13bd813f627111bc.jpg',4.0,2,NULL,1,2,'2026-06-10 23:12:44','2026-06-10 23:14:24');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('2ijmjCHtXCQwV5TR7Ad6yIIoqMXWcEPb7QN8CUAe',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJ2UHRvdTNXTWpKMFl2ZTVuamxORFlCVjF0SkU2WEU1YlhUcDZtRm5KIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2thdGFsb2dcL2dhbnR1bmdhbi1rdW5jaS1wZXJjYSIsInJvdXRlIjoiY2F0YWxvZy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1781158937),('a3lIxCnNH2T7LZWoEGTHFp5efurTfipVrPPl9sTE',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiI1amIxcGs3eU1pMkdNcTM4TjFCbXI3OVpIVVdPS3NKSnkxdVBZVlVaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2tvbnRhayIsInJvdXRlIjoiY29udGFjdCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1781160757),('DflsknRKktJBI4u8HRbRBXUGzzOOjAz6jiIWhgzR',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiI4V3BWVWpxUEFEMEtzR2xYQ3Jxb0FvN1VrbDBFdDEyTExISTN0UVNEIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2thdGFsb2ciLCJyb3V0ZSI6ImNhdGFsb2cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781158936),('DU7YQE2QPCLwDXTROs6mdf8YSdhe3Qw0IAs7rmBB',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJCQzdXeVAzOHp2MHlNT2E4Y29FTU9JMEpYNVZIMDRYT05WWjNFZWJJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3QiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781161319),('hRK9zX3Lb9hZwV6zuYEeTj8xLGtIk7P8I0wu1pNu',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','eyJfdG9rZW4iOiJQS1k2b3c3Y3lPdGNVRkhmSDc5bGZKS3ZiUUNLWUZzYXJPajRHWlNPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2thdGFsb2c/cT10YXMiLCJyb3V0ZSI6ImNhdGFsb2cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',1781162111),('jiEnFbdu4lcOv7FQ8tpreFbVzHfdLs3IRctrgGYN',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJRZGozRGxhamRpb1hlVEoyTkc1bXFJcTNYdUdFY2VrZnYyQkJlTkRMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2thdGFsb2c/cT10YXMiLCJyb3V0ZSI6ImNhdGFsb2cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781158054),('KnbKW1u73Srsl8qPsynQsWQSoSScJi8B1essH2u2',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJtME91eURHSlAxOFhpUFAxRGJmaDdpamlEdGlPVnhiQU9qWlhBUkp0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL3RlbnRhbmcta2FtaSIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781161320),('NnlrbJUP9rhvktkixYMhoYYcsPCctiW1vkPxkjar',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJ6ZkFIUlBpa1NSQXVGZ2Rneng5WFloOHZxNklTZXExOGJKSGNDYlMzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2thdGFsb2ciLCJyb3V0ZSI6ImNhdGFsb2cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781158948),('PXuX6Cx5U2nC0nzmmER6zq1MXjr8RbcbXrIGbc3I',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJ2Zm9Ya2lBNHo1dUY5YlZ4VVZsQTBycWtzZ3dzdUg0eHBacmtEU3ZDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL3RlbnRhbmcta2FtaSIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781160102),('Qg3aRWtyGKyANwTeGuRUYi5ulGvCK8AmcBeFq5zi',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJ0bldHMWQ4NDY1dVFDcWJFOUlPS2VkeHNaWG9PSkF2YkFvWGp0UGx3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2thdGFsb2ciLCJyb3V0ZSI6ImNhdGFsb2cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781158042),('YSYLIGmrWlrtXtzN3kYAIVdwPpO7zNEQZWsxx9vP',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; id-ID) WindowsPowerShell/5.1.26100.8655','eyJfdG9rZW4iOiJxZXV6QUpaOGx2bGg2Y1c2S3NWMHpUUExqU0I3OU5tQUx6RmNIbVBpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xpaXBhLnRlc3RcL2thdGFsb2ciLCJyb3V0ZSI6ImNhdGFsb2cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1781158975);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin Liipa','admin','admin@liipa.id',NULL,'$2y$12$.8z45XAXNiEvME5YkWNmJuqat9SsSvzQ.xTT0q82hUuffXCY.SD8.','admin',NULL,'2026-06-10 10:11:48','2026-06-10 23:08:00'),(2,'coba','coba','rahmatullahaditya780@gmail.com',NULL,'$2y$12$mN2gHkFS.qwvZns.jbs0I.P2x7XSVJryB4l1dqrEpirJxdzg6.GT.','user',NULL,'2026-06-10 10:58:02','2026-06-10 10:58:02');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'liipa'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-11 15:28:25
