-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2021 at 08:49 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP SCHEMA IF EXISTS dws_juguetes;
CREATE SCHEMA dws_juguetes;
USE dws_juguetes;
SET AUTOCOMMIT=0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dws_juguetes`
--

-- --------------------------------------------------------

--
-- Table structure for table `juguetes`
--

CREATE TABLE `juguetes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `juguetes`
  ADD PRIMARY KEY (`id`);