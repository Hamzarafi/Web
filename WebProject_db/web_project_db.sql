-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2020 at 12:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `email` varchar(100) COLLATE ascii_bin NOT NULL,
  `pid` int(11) NOT NULL,
  `comment` varchar(250) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`email`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`email`, `pid`, `comment`) VALUES
('hasankasal@gmail.com', 1, 'cok kotu'),
('haciibrahim@outlook.com', 2, 'bayildim'),
('mahpeykerkaya@gmail.com', 3, 'memnun kaldim'),
('yunusdemir@gmail.com', 4, 'tavsiye ederim'),
('hasankasal@gmail.com', 5, 'sorunsuz'),
('haciibrahim@outlook.com', 6, 'apple kalitesi'),
('mahpeykerkaya@gmail.com', 7, 'herkese tavsiye ederim'),
('yunusdemir@gmail.com', 8, 'basta tereddut ettim ama gercekten cok basarili bu fiyata'),
('hasankasal@gmail.com', 9, 'fotograftaki gibi'),
('haciibrahim@outlook.com', 10, 'kaliteli'),
('mahpeykerkaya@gmail.com', 11, 'bozuk urun gonderildi.Iade edecegim'),
('yunusdemir@gmail.com', 12, 'bu fiyata bu urun inanilmaz'),
('hasankasal@gmail.com', 13, 'kargoyla gelmesi uzun surdu'),
('haciibrahim@outlook.com', 14, 'mukemmel'),
('mahpeykerkaya@gmail.com', 15, 'bu fiyata daha iyi urunler alinabilir. Tavsiye etmiyorum.'),
('hasankasal@gmail.com', 3, '&lt;a&gt;'),
('altan@gamil.com', 15, 'nice product');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `email` varchar(100) COLLATE ascii_bin NOT NULL,
  `pid` varchar(100) COLLATE ascii_bin NOT NULL,
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`email`, `pid`, `oid`) VALUES
('hasankasal@gmail.com', '2,3', 1),
('altan@gamil.com', '3,4,13', 2),
('sdf', 'asdfasd', 4),
('sdf', 'asdfasd', 3),
('sfd', 'asdfasd', 5),
('sfd', 'asdfasd', 7);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `category` varchar(100) COLLATE ascii_bin NOT NULL,
  `brand` varchar(100) COLLATE ascii_bin NOT NULL,
  `title` varchar(100) COLLATE ascii_bin NOT NULL,
  `price` int(11) NOT NULL,
  `properties` varchar(250) COLLATE ascii_bin NOT NULL,
  `rating` int(11) NOT NULL,
  `promotional` varchar(5) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `brand`, `title`, `price`, `properties`, `rating`, `promotional`) VALUES
(1, 'phone', 'Iphone', 'Iphone 10s', 10999, 'its an iphone no need to explain', 5, 'no'),
(2, 'phone', 'Samsung', 'Samsung Note 10', 10199, 'android phone', 5, 'no'),
(3, 'TV', 'LG', 'LG 55uk6470', 3899, '4K ultra hd TV', 4, 'no'),
(4, 'TV', 'Vestel', 'Vestel 43fb5000', 1899, 'Full Hd LED Tv', 3, 'no'),
(5, 'PC', 'Dell', 'Dell XPS 15 9570', 14999, 'CPU: 8th-gen Intel Core i7-8750H CPU\r\nGPU: Nvidia GeForce GTX 1050 Ti Max-Q\r\nRAM: 16GB DDR4/2,666MHz\r\nDisplay: 15.6-inch 1920x1080 IPS non-touch screen with anti-reflective coating\r\nStorage: 256GB Toshiba NVMe drive\r\nBattery: 97 Watt-hour', 5, 'yes'),
(6, 'PC', 'Apple', 'Macbook Pro 13', 12999, 'CPU: 1.4GHz Intel Core i5\r\nGraphics: Intel Iris Plus Graphics 645\r\nRAM: 16GB (2,133MHz LPDDR3)\r\nScreen: 13.3-inch, 2,560 x 1,600 Retina display (backlit LED, IPS, 500 nits brightness, wide color P3 gamut)\r\nStorage: 2TB SSD', 5, 'yes'),
(7, 'phone', 'Xiaomi', 'Redmi Note 8 64 GB', 1599, '64 GB', 3, 'no'),
(8, 'phone', 'Oppo', 'Oppo A9', 2499, '128 GB storage 4 gb ram', 4, 'yes'),
(9, 'phone', 'Huawei', 'Huawei Mate 20', 5799, '128 gb', 4, 'no'),
(10, 'TV', 'Hi Level', 'Hi Level 32HL530', 849, '32\" TV', 2, 'no'),
(12, 'TV', 'Regal', 'Regal 32R4020HT', 895, '32\" tv', 4, 'no'),
(13, 'PC', 'Dell', 'Dell Alienware M15', 15699, 'Intel Core i7 8750H 16GB 1TB + 512GB SSD RTX2070 Windows 10 Home 15.6\" FHD ', 5, 'no'),
(14, 'PC', 'Lenovo', 'Lenovo Legion Y530-15ICH', 8999, 'Lenovo Legion Y530-15ICH Intel Core i7 8750H 16GB 1TB + 128GB SSD GTX1050 Ti Freedos 15,6\" FHD', 4, 'no'),
(15, 'PC', 'Asus', 'Asus FX705DU-AU037', 7599, 'AMD Ryzen 7 3750H 8GB 1TB + 128GB SSD GTX1660Ti Freedos 17.3\'\' FHD', 5, 'yes'),
(1200, 'TV', 'Sony', '56&quot; TV', 1000, 'Screen', 3, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) COLLATE ascii_bin NOT NULL,
  `name` varchar(100) COLLATE ascii_bin NOT NULL,
  `address` varchar(100) COLLATE ascii_bin NOT NULL,
  `password` varchar(50) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `address`, `password`) VALUES
('hasankasal@gmail.com', 'Hasan Kasal', 'Ankara', 'hasan'),
('haciibrahim@outlook.com', 'Haci Ibrahim', 'istanbul', 'haci'),
('mahpeykerkaya@gmail.com', 'Mahpeyker Kaya', 'Istanbul', 'mahpey'),
('yunusdemir@gmail.com', 'Yunus Demir', 'Konya', 'yunus'),
('admin@admin.com', 'System admin', '-', 'securepass'),
('altan@gamil.com', '12345', 'altan', 'aghs');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
