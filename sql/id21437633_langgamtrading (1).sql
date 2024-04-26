-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2024 at 01:03 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21437633_langgamtrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch1_crud`
--

CREATE TABLE `branch1_crud` (
  `action_id` int(11) NOT NULL,
  `action_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch1_crud`
--

INSERT INTO `branch1_crud` (`action_id`, `action_type`, `user_id`, `username`, `full_name`, `role`, `time`, `date`, `table_name`, `record_id`) VALUES
(36, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:46:33', '2023-10-08', 'Orders', 0),
(37, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:49:44', '2023-10-08', 'Sales', 0),
(38, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:51:20', '2023-10-08', 'Accounts', 21),
(39, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:51:44', '2023-10-08', 'Accounts', 22),
(40, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:53:11', '2023-10-08', 'Orders', 45),
(41, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:53:30', '2023-10-08', 'Orders', 46),
(42, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:53:57', '2023-10-08', 'Sales', 18),
(48, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:24:49', '2023-10-12', 'Inventory', 19),
(49, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '10:56:46', '2023-10-22', 'Inventory', 1),
(50, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '10:56:52', '2023-10-22', 'Inventory', 19),
(51, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:08:42', '2023-10-22', 'Voided', 3),
(52, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:11:30', '2023-10-22', 'Suppliers', 5),
(53, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:11:38', '2023-10-22', 'Suppliers', 5),
(54, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:15:47', '2023-10-22', 'Inventory', 1),
(55, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:15:53', '2023-10-22', 'Inventory', 1),
(56, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:28:02', '2023-10-22', 'Inventory', 20),
(57, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:30:45', '2023-10-22', 'Orders', 47),
(58, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:30:52', '2023-10-22', 'Orders', 47),
(59, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:31:00', '2023-10-22', 'Orders', 47),
(60, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:31:14', '2023-10-22', 'Voided', 4),
(61, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:31:30', '2023-10-22', 'Sales', 2),
(62, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:36:34', '2023-10-22', 'Accounts', 23),
(63, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:36:43', '2023-10-22', 'Accounts', 22),
(64, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:37:10', '2023-10-22', 'Suppliers', 8),
(65, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:24:00', '2023-10-23', 'Orders', 48),
(66, 'Created a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:24:25', '2023-10-23', 'Sales', 19),
(67, 'Voided an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:50:02', '2023-10-23', 'Orders', 37),
(68, 'Removed a Voided Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:53:36', '2023-10-23', 'Voided', 5),
(69, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:58:40', '2023-10-23', 'Orders', 49),
(70, 'Created a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:02:37', '2023-10-23', 'Sales', 20),
(71, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:03:30', '2023-10-23', 'Orders', 49),
(72, 'Made a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:05:27', '2023-10-23', 'Orders', 49),
(73, 'Removed an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:06:02', '2023-10-23', 'Orders', 46),
(74, 'Removed a Voided Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:06:21', '2023-10-23', 'Voided', 37),
(75, 'Removed a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:08:43', '2023-10-23', 'Sales', 12),
(76, 'Added a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:13:12', '2023-10-23', 'Inventory', 21),
(77, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:15:20', '2023-10-23', 'Inventory', 21),
(78, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:16:35', '2023-10-23', 'Inventory', 21),
(79, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:17:25', '2023-10-23', 'Orders', 50),
(80, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:18:03', '2023-10-23', 'Orders', 50),
(81, 'Made a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:18:30', '2023-10-23', 'Orders', 50),
(82, 'Removed an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:18:53', '2023-10-23', 'Orders', 22),
(83, 'Created a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:19:21', '2023-10-23', 'Sales', 23),
(84, 'Removed a Voided Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:19:42', '2023-10-23', 'Voided', 33),
(85, 'Removed a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:19:54', '2023-10-23', 'Sales', 23),
(86, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:25:07', '2023-10-23', 'Accounts', 24),
(87, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:26:22', '2023-10-23', 'Accounts', 25),
(88, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:28:17', '2023-10-23', 'Accounts', 26),
(89, 'Removed an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:28:26', '2023-10-23', 'Accounts', 26),
(90, 'Added a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:32:39', '2023-10-23', 'Suppliers', 9),
(91, 'Edited a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:32:53', '2023-10-23', 'Suppliers', 9),
(92, 'Deleted a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:33:06', '2023-10-23', 'Suppliers', 9),
(93, 'Added a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '12:02:20', '2023-10-25', 'Inventory', 22),
(94, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '12:02:59', '2023-10-25', 'Inventory', 20),
(95, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '12:03:23', '2023-10-25', 'Inventory', 20),
(96, 'Deleted a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '12:04:03', '2023-10-25', 'Suppliers', 8),
(97, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '12:10:13', '2023-10-25', 'Inventory', 22),
(98, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '21:21:31', '2023-10-25', 'Accounts', 27),
(99, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:56:10', '2023-10-29', 'Inventory', 1),
(100, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '11:56:21', '2023-10-29', 'Inventory', 1),
(101, 'Added a Supplier', 20, 'employee1', 'Michael Brown', 'Employee', '11:58:04', '2023-10-29', 'Suppliers', 10),
(102, 'Deleted a Supplier', 20, 'employee1', 'Michael Brown', 'Employee', '11:58:09', '2023-10-29', 'Suppliers', 10),
(103, 'Made a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:57:56', '2023-10-31', 'Orders', 48),
(104, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:58:47', '2023-10-31', 'Orders', 51),
(105, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '13:02:34', '2023-10-31', 'Sales', 31),
(106, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:31:17', '2023-10-31', 'Inventory', 32),
(107, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:31:17', '2023-10-31', 'Inventory', 33),
(108, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:31:17', '2023-10-31', 'Inventory', 34),
(109, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:38:40', '2023-10-31', 'Sales', 35),
(110, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:38:40', '2023-10-31', 'Sales', 36),
(111, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:38:40', '2023-10-31', 'Sales', 37),
(112, 'Edited a Product', 28, 'jigsaw69', 'John Kramer', 'Employee', '17:26:21', '2023-11-03', 'Inventory', 1),
(113, 'Added a Supplier', 28, 'jigsaw69', 'John Kramer', 'Employee', '17:30:05', '2023-11-03', 'Suppliers', 11),
(114, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:31:49', '2023-11-03', 'Inventory', 1),
(115, 'Created a Sale', 28, 'jigsaw69', 'John Kramer', 'Employee', '17:33:22', '2023-11-03', 'Sales', 38),
(116, 'Created a Sale', 28, 'jigsaw69', 'John Kramer', 'Employee', '17:33:26', '2023-11-03', 'Sales', 39),
(117, 'Deleted a Supplier', 20, 'employee1', 'Michael Brown', 'Employee', '21:05:10', '2023-11-06', 'Suppliers', 11),
(118, 'Created an Order', 20, 'employee1', 'Michael Brown', 'Employee', '21:06:15', '2023-11-06', 'Orders', 52),
(119, 'Made a Sale', 20, 'employee1', 'Michael Brown', 'Employee', '21:06:28', '2023-11-06', 'Orders', 52),
(120, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '21:25:33', '2023-11-06', 'Sales', 39),
(121, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:42:27', '2023-11-18', 'Sales', 41),
(122, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:43:58', '2023-11-18', 'Accounts', 28),
(123, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:44:01', '2023-11-18', 'Accounts', 27),
(124, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:44:18', '2023-11-18', 'Accounts', 20),
(125, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:47:14', '2023-11-18', 'Suppliers', 1),
(126, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '21:24:51', '2023-11-28', 'Sales', 38),
(127, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '10:21:37', '2023-11-29', 'Accounts', 29),
(128, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '10:23:19', '2023-11-29', 'Accounts', 30),
(129, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '10:37:21', '2023-11-29', 'Accounts', 31),
(130, 'Created a Sale', 29, 'tester1', 'Evaluation Account', 'Administrator', '11:18:58', '2023-11-29', 'Sales', 42),
(131, 'Created a Sale', 29, 'tester1', 'Evaluation Account', 'Administrator', '11:21:00', '2023-11-29', 'Sales', 43),
(132, 'Deleted a Product', 29, 'tester1', 'Evaluation Account', 'Administrator', '11:23:46', '2023-11-29', 'Inventory', 20),
(133, 'Deleted a Product', 29, 'tester1', 'Evaluation Account', 'Administrator', '11:24:49', '2023-11-29', 'Inventory', 12),
(134, 'Edited a Product', 29, 'tester1', 'Evaluation Account', 'Administrator', '11:27:23', '2023-11-29', 'Inventory', 1),
(135, 'Edited a Product', 29, 'tester1', 'Evaluation Account', 'Administrator', '11:27:44', '2023-11-29', 'Inventory', 1),
(136, 'Edited a Product', 30, 'emptester', 'Employee Evaluation', 'Employee', '11:28:31', '2023-11-29', 'Inventory', 1),
(137, 'Edited a Product', 30, 'emptester', 'Employee Evaluation', 'Employee', '11:29:18', '2023-11-29', 'Inventory', 1),
(138, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:59:29', '2023-11-29', 'Inventory', 15),
(139, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:59:38', '2023-11-29', 'Inventory', 14),
(140, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:59:49', '2023-11-29', 'Orders', 23),
(141, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '13:00:00', '2023-11-29', 'Voided', 6),
(142, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '13:00:13', '2023-11-29', 'Sales', 35),
(143, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:48:10', '2023-11-29', 'Inventory', 23),
(144, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:48:16', '2023-11-29', 'Inventory', 23),
(145, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:43:28', '2023-11-29', 'Inventory', 13),
(146, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '17:47:19', '2023-11-29', 'Voided', 7),
(147, 'Created an Order', 29, 'tester1', 'Evaluation Account', 'Administrator', '17:48:05', '2023-11-29', 'Orders', 53),
(148, 'Created an Order', 29, 'tester1', 'Evaluation Account', 'Administrator', '17:48:05', '2023-11-29', 'Orders', 54),
(149, 'Deleted a Product', 29, 'tester1', 'Evaluation Account', 'Administrator', '18:05:38', '2023-11-29', 'Inventory', 1),
(150, 'Added a Supplier', 29, 'tester1', 'Evaluation Account', 'Administrator', '18:58:45', '2023-11-29', 'Suppliers', 12),
(151, 'Added a Supplier', 29, 'tester1', 'Evaluation Account', 'Administrator', '18:58:45', '2023-11-29', 'Suppliers', 13),
(152, 'Created an Account', 29, 'tester1', 'Evaluation Account', 'Administrator', '20:47:41', '2023-11-29', 'Accounts', 32),
(153, 'Deleted a Product', 32, 'jdcruz', 'juan dela cruz', 'Employee', '21:17:53', '2023-11-29', 'Inventory', 3),
(154, 'Edited a Product', 32, 'jdcruz', 'juan dela cruz', 'Employee', '21:27:23', '2023-11-29', 'Inventory', 5),
(155, 'Created a Sale', 32, 'jdcruz', 'juan dela cruz', 'Employee', '21:47:05', '2023-11-29', 'Sales', 44),
(156, 'Created a Sale', 32, 'jdcruz', 'juan dela cruz', 'Employee', '21:47:06', '2023-11-29', 'Sales', 45),
(157, 'Created a Sale', 32, 'jdcruz', 'juan dela cruz', 'Employee', '21:47:06', '2023-11-29', 'Sales', 46),
(158, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:42:46', '2023-11-29', 'Accounts', 32),
(159, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:42:50', '2023-11-29', 'Accounts', 29),
(160, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:43:00', '2023-11-29', 'Accounts', 29),
(161, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:43:06', '2023-11-29', 'Accounts', 31),
(162, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:43:08', '2023-11-29', 'Accounts', 30),
(163, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '23:02:23', '2023-11-29', 'Accounts', 33),
(164, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:48:35', '2023-11-30', 'Orders', 30),
(165, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:59:19', '2023-11-30', 'Inventory', 5),
(166, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:00:56', '2023-11-30', 'Orders', 55),
(167, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:03:25', '2023-11-30', 'Orders', 56),
(168, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:04:43', '2023-11-30', 'Orders', 57),
(169, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:06:02', '2023-11-30', 'Inventory', 5),
(170, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:06:36', '2023-11-30', 'Orders', 58),
(171, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:07:13', '2023-11-30', 'Orders', 59),
(172, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:07:58', '2023-11-30', 'Orders', 60),
(173, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:10:44', '2023-11-30', 'Orders', 61),
(174, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:10:59', '2023-11-30', 'Orders', 61),
(175, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:13:01', '2023-11-30', 'Orders', 62),
(176, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:14:21', '2023-11-30', 'Orders', 63),
(177, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:16:05', '2023-11-30', 'Inventory', 5),
(178, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '16:17:11', '2023-11-30', 'Orders', 64),
(179, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:40:02', '2023-12-01', 'Accounts', 33),
(180, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:41:24', '2023-12-01', 'Sales', 37),
(181, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:41:37', '2023-12-01', 'Sales', 36),
(182, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:43:10', '2023-12-01', 'Sales', 36),
(183, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:43:26', '2023-12-01', 'Inventory', 11),
(184, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:46:44', '2023-12-01', 'Orders', 35),
(185, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:46:52', '2023-12-01', 'Orders', 36),
(186, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:48:27', '2023-12-01', 'Suppliers', 13),
(187, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:01:50', '2023-12-01', 'Inventory', 5),
(188, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:01:59', '2023-12-01', 'Inventory', 5),
(189, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:02:33', '2023-12-01', 'Suppliers', 1),
(190, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:02:44', '2023-12-01', 'Suppliers', 1),
(191, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:03:50', '2023-12-01', 'Orders', 64),
(192, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:43:01', '2023-12-01', 'Sales', 47),
(193, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:43:01', '2023-12-01', 'Sales', 48),
(194, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:43:01', '2023-12-01', 'Sales', 49),
(195, 'Created a Sale', 14, 'admin12345', 'Emmanuel Lobos', 'Administrator', '15:48:22', '2023-12-01', 'Sales', 50),
(196, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:21:15', '2023-12-01', 'Inventory', 24),
(197, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:21:31', '2023-12-01', 'Inventory', 24),
(198, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:21:43', '2023-12-01', 'Inventory', 24),
(199, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:22:35', '2023-12-01', 'Orders', 65),
(200, 'Made a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:22:50', '2023-12-01', 'Orders', 65),
(201, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:23:06', '2023-12-01', 'Orders', 53),
(202, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:24:19', '2023-12-01', 'Sales', 52),
(203, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:24:19', '2023-12-01', 'Sales', 53),
(204, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:24:19', '2023-12-01', 'Sales', 54),
(205, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:26:32', '2023-12-01', 'Accounts', 34),
(206, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:26:52', '2023-12-01', 'Suppliers', 1),
(207, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:27:28', '2023-12-01', 'Suppliers', 14),
(208, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '18:27:39', '2023-12-01', 'Suppliers', 14),
(209, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '11:39:44', '2023-12-02', 'Accounts', 35),
(210, 'Removed an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:18:40', '2023-12-05', 'Accounts', 35),
(211, 'Removed an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:18:42', '2023-12-05', 'Accounts', 35),
(212, 'Removed an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:19:01', '2023-12-05', 'Accounts', 35),
(213, 'Added a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '20:15:12', '2023-12-05', 'Inventory', 25),
(214, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '20:15:27', '2023-12-05', 'Inventory', 25),
(215, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:36:52', '2023-12-23', 'Accounts', 36),
(216, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '22:59:09', '2024-01-18', 'Accounts', 37),
(217, 'Created an Order', 37, 'admin1', 'Admin Account', 'Administrator', '23:04:55', '2024-01-18', 'Orders', 66),
(218, 'Made a Sale', 37, 'admin1', 'Admin Account', 'Administrator', '23:05:30', '2024-01-18', 'Orders', 66),
(219, 'Voided an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '12:53:20', '2024-01-20', 'Orders', 55),
(220, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:59:38', '2024-01-20', 'Inventory', 25),
(221, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:00:37', '2024-01-20', 'Inventory', 25),
(222, 'Created a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '14:04:04', '2024-01-20', 'Sales', 56),
(223, 'Added a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:48:23', '2024-02-23', 'Inventory', 26),
(224, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:48:36', '2024-02-23', 'Inventory', 26),
(225, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:48:51', '2024-02-23', 'Inventory', 26),
(226, 'Added a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:48:51', '2024-02-23', 'Inventory', 27),
(227, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:48:54', '2024-02-23', 'Inventory', 26),
(228, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:53:29', '2024-02-23', 'Inventory', 26),
(229, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:53:29', '2024-02-23', 'Inventory', 5),
(230, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:53:31', '2024-02-23', 'Inventory', 26),
(231, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:54:00', '2024-02-23', 'Inventory', 26),
(232, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:54:00', '2024-02-23', 'Inventory', 5),
(233, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:54:03', '2024-02-23', 'Inventory', 26),
(234, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:56:53', '2024-02-23', 'Inventory', 27),
(235, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '15:58:25', '2024-02-23', 'Inventory', 25),
(236, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:24:15', '2024-04-01', 'Inventory', 5),
(237, 'Added a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:24:40', '2024-04-01', 'Inventory', 28),
(238, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:24:55', '2024-04-01', 'Inventory', 28),
(239, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:28:10', '2024-04-01', 'Orders', 67),
(240, 'Created a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:29:32', '2024-04-01', 'Sales', 57),
(241, 'Voided an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:32:01', '2024-04-01', 'Orders', 67),
(242, 'Removed a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:38:04', '2024-04-01', 'Sales', 57),
(243, 'Removed a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:43:22', '2024-04-01', 'Sales', 57),
(244, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:43:23', '2024-04-01', 'Sales', 58),
(245, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:43:23', '2024-04-01', 'Sales', 59),
(246, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:43:23', '2024-04-01', 'Sales', 60),
(247, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:48:43', '2024-04-01', 'Accounts', 38),
(248, 'Removed an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:49:09', '2024-04-01', 'Accounts', 38),
(249, 'Added a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:51:12', '2024-04-01', 'Suppliers', 15),
(250, 'Edited a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:51:37', '2024-04-01', 'Suppliers', 15),
(251, 'Deleted a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:51:52', '2024-04-01', 'Suppliers', 15),
(252, 'Deleted a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:54:25', '2024-04-01', 'Suppliers', 12);

-- --------------------------------------------------------

--
-- Table structure for table `branch1_inventory`
--

CREATE TABLE `branch1_inventory` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date_ordered` date NOT NULL,
  `date_arrival` date NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch1_inventory`
--

INSERT INTO `branch1_inventory` (`product_id`, `product_name`, `stock`, `price`, `category`, `date_ordered`, `date_arrival`, `date_added`, `added_by`, `user_id`, `supplier_id`, `supplier_name`) VALUES
(5, 'Concrete ', 400, 200.00, 'Building Materials', '2023-09-01', '2023-09-10', '2023-09-22', 'Nico Garce', 1, 1, 'supplier 1'),
(6, 'Plywood Sheets', 293, 749.50, 'Building Materials', '2023-09-02', '2023-09-12', '2023-09-22', 'Nico Garce', 1, 2, 'supplier 2'),
(7, 'Cement Bags', 799, 174.50, 'Building Materials', '2023-09-03', '2023-09-11', '2023-09-22', 'Nico Garce', 1, 3, 'supplier 3'),
(8, 'Steel Rebar', 398, 362.00, 'Building Materials', '2023-09-05', '2023-09-13', '2023-09-22', 'Nico Garce', 1, 3, 'supplier 3'),
(9, 'Safety Helmets', 200, 649.50, 'Safety Gear', '2023-09-06', '2023-09-15', '2023-09-22', 'Nico Garce', 1, 4, 'supplier 4'),
(10, 'Paint Rollers', 350, 274.25, 'Painting Supplies', '2023-09-07', '2023-09-17', '2023-09-22', 'Nico Garce', 1, 1, 'supplier 1');

-- --------------------------------------------------------

--
-- Table structure for table `branch1_orders`
--

CREATE TABLE `branch1_orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_list`)),
  `pay_method` varchar(255) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `shipping_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch1_orders`
--

INSERT INTO `branch1_orders` (`order_id`, `customer_name`, `order_date`, `order_time`, `order_list`, `pay_method`, `total_cost`, `order_status`, `payment_status`, `contact_info`, `order_type`, `user_id`, `salesperson`, `shipping_details`) VALUES
(8, 'Michael Brown', '2023-09-10', '13:15:11', '[{\"product_name\":\"Brick\",\"quantity\":2,\"price\":\"50.00\"}]', 'Cash', 50.00, 'Cancelled', 'Paid', 'michael.brown@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(9, 'Michael Brown', '2023-09-10', '13:17:00', '[{\"product_name\":\"Brick\",\"quantity\":2,\"price\":\"50.00\"}]', 'Cash', 50.00, 'Cancelled', 'Paid', 'michael.brown@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(10, 'Michael Brown', '2023-09-10', '13:20:16', '[{\"product_name\":\"Brick\",\"quantity\":2,\"price\":\"50.00\"}]', 'Cash', 50.00, 'Cancelled', 'Pending', 'michael.brown@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(11, 'Chenelle Abrio', '2023-09-10', '13:22:29', '[{\"product_name\":\"Brick\",\"quantity\":2,\"price\":\"50.00\"}]', 'Cash', 50.00, 'Cancelled', 'Paid', '090909090909', 'In-Store', 1, 'Nico Garce', 'N/A'),
(15, 'Chenelle Abrio', '2023-09-10', '13:27:51', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"},{\"product_name\":\"Nails\",\"quantity\":1,\"price\":\"1.00\"}]', 'Cash', 26.00, 'Cancelled', 'Pending', '090909090909', 'In-Store', 1, 'Nico Garce', 'N/A'),
(16, 'Nico Roell Garce', '2023-09-10', '13:28:29', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"},{\"product_name\":\"Nails\",\"quantity\":1,\"price\":\"1.00\"}]', 'Cash', 26.00, 'Refunded', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(17, 'Chenelle Abrio', '2023-09-10', '13:29:36', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"},{\"product_name\":\"Nails\",\"quantity\":1,\"price\":\"1.00\"}]', 'Cash', 26.00, 'Refunded', 'Paid', '090909090909', 'In-Store', 1, 'Nico Garce', 'N/A'),
(38, 'Chenelle Abrio', '2023-10-08', '22:10:25', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Pending', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(39, 'Nico Roell Garce', '2023-10-08', '22:12:48', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(40, 'Michael Brown', '2023-10-08', '22:29:50', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(41, 'Nico Roell Garce', '2023-10-08', '22:33:07', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Pending', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(42, 'Nico Roell Garce', '2023-10-08', '22:34:40', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Pending', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(43, 'Nico Roell Garce', '2023-10-08', '22:36:15', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Paid', '09090909090', 'In-Store', 1, 'Nico Garce', 'N/A'),
(44, 'Nico Roell Garce', '2023-10-08', '22:43:08', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(51, 'Nico Roell Garce', '2023-10-31', '12:58:47', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 'Cash', 25.00, 'In Fullfillment', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(53, 'Nel', '2023-11-29', '17:48:05', '[{\"product_name\":\"Plywood Sheets\",\"quantity\":4,\"price\":\"2998.00\"}]', 'Cash', 2998.00, 'Cancelled', 'Pending', '0911 xxx xxxx', 'Delivery', 29, 'Evaluation Account', 'SPL'),
(54, 'Nel', '2023-11-29', '17:48:05', '[{\"product_name\":\"Plywood Sheets\",\"quantity\":4,\"price\":\"2998.00\"}]', 'Cash', 2998.00, 'In Fullfillment', 'Pending', '0911 xxx xxxx', 'Delivery', 29, 'Evaluation Account', 'SPL'),
(55, 'Juan Dela Cruz', '2023-11-30', '16:00:56', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":2,\"price\":\"400.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 800.00, 'Cancelled', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(56, 'Juan Dela Cruz', '2023-11-30', '16:03:25', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":2,\"price\":\"400.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 800.00, 'In Fullfillment', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(57, 'Juan Dela Cruz', '2023-11-30', '16:04:43', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 2400.00, 'In Fullfillment', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(58, 'Juan Dela Cruz', '2023-11-30', '16:06:36', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"}]', 'Cash', 6000.00, 'In Fullfillment', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(59, 'Juan Dela Cruz', '2023-11-30', '16:07:13', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 600.00, 'In Fullfillment', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(60, 'Juan Dela Cruz', '2023-11-30', '16:07:58', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 600.00, 'In Fullfillment', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(61, 'Juan Dela Cruz', '2023-11-30', '16:10:44', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"}]', 'Cash', 6000.00, 'Cancelled', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(62, 'Juan Dela Cruz', '2023-11-30', '16:13:01', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":5,\"price\":\"1000.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":4,\"price\":\"800.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 2000.00, 'In Fullfillment', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(63, 'Juan Dela Cruz', '2023-11-30', '16:14:21', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":5,\"price\":\"1000.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":4,\"price\":\"800.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 2000.00, 'In Fullfillment', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(64, 'Juan Dela Cruz', '2023-11-30', '16:17:11', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"},{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 'Cash', 600.00, 'In Fullfillment', 'Pending', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(67, 'Juan Dela Cruz', '2024-04-01', '19:28:10', '[{\"product_name\":\"Concrete \",\"quantity\":12,\"price\":\"2400.00\"}]', 'Cash', 2400.00, 'Refunded', 'Paid', '09xx xxx xxxx', 'In-Store', 1, 'Nico Roell Garce', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `branch1_sales`
--

CREATE TABLE `branch1_sales` (
  `sale_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_list`)),
  `total_cost` decimal(10,2) NOT NULL,
  `pay_method` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `shipping_details` varchar(255) NOT NULL,
  `date_complete` date NOT NULL,
  `time_complete` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch1_sales`
--

INSERT INTO `branch1_sales` (`sale_id`, `customer_name`, `order_date`, `order_time`, `order_list`, `total_cost`, `pay_method`, `order_status`, `payment_status`, `contact_info`, `order_type`, `user_id`, `salesperson`, `shipping_details`, `date_complete`, `time_complete`) VALUES
(3, 'Michael Brown', '2023-09-10', '13:26:52', '[{\"product_name\":\"Brick\",\"quantity\":2,\"price\":\"50.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"2.00\"}]', 52.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-09-10', '13:27:01'),
(4, 'Nico Roell Garce', '2023-10-08', '13:40:45', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"100.50\"}]', 100.50, 'Cash', 'Complete', 'Paid', '090909090909', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '13:40:45'),
(5, 'Michael Brown', '2023-10-08', '13:42:37', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '090909090909', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '13:42:37'),
(6, 'Chenelle Abrio', '2023-10-08', '13:47:18', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '090909090909', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '13:47:18'),
(7, 'Nico Roell Garce', '2023-10-08', '13:48:07', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '14:04:06'),
(8, 'Nico Roell Garce', '2023-10-08', '14:16:52', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"100.50\"}]', 100.50, 'Cash', 'Complete', 'Paid', 'michael.brown@email.com', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '14:16:52'),
(10, 'Nico Roell Garce', '2023-10-08', '21:59:48', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '21:59:48'),
(11, 'Nico Roell Garce', '2023-10-08', '22:00:36', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '090909090909', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '22:00:36'),
(13, 'Michael Brown', '2023-10-08', '22:04:08', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', 'michael.brown@email.com', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '22:04:08'),
(14, 'Michael Brown', '2023-10-08', '22:08:54', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '22:08:54'),
(15, 'Michael Brown', '2023-10-08', '22:28:06', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '22:28:06'),
(16, 'Nico Roell Garce', '2023-10-08', '22:30:09', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '22:30:09'),
(17, 'Nico Roell Garce', '2023-10-08', '22:49:44', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '22:49:44'),
(18, 'Nico Roell Garce', '2023-10-08', '22:53:57', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-08', '22:53:57'),
(19, 'Nico Roell Garce', '2023-10-23', '13:24:25', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2023-10-23', '05:24:25'),
(20, 'Michael Brown', '2023-10-23', '14:02:37', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2023-10-23', '14:02:37'),
(21, 'Nico Roell Garce', '2023-10-23', '13:58:39', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2023-10-23', '14:05:27'),
(22, 'Michael Brown', '2023-10-23', '14:17:25', '[{\"product_name\":\"Steel Rebar\",\"quantity\":1,\"price\":\"362.00\"}]', 362.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2023-10-23', '14:18:30'),
(31, 'Nico Roell Garce', '2023-10-31', '13:02:34', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-31', '13:02:34'),
(40, 'Nico Roell Garce', '2023-11-06', '21:06:15', '[{\"product_name\":\"Brick\",\"quantity\":5,\"price\":\"125.00\"}]', 125.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 20, 'Michael Brown', 'N/A', '2023-11-06', '21:06:28'),
(41, 'Juan Dela Cruz', '2023-11-18', '17:42:27', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":2,\"price\":\"201.00\"}]', 201.00, 'Cash', 'Complete', 'Paid', 'juan@email.com', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-11-18', '17:42:27'),
(42, 'nico', '2023-11-29', '11:18:58', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"25.00\"}]', 25.00, 'Cash', 'Complete', 'Paid', 'nico@email.com', 'In-Store', 29, 'Evaluation Account', 'N/A', '2023-11-29', '11:18:58'),
(43, 'sherwin', '2023-11-29', '11:21:00', '[{\"product_name\":\"Brick\",\"quantity\":77,\"price\":\"1925.00\"}]', 1925.00, 'Cod', 'Complete', 'Paid', 'nico@email.com', 'In-Store', 29, 'Evaluation Account', 'N/A', '2023-11-29', '11:21:00'),
(44, 'Nel', '2023-11-29', '21:47:05', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"}]', 2000.00, 'Cash', 'Complete', 'Paid', '0911 xxx xxxx', 'Delivery', 32, 'juan dela cruz', 'SPL', '2023-11-29', '21:47:05'),
(45, 'Nel', '2023-11-29', '21:47:06', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"}]', 2000.00, 'Cash', 'Complete', 'Paid', '0911 xxx xxxx', 'Delivery', 32, 'juan dela cruz', 'SPL', '2023-11-29', '21:47:06'),
(46, 'Nel', '2023-11-29', '21:47:06', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":10,\"price\":\"2000.00\"}]', 2000.00, 'Cash', 'Complete', 'Paid', '0911 xxx xxxx', 'Delivery', 32, 'juan dela cruz', 'SPL', '2023-11-29', '21:47:06'),
(47, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(48, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(49, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(50, 'Emman', '2023-12-01', '15:48:21', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":1,\"price\":\"200.00\"}]', 200.00, 'Cash', 'Complete', 'Paid', 'Emman@gmail.com', 'In-Store', 14, 'Emmanuel Lobos', 'N/A', '2023-12-01', '15:48:21'),
(51, 'Juan Dela Cruz', '2023-12-01', '18:22:35', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":2,\"price\":\"400.00\"},{\"product_name\":\"Cement Bags\",\"quantity\":1,\"price\":\"174.50\"}]', 574.50, 'Cash', 'Complete', 'Paid', '09xx xxx xxxx', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-12-01', '18:22:50'),
(52, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(53, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(54, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(55, 'Kian Fernando', '2024-01-18', '23:04:55', '[{\"product_name\":\"Plywood Sheets\",\"quantity\":1,\"price\":\"749.50\"},{\"product_name\":\"Steel Rebar\",\"quantity\":1,\"price\":\"362.00\"}]', 1111.50, 'Gcash', 'Complete', 'Paid', '09602178225', 'Delivery', 37, 'Admin Account', '', '2024-01-18', '23:05:30'),
(56, 'Nico', '2024-01-20', '14:04:04', '[{\"product_name\":\"Concrete Blocks\",\"quantity\":98,\"price\":\"19600.00\"}]', 19600.00, 'Cash', 'Complete', 'Paid', '09xx xxx xxxx', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2024-01-20', '14:04:04'),
(58, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(59, 'Jane Smith', '2019-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(60, 'Mike Johnson', '2018-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `branch1_suppliers`
--

CREATE TABLE `branch1_suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch1_suppliers`
--

INSERT INTO `branch1_suppliers` (`supplier_id`, `supplier_name`, `description`, `address`, `contact`) VALUES
(1, 'supplier 1', 'Description 1', 'Address 1', 'Contact 1'),
(2, 'supplier 2', 'Description 2', 'Address 2', 'Contact 2'),
(3, 'supplier 3', 'Description 3', 'Address 3\r\n', 'Contact 3'),
(4, 'supplier 4', 'Description 4', 'Address 4', 'Contact 4'),
(5, 'supplier 5', 'Description 5', 'Address 5', 'Contact 5');

-- --------------------------------------------------------

--
-- Table structure for table `branch1_users`
--

CREATE TABLE `branch1_users` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_added` date NOT NULL,
  `branch` varchar(255) NOT NULL DEFAULT 'Branch 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch1_users`
--

INSERT INTO `branch1_users` (`ID`, `firstName`, `lastName`, `username`, `password`, `mobile`, `email`, `address`, `role`, `photo`, `date_added`, `branch`) VALUES
(1, 'Nico', 'Garce', 'ngarce', '$2y$10$wLWqoQm4aJfVpANvHCuRMOEiGOXN6NqZg/nt4YupZe1hBOnWflVDi', '09090909090', 'ngarce36@gmail.com', '123 Address Example', 'Administrator', '../assets/user_upload/1x1 formal.jpg', '2023-09-08', 'Branch 1'),
(3, 'Chenelle', 'Abrio', 'yukiyui.yun', '$2y$10$lXqcGPI7Ov0kYDQcqwjAe.ScQXrQbd3/0GnhLlO6SjZc6VAvDdi.6', '09480698220', 'takuyama.tazu@gmail.com', 'Sucat, Muntinlupa City', 'Administrator', '../assets/user_upload/1x1 chen.png', '2023-09-08', 'Branch 1'),
(14, 'Emmanuel', 'Lobos', 'admin12345', '$2y$10$Q68CqcOhdybSYzHQT3YWT.Ed1edkFPXNL6nDro5cMRv/bT5sczMC6', '09090900909', 'emman@gmail.com', 'San Pedro, Laguna', 'Administrator', '../assets/user_upload/369782645_671461835185362_5535021533343633058_n.jpg', '2023-09-21', 'Branch 1'),
(34, 'Employee', 'Evaluation', 'employee1', '$2y$10$K7/RQJUmlHmWfe0np.iQD.GHRKVoPDnH2VW5Ixk9g6ZXZJyIOn/be', '09090909090', 'email@email.com', 'Address: 123 Main Street, Anytown, USA', 'Employee', NULL, '2023-12-01', 'Branch 1'),
(36, 'Elgim', 'Cadiwitan', 'admineval', '$2y$10$.8KFQlZEIYbLBZ6UPjk29.KenkJZvPpU4AxQErFC4mHkBdy/BIS/S', '09090909090', 'longganisaseller@gmail.com', 'Alabang, Muntinlupa City', 'Administrator', NULL, '2023-12-23', 'Branch 1'),
(37, 'Admin', 'Account', 'admin1', '$2y$10$3TukRYdn4AZE9RFNudQW1uaExFviuvIatoJBST6BoqM3i13F/2giq', '09090909090', 'johndoe@gmail.com', 'Putatan Muntinlupa City', 'Administrator', NULL, '2024-01-18', 'Branch 1');

-- --------------------------------------------------------

--
-- Table structure for table `branch1_user_logs`
--

CREATE TABLE `branch1_user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `log_time` time NOT NULL,
  `log_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch1_user_logs`
--

INSERT INTO `branch1_user_logs` (`log_id`, `user_id`, `name`, `username`, `role`, `action`, `log_time`, `log_date`) VALUES
(236, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:55:18', '2023-10-08'),
(237, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:55:31', '2023-10-08'),
(238, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:36:51', '2023-10-08'),
(239, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:36:57', '2023-10-08'),
(240, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:37:38', '2023-10-08'),
(241, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:37:49', '2023-10-08'),
(242, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:38:01', '2023-10-08'),
(243, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:38:11', '2023-10-08'),
(244, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:38:28', '2023-10-08'),
(245, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:18:28', '2023-10-08'),
(246, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:49:34', '2023-10-08'),
(247, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '00:34:01', '2023-10-09'),
(248, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:01:47', '2023-10-09'),
(249, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:38:29', '2023-10-09'),
(250, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:40:52', '2023-10-09'),
(251, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:46:43', '2023-10-09'),
(252, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:48:17', '2023-10-09'),
(253, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:48:54', '2023-10-09'),
(254, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:49:02', '2023-10-09'),
(255, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:52:20', '2023-10-09'),
(256, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:54:06', '2023-10-09'),
(257, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:58:45', '2023-10-09'),
(258, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '19:58:52', '2023-10-09'),
(259, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '19:59:15', '2023-10-09'),
(260, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:59:22', '2023-10-09'),
(261, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:27:35', '2023-10-09'),
(262, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:32:23', '2023-10-09'),
(263, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:37:32', '2023-10-09'),
(264, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:38:43', '2023-10-09'),
(265, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:41:10', '2023-10-09'),
(266, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:52:53', '2023-10-09'),
(267, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:58:18', '2023-10-09'),
(268, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:23:05', '2023-10-09'),
(269, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:26:07', '2023-10-09'),
(270, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:26:38', '2023-10-09'),
(271, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:30:38', '2023-10-09'),
(272, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:32:20', '2023-10-09'),
(273, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:37:01', '2023-10-09'),
(274, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:38:31', '2023-10-09'),
(275, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:38:37', '2023-10-09'),
(276, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:08:44', '2023-10-10'),
(277, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:13:26', '2023-10-10'),
(278, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:14:19', '2023-10-10'),
(279, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:16:11', '2023-10-10'),
(280, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:16:43', '2023-10-11'),
(281, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:34:07', '2023-10-12'),
(282, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:34:17', '2023-10-12'),
(283, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:35:49', '2023-10-12'),
(284, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:36:01', '2023-10-12'),
(285, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:38:21', '2023-10-12'),
(286, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '12:38:36', '2023-10-12'),
(287, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '12:38:44', '2023-10-12'),
(288, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:38:50', '2023-10-12'),
(289, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:58:14', '2023-10-12'),
(290, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:50:59', '2023-10-19'),
(291, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:53:51', '2023-10-19'),
(292, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '10:52:54', '2023-10-22'),
(293, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:23:01', '2023-10-22'),
(294, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:23:41', '2023-10-22'),
(295, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:23:43', '2023-10-22'),
(296, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:24:17', '2023-10-22'),
(297, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:41:42', '2023-10-22'),
(298, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:45:40', '2023-10-22'),
(299, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:45:43', '2023-10-22'),
(300, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:47:03', '2023-10-22'),
(301, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:51:40', '2023-10-22'),
(302, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:51:46', '2023-10-22'),
(303, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '11:53:16', '2023-10-22'),
(304, 23, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '11:54:02', '2023-10-22'),
(305, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '11:55:07', '2023-10-22'),
(306, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '11:55:38', '2023-10-22'),
(307, 23, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged Out', '11:56:09', '2023-10-22'),
(308, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:04:19', '2023-10-22'),
(309, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:04:23', '2023-10-22'),
(310, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:05:41', '2023-10-22'),
(311, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:06:42', '2023-10-22'),
(312, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:11:18', '2023-10-22'),
(313, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:27:19', '2023-10-22'),
(314, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:31:11', '2023-10-22'),
(315, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '13:03:18', '2023-10-22'),
(316, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '13:06:38', '2023-10-22'),
(317, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:18:58', '2023-10-22'),
(318, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:01:51', '2023-10-22'),
(319, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:39:00', '2023-10-22'),
(320, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:40:24', '2023-10-22'),
(321, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:42:45', '2023-10-22'),
(322, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:44:18', '2023-10-22'),
(323, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:44:19', '2023-10-22'),
(324, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:53:05', '2023-10-22'),
(325, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '14:53:13', '2023-10-22'),
(326, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '15:05:04', '2023-10-22'),
(327, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:05:10', '2023-10-22'),
(328, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:10:12', '2023-10-22'),
(329, 23, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '15:10:19', '2023-10-22'),
(330, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:10:49', '2023-10-22'),
(331, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:11:00', '2023-10-22'),
(332, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged In', '15:11:08', '2023-10-22'),
(333, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged Out', '15:11:29', '2023-10-22'),
(334, 23, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '15:14:42', '2023-10-22'),
(335, 23, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged Out', '15:14:52', '2023-10-22'),
(336, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:17:41', '2023-10-22'),
(337, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:18:21', '2023-10-22'),
(338, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:18:27', '2023-10-22'),
(339, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:19:14', '2023-10-22'),
(340, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '03:30:44', '2023-10-23'),
(341, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '04:08:17', '2023-10-23'),
(342, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:10:21', '2023-10-23'),
(343, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:11:06', '2023-10-23'),
(344, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:11:52', '2023-10-23'),
(345, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:15:47', '2023-10-23'),
(346, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:17:54', '2023-10-23'),
(347, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:17:58', '2023-10-23'),
(348, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:20:01', '2023-10-23'),
(349, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:23:03', '2023-10-23'),
(350, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:23:34', '2023-10-23'),
(351, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '04:24:31', '2023-10-23'),
(352, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:16:53', '2023-10-23'),
(353, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:17:11', '2023-10-23'),
(354, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:17:34', '2023-10-23'),
(355, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:20:38', '2023-10-23'),
(356, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:21:58', '2023-10-23'),
(357, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:22:01', '2023-10-23'),
(358, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:22:50', '2023-10-23'),
(359, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:23:33', '2023-10-23'),
(360, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '06:45:11', '2023-10-23'),
(361, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:46:04', '2023-10-23'),
(362, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '06:46:15', '2023-10-23'),
(363, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:47:48', '2023-10-23'),
(364, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:47:55', '2023-10-23'),
(365, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:24:23', '2023-10-23'),
(366, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:24:42', '2023-10-23'),
(367, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged In', '20:13:40', '2023-10-23'),
(368, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged Out', '20:19:44', '2023-10-23'),
(369, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '21:06:24', '2023-10-23'),
(370, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '21:12:29', '2023-10-23'),
(371, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '21:13:15', '2023-10-23'),
(372, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '21:13:37', '2023-10-23'),
(373, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '22:13:43', '2023-10-23'),
(374, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '22:19:56', '2023-10-23'),
(375, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:21:24', '2023-10-24'),
(376, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:22:14', '2023-10-24'),
(377, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:59:28', '2023-10-24'),
(378, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:03:51', '2023-10-24'),
(379, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:10:26', '2023-10-24'),
(380, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:17:36', '2023-10-24'),
(381, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:31:52', '2023-10-24'),
(382, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:40:50', '2023-10-24'),
(383, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:37:15', '2023-10-24'),
(384, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:38:19', '2023-10-24'),
(385, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:38:47', '2023-10-24'),
(386, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:40:18', '2023-10-24'),
(387, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:46:15', '2023-10-24'),
(388, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:47:11', '2023-10-24'),
(389, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged In', '15:47:25', '2023-10-24'),
(390, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged Out', '15:49:50', '2023-10-24'),
(391, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:08:23', '2023-10-24'),
(392, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:33:00', '2023-10-24'),
(393, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:36:36', '2023-10-24'),
(394, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:36:46', '2023-10-24'),
(395, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:42:09', '2023-10-24'),
(396, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '21:16:09', '2023-10-24'),
(397, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '21:28:54', '2023-10-24'),
(398, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '11:16:32', '2023-10-25'),
(399, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:05:46', '2023-10-25'),
(400, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:08:09', '2023-10-25'),
(401, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:10:59', '2023-10-25'),
(402, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:33:25', '2023-10-25'),
(403, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:34:13', '2023-10-25'),
(404, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:26:58', '2023-10-25'),
(405, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:28:55', '2023-10-25'),
(406, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:41:18', '2023-10-25'),
(407, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:18:58', '2023-10-25'),
(408, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:35:58', '2023-10-25'),
(409, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:37:11', '2023-10-25'),
(410, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:40:45', '2023-10-25'),
(411, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:38:14', '2023-10-25'),
(412, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:44:13', '2023-10-25'),
(413, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:44:20', '2023-10-25'),
(414, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:54:15', '2023-10-25'),
(415, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:06:01', '2023-10-25'),
(416, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:08:36', '2023-10-25'),
(417, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:08:51', '2023-10-25'),
(418, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:11:11', '2023-10-25'),
(419, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:12:14', '2023-10-25'),
(420, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:13:54', '2023-10-25'),
(421, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:18:12', '2023-10-25'),
(422, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:27:44', '2023-10-25'),
(423, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:28:05', '2023-10-25'),
(424, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:28:32', '2023-10-25'),
(425, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:33:04', '2023-10-25'),
(426, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:37:47', '2023-10-25'),
(427, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:38:27', '2023-10-25'),
(428, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:40:08', '2023-10-25'),
(429, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:40:48', '2023-10-25'),
(430, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:51:51', '2023-10-25'),
(431, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:52:07', '2023-10-25'),
(432, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:44:53', '2023-10-25'),
(433, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:14:10', '2023-10-25'),
(434, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '20:14:18', '2023-10-25'),
(435, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged Out', '20:14:35', '2023-10-25'),
(436, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '20:14:41', '2023-10-25'),
(437, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '20:20:22', '2023-10-25'),
(438, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:20:29', '2023-10-25'),
(439, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:18:13', '2023-10-25'),
(440, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:21:36', '2023-10-25'),
(441, 27, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '21:21:43', '2023-10-25'),
(442, 27, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged Out', '21:22:46', '2023-10-25'),
(443, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:10:27', '2023-10-28'),
(444, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:12:17', '2023-10-28'),
(445, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:32:21', '2023-10-29'),
(446, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:32:27', '2023-10-29'),
(447, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:33:10', '2023-10-29'),
(448, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:37:41', '2023-10-29'),
(449, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:41:43', '2023-10-29'),
(450, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:48:32', '2023-10-29'),
(451, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:49:54', '2023-10-29'),
(452, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:56:31', '2023-10-29'),
(453, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '11:57:32', '2023-10-29'),
(454, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '11:58:43', '2023-10-29'),
(455, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:58:51', '2023-10-29'),
(456, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:07:51', '2023-10-29'),
(457, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:16:57', '2023-10-29'),
(458, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:05:58', '2023-10-29'),
(459, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:06:33', '2023-10-29'),
(460, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:14:51', '2023-10-29'),
(461, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:15:03', '2023-10-29'),
(462, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:07:56', '2023-10-29'),
(463, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:09:23', '2023-10-29'),
(464, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:15:39', '2023-10-29'),
(465, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:16:30', '2023-10-29'),
(466, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged In', '20:20:29', '2023-10-29'),
(467, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged In', '20:23:00', '2023-10-29'),
(468, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged Out', '20:33:28', '2023-10-29'),
(469, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '00:43:09', '2023-10-30'),
(470, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '00:43:59', '2023-10-30'),
(471, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:26:36', '2023-10-30'),
(472, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:27:31', '2023-10-30'),
(473, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:45:52', '2023-10-30'),
(474, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:48:08', '2023-10-30'),
(475, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:51:23', '2023-10-30'),
(476, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:51:43', '2023-10-30'),
(477, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:54:33', '2023-10-30'),
(478, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:56:01', '2023-10-30'),
(479, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:04:33', '2023-10-30'),
(480, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:04:35', '2023-10-30'),
(481, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '18:04:41', '2023-10-30'),
(482, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '18:04:48', '2023-10-30'),
(483, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:29:08', '2023-10-30'),
(484, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:29:59', '2023-10-30'),
(485, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:36:44', '2023-10-30'),
(486, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:41:18', '2023-10-30'),
(487, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:43:19', '2023-10-30'),
(488, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:46:27', '2023-10-30'),
(489, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:49:10', '2023-10-30'),
(490, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:58:15', '2023-10-30'),
(491, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:08:06', '2023-10-30'),
(492, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:23:07', '2023-10-30'),
(493, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:24:59', '2023-10-30'),
(494, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:29:42', '2023-10-30'),
(495, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:54:17', '2023-10-30'),
(496, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:54:30', '2023-10-30'),
(497, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:05:09', '2023-10-30'),
(498, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:06:14', '2023-10-30'),
(499, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:57:43', '2023-10-31'),
(500, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:03:07', '2023-10-31'),
(501, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:29:15', '2023-10-31'),
(502, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:29:31', '2023-10-31'),
(503, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:14:51', '2023-10-31'),
(504, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:33:44', '2023-10-31'),
(505, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:37:45', '2023-10-31'),
(506, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:42:01', '2023-10-31'),
(507, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:51:38', '2023-10-31'),
(508, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:54:04', '2023-10-31'),
(509, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:04:50', '2023-10-31'),
(510, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:13:56', '2023-10-31'),
(511, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '21:01:44', '2023-10-31'),
(512, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '21:02:02', '2023-10-31'),
(513, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:33:38', '2023-11-01'),
(514, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:33:46', '2023-11-01'),
(515, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:34:13', '2023-11-01'),
(516, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:34:26', '2023-11-01'),
(517, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:35:18', '2023-11-01'),
(518, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:35:26', '2023-11-01'),
(519, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:36:00', '2023-11-01'),
(520, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:36:56', '2023-11-01'),
(521, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:37:01', '2023-11-01'),
(522, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:37:07', '2023-11-01'),
(523, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:19:58', '2023-11-01'),
(524, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:21:19', '2023-11-01'),
(525, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:21:31', '2023-11-01'),
(526, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:21:41', '2023-11-01'),
(527, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:23:26', '2023-11-01'),
(528, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:23:34', '2023-11-01'),
(529, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:26:54', '2023-11-01'),
(530, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:27:26', '2023-11-01'),
(531, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:27:39', '2023-11-01'),
(532, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:30:49', '2023-11-01'),
(533, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:30:53', '2023-11-01'),
(534, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:31:42', '2023-11-01'),
(535, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:31:45', '2023-11-01'),
(536, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:32:14', '2023-11-01'),
(537, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:32:21', '2023-11-01'),
(538, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:32:24', '2023-11-01'),
(539, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:32:54', '2023-11-01'),
(540, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:33:50', '2023-11-01'),
(541, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:35:51', '2023-11-01'),
(542, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:35:59', '2023-11-01'),
(543, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:36:02', '2023-11-01'),
(544, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:36:30', '2023-11-01'),
(545, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:36:34', '2023-11-01'),
(546, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:37:55', '2023-11-01'),
(547, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:37:57', '2023-11-01'),
(548, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:39:02', '2023-11-01'),
(549, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:39:16', '2023-11-01'),
(550, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:25:45', '2023-11-01'),
(551, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:27:17', '2023-11-01'),
(552, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:23:38', '2023-11-03'),
(553, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:24:14', '2023-11-03'),
(554, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:25:46', '2023-11-03'),
(555, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:25:49', '2023-11-03'),
(556, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '13:25:56', '2023-11-03'),
(557, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '13:25:58', '2023-11-03'),
(558, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '13:26:05', '2023-11-03'),
(559, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '13:30:08', '2023-11-03'),
(560, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '13:33:33', '2023-11-03'),
(561, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:49:02', '2023-11-03'),
(562, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:49:12', '2023-11-03'),
(563, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:49:59', '2023-11-03'),
(564, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:52:08', '2023-11-03'),
(565, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '13:52:11', '2023-11-03'),
(566, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:07:56', '2023-11-03'),
(567, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:08:21', '2023-11-03'),
(568, 28, 'John Kramer', 'jigsaw69', 'Employee', 'Logged In', '17:25:21', '2023-11-03'),
(569, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:31:11', '2023-11-03'),
(570, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:55:37', '2023-11-03'),
(571, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:56:05', '2023-11-03'),
(572, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:02:55', '2023-11-06'),
(573, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:03:40', '2023-11-06'),
(574, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '21:04:31', '2023-11-06'),
(575, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '21:06:57', '2023-11-06'),
(576, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:07:03', '2023-11-06'),
(577, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:09:49', '2023-11-06'),
(578, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '21:12:19', '2023-11-06'),
(579, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '21:13:43', '2023-11-06'),
(580, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:13:53', '2023-11-06'),
(581, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:27:00', '2023-11-06'),
(582, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:48:06', '2023-11-10'),
(583, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:55:14', '2023-11-10'),
(584, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:56:30', '2023-11-11'),
(585, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:44:16', '2023-11-11'),
(586, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:45:40', '2023-11-11'),
(587, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '20:45:48', '2023-11-11'),
(588, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '20:45:54', '2023-11-11'),
(589, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:46:15', '2023-11-11'),
(590, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:46:30', '2023-11-11'),
(591, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '20:46:38', '2023-11-11'),
(592, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '20:46:48', '2023-11-11'),
(593, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged Out', '20:48:44', '2023-11-11'),
(594, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '22:13:38', '2023-11-11'),
(595, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '22:17:03', '2023-11-11'),
(596, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:17:09', '2023-11-11'),
(597, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:20:01', '2023-11-11'),
(598, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '22:21:27', '2023-11-11'),
(599, 20, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '22:21:31', '2023-11-11'),
(600, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:27:10', '2023-11-11'),
(601, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:28:53', '2023-11-11'),
(602, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:29:53', '2023-11-11'),
(603, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:31:19', '2023-11-11'),
(604, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:46:33', '2023-11-14'),
(605, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '00:26:36', '2023-11-15'),
(606, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '00:36:18', '2023-11-15'),
(607, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '00:37:47', '2023-11-15'),
(608, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:45:06', '2023-11-15'),
(609, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:46:17', '2023-11-15'),
(610, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:24:25', '2023-11-18'),
(611, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:49:37', '2023-11-18'),
(612, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged In', '17:50:01', '2023-11-18'),
(613, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged Out', '17:51:44', '2023-11-18'),
(614, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '21:45:45', '2023-11-18'),
(615, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged Out', '21:46:26', '2023-11-18'),
(616, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:46:32', '2023-11-18'),
(617, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:47:43', '2023-11-18'),
(618, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:52:52', '2023-11-18'),
(619, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:01:05', '2023-11-18'),
(620, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:03:27', '2023-11-18'),
(621, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:27:10', '2023-11-24'),
(622, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:30:54', '2023-11-24'),
(623, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:38:54', '2023-11-24'),
(624, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:39:39', '2023-11-24'),
(625, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:16:57', '2023-11-28'),
(626, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:17:01', '2023-11-28'),
(627, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:18:55', '2023-11-28'),
(628, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:49:16', '2023-11-28'),
(629, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:49:56', '2023-11-28'),
(630, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:10:21', '2023-11-28'),
(631, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:10:30', '2023-11-28'),
(632, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:23:07', '2023-11-28'),
(633, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:28:00', '2023-11-28'),
(634, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '00:35:45', '2023-11-29'),
(635, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '00:36:16', '2023-11-29'),
(636, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '10:17:01', '2023-11-29'),
(637, 29, 'Evaluation Account', 'tester1', 'Administrator', 'Logged In', '10:25:42', '2023-11-29'),
(638, 29, 'Evaluation Account', 'tester1', 'Administrator', 'Logged In', '11:14:12', '2023-11-29'),
(639, 29, 'Evaluation Account', 'tester1', 'Administrator', 'Logged Out', '11:27:57', '2023-11-29'),
(640, 30, 'Employee Evaluation', 'emptester', 'Employee', 'Logged In', '11:28:13', '2023-11-29'),
(641, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:37:08', '2023-11-29'),
(642, 30, 'Employee Evaluation', 'emptester', 'Employee', 'Logged In', '11:37:22', '2023-11-29'),
(643, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:58:26', '2023-11-29'),
(644, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:00:55', '2023-11-29'),
(645, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:47:40', '2023-11-29'),
(646, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:11:05', '2023-11-29'),
(647, 29, 'Evaluation Account', 'tester1', 'Administrator', 'Logged In', '17:33:14', '2023-11-29'),
(648, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:40:58', '2023-11-29'),
(649, 32, 'juan dela cruz', 'jdcruz', 'Employee', 'Logged In', '20:55:51', '2023-11-29'),
(650, 32, 'juan dela cruz', 'jdcruz', 'Employee', 'Logged In', '21:00:27', '2023-11-29'),
(651, 29, 'Evaluation Account', 'tester1', 'Administrator', 'Logged In', '21:57:14', '2023-11-29'),
(652, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:39:42', '2023-11-29'),
(653, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:45:30', '2023-11-29'),
(654, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:01:31', '2023-11-29'),
(655, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:02:53', '2023-11-29'),
(656, 33, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '23:03:10', '2023-11-29'),
(657, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:47:14', '2023-11-30'),
(658, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:41:53', '2023-11-30'),
(659, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:43:02', '2023-11-30'),
(660, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:07:38', '2023-11-30'),
(661, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '08:39:39', '2023-12-01'),
(662, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '08:49:42', '2023-12-01'),
(663, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:26:12', '2023-12-01'),
(664, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:31:52', '2023-12-01'),
(665, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:34:17', '2023-12-01'),
(666, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:34:52', '2023-12-01'),
(667, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:34:59', '2023-12-01'),
(668, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:35:14', '2023-12-01'),
(669, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:35:46', '2023-12-01'),
(670, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:38:29', '2023-12-01'),
(671, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:38:36', '2023-12-01'),
(672, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:42:23', '2023-12-01'),
(673, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:42:30', '2023-12-01'),
(674, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:44:15', '2023-12-01'),
(675, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:44:39', '2023-12-01'),
(676, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:53:27', '2023-12-01'),
(677, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:53:34', '2023-12-01'),
(678, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:04:12', '2023-12-01'),
(679, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:04:19', '2023-12-01'),
(680, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:04:28', '2023-12-01'),
(681, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:04:34', '2023-12-01'),
(682, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:06:04', '2023-12-01'),
(683, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:06:11', '2023-12-01'),
(684, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:06:31', '2023-12-01'),
(685, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:06:37', '2023-12-01'),
(686, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:10:48', '2023-12-01'),
(687, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:10:54', '2023-12-01'),
(688, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:11:00', '2023-12-01'),
(689, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:11:10', '2023-12-01'),
(690, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:12:26', '2023-12-01'),
(691, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:12:52', '2023-12-01'),
(692, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:13:28', '2023-12-01'),
(693, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:13:38', '2023-12-01'),
(694, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:15:45', '2023-12-01'),
(695, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:15:57', '2023-12-01'),
(696, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:16:56', '2023-12-01'),
(697, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:17:02', '2023-12-01'),
(698, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:17:09', '2023-12-01'),
(699, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:17:14', '2023-12-01'),
(700, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:17:41', '2023-12-01'),
(701, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:20:59', '2023-12-01'),
(702, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:21:07', '2023-12-01'),
(703, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:21:14', '2023-12-01'),
(704, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:21:21', '2023-12-01'),
(705, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:22:05', '2023-12-01'),
(706, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:22:16', '2023-12-01'),
(707, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:22:22', '2023-12-01'),
(708, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:22:28', '2023-12-01'),
(709, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:22:35', '2023-12-01'),
(710, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:22:41', '2023-12-01'),
(711, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:22:47', '2023-12-01'),
(712, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:22:51', '2023-12-01'),
(713, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:34:38', '2023-12-01'),
(714, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:34:46', '2023-12-01'),
(715, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:01:37', '2023-12-01'),
(716, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:04:06', '2023-12-01'),
(717, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:04:56', '2023-12-01'),
(718, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:05:15', '2023-12-01'),
(719, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:12:55', '2023-12-01'),
(720, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:13:04', '2023-12-01'),
(721, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:41:14', '2023-12-01'),
(722, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:43:46', '2023-12-01'),
(723, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:50:24', '2023-12-01'),
(724, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:50:31', '2023-12-01'),
(725, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:53:17', '2023-12-01'),
(726, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:53:29', '2023-12-01'),
(727, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:56:40', '2023-12-01'),
(728, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:57:03', '2023-12-01'),
(729, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:57:25', '2023-12-01'),
(730, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:57:33', '2023-12-01'),
(731, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:14:32', '2023-12-01'),
(732, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:14:53', '2023-12-01'),
(733, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:35:59', '2023-12-01'),
(734, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:36:09', '2023-12-01'),
(735, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:36:15', '2023-12-01'),
(736, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:36:55', '2023-12-01'),
(737, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:37:01', '2023-12-01'),
(738, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:37:07', '2023-12-01'),
(739, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:37:26', '2023-12-01'),
(740, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:37:31', '2023-12-01'),
(741, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged In', '15:43:29', '2023-12-01'),
(742, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '15:45:52', '2023-12-01'),
(743, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:45:59', '2023-12-01'),
(744, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '15:47:33', '2023-12-01'),
(745, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:49:31', '2023-12-01'),
(746, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:49:36', '2023-12-01'),
(747, 3, 'Chenelle Abrio', 'yukiyui.yun', 'Administrator', 'Logged Out', '15:53:52', '2023-12-01'),
(748, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:56:22', '2023-12-01'),
(749, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:56:48', '2023-12-01'),
(750, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:03:18', '2023-12-01'),
(751, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:03:24', '2023-12-01'),
(752, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:03:30', '2023-12-01'),
(753, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:04:46', '2023-12-01'),
(754, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:17:36', '2023-12-01'),
(755, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:18:50', '2023-12-01'),
(756, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:18:56', '2023-12-01'),
(757, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:20:24', '2023-12-01'),
(758, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:20:30', '2023-12-01'),
(759, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:20:39', '2023-12-01'),
(760, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:20:45', '2023-12-01'),
(761, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:22:59', '2023-12-01'),
(762, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:23:05', '2023-12-01'),
(763, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:25:34', '2023-12-01'),
(764, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:32:08', '2023-12-01'),
(765, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:32:25', '2023-12-01'),
(766, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:35:51', '2023-12-01'),
(767, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:36:06', '2023-12-01'),
(768, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:50:00', '2023-12-01'),
(769, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:50:21', '2023-12-01'),
(770, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:56:45', '2023-12-01'),
(771, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:56:59', '2023-12-01'),
(772, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:57:25', '2023-12-01'),
(773, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:59:31', '2023-12-01'),
(774, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:13:32', '2023-12-01'),
(775, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:19:59', '2023-12-01'),
(776, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:29:44', '2023-12-01'),
(777, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '18:29:55', '2023-12-01'),
(778, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '18:30:28', '2023-12-01'),
(779, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:54:29', '2023-12-01'),
(780, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:56:33', '2023-12-01'),
(781, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '19:17:45', '2023-12-01'),
(782, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '19:24:53', '2023-12-01'),
(783, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '22:40:33', '2023-12-01'),
(784, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '22:41:34', '2023-12-01'),
(785, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '11:38:25', '2023-12-02'),
(786, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '00:35:07', '2023-12-03'),
(787, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '00:35:13', '2023-12-03');
INSERT INTO `branch1_user_logs` (`log_id`, `user_id`, `name`, `username`, `role`, `action`, `log_time`, `log_date`) VALUES
(788, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '00:35:22', '2023-12-03'),
(789, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '00:35:28', '2023-12-03'),
(790, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '00:35:57', '2023-12-03'),
(791, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:33:02', '2023-12-05'),
(792, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:33:32', '2023-12-05'),
(793, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:33:40', '2023-12-05'),
(794, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:02:01', '2023-12-05'),
(795, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:03:51', '2023-12-05'),
(796, 35, 'Admin Evaluation', 'admineval', 'Administrator', 'Logged In', '15:04:41', '2023-12-05'),
(797, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:07:49', '2023-12-05'),
(798, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:08:07', '2023-12-05'),
(799, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:11:04', '2023-12-05'),
(800, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:11:25', '2023-12-05'),
(801, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:33:26', '2023-12-05'),
(802, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:37:24', '2023-12-05'),
(803, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '19:53:49', '2023-12-05'),
(804, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '20:07:09', '2023-12-05'),
(805, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '20:07:58', '2023-12-05'),
(806, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '20:14:14', '2023-12-05'),
(807, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '20:14:23', '2023-12-05'),
(808, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '20:18:58', '2023-12-05'),
(809, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '20:20:02', '2023-12-05'),
(810, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '20:20:16', '2023-12-05'),
(811, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '20:33:40', '2023-12-05'),
(812, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '01:39:53', '2023-12-06'),
(813, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '01:40:20', '2023-12-06'),
(814, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:01:48', '2023-12-07'),
(815, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:05:13', '2023-12-07'),
(816, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:10:36', '2023-12-07'),
(817, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:10:46', '2023-12-07'),
(818, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '17:10:52', '2023-12-07'),
(819, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '17:11:40', '2023-12-07'),
(820, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:52:21', '2023-12-12'),
(821, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:34:53', '2023-12-12'),
(822, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:35:37', '2023-12-12'),
(823, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:19:37', '2023-12-15'),
(824, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:21:53', '2023-12-17'),
(825, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:24:51', '2023-12-17'),
(826, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:53:03', '2023-12-22'),
(827, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:53:35', '2023-12-22'),
(828, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:35:49', '2023-12-23'),
(829, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:38:08', '2023-12-23'),
(830, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:40:34', '2023-12-23'),
(831, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:44:59', '2023-12-23'),
(832, 36, 'Elgim Cadiwitan', 'admineval', 'Administrator', 'Logged In', '16:03:31', '2023-12-24'),
(833, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:09:46', '2023-12-25'),
(834, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:10:12', '2023-12-25'),
(835, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '16:10:19', '2023-12-25'),
(836, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '16:11:15', '2023-12-25'),
(837, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:11:21', '2023-12-25'),
(838, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:11:28', '2023-12-25'),
(839, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:15:52', '2023-12-25'),
(840, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '16:15:58', '2023-12-25'),
(841, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '16:23:35', '2023-12-25'),
(842, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:23:42', '2023-12-25'),
(843, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:45:54', '2023-12-25'),
(844, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:46:02', '2023-12-25'),
(845, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:46:06', '2023-12-25'),
(846, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '16:46:13', '2023-12-25'),
(847, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '17:28:03', '2023-12-25'),
(848, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:57:52', '2023-12-27'),
(849, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:26:34', '2023-12-27'),
(850, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:10:03', '2024-01-08'),
(851, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:11:59', '2024-01-08'),
(852, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:23:09', '2024-01-08'),
(853, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:26:37', '2024-01-08'),
(854, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:58:59', '2024-01-10'),
(855, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:00:09', '2024-01-10'),
(856, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:08:41', '2024-01-10'),
(857, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:10:24', '2024-01-10'),
(858, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:48:54', '2024-01-17'),
(859, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:52:01', '2024-01-17'),
(860, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '22:56:50', '2024-01-18'),
(861, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '22:57:18', '2024-01-18'),
(862, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '22:58:11', '2024-01-18'),
(863, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '22:59:55', '2024-01-18'),
(864, 37, 'Admin Account', 'admin1', 'Administrator', 'Logged In', '23:00:15', '2024-01-18'),
(865, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '10:37:50', '2024-01-20'),
(866, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '10:38:27', '2024-01-20'),
(867, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '11:11:35', '2024-01-20'),
(868, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:19:39', '2024-01-20'),
(869, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:23:08', '2024-01-20'),
(870, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:23:21', '2024-01-20'),
(871, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:31:18', '2024-01-20'),
(872, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:31:45', '2024-01-20'),
(873, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:51:02', '2024-01-20'),
(874, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:56:49', '2024-01-20'),
(875, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:05:31', '2024-01-20'),
(876, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:05:50', '2024-01-20'),
(877, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:06:22', '2024-01-20'),
(878, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '14:06:55', '2024-01-20'),
(879, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '14:10:19', '2024-01-20'),
(880, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:17:20', '2024-01-23'),
(881, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:18:04', '2024-01-23'),
(882, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:18:44', '2024-01-23'),
(883, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:18:03', '2024-02-04'),
(884, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:18:28', '2024-02-04'),
(885, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:31:16', '2024-02-04'),
(886, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:31:58', '2024-02-04'),
(887, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:37:24', '2024-02-04'),
(888, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:37:39', '2024-02-04'),
(889, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '14:37:47', '2024-02-04'),
(890, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '14:37:54', '2024-02-04'),
(891, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:59:24', '2024-02-04'),
(892, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:59:49', '2024-02-04'),
(893, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '15:01:39', '2024-02-04'),
(894, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '15:02:02', '2024-02-04'),
(895, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:02:10', '2024-02-04'),
(896, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:04:27', '2024-02-04'),
(897, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '00:07:49', '2024-02-05'),
(898, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '00:00:44', '2024-02-17'),
(899, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '00:02:44', '2024-02-17'),
(900, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:10:23', '2024-02-17'),
(901, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:11:06', '2024-02-17'),
(902, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '12:11:31', '2024-02-17'),
(903, 14, 'Emmanuel Lobos', 'admin12345', 'Administrator', 'Logged In', '12:18:15', '2024-02-17'),
(904, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:54:33', '2024-02-17'),
(905, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:55:36', '2024-02-17'),
(906, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '11:44:00', '2024-02-23'),
(907, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:54:50', '2024-02-23'),
(908, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:13:12', '2024-02-23'),
(909, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '15:13:26', '2024-02-23'),
(910, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '15:14:30', '2024-02-23'),
(911, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:14:41', '2024-02-23'),
(912, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:24:36', '2024-02-23'),
(913, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '15:24:47', '2024-02-23'),
(914, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '15:29:45', '2024-02-23'),
(915, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:29:56', '2024-02-23'),
(916, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:47:33', '2024-02-23'),
(917, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:14:29', '2024-02-28'),
(918, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:15:27', '2024-02-28'),
(919, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '19:45:52', '2024-03-05'),
(920, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '19:46:12', '2024-03-05'),
(921, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '15:32:26', '2024-03-28'),
(922, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '15:33:09', '2024-03-28'),
(923, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:54:39', '2024-04-01'),
(924, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:06:56', '2024-04-01'),
(925, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '18:07:06', '2024-04-01'),
(926, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '18:10:27', '2024-04-01'),
(927, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:13:33', '2024-04-01'),
(928, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:43:07', '2024-04-01'),
(929, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '19:17:17', '2024-04-01'),
(930, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '19:17:56', '2024-04-01'),
(931, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '19:18:09', '2024-04-01'),
(932, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '19:18:40', '2024-04-01'),
(933, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '19:20:37', '2024-04-01'),
(934, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:58:43', '2024-04-01'),
(935, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:22:52', '2024-04-22'),
(936, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:22:55', '2024-04-22'),
(937, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '20:23:08', '2024-04-22'),
(938, 34, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '20:28:08', '2024-04-22'),
(939, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:06:19', '2024-04-26'),
(940, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:06:26', '2024-04-26'),
(941, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:13:09', '2024-04-26'),
(942, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:57:04', '2024-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `branch2_crud`
--

CREATE TABLE `branch2_crud` (
  `action_id` int(11) NOT NULL,
  `action_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch2_crud`
--

INSERT INTO `branch2_crud` (`action_id`, `action_type`, `user_id`, `username`, `full_name`, `role`, `time`, `date`, `table_name`, `record_id`) VALUES
(1, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:09:24', '2023-10-09', 'Inventory', 3),
(2, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:09:57', '2023-10-09', 'Inventory', 3),
(3, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:10:06', '2023-10-09', 'Inventory', 3),
(4, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:18:41', '2023-10-09', 'Sales', 1),
(5, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:19:06', '2023-10-09', 'Orders', 4),
(6, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:19:47', '2023-10-09', 'Orders', 4),
(7, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:20:10', '2023-10-09', 'Orders', 5),
(8, 'Made a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:20:27', '2023-10-09', 'Orders', 4),
(9, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:28', '2023-10-09', 'Orders', 6),
(10, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:34', '2023-10-09', 'Orders', 6),
(11, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:24:42', '2023-10-09', 'Voided', 1),
(12, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:27:38', '2023-10-09', 'Sales', 1),
(13, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:33:37', '2023-10-09', 'Accounts', 7),
(14, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:34:12', '2023-10-09', 'Accounts', 8),
(15, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:51:47', '2023-10-09', 'Suppliers', 2),
(16, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:51:58', '2023-10-09', 'Suppliers', 2),
(17, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:52:08', '2023-10-09', 'Inventory', 2),
(21, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:37:54', '2023-10-09', 'Orders', 7),
(22, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '23:30:58', '2023-10-09', 'Orders', 7),
(23, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:25:00', '2023-10-22', 'Inventory', 4),
(24, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:25:09', '2023-10-22', 'Inventory', 4),
(25, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:25:16', '2023-10-22', 'Inventory', 4),
(26, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:25:21', '2023-10-22', 'Inventory', 4),
(27, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:26:36', '2023-10-22', 'Orders', 8),
(28, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:26:43', '2023-10-22', 'Orders', 8),
(29, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:32:05', '2023-10-22', 'Orders', 8),
(30, 'Made a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:34:03', '2023-10-22', 'Orders', 8),
(31, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:36:10', '2023-10-22', 'Accounts', 11),
(32, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:36:22', '2023-10-22', 'Accounts', 8),
(33, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:36:39', '2023-10-22', 'Suppliers', 3),
(34, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:36:45', '2023-10-22', 'Suppliers', 3),
(35, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:36:50', '2023-10-22', 'Suppliers', 3),
(36, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '12:36:53', '2023-10-22', 'Inventory', 3),
(37, 'Added a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '18:49:59', '2023-10-23', 'Inventory', 5),
(38, 'Edited a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '18:50:22', '2023-10-23', 'Inventory', 5),
(39, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '18:50:35', '2023-10-23', 'Inventory', 5),
(40, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:00:13', '2023-10-23', 'Orders', 9),
(41, 'Created a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:04:05', '2023-10-23', 'Sales', 4),
(42, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:48:15', '2023-10-23', 'Orders', 10),
(43, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:48:36', '2023-10-23', 'Orders', 11),
(44, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:48:41', '2023-10-23', 'Orders', 11),
(45, 'Voided an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:50:36', '2023-10-23', 'Orders', 11),
(46, 'Made a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:50:48', '2023-10-23', 'Orders', 10),
(47, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:51:15', '2023-10-23', 'Orders', 12),
(48, 'Removed an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:51:19', '2023-10-23', 'Orders', 12),
(49, 'Removed a Voided Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:51:32', '2023-10-23', 'Voided', 7),
(50, 'Removed a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:54:11', '2023-10-23', 'Sales', 5),
(51, 'Created an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '20:00:01', '2023-10-23', 'Accounts', 13),
(52, 'Removed an Account', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '20:01:14', '2023-10-23', 'Accounts', 13),
(53, 'Deleted a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '20:05:50', '2023-10-23', 'Inventory', 4),
(54, 'Added a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '20:06:11', '2023-10-23', 'Suppliers', 5),
(55, 'Edited a Supplier', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '20:06:16', '2023-10-23', 'Suppliers', 5),
(56, 'Deleted a Product', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '12:06:05', '2023-10-25', 'Inventory', 2),
(57, 'Created an Order', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:03:34', '2023-10-31', 'Orders', 13),
(58, 'Made a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:03:51', '2023-10-31', 'Orders', 13),
(59, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:42:16', '2023-10-31', 'Sales', 13),
(60, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:42:16', '2023-10-31', 'Sales', 14),
(61, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:42:16', '2023-10-31', 'Sales', 15),
(62, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:43:04', '2023-10-31', 'Sales', 16),
(63, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:43:04', '2023-10-31', 'Sales', 17),
(64, 'Imported Sales', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '19:43:04', '2023-10-31', 'Sales', 18),
(65, 'Made a Sale', 1, 'ngarce', 'Nico Roell Garce', 'Administrator', '13:42:37', '2023-11-03', 'Orders', 9),
(66, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '22:45:51', '2023-11-29', 'Accounts', 4),
(67, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:52:26', '2023-12-01', 'Accounts', 14),
(68, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:53:50', '2023-12-01', 'Accounts', 15),
(69, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:55:57', '2023-12-01', 'Accounts', 15),
(70, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:56:26', '2023-12-01', 'Accounts', 16),
(71, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:56:27', '2023-12-01', 'Accounts', 15),
(72, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:58:51', '2023-12-01', 'Sales', 16),
(73, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '08:59:55', '2023-12-01', 'Sales', 16),
(74, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:00:00', '2023-12-01', 'Sales', 16),
(75, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:01:42', '2023-12-01', 'Inventory', 6),
(76, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:01:55', '2023-12-01', 'Inventory', 6),
(77, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:03:43', '2023-12-01', 'Orders', 14),
(78, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:04:48', '2023-12-01', 'Orders', 14),
(79, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:05:36', '2023-12-01', 'Suppliers', 5),
(80, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:05:43', '2023-12-01', 'Inventory', 1),
(81, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:06:36', '2023-12-01', 'Suppliers', 1),
(82, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:07:18', '2023-12-01', 'Orders', 15),
(83, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:07:56', '2023-12-01', 'Orders', 15),
(84, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:45:02', '2023-12-01', 'Sales', 20),
(85, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:45:02', '2023-12-01', 'Sales', 21),
(86, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:45:02', '2023-12-01', 'Sales', 22);

-- --------------------------------------------------------

--
-- Table structure for table `branch2_inventory`
--

CREATE TABLE `branch2_inventory` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date_ordered` date NOT NULL,
  `date_arrival` date NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch2_inventory`
--

INSERT INTO `branch2_inventory` (`product_id`, `product_name`, `stock`, `price`, `category`, `date_ordered`, `date_arrival`, `date_added`, `added_by`, `user_id`, `supplier_id`, `supplier_name`) VALUES
(1, 'Bricks', 985, 50.00, 'Building Materials', '2023-08-09', '2023-09-10', '2023-09-10', 'Nico Garce', 1, 1, 'supplier 1');

-- --------------------------------------------------------

--
-- Table structure for table `branch2_orders`
--

CREATE TABLE `branch2_orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_list`)),
  `pay_method` varchar(255) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `shipping_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch2_orders`
--

INSERT INTO `branch2_orders` (`order_id`, `customer_name`, `order_date`, `order_time`, `order_list`, `pay_method`, `total_cost`, `order_status`, `payment_status`, `contact_info`, `order_type`, `user_id`, `salesperson`, `shipping_details`) VALUES
(11, 'Elgim Cadiwitan', '2023-10-23', '19:48:36', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"50.00\"}]', 'Cash', 50.00, 'Cancelled', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A'),
(15, 'Nico Roell Garce', '2023-12-01', '14:07:18', '[{\"product_name\":\"Bricks\",\"quantity\":1,\"price\":\"50.00\"}]', 'Cash', 50.00, 'In Fullfillment', 'Pending', '09xx xxx xxxx', 'In-Store', 1, 'Nico Garce', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `branch2_sales`
--

CREATE TABLE `branch2_sales` (
  `sale_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_list`)),
  `total_cost` decimal(10,2) NOT NULL,
  `pay_method` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `shipping_details` varchar(255) NOT NULL,
  `date_complete` date NOT NULL,
  `time_complete` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch2_sales`
--

INSERT INTO `branch2_sales` (`sale_id`, `customer_name`, `order_date`, `order_time`, `order_list`, `total_cost`, `pay_method`, `order_status`, `payment_status`, `contact_info`, `order_type`, `user_id`, `salesperson`, `shipping_details`, `date_complete`, `time_complete`) VALUES
(3, 'Nico Roell Garce', '2023-10-22', '12:26:36', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"50.00\"}]', 50.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-22', '12:34:03'),
(4, 'Nico Roell Garce', '2023-10-23', '19:04:05', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"50.00\"}]', 50.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2023-10-23', '19:04:05'),
(6, 'Nico Roell Garce', '2023-10-31', '13:03:34', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"50.00\"}]', 50.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2023-10-31', '13:03:51'),
(13, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(14, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(15, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(17, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(18, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(19, 'John Doe', '2023-10-23', '19:00:13', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"50.00\"}]', 50.00, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Roell Garce', 'N/A', '2023-11-03', '13:42:37'),
(20, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(21, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(22, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `branch2_suppliers`
--

CREATE TABLE `branch2_suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch2_suppliers`
--

INSERT INTO `branch2_suppliers` (`supplier_id`, `supplier_name`, `description`, `address`, `contact`) VALUES
(1, 'supplier ', 'Description 1', 'Address 1', 'Contact 1');

-- --------------------------------------------------------

--
-- Table structure for table `branch2_users`
--

CREATE TABLE `branch2_users` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_added` date NOT NULL,
  `branch` varchar(255) NOT NULL DEFAULT 'Branch 2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch2_users`
--

INSERT INTO `branch2_users` (`ID`, `firstName`, `lastName`, `username`, `password`, `mobile`, `email`, `address`, `role`, `photo`, `date_added`, `branch`) VALUES
(1, 'Nico', 'Garce', 'ngarce', '$2y$10$7029qUbE8EDx8cWYCnkVHuKT4UtJGd38fy/6Xj6fEBqhJKf7XxDaG', '09091558980', 'ngarce36@gmail.com', 'B33 L12 General M. Malvar SHV Putatan Muntinlupa City', 'Administrator', '../assets/user_upload/pic no name.jpg', '2023-09-08', 'Branch 2'),
(3, 'Chenelle', 'Abrio', 'yukiyui.yun', '$2y$10$xt/Td6sDVRqY6VOyRMAF7.eEteixC7pmviwEQX5Zxw7WH6kaQYAcG', '09480698220', 'takuyama.tazu@gmail.com', 'Sucat, Muntinlupa City', 'Employee', '', '2023-09-15', 'Branch 2'),
(6, 'Emmanuel', 'Lobos', 'employee2', '$2y$10$ih0WN3XxQK1m1agSgj2TRea39rRfUpnoc.MzhRYIEFV49VxoKEda.', '09090900909', 'emman@gmail.com', 'San Pedro, Laguna', 'Employee', '', '2023-09-15', 'Branch 2'),
(14, 'Employee', 'Evaluation', 'employee1', '$2y$10$zx1nv5BnuoEGrwK5EcUsWeKNr8OWxAfvdlyNbLa518ckBcLLnf592', '09090909099', 'johndoe@gmail.com', 'Address: 123 Main Street, Anytown, USA', 'Employee', NULL, '2023-12-01', 'Branch 2'),
(16, 'Harper', 'Bennett', 'employee3', '$2y$10$0F1HAV0lWWJbIkAtCs8QB..HQqEvXAZjyAZ2dLuEFBMa2/Betm3xu', '09550950955', 'harper.bennett@example.com', 'Evaluator\'s Address', 'Employee', NULL, '2023-12-01', 'Branch 2');

-- --------------------------------------------------------

--
-- Table structure for table `branch2_user_logs`
--

CREATE TABLE `branch2_user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `log_time` time NOT NULL,
  `log_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch2_user_logs`
--

INSERT INTO `branch2_user_logs` (`log_id`, `user_id`, `name`, `username`, `role`, `action`, `log_time`, `log_date`) VALUES
(1, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:36:33', '2023-09-08'),
(2, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:18:23', '2023-09-09'),
(3, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:19:22', '2023-09-09'),
(4, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:19:40', '2023-09-09'),
(5, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:19:48', '2023-09-09'),
(6, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:20:03', '2023-09-09'),
(7, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:20:09', '2023-09-09'),
(8, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:15:30', '2023-09-10'),
(9, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:39:57', '2023-09-10'),
(10, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:43:20', '2023-09-10'),
(11, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:45:43', '2023-09-10'),
(12, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:46:01', '2023-09-10'),
(13, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:37:21', '2023-09-10'),
(14, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:38:16', '2023-09-10'),
(15, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:45:22', '2023-09-11'),
(16, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:54:08', '2023-09-11'),
(17, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:25:34', '2023-09-11'),
(18, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:28:59', '2023-09-11'),
(19, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:20:17', '2023-09-11'),
(20, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:21:55', '2023-09-11'),
(21, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:56:04', '2023-09-11'),
(22, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:57:44', '2023-09-11'),
(23, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:10:27', '2023-09-11'),
(24, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:11:57', '2023-09-11'),
(25, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:13:01', '2023-09-11'),
(26, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:13:12', '2023-09-11'),
(27, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:21:40', '2023-09-11'),
(28, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:24:58', '2023-09-11'),
(29, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:26:48', '2023-09-11'),
(30, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:30:49', '2023-09-11'),
(31, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:32:48', '2023-09-11'),
(32, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '01:01:54', '2023-09-12'),
(33, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '01:10:41', '2023-09-12'),
(34, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '01:11:43', '2023-09-12'),
(35, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '01:35:59', '2023-09-12'),
(36, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '01:36:15', '2023-09-12'),
(37, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:45:30', '2023-09-13'),
(38, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:49:59', '2023-09-13'),
(39, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:07:11', '2023-09-15'),
(40, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:07:29', '2023-09-15'),
(41, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:11:24', '2023-09-15'),
(42, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:11:47', '2023-09-15'),
(43, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:36:32', '2023-09-16'),
(44, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:37:21', '2023-09-16'),
(45, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:35:16', '2023-09-21'),
(46, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:36:42', '2023-09-21'),
(47, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:39:21', '2023-09-21'),
(48, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:39:32', '2023-09-21'),
(49, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:41:02', '2023-09-21'),
(50, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:54:51', '2023-09-22'),
(51, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:16:53', '2023-09-22'),
(52, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:25:38', '2023-09-22'),
(53, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:29:19', '2023-09-22'),
(54, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:38:41', '2023-09-22'),
(55, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:38:45', '2023-09-22'),
(56, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:23:40', '2023-09-23'),
(57, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:31:58', '2023-09-23'),
(58, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:45:16', '2023-09-23'),
(59, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:45:23', '2023-09-23'),
(60, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:21:46', '2023-10-07'),
(61, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:22:33', '2023-10-07'),
(62, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:00:02', '2023-10-09'),
(63, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:54:22', '2023-10-09'),
(64, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:38:38', '2023-10-09'),
(65, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:39:11', '2023-10-09'),
(66, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:27:41', '2023-10-09'),
(67, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:29:21', '2023-10-09'),
(68, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:29:25', '2023-10-09'),
(69, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:30:24', '2023-10-09'),
(70, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:31:32', '2023-10-09'),
(71, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:37:38', '2023-10-09'),
(72, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:38:37', '2023-10-09'),
(73, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:41:16', '2023-10-09'),
(74, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:44:12', '2023-10-09'),
(75, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:26:13', '2023-10-09'),
(76, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:26:18', '2023-10-09'),
(77, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:30:47', '2023-10-09'),
(78, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:31:04', '2023-10-09'),
(79, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:37:07', '2023-10-09'),
(80, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:37:12', '2023-10-09'),
(81, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:14:08', '2023-10-10'),
(82, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:14:13', '2023-10-10'),
(83, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:53:57', '2023-10-19'),
(84, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:54:21', '2023-10-19'),
(85, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:43:49', '2023-10-22'),
(86, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:07:22', '2023-10-22'),
(87, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:10:58', '2023-10-22'),
(88, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:12:38', '2023-10-22'),
(89, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:24:27', '2023-10-22'),
(90, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:24:35', '2023-10-22'),
(91, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:27:13', '2023-10-22'),
(92, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:31:18', '2023-10-22'),
(93, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:42:17', '2023-10-22'),
(94, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '13:08:42', '2023-10-22'),
(95, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '13:10:12', '2023-10-22'),
(96, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:05:26', '2023-10-22'),
(97, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:05:28', '2023-10-22'),
(98, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:37:24', '2023-10-22'),
(99, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:38:12', '2023-10-22'),
(100, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:38:24', '2023-10-22'),
(101, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:38:53', '2023-10-22'),
(102, 11, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '15:10:04', '2023-10-22'),
(103, 11, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '15:10:09', '2023-10-22'),
(104, 11, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '15:10:53', '2023-10-22'),
(105, 11, 'Migle Cadiwitan', 'bossmigle', 'Administrator', 'Logged Out', '15:14:14', '2023-10-22'),
(106, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '05:19:09', '2023-10-23'),
(107, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:49:28', '2023-10-23'),
(108, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:49:39', '2023-10-23'),
(109, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:42:58', '2023-10-23'),
(110, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:44:08', '2023-10-23'),
(111, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:44:26', '2023-10-23'),
(112, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '20:08:14', '2023-10-23'),
(113, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:05:53', '2023-10-25'),
(114, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:08:02', '2023-10-25'),
(115, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:29:01', '2023-10-25'),
(116, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:29:09', '2023-10-25'),
(117, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:54:22', '2023-10-25'),
(118, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:00:50', '2023-10-25'),
(119, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:27:51', '2023-10-25'),
(120, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:27:59', '2023-10-25'),
(121, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '21:23:33', '2023-10-25'),
(122, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '21:24:35', '2023-10-25'),
(123, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '11:37:50', '2023-10-29'),
(124, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '11:38:06', '2023-10-29'),
(125, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:27:37', '2023-10-30'),
(126, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:27:42', '2023-10-30'),
(127, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:48:33', '2023-10-30'),
(128, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:51:15', '2023-10-30'),
(129, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '17:56:08', '2023-10-30'),
(130, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '17:56:13', '2023-10-30'),
(131, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:43:51', '2023-10-30'),
(132, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:44:33', '2023-10-30'),
(133, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:03:15', '2023-10-31'),
(134, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:04:05', '2023-10-31'),
(135, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '14:29:39', '2023-10-31'),
(136, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '14:29:50', '2023-10-31'),
(137, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '18:44:20', '2023-10-31'),
(138, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '18:50:46', '2023-10-31'),
(139, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '19:33:51', '2023-10-31'),
(140, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '19:36:48', '2023-10-31'),
(141, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '19:42:07', '2023-10-31'),
(142, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '19:43:48', '2023-10-31'),
(143, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '20:14:03', '2023-10-31'),
(144, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '20:14:15', '2023-10-31'),
(145, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:36:20', '2023-11-01'),
(146, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '12:38:14', '2023-11-01'),
(147, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '12:38:22', '2023-11-01'),
(148, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '16:25:20', '2023-11-01'),
(149, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '16:25:35', '2023-11-01'),
(150, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:24:49', '2023-11-03'),
(151, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:25:04', '2023-11-03'),
(152, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:33:43', '2023-11-03'),
(153, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:40:30', '2023-11-03'),
(154, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '13:40:39', '2023-11-03'),
(155, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '13:40:45', '2023-11-03'),
(156, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '13:40:51', '2023-11-03'),
(157, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '13:42:16', '2023-11-03'),
(158, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:42:23', '2023-11-03'),
(159, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:42:46', '2023-11-03'),
(160, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '13:49:18', '2023-11-03'),
(161, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged Out', '13:49:53', '2023-11-03'),
(162, 1, 'Nico Roell Garce', 'ngarce', 'Administrator', 'Logged In', '01:10:42', '2023-11-04'),
(163, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '01:15:04', '2023-11-04'),
(164, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:27:13', '2023-11-06'),
(165, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:28:30', '2023-11-06'),
(166, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:49:25', '2023-11-11'),
(167, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:50:37', '2023-11-11'),
(168, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '20:51:10', '2023-11-11'),
(169, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '20:51:51', '2023-11-11'),
(170, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:20:07', '2023-11-11'),
(171, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:21:00', '2023-11-11'),
(172, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '22:21:06', '2023-11-11'),
(173, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '22:21:11', '2023-11-11'),
(174, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '00:26:48', '2023-11-15'),
(175, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '00:27:51', '2023-11-15'),
(176, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '00:30:31', '2023-11-15'),
(177, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '00:30:34', '2023-11-15'),
(178, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '00:30:40', '2023-11-15'),
(179, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '00:30:42', '2023-11-15'),
(180, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:03:33', '2023-11-18'),
(181, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:03:53', '2023-11-18'),
(182, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged In', '16:31:37', '2023-11-24'),
(183, 4, 'Michael Brown', 'employee1', 'Employee', 'Logged Out', '16:32:18', '2023-11-24'),
(184, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:31:57', '2023-11-29'),
(185, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:39:36', '2023-11-29'),
(186, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:45:40', '2023-11-29'),
(187, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:52:28', '2023-11-29'),
(188, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '08:49:49', '2023-12-01'),
(189, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '09:05:59', '2023-12-01'),
(190, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '12:31:58', '2023-12-01'),
(191, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '12:34:11', '2023-12-01'),
(192, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:11:16', '2023-12-01'),
(193, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:11:28', '2023-12-01'),
(194, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:15:12', '2023-12-01'),
(195, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:15:24', '2023-12-01'),
(196, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:15:30', '2023-12-01'),
(197, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:15:40', '2023-12-01'),
(198, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:16:03', '2023-12-01'),
(199, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:16:50', '2023-12-01'),
(200, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:17:22', '2023-12-01'),
(201, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:17:35', '2023-12-01'),
(202, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:17:49', '2023-12-01'),
(203, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:18:13', '2023-12-01'),
(204, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:21:37', '2023-12-01'),
(205, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:21:44', '2023-12-01'),
(206, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:22:57', '2023-12-01'),
(207, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:23:43', '2023-12-01'),
(208, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:31:37', '2023-12-01'),
(209, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:32:00', '2023-12-01'),
(210, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:34:01', '2023-12-01'),
(211, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:34:11', '2023-12-01'),
(212, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:04:13', '2023-12-01'),
(213, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:04:50', '2023-12-01'),
(214, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:05:24', '2023-12-01'),
(215, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:05:48', '2023-12-01'),
(216, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:06:18', '2023-12-01'),
(217, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:06:40', '2023-12-01'),
(218, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:07:06', '2023-12-01'),
(219, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:07:59', '2023-12-01'),
(220, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:13:11', '2023-12-01'),
(221, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:13:18', '2023-12-01'),
(222, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:13:24', '2023-12-01'),
(223, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:13:31', '2023-12-01'),
(224, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:44:38', '2023-12-01'),
(225, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:45:33', '2023-12-01'),
(226, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:50:38', '2023-12-01'),
(227, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:50:44', '2023-12-01'),
(228, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:53:35', '2023-12-01'),
(229, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:53:43', '2023-12-01'),
(230, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '15:37:12', '2023-12-01'),
(231, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:37:18', '2023-12-01'),
(232, 14, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '15:56:33', '2023-12-01'),
(233, 14, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '15:56:42', '2023-12-01'),
(234, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:25:41', '2023-12-01'),
(235, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:26:00', '2023-12-01'),
(236, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:28:11', '2023-12-01'),
(237, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:28:23', '2023-12-01'),
(238, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:28:33', '2023-12-01'),
(239, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:28:51', '2023-12-01'),
(240, 14, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '16:36:40', '2023-12-01'),
(241, 14, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '16:37:17', '2023-12-01'),
(242, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:33:52', '2023-12-05'),
(243, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:34:00', '2023-12-05'),
(244, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:07:54', '2024-01-10'),
(245, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:08:01', '2024-01-10'),
(246, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:08:33', '2024-01-10'),
(247, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:18:35', '2024-02-04'),
(248, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:18:46', '2024-02-04'),
(249, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:39:46', '2024-02-04'),
(250, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:39:58', '2024-02-04'),
(251, 14, 'Employee Evaluation', 'employee1', 'Employee', 'Logged In', '14:40:32', '2024-02-04'),
(252, 14, 'Employee Evaluation', 'employee1', 'Employee', 'Logged Out', '14:40:42', '2024-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `branch3_crud`
--

CREATE TABLE `branch3_crud` (
  `action_id` int(11) NOT NULL,
  `action_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch3_crud`
--

INSERT INTO `branch3_crud` (`action_id`, `action_type`, `user_id`, `username`, `full_name`, `role`, `time`, `date`, `table_name`, `record_id`) VALUES
(1, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:58:51', '2023-10-09', 'Inventory', 2),
(2, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:59:12', '2023-10-09', 'Inventory', 2),
(3, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:59:58', '2023-10-09', 'Inventory', 1),
(4, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:07:48', '2023-10-09', 'Inventory', 3),
(5, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:13:57', '2023-10-09', 'Orders', 4),
(6, 'Made a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:14:04', '2023-10-09', 'Orders', 4),
(7, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:14:12', '2023-10-09', 'Orders', 3),
(8, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:14:59', '2023-10-09', 'Orders', 2),
(9, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:16:08', '2023-10-09', 'Orders', 5),
(10, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:16:37', '2023-10-09', 'Sales', 2),
(11, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:17:27', '2023-10-09', 'Voided', 2),
(12, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:18:39', '2023-10-09', 'Sales', 2),
(13, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:34:53', '2023-10-09', 'Accounts', 6),
(14, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:35:43', '2023-10-09', 'Accounts', 6),
(15, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:38:47', '2023-10-09', 'Suppliers', 2),
(16, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:38:56', '2023-10-09', 'Suppliers', 2),
(17, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '15:39:03', '2023-10-09', 'Inventory', 2),
(18, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '23:31:17', '2023-10-09', 'Orders', 5),
(19, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:19:45', '2023-10-22', 'Inventory', 4),
(20, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:19:51', '2023-10-22', 'Inventory', 4),
(21, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:19:56', '2023-10-22', 'Inventory', 4),
(22, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:20:48', '2023-10-22', 'Orders', 6),
(23, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:04', '2023-10-22', 'Sales', 3),
(24, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:23', '2023-10-22', 'Sales', 1),
(25, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:27', '2023-10-22', 'Sales', 1),
(26, 'Made a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:38', '2023-10-22', 'Orders', 1),
(27, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:50', '2023-10-22', 'Orders', 6),
(28, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:21:59', '2023-10-22', 'Voided', 6),
(29, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:22:45', '2023-10-22', 'Orders', 7),
(30, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:22:51', '2023-10-22', 'Orders', 7),
(31, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:23:29', '2023-10-22', 'Orders', 8),
(32, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:23:50', '2023-10-22', 'Sales', 5),
(33, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:24:09', '2023-10-22', 'Accounts', 4),
(34, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:26:33', '2023-10-22', 'Accounts', 7),
(35, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:26:49', '2023-10-22', 'Suppliers', 3),
(36, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:26:58', '2023-10-22', 'Suppliers', 3),
(37, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:27:03', '2023-10-22', 'Suppliers', 3),
(38, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:27:07', '2023-10-22', 'Inventory', 3),
(39, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:28:56', '2023-10-22', 'Orders', 7),
(40, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:29:17', '2023-10-22', 'Orders', 9),
(41, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:28:13', '2023-10-23', 'Inventory', 5),
(42, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:28:26', '2023-10-23', 'Inventory', 5),
(43, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:28:34', '2023-10-23', 'Inventory', 5),
(44, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:40:39', '2023-10-23', 'Orders', 10),
(45, 'Created a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:41:05', '2023-10-23', 'Sales', 6),
(46, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:50:50', '2023-10-23', 'Orders', 11),
(47, 'Created an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:51:08', '2023-10-23', 'Orders', 12),
(48, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:51:20', '2023-10-23', 'Orders', 11),
(49, 'Voided an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:51:44', '2023-10-23', 'Orders', 11),
(50, 'Made a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:51:55', '2023-10-23', 'Orders', 12),
(51, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:52:24', '2023-10-23', 'Orders', 10),
(52, 'Removed a Voided Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:52:39', '2023-10-23', 'Voided', 11),
(53, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:53:45', '2023-10-23', 'Sales', 7),
(54, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:57:25', '2023-10-23', 'Accounts', 8),
(55, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '20:58:29', '2023-10-23', 'Accounts', 8),
(56, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '21:01:13', '2023-10-23', 'Suppliers', 4),
(57, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '21:01:23', '2023-10-23', 'Suppliers', 4),
(58, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '21:01:35', '2023-10-23', 'Inventory', 4),
(59, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:47:40', '2023-10-31', 'Sales', 11),
(60, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:47:40', '2023-10-31', 'Sales', 12),
(61, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '19:47:40', '2023-10-31', 'Sales', 13),
(62, 'Created an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:09:06', '2023-12-01', 'Accounts', 9),
(63, 'Removed an Account', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:10:02', '2023-12-01', 'Accounts', 9),
(64, 'Removed a Sale', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:12:05', '2023-12-01', 'Sales', 11),
(65, 'Added a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:14:31', '2023-12-01', 'Inventory', 6),
(66, 'Deleted a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:14:50', '2023-12-01', 'Inventory', 6),
(67, 'Removed an Order', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:16:05', '2023-12-01', 'Orders', 8),
(68, 'Added a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:16:51', '2023-12-01', 'Suppliers', 5),
(69, 'Deleted a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '09:17:02', '2023-12-01', 'Suppliers', 5),
(70, 'Edited a Product', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:10:09', '2023-12-01', 'Inventory', 3),
(71, 'Updated an Order/Payment Status', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:10:30', '2023-12-01', 'Orders', 9),
(72, 'Edited a Supplier', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:10:43', '2023-12-01', 'Suppliers', 1),
(73, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:25:07', '2023-12-01', 'Sales', 14),
(74, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:25:07', '2023-12-01', 'Sales', 15),
(75, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:25:07', '2023-12-01', 'Sales', 16),
(76, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:27:39', '2023-12-01', 'Sales', 17),
(77, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:27:39', '2023-12-01', 'Sales', 18),
(78, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:27:39', '2023-12-01', 'Sales', 19),
(79, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:41:32', '2023-12-01', 'Sales', 20),
(80, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:41:32', '2023-12-01', 'Sales', 21),
(81, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:41:32', '2023-12-01', 'Sales', 22),
(82, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:46:50', '2023-12-01', 'Sales', 23),
(83, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:46:50', '2023-12-01', 'Sales', 24),
(84, 'Imported Sales', 1, 'ngarce', 'Nico Garce', 'Administrator', '14:46:50', '2023-12-01', 'Sales', 25);

-- --------------------------------------------------------

--
-- Table structure for table `branch3_inventory`
--

CREATE TABLE `branch3_inventory` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date_ordered` date NOT NULL,
  `date_arrival` date NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch3_inventory`
--

INSERT INTO `branch3_inventory` (`product_id`, `product_name`, `stock`, `price`, `category`, `date_ordered`, `date_arrival`, `date_added`, `added_by`, `user_id`, `supplier_id`, `supplier_name`) VALUES
(3, 'Bricks', 990, 100.99, 'Building Materials', '2023-10-03', '2023-10-09', '2023-10-09', 'Nico Garce', 1, 1, 'supplier 1');

-- --------------------------------------------------------

--
-- Table structure for table `branch3_orders`
--

CREATE TABLE `branch3_orders` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_list`)),
  `pay_method` varchar(255) NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `shipping_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch3_orders`
--

INSERT INTO `branch3_orders` (`order_id`, `customer_name`, `order_date`, `order_time`, `order_list`, `pay_method`, `total_cost`, `order_status`, `payment_status`, `contact_info`, `order_type`, `user_id`, `salesperson`, `shipping_details`) VALUES
(5, 'Michael Brown', '2023-10-09', '15:16:08', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"100.99\"}]', 'Cash', 100.99, 'Cancelled', 'Paid', 'michael.brown@email.com', 'In-Store', 1, 'Nico Garce', 'N/A'),
(7, 'John Doe', '2023-10-22', '14:22:45', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"100.99\"}]', 'Cash', 100.99, 'Returned', 'Pending', '12345', 'In-Store', 1, 'Nico Garce', 'N/A'),
(9, 'Nico Roell Garce', '2023-10-22', '14:29:17', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"100.99\"}]', 'Cash', 100.99, 'In Fullfillment', 'Pending', '12345', 'In-Store', 1, 'Nico Garce', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `branch3_sales`
--

CREATE TABLE `branch3_sales` (
  `sale_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_list`)),
  `total_cost` decimal(10,2) NOT NULL,
  `pay_method` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `shipping_details` varchar(255) NOT NULL,
  `date_complete` date NOT NULL,
  `time_complete` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch3_sales`
--

INSERT INTO `branch3_sales` (`sale_id`, `customer_name`, `order_date`, `order_time`, `order_list`, `total_cost`, `pay_method`, `order_status`, `payment_status`, `contact_info`, `order_type`, `user_id`, `salesperson`, `shipping_details`, `date_complete`, `time_complete`) VALUES
(3, 'Michael Brown', '2023-10-22', '14:21:04', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"100.99\"}]', 100.99, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-22', '14:21:04'),
(4, 'Michael Brown', '2023-09-11', '18:37:41', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"50.00\"}]', 50.00, 'Cash', 'Complete', 'Paid', 'michael.brown@email.com', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-22', '14:21:38'),
(5, 'Nico Roell Garce', '2023-10-22', '14:23:50', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"100.99\"}]', 100.99, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-22', '14:23:50'),
(6, 'Nico Roell Garce', '2023-10-23', '20:41:05', '[{\"product_name\":\"Brick\",\"quantity\":1,\"price\":\"100.99\"}]', 100.99, 'Cash', 'Complete', 'Paid', '12345', 'In-Store', 1, 'Nico Garce', 'N/A', '2023-10-23', '20:41:05'),
(12, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(13, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(14, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(15, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(16, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(17, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(18, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(19, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(20, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(21, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(22, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00'),
(23, 'John Doe', '2020-10-15', '14:30:00', '[{\"product_name\":\"Blocks\",\"quantity\":2,\"price\":\"123.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.50\"}]', 125.50, 'Credit Card', 'Complete', 'Paid', 'john.doe@example.com', 'In-Store', 1, 'Nico Garce', '123 Main St, Anytown, USA', '2020-10-15', '14:30:00'),
(24, 'Jane Smith', '2020-10-18', '10:15:00', '[{\"product_name\":\"Asdf\",\"quantity\":2,\"price\":\"70.00\"},{\"product_name\":\"Nails\",\"quantity\":2,\"price\":\"5.25\"}]', 75.25, 'PayPal', 'Complete', 'Paid', 'jane.smith@example.com', 'In-Store', 2, 'Bob', '456 Elm St, Othertown, USA', '2020-10-25', '11:30:00'),
(25, 'Mike Johnson', '2020-10-20', '17:45:00', '[{\"product_name\":\"Hammer\",\"quantity\":1,\"price\":\"35.99\"}]', 35.99, 'Cash', 'Complete', 'Paid', 'mike.johnson@example.com', 'In-Store', 3, 'Sarah', '789 Oak St, Anycity, USA', '2020-10-24', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `branch3_suppliers`
--

CREATE TABLE `branch3_suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch3_suppliers`
--

INSERT INTO `branch3_suppliers` (`supplier_id`, `supplier_name`, `description`, `address`, `contact`) VALUES
(1, 'supplier ', 'Description 1', 'Address 1', 'Contact 1');

-- --------------------------------------------------------

--
-- Table structure for table `branch3_users`
--

CREATE TABLE `branch3_users` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_added` date NOT NULL,
  `branch` varchar(255) NOT NULL DEFAULT 'Branch 3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch3_users`
--

INSERT INTO `branch3_users` (`ID`, `firstName`, `lastName`, `username`, `password`, `mobile`, `email`, `address`, `role`, `photo`, `date_added`, `branch`) VALUES
(1, 'Nico', 'Garce', 'ngarce', '$2y$10$4cVIkKANbOFLn73BbBfyqejts3V7Ch2y/SKIu/vEG7bBfGYZbVSa6', '09091558980', 'ngarce36@gmail.com', 'B33 L12 General M. Malvar SHV Putatan Muntinlupa City', 'Administrator', '../assets/user_upload/pic no name.jpg', '2023-09-08', 'Branch 3'),
(2, 'Chenelle', 'Abrio', 'yukiyui.yun', '$2y$10$Z3iUIgVExS3ckDgn.ORo8uL02HZKSAVE0zJwxQ7qDimNgyxuBHM8e', '09480698220', 'takuyama.tazu@gmail.com', 'Sucat, Muntinlupa City', 'Employee', '', '2023-09-15', 'Branch 3'),
(5, 'Emmanuel', 'Lobos', 'employee1', '$2y$10$0r6B6ZqnY7f63OlaUmuS9evjrYnsI75S2ceE5l7bsO6fO7IEpccpi', '09090900909', 'emman@gmail.com', 'San Pedro, Laguna', 'Employee', '', '2023-09-15', 'Branch 3');

-- --------------------------------------------------------

--
-- Table structure for table `branch3_user_logs`
--

CREATE TABLE `branch3_user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `log_time` time NOT NULL,
  `log_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch3_user_logs`
--

INSERT INTO `branch3_user_logs` (`log_id`, `user_id`, `name`, `username`, `role`, `action`, `log_time`, `log_date`) VALUES
(1, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:20:49', '2023-09-09'),
(2, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:21:04', '2023-09-09'),
(3, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:38:23', '2023-09-10'),
(4, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:38:53', '2023-09-10'),
(5, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:32:56', '2023-09-11'),
(6, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:49:30', '2023-09-11'),
(7, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:36:40', '2023-09-11'),
(8, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:38:15', '2023-09-11'),
(9, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '01:36:21', '2023-09-12'),
(10, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '01:36:56', '2023-09-12'),
(11, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:50:06', '2023-09-13'),
(12, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:54:19', '2023-09-13'),
(13, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:11:56', '2023-09-15'),
(14, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:12:01', '2023-09-15'),
(15, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:29:25', '2023-09-22'),
(16, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:29:33', '2023-09-22'),
(17, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:29:44', '2023-09-22'),
(18, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:32:22', '2023-09-22'),
(19, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:37:51', '2023-09-22'),
(20, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:54:34', '2023-10-09'),
(21, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '15:43:52', '2023-10-09'),
(22, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:39:18', '2023-10-09'),
(23, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:39:58', '2023-10-09'),
(24, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:31:38', '2023-10-09'),
(25, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:31:58', '2023-10-09'),
(26, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:44:20', '2023-10-09'),
(27, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:45:01', '2023-10-09'),
(28, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:26:25', '2023-10-09'),
(29, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:26:31', '2023-10-09'),
(30, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:31:10', '2023-10-09'),
(31, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:32:10', '2023-10-09'),
(32, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '23:37:19', '2023-10-09'),
(33, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:38:22', '2023-10-09'),
(34, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:54:30', '2023-10-19'),
(35, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:55:42', '2023-10-19'),
(36, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:06:05', '2023-10-22'),
(37, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:19:14', '2023-10-22'),
(38, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:19:22', '2023-10-22'),
(39, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:37:18', '2023-10-22'),
(40, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:40:31', '2023-10-22'),
(41, 7, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged In', '15:14:29', '2023-10-22'),
(42, 7, 'Elgim Cadiwitan', 'bossmigle', 'Administrator', 'Logged Out', '15:14:33', '2023-10-22'),
(43, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:50:46', '2023-10-23'),
(44, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:50:58', '2023-10-23'),
(45, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:08:23', '2023-10-23'),
(46, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:03:40', '2023-10-23'),
(47, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:00:57', '2023-10-25'),
(48, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:05:54', '2023-10-25'),
(49, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '21:24:42', '2023-10-25'),
(50, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '21:25:09', '2023-10-25'),
(51, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '11:39:19', '2023-10-29'),
(52, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '11:39:26', '2023-10-29'),
(53, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '17:53:10', '2023-10-30'),
(54, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '17:53:35', '2023-10-30'),
(55, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged In', '18:00:20', '2023-10-30'),
(56, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged Out', '18:04:23', '2023-10-30'),
(57, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:13:59', '2023-10-30'),
(58, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '18:14:10', '2023-10-30'),
(59, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:29:57', '2023-10-31'),
(60, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:37:40', '2023-10-31'),
(61, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '18:50:53', '2023-10-31'),
(62, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:05:36', '2023-10-31'),
(63, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '19:47:03', '2023-10-31'),
(64, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '19:47:50', '2023-10-31'),
(65, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:14:20', '2023-10-31'),
(66, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:14:29', '2023-10-31'),
(67, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged In', '13:25:10', '2023-11-03'),
(68, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged Out', '13:25:14', '2023-11-03'),
(69, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:42:52', '2023-11-03'),
(70, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:46:01', '2023-11-03'),
(71, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged In', '13:46:09', '2023-11-03'),
(72, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged Out', '13:47:24', '2023-11-03'),
(73, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '20:50:45', '2023-11-11'),
(74, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '20:51:04', '2023-11-11'),
(75, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:21:38', '2023-11-11'),
(76, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:24:12', '2023-11-11'),
(77, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged In', '22:24:18', '2023-11-11'),
(78, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged Out', '22:26:58', '2023-11-11'),
(79, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged In', '00:28:03', '2023-11-15'),
(80, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged Out', '00:30:24', '2023-11-15'),
(81, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '00:32:03', '2023-11-15'),
(82, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '00:32:31', '2023-11-15'),
(83, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged In', '00:32:38', '2023-11-15'),
(84, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged Out', '00:33:20', '2023-11-15'),
(85, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:04:00', '2023-11-18'),
(86, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '22:04:18', '2023-11-18'),
(87, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '22:52:34', '2023-11-29'),
(88, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '23:01:19', '2023-11-29'),
(89, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '09:06:06', '2023-12-01'),
(90, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '09:33:22', '2023-12-01'),
(91, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:24:02', '2023-12-01'),
(92, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:24:08', '2023-12-01'),
(93, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:24:17', '2023-12-01'),
(94, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:24:23', '2023-12-01'),
(95, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:32:09', '2023-12-01'),
(96, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:32:24', '2023-12-01'),
(97, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '13:34:21', '2023-12-01'),
(98, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '13:34:30', '2023-12-01'),
(99, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:06:46', '2023-12-01'),
(100, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:06:57', '2023-12-01'),
(101, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:08:06', '2023-12-01'),
(102, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:10:46', '2023-12-01'),
(103, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:24:45', '2023-12-01'),
(104, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:37:10', '2023-12-01'),
(105, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:45:39', '2023-12-01'),
(106, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:45:46', '2023-12-01'),
(107, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:49:48', '2023-12-01'),
(108, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:50:51', '2023-12-01'),
(109, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:50:58', '2023-12-01'),
(110, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:29:48', '2023-12-01'),
(111, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:30:00', '2023-12-01'),
(112, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '16:30:10', '2023-12-01'),
(113, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '16:30:21', '2023-12-01'),
(114, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged In', '14:42:28', '2024-02-04'),
(115, 1, 'Nico Garce', 'ngarce', 'Administrator', 'Logged Out', '14:42:40', '2024-02-04'),
(116, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged In', '14:42:50', '2024-02-04'),
(117, 5, 'Emmanuel Lobos', 'employee1', 'Employee', 'Logged Out', '14:43:30', '2024-02-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch1_crud`
--
ALTER TABLE `branch1_crud`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `branch1_inventory`
--
ALTER TABLE `branch1_inventory`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `branch1_orders`
--
ALTER TABLE `branch1_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `branch1_sales`
--
ALTER TABLE `branch1_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `branch1_suppliers`
--
ALTER TABLE `branch1_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `branch1_users`
--
ALTER TABLE `branch1_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `branch1_user_logs`
--
ALTER TABLE `branch1_user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `branch2_crud`
--
ALTER TABLE `branch2_crud`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `branch2_inventory`
--
ALTER TABLE `branch2_inventory`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `branch2_orders`
--
ALTER TABLE `branch2_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `branch2_sales`
--
ALTER TABLE `branch2_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `branch2_suppliers`
--
ALTER TABLE `branch2_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `branch2_users`
--
ALTER TABLE `branch2_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `branch2_user_logs`
--
ALTER TABLE `branch2_user_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `branch3_crud`
--
ALTER TABLE `branch3_crud`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `branch3_inventory`
--
ALTER TABLE `branch3_inventory`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `branch3_orders`
--
ALTER TABLE `branch3_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `branch3_sales`
--
ALTER TABLE `branch3_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `branch3_suppliers`
--
ALTER TABLE `branch3_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `branch3_users`
--
ALTER TABLE `branch3_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `branch3_user_logs`
--
ALTER TABLE `branch3_user_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch1_crud`
--
ALTER TABLE `branch1_crud`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `branch1_inventory`
--
ALTER TABLE `branch1_inventory`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `branch1_orders`
--
ALTER TABLE `branch1_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `branch1_sales`
--
ALTER TABLE `branch1_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `branch1_suppliers`
--
ALTER TABLE `branch1_suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `branch1_users`
--
ALTER TABLE `branch1_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `branch1_user_logs`
--
ALTER TABLE `branch1_user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=943;

--
-- AUTO_INCREMENT for table `branch2_crud`
--
ALTER TABLE `branch2_crud`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `branch2_inventory`
--
ALTER TABLE `branch2_inventory`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branch2_orders`
--
ALTER TABLE `branch2_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `branch2_sales`
--
ALTER TABLE `branch2_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `branch2_suppliers`
--
ALTER TABLE `branch2_suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch2_users`
--
ALTER TABLE `branch2_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `branch2_user_logs`
--
ALTER TABLE `branch2_user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `branch3_crud`
--
ALTER TABLE `branch3_crud`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `branch3_inventory`
--
ALTER TABLE `branch3_inventory`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branch3_orders`
--
ALTER TABLE `branch3_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `branch3_sales`
--
ALTER TABLE `branch3_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `branch3_suppliers`
--
ALTER TABLE `branch3_suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch3_users`
--
ALTER TABLE `branch3_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branch3_user_logs`
--
ALTER TABLE `branch3_user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
