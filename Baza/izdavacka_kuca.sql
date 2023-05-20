-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 07:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `izdavacka_kuca`
--
CREATE DATABASE IF NOT EXISTS `izdavacka_kuca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `izdavacka_kuca`;

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `knjiga_id` varchar(10) NOT NULL,
  `naziv_knjige` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `nabavna_cena` float NOT NULL,
  `prodajna_cena` float NOT NULL,
  `slika` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`knjiga_id`, `naziv_knjige`, `autor`, `kolicina`, `nabavna_cena`, `prodajna_cena`, `slika`) VALUES
('BalGus', 'Balkanski gusar', 'Jan Gordon', 300, 200, 700, 'Balkanski gusar'),
('CuvGr', 'Čuvar grada', 'Nebojša Petković', 250, 750, 1250, 'Cuvar grada'),
('Gor', 'Gorolom', 'Aleksandar Tešić', 300, 650, 1150, 'Gorolom'),
('KalJ', 'Kal Juga', 'Mladen Milosavljević', 100, 250, 750, 'Kal juga'),
('KK-1', 'Kletva Kainova I', 'Aleksandar Tešić', 400, 650, 1150, 'Kletva kainova 1'),
('KK-2', 'Kletva Kainova II', 'Aleksandar Tešić', 300, 300, 800, 'Kletva kainova 2'),
('KK-3', 'Kletva Kainova III', 'Aleksandar Tešić', 650, 850, 1350, 'Kletva kainova 3'),
('KK-Tri', 'Komplet trilogija - Kletva Kainova', 'Aleksandar Tešić', 300, 1850, 3300, 'Trilogija Kletva kainova'),
('Knj2084', '2084', 'Aleksandar Tešić', 110, 450, 950, '2084'),
('Kon-CN', 'Crni neznanac', 'Robert E. Hauard', 150, 300, 800, 'Crni neznanac'),
('Kon-FnM', 'Feniks na maču', 'Robert E. Hauard', 200, 300, 800, 'Feniks na macu'),
('Kon-KCO', 'Kraljica crne obale', 'Robert E. Hauard', 150, 300, 800, 'Kraljica crne obale'),
('Kon-uCZ', 'U času zmaja', 'Robert E. Hauard', 200, 300, 800, 'U casu zmaja'),
('Kos-B', 'Kosingas - Bezdanj', 'Aleksandar Tešić', 450, 600, 1100, 'Bezdanj'),
('Kos-BS1', 'Kosingas - Budjenje Svarogovo', 'Aleksandar Tešić', 600, 650, 1150, 'Budjenje svarogovo 1'),
('Kos-BS2', 'Kosingas - Budjenje Svarogovo 2', 'Aleksandar Tešić', 700, 1250, 1750, 'Budjenje svarogovo 2'),
('Kos-KOiV', 'Kosingas - Kroz oganj i vodu', 'Aleksandar Tešić', 300, 600, 1100, 'Kroz oganj i vodu'),
('Kos-NP', 'Kosingas - Neispričane priče', 'Grupa', 250, 600, 1100, 'Neispricane price'),
('Kos-OsNMdS', 'Kosingas - Onaj što nauči mrak da sija', 'Aleksandar Tešić', 400, 1100, 1600, 'Onaj sto nauci mrak da sija'),
('Kos-RZ', 'Kosingas - Red zmaja', 'Aleksandar Tešić', 500, 550, 1050, 'Red zmaja'),
('Kos-S', 'Kosingas - Smrtovanje', 'Aleksandar Tešić', 550, 1000, 1500, 'Smrtovanje'),
('Kos-Str1', 'Kosingas Red Zmaja - Strip 1', 'Zoran Jovičić', 100, 1000, 1500, 'Strip 1'),
('Kos-Str2', 'Kosingas Red Zmaja - Strip 2', 'Zoran jovičić', 120, 1000, 1500, 'Strip 2'),
('Kos-Str3', 'Kosingas Red Zmaja - Strip 3', 'Zoran jovičić', 150, 1000, 1500, 'Strip 3'),
('Kos-Tri', 'Komplet trilogija - Kosingas', 'Aleksandar Tešić', 400, 2200, 3650, 'Trilogija kosingas'),
('MO-KsvG', 'Miloš Obilić - Koplje svetog Georgija', 'Aleksandar Tešić', 400, 550, 1050, 'Koplje svetog georgija'),
('MO-Tri', 'Komplet trilogija - Miloš Obilić', 'Aleksandar Tešić', 350, 2650, 4100, 'Trilogija Milos Obilic'),
('MO-VZ', 'Miloš Obilić - Vitez zatočnik', 'Aleksandar Tešić', 450, 1450, 1950, 'Vitez zatocnik'),
('MO-ZiZ', 'Miloš Obilić - Zmaj i ždral', 'Aleksandar Tešić', 500, 600, 1100, 'Zmaj i zdral'),
('ProKor', 'Proročanstvo Korota', 'Goran Skrobonja', 150, 350, 850, 'Prorocanstvo korota'),
('SuC', 'Šilom u čelo', 'Goran Skrobonja', 100, 450, 950, 'Silom u celo'),
('uVZ', 'U Vrzinom kolu', 'Grupa', 200, 550, 1050, 'U vrzinom kolu');

-- --------------------------------------------------------

--
-- Table structure for table `kupac`
--

CREATE TABLE `kupac` (
  `kupac_id` int(11) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sifra` varchar(100) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `grad` varchar(20) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `broj_telefona` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kupac`
--

INSERT INTO `kupac` (`kupac_id`, `ime`, `prezime`, `email`, `sifra`, `datum_rodjenja`, `grad`, `adresa`, `zip`, `broj_telefona`) VALUES
(1, 'Marko', 'Marković', 'marko@gmail.com', '*B883F9B747DEAD2F31DAC857EEEF3CDC58691C63', '1999-06-15', 'Beograd', 'Bulevar Zorana Djindjića 138', '11070', '0612345678'),
(3, 'Luka', 'Lukic', 'luka@yahoo.com', '*30208804A0A1DDACD2183464C313C1AA5C6775DC', '2003-08-15', 'Novi Sad', 'Rumenačka 84', '400117', '0651237894'),
(4, 'Janko', 'Janković', 'janko@outlook.com', '*6B3CF3A1C118945BE0142F2A7DA1FA701A2B5407', '1995-11-22', 'Niš', 'Vojvode Gojka 15', '700132', '0698765432');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbenica`
--

CREATE TABLE `porudzbenica` (
  `porudzbenica_id` int(11) NOT NULL,
  `datum_kreiranja` date NOT NULL DEFAULT current_timestamp(),
  `iznos_porudzbenice` float NOT NULL,
  `radnik_id` varchar(10) NOT NULL,
  `stamparija_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `porudzbenica`
--

INSERT INTO `porudzbenica` (`porudzbenica_id`, `datum_kreiranja`, `iznos_porudzbenice`, `radnik_id`, `stamparija_id`) VALUES
(7, '2023-02-19', 212000, 'VT9820', 'stampDMD'),
(8, '2023-02-19', 14300, 'VT9820', 'stampP1');

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE `racun` (
  `racun_id` int(11) NOT NULL,
  `datum_kreiranja` date NOT NULL DEFAULT current_timestamp(),
  `iznos_racuna` float NOT NULL,
  `kupac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `racun`
--

INSERT INTO `racun` (`racun_id`, `datum_kreiranja`, `iznos_racuna`, `kupac_id`) VALUES
(1, '2023-02-19', 6650, 1),
(2, '2023-02-19', 11050, 3),
(3, '2023-02-19', 6950, 4);

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

CREATE TABLE `radnik` (
  `radnik_id` varchar(10) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sifra` varchar(100) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `broj_telefona` varchar(15) NOT NULL,
  `datum_zaposlenja` date NOT NULL,
  `plata` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`radnik_id`, `ime`, `prezime`, `email`, `sifra`, `datum_rodjenja`, `adresa`, `broj_telefona`, `datum_zaposlenja`, `plata`) VALUES
('VT9820', 'Vladan', 'Tešić', 'vladan9820@its.edu.rs', '*D72C49EA7EB45A77CBF04EA0E9A1E3A4170F108D', '2001-09-02', 'Španskih boraca 34', '0694202344', '2016-04-15', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `stamparija`
--

CREATE TABLE `stamparija` (
  `stamparija_id` varchar(10) NOT NULL,
  `naziv_stamparije` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `broj_telefona` varchar(15) NOT NULL,
  `adresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stamparija`
--

INSERT INTO `stamparija` (`stamparija_id`, `naziv_stamparije`, `email`, `broj_telefona`, `adresa`) VALUES
('stampDMD', 'DMD Štamparija', 'dmdstampa@gmail.com', '0639876541', 'Bul. Mihajla Pupina 134'),
('stampP1', 'Print One Štamparija', 'p1stampa@outlook.com', '0651237894', 'Jurija Gagarina 62'),
('stampPenda', 'Štamparija Penda', 'penda@yahoo.com', '0691234567', 'Knjeginje Ljubice 74');

-- --------------------------------------------------------

--
-- Table structure for table `stavka_porudzbenice`
--

CREATE TABLE `stavka_porudzbenice` (
  `porudzbenica_id` int(11) NOT NULL,
  `stavka_id` int(11) NOT NULL,
  `knjiga_id` varchar(10) NOT NULL,
  `naziv_stavke` varchar(50) NOT NULL,
  `cena_stavke` float NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stavka_porudzbenice`
--

INSERT INTO `stavka_porudzbenice` (`porudzbenica_id`, `stavka_id`, `knjiga_id`, `naziv_stavke`, `cena_stavke`, `kolicina`) VALUES
(7, 6, 'Knj2084', '2084', 450, 60),
(7, 7, 'Kos-Str2', 'Kosingas Red Zmaja - Strip 2', 1000, 70),
(7, 8, 'SuC', 'Šilom u čelo', 450, 50),
(8, 9, 'BalGus', 'Balkanski gusar', 200, 1),
(8, 10, 'CuvGr', 'Čuvar grada', 750, 2),
(8, 11, 'Gor', 'Gorolom', 650, 3),
(8, 12, 'KK-1', 'Kletva Kainova I', 650, 1),
(8, 13, 'KK-2', 'Kletva Kainova II', 300, 1),
(8, 14, 'KK-3', 'Kletva Kainova III', 850, 1),
(8, 15, 'KK-Tri', 'Komplet trilogija - Kletva Kainova', 1850, 1),
(8, 16, 'Kos-B', 'Kosingas - Bezdanj', 600, 1),
(8, 17, 'Kos-RZ', 'Kosingas - Red zmaja', 550, 1),
(8, 18, 'Kos-S', 'Kosingas - Smrtovanje', 1000, 1),
(8, 19, 'Kos-Tri', 'Komplet trilogija - Kosingas', 2200, 1),
(8, 20, 'MO-Tri', 'Komplet trilogija - Miloš Obilić', 2650, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stavka_racuna`
--

CREATE TABLE `stavka_racuna` (
  `racun_id` int(11) NOT NULL,
  `stavka_id` int(11) NOT NULL,
  `knjiga_id` varchar(10) NOT NULL,
  `naziv_stavke` varchar(50) NOT NULL,
  `cena_stavke` float NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stavka_racuna`
--

INSERT INTO `stavka_racuna` (`racun_id`, `stavka_id`, `knjiga_id`, `naziv_stavke`, `cena_stavke`, `kolicina`) VALUES
(1, 1, 'BalGus', 'Balkanski gusar', 700, 1),
(1, 2, 'CuvGr', 'Čuvar grada', 1250, 2),
(1, 3, 'Gor', 'Gorolom', 1150, 3),
(2, 4, 'KK-Tri', 'Komplet trilogija - Kletva Kainova', 3300, 1),
(2, 5, 'Kos-Tri', 'Komplet trilogija - Kosingas', 3650, 1),
(2, 6, 'MO-Tri', 'Komplet trilogija - Miloš Obilić', 4100, 1),
(3, 7, 'KK-1', 'Kletva Kainova I', 1150, 1),
(3, 8, 'KK-2', 'Kletva Kainova II', 800, 1),
(3, 9, 'KK-3', 'Kletva Kainova III', 1350, 1),
(3, 10, 'Kos-RZ', 'Kosingas - Red zmaja', 1050, 1),
(3, 11, 'Kos-B', 'Kosingas - Bezdanj', 1100, 1),
(3, 12, 'Kos-S', 'Kosingas - Smrtovanje', 1500, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`knjiga_id`);

--
-- Indexes for table `kupac`
--
ALTER TABLE `kupac`
  ADD PRIMARY KEY (`kupac_id`);

--
-- Indexes for table `porudzbenica`
--
ALTER TABLE `porudzbenica`
  ADD PRIMARY KEY (`porudzbenica_id`),
  ADD KEY `fk_porudzbenica_radnik_id` (`radnik_id`),
  ADD KEY `fk_porudzbenica_stamparija_id` (`stamparija_id`);

--
-- Indexes for table `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`racun_id`),
  ADD KEY `fk_racun_kupac_id` (`kupac_id`);

--
-- Indexes for table `radnik`
--
ALTER TABLE `radnik`
  ADD PRIMARY KEY (`radnik_id`);

--
-- Indexes for table `stamparija`
--
ALTER TABLE `stamparija`
  ADD PRIMARY KEY (`stamparija_id`);

--
-- Indexes for table `stavka_porudzbenice`
--
ALTER TABLE `stavka_porudzbenice`
  ADD PRIMARY KEY (`stavka_id`,`porudzbenica_id`),
  ADD KEY `fk_stavka_porudzbenice_porudzbenica_id` (`porudzbenica_id`),
  ADD KEY `fk_stavka_porudzbenice_knjiga_id` (`knjiga_id`);

--
-- Indexes for table `stavka_racuna`
--
ALTER TABLE `stavka_racuna`
  ADD PRIMARY KEY (`stavka_id`,`racun_id`),
  ADD KEY `fk_stavka_racuna_racun_id` (`racun_id`),
  ADD KEY `fk_stavka_racuna_knjiga_id` (`knjiga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kupac`
--
ALTER TABLE `kupac`
  MODIFY `kupac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `porudzbenica`
--
ALTER TABLE `porudzbenica`
  MODIFY `porudzbenica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `racun`
--
ALTER TABLE `racun`
  MODIFY `racun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stavka_porudzbenice`
--
ALTER TABLE `stavka_porudzbenice`
  MODIFY `stavka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stavka_racuna`
--
ALTER TABLE `stavka_racuna`
  MODIFY `stavka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `porudzbenica`
--
ALTER TABLE `porudzbenica`
  ADD CONSTRAINT `fk_porudzbenica_radnik_id` FOREIGN KEY (`radnik_id`) REFERENCES `radnik` (`radnik_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_porudzbenica_stamparija_id` FOREIGN KEY (`stamparija_id`) REFERENCES `stamparija` (`stamparija_id`) ON UPDATE CASCADE;

--
-- Constraints for table `racun`
--
ALTER TABLE `racun`
  ADD CONSTRAINT `fk_racun_kupac_id` FOREIGN KEY (`kupac_id`) REFERENCES `kupac` (`kupac_id`) ON UPDATE CASCADE;

--
-- Constraints for table `stavka_porudzbenice`
--
ALTER TABLE `stavka_porudzbenice`
  ADD CONSTRAINT `fk_stavka_porudzbenice_knjiga_id` FOREIGN KEY (`knjiga_id`) REFERENCES `knjiga` (`knjiga_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stavka_porudzbenice_porudzbenica_id` FOREIGN KEY (`porudzbenica_id`) REFERENCES `porudzbenica` (`porudzbenica_id`) ON UPDATE CASCADE;

--
-- Constraints for table `stavka_racuna`
--
ALTER TABLE `stavka_racuna`
  ADD CONSTRAINT `fk_stavka_racuna_knjiga_id` FOREIGN KEY (`knjiga_id`) REFERENCES `knjiga` (`knjiga_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stavka_racuna_racun_id` FOREIGN KEY (`racun_id`) REFERENCES `racun` (`racun_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
