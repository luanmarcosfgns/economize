-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 29-Jan-2021 às 17:29
-- Versão do servidor: 10.3.27-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `computar_economize`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `listas`
--

INSERT INTO `listas` (`id`, `nome`, `descricao`, `created`, `modified`, `user_id`) VALUES
(1, 'Lista de Casa', 'Economizar', '2021-01-09 14:23:15', '2021-01-09 14:23:15', 6),
(10, 'Lista de Casa', 'Economizar', '2021-01-09 14:23:15', '2021-01-09 14:23:15', 3),
(11, 'GASOLINA', 'VER GASOLINA MAIS BARA NA CIDADE', '2021-01-26 12:22:03', '2021-01-26 12:22:03', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercados`
--

CREATE TABLE `mercados` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mercados`
--

INSERT INTO `mercados` (`id`, `nome`, `descricao`, `created`, `modified`, `user_id`) VALUES
(1, 'Rodrigues', 'Centro', '2021-01-09 14:23:15', '2021-01-09 14:23:15', 6),
(2, 'Piemon ', 'Castelo Branco', '2021-01-09 14:24:41', '2021-01-17 18:21:16', 6),
(3, 'Gonçalves', 'Castelo Branco', '2021-01-09 14:25:59', '2021-01-09 14:25:59', 6),
(4, 'Gama', 'Malaquita', '2021-01-09 14:27:19', '2021-01-09 14:27:19', 6),
(5, 'Hiper Central', 'Shopping', '2021-01-09 14:28:17', '2021-01-09 14:28:17', 6),
(6, 'Servilar', 'Centro', '2021-01-09 14:28:45', '2021-01-09 14:28:45', 6),
(7, 'Fabrícia', 'Rodoviária do Colono', '2021-01-09 14:29:35', '2021-01-09 14:29:35', 6),
(8, 'Jatai', 'Não sei', '2021-01-09 14:29:47', '2021-01-09 14:29:47', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE `precos` (
  `id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `mercado_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `precos`
--

INSERT INTO `precos` (`id`, `preco`, `produto_id`, `mercado_id`, `created`, `modified`, `user_id`) VALUES
(8, 20.00, 1, 1, '2021-01-16 14:38:23', '2021-01-16 14:38:23', 6),
(9, 1.00, 1, 1, '2021-01-16 14:41:38', '2021-01-16 14:41:38', 6),
(10, 20.00, 1, 1, '2021-01-16 14:44:54', '2021-01-16 14:44:54', 6),
(12, 3.00, 8, 1, '2021-01-17 15:27:49', '2021-01-17 15:27:49', 6),
(13, 10.00, 29, 1, '2021-01-17 15:28:01', '2021-01-17 15:28:01', 6),
(14, 5.00, 9, 1, '2021-01-17 15:28:12', '2021-01-17 15:28:12', 6),
(15, 15.00, 10, 1, '2021-01-17 15:28:25', '2021-01-17 15:28:25', 6),
(16, 0.99, 22, 1, '2021-01-17 15:28:42', '2021-01-17 15:28:42', 6),
(17, 13.99, 27, 1, '2021-01-17 15:28:56', '2021-01-17 15:28:56', 6),
(18, 2.00, 8, 2, '2021-01-17 15:29:11', '2021-01-17 15:29:11', 6),
(19, 15.00, 13, 2, '2021-01-17 15:29:20', '2021-01-17 15:29:20', 6),
(20, 20.00, 8, 2, '2021-01-17 15:29:27', '2021-01-17 15:29:27', 6),
(22, 25.00, 10, 2, '2021-01-17 15:30:09', '2021-01-17 15:30:09', 6),
(23, 7.00, 9, 2, '2021-01-17 15:31:06', '2021-01-17 15:31:06', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `lista_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `created`, `modified`, `lista_id`, `user_id`) VALUES
(8, 'Limao KG', 3.00, '2021-01-16 18:45:29', '2021-01-16 18:45:29', 1, 6),
(9, 'Laranja tomi', 3.00, '2021-01-16 18:45:43', '2021-01-16 18:45:43', 1, 6),
(10, 'Arroz PC', 2.00, '2021-01-17 12:38:22', '2021-01-17 12:38:22', 1, 6),
(11, 'FEIJÃO PC', 2.00, '2021-01-17 12:38:52', '2021-01-17 12:38:52', 1, 6),
(12, 'MIOJO PCT', 20.00, '2021-01-17 12:40:02', '2021-01-17 12:40:02', 1, 6),
(13, 'CARNE KG', 18.00, '2021-01-17 12:41:12', '2021-01-17 12:41:12', 1, 6),
(14, 'MAÇÃ KG', 4.00, '2021-01-17 12:42:08', '2021-01-17 12:42:08', 1, 6),
(15, 'ALCOOL GEL 5L', 1.00, '2021-01-17 12:42:55', '2021-01-17 12:42:55', 1, 6),
(16, 'AGUA SANITÁRIA 5L', 2.00, '2021-01-17 12:43:35', '2021-01-17 12:43:35', 1, 6),
(17, 'DETERGENTE  5L', 1.00, '2021-01-17 12:45:04', '2021-01-17 12:45:04', 1, 6),
(18, 'BATATA KG', 3.50, '2021-01-17 12:46:47', '2021-01-17 12:46:47', 1, 6),
(19, 'FERMENTO RC', 3.00, '2021-01-17 12:48:52', '2021-01-17 12:48:52', 1, 6),
(20, 'TRIGO PC', 3.00, '2021-01-17 12:53:58', '2021-01-17 12:53:58', 1, 6),
(21, 'BOMBRIL PC', 3.00, '2021-01-17 12:54:29', '2021-01-17 12:54:29', 1, 6),
(22, 'SABONETE ', 4.00, '2021-01-17 12:55:19', '2021-01-17 12:55:19', 1, 6),
(23, 'BUCHINHA UN', 2.00, '2021-01-17 12:56:28', '2021-01-17 12:56:28', 1, 6),
(24, 'EXTRATO DE TOMATE', 4.00, '2021-01-17 12:57:00', '2021-01-17 12:57:00', 1, 6),
(25, 'SABÃO EM PÓ PC 500G', 4.00, '2021-01-17 12:58:19', '2021-01-17 12:58:19', 1, 6),
(26, 'AMACIANTE  4L', 2.00, '2021-01-17 12:59:40', '2021-01-17 12:59:40', 1, 6),
(27, 'PINHO 2L', 2.00, '2021-01-17 13:00:30', '2021-01-17 13:00:30', 1, 6),
(28, 'OLÉO EMB', 4.00, '2021-01-17 13:02:16', '2021-01-17 13:02:16', 1, 6),
(29, 'ALHO KG', 1.00, '2021-01-17 13:02:52', '2021-01-17 13:02:52', 1, 6),
(30, 'ABSORVENTE  PCT 32 UNIDADES', 1.00, '2021-01-17 13:03:47', '2021-01-17 13:03:47', 1, 6),
(31, 'DESODORANTE AEROSOL UN', 2.00, '2021-01-17 13:05:35', '2021-01-17 13:05:35', 1, 6),
(32, 'CHOCOLATE  UN', 4.00, '2021-01-17 13:05:58', '2021-01-17 13:05:58', 1, 6),
(33, 'PIPOCA UN', 2.00, '2021-01-17 13:06:34', '2021-01-17 13:06:34', 1, 6),
(34, 'MISTURA DE BOLO UN', 8.00, '2021-01-17 13:08:39', '2021-01-17 13:08:39', 1, 6),
(35, 'TAPIOCA UN', 3.00, '2021-01-17 13:11:27', '2021-01-17 13:11:27', 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(6, '', '', 'ADM', '2021-01-23 15:06:20', '2021-01-23 15:06:20');


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mercados`
--
ALTER TABLE `mercados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `precos`
--
ALTER TABLE `precos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `mercados`
--
ALTER TABLE `mercados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `precos`
--
ALTER TABLE `precos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
