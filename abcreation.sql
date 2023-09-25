-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 01:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcreation`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_form`
--

CREATE TABLE `invoice_form` (
  `id` int(5) NOT NULL,
  `Company` varchar(300) NOT NULL,
  `InvoieceDate` date NOT NULL,
  `InvoiceNumber` varchar(300) NOT NULL,
  `ReqId` varchar(300) NOT NULL,
  `bookedBy` varchar(300) NOT NULL,
  `PassengerName` varchar(300) NOT NULL,
  `FromDate` date NOT NULL,
  `ToDate` date NOT NULL,
  `VehicleGroup` varchar(300) NOT NULL,
  `VehicleNumber` varchar(300) NOT NULL,
  `DutyType` varchar(300) NOT NULL,
  `Rate` int(200) NOT NULL,
  `dutyAmt` int(100) NOT NULL,
  `ExtraHrs` varchar(20) NOT NULL,
  `myQtyHrs` int(200) NOT NULL,
  `extHAmt` int(100) NOT NULL,
  `ExtraKms` int(200) NOT NULL,
  `myQtyKms` int(200) NOT NULL,
  `extKAmt` int(100) NOT NULL,
  `ParkingandToll` int(100) NOT NULL,
  `NightAllownace` int(100) NOT NULL,
  `Total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_form`
--
ALTER TABLE `invoice_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_form`
--
ALTER TABLE `invoice_form`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
