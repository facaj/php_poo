-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2023 às 21:52
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aula_pos_poo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `database_name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `application` varchar(255) NOT NULL,
  `informations` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `configs`
--

INSERT INTO `configs` (`id`, `host`, `username`, `password`, `database_name`, `owner`, `driver`, `application`, `informations`) VALUES
(4, 'localhost', 'root', '', 'teste', 'Francisco', 'mysql', 'Aula POO', 'Aluno: Francisco Albuquerque'),
(5, 'sdf', '2', '3', '4', '5', 'mysql', '6', '7');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
