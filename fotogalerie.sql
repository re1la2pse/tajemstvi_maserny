-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 09. bře 2016, 20:46
-- Verze serveru: 10.1.10-MariaDB
-- Verze PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `fotogalerie`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `akce`
--

CREATE TABLE `akce` (
  `id_akce` int(11) NOT NULL,
  `nazev` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `plati` varchar(80) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `akce`
--

INSERT INTO `akce` (`id_akce`, `nazev`, `popis`, `plati`) VALUES
(1, 'Všechno zdarma', '<p>Všechno zdarma všem.</p>\r\n\r\n<p>Když jsou ty Vánoce, tak si za to přece nenecháme platit. A jako bonus dostanete po masáži ochutnat vánočního cukroví.</p>\r\n', 'Platí do konce roku');

-- --------------------------------------------------------

--
-- Struktura tabulky `fotky`
--

CREATE TABLE `fotky` (
  `id_fotky` int(11) NOT NULL,
  `miniatura` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `plna` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `zobrazit` int(11) NOT NULL,
  `razeni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `fotky`
--

INSERT INTO `fotky` (`id_fotky`, `miniatura`, `plna`, `zobrazit`, `razeni`) VALUES
(1, 'media/img/fotogalerie/nahledy/1.jpg', 'media/img/fotogalerie/fotky/1.jpg', 1, 0),
(2, 'media/img/fotogalerie/nahledy/2.jpg', 'media/img/fotogalerie/fotky/2.jpg', 1, 2),
(3, 'media/img/fotogalerie/nahledy/3.jpg', 'media/img/fotogalerie/fotky/3.jpg', 1, 1),
(4, 'media/img/fotogalerie/nahledy/4.JPG', 'media/img/fotogalerie/fotky/4.JPG', 1, 3),
(5, 'media/img/fotogalerie/nahledy/5.JPG', 'media/img/fotogalerie/fotky/5.JPG', 1, 4),
(6, 'media/img/fotogalerie/nahledy/6.jpg', 'media/img/fotogalerie/fotky/6.jpg', 1, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `intro`
--

CREATE TABLE `intro` (
  `id_intro` int(11) NOT NULL,
  `miniatura` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `plna` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `zobrazit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `intro`
--

INSERT INTO `intro` (`id_intro`, `miniatura`, `plna`, `zobrazit`) VALUES
(1, 'media/img/intro/nahledy/1.jpg', 'media/img/intro/fotky/1.jpg', 1),
(2, 'media/img/intro/nahledy/2.jpg', 'media/img/intro/fotky/2.jpg', 0),
(3, 'media/img/intro/nahledy/3.jpg', 'media/img/intro/fotky/3.jpg', 1),
(4, 'media/img/intro/nahledy/4.jpg', 'media/img/intro/fotky/4.jpg', 1),
(5, 'media/img/intro/nahledy/5.jpg', 'media/img/intro/fotky/5.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `kategorie_masazi`
--

CREATE TABLE `kategorie_masazi` (
  `id_kategorie` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `obrazek` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `razeni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `kategorie_masazi`
--

INSERT INTO `kategorie_masazi` (`id_kategorie`, `nazev`, `popis`, `obrazek`, `razeni`) VALUES
(1, 'testovací', '<p>sdgasdfadsf</p>\r\n', 'media/img/kategorie/1.jpg', 0),
(2, 'testovací 2', '<p>sadfgdsfsadg </p>\r\n\r\n<p>sd agdsg adsg ds</p>\r\n', 'NULL', 1),
(3, 'testovací 3', '<p>sfgadsgadsg sga s</p>\r\n', 'NULL', 2),
(4, 'testovací 4', '<p>sadgsdgas sg asg </p>\r\n', 'NULL', 3),
(5, 'testovací 5', '<p>sgsdgdfg</p>\r\n', 'NULL', 4),
(6, 'testovací další', '<p>asgsgdsga</p>', '', 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `kategorie_oleju`
--

CREATE TABLE `kategorie_oleju` (
  `id_kategorie` int(11) NOT NULL,
  `nazev` varchar(80) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `kategorie_oleju`
--

INSERT INTO `kategorie_oleju` (`id_kategorie`, `nazev`) VALUES
(1, 'DETOXIKAČNÍ OLEJE'),
(2, 'HARMONIZAČNÍ OLEJE'),
(3, 'REJUVENIZAČNÍ OLEJE');

-- --------------------------------------------------------

--
-- Struktura tabulky `masaze`
--

CREATE TABLE `masaze` (
  `id_masaze` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `obrazek` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `cas` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `id_kategorie` int(11) NOT NULL,
  `razeni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `masaze`
--

INSERT INTO `masaze` (`id_masaze`, `nazev`, `popis`, `obrazek`, `cas`, `cena`, `id_kategorie`, `razeni`) VALUES
(1, 'testovací', '<p>ssdgadsgadsgdsgsdgdsg </p>\r\n\r\n<p>dsg</p>\r\n\r\n<p> ds</p>\r\n\r\n<p> ds</p>\r\n\r\n<p>g </p>\r\n\r\n<p>dsg s</p>\r\n', 'media/img/masaze/1.jpg', 10, 154, 1, 0),
(2, 'sadfdsf', '<p>sdfsdfsd</p>\r\n', 'NULL', 10, 10, 2, 0),
(3, '10110', '<p>ghjmj</p>\r\n', 'NULL', 10, 10, 3, 0),
(4, 'kuhjgk', '<p>gj</p>\r\n', 'NULL', 10, 10, 4, 0),
(5, 'dfg', '<p>dgdfsg</p>\r\n', 'NULL', 10, 10, 5, 0),
(6, 'asfadsfasdf', '<p> asfsdf as</p>\r\n', 'NULL', 10, 50, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `novinky`
--

CREATE TABLE `novinky` (
  `id_novinky` int(11) NOT NULL,
  `obrazek` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `id_masaze` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `novinky`
--

INSERT INTO `novinky` (`id_novinky`, `obrazek`, `popis`, `id_masaze`) VALUES
(1, 'NULL', '<p>Super novinka bez fotky a odkazu</p>\r\n', NULL),
(3, 'media/img/aktuality/3.jpg', '<p>Super novinka s fotku bez odkazu</p>\r\n', -1),
(4, 'media/img/aktuality/4.jpg', '<p>Super novinka s fotku aj odkazem</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `oleje`
--

CREATE TABLE `oleje` (
  `id_oleje` int(11) NOT NULL,
  `nazev` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `id_kategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `oleje`
--

INSERT INTO `oleje` (`id_oleje`, `nazev`, `popis`, `cena`, `id_kategorie`) VALUES
(1, 'ROZMARÝNOVÝ OLEJ', '<p>Silně stimulující a harmonizující silice, nervová bolest hlavy, migréna, únava, antiseptické účinky, podporuje žaludeční činnost, antispazmatickém, svalové bolesti, nedokrevnost končetin, celulitida, stimuluje srdeční činnost, diuretikum, brání vzniku jizev, normalizuje krevní tlak, tonizační, napomáhá regeneraci vlasové pokožky.</p>\r\n', 100, 1),
(2, 'LEVANDULOVÝ OLEJ', '<p>Uklidňuje, pomáhá při nervovém vypětí, bolesti hlavy, analgetikum, dýchací problémy, bronchitida, menstruační bolesti, revmatické bolesti, svalové bolesti, repelent, snižuje tlak, hodí se na všechny typy pleti, regeneruje kožní buňky, antiseptikum, normalizuje mazotok, má hojivé účinky.</p>\r\n', 100, 2),
(3, 'SANTALOVÝ OLEJ', '<p>Působí na nervový systém, antidepresivum, afrodiziakum, sedativum, nespavost, psychosomatické problémy, diuretikum, katar, kašel, nachlazení, bolesti v krku, stimuluje trávení, nevolnost, tonikum, akné, mastná pleť, zvláčňuje suchou a dehydratovanou pleť.</p>\r\n', 100, 3),
(4, 'MEGA SUPER OLEJ', '<p>FAKT SUPER OLEJ PRO VŠECHNY</p>\r\n', 123, 3),
(5, 'Tak toto mosíš mět', '<p>Tak taková olej mosíš zkusit</p>\r\n', 159, 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `akce`
--
ALTER TABLE `akce`
  ADD PRIMARY KEY (`id_akce`);

--
-- Klíče pro tabulku `fotky`
--
ALTER TABLE `fotky`
  ADD PRIMARY KEY (`id_fotky`);

--
-- Klíče pro tabulku `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id_intro`);

--
-- Klíče pro tabulku `kategorie_masazi`
--
ALTER TABLE `kategorie_masazi`
  ADD PRIMARY KEY (`id_kategorie`);

--
-- Klíče pro tabulku `kategorie_oleju`
--
ALTER TABLE `kategorie_oleju`
  ADD PRIMARY KEY (`id_kategorie`);

--
-- Klíče pro tabulku `masaze`
--
ALTER TABLE `masaze`
  ADD PRIMARY KEY (`id_masaze`);

--
-- Klíče pro tabulku `novinky`
--
ALTER TABLE `novinky`
  ADD PRIMARY KEY (`id_novinky`);

--
-- Klíče pro tabulku `oleje`
--
ALTER TABLE `oleje`
  ADD PRIMARY KEY (`id_oleje`),
  ADD KEY `id_kategorie` (`id_kategorie`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `akce`
--
ALTER TABLE `akce`
  MODIFY `id_akce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `fotky`
--
ALTER TABLE `fotky`
  MODIFY `id_fotky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `intro`
--
ALTER TABLE `intro`
  MODIFY `id_intro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `kategorie_masazi`
--
ALTER TABLE `kategorie_masazi`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `kategorie_oleju`
--
ALTER TABLE `kategorie_oleju`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `masaze`
--
ALTER TABLE `masaze`
  MODIFY `id_masaze` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `oleje`
--
ALTER TABLE `oleje`
  MODIFY `id_oleje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
