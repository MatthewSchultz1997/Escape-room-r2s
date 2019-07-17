-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 06:11 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escape_room_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm_p`
--

CREATE TABLE `atm_p` (
  `Partial_Pressures` int(10) NOT NULL,
  `Sabatier_Balance` int(10) NOT NULL,
  `Sabatier_Connect` int(10) NOT NULL,
  `Sabatier_Feedrate` int(10) NOT NULL,
  `O2_Connect` int(10) NOT NULL,
  `CDRA_Connect` int(10) NOT NULL,
  `CDRA_Leak` int(10) NOT NULL,
  `Test` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atm_p`
--

INSERT INTO `atm_p` (`Partial_Pressures`, `Sabatier_Balance`, `Sabatier_Connect`, `Sabatier_Feedrate`, `O2_Connect`, `CDRA_Connect`, `CDRA_Leak`, `Test`) VALUES
(0, 0, 0, 0, 0, 0, 0, 1),
(1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `atm_P` int(1) NOT NULL,
  `Comm` int(1) NOT NULL,
  `Soil_P` int(1) NOT NULL,
  `Water_C` int(1) NOT NULL,
  `Rover` int(1) NOT NULL,
  `Pwr_P` int(1) NOT NULL,
  `Water_P` int(1) NOT NULL,
  `Liq` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`atm_P`, `Comm`, `Soil_P`, `Water_C`, `Rover`, `Pwr_P`, `Water_P`, `Liq`) VALUES
(0, 0, 1, 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pressure_test`
--

CREATE TABLE `pressure_test` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `time`) VALUES
(18, 1563286517),
(19, 1563286684),
(20, 1563292453),
(21, 1563372665),
(22, 1563372890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pressure_test`
--
ALTER TABLE `pressure_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pressure_test`
--
ALTER TABLE `pressure_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
