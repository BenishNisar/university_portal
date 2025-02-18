-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD:online_exam_db (1).sql
-- Generation Time: Nov 17, 2024 at 09:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30
=======
-- Generation Time: Nov 20, 2024 at 07:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
>>>>>>> 68627875e3d8130108a0a57354cbdfa82e89b302:online_exam_db.sql

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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_text` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `due_date` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` varchar(700) NOT NULL,
  `uploaded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `course_id`, `title`, `description`, `due_date`, `updated_at`, `created_at`, `file_path`, `uploaded_by`) VALUES
(1, 1, 'Periodic table', 'Make a periodic Table', '1980-11-08 05:24:00', '2024-11-12 12:33:22', '2024-11-07 13:58:16', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submissions`
--

CREATE TABLE `assignment_submissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(800) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(900) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment_submissions`
--

INSERT INTO `assignment_submissions` (`id`, `user_id`, `course_id`, `title`, `description`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'test', 'test', 'assignments/pRtEtemM4qfGMieRfLIVYtmZIKK92L1cakvk9adT.pdf', '2024-11-13 12:42:34', '2024-11-13 12:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `start_year`, `end_year`, `created_at`, `updated_at`) VALUES
(1, 'Batch-2022-12-E', '2020', '2024', '2024-11-06 02:12:18', '2024-11-06 02:12:18'),
(2, 'Batch-2022-12-A', '2020', '2024', '2024-11-06 02:12:47', '2024-11-12 01:21:42'),
(3, 'Batch-2022-12-B', '2020', '2025', '2024-11-06 02:13:31', '2024-11-12 01:22:45'),
(4, 'Batch-2020-F', '2024', '2025', '2024-11-12 01:24:34', '2024-11-12 01:24:34'),
(5, 'Batch-2023-C', '1990', '1998', '2024-11-12 01:25:06', '2024-11-12 01:25:06'),
(6, 'Batchh-2022-9', '2023', '2024', '2024-11-12 01:29:36', '2024-11-12 01:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `batch_quiz`
--

CREATE TABLE `batch_quiz` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_quiz`
--

INSERT INTO `batch_quiz` (`id`, `quiz_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '2024-11-10 11:23:36', '2024-11-10 11:23:36'),
(3, 9, 3, '2024-11-11 17:23:10', '2024-11-11 17:23:10'),
(4, 6, 4, '2024-11-11 17:30:03', '2024-11-11 17:30:03'),
(5, 5, 6, '2024-11-11 17:30:23', '2024-11-11 17:30:23'),
(6, 3, 3, '2024-11-12 05:02:41', '2024-11-12 05:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(599) NOT NULL,
  `description` varchar(900) NOT NULL,
  `status` enum('available','assigned','','') NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `assignments_enabled` tinyint(1) NOT NULL,
  `quizzes_enabled` tinyint(1) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

<<<<<<< HEAD:online_exam_db (1).sql
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `status`, `updated_at`, `created_at`, `assignments_enabled`, `quizzes_enabled`, `program_id`) VALUES
(1, 'Batch-3033', 'JavaScript for Web Development', 'testingsss', 'available', '2024-11-13 13:49:54', '2024-11-05 04:46:23', 1, 0, 4),
(2, 'Sit est exercitatio', 'C++ Programming for Beginners', 'Eius omnis incididun', 'assigned', '2024-11-13 12:36:03', '2024-11-05 04:53:46', 1, 0, 3),
(5, '8888', 'computet', 'commputer', 'assigned', '2024-11-12 13:00:53', '2024-11-12 13:00:53', 0, 0, 1),
(6, '5656', 'Python for Data Science', 'python is a programming language', 'available', '2024-11-13 09:55:15', '2024-11-13 09:55:15', 0, 0, 2);
=======
INSERT INTO `courses` (`id`, `code`, `name`, `description`, `status`, `updated_at`, `created_at`, `assignments_enabled`, `quizzes_enabled`) VALUES
(1, 'Batch-3033', 'Thermodynamics', 'testingsss', 'available', '2024-11-13 13:49:54', '2024-11-05 04:46:23', 1, 0),
(2, 'Sit est exercitatio', 'Claire Gates', 'Eius omnis incididun', 'assigned', '2024-11-13 12:36:03', '2024-11-05 04:53:46', 1, 0),
(5, '8888', 'computer', 'commputer', 'assigned', '2024-11-12 13:00:53', '2024-11-12 13:00:53', 0, 0),
(6, '5656', 'python', 'python is a programming language', 'available', '2024-11-13 09:55:15', '2024-11-13 09:55:15', 0, 0);
>>>>>>> 68627875e3d8130108a0a57354cbdfa82e89b302:online_exam_db.sql

-- --------------------------------------------------------

--
-- Table structure for table `course_assign`
--

CREATE TABLE `course_assign` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` int(200) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `department_id` int(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `year` varchar(255) NOT NULL,
<<<<<<< HEAD:online_exam_db (1).sql
  `program_id` int(11) NOT NULL
=======
  `status` int(11) DEFAULT NULL
>>>>>>> 68627875e3d8130108a0a57354cbdfa82e89b302:online_exam_db.sql
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_assign`
--

<<<<<<< HEAD:online_exam_db (1).sql
INSERT INTO `course_assign` (`id`, `course_id`, `semester`, `batch_id`, `user_id`, `department_id`, `created_at`, `updated_at`, `year`, `program_id`) VALUES
(1, 1, 1, 1, 1, 1, '2024-11-06 04:49:35', '2024-11-06 04:49:35', '2024', 1),
(2, 2, 2, 3, 11, 1, '2024-11-06 14:16:04', '2024-11-06 14:16:04', '2024', 2),
(5, 6, 2, 2, 1, 1, '2024-11-17 03:13:47', '2024-11-17 03:13:47', '2024', 1),
(6, 5, 2, 1, 11, 2, '2024-11-17 03:47:06', '2024-11-17 03:47:06', '2024', 3);
=======
INSERT INTO `course_assign` (`id`, `course_id`, `semester`, `batch_id`, `user_id`, `department_id`, `created_at`, `updated_at`, `year`, `status`) VALUES
(1, 1, 1, 1, 1, 1, '2024-11-06 04:49:35', '2024-11-06 04:49:35', '2024', NULL),
(2, 3, 2, 3, 9, 1, '2024-11-06 14:16:04', '2024-11-06 14:16:04', '2024', NULL);
>>>>>>> 68627875e3d8130108a0a57354cbdfa82e89b302:online_exam_db.sql

-- --------------------------------------------------------

--
-- Table structure for table `course_options`
--

CREATE TABLE `course_options` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `link` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `updated_at`, `created_at`) VALUES
(1, 'Computer Science', '2024-11-17 17:02:56', '2024-11-05 01:57:42'),
(2, 'Civil Engineering', '2024-11-17 17:07:56', '2024-11-17 17:07:56'),
(3, 'Mechanical Engineering', '2024-11-17 17:08:07', '2024-11-17 17:08:07'),
(4, 'Electrical Engineering', '2024-11-17 17:08:18', '2024-11-17 17:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `manage_students`
--

CREATE TABLE `manage_students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `student_id` varchar(50) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `enrollment_date` date NOT NULL,
  `graduation_date` date DEFAULT NULL,
  `current_year` int(11) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `cgpa` decimal(3,2) DEFAULT 0.00,
  `status` enum('Active','Graduated','Dropped') DEFAULT 'Active',
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_contact` varchar(15) DEFAULT NULL,
  `scholarship_status` tinyint(1) DEFAULT 0,
  `student_type` enum('Regular','Part-Time','Exchange') DEFAULT 'Regular',
  `Batch` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_students`
--

INSERT INTO `manage_students` (`id`, `user_id`, `phone_number`, `date_of_birth`, `address`, `student_id`, `courses_id`, `department_id`, `enrollment_date`, `graduation_date`, `current_year`, `semester`, `cgpa`, `status`, `guardian_name`, `guardian_contact`, `scholarship_status`, `student_type`, `Batch`, `created_at`, `updated_at`) VALUES
(1, 10, '3000000000', '2000-10-30', 'House # 4,House # 5, Dha Phase 2 Karachi', 'Stundent112233', 5, 1, '2024-11-04', '2028-11-04', 2024, 'Semester 1', 0.00, 'Active', 'Farhan', '03000000000', 0, 'Regular', '2024-4-3', '2024-11-18 18:33:08', '2024-11-19 07:15:46'),
(2, 23, '3000000000', '2000-10-30', 'DHA PHASE 1', 'Stundent112244', 6, 1, '2024-11-04', '2028-11-04', 2024, 'Semester 1', 0.00, 'Active', 'Muhammad Ishaq', '03000000000', 0, 'Regular', '2024-01-B', '2024-11-18 21:59:34', '2024-11-18 21:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `text`, `updated_at`, `created_at`, `is_correct`) VALUES
(1, 1, 'structured query language', '2024-11-09 12:07:39', '2024-11-09 12:07:39', 0),
(2, 1, 'electronic machine', '2024-11-09 12:07:39', '2024-11-09 12:07:39', 0),
(3, 1, 'electronic machine', '2024-11-09 12:07:39', '2024-11-09 12:07:39', 0),
(4, 1, 'structured query language', '2024-11-09 12:07:39', '2024-11-09 12:07:39', 0),
(5, 2, 'structured query language', '2024-11-09 12:07:53', '2024-11-09 12:07:53', 0),
(6, 2, 'electronic machine', '2024-11-09 12:07:53', '2024-11-09 12:07:53', 0),
(7, 2, 'electronic machine', '2024-11-09 12:07:53', '2024-11-09 12:07:53', 0),
(8, 2, 'structured query language', '2024-11-09 12:07:53', '2024-11-09 12:07:53', 0),
(9, 3, 'structured query language', '2024-11-10 01:01:20', '2024-11-10 01:01:20', 0),
(10, 3, 'electronic machine', '2024-11-10 01:01:20', '2024-11-10 01:01:20', 0),
(11, 3, 'structured query language', '2024-11-10 01:01:20', '2024-11-10 01:01:20', 0),
(12, 3, 'electronic machine', '2024-11-10 01:01:20', '2024-11-10 01:01:20', 0),
(13, 4, 'Desktop applications banane ke liye', '2024-11-10 02:25:03', '2024-11-10 02:25:03', 0),
(14, 4, 'Web applications banane ke liye', '2024-11-10 02:25:03', '2024-11-10 02:25:03', 0),
(15, 4, 'Mobile applications banane ke liye', '2024-11-10 02:25:03', '2024-11-10 02:25:03', 0),
(16, 4, 'Games banane ke liye', '2024-11-10 02:25:03', '2024-11-10 02:25:03', 0),
(17, 5, 'Desktop applications banane ke liye', '2024-11-10 02:25:30', '2024-11-10 02:25:30', 0),
(18, 5, 'Web applications banane ke liye', '2024-11-10 02:25:30', '2024-11-10 02:25:30', 0),
(19, 5, 'Mobile applications banane ke liye', '2024-11-10 02:25:30', '2024-11-10 02:25:30', 0),
(20, 5, 'Games banane ke liye', '2024-11-10 02:25:30', '2024-11-10 02:25:30', 0),
(21, 7, 'Incididunt in iusto', '2024-11-11 00:40:20', '2024-11-11 00:40:20', 0),
(22, 7, 'Eligendi praesentium', '2024-11-11 00:40:20', '2024-11-11 00:40:20', 0),
(23, 7, 'Non nemo ut est in r', '2024-11-11 00:40:20', '2024-11-11 00:40:20', 1),
(24, 7, 'Aliquip eum eos ten', '2024-11-11 00:40:20', '2024-11-11 00:40:20', 0),
(25, 8, 'Hyperlinks and Text Markup Language', '2024-11-11 01:30:56', '2024-11-11 01:30:56', 0),
(26, 8, 'hypertext markup language', '2024-11-11 01:30:56', '2024-11-11 01:30:56', 0),
(27, 8, 'electronic machine', '2024-11-11 01:30:56', '2024-11-11 01:30:56', 1),
(28, 8, 'electronic machine', '2024-11-11 01:30:56', '2024-11-11 01:30:56', 0),
(29, 9, 'structured query language', '2024-11-12 13:03:12', '2024-11-12 13:03:12', 0),
(30, 9, 'structured query language', '2024-11-12 13:03:12', '2024-11-12 13:03:12', 1),
(31, 9, 'Desktop applications banane ke liye', '2024-11-12 13:03:12', '2024-11-12 13:03:12', 0),
(32, 9, 'electronic machine', '2024-11-12 13:03:12', '2024-11-12 13:03:12', 0);

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`) VALUES
(1, 'Javascript'),
(2, 'Python'),
(3, 'C++'),
(4, 'React');

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

CREATE TABLE `quest` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `correct_option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `text`, `correct_option_id`, `created_at`, `updated_at`, `batch_id`) VALUES
(1, 3, 'Sql stands for', 1, '2024-11-09 12:07:39', '2024-11-09 12:07:39', 0),
(2, 3, 'Sql stands for', 1, '2024-11-09 12:07:53', '2024-11-09 12:07:53', 0),
(3, 4, 'Sql stands for', 1, '2024-11-10 01:01:20', '2024-11-10 01:01:20', 0),
(4, 4, 'ASP.NET Core MVC framework ka primary use kya hai?', 2, '2024-11-10 02:25:03', '2024-11-10 02:25:03', 0),
(5, 4, 'ASP.NET Core MVC framework ka primary use kya hai?', 2, '2024-11-10 02:25:30', '2024-11-10 02:25:30', 0),
(6, 6, 'Quod aperiam sunt au', 2, '2024-11-11 00:31:01', '2024-11-11 00:31:01', 1),
(7, 6, 'Quod aperiam sunt au', 2, '2024-11-11 00:40:20', '2024-11-11 00:40:20', 1),
(8, 9, 'What does HTML stand for?', 2, '2024-11-11 01:30:56', '2024-11-11 01:30:56', 1),
(9, 3, 'ASP.NET Core MVC framework ka primary use kya hai?', 1, '2024-11-12 13:03:12', '2024-11-12 13:03:12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `quiz_number` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `semester_id` int(11) NOT NULL,
  `answer_1` varchar(300) NOT NULL,
  `answer_2` varchar(300) NOT NULL,
  `answer_3` varchar(300) NOT NULL,
  `answer_4` varchar(100) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizs`
--

INSERT INTO `quizs` (`id`, `subject_id`, `quiz_number`, `created_at`, `updated_at`, `semester_id`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `question`) VALUES
(5, 2, '1', '2024-11-16 04:27:56', '2024-11-16 04:27:56', 3, 'structured query Language', 'language', 'stractured language', 'language', 1, 'what is sql?'),
(6, 2, '5', '2024-11-16 11:19:47', '2024-11-16 11:19:47', 2, 'hypertext markeup language', 'hypertoxt makeup language', 'hyperb text lnguagr', 'htmlss', 3, 'what is html?'),
(7, 1, '6', '2024-11-16 11:26:13', '2024-11-16 11:26:13', 2, 'test', 'test', 'test', 'test', 1, 'test'),
(8, 0, '811', '2024-11-16 03:30:16', '2024-11-16 03:30:16', 0, '', '', '', '', 0, ''),
(9, 2, '8', '2024-11-16 11:31:11', '2024-11-16 11:31:11', 3, 'hypertext markeup language', 'Molestiae et consequ', 'test', 'Aut dolorem soluta a', 3, 'what is html?'),
(10, 1, '5', '2024-11-19 06:16:13', '2024-11-19 06:16:13', 1, 'a', 'b', 'c', 'd', 2, 'question 1');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(800) NOT NULL,
  `description` text NOT NULL,
  `due_date` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `batch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_id`, `title`, `description`, `due_date`, `updated_at`, `created_at`, `batch_id`) VALUES
(2, 2, 'Computer Science', 'testings', '2024-11-08 00:00:00', '2024-11-09 01:06:25', '2024-11-09 01:06:25', 0),
(3, 1, 'Education', 'Education testings', '2024-11-11 00:00:00', '2024-11-12 13:02:41', '2024-11-09 11:52:57', 0),
(4, 1, 'testing', 'testing', '2024-11-09 00:00:00', '2024-11-10 01:00:42', '2024-11-10 01:00:42', 0),
(5, 1, 'chapter', 'tesy', '2024-11-11 00:00:00', '2024-11-12 01:30:23', '2024-11-10 16:39:42', 0),
(6, 1, 'thermodynamics here', 'thermodynamics testings check here', '2024-11-11 00:00:00', '2024-11-12 01:30:03', '2024-11-10 19:18:46', NULL),
(7, 1, 'thermodynamics here', 'thermodynamics testings check here', '2024-11-11 00:00:00', '2024-11-10 19:20:30', '2024-11-10 19:20:30', NULL),
(8, 1, 'thermodynamics here', 'thermodynamics testings check here', '2024-11-11 00:00:00', '2024-11-10 19:23:36', '2024-11-10 19:23:36', NULL),
(9, 1, 'sciencesss', 'DNA topic theromodynamics?ss', '2024-11-11 00:00:00', '2024-11-12 01:23:10', '2024-11-10 19:24:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` int(11) NOT NULL,
  `score` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
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
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Semester 1', '2024-11-14 07:43:47', '2024-11-14 07:43:47'),
(2, 'semester 2', '2024-11-14 18:31:25', '2024-11-14 18:31:25'),
(3, 'Semester 3', '2024-11-14 18:45:56', '2024-11-14 18:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `course_id` int(11) NOT NULL,
  `status` enum('enrolled','completed','remaining','') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`course_id`, `status`, `updated_at`, `created_at`, `user_id`) VALUES
(2, 'completed', '2024-11-07 03:31:21', '2024-11-07 03:31:21', 0),
(2, 'completed', '2024-11-07 03:33:46', '2024-11-07 03:33:46', 17),
(2, 'completed', '2024-11-07 03:33:47', '2024-11-07 03:33:47', 17),
(1, 'remaining', '2024-11-07 04:15:40', '2024-11-07 04:15:40', 17),
(0, 'remaining', '2024-11-13 01:30:33', '2024-11-13 01:30:33', 10),
(2, 'remaining', '2024-11-13 01:30:59', '2024-11-13 01:30:59', 10),
(3, 'completed', '2024-11-13 01:53:05', '2024-11-13 01:53:05', 11),
(4, 'remaining', '2024-11-13 01:55:50', '2024-11-13 01:55:50', 11),
(2, 'completed', '2024-11-13 01:56:43', '2024-11-13 01:56:43', 10),
(3, 'enrolled', '2024-11-13 01:57:23', '2024-11-13 01:57:23', 10),
(5, 'enrolled', '2024-11-13 01:58:55', '2024-11-13 01:58:55', 10),
(4, 'enrolled', '2024-11-13 06:06:24', '2024-11-13 06:06:24', 13),
(5, 'completed', '2024-11-13 06:06:38', '2024-11-13 06:06:38', 13),
(2, 'remaining', '2024-11-13 06:07:02', '2024-11-13 06:07:02', 13);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `semester_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Physics', '2024-11-14 07:42:24', '2024-11-14 07:42:24'),
(2, 2, 'computer', '2024-11-14 18:29:34', '2024-11-14 18:29:34');

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
  `department_id` int(11) DEFAULT NULL,
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
(10, 'Hamza', 'Ali', 'student@gmail.com', '$2y$10$nvoFAxWsZ.6nX5z6P0ipXuaHso18tn8I2UGhpGcjJohAkY3gUa/ea', 3, 2, 'assets/profile_images/1731965405_man3.jpg', '2024-10-31 11:36:10', '2024-11-18 16:30:05', 'male', 'Pakistan', 'Karachi'),
(12, 'Zahid', 'Ali', 'zahidali@gmail.com', '$2y$10$HT1sR54t1XWoLYyjtTovse/o/.cD19LRYvl4AgAfhtsujV5Tm30vG', 2, 2, 'assets/profile_images/1731885140_1730641343_messages-1.jpg', '2024-11-03 02:25:53', '2024-11-18 03:42:25', 'male', 'Pakistan', 'karachi'),
(17, 'admin', 'admin', 'admin@gmail.com', '$2y$10$hRp.huHR3QahDKB7WTp/Se7HtNqRHmBAoXZuLa8sFgZv.KXSkBjWq', 1, 2, 'assets/profile_images/1731885210_images.png', '2024-11-03 16:03:53', '2024-11-03 21:42:23', 'male', 'Pakistan', 'Karachi'),
(23, 'Noman', 'Ishaq', 'nomanishaq241@gmail.com', '$2y$10$W7KHCdYjGra5zsoCb/WsD.Zmg7rYLtxznnt4bgceXZ4Fxu.5y1LZu', 3, 1, 'assets/profile_images/1731966906_images.jpeg', '2024-11-18 16:55:06', '2024-11-18 16:55:06', 'male', 'Pakistan', 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `users_id`, `quiz_id`, `question_id`, `option_id`, `created_at`, `updated_at`) VALUES
(1, 17, 3, 1, 1, '2024-11-09 12:26:55', '2024-11-09 12:26:55'),
(2, 17, 3, 2, 5, '2024-11-09 12:26:55', '2024-11-09 12:26:55'),
(3, 17, 3, 1, 1, '2024-11-09 12:27:02', '2024-11-09 12:27:02'),
(4, 17, 3, 2, 8, '2024-11-09 12:27:02', '2024-11-09 12:27:02'),
(5, 17, 3, 1, 1, '2024-11-09 12:27:30', '2024-11-09 12:27:30'),
(6, 17, 3, 2, 7, '2024-11-09 12:27:30', '2024-11-09 12:27:30'),
(7, 17, 3, 1, 2, '2024-11-10 00:29:36', '2024-11-10 00:29:36'),
(8, 17, 3, 2, 7, '2024-11-10 00:29:36', '2024-11-10 00:29:36'),
(9, 17, 3, 1, 4, '2024-11-10 00:44:07', '2024-11-10 00:44:07'),
(10, 17, 3, 2, 8, '2024-11-10 00:44:07', '2024-11-10 00:44:07'),
(11, 17, 4, 3, 9, '2024-11-10 01:01:44', '2024-11-10 01:01:44'),
(12, 17, 4, 3, 9, '2024-11-10 01:01:59', '2024-11-10 01:01:59'),
(13, 17, 4, 3, 9, '2024-11-10 02:38:21', '2024-11-10 02:38:21'),
(14, 17, 4, 4, 14, '2024-11-10 02:38:21', '2024-11-10 02:38:21'),
(15, 17, 4, 5, 18, '2024-11-10 02:38:21', '2024-11-10 02:38:21'),
(16, 17, 4, 3, 9, '2024-11-10 03:09:43', '2024-11-10 03:09:43'),
(17, 17, 4, 4, 14, '2024-11-10 03:09:43', '2024-11-10 03:09:43'),
(18, 17, 4, 5, 18, '2024-11-10 03:09:43', '2024-11-10 03:09:43'),
(19, 17, 4, 3, 9, '2024-11-10 04:19:59', '2024-11-10 04:19:59'),
(20, 17, 4, 4, 14, '2024-11-10 04:19:59', '2024-11-10 04:19:59'),
(21, 17, 4, 5, 18, '2024-11-10 04:19:59', '2024-11-10 04:19:59'),
(22, 17, 4, 3, 11, '2024-11-10 04:27:32', '2024-11-10 04:27:32'),
(23, 17, 4, 4, 14, '2024-11-10 04:27:32', '2024-11-10 04:27:32'),
(24, 17, 4, 5, 18, '2024-11-10 04:27:32', '2024-11-10 04:27:32'),
(25, 17, 4, 3, 11, '2024-11-10 04:48:43', '2024-11-10 04:48:43'),
(26, 17, 4, 4, 14, '2024-11-10 04:48:43', '2024-11-10 04:48:43'),
(27, 17, 4, 5, 18, '2024-11-10 04:48:43', '2024-11-10 04:48:43'),
(28, 17, 6, 7, 21, '2024-11-11 00:42:45', '2024-11-11 00:42:45'),
(29, 10, 9, 8, 26, '2024-11-11 01:44:14', '2024-11-11 01:44:14'),
(30, 17, 6, 7, 22, '2024-11-12 01:30:45', '2024-11-12 01:30:45'),
(31, 10, 6, 7, 23, '2024-11-12 02:40:03', '2024-11-12 02:40:03'),
(32, 17, 3, 1, 1, '2024-11-12 13:03:39', '2024-11-12 13:03:39'),
(33, 17, 3, 2, 5, '2024-11-12 13:03:39', '2024-11-12 13:03:39'),
(34, 17, 3, 9, 31, '2024-11-12 13:03:39', '2024-11-12 13:03:39'),
(35, 10, 9, 8, 26, '2024-11-12 13:04:41', '2024-11-12 13:04:41'),
(36, 10, 6, 7, 23, '2024-11-12 13:05:19', '2024-11-12 13:05:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_quiz`
--
ALTER TABLE `batch_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_assign`
--
ALTER TABLE `course_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_options`
--
ALTER TABLE `course_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_students`
--
ALTER TABLE `manage_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_courses` (`courses_id`),
  ADD KEY `fk_department` (`department_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plo`
--
ALTER TABLE `plo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `batch_quiz`
--
ALTER TABLE `batch_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_assign`
--
ALTER TABLE `course_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_options`
--
ALTER TABLE `course_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manage_students`
--
ALTER TABLE `manage_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `plo`
--
ALTER TABLE `plo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quest`
--
ALTER TABLE `quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manage_students`
--
ALTER TABLE `manage_students`
  ADD CONSTRAINT `fk_courses` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
