-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2024 at 10:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `longreach`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `ID` int(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Price` int(100) NOT NULL,
  `Goals` int(100) NOT NULL,
  `Assists` int(100) NOT NULL,
  `Games_Played` int(100) NOT NULL,
  `Clean_sheets` int(100) NOT NULL,
  `MOTMs` int(100) NOT NULL,
  `Yellow_Cards` int(100) NOT NULL,
  `Red_Cards` int(100) NOT NULL,
  `Points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`ID`, `Name`, `Position`, `Price`, `Goals`, `Assists`, `Games_Played`, `Clean_sheets`, `MOTMs`, `Yellow_Cards`, `Red_Cards`, `Points`) VALUES
(1, 'Lewis C', 'MID', 5, 2, 4, 17, 0, 1, 1, 0, 38),
(2, 'Matt T', 'ATT', 8, 46, 12, 18, 0, 2, 0, 0, 242),
(3, 'Pinky', 'DEF', 6, 0, 12, 17, 4, 1, 0, 0, 67),
(4, 'Conor B', 'DEF', 5, 0, 4, 19, 4, 0, 0, 0, 43),
(5, 'Steven W', 'MID', 5, 0, 1, 17, 0, 0, 0, 0, 20),
(6, 'Jack C', 'MID', 6, 5, 10, 16, 0, 2, 0, 0, 70),
(7, 'Tyler D', 'MID', 6, 9, 6, 13, 0, 0, 0, 0, 67),
(8, 'Jordan C', 'ATT', 6, 10, 9, 19, 0, 1, 0, 0, 88),
(9, 'Josh C', 'ATT', 5, 2, 2, 16, 0, 0, 0, 0, 30),
(10, 'Josh S', 'MID', 5, 1, 1, 12, 0, 0, 0, 0, 19),
(11, 'Jack D', 'DEF', 5, 0, 0, 11, 3, 0, 0, 0, 20),
(12, 'Ash M', 'DEF', 5, 0, 1, 16, 3, 0, 0, 0, 28),
(13, 'Cam E', 'DEF', 5, 0, 4, 20, 4, 0, 0, 0, 44);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `Team_ID` int(50) NOT NULL,
  `Team_Points` int(255) NOT NULL,
  `User` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`) VALUES
(1, '5jerry', '$2y$12$OJrn3WAOMehTqDRsAsdy1O3VVGtoEc9.lBcj6pj2e5I8SzjbWegay', 'jerry55@outlook.co.uk'),
(2, '44lew', '$2y$12$6vyk0Ej1Sr40Mqy/D8NudeB.KENYokWgotKjfKhonUQKXBxbxAvDm', 'lewis_44@outlook.com'),
(3, 'ready12', '$2y$12$U265EYXQeP/nvhrV8O.YaeNTDOFPymmNCgMcWlwJkkkin8JqDfoVa', 'lew@hotmail.com'),
(4, 'john101', '$2y$12$644agjWcfxq1xDt4J2.yYu9IM3hhGHu2iIQRpCfWetmTs77FfldSa', 'john@gmail.com'),
(5, 'test1', '$2y$12$cMe6AAPareBpakG6QPYqNusNsVRYwp80ShxMK3Y5HzI4Hnh1Jkzxq', 'test@outlook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`Team_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
