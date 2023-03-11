-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 02:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onefarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animalID` int(11) NOT NULL,
  `animalName` varchar(100) NOT NULL,
  `animalDOB` date NOT NULL,
  `animalQuantity` int(255) NOT NULL,
  `animalCost` decimal(5,2) NOT NULL,
  `animalPrice` decimal(5,2) NOT NULL,
  `animalAvail` varchar(100) NOT NULL,
  `animalimg` varchar(222) NOT NULL,
  `breedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animalID`, `animalName`, `animalDOB`, `animalQuantity`, `animalCost`, `animalPrice`, `animalAvail`, `animalimg`, `breedID`) VALUES
(1, 'Aberdeen Angus', '2018-06-05', 118, '10.00', '15.00', '0', '62aaad277551f.jpg', 1),
(2, 'White Plymouth Rock', '2020-06-09', 163, '12.00', '16.00', '0', '62986957522c2.jpg', 2),
(3, 'Adamawa', '2019-11-20', 249, '7.00', '10.00', '0', '62986a2bcd729.jpg', 1),
(4, 'Abondance', '2020-02-04', 37, '17.00', '20.00', '0', '62986ab87c5a8.jpg', 1),
(5, 'Agerolese', '2020-01-03', 388, '1.10', '2.00', '0', '62986afa6d6e9.jpg', 1),
(6, 'Ankole', '2022-02-09', 387, '9.70', '13.00', '0', '62a99ff714691.jpg', 1),
(39, 'Blue Catfish', '2022-02-17', 300, '12.00', '14.00', '0', '62a9a0023cc30.jpg', 18),
(51, 'French-Alpine', '2021-06-15', 158, '44.00', '89.00', '0', '62a9a09bb8a40.jpg', 4),
(52, 'LaMancha', '2021-05-04', 200, '33.00', '49.00', '0', '62a9a199cb3fb.jpg', 4),
(53, 'Saanen', '2021-01-07', 169, '50.00', '78.00', '0', '62a9a21bb71c1.jpg', 4),
(54, ' Brahma', '2022-03-29', 348, '16.00', '22.00', '1', '62a9a28cead3b.jpg', 2),
(55, 'Ayam Cemani', '2021-06-15', 98, '25.00', '42.00', '0', '62a9a30cb7c2e.jpeg', 2),
(56, 'Merino', '2020-02-15', 222, '33.00', '80.00', '0', '62a9a5edda00c.jpg', 3),
(57, 'Awassi', '2020-12-28', 302, '36.00', '72.00', '0', '62a9a69972871.jpg', 3),
(58, 'Netherland Dwarf rabbit', '2022-01-11', 133, '18.00', '22.00', '0', '62a9a72c9fb3e.jpg', 5),
(59, 'Lionhead rabbit', '2022-04-05', 226, '11.00', '22.00', '0', '62a9a99e584c5.jpg', 5),
(60, 'dsadas', '2021-06-09', 332, '32.00', '44.00', '0', '62aaad548b5fb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `breedID` int(11) NOT NULL,
  `breedName` varchar(200) NOT NULL,
  `breedType` varchar(200) NOT NULL,
  `breedAvail` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`breedID`, `breedName`, `breedType`, `breedAvail`) VALUES
(1, 'COW', 'MAMMALS', '0'),
(2, 'CHICKEN', 'BIRDS', '0'),
(3, 'SHEEP', 'MAMMALS', '0'),
(4, 'GOAT', 'MAMMALS', '0'),
(5, 'RABBIT', 'MAMMALS', '0'),
(18, 'CATFISH', 'FISH', '0'),
(24, 'PLOP', 'FISH', '0');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardID` int(11) NOT NULL,
  `NameOnCard` varchar(200) NOT NULL,
  `CardBank` varchar(100) NOT NULL,
  `ExpiryDate` varchar(20) NOT NULL,
  `CVV` varchar(200) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cardID`, `NameOnCard`, `CardBank`, `ExpiryDate`, `CVV`, `CustomerID`) VALUES
(1, 'Nazirul Haziq Bin Idrus', '4lQqe848LNpwxqKkEA==', '04/29', '045', 1),
(2, 'Luqman bin Naufal', '4lQqe848LNpwxqKkEA==', '04/29', '312', 2),
(3, 'haji', '4lQqe848LNpwxqKkEA==', '05/26', '031', 2),
(4, 'dsadasd', '4lQqe848LNpwxqKkEA==', '02/24', '022', 2),
(5, 'dasdasdas', '4lQqe848LNpwxqKkEA==', '03/22', '031', 2),
(6, 'test3', '4lQqe848LNpwxqKkEA==', '01/28', '031', 2),
(7, 'test4', '4FUoec47K9Fzy6GkErdDWO03ryc=', '03/25', '031', 2),
(8, 'Limau', '4VQres86LNZyyqKnE7ZMV+w2', '04/27', '113', 7);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkoutID` int(11) NOT NULL,
  `animalName` varchar(150) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `animalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkoutID`, `animalName`, `quantity`, `price`, `invoiceID`, `animalID`) VALUES
(118, 'Agerolese', 1, '2.00', 146, 5),
(119, 'Ankole', 1, '13.00', 146, 6),
(120, 'Agerolese', 1, '2.00', 147, 5),
(121, 'Ankole', 1, '13.00', 147, 6),
(122, 'Aberdeen Angus', 1, '15.00', 148, 1),
(123, 'Abergele', 1, '16.00', 148, 2),
(124, 'Agerolese', 7, '14.00', 149, 5),
(125, 'Aberdeen Angus', 10, '150.00', 150, 1),
(126, 'Aberdeen Angus', 10, '150.00', 151, 1),
(127, 'Agerolese', 7, '14.00', 153, 5),
(128, 'Ankole', 400, '5200.00', 154, 6),
(129, 'Aberdeen Angus', 10, '150.00', 156, 1),
(130, 'Aberdeen Angus', 10, '150.00', 157, 1),
(131, 'Abergele', 10, '160.00', 157, 2),
(132, 'Agerolese', 10, '20.00', 159, 5),
(133, 'Ankole', 10, '130.00', 159, 6),
(134, 'Abergele', 12, '192.00', 160, 2),
(135, 'Aberdeen Angus', 10, '150.00', 160, 1),
(136, 'Aberdeen Angus', 1, '15.00', 161, 1),
(137, 'Ankole', 1, '13.00', 161, 6),
(138, 'Agerolese', 1, '2.00', 162, 5),
(139, 'Adamawa', 1, '20.00', 163, 4),
(140, 'Agerolese', 1, '2.00', 164, 5),
(141, 'Ankole', 2, '26.00', 164, 6),
(142, 'Abergele', 1, '16.00', 166, 2),
(143, 'Abondance', 1, '10.00', 166, 3),
(144, 'White Plymouth Rock', 2, '32.00', 167, 2),
(145, 'Adamawa', 1, '10.00', 167, 3),
(146, 'White Plymouth Rock', 1, '16.00', 168, 2),
(147, 'White Plymouth Rock', 1, '16.00', 175, 2),
(148, 'Adamawa', 1, '10.00', 177, 3),
(149, 'Aberdeen Angus', 1, '15.00', 179, 1),
(150, 'Abondance', 1, '20.00', 179, 4),
(151, 'Aberdeen Angus', 1, '15.00', 181, 1),
(152, 'Aberdeen Angus', 1, '15.00', 182, 1),
(153, 'Adamawa', 1, '10.00', 182, 3),
(154, 'Aberdeen Angus', 1, '15.00', 183, 1),
(155, 'Aberdeen Angus', 86, '1290.00', 184, 1),
(156, 'Aberdeen Angus', 1, '15.00', 185, 1),
(157, 'Adamawa', 601, '6010.00', 186, 3),
(158, 'Aberdeen Angus', 99, '1485.00', 191, 1),
(159, 'Aberdeen Angus', 1, '15.00', 193, 1),
(160, 'Aberdeen Angus', 1, '15.00', 195, 1),
(161, 'Aberdeen Angus', 1, '15.00', 196, 1),
(162, 'Adamawa', 1, '10.00', 197, 3),
(163, 'White Plymouth Rock', 1, '16.00', 199, 2),
(164, 'White Plymouth Rock', 1, '16.00', 201, 2),
(165, 'Abondance', 120, '2400.00', 204, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(200) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerPassword` varchar(200) NOT NULL,
  `customerPhoneNum` varchar(15) NOT NULL,
  `customerSecurity` varchar(200) NOT NULL,
  `customerAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `customerEmail`, `customerPassword`, `customerPhoneNum`, `customerSecurity`, `customerAddress`) VALUES
(1, 'Saiful', 'test1234@mail.com', '61bd60c60d9fb60cc8fc7767669d40a1', '+60194400261', 'bffa783a022fe2d98692014dda6d7a4c', '649E LRG ASTANA 15/1 BANDAR SERI ASTANA'),
(2, 'Hanaa ', 'test123@gmail.com', '94f3fa4138bb5cbcbbfac8c10187cf45', '0135897898', 'bd4c70d40f7fa5421cfeefbd66b7fff6', '458F, Lorong Emas 1, Taman Emas        '),
(3, 'Zack', 'test111@mail.com', 'e99a18c428cb38d5f260853678922e03', '012456898', '654e4dc5b90b7478671fe6448cab3f32', '458F, Lorong Emas 1, Taman Emas'),
(4, 'Luqman', 'blase100@canton.edu', 'e99a18c428cb38d5f260853678922e03', '0545785578', '654e4dc5b90b7478671fe6448cab3f32', '458F, Lorong Emas 1, Taman Emas'),
(6, 'kiki', 'nazirul@gmail.com', '94f3fa4138bb5cbcbbfac8c10187cf45', '5461616156456', 'bffa783a022fe2d98692014dda6d7a4c', '458F, Lorong Emas 1, Taman Emas'),
(7, 'Nadia ', 'test321@gmail.com', '94f3fa4138bb5cbcbbfac8c10187cf45', '55444578744  ', '777bbb7869ae8193249f8ff7d3e59afe', '458F, Lorong Emas 1, Taman Emas  ');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `invoiceDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `invoiceTotal` decimal(10,2) NOT NULL,
  `invoiceStatus` varchar(200) NOT NULL,
  `customerID` int(11) NOT NULL,
  `CardID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `invoiceDate`, `invoiceTotal`, `invoiceStatus`, `customerID`, `CardID`) VALUES
(146, '2022-05-30 12:40:15', '15.00', 'Paid', 2, NULL),
(147, '2022-05-30 16:37:22', '15.00', 'Paid', 4, NULL),
(148, '2022-05-30 16:38:09', '31.00', 'Paid', 4, NULL),
(149, '2022-05-31 12:37:20', '14.00', 'Paid', 2, NULL),
(150, '2022-05-31 12:37:37', '150.00', 'Paid', 2, NULL),
(151, '2022-05-31 12:41:29', '150.00', 'Paid', 2, NULL),
(152, '2022-05-31 12:42:23', '0.00', 'Paid', 2, NULL),
(153, '2022-05-31 12:45:32', '14.00', 'Paid', 2, NULL),
(154, '2022-05-31 12:48:10', '5200.00', 'Paid', 2, NULL),
(155, '2022-05-31 13:05:41', '0.00', 'Paid', 2, NULL),
(156, '2022-05-31 13:06:05', '150.00', 'Paid', 2, NULL),
(157, '2022-05-31 13:06:39', '310.00', 'Paid', 2, NULL),
(158, '2022-05-31 13:07:26', '0.00', 'Paid', 2, NULL),
(159, '2022-05-31 13:07:59', '150.00', 'Paid', 2, NULL),
(160, '2022-05-31 13:09:30', '342.00', 'Paid', 2, NULL),
(161, '2022-06-01 06:14:55', '28.00', 'Paid', 1, NULL),
(162, '2022-06-01 06:26:28', '2.00', 'Paid', 1, NULL),
(163, '2022-06-01 06:26:49', '20.00', 'Paid', 1, NULL),
(164, '2022-06-01 06:27:17', '28.00', 'Paid', 1, NULL),
(165, '2022-06-01 06:28:33', '0.00', 'Paid', 1, NULL),
(166, '2022-06-01 06:41:37', '26.00', 'Paid', 1, NULL),
(167, '2022-06-03 07:58:16', '42.00', 'Paid', 2, NULL),
(168, '2022-06-07 19:00:05', '16.00', 'Paid', 2, NULL),
(169, '2022-06-07 19:00:54', '0.00', 'Paid', 2, NULL),
(170, '2022-06-07 19:00:58', '0.00', 'Paid', 2, NULL),
(171, '2022-06-07 19:01:19', '0.00', 'Paid', 2, NULL),
(172, '2022-06-07 19:02:58', '0.00', 'Paid', 2, NULL),
(173, '2022-06-07 19:03:26', '0.00', 'Paid', 2, NULL),
(174, '2022-06-07 19:05:40', '0.00', 'Paid', 2, NULL),
(175, '2022-06-07 19:05:48', '16.00', 'Paid', 2, NULL),
(176, '2022-06-07 19:06:22', '0.00', 'Paid', 2, NULL),
(177, '2022-06-07 19:06:38', '10.00', 'Paid', 2, NULL),
(178, '2022-06-07 19:07:12', '0.00', 'Paid', 2, NULL),
(179, '2022-06-07 19:07:25', '35.00', 'Paid', 2, NULL),
(180, '2022-06-07 19:08:06', '0.00', 'Paid', 2, NULL),
(181, '2022-06-07 19:08:15', '15.00', 'Paid', 2, NULL),
(182, '2022-06-07 19:08:41', '25.00', 'Paid', 2, NULL),
(183, '2022-06-07 19:12:12', '15.00', 'Paid', 2, NULL),
(184, '2022-06-10 07:28:37', '1290.00', 'Paid', 2, NULL),
(185, '2022-06-10 07:28:56', '15.00', 'Paid', 2, NULL),
(186, '2022-06-10 07:30:44', '6010.00', 'Paid', 2, NULL),
(187, '2022-06-10 07:35:41', '1515.00', 'Paid', 2, NULL),
(188, '2022-06-10 07:36:22', '1500.00', 'Paid', 2, NULL),
(189, '2022-06-10 07:37:38', '1515.00', 'Paid', 2, NULL),
(190, '2022-06-10 07:37:59', '1500.00', 'Paid', 2, NULL),
(191, '2022-06-10 07:38:29', '1485.00', 'Paid', 2, NULL),
(192, '2022-06-10 07:38:46', '15.00', 'Paid', 2, NULL),
(193, '2022-06-10 07:39:07', '15.00', 'Paid', 2, NULL),
(194, '2022-06-10 07:39:20', '15.00', 'Paid', 2, NULL),
(195, '2022-06-13 16:10:08', '15.00', 'Paid', 2, NULL),
(196, '2022-06-13 16:12:17', '15.00', 'Paid', 2, 3),
(197, '2022-06-13 16:13:38', '10.00', 'Paid', 2, 2),
(198, '2022-06-13 16:15:07', '0.00', 'Paid', 2, 2),
(199, '2022-06-13 16:15:19', '16.00', 'Paid', 2, 2),
(200, '2022-06-13 16:15:27', '0.00', 'Paid', 2, 2),
(201, '2022-06-13 16:15:37', '16.00', 'Paid', 2, 2),
(202, '2022-06-15 15:27:51', '0.00', 'Paid', 2, 2),
(203, '2022-06-16 03:09:20', '3160.00', 'Paid', 7, 8),
(204, '2022-06-16 03:10:07', '2400.00', 'Paid', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `staffName` varchar(200) NOT NULL,
  `staffEmail` varchar(100) NOT NULL,
  `staffPass` varchar(200) NOT NULL,
  `staffPhoneNo` varchar(15) NOT NULL,
  `staffType` varchar(50) NOT NULL,
  `staffAvail` int(4) NOT NULL,
  `staffActivate` int(4) NOT NULL,
  `staffSecret` varchar(200) NOT NULL,
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffEmail`, `staffPass`, `staffPhoneNo`, `staffType`, `staffAvail`, `staffActivate`, `staffSecret`, `adminID`) VALUES
(1, 'SHARIFAH ZULAIKHA BINTI KARIM', 'admin@gmail.com', 'e99a18c428cb38d5f260853678922e03', '0172654100  ', 'Admin', 0, 1, 'bffa783a022fe2d98692014dda6d7a4c', NULL),
(2, 'AHMAD SAIFUL BIN ZAINUL', 'saiful12@gmail.com', '36924c298f2176c55166976d2b8807b7', '0123186811', 'Staff', 0, 1, 'f7cdd9f292ab97ad1cdebc2346cc38f4', 1),
(3, 'SITI DANIA BINTI AMINUDDIN', 'siti@gmail.com', 'e99a18c428cb38d5f260853678922e03', '0134261524', 'Staff', 0, 1, '650feb326abade613932b862af8c85d2', 1),
(4, 'MOHD ADAM BIN MOHD FARUK', 'adam24@gmail.com', '36924c298f2176c55166976d2b8807b7', '0198253625', 'Staff', 0, 0, '', 1),
(5, 'FARAH SYAZWANI BINTI KAMARUL', 'farah00@gmail.com', '61bd60c60d9fb60cc8fc7767669d40a1', '0125142009', 'Staff', 0, 0, '', 1);

--
-- Triggers `staff`
--
DELIMITER $$
CREATE TRIGGER `addstaffname_trig` BEFORE INSERT ON `staff` FOR EACH ROW SET new.staffName := UPPER(new.staffName)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatestaffname_trig` BEFORE UPDATE ON `staff` FOR EACH ROW SET new.staffName := UPPER(new.staffName)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animalID`),
  ADD KEY `CATEGORYID` (`breedID`);

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`breedID`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardID`),
  ADD KEY `customerID` (`CustomerID`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkoutID`),
  ADD KEY `receiptID` (`invoiceID`),
  ADD KEY `productID` (`animalID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `custID` (`customerID`),
  ADD KEY `cardID` (`CardID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `AdminID` (`adminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `breedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `breed` FOREIGN KEY (`breedID`) REFERENCES `breed` (`breedID`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `customerID` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`invoiceID`) REFERENCES `invoice` (`invoiceID`),
  ADD CONSTRAINT `checkout_ibfk_2` FOREIGN KEY (`animalID`) REFERENCES `animal` (`animalID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `cardID` FOREIGN KEY (`CardID`) REFERENCES `card` (`cardID`),
  ADD CONSTRAINT `custID` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `staff` (`staffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
