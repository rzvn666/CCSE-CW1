-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2023 at 06:36 PM
-- Server version: 10.11.2-MariaDB
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccse_cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `sold` tinyint(1) NOT NULL,
  `reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `year`, `price`, `image`, `sold`, `reserved`) VALUES
(1, 'Renault', 'Megane', 2015, 5700, 'images/renault-megane.jpg', 0, 0),
(2, 'Citroen', 'C1', 2013, 4700, 'images/citroen-c1.jpg', 0, 0),
(3, 'Toyota', 'Aygo', 2014, 5700, 'images/toyota-aygo.jpg', 0, 0),
(4, 'Ford', 'KA', 2015, 5700, 'images/ford-ka.jpg', 0, 0),
(5, 'Vauxhall', 'GTC', 2015, 5850, 'images/vauxhall-gtc.jpg', 0, 0),
(6, 'Dacia', 'Sandero Stepway', 2016, 5900, 'images/dacia-sandero-stepway.jpg', 0, 0),
(7, 'Fiat', '500', 2013, 6000, 'images/fiat-500.jpg', 0, 0),
(8, 'Mazda', 'MX-5', 2010, 6500, 'images/mazda-mx-5.jpg', 0, 0),
(9, 'SEAT', 'Ibiza', 2013, 7400, 'images/seat-ibiza.jpg', 0, 0),
(10, 'DS', 'DS 3', 2016, 8050, 'images/ds-ds3.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
