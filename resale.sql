-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 04:07 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(3, 'sa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fa_icon` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `fa_icon`) VALUES
(1, 'Mobiles', 'mobile'),
(3, 'Real Estate', 'home'),
(4, 'Furniture', 'wheelchair'),
(12, 'Cars', 'car'),
(13, 'Books, Sports and hobbies', 'book'),
(14, 'Fashion', 'fashion'),
(15, 'Kids', 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Kakinada'),
(3, 'Tuni'),
(4, 'Vizag');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `show_email` tinyint(1) NOT NULL,
  `show_phno` tinyint(1) NOT NULL,
  `show_name` tinyint(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `category_id`, `subcategory_id`, `city_id`, `user_id`, `title`, `price`, `show_email`, `show_phno`, `show_name`, `description`, `modified`) VALUES
(4, 1, 1, 4, 2, 'where does it come from', 2500, 1, 1, 1, 'ts in a piece of classical latin literature from 45 bc, making it over 2000 years old. richard mcclintock, a latin professor at hampden-sydney college in virginia, looked up one of the more obscure latin words, consectetur, from a lorem ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable so', '2017-09-19 08:28:55'),
(6, 4, 6, 1, 1, 'what is lorem ipsum', 1200, 0, 1, 0, 'ots in a piece of classical latin literature from 45 bc, making it over 2000 years old. richard mcclintock, a latin professor at hampden-sydney college in virginia, looked up one of the more obscure latin words, consectetur, from a lorem ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. lorem ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de fin', '2017-09-19 15:27:42'),
(7, 1, 1, 4, 2, 'where does it come from', 2500, 1, 1, 1, 'ts in a piece of classical latin literature from 45 bc, making it over 2000 years old. richard mcclintock, a latin professor at hampden-sydney college in virginia, looked up one of the more obscure latin words, consectetur, from a lorem ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable so', '2017-09-19 08:28:55'),
(9, 1, 1, 4, 2, 'where does it come from', 2500, 1, 1, 1, 'ts in a piece of classical latin literature from 45 bc, making it over 2000 years old. richard mcclintock, a latin professor at hampden-sydney college in virginia, looked up one of the more obscure latin words, consectetur, from a lorem ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable so', '2017-09-19 08:28:55'),
(11, 1, 1, 4, 2, 'where does it come from', 2500, 1, 1, 1, 'ts in a piece of classical latin literature from 45 bc, making it over 2000 years old. richard mcclintock, a latin professor at hampden-sydney college in virginia, looked up one of the more obscure latin words, consectetur, from a lorem ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable so', '2017-09-19 08:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `listing_images`
--

CREATE TABLE `listing_images` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listing_images`
--

INSERT INTO `listing_images` (`id`, `listing_id`, `path`) VALUES
(11, 4, '/frm/assets/uploads/4/1.jpg'),
(19, 5, '/frm/assets/uploads/5/d3.jpg'),
(20, 5, '/frm/assets/uploads/5/d4.jpg'),
(33, 6, '/frm/assets/uploads/6/r5.jpg'),
(35, 6, '/frm/assets/uploads/6/r7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `name`) VALUES
(1, 1, 'Mobile Phones'),
(2, 1, 'Tablets'),
(3, 2, 'Computers & Accessories'),
(4, 2, 'Fridge - AC - Washing Machine'),
(5, 3, 'Houses'),
(6, 4, 'Sofa & Dining'),
(12, 2, 'Desktops'),
(13, 3, 'Apartments');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `created`, `modified`, `status`) VALUES
(1, 'SathiBabu', 'P', 'sa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '123456', '2017-09-04 14:02:04', '2017-09-19 13:52:06', '1'),
(2, 'Sathi', 'Babu', 'sathi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_images`
--
ALTER TABLE `listing_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `listing_images`
--
ALTER TABLE `listing_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
