-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 11:24 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abnormal_graphics`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '1:Male // 2:Female // 3:Other',
  `birthdate` date NOT NULL,
  `joindate` date NOT NULL,
  `profilePicId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `gender`, `birthdate`, `joindate`, `profilePicId`) VALUES
(24, 'hristo1998', '6a7cc05cf98db9c2e23ce04459ccf749', 'hristo.vladimirov1998@abv.bg', 'Hristo', 'Vladimirov', 3, '2013-03-03', '2016-04-08', 'user_profile_pic_24.jpg'),
(25, 'toshko', '6a7cc05cf98db9c2e23ce04459ccf749', 'toshko@abv.bg', 'toshko', 'nikolov', 1, '1991-04-04', '2016-04-09', 'default-male-profile-pic.jpg'),
(26, 'toshko1', '6a7cc05cf98db9c2e23ce04459ccf749', 'toshko@abv.bg', 'tosheto', 'tolev', 1, '1998-04-03', '2016-04-10', 'default-male-profile-pic.jpg'),
(28, 'dancho', '6a7cc05cf98db9c2e23ce04459ccf749', 'maina@ma.ko', 'dancho', 'tolev', 1, '1993-02-03', '2016-04-12', 'user_profile_pic_28.jpg'),
(29, 'gospojata', '6a7cc05cf98db9c2e23ce04459ccf749', 'hristo.vladimirov1998@abe.bg', 'ljdfb', 'sdfjn', 2, '2001-02-17', '2016-04-15', 'user_profile_pic_29.jpg'),
(30, 'ghristo1998', '6a7cc05cf98db9c2e23ce04459ccf749', 'hristo.vladimirov1998@abv.bg', 'asdasd', 'asdasd', 1, '2001-02-16', '2016-04-21', 'user_profile_pic_30.jpg'),
(31, 'Vasil', '3cd2436f0dd5a354b7144a3361d19a10', 'hristo.vladimirov1998@abv.bg', 'Vasil', 'Zhuhov', 1, '2000-01-17', '2016-04-21', 'user_profile_pic_31.jpg'),
(32, 'asdasd', 'ed17c807501a4e680d25d099fb689261', 'asdf@asd.bf', 'asd', 'asd', 0, '0000-00-00', '2016-04-24', 'default-male-profile-pic.jpg'),
(33, 'asdff', 'ed17c807501a4e680d25d099fb689261', 'asdf@asds.bf', 'asd', 'asd', 0, '0000-00-00', '2016-04-24', 'default-male-profile-pic.jpg'),
(34, 'username', '6a7cc05cf98db9c2e23ce04459ccf749', 'e@a.f', 'asdf', 'asdfg', 1, '1999-03-04', '2016-04-24', 'default-male-profile-pic.jpg'),
(35, 'asdasdasdf', '6a7cc05cf98db9c2e23ce04459ccf749', 'a@a.s', 'asd', 'asdasd', 0, '0000-00-00', '2016-04-24', 'default-male-profile-pic.jpg'),
(36, 'sddfsfg', '6a7cc05cf98db9c2e23ce04459ccf749', 'asdf@asds.bfs', 'asd', 'asdad', 0, '0000-00-00', '2016-04-24', 'default-male-profile-pic.jpg'),
(37, 'aksjbdk', '6a7cc05cf98db9c2e23ce04459ccf749', 'asd@asd.s', 'asdasd', 'asdasd', 0, '0000-00-00', '2016-04-24', 'default-male-profile-pic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
