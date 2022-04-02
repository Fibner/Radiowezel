-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Kwi 2022, 22:52
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

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
(1, '', '', '0000-00-00', 'https://www.youtube.com/watch?v=-Mbbggk6d9c', '', 0, 0, 0, 0),
(5, 'Gx4JEBwVlXo', 'A$AP Rocky - L$D (Explicit - Official Video)', '2015-06-10', 'https://www.youtube.com/watch?v=Gx4JEBwVlXo', 'https://i.ytimg.com/vi/Gx4JEBwVlXo/default.jpg', 19621309, 199183, 3391, 2776),
(6, 'Cl5Vkd4N03Q', 'After Dark', '2016-11-19', 'https://www.youtube.com/watch?v=Cl5Vkd4N03Q', 'https://i.ytimg.com/vi/Cl5Vkd4N03Q/default.jpg', 23760302, 380935, 9707, 766),
(13, 'xpVfcZ0ZcFM', 'Drake - God\'s Plan', '2018-02-17', 'https://www.youtube.com/watch?v=xpVfcZ0ZcFM', 'https://i.ytimg.com/vi/xpVfcZ0ZcFM/default.jpg', 1412014526, 14578093, 503210, 597095),
(14, 'xpVfcZ0ZcFM', 'Drake - God\'s Plan', '2018-02-17', 'https://www.youtube.com/watch?v=xpVfcZ0ZcFM', 'https://i.ytimg.com/vi/xpVfcZ0ZcFM/default.jpg', 1412014526, 14578100, 503210, 597095);

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
-- Indeksy dla tabeli `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
