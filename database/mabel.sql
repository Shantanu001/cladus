-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 10:58 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mabel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `billno` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `itemno` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `paymentmode` varchar(500) NOT NULL,
  `processed` varchar(50) NOT NULL,
  PRIMARY KEY (`billno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`billno`, `mid`, `itemno`, `rate`, `qty`, `amount`, `date`, `paymentmode`, `processed`) VALUES
(5, 1002, 12, 1999, 2, 3998, '0000-00-00', 'cash_on_delivery', ''),
(6, 1002, 12, 1999, 2, 3998, '0000-00-00', 'cash_on_delivery', 'NO'),
(7, 1002, 8, 1000, 3, 3000, '0000-00-00', 'netbanking', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(200) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`) VALUES
(1, 'Jeans'),
(2, 'Casual Shirts'),
(4, 'T-Shirt'),
(5, 'Women Footware'),
(6, 'Men Footware'),
(7, 'Shorts'),
(8, 'watches'),
(14, 'Kids Toys');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `mid` int(11) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `mdistrict` varchar(200) NOT NULL,
  `mstreet` varchar(200) NOT NULL,
  `mcity` varchar(200) NOT NULL,
  `mstate` varchar(200) NOT NULL,
  `mpin` varchar(20) NOT NULL,
  `mcountry` varchar(200) NOT NULL,
  `dob` varchar(40) NOT NULL,
  `mmob_no1` varchar(12) NOT NULL,
  `mmob_no2` varchar(12) NOT NULL,
  `memail` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `howdidyoufindus` varchar(200) NOT NULL,
  `usertype` varchar(2) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mid`, `mname`, `mdistrict`, `mstreet`, `mcity`, `mstate`, `mpin`, `mcountry`, `dob`, `mmob_no1`, `mmob_no2`, `memail`, `username`, `password`, `howdidyoufindus`, `usertype`) VALUES
(1004, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '', '', '', 'admin', 'admin', '', 'A'),
(1002, 'Amit', 'Muzaffarpur', 'Muz', 'Muzaffarpur', 'Bihar', '842001', 'India', '21-02-1988', '9939445235', '9939445235', 'suman_saurav2@yahoo.co.in', 'amit', 'kumar', 'Poster', 'U'),
(1005, 'Kundan Kumar', 'Muzaffarpur', 'Motijheel', 'Muzaffarpur', 'Bihar', '842002', 'India', '21-02-1990', '54579898', '6565656', 'kundan_kumar1568@gmail.com', 'kundan', 'kumar', 'Poster', 'U'),
(1001, 'Saurav Singh', 'Muzaffarpur', 'Kalambag Road', 'Muzaffarpur', 'Bihar', '842001', 'India', '21-02-1988', '9939445235', '9939445235', 'suman_saurav2@yahoo.co.in', 'saurav', 'singh', 'Poster', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `itemno` int(11) NOT NULL,
  `itemname` varchar(400) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`itemno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`itemno`, `itemname`, `description`, `price`, `qty`, `category`, `image`) VALUES
(4, 'Lee Cooper T-Shirt', 'Lee Cooper T-Shirt', 8000, 30, 'T-Shirt', '4.jpg'),
(5, 'shoe', 'Adidas shoe', 7000, 30, 'Men Footware', '5.jpg'),
(6, 'my T-shirt', 'It is a very good T Shirt. I have worn it many times. I have made a signature over it. ', 7000, 10, 'T-Shirt', '6.jpg'),
(7, 'Other T shirt', 'xyz', 2000, 20, 'T-Shirt', '7.jpg'),
(8, 'jeans', 'cotton,denim type.casual and formal', 1000, 20, 'Jeans', '8.jpg'),
(9, 'denim', 'summer spacial,all range.', 799, 10, 'Jeans', '9.jpg'),
(10, 'zodec', 'full sleev,formal wear.', 3000, 15, 'Casual Shirts', '10.jpg'),
(11, 'arrow formal shirt', 'cotton.', 4000, 10, 'Casual Shirts', '11.jpg'),
(12, 'wooland', 'velvet hill.', 1999, 10, 'Women Footware', '12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `orderno` int(11) NOT NULL AUTO_INCREMENT,
  `itemno` int(11) NOT NULL,
  `itemname` varchar(400) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dop` varchar(50) NOT NULL,
  `paymentmode` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`orderno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
