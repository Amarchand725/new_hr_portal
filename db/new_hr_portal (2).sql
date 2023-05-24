-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 08:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_hr_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_departments`
--

CREATE TABLE `announcement_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status_id` bigint(20) NOT NULL COMMENT 'Default 7 means approved',
  `work_shift_id` bigint(20) NOT NULL,
  `in_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'check in date time',
  `behavior` varchar(100) NOT NULL COMMENT 'O=>out, I=In',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_holder_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `branch_code` varchar(100) NOT NULL,
  `iban` varchar(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `education` varchar(100) DEFAULT NULL,
  `last_employer_name` varchar(100) DEFAULT NULL,
  `last_salary` varchar(100) DEFAULT NULL,
  `last_designation` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=in-active',
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` bigint(20) DEFAULT NULL,
  `parent_department_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `manager_id`, `parent_department_id`, `name`, `description`, `location`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Main Department', NULL, NULL, 1, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, NULL, NULL, 'N/A', NULL, NULL, 1, NULL, '2023-05-24 00:17:06', '2023-05-24 00:17:06'),
(3, NULL, 1, 'Software Development', '<p>Software Development</p>', NULL, 1, NULL, '2023-05-23 19:25:09', '2023-05-23 19:25:09'),
(4, NULL, 1, 'Accounts & Finance', '<p>Accounts &amp; Finance</p>', NULL, 1, NULL, '2023-05-23 19:25:29', '2023-05-23 19:25:29'),
(5, NULL, 1, 'Sales', '<p>Sales</p>', NULL, 1, NULL, '2023-05-23 19:25:51', '2023-05-23 19:25:51'),
(6, NULL, 1, 'Creative Writing', '<p>Creative Writing</p>', NULL, 1, NULL, '2023-05-23 19:26:28', '2023-05-23 19:26:28'),
(7, NULL, 1, 'Brand Management', '<p>Brand Management</p>', NULL, 1, NULL, '2023-05-23 19:26:44', '2023-05-23 19:26:44'),
(8, NULL, 1, 'SEO Department', NULL, NULL, 1, NULL, '2023-05-23 19:26:56', '2023-05-23 19:26:56'),
(9, NULL, 1, 'Digital Marketing', NULL, NULL, 1, NULL, '2023-05-23 19:27:08', '2023-05-23 19:27:08'),
(10, NULL, 1, 'Quality Assurance', NULL, NULL, 1, NULL, '2023-05-23 19:27:17', '2023-05-23 19:27:17'),
(11, NULL, 1, 'Business Development', NULL, NULL, 1, NULL, '2023-05-23 19:27:27', '2023-05-23 19:27:27'),
(12, NULL, 1, 'Customer Support Unit-1', NULL, NULL, 1, NULL, '2023-05-23 19:27:37', '2023-05-23 19:27:37'),
(13, NULL, 1, 'Creative Design', '<p>Creative Design</p>', NULL, 1, NULL, '2023-05-23 19:27:59', '2023-05-23 19:27:59'),
(14, NULL, 1, 'Video Animation', '<p>Video Animation</p>', NULL, 1, NULL, '2023-05-23 19:28:20', '2023-05-23 19:28:20'),
(15, NULL, 1, 'Management Committee', '<p>Management Committee</p>', NULL, 1, NULL, '2023-05-23 19:28:39', '2023-05-23 19:28:39'),
(16, NULL, 1, 'Upwork', '<p>Upwork</p>', NULL, 1, NULL, '2023-05-23 19:29:03', '2023-05-23 19:29:03'),
(17, NULL, 1, 'Customer Support Unit 2', '<p>Customer Support Unit 2</p>', NULL, 1, NULL, '2023-05-23 19:29:15', '2023-05-23 19:29:15'),
(18, NULL, 1, 'PPC Unit 1', '<p>PPC Unit 1</p>', NULL, 1, NULL, '2023-05-23 19:29:30', '2023-05-23 19:29:30'),
(19, NULL, 1, 'Production Unit', '<p>Production Unit</p>', NULL, 1, NULL, '2023-05-23 19:29:44', '2023-05-23 19:29:44'),
(20, NULL, 1, 'Design Unit', '<p>Design Unit</p>', NULL, 1, NULL, '2023-05-23 19:29:59', '2023-05-23 19:29:59'),
(21, NULL, 1, 'Animation Unit', '<p>Animation Unit</p>', NULL, 1, NULL, '2023-05-23 19:30:11', '2023-05-23 19:30:11'),
(22, NULL, 1, 'Website Unit', '<p>Website Unit</p>', NULL, 1, NULL, '2023-05-23 19:30:21', '2023-05-23 19:30:21'),
(23, NULL, 1, 'Support Team 3', '<p>Support Team 3</p>', NULL, 1, NULL, '2023-05-23 19:30:37', '2023-05-23 19:30:37'),
(24, NULL, 1, 'App Unit', '<p>App Unit</p>', NULL, 1, NULL, '2023-05-23 19:30:55', '2023-05-23 19:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `department_users`
--

CREATE TABLE `department_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_users`
--

INSERT INTO `department_users` (`id`, `department_id`, `user_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 24, 2, '0000-00-00', NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `department_work_shifts`
--

CREATE TABLE `department_work_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `work_shift_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_work_shifts`
--

INSERT INTO `department_work_shifts` (`id`, `department_id`, `work_shift_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2023-05-23 19:25:51', '2023-05-23 19:25:51'),
(2, 6, 1, '2023-05-23 19:26:28', '2023-05-23 19:26:28'),
(3, 7, 1, '2023-05-23 19:26:44', '2023-05-23 19:26:44'),
(4, 13, 1, '2023-05-23 19:27:59', '2023-05-23 19:27:59'),
(5, 15, 1, '2023-05-23 19:28:39', '2023-05-23 19:28:39'),
(6, 19, 1, '2023-05-23 19:29:44', '2023-05-23 19:29:44'),
(7, 20, 1, '2023-05-23 19:29:59', '2023-05-23 19:29:59'),
(8, 23, 1, '2023-05-23 19:30:37', '2023-05-23 19:30:37'),
(9, 24, 1, '2023-05-23 19:30:55', '2023-05-23 19:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Vice President - Business Unit Head', NULL, 1, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Director', '<p>Director</p>', 1, NULL, '2023-05-23 18:11:16', '2023-05-23 18:11:16'),
(3, 'N/A', '<p>N/A</p>', 1, NULL, '2023-05-23 18:18:51', '2023-05-23 18:18:51'),
(4, 'Manager - Account & Finance', '<p>Manager - Account &amp; Finance</p>', 1, NULL, '2023-05-23 18:19:04', '2023-05-23 18:19:04'),
(5, 'CEO', '<p>CEO</p>', 1, NULL, '2023-05-23 18:19:13', '2023-05-23 18:19:13'),
(6, 'Senior Vice President (SVP) - Management Committee', '<p>Senior Vice President (SVP) - Management Committee</p>', 1, NULL, '2023-05-23 18:19:21', '2023-05-23 18:19:21'),
(7, 'Manager - Business Development', '<p>Manager - Business Development</p>', 1, NULL, '2023-05-23 18:19:29', '2023-05-23 18:19:29'),
(8, 'Assistant Executive - Customer Support', '<p>Assistant Executive - Customer Support</p>', 1, NULL, '2023-05-23 18:19:36', '2023-05-23 18:19:36'),
(9, 'Senior Manager - Business Development', '<p>Senior Manager - Business Development</p>', 1, NULL, '2023-05-23 18:19:44', '2023-05-23 18:19:44'),
(10, 'Senior Manager - Customer Support', '<p>Senior Manager - Customer Support</p>', 1, NULL, '2023-05-23 18:19:52', '2023-05-23 18:19:52'),
(11, '3D Animator', '<p>3D Animator</p>', 1, NULL, '2023-05-23 18:20:10', '2023-05-23 18:20:10'),
(12, 'Sr. Executive Vice President - SEVP', '<p>Sr. Executive Vice President - SEVP</p>', 1, NULL, '2023-05-23 18:20:20', '2023-05-23 18:20:20'),
(13, 'Assistant Vice President - Customer Support', '<p>Assistant Vice President - Customer Support</p>', 1, NULL, '2023-05-23 18:20:27', '2023-05-23 18:20:27'),
(14, 'Sr.Manager', '<p>Sr.Manager</p>', 1, NULL, '2023-05-23 18:20:35', '2023-05-23 18:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `discrepancies`
--

CREATE TABLE `discrepancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) DEFAULT NULL,
  `attendance_id` bigint(20) NOT NULL,
  `status_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `type` varchar(100) NOT NULL COMMENT 'late or early',
  `description` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_statuses`
--

CREATE TABLE `employment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 1,
  `alias` varchar(100) DEFAULT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_statuses`
--

INSERT INTO `employment_statuses` (`id`, `name`, `class`, `description`, `is_default`, `alias`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Probation', 'warning', NULL, 1, 'Probation', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Permanent', 'primary', NULL, 0, 'Permanent', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 'Terminated', 'danger', NULL, 1, NULL, NULL, '2023-05-23 18:41:53', '2023-05-23 18:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_histories`
--

CREATE TABLE `job_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `parent_designation_id` bigint(20) DEFAULT NULL,
  `designation_id` bigint(20) DEFAULT NULL,
  `parent_position_id` bigint(20) DEFAULT NULL,
  `position_id` bigint(20) DEFAULT NULL,
  `employment_status_id` bigint(20) NOT NULL,
  `joining_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_histories`
--

INSERT INTO `job_histories` (`id`, `created_by`, `user_id`, `parent_designation_id`, `designation_id`, `parent_position_id`, `position_id`, `employment_status_id`, `joining_date`, `end_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, 1, '2023-05-23', '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 1, 1, NULL, 1, NULL, NULL, 2, '2023-05-23', NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 1, 2, NULL, 3, NULL, NULL, 2, '2023-01-01', NULL, NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL COMMENT 'Paid or unpaid',
  `amount` double(8,2) DEFAULT NULL COMMENT 'Amount of leaves of this type of leave.',
  `spacial_percentage` double(8,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `agent` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Profile Updated', 'http://localhost/hr_portal/profile/update/1', 'PATCH', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:13:40', '2023-05-23 17:13:40'),
(2, 'Setting details added', 'http://localhost/hr_portal/settings', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:14:11', '2023-05-23 17:14:11'),
(3, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(4, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(5, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(6, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(7, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(8, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(9, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(10, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(11, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(12, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(13, 'New Work shift Added', 'http://localhost/hr_portal/work_shifts', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(14, 'New Role Added', 'http://localhost/hr_portal/roles', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:52:23', '2023-05-23 17:52:23'),
(15, 'New Role Added', 'http://localhost/hr_portal/roles', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:52:43', '2023-05-23 17:52:43'),
(16, 'New Role Added', 'http://localhost/hr_portal/roles', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:53:02', '2023-05-23 17:53:02'),
(17, 'Role Updated', 'http://localhost/hr_portal/roles/4', 'PUT', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:53:19', '2023-05-23 17:53:19'),
(18, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:27', '2023-05-23 17:54:27'),
(19, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:37', '2023-05-23 17:54:37'),
(20, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:47', '2023-05-23 17:54:47'),
(21, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:54:55', '2023-05-23 17:54:55'),
(22, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:03', '2023-05-23 17:55:03'),
(23, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:11', '2023-05-23 17:55:11'),
(24, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:19', '2023-05-23 17:55:19'),
(25, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:27', '2023-05-23 17:55:27'),
(26, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:34', '2023-05-23 17:55:34'),
(27, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:42', '2023-05-23 17:55:42'),
(28, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:50', '2023-05-23 17:55:50'),
(29, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:55:57', '2023-05-23 17:55:57'),
(30, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:05', '2023-05-23 17:56:05'),
(31, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:16', '2023-05-23 17:56:16'),
(32, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:24', '2023-05-23 17:56:24'),
(33, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:31', '2023-05-23 17:56:31'),
(34, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:39', '2023-05-23 17:56:39'),
(35, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:47', '2023-05-23 17:56:47'),
(36, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:56:54', '2023-05-23 17:56:54'),
(37, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:02', '2023-05-23 17:57:02'),
(38, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:11', '2023-05-23 17:57:11'),
(39, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:18', '2023-05-23 17:57:18'),
(40, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:30', '2023-05-23 17:57:30'),
(41, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:38', '2023-05-23 17:57:38'),
(42, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:45', '2023-05-23 17:57:45'),
(43, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:57:56', '2023-05-23 17:57:56'),
(44, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:04', '2023-05-23 17:58:04'),
(45, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:11', '2023-05-23 17:58:11'),
(46, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:19', '2023-05-23 17:58:19'),
(47, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:26', '2023-05-23 17:58:26'),
(48, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:58:35', '2023-05-23 17:58:35'),
(49, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 17:59:48', '2023-05-23 17:59:48'),
(50, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:00', '2023-05-23 18:00:00'),
(51, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:10', '2023-05-23 18:00:10'),
(52, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:19', '2023-05-23 18:00:19'),
(53, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:27', '2023-05-23 18:00:27'),
(54, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:35', '2023-05-23 18:00:35'),
(55, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:43', '2023-05-23 18:00:43'),
(56, 'New Position Inserted', 'http://localhost/hr_portal/positions', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:00:51', '2023-05-23 18:00:51'),
(57, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:11:16', '2023-05-23 18:11:16'),
(58, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:18:51', '2023-05-23 18:18:51'),
(59, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:04', '2023-05-23 18:19:04'),
(60, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:13', '2023-05-23 18:19:13'),
(61, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:21', '2023-05-23 18:19:21'),
(62, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:29', '2023-05-23 18:19:29'),
(63, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:36', '2023-05-23 18:19:36'),
(64, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:44', '2023-05-23 18:19:44'),
(65, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:19:52', '2023-05-23 18:19:52'),
(66, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:10', '2023-05-23 18:20:10'),
(67, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:20', '2023-05-23 18:20:20'),
(68, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:27', '2023-05-23 18:20:27'),
(69, 'New Designation Added', 'http://localhost/hr_portal/designations', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:20:35', '2023-05-23 18:20:35'),
(70, 'New Employment Status Added', 'http://localhost/hr_portal/employment_status', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 18:41:53', '2023-05-23 18:41:53'),
(71, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:25:09', '2023-05-23 19:25:09'),
(72, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:25:29', '2023-05-23 19:25:29'),
(73, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:25:51', '2023-05-23 19:25:51'),
(74, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:26:28', '2023-05-23 19:26:28'),
(75, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:26:44', '2023-05-23 19:26:44'),
(76, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:26:56', '2023-05-23 19:26:56'),
(77, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:08', '2023-05-23 19:27:08'),
(78, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:17', '2023-05-23 19:27:17'),
(79, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:27', '2023-05-23 19:27:27'),
(80, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:37', '2023-05-23 19:27:37'),
(81, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:27:59', '2023-05-23 19:27:59'),
(82, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:28:20', '2023-05-23 19:28:20'),
(83, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:28:39', '2023-05-23 19:28:39'),
(84, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:03', '2023-05-23 19:29:03'),
(85, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:15', '2023-05-23 19:29:15'),
(86, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:30', '2023-05-23 19:29:30'),
(87, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:44', '2023-05-23 19:29:44'),
(88, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:29:59', '2023-05-23 19:29:59'),
(89, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:11', '2023-05-23 19:30:11'),
(90, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:21', '2023-05-23 19:30:21'),
(91, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:37', '2023-05-23 19:30:37'),
(92, 'New Department Added', 'http://localhost/hr_portal/departments', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-23 19:30:55', '2023-05-23 19:30:55'),
(93, 'Employee added', 'http://localhost/hr_portal/employees', 'POST', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Sa', 1, '2023-05-24 12:44:19', '2023-05-24 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(100) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_03_005317_create_permission_tables', 1),
(6, '2023_05_03_185209_create_profiles_table', 1),
(7, '2023_05_03_200801_create_designations_table', 1),
(8, '2023_05_03_200843_create_positions_table', 1),
(9, '2023_05_03_200908_create_work_shifts_table', 1),
(10, '2023_05_03_200924_create_departments_table', 1),
(11, '2023_05_03_200939_create_announcements_table', 1),
(12, '2023_05_04_193435_create_employment_statuses_table', 1),
(13, '2023_05_04_224452_create_job_histories_table', 1),
(14, '2023_05_04_230534_create_salary_histories_table', 1),
(15, '2023_05_04_231506_create_statuses_table', 1),
(16, '2023_05_05_210039_create_log_activities_table', 1),
(17, '2023_05_08_211133_create_work_shift_details_table', 1),
(18, '2023_05_09_201743_create_department_work_shifts_table', 1),
(19, '2023_05_09_211150_create_department_users_table', 1),
(20, '2023_05_09_235844_create_announcement_departments_table', 1),
(21, '2023_05_11_180532_create_profile_cover_images_table', 1),
(22, '2023_05_12_233009_create_user_employment_statuses_table', 1),
(23, '2023_05_15_214247_create_bank_details_table', 1),
(24, '2023_05_16_191325_create_user_contacts_table', 1),
(25, '2023_05_18_004538_create_settings_table', 1),
(26, '2023_05_19_001216_create_leave_types_table', 1),
(27, '2023_05_22_221454_create_documents_table', 1),
(28, '2023_05_22_223417_create_user_leaves_table', 1),
(29, '2023_05_23_192149_create_discrepancies_table', 1),
(30, '2023_05_23_192846_create_attendances_table', 1),
(31, '2023_05_23_205031_create_working_shift_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(100) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(100) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guard_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `label`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role', 'role-list', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'role', 'role-create', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 'role', 'role-edit', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(4, 'role', 'role-delete', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(5, 'permission', 'permission-list', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(6, 'permission', 'permission-create', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(7, 'permission', 'permission-edit', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(8, 'permission', 'permission-delete', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(9, 'user', 'user-list', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(10, 'user', 'user-create', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(11, 'user', 'user-edit', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(12, 'user', 'user-delete', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(13, 'logactivity', 'logactivity-list', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(14, 'logactivity', 'logactivity-create', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(15, 'logactivity', 'logactivity-edit', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(16, 'logactivity', 'logactivity-delete', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(100) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Business Development - Mobile Apps', '<p>Business Development - Mobile Apps</p>', 1, NULL, '2023-05-23 17:54:27', '2023-05-23 17:54:27'),
(2, 'Creative Content Writers', '<p>Creative Content Writers</p>', 1, NULL, '2023-05-23 17:54:37', '2023-05-23 17:54:37'),
(3, 'Creative Graphic Designer', '<p>Creative Graphic Designer</p>', 1, NULL, '2023-05-23 17:54:47', '2023-05-23 17:54:47'),
(4, 'iOS App Developer', '<p>iOS App Developer</p>', 1, NULL, '2023-05-23 17:54:55', '2023-05-23 17:54:55'),
(5, 'Sr. Software Engineer', '<p>Sr. Software Engineer</p>', 1, NULL, '2023-05-23 17:55:03', '2023-05-23 17:55:03'),
(6, 'Storyboard Artist', '<p>Storyboard Artist</p>', 1, NULL, '2023-05-23 17:55:11', '2023-05-23 17:55:11'),
(7, 'Editor & Proofreader', '<p>Editor &amp; Proofreader</p>', 1, NULL, '2023-05-23 17:55:19', '2023-05-23 17:55:19'),
(8, 'UI/UX Designer-Mobile Apps', '<p>UI/UX Designer-Mobile Apps</p>', 1, NULL, '2023-05-23 17:55:27', '2023-05-23 17:55:27'),
(9, 'Unity 2D/3D Mobile App. Game Developer', '<p>Unity 2D/3D Mobile App. Game Developer</p>', 1, NULL, '2023-05-23 17:55:34', '2023-05-23 17:55:34'),
(10, 'Technical Support Executive', '<p>Technical Support Executive</p>', 1, NULL, '2023-05-23 17:55:42', '2023-05-23 17:55:42'),
(11, 'Business Analyst', '<p>Business Analyst</p>', 1, NULL, '2023-05-23 17:55:50', '2023-05-23 17:55:50'),
(12, 'Solution Architect', '<p>Solution Architect</p>', 1, NULL, '2023-05-23 17:55:57', '2023-05-23 17:55:57'),
(13, 'Project Manager', '<p>Project Manager</p>', 1, NULL, '2023-05-23 17:56:05', '2023-05-23 17:56:05'),
(14, 'Digital - Brand Manager', '<p>Digital - Brand Manager</p>', 1, NULL, '2023-05-23 17:56:16', '2023-05-23 17:56:16'),
(15, 'Social Media Executive', '<p>Social Media Executive</p>', 1, NULL, '2023-05-23 17:56:24', '2023-05-23 17:56:24'),
(16, 'Accountant', '<p>Accountant</p>', 1, NULL, '2023-05-23 17:56:31', '2023-05-23 17:56:31'),
(17, 'Sales', '<p>Sales</p>', 1, NULL, '2023-05-23 17:56:39', '2023-05-23 17:56:39'),
(18, 'Customer Support', '<p>Customer Support</p>', 1, NULL, '2023-05-23 17:56:47', '2023-05-23 17:56:47'),
(19, 'SEO', '<p>SEO</p>', 1, NULL, '2023-05-23 17:56:54', '2023-05-23 17:56:54'),
(20, 'PPC', '<p>PPC</p>', 1, NULL, '2023-05-23 17:57:02', '2023-05-23 17:57:02'),
(21, 'Supply Chain/Logistics', '<p>Supply Chain/Logistics</p>', 1, NULL, '2023-05-23 17:57:11', '2023-05-23 17:57:11'),
(22, 'Business Development Executive', '<p>Business Development Executive</p>', 1, NULL, '2023-05-23 17:57:18', '2023-05-23 17:57:18'),
(23, 'Marketing', '<p>Marketing</p>', 1, NULL, '2023-05-23 17:57:30', '2023-05-23 17:57:30'),
(24, 'Quality Assurance', '<p>Quality Assurance</p>', 1, NULL, '2023-05-23 17:57:38', '2023-05-23 17:57:38'),
(25, 'IT', '<p>IT</p>', 1, NULL, '2023-05-23 17:57:45', '2023-05-23 17:57:45'),
(26, 'HR', '<p>HR</p>', 1, NULL, '2023-05-23 17:57:56', '2023-05-23 17:57:56'),
(27, 'Web Designer', '<p>Web Designer</p>', 1, NULL, '2023-05-23 17:58:04', '2023-05-23 17:58:04'),
(28, 'BPO', '<p>BPO</p>', 1, NULL, '2023-05-23 17:58:11', '2023-05-23 17:58:11'),
(29, 'Account Manager - Mobile Applications', '<p>Account Manager - Mobile Applications</p>', 1, NULL, '2023-05-23 17:58:19', '2023-05-23 17:58:19'),
(30, 'React Native Developer', '<p>React Native Developer</p>', 1, NULL, '2023-05-23 17:58:26', '2023-05-23 17:58:26'),
(31, 'Full Stack Developer', '<p>Full Stack Developer</p>', 1, NULL, '2023-05-23 17:58:35', '2023-05-23 17:58:35'),
(32, 'Quality Assurance - Mobile Applications', '<p>Quality Assurance - Mobile Applications</p>', 1, NULL, '2023-05-23 17:59:48', '2023-05-23 17:59:48'),
(33, 'Chef', '<p>Chef</p>', 1, NULL, '2023-05-23 18:00:00', '2023-05-23 18:00:00'),
(34, 'Chinese Sales Consultant', '<p>Chinese Sales Consultant</p>', 1, NULL, '2023-05-23 18:00:10', '2023-05-23 18:00:10'),
(35, '2D Video Animator', '<p>2D Video Animator</p>', 1, NULL, '2023-05-23 18:00:19', '2023-05-23 18:00:19'),
(36, 'Senior PHP Developer', '<p>Senior PHP Developer</p>', 1, NULL, '2023-05-23 18:00:27', '2023-05-23 18:00:27'),
(37, 'Android Developer', '<p>Android Developer</p>', 1, NULL, '2023-05-23 18:00:35', '2023-05-23 18:00:35'),
(38, 'Web Developer', '<p>Web Developer</p>', 1, NULL, '2023-05-23 18:00:43', '2023-05-23 18:00:43'),
(39, 'Frontend UI/UX Developer', '<p>Frontend UI/UX Developer</p>', 1, NULL, '2023-05-23 18:00:51', '2023-05-23 18:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `employment_id` bigint(20) DEFAULT NULL,
  `cover_image_id` bigint(20) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `marital_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=married, 0=single',
  `fathers_name` varchar(100) DEFAULT NULL,
  `mothers_name` varchar(100) DEFAULT NULL,
  `social_security_number` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `employment_id`, `cover_image_id`, `joining_date`, `date_of_birth`, `gender`, `marital_status`, `fathers_name`, `mothers_name`, `social_security_number`, `phone_number`, `about_me`, `address`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1, 1145, NULL, '2023-05-23', '2023-05-01', 'male', 0, NULL, NULL, NULL, '12345', NULL, NULL, '1684880020.jpg', '2023-05-23 16:53:05', '2023-05-23 17:13:40'),
(2, 2, 4937, NULL, '2023-01-01', NULL, 'male', 0, NULL, NULL, NULL, '12345', NULL, NULL, NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `profile_cover_images`
--

CREATE TABLE `profile_cover_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `guard_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Manager', 'web', '2023-05-23 17:52:23', '2023-05-23 17:52:23'),
(3, 'Department Manager', 'web', '2023-05-23 17:52:43', '2023-05-23 17:52:43'),
(4, 'Employee', 'web', '2023-05-23 17:53:02', '2023-05-23 17:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `salary_histories`
--

CREATE TABLE `salary_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `job_history_id` bigint(20) NOT NULL,
  `salary` bigint(20) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_histories`
--

INSERT INTO `salary_histories` (`id`, `created_by`, `user_id`, `job_history_id`, `salary`, `effective_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 13000, NULL, NULL, 1, '2023-05-24 12:44:19', '2023-05-24 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `favicon` varchar(100) NOT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `currency_symbol` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `favicon`, `banner`, `language`, `country`, `area`, `city`, `state`, `zip_code`, `address`, `currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'Cyberonix Consulting Limited', '1684880051.png', '1684880051.png', '1684880051.png', 'English', 'pakistan', NULL, NULL, NULL, NULL, NULL, 'PKR', '2023-05-23 17:14:11', '2023-05-23 17:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_employee` tinyint(1) NOT NULL DEFAULT 1,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_by`, `status`, `is_employee`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 0, 'Admin', 'App', 'admin@gmail.com', NULL, '$2y$10$uXBOYG7QCLsbXxVnQxMcVeIoZpxRPGyhs5R0/917LFHa9RT4Wgb7y', NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 17:13:40'),
(2, 1, 1, 1, 'Muhmmad Umar', 'Khan', 'muhammad.umer@cyberonix.org', NULL, '$2y$10$isuotOAU4NB638Bo/C7OCunU4LUTWq.bUmpUtAmW/n8o.X.BWEQFi', NULL, NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_contacts`
--

CREATE TABLE `user_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_employment_statuses`
--

CREATE TABLE `user_employment_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employment_status_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_employment_statuses`
--

INSERT INTO `user_employment_statuses` (`id`, `user_id`, `employment_status_id`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-23', '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 1, 2, '2023-05-23', NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 2, 2, '2023-01-01', NULL, NULL, '2023-05-24 12:44:19', '2023-05-24 12:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_leaves`
--

CREATE TABLE `user_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assigned_by` bigint(20) DEFAULT NULL,
  `leave_type_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `working_shift_details_id` bigint(20) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `duration_type` varchar(100) NOT NULL COMMENT 'e.g first_half, last_half, single',
  `reason` varchar(100) DEFAULT NULL,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `working_shift_users`
--

CREATE TABLE `working_shift_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `working_shift_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_shift_users`
--

INSERT INTO `working_shift_users` (`id`, `working_shift_id`, `user_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-23', NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `work_shifts`
--

CREATE TABLE `work_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` enum('regular','scheduled') NOT NULL DEFAULT 'regular',
  `description` text DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_shifts`
--

INSERT INTO `work_shifts` (`id`, `name`, `start_date`, `end_date`, `type`, `description`, `is_default`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Night Shift (9 to 6)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 'Night Shift (10 to 7)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(3, 'Night Shift (11 to 8)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(4, 'Night Shift (12 to 9)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(5, 'Night Shift (1 to 10)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(6, 'Night Shift (2 to 11)', '2023-01-24', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(7, 'Night Shift (7 to 4)', '2023-01-01', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(8, 'Night Shift (6 to 3)', '2023-01-24', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(9, 'Night Shift (5 to 2)', '2023-01-24', NULL, 'regular', NULL, 1, 1, NULL, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(10, 'Flexable Shift Night', '2023-01-01', NULL, 'scheduled', NULL, 1, 1, NULL, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(11, 'Flexable Shift Morning', '2023-01-01', NULL, 'scheduled', NULL, 1, 1, NULL, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(12, 'Flexable Shift Evening', '2023-01-01', NULL, 'scheduled', NULL, 1, 1, NULL, '2023-05-23 17:51:38', '2023-05-23 17:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `work_shift_details`
--

CREATE TABLE `work_shift_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `working_shift_id` bigint(20) NOT NULL,
  `weekday_key` varchar(100) NOT NULL,
  `weekday` varchar(100) NOT NULL,
  `is_weekend` tinyint(1) NOT NULL DEFAULT 0,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_shift_details`
--

INSERT INTO `work_shift_details` (`id`, `working_shift_id`, `weekday_key`, `weekday`, `is_weekend`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mon', 'Monday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(2, 1, 'Tue', 'Tuesday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(3, 1, 'Wed', 'Wednesday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(4, 1, 'Thu', 'Thursday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(5, 1, 'Fri', 'Friday', 0, '16:00:00', '01:00:00', '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(6, 1, 'Sat', 'Saturday', 1, NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(7, 1, 'Sun', 'Sunday', 1, NULL, NULL, '2023-05-23 16:53:05', '2023-05-23 16:53:05'),
(8, 2, 'mon', 'Monday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(9, 2, 'tue', 'Tuesday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(10, 2, 'wed', 'Wednesday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(11, 2, 'thu', 'Thursday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(12, 2, 'fri', 'Friday', 0, '17:00:00', '02:00:00', '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(13, 2, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(14, 2, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:23:50', '2023-05-23 17:23:50'),
(15, 3, 'mon', 'Monday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(16, 3, 'tue', 'Tuesday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(17, 3, 'wed', 'Wednesday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(18, 3, 'thu', 'Thursday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(19, 3, 'fri', 'Friday', 0, '18:00:00', '03:00:00', '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(20, 3, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(21, 3, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:29:16', '2023-05-23 17:29:16'),
(22, 4, 'mon', 'Monday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(23, 4, 'tue', 'Tuesday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(24, 4, 'wed', 'Wednesday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(25, 4, 'thu', 'Thursday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(26, 4, 'fri', 'Friday', 0, '19:00:00', '04:00:00', '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(27, 4, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(28, 4, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:32:12', '2023-05-23 17:32:12'),
(29, 5, 'mon', 'Monday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(30, 5, 'tue', 'Tuesday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(31, 5, 'wed', 'Wednesday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(32, 5, 'thu', 'Thursday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(33, 5, 'fri', 'Friday', 0, '20:00:00', '05:00:00', '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(34, 5, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(35, 5, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:33:42', '2023-05-23 17:33:42'),
(36, 6, 'mon', 'Monday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(37, 6, 'tue', 'Tuesday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(38, 6, 'wed', 'Wednesday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(39, 6, 'thu', 'Thursday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(40, 6, 'fri', 'Friday', 0, '21:00:00', '06:01:00', '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(41, 6, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(42, 6, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:35:23', '2023-05-23 17:35:23'),
(43, 7, 'mon', 'Monday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(44, 7, 'tue', 'Tuesday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(45, 7, 'wed', 'Wednesday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(46, 7, 'thu', 'Thursday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(47, 7, 'fri', 'Friday', 0, '14:00:00', '23:00:00', '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(48, 7, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(49, 7, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:39:09', '2023-05-23 17:39:09'),
(50, 8, 'mon', 'Monday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(51, 8, 'tue', 'Tuesday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(52, 8, 'wed', 'Wednesday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(53, 8, 'thu', 'Thursday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(54, 8, 'fri', 'Friday', 0, '13:00:00', '10:00:00', '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(55, 8, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(56, 8, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:46:42', '2023-05-23 17:46:42'),
(57, 9, 'mon', 'Monday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(58, 9, 'tue', 'Tuesday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(59, 9, 'wed', 'Wednesday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(60, 9, 'thu', 'Thursday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(61, 9, 'fri', 'Friday', 0, '00:00:00', '21:00:00', '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(62, 9, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(63, 9, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:48:39', '2023-05-23 17:48:39'),
(64, 10, 'mon', 'Monday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(65, 10, 'tue', 'Tuesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(66, 10, 'wed', 'Wednesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(67, 10, 'thu', 'Thursday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(68, 10, 'fri', 'Friday', 0, '15:00:00', '05:00:00', '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(69, 10, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(70, 10, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:49:45', '2023-05-23 17:49:45'),
(71, 11, 'mon', 'Monday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(72, 11, 'tue', 'Tuesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(73, 11, 'wed', 'Wednesday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(74, 11, 'thu', 'Thursday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(75, 11, 'fri', 'Friday', 0, '15:00:00', '05:00:00', '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(76, 11, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(77, 11, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:50:43', '2023-05-23 17:50:43'),
(78, 12, 'mon', 'Monday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(79, 12, 'tue', 'Tuesday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(80, 12, 'wed', 'Wednesday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(81, 12, 'thu', 'Thursday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(82, 12, 'fri', 'Friday', 0, '09:00:00', '23:00:00', '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(83, 12, 'sat', 'Saturday', 1, NULL, NULL, '2023-05-23 17:51:38', '2023-05-23 17:51:38'),
(84, 12, 'sun', 'Sunday', 1, NULL, NULL, '2023-05-23 17:51:38', '2023-05-23 17:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_departments`
--
ALTER TABLE `announcement_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_departments_announcement_id_foreign` (`announcement_id`),
  ADD KEY `announcement_departments_department_id_foreign` (`department_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_users`
--
ALTER TABLE `department_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_users_department_id_foreign` (`department_id`),
  ADD KEY `department_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `department_work_shifts`
--
ALTER TABLE `department_work_shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_work_shifts_department_id_foreign` (`department_id`),
  ADD KEY `department_work_shifts_work_shift_id_foreign` (`work_shift_id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discrepancies`
--
ALTER TABLE `discrepancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_histories`
--
ALTER TABLE `job_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_cover_images`
--
ALTER TABLE `profile_cover_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_cover_images_created_by_foreign` (`created_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary_histories`
--
ALTER TABLE `salary_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`);

--
-- Indexes for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_employment_statuses`
--
ALTER TABLE `user_employment_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_employment_statuses_user_id_foreign` (`user_id`),
  ADD KEY `user_employment_statuses_employment_status_id_foreign` (`employment_status_id`);

--
-- Indexes for table `user_leaves`
--
ALTER TABLE `user_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_shift_users`
--
ALTER TABLE `working_shift_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_shifts`
--
ALTER TABLE `work_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_shift_details`
--
ALTER TABLE `work_shift_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement_departments`
--
ALTER TABLE `announcement_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `department_users`
--
ALTER TABLE `department_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_work_shifts`
--
ALTER TABLE `department_work_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `discrepancies`
--
ALTER TABLE `discrepancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_statuses`
--
ALTER TABLE `employment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_histories`
--
ALTER TABLE `job_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_cover_images`
--
ALTER TABLE `profile_cover_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_histories`
--
ALTER TABLE `salary_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_contacts`
--
ALTER TABLE `user_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_employment_statuses`
--
ALTER TABLE `user_employment_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_leaves`
--
ALTER TABLE `user_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `working_shift_users`
--
ALTER TABLE `working_shift_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_shifts`
--
ALTER TABLE `work_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `work_shift_details`
--
ALTER TABLE `work_shift_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement_departments`
--
ALTER TABLE `announcement_departments`
  ADD CONSTRAINT `announcement_departments_announcement_id_foreign` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcement_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_users`
--
ALTER TABLE `department_users`
  ADD CONSTRAINT `department_users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_work_shifts`
--
ALTER TABLE `department_work_shifts`
  ADD CONSTRAINT `department_work_shifts_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `department_work_shifts_work_shift_id_foreign` FOREIGN KEY (`work_shift_id`) REFERENCES `work_shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile_cover_images`
--
ALTER TABLE `profile_cover_images`
  ADD CONSTRAINT `profile_cover_images_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_contacts`
--
ALTER TABLE `user_contacts`
  ADD CONSTRAINT `user_contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_employment_statuses`
--
ALTER TABLE `user_employment_statuses`
  ADD CONSTRAINT `user_employment_statuses_employment_status_id_foreign` FOREIGN KEY (`employment_status_id`) REFERENCES `employment_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_employment_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
