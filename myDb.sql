-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: db
-- Čas generovania: Út 23.Feb 2021, 10:50
-- Verzia serveru: 8.0.22
-- Verzia PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `myDb`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Beer`
--

CREATE TABLE `Beer` (
  `id` int NOT NULL,
  `title` varchar(64) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Beer`
--

INSERT INTO `Beer` (`id`, `title`) VALUES
(1, 'Corgoň'),
(2, 'Kozel'),
(3, 'Plzeň'),
(4, 'Budvar'),
(5, 'Bažant'),
(6, 'Kelt'),
(7, 'Braník'),
(8, 'Svijany'),
(9, 'Vŕšky'),
(10, 'Golem'),
(11, 'Trogár');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Rating`
--

CREATE TABLE `Rating` (
  `id` int NOT NULL,
  `beer_id` int NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `Rating`
--

INSERT INTO `Rating` (`id`, `beer_id`, `value`) VALUES
(1, 1, 5),
(2, 1, 4),
(3, 3, 4),
(4, 6, 3),
(5, 6, 1),
(6, 6, 1),
(7, 6, 1),
(8, 6, 1);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `Beer`
--
ALTER TABLE `Beer`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beer_id` (`beer_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `Beer`
--
ALTER TABLE `Beer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pre tabuľku `Rating`
--
ALTER TABLE `Rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `Rating`
--
ALTER TABLE `Rating`
  ADD CONSTRAINT `Rating_ibfk_1` FOREIGN KEY (`beer_id`) REFERENCES `Beer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
