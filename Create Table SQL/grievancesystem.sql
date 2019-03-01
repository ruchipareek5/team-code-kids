-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 09:37 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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

CREATE TABLE `table_college` (
  `id` int(255) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_college`
--

INSERT INTO `table_college` (`id`, `university_id`, `name`, `state`, `location`, `phone`, `logo`, `registration_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'CVRCE', 'Odisha', 'Bhubaneswar', 1234567890, NULL, 1, '2019-02-25 08:16:53', '0000-00-00 00:00:00'),
(2, 2, 'Techno India', 'West Bengal', 'Kolkata', 1234567890, NULL, 1, '2019-02-25 08:16:46', '0000-00-00 00:00:00'),
(3, 1, 'Silicon Institute of Technology', 'Odisha', 'Bhubaneswar', 1234567890, NULL, 1, '2019-02-22 12:28:42', '0000-00-00 00:00:00'),
(4, 1, 'Gandhi Institute of Engineering and Technology', 'Odisha', 'Bhubaneswar', 1234567890, NULL, 1, '2019-02-22 12:29:43', '0000-00-00 00:00:00'),
(5, 1, 'Nalanda Institute of Technology', 'Odisha', 'Bhubaneswar', 1234567890, NULL, 1, '2019-02-22 12:31:11', '0000-00-00 00:00:00'),
(6, 1, 'National Institute of Science and Technolgy', 'Odisha', 'Berhampur', 1234567890, NULL, 1, '2019-02-22 12:32:15', '0000-00-00 00:00:00'),
(7, 2, 'Heritage Institute of Technology', 'West Bengal', 'Kolkata', 1234567890, NULL, 1, '2019-02-22 12:33:56', '0000-00-00 00:00:00'),
(8, 2, 'Institute of Engineering and Management', 'West Bengal', 'Kolkata', 1234567890, NULL, 1, '2019-02-22 12:36:29', '0000-00-00 00:00:00'),
(9, 2, 'Haldia Institute of Technology', 'West Bengal', 'Kolkata', 1234567890, NULL, 1, '2019-02-22 12:37:30', '0000-00-00 00:00:00'),
(10, 2, 'Narula Institute of Technology', 'West Bengal', 'Agarpara', 1234567890, NULL, 1, '2019-02-22 12:38:47', '0000-00-00 00:00:00'),
(11, 4, 'United College of Engineering & Research', 'Uttar Pardesh', 'Lucknow', 1234567890, NULL, 1, '2019-02-22 12:45:31', '0000-00-00 00:00:00'),
(12, 4, 'Kali Charan Nigam Institute of Technology', 'Uttar Pardesh', 'Banda', 1234567890, NULL, 1, '2019-02-22 12:46:37', '0000-00-00 00:00:00'),
(13, 4, 'Shri Ram Murti Smarak College of Engineering & Technology', 'Uttar Pardesh', 'Bareilly', 1234567890, NULL, 1, '2019-02-22 12:48:11', '0000-00-00 00:00:00'),
(14, 4, 'Future Institute of Management and Technology', 'Uttar Pardesh', 'Bareilly', 1234567890, NULL, 1, '2019-02-22 12:48:56', '0000-00-00 00:00:00'),
(15, 4, 'ABES Engineering College', 'Uttar Pardesh', 'Ghaziabad', 1234567890, NULL, 1, '2019-02-22 12:50:13', '0000-00-00 00:00:00'),
(16, 3, 'Bihar Institute of Technology', 'Bihar', 'Patna', 1234567890, NULL, 1, '2019-02-24 11:01:30', '0000-00-00 00:00:00'),
(17, 9, 'Gurgaon Institute of Technology', 'Haryana', 'Gurgaon', 1234567890, NULL, 1, '2019-02-24 11:01:30', '0000-00-00 00:00:00'),
(18, 10, 'Karnataka Institute of Technology', 'Karnataka', 'Banglore', 1234567890, NULL, 1, '2019-02-24 11:12:16', '0000-00-00 00:00:00'),
(19, 3, 'DJ college', 'Bihar', 'Munger', 1234567890, NULL, 1, '2019-02-24 11:12:16', '0000-00-00 00:00:00'),
(20, 9, 'Goenka Institute of Technology ', 'Haryana', 'Gurgaon', 1234567890, NULL, 1, '2019-02-24 11:16:58', '0000-00-00 00:00:00'),
(21, 10, 'Banglore of Institute of Technology', 'Karnataka', 'Banglore', 1234567890, NULL, 1, '2019-02-24 11:16:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_department`
--

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
(11, 1, 'Miscellaneous', NULL, '2019-02-21 11:16:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_grievance`
--

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
(1, 'Examination Cell', 'Wifi not working', NULL, 1, '2019-02-20 14:47:47', '2019-02-20 14:47:47', 4, 'raised', 0, '0000-00-00 00:00:00', 3),
(2, 'Academics', 'Fee not refunded till now', NULL, 2, '2019-02-20 14:48:27', '2019-02-20 14:48:27', 2, 'raised', 0, '0000-00-00 00:00:00', 0),
(3, 'Hostel', 'Tap broken', NULL, 1, '2019-02-20 14:51:02', '2019-02-20 14:51:02', 1, 'raised', 0, '0000-00-00 00:00:00', 0),
(4, 'Academics', 'Penalty of 2000', NULL, 1, '2019-02-20 14:53:22', '2019-02-20 14:53:22', 2, 'raised', 0, '0000-00-00 00:00:00', 0),
(5, 'Admission Cell', 'Fees not refunded', 'documents/readme.txt', 1, '2019-02-22 04:11:28', '2019-02-24 01:55:49', 2, 'reopened', 0, '2019-03-01 09:41:28', 3),
(6, 'Examination Cell', 'sample', 'documents/readme.txt', 1, '2019-02-22 04:17:37', '2019-02-22 04:17:37', 4, 'delayed', 0, '2019-03-01 09:47:37', 3),
(7, 'Hostel', 'asda', 'NULL', 1, '2019-02-23 06:11:36', '2019-02-23 06:11:36', 1, 'inaction', 0, '2019-03-02 11:41:36', 0),
(8, 'Hostel', 'Sample', 'documents/f2LeLf43Q5QbBMfw8G27Xj7eMOaJoReWpjfnaUu3', 1, '2019-02-23 12:16:48', '2019-02-23 12:16:48', 1, 'raised', 0, '2019-03-02 17:46:48', 0),
(9, 'Examination Cell', 'aaaa', 'documents/Jmg8UQqXZOQBK8b5ETGjNaTLxeNMpSVOzgE67ZZU', 1, '2019-02-23 12:51:40', '2019-02-23 12:51:40', 4, 'raised', 0, '2019-03-02 18:21:40', 0),
(10, 'Security', 'dogs', NULL, 8, '2018-01-31 18:30:00', '2019-02-24 10:17:08', 7, 'raised', 0, '0000-00-00 00:00:00', 0),
(11, 'Ragging', 'done', NULL, 4, '2018-01-31 18:30:00', '2019-02-24 10:19:13', 8, 'raised', 0, '0000-00-00 00:00:00', 0),
(12, 'Transport', 'bus', NULL, 10, '2018-02-14 18:30:00', '2019-02-24 10:19:13', 9, 'raised', 0, '0000-00-00 00:00:00', 0),
(13, 'Canteen', 'food', NULL, 7, '2017-04-13 18:30:00', '2019-02-24 10:21:43', 10, 'raised', 0, '0000-00-00 00:00:00', 0),
(14, 'Training and Placement cell', 'training', NULL, 3, '2016-09-27 18:30:00', '2019-02-24 10:21:43', 5, 'raised', 0, '0000-00-00 00:00:00', 0),
(15, 'Miscellaneous', 'ok', NULL, 7, '2015-12-26 18:30:00', '2019-02-24 10:27:09', 11, 'raised', 0, '0000-00-00 00:00:00', 0),
(16, 'Canteen', 'food', NULL, 5, '2015-02-19 18:30:00', '2019-02-24 10:27:09', 10, 'raised', 0, '0000-00-00 00:00:00', 0),
(17, 'Security', 'guards are not there', NULL, 9, '2017-10-22 18:30:00', '2019-02-24 10:33:58', 7, 'raised', 0, '0000-00-00 00:00:00', 0),
(18, 'Admission Cell', 'admission', NULL, 6, '2016-09-21 18:30:00', '2019-02-24 10:30:29', 2, 'raised', 0, '0000-00-00 00:00:00', 0),
(19, 'Accounts Department', 'account', NULL, 4, '2017-12-10 18:30:00', '2019-02-24 10:30:29', 6, 'raised', 0, '0000-00-00 00:00:00', 0),
(20, 'Hostel', 'matress', NULL, 10, '2015-02-14 18:30:00', '2019-02-24 10:33:58', 1, 'raised', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_message`
--

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
(1, 1, 'ok', 4, '2019-02-23 10:12:08'),
(2, 2, 'fine', 9, '2019-02-23 10:15:09'),
(3, 6, 'Hello', 1, '2019-02-23 19:45:38'),
(4, 6, 'Hello 2', 1, '2019-02-23 19:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `table_ombudsman_announcement`
--

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

CREATE TABLE `table_university` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_university`
--

INSERT INTO `table_university` (`id`, `name`, `state`, `location`, `phone`, `logo`, `registration_status`, `created_at`, `updated_at`) VALUES
(1, 'BPUT', 'Odisha', 'Rourkela', 1234567890, NULL, 1, '2019-02-21 10:51:43', '0000-00-00 00:00:00'),
(2, 'WBUT', 'West Bengal', 'Kolkata', 1234567890, NULL, 1, '2019-02-21 10:51:49', '0000-00-00 00:00:00'),
(3, 'CNLU', 'Bihar', 'Patna', 1234567890, NULL, 1, '2019-02-24 08:25:56', '0000-00-00 00:00:00'),
(4, 'APJAKTU', 'Uttar Pardesh', 'Lucknow', 1234567890, NULL, 1, '2019-02-22 12:43:36', '0000-00-00 00:00:00'),
(5, 'BNMU', 'Bihar', 'Madhepura', 1234567890, NULL, 1, '2019-02-24 08:25:56', '0000-00-00 00:00:00'),
(6, 'CUTM', 'Andhra Pradesh', 'Visakhapatnam', 1234567890, NULL, 1, '2019-02-24 09:21:21', '0000-00-00 00:00:00'),
(7, 'APU', 'Arunachal Pradesh', 'Siang', 1234567890, NULL, 1, '2019-02-24 09:21:21', '0000-00-00 00:00:00'),
(8, 'AU', 'Gujrat', 'Ahmedabad', 1234567890, NULL, 1, '2019-02-24 09:24:06', '0000-00-00 00:00:00'),
(9, 'GDGU', 'Haryana', 'Gurgaon', 123456789, NULL, 1, '2019-02-24 09:24:06', '0000-00-00 00:00:00'),
(10, 'PESU', 'Karnataka', 'Hubballi', 1234567890, NULL, 1, '2019-02-24 09:25:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
(1, 'AICTE Head Name', '$2y$10$1Mi6XypjWw25iLmI3WL8s.aHgs9W.TO99qyGvOVZrh/GFjHy6E3ji', 'aicte', 'aicte@gmail.com', NULL, '2019-02-19 01:04:55', '2019-02-18 08:41:50'),
(2, 'Ombudsman  Name', '$2y$10$bIo56/5mP7oZ.j9.dD7OHumyisam3XIEYeru9dq/fDP4EUK2GnCVe', 'ombudsman', 'ombudsman@gmail.com', NULL, '2019-02-19 01:05:19', '2019-02-18 08:42:31'),
(3, 'Principal  Name', '$2y$10$GvyaXV/z1.56PPUEXuIOCeMQXnLwXztaKfos6K0VGzO9nNXhaR/0i', 'principal', 'principal@gmail.com', NULL, '2019-02-19 01:05:30', '2019-02-18 08:43:07'),
(4, 'Committee Member  Name', '$2y$10$Rs.KpOH/fLXEoRfWNBa7AeeZF7hgaQYPUbUZdK6j4lEOwLzT7hZpS', 'committee member', 'committee@gmail.com', NULL, '2019-02-19 01:05:39', '2019-02-18 08:44:02'),
(5, 'Student', '$2y$10$fYrX6U67gHpL.ljr6cmAD.a9dRfxOtOaOFEUCVuGyPEB4/nvk7N9.', 'student', 'student@gmail.com', NULL, '2019-02-18 08:44:21', '2019-02-18 08:44:21'),
(6, 'Student 2', '$2y$10$RSxC9l7tQcM4kWKOOqmgjeOf8OK6MFVR7AHArX3hBSBVDH.bVtqcu', 'student', 'student2@gmail.com', NULL, '2019-02-20 09:08:33', '2019-02-20 09:08:33'),
(7, 'Student 3', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student3@gmail.com', NULL, '2019-02-20 09:10:17', '2019-02-20 09:10:17'),
(8, 'Ombudsman 2', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'ombudsman', 'ombudsman2@gmail.com', NULL, '2019-02-25 08:03:15', '0000-00-00 00:00:00'),
(9, 'Ombudsman 3', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'ombudsman', 'ombudsman3@gmail.com', NULL, '2019-02-25 08:03:22', '0000-00-00 00:00:00'),
(10, 'Principal 2', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal2@gamil.com', NULL, '2019-02-25 08:03:26', '0000-00-00 00:00:00'),
(11, 'Principal 3', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal3@gamil.com', NULL, '2019-02-25 08:03:29', '0000-00-00 00:00:00'),
(12, 'Student 4', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student4@gmail.com', NULL, '2019-02-25 08:03:33', '0000-00-00 00:00:00'),
(13, 'Student 5', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student5@gmail.com', NULL, '2019-02-25 08:03:38', '0000-00-00 00:00:00'),
(14, 'Student 6', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student6@gmail.com', NULL, '2019-02-25 08:03:41', '0000-00-00 00:00:00'),
(15, 'Student 7', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student7@gmail.com', NULL, '2019-02-25 08:03:44', '0000-00-00 00:00:00'),
(16, 'Student 8', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student8@gmail.com', NULL, '2019-02-25 08:03:47', '0000-00-00 00:00:00'),
(17, 'Student 9', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student9@gmail.com', NULL, '2019-02-25 08:03:50', '0000-00-00 00:00:00'),
(18, 'Student 10', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student10@gmail.com', NULL, '2019-02-25 08:03:53', '0000-00-00 00:00:00'),
(19, 'Principal 1', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal1@gmail.com', NULL, '2019-02-25 08:03:56', '0000-00-00 00:00:00'),
(20, 'Principal 4', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal4@gmail.com', NULL, '2019-02-25 08:04:00', '0000-00-00 00:00:00'),
(21, 'Principal 6', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal6@gmail.com', NULL, '2019-02-25 08:04:03', '0000-00-00 00:00:00'),
(22, 'Principal 7', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal7@gmail.com', NULL, '2019-02-25 08:04:09', '0000-00-00 00:00:00'),
(23, 'Principal 5', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal5@gmail.com', NULL, '2019-02-25 08:04:12', '0000-00-00 00:00:00'),
(24, 'Principal 8', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal8@gmail.com', NULL, '2019-02-25 08:04:16', '0000-00-00 00:00:00'),
(25, 'Principal 9', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'principal', 'principal9@gmail.com', NULL, '2019-02-25 08:04:20', '0000-00-00 00:00:00'),
(26, 'Principal 10', 'password', 'principal', 'principal10@gmail.com', NULL, '2019-02-24 08:52:59', '0000-00-00 00:00:00'),
(27, 'Committee Member 2', 'password', 'committee member', 'committee2@gmail.com', NULL, '2019-02-24 09:29:58', '0000-00-00 00:00:00'),
(28, 'Committee Member 3', 'password', 'committee member', 'committee3@gmail.com', NULL, '2019-02-24 09:29:58', '0000-00-00 00:00:00'),
(29, 'Committee Member 4', 'password', 'committee member', 'committee4@gmail.com', NULL, '2019-02-24 09:31:27', '0000-00-00 00:00:00'),
(30, 'Committee Member 5', 'password', 'committee member', 'committee5@gmail.com', NULL, '2019-02-24 09:31:27', '0000-00-00 00:00:00'),
(31, 'Committee Member 6', 'password', 'committee member', 'committee6@gmail.com', NULL, '2019-02-24 09:34:54', '0000-00-00 00:00:00'),
(32, 'Committee Member 7', 'password', 'committee member', 'committee7@gmail.com', NULL, '2019-02-24 09:34:54', '0000-00-00 00:00:00'),
(33, 'Committee Member 8', 'password', 'committee member', 'committee8@gmail.com', NULL, '2019-02-24 09:36:34', '0000-00-00 00:00:00'),
(34, 'Committee Member 9', 'password', 'committee member', 'committee9@gmail.com', NULL, '2019-02-24 09:36:34', '0000-00-00 00:00:00'),
(35, 'Committee Member 10', 'password', 'committee member', 'committee10@gmail.com', NULL, '2019-02-24 09:37:18', '0000-00-00 00:00:00'),
(36, 'Ombudsman 4', 'password', 'ombudsman', 'ombudsman4@gmail.com', NULL, '2019-02-24 09:59:04', '0000-00-00 00:00:00'),
(37, 'Ombudsman 5', 'password', 'ombudsman', 'ombudsman5@gmail.com', NULL, '2019-02-24 09:59:04', '0000-00-00 00:00:00'),
(38, 'Ombudsman 6', 'password', 'ombudsman', 'ombudsman6@gmail.com', NULL, '2019-02-24 10:00:13', '0000-00-00 00:00:00'),
(39, 'Ombudsman 7', 'password', 'ombudsman', 'ombudsman7@gmail.com', NULL, '2019-02-24 10:08:55', '0000-00-00 00:00:00'),
(40, 'Ombudsman 8', 'password', 'ombudsman', 'ombudsman8@gmail.com', NULL, '2019-02-24 10:01:13', '0000-00-00 00:00:00'),
(41, 'Ombudsman 9', 'password', 'ombudsman', 'ombudsman9@gmail.com', NULL, '2019-02-24 10:01:13', '0000-00-00 00:00:00'),
(42, 'Ombudsman 10', 'password', 'ombudsman', 'ombudsman10@gmail.com', NULL, '2019-02-24 10:02:20', '0000-00-00 00:00:00'),
(43, 'Ombudsman 11', 'password', 'ombudsman', 'ombudsman11@gmail.com', NULL, '2019-02-24 10:02:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_aicte`
--

CREATE TABLE `user_aicte` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` int(10) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_aicte`
--

INSERT INTO `user_aicte` (`id`, `user_id`, `name`, `profile_picture`, `last_login`, `phone`, `reset_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'AICTE Head Name', NULL, '2019-02-22 09:39:04', 1234567890, NULL, '2019-02-22 09:39:04', '2019-02-22 09:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_committee_member`
--

CREATE TABLE `user_committee_member` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `assigned_committee` varchar(255) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_committee_member`
--

INSERT INTO `user_committee_member` (`id`, `user_id`, `profile_picture`, `name`, `assigned_committee`, `phone`, `created_by`, `department_id`, `registration_status`, `reset_token`) VALUES
(1, 4, NULL, 'Commmittee Name', 'Examination Cell', 1234567890, 2, 4, 1, NULL),
(2, 27, NULL, 'Committee Member 2', 'Hostel', 1234567890, 2, 1, 1, NULL),
(3, 28, NULL, 'Committee Member 3', 'Admission Cell', 1234567890, 2, 2, 1, NULL),
(4, 29, NULL, 'Committee Member 4', 'Training and Placement cell', 1234567890, 2, 5, 1, NULL),
(5, 30, NULL, 'Committee Member 5', 'Accounts Department', 1234567890, 2, 6, 1, NULL),
(6, 31, NULL, 'Committee Member 6', 'Security', 1234567890, 2, 7, 1, NULL),
(7, 32, NULL, 'Committee Member 7', 'Ragging', 1234567890, 2, 8, 1, NULL),
(8, 33, NULL, 'Committee Member 8', 'Transport', 1234567890, 2, 9, 1, NULL),
(9, 34, NULL, 'Committee Member 9', 'Canteen', 1234567890, 2, 10, 1, NULL),
(10, 35, NULL, 'Committee Member 10', 'Miscellaneous', 1234567890, 2, 11, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_ombudsman`
--

CREATE TABLE `user_ombudsman` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_ombudsman`
--

INSERT INTO `user_ombudsman` (`id`, `user_id`, `name`, `profile_picture`, `phone`, `university_id`, `registration_status`, `reset_token`) VALUES
(1, 2, 'Ombudsman Name', NULL, 1234567890, 1, 1, NULL),
(2, 8, 'Ombudsman 2', NULL, 1234567890, 4, 1, NULL),
(3, 9, 'Ombudsman 3', NULL, 1234567890, 2, 1, NULL),
(4, 36, 'Ombudsman 4', NULL, 1234567890, 3, 1, NULL),
(5, 37, 'Ombudsman 5', NULL, 1234567890, 5, 1, NULL),
(6, 38, 'Ombudsman 6', NULL, 1234567890, 6, 1, NULL),
(7, 39, 'Ombudsman 7', NULL, 1234567890, 7, 1, NULL),
(8, 40, 'Ombudsman 8', NULL, 1234567890, 8, 1, NULL),
(9, 41, 'Ombudsman 9', NULL, 1234567890, 9, 1, NULL),
(10, 42, 'Ombudsman 10', NULL, 1234567890, 10, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_principal`
--

CREATE TABLE `user_principal` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL,
  `college_id` int(11) NOT NULL,
  `registration_status` int(1) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_principal`
--

INSERT INTO `user_principal` (`id`, `user_id`, `name`, `profile_picture`, `phone`, `university_id`, `college_id`, `registration_status`, `reset_token`) VALUES
(1, 10, 'Principal 2', NULL, 1234567890, 2, 9, 1, NULL),
(2, 11, 'Principal', NULL, 1234567890, 4, 12, 1, NULL),
(3, 19, 'Principal 1', NULL, 1234567890, 1, 3, 1, NULL),
(4, 20, 'Principal 4', NULL, 1234567890, 1, 4, 1, NULL),
(5, 23, 'Principal 5', NULL, 1234567890, 2, 2, 1, NULL),
(6, 21, 'Principal 6', NULL, 1234567890, 4, 11, NULL, NULL),
(7, 22, 'Principal 7', NULL, 1234567890, 1, 5, 1, NULL),
(8, 24, 'Principal 8', NULL, 1234567890, 1, 10, 1, NULL),
(9, 25, 'Principal 9', NULL, 1234567890, 2, 7, 1, NULL),
(10, 26, 'Principal 10', NULL, 1234567890, 1, 8, 1, NULL),
(12, 3, 'Principal 3', NULL, 1234567890, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

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
(1, 5, 'Shashank Raj', NULL, 1, 1, 'IT', '1501227652', NULL, 'B.Tech', 4, 1),
(2, 6, 'Kaushik Ojha', NULL, 1, 1, 'CSE', '1601227131', NULL, 'B.Tech', 3, 1),
(3, 7, 'Sujit Kumar', NULL, 2, 2, 'EE', '1501226547', NULL, 'B.Tech', 2, 1),
(4, 12, 'Tusar Karia', NULL, 1, 1, 'CSE', '160122177', NULL, 'Diploma', 3, 1),
(5, 13, 'Aswani Naidu', NULL, 2, 2, 'ETC', '160122121', NULL, 'Diploma', 3, 1),
(6, 14, 'Arpita Kumari', NULL, 11, 4, 'CE', '160122414', NULL, 'BCA', 1, 1),
(7, 15, 'Arpit Kumar', NULL, 11, 4, 'AEI', '160122541', NULL, 'BCA', 2, 1),
(8, 16, 'Subhra Dash', NULL, 18, 10, 'ETC', '160122365', NULL, 'M TECH', 3, 1),
(9, 17, 'Twinkle', NULL, 16, 3, 'ETC', '1601227777', NULL, 'PHD', 2, 1),
(10, 18, 'Surbhi Suman', NULL, 20, 9, 'CSE', '1601227171', NULL, 'M TECH', 3, 1);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `table_department`
--
ALTER TABLE `table_department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_grievance`
--
ALTER TABLE `table_grievance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_message`
--
ALTER TABLE `table_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_aicte`
--
ALTER TABLE `user_aicte`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_committee_member`
--
ALTER TABLE `user_committee_member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_ombudsman`
--
ALTER TABLE `user_ombudsman`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_principal`
--
ALTER TABLE `user_principal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_student`
--
ALTER TABLE `user_student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
