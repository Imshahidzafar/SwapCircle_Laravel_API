-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2023 at 06:01 AM
-- Server version: 10.5.20-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swapfmue_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_list`
--

CREATE TABLE `chat_list` (
  `chat_list_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date_request` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat_list`
--

INSERT INTO `chat_list` (`chat_list_id`, `sender_id`, `receiver_id`, `date_request`, `created_at`) VALUES
(1, 18, 14, '2023-04-14', '2023-04-14 16:19:34'),
(2, 14, 46, '2023-04-18', '2023-04-18 16:05:44'),
(3, 2, 1, '2023-04-27', '2023-04-27 14:18:35'),
(4, 14, 36, '2023-05-01', '2023-05-01 16:30:28'),
(5, 14, 32, '2023-05-01', '2023-05-01 16:30:45'),
(6, 14, 33, '2023-05-01', '2023-05-01 16:50:50'),
(7, 14, 34, '2023-05-01', '2023-05-01 17:04:02'),
(8, 14, 38, '2023-05-03', '2023-05-03 12:09:11'),
(9, 14, 39, '2023-05-03', '2023-05-03 15:52:17'),
(10, 14, 50, '2023-05-03', '2023-05-03 16:24:30'),
(11, 14, 14, '2023-05-03', '2023-05-03 16:26:10'),
(12, 18, 1, '2023-05-03', '2023-05-03 16:27:16'),
(13, 52, 53, '2023-05-04', '2023-05-04 15:42:53'),
(14, 52, 53, '2023-05-04', '2023-05-04 15:42:53'),
(15, 14, 37, '2023-05-11', '2023-05-11 11:37:32'),
(16, 11, 2, '2023-07-11', '2023-07-11 17:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `chat_list_live`
--

CREATE TABLE `chat_list_live` (
  `chat_list_live_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date_request` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat_list_live`
--

INSERT INTO `chat_list_live` (`chat_list_live_id`, `sender_id`, `receiver_id`, `date_request`, `created_at`) VALUES
(1, 2, 1, '2023-03-09', '2023-03-09 12:49:58'),
(2, 12, 1, '2023-03-09', '2023-03-09 15:50:48'),
(3, 18, 14, '2023-04-03', '2023-04-03 15:39:18'),
(4, 18, 6, '2023-04-03', '2023-04-03 15:40:08'),
(5, 18, 47, '2023-04-03', '2023-04-03 15:45:16'),
(6, 14, 1, '2023-04-07', '2023-04-07 14:37:14'),
(7, 14, 16, '2023-04-13', '2023-04-13 15:47:43'),
(8, 14, 46, '2023-04-13', '2023-04-13 15:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `chat_message_id` int(11) NOT NULL,
  `sender_type` enum('Users','Companies') NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message_type` enum('text','attachment','location') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `send_date` datetime NOT NULL,
  `send_time` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `read_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('Read','Unread') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`chat_message_id`, `sender_type`, `sender_id`, `receiver_id`, `message`, `message_type`, `send_date`, `send_time`, `read_date`, `created_at`, `status`) VALUES
(1, 'Users', 1, 1, '\"HI\"', 'text', '2023-04-27 00:00:00', '11:21:08', NULL, '2023-04-27 11:21:08', 'Read'),
(2, 'Users', 18, 14, '\"ddsadsadsad\"', 'text', '2023-04-27 00:00:00', '11:22:14', NULL, '2023-04-27 11:22:14', 'Read'),
(3, 'Users', 18, 14, '\"dddddd\"', 'text', '2023-04-27 00:00:00', '11:22:20', NULL, '2023-04-27 11:22:20', 'Read'),
(4, 'Users', 14, 18, '\"hellow\"', 'text', '2023-04-27 00:00:00', '12:53:28', NULL, '2023-04-27 12:53:28', 'Read'),
(5, 'Users', 14, 46, '\"jjshshs\"', 'text', '2023-04-27 00:00:00', '13:09:34', NULL, '2023-04-27 13:09:34', 'Read'),
(6, 'Users', 14, 46, '\"hellow\"', 'text', '2023-04-27 00:00:00', '13:10:22', NULL, '2023-04-27 13:10:22', 'Read'),
(7, 'Users', 14, 18, '\"tttytytyyty\"', 'text', '2023-04-27 00:00:00', '13:28:33', NULL, '2023-04-27 13:28:33', 'Read'),
(8, 'Users', 14, 18, '\"hellow\"', 'text', '2023-04-27 00:00:00', '13:55:30', NULL, '2023-04-27 13:55:30', 'Read'),
(9, 'Users', 14, 18, '\"hi\"', 'text', '2023-04-27 00:00:00', '13:55:56', NULL, '2023-04-27 13:55:56', 'Read'),
(10, 'Users', 14, 18, '\"hiiiii\"', 'text', '2023-04-27 00:00:00', '13:56:05', NULL, '2023-04-27 13:56:05', 'Read'),
(11, 'Users', 18, 14, '\"hiiii\"', 'text', '2023-04-27 00:00:00', '13:56:49', NULL, '2023-04-27 13:56:49', 'Read'),
(12, 'Users', 18, 14, '\"hgjhghjgewgegwjdgjhs\"', 'text', '2023-04-27 00:00:00', '13:57:03', NULL, '2023-04-27 13:57:03', 'Read'),
(13, 'Users', 18, 14, '\"dasdasd\"', 'text', '2023-04-27 00:00:00', '13:58:37', NULL, '2023-04-27 13:58:37', 'Read'),
(14, 'Users', 14, 18, '\"xgcchjhcj\"', 'text', '2023-04-27 00:00:00', '13:59:38', NULL, '2023-04-27 13:59:38', 'Read'),
(15, 'Users', 14, 18, '\"jordan\"', 'text', '2023-04-27 00:00:00', '14:03:40', NULL, '2023-04-27 14:03:40', 'Read'),
(16, 'Users', 18, 14, '\"jkjkjjyyyffdfdgfsdfdarefdareafred\"', 'text', '2023-04-27 00:00:00', '14:04:21', NULL, '2023-04-27 14:04:21', 'Read'),
(17, 'Users', 14, 18, '\"hi man\"', 'text', '2023-04-27 00:00:00', '14:11:46', NULL, '2023-04-27 14:11:46', 'Read'),
(18, 'Users', 18, 14, '\"heelo bro\"', 'text', '2023-04-27 00:00:00', '14:12:03', NULL, '2023-04-27 14:12:03', 'Read'),
(19, 'Users', 14, 46, '\"AOA\"', 'text', '2023-04-28 00:00:00', '09:30:21', NULL, '2023-04-28 09:30:21', 'Read'),
(20, 'Users', 14, 46, '\"HI\"', 'text', '2023-04-29 00:00:00', '19:15:11', NULL, '2023-04-29 19:15:11', 'Read'),
(21, 'Users', 14, 46, '\"Hy\"', 'text', '2023-04-29 00:00:00', '20:52:26', NULL, '2023-04-29 20:52:26', 'Read'),
(22, 'Users', 14, 46, '\"AOA\"', 'text', '2023-04-29 00:00:00', '20:57:49', NULL, '2023-04-29 20:57:49', 'Read'),
(23, 'Users', 14, 46, '\"Assalam-O-Alaikum\"', 'text', '2023-04-29 00:00:00', '21:08:07', NULL, '2023-04-29 21:08:07', 'Read'),
(24, 'Users', 14, 46, '[]', 'text', '2023-04-29 00:00:00', '21:36:34', NULL, '2023-04-29 21:36:34', 'Read'),
(25, 'Users', 14, 16, '\"Hi\"', 'text', '2023-04-29 00:00:00', '22:45:24', NULL, '2023-04-29 22:45:24', 'Unread'),
(26, 'Users', 14, 16, '\"Hi\"', 'text', '2023-04-29 00:00:00', '22:46:51', NULL, '2023-04-29 22:46:51', 'Unread'),
(27, 'Users', 14, 16, '\"Hi\"', 'text', '2023-04-29 00:00:00', '22:50:55', NULL, '2023-04-29 22:50:55', 'Unread'),
(28, 'Users', 14, 16, '\"Hi\"', 'text', '2023-05-01 00:00:00', '16:33:48', NULL, '2023-05-01 16:33:48', 'Unread'),
(29, 'Users', 14, 16, '\"Hi\"', 'text', '2023-05-01 00:00:00', '16:35:03', NULL, '2023-05-01 16:35:03', 'Unread'),
(30, 'Users', 14, 29, '\"Hi\"', 'text', '2023-05-01 00:00:00', '16:38:33', NULL, '2023-05-01 16:38:33', 'Unread'),
(31, 'Users', 14, 32, '[]', 'text', '2023-05-01 00:00:00', '16:39:31', NULL, '2023-05-01 16:39:31', 'Unread'),
(32, 'Users', 14, 32, '\"Hi Ahmad\"', 'text', '2023-05-01 00:00:00', '16:44:21', NULL, '2023-05-01 16:44:21', 'Unread'),
(33, 'Users', 1, 1, '\"HI\"', 'text', '2023-05-03 00:00:00', '10:01:30', NULL, '2023-05-03 10:01:30', 'Read'),
(34, 'Users', 14, 46, '\"HI\"', 'text', '2023-05-03 00:00:00', '14:45:07', NULL, '2023-05-03 14:45:07', 'Read'),
(35, 'Users', 14, 46, '\"Hy\"', 'text', '2023-05-03 00:00:00', '14:45:25', NULL, '2023-05-03 14:45:25', 'Read'),
(36, 'Users', 14, 46, '\"AOA ?\"', 'text', '2023-05-03 00:00:00', '14:53:22', NULL, '2023-05-03 14:53:22', 'Read'),
(37, 'Users', 14, 46, '\"Hy\"', 'text', '2023-05-03 00:00:00', '14:57:04', NULL, '2023-05-03 14:57:04', 'Read'),
(38, 'Users', 46, 14, '\"yes\"', 'text', '2023-05-03 00:00:00', '14:57:55', NULL, '2023-05-03 14:57:55', 'Read'),
(39, 'Users', 14, 38, '\"bsbshsb\"', 'text', '2023-05-03 00:00:00', '15:11:38', NULL, '2023-05-03 15:11:38', 'Unread'),
(40, 'Users', 46, 14, '\"Hy\"', 'text', '2023-05-03 00:00:00', '15:46:56', NULL, '2023-05-03 15:46:56', 'Read'),
(41, 'Users', 46, 14, '\"Ahmad here\"', 'text', '2023-05-03 00:00:00', '15:48:11', NULL, '2023-05-03 15:48:11', 'Read'),
(42, 'Users', 14, 46, '\"Okay\"', 'text', '2023-05-03 00:00:00', '15:49:12', NULL, '2023-05-03 15:49:12', 'Read'),
(43, 'Users', 18, 14, '\"helllow\"', 'text', '2023-05-03 00:00:00', '16:27:39', NULL, '2023-05-03 16:27:39', 'Read'),
(44, 'Users', 18, 14, '\"hi\"', 'text', '2023-05-03 00:00:00', '16:27:45', NULL, '2023-05-03 16:27:45', 'Read'),
(45, 'Users', 14, 46, '\"ssss\"', 'text', '2023-05-03 00:00:00', '16:29:05', NULL, '2023-05-03 16:29:05', 'Read'),
(46, 'Users', 18, 14, '\"heynajam\"', 'text', '2023-05-03 00:00:00', '16:38:03', NULL, '2023-05-03 16:38:03', 'Read'),
(47, 'Users', 14, 46, '\"Hy\"', 'text', '2023-05-04 00:00:00', '10:07:24', NULL, '2023-05-04 10:07:24', 'Read'),
(48, 'Users', 46, 14, '\"Hi\"', 'text', '2023-05-04 00:00:00', '10:08:36', NULL, '2023-05-04 10:08:36', 'Read'),
(49, 'Users', 14, 46, '\"AOA\"', 'text', '2023-05-04 00:00:00', '10:36:44', NULL, '2023-05-04 10:36:44', 'Read'),
(50, 'Users', 14, 46, '\"???\"', 'text', '2023-05-04 00:00:00', '10:47:35', NULL, '2023-05-04 10:47:35', 'Read'),
(51, 'Users', 14, 46, '\"???\"', 'text', '2023-05-04 00:00:00', '10:47:39', NULL, '2023-05-04 10:47:39', 'Read'),
(52, 'Users', 46, 14, '\"Yes\"', 'text', '2023-05-04 00:00:00', '10:50:26', NULL, '2023-05-04 10:50:26', 'Read'),
(53, 'Users', 14, 36, '\"??\"', 'text', '2023-05-04 00:00:00', '11:29:46', NULL, '2023-05-04 11:29:46', 'Unread'),
(54, 'Users', 18, 14, '\"hellowvsvsvsvs\"', 'text', '2023-05-04 00:00:00', '13:07:10', NULL, '2023-05-04 13:07:10', 'Read'),
(55, 'Users', 52, 53, '\"heyyy\"', 'text', '2023-05-04 00:00:00', '15:43:22', NULL, '2023-05-04 15:43:22', 'Read'),
(56, 'Users', 14, 33, '\"???\"', 'text', '2023-05-04 00:00:00', '15:44:08', NULL, '2023-05-04 15:44:08', 'Unread'),
(57, 'Users', 14, 18, '\"gjhgjhgjh\"', 'text', '2023-05-05 00:00:00', '18:16:59', NULL, '2023-05-05 18:16:59', 'Read'),
(58, 'Users', 14, 18, '\"jghgjhgjh\"', 'text', '2023-05-05 00:00:00', '18:17:06', NULL, '2023-05-05 18:17:06', 'Read'),
(59, 'Users', 14, 18, '\"dsfsdfdsfds\"', 'text', '2023-05-06 00:00:00', '09:45:45', NULL, '2023-05-06 09:45:45', 'Read'),
(60, 'Users', 14, 18, '\"dsfsdfsdf\"', 'text', '2023-05-06 00:00:00', '09:45:51', NULL, '2023-05-06 09:45:51', 'Read'),
(61, 'Users', 14, 18, '\"dsaddasd\"', 'text', '2023-05-06 00:00:00', '10:35:26', NULL, '2023-05-06 10:35:26', 'Read'),
(62, 'Users', 14, 18, '\"ddddddddddd\"', 'text', '2023-05-06 00:00:00', '10:35:43', NULL, '2023-05-06 10:35:43', 'Read'),
(63, 'Users', 14, 18, '\"12324123123eqqwewqe\"', 'text', '2023-05-06 00:00:00', '10:36:54', NULL, '2023-05-06 10:36:54', 'Read'),
(64, 'Users', 14, 18, '\"ddddddaaaaqqqqqqwwwwweeeeww\"', 'text', '2023-05-06 00:00:00', '11:20:26', NULL, '2023-05-06 11:20:26', 'Read'),
(65, 'Users', 14, 36, '\"xxxxx\"', 'text', '2023-05-06 00:00:00', '11:20:56', NULL, '2023-05-06 11:20:56', 'Unread'),
(66, 'Users', 14, 36, '\"HI uuuttttt\"', 'text', '2023-05-06 00:00:00', '11:23:06', NULL, '2023-05-06 11:23:06', 'Unread'),
(67, 'Users', 14, 18, '\"dsada ki gakdynsdhdhadsjdbhahdjkkjas\"', 'text', '2023-05-06 00:00:00', '11:37:11', NULL, '2023-05-06 11:37:11', 'Read'),
(68, 'Users', 18, 1, '\"fsdfsdfsdf\"', 'text', '2023-05-06 00:00:00', '11:48:15', NULL, '2023-05-06 11:48:15', 'Unread'),
(69, 'Users', 46, 14, '\"HI\"', 'text', '2023-05-06 00:00:00', '13:08:33', NULL, '2023-05-06 13:08:33', 'Read'),
(70, 'Users', 52, 53, '\"hey\"', 'text', '2023-05-08 00:00:00', '11:03:07', NULL, '2023-05-08 11:03:07', 'Read'),
(71, 'Users', 52, 53, '\"whatsappp\"', 'text', '2023-05-08 00:00:00', '11:03:21', NULL, '2023-05-08 11:03:21', 'Read'),
(72, 'Users', 46, 14, '\"HI\"', 'text', '2023-05-11 00:00:00', '12:33:56', NULL, '2023-05-11 12:33:56', 'Read'),
(73, 'Users', 46, 14, '\"Hy\"', 'text', '2023-05-11 00:00:00', '12:35:48', NULL, '2023-05-11 12:35:48', 'Read'),
(74, 'Users', 1, 14, '\"Hy\"', 'text', '2023-05-11 00:00:00', '15:10:54', NULL, '2023-05-11 15:10:54', 'Unread'),
(75, 'Users', 22, 14, '\"Hy\"', 'text', '2023-05-11 00:00:00', '15:11:12', NULL, '2023-05-11 15:11:12', 'Unread'),
(76, 'Users', 22, 14, '\"Hy\"', 'text', '2023-05-11 00:00:00', '15:22:08', NULL, '2023-05-11 15:22:08', 'Unread'),
(77, 'Users', 14, 46, '\"???\"', 'text', '2023-05-12 00:00:00', '11:09:53', NULL, '2023-05-12 11:09:53', 'Read'),
(78, 'Users', 14, 46, '\"AOA\"', 'text', '2023-05-12 00:00:00', '11:11:37', NULL, '2023-05-12 11:11:37', 'Read'),
(79, 'Users', 18, 14, '\"hiiiii\"', 'text', '2023-05-18 00:00:00', '10:24:47', NULL, '2023-05-18 10:24:47', 'Read'),
(80, 'Users', 18, 14, '\"how r u\"', 'text', '2023-05-18 00:00:00', '10:24:58', NULL, '2023-05-18 10:24:58', 'Read'),
(81, 'Users', 14, 18, '\"hzhshshshs\"', 'text', '2023-05-18 00:00:00', '10:25:08', NULL, '2023-05-18 10:25:08', 'Read'),
(82, 'Users', 14, 18, '\"hey\"', 'text', '2023-05-18 00:00:00', '11:28:54', NULL, '2023-05-18 11:28:54', 'Read'),
(83, 'Users', 14, 18, '\"hshshshshshshshshxbshhxhshzbshzbbz\"', 'text', '2023-05-18 00:00:00', '11:35:06', NULL, '2023-05-18 11:35:06', 'Read'),
(84, 'Users', 14, 18, '\"hahahahaha\"', 'text', '2023-05-18 00:00:00', '11:37:31', NULL, '2023-05-18 11:37:31', 'Read'),
(85, 'Users', 18, 14, '\"ghjhgjhgjhgjhgjhgjhghj7867678\"', 'text', '2023-05-18 00:00:00', '11:38:28', NULL, '2023-05-18 11:38:28', 'Read'),
(86, 'Users', 18, 14, '\"123333\"', 'text', '2023-05-18 00:00:00', '11:40:00', NULL, '2023-05-18 11:40:00', 'Read'),
(87, 'Users', 14, 18, '\"bzbBbzhbaab\"', 'text', '2023-05-18 00:00:00', '11:41:18', NULL, '2023-05-18 11:41:18', 'Read'),
(88, 'Users', 14, 18, '\"hVVBVVV\"', 'text', '2023-05-18 00:00:00', '11:41:25', NULL, '2023-05-18 11:41:25', 'Read'),
(89, 'Users', 14, 18, '\"hVVBVVV\"', 'text', '2023-05-18 00:00:00', '11:41:25', NULL, '2023-05-18 11:41:25', 'Read'),
(90, 'Users', 14, 18, '\"by bbb\"', 'text', '2023-05-18 00:00:00', '11:41:33', NULL, '2023-05-18 11:41:33', 'Read'),
(91, 'Users', 18, 14, '\"ddsassadasd\"', 'text', '2023-05-18 00:00:00', '11:52:17', NULL, '2023-05-18 11:52:17', 'Read'),
(92, 'Users', 14, 18, '\"cjcjcjcjcj j nchxhxhxjchzzjxh\"', 'text', '2023-05-18 00:00:00', '11:54:03', NULL, '2023-05-18 11:54:03', 'Read'),
(93, 'Users', 18, 14, '\"ty\"', 'text', '2023-05-18 00:00:00', '11:54:53', NULL, '2023-05-18 11:54:53', 'Read'),
(94, 'Users', 1, 1, '\"HI\"', 'text', '2023-05-18 00:00:00', '12:19:44', NULL, '2023-05-18 12:19:44', 'Read'),
(95, 'Users', 14, 18, '\"HI\"', 'text', '2023-05-18 00:00:00', '12:19:58', NULL, '2023-05-18 12:19:58', 'Read'),
(96, 'Users', 18, 14, '\"ghjghjgjh\"', 'text', '2023-05-18 00:00:00', '12:35:14', NULL, '2023-05-18 12:35:14', 'Read'),
(97, 'Users', 14, 18, '\"hellow Ali musali\"', 'text', '2023-05-18 00:00:00', '12:35:53', NULL, '2023-05-18 12:35:53', 'Read'),
(98, 'Users', 14, 18, '\"hahahahaha \\ud83e\\udd23\"', 'text', '2023-05-18 00:00:00', '13:53:24', NULL, '2023-05-18 13:53:24', 'Read'),
(99, 'Users', 14, 18, '\"hhhhhggghghghgh\"', 'text', '2023-05-18 00:00:00', '14:06:45', NULL, '2023-05-18 14:06:45', 'Read'),
(100, 'Users', 14, 18, '\"kjhjhkjhkjhjkhkjhkjhkjh\"', 'text', '2023-05-18 00:00:00', '14:07:16', NULL, '2023-05-18 14:07:16', 'Read'),
(101, 'Users', 18, 14, '\"i know u\"', 'text', '2023-05-18 00:00:00', '14:08:41', NULL, '2023-05-18 14:08:41', 'Read'),
(102, 'Users', 18, 14, '\"hiii\"', 'text', '2023-05-20 00:00:00', '11:59:25', NULL, '2023-05-20 11:59:25', 'Read'),
(103, 'Users', 18, 14, '\"heyyy\"', 'text', '2023-05-23 00:00:00', '14:33:05', NULL, '2023-05-23 14:33:05', 'Read'),
(104, 'Users', 14, 18, '\"Yes\"', 'text', '2023-05-23 00:00:00', '14:34:48', NULL, '2023-05-23 14:34:48', 'Read'),
(105, 'Users', 14, 46, '\"???\"', 'text', '2023-05-23 00:00:00', '16:35:44', NULL, '2023-05-23 16:35:44', 'Read'),
(106, 'Users', 46, 14, '\"Yes\"', 'text', '2023-05-23 00:00:00', '17:04:46', NULL, '2023-05-23 17:04:46', 'Read'),
(107, 'Users', 14, 46, '\"???\"', 'text', '2023-05-23 00:00:00', '17:07:40', NULL, '2023-05-23 17:07:40', 'Read'),
(108, 'Users', 46, 14, '\"AOA\"', 'text', '2023-05-23 00:00:00', '17:12:04', NULL, '2023-05-23 17:12:04', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages_live`
--

CREATE TABLE `chat_messages_live` (
  `chat_messages_live_id` int(11) NOT NULL,
  `sender_type` enum('Users','Admin') NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message_type` enum('text','attachment','location') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `send_date` datetime NOT NULL,
  `send_time` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `read_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('Read','Unread') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat_messages_live`
--

INSERT INTO `chat_messages_live` (`chat_messages_live_id`, `sender_type`, `sender_id`, `receiver_id`, `message`, `message_type`, `send_date`, `send_time`, `read_date`, `created_at`, `status`) VALUES
(1, 'Users', 1, 1, '\"HI\"', 'text', '2023-03-09 00:00:00', '12:50:18', NULL, '2023-03-09 12:50:18', 'Unread'),
(2, 'Users', 12, 1, '\"HI\"', 'text', '2023-03-09 00:00:00', '15:30:38', NULL, '2023-03-09 15:30:38', 'Unread'),
(3, 'Users', 1, 1, '\"HI man\"', 'text', '2023-03-09 00:00:00', '15:37:43', NULL, '2023-03-09 15:37:43', 'Unread'),
(4, 'Users', 12, 1, '\"HI man\"', 'text', '2023-03-09 00:00:00', '15:38:36', NULL, '2023-03-09 15:38:36', 'Unread'),
(5, 'Users', 12, 1, '\"HI man how are you\"', 'text', '2023-03-09 00:00:00', '15:38:47', NULL, '2023-03-09 15:38:47', 'Unread'),
(6, 'Users', 12, 1, '\"ddddddddddsadsa\"', 'text', '2023-03-09 00:00:00', '16:46:12', NULL, '2023-03-09 16:46:12', 'Unread'),
(7, 'Users', 12, 1, '\"dsadsadsadsad\"', 'text', '2023-03-09 00:00:00', '16:46:43', NULL, '2023-03-09 16:46:43', 'Unread'),
(8, 'Users', 12, 1, '\"dddd\"', 'text', '2023-03-09 00:00:00', '16:47:27', NULL, '2023-03-09 16:47:27', 'Unread'),
(9, 'Users', 12, 1, '\"HI man how are you 1234\"', 'text', '2023-03-09 00:00:00', '16:50:55', NULL, '2023-03-09 16:50:55', 'Unread'),
(10, 'Users', 18, 14, '\"hiii\"', 'text', '2023-04-03 00:00:00', '12:10:41', NULL, '2023-04-03 12:10:41', 'Read'),
(11, 'Users', 18, 14, '\"hiiii\"', 'text', '2023-04-03 00:00:00', '12:12:09', NULL, '2023-04-03 12:12:09', 'Read'),
(12, 'Users', 18, 14, '\"hey man\"', 'text', '2023-04-03 00:00:00', '12:13:56', NULL, '2023-04-03 12:13:56', 'Read'),
(13, 'Users', 18, 14, '\"hhhhhhhh\"', 'text', '2023-04-03 00:00:00', '12:16:36', NULL, '2023-04-03 12:16:36', 'Read'),
(14, 'Users', 18, 14, '\"hellow\"', 'text', '2023-04-03 00:00:00', '15:41:14', NULL, '2023-04-03 15:41:14', 'Read'),
(15, 'Users', 18, 14, '\"HI\"', 'text', '2023-04-03 00:00:00', '15:43:30', NULL, '2023-04-03 15:43:30', 'Read'),
(16, 'Users', 18, 14, '\"HIiiii\"', 'text', '2023-04-03 00:00:00', '15:43:37', NULL, '2023-04-03 15:43:37', 'Read'),
(17, 'Users', 18, 47, '\"dasdsad\"', 'text', '2023-04-03 00:00:00', '15:45:23', NULL, '2023-04-03 15:45:23', 'Unread'),
(18, 'Users', 18, 47, '\"dsadddddd\"', 'text', '2023-04-03 00:00:00', '15:45:26', NULL, '2023-04-03 15:45:26', 'Unread'),
(19, 'Users', 14, 18, '\"hellow\"', 'text', '2023-04-07 00:00:00', '14:38:14', NULL, '2023-04-07 14:38:14', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `connect_articles`
--

CREATE TABLE `connect_articles` (
  `connect_articles_id` int(11) NOT NULL,
  `connect_categories_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Deleted','Pending') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `connect_articles`
--

INSERT INTO `connect_articles` (`connect_articles_id`, `connect_categories_id`, `title`, `image`, `description`, `added_date`, `status`) VALUES
(1, 4, 'test', 'uploads/connect_article/1681803210.jpeg', 'test', '2023-04-18 03:33:30', 'Active'),
(2, 4, 'travel', 'uploads/connect_article/1682571559.jpeg', 'traveltraveltravel traveltraveltravel traveltraveltravel traveltraveltraveltraveltraveltravel traveltraveltraveltraveltraveltraveltraveltraveltraveltraveltraveltraveltraveltraveltraveltraveltraveltravel', '2023-04-18 04:37:04', 'Active'),
(3, 2, 'foodsdf', 'uploads/connect_article/1681877504.jpeg', 'food', '2023-04-19 00:11:44', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `connect_articles_favourite`
--

CREATE TABLE `connect_articles_favourite` (
  `connect_articles_favourite_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `connect_articles_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Deleted','Pending') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `connect_articles_favourite`
--

INSERT INTO `connect_articles_favourite` (`connect_articles_favourite_id`, `users_customers_id`, `connect_articles_id`, `added_date`, `status`) VALUES
(6, 14, 1, '2023-04-27 05:49:17', 'Deleted'),
(7, 14, 3, '2023-04-27 05:52:48', 'Deleted'),
(8, 18, 1, '2023-04-27 05:54:41', 'Deleted'),
(9, 14, 2, '2023-04-27 08:34:00', 'Deleted'),
(10, 46, 1, '2023-05-03 01:20:38', 'Active'),
(11, 51, 1, '2023-05-04 02:48:21', 'Deleted'),
(12, 51, 2, '2023-05-04 02:48:29', 'Deleted'),
(13, 53, 3, '2023-05-08 08:57:32', 'Active'),
(14, 53, 2, '2023-05-12 14:37:15', 'Active'),
(15, 52, 1, '2023-05-18 01:11:40', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `connect_articles_views`
--

CREATE TABLE `connect_articles_views` (
  `connect_articles_views_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `connect_articles_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Deleted') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `connect_articles_views`
--

INSERT INTO `connect_articles_views` (`connect_articles_views_id`, `users_customers_id`, `connect_articles_id`, `added_date`, `status`) VALUES
(1, 14, 2, '2023-04-19 03:04:02', 'Active'),
(2, 14, 3, '2023-05-08 02:10:18', 'Active'),
(3, 14, 1, '2023-05-08 02:10:26', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `connect_categories`
--

CREATE TABLE `connect_categories` (
  `connect_categories_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `icon` text NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Deleted','Pending') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `connect_categories`
--

INSERT INTO `connect_categories` (`connect_categories_id`, `name`, `icon`, `added_date`, `status`) VALUES
(1, 'Travel', 'uploads/connect_category_icon/1682575230.png', '2023-04-17 01:21:42', 'Active'),
(2, 'Health', 'uploads/connect_category_icon/1682575743.png', '2023-04-17 01:24:14', 'Active'),
(3, 'Food & Drink', 'uploads/connect_category_icon/1682575081.png', '2023-04-17 01:31:36', 'Active'),
(4, 'Bill Payment', 'uploads/connect_category_icon/1682571361.png', '2023-04-17 01:34:56', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faqs_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Active','Deleted','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faqs_id`, `question`, `answer`, `updated_date`, `added_date`, `status`) VALUES
(1, 'For what purpose of swapcircle use?', 'Currency exhange ghj Currency exhange ghjCurrency exhange ghjCurrency exhange ghjCurrency exhange ghjCurrency exhange ghjCurrency exhange ghjCurrency exhange ghj', NULL, '2023-03-31 03:22:30', 'Deleted'),
(2, 'For what purpose of swapcircle use?', 'Currency exhange', NULL, '2023-04-05 13:42:12', 'Active'),
(3, 'Fusce volutpat lectus et nisl consecte?', 'in varius', NULL, '2023-04-11 01:28:22', 'Inactive'),
(19, 'new FAQ', 'latest faq latest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faqlatest faq', NULL, '2023-04-27 01:01:33', 'Inactive'),
(20, 'Who Is Eligible To Apply?', 'sffasfasfasfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', NULL, '2023-04-27 02:29:17', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbacks_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Active','Deleted') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbacks_id`, `users_customers_id`, `name`, `email`, `subject`, `added_date`, `status`) VALUES
(1, 2, 'ali', 'ali@gmail.com', 'feedback of swap circle app', '2023-03-31 02:59:52', 'Active'),
(3, 3, 'aligh', 'ali@gmabil.com', 'feedback of swap circle app', '2023-03-31 03:11:17', 'Active'),
(4, 46, 'Aqsa Riaz', 'aqsariaz378@gmail.com', 'This is the feedback for Swap Circle website.', '2023-04-04 08:48:33', 'Active'),
(5, 17, 'najam', 'najamkhan@gmail.com', 'hdajkshdkj', '2023-05-17 02:36:46', 'Active'),
(6, 14, 'aligh', 'ali@gmail.com', 'feedback of swap circle app', '2023-05-22 08:00:13', 'Active'),
(7, 5, 'aligh', 'ali@gmail.com', 'feedback of swap circle app', '2023-05-22 08:02:06', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `fund_wallets`
--

CREATE TABLE `fund_wallets` (
  `fund_wallets_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `users_customers_wallets_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `bank_name` text NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Funded','Rejected','Pending','Deleted') NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fund_wallets`
--

INSERT INTO `fund_wallets` (`fund_wallets_id`, `users_customers_id`, `users_customers_wallets_id`, `image`, `bank_name`, `amount`, `description`, `date_added`, `status`) VALUES
(1, 18, 18, 'uploads/fund_wallet/1692248448.jpeg', 'HBL', 150.00, 'lorem', '2023-08-17 01:00:48', 'Funded'),
(2, 14, 13, 'uploads/fund_wallet/1692270839.jpeg', 'TideBank', 500.00, 'dasd', '2023-08-17 07:13:59', 'Funded'),
(3, 14, 25, 'uploads/fund_wallet/1692273989.jpeg', 'WiseBank(In USA)', 1000.00, 'gagaha', '2023-08-17 08:06:29', 'Funded'),
(4, 14, 33, 'uploads/fund_wallet/1692793078.jpeg', 'TideBank', 100.00, 'babababa', '2023-08-23 08:17:58', 'Funded');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notifications_id` int(11) NOT NULL,
  `users_type` enum('Admin','User') NOT NULL,
  `senders_id` int(11) NOT NULL,
  `receivers_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` enum('Read','Unread') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notifications_id`, `users_type`, `senders_id`, `receivers_id`, `message`, `date_added`, `date_modified`, `status`) VALUES
(1, 'User', 1, 1, 'sent a message.', '2023-03-09 12:50:18', '2023-03-09 12:50:18', 'Read'),
(2, 'User', 12, 1, 'sent a message.', '2023-03-09 15:30:38', '2023-03-09 15:30:38', 'Read'),
(3, 'User', 1, 1, 'sent a message.', '2023-03-09 15:37:43', '2023-03-09 15:37:43', 'Read'),
(4, 'User', 12, 1, 'sent a message.', '2023-03-09 15:38:36', '2023-03-09 15:38:36', 'Read'),
(5, 'User', 12, 1, 'sent a message.', '2023-03-09 15:38:47', '2023-03-09 15:38:47', 'Read'),
(6, 'User', 12, 1, 'sent a message.', '2023-03-09 16:46:12', '2023-03-09 16:46:12', 'Read'),
(7, 'User', 12, 1, 'sent a message.', '2023-03-09 16:46:43', '2023-03-09 16:46:43', 'Read'),
(8, 'User', 12, 1, 'sent a message.', '2023-03-09 16:47:27', '2023-03-09 16:47:27', 'Read'),
(9, 'User', 12, 1, 'sent a message.', '2023-03-09 16:50:55', '2023-03-09 16:50:55', 'Read'),
(10, 'User', 18, 14, 'sent a message.', '2023-04-03 12:10:41', '2023-04-03 12:10:41', 'Read'),
(11, 'User', 18, 14, 'sent a message.', '2023-04-03 12:12:09', '2023-04-03 12:12:09', 'Read'),
(12, 'User', 18, 14, 'sent a message.', '2023-04-03 12:13:57', '2023-04-03 12:13:57', 'Read'),
(13, 'User', 18, 14, 'sent a message.', '2023-04-03 12:16:36', '2023-04-03 12:16:36', 'Read'),
(14, 'User', 18, 14, 'sent a message.', '2023-04-03 15:41:14', '2023-04-03 15:41:14', 'Read'),
(15, 'User', 18, 14, 'sent a message.', '2023-04-03 15:43:30', '2023-04-03 15:43:30', 'Read'),
(16, 'User', 18, 14, 'sent a message.', '2023-04-03 15:43:37', '2023-04-03 15:43:37', 'Read'),
(17, 'User', 18, 47, 'sent a message.', '2023-04-03 15:45:24', '2023-04-03 15:45:24', 'Unread'),
(18, 'User', 18, 47, 'sent a message.', '2023-04-03 15:45:26', '2023-04-03 15:45:26', 'Unread'),
(19, 'User', 14, 18, 'sent a message.', '2023-04-07 14:38:14', '2023-04-07 14:38:14', 'Read'),
(20, 'User', 1, 1, 'A new message has been recieved.', '2023-04-27 11:21:08', '2023-04-27 11:21:08', 'Read'),
(21, 'User', 18, 14, 'A new message has been recieved.', '2023-04-27 11:22:14', '2023-04-27 11:22:14', 'Read'),
(22, 'User', 18, 14, 'A new message has been recieved.', '2023-04-27 11:22:20', '2023-04-27 11:22:20', 'Read'),
(23, 'User', 18, 14, 'ali Requested For SwapOffer', '2023-04-27 12:07:01', '2023-04-27 12:07:01', 'Read'),
(24, 'User', 18, 14, 'ali Requested For SwapOffer', '2023-04-27 12:08:29', '2023-04-27 12:08:29', 'Read'),
(25, 'User', 18, 14, 'ali Requested For SwapOffer', '2023-04-27 12:08:58', '2023-04-27 12:08:58', 'Read'),
(26, 'User', 18, 14, 'ali Requested For SwapOffer', '2023-04-27 12:09:55', '2023-04-27 12:09:55', 'Read'),
(27, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-04-27 12:11:22', '2023-04-27 12:11:22', 'Read'),
(28, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-04-27 12:11:27', '2023-04-27 12:11:27', 'Read'),
(29, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-04-27 12:12:41', '2023-04-27 12:12:41', 'Read'),
(30, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-04-27 12:14:23', '2023-04-27 12:14:23', 'Read'),
(31, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-27 12:45:07', '2023-04-27 12:45:07', 'Read'),
(32, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-27 12:45:24', '2023-04-27 12:45:24', 'Read'),
(33, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-27 12:45:32', '2023-04-27 12:45:32', 'Read'),
(34, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-27 12:45:38', '2023-04-27 12:45:38', 'Read'),
(35, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-27 12:46:48', '2023-04-27 12:46:48', 'Read'),
(36, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-27 12:47:42', '2023-04-27 12:47:42', 'Read'),
(37, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-04-27 12:52:38', '2023-04-27 12:52:38', 'Read'),
(38, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-04-27 12:52:58', '2023-04-27 12:52:58', 'Read'),
(39, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 12:53:28', '2023-04-27 12:53:28', 'Read'),
(40, 'User', 14, 46, 'A new message has been recieved.', '2023-04-27 13:09:34', '2023-04-27 13:09:34', 'Read'),
(41, 'User', 14, 46, 'A new message has been recieved.', '2023-04-27 13:10:22', '2023-04-27 13:10:22', 'Read'),
(42, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 13:28:33', '2023-04-27 13:28:33', 'Read'),
(43, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 13:55:30', '2023-04-27 13:55:30', 'Read'),
(44, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 13:55:56', '2023-04-27 13:55:56', 'Read'),
(45, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 13:56:05', '2023-04-27 13:56:05', 'Read'),
(46, 'User', 18, 14, 'A new message has been recieved.', '2023-04-27 13:56:49', '2023-04-27 13:56:49', 'Read'),
(47, 'User', 18, 14, 'A new message has been recieved.', '2023-04-27 13:57:03', '2023-04-27 13:57:03', 'Read'),
(48, 'User', 18, 14, 'A new message has been recieved.', '2023-04-27 13:58:37', '2023-04-27 13:58:37', 'Read'),
(49, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 13:59:38', '2023-04-27 13:59:38', 'Read'),
(50, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 14:03:40', '2023-04-27 14:03:40', 'Read'),
(51, 'User', 18, 14, 'A new message has been recieved.', '2023-04-27 14:04:21', '2023-04-27 14:04:21', 'Read'),
(52, 'User', 14, 18, 'A new message has been recieved.', '2023-04-27 14:11:46', '2023-04-27 14:11:46', 'Read'),
(53, 'User', 18, 14, 'A new message has been recieved.', '2023-04-27 14:12:03', '2023-04-27 14:12:03', 'Read'),
(54, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-04-27 15:28:29', '2023-04-27 15:28:29', 'Read'),
(55, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-04-27 15:28:40', '2023-04-27 15:28:40', 'Read'),
(56, 'User', 14, 46, 'A new message has been recieved.', '2023-04-28 09:30:21', '2023-04-28 09:30:21', 'Read'),
(57, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-04-28 10:12:38', '2023-04-28 10:12:38', 'Read'),
(58, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-04-28 10:12:45', '2023-04-28 10:12:45', 'Read'),
(59, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:09', '2023-04-28 11:02:09', 'Read'),
(60, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:11', '2023-04-28 11:02:11', 'Read'),
(61, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:13', '2023-04-28 11:02:13', 'Read'),
(62, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:16', '2023-04-28 11:02:16', 'Read'),
(63, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:19', '2023-04-28 11:02:19', 'Read'),
(64, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:21', '2023-04-28 11:02:21', 'Read'),
(65, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:23', '2023-04-28 11:02:23', 'Read'),
(66, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:25', '2023-04-28 11:02:25', 'Read'),
(67, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:27', '2023-04-28 11:02:27', 'Read'),
(68, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:30', '2023-04-28 11:02:30', 'Read'),
(69, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:31', '2023-04-28 11:02:31', 'Read'),
(70, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:34', '2023-04-28 11:02:34', 'Read'),
(71, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:36', '2023-04-28 11:02:36', 'Read'),
(72, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:39', '2023-04-28 11:02:39', 'Read'),
(73, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:42', '2023-04-28 11:02:42', 'Read'),
(74, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:02:43', '2023-04-28 11:02:43', 'Read'),
(75, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:03:35', '2023-04-28 11:03:35', 'Read'),
(76, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:03:38', '2023-04-28 11:03:38', 'Read'),
(77, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:03:43', '2023-04-28 11:03:43', 'Read'),
(78, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:03:45', '2023-04-28 11:03:45', 'Read'),
(79, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:03:47', '2023-04-28 11:03:47', 'Read'),
(80, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:08:35', '2023-04-28 11:08:35', 'Read'),
(81, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:08:40', '2023-04-28 11:08:40', 'Read'),
(82, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:08:43', '2023-04-28 11:08:43', 'Read'),
(83, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:19:46', '2023-04-28 11:19:46', 'Read'),
(84, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:20:08', '2023-04-28 11:20:08', 'Read'),
(85, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:20:43', '2023-04-28 11:20:43', 'Read'),
(86, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 11:27:19', '2023-04-28 11:27:19', 'Read'),
(87, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:29:29', '2023-04-28 11:29:29', 'Read'),
(88, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:31:18', '2023-04-28 11:31:18', 'Read'),
(89, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:31:40', '2023-04-28 11:31:40', 'Read'),
(90, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:31:46', '2023-04-28 11:31:46', 'Read'),
(91, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:32:23', '2023-04-28 11:32:23', 'Read'),
(92, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:32:51', '2023-04-28 11:32:51', 'Read'),
(93, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:33:33', '2023-04-28 11:33:33', 'Read'),
(94, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:35:14', '2023-04-28 11:35:14', 'Read'),
(95, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 11:36:15', '2023-04-28 11:36:15', 'Read'),
(96, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:47:55', '2023-04-28 12:47:55', 'Read'),
(97, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:48:16', '2023-04-28 12:48:16', 'Read'),
(98, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:48:18', '2023-04-28 12:48:18', 'Read'),
(99, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:48:20', '2023-04-28 12:48:20', 'Read'),
(100, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:48:30', '2023-04-28 12:48:30', 'Read'),
(101, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:48:35', '2023-04-28 12:48:35', 'Read'),
(102, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:48:37', '2023-04-28 12:48:37', 'Read'),
(103, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:52:45', '2023-04-28 12:52:45', 'Read'),
(104, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:52:49', '2023-04-28 12:52:49', 'Read'),
(105, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:52:51', '2023-04-28 12:52:51', 'Read'),
(106, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:52:53', '2023-04-28 12:52:53', 'Read'),
(107, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:53:00', '2023-04-28 12:53:00', 'Read'),
(108, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:53:04', '2023-04-28 12:53:04', 'Read'),
(109, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:53:10', '2023-04-28 12:53:10', 'Read'),
(110, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 12:53:17', '2023-04-28 12:53:17', 'Read'),
(111, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:20:50', '2023-04-28 13:20:50', 'Read'),
(112, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:21:42', '2023-04-28 13:21:42', 'Read'),
(113, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:21:48', '2023-04-28 13:21:48', 'Read'),
(114, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:21:51', '2023-04-28 13:21:51', 'Read'),
(115, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:23:16', '2023-04-28 13:23:16', 'Read'),
(116, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:23:19', '2023-04-28 13:23:19', 'Read'),
(117, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:23:21', '2023-04-28 13:23:21', 'Read'),
(118, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:23:22', '2023-04-28 13:23:22', 'Read'),
(119, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:23:24', '2023-04-28 13:23:24', 'Read'),
(120, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 13:27:12', '2023-04-28 13:27:12', 'Read'),
(121, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 13:27:16', '2023-04-28 13:27:16', 'Read'),
(122, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 13:27:17', '2023-04-28 13:27:17', 'Read'),
(123, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 13:27:25', '2023-04-28 13:27:25', 'Read'),
(124, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:27:50', '2023-04-28 13:27:50', 'Read'),
(125, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:27:56', '2023-04-28 13:27:56', 'Read'),
(126, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-04-28 13:28:08', '2023-04-28 13:28:08', 'Read'),
(127, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-04-28 13:28:41', '2023-04-28 13:28:41', 'Read'),
(128, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-04-28 13:28:44', '2023-04-28 13:28:44', 'Read'),
(129, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-04-28 13:28:46', '2023-04-28 13:28:46', 'Read'),
(130, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-04-28 13:28:50', '2023-04-28 13:28:50', 'Read'),
(131, 'User', 40, 14, 'Shahid Requested For SwapOffer', '2023-04-28 13:28:57', '2023-04-28 13:28:57', 'Read'),
(132, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:29:32', '2023-04-28 13:29:32', 'Read'),
(133, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:29:34', '2023-04-28 13:29:34', 'Read'),
(134, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:29:58', '2023-04-28 13:29:58', 'Read'),
(135, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-04-28 13:30:14', '2023-04-28 13:30:14', 'Read'),
(136, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-04-28 13:30:33', '2023-04-28 13:30:33', 'Read'),
(137, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:30:41', '2023-04-28 13:30:41', 'Read'),
(138, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-04-28 13:30:47', '2023-04-28 13:30:47', 'Read'),
(139, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 13:30:54', '2023-04-28 13:30:54', 'Read'),
(140, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 13:31:21', '2023-04-28 13:31:21', 'Read'),
(141, 'User', 20, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-28 13:31:50', '2023-04-28 13:31:50', 'Read'),
(142, 'User', 21, 14, 'Ayesha Requested For SwapOffer', '2023-04-28 13:32:07', '2023-04-28 13:32:07', 'Read'),
(143, 'User', 24, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:32:12', '2023-04-28 13:32:12', 'Read'),
(144, 'User', 29, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:32:18', '2023-04-28 13:32:18', 'Read'),
(145, 'User', 29, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:32:44', '2023-04-28 13:32:44', 'Read'),
(146, 'User', 27, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:32:50', '2023-04-28 13:32:50', 'Read'),
(147, 'User', 25, 14, 'Aqsa Requested For SwapOffer', '2023-04-28 13:32:56', '2023-04-28 13:32:56', 'Read'),
(148, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-04-29 11:22:32', '2023-04-29 11:22:32', 'Read'),
(149, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-29 11:23:23', '2023-04-29 11:23:23', 'Read'),
(150, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-29 11:28:30', '2023-04-29 11:28:30', 'Read'),
(151, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-04-29 11:38:29', '2023-04-29 11:38:29', 'Read'),
(152, 'User', 25, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 11:43:55', '2023-04-29 11:43:55', 'Read'),
(153, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-04-29 11:44:04', '2023-04-29 11:44:04', 'Read'),
(154, 'User', 6, 14, 'Akmal Requested For SwapOffer', '2023-04-29 11:44:09', '2023-04-29 11:44:09', 'Read'),
(155, 'User', 5, 14, 'Coders Requested For SwapOffer', '2023-04-29 11:44:22', '2023-04-29 11:44:22', 'Read'),
(156, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-29 11:44:28', '2023-04-29 11:44:28', 'Read'),
(157, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-04-29 11:44:51', '2023-04-29 11:44:51', 'Read'),
(158, 'User', 14, 14, 'Najam Requested For SwapOffer', '2023-04-29 11:45:20', '2023-04-29 11:45:20', 'Read'),
(159, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-04-29 11:45:27', '2023-04-29 11:45:27', 'Read'),
(160, 'User', 20, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-29 11:45:33', '2023-04-29 11:45:33', 'Read'),
(161, 'User', 22, 14, 'Ayesha Requested For SwapOffer', '2023-04-29 11:45:54', '2023-04-29 11:45:54', 'Read'),
(162, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-04-29 11:46:24', '2023-04-29 11:46:24', 'Read'),
(163, 'User', 19, 14, 'Ayesha Ali Khan Requested For SwapOffer', '2023-04-29 11:46:30', '2023-04-29 11:46:30', 'Read'),
(164, 'User', 22, 14, 'Ayesha Requested For SwapOffer', '2023-04-29 11:46:37', '2023-04-29 11:46:37', 'Read'),
(165, 'User', 22, 14, 'Ayesha Requested For SwapOffer', '2023-04-29 11:56:14', '2023-04-29 11:56:14', 'Read'),
(166, 'User', 25, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 11:56:20', '2023-04-29 11:56:20', 'Read'),
(167, 'User', 19, 14, 'Ayesha Ali Khan Requested For SwapOffer', '2023-04-29 11:56:27', '2023-04-29 11:56:27', 'Read'),
(168, 'User', 20, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-29 11:56:34', '2023-04-29 11:56:34', 'Read'),
(169, 'User', 21, 14, 'Ayesha Requested For SwapOffer', '2023-04-29 11:56:40', '2023-04-29 11:56:40', 'Read'),
(170, 'User', 22, 14, 'Ayesha Requested For SwapOffer', '2023-04-29 11:56:47', '2023-04-29 11:56:47', 'Read'),
(171, 'User', 23, 14, 'Amara Requested For SwapOffer', '2023-04-29 11:56:54', '2023-04-29 11:56:54', 'Read'),
(172, 'User', 24, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 11:57:02', '2023-04-29 11:57:02', 'Read'),
(173, 'User', 26, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 11:57:09', '2023-04-29 11:57:09', 'Read'),
(174, 'User', 27, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 11:57:16', '2023-04-29 11:57:16', 'Read'),
(175, 'User', 27, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 12:27:03', '2023-04-29 12:27:03', 'Read'),
(176, 'User', 28, 14, 'Xyz Requested For SwapOffer', '2023-04-29 12:27:13', '2023-04-29 12:27:13', 'Read'),
(177, 'User', 29, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 12:27:20', '2023-04-29 12:27:20', 'Read'),
(178, 'User', 29, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 12:27:27', '2023-04-29 12:27:27', 'Read'),
(179, 'User', 30, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 12:27:53', '2023-04-29 12:27:53', 'Read'),
(180, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-04-29 12:28:10', '2023-04-29 12:28:10', 'Read'),
(181, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 12:28:25', '2023-04-29 12:28:25', 'Read'),
(182, 'User', 30, 14, 'Aqsa Requested For SwapOffer', '2023-04-29 12:28:35', '2023-04-29 12:28:35', 'Read'),
(183, 'User', 23, 14, 'Amara Requested For SwapOffer', '2023-04-29 12:29:53', '2023-04-29 12:29:53', 'Read'),
(184, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-04-29 12:30:03', '2023-04-29 12:30:03', 'Read'),
(185, 'User', 48, 14, 'Mughees Requested For SwapOffer', '2023-04-29 12:30:09', '2023-04-29 12:30:09', 'Read'),
(186, 'User', 49, 14, 'Akintoye Requested For SwapOffer', '2023-04-29 12:30:18', '2023-04-29 12:30:18', 'Read'),
(187, 'User', 50, 14, 'Ahmad Requested For SwapOffer', '2023-04-29 12:30:25', '2023-04-29 12:30:25', 'Read'),
(188, 'User', 50, 14, 'Ahmad Requested For SwapOffer', '2023-04-29 12:54:47', '2023-04-29 12:54:47', 'Read'),
(189, 'User', 22, 14, 'Ayesha Requested For SwapOffer', '2023-04-29 12:54:53', '2023-04-29 12:54:53', 'Read'),
(190, 'User', 14, 46, 'A new message has been recieved.', '2023-04-29 19:15:11', '2023-04-29 19:15:11', 'Read'),
(191, 'User', 14, 46, 'A new message has been recieved.', '2023-04-29 20:52:26', '2023-04-29 20:52:26', 'Read'),
(192, 'User', 14, 46, 'A new message has been recieved.', '2023-04-29 20:57:49', '2023-04-29 20:57:49', 'Read'),
(193, 'User', 14, 46, 'A new message has been recieved.', '2023-04-29 21:08:07', '2023-04-29 21:08:07', 'Read'),
(194, 'User', 14, 46, 'A new message has been recieved.', '2023-04-29 21:36:34', '2023-04-29 21:36:34', 'Read'),
(195, 'User', 14, 16, 'A new message has been recieved.', '2023-04-29 22:45:24', '2023-04-29 22:45:24', 'Read'),
(196, 'User', 14, 16, 'A new message has been recieved.', '2023-04-29 22:46:51', '2023-04-29 22:46:51', 'Read'),
(197, 'User', 14, 16, 'A new message has been recieved.', '2023-04-29 22:50:55', '2023-04-29 22:50:55', 'Read'),
(198, 'User', 22, 14, 'Ayesha Requested For SwapOffer', '2023-04-30 13:31:49', '2023-04-30 13:31:49', 'Read'),
(199, 'User', 23, 14, 'Amara Requested For SwapOffer', '2023-04-30 13:31:56', '2023-04-30 13:31:56', 'Read'),
(200, 'User', 24, 14, 'Aqsa Requested For SwapOffer', '2023-04-30 13:32:02', '2023-04-30 13:32:02', 'Read'),
(201, 'User', 32, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-30 13:32:12', '2023-04-30 13:32:12', 'Read'),
(202, 'User', 31, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-30 13:32:18', '2023-04-30 13:32:18', 'Read'),
(203, 'User', 33, 14, 'Shahid Requested For SwapOffer', '2023-04-30 13:32:25', '2023-04-30 13:32:25', 'Read'),
(204, 'User', 33, 14, 'Shahid Requested For SwapOffer', '2023-04-30 13:32:31', '2023-04-30 13:32:31', 'Read'),
(205, 'User', 32, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-30 13:32:38', '2023-04-30 13:32:38', 'Read'),
(206, 'User', 31, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-04-30 13:32:45', '2023-04-30 13:32:45', 'Read'),
(207, 'User', 34, 14, 'Shahid Requested For SwapOffer', '2023-04-30 13:32:51', '2023-04-30 13:32:51', 'Read'),
(208, 'User', 34, 14, 'Shahid Requested For SwapOffer', '2023-04-30 13:32:59', '2023-04-30 13:32:59', 'Read'),
(209, 'User', 35, 14, 'Shahid Requested For SwapOffer', '2023-04-30 13:33:06', '2023-04-30 13:33:06', 'Read'),
(210, 'User', 35, 14, 'Shahid Requested For SwapOffer', '2023-04-30 13:33:12', '2023-04-30 13:33:12', 'Read'),
(211, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-04-30 13:34:39', '2023-04-30 13:34:39', 'Read'),
(212, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-01 13:55:20', '2023-05-01 13:55:20', 'Read'),
(213, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-01 14:09:47', '2023-05-01 14:09:47', 'Read'),
(214, 'User', 35, 14, 'Shahid Requested For SwapOffer', '2023-05-01 16:26:00', '2023-05-01 16:26:00', 'Read'),
(215, 'User', 36, 14, 'Shahid Requested For SwapOffer', '2023-05-01 16:26:08', '2023-05-01 16:26:08', 'Read'),
(216, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-01 16:30:14', '2023-05-01 16:30:14', 'Read'),
(217, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-05-01 16:32:43', '2023-05-01 16:32:43', 'Read'),
(218, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-05-01 16:32:52', '2023-05-01 16:32:52', 'Read'),
(219, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-05-01 16:33:01', '2023-05-01 16:33:01', 'Read'),
(220, 'User', 14, 16, 'A new message has been recieved.', '2023-05-01 16:33:48', '2023-05-01 16:33:48', 'Read'),
(221, 'User', 14, 16, 'A new message has been recieved.', '2023-05-01 16:35:03', '2023-05-01 16:35:03', 'Read'),
(222, 'User', 14, 29, 'A new message has been recieved.', '2023-05-01 16:38:33', '2023-05-01 16:38:33', 'Read'),
(223, 'User', 14, 32, 'A new message has been recieved.', '2023-05-01 16:39:31', '2023-05-01 16:39:31', 'Read'),
(224, 'User', 14, 32, 'A new message has been recieved.', '2023-05-01 16:44:21', '2023-05-01 16:44:21', 'Read'),
(225, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-02 15:58:47', '2023-05-02 15:58:47', 'Read'),
(226, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-02 15:58:48', '2023-05-02 15:58:48', 'Read'),
(227, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-02 21:27:19', '2023-05-02 21:27:19', 'Read'),
(228, 'User', 1, 1, 'A new message has been recieved.', '2023-05-03 10:01:30', '2023-05-03 10:01:30', 'Read'),
(229, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-05-03 11:36:30', '2023-05-03 11:36:30', 'Read'),
(230, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-05-03 11:37:16', '2023-05-03 11:37:16', 'Read'),
(231, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-05-03 11:37:23', '2023-05-03 11:37:23', 'Read'),
(232, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-05-03 11:37:32', '2023-05-03 11:37:32', 'Read'),
(233, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-05-03 11:42:09', '2023-05-03 11:42:09', 'Read'),
(234, 'User', 38, 14, 'Shahid Requested For SwapOffer', '2023-05-03 11:43:08', '2023-05-03 11:43:08', 'Read'),
(235, 'User', 38, 14, 'Shahid Requested For SwapOffer', '2023-05-03 11:43:16', '2023-05-03 11:43:16', 'Read'),
(236, 'User', 39, 14, 'Shahid Requested For SwapOffer', '2023-05-03 11:43:26', '2023-05-03 11:43:26', 'Read'),
(237, 'User', 39, 14, 'Shahid Requested For SwapOffer', '2023-05-03 11:43:36', '2023-05-03 11:43:36', 'Read'),
(238, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-05-03 11:43:59', '2023-05-03 11:43:59', 'Read'),
(239, 'User', 45, 14, 'AJ Requested For SwapOffer', '2023-05-03 11:44:13', '2023-05-03 11:44:13', 'Read'),
(240, 'User', 14, 46, 'A new message has been recieved.', '2023-05-03 14:45:07', '2023-05-03 14:45:07', 'Read'),
(241, 'User', 14, 46, 'A new message has been recieved.', '2023-05-03 14:45:25', '2023-05-03 14:45:25', 'Read'),
(242, 'User', 14, 46, 'A new message has been recieved.', '2023-05-03 14:53:22', '2023-05-03 14:53:22', 'Read'),
(243, 'User', 14, 46, 'A new message has been recieved.', '2023-05-03 14:57:04', '2023-05-03 14:57:04', 'Read'),
(244, 'User', 46, 14, 'A new message has been recieved.', '2023-05-03 14:57:55', '2023-05-03 14:57:55', 'Read'),
(245, 'User', 14, 38, 'A new message has been recieved.', '2023-05-03 15:11:38', '2023-05-03 15:11:38', 'Read'),
(246, 'User', 46, 14, 'A new message has been recieved.', '2023-05-03 15:46:56', '2023-05-03 15:46:56', 'Read'),
(247, 'User', 46, 14, 'A new message has been recieved.', '2023-05-03 15:48:11', '2023-05-03 15:48:11', 'Read'),
(248, 'User', 14, 46, 'A new message has been recieved.', '2023-05-03 15:49:12', '2023-05-03 15:49:12', 'Read'),
(249, 'User', 18, 14, 'A new message has been recieved.', '2023-05-03 16:27:39', '2023-05-03 16:27:39', 'Read'),
(250, 'User', 18, 14, 'A new message has been recieved.', '2023-05-03 16:27:45', '2023-05-03 16:27:45', 'Read'),
(251, 'User', 14, 46, 'A new message has been recieved.', '2023-05-03 16:29:05', '2023-05-03 16:29:05', 'Read'),
(252, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-03 16:31:08', '2023-05-03 16:31:08', 'Read'),
(253, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-03 16:33:54', '2023-05-03 16:33:54', 'Read'),
(254, 'User', 18, 14, 'A new message has been recieved.', '2023-05-03 16:38:03', '2023-05-03 16:38:03', 'Read'),
(255, 'User', 14, 46, 'A new message has been recieved.', '2023-05-04 10:07:24', '2023-05-04 10:07:24', 'Read'),
(256, 'User', 46, 14, 'A new message has been recieved.', '2023-05-04 10:08:36', '2023-05-04 10:08:36', 'Read'),
(257, 'User', 14, 46, 'A new message has been recieved.', '2023-05-04 10:36:44', '2023-05-04 10:36:44', 'Read'),
(258, 'User', 14, 46, 'A new message has been recieved.', '2023-05-04 10:47:35', '2023-05-04 10:47:35', 'Read'),
(259, 'User', 14, 46, 'A new message has been recieved.', '2023-05-04 10:47:39', '2023-05-04 10:47:39', 'Read'),
(260, 'User', 46, 14, 'A new message has been recieved.', '2023-05-04 10:50:26', '2023-05-04 10:50:26', 'Read'),
(261, 'User', 14, 36, 'A new message has been recieved.', '2023-05-04 11:29:46', '2023-05-04 11:29:46', 'Read'),
(262, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-04 13:03:15', '2023-05-04 13:03:15', 'Read'),
(263, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-04 13:06:43', '2023-05-04 13:06:43', 'Read'),
(264, 'User', 18, 14, 'A new message has been recieved.', '2023-05-04 13:07:10', '2023-05-04 13:07:10', 'Read'),
(265, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-04 13:08:39', '2023-05-04 13:08:39', 'Read'),
(266, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-04 13:15:56', '2023-05-04 13:15:56', 'Read'),
(267, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-04 13:16:46', '2023-05-04 13:16:46', 'Read'),
(268, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-04 14:34:04', '2023-05-04 14:34:04', 'Read'),
(269, 'User', 52, 18, 'Mughees Requested For SwapOffer', '2023-05-04 15:08:42', '2023-05-04 15:08:42', 'Read'),
(270, 'User', 53, 52, 'Flock Requested For SwapOffer', '2023-05-04 15:38:37', '2023-05-04 15:38:37', 'Unread'),
(271, 'User', 53, 52, 'Flock Requested For SwapOffer', '2023-05-04 15:40:21', '2023-05-04 15:40:21', 'Unread'),
(272, 'User', 52, 53, 'A new message has been recieved.', '2023-05-04 15:43:22', '2023-05-04 15:43:22', 'Read'),
(273, 'User', 14, 33, 'A new message has been recieved.', '2023-05-04 15:44:08', '2023-05-04 15:44:08', 'Read'),
(274, 'User', 14, 14, 'A new message has been recieved.', '2023-05-05 18:16:59', '2023-05-05 18:16:59', 'Read'),
(275, 'User', 14, 14, 'A new message has been recieved.', '2023-05-05 18:17:06', '2023-05-05 18:17:06', 'Read'),
(276, 'User', 14, 18, 'A new message has been recieved.', '2023-05-06 09:45:45', '2023-05-06 09:45:45', 'Read'),
(277, 'User', 14, 18, 'A new message has been recieved.', '2023-05-06 09:45:51', '2023-05-06 09:45:51', 'Read'),
(278, 'User', 14, 18, 'A new message has been recieved.', '2023-05-06 10:35:26', '2023-05-06 10:35:26', 'Read'),
(279, 'User', 14, 18, 'A new message has been recieved.', '2023-05-06 10:35:43', '2023-05-06 10:35:43', 'Read'),
(280, 'User', 14, 18, 'A new message has been recieved.', '2023-05-06 10:36:54', '2023-05-06 10:36:54', 'Read'),
(281, 'User', 14, 18, 'A new message has been recieved.', '2023-05-06 11:20:26', '2023-05-06 11:20:26', 'Read'),
(282, 'User', 14, 36, 'A new message has been recieved.', '2023-05-06 11:20:56', '2023-05-06 11:20:56', 'Read'),
(283, 'User', 14, 36, 'A new message has been recieved.', '2023-05-06 11:23:06', '2023-05-06 11:23:06', 'Read'),
(284, 'User', 14, 18, 'A new message has been recieved.', '2023-05-06 11:37:11', '2023-05-06 11:37:11', 'Read'),
(285, 'User', 18, 1, 'A new message has been recieved.', '2023-05-06 11:48:15', '2023-05-06 11:48:15', 'Read'),
(286, 'User', 46, 14, 'A new message has been recieved.', '2023-05-06 13:08:33', '2023-05-06 13:08:33', 'Read'),
(287, 'User', 52, 53, 'A new message has been recieved.', '2023-05-08 11:03:07', '2023-05-08 11:03:07', 'Read'),
(288, 'User', 52, 53, 'A new message has been recieved.', '2023-05-08 11:03:21', '2023-05-08 11:03:21', 'Read'),
(289, 'User', 14, 52, 'Najam Requested For SwapOffer', '2023-05-08 17:29:14', '2023-05-08 17:29:14', 'Unread'),
(290, 'User', 14, 52, 'Najam Requested For SwapOffer', '2023-05-08 17:29:17', '2023-05-08 17:29:17', 'Unread'),
(291, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-05-08 17:41:47', '2023-05-08 17:41:47', 'Read'),
(292, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-05-08 17:41:59', '2023-05-08 17:41:59', 'Read'),
(293, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-08 17:42:08', '2023-05-08 17:42:08', 'Read'),
(294, 'User', 33, 14, 'Shahid Requested For SwapOffer', '2023-05-08 17:42:20', '2023-05-08 17:42:20', 'Read'),
(295, 'User', 32, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-05-08 17:42:27', '2023-05-08 17:42:27', 'Read'),
(296, 'User', 31, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-05-08 17:42:33', '2023-05-08 17:42:33', 'Read'),
(297, 'User', 30, 14, 'Aqsa Requested For SwapOffer', '2023-05-08 17:42:39', '2023-05-08 17:42:39', 'Read'),
(298, 'User', 34, 14, 'Shahid Requested For SwapOffer', '2023-05-08 17:42:45', '2023-05-08 17:42:45', 'Read'),
(299, 'User', 35, 14, 'Shahid Requested For SwapOffer', '2023-05-08 17:42:51', '2023-05-08 17:42:51', 'Read'),
(300, 'User', 36, 14, 'Shahid Requested For SwapOffer', '2023-05-08 17:47:34', '2023-05-08 17:47:34', 'Read'),
(301, 'User', 37, 14, 'Shahid Requested For SwapOffer', '2023-05-08 17:47:51', '2023-05-08 17:47:51', 'Read'),
(302, 'User', 14, 53, 'Najam Requested For SwapOffer', '2023-05-08 17:56:24', '2023-05-08 17:56:24', 'Read'),
(303, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-11 12:02:06', '2023-05-11 12:02:06', 'Read'),
(304, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-11 12:04:07', '2023-05-11 12:04:07', 'Read'),
(305, 'User', 46, 14, 'A new message has been recieved.', '2023-05-11 12:33:56', '2023-05-11 12:33:56', 'Read'),
(306, 'User', 46, 14, 'A new message has been recieved.', '2023-05-11 12:35:48', '2023-05-11 12:35:48', 'Read'),
(307, 'User', 46, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-05-11 12:41:01', '2023-05-11 12:41:01', 'Read'),
(308, 'User', 1, 14, 'A new message has been recieved.', '2023-05-11 15:10:54', '2023-05-11 15:10:54', 'Read'),
(309, 'User', 22, 14, 'A new message has been recieved.', '2023-05-11 15:11:12', '2023-05-11 15:11:12', 'Read'),
(310, 'User', 22, 14, 'A new message has been recieved.', '2023-05-11 15:22:08', '2023-05-11 15:22:08', 'Read'),
(311, 'User', 46, 18, 'Muhammad Ahmad Requested For SwapOffer', '2023-05-11 15:44:23', '2023-05-11 15:44:23', 'Read'),
(312, 'User', 1, 14, 'Salman Ahmad Requested For SwapOffer', '2023-05-11 15:44:41', '2023-05-11 15:44:41', 'Read'),
(313, 'User', 12, 14, 'Dasd Requested For SwapOffer', '2023-05-11 15:44:55', '2023-05-11 15:44:55', 'Read'),
(314, 'User', 16, 14, 'Aqsa Requested For SwapOffer', '2023-05-11 16:02:42', '2023-05-11 16:02:42', 'Read'),
(315, 'User', 17, 14, 'Najam Requested For SwapOffer', '2023-05-11 16:03:05', '2023-05-11 16:03:05', 'Read'),
(316, 'User', 32, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-05-11 16:03:18', '2023-05-11 16:03:18', 'Read'),
(317, 'User', 14, 46, 'A new message has been recieved.', '2023-05-12 11:09:53', '2023-05-12 11:09:53', 'Read'),
(318, 'User', 14, 46, 'A new message has been recieved.', '2023-05-12 11:11:37', '2023-05-12 11:11:37', 'Read'),
(319, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-17 15:01:31', '2023-05-17 15:01:31', 'Read'),
(320, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 10:24:06', '2023-05-18 10:24:06', 'Read'),
(321, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 10:24:47', '2023-05-18 10:24:47', 'Read'),
(322, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 10:24:58', '2023-05-18 10:24:58', 'Read'),
(323, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 10:25:08', '2023-05-18 10:25:08', 'Read'),
(324, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 10:35:35', '2023-05-18 10:35:35', 'Read'),
(325, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-18 10:44:01', '2023-05-18 10:44:01', 'Read'),
(326, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-18 10:52:53', '2023-05-18 10:52:53', 'Read'),
(327, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:28:54', '2023-05-18 11:28:54', 'Read'),
(328, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:35:06', '2023-05-18 11:35:06', 'Read'),
(329, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:37:31', '2023-05-18 11:37:31', 'Read'),
(330, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 11:38:28', '2023-05-18 11:38:28', 'Read'),
(331, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 11:40:00', '2023-05-18 11:40:00', 'Read'),
(332, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:41:18', '2023-05-18 11:41:18', 'Read'),
(333, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:41:25', '2023-05-18 11:41:25', 'Read'),
(334, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:41:25', '2023-05-18 11:41:25', 'Read'),
(335, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:41:34', '2023-05-18 11:41:34', 'Read'),
(336, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 11:52:17', '2023-05-18 11:52:17', 'Read'),
(337, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 11:54:03', '2023-05-18 11:54:03', 'Read'),
(338, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 11:54:53', '2023-05-18 11:54:53', 'Read'),
(339, 'User', 1, 1, 'A new message has been recieved.', '2023-05-18 12:19:44', '2023-05-18 12:19:44', 'Read'),
(340, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 12:19:58', '2023-05-18 12:19:58', 'Read'),
(341, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 12:35:14', '2023-05-18 12:35:14', 'Read'),
(342, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 12:35:53', '2023-05-18 12:35:53', 'Read'),
(343, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 13:53:24', '2023-05-18 13:53:24', 'Read'),
(344, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 14:06:45', '2023-05-18 14:06:45', 'Read'),
(345, 'User', 14, 18, 'A new message has been recieved.', '2023-05-18 14:07:16', '2023-05-18 14:07:16', 'Read'),
(346, 'User', 18, 14, 'A new message has been recieved.', '2023-05-18 14:08:41', '2023-05-18 14:08:41', 'Read'),
(347, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-18 14:29:58', '2023-05-18 14:29:58', 'Read'),
(348, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 15:00:03', '2023-05-18 15:00:03', 'Read'),
(349, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 15:09:55', '2023-05-18 15:09:55', 'Read'),
(350, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-18 15:18:09', '2023-05-18 15:18:09', 'Read'),
(351, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 16:26:56', '2023-05-18 16:26:56', 'Read'),
(352, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 16:42:58', '2023-05-18 16:42:58', 'Read'),
(353, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 16:49:51', '2023-05-18 16:49:51', 'Read'),
(354, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 16:55:41', '2023-05-18 16:55:41', 'Read'),
(355, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-18 17:08:32', '2023-05-18 17:08:32', 'Read'),
(356, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-19 09:32:33', '2023-05-19 09:32:33', 'Read'),
(357, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-19 09:56:30', '2023-05-19 09:56:30', 'Read'),
(358, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-20 11:51:03', '2023-05-20 11:51:03', 'Read'),
(359, 'User', 18, 14, 'A new message has been recieved.', '2023-05-20 11:59:25', '2023-05-20 11:59:25', 'Read'),
(360, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-22 15:24:17', '2023-05-22 15:24:17', 'Read'),
(361, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-22 15:24:49', '2023-05-22 15:24:49', 'Read'),
(362, 'User', 18, 14, 'Ali Requested For SwapOffer', '2023-05-22 15:30:01', '2023-05-22 15:30:01', 'Read'),
(363, 'User', 19, 14, 'Ayesha Ali Khan Requested For SwapOffer', '2023-05-22 15:30:08', '2023-05-22 15:30:08', 'Read'),
(364, 'User', 20, 14, 'Muhammad Ahmad Requested For SwapOffer', '2023-05-22 15:30:16', '2023-05-22 15:30:16', 'Read'),
(365, 'User', 21, 14, 'Ayesha Requested For SwapOffer', '2023-05-22 15:30:22', '2023-05-22 15:30:22', 'Read'),
(366, 'User', 22, 14, 'Ayesha Requested For SwapOffer', '2023-05-22 15:31:02', '2023-05-22 15:31:02', 'Read'),
(367, 'User', 23, 14, 'Amara Requested For SwapOffer', '2023-05-22 15:31:12', '2023-05-22 15:31:12', 'Read'),
(368, 'User', 24, 14, 'Aqsa Requested For SwapOffer', '2023-05-22 15:31:17', '2023-05-22 15:31:17', 'Read'),
(369, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-05-23 14:32:32', '2023-05-23 14:32:32', 'Read'),
(370, 'User', 18, 14, 'A new message has been recieved.', '2023-05-23 14:33:05', '2023-05-23 14:33:05', 'Read'),
(371, 'User', 14, 18, 'A new message has been recieved.', '2023-05-23 14:34:48', '2023-05-23 14:34:48', 'Read'),
(372, 'User', 14, 46, 'A new message has been recieved.', '2023-05-23 16:35:44', '2023-05-23 16:35:44', 'Read'),
(373, 'User', 46, 14, 'A new message has been recieved.', '2023-05-23 17:04:46', '2023-05-23 17:04:46', 'Read'),
(374, 'User', 14, 46, 'A new message has been recieved.', '2023-05-23 17:07:40', '2023-05-23 17:07:40', 'Read'),
(375, 'User', 46, 14, 'A new message has been recieved.', '2023-05-23 17:12:04', '2023-05-23 17:12:04', 'Read'),
(376, 'User', 14, 18, 'Najam Requested For SwapOffer', '2023-07-13 16:44:50', '2023-07-13 16:44:50', 'Unread'),
(377, 'Admin', 1, 14, 'Payment transaction approved and deposited to wallet.', '2023-08-24 16:42:55', '2023-08-24 16:42:55', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` enum('Hosted','InApp') NOT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `name`, `type`, `status`) VALUES
(1, 'Manual', 'InApp', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `rate_api`
--

CREATE TABLE `rate_api` (
  `rate_api_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `name` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rate_api`
--

INSERT INTO `rate_api` (`rate_api_id`, `url`, `name`, `date_added`, `status`) VALUES
(1, 'https://api.exchangerate.host/latest', 'Exchangerate', '2023-07-03 06:32:50', 'Active'),
(2, 'https://data.fixer.io/api', 'Fixer.io', '2023-07-13 06:53:51', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `swap_offers`
--

CREATE TABLE `swap_offers` (
  `swap_offers_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `from_system_currencies_id` int(11) NOT NULL,
  `to_system_currencies_id` int(11) NOT NULL,
  `from_amount` decimal(15,2) NOT NULL,
  `to_amount` decimal(15,2) NOT NULL,
  `admin_share` decimal(15,2) NOT NULL,
  `admin_share_amount` decimal(15,2) NOT NULL,
  `exchange_rate` decimal(15,2) NOT NULL,
  `system_currencies_id` int(11) NOT NULL,
  `base_amount` decimal(15,2) NOT NULL,
  `expiry_date_time` datetime NOT NULL,
  `date_added` datetime NOT NULL,
  `status` enum('Pending','Accepted','Rejected','Deleted','Expired') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `swap_offers`
--

INSERT INTO `swap_offers` (`swap_offers_id`, `users_customers_id`, `from_system_currencies_id`, `to_system_currencies_id`, `from_amount`, `to_amount`, `admin_share`, `admin_share_amount`, `exchange_rate`, `system_currencies_id`, `base_amount`, `expiry_date_time`, `date_added`, `status`) VALUES
(1, 18, 79, 2, 150.00, 37485.00, 10.00, 0.00, 250.00, 2, 0.51, '2023-05-13 15:31:54', '2023-05-13 13:31:54', 'Pending'),
(2, 18, 79, 2, 50.00, 495.00, 10.00, 0.00, 10.00, 2, 0.17, '2023-05-15 17:57:25', '2023-05-15 09:57:25', 'Pending'),
(3, 14, 79, 6, 500.00, 59450.00, 10.00, 0.00, 119.00, 2, 1.77, '2023-05-17 16:59:58', '2023-05-17 14:59:58', 'Pending'),
(4, 18, 6, 113, 50.00, 395.00, 10.00, 0.00, 8.00, 2, 33.23, '2023-05-18 15:23:18', '2023-05-18 10:23:18', 'Pending'),
(5, 18, 47, 79, 15.00, 28.50, 10.00, 0.00, 2.00, 2, 0.18, '2023-05-18 12:35:11', '2023-05-18 10:35:11', 'Pending'),
(6, 18, 79, 47, 20.00, 58.00, 10.00, 0.00, 3.00, 2, 0.07, '2023-05-18 14:39:31', '2023-05-18 10:39:31', 'Pending'),
(7, 14, 79, 47, 50.00, 20.00, 10.00, 0.00, 0.50, 2, 0.18, '2023-05-18 15:43:08', '2023-05-18 10:43:08', 'Pending'),
(8, 14, 113, 79, 50.00, 95.00, 10.00, 0.00, 2.00, 2, 0.61, '2023-05-18 15:52:31', '2023-05-18 10:52:31', 'Pending'),
(9, 14, 79, 47, 100.00, 190.00, 10.00, 0.00, 2.00, 2, 0.35, '2023-05-18 19:29:47', '2023-05-18 14:29:47', 'Pending'),
(10, 18, 79, 113, 50.00, 95.00, 10.00, 0.00, 2.00, 2, 0.18, '2023-05-18 19:51:17', '2023-05-18 14:51:17', 'Pending'),
(11, 18, 2, 79, 5.00, 1249.50, 10.00, 0.00, 250.00, 2, 5.00, '2023-05-18 19:59:41', '2023-05-18 14:59:41', 'Pending'),
(12, 18, 2, 79, 2.00, 499.80, 10.00, 0.00, 250.00, 2, 2.00, '2023-05-18 20:09:27', '2023-05-18 15:09:27', 'Pending'),
(13, 14, 113, 79, 100.00, 190.00, 10.00, 0.00, 2.00, 2, 1.21, '2023-05-18 16:16:55', '2023-05-18 15:16:55', 'Pending'),
(14, 18, 79, 113, 100.00, 90.00, 10.00, 0.00, 1.00, 2, 0.35, '2023-05-18 17:26:29', '2023-05-18 16:26:29', 'Pending'),
(15, 18, 79, 113, 100.00, 90.00, 10.00, 0.00, 1.00, 2, 0.35, '2023-05-18 17:42:48', '2023-05-18 16:42:48', 'Pending'),
(16, 18, 79, 113, 50.00, 45.00, 10.00, 0.00, 1.00, 2, 0.18, '2023-05-18 21:49:31', '2023-05-18 16:49:31', 'Pending'),
(17, 18, 79, 113, 100.00, 190.00, 10.00, 0.00, 2.00, 2, 0.35, '2023-05-18 18:55:29', '2023-05-18 16:55:29', 'Pending'),
(18, 18, 79, 113, 50.00, 45.00, 10.00, 0.00, 1.00, 2, 0.18, '2023-05-18 19:08:19', '2023-05-18 17:08:19', 'Pending'),
(19, 18, 79, 113, 50.00, 95.00, 10.00, 0.00, 2.00, 2, 0.18, '2023-05-19 14:32:11', '2023-05-19 09:32:11', 'Pending'),
(20, 18, 79, 113, 50.00, 45.00, 10.00, 0.00, 1.00, 2, 0.18, '2023-05-19 11:55:35', '2023-05-19 09:55:35', 'Pending'),
(21, 18, 6, 113, 100.00, 190.00, 10.00, 0.00, 2.00, 2, 66.50, '2023-05-20 16:50:13', '2023-05-20 11:50:13', 'Pending'),
(22, 18, 79, 113, 50.00, 95.00, 10.00, 0.00, 2.00, 2, 0.18, '2023-05-22 20:03:18', '2023-05-22 15:03:18', 'Pending'),
(23, 14, 79, 11, 10.00, 4.00, 10.00, 0.00, 0.50, 2, 0.04, '2023-05-23 15:19:33', '2023-05-22 15:19:33', 'Pending'),
(24, 14, 79, 11, 10.00, 4.00, 10.00, 0.00, 0.50, 2, 0.04, '2023-05-23 15:19:51', '2023-05-22 15:19:51', 'Pending'),
(25, 18, 79, 113, 50.00, 95.00, 10.00, 0.00, 2.00, 2, 0.18, '2023-05-22 20:21:23', '2023-05-22 15:21:23', 'Pending'),
(26, 14, 79, 2, 100.00, 990.00, 10.00, 0.00, 10.00, 2, 0.35, '2023-05-24 14:14:59', '2023-05-23 14:14:59', 'Pending'),
(27, 14, 79, 2, 100.00, 990.00, 10.00, 0.00, 10.00, 2, 0.35, '2023-05-24 14:14:59', '2023-05-23 14:14:59', 'Pending'),
(28, 14, 79, 2, 100.00, 990.00, 10.00, 0.00, 10.00, 2, 0.35, '2023-05-24 14:14:59', '2023-05-23 14:14:59', 'Pending'),
(29, 18, 6, 79, 100.00, 90.00, 10.00, 0.00, 1.00, 2, 66.53, '2023-05-23 16:31:13', '2023-05-23 14:31:13', 'Pending'),
(30, 18, 79, 6, 100.00, 14990.00, 10.00, 0.00, 150.00, 2, 0.35, '2023-06-07 13:58:59', '2023-06-07 12:58:59', 'Pending'),
(31, 48, 2, 80, 100.00, 1190.00, 10.00, 0.00, 12.00, 2, 100.00, '2023-07-07 21:05:48', '2023-07-07 16:05:48', 'Pending'),
(32, 14, 79, 113, 500.00, 1950.00, 10.00, 0.00, 4.00, 2, 1.70, '2023-08-18 15:37:00', '2023-08-17 15:37:28', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `swap_offers_favourite`
--

CREATE TABLE `swap_offers_favourite` (
  `swap_offers_favourite_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `swap_offers_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Pending','Deleted') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `swap_offers_favourite`
--

INSERT INTO `swap_offers_favourite` (`swap_offers_favourite_id`, `users_customers_id`, `swap_offers_id`, `added_date`, `status`) VALUES
(1, 14, 2, '2023-05-15 08:36:38', 'Active'),
(2, 14, 21, '2023-05-20 03:24:33', 'Deleted'),
(3, 14, 22, '2023-05-22 06:15:36', 'Active'),
(4, 14, 3, '2023-05-22 06:17:06', 'Active'),
(5, 14, 25, '2023-05-22 06:22:01', 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `swap_offers_requests`
--

CREATE TABLE `swap_offers_requests` (
  `swap_offers_requests_id` int(11) NOT NULL,
  `swap_offers_id` int(11) NOT NULL,
  `from_users_customers_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Accepted','Rejected','Cancelled','Withdraw','Deleted') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `swap_offers_requests`
--

INSERT INTO `swap_offers_requests` (`swap_offers_requests_id`, `swap_offers_id`, `from_users_customers_id`, `date_added`, `status`) VALUES
(1, 3, 18, '2023-05-17 06:01:31', 'Accepted'),
(2, 4, 14, '2023-05-18 01:24:06', 'Accepted'),
(3, 5, 14, '2023-05-18 01:35:35', 'Accepted'),
(4, 7, 18, '2023-05-18 01:44:01', 'Accepted'),
(5, 8, 18, '2023-05-18 01:52:53', 'Accepted'),
(6, 9, 18, '2023-05-18 05:29:58', 'Pending'),
(7, 11, 14, '2023-05-18 06:00:03', 'Accepted'),
(8, 12, 14, '2023-05-18 06:09:55', 'Accepted'),
(9, 13, 18, '2023-05-18 06:18:09', 'Accepted'),
(10, 14, 14, '2023-05-18 07:26:56', 'Accepted'),
(11, 15, 14, '2023-05-18 07:42:58', 'Accepted'),
(12, 16, 14, '2023-05-18 07:49:51', 'Accepted'),
(13, 17, 14, '2023-05-18 07:55:41', 'Accepted'),
(14, 18, 14, '2023-05-18 08:08:32', 'Accepted'),
(15, 19, 14, '2023-05-19 00:32:33', 'Accepted'),
(16, 20, 14, '2023-05-19 00:56:30', 'Accepted'),
(17, 21, 14, '2023-05-20 02:51:03', 'Accepted'),
(18, 25, 14, '2023-05-22 06:24:17', 'Pending'),
(19, 24, 18, '2023-05-22 06:30:01', 'Accepted'),
(20, 24, 19, '2023-05-22 06:30:08', 'Rejected'),
(21, 24, 20, '2023-05-22 06:30:16', 'Rejected'),
(22, 24, 21, '2023-05-22 06:30:22', 'Rejected'),
(23, 24, 22, '2023-05-22 06:31:02', 'Rejected'),
(24, 24, 23, '2023-05-22 06:31:12', 'Rejected'),
(25, 24, 24, '2023-05-22 06:31:17', 'Rejected'),
(26, 29, 14, '2023-05-23 05:32:32', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `swap_wallets`
--

CREATE TABLE `swap_wallets` (
  `swap_wallets_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `from_users_customers_wallets_id` int(11) NOT NULL,
  `to_users_customers_wallets_id` int(11) NOT NULL,
  `amount_from` decimal(15,2) NOT NULL,
  `amount_to` decimal(15,2) NOT NULL,
  `admin_share` decimal(15,2) NOT NULL,
  `admin_share_amount` decimal(15,2) NOT NULL,
  `exchange_rate` decimal(15,2) NOT NULL,
  `system_currencies_id` int(11) NOT NULL,
  `base_amount` decimal(15,2) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','On Hold','Successful','Declined') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `swap_wallets`
--

INSERT INTO `swap_wallets` (`swap_wallets_id`, `users_customers_id`, `from_users_customers_wallets_id`, `to_users_customers_wallets_id`, `amount_from`, `amount_to`, `admin_share`, `admin_share_amount`, `exchange_rate`, `system_currencies_id`, `base_amount`, `date_added`, `status`) VALUES
(1, 18, 3, 1, 100.00, -9.66, 10.00, 0.00, -0.10, 2, 0.34, '2023-05-12 07:14:13', 'Pending'),
(2, 18, 3, 2, 100.00, -9.50, 10.00, 0.00, -0.09, 2, 0.34, '2023-05-12 07:20:30', 'Pending'),
(3, 18, 3, 9, 50.00, -4.77, 10.00, 0.00, -0.10, 2, 0.17, '2023-05-13 03:49:17', 'Pending'),
(4, 18, 3, 10, 1000.00, 2.78, 10.00, 0.34, 0.00, 2, 3.38, '2023-05-13 04:11:55', 'Pending'),
(5, 18, 3, 10, 100.00, 0.28, 10.00, 0.03, 0.00, 2, 0.34, '2023-05-13 04:16:39', 'Pending'),
(6, 18, 3, 11, 30.00, 0.15, 10.00, 0.01, 0.00, 2, 0.10, '2023-05-13 04:19:02', 'Pending'),
(7, 18, 3, 11, 100.00, 0.49, 10.00, 0.03, 0.00, 2, 0.34, '2023-05-13 04:21:41', 'Pending'),
(8, 18, 4, 1, 1000.00, 10.95, 10.00, 1.22, 0.01, 2, 12.17, '2023-05-15 00:58:45', 'Pending'),
(9, 18, 3, 1, 3000.00, 9.48, 10.00, 1.05, 0.00, 2, 10.54, '2023-05-18 05:58:09', 'Pending'),
(10, 18, 3, 18, 3000.00, 781.43, 10.00, 1.05, 0.00, 2, 10.54, '2023-05-18 06:15:10', 'Pending'),
(11, 14, 13, 19, 100.00, 0.47, 10.00, 0.04, 0.00, 2, 0.35, '2023-05-20 02:47:07', 'Pending'),
(12, 14, 13, 17, 10.00, 2.62, 10.00, 0.00, 0.00, 2, 0.04, '2023-05-22 05:45:14', 'Pending'),
(13, 14, 13, 17, 10.00, 2.62, 10.00, 0.00, 0.00, 2, 0.04, '2023-05-22 05:45:48', 'Pending'),
(14, 14, 13, 17, 10.00, 2.62, 10.00, 0.00, 0.00, 2, 0.04, '2023-05-22 05:46:37', 'Pending'),
(15, 14, 13, 19, 100.00, 0.47, 10.00, 0.03, 0.00, 2, 0.35, '2023-05-24 05:24:33', 'Pending'),
(16, 14, 13, 23, 91.00, 66.98, 10.00, 0.03, 0.00, 2, 0.32, '2023-05-24 05:25:25', 'Pending'),
(17, 18, 18, 3, 82.00, 257.29, 10.00, 0.10, 0.01, 2, 1.00, '2023-07-03 02:11:19', 'Pending'),
(18, 18, 3, 1, 1944.00, 6.14, 10.00, 0.68, 0.00, 2, 6.82, '2023-07-03 02:14:58', 'Pending'),
(19, 48, 29, 28, 200.00, 15509.18, 10.00, 20.00, 1.00, 2, 200.00, '2023-07-07 07:04:36', 'Pending'),
(20, 14, 13, 7, 600.00, 3.15, 10.00, 0.21, 0.00, 2, 2.06, '2023-08-16 01:07:18', 'Pending'),
(21, 14, 19, 7, 51.00, 50.34, 10.00, 3.29, 0.65, 2, 32.91, '2023-08-16 01:08:29', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `system_countries`
--

CREATE TABLE `system_countries` (
  `system_countries_id` int(11) NOT NULL,
  `code` char(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `currency` varchar(80) NOT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `system_countries`
--

INSERT INTO `system_countries` (`system_countries_id`, `code`, `name`, `currency`, `symbol`, `image`, `date_added`, `status`) VALUES
(121, 'UAH', 'Ukraine', 'Hryvnia', '₴', '/uploads/flags/UA.png', '2023-03-18 00:17:52', 'Active'),
(119, 'TRL', 'Turkey', 'Liras', '£', '/uploads/flags/TR.png', '2023-03-18 00:17:52', 'Active'),
(120, 'TVD', 'Tuvalu', 'Dollars', '$', '/uploads/flags/TV.png', '2023-03-18 00:17:52', 'Active'),
(117, 'TTD', 'Trinidad and Tobago', 'Dollars', 'TT$', '/uploads/flags/TT.png', '2023-03-18 00:17:52', 'Active'),
(118, 'TRY', 'Turkey', 'Lira', 'TL', '/uploads/flags/TR.png', '2023-03-18 00:17:52', 'Active'),
(116, 'THB', 'Thailand', 'Baht', '฿', '/uploads/flags/TH.png', '2023-03-18 00:17:52', 'Active'),
(114, 'SYP', 'Syria', 'Pounds', '£', '/uploads/flags/SY.png', '2023-03-18 00:17:52', 'Active'),
(115, 'TWD', 'Taiwan', 'New Dollars', 'NT$', '/uploads/flags/TW.png', '2023-03-18 00:17:52', 'Active'),
(113, 'SRD', 'Suriname', 'Dollars', '$', '/uploads/flags/SR.png', '2023-03-18 00:17:52', 'Active'),
(112, 'CHF', 'Switzerland', 'Francs', 'CHF', '/uploads/flags/CH.png', '2023-03-18 00:17:52', 'Active'),
(110, 'LKR', 'Sri Lanka', 'Rupees', '₨', '/uploads/flags/LK.png', '2023-03-18 00:17:52', 'Active'),
(111, 'SEK', 'Sweden', 'Kronor', 'kr', '/uploads/flags/SE.png', '2023-03-18 00:17:52', 'Active'),
(109, 'EUR', 'Spain', 'Euro', '€', '/uploads/flags/ES.png', '2023-03-18 00:17:52', 'Active'),
(107, 'ZAR', 'South Africa', 'Rand', 'R', '/uploads/flags/ZA.png', '2023-03-18 00:17:52', 'Active'),
(108, 'KRW', 'South Korea', 'Won', '₩', '/uploads/flags/KR.png', '2023-03-18 00:17:52', 'Active'),
(106, 'SOS', 'Somalia', 'Shillings', 'S', '/uploads/flags/SO.png', '2023-03-18 00:17:52', 'Active'),
(105, 'SBD', 'Solomon Islands', 'Dollars', '$', '/uploads/flags/SB.png', '2023-03-18 00:17:52', 'Active'),
(104, 'EUR', 'Slovenia', 'Euro', '€', '/uploads/flags/SI.png', '2023-03-18 00:17:52', 'Active'),
(103, 'SGD', 'Singapore', 'Dollars', '$', '/uploads/flags/SG.png', '2023-03-18 00:17:52', 'Active'),
(102, 'SCR', 'Seychelles', 'Rupees', '₨', '/uploads/flags/SC.png', '2023-03-18 00:17:52', 'Active'),
(101, 'RSD', 'Serbia', 'Dinars', 'Дин.', '/uploads/flags/RS.png', '2023-03-18 00:17:52', 'Active'),
(100, 'SAR', 'Saudi Arabia', 'Riyals', '﷼', '/uploads/flags/SA.png', '2023-03-18 00:17:52', 'Active'),
(99, 'SHP', 'Saint Helena', 'Pounds', '£', '/uploads/flags/SH.png', '2023-03-18 00:17:52', 'Active'),
(98, 'RUB', 'Russia', 'Rubles', 'руб', '/uploads/flags/RU.png', '2023-03-18 00:17:52', 'Active'),
(97, 'RON', 'Romania', 'New Lei', 'lei', '/uploads/flags/RO.png', '2023-03-18 00:17:52', 'Active'),
(96, 'QAR', 'Qatar', 'Rials', '﷼', '/uploads/flags/QA.png', '2023-03-18 00:17:52', 'Active'),
(95, 'PLN', 'Poland', 'Zlotych', 'zł', '/uploads/flags/PL.png', '2023-03-18 00:17:52', 'Active'),
(94, 'PHP', 'Philippines', 'Pesos', 'Php', '/uploads/flags/PH.png', '2023-03-18 00:17:52', 'Active'),
(92, 'PYG', 'Paraguay', 'Guarani', 'Gs', '/uploads/flags/PY.png', '2023-03-18 00:17:52', 'Active'),
(93, 'PEN', 'Peru', 'Nuevos Soles', 'S/.', '/uploads/flags/PE.png', '2023-03-18 00:17:52', 'Active'),
(91, 'PAB', 'Panama', 'Balboa', 'B/.', '/uploads/flags/PA.png', '2023-03-18 00:17:52', 'Active'),
(90, 'PKR', 'Pakistan', 'Rupees', '₨', '/uploads/flags/PK.png', '2023-03-18 00:17:52', 'Active'),
(89, 'OMR', 'Oman', 'Rials', '﷼', '/uploads/flags/OM.png', '2023-03-18 00:17:52', 'Active'),
(88, 'NOK', 'Norway', 'Krone', 'kr', '/uploads/flags/NO.png', '2023-03-18 00:17:52', 'Active'),
(86, 'NGN', 'Nigeria', 'Nairas', '₦', '/uploads/flags/NG.png', '2023-03-18 00:17:52', 'Active'),
(87, 'KPW', 'North Korea', 'Won', '₩', '/uploads/flags/KP.png', '2023-03-18 00:17:52', 'Active'),
(85, 'NIO', 'Nicaragua', 'Cordobas', 'C$', '/uploads/flags/NI.png', '2023-03-18 00:17:52', 'Active'),
(84, 'NZD', 'New Zealand', 'Dollars', '$', '/uploads/flags/NZ.png', '2023-03-18 00:17:52', 'Active'),
(83, 'EUR', 'Netherlands', 'Euro', '€', '/uploads/flags/NL.png', '2023-03-18 00:17:52', 'Active'),
(82, 'ANG', 'Netherlands Antilles', 'Guilders', 'ƒ', '/uploads/flags/AN.png', '2023-03-18 00:17:52', 'Active'),
(80, 'NAD', 'Namibia', 'Dollars', '$', '/uploads/flags/NA.png', '2023-03-18 00:17:52', 'Active'),
(81, 'NPR', 'Nepal', 'Rupees', '₨', '/uploads/flags/NP.png', '2023-03-18 00:17:52', 'Active'),
(79, 'MZN', 'Mozambique', 'Meticais', 'MT', '/uploads/flags/MZ.png', '2023-03-18 00:17:52', 'Active'),
(78, 'MNT', 'Mongolia', 'Tugriks', '₮', '/uploads/flags/MN.png', '2023-03-18 00:17:52', 'Active'),
(77, 'MXN', 'Mexico', 'Pesos', '$', '/uploads/flags/MX.png', '2023-03-18 00:17:52', 'Active'),
(76, 'MUR', 'Mauritius', 'Rupees', '₨', '/uploads/flags/MU.png', '2023-03-18 00:17:52', 'Active'),
(75, 'EUR', 'Malta', 'Euro', '€', '/uploads/flags/MT.png', '2023-03-18 00:17:52', 'Active'),
(74, 'MYR', 'Malaysia', 'Ringgits', 'RM', '/uploads/flags/MY.png', '2023-03-18 00:17:52', 'Active'),
(73, 'MKD', 'Macedonia', 'Denars', 'ден', '/uploads/flags/MK.png', '2023-03-18 00:17:52', 'Active'),
(72, 'EUR', 'Luxembourg', 'Euro', '€', '/uploads/flags/LU.png', '2023-03-18 00:17:52', 'Active'),
(71, 'LTL', 'Lithuania', 'Litai', 'Lt', '/uploads/flags/LT.png', '2023-03-18 00:17:52', 'Active'),
(69, 'LRD', 'Liberia', 'Dollars', '$', '/uploads/flags/LR.png', '2023-03-18 00:17:52', 'Active'),
(70, 'CHF', 'Liechtenstein', 'Switzerland Francs', 'CHF', '/uploads/flags/LI.png', '2023-03-18 00:17:52', 'Active'),
(68, 'LBP', 'Lebanon', 'Pounds', '£', '/uploads/flags/LB.png', '2023-03-18 00:17:52', 'Active'),
(66, 'LAK', 'Laos', 'Kips', '₭', '/uploads/flags/LA.png', '2023-03-18 00:17:52', 'Active'),
(67, 'LVL', 'Latvia', 'Lati', 'Ls', '/uploads/flags/LV.png', '2023-03-18 00:17:52', 'Active'),
(65, 'KGS', 'Kyrgyzstan', 'Soms', 'лв', '/uploads/flags/KG.png', '2023-03-18 00:17:52', 'Active'),
(64, 'KRW', 'Korea (South)', 'Won', '₩', '/uploads/flags/KR.png', '2023-03-18 00:17:52', 'Active'),
(63, 'KPW', 'Korea (North)', 'Won', '₩', '/uploads/flags/KP.png', '2023-03-18 00:17:52', 'Active'),
(62, 'KZT', 'Kazakhstan', 'Tenge', 'лв', '/uploads/flags/KZ.png', '2023-03-18 00:17:52', 'Active'),
(61, 'JEP', 'Jersey', 'Pounds', '£', '/uploads/flags/JE.png', '2023-03-18 00:17:52', 'Active'),
(60, 'JPY', 'Japan', 'Yen', '¥', '/uploads/flags/JP.png', '2023-03-18 00:17:52', 'Active'),
(59, 'JMD', 'Jamaica', 'Dollars', 'J$', '/uploads/flags/JM.png', '2023-03-18 00:17:52', 'Active'),
(58, 'EUR', 'Italy', 'Euro', '€', '/uploads/flags/IT.png', '2023-03-18 00:17:52', 'Active'),
(57, 'ILS', 'Israel', 'New Shekels', '₪', '/uploads/flags/IL.png', '2023-03-18 00:17:52', 'Active'),
(56, 'IMP', 'Isle of Man', 'Pounds', '£', '/uploads/flags/IM.png', '2023-03-18 00:17:52', 'Active'),
(55, 'EUR', 'Ireland', 'Euro', '€', '/uploads/flags/IE.png', '2023-03-18 00:17:52', 'Active'),
(54, 'IRR', 'Iran', 'Rials', '﷼', '/uploads/flags/IR.png', '2023-03-18 00:17:52', 'Active'),
(53, 'IDR', 'Indonesia', 'Rupiahs', 'Rp', '/uploads/flags/ID.png', '2023-03-18 00:17:52', 'Active'),
(52, 'INR', 'India', 'Rupees', 'Rp', '/uploads/flags/IN.png', '2023-03-18 00:17:52', 'Active'),
(50, 'HUF', 'Hungary', 'Forint', 'Ft', '/uploads/flags/HU.png', '2023-03-18 00:17:52', 'Active'),
(51, 'ISK', 'Iceland', 'Kronur', 'kr', '/uploads/flags/IS.png', '2023-03-18 00:17:52', 'Active'),
(49, 'HKD', 'Hong Kong', 'Dollars', '$', '/uploads/flags/HK.png', '2023-03-18 00:17:52', 'Active'),
(48, 'HNL', 'Honduras', 'Lempiras', 'L', '/uploads/flags/HN.png', '2023-03-18 00:17:52', 'Active'),
(47, 'EUR', 'Holland (Netherlands)', 'Euro', '€', '/uploads/flags/NL.png', '2023-03-18 00:17:52', 'Active'),
(46, 'GYD', 'Guyana', 'Dollars', '$', '/uploads/flags/GY.png', '2023-03-18 00:17:52', 'Active'),
(44, 'GTQ', 'Guatemala', 'Quetzales', 'Q', '/uploads/flags/GT.png', '2023-03-18 00:17:52', 'Active'),
(45, 'GGP', 'Guernsey', 'Pounds', '£', '/uploads/flags/GG.png', '2023-03-18 00:17:52', 'Active'),
(43, 'EUR', 'Greece', 'Euro', '€', '/uploads/flags/GR.png', '2023-03-18 00:17:52', 'Active'),
(42, 'GIP', 'Gibraltar', 'Pounds', '£', '/uploads/flags/GI.png', '2023-03-18 00:17:52', 'Active'),
(41, 'GHC', 'Ghana', 'Cedis', '¢', '/uploads/flags/GH.png', '2023-03-18 00:17:52', 'Active'),
(40, 'EUR', 'France', 'Euro', '€', '/uploads/flags/FR.png', '2023-03-18 00:17:52', 'Active'),
(39, 'FJD', 'Fiji', 'Dollars', '$', '/uploads/flags/FJ.png', '2023-03-18 00:17:52', 'Active'),
(38, 'FKP', 'Falkland Islands', 'Pounds', '£', '/uploads/flags/FK.png', '2023-03-18 00:17:52', 'Active'),
(37, 'GBP', 'England (United Kingdom)', 'Pounds', '£', '/uploads/flags/GB.png', '2023-03-18 00:17:52', 'Active'),
(36, 'SVC', 'El Salvador', 'Colones', '$', '/uploads/flags/SV.png', '2023-03-18 00:17:52', 'Active'),
(35, 'EGP', 'Egypt', 'Pounds', '£', '/uploads/flags/EG.png', '2023-03-18 00:17:52', 'Active'),
(34, 'XCD', 'East Caribbean', 'Dollars', '$', '/uploads/flags/GD.png', '2023-03-18 00:17:52', 'Active'),
(33, 'DOP', 'Dominican Republic', 'Pesos', 'RD$', '/uploads/flags/DO.png', '2023-03-18 00:17:52', 'Active'),
(32, 'DKK', 'Denmark', 'Kroner', 'kr', '/uploads/flags/DK.png', '2023-03-18 00:17:52', 'Active'),
(31, 'CZK', 'Czech Republic', 'Koruny', 'Kč', '/uploads/flags/CZ.png', '2023-03-18 00:17:52', 'Active'),
(29, 'CUP', 'Cuba', 'Pesos', '₱', '/uploads/flags/CU.png', '2023-03-18 00:17:52', 'Active'),
(30, 'EUR', 'Cyprus', 'Euro', '€', '/uploads/flags/CY.png', '2023-03-18 00:17:52', 'Active'),
(28, 'HRK', 'Croatia', 'Kuna', 'kn', '/uploads/flags/HR.png', '2023-03-18 00:17:52', 'Active'),
(27, 'CRC', 'Costa Rica', 'Colón', '₡', '/uploads/flags/CR.png', '2023-03-18 00:17:52', 'Active'),
(26, 'COP', 'Colombia', 'Pesos', '$', '/uploads/flags/CO.png', '2023-03-18 00:17:52', 'Active'),
(25, 'CNY', 'China', 'Yuan Renminbi', '¥', '/uploads/flags/CN.png', '2023-03-18 00:17:52', 'Active'),
(24, 'CLP', 'Chile', 'Pesos', '$', '/uploads/flags/CL.png', '2023-03-18 00:17:52', 'Active'),
(22, 'CAD', 'Canada', 'Dollars', '$', '/uploads/flags/CA.png', '2023-03-18 00:17:52', 'Active'),
(23, 'KYD', 'Cayman Islands', 'Dollars', '$', '/uploads/flags/KY.png', '2023-03-18 00:17:52', 'Active'),
(21, 'KHR', 'Cambodia', 'Riels', '៛', '/uploads/flags/KH.png', '2023-03-18 00:17:52', 'Active'),
(20, 'BND', 'Brunei Darussalam', 'Dollars', '$', '/uploads/flags/BN.png', '2023-03-18 00:17:52', 'Active'),
(19, 'GBP', 'Britain (United Kingdom)', 'Pounds', '£', '/uploads/flags/GB.png', '2023-03-18 00:17:52', 'Active'),
(18, 'BRL', 'Brazil', 'Reais', 'R$', '/uploads/flags/BR.png', '2023-03-18 00:17:52', 'Active'),
(17, 'BGN', 'Bulgaria', 'Leva', 'лв', '/uploads/flags/BG.png', '2023-03-18 00:17:52', 'Active'),
(16, 'BWP', 'Botswana', 'Pula', 'P', '/uploads/flags/BW.png', '2023-03-18 00:17:52', 'Active'),
(15, 'BAM', 'Bosnia and Herzegovina', 'Convertible Marka', 'KM', '/uploads/flags/BA.png', '2023-03-18 00:17:52', 'Active'),
(14, 'BOB', 'Bolivia', 'Bolivianos', '$b', '/uploads/flags/BO.png', '2023-03-18 00:17:52', 'Active'),
(13, 'BMD', 'Bermuda', 'Dollars', '$', '/uploads/flags/BM.png', '2023-03-18 00:17:52', 'Active'),
(12, 'BZD', 'Beliz', 'Dollars', 'BZ$', '/uploads/flags/BZ.png', '2023-03-18 00:17:52', 'Active'),
(11, 'EUR', 'Belgium', 'Euro', '€', '/uploads/flags/BE.png', '2023-03-18 00:17:52', 'Active'),
(10, 'BYR', 'Belarus', 'Rubles', 'p.', '/uploads/flags/BY.png', '2023-03-18 00:17:52', 'Active'),
(9, 'BBD', 'Barbados', 'Dollars', '$', '/uploads/flags/BB.png', '2023-03-18 00:17:52', 'Active'),
(8, 'BSD', 'Bahamas', 'Dollars', '$', '/uploads/flags/BS.png', '2023-03-18 00:17:52', 'Active'),
(7, 'AZN', 'Azerbaijan', 'New Manats', 'ман', '/uploads/flags/AZ.png', '2023-03-18 00:17:52', 'Active'),
(6, 'AUD', 'Australia', 'Dollars', '$', '/uploads/flags/AU.png', '2023-03-18 00:17:52', 'Active'),
(5, 'AWG', 'Aruba', 'Guilders', 'ƒ', '/uploads/flags/AW.png', '2023-03-18 00:17:52', 'Active'),
(4, 'ARS', 'Argentina', 'Pesos', '$', '/uploads/flags/AR.png', '2023-03-18 00:17:52', 'Active'),
(3, 'AFN', 'Afghanistan', 'Afghanis', '؋', '/uploads/flags/AF.png', '2023-03-18 00:17:52', 'Active'),
(2, 'USD', 'America', 'Dollars', '$', '/uploads/flags/US.png', '2023-03-18 00:17:52', 'Active'),
(1, 'ALL', 'Albania', 'Leke', 'Lek', '/uploads/flags/Al.png', '2023-03-18 00:17:52', 'Active'),
(122, 'GBP', 'United Kingdom', 'Pounds', '£', '/uploads/flags/GB.png', '2023-03-18 00:17:52', 'Active'),
(123, 'USD', 'United States of America', 'Dollars', '$', '/uploads/flags/US.png', '2023-03-18 00:17:52', 'Active'),
(124, 'UYU', 'Uruguay', 'Pesos', '$U', '/uploads/flags/UY.png', '2023-03-18 00:17:52', 'Active'),
(125, 'UZS', 'Uzbekistan', 'Sums', 'лв', '/uploads/flags/UZ.png', '2023-03-18 00:17:52', 'Active'),
(126, 'EUR', 'Vatican City', 'Euro', '€', '/uploads/flags/VA.png', '2023-03-18 00:17:52', 'Active'),
(127, 'VEF', 'Venezuela', 'Bolivares Fuertes', 'Bs', '/uploads/flags/VE.png', '2023-03-18 00:17:52', 'Active'),
(128, 'VND', 'Vietnam', 'Dong', '₫', '/uploads/flags/VN.png', '2023-03-18 00:17:52', 'Active'),
(129, 'YER', 'Yemen', 'Rials', '﷼', '/uploads/flags/YE.png', '2023-03-18 00:17:52', 'Active'),
(130, 'ZWD', 'Zimbabwe', 'Zimbabwe Dollars', 'Z$', '/uploads/flags/ZW.png', '2023-03-18 00:17:52', 'Active'),
(131, 'INR', 'India', 'Rupees', '₹', '/uploads/flags/IN.png', '2023-03-18 00:17:52', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `system_currencies`
--

CREATE TABLE `system_currencies` (
  `system_currencies_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `symbol` varchar(5) DEFAULT NULL,
  `margin` decimal(15,2) DEFAULT 0.00,
  `admin_rate` decimal(15,2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `system_currencies`
--

INSERT INTO `system_currencies` (`system_currencies_id`, `name`, `code`, `symbol`, `margin`, `admin_rate`, `status`) VALUES
(1, 'Leke', 'ALL', 'Lek', 0.10, 95.31, 'Active'),
(2, 'Dollars', 'USD', '$', 0.10, 1.00, 'Active'),
(3, 'Afghanis', 'AFN', '؋', 0.10, 84.40, 'Active'),
(4, 'Pesos', 'ARS', '$', 0.10, 349.86, 'Active'),
(5, 'Guilders', 'AWG', 'ƒ', 0.10, 1.80, 'Active'),
(6, 'Dollars', 'AUD', '$', 0.10, 1.54, 'Active'),
(7, 'New Manats', 'AZN', 'ман', 0.10, 1.70, 'Active'),
(8, 'Dollars', 'BSD', '$', 0.10, 1.00, 'Active'),
(9, 'Dollars', 'BBD', '$', 0.10, 2.00, 'Active'),
(10, 'Rubles', 'BYR', 'p.', 0.10, 0.00, 'Active'),
(11, 'Euro', 'EUR', '€', 0.10, 0.92, 'Active'),
(12, 'Dollars', 'BZD', 'BZ$', 0.10, 2.02, 'Active'),
(13, 'Dollars', 'BMD', '$', 0.10, 1.00, 'Active'),
(14, 'Bolivianos', 'BOB', '$b', 0.10, 6.93, 'Active'),
(15, 'Convertible Marka', 'BAM', 'KM', 0.10, 1.79, 'Active'),
(16, 'Pula', 'BWP', 'P', 0.10, 13.60, 'Active'),
(17, 'Leva', 'BGN', 'лв', 0.10, 1.79, 'Active'),
(18, 'Reais', 'BRL', 'R$', 0.10, 4.96, 'Active'),
(19, 'Pounds', 'GBP', '£', 0.10, 0.79, 'Active'),
(20, 'Dollars', 'BND', '$', 0.10, 1.36, 'Active'),
(21, 'Riels', 'KHR', '៛', 0.10, 4157.79, 'Active'),
(22, 'Dollars', 'CAD', '$', 0.10, 1.35, 'Active'),
(23, 'Dollars', 'KYD', '$', 0.10, 0.84, 'Active'),
(24, 'Pesos', 'CLP', '$', 0.10, 859.89, 'Active'),
(25, 'Yuan Renminbi', 'CNY', '¥', 0.10, 7.23, 'Active'),
(26, 'Pesos', 'COP', '$', 0.10, 3975.75, 'Active'),
(27, 'Colón', 'CRC', '₡', 0.10, 536.88, 'Active'),
(28, 'Kuna', 'HRK', 'kn', 0.10, 6.91, 'Active'),
(29, 'Pesos', 'CUP', '₱', 0.10, 25.75, 'Active'),
(30, 'Koruny', 'CZK', 'Kč', 0.10, 22.05, 'Active'),
(31, 'Kroner', 'DKK', 'kr', 0.10, 6.83, 'Active'),
(32, 'Pesos', 'DOP', 'RD$', 0.10, 57.06, 'Active'),
(33, 'Dollars', 'XCD', '$', 0.10, 2.70, 'Active'),
(34, 'Pounds', 'EGP', '£', 0.10, 30.89, 'Active'),
(35, 'Colones', 'SVC', '$', 0.10, 8.78, 'Active'),
(36, 'Pounds', 'FKP', '£', 0.10, 0.79, 'Active'),
(37, 'Dollars', 'FJD', '$', 0.10, 2.26, 'Active'),
(38, 'Cedis', 'GHC', '¢', 0.10, 0.00, 'Active'),
(39, 'Pounds', 'GIP', '£', 0.10, 0.79, 'Active'),
(40, 'Quetzales', 'GTQ', 'Q', 0.10, 7.88, 'Active'),
(41, 'Pounds', 'GGP', '£', 0.10, 0.79, 'Active'),
(42, 'Dollars', 'GYD', '$', 0.10, 209.89, 'Active'),
(43, 'Lempiras', 'HNL', 'L', 0.10, 24.68, 'Active'),
(44, 'Dollars', 'HKD', '$', 0.10, 7.82, 'Active'),
(45, 'Forint', 'HUF', 'Ft', 0.10, 352.27, 'Active'),
(46, 'Kronur', 'ISK', 'kr', 0.10, 132.06, 'Active'),
(47, 'Rupees', 'INR', 'Rp', 0.10, 83.25, 'Active'),
(48, 'Rupiahs', 'IDR', 'Rp', 0.10, 15343.95, 'Active'),
(49, 'Rials', 'IRR', '﷼', 0.10, 42291.89, 'Active'),
(50, 'Pounds', 'IMP', '£', 0.10, 0.79, 'Active'),
(51, 'New Shekels', 'ILS', '₪', 0.10, 3.75, 'Active'),
(52, 'Dollars', 'JMD', 'J$', 0.10, 154.95, 'Active'),
(53, 'Yen', 'JPY', '¥', 0.10, 145.44, 'Active'),
(54, 'Pounds', 'JEP', '£', 0.10, 0.79, 'Active'),
(55, 'Tenge', 'KZT', 'лв', 0.10, 451.55, 'Active'),
(56, 'Won', 'KPW', '₩', 0.10, 899.83, 'Active'),
(57, 'Won', 'KRW', '₩', 0.10, 1336.39, 'Active'),
(58, 'Soms', 'KGS', 'лв', 0.10, 88.25, 'Active'),
(59, 'Kips', 'LAK', '₭', 0.10, 19519.41, 'Active'),
(60, 'Lati', 'LVL', 'Ls', 0.10, 0.00, 'Active'),
(61, 'Pounds', 'LBP', '£', 0.10, 15058.90, 'Active'),
(62, 'Dollars', 'LRD', '$', 0.10, 186.21, 'Active'),
(63, 'Switzerland Francs', 'CHF', 'CHF', 0.10, 0.88, 'Active'),
(64, 'Litai', 'LTL', 'Lt', 0.10, 0.00, 'Active'),
(65, 'Denars', 'MKD', 'ден', 0.10, 56.48, 'Active'),
(66, 'Ringgits', 'MYR', 'RM', 0.10, 4.63, 'Active'),
(67, 'Rupees', 'MUR', '₨', 0.10, 45.29, 'Active'),
(68, 'Pesos', 'MXN', '$', 0.10, 17.06, 'Active'),
(69, 'Tugriks', 'MNT', '₮', 0.10, 3449.34, 'Active'),
(70, 'Meticais', 'MZN', 'MT', 0.10, 63.86, 'Active'),
(71, 'Dollars', 'NAD', '$', 0.10, 19.83, 'Active'),
(72, 'Rupees', 'NPR', '₨', 0.10, 133.15, 'Active'),
(73, 'Guilders', 'ANG', 'ƒ', 0.10, 1.81, 'Active'),
(74, 'Dollars', 'NZD', '$', 0.10, 1.67, 'Active'),
(75, 'Cordobas', 'NIO', 'C$', 0.10, 36.70, 'Active'),
(76, 'Nairas', 'NGN', '₦', 0.10, 771.71, 'Active'),
(77, 'Krone', 'NOK', 'kr', 0.10, 10.46, 'Active'),
(78, 'Rials', 'OMR', '﷼', 0.10, 0.39, 'Active'),
(79, 'Rupees', 'PKR', '₨', 0.10, 285.67, 'Active'),
(80, 'Balboa', 'PAB', 'B/.', 0.10, 1.00, 'Active'),
(81, 'Guarani', 'PYG', 'Gs', 0.10, 7288.98, 'Active'),
(82, 'Nuevos Soles', 'PEN', 'S/.', 0.10, 3.70, 'Active'),
(83, 'Pesos', 'PHP', 'Php', 0.10, 56.79, 'Active'),
(84, 'Zlotych', 'PLN', 'zł', 0.10, 4.08, 'Active'),
(85, 'Rials', 'QAR', '﷼', 0.10, 3.66, 'Active'),
(86, 'New Lei', 'RON', 'lei', 0.10, 4.53, 'Active'),
(87, 'Rubles', 'RUB', 'руб', 0.10, 96.39, 'Active'),
(88, 'Pounds', 'SHP', '£', 0.10, 0.79, 'Active'),
(89, 'Riyals', 'SAR', '﷼', 0.10, 3.75, 'Active'),
(90, 'Dinars', 'RSD', 'Дин.', 0.10, 107.49, 'Active'),
(91, 'Rupees', 'SCR', '₨', 0.10, 13.29, 'Active'),
(92, 'Dollars', 'SGD', '$', 0.10, 1.36, 'Active'),
(93, 'Dollars', 'SBD', '$', 0.10, 8.37, 'Active'),
(94, 'Shillings', 'SOS', 'S', 0.10, 571.34, 'Active'),
(95, 'Rand', 'ZAR', 'R', 0.10, 19.06, 'Active'),
(96, 'Rupees', 'LKR', '₨', 0.10, 323.03, 'Active'),
(97, 'Kronor', 'SEK', 'kr', 0.10, 10.78, 'Active'),
(98, 'Dollars', 'SRD', '$', 0.10, 38.25, 'Active'),
(99, 'Pounds', 'SYP', '£', 0.10, 2512.05, 'Active'),
(100, 'New Dollars', 'TWD', 'NT$', 0.10, 31.92, 'Active'),
(101, 'Baht', 'THB', '฿', 0.10, 35.31, 'Active'),
(102, 'Dollars', 'TTD', 'TT$', 0.10, 6.81, 'Active'),
(103, 'Lira', 'TRY', '₺', 0.10, 27.05, 'Active'),
(104, 'Liras', 'TRL', '£', 0.10, 0.00, 'Active'),
(105, 'Dollars', 'TVD', '$', 0.10, 0.00, 'Active'),
(106, 'Hryvnia', 'UAH', '₴', 0.10, 37.05, 'Active'),
(107, 'Pesos', 'UYU', '$U', 0.10, 37.90, 'Active'),
(108, 'Sums', 'UZS', 'лв', 0.10, 12101.38, 'Active'),
(109, 'Bolivares Fuertes', 'VEF', 'Bs', 0.10, 0.00, 'Active'),
(110, 'Dong', 'VND', '₫', 0.10, 23867.47, 'Active'),
(111, 'Rials', 'YER', '﷼', 0.10, 250.30, 'Active'),
(112, 'Zimbabwe Dollars', 'ZWD', 'Z$', 0.10, 0.00, 'Active'),
(113, 'Rupees', 'INR', '₹', 0.10, 83.25, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `system_settings_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`system_settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Swap Circle'),
(2, 'email', 'support@swapcircle.com'),
(3, 'phone', '1234567890'),
(4, 'language', 'english'),
(5, 'address', 'ABCD'),
(6, 'system_image', 'system_image.png'),
(7, 'smtp_host', 'localhost'),
(8, 'smtp_port', '21'),
(9, 'smtp_username', 'no-reply@swapcircle.com'),
(10, 'smtp_password', 'admin'),
(11, 'geo_api_key', 'AIzaSyC4HqZf-zANxtQqW0riYOrRKdrXvzMqCqM'),
(12, 'system_currencies_id', '2'),
(13, 'onesignal_appId', '60c86bbb-36cd-406a-b336-2a88bbd68402'),
(14, 'one_signal_server_key', 'AAAATnqWTbw:APA91bE_DZqQwnLOgZwu6RTI8wrqKy0lZey11jzQT-lTtAn0Wa3PFQGfHf5U6GGVJjeOaWBz9KdoNGDNI0EE9M4OiwkppBSwpGjELEfBwowJFt1kwfiwRxaXskMaqt2ob9poF7cFItXL'),
(15, 'one_signal_sender_id', '337064119740'),
(16, 'social_login', 'Yes'),
(17, 'invite_text', 'Invite \r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.\r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.'),
(18, 'terms_text', 'Terms \r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.\r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.'),
(19, 'about_text', 'About us \r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.\r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.'),
(20, 'privacy_text', 'Privacy \r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.\r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.'),
(21, 'admin_share', '10'),
(22, 'swap_offer_expire', '7'),
(25, 'transfer_instructions', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.');

-- --------------------------------------------------------

--
-- Table structure for table `users_customers`
--

CREATE TABLE `users_customers` (
  `users_customers_id` int(11) NOT NULL,
  `one_signal_id` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_number` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_customers_type` enum('Individual','Company') NOT NULL,
  `company_name` text DEFAULT NULL,
  `first_name` text NOT NULL,
  `last_name` text DEFAULT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `location` text DEFAULT NULL,
  `valid_document` text DEFAULT NULL,
  `id_front_image` text DEFAULT NULL,
  `id_back_image` text DEFAULT NULL,
  `profile_pic` text DEFAULT NULL,
  `notifications` enum('Yes','No') NOT NULL,
  `account_type` enum('SignupWithApp','SignupWithSocial','Both') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `social_acc_type` enum('Google','Facebook','None') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `verified_badge` enum('Yes','No') NOT NULL DEFAULT 'No',
  `google_access_token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `refer_code` int(11) NOT NULL DEFAULT 0,
  `last_activity` datetime NOT NULL,
  `activity_interval` int(11) NOT NULL DEFAULT 1,
  `verify_code` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_expiry` date DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Active','Inactive','Deleted') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_customers`
--

INSERT INTO `users_customers` (`users_customers_id`, `one_signal_id`, `id_number`, `users_customers_type`, `company_name`, `first_name`, `last_name`, `phone`, `email`, `password`, `location`, `valid_document`, `id_front_image`, `id_back_image`, `profile_pic`, `notifications`, `account_type`, `social_acc_type`, `verified_badge`, `google_access_token`, `refer_code`, `last_activity`, `activity_interval`, `verify_code`, `date_expiry`, `date_added`, `status`) VALUES
(1, '123456', NULL, 'Company', 'test Company', 'Salman Ahmad', 'Bhatti', '03008637767', 'salmanbhatti52@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'my location', 'uploads/users_documents/1681206045.jpeg', NULL, NULL, 'uploads/users_customers/1679313885.jpeg', 'Yes', 'SignupWithApp', 'None', 'Yes', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-01 19:42:07', 'Active'),
(2, '123456', NULL, 'Company', 'test Company', 'Salman Ahmad', NULL, '03008637767', 'salmanbhatti521@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'multan', 'uploads/users_documents/1677664412.jpeg', NULL, NULL, 'uploads/users_customers/1677664412.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-01 19:53:32', 'Pending'),
(3, '123456', NULL, 'Company', 'test Company', 'Salman Ahmad', NULL, '03008637767', 'salmanbhatti52@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'multan', 'uploads/users_documents/1677664490.jpeg', NULL, NULL, 'uploads/users_customers/1677664490.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, '7997', NULL, '2023-03-01 19:54:50', 'Pending'),
(4, '123456', NULL, 'Company', 'teck solution', 'Syed', NULL, '03008637767', 'syedali@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'multan', 'uploads/users_documents/1677665179.jpeg', NULL, NULL, 'uploads/users_customers/1677665179.jpeg', 'Yes', 'SignupWithApp', 'None', 'Yes', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-01 20:06:19', 'Active'),
(5, '123456', NULL, 'Company', 'AJ Vortex', 'coders', NULL, '0300033202', 'vortex@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', 'multan', 'uploads/users_documents/1677665379.jpeg', NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'Yes', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-01 20:09:39', 'Active'),
(6, '123456', NULL, 'Individual', NULL, 'Akmal', 'Khan', '15649797', 'Akmal@gmail.com', '870fc02d6bf1e2b61ac6bc181fb924b3', 'Shalimar', 'uploads/users_documents/1677667094.jpeg', NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'Yes', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-01 20:38:14', 'Active'),
(7, '123', NULL, 'Individual', NULL, 'Jide', 'Olanlokun', '123456789000', 'jideolanlokun@gmail.com', '06023f7213de02b16c93944f1eef6acf', '23 Halcrow Ave', NULL, NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'Yes', '', 0, '2023-09-02 13:08:21', 5, NULL, NULL, '2023-03-06 22:32:21', 'Active'),
(8, '123456', NULL, 'Company', 'Techxperience', 'Dax', NULL, '08162451324', 'bruno.ezemba@techxperience.ng', '580e1a90bb38fdc8312bab7e62993d44', '6 ikoyi club road, ikoyi', 'uploads/users_documents/1678267066.jpeg', NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-08 19:17:46', 'Pending'),
(9, '123456', NULL, 'Individual', NULL, 'Bruno', 'Ezemba', '08162451324', 'brunoaugustine2@gmail.com', '580e1a90bb38fdc8312bab7e62993d44', '6 ikoyi club', 'uploads/users_documents/1678267341.jpeg', NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-08 19:22:21', 'Pending'),
(10, '123456', NULL, 'Individual', NULL, 'Datti', 'Obi', '+2348162451324', 'obidatti@gmail.com', 'bd454e854a5bc32f07be4d7caa2ef553', '6 ikoyi club', NULL, NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-08 19:29:01', 'Pending'),
(11, '123456', NULL, 'Individual', NULL, 'Name', 'Surna', '08162451324', 'name@email.com', '580e1a90bb38fdc8312bab7e62993d44', 'Address', NULL, NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-08 20:24:19', 'Pending'),
(12, '123456', NULL, 'Individual', NULL, 'dasd', 'dsa', '65645645654', 'salmanbhatti5211@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', 'mux', 'uploads/users_documents/1678357239.jpeg', NULL, NULL, 'uploads/users_customers/1678426648.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-09 20:20:39', 'Active'),
(13, '123456', NULL, 'Individual', NULL, 'Salman Ahmad', 'Bhatti', '03008637767', 'salmanbhatti5211@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'multan', 'uploads/users_documents/1678424487.jpeg', NULL, NULL, 'uploads/users_customers/1678424487.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, NULL, '2023-03-10 15:01:27', 'Pending'),
(14, '123', NULL, 'Individual', NULL, 'najam', 'khan', '46465465465', 'najam@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', NULL, 'uploads/users_documents/1683786934.jpeg', NULL, NULL, 'uploads/users_customers/1692274018.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '2023-09-04 14:38:37', 1, NULL, NULL, '2023-03-10 15:49:47', 'Active'),
(15, NULL, NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'aqsariaz378@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678687451.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, '3497', '2023-03-30', '2023-03-13 15:04:11', 'Pending'),
(16, '123', NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'bscs-17-15@outlook.com', '03d476861afd384510f2cb80ccfa8511', '2843 Thornridge Cir. Syran', NULL, NULL, NULL, 'uploads/users_customers/1678688212.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-04-28', '2023-03-13 15:16:52', 'Active'),
(17, '123', '424324', 'Individual', NULL, 'najam', 'khan', '3214324324', 'najamkhan@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', NULL, NULL, 'uploads/users_id_front_image/1678691641.jpeg', 'uploads/users_id_back_image/1678691641.jpeg', 'uploads/users_customers/1684305989.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '2023-08-15 10:40:23', 1, NULL, '2023-03-30', '2023-03-13 16:14:01', 'Active'),
(46, '123', '3645658595990', 'Individual', NULL, 'Muhammad Ahmad', 'Riaz', '03069756905', 'aqsariaz@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Multan', NULL, 'uploads/users_id_front_image/1680081406.jpeg', 'uploads/users_id_back_image/1680081406.jpeg', 'uploads/users_customers/1681371352.jpeg', 'No', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-06-14', '2023-03-29 18:16:46', 'Active'),
(18, '123', '233232', 'Individual', NULL, 'ali', 'khan', '3366255546', 'ali@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', NULL, NULL, 'uploads/users_id_front_image/1678792780.jpeg', 'uploads/users_id_back_image/1678792780.jpeg', 'uploads/users_customers/1686124522.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '2023-09-04 09:38:58', 1, NULL, '2023-03-31', '2023-03-14 20:19:40', 'Active'),
(19, NULL, NULL, 'Company', 'Abstergo Ltd.', 'Ayesha Ali Khan', NULL, '03069756905', 'tehreem.hashmi007@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678878096.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-25', '2023-03-15 20:01:36', 'Active'),
(20, '123456', '123456', 'Company', 'test Company', 'Muhammad Ahmad', NULL, '03008637767', 'ahmad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'multan', 'uploads/users_documents/1678949659.jpeg', 'uploads/users_id_front_image/1678949659.jpeg', 'uploads/users_id_back_image/1678949659.jpeg', 'uploads/users_customers/1678949659.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-12-23', '2023-03-16 15:54:19', 'Active'),
(21, NULL, NULL, 'Individual', NULL, 'Ayesha', 'Kahn', '03069756905', 'xyz@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678951007.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-06-21', '2023-03-16 16:16:47', 'Active'),
(22, NULL, NULL, 'Individual', NULL, 'Ayesha', 'Khan', '03069756905', 'ppp@yahoo.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678951362.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, '1005', '2023-03-31', '2023-03-16 16:22:42', 'Active'),
(23, NULL, NULL, 'Individual', NULL, 'Amara', 'Jabbar', '03069756905', 'amara@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678953253.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-06-23', '2023-03-16 16:54:13', 'Active'),
(24, NULL, NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'x@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678954361.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-16 17:12:41', 'Active'),
(25, NULL, NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'x@outlook.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678956626.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-16 17:50:26', 'Active'),
(26, NULL, NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'xy@outlook.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678956644.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-16 17:50:44', 'Active'),
(27, NULL, NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'zyx@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Multan', NULL, NULL, NULL, 'uploads/users_customers/1678960382.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-16 18:53:02', 'Active'),
(28, NULL, NULL, 'Individual', NULL, 'xyz', 'xyz', '03965473654', 'xyzz@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Location', NULL, NULL, NULL, 'uploads/users_customers/1678961317.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-08-31', '2023-03-16 19:08:37', 'Active'),
(29, NULL, NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'aqsa@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1678961761.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-30', '2023-03-16 19:16:01', 'Active'),
(30, NULL, NULL, 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'xz@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1679033938.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-17 15:18:58', 'Active'),
(31, NULL, NULL, 'Individual', NULL, 'Muhammad Ahmad', 'Riaz', '03069756905', 'm.ahmadriaz@outlook.com', '25d55ad283aa400af464c76d713c07ad', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1679034300.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-17 15:25:00', 'Active'),
(32, NULL, NULL, 'Individual', NULL, 'Muhammad Ahmad', 'Riaz', '03069756905', 'm.ahmattdriaz@outlook.com', '25d55ad283aa400af464c76d713c07ad', 'Shalimar Colony, Multan', NULL, NULL, NULL, 'uploads/users_customers/1679034618.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-17 15:30:18', 'Active'),
(33, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'shahidza619@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Multan', NULL, 'uploads/users_id_front_image/1679036144.jpeg', 'uploads/users_id_back_image/1679036144.jpeg', 'uploads/users_customers/1679036144.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-30', '2023-03-17 15:55:44', 'Active'),
(34, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'shahidza69@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Multan', NULL, 'uploads/users_id_front_image/1679036427.jpeg', 'uploads/users_id_back_image/1679036427.jpeg', 'uploads/users_customers/1679036427.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-29', '2023-03-17 16:00:27', 'Active'),
(35, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'shahidza@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'lahore', NULL, 'uploads/users_id_front_image/1679036965.jpeg', 'uploads/users_id_back_image/1679036965.jpeg', 'uploads/users_customers/1679036965.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-30', '2023-03-17 16:09:25', 'Active'),
(36, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'shahida@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'lahore', NULL, 'uploads/users_id_front_image/1679037505.jpeg', 'uploads/users_id_back_image/1679037505.jpeg', 'uploads/users_customers/1679037505.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-30', '2023-03-17 16:18:25', 'Active'),
(37, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'shahia@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'lahore', NULL, 'uploads/users_id_front_image/1679037852.jpeg', 'uploads/users_id_back_image/1679037852.jpeg', 'uploads/users_customers/1679037852.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-30', '2023-03-17 16:24:12', 'Active'),
(38, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'shasshia@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'lahore', NULL, 'uploads/users_id_front_image/1679037948.jpeg', 'uploads/users_id_back_image/1679037948.jpeg', 'uploads/users_customers/1679037948.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-30', '2023-03-17 16:25:48', 'Active'),
(39, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'shass34hia@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'lahore', NULL, 'uploads/users_id_front_image/1679038194.jpeg', 'uploads/users_id_back_image/1679038194.jpeg', 'uploads/users_customers/1679038194.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-30', '2023-03-17 16:29:54', 'Active'),
(40, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'sha23hidza619@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Multan', NULL, 'uploads/users_id_front_image/1679038309.jpeg', 'uploads/users_id_back_image/1679038309.jpeg', 'uploads/users_customers/1679038309.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-29', '2023-03-17 16:31:49', 'Active'),
(41, NULL, '1343456', 'Individual', NULL, 'Shahid', 'Zafar', '03047839979', 'sha1234hidza619@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'first description ds', NULL, 'uploads/users_id_front_image/1679038548.jpeg', 'uploads/users_id_back_image/1679038548.jpeg', 'uploads/users_customers/1679038548.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-17 16:35:48', 'Active'),
(42, NULL, '3630564753678', 'Individual', NULL, 'Aqsa', 'Riaz', '03069756905', 'ai12@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony, Multan', NULL, 'uploads/users_id_front_image/1679046323.jpeg', 'uploads/users_id_back_image/1679046323.jpeg', 'uploads/users_customers/1679046323.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-06-16', '2023-03-17 18:45:23', 'Active'),
(43, '123456', '123456', 'Individual', NULL, 'Salman Ahmad', 'Bhatti', '03008637767', 'salmanbhatti@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'multan', 'uploads/users_documents/1679119425.jpeg', 'uploads/users_id_front_image/1679119425.jpeg', 'uploads/users_id_back_image/1679119425.jpeg', 'uploads/users_customers/1679119425.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-12-23', '2023-03-18 15:03:45', 'Active'),
(44, '123', '123456', 'Individual', NULL, 'ali', 'senior', '3366277746', 'alisenior@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', 'mux', NULL, 'uploads/users_id_front_image/1679509662.jpeg', 'uploads/users_id_back_image/1679509662.jpeg', 'uploads/users_customers/1679509662.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-24', '2023-03-23 03:27:42', 'Active'),
(45, '123456', '13213', 'Company', 'AjVortex', 'AJ', NULL, '3366255546', 'aj@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', 'mux', NULL, 'uploads/users_id_front_image/1679510395.jpeg', 'uploads/users_id_back_image/1679510395.jpeg', 'uploads/users_customers/1679510395.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-23', '2023-03-23 03:39:55', 'Active'),
(47, NULL, '2', 'Individual', NULL, 'akaml', 'sangi', '3366255546', 'akmal143@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', 'nmux', NULL, 'uploads/users_id_front_image/1680159073.jpeg', 'uploads/users_id_back_image/1680159073.jpeg', 'uploads/users_customers/1680159073.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-03-31', '2023-03-30 15:51:13', 'Active'),
(48, '123', 'Qhahshshh', 'Individual', NULL, 'Mughees', 'Malik', '3017484867', 'mugheesmalik101@gmail.com', 'c0a18c5a5a29a31a6ba178f430c24a2a', 'Shalimar multan', NULL, NULL, NULL, NULL, 'Yes', 'SignupWithApp', 'None', 'Yes', '', 0, '2023-07-07 16:15:45', 1, NULL, '2023-04-29', '2023-03-31 15:12:30', 'Active'),
(49, '123', 'B50034259', 'Individual', NULL, 'Akintoye', 'Akindele', '07932349755', 'toyeakindele@gmail.com', '1ea665b1085cf9c07bde9858654d34cd', 'Flat 40 Treetops 9-11 St. Stephen\'s Road, BH2 6DQ Bournemouth', NULL, 'uploads/users_id_front_image/1681298238.jpeg', 'uploads/users_id_back_image/1681298238.jpeg', 'uploads/users_customers/1681298238.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '2023-09-03 15:35:22', 1, NULL, '2030-09-07', '2023-04-12 20:17:18', 'Active'),
(50, '123', '3638765432678', 'Individual', NULL, 'Ahmad', 'Riaz', '03069756905', 'm.ahmad@gmail.com', '03d476861afd384510f2cb80ccfa8511', 'Shalimar Colony', NULL, 'uploads/users_id_front_image/1682492277.jpeg', 'uploads/users_id_back_image/1682492277.jpeg', 'uploads/users_customers/1682492277.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-04-29', '2023-04-26 15:57:57', 'Active'),
(51, NULL, '3675864538956', 'Individual', NULL, 'Amara', 'Khan', '04076538678', 'test@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Location', NULL, 'uploads/users_id_front_image/1683182564.jpeg', 'uploads/users_id_back_image/1683182564.jpeg', 'uploads/users_customers/1683184387.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-09-28', '2023-05-04 15:42:44', 'Active'),
(52, '123', 'Anna singer', 'Individual', NULL, 'Mughees', 'Mugi', '2164976479', 'annasinger444@gmail.com', 'e71bc326d72fa7080fc36fd1687ae44c', 'Shalimar multan', NULL, 'uploads/users_id_front_image/1683193164.jpeg', 'uploads/users_id_back_image/1683193164.jpeg', 'uploads/users_customers/1683193164.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-05-31', '2023-05-04 18:39:24', 'Active'),
(53, '123', 'Flockdock', 'Individual', NULL, 'Flock', 'dock', '2134879514', 'flockdockk@gmail.com', '189d0528f35a9b866c3ef1a3dcfcbf5c', 'Karachi pakistan', NULL, 'uploads/users_id_front_image/1683194144.jpeg', 'uploads/users_id_back_image/1683194144.jpeg', 'uploads/users_customers/1683194144.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-06-08', '2023-05-04 18:55:44', 'Active'),
(54, '123', '123', 'Individual', NULL, 'Ali', 'Khan', '3303244415', 'alikhan@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', 'Multan', NULL, 'uploads/users_id_front_image/1684921001.jpeg', 'uploads/users_id_back_image/1684921001.jpeg', 'uploads/users_customers/1685783951.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '0000-00-00 00:00:00', 1, NULL, '2023-11-30', '2023-05-24 18:36:41', 'Active'),
(55, '123', '123456', 'Individual', NULL, 'daud', 'khan', '3366255546', 'daud@gmail.com', 'fe0315cd7cad4a5fd7de8d5ecf960012', 'multan', NULL, 'uploads/users_id_front_image/1688360844.jpeg', 'uploads/users_id_back_image/1688360844.jpeg', NULL, 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '2023-07-05 17:16:20', 1, NULL, '2023-07-29', '2023-07-03 14:07:24', 'Active'),
(56, '123', '333333333', 'Individual', NULL, 'saqib', 'javed', '8988898', 'saqibmahay@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'jkjkjk jjjkjk jkjkkj', NULL, 'uploads/users_id_front_image/1689411189.jpeg', 'uploads/users_id_back_image/1689411189.jpeg', 'uploads/users_customers/1689411189.jpeg', 'Yes', 'SignupWithApp', 'None', 'No', '', 0, '2023-08-31 15:36:29', 1, '3003', '2023-07-25', '2023-07-15 17:53:09', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users_customers_accounts`
--

CREATE TABLE `users_customers_accounts` (
  `users_customers_accounts_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `system_currencies_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `bank_name` text NOT NULL,
  `branch_code` text NOT NULL,
  `account_no` int(11) NOT NULL,
  `iban` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Pending','Deleted') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_customers_accounts`
--

INSERT INTO `users_customers_accounts` (`users_customers_accounts_id`, `users_customers_id`, `system_currencies_id`, `full_name`, `bank_name`, `branch_code`, `account_no`, `iban`, `date_added`, `status`) VALUES
(1, 14, 2, 'shahid', '', '', 0, 'GB12ABCD10203012345678', '2023-05-11 06:20:53', 'Active'),
(2, 14, 2, 'najam', '', '', 0, 'GB12ABCD1020303123123', '2023-05-11 08:03:24', 'Active'),
(3, 14, 3, 'ARH', '', '', 0, 'GB12ABCD10203012345678', '2023-05-11 08:19:08', 'Active'),
(4, 14, 17, 'Aqsa Riaz', '', '', 0, 'GB12ABCD10203012345214', '2023-05-11 08:48:02', 'Active'),
(5, 18, 79, 'Najama', '', '', 0, 'Hshshshsjsnb', '2023-05-18 01:04:32', 'Active'),
(6, 18, 6, 'Najamkhan', '', '', 0, 'Eeerrcfcf7171726nanana', '2023-05-18 01:09:48', 'Active'),
(7, 52, 74, 'Mugheee', '', '', 0, '1627368484839478', '2023-05-18 01:10:10', 'Active'),
(8, 14, 11, 'ARB', '', '', 0, 'GB12ABCD10203012345645', '2023-05-22 06:46:28', 'Active'),
(9, 14, 2, 'najam khan', '', '', 0, 'dasdasdsad', '2023-08-09 02:39:13', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users_customers_delete`
--

CREATE TABLE `users_customers_delete` (
  `users_customers_delete_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `delete_reason` text NOT NULL,
  `comments` text NOT NULL,
  `date_added` datetime NOT NULL,
  `status` enum('Pending','Approved','Declined') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_customers_delete`
--

INSERT INTO `users_customers_delete` (`users_customers_delete_id`, `email`, `delete_reason`, `comments`, `date_added`, `status`) VALUES
(1, 'salmanbhatti52@gmail.com', 'test delete', 'Hello', '2023-03-10 13:01:37', 'Pending'),
(2, 'najamkhan@gmail.com', 'dasdas', 'ddasdasd', '2023-05-17 11:29:15', 'Pending'),
(3, 'annasinger444@gmail.com', 'Vzbzbshsh', 'gsshsh', '2023-05-18 10:09:23', 'Pending'),
(4, 'm.ahmad@gmail.com', 'test delete', 'Hello', '2023-05-22 16:02:10', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users_customers_txns`
--

CREATE TABLE `users_customers_txns` (
  `users_customers_txns_id` int(11) NOT NULL,
  `from_users_customers_id` int(11) NOT NULL,
  `from_system_currencies_id` int(11) NOT NULL,
  `from_amount` decimal(15,2) NOT NULL,
  `to_users_customers_id` int(11) NOT NULL,
  `to_system_currencies_id` int(11) NOT NULL,
  `to_amount` decimal(15,2) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `admin_share` decimal(15,2) NOT NULL,
  `admin_share_amount` decimal(15,2) NOT NULL,
  `system_countries_id` int(11) NOT NULL,
  `system_currencies_id` int(11) NOT NULL,
  `base_amount` decimal(15,2) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected','Cancelled','Deleted','Deffered','Dropped','Reversed','Cancelled And Reversed','Refund') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_customers_txns`
--

INSERT INTO `users_customers_txns` (`users_customers_txns_id`, `from_users_customers_id`, `from_system_currencies_id`, `from_amount`, `to_users_customers_id`, `to_system_currencies_id`, `to_amount`, `payment_method_id`, `admin_share`, `admin_share_amount`, `system_countries_id`, `system_currencies_id`, `base_amount`, `date_added`, `date_modified`, `status`) VALUES
(1, 1, 47, 100.00, 18, 79, 343.97, 1, 10.00, 0.00, 90, 2, 1.22, '2023-03-27 05:00:19', NULL, 'Pending'),
(2, 1, 47, 100.00, 18, 79, 343.97, 1, 10.00, 0.00, 90, 2, 1.22, '2023-03-27 05:51:17', NULL, 'Pending'),
(3, 1, 47, 100.00, 18, 79, 343.97, 1, 10.00, 0.00, 90, 2, 1.22, '2023-03-27 06:02:12', NULL, 'Pending'),
(4, 1, 47, 100.00, 18, 79, 343.97, 1, 10.00, 0.00, 90, 2, 1.22, '2023-03-27 06:20:05', NULL, 'Pending'),
(5, 1, 47, 100.00, 1, 79, 343.97, 1, 10.00, 0.00, 90, 2, 1.22, '2023-03-27 06:26:45', NULL, 'Pending'),
(6, 1, 47, 100.00, 1, 79, 343.97, 1, 10.00, 0.00, 90, 2, 1.22, '2023-03-27 06:27:17', NULL, 'Pending'),
(7, 14, 2, 25.00, 48, 20, 30.73, 1, 10.00, 0.00, 90, 2, 25.00, '2023-03-31 02:29:36', NULL, 'Pending'),
(8, 14, 2, 25.00, 48, 20, 30.73, 1, 10.00, 0.00, 90, 2, 25.00, '2023-03-31 02:30:26', NULL, 'Pending'),
(9, 14, 2, 1.00, 18, 79, 283.50, 1, 10.00, 0.00, 131, 2, 1.00, '2023-03-31 03:59:32', NULL, 'Pending'),
(10, 14, 2, 1.00, 18, 79, 283.50, 1, 10.00, 0.00, 131, 2, 1.00, '2023-03-31 04:00:59', NULL, 'Pending'),
(11, 14, 74, 10.00, 18, 11, 4.77, 1, 10.00, 0.00, 90, 2, 6.22, '2023-04-03 02:49:50', NULL, 'Pending'),
(12, 18, 79, 500.00, 14, 35, -34.59, 1, 10.00, 0.00, 4, 2, 1.77, '2023-04-03 03:21:44', NULL, 'Pending'),
(13, 18, 74, 5.00, 14, 109, -0.50, 1, 10.00, 0.00, 90, 2, 3.11, '2023-04-03 03:30:25', NULL, 'Pending'),
(14, 18, 79, 0.00, 1, 2, 0.00, 1, 10.00, 0.00, 2, 2, 0.00, '2023-04-05 01:19:30', NULL, 'Pending'),
(15, 18, 79, 5.00, 17, 101, 0.09, 1, 10.00, 0.00, 3, 2, 0.02, '2023-04-07 05:56:39', NULL, 'Rejected'),
(16, 14, 2, 10.00, 17, 11, 8.04, 1, 10.00, 0.00, 3, 2, 10.00, '2023-04-27 02:33:10', NULL, 'Pending'),
(17, 14, 2, 10.00, 17, 11, 8.04, 1, 10.00, 0.00, 3, 2, 10.00, '2023-04-27 02:33:19', NULL, 'Pending'),
(18, 14, 2, 10.00, 17, 11, 8.04, 1, 10.00, 0.00, 112, 2, 10.00, '2023-04-27 02:34:41', NULL, 'Pending'),
(19, 14, 2, 10.00, 18, 3, 867.13, 1, 10.00, 0.00, 2, 2, 10.00, '2023-05-04 04:05:22', NULL, 'Pending'),
(20, 14, 11, 250.00, 18, 113, 22611.00, 1, 10.00, 0.00, 3, 2, 277.18, '2023-05-04 04:23:57', NULL, 'Pending'),
(21, 52, 19, 1500.00, 53, 22, 2412.76, 1, 10.00, 0.00, 4, 2, 1886.69, '2023-05-04 05:56:43', NULL, 'Pending'),
(22, 14, 11, 5.00, 17, 2, 5.02, 1, 10.00, 0.00, 112, 2, 5.52, '2023-05-08 07:08:01', NULL, 'Pending'),
(23, 14, 11, 5.00, 17, 2, 5.02, 1, 10.00, 0.00, 112, 2, 5.52, '2023-05-08 07:08:11', NULL, 'Pending'),
(24, 18, 79, 50.00, 1, 35, 1.33, 1, 10.00, 0.02, 2, 2, 0.17, '2023-05-13 03:34:12', NULL, 'Pending'),
(25, 18, 47, 500.00, 14, 79, 1558.33, 1, 10.00, 0.61, 90, 2, 6.08, '2023-05-16 07:40:54', NULL, 'Pending'),
(26, 18, 47, 500.00, 14, 79, 1558.33, 1, 10.00, 0.61, 90, 2, 6.08, '2023-05-16 07:44:31', NULL, 'Pending'),
(27, 18, 6, 10.00, 14, 113, 492.95, 1, 10.00, 0.66, 2, 2, 6.65, '2023-05-18 01:19:42', NULL, 'Pending'),
(28, 18, 6, 50.00, 14, 2, 29.91, 1, 10.00, 3.32, 3, 2, 33.23, '2023-05-18 03:37:37', NULL, 'Pending'),
(29, 18, 6, 500.00, 14, 113, 24767.43, 1, 10.00, 33.25, 103, 2, 332.51, '2023-05-20 03:03:58', NULL, 'Pending'),
(30, 18, 47, 50.00, 14, 6, 0.82, 1, 10.00, 0.06, 2, 2, 0.60, '2023-05-20 03:08:19', NULL, 'Pending'),
(31, 18, 113, 50.00, 14, 2, 0.54, 1, 10.00, 0.06, 4, 2, 0.60, '2023-05-20 03:09:46', NULL, 'Pending'),
(32, 14, 79, 10.00, 17, 6, 0.05, 1, 10.00, 0.00, 119, 2, 0.04, '2023-05-22 05:37:27', NULL, 'Pending'),
(33, 14, 79, 10.00, 17, 6, 0.05, 1, 10.00, 0.00, 118, 2, 0.04, '2023-05-22 05:38:16', NULL, 'Pending'),
(34, 14, 79, 10.00, 17, 80, 0.03, 1, 10.00, 0.00, 5, 2, 0.04, '2023-05-22 05:40:44', NULL, 'Pending'),
(35, 18, 6, 200.55, 14, 79, 34412.62, 1, 10.00, 13.34, 2, 2, 133.42, '2023-05-23 05:42:13', NULL, 'Pending'),
(36, 14, 79, 100.00, 18, 113, 25.98, 1, 10.00, 0.03, 112, 2, 0.35, '2023-05-23 05:48:36', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users_customers_wallets`
--

CREATE TABLE `users_customers_wallets` (
  `users_customers_wallets_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `system_currencies_id` int(11) NOT NULL,
  `wallet_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_customers_wallets`
--

INSERT INTO `users_customers_wallets` (`users_customers_wallets_id`, `users_customers_id`, `system_currencies_id`, `wallet_amount`, `date_added`, `date_modified`, `status`) VALUES
(1, 18, 2, 9.91, '2023-05-12 06:25:42', NULL, 'Active'),
(2, 18, 6, 58429.95, '2023-05-12 06:26:03', NULL, 'Active'),
(3, 18, 79, 5000.29, '2023-05-12 06:26:21', NULL, 'Active'),
(4, 18, 47, 7955.00, '2023-05-12 06:26:42', NULL, 'Active'),
(5, 53, 2, 0.00, '2023-05-12 08:13:07', NULL, 'Active'),
(6, 53, 17, 0.00, '2023-05-12 08:14:16', NULL, 'Active'),
(7, 14, 7, 53.49, '2023-05-12 08:25:08', NULL, 'Active'),
(8, 1, 35, 1.33, '2023-05-13 00:25:06', NULL, 'Active'),
(9, 18, 22, -4.77, '2023-05-13 03:48:55', NULL, 'Active'),
(10, 18, 11, 3.06, '2023-05-13 03:56:17', NULL, 'Active'),
(11, 18, 74, 0.64, '2023-05-13 04:18:28', NULL, 'Active'),
(12, 14, 2, -474.35, '2023-05-13 04:37:06', NULL, 'Active'),
(13, 14, 79, 39500.92, '2023-05-16 07:40:30', NULL, 'Active'),
(14, 52, 74, 0.00, '2023-05-18 00:55:37', NULL, 'Active'),
(15, 52, 113, 0.00, '2023-05-18 00:55:51', NULL, 'Active'),
(16, 14, 80, 0.00, '2023-05-18 01:04:05', NULL, 'Active'),
(17, 14, 113, 25463.24, '2023-05-18 01:18:33', NULL, 'Active'),
(18, 18, 113, 1150.41, '2023-05-18 06:14:35', NULL, 'Active'),
(19, 14, 6, 150.76, '2023-05-20 02:46:47', NULL, 'Active'),
(20, 18, 90, 0.00, '2023-05-22 00:54:34', NULL, 'Active'),
(21, 18, 41, 0.00, '2023-05-22 00:57:56', NULL, 'Active'),
(22, 7, 76, 0.00, '2023-05-22 02:03:35', NULL, 'Active'),
(23, 14, 4, 66.98, '2023-05-22 05:19:12', NULL, 'Active'),
(24, 14, 45, 0.00, '2023-05-22 05:27:00', NULL, 'Active'),
(25, 14, 11, 1000.00, '2023-05-22 05:27:48', NULL, 'Active'),
(26, 17, 6, 0.10, '2023-05-22 05:37:07', NULL, 'Active'),
(27, 17, 80, 0.03, '2023-05-22 05:39:31', NULL, 'Active'),
(28, 48, 3, 15509.18, '2023-07-05 01:21:28', NULL, 'Active'),
(29, 48, 2, 1800.00, '2023-07-05 01:25:03', NULL, 'Active'),
(30, 48, 47, 0.00, '2023-07-05 01:25:24', NULL, 'Active'),
(31, 48, 113, 0.00, '2023-07-05 01:25:49', NULL, 'Active'),
(32, 48, 80, 0.00, '2023-07-07 07:03:25', NULL, 'Active'),
(33, 14, 3, 300.00, '2023-07-07 07:08:17', NULL, 'Active'),
(34, 7, 19, 0.00, '2023-08-08 10:00:09', NULL, 'Active'),
(35, 56, 53, 0.00, '2023-08-31 06:34:21', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users_system`
--

CREATE TABLE `users_system` (
  `users_system_id` int(11) NOT NULL,
  `users_system_roles_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `mobile` varchar(44) NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `user_image` varchar(111) DEFAULT NULL,
  `is_deleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_system`
--

INSERT INTO `users_system` (`users_system_id`, `users_system_roles_id`, `first_name`, `email`, `password`, `mobile`, `city`, `address`, `user_image`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 'Super Admin', 'admin@swapcircle.com', 'admin', '+6013008637767', 'KLCC', 'Malaysia', 'uploads/users_system/user-677d9d74c67929023eedb8469a34003b.jpeg', 'No', NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users_system_roles`
--

CREATE TABLE `users_system_roles` (
  `users_system_roles_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` enum('Inactive','Active') NOT NULL,
  `dashboard` enum('Yes','No') NOT NULL,
  `users_customers` enum('Yes','No') NOT NULL,
  `support` enum('Yes','No') NOT NULL,
  `users_system` enum('Yes','No') NOT NULL,
  `users_system_roles` enum('Yes','No') NOT NULL,
  `account_settings` enum('Yes','No') NOT NULL,
  `system_settings` enum('Yes','No') NOT NULL,
  `swap_offers` enum('Yes','No') NOT NULL,
  `rate_api` enum('Yes','No') NOT NULL,
  `users_customers_trxns` enum('Yes','No') NOT NULL,
  `currency_rate` enum('Yes','No') NOT NULL,
  `connect_categories` enum('Yes','No') NOT NULL,
  `connect_articles` enum('Yes','No') NOT NULL,
  `users_customers_faqs` enum('Yes','No') NOT NULL,
  `admin_rate` enum('Yes','No') NOT NULL,
  `fund_wallet_requests` enum('Yes','No') NOT NULL,
  `withdraw_wallets_requests` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_system_roles`
--

INSERT INTO `users_system_roles` (`users_system_roles_id`, `name`, `status`, `dashboard`, `users_customers`, `support`, `users_system`, `users_system_roles`, `account_settings`, `system_settings`, `swap_offers`, `rate_api`, `users_customers_trxns`, `currency_rate`, `connect_categories`, `connect_articles`, `users_customers_faqs`, `admin_rate`, `fund_wallet_requests`, `withdraw_wallets_requests`) VALUES
(1, 'Super Admin', 'Active', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_wallets_requests`
--

CREATE TABLE `withdraw_wallets_requests` (
  `withdraw_wallets_requests_id` int(11) NOT NULL,
  `users_customers_id` int(11) NOT NULL,
  `users_customers_wallets_id` int(11) NOT NULL,
  `users_customers_accounts_id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` text DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Accepted','Rejected','Deleted') NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `withdraw_wallets_requests`
--

INSERT INTO `withdraw_wallets_requests` (`withdraw_wallets_requests_id`, `users_customers_id`, `users_customers_wallets_id`, `users_customers_accounts_id`, `image`, `amount`, `description`, `date_added`, `status`) VALUES
(1, 52, 14, 7, NULL, 150.00, 'lorem', '2023-09-04 01:30:38', 'Pending'),
(2, 52, 14, 7, NULL, 150.00, 'lorem', '2023-09-04 01:31:42', 'Accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_list`
--
ALTER TABLE `chat_list`
  ADD PRIMARY KEY (`chat_list_id`);

--
-- Indexes for table `chat_list_live`
--
ALTER TABLE `chat_list_live`
  ADD PRIMARY KEY (`chat_list_live_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `chat_messages_live`
--
ALTER TABLE `chat_messages_live`
  ADD PRIMARY KEY (`chat_messages_live_id`);

--
-- Indexes for table `connect_articles`
--
ALTER TABLE `connect_articles`
  ADD PRIMARY KEY (`connect_articles_id`);

--
-- Indexes for table `connect_articles_favourite`
--
ALTER TABLE `connect_articles_favourite`
  ADD PRIMARY KEY (`connect_articles_favourite_id`);

--
-- Indexes for table `connect_articles_views`
--
ALTER TABLE `connect_articles_views`
  ADD PRIMARY KEY (`connect_articles_views_id`);

--
-- Indexes for table `connect_categories`
--
ALTER TABLE `connect_categories`
  ADD PRIMARY KEY (`connect_categories_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faqs_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbacks_id`);

--
-- Indexes for table `fund_wallets`
--
ALTER TABLE `fund_wallets`
  ADD PRIMARY KEY (`fund_wallets_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifications_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `rate_api`
--
ALTER TABLE `rate_api`
  ADD PRIMARY KEY (`rate_api_id`);

--
-- Indexes for table `swap_offers`
--
ALTER TABLE `swap_offers`
  ADD PRIMARY KEY (`swap_offers_id`);

--
-- Indexes for table `swap_offers_favourite`
--
ALTER TABLE `swap_offers_favourite`
  ADD PRIMARY KEY (`swap_offers_favourite_id`);

--
-- Indexes for table `swap_offers_requests`
--
ALTER TABLE `swap_offers_requests`
  ADD PRIMARY KEY (`swap_offers_requests_id`);

--
-- Indexes for table `swap_wallets`
--
ALTER TABLE `swap_wallets`
  ADD PRIMARY KEY (`swap_wallets_id`);

--
-- Indexes for table `system_countries`
--
ALTER TABLE `system_countries`
  ADD PRIMARY KEY (`system_countries_id`);

--
-- Indexes for table `system_currencies`
--
ALTER TABLE `system_currencies`
  ADD PRIMARY KEY (`system_currencies_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`system_settings_id`);

--
-- Indexes for table `users_customers`
--
ALTER TABLE `users_customers`
  ADD PRIMARY KEY (`users_customers_id`);

--
-- Indexes for table `users_customers_accounts`
--
ALTER TABLE `users_customers_accounts`
  ADD PRIMARY KEY (`users_customers_accounts_id`);

--
-- Indexes for table `users_customers_delete`
--
ALTER TABLE `users_customers_delete`
  ADD PRIMARY KEY (`users_customers_delete_id`);

--
-- Indexes for table `users_customers_txns`
--
ALTER TABLE `users_customers_txns`
  ADD PRIMARY KEY (`users_customers_txns_id`);

--
-- Indexes for table `users_customers_wallets`
--
ALTER TABLE `users_customers_wallets`
  ADD PRIMARY KEY (`users_customers_wallets_id`);

--
-- Indexes for table `users_system`
--
ALTER TABLE `users_system`
  ADD PRIMARY KEY (`users_system_id`);

--
-- Indexes for table `users_system_roles`
--
ALTER TABLE `users_system_roles`
  ADD PRIMARY KEY (`users_system_roles_id`);

--
-- Indexes for table `withdraw_wallets_requests`
--
ALTER TABLE `withdraw_wallets_requests`
  ADD PRIMARY KEY (`withdraw_wallets_requests_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_list`
--
ALTER TABLE `chat_list`
  MODIFY `chat_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chat_list_live`
--
ALTER TABLE `chat_list_live`
  MODIFY `chat_list_live_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `chat_messages_live`
--
ALTER TABLE `chat_messages_live`
  MODIFY `chat_messages_live_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `connect_articles`
--
ALTER TABLE `connect_articles`
  MODIFY `connect_articles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `connect_articles_favourite`
--
ALTER TABLE `connect_articles_favourite`
  MODIFY `connect_articles_favourite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `connect_articles_views`
--
ALTER TABLE `connect_articles_views`
  MODIFY `connect_articles_views_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `connect_categories`
--
ALTER TABLE `connect_categories`
  MODIFY `connect_categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faqs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbacks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fund_wallets`
--
ALTER TABLE `fund_wallets`
  MODIFY `fund_wallets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifications_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rate_api`
--
ALTER TABLE `rate_api`
  MODIFY `rate_api_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `swap_offers`
--
ALTER TABLE `swap_offers`
  MODIFY `swap_offers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `swap_offers_favourite`
--
ALTER TABLE `swap_offers_favourite`
  MODIFY `swap_offers_favourite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `swap_offers_requests`
--
ALTER TABLE `swap_offers_requests`
  MODIFY `swap_offers_requests_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `swap_wallets`
--
ALTER TABLE `swap_wallets`
  MODIFY `swap_wallets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `system_countries`
--
ALTER TABLE `system_countries`
  MODIFY `system_countries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=777;

--
-- AUTO_INCREMENT for table `system_currencies`
--
ALTER TABLE `system_currencies`
  MODIFY `system_currencies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `system_settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_customers`
--
ALTER TABLE `users_customers`
  MODIFY `users_customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users_customers_accounts`
--
ALTER TABLE `users_customers_accounts`
  MODIFY `users_customers_accounts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_customers_delete`
--
ALTER TABLE `users_customers_delete`
  MODIFY `users_customers_delete_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_customers_txns`
--
ALTER TABLE `users_customers_txns`
  MODIFY `users_customers_txns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users_customers_wallets`
--
ALTER TABLE `users_customers_wallets`
  MODIFY `users_customers_wallets_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users_system`
--
ALTER TABLE `users_system`
  MODIFY `users_system_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_system_roles`
--
ALTER TABLE `users_system_roles`
  MODIFY `users_system_roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdraw_wallets_requests`
--
ALTER TABLE `withdraw_wallets_requests`
  MODIFY `withdraw_wallets_requests_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
