-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2016 at 10:05 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepprodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'w3c80Vi7IQyzhQFZEURf11G87kiwlN6A', 1, '2016-06-07 10:07:42', '2016-06-07 10:07:42', '2016-06-07 10:07:42'),
(2, 2, '7jX4aXvXIzxaqIatx17LDvKwkAJmTFof', 1, '2016-06-07 10:07:43', '2016-06-07 10:07:43', '2016-06-07 10:07:43'),
(3, 3, '8aFeFXXsXiM6pOyvcTR7oBNE1LWUmWE4', 1, '2016-06-07 10:07:44', '2016-06-07 10:07:43', '2016-06-07 10:07:44'),
(4, 4, 'LrLZSjBAt9pIDKQVpIP2E1W1pUYZY0IY', 1, '2016-06-07 10:07:44', '2016-06-07 10:07:44', '2016-06-07 10:07:44'),
(5, 5, '6Bd5pwNTnj28JbWgSUwfmgQGmT9WgDE4', 1, '2016-06-07 10:07:45', '2016-06-07 10:07:44', '2016-06-07 10:07:45'),
(6, 6, 'hkP1H04eVMMhlvhQFzixHi0q9Xdr7eMJ', 1, '2016-06-07 10:07:45', '2016-06-07 10:07:45', '2016-06-07 10:07:45'),
(7, 7, 'blbO2BdBKi8MvBSVUsLjFuqVkZZA0GAQ', 1, '2016-06-07 10:07:46', '2016-06-07 10:07:46', '2016-06-07 10:07:46'),
(8, 8, 'jbJJAeBjucSEFQOeTzrKzRlhjHcRFjBn', 1, '2016-06-07 10:07:46', '2016-06-07 10:07:46', '2016-06-07 10:07:46'),
(9, 9, '5VDvnHUtISBiXRk0ZKPzZfXT2eDcqxXV', 1, '2016-06-07 10:07:46', '2016-06-07 10:07:46', '2016-06-07 10:07:46'),
(10, 10, '7meHCoKVi9slHt5TqxJCkoUNPLIvQQNO', 1, '2016-06-07 10:07:47', '2016-06-07 10:07:47', '2016-06-07 10:07:47'),
(11, 11, 'Ub0QEbquTK5yYVAt8CL7iHEa0MzcYxDp', 1, '2016-06-07 10:07:47', '2016-06-07 10:07:47', '2016-06-07 10:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `event_time_lines`
--

CREATE TABLE `event_time_lines` (
  `id` int(10) UNSIGNED NOT NULL,
  `memberID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `eventDescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `Student_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Project_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Supervisor_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Student_no`, `Project_id`, `Supervisor_id`, `date`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 'IT13113728', '2', '2', '2016-06-07 ', ' cxcvxcbxcb', '2016-06-07 10:25:11', '2016-06-07 10:25:11'),
(2, 'IT13117238', '7', '2', '2016-06-07 ', ' ghdfgxfhxfjn', '2016-06-07 10:30:27', '2016-06-07 10:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `fileentries`
--

CREATE TABLE `fileentries` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freeslots`
--

CREATE TABLE `freeslots` (
  `id` int(10) UNSIGNED NOT NULL,
  `memberId` int(10) UNSIGNED NOT NULL,
  `freeDay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startingHour` int(11) NOT NULL,
  `startingMin` int(11) NOT NULL,
  `endingHour` int(11) NOT NULL,
  `endingMin` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `freeslots`
--

INSERT INTO `freeslots` (`id`, `memberId`, `freeDay`, `startingHour`, `startingMin`, `endingHour`, `endingMin`, `created_at`, `updated_at`) VALUES
(1, 1, '2015-11-11', 8, 15, 12, 30, '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(2, 1, '2015-11-12', 14, 0, 17, 30, '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(3, 2, '2015-11-11', 8, 45, 13, 30, '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(4, 3, '2015-11-10', 12, 30, 18, 0, '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(5, 3, '2015-11-12', 14, 30, 17, 0, '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(6, 3, '2015-11-11', 8, 30, 15, 0, '2016-06-07 10:07:50', '2016-06-07 10:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `intreport`
--

CREATE TABLE `intreport` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Student_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Project_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Supervisor_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_02_02_230147_migration_cartalyst_sentinel', 1),
('2014_06_28_000000_create_password_resets_table', 1),
('2014_06_28_125248_create_students_table', 1),
('2014_06_28_130728_create_panelmembers_table', 1),
('2014_06_28_130729_create_projects_table', 1),
('2014_08_01_199999_notification_categories', 1),
('2014_08_01_210000_create_notifications_table', 1),
('2014_08_01_210813_create_notification_groups_table', 1),
('2014_08_01_211045_create_notification_category_notification_group_table', 1),
('2015_06_06_211555_add_expire_time_column_to_notification_table', 1),
('2015_06_06_211555_change_type_to_extra_in_notifications_table', 1),
('2015_06_07_211555_alter_category_name_to_unique', 1),
('2015_06_28_130404_create_freeslots_table', 1),
('2015_06_28_131011_create_notices_table', 1),
('2015_06_28_131213_create_presentationpanels_table', 1),
('2015_07_05_122300_create_report_table', 1),
('2015_07_05_122830_create_monthlyfeed_table', 1),
('2015_07_05_123016_create_monthlyfeeds_table', 1),
('2015_07_08_144411_create_fileentries_table', 1),
('2015_07_13_142819_create_progress_table', 1),
('2015_08_25_163837_create_propasal_evaluation_details_table', 1),
('2015_08_27_173554_create_proposal_evaluations_table', 1),
('2015_09_19_014108_create_thesis_presentation_panels_table', 1),
('2015_10_21_170040_create_new_supervisor_requests_table', 1),
('2015_11_01_103356_create_intreport_table', 1),
('2015_11_02_055220_create_event_time_lines_table', 1),
('2015_11_02_095305_create_feedback_table', 1),
('2015_11_02_161947_create_thesis_evaluations_table', 1),
('2015_11_04_174207_create_thesis_evaluation_forms_table', 1),
('2015_11_05_051737_create_upload_links_table', 1),
('2015_11_05_051759_create_submissions_table', 1),
('2015_11_06_103927_create_monthly_reports_table', 1),
('2015_11_07_040602_create_monthly_report_supervisor_feedbacks_table', 1),
('2016_06_06_132551_create_research_areas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monthlyfeed`
--

CREATE TABLE `monthlyfeed` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Project_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthlyfeeds`
--

CREATE TABLE `monthlyfeeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_reports`
--

CREATE TABLE `monthly_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectId` int(10) UNSIGNED NOT NULL,
  `month` int(11) NOT NULL,
  `currentstatus` text COLLATE utf8_unicode_ci NOT NULL,
  `workdone` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monthly_reports`
--

INSERT INTO `monthly_reports` (`id`, `projectId`, `month`, `currentstatus`, `workdone`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Thinking of what to do..', 'Nothing so far :P', '2016-06-07 10:07:52', '2016-06-07 10:07:52'),
(2, 1, 2, 'Deciding when to start', 'Still nothing.. :P', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(3, 1, 3, 'Okay.. I decided to start next month.', 'Eating and sleeping is what is done so far.', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(4, 1, 4, 'Sleeping', 'Oops... :(', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(5, 2, 1, 'Requirements Gathering', 'Team talk.', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(6, 2, 2, 'Software Architecture decide phase', 'MVC research', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(7, 2, 3, 'GUI Design planning', 'Prototype design', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(8, 3, 1, 'Supervisor searching', 'Only talking talking talking...', '2016-06-07 10:07:53', '2016-06-07 10:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report_supervisor_feedbacks`
--

CREATE TABLE `monthly_report_supervisor_feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `supervisorId` int(10) UNSIGNED NOT NULL,
  `reportId` int(10) UNSIGNED NOT NULL,
  `currentstatus` int(11) NOT NULL,
  `workdone` int(11) NOT NULL,
  `timelycompletion` int(11) NOT NULL,
  `supervisorcontact` int(11) NOT NULL,
  `overallprogress` int(11) NOT NULL,
  `seriousproblems` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monthly_report_supervisor_feedbacks`
--

INSERT INTO `monthly_report_supervisor_feedbacks` (`id`, `supervisorId`, `reportId`, `currentstatus`, `workdone`, `timelycompletion`, `supervisorcontact`, `overallprogress`, `seriousproblems`, `comments`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 3, 2, 3, 1, 2, 'Talk with me people..', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(2, 1, 2, 2, 3, 2, 2, 1, 1, 'Expecting more output..', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(3, 1, 3, 2, 2, 2, 2, 1, 1, 'Bar is set high guys..', '2016-06-07 10:07:53', '2016-06-07 10:07:53'),
(4, 1, 4, 2, 3, 1, 4, 1, 1, 'Do the work you lazy bastards..', '2016-06-07 10:07:54', '2016-06-07 10:07:54'),
(5, 2, 6, 3, 3, 2, 3, 1, 2, 'No comments.. Simply waste.', '2016-06-07 10:07:54', '2016-06-07 10:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `new_supervisor_requests`
--

CREATE TABLE `new_supervisor_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `newSupervisorID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `topic`, `detail`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Upload this link', 'Blah Blah Blah.... :P', 'asklgb', '2016-06-07 10:07:51', '2016-06-07 10:07:51'),
(2, 'Upload this link', 'Blah Blah Blah.... :P', 'asfjsla', '2016-06-07 10:07:51', '2016-06-07 10:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expire_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_categories_in_groups`
--

CREATE TABLE `notifications_categories_in_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_categories`
--

CREATE TABLE `notification_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification_categories`
--

INSERT INTO `notification_categories` (`id`, `name`, `text`) VALUES
(1, 'StudentToRpcAddExtSupReq', 'dsfdsf'),
(2, 'StudentToRpcAddExtSupReq1', 'dfdfdsfsdfdsf'),
(3, 'ConfirmInternalSupervisorRequest', 'has Requested a Supervisor'),
(4, 'HasNoSupervisor', 'has no Supervisor assigned'),
(5, 'ConfirmProjectRequest', 'has Requested a Project'),
(6, 'ConfirmExternalSupervisorRequest', 'has Requested a External Supervisor'),
(7, 'InternalSupervisorRequestNotification', 'You have been assign to a project'),
(8, 'RequestSupervisorAsYou', 'has requested a Supervisor as you'),
(9, 'SupervisorMeetingRequest', 'Your request has been accepted Supervisor'),
(10, 'SupervisorMeetingRequestForSupervisor', 'has Requested a Supervisor Meeting'),
(11, 'SupervisorMeetingRequestAccepted', 'has Accepted you requested Supervisor Meeting'),
(12, 'SupervisorMeetingRequestRejected', 'has Rejected you requested Supervisor Meeting');

-- --------------------------------------------------------

--
-- Table structure for table `notification_groups`
--

CREATE TABLE `notification_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panelmembers`
--

CREATE TABLE `panelmembers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speciality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `university` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `panelmembers`
--

INSERT INTO `panelmembers` (`id`, `name`, `designation`, `email`, `phone`, `speciality`, `type`, `status`, `university`, `cv`, `username`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'Senior Lecturer', 'johndoe@testt.lk', '0758965896', 'Robotics', 'Internal Supervisor', 'Approved', 'SLIIT', NULL, 'johnd', '2016-06-07 10:07:48', '2016-06-07 10:07:48'),
(2, 'Martin Walker', 'Assistant Lecturer', 'mwalker@testt.lk', '0778956896', 'Image Processing', 'Internal Supervisor', 'Approved', 'SLIIT', NULL, 'martinw', '2016-06-07 10:07:48', '2016-06-07 10:07:48'),
(3, 'Jane Doe', 'Lecturer', 'janedoe@testt.lk', '0777652865', 'Database Administration', 'External Supervisor', 'Pending', 'Curtin', NULL, 'janed', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(4, 'Alan During', 'Senior Lecturer', 'aduring@testt.lk', '0786457895', 'Robotics', 'External Supervisor', 'Approved', 'UoJ', NULL, 'aland', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(5, 'Vasanthi Kariyavasam', 'Assistant', 'vasanthik@testt.lk', '0769586522', 'Nothing', 'RPC', 'Approved', 'SLIIT', NULL, 'vasanthik', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(6, 'Russel Arnold', 'Lecturer', 'russela@testt.lk', '0725689657', 'Telecommunications', 'Internal Supervisor', 'Approved', 'SLIIT', NULL, 'russela', '2016-06-07 10:07:49', '2016-06-07 10:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 4, 'BC6IKDju0V10ql4hP9DJ3n2SeknocABM', '2016-06-07 10:10:43', '2016-06-07 10:10:43'),
(3, 11, 'wVLKwD7YVEE9PhcW0TzxRtJ95NklTs5O', '2016-06-07 10:10:54', '2016-06-07 10:10:54'),
(5, 7, 's08urRvrsnce5Ij65xGcz2OXM5iZBlwa', '2016-06-07 10:11:11', '2016-06-07 10:11:11'),
(7, 11, 'MzZ7nECYyvhEmloPFnapuadSrotrJ6vO', '2016-06-07 10:13:32', '2016-06-07 10:13:32'),
(9, 7, 'g2SsWhYmEKFjMCFSv8udHYoXQxe8S85R', '2016-06-07 10:15:56', '2016-06-07 10:15:56'),
(11, 11, 'KhzOLMiHPr3gjX9171iSLH3lnwd7B94c', '2016-06-07 10:18:24', '2016-06-07 10:18:24'),
(13, 4, 'TFZj1n6iuxA4iNdfJeH3LP4EDrNVpx7r', '2016-06-07 10:19:44', '2016-06-07 10:19:44'),
(15, 11, 'qIo7fThWlstWl2vcIEyVeAm67lfagUcC', '2016-06-07 10:20:14', '2016-06-07 10:20:14'),
(17, 7, 'ylWMCIFq8VH6PpU0LWeavixUGMfb4iJV', '2016-06-07 10:24:35', '2016-06-07 10:24:35'),
(19, 4, 'sVTDjXh3H8Awgu9TD9nKYWX1kepQWZd3', '2016-06-07 10:25:21', '2016-06-07 10:25:21'),
(21, 7, '4RA6zjPiU1tL3fYuoYH4dTiU13TGHkLD', '2016-06-07 10:25:33', '2016-06-07 10:25:33'),
(23, 11, '6ofw8KHRrntiWl5FMFyzWbr7ANIU7Qd5', '2016-06-07 10:25:42', '2016-06-07 10:25:42'),
(25, 4, 'V5GwcTaDBAghZkyh6nVGMBF1XwIgSKIb', '2016-06-07 10:28:21', '2016-06-07 10:28:21'),
(27, 11, 'ufUZDPdHSn0DcF3D9ueGOm2QFbW71AoX', '2016-06-07 10:28:48', '2016-06-07 10:28:48'),
(29, 7, 'PjI0N9xclCF7YiuaTRfjtZBptvjdRHh6', '2016-06-07 10:29:55', '2016-06-07 10:29:55'),
(31, 7, 'xmMVyYWJKoj9GXQa2HzNNUlkpvlsuBLb', '2016-06-07 10:33:03', '2016-06-07 10:33:03'),
(33, 4, 'Oe4zQl7c7fXpglM6s762nwZcEYLVb3m1', '2016-06-07 10:33:20', '2016-06-07 10:33:20'),
(34, 4, 'sz3fP6LHzCPCMeibrqH22t3iHLoHsBWx', '2016-06-07 10:33:21', '2016-06-07 10:33:21'),
(35, 11, 'VoccIjlHxdUjsQU7NMaTqysb7aRypDAX', '2016-06-07 14:33:48', '2016-06-07 14:33:48'),
(37, 7, '7mhLYYRZmzwPZOHzsoA2kJnRyinVRvkA', '2016-06-07 14:34:21', '2016-06-07 14:34:21'),
(39, 4, 'Q2Jvwzqc90PyP4Ga6AvfpgQsV3lcC22i', '2016-06-07 14:34:43', '2016-06-07 14:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `presentationpanels`
--

CREATE TABLE `presentationpanels` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectId` int(10) UNSIGNED NOT NULL,
  `memberOneId` int(10) UNSIGNED NOT NULL,
  `memberTwoId` int(10) UNSIGNED NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `presentationpanels`
--

INSERT INTO `presentationpanels` (`id`, `projectId`, `memberOneId`, `memberTwoId`, `venue`, `date`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'Concept Nursery', '2015-05-10', '08:40', '09:40', '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(2, 2, 1, 3, 'D-201', '2015-05-11', '09:10', '09:40', '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(3, 3, 1, 3, 'D-201', '2015-05-13', '10:10', '10:30', '2016-06-07 10:07:50', '2016-06-07 10:07:50'),
(4, 4, 1, 3, 'Concept Nursery', '2015-05-11', '09:10', '09:40', '2016-06-07 10:07:50', '2016-06-07 10:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Project_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_project_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prev_month_work` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supervisorId` int(10) UNSIGNED DEFAULT NULL,
  `studentId` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `url`, `supervisorId`, `studentId`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EyeMotion Detection System', 'Blah Blah Blah.... :P', NULL, 1, 1, 'Approved', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(2, 'Vehicle Navigation System', 'Ring ringaring ring... :P', NULL, 2, 2, 'Approved', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(3, 'Tamil BlindReader System', 'Ba Ba Ba ... Baabababa.... Eyemotion :P', NULL, NULL, 3, 'Pending', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(4, 'Virtual Campus System', 'Woooow... :P', NULL, 2, 3, 'Approved', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(5, 'Child Tracking System', 'Aiyo... :P', NULL, NULL, 4, 'Rejected', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(6, 'Virtual Reality Simulation', 'Apoi... :P', NULL, 1, 4, 'Pending', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(7, 'Location Based Social Networking', 'Location Based Social Networking', NULL, 2, 5, 'Proposal Evaluated', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(8, 'Cognitive Machine Learning', 'Cognitive Machine Learning', NULL, 1, 4, 'Proposal Evaluated', '2016-06-07 10:07:49', '2016-06-07 10:07:49'),
(9, 'Location Based Advertising', 'Location Based Advertising', NULL, 1, 5, 'Proposal Evaluated', '2016-06-07 10:07:49', '2016-06-07 10:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `propasal_evaluation_details`
--

CREATE TABLE `propasal_evaluation_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `proposal_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parts` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_evaluations`
--

CREATE TABLE `proposal_evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `panelmember_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Student_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_areas`
--

CREATE TABLE `research_areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `research_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `researcher_i` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `researcher_ii` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `research_areas`
--

INSERT INTO `research_areas` (`id`, `research_area`, `researcher_i`, `researcher_ii`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Big Data Management', 'Muditha Tissera', 'Nethmi Weerawarna', 'Aim of this research group is to identify strenuous areas in flat file database management with the intention of improving efficiency while making developer’s life easy.', '2016-06-06 16:26:27', '2016-06-06 16:26:27'),
(2, 'Business Intelligence', 'Rangika Peiris', 'Rangika Peiris', 'The aim of the Business Intelligence Research group is to advance research in the field of business intelligence and analytics.', '2016-06-06 16:28:18', '2016-06-06 16:28:18'),
(3, 'Computational Linguistics', 'Dilshan de Silva', '', 'This is a discipline between linguistics and computer science which is concerned with the computational aspects of the human language faculty.', '2016-06-06 16:29:41', '2016-06-06 16:29:41'),
(4, 'Artificial Intelligence (AI)', 'Harsha Pradeep', '', 'Our artificial intelligence research addresses the central challenges of machine cognition, both from a theoretical perspective and from an empirical, implementation-oriented perspective.', '2016-06-07 09:26:05', '2016-06-07 09:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'students', 'Students', NULL, '2016-06-07 10:07:42', '2016-06-07 10:07:42'),
(2, 'panelmembers', 'Panel Member', NULL, '2016-06-07 10:07:42', '2016-06-07 10:07:42'),
(3, 'rpc', 'HOD/LIC', NULL, '2016-06-07 10:07:42', '2016-06-07 10:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-06-07 10:07:42', '2016-06-07 10:07:42'),
(2, 1, '2016-06-07 10:07:43', '2016-06-07 10:07:43'),
(3, 1, '2016-06-07 10:07:44', '2016-06-07 10:07:44'),
(4, 1, '2016-06-07 10:07:44', '2016-06-07 10:07:44'),
(5, 1, '2016-06-07 10:07:45', '2016-06-07 10:07:45'),
(6, 2, '2016-06-07 10:07:45', '2016-06-07 10:07:45'),
(7, 2, '2016-06-07 10:07:46', '2016-06-07 10:07:46'),
(8, 2, '2016-06-07 10:07:46', '2016-06-07 10:07:46'),
(9, 2, '2016-06-07 10:07:47', '2016-06-07 10:07:47'),
(10, 2, '2016-06-07 10:07:47', '2016-06-07 10:07:47'),
(11, 3, '2016-06-07 10:07:47', '2016-06-07 10:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `regId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `courseField` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attempt` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `regId`, `name`, `email`, `phone`, `courseField`, `attempt`, `username`, `created_at`, `updated_at`) VALUES
(1, 'IT13119904', 'M.Pranavaghanan', 'ghananisnow@yahoo.com', 772267026, 'IT', 1, 'ghanan2000', '2016-06-07 10:07:48', '2016-06-07 10:07:48'),
(2, 'IT13113728', 'Rangana K.S.', 'sachithr7@gmail.com', 711365458, 'IT', 1, 'sachithr7', '2016-06-07 10:07:48', '2016-06-07 10:07:48'),
(3, 'IT13118914', 'Subangan B.', 'subangan9@gmail.com', 773569854, 'CS', 1, 'subanganb', '2016-06-07 10:07:48', '2016-06-07 10:07:48'),
(4, 'IT13118846', 'Waseem R.', 'waseemramzy@gmail.com', 774105826, 'IM', 2, 'waseemr', '2016-06-07 10:07:48', '2016-06-07 10:07:48'),
(5, 'IT13117238', 'Kaashiff A.', 'makma1969@gmail.com', 771690127, 'CS', 2, 'kaashiff', '2016-06-07 10:07:48', '2016-06-07 10:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submittedDate` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studentId` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thesis_evaluations`
--

CREATE TABLE `thesis_evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `independentScientificThinking` int(11) NOT NULL,
  `scientificKnowHow` int(11) NOT NULL,
  `logic` int(11) NOT NULL,
  `presentation` int(11) NOT NULL,
  `workProcess` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `panelMember` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `formVersion` int(11) NOT NULL,
  `published` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thesis_evaluation_forms`
--

CREATE TABLE `thesis_evaluation_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `independentScientificThinking` int(11) NOT NULL,
  `scientificKnowHow` int(11) NOT NULL,
  `logic` int(11) NOT NULL,
  `presentation` int(11) NOT NULL,
  `workProcess` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thesis_presentation_panels`
--

CREATE TABLE `thesis_presentation_panels` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectId` int(10) UNSIGNED NOT NULL,
  `memberOneId` int(10) UNSIGNED NOT NULL,
  `memberTwoId` int(10) UNSIGNED NOT NULL,
  `venue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thesis_presentation_panels`
--

INSERT INTO `thesis_presentation_panels` (`id`, `projectId`, `memberOneId`, `memberTwoId`, `venue`, `date`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 2, 'Concept Nursery', '2015-11-30', '08:30', '09:15', '2016-06-07 10:07:52', '2016-06-07 10:07:52'),
(2, 8, 2, 4, 'D-201', '2015-11-25', '09:15', '10:00', '2016-06-07 10:07:52', '2016-06-07 10:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_links`
--

CREATE TABLE `upload_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'ghananisnow@yahoo.com', '$2y$10$aDeGBveyEP.zifD8al.dkO8dNSE.PU29iSddSdAPMEhEn7uixGJFa', NULL, NULL, '2016-06-07 10:07:42', '2016-06-07 10:07:42'),
(2, 'sachithr7@gmail.com', '$2y$10$w6MtWueYslOpLR.0ksJEFuG6OjN4msOyp6LlgUI2iWGbdrqeZ./yK', NULL, NULL, '2016-06-07 10:07:43', '2016-06-07 10:07:43'),
(3, 'subangan9@gmail.com', '$2y$10$A0L3SACi/tUKL5hcYgJt.Opkrdkz6g0vuIKhNDwbih3S8BbzFfAn.', NULL, NULL, '2016-06-07 10:07:43', '2016-06-07 10:07:43'),
(4, 'waseemramzy@gmail.com', '$2y$10$LQcHFNjhUWTi2Tmvan3uqunWnIOuyrFv1NEu6WlwYCG6NISOAra9a', NULL, '2016-06-07 14:34:43', '2016-06-07 10:07:44', '2016-06-07 14:34:43'),
(5, 'makma1969@gmail.com', '$2y$10$OLtCMMAInGTIblc3CR.isOgTei7ojB4LfSYLdbbBMB2Sll3CJEABq', NULL, NULL, '2016-06-07 10:07:44', '2016-06-07 10:07:44'),
(6, 'johndoe@testt.lk', '$2y$10$57VeHrysloGRa6GxwDXJ3.33dCRhaB5v7aFR0zDth6Ed/hoPs9DDW', NULL, NULL, '2016-06-07 10:07:45', '2016-06-07 10:07:45'),
(7, 'mwalker@testt.lk', '$2y$10$3QaG8b4aLbP1azF9SbfX5udSdLlYVI4vgKm0QMctEMLnS1Jzt059S', NULL, '2016-06-07 14:34:21', '2016-06-07 10:07:45', '2016-06-07 14:34:21'),
(8, 'janedoe@testt.lk', '$2y$10$m34XwdDE1RhP.FLPcdE0Eu.iEBmnweLXEtHvJ1EVXs4dM/QxJqW2K', NULL, NULL, '2016-06-07 10:07:46', '2016-06-07 10:07:46'),
(9, 'aduring@testt.lk', '$2y$10$1WmdLCpg5rt0TY/2TLZdjur34w.In1tGCkYUTOst5EhT6LXK8Vxjm', NULL, NULL, '2016-06-07 10:07:46', '2016-06-07 10:07:46'),
(10, 'russela@testt.lk', '$2y$10$omQpDekQqNJ67nfGzKcLmOXsDxW856KZWvJgjppLzDAF8b8vd5XJa', NULL, NULL, '2016-06-07 10:07:47', '2016-06-07 10:07:47'),
(11, 'vasanthik@testt.lk', '$2y$10$rldNLJqVdaJaJGkEUS3NjurAy1sEF9nuPeNoq4OHW51u8VJO5ZfC6', NULL, '2016-06-07 14:33:49', '2016-06-07 10:07:47', '2016-06-07 14:33:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_time_lines`
--
ALTER TABLE `event_time_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileentries`
--
ALTER TABLE `fileentries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freeslots`
--
ALTER TABLE `freeslots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freeslots_memberid_foreign` (`memberId`);

--
-- Indexes for table `intreport`
--
ALTER TABLE `intreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlyfeed`
--
ALTER TABLE `monthlyfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlyfeeds`
--
ALTER TABLE `monthlyfeeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_reports`
--
ALTER TABLE `monthly_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_reports_projectid_foreign` (`projectId`);

--
-- Indexes for table `monthly_report_supervisor_feedbacks`
--
ALTER TABLE `monthly_report_supervisor_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_report_supervisor_feedbacks_supervisorid_foreign` (`supervisorId`),
  ADD KEY `monthly_report_supervisor_feedbacks_reportid_foreign` (`reportId`);

--
-- Indexes for table `new_supervisor_requests`
--
ALTER TABLE `new_supervisor_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_from_type_index` (`from_type`),
  ADD KEY `notifications_to_type_index` (`to_type`),
  ADD KEY `notifications_category_id_index` (`category_id`);

--
-- Indexes for table `notifications_categories_in_groups`
--
ALTER TABLE `notifications_categories_in_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_categories_in_groups_category_id_index` (`category_id`),
  ADD KEY `notifications_categories_in_groups_group_id_index` (`group_id`);

--
-- Indexes for table `notification_categories`
--
ALTER TABLE `notification_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notification_categories_name_unique` (`name`),
  ADD KEY `notification_categories_name_index` (`name`);

--
-- Indexes for table `notification_groups`
--
ALTER TABLE `notification_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notification_groups_name_unique` (`name`);

--
-- Indexes for table `panelmembers`
--
ALTER TABLE `panelmembers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `panelmembers_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `presentationpanels`
--
ALTER TABLE `presentationpanels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presentationpanels_projectid_foreign` (`projectId`),
  ADD KEY `presentationpanels_memberoneid_foreign` (`memberOneId`),
  ADD KEY `presentationpanels_membertwoid_foreign` (`memberTwoId`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_supervisorid_foreign` (`supervisorId`),
  ADD KEY `projects_studentid_foreign` (`studentId`);

--
-- Indexes for table `propasal_evaluation_details`
--
ALTER TABLE `propasal_evaluation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_evaluations`
--
ALTER TABLE `proposal_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_areas`
--
ALTER TABLE `research_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_regid_unique` (`regId`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_username_unique` (`username`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_studentid_foreign` (`studentId`);

--
-- Indexes for table `thesis_evaluations`
--
ALTER TABLE `thesis_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesis_evaluation_forms`
--
ALTER TABLE `thesis_evaluation_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesis_presentation_panels`
--
ALTER TABLE `thesis_presentation_panels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_presentation_panels_projectid_foreign` (`projectId`),
  ADD KEY `thesis_presentation_panels_memberoneid_foreign` (`memberOneId`),
  ADD KEY `thesis_presentation_panels_membertwoid_foreign` (`memberTwoId`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `upload_links`
--
ALTER TABLE `upload_links`
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
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `event_time_lines`
--
ALTER TABLE `event_time_lines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fileentries`
--
ALTER TABLE `fileentries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `freeslots`
--
ALTER TABLE `freeslots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `intreport`
--
ALTER TABLE `intreport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monthlyfeed`
--
ALTER TABLE `monthlyfeed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monthlyfeeds`
--
ALTER TABLE `monthlyfeeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monthly_reports`
--
ALTER TABLE `monthly_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `monthly_report_supervisor_feedbacks`
--
ALTER TABLE `monthly_report_supervisor_feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `new_supervisor_requests`
--
ALTER TABLE `new_supervisor_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications_categories_in_groups`
--
ALTER TABLE `notifications_categories_in_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification_categories`
--
ALTER TABLE `notification_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notification_groups`
--
ALTER TABLE `notification_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `panelmembers`
--
ALTER TABLE `panelmembers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `presentationpanels`
--
ALTER TABLE `presentationpanels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `propasal_evaluation_details`
--
ALTER TABLE `propasal_evaluation_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposal_evaluations`
--
ALTER TABLE `proposal_evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `research_areas`
--
ALTER TABLE `research_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thesis_evaluations`
--
ALTER TABLE `thesis_evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thesis_evaluation_forms`
--
ALTER TABLE `thesis_evaluation_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thesis_presentation_panels`
--
ALTER TABLE `thesis_presentation_panels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_links`
--
ALTER TABLE `upload_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `freeslots`
--
ALTER TABLE `freeslots`
  ADD CONSTRAINT `freeslots_memberid_foreign` FOREIGN KEY (`memberId`) REFERENCES `panelmembers` (`id`);

--
-- Constraints for table `monthly_reports`
--
ALTER TABLE `monthly_reports`
  ADD CONSTRAINT `monthly_reports_projectid_foreign` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`);

--
-- Constraints for table `monthly_report_supervisor_feedbacks`
--
ALTER TABLE `monthly_report_supervisor_feedbacks`
  ADD CONSTRAINT `monthly_report_supervisor_feedbacks_reportid_foreign` FOREIGN KEY (`reportId`) REFERENCES `monthly_reports` (`id`),
  ADD CONSTRAINT `monthly_report_supervisor_feedbacks_supervisorid_foreign` FOREIGN KEY (`supervisorId`) REFERENCES `panelmembers` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `notification_categories` (`id`);

--
-- Constraints for table `notifications_categories_in_groups`
--
ALTER TABLE `notifications_categories_in_groups`
  ADD CONSTRAINT `notifications_categories_in_groups_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `notification_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_categories_in_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `notification_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `panelmembers`
--
ALTER TABLE `panelmembers`
  ADD CONSTRAINT `panelmembers_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `presentationpanels`
--
ALTER TABLE `presentationpanels`
  ADD CONSTRAINT `presentationpanels_memberoneid_foreign` FOREIGN KEY (`memberOneId`) REFERENCES `panelmembers` (`id`),
  ADD CONSTRAINT `presentationpanels_membertwoid_foreign` FOREIGN KEY (`memberTwoId`) REFERENCES `panelmembers` (`id`),
  ADD CONSTRAINT `presentationpanels_projectid_foreign` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `projects_supervisorid_foreign` FOREIGN KEY (`supervisorId`) REFERENCES `panelmembers` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_email_foreign` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`);

--
-- Constraints for table `thesis_presentation_panels`
--
ALTER TABLE `thesis_presentation_panels`
  ADD CONSTRAINT `thesis_presentation_panels_memberoneid_foreign` FOREIGN KEY (`memberOneId`) REFERENCES `panelmembers` (`id`),
  ADD CONSTRAINT `thesis_presentation_panels_membertwoid_foreign` FOREIGN KEY (`memberTwoId`) REFERENCES `panelmembers` (`id`),
  ADD CONSTRAINT `thesis_presentation_panels_projectid_foreign` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
