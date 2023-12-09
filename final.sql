DROP DATABASE IF EXISTS coffeeshop;
CREATE DATABASE coffeeshop;

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
