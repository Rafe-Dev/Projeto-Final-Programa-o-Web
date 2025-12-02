-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2025 às 21:53
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avaliacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `nome`, `email`, `avaliacao`) VALUES
(1, 'ALVARO LUIZ DE ALMEIDA SILVA', 'Lucaseabra@gmail.com', 'Tertuliano Marinho'),
(17, 'ALVARO LUIZ DE ALMEIDA SILVA', 'Lucaseabranz@gmail.com', 'MUITO LEGAL');

-- --------------------------------------------------------

--
-- Estrutura para tabela `duvidas`
--

CREATE TABLE `duvidas` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `numero` text NOT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `duvidas`
--

INSERT INTO `duvidas` (`id`, `nome`, `numero`, `mensagem`, `data_envio`) VALUES
(1, 'ALVARO LUIZ DE ALMEIDA SILVA', '(81)981612239', 'qual o seu objetivo?', '2025-12-01 03:10:20'),
(2, 'CARLOS HENRIQUE', '(81)981612239', 'como eu ligo meu notebook ?', '2025-12-01 14:25:53'),
(3, 'CARLOS HENRIQUE', '(81)981612239', 'como eu ligo meu notebook ?', '2025-12-01 14:26:54'),
(4, 'CARLOS HENRIQUE', '(81)981612239', 'como eu ligo meu notebook ?', '2025-12-01 14:32:46'),
(5, 'ALVARO LUIZ DE ALMEIDA SILVA', '(81)981612239', 'vbfgnfx nyrynfnfbdtbcbgfbgf', '2025-12-01 14:46:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `Nome`, `EMAIL`, `senha`) VALUES
(2, 'ALVARO LUIZ DE ALMEIDA SILVA', 'luizalvinho340@gmail.com', '2025unipe'),
(3, 'Lucas SEABRA', 'Lucaseabra@gmail.com', '19052006'),
(4, 'Lucas', 'Lucaseabra@gmail.com', '4243447578656'),
(5, 'ALVARO LUIZ DE ALMEIDA SILVA', 'luizalvinho340@gmail.com', '19052006'),
(6, 'ALVARO LUIZ DE ALMEIDA SILVA', 'luizalvinho340@gmail.com', '19052006'),
(7, 'ALVARO LUIZ DE ALMEIDA SILVA', 'Lucaseabra@gmail.com', '19052006'),
(8, 'ALVARO LUIZ DE ALMEIDA SILVA', 'Lucaseabra@gmail.com', '19052006'),
(9, 'ALVARO LUIZ DE ALMEIDA SILVA', 'Lucaseabra@gmail.com', '19052006'),
(10, 'ALVARO LUIZ DE ALMEIDA SILVA', 'Lucaseabra@gmail.com', '19052006'),
(11, 'ALVARO LUIZ DE ALMEIDA SILVA', 'Lucaseabra@gmail.com', '19052006');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `duvidas`
--
ALTER TABLE `duvidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `duvidas`
--
ALTER TABLE `duvidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
