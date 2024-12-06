-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 03:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `category_description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `date`) VALUES
(1, 'Python', 'Python\r\nHigh-level programming language\r\nPython is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation via the off-side rule. Python is dynamically typed and garbage-collected. Wikipedia', '2023-07-30 14:20:37'),
(2, 'Flutter', 'Flutter\r\nSoftware\r\nFlutter is an open-source UI software development kit created by Google. It is used to develop cross platform applications from a single codebase for any web browser, Fuchsia, Android, iOS, Linux, macOS, and Windows. First described in 2015, Flutter was released in May 2017', '2023-07-30 14:20:37'),
(3, 'Bootstrap', 'Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains HTML, CSS and JavaScript-based design templates for typography, forms, buttons, navigation, and other interface components. Wikipedia', '2023-07-30 14:22:53'),
(4, 'Java', 'Java\r\nHigh-level programming language\r\nJava is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. Wikipedia', '2023-07-30 14:22:53'),
(5, 'PHP', 'PHP\r\nProgramming language\r\nPHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group. Wikipedia', '2023-07-30 14:23:40'),
(6, 'Angular Js', 'AngularJS\r\nProgramming language\r\nAngularJS is a discontinued free and open-source JavaScript-based web framework for developing single-page applications. It was maintained mainly by Google and a community of individuals and corporations. Wikipedia', '2023-07-30 14:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `Date`) VALUES
(1, 'How you fix this bro', 1, 3, '2023-07-30 15:23:21'),
(2, 'Hi Dummy Content', 1, 4, '2023-07-30 16:50:44'),
(3, 'Chubby Content', 1, 6, '2023-07-30 16:53:24'),
(4, 'By Subject by concern', 6, 7, '2023-07-30 16:54:27'),
(5, 'hy', 2, 5, '2023-07-30 17:06:49'),
(6, 'h comment', 1, 5, '2023-07-30 17:34:08'),
(7, 'What Kind Of Issue You have?', 11, 7, '2023-07-30 18:08:21'),
(8, 'Bhai Tujhe kia lena dena ? tu apna karobar sambhal...', 13, 4, '2023-07-30 18:20:22'),
(9, 'bhai tujhe kia tu apna kam kar', 13, 7, '2023-07-30 18:21:31'),
(10, 'no error\r\n', 1, 2, '2023-08-04 18:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` text NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `Date`) VALUES
(1, 'Error on Python', 'How I resolve Error in Python ', 1, 1, '2023-07-30 14:56:21'),
(2, 'Error on Flutter', 'How I fix this', 2, 2, '2023-07-30 15:03:20'),
(3, 'Error Fix', 'All Error Fix', 1, 3, '2023-07-30 16:40:51'),
(4, 'Many Problem', 'Any Solution?', 1, 5, '2023-07-30 16:47:16'),
(5, 'Flutter Problem', 'Many solution', 2, 7, '2023-07-30 16:48:13'),
(6, 'hi subject', 'hi concern', 1, 5, '2023-07-30 16:48:41'),
(7, 'hi', 'hi', 2, 4, '2023-07-30 17:17:10'),
(8, 'Error', 'Solve', 2, 2, '2023-07-30 17:26:43'),
(9, 'hi subject', 'hi concern', 1, 2, '2023-07-30 17:29:46'),
(10, 'hi problem', 'by solution', 1, 4, '2023-07-30 17:40:33'),
(11, 'hi bro ', 'Thank God Solve issue', 1, 4, '2023-07-30 18:04:05'),
(12, 'Hi Bro', 'Its Hammad', 2, 7, '2023-07-30 18:05:40'),
(13, 'Angular JS', 'What is Angular JS?', 6, 7, '2023-07-30 18:19:26'),
(14, 'hi', 'java', 4, 2, '2023-07-31 21:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `srn` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srn`, `Name`, `Email`, `Password`, `Date`) VALUES
(1, 'tt', 'tt@mail.com', '123', '2023-07-30 15:49:07'),
(2, 'Jawad', 'test@check.com', '123', '2023-07-30 16:02:34'),
(3, 'salman', 'zubair@khan.com', '123', '2023-07-30 16:32:25'),
(4, 'Zubair Khan', 'zkb8618202@gmail.com', '123', '2023-07-30 17:05:32'),
(5, 'Saadi', 'saad@mail.com', '123', '2023-07-30 17:15:28'),
(6, 'Khan', 'khan@mail.com', '123', '2023-07-30 17:15:52'),
(7, 'Hammad', 'hammad@mail.com', '123', '2023-07-30 17:16:40'),
(8, 'Zubair', 'zubaie@gmail.com', '123', '2023-08-04 17:38:33');

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
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`srn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `srn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
