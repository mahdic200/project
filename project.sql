-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2022 at 02:27 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metix2_project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb3_persian_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb3_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb3 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'خبری', '2022-05-05 13:41:22', NULL),
(2, 'سیاسی', '2022-05-05 13:41:29', NULL),
(3, 'اقتصادی', '2022-05-05 13:41:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb3_persian_ci NOT NULL,
  `status` enum('unseen','seen','approved') COLLATE utf8mb3_persian_ci NOT NULL DEFAULT 'unseen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb3_persian_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb3_persian_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'طراحی وب', 'link', NULL, '2022-05-05 14:25:49', NULL),
(2, 'برنامه نویسی', 'link', NULL, '2022-05-05 14:26:17', NULL),
(3, 'هک و امنیت', 'link', NULL, '2022-05-05 14:26:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8mb3_persian_ci NOT NULL,
  `summary` text COLLATE utf8mb3_persian_ci NOT NULL,
  `body` text CHARACTER SET utf8mb3 NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb3_persian_ci NOT NULL,
  `status` enum('enable','disable') COLLATE utf8mb3_persian_ci NOT NULL DEFAULT 'disable',
  `selected` tinyint(4) NOT NULL DEFAULT 0,
  `breaking_news` tinyint(4) NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `summary`, `body`, `view`, `user_id`, `cat_id`, `image`, `status`, `selected`, `breaking_news`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'پست جدید', '<p>خلاصه</p>\r\n', '<p>یکم بیشتر خلاصه</p>\r\n', 0, 1, 1, 'public/post-image/2022-05-05-13-44-38.png', 'disable', 0, 1, '2022-05-05 13:43:36', '2022-05-05 13:44:38', '2022-05-05 13:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(120) COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `keywords` text CHARACTER SET utf8mb3 DEFAULT NULL,
  `logo` text COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `description`, `keywords`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'new title', 'this is a test setting', 'setting , title , settings', 'link', 'link', '2022-05-05 14:24:29', '2022-05-05 14:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(120) CHARACTER SET utf8mb3 NOT NULL,
  `email` varchar(120) CHARACTER SET utf8mb3 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 NOT NULL,
  `permission` enum('user','admin') CHARACTER SET utf8mb3 NOT NULL DEFAULT 'user',
  `verify_token` varchar(255) COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 => inactive , 1 => active',
  `forgot_token` varchar(255) COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `forgot_token_expire` varchar(255) COLLATE utf8mb3_persian_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `permission`, `verify_token`, `is_active`, `forgot_token`, `forgot_token_expire`, `created_at`, `updated_at`) VALUES
(1, 'mahdi', 'e@gmail.com', '12345', 'admin', NULL, 0, NULL, NULL, '2022-05-05 13:42:23', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`user_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `parent_id` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
