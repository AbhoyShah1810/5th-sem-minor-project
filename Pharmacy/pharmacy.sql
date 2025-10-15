-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2022 at 02:31 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sale1`
--

CREATE TABLE IF NOT EXISTS `sale1` (
  `bill_id` int(10) NOT NULL AUTO_INCREMENT,
  `bill_date` varchar(30) NOT NULL,
  `bmonth` varchar(30) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sale1`
--

INSERT INTO `sale1` (`bill_id`, `bill_date`, `bmonth`) VALUES
(5, '2022-07-21', 'July');

-- --------------------------------------------------------

--
-- Table structure for table `sale2`
--

CREATE TABLE IF NOT EXISTS `sale2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bill_id` int(10) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `tprice` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bill_id` (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sale2`
--

INSERT INTO `sale2` (`id`, `bill_id`, `item_name`, `qty`, `price`, `tprice`) VALUES
(11, 5, 'Tedibar 75 gm', '2', '10', '20'),
(12, 5, 'Evocus H20', '3', '60', '180');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `qty_brought` varchar(30) NOT NULL,
  `imported_from` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `qty_sold` varchar(30) NOT NULL,
  `date` varchar(40) NOT NULL,
  `month` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `item_name`, `price`, `qty_brought`, `imported_from`, `category`, `qty_sold`, `date`, `month`) VALUES
(29, 'Otrivin', '335', '42', 'GSK', 'Nasal drops', '15', '1.03.2022', 'March'),
(30, 'Betadine', '207', '30', 'Alcon labs', 'Mint gargle', '7', '5.03.2022', 'March'),
(31, 'Inlife', '398', '55', 'Inlife Group', 'Tablets', '27', '8.03.2022', 'March'),
(32, 'Cofsils', '30', '100 strips', 'Cipla products', 'Tablets', '46 ', '9.03.2022', 'March'),
(33, 'Koflet-SF', '80', '76', 'Himalaya', 'Cough syrup', '47', '10.3.2022', 'March'),
(34, 'Bevon', '122', '35', 'Zuventus', 'Syrup', '17', '15.3.2022', 'March'),
(35, 'Zincovit', '108', '40', 'Apex Labs', 'Syrup', '32', '19.3.2022', 'March'),
(36, 'Limcee', '22', '90', 'Abbott', 'Vitamin C tablets', '50', '22.3.2022', 'March'),
(37, 'BD Ultra', '85', '145', 'BD &company', 'Syringe', '97', '27.3.2022', 'March'),
(38, 'NanPro 2', '660', '32', 'Nestle', 'Formula Powder', '25', '3.04.2022', 'April'),
(39, 'Allweknow', '339', '20', 'Mothercare', 'Baby oil', '18', '5.04.2022', 'April'),
(40, 'Volini 40 g', '123', '30', 'Sun Pharma', 'Pain Relief Spray', '22', '10.04.2022', 'April'),
(41, 'Digene', '107', '50', 'Abbott ', 'Gas Relief Syrup', '27', '14.04.2022', 'April'),
(42, 'Evocus H20', '100', '10', 'AV Organics', 'Alkaline water', '2', '20.04.2022', 'April'),
(43, 'Tedibar 75 gm', '150', '25', 'Curatio', 'Baby soap', '25', '22.04.2022', 'April'),
(44, 'Dermadew', '167', '20', 'HHP Pharma', 'Skincare cream', '12', '25.04.2022', 'April'),
(45, 'Candid Gel 15gm', '116', '35', 'Glenmark ', 'Skincare cream', '20', '27.04.2022', 'April'),
(46, 'Itone', '60', '70', 'Dey medicals', 'Eye drops', '36', '29.04.2022', 'April'),
(47, 'Nanocold-PC', '66', '25', 'Heamcare ', 'Cough syrup', '7', '2.05.2022', 'May'),
(48, 'Honitus', '180', '25', 'Dabur', 'Cough syrup', '15', '5.05.2022', 'May'),
(49, 'Baby Wipes', '99', '30', 'Littles', 'Cleansing wipes', '25', '9.05.2022', 'May'),
(50, 'Himalaya Oil', '312', '15', 'Himalaya', 'Baby massage oil', '6', '11.05.2022', 'May'),
(51, 'BP Monitor', '2009', '5', 'Omron', 'Device', '1', '15.05.2022', 'May'),
(52, '10% Vitamin C', '649', '10', 'Derma & Co.', 'Face Serum', '3', '20.05.2022', 'May'),
(53, 'Kofol', '121', '15', 'Charak Pharma', 'Tablets', '7', '22.05.2022', 'May'),
(54, 'Cerelac', '215', '20', 'Nestle', 'Baby food', '13', '25.05.2022', 'May'),
(55, 'Spox', '140', '40', 'BCN', 'Vitamin E capsules', '22', '28.05.2022', 'May'),
(56, 'Follihair', '297', '25', 'Abbott', 'Tablets', '6', '29.05.2022', 'May');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale2`
--
ALTER TABLE `sale2`
  ADD CONSTRAINT `sale2_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `sale1` (`bill_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
