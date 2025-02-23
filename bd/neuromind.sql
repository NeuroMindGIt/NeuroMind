-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2025 at 05:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neuromind`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bairro`
--

CREATE TABLE `tb_bairro` (
  `Id_Bairro` int(11) NOT NULL,
  `Nm_Bairro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` text NOT NULL,
  `termos_uso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id`, `nome`, `email`, `senha`, `termos_uso`) VALUES
(1, 'Vinicius', 'vinicius@gmail.com', '$2y$10$zhSsrngYxJ.CeuGxVvfnXeIUoVF73.0ZZ/W0a91J5UJ4G1AR2/2Dq', '2025-02-23 01:39:15'),
(2, 'joao', 'jao@gmai.com', '$2y$10$G/5u7UdugIOCsbucmtl2wuaeMmktcccpOvH/ohQSKdp0R.BcnQ5k.', '2025-02-23 01:39:15'),
(3, 'leo', 'leo@gmail.com', '$2y$10$0UOyrvow1Ykxq8FiK6LEjOgMQCaGMpY8puzA9RjJzNkJTPwzqxn26', '2025-02-23 01:39:15'),
(4, 'kayky', 'kayky@gmail.com', '$2y$10$srQQ3EYb9sKY2b4milcJrOhsGXqsLQ29CVVhEyB6I8m.3OhwKnQi.', '2025-02-23 01:39:15'),
(6, 'richard', 'richard@gmail.com', '$2y$10$n8au/Rv7yagGGFwirrE1m.5/nbofdjHZT1UrcjNdDuYWd4FSznGgC', '2025-02-23 01:39:15'),
(7, 'kleber', 'kleber@gmail.com', '$2y$10$mdhJp1FiuKtd6NHvfMWGZu7PAz8ny95ME/IqHVLFajbyFP/atS.h6', '2025-02-23 01:39:15'),
(8, 'rui', 'rui@gmail.com', '$2y$10$gNIC.JBgFTb8Z/5w6sBete4qyR5aA7ikQLcJ9r1RuWbfrn6UEUfPm', '2025-02-23 01:46:32'),
(10, 'rui', 'ruin@gmail.com', '$2y$10$01ehXfwhE5UxszlPSam97uIiv5kSj0/7Ioa2f.Xl2qiQQX39hZphq', '2025-02-23 01:46:56'),
(11, 'luizz', 'uiz@gmail.com', '$2y$10$VqAJpljeGnw97p.eqLUMyOCtDtnjoqZHdk6Kd3UToOJHYFNvEas2q', '2025-02-23 02:18:14'),
(12, 'maisum', 'maisum@gmail.com', '$2y$10$mhf54PC4PWFq3dPZfDiavu43Gty1FG7zODWY8SgGQU9jSw1x7GVbi', '2025-02-23 02:37:30'),
(13, 'lulu', 'lulu@gmail.com', '$2y$10$HcgO3xvVJQFOOLkvr9t1iueo9OXvnEsGbtx2sO7LH2ziWycHlYAsC', '2025-02-23 03:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cidade`
--

CREATE TABLE `tb_cidade` (
  `Id_Cidade` int(11) NOT NULL,
  `Nm_Cidade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_estado`
--

CREATE TABLE `tb_estado` (
  `Id_Estado` int(11) NOT NULL,
  `Sg_Estado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
