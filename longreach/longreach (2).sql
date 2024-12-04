-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 12:15 AM
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
  `Donkey` int(100) NOT NULL,
  `Points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`ID`, `Name`, `Position`, `Price`, `Goals`, `Assists`, `Games_Played`, `Clean_sheets`, `MOTMs`, `Yellow_Cards`, `Donkey`, `Points`) VALUES
(1, 'Lewis C', 'DEF', 2, 0, 5, 11, 4, 1, 0, 1, 33),
(2, 'Matt T', 'ATT', 7, 16, 3, 7, 0, 1, 0, 0, 63),
(3, 'Pinky', 'DEF', 3, 2, 5, 8, 2, 0, 0, 2, 26),
(4, 'Conor B', 'DEF', 1, 0, 1, 11, 4, 0, 0, 1, 23),
(5, 'Steven W', 'MID', 2, 3, 3, 9, 0, 0, 1, 0, 23),
(6, 'Jack C', 'DEF', 3, 1, 3, 10, 4, 2, 0, 0, 35),
(7, 'Tyler D', 'MID', 3, 1, 2, 9, 0, 0, 1, 1, 13),
(8, 'Jordan C', 'ATT', 4, 6, 4, 7, 0, 1, 0, 0, 35),
(9, 'Josh C', 'ATT', 1, 3, 2, 7, 0, 0, 5, 3, 9),
(10, 'Josh S', 'DEF', 2, 0, 1, 10, 4, 0, 0, 0, 24),
(11, 'Jack D', 'DEF', 1, 1, 0, 6, 2, 0, 0, 0, 15),
(12, 'Jake C', 'DEF', 1, 0, 0, 5, 1, 0, 0, 0, 8),
(13, 'Ben T', 'MID', 2, 2, 0, 10, 0, 0, 0, 0, 16),
(14, 'Conor D', 'ATT', 4, 7, 9, 7, 0, 1, 0, 0, 48),
(15, 'Graham T', 'DEF', 1, 0, 0, 10, 1, 2, 0, 0, 17),
(16, 'Aaron T', 'ATT', 3, 4, 2, 11, 0, 0, 0, 1, 25),
(17, 'Gummy', 'ATT', 1, 0, 0, 6, 0, 0, 0, 1, 4),
(18, 'Dan J', 'DEF', 1, 1, 0, 8, 1, 0, 0, 3, 8),
(19, 'Crispin', 'MID', 2, 1, 1, 9, 0, 1, 0, 0, 16);

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
-- Table structure for table `team_db`
--

CREATE TABLE `team_db` (
  `Team_id` int(11) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `team_name` varchar(50) NOT NULL,
  `player_1` int(11) DEFAULT NULL,
  `player_2` int(11) DEFAULT NULL,
  `player_3` int(11) DEFAULT NULL,
  `player_4` int(11) DEFAULT NULL,
  `player_5` int(11) DEFAULT NULL,
  `team_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_db`
--

INSERT INTO `team_db` (`Team_id`, `User_id`, `team_name`, `player_1`, `player_2`, `player_3`, `player_4`, `player_5`, `team_total`) VALUES
(1, 2, 'Lewis FC', 1, 2, 15, 6, 13, 164),
(2, 1, 'Steven FC', 12, 2, 5, 9, 14, 151),
(3, 3, 'Graham FC', 1, 2, 13, 15, 3, 155),
(4, 6, 'Jordan C FC', 16, 14, 9, 5, 8, 140),
(5, 7, 'Tyler FC', 2, 12, 8, 13, 9, 131),
(6, 8, 'Burge FC', 2, 15, 7, 12, 6, 136),
(7, 9, 'Matt FC', 2, 14, 1, 4, 15, 184),
(8, 10, 'Josh Clayton FC', 2, 3, 9, 11, 6, 148),
(9, 11, 'Ben T FC', 2, 12, 4, 8, 13, 145),
(10, 12, 'Jake Cox FC', 2, 17, 19, 12, 14, 139),
(11, 13, 'Pinky FC', 3, 2, 1, 18, 13, 146),
(12, 14, 'Cogz FC', 2, 1, 6, 9, 13, 156),
(13, 15, 'Josh S FC', 2, 1, 10, 15, 3, 163),
(18, 16, '', 17, 1, 12, 6, 2, 143);

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
(5, 'test1', '$2y$12$cMe6AAPareBpakG6QPYqNusNsVRYwp80ShxMK3Y5HzI4Hnh1Jkzxq', 'test@outlook.com'),
(6, 'test2', '$2y$12$4kcT5LiXTG.5P9UzIBmEju2lR4zywLyrJ2ie10gmaTNrebX6ZxHMO', 'test2@outlook.com'),
(7, 'test3', '$2y$12$4QtX3nyhSJyqwNmFmsLJIeMtkfztGsxiZy9L4RTKobKVZv8LNLYgG', 'test3@outlook.com'),
(8, 'test4', '$2y$12$dIrhW26xH4/hbL5Q49NOD./zNpWTTr.bOgBY2CYFXw29Jw/BFBnJe', 'test4@outlook.com'),
(9, 'test5', '$2y$12$dnoakOXBBWoVJiZA35MV.OW6DgUITgnFl//4D85JM7lXo5Dix4Fla', 'test5@outlook.com'),
(10, 'test6', '$2y$12$YRXy1O09c14XsBoMvEgRMuzaa4q6eBz44VK59lKxwWKXMXaWf2TDm', 'test6@outlook.com'),
(11, 'test7', '$2y$12$/SNYJtbXhh7VMdh2m5BBgOtBCtCkvdNqfMKEr4hFewgfbC4zFlDYS', 'test7@outlook.com'),
(12, 'test8', '$2y$12$rhY1tibOQYmpLwk6larbq.1oxjSciRk3nBdYdBtQ.Q4cPVyJuViEu', 'test8@outlook.com'),
(13, 'test9', '$2y$12$eC0kYIEnToGTx976YOcYIeafsvx5u9cLu7Hz2H2VnlyDjGlkazn3G', 'test9@outlook.com'),
(14, 'test10', '$2y$12$nzPE5bh98nkkPY1qoZJla.0jjkx96.6nbqrDDBOsqu5oHju9rWl6i', 'test10@outlook.com'),
(15, 'test11', '$2y$12$z8ukIbLY76Uco/iOVfdSDeuBlcOom4M8hKNbF0EavjMQ6shNpPLqe', 'test11@outlook.co.uk'),
(16, 'test123abc', '$2y$12$Ua1pX9qoMdbEEuMIscM.DuY1BfEZpgLzot2c1fqTtm.S4PYYGV62S', 'test123abc@outlook.com'),
(17, 'amy', '$2y$12$4Qj.NR0dv5l5J5x0rNGuF.SnX75nl5z1ctxaX8oD3fQWpYtUBqfMS', 'amy@outlook.com');

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
-- Indexes for table `team_db`
--
ALTER TABLE `team_db`
  ADD PRIMARY KEY (`Team_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `player_1` (`player_1`),
  ADD KEY `player_2` (`player_2`),
  ADD KEY `player_3` (`player_3`),
  ADD KEY `player_4` (`player_4`),
  ADD KEY `player_5` (`player_5`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `team_db`
--
ALTER TABLE `team_db`
  MODIFY `Team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_db`
--
ALTER TABLE `team_db`
  ADD CONSTRAINT `team_db_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `team_db_ibfk_2` FOREIGN KEY (`player_1`) REFERENCES `players` (`ID`),
  ADD CONSTRAINT `team_db_ibfk_3` FOREIGN KEY (`player_2`) REFERENCES `players` (`ID`),
  ADD CONSTRAINT `team_db_ibfk_4` FOREIGN KEY (`player_3`) REFERENCES `players` (`ID`),
  ADD CONSTRAINT `team_db_ibfk_5` FOREIGN KEY (`player_4`) REFERENCES `players` (`ID`),
  ADD CONSTRAINT `team_db_ibfk_6` FOREIGN KEY (`player_5`) REFERENCES `players` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
