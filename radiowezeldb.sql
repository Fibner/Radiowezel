-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Maj 2022, 18:46
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

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
-- Struktura tabeli dla tabeli `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `history`
--

INSERT INTO `history` (`id`, `songId`, `date`, `status`) VALUES
(1, 0, '0000-00-00 00:00:00', 0),
(2, 0, '0000-00-00 00:00:00', 0),
(3, 0, '0000-00-00 00:00:00', 0),
(19, 0, '0000-00-00 00:00:00', 0),
(20, 25, '0000-00-00 00:00:00', 0),
(21, 17, '0000-00-00 00:00:00', 0),
(22, 19, '2013-02-02 00:00:00', 0),
(23, 24, '2013-02-02 18:18:18', 0),
(24, 18, '2022-05-09 07:05:21', 0),
(25, 24, '2022-05-09 07:05:48', 0),
(26, 16, '2022-05-09 07:05:16', 0),
(27, 19, '2022-05-09 07:05:26', 0),
(28, 16, '2022-05-09 07:05:26', 0),
(29, 24, '2022-05-09 07:05:21', 0),
(30, 25, '2022-05-09 08:05:49', 0),
(31, 17, '2022-05-09 08:05:36', 0),
(32, 18, '2022-05-09 08:05:41', 0),
(33, 18, '2022-05-09 11:05:01', 0),
(34, 19, '2022-05-09 11:05:07', 0),
(35, 17, '2022-05-09 11:05:00', 0),
(36, 25, '2022-05-09 11:05:52', 0),
(37, 24, '2022-05-10 12:05:28', 0),
(38, 19, '2022-05-10 05:05:37', 0),
(39, 16, '2022-05-10 05:05:15', 0),
(40, 17, '2022-05-10 05:05:26', 0),
(41, 18, '2022-05-10 05:05:01', 0),
(42, 25, '2022-05-10 05:05:00', 0),
(43, 25, '2022-05-10 05:05:34', 0),
(44, 19, '2022-05-10 05:05:40', 0),
(45, 18, '2022-05-10 17:05:03', 0),
(46, 16, '2022-05-10 17:00:00', 0),
(47, 17, '2022-05-10 17:00:00', 0),
(48, 24, '0000-00-00 00:00:00', 0),
(49, 17, '2022-05-10 17:00:00', 0),
(50, 24, '2022-05-10 17:00:00', 0),
(51, 18, '2022-05-10 17:38:26', 0),
(52, 25, '2022-05-10 17:38:35', 0),
(53, 19, '0000-00-00 00:00:00', 0),
(54, 16, '2022-05-10 17:39:08', 0),
(55, 24, '2022-05-10 17:42:00', 0),
(56, 19, '2022-05-10 18:14:44', 0),
(57, 17, '2022-05-10 18:14:44', 0),
(58, 16, '2022-05-10 18:14:45', 0),
(59, 18, '2022-05-10 18:14:46', 0),
(60, 25, '2022-05-10 18:14:46', 0),
(61, 24, '2022-05-10 18:14:47', 0),
(62, 19, '2022-05-10 18:21:46', 0),
(63, 24, '2022-05-10 18:21:49', 0),
(64, 25, '2022-05-10 18:21:51', 0),
(65, 17, '2022-05-10 18:25:38', 0),
(66, 16, '2022-05-10 18:26:56', 0),
(67, 18, '2022-05-10 18:29:48', 1);

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
(16, 'VAotPZ815wE', 'Hentai Bitch - Shiki-TMNS X Kodama Boy X Big Gay', '2020-09-26', 'https://www.youtube.com/watch?v=VAotPZ815wE', 'https://i.ytimg.com/vi/VAotPZ815wE/default.jpg', 882637, 21179, 426, 450),
(17, '8P4nWfk0ia8', 'Timmy Trumpet & KSHMR feat. Zafrir - The Prayer [Official Music Video]', '2020-06-12', 'https://www.youtube.com/watch?v=8P4nWfk0ia8', 'https://i.ytimg.com/vi/8P4nWfk0ia8/default.jpg', 3808437, 76420, 1838, 1363),
(18, 'YVkUvmDQ3HY', 'Eminem - Without Me (Official Music Video)', '2009-06-16', 'https://www.youtube.com/watch?v=YVkUvmDQ3HY', 'https://i.ytimg.com/vi/YVkUvmDQ3HY/default.jpg', 1379014244, 9595925, 278194, 321372),
(19, 'H2JJ4uvt7AY', 'Woman', '2021-07-22', 'https://www.youtube.com/watch?v=H2JJ4uvt7AY', 'https://i.ytimg.com/vi/H2JJ4uvt7AY/default.jpg', 18165465, 267107, 3395, 2),
(24, 'eJO5HU_7_1w', 'Eminem - The Real Slim Shady (Official Video - Clean Version)', '2010-09-15', 'https://www.youtube.com/watch?v=eJO5HU_7_1w', 'https://i.ytimg.com/vi/eJO5HU_7_1w/default.jpg', 665774030, 5386357, 123755, 158185),
(25, 'Kbj2Zss-5GY', 'A$AP Rocky - Praise The Lord (Da Shine) (Official Video) ft. Skepta', '2018-06-05', 'https://www.youtube.com/watch?v=Kbj2Zss-5GY', 'https://i.ytimg.com/vi/Kbj2Zss-5GY/default.jpg', 408693081, 3335401, 73800, 70944);

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
  `password` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `type`) VALUES
(1, 'admin', '$2y$10$Ps5qTCwUmmf/VuX3BCz7eeQHJSvNbDSq8fnObWn2FgkLhqeQR5E8.', 1),
(2, 'player', '$2y$10$Lx6VDeHhlriq4/QXhQLuTu9.evdv85Szi9vLXVvPF0wFGnWxg4hay', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `history`
--
ALTER TABLE `history`
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
-- AUTO_INCREMENT dla tabeli `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT dla tabeli `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116647;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
