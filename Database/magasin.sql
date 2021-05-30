-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2021 at 05:11 PM
-- Server version: 5.7.30-log
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magasin`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Role` varchar(6) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Ville` varchar(10) NOT NULL,
  `Adresse` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `Role`, `login`, `password`, `Tel`, `Ville`, `Adresse`, `Email`) VALUES
(6, 'admin', 'oussama', '1234', '0604040404', 'rabat', 'LLLLLLLLLL', 'oussamahennane1xxx@gmail.com'),
(7, 'user', 'ilyass', '12345', '080808080', 'temara', 'SSSSSSSSSsXXXXXXX', 'ilyass123@gmail.com'),
(9, 'user', 'Ismail', '1234', '097979', 'rabab', 'LSKSKSK', 'oussamahennane1@gmail.com'),
(10, 'admin', 'ouss', '1234', '097979', 'rabab', 'SSSSSSSSSsXXXXXXX', 'oussamahennane1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Num` int(10) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Numclt` int(10) NOT NULL,
  PRIMARY KEY (`Num`),
  KEY `id_client` (`Numclt`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lignedecommande`
--

DROP TABLE IF EXISTS `lignedecommande`;
CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `Refprod` int(10) NOT NULL,
  `Numcmd` int(10) NOT NULL,
  `Quantité` int(10) NOT NULL,
  KEY `id_produit` (`Refprod`),
  KEY `Num_Cmd` (`Numcmd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `Reference` int(10) NOT NULL AUTO_INCREMENT,
  `Prix` decimal(10,0) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Categorie` varchar(20) NOT NULL,
  `Prixacquisition` decimal(10,0) NOT NULL,
  `Age` int(10) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`Reference`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`Reference`, `Prix`, `Designation`, `Categorie`, `Prixacquisition`, `Age`, `Size`, `Brand`, `Image`) VALUES
(19, '100', 'T-shirt Homme', 'T-shirt', '90', 25, 'XL', 'Calvin Klein', '../Assets/img/product/1.jpg'),
(20, '120', 'T-SHIRT NOIR', 'T-shirt', '100', 19, 'S', 'Brooklinen', '../Assets/img/product/2.jpg'),
(21, '70', 'Tshirt My Hero Academia', 'T-shirt', '50', 15, 'M', 'Calvin Klein', '../Assets/img/product/3.jpg'),
(22, '79', 'Defacto PANTALON', 'PANTALON', '70', 10, 'S', 'Calvin Klein', '../Assets/img/product/4.jpg'),
(23, '79', 'Defacto CHEMISE Ã€ MANCHES COURTES - KAKI', 'T-shirt', '70', 10, 'S', 'Brooklinen', '../Assets/img/product/5.jpg'),
(24, '889', 'Nike Chaussures Lifestyle - NIKE AIR MAX 90 LTR ', 'Chaussures', '800', 12, 'EU 90', 'NIKE', '../Assets/img/product/6.jpg'),
(25, '1224', 'Nike CHAUSSURES LIFESTYLE - AIR MAX 90 - MULTICOLORE', 'Chaussures', '1000', 13, 'EU 44', 'NIKE', '../Assets/img/product/7.jpg'),
(26, '350', 'Fashion Lace Up Running Athletic Shoes For Men', 'Chaussures', '300', 16, 'EU 44', 'Brooklinen', '../Assets/img/product/8.jpg'),
(27, '119', 'Koton PANTALON - BLEU', 'PANTALON', '100', 25, 'EU 48', 'Calvin Klein', '../Assets/img/product/9.jpg'),
(28, '130', 'Koton PANTALON HOMME - BLEU', 'PANTALON', '100', 20, 'EU 44', 'Calvin Klein', '../Assets/img/product/10.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `id_client` FOREIGN KEY (`Numclt`) REFERENCES `client` (`ID`);

--
-- Constraints for table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD CONSTRAINT `Num_Cmd` FOREIGN KEY (`Numcmd`) REFERENCES `commande` (`Num`),
  ADD CONSTRAINT `id_produit` FOREIGN KEY (`Refprod`) REFERENCES `produit` (`Reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
