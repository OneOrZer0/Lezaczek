-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 08:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sun`
--

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `id` int(11) NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `city`) VALUES
(2, 'Rewal'),
(16, 'Dziwnówek'),
(17, 'test'),
(18, 'jhasdj'),
(19, 'Kraków');

-- --------------------------------------------------------

--
-- Table structure for table `history_one_day`
--

CREATE TABLE `history_one_day` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `operation` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `note_url` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `history_one_day`
--

INSERT INTO `history_one_day` (`id`, `id_user`, `id_place`, `operation`, `note`, `note_url`, `time`, `date`) VALUES
(16, 11, 20, 'umb_UM', '', '', '04:40:00', '2024-04-16'),
(17, 11, 20, 'umb_UM', '', '', '04:40:00', '2024-04-16'),
(18, 11, 20, 'umb_UP', '', '', '04:40:00', '2024-04-16'),
(19, 11, 20, 'umb_UP', '', '', '04:40:00', '2024-04-16'),
(20, 11, 20, 'umb_DP', '', '', '04:40:00', '2024-04-16'),
(21, 11, 20, 'umb_DP', '', '', '04:40:00', '2024-04-16'),
(22, 11, 20, 'umb_DP', '', '', '04:40:00', '2024-04-16'),
(23, 11, 20, 'umb_DP', '', '', '04:40:00', '2024-04-16'),
(24, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(25, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(26, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(27, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(28, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(29, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(30, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(31, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(32, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(33, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `notepad`
--

CREATE TABLE `notepad` (
  `id` int(11) NOT NULL,
  `sunbed` int(11) NOT NULL,
  `state_sun` int(11) NOT NULL,
  `sun_diner` int(11) NOT NULL,
  `umbrella` int(11) NOT NULL,
  `state_umb` int(11) NOT NULL,
  `umb_deposit` int(11) NOT NULL,
  `umb_diner` int(11) NOT NULL,
  `screen` int(11) NOT NULL,
  `state_scr` int(11) NOT NULL,
  `scr_deposit` int(11) NOT NULL,
  `scr_diner` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `notepad`
--

INSERT INTO `notepad` (`id`, `sunbed`, `state_sun`, `sun_diner`, `umbrella`, `state_umb`, `umb_deposit`, `umb_diner`, `screen`, `state_scr`, `scr_deposit`, `scr_diner`, `id_place`, `date`) VALUES
(14, 96, 100, 12, 16, 100, 0, 0, 18, 100, 0, 10, 20, '2024-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `street` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `mark` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `sunbeds` int(11) NOT NULL,
  `umbrellas` int(11) NOT NULL,
  `screens` int(11) NOT NULL,
  `no_sunbeds` int(11) NOT NULL,
  `no_umbrellas` int(11) NOT NULL,
  `no_screens` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `id_city`, `street`, `mark`, `sunbeds`, `umbrellas`, `screens`, `no_sunbeds`, `no_umbrellas`, `no_screens`) VALUES
(20, 2, 'Różana', 'Różana 12', 100, 100, 100, 2, 0, 0),
(21, 16, 'Piaskowe', 'Piaskowa 3', 100, 100, 100, 0, 0, 0),
(22, 17, 'test', 'test', 123, 123, 123, 0, 0, 0),
(24, 19, 'asdasd', 'asdas', 12, 12, 12, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `planed`
--

CREATE TABLE `planed` (
  `id` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `planed`
--

INSERT INTO `planed` (`id`, `id_place`, `id_user`, `status`) VALUES
(22, 20, 10, 'support'),
(23, 20, 11, 'working');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `surname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `pass` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `pesel` int(11) NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `access` int(11) NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `street` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nr_home` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `pass`, `tel`, `pesel`, `status`, `access`, `city`, `street`, `nr_home`) VALUES
(8, 'huj', 'jasjd', 'akjsd@wp.pl', '$2y$10$zq2noUvhku6k4Dzhr0elv.2ZqhT9fy1GEZ/TKIEyaDwh8mF6dUjHy', 91082391, 0, 'offline', 1, '', '', ''),
(9, 'Marek', 'Śnigurowicz', 'mpog.marko@wp.pl', '$2y$10$Y96cQoJOwMa62Np3VX0rhuXKp5Ia4KLlG5tJT/Vc9xNYE8uv6UGQi', 2147483647, 0, 'offline', 7, '', '', ''),
(10, 'Test', 'Testowy', 'test@wp.pl', '$2y$10$ffQ4rOyfLYeXVwk/5gqtmOtJ/S8X36yNofKQ.U.r5RzkGwQw02Jre', 888888888, 9898989, 'offline', 1, 'Testonia', 'Testa', '12'),
(11, 'Grzegorz', 'Garski', 'ggarski@wp.pl', '$2y$10$HObzIUE2k/MRrXxdZFarDO4AqyLgVozYLMhKffueK.2rDB2P2qu2G', 897876767, 2147483647, 'offline', 1, 'Malbork', 'Malborska', '12'),
(12, 'andrzej', 'głupek', 'aglupek@gmail.com', '$2y$10$PsroWKQd7iGQWzARtLKWNuWt4Rygg68OvtG80prPLeu0KRDY/PN.i', 876567453, 999999999, 'offline', 1, 'Resko', 'Debila', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_one_day`
--
ALTER TABLE `history_one_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Indexes for table `notepad`
--
ALTER TABLE `notepad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_place` (`id_place`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`);

--
-- Indexes for table `planed`
--
ALTER TABLE `planed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `history_one_day`
--
ALTER TABLE `history_one_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notepad`
--
ALTER TABLE `notepad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `planed`
--
ALTER TABLE `planed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_one_day`
--
ALTER TABLE `history_one_day`
  ADD CONSTRAINT `history_one_day_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `history_one_day_ibfk_2` FOREIGN KEY (`id_place`) REFERENCES `places` (`id`);

--
-- Constraints for table `notepad`
--
ALTER TABLE `notepad`
  ADD CONSTRAINT `notepad_ibfk_1` FOREIGN KEY (`id_place`) REFERENCES `places` (`id`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `citys` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
