-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 09:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluecollarinsight`
--

-- --------------------------------------------------------

--
-- Table structure for table `appliedjobs`
--

CREATE TABLE `appliedjobs` (
  `id` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `companyId` int(11) DEFAULT NULL,
  `applicationDate` datetime NOT NULL,
  `declined` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `bookmarkDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `employerId` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `taxNumber` int(10) NOT NULL,
  `companyDescription` text NOT NULL,
  `headQuarters` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `employeeCount` int(11) NOT NULL,
  `establishDate` date NOT NULL,
  `website` varchar(255) NOT NULL,
  `verified` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cvbuilder`
--

CREATE TABLE `cvbuilder` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `province` varchar(255) NOT NULL,
  `generalDescription` varchar(2000) NOT NULL,
  `totalExperience` int(11) NOT NULL,
  `expTitle` varchar(255) NOT NULL,
  `expCompany` varchar(255) NOT NULL,
  `expMonths` varchar(255) NOT NULL,
  `expDescription` varchar(2000) NOT NULL,
  `eduSchoolTitle` varchar(255) NOT NULL,
  `eduDepartment` varchar(255) NOT NULL,
  `eduYears` int(11) NOT NULL,
  `eduDescription` varchar(2000) NOT NULL,
  `additionalDescription` varchar(2000) NOT NULL,
  `userId` int(11) NOT NULL,
  `submittedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `sector`, `department`) VALUES
(1, 'Construction', 'Construction'),
(2, 'Automative', 'Maintenance'),
(3, 'Electrical', 'Electrical'),
(4, 'Logistics', 'Warehouse'),
(5, 'Landscaping', 'Groundskeeping'),
(6, 'HVAC', 'Technical'),
(7, 'Plumbing', 'Maintenance'),
(8, 'Industrial', 'Maintenance'),
(9, 'Manufacturing', 'Production');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(1) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `workType` varchar(20) NOT NULL,
  `educationLevel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `experience`, `workType`, `educationLevel`) VALUES
(1, 'Junior', 'Full Time', 'Elementary School'),
(2, 'Middle', 'Part Time', 'High School'),
(3, 'Senior', 'Seasonal', 'Undergraduate'),
(4, '', '', 'Graduate'),
(5, '', '', 'Masters Degree');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobDescription` varchar(5000) NOT NULL,
  `companyId` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `requestDate` datetime NOT NULL,
  `publishDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `sector` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `workType` varchar(255) NOT NULL,
  `educationLevel` varchar(255) NOT NULL,
  `languagePreference` varchar(255) NOT NULL,
  `verified` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jobTitle`, `jobDescription`, `companyId`, `companyName`, `province`, `requestDate`, `publishDate`, `endDate`, `sector`, `experience`, `department`, `workType`, `educationLevel`, `languagePreference`, `verified`) VALUES
(2, 'Construction Worker', 'The Construction Worker will be involved in various construction projects, responsible for tasks such as framing, drywall installation, and concrete work. This position requires physical endurance, attention to safety protocols, and the ability to work ef', 2, 'Atılım Uni.', 'İstanbul', '2024-04-19 01:33:07', '2024-04-19 01:33:07', '2024-04-28 00:00:00', 'Construction', 'Junior', 'Construction', 'Full Time', 'High School', 'Turkish,English,German', 0),
(3, 'Automotive Technician', 'Automotive Technicians are needed to perform diagnostics, repairs, and maintenance on various types of vehicles. The role involves troubleshooting mechanical issues, replacing faulty parts, and ensuring vehicles meet performance standards. Strong problem-', 2, 'Atılım Uni.', 'Gaziantep', '2024-04-19 01:44:47', '2024-04-19 01:44:47', '2024-04-29 00:00:00', 'Automative', 'Junior', 'Maintenance', 'Full Time', 'Graduate', 'Turkish,English', 0),
(4, 'Electrician', 'Seeking a skilled Electrician to handle installations, maintenance, and repair of electrical systems in residential and commercial settings. Candidates should be proficient in reading electrical schematics, using electrical testing equipment, and adhering', 2, 'Atılım Uni.', 'Antalya', '2024-04-19 01:53:08', '2024-04-19 01:53:08', '2024-04-30 00:00:00', 'Electrical', 'Middle', 'Electrical', 'Full Time', 'Undergraduate', 'Turkish,French', 0),
(5, 'Warehouse Associate', 'Warehouse Associates are crucial for managing inventory, organizing storage areas, and preparing orders for shipment. The position requires physical strength for lifting and moving stock, as well as attention to detail for tracking inventory. Experience i', 2, 'Atılım Uni.', 'Kahramanmaraş', '2024-04-19 01:54:07', '2024-04-19 01:54:07', '2024-04-22 00:00:00', 'Logistics', 'Junior', 'Warehouse', 'Part Time', 'High School', 'Turkish', 0),
(6, 'HVAC Technician', 'HVAC Technicians will install, inspect, and repair heating, ventilation, and air conditioning systems. The job requires understanding of HVAC operations, the ability to troubleshoot and fix equipment, and excellent customer service skills. Prior experienc', 2, 'Atılım Uni.', 'Ankara', '2024-04-19 01:56:39', '2024-04-19 01:56:39', '2024-04-30 00:00:00', 'HVAC', 'Senior', 'Technical', 'Seasonal', 'Graduate', 'Turkish,English,Russian', 0),
(7, 'Machine Operator', 'Machine Operators are required for operating and maintaining various types of machinery used in manufacturing. Responsibilities include setting up machines, running production cycles, and performing routine maintenance. The ability to follow safety proced', 2, 'Atılım Uni.', 'İzmir', '2024-04-19 02:00:49', '2024-04-19 02:00:49', '2024-04-28 00:00:00', 'Manufacturing', 'Middle', 'Production', 'Full Time', 'High School', 'Turkish', 0),
(8, 'Plumber', 'Plumbers are needed to install, repair, and maintain plumbing systems in residential and commercial properties. Tasks include fixing leaks, unclogging drains, and installing fixtures. Applicants should have knowledge of plumbing codes and experience in bo', 2, 'Atılım Uni.', 'Adana', '2024-04-19 02:05:03', '2024-04-19 02:05:03', '2024-04-26 00:00:00', 'Plumbing', 'Junior', 'Maintenance', 'Seasonal', 'Undergraduate', 'Turkish,English', 0),
(9, 'Carpenter', 'Carpenters will construct and repair building frameworks and structures such as stairways, doorframes, partitions, and rafters. The job involves measuring, cutting, and assembling materials made of wood and other components. Familiarity with power tools a', 2, 'Atılım Uni.', 'İstanbul', '2024-04-19 02:07:24', '2024-04-19 02:07:24', '2024-04-27 00:00:00', 'Construction', 'Senior', 'Construction', 'Full Time', 'High School', 'Turkish', 0),
(10, 'Industrial Painter', 'The Industrial Painter will apply paint, varnishes, and coatings to various types of surfaces in an industrial setting. Responsibilities include preparing surfaces, mixing paints, and applying coatings uniformly. Knowledge of different painting techniques', 2, 'Atılım Uni.', 'Ankara', '2024-04-19 02:09:07', '2024-04-19 02:09:07', '2024-04-30 00:00:00', 'Industrial', 'Middle', 'Maintenance', 'Full Time', 'Graduate', 'Turkish,English,Arabic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province`) VALUES
('Adana'),
('Adıyaman'),
('Afyonkarahisar'),
('Ağrı'),
('Aksaray'),
('Amasya'),
('Ankara'),
('Antalya'),
('Ardahan'),
('Artvin'),
('Aydın'),
('Balıkesir'),
('Bartın'),
('Batman'),
('Bayburt'),
('Bilecik'),
('Bingöl'),
('Bitlis'),
('Bolu'),
('Burdur'),
('Bursa'),
('Çanakkale'),
('Çankırı'),
('Çorum'),
('Denizli'),
('Diyarbakır'),
('Düzce'),
('Edirne'),
('Elazığ'),
('Erzincan'),
('Erzurum'),
('Eskişehir'),
('Gaziantep'),
('Giresun'),
('Gümüşhane'),
('Hakkari'),
('Hatay'),
('Iğdır'),
('Isparta'),
('İstanbul'),
('İzmir'),
('Kahramanmaraş'),
('Karabük'),
('Karaman'),
('Kars'),
('Kastamonu'),
('Kayseri'),
('Kilis'),
('Kırıkkale'),
('Kırklareli'),
('Kırşehir'),
('Kocaeli'),
('Konya'),
('Kütahya'),
('Malatya'),
('Manisa'),
('Mardin'),
('Mersin'),
('Muğla'),
('Muş'),
('Nevşehir'),
('Niğde'),
('Ordu'),
('Osmaniye'),
('Rize'),
('Sakarya'),
('Samsun'),
('Şanlıurfa'),
('Siirt'),
('Sinop'),
('Şırnak'),
('Sivas'),
('Tekirdağ'),
('Tokat'),
('Trabzon'),
('Tunceli'),
('Uşak'),
('Van'),
('Yalova'),
('Yozgat'),
('Zonguldak');

-- --------------------------------------------------------

--
-- Table structure for table `pwreset`
--

CREATE TABLE `pwreset` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verificated` int(11) DEFAULT NULL,
  `verificationCode` int(6) NOT NULL,
  `requestDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `sector` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `sector`) VALUES
(1, 'Construction'),
(2, 'Automative'),
(3, 'Electrical'),
(4, 'Logistics'),
(5, 'Landscaping'),
(6, 'HVAC'),
(7, 'Manufacturing'),
(8, 'Plumbing'),
(9, 'Industrial');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(1) DEFAULT NULL,
  `user` int(1) DEFAULT NULL,
  `employer` int(1) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  `verificated` int(1) DEFAULT NULL,
  `verificationCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cvbuilder`
--
ALTER TABLE `cvbuilder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwreset`
--
ALTER TABLE `pwreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cvbuilder`
--
ALTER TABLE `cvbuilder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pwreset`
--
ALTER TABLE `pwreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
