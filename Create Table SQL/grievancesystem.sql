-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 05:21 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grievancesystem`
--
CREATE DATABASE IF NOT EXISTS `grievancesystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `grievancesystem`;

-- --------------------------------------------------------

--
-- Table structure for table `table_aicte_announcement`
--

DROP TABLE IF EXISTS `table_aicte_announcement`;
CREATE TABLE `table_aicte_announcement` (
  `id` int(255) NOT NULL,
  `aicte_user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_college`
--

DROP TABLE IF EXISTS `table_college`;
CREATE TABLE `table_college` (
  `id` int(255) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_college`
--

INSERT INTO `table_college` (`id`, `university_id`, `name`, `state`, `location`, `phone`, `logo`, `registration_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'CVRCE', 'Odisha', 'Khurda', '022-2247686', NULL, 1, '2019-02-27 14:48:05', '2019-02-27 18:30:00'),
(2, 2, 'Techno India', 'West Bengal', 'Kolkata', '022-2247686', NULL, 1, '2019-02-27 14:48:10', '2019-02-27 18:30:00'),
(3, 1, 'Silicon Institute of Technology', 'Odisha', 'Bhubaneswar', '022-2247686', NULL, 1, '2019-02-27 14:48:27', '2019-02-27 18:30:00'),
(4, 1, 'Gandhi Institute of Engineering and Technology', 'Odisha', 'Bhubaneswar', '022-2247686', NULL, 1, '2019-02-27 14:48:33', '2019-02-27 18:30:00'),
(5, 1, 'Nalanda Institute of Technology', 'Odisha', 'Bhubaneswar', '022-2247686', NULL, 1, '2019-02-27 14:48:40', '2019-02-27 18:30:00'),
(6, 1, 'National Institute of Science and Technolgy', 'Odisha', 'Berhampur', '022-2247686', NULL, 1, '2019-02-27 14:48:46', '2019-02-27 18:30:00'),
(7, 2, 'Heritage Institute of Technology', 'West Bengal', 'Kolkata', '022-2247686', NULL, 1, '2019-02-27 14:48:52', '2019-02-27 18:30:00'),
(8, 2, 'Institute of Engineering and Management', 'West Bengal', 'Kolkata', '022-2247686', NULL, 1, '2019-02-27 14:48:58', '2019-02-27 18:30:00'),
(9, 2, 'Haldia Institute of Technology', 'West Bengal', 'Kolkata', '022-2247686', NULL, 1, '2019-02-27 14:49:04', '2019-02-27 18:30:00'),
(10, 3, 'Delhi Technical University', 'Delhi', 'Delhi', '022-2247686', NULL, 1, '2019-02-27 15:05:42', '2019-02-27 18:30:00'),
(11, 4, 'United College of Engineering & Research', 'Uttar Pardesh', 'Lucknow', '022-2247686', NULL, 1, '2019-02-27 14:49:30', '2019-02-27 18:30:00'),
(12, 4, 'Kali Charan Nigam Institute of Technology', 'Uttar Pardesh', 'Banda', '022-2247686', NULL, 1, '2019-02-27 14:49:36', '2019-02-27 18:30:00'),
(13, 5, 'Loyola College', 'Tamilnadu', 'Chennai', '022-2247686', NULL, 1, '2019-02-27 15:02:24', '2019-02-27 18:30:00'),
(14, 5, 'Presidency College', 'Chennai', 'Tamilnadu', '022-2247686', NULL, 1, '2019-02-27 15:02:28', '2019-02-27 18:30:00'),
(15, 4, 'ABES Engineering College', 'Uttar Pardesh', 'Ghaziabad', '022-2247686', NULL, 1, '2019-02-27 14:49:43', '2019-02-27 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_department`
--

DROP TABLE IF EXISTS `table_department`;
CREATE TABLE `table_department` (
  `id` int(255) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_department`
--

INSERT INTO `table_department` (`id`, `college_id`, `type`, `logo`, `created_at`, `created_by`) VALUES
(1, 1, 'Hostel', NULL, '2019-02-20 14:32:04', NULL),
(2, 1, 'Admission Cell', NULL, '2019-02-20 14:32:44', NULL),
(3, 2, 'Hostel', NULL, '2019-02-20 14:32:54', NULL),
(4, 1, 'Examination Cell', NULL, '2019-02-21 11:13:35', NULL),
(5, 1, 'Training and Placement cell', NULL, '2019-02-21 11:14:27', NULL),
(6, 1, 'Accounts Department', NULL, '2019-02-21 11:14:46', NULL),
(7, 1, 'Security', NULL, '2019-02-21 11:15:10', NULL),
(8, 1, 'Ragging', NULL, '2019-02-21 11:15:10', NULL),
(9, 1, 'Transport', NULL, '2019-02-21 11:15:43', NULL),
(10, 1, 'Canteen', NULL, '2019-02-21 11:15:43', NULL),
(11, 1, 'Miscellaneous', NULL, '2019-02-21 11:16:02', NULL),
(12, 1, 'Academics', NULL, '2019-02-26 04:24:47', '1');

-- --------------------------------------------------------

--
-- Table structure for table `table_grievance`
--

DROP TABLE IF EXISTS `table_grievance`;
CREATE TABLE `table_grievance` (
  `id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `documents` varchar(255) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `department_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'raised',
  `delayed_status` tinyint(1) NOT NULL DEFAULT '0',
  `eta` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_grievance`
--

INSERT INTO `table_grievance` (`id`, `type`, `description`, `documents`, `student_id`, `created_at`, `updated_at`, `department_id`, `status`, `delayed_status`, `eta`, `level`) VALUES
(1, 'Academics', 'Non availability of reference books in library.', NULL, 1, '2019-02-26 04:28:06', '2019-03-01 09:11:45', 12, 'reopened', 0, '2019-02-27 18:30:00', 0),
(2, 'Academics', 'More classes required to complete the syllabus', NULL, 2, '2018-02-26 04:31:12', '2019-02-26 04:31:12', 12, 'raised', 0, '2019-03-01 18:30:00', 0),
(3, 'Academics', 'Compensation for attendance due to institute representation.', NULL, 3, '2017-02-26 04:31:12', '2019-02-26 04:31:12', 12, 'inaction', 0, '2019-02-28 18:30:00', 0),
(4, 'Academics', 'non availability of reference books in library.', NULL, 4, '2016-02-26 04:35:04', '2019-02-26 04:35:04', 12, 'inaction', 0, '2019-03-04 00:59:00', 0),
(5, 'Academics', 'Non functioning lab equipment. needs replacing.', NULL, 5, '2019-02-26 04:35:04', '2019-02-26 04:35:04', 12, 'raised', 0, '2019-02-28 02:06:55', 0),
(6, 'Hostel', 'WiFi not working properly.', NULL, 1, '2019-02-26 04:37:30', '2019-02-26 04:37:30', 1, 'raised', 0, '2019-02-27 18:30:00', 0),
(7, 'Hostel', 'Fan in room 221 needs replacing.', NULL, 2, '2018-02-26 04:37:30', '2019-02-26 04:37:30', 1, 'raised', 0, '2019-02-27 18:30:00', 0),
(8, 'Hostel', 'Unhygenic food being distributed', NULL, 3, '2017-02-26 04:39:18', '2019-02-26 04:39:18', 1, 'inaction', 0, '2019-02-27 18:30:00', 0),
(9, 'Hostel', 'Fan in room 225 needs replacing.', NULL, 2, '2019-02-26 04:39:18', '2019-02-26 04:39:18', 1, 'addressed', 0, '2019-02-27 18:30:00', 0),
(10, 'Raging', 'Bad behavior of seniors.', NULL, 2, '2016-02-26 04:42:16', '2019-02-26 04:42:16', 8, 'addressed', 0, '2019-02-05 18:30:00', 0),
(11, 'Training and Placement', 'Unable to attend upcoming placement drive.', NULL, 2, '2019-02-26 04:42:16', '2019-02-26 04:42:16', 5, 'raised', 0, '2019-02-27 07:30:00', 0),
(12, 'Training and Placement', 'Not eligible to attend upcoming placement drive.', NULL, 5, '2015-02-26 04:45:42', '2019-02-26 04:45:42', 5, 'delayed', 1, '2019-02-24 18:30:00', 0),
(13, 'Training and Placement', 'Not eligible to attend upcoming placement drive.', NULL, 3, '2016-02-26 04:45:42', '2019-02-26 04:45:42', 5, 'addressed', 0, '2019-02-26 18:30:00', 0),
(14, 'Hostel', 'Router not working properly.', NULL, 6, '2019-02-26 04:54:28', '2019-02-26 04:54:28', 2, 'raised', 0, '2019-02-27 18:30:00', 0),
(15, 'Hostel', 'Router not wiorking', NULL, 6, '2019-02-26 04:54:28', '2019-02-26 04:54:28', 2, 'delayed', 1, '2019-02-23 18:30:00', 0),
(16, 'Academics', 'classes not being held.', NULL, 7, '2015-02-26 04:55:41', '2019-02-26 04:55:41', NULL, 'addressed', 0, '2019-02-26 18:30:00', 0),
(17, 'Hostel', 'bad food', NULL, 7, '2019-02-26 04:55:41', '2019-02-26 04:55:41', 2, 'inaction', 0, '2019-02-27 18:30:00', 0),
(18, 'Ragging', '4th years', '', 2, '2019-03-01 09:00:00', '2019-03-01 09:00:00', 8, 'raised', 0, '2019-03-08 14:30:00', 0),
(19, 'Accounts Department', 'kl;k;', '', 1, '2018-03-01 10:08:37', '2019-03-01 10:08:37', 6, 'raised', 0, '2019-03-08 15:38:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_message`
--

DROP TABLE IF EXISTS `table_message`;
CREATE TABLE `table_message` (
  `id` int(11) NOT NULL,
  `grievance_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_message`
--

INSERT INTO `table_message` (`id`, `grievance_id`, `message`, `sender_id`, `updated_at`) VALUES
(1, 1, 'ask', 24, '2019-03-01 14:36:59'),
(2, 1, 'ok', 16, '2019-03-01 14:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `table_ombudsman_announcement`
--

DROP TABLE IF EXISTS `table_ombudsman_announcement`;
CREATE TABLE `table_ombudsman_announcement` (
  `id` int(255) NOT NULL,
  `ombudsman_user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_principal_announcement`
--

DROP TABLE IF EXISTS `table_principal_announcement`;
CREATE TABLE `table_principal_announcement` (
  `id` int(255) NOT NULL,
  `principal_user_id` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_search`
--

DROP TABLE IF EXISTS `table_search`;
CREATE TABLE `table_search` (
  `id` int(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `search_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_university`
--

DROP TABLE IF EXISTS `table_university`;
CREATE TABLE `table_university` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_university`
--

INSERT INTO `table_university` (`id`, `name`, `state`, `location`, `phone`, `logo`, `registration_status`, `created_at`, `updated_at`) VALUES
(1, 'BPUT', 'Odisha', 'Rourkela', '062-2247686', NULL, 1, '2019-02-27 14:50:06', '2019-02-27 18:30:00'),
(2, 'WBUT', 'West Bengal', 'Kolkata', '062-2247686', NULL, 1, '2019-02-27 14:50:15', '2019-02-27 18:30:00'),
(3, 'Delhi Technical University', 'Delhi', 'Delhi', '062-2247686', NULL, 1, '2019-02-27 14:50:25', '2019-02-26 02:01:47'),
(4, 'APJAKTU', 'Uttar Pardesh', 'Lucknow', '062-2247686', NULL, 1, '2019-02-27 14:50:34', '2019-02-27 18:30:00'),
(5, 'Madras University', 'Tamilnadu', 'Chennai', '062-2247686', NULL, 1, '2019-02-27 14:50:44', '2019-02-27 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `roles`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anil Sahasrabudhe', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'aicte', 'head_aicte@aicte.edu.in', NULL, '2019-02-26 04:22:09', '2019-02-18 08:41:50'),
(2, 'Anil Sahoo', '$2y$10$bIo56/5mP7oZ.j9.dD7OHumyisam3XIEYeru9dq/fDP4EUK2GnCVe', 'ombudsman', 'anilsahoo@bput.in', NULL, '2019-03-01 17:03:03', '2019-02-18 08:42:31'),
(3, 'S.N. Deepa', '$2y$10$GvyaXV/z1.56PPUEXuIOCeMQXnLwXztaKfos6K0VGzO9nNXhaR/0i', 'principal', 'sndeepa@gmail.com', NULL, '2019-02-25 16:41:49', '2019-02-18 08:43:07'),
(4, 'Priyadarshi Kanungo', '$2y$10$Rs.KpOH/fLXEoRfWNBa7AeeZF7hgaQYPUbUZdK6j4lEOwLzT7hZpS', 'committee member', 'pkanungo@cvrce.edu.in', NULL, '2019-02-26 04:22:33', '2019-02-18 08:44:02'),
(5, 'Shashank Raj', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'student', 'shashankraj@cvrce.edu.in', NULL, '2019-02-26 04:22:53', '2019-02-18 08:44:21'),
(6, 'Kaushik Ojha', '$2y$10$RSxC9l7tQcM4kWKOOqmgjeOf8OK6MFVR7AHArX3hBSBVDH.bVtqcu', 'student', 'kaushikojha@cvrce.edu.in', NULL, '2019-02-26 04:23:02', '2019-02-20 09:08:33'),
(7, 'Surbhi Suman', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'surbhisumanmgr@cvrce.edu.in', NULL, '2019-02-26 04:23:10', '2019-02-20 09:10:17'),
(8, 'M.N. Singh', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'ombudsman', 'mnsingh@wbut.in', NULL, '2019-03-01 17:03:17', '0000-00-00 00:00:00'),
(9, 'Vishal Kujur', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'ombudsman', 'vishalkujur@apjaktu.in', NULL, '2019-02-25 17:40:17', '0000-00-00 00:00:00'),
(10, 'S.N. Sivanandan', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'sivanandan@gmail.com', NULL, '2019-02-25 16:46:33', '0000-00-00 00:00:00'),
(11, 'P.T. Rao', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'ptrao@gmail.com', NULL, '2019-02-25 16:47:05', '0000-00-00 00:00:00'),
(12, 'J.V. Rao', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'jvrao@gmail.com', NULL, '2019-02-25 16:55:44', '2019-02-23 21:41:06'),
(13, 'Bipul Sharma', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'bipulsharma@gmail.com', NULL, '2019-02-25 16:57:02', '2019-02-24 18:30:00'),
(14, 'Aman Sharma', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'amansharma@gmail.com', NULL, '2019-02-25 16:57:55', '2019-02-24 18:30:00'),
(15, 'P.V. Singhal', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'Principal', 'pvsinghal@gmail.com', NULL, '2019-02-25 16:58:44', '2019-02-24 18:30:00'),
(16, 'Bhabes Bhattacharya', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'principalcvrgi@cvrce.edu.in', NULL, '2019-02-26 04:23:41', '2019-02-24 18:30:00'),
(17, 'R.K. Narayan', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'rknarayan@gmail.com', NULL, '2019-02-25 17:00:40', '2019-02-24 18:30:00'),
(18, 'Satyajit Ray', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'satya@gmail.com', NULL, '2019-02-25 17:01:25', '2019-02-24 18:30:00'),
(19, 'Gautam Das', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'gautam@gmail.com', NULL, '2019-02-25 17:02:28', '2019-02-24 18:30:00'),
(20, 'Piyush Chakrabourty', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'piyush@gmail.com', NULL, '2019-02-25 17:03:22', '2019-02-24 18:30:00'),
(21, 'Manish Bhasin', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'manishbhasin@gmail.com', NULL, '2019-02-25 17:04:07', '2019-02-24 18:30:00'),
(22, 'Vipin Sharma', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'vipinsharma@gmail.com', NULL, '2019-02-25 17:04:52', '2019-02-23 18:30:00'),
(23, 'Man Singh', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'principal', 'mansingh@gmail.com', NULL, '2019-02-25 17:06:13', '2019-02-25 05:12:18'),
(24, 'Debdas Mishra', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'debdasmisrhra@gmail.com', NULL, '2019-02-25 17:52:56', '2019-02-24 18:30:00'),
(25, 'P.K. Sahoo', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'pksahoo@gmail.com', NULL, '2019-02-25 17:52:56', '2019-02-24 18:30:00'),
(26, 'Asit Rout', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'asitrout@gmail.com', NULL, '2019-02-25 17:54:37', '2019-02-24 18:54:47'),
(27, 'Sujit Kumar', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'sujitkumar8092@gmail.com', NULL, '2019-02-25 18:04:09', '2019-02-24 18:30:00'),
(28, 'Sachin Tiwari', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'sacht985@gmail.com', NULL, '2019-02-25 18:04:09', '2019-02-24 18:30:00'),
(29, 'Sourav Shrestha', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'shrestha.sourav30@gmail.com', NULL, '2019-02-26 04:49:57', '2019-02-23 18:30:00'),
(30, 'Satyam', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'satyam@gmail.com', NULL, '2019-02-26 04:49:57', '2019-02-26 18:30:00'),
(31, 'Prince Himanshu', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'princehimanshu@gmail.com', NULL, '2019-02-27 07:01:12', '2019-02-27 18:30:00'),
(32, 'Shaurya', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'anshshaurya@gmail.com', NULL, '2019-02-27 07:01:23', '2019-02-27 18:30:00'),
(33, 'Chitra Bansal', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'chitrabansal@gmail.com', NULL, '2019-02-27 07:01:42', '2019-02-27 18:30:00'),
(34, 'Shah Bano', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'shahbano@gmail.com', NULL, '2019-02-27 07:01:52', '2019-02-27 18:30:00'),
(35, 'Pallavi Kumari', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'pallavikumari@gmail.com', NULL, '2019-02-27 07:02:04', '2019-02-27 18:30:00'),
(36, 'Ansuman Mohanty', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'ansumanmohanty@gmail.com', NULL, '2019-02-27 07:02:15', '2019-02-27 18:30:00'),
(37, 'Subham Mohanty', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'subhammohanty@gmail.com', NULL, '2019-02-27 07:02:30', '2019-02-27 18:30:00'),
(38, 'Pritish Rout', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'pritishrout@gmail.com', NULL, '2019-02-27 07:03:16', '2019-02-27 18:30:00'),
(39, 'Sehmat Khan', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'ombudsman', 'sehmatkhan@dtu.in', NULL, '2019-02-27 14:57:30', '2019-02-27 18:30:00'),
(40, 'Tejashwari Singh', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'ombudsman', 'tejashwarisingh@mu.edu.in', NULL, '2019-02-27 14:57:30', '2019-02-27 18:30:00'),
(41, 'Satyajit Dash', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'satyajitdash@gmail.com', NULL, '2019-02-27 15:10:34', '2019-02-27 18:30:00'),
(42, 'Bijendra Kumar', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'bijendrakumar@gmail.com', NULL, '2019-02-27 15:10:34', '2019-02-27 18:30:00'),
(43, 'Akshay Kumar', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'akshaykumar@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(44, 'Amit Kumar', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'amitkumar@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(45, 'Vikram Chaudhary', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'vikramchaudhary@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(46, 'Bijendra Pandey', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'bijendrapandey@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(47, 'Amod Jojowar', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'amodjojowar@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(48, 'Aparna Choubey', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'aparnachoubey@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(49, 'Shreyashi Chakraborty', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'shreyashichakraborty@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(50, 'Amiya Nanda', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'amiyananda@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(51, 'Subhakanta Pati', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'subhakantapati@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(52, 'Sangram Singh', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'sangramsingh@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(53, 'Vikas Singh', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'vikassingh@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(54, 'Avinash Verma', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'avinashverma@gmail.com', NULL, '2019-02-27 15:18:32', '2019-02-27 18:30:00'),
(55, 'M. Rahul', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'madhurahul@gmail.com', NULL, '2019-02-27 15:29:10', '2019-02-27 18:30:00'),
(56, 'Kishore Kumar', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'kishorekumar@gmail.com', NULL, '2019-02-27 17:20:08', '2019-02-27 18:30:00'),
(57, 'Arpana Baral', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'arpanbaral@gmail.com', NULL, '2019-02-27 17:20:08', '2019-02-27 18:30:00'),
(58, 'Satyanarayana Mahanta', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'student', 'satyamahanta@gmail.com', NULL, '2019-02-27 17:20:54', '2019-02-27 18:30:00'),
(59, 'Suraj Singh', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'surajsingh@gmail.com', NULL, '2019-02-27 17:45:47', '2019-02-27 18:30:00'),
(60, 'Amit Patro', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'amitpatro@gmail.com', NULL, '2019-02-27 17:45:47', '2019-02-27 18:30:00'),
(61, 'Shazia Rahat', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'shaziarahat@gmail.com', NULL, '2019-02-27 17:47:11', '2019-02-27 18:30:00'),
(62, 'Rutam Prita Mishra', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'rutam@gmail.com', NULL, '2019-02-27 17:47:11', '2019-02-27 18:30:00'),
(63, 'Aakash Nanda', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'committee member', 'aakashnanda@gmail.com', NULL, '2019-02-27 17:47:54', '2019-02-27 18:30:00'),
(64, 'Brajesh Kumar', 'password', 'committee member', 'brajeshkumar@cvrce.edu.in', NULL, '2019-03-01 15:52:09', '0000-00-00 00:00:00'),
(65, 'Bhavesh Tripathy ', 'password', 'committee member', 'btripathy@cvrce.edu.in', NULL, '2019-03-01 15:52:09', '0000-00-00 00:00:00'),
(66, 'Aman Agarwal', 'password', 'committee member', 'amanagarwal@cvrce.edu.in', NULL, '2019-03-01 16:05:25', '0000-00-00 00:00:00'),
(67, 'Vishves Dhave', 'password', 'committee member', 'vdhave@cvrce.edu.in', NULL, '2019-03-01 16:05:25', '0000-00-00 00:00:00'),
(68, 'Alok Nagar', 'password', 'committee member', 'aloknagar@cvrce.edu.in', NULL, '2019-03-01 16:16:21', '0000-00-00 00:00:00'),
(69, 'Shaina Sheikh', 'password', 'committee member', 'shaina@cvrce.edu.in', NULL, '2019-03-01 16:16:21', '0000-00-00 00:00:00'),
(70, 'Kundan Singh', 'password', 'committee member', 'kundansingh@cvrce.edu .in', NULL, '2019-03-01 16:23:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_aicte`
--

DROP TABLE IF EXISTS `user_aicte`;
CREATE TABLE `user_aicte` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(11) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_aicte`
--

INSERT INTO `user_aicte` (`id`, `user_id`, `name`, `profile_picture`, `last_login`, `phone`, `reset_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anil Sahasrabudhe', NULL, '2019-02-22 09:39:04', '1234567890', NULL, '2019-02-22 09:39:04', '2019-02-22 09:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_committee_member`
--

DROP TABLE IF EXISTS `user_committee_member`;
CREATE TABLE `user_committee_member` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `assigned_committee` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_committee_member`
--

INSERT INTO `user_committee_member` (`id`, `user_id`, `profile_picture`, `name`, `assigned_committee`, `phone`, `created_by`, `department_id`, `registration_status`, `reset_token`) VALUES
(1, 4, NULL, 'Priyadarshi Kanungo', 'Ragging', '8994512356', 1, 8, 1, NULL),
(2, 24, NULL, 'Debdas Mishra', 'academics', '8745135265', 1, 12, 1, NULL),
(3, 25, NULL, 'P.K. Sahoo', 'Hostel', '8755661122', 1, 1, 1, NULL),
(4, 26, NULL, 'Asit Rout', 'Training and Placement', '8745611223', 1, 5, 1, NULL),
(5, 59, NULL, 'Suraj Singh', 'hostel', '8797465974', 6, 1, 1, NULL),
(6, 60, NULL, 'Amit Patro', 'academics', '8797465964', 6, 12, 1, NULL),
(7, 61, NULL, 'Shazia Rahat', 'hostel', '8797465974', 10, 1, 1, NULL),
(8, 62, NULL, 'Rutam Prita Mishra', 'hostel', '8797465964', 11, 1, 1, NULL),
(9, 63, NULL, 'Aakash Nanda', 'hostel', '8797465974', 13, 1, 1, NULL),
(10, 64, NULL, 'Brajesh Kumar', 'Accounts Department', '8746533661', 1, 6, 1, NULL),
(11, 65, NULL, 'Bhavesh Tripathy', 'Security', '8945632145', 1, 7, 1, NULL),
(12, 66, NULL, 'Aman Agarwal', 'Transport', '8946521222', 1, 9, 1, NULL),
(13, 67, NULL, 'Vishves Dhave', 'Examination Cell', '8995542153', 1, 5, 1, NULL),
(14, 68, NULL, 'Alok Nagar', 'Miscellaneous', '8774512365', 1, 11, 1, NULL),
(15, 69, NULL, 'Shaina Sheikh', 'Canteen', '7854523310', 1, 10, 1, NULL),
(16, 70, NULL, 'Kundan Singh', 'Admission Cell', '789451235', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_ombudsman`
--

DROP TABLE IF EXISTS `user_ombudsman`;
CREATE TABLE `user_ombudsman` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_ombudsman`
--

INSERT INTO `user_ombudsman` (`id`, `user_id`, `name`, `profile_picture`, `phone`, `university_id`, `registration_status`, `reset_token`) VALUES
(1, 2, 'Anil Sahoo', NULL, '123456', 1, 1, NULL),
(2, 8, 'M.N. Singh', NULL, '2276797', 2, 1, NULL),
(3, 9, 'Vishal Kujur', NULL, '22789654', 4, 0, NULL),
(4, 39, 'Sehmat Khan', NULL, '064-2276797', 3, 1, NULL),
(5, 40, 'Tejashwari Singh', NULL, '064-2276797', 5, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_principal`
--

DROP TABLE IF EXISTS `user_principal`;
CREATE TABLE `user_principal` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL,
  `college_id` int(11) NOT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_principal`
--

INSERT INTO `user_principal` (`id`, `user_id`, `name`, `profile_picture`, `phone`, `university_id`, `college_id`, `registration_status`, `reset_token`) VALUES
(1, 16, 'Bhabes Bhattacharya', NULL, '879746964', 1, 1, 1, NULL),
(2, 17, 'RK Narayan', NULL, '1234567', 1, 3, 1, NULL),
(3, 12, 'J.V. Rao', NULL, '21345', 1, 4, 1, NULL),
(4, 23, 'Man Singh', NULL, '123456', 1, 5, 1, NULL),
(5, 13, 'Bipul Sharma', NULL, '1239876', 1, 6, 1, NULL),
(6, 3, 'S.N. Deepa', NULL, '120987', 2, 2, 1, NULL),
(7, 18, 'Satyajit Ray', NULL, '125690', 2, 7, 1, NULL),
(8, 19, 'Gautam Das', NULL, '120987', 2, 8, 1, NULL),
(9, 20, 'Piyush Chakrabourty', NULL, '125690', 2, 9, 1, NULL),
(10, 22, 'Vipin Sharma', NULL, '125690', 3, 10, 1, NULL),
(11, 10, 'S.N. Sivanandan', NULL, '120987', 4, 11, 1, NULL),
(12, 11, 'P.T. Rao', NULL, '125690', 4, 12, 1, NULL),
(13, 14, 'Aman Sharma', NULL, '125690', 5, 13, 1, NULL),
(14, 15, 'P.V. Singhal', NULL, '125690', 5, 14, 1, NULL),
(15, 21, 'Manish Bhasin', NULL, '125690', 4, 15, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

DROP TABLE IF EXISTS `user_student`;
CREATE TABLE `user_student` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `college_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `year` int(2) DEFAULT NULL,
  `registration_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`id`, `user_id`, `name`, `profile_picture`, `college_id`, `university_id`, `branch`, `registration_number`, `reset_token`, `course`, `year`, `registration_status`) VALUES
(1, 5, 'Shashank Raj', NULL, 1, 1, 'IT', '1501227652', NULL, 'b.tech', 4, 1),
(2, 6, 'Kaushik Ojha', NULL, 1, 1, 'CSE', '1601227173', NULL, 'bca', 3, NULL),
(3, 7, 'Surbhi Suman', NULL, 1, 1, 'CSE', '1601227432', NULL, 'mca', 2, 1),
(4, 27, 'Sujit Kumar', NULL, 1, 1, 'Civil', '14325678', NULL, 'm.tech', 2, 1),
(5, 28, 'Sachin Tiwari', NULL, 1, 1, 'Mechanical', '1234567890', NULL, 'diploma', 1, 1),
(6, 29, 'Sourav Shrestha', NULL, 2, 2, 'HR', '1234567890', NULL, 'MBA', 2, 1),
(7, 30, 'Satyam', NULL, 2, 2, 'HR', '12345678', NULL, 'MBA', 1, 1),
(8, 31, 'Prince Himanshu', NULL, 2, 2, 'HR', '65754321', NULL, 'MBA', 1, 1),
(9, 32, 'Shaurya', NULL, 2, 2, 'HR', '543221890', NULL, 'MBA', 1, 1),
(10, 33, 'Chitra Bansal', NULL, 2, 2, 'HR', '65754321', NULL, 'MBA', 1, 1),
(11, 34, 'Shah Bano', NULL, 3, 1, 'Civil', '543221890', NULL, 'b.tech', 1, 1),
(12, 35, 'Pallavi Kumari', NULL, 3, 1, 'electrical', '65754321', NULL, 'b.tech', 1, 1),
(13, 36, 'Ansuman Mohanty', NULL, 3, 1, 'electrical', '543221890', NULL, 'b.tech', 1, 1),
(14, 37, 'Subham Mohanty', NULL, 3, 1, 'electrical', '65754321', NULL, 'b.tech', 1, 1),
(15, 38, 'Pritish Rout', NULL, 3, 1, 'civil', '543221890', NULL, 'b.tech', 1, 1),
(16, 41, 'Satyajit Das', NULL, 4, 1, 'HR', '15011127652', NULL, 'MBA', 2, 1),
(17, 42, 'Bijendra Kumar', NULL, 4, 1, 'HR', '1501227561', NULL, 'MBA', 2, 1),
(21, 43, 'Akshay Kumar', NULL, 4, 1, 'HR', '15011127659', NULL, 'MBA', 2, 1),
(22, 44, 'Amit Kumar ', NULL, 4, 1, 'HR', '1501227567', NULL, 'MBA', 2, 1),
(23, 45, 'Vikram Chaudhary', NULL, 4, 1, 'HR', '15012275789', NULL, 'MBA', 2, 1),
(24, 46, 'Bijendra Pandey', NULL, 5, 1, 'IT', '1501227345', NULL, 'b.tech', 4, 1),
(25, 47, 'Amod Jojowar', NULL, 5, 1, 'IT', '1501227891', NULL, 'b.tech', 4, 1),
(43, 48, 'Aparna Choubey', NULL, 5, 1, 'IT', '1501227891', NULL, 'b.tech', 4, 1),
(44, 49, 'Shreyashi Chakraborty', NULL, 5, 1, 'IT', '1501227345', NULL, 'b.tech', 4, 1),
(45, 50, 'Amiya Nanda', NULL, 6, 1, 'electrical', '1501227891', NULL, 'b.tech', 4, 1),
(46, 51, 'Subhakanta Panda', NULL, 6, 1, 'electrical', '1501227345', NULL, 'b.tech', 4, 1),
(47, 52, 'Sangram Singh', NULL, 6, 1, 'CSE', '1501227891', NULL, 'b.tech', 4, 1),
(48, 53, 'Vikas Singh', NULL, 6, 1, 'CSE', '1501227345', NULL, 'b.tech', 4, 1),
(49, 54, 'Avinash Verma', NULL, 6, 1, 'CSE', '1501227891', NULL, 'b.tech', 4, 1),
(51, 55, 'M. Rahul', NULL, 6, 1, 'CSE', '1501227211', NULL, 'b.tech', 4, 1),
(52, 56, 'Kishore Kumar', NULL, 11, 4, 'mechanical', '1601227123', NULL, 'm.tech', 2, 1),
(53, 57, 'Arpana Baral', NULL, 10, 3, 'civil', '1701227130', NULL, 'm.tech', 1, 1),
(54, 58, 'Satyanarayana Mahanta', NULL, 13, 5, 'CSE', '1701543211', NULL, 'm.tech', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_aicte_announcement`
--
ALTER TABLE `table_aicte_announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aicte_user_id` (`aicte_user_id`);

--
-- Indexes for table `table_college`
--
ALTER TABLE `table_college`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `table_department`
--
ALTER TABLE `table_department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `table_grievance`
--
ALTER TABLE `table_grievance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `type` (`type`),
  ADD KEY `type_2` (`type`);

--
-- Indexes for table `table_message`
--
ALTER TABLE `table_message`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `grievance_id` (`grievance_id`);

--
-- Indexes for table `table_ombudsman_announcement`
--
ALTER TABLE `table_ombudsman_announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ombudsman_user_id` (`ombudsman_user_id`);

--
-- Indexes for table `table_principal_announcement`
--
ALTER TABLE `table_principal_announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `principal_user_id` (`principal_user_id`);

--
-- Indexes for table `table_search`
--
ALTER TABLE `table_search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_university`
--
ALTER TABLE `table_university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_aicte`
--
ALTER TABLE `user_aicte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_id`);

--
-- Indexes for table `user_committee_member`
--
ALTER TABLE `user_committee_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `user_ombudsman`
--
ALTER TABLE `user_ombudsman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `user_principal`
--
ALTER TABLE `user_principal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_id`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `user_student`
--
ALTER TABLE `user_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`user_id`),
  ADD UNIQUE KEY `username` (`name`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `university_id` (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_aicte_announcement`
--
ALTER TABLE `table_aicte_announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_college`
--
ALTER TABLE `table_college`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_department`
--
ALTER TABLE `table_department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_grievance`
--
ALTER TABLE `table_grievance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `table_message`
--
ALTER TABLE `table_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_ombudsman_announcement`
--
ALTER TABLE `table_ombudsman_announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_principal_announcement`
--
ALTER TABLE `table_principal_announcement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_search`
--
ALTER TABLE `table_search`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_university`
--
ALTER TABLE `table_university`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_aicte`
--
ALTER TABLE `user_aicte`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_committee_member`
--
ALTER TABLE `user_committee_member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_ombudsman`
--
ALTER TABLE `user_ombudsman`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_principal`
--
ALTER TABLE `user_principal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_student`
--
ALTER TABLE `user_student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_aicte_announcement`
--
ALTER TABLE `table_aicte_announcement`
  ADD CONSTRAINT `table_aicte_announcement_ibfk_1` FOREIGN KEY (`aicte_user_id`) REFERENCES `user_aicte` (`id`);

--
-- Constraints for table `table_college`
--
ALTER TABLE `table_college`
  ADD CONSTRAINT `table_college_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `table_university` (`id`);

--
-- Constraints for table `table_department`
--
ALTER TABLE `table_department`
  ADD CONSTRAINT `table_department_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `table_college` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `table_grievance`
--
ALTER TABLE `table_grievance`
  ADD CONSTRAINT `table_grievance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user_student` (`id`),
  ADD CONSTRAINT `table_grievance_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `table_department` (`id`);

--
-- Constraints for table `table_message`
--
ALTER TABLE `table_message`
  ADD CONSTRAINT `table_message_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_message_ibfk_2` FOREIGN KEY (`grievance_id`) REFERENCES `table_grievance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_ombudsman_announcement`
--
ALTER TABLE `table_ombudsman_announcement`
  ADD CONSTRAINT `table_ombudsman_announcement_ibfk_1` FOREIGN KEY (`ombudsman_user_id`) REFERENCES `user_ombudsman` (`id`);

--
-- Constraints for table `table_principal_announcement`
--
ALTER TABLE `table_principal_announcement`
  ADD CONSTRAINT `table_principal_announcement_ibfk_1` FOREIGN KEY (`principal_user_id`) REFERENCES `user_principal` (`id`);

--
-- Constraints for table `user_aicte`
--
ALTER TABLE `user_aicte`
  ADD CONSTRAINT `user_aicte_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_committee_member`
--
ALTER TABLE `user_committee_member`
  ADD CONSTRAINT `user_committee_member_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user_principal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_committee_member_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `table_department` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_committee_member_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_ombudsman`
--
ALTER TABLE `user_ombudsman`
  ADD CONSTRAINT `user_ombudsman_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `table_university` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ombudsman_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_principal`
--
ALTER TABLE `user_principal`
  ADD CONSTRAINT `user_principal_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `table_college` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_principal_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `table_university` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_principal_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_student`
--
ALTER TABLE `user_student`
  ADD CONSTRAINT `user_student_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `table_college` (`id`),
  ADD CONSTRAINT `user_student_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `table_university` (`id`),
  ADD CONSTRAINT `user_student_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
