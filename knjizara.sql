-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 02:00 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knjizara`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `kategorijaId` int(11) NOT NULL,
  `imeKategorije` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`kategorijaId`, `imeKategorije`) VALUES
(1, 'Popularna psihologija'),
(2, 'Klasici'),
(3, 'Trileri i misterija'),
(4, 'Biografije'),
(5, 'Opšta knjizevnost'),
(6, 'Tinejdž romani'),
(7, 'Domaći romani');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikId`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'marija13', 'marija13');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `proizvodId` int(11) NOT NULL,
  `imeProizvoda` varchar(255) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `cena` double(10,2) NOT NULL,
  `kategorijaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`proizvodId`, `imeProizvoda`, `kolicina`, `cena`, `kategorijaId`) VALUES
(1, 'Sva siročad Bruklina', 3, 1199.00, 3),
(2, 'Princeza i obožavateljka', 3, 859.00, 6),
(3, 'Leto kad sam naučila da letim', 5, 999.00, 6),
(4, 'Dikensov London', 3, 1320.00, 2),
(5, 'Ojačaj samopuzdanje', 6, 1099.00, 1),
(6, 'Šake pune oblaka i druge drame', 7, 1300.00, 5),
(7, 'Zapisi iz mrtvog doma', 4, 999.00, 5),
(8, 'Marija Antoaneta: Životni put', 4, 1899.00, 4),
(9, 'Metak koji je promašio', 5, 1099.00, 3),
(10, 'Opasno je govoriti o Bogu', 4, 1500.00, 4),
(11, 'Prestanite mnnogo da razmišljate', 8, 1099.00, 1),
(12, '1984', 7, 999.00, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`kategorijaId`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikId`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`proizvodId`),
  ADD KEY `kategorijaId_fk` (`kategorijaId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`kategorijaId`) REFERENCES `kategorija` (`kategorijaId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
