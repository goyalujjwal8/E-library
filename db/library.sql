-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 08:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(20) NOT NULL,
  `bookname` varchar(300) NOT NULL,
  `authorname` varchar(300) NOT NULL,
  `bookdetails` varchar(2000) NOT NULL,
  `bookimage` varchar(2000) NOT NULL,
  `pdf` varchar(2000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `bookname`, `authorname`, `bookdetails`, `bookimage`, `pdf`, `updated_at`, `created_at`) VALUES
(34, 'Harry Potter and the Philosopher Stone', 'J K Rowling', 'Having now become classics of our time the Harry Potter books never fail to bring comfort and escapism to readers of all ages With its message of hope belonging and the enduring power of truth and love, the story of the Boy Who Lived continues to delight generations of new readers', '51UoqRAxwEL.jpg', '', '2021-03-11 05:16:24', '2021-03-03 12:28:07'),
(37, 'Harry Potter and the Chamber of Secrets', 'J K Rowling', 'Harry Potters summer has included the worst birthday ever doomy warnings from a house elf called Dobby and rescue from the Dursleys by his friend Ron Weasley in a magical flying car Back at Hogwarts School of Witchcraft and Wizardry for his second year Harry hears strange whispers echo through empty corridors and then the attacks start Students are found as though turned to stone Dobbys sinister predictions seem to be coming true', '51TA3VfN8RL.jpg', '', '2021-03-10 10:43:07', '2021-03-04 08:47:03'),
(38, 'Satyayoddha Kalki Eye of Brahma', 'Kevin Missal', 'After a defeat at the hands of Lord Kali Kalki Hari must journey towards the Mahendragiri mountains with his companions to finally become the avatar he is destined to be But the road ahead is not without peril\r\n\r\nNot only is he trapped by the cannibalistic armies of the Pisach he is also embroiled in the civil war of the Vanars And in midst of all this he meets a face from the legends', '51aTLfPUshL.jpg', '', '2021-03-10 11:00:46', '2021-03-04 10:43:18'),
(39, 'Things Fall Apart', 'Chinua Achebe', 'Okonkwo is the greatest wrestler and warrior alive and his fame spreads throughout West Africa like a bush fire in the harmattan. But when he accidentally kills a clansman things begin to fall apart. Then Okonkwo returns from exile to find missionaries and colonial governors have arrived in the village With his world thrown radically off balance he can only hurtle towards tragedy', '41u2JaAH+BL.jpg', '', '2021-03-10 11:05:22', '2021-03-04 10:44:24'),
(40, 'Ageless Body Timeless Mind', 'Deepak Chopra', 'Scientific studies show that the mind body connection has an extraordinary power to heal Ageless Body Timeless Mind goes beyond ancient mind body wisdom and current anti aging research to show you do not have to grow old With the passage of time you can retain your physical vitality creativity memory and self esteem. Dr Deepak Chopra bases his theories on the ancient Indian science of Ayurveda, according to which, optimum health is about achieving balance physically emotionally and psychologically and demonstrates that, contrary to our traditional beliefs about aging we can use our innate capacity for balance to direct the way our bodies metabolize time and achieve our unbounded potential', '41eyUf4g1kL.jpg', '', '2021-03-10 11:09:56', '2021-03-06 06:35:33'),
(41, 'The Housekeeper and the Professor', ' Yoko Ogawa', 'He is a brilliant maths professor with a peculiar problem  ever since a traumatic head injury seventeen years ago he has lived with only eighty minutes of short term memory\r\nShe is a sensitive but astute young housekeeper who is entrusted to take care of him', '51yJFjnD-0L.jpg', '', '2021-03-10 11:14:20', '2021-03-06 06:51:37'),
(42, 'A Little Book of Happiness', 'Ruskin Bond', 'To find happiness look halfway between too little and too much', '4106IAd26fL._SX320_BO1,204,203,200_.jpg', '', '2021-03-10 11:20:40', '2021-03-06 06:53:30'),
(61, 'MY', 'author', 'sadferdscx', '', '', '2021-03-15 12:47:54', '2021-03-15 12:47:54'),
(62, 'wrefg', 'dfgfhg', 'fdghg', 'a.jpg', '', '2021-03-15 12:48:31', '2021-03-15 12:48:31'),
(63, 'new', 'ugg', 'zdfvbn', 'a.jpg', '', '2021-03-15 12:51:31', '2021-03-15 12:51:31'),
(64, 'dfd', 'sdfg', 'fgbf', 'a.jpg', '', '2021-03-15 12:53:47', '2021-03-15 12:53:47'),
(65, 'fg', 'dsfgf', 'dsfg', 'a.jpg', '', '2021-03-15 12:55:50', '2021-03-15 12:55:50'),
(66, 'fd', 'sdf', 'dsfg', '51pPO61hUYL._SX323_BO1,204,203,200_.jpg', 'Durjoy Datta - The Boy Who Loved (readalot.in).pdf', '2021-03-15 13:15:07', '2021-03-15 13:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `has_book`
--

CREATE TABLE `has_book` (
  `bid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `action` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has_book`
--

INSERT INTO `has_book` (`bid`, `uid`, `action`) VALUES
(34, 16, 'reading'),
(37, 16, 'wishlisted'),
(38, 16, 'finished'),
(34, 16, 'wishlisted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `usertype` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=admin;\r\n0=user',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `usertype`, `date_updated`) VALUES
(7, 'admin', 'admin@gmail.com', 'admin', 1, '2021-03-13 00:57:26'),
(16, 'user', 'user@gmail.com', 'user', 0, '2021-03-15 12:10:24'),
(17, 'user1', 'user1@gmail.com', 'user1', 0, '2021-03-15 12:10:37'),
(18, 'user2', 'user2@gmail.com', 'user2', 0, '2021-03-15 12:19:55'),
(19, 'user3', 'user3@gmail.com', 'user3', 0, '2021-03-15 16:27:16'),
(20, 'admin1', 'admin1@gmail.com', 'admin1', 1, '2021-03-15 16:28:15'),
(21, 'admin2', 'admin2@gmail.com', 'admin2', 1, '2021-03-15 18:10:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `has_book`
--
ALTER TABLE `has_book`
  ADD KEY `bid` (`bid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `has_book`
--
ALTER TABLE `has_book`
  ADD CONSTRAINT `has_book_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `has_book_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
