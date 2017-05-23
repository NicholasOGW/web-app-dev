-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2017 at 05:46 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uecs2094_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lot` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `name`, `lot`, `zone`, `floor`, `category`) VALUES
(14, 'Boat Noodles', '03', 'A', '3', 'Food and Baverages'),
(22, 'Soft serve', '04', 'B', '2', 'Food and Baverages'),
(12, 'Distinct 21', '02', 'A', '3', 'Entertainment'),
(11, 'Golden Screen Cinemas', '01', 'A', '3', 'Entertainment'),
(15, 'H&M', '03', 'B', '1', 'Fashion and Accessories'),
(16, 'CottonOn', '04', 'C', '2', 'Fashion and Accessories'),
(17, 'Hush Puppies', '05', 'C', '1', 'Fashion and Accessories'),
(18, 'Birkenstock', '06', 'C', '2', 'Footwear'),
(19, 'G Shock', '01', 'B', '2', 'Watches'),
(21, 'Sticky', '02', 'C', 'G', 'Food and Baverages'),
(23, 'kfc', '02', 'B', '1', 'Food and Baverages'),
(29, 'fish & co', '01', 'A', 'G', 'Food and Baverages'),
(27, 'mcd', '04', 'B', 'G', 'Food and Baverages'),
(31, 'QQ outlet', '04', 'B', '1', 'Fashion and Accessories'),
(32, 'Bata', '05', 'A', '3', 'Footwear'),
(33, 'Casio', '03', 'A', 'G', 'Watches');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
