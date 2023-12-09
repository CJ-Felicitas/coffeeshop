-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2023 at 12:22 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshop`
--
drop database if exists 'coffeeshop';
create database coffeeshop;
-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_name`(250)),
  KEY `product_id` (`product_name`(250))
);

INSERT INTO `orders` (`id`, `customer_name`, `product_name`, `product_price`) VALUES
(11, 'asd', 'lakjsdlaskjd', '999999.00'),
(12, 'asd', 'isog na kape', '234234.00'),
(13, 'cj', 'isog na kape', '234234.00');

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_description` text,
  PRIMARY KEY (`id`)
);

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_description`) VALUES
(36, 'lakjsdlaskjd', 999999, 'sdkfsdkljf'),
(35, 'isog na kape', 234234, 'skljfdslfk'),
(34, 'Matcha', 1000000, 'alskdjalskdj'),
(33, 'Caramel', 23432432, 'delicious');
