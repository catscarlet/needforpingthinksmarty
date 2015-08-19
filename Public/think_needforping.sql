-- phpMyAdmin SQL Dump
-- version 4.4.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-08-17 13:59:08
-- 服务器版本： 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `think_needforping`
--

-- --------------------------------------------------------

--
-- 表的结构 `pinglist`
--

CREATE TABLE IF NOT EXISTS `pinglist` (
  `id` int(255) NOT NULL,
  `server_name` varchar(50) NOT NULL,
  `alias_name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pingresult`
--

CREATE TABLE IF NOT EXISTS `pingresult` (
  `id` int(11) NOT NULL,
  `server_name` text NOT NULL,
  `DATETIME` datetime NOT NULL,
  `loss_percent` text NOT NULL,
  `rtt_min` int(11) NOT NULL,
  `rtt_avg` int(11) NOT NULL,
  `rtt_max` int(11) NOT NULL,
  `state` varchar(10) DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pinglist`
--
ALTER TABLE `pinglist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pingresult`
--
ALTER TABLE `pingresult`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pinglist`
--
ALTER TABLE `pinglist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pingresult`
--
ALTER TABLE `pingresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
