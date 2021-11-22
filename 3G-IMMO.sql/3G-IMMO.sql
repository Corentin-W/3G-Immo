-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `agents`;
CREATE TABLE `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `agents` (`id`, `nom_agent`, `prenom_agent`, `created_at`, `updated_at`) VALUES
(1,	'WAUCAMPT',	'Corentin',	'2021-11-21 18:17:55',	NULL),
(2,	'MARTIN',	'Guillaume',	'2021-11-21 17:35:35',	NULL);

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE `annonces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ref_annonce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_annonce` float NOT NULL,
  `surface_habitable` float NOT NULL,
  `nombre_de_piece` int(11) NOT NULL,
  `agent_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `annonces_agent_id_foreign` (`agent_id`),
  CONSTRAINT `annonces_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `annonces` (`id`, `ref_annonce`, `prix_annonce`, `surface_habitable`, `nombre_de_piece`, `agent_id`, `created_at`, `updated_at`) VALUES
(1,	'123654FG',	100000,	64,	3,	2,	'2021-11-19 19:50:02',	'2021-11-21 16:52:18'),
(2,	'123654FD',	350000,	212,	6,	1,	'2021-11-19 19:49:57',	'2021-11-21 15:37:31'),
(5,	'123654FG',	147000,	120,	4,	2,	'2021-11-19 19:52:47',	'2021-11-21 16:52:25'),
(6,	'123654FK',	487100,	187,	6,	1,	'2021-11-19 19:53:18',	NULL),
(7,	'123654OD',	274000,	70,	3,	2,	'2021-11-19 19:53:45',	'2021-11-21 16:52:31'),
(8,	'124454FG',	200500,	60,	2,	1,	'2021-11-19 19:54:08',	NULL),
(11,	'123654AA',	378000,	120,	5,	2,	'2021-11-19 23:47:21',	'2021-11-21 16:55:53'),
(12,	'123654OO',	785000,	278,	7,	1,	'2021-11-19 23:47:47',	NULL),
(13,	'12345',	412000,	85,	4,	1,	'2021-11-20 09:26:56',	'2021-11-20 09:26:56'),
(14,	'1121',	41000,	17,	1,	1,	'2021-11-20 09:29:29',	'2021-11-20 09:29:29'),
(17,	'123456FF',	450520,	100,	5,	1,	'2021-11-21 15:38:22',	'2021-11-21 15:38:22'),
(18,	'547951JK',	125800,	33,	2,	1,	'2021-11-21 15:44:28',	'2021-11-21 15:44:28'),
(19,	'068976WQ',	450520,	138,	5,	1,	'2021-11-21 16:18:48',	'2021-11-21 16:18:48'),
(20,	'458741BN',	412368,	97,	4,	2,	'2021-11-21 18:23:09',	'2021-11-21 18:23:09'),
(21,	'654456JO',	999958,	127,	5,	2,	'2021-11-22 07:27:17',	'2021-11-22 07:27:17'),
(22,	'114950BN',	15313500,	87,	5,	2,	'2021-11-22 08:32:01',	NULL),
(23,	'656842MM',	245854,	135,	6,	2,	'2021-11-22 07:32:44',	'2021-11-22 07:32:44');

DROP TABLE IF EXISTS `failed_jobs`;
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


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2021_11_18_192926_create_agents_table',	1),
(6,	'2021_11_18_192936_create_annonces_table',	1),
(7,	'2021_11_18_193905_create_pivot_table_agent_annonce',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('corentin.waucampt@gmail.com',	'$2y$10$pw8rJV/TL3rPdfBrtjgSvODhfufuJ9C47QvxpWPctflieieImZGEe',	'2021-11-21 17:09:18');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pivot_table_agent_annonce`;
CREATE TABLE `pivot_table_agent_annonce` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) unsigned NOT NULL,
  `annonce_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pivot_table_agent_annonce_agent_id_foreign` (`agent_id`),
  KEY `pivot_table_agent_annonce_annonce_id_foreign` (`annonce_id`),
  CONSTRAINT `pivot_table_agent_annonce_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pivot_table_agent_annonce_annonce_id_foreign` FOREIGN KEY (`annonce_id`) REFERENCES `annonces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Corentin',	'corentin.waucampt@gmail.com',	NULL,	'$2y$10$K5a4ig/tzPmVNoSDhipNjOnsN6ExrGXvx3DvYkOut6NI4brD49ehK',	'gxqvBuirC9x3NNTs7F10s6Z3eLxxd93lgE1dKPSl7S93lfgCQmB0mlp66eyZ',	'2021-11-20 10:29:02',	'2021-11-20 10:29:02'),
(2,	'Durand',	'durand@durandtest.fr',	NULL,	'$2y$10$KSUHFQlU0bqqlOuc910gseZkrl58dM1qT/Tte58L08YJpsZHVdgRa',	NULL,	'2021-11-21 12:37:07',	'2021-11-21 12:37:07'),
(3,	'test',	'test@test.fr',	NULL,	'$2y$10$HMNYvssWeu8I/OvtVDTCN.j9AdA9r9AJEFO8eF4N/wH5C2.g8jfyy',	NULL,	'2021-11-21 12:38:27',	'2021-11-21 12:38:27'),
(4,	'test',	'test@testtest.fr',	NULL,	'$2y$10$tlYQtu5wBJepAp5r6SUtwuAC0HWev1kqpaWK/JkBCaZJJWcvoNOhO',	NULL,	'2021-11-21 12:39:15',	'2021-11-21 12:39:15'),
(5,	'test',	'test@test.test',	NULL,	'$2y$10$Gu7i2wOVhYBmdkp4erbYQ.hP1cTQH1SA3LgDVFpLNPDAszcu8odvq',	NULL,	'2021-11-21 12:40:56',	'2021-11-21 12:40:56'),
(6,	'test1',	'test1@test.fr',	NULL,	'$2y$10$VSPRNf8NE8ZPX.3.iT0d0.oJOBOs/w7/fXQE7v8TF2gEX35F9SqBy',	NULL,	'2021-11-21 12:41:40',	'2021-11-21 12:41:40');

-- 2021-11-22 08:33:31
