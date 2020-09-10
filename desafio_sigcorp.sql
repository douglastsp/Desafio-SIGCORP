-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2020 at 06:28 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desafio_sigcorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `desafio.eventos`
--

DROP TABLE IF EXISTS `desafio.eventos`;
CREATE TABLE IF NOT EXISTS `desafio.eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `qtd_pessoas` int(11) NOT NULL,
  `lote` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desafio.eventos`
--

INSERT INTO `desafio.eventos` (`id`, `tema`, `local`, `data`, `hora`, `qtd_pessoas`, `lote`) VALUES
(8, 'Php', 'Santo André', '2020-09-30', '17:23:00', 500, 'Não informado'),
(4, 'Java', 'Santa Catarina ', '2020-09-15', '06:10:00', 3, '1° Lote'),
(9, 'Node', 'Maranhão', '2020-09-29', '19:59:00', 100, '1° Lote'),
(7, 'Teste', 'Santo André', '2020-09-22', '16:30:00', 4, '2° Lote'),
(12, 'React', 'Rio de Janeiro', '2020-09-21', '15:00:00', 60, '1° Lote'),
(11, 'React Native', 'Rio de Janeiro', '2020-09-23', '15:00:00', 30, '1° Lote');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
