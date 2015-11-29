-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 29. lis 2015, 15:19
-- Verze serveru: 5.6.26
-- Verze PHP: 5.6.12

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
-- Struktura tabulky `fotky`
--

CREATE TABLE IF NOT EXISTS `fotky` (
  `id_fotky` int(11) NOT NULL,
  `miniatura` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `plna` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `zobrazit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `fotky`
--

INSERT INTO `fotky` (`id_fotky`, `miniatura`, `plna`, `zobrazit`) VALUES
(1, 'media/img/fotogalerie/nahledy/1.jpg', 'media/img/fotogalerie/fotky/1.jpg', 1),
(2, 'media/img/fotogalerie/nahledy/2.jpg', 'media/img/fotogalerie/fotky/2.jpg', 0),
(4, 'media/img/fotogalerie/nahledy/4.png', 'media/img/fotogalerie/fotky/4.png', 1),
(5, 'media/img/fotogalerie/nahledy/5.jpg', 'media/img/fotogalerie/fotky/5.jpg', 1),
(6, 'media/img/fotogalerie/nahledy/6.jpg', 'media/img/fotogalerie/fotky/6.jpg', 1),
(7, 'media/img/fotogalerie/nahledy/7.jpg', 'media/img/fotogalerie/fotky/7.jpg', 1),
(8, 'media/img/fotogalerie/nahledy/8.jpg', 'media/img/fotogalerie/fotky/8.jpg', 1),
(9, 'media/img/fotogalerie/nahledy/9.jpg', 'media/img/fotogalerie/fotky/9.jpg', 1),
(10, 'media/img/fotogalerie/nahledy/10.jpg', 'media/img/fotogalerie/fotky/10.jpg', 1),
(11, 'media/img/fotogalerie/nahledy/11.png', 'media/img/fotogalerie/fotky/11.png', 1),
(12, 'media/img/fotogalerie/nahledy/12.jpg', 'media/img/fotogalerie/fotky/12.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `kategorie_masazi`
--

CREATE TABLE IF NOT EXISTS `kategorie_masazi` (
  `id_kategorie` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `obrazek` varchar(80) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `kategorie_masazi`
--

INSERT INTO `kategorie_masazi` (`id_kategorie`, `nazev`, `popis`, `obrazek`) VALUES
(1, 'Rekondiční masáže', '<p>Když Vás chytnou záda – uvolnění a regenerace pohybového aparátu.</p>\r\n', 'media/img/kategorie/1.jpg'),
(2, 'Relaxační masáže', '<p>Pro navození hlubokého odpočinku a nenásilného uvolnění bolavých míst.</p>\r\n', 'media/img/kategorie/2.jpg'),
(3, 'Přístrojové masáže', '<p>Tyto přístroje nám poskytují specifické masážní služby a účinky, kterých by masér nemohl svým ručním provedením dosáhnout.</p>\r\n', 'media/img/kategorie/3.jpg'),
(4, 'Detoxikační masáže', '<p>Pro oživení organismu, který je vyčerpaný stresem a nezdravým životním stylem.</p>\r\n', 'media/img/kategorie/4.jpg'),
(5, 'Zdravotní masáže', '<p>Pro chronické bolesti zad, kloubů a svalů.</p>\r\n', 'media/img/kategorie/5.png'),
(6, 'Speciální péče', '<p>Dopřejte si k masáži něco extra.</p>\r\n', 'media/img/kategorie/6.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `masaze`
--

CREATE TABLE IF NOT EXISTS `masaze` (
  `id_masaze` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `obrazek` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `cas` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `id_kategorie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `masaze`
--

INSERT INTO `masaze` (`id_masaze`, `nazev`, `popis`, `obrazek`, `cas`, `cena`, `id_kategorie`) VALUES
(1, 'Moxování', '<p>Při moxování se využívá tepla a kouře z léčivé moxy, která pochází z tradiční čínské medicíny. Moxy mají podobu zuhelnatělých doutníků, které jsou vyplněny sušeným pelyňkem a dalšími čínskými léčivými bylinami. Při proceduře se směs zapálí a bezkontaktně se zahřívají akupunkturní body. Tím dochází k prohřátí a uvolnění jednotlivých částí těla, a to především bederní a krční oblasti, což činí moxování výborným doplňkem masáže. Energie z bylin vstupuje do akupunkturních drah, vyrovnává je, podporuje krevní oběh a vylučuje z těla chlad, zatuhlost a bolest.</p>\r\n', 'media/img/masaze/1.jpg', 15, 200, 6),
(2, 'Tygrování', '<p>Tygrování je Japonská prohřívací technika, která používá speciální kovové pouzdro s hořící tyčinkou vyrobenou ze směsi různých bylin (nejčastěji však z lisovaného pelyňku). Kontaktem s pokožkou postupně prohřívají dolní končetiny, především chodidla. Právě díky kombinaci lehkého tlaku a tepla získává tato terapie jedinečné detoxikační kvality.</p>\r\n', 'media/img/masaze/2.jpg', 15, 200, 6),
(3, 'Lávové kameny k prohřátí', '<p>Lávové kameny se po samotné masáži nahřejí a přiloží na záda. Přikrytím kamenů dochází k tepelnému zahřátí a minerály obsažené v lávových kamenech se dostávají do těla. Intenzivní teplo výborně doplňuje účinky masáže a uvolní i ty nejzatuhlejší partie.</p>\r\n', 'media/img/masaze/3.jpg', 0, 30, 6),
(4, 'Tělové svíce TADÉ', '<p>Tělové svíčky TADÉ jsou vyráběny z bavlny, včelího vosku, kurkumy a éterických olejů. Teplo a bioenergie vytvořené při hoření svíčky změkčují v těle nahromaděný maz, který je prostřednictvím tzv. komínového efektu vytahován směrem vzhůru, tedy z těla přes kůži ven. Svíčky tímto způsobem napomáhají likvidaci zánětů a lokálních blokacív organismu a tak přispívají k nastartování samoléčebných procesů a celkové harmonizaci těla.</p>\r\n', 'media/img/masaze/4.jpg', 0, 200, 6),
(5, 'fewfew', '<p>fewfewf</p>\r\n', 'media/img/masaze/5.jpg', 5225, 2525, 6),
(6, 'cewc', '<p>ecewcec</p>\r\n', 'media/img/masaze/6.jpg', 254, 25, 1),
(7, 'ds', '<p>ds ds </p>\r\n', 'media/img/masaze/7.jpg', 28, 28, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
-- Klíče pro tabulku `fotky`
--
ALTER TABLE `fotky`
  ADD PRIMARY KEY (`id_fotky`);

--
-- Klíče pro tabulku `kategorie_masazi`
--
ALTER TABLE `kategorie_masazi`
  ADD PRIMARY KEY (`id_kategorie`);

--
-- Klíče pro tabulku `masaze`
--
ALTER TABLE `masaze`
  ADD PRIMARY KEY (`id_masaze`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `fotky`
--
ALTER TABLE `fotky`
  MODIFY `id_fotky` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pro tabulku `kategorie_masazi`
--
ALTER TABLE `kategorie_masazi`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pro tabulku `masaze`
--
ALTER TABLE `masaze`
  MODIFY `id_masaze` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
