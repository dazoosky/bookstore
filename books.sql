-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 30 Cze 2017, 01:27
-- Wersja serwera: 5.7.18-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bookstore`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`) VALUES
(6, 'Book no 2', 'Author no 2', 'Description of book no 2'),
(7, 'Book no 3', 'Author no 3', 'Description of book no 3'),
(8, 'Book no 4', 'Author no 4', 'Description of book no 4'),
(9, 'Book no 5', 'Author no 5', 'Description of book no 5'),
(10, 'Book no 6', 'Author no 6', 'Description of book no 6'),
(12, 'Wiedzmin', 'Sapkowski', 'You have to read this book!'),
(14, 'How to comunism?', 'Stalin', '3 steps to became a dictator'),
(15, 'Sok jablkowy', 'Hortex', ' hard to read'),
(17, 'Nie lubie pomaranczy', 'Maslowicz', 'Lorem ipsum'),
(27, 'AK47', 'Tirentev', 'Lorem ipsum'),
(31, 'na burakka', 'Antonio', 'How to drut?'),
(39, 'About my films', 'Tarantino', 'How to make epic films'),
(40, 'W 80 dookola kuchni', 'Maklowicz', 'Kilka opowiadań o gotowaniu'),
(42, 'Jak zbudowano rzym', 'Readers Digetst', 'Album ze zdjeciami'),
(44, 'Jawa - obsługa i naprawa', 'Pzmot', 'Instrukcja naprawy Jawa 350 TS'),
(46, 'Romeo i Julia', 'Hamlet', 'Short story about love');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
