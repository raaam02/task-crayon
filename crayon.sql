-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 06:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crayon`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `years` int(11) NOT NULL,
  `months` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `company`, `years`, `months`) VALUES
(1, 1, 'crayon infotech', 1, 6),
(10, 16, 'Crayon Infotech4', 4, 6),
(11, 16, 'Vought', 5, 4),
(17, 19, '', 0, 0),
(21, 25, 'teb', 4, 1),
(22, 26, 'teb', 4, 1),
(23, 27, 'teb', 4, 1),
(25, 29, 'teb', 4, 1),
(26, 29, 'df', 1, 8),
(27, 30, 'teb', 4, 1),
(28, 30, 'df', 1, 9),
(29, 31, 'teb', 4, 4),
(30, 31, 'df', 1, 9),
(31, 32, 'teb', 4, 4),
(32, 32, 'df', 1, 7),
(33, 33, 'teb', 4, 4),
(34, 33, 'df', 1, 2),
(35, 34, 'teb', 4, 4),
(36, 34, 'df', 1, 2),
(37, 35, 'teb', 4, 4),
(38, 35, 'df', 1, 2),
(39, 36, 'teb', 4, 4),
(40, 36, 'df', 1, 2),
(44, 38, 'Infosys', 1, 3),
(45, 38, 'Amazon', 3, 11),
(47, 38, 'facebook', 3, 3),
(48, 38, 'apple', 1, 3),
(49, 39, 'crayon', 1, 6),
(50, 39, 'infotech', 1, 7),
(52, 39, 'ram', 1, 1),
(53, 40, 'none', 0, 0),
(54, 41, 'NO', 0, 0),
(55, 42, 'NO', 0, 0),
(56, 43, '0', 0, 0),
(57, 44, 'NO', 0, 0),
(58, 45, '0', 0, 0),
(60, 47, 'crayon', 5, 10),
(61, 47, 'infotech', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `gender`) VALUES
(1, 'Ramdyal Prajapati', 'ramp@gmail.com', '5656565656', 'male'),
(16, 'exp4', 'exp4@gmail.com', '1231231235', 'other'),
(19, 'test2', 'test@gmail.com', '3232323232', 'male'),
(25, 'Ramdyal Prajapati', 'kingk9869991@gmail.com', '9999197690', 'male'),
(26, 'mark', 'mark@gmail.com', '9898197690', 'male'),
(27, 'tom', 'tom@gmail.com', '9998197690', 'male'),
(29, 'harman', 'harman@gmail.com', '9988777690', 'male'),
(30, 'sumya', 'sumya@gmail.com', '9988778690', 'female'),
(31, 'dinesh', 'dinesh@gmail.com', '9988778699', 'female'),
(32, 'mit', 'mit@gmail.com', '9988778600', 'female'),
(33, 'sinha', 'sinha@gmail.com', '9988770000', 'other'),
(34, 'poky', 'poky@gmail.com', '9988772100', 'other'),
(35, 'min', 'MIN@gmail.com', '9988372100', 'other'),
(36, 'KOLU', 'kolu@gmail.com', '9984372100', 'other'),
(38, 'sonu', 'sonu@gmail.com', '9898989898', 'male'),
(39, 'donee', 'donee@gmail.com', '9988776644', 'male'),
(40, 'test', 'test@gami.com', '9988776655', 'male'),
(41, 'test', 'test@gmail.com', '9966332211', 'male'),
(42, 'test', 'test@gmail.com', '9966332222', 'male'),
(43, 'rama', 'rama@gmail.com', '8286197690', 'male'),
(44, 'bhima', 'bhima@gmail.com', '8286197611', 'male'),
(45, 'masa', 'masa@gmail.com', '9879879877', 'male'),
(47, 'lasttestt', 'lasttest1@gamil.com', '9988776612', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
