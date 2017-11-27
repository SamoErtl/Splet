-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 12:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bowlingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bowl_games`
--

CREATE TABLE `bowl_games` (
  `ID_game` int(11) NOT NULL,
  `game_date` date NOT NULL,
  `public_box` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `game_score` varchar(255) DEFAULT NULL,
  `user_ID` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bowl_games`
--

INSERT INTO `bowl_games` (`ID_game`, `game_date`, `public_box`, `game_score`, `user_ID`) VALUES
(3, '2017-06-01', 'on', '1,2,3,4,5,/,X,0,X,,5,4,2,3,4,4,4,4,4,5,,99', 7),
(5, '2017-06-01', NULL, '2,2,2,2,2,,X,,5,/,6,2,7,2,2,2,2,2,2,2,,75', 7),
(6, '2017-06-01', 'on', '1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1', 6),
(7, '2017-06-02', 'on', '2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2', 7),
(12, '2017-06-02', NULL, 'A,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0', 7),
(13, '2017-06-02', NULL, '0,,0,,0,,0,,,,0,,0,,0,,0,,0,,,0', 7),
(14, '2017-06-02', NULL, '0,,0,,0,,0,,0,,0,,0,,0,,0,,0,,,0', 8),
(15, '2017-06-02', 'on', '0,,0,,0,,0,,0,,5,,0,,0,,0,,0,,,5', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `username`, `password`) VALUES
(6, 'bana', '$2y$10$2gIKhUIU7Xg3PZSTZIvVouQDU7g9Ad0Qmdme7LNoISOLqhCfLSNUm'),
(7, 'joe', '$2y$10$D.61Pu8ApzpCtw6dFQpCDuj7Fb1b8mUrE7DEszgki4Q8a5nUz0nwG'),
(8, 'goba', '$2y$10$fgn6LWiofgkYtEIo87HMDuRUFR0zLX5NnZo46Gb0d5AIklmTXqT16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bowl_games`
--
ALTER TABLE `bowl_games`
  ADD PRIMARY KEY (`ID_game`),
  ADD UNIQUE KEY `ID_game` (`ID_game`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bowl_games`
--
ALTER TABLE `bowl_games`
  MODIFY `ID_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bowl_games`
--
ALTER TABLE `bowl_games`
  ADD CONSTRAINT `bowl_games_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user2` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
