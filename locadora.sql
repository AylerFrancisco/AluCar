-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/09/2024 às 01:57
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
-- Banco de dados: `locadora`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--


CREATE TABLE `categoria` (
  `id_categoria` int(2) NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao`, `valor`) VALUES
(1, 'SUV', 200),
(2, 'Passeio', 100),
(3, 'Van', 270);

-- --------------------------------------------------------

--
-- Estrutura para tabela `exemplares`
--

CREATE TABLE `exemplares` (
  `id_exemplar` int(11) NOT NULL,
  `placa_veiculo` varchar(8) NOT NULL,
  `id_locacao` int(11) NOT NULL,
  `locado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `locacao`
--

CREATE TABLE `locacao` (
  `id_locacao` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor_total` float NOT NULL,
  `cpf_socio` varchar(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `socios`
--

CREATE TABLE `socios` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `user` text DEFAULT NULL,
  `senha` text DEFAULT NULL,
  `tipo_usuario` char(1) NOT NULL DEFAULT 'C',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`user`, `senha`, `tipo_usuario`, `email`) VALUES
('Admin User', '123', 'A', 'admin@example'),
('Cliente User', '123', 'C', 'cliente@example');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `placa` varchar(8) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `anoFabricacao` int(10) UNSIGNED DEFAULT NULL,
  `fabricante` varchar(30) DEFAULT NULL,
  `opcionais` text DEFAULT NULL,
  `motorizacao` varchar(50) NOT NULL,
  `valorBase` float NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `exemplares`
--
ALTER TABLE `exemplares`
  ADD PRIMARY KEY (`id_exemplar`);

--
-- Índices de tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id_locacao`);

--
-- Índices de tabela `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
