-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 09, 2021 at 03:51 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_chant_g3`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidature`
--

CREATE TABLE `candidature` (
  `id` int(11) NOT NULL,
  `chanson` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidature`
--

INSERT INTO `candidature` (`id`, `chanson`, `auteur`, `duree`, `email`, `validation`) VALUES
(1, 'dedzz', 'dzdzdz', '02:02:00', '0', 0),
(2, 'all i want for a christmas is you', 'maria carey', '03:25:00', '0', 0),
(3, 'all i want for a christmas is you', 'maria carey', '03:25:00', '0', 0),
(4, 'La Main verte', 'Marc Lavoine', NULL, 'yoann@yoann.com', 0),
(5, 'La main verte', 'Tryo', NULL, 'er@er.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `cree_le` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `dateDeNaissance`, `telephone`, `email`, `pseudo`, `pass`, `isAdmin`, `cree_le`) VALUES
(4, 'pierre', 'pierre', '1999-05-05', '0606060606', 'pierre@pierre.com', 'pierre', '$2y$12$K3urIOfS1bxmfJ1Ahd6mzuhoaOzl0.wqDCVkBq1mNiDIgswFsjQR.', 0, '2021-12-02 08:06:38'),
(5, 'yan', 'yan', '1987-09-02', '0605060506', 'yan@yan.com', 'yan', '$2y$12$13k2MVSQ/Y7XtPpd5ZQoye26vgAJ7zvBRynF/4cTT.V69ZiBrYNtK', 0, '2021-12-08 14:15:34'),
(6, 'flo', 'flo', '1998-02-02', '0606060606', 'flo@flo.com', 'flo', '$2y$12$wL77ggntu27sxIrXVhYhHutJh/DtLxtqPDQoTSaFBlM5Y1l2AJLgi', 0, '2021-12-08 14:19:03'),
(7, 'yo', 'yo', '1998-02-02', '0606060606', 'yo@yo.com', 'yo', '$2y$12$IGxrgLqML1mPL6yI/96ReeucNf7r5.i4NnJ69.dAzztgAIZxoWKXK', 0, '2021-12-08 14:24:13'),
(8, 'yoa', 'yoa', '1998-02-02', '0606060606', 'yoa@yoa.com', 'yoa', '$2y$12$89OatE8SE1lWibk1PqdmDe5.sS7Ny18jFM333NBDYo1bPUt46Y9CK', 0, '2021-12-08 14:27:13'),
(9, 'yoan', 'yoan', '1998-02-02', '0606060606', 'yoan@yoan.com', 'yoan', '$2y$12$hsB7xCzDYVMidJVrdumdS.3ySpqfs3G8MsvIOUv0CQZJuL9xQGJ86', 0, '2021-12-08 14:28:20'),
(11, 'er', 'er', '1998-02-02', '0606060606', 'er@er.com', 'er', '$2y$12$I9U8QaP76PI.493MpTV/1eFl32BNbG.N8iUDUyz.d8xngAlwMeZ8i', 0, '2021-12-09 12:50:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
