-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for vehiclems
CREATE DATABASE IF NOT EXISTS `vehiclems` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `vehiclems`;

-- Dumping structure for table vehiclems.boats
CREATE TABLE IF NOT EXISTS `boats` (
  `id` int(11) NOT NULL,
  `hull_type` varchar(100) NOT NULL,
  `engine_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `boats_ibfk_1` FOREIGN KEY (`id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL,
  `number_of_doors` int(11) NOT NULL,
  `fuel_type` enum('Petrol','Diesel','Electric','Hybrid') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.planes
CREATE TABLE IF NOT EXISTS `planes` (
  `id` int(11) NOT NULL,
  `wing_span` decimal(5,2) NOT NULL,
  `engine_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `planes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','viewer') NOT NULL DEFAULT 'viewer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.vehicles
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL DEFAULT '',
  `make_year` year(4) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `vehicle_type_id` (`vehicle_type_id`),
  KEY `created_by` (`created_by`),
  KEY `FK_vehicles_companies` (`company_id`),
  KEY `FK_vehicles_vehicle_models` (`model_id`),
  CONSTRAINT `FK_vehicles_companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_vehicles_vehicle_models` FOREIGN KEY (`model_id`) REFERENCES `vehicle_models` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`),
  CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.vehicle_images
CREATE TABLE IF NOT EXISTS `vehicle_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`),
  CONSTRAINT `vehicle_images_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.vehicle_models
CREATE TABLE IF NOT EXISTS `vehicle_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `vehicle_models_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

-- Dumping structure for table vehiclems.vehicle_types
CREATE TABLE IF NOT EXISTS `vehicle_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
