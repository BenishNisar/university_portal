-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2024 at 05:21 PM
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
(1, 'Cailin', 'Holland', 'king@gmail.com', '$2y$10$de98cHd7OOK6xZAQcE4c8.kF5mjEkwBpvZSGn66qpl6woUMhzO5HC', 2, 15, 'assets/profile_images/1730650696_adnan.jfif', '2024-10-29 04:08:47', '2024-11-04 00:18:16', 'female', 'Amet sit voluptate', 'Ullam ullamco nemo m'),
(2, 'Aaron', 'Burgess', 'cagohuzu@mailinator.com', '$2y$10$GH6mbB5I2E3.gYrQoF6tAerWZC7FWygFJ3uxq1Rl6IW0qliIMIvM6', 1, 81, 'assets/profile_images/1730650772_messages-2.jpg', '2024-10-29 04:09:28', '2024-11-04 00:19:32', 'female', 'Accusantium vero lab', 'Aut ipsa pariatur'),
(3, 'Morgan', 'Blevins', 'kamicuhema@mailinator.com', '$2y$10$B3M95RAxB8J.ORpoSonqoOfQqiDCGI2jOAQr52AsxVjONUf.LtkrO', 2, 92, 'assets/profile_images/1730650787_messages-2.jpg', '2024-10-29 04:10:04', '2024-11-04 00:19:47', 'female', 'Impedit aliquam aut', 'Est dolore corrupti'),
(4, 'Portia', 'Giles', 'jajytuhy@mailinator.com', '$2y$10$VC7RJ9r8QnIh3p0nvpLhA.robrG.PEPvBUKMhqFK/BxH0YQThDg.2', 3, 58, 'assets/profile_images/1730650716_messages-1.jpg', '2024-10-29 04:11:45', '2024-11-04 00:19:11', 'male', 'Possimus pariatur', 'Aut lorem repellendu'),
(5, 'Celeste', 'Collier', 'nevoxu@mailinator.com', '$2y$10$sbxlt09ElbgUQDPMUC1Gs.3hqHMPrqsJaMTbUUS.R7pqtgOiKqF0O', 36, 15, 'assets/profile_images/1730650735_messages-1.jpg', '2024-10-29 04:12:59', '2024-11-04 00:18:55', 'male', 'Sint magnam est dol', 'Et culpa est adipis'),
(7, 'benish', 'khan', 'benishkhan@gmail.com', 'benish@123', 1, 2, 'assets/profile_images/1730650803_messages-1.jpg', '2024-10-30 19:43:02', '2024-11-04 00:20:03', 'female', 'Pakistan', 'karachi'),
(8, 'fatimakhan', 'khan', 'fatimazoha@gmail.com', '$2y$10$iTWP6y0BrzLJ8exFmUqGe.Y3S79Q8hSXENVAFE5W72JBwbUkEYAf6', 1, 1, 'assets/profile_images/1730650832_messages-1.jpg', '2024-10-31 03:36:27', '2024-11-04 00:20:32', 'female', 'Pakistan', 'karachi'),
(9, 'haniya', 'khan', 'haniya@gmail.com', '$2y$10$McMgMzdusZ/CHqXJkz1cYeLReWVgrTT4TZdtMoi9oYdaigYPxIpMW', 2, 2, 'assets/profile_images/1730650818_adnan.jfif', '2024-10-31 10:37:52', '2024-11-04 00:20:18', 'female', 'pakistan', 'karachi'),
(10, 'student', 'student', 'student@gmail.com', '$2y$10$nvoFAxWsZ.6nX5z6P0ipXuaHso18tn8I2UGhpGcjJohAkY3gUa/ea', 3, 2, 'assets/profile_images/1730641691_messages-1.jpg', '2024-10-31 11:36:10', '2024-11-03 21:48:11', 'female', 'Pakistan', 'Karachi'),
(11, 'Adnan kaim khani', 'khani', 'Adnankaimkhani@gmail.com', '$2y$10$YQMaQ0M.JUa.AuYD1eFt5uYzqX0kw/6WJxsqlcGZH0M2QTX2dBZUW', 2, 1, 'assets/profile_images/1730641645_adnan.jfif', '2024-11-03 01:18:18', '2024-11-03 21:47:25', 'male', 'Pakistan', 'karachi'),
(12, 'Zahid Ali', 'ali', 'zahidali@gmail.com', '$2y$10$HT1sR54t1XWoLYyjtTovse/o/.cD19LRYvl4AgAfhtsujV5Tm30vG', 2, 2, 'assets/profile_images/1730641622_messages-1.jpg', '2024-11-03 02:25:53', '2024-11-03 21:47:02', 'male', 'Pakistan', 'karachi'),
(13, 'Aliza imran', 'imran', 'alizaimran@gmail.com', '$2y$10$GfDZ2w/pTqmX2zD/G1bdF.UXxZTMYr/Zqdvlz7Q75n494atu.8XpS', 3, 1, 'assets/profile_images/1730641506_messages-2.jpg', '2024-11-03 02:30:42', '2024-11-03 21:45:06', 'female', 'Pakistan', 'lahore'),
(14, 'Ayesha rahim', 'rahim', 'ayesharahim@gmail.com', '$2y$10$jVvDqz5jGV8/kmGQrhAYwOOBAWdtiLpJRLqMzwvDYyoDOQxynAmWS', 3, 2, 'assets/profile_images/1730641477_profile-img.jpg', '2024-11-03 02:44:02', '2024-11-03 21:44:37', 'female', 'Pakistan', 'karachi'),
(15, 'Shanzay', 'shoukat', 'shanzayshoukat@gmail.com', '$2y$10$aN5HwPaLh1VhFjT6qnT.teWguknmB05LGaga03JY7YcMHaRzuMHxu', 3, 2, 'assets/profile_images/1730641447_adnan.jfif', '2024-11-03 02:46:40', '2024-11-03 21:44:07', 'female', 'Pakistan', 'karachi'),
(16, 'Laraib', 'khan', 'laraib@gmail.com', '$2y$10$5ac1kYNeqQ9mQmW.3NJ.LOVKHe0.JIus.3T1V4c6gBtJLpiktoUEi', 3, 2, 'assets/profile_images/1730641424_messages-3.jpg', '2024-11-03 02:49:11', '2024-11-03 21:43:44', 'female', 'Pakistan', 'karachi'),
(17, 'admin', 'admin', 'admin@gmail.com', '$2y$10$hRp.huHR3QahDKB7WTp/Se7HtNqRHmBAoXZuLa8sFgZv.KXSkBjWq', 1, 2, 'assets/profile_images/1730641343_messages-1.jpg', '2024-11-03 16:03:53', '2024-11-03 21:42:23', 'male', 'Pakistan', 'Karachi'),
(18, 'Quinn', 'Peterson', 'xyfyta@mailinator.com', '$2y$10$upKyngDKrwOtzsZkEB6jXuylljwWU5A1WGHFHhu4U0npAgmag/9jy', 97, 91, 'assets/profile_images/1730639760_adnan.jfif', '2024-11-03 21:16:00', '2024-11-03 21:16:00', 'female', 'Officia voluptatem', 'Expedita provident'),
(19, 'Keelie', 'Johnson', 'jykevadab@mailinator.com', '$2y$10$c8bQyo1CsdyIoXuDvmhpTeWrpGQWjRfvrkv8Tx7wsNx7fAwRyIP/a', 5, 60, 'assets/profile_images/1730639901_adnan.jfif', '2024-11-03 21:18:21', '2024-11-03 21:18:21', 'female', 'Eos dolor sunt qui', 'Ad excepturi sed vel');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
