-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 09:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'vinesh', 'vinesh');

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `id` int(255) NOT NULL,
  `CompId` varchar(255) NOT NULL,
  `CompName` varchar(255) NOT NULL,
  `CompAddress` varchar(255) NOT NULL,
  `DataDir` varchar(255) NOT NULL,
  `branchName` varchar(255) NOT NULL,
  `BegYear` varchar(255) NOT NULL,
  `EndYear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`id`, `CompId`, `CompName`, `CompAddress`, `DataDir`, `branchName`, `BegYear`, `EndYear`) VALUES
(1, 'MHSSGH', 'M.H. SABOO SIDDIQUE MATERNITY & GENERAL HOSPITAL', 'Opp. Moghal Masjid, Imamwada Road, Mumbai-400009', '2015', 'MUMBAI', '01-04-2015', '31-03-2016'),
(2, 'MHSSGH', 'M.H. SABOO SIDDIQUE MATERNITY & GENERAL HOSPITAL', 'Opp. Moghal Masjid, Imamwada Road, Mumbai-400009', '2016', 'MUMBAI', '01-04-2016', '31-03-2017');

-- --------------------------------------------------------

--
-- Table structure for table `logfile`
--

CREATE TABLE `logfile` (
  `SrNo` int(255) NOT NULL,
  `LogDate` datetime NOT NULL,
  `LogTime` char(10) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `ModuleName` varchar(255) NOT NULL,
  `ActionDone` varchar(255) NOT NULL,
  `Detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logfile`
--

INSERT INTO `logfile` (`SrNo`, `LogDate`, `LogTime`, `UserName`, `ModuleName`, `ActionDone`, `Detail`) VALUES
(1, '2020-02-20 00:00:00', '1582193865', '', '', '/Payroll/company.php', ''),
(2, '2020-02-20 00:00:00', '1582196094', '', '', '/Payroll/company.php', ''),
(3, '2020-02-20 00:00:00', '1582196690', '', '', '/Payroll/company.php', ''),
(4, '2020-02-20 00:00:00', '1582197056', '', '', '/Payroll/company.php', ''),
(5, '2020-02-20 00:00:00', '1582200435', 'M.H. SABOO SIDDIQUE MATERNITY ', '', '/Payroll/company.php', ''),
(6, '2020-02-22 00:00:00', '1582352150', 'M.H. SABOO SIDDIQUE MATERNITY ', '', '/Payroll/company.php', ''),
(7, '2020-02-22 00:00:00', '1582358791', 'M.H. SABOO SIDDIQUE MATERNITY ', '', '/Payroll/company.php', ''),
(8, '2020-02-22 00:00:00', '1582364775', 'vinesh', '', '/Payroll/company.php', ''),
(9, '2020-02-22 00:00:00', '1582371548', 'vinesh', '', '/Payroll/company.php', ''),
(10, '2020-02-22 00:00:00', '1582371623', 'vinesh', '', '/Payroll/company.php', ''),
(11, '2020-02-22 00:00:00', '1582379508', 'vinesh', '', '/Payroll/company.php', ''),
(12, '2020-02-24 00:00:00', '1582525944', 'vinesh', '', '/Payroll/company.php', ''),
(13, '2020-02-25 00:00:00', '1582617908', 'vinesh', '', '/Payroll/company.php', ''),
(14, '2020-02-25 00:00:00', '1582634472', 'vinesh', '', '/Payroll/company.php', ''),
(15, '2020-02-25 00:00:00', '1582636713', 'vinesh', '', '/Payroll/company.php', ''),
(16, '2020-02-26 00:00:00', '1582699957', 'vinesh', '', '/Payroll/company.php', ''),
(17, '2020-02-26 00:00:00', '1582720562', 'vinesh', '', '/Payroll/company.php', ''),
(18, '2020-02-27 00:00:00', '1582787023', 'vinesh', '', '/Payroll/company.php', ''),
(19, '2020-02-29 00:00:00', '1582992417', 'vinesh', '', '/payroll/company.php', ''),
(20, '2020-03-01 00:00:00', '1583042872', 'vinesh', '', '/payroll/company.php', ''),
(21, '2020-03-01 00:00:00', '1583060481', 'vinesh', '', '/payroll/company.php', ''),
(22, '2020-03-02 00:00:00', '1583165886', 'vinesh', '', '/payroll/company.php', ''),
(23, '2020-03-02 00:00:00', '1583170092', 'vinesh', '', '/payroll/company.php', ''),
(24, '2020-03-02 00:00:00', '1583170255', 'vinesh', '', '/payroll/company.php', ''),
(25, '2020-03-10 00:00:00', '1583846299', 'vinesh', '', '/payroll/company.php', ''),
(26, '2020-03-15 00:00:00', '1584256812', 'vinesh', '', '/payroll/company.php', ''),
(27, '2020-03-23 00:00:00', '1584963930', 'vinesh', '', '/payroll/company.php', ''),
(28, '2020-03-24 00:00:00', '1585045563', 'vinesh', '', '/payroll/company.php', ''),
(29, '2020-03-25 00:00:00', '1585135433', 'vinesh', '', '/payroll/company.php', ''),
(30, '2020-03-26 00:00:00', '1585205160', 'vinesh', '', '/payroll/company.php', ''),
(31, '2020-03-27 00:00:00', '1585328246', 'vinesh', '', '/payroll/company.php', ''),
(32, '2020-03-28 00:00:00', '1585398834', 'vinesh', '', '/payroll/company.php', ''),
(33, '2020-03-29 00:00:00', '1585464814', 'vinesh', '', '/payroll/company.php', ''),
(34, '2020-03-30 00:00:00', '1585564482', 'vinesh', '', '/payroll/company.php', ''),
(35, '2020-03-31 00:00:00', '1585633205', 'vinesh', '', '/payroll/company.php', ''),
(36, '2020-03-31 00:00:00', '1585638121', 'vinesh', '', '/payroll/company.php', ''),
(37, '2020-03-31 00:00:00', '1585638433', 'vinesh', '', '/payroll/company.php', ''),
(38, '2020-03-31 00:00:00', '1585638482', 'vinesh', '', '/payroll/company.php', ''),
(39, '2020-03-31 00:00:00', '1585642523', 'vinesh', '', '/payroll/company.php', ''),
(40, '2020-03-31 00:00:00', '1585642742', 'vinesh', '', '/payroll/company.php', ''),
(41, '2020-03-31 00:00:00', '1585655518', 'vinesh', '', '/payroll/company.php', ''),
(42, '2020-04-01 00:00:00', '1585724354', 'vinesh', '', '/payroll/company.php', ''),
(43, '2020-04-01 00:00:00', '1585751757', 'vinesh', '', '/payroll/company.php', ''),
(44, '2020-04-02 00:00:00', '1585806310', 'vinesh', '', '/payroll/company.php', ''),
(45, '2020-04-02 00:00:00', '1585824710', 'vinesh', '', '/payroll/company.php', ''),
(46, '2020-04-02 00:00:00', '1585850457', 'vinesh', '', '/payroll/company.php', ''),
(47, '2020-04-02 00:00:00', '1585851844', 'vinesh', '', '/payroll/company.php', ''),
(48, '2020-04-02 00:00:00', '1585852289', 'vinesh', '', '/payroll/company.php', ''),
(49, '2020-04-03 00:00:00', '1585894064', 'vinesh', '', '/payroll/company.php', ''),
(50, '2020-04-03 00:00:00', '1585906557', 'vinesh', '', '/payroll/company.php', ''),
(51, '2020-04-03 00:00:00', '1585926673', 'vinesh', '', '/payroll/company.php', ''),
(52, '2020-04-04 00:00:00', '1586011817', 'vinesh', '', '/payroll/company.php', ''),
(53, '2020-04-04 00:00:00', '1586013444', 'vinesh', '', '/payroll/company.php', ''),
(54, '2020-04-04 00:00:00', '1586016602', 'vinesh', '', '/payroll/company.php', ''),
(55, '2020-04-05 00:00:00', '1586087190', 'vinesh', '', '/payroll/company.php', ''),
(56, '2020-04-06 00:00:00', '1586154250', 'vinesh', '', '/payroll/company.php', ''),
(57, '2020-04-06 00:00:00', '1586175862', 'vinesh', '', '/payroll/company.php', ''),
(58, '2020-04-07 00:00:00', '1586241724', 'vinesh', '', '/payroll/company.php', ''),
(59, '2020-04-07 00:00:00', '1586271025', 'vinesh', '', '/payroll/company.php', ''),
(60, '2020-04-08 00:00:00', '1586327748', 'vinesh', '', '/payroll/company.php', ''),
(61, '2020-04-08 00:00:00', '1586329394', 'vinesh', '', '/payroll/company.php', ''),
(62, '2020-04-08 00:00:00', '1586330717', 'vinesh', '', '/payroll/company.php', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logfile`
--
ALTER TABLE `logfile`
  ADD PRIMARY KEY (`SrNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companydetails`
--
ALTER TABLE `companydetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logfile`
--
ALTER TABLE `logfile`
  MODIFY `SrNo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
