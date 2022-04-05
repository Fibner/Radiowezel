-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Kwi 2022, 01:11
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `radiowezeldb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bannedmusic`
--

CREATE TABLE `bannedmusic` (
  `id` int(11) NOT NULL,
  `songId` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `link` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `viewCount` int(11) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `dislikeCount` int(11) NOT NULL,
  `commentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `bannedmusic`
--

INSERT INTO `bannedmusic` (`id`, `songId`, `title`, `date`, `link`, `thumbnail`, `viewCount`, `likeCount`, `dislikeCount`, `commentCount`) VALUES
(4, 'tqOHiDKPxe0', 'Ummet Ozcan - Seesaw (Official Music Video)', '2020-06-03', 'https://www.youtube.com/watch?v=tqOHiDKPxe0', 'https://i.ytimg.com/vi/tqOHiDKPxe0/default.jpg', 15301991, 103319, 4280, 1154),
(5, 'R22S-jKLFzY', 'AREA21 - La La La (Official Video)', '2021-04-09', 'https://www.youtube.com/watch?v=R22S-jKLFzY', 'https://i.ytimg.com/vi/R22S-jKLFzY/default.jpg', 7627749, 219775, 4809, 7918);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `songId` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `link` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `viewCount` int(12) NOT NULL,
  `likeCount` int(11) NOT NULL,
  `dislikeCount` int(11) NOT NULL,
  `commentCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `music`
--

INSERT INTO `music` (`id`, `songId`, `title`, `date`, `link`, `thumbnail`, `viewCount`, `likeCount`, `dislikeCount`, `commentCount`) VALUES
(23, 'jJJlV0z89rU', 'R3HAB & Jonas Blue - Sad Boy (feat. Ava Max, Kylie Cantrall) (Official Music Video)', '2021-10-20', 'https://www.youtube.com/watch?v=jJJlV0z89rU', 'https://i.ytimg.com/vi/jJJlV0z89rU/default.jpg', 2212545, 63696, 1037, 1198),
(24, 'hvoKVSqz8tI', 'AREA21 - No Angel', '2021-11-12', 'https://www.youtube.com/watch?v=hvoKVSqz8tI', 'https://i.ytimg.com/vi/hvoKVSqz8tI/default.jpg', 881601, 38692, 441, 610),
(25, 'OHXf7wEpBPI', 'Skip The Use - Nameless World (Official Video)', '2013-12-18', 'https://www.youtube.com/watch?v=OHXf7wEpBPI', 'https://i.ytimg.com/vi/OHXf7wEpBPI/default.jpg', 80697454, 1320397, 47357, 19411),
(26, 'eS_korRhTDk', 'Lemaitre - Closer ft. Jennie A. (UK Version)', '2016-04-26', 'https://www.youtube.com/watch?v=eS_korRhTDk', 'https://i.ytimg.com/vi/eS_korRhTDk/default.jpg', 91779147, 1481194, 41364, 23579),
(27, '3AnkfFcYxTw', 'Marnik, Hard Lights - Butterfly (Lyrics Video)', '2020-07-17', 'https://www.youtube.com/watch?v=3AnkfFcYxTw', 'https://i.ytimg.com/vi/3AnkfFcYxTw/default.jpg', 15476141, 179230, 4541, 2634);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `musicId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bannedmusic`
--
ALTER TABLE `bannedmusic`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `bannedmusic`
--
ALTER TABLE `bannedmusic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
