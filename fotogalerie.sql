-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vytvořeno: Ned 08. lis 2015, 10:54
-- Verze serveru: 5.6.20
-- Verze PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `fotogalerie`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `fotky`
--

CREATE TABLE IF NOT EXISTS `fotky` (
`id_fotky` int(11) NOT NULL,
  `miniatura` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `plna` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `zobrazit` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=2 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `fotky`
--
ALTER TABLE `fotky`
 ADD PRIMARY KEY (`id_fotky`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `fotky`
--
ALTER TABLE `fotky`
MODIFY `id_fotky` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
--Kategorie masazi
--
CREATE TABLE IF NOT EXIST `kategorie_masazi` 
( `id_kat` INT NOT NULL AUTO_INCREMENT , 
`nazev` VARCHAR(40) NOT NULL , 
PRIMARY KEY (`id_kat`)) ENGINE = InnoDB;

--
--Kategorie vložení
--
INSERT INTO `fotogalerie`.`kategorie_masazi` (`id_kat`, `nazev`) 
VALUES (NULL, 'Rekondiční'), 
	(NULL, 'Relaxační'), 
	(NULL, 'Přístrojové'), 
	(NULL, 'Detoxikační'), 
	(NULL, 'Speciální péče');

--
--Masaze
--
CREATE TABLE IF NOT EXIST `masaze`
( `id_masaze` INT NOT NULL , 
`nazev` VARCHAR(40) NOT NULL , 
`popis` TEXT NOT NULL , 
`id_kategorie` INT NOT NULL , 
PRIMARY KEY (`id_masaze`)) ENGINE = InnoDB;

