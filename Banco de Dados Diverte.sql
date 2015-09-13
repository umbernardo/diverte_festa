-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Set-2015 às 08:18
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diverte`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `diverte_alugueis`
--

CREATE TABLE IF NOT EXISTS `diverte_alugueis` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_ESPACO` int(11) NOT NULL,
  `DATA` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_ESPACO` (`ID_ESPACO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `diverte_alugueis`
--

INSERT INTO `diverte_alugueis` (`ID`, `ID_USUARIO`, `ID_ESPACO`, `DATA`) VALUES
(2, 1, 2, '2015-09-06'),
(8, 1, 2, '2015-09-07'),
(9, 3, 1, '2015-09-03'),
(10, 3, 2, '2015-09-03'),
(11, 3, 2, '2015-09-03'),
(12, 4, 3, '2015-09-03'),
(13, 3, 4, '2015-09-05'),
(14, 3, 4, '2015-09-12'),
(15, 3, 4, '2015-09-19'),
(16, 3, 4, '2015-09-26'),
(17, 3, 1, '2015-09-17'),
(18, 5, 4, '2015-09-16'),
(19, 6, 1, '2015-09-07'),
(20, 6, 1, '2015-09-18'),
(21, 6, 1, '2015-09-25'),
(22, 6, 1, '2015-09-19'),
(23, 5, 4, '2015-10-07'),
(24, 3, 1, '2015-09-30'),
(25, 3, 1, '2015-09-24'),
(26, 3, 1, '2015-09-22'),
(27, 3, 2, '2015-11-13'),
(28, 3, 2, '2015-11-21'),
(29, 3, 2, '2015-11-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diverte_espaco`
--

CREATE TABLE IF NOT EXISTS `diverte_espaco` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  `ENDERECO` varchar(255) DEFAULT NULL,
  `PRECO` decimal(15,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `diverte_espaco`
--

INSERT INTO `diverte_espaco` (`ID`, `NOME`, `ENDERECO`, `PRECO`) VALUES
(1, 'Diverte Festa Cambuí', 'Rua Maria Monteiro, 290 - Cambuí - Campinas(SP)', '240.35'),
(2, 'Diverte Festa Taquaral', 'Rua Ari Barroso, 438 - Taquaral - Campinas(SP)', '221.10'),
(3, 'Diverte Festa Sousas', 'Avenida Cabo Oscar Rossin, 1132 - Sousas - Campinas(SP)', '210.00'),
(4, 'Diverte Festa Barao Geraldo', 'Avenida Santa Isabel, 330 - Barao Geraldo - Campinas(SP)', '180.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diverte_usuario`
--

CREATE TABLE IF NOT EXISTS `diverte_usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `TELEFONE` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `diverte_usuario`
--

INSERT INTO `diverte_usuario` (`ID`, `NOME`, `EMAIL`, `TELEFONE`) VALUES
(1, 'dasd', 'asdasd@dasd.casc', '123123'),
(2, '', '', ''),
(3, 'Gabriel Sousa Kraszczuk', 'gabrielkrasz@hotmail.com', '134442312'),
(4, 'sdhuashdh', 'ahduash@dhasuhda.c', '3123123'),
(5, 'adushduahus', 'sdasgda@asda', '1323123'),
(6, 'adasda', 'qweqwe@asdasd', '1323123');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `diverte_alugueis`
--
ALTER TABLE `diverte_alugueis`
  ADD CONSTRAINT `diverte_alugueis_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `diverte_usuario` (`ID`),
  ADD CONSTRAINT `diverte_alugueis_ibfk_2` FOREIGN KEY (`ID_ESPACO`) REFERENCES `diverte_espaco` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
