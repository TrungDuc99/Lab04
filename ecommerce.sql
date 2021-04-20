-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 05:43 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CateID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CateID`, `CategoryName`, `Description`) VALUES
(1, 'Điện thoại', 'Điện thoại Iphone'),
(2, 'Laptop', 'Laptop Dell'),
(3, 'Ipad', 'Ipad Pro 11 màn hình siêu thực'),
(16, 'Tai nghe', 'thiet bi am thanh');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(255) DEFAULT NULL,
  `menu_link` varchar(500) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `DetailID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE IF NOT EXISTS `orderproduct` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderDate` datetime NOT NULL,
  `ShipDate` datetime NOT NULL,
  `ShipName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ShipAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CateID` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Picture` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES
(1, 'asus a111', 1, 100000, 9, 'mô tả', 'uploads/20210109015929takeout.jpg'),
(2, 'Galaxy A10', 1, 2000000, 10, 'là sản phẩm tiên tiến', 'uploads/20210109015929takeout.jpg'),
(3, '', 0, 0, 0, '', 'uploads/20210420030309Penguins.jpg'),
(4, '', 0, 0, 0, '', 'uploads/20210420030309Penguins.jpg'),
(6, 'Tablet', 2, 20000000, 100, 'Dòng sản phẩm ưa chuộng của giới trẻ', 'uploads/20210420030309Penguins.jpg'),
(7, '', 0, 0, 0, '', 'uploads/20210420030309Penguins.jpg'),
(16, 'hdhhd', 1, 55000, 55, 'jajad', 'uploads/20210109015957takeout.jpg'),
(18, 'qwe', 2, 111111111111, 5, 'qweqwe', 'uploads/20210420030854Chrysanthemum.jpg'),
(19, 'aaaaa', 1, 22222222, 4, '222222', 'uploads/20210420053114Penguins.jpg'),
(20, 'qwe', 1, 111111111111, 3, '234324', 'uploads/20210420053200Tulips.jpg'),
(21, 'sda', 1, 44444, 3, '234324', 'uploads/20210420053232Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Password`) VALUES
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(2, 'Mobiele', 'quang@gamil.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Nhut Quang', 'quang@gmail.com', 'b857eed5c9405c1f2b98048aae506792'),
(4, '1', '2', 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'Mobiele', 'quang@gamil.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Nhut Quang', 'quang@gmail.com', 'b857eed5c9405c1f2b98048aae506792'),
(7, '1', '2', 'd41d8cd98f00b204e9800998ecf8427e'),
(8, 'Mobiele', 'quang@gamil.com', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'Nhut Quang', 'quang@gmail.com', 'b857eed5c9405c1f2b98048aae506792');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
