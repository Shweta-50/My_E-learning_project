-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 07:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Email`, `Password`) VALUES
(1, 'Admin', 'Admin@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `C_Name` varchar(255) NOT NULL,
  `C_desk` text NOT NULL,
  `C_author` varchar(255) NOT NULL,
  `C_img` varchar(255) NOT NULL,
  `C_duration` varchar(255) NOT NULL,
  `C_price` int(255) NOT NULL,
  `C_original_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `C_Name`, `C_desk`, `C_author`, `C_img`, `C_duration`, `C_price`, `C_original_price`) VALUES
(4, 'JAVASCRIPT', 'In this course you learn basic to advance javascript.', ' Deo Watson', '../images/courseimg/jss.jpg', '40 hours', 3000, 5000),
(6, 'PHP for Beginners', 'PHP for Beginners: learn everything you need to become a professional PHP developer.', ' Donal Dike', '../images/courseimg/unnamed.jpg', '60 hours', 2800, 4000),
(7, 'ARTIFICIAL INTELLIGENCE', 'Learn how to create powerful AI for Real-World applications.', ' John Doe', '../images/courseimg/a-i.png', '40 hours', 3500, 5000),
(8, 'JAVA PROGRAMMING', 'Learn Java In This Course And Become a Computer Programmer.', ' Tim Buchalka', '../images/courseimg/java.jpg', '80 hours', 3500, 4480),
(9, ' DATA ANALYSIS', 'Build your Data Analysis and Visualization skills with Python’s Pandas.', ' Dr. Ryan Ahmed', '../images/courseimg/data.png', '21 hours', 1500, 2000),
(10, 'PYTHON', 'Go from zero to hero in Python in weeks! Learn Python in an easy way. ', ' Ardit Sulce', '../images/courseimg/V1.jpg', '30 hours', 1200, 3000),
(12, 'MASTER BOOTSTRAP', 'Master Bootstrap 4 and build 5 real world themes while learning HTML5 semantics & CSS3.', ' Jappe Jensen', '../images/courseimg/bootstrap.jpg', '20 hours', 2500, 3000),
(13, 'REACT JS for Beginners', 'Step by step learns React JS.', ' Zachary Reece', '../images/courseimg/reactjs-main.jpg', '40 hours', 1500, 2250),
(14, 'NODE JS-for Beginners', 'Build an Amazing CMS system - Using Express + MongoDB + Bootstrap + AJAX.', ' Edwin Diaz', '../images/courseimg/node-js-.jpeg', '23 hours', 3000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `stu_email` varchar(200) NOT NULL,
  `course_id` int(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `respmsg` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `order_date`, `amount`) VALUES
(26, 'ORDS81673782', 'sweety@gmail.com', 4, 'TXN_SUCCESS', 'Txn success', '2021-07-16 18:30:00', 3000),
(27, 'ORDS78964294', 'sweety@gmail.com', 10, 'TXN_SUCCESS', 'Txn success', '2021-07-16 18:30:00', 1200),
(29, 'ORDS66274860', 'shah@gmail.com', 10, 'TXN_SUCCESS', 'Txn success', '2021-07-19 05:11:58', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(50) NOT NULL,
  `f_content` text NOT NULL,
  `stu_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(14, 'Amazing work, your content is fabulous, I enjoyed the entire course. Thank you so much for providing valuable content.  ', 9),
(15, 'Your Course is amazing and I loved your content and the way of teaching. Thank you so much, sir.', 11),
(17, 'It was so challenging and full of knowledge! I have learned a lot from this course.', 13),
(18, 'Colt is the best instructor, respect! He explains everything that way so you get it instantly.', 8),
(19, 'Best Course if you have no experience in programming, Covers a lot of topics here.', 14);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_desc` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(14, 'Introduction of AI.', 'In this video, we can learn \"What is ARTIFICIAL INTELLIGENCE\".', '../lessonvid/ai-1.m4v', 7, 'ARTIFICIAL INTELLIGENCE'),
(15, 'What to Expect from AI.', 'what we can Expect from Artificial intelligence.', '../lessonvid/Introduction  What To Expect From Ai-1.m4v', 7, 'ARTIFICIAL INTELLIGENCE'),
(16, 'Introduction of Java.', 'In this video, we can learn about java and how to installing java(JDK). ', '../lessonvid/Java Tutorial For Beginners 1 - Introduction And Installing The Java (Jdk) Step -1.m4v', 8, 'JAVA PROGRAMMING'),
(17, 'Creating first java project.', 'Learn how we are creating the first java project.', '../lessonvid/Java Tutorial For Beginners 3 - Creating First Java Project In Eclipse Ide-1.m4v', 8, 'JAVA PROGRAMMING'),
(18, 'Introduction of Data Analysis.', 'Build your Data Analysis and Visualization skills with Python’s Pandas.', '../lessonvid/Intro To Data Analysis   Visualization With Python.m4v', 9, ' DATA ANALYSIS'),
(23, 'Introduction of python', 'In this video, we learn python introduction.', '../lessonvid/Getting Started with Python 3.8.mp4', 10, 'PYTHON'),
(24, 'Python Variables & Expression', 'We learn Python Variables & Expression in this video.', '../lessonvid/Variables & Expression - Python Complete Tutorial Series - 2.mp4', 10, 'PYTHON'),
(27, 'Introduction of React Js.', 'In this video, we learn a basic introduction to React Js.', '../lessonvid/', 13, 'REACT JS for Beginners'),
(29, 'Introduction to Node JS.', 'In this video, we learn a basic introduction about Node Js.', '../lessonvid/What is Node.js - Node.js Basics [02] - Java Brains.mp4', 14, 'NODE JS-for Beginners'),
(32, 'Introduction to Bootstrap.', 'In this video, we learn a basic introduction to Bootstrap.', '../lessonvid/Bootstrap Tutorial for Beginners - 01 - Introduction.mp4', 12, 'MASTER BOOTSTRAP'),
(33, 'Introduction to PHP', 'In this video, we learn about basic introduction to PHP.', '../lessonvid/php1.mp4', 6, 'PHP for Beginners'),
(34, 'Arrays in PHP', 'Learn Arrays in PHP.', '../lessonvid/php arrays.mp4', 6, 'PHP for Beginners'),
(35, 'Introduction to Javascript.', 'In this video, we learn a basic introduction to Javascript.', '../lessonvid/js1.mp4', 4, 'JAVASCRIPT'),
(36, 'what is DOM?', 'Learn document object model in javascript.', '../lessonvid/dom js.mp4', 4, 'JAVASCRIPT');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `stu_occp` varchar(50) NOT NULL,
  `stu_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `Name`, `Phone`, `Email`, `Password`, `stu_occp`, `stu_img`) VALUES
(8, ' Shweta', '8263428293', 'sweety@gmail.com', '1234567890', 'Web Designer', 'stu_profile/circle-cropped.png'),
(9, ' Mishthi', '9120699987', 'shw@gmail.com', '12345', 'Web Developer', 'stu_profile/person3.png'),
(11, ' Shah', '9120699927', 'shah@gmail.com', '123456', 'Full Stack Developer', 'stu_profile/person-2.png'),
(13, ' Harry', '4356758949', 'harry@gmail.com', 'harry@123', 'Data Analytic', 'stu_profile/person4.png'),
(14, ' Avantika', '9120678543', 'avi@gmail.com', 'avi@123', 'Senior Web Developer', 'stu_profile/person-5.png'),
(16, 'ss', '1224325673356', 'ss@gmail.com', '1234', '', ''),
(17, 'Ironman', '7071967998', 'ironman@gmail.com', '12345', '', ''),
(18, 'Aarohi', '9580567896', 'aarohi@gmail.com', 'aarohi@123', '', ''),
(19, 'gg', '1234567893', 'gg@gmail.com', '123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(255) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_pass` varchar(255) NOT NULL,
  `stu_occ` varchar(50) NOT NULL,
  `stu_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(1, 'sonam', 'sonam@gmail.com', 'sonam@1234', '', ''),
(2, 'devil', 'devil@gmail.com', 'davil@1234', 'web designer', ''),
(4, 'sammar', 'sammar@gmail.com', 'sammar@1234', 'Web Developer', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
