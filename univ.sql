-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 11:37 PM
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
-- Database: `univ`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fphoto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fphoto`) VALUES
(2, '2profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `atitle` varchar(400) NOT NULL,
  `atext` text NOT NULL,
  `alink` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`atitle`, `atext`, `alink`) VALUES
('Listes  des admis et d’attent', 'Pour confirmer leurs candidatures d’admission à l’EST de Safi, les bacheliers dont les noms figurent sur les listes ci-dessous sont invités à se présenter à l’EST de Safi munis d’une copie du baccalauréat ou d’une pièce prouvant l’inscription à un établissement d’enseignement. Ce du 03 au 05 novembre  2020 à 16h.\r\nIl est à noter que l’admission se fait selon le critère de mérite et les palaces vacantes.\r\n\r\nLes résultats seront affichés l’après midi du 05 novembre 2020 et les candidats admis seront demandés de déposer l’original du baccalauréat  à EST de Safi les 09 et 10 novembre 2020 avant 17h.', 'http://www.ests.uca.ma/?p=1691');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `dn` date NOT NULL,
  `adresse` text NOT NULL,
  `country` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `cne` varchar(12) NOT NULL,
  `bactype` varchar(250) NOT NULL,
  `bacregion` varchar(250) NOT NULL,
  `bacprovince` varchar(250) NOT NULL,
  `bacyear` float NOT NULL,
  `notereg` float NOT NULL,
  `notenat` float NOT NULL,
  `notemoy` float NOT NULL,
  `fphoto` varchar(250) NOT NULL,
  `fcin` varchar(250) NOT NULL,
  `fbac` varchar(250) NOT NULL,
  `fnotes` varchar(250) NOT NULL,
  `choix` varchar(5) NOT NULL,
  `nacces` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `tele`, `cin`, `dn`, `adresse`, `country`, `city`, `cne`, `bactype`, `bacregion`, `bacprovince`, `bacyear`, `notereg`, `notenat`, `notemoy`, `fphoto`, `fcin`, `fbac`, `fnotes`, `choix`, `nacces`) VALUES
(1, '0700321784', 'AA', '2002-02-09', 'SALAM 1 GR A RUE 6 N 31 BERNOUSSI ', 'MA', 'Casablanca', 'R130111364', 'BPC', 'Casablanca-Settat', 'Casablanca Sidi Bernoussi', 2021, 20, 15.3, 15.01, '1profile.jpg', '1cin.pdf', '1bac.pdf', '1notes.pdf', 'GI', 15.01);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pwd`, `role`) VALUES
(1, 'AYMANE', 'ATIGUI', 'aymane@atigui.com', '$2y$10$nP.z58ipEi7oQwmE0T2QNeilykdmckCLZ1nIoecp7hFAirsQ56/2G', 'student'),
(2, 'AYMANE', 'ATIGUI', 'aymane@admin.com', '$2y$10$nP.z58ipEi7oQwmE0T2QNeilykdmckCLZ1nIoecp7hFAirsQ56/2G', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cne` (`cne`),
  ADD UNIQUE KEY `cin` (`cin`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
