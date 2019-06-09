-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2018 at 09:47 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sa4i`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `user_type` tinyint(1) DEFAULT NULL,
  `booking_date` timestamp NULL DEFAULT NULL,
  `booking_from` date DEFAULT NULL,
  `booking_to` date DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `is_booked` tinyint(1) DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `machine_id`, `user_id`, `user_type`, `booking_date`, `booking_from`, `booking_to`, `comment`, `is_booked`, `deleted_at`, `modified_at`, `created_at`) VALUES
(4, 1, 73, 4, NULL, '2018-04-19', '2018-04-20', 'leo', 0, NULL, '2018-04-14 11:46:38', '2018-04-14 07:08:00'),
(5, 2, 73, 4, NULL, '2018-04-28', '2018-04-26', 'mallad', 0, NULL, '2018-04-19 06:10:19', '2018-04-14 11:07:25'),
(6, 1, 73, 4, NULL, '2018-04-14', '2018-04-14', 'sangam', 0, NULL, '2018-04-14 13:01:50', '2018-04-14 11:52:24'),
(7, 3, 73, 4, NULL, '0000-00-00', '0000-00-00', '', 0, NULL, '2018-04-15 06:34:45', '2018-04-14 12:06:49'),
(8, 0, 73, 4, NULL, '2018-04-26', '2018-04-27', 'hhhhjj', 1, NULL, '2018-04-15 06:39:58', '2018-04-15 06:39:58'),
(9, 0, 73, 4, NULL, '2018-04-18', '2018-04-19', 'rahul', 1, NULL, '2018-04-15 06:40:16', '2018-04-15 06:40:16'),
(10, 0, 73, 4, NULL, '2018-04-28', '2018-04-15', 'sangm', 1, NULL, '2018-04-15 06:46:19', '2018-04-15 06:46:19'),
(11, 1, 73, 4, NULL, '2018-04-24', '2018-04-28', 'sangam', 0, NULL, '2018-04-16 04:55:06', '2018-04-15 10:34:18'),
(12, 1, 73, 4, NULL, '2018-04-16', '2018-04-16', 'demo', 0, NULL, '2018-04-19 05:53:47', '2018-04-16 04:55:17'),
(13, 1, 73, 4, NULL, '2018-04-26', '2018-04-27', 'god', 0, NULL, '2018-04-19 05:55:33', '2018-04-19 05:54:43'),
(14, 3, 73, 4, NULL, '2018-04-25', '2018-04-20', 'gjh', 0, NULL, '2018-04-19 05:57:17', '2018-04-19 05:56:30'),
(15, 1, 73, 4, NULL, '2018-04-19', '2018-04-20', 'jh', 0, NULL, '2018-04-19 05:56:58', '2018-04-19 05:56:49'),
(16, 3, 73, 4, NULL, '2018-04-26', '2018-04-20', 'gjg', 0, NULL, '2018-04-19 05:57:40', '2018-04-19 05:57:36'),
(17, 1, 73, 4, NULL, '2018-04-25', '2018-04-20', 'fhg', 0, NULL, '2018-04-19 12:20:21', '2018-04-19 05:58:35'),
(18, 3, 72, 4, NULL, '2018-04-25', '2018-05-04', 'ghh', 1, NULL, '2018-04-19 06:02:31', '2018-04-19 06:02:31'),
(19, 4, 73, 4, NULL, '2018-04-26', '2018-04-28', 'gjgf', 0, NULL, '2018-04-19 06:14:06', '2018-04-19 06:13:13'),
(20, 4, 72, 4, NULL, '2018-04-19', '2018-04-20', 'gjh', 0, NULL, '2018-04-19 06:20:55', '2018-04-19 06:15:25'),
(21, 2, 72, 4, NULL, '2018-04-27', '2018-04-27', 'cgh', 1, NULL, '2018-04-19 06:21:21', '2018-04-19 06:21:21'),
(97, 0, 77, 3, NULL, '2018-07-09', '0000-00-00', 'rstgrs', 1, NULL, '2018-07-09 07:00:49', '2018-07-09 07:00:49'),
(96, 0, 77, 3, NULL, '2018-07-09', '0000-00-00', 'sds', 1, NULL, '2018-07-09 06:30:04', '2018-07-09 06:30:04'),
(94, 19, 83, 4, NULL, '2018-06-25', '2018-06-25', 'nxmzmz', 1, NULL, '2018-06-25 05:54:57', '2018-06-25 05:54:57'),
(95, 14, 76, 4, NULL, '2018-06-26', '2018-06-30', '', 0, NULL, '2018-07-02 05:33:34', '2018-06-26 10:03:49'),
(93, 14, 76, 4, NULL, '2018-06-25', '2018-06-25', 'bnm', 0, NULL, '2018-06-26 10:02:14', '2018-06-25 05:48:55'),
(92, 16, 73, 4, NULL, '2018-06-25', '2018-06-25', 'bzzz', 1, NULL, '2018-06-25 05:42:59', '2018-06-25 05:42:59'),
(32, 1, 73, 4, NULL, '2018-04-19', '2018-04-19', '', 0, NULL, '2018-04-19 13:26:02', '2018-04-19 12:43:59'),
(33, 4, 73, 4, NULL, '2018-04-19', '0000-00-00', '', 0, NULL, '2018-04-19 12:49:02', '2018-04-19 12:47:16'),
(34, 4, 73, 4, NULL, '2018-04-19', '2018-04-19', 'dfd', 0, NULL, '2018-04-19 12:49:41', '2018-04-19 12:49:26'),
(35, 4, 73, 4, NULL, '2018-04-19', '2018-04-19', 'ehjsjs', 0, NULL, '2018-04-19 13:19:26', '2018-04-19 13:19:22'),
(36, 1, 73, 4, NULL, '2018-04-19', '2018-04-19', 'cc', 0, NULL, '2018-05-03 14:42:58', '2018-04-19 13:26:16'),
(37, 4, 73, 4, NULL, '2018-05-03', '2018-05-03', 'damo', 0, NULL, '2018-05-21 06:31:38', '2018-05-03 14:42:48'),
(38, 1, 73, 4, NULL, '2018-05-21', '2018-05-21', 'today', 0, NULL, '2018-05-21 06:48:29', '2018-05-21 06:31:34'),
(39, 1, 73, 4, NULL, '2018-05-21', '2018-05-26', 'ksksks', 0, NULL, '2018-05-21 06:52:09', '2018-05-21 06:52:02'),
(40, 4, 73, 4, NULL, '2018-05-25', '2018-05-31', 'sjks', 0, NULL, '2018-05-21 07:45:08', '2018-05-21 06:52:37'),
(41, 4, 73, 4, NULL, '2018-05-21', '2018-05-24', 'ghnn', 0, NULL, '2018-05-21 11:38:14', '2018-05-21 07:45:19'),
(42, 7, 16, 3, NULL, '2018-05-21', '2018-05-16', 'abc', 0, NULL, '2018-05-21 10:34:26', '2018-05-21 10:34:21'),
(43, 6, 16, 3, NULL, '2018-05-21', '2018-05-24', 'gh', 0, NULL, '2018-05-24 07:30:59', '2018-05-21 10:36:21'),
(44, 4, 73, 4, NULL, '2018-05-23', '2018-05-21', 'kskskz', 0, NULL, '2018-05-21 11:39:15', '2018-05-21 11:38:27'),
(45, 1, 73, 4, NULL, '2018-05-21', '2018-05-25', 'jjjjj', 0, NULL, '2018-05-22 07:43:29', '2018-05-21 11:46:41'),
(46, 1, 73, 4, NULL, '0000-00-00', '0000-00-00', '', 0, NULL, '2018-05-22 07:43:34', '2018-05-22 07:43:32'),
(47, 1, 73, 4, NULL, '2018-05-22', '2018-05-24', 'hkbkggk', 0, NULL, '2018-05-28 09:56:15', '2018-05-22 11:18:14'),
(60, 4, 73, 4, NULL, '2018-05-28', '2018-05-30', '', 0, NULL, '2018-05-28 10:16:03', '2018-05-28 09:52:55'),
(59, 7, 76, 4, NULL, '2018-05-26', '2018-05-30', 'xmmdmd', 0, NULL, '2018-06-25 05:50:22', '2018-05-26 06:00:59'),
(58, 8, 76, 4, NULL, '2018-05-24', '2018-05-31', 'ghb', 1, NULL, '2018-05-24 10:02:31', '2018-05-24 10:02:31'),
(57, 7, 76, 4, NULL, '2018-05-24', '2018-05-24', 'ghbc', 0, NULL, '2018-05-26 06:00:48', '2018-05-24 10:01:47'),
(56, 14, 76, 4, NULL, '2018-05-25', '2018-05-30', 'ghg', 0, NULL, '2018-05-24 10:02:16', '2018-05-24 08:19:30'),
(55, 6, 76, 4, NULL, '2018-05-25', '2018-05-25', 'hjg', 0, NULL, '2018-05-24 08:11:51', '2018-05-24 08:05:40'),
(54, 13, 76, 4, NULL, '2018-05-24', '2018-05-25', 'hjg', 1, NULL, '2018-05-24 07:51:25', '2018-05-24 07:51:25'),
(61, 1, 73, 4, NULL, '2018-05-31', '2018-06-06', 'ghk', 0, NULL, '2018-05-28 10:19:35', '2018-05-28 09:56:29'),
(62, 4, 73, 4, NULL, '2018-05-28', '2018-05-28', 'gg', 0, NULL, '2018-05-28 10:19:38', '2018-05-28 10:18:13'),
(63, 1, 73, 4, NULL, '2018-05-28', '2018-05-28', 'nknkn', 0, NULL, '2018-05-28 10:37:08', '2018-05-28 10:19:48'),
(64, 15, 76, 4, NULL, '2018-05-28', '2018-05-28', 'gghhh', 0, NULL, '2018-05-29 06:14:07', '2018-05-28 10:46:59'),
(65, 1, 73, 4, NULL, '2018-05-28', '2018-05-28', 'hibb', 0, NULL, '2018-05-28 11:08:45', '2018-05-28 10:48:32'),
(66, 4, 73, 4, NULL, '2018-05-28', '2018-05-28', 'hjjj', 0, NULL, '2018-05-28 11:33:17', '2018-05-28 11:08:54'),
(67, 1, 73, 4, NULL, '2018-05-28', '2018-05-28', 'hsjs', 0, NULL, '2018-05-28 11:38:15', '2018-05-28 11:33:28'),
(68, 1, 73, 4, NULL, '2018-05-28', '2018-05-28', 'jjh', 0, NULL, '2018-05-28 12:09:31', '2018-05-28 11:38:26'),
(69, 4, 73, 4, NULL, '2018-05-28', '2018-05-31', 'vnnj', 0, NULL, '2018-05-28 11:54:08', '2018-05-28 11:40:37'),
(70, 4, 73, 4, NULL, '2018-05-28', '2018-06-01', 'vbnn', 0, NULL, '2018-05-28 12:09:36', '2018-05-28 11:54:17'),
(71, 1, 73, 4, NULL, '2018-05-28', '2018-05-28', 'vnn', 0, NULL, '2018-05-28 12:11:32', '2018-05-28 12:09:46'),
(72, 4, 73, 4, NULL, '2018-05-31', '2018-06-06', 'vnn', 0, NULL, '2018-05-29 09:26:12', '2018-05-28 12:10:00'),
(73, 16, 73, 4, NULL, '2018-05-28', '2018-05-28', 'gn', 0, NULL, '2018-05-29 06:05:07', '2018-05-28 12:58:26'),
(74, 16, 73, 4, NULL, '2018-05-29', '2018-05-29', 'vjob', 0, NULL, '2018-06-05 16:38:11', '2018-05-29 06:05:18'),
(75, 15, 76, 4, NULL, '2018-05-29', '2018-05-29', 'hnm', 1, NULL, '2018-05-29 06:14:14', '2018-05-29 06:14:14'),
(76, 1, 73, 4, NULL, '2018-05-29', '2018-05-29', 'xnnxzn', 0, NULL, '2018-05-29 09:32:43', '2018-05-29 09:26:08'),
(77, 1, 73, 4, NULL, '2018-05-29', '2018-05-31', 'hxxj', 1, NULL, '2018-05-29 09:32:55', '2018-05-29 09:32:55'),
(78, 19, 77, 3, NULL, '2018-05-29', '2018-05-16', 'good', 0, NULL, '2018-05-29 11:54:04', '2018-05-29 11:53:47'),
(79, 18, 77, 3, NULL, '2018-05-29', '2018-05-24', 'hjm', 1, NULL, '2018-05-29 11:54:00', '2018-05-29 11:54:00'),
(80, 17, 73, 4, NULL, '2018-05-30', '2018-05-30', 'bnn', 0, NULL, '2018-06-22 10:36:11', '2018-05-30 07:10:39'),
(81, 16, 73, 4, NULL, '2018-06-05', '2018-06-05', 'ghh', 0, NULL, '2018-06-22 10:40:02', '2018-06-05 16:38:35'),
(82, 19, 77, 3, NULL, '2018-06-19', '2018-06-20', 'for Robert ', 1, NULL, '2018-06-18 08:26:41', '2018-06-18 08:26:41'),
(91, 16, 73, 4, NULL, '2018-06-25', '2018-06-25', 'zzzz', 0, NULL, '2018-06-25 05:42:52', '2018-06-25 05:42:49'),
(88, 20, 73, 4, NULL, '2018-04-19', '2018-04-19', 'ghgvfh', 1, NULL, '2018-06-25 05:15:41', '2018-06-25 05:15:41'),
(89, 16, 73, 4, NULL, '2018-06-28', '2018-06-30', 'bhh', 0, NULL, '2018-06-25 05:27:27', '2018-06-25 05:22:32'),
(90, 16, 73, 4, NULL, '2018-06-25', '2018-06-25', 'jjj', 0, NULL, '2018-06-25 05:42:40', '2018-06-25 05:27:36'),
(98, 0, 77, 3, NULL, '2018-07-09', '0000-00-00', 'sds', 1, NULL, '2018-07-09 07:02:09', '2018-07-09 07:02:09'),
(99, 6, 76, 4, NULL, '2018-07-12', '2018-07-20', 'hdks', 0, NULL, '2018-07-13 05:50:17', '2018-07-12 10:35:07'),
(100, 6, 76, 4, NULL, '2018-07-13', '2018-07-28', 'hhjj', 0, NULL, '2018-07-16 06:36:56', '2018-07-13 08:58:03'),
(101, 6, 76, 4, NULL, '2018-07-18', '2018-07-26', 'vn vm', 1, NULL, '2018-07-16 06:38:35', '2018-07-16 06:38:35'),
(102, 31, 78, 4, NULL, '2018-07-19', '2018-07-27', 'nxnxmx', 0, NULL, '2018-07-16 09:34:01', '2018-07-16 08:37:21'),
(103, 32, 78, 4, NULL, '2018-07-16', '2018-07-16', 'nxxn', 0, NULL, '2018-07-17 11:44:30', '2018-07-16 08:37:59'),
(104, 31, 78, 4, NULL, '2018-07-16', '2018-07-27', 'xjkx', 0, NULL, '2018-07-16 09:37:47', '2018-07-16 09:37:44'),
(105, 31, 78, 4, NULL, '2018-07-19', '2018-07-21', 'jnnnn', 0, NULL, '2018-07-16 09:42:37', '2018-07-16 09:39:03'),
(106, 32, 78, 4, NULL, '2018-07-20', '2018-07-28', 'n m m', 0, NULL, '2018-07-16 09:42:59', '2018-07-16 09:42:47'),
(116, 30, 78, 4, NULL, '2018-07-19', '2018-07-27', 'uujjj', 0, NULL, '2018-07-18 05:16:43', '2018-07-18 05:15:10'),
(115, 30, 78, 4, NULL, '2018-07-18', '2018-07-28', 'vkkbb', 0, NULL, '2018-07-18 05:13:59', '2018-07-18 05:09:35'),
(114, 30, 78, 4, NULL, '2018-07-18', '2018-07-28', 'sangam', 0, NULL, '2018-07-18 05:09:01', '2018-07-18 05:06:52'),
(113, 30, 78, 4, NULL, '0000-00-00', '0000-00-00', '', 0, NULL, '2018-07-17 11:48:00', '2018-07-17 11:47:57'),
(117, 30, 78, 4, NULL, '2018-07-18', '2018-07-18', 'xnmzmz', 1, NULL, '2018-07-18 05:17:03', '2018-07-18 05:17:03'),
(118, 33, 78, 4, NULL, '2018-07-18', '2018-07-27', 'hshsj', 1, NULL, '2018-07-18 05:32:44', '2018-07-18 05:32:44'),
(119, 32, 78, 4, NULL, '2018-07-18', '2018-07-31', 'sbbsbs', 0, NULL, '2018-07-18 05:34:04', '2018-07-18 05:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(10) NOT NULL,
  `guest_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `time` time NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `guest_id`, `name`, `message`, `time`, `is_read`, `date_created`) VALUES
(1, 13, '', 'hi', '18:13:41', 0, '2018-05-02 12:43:41'),
(2, 1, '', 'hiiiiiiiiiiii................', '18:14:43', 0, '2018-05-02 12:44:43'),
(3, 1, '', 'heeeelllllooooooo.........', '18:14:54', 0, '2018-05-02 12:44:54'),
(4, 2, '', 'hi', '13:06:43', 0, '2018-05-12 07:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `owner_name` varchar(100) DEFAULT NULL,
  `registration_no` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`id`, `company_id`, `company_name`, `owner_name`, `registration_no`, `is_active`, `is_deleted`, `modified_date`, `created_date`) VALUES
(50, 91, 'infotech', 'infotech', '56324', 1, 0, '2018-07-18 06:52:59', '2018-07-18 06:52:59'),
(49, 90, 'masterdata', 'xyz', '21694525', 1, 0, '2018-07-17 07:40:17', '2018-07-17 07:39:43'),
(10, 16, 'leo', 'monika', '45346', 1, 1, '2018-03-10 07:15:27', '2018-02-24 06:23:24'),
(48, 88, 'Master3', 'Robert', '09072018-1', 1, 0, '2018-07-09 06:47:34', '2018-07-09 06:47:34'),
(47, 87, 'Master2', 'Robert', '09072018-2', 1, 0, '2018-07-09 06:46:11', '2018-07-09 06:46:11'),
(46, 86, 'Master', 'Robert', '09072018-1', 1, 0, '2018-07-09 06:36:28', '2018-07-09 06:36:28'),
(45, 81, 'zzzz', 'test', '345', 1, 0, '2018-06-04 09:42:00', '2018-06-04 09:42:00'),
(44, 80, 'demo', 'demo', '123', 1, 0, '2018-06-04 09:39:29', '2018-06-04 09:39:29'),
(43, 79, 'demo', 'demo', '123', 1, 0, '2018-06-04 09:26:04', '2018-06-04 09:26:04'),
(42, 77, 'test', 'test', '345', 1, 0, '2018-05-29 11:44:52', '2018-05-29 11:44:52'),
(41, 70, 'ROMEN', 'SALVATORE', '1234', 1, 0, '2018-03-31 13:27:13', '2018-03-31 13:27:13'),
(40, 69, 'hhhh', 'kkkk', '21223', 1, 0, '2018-03-31 10:31:10', '2018-03-31 10:31:10'),
(38, 65, 'testdemo', 'testdemo', '1234', 1, 0, '2018-03-31 07:11:42', '2018-03-31 07:11:42'),
(28, 40, 'test', 'test', '1234', 1, 1, '2018-03-10 09:47:33', '2018-03-10 09:47:04'),
(29, 41, 'test', 'test', '12345', 1, 1, '2018-03-12 05:15:02', '2018-03-10 09:48:05'),
(39, 66, 'Manojroh', 'rhmn', '123', 1, 0, '2018-03-31 07:23:48', '2018-03-31 07:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `doctype` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `deleted_at` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest_user`
--

CREATE TABLE `tbl_guest_user` (
  `id` int(10) NOT NULL,
  `guest` varchar(200) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `version` varchar(200) NOT NULL,
  `os` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guest_user`
--

INSERT INTO `tbl_guest_user` (`id`, `guest`, `browser`, `version`, `os`, `ip`) VALUES
(1, 'Guest', 'Google Chrome', '66.0.3359.', 'Windows', '::1'),
(2, 'Guest', 'Google Chrome', '66.0.3359.', 'Windows', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machines`
--

CREATE TABLE `tbl_machines` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `machine_name` varchar(255) DEFAULT NULL,
  `machine_description` text,
  `machine_type` varchar(100) DEFAULT NULL,
  `machine_code` varchar(200) DEFAULT NULL,
  `bar_code` varchar(100) DEFAULT NULL,
  `qr_code` varchar(100) DEFAULT NULL,
  `nfc_code` varchar(100) DEFAULT NULL,
  `is_nfc` int(10) NOT NULL DEFAULT '0',
  `is_booked` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `deleted_at` datetime(1) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` int(10) NOT NULL,
  `inventory_number` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `date_of_proof` date NOT NULL,
  `next_check` date NOT NULL,
  `date_of_buy` date NOT NULL,
  `price` int(255) NOT NULL,
  `book_machine` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_machines`
--

INSERT INTO `tbl_machines` (`id`, `company_id`, `machine_name`, `machine_description`, `machine_type`, `machine_code`, `bar_code`, `qr_code`, `nfc_code`, `is_nfc`, `is_booked`, `is_active`, `deleted_at`, `modified_at`, `created_at`, `isdeleted`, `inventory_number`, `location`, `brand_name`, `serial_number`, `date_of_proof`, `next_check`, `date_of_buy`, `price`, `book_machine`) VALUES
(1, 65, 'Hp', 'good', 'laptop', '1234', '54586-Hp-65', '42729_Hp_65', NULL, 0, 1, 1, NULL, '2018-06-05 12:30:46', '2018-04-14 06:40:54', 1, '123', 'pune', 'Hp', '1234', '2018-04-12', '2018-04-19', '2018-04-18', 20000, 0),
(2, 65, 'lenovo', 'good', 'Tab', '345', '25744-len-65', '45116_len_65', NULL, 0, 1, 0, NULL, '2018-06-05 12:30:59', '2018-04-14 06:42:57', 1, '123', 'mumbai', 'lenovo', '123', '2018-04-12', '2018-04-19', '2018-04-19', 2000, 0),
(3, 65, 'hTc', 'good', 'mobile', '123', '38350-hTc-65', '28879_hTc_65', NULL, 0, 1, 1, NULL, '2018-06-05 12:31:13', '2018-04-14 06:44:30', 1, '345', 'pune', 'hTc', '123', '2018-04-18', '2018-04-19', '2018-04-15', 20000, 0),
(4, 65, 'abc', 'abc', 'abc', '123', '91669-abc-65', '95149_abc_65', NULL, 0, 0, 0, NULL, '2018-07-16 05:48:55', '2018-04-19 06:12:17', 0, '343', 'pune', 'abc', '2334', '2018-04-18', '2018-04-24', '2018-04-12', 5656456, 0),
(5, 41, 'test', 'good', 'test', '1232', '82453-tes-41', '58574', NULL, 0, 0, 1, NULL, '2018-07-12 10:29:09', '2018-04-24 12:13:37', 0, '2323', 'pune', 'test', '46456', '2018-04-26', '2018-04-26', '2018-04-18', 56456, 0),
(6, 16, 'Sony', 'Mostly used', 'Sony', '12362', '36340-Son-16', '52391_Son_16', NULL, 0, 1, 0, NULL, '2018-07-16 06:38:35', '2018-05-21 06:47:46', 0, '2652331', 'pune', 'Sony', '1166', '2018-05-02', '2018-05-02', '2018-05-09', 20000, 0),
(7, 16, 'hp', 'good', 'laptop', '123', '75737-hp-16', '73577_hp_16', NULL, 0, 0, 1, NULL, '2018-06-25 12:28:18', '2018-05-21 06:51:00', 1, '1234', 'pune', 'hp', '123', '2018-05-25', '2018-05-24', '2018-05-23', 1234, 0),
(8, 16, 'dell', 'dell', 'dell company', '1355', '28325-del-16', '53727_del_16', NULL, 0, 1, 1, NULL, '2018-06-25 12:30:17', '2018-05-22 06:25:34', 1, '6352', 'pune', 'dell machine', '5698', '2018-05-23', '2018-05-25', '2018-05-30', 50000, 0),
(17, 65, 'driller', 'driller', 'driller', '5656', '71875-dri-65', '91681_dri_65', NULL, 0, 1, 1, NULL, '2018-07-09 05:42:47', '2018-05-29 10:37:06', 1, '5767', 'pune', 'driller', '5464', '2018-05-09', '2018-05-17', '2018-05-25', 444, 0),
(16, 65, 'Hilit', 'testing', 'Bohrmaschine', '12345', '50476-Hil-65', '49102_Hil_65', NULL, 0, 1, 1, NULL, '2018-07-09 05:40:34', '2018-05-28 12:42:13', 1, '12345', 'Kö, Messerschmittring', 'Hilit', '12345678', '2018-05-28', '2018-05-16', '2018-05-16', 433, 0),
(14, 16, 'mackbook', 'ghfgh', 'apple', '1234', '83552', '67386_mac_16', NULL, 0, 0, 1, NULL, '2018-07-16 06:14:52', '2018-05-24 08:15:08', 1, '33435', 'pune', 'apple', '35345', '2018-05-17', '2018-05-09', '2018-05-30', 900000, 0),
(15, 16, 'ipad', 'ipads', 'ipad', '2563', '29120', '90612_ipa_16', NULL, 0, 0, 1, NULL, '2018-07-18 05:59:21', '2018-05-26 07:11:30', 1, '2541', 'sangli', 'ipads', '9685', '2018-05-16', '2018-05-17', '2018-05-19', 5500, 0),
(18, 77, 'hp', 'laptop', 'laptop', '565', '46900-hp-77', '29669_hp_77', 'n_hp_565_345', 1, 1, 1, NULL, '2018-07-09 05:40:04', '2018-05-29 11:46:37', 1, '57567', 'pune', 'laptop', '6756', '2018-05-08', '2018-05-10', '2018-05-24', 50000, 0),
(19, 77, 'driller', 'driller', 'driller', '123', '66638', '40984_dri_77', 'ndri123345', 1, 0, 1, NULL, '2018-07-18 05:58:05', '2018-05-29 11:49:52', 1, '34', 'pune', 'driller', '56', '2018-05-17', '2018-05-17', '2018-05-24', 6000, 0),
(20, 77, 'sony', 'sony', 'laptop', '234', '94334-son-77', '67232_son_77', 'nson234345', 1, 0, 1, NULL, '2018-07-18 05:58:22', '2018-06-23 10:08:51', 1, '123', 'pune', 'sony', '12', '2018-06-15', '2018-06-15', '2018-06-20', 40000, 0),
(32, 77, 'JCB-one', 'Machine-JCB', 'Hardware', 'abc123', '22136-JCB-77', '26993_JCB_77', NULL, 1, 0, 1, NULL, '2018-07-18 05:34:04', '2018-07-12 10:47:45', 0, 'jcb123', 'pune', '', 'jcb123', '2018-07-17', '2018-07-24', '2018-07-11', 1000000, 0),
(28, 77, 'joy', 'playstation', 'play', '456', '98019-joy-77', '99737_joy_77', NULL, 0, 0, 1, NULL, '2018-07-11 06:07:22', '2018-07-11 05:51:54', 1, 'play123', 'pune', '', '', '2022-04-04', '2023-05-04', '2022-05-05', 1000, 0),
(27, 77, 'Mouse', 'Computers', 'software', '123', '47707-Mou-77', '40927_Mou_77', NULL, 0, 0, 1, NULL, '2018-07-11 06:07:36', '2018-07-10 10:31:12', 1, 'bill_mouse', 'mumbai', 'pro', 'm123', '2026-06-04', '2023-05-05', '2021-05-04', 100, 0),
(26, 77, 'Printer', 'xdcsd', 'HP', '123456', '24876-Pri-77', '31337_Pri_77', NULL, 1, 0, 1, NULL, '2018-07-11 06:07:39', '2018-07-10 06:50:46', 1, '123', 'dxcsd', 'HP EPSON', '232342', '2017-11-30', '2017-11-30', '2017-11-30', 5000, 0),
(25, 86, 'Phone1', 'xxx', 'Phone', '12345', '71987-Pho-86', '70238_Pho_86', 'nPho1234509072018-1', 2, 0, 1, NULL, '2018-07-17 07:49:20', '2018-07-10 06:33:50', 0, '12345', 'Kö, Messerschmittring', 'Siemens', '12345678', '2018-07-13', '2018-07-13', '2017-07-13', 399, 0),
(29, 77, 'led', 'computer Hardware', 'computer Hardware', 'led123', '35622-led-77', '81939_led_77', NULL, 0, 0, 1, NULL, '2018-07-11 06:07:18', '2018-07-11 06:04:04', 1, '', 'mumbai', '', 'led123', '2018-07-02', '2018-07-02', '2018-07-02', 1200, 0),
(30, 77, 'moto', '', 'computer Hardware', 'abc123', '56762-Pri-77', '71934_Pri_77', 'nPriabc123345', 2, 0, 1, NULL, '2018-07-18 05:30:49', '2018-07-11 06:10:32', 0, '', 'Pune', 'gvjgj', 'HP_123', '2018-07-01', '2018-07-10', '2018-07-04', 5000, 0),
(31, 77, 'new', 'DCDXCVSDC', 'DFSDFSFDSF', 'DCVSDVS', '14938-DFS-77', '79186_DFS_77', 'nDFSDCVSDVS345', 1, 0, 1, NULL, '2018-07-17 07:31:36', '2018-07-11 07:56:26', 1, '', 'DFCSDFCDS', '', 'SDFSDS', '2018-07-11', '2018-07-10', '2018-07-02', 200, 0),
(36, 91, 'samsung', 'geagsrg', 'samsung', '3652', '45939-sam-91', '46337_sam_91', NULL, 0, 0, 1, NULL, '2018-07-18 07:50:47', '2018-07-18 06:55:52', 0, '', 'pune', 'phone', '', '2018-07-19', '2018-07-28', '2018-07-19', 500, 0),
(33, 77, 'phones', 'moto+mi', 'phone', 'phone123', '90387-pho-77', '61540_pho_77', NULL, 1, 1, 1, NULL, '2018-07-18 05:32:44', '2018-07-16 11:10:36', 0, 'phone123', 'pune', '', '123456', '2018-07-10', '2018-07-10', '2018-07-02', 25000, 0),
(34, 90, 'delta', 'hdghbd', 'delta', '4465', '62358-del-90', '29126_del_90', NULL, 0, 0, 1, NULL, '2018-07-17 07:47:01', '2018-07-17 07:47:01', 0, '', 'pune', '', 'hdgh', '2018-07-19', '2018-07-24', '2018-07-25', 50000, 0),
(35, 90, 'nokia', 'nokia', 'nokia', '95674', '21320-nok-90', '50858_nok_90', NULL, 0, 0, 1, NULL, '2018-07-18 05:47:08', '2018-07-17 09:18:51', 0, '', 'swaragte', 'phone', '', '2018-07-18', '2018-07-19', '2018-07-20', 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_machine_images`
--

CREATE TABLE `tbl_machine_images` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_machine_images`
--

INSERT INTO `tbl_machine_images` (`id`, `machine_id`, `title`, `description`, `url`, `is_active`, `deleted_at`, `modified_at`, `created_at`) VALUES
(65, 33, 'Protokoll30.pdf', 'Hydrangeas5.jpg', 'IMG_20170719_131846.jpg', NULL, NULL, '2018-07-16 11:22:23', '2018-07-16 11:10:36'),
(63, 31, NULL, NULL, NULL, NULL, NULL, '2018-07-11 07:56:26', '2018-07-11 07:56:26'),
(64, 32, 'Protokoll29.pdf', 'Tulips2.jpg', 'Chrysanthemum7.jpg', NULL, NULL, '2018-07-12 10:47:45', '2018-07-12 10:47:45'),
(62, 30, 'Protokoll28.pdf', 'desktop-year-of-the-tiger-images-wallpaper8.jpg', 'pr2.png', NULL, NULL, '2018-07-11 06:10:32', '2018-07-11 06:10:32'),
(61, 29, NULL, NULL, NULL, NULL, NULL, '2018-07-11 06:04:04', '2018-07-11 06:04:04'),
(60, 28, NULL, NULL, NULL, NULL, NULL, '2018-07-11 05:51:54', '2018-07-11 05:51:54'),
(59, 27, 'Protokoll27.pdf', 'Penguins12.jpg', 'Lighthouse11.jpg', NULL, NULL, '2018-07-10 10:31:12', '2018-07-10 10:31:12'),
(58, 26, 'Protokoll26.pdf', 'Chrysanthemum6.jpg', 'Koala4.jpg', NULL, NULL, '2018-07-10 06:50:46', '2018-07-10 06:50:46'),
(57, 25, NULL, NULL, NULL, NULL, NULL, '2018-07-10 06:33:50', '2018-07-10 06:33:50'),
(56, 24, NULL, 'Hydrangeas11.jpg', 'Chrysanthemum5.jpg', NULL, NULL, '2018-07-09 08:05:27', '2018-07-09 08:05:27'),
(55, 23, NULL, 'pr1.png', 'desktop-year-of-the-tiger-images-wallpaper7.jpg', NULL, NULL, '2018-07-09 08:00:58', '2018-07-09 08:00:58'),
(54, 22, 'Protokoll25.pdf', 'cond.png', 'desktop-year-of-the-tiger-images-wallpaper6.jpg', NULL, NULL, '2018-07-09 07:54:26', '2018-07-09 07:54:26'),
(53, 21, NULL, 'desktop-year-of-the-tiger-images-wallpaper5.jpg', 'pr.png', NULL, NULL, '2018-07-09 07:49:36', '2018-07-09 07:49:36'),
(52, 20, 'Protokoll24.pdf', 'Hydrangeas10.jpg', 'Desert18.jpg', NULL, NULL, '2018-06-23 10:08:51', '2018-06-23 10:08:51'),
(51, 19, 'Protokoll23.pdf', 'Penguins11.jpg', 'Lighthouse10.jpg', NULL, NULL, '2018-05-29 11:49:52', '2018-05-29 11:49:52'),
(50, 18, 'Protokoll22.pdf', 'Hydrangeas9.jpg', 'Desert17.jpg', NULL, NULL, '2018-05-29 11:46:37', '2018-05-29 11:46:37'),
(48, 16, NULL, NULL, NULL, NULL, NULL, '2018-05-28 12:42:13', '2018-05-28 12:42:13'),
(49, 17, 'Protokoll21.pdf', 'Lighthouse9.jpg', 'desktop-year-of-the-tiger-images-wallpaper4.jpg', NULL, NULL, '2018-05-29 10:37:06', '2018-05-29 10:37:06'),
(47, 15, 'Thesis-jlaanstra-final.pdf', NULL, 'amsterdam-1089645_1280.jpg', NULL, NULL, '2018-05-26 07:11:30', '2018-05-26 07:11:30'),
(33, 1, 'Protokoll10.pdf', 'Desert12.jpg', 'Chrysanthemum3.jpg', NULL, NULL, '2018-04-14 06:40:54', '2018-04-14 06:40:54'),
(34, 2, 'Protokoll11.pdf', 'Jellyfish4.jpg', 'Penguins6.jpg', NULL, NULL, '2018-04-14 06:42:57', '2018-04-14 06:42:57'),
(35, 3, 'Protokoll12.pdf', 'Lighthouse6.jpg', 'Koala3.jpg', NULL, NULL, '2018-04-14 06:44:30', '2018-04-14 06:44:30'),
(36, 4, 'Protokoll13.pdf', 'Jellyfish5.jpg', 'Penguins7.jpg', NULL, NULL, '2018-04-19 06:12:17', '2018-04-19 06:12:17'),
(37, 5, NULL, 'Hydrangeas5.jpg', 'Desert13.jpg', NULL, NULL, '2018-04-24 12:13:37', '2018-04-24 12:13:37'),
(38, 6, '881031195966806.pdf', 'Hydrangeas5.jpg', 'parties.png', NULL, NULL, '2018-07-16 11:21:15', '2018-05-21 06:47:46'),
(39, 7, 'Protokoll14.pdf', 'Desert14.jpg', 'Chrysanthemum4.jpg', NULL, NULL, '2018-05-21 06:51:00', '2018-05-21 06:51:00'),
(40, 8, 'Resume_Sangappa_mallad.pdf', 'neigh_new.jpg', '156292-Alberobello.jpg', NULL, NULL, '2018-05-22 06:25:34', '2018-05-22 06:25:34'),
(68, 36, 'license.pdf', NULL, 'Main1.jpg', NULL, NULL, '2018-07-18 06:55:52', '2018-07-18 06:55:52'),
(66, 34, '8810311959668061.pdf', 'Main3.JPG', 'Main2.jpg', NULL, NULL, '2018-07-17 07:47:01', '2018-07-17 07:47:01'),
(67, 35, '881031194453104.pdf', 'Main4.jpg', 'Main5.png', NULL, NULL, '2018-07-17 09:18:51', '2018-07-17 09:18:51'),
(46, 14, 'Protokoll20.pdf', 'Penguins10.jpg', 'Desert16.jpg', NULL, NULL, '2018-05-24 08:15:08', '2018-05-24 08:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_role` tinyint(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `act_key` varchar(50) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `isdeleted` tinyint(1) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `company_id`, `user_role`, `email`, `password`, `first_name`, `last_name`, `address`, `phone`, `act_key`, `verified`, `last_login`, `is_active`, `isdeleted`, `deleted_at`, `modified_at`, `created_at`) VALUES
(1, NULL, 1, 'admin@sa4i.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hemant', 'Jaiswal', 'Indore, MP', '9876543210', NULL, 0, '2018-07-18 06:46:55', 1, 0, NULL, '2018-07-18 06:46:55', '2017-10-14 12:27:13'),
(78, 77, 4, 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', 'mumbai', '9823987634', NULL, 1, NULL, 1, 1, NULL, '2018-06-26 05:26:10', '2018-05-29 11:47:54'),
(16, NULL, 3, 'monika123@gmail.com', '1c87bbc172766a47dcaf1cd92a679fc6', 'Monika', NULL, 'pune', '547457457', NULL, 1, '2018-05-29 11:23:54', 1, 1, NULL, '2018-06-25 12:26:43', '2018-02-24 06:23:24'),
(85, 77, 4, 'sabine@sa4i.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sabine', 'Schreiber', 'xxxx', '+4912', NULL, 1, NULL, 1, 0, NULL, '2018-07-09 05:46:44', '2018-07-09 05:46:44'),
(70, NULL, 3, 'mail@robertelbl.de', 'f4cc399f0effd13c888e310ea2cf5399', NULL, NULL, 'test', '4915159889898', NULL, 1, '2018-06-04 08:10:06', 1, 1, NULL, '2018-07-09 05:41:32', '2018-03-31 13:27:13'),
(69, NULL, 3, 'k@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', NULL, NULL, 'pune', '1234564321', NULL, 1, NULL, 0, 1, NULL, '2018-07-09 05:41:21', '2018-03-31 10:31:10'),
(77, NULL, 3, 'testdemo@gmail.com', '3228a40bcb748bdd8943c5ecbee706af', NULL, NULL, 'pune', '9823987634', NULL, 1, '2018-07-18 08:19:05', 1, 1, NULL, '2018-07-18 08:19:05', '2018-05-29 11:44:52'),
(84, 77, 4, 'sina@sa4i.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sina', 'Elbl', 'xxxx', '+491234', NULL, 1, NULL, 1, 0, NULL, '2018-07-09 05:46:07', '2018-07-09 05:46:07'),
(76, 16, 4, 'mona123@gmail.com', '72df8e56a8307e2c308808841fcfb3c3', 'mona', 'Kumari', 'pune', '78796785671', NULL, 1, NULL, 1, 0, NULL, '2018-06-04 09:40:32', '2018-05-24 06:24:11'),
(80, NULL, 3, 'demo@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', NULL, NULL, 'pune', '9823987634', NULL, 1, '2018-06-22 09:04:39', 1, 1, NULL, '2018-07-09 05:43:37', '2018-06-04 09:39:29'),
(81, NULL, 3, 'zzzzz@sa4i.com', '95ebc3c7b3b9f1d2c40fec14415d3cb8', NULL, NULL, 'zzzzzz', '9823987634', NULL, 1, '2018-06-22 09:06:07', 1, 1, NULL, '2018-06-25 12:53:38', '2018-06-04 09:42:00'),
(82, 77, 4, 'mail@ccki.de', 'e10adc3949ba59abbe56e057f20f883e', 'Robert', 'Elbl', 'xx', '+4915159889898', NULL, 1, NULL, 1, 1, NULL, '2018-07-09 05:40:21', '2018-06-22 09:05:30'),
(83, 77, 4, 'leo@gmail.com', '0f759dd1ea6c4c76cedc299039ca4f23', 'leo', 'infotech', 'mumbai', '9834567898', NULL, 1, NULL, 1, 1, NULL, '2018-07-09 05:40:26', '2018-06-25 05:54:13'),
(86, NULL, 3, 'mail1@ccki.de', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'xxx', '12344', NULL, 1, '2018-07-17 07:48:37', 1, 0, NULL, '2018-07-17 07:48:37', '2018-07-09 06:36:28'),
(87, NULL, 3, 'mail2@ccki.de', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'xxx', '4915159889898', NULL, 1, NULL, 1, 0, NULL, '2018-07-09 06:46:11', '2018-07-09 06:46:11'),
(88, NULL, 3, 'mail3@ccki.de', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 'xxx', '4915159889898', NULL, 1, NULL, 1, 0, NULL, '2018-07-09 06:47:34', '2018-07-09 06:47:34'),
(89, 86, 4, 'sina1@sa4i.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sina', 'Schreiber', 'xxx', '49', NULL, 1, NULL, 1, 0, NULL, '2018-07-10 06:29:31', '2018-07-10 06:29:31'),
(90, NULL, 3, 'masterdata@gmail.com', '5e27a16d2cb666c444cde88504da8699', NULL, NULL, 'mumbai', '149265', NULL, 1, '2018-07-18 06:45:31', 1, 1, NULL, '2018-07-18 06:45:31', '2018-07-17 07:39:43'),
(91, NULL, 3, 'abc@sa4i.com', '900150983cd24fb0d6963f7d28e17f72', NULL, NULL, 'pune', '9887462', NULL, 1, '2018-07-18 08:18:58', 1, 0, NULL, '2018-07-18 08:18:58', '2018-07-18 06:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` tinyint(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `name`, `role`) VALUES
(1, 'Administrator', 1),
(2, 'Staff', 2),
(3, 'Company', 3),
(4, 'Worker', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guest_user`
--
ALTER TABLE `tbl_guest_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_machines`
--
ALTER TABLE `tbl_machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_machine_images`
--
ALTER TABLE `tbl_machine_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_guest_user`
--
ALTER TABLE `tbl_guest_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_machines`
--
ALTER TABLE `tbl_machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_machine_images`
--
ALTER TABLE `tbl_machine_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
