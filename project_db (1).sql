-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 نوفمبر 2019 الساعة 16:17
-- إصدار الخادم: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `feedback`
--

CREATE TABLE `feedback` (
  `id-actor` int(50) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `feedback`
--

INSERT INTO `feedback` (`id-actor`, `feedback`) VALUES
(15, 'jfdnjfksdnkjbdsjvbdfkjbvlkjdfbvk'),
(25, 'osdkasd'),
(30, 'ooooooooooooooooooooooooo'),
(31, 'hola'),
(32, 'hollllla');

-- --------------------------------------------------------

--
-- بنية الجدول `mechanic_state`
--

CREATE TABLE `mechanic_state` (
  `id_mechanic` int(11) NOT NULL,
  `username` text NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `mechanic_state`
--

INSERT INTO `mechanic_state` (`id_mechanic`, `username`, `state`) VALUES
(15, 'Niga', 1),
(20, 'mostafa', 0),
(21, 'kosom_ali_ashraf', 1),
(24, 'jhdfjfdhjghdf', 1),
(26, 'jdfhkjhdfskjh', 1),
(27, 'hdskjhfjkfdsjhj', 1),
(28, 'dsfguyghgjhghjgg', 1),
(34, 'koko708090', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `mec_location`
--

CREATE TABLE `mec_location` (
  `id_mec` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Location` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `mec_location`
--

INSERT INTO `mec_location` (`id_mec`, `username`, `Location`) VALUES
(20, 'mostafa', 'Giza'),
(21, 'mohamed', 'alex'),
(24, 'ibrahim', 'Cairo'),
(26, 'adskal', 'Cairo'),
(27, 'sdajnj', 'Cairo'),
(28, 'djasnjds', 'Cairo'),
(34, '', 'Giza');

-- --------------------------------------------------------

--
-- بنية الجدول `staff`
--

CREATE TABLE `staff` (
  `id-user` int(11) NOT NULL,
  `id-mechanic` int(100) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `staff`
--

INSERT INTO `staff` (`id-user`, `id-mechanic`, `state`) VALUES
(19, 15, 1),
(30, 20, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `email`, `user_type_id`) VALUES
(1, 'OmarMessi', '156', 'Omar', 'Mohamed', 'Omar.com', 1),
(15, 'Niga', '149789', 'ali', 'ashraf', '', 2),
(19, 'Ahmed80', '123456', 'Ahmed', 'mohamed', 'omessi18@gmail.com', 3),
(20, 'mostafa', '149789', 'ali', 'mostafa', 'Ali_88.com', 2),
(30, 'omar', '123456', 'omar', 'Yousef', 'youseed.com', 3),
(31, 'yoyo', '123456', 'sandjnj', 'dnscjkancj', 'omea@gmial.com', 2),
(32, 'koko', '123456', 'momo', 'askndklsadn', 'omar@gmail.com', 2),
(33, 'koko', '123456', 'momo', 'askndklsadn', 'omar@gmail.com', 2),
(34, 'koko708090', '123456', 'hoho', 'koko', 'koko8090100@yahoo.com', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `user_tpe`
--

CREATE TABLE `user_tpe` (
  `type_id` int(20) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `user_tpe`
--

INSERT INTO `user_tpe` (`type_id`, `type`) VALUES
(1, 'Admin'),
(2, 'Mechanic'),
(3, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id-actor`);

--
-- Indexes for table `mechanic_state`
--
ALTER TABLE `mechanic_state`
  ADD PRIMARY KEY (`id_mechanic`),
  ADD KEY `id_mechanic` (`id_mechanic`);

--
-- Indexes for table `mec_location`
--
ALTER TABLE `mec_location`
  ADD PRIMARY KEY (`id_mec`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id-user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tpe`
--
ALTER TABLE `user_tpe`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_tpe`
--
ALTER TABLE `user_tpe`
  MODIFY `type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
