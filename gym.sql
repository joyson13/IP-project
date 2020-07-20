-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2020 at 06:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(200) NOT NULL,
  `branch_city` varchar(200) DEFAULT NULL,
  `branch_address` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_city`, `branch_address`) VALUES
(101, 'Bandra', 'Carter Road, Bandra West.'),
(102, 'Andheri', 'Versova Beach, Andheri West.'),
(103, 'Borivali', 'Eksar Road, Borivali East.'),
(104, 'Vasai', 'Shivsena Marg, Vasai East.'),
(105, 'Virar', 'Station Road, Virar West.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `phone_no` varchar(200) DEFAULT NULL,
  `branch_id` int(200) DEFAULT NULL,
  `trainer_id` int(200) DEFAULT NULL,
  `plan_id` int(200) DEFAULT NULL,
  `timeslot_id` int(200) DEFAULT NULL,
  `joining_date` date NOT NULL,
  `classes` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `username`, `password`, `age`, `gender`, `phone_no`, `branch_id`, `trainer_id`, `plan_id`, `timeslot_id`, `joining_date`, `classes`) VALUES
(501, 'Alex Hills', 'alexhills@gmail.com', 'alexhills', '12345678', '20', 'Male', '9807896758', 101, 402, 202, 301, '2020-07-20', 'Muscle Building'),
(502, 'Kelly Gracias', 'kelly@gmail.com', 'kellygracias', '12345678', '21', 'Female', '9089789876', 103, 402, 203, 301, '2020-07-20', 'Power Yoga,Aerobics program');

-- --------------------------------------------------------

--
-- Table structure for table `customer_facility_feedback`
--

CREATE TABLE `customer_facility_feedback` (
  `c_f_id` int(200) NOT NULL,
  `customer_id` int(200) NOT NULL,
  `branch_id` int(200) NOT NULL,
  `feedback` text NOT NULL,
  `facility_rating` int(200) DEFAULT NULL,
  `feed_back_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `payment_id` int(200) NOT NULL,
  `customer_id` int(200) NOT NULL,
  `plan_id` int(200) NOT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`payment_id`, `customer_id`, `plan_id`, `payment_date`) VALUES
(6, 501, 202, '2020-07-20'),
(7, 502, 203, '2020-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `customer_routine`
--

CREATE TABLE `customer_routine` (
  `c_r_id` int(200) NOT NULL,
  `customer_id` int(200) NOT NULL,
  `trainer_id` int(200) NOT NULL,
  `routine` text NOT NULL,
  `routine_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_trainer_feedback`
--

CREATE TABLE `customer_trainer_feedback` (
  `c_t_id` int(200) NOT NULL,
  `customer_id` int(200) NOT NULL,
  `trainer_id` int(200) NOT NULL,
  `feedback` text NOT NULL,
  `trainer_rating` int(200) DEFAULT NULL,
  `feedback_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_trainer_feedback`
--

INSERT INTO `customer_trainer_feedback` (`c_t_id`, `customer_id`, `trainer_id`, `feedback`, `trainer_rating`, `feedback_date`) VALUES
(11, 501, 402, 'Excellent routine and diet suggestions.', 4, '2020-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(200) NOT NULL,
  `plan_name` varchar(200) DEFAULT NULL,
  `plan_fee` varchar(200) DEFAULT NULL,
  `plan_duration` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `plan_name`, `plan_fee`, `plan_duration`) VALUES
(201, 'Basic', '300', '1 month'),
(202, 'Quarterly', '700', '3 months'),
(203, 'Mega', '3000', '12 months');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `timeslot_id` int(200) NOT NULL,
  `time_slot` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`timeslot_id`, `time_slot`) VALUES
(301, '8:00 am - 9:00 am'),
(302, '9:00 am - 10:00 am'),
(303, '10:00 am - 11:00 am'),
(304, '11:00 am - 12:00 pm'),
(305, '5:00 pm - 6:00 pm'),
(306, '6:00 pm - 7:00 pm'),
(307, '7:00 pm - 8:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(200) NOT NULL,
  `trianer_name` varchar(200) DEFAULT NULL,
  `trainer_salary` varchar(200) DEFAULT NULL,
  `phone_no` varchar(200) DEFAULT NULL,
  `branch_id` int(200) NOT NULL,
  `timesot_id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trianer_name`, `trainer_salary`, `phone_no`, `branch_id`, `timesot_id`, `username`, `password`) VALUES
(401, 'Lennox Titus', '10000', '8973824762', 101, 301, 'lennoxtitus', '123456\r\n'),
(402, 'Mr.Khan', '10000', '7853973926', 102, 302, 'mrkhan', '123456'),
(403, 'Jeffrey Hayword', '8000', '6872846294', 103, 303, 'jeffreyhayword', '123456'),
(404, 'Paul Machado', '9000', '7658493068', 104, 304, 'paulmachado', '123456'),
(405, 'Gregory Baker', '9000', '7658920382', 105, 305, 'gregorybaker', '123456'),
(406, 'Jacob Ghevito', '8000', '7538964920', 101, 306, 'jacobghevito', '123456'),
(407, 'Vincent Cayman', '10000', '8965793748', 102, 307, 'vincentcayman', '123456'),
(408, 'Maxwell Lord', '8000', '9987657895', 103, 301, 'maxwelllord', '123456'),
(409, 'Harrison Wells', '9000', '9087696854', 104, 302, 'harrisonwells', '123456'),
(410, 'Leslie Halls', '8000', '8098658769', 105, 303, 'lesliehalls', '123456'),
(411, 'Levin Krompton', '9000', '9653827965', 101, 304, 'levinkrompton', '123456'),
(412, 'Kenny Smith', '8000', '8907865896', 102, 305, 'kennysmith', '123456'),
(413, 'Hannibal Lecter', '10000', '9068574634', 103, 306, 'hanniballecter', '123456'),
(414, 'Jack Crawford', '9000', '9089786756', 104, 307, 'jackcrawford', '123456'),
(415, 'Jevino Pauls', '8000', '8798069786', 105, 301, 'jevinopauls', '123456'),
(416, 'Angelo Garcia', '8000', '9896576489', 101, 302, 'angelogarcia', '123456'),
(417, 'Juliano  Nigels', '9000', '9089765878', 102, 303, 'julianonigels', '123456'),
(418, 'Ken Tamplin', '10000', '9879076587', 103, 304, 'kentamplin', '123456'),
(419, 'Freddie Mercury', '10000', '7787658746', 104, 305, 'freddiemercury', '123456'),
(420, 'Clarence Ford', '9000', '9867586543', 105, 306, 'clarenceford', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_login`
--

CREATE TABLE `trainer_login` (
  `tlogin_id` int(200) NOT NULL,
  `trainer_id` int(200) NOT NULL,
  `trainer_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_login`
--

INSERT INTO `trainer_login` (`tlogin_id`, `trainer_id`, `trainer_name`, `password`) VALUES
(1, 401, 'Lennox Titus', '123456'),
(2, 402, 'Mr. Khan', '123456'),
(3, 403, 'Jeffrey Hayword', '123456'),
(4, 404, 'Paul Machado', '123456'),
(5, 405, 'Gregory Baker', '123456'),
(6, 406, 'Jacob Ghevito', '123456'),
(7, 407, 'Vincent Cayman', '123456'),
(8, 408, 'Maxwell Lord', '123456'),
(9, 409, 'Harrison Wells', '123456'),
(10, 410, 'Leslie Halls', '123456'),
(11, 411, 'Levin Krompton', '123456'),
(12, 412, 'Kenny Smith', '123456'),
(13, 413, 'Hannibal Lecter', '123456'),
(14, 414, 'Jack Crawford', '123456'),
(15, 415, 'Jevino Pauls', '123456'),
(16, 416, 'Angelo Garcia', '123456'),
(17, 417, 'Juliano Nigels', '123456'),
(18, 418, 'Ken Tamplin', '123456'),
(19, 419, 'Freddie Mercury', '123456'),
(20, 420, 'Clarence Ford', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_branch` (`branch_id`),
  ADD KEY `fk_trainer` (`trainer_id`),
  ADD KEY `fk_plan` (`plan_id`),
  ADD KEY `fk_timeslot` (`timeslot_id`);

--
-- Indexes for table `customer_facility_feedback`
--
ALTER TABLE `customer_facility_feedback`
  ADD PRIMARY KEY (`c_f_id`),
  ADD KEY `fk_branch` (`branch_id`),
  ADD KEY `fk_customer` (`customer_id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_plan` (`plan_id`),
  ADD KEY `fk_customer` (`customer_id`);

--
-- Indexes for table `customer_routine`
--
ALTER TABLE `customer_routine`
  ADD PRIMARY KEY (`c_r_id`),
  ADD KEY `fk_trainer` (`trainer_id`),
  ADD KEY `fk_customer` (`customer_id`);

--
-- Indexes for table `customer_trainer_feedback`
--
ALTER TABLE `customer_trainer_feedback`
  ADD PRIMARY KEY (`c_t_id`),
  ADD KEY `fk_trainer` (`trainer_id`),
  ADD KEY `fk_customer` (`customer_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`timeslot_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`),
  ADD KEY `fk_branch` (`branch_id`),
  ADD KEY `fk_timeslot` (`timesot_id`);

--
-- Indexes for table `trainer_login`
--
ALTER TABLE `trainer_login`
  ADD PRIMARY KEY (`tlogin_id`),
  ADD KEY `fk_trainer` (`trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `customer_facility_feedback`
--
ALTER TABLE `customer_facility_feedback`
  MODIFY `c_f_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_routine`
--
ALTER TABLE `customer_routine`
  MODIFY `c_r_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer_trainer_feedback`
--
ALTER TABLE `customer_trainer_feedback`
  MODIFY `c_t_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `timeslot_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT for table `trainer_login`
--
ALTER TABLE `trainer_login`
  MODIFY `tlogin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
