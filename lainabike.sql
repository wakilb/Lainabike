-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 05:14 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lainabike`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `HashedPassword` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `Name`, `Email`, `HashedPassword`) VALUES
(59, 'Abdelwakil Bouljoub', 'abouljoub@gmail.com', '$2y$10$w4Pp4YHBOjYm9arsbwx9j.1LmFvKwxzyabU3.U.IwW5UhKYavWbbu');

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `Id` int(11) NOT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `Size` int(2) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Availability` char(3) DEFAULT NULL,
  `Public_Id` varchar(50) DEFAULT NULL,
  `Photo` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`Id`, `Model`, `Size`, `Location`, `Availability`, `Public_Id`, `Photo`) VALUES
(1, 'RoadRacing', 49, 'Niemi', 'PD', 'RR2', ''),
(2, 'Track', 50, 'Niemi', 'yes', 'Tr1', ''),
(10, 'RoadRacing', 50, 'Fellmannia', 'yes', 'RoRa', ''),
(4, 'Mountain', 49, 'Fellmannia', 'PD', 'Mo1', ''),
(5, 'CycloCross', 50, 'Niemi', 'yes', 'Cy1', ''),
(6, 'RoadRacing', 51, 'Fellmannia', 'PD', 'RR2', ''),
(7, 'Track', 52, 'Niemi', 'yes', 'Tr2', ''),
(8, 'Mountain', 51, 'Niemi', 'PD', 'Mo2VR', ''),
(11, 'RoadRacing', 49, 'Fellmannia', 'yes', 'Mo1', ''),
(17, 'RoadRacing', 49, 'Niemi', 'yes', 'RR1', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `Bike_Id` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Status` tinyint(3) DEFAULT NULL,
  `Initial_Status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`Id`, `User_Id`, `Bike_Id`, `Date`, `Number`, `Status`, `Initial_Status`) VALUES
(1, 1, 6, '2017-11-01', 1, 3, 0),
(31, 1, 1, '2018-01-03', 1, 3, 0),
(3, 1, 6, '2017-11-01', 1, 3, 0),
(30, 1, 3, '2017-11-27', 1, 3, 0),
(29, 1, 4, '2017-11-27', 1, 3, 0),
(6, 1, 7, '2017-11-01', 1, 3, 0),
(27, 1, 1, '2017-11-27', 1, 3, 0),
(28, 1, 4, '2017-11-27', 1, 3, 0),
(9, 1, 8, '2017-11-14', 1, 3, 0),
(32, 1, 1, '2018-01-16', 1, 3, 0),
(34, 59, 1, '2018-01-18', 1, 3, 0),
(35, 59, 1, '2018-01-22', 1, 3, 0),
(36, 59, 1, '2018-01-22', 1, 3, 0),
(37, 59, 1, '2018-01-22', 1, 3, 0),
(38, 59, 1, '2018-01-22', 1, 3, 0),
(39, 59, 1, '2018-01-22', 1, 2, 0),
(40, 60, 2, '2018-01-22', 1, 3, 0),
(42, 60, 2, '2018-01-22', 1, 3, 0),
(44, 59, 2, '2018-01-25', 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `HashedPassword` varchar(255) DEFAULT NULL,
  `Feedback` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `HashedPassword`, `Feedback`) VALUES
(59, 'Abdelwakil Bouljoub', 'abouljoub@gmail.com', '$2y$10$xq2s9G1o.BFFrk.FgEHCgOO9jjwqu5EVz41rYIIvfrmtyKBr4oQwe', 0),
(60, 'wakil user', 'user@gmail.com', '$2y$10$mMRnYOpRwfNjo3qyZYmP4O5F8tOdyxvqRN7HmMc9qkGZgSZ5Z0ZuK', 0),
(61, 'johne ', 'johne@lainabike.fi', '$2y$10$YsVoBzupinELjkFrzdmPfeuppmwm7/ARb18GCJJUCnaxXvjII2eWe', 0),
(62, 'james', 'james@lainabike.fi', '$2y$10$GNSxgzLervQ4xz5NnE/jhOu8ygKAU5y18mHuo/7L3KbkCw7mNHaqK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD KEY `id` (`Id`);

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK` (`User_Id`,`Bike_Id`),
  ADD KEY `fk_Bike_Id` (`Bike_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
