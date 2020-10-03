-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 06:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zujo`
--

-- --------------------------------------------------------

--
-- Table structure for table `csv`
--

CREATE TABLE `csv` (
  `Id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csv`
--

INSERT INTO `csv` (`Id`, `Username`, `Amount`, `Date`) VALUES
(5, 'brijesh', '5000', '25-02-2020'),
(6, 'sahani', '2000', '21-04-2020'),
(30, 'demo1', '56245', '05-04-2020'),
(29, 'demo', '10202', '02-04-2020'),
(28, 'sahani', '2000', '01-04-2020'),
(27, 'brijesh', '5000', '25-02-2020'),
(26, 'demo1', '56245', '05-04-2020'),
(25, 'demo', '10202', '02-04-2020'),
(24, 'sahani', '2000', '01-04-2020'),
(23, 'brijesh', '5000', '25-02-2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csv`
--
ALTER TABLE `csv`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csv`
--
ALTER TABLE `csv`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
