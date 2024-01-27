-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 12:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ait_tester`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` varchar(10) NOT NULL,
  `nameAlumni` varchar(30) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `provinsiId` int(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `telp` int(13) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `nameAlumni`, `title`, `photo`, `gender`, `birthday`, `provinsiId`, `address`, `telp`, `email`, `date`) VALUES
('0876567734', 'Iqbal Nur Kholish', 'Mr.', '', '', '2002-05-17', 74, '', 2147483647, 'iqbalchocs15@gmail.com', '2024-01-15 08:16:20'),
('10120794', 'Margono M. Amir', 'Dr.', '19750068.jpg', NULL, '2023-12-03', 18, 'sacacacacacacacaa', 123465798, 'tester@gmail.com', '2024-01-06 09:51:54'),
('1234567', 'Idul Bilal Husen', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'iqbalnurkholis24@gmail.com', '2024-01-13 13:16:32'),
('20140657', 'Ariyaningsih', 'Miss', '', 'Female', NULL, 11, NULL, NULL, 'alumni@gmail.com', '2024-01-08 10:39:20'),
('20190194', 'Sujianto', 'Mr.', '', 'Male', NULL, 14, 'address', 123456798, 'alumni@gmail.com', '2024-01-08 10:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id` int(5) NOT NULL,
  `degree` varchar(81) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `degree`) VALUES
(1, 'Bachelor of Science in Engineering'),
(2, 'Bachelor of Science'),
(3, 'Doctor of Engineering'),
(4, 'Doctor of Technical Science'),
(5, 'Doctor of Business Administration'),
(6, 'Diploma'),
(7, 'Master of Engineering'),
(8, 'Professional Master of Engineer'),
(9, 'Master of Engineering (Professional)'),
(10, 'Master of Science'),
(11, 'Master of Science (Professional)'),
(12, 'Master of Agribusiness Management'),
(13, 'Master of Business Administration'),
(14, 'MBA - Dual Degree'),
(15, 'Master of Business Administration (Executive)'),
(16, 'Master of Business Administration (Energy Business Management)'),
(17, 'Masters in Business Analytics and Digital Transformation'),
(18, 'Master in Climate Change and Sustainable Development'),
(19, 'Master in Construction, Engineering and Infrastructure Management'),
(20, 'Master in Development and Sustainability'),
(21, 'Master in Environmental Engineering and Management'),
(22, 'Master in Gender and Development Studies'),
(23, 'Master in Geotechnical and Earth Resources Engineering'),
(24, 'Masters in International Finance'),
(25, 'Master in Information Management'),
(26, 'Master in Internet of Things (IoT) Systems Engineering'),
(27, 'Master in Marine Plastics Abatement'),
(28, 'Master of Science in Business Analytics and Digital Transformation               '),
(29, 'Master in Sustainable Energy Transition                                         '),
(30, 'Master of Science in International Finance                                      '),
(31, 'Master in Structural Engineering                                                '),
(32, 'Master in Urban Sustainability Planning and Design                              '),
(33, 'Master in Water Engineering and Management                                      '),
(34, 'Professional Master in Technology Management                                    '),
(35, 'Doctor of Philosophy                                                            '),
(36, 'Professional Master in Structural Design of Tall Buildings                      '),
(37, 'Professional Master in Business Analytics and Digital Transformation            '),
(38, 'Professional Master in Banking and Finance                                      '),
(39, 'Professional Master in Corporate Social Responsibility                          '),
(40, 'Professional Master in Data Science and Artificial Intelligence Applications    '),
(41, 'Professional Master in Energy Business Management                               '),
(42, 'Professional Master in Finance, Banking and Information Management              '),
(43, 'Professional Master in Urban Management                                         '),
(44, 'Yunus Professional Master in Social Business and Entrepreneurship               ');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(5) NOT NULL,
  `ImageEvent` varchar(30) NOT NULL,
  `TitleEvent` varchar(30) NOT NULL,
  `shortDescription` text NOT NULL,
  `Description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `ImageEvent`, `TitleEvent`, `shortDescription`, `Description`, `date`) VALUES
(1, 'GBM Welcome Delegates.jpeg', 'Welcome Delegates', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh dui, placerat eget commodo eu, pretium sed massa. Sed luctus eros et lorem tincidunt lacinia. Nulla urna augue, interdum sit amet ante a, condimentum accumsan lacus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nibh dui, placerat eget commodo eu, pretium sed massa. Sed luctus eros et lorem tincidunt lacinia. Nulla urna augue, interdum sit amet ante a, condimentum accumsan lacus. Fusce et ullamcorper turpis, nec maximus massa. Nunc semper, odio ut sagittis lobortis, nibh nulla auctor odio, nec interdum dui quam sagittis metus. Aenean vitae est augue. Proin quis nisi at leo lobortis ultrices. Nullam ut justo nec arcu lobortis semper ac sed nisi.\r\n\r\nSuspendisse non tristique massa. Nunc id turpis nec felis elementum tempus id eget neque. Donec congue libero diam. Vivamus vitae pellentesque lorem. Etiam vitae tellus augue. Morbi imperdiet nulla vitae tincidunt tincidunt. Nullam vestibulum auctor mi, at interdum arcu placerat sed. Etiam tempor in nisi et volutpat.\r\n\r\nNullam maximus rhoncus magna, sed iaculis magna volutpat a. Duis pellentesque, neque ut ultrices facilisis, elit elit egestas est, at pretium tellus sapien at eros. Phasellus maximus enim risus, vel scelerisque elit pretium ut. Aenean pharetra vel mauris id tristique. Pellentesque eget tincidunt risus. Vestibulum pellentesque, est non tincidunt rhoncus, eros tortor rutrum urna, et tincidunt tellus tortor et metus. Proin nec suscipit enim. Morbi eget dolor et massa volutpat facilisis non ut nisl. Suspendisse lacus tortor, ornare at dapibus vitae, dictum vitae leo.', '2018-11-04'),
(5, 'event1705305168.png', 'NYOBA DIKIT', 'Cras fermentum tellus et dapibus commodo. Mauris auctor finibus diam, sit amet viverra felis lobortis nec. Pellentesque auctor ligula eget ultricies dapibus. Maecenas id urna elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam congue diam non enim maximus, placerat rhoncus orci mattis. Duis dignissim porta consequat. Sed nec diam sem. Fusce fermentum dolor nunc, et maximus arcu porta sed. Ut feugiat purus non risus imperdiet, et condimentum lectus maximus. Sed ac ex vitae nibh luctus semper non eget diam. Donec consectetur lobortis massa a vulputate. Vivamus finibus porttitor nulla, at commodo ex congue nec. Donec vitae posuere turpis, quis vestibulum nulla. Aenean blandit lorem non fringilla maximus. Suspendisse odio lorem, sollicitudin non lacinia sit amet, auctor eu neque. Phasellus ex lacus, venenatis at ipsum nec, efficitur luctus libero. Nulla ultrices neque ex, in cursus nisl porttitor id.</p>\r\n\r\n<p>Vivamus lobortis lacus at eros efficitur tincidunt. Morbi in hendrerit felis, sed egestas augue. In auctor malesuada est, a dictum turpis eleifend eu. Cras fermentum tellus et dapibus commodo. Mauris auctor finibus diam, sit amet viverra felis lobortis nec. Pellentesque auctor ligula eget ultricies dapibus. Maecenas id urna elit.</p>\r\n\r\n<p>Integer ullamcorper purus eget nunc lacinia, eu auctor lectus ullamcorper. Phasellus in ligula sit amet nisi blandit dapibus nec sit amet leo. Donec eget consectetur libero, eget fringilla diam. Maecenas nunc nisi, dapibus et interdum sit amet, pretium in libero. Ut hendrerit vehicula erat vestibulum gravida. Duis euismod purus mi, quis consequat ante vehicula et. Mauris volutpat commodo ipsum, non lacinia tellus aliquet sit amet. Donec lectus nulla, aliquet at faucibus quis, sagittis id magna. Nulla semper, tortor id varius dictum, mauris tortor molestie ex, quis condimentum sapien diam ac leo.</p>\r\n', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `fieldofstudy`
--

CREATE TABLE `fieldofstudy` (
  `id` int(5) NOT NULL,
  `FieldOfStudy` varchar(82) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fieldofstudy`
--

INSERT INTO `fieldofstudy` (`id`, `FieldOfStudy`) VALUES
(1, 'AgriBusiness Management-ED80'),
(2, 'Agricultural and Food Engineering-AFE1'),
(3, 'Agricultural Engineering-ED52'),
(4, 'Agricultural Engineering-ED25'),
(5, 'Agricultural Machinery and Management-ED02'),
(6, 'Agricultural Systems-ED05'),
(7, 'Agricultural Systems & Engineering-ED70'),
(8, 'AIT-SAV Non-resident doctoral-SM93'),
(9, 'Aquaculture-ED04'),
(10, 'Aquaculture and Aquatic Resource Management-ED71'),
(11, 'Banking and Finance-SM82'),
(12, 'Bio-Nano Material Science and Engineering-AT84'),
(13, 'Bioprocess Technology-ED15'),
(14, 'Biosystems Engineering-UG30'),
(15, 'Business Administration-SM80'),
(16, 'Business Administration - DBA-SM85'),
(17, 'Business Administration - MBA-SM87'),
(18, 'Business Analytics and Digital Transformation-SM95'),
(19, 'Business Analytics and Digital Transformation-SM89'),
(20, 'Civil and Infrastructure Engineering-UG25'),
(21, 'Civil Engineering-CE75'),
(22, 'Climate Change for Sustainable Development-ED82'),
(23, 'Computer Science-UG26'),
(24, 'Computer Science-AT02'),
(25, 'Computer Science-AT70'),
(26, 'Construction Engineering and Infrastructure Management-CE70 '),
(27, 'Construction Engineering and Management-CE02 '),
(28, 'Corporate Social Responsibility-SM83 '),
(29, 'Data Science and Artificial Intelligence-AT82 '),
(30, 'Design and Manufacturing Engineering-AT73 '),
(31, 'Development and Sustainability-ED84 '),
(32, 'Development Planning Management and Innovation-ED93 '),
(33, 'Disaster Preparedness, Mitigation and Management-I184 '),
(34, 'Disaster Preparedness, Mitigation and Management-IN84 '),
(35, 'Electric Power System Management-ED14 '),
(36, 'Electronics Engineering-UG21'),
(37, 'Energy-ED72 '),
(38, 'Energy-ED22 '),
(39, 'Energy and Environment-ED81 '),
(40, 'Energy Business Management-I280 '),
(41, 'Energy Planning and Policy-ED07 '),
(42, 'Energy Technology-ED06 '),
(43, 'Engineering Geology and Applied Geophysics-CE03 '),
(44, 'Environmental Engineering-UG31'),
(45, 'Environmental Engineering & Management-ED24 '),
(46, 'Environmental Engineering and Management-ED78 '),
(47, 'Environmental Remote Sensing & Geoinfo. for Development-ED13 '),
(48, 'Environmental Technology and Management-ED09 '),
(49, 'Environmental Toxicology Technology & Management-ED19 '),
(50, 'Finance, Banking and Information Management-SM84 '),
(51, 'Food Engineering and Bioprocess Technology-ED73 '),
(52, 'Food Innovation, Nutrition and Health-ED87 '),
(53, 'Gender and Development Studies-ED75 '),
(54, 'Gender and Development Studies-ED50 '),
(55, 'Gender, Transportation and Development-IN86 '),
(56, 'Geotechnical and Geoenvironmental Engineering-CE71 '),
(57, 'Geotechnical and Transportation Engineering-GTE1 '),
(58, 'Human Resources Management-SM92 '),
(59, 'Human Resources Management-SM05 '),
(60, 'Human Settlements Development-ED98 '),
(61, 'Industrial and Manufacturing Engineering-AT78 '),
(62, 'Industrial Engineering-UG27 '),
(63, 'Industrial Engineering-AT33 '),
(64, 'Industrial Engineering-AT03 '),
(65, 'Industrial Engineering & Management-AT72 '),
(66, 'Information & Communication Technology-UG22 '),
(67, 'Information & Communications Technologies-AT80 '),
(68, 'Information Management-AT71 '),
(69, 'Information Management-AT06 '),
(70, 'Infrastructure Planning & Management-CE10 '),
(71, 'Integrated Water Resources Management-CE12 '),
(72, 'International Business-SM03 '),
(73, 'International Business-SM71 '),
(74, 'International Business - Management of Technology-SM90 '),
(75, 'International Business - Management of Technology-SM91 '),
(76, 'International Executive MBA Program-SM04 '),
(77, 'International Finance-SM88 '),
(78, 'International Public Management-SM73 '),
(79, 'Internet of ThingsSystems Engineering-AT83 '),
(80, 'Irrigation Engineering and Management-CE04 '),
(81, 'Management-SM62'),
(82, 'Management - PhD-SM81 '),
(83, 'Management of Technology-SM70 '),
(84, 'Management of Technology-SM02 '),
(85, 'Manufacturing Systems Engineering-AT04 '),
(86, 'Manufacturing Systems Engineering-AT44 '),
(87, 'Marine Plastic Abatement-ED89 '),
(88, 'Mechatronics-AT07 '),
(89, 'Mechatronics-AT74 '),
(90, 'Mechatronics Engineering-UG23 '),
(91, 'Microelectronics-AT75 '),
(92, 'Microelectronics-AT08 '),
(93, 'Microelectronics and Embedded Systems-AT81 '),
(94, 'Nanotechnology-AT79 '),
(95, 'Natural Resources Management-ED76 '),
(96, 'Offshore Technology and Management-CE81 '),
(97, 'Paper and Board Technology-ED17 '),
(98, 'Post-Harvest and Food Process Engineering-ED03 '),
(99, 'Professional Master in Data Science and Artificial Intelligence Applications-AT85 '),
(100, 'Pulp and Paper Technology-ED74 '),
(101, 'Regional and Rural Development Planning-ED77 '),
(102, 'Regional and Rural Development Planning-ED11 '),
(103, 'Regional Development Planning and Management - spring-ED40 '),
(104, 'Remote Sensing & Geographic Information Systems -AT09 '),
(105, 'Remote Sensing and Geographic Information Systems-AT76 '),
(106, 'Resources Planning and Management-ED12 '),
(107, 'Riverine and Coastal Engineering-CE05 '),
(108, 'Rural and Regional Development Planning - Spring -ED16 '),
(109, 'Service Marketing and Technology-SM72 '),
(110, 'Social Business and Entrepreneurship-I282 '),
(111, 'Soil Engineering-CE06 '),
(112, 'Structural Engineering-CE07 '),
(113, 'Structural Engineering-CE72 '),
(114, 'Sustainable Energy Transition-ED86 '),
(115, 'Systems Engineering & Management-SEM'),
(116, 'Telecommunication -AT05 '),
(117, 'Telecommunications-AT77 '),
(118, 'Telecommunications-UG24 '),
(119, 'Transportation Engineering-CE73 '),
(120, 'Transportation Engineering-CE08 '),
(121, 'Urban Development Planning and Environment Management-ED10 '),
(122, 'Urban Environmental Management-ED18 '),
(123, 'Urban Environmental Management-ED79 '),
(124, 'Urban Innovation and Sustainability-ED92 '),
(125, 'Urban Management-ED83 '),
(126, 'Urban Planning-ED99 '),
(127, 'Urban Sustainability Planning and Design-ED91 '),
(128, 'Urban Water Engineering and Management-I187 '),
(129, 'Water and Wastewater Engineering-ED08 '),
(130, 'Water Engineering and Management-CE74 '),
(131, 'Water Resource Engineering-WRE'),
(132, 'Water Resources Development -CE09 '),
(133, 'Water Supply, Drainage & Sewerage Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `graduation`
--

CREATE TABLE `graduation` (
  `id` int(5) NOT NULL,
  `alumniId` varchar(10) NOT NULL,
  `schoolId` int(5) DEFAULT NULL,
  `programId` int(5) DEFAULT NULL,
  `degreeId` int(5) NOT NULL,
  `year` int(4) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graduation`
--

INSERT INTO `graduation` (`id`, `alumniId`, `schoolId`, `programId`, `degreeId`, `year`, `month`, `date`) VALUES
(15, '10120794', 11, 24, 2, 2001, 7, '2024-01-07 15:26:26'),
(16, '20190194', 6, 1, 12, 2019, 5, '2024-01-02 23:54:19'),
(22, '10120794', 10, 23, 10, 2006, 8, '2024-01-07 15:26:26'),
(36, '20190194', 3, 4, 6, 2000, 9, '2024-01-07 13:37:47'),
(51, '0876567734', 7, 25, 31, 2005, 9, '2024-01-15 08:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(5) NOT NULL,
  `eventId` int(5) NOT NULL,
  `alumniId` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `eventId`, `alumniId`, `date`) VALUES
(3, 1, '20190194', '2024-01-08 09:16:28'),
(5, 5, '20140657', '2024-01-08 09:43:41'),
(6, 1, '10120794', '2024-01-08 10:12:39'),
(7, 5, '10120794', '2024-01-08 10:13:55'),
(8, 5, '20190194', '2024-01-14 16:07:55'),
(9, 1, '1234567', '2024-01-14 16:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `roleName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(5) NOT NULL,
  `School` varchar(89) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `School`) VALUES
(1, 'Area of Study (Institute-Level)'),
(2, 'School of Environment, Resources and Development and School of Engineering and Technology'),
(3, 'Interdisciplinary Program'),
(4, 'School of Advanced Technologies'),
(5, 'School of Civil Engineering'),
(6, 'School of Environment, Resources and Development'),
(7, 'School of Environment, Resources and Development & School of Engineering and Technology'),
(8, 'School of Environment, Resources and Development & School of Engineering and Technology'),
(9, 'School of Environment, Resources and Development and School of Management'),
(10, 'School of Engineering and Technology'),
(11, 'School of Management');

-- --------------------------------------------------------

--
-- Table structure for table `t_provinsi`
--

CREATE TABLE `t_provinsi` (
  `id` int(5) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_provinsi`
--

INSERT INTO `t_provinsi` (`id`, `nama`) VALUES
(11, 'Aceh'),
(12, 'Sumatera Utara'),
(13, 'Sumatera Barat'),
(14, 'Riau'),
(15, 'Jambi'),
(16, 'Sumatera Selatan'),
(17, 'Bengkulu'),
(18, 'Lampung'),
(19, 'Kepulauan Bangka Belitung'),
(21, 'Kepulauan Riau'),
(31, 'DKI Jakarta'),
(32, 'Jawa barat'),
(33, 'Jawa Tengah'),
(34, 'DI Yogyakarta'),
(35, 'Jawa Timur'),
(36, 'Banten'),
(51, 'Bali'),
(52, 'Nusa Tenggara Barat'),
(53, 'Nusa Tenggara Timur'),
(61, 'Kalimantan Barat'),
(62, 'Kalimantan Tengah'),
(63, 'Kalimantan Selatan'),
(64, 'Kalimantan Timur'),
(65, 'Kalimantan Utara'),
(71, 'SULAWESI UTARA'),
(72, 'Sulawesi Tengah'),
(73, 'Sulawesi Selatan'),
(74, 'Sulawesi Tenggara'),
(75, 'Gorontalo'),
(76, 'Sulawesi Barat'),
(81, 'Maluku'),
(82, 'Maluku Utara'),
(91, 'Papua'),
(92, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `alumniId` varchar(10) NOT NULL,
  `roleId` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `alumniId`, `roleId`, `username`, `password`, `status`, `date`) VALUES
(22, '10120794', 1, 'tester1', '12345', 'Active', '2024-01-07 06:16:06'),
(23, '20190194', 2, 'sujianto', '12345', 'Active', '2024-01-07 13:30:19'),
(40, '0876567734', 2, 'tugasindividuy', '12345', 'Active', '2024-01-15 08:14:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsiId` (`provinsiId`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fieldofstudy`
--
ALTER TABLE `fieldofstudy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graduation`
--
ALTER TABLE `graduation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAlumni` (`alumniId`),
  ADD KEY `schoolId` (`schoolId`),
  ADD KEY `programId` (`programId`),
  ADD KEY `degreeId` (`degreeId`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventId` (`eventId`),
  ADD KEY `alumniId` (`alumniId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_provinsi`
--
ALTER TABLE `t_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumniId` (`alumniId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `roleId` (`roleId`),
  ADD KEY `Alumni` (`alumniId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fieldofstudy`
--
ALTER TABLE `fieldofstudy`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `graduation`
--
ALTER TABLE `graduation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
  ADD CONSTRAINT `provinsi_id` FOREIGN KEY (`provinsiId`) REFERENCES `t_provinsi` (`id`);

--
-- Constraints for table `graduation`
--
ALTER TABLE `graduation`
  ADD CONSTRAINT `Idalumni` FOREIGN KEY (`alumniId`) REFERENCES `alumni` (`id`),
  ADD CONSTRAINT `degreeId` FOREIGN KEY (`degreeId`) REFERENCES `degree` (`id`),
  ADD CONSTRAINT `programId` FOREIGN KEY (`programId`) REFERENCES `fieldofstudy` (`id`),
  ADD CONSTRAINT `schoolId` FOREIGN KEY (`schoolId`) REFERENCES `school` (`id`);

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `alumniId` FOREIGN KEY (`alumniId`) REFERENCES `alumni` (`id`),
  ADD CONSTRAINT `eventId` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Alumni` FOREIGN KEY (`alumniId`) REFERENCES `alumni` (`id`),
  ADD CONSTRAINT `roleId` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
