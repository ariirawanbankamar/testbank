-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 06:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ari_irawan_bank_amar`
--

-- --------------------------------------------------------

--
-- Table structure for table `debtor`
--

CREATE TABLE `debtor` (
  `id_debtor` int(11) NOT NULL,
  `name_debtor` varchar(255) NOT NULL,
  `name_debtor2` varchar(255) NOT NULL,
  `ktp_debtor` varchar(255) NOT NULL,
  `loan_amount` bigint(20) NOT NULL,
  `loan_period` int(11) NOT NULL,
  `loan_purpose` varchar(255) NOT NULL,
  `dob_debtor` date NOT NULL,
  `sex_debtor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debtor`
--

INSERT INTO `debtor` (`id_debtor`, `name_debtor`, `name_debtor2`, `ktp_debtor`, `loan_amount`, `loan_period`, `loan_purpose`, `dob_debtor`, `sex_debtor`) VALUES
(35, 'Yadi', 'Pin', '1870921306840001', 9500, 4, '4', '1984-06-13', 1),
(38, 'Susi', 'Irawan', '187117670987001', 8450, 3, '4', '1987-09-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `id_period` int(11) NOT NULL,
  `period_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id_period`, `period_time`) VALUES
(1, 12),
(2, 18),
(3, 24),
(4, 30),
(5, 36),
(6, 42),
(7, 48);

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `id_purpose` int(11) NOT NULL,
  `desc_purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`id_purpose`, `desc_purpose`) VALUES
(1, 'Renovation'),
(2, 'Electronics'),
(3, 'Wedding'),
(4, 'Vacation'),
(5, 'Rent'),
(6, 'Car'),
(7, 'Investment');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `debtor`
--
ALTER TABLE `debtor`
  ADD PRIMARY KEY (`id_debtor`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id_period`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`id_purpose`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debtor`
--
ALTER TABLE `debtor`
  MODIFY `id_debtor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `id_period` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id_purpose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
