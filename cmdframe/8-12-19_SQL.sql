-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2019 at 12:15 PM
-- Server version: 10.1.38-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Escape_room_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm_p`
--

CREATE TABLE `atm_p` (
  `Partial_Pressures` int(10) NOT NULL,
  `Sabatier_Balance` int(10) NOT NULL,
  `Sabatier_Feedrate` int(10) NOT NULL,
  `CDRA_Leak` int(10) NOT NULL,
  `CDRA_Online` int(11) NOT NULL,
  `Test` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Liquefaction`
--

CREATE TABLE `Liquefaction` (
  `Time` int(11) NOT NULL,
  `N2_storage` int(11) NOT NULL,
  `O2_storage` int(11) NOT NULL,
  `CH4_storage` int(11) NOT NULL,
  `Sabatier_Online` int(11) NOT NULL,
  `OGA_Online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Modules`
--

CREATE TABLE `Modules` (
  `atm_P` int(11) NOT NULL,
  `Comm` int(11) NOT NULL,
  `Soil_P` int(11) NOT NULL,
  `Water_C` int(11) NOT NULL,
  `Rover` int(11) NOT NULL,
  `Pwr_P` int(11) NOT NULL,
  `Water_P` int(11) NOT NULL,
  `Liq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `OGA_Boot`
--

CREATE TABLE `OGA_Boot` (
  `Time` int(11) NOT NULL,
  `Sabatier_Boot` int(11) NOT NULL,
  `OGA_Boot` int(11) NOT NULL,
  `OGA_Online` int(11) NOT NULL,
  `Sabatier_Online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Piping`
--

CREATE TABLE `Piping` (
  `OGA_H2O_Feed` int(11) NOT NULL,
  `OGA_H2O_R_Feed` int(11) NOT NULL,
  `OGA_O2_Out` int(11) NOT NULL,
  `OGA_H2_Out` int(11) NOT NULL,
  `CDRA_CO2_Out` int(11) NOT NULL,
  `Sabatier_H2O_Out` int(11) NOT NULL,
  `Sabatier_CH4_Out` int(11) NOT NULL,
  `Moisture_H2O_Out` int(11) NOT NULL,
  `N2_Purge` int(11) NOT NULL,
  `Reset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pressure_test`
--

CREATE TABLE `pressure_test` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pwrp`
--

CREATE TABLE `pwrp` (
  `id` int(11) NOT NULL,
  `Core_T` int(11) NOT NULL,
  `Fin_T` int(11) NOT NULL,
  `Fix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_SP`
--

CREATE TABLE `time_SP` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pressure_test`
--
ALTER TABLE `pressure_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwrp`
--
ALTER TABLE `pwrp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_SP`
--
ALTER TABLE `time_SP`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pressure_test`
--
ALTER TABLE `pressure_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `pwrp`
--
ALTER TABLE `pwrp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `time_SP`
--
ALTER TABLE `time_SP`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
