-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 02:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_discription` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_discription`, `created`) VALUES
(1, 'python', 'Python is an easy to learn, powerful programming language. It has efficient high-level data structures and a simple', '0000-00-00 00:00:00'),
(2, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification.', '0000-00-00 00:00:00'),
(3, 'PHP', 'PHP is good programming language.it is one of the finest language of all time.', '2021-09-03 00:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `comments_content` text NOT NULL,
  `threads_id` int(11) NOT NULL,
  `comments_by` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `comments_content`, `threads_id`, `comments_by`, `timestamp`) VALUES
(1, 'this is not related to discussion.', 1, 'jashwant', '2021-09-04 02:08:25'),
(2, 'this a comment', 13, '', '2021-09-04 02:23:41'),
(3, 'welcome to comments.', 5, '', '2021-09-04 02:35:04'),
(4, 'thank you for comment', 2, '', '2021-09-04 02:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threads_id` int(8) NOT NULL,
  `threads_title` varchar(255) NOT NULL,
  `threads_desc` text NOT NULL,
  `threads_cat_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threads_id`, `threads_title`, `threads_desc`, `threads_cat_id`, `user_id`, `timestamp`) VALUES
(1, 'unable to install django in windows.', 'python is the most simplest language of all time.', 1, 0, '2021-08-29 22:52:56'),
(2, 'javascript is a very good language which can be learn easily.', 'you just need a little bit of cocern to handle the language.', 2, 0, '2021-08-29 23:41:04'),
(5, 'hello', 'welcome', 3, 0, '2021-09-03 03:22:09'),
(6, 'ttl1', 'desc1', 3, 0, '2021-09-03 03:39:30'),
(7, 'ttl2', 'desc2', 4, 0, '2021-09-04 00:27:50'),
(9, 'you have an exam', 'prepare for it', 2, 0, '2021-09-04 01:37:34'),
(12, 'you have an exam', 'prepare for it', 2, 0, '2021-09-04 02:01:04'),
(13, 'excellent work jashwant', 'you are doing well ', 2, 0, '2021-09-04 02:17:46'),
(14, 'tenserflow is not installed', 'due to some technical issues there might be some thing which causes an error', 1, 0, '2021-09-04 03:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `cpassword` varchar(15) NOT NULL,
  `phone` int(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `cpassword`, `phone`, `timestamp`) VALUES
(1, 'email@gmail.com', 'admin', 'admin', 1111111, '2021-09-04 04:36:04'),
(2, 'ranajashwant24@gmail.com', '1', '1', 0, '2021-09-04 04:41:14'),
(3, '', '', '', 0, '2021-09-04 04:41:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threads_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threads_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
