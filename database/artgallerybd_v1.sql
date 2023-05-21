-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 02:01 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artgallerybd`
--
/*CREATE DATABASE IF NOT EXISTS `artgallerybd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `artgallerybd`;
*/
-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Abstract', 'photo.jpg', '2023-03-28', '2023-03-28'),
(2, 'Horror', 'photo2.jpg', '2023-03-28', '2023-03-28'),
(3, 'Anime & Manga', 'photo3.jpg', '2023-03-28', '2023-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `body` text NOT NULL,
  `contentId` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `description` text NOT NULL,
  `categoryId` int(11) NOT NULL,
  `agelimit` tinyint(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `img`, `description`, `categoryId`, `agelimit`, `userId`, `create_date`, `created_at`, `updated_at`) VALUES
(1, 'Title', 'photo.jpg', 'description for pic 1', 1, 1, 3, '2023-05-07 15:23:59', '2023-05-07', '2023-05-07'),
(2, 'Best pic', 'photo6.jpg', 'Described pic', 3, 0, 2, '2023-05-07 15:25:07', '2023-05-07', '2023-05-07'),
(3, 'Title 3', 'photo7.jpg', 'description', 2, 0, 1, '2023-05-07 15:25:50', '2023-05-07', '2023-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `id` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `img`, `userId`, `post_date`, `created_at`, `updated_at`) VALUES
(1, 'rdfdsfsdfs', 'sdfsdfsf', '1683473214_photomode_14112022_163821.png', 1, '2023-05-07 12:26:54', '2023-05-07', '2023-05-07'),
(6, '2344', 'er', '1683473283_photomode_14112022_163821.png', 1, '2023-05-07 12:28:03', '2023-05-07', '2023-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `enable_explicit` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `role`, `email`, `avatar`, `date_of_birth`, `enable_explicit`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$ZH7poyr23pLVUhvNPjPE7uJXixMybylFgrJp5tvPeiwpdlcKWLP5S', 'admin', 'admin@admin.com', '', '2000-01-01', 1, '2023-03-28', '2023-04-09'),
(2, 'moderator', '$2y$10$3WqQ4mSujxwitlpua6gSEerI8XGq12b6D.wtisYWT2DCMFeRKo0SO', 'moderator', 'moderator@moderator.com', NULL, '2000-01-01', 1, '2023-04-16', '2023-04-16'),
(3, 'user', '$2y$10$vi2ibV8BXq43PdLJOTGTmuY3baLVKobPXT6erMw1gClsHyYnv6Xda', 'user', 'user@user.com', NULL, '2000-01-01', 0, '2023-04-16', '2023-04-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `comments_ibfk_2` (`contentId`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contentId` (`contentId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`contentId`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `liked_ibfk_1` FOREIGN KEY (`contentId`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liked_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
