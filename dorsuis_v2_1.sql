-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 08:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorsuis_v2.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `allumni`
--

CREATE TABLE `allumni` (
  `oid` int(11) NOT NULL,
  `school_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allumni`
--

INSERT INTO `allumni` (`oid`, `school_id`) VALUES
(9, '2021-0001');

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `oid` bigint(20) UNSIGNED NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`oid`, `id`, `name`, `link`) VALUES
(1, 1, 'admin', 'admin'),
(2, 2, 'register', 'register'),
(3, 3, 'allumni', 'allumni'),
(0, 4, 'allumni', 'allumniAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `authorization_app`
--

CREATE TABLE `authorization_app` (
  `oid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `date_end` date DEFAULT NULL,
  `is_current` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorization_app`
--

INSERT INTO `authorization_app` (`oid`, `id`, `app_id`, `users_id`, `date_end`, `is_current`) VALUES
(3, 1, 1, 5, '2022-09-16', 1),
(6, 2, 2, 6, '2025-06-19', 1),
(10, 4, 3, 8, '2022-07-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authorize_sub_app`
--

CREATE TABLE `authorize_sub_app` (
  `sub_app_oid` bigint(20) NOT NULL,
  `authorization_app_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorize_sub_app`
--

INSERT INTO `authorize_sub_app` (`sub_app_oid`, `authorization_app_id`) VALUES
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `barangay_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `oid` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `campus_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`oid`, `code`, `campus_name`) VALUES
(1, 1840141, 'Main'),
(2, 1840142, 'Banay-Banay'),
(3, 1840143, 'San-Isidro'),
(4, 1840144, 'Cateel');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `subject_id` int(11) NOT NULL,
  `prerequisite` int(11) NOT NULL,
  `number` int(10) DEFAULT NULL,
  `sem` int(1) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `oid` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `oid`, `department_name`) VALUES
(1, 0, 'ICE'),
(2, 0, 'IBPA'),
(3, 0, 'IALS'),
(4, 0, 'IETT'),
(5, 0, 'masters');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `role`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Faculty', 'Adviser', NULL, NULL),
(6, 'Faculty', 'Program head', NULL, NULL),
(7, 'Admin', 'Admission Head', NULL, NULL),
(8, 'Admin', 'Admission Staff', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation_employees`
--

CREATE TABLE `designation_employees` (
  `oid` int(10) NOT NULL,
  `designation_id` int(10) NOT NULL,
  `designation_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(7) DEFAULT NULL,
  `so_mo_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `assigned_by` int(11) NOT NULL,
  `academic_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_assigned` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employees_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation_employees`
--

INSERT INTO `designation_employees` (`oid`, `designation_id`, `designation_role`, `program_id`, `so_mo_number`, `units`, `assigned_by`, `academic_year`, `semester`, `date_assigned`, `date_ended`, `created_at`, `updated_at`, `employees_id`) VALUES
(9, 5, 'admission_staff', 5, NULL, NULL, 1, '', '', NULL, NULL, NULL, NULL, 2),
(13, 5, 'adviser', NULL, 'sample', 10, 6, '', '', '2022-06-22', '2022-08-12', '2022-06-21 07:41:08', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `oid` int(7) NOT NULL,
  `id` varchar(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employed_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` bigint(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `fb_account` varchar(255) DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`oid`, `id`, `email`, `employed_by`, `created_at`, `updated_at`, `users_id`, `department_id`, `fname`, `mname`, `lname`, `address`, `bday`, `sex`, `civil_status`, `fb_account`, `contact_number`) VALUES
(1, 'ITSU-0009', 'leonardo.dicaprio@gmail.com', 6, '2022-06-15 03:19:12', NULL, NULL, NULL, 'leonardo', 'jhonson', 'dicaprio', 'Prk. Malinawon 2, Brgy. Matiao, Mati City, Davao Oriental', '1997-07-07', 'Male', 'Single', 'leonardodicaprio@yahoo.com', '09505646830'),
(2, 'ITSU-00010', 'gino.labiste@gmail.com', 6, '2022-06-15 03:19:12', NULL, 5, 1, 'gino', 'tacsan', 'labiste', 'Mati City, Davao Oriental', '1997-07-07', 'Male', 'Single', 'gino.labiste@yahoo.com', '09505646830');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `users_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--
-- Error reading structure for table dorsuis_v2.1.grades: #1932 - Table &#039;dorsuis_v2.1.grades&#039; doesn&#039;t exist in engine
-- Error reading data for table dorsuis_v2.1.grades: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `dorsuis_v2.1`.`grades`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `incoming_students`
--

CREATE TABLE `incoming_students` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `civil_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_number` int(11) DEFAULT NULL,
  `r_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ethnic_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_working` tinyint(1) DEFAULT NULL,
  `working_for` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_employment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_employment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parents_are` varchar(100) DEFAULT NULL,
  `family_monthly_income` int(11) DEFAULT NULL,
  `siblings` int(11) DEFAULT NULL,
  `working_siblings` int(11) DEFAULT NULL,
  `college_siblings` int(11) DEFAULT NULL,
  `hs_siblings` int(11) DEFAULT NULL,
  `guardian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardians_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_address` longtext DEFAULT NULL,
  `gen_ability` int(11) DEFAULT NULL,
  `spatial_apt` int(11) DEFAULT NULL,
  `verbal_apt` int(11) DEFAULT NULL,
  `perceptual_apt` int(11) DEFAULT NULL,
  `numerical_apt` int(11) DEFAULT NULL,
  `manual_dex` int(11) DEFAULT NULL,
  `admission` text DEFAULT NULL,
  `psa_husband` text DEFAULT NULL,
  `student_profile` varchar(25) DEFAULT NULL,
  `suast_result` varchar(25) DEFAULT NULL,
  `form_138` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `als_pept` varchar(25) DEFAULT NULL,
  `good_moral` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nso_auth` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marriage_contract` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_picture` varchar(25) DEFAULT NULL,
  `long_b_env` varchar(25) DEFAULT NULL,
  `win_env_stamp` varchar(25) NOT NULL,
  `transcript_records` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_creds` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clearance` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_sem_grades` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_prio` int(11) DEFAULT NULL,
  `course_second_prio` int(11) DEFAULT NULL,
  `course_third_prio` int(11) DEFAULT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `is_synced` tinyint(1) DEFAULT NULL,
  `is_advised` tinyint(1) DEFAULT NULL,
  `is_new` tinyint(1) DEFAULT NULL,
  `is_transferee` tinyint(1) DEFAULT NULL,
  `is_old` tinyint(1) DEFAULT NULL,
  `date_submitted` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_accepted` datetime DEFAULT NULL,
  `date_synced` date DEFAULT NULL,
  `date_advised` datetime DEFAULT NULL,
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occu_or_position` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `employment_add` longtext DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `date_earned` date DEFAULT NULL,
  `degree_sought` varchar(255) DEFAULT NULL,
  `major_field_interested` varchar(100) DEFAULT NULL,
  `when_start` varchar(6) DEFAULT NULL,
  `attending_college` varchar(255) DEFAULT NULL,
  `professor_work_with` longtext DEFAULT NULL,
  `experiences` longtext DEFAULT NULL,
  `professional_organization` longtext DEFAULT NULL,
  `professional_career` longtext DEFAULT NULL,
  `requested_recommend` longtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile` longtext DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `height` varchar(5) DEFAULT NULL,
  `weight` varchar(5) DEFAULT NULL,
  `guardian_not_living_parents` varchar(255) DEFAULT NULL,
  `elem_school` varchar(500) DEFAULT NULL,
  `high_school` varchar(500) DEFAULT NULL,
  `vocational_school` varchar(500) DEFAULT NULL,
  `elem_year` int(11) DEFAULT NULL,
  `hs_year` int(11) DEFAULT NULL,
  `vocational_year` int(11) DEFAULT NULL,
  `strand` varchar(255) DEFAULT NULL,
  `vocational_course` varchar(500) DEFAULT NULL,
  `honors` varchar(255) DEFAULT NULL,
  `scholar` varchar(255) DEFAULT NULL,
  `gctc_course` varchar(500) DEFAULT NULL,
  `gctc_year` int(11) DEFAULT NULL,
  `campus` varchar(300) DEFAULT NULL,
  `why_this_course` longtext DEFAULT NULL,
  `decide` varchar(100) DEFAULT NULL,
  `why_dorsu` longtext DEFAULT NULL,
  `ambition_in_life` longtext DEFAULT NULL,
  `school_expectation` varchar(255) DEFAULT NULL,
  `instructor_expectation` longtext DEFAULT NULL,
  `subject_like` longtext DEFAULT NULL,
  `course_expectation` varchar(255) DEFAULT NULL,
  `student_expectation` longtext DEFAULT NULL,
  `subject_most_like` longtext DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  `motto` varchar(100) DEFAULT NULL,
  `talent` varchar(100) DEFAULT NULL,
  `interest` varchar(100) DEFAULT NULL,
  `selfassesment` longtext DEFAULT NULL,
  `bothers` longtext DEFAULT NULL,
  `would_you_like_to_talk` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `school_id` varchar(9) DEFAULT NULL,
  `school_id_at` date DEFAULT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `lrn` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incoming_students`
--

INSERT INTO `incoming_students` (`id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `age`, `sex`, `civil_status`, `spouse_name`, `spouse_occupation`, `child_number`, `r_address`, `c_address`, `email`, `fb_account`, `contact_number`, `ethnic_group`, `religion`, `languages`, `is_working`, `working_for`, `fathers_name`, `fathers_contact_number`, `fathers_address`, `fathers_employment`, `mothers_name`, `mothers_contact_number`, `mothers_address`, `mothers_employment`, `parents_are`, `family_monthly_income`, `siblings`, `working_siblings`, `college_siblings`, `hs_siblings`, `guardian`, `guardians_number`, `guardian_address`, `gen_ability`, `spatial_apt`, `verbal_apt`, `perceptual_apt`, `numerical_apt`, `manual_dex`, `admission`, `psa_husband`, `student_profile`, `suast_result`, `form_138`, `als_pept`, `good_moral`, `nso_auth`, `marriage_contract`, `id_picture`, `long_b_env`, `win_env_stamp`, `transcript_records`, `transfer_creds`, `clearance`, `last_sem_grades`, `course_prio`, `course_second_prio`, `course_third_prio`, `is_accepted`, `is_synced`, `is_advised`, `is_new`, `is_transferee`, `is_old`, `date_submitted`, `date_accepted`, `date_synced`, `date_advised`, `remarks`, `occu_or_position`, `employer`, `employment_add`, `institute`, `major`, `degree`, `date_earned`, `degree_sought`, `major_field_interested`, `when_start`, `attending_college`, `professor_work_with`, `experiences`, `professional_organization`, `professional_career`, `requested_recommend`, `updated_at`, `profile`, `suffix`, `citizenship`, `height`, `weight`, `guardian_not_living_parents`, `elem_school`, `high_school`, `vocational_school`, `elem_year`, `hs_year`, `vocational_year`, `strand`, `vocational_course`, `honors`, `scholar`, `gctc_course`, `gctc_year`, `campus`, `why_this_course`, `decide`, `why_dorsu`, `ambition_in_life`, `school_expectation`, `instructor_expectation`, `subject_like`, `course_expectation`, `student_expectation`, `subject_most_like`, `hobbies`, `motto`, `talent`, `interest`, `selfassesment`, `bothers`, `would_you_like_to_talk`, `created_at`, `school_id`, `school_id_at`, `transaction_number`, `lrn`) VALUES
(3, 'Argie', 'Codog', 'Ragas', '2005-07-13', 17, 1, 'Single', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', '09207787129', 'B\'laan', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0', 100, 5, 5, 4, 1, 'N/A', 'N/A', '0', 1, 1, 1, 1, 1, 1, '', '', NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', 'N/A', 5, 1, 1, NULL, NULL, 1, 1, NULL, NULL, '2022-07-22 07:18:57', '2022-05-10 00:00:00', '2022-05-16', '2022-07-14 02:56:09', '----- Accepted -------', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-05-09', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-07-13 19:56:09', NULL, '', '', '', '', '0', '', '', '', 0, 0, 0, '', '', '', '', '', 0, 'San-Isidro Extension Campus', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', NULL, '2022-0001', '2022-07-20', '', ''),
(4, 'Gino', 'Tacsan', 'Labiste', '2005-07-13', 17, 1, 'Single', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', '09207787129', 'N/A', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0', 100, 5, 5, 4, 1, 'N/A', 'N/A', '0', 1, 1, 1, 1, 1, 1, '', '', NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', '', 'on', 'N/A', 5, 1, 1, 1, NULL, NULL, 1, NULL, NULL, '2022-07-22 07:18:23', '2022-07-21 14:20:41', '2022-05-16', '2022-05-11 00:00:00', '------Accepted.-------\r\n------Advised------\r\n------Officially Enrolled------', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-05-09', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-07-21 08:35:54', NULL, '', '', '', '', '0', '', '', '', 0, 0, 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', NULL, '2022-0009', '2022-07-20', '', ''),
(5, 'Ian', 'Codog', 'Palola', '2005-07-13', 17, 1, 'Single', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', '09207787129', 'N/A', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0', 100, 5, 5, 4, 1, 'N/A', 'N/A', '0', 1, 1, 1, 1, 1, 1, '', '', NULL, NULL, 'on', NULL, NULL, 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', 'N/A', 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, '2022-07-22 07:17:34', '2022-07-22 09:01:33', '2022-05-16', '2022-05-11 00:00:00', NULL, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-05-09', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-07-22 02:07:21', NULL, '', '', '', '', '0', '', '', '', 0, 0, 0, '', '', '', '', '', 0, 'San-Isidro Extension Campus', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', NULL, 'SE22-0001', '2022-07-22', '', ''),
(6, 'Rolando', 'Borja', 'Melgar', '2005-07-13', 17, 1, 'Single', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'N/A', 'N/A', '09207787129', 'N/A', 'N/A', 'N/A', 1, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0', 100, 5, 5, 4, 1, 'N/A', 'N/A', '0', 1, 1, 1, 1, 1, 1, '', '', NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', 'N/A', 1, 1, 1, 1, NULL, NULL, 1, NULL, NULL, '2022-07-22 07:17:45', '2022-07-22 09:01:44', '2022-05-16', '2022-05-11 00:00:00', NULL, 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-05-09', 'N/A', 'N/A', '1', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2022-07-22 02:07:20', NULL, '', '', '', '', '0', '', '', '', 0, 0, 0, '', '', '', '', '', 0, 'Baganga Classes Campus', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', NULL, 'BC22-0001', '2022-07-22', '', ''),
(62, 'Argine', 'jhonson', 'Ragas', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Permanently Separated', 14000, 0, 0, 0, 0, 'Ian jhonson Palola', NULL, 'asdf', 4, 1, 1, 4, 4, 1, '', '', NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', NULL, 'on', NULL, 5, 6, 7, 1, NULL, 1, NULL, NULL, NULL, '2022-07-22 07:18:37', NULL, NULL, '2022-07-14 14:10:27', '----- Advised -----', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 08:04:19', '1657095337.png', NULL, 'Filipino', '5\'4\"', '60', NULL, 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 2010, NULL, NULL, 'trtr', 'No', '0', NULL, 'Main Campus(Mati)', 'sdfgd', 'Yes', 'fgh', 'fgh', 'dfhd', NULL, 'fghd', 'gfhd', 'gfhd', 'fghd', 'sdfg', NULL, 'df', 'sfg', NULL, NULL, 'Friends: sdfg, Parents: sdf, Teacher: , Councilors: ', '2022-07-06 01:15:37', '2022-0006', '2022-07-20', '165709533764', ''),
(119, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'sdf', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'gffyui', 'Temporarily Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 3, 4, 5, 7, 8, '', '', NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', NULL, 5, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, '2022-07-22 07:18:53', '2022-07-14 00:00:00', NULL, NULL, 'Advised -----\r\nOfficially Enrolled -----', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-18 09:54:16', '1657763220.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 2010, 'sample', '4', 'N/A', 'awe', '0', 3, 'Main Campus(Mati)', 'arasd', 'Example', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & dependent & idealistic & ', 'sample health problems & Developing self-confidence & Interpersonal relationship (parent;friends;siblings) & sample please specify & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-13 18:47:01', '2022-0002', '2022-07-20', '16577632200', ''),
(120, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', 'ddad', NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'sdf', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'gffyui', 'Permanently Separated', 14000, 5, 5, 0, 0, 'leonardo jhonson dicaprio', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 5, 5, 5, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:41', '2022-07-14 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 08:04:18', '1657767715.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'leonardo jhonson dicaprio', 2010, 2010, 2010, NULL, NULL, 'N/A', 'awe', '0', 3, 'Main Campus(Mati)', 'I don\'t know', 'awsdf', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & idealistic & ', 'Study habits & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-13 20:01:55', '2022-0005', '2022-07-20', '165776771564', ''),
(121, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Living Together', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, '', '', NULL, NULL, 'on', NULL, 'on', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 5, 5, 5, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:27', '2022-07-21 14:20:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:18:32', '1657767933.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'None', '0', 3, 'Main Campus(Mati)', 'I don\'t know', 'sdf', 'idhff', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-13 20:05:33', '2022-0008', '2022-07-20', '165776793344', ''),
(122, 'leonardo', 'jhonson', 'dicaprio', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'sdf', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'gffyui', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', NULL, 5, 10, 10, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:17', '2022-07-21 15:36:18', NULL, NULL, '--- Accept---', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:36:27', '1657784169.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', 'asdf', 'N/A', 'awe', '0', 3, 'Main Campus(Mati)', 'I don\'t know', 'www', 'ar', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'dependent & stubborn & ', 'Study habits & Developing self-confidence & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-14 00:36:09', '2022-0010', '2022-07-21', '165778416947', ''),
(123, 'leonardo', 'jhonson', 'dicaprio', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'sdf', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'gffyui', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 5, 8, 6, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:00', '2022-07-21 15:36:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:38:25', '1657787084.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'leonardo jhonson dicaprio', 'leonardo jhonson dicaprio', 'leonardo jhonson dicaprio', 2010, 2010, 2010, 'sample', NULL, 'N/A', 'awe', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'sdf', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & perceptive & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-14 01:24:44', '2022-0013', '2022-07-21', '165778708486', ''),
(124, 'Ian', 'jhonson', 'Palola', NULL, 1314, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 5, 5, 5, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:06', '2022-07-21 15:37:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:38:25', '1657787717.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'leonardo jhonson dicaprio', 2010, 2010, 3, NULL, NULL, 'N/A', 'awe', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'df', 'sdf', 'sf', '0', NULL, 'subject you like least', 'course', 'asd', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & perceptive & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-14 01:35:17', '2022-0012', '2022-07-21', '165778771780', ''),
(125, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'sdf', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'gffyui', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'leonardo jhonson dicaprio', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 5, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-14 08:48:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-14 01:48:31', '1657788511.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'leonardo jhonson dicaprio', 'leonardo jhonson dicaprio', 'leonardo jhonson dicaprio', 2010, 2010, 2010, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 'asd', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & dependent & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-14 01:48:31', NULL, NULL, '165778851128', ''),
(126, 'Ian', 'jhonson', 'Palola', NULL, 13, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'sdf', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'gffyui', 'Permanently Separated', 14000, 1, 3, 5, 7, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 5, 5, 9, NULL, NULL, 1, NULL, NULL, NULL, '2022-07-18 09:20:47', NULL, NULL, '2022-07-18 11:16:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-18 08:40:45', '1657788787.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'leonardo jhonson dicaprio', 2010, 2010, 2010, 'sample', 'asdf', 'N/A', 'sample', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'xdft', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & stubborn & ', 'Difficulties in adjusting a new school & Interpersonal relationship (parent;friends;siblings) & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-14 01:53:07', NULL, NULL, '165778878780', ''),
(127, 'leonardo', 'jhonson', 'dicaprio', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'N/A', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'zzz', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'gffyui', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'leonardo jhonson dicaprio', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 'on', NULL, 'on', 'on', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 6, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:12', '2022-07-21 15:36:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:36:27', '1657791622.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'leonardo jhonson dicaprio', 'Ian jhonson Palola', 2010, 2010, 2010, 'sample', 'asdf', 'N/A', 'awe', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & suspicious & idealistic & ', 'Study habits & Interpersonal relationship (parent;friends;siblings) & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-14 02:40:22', '2022-0011', '2022-07-21', '165779162253', ''),
(128, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'baki', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 5, 6, 10, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:45', '2022-07-19 16:36:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 08:04:18', '1658205939.jpg', NULL, 'Filipino', '5\'4\"', '60', NULL, 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 'd', 's', 's', NULL, 's', 's', 's', 'ss', 'a', NULL, 'a', 'a', 'relaxed/calm & ', 'Developing self-confidence & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-18 21:45:39', '2022-0004', '2022-07-20', '165820593956', ''),
(129, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Private', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Marriage Annulled', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 3, 1, 33, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 07:13:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 00:13:01', '1658301181.jpg', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'awe', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 's', 's', '1', NULL, '15', '5', '15', '5', '4', NULL, '5', '3', 'responsible & ', 'Developing self-confidence & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 00:13:01', NULL, NULL, '165830118113', '1233123'),
(130, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 07:49:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 00:49:19', '1658303359.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'None', 's', 's', 's', NULL, 'o', 'o', 'o', 'o', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Financial difficulty & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 00:49:19', NULL, NULL, '165830335989', '1233123'),
(131, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:17:48', '2022-07-22 09:45:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-22 06:49:55', '1658303392.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'None', 's', 's', 's', NULL, 'o', 'o', 'o', 'o', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Financial difficulty & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 00:49:52', '2022-0015', '2022-07-22', '165830339263', '1233123'),
(132, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:17:53', '2022-07-22 09:45:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-22 06:49:55', '1658303393.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'None', 's', 's', 's', NULL, 'o', 'o', 'o', 'o', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Financial difficulty & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 00:49:53', '2022-0014', '2022-07-21', '165830339346', '1233123'),
(133, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 07:49:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 00:49:54', '1658303394.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'None', 's', 's', 's', NULL, 'o', 'o', 'o', 'o', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Financial difficulty & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 00:49:54', NULL, NULL, '165830339452', '1233123'),
(134, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 07:50:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 00:50:24', '1658303424.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'None', 's', 's', 's', NULL, 'o', 'o', 'o', 'o', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Financial difficulty & ', 'Friends: d, Parents: s, Teacher: , Councilors: ', '2022-07-20 00:50:24', NULL, NULL, '16583034248', '1233123'),
(135, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', NULL, 14, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:32', '2022-07-20 15:06:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 08:06:52', '1658303436.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'None', 's', 's', 's', NULL, 'o', 'o', 'o', 'o', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Financial difficulty & ', 'Friends: d, Parents: s, Teacher: , Councilors: ', '2022-07-20 00:50:36', '2022-0007', '2022-07-20', '16583034360', '1233123'),
(136, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', NULL, 14, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:18:49', '2022-07-20 15:03:42', NULL, NULL, 'Lacking TOR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 08:04:18', '1658303437.png', NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'None', 's', 's', 's', NULL, 'o', 'o', 'o', 'o', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Financial difficulty & ', 'Friends: d, Parents: s, Teacher: , Councilors: ', '2022-07-20 00:50:37', '2022-0003', '2022-07-20', '165830343787', '1233123'),
(137, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 08:38:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 01:38:50', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 'ad', 'I don\'t have a plan', 'school', NULL, '1', '1', '2', '3', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Interpersonal relationship (parent;friends;siblings) & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 01:38:50', NULL, NULL, '165830633063', '1233123'),
(138, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Mother w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 08:41:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 01:41:52', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'leonardo jhonson dicaprio', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Student-Instructor relationship & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 01:41:52', NULL, NULL, '165830651277', '1233123'),
(139, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 09:02:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-20 02:02:44', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 2010, 'sample', '4', 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 'I pad', 'sdf', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'easily troubled & ', 'Interpersonal relationship (parent;friends;siblings) & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-20 02:02:44', NULL, NULL, '165830776489', '1233123'),
(140, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, '', 'on', 'on', 'on', NULL, 15, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:17:43', '2022-07-22 09:02:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-22 02:07:20', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'Yes', 'I want to know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'happy-go-lucky & ', 'Difficulties in adjusting a new school & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 01:51:28', 'BE22-0001', '2022-07-22', '165839348859', '1233123'),
(141, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, 15, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:17:37', '2022-07-22 10:35:20', NULL, NULL, 'Accepted by Gino', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-22 06:39:53', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'Yes', 'I want to know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'happy-go-lucky & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-21 01:51:44', 'BE22-0003', '2022-07-22', '165839350470', '1233123'),
(142, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, 15, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 06:57:31', '2022-07-22 14:00:57', NULL, NULL, 'Oh yeah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:01:04', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'Yes', 'I want to know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'happy-go-lucky & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-21 01:51:54', 'BE22-0004', '2022-07-22', '16583935149', '1233123'),
(143, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 15, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:51:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:51:55', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'Yes', 'I want to know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'happy-go-lucky & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-21 01:51:55', NULL, NULL, '165839351561', '1233123'),
(144, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 15, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:53:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:53:03', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'Yes', 'I want to know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'happy-go-lucky & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-21 01:53:03', NULL, NULL, '165839358311', '1233123'),
(145, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 15, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:53:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:53:05', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'Yes', 'I want to know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'happy-go-lucky & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-21 01:53:05', NULL, NULL, '165839358568', '1233123'),
(146, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Father w/ another partner', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 15, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:53:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:53:10', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'Ian jhonson Palola', 2010, 2010, 3, 'sample', '4', 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'Yes', 'I want to know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'fsdfdf', 'happy-go-lucky & ', 'Difficulties in adjusting a new school & ', 'Friends: my friends, Parents: my parents, Teacher: , Councilors: ', '2022-07-21 01:53:10', NULL, NULL, '165839359098', '1233123');
INSERT INTO `incoming_students` (`id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `age`, `sex`, `civil_status`, `spouse_name`, `spouse_occupation`, `child_number`, `r_address`, `c_address`, `email`, `fb_account`, `contact_number`, `ethnic_group`, `religion`, `languages`, `is_working`, `working_for`, `fathers_name`, `fathers_contact_number`, `fathers_address`, `fathers_employment`, `mothers_name`, `mothers_contact_number`, `mothers_address`, `mothers_employment`, `parents_are`, `family_monthly_income`, `siblings`, `working_siblings`, `college_siblings`, `hs_siblings`, `guardian`, `guardians_number`, `guardian_address`, `gen_ability`, `spatial_apt`, `verbal_apt`, `perceptual_apt`, `numerical_apt`, `manual_dex`, `admission`, `psa_husband`, `student_profile`, `suast_result`, `form_138`, `als_pept`, `good_moral`, `nso_auth`, `marriage_contract`, `id_picture`, `long_b_env`, `win_env_stamp`, `transcript_records`, `transfer_creds`, `clearance`, `last_sem_grades`, `course_prio`, `course_second_prio`, `course_third_prio`, `is_accepted`, `is_synced`, `is_advised`, `is_new`, `is_transferee`, `is_old`, `date_submitted`, `date_accepted`, `date_synced`, `date_advised`, `remarks`, `occu_or_position`, `employer`, `employment_add`, `institute`, `major`, `degree`, `date_earned`, `degree_sought`, `major_field_interested`, `when_start`, `attending_college`, `professor_work_with`, `experiences`, `professional_organization`, `professional_career`, `requested_recommend`, `updated_at`, `profile`, `suffix`, `citizenship`, `height`, `weight`, `guardian_not_living_parents`, `elem_school`, `high_school`, `vocational_school`, `elem_year`, `hs_year`, `vocational_year`, `strand`, `vocational_course`, `honors`, `scholar`, `gctc_course`, `gctc_year`, `campus`, `why_this_course`, `decide`, `why_dorsu`, `ambition_in_life`, `school_expectation`, `instructor_expectation`, `subject_like`, `course_expectation`, `student_expectation`, `subject_most_like`, `hobbies`, `motto`, `talent`, `interest`, `selfassesment`, `bothers`, `would_you_like_to_talk`, `created_at`, `school_id`, `school_id_at`, `transaction_number`, `lrn`) VALUES
(147, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', 'leonardo.dicaprio@gmail.com', '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:55:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:55:15', NULL, NULL, 'Filipino', '5\'4\"', '65', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', 'leonardo jhonson dicaprio', 2010, 2010, 3, 'sample', '4', 'N/A', 'awe', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'Yes', 'asdf', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Difficulties in adjusting a new school & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 01:55:15', NULL, NULL, '165839371511', '1233123'),
(148, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:58:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:58:44', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'dd', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Difficulties in adjusting a new school & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 01:58:44', NULL, NULL, '165839392416', '12331231'),
(149, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:59:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:59:01', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'dd', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Difficulties in adjusting a new school & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 01:59:01', NULL, NULL, '165839394177', '12331231'),
(150, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:59:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:59:12', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'dd', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Difficulties in adjusting a new school & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 01:59:12', NULL, NULL, '165839395271', '12331231'),
(151, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:59:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:59:27', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'dd', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Difficulties in adjusting a new school & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 01:59:27', NULL, NULL, '165839396764', '12331231'),
(152, 'Ian', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 08:59:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-21 01:59:31', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Main Campus(Mati)', 'I don\'t know', 'dd', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Difficulties in adjusting a new school & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 01:59:31', NULL, NULL, '165839397150', '12331231'),
(153, 'Iana', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Entrepreneurial', 'Permanently Separated', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:17:40', '2022-07-22 09:15:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-22 02:16:03', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'No', '0', NULL, 'Banaybanay Extension Campus', 'I don\'t know', 'sdf', 'asdf', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'responsible & ', 'Interpersonal relationship (parent;friends;siblings) & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 02:03:21', 'BE22-0002', '2022-07-22', '165839420151', '1233123'),
(154, 'Ianb', 'jhonson', 'Palola', NULL, 18, 1, 'Single', 'Ian jhonson Palola', NULL, NULL, '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', '17-1B Magsaysay, Barangay. Central, Mati, Davao 8200', 'ian.palola@gmail.com', NULL, '09268805276', 'Tagalog', 'Seventh Day Baptist (SDB)', 'Tagalog', 0, NULL, 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Government', 'Ian jhonson Palola', '09268805276', '17-1B Magsaysay, Barangay. Central', 'Private', 'Marriage Annulled', 14000, 5, 5, 0, 0, 'Ian jhonson Palola', NULL, '17-1B Magsaysay, Barangay. Central', 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 14, 14, 14, 1, NULL, NULL, NULL, NULL, NULL, '2022-07-22 07:17:31', '2022-07-22 09:15:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-22 02:16:04', NULL, NULL, 'Filipino', '5\'4\"', '60', 'guardian samples', 'Ian jhonson Palola', 'Ian jhonson Palola', NULL, 2010, 2010, NULL, 'sample', NULL, 'N/A', 'awe', '0', NULL, 'San-Isidro Extension Campus', 'I don\'t know', 'Yes', 'I don\'t know', 'I don\'t have a plan', 'school', NULL, 'subject you like least', 'course', 'students', 'subject you like most', 'hobbies none', NULL, 'special skills none', 'special interests none', 'easily troubled & ', 'Developing self-confidence & ', 'Friends: , Parents: , Teacher: , Councilors: ', '2022-07-21 02:09:59', 'SE22-0002', '2022-07-22', '165839459919', '1233123');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `religious` varchar(100) DEFAULT NULL,
  `field` int(1) DEFAULT NULL,
  `sector` int(1) DEFAULT NULL,
  `employername` varchar(100) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `hiring` int(1) DEFAULT NULL,
  `past_employment` varchar(4) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `outside` varchar(255) DEFAULT NULL,
  `barangay_id` int(11) NOT NULL,
  `allumni_school_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `users_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `path`, `updated_at`, `created_at`) VALUES
(1, 'sample', 'sample', '2022-06-08 02:30:10', '2022-06-08 02:30:10'),
(2, 'sample', NULL, '2022-06-08 02:53:31', '2022-06-08 02:53:31'),
(3, 'sample', 'asdf', '2022-06-09 20:29:58', '2022-06-09 20:29:58'),
(4, 'sample', 'asdf', '2022-06-09 20:30:41', '2022-06-09 20:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `prog_unit` int(4) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `major`, `description`, `active`, `prog_unit`, `department_id`, `oid`) VALUES
(1, 'General Science', 'Master of Science in Teaching', 1, 18, 5, 1),
(2, 'Mathematics', 'Master of Science in Teaching', 1, 18, 5, 2),
(3, 'Education Management', 'Master of Arts in Education', 1, 18, 5, 3),
(4, 'Teaching English', 'Master of Arts in Education', 1, 18, 5, 4),
(5, 'Agribusiness Management', 'Bachelor of Science in Agribusiness Management', 1, 210, 3, 5),
(6, 'Agricultural Technology', 'Bachelor of Agricultural Technology', 1, 210, 3, 6),
(7, 'Biology', 'Bachelor of Science in Biology', 1, 210, 3, 7),
(8, 'Development Communication', 'Bachelor of Science in Development Communication', 1, 210, 3, 8),
(9, 'Environmental Science', 'Bachelor of Science in Environmental Science', 1, 210, 3, 9),
(10, 'Nursing', 'Bachelor of Science in Nursing', 1, 210, 3, 10),
(11, 'Business Administration', 'Bachelor of Science in Business Administration', 1, 160, 2, 11),
(12, 'Criminology', 'Bachelor of Science in Criminology', 1, 160, 2, 12),
(13, 'HRM', 'Bachelor of Science in Hotel and Restaurant Management', 1, 160, 2, 13),
(14, 'Civil Engineering', 'Bachelor of Science in Civil Engineering', 1, 210, 1, 14),
(15, 'Industrial Technology', 'Bachelor of Industrial Technology Management', 1, 210, 1, 15),
(16, 'Information Technology', 'Bachelor of Science in Information Technology', 1, 210, 1, 16),
(17, 'Business and Finance', 'Bachelor of Science in Mathematics with Business and Finance', 1, 210, 1, 17),
(18, 'Elementary Educ', 'Bachelor of Elementary Education', 1, 210, 4, 32),
(19, 'Biological Sciences', 'Bachelor of Secondary Education major in Biological Sciences', 1, 210, 4, 33),
(20, 'English', 'Bachelor of Secondary Education major in English', 1, 210, 4, 34),
(21, 'Mathematics', 'Bachelor of Secondary Education major in Mathematics', 1, 210, 4, 35),
(22, 'Science', 'Bachelor of Secondary Education major in Science', 1, 210, 4, 36),
(23, 'Physical Education', 'Bachelor of Physical Education major in School Physical Education', 1, 210, 4, 37),
(24, 'Special Needs Education', 'Bachelor of Special Needs Education', 1, 210, 4, 38);

-- --------------------------------------------------------

--
-- Table structure for table `program_has_campus`
--

CREATE TABLE `program_has_campus` (
  `notes` varchar(45) DEFAULT NULL,
  `campus_code` int(11) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_name` varchar(45) DEFAULT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `users_id` bigint(20) DEFAULT NULL,
  `question` longtext DEFAULT NULL,
  `category` longtext DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `closed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `email`, `school_year`, `semester`, `created_at`, `updated_at`, `closed_at`) VALUES
(5, 'gino.labiste@gmail.com', '2021-2022', 'First Semester', '2022-07-19 01:26:45', '2022-07-19 01:26:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `oid` bigint(20) NOT NULL,
  `school_id` varchar(9) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `civil_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_number` int(11) DEFAULT NULL,
  `r_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ethnic_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_working` tinyint(1) DEFAULT NULL,
  `working_for` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_employment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_employment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parents_are` tinyint(1) DEFAULT NULL,
  `family_monthly_income` int(11) DEFAULT NULL,
  `siblings` int(11) DEFAULT NULL,
  `working_siblings` int(11) DEFAULT NULL,
  `college_siblings` int(11) DEFAULT NULL,
  `hs_siblings` int(11) DEFAULT NULL,
  `guardian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardians_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `oid`, `school_id`, `first_name`, `middle_name`, `last_name`, `birthdate`, `age`, `sex`, `civil_status`, `spouse_name`, `spouse_occupation`, `child_number`, `r_address`, `c_address`, `email`, `fb_account`, `contact_number`, `ethnic_group`, `religion`, `languages`, `is_working`, `working_for`, `fathers_name`, `fathers_contact_number`, `fathers_address`, `fathers_employment`, `mothers_name`, `mothers_contact_number`, `mothers_address`, `mothers_employment`, `parents_are`, `family_monthly_income`, `siblings`, `working_siblings`, `college_siblings`, `hs_siblings`, `guardian`, `guardians_number`, `users_id`) VALUES
(2, 2, '2020-0002', 'Ian', 'Als', 'Palola', '2005-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(6, 1, '2021-0001', 'Tata', 'Jhonson', 'Freud', '2005-07-15', 24, 1, 'Single', 'N/A', 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `student_semester`
--

CREATE TABLE `student_semester` (
  `id` bigint(20) NOT NULL,
  `semesters_id` int(10) NOT NULL,
  `students_school_id` varchar(9) NOT NULL,
  `students_users_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `course_no` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_app`
--

CREATE TABLE `sub_app` (
  `oid` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_app`
--

INSERT INTO `sub_app` (`oid`, `name`, `link`) VALUES
(11, 'dashboard', 'adminDashboard'),
(12, 'semesters', 'semester'),
(13, 'open semester', 'semesterCreate'),
(14, 'employee', 'employees'),
(15, 'new employee', 'employeeCreate'),
(16, 'students', 'student'),
(17, 'assign school id', 'schoolId'),
(18, 'sync', 'sync');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `oid` int(10) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `transaction_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_completed` date DEFAULT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transact_by` varchar(10) NOT NULL,
  `students_school_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `employees_employee_id` varchar(10) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `attending_semester_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'ginolabiste', 'Gino Labiste', 'gino.labiste@gmail.com', NULL, '$2y$10$ZrparY8f57Ejk79uy9C9duQ4rkKoABhoqpkEzXmqji7qFWvgl.bLy', NULL, '2022-05-19 19:15:16', '2022-05-19 19:15:16'),
(6, 'argieragas', 'argie ragas', 'argie.ragas@dorsu.edu.ph', NULL, '$2y$10$cAQvYD2ctreOQ4sZJEST0.0Vm6IXWMkmcF3r4RqQbXBlDH4Bj5kr.', NULL, '2022-05-19 23:40:20', '2022-05-19 23:40:20'),
(8, '2021-0001', 'Tata', 'argieragasd8d7@gmail.com', '2022-07-26 04:16:26', '$2y$10$cAQvYD2ctreOQ4sZJEST0.0Vm6IXWMkmcF3r4RqQbXBlDH4Bj5kr.', NULL, '2022-05-19 23:40:20', '2022-05-19 23:40:20'),
(9, 'anya12', 'Anya Twelves', 'anya.twelves@gmail.com', NULL, '$2y$10$npqFN/tC23esNrGEf2KS.u07.0cTqa0MgXVFsIkLengg9zvusg.Q6', NULL, '2022-07-27 01:39:26', '2022-07-27 01:39:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allumni`
--
ALTER TABLE `allumni`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `oid_UNIQUE` (`oid`);

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorization_app`
--
ALTER TABLE `authorization_app`
  ADD PRIMARY KEY (`id`,`app_id`,`users_id`),
  ADD UNIQUE KEY `oid_UNIQUE` (`oid`),
  ADD KEY `fk_authorization_app_app1_idx` (`app_id`),
  ADD KEY `fk_authorization_app_users1_idx` (`users_id`);

--
-- Indexes for table `authorize_sub_app`
--
ALTER TABLE `authorize_sub_app`
  ADD PRIMARY KEY (`sub_app_oid`,`authorization_app_id`),
  ADD KEY `fk_authorize_sub_app_authorization_app1_idx` (`authorization_app_id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barangay_city1_idx` (`city_id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `oid_UNIQUE` (`oid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_city_province1_idx` (`province_id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `fk_subject_has_subject_subject2_idx` (`prerequisite`),
  ADD KEY `fk_subject_has_subject_subject1_idx` (`subject_id`),
  ADD KEY `fk_curriculum_program1_idx` (`program_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_employees`
--
ALTER TABLE `designation_employees`
  ADD UNIQUE KEY `oid_UNIQUE` (`oid`),
  ADD KEY `FOREIGN_KEY_DESG` (`designation_id`),
  ADD KEY `fk_designation_employees_employees1_idx` (`employees_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`oid`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `employee_id` (`id`),
  ADD KEY `fk_employees_users2_idx` (`users_id`),
  ADD KEY `fk_employees_department1_idx` (`department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `fk_failed_jobs_users1_idx` (`users_id`);

--
-- Indexes for table `incoming_students`
--
ALTER TABLE `incoming_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`,`barangay_id`,`allumni_school_id`),
  ADD KEY `fk_job_barangay1_idx` (`barangay_id`),
  ADD KEY `fk_job_allumni1_idx` (`allumni_school_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `oid_UNIQUE` (`oid`),
  ADD KEY `fk_program_department1_idx` (`department_id`);

--
-- Indexes for table `program_has_campus`
--
ALTER TABLE `program_has_campus`
  ADD PRIMARY KEY (`campus_code`,`program_id`),
  ADD KEY `fk_program_has_campus_program1_idx` (`program_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_province_region1_idx` (`region_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_questions_users_idx` (`users_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`school_id`,`users_id`),
  ADD UNIQUE KEY `oid_UNIQUE` (`oid`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_students_users1_idx` (`users_id`);

--
-- Indexes for table `student_semester`
--
ALTER TABLE `student_semester`
  ADD PRIMARY KEY (`id`,`semesters_id`,`students_school_id`,`students_users_id`),
  ADD KEY `fk_attending_semester_semesters1_idx` (`semesters_id`),
  ADD KEY `fk_student_semester_students1_idx` (`students_school_id`,`students_users_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_app`
--
ALTER TABLE `sub_app`
  ADD PRIMARY KEY (`oid`),
  ADD UNIQUE KEY `link_UNIQUE` (`link`) USING HASH;

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_code`),
  ADD UNIQUE KEY `oid_UNIQUE` (`oid`),
  ADD KEY `fk_transactions_employees1_idx` (`transact_by`),
  ADD KEY `fk_transactions_students1_idx` (`students_school_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_units_employees2_idx` (`employees_employee_id`),
  ADD KEY `fk_units_subject2_idx` (`subject_id`),
  ADD KEY `fk_units_attending_semester1_idx` (`attending_semester_id`);

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
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authorization_app`
--
ALTER TABLE `authorization_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designation_employees`
--
ALTER TABLE `designation_employees`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `oid` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incoming_students`
--
ALTER TABLE `incoming_students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_semester`
--
ALTER TABLE `student_semester`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allumni`
--
ALTER TABLE `allumni`
  ADD CONSTRAINT `fk_allumni_students1` FOREIGN KEY (`school_id`) REFERENCES `students` (`school_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `authorization_app`
--
ALTER TABLE `authorization_app`
  ADD CONSTRAINT `fk_authorization_app_app1` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_authorization_app_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `authorize_sub_app`
--
ALTER TABLE `authorize_sub_app`
  ADD CONSTRAINT `fk_authorize_sub_app_authorization_app1` FOREIGN KEY (`authorization_app_id`) REFERENCES `authorization_app` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_authorize_sub_app_sub_app1` FOREIGN KEY (`sub_app_oid`) REFERENCES `sub_app` (`oid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barangay`
--
ALTER TABLE `barangay`
  ADD CONSTRAINT `fk_barangay_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `fk_curriculum_program1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subject_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subject_has_subject_subject2` FOREIGN KEY (`prerequisite`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `designation_employees`
--
ALTER TABLE `designation_employees`
  ADD CONSTRAINT `FOREIGN_KEY_DESG` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_designation_employees_employees1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`oid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employees_users2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD CONSTRAINT `fk_failed_jobs_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_allumni1` FOREIGN KEY (`allumni_school_id`) REFERENCES `allumni` (`school_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_job_barangay1` FOREIGN KEY (`barangay_id`) REFERENCES `barangay` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `fk_password_resets_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `fk_program_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `program_has_campus`
--
ALTER TABLE `program_has_campus`
  ADD CONSTRAINT `fk_program_has_campus_campus1` FOREIGN KEY (`campus_code`) REFERENCES `campus` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_program_has_campus_program1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `fk_province_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_semester`
--
ALTER TABLE `student_semester`
  ADD CONSTRAINT `fk_attending_semester_semesters1` FOREIGN KEY (`semesters_id`) REFERENCES `semesters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_student_semester_students1` FOREIGN KEY (`students_school_id`) REFERENCES `students` (`school_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transactions_employees1` FOREIGN KEY (`transact_by`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transactions_students1` FOREIGN KEY (`students_school_id`) REFERENCES `students` (`school_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `fk_units_attending_semester1` FOREIGN KEY (`attending_semester_id`) REFERENCES `student_semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_units_employees2` FOREIGN KEY (`employees_employee_id`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_units_subject2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
