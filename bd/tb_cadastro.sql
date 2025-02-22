-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2025 at 06:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tb_cadastro` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id usuario',
  `nm_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL UNIQUE,
  `senha_usuario` varchar(100) NOT NULL,
  `termos_uso` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_usuario` varchar(250) NOT NULL,
  `ft_usuario` varchar(255) DEFAULT NULL,  -- Campo foto não obrigatório
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_usuario` (`email_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

COMMIT;
