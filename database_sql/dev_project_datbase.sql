-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2023 at 09:36 PM
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
-- Database: `dev_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite_laptops`
--

DROP TABLE IF EXISTS `favorite_laptops`;
CREATE TABLE IF NOT EXISTS `favorite_laptops` (
  `id` int NOT NULL AUTO_INCREMENT,
  `laptop_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `laptop_id` (`laptop_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `favorite_laptops`
--

INSERT INTO `favorite_laptops` (`id`, `laptop_id`, `user_id`) VALUES
(70, 10, 64),
(47, 41, 64),
(46, 42, 64),
(69, 6, 64),
(68, 4, 67),
(75, 1, 68),
(72, 3, 82);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pcid` int DEFAULT NULL,
  `order_img` int DEFAULT NULL,
  `url_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `pcid`, `order_img`, `url_img`) VALUES
(1, 24, 1, 'assets/img/IMG-6485c1f424c168.10219246.png'),
(2, 24, 2, 'assets/img/IMG-6485c2ae84ae00.55507702.png'),
(3, 24, 3, 'assets/img/IMG-6485c2bb009720.67686126.png'),
(4, 24, 4, 'assets/img/IMG-6485c2c57fc5b4.10995782.png'),
(5, 25, 1, 'assets/img/IMG-6485c48474ff87.26237330.jpg'),
(6, 25, 2, 'assets/img/IMG-6485c49736e999.28118545.jpg'),
(8, 25, 3, 'assets/img/IMG-6485c5043c3ac1.31265300.jpg'),
(9, 25, 4, 'assets/img/IMG-6485c5125e5bc1.97168817.jpg'),
(10, 26, 1, 'assets/img/IMG-6485c55ab844a8.25019975.png'),
(11, 26, 2, 'assets/img/IMG-6485c5666a8917.99215536.png'),
(12, 26, 3, 'assets/img/IMG-6485c5713d6dc7.18438110.png'),
(13, 26, 4, 'assets/img/IMG-6485c57be81b45.84271387.png'),
(14, 28, 1, 'assets/img/IMG-6485c642bfbff7.96948095.png'),
(15, 28, 2, 'assets/img/IMG-6485c65498f491.21868617.png'),
(16, 28, 3, 'assets/img/IMG-6485c6618b60b0.40900552.png'),
(17, 28, 4, 'assets/img/IMG-6485c66fd9ff04.01028841.png'),
(18, 29, 1, 'assets/img/IMG-6485c6976d5172.35110311.png'),
(19, 29, 2, 'assets/img/IMG-6485c6a7c63c18.93624860.png'),
(20, 29, 3, 'assets/img/IMG-6485c6b589e590.86175395.png'),
(21, 29, 4, 'assets/img/IMG-6485c6c1cc4241.40897095.png'),
(22, 30, 1, 'assets/img/IMG-6485c6da455159.32678592.png'),
(23, 30, 2, 'assets/img/IMG-6485c6e87cf998.78534088.png'),
(24, 30, 3, 'assets/img/IMG-6485c6f91e9374.53604704.png'),
(25, 30, 4, 'assets/img/IMG-6485c7090739d0.09118458.png'),
(26, 18, 1, 'assets/img/IMG-6485d0b72a0300.24693659.png'),
(27, 18, 2, 'assets/img/IMG-6485d0c67ff133.82093439.png'),
(28, 18, 3, 'assets/img/IMG-6485d0d7c68509.19874644.png'),
(29, 18, 4, 'assets/img/IMG-6485d0ec298e29.40626972.png'),
(30, 19, 1, 'assets/img/IMG-6485d54fcf51e1.60570690.png'),
(31, 19, 2, 'assets/img/IMG-6485d5630ab550.52960750.png'),
(32, 19, 3, 'assets/img/IMG-6485d575e6e4d0.61577383.png'),
(33, 19, 4, 'assets/img/IMG-6485d5849fc5f3.07305721.png'),
(34, 20, 1, 'assets/img/IMG-6485d6a6e04441.95281557.png'),
(35, 20, 2, 'assets/img/IMG-6485d6b8419915.05502962.png'),
(36, 20, 3, 'assets/img/IMG-6485d6c9249b82.48148639.png'),
(37, 20, 4, 'assets/img/IMG-6485d6d8050b83.35312039.png'),
(38, 21, 1, 'assets/img/IMG-6485d7b0e9aa07.05313586.png'),
(39, 21, 2, 'assets/img/IMG-6485d7c27e6003.83250883.png'),
(43, 21, 3, 'assets/img/IMG-6485d9dc1b7c23.54690022.png'),
(44, 21, 4, 'assets/img/IMG-6485d9f1c1a833.68751000.png'),
(45, 17, 1, 'assets/img/IMG-6485ec882e82c5.74523890.png'),
(46, 17, 2, 'assets/img/IMG-6485ec978c3317.38785272.png'),
(47, 17, 3, 'assets/img/IMG-6485ecc4bd81e6.63200822.png'),
(48, 17, 4, 'assets/img/IMG-6485ecd1a3edc7.93058982.png'),
(49, 16, 1, 'assets/img/IMG-6485eea38754a8.27823023.jpg'),
(50, 16, 2, 'assets/img/IMG-6485eeb26f8ee1.76102670.jpg'),
(51, 16, 3, 'assets/img/IMG-6485eec0c26585.83502113.jpg'),
(52, 16, 4, 'assets/img/IMG-6485eecbda0ba6.98476848.jpg'),
(53, 22, 1, 'assets/img/IMG-6485ef1e423d40.68450512.jpg'),
(54, 22, 2, 'assets/img/IMG-6485ef2ac963b7.12094859.jpg'),
(55, 22, 3, 'assets/img/IMG-6485ef4193e6c0.36089780.jpg'),
(56, 22, 4, 'assets/img/IMG-6485ef4dc634b1.57059714.jpg'),
(57, 23, 1, 'assets/img/IMG-6485ef7fe378b9.26353537.jpeg'),
(58, 23, 2, 'assets/img/IMG-6485ef8e6300f0.40556830.jpeg'),
(59, 23, 3, 'assets/img/IMG-6485ef9da76856.34089357.jpg'),
(60, 23, 4, 'assets/img/IMG-6485efa949f757.64086928.jpg'),
(61, 11, 1, 'assets/img/IMG-6485f0a6e9ff74.24386828.jpg'),
(62, 11, 2, 'assets/img/IMG-6485f0b409a1d8.01201230.jpg'),
(63, 11, 3, 'assets/img/IMG-6485f0c29c68f7.10275418.jpg'),
(64, 11, 4, 'assets/img/IMG-6485f0ce316005.22275788.jpg'),
(66, 12, 1, 'assets/img/IMG-6485f65da46330.77590577.jpg'),
(67, 12, 2, 'assets/img/IMG-6485f66e569401.76471133.jpg'),
(68, 12, 3, 'assets/img/IMG-6485f67c866665.76495744.jpg'),
(69, 12, 4, 'assets/img/IMG-6485f6a682b7b6.72792203.jpg'),
(70, 13, 1, 'assets/img/IMG-6485f793063b55.53146309.jpg'),
(71, 13, 2, 'assets/img/IMG-6485f7a4c4e6c6.11372318.jpg'),
(72, 13, 3, 'assets/img/IMG-6485f7b26c1f55.47419140.jpg'),
(73, 13, 4, 'assets/img/IMG-6485f7c15fe760.47472085.jpg'),
(74, 14, 1, 'assets/img/IMG-6485f8de2e8912.83273861.jpg'),
(75, 14, 2, 'assets/img/IMG-6485f8f21feef0.30147606.jpg'),
(76, 14, 3, 'assets/img/IMG-6485f904058502.35175075.jpg'),
(77, 14, 4, 'assets/img/IMG-6485f912a3cee2.06217135.jpg'),
(78, 15, 1, 'assets/img/IMG-6485f98d0e2a75.35871631.jpg'),
(79, 15, 2, 'assets/img/IMG-6485f998e76519.76633291.jpg'),
(80, 15, 3, 'assets/img/IMG-6485f9a38223c5.44982089.jpg'),
(81, 15, 4, 'assets/img/IMG-6485f9b271d538.09806680.jpg'),
(82, 10, 1, 'assets/img/IMG-6485fb302ddfe3.94256469.jpg'),
(83, 10, 2, 'assets/img/IMG-6485fb3d2ac372.61206996.jpg'),
(84, 10, 3, 'assets/img/IMG-6485fb4a4036a0.20820474.jpg'),
(85, 10, 4, 'assets/img/IMG-6485fb56d165c4.55473385.jpg'),
(86, 8, 1, 'assets/img/IMG-6485fc459e65b6.56404765.jpg'),
(87, 8, 2, 'assets/img/IMG-6485fc52c4fd50.62465311.jpg'),
(88, 8, 3, 'assets/img/IMG-6485fc5f153ba2.81085557.jpg'),
(89, 8, 4, 'assets/img/IMG-6485fc6cedad26.89126246.jpg'),
(90, 7, 1, 'assets/img/IMG-6485fd1bbe3c07.15182238.png'),
(91, 7, 2, 'assets/img/IMG-6485fd2ac4ad25.02702458.png'),
(92, 7, 3, 'assets/img/IMG-6485fd3b28b340.04055240.png'),
(93, 7, 4, 'assets/img/IMG-6485fd45b25335.99981510.png'),
(94, 9, 1, 'assets/img/IMG-6485fecfe1ee58.35692891.jpg'),
(95, 9, 2, 'assets/img/IMG-6485fee1112345.42060912.jpg'),
(96, 9, 3, 'assets/img/IMG-6485ff082cd0f2.30799977.jpg'),
(97, 9, 4, 'assets/img/IMG-6485ff290e10d8.59080992.jpg'),
(98, 6, 1, 'assets/img/IMG-64860045833d40.04315928.jpg'),
(99, 6, 2, 'assets/img/IMG-648600550b0432.58360988.jpg'),
(100, 6, 3, 'assets/img/IMG-64860065d72e31.27578367.jpg'),
(101, 6, 4, 'assets/img/IMG-648600779bab88.59436382.jpg'),
(102, 5, 1, 'assets/img/IMG-648601b53fca56.48010614.jpg'),
(103, 5, 2, 'assets/img/IMG-648601c14d6d46.25004828.jpg'),
(104, 5, 3, 'assets/img/IMG-64860228280ac0.58718042.jpg'),
(105, 5, 4, 'assets/img/IMG-64860239a3c477.54783205.jpg'),
(106, 4, 1, 'assets/img/IMG-648603972c20c3.43148141.jpg'),
(107, 4, 2, 'assets/img/IMG-648603afe96246.53381120.jpg'),
(108, 4, 3, 'assets/img/IMG-648603c0156e53.59120207.jpg'),
(109, 4, 4, 'assets/img/IMG-648603cc58c399.47579943.jpg'),
(110, 3, 1, 'assets/img/IMG-6486049ccb50a5.18201378.jpg'),
(111, 3, 2, 'assets/img/IMG-648604ae07ac66.36712093.jpg'),
(112, 3, 3, 'assets/img/IMG-648604bfc0d6f7.37929479.jpg'),
(113, 3, 4, 'assets/img/IMG-648604dc7c5467.83974574.jpg'),
(114, 2, 1, 'assets/img/IMG-6486060aa840a8.73844894.jpg'),
(115, 2, 2, 'assets/img/IMG-6486061f80e7f1.39639606.jpg'),
(116, 2, 3, 'assets/img/IMG-6486062c3f70b5.91602815.jpg'),
(117, 2, 4, 'assets/img/IMG-6486063d87c4e3.48993030.jpg'),
(118, 1, 1, 'assets/img/IMG-648606fc950197.39727418.jpg'),
(119, 1, 2, 'assets/img/IMG-6486070f7c05f4.35863538.jpg'),
(120, 1, 3, 'assets/img/IMG-6486071b122ff5.07812346.jpg'),
(121, 1, 4, 'assets/img/IMG-648607274fa904.97283043.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

DROP TABLE IF EXISTS `laptops`;
CREATE TABLE IF NOT EXISTS `laptops` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) DEFAULT NULL,
  `product_line` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `description` varchar(555) DEFAULT NULL,
  `year_of_production` varchar(25) DEFAULT NULL,
  `cpu_brand` varchar(255) DEFAULT NULL,
  `cpu_level` varchar(255) DEFAULT NULL,
  `full_cpu_name` varchar(355) DEFAULT NULL,
  `ram_type` varchar(255) DEFAULT NULL,
  `available_ram_sizes` varchar(255) DEFAULT NULL,
  `available_storage_capacity` varchar(255) DEFAULT NULL,
  `gpu_internal_name` varchar(255) DEFAULT NULL,
  `double_gpu` tinyint(1) DEFAULT NULL,
  `gpu_external` varchar(255) DEFAULT NULL,
  `gpu_external_vram` varchar(255) DEFAULT NULL,
  `display_resolution` varchar(255) DEFAULT NULL,
  `display_size` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `good_for` varchar(255) DEFAULT NULL,
  `touch_screen` tinyint(1) DEFAULT NULL,
  `convertible` tinyint(1) DEFAULT NULL,
  `operating_system` varchar(255) DEFAULT NULL,
  `available_colors` varchar(255) DEFAULT NULL,
  `minimum_price` int DEFAULT NULL,
  `maximum_price` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `brand`, `product_line`, `full_name`, `description`, `year_of_production`, `cpu_brand`, `cpu_level`, `full_cpu_name`, `ram_type`, `available_ram_sizes`, `available_storage_capacity`, `gpu_internal_name`, `double_gpu`, `gpu_external`, `gpu_external_vram`, `display_resolution`, `display_size`, `weight`, `good_for`, `touch_screen`, `convertible`, `operating_system`, `available_colors`, `minimum_price`, `maximum_price`) VALUES
(1, 'Lenovo', 'Yoga', 'Yoga C940', 'The Lenovo Yoga C940 is a premium 2-in-1 laptop with a sleek design and a flexible hinge that allows it to be used in multiple modes..', '2019', 'Intel', 'i7', 'Intel Core i7-1065G7: 4 cores, 8 threads, base clock speed of 1.3 GHz, max turbo frequency of 3.9 GHz, 8 MB cache', 'LPDDR4X', '8GB,16GB', '256GB,512GB', 'Intel Iris Plus Graphics', 0, 'null', 'null', 'UHD', '14', '1.35kg', 'Entertainment, Business', 1, 1, 'Windows 10', 'Iron Gray,Mica', 1200, 1800),
(2, 'Lenovo', 'ThinkPad', 'ThinkPad X1 Carbon', 'The Lenovo ThinkPad X1 Carbon is a high-end business laptop with a durable carbon fiber design and long battery life.', '2020', 'Intel', 'i7', 'Intel Core i7-10510U: 4 cores, 8 threads, base clock speed of 1.8 GHz, max turbo frequency of 4.9 GHz, 8 MB cache', 'LPDDR3', '8GB,16GB', '256GB,512GB', 'Intel UHD Graphics', 0, 'null', 'null', 'FHD', '14', '1.09kg', 'Business', 0, 0, 'Windows 10 Pro', 'Black', 1400, 2200),
(3, 'Lenovo', 'Legion', 'LENOVO Y920 LEGION', 'The Lenovo Y920 Legion is a high-performance gaming laptop designed for serious gamers..', '2017', 'Intel', 'i7 7th', 'Intel Core i7-7820HK: 4 cores, 8 threads, base clock speed of 2.9 GHz, max turbo frequency of 3.9 GHz.', 'DDR4', '16GB', '256GB,1TB', 'NVIDIA GTX 1070', 0, 'null', 'null', '1920x1080', '17.3', '4.6kg', 'Gaming', 0, 0, 'Windows 10', 'Black', 1649, 1999),
(4, 'Lenovo', 'IdeaPad', 'IdeaPad 3', 'The Lenovo IdeaPad 3 is a budget-friendly laptop with a 15.6-inch FHD display, up to an Intel Core i7-1065G7 processor, up to 12GB of DDR4 memory, and up to 1TB of HDD storage. It also features a webcam privacy shutter for added security.', '2020', 'Intel', 'Core i7', 'Intel Core i7-1065G7: 4 cores, 8 threads, base clock speed of 1.3 GHz, max turbo frequency of 3.9 GHz, 8 MB of cache.', 'DDR4', '4GB,8GB,12GB', '128GB,256GB,512GB,1TB', 'Intel Iris Plus Graphics', 0, 'null', 'null', '1920x1080', '15.6', '1.85kg', 'Entertainment', 0, 0, 'Windows 10', 'Abyss Blue,Business Black,Platinum Grey', 369, 699),
(5, 'HP', 'ZBook', 'ZBook Studio G7 2020', 'The HP ZBook Studio G7 is a powerful and sleek mobile workstation designed for creative professionals who demand high performance and portability. It features Intel Core i9 processors, NVIDIA Quadro graphics.', '2020', 'Intel', 'Core i9', 'Intel Core i9-10885H: 8 cores, 16 threads, base clock speed of 2.4 GHz, max turbo frequency of 5.3 GHz.', 'DDR4', '8GB,16GB,32GB,64GB,128GB', '256GB,512GB,1TB,2TB', 'NVIDIA Quadro RTX 5000', 0, 'null', 'null', '4K', '15.6', '2Kg', 'design,gaming', 0, 0, 'Windows 10 Pro', 'silver', 2799, 7799),
(6, 'HP', 'Spectre', 'Spectre x360 14 2021', 'The HP Spectre x360 14 is a premium 2-in-1 laptop with a sleek design and impressive performance. It features the latest Intel Core processors,', '2021', 'Intel', 'Core i5,Core i7', 'Intel Core i5-1135G7: 4 cores, 8 threads, base clock speed of 2.4 GHz, max turbo frequency of 4.2 GHz.Intel Core i7-1165G7: 4 cores, 8 threads, base clock speed of 2.8 GHz, max turbo frequency of 4.7 GHz.', 'LPDDR4X', '8GB,16GB', '256GB,512GB,1TB', 'Intel Iris Xe Graphics', 0, 'null', 'null', '3K', '14', '1.3Kg', 'entertainment,business', 1, 1, 'Windows 10 Home', 'nightfall black,natural silver', 1299, 1699),
(7, 'HP', 'Omen', 'Omen 15', 'The HP Omen 15 is a high-performance gaming laptop with a sleek design and powerful hardware. It features the latest Intel or AMD processors, fast SSD storage, and high-end Nvidia or AMD graphics.', '2021', 'Intel', 'i7 11th', 'Intel Core i7-11800H: 8 cores, 16 threads, base clock speed of 2.3 GHz, max turbo frequency of 4.6 GHz, 24.5 MB of cache.', 'DDR4', '8GB,16GB,32GB', '512GB,1TB', 'Nvidia GeForce RTX 3070', 0, 'null', 'null', 'FHD', '15', '2.37kg', 'Gaming', 0, 0, 'Windows 10', 'black', 1299, 2799),
(8, 'HP', 'Envy', 'Envy 13', 'The HP Envy 13 is a premium ultrabook with a sleek design and powerful hardware. It features the latest Intel or AMD processors, fast SSD storage, and a high-quality display for multimedia and productivity.', '2021', 'Intel', 'i7 11th', 'Intel Core i7-1165G7: 4 cores, 8 threads, base clock speed of 2.8 GHz, max turbo frequency of 4.7 GHz, 12 MB of cache.', 'DDR4', '8GB,16GB', '512GB,1TB', 'Intel Iris Xe Graphics', 0, 'null', 'null', 'FHD', '13.3', '1.3kg', 'Entertainment, Business', 1, 0, 'Windows 10', 'black,silver', 899, 1499),
(9, 'HP', 'Pavilion', 'Pavilion 15 2021', 'The HP Pavilion 15 is a mid-range laptop that offers solid performance and a stylish design. It features AMD Ryzen processors, up to 16GB of RAM, up to 512GB of SSD storage, and a 15.6-inch Full HD display. The laptop also comes with a backlit keyboard and support for Windows Hello facial recognition.', '2021', 'AMD', 'Ryzen 5, Ryzen 7', 'AMD Ryzen 5 -5600H: 6 cores, 12 threads, base clock speed of 3.3 GHz, max boost clock of 4.2 GHz, 16 MB of cache.', 'DDR4', '8GB,16GB', '256GB,512GB', 'AMD Radeon Graphics', 0, 'null', 'null', 'FHD', '15.6', '1.75 kg', 'Entertainment,Business', 0, 0, 'Windows 10', 'Silver,Black', 600, 800),
(10, 'HP', 'Elite', 'Elite Dragonfly', 'The HP Elite Dragonfly is a premium business laptop that features a lightweight and stylish design. It comes with a powerful 11th Gen Intel Core processor, up to 16GB of RAM, up to 2TB of SSD storage, and a 13.3-inch Full HD display. The laptop also features a 360-degree hinge and a long battery life of up to 24.5 hours.', '2021', 'Intel', 'Core i5, Core i7', 'Intel Core i7-1185G7: 4 cores, 8 threads, base clock speed of 3.0 GHz, max turbo frequency of 4.8 GHz.', 'LPDDR4x', '8GB,16GB', '256GB,512GB,1TB,2TB', 'Intel Iris Xe Graphics', 0, 'null', 'null', 'FHD', '13.3', '0.9kg', 'Business', 1, 1, 'Windows 10 Pro', 'blue,silver', 1600, 2500),
(11, 'Dell', 'Alienware m15 R5', 'Alienware m15 R5 2021', 'The Alienware m15 R5 is a high-performance gaming laptop with the latest Intel Core processors, fast SSD storage, and a powerful NVIDIA GeForce RTX graphics card. It also features a 15.6-inch Full HD display with a 360Hz refresh rate for smooth and fluid gameplay.', '2021', 'Intel', 'Core i7', 'Intel Core i7-11800H: 8 cores, 16 threads, base clock speed of 2.3 GHz, max turbo frequency of 4.6 GHz.', 'DDR4', '16GB,32GB', '256GB,512GB,1TB,2TB', 'NVIDIA GeForce RTX 3060', 1, 'NVIDIA GeForce RTX 3070', '8GB', 'FHD', '15.6', '2.5kg', 'Gaming', 0, 0, 'Windows 10', 'Black', 1500, 2500),
(12, 'Dell', 'Inspiron', 'Dell Inspiron G3 15 3500 gaming 2021', 'The Dell Inspiron G3 15 3500 is a budget-friendly gaming laptop that offers solid performance and a sleek design.', '2021', 'Intel', 'Core i5, Core i7', 'Intel Core i7-10750H: 6 cores, 12 threads, base clock speed of 2.6 GHz, max turbo frequency of 5.0 GHz.', 'DDR4', '8GB,16GB', '256GB,512GB,1TB,2TB', 'NVIDIA GeForce GTX 1650', 1, 'NVIDIA GeForce GTX 1660 Ti', '6GB', 'FHD', '15.6', '2.3kg', 'Gaming', 0, 0, 'Windows 10', 'Black', 800, 1200),
(13, 'Dell', 'Latitude', 'Dell Latitude 7320 Detachable 2021', 'The Dell Latitude 7320 Detachable is a highly portable 2-in-1 laptop with a detachable keyboard and a high-resolution display. It features the latest Intel Core processors, fast SSD storage, and long battery life, making it a great choice for business professionals on-the-go.', '2021', 'Intel', 'i7', 'Intel Core i7-1180G7: 4 cores, 8 threads, base clock speed of 1.8 GHz, max turbo frequency of 4.6 GHz.', 'DDR4', '16GB,32GB', '256GB,1TB', 'Intel Iris Xe Graphics', 0, 'null', 'null', '1920x1280', '13.3', '1.44 kg', 'Business', 1, 1, 'Windows 10 Pro', 'Black,Silver', 1499, 2499),
(14, 'Dell', 'Precision', 'Dell Precision 5750 2021', 'The Dell Precision 5750 is a powerful workstation laptop with a sleek design and top-of-the-line hardware, making it ideal for demanding tasks such as video editing and 3D modeling.', '2021', 'Intel', 'i9 11th', 'Intel Core i9-11900K: 8 cores, 16 threads, base clock speed of 3.5 GHz, max turbo frequency of 5.3 GHz.', 'ddr4', '32GB,64GB', '1TB,2TB', 'Nvidia Quadro RTX 5000', 0, 'null', 'null', '4k', '17.0', '2.08kg', 'design,programming', 0, 0, 'Windows 10 Pro', 'silver', 2799, 6999),
(15, 'Dell', 'XPS', 'Dell XPS 13 9315 2022', 'The Dell XPS 13 9315 is a premium ultrabook with a compact design and excellent performance. It features the latest 11th generation Intel Core processors, fast SSD storage, and a vibrant display.', '2022', 'Intel', 'i7 11th', 'Intel Core i7-1185G7: 4 cores, 8 threads, base clock speed of 3.0 GHz, max turbo frequency of 4.8 GHz.', 'lpddr4x', '8GB,16GB', '256GB,512GB', 'Intel Iris Xe Graphics', 0, 'null', 'null', '3k', '13.4', '1.27kg', 'business,entertainment', 1, 1, 'Windows 11 Home', 'platinum silver,forst', 1299, 1999),
(16, 'Asus', 'ROG Zephyrus', 'Asus ROG Zephyrus G14 2021', 'The Asus ROG Zephyrus G14 is a compact gaming laptop with a powerful AMD Ryzen 9 5900HS processor and NVIDIA GeForce RTX 3060 graphics card. It also features a fast 120Hz display, ample storage options, and a sleek design that s easy to carry around.', '2021', 'AMD', 'Ryzen 9-5900HS', 'AMD Ryzen 9-5900HS: 8 cores, 16 threads, base clock speed of 3.0 GHz, max boost clock of 4.6 GHz, 16 MB of cache.', 'DDR4', '16GB,32GB', '1TB', 'NVIDIA GeForce RTX 3060', 0, 'null', 'null', '1080p', '14', '1.6kg', 'Gaming', 0, 0, 'Windows 10', 'Gray', 1200, 1700),
(17, 'ASUS', 'Expert Book B9', 'ASUS Expert Book B9 2021', 'The ASUS Expert Book B9 is a slim and lightweight business laptop that packs a punch with its 11th Gen Intel Core processors, fast SSD storage, and long battery life. It features a 14-inch FHD display and a durable design that can withstand everyday use.', '2021', 'Intel', 'i7 11th Gen', 'Intel Core i7-1185G7: 4 cores, 8 threads, base clock speed of 3.0 GHz, max turbo frequency of 4.8 GHz, 12 MB of cache.', 'DDR4', '16GB, 32GB', '1TB, 2TB', 'Intel Iris Xe Graphics', 0, 'null', 'null', 'FHD', '14', '880g', 'Business', 0, 0, 'Windows 10 Pro', 'Black, Blue', 1699, 2499),
(18, 'ASUS', 'ProArt StudioBook PRO 17 W700', 'ASUS ProArt StudioBook PRO 17 W700 2021', 'The ASUS ProArt StudioBook PRO 17 W700 is a powerful mobile workstation designed for creative professionals. It features a 17-inch 4K UHD display with 100% Adobe RGB color gamut, NVIDIA Quadro RTX 3000 graphics, and an Intel Core i7-10875H processor. It also has up to 64GB of DDR4 RAM and up to 4TB of SSD storage for blazing-fast performance and storage.', '2021', 'Intel', 'i7 10th Gen', 'Intel Core i7-10875H: 8 cores, 16 threads, base clock speed of 2.3 GHz, max turbo frequency of 5.1 GHz, 16 MB of cache.', 'DDR4', '16GB,32GB,64GB', '1TB,2TB,4TB', 'NVIDIA Quadro RTX 3000', 0, 'null', 'null', '4K,UHD', '17', '2.39kg', 'Design, Entertainment', 0, 0, 'Windows 10 Pro', 'Grey', 2999, 4999),
(19, 'Asus', 'TUF Gaming', 'TUFGamingF15 2022', 'The Asus TUF Gaming F15 is a powerful gaming laptop designed for the ultimate gaming experience. It features the latest Intel or AMD processors, fast SSD storage, and a high-refresh-rate display for smooth and fluid gameplay.', '2022', 'Intel ', 'i7 ', 'Intel Core i7-11800H ', 'DDR4', '16GB,32GB', '512GB,1TB', 'NVIDIA GeForce RTX 3050 or 3060', 0, 'null', 'null', '1080p', '15.6', '2.3kg', 'Gaming', 1, 0, 'Windows 10 or Windows 11', 'Black,Gray', 1000, 1500),
(20, 'Asus', 'VivoBook', 'Asus VivoBook 15 2023', 'The Asus VivoBook 15 is a budget-friendly laptop with a 15.6 inch display and a thin and light design. It features the latest Intel or AMD processors, up to 16 GB of RAM and up to 1 TB of storage, making it a good choice for everyday use and productivity tasks.', '2023', 'Intel', 'i5', 'Intel Core i5-11600H: 6 cores, 12 threads, base clock speed of 2.9 GHz, max turbo frequency of 4.8 GHz.', 'DDR4', '4GB,8GB,16GB', '256GB,512GB,1TB', 'Intel UHD Graphics', 1, 'Nvidia GeForce MX450', '2HN', 'FHD', '15.6', '1.8kg', 'productivity,entertainment', 0, 0, 'Windows 10', 'black,silver,blue,red', 500, 900),
(21, 'Asus', 'ZenBook', 'Asus ZenBook 14 2022', 'The Asus ZenBook 14 is a premium ultrabook with a 14 inch display and a sleek and stylish design. It features the latest Intel or AMD processors, up to 16 GB of RAM and up to 1 TB of storage, making it a good choice for professionals and power users.', '2022', 'Intel', 'i7', 'Intel Core i7-1165G7: 4 cores, 8 threads, base clock speed of 2.8 GHz, max turbo frequency of 4.7 GHz.', 'LPDDR4X', '8GB,16GB,32GB', '512GB,1TB', 'Intel Iris Xe Graphics', 1, 'Nvidia GeForce MX450', '2GB', 'FHD', '14', '1.17kg', 'productivity,design', 1, 0, 'Windows 11', 'blue,silver', 1200, 1800),
(22, 'Apple', 'MacBook Air', 'Apple MacBook Air 2022', 'The MacBook Air is a sleek and lightweight laptop with Apple s M2 chip for powerful performance and long battery life. It features a Retina display with True Tone technology, Touch ID for secure login, and Thunderbolt ports for fast data transfer.', '2022', 'Apple', 'M2', 'Apple M2-chip: 8-core CPU with 4 performance cores and 4 efficiency cores, 8-core GPU, and 16-core Neural Engine', 'LPDDR4X', '8GB,16GB', '256GB,512GB,1TB,2TB', 'Apple M2', 0, 'null', ' null', '2.5K', '13.3', '1.29kg', 'Business,Entertainment', 1, 1, 'macOS Monterey', 'Silver,Space Gray,Gold', 999, 1999),
(23, 'Apple', 'MacBook Pro', 'Apple MacBook Pro 2021', 'The MacBook Pro is a high-performance laptop designed for professionals. It features Apple s M1 Pro or M1 Max chip, a stunning 16-inch Retina display.', '2021', 'Apple', 'M1 Pro, M1 Max', 'Apple M1-Pro: 10-core CPU with 8 performance cores and 2 efficiency cores, 16-core GPU', 'LPDDR5', '16GB,32GB,64GB', '512GB,1TB,2TB,4TB,8TB', 'Apple M1 Pro, M1 Max', 1, 'AMD Radeon Pro GPU', '8GB,16GB,32GB', '2.5K', '16', '2.2kg', 'Design,Programming, Gaming', 0, 0, 'macOS Monterey', 'Silver,Space Gray', 2399, 6699),
(24, 'Acer', 'Aspire 5', 'Acer Aspire 5 2022', 'The Acer Aspire 5 is a mid-range laptop with a sleek design and a range of hardware options. It features a fast CPU, upgradable RAM and storage, and a Full HD display.', '2022', 'Intel', 'i5 11th', 'Intel Core i5-1135G7: 4 cores, 8 threads, base clock speed of 2.4 GHz, max turbo frequency of 4.2 GHz.', 'DDR4', '4GB,8GB,16GB,32GB', '256GB,512GB,1TB,2TB', 'Intel Iris Xe Graphics', 0, 'null', 'null', 'FHD', '15.6', '1.65kg', 'Entertainment,Business', 0, 0, 'Windows 10', 'Black,Silver', 500, 800),
(25, 'Acer', 'Chromebook Spin 713', 'Acer Chromebook Spin 713 2021', 'The Acer Chromebook Spin 713 is a high-end Chromebook that is ideal for students and professionals who need a powerful and versatile device. It features a fast CPU, long battery life, and a 2K display.', '2021', 'Intel', 'i5 10th', 'Intel Core i5-10210U: 4 cores, 8 threads, base clock speed of 1.6 GHz, max turbo frequency of 4.2 GHz.', 'LPDDR4X', '8go,16go,32go', '256go,512go 1to', 'Intel UHD Graphics', 0, 'null', 'null', '2K', '13.5', '1.37kg', 'Entertainment, Business', 1, 1, 'Chrome OS', 'Gray', 600, 1000),
(26, 'Acer', 'ConceptD 3 Ezel', 'Acer ConceptD 3 Ezel 2021', 'The Acer ConceptD 3 Ezel is a high-end laptop that is designed for content creators and professionals who need a versatile and powerful device. It features a fast CPU, dedicated GPU, and a 4K display.', '2021', 'Intel', 'i7 11th', 'Intel Core i7-1165G7: 4 cores, 8 threads, base clock speed of 2.8 GHz, max turbo frequency of 4.7 GHz.', 'DDR4', '16go| 32go', '512go| 1to', 'NVIDIA GeForce GTX 1650', 1, 'NVIDIA GeForce RTX 3050', '4go', '4K', '14', '1.68kg', 'Design, Entertainment', 1, 1, 'Windows 10', 'White', 1500, 2000),
(28, 'Acer', 'Predator Helios 300', 'Acer Predator Helios 300 2021', 'The Acer Predator Helios 300 is a powerful gaming laptop with a 240Hz display and NVIDIA GeForce RTX 3080 graphics card for immersive gameplay.', '2021', 'Intel', 'i7 11th', 'Intel Core i7-11800H: 8 cores, 16 threads, base clock speed of 2.3 GHz, max turbo frequency of 4.6 GHz, 24 MB Intel Smart Cache', 'DDR4', '16go,32go', '512go,1to', 'NVIDIA', 1, 'GeForce RTX 3070', '8go', '1080p', '15.6', '2.5kg', 'Gaming', 0, 0, 'Windows 10', 'Black', 1200, 1800),
(29, 'Acer', 'Swift 5', 'Acer Swift 5 2022', 'The Acer Swift 5 is a sleek and lightweight laptop designed for portability and productivity, featuring an 11th Gen Intel Core processor and a long-lasting battery.', '2022', 'Intel', 'i7 11th', 'Intel Core i7-1165G7: 4 cores, 8 threads, base clock speed of 2.8 GHz, max turbo frequency of 4.7 GHz, 12 MB Intel Smart Cache', 'LPDDR4X', '8go,16go', '512go,1to', 'Intel', 0, 'null', 'null', '1440p', '14', '0.92kg', 'Business, Entertainment', 1, 1, 'Windows 11', 'Gold, Silver', 900, 1200),
(30, 'Acer', 'TravelMate P2', 'Acer TravelMate P2 2019', 'The Acer TravelMate P2 is a durable and reliable laptop designed for business professionals, featuring a 10th Gen Intel Core processor and a range of security features.', '2019', 'Intel', 'i5 10th', 'Intel Core i5-10210U: 4 cores, 8 threads, base clock speed of 1.6 GHz, max turbo frequency of 4.2 GHz, 6 MB Intel Smart Cache', 'DDR4', '4go,8go,16go', '256go,512go,1to', 'Intel', 0, 'null', 'null', '1080p', '14', '1.8kg', 'Business', 0, 0, 'Windows 10', 'Black', 600, 900);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pcid` int NOT NULL,
  `ownerid` int NOT NULL,
  `comment` text,
  `stars` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pcid` (`pcid`),
  KEY `ownerid` (`ownerid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pcid`, `ownerid`, `comment`, `stars`, `created_at`) VALUES
(9, 24, 64, 'so nice', NULL, '2023-06-12 11:54:08'),
(10, 24, 64, 'wooooow', NULL, '2023-06-12 11:54:19'),
(11, 24, 64, 'i lov it', NULL, '2023-06-12 11:54:26'),
(12, 24, 64, 'nothing better than it', NULL, '2023-06-12 11:54:35'),
(13, 24, 64, 'my name hamza and i did it', NULL, '2023-06-12 12:13:05'),
(14, 24, 62, 'hiiiii jdfghjklkjhgfdghjkl;kjhgf its meeeee', NULL, '2023-06-12 12:16:02'),
(15, 24, 62, '', NULL, '2023-06-12 12:19:09'),
(16, 25, 62, 'its meee', NULL, '2023-06-12 13:37:38'),
(17, 11, 64, 'very good laptop i love it!', NULL, '2023-06-12 21:06:08'),
(18, 19, 64, 'nice', NULL, '2023-06-12 21:30:20'),
(19, 24, 68, 'it is me yousra and i liked this laptop so much', NULL, '2023-06-12 21:31:27'),
(20, 24, 67, 'i love it', NULL, '2023-06-12 21:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Passwordy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(555) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `Passwordy`, `img`) VALUES
(60, 'hamza khribech', 'hamzakhribech@gmail.com', '454354654654', 'users_profile/IMG-646240dff25c29.69534099.jpg'),
(61, 'mizo', 'fejjefkjefe@gmail.com', 'defkjhwlejf', 'users_profile/IMG-6462450414c5e0.25497331.jpeg'),
(62, 'someone', 'hamzaton@gmail.com', 'hamza', 'users_profile/IMG-64871578650a08.26664171.jpg'),
(63, 'gggggggggggggg', 'gggggggggggggggggg@gmail.com', 'ejlfbalerkrj', 'users_profile/IMG-64624e7443e4c3.67457883.jpeg'),
(64, 'hamza khribech', 'hamzakhribech45@gmail.com', 'hamza', 'users_profile/IMG-64878a65550d46.45279726.jpg'),
(65, 'hamzaaaaa', 'hamzat@gmail.com', 'jkdhfjdhfjhj', 'users_profile/IMG-64628d48d25f62.41614378.jpg'),
(66, 'hamza hamza', 'hamzahamza@gmail.com', 'hamzahamza', 'users_profile/IMG-64873dcc468417.16861804.jpg'),
(67, 'mohamed zaim', 'mohamedzaim@gmail.com', 'mohamedmohamed', 'users_profile/IMG-648786fe973ed5.53093118.jpg'),
(68, 'yousra mansour', 'yousramansour@gmail.com', 'yousrayousra', 'users_profile/IMG-648789042fe616.32397551.jpg'),
(79, 'yousra mansourr', 'yousramansourar@gmail.com', 'yousrayousr', 'users_profile/IMG-64878bda1107e8.58340770.jpg'),
(81, 'hamz a', 'hamzzza@g.com', 'hamzahmza', 'users_profile/IMG-64878c44dabe48.83818560.jpg'),
(82, 'zaim mohamed', 'zaimzaim@gmail.com', 'zaimzaimzaim', 'users_profile/IMG-64878ce6c44bb7.59992444.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
