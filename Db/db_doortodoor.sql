-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20240523.2997b5272e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 12:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_doortodoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_achivement`
--

CREATE TABLE `tbl_achivement` (
  `achevent_id` int(11) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `certificate` varchar(50) NOT NULL,
  `worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_achivement`
--

INSERT INTO `tbl_achivement` (`achevent_id`, `qualification`, `experience`, `certificate`, `worker_id`) VALUES
(1, 'Bsc ', '3', '386304.jpg', 5),
(2, 'Bsc ', '3', '0MwDjq.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `admin_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`) VALUES
(13, 'admin@gmail.com', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'Patients'),
(7, 'Infants'),
(8, 'Elders'),
(9, 'Kids');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `chat_id` int(11) NOT NULL,
  `chat_fromuid` int(11) NOT NULL,
  `chat_touid` int(11) NOT NULL,
  `chat_content` varchar(100) NOT NULL,
  `chat_datetime` varchar(100) NOT NULL,
  `chat_fromwid` int(11) NOT NULL,
  `chat_towid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`chat_id`, `chat_fromuid`, `chat_touid`, `chat_content`, `chat_datetime`, `chat_fromwid`, `chat_towid`) VALUES
(14, 0, 1, 'hi', 'August 23 2024, 10:51 AM', 8, 0),
(15, 1, 0, 'hloo', 'August 23 2024, 10:52 AM', 0, 8),
(16, 0, 1, 'hloo', 'August 23 2024, 10:53 AM', 8, 0),
(17, 1, 0, 'hai', 'August 23 2024, 10:53 AM', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatlist`
--

CREATE TABLE `tbl_chatlist` (
  `chatlist_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `chat_content` varchar(100) NOT NULL,
  `chat_datetime` varchar(100) NOT NULL,
  `chat_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chatlist`
--

INSERT INTO `tbl_chatlist` (`chatlist_id`, `from_id`, `to_id`, `chat_content`, `chat_datetime`, `chat_type`) VALUES
(1, 1, 8, 'hai', '2024-08-23 10:53:25', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `complaint_status` varchar(50) NOT NULL,
  `complaint_reply` varchar(50) NOT NULL,
  `work_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(60) NOT NULL,
  `district_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(14, 'Kollam'),
(15, 'Idukki'),
(16, 'Ernakulam'),
(17, 'Kannur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(60) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `pincode` int(60) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `pincode`, `district_id`) VALUES
(13, 'hgfh', 76786, 13),
(14, 'Ernakulam', 698698, 16),
(15, 'Thiroor', 683567, 14),
(16, 'Pinarayi', 689763, 17),
(17, 'Adimali', 689766, 15),
(18, 'Munnar', 689788, 15),
(19, 'Thalasserry', 689766, 17),
(21, 'Edapally', 698765, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `user_name` varchar(100) NOT NULL,
  `user_rating` varchar(50) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `review_datetime` varchar(50) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`user_name`, `user_rating`, `user_review`, `review_datetime`, `worker_id`, `review_id`) VALUES
('Albin', '5', 'excellent', '2024-08-09 11:28:09', 5, 1),
('Albin', '0', 'very nice', '2024-08-18 13:07:58', 8, 2),
('Abu', '4', 'nicee', '2024-08-23 10:38:52', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcat`
--

CREATE TABLE `tbl_subcat` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcat`
--

INSERT INTO `tbl_subcat` (`subcat_id`, `subcat_name`, `category_id`) VALUES
(6, 'green apple', 3),
(14, 'Paralyzed Patients', 6),
(15, 'Mental Patients', 6),
(16, 'Accidented Person', 6),
(19, 'Mentally Disordered', 7),
(20, ' Have Diseases', 7),
(21, 'Have No Health Problems', 7),
(24, 'CareTaker', 9),
(25, 'Diseased', 9),
(26, 'Pregnant Women', 6),
(27, 'Diseased', 8),
(28, 'Have No Diseases', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `user_contact` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `place_id`, `user_address`, `user_photo`, `user_proof`, `user_password`, `dob`, `user_contact`) VALUES
(1, 'Albin K', 'albineldho2004@gmail.com', 14, '      	      	kaithakoombil            ', '0afe399b3f0a454632c7fea074a3f0cb.jpg', '386304.jpg', '12345', '2024-05-24', '43245635654'),
(3, 'arjunraj', 'arjun@gmail.com', 17, '      	      	kaithakoombil       ', '0afe399b3f0a454632c7fea074a3f0cb.jpg', '0afe399b3f0a454632c7fea074a3f0cb.jpg', '123456', '2024-05-14', '1234567890'),
(6, ' Paul Jose ', 'pauluser@gmail.com', 21, 'Cochin Base\r\nKochi', 'Paul.jpg', 'aadar.jpg', 'pauluser', '1998-06-08', '9998765443');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work`
--

CREATE TABLE `tbl_work` (
  `work_id` int(11) NOT NULL,
  `work_name` varchar(100) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_work`
--

INSERT INTO `tbl_work` (`work_id`, `work_name`, `worker_id`, `subcat_id`, `price`) VALUES
(35, 'Home Cleaning', 8, 28, 6000),
(36, 'Home Nurse', 7, 24, 9000),
(37, 'Home Nurse', 9, 14, 2000),
(39, 'Nurse', 9, 27, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_worker`
--

CREATE TABLE `tbl_worker` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(50) NOT NULL,
  `worker_email` varchar(50) NOT NULL,
  `worker_contact` varchar(60) NOT NULL,
  `worker_password` varchar(50) NOT NULL,
  `worker_photo` varchar(100) NOT NULL,
  `worker_proof` varchar(100) NOT NULL,
  `worker_doj` date NOT NULL,
  `worker_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `worker_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_worker`
--

INSERT INTO `tbl_worker` (`worker_id`, `worker_name`, `worker_email`, `worker_contact`, `worker_password`, `worker_photo`, `worker_proof`, `worker_doj`, `worker_address`, `place_id`, `worker_status`) VALUES
(1, 'arjunraj', 'arjunraj@gmail.com', '', '789', '', '386304.jpg', '2024-05-14', 'radhanivas', 21, 1),
(2, 'arjunraj', 'arjunraj@gmail.com', '', '789', '', '386304.jpg', '2024-05-14', 'radhanivas', 18, 1),
(4, 'Albin K', 'albineldho04@gmail.com', '9874563210', '20004', '', 'download.jpeg', '2024-05-30', '      	      	kaithakoombil            ', 17, 1),
(5, 'Albin K', 'albineldho04@gmail.com', '', 'worker', '', '0afe399b3f0a454632c7fea074a3f0cb.jpg', '2024-05-17', 'kaithakoombil', 15, 2),
(6, 'adarsh', 'adarsh@gmail.com', '', '9999', '', 'WhatsApp Image 2023-12-07 at 19.19.21_04fd2b4a.jpg', '2024-08-30', 'adarsh nilayam', 21, 0),
(7, 'adithyan', 'adithyan@gmail.com', '', '0000', 'manoj monnan.jpg', 'manoj monna 2.jpg', '2024-08-09', 'adithyan villa', 18, 0),
(8, 'adarsh', 'adarsh@gmail.com', '', '123', 'manoj monnan.jpg', 'IMG20240105180643.jpg', '2024-08-26', 'adarsh nilayam', 15, 1),
(9, 'Jizz Mathew', 'jizzworker@gmail.com', '9874563200', 'jizworker', 'jizz.jpg', 'aadar.jpg', '2024-08-23', '      	Kannur Base      ', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workrequest`
--

CREATE TABLE `tbl_workrequest` (
  `workrequest_id` int(11) NOT NULL,
  `workrequest_date` date NOT NULL,
  `work_id` int(11) NOT NULL,
  `workrequest_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_workrequest`
--

INSERT INTO `tbl_workrequest` (`workrequest_id`, `workrequest_date`, `work_id`, `workrequest_status`, `user_id`) VALUES
(1, '2024-07-13', 6, 0, 0),
(2, '2024-07-13', 7, 0, 1),
(3, '2024-07-13', 11, 5, 1),
(4, '2024-07-17', 3, 5, 1),
(5, '2024-07-17', 3, 4, 1),
(6, '2024-07-17', 3, 0, 1),
(7, '2024-07-17', 3, 0, 1),
(8, '2024-07-19', 9, 0, 1),
(9, '2024-08-02', 31, 0, 1),
(10, '2024-08-09', 37, 0, 1),
(11, '2024-08-09', 8, 0, 1),
(12, '2024-08-09', 8, 0, 1),
(13, '2024-08-09', 8, 0, 1),
(14, '2024-08-09', 13, 0, 1),
(15, '2024-08-09', 10, 0, 1),
(16, '2024-08-09', 10, 0, 1),
(17, '2024-08-09', 3, 0, 1),
(18, '2024-08-09', 35, 5, 1),
(19, '2024-08-09', 36, 0, 1),
(20, '2024-08-09', 35, 0, 1),
(21, '2024-08-09', 35, 0, 1),
(22, '2024-08-09', 36, 0, 1),
(23, '2024-08-18', 35, 0, 1),
(24, '2024-08-23', 35, 0, 1),
(25, '2024-08-23', 35, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_achivement`
--
ALTER TABLE `tbl_achivement`
  ADD PRIMARY KEY (`achevent_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_chatlist`
--
ALTER TABLE `tbl_chatlist`
  ADD PRIMARY KEY (`chatlist_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_work`
--
ALTER TABLE `tbl_work`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `tbl_worker`
--
ALTER TABLE `tbl_worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `tbl_workrequest`
--
ALTER TABLE `tbl_workrequest`
  ADD PRIMARY KEY (`workrequest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_achivement`
--
ALTER TABLE `tbl_achivement`
  MODIFY `achevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_chatlist`
--
ALTER TABLE `tbl_chatlist`
  MODIFY `chatlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_work`
--
ALTER TABLE `tbl_work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_worker`
--
ALTER TABLE `tbl_worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_workrequest`
--
ALTER TABLE `tbl_workrequest`
  MODIFY `workrequest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
