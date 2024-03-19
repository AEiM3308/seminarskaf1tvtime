-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 10:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarska`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `season_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `season_id`) VALUES
(4, '/seminarska/uploads/Trophypng.parspng.com-5.png', 1),
(5, '/seminarska/uploads/shortbanner2.png', 1),
(6, '/seminarska/uploads/Arctic_Awakening_Logo_001.0693e98.png', 8),
(7, '/seminarska/uploads/shortbanner.png', 7),
(8, '/seminarska/uploads/2210.i203.037.F.m004.c9.FP hoodie  hooded sweatshirt mockup realistic set.jpg', 8),
(9, '/seminarska/uploads/c.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `season_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`id`, `date`, `name`, `location`, `season_id`) VALUES
(9, '2024-03-02', 'Bahrain Grand Prix - Bahrain International Circuit', 'Bahrain, Sakhir', 1),
(10, '2024-03-09', 'Saudi Arabian Grand Prix - Jeddah Corniche Circuit', 'Saudi Arabia, Jeddah', 1),
(11, '2024-03-24', 'Australian Grand Prix - Albert Park Circuit', 'Australia, Melbourne', 1),
(12, '2024-04-07', 'Japanese Grand Prix - Suzuka International Racing Course', 'Japan, Suzuka', 1),
(13, '2024-04-21', 'Chinese Grand Prix - Shanghai International Circuit', 'China, Shanghai', 1),
(14, '2024-05-05', 'Miami Grand Prix - Miami International Autodrome', 'Miami Gardens, Florida, USA', 1),
(15, '2024-05-19', 'Emilia Romagna Grand Prix - Imola Circuit', 'Italy, Imola', 1),
(16, '2024-05-26', 'Monaco Grand Prix, Circuit de Monaco', 'Monaco', 1),
(17, '2024-06-09', 'Canadian Grand Prix,  Circuit Gilles Villeneuve', 'Canada, Montreal', 1),
(18, '2024-06-23', 'Spanish Grand Prix, Circuit de Barcelona-Catalunya', 'Spain, Montmeló', 1),
(19, '2024-06-30', 'Austrian Grand Prix, Red Bull Ring', 'Austria, Spielberg', 1),
(20, '2024-07-07', 'British Grand Prix, Silverstone Circuit', 'United Kingdom, Silverstone', 1),
(21, '2024-07-21', 'Hungarian Grand Prix, Hungaroring', 'Hungary, Mogyoród', 1),
(22, '2024-07-28', 'Belgian Grand Prix, Circuit de Spa-Francorchamps', 'Belgium, Stavelot', 1),
(23, '2024-08-25', 'Dutch Grand Prix, Circuit Zandvoort', 'Netherlands, Zandvoort', 1),
(24, '2024-09-01', 'Italian Grand Prix, Monza Circuit', 'Italy, Monza', 1),
(25, '2024-09-15', 'Azerbaijan Grand Prix, Baku City Circuit', 'Azerbaijan, Baku', 1),
(26, '2024-09-22', 'Singapore Grand Prix, Marina Bay Street Circuit', 'Singapore', 1),
(27, '2024-10-20', 'United States Grand Prix, Circuit of the Americas', 'Austin, Texas, USA', 1),
(28, '2024-10-27', 'Mexico City Grand Prix, Autódromo Hermanos Rodríguez', 'Mexico, Mexico City', 1),
(29, '2024-11-03', 'São Paulo Grand Prix, Interlagos Circuit', 'Brazil, São Paulo', 1),
(30, '2024-11-23', 'Las Vegas Grand Prix, Las Vegas Strip Circuit', 'Paradise, Nevada, USA', 1),
(31, '2024-12-01', 'Qatar Grand Prix, Lusail International Circuit', 'Qatar, Lusail', 1),
(32, '2024-12-08', 'Abu Dhabi Grand Prix, Yas Marina Circuit', 'United Arab Emirates, Abu Dhabi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `year`) VALUES
(8, 2017),
(7, 2018),
(6, 2019),
(5, 2020),
(4, 2021),
(3, 2022),
(2, 2023),
(1, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password_hash`, `username`) VALUES
(1, 'janisworst@gmail.com', '$2y$10$d3TVk6wrn8cvWegkuGNrtuL2oYM9uAim3peZ21uXay.PK33Wn2BAi', 'pukiisbest'),
(3, 'aeim123@gmail.com', '$2y$10$qKuhekqscDGeh49vkuZ3kOP.J2b96ED.s9E4ABj0g4voppIgvcBzq', 'AEIM'),
(6, '123@gmail.com', '$2y$10$eTrxlmBhmMFPxBPRx4hUOugr0SSzPUNJwR/UcTueaD2pVmnZBs3SC', '123');

-- --------------------------------------------------------

--
-- Table structure for table `watched`
--

CREATE TABLE `watched` (
  `id` int(11) NOT NULL,
  `race_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_image_season_id` (`season_id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_season` (`season_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year` (`year`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `watched`
--
ALTER TABLE `watched`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_race_watched` (`race_id`),
  ADD KEY `FK_user_watched` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `watched`
--
ALTER TABLE `watched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_image_season_id` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`);

--
-- Constraints for table `races`
--
ALTER TABLE `races`
  ADD CONSTRAINT `FK_season` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`);

--
-- Constraints for table `watched`
--
ALTER TABLE `watched`
  ADD CONSTRAINT `FK_race_watched` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `FK_user_watched` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
