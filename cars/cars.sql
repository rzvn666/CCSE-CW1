-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 01:04 PM
-- Server version: 8.0.32
-- PHP Version: 8.2.1

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
  `id` int NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int NOT NULL,
  `price` int NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `year`, `price`, `image`) VALUES
(1, 'Renault', 'Megane', 2015, 5700, 'https://pdg-uks-cdn.pinewooddms.com/87964a4e-7692-45e5-8ce9-fe1a2d307e64/vehicles/b5d6e078-4beb-4fb7-9cd2-114f68be7a22.jpg?'),
(2, 'Citroen', 'C1', 2013, 4700, 'https://pdg-uks-cdn.pinewooddms.com/87964a4e-7692-45e5-8ce9-fe1a2d307e64/vehicles/654ed3fe-3219-4fab-8cbe-db6194f705b1.jpg?'),
(3, 'Toyota', 'Aygo', 2014, 5700, 'https://pdg-uks-cdn.pinewooddms.com/b04b90f8-2e99-463d-a023-7e3c771fb388/vehicles/16b80d06-bd57-4d66-9e55-44d2403ec33d.jpg?'),
(4, 'Ford', 'KA', 2015, 5700, 'https://pdg-uks-cdn.pinewooddms.com/24dfbebc-f316-4175-8b08-f840b6c3b521/vehicles/d0e517b1-e1bb-4db5-bfd2-4eb409ce46dc.jpg?'),
(5, 'Vauxhall', 'GTC', 2015, 5850, 'https://pdg-uks-cdn.pinewooddms.com/24dfbebc-f316-4175-8b08-f840b6c3b521/vehicles/2ce32690-855c-4bf9-bf44-3aa00aaa4089.jpg?'),
(6, 'Dacia', 'Sandero Stepway', 2016, 5900, 'https://pdg-uks-cdn.pinewooddms.com/b04b90f8-2e99-463d-a023-7e3c771fb388/vehicles/9eeb3737-693b-488f-8f42-6403daf90946.jpg?'),
(7, 'Fiat', '500', 2013, 6000, 'https://pdg-uks-cdn.pinewooddms.com/b04b90f8-2e99-463d-a023-7e3c771fb388/vehicles/c5cfd9ce-d580-4dee-9b7d-ca9b1c38be40.jpg?'),
(8, 'Mazda', 'MX-5', 2010, 6500, 'https://pdg-uks-cdn.pinewooddms.com/87964a4e-7692-45e5-8ce9-fe1a2d307e64/vehicles/f08fa8e5-6581-4430-9c73-598b3d2ffdbd.jpg?'),
(9, 'SEAT', 'Ibiza', 2013, 7400, 'https://pdg-uks-cdn.pinewooddms.com/7ab953b1-969d-4779-a647-956670b6337b/vehicles/29226a06-5b15-4b6b-baee-a090959f1ba3.jpg?'),
(10, 'DS', 'DS 3', 2016, 8050, 'https://pdg-uks-cdn.pinewooddms.com/87964a4e-7692-45e5-8ce9-fe1a2d307e64/vehicles/a52fd96f-6295-49f1-bb13-b26622a04640.jpg?');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
