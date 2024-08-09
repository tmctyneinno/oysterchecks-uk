-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2024 at 03:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oystercheck_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-24 19:34:19', '2024-03-24 19:34:19'),
(2, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 08:57:16', '2024-03-25 08:57:16'),
(3, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 08:58:09', '2024-03-25 08:58:09'),
(4, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 08:59:02', '2024-03-25 08:59:02'),
(5, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 08:59:47', '2024-03-25 08:59:47'),
(6, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 09:31:59', '2024-03-25 09:31:59'),
(7, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 10:09:05', '2024-03-25 10:09:05'),
(8, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-25 10:30:27', '2024-03-25 10:30:27'),
(9, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-26 09:51:53', '2024-03-26 09:51:53'),
(10, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-26 10:50:07', '2024-03-26 10:50:07'),
(11, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-03-28 08:46:21', '2024-03-28 08:46:21'),
(12, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-02 02:32:53', '2024-04-02 02:32:53'),
(13, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-02 03:26:43', '2024-04-02 03:26:43'),
(14, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-02 08:32:00', '2024-04-02 08:32:00'),
(15, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-07 07:07:53', '2024-04-07 07:07:53'),
(16, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-07 07:41:00', '2024-04-07 07:41:00'),
(17, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-07 12:46:32', '2024-04-07 12:46:32'),
(18, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-07 15:13:02', '2024-04-07 15:13:02'),
(19, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-07 16:38:57', '2024-04-07 16:38:57'),
(20, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 08:55:13', '2024-04-12 08:55:13'),
(21, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 09:19:29', '2024-04-12 09:19:29'),
(22, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 10:50:00', '2024-04-12 10:50:00'),
(23, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 11:49:53', '2024-04-12 11:49:53'),
(24, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-12 13:09:11', '2024-04-12 13:09:11'),
(25, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-15 08:31:33', '2024-04-15 08:31:33'),
(26, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-15 09:05:02', '2024-04-15 09:05:02'),
(27, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-15 14:43:24', '2024-04-15 14:43:24'),
(28, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-15 16:00:36', '2024-04-15 16:00:36'),
(29, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 06:39:00', '2024-04-18 06:39:00'),
(30, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 10:02:54', '2024-04-18 10:02:54'),
(31, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 10:32:02', '2024-04-18 10:32:02'),
(32, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 11:03:53', '2024-04-18 11:03:53'),
(33, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 13:00:31', '2024-04-18 13:00:31'),
(34, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 13:53:46', '2024-04-18 13:53:46'),
(35, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 14:34:17', '2024-04-18 14:34:17'),
(36, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', '2024-04-18 16:22:10', '2024-04-18 16:22:10'),
(37, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-22 09:53:59', '2024-04-22 09:53:59'),
(38, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-22 12:12:55', '2024-04-22 12:12:55'),
(39, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-22 13:51:17', '2024-04-22 13:51:17'),
(40, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-23 09:22:14', '2024-04-23 09:22:14'),
(41, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-23 10:42:22', '2024-04-23 10:42:22'),
(42, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-23 13:28:54', '2024-04-23 13:28:54'),
(43, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 04:19:05', '2024-04-24 04:19:05'),
(44, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 06:31:37', '2024-04-24 06:31:37'),
(45, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 07:29:32', '2024-04-24 07:29:32'),
(46, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 07:56:10', '2024-04-24 07:56:10'),
(47, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 10:21:17', '2024-04-24 10:21:17'),
(48, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 11:03:26', '2024-04-24 11:03:26'),
(49, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 11:36:52', '2024-04-24 11:36:52'),
(50, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 13:18:18', '2024-04-24 13:18:18'),
(51, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 13:55:30', '2024-04-24 13:55:30'),
(52, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-24 15:28:22', '2024-04-24 15:28:22'),
(53, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36', '2024-04-24 17:18:36', '2024-04-24 17:18:36'),
(54, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36', '2024-04-24 18:50:20', '2024-04-24 18:50:20'),
(55, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-25 06:47:08', '2024-04-25 06:47:08'),
(56, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-25 12:48:45', '2024-04-25 12:48:45'),
(57, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-25 18:17:51', '2024-04-25 18:17:51'),
(58, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-25 22:27:44', '2024-04-25 22:27:44'),
(59, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-26 10:28:59', '2024-04-26 10:28:59'),
(60, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-26 13:12:17', '2024-04-26 13:12:17'),
(61, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-29 08:53:22', '2024-04-29 08:53:22'),
(62, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-29 11:47:31', '2024-04-29 11:47:31'),
(63, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-29 14:15:10', '2024-04-29 14:15:10'),
(64, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-04-30 09:22:44', '2024-04-30 09:22:44'),
(65, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-02 08:10:24', '2024-05-02 08:10:24'),
(66, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-02 08:31:55', '2024-05-02 08:31:55'),
(67, 10, 'New Login Request', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', '2024-05-02 16:29:14', '2024-05-02 16:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `adverse_media`
--

CREATE TABLE `adverse_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `verification_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weightedScore` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queryTags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queryStartDate` datetime DEFAULT NULL,
  `queryEndDate` datetime DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagsAnalysis` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adverse_media_categories`
--

CREATE TABLE `adverse_media_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicantId` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `externalUserId` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicantKey` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspectionId` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sourceKey` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyemail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyphone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeofbirth` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryofbirth` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registrationnumber` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyType` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxpayer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `websitelink` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyInfo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companycreateddate` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `user_id`, `status`, `applicantId`, `externalUserId`, `applicantKey`, `inspectionId`, `sourceKey`, `applicant_type`, `companyname`, `firstName`, `lastName`, `middleName`, `email`, `companyemail`, `phone`, `companyphone`, `placeofbirth`, `dateofbirth`, `country`, `countryofbirth`, `gender`, `address`, `registrationnumber`, `companyType`, `taxpayer`, `websitelink`, `info`, `companyInfo`, `review`, `companycreateddate`, `created_at`, `updated_at`) VALUES
(1, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'company', 'd', NULL, NULL, NULL, 'company@gmail.com', NULL, '321', NULL, NULL, NULL, 'United Kingdom', NULL, NULL, NULL, 'w', 'Private', 'tax', 'https://sumsub.com', NULL, NULL, NULL, '2024-04-26', '2024-04-26 00:08:52', '2024-04-26 00:08:52'),
(2, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'company', 's', NULL, NULL, NULL, 'company@gmail.com', NULL, '321', NULL, NULL, NULL, 'Afghanistan', NULL, NULL, 'lagal address', 'w', 'Private', 'tax', 'https://sumsub.com', NULL, NULL, NULL, '2024-04-26', '2024-04-26 00:10:38', '2024-04-26 00:10:38'),
(3, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, '123', NULL, 'uk', '2024-04-26', 'United Kingdom', 'United Kingdom', 'female', 'address', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 00:12:28', '2024-04-26 00:12:28'),
(4, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, '123', NULL, 'uk', '2024-04-26', 'United Kingdom', 'United Kingdom', 'female', 'address', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 00:13:57', '2024-04-26 00:13:57'),
(5, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'company', 's', NULL, NULL, NULL, 'company@gmail.com', NULL, '321', NULL, NULL, NULL, 'Afghanistan', NULL, NULL, 'lagal address', 'w', 'Private', 'tax', 'https://sumsub.com', NULL, NULL, NULL, '2024-04-26', '2024-04-26 00:14:02', '2024-04-26 00:14:02'),
(6, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'company', 's', NULL, NULL, NULL, 'company@gmail.com', NULL, '1234567', NULL, NULL, NULL, 'Afghanistan', NULL, NULL, 'First Gate', 'w', 'Private', NULL, 'https://sumsub.com', NULL, NULL, NULL, '2024-04-26', '2024-04-26 00:14:34', '2024-04-26 00:14:34'),
(7, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'company', 's', NULL, NULL, NULL, 'company@gmail.com', NULL, '09890', NULL, NULL, NULL, 'United Kingdom', NULL, NULL, 'Second', 'w', 'Private', 'tax', 'https://sumsub.com', NULL, NULL, NULL, '2024-04-26', '2024-04-26 00:16:19', '2024-04-26 00:16:19'),
(8, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:30:00', '2024-04-26 10:30:00'),
(9, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:30:13', '2024-04-26 10:30:13'),
(10, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:37:33', '2024-04-26 10:37:33'),
(11, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:38:39', '2024-04-26 10:38:39'),
(12, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:39:17', '2024-04-26 10:39:17'),
(13, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:39:27', '2024-04-26 10:39:27'),
(14, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:39:55', '2024-04-26 10:39:55'),
(15, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:40:11', '2024-04-26 10:40:11'),
(16, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:41:05', '2024-04-26 10:41:05'),
(17, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:41:59', '2024-04-26 10:41:59'),
(18, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:42:22', '2024-04-26 10:42:22'),
(19, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:45:29', '2024-04-26 10:45:29'),
(20, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:45:41', '2024-04-26 10:45:41'),
(21, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:46:07', '2024-04-26 10:46:07'),
(22, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 10:55:07', '2024-04-26 10:55:07'),
(23, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:07:06', '2024-04-26 11:07:06'),
(24, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:07:16', '2024-04-26 11:07:16'),
(25, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:07:30', '2024-04-26 11:07:30'),
(26, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:07:42', '2024-04-26 11:07:42'),
(27, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:08:07', '2024-04-26 11:08:07'),
(28, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:08:17', '2024-04-26 11:08:17'),
(29, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:08:28', '2024-04-26 11:08:28'),
(30, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:14:01', '2024-04-26 11:14:01'),
(31, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:14:12', '2024-04-26 11:14:12'),
(32, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'LastName', 'Victor', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 11:14:23', '2024-04-26 11:14:23'),
(33, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:16:08', '2024-04-26 13:16:08'),
(34, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:20:32', '2024-04-26 13:20:32'),
(35, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:23:33', '2024-04-26 13:23:33'),
(36, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:23:56', '2024-04-26 13:23:56'),
(37, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:24:10', '2024-04-26 13:24:10'),
(38, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:24:24', '2024-04-26 13:24:24'),
(39, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:28:36', '2024-04-26 13:28:36'),
(40, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'Last Name', 'Middle Name', 'eshanokpe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 13:29:45', '2024-04-26 13:29:45'),
(41, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'eshanokpe@gmail.com', NULL, '123', NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 14:01:03', '2024-04-26 14:01:03'),
(42, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'eshanokpe@gmail.com', NULL, '12333', NULL, 'uk', '2024-04-26', 'United Kingdom', 'Algeria', 'male', 'address', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 14:07:17', '2024-04-26 14:07:17'),
(43, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'eshanokpe@gmail.com', NULL, '123', NULL, 'uk', NULL, 'United Kingdom', NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 14:07:41', '2024-04-26 14:07:41'),
(44, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'eshanokpe@gmail.com', NULL, '123', NULL, 'uk', NULL, 'United Kingdom', NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-26 14:12:21', '2024-04-26 14:12:21'),
(45, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 08:53:55', '2024-04-29 08:53:55'),
(46, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 08:55:41', '2024-04-29 08:55:41'),
(47, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:07:03', '2024-04-29 09:07:03'),
(48, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:09:12', '2024-04-29 09:09:12'),
(49, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:09:41', '2024-04-29 09:09:41'),
(50, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:10:23', '2024-04-29 09:10:23'),
(51, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:11:00', '2024-04-29 09:11:00'),
(52, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '234', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Afghanistan', 'female', 'Addresss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:16:15', '2024-04-29 09:16:15'),
(53, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, '123', NULL, 'uk', NULL, 'Afghanistan', NULL, 'Select', 'address', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 09:17:31', '2024-04-29 09:17:31'),
(54, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'deerrrr', 'deerrrr', 'Middle Name', 'marrysunday52@gmail.com', NULL, '123', NULL, 'uk', '2024-04-29', 'United Kingdom', 'Albania', 'female', 'address', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 11:12:15', '2024-04-29 11:12:15'),
(55, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'deerrrr', 'Middle Name', 'marrysunday52@gmail.com', NULL, '123', NULL, 'uk', NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 11:48:55', '2024-04-29 11:48:55'),
(56, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'deerrrr', 'Middle Name', 'marrysunday52@gmail.com', NULL, '123', NULL, 'uk', NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:06:03', '2024-04-29 12:06:03'),
(57, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'deerrrr', 'Middle Name', 'marrysunday52@gmail.com', NULL, '123', NULL, 'uk', NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:09:51', '2024-04-29 12:09:51'),
(58, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'deerrrr', 'Middle Name', 'marrysunday52@gmail.com', NULL, '123', NULL, 'uk', NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:21:18', '2024-04-29 12:21:18'),
(59, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:21:45', '2024-04-29 12:21:45'),
(60, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:22:48', '2024-04-29 12:22:48'),
(61, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:22:49', '2024-04-29 12:22:49'),
(62, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:23:31', '2024-04-29 12:23:31'),
(63, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:23:32', '2024-04-29 12:23:32'),
(64, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:25:19', '2024-04-29 12:25:19'),
(65, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:32:06', '2024-04-29 12:32:06'),
(66, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:44:28', '2024-04-29 12:44:28'),
(67, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 12:44:38', '2024-04-29 12:44:38'),
(68, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'First Name', 'LastName', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 13:03:08', '2024-04-29 13:03:08'),
(69, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'LastName', 'First Name', 'Middle Name', 'marrysunday52@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-29 14:15:25', '2024-04-29 14:15:25'),
(70, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'Moses', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-30 09:23:22', '2024-04-30 09:23:22'),
(71, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'Moses', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-30 09:24:46', '2024-04-30 09:24:46'),
(72, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:34:08', '2024-05-02 08:34:08'),
(73, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:34:58', '2024-05-02 08:34:58'),
(74, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:35:12', '2024-05-02 08:35:12'),
(75, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:35:55', '2024-05-02 08:35:55'),
(76, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:35:58', '2024-05-02 08:35:58'),
(77, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:36:26', '2024-05-02 08:36:26'),
(78, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:36:28', '2024-05-02 08:36:28'),
(79, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:38:45', '2024-05-02 08:38:45'),
(80, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:38:48', '2024-05-02 08:38:48'),
(81, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'FirstName', 'LastNAem', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, 'x', NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 08:50:38', '2024-05-02 08:50:38'),
(82, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 20:09:34', '2024-05-02 20:09:34'),
(83, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 20:10:27', '2024-05-02 20:10:27'),
(84, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 20:10:57', '2024-05-02 20:10:57'),
(85, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 20:10:57', '2024-05-02 20:10:57'),
(86, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 20:10:57', '2024-05-02 20:10:57'),
(87, '10', NULL, NULL, NULL, NULL, NULL, NULL, 'individual', NULL, 'Eshanokpe', 'Daniel', 'middle', 'eshanokpe@gmail.com', NULL, '08139267960', NULL, NULL, NULL, 'Nigeria', NULL, 'Select', 'Lagos, Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-02 20:24:38', '2024-05-02 20:24:38'),
(88, '2', 'not verified', '66b583b534fdbb0305d76128', '66b583b538295', 'GVBRNAYKKDHZAJ', '66b583b534fdbb0305d76128', 'fnbuKGNMGLCJgZ3y7cZVFV10GoVVZ9Y2', 'individual', '', 'gfd', 'df', 'Middlename', 'eee@gmail.com', '', '08123385904', '', '', '', 'Afghanistan', '', 'M', '', '', NULL, NULL, '', '{\"firstName\":\"gfd\",\"firstNameEn\":\"gfd\",\"middleName\":\"Middlename\",\"middleNameEn\":\"Middlename\",\"lastName\":\"df\",\"lastNameEn\":\"df\",\"dob\":\"2024-08-09\",\"gender\":\"M\",\"placeOfBirth\":\"Lagos\",\"placeOfBirthEn\":\"Lagos\",\"countryOfBirth\":\"American Samoa\",\"stateOfBirth\":\"Lagos\",\"companyInfo\":{\"companyName\":\"\",\"registrationNumber\":\"\",\"country\":\"Afghanistan\",\"type\":\"individual\",\"email\":\"\",\"phone\":\"\",\"website\":\"\"}}', '{\"companyName\":\"\",\"registrationNumber\":\"\",\"country\":\"Afghanistan\",\"type\":\"individual\",\"email\":\"\",\"phone\":\"\",\"website\":\"\"}', '{\"reviewId\":\"WyCXa\",\"attemptId\":\"TwBQF\",\"attemptCnt\":0,\"levelName\":\"basic-kyc-level\",\"levelAutoCheckMode\":null,\"createDate\":\"2024-08-09 02:49:25+0000\",\"reviewStatus\":\"init\",\"priority\":0}', NULL, '2024-08-09 01:49:25', '2024-08-09 01:49:25'),
(89, '2', 'not verified', '66b58a2cf7d7e4104cfa7b9b', '66b58a2b643b0', 'GVBRNAYKKDHZAJ', '66b58a2cf7d7e4104cfa7b9b', 'fnbuKGNMGLCJgZ3y7cZVFV10GoVVZ9Y2', 'company', 'nn', '', '', '', 'com@gmail.com', 'com@gmail.com', '8765678', '8765678', '', '', 'Albania', '', '', '', '765', NULL, NULL, 'wwww', '{\"firstName\":\"\",\"middleName\":\"\",\"lastName\":\"\",\"placeOfBirth\":\"\",\"placeOfBirthEn\":\"\",\"countryOfBirth\":\"\",\"stateOfBirth\":\"\",\"companyInfo\":{\"companyName\":\"nn\",\"registrationNumber\":\"765\",\"country\":\"Albania\",\"incorporatedOn\":\"2024-08-09 00:00:00\",\"type\":\"company\",\"email\":\"com@gmail.com\",\"phone\":\"8765678\",\"website\":\"wwww\"}}', '{\"companyName\":\"nn\",\"registrationNumber\":\"765\",\"country\":\"Albania\",\"incorporatedOn\":\"2024-08-09 00:00:00\",\"type\":\"company\",\"email\":\"com@gmail.com\",\"phone\":\"8765678\",\"website\":\"wwww\"}', '{\"reviewId\":\"uegwS\",\"attemptId\":\"mTJaq\",\"attemptCnt\":0,\"levelName\":\"basic-kyc-level\",\"levelAutoCheckMode\":null,\"createDate\":\"2024-08-09 03:17:00+0000\",\"reviewStatus\":\"init\",\"priority\":0}', NULL, '2024-08-09 02:17:00', '2024-08-09 02:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `applicants_field_inputs`
--

CREATE TABLE `applicants_field_inputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inputid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants_field_inputs`
--

INSERT INTO `applicants_field_inputs` (`id`, `slug`, `name`, `placeholder`, `type`, `is_required`, `label`, `inputid`, `created_at`, `updated_at`) VALUES
(1, 'individual', 'First Name', 'First Name', 'text', '1', 'First Name', 'firstname', '2024-04-25 10:05:12', '2024-04-25 10:05:12'),
(2, 'individual', 'Last Name', 'Last Name', 'text', '1', 'Last Name', 'lastname', '2024-04-25 10:05:12', NULL),
(3, 'individual', 'Phone', 'Phone', 'number', '1', 'Phone', 'phone', '2024-04-25 11:07:00', NULL),
(4, 'individual', 'Email', 'Email', 'email', '1', 'Email', 'email', '2024-04-25 11:09:31', NULL),
(5, 'individual', 'Place of birth', 'Place of birth', 'text', '1', 'Place of birth', 'placeofbirth', '2024-04-25 11:12:32', NULL),
(6, 'individual', 'State of birth', 'State of birth', 'text', '1', 'State', 'stateofbirth', '2024-04-25 11:12:32', NULL),
(7, 'individual', 'Middle name', 'Middle name', 'text', '1', 'Middle name', 'middlename', '2024-04-25 11:37:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applicants_partner_services`
--

CREATE TABLE `applicants_partner_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `clientId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_blocklist`
--

CREATE TABLE `applicant_blocklist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_check`
--

CREATE TABLE `applicant_check` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `reasonCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_document`
--

CREATE TABLE `applicant_document` (
  `id` int(11) NOT NULL,
  `applicantId` text DEFAULT NULL,
  `clientId` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `inspectionId` text DEFAULT NULL,
  `externalUserId` text DEFAULT NULL,
  `firstName` text DEFAULT NULL,
  `lastName` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `placeOfBirth` text DEFAULT NULL,
  `country` text NOT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `idDocSetType` text DEFAULT NULL,
  `types` text DEFAULT NULL,
  `reprocessing` text DEFAULT NULL,
  `levelName` text DEFAULT NULL,
  `reviewStatus` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_sandbox`
--

CREATE TABLE `applicant_sandbox` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `reviewAnswer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejectLabels` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewRejectType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clientComment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moderationComment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `changing_top_level_info`
--

CREATE TABLE `changing_top_level_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sourceKey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `questionnaires` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `company_name`, `company_email`, `company_address`, `company_phone`, `image`, `is_activated`, `created_at`, `updated_at`) VALUES
(3, 9, 'DanniTech', NULL, NULL, NULL, NULL, 0, '2024-03-24 18:23:10', '2024-03-24 18:23:10'),
(4, 10, 'DanniTech', NULL, NULL, NULL, NULL, 0, '2024-03-24 18:34:18', '2024-03-24 18:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `custom_applicant_tags`
--

CREATE TABLE `custom_applicant_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `custom_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documentType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `id_Card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drivers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_inputs`
--

CREATE TABLE `field_inputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_required` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inputid` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `field_inputs`
--

INSERT INTO `field_inputs` (`id`, `slug`, `name`, `placeholder`, `type`, `is_required`, `label`, `inputid`, `created_at`, `updated_at`) VALUES
(1, 'candidate', 'First Name', 'First Name', 'text', '1', 'First Name', 'firstname', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `id_document`
--

CREATE TABLE `id_document` (
  `id` int(11) NOT NULL,
  `applicantId` int(11) NOT NULL,
  `idDocType` text NOT NULL,
  `idDocSubType` text NOT NULL,
  `country` text NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `lastName` text NOT NULL,
  `issuedDate` text NOT NULL,
  `validUntil` text NOT NULL,
  `number` text NOT NULL,
  `dob` text NOT NULL,
  `placeOfBirth` text NOT NULL,
  `createdAt` int(11) NOT NULL,
  `updatedAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `import_applicant`
--

CREATE TABLE `import_applicant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_03_21_105641_create_document_type_table', 1),
(2, '2024_03_21_110122_create_applicant_check_table', 2),
(3, '2024_03_21_110314_create_applicant_blocklist_table', 3),
(4, '2024_03_21_110423_create_applicants_partner_services_table', 4),
(5, '2024_03_21_110541_create_resetting_signle_verification_step__table', 5),
(6, '2024_03_21_111108_create_changing_top_level_info_table', 6),
(7, '2024_03_21_111236_create_import_applicant_table', 7),
(8, '2024_03_21_111337_create_risk_level_applicant_table', 8),
(9, '2024_03_21_111618_create_custom_applicant_tags_table', 9),
(10, '2024_03_21_111718_create_applicant_sandbox_table', 9),
(11, '2024_03_24_144559_create_users_table', 10),
(12, '2014_10_12_100000_create_password_resets_table', 11),
(13, '2021_06_30_113934_create_wallets_table', 11),
(14, '2021_10_08_120151_create_clients_table', 11),
(15, '2021_10_25_022059_create_activity_logs_table', 12),
(16, '2021_10_06_111515_create_site_settings_table', 13),
(17, '2024_04_18_082352_create_verification_table', 14),
(18, '2024_04_18_090522_add_field_inputs_table', 15),
(19, '2024_04_22_121512_create_adverse_media_table', 16),
(20, '2024_04_22_122542_create_adverse_media_categories_table', 17),
(21, '2024_04_22_131446_create_adverse_media_categories_table', 18),
(22, '2024_04_25_084956_create_applicants_table', 19),
(23, '2024_04_25_092828_update_applicants_table', 20),
(24, '2024_04_25_094359_create_documents_table', 21),
(25, '2024_04_25_105754_add_applicants_field_table', 22),
(26, '2014_10_12_000000_create_users_table', 23),
(27, '2019_08_19_000000_create_failed_jobs_table', 23),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resetting_signle_verification_step_`
--

CREATE TABLE `resetting_signle_verification_step_` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `idDocSetType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `questionnaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proof_of_residence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selfie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selfie2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `risk_level_applicant`
--

CREATE TABLE `risk_level_applicant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicantId` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risklevel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_md` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` tinyint(1) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT '1 = candidate, 2 = client, 3 = admin',
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `email_verified`, `email_verified_at`, `password`, `user_type`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Morgans', 'Admin', 'support@oysterchecks.com', '', NULL, NULL, '$2y$10$faKrN9K7diGMXH1WFtMTw.I1pe/Fl2JedbIZO7oH1TFgIBFlR5ZFC', 3, 1, NULL, '2024-08-05 09:37:05', '2024-08-05 09:37:05'),
(2, 'Dan', 'Code', 'eshanokpe@gmail.com', '080', NULL, NULL, '$2y$10$Mao1pb17gneOHkIPCr/syOllZ6KmOWCnq8beepmYR7dRmj794KKS2', 2, 1, NULL, '2024-08-05 09:37:05', '2024-08-05 09:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `slug`, `name`, `report_type`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'identity', 'Identity', 'identity', 5000, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(2, 'pvc', 'Permanent Voters Card', 'pvc', 250, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(3, 'bvn', 'Bank Verification Number', 'bvn', 500, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(4, 'nin', 'National Identity Number', 'nin', 900, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(5, 'ndl', 'Nigerian Driver\'s License', 'drivers-license', 200, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(6, 'phone-number', 'Phone Number', 'phone-number', 500, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(7, 'bank-account', 'Bank Account', 'bank-account', 400, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(8, 'compare-images', 'Compare Images', 'compare-images', 400, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(9, 'cac', 'Company Search (CAC)', 'business', 200, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(10, 'tin', 'Tax Identification Number', 'business', 200, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(11, 'individual-address', 'Individual Address Verification', 'address', 1000, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(12, 'reference-address', 'Reference Address Verification', 'address', 1000, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(13, 'business-address', 'Business Address Verification', 'address', 1000, '2024-08-05 10:52:10', '2024-08-05 10:52:10'),
(14, 'applicants', 'applicants', 'applicants', 0, '2024-08-09 01:30:11', '2024-08-09 01:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_balance` decimal(13,2) NOT NULL DEFAULT 0.00,
  `avail_balance` decimal(13,2) NOT NULL DEFAULT 0.00,
  `total_balance` decimal(13,2) NOT NULL DEFAULT 0.00,
  `bonus_balance` decimal(13,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adverse_media`
--
ALTER TABLE `adverse_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adverse_media_verification_id_foreign` (`verification_id`),
  ADD KEY `adverse_media_user_id_foreign` (`user_id`);

--
-- Indexes for table `adverse_media_categories`
--
ALTER TABLE `adverse_media_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants_field_inputs`
--
ALTER TABLE `applicants_field_inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants_partner_services`
--
ALTER TABLE `applicants_partner_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_blocklist`
--
ALTER TABLE `applicant_blocklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_check`
--
ALTER TABLE `applicant_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_document`
--
ALTER TABLE `applicant_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_sandbox`
--
ALTER TABLE `applicant_sandbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `changing_top_level_info`
--
ALTER TABLE `changing_top_level_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_applicant_tags`
--
ALTER TABLE `custom_applicant_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `field_inputs`
--
ALTER TABLE `field_inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_document`
--
ALTER TABLE `id_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_applicant`
--
ALTER TABLE `import_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `resetting_signle_verification_step_`
--
ALTER TABLE `resetting_signle_verification_step_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_level_applicant`
--
ALTER TABLE `risk_level_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `adverse_media`
--
ALTER TABLE `adverse_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adverse_media_categories`
--
ALTER TABLE `adverse_media_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `applicants_field_inputs`
--
ALTER TABLE `applicants_field_inputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `applicants_partner_services`
--
ALTER TABLE `applicants_partner_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_blocklist`
--
ALTER TABLE `applicant_blocklist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_check`
--
ALTER TABLE `applicant_check`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_document`
--
ALTER TABLE `applicant_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_sandbox`
--
ALTER TABLE `applicant_sandbox`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `changing_top_level_info`
--
ALTER TABLE `changing_top_level_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `custom_applicant_tags`
--
ALTER TABLE `custom_applicant_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_inputs`
--
ALTER TABLE `field_inputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `id_document`
--
ALTER TABLE `id_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `import_applicant`
--
ALTER TABLE `import_applicant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resetting_signle_verification_step_`
--
ALTER TABLE `resetting_signle_verification_step_`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `risk_level_applicant`
--
ALTER TABLE `risk_level_applicant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adverse_media`
--
ALTER TABLE `adverse_media`
  ADD CONSTRAINT `adverse_media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `adverse_media_verification_id_foreign` FOREIGN KEY (`verification_id`) REFERENCES `verifications` (`id`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
