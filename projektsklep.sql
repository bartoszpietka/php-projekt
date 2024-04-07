-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 09:12 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektsklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyki`
--

CREATE TABLE `koszyki` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `Kilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `koszyki`
--

INSERT INTO `koszyki` (`id`, `userID`, `productID`, `Kilosc`) VALUES
(1, 1, 3, 1),
(2, 1, 7, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` tinytext NOT NULL,
  `cena` double NOT NULL,
  `ilosc` int(11) NOT NULL,
  `zdjecie` text NOT NULL,
  `wswtl` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `cena`, `ilosc`, `zdjecie`, `wswtl`) VALUES
(1, 'Donda - Kanye West', 49.99, 13, 'donda.jpg', 1),
(2, 'Utopia - Travis Scott', 59.99, 26, 'utopia.jpg', 1),
(3, 'American Dream - 21 Savage', 59.99, 21, 'american-dream.jpg', 1),
(4, 'Swimming - Mac Miller', 49.99, 8, 'swimming.jpg', 1),
(5, 'Call Me If You Get Lost: The Estate Sale - Tyler, The Creator', 49.99, 32, 'the-estate-sale.jpg', 1),
(6, 'Mr. Morale & the Big Steppers - Kendrick Lamar', 59.99, 9, 'mr-morale.jpg', 1),
(7, 'The Melodic Blue - Baby Keem', 49.99, 14, 'the-melodic-blue.jpg', 1),
(8, 'Wasteland - Brent Faiyaz', 59.99, 19, 'wasteland.jpg', 1),
(9, 'We Don\'t Trust You - Future, Metro Boomin', 69.99, 21, 'we-dont-trust-you.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(32) NOT NULL,
  `upraw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `upraw`) VALUES
(1, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(2, 'user1', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(3, 'worker1', '827ccb0eea8a706c4c34a16891f84e7b', 'worker');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `koszyki`
--
ALTER TABLE `koszyki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `koszyki`
--
ALTER TABLE `koszyki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234577;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koszyki`
--
ALTER TABLE `koszyki`
  ADD CONSTRAINT `koszyki_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `produkty` (`id`),
  ADD CONSTRAINT `koszyki_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
