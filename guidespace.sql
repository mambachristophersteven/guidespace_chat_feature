-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 12:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guidespace`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_id` varchar(255) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `receiver_id` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_id`, `sender_id`, `receiver_id`, `message`, `receiver_name`, `sender_name`) VALUES
(5, '', '9696565Stu', '9632368Lec', 'hello, ma', 'Angela Bimpong', 'Desmond Ofori'),
(6, '', '9696565Stu', '9632368Lec', 'it is derrick', 'Angela Bimpong', 'Desmond Ofori'),
(7, '', '9696565Stu', '85696523Lec', 'hello, sir josh', 'Joshua Moneyy', 'Desmond Ofori'),
(8, '', '9632368Lec', '9696565Stu', 'hello, desmond', 'Desmond Ofori', 'Angela Bimpong'),
(9, '', '9632368Lec', '9696565Stu', 'how are you?', 'Desmond Ofori', 'Angela Bimpong');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `fname`, `lname`, `username`, `password`, `status`, `role`) VALUES
(1, '9696565Stu', 'Desmond', 'Ofori', 'desfori', 'DesmondOforiStu', 'offline', 'student'),
(2, '9632368Lec', 'Angela', 'Bimpong', 'AngieBimp23', 'AngelaBimpongLec', 'offline', 'lecturer'),
(3, '85696523Lec', 'Joshua', 'Moneyy', 'Josh2M', 'JoshmoneyStu', 'offline', 'lecturer'),
(4, '837835Stu', 'Kafui', 'Nutty', 'KafNut', 'KafuiNuttyStu', 'offline', 'student'),
(5, '8376765Stu', 'Beatrice', 'Kama', 'AnkBea', 'BeatriceKamaStu', 'offline', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
