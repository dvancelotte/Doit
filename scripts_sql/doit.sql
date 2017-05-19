-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Maio-2017 às 04:34
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `cod_func` int(10) NOT NULL,
  `nome_func` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cod_status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`cod_func`, `nome_func`, `email`, `senha`, `cod_status`) VALUES
(1, 'Kleber', 'kleberlcaldas@gmail.com', '698dc19d489c4e4db73e28a713eab07b', 1),
(2, 'Deborah', 'deborah@teste.com', '3d9188577cc9bfe9291ac66b5cc872b7', 1),
(3, 'Piettro', 'piettro@teste.com', '3d9188577cc9bfe9291ac66b5cc872b7', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_func`
--

CREATE TABLE `status_func` (
  `cod_status` int(10) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_func`
--

INSERT INTO `status_func` (`cod_status`, `tipo`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'GERENTE'),
(3, 'COLABORADOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`cod_func`),
  ADD KEY `cod_status` (`cod_status`);

--
-- Indexes for table `status_func`
--
ALTER TABLE `status_func`
  ADD PRIMARY KEY (`cod_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `cod_func` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status_func`
--
ALTER TABLE `status_func`
  MODIFY `cod_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `cod_status` FOREIGN KEY (`cod_status`) REFERENCES `status_func` (`cod_status`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
