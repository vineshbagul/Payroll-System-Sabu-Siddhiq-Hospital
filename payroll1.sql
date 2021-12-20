-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 09:49 AM
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
-- Database: `payroll1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankmast`
--

CREATE TABLE `bankmast` (
  `BankCode` varchar(10) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `CompCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankmast`
--

INSERT INTO `bankmast` (`BankCode`, `BankName`, `Branch`, `CompCode`) VALUES
('bankcode', 'bankname', 'branch', 'MHSSGH');

-- --------------------------------------------------------

--
-- Table structure for table `bloodmast`
--

CREATE TABLE `bloodmast` (
  `BloodCode` varchar(10) NOT NULL,
  `BloodGroup` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodmast`
--

INSERT INTO `bloodmast` (`BloodCode`, `BloodGroup`) VALUES
('1', 'O+'),
('2', 'B+'),
('3', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `branchmast`
--

CREATE TABLE `branchmast` (
  `BranchCode` varchar(10) NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `CompCode` varchar(10) NOT NULL,
  `StateCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branchmast`
--

INSERT INTO `branchmast` (`BranchCode`, `BranchName`, `CompCode`, `StateCode`) VALUES
('kokan', 'SBI', 'MHSSGH', 'bvc');

-- --------------------------------------------------------

--
-- Table structure for table `catgmast`
--

CREATE TABLE `catgmast` (
  `CatgCode` varchar(10) NOT NULL,
  `CatgName` varchar(50) NOT NULL,
  `CatgStat` varchar(10) NOT NULL,
  `CompCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catgmast`
--

INSERT INTO `catgmast` (`CatgCode`, `CatgName`, `CatgStat`, `CompCode`) VALUES
('Monthly', 'Monthly', 'Monthly', 'MHSSGH');

-- --------------------------------------------------------

--
-- Table structure for table `deptmast`
--

CREATE TABLE `deptmast` (
  `DeptCode` varchar(10) NOT NULL,
  `DeptName` varchar(50) NOT NULL,
  `CompCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deptmast`
--

INSERT INTO `deptmast` (`DeptCode`, `DeptName`, `CompCode`) VALUES
('deptcode1', 'dept1', 'MHSSGH'),
('deptcode2', 'dept2', 'MHSSGH');

-- --------------------------------------------------------

--
-- Table structure for table `desimast`
--

CREATE TABLE `desimast` (
  `DesigCode` varchar(10) NOT NULL,
  `DesigName` varchar(50) NOT NULL,
  `CompCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desimast`
--

INSERT INTO `desimast` (`DesigCode`, `DesigName`, `CompCode`) VALUES
('AA', 'SBI', 'MHSSGH'),
('kokan1', 'DYANDEEP', 'MHSSGH'),
('vinesh', 'test', 'MHSSGH');

-- --------------------------------------------------------

--
-- Table structure for table `empmast`
--

CREATE TABLE `empmast` (
  `EMPCODE` varchar(15) NOT NULL,
  `FIRSTNAME` varchar(30) NOT NULL,
  `MIDDLENAME` varchar(30) NOT NULL,
  `LASTNAME` varchar(30) NOT NULL,
  `COMPCODE` varchar(10) NOT NULL,
  `BRANCHCODE` varchar(10) NOT NULL,
  `DEPTCODE` varchar(10) NOT NULL,
  `CATGCODE` varchar(10) NOT NULL,
  `DESIGCODE` varchar(10) NOT NULL,
  `BLOODCODE` varchar(10) NOT NULL,
  `GRADE` varchar(10) NOT NULL,
  `DATEOFBIRTH` date NOT NULL,
  `DATEOFAPP` date NOT NULL,
  `DATEOFCONF` date NOT NULL,
  `DATEOFJOIN` date NOT NULL,
  `DATEOFLEFT` date NOT NULL,
  `BIRTHPLACE` varchar(25) NOT NULL,
  `MARITALSTAT` varchar(30) NOT NULL,
  `PERMADDR` text NOT NULL,
  `PERMCITY` varchar(30) NOT NULL,
  `PERMPINCODE` text NOT NULL,
  `PERMCONTACTNO` varchar(40) NOT NULL,
  `PRESADDR` varchar(50) NOT NULL,
  `PRESCITY` varchar(30) NOT NULL,
  `PRESPINCODE` varchar(15) NOT NULL,
  `PRESCONTACTNO` varchar(40) NOT NULL,
  `PASSPORTNO` varchar(20) NOT NULL,
  `DATEOFISSUE` date NOT NULL,
  `DATEOFEXPIRY` date NOT NULL,
  `PLACEOFISSUE` varchar(30) NOT NULL,
  `NATIONALITY` varchar(30) NOT NULL,
  `REMARK` text NOT NULL,
  `PFNO` varchar(15) NOT NULL,
  `ESICNO` varchar(15) NOT NULL,
  `PANNO` varchar(25) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `BANKCODE` varchar(10) NOT NULL,
  `BANKACNO` varchar(50) NOT NULL,
  `LICNO` varchar(25) NOT NULL,
  `EDUCATION` varchar(30) NOT NULL,
  `EDUQUAL` text NOT NULL,
  `SEX` varchar(6) NOT NULL,
  `PAYBY` varchar(10) NOT NULL,
  `EXT` varchar(10) NOT NULL,
  `MobileNo` varchar(30) NOT NULL,
  `LangKnown` varchar(50) NOT NULL,
  `DrvLicense` varchar(30) NOT NULL,
  `EmgName` varchar(150) NOT NULL,
  `EmgNo` varchar(30) NOT NULL,
  `TermReason` text NOT NULL,
  `FatherName` text NOT NULL,
  `MotherName` text NOT NULL,
  `SpouseName` text NOT NULL,
  `NoOfChildren` text NOT NULL,
  `REFNAME` varchar(50) NOT NULL,
  `RELATION` varchar(50) NOT NULL,
  `CONTACT` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empmast`
--

INSERT INTO `empmast` (`EMPCODE`, `FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `COMPCODE`, `BRANCHCODE`, `DEPTCODE`, `CATGCODE`, `DESIGCODE`, `BLOODCODE`, `GRADE`, `DATEOFBIRTH`, `DATEOFAPP`, `DATEOFCONF`, `DATEOFJOIN`, `DATEOFLEFT`, `BIRTHPLACE`, `MARITALSTAT`, `PERMADDR`, `PERMCITY`, `PERMPINCODE`, `PERMCONTACTNO`, `PRESADDR`, `PRESCITY`, `PRESPINCODE`, `PRESCONTACTNO`, `PASSPORTNO`, `DATEOFISSUE`, `DATEOFEXPIRY`, `PLACEOFISSUE`, `NATIONALITY`, `REMARK`, `PFNO`, `ESICNO`, `PANNO`, `EMAIL`, `BANKCODE`, `BANKACNO`, `LICNO`, `EDUCATION`, `EDUQUAL`, `SEX`, `PAYBY`, `EXT`, `MobileNo`, `LangKnown`, `DrvLicense`, `EmgName`, `EmgNo`, `TermReason`, `FatherName`, `MotherName`, `SpouseName`, `NoOfChildren`, `REFNAME`, `RELATION`, `CONTACT`) VALUES
('ABCD', 'vinesh', 'ananda', 'bagul', 'MHSSGH', 'kokan', 'deptcode2', 'Monthly', 'kokan1', '1', 'A+', '2020-04-15', '2020-04-16', '2020-04-22', '2020-04-15', '2020-04-01', 'JALGAon', 'Single', 'ambernath', 'thane', '57565656', '4545345', 'ambernath', 'thane', '57565656', '37373748', 'PASSPORT', '0000-00-00', '0000-00-00', 'THANE', 'INDIAN', '', 'pf', 'ER', 'pan', 'VINESH@GMAIL.COM', 'bankcode', 'DFD', 'RT', 'BE', 'ME web course', 'Male', 'Cheque', '', '45553535', 'HIBBRU', 'MH5656565', 'VINESH', '8787877878', 'empty', 'anand', 'bharti', 'unkown', '0', 'rahul', 'friend', '78668768'),
('ABCDE', 'raj', 'daj', 'saj', 'MHSSGH', 'kokan', 'deptcode1', 'Monthly', 'AA', '2', 'A', '2020-04-09', '2020-04-07', '2020-04-16', '2020-04-15', '2020-04-15', 'JALGAV', 'Single', 'AMBERNATH', 'THANE', '321435', '56748383', 'AMBERNATH', 'THANE', '321435', '37373748', 'PASSPORT', '2020-04-09', '2020-04-07', 'THANE', 'INDIAN', '', 'pf', 'esic', 'pan', 'bagulvinesh6@gmail.com', 'bankcode', 'acc', 'lic', 'BE', 'OOPM', 'Male', 'Cheque', '', '45553535', 'HIBBRU', 'MH5656565', 'VINESH', '8787877878', 'reason', 'SAAARA', 'AALLLL', 'UNKONWN', '', 'YTURU', 'BROTHER', ''),
('12345', 'vinesh', 'ananda', 'bagul', 'MHSSGH', 'kokan', 'deptcode1', 'Monthly', 'AA', '1', '', '2020-04-16', '2020-04-16', '2020-04-09', '2020-04-23', '0000-00-00', 'JALGAV', 'Single', 'ambernath', 'thane', '373737', '6566768', 'ambernath', 'thane', '373737', '75757483', '', '0000-00-00', '0000-00-00', '', 'INDIAN', '', 'pf', 'esic', 'pan', 'v', 'E', 'acc', 'lic', 'BE', 'ME with courses', 'Male', 'Cheque', '', '6574838', 'HIBBRU', '', 'VINESH', '', '', 'ansari', 'bansar', '', '', 'raj', 'brother', '');

-- --------------------------------------------------------

--
-- Table structure for table `experiance`
--

CREATE TABLE `experiance` (
  `compname` varchar(50) NOT NULL,
  `EmpCode` varchar(15) NOT NULL,
  `CompCode` varchar(10) NOT NULL,
  `fromperiod` varchar(50) NOT NULL,
  `toperiod` varchar(50) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `jobrespons` text NOT NULL,
  `sallary` varchar(10) NOT NULL,
  `Remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loanbankmast`
--

CREATE TABLE `loanbankmast` (
  `BankCode` varchar(10) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `Branch` text NOT NULL,
  `CompCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanbankmast`
--

INSERT INTO `loanbankmast` (`BankCode`, `BankName`, `Branch`, `CompCode`) VALUES
('kokan', 'DYANDEEP', 'MUMBAI', 'MHSSGH');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
