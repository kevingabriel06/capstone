-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 08:32 AM
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
  `activity_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `registration_deadline` date DEFAULT NULL,
  `registration_fee` decimal(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `title`, `description`, `date_start`, `date_end`, `start_time`, `end_time`, `registration_deadline`, `registration_fee`, `status`, `image_path`, `department_id`, `organization_id`, `created_at`, `updated_at`) VALUES
(5, 'Kevin\'s Day', 'HI Welcome to my Activity', '2024-03-02', '2024-03-02', '08:00:00', '17:00:00', '2024-03-02', '5000.00', 'Ongoing', 'uploads/1709369522.jpg', 1, NULL, '2024-03-02 00:52:02', '2024-03-02 00:52:02'),
(6, 'Valentines Day', 'activity', '2024-02-08', '2024-02-08', '08:00:00', '17:00:00', '2024-02-07', '5000.00', 'Completed', 'uploads/1709712495.jpg', 3, NULL, '2024-03-06 00:08:15', '2024-03-06 00:08:15'),
(8, 'kev\'s', 'hjj', '2024-03-28', '2024-03-28', '20:05:00', '20:10:00', '2024-03-27', '5000.00', 'Upcoming', 'uploads/1711623876.jpg', 2, NULL, '2024-03-28 03:04:36', '2024-03-28 03:04:36'),
(9, 'kev\'s', 'jkj', '2024-03-28', '2024-03-28', '11:06:00', '11:10:00', '2024-03-27', '5000.00', 'Completed', 'uploads/1711623976.jpg', 5, NULL, '2024-03-28 03:06:16', '2024-03-28 03:06:16'),
(10, 'Black Saturday', 'jk', '2024-03-30', '2024-03-30', '07:00:00', '17:00:00', '2024-03-29', '50.00', 'Upcoming', 'uploads/1711674170.jpg', 7, NULL, '2024-03-28 17:02:50', '2024-03-30 19:15:27'),
(13, 'Valentines Day part 3', NULL, '2024-03-31', '2024-03-31', '09:00:00', '16:00:00', NULL, NULL, 'Ongoing', 'uploads/', 6, NULL, '2024-03-30 18:28:05', '2024-03-30 18:28:05'),
(14, 'Valentines Day part 3hjh', NULL, '2024-04-01', '2024-04-01', '07:00:00', '15:00:00', NULL, NULL, 'Upcoming', 'uploads/1711852146.jpg', 1, NULL, '2024-03-30 18:28:54', '2024-03-30 18:29:06');

--
-- Triggers `activities`
--
DELIMITER $$
CREATE TRIGGER `update_status` BEFORE INSERT ON `activities` FOR EACH ROW BEGIN
    DECLARE date_start TIMESTAMP;
    
    SET date_start = New.date_start;

    IF date_start > CURRENT_DATE() OR (date_start = CURRENT_DATE() AND New.start_time > CURRENT_TIME()) THEN
        SET NEW.status = 'Upcoming';
    ELSEIF date_start = CURRENT_DATE() AND New.start_time <= CURRENT_TIME() AND New.end_time >= CURRENT_TIME() THEN
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
  `time_in` datetime NOT NULL DEFAULT current_timestamp(),
  `time_out` datetime DEFAULT NULL,
  `attendance_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `student_id`, `activity_id`, `time_in`, `time_out`, `attendance_status`, `updated_at`, `created_at`) VALUES
(24, '21-03529', 9, '2024-03-28 11:11:02', NULL, 'Absent 3', '2024-03-28 03:11:02', '2024-03-28 11:11:02');

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
            SET NEW.attendance_status = 'Absent 3';
        END IF; 
    ELSE
        SET NEW.attendance_status = 'Absent 3';
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
        IF DATE(NEW.time_out) = date_end AND NEW.time_out <= TIMESTAMPADD(MINUTE, 15, CONCAT(CAST(date_end AS DATETIME), ' ', end_time)) THEN 
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
(1, '2014_10_12_000000_create_users_table', 1),
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
(23, '2024_02_29_024716_create_attendances_table', 18);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, '21-03529', 'neil', NULL, NULL, '$2y$10$DHTyGHxTU.ivjYkQIyZBlO0r3MxblSrGmogK.3B7A2k7AEo3NXNEy', NULL, '2024-02-18 22:26:31', '2024-02-18 22:26:31', NULL, NULL, NULL, NULL);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
