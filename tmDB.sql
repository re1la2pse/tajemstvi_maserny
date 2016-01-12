-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 12. led 2016, 18:04
-- Verze serveru: 5.5.44-0+deb7u1-log
-- Verze PHP: 5.5.30-1~dotdeb+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `mokrusacz03`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `akce`
--

CREATE TABLE IF NOT EXISTS `akce` (
`id_akce` int(11) NOT NULL,
  `nazev` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `plati` varchar(80) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `akce`
--

INSERT INTO `akce` (`id_akce`, `nazev`, `popis`, `plati`) VALUES
(1, 'Všechno zdarma na vánoce', '<p>Všechno zdarma když jsou ty Vánoce. A jako bonus, po masáži, ochutnávka vánočního cukroví.</p>\n', 'Platí do konce roku 2015.');

-- --------------------------------------------------------

--
-- Struktura tabulky `fotky`
--

CREATE TABLE IF NOT EXISTS `fotky` (
`id_fotky` int(11) NOT NULL,
  `miniatura` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `plna` varchar(80) COLLATE utf8_czech_ci DEFAULT NULL,
  `zobrazit` int(11) NOT NULL,
  `razeni` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `fotky`
--

INSERT INTO `fotky` (`id_fotky`, `miniatura`, `plna`, `zobrazit`, `razeni`) VALUES
(3, 'media/img/fotogalerie/nahledy/3.JPG', 'media/img/fotogalerie/fotky/3.JPG', 1, 3),
(4, 'media/img/fotogalerie/nahledy/4.JPG', 'media/img/fotogalerie/fotky/4.JPG', 1, 2),
(5, 'media/img/fotogalerie/nahledy/5.JPG', 'media/img/fotogalerie/fotky/5.JPG', 1, 1),
(6, 'media/img/fotogalerie/nahledy/6.JPG', 'media/img/fotogalerie/fotky/6.JPG', 1, 4),
(7, 'media/img/fotogalerie/nahledy/7.JPG', 'media/img/fotogalerie/fotky/7.JPG', 1, 5),
(9, 'media/img/fotogalerie/nahledy/9.JPG', 'media/img/fotogalerie/fotky/9.JPG', 1, 6),
(12, 'media/img/fotogalerie/nahledy/12.JPG', 'media/img/fotogalerie/fotky/12.JPG', 1, 7),
(13, 'media/img/fotogalerie/nahledy/13.JPG', 'media/img/fotogalerie/fotky/13.JPG', 1, 8),
(14, 'media/img/fotogalerie/nahledy/14.JPG', 'media/img/fotogalerie/fotky/14.JPG', 1, 9),
(15, 'media/img/fotogalerie/nahledy/15.JPG', 'media/img/fotogalerie/fotky/15.JPG', 1, 0),
(16, 'media/img/fotogalerie/nahledy/16.JPG', 'media/img/fotogalerie/fotky/16.JPG', 1, 10),
(17, 'media/img/fotogalerie/nahledy/17.JPG', 'media/img/fotogalerie/fotky/17.JPG', 1, 11),
(18, 'media/img/fotogalerie/nahledy/18.JPG', 'media/img/fotogalerie/fotky/18.JPG', 1, 12),
(19, 'media/img/fotogalerie/nahledy/19.JPG', 'media/img/fotogalerie/fotky/19.JPG', 1, 13),
(20, 'media/img/fotogalerie/nahledy/20.JPG', 'media/img/fotogalerie/fotky/20.JPG', 1, 14),
(21, 'media/img/fotogalerie/nahledy/21.JPG', 'media/img/fotogalerie/fotky/21.JPG', 1, 15),
(22, 'media/img/fotogalerie/nahledy/22.JPG', 'media/img/fotogalerie/fotky/22.JPG', 1, 16),
(23, 'media/img/fotogalerie/nahledy/23.JPG', 'media/img/fotogalerie/fotky/23.JPG', 1, 17),
(26, 'media/img/fotogalerie/nahledy/26.JPG', 'media/img/fotogalerie/fotky/26.JPG', 1, 18);

-- --------------------------------------------------------

--
-- Struktura tabulky `intro`
--

CREATE TABLE IF NOT EXISTS `intro` (
`id_intro` int(11) NOT NULL,
  `miniatura` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `plna` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `zobrazit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `intro`
--

INSERT INTO `intro` (`id_intro`, `miniatura`, `plna`, `zobrazit`) VALUES
(1, 'media/img/intro/nahledy/1.jpg', 'media/img/intro/fotky/1.jpg', 1),
(2, 'media/img/intro/nahledy/2.jpg', 'media/img/intro/fotky/2.jpg', 1),
(3, 'media/img/intro/nahledy/3.jpg', 'media/img/intro/fotky/3.jpg', 1),
(4, 'media/img/intro/nahledy/4.jpg', 'media/img/intro/fotky/4.jpg', 1),
(5, 'media/img/intro/nahledy/5.jpg', 'media/img/intro/fotky/5.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `kategorie_masazi`
--

CREATE TABLE IF NOT EXISTS `kategorie_masazi` (
`id_kategorie` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `obrazek` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `razeni` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `kategorie_masazi`
--

INSERT INTO `kategorie_masazi` (`id_kategorie`, `nazev`, `popis`, `obrazek`, `razeni`) VALUES
(1, 'Zdravotní masáže', '<p>Pro chronické bolesti zad, kloubů a svalů.</p>\n', 'media/img/kategorie/1.png', 0),
(2, 'Detoxikační masáže', '<p>Pro oživení organismu, který je vyčerpaný stresem a nezdravým životním stylem.</p>\n', 'media/img/kategorie/2.jpg', 1),
(3, 'Relaxační masáže', '<p>Pro navození hlubokého odpočinku a nenásilného uvolnění bolavých míst.</p>\n', 'media/img/kategorie/3.jpg', 2),
(4, 'Rekondiční masáže', '<p>Když Vás chytnou záda – uvolnění a regenerace pohybového aparátu.</p>\n', 'media/img/kategorie/4.jpg', 3),
(5, 'Přístrojové masáže', '<p>Tyto přístroje nám poskytují specifické masážní služby a účinky, kterých by masér nemohl svým ručním provedením dosáhnout.</p>\n', 'media/img/kategorie/5.jpg', 4),
(6, 'Speciální péče', '<p>Dopřejte si k masáži něco extra.</p>\n', 'media/img/kategorie/6.jpg', 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `kategorie_oleju`
--

CREATE TABLE IF NOT EXISTS `kategorie_oleju` (
`id_kategorie` int(11) NOT NULL,
  `nazev` varchar(80) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

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

CREATE TABLE IF NOT EXISTS `masaze` (
`id_masaze` int(11) NOT NULL,
  `nazev` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `obrazek` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `cas` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `id_kategorie` int(11) NOT NULL,
  `razeni` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `masaze`
--

INSERT INTO `masaze` (`id_masaze`, `nazev`, `popis`, `obrazek`, `cas`, `cena`, `id_kategorie`, `razeni`) VALUES
(1, 'Dornova Terapie + Breussova masáž', '<p>Dornova metoda je technika jemného ošetření obratlů páteře a kloubů. Na rozdíl od většiny dosavadních způsobů se neprovádí uvedení obratlů a kloubů do původního stavu násilím přes odpor napjatých svalů, ale šetrně ve spolupráci s klientem při uvolněných svalech. Tím se odstraňuje nebezpečí natažení tkáňových struktur, zablokování energetických drah a vzniku krevních sraženin.Základem práce s páteří je vyrovnání délky nohou. Pracuje se ve stoji, vsedě i vleže. Při kývavém pohybu nohou či rukou, se uvolňuje svalstvo v páteřní oblasti (neinvazně) a bez bolesti se ošetřují a uvolňují zablokovaná místa.</p>\n\n<p>Breussova masáž se používá většinou po ošetření Dornovou metodou. Tato masáž se používá při bolestivých potížích, jako je např. ischialgie nebo „houser“.A bývá většinou jedinou masáží, kterou pacient v daném stavu snese. Pomocí této terapie mohou ploténky optimálně regenerovat  a znovu se nabít energií.</p>\n', 'media/img/masaze/1.jpg', 60, 600, 1, 0),
(2, 'Zdravotní masáž', '<p>Zdravotní masáž je vhodná pro lidi, kteří trpí opakovanými bolestmi zad, kloubů a specifikovaných skupin. Masáž uleví od chronických bolestí zad a při špatném držení těla, snižuje bolest krční páteře při sedavém zaměstnání. Doporučuje se taky po úrazech a operacích (na doporučení lékaře), při revmatických a dýchacích problémech, při ztuhlosti páteře a šíje, při nervových chorobách, ale i regeneračně a to například u osob dlouho sedících v kanceláři u počítače nebo fyzicky manuálně pracujících apod.</p>\n', 'media/img/masaze/2.jpg', 60, 550, 1, 1),
(3, 'Baňkování', '<p>Baňková masáž pomáhá při bolestech zad a kloubů. Velmi snadno uvolňuje spasmy a zároveň se vyznačuje silným detoxikačním účinkem. Při lokální aplikaci se buňky pokládají na bolestivá místa. Baňkování se však hojně využívá i v kombinaci s ostatními technikami jako vhodný doplněk. Cíleným přikládáním baněk na akupunkturní body lze ovlivnit meridiánové dráhy, které ovlivňují funkce vnitřních orgánů.</p>\n', 'media/img/masaze/3.jpg', 60, 550, 1, 2),
(4, 'Medová masáž', '<p>Medová masáž je unikátní technika, při které dochází pomocí působení včelího medu a speciálních masážních hmatů k odstraňování toxinů, které lidské tělo nahromadilo ve svých tkáních. Pomáhá při bolestech hlavy, nespavosti, trávícími obtížemi, ale je vhodná i u lidí, kteří trpí nemocemi kloubů nebo revmatismem. Díky vysokému podílu příznivých složek, které med obsahuje, se pravidelnou medovou masáží regenerují vnitřní orgány lidského těla a člověk se po kvalitní masáži cítí příjemně, uvolněně a mírně unaven.</p>\n\n<p>Med se zahřeje a  nanese tělo za použití pumpovací metody. Prostřednictvím pumpovacích pohybů rukou jsou při masáži medem vysávány staré usazeniny a jedy až z hloubi tělesných tkání. Během masáže kůže na masírovaném místě pozvolna červená.</p>\n', 'media/img/masaze/4.jpg', 45, 450, 2, 0),
(5, 'Čokoládová masáž', '<p>Masáž horkou čokoládou si mohou užít všichni ti, kteří potřebují akutně zlikvidovat dlouhodobě nashromážděný stres a únavu. Díky čokoládové masáži a zábalu pronikají do pokožky také vitaminy, aminokyseliny, minerály, antioxidanty, díky čemuž je pokožka vyhlazená a ošetřená – ideální doplněk pro anticelulitidní program. Čokoterapie má mimo jiné příznivý vliv na činnost srdce a podporuje detoxikaci.</p>\n\n<p>Před samotnou čokoládovou masáží se nejprve udělá peeling se slupkami s kakaových bobů. Tento peeling umožní, aby se účinné látky snadněji vstřebaly do pokožky a napomohly tak k látkové výměně. Rozetřením pravé hořké čokolády, která se předem nahřeje spolu s kokosovým olejem, masírujeme daná místa. Tělo se po masáži opět potře čokoládou a vytvoří se zábal, ve kterém relaxujete asi 20minut.</p>\n', 'media/img/masaze/5.jpg', 120, 1200, 2, 1),
(6, 'Ruční lymfatická masáž', '<p>Lymfatická masáž má za úkol obnovit a zvýšit oběh lymfy. Lymfatický systém totiž nemá svoji pumpu. Jestliže nepracuje nebo je jeho činnost zpomalena, zůstávají zbytky látkové výměny v tkáních. Tukové buňky zvětšují svůj objem, vytvářejí se tukové polštářky, pomerančová kůže a otoky. Pomocí cíleného masážního tlaku a směru je možné lymfu aktivovat a dosáhnout odplavení škodlivin z těla ven. Masáž využívá velmi jemnou technikou manuální lymfodrenáže, která odblokuje hlavní uzliny a odvede drenážovanou tekutinu vylučovacím systémem z těla ven. Tato metoda je přirozená a lékařsky zdůvodněná. Je nejen účelná, ale navíc velice příjemná a relaxační.</p>\n', 'media/img/masaze/6.jpg', 60, 600, 2, 2),
(7, 'Havajská masáž LOMI LOMI', '<p>Havajská masáž LOMI LOMI (“milující ruce“) má kořeny ve staré Polynésii, kde byla praktikována jako součást místních šamanů (kahunů). Při masáži  je tělo přiváděno do stavu hluboké relaxace. Dochází k propojení psychické, fyzické a emoční úrovně a zrychluje se regenerace všech tkání. Obecně je považována za velmi luxusní masáž vycházející z velice jemných a plynulých dotyků, které jsou prováděny především technikou masáže předloktím. Díky svým relaxačním účinkům patří mezi nejoblíbenější způsoby odpočinku.</p>\n', 'media/img/masaze/7.jpg', 60, 550, 3, 0),
(8, 'Indická masáž Abhyanga', '<p>Tato Indická masáž vychází ze systému tradičního indického lékařství – Ájurvédy, která je považována za nejstarší systém péče o zdraví. Jedná se o relaxační, regenerační a ozdravující celotělovou olejovou masáž, napomáhající uvolnění toxinů z kloubů a orgánů, speciálně z kůže, což má velký revitalizační efekt. Zpomaluje proces stárnutí, napomáhá zlepšení kvality spánku. Součástí masáže je i hlava (vlasová, obličejová část, obočí a uši), krk, ramena, hrudník, ruce, záda a nohy z obou stran.</p>\n', 'media/img/masaze/8.jpg', 60, 550, 3, 1),
(9, 'Indonéská masáž BALI BALI', '<p>Indonéská masáž je jednou z mnoha starobylých tradičních indonéských masáží, které se předávají z generace na generaci. Nese prvky čínských, japonských a thajských technik. Jedná se o celotělovou hloubkovou masáž, která uvolňuje napětí a harmonizuje celý organismus za využití alternativních medicínských postupů: masáže, akupresury, reflexologie a aromaterapie. Díky tomu výborně stimuluje krevní oběh, ulevuje od svalové a kloubní bolesti a přináší pocit duševní pohody, klidu a hluboké relaxace.</p>\n', 'media/img/masaze/9.jpg', 60, 649, 3, 2),
(10, 'Australská masáž KODO', '<p> Australská masáž Kodo je rytmickou masáží australských Aboridžinců. Tento prastarý rituál kombinuje jemné protahování, akupresuru a spirálkovité pohyby, které rychle ulevují od bolesti a stresu. Při masáži užíváme vzácný arganový olej s vysokým obsahem vitamínů, který působí jako přírodní antioxidant, díky čemuž regeneruje a dlouhodobě hydratuje pokožku. Smyslná vůně růže, zklidňující levandule a antiseptický lemon teatree povzbuzují nejen tělo, ale i mysl. Celou proceduru doprovází tradiční hudba australských domorodců, která z masáže dělá nezapomenutelný zážitek.</p>\n', 'media/img/masaze/10.jpg', 60, 990, 3, 3),
(11, 'Masáž lávovými kameny', '<p>Technika masáže s lávovými kameny pochází údajně z kmenových rituálů praktikovaných v Polynésii. Základy této terapie spočívají na použití speciálních havajských technik, které ve spojení s horkými kameny mají vysoký terapeutický a relaxační účinek. Masáž lávovými kameny zbavuje záda a klouby bolestí. Díky teplu a složení kamenů se vyrovnává energie v těle, čímž se uvolňují bloky a stimuluje se jak krevní, tak lymfatický systém.</p>\n', 'media/img/masaze/11.jpg', 60, 550, 3, 4),
(12, 'Thajská olejová masáž', '<p>Thajská olejová masáž je považována především za relaxační masáž a její počátky sahají až do období Buddhy. Využívá prvky tradiční thajské masáže, tradiční čínské medicíny, indické Ájurvédy. Použitím pomalých a táhlých hmatů, kombinovaných s protahováním a akupresurou, dochází k odblokování energií v těle, uvolnění kloubů, svalů, šlach, protažení páteře. Tato masáž navozuje celkovou harmonii a dává odpočinout tělu, mysli i duši a je vynikající prevencí před nemocemi.</p>\n', 'media/img/masaze/12.png', 60, 550, 3, 5),
(13, 'Thajská masáž nohou', '<p>Thajská masáž nohou má za cíl uvolnit měkké tkáně a mobilizovat klouby nohou a spodní části dolní končetiny pro stimulaci vnitřních orgánu skrze reflexní body chodidel. Kombinuje tedy uvolňovací hmaty, akupresuru, uvolňování kloubů prstů a kotníků a protahování a uvolnění ztuhlého svalstva lýtek. Zvláštností je používání speciálního dřevěného kolíku ke stimulaci akupresurních bodů na chodidlech, čímž dochází k ovlivnění jednotlivých vnitřních orgánů a zlepšení jejich funkce.</p>\n', 'media/img/masaze/13.jpg', 45, 450, 3, 6),
(14, 'Klasická masáž', '<p> Klasická masáž způsobuje značné prokrvení především svalového a vazivového aparátu, čímž dochází k jeho uvolnění. Blahodárný účinek se projeví na kůži, svalstvu a jeho úponech, kloubech a dále v krevním oběhu, lymfatickém systému, dýchacích cestách, nervovém systému nebo na činnosti vnitřních orgánů. Provádí se s přiměřenou intenzitou, s ohledem k potřebám zákazníka a s možností zaměřit se na problematické partie. Velmi častá je částečná masáž konkrétních partií, které vyžadují péči – nejčastěji záda a šíje (bolesti zad a krční páteře jsou v současné době asi nejčastější ze všech pohybových obtíží).</p>\n', 'media/img/masaze/14.jpg', 60, 550, 4, 0),
(15, 'Reflexní terapie zad, šíje a chodidel', '<p>Reflexní terapie vychází z poznatku, že na všech zakončeních lidského těla existují reflexní plošky odpovídající příslušným vnitřním orgánům nebo oblastem těla, skrze které lze na celý organismus.Během procedury se tlakově ošetřují reflexní body na chodidlech, nártech a kotnících. Při terapií se postupuje citlivě s ohledem na reakci a bolestivost bodů a reflexních zón. Uvolnění a odstranění bloků v reflexních drahách a jednotlivých vnitřních orgánech, relaxace po namáhavé fyzické nebo duševní práci.</p>\n', 'media/img/masaze/15.jpg', 60, 550, 4, 1),
(16, 'Vacupress Niodé III', '<p>Ošetření přístroji NIODÉ a PNEUVEN je nebolestivé. Provádí jej kvalifikovaná pracovnice či pracovník v prostředí, které je čisté a hygienické.. Mezi jednotlivými procedurami by pauza neměla být kratší jak jeden den a delší jak šest dnů. Počítejte s tím, že první tři procedury jsou "detoxikační". Po prvních procedurách se může objevit únava, pobolívání hlavy, změna barvy, konzistence a zápachu moči. V tomto období se objeví úbytek objemu ošetřovaných míst. Přibližně u čtvrtého ošetření se projeví změny na pokožce. Ta začne být znatelně pevná a přitom pružná a hladká. Ošetření přístrojem NIODÉ trvá 45 minut a poté se přechází na lymfatická drenáž přístrojem Pneuven, která trvá 40 minut. Tato lymfatická drenáž znásobuje účinky ošetření. VacupressNiodé III dosahuje výborných výsledků při redukci celulitidy, zpevnění pokožky a zeštíhlení na problematických místech.</p>\n\n<h3>Přístroj Vacupress III Niodé</h3>\n\n<p>VacupressNiode je základní kosmetický přístroj pracující na principu vakuových rázů. Působením vakuových rázů dochází ke stimulaci fibroblastů, buněk, které v tkáni vytvářejí základní pojivové struktury – kolagenová a elastická vlákna. Tato vlákna zajišťují pevnost a pružnost pokožky i vnitřních vazů. U žen rostou kolagenová vlákna převážně kolmo k pokožce. Tím je zajištěno přizpůsobení pokožky např. při těhotenství. U mužů rostou kolagenová vlákna převážně šikmo křížem. Proto mají muži menší sklon k celulitidě.</p>\n\n<h3>Blahodárné účinky přístroje Vacupress III Niodé:</h3>\n\n<ul><li>Zeštíhlení problematických partií těla a formování postavy</li>\n	<li>Prevence, redukce a odstraňování celulitidy</li>\n	<li>Vyhlazení a zpevnění pokožky po liposukci</li>\n	<li>Odbourávání podkožního tuku</li>\n	<li>Prevence otékání a zavodnění nohou</li>\n</ul><h3>Kontraindikace:</h3>\n\n<ul><li>Užívání léků na ředění krve</li>\n	<li>Užívání léků, které ovlivňují činnost štítné žlázy</li>\n	<li>Větší křečové žíly</li>\n	<li>Onkologická onemocnění, onemocněné Angínou Pectoris, zánětem žil, otokem plic</li>\n	<li>Choroba srdce, ledvin</li>\n	<li>Kožní a infekční onemocnění a jiná závažná onemocnění</li>\n</ul><p><strong>Upozornění: </strong>Ve výjimečných případech se mohou po prvním ošetření objevit na ošetřovaných partiích drobné hematomy (modřiny). Tento problém však nastává pouze u klientů, jejichž pokožka a podkožní vazy jsou velmi ochablé. Hematomy vymizí během několika dnů. Po ošetření přístrojem NIODÉ VAC III je pokožka vždy hladká, pevná a pružná.</p>\n', 'media/img/masaze/16.jpg', 45, 450, 5, 0),
(17, 'Lifting obličeje přístrojem Vacupress Ni', '<p>Přístrojem VacupressNiodé III nabízíme jedinečný bezskalpelový lifting obličeje a dekoltu. Tato unikátní masáž přístrojem VacupressNiodé III vyhladí Váš obličej, prokrví a projasní pleť. Výsledek je viditelný ihned po aplikaci. Speciální ošetření se provádí vakuovým přístrojem NIODÉ VAC III. Používá se malá baňka, která je určená na ošetření obličeje. Jeho výhodou je vysoká a rychlá účinnost při stahování pokožky obličeje a dekoltu, odstranění drobných vrásek, redukce hrubších vrásek. Speciální tahy podpoří odstranění toxických látek a odstraní zadržovanou vodu z obličeje. Zvýší se maximálně přirozená tvorba elastinu a kolagenu.</p>\n\n<p>Lifting je viditelný již po prvním ošetření. Pro výraznější výsledky doporučujeme kůru minimálně 5 - 10 lekcí nejlépe v první týdnu 3x a následně 2x týdně. Dlouhotrvající výsledky docílíte při následném udržovacím programu minimálně 1x za měsíc.</p>\n\n<h3>Blahodárné účinky Vacupressu (liftingu) obličeje:</h3>\n\n<ul><li>Výrazně omlazuje a vypíná pleť</li>\n	<li>Odstraňuje drobné vrásky a váčky pod očima</li>\n	<li>Čistí aknózní pleť</li>\n	<li>Zpomaluje stárnutí pleti </li>\n	<li>Snižuje napětí v obličeji</li>\n</ul>', 'media/img/masaze/17.jpg', 60, 550, 5, 1),
(18, 'Lymfatické kalhoty Pneuven', '<p>Jedná se o masážní přístroj pracující na principu presoterapie – tlakových vln. Masírují se dolní končetiny, břicho, hýždě a pas. Návleky na dolní končetiny „KALHOTY“ se nafukují a vytlačují lymfu a krev z periferie do centra a zpět. Masáž probíhá silnou tlakovou vlnou, která zprůchodňuje lymfatické cévy a napomáhá odtoku toxických látek zadržovaných v těle. Jedná se o téměř neodmyslitelnou součást regenerace po liposukci stehen, břicha a boků.</p>\n\n<p>Díky tlakovým vlnám se rychleji aktivuje lymfatický systém a škodlivé látky tak z těla mnohem rychleji odcházejí. Nutnou součástí úspěšné procedury je dodržování pitného režimu. Velice prospívá k mladšímu vzhledu kůže. K masáži je potřeba si sebou přinést oblečení, ve kterém budete oblečeni během procedury (např. elastické kalhoty a ponožky)!</p>\n\n<h3>Blahodárné účinky lymfatických kalhot:</h3>\n\n<ul><li>Odstraňuje celulitidu</li>\n	<li>Přispívá k detoxikaci organismu</li>\n	<li>Přispívá k lepšímu prokrvení pokožky, toku krve a lymfy</li>\n	<li>Vyhlazuje a zeštíhluje obvod stehen, břicha a hýždí</li>\n	<li>Pomáhá lepšímu fungování metabolismu</li>\n	<li>Zmírňuje příznaky syndromu těžkých nohou</li>\n</ul>', 'media/img/masaze/18.jpg', 50, 220, 5, 2),
(19, 'Moxovani', '<p>Při moxování se využívá tepla a kouře z léčivé moxy, která pochází z tradiční čínské medicíny. Moxy mají podobu zuhelnatělých doutníků, které jsou vyplněny sušeným pelyňkem a dalšími čínskými léčivými bylinami. Při proceduře se směs zapálí a bezkontaktně se zahřívají akupunkturní body. Tím dochází k prohřátí a uvolnění jednotlivých částí těla, a to především bederní a krční oblasti, což činí moxování výborným doplňkem masáže. Energie z bylin vstupuje do akupunkturních drah, vyrovnává je, podporuje krevní oběh a vylučuje z těla chlad, zatuhlost a bolest.</p>\n', 'media/img/masaze/19.jpg', 15, 200, 6, 0),
(20, 'Tygrování', '<p>Tygrování je Japonská prohřívací technika, která používá speciální kovové pouzdro s hořící tyčinkou vyrobenou ze směsi různých bylin (nejčastěji však z lisovaného pelyňku). Kontaktem s pokožkou postupně prohřívají dolní končetiny, především chodidla. Právě díky kombinaci lehkého tlaku a tepla získává tato terapie jedinečné detoxikační kvality.</p>\n', 'media/img/masaze/20.jpg', 15, 200, 6, 1),
(21, 'Lávové kameny k prohřátí', '<p> Lávové kameny se po samotné masáži nahřejí a přiloží na záda. Přikrytím kamenů dochází k tepelnému zahřátí a minerály obsažené v lávových kamenech se dostávají do těla. Intenzivní teplo výborně doplňuje účinky masáže a uvolní i ty nejzatuhlejší partie.</p>\n', 'media/img/masaze/21.jpg', 0, 30, 6, 2),
(22, 'Tělové svíce Tadé', '<p>Tělové svíčky TADÉ jsou vyráběny z bavlny, včelího vosku, kurkumy a éterických olejů. Teplo a bioenergie vytvořené při hoření svíčky změkčují v těle nahromaděný maz, který je prostřednictvím tzv. komínového efektu vytahován směrem vzhůru, tedy z těla přes kůži ven. Svíčky tímto způsobem napomáhají likvidaci zánětů a lokálních blokacív organismu a tak přispívají k nastartování samoléčebných procesů a celkové harmonizaci těla.</p>\n', 'media/img/masaze/22.jpg', 0, 200, 6, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `oleje`
--

CREATE TABLE IF NOT EXISTS `oleje` (
`id_oleje` int(11) NOT NULL,
  `nazev` varchar(80) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `id_kategorie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `oleje`
--

INSERT INTO `oleje` (`id_oleje`, `nazev`, `popis`, `cena`, `id_kategorie`) VALUES
(1, 'ROZMARÝNOVÝ OLEJ', '<p>Silně stimulující a harmonizující silice, nervová bolest hlavy, migréna, únava, antiseptické účinky, podporuje žaludeční činnost, antispazmatickém, svalové bolesti, nedokrevnost končetin, celulitida, stimuluje srdeční činnost, diuretikum, brání vzniku jizev, normalizuje krevní tlak, tonizační, napomáhá regeneraci vlasové pokožky.</p>\r\n', 100, 1),
(2, 'LEVANDULOVÝ OLEJ', '<p>Uklidňuje, pomáhá při nervovém vypětí, bolesti hlavy, analgetikum, dýchací problémy, bronchitida, menstruační bolesti, revmatické bolesti, svalové bolesti, repelent, snižuje tlak, hodí se na všechny typy pleti, regeneruje kožní buňky, antiseptikum, normalizuje mazotok, má hojivé účinky.</p>\r\n', 100, 2),
(3, 'SANTALOVÝ OLEJ', '<p>Působí na nervový systém, antidepresivum, afrodiziakum, sedativum, nespavost, psychosomatické problémy, diuretikum, katar, kašel, nachlazení, bolesti v krku, stimuluje trávení, nevolnost, tonikum, akné, mastná pleť, zvláčňuje suchou a dehydratovanou pleť.</p>\r\n', 100, 3),
(4, 'MEGA SUPER OLEJ', '<p>FAKT SUPER OLEJ PRO VŠECHNY</p>\n', 123, 3),
(5, 'Tak toto musí mít každý, přes to nejede vlak.', '<p>Nezkusíš neuvěříš</p>\n', 99999999, 2);

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
-- Klíče pro tabulku `oleje`
--
ALTER TABLE `oleje`
 ADD PRIMARY KEY (`id_oleje`), ADD KEY `id_kategorie` (`id_kategorie`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `akce`
--
ALTER TABLE `akce`
MODIFY `id_akce` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pro tabulku `fotky`
--
ALTER TABLE `fotky`
MODIFY `id_fotky` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pro tabulku `intro`
--
ALTER TABLE `intro`
MODIFY `id_intro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pro tabulku `kategorie_masazi`
--
ALTER TABLE `kategorie_masazi`
MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `kategorie_oleju`
--
ALTER TABLE `kategorie_oleju`
MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `masaze`
--
ALTER TABLE `masaze`
MODIFY `id_masaze` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pro tabulku `oleje`
--
ALTER TABLE `oleje`
MODIFY `id_oleje` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
