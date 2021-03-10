-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2018 at 10:51 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ckd`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `schedule_date` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` int(11) NOT NULL DEFAULT '-1',
  `seen` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apid`, `pid`, `schedule_date`, `timestamp`, `category`, `seen`) VALUES
(7, 1, '2019-12-12 11:30:00', '2018-03-14 09:07:57', 1, 0),
(8, 5, '2018-11-11 11:00:00', '2018-03-14 09:08:17', 1, 0),
(9, 1, '2019-11-11 11:30:00', '2018-03-14 09:23:07', 0, 0),
(10, 1, '2019-11-11 11:30:00', '2018-03-14 09:24:55', 0, 0),
(11, 5, '2019-12-12 11:00:00', '2018-03-14 09:25:05', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assistant_details`
--

CREATE TABLE `assistant_details` (
  `aid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `yoe` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assistant_details`
--

INSERT INTO `assistant_details` (`aid`, `id`, `fname`, `lname`, `dob`, `qualification`, `yoe`) VALUES
(1001, 10002, 'Tejas', 'Naik', '1996-09-05', 'MS', 5),
(1002, 10007, 'Mansi', 'Dabhole', '1996-09-05', 'BHMS', 3),
(1003, 10008, 'Bhagyashri', 'Jeve', '1996-09-05', 'BAMS', 3),
(1004, 10009, 'Namrata', 'Sawant', '1996-09-05', 'BAMS', 6),
(1005, 10010, 'Rohit', 'Kothavde', '1996-09-05', 'BAMS', 1),
(1006, 10011, 'Bhavik', 'Bakraniya', '1996-09-05', 'BAMS', 4),
(1007, 10012, 'Paresh', 'Zodpe', '1996-09-05', 'BAMS', 3),
(1008, 10013, 'Unmesh', 'Dahake', '1996-08-08', 'MBBS', 5),
(1011, 10014, 'Ganesh', 'Chile', '1996-08-08', 'BA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `did` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `yoe` int(11) NOT NULL DEFAULT '0',
  `clinic_details` varchar(255) NOT NULL DEFAULT 'Not Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`did`, `id`, `fname`, `lname`, `dob`, `qualification`, `yoe`, `clinic_details`) VALUES
(101, 10001, 'Mandar', 'Patkar', '1996-10-08', 'BE', 10, 'Not Available'),
(102, 10004, 'Raja', 'Parmar', '1996-10-08', 'MD', 12, 'Not Available'),
(103, 10005, 'Shashikant', 'Dhuppe', '1996-10-08', 'BAMS', 15, 'Not Available'),
(104, 10006, 'Sayali', 'Bhoir', '1996-10-08', 'BHMS', 13, 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `hierarchy_ass_pat`
--

CREATE TABLE `hierarchy_ass_pat` (
  `hapid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hierarchy_ass_pat`
--

INSERT INTO `hierarchy_ass_pat` (`hapid`, `aid`, `pid`) VALUES
(3, 1001, 1),
(4, 1001, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hierarchy_doc_ass`
--

CREATE TABLE `hierarchy_doc_ass` (
  `hdaid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hierarchy_doc_pat`
--

CREATE TABLE `hierarchy_doc_pat` (
  `hapid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hierarchy_doc_pat`
--

INSERT INTO `hierarchy_doc_pat` (`hapid`, `did`, `pid`) VALUES
(2, 101, 1),
(3, 101, 5);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `register` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `email_id`, `password`, `category`, `register`) VALUES
(10001, 'mandarpatkar@live.com', 'dd29b8cb089a56606fca480e137c27c4', 1, 1),
(10002, 'tejasnaik@gmail.com', '6041d0363da08612bcb0f536e00dba50', 2, 1),
(10003, 'shubhamphape@gmail.com', '3b6beb51e76816e632a40d440eab0097', 3, 0),
(10004, 'rajaparmar@gmail.com', '526e34d04735124f05a090181f3e6e8a', 1, 1),
(10005, 'shashikantdhuppe@gmail.com', '226ca17a8bde668b2264ffb6ba16a3d3', 1, 1),
(10006, 'sayalibhoir@gmail.com', 'a78dd07565d6f5c58331310c24b3c785', 1, 1),
(10007, 'mansidabhole@gmail.com', '8e183f28f7ac8aaebf5650f728f79a37', 2, 1),
(10008, 'bhagyashrijeve@gmail.com', '2d1a0c8455ba6c76bb65f260e9981b58', 2, 1),
(10009, 'namratasawant@gmail.com', '5bda88ef3739b6d721de7cad617640a6', 2, 1),
(10010, 'rohitkothavade@gmail.com', '2d235ace000a3ad85f590e321c89bb99', 2, 1),
(10011, 'bhavikbakraniya@gmail.com', '53acf5f531943514246a7ed92f496a7d', 2, 1),
(10012, 'pareshzodape@gmail.com', '6c452c76957f2c36c9d4f8394e2a63a3', 2, 1),
(10013, 'unmeshdahake@gmail.com', 'a0352299406b0798dadb88a88becb917', 2, 1),
(10014, 'ganeshchile@gmail.com', 'fa1d87bc7f85769ea9dee2e4957321ae', 2, 1),
(10015, 'rushabhmishra@gmail.com', '1f73c22a6fdfc57868218eafb85a26f4', 3, 1),
(10016, 'eshaacharya@gmail.com', 'bf5140ea297674d8fbe5fdec62eb759d', 3, 1),
(10017, 'aishwaryakamble@gmail.com', '57ac36adc5258c1b8048a7d7bd966a73', 3, 1),
(10018, 'rohitthadaka@gmail.com', '2d235ace000a3ad85f590e321c89bb99', 3, 1),
(10019, 'priyadarshanigangurde@gmail.com', 'f7c790f80324a07c7c1f84818581c68c', 3, 1),
(10020, 'sandeshjagtap@gmail.com', 'dee3ae5926b1768ea18228ee54281df3', 3, 0),
(10021, 'ankitabangar@gmail.com', 'de5b5bf65ba66517f9b70b1443d2102d', 3, 0),
(10022, 'rajeshkakade@gmail.com', 'e360bc13bcba071f4746adbb334cd78e', 3, 0),
(10023, 'vikaswaghmare@gmail.com', 'bebe68374a49cb41b7c9219e97250044', 3, 0),
(10024, 'vedantmahabaleshwarkar@gmail.com', '591b39a9c1f05b4e0338485b1b57318d', 3, 0),
(10025, 'sujayjagtap@gmail.com', 'a7753a6ee25ecd76462feaf2cd200a06', 3, 0),
(10026, 'meghnapai@gmail.com', 'ef5d369314eb5b845bd6f520a2eaee68', 3, 0),
(10027, 'shubhammotiwale@gmail.com', '3b6beb51e76816e632a40d440eab0097', 3, 0),
(10028, 'ashwinipatil@gmail.com', 'ff0eef605a66301097c87d2724025384', 3, 0),
(10029, 'gauravnale@gmail.com', '29be54a52396750258d886abc5417fda', 3, 0),
(10030, 'tarunsharma@gmail.com', '4ec6b242322a0139def69c6380c7aa27', 3, 0),
(10031, 'chetanasalunke@gmail.com', '302aaa0be1c5258b32ca9bb5777c1c05', 3, 0),
(10032, 'poorvirai@gmail.com', 'cf9e4764c4850db8779ddef75461953e', 3, 0),
(10033, 'akshaydangare@gmail.com', '2de1b2d6a6738df78c5f9733853bd170', 3, 0),
(10034, 'rajatpawar@gmail.com', 'd2ff3b88d34705e01d150c21fa7bde07', 3, 0),
(10035, 'himanshumodak@gmail.com', '4122ea4f5490094a33d7cdba65136cf8', 3, 0),
(10036, 'sharayusathe', '1f38b507e0775e11c144361cdce4c804', 3, 0),
(10037, 'rushitalonkar', '6309953349f28f9bf340b1d430b8dd25', 3, 0),
(10038, 'pritishjaiswal@gmail.com', 'f8ec2d53e9bb7d3c597af77f8434affb', 3, 0),
(10039, 'suryatejagudiguntla@gmail.com', '575b39c4b864b078a6b3ab9e880ee57f', 3, 0),
(10040, 'tasneemporbanderwala@gmail.com', '9c64f6ea4c13ccc4835e62a64b7e6b39', 3, 0),
(10041, 'sanitrajula@gmail.com', 'a869146898ee63c6c5afff8762b7da5c', 3, 0),
(10042, 'abhisheksingh@gmail.com', 'f589a6959f3e04037eb2b3eb0ff726ac', 3, 0),
(10043, 'swapnilpatle@gmail.com', 'b39a5005f03f16e882a911cd34f86043', 3, 0),
(10044, 'jaythakkar@gmail.com', 'baba327d241746ee0829e7e88117d4d5', 3, 0),
(10045, 'saurabhningawale@gmail.com', '133057facf49cbe6520b15a4d96ee395', 3, 0),
(10046, 'vinitpednekar@gmail.com', '13fccfe77f5f95974d3788e9f5a9c5ac', 3, 0),
(10047, 'akshaydhamankar@gmail.com', '2de1b2d6a6738df78c5f9733853bd170', 3, 0),
(10048, 'kunalraut@gmail.com', 'b33a46f5ee81f6f0790f3ea9f02468e1', 3, 0),
(10049, 'prashantpandhara@gmail.com', 'af948f0b6334c5d6e822c9bc8cf24034', 3, 0),
(10050, 'priyankakhare@gmail.com', '1fd96777aedeadb325c66f3780054765', 3, 0),
(10051, 'pratikghorpade@gmail.com', '0cb2b62754dfd12b6ed0161d4b447df7', 3, 0),
(10052, 'saurabhkasbe@gmail.com', '133057facf49cbe6520b15a4d96ee395', 3, 0),
(10053, 'prashansachavan@gail.com', '68aca00cf911c86953174e61abc282cf', 3, 0),
(10054, 'sagarborsa@gmail.com', '41ed44e3038dbeee7d2ffaa7f51d8a4b', 3, 0),
(10055, 'arvindagirhe@gmail.com', '05c5e0a3f72742eeddab71d60a6e1f84', 3, 0),
(10056, 'ankitloharaj@gmail.com', '447d2c8dc25efbc493788a322f1a00e7', 3, 0),
(10057, 'faizmapkar@gmail.com', '9d4d4ab0dfdb72a54b895d78b90b09c7', 3, 0),
(10058, 'leenabhadange@gmail.com', '660f0fec04b8d908b39224da0eee6120', 3, 0),
(10059, 'ajaykokare@gmail.com', '29e457082db729fa1059d4294ede3909', 3, 0),
(10060, 'varshataral@gmail.com', 'ff2f87e3b76f13788e41d6feae7c5dbb', 3, 0),
(10061, 'deepakkadam@gmail.com', '498b5924adc469aa7b660f457e0fc7e5', 3, 0),
(10062, 'shivanisalgar@gmail.com', 'ea7fd144f2edb73362f531981ed1d6c8', 3, 0),
(10063, 'sachinyadav@gmail.com', '15285722f9def45c091725aee9c387cb', 3, 0),
(10064, 'jidnyasakamble@gmail.com', 'db50dfdddfe0cafeab9d3390a8951204', 3, 0),
(10065, 'rohitbingi@gmail.com', '2d235ace000a3ad85f590e321c89bb99', 3, 0),
(10066, 'akshaydesale@gmail.com', '2de1b2d6a6738df78c5f9733853bd170', 3, 0),
(10067, 'ishantpote@gmail.com', '438124347b4cb1c16f1d3282d746f5a8', 3, 0),
(10068, 'saranshkaul@gmail.com', '4d926637eab2a83194526568b27ab8bf', 3, 0),
(10069, 'krushikeshpathare@gmail.com', '270b087a892c815c47feb37a5490d8d0', 3, 0),
(10070, 'shubhamughade@gmail.com', '3b6beb51e76816e632a40d440eab0097', 3, 0),
(10071, 'prathameshchavan@gmail.com', 'fe7e087d2f99208e8a23dfdd08d2daf4', 3, 0),
(10072, 'nikhilwaghmare@gmail.com', '350d89c1cd6592bbbd1ed2e8a4f3ddba', 3, 0),
(10073, 'vikrantkedare@gmail.com', '9485f1760d746bdf4eb04f38607948fc', 3, 0),
(10074, 'jyotijadhav@gmail.com', '1411a3e2bd0e7c77fd51adc1e17a834e', 3, 0),
(10075, 'pruthilsuryawanshi@gmail.com', 'a74e35efc301a708ee526ad72c6c4d60', 1, 0),
(10076, 'tejasnaik@live.com', '6041d0363da08612bcb0f536e00dba50', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `pid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `height` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `gender` int(11) NOT NULL,
  `race` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not Available',
  `initial_problem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`pid`, `id`, `fname`, `lname`, `dob`, `height`, `weight`, `gender`, `race`, `address`, `status`, `initial_problem`) VALUES
(1, 10015, 'Rushabh', 'Mishra', '1996-10-06', 170, 78, 1, 'black', 'Mumbai', 'Not Available', 'Stomache'),
(2, 10016, 'Esha', 'Acharya', '1989-03-18', 165, 58, 0, 'black', 'Delhi', 'Not Available', 'Abdomenache'),
(3, 10017, 'Aishwarya', 'Kamble', '1993-11-17', 155, 52, 0, 'black', 'Mumbai', 'Not Available', 'Stomache'),
(4, 10018, 'Rohit', 'Thadaka', '1967-07-20', 167, 75, 1, 'black', 'Pune', 'Not Available', 'Abdomenache'),
(5, 10019, 'Priyadarshani', 'Gangurde', '1990-02-21', 160, 45, 0, 'black', 'Mumbai', 'Not Available', 'Stomache');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) DEFAULT NULL,
  `bp` int(11) DEFAULT NULL,
  `sg` float(4,3) DEFAULT NULL,
  `al` int(11) DEFAULT NULL,
  `su` int(11) DEFAULT NULL,
  `rbc` float(2,1) DEFAULT NULL,
  `pc` int(11) DEFAULT NULL,
  `pcc` int(11) DEFAULT NULL,
  `ba` int(11) DEFAULT NULL,
  `bgr` int(11) DEFAULT NULL,
  `bu` int(11) DEFAULT NULL,
  `sc` float(3,1) DEFAULT NULL,
  `sod` float(4,1) DEFAULT NULL,
  `pot` float(2,1) DEFAULT NULL,
  `hemo` float(3,1) DEFAULT NULL,
  `pcv` float(3,1) DEFAULT NULL,
  `wbcc` int(11) DEFAULT NULL,
  `rbcc` float(3,1) DEFAULT NULL,
  `htn` float(2,1) DEFAULT NULL,
  `dm` float(2,1) DEFAULT NULL,
  `cad` float(2,1) DEFAULT NULL,
  `appet` float(2,1) DEFAULT NULL,
  `pe` float(2,1) DEFAULT NULL,
  `ane` float(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rid`, `pid`, `timestamp`, `age`, `bp`, `sg`, `al`, `su`, `rbc`, `pc`, `pcc`, `ba`, `bgr`, `bu`, `sc`, `sod`, `pot`, `hemo`, `pcv`, `wbcc`, `rbcc`, `htn`, `dm`, `cad`, `appet`, `pe`, `ane`) VALUES
(1, 1, '2018-03-07 10:12:21', 21, 70, 1.010, 0, 0, 0.8, 1, 0, 0, 148, 57, 3.0, 137.5, 4.6, 12.5, 38.8, 8406, 4.7, 0.0, 0.0, 0.0, 0.0, 0.0, 1.0),
(2, 2, '2018-03-07 10:17:44', 28, 70, 1.020, 0, 0, 1.0, 1, 0, 0, 131, 29, 0.6, 145.0, 4.9, 12.5, 45.0, 8600, 6.5, 0.0, 0.0, 0.0, 1.0, 0.0, 0.0),
(3, 3, '2018-03-07 10:25:11', 24, 76, 1.015, 2, 4, 1.0, 0, 0, 0, 410, 31, 1.1, 137.5, 4.6, 12.4, 44.0, 6900, 5.0, 0.0, 1.0, 0.0, 1.0, 1.0, 0.0),
(4, 4, '2018-03-07 10:40:20', 50, 76, 1.020, 0, 0, 1.0, 1, 0, 0, 92, 19, 1.2, 150.0, 4.8, 14.9, 48.0, 4700, 5.4, 0.0, 0.0, 0.0, 1.0, 0.0, 0.0),
(5, 5, '2018-03-07 10:51:01', 28, 70, 1.020, 0, 0, 1.0, 1, 0, 0, 131, 29, 0.6, 145.0, 4.9, 12.5, 45.0, 8600, 6.5, 0.0, 0.0, 0.0, 1.0, 0.0, 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `ckd` varchar(15) NOT NULL DEFAULT '-1',
  `stage` int(11) NOT NULL DEFAULT '0',
  `gfr` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`sid`, `pid`, `ckd`, `stage`, `gfr`) VALUES
(6, 5, 'ckd', 2, '71.223397801626');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `assistant_details`
--
ALTER TABLE `assistant_details`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`did`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `hierarchy_ass_pat`
--
ALTER TABLE `hierarchy_ass_pat`
  ADD PRIMARY KEY (`hapid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `hierarchy_doc_ass`
--
ALTER TABLE `hierarchy_doc_ass`
  ADD PRIMARY KEY (`hdaid`),
  ADD KEY `did` (`did`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `hierarchy_doc_pat`
--
ALTER TABLE `hierarchy_doc_pat`
  ADD PRIMARY KEY (`hapid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assistant_details`
--
ALTER TABLE `assistant_details`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `hierarchy_ass_pat`
--
ALTER TABLE `hierarchy_ass_pat`
  MODIFY `hapid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hierarchy_doc_ass`
--
ALTER TABLE `hierarchy_doc_ass`
  MODIFY `hdaid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hierarchy_doc_pat`
--
ALTER TABLE `hierarchy_doc_pat`
  MODIFY `hapid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10077;

--
-- AUTO_INCREMENT for table `patient_details`
--
ALTER TABLE `patient_details`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assistant_details`
--
ALTER TABLE `assistant_details`
  ADD CONSTRAINT `assistant_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login_details` (`id`);

--
-- Constraints for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD CONSTRAINT `doctor_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login_details` (`id`);

--
-- Constraints for table `hierarchy_ass_pat`
--
ALTER TABLE `hierarchy_ass_pat`
  ADD CONSTRAINT `hierarchy_ass_pat_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `assistant_details` (`aid`),
  ADD CONSTRAINT `hierarchy_ass_pat_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`),
  ADD CONSTRAINT `hierarchy_ass_pat_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hierarchy_ass_pat_ibfk_4` FOREIGN KEY (`aid`) REFERENCES `assistant_details` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hierarchy_doc_ass`
--
ALTER TABLE `hierarchy_doc_ass`
  ADD CONSTRAINT `hierarchy_doc_ass_ibfk_1` FOREIGN KEY (`did`) REFERENCES `doctor_details` (`did`),
  ADD CONSTRAINT `hierarchy_doc_ass_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `assistant_details` (`aid`),
  ADD CONSTRAINT `hierarchy_doc_ass_ibfk_3` FOREIGN KEY (`did`) REFERENCES `doctor_details` (`did`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hierarchy_doc_ass_ibfk_4` FOREIGN KEY (`aid`) REFERENCES `assistant_details` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hierarchy_doc_pat`
--
ALTER TABLE `hierarchy_doc_pat`
  ADD CONSTRAINT `hierarchy_doc_pat_ibfk_1` FOREIGN KEY (`did`) REFERENCES `doctor_details` (`did`),
  ADD CONSTRAINT `hierarchy_doc_pat_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`),
  ADD CONSTRAINT `hierarchy_doc_pat_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hierarchy_doc_pat_ibfk_4` FOREIGN KEY (`did`) REFERENCES `doctor_details` (`did`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD CONSTRAINT `patient_details_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login_details` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`),
  ADD CONSTRAINT `stage_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `patient_details` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
