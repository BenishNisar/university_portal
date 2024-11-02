-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 09:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` int(100) NOT NULL,
  `course_name` varchar(599) NOT NULL,
  `department_id` int(11) NOT NULL,
  `credit_hours` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plo`
--

CREATE TABLE `plo` (
  `id` int(11) NOT NULL,
  `program_id` varchar(200) NOT NULL,
  `description` varchar(599) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-30 01:17:47', '2024-10-30 01:17:47'),
(2, 'Teacher', '2024-10-30 01:25:45', '2024-10-30 01:25:45'),
(3, 'student', '2024-10-30 01:26:53', '2024-10-30 01:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(599) NOT NULL,
  `email` varchar(400) NOT NULL,
  `password` varchar(399) NOT NULL,
  `role_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `profile_img` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` enum('female','male','','') NOT NULL,
  `country` varchar(300) NOT NULL,
  `city` varchar(599) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role_id`, `department_id`, `profile_img`, `created_at`, `updated_at`, `gender`, `country`, `city`) VALUES
(1, 'Cailin', 'Holland', 'king@gmail.com', '$2y$10$de98cHd7OOK6xZAQcE4c8.kF5mjEkwBpvZSGn66qpl6woUMhzO5HC', 2, 15, 'profile_images/b7psut5pZv1uar710ihPR5TbhDF7qsPGrIIzrlZf.jpg', '2024-10-29 04:08:47', '2024-10-30 01:41:59', 'female', 'Amet sit voluptate', 'Ullam ullamco nemo m'),
(2, 'Aaron', 'Burgess', 'cagohuzu@mailinator.com', '$2y$10$GH6mbB5I2E3.gYrQoF6tAerWZC7FWygFJ3uxq1Rl6IW0qliIMIvM6', 1, 81, 'profile_images/mDcX6WkfsXNd5ZIiNiN2bZMcCCfajTkHPYMCkau5.jpg', '2024-10-29 04:09:28', '2024-10-30 01:42:20', 'female', 'Accusantium vero lab', 'Aut ipsa pariatur'),
(3, 'Morgan', 'Blevins', 'kamicuhema@mailinator.com', '$2y$10$B3M95RAxB8J.ORpoSonqoOfQqiDCGI2jOAQr52AsxVjONUf.LtkrO', 2, 92, 'profile_images/7xINSElLldII9wq4zP4Mi4CvajFuXFo9KhQSL21t.jpg', '2024-10-29 04:10:04', '2024-10-30 01:42:37', 'female', 'Impedit aliquam aut', 'Est dolore corrupti'),
(4, 'Portia', 'Giles', 'jajytuhy@mailinator.com', '$2y$10$VC7RJ9r8QnIh3p0nvpLhA.robrG.PEPvBUKMhqFK/BxH0YQThDg.2', 49, 58, 'profile_images/KwIA1TuskhTFCU410JOzkJEC47QWD9C56HXntd5d.jpg', '2024-10-29 04:11:45', '2024-10-29 04:11:45', 'male', 'Possimus pariatur', 'Aut lorem repellendu'),
(5, 'Celeste', 'Collier', 'nevoxu@mailinator.com', '$2y$10$sbxlt09ElbgUQDPMUC1Gs.3hqHMPrqsJaMTbUUS.R7pqtgOiKqF0O', 36, 15, 'profile_images/GLZ9zND9BGPWLCQ49ePgBFdd4eVVhghs8CwOei4H.jpg', '2024-10-29 04:12:59', '2024-10-29 04:12:59', 'male', 'Sint magnam est dol', 'Et culpa est adipis'),
(7, 'benish', 'khan', 'benishkhan@gmail.com', 'benish@123', 1, 2, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBw8PDQ4ODQ4PDQ4PDQ8PDg8PEA8QDw8PFhUXFhgRFRcYHSggGBolGxUVITMhJikrMC4uFx8zODMsNygtLisBCgoKDg0OGxAQGiseHyUtLS0rNSstLSstLS0rLS0tLS0tLSstLS0tLS0tL', '2024-10-30 19:43:02', '2024-10-30 19:43:02', 'female', 'Pakistan', 'karachi'),
(8, 'fatimakhan', 'khan', 'fatimazoha@gmail.com', '$2y$10$iTWP6y0BrzLJ8exFmUqGe.Y3S79Q8hSXENVAFE5W72JBwbUkEYAf6', 1, 1, 'profile_images/FVWmMRxbrmbWNJQUDNsnfReKTIBYkqvkF89V4QNZ.png', '2024-10-31 03:36:27', '2024-10-31 03:36:27', 'female', 'Pakistan', 'karachi'),
(9, 'haniya', 'khan', 'haniya@gmail.com', '$2y$10$McMgMzdusZ/CHqXJkz1cYeLReWVgrTT4TZdtMoi9oYdaigYPxIpMW', 2, 2, 'profile_images/QGE3aZ8a95lj1gnVlOJZDsAdtMK3K9pFbcm4XBHj.jpg', '2024-10-31 10:37:52', '2024-10-31 10:37:52', 'female', 'pakistan', 'karachi'),
(10, 'student', 'student', 'student@gmail.com', '$2y$10$nvoFAxWsZ.6nX5z6P0ipXuaHso18tn8I2UGhpGcjJohAkY3gUa/ea', 3, 2, 'profile_images/jiZP7KD6ePBEiQ58YnnR40BfuCFDWg75PHbQTJPK.jpg', '2024-10-31 11:36:10', '2024-10-31 11:36:10', 'female', 'Pakistan', 'Karachi'),
(11, 'Adnan kaim khani', 'khani', 'Adnankaimkhani@gmail.com', '$2y$10$YQMaQ0M.JUa.AuYD1eFt5uYzqX0kw/6WJxsqlcGZH0M2QTX2dBZUW', 2, 1, 'profile_images/9g3byvKefLarmdH6VRgr2nApZuJmNPpVBi74wz8X.jpg', '2024-11-03 01:18:18', '2024-11-03 01:18:18', 'male', 'Pakistan', 'karachi'),
(12, 'Zahid Ali', 'ali', 'zahidali@gmail.com', '$2y$10$HT1sR54t1XWoLYyjtTovse/o/.cD19LRYvl4AgAfhtsujV5Tm30vG', 2, 2, 'profile_images/A93lobiRjwjg71Rf6u1nnMTGZ2zXuefIKhtJJml4.jpg', '2024-11-03 02:25:53', '2024-11-03 02:25:53', 'male', 'Pakistan', 'karachi'),
(13, 'Aliza imran', 'imran', 'alizaimran@gmail.com', '$2y$10$GfDZ2w/pTqmX2zD/G1bdF.UXxZTMYr/Zqdvlz7Q75n494atu.8XpS', 3, 1, 'profile_images/43VxGNp7tWUQoYzXHeiPUJkjAXlnbts8KQ9jiuBa.jpg', '2024-11-03 02:30:42', '2024-11-03 02:30:42', 'female', 'Pakistan', 'lahore'),
(14, 'Ayesha rahim', 'rahim', 'ayesharahim@gmail.com', '$2y$10$jVvDqz5jGV8/kmGQrhAYwOOBAWdtiLpJRLqMzwvDYyoDOQxynAmWS', 3, 2, 'profile_images/siJxoZKnoduMAdJo09TS66ym47zjrsaAoo0i6UXz.jpg', '2024-11-03 02:44:02', '2024-11-03 02:44:02', 'female', 'Pakistan', 'karachi'),
(15, 'Shanzay', 'shoukat', 'shanzayshoukat@gmail.com', '$2y$10$aN5HwPaLh1VhFjT6qnT.teWguknmB05LGaga03JY7YcMHaRzuMHxu', 3, 2, 'profile_images/rWCKP730tZF1qIMjfeZhgGwZCZF4kVwRWo4PQZhx.jpg', '2024-11-03 02:46:40', '2024-11-03 02:46:40', 'female', 'Pakistan', 'karachi'),
(16, 'Laraib', 'khan', 'laraib@gmail.com', '$2y$10$5ac1kYNeqQ9mQmW.3NJ.LOVKHe0.JIus.3T1V4c6gBtJLpiktoUEi', 3, 2, 'profile_images/GV6Qop7pP1sICmf4JeVGtzx0Xz6A34qJ0NTs5mnG.jpg', '2024-11-03 02:49:11', '2024-11-03 02:49:11', 'female', 'Pakistan', 'karachi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plo`
--
ALTER TABLE `plo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plo`
--
ALTER TABLE `plo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
