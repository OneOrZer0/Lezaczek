-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Maj 2024, 22:12
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sun`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `citys`
--

CREATE TABLE `citys` (
  `id` int(11) NOT NULL,
  `city` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `citys`
--

INSERT INTO `citys` (`id`, `city`) VALUES
(2, 'Rewal'),
(16, 'Dziwnówek'),
(17, 'test'),
(18, 'jhasdj'),
(19, 'Kraków');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `history_one_day`
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
-- Zrzut danych tabeli `history_one_day`
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
(33, 11, 20, 'umb_DM', '', '', '04:40:00', '2024-04-16'),
(34, 11, 20, 'scr_DM', '', '', '11:39:00', '2024-04-20'),
(35, 11, 20, 'scr_DM', '', '', '11:39:00', '2024-04-20'),
(36, 11, 20, 'scr_DM', '', '', '11:39:00', '2024-04-20'),
(37, 11, 20, 'scr_DP', '', '', '11:39:00', '2024-04-20'),
(38, 11, 20, 'scr_DP', '', '', '11:39:00', '2024-04-20'),
(39, 11, 20, 'scr_DP', '', '', '11:39:00', '2024-04-20'),
(40, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(41, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(42, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(43, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(44, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(45, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(46, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(47, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(48, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(49, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(50, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(51, 11, 20, 'sun_DM', '', '', '21:07:00', '2024-04-20'),
(52, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(53, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(54, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(55, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(56, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(57, 11, 20, 'sun_SP', '', '', '21:07:00', '2024-04-20'),
(58, 11, 20, 'sun_SP', '', '', '21:07:00', '2024-04-20'),
(59, 11, 20, 'sun_SP', '', '', '21:07:00', '2024-04-20'),
(60, 11, 20, 'sun_SP', '', '', '21:07:00', '2024-04-20'),
(61, 11, 20, 'sun_SP', '', '', '21:07:00', '2024-04-20'),
(62, 11, 20, 'sun_SP', '', '', '21:07:00', '2024-04-20'),
(63, 11, 20, 'sun_SP', '', '', '21:07:00', '2024-04-20'),
(64, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(65, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(66, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(67, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(68, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(69, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(70, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(71, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(72, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(73, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(74, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(75, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(76, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(77, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(78, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(79, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(80, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(81, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(82, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(83, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(84, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(85, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(86, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(87, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(88, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(89, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(90, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(91, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(92, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(93, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(94, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(95, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(96, 11, 20, 'sun_SM', '', '', '21:07:00', '2024-04-20'),
(97, 11, 20, 'umb_DM', '', '', '21:10:00', '2024-04-20'),
(98, 11, 20, 'umb_UP', '', '', '21:10:00', '2024-04-20'),
(99, 11, 20, 'umb_UP', '', '', '21:10:00', '2024-04-20'),
(100, 11, 20, 'umb_UP', '', '', '21:10:00', '2024-04-20'),
(101, 11, 20, 'umb_UP', '', '', '21:10:00', '2024-04-20'),
(102, 11, 20, 'umb_UP', '', '', '21:10:00', '2024-04-20'),
(103, 11, 20, 'umb_UP', '', '', '21:10:00', '2024-04-20'),
(104, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(105, 11, 20, 'sun_SP', '', '', '21:24:00', '2024-04-20'),
(106, 11, 20, 'sun_SP', '', '', '21:24:00', '2024-04-20'),
(107, 11, 20, 'sun_SP', '', '', '21:24:00', '2024-04-20'),
(108, 11, 20, 'sun_SP', '', '', '21:24:00', '2024-04-20'),
(109, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(110, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(111, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(112, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(113, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(114, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(115, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(116, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(117, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(118, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(119, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(120, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(121, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(122, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(123, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(124, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(125, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(126, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(127, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(128, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(129, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(130, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(131, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(132, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(133, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(134, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(135, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(136, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(137, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(138, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(139, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(140, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(141, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(142, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(143, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(144, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(145, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(146, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(147, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(148, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(149, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(150, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(151, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(152, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(153, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(154, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(155, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(156, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(157, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(158, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(159, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(160, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(161, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(162, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(163, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(164, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(165, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(166, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(167, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(168, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(169, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(170, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(171, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(172, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(173, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(174, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(175, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(176, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(177, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(178, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(179, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(180, 11, 20, 'sun_SM', '', '', '21:24:00', '2024-04-20'),
(181, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(182, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(183, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(184, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(185, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(186, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(187, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(188, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(189, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(190, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(191, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(192, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(193, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(194, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(195, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(196, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(197, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(198, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(199, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(200, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(201, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(202, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(203, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(204, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(205, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(206, 11, 20, 'umb_UM', '', '', '21:24:00', '2024-04-20'),
(207, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(208, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(209, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(210, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(211, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(212, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(213, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(214, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(215, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(216, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(217, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(218, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(219, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(220, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(221, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(222, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(223, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(224, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(225, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(226, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(227, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(228, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(229, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(230, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(231, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(232, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(233, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(234, 11, 20, 'scr_SM', '', '', '21:24:00', '2024-04-20'),
(235, 11, 20, 'umb_DP', '', '', '21:24:00', '2024-04-20'),
(236, 11, 20, 'umb_DP', '', '', '21:24:00', '2024-04-20'),
(237, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(238, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(239, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(240, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(241, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(242, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(243, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(244, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(245, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(246, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(247, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(248, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(249, 11, 20, 'scr_DM', '', '', '21:24:00', '2024-04-20'),
(250, 11, 20, 'scr_DP', '', '', '21:24:00', '2024-04-20'),
(251, 11, 20, 'scr_DM', '', '', '21:25:00', '2024-04-20'),
(252, 11, 20, 'scr_SP', '', '', '21:25:00', '2024-04-20'),
(253, 11, 20, 'scr_DP', '', '', '21:25:00', '2024-04-20'),
(254, 11, 20, 'scr_DM', '', '', '21:25:00', '2024-04-20'),
(255, 11, 20, 'scr_SM', '', '', '21:25:00', '2024-04-20'),
(256, 11, 20, 'sun_SP', '', '', '21:41:00', '2024-04-20'),
(257, 11, 20, 'scr_SM', '', '', '21:42:00', '2024-04-20'),
(258, 11, 20, 'sun_SM', '', '', '21:42:00', '2024-04-20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `notepad`
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
-- Zrzut danych tabeli `notepad`
--

INSERT INTO `notepad` (`id`, `sunbed`, `state_sun`, `sun_diner`, `umbrella`, `state_umb`, `umb_deposit`, `umb_diner`, `screen`, `state_scr`, `scr_deposit`, `scr_diner`, `id_place`, `date`) VALUES
(14, 0, 100, 0, 0, 100, 0, 0, 0, 100, 0, 0, 20, '2024-04-15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `places`
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
-- Zrzut danych tabeli `places`
--

INSERT INTO `places` (`id`, `id_city`, `street`, `mark`, `sunbeds`, `umbrellas`, `screens`, `no_sunbeds`, `no_umbrellas`, `no_screens`) VALUES
(20, 2, 'Różana', 'Różana 12', 100, 100, 100, 2, 0, 0),
(21, 16, 'Piaskowe', 'Piaskowa 3', 100, 100, 100, 0, 0, 0),
(22, 17, 'test', 'test', 123, 123, 123, 0, 0, 0),
(24, 19, 'asdasd', 'asdas', 12, 12, 12, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `planed`
--

CREATE TABLE `planed` (
  `id` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `planed`
--

INSERT INTO `planed` (`id`, `id_place`, `id_user`, `status`) VALUES
(22, 20, 10, 'support'),
(23, 20, 11, 'working');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `type_code`
--

CREATE TABLE `type_code` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_moderator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
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
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `pass`, `tel`, `pesel`, `status`, `access`, `city`, `street`, `nr_home`) VALUES
(8, 'huj', 'jasjd', 'akjsd@wp.pl', '$2y$10$zq2noUvhku6k4Dzhr0elv.2ZqhT9fy1GEZ/TKIEyaDwh8mF6dUjHy', 91082391, 0, 'offline', 1, '', '', ''),
(9, 'Marek', 'Śnigurowicz', 'mpog.marko@wp.pl', '$2y$10$Y96cQoJOwMa62Np3VX0rhuXKp5Ia4KLlG5tJT/Vc9xNYE8uv6UGQi', 2147483647, 0, 'offline', 7, '', '', ''),
(10, 'Test', 'Testowy', 'test@wp.pl', '$2y$10$ffQ4rOyfLYeXVwk/5gqtmOtJ/S8X36yNofKQ.U.r5RzkGwQw02Jre', 888888888, 9898989, 'offline', 1, 'Testonia', 'Testa', '12'),
(11, 'Grzegorz', 'Garski', 'ggarski@wp.pl', '$2y$10$HObzIUE2k/MRrXxdZFarDO4AqyLgVozYLMhKffueK.2rDB2P2qu2G', 897876767, 2147483647, 'offline', 1, 'Malbork', 'Malborska', '12'),
(12, 'andrzej', 'głupek', 'aglupek@gmail.com', '$2y$10$PsroWKQd7iGQWzARtLKWNuWt4Rygg68OvtG80prPLeu0KRDY/PN.i', 876567453, 999999999, 'offline', 1, 'Resko', 'Debila', '12');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `history_one_day`
--
ALTER TABLE `history_one_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_place` (`id_place`);

--
-- Indeksy dla tabeli `notepad`
--
ALTER TABLE `notepad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_place` (`id_place`);

--
-- Indeksy dla tabeli `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_city` (`id_city`);

--
-- Indeksy dla tabeli `planed`
--
ALTER TABLE `planed`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `type_code`
--
ALTER TABLE `type_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_moderator` (`id_moderator`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `history_one_day`
--
ALTER TABLE `history_one_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT dla tabeli `notepad`
--
ALTER TABLE `notepad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `planed`
--
ALTER TABLE `planed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `type_code`
--
ALTER TABLE `type_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `history_one_day`
--
ALTER TABLE `history_one_day`
  ADD CONSTRAINT `history_one_day_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `history_one_day_ibfk_2` FOREIGN KEY (`id_place`) REFERENCES `places` (`id`);

--
-- Ograniczenia dla tabeli `notepad`
--
ALTER TABLE `notepad`
  ADD CONSTRAINT `notepad_ibfk_1` FOREIGN KEY (`id_place`) REFERENCES `places` (`id`);

--
-- Ograniczenia dla tabeli `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`id_city`) REFERENCES `citys` (`id`);

--
-- Ograniczenia dla tabeli `type_code`
--
ALTER TABLE `type_code`
  ADD CONSTRAINT `type_code_ibfk_1` FOREIGN KEY (`id_moderator`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
