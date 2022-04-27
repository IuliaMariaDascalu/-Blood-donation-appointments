-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 07:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancasangedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `doneaza`
--

CREATE TABLE `doneaza` (
  `idDoneaza` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `oraProgramare` time NOT NULL,
  `dataProgramare` date NOT NULL,
  `codBanca` smallint(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `codDonator` smallint(3) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doneaza`
--

INSERT INTO `doneaza` (`idDoneaza`, `oraProgramare`, `dataProgramare`, `codBanca`, `codDonator`) VALUES
(001, '12:10:00', '2021-10-12', 001, 001),
(002, '13:00:00', '2021-12-12', 001, 002),
(003, '11:30:00', '2021-08-09', 001, 003),
(004, '09:00:00', '2021-12-10', 002, 004),
(005, '08:30:00', '2022-03-07', 006, 004),
(006, '10:00:00', '2021-09-12', 008, 006),
(007, '09:20:00', '2022-01-15', 008, 003),
(008, '12:10:00', '2021-04-22', 010, 010),
(009, '10:10:00', '2021-05-11', 005, 005),
(010, '11:30:00', '2021-06-13', 007, 009),
(038, '21:01:00', '2022-01-26', 007, 011),
(039, '21:07:00', '2022-01-26', 008, 011),
(040, '21:04:00', '2022-02-03', 008, 011),
(042, '21:11:00', '2022-01-21', 008, 011),
(045, '17:35:00', '2022-01-18', 007, 011),
(046, '17:35:00', '2022-01-18', 007, 011),
(047, '17:35:00', '2022-01-18', 007, 011),
(048, '19:04:00', '2022-01-28', 008, 011),
(049, '12:30:00', '2022-01-27', 005, 011),
(051, '08:25:00', '2022-01-25', 006, 011);

-- --------------------------------------------------------

--
-- Table structure for table `solicita`
--

CREATE TABLE `solicita` (
  `idSolicita` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `codBanca` smallint(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `codPacient` smallint(3) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solicita`
--

INSERT INTO `solicita` (`idSolicita`, `codBanca`, `codPacient`) VALUES
(001, 001, 001),
(002, 004, 001),
(003, 010, 005),
(004, 010, 007),
(005, 001, 009),
(006, 005, 009),
(007, 003, 008),
(008, 002, 004),
(009, 009, 006),
(010, 005, 003),
(012, 005, 013),
(013, 001, 014),
(014, 003, 015);

-- --------------------------------------------------------

--
-- Table structure for table `tblbancasange`
--

CREATE TABLE `tblbancasange` (
  `idBanca` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `numeBanca` varchar(100) DEFAULT NULL,
  `adresaBanca` varchar(50) DEFAULT NULL,
  `nrTelefonBanca` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbancasange`
--

INSERT INTO `tblbancasange` (`idBanca`, `numeBanca`, `adresaBanca`, `nrTelefonBanca`) VALUES
(001, 'Institutul Clinic Fundeni Bucuresti', 'Sos.Fundeni nr 258, Sector 2', '0212750500'),
(002, 'Spitalul Universitar de Urgenta Bucuresti', 'Splaiul Independentei nr.16', '0213180519'),
(003, 'Spitalul Clinic de Urgente Floreasca Bucuresti', 'Calea Floreasca nr.8, sector 1', '0215992300'),
(004, 'Spitalul universitar de Urgenta Militar Central Dr. Carol Davila Bucuresti', 'Str. Calea Plevnei nr.134, sector 1', '0213193051'),
(005, 'CTSM Bucuresti', 'Str. C.Caracas nr.2-8, sector 1', '0314251230'),
(006, 'CTS Zalau', 'Str. Simion Barnutiu nr.91', '0360401061'),
(007, 'CTS Tulcea', 'Str. Gloriei nr.22', '0340401079'),
(008, 'CTS Timisoara', 'Str. Martir Marius Ciopec nr.1', '0356175711'),
(009, 'CTS Tg. Mures', 'Str. Molter Karoly nr.2', '0365430179'),
(010, 'CTS Suceava', 'B-dul 1 Dec. 1918 nr.11', '0330401674');

-- --------------------------------------------------------

--
-- Table structure for table `tbldonator`
--

CREATE TABLE `tbldonator` (
  `idDonator` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `numeDonator` varchar(20) DEFAULT NULL,
  `prenumeDonator` varchar(50) DEFAULT NULL,
  `dataNastere` date DEFAULT NULL,
  `nrTelefonDonator` char(10) DEFAULT NULL,
  `grupaSangeDonator` varchar(10) DEFAULT NULL,
  `greutateDonator` decimal(5,2) NOT NULL,
  `emailDonator` varchar(50) NOT NULL,
  `parolaDonator` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldonator`
--

INSERT INTO `tbldonator` (`idDonator`, `numeDonator`, `prenumeDonator`, `dataNastere`, `nrTelefonDonator`, `grupaSangeDonator`, `greutateDonator`, `emailDonator`, `parolaDonator`) VALUES
(001, 'Popescu', 'Ion', '1990-05-09', '0742563499', 'AB(IV)', '80.80', 'popescu_ion@gmail.com', '202cb962ac59075b964b07152d234b70\r\n'),
(002, 'Ionescu', 'Maria', '1991-05-10', '0742555991', 'B(III)', '77.00', 'ionescu_maria@gmail.com', ''),
(003, 'Georgescu', 'Mihai', '1995-11-25', '0762463499', 'AB(IV)', '91.00', 'georgescu_mihai@gmail.com', ''),
(004, 'Sandu', 'Florin', '1989-10-10', '0728863499', '0(I)', '80.60', 'sandu.florin89@yahoo.com', ''),
(005, 'Lazar', 'Ana-Maria', '1999-10-20', '0756522299', 'A(II)', '65.00', 'ana.maria_lazar@gmail.com', ''),
(006, 'Barbu', 'Stefan', '1975-12-25', '0746936663', 'AB(IV)', '85.00', 'setfanbarbu25@gmail.com', ''),
(007, 'Anghel', 'Cristina', '2000-03-07', '0766361418', 'A(II)', '51.50', 'cristinaa.2000_ang@gmail.com', ''),
(008, 'Munteanu', 'Sorina', '2001-07-10', '0761270263', '0(I)', '55.75', 'munteanu.s.sorina@yahoo.com', ''),
(009, 'Enache', 'Alexandru-Vlad', '2002-01-31', '0721259948', '0(I)', '75.00', 'ali.vlad@yahoo.com', ''),
(010, 'Voicu', 'Ramona-Delia-Andreea', '1999-03-07', '0783532955', 'B(III)', '52.50', 'deliutza.andreea_r@gmail.com', ''),
(011, 'Duica', 'Ramona', '0000-00-00', '7623224520', 'A(II)', '45.00', 'ramona@mail.com', '202cb962ac59075b964b07152d234b70'),
(023, 'Grigorie', 'Emilia', '0000-00-00', '7589724520', 'AB(IV)', '54.00', 'emilia@gmail.com', '202cb962ac59075b964b07152d234b70'),
(024, 'Savoiu', 'Ioana', '0000-00-00', '7289024520', '0(I)', '56.00', 'ioana@yahoo.com', '202cb962ac59075b964b07152d234b70'),
(025, 'Dascalu', 'Iulia', '0000-00-00', '7389024520', 'A(II)', '53.00', 'mariadascalu@yahoo.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tblpacient`
--

CREATE TABLE `tblpacient` (
  `idPacient` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `numePacient` varchar(20) DEFAULT NULL,
  `prenumePacient` varchar(50) DEFAULT NULL,
  `conditieMedicala` varchar(100) DEFAULT NULL,
  `nrTelefonPacient` char(10) DEFAULT NULL,
  `grupaSangePacient` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpacient`
--

INSERT INTO `tblpacient` (`idPacient`, `numePacient`, `prenumePacient`, `conditieMedicala`, `nrTelefonPacient`, `grupaSangePacient`) VALUES
(001, 'Popa', 'Andrei', 'talasemie', '0727373772', 'B(III)'),
(002, 'Marinescu', 'Paula', 'hepatita A', '0721834299', 'AB(IV)'),
(003, 'Stratulat', 'Teodora', 'anemie severa', '0799739045', 'A(II)'),
(004, 'Ichim', 'Tudor', 'interventie chirurgicala', '0772206011', '0(I)'),
(005, 'Sadu', 'Valentin', 'leucemie', '0735252156', '0(I)'),
(006, 'Paltescu', 'Mihai', 'hipocalcemie', '0729063470', 'B(III)'),
(007, 'Mocnescu', 'Sabin', 'talasemie', '0729558605', 'B(III)'),
(008, 'Grecu', 'Eleonora', 'anemie cronica', '0722599844', 'AB(IV)'),
(009, 'Ion', 'Ionica', 'anemie falciforma', '0769774601', 'A(II)'),
(010, 'Zagara', 'Ionut', 'lupus', '0751666743', 'A(II)'),
(013, 'Duica', 'Ramona', 'anemie', '764790505', 'A(II)'),
(014, 'Dascalu', 'Maria', 'anemie', '784490505', '0(I)'),
(015, 'Grigorie', 'Alexandra', 'anemie', '764394005', 'B(III)');

-- --------------------------------------------------------

--
-- Table structure for table `tblstoc`
--

CREATE TABLE `tblstoc` (
  `idStoc` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `codBanca` smallint(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `grupaSange` varchar(10) NOT NULL,
  `cantitate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstoc`
--

INSERT INTO `tblstoc` (`idStoc`, `codBanca`, `grupaSange`, `cantitate`) VALUES
(001, 001, 'AB(IV)', '5000'),
(002, 001, 'B(III)', '4500'),
(003, 001, 'A(II)', '6200'),
(004, 002, '0(I)', '7600'),
(005, 003, 'AB(IV)', '4500'),
(006, 004, 'B(III)', '2500'),
(007, 005, 'A(II)', '5500'),
(008, 006, '0(I)', '4500'),
(009, 007, '0(I)', '3550'),
(010, 008, 'AB(IV)', '4550'),
(011, 009, 'B(III)', '1500'),
(012, 010, 'B(III)', '6500'),
(013, 010, '0(I)', '7000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doneaza`
--
ALTER TABLE `doneaza`
  ADD PRIMARY KEY (`idDoneaza`),
  ADD KEY `fk_banca1` (`codBanca`),
  ADD KEY `fk_donator2` (`codDonator`);

--
-- Indexes for table `solicita`
--
ALTER TABLE `solicita`
  ADD PRIMARY KEY (`idSolicita`),
  ADD KEY `fk_banca3` (`codBanca`),
  ADD KEY `fk_pacient3` (`codPacient`);

--
-- Indexes for table `tblbancasange`
--
ALTER TABLE `tblbancasange`
  ADD PRIMARY KEY (`idBanca`);

--
-- Indexes for table `tbldonator`
--
ALTER TABLE `tbldonator`
  ADD PRIMARY KEY (`idDonator`);

--
-- Indexes for table `tblpacient`
--
ALTER TABLE `tblpacient`
  ADD PRIMARY KEY (`idPacient`);

--
-- Indexes for table `tblstoc`
--
ALTER TABLE `tblstoc`
  ADD PRIMARY KEY (`idStoc`),
  ADD KEY `fk_banca` (`codBanca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doneaza`
--
ALTER TABLE `doneaza`
  MODIFY `idDoneaza` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `solicita`
--
ALTER TABLE `solicita`
  MODIFY `idSolicita` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblbancasange`
--
ALTER TABLE `tblbancasange`
  MODIFY `idBanca` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbldonator`
--
ALTER TABLE `tbldonator`
  MODIFY `idDonator` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblpacient`
--
ALTER TABLE `tblpacient`
  MODIFY `idPacient` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblstoc`
--
ALTER TABLE `tblstoc`
  MODIFY `idStoc` smallint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doneaza`
--
ALTER TABLE `doneaza`
  ADD CONSTRAINT `fk_banca1` FOREIGN KEY (`codBanca`) REFERENCES `tblbancasange` (`idBanca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_donator2` FOREIGN KEY (`codDonator`) REFERENCES `tbldonator` (`idDonator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solicita`
--
ALTER TABLE `solicita`
  ADD CONSTRAINT `fk_banca3` FOREIGN KEY (`codBanca`) REFERENCES `tblbancasange` (`idBanca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pacient3` FOREIGN KEY (`codPacient`) REFERENCES `tblpacient` (`idPacient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblstoc`
--
ALTER TABLE `tblstoc`
  ADD CONSTRAINT `fk_banca` FOREIGN KEY (`codBanca`) REFERENCES `tblbancasange` (`idBanca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
