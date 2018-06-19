-- Selle failiga saate luua toodangu andmebaasi vajalikud tabelid.

-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2018 at 10:36 AM
-- Server version: 10.2.8-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if17_suvepraktika`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `ID` int(11) NOT NULL,
  `Name` varchar(75) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Name`, `Email`) VALUES
('Silver Sternfeldt', 'tlyprojekt@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `decision`
--

CREATE TABLE IF NOT EXISTS `decision` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `form_name` varchar(40) DEFAULT NULL,
  `decision` int(11) DEFAULT 0,
  `confirmed` date DEFAULT NULL,
  `summa` double DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `prePaid` varchar(400) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Table structure for table `scientific_project_application`
--

CREATE TABLE IF NOT EXISTS `scientific_project_application` (
  `id` int(11) NOT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(60) DEFAULT NULL,
  `organization` int(1) NOT NULL DEFAULT 0,
  `connection` varchar(500) DEFAULT NULL,
  `code` varchar(11) DEFAULT NULL,
  `phone` varchar(8) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `speciality` varchar(60) DEFAULT NULL,
  `degree` varchar(60) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `project_manager` varchar(60) DEFAULT NULL,
  `team_members` varchar(1000) DEFAULT NULL,
  `supervisor_name` varchar(60) DEFAULT NULL,
  `supervisor_occupation` varchar(60) DEFAULT NULL,
  `field_of_activity` varchar(60) DEFAULT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `requested_amount` double DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `requested_amount_goal` varchar(500) DEFAULT NULL,
  `problem` varchar(500) DEFAULT NULL,
  `project_goal` varchar(500) DEFAULT NULL,
  `results` varchar(500) DEFAULT NULL,
  `activities` varchar(500) DEFAULT NULL,
  `m_type` enum('M1','M2','M3') DEFAULT NULL,
  `m` varchar(500) DEFAULT NULL,
  `reason` varchar(400) DEFAULT NULL,
  `budget_table` varchar(3000) DEFAULT NULL,
  `budget_total` double DEFAULT NULL,
  `requested_budget` double DEFAULT NULL,
  `budget_explanation` varchar(400) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Table structure for table `scientific_project_report`
--

CREATE TABLE IF NOT EXISTS `scientific_project_report` (
  `id` int(11) NOT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(60) DEFAULT NULL,
  `organization` int(1) NOT NULL DEFAULT 0,
  `code` varchar(11) DEFAULT NULL,
  `phone` varchar(8) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `bank_account` varchar(22) DEFAULT NULL,
  `report_compiler` varchar(60) DEFAULT NULL,
  `project_manager` varchar(60) DEFAULT NULL,
  `team_members` varchar(1000) DEFAULT NULL,
  `supervisor_name` varchar(60) DEFAULT NULL,
  `supervisor_occupation` varchar(60) DEFAULT NULL,
  `supervisor_field` varchar(60) DEFAULT NULL,
  `project_name` varchar(500) DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `grant_awarded` double DEFAULT NULL,
  `actual_cost` double DEFAULT NULL,
  `problem` varchar(3000) DEFAULT NULL,
  `project_goal` varchar(3000) DEFAULT NULL,
  `expected_results` varchar(3000) DEFAULT NULL,
  `actual_results` varchar(3000) DEFAULT NULL,
  `planned_activities` varchar(3000) DEFAULT NULL,
  `actual_activities` varchar(3000) DEFAULT NULL,
  `m_type` enum('M1','M2','M3') DEFAULT NULL,
  `planned_m` varchar(3000) DEFAULT NULL,
  `actual_m` varchar(3000) DEFAULT NULL,
  `additional_info` varchar(3000) DEFAULT NULL,
  `budget_table` varchar(2000) DEFAULT NULL,
  `budget_total` double DEFAULT NULL,
  `requested_budget` double DEFAULT NULL,
  `budget_explanation` varchar(400) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Table structure for table `student_project_application`
--

CREATE TABLE IF NOT EXISTS `student_project_application` (
  `id` int(11) NOT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(60) DEFAULT NULL,
  `organization` int(1) NOT NULL DEFAULT 0,
  `connection` varchar(500) DEFAULT NULL,
  `code` varchar(11) DEFAULT NULL,
  `phone` varchar(8) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `speciality` varchar(60) DEFAULT NULL,
  `degree` varchar(60) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `project_manager` varchar(60) DEFAULT NULL,
  `team_members` varchar(1000) DEFAULT NULL,
  `project_name` varchar(500) DEFAULT NULL,
  `requested_amount` double DEFAULT NULL,
  `budget` double DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `requested_amount_goal` varchar(3000) DEFAULT NULL,
  `problem` varchar(3000) DEFAULT NULL,
  `project_goal` varchar(3000) DEFAULT NULL,
  `results` varchar(3000) DEFAULT NULL,
  `activities` varchar(3000) DEFAULT NULL,
  `additional_info` varchar(3000) DEFAULT NULL,
  `budget_table` varchar(3000) DEFAULT NULL,
  `budget_total` double DEFAULT NULL,
  `requested_budget` double DEFAULT NULL,
  `budget_explanation` varchar(400) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Table structure for table `student_project_report`
--

CREATE TABLE IF NOT EXISTS `student_project_report` (
  `id` int(11) NOT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(60) DEFAULT NULL,
  `organization` int(1) NOT NULL DEFAULT 0,
  `code` varchar(11) DEFAULT NULL,
  `phone` varchar(8) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `bank_account` varchar(22) DEFAULT NULL,
  `report_compiler` varchar(60) DEFAULT NULL,
  `project_manager` varchar(60) DEFAULT NULL,
  `team_members` varchar(240) DEFAULT NULL,
  `project_name` varchar(500) DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `grant_awarded` double DEFAULT NULL,
  `used_grant_awarded` double DEFAULT NULL,
  `actual_cost` double DEFAULT NULL,
  `problem` varchar(3000) DEFAULT NULL,
  `project_goal` varchar(3000) DEFAULT NULL,
  `planned_results` varchar(3000) DEFAULT NULL,
  `actual_results` varchar(3000) DEFAULT NULL,
  `planned_activities` varchar(3000) DEFAULT NULL,
  `actual_activities` varchar(3000) DEFAULT NULL,
  `additional_info` varchar(3000) DEFAULT NULL,
  `budget_table` varchar(2000) DEFAULT NULL,
  `budget_total` double DEFAULT NULL,
  `requested_budget` double DEFAULT NULL,
  `budget_explanation` varchar(400) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `decision`
--
ALTER TABLE `decision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scientific_project_application`
--
ALTER TABLE `scientific_project_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scientific_project_report`
--
ALTER TABLE `scientific_project_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_project_application`
--
ALTER TABLE `student_project_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_project_report`
--
ALTER TABLE `student_project_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `decision`
--
ALTER TABLE `decision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `scientific_project_application`
--
ALTER TABLE `scientific_project_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `scientific_project_report`
--
ALTER TABLE `scientific_project_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student_project_application`
--
ALTER TABLE `student_project_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student_project_report`
--
ALTER TABLE `student_project_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
