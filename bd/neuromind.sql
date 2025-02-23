-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2025 at 12:13 AM
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
  `termos_uso` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Foto_Usuario` mediumblob DEFAULT NULL,
  `Nikname_Usuario` varchar(20) DEFAULT NULL,
  `Nr_Telefone` char(11) DEFAULT NULL,
  `Bios_Usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id`, `nome`, `email`, `senha`, `termos_uso`, `Foto_Usuario`, `Nikname_Usuario`, `Nr_Telefone`, `Bios_Usuario`) VALUES
(16, 'Vinícius WIlliam', 'vinicius@gmail.com', '$2y$10$ZJ94xRFwYZfH0pdbcViEre1zZCXvMNbjU/HubqKEOIkBj31fxIOv2', '0000-00-00 00:00:00', NULL, 'viníciuswilliam5685', NULL, NULL),
(18, 'João Gomes', 'jao@gmail.com', '$2y$10$hqqz9Dlv28zHGmtoAQfmNun2tTcRqyhVYNgeUd0VVI.rwO7oJqXgm', NULL, NULL, 'joãogomes7098', NULL, NULL),
(22, 'Leonardo', 'leozin1@gmail.com', '$2y$10$tYAAzMD24trqkSnQxPjKUex532mvGgC1KfeD3hRNfh1fC9m/JcvrK', '2025-02-23 22:30:12', NULL, 'leonardo2022', NULL, NULL),
(23, 'vitor', 'vitor@gmail.com', '$2y$10$JweNOyDG3EmziPIbky1oVOviq0Yky.8cEl5I2VMiAjSNqGktwsd5y', '2025-02-23 23:02:56', NULL, 'vitor3534', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
