-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql12-farm36.kinghost.net
-- Tempo de geração: 20/04/2024 às 18:07
-- Versão do servidor: 5.5.62-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `cacshop04`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Pessoas`
--

CREATE TABLE IF NOT EXISTS `Pessoas` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Ativo` tinyint(1) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Salario` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `Pessoas`
--

INSERT INTO `Pessoas` (`Id`, `Nome`, `Ativo`, `DataNascimento`, `Salario`) VALUES
(1, 'Fabio1', 1, '1971-04-13', 10300.51),
(2, 'Miguel', 1, '2004-07-06', 5020.6),
(4, 'nome2', 1, '2002-02-01', 1002.42);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Pessoas`
--
ALTER TABLE `Pessoas`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Pessoas`
--
ALTER TABLE `Pessoas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
