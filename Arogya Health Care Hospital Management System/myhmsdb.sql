-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2020 at 02:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`username`, `password`) VALUES
('Sriyantha', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`) VALUES
(4, 1, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'Ganeshan', 550, '2020-02-14', '10:00:00', 1, 0),
(4, 2, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'Dinesh', 700, '2020-02-28', '10:00:00', 0, 1),
(4, 3, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'Amith', 1000, '2020-02-19', '03:00:00', 0, 1),
(11, 4, 'Sharadha', 'Gamage', 'Female', 'sharadha@gmail.com', '0768946252', 'Amith', 1000, '2020-02-29', '20:00:00', 1, 1),
(4, 5, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'Dinesh', 700, '2020-02-28', '12:00:00', 1, 1),
(4, 6, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'Ganeshan', 550, '2020-02-26', '15:00:00', 0, 1),
(2, 8, 'Akasha', 'Bhathiya', 'Female', 'akasha@gmail.com', '0775566123', 'Ganeshan', 550, '2020-03-21', '10:00:00', 1, 1),
(5, 9, 'Gayan', 'Shankararam', 'Male', 'gayan@gmail.com', '0775698743', 'Ganeshan', 550, '2020-03-19', '20:00:00', 1, 0),
(4, 10, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'Ganeshan', 550, '0000-00-00', '14:00:00', 1, 0),
(4, 11, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'Dinesh', 700, '2020-03-27', '15:00:00', 1, 1),
(9, 12, 'William', 'Silva', 'Male', 'william@gmail.com', '0753216542', 'Kumara', 800, '2020-03-26', '12:00:00', 1, 1),
(9, 13, 'William', 'Silva', 'Male', 'william@gmail.com', '0753216542', 'Thiwanka', 450, '2020-03-26', '14:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `contact`, `message`) VALUES
('Sriyantha', 'sriyantha.deepal20@gmail.com', '0762815533', 'Hey Admin'),
(' Viki', 'viki@gmail.com', '0761238529', 'Good Job, Pal'),
('Anya', 'anya@gmail.com', '0775698713', 'How can I reach you?'),
('Akash', 'akash@gmail.com', '0759843217', 'Love your site'),
('Manisha', 'manisha@gmail.com', '0765219843', 'Love your service. Thank you!');

-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE `doctb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dumping data for table `doctb`
INSERT INTO `doctb` (`username`, `password`, `email`, `spec`, `docFees`) VALUES
('Srinathan', 'Srinathan123', 'Srinathan@gmail.com', 'General', 500),
('Aruna', 'Aruna123', 'Aruna@gmail.com', 'Cardiologist', 600),
('Dinesh', 'Dinesh123', 'Dinesh@gmail.com', 'General', 700),
('Ganeshan', 'Ganeshan123', 'Ganeshan@gmail.com', 'Pediatrician', 550),
('Kumara', 'Kumara123', 'Kumara@gmail.com', 'Pediatrician', 800),
('Amith', 'Amith123', 'Amith@gmail.com', 'Cardiologist', 1000),
('Abilasha', 'Abilasha123', 'Abilasha@gmail.com', 'Neurologist', 1500),
('Thiwanka', 'Thiwanka123', 'Thiwanka@gmail.com', 'Pediatrician', 450);



-- Table structure for table `patreg`
CREATE TABLE `patreg` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dumping data for table `patreg`

INSERT INTO `patreg` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`) VALUES
(1, 'Rajitha', 'Kumara', 'Male', 'rajitha@gmail.com', '0765533621', 'rajitha123', 'rajitha123'),
(2, 'Akasha', 'Bhathiya', 'Female', 'akasha@gmail.com', '0775566123', 'akasha123', 'akasha123'),
(3, 'Shanukha', 'khandawala', 'Male', 'shanukha@gmail.com', '0759631453', 'shanukha123', 'shanukha123'),
(4, 'Kishanthan', 'Lal', 'Male', 'kishanthan@gmail.com', '0753217894', 'kishanthan123', 'kishanthan123'),
(5, 'Gayan', 'Shankararam', 'Male', 'gayan@gmail.com', '0775698743', 'gayan123', 'gayan123'),
(6, 'Subhash', 'Silva', 'Male', 'subhash@gmail.com', '0753214562', 'subhash123', 'subhash123'),
(7, 'Dewumi', 'Nanayakkara', 'Female', 'dewumi@gmail.com', '0762514893', 'dewumi123', 'dewumi123'),
(8, 'Kelvin', 'Sebastian', 'Male', 'kelvin@gmail.com', '0759874120', 'kelvin123', 'kelvin123'),
(9, 'William', 'Silva', 'Male', 'william@gmail.com', '0753216542', 'william123', 'william123'),
(10, 'Peter', 'Appuhami', 'Male', 'peter@gmail.com', '0769362815', 'peter123', 'peter123'),
(11, 'Sharadha', 'Gamage', 'Female', 'sharadha@gmail.com', '0768946252', 'sharadha123', 'sharadha123');



-- Table structure for table `prestb`

CREATE TABLE `prestb` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Dumping data for table `prestb`

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Dinesh', 4, 11, 'Kishanthan', 'Lal', '2020-03-27', '15:00:00', 'Cough', 'Nothing', 'Just take a teaspoon of Benadryl every night'),
('Ganeshan', 2, 8, 'Akasha', 'Bhathiya', '2020-03-21', '10:00:00', 'Severe Fever', 'Nothing', 'Take bed rest'),
('Kumara', 9, 12, 'William', 'Silva', '2020-03-26', '12:00:00', 'Sever fever', 'nothing', 'Paracetamol -> 1 every morning and night'),
('Tiwanka', 9, 13, 'William', 'Silva', '2020-03-26', '14:00:00', 'Cough', 'Skin dryness', 'Intake fruits with more water content');



-- Indexes for dumped tables

-- Indexes for table `appointmenttb`
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patreg`
ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `appointmenttb`
ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patreg`
ALTER TABLE `patreg`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
