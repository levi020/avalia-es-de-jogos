-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 22-Out-2024 às 12:20
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jogos`
--
CREATE DATABASE IF NOT EXISTS `jogos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jogos`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `cargo` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `senha`, `cargo`) VALUES
(1, 'levi', '961b6dd3ede3cb8ecbaacbd68de040cd78eb2ed5889130cceb4c49268ea4d506', 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(600) NOT NULL,
  `senha` varchar(600) NOT NULL,
  `nomeCliente` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `senha`, `nomeCliente`) VALUES
(1, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '31b8092add37a97f1baeb5892ea511b717654a4b7704a26b8b4892cba5c790e0', 'levi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogoscadastrados`
--

DROP TABLE IF EXISTS `jogoscadastrados`;
CREATE TABLE IF NOT EXISTS `jogoscadastrados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDoJogo` varchar(50) NOT NULL,
  `admin` varchar(80) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `image1` varchar(678) NOT NULL,
  `image2` varchar(678) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogoscadastrados`
--

INSERT INTO `jogoscadastrados` (`id`, `nomeDoJogo`, `admin`, `descricao`, `image1`, `image2`) VALUES
(1, 'occult Mountain', 'levi', 'occult mountain Ã© um jogo em desenvolvimento ', 'uploads/occult Mountain-2024-10-17-5197.png', 'uploads/occult Mountain-2024-10-17-5197.png'),
(3, 'aaa', 'levi', 'bdbe', 'uploads/aaa-2024-10-17-9102.png', 'uploads/aaa-2024-10-17-9102.png'),
(4, 'gelda', 'levi', 'aa', 'uploads/gelda-2024-10-18-6299.png', 'uploads/gelda-2024-10-18-8540.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `like_deslike`
--

DROP TABLE IF EXISTS `like_deslike`;
CREATE TABLE IF NOT EXISTS `like_deslike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_jogo` int(11) NOT NULL,
  `likeOrDeslike` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `like_deslike`
--

INSERT INTO `like_deslike` (`id`, `id_user`, `id_jogo`, `likeOrDeslike`) VALUES
(1, 1, 1, -1),
(2, 1, 3, 1),
(3, 1, 4, -1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
