-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 10:09 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(12) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `area` varchar(70) NOT NULL,
  `locality` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `pin`, `area`, `locality`) VALUES
(36, '222210', 'Area-1', 'M.Nagar'),
(37, '121210', 'Area-2', 'M.Nagar '),
(38, '222210', 'Area-1', 'H.Khash '),
(39, '111010', 'Area-1', 'Janakpuri'),
(40, '121210', 'Area-2', 'Lanka'),
(41, '121212', 'Area-3', 'Mayur Bihar Phase-1'),
(42, '784587', 'area-10', 'jaiNagar'),
(43, '222210', 'aera-1', 'shushant lok'),
(44, 'road -1', 'zone-1', 'ward-1'),
(45, 'Road-2', 'Zone-2', 'Ward-2'),
(46, 'Road-3', 'Zone-2', 'Ward-2');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(10) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `bill_type` varchar(20) NOT NULL,
  `meterReading` bigint(5) NOT NULL,
  `perUcast` float NOT NULL,
  `total` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reading` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `customer_id`, `day`, `month`, `year`, `bill_type`, `meterReading`, `perUcast`, `total`, `status`, `reading`) VALUES
(20725, '1185588419', '12', '06', '2016', 'Domestic', 560, 0, 3341.5, 1, 326),
(26737, '1185588419', '', '05', '2016', 'Domestic', 234, 0, 2398.5, 1, 230),
(90576, '771457991', '', '07', '2015', 'Domestic', 145, 0, 1486.25, 1, 0),
(111906, '1185588419', '', '01', '1970', 'Comercial', 234, 0, 2398.5, 1, 0),
(119217, '516531439', '12', '04', '2017', 'Domestic', 156, 0, 378, 0, 33),
(145623, '422663854', '14', '05', '2016', 'domestic', 70, 0, 153, 1, 12),
(189884, '422663854', '14', '02', '2016', 'domestic', 36, 0, 162, 1, 13),
(238284, '516531439', '10', '06', '2016', 'domestic', 66, 0, 135, 0, 10),
(318831, '5379772', '', '05', '2015', 'Domestic', 456, 0, 4674, 1, 0),
(321429, '1185588419', '', '01', '1970', 'Comercial', 234, 0, 2398.5, 1, 0),
(354542, '97948794', '22', '06', '2016', 'Comercial', 23, 0, 441, 1, 11),
(369406, '499427504', '15', '05', '2016', 'domestic', 23, 0, 144, 1, 11),
(406960, '422663854', '14', '03', '2016', 'domestic', 48, 0, 153, 1, 12),
(419106, '771457991', '', '07', '2015', 'Domestic', 145, 0, 1486.25, 1, 0),
(445511, '771457991', '', '07', '2015', 'Domestic', 145, 0, 1486.25, 1, 0),
(448865, '97948794', '05', '02', '2016', 'Comercial', 560, 0, 3341.5, 1, 326),
(456901, '810785912', '', '08', '2015', 'Comercial', 225, 0, 2306.25, 1, 0),
(464938, '179609882', '22', '06', '2016', 'Comercial', 23, 0, 441, 1, 11),
(475029, '', '', '01', '1970', '', 0, 0, 0, 1, 0),
(487355, '1185588419', '', '06', '2016', 'Domestic', 234, 0, 2398.5, 1, 229),
(498323, '', '', '01', '1970', '', 0, 0, 0, 1, 0),
(562041, '1194715465', '05', '02', '2016', 'Comercial', 26, 0, 224, 1, 8),
(568808, '771457991', '05', '02', '2016', 'Domestic', 456, 0, 2316.5, 1, 226),
(568899, '97948794', '', '05', '2016', 'Comercial', 300, 0, 3075, 1, 0),
(590017, '572406769', '12', '05', '2016', 'Comercial', 324, 0, 2060.25, 1, 201),
(607329, '499427504', '12', '06', '2016', 'domestic', 36, 0, 162, 1, 13),
(636695, '516531439', '30', '03', '2017', 'Domestic', 123, 0, 741, 0, 57),
(639324, '1194715465', '12', '07', '2016', 'Comercial', 560, 0, 1066, 1, 104),
(664038, '422663854', '14', '04', '2016', 'domestic', 58, 0, 135, 1, 10),
(715308, '516531439', '10', '03', '2016', 'domestic', 38, 0, 180, 1, 15),
(732469, '1194715465', '29', '06', '2016', 'Comercial', 25, 0, 513, 1, 13),
(742832, '97948794', '', '05', '2016', 'Comercial', 300, 0, 3075, 1, 0),
(743285, '516531439', '12', '12', '2015', 'domestic', 26, 0, 171, 1, 14),
(751774, '97948794', '', '05', '2016', 'Comercial', 300, 0, 3075, 1, 0),
(775521, '97948794', '', '05', '2016', 'Comercial', 300, 0, 3075, 1, 0),
(795462, '422663854', '14', '06', '2016', 'domestic', 82, 0, 153, 1, 12),
(819843, '516531439', '10', '01', '2016', 'domestic', 14, 0, 171, 1, 14),
(826369, '422663854', '14', '01', '2016', 'domestic', 23, 0, 144, 1, 11),
(828121, '493417010', '12', '01', '2016', 'domestic', 48, 0, 331, 1, 22),
(837578, '810785912', '12', '07', '2016', 'Comercial', 460, 0, 2357.5, 1, 230),
(839813, '516531439', '10', '02', '2016', 'domestic', 23, 0, 126, 1, 9),
(866642, '97948794', '20', '04', '2016', 'Comercial', 21, 0, 369, 1, 9),
(868908, '97948794', '17', '05', '2016', 'Comercial', 25, 0, 477, 1, 12),
(870207, '572406769', '', '05', '2016', 'Comercial', 234, 0, 2398.5, 1, 0),
(871506, '1194715465', '05', '01', '2016', 'Comercial', 18, 0, 792, 1, 18),
(892383, '516531439', '10', '04', '2016', 'domestic', 46, 0, 101, 1, 8),
(894588, '516531439', '10', '08', '2016', 'Domestic', 95, 0, 266, 1, 17),
(903108, '751608522', '05', '02', '2016', 'Domestic', 865, 0, 4233.25, 1, 413),
(917550, '1185588419', '', '01', '1970', 'Comercial', 234, 0, 2398.5, 1, 0),
(919393, '1185588419', '', '03', '2016', 'Domestic', 500, 0, 3864.25, 1, 377),
(934952, '516531439', '10', '05', '2016', 'domestic', 56, 0, 135, 1, 10),
(952294, '516531439', '23', '09', '2016', 'Domestic', 115, 0, 305, 0, 20),
(961267, '516531439', '03', '07', '2016', 'Domestic', 78, 0, 153, 1, 12),
(966947, '771457991', '', '07', '2015', 'Domestic', 145, 0, 1486.25, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `billpay`
--

CREATE TABLE `billpay` (
  `id` int(12) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `payment_mode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billpay`
--

INSERT INTO `billpay` (`id`, `bill_id`, `customer_id`, `emp_id`, `date`, `payment_mode`) VALUES
(1, 1212, '1234', '0987', '04/06/2016', ''),
(2, 568899, '97948794', '915844', '2015-07-02', ''),
(3, 568899, '97948794', '915844', '2015-07-02', ''),
(4, 568899, '97948794', '915844', '2015-07-02', ''),
(5, 133357, '516531439', '915844', '1970-01-01', ''),
(6, 456901, '810785912', '915844', '1970-01-01', ''),
(7, 383727, '', '915844', '1970-01-01', ''),
(8, 90576, '771457991', '915844', '2016-05-12', ''),
(9, 111906, '1185588419', '915844', '2015-05-04', ''),
(10, 318831, '5379772', '967837', '1970-01-01', ''),
(11, 870207, '572406769', '915844', '2016-05-12', ''),
(12, 1212, '1234', '915844', '2016-05-12', ''),
(13, 1212, '1234', '915844', '2016-05-12', ''),
(14, 1212, '1234', '915844', '2016-05-12', ''),
(15, 90576, '771457991', '', '2016-06-11', ''),
(16, 639324, '1194715465', '', '2016-07-05', ''),
(17, 562041, '1194715465', '915844', '2016-02-14', ''),
(18, 562041, '1194715465', '915844', '2016-02-14', ''),
(19, 562041, '1194715465', '915844', '2016-02-14', ''),
(20, 562041, '1194715465', '915844', '2016-02-14', ''),
(21, 562041, '1194715465', '915844', '2016-02-14', ''),
(22, 562041, '1194715465', '915844', '2016-02-14', ''),
(23, 562041, '1194715465', '915844', '2016-02-14', ''),
(24, 562041, '1194715465', '915844', '2016-02-14', ''),
(25, 562041, '1194715465', '915844', '2016-02-14', ''),
(26, 562041, '1194715465', '915844', '2016-02-14', ''),
(27, 562041, '1194715465', '915844', '2016-02-14', ''),
(28, 562041, '1194715465', '915844', '2016-02-14', ''),
(29, 562041, '1194715465', '915844', '2016-02-14', ''),
(30, 562041, '1194715465', '915844', '2016-02-14', ''),
(31, 562041, '1194715465', '915844', '2016-02-14', ''),
(32, 562041, '1194715465', '915844', '2016-02-14', ''),
(33, 562041, '1194715465', '915844', '2016-02-14', ''),
(34, 562041, '1194715465', '915844', '2016-02-14', ''),
(35, 562041, '1194715465', '915844', '2016-02-14', ''),
(36, 562041, '1194715465', '915844', '2016-02-14', ''),
(37, 20725, '1185588419', '', '2016-07-16', ''),
(38, 20725, '1185588419', '', '2016-07-16', ''),
(39, 20725, '1185588419', '', '1970-01-01', ''),
(40, 448865, '97948794', '', '2016-07-12', ''),
(41, 772772, '516531439', '915844', '2016-06-23', ''),
(42, 772772, '516531439', '915844', '2016-06-23', ''),
(43, 772772, '516531439', '915844', '2016-06-23', ''),
(44, 772772, '516531439', '915844', '2016-07-12', ''),
(45, 772772, '516531439', '915844', '2016-07-12', ''),
(46, 772772, '516531439', '915844', '2016-07-24', ''),
(47, 772772, '516531439', '915844', '1970-01-01', ''),
(48, 577962, '516531439', '915844', '1970-01-01', ''),
(49, 577962, '516531439', '', '1970-01-01', ''),
(50, 464938, '179609882', '', '2016-06-23', 'cheque'),
(51, 828121, '493417010', '', '1970-01-01', 'cheque'),
(52, 828121, '493417010', '', '1970-01-01', '0'),
(53, 828121, '493417010', '', '1970-01-01', '0'),
(54, 828121, '493417010', '', '1970-01-01', '0'),
(55, 828121, '493417010', '', '1970-01-01', '0'),
(56, 828121, '493417010', '', '1970-01-01', '0'),
(57, 828121, '493417010', '', '1970-01-01', '0'),
(58, 0, '', '', '1970-01-01', '0'),
(59, 828121, '493417010', '', '1970-01-01', '0'),
(60, 0, '', '', '2016-06-14', ''),
(61, 354542, '97948794', '', '2016-06-23', ''),
(62, 0, '', '', '1970-01-01', ''),
(63, 0, '', '', '1970-01-01', ''),
(64, 354542, '97948794', '', '1970-01-01', ''),
(65, 354542, '97948794', '', '1970-01-01', ''),
(66, 354542, '97948794', '', '1970-01-01', ''),
(67, 354542, '97948794', '', '1970-01-01', ''),
(68, 238284, '516531439', '', '1970-01-01', ''),
(69, 238284, '516531439', '', '1970-01-01', ''),
(70, 0, '', '', '1970-01-01', ''),
(71, 0, '', '', '1970-01-01', ''),
(72, 238284, '516531439', '', '1970-01-01', ''),
(73, 795462, '422663854', '', '1970-01-01', ''),
(74, 20725, '1185588419', '', '1970-01-01', ''),
(75, 0, '', '', '1970-01-01', ''),
(76, 0, '', '', '1970-01-01', ''),
(78, 732469, '1194715465', '915844', '2016-07-02', 'Cheque'),
(81, 961267, '516531439', '915844', '2016-07-02', 'Cheque'),
(82, 894588, '516531439', '915844', '2016-07-02', 'Cheque'),
(83, 369406, '499427504', '', '2016-07-03', 'Cheque'),
(84, 238284, '516531439', '768051', '2016-07-03', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `cheque_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`id`, `customer_id`, `cheque_no`) VALUES
(1, '179609882', 'SBI564256'),
(2, '493417010', 'SBI564256'),
(4, '1194715465', 'PNB8907654'),
(7, '516531439', 'SBI908976'),
(8, '516531439', 'SBI908976'),
(9, '499427504', 'PNB908767');

-- --------------------------------------------------------

--
-- Table structure for table `complainasingnbook`
--

CREATE TABLE `complainasingnbook` (
  `emp_id` varchar(10) NOT NULL,
  `complain_id` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complainasingnbook`
--

INSERT INTO `complainasingnbook` (`emp_id`, `complain_id`, `date`, `status`, `id`) VALUES
('0985', '456879', '12/05/2016', 'unprocessesed', 1),
('7685', '78934504', '10/05/2016', 'unprocessesed', 2),
('967837', '1204895', '2016-06-12', 'P', 3),
('967837', '1204895', '2016-06-12', 'P', 4),
('967837', '1204895', '2016-06-12', 'P', 5),
('967837', '3361511', '2016-06-12', 'P', 6),
('967837', '3446105', '2016-06-12', 'P', 7),
('967837', '4451629', '2016-06-12', 'P', 8),
('967837', '9787139', '2016-06-12', 'P', 9),
('967837', '', '2016-06-12', 'P', 10),
('182974', '', '2016-06-12', 'P', 11),
('182974', '', '2016-06-12', 'P', 12),
('967837', '', '2016-06-12', 'P', 13),
('182974', '1204895', '2016-06-12', 'P', 14),
('182974', '3361511', '2016-06-12', 'P', 15),
('182974', '3446105', '2016-06-12', 'P', 16),
('182974', '4451629', '2016-06-12', 'P', 17),
('182974', '', '2016-06-12', 'P', 18),
('182974', '7628601', '2016-06-12', 'P', 19),
('182974', '', '2016-06-12', 'P', 20),
('553625', '1204895', '2016-06-12', 'P', 21),
('553625', '3361511', '2016-06-12', 'P', 22),
('553625', '3446105', '2016-06-12', 'P', 23),
('553625', '4451629', '2016-06-12', 'P', 24),
('553625', '9787139', '2016-06-12', 'P', 25),
('553625', '', '2016-06-12', 'P', 26),
('', '', '2016-06-12', 'P', 27),
('', '1204895', '2016-06-12', 'P', 28),
('', '3361511', '2016-06-12', 'P', 29),
('', '3446105', '2016-06-12', 'P', 30),
('', '4451629', '2016-06-12', 'P', 31),
('', '', '2016-06-12', 'P', 32),
('', '1204895', '2016-06-12', 'P', 33),
('', '3361511', '2016-06-12', 'P', 34),
('', '3446105', '2016-06-12', 'P', 35),
('', '4451629', '2016-06-12', 'P', 36),
('', '', '2016-06-12', 'P', 37),
('298550', '7628601', '2016-06-13', 'P', 38),
('298550', '', '2016-06-13', 'P', 39),
('553625', '2017333', '2016-06-13', 'P', 40),
('553625', '3883087', '2016-06-13', 'P', 41),
('298550', '5423095', '2016-06-13', 'P', 42),
('298550', '8878021', '2016-06-13', 'P', 43),
('298550', '2017333', '2016-06-14', 'P', 44),
('298550', '3883087', '2016-06-14', 'P', 45),
('912054', '1567443', '2016-06-22', 'P', 46),
('912054', '8959594', '2016-06-22', 'P', 47),
('912054', '8959594', '2016-06-22', 'P', 48),
('912054', '8959594', '2016-06-22', 'P', 49),
('Select Emp', '8959594', '2016-06-22', 'P', 50),
('Select Emp', '8959594', '2016-06-22', 'P', 51),
('Select Emp', '8959594', '2016-06-22', 'P', 52),
('Select Emp', '8959594', '2016-06-22', 'P', 53),
('298550', '8959594', '2016-06-22', 'P', 54),
('298550', '8959594', '2016-06-22', 'P', 55),
('553625', '1485595', '2016-06-22', 'U', 56),
('553625', '3923461', '2016-06-22', 'U', 57),
('298550', '8322937', '2016-06-22', 'P', 58),
('553625', '5173980', '2016-06-22', 'U', 59),
('912054', '6401428', '2016-06-22', 'P', 60),
('912054', '2971771', '2016-06-24', 'P', 61),
('298550', '4430206', '2016-06-29', 'P', 62),
('500781', '7309997', '2016-07-02', 'P', 63),
('553625', '9055175', '2016-07-02', 'U', 64),
('912054', '1255706', '2016-07-02', 'P', 65),
('912054', '9860198', '2017-04-01', 'U', 66),
('553625', '2533966', '2017-04-02', 'U', 67);

-- --------------------------------------------------------

--
-- Table structure for table `complainregister`
--

CREATE TABLE `complainregister` (
  `complain_id` varchar(10) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `complain_type` varchar(255) NOT NULL,
  `discription` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complainregister`
--

INSERT INTO `complainregister` (`complain_id`, `customer_id`, `date`, `month`, `year`, `complain_type`, `discription`, `status`) VALUES
('1255706', '516531439', '2016-06-24', '06', '2016', 'Meter', 'Faulty', '1'),
('1309814', '973106341', '2017-03-30', '03', '2017', 'Water Supply', 'Damage water punp ', '1'),
('1485595', '754873481', '2016-06-23', '06', '2016', 'Water Supply', 'water pump damage ', '0'),
('1567443', '516531439', '2016-06-19', '06', '2016', 'Water Supply', 'water pump damage ', '1'),
('2017333', '1185588419', '2016-06-13', '06', '2016', 'Meter', 'not working praperly ', '1'),
('2533966', '516531439', '2017-04-02', '04', '2017', 'Contamination', 'supply contaminated', '1'),
('2810272', '964350313', '2017-05-01', '05', '2017', 'Water Supply', 'Damage water punp ', '1'),
('2971771', '516531439', '2016-06-24', '06', '2016', 'Meter', 'meter reading not working ', '1'),
('3883087', '572406769', '2016-06-13', '06', '2016', 'Water Supply', 'water pump damage ', '1'),
('3923461', '105035240', '2016-06-23', '06', '2016', 'Meter', 'meter reading not working ', '0'),
('4430206', '1021524206', '2016-06-29', '06', '2016', 'Water Supply', 'water pump damage ', '1'),
('5173980', '1185588419', '2016-06-24', '06', '2016', 'Meter', 'meter reading not working ', '0'),
('5398925', '422663854', '2016-06-29', '06', '2016', 'Meter', 'meter reading not working ', '0'),
('5423095', '516531439', '2016-06-13', '06', '2016', 'Meter', 'meter is not working', '1'),
('6401428', '1185588419', '2016-06-24', '06', '2016', 'Water Supply', 'water pump damage ', '1'),
('7309997', '1194715465', '2016-07-02', '07', '2016', 'Meter', 'meter is not working', '1'),
('7628601', '810785912', '2016-07-12', '07', '2016', '', 'pipe is damage ', '1'),
('8322937', '1194715465', '2016-06-23', '06', '2016', 'Water Supply', 'water pump damage ', '1'),
('8511901', '1194715465', '2016-06-20', '06', '2016', 'Water Supply', 'water pump damage ', '0'),
('8878021', '493417010', '2016-06-13', '06', '2016', 'Water Supply', 'water pump damage ', '1'),
('8959594', '572406769', '2016-06-23', '06', '2016', 'Water Supply', 'meter is not working', '1'),
('9860198', '973106341', '2017-03-29', '03', '2017', 'Water Supply', 'Damage water punp ', '0');

-- --------------------------------------------------------

--
-- Table structure for table `complain_temp`
--

CREATE TABLE `complain_temp` (
  `emp_id` varchar(10) NOT NULL,
  `complain_id` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(10) NOT NULL,
  `fi` varchar(10) NOT NULL,
  `C_name` varchar(40) NOT NULL,
  `C_mid_name` varchar(20) NOT NULL,
  `C_lname` varchar(20) NOT NULL,
  `customer_fullname` varchar(40) NOT NULL,
  `relation_type` varchar(30) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `no_of_family_m` varchar(10) NOT NULL,
  `adhar_no` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type_of_customer` varchar(22) NOT NULL,
  `address` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `area` varchar(200) NOT NULL,
  `road` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `landline_no` varchar(11) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `addressproof` varchar(20) NOT NULL,
  `idproof` varchar(20) NOT NULL,
  `meter_id` varchar(10) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` varchar(6) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fi`, `C_name`, `C_mid_name`, `C_lname`, `customer_fullname`, `relation_type`, `r_name`, `no_of_family_m`, `adhar_no`, `gender`, `type_of_customer`, `address`, `location`, `area`, `road`, `city`, `state`, `landline_no`, `mobile`, `pin`, `addressproof`, `idproof`, `meter_id`, `issue_date`, `day`, `month`, `year`, `isActive`) VALUES
('1021524206', 'Mr.', 'Raghav', 'Kumar', 'Rawat', 'Raghav  Kumar  Rawat', 'Father', 'Om Prakash Rawat ', '5', '3456575', 'Male', 'Domestic', ' Jhons Villa Block 1A', 'M.Nagar', 'area-1', '', 'Delhi ', 'Delhi ', '05482225553', '9616454875', '222210', 'Bank Passbook', 'Voter Id', '632563', '2016-06-29', '29', '06', '2016', 1),
('105035240', 'Mrs.', 'Priya ', '', 'Singh', 'Priya   Singh', 'Husband Name', 'Kamlesh Singh ', '5', '456789', 'Female', 'Domestic', ' G123-A  Block-D', 'Noida Sec 63', '', '', 'Noida ', 'Uttar Pradesh ', '05482225552', '9889545658', '345678', 'Bank Passbook', 'Voter Id', '456987', '', '29', '06', '2016', 1),
('1131568181', 'Mr.', 'Pyush ', 'Kumar ', 'Srivastawa ', 'Pyush  Kumar  Srivastawa ', 'Father', 'Prakash sriwastawa ', '5+', '56145623', 'Male', 'Domestic', ' S12/34', 'M.Nagar', 'area-1', '', 'delhi ', 'Delhi ', '0548226532', '9654245221', '222210', 'Bank Passbook', 'Ration Card', '896548', '2016-07-03', '03', '07', '2016', 1),
('1185588419', 'Miss.', 'Richa ', '', 'Singh ', 'Richa   Singh ', 'Father', 'Vijay Singh yadav ', '5', '12131432', 'Female', 'Domestic', ' H3 A 12/312  Sahara Building ', 'Janakpuri west', 'area-2', '', 'Delhi ', 'Uttar Pradesh ', '0487223354', '898845699645', '8976567', 'Passport', 'Voter Id', '45026', '', '22', '02', '2017', 1),
('1193454003', 'Mr.', 'Vijay', 'Kumar ', 'Rai', 'Vijay Kumar  Rai', 'Father', 'Jay Kumar Rai', '5+', '5623145342', 'Male', 'Domestic', '1309 P Sector 43 ', 'M.Nagar', 'Area-1', '', 'Varanasi', 'Uttar Pradesh', '05482225553', '9645145215', '222210', 'Passport', 'Ration Card', '63524144', '1970-01-01', '01', '01', '1970', 1),
('1194715465', 'Mr.', 'Gopal ', '', 'Singh', 'Gopal   Singh', 'Father Name', 'RaviKishan Singh ', '5', '9807691', 'Male', 'Commercial', '    C32-A  AV Nagar ', 'Noida Sec-63', 'area-2', '', 'Noida ', 'Uttar Pradesh ', '05482223130', '1234567890', '345678', '', 'Passport', '1234567', '', '12', '02', '2017', 1),
('163136678', 'Mrs.', 'Ritvik ', 'kumar ', 'Sinha', 'Ritvik  kumar  Sinha', 'Father', 'Harigovind Sinha ', '5', '7845763', 'Male', 'Domestic', ' G123-A  AV Nagar ', 'Janakpuri ', '', '', 'Delhi ', '1', '0522454848', '9889545658', '897654', 'Passport', 'Ration Card', '768930', '', '12', '02', '2017', 1),
('179609882', 'Mr.', 'Ghanshyam ', 'Singh ', 'Raghwamshi ', '  ', 'Father', 'Shadanand Kumar SIngh ', '5', '57464956', 'Male', 'Commercial', ' C32-A  Block-C', 'Noida Sec 63', '', '', 'Noida ', '1', '0478245234', '4568971230', '453235', 'Bank Passbook', 'Passport', '123432', '', '10', '03', '2017', 1),
('340668849', 'Mr.', 'Lalit', '', 'Kataria', 'Lalit  Kataria', 'Father', 'Shiv Kataria', '5+', '5623145465', 'Male', 'Domestic', '1309 P Sector 43 ', 'ward-1', 'Zone1', 'road -1', 'Magadi', 'Karnataka', '05482225634', '9645145220', '365421', 'Passport', 'Driving Licence', '63524140', '1970-01-01', '01', '01', '1970', 1),
('422663854', 'Mr.', 'Raghuwansh ', 'Kumar ', 'Singh ', 'Raghuwansh  Kumar  Singh ', 'Father', 'Shiv Shankar Singh ', '5', '4365476', 'Male', 'Domestic', ' 24/D  AV Nagar ', 'Noida Sec 63', 'area-2', '', 'Noida ', 'Uttar Pradesh ', '05482223244', '4568971234', '453213', 'Bank Passbook', 'Ration Card', '57564', '', '8', '06', '2016', 1),
('493417010', 'Miss.', 'Ritika ', '', 'Singh ', 'Ritika   Singh ', 'Father', 'Rakesh Singh ', '5', '12131432', 'Female', 'Domestic', '  C 14/53  kabirpur near post office ', 'Noida Sec 65', '', '', 'Uttar Pradesh', '1', '05482223167', '4568971231', '897654', '', 'Voter Id', '789455', '', '19', '03', '2017', 1),
('499427504', 'Mr.', 'Ritesh ', 'Kumar ', 'Singh', 'Ritesh   Singh', 'Husband', 'Shiv Shankar Singh ', '4', '12345567', 'Male', 'Domestic', '  24/D   kabirpur near post office ', 'Noida-Sec-64', '', '', 'Noida ', 'Uttar Pradesh ', '05482223145', '4568971231', '345678', 'Passport', 'Ration Card', '8907', '', '12', '11', '2016', 1),
('516531439', 'Miss.', 'kavita ', '', 'Jain ', 'kavita   Jain ', 'Father', 'Shashi Jain ', '5', '451236', 'Female', 'Domestic', '   C 14/55 Sahara Building ', 'New Ashok Nagar  Phase-1', '', '', 'Delhi ', '1', '0522454742', '9918457475', '897654', 'Bank Passbook', 'Ration Card', '746287', '', '28', '10', '2016', 1),
('5379772', 'Miss.', 'Payal ', '', 'Negi ', 'Payal   Negi ', 'Father', 'Shubhash Negi ', '5', '4566645', 'Female', 'Domestic', '  D23 Mayur Bihar ', 'Delhi south ', '', '', 'Delhi ', 'Delhi ', '048722222', '7376117646', '345465', 'Bank Passbook', 'Passport', '124356', '', '8', '06', '2016', 1),
('572406769', 'Mr.', 'Rajsh', 'Kumar ', 'Sriwastava', 'Rajsh Kumar  Sriwastava', 'Father', 'Harshit Kumar Sriwstava', '5', '75896590', 'Male', 'Commercial', '   C 14/53  kabirpur near post office ', 'Noida Sec 63', '', '', 'Noida ', 'Uttar Pradesh', '05482223134', '4568971290', '897654', 'Bank Passbook', 'Passport', '857432', '', '10', '01', '2017', 1),
('751608522', 'Mr.', 'Radheshyam ', '', 'Singh ', 'Radheshyam   Singh ', 'Father', 'Shiv Shankar Singh ', '4', '765483', 'Male', 'Domestic', '  C 14/53 AV Nagar ', 'Noida Sec 66', '', '', 'Noida ', 'Uttar Pradesh ', '05482223140', '9889545659', '345678', 'Passport', 'Ration Card', '67890', '', '15', '02', '2017', 1),
('754873481', 'Mr.', 'Abhinav ', 'Kumar ', 'Gupta ', 'Abhinav   Gupta ', 'Father', 'Sitaram Gupta ', '5', '456764', 'Male', 'Domestic', '   D23/432 Sahara Building Phase 1', 'Lucknow', '', '', 'Lucknow ', 'Uttar Pradesh', '05482225552', '8818454666', '221230', 'Bank Passbook', 'Passport', '798564', '2016-06-13', '13', '06', '2016', 1),
('771457991', 'Mrs.', 'Divya ', '', 'Sriwastava ', 'Divya   Sriwastava ', 'Husband', 'mukul chand Sriwastava ', '5', '45612783', 'Female', 'Domestic', '  C34/120 JoytiVihar ', 'Anand Vihar ', '', '', 'Delhi ', '1', '08845789654', '9616457847', '784574', 'Bank Passbook', 'Passport', '7894562', '', '26', '07', '2016', 1),
('810785912', 'Mr.', 'Ajay ', 'Kumar ', 'Sharma ', 'Ajay  Kumar  Sharma ', 'Father', 'Vijay Shankar Sharma ', '5', '7890654', 'Male', 'Commercial', ' C 14/53 Shiv Nagar Colony ', 'Indranagar ', '', '', 'Lucknow ', 'Uttar Pradesh ', '0522454846', '9415865745', '202322', 'Passport', 'Ration Card', '675431', '', '11', '03', '2017', 1),
('861095969', 'Mrs.', 'Utkarsh ', 'Kumar ', 'Rai ', 'Utkarsh  Kumar  Rai ', 'Father', 'Shatendra Nath Rai ', '5', '451236', 'Male', 'Commercial', '  G12/34 Rai Ganj ', 'Delhi West ', '', '', 'Delhi ', 'Delhi ', '0548222550', '964512445', '232314', 'Bank Passbook', 'Passport', '362954', '2016-07-12', '12', '07', '2016', 1),
('964350313', 'Mr.', 'Vijay ', 'Kumar', 'SINGH', 'Vijay  Kumar SINGH', 'Father', 'Jay Kumar sINGH', '5+', '5623145334', '0', 'Domestic', '1309 P Sector 44', 'M.Nagar', 'Area-1', '', 'Varanasi', 'Uttar Pradesh', '05482225532', '9645145212', '222210', 'Bank Passbook', 'Ration Card', '63524134', '1970-01-01', '01', '01', '1970', 1),
('973106341', 'Mr.', 'Varun', '', 'Arora', 'Varun Arora', 'Father', 'JaiKumar Arora', '5+', '5623145623', 'Male', 'Domestic', '1309 P Sector 43 ', 'M.Nagar', 'area-2', '', 'Gurgaon', 'Hariyana', '05482225552', '9645145214', '456567', 'Passport', 'Ration Card', '564231', '1970-01-01', '01', '01', '1970', 1),
('97948794', 'Mr.', 'Dhanjay ', '', 'Rai ', 'Dhanjay   Rai ', 'Father', 'Rishabh Kumar Rai ', '5', '8457896', 'Male', 'Commercial', '  A 12/23  Block-C Empire Building', 'New Ashok Nagar ', '', '', 'Delhi ', 'Delhi ', '0478245256', '9918457475', '876901', 'Bank Passbook', 'Passport', '567890', '', '12', '01', '2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delete_customer`
--

CREATE TABLE `delete_customer` (
  `d_id` int(8) NOT NULL,
  `customer_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `doc_id` int(11) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `doc_name` varchar(20) NOT NULL,
  `doc_path` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`doc_id`, `customer_id`, `doc_name`, `doc_path`) VALUES
(40, '1185588419', '1185588419photo.png', 'photo/1185588419photo.png'),
(41, '1185588419', '1185588419IdPtoof.pn', 'photo/1185588419IdPtoof.png'),
(42, '1185588419', '1185588419AddressPro', 'photo/1185588419AddressProof.png'),
(43, '97948794', '97948794photo.jpg', 'photo/97948794photo.jpg'),
(44, '97948794', '97948794IdPtoof.jpg', 'photo/97948794IdPtoof.jpg'),
(45, '97948794', '97948794AddressProof', 'photo/97948794AddressProof.jpg'),
(46, '1194715465', '1194715465photo.jpg', 'photo/1194715465photo.jpg'),
(47, '1194715465', '1194715465IdPtoof.jp', 'photo/1194715465IdPtoof.jpg'),
(48, '1194715465', '1194715465AddressPro', 'photo/1194715465AddressProof.jpg'),
(49, '1194715465', '1194715465photo.jpg', 'photo/1194715465photo.jpg'),
(50, '1194715465', '1194715465IdPtoof.jp', 'photo/1194715465IdPtoof.jpg'),
(51, '1194715465', '1194715465AddressPro', 'photo/1194715465AddressProof.jpg'),
(61, '973106341', '973106341photo.jpg', 'document/973106341photo.jpg'),
(62, '973106341', '973106341IdPtoof.jpg', 'document/973106341IdPtoof.jpg'),
(63, '973106341', '973106341AddressProo', 'document/973106341AddressProof.jpg'),
(64, '973106341', '973106341photo.jpg', 'document/973106341photo.jpg'),
(65, '1193454003', '1193454003photo.png', 'document/1193454003photo.png'),
(66, '1193454003', '1193454003IdPtoof.pn', 'document/1193454003IdPtoof.png'),
(67, '1193454003', '1193454003AddressPro', 'document/1193454003AddressProof.png'),
(68, '964350313', '964350313photo.jpg', 'document/964350313photo.jpg'),
(69, '964350313', '964350313IdPtoof.jpg', 'document/964350313IdPtoof.jpg'),
(70, '964350313', '964350313AddressProo', 'document/964350313AddressProof.jpg'),
(71, '340668849', '340668849photo.jpg', 'document/340668849photo.jpg'),
(72, '340668849', '340668849IdPtoof.jpg', 'document/340668849IdPtoof.jpg'),
(73, '340668849', '340668849AddressProo', 'document/340668849AddressProof.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `duepayment`
--

CREATE TABLE `duepayment` (
  `id` int(12) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `bill_id` varchar(10) NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duepayment`
--

INSERT INTO `duepayment` (`id`, `customer_id`, `bill_id`, `pay`, `due`) VALUES
(2, '1194715465', '732469\n', 500, 13),
(5, '516531439', '961267', 400, 19),
(6, '516531439', '894588', 400, 19),
(7, '499427504', '369406\n', 100, 44),
(8, '516531439', '238284\n', 100, 35);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(22) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `doj` varchar(20) NOT NULL,
  `contactNo` varchar(12) NOT NULL,
  `emailId` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  `assign_area` varchar(10) NOT NULL,
  `mr_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `emp_name`, `gender`, `dob`, `doj`, `contactNo`, `emailId`, `address`, `city`, `state`, `pin`, `emp_type`, `assign_area`, `mr_type`) VALUES
(1, '0987', 'kabir khan ', 'Male', '09/07/1982', '11/05/2001', '12345624', 'kabir@gmail.com', '63 B Block Noida ', 'Noida ', 'UttarPradesh', '', '', '', ''),
(2, '624240', 'ShashiShekhar Singh ', 'Male', '05071989', '12112008', '9415877888', 'shail5788@gmail.com', 'C31/312 Maa sarda Nagar Colony', 'Ghazipur', 'Uttar Pradesh', '233001', '3', '', ''),
(3, '963442', 'Shailendra Verma ', 'Male', '05071988', '14091999', '9415877888', 'shail5788@gmail.com', 'C31/312 Maa sarda Nagar Colony', 'Ghazipur', 'Uttar Pradesh', '233001', '3', '', ''),
(4, '915844', 'pintu verma ', 'Male', '05071988', '12081992', '9415877888', 'shail5788@gmail.com', 'C31/312 Maa sarda Nagar Colony', 'Ghazipur', 'Uttar Pradesh', '233001', '3', '', ''),
(5, '967837', 'Ekta singh ', 'Female', '02071991', '060702013', '9615322654', 'Near Mertro Station ', 'B23/424 Lakshami Nagar ', 'Delhi ', 'Delhi ', '145124', '3', '', ''),
(6, '182974', 'ShashiShekhar Singh ', 'Male', '1970-01-01', '1970-01-01', '9415877888', 'shail5788@gmail.com', 'C31/312 Maa sarda Nagar Colony', 'Ghazipur', 'Uttar Pradesh', '233001', '2', '', ''),
(7, '878738', 'ShashiShekhar Singh ', 'Male', '1989-07-05', '2004-05-04', '7894561230', 'Mayur Vihar ', 'D34/56 ', 'Delhi East', 'Delhi ', '435432', '3', '', ''),
(8, '489273', 'Shailendra Verma ', 'Male', '1988-07-05', '2008-11-05', '8958478546', 'Sikhpur ', 'B 1A/312 ', 'Delhi South', 'Delhi ', '454621', '3', 'area-1', ''),
(9, '553625', 'abc', 'Male', '1988-07-05', '2008-03-05', '9415877888', 'Mayur Vihar ', 'D34/56 ', 'Delhi South', 'Delhi ', '233001', '5', '', ''),
(10, '298550', 'Rakesh Singh', 'Male', '1988-04-16', '2006-03-18', '9616454842', 'MukundNagar', 'A34/454', 'Rohini Delhi West ', 'Delhi ', '45782', '5', 'area-1', ''),
(11, '912054', 'Mukesh Singh', 'Male', '1998-07-05', '2016-05-11', '8933986569', 'Vill -Singoor Post -', 'D-34/234', 'Jaisalmer', 'Hariyana', '451236', '5', 'area-2', ''),
(12, '500781', 'Rakesh Singh', 'Male', '1986-07-17', '2014-08-20', '9616454842', 'Vill -Singoor Post -', 'A34/454', 'Delhi ', 'Uttar Pradesh', '232314', '5', 'Area-2', ''),
(13, '443927', 'shamsher SIngh ', 'Male', '1987-07-14', '2010-07-15', '9616454842', 'MukundNagar', 'A34/454', 'Delhi ', 'Delhi ', '232314', '5', 'area-2', ''),
(16, '768051', 'Pushpesh Verma ', 'Male', '1990-08-24', '2006-11-23', '9616474875', 'MukundNagar', 'A33/455', 'Lucknow', 'Uttar Pradesh', '232310', '6', '', 'Commercial'),
(17, '366253', 'Mithilesh Kumar ', 'Male', '1990-03-05', '2010-06-23', '8919874547', 'GoraBazar ', 'Rai Ganj ', 'Ghazipur ', 'Uttar Pradesh', '233001', '6', ' ', 'Domestic'),
(19, '178524', 'Jai', 'Male', '1989-06-06', '2006-07-04', '9656478540', 'Gomti Nagar', 'Lucknow ', ' Lucknow', 'Uttar Pradesh', '895647', '6', '', 'Domestic'),
(20, '230764', 'Rakesh Kumar Singh', 'Male', '1990-06-12', '2012-07-04', '9845623564', 'rakesh.singh@gmail.c', 'Jai Nagar', 'Varanasi', 'Uttar Pradesh', '220934', '2', '', ''),
(21, '805294', 'Brijesh Verma', 'Male', '1990-06-05', '2014-06-10', '9818477512', 'brijesh@gmail.com', '123/22 Phase -3 ', '', 'Hariyana', '123012', '6', '', 'Domestic'),
(22, '199124', 'BALA JI', 'Male', '1995-06-13', '2015-06-09', '9656478540', 'rakesh.singh@gmail.c', '123/22 Phase -3 ', 'MAGADI', 'KARNATAKA', '222210', '3', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employeephoto`
--

CREATE TABLE `employeephoto` (
  `id` int(4) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `emp_pic` varchar(100) NOT NULL,
  `pic_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeephoto1`
--

CREATE TABLE `employeephoto1` (
  `id` int(4) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `pic_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeephoto1`
--

INSERT INTO `employeephoto1` (`id`, `emp_id`, `pic_name`, `pic_path`) VALUES
(1, '625888', '625888.jpg', 'empphoto/625888.jpg'),
(2, '561480', '561480.jpg', 'empphoto/561480.jpg'),
(3, '624240', '624240.jpg', 'empphoto/624240.jpg'),
(4, '963442', '963442.jpg', 'empphoto/963442.jpg'),
(5, '915844', '915844.jpg', 'empphoto/915844.jpg'),
(6, '967837', '967837.jpg', 'empphoto/967837.jpg'),
(7, '182974', '182974.jpg', 'empphoto/182974.jpg'),
(8, '878738', '878738.jpg', 'empphoto/878738.jpg'),
(9, '489273', '489273.jpg', 'empphoto/489273.jpg'),
(10, '553625', '553625.jpg', 'empphoto/553625.jpg'),
(11, '298550', '298550.jpg', 'empphoto/298550.jpg'),
(12, '912054', '912054.jpg', 'empphoto/912054.jpg'),
(13, '500781', '500781.jpg', 'empphoto/500781.jpg'),
(14, '443927', '443927.jpg', 'empphoto/443927.jpg'),
(17, '768051', '768051.png', 'empphoto/768051.png'),
(18, '366253', '366253.png', 'empphoto/366253.png'),
(19, '498666', '498666.png', 'empphoto/498666.png'),
(20, '178524', '178524.png', 'empphoto/178524.png'),
(21, '230764', 'bill_no230764.jpg', 'empphoto/bill_no230764.jpg'),
(22, '805294', 'bill_no805294.jpg', 'empphoto/bill_no805294.jpg'),
(23, '199124', 'bill_no199124.jpg', 'empphoto/bill_no199124.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `extra_charge`
--

CREATE TABLE `extra_charge` (
  `id` int(11) NOT NULL,
  `sanitary` float NOT NULL,
  `meter_charge` float NOT NULL,
  `other_charge` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_charge`
--

INSERT INTO `extra_charge` (`id`, `sanitary`, `meter_charge`, `other_charge`) VALUES
(1, 5, 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` int(12) NOT NULL,
  `meter_id` varchar(15) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `install_date` varchar(15) NOT NULL,
  `initail_rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `meter_id`, `customer_id`, `install_date`, `initail_rating`) VALUES
(1, '110', '1234', '04/06/2016', '120'),
(2, '112', '2345', '05/06/2016', '121');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `login_type` varchar(20) NOT NULL,
  `emp_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`, `login_type`, `emp_id`) VALUES
('abc@777', '05-07-1988', '5', '553625'),
('atul123', 'atul', '2', ''),
('BALA@654', '13061995', '3', '199124'),
('Brijesh@942', '05061990', '6', '805294'),
('dipu123', 'dipu', '5', ''),
('Ekta@913', '02071991', '3', '967837'),
('Jai@181', '06061989', '6', '178524'),
('Mithilesh@913', '05031990', '6', '366253'),
('Mukesh@556', '05-07-1998', '5', '912054'),
('pintu@153', '05071988', '3', '915844'),
('Pushpesh@201', '24-08-1990', '6', '768051'),
('Rakesh@503', '12061990', '2', '230764'),
('Rakesh@635', '16-04-1988', '5', '298550'),
('Rakesh@924', '17-07-1986', '5', '500781'),
('sachin123', 'sachin', '3', ''),
('shail5788', '12345', '1', ''),
('Shailendra@274', '05-07-1988', '3', '489273'),
('Shailendra@884', '05071988', '3', ''),
('shamsher@661', '14-07-1987', '4', '443927'),
('ShashiShekhar@107', '05071989', '3', ''),
('ShashiShekhar@259', '05071989', '3', ''),
('ShashiShekhar@369', '05-07-1989', '3', '878738'),
('ShashiShekhar@412', '05071989', '2', '182974'),
('ShashiShekhar@624', '05071989', '3', ''),
('ShashiShekhar@793', '05071989', '3', ''),
('ShashiShekhar@987', '05071989', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE `meter` (
  `meter_id` varchar(15) NOT NULL,
  `meter_make` varchar(20) NOT NULL,
  `meter_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`meter_id`, `meter_make`, `meter_type`) VALUES
('110', 'samsung', 'Domestic'),
('112', 'LG', 'Domestic');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `email`) VALUES
(1, 'shail5788@gmail.com'),
(9, 'shailendra@atthah.com'),
(17, 'shail5788@gmail.com'),
(18, 'shail5788@gmail.com'),
(19, 'shail5788@gmail.com'),
(20, 'shailendra@atthah.com'),
(21, 'shailendra@atthah.com'),
(22, 'shail5788@gmail.com'),
(23, 'abc@abc.com'),
(24, 'rakesh.singh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `pic_name` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reading_pic`
--

CREATE TABLE `reading_pic` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `bill_id` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reading_pic`
--

INSERT INTO `reading_pic` (`id`, `customer_id`, `bill_id`, `month`, `year`, `image_path`) VALUES
(5, '516531439', '3220886', '03', '2017', 'meterPic/bill_no3220886.png'),
(11, '516531439', '8235595', '03', '2017', 'meterPic/bill_no8235595.png'),
(12, '516531439', '6196258', '03', '2017', 'meterPic/bill_no6196258.png'),
(13, '516531439', '5541473', '03', '2017', 'meterPic/bill_no5541473.png'),
(14, '516531439', '4841369', '03', '2017', 'meterPic/bill_no4841369.jpg'),
(15, '516531439', '1718505', '03', '2017', 'meterPic/bill_no1718505.jpg'),
(16, '516531439', '9588287', '03', '2017', 'meterPic/bill_no9588287.jpg'),
(17, '516531439', '9399597', '03', '2017', 'meterPic/bill_no9399597.png'),
(18, '516531439', '2380157', '03', '2017', 'meterPic/bill_no2380157.png'),
(19, '516531439', '7485504', '03', '2017', 'meterPic/bill_no7485504.png'),
(20, '516531439', '4023437', '03', '2017', 'meterPic/bill_no4023437.png'),
(21, '516531439', '5042419', '03', '2017', 'meterPic/bill_no5042419.png'),
(22, '516531439', '7043853', '03', '2017', 'meterPic/bill_no7043853.png'),
(23, '516531439', '7334716', '03', '2017', 'meterPic/bill_no7334716.jpg'),
(24, '516531439', '8533050', '03', '2017', 'meterPic/bill_no8533050.png'),
(25, '516531439', '6691741', '03', '2017', 'meterPic/bill_no6691741.jpg'),
(26, '516531439', '4833679', '03', '2017', 'meterPic/bill_no4833679.png'),
(27, '516531439', '2227172', '03', '2017', 'meterPic/bill_no2227172.png'),
(28, '516531439', '2016235', '03', '2017', 'meterPic/bill_no2016235.png'),
(29, '1131568181', '6686523', '03', '2017', 'meterPic/bill_no6686523.png'),
(30, '422663854', '3100585', '03', '2017', 'meterPic/bill_no3100585.png'),
(31, '516531439', '5651611', '03', '2017', 'meterPic/bill_no5651611.png'),
(32, '516531439', '4066284', '03', '2017', 'meterPic/bill_no4066284.png'),
(33, '516531439', '1791290', '03', '2017', 'meterPic/bill_no1791290.png'),
(34, '516531439', '8657470', '03', '2017', 'meterPic/bill_no8657470.png'),
(35, '516531439', '7245727', '03', '2017', 'meterPic/bill_no7245727.png');

-- --------------------------------------------------------

--
-- Table structure for table `serviceemployee`
--

CREATE TABLE `serviceemployee` (
  `semp_id` varchar(10) NOT NULL,
  `semp_name` varchar(40) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `doj` varchar(15) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pin` varchar(7) NOT NULL,
  `contactNo` varchar(12) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceemployee`
--

INSERT INTO `serviceemployee` (`semp_id`, `semp_name`, `dob`, `doj`, `address`, `city`, `state`, `pin`, `contactNo`, `area`) VALUES
('0985', 'Mukesh Singh ', '12/07/1981', '04/05/1996', 'B312 Block C Sec-63', 'Nodia ', 'Uttar Pradesh ', '123456', '7848754875', 'gurgaon sec 43 ');

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE `tariff` (
  `id` int(11) NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `consumption` int(11) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`id`, `ctype`, `consumption`, `price`) VALUES
(5, 'Domestic', 8, 7),
(6, 'Domestic', 15, 9),
(7, 'Domestic', 25, 11),
(8, 'Domestic', 26, 13),
(9, 'Commercial', 8, 28),
(10, 'Commercial', 15, 36),
(11, 'Commercial', 25, 44),
(12, 'Commercial', 26, 52),
(13, 'Non-Commercial ', 8, 14),
(14, 'Non-Commercial', 15, 18),
(15, 'Non-Commercial', 25, 26),
(16, 'Non-Commercial', 26, 28);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `C_name` varchar(30) NOT NULL,
  `C_mid_name` varchar(20) NOT NULL,
  `C_lname` varchar(30) NOT NULL,
  `customer_fullname` varchar(60) NOT NULL,
  `relation_type` varchar(20) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `no_of_family_m` varchar(20) NOT NULL,
  `adhar_no` varchar(20) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `address` varchar(80) NOT NULL,
  `location` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `landline_no` varchar(12) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `addressproof` varchar(40) NOT NULL,
  `idproof` varchar(50) NOT NULL,
  `meter_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `C_name`, `C_mid_name`, `C_lname`, `customer_fullname`, `relation_type`, `r_name`, `no_of_family_m`, `adhar_no`, `gender`, `address`, `location`, `city`, `state`, `landline_no`, `mobile`, `pin`, `addressproof`, `idproof`, `meter_id`) VALUES
(6, 'Abhinav ', 'Kumar ', 'Gupta ', 'Abhinav  Kumar  Gupta ', 'Father', 'Sitaram Gupta ', '5', '456764', 'Male', '    D23/432 Sahara Building Phase 1', 'Lucknow', 'Lucknow ', 'Uttar Pradesh', '05482225552', '8818454670', '221230', 'Bank Passbook', 'Passport', 798564),
(7, 'Dhanjay ', 'Kumar', 'Rai ', 'Dhanjay  Kumar Rai ', 'Father', 'Rishabh Kumar Rai ', '5', '8457896', 'Male', '   A 12/23  Block-C Empire Building', 'New Ashok Nagar ', 'Delhi ', 'Delhi ', '0478245256', '9918457475', '876901', 'Bank Passbook', 'Passport', 567890),
(8, 'Rajsh', 'Kumar ', 'Sriwastava', 'Rajsh Kumar  Sriwastava', 'Father', 'Harshit Kumar Sriwstava', '5', '75896590', 'Male', '    C 14/53  kabirpur near post office ', 'Noida Sec 66', 'Noida ', 'Uttar Pradesh', '05482223134', '4568971290', '897654', 'Bank Passbook', 'Passport', 857432);

-- --------------------------------------------------------

--
-- Table structure for table `temp1`
--

CREATE TABLE `temp1` (
  `emp_id` varchar(12) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `doj` varchar(30) NOT NULL,
  `contactNo` varchar(40) NOT NULL,
  `emailId` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `emp_type` varchar(10) NOT NULL,
  `assign_areapin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp2`
--

CREATE TABLE `temp2` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `pic_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_table`
--

CREATE TABLE `temp_table` (
  `customer_id` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `C_name` varchar(30) NOT NULL,
  `C_mid_name` varchar(20) NOT NULL,
  `C_lname` varchar(30) NOT NULL,
  `customer_fullname` varchar(60) NOT NULL,
  `relation_type` varchar(20) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `no_of_family_m` varchar(20) NOT NULL,
  `adhar_no` varchar(20) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `type_of_customer` varchar(255) NOT NULL,
  `address` varchar(80) NOT NULL,
  `location` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `landline_no` varchar(12) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `addressproof` varchar(40) NOT NULL,
  `idproof` varchar(50) NOT NULL,
  `meter_id` int(10) NOT NULL,
  `status` varchar(40) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_table`
--

INSERT INTO `temp_table` (`customer_id`, `id`, `C_name`, `C_mid_name`, `C_lname`, `customer_fullname`, `relation_type`, `r_name`, `no_of_family_m`, `adhar_no`, `gender`, `type_of_customer`, `address`, `location`, `city`, `state`, `landline_no`, `mobile`, `pin`, `addressproof`, `idproof`, `meter_id`, `status`, `flag`) VALUES
('516531439', 1, 'kavita ', '', 'Jain ', 'kavita   Jain ', 'Father', 'Shashi Jain ', '5', '451236', 'Female', '', '    C 14/55 Sahara Building ', 'New Ashok Nagar  Phase-5', 'Delhi ', '1', '0522454742', '9918457475', '897654', 'Bank Passbook', 'Ration Card', 746287, '0', 0),
('973106341', 4, 'Varun', '', 'Arora', 'Varun  Arora', 'Father', 'JaiKumar Arora', '5+', '5623145623', 'Male', 'Domestic', '1309 P Sector 44', 'M.Nagar', 'Gurgaon', 'Hariyana', '05482225552', '9645145214', '456567', 'Passport', 'Ration Card', 564231, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `billpay`
--
ALTER TABLE `billpay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complainasingnbook`
--
ALTER TABLE `complainasingnbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complainregister`
--
ALTER TABLE `complainregister`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `duepayment`
--
ALTER TABLE `duepayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeephoto1`
--
ALTER TABLE `employeephoto1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_charge`
--
ALTER TABLE `extra_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`,`password`);

--
-- Indexes for table `meter`
--
ALTER TABLE `meter`
  ADD PRIMARY KEY (`meter_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `reading_pic`
--
ALTER TABLE `reading_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceemployee`
--
ALTER TABLE `serviceemployee`
  ADD PRIMARY KEY (`semp_id`);

--
-- Indexes for table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_table`
--
ALTER TABLE `temp_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=966948;
--
-- AUTO_INCREMENT for table `billpay`
--
ALTER TABLE `billpay`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `complainasingnbook`
--
ALTER TABLE `complainasingnbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `duepayment`
--
ALTER TABLE `duepayment`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `employeephoto1`
--
ALTER TABLE `employeephoto1`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `extra_charge`
--
ALTER TABLE `extra_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reading_pic`
--
ALTER TABLE `reading_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tariff`
--
ALTER TABLE `tariff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `temp_table`
--
ALTER TABLE `temp_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
