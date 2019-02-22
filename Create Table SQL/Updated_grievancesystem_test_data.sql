-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 12:17 PM
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
CREATE DATABASE IF NOT EXISTS `grievancesystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
(1, 1, 'CVRCE', 'Bhubaneswar', 'Khurda', 1234567890, NULL, 1, '2019-02-21 11:11:25', '0000-00-00 00:00:00'),
(2, 2, 'Techno India', 'Kolkata', 'Khurda', 1234567890, NULL, 1, '2019-02-21 11:11:30', '0000-00-00 00:00:00');

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
  `eta` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_grievance`
--

INSERT INTO `table_grievance` (`id`, `type`, `description`, `documents`, `student_id`, `created_at`, `updated_at`, `department_id`, `status`, `eta`, `level`) VALUES
(1, 'Hostel', 'Wifi not working', NULL, 1, '2019-02-20 14:47:47', '2019-02-20 14:47:47', 1, 'raised', '0000-00-00 00:00:00', 0),
(2, 'Academics', 'Fee not refunded till now', NULL, 2, '2019-02-20 14:48:27', '2019-02-20 14:48:27', 2, 'raised', '0000-00-00 00:00:00', 0),
(3, 'Hostel', 'Tap broken', NULL, 1, '2019-02-20 14:51:02', '2019-02-20 14:51:02', 1, 'raised', '0000-00-00 00:00:00', 0),
(4, 'Academics', 'Penalty of 2000', NULL, 1, '2019-02-20 14:53:22', '2019-02-20 14:53:22', 2, 'raised', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_message`
--

CREATE TABLE `table_message` (
  `id` int(255) NOT NULL,
  `grievance_id` int(11) NOT NULL,
  `committee_member` varchar(255) DEFAULT NULL,
  `principal` varchar(255) DEFAULT NULL,
  `ombudsman` varchar(255) DEFAULT NULL,
  `aicte` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'WBUT', 'West Bengal', 'Kolkata', 1234567890, NULL, 1, '2019-02-21 10:51:49', '0000-00-00 00:00:00');

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
(7, 'Student 3', '$2y$10$j1Dsl/EYS2bOWZFMXQwVWeHicZ51tvHiK1ib1D1yMHLV7Yu3tfN8O', 'student', 'student3@gmail.com', NULL, '2019-02-20 09:10:17', '2019-02-20 09:10:17');

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
(3, 7, 'Sujit Kumar', NULL, 2, 2, 'EE', '1501226547', NULL, 'B.Tech', 2, 1);

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
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_department`
--
ALTER TABLE `table_department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_grievance`
--
ALTER TABLE `table_grievance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_message`
--
ALTER TABLE `table_message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_aicte`
--
ALTER TABLE `user_aicte`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_committee_member`
--
ALTER TABLE `user_committee_member`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_ombudsman`
--
ALTER TABLE `user_ombudsman`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_principal`
--
ALTER TABLE `user_principal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_student`
--
ALTER TABLE `user_student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `table_message_ibfk_1` FOREIGN KEY (`grievance_id`) REFERENCES `table_grievance` (`id`) ON DELETE CASCADE;

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
