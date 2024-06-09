-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 08:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `jobId`, `employeeId`, `bookmarkDate`) VALUES
(1, 1, 3, '2024-06-02 20:40:21');

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

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `employerId`, `companyName`, `taxNumber`, `companyDescription`, `headQuarters`, `sector`, `employeeCount`, `establishDate`, `website`, `verified`) VALUES
(1, 2, 'Atilim Limited Company', 2147483647, 'Atilim Limited Company is a prominent leader in the logistics industry, specializing in providing comprehensive and efficient logistics solutions to businesses worldwide. With a focus on leveraging advanced technology and industry expertise, we offer a wide range of services tailored to meet the diverse needs of our clients, including warehousing, transportation, distribution, and supply chain management.\n\nAt Atilim Limited Company, we understand the critical role that logistics play in the success of businesses, and we are committed to delivering reliable, cost-effective, and innovative solutions that streamline operations and drive growth. Our dedicated team of logistics professionals works tirelessly to optimize processes, reduce costs, and enhance efficiency, ensuring seamless coordination and timely delivery of goods across the supply chain.\n\nWith a customer-centric approach and a relentless pursuit of excellence, Atilim Limited Company is your trusted partner for all your logistics needs. Whether you\'re a small business or a multinational corporation, you can rely on us to provide tailored solutions that propel your business forward and help you stay ahead in today\'s competitive market.', 'Ankara', 'Logistics', 36, '2024-05-15', 'www.atilimsan.com', 1),
(2, 4, 'Test Limited Company', 2147483647, 'Lorem ipsum dolor sit amet.', 'İstanbul', 'Manufacturing', 45, '2003-05-05', 'testlimited.com', 1);

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

--
-- Dumping data for table `cvbuilder`
--

INSERT INTO `cvbuilder` (`id`, `fullName`, `emailAddress`, `phoneNumber`, `province`, `generalDescription`, `totalExperience`, `expTitle`, `expCompany`, `expMonths`, `expDescription`, `eduSchoolTitle`, `eduDepartment`, `eduYears`, `eduDescription`, `additionalDescription`, `userId`, `submittedAt`) VALUES
(1, 'John Doe', 'deneme@deneme.com', '5365905504', '', 'I am a highly motivated and detail-oriented individual with a passion for learning and growth. With a strong background in customer service and problem-solving, I am adept at working in fast-paced environments while maintaining a positive attitude. I thrive in collaborative settings and am always eager to take on new challenges.', 2, 'Sales Associate, Marketing Intern', 'XYZ Corporation, ABC Company', '12, 17', 'Responsible for providing exceptional customer service, managing inventory, and achieving sales targets. Collaborated with cross-functional teams to optimize store operations and enhance the overall customer experience., Assisted the marketing team in developing and implementing social media campaigns. Conducted market research and analysis to identify trends and opportunities for growth. Created engaging content for various digital platforms.', 'Test Uni', 'Test', 4, 'Lorem ipsum dolor sit amet', 'I am proficient in Microsoft Office Suite and have strong communication skills, both written and verbal. I am a quick learner and thrive in dynamic environments where I can utilize my creativity and problem-solving abilities to drive results.', 3, '2024-06-02 19:18:46');

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
(1, 'Automotive Technician', 'Automotive Technicians are needed to perform diagnostics, repairs, and maintenance on various types of vehicles. The role involves troubleshooting mechanical issues, replacing faulty parts, and ensuring vehicles meet performance standards. Strong problem-solving skills and hands-on experience in automotive repair are required.', 2, 'Atilim Limited Company', 'Ankara', '2024-05-19 23:24:36', '2024-05-19 23:24:36', '2024-05-26 00:00:00', 'Automative', 'Senior', 'Maintenance', 'Seasonal', 'Graduate', 'Turkish,English', 0),
(2, 'Electrician', 'Seeking a skilled Electrician to handle installations, maintenance, and repair of electrical systems in residential and commercial settings. Candidates should be proficient in reading electrical schematics, using electrical testing equipment, and adhering to safety regulations. Certification as an electrician is mandatory.', 2, 'Atilim Limited Company', 'Adana', '2024-05-19 23:28:19', '2024-05-19 23:28:19', '2024-05-30 00:00:00', 'Electrical', 'Middle', 'Construction', 'Part Time', 'Undergraduate', 'Turkish,English', 0),
(3, 'Landscaper', 'The Landscaper will engage in designing, implementing, and maintaining outdoor spaces. This includes planting, mulching, sod installation, and routine groundskeeping. Creativity in landscape design and practical skills in operating landscaping equipment are important.', 2, 'Atilim Limited Company', 'Konya', '2024-05-19 23:29:22', '2024-05-19 23:29:22', '2024-06-06 00:00:00', 'Landscaping', 'Middle', 'Groundskeeping', 'Full Time', 'High School', 'Turkish,English', 0),
(4, 'Construction Worker', 'The Construction Worker will be involved in various construction projects, responsible for tasks such as framing, drywall installation, and concrete work. This position requires physical endurance, attention to safety protocols, and the ability to work effectively in a team. Previous experience in construction sites is highly valued.', 4, 'Test Limited Company', 'Adana', '2024-06-02 17:44:35', '2024-06-02 17:44:35', '2024-06-23 00:00:00', 'Construction', 'Junior', 'Construction', 'Full Time', 'High School', 'Turkish,English', 0),
(5, 'Warehouse Associate', 'Warehouse Associates are crucial for managing inventory, organizing storage areas, and preparing orders for shipment. The position requires physical strength for lifting and moving stock, as well as attention to detail for tracking inventory. Experience in warehouse operations is preferred.', 4, 'Test Limited Company', 'Bursa', '2024-06-02 17:45:45', '2024-06-02 17:45:45', '2024-06-28 00:00:00', 'Logistics', 'Middle', 'Warehouse', 'Seasonal', 'Undergraduate', 'Turkish,English', 0),
(6, 'HVAC Technician', 'HVAC Technicians will install, inspect, and repair heating, ventilation, and air conditioning systems. The job requires understanding of HVAC operations, the ability to troubleshoot and fix equipment, and excellent customer service skills. Prior experience and certification in HVAC technology are required.', 4, 'Test Limited Company', 'Denizli', '2024-06-02 17:46:52', '2024-06-02 17:46:52', '2024-07-01 00:00:00', 'HVAC', 'Senior', 'Technical', 'Full Time', 'Graduate', 'Turkish,English', 0);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `phoneNumber`, `password`, `active`, `user`, `employer`, `admin`, `verificated`, `verificationCode`) VALUES
(1, 'Admin', 'admin@gmail.com', '5365905504', '33a485cb146e1153c69b588c671ab474f2e5b800', 1, NULL, NULL, 1, 1, '263451'),
(2, 'Ahmet Şentürk', 'havocdeck1@gmail.com', '5365905504', '33a485cb146e1153c69b588c671ab474f2e5b800', 1, NULL, 1, NULL, 1, '453946'),
(3, 'Berk Kaya', 'yunusemredilek06@gmail.com', '5365905504', '33a485cb146e1153c69b588c671ab474f2e5b800', 1, 1, NULL, NULL, 1, '530658'),
(4, 'Ahmet Senturk', 'deneme@deneme.com', '5365905504', '33a485cb146e1153c69b588c671ab474f2e5b800', 1, NULL, 1, NULL, 1, '866520');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cvbuilder`
--
ALTER TABLE `cvbuilder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
