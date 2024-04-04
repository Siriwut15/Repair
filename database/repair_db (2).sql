-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 12:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repair_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_case`
--

CREATE TABLE `tbl_case` (
  `case_id` int(11) NOT NULL COMMENT 'PK',
  `user_id` int(11) NOT NULL COMMENT 'tbl_login',
  `status_id` int(11) NOT NULL DEFAULT 1 COMMENT 'tbl_status',
  `tec_id` int(11) NOT NULL COMMENT 'ช่าง',
  `name_case` varchar(100) NOT NULL COMMENT 'แจ้งซ่อม',
  `detail_case` varchar(250) NOT NULL COMMENT 'รายละเอียด',
  `place_case` varchar(100) NOT NULL COMMENT 'สถานที่',
  `date_case` timestamp NULL DEFAULT current_timestamp() COMMENT 'วันที่แจ้งซ่อม',
  `date_assign` timestamp NULL DEFAULT NULL COMMENT 'วันที่ส่งมอบงาน',
  `date_sent` timestamp NULL DEFAULT NULL COMMENT 'วันที่รับงาน',
  `date_close` timestamp NULL DEFAULT NULL COMMENT 'วันที่ปิดงาน',
  `date_period` varchar(50) NOT NULL COMMENT 'ระยะเวลา',
  `img_case` text DEFAULT NULL COMMENT 'รูปเคสงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_case`
--

INSERT INTO `tbl_case` (`case_id`, `user_id`, `status_id`, `tec_id`, `name_case`, `detail_case`, `place_case`, `date_case`, `date_assign`, `date_sent`, `date_close`, `date_period`, `img_case`) VALUES
(2, 9, 4, 3, 'Notebook ชาทแบตไม่เข้า', 'เสียสายแล้วไฟสถานะไม่ขึ้น', 'Zone B ', '2024-03-19 15:16:46', '2024-03-19 15:20:43', '2024-03-19 15:21:35', '2024-03-19 15:24:00', '', NULL),
(3, 6, 4, 3, 'หิวข้าว', 'IT มาซื้อข้าวให้หน่อย', 'Server IT', '2024-03-20 02:47:32', '2024-03-20 03:09:02', '2024-03-20 03:09:29', '2024-03-20 03:41:52', '', NULL),
(4, 9, 4, 4, 'เครื่องปริ้นๆไม่ออกkaree', 'ไม่รู้เป็นอะไร', 'Zone B ', '2024-03-20 04:17:20', '2024-03-20 04:18:35', '2024-03-20 04:19:25', '2024-03-20 04:26:07', '', NULL),
(13, 9, 4, 5, 'เครื่องปริ้นพัง', 'ปริ้นเตอร์ hp pro 400', 'จัดซื้อ', '2024-04-03 08:02:39', '2024-04-03 08:04:24', '2024-04-03 08:06:18', '2024-04-03 08:19:02', '', NULL),
(15, 27, 1, 0, 'เครื่องปริ้นพัง', 'ปริ้นเตอร์ hp laser jet p1102', 'ห้องประชุม', '2024-04-04 03:41:39', NULL, NULL, NULL, '', ''),
(16, 9, 1, 0, 'psuเสีย', 'เครื่อง Dell pc', 'King Back', '2024-04-04 04:05:07', NULL, NULL, NULL, '', 'images.jfif'),
(17, 10, 1, 0, 'เครื่องปริ้นพัง ', 'ปริ้นเตอร์ Epson L3210', 'Zone A', '2024-04-04 06:21:14', NULL, NULL, NULL, '', '111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `user_id` int(11) NOT NULL COMMENT 'PK',
  `username` varchar(20) NOT NULL COMMENT 'ไอดี',
  `password` varchar(200) NOT NULL COMMENT 'รหัสผ่าน',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `user_level` varchar(20) NOT NULL COMMENT 'สถานะ',
  `u_name` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `u_lastname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `u_tel` varchar(20) NOT NULL COMMENT 'เบอร์โทร',
  `u_email` varchar(50) NOT NULL COMMENT 'อีเมล์',
  `u_img` varchar(200) DEFAULT NULL COMMENT 'รูปภาพ',
  `u_que` varchar(30) DEFAULT NULL,
  `u_ans` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `username`, `password`, `user_status`, `user_level`, `u_name`, `u_lastname`, `u_tel`, `u_email`, `u_img`, `u_que`, `u_ans`) VALUES
(1, 'admin', 'admin', 0, 'admin', 'admin ', 'admin ', '272', 'admin@hotmail.com', NULL, 'สัตว์เลี้ยงที่ชอบ', 'ไก่'),
(2, 'worker01', 'worker01', 1, 'worker', 'บิว', 'IT', '272', 'worker01@gmail.com', '1710173980.png', NULL, NULL),
(3, 'worker02', 'worker02', 1, 'worker', 'เบนซ์', 'IT', '288', 'benz@gmail.com', '1710174147.png', 'หนูที่เลี้ยงชื่ออะไร', 'ตุ้งตุิ้ง'),
(4, 'worker03', 'worker03', 1, 'worker', 'ต้น', 'IT', '289', 'Ton@gmail.com', '1710174180.png', NULL, NULL),
(5, 'worker04', 'worker04', 1, 'worker', 'โซ่', 'IT', '290', 'So@gmail.com', 'worker.png', NULL, NULL),
(6, 'emp01', 'emp01', 1, 'employee', 'Bew', 'Eiei', '833', 'employee1@hotmail.com', NULL, NULL, NULL),
(9, 'emp03', 'emp03', 1, 'employee', 'เบนซ์', 'ซอย 11', '811', 'emp03@gmail.com', NULL, NULL, NULL),
(10, 'emp04', 'emp04', 1, 'employee', 'Bew', 'Siriwut', '999', 'Bew@gmail.com', NULL, NULL, NULL),
(11, 'emp5', 'emp5', 1, 'employee', 'employee', 'employee', 'employee', 'employee112@hotmail.com', NULL, NULL, NULL),
(18, 'benz', '123456', 1, 'employee', 'benz', 'zaza', '222', 'benz@benz', NULL, NULL, NULL),
(21, 'benz', '1234', 1, 'worker', 'ben', 'IT', '277', 'benza@ben', 'worker.png', NULL, NULL),
(22, 'winwin1', '123456', 1, 'admin', 'win', 'winwin', '0892512549', 'winza@gmail.com', NULL, NULL, NULL),
(23, 'winwin2', '123456', 0, 'worker', 'winwin2', 'winwin2', '0891256987', 'winwin2@gmail.com', NULL, NULL, NULL),
(24, 'winwin3', '12345678', 1, 'employee', 'winwin3', 'winwin3', '123456', 'winwin3@gmail.com', NULL, 'สัตว์เลี้ยงที่ชอบ', 'วัว'),
(25, 'winwin', '2f17ccba', 0, 'admin', 'win', 'win', '0831516594', 'win@gmail.com', NULL, 'aa', 'aa'),
(27, 'bew15', '123456', 1, 'employee', 'siriwut', 'chamsiri', '999', 'bewna@gmail.com', NULL, 'แมวชื่ออะไร', 'กาฟิว');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_name`) VALUES
(1, 'รอดำเนินการ'),
(2, 'กำลังดำเนินการ'),
(3, 'กำลังซ่อม '),
(4, 'ซ่อมเสร็จแล้ว ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_case`
--
ALTER TABLE `tbl_case`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_case`
--
ALTER TABLE `tbl_case`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
