-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 08:16 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1000, 'testtwo@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_request`
--

CREATE TABLE `cancel_request` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofvaccine` varchar(255) NOT NULL,
  `timeofvaccine` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `daterequest` varchar(255) NOT NULL,
  `dateapproved` varchar(255) NOT NULL,
  `datevaccinated` varchar(255) NOT NULL,
  `typeofvaccine` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `request1` varchar(255) NOT NULL,
  `datecancel` varchar(255) NOT NULL,
  `cancelstatus` varchar(255) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel_request`
--

INSERT INTO `cancel_request` (`id`, `userid`, `lastname`, `firstname`, `middlename`, `dateofvaccine`, `timeofvaccine`, `dosage`, `daterequest`, `dateapproved`, `datevaccinated`, `typeofvaccine`, `place`, `status1`, `status2`, `unique_id`, `request1`, `datecancel`, `cancelstatus`, `reason`) VALUES
(88, '202241', 'bodino', 'jomar', 'francisco', '2022-11-09', '7:00 am - 5:00 pm', 'First Dose', '2022-11-09', '', '', 'Astrazeneca', 'Payo Plaza', '', '', '202211091667998248202241', '', '2022-11-09', 'Cancelled', ''),
(89, '202241', 'bodino', 'jomar', 'francisco', '2022-11-10', '7:00 am - 5:00 pm', 'Booster', '2022-11-09', '', '', 'Moderna', 'Payo Plaza', '', '', '202211091668001089202241', '', '2022-11-09', 'Cancelled', ''),
(90, '202241', 'bodino', 'jomar', 'francisco', '2022-11-10', '7:00 am - 5:00 pm', 'Booster', '2022-11-09', '', '', 'Moderna', 'Payo Plaza', '', '', '202211091668001198202241', '', '2022-11-09', 'Cancelled', ''),
(91, '202241', 'bodino', 'jomar', 'francisco', '2022-11-11', '7:00 am - 5:00 pm', 'Second Booster', '2022-11-09', '', '', 'Pficer', 'Payo Plaza', '', '', '202211091668001717202241', '', '2022-11-09', 'Cancelled', ''),
(92, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '', '', 'Pficer', 'Payo Plaza', '', '', '202212121670824628202242', '', '2022-12-12', 'Cancelled', 'ewan'),
(93, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '', '', 'Pficer', 'Payo Plaza', '', '', '202212121670826112202242', '', '2022-12-12', 'Cancelled', 'dasdasd'),
(94, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '', '', 'Pficer', 'Payo Plaza', '', '', '202212121670828396202242', '', '2022-12-12', 'Cancelled', ''),
(95, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '', '', 'Pficer', 'Payo Plaza', '', '', '202212121670828531202242', '', '2022-12-12', 'Cancelled', 'triplang'),
(96, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '', '', 'Astrazeneca', 'Payo Plaza', '', '', '202212121670828752202242', '', '2022-12-12', 'Cancelled', 'asdasdasd'),
(97, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '', '', 'Moderna', 'Payo Plaza', '', '', '202212121670828825202242', '', '2022-12-12', 'Cancelled', 'asdasdasd'),
(98, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '', '', 'Moderna', 'Payo Plaza', '', '', '202212121670828893202242', '', '2022-12-12', 'Cancelled', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `typeofvaccine` varchar(255) NOT NULL,
  `firstdose` varchar(255) NOT NULL,
  `firstdosevaccine` varchar(255) NOT NULL,
  `seconddose` varchar(255) NOT NULL,
  `seconddosevaccine` varchar(255) NOT NULL,
  `booster` varchar(255) NOT NULL,
  `boostervaccine` varchar(255) NOT NULL,
  `secondbooster` varchar(255) NOT NULL,
  `secondboostervaccine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `userid`, `unique_id`, `lastname`, `firstname`, `middlename`, `status1`, `typeofvaccine`, `firstdose`, `firstdosevaccine`, `seconddose`, `seconddosevaccine`, `booster`, `boostervaccine`, `secondbooster`, `secondboostervaccine`) VALUES
(12373, '202241', '202211091668001806202241', 'bodino', 'jomar', 'francisco', 'Approved', 'Pficer', 'First Dose', 'Astrazeneca', 'Second Dose', 'Astrazeneca', 'Booster', 'Johnson', 'Second Booster', 'Pficer'),
(12374, '202242', '202212121670828964202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', 'Approved', 'Moderna', 'First Dose', 'Pficer', 'Second Dose', 'Pficer', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `msg_box`
--

CREATE TABLE `msg_box` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `info` varchar(500) NOT NULL,
  `date_of_msg` varchar(255) NOT NULL,
  `notif` varchar(500) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_box`
--

INSERT INTO `msg_box` (`id`, `userid`, `msg`, `info`, `date_of_msg`, `notif`, `reason`) VALUES
(17, '202241', 'Approved Successfully', 'Apply for schedule', '2022-11-09', 'Read', ''),
(18, '202241', 'Cancel successfully', 'Cancel request', '2022-11-09', 'Read', ''),
(19, '202241', 'Approved Successfully', 'Apply for schedule', '2022-11-09', 'Read', ''),
(20, '202241', 'Approved Successfully', 'Apply for schedule', '2022-11-09', 'Read', ''),
(21, '202241', 'Cancel successfully', 'Cancel request', '2022-11-09', 'Read', ''),
(22, '202241', 'Cancel successfully', 'Cancel request', '2022-11-09', 'Read', ''),
(23, '202241', 'Cancel successfully', 'Cancel by admin', '2022-11-09', 'Read', ''),
(24, '202241', 'Approved Successfully', 'Apply for schedule', '2022-11-09', 'Read', ''),
(25, '202241', 'Cancel successfully', 'Cancel by admin', '2022-11-09', 'Read', ''),
(26, '202241', 'Approved Successfully', 'Apply for schedule', '2022-11-09', 'Read', ''),
(27, '202241', 'Cancel successfully', 'Cancel request', '2022-11-09', 'Read', ''),
(28, '202241', 'Approved Successfully', 'Apply for schedule', '2022-11-09', 'Read', ''),
(29, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', ''),
(30, '202242', 'Cancel successfully', 'Cancel request', '2022-12-12', 'Read', ''),
(31, '202242', 'Cancel successfully', 'Cancel by admin', '2022-12-12', 'Read', ''),
(32, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', ''),
(33, '202242', 'Cancel successfully', 'Cancel request', '2022-12-12', 'Read', 'dasdasd'),
(34, '202242', 'Cancel successfully', 'Cancel by admin', '2022-12-12', 'Read', 'asdasdasd'),
(35, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', ''),
(36, '202242', 'Cancel successfully', 'Cancel request', '2022-12-12', 'Read', ''),
(37, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', ''),
(38, '202242', 'Cancel successfully', 'Cancel request', '2022-12-12', 'Read', 'triplang'),
(39, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', ''),
(40, '202242', 'Cancel successfully', 'Cancel by admin', '2022-12-12', 'Read', 'basta'),
(41, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', ''),
(42, '202242', 'Cancel successfully', 'Cancel request', '2022-12-12', 'Read', 'asdasdasd'),
(43, '202242', 'Cancel successfully', 'Cancel by admin', '2022-12-12', 'Read', 'asdasdasdc asdc'),
(44, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', ''),
(45, '202242', 'Cancel successfully', 'Cancel request', '2022-12-12', 'Read', 'asdasd'),
(46, '202242', 'Approved Successfully', 'Apply for schedule', '2022-12-12', 'Read', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(255) NOT NULL,
  `dateofvaccine` varchar(255) NOT NULL,
  `timeofvaccine` varchar(255) NOT NULL,
  `typeofvaccine` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `dateofvaccine`, `timeofvaccine`, `typeofvaccine`, `dosage`, `place`) VALUES
(1109, '2022-11-09', '7:00 am - 5:00 pm', 'Pficer, Johnson, Moderna, Astrazeneca', 'First Dose', 'Payo Plaza'),
(1110, '2022-11-10', '7:00 am - 5:00 pm', 'Pficer, Johnson, Moderna, Astrazeneca', 'Booster', 'Payo Plaza'),
(1111, '2022-11-11', '7:00 am - 5:00 pm', 'Pficer, Johnson, Moderna', 'Second Booster', 'Payo Plaza'),
(1112, '2022-12-12', '7:00 am - 5:00 pm', 'Pficer, Johnson, Moderna, Astrazeneca', 'First Dose', 'Payo Plaza'),
(1113, '2022-12-13', '7:00 am - 5:00 pm', 'Pficer, Johnson, Moderna, Astrazeneca', 'Booster', 'Payo Plaza'),
(1114, '2022-12-14', '7:00 am - 5:00 pm', 'Pficer, Johnson, Moderna, Astrazeneca', 'Second Booster', 'Payo Plaza');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `userid` int(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vaccine_status` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `firstdose` varchar(255) NOT NULL,
  `seconddose` varchar(255) NOT NULL,
  `booster` varchar(255) NOT NULL,
  `secondbooster` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`userid`, `lastname`, `firstname`, `middlename`, `dateofbirth`, `age`, `gender`, `address1`, `placeofbirth`, `civilstatus`, `contact`, `email`, `password`, `vaccine_status`, `dosage`, `firstdose`, `seconddose`, `booster`, `secondbooster`) VALUES
(202241, 'bodino', 'jomar', 'francisco', '1996-04-18', '26 years old', 'Male', 'buhi, san miguel catanduanes', 'patiis, san mateo rizal', 'Single', '09123765172', 'j@gmail.com', '202cb962ac59075b964b07152d234b70', 'Approved', 'Second Booster', 'First Dose', 'Second Dose', 'Booster', 'Second Booster'),
(202242, 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2000-12-04', '22 years old', 'Male', 'asdasdasdasd', 'asdasd', 'Single', '12312312312', 'jak@gmail.com', '202cb962ac59075b964b07152d234b70', 'Approved', 'Booster', 'First Dose', 'Second Dose', 'Booster', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_records`
--

CREATE TABLE `user_records` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofvaccine` varchar(255) NOT NULL,
  `timeofvaccine` varchar(255) NOT NULL,
  `typeofvaccine` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_records`
--

INSERT INTO `user_records` (`id`, `userid`, `lastname`, `firstname`, `middlename`, `dateofvaccine`, `timeofvaccine`, `typeofvaccine`, `place`, `dosage`, `status1`) VALUES
(101111, '202241', 'bodino', 'jomar', 'francisco', '2022-11-09', '7:00 am - 5:00 pm', 'Astrazeneca', 'Payo Plaza', 'First Dose', 'Confirmed'),
(101112, '202241', 'bodino', 'jomar', 'francisco', '2022-11-09', '7:00 am - 5:00 pm', 'Astrazeneca', 'Payo Plaza', 'Second Dose', 'Confirmed'),
(101113, '202241', 'bodino', 'jomar', 'francisco', '2022-11-09', '7:00 am - 5:00 pm', 'Johnson', 'Payo Plaza', 'Booster', 'Confirmed'),
(101114, '202241', 'bodino', 'jomar', 'francisco', '2022-11-09', '7:00 am - 5:00 pm', 'Pficer', 'Payo Plaza', 'Second Booster', 'Confirmed'),
(101115, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '8:00 am - 5:00 pm', 'Pficer', 'Payo Plaza', 'First Dose', 'Confirmed'),
(101116, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'Pficer', 'Payo Plaza', 'Second Dose', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dateofvaccine` varchar(255) NOT NULL,
  `timeofvaccine` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `daterequest` varchar(255) NOT NULL,
  `dateapproved` varchar(255) NOT NULL,
  `datevaccinated` varchar(255) NOT NULL,
  `typeofvaccine` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `status3` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `request1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `userid`, `lastname`, `firstname`, `middlename`, `dateofvaccine`, `timeofvaccine`, `dosage`, `daterequest`, `dateapproved`, `datevaccinated`, `typeofvaccine`, `place`, `status1`, `status2`, `status3`, `unique_id`, `request1`) VALUES
(441, '202241', 'bodino', 'jomar', 'francisco', '2022-11-09', '7:00 am - 5:00 pm', 'First Dose', '2022-11-09', '2022-11-09', '', 'Astrazeneca', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202211091667998248202241', ''),
(442, '202241', 'bodino', 'jomar', 'francisco', '2022-11-09', '7:00 am - 5:00 pm', 'First Dose', '2022-11-09', '2022-11-09', '', 'Astrazeneca', 'Payo Plaza', 'Approved', '', 'Approved', '202211091668000823202241', '2022-11-09'),
(443, '202241', 'bodino', 'jomar', 'francisco', '2022-11-10', '7:00 am - 5:00 pm', 'Booster', '2022-11-09', '2022-11-09', '', 'Moderna', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202211091668001089202241', ''),
(444, '202241', 'bodino', 'jomar', 'francisco', '2022-11-10', '7:00 am - 5:00 pm', 'Booster', '2022-11-09', '', '', 'Moderna', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202211091668001198202241', ''),
(445, '202241', 'bodino', 'jomar', 'francisco', '2022-11-10', '7:00 am - 5:00 pm', 'Booster', '2022-11-09', '', '', 'Moderna', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202211091668001375202241', ''),
(446, '202241', 'bodino', 'jomar', 'francisco', '2022-11-10', '7:00 am - 5:00 pm', 'Booster', '2022-11-09', '2022-11-09', '', 'Johnson', 'Payo Plaza', 'Approved', '', 'Approved', '202211091668001476202241', '2022-11-10'),
(447, '202241', 'bodino', 'jomar', 'francisco', '2022-11-11', '7:00 am - 5:00 pm', 'Second Booster', '2022-11-09', '', '', 'Pficer', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202211091668001687202241', ''),
(448, '202241', 'bodino', 'jomar', 'francisco', '2022-11-11', '7:00 am - 5:00 pm', 'Second Booster', '2022-11-09', '2022-11-09', '', 'Pficer', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202211091668001717202241', ''),
(449, '202241', 'bodino', 'jomar', 'francisco', '2022-11-11', '7:00 am - 5:00 pm', 'Second Booster', '2022-11-09', '2022-11-09', '', 'Pficer', 'Payo Plaza', 'Approved', '', 'Approved', '202211091668001806202241', '2022-11-11'),
(450, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '2022-12-12', '', 'Pficer', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670824628202242', ''),
(451, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '', '', 'Johnson', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670825894202242', ''),
(452, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '2022-12-12', '', 'Pficer', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670826112202242', ''),
(453, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '', '', 'Pficer', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670828306202242', ''),
(454, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '2022-12-12', '', 'Pficer', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670828396202242', ''),
(455, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '2022-12-12', '', 'Pficer', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670828531202242', ''),
(456, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-12', '7:00 am - 5:00 pm', 'First Dose', '2022-12-12', '2022-12-12', '', 'Pficer', 'Payo Plaza', 'Approved', '', 'Approved', '202212121670828602202242', '2022-12-12'),
(457, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '', '', 'Johnson', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670828711202242', ''),
(458, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '2022-12-12', '', 'Astrazeneca', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670828752202242', ''),
(459, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '', '', 'Moderna', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670828825202242', ''),
(460, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '2022-12-12', '', 'Moderna', 'Payo Plaza', 'Cancelled', '', 'Cancelled', '202212121670828893202242', ''),
(461, '202242', 'agfsdhgf', 'uyshgdfhsdf', 'jhsfdfhgsfdf', '2022-12-13', '7:00 am - 5:00 pm', 'Booster', '2022-12-12', '2022-12-12', '', 'Moderna', 'Payo Plaza', 'Approved', '', 'Approved', '202212121670828964202242', '2022-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinetype`
--

CREATE TABLE `vaccinetype` (
  `id` int(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `typeofvaccine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccinetype`
--

INSERT INTO `vaccinetype` (`id`, `date1`, `typeofvaccine`) VALUES
(394, '2022-11-09', 'Pficer'),
(395, '2022-11-09', 'Johnson'),
(396, '2022-11-09', 'Moderna'),
(397, '2022-11-09', 'Astrazeneca'),
(398, '2022-11-10', 'Pficer'),
(399, '2022-11-10', 'Johnson'),
(400, '2022-11-10', 'Moderna'),
(401, '2022-11-10', 'Astrazeneca'),
(402, '2022-11-11', 'Pficer'),
(403, '2022-11-11', 'Johnson'),
(404, '2022-11-11', 'Moderna'),
(405, '2022-12-12', 'Pficer'),
(406, '2022-12-12', 'Johnson'),
(407, '2022-12-12', 'Moderna'),
(408, '2022-12-12', 'Astrazeneca'),
(409, '2022-12-13', 'Pficer'),
(410, '2022-12-13', 'Johnson'),
(411, '2022-12-13', 'Moderna'),
(412, '2022-12-13', 'Astrazeneca'),
(413, '2022-12-14', 'Pficer'),
(414, '2022-12-14', 'Johnson'),
(415, '2022-12-14', 'Moderna'),
(416, '2022-12-14', 'Astrazeneca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel_request`
--
ALTER TABLE `cancel_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg_box`
--
ALTER TABLE `msg_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_records`
--
ALTER TABLE `user_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccinetype`
--
ALTER TABLE `vaccinetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `cancel_request`
--
ALTER TABLE `cancel_request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12375;

--
-- AUTO_INCREMENT for table `msg_box`
--
ALTER TABLE `msg_box`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1115;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202243;

--
-- AUTO_INCREMENT for table `user_records`
--
ALTER TABLE `user_records`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101117;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT for table `vaccinetype`
--
ALTER TABLE `vaccinetype`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
