-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 04:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afmamsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `am_in` time NOT NULL,
  `am_out` time NOT NULL,
  `pm_in` time NOT NULL,
  `pm_out` time NOT NULL,
  `am_in_cut` time DEFAULT NULL,
  `am_out_cut` time DEFAULT NULL,
  `pm_in_cut` time DEFAULT NULL,
  `pm_out_cut` time DEFAULT NULL,
  `registration_deadline` datetime DEFAULT NULL,
  `registration_fee` decimal(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `title`, `description`, `date_start`, `date_end`, `am_in`, `am_out`, `pm_in`, `pm_out`, `am_in_cut`, `am_out_cut`, `pm_in_cut`, `pm_out_cut`, `registration_deadline`, `registration_fee`, `status`, `image_path`, `department_id`, `organization_id`, `created_at`, `updated_at`) VALUES
(1, 'awre', 'sgsgs', '2024-04-14', '2024-04-14', '07:00:00', '11:00:00', '13:00:00', '17:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 'Upcoming', 'uploads/1713026657.jpg', 1, NULL, '2024-04-13 08:44:17', '2024-04-13 08:44:17'),
(4, 'Valentines Day', 'jjdfkkjskfjjsh', '2024-04-14', '2024-04-14', '08:00:00', '11:00:00', '13:00:00', '17:00:00', '08:15:00', '11:15:00', '13:15:00', '17:15:00', NULL, NULL, 'Ongoing', 'uploads/1713059463.jpg', 1, NULL, '2024-04-13 17:51:03', '2024-04-13 17:51:03'),
(5, 'Tagislakasan 2024', 'asddd', '2024-04-16', '2024-04-16', '07:00:00', '11:00:00', '13:00:00', '17:00:00', '07:15:00', '11:15:00', '13:15:00', '17:15:00', NULL, NULL, 'Upcoming', 'uploads/1713090234.jpg', 1, NULL, '2024-04-14 02:23:54', '2024-04-14 04:22:46');

--
-- Triggers `activities`
--
DELIMITER $$
CREATE TRIGGER `update_cut_off` BEFORE INSERT ON `activities` FOR EACH ROW BEGIN
    SET NEW.am_in_cut = ADDTIME(NEW.am_in, '00:15:00');
    SET NEW.am_out_cut = ADDTIME(NEW.am_out, '00:15:00');
    SET NEW.pm_in_cut = ADDTIME(NEW.pm_in, '00:15:00');
    SET NEW.pm_out_cut = ADDTIME(NEW.pm_out, '00:15:00');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status` BEFORE INSERT ON `activities` FOR EACH ROW BEGIN
    DECLARE date_start TIMESTAMP;
    
    SET date_start = New.date_start;

    IF date_start > CURRENT_DATE() OR (date_start = CURRENT_DATE() AND New.am_in > CURRENT_TIME()) THEN
        SET NEW.status = 'Upcoming';
    ELSEIF date_start = CURRENT_DATE() AND New.am_in <= CURRENT_TIME() AND New.pm_out >= CURRENT_TIME() THEN
        SET NEW.status = 'Ongoing';
    ELSE
        SET NEW.status = 'Completed';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `student_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_id` int(11) NOT NULL,
  `am_in` datetime NOT NULL DEFAULT current_timestamp(),
  `am_out` datetime DEFAULT NULL,
  `pm_in` datetime DEFAULT NULL,
  `pm_out` datetime DEFAULT NULL,
  `attendance_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_path` varchar(58) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `attendances`
--
DELIMITER $$
CREATE TRIGGER `attendance_status_to_absent` BEFORE INSERT ON `attendances` FOR EACH ROW BEGIN 
    DECLARE date_start DATE;
    DECLARE start_time TIME;

    IF NEW.time_in IS NOT NULL THEN
        
        -- Fetch date_start and start_time from the activities table and assign them to variables
        SELECT a.date_start, a.start_time INTO date_start, start_time
        FROM activities a
        WHERE a.activity_id = NEW.activity_id;
        
        -- Check if the date part of time_in matches date_start and time_in is within 15 minutes after start_time 
        IF DATE(NEW.time_in) = date_start AND NEW.time_in <= TIMESTAMPADD(MINUTE, 15, CONCAT(CAST(date_start AS DATETIME), ' ', start_time)) THEN 
            SET NEW.attendance_status = 'No Out'; 
        ELSE
            SET NEW.attendance_status = 'Absent';
        END IF; 
    ELSE
        SET NEW.attendance_status = 'Absent';
    END IF; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_attendance_status_to_present` BEFORE UPDATE ON `attendances` FOR EACH ROW BEGIN
    DECLARE date_end DATE;
    DECLARE end_time TIME;

    IF NEW.time_out IS NOT NULL THEN
        -- Fetch date_end and end_time from the activities table and assign them to variables
        SELECT a.date_end, a.end_time INTO date_end, end_time
        FROM activities a
        WHERE a.activity_id = NEW.activity_id;
        
        -- Check if the date part of time_out matches date_end and time_out is within 15 minutes after end_time 
        IF DATE(NEW.time_out) = date_end AND NEW.time_out <= TIMESTAMPADD(MINUTE, 15, CONCAT(date_end, ' ', end_time)) THEN 
            SET NEW.attendance_status = 'Present'; 
        ELSE
            SET NEW.attendance_status = 'Absent';
        END IF; 
    ELSE
        SET NEW.attendance_status = 'Absent';
    END IF; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'Bachelor of Science in Information Systems'),
(2, 'Bachelor of Science in Tourism Management'),
(3, 'Bachelor of Science in Hospitality Management'),
(4, 'Bachelor of Library in Information Science'),
(5, 'Bachelor of Secondary Education (Mathematics)'),
(6, 'Bachelor of Secondary Education (Physical Science)'),
(7, 'Bachelor of Special Needs Education');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_05_113759_create_activity_table', 2),
(6, '2024_02_05_140740_create_department_table', 3),
(7, '2024_02_05_160022_create_activity_table', 4),
(8, '2024_02_05_161126_create_activities_table', 5),
(9, '2024_02_05_161936_create_activities_table', 6),
(10, '2024_02_06_130004_create_department_table', 7),
(11, '2024_02_06_131311_create__departments_table', 8),
(12, '2024_02_06_131458_create__departments_table', 9),
(13, '2024_02_06_132610_create__organizations_table', 10),
(14, '2024_02_06_140640_create__activities_table', 11),
(15, '2024_02_06_141010_create_activities_table', 12),
(16, '2019_05_03_000001_create_customer_columns', 13),
(17, '2019_05_03_000002_create_subscriptions_table', 13),
(18, '2019_05_03_000003_create_subscription_items_table', 13),
(19, '2024_02_11_044240_create_users_table', 14),
(20, '2024_02_18_113623_create_activities_table', 15),
(21, '2024_02_26_021115_create_attendance_table', 16),
(22, '2024_02_27_140256_create_scanneddata_table', 17),
(23, '2024_02_29_024716_create_attendances_table', 18),
(24, '2024_03_30_041815_create_users_table', 19),
(25, '2024_04_01_170310_create_photos_table', 20),
(26, '2024_04_03_035410_create_topics_table', 21),
(27, '2024_03_31_045250_create_topics_table', 22),
(28, '2024_04_01_040747_create_comments_table', 22),
(29, '2024_04_13_163542_create_activities_table', 23),
(30, '2024_04_13_163907_create_topics_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`organization_id`, `organization_name`) VALUES
(1, 'JPCS-CCC'),
(2, 'BLC');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_path`, `created_at`, `updated_at`) VALUES
(1, '', '2024-04-01 09:05:09', '2024-04-01 09:05:09'),
(2, '', '2024-04-01 09:10:51', '2024-04-01 09:10:51'),
(3, '', '2024-04-01 09:10:59', '2024-04-01 09:10:59'),
(4, '', '2024-04-01 09:10:59', '2024-04-01 09:10:59'),
(5, '', '2024-04-01 09:10:59', '2024-04-01 09:10:59'),
(6, '', '2024-04-01 09:10:59', '2024-04-01 09:10:59'),
(7, '', '2024-04-01 09:11:00', '2024-04-01 09:11:00'),
(8, '', '2024-04-01 09:11:00', '2024-04-01 09:11:00'),
(9, '', '2024-04-01 09:11:00', '2024-04-01 09:11:00'),
(10, '', '2024-04-01 09:11:00', '2024-04-01 09:11:00'),
(11, '', '2024-04-01 09:11:00', '2024-04-01 09:11:00'),
(12, '', '2024-04-01 09:11:00', '2024-04-01 09:11:00'),
(13, '', '2024-04-01 09:11:01', '2024-04-01 09:11:01'),
(14, '', '2024-04-01 09:11:01', '2024-04-01 09:11:01'),
(15, '', '2024-04-01 09:11:01', '2024-04-01 09:11:01'),
(16, '', '2024-04-01 09:11:01', '2024-04-01 09:11:01'),
(17, '', '2024-04-01 09:11:01', '2024-04-01 09:11:01'),
(18, '', '2024-04-01 09:11:02', '2024-04-01 09:11:02'),
(19, '', '2024-04-01 09:11:02', '2024-04-01 09:11:02'),
(20, '', '2024-04-01 09:11:02', '2024-04-01 09:11:02'),
(21, '', '2024-04-01 09:11:02', '2024-04-01 09:11:02'),
(22, '', '2024-04-01 09:11:02', '2024-04-01 09:11:02'),
(23, '', '2024-04-01 09:11:03', '2024-04-01 09:11:03'),
(24, '', '2024-04-01 09:11:04', '2024-04-01 09:11:04'),
(25, '', '2024-04-01 09:11:04', '2024-04-01 09:11:04'),
(26, '', '2024-04-01 09:11:04', '2024-04-01 09:11:04'),
(27, '', '2024-04-01 09:11:04', '2024-04-01 09:11:04'),
(28, '', '2024-04-01 09:11:04', '2024-04-01 09:11:04'),
(29, '', '2024-04-01 09:11:05', '2024-04-01 09:11:05'),
(30, '', '2024-04-01 09:11:05', '2024-04-01 09:11:05'),
(31, '', '2024-04-01 09:11:05', '2024-04-01 09:11:05'),
(32, '', '2024-04-01 09:11:05', '2024-04-01 09:11:05'),
(33, '', '2024-04-01 09:11:05', '2024-04-01 09:11:05'),
(34, '', '2024-04-01 09:11:05', '2024-04-01 09:11:05'),
(35, '', '2024-04-01 09:11:06', '2024-04-01 09:11:06'),
(36, '', '2024-04-01 09:11:06', '2024-04-01 09:11:06'),
(37, '', '2024-04-01 09:11:06', '2024-04-01 09:11:06'),
(38, '', '2024-04-01 09:11:06', '2024-04-01 09:11:06'),
(39, '', '2024-04-01 09:11:06', '2024-04-01 09:11:06'),
(40, '', '2024-04-01 09:11:06', '2024-04-01 09:11:06'),
(41, '', '2024-04-01 09:11:07', '2024-04-01 09:11:07'),
(42, '', '2024-04-01 09:11:07', '2024-04-01 09:11:07'),
(43, '', '2024-04-01 09:11:12', '2024-04-01 09:11:12'),
(44, '', '2024-04-01 09:11:12', '2024-04-01 09:11:12'),
(45, '', '2024-04-01 09:11:13', '2024-04-01 09:11:13'),
(46, '', '2024-04-01 09:11:13', '2024-04-01 09:11:13'),
(47, '', '2024-04-01 09:11:13', '2024-04-01 09:11:13'),
(48, '', '2024-04-01 09:11:13', '2024-04-01 09:11:13'),
(49, '', '2024-04-01 09:11:13', '2024-04-01 09:11:13'),
(50, '', '2024-04-01 09:11:14', '2024-04-01 09:11:14'),
(51, '', '2024-04-01 09:11:14', '2024-04-01 09:11:14'),
(52, '', '2024-04-01 09:11:14', '2024-04-01 09:11:14'),
(53, '', '2024-04-01 09:11:14', '2024-04-01 09:11:14'),
(54, '', '2024-04-01 09:11:14', '2024-04-01 09:11:14'),
(55, '', '2024-04-01 09:11:14', '2024-04-01 09:11:14'),
(56, '', '2024-04-01 09:11:15', '2024-04-01 09:11:15'),
(57, '', '2024-04-01 09:11:15', '2024-04-01 09:11:15'),
(58, '', '2024-04-01 09:11:15', '2024-04-01 09:11:15'),
(59, '', '2024-04-01 09:11:15', '2024-04-01 09:11:15'),
(60, '', '2024-04-01 09:11:15', '2024-04-01 09:11:15'),
(61, '', '2024-04-01 09:11:15', '2024-04-01 09:11:15'),
(62, '', '2024-04-01 09:11:16', '2024-04-01 09:11:16'),
(63, '', '2024-04-01 09:11:17', '2024-04-01 09:11:17'),
(64, '', '2024-04-01 09:11:18', '2024-04-01 09:11:18'),
(65, '', '2024-04-01 09:11:18', '2024-04-01 09:11:18'),
(66, '', '2024-04-01 09:11:18', '2024-04-01 09:11:18'),
(67, '', '2024-04-01 09:11:18', '2024-04-01 09:11:18'),
(68, '', '2024-04-01 09:11:18', '2024-04-01 09:11:18'),
(69, '', '2024-04-01 09:11:19', '2024-04-01 09:11:19'),
(70, '', '2024-04-01 09:11:19', '2024-04-01 09:11:19'),
(71, '', '2024-04-01 09:11:19', '2024-04-01 09:11:19'),
(72, '', '2024-04-01 09:11:19', '2024-04-01 09:11:19'),
(73, '', '2024-04-01 09:11:19', '2024-04-01 09:11:19'),
(74, '', '2024-04-01 09:11:19', '2024-04-01 09:11:19'),
(75, '', '2024-04-01 09:11:20', '2024-04-01 09:11:20'),
(76, '', '2024-04-01 09:11:20', '2024-04-01 09:11:20'),
(77, '', '2024-04-01 09:11:20', '2024-04-01 09:11:20'),
(78, '', '2024-04-01 09:11:20', '2024-04-01 09:11:20'),
(79, '', '2024-04-01 09:11:20', '2024-04-01 09:11:20'),
(80, '', '2024-04-01 09:11:20', '2024-04-01 09:11:20'),
(81, '', '2024-04-01 09:11:20', '2024-04-01 09:11:20'),
(82, '', '2024-04-01 09:11:21', '2024-04-01 09:11:21'),
(83, '', '2024-04-01 09:11:56', '2024-04-01 09:11:56'),
(84, '', '2024-04-01 09:12:05', '2024-04-01 09:12:05'),
(85, '', '2024-04-01 09:12:23', '2024-04-01 09:12:23'),
(86, '', '2024-04-01 09:14:01', '2024-04-01 09:14:01'),
(87, '', '2024-04-01 09:14:06', '2024-04-01 09:14:06'),
(88, '', '2024-04-01 09:15:01', '2024-04-01 09:15:01'),
(89, '', '2024-04-01 09:21:09', '2024-04-01 09:21:09'),
(90, 'imgCapture/captured_image_660c565217f0d.png', '2024-04-02 11:02:42', '2024-04-02 11:02:42'),
(91, 'imgCapture/captured_image_660c56c1e1eb3.jpeg', '2024-04-02 11:04:33', '2024-04-02 11:04:33'),
(92, 'imgCapture/captured_image_660c57165d71b .jpeg', '2024-04-02 11:05:58', '2024-04-02 11:05:58'),
(93, 'imgCapture/2024.04.02 - 07.07.11pm .jpeg', '2024-04-02 11:07:11', '2024-04-02 11:07:11'),
(94, 'imgCapture/2024.04.02 - 07.12.27pm .jpeg', '2024-04-02 11:12:27', '2024-04-02 11:12:27'),
(95, 'imgCapture/captured_image_660c60b05c909 .jpeg', '2024-04-02 11:46:56', '2024-04-02 11:46:56'),
(96, 'imgCapture/captured_image_660c63ef606cd .jpeg', '2024-04-02 12:00:47', '2024-04-02 12:00:47'),
(97, 'imgCapture/captured_image_660d07f35b4ea .jpeg', '2024-04-02 23:40:35', '2024-04-02 23:40:35'),
(98, 'imgCapture/2024.04.06 - 04.07.31am .jpeg', '2024-04-05 20:07:31', '2024-04-05 20:07:31'),
(99, 'imgCapture/2024.04.06 - 07.16.28am .jpeg', '2024-04-05 23:16:28', '2024-04-05 23:16:28'),
(100, 'imgCapture/2024.04.15 - 04.48.42am .jpeg', '2024-04-14 20:48:42', '2024-04-14 20:48:42'),
(101, 'imgCapture/2024.04.15 - 04.51.20am .jpeg', '2024-04-14 20:51:20', '2024-04-14 20:51:20'),
(102, 'imgCapture/2024.04.15 - 04.51.22am .jpeg', '2024-04-14 20:51:22', '2024-04-14 20:51:22'),
(103, 'imgCapture/2024.04.15 - 04.53.45am .jpeg', '2024-04-14 20:53:45', '2024-04-14 20:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `category`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'hjjsdhf', 'shfshfu', 'jdjsjfkjshf', 'uploads/1713100211.jpg', '2024-04-14 05:10:11', '2024-04-14 05:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `user_role` enum('admin','student','officer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `email_verified_at`, `department_id`, `user_role`, `password`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '21-03616', 'Admin', 'admin@gmail.com', NULL, 0, 'admin', '$2y$10$RNrAVVpOqaLMakk8QlMo0eG3V7Lauq0PVyg9orIFw69php7S48k4K', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '21-03617', 'Officer', 'officer@gmail.com', NULL, 1, 'officer', '$2y$10$YDXuaL.nwrVjp9nYy.j55uo45nx5ENag2yiRsqmaxI0euNjEIYJoa', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '21-03618', 'Student', 'student@gmail.com', NULL, 1, 'student', '$2y$10$eGSJRddWYNfkHkfDrQmSHOJTnFem43wcTPrGxLwTIIqm9FQkSnGzy', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`organization_id`);

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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `organization_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
