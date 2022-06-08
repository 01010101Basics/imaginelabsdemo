-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2022 at 04:41 PM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`) VALUES
(2, 'kellieg', 'b9a15b9c79dd3a9f32fca0a8b3b51a6833f718698f6476686dc76709e605560d8f596ee87476b7e4fc70e38bba1324ccb975c96491f3ba621be35025b44be9f5', 'birdiesnana@gmail.com'),
(4, 'kgoddard', 'ae3f68eb6c26aa33a282f0f3f077824e90dc7d0f7b537ffc17e4c489bebf40ec5c77fdc056f2c29f04bdeba7dc50055849126b02ccf384164af60402b154abc1', 'goddardken@outlook.com'),
(5, 'tim', '8e2eba73083905e894f3119dc398a0fade61a9f88ad7f06e2a11409f29e9d1de85146b56a35b551e45e4ce7c827460e6eda207ee59e2cf04d2f32d5f15dbf7d8', 'tim@nowhere.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
