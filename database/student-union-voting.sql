-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 07:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-union-voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `user_id`, `status`) VALUES
(1, 'BDU681', 'MTIzMTIz', 'Committee', 'BDU1010685', 'Active'),
(2, 'MNG123', 'MTIzMTIz', 'Main-registrars', 'BDU1010785', 'Active'),
(3, 'ADMN12', 'MTIzMTIz', 'Admin', 'BDU1010885', 'Active'),
(4, 'BDU681', 'MTIzMTIz', 'Candidate', 'BDU1010681', 'Active'),
(5, 'BDU682', 'MTIzMTIz', 'Candidate', 'BDU1010682', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `application-day`
--

CREATE TABLE `application-day` (
  `id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application-day`
--

INSERT INTO `application-day` (`id`, `start_date`, `end_date`, `status`) VALUES
(18, '2022-08-10', '2022-08-16', 'active'),
(19, '2022-08-16', '2022-08-19', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applicent_candidate`
--

CREATE TABLE `applicent_candidate` (
  `id` int(11) NOT NULL,
  `candidate_id` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicent_candidate`
--

INSERT INTO `applicent_candidate` (`id`, `candidate_id`, `status`) VALUES
(23, 'BDU1010681', 'Approve'),
(24, 'BDU1010682', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `candidate-posts`
--

CREATE TABLE `candidate-posts` (
  `id` int(11) NOT NULL,
  `candidate_id` varchar(50) NOT NULL,
  `posted_text` text NOT NULL,
  `image_video_post` text NOT NULL,
  `post_date` date NOT NULL,
  `status` text NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate-posts`
--

INSERT INTO `candidate-posts` (`id`, `candidate_id`, `posted_text`, `image_video_post`, `post_date`, `status`) VALUES
(13, 'BDU1010681', 'Hello i am new, how are you there?', '1.png', '2022-08-18', 'Active'),
(14, 'BDU1010682', 'hello', '4.png', '2022-08-18', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'un_view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `date`, `status`) VALUES
(5, 'Hnokong mengestu', 'hongkonge21@gmailcom', 'information ', 'some information here', '', 'un_view'),
(6, 'selemon', 'selmonnegash34@gmial.com', 'information', 'hello im solomon', '', 'un_view');

-- --------------------------------------------------------

--
-- Table structure for table `election-day`
--

CREATE TABLE `election-day` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election-day`
--

INSERT INTO `election-day` (`id`, `date`) VALUES
(13, '2022-08-13'),
(14, '2022-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE `follower` (
  `id` int(11) NOT NULL,
  `follower_id` varchar(20) NOT NULL,
  `candidate_id` varchar(20) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'follow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`id`, `follower_id`, `candidate_id`, `action`) VALUES
(10, 'BDU1010681', 'BDU1010681', 'follow'),
(11, 'BDU1010685', 'BDU1010681', 'follow');

-- --------------------------------------------------------

--
-- Table structure for table `like-dislike`
--

CREATE TABLE `like-dislike` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `stud_id` varchar(20) NOT NULL,
  `action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like-dislike`
--

INSERT INTO `like-dislike` (`id`, `post_id`, `stud_id`, `action`) VALUES
(20, 13, 'BDU1010681', 'like'),
(21, 13, 'BDU1010682', 'like'),
(22, 13, 'BDU1010685', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `subject` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `message`, `subject`, `date`, `status`) VALUES
(3, 'in these yeare voting yeare is agust 5 2022 ', 'subject', '2022-07-17', 'Active'),
(7, 'hello there to night at 2:00 pm local time have a metting on leacher heel', 'Meeting', '2022-07-21', 'Active'),
(8, 'For all candidates to day they are a metting on LH at local time 02:00 \r\n', 'Meeting ', '2022-08-04', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL DEFAULT 'soneone@gmail.com',
  `department` varchar(50) NOT NULL,
  `cgpa` double NOT NULL,
  `year` varchar(11) NOT NULL,
  `image` text NOT NULL,
  `discipline` varchar(50) NOT NULL DEFAULT 'free from any violation',
  `status` varchar(50) NOT NULL DEFAULT 'not_allowed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `fname`, `lname`, `gender`, `phone`, `email`, `department`, `cgpa`, `year`, `image`, `discipline`, `status`) VALUES
('BDU1010681', 'Rodas', 'Mulugeta', 'Male', '+2519856352', 'soneone@gmail.com', 'Software Engennering', 3.4, '4', 'rodas.jpg', 'free from any violation', 'Allowed'),
('BDU1010682', 'Samson', 'Mulugeta', 'Male', '+2519856353', 'soneone@gmail.com', 'Computer scinse', 3.54, '2', 'samson.jpg', 'free from any violation', 'Allowed'),
('BDU1010683', 'Kaleabe', 'Mulugeta', 'Male', '+2519856354', 'soneone@gmail.com', 'Computer scinse', 3.54, '4', 'kaleabe.jpg', 'free from any violation', 'Allowed'),
('BDU1010684', 'Dawit', 'Pawlos', 'Male', '+2519856355', 'soneone@gmail.com', 'Information Technology', 3.54, '3', 'dawit.jpg', 'free from any violation', 'Allowed'),
('BDU1010685', 'Fana', 'Kaleabe ', 'female', '+2519856356', 'soneone@gmail.com', 'Information Technology', 3.7, '4', 'fana.jpg', 'free from any violation', 'Allowed'),
('BDU1010692', 'Liyu', 'Mulugeta', 'Male', '+2519856353', 'soneoneone@gmail.com', 'Electrical Engineering  ', 3.54, '4', 'samson.jpg', 'free from any violation', 'Allowed'),
('BDU1010693', 'Kaleabe', 'Mulugeta', 'Male', '+2519856354', 'soneone@gmail.com', 'Mechanical Engineering ', 3.54, '4', 'kaleabe.jpg', 'free from any violation', 'not_allowed'),
('BDU1010694', 'Dawit', 'Engeda', 'Male', '+2519856355', 'soneone@gmail.com', 'Electrical Engineering ', 2.54, '3', 'dawit.jpg', 'free from any violation', 'not_allowed'),
('BDU1010695', 'Melat', 'Kaleabe ', 'female', '+2519856356', 'soneone@gmail.com', 'Electrical Engineering ', 3.7, '4', 'fana.jpg', 'free from any violation', 'not_allowed'),
('BDU1010785', 'Mulugeta', 'Pawlos', 'Male', '+2519856352', 'soneoneone@gmail.com', 'Electrical Engineering ', 3.4, '4', 'rodas.jpg', 'free from any violation', 'Allowed'),
('BDU1010791', 'Dawit', 'Engeda', 'Male', '+2519856355', 'soneone@gmail.com', 'Computer Engineering ', 2.54, '3', 'dawit.jpg', 'free from any violation', 'not_allowed'),
('BDU1010794', 'Dawit', 'Engeda', 'Male', '+2519856355', 'soneone@gmail.com', 'Computer Engineering ', 2.54, '3', 'dawit.jpg', 'free from any violation', 'not_allowed'),
('BDU1010795', 'Lulit', 'Kaleabe ', 'Female', '+2519856356', 'soneone@gmail.com', 'Electrical Engineering ', 3.7, '4', 'fana.jpg', 'free from any violation', 'not_allowed'),
('BDU1010799', 'Lulit', 'Kaleabe ', 'Female', '+2519856356', 'soneone@gmail.com', 'Electrical Engineering ', 3.7, '4', 'fana.jpg', 'free from any violation', 'not_allowed'),
('BDU1010885', 'Worku', 'Pawlos', 'Male', '+2519856352', 'soneoneone@gmail.com', 'Inormation System', 3.4, '3', 'rodas.jpg', 'free from any violation', 'Allowed');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` int(11) NOT NULL,
  `Candidate_id` varchar(50) NOT NULL,
  `voter_id` varchar(50) NOT NULL,
  `trial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id`, `Candidate_id`, `voter_id`, `trial`) VALUES
(14, 'BDU1010681', 'BDU1010682', 'vot');

-- --------------------------------------------------------

--
-- Table structure for table `voting_result`
--

CREATE TABLE `voting_result` (
  `id` int(11) NOT NULL,
  `candidate_id` varchar(50) NOT NULL,
  `no_voter` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_result`
--

INSERT INTO `voting_result` (`id`, `candidate_id`, `no_voter`, `status`) VALUES
(8, 'BDU1010681', 1, 'Active'),
(9, 'BDU1010682', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `application-day`
--
ALTER TABLE `application-day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicent_candidate`
--
ALTER TABLE `applicent_candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stud_id` (`candidate_id`);

--
-- Indexes for table `candidate-posts`
--
ALTER TABLE `candidate-posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election-day`
--
ALTER TABLE `election-day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Indexes for table `like-dislike`
--
ALTER TABLE `like-dislike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voter_id` (`voter_id`);

--
-- Indexes for table `voting_result`
--
ALTER TABLE `voting_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `application-day`
--
ALTER TABLE `application-day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `applicent_candidate`
--
ALTER TABLE `applicent_candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `candidate-posts`
--
ALTER TABLE `candidate-posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `election-day`
--
ALTER TABLE `election-day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `follower`
--
ALTER TABLE `follower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `like-dislike`
--
ALTER TABLE `like-dislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `voting_result`
--
ALTER TABLE `voting_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `applicent_candidate`
--
ALTER TABLE `applicent_candidate`
  ADD CONSTRAINT `applicent_candidate_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `candidate-posts`
--
ALTER TABLE `candidate-posts`
  ADD CONSTRAINT `candidate-posts_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `follower`
--
ALTER TABLE `follower`
  ADD CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `like-dislike`
--
ALTER TABLE `like-dislike`
  ADD CONSTRAINT `like-dislike_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `voting_result`
--
ALTER TABLE `voting_result`
  ADD CONSTRAINT `voting_result_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `student` (`stud_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
