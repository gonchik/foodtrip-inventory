-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.3-m3-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema inventory
--

CREATE DATABASE IF NOT EXISTS inventory;
USE inventory;

--
-- Definition of table `configurations`
--

DROP TABLE IF EXISTS `configurations`;
CREATE TABLE `configurations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  `defaultValue` text NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  `isRequired` tinyint(1) NOT NULL,
  `type` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configurations`
--

/*!40000 ALTER TABLE `configurations` DISABLE KEYS */;
INSERT INTO `configurations` (`id`,`value`,`defaultValue`,`isVisible`,`isRequired`,`type`,`created`,`updated`,`name`) VALUES 
 (1,'1.3','1.3',1,1,'PERCENT','2010-10-13 06:05:17','2010-10-13 06:05:17','products.default.markup.rate');
/*!40000 ALTER TABLE `configurations` ENABLE KEYS */;


--
-- Definition of table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
CREATE TABLE `inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `cost` decimal(12,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `station_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventories`
--

/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;


--
-- Definition of table `inventory_items`
--

DROP TABLE IF EXISTS `inventory_items`;
CREATE TABLE `inventory_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory_items`
--

/*!40000 ALTER TABLE `inventory_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_items` ENABLE KEYS */;


--
-- Definition of table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_items`
--

/*!40000 ALTER TABLE `invoice_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_items` ENABLE KEYS */;


--
-- Definition of table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total_net_price` decimal(10,2) NOT NULL,
  `total_gross_price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `station_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;


--
-- Definition of table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `unit_cost` decimal(12,2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `description` text NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


--
-- Definition of table `purchase_order_request_items`
--

DROP TABLE IF EXISTS `purchase_order_request_items`;
CREATE TABLE `purchase_order_request_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `purchase_order_request_id` int(10) unsigned DEFAULT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_order_request_items`
--

/*!40000 ALTER TABLE `purchase_order_request_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order_request_items` ENABLE KEYS */;


--
-- Definition of table `purchase_order_requests`
--

DROP TABLE IF EXISTS `purchase_order_requests`;
CREATE TABLE `purchase_order_requests` (
  `id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `approvedBy` int(10) unsigned DEFAULT NULL,
  `cancelledBy` int(10) unsigned DEFAULT NULL,
  `dateCancelled` datetime DEFAULT NULL,
  `dateApproved` datetime DEFAULT NULL,
  `remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_order_requests`
--

/*!40000 ALTER TABLE `purchase_order_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order_requests` ENABLE KEYS */;


--
-- Definition of table `station_assignments`
--

DROP TABLE IF EXISTS `station_assignments`;
CREATE TABLE `station_assignments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `station_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `station_assignments`
--

/*!40000 ALTER TABLE `station_assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `station_assignments` ENABLE KEYS */;


--
-- Definition of table `station_prices`
--

DROP TABLE IF EXISTS `station_prices`;
CREATE TABLE `station_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `station_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `station_prices`
--

/*!40000 ALTER TABLE `station_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `station_prices` ENABLE KEYS */;


--
-- Definition of table `stations`
--

DROP TABLE IF EXISTS `stations`;
CREATE TABLE `stations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stations`
--

/*!40000 ALTER TABLE `stations` DISABLE KEYS */;
/*!40000 ALTER TABLE `stations` ENABLE KEYS */;


--
-- Definition of table `stations_users`
--

DROP TABLE IF EXISTS `stations_users`;
CREATE TABLE `stations_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `station_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stations_users`
--

/*!40000 ALTER TABLE `stations_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `stations_users` ENABLE KEYS */;


--
-- Definition of table `supplier_products`
--

DROP TABLE IF EXISTS `supplier_products`;
CREATE TABLE `supplier_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `cost` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_products`
--

/*!40000 ALTER TABLE `supplier_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplier_products` ENABLE KEYS */;


--
-- Definition of table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;


--
-- Definition of table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inventory_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `transaction_type` text NOT NULL,
  `old_cost` decimal(12,4) NOT NULL,
  `old_quantity` int(11) NOT NULL,
  `new_cost` decimal(12,4) NOT NULL,
  `new_quantity` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `transaction_number` text NOT NULL,
  `station_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `supervisor_id` int(10) unsigned DEFAULT NULL,
  `user_type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`username`,`password`,`created`,`updated`,`supervisor_id`,`user_type`) VALUES 
 (1,'admin','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-04 10:17:50','2010-09-04 13:05:57',NULL,'Admin'),
 (2,'supervisor','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-04 10:18:15','2010-09-04 13:06:02',NULL,'Supervisor'),
 (3,'seller','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-04 10:51:42','2010-09-14 14:18:57',2,'Seller'),
 (4,'seller2','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-05 02:01:05','2010-09-05 02:01:05',2,'Seller'),
 (5,'seller3','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-05 02:01:17','2010-09-05 02:01:17',2,'Seller'),
 (6,'supervisor2','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-05 02:01:30','2010-09-05 02:01:30',NULL,'Supervisor'),
 (7,'seller4','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-05 02:01:45','2010-09-05 02:01:45',6,'Seller'),
 (8,'seller5','0ebf68e880b86539f37d4b7eb8c0c7b67d478603','2010-09-05 02:01:54','2010-09-05 02:01:54',NULL,'Seller');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
