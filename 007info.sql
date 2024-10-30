-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23/05/2024 às 13:17
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `007info`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cameras`
--

DROP TABLE IF EXISTS `cameras`;
CREATE TABLE IF NOT EXISTS `cameras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `camera_nome` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `porta` int NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `empresa` int NOT NULL,
  `localiza` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `sts` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cameras`
--

INSERT INTO `cameras` (`id`, `camera_nome`, `ip`, `porta`, `usuario`, `senha`, `empresa`, `localiza`, `imagem`, `sts`) VALUES
(27, 'camera 1', '10.109.2.11', 37777, 'admin', 'ccjKK12vcav', 25, 'sala 2', 'configuracoesdominioconger.PNG', 'Online'),
(28, 'camera 2', '10.109.2.31', 37777, 'admin', 'ccjKK12vcav', 25, 'sala 5', 'Semtitulo.png', 'Online'),
(56, 'camera 3', '10.109.2.16', 37777, 'admin', 'ccjKK12vcav', 25, 'sala 3', 'print_enfetec_ip.PNG', 'Online'),
(30, 'camera 1', '10.117.2.10', 37777, 'admin', '@WAinfo2020', 26, 'sala1', 'configuracoesdominioconger.PNG', 'Online'),
(31, 'camera 2', '10.117.2.11', 37777, 'admin', '@WAinfo2020', 26, 'sala 2', 'WhatsAppImage2023-10-07at07.24.41.jpeg', 'Online'),
(32, 'camera 3', '10.117.2.12', 37777, 'admin', '@WAinfo2020', 26, 'sala 3', '1669410019000.jpeg', 'Online'),
(33, 'camera 4', '10.117.2.14', 37777, 'admin', '@WAinfo2020', 26, 'sala 4', 'vetinova].PNG', 'Online'),
(34, 'camera 5', '10.117.2.15', 37777, 'admin', '@WAinfo2020', 26, 'sala 5', 'print_enfetec_ip.PNG', 'Offline'),
(35, 'camera 6', '10.117.2.16', 37777, 'admin', '@WAinfo2020', 26, 'sala 6', 'vetinova].PNG', 'Online'),
(36, 'camera 7', '10.117.2.18', 37777, 'admin', '@WAinfo2020', 26, 'sala 7', 'vetinova].PNG', 'Offline'),
(37, 'camera 8', '10.117.2.20', 37777, 'admin', '@WAinfo2020', 26, 'sala 8', '1669410019000.jpeg', 'Online'),
(38, 'camera 9', '10.117.2.22', 37777, 'admin', '@WAinfo2020', 26, 'sala 9', 'WhatsAppImage2023-10-07at07.25.31.jpeg', 'Online'),
(39, 'camera 10', '10.117.2.23', 37777, 'admin', '@WAinfo2020', 26, 'sala 10', '1669410018000.jpeg', 'Offline'),
(40, 'camera 11', '10.117.2.24', 37777, 'admin', '@WAinfo2020', 26, 'sala 11', 'Semtitulo.png', 'Online'),
(41, 'camera 12', '10.117.2.25', 37777, 'admin', '@WAinfo2020', 26, 'sala 12', 'print_enfetec_ip.PNG', 'Online'),
(42, 'camera 13', '10.117.2.26', 37777, 'admin', '@WAinfo2020', 26, 'sala 13', 'Capturar88.PNG', 'Online'),
(43, 'camera 14', '10.117.2.27', 37777, 'admin', '@WAinfo2020', 26, 'sala 14', 'chamado.PNG', 'Online'),
(44, 'camera 15', '10.117.2.28', 37777, 'admin', '@WAinfo2020', 26, 'sala 15', 'print_enfetec_ip.PNG', 'Online'),
(45, 'camera 16', '10.117.2.29', 37777, 'admin', '@WAinfo2020', 26, 'sala 16', '1669410018000.jpeg', 'Online'),
(46, 'camera 17', '10.117.2.30', 37777, 'admin', '@WAinfo2020', 26, 'sala 17', 'Semtitulo.png', 'Online'),
(47, 'camera 18', '10.117.2.31', 37777, 'admin', '@WAinfo2020', 26, 'sala 18', 'vetinova].PNG', 'Offline'),
(48, 'camera 19', '10.117.2.32', 37777, 'admin', '@WAinfo2020', 26, 'sala 19', 'Semtitulo.png', 'Online'),
(49, 'camera 20', '10.117.2.33', 37777, 'admin', '@WAinfo2020', 26, 'sala 20', '1669410018000.jpeg', 'Online'),
(50, 'camera 21', '10.117.2.34', 37777, 'admin', '@WAinfo2020', 26, 'sala 21', 'vetinova].PNG', 'Offline'),
(51, 'camera 22', '10.117.2.35', 37777, 'admin', '@WAinfo2020', 26, 'sala 22', 'Capturar88.PNG', 'Online'),
(52, 'camera 23', '10.117.2.36', 37777, 'admin', '@WAinfo2020', 26, 'sala 23', 'print_enfetec_ip.PNG', 'Online'),
(54, 'camera 24', '10.117.2.37', 37777, 'admin', '@WAinfo2020', 26, 'sala 24', 'print_enfetec_ip.PNG', 'Online'),
(55, 'camera 1', '10.200.255.252', 37777, 'admin', '@WAinfo2024', 24, 'Garagem', '1669410018000.jpeg', 'Online'),
(57, 'camera 4', '10.109.2.18', 37777, 'admin', 'ccjKK12vcav', 25, 'sala 4', 'print_enfetec_ip.PNG', 'Online');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `operante` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `cep`, `endereco`, `numero`, `telefone`, `operante`) VALUES
(25, 'Cooperbem', '78840000', 'x', 755, '123', 0),
(24, 'Digital Informática', '78840000', 'x', 778, '333', 0),
(26, 'JL Atacado', '78840000', 'x', 123, '32', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `radios`
--

DROP TABLE IF EXISTS `radios`;
CREATE TABLE IF NOT EXISTS `radios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `radio_nome` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `porta` int NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `localiza` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `radios`
--

INSERT INTO `radios` (`id`, `radio_nome`, `ip`, `porta`, `usuario`, `senha`, `empresa`, `localiza`) VALUES
(1, 'radio 1', '10.10.10.10', 56666, 'admin', '123123', '25', '0'),
(2, 'radio 1', '10.10.10.10', 56666, '3030', '3030', 'teste', 'sala 4'),
(3, 'radio teste', '10.20.30.40', 1019, 'teste', 'teste123', '25', 'sala 23'),
(4, 'radio teste', '10.20.30.40', 1019, 'teste', 'teste123', '25', 'sala 23'),
(5, 'radio teste', '10.20.30.40', 37777, 'admin', '123123', '25', 'sala teste'),
(6, 'radio teste', '10.20.30.40', 37777, 'admin', '123123', '25', 'sala teste'),
(7, 'radio teste', '10.20.30.40', 37777, 'admin', '123123', '25', 'sala teste'),
(8, 'radio teste', '10.20.30.40', 37777, 'admin', '123123', '25', 'sala teste'),
(9, 'radio teste', '10.20.30.40', 37777, 'admin', '123123', '25', 'sala teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `codigo` int NOT NULL,
  `acesso` int NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `sobrenome`, `codigo`, `acesso`, `senha`) VALUES
(2, 'Xexel', 'Xexel', 162509, 8294, '123'),
(3, 'Gabriel', 'Ziliotto', 141223, 5478, '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
