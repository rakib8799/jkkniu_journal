-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 08:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkkniu_conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE `admin_information` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Mehedi Khan Rakib', 'mkrakib007@gmail.com', '$2y$10$9UgVCdI0.qLPhRjNIA8IGuhFgijsaF6HsplznThfD56vcDInaXP/y');

-- --------------------------------------------------------

--
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `author_contact_no` varchar(15) NOT NULL,
  `author_password` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_for_paper`
--

CREATE TABLE `call_for_paper` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `doc_file` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `call_for_paper`
--

INSERT INTO `call_for_paper` (`id`, `image1`, `image2`, `image3`, `image4`, `pdf_file`, `doc_file`, `created_at`) VALUES
(1, '652bdf03b4173.jpg', '652bdf03b4176.jpg', '652bdf03b4177.jpg', '652bdf03b4178.jpg', '652bdf03b4179.pdf', '652bdf03b417a.docx', '2023-10-15 06:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `committee_id` int(11) NOT NULL,
  `committee_image` varchar(255) NOT NULL,
  `committee_name` varchar(255) NOT NULL,
  `committee_email` varchar(255) NOT NULL,
  `committee_country` varchar(255) NOT NULL,
  `committee_university` varchar(255) NOT NULL,
  `committee_designation` varchar(255) NOT NULL,
  `committee_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `important_dates`
--

CREATE TABLE `important_dates` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `important_dates`
--

INSERT INTO `important_dates` (`id`, `topic`, `date`) VALUES
(1, 'Abstracts Submission', '20 November, 2023'),
(2, 'Acceptance/ Rejection', '30 November, 2023'),
(3, 'Full Papers Submission', '31 December, 2023'),
(4, 'Registration Starts', '25 December, 2023'),
(6, 'Registration Ends', '2024-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `news_scroller`
--

CREATE TABLE `news_scroller` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_scroller`
--

INSERT INTO `news_scroller` (`id`, `title`, `details`, `created_at`) VALUES
(1, 'News Marquee', '<p><strong>* <span style=\"color: #8B0000;\">Our website is under construction now.</span> Stay tuned for further updates. *</strong></p>\r\n', '2023-10-15 06:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `new_paper`
--

CREATE TABLE `new_paper` (
  `id` int(11) NOT NULL,
  `paper_id` varchar(255) DEFAULT NULL,
  `paper_title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_keywords` varchar(1000) NOT NULL,
  `track` varchar(255) NOT NULL,
  `authors_name` varchar(1000) NOT NULL,
  `authors_affiliation` varchar(1000) NOT NULL,
  `authors_email` varchar(2000) NOT NULL,
  `manuscript_pdf` varchar(255) NOT NULL,
  `paper_status` int(2) NOT NULL,
  `count` int(11) NOT NULL,
  `timestamps` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_form`
--

CREATE TABLE `payment_form` (
  `id` int(11) NOT NULL,
  `paper_id` varchar(255) NOT NULL,
  `paper_title` varchar(255) NOT NULL,
  `track` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_address` varchar(255) NOT NULL,
  `author_country` varchar(255) NOT NULL,
  `author_category` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `payment_form_image` varchar(255) NOT NULL,
  `captcha` varchar(255) NOT NULL,
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speaker_id` int(11) NOT NULL,
  `speaker_image` varchar(255) NOT NULL,
  `speaker_name` varchar(255) NOT NULL,
  `speaker_email` varchar(255) NOT NULL,
  `speaker_country` varchar(255) NOT NULL,
  `speaker_university` varchar(255) NOT NULL,
  `speaker_designation` varchar(255) NOT NULL,
  `speaker_topic` text NOT NULL,
  `speaker_status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_information`
--
ALTER TABLE `admin_information`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `author_information`
--
ALTER TABLE `author_information`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `call_for_paper`
--
ALTER TABLE `call_for_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`committee_id`);

--
-- Indexes for table `important_dates`
--
ALTER TABLE `important_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_scroller`
--
ALTER TABLE `news_scroller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_paper`
--
ALTER TABLE `new_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_form`
--
ALTER TABLE `payment_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`speaker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_information`
--
ALTER TABLE `admin_information`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `call_for_paper`
--
ALTER TABLE `call_for_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `important_dates`
--
ALTER TABLE `important_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_scroller`
--
ALTER TABLE `news_scroller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_paper`
--
ALTER TABLE `new_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_form`
--
ALTER TABLE `payment_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
