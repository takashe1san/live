-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 يونيو 2022 الساعة 11:50
-- إصدار الخادم: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `live`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `username` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`username`, `email`, `name`, `password`, `created_at`, `updated_at`, `type`) VALUES
('zero', 'zero@test.com', 'zero', 'd02c4c4cde7ae76252540d116a40f23a', '2022-04-26 08:21:31', '2022-04-26 08:21:31', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `com_id` int(40) NOT NULL,
  `com_content` varchar(5000) NOT NULL,
  `com_date` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `doctor` varchar(40) DEFAULT NULL,
  `consultation` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`com_id`, `com_content`, `com_date`, `deleted_at`, `username`, `doctor`, `consultation`) VALUES
(22, 'aaa', '2022-05-07 18:50:21', NULL, 'first', NULL, 34),
(23, 'coment tester', '2022-05-07 18:51:26', NULL, 'first', NULL, 34),
(25, 'asdfghjk', '2022-05-26 19:34:51', NULL, NULL, 'second', 35),
(26, 'test front end comments', '2022-05-26 19:35:49', NULL, NULL, 'second', 36),
(27, 'test front end comments 2', '2022-05-26 19:36:47', NULL, NULL, 'second', 36),
(28, 'comment', '2022-05-28 12:30:58', NULL, 'first', NULL, 35),
(29, 'rrr', '2022-05-28 14:50:27', NULL, 'first', NULL, 34),
(30, 'eeeee', '2022-05-28 14:50:27', NULL, NULL, 'second', 35),
(31, 'aaaa', '2022-05-28 14:51:42', NULL, 'first', NULL, 34),
(32, 'aassaa', '2022-05-28 14:52:06', NULL, 'first', NULL, 35),
(33, 'sssssddddd', '2022-05-28 14:52:24', NULL, 'first', NULL, 36),
(34, 'zzzz', '2022-05-28 14:52:41', NULL, 'first', NULL, 37),
(35, 'ppppp', '2022-05-28 14:53:05', NULL, 'first', NULL, 38),
(36, 'hi there', '2022-05-28 13:10:08', NULL, 'first', NULL, 36),
(37, 'dd', '2022-06-02 16:16:49', NULL, 'first', NULL, 40);

-- --------------------------------------------------------

--
-- بنية الجدول `consultations`
--

CREATE TABLE `consultations` (
  `con_id` int(40) NOT NULL,
  `con_section` set('Internal','Cardiology','Pediatrics','General') NOT NULL,
  `con_content` varchar(5000) NOT NULL,
  `con_date` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `consultations`
--

INSERT INTO `consultations` (`con_id`, `con_section`, `con_content`, `con_date`, `deleted_at`, `username`) VALUES
(34, 'General', 'delete tester 0.1', '2022-05-03 18:13:35', NULL, 'first'),
(35, 'General', 'post test front-end with attach', '2022-05-20 15:31:57', NULL, 'first'),
(36, 'General', 'test 2', '2022-05-20 20:10:13', NULL, 'first'),
(37, 'General', 'asdf', '2022-05-25 17:13:36', NULL, 'first'),
(38, 'General', 'sdfg', '2022-05-25 17:54:05', NULL, 'first'),
(39, 'General', 'nothing important', '2022-05-28 13:22:18', '2022-06-03 12:49:49', 'first'),
(40, 'General', 'test ajax cons', '2022-05-30 05:01:05', '2022-06-03 10:47:58', 'first'),
(41, 'General', 'djkal;df', '2022-06-01 02:33:36', '2022-06-03 10:47:34', 'first'),
(42, 'General', 'fghjk', '2022-06-01 02:55:14', '2022-06-03 10:40:03', 'first'),
(43, 'General', 'gjh', '2022-06-01 03:06:12', '2022-06-03 10:38:11', 'first'),
(44, 'General', 'message test', '2022-06-03 12:49:10', NULL, 'first'),
(45, 'General', 'jhgjgj', '2022-06-04 13:25:44', NULL, 'first'),
(46, 'General', 'media UI tester', '2022-06-05 18:08:02', NULL, 'first'),
(47, 'General', 'kk', '2022-06-05 18:14:17', NULL, 'first'),
(48, 'General', 'media tester 2', '2022-06-05 18:16:05', NULL, 'first'),
(49, 'General', 'media tester 3', '2022-06-05 18:19:04', NULL, 'first'),
(50, 'General', 'media tester 4', '2022-06-05 18:21:25', NULL, 'first'),
(51, 'General', 'kkkkkk', '2022-06-05 18:22:16', NULL, 'first'),
(52, 'General', 'nnnnn', '2022-06-05 18:22:51', NULL, 'first'),
(53, 'General', 'nnnnn', '2022-06-05 18:25:05', NULL, 'first'),
(54, 'General', 're', '2022-06-05 18:26:34', NULL, 'first'),
(55, 'General', 'ref', '2022-06-05 18:27:12', NULL, 'first'),
(56, 'General', 'refil', '2022-06-05 18:27:31', NULL, 'first'),
(57, 'General', 'name', '2022-06-05 18:28:39', NULL, 'first'),
(58, 'General', 'test', '2022-06-05 18:29:00', NULL, 'first'),
(59, 'General', 'dd', '2022-06-05 18:29:13', NULL, 'first'),
(60, 'General', 'path', '2022-06-05 18:31:27', NULL, 'first'),
(61, 'General', 'file', '2022-06-05 18:32:15', NULL, 'first'),
(62, 'General', 'ss', '2022-06-05 18:32:51', NULL, 'first'),
(63, 'General', 'file tester1', '2022-06-05 18:33:50', NULL, 'first'),
(64, 'General', 'file tester1', '2022-06-05 18:34:24', NULL, 'first'),
(65, 'General', 'file foreach', '2022-06-05 18:36:20', NULL, 'first'),
(66, 'General', 'f', '2022-06-05 18:36:59', NULL, 'first'),
(67, 'General', 'jh', '2022-06-05 18:39:13', NULL, 'first'),
(68, 'General', 'kjzflk', '2022-06-05 18:40:17', NULL, 'first'),
(69, 'General', 'knj', '2022-06-05 18:41:24', NULL, 'first'),
(70, 'General', 'hhhh', '2022-06-05 18:49:27', NULL, 'first'),
(71, 'General', 'klsdfm', '2022-06-05 18:53:25', NULL, 'first'),
(72, 'General', ';alskdfjl', '2022-06-05 18:56:45', NULL, 'first'),
(73, 'General', 'name2', '2022-06-05 18:58:24', NULL, 'first'),
(74, 'General', ';nsl', '2022-06-05 18:59:09', NULL, 'first'),
(75, 'General', 'asdfg', '2022-06-05 19:04:14', NULL, 'first'),
(76, 'General', 'ad', '2022-06-05 19:05:36', NULL, 'first'),
(77, 'General', 'dssdff', '2022-06-05 19:10:54', NULL, 'first'),
(78, 'General', 'file upload final test', '2022-06-05 19:12:36', NULL, 'first'),
(79, 'General', 'file upload finally final test', '2022-06-05 19:13:23', NULL, 'first'),
(80, 'General', 'file upload finally final test2', '2022-06-05 19:14:33', NULL, 'first'),
(81, 'General', 'final test upload', '2022-06-05 19:15:27', NULL, 'first'),
(82, 'General', 'saas', '2022-06-05 19:17:21', NULL, 'first'),
(83, 'General', 'the pest in the world', '2022-06-06 08:26:04', NULL, 'first'),
(84, 'General', 'consultation content', '2022-06-06 08:47:40', NULL, 'first');

-- --------------------------------------------------------

--
-- بنية الجدول `doctors`
--

CREATE TABLE `doctors` (
  `username` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `birth` date NOT NULL,
  `bio` varchar(250) NOT NULL DEFAULT 'Hi there, I''m doctor?',
  `section` varchar(20) DEFAULT NULL,
  `license` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `doctors`
--

INSERT INTO `doctors` (`username`, `email`, `name`, `password`, `created_at`, `updated_at`, `deleted_at`, `birth`, `bio`, `section`, `license`) VALUES
('deletetest2', 'deleted@test.com', 'delete', '099af53f601532dbd31e0ea99ffdeb64', '2022-05-08 05:01:28', '2022-05-08 05:01:41', '2022-05-08 05:01:41', '2022-05-08', 'Hi there, I\'m doctor🧐', NULL, NULL),
('second', 'second@e.com', 'second', 'a9f0e61a137d86aa9db53465e0801612', '2022-03-30 15:43:24', '2022-05-03 08:32:53', NULL, '2022-03-09', 'Hi there, I\'m doctor🧐', 'internal', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `followings`
--

CREATE TABLE `followings` (
  `date` datetime NOT NULL,
  `doctor` varchar(40) NOT NULL,
  `user` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `section` set('Internal','Cardiology','Pediatrics','General') NOT NULL,
  `info_content` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `doctor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `licenses`
--

CREATE TABLE `licenses` (
  `lic_id` int(11) NOT NULL,
  `lic_num` varchar(25) NOT NULL,
  `lic_typ` varchar(100) NOT NULL,
  `lic_ini_date` date NOT NULL,
  `lic_exp_date` date NOT NULL,
  `lic_issuing_place` varchar(150) NOT NULL,
  `valid_date` datetime DEFAULT NULL,
  `doctor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `likes`
--

CREATE TABLE `likes` (
  `cons` int(11) NOT NULL,
  `user` varchar(40) DEFAULT NULL,
  `doc` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `likes`
--

INSERT INTO `likes` (`cons`, `user`, `doc`) VALUES
(41, 'first', NULL),
(45, 'first', NULL),
(83, 'first', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `ext` varchar(5) NOT NULL,
  `mediaDir` varchar(100) NOT NULL,
  `admin` varchar(40) DEFAULT NULL,
  `user` varchar(40) DEFAULT NULL,
  `doctor` varchar(40) DEFAULT NULL,
  `cons` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `media`
--

INSERT INTO `media` (`id`, `name`, `ext`, `mediaDir`, `admin`, `user`, `doctor`, `cons`) VALUES
(42, 'IMG_٢٠٢١٠٢٠٥_١٧٠٥٣٤.jpg', 'jpg', '', NULL, NULL, NULL, 35),
(43, 'IMG_٢٠٢١٠٣١٠_١٧٤٩٣١.jpg', 'jpg', '', NULL, NULL, NULL, 36),
(44, 'IMG_٢٠٢١٠٣١٠_١٧٤٩٣٥.jpg', 'jpg', '', NULL, NULL, NULL, 36),
(45, 'IMG_٢٠٢١٠٣١٠_١٧٤٩٤٧.jpg', 'jpg', '', NULL, NULL, NULL, 36),
(54, 'personal.jpg', 'jpg', 'images/users/first', NULL, 'first', NULL, NULL),
(55, 'drmariowiifit.jpg', 'jpg', 'images/users/first/cons/64/drmariowiifit.jpg', NULL, NULL, NULL, 64),
(56, '3554304.png', 'png', 'images/users/first/cons/75/3554304.png', NULL, NULL, NULL, 75),
(57, '3554304.png', 'png', 'images/users/first/cons/77/3554304.png', NULL, NULL, NULL, 77),
(58, '3554304.png', 'png', 'images/users/first/cons/81/3554304.png', NULL, NULL, NULL, 81),
(59, '3554335.png', 'png', 'images/users/first/cons/82/3554335.png', NULL, NULL, NULL, 82),
(60, 'IMG_٢٠٢١٠٢١٣_١٦٤٥١٠.jpg', 'jpg', 'images/users/first/cons/83/IMG_٢٠٢١٠٢١٣_١٦٤٥١٠.jpg', NULL, NULL, NULL, 83);

-- --------------------------------------------------------

--
-- بنية الجدول `reports`
--

CREATE TABLE `reports` (
  `rep_id` int(11) NOT NULL,
  `rep_date` datetime NOT NULL,
  `user` varchar(40) DEFAULT NULL,
  `doctor` varchar(40) DEFAULT NULL,
  `reported_con` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `reports`
--

INSERT INTO `reports` (`rep_id`, `rep_date`, `user`, `doctor`, `reported_con`) VALUES
(5, '2022-06-02 16:30:25', 'first', NULL, 41),
(6, '2022-06-02 16:34:12', 'first', NULL, 40),
(7, '2022-06-02 16:34:28', 'first', NULL, 39),
(8, '2022-06-02 16:36:04', 'first', NULL, 41),
(9, '2022-06-02 16:36:36', 'first', NULL, 41),
(10, '2022-06-02 16:36:42', 'first', NULL, 41),
(11, '2022-06-02 16:37:20', 'first', NULL, 40),
(12, '2022-06-03 07:40:07', NULL, 'second', 37),
(13, '2022-06-03 12:49:42', 'first', NULL, 39);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `username` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `birth` date NOT NULL,
  `bio` varchar(250) NOT NULL DEFAULT 'Hi there, I''m new here?',
  `blood_typ` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`username`, `email`, `name`, `password`, `created_at`, `updated_at`, `deleted_at`, `birth`, `bio`, `blood_typ`) VALUES
('1eca5GGrw4', 'HbPWI9YhkQ@seeder.com', 'sV739lCDqY', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:32:11', '2022-05-08 15:32:11', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('3G1affbD3N', 'beMA15F5u2@seeder.com', 'hEtfxn1NzN', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('46UEnsYtZk', 'nEZhy4G5R8@seeder.com', '4msMUEPMFr', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('8GPkdbHBQf', 'pFcIYxnmXq@seeder.com', '5OrXZZm8Ce', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('BUzHcC8AUP', 'KkqYUTXrUW@seeder.com', '6CwKAnr7Lt', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:31:38', '2022-05-08 15:31:38', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('deletetest', 'delete@test.com', 'del', '099af53f601532dbd31e0ea99ffdeb64', '2022-05-08 04:41:27', '2022-05-08 04:57:14', NULL, '2022-05-01', 'Hi there, I\'m new here😀', NULL),
('DTpUePufXQ', 'oJRYpFXq71@seeder.com', '1qEUk099PG', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('first', 'first@e.com', 'first', '8b04d5e3775d298e78455efc5ca404d5', '2022-05-03 09:12:42', '2022-05-03 09:12:42', NULL, '2022-05-03', 'Hi there, I\'m new here😀', NULL),
('first1', 'name@mail.com', 'fi', 'b74e6bf80237ddc4109968cedc58c151', '2022-05-29 15:31:15', '2022-05-29 15:31:15', NULL, '2022-05-19', 'Hi there, I\'m new here😀', NULL),
('j1MC0QCdpK', 'k22EFweNuM@seeder.com', 'WOrtyAuDBw', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('MsCUJKa1eP', 'UjtSa7ysSd@seeder.com', 'zngmq9B8W4', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('nJ4YbagiqG', '2bbKxjoaFf@seeder.com', 'EhqzPA80uQ', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('O8Rn8fFFdb', 'tT9QFutxlt@seeder.com', 'iErsQEFgbC', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('qqv0rO4Dy2', '6qJ3i1G5nI@seeder.com', 'esdOsp7M6r', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('username', 'mail@e.com', 'name', '14c4b06b824ec593239362517f538b29', '2022-06-03 16:35:28', '2022-06-03 16:35:28', NULL, '2022-06-03', 'Hi there, I\'m new here😀', NULL),
('viewer1.0', 'view1.0@test.com', 'f', '1bda80f2be4d3658e0baa43fbe7ae8c1', '2022-05-08 14:13:10', '2022-05-08 14:13:10', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('viewer1.1', 'view1.1@test.com', 'f', '1bda80f2be4d3658e0baa43fbe7ae8c1', '2022-05-08 14:14:03', '2022-05-08 14:14:03', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('viewer1.2', 'view1.2@test.com', 'f', '1bda80f2be4d3658e0baa43fbe7ae8c1', '2022-05-08 14:14:38', '2022-05-08 14:14:38', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('xwRHv0NPFH', 'yjus5p4Y8Q@seeder.com', 't64aBt5YGA', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:35:42', '2022-05-08 15:35:42', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('yyH212g3Da', 'g7ousKEKFj@seeder.com', 'C6IhQ77nvt', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:31:25', '2022-05-08 15:31:25', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL),
('zytvKtsBMS', 'PK10F9NJsl@seeder.com', 'eCrwJj7qnA', 'd41d8cd98f00b204e9800998ecf8427e', '2022-05-08 15:31:51', '2022-05-08 15:31:51', NULL, '2022-05-08', 'Hi there, I\'m new here😀', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email_unique_ad` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `con_com_FK` (`consultation`),
  ADD KEY `usr_com_FK` (`username`),
  ADD KEY `doc_com_FK` (`doctor`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `usr_con_FK` (`username`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `lic_doc_FK` (`license`);

--
-- Indexes for table `followings`
--
ALTER TABLE `followings`
  ADD KEY `doc_follow_FK` (`doctor`),
  ADD KEY `usr_follow_FK` (`user`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_in` (`doctor`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`lic_id`),
  ADD KEY `doc_lic` (`doctor`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `c` (`cons`),
  ADD KEY `u` (`user`),
  ADD KEY `d` (`doc`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `med_user` (`user`),
  ADD KEY `med_dec` (`doctor`),
  ADD KEY `med_con` (`cons`),
  ADD KEY `adm_med` (`admin`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rep_id`),
  ADD KEY `rep_doc_from` (`doctor`),
  ADD KEY `rep_user_from` (`user`),
  ADD KEY `rep_con` (`reported_con`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `con_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `lic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `con_com_FK` FOREIGN KEY (`consultation`) REFERENCES `consultations` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_com_FK` FOREIGN KEY (`doctor`) REFERENCES `doctors` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_com_FK` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- القيود للجدول `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `usr_con_FK` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `lic_doc_FK` FOREIGN KEY (`license`) REFERENCES `licenses` (`lic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `followings`
--
ALTER TABLE `followings`
  ADD CONSTRAINT `doc_follow_FK` FOREIGN KEY (`doctor`) REFERENCES `doctors` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usr_follow_FK` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `doc_in` FOREIGN KEY (`doctor`) REFERENCES `doctors` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `licenses`
--
ALTER TABLE `licenses`
  ADD CONSTRAINT `doc_lic` FOREIGN KEY (`doctor`) REFERENCES `doctors` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `c` FOREIGN KEY (`cons`) REFERENCES `consultations` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d` FOREIGN KEY (`doc`) REFERENCES `doctors` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `adm_med` FOREIGN KEY (`admin`) REFERENCES `admins` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `med_con` FOREIGN KEY (`cons`) REFERENCES `consultations` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `med_dec` FOREIGN KEY (`doctor`) REFERENCES `doctors` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `med_user` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `rep_con` FOREIGN KEY (`reported_con`) REFERENCES `consultations` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_doc_from` FOREIGN KEY (`doctor`) REFERENCES `doctors` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_user_from` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
