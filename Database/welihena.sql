-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 06:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welihena`
--

-- --------------------------------------------------------

--
-- Table structure for table `adtbl`
--

CREATE TABLE `adtbl` (
  `adid` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `imglink` varchar(100) DEFAULT NULL,
  `maplink` text DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inv_catagory`
--

CREATE TABLE `inv_catagory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cat_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_catagory`
--

INSERT INTO `inv_catagory` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Laptop Computer', 'Laptop Computer'),
(2, 'Desktop Computer', 'Desktop Computer'),
(3, 'Colour Printer', 'Colour Printer'),
(4, 'Office Table', 'Office Table'),
(5, 'අධ්‍යාපන', 'අධ්‍යාපනය සම්බන්ධ සියලුම සේවාවන්'),
(6, 'ප්‍රවාහනය', 'සියලුම ප්‍රවාහණ කටයුතු'),
(7, 'පරිගණකය', 'සියලුම පරිගණකය කටයුතු'),
(8, 'සෞඛ්‍ය', 'සෞඛ්‍ය අංශය'),
(9, 'සංවර්ධන නිලධාරි', 'සංවර්ධන නිලධාරි'),
(10, 'ග්‍රාම නිලධාරි', 'ග්‍රාම නිලධාරි'),
(11, 'වාහන අලුත්වැඩියා කිරිම', 'වාහන අලුත්වැඩියා කිරිම'),
(12, 'පෙර පාසැල්', 'පෙර පාසැල්'),
(13, 'ආහාර ද්‍රව්‍ය', 'ආහාර ද්‍රව්‍ය'),
(14, 'සිල්ලර භාණ්ඩ', 'සිල්ලර භාණ්ඩ'),
(15, 'විදුලි කාර්මික', 'විදුලි කාර්මික'),
(16, 'ජලනල කාර්මික', 'ජලනල කාර්මික'),
(17, 'ගොඩනැගිලි ද්‍රව්‍ය', 'ගොඩනැගිලි ද්‍රව්‍ය'),
(18, 'විදුලි උපකරණ', 'විදුලි උපකරණ'),
(19, 'ගෘහ භාණ්ඩ', 'ගෘහ භාණ්ඩ');

-- --------------------------------------------------------

--
-- Table structure for table `inv_item`
--

CREATE TABLE `inv_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `serial_No` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `warranty` varchar(100) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `remark_type` varchar(50) NOT NULL,
  `remark` varchar(250) NOT NULL,
  `remark_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_item`
--

INSERT INTO `inv_item` (`item_id`, `item_name`, `brand`, `model`, `serial_No`, `date`, `location`, `price`, `warranty`, `cat_id`, `remark_type`, `remark`, `remark_status`) VALUES
(1, 'Desktop Computer', 'Dell', 'Prodesk', 'COM1', '2020-10-01', 'Colombo', '85000.00', '2 years', 2, '', '', 1),
(2, 'Laptop Computer', 'Dell', 'Prodesk1', 'COM2', '2020-10-05', 'Matale', '125000.00', '2 years', 1, '', '', 0),
(3, 'Office Table', 'Damro', 'Office Table', 'TB1', '2020-10-06', 'Kandy', '25000.00', '1 years', 4, '', '', 1),
(4, 'Colour Printer', 'Dell', 'GL2061', 'PR1', '2020-10-14', 'Colombo', '95000.00', '0', 3, '1', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `status` int(1) NOT NULL,
  `type` char(1) NOT NULL DEFAULT '',
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `email`, `Password`, `status`, `type`, `RegDate`) VALUES
(239, '10', '701404246V', 'eda45494caaef04db1ed5efb78747b9e', 5, '', '2020-09-23 04:38:00'),
(347, '11', 'Peter', '46bf36a7193438f81fccc9c4bcc8343e', 5, '', '2021-06-28 05:08:58'),
(352, 'wimal1', 'wimaldmw1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 'N', '2021-08-06 04:19:19'),
(351, 'wimal', 'wimaldmw@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, 'N', '2021-07-18 16:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `sid` int(11) NOT NULL,
  `subcatname` varchar(50) NOT NULL DEFAULT '',
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`sid`, `subcatname`, `catid`) VALUES
(0, 'වෑන්', 6),
(1, 'කාර්', 6),
(2, 'බස්', 6),
(3, 'CPU', 7),
(4, 'KeyBoard', 7),
(5, 'රජයේ රෝහල්', 8),
(6, 'පෞද්ගලික රෝහල්', 8),
(7, 'වෛද්‍යවරු', 8),
(8, 'පාමසි', 8),
(9, 'ගිලන්රථ සේවා', 8),
(10, 'රජයේ පාසැල්', 5),
(11, 'පෞද්ගලික පාසැල්', 5),
(12, 'පෞද්ගලික පන්ති', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `DepartmentShortName` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'Admin', 'ADMIN', 'AD001', '2020-05-29 09:47:46'),
(2, 'Account Division', 'ACCOUNT', 'AC002', '2020-05-29 09:48:06'),
(3, 'Planning Division', 'PLAN', 'PL003', '2020-05-29 09:48:24'),
(4, 'Training  Division', 'TRAINNING', 'TR004', '2020-05-29 09:49:26'),
(7, 'Land Divison', 'LAND', 'LA006', '2020-06-12 09:51:31'),
(8, 'Samurdhi', 'SAMURDHI', 'SA007', '2020-06-18 06:39:01'),
(9, 'Agriculture Divition ', 'AGRI', 'AG008', '2020-08-28 08:52:55'),
(10, 'Development Division', 'DEVELOPMENT', 'DE009', '2020-08-28 08:55:12'),
(11, 'Engineering Division', 'ENGINEERING', 'ENG010', '2020-08-28 08:57:53'),
(12, 'Consumer Affairs Authority', 'CAA', 'CO011', '2020-08-28 09:00:52'),
(13, 'Information Technology Unit', 'IT', 'IT012', '2020-08-28 09:03:06'),
(14, 'Small Enterprises Development Division ', 'SEDD', 'SM013', '2020-08-28 09:04:03'),
(15, 'Job center', 'JOBCENTER', 'JO014', '2020-08-28 09:25:49'),
(16, 'Chief Accountant', 'CHEIF ACCOUNTANT', 'ChiefAcc', '2020-09-23 06:14:16'),
(17, 'Internal AUDIT', 'IA', 'IA0015', '2020-09-24 03:23:58'),
(19, 'Additional District Secretary(Admin)', 'ADS(Admin)', 'ADSAdmin', '2020-09-24 08:32:52'),
(20, 'Disaster Management Division ', 'DMD', 'DM016', '2020-09-25 04:30:24'),
(21, 'Election', 'ELECTION', 'EL017', '2020-09-25 06:21:24'),
(22, 'Statistics', 'STATISTICS', 'ST018', '2020-09-25 06:23:19'),
(23, 'General Audit', 'GAUDIT', 'GEA019', '2020-09-25 06:24:32'),
(24, 'G.A Co-ordinate Unit', 'GACO-U', 'GACO020', '2020-09-25 06:26:41'),
(25, 'MOTOR', 'MOTOR', 'MT021', '2020-09-25 06:27:59'),
(26, 'Buddhist Affair', 'BU-AFFAIR', 'BA022', '2020-09-25 06:29:15'),
(27, 'Cultural Affairs', 'CU-AFFAIRS', 'CA023', '2020-09-29 05:10:57'),
(28, 'Media', 'MEDIA', 'ME024', '2020-09-30 04:43:41'),
(29, 'DCC Office Matale', 'DCC Office Matale', 'DCC30', '2020-11-26 10:14:39'),
(30, 'Graduate trainees', 'gt', '10', '2021-03-04 09:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `FirstName` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `EmailId` varchar(200) DEFAULT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` date NOT NULL,
  `Department` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `designation` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DateofAppointment` date NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `City` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Phonenumber` varchar(15) NOT NULL,
  `roleId` int(1) NOT NULL,
  `supervise` varchar(15) NOT NULL,
  `ImgFile` varchar(100) NOT NULL,
  `ImgFilePath` varchar(100) NOT NULL,
  `ImgFileType` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `NIC`, `EmailId`, `Gender`, `Dob`, `Department`, `designation`, `DateofAppointment`, `Address`, `City`, `Phonenumber`, `roleId`, `supervise`, `ImgFile`, `ImgFilePath`, `ImgFileType`, `RegDate`) VALUES
(471, '4', 'S.K.Thilakarathna', '196228101529', 'sisiramatale@gmail.com', ' Male', '1962-10-07', 'AC002', 'Chief Accountant', '1985-12-16', 'No.191/1-A, Kotuwegedara, Matale.', NULL, '710980878', 11, '1', '', '', '', '2020-09-03 05:52:36'),
(536, '261', 'R.W.M.O.W.A.K.RATHNADIWAKARA', '196854903110', 'samurdhimatale@gmail.com', '1994-09-20 12:00:00 AM', '1968-02-18', 'SA007', 'DISTRICT OFFICE MANAGER', '1994-09-20', '', NULL, '717787062', 6, '231', '', '', '', '2020-09-08 07:13:29'),
(81, '134', 'A Rifasa', '197085600979', 'arifasa12@gmail.com', 'Male', '1970-01-01', 'ENG010', 'DO', '1991-03-18', 'No.184/B/1 Raithalawela, Ukuwela', NULL, '778576781', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(309, '15', 'Shiromi Hunukumbura', '197183003087', 'Shiromihunukubura @ gmail.com ', 'Female', '1971-11-25', 'AD001', 'Administrative Officer ', '1993-09-10', 'No 845/ B , Aluviharaya, Matale ', NULL, '714471329', 4, '11', '', '', '', '2020-09-03 05:30:52'),
(624, '287', 'N.H.L.SENADEERA WILFRAD', '197205703326', 'samurdhimatale@gmail.com', 'Male', '1972-02-26', 'SA007', 'DRIVER', '2014-10-24', '', NULL, '714780505', 13, '231', '', '', '', '2020-09-08 07:39:43'),
(291, '75', 'P.G.Y.S.KUMARILATHA', '197265801860', 'kumarilathayamuna@gmail.com', 'Female', '1972-06-06', 'DE009', 'ELDER RIGHT PROMOTION ASSISTANT', '2005-10-18', '47-2,IHALAMULLA,ANKUMBURA', NULL, '717451583', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(510, '68', 'T.G.D.N Ekanayaka', '197266500187', 'nilanthiekanayaka@gmail.com', 'Female', '1970-01-01', 'JO014', 'CGO', '1999-05-16', 'Nimalamariya mawatha,Busaranapitiya,wasalakootte', NULL, '778108944', 12, '2', '', '', '', '2020-09-08 06:19:49'),
(535, '269', 'A.G.S.W.KUMARI', '197366802001', 'wkrathnayaka73@gmial.com', '2000-08-01 12:00:00 AM', '1973-06-16', 'SA007', 'DISTRICT OFFICE MANAGER', '2000-08-01', '', NULL, '713683285', 6, '231', '', '', '', '2020-09-08 07:13:29'),
(658, '195', 'B.M.N.K Basnayaka', '197367201821', '', 'Female', '1970-01-01', 'PL003', 'MSO', '2001-03-20', '86/7J,Wihara road,Matale', 'Matale', '0777449520', 6, '175', '', '', '', '2020-09-24 03:55:29'),
(478, '40', 'B.G.N.Thushari', '197456702477', 'nilminithushari74@gmail.com', 'Female', '1970-01-01', 'AC002', 'MSO', '1996-09-16', '51/2,sapuwatta,palapathwala.', NULL, '714427343', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(721, '215', 'N.P.Harasgama', '197526000783', '', 'Male', '1975-09-16', 'AC002', 'Office Employment Service', '1997-07-15', '09, Ihalaharasgama,', 'Matale', '0784816549', 13, '19', '', '', '', '2021-02-18 06:43:42'),
(330, '2', 'N.KARUNATHILAKA', '197601502501', 'nishanthabk@yahoo.com', 'Male', '1976-01-15', 'AD001', 'AD, GA. Admin ', '0000-00-00', '174/L, Raithalawela, Ukuwela', NULL, '0703554943', 2, '1', '377ab7f82c7230837b327ea870540abbfdf48617.jpg', 'assets/profile_images/377ab7f82c7230837b327ea870540abbfdf48617.jpg', 'image/jpeg', '2020-09-03 05:31:30'),
(626, '301', 'W.M.U.LWERASEKARA', '197602703449', NULL, 'Male', '1976-01-28', 'SA007', 'DRIVER', '2017-08-10', '', NULL, '775670385', 13, '231', '', '', '', '2020-09-08 07:40:58'),
(490, '71', 'K.D.G.A Karunathilalake', '197732003148', NULL, 'Male', '1977-11-15', 'AC002', 'Management service Assistant ', '2000-09-05', 'no 12, mc road,matale', NULL, '7103266891', 8, '19', '18-CONTACTUS-HEADER.jpg', 'assets/profile_images/18-CONTACTUS-HEADER.jpg', 'image/jpeg', '2020-09-03 05:52:36'),
(699, '222', 'H.M.I.L.N.T Herath', '197822002618', 'lasanthadmc@yahoo.com', 'Male', '1978-08-10', 'DM016', 'District Disaster management Assistant', '2006-11-01', 'Matale', 'Matale', '715304102', 6, '220', '', '', '', '2020-11-25 04:39:32'),
(700, '223', 'D.G.M.Wickramasinghe', '197826203206', 'mahindadmc@gmail.com', 'Male', '1978-09-18', 'DM016', 'District Disaster management Assistant', '2006-11-01', 'Matale', 'Matale', '713777079', 6, '220', '', '', '', '2020-11-25 05:06:45'),
(489, '60', 'M.Rajan', '198000310032', NULL, 'Male', '1980-08-03', 'AC002', 'OEA', '2007-08-30', 'No.30/14,MC Rd,Matale.', NULL, '775137969', 13, '19', '', '', '', '2020-09-03 05:52:36'),
(736, '337', 'D.D.G.I.T.Senarathna', '198162103746', 'itsenarathne@gmail.com', 'Female', '1981-04-30', '10', 'Graduate Trainee', '2021-02-01', '46/3, Kotuwegedara, Kumbiyangoda', 'Matale', '0778586942', 6, '32', '', '', '', '2021-03-09 07:26:06'),
(522, '111', 'K.W.S.G.Fonseka ', '198163700906', 'shayamali26@gmail.com', 'Female', '1981-05-16', 'SM013', 'Entreprenureship Development Training Officer', '2013-03-24', '125/B, 16/10, Kuriwela , Ukuwela .', NULL, '714804898', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(706, '181', 'P.K.KONARA', '198169004412', 'p.konara1981@gmail.com', 'Female', '1981-07-08', 'AC002', 'DEVELOPMENT OFFICER', '2013-03-18', '13 A, Thotagamuwa, Palapathwala, ', 'Matale', '0777546808', 6, '19', '', '', '', '2020-11-27 04:56:38'),
(474, '165', 'P.P.G.K.S.S.Chinthika', '198274003458', 'ksschinthika@gmail.com', 'Female', '1970-01-01', 'AC002', 'MSO', '2004-12-02', '465/42, Highway park, Palapathwala', NULL, '0712021690', 6, '19', 'bee.png', 'assets/profile_images/bee.png', 'image/png', '2020-09-03 05:52:36'),
(481, '105', 'M.Dhanaraj', '198405801292', NULL, 'Male', '1984-02-27', 'AC002', ' Management Service Assistant', '2011-04-11', '124,Dikkiriya Rd,Aluwihare,Matale.', NULL, '719620627', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(711, '163', 'R.M.N.S.RATHNAYAKE', '198562801612', 'nadeekar5@gmail.com', 'Female', '1985-05-07', 'AD001', 'Development officer', '2013-05-02', '1/101/A, Meegolawatte, Nalanda.', 'Nalanda', '0764585754', 6, '47', '63c4c02fbb03381306a9e85e49c1cd28e7809236.jpg', 'assets/profile_images/63c4c02fbb03381306a9e85e49c1cd28e7809236.jpg', 'image/jpeg', '2021-01-04 04:59:17'),
(744, '345', 'U.W.D.T.De Silva', '199022901164', 'dhanukathameera7@gmail.com', 'Male', '1990-08-16', '10', 'Graduate Trainee', '2021-02-01', '16/10, 6th lane, Gunasenawatte,Ukuwela', 'Matale', '0715122121', 6, '19', '', '', '', '2021-03-09 08:47:58'),
(308, '11', 'W.M.P.S.WIJESOORIYA', '199174000806', 'Wmprathibha1991@ gmail.com ', 'Female', '1991-08-24', 'AD001', 'Assistant  district secretary', '2019-03-05', '68/A , Gannoruwa, peradeniya', NULL, '701526876', 3, '2', '', '', '', '2020-09-03 05:30:52'),
(743, '344', 'K.S.P.K.Bandara', '199254200468', 'sisaras@gmail.com', 'Female', '1992-02-11', '10', 'Graduate Trainee', '2020-09-02', '03, Bandarapola, Kiwula', 'Matale', '0702217637', 6, '21', '', '', '', '2021-03-09 08:18:00'),
(652, '49', 'D.M.D.G.N.M.K.Dissanayake', '199462101184', '', 'Female', '1994-04-30', 'IA0015', 'Management Service Officer', '2015-09-15', 'No 43, Wariyapola, watta, Matale', 'Matale', '0713633130', 6, '05', 'images.jpg', 'assets/profile_images/images.jpg', 'image/jpeg', '2020-09-24 03:30:30'),
(74, '216', 'Sulochana Samarasigha', '199855700086', '', 'Female', '0000-00-00', 'AG008', 'Office Employees Service (Temporary Attachment Up To 2020.09.23)', '0000-00-00', '158/1 Aluwihare, Matale', NULL, '711537183', 13, '201', '', '', '', '2020-08-28 10:18:12'),
(504, '66', 'S.M.T De Alwis', '603241703V', 'smthissaalwis@gmail.com', 'Male', '1960-11-19', 'JO014', 'District Coordinating Officer', '1999-05-16', '446,Alawathugoda', NULL, '778707256', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(76, '202', 'M.M.S.Senarathna', '611180810v', ' ', 'Male', '0000-00-00', 'AG008', 'Assistant Director ', '0000-00-00', 'Doluwa,Gampala', NULL, '779814807', 3, '201', '', '', '', '2020-08-28 10:18:12'),
(23, '1', 'S.M.G.K.Perera', '613572171V', 'test@gmail.com', 'Male', '1961-12-22', 'AD001', 'District Secretary', '1995-04-03', '13/10 Goluwa Rd, Piyathigama, Ginthota', 'Matale', '0714070263', 1, '1', '', '', '', '2020-07-09 09:13:56'),
(638, '21', 'S.M.M. Kumarihamy', '617072998V', '', 'Male', '0000-00-00', 'LA006', 'Management service officer', '0000-00-00', 'Matale', 'Matale', '00000000', 12, '8', '', '', '', '2020-09-17 09:40:25'),
(582, '267', 'D.G.J.PREMALAL', '623283275V', 'gamagedara62@gmial.com', 'Male', '1962-11-23', 'SA007', 'DISTRICT OFFICE MANAGER', '1999-05-17', '', NULL, '714459395', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(477, '19', 'A.M.L.S.Premasuriya', '625911753V', 'lalani4812@gmail.com', 'Female', '1962-03-31', 'AC002', 'Management Service Assistant', '1991-03-08', '48/12,Hulangamuwa RD,Matale.', NULL, '0779411767', 12, '7', '', '', '', '2020-09-03 05:52:36'),
(516, '58', 'Priyani Samarasinghe', '628011460V', 'priyanisamarasinghe@yahoo.com', 'Female', '1962-10-27', 'IT012', 'Information & Comunication Technology Assistant', '1987-08-17', 'No 4/A,            1st Lane, Malwatta Road, Matale', NULL, '718097608', 10, '178', '321138.jpg', 'assets/profile_images/321138.jpg', 'image/jpeg', '2020-09-08 06:30:56'),
(722, '72', 'L.D.J.P.Bandara', '630540046V', '', 'Male', '1963-02-23', 'AD001', 'Driver', '1994-04-18', '24 Gonathenna Road', 'Rathota', '0777197650', 13, '15', '', '', '', '2021-02-22 09:09:30'),
(614, '279', 'H.H.B.A.KOTHALAWALA', '630582830V', 'samurdhimatale@gmail.com', 'Male', '1963-02-27', 'SA007', 'DISTRICT OFFICE SDO', '1996-06-01', '', NULL, '779847677', 6, '231', '', '', '', '2020-09-08 07:34:42'),
(581, '300', 'P.K.G.GUNARATHNE', '632932103V', '1963gunarathne@gmail.com', 'Male', '1963-10-19', 'SA007', 'DISTRICT OFFICE MANAGER', '1994-07-27', '', NULL, '718123235', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(724, '202', 'D.M.S.WIJEKOON', '640134534V', '', 'Male', '1964-01-13', 'AG008', 'ASSISTANT DIRECTOR', '2000-07-01', '92/3 DOMBAWELA', 'MAHAWELA', '071-052282', 3, '201', '', '', '', '2021-02-24 10:07:35'),
(583, '264', 'H.M.P.HERATH', '640323876V', 'palitha953@gmail.com', 'Male', '1964-02-01', 'SA007', 'DISTRICT OFFICE MANAGER', '1996-05-01', '', NULL, '779864064', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(306, '52', 'R.A.D.J.RANASINGHE', '640583347 V', '', 'Male', '1964-02-27', 'DE009', 'K.K.S. - III', '1992-01-15', '08,MARUKONA,UKUWELA', NULL, '726043790', 13, '32', '', '', '', '2020-09-03 05:28:25'),
(505, '69', 'I.M.D.A.B Rathwita', '641471364V', 'bandararathwita@gmail.com', 'Male', '1964-05-25', 'JO014', 'CGO', '1999-05-16', 'Ihalarathwita,Rathwita', NULL, '773945580', 12, '2', '', '', '', '2020-09-08 06:19:49'),
(627, '293', 'P.G.NAWARATHNA', '642072129V', NULL, 'Male', '1964-07-25', 'SA007', 'DRIVER', '2007-07-01', '', NULL, '770397374', 13, '231', '', '', '', '2020-09-08 07:41:58'),
(292, '99', 'D.Y.DE S.RANAWEERA', '648401418V', '', 'Female', '1964-05-12', 'DE009', 'SOCIAL SERVICE OFFICER', '1989-01-11', 'KEDANGAMUWA,MADIPOLA', NULL, '718413231', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(549, '282', 'T.P.RENUKA NILMINI', '648612770V', 'samurdhimatale@gmail.com', 'Female', '1964-01-26', 'SA007', 'DISTRICT OFFICE SDO', '2000-03-01', '', NULL, '711776276', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(344, '53', 'G.G.A.PREMATHIALAKE', '651774080v', '', 'Male', '1965-06-25', 'AD001', 'K.k.S', '1985-09-01', '6/27, ratthta   kolaniya, rattota', NULL, '716331714', 13, '47', '', '', '', '2020-09-03 05:32:10'),
(713, '28', 'A.M.M.KUMARIHAMY', '657670189V', '', 'Female', '1965-09-23', 'AD001', 'MANAGEMENT SERVICE OFFICER', '1991-06-03', '2/48 THOTAGAMUWA', 'PALAPATHWALA', '0767458469', 6, '47', '', '', '', '2021-01-06 10:10:14'),
(532, '246', 'A.S.M.RAJAPAKSHA', '658321528V', 'malkanthirajapaksha1965@gmail.com', '1994-12-01 12:00:00 AM', '1965-11-27', 'SA007', 'DISTRICT OFFICE MANAGER', '1994-12-01', '', NULL, '716324463', 6, '231', '', '', '', '2020-09-08 07:13:29'),
(546, '235', 'O.W.S.N.K RATHNADIWAKARA', '665060390V', 'samurdhimatale@gmail.com', 'Female', '1966-01-06', 'SA007', 'PUBLIC MANAGEMENT ASSISTANT', '1993-01-04', '', NULL, '718048878', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(656, '175', 'S.K. Withanage', '666890108V', 'withanagesajeewa@gmail.com', 'Female', '1966-07-07', 'PL003', 'Director (Planing)', '1994-11-03', '74/2, Sri Dharmapala Mawatha, Asgiriya,Kandy', 'Kandy', '0711268811', 2, '1', '', '', '', '2020-09-24 03:53:05'),
(530, '289', 'W.G.S.WICRAMASINGHA', '667530660V', NULL, '2005-06-22 12:00:00 AM', '1966-09-09', 'SA007', 'DISTRICT ASSISTANT  DIRECTOR ', '2005-06-22', '', NULL, '777301708', 3, '231', '', '', '', '2020-09-08 07:13:29'),
(518, '94', 'A. Nihumaththulla ', '672640938V', 'abdeen123new@gmail.com ', 'Male', '1967-09-20', 'SM013', 'Assistant Director ', '1999-05-19', '72, Gonagawela Road, Matale .', NULL, '717126088', 3, '116', '', '', '', '2020-09-08 06:45:22'),
(515, '178', 'W.W.P.W.M.R. Wijesundara', '672820847V', 'wwijesundara@yahoo.com', 'Male', '1967-10-08', 'IT012', 'Assistant Director (Planning)', '1999-01-04', 'No 95/6,  Wawannawatta Road, Sappuwatta Palapathwala', NULL, '778066310', 3, '', '', '', '', '2020-09-08 06:30:56'),
(693, '62', 'B.M.G.N.K. KARUNARATHNA', '673534708V', '', 'Male', '1967-12-18', 'ME024', 'Information Officer', '1999-12-01', '118,Kuriwela,Ukuwela', 'Matale', '0715907383', 12, '15', '', '', '', '2020-09-30 04:45:31'),
(537, '285', 'S.P.M. JAYASINGHE', '675010285V', 'samurdhimatale@gmail.com', '1994-08-01 12:00:00 AM', '1967-01-01', 'SA007', 'DISTRICT OFFICE MANAGER', '1994-08-01', '', NULL, '775230025', 6, '231', '', '', '', '2020-09-08 07:13:29'),
(640, '186', 'S.M.M.D.Chandrasekara', '675530050V', 'deepika1967@gmail.com', 'Female', '1970-01-01', 'PL003', 'MSO', '1970-01-01', '99/15,Darmapala Mawatha, Matale', 'Matale', '0775910119', 12, '175', '', '', '', '2020-09-23 03:48:31'),
(318, '77', 'A.M.S ADIKARANAYAKA', '677102233V', 'Adhikaranaka Sepalika@ gmail.com', 'Female', '1967-07-28', 'AD001', 'Translator Assistant ', '1999-05-16', '10/7 Situwara, Asapuwa,Udupitiya, Ukuwela', NULL, '718481520', 6, '47', '', '', '', '2020-09-03 05:31:12'),
(533, '237', 'W.M.K.KARUNARATHNA', '677690364V', 'samurdhimatale@gmail.com', '1995-02-01 12:00:00 AM', '1967-09-25', 'SA007', 'DISTRICT OFFICE MANAGER', '1995-02-01', '', NULL, '718381685', 6, '231', '', '', '', '2020-09-08 07:13:29'),
(67, '201', 'A.Manikkrama', '678162639v', 'agrimataleds@gamail.com', 'Female', '0000-00-00', 'AG008', 'Distict Director of Agriculture', '0000-00-00', 'No. 12,Udatanna Road, Godapola, Kvula,Matale', NULL, '712989146', 2, '1', '', '', '', '2020-08-28 10:18:12'),
(630, '353', 'C.N.M.Asdeniya', '678580180V', NULL, 'Female', '1967-12-23', 'LA006', 'Management Service Officer', '1993-09-10', 'No 90/3, Sir Richard mawatha,Aluwihara, Matale', NULL, '703319526', 6, '21', '', '', '', '2020-09-08 08:12:50'),
(696, '204', 'A.G.Arunatilaka', '680080259V', 'arunatilaka@gmail.com', 'Male', '1968-01-08', 'AG008', 'Assistant Director', '2000-08-21', 'No496,Gohagoda,Katugasthota', 'kandy', '0775934653', 3, '201', '', '', '', '2020-10-29 05:03:44'),
(612, '319', 'H.A.S.HETTIARACHCHI', '680623864V', 'samurdhimatale@gmail.com', 'Male', '1968-03-02', 'SA007', 'DISTRICT OFFICE SDO', '1998-11-01', '', NULL, '713098731', 6, '231', '', '', '', '2020-09-08 07:34:42'),
(305, '148', 'D.M.A.G.DHARMAPALA ', '680970270 V', '', 'Male', '1968-06-04', 'DE009', 'K.K.S. - I', '1996-04-03', 'MURUTHOLUWA,MAILPITIYA', NULL, '712421075', 13, '32', '', '', '', '2020-09-03 05:28:25'),
(75, '204', 'G.Dissanayaka', '681570438v', 'disanayakag@gamail.com', 'Male', '0000-00-00', 'AG008', 'Assistant Director ', '0000-00-00', 'Buluwala, Rideegama,', NULL, '779315268', 0, '201', '', '', '', '2020-08-28 10:18:12'),
(86, '6', 'K.P.B Pallekumbura', '683140619V', 'kpbpandula8@yahoo.com', 'Male', '1968-11-09', 'ENG010', 'District Engineer', '1996-12-26', 'No.17/10A,Walagamba place, Hulangamuwa road, Matale', NULL, '777187130', 2, '1', '', '', '', '2020-08-28 10:29:38'),
(534, '268', 'H.M.K.K.HULANGAMUWA', '685584255V', 'samurdhimatale@gmail.com', '1994-07-27 12:00:00 AM', '1968-02-27', 'SA007', 'DISTRICT OFFICE MANAGER', '1994-07-27', '', NULL, '766743269', 6, '231', '', '', '', '2020-09-08 07:13:29'),
(531, '247', 'W.M.K.P.WICKRAMASINGHE', '686230031V', 'samurdhimatale@gmail.com', '1994-07-26 12:00:00 AM', '1968-05-02', 'SA007', 'DISTRICT OFFICE MANAGER', '1994-07-26', '', NULL, '718012387', 6, '231', '', '', '', '2020-09-08 07:13:29'),
(277, '32', 'K.K.P.D.AMARASINGHA', '687131231V', 'priyanthideepika@gmail.com', 'Female', '1968-07-31', 'DE009', 'MANAGEMENT SERVISE OFFICER', '1991-03-14', '10-13,KOHOBILIWELA,MATALE', NULL, '769797296', 12, '15', '', '', '', '2020-09-03 05:28:25'),
(475, '143', 'J.K.Wijesundara', '688001242V', NULL, 'Female', '1968-10-26', 'AC002', 'Management Service Assistant', '1993-03-15', '219/9,Galoya,Ukuwela.', NULL, '716604701', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(777, '457', 'J.A.N.Pradeep', '691480232V', '', 'Male', '1969-05-27', 'AC002', 'Management Officer ', '1998-08-10', '180, Linthapitiya road,kaikawela', 'Matale', '0701768864', 6, '19', '', '', '', '2021-04-27 03:32:45'),
(661, '177', 'A.M.L.K.Atapattu', '691902196V', 'latapattu1969@gmail.com', 'Male', '1970-01-01', 'PL003', 'Assistant Director (Planing)', '1999-05-16', '33A,Dorakumbura,Dunkalawatta,Matale', 'Matale', '0718381864', 3, '175', 'bf2216710cea9fd7316e6fabd1605a5648a6a73f.jpg', 'assets/profile_images/bf2216710cea9fd7316e6fabd1605a5648a6a73f.jpg', 'image/jpeg', '2020-09-24 04:02:09'),
(87, '34', 'E.A.M.C.N.K Elahena', '691932796V', 'chamindaelahena@gmail.com', 'Male', '1970-01-01', 'ENG010', 'MSO', '1991-11-01', 'No.39, Koongahamula, Palapathwela', NULL, '712884900', 12, '6', '', '', '', '2020-08-28 10:29:38'),
(511, '85', 'S.H Newil Kumara', '692981090V', 'nevilkumara1969@gmail.com', 'Male', '1969-08-21', 'JO014', 'Development Officer', '2005-08-25', '20/4,Kurundugahamada,Kulugammana.', NULL, '719177675', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(646, '83', 'G.G.N.P.Gamage', '695652518V', '', 'Female', '1996-03-05', 'TR004', 'Office Employee', '2014-02-10', '56/1, Thibbatuwawa, Tenna, Matale', 'Matale', '0778016378', 6, '27', '', '', '', '2020-09-23 04:30:31'),
(709, '125', 'D.R.S.P.K.Bandara', '697151982V', 'drspkbandara@gmail.com', 'Female', '1969-08-02', 'DE009', 'District Vidatha Officer', '2018-07-30', '49/3 Amunugama', 'Gunepana', '071-848066', 4, '8', '', '', '', '2020-12-09 04:26:46'),
(636, '54', 'M.M.Prasanna kumara', '701381378V', NULL, 'Male', '1970-05-17', 'LA006', 'K.K.S', '2001-08-01', 'No 92,Asiriuyana, galwadu kumbura,Kaudupellella', NULL, '715529253', 6, '21', '', '', '', '2020-09-08 08:12:50'),
(647, '10', 'D.M.W.Dissanayake', '701404246V', 'wimald519@gmail.com', 'Male', '1970-05-19', 'TR004', 'ICT officer', '2005-06-16', 'Matale', 'Matale', '0710553989', 5, '2', '1b68d9316354d99d09bf007786db7939006306ab.jpg', 'assets/profile_images/1b68d9316354d99d09bf007786db7939006306ab.jpg', 'image/jpeg', '2020-09-23 04:38:00'),
(523, '115', 'K.G.D.Thilakarathna', '702190223V', '    ', 'Male', '1970-08-06', 'SM013', 'Entreprenureship Development Training Officer', '1999-05-17', 'No.453, Wawathanna Wattha , Ehelepola , Pallepola .', NULL, '778442330', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(517, '116', 'K.R.N. Malkanthi ', '705070156V', 'nmalkanthi29@gmail.com', 'Female', '1970-01-07', 'SM013', 'Assistant Director ', '1997-11-24', '21/3, Purijjala ,Matale .', NULL, '718228874', 3, '1', '', '', '', '2020-09-08 06:45:22'),
(757, '435', 'J.D.K.Weerakoon', '705912882V', '', 'Female', '1970-03-31', 'AC002', 'Management Officer', '1991-04-01', '24/1, Kotuwegedara Road', 'Matale', '0771255245', 6, '19', '', '', '', '2021-04-09 07:06:59'),
(68, '43', 'S.N.Malwattage', '706052437v', ' ', 'Female', '1970-01-01', 'AG008', 'Management Service Officer', '1970-01-01', '62/4,Makulgaharuppa,  Palapathwala,Matale', NULL, '714427430', 12, '201', '', '', '', '2020-08-28 10:18:12'),
(648, '05', 'N.B.A.L.M.Samarasighe', '706421394V', '', 'Female', '1970-01-01', 'IA0015', 'Chief Internal Auditor', '1970-01-01', '35/Thennekumbura,kandy', 'Kandy', '077', 2, '1', '', '', '', '2020-09-24 03:26:51'),
(588, '320', 'P.K.G.W.K.KODITHWAKKU', '712810335V', 'wkksrima@gmail.com', 'Male', '1971-10-07', 'SA007', 'INTERNAL AUDIT ASSISTANT', '1995-05-02', '', NULL, '777204865', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(494, '321', 'H.M.R.N.Herath', '715211602v', NULL, 'Female', '1971-01-21', 'CO011', 'Management Assistant', '2010-07-19', 'Kahawatta, godella, weuda', NULL, '0702 547327', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(667, '184', 'H.M.W.Herath', '715430576V', 'matale.dps@gmail.com', 'Female', '1971-02-12', 'PL003', 'Assistant Director (Planning)', '2009-07-03', 'Hospital Roa,Yatawaththa', NULL, '718291064', 3, '175', 'download.png', 'assets/profile_images/download.png', 'image/png', '2020-09-24 08:49:59'),
(642, '142', 'R.M.N.Rajasinghe', '716590704V', '', 'Female', '1971-06-07', 'TR004', 'Development coordinator', '1999-05-17', '94/5,Pasal Mawatha, Welakumbara, Matale', 'Matale', '0712812941', 6, '27', '', '', '', '2020-09-23 04:12:26'),
(283, '103', 'D.G.RAMYALATHA', '718090679V', '', 'Female', '1971-04-11', 'DE009', 'COODINATER OF BUDDHIST ASSISTANT', '2005-10-18', '173,PALLEGAMA,ANKUMBURA', NULL, '711385230', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(639, '27', 'A.G.S.K.Senarathna', '718451469V', '', 'Female', '1971-12-10', 'TR004', 'MSO', '1996-02-06', '80/1,A Kolaniya, Kotuwegedara, Matale', 'Matale', '0713001096', 12, '15', '', '', '', '2020-09-22 10:25:50'),
(760, '439', 'D.G.N.Saman Dissanayake', '721350517V', '', 'Male', '1972-05-14', 'AD001', 'Office Employment Service', '1999-11-01', '1st Mile post, Medaweragama,kaikawela', 'Matale', '0775221341', 13, '47', '', '', '', '2021-04-09 09:05:43'),
(513, '65', 'K.G.S Thalawathura', '722603370V', 'st16.first@gmail.com', 'Male', '1972-09-16', 'JO014', 'Human Resource development Assistant', '2005-09-08', 'No:90,Kanamulayaya,Naula', NULL, '710925767', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(717, '351', 'W.W.M.SARATH KUMARA WANASINGHA', '723454387V', 'wanasinghasarath34@gmail.com', 'Male', '1972-12-10', 'DE009', 'Nipunatha Development Officer', '2005-08-01', 'Rusigama, Ihalagama, Pallepola', 'Pallepola', '0714404646', 6, '2', '', '', '', '2021-02-09 05:39:02'),
(317, '129', 'W.M.T.K.WANNINAYAKE', '725983581V', 'Kenulatharanga@gmail.com', '', '1970-01-01', 'AD001', 'DO', '1997-11-03', 'No: 11,Kaludawela, circular road, Matale', NULL, '0718978684', 10, '47', '0d682e90e6b66ad299761759aa97fc137104a958.jpg', 'assets/profile_images/0d682e90e6b66ad299761759aa97fc137104a958.jpg', 'image/jpeg', '2020-09-03 05:31:12'),
(288, '78', 'K.G.PRIYANKA KUMARI', '727071768V', 'priyankakumari1972@gmail.com', 'Female', '1972-07-25', 'DE009', 'DISTRICT CHILD RIGHTS PROMOTION OFFICER', '1999-05-16', '95-5,PAHALA YATAWARA,WATTEGAMA', NULL, '718481350', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(542, '270', 'U.M.I.T.WIJESIRI', '727200460V', 'samurdhimatale@gmail.com', 'Female', '1972-09-07', 'SA007', 'DISTRICT OFFICE MANAGER', '2001-05-02', '', NULL, '714459394', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(543, '294', 'G.G.J.KULATHILAKA', '727240250V', 'kulathilakej@gmail.com', 'Female', '1972-08-11', 'SA007', 'DISTRICT OFFICE MANAGER', '1995-04-17', '', NULL, '711973124', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(298, '107', 'S.K.P.A. PERERA', '727321950 V', 'prabashini72@gmail.com', 'Female', '1972-08-19', 'DE009', 'CULTUREL OFFICER', '2001-08-20', '4 th MAIL POST,BULANAWEWA,DEWAHUWA', NULL, '7173194995', 12, '32', '', '', '', '2020-09-03 05:28:25'),
(556, '299', 'W.G.KUSUMARANI', '728611928V', 'samurdhimatale@gmail.com', 'Female', '1972-12-26', 'SA007', 'DISTRICT OFFICE SDO', '2001-10-10', '', NULL, '716466698', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(610, '272', 'R.G.S.K.DARMARATHNA', '730231555V', 'samurdhimatale@gmail.com', 'Male', '1973-01-23', 'SA007', 'INTERNAL AUDIT OFFICER', '1995-05-02', '', NULL, '777204866', 6, '231', '', '', '', '2020-09-08 07:34:42'),
(694, '63', 'A.M.M.G.A.H BANDARA', '730613768V', '', 'Male', '1973-03-01', 'ME024', 'Media Investigation Officer', '2002-03-01', '49/2,Gadarawela,Menikhinna', 'Kandy', '0711936020', 6, '15', '', '', '', '2020-09-30 04:50:15'),
(615, '288', 'W.M.G.ARIYAWANSA', '731152870V', 'ariyawansawmg@gmail.com', 'Male', '1973-04-24', 'SA007', 'DISTRICT OFFICE SDO', '2014-01-03', '', NULL, '701858255', 6, '231', '', '', '', '2020-09-08 07:34:42'),
(611, '281', 'W.R.M.K.W.M.POTUWILA', '731233225V', 'manjula@pothuwila.yahoo.com', 'Male', '1973-05-02', 'SA007', 'DISTRICT OFFICE SDO', '2014-01-03', '', NULL, '716391177', 6, '231', '', '', '', '2020-09-08 07:34:42'),
(341, '323', 'P.G.L.WIJERATHNA', '731251584v', '', 'Male', '1973-05-04', 'AD001', 'Driver', '2009-03-23', '256, katuwelaanda,wahakotte', NULL, '714655818', 13, '47', '', '', '', '2020-09-03 05:32:10'),
(300, '108', 'A.N.UPUL KUMARA', '733353058 V', 'nandanaupul@gmail.com', 'Male', '1973-11-30', 'DE009', 'CULTUREL OFFICER', '0000-00-00', '263,AMBOKKADENA,AKURAMBODA', NULL, '712447503', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(508, '91', 'R.S.S Rajapaksha', '736841860V', 'sepalikarajapaksha99@gmail.com', 'Female', '1973-07-02', 'JO014', 'HRDA', '2005-07-15', '16,Atharagolla,pahala menikhinna', NULL, '717004025', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(282, '100', 'P.H.N.K.ADIKARI', '737761150V', 'niroshaadikarinayaka@gmail.com', 'Female', '1973-02-10', 'DE009', 'COODINATER OF BUDDHIST ASSISTANT', '2005-07-25', '81,RRIGETION OFFICE ROAD,MATALE', NULL, '717411189', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(290, '80', 'M.G.SUNETHRA KUMARIHAMI', '737991156V', 'sunethra60@gmail.com', 'Female', '1973-10-25', 'DE009', 'DISTRICT EARLY CHILD DEVELOPMENT OFFICER', '2005-01-07', '99-14,DARMAPALA MAWATHA,MATALE', NULL, '718112357', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(311, '47', 'K.G.P.K.K.EKANAYAKE', '738260880V', 'Priyanwada elanayaka123@ gmail.com', 'Female', '1973-11-21', 'AD001', 'M.S.O', '1997-11-03', 'NO.17/1 Ganegoda, thenna, Matale', NULL, '718658185', 12, '15', '', '', '', '2020-09-03 05:30:52'),
(584, '273', 'W.G.P.P.K.PURIJJALA', '741120550V', 'pradeeppurijjala@gmail.com', 'Male', '1974-04-21', 'SA007', 'DISTRICT OFFICE MANAGER', '2004-07-01', '', NULL, '718667945', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(770, '446', 'G.W.L.A.Kumarasinghe ', '741203839V', '', 'Female', '1974-04-29', 'LA006', 'Development Officer', '2021-01-01', '162 Kendagolla', 'Matale', '0714990131', 6, '47', '', '', '', '2021-04-09 10:19:06'),
(587, '303', 'D.A.L DEWASINGHE', '743051556V', 'matale593@gmail.com', 'Male', '1974-10-31', 'SA007', 'DEVELOPMENT OFFRCER', '2013-05-03', '', NULL, '754308521', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(637, '8', 'I D P WIJETHILAKA', '743242319v', 'ishan_wijethilake@yahoo.com', 'Male', '1970-01-01', 'LA006', 'Additional District Secretary (Land)', '1970-01-01', 'Matale', 'Matale', '0714471119', 2, '1', '', '', '', '2020-09-17 09:34:36'),
(586, '232', 'P.M.K DINANGAMUWA', '743423992V', 'dinan2007@gmail.com', 'Male', '1974-12-07', 'SA007', 'PROMOSIONAL OFFICER', '2005-07-01', '', NULL, '761285637', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(585, '275', 'A.P.S.HEWAPATHIRANA', '743640683V', 'asela2winil@gmail.com', 'Male', '1974-12-29', 'SA007', 'DISTRICT OFFICE MANAGER', '1995-04-17', '', NULL, '77 0289600', 6, '231', '', '', '', '2020-09-08 07:29:05'),
(555, '277', 'D.J.C. KANNANGARA', '745501915V', 'samurdhimatale@gmail.com', 'Female', '1974-02-19', 'SA007', 'DISTRICT OFFICE SDO', '1999-08-02', '', NULL, '717895130', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(539, '295', 'K.M.M.R.R.M.N.D.K.SIRIWARDHANA', '746372213V', 'nayanasiriwardana@gmail.com', 'Female', '1974-05-16', 'SA007', 'DISTRICT OFFICE MANAGER', '1995-05-02', '', NULL, '715267282', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(323, '42', 'G.G.I.D.PRIYADARSHANI', '747162360v', 'Iresika jayarathna @ gmail.com', 'Female', '1974-08-03', 'AD001', 'M.S.O', '2004-03-01', 'Nuwara gedara, lenadora', NULL, '718049637', 6, '47', '', '', '', '2020-09-03 05:31:12'),
(670, '420', 'W.G.S.I. Bandara', '750163343V', 'indunil@gmail.com', 'Male', '1975-01-16', 'PL003', 'Management Services Officer', '1997-11-03', 'Horagolla,Raththota,matale', NULL, '779598995', 6, '184', '', '', '', '2020-09-24 08:49:59'),
(507, '95', 'S.R Subhasingha', '752073465V', 'subasinghasr@gmail.com', 'Male', '1975-07-27', 'JO014', 'HRDA', '2005-10-18', '52,Mawathupola,Matale', NULL, '704702412', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(685, '189', 'R.G.C.S.C.Ariyarathne', '752212724V', 'matale.dps@gmail.com', 'Male', '1975-08-08', 'PL003', 'K.K.S', '2006-08-28', 'no.29,Udawaththa, Ankumbura', NULL, '714725328', 13, '175', '', '', '', '2020-09-24 08:49:59'),
(751, '229', 'A.M.S.B.Atthanayaka', '752542473V', 'satthanayaka333@gmail.com', 'Male', '1975-09-10', 'DE009', 'Coordinator NGO', '2021-02-22', '136C, Madapola, Teldeniya.', 'Kandy', '0701826100', 6, '32', '', '', '', '2021-03-15 10:14:17'),
(526, '326', 'M.M.S.N.Senadheera ', '755161560V', 'mmsnilanthi@yahoo.com', 'Female', '1975-01-16', 'SM013', 'Graduate Trainee', '2019-08-01', '172, Warakanda , Warakamura , Matale .', NULL, '765634400', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(733, '334', 'D.S.Boperathnage ', '755792632V', 'dilki2008@gmail.com', 'Female', '1975-03-19', '10', 'Graduate Trainee', '2021-02-01', '15,Seriverd, Aluwihara', 'Matale', '0754330009', 6, '231', '', '', '', '2021-03-09 05:53:35'),
(715, '85', 'Shiranthi Watthegedara', '756172298V', 'swatthegedara75@gmail.com', 'Female', '1975-04-26', 'JO014', 'Human Resourse Development Officer', '2005-01-19', '79, Kiwula ', 'Matale', '0718481384', 6, '2', '', '', '', '2021-01-13 09:24:05'),
(343, '55', 'H.M.G.G.EKANAYAKE', '760591750v', '', 'Male', '1976-02-28', 'AD001', 'K.k.S', '1998-04-25', '250/A , bogambara, matale ', NULL, '714791810', 13, '47', '', '', '', '2020-09-03 05:32:10'),
(697, '313', 'P.D.S.K. Vijewardhana', '762053071V', '', 'Male', '1976-07-23', 'AD001', 'Driver', '2019-02-20', 'Udahena ,Dodamgaslantha', 'Kurunagala', '0778302215', 13, '0', '', '', '', '2020-10-29 05:09:49'),
(88, '179', 'W.M.D Suraweera', '762340577V', 'msuraweera@gmail.com', 'Male', '1976-08-21', 'ENG010', 'Development Field Assistant', '2005-08-01', 'No32, \"Yasisura\" Pattiyatenna Road, Walala', NULL, '715467831', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(540, '238', 'K.M.N.K.KARUNATHILAKA', '765562058V', 'samurdhimatale@gmail.com', 'Female', '1976-02-25', 'SA007', 'DISTRICT OFFICE MANAGER', '2000-08-21', '', NULL, '703582024', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(557, '307', 'R.M.I.S.K.RANASINGHE', '765790336V', 'rmisk1976@gmail.com', 'Female', '1976-03-19', 'SA007', 'DISTRICT OFFICE SDO', '2000-07-31', '', NULL, '714728412', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(692, '96', 'E.G.C. BOTHOTA', '766000983V', 'bothota65@gmail.com', 'Female', '1976-04-09', 'AD001', 'Productivity Development Officer', '2005-10-19', '50/70,Kohobiliwela', 'Matale', '0712512072', 6, '47', '', '', '', '2020-09-30 03:59:08'),
(551, '276', 'H.M.T.D.MALWATHTHAGE', '766622437V', 'samurdhimatale@gmail.com', 'Female', '1976-06-10', 'SA007', 'DISTRICT OFFICE SDO', '2001-02-08', '', NULL, '716412338', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(310, '25', ' D.M.M.M.DISSANAYAKE', '767101988V', 'manojidissanayake2@gmail.com', 'Female', '1976-07-28', 'AD001', 'Government Translator', '2000-04-20', '‘GANGA’ Dombawela, Mahawela', NULL, '777212102', 5, '11', '', '', '', '2020-09-03 05:30:52'),
(686, '64', 'K.G Thushani Dharmasiri', '767602081V', '', 'Female', '1976-09-16', 'AD001', 'Development Officer', '2005-07-27', 'Matale', 'Matale', '0712320142', 6, '47', '', '', '', '2020-09-25 04:09:16'),
(285, '120', 'L.S.KUMARI', '767680325V', 'sumithrakumari769@gmail.com', 'Female', '1976-09-24', 'DE009', 'DISTRIC COORDINATING OFFICER', '2017-01-08', 'KEHELWALA,KIRIBATHKUMBURA,KANDY', NULL, '703390091', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(83, '127', 'J.M Kumarasinghe', '767732759V', 'jayanthikumarasinghe100@gmail.com', 'Female', '1976-09-29', 'ENG010', 'Technical Officer', '2006-10-02', 'No.8, Govt quarters M.C Road, Matale', NULL, '775899954', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(512, '203', 'M.D.T Wipulasiri', '771791280', 'wipulasiri77@gmail.com', 'Male', '1977-06-27', 'JO014', 'Development Officer', '2013-03-18', '179B,kinigama,Narawaththa', NULL, '715737191', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(613, '278', 'T.G.A.B. ABEYRATHNE', '772482183V', '772482183v@gmail.com', 'Male', '1977-09-04', 'SA007', 'DISTRICT OFFICE SDO', '2001-01-17', '', NULL, '71 6391432', 6, '231', '', '', '', '2020-09-08 07:34:42'),
(718, '61', 'U.G.L.P.K.SENEVIRATHNE', '772730012V', '', 'Male', '1977-09-29', 'AD001', 'DRIVER', '2013-05-15', '100/B KALANPIYAGAMA', 'DAMBULLA', '0712292613', 13, '15', '', '', '', '2021-02-09 06:01:14'),
(727, '212', 'J.P.K.Nevil kumara', '773290156V', '', 'Male', '1977-11-24', 'AD001', 'Driver', '2009-09-01', 'No.14 Udawahigala', 'Matale', '0712320738', 13, '15', '', '', '', '2021-03-04 09:30:02'),
(506, '67', 'K.P.D Kumarapathirana', '773530955V', 'dineshpathirana52@gmail.com', 'Male', '1970-01-01', 'JO014', 'MSO', '2005-07-15', '11/7 B,kotuwegedara 2nd lane  ,Matale', NULL, '719562720', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(293, '79', 'E.G.N.P.KARUNANAYAKA', '776101400V', 'nayaniwdo@gmail.com', 'Female', '1977-04-19', 'DE009', 'DISTRICT WOMEN DEVELOPMENT OFFICER', '2005-01-08', '29-2,SIR RICHARD ALUWIHARAYA MAWATHA,MATALE', NULL, '719444870', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(484, '133', 'M.G.C.D.A.Medagedara', '776822205V', NULL, 'Female', '1977-06-30', 'AC002', 'Development Officer', '2013-03-20', 'Sonduru sewana,Pallepola,Matale.', NULL, '716608729', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(315, '24', 'A.M.I.D.K.ABESINGHE', '776893307V', 'Dilhani abeysinghe1977 @ gmail.com', 'Female', '1977-07-07', 'AD001', 'M.S.O', '2006-05-08', 'No’100 Melpitiya, Matale', NULL, '714410161', 6, '47', '', '', '', '2020-09-03 05:30:52'),
(748, '349', 'L.G.Wattege', '778093006V', '19wattage@gmail.com', 'Female', '1977-11-04', '10', 'Graduate Trainee', '2021-02-01', '02/85 Redibanagama, Purijala', 'Matale', '0713901070', 6, '32', '', '', '', '2021-03-09 09:23:03'),
(287, '74', 'C.D.DE COSTA', '778591871V', 'chaminivihara@gmail.com', 'Female', '1977-12-24', 'DE009', 'NATIONAL INTEGATION PROMOTION ASSISTANT', '2005-08-24', '7-4,BOMALUWA ROAD,MATALE', NULL, '718506024', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(82, '46', 'J.M.R.S Jayasekara', '778623226V', 'rasangiejayasekara@yahoo.com', 'Female', '1977-12-27', 'ENG010', 'Technical Officer', '2006-10-02', 'No.295/4, Nikawella Road, Rattota', NULL, '779998948', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(297, '123', 'U.C.N.B.WICKRAMASINGHE', '780194065 V', 'udcchaminda@gmail.com', 'Male', '1978-01-19', 'DE009', 'NGO COORDINATIOR', '2013-03-25', '44-3,OWILLA,TENNA,MATALE', NULL, '711966214', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(726, '123', 'U.C.N.B.WICKRAMASINGHE', '780194065V', 'udcchaminda@gmail.com', 'Male', '1978-01-19', 'DE009', 'District NGO Coordinator', '2013-03-25', 'No 3/44 Ovillatenna', 'Matale', '0711966214', 6, '32', '', '', '', '2021-02-25 10:38:58'),
(687, '220', 'Chaminda Amaraweera', '780843462V', '', 'Male', '1978-03-24', 'DM016', 'Assistant Director', '2011-11-21', 'Matale', 'Matale', '0773957890', 3, '1', '', '', '', '2020-09-25 04:37:19'),
(701, '221', 'H.M.M.G Kudabanda', '782695657V', 'kbdmc@yahoo.com', 'Male', '1978-09-25', 'DM016', 'District Disaster management Assistant', '2006-11-01', 'Matale', 'Matale', '760994900', 6, '220', '', '', '', '2020-11-25 05:13:49'),
(728, '213', 'W.L.D.Saman Indika Nanayakkara', '783331632V', 'samannanayakkara3@gmail.com', 'Male', '1978-11-28', 'AG008', 'Driver', '2017-02-12', '17/1 Matalewatte, Dumkalawatte', 'Matale', '0711349907', 13, '43', '', '', '', '2021-03-08 06:42:14'),
(675, '196', 'W.M.P.T.Wickramasinghe', '785081188V', 'thushariranatuunga@gmail.com', 'Female', '1978-01-08', 'PL003', 'Development Officer', '2005-08-01', '35/26, Maligatenna Rd, Hulangamuwa,Matale', NULL, '777490464', 6, '422', '7de195eaf3447d3c936ae65ae6128d506442e95e.jpg', 'assets/profile_images/7de195eaf3447d3c936ae65ae6128d506442e95e.jpg', 'image/jpeg', '2020-09-24 08:49:59'),
(548, '245', 'M.M.A.A.K.KARUNARATHNA', '785503511V', 'samurdhimatale@gmail.com', 'Female', '1978-02-19', 'SA007', 'DISTRICT OFFICE SDO', '2001-10-10', '', NULL, '714794168', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(547, '274', 'D.A.C.DHANUSHKI', '785723627V', 'samurdhimatale@gmail.com', 'Female', '1978-03-12', 'SA007', 'DISTRICT OFFICE SDO', '2001-10-10', '', NULL, '774724151', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(649, '131', 'I.A.A.U.Senevirathna', '786000750V', '', 'Female', '1978-04-09', 'IA0015', 'Development Officer', '2013-06-06', '18/2, Alupothuwela,Ukuwela', 'Matale', '0719625715', 6, '05', '135px-Zaffiro_tagliato.jpg', 'assets/profile_images/135px-Zaffiro_tagliato.jpg', 'image/jpeg', '2020-09-24 03:28:44'),
(662, '183', 'D.H.M.D.S.Kapukotuwa', '788412037V', '', 'Female', '1978-12-06', 'PL003', 'Assistant Director (Planing)', '2008-12-22', '31,Paranagama,Jambugapitiya', 'Matale', '0724405895', 3, '175', '', '', '', '2020-09-24 04:04:24'),
(625, '298', 'D.M.P.BANDARA', '790274865V', NULL, 'Male', '1979-01-27', 'SA007', 'OFFICE LEABER', '2007-01-18', '', NULL, '702270687', 13, '231', '', '', '', '2020-09-08 07:39:43'),
(472, ' 7', 'B.G.S.Suraweera', '792974546V', 'bgssuraweera23@gmail.com', ' Male', '1979-10-23', 'AC002', 'Accountant', '2010-07-01', '273/B/2,Elagallegedara,Munwathugoda,Danthure', NULL, '718378523', 11, '4', '', '', '', '2020-09-03 05:52:36'),
(631, '170', 'P.K.J.N.M.U.G.K.Navaratne', '795851208V', NULL, 'Female', '1979-03-25', 'LA006', 'Development Officer', '2017-01-20', 'No 7,Rahula mawatha,Matale', NULL, '718188087', 6, '21', '', '', '', '2020-09-08 08:12:50'),
(529, '231', 'F.R.M.RIYALDEEN', '796470437V', 'riyaldeenfrm@gmail.com', '2006-10-02 12:00:00 AM', '1979-05-26', 'SA007', 'DISTRICT DIRECTOR', '2006-10-02', '', NULL, '711394823', 2, '1', '', '', '', '2020-09-08 07:13:29'),
(554, '280', 'W.N.N.FERNANDO', '796892641V', 'nsleweerppulige@yahoo.com.uk', 'Female', '1979-07-07', 'SA007', 'DISTRICT OFFICE SDO', '2005-10-03', '', NULL, '775917531', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(679, '200', 'T.M.A.L.Kumari', '796985470V', 'lassanthi79717@gmail.com', 'Female', '1979-07-16', 'PL003', 'Develoment Officer', '2013-03-18', '65/2A, Elwala, Ukuwela', NULL, '717129112', 6, '182', '', '', '', '2020-09-24 08:49:59'),
(485, '35', 'K.G.D.D.N.De Alwis', '797242403V', NULL, 'Female', '1979-08-11', 'AC002', 'Management Service Assistant', '2000-06-05', '111/11,Nikakotuwa,Aluwihare.', NULL, '714410178', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(339, '61', 'A. WITHARANA', '802392702v', '', 'Male', '1980-08-26', 'AD001', 'Driver', '2011-11-08', 'Udabotawa, rathnapura', NULL, '712803923', 13, '47', '', '', '', '2020-09-03 05:32:10'),
(650, '128', 'W.M.C.A.B.Wijekoon', '803054223V', 'anuruddikwijekoon@gmail.com', 'Male', '0000-00-00', 'IA0015', 'Development Officer', '0000-00-00', 'No117/2/A ,Lakshaheena-C,Ambanpola,Udasgiriya,Matale ', 'Matale', '0779907954', 6, '05', '', '', '', '2020-09-24 03:28:52'),
(633, '139', 'D.S.Jeyasundara', '805223685V', 'hansi.jeyasundara@gmail.com', 'Female', '1980-01-22', 'LA006', 'Development Officer', '2013-03-18', 'No 17/6, Welikanda,balakaduwa, Alawathugoda', NULL, '778837955', 6, '21', '', '', '', '2020-09-08 08:12:50'),
(672, '430', 'R.M.P.P.K.Wijekoon', '805821205V', 'kalyaniwijekoon25@gmail.com', 'Female', '1980-03-22', 'PL003', 'Development Officer', '2013-04-09', 'No.01, Athipola west, Dullewa, Matale', NULL, '714898691', 6, '184', '', '', '', '2020-09-24 08:49:59'),
(681, '210', 'S.M.A.P.Sathkumara', '805830336V', 'arunisathakumara2012@gmail.com', 'Female', '1980-03-23', 'PL003', 'Development Officer', '2013-05-28', 'Kongahamula, Iriyagolla, Palapathwala', NULL, '0711798728', 6, '422', '', '', '', '2020-09-24 08:49:59'),
(552, '291', 'R.E.C.S.H.SAMARAWEERA', '806022934V', 'samurdhimatale@gmail.com', 'Female', '1980-04-11', 'SA007', 'DISTRICT OFFICE SDO', '2001-02-10', '', NULL, '717980558', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(279, '149', 'J.M.CHAMARIKA MADHURANI', '806510343V', 'chamarika.madhurani@yahoo.com', 'Female', '1980-05-30', 'DE009', 'DEVELOPMENT OFFICER', '2013-10-15', '53,NAGOLLA ROAD,MATALE', NULL, '712770336', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(734, '335', 'H.D.W.B.A.W.G.R.D.W.L.C.DORAKUMBURA', '807800612V', 'lasanthidk1980@gmail.com', 'Female', '1980-10-06', '10', 'Graduate Trainee', '2021-02-01', '11/8, Kotuwegedara', 'Matale', '0719098142', 6, '32', '', '', '', '2021-03-09 07:10:55'),
(712, '188', 'R.M.K.RATHNAYAKE', '807813374V', '', 'Female', '2021-10-07', 'AD001', 'Management Service Officer', '2006-06-01', '25/6, Clinic Road, Matale.', 'Matale', '0714410168', 6, '47', '', '', '', '2021-01-04 05:15:42'),
(708, '86', 'A.M.P.C.K. Abesinghe', '811980889V', 'pckabesinghe@gmail.com', 'Male', '1976-07-16', 'IA0015', 'Management Service Officer ', '2007-12-10', 'Weherawatawatta, Monarawilla,', 'Pallepola', '0714471385', 12, '05', '', '', '', '2020-12-04 14:59:23'),
(719, '4194', 'H.M.A.K.Herath', '813570084V', 'ashokaherath2016@gmail.com', 'Male', '1981-12-22', 'GEA019', 'Superintendent of Audit', '2010-07-01', '46/3 Balagolla, Janapadaya,', 'Maeliya', '0702603386', 12, '1', '', '', '', '2021-02-15 06:22:07'),
(501, '802', 'A.A.M.Mubassir', '813900130v', 'ammubashir@gmail.com', 'Male', '1989-05-18', 'CO011', 'Investigation officer', '2018-01-15', '321, Rambana, sunandapura', NULL, '0777 581734', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(295, '81', 'M.V.S.MUNASINGHA', '815111494V', 'ncpavishaka@gmail.com', 'Female', '1981-11-01', 'DE009', 'DISTRICT CHILD PROTECTION OFFICER', '2007-03-09', '49-1,EGODA NIWASA,BEBALAGAMA,GALAGEDARA', NULL, '718421896', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(703, '224', 'K.S. Jayasekara', '815651723V', 'suneethajayasekara15@gmail.com', 'Female', '1981-03-15', 'DM016', 'Development Officer', '2018-08-02', 'Matale', 'Matale', '775634217', 6, '220', '', '', '', '2020-11-25 05:47:58'),
(673, '176', 'W.W.K.Dharmawardana', '815752074V', 'kanthidh@armawardana@gmail.com', 'Female', '1981-03-15', 'PL003', 'Plantation  Commiunity,Comminication,Fasilitator', '2006-06-01', 'No.72/A, Wendesi Waththa, Pannampitiya', NULL, '719201334', 6, '177', '', '', '', '2020-09-24 08:49:59'),
(289, '169', 'L.G.A.N.THILAKARATHNA', '815921313V', 'achalathilakarathna8159@gmail.com', 'Female', '1981-01-04', 'DE009', 'DISTRICT COUNSELLING OFFICER', '2008-01-12', 'DADUHELA,OWILIKANDA,MATALE', NULL, '719554249', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(550, '284', 'S.T.GUNASEKARA', '815932056V', 'samurdhimatale@gmail.com', 'Female', '1981-04-02', 'SA007', 'DISTRICT OFFICE SDO', '2005-10-03', '', NULL, '719835393', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(541, '292', 'E.U.G.SHILANI  RATHNASIRI', '816953189V', 'shilanirathnasiri@gmail.com', 'Female', '1981-07-13', 'SA007', 'DISTRICT OFFICE MANAGER', '2006-02-01', '', NULL, '718422029', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(487, '359', 'K.R.M.S.Rathnaweera', '817560563V', NULL, 'Female', '1981-09-12', 'AC002', ' Graduate Trainee', '2019-08-01', 'No.20/5,Nagollagama Rd,Matale.', NULL, '776362730', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(71, '211', 'B.M.Chandima Basnayaka', '817950329v', 'bmcbasnayaka81@gamail.com', 'Female', '0000-00-00', 'AG008', 'Development Officer', '0000-00-00', 'Araliya Sewana,  Kotuhena,    Maduragoda,                      Kurunagala', NULL, '776369911', 6, '43', '', '', '', '2020-08-28 10:18:12'),
(698, '114', 'R.M.K.R. Menike', '818593236V', 'kasturirasa24@gmail.com', 'Female', '1981-12-24', 'SM013', 'Development Officer', '2013-02-26', 'No. 48, Watassayaya, Muwandeniya', 'Matale', '0713099022', 12, '94', '', '', '', '2020-11-23 07:11:44'),
(483, '87', 'M.S.M.Riyasdeen', '820532260V', 'msmriyas222@gmail.com', 'Male', '1982-02-22', 'AC002', 'Pension Officer', '2011-01-10', '62,Dolawatta,Matale.', NULL, '0773779665', 6, '19', '1.jpg', 'assets/profile_images/1.jpg', 'image/jpeg', '2020-09-03 05:52:36'),
(345, '97', 'C.KARUNARATHNE', '820591321v', '', 'Male', '1982-02-28', 'AD001', 'K.k.S', '2014-11-18', 'No, 81 Elwela, ukuwela', NULL, '714600514', 13, '47', 'db4cb0eca5fd484f6b96b3dd6606aeeb4cdc3ca8.jpg', 'assets/profile_images/db4cb0eca5fd484f6b96b3dd6606aeeb4cdc3ca8.jpg', 'image/jpeg', '2020-09-03 05:32:10'),
(340, '432', 'D.JAYASIGHA', '821341550v', 'daminda Jayasinghe @ gmail.com', 'Male', '1982-05-13', 'AD001', 'Driver', '2017-07-12', '241/A, Somarama mawatha, ginthota, Galle', NULL, '712011020', 13, '47', '', '', '', '2020-09-03 05:32:10'),
(725, '432', 'D.Jayasinghe', '821341590V', 'damindajayasinghe@gmail.com', 'Male', '1982-05-13', 'AD001', 'Driver', '2017-07-12', '241/A Somarama Mw,', 'Ginthota', '0712011020', 13, '15', '', '', '', '2021-02-25 06:27:37'),
(367, '146', 'A.S.I. Daya Beddage', '823531303V', 'sribeddage@gmail.com', 'Male', '1982-12-18', 'AD001', 'Development Officer', '2013-02-18', 'No 38/16, Vihara Road, Matale', NULL, '715534683', 6, '11', '', '', '', '2020-09-03 05:34:25'),
(80, '36', 'H.G.G.M Dharmarathna', '825542523V', 'ngskb82@gmail.com', 'Female', '1982-02-23', 'ENG010', 'Technical Assistant', '2014-07-15', 'No.317/1, Maradurawala, Kaikawala', NULL, '702545854', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(632, '193', 'G.P.G.H.Balasuriya', '825582487V', 'hemamalibalasuriya@gmail.com', 'Female', '1970-01-01', 'LA006', 'DO', '2013-09-17', 'No 105/1, Pahala kithulgolla, Ankumbura, Kandy', NULL, '715917813', 6, '21', '', '', '', '2020-09-08 08:12:50'),
(312, '26', 'W.M.L.WIJERATHNA', '827442887V', 'Lakmali K Wijerathne @ gmail.com', 'Female', '1982-08-31', 'AD001', 'M.S.O', '2007-10-10', '358/1,pasal watta,uda weragama,kaikawela', NULL, '779226432', 6, '47', '9ccb60958c4d62ce18fd1a6dad02b36e3b4a23d2.jpg', 'assets/profile_images/9ccb60958c4d62ce18fd1a6dad02b36e3b4a23d2.jpg', 'image/jpeg', '2020-09-03 05:30:52'),
(514, '92', 'B.M.W.P Bandaranayake', '828275127V', 'prasadikawarnamali8219@gmail.com', 'Female', '1982-11-22', 'JO014', 'Development Officer', '2013-04-25', '115/1,Hapugoda,Ambathenna.', NULL, '711717461', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(758, '437', 'M.A.Liyanage', '828413368V', 'mirani.atha@gmail.com', 'Female', '1982-06-12', 'AD001', 'Management Officer', '2011-04-11', '3/12 A Meegasthena Road, Uduphilla', 'Matale', '0704249660', 6, '47', '', '', '', '2021-04-09 07:12:37'),
(338, '218', 'R.DHARMASIRI', '830573372v', '', 'Male', '1983-02-26', 'AD001', 'Driver', '2008-07-01', 'No 49 Sakura uyana, palapathawala, matale ', NULL, '710590504', 13, '47', '', '', '', '2020-09-03 05:32:10'),
(333, '297', 'D.CHANDRASEKARA', '830762906V', 'malithdesh@gmail.com', 'Male', '1983-03-16', 'AD001', 'D.O', '2013-05-27', '42,mahawali  complx, pallecale', NULL, '778774115', 6, '47', '2d8b1c533027bdc198fb00a5f60fd5de6c7de546.jpg', 'assets/profile_images/2d8b1c533027bdc198fb00a5f60fd5de6c7de546.jpg', 'image/jpeg', '2020-09-03 05:31:30'),
(683, '191', 'T.K.R.S. Silva', '831692987V', 'matale.dps@gmail.com', 'Male', '1983-06-17', 'PL003', 'Driver', '2011-01-17', 'Ihalaowala,Kikawala', NULL, '773285385', 13, '175', '', '', '', '2020-09-24 08:49:59'),
(332, '318', 'H.M.G.D.HERATH', '832774464V', 'gayanherath@gmail.com', 'Male', '1983-10-03', 'AD001', 'D.O', '2013-05-03', '63/1,Thanna ,Matale', NULL, '718229457', 6, '47', '', '', '', '2020-09-03 05:31:30'),
(335, '296', 'R.M.M.PUSHPAKUMARA', '832960365V', 'Manjulanps @ gmail.com', 'Male', '1983-10-22', 'AD001', 'D.O', '2013-04-16', '51/5,sappuwathwala,palapathwala, malale', NULL, '715722891', 6, '47', '', '', '', '2020-09-03 05:31:30'),
(79, '145', 'K.A.D.S.C Kularathne', '835760626V', 'chathu.bach83@gmail.com', 'Female', '1983-03-16', 'ENG010', 'Development Officer', '2013-09-12', 'Gampaha Dispensary, Matale Road, Ukuwela', NULL, '772663120', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(762, '442', 'M.M.Priyadharshani', '835851133V', '', 'Female', '1983-03-25', 'PL003', 'Development Officer', '2021-01-01', '61 Eeriyagolla kaudupellela', 'Matale', '0772773358', 6, '47', '', '', '', '2021-04-09 09:16:33'),
(654, '31', 'M.T.Dassanayake', '836342330V', '', 'Female', '1983-05-13', 'IA0015', 'Development Officer', '2013-03-18', 'Pubudu Temple Road, Gurubebila ,Metihakka', 'Matale', '0775653862', 6, '05', '', '', '', '2020-09-24 03:32:24'),
(707, '151', 'P.L.S.S.K.B.LEKAMGE', '836451325V', 'slekamge1@gmail.com', 'Female', '1983-05-24', 'ST018', 'Statistician', '2004-12-02', 'Sweethagiri, Sirimalwaththa,', 'Gunnapana', '0714488908', 3, '2', '', '', '', '2020-11-27 05:55:35'),
(553, '271', 'A.M.J.C ABEYRATHNE', '836762045V', 'chathuraniaj@gmail.com', 'Female', '1983-06-24', 'SA007', 'DISTRICT OFFICE SDO', '2005-10-23', '', NULL, '770372008', 6, '231', '', '', '', '2020-09-08 07:18:05'),
(473, '45', 'A.U.P.K.Senavirathna', '837443407V', 'priyanthisenavirathna2@gmail.com', 'Female', '1970-01-01', 'AC002', 'DO', '2012-03-19', '26,Moragaskotuwa,Jambugahapitiya.', NULL, '776348228', 6, '19', '1ca252aeebd0262a9e5b2ca588d9eada0628b368.jpg', 'assets/profile_images/1ca252aeebd0262a9e5b2ca588d9eada0628b368.jpg', 'image/jpeg', '2020-09-03 05:52:36'),
(321, '174', 'B.R.C.T.BASNAYAKA', '838160565V', 'Thilankact @ gmail.com', 'Female', '1983-11-11', 'AD001', 'D.O', '2013-03-19', '24,galwadukubura,kawdupelalla', NULL, '702691224', 6, '47', '', '', '', '2020-09-03 05:31:12'),
(763, '443', 'A.G.Wasana Lakmali Karunarathne', '838482546V', '', 'Female', '1983-12-13', 'IA0015', 'Development Officer', '2021-01-01', '103 Thembilideniya', 'Mahawela', '0718381798', 6, '47', '', '', '', '2021-04-09 09:25:18'),
(750, '355', 'P.R.C.Punchihewa', '841343506V', 'rukeenet@gmail.com', 'Male', '1984-05-13', 'IA0015', 'Graduate Trainee', '2021-02-15', '98,  Elwela, Ukuwela', 'Matale', '0759629269', 6, '86', '', '', '', '2021-03-12 04:21:20'),
(497, '454', 'L.A.A. Athukorala', '842392730v', 'amilaathukorala.caa@gmail.com', 'Male', '1984-08-26', 'CO011', 'Investigation officer', '2013-02-15', '11, Pahalagama, uhumeeya', NULL, '0770 139288', 0, '182', '', '', '', '2020-09-03 05:56:11');
INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `NIC`, `EmailId`, `Gender`, `Dob`, `Department`, `designation`, `DateofAppointment`, `Address`, `City`, `Phonenumber`, `roleId`, `supervise`, `ImgFile`, `ImgFilePath`, `ImgFileType`, `RegDate`) VALUES
(660, '194', 'B.D.D.T.D.Weerasinghe', '845253269V', '', 'Female', '1984-01-25', 'PL003', 'Development Officer', '2013-02-26', 'No.35 Situwara Asapuwa|U|dupitriya, Ukuwela', 'Matale', '0779058538', 6, '175', '', '', '', '2020-09-24 04:00:26'),
(73, '208', 'T.G.Nilmini Rupasingha', '845292248v', 'nilminirupasinha1984@gamail.com', 'Female', '0000-00-00', 'AG008', 'Development Officer', '0000-00-00', '13/2, Thotagamuwa Watta,Palapathwala  ,Matale', NULL, '779301503', 6, '43', '', '', '', '2020-08-28 10:18:12'),
(320, '167', 'S.A.G.K.K.SAMARASINGHE', '845523606V', 'Kanchana_samarasinghe@yahoo.com', 'Female', '1970-01-01', 'AD001', 'DO', '2016-01-20', '18/A,sudugangawatta,kaludewala, matale', NULL, '775960950', 6, '47', '', '', '', '2020-09-03 05:31:12'),
(669, '182', 'K.A.K.M.M.Gunathilaka', '845701440V', 'kaushikamihiri@gmail.com', 'Female', '1984-03-10', 'PL003', 'Assistant Director (Planning)', '2013-07-15', 'No.30, Mahadewata Road, Matale', NULL, '711324822', 3, '175', '1280px-Flag_of_Sri_Lanka.svg.png', 'assets/profile_images/1280px-Flag_of_Sri_Lanka.svg.png', 'image/png', '2020-09-24 08:49:59'),
(486, '181', 'D.M.T.M.Dissanayake', '845823502V', NULL, 'Female', '1984-03-22', 'AC002', 'Development Officer', '2013-09-12', '140/1,Matale watta,Dunkolawatta,Matale.', NULL, '705959330', 0, '19', '', '', '', '2020-09-03 05:52:36'),
(643, '50', 'H.M.A.E.Rathnabandara', '845951888V', 'rathnaban1984@gmail.com', 'Female', '1984-04-04', 'TR004', 'Development officer', '2013-04-16', '8/1, Koongahamula, Palapathwala, Matale', 'Matale', '0712999024', 6, '27', '', '', '', '2020-09-23 04:16:47'),
(72, '207', 'K.M.Wilasani Kulathunga ', '847060492v', 'wilasanikulatunga@gmail.com', 'Female', '0000-00-00', 'AG008', 'Development Officer', '0000-00-00', 'No.13, 02 Janapadaya, Aluwihare', NULL, '712713354', 6, '43', '', '', '', '2020-08-28 10:18:12'),
(509, '209', 'W.A.R.D Bandara', '847751894V', 'rasadaribandara2015@gmail.com', 'Female', '1984-10-01', 'JO014', 'Development Officer', '2013-02-27', '168,Deewilla,yatawaththa', NULL, '717295821', 6, '2', '', '', '', '2020-09-08 06:19:49'),
(520, '112', 'V.K.Gunarathne ', '847843284V', 'vajirakumari@yahoo.com', 'Female', '1984-10-10', 'SM013', 'Entreprenureship Development Training Officer', '2011-04-11', '1/43, Sri Vijitha Mawatha , Konakalagala , Alawathugoda .', NULL, '718392697', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(538, '290', 'U.G.A.ANUSHANI', '847982268V', 'asnkaanushani@yahoo.com', 'Female', '1984-10-24', 'SA007', 'DISTRICT OFFICE MANAGER', '2005-10-03', '', NULL, '718378447', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(493, '386', 'G.D.D.S Alwis', '848362824v', 'alwissene@gmail.com', 'Female', '1984-12-01', 'CO011', 'Investigation officer', '2010-10-01', '22, 4th lane, welangolla rd, kurunegala', NULL, '0772 356146', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(70, '206', 'Noyelin Maheshika Kodithuwakku', '848422886v', 'noelene_k@yahoo.com', 'Female', '0000-00-00', 'AG008', 'Development Officer', '0000-00-00', 'Hulangamuwa,  Matale', NULL, '702532855', 6, '43', '', '', '', '2020-08-28 10:18:12'),
(663, '197', 'H.M.S.K Herath', '848602795V', 'kanchdo@gmail.com', 'Female', '1970-01-01', 'PL003', 'DO', '2013-05-03', '24 Mile post,Bodikotuwa,Rattota', 'Matale', '0716037834', 6, '175', '948573e18dc88d237956044cf37f4a9d478c93bc.jpg', 'assets/profile_images/948573e18dc88d237956044cf37f4a9d478c93bc.jpg', 'image/jpeg', '2020-09-24 04:04:46'),
(499, '440', 'W.U.D.W.M.R.B.Hapuhinne', '8515533981v', 'ravindra193@Yahoo.com', 'Male', '1985-06-03', 'CO011', 'Investigation officer', '2013-02-15', '49, Gurudeniya rd, ampitiya', NULL, '0770 139304', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(331, '212', 'W.G.K.AMARASINGHE', '851741364V', 'kKamalamarsinghe@gmail.com', 'Male', '1970-01-01', 'AD001', 'DO', '2013-04-16', '89/2 Ihalamulla, Ankumbura', NULL, '0713332562', 6, '47', '', '', '', '2020-09-03 05:31:30'),
(280, '144', 'A.M.P.K.RATNAYAKE', '852051582V', 'doprasanna@gmail.com', 'Female', '1985-07-23', 'DE009', 'DEVELOPMENT OFFICER (FOREIGN EMPLOY)', '2013-09-26', '58,DOMBAWELA,MAHAWELA,MATALE', NULL, '0702571513', 6, '32', '88133432_10157060127163603_7190119825845256192_o(1).jpg', 'assets/profile_images/88133432_10157060127163603_7190119825845256192_o(1).jpg', 'image/jpeg', '2020-09-03 05:28:25'),
(503, '256', 'A.M.G.C.N.K.Thilakarathne', '853211354v', 'acnuwant@gmail.com', 'Male', '1985-11-16', 'CO011', 'Development officer', '2013-04-16', '05,Haliella,akurana', NULL, '0178 355622', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(313, '166', 'M.M.J.T.MULLEKUMBURA', '855110237V', '', 'Female', '1985-01-11', 'AD001', 'D.O', '2013-05-02', '25/A, Pushpadana Road, kandy ', NULL, '777365828', 6, '47', '', '', '', '2020-09-03 05:30:52'),
(695, '56', 'B.YASODINI', '856013561V', 'yaso4best@gmail.com', 'Female', '1985-04-10', 'AD001', 'MA', '2011-04-11', '1638/9 Matale road,Alawathugoda', 'kandy', '0778103340', 7, '47', '6fdd08a2da9f495623437dcf7bc62228fc8b9514.jpg', 'assets/profile_images/6fdd08a2da9f495623437dcf7bc62228fc8b9514.jpg', 'image/jpeg', '2020-10-22 06:34:09'),
(767, '450', 'R.M.N.K.Dissanayake', '856020312V', '', 'Female', '1985-04-11', 'AD001', 'Development Officer', '2021-01-01', '86 Hethipola, Dulhewa', 'Matale', '0768503205', 6, '47', '', '', '', '2021-04-09 10:06:54'),
(84, '404', 'W.H Dammika Udayangani', '856244040V', 'pdammika@gmail.com', 'Female', '1985-05-03', 'ENG010', 'GRADUATE TRAINEE', '2019-09-18', 'Dallanda, Akuramboda', NULL, '704486628', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(716, '135', 'S.G.N.K.SUBASINGHE', '856271838V', '', 'Female', '1985-05-06', 'AD001', 'DEVELOPMENT OFFICER', '2013-09-12', '10/14 NILMINI, RATHOTA ROAD,MANDANDAWELA', 'MATALE', '0777007936', 6, '47', '', '', '', '2021-02-08 07:30:15'),
(319, '132', 'A.W.N.N.FERNANDO ', '856802728V', 'Nishakinkini@gmail.com', 'Female', '1985-06-28', 'ME024', 'D.O', '2013-02-18', '388/6, palapathwala, Matale ', NULL, '0779129211', 6, '15', '', '', '', '2020-09-03 05:31:12'),
(495, '258', 'R.N.G.K.I.Madushani', '857040449v', 'makanchana85@gmail.com', 'Female', '1985-07-22', 'CO011', 'Development officer', '2013-07-04', '74/4, Guralawela, ukuwela', NULL, '0714 622700', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(735, '336', 'T.G.Nilanthi Tholangamuwa', '857220978V', 'nilutholangamuwa@gmail.com', 'Female', '1985-08-29', '10', 'Graduate Trainee', '2021-02-01', '41 A Janapathaya, Kotuwegedara', 'Matale', '0719312867', 6, '34', '', '', '', '2021-03-09 07:16:52'),
(764, '444', 'U.M.B.Anusha Kumari Welagedara', '857253434V', '', 'Female', '1985-08-12', 'AD001', 'Development Officer', '2021-01-01', 'Welagedara Walavita paldeniya Mahawela', 'Matale', '0715106684', 6, '47', '', '', '', '2021-04-09 09:38:06'),
(702, '227', 'K.T.N.Siriwardhana', '857422896V', 'nimalisiri@gmail.com', 'Female', '1985-08-29', 'DM016', 'District Disaster management Assistant', '2013-11-12', 'Matale', 'Matale', '760994903', 6, '220', '', '', '', '2020-11-25 05:43:53'),
(299, '109', 'N.SANGEETHA', '857531590 V', 'sangeetha.namban@gmail.com', 'Female', '1985-09-09', 'DE009', 'DEVELOPMENT OFFICER', '2013-04-16', '158-8,ALUVIHARAYA,MATALE', NULL, '0771725290', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(653, '136', 'L.A.A.H.Gunathilaka', '858020018V', '', 'Female', '1985-10-28', 'IA0015', 'Development Officer', '2013-09-12', '73,MC Road,matale', 'Matale', '0774430144', 6, '05', '', '', '', '2020-09-24 03:30:54'),
(314, '168', 'D.G.A.I.CHANDRASENA', '858640032V', '', 'Female', '1985-12-29', 'AD001', 'D.O', '2017-01-20', 'No.43/1,Nawarathnagoda,Madagama,Udathanna,Matale', NULL, '717703025', 6, '47', '', '', '', '2020-09-03 05:30:52'),
(720, '110', 'W.D.D.M.Karunarathne', '862183797V', 'madushkadushan@gmail.com', 'Male', '1986-08-05', 'SM013', 'Entrepreneur development traineee', '2014-02-03', '74/C Senasuma, yattigammana,', 'menikdingwela', '0717710725', 6, '94', '', '', '', '2021-02-17 10:32:16'),
(524, '118', 'G.N.C.S.Bandara ', '862683080V', 'nishanthasenevirathna1986@gmail.com', 'Male', '1986-09-24', 'SM013', 'Entreprenureship Development Training Officer', '2014-02-03', 'No.145,71 Janapadaya , Matihakka , Matale .', NULL, '715696990', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(278, '147', 'E.G.D.S.ATTANAYAKA', '865170475V', 'danuattanayaka@gmail.com', 'Female', '1986-01-17', 'DE009', 'DEVELOPMENT OFFICER', '2013-04-16', '101-4,DOLE ROAD,MATALE', NULL, '774978336', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(677, '171', 'S.M.Nanayakkara', '865253672V', 'madubashininanayakkaras@gmail.com', 'Female', '1986-01-25', 'PL003', 'Development Officer', '2017-01-30', '92/A/1, Richard Pamunuwa Mawatha,Matale', NULL, '711570287', 6, '184', '', '', '', '2020-09-24 08:49:59'),
(773, '445', 'H.H.A.P.S.L.Herath', '865620519V', '', 'Female', '1986-03-02', 'TR004', 'Development Officer', '2021-01-01', '14/B/1 Welgala Ankumbura', 'Poojapitiya', '0716352660', 6, '47', '', '', '', '2021-04-09 10:29:32'),
(676, '180', 'K.W.J.Perera', '865771614V', 'wathsalajperera@gmail.com', 'Female', '1986-03-17', 'PL003', 'Development Officer', '2013-05-28', '27/1, Dunukewaththa, dumkolawaththa,Matale', NULL, '716944669', 6, '177', '', '', '', '2020-09-24 08:49:59'),
(761, '441', 'E.D.O.G.A.S.Wimalasena', '866040630V', 'anusanjeewahee@gmail.com', 'Female', '1986-04-13', 'LA006', 'Development Officer', '2021-01-01', '17/1 Hihalagodapola,Pihimbuwa', '.', '0701205708', 6, '47', '', '', '', '2021-04-09 09:12:00'),
(322, '33', 'E.K.G.E.M.DHARMARATHNA', '866091587V', 'erandidharmarathna@gmail.com', 'Female', '1986-04-18', 'AD001', 'M.S.O', '2013-11-18', '16,ankumbura  road, alawathugoda', NULL, '702040092', 6, '47', '1321e2e5c29930ea6c45a97ff0a0052a1a9bc28f.jpg', 'assets/profile_images/1321e2e5c29930ea6c45a97ff0a0052a1a9bc28f.jpg', 'image/jpeg', '2020-09-03 05:31:12'),
(678, '198', 'R.M.A.S.B.Ranawana', '866281475 V', 'sewwandiranawana@gmail.com', 'Female', '1986-05-07', 'PL003', 'Development Officer', '2013-04-16', '173, Mullegama,Ambathanna', NULL, '713448407', 6, '182', '', '', '', '2020-09-24 08:49:59'),
(304, '376', 'R.M.T.D.JAYASURIYA', '866462097 V', '', 'Female', '1986-05-25', 'DE009', 'GRADUATE TRAINEE', '2019-09-18', '20,POTHUBOWA,MAWATHAGAMA', NULL, '719506678', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(680, '423', 'G.Deepa Maithily', '866532036V', 'maithilydeepa@gmail.com', 'Female', '1986-06-01', 'PL003', 'Plantation  Commiunity,Comminication, Fasilitator', '2006-06-01', 'No,24/A,Elwela,Ukuwela', NULL, '714688801', 7, '175', '', '', '', '2020-09-24 08:49:59'),
(286, '119', 'L.S.EDIRISINGHE', '866563420V', '', 'Female', '1986-04-06', 'DE009', 'MANAGEMENT ASSISTANT ', '2006-10-19', '114,SUNIMAL,THOTAGAMUWATTA', NULL, '703535106', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(778, '458', 'M.H.M.G.T.U.K.Dombawela', '867350063V', 'thush2003@gmail.com', 'Female', '1986-08-22', 'AD001', 'Development Officer', '2013-03-18', '215/5 Malwatte Road, Matale', 'Matale', '0775010236', 6, '47', '', '', '', '2021-06-15 10:30:44'),
(480, '357', 'A.H.M.N.R.Atapattu', '867553568V', 'nelushicriwmp@gmail.com', 'Female', '1986-09-11', 'AC002', 'Graduate Trainee', '2019-08-01', 'Malpolayaya,Galagedara.', NULL, '768710429', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(303, '406', 'K.G.N.S.JAYAWICKRAMA', '867563687 V ', 'NJayawickrama98@gmail.com', 'Female', '1986-12-09', 'DE009', 'GRADUATE TRAINEE', '2019-09-18', '87-1,GALALIYADDA,MAHAWELA', NULL, '774394216', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(491, '447', 'D.M.N.Kumari', '867651993v', NULL, 'Female', '1986-09-21', 'CO011', 'Investigation officer', '2013-02-15', '174/14, Pussawatta, Polgolla', NULL, '0770 139294', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(742, '343', 'K.M.S.N.K.Kulathunga', '868063793V', 'shirominilushika@gmail.com', 'Female', '1986-11-01', '10', 'Graduate Trainee', '2021-02-01', '152/4/1C, Kovil Road,', 'Ukuwela', '0719176437', 6, '47', '', '', '', '2021-03-09 08:12:04'),
(775, '453', 'D.M.T.Dissanayake', '868601728V', 'thanujadissanayaka5@gmail.com', 'Female', '1986-12-25', 'AD001', 'Development Officer', '2021-01-01', 'Muthukeliyawa kotikapala', 'Mawathagama', '0718815878', 6, '47', '', '', '', '2021-04-09 10:37:44'),
(644, '405', 'U.G.I.B.Adikari', '870041292V', '', 'Male', '1987-01-04', 'TR004', 'Development Officer', '2019-09-16', '234/1,Pahala Haduwa,Naula', 'Matale', '0711960616', 6, '27', '', '', '', '2020-09-23 04:23:11'),
(334, '137', ' M.R.N.JAYARATHNA', '872422765V', 'rasikajayarathna5@gmail.com', 'Male', '1987-08-29', 'AD001', 'D.O', '2013-02-27', '116/2, Meegolla Road, Nalanda', NULL, '767960044', 6, '47', '', '', '', '2020-09-03 05:31:30'),
(296, '88', 'W.G.B.S.L.PREMARATHNA', '873023201V', 'buddhika871028@gmail.com', 'Male', '1987-10-28', 'DE009', 'DIVISIONAL CHILD PROTECTION OFFICER', '2014-09-30', '329-2,UKUWELAWATTA,NAGOLLA,UKUWELA', NULL, '717312557', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(78, '215', 'W.L.D.S.I. Nanayakkara', '873331632v', 'samannanayakkar@gamail.com', 'M', '0000-00-00', 'AG008', 'Driver', '0000-00-00', '17/1, Matale Watta,  Dunkola watta,Matale', NULL, '711349907', 13, '43', '', '', '', '2020-08-28 10:18:12'),
(544, '302', 'T.D RANKOTHGE', '875152467V', 'samurdhimatale@gmail.com', 'Female', '1987-01-15', 'SA007', 'DEVELOPMENT OFFRCER', '2013-03-15', '', NULL, '715745871', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(671, '190', 'M.A.G.N.Dilrukshi', '875522434V', 'nelumimaharachchi@yahoo.com', 'Female', '1987-02-21', 'PL003', 'Development Officer', '2013-04-16', 'No.141/1, Ikiriyagolla Rd, Palleweragama, Kaikawela, Matale', NULL, '771845119', 6, '177', 'yellow-flower-clipart.jpg', 'assets/profile_images/yellow-flower-clipart.jpg', 'image/jpeg', '2020-09-24 08:49:59'),
(689, '126', 'L.P.S. DEEPIKA KUMARI', '876023750V', 'sudarsideepika87@gmail.com', 'Female', '1987-04-11', 'GACO020', 'Development Officer', '2013-04-16', 'No 6/2,Galwadukumbura,Kaudupalalla', 'Matale', '0710797495', 12, '1', '', '', '', '2020-09-30 03:30:12'),
(482, '173', 'E.H.M.H.K.Ekanayake', '876552892V', 'hekanayake10@gmail.com', 'Female', '1986-06-03', 'AC002', 'Development Officer', '2013-03-25', '40/29/3,MC Rd,Matale.', NULL, '779599953', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(301, '407', 'A.M.C.P.ADIKARI', '876710544 V', 'chathurikaadikaricp@gmail.com', 'Female', '1987-06-19', 'LA006', 'GRADUATE TRAINEE', '2019-09-18', '228/6,MOTTUWELA,UDASGIRIYA,MATALE', NULL, '701915091', 6, '21', 'bee.png', 'assets/profile_images/bee.png', 'image/png', '2020-09-03 05:28:25'),
(69, '205', 'Rasangika Ranawakaarachchi', '876791714v', 'rasangika.arachchi@gamail.com', 'Female', '1987-06-27', 'AG008', 'Development Officer', '2013-03-01', '89/2 Ankumbura, kandy.', NULL, '719309016', 6, '43', '', '', '', '2020-08-28 10:18:12'),
(771, '447', 'K.G.R.K.Jayasinghe', '877021394V', '', 'Female', '1987-07-20', 'LA006', 'Development Officer', '0021-01-02', '139/2 Pallegama', 'Angumbura', '0717587702', 6, '47', '', '', '', '2021-04-09 10:22:02'),
(766, '451', 'W.G.D.M.Upasena', '877423239V', '', 'Female', '1987-08-29', 'AD001', 'Development Officer', '2021-01-01', '132 Deevila, Yatawatha', 'Matale', '0785155596', 6, '47', '', '', '', '2021-04-09 10:03:41'),
(765, '449', 'U.W.P.N.K.Seelarathne', '877672174V', '', 'Female', '1987-09-23', 'AD001', 'Development Officer', '2021-01-01', '170/1 Metihaka', 'Matale', '0717188698', 6, '47', '', '', '', '2021-04-09 09:59:41'),
(774, '448', 'M.G.S.K.Nimalkanda', '877863379V', 'buddikad6@gmail.com', 'Female', '1987-10-12', 'AD001', 'Development Officer', '2021-01-01', 'Kalamaduwawa Eeriyagola Ridigama', '.', '0702477371', 6, '47', '', '', '', '2021-04-09 10:33:25'),
(674, '374', 'E.M.M.R.U.K.Nugapitiya', '878032942V', 'unugapitiya@yahoo.com', 'Female', '1987-10-29', 'PL003', 'Development Officer', '2019-09-16', 'No.41, Bowatta, Ukuwela', NULL, '719759967', 6, '182', '', '', '', '2020-09-24 08:49:59'),
(688, '408', 'M.G.T.K. Rathnasiri', '878373073V', '', 'Female', '1987-12-02', 'DM016', 'Graduate Trainee', '2019-09-19', 'Matale', 'Matale', '0763997212', 6, '220', '', '', '', '2020-09-25 04:45:36'),
(769, '452', 'M.G.T.P.Thilakarathne', '878442776V', 'thishani.pavithra@gmail.com', 'Female', '1987-09-12', 'IA0015', 'Development Officer', '2021-01-01', '8 A Ikiriyagolla', 'Matale', '0771977749', 6, '47', '', '', '', '2021-04-09 10:16:28'),
(498, '743', 'D.M.G.R.Dissanayake', '8824300472v', 'gayan.ridma.@gmail.com', 'Male', '1988-08-30', 'CO011', 'Investigation officer', '2018-01-15', '202/1, Parakum mw, madalanawtta, kurunegala', NULL, '0714 792151', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(657, '51', 'W.M.P.B.Gunarathne', '882830810V', 'priyankara.gunarathne@gmail.com', 'Male', '1970-01-01', 'DCC30', 'MSO', '2011-07-01', '209/4/A Kotuwegadara Matale', 'Maatale', '0702228035', 12, '15', '', '', '', '2020-09-24 03:54:57'),
(545, '234', 'G.K.N.J JINARATHANA', '885071520V', 'nadeeshajayakalani@gmail.com', 'Female', '1988-01-07', 'SA007', 'PUBLIC MANAGEMENT ASSISTANT', '2017-01-16', '', NULL, '712558124', 6, '231', '', '', '', '2020-09-08 07:15:29'),
(634, '364', 'A.C.Dilhani', '885542859V', 'cdilhani544@gmail.com', 'Female', '1988-02-23', 'LA006', 'Graduate Trainee', '2019-08-01', 'No 22,Rahula mawatha,Matale', NULL, '702771924', 6, '21', '', '', '', '2020-09-08 08:12:50'),
(704, '228', 'N.M.M.U.Gunarathna', '886443676V', '', 'Female', '1988-05-23', 'DM016', 'Development Officer', '2018-08-21', 'Matale', 'Matale', '769993975', 6, '220', '', '', '', '2020-11-25 05:57:05'),
(284, '409', 'P.G.N.R.JAYARATHNE', '886491301V', 'nadeeka88rohini@gmail.com', 'Female', '1988-05-28', 'DE009', 'GRADUATE TRAINEE', '2019-09-16', '20 YAYA, SELAGAMA,MATALE', NULL, '721408356', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(492, '520', 'H.M.M.P.Somarathne', '886980515v', 'madhutoprabha@gmail.com', 'Female', '1988-07-16', 'CO011', 'Investigation officer', '2014-07-21', 'Madushika\', Pussellagama,melsiripura', NULL, '0765 423114', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(294, '82', 'K.A.W.A.K.KOHONA', '887823626V', 'kumarikohona@gmail.com', 'Female', '1988-08-10', 'DE009', 'DISTRICT PSYCHOSOCIAL OFFICER', '2013-05-08', '2 nd MAIL POST,MADAMULLA WATTA,KADUNDAWA ROAD,DAMBULLA', NULL, '710533240', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(737, '338', 'D.M.L.K.Dissanayake', '888072322V', 'dmlakmali88@gmail.com', 'Female', '1981-11-02', '10', 'Graduate trainee', '2021-02-01', '26, Kumbiyangoda,', 'Matale', '0718981906', 6, '21', '', '', '', '2021-03-09 07:36:38'),
(651, '358', 'W.P.S.Kumara', '890460208V', 'pskprashantha@gmail.com', 'Male', '1989-02-15', 'IA0015', 'Development Officer', '2019-08-01', '192, Nagolla, Ukuwela', 'Matale', '0766322869', 6, '05', 'f93bb167824ecbb5c527a89b89a82a8e2fe30191.jpg', 'assets/profile_images/f93bb167824ecbb5c527a89b89a82a8e2fe30191.jpg', 'image/jpeg', '2020-09-24 03:30:28'),
(635, '365', 'V.Sudharshini', '895751260V', 'sudharshysnt@gmail.com', 'Female', '1989-03-15', 'LA006', 'Graduate Trainee', '2019-08-02', 'No 469, 2nd lane, circular road, kaludhawela, Matale', NULL, '704513004', 6, '21', '', '', '', '2020-09-08 08:12:50'),
(528, '325', 'L.G.A.M.Wanasinghe ', '897580357V', 'anushamadavi3@gmail.com', 'Female', '1989-09-14', 'SM013', 'Graduate Trainee', '2019-08-02', 'Kadurugasyaya , Aluthgama , Mananwatta .', NULL, '712717634', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(281, '164', 'A.W.N.THANUJA DARSHANI KUMARI', '898492206V', 'thunujadarshani9@gmail.com', 'Female', '1989-12-14', 'DE009', 'PROGRAME OFFICER', '2016-06-22', '9,AGALAWATTA ROAD,MATALE', NULL, '712027449', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(759, '438', 'G.Thushara Srimathy Wijerathne', '898641198V', 'tganithage@gmail.com', 'Female', '1989-12-29', 'AD001', 'Office Employment Service', '2014-02-12', '386/1 Udaweragama, Kaikawela', 'Matale', '0716929467', 13, '47', '', '', '', '2021-04-09 07:18:57'),
(336, '362', 'K.U.USILVA ', '902030832v', 'udara20kuus@gmail.com', 'Male', '1990-07-21', 'AD001', 'Graduate Trainee', '2019-08-01', '147/76, Nawagammanaya,Katudeniya, Matale', NULL, '712364002', 6, '47', '48b9fed1ead6982ce5f37fd3019c5e5ac52e5f4e.jpg', 'assets/profile_images/48b9fed1ead6982ce5f37fd3019c5e5ac52e5f4e.jpg', 'image/jpeg', '2020-09-03 05:31:30'),
(668, '422', 'K.N.Rathnayake', '905102931V', 'kushani.ratnayake@gmail.com', 'Female', '1990-01-13', 'PL003', 'Assistant Director (Planning)', '2019-07-22', '26, Kaduwela,Ukuwela', NULL, '712714960', 3, '175', '', '', '', '2020-09-24 08:49:59'),
(641, '370', 'K.Saritha', '905381350V', 'saritha_0702@yahoo.com', 'Female', '1990-02-07', 'TR004', '', '2019-08-01', '107/1,Circular Road, Kaludawela, Matale', 'Matale', '0754054901', 6, '10', 'logo (2).jpg', 'assets/profile_images/logo (2).jpg', 'image/jpeg', '2020-09-23 04:08:43'),
(326, '369', 'D.R.P.H.BANDARA', '905713167v', 'Pavithra7harshani@gmail.com', 'Female', '1990-03-11', 'AD001', 'Graduate Trainee', '2019-08-01', 'No331,Rusiraugama, Udathenna,  Matale', NULL, '0716316867', 6, '47', '', '', '', '2020-09-03 05:31:12'),
(302, '366', 'K.G.S.S.GUNARATHNE', '906562065V ', 'sulogunarathne@gmail.com', 'Female', '1990-04-06', 'DE009', 'GRADUATE TRAINEE', '2019-01-08', '18,THALINGAMADA,ELKADUWA,MATALE', NULL, '710639078', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(772, '455', 'B.L.L.Lankathilaka', '906572141V', 'lucky.gsc@gmail.com', 'Female', '1990-06-05', 'IT012', 'Development Officer', '2021-01-01', '75 Menikwatte Kongahamulla Pallapathwala', 'Matale', '0718247194', 6, '47', '', '', '', '2021-04-09 10:26:28'),
(316, '89', 'V.G.N.K.FONSEKA', '907291359V', 'nnirosha.fonseka@gmail.com', 'Female', '1990-08-16', 'AD001', 'M.S.O', '2015-09-15', '99/10,Dharmapala Road, Matale', NULL, '715786465', 6, '47', '', '', '', '2020-09-03 05:30:52'),
(741, '342', 'K.C.D.Silva', '907293599V', 'kaushalyachathuranidesilva0816@gmail.com', 'Female', '1990-08-16', '10', 'Graduate trainee', '2021-02-01', '3/B, Iythaliyatha ,Dekkanuwa', 'Matale', '0763691811', 6, '47', '', '', '', '2021-03-09 08:06:28'),
(749, '350', 'P.A.G.C.N.Ranasinghe', '907480747V', '', 'Female', '1990-09-04', '10', 'Graduate Trainee', '2021-02-01', '68, Udupihilla, ', 'Matale', '0703342006', 6, '43', '', '', '', '2021-03-12 04:00:54'),
(324, '361', 'A.S.C.S.SENARATHNA', '907551431v', 'Chathurikasenarathna20180417@ gmail.com', 'Female', '1990-09-11', 'AD001', 'Graduate Trainee', '2019-08-01', 'NO  82/C Ulpathapitiya, Ukuwela', NULL, '714753554', 6, '47', '', '', '', '2020-09-03 05:31:12'),
(768, '454', 'S.T.M.Fernando', '907693139V', 'thilinimalshafernando@gmail.com', 'Female', '1990-09-25', 'AD001', 'Development Officer', '2021-01-01', 'Heenugala Dewahuwa', '.', '0769253245', 6, '47', '', '', '', '2021-04-09 10:11:54'),
(731, '332', 'D.G.R.N.Senanayake', '907934136V', 'nuwangisenanayake@gmail.com', 'Female', '1990-10-19', 'TR004', 'Graduate trainee', '2021-02-01', '53/A Thotagamuwa, Palapathwala ', 'Matale', '0741121019', 6, '27', '', '', '', '2021-03-08 07:53:42'),
(476, '39', 'P.G.K.S.Kalhari', '908101570V', 'pgkskalhari25@gmail.com', 'Female', '1990-11-05', 'AC002', 'Management Service Assistant', '2018-05-15', '120,nikaloya rd,rattota,matale', NULL, '711431657', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(327, '367', 'N.S.A.C. SURAWEERA', '908151410v', 'akilanisuraweera@gmail.com', 'Female', '1990-11-10', 'AD001', 'Graduate Trainee', '2019-08-01', 'No.07, Rusirugama, Udathenna, Matale', NULL, '0713332162', 6, '47', '', '', '', '2020-09-03 05:31:30'),
(479, '162', 'K.M.G.M.Madubhashini', '908282582V', 'madubashinimayomi@gmail.com', 'Female', '1990-11-23', 'AC002', 'Management Service Assistant', '2015-09-15', 'No.33,N.H.S.Kotuwegedara, Matale.', NULL, '771258807', 6, '19', '', '', '', '2020-09-03 05:52:36'),
(745, '346', 'H.M.R.Shyamali Herath', '908573617V', 'sherath02@gmail.com', 'Female', '1990-12-22', '10', 'Graduate Trainee', '2020-02-09', '163 kudukandana Maraka', 'Matale', '0710437444', 6, '19', '', '', '', '2021-03-09 09:04:04'),
(500, '854', 'A.L.M.Nirosh', '910711024v', 'niroshki@gmail.com', 'Male', '1991-03-11', 'CO011', 'Investigation officer', '2018-01-15', 'Manatkulam, chilawathurai, mannar', NULL, '0713 949706', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(705, '226', 'G.M. Kulathunga', '910773666V', 'madusanka121kulathunga@gmail.com', 'Male', '1990-03-17', 'DM016', 'Office Assistant', '2017-04-03', 'Matale', 'Matale', '760994888', 13, '220', '', '', '', '2020-11-25 06:01:18'),
(89, '41', 'U.G.P.C Abeywickrama', '910902857V', 'pubuduflash@gmail.com', 'Male', '1991-03-18', 'ENG010', 'Development Officer', '2020-01-01', 'No.52,Nagollagama Road, Matale', NULL, '777360599', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(730, '331', 'I.K.G.G.B.Kumarasinghe', '912470750V', 'kumarasinghe9193@gmail.com', 'Male', '1991-09-03', '10', 'Graduate Trainee', '2021-02-01', '117/5 Nikakotuwawatte, Aluwihara', 'Matale', '0713082751', 6, '47', '', '', '', '2021-03-08 07:45:02'),
(342, '314', 'S.PIYARATHNA ', '912973875v', '', 'Male', '1991-10-23', 'AD001', 'O.E', '2019-02-20', 'No.143/3 , mirissala, mirissala, kurunegala', NULL, '715240143', 13, '47', '', '', '', '2020-09-03 05:32:10'),
(337, '368', 'P.G.D.P.WIMALARATHNE', '913183398V', 'dilanwimale2@gmail.com', 'Male', '1991-11-13', 'AD001', 'Graduate Trainee', '2019-08-01', 'No 44 .sewaua uyana, mahawela’ matale', NULL, '716092470', 6, '47', '', '', '', '2020-09-03 05:32:10'),
(307, '76', 'B.H.A.U.RUPIKA  JAYATHILAKE', '915092748V', 'rupikaudayangani@gmail.com', 'Female', '1991-09-01', 'DE009', 'MANAGEMENT SERVISE OFFICER', '0000-00-00', 'NO 65,KATAWALA, MADAWALA-ULPOTHA', NULL, '0711028833', 6, '32', '', '', '', '2020-09-03 05:28:25'),
(732, '333', 'Thilini Lakmali Kumari Weerasinghe', '915242430V', 'ktthilini48@gmail.com', 'Female', '1991-01-24', '10', 'Graduate Trainee', '2021-02-01', '11/19,Vihara Road', 'Matale', '0773578831', 6, '231', '', '', '', '2021-03-08 08:31:27'),
(655, '373', 'A.M.H.M.Bandara', '916302177V', 'harshani_bandara@ymail.com', 'Female', '1991-05-09', 'IA0015', 'Development Officer', '2019-08-01', '152/B, Harshani Niwasa,Udupihilla,Matale', 'Matale', '0716457365', 6, '05', 'images.jpg', 'assets/profile_images/images.jpg', 'image/jpeg', '2020-09-24 03:33:23'),
(325, '356', 'M.H.M.T.M.DOMBAWELA', '917002029v', 'Dombawelatm @ gmail.com', 'Female', '1991-07-18', 'AD001', 'Graduate Trainee', '2019-08-01', 'Hurigolla,Dombawela,Mahawela', NULL, '711348356', 6, '47', '', '', '', '2020-09-03 05:31:12'),
(521, '172', 'B.H.M.A.Sadamalee', '917392595V', 'arundathisadamali@gmail.com', 'Female', '1991-08-26', 'SM013', 'Entreprenureship Development Training Officer', '2018-02-15', 'No.95, Nishshanka Mawatha , Dambulla .', NULL, '703294226', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(729, '330', 'N.G.M.Lakshani', '918132651V', 'madushaone@gmail.com', 'Female', '1991-11-08', '10', ' Graduate Trainee', '2021-02-01', '133/4, Sri sumangala mw, Aluwihara,', 'Matale', '0719014285', 6, '47', '', '', '', '2021-03-08 07:23:35'),
(85, '360', 'W.D.S.K Manathunga', '918601414V', 'sanjeewani.manathunga@gmail.com', 'Female', '1991-12-25', 'ENG010', 'GRADUATE TRAINEE', '2019-08-01', 'No.42/2, Kohobiliwela, Matale', NULL, '788382085', 6, '6', '', '', '', '2020-08-28 10:29:38'),
(77, '214', 'W.K.N.T. Weerasingha', '920020275v', 'thilinaweerasinha@gamail.com', 'Male', '0000-00-00', 'AG008', 'Office Employees Service', '0000-00-00', 'Daya Sewana,Nadugala,     Matara', NULL, '719453511', 13, '43', '', '', '', '2020-08-28 10:18:12'),
(502, '853', 'H.M.Sahib', '920380760v', NULL, 'Male', '1992-02-07', 'CO011', 'Investigation officer', '2018-01-15', 'Koolankulam, chilawathrai, mannar', NULL, '0715 950866', 6, '182', '', '', '', '2020-09-03 05:56:11'),
(684, '312', 'H.H.D.Pathmasiri', '920444032V', 'matale.dps@gmail.com', 'Male', '1992-02-13', 'PL003', 'Driver', '2019-02-20', 'Ovilana,Medakeembiya,Galle', NULL, '077-3543992', 13, '175', '', '', '', '2020-09-24 08:49:59'),
(645, '371', 'M.Sudarshani', '926730754V', 'msudarshani03@gmail.com', 'Female', '1992-06-21', 'TR004', 'Development officer', '2019-08-01', '37,Wariyapola watta, Matale', 'Matale', '0769837559', 6, '10', '7e567de393ecef57adbf71ec89334af0b894c18c.jpg', 'assets/profile_images/7e567de393ecef57adbf71ec89334af0b894c18c.jpg', 'image/jpeg', '2020-09-23 04:27:47'),
(527, '327', 'L.W.M.S.Wijerathne', '926930672V', 'madhushishanika5@gmail.com', 'Female', '1992-07-11', 'SM013', 'Graduate Trainee', '2019-08-01', 'Kadiharaya , Bamunakotuwa , Kurunagala .', NULL, '717944603', 6, '94', '', '', '', '2020-09-08 06:45:22'),
(776, '456', 'P.G.S.K.Thennakoon', '928300196V', 'sriyani82a@gmail.com', 'Female', '1992-11-25', 'AD001', 'Development Officer', '2020-01-01', '167/1, Ihala Delpawana', 'Gammaduwa', '0716094099', 6, '47', '', '', '', '2021-04-19 06:26:59'),
(682, '195', 'S.G.S. Weerasuriya', '931091190V', 'suwasnka1993@gmail.com', 'Male', '1993-04-18', 'PL003', 'Development Officer', '2019-02-15', '59/1/B,Kudamahayaya, Kandalama Road, Dambulla ', NULL, '716202476', 6, '182', '', '', '', '2020-09-24 08:49:59'),
(740, '341', 'U.G.E.M.Wijethilaka', '935632790V', 'emwwijetilaka@gmail.com', 'Female', '1993-03-03', '10', 'Graduate Trainee', '2021-02-01', '46/3, Ovillikanda', 'Matale', '0714096250', 6, '47', '', '', '', '2021-03-09 07:59:33'),
(580, '236', 'A.A.D.SARALA NILUKSHIKA', '937911025V', 'sharalanilukshika@gmail.com', 'Female', '1993-10-17', 'SA007', 'OFFICE ASSISTANT', '2018-04-16', '', NULL, '712805324', 13, '231', '', '', '', '2020-09-08 07:29:05'),
(525, '427', 'K.D.H.Wickramarathne', '938021007V', 'dulakshihacinthara59@gmail.com', 'Female', '1993-10-28', 'SM013', 'Office Work Assistant', '2018-10-03', '58/6, Dodandeniya , Matale .', NULL, '719263875', 13, '94', '', '', '', '2020-09-08 06:45:22'),
(738, '339', 'Y.G.S.M.Udawatte', '940152670V', 'sachiramahesh94@gmail.com', 'Male', '1994-01-15', '10', 'Graduate Trainee', '2021-02-01', '79 Dombawela Mahawela', 'Matale', '0711019128', 6, '47', '', '', '', '2021-03-09 07:49:00'),
(329, '328', 'Y.G.A.D.SAMARANAKE ', '948202875v', '', 'Female', '1994-11-15', 'AD001', 'K.k.S', '2019-08-28', 'Welikanda, danumawa, alawathuwala', NULL, '0706005572', 13, '47', '', '', '', '2020-09-03 05:31:30'),
(488, '98', 'P.B.W.N.Mahesha', '951233099V', 'wasikamahesha@gmail.com', 'Male', '1995-05-02', 'AC002', 'OEA', '2014-11-18', 'Ruwanvilla,Udahoupe,Kahawatta.', NULL, '711702535', 13, '19', 'a6b5215c1b54d21185db2520008010870de7ec72.jpg', 'assets/profile_images/a6b5215c1b54d21185db2520008010870de7ec72.jpg', 'image/jpeg', '2020-09-03 05:52:36'),
(659, '150', 'L.V.D Hashinika', '955921992V', 'dilumihashinika784@gmail.com', 'Female', '1970-01-01', 'PL003', 'KKS', '2017-03-24', '24/30,Galge watta,Magalla,Galle', 'Galle', '0718980168', 13, '175', 'hand.png', 'assets/profile_images/hand.png', 'image/png', '2020-09-24 03:58:36'),
(739, '340', 'A.S.Divya', '958081138V', 'divyadhoom@gmail.com', 'Female', '1995-11-03', '10', 'Graduate Trainee', '2021-02-01', '144/30,3 Thawalankoya', 'Ukuwela', '0773764302', 6, '47', '', '', '', '2021-03-09 07:54:03'),
(746, '347', 'P.Dilakshi', '965080244V', 'dilakshisahana@gmail.com', 'Female', '1996-01-08', 'DE009', 'Graduate Trainee', '2021-02-01', '199/8, Kandy Road,', 'Matale', '0752794947', 6, '32', '', '', '', '2021-03-09 09:10:10'),
(1, 'Admin', 'WMSDS ADMIN', 'admin@wmsds', 'adminwmsds@gmail.com', '', '1970-01-01', '', '', '0000-00-00', 'Matale District Secretariat', '', '066222222', 1000, '', 'imgbackground.png', 'assets/profile_images/imgbackground.png', 'image/png', '2020-05-29 09:27:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adtbl`
--
ALTER TABLE `adtbl`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `inv_catagory`
--
ALTER TABLE `inv_catagory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `inv_item`
--
ALTER TABLE `inv_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `serial_No` (`serial_No`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`NIC`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adtbl`
--
ALTER TABLE `adtbl`
  MODIFY `adid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inv_catagory`
--
ALTER TABLE `inv_catagory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inv_item`
--
ALTER TABLE `inv_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=779;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
