-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Out-2020 às 11:26
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site`
--
CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `site`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id` int(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idade` varchar(20) NOT NULL,
  `peso` varchar(20) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `img` varchar(40) NOT NULL,
  `txt` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`id`, `nome`, `idade`, `peso`, `tipo`, `img`, `txt`) VALUES
(1, 'Greta', '3', '4', 'felino', 'cat01.jpg', 'Essa é a Greta, uma gatinha muito carinhosa que adorar brincar.'),
(3, 'Kira', '2', '4', 'felino', 'cat02.jpg', 'Essa é a Kira, uma gatinha muito carinhosa e esperta que adorar brincar.'),
(4, 'Serena', '3', '8', 'canino', 'dog01.jpg', 'Essa é a Serena, assim como seu nome é um cachorrinha super dócil e carinhosa.'),
(5, 'Maju', '1', '11', 'canino', 'dog02.jpg', 'Essa é a Maju, super companheira com humanos. Ideal para você que não possui outros animais.'),
(6, 'Valentino', '3', '5', 'felino', 'cat03.jpg', 'Esse é o Valetino, uma gatinha muito carinhoso que adorar receber carinho.'),
(7, 'Osmar', '1', '3', 'felino', 'cat04.jpg', 'Esse é o Osmar, uma filhote super bricalhão que adora colo.'),
(8, 'Piranga', '8', '10', 'canino', 'dog03.jpg', 'Esse é o Piranga, um cachorrinho super carinho que esta a muito tempo a procura de um lar.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recover_solicitation`
--

CREATE TABLE `recover_solicitation` (
  `id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `rash` varchar(200) NOT NULL,
  `status` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nivel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `telefone`, `endereco`, `usuario`, `senha`, `nivel`) VALUES
(40, 'Paulo', 'p.manoel.m@gmail.com', '11988888888', 'Rua são paulo', 'paulo91', '123456', NULL),
(41, 'Paulo', 'paulo.lima@aluno.ifsp.edu.br', '1122334455', 'rua, 01', 'paulo92', '123456', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recover_solicitation`
--
ALTER TABLE `recover_solicitation`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `recover_solicitation`
--
ALTER TABLE `recover_solicitation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
