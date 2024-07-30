-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2024 at 08:06 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zadecada_sysdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `choose_us`
--

CREATE TABLE `choose_us` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `choose_us`
--

INSERT INTO `choose_us` (`id`, `image`, `title`, `description`) VALUES
(1, '862765463.jpg', 'Testing', 'Lorem ipsum dove respondez sil vous plait');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`cid`, `name`, `email`, `subject`, `message`, `date_time`) VALUES
(2, 'Charles', 'bbagarukayobruce@gmail.com', 'hello', 'testing emails.. closing emails and clear', '16-09-2022 07:14:09 PM'),
(3, 'Bruce Bagarukayo', 'bbagarukayo5@gmail.com', 'hello testing emails', 'Testing emails and clear', '21-10-2022 07:44:57 PM'),
(4, 'Charles', 'admin@gmail.com', 'hello testing emails', 'hgghhg', '22-10-2022 12:59:37 AM'),
(5, 'Search Engine Index', 'submissions@searchindex.site', 'submissions@searchindex.site', 'Hello,\r\n\r\nfor your website do be displayed in searches your domain needs to be indexed in the Google Search Index.\r\n\r\nTo add your domain to Google Search Index now, please visit \r\n\r\nhttps://www.domain-submit.info/', '29-06-2024 09:20:59 PM'),
(6, 'Mike Wal', 'mike57@usaaxa.com', 'Mike Wal', '', '01-07-2024 01:03:58 AM'),
(7, 'Ali Cruickshank', 'eve_bergstrom@eaglesmail.net', 'Ali Cruickshank', '', '01-07-2024 01:17:30 AM'),
(8, 'Amit Sharma', 'webpageoptimized@gmail.com', 'webpageoptimized@gmail.com', 'Hey,\r\n\r\nAs I can see you have a newly launched website (zadecadacademy.com)!\r\n\r\n\"Get you website optimized/ SEO setup/ Search engine friendly in one-time setup cost!\"\r\n\r\nIf interested, just hit \"Reply\". \r\n\r\nRegards,\r\nAmit Sharma | Sr Business Developer\r\nWebpageoptimized.com\r\nWhatsApp - +1 213 262 0124', '11-07-2024 11:43:15 PM'),
(9, 'Sam Morris', 'applicationdevelopment03@gmail.com', 'applicationdevelopment03@gmail.com', 'Hey zadecadacademy.com,\r\n\r\nWhile exploring your website, I devised an innovative plan to revamp it with cutting-edge technology, aiming to increase revenue and gain a competitive edge.\r\n\r\nI am a skilled web developer able to tackle nearly any challenge you present, offering services at prices accessible to most.\r\n\r\nI am pleased to provide you with \"Quotes,\" \"Proposals,\" details of past work, \"Our Packages,\" and \"Offers\"!\r\n\r\nThanks in advance,\r\nSam Morris (Business Development Executive)', '16-07-2024 10:01:47 AM'),
(10, 'Izetta Henning', 'izetta.henning53@gmail.com', 'izetta.henning53@gmail.com', 'Hey Owner,\r\n\r\nIâ€™ve been searching for your email!\r\n\r\nWe help businesses increase $50-100K/MRR per rep by securing 10-25 high-opportunity sales meetings at no ad spend cost.\r\n\r\nIâ€™d love to share some insights with you. Interested?\r\n\r\nFind a time: https://www.ddlink.us/home\r\n\r\nDigital Domination\r\n\r\nNot Interested? Reply with Unsubscribe.', '27-07-2024 09:17:26 PM');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `code` int(11) NOT NULL,
  `cs_name` text NOT NULL,
  `attachment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`code`, `cs_name`, `attachment`) VALUES
(12, 'AutoCAD Electrical Fundamentals', '361712066.pdf'),
(13, 'AutoCAD Mechanical Fundamentals', '597652741.pdf'),
(14, 'Autodesk AutoCAD Fundamentals', '549144993.pdf'),
(15, 'Course outline- ArchiCad', '139885006.pdf'),
(16, 'Course outline- Protastructure', '628656168.pdf'),
(17, 'Epanet Software_Course Description', '414769870.pdf'),
(18, 'Planswift course - ZadeCAD Academy', '146818304.pdf'),
(19, 'Revit Architecture Essential Training', '456274322.pdf'),
(20, 'ZadeCAD Academy Civil 3D', '478759995.pdf'),
(21, 'ZadeCAD STAAD.Pro syllabus', '377561156.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `cid` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `topic` text NOT NULL,
  `attachment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`cid`, `course`, `topic`, `attachment`) VALUES
(11, 11, 'Trending', '375760297.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `sid` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `field_of_study` text NOT NULL,
  `company` text NOT NULL,
  `mode_of_class` varchar(100) NOT NULL,
  `time_for_class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`sid`, `program`, `firstname`, `lastname`, `phone`, `whatsapp`, `gender`, `country`, `date_added`, `occupation`, `field_of_study`, `company`, `mode_of_class`, `time_for_class`) VALUES
(5, '19', 'Hamis', 'Kiggundu', '+256773155093', '+256758169834', 'Male', 'Uganda', '2022-11-08', 'Scientiest', 'IT', 'HAMZ LIMITED', 'Virtual', ''),
(6, '22', 'Kakensa', 'Bright', '+256772701502', '+256758169834', 'Male', 'Uganda', '2023-03-06', 'Scientiest', 'IT', 'Makerere University', 'Physical', 'Week days'),
(7, '34', 'BRUCE', 'BAGARUKAYO', '0773155093', '0758169834', 'Male', 'Uganda', '2024-06-22', 'KKK', 'Kampala', 'Test', 'Physical', 'Weekends'),
(8, '19', 'JONATHAN ', 'KATUMBA ', '0787751645', '0751561470', 'Male', 'Uganda', '2024-06-30', 'CIVIL ENGINEER ', 'CIVIL ENGINEERING ', 'HAMUZAT ENGINEERING SERVICES LTD', 'Virtual', 'Week days'),
(9, '19', 'Malish ', 'Emmanuel ', '0783003760', '0783003760', 'Male', 'South Sudan', '2024-07-03', 'Student ', 'Civil engineering ', 'Ndejje university graduand', 'Virtual', 'Weekends'),
(10, '19', 'Tumusiime', 'Timothy', '0750683955', '0750683955', 'Male', 'Uganda', '2024-07-10', 'Student', 'Civil Engineering ', 'University (year 4)', 'Virtual', 'Week days'),
(11, '21', 'Tumusiime', 'Timothy', '0750683955', '0783410234', 'Male', 'Uganda', '2024-07-10', 'Student ', 'Civil Engineering ', 'Ndejje University (year 4)', 'Virtual', 'Week days'),
(12, '27', 'KHALID', 'GUMA', '0772784808', '0772784808', 'Male', 'Uganda', '2024-07-13', '', 'Telecom and Electricals', 'Daflaz Engineering limited ', 'Physical', 'Week days'),
(13, '29', 'Tumuhimbise', 'Ursher Godwin', '0782033409', '782033409', 'Male', 'Uganda', '2024-07-15', 'Software Engineer', 'This is a test course application. Please disregard. ', 'Makerere University', 'Virtual', 'Weekends'),
(14, '19', 'Denis', 'Kakeeto', '0743591478', '0743591478', 'Male', 'Uganda', '2024-07-19', 'civil engineer', 'civil engineering', 'Tekla structures U ltd', 'Physical', 'Week days'),
(15, '29', 'OKELLO', 'MARK OCEN', '0779886984', '0779886984', 'Male', 'Uganda', '2024-07-19', 'ENGINEER', 'ENVIRONMENTAL ENGINEERING AND MANAGEMENT', 'EMPA ASSOCIATES LIMITED', 'Virtual', 'Weekends'),
(16, '24', 'Omonya', 'Moses', '0702195421', '0702195421', 'Male', 'Uganda', '2024-07-22', '', '', 'Ndejje', 'Physical', 'Weekends');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `s_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`s_id`, `image`, `caption`, `status`) VALUES
(2, '548421325.jpg', '', 'yes'),
(3, '113218730.jpg', '', 'yes'),
(4, '123100483.jpg', '', 'yes'),
(5, '950136444.jpg', '', 'yes'),
(6, '321570974.jpg', '', 'yes'),
(7, '564804036.jpg', '', 'yes'),
(8, '529401057.jpg', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `s_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`s_id`, `image`, `caption`, `status`) VALUES
(3, '978963773.jpg', 'testing', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `pid` int(11) NOT NULL,
  `pg_name` text NOT NULL,
  `pg_image` text NOT NULL,
  `description` text NOT NULL,
  `software` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`pid`, `pg_name`, `pg_image`, `description`, `software`) VALUES
(19, 'RC and Steel Structural Analysis and Design', '633387715.jpg', '<p>In this course you will learn about the analysis and design of Reinforced Concrete (RC) and Steel buildings, and discover how structural engineering is both a scientific discipline and logical form. Which is also a sub-discipline of civil engineering in which structural engineers are trained to design the &lsquo;bones and muscles&rsquo; that create the form and shape of manmade structures.</p>\r\n', 'ProtaStructure,Tekla Structural Designer, STAAD Pro V8i , AutoCAD Advanced Steel'),
(20, 'Water pipe network distribution design', '359426204.jpg', '<p>One of the most important aspects in the design of water supply and irrigation systems is the design of an optimal system. From choosing the right layout of the system after mapping to setting/assigning demands to the target nodes. The main focus of this course is to help design engineers to understand the most important steps taken in design and simulation of water systems by using Epanet and the Associate software (Google Earth/AutoCad).</p>\r\n', 'EPANET'),
(21, 'Architectural 2D and 3D Building Design', '607459331.jpg', '<p>During the course, students will be acquainted with the technology for creating 2D and 3D drawings. The trainer will describe the means of conceptual design, detail and documentation. You will gain experience that will help and inspire you to advance in your personal and professional development. You will attain skills in a practical way with the help of sample project design and assignments.</p>\r\n', 'ArchiCAD, AutoCAD, Revit Architecture'),
(22, 'Architectural Designs\r\n', '598102868.jpg', '<p>Architectural visualization helps architects and designers work collaboratively and communicate ideas more efficiently. It is a modern way of creating three-dimensional model visual presentation of a structure like a building using computer software. It is made for clients to walk around, explore a 3D model, and view it from any angle as realistic as built.</p>\r\n\r\n<p>This course, regardless of your industry background, will share concepts of Architectural 3D Visualization from a beginner to expert level. It is suitable for architects, urban planners, visualization artists, real estate professionals, Architecture students, interior designers, landscape designers and Design consultants.</p>\r\n', 'Twinmotion, V-Ray for 3Ds Max'),
(23, 'BOQ and Material schedules preparation', '254507219.jpg', '<p>Quantity surveying and construction costing professionals have been struggling with manual calculations. That cannot control, validate, or standardize any of the inputs or formula calculations within each estimate; it is time for a better, more accurate estimate. That is why we bring you the BoQ preparation course with Planswift for professionals like you.<br />\r\nGet trained by software approved and highly experienced quantity surveyors. this course aims to sharpen you on how to develop outstanding BoQ, time-phased budgets, forecasts, and measuring project performance and productivity using cost, hour, and quantity control elements in the easiest way than ever using Planswift.</p>\r\n', 'Planswift'),
(24, 'Highways and Roads Design', '794274892.jpg', '<p>As urban and residential areas grow, addressing the layouts and configurations for modern, sustainable design becomes mandatory. Throughout the Bootcamp, we will teach you the tools to optimize your civil highway and road designs for efficiency and safety while minimizing project costs. You will practice real-world design and production workflows with hands-on exercises and datasets so that you can practice as you learn. As a result, you will deliver stronger, more robust designs that meet project requirements. Therefore, the basics of design for highways are discussed in the scope of the Manual Design Criteria approach. The design and analysis steps for highway elements are also discussed in the <strong>Ministry of Works and Transport&rsquo;s</strong> <em>Road Design Manual (Volume 1: Geometric Design).</em></p>\r\n', 'AutoCAD Civil 3D,Infraworks, 3Ds Max'),
(25, 'Mechanical HVAC Design', '709548581.jpg', '<p>Heating, ventilation, and air conditioning (HVAC) is&nbsp;the use of various technologies to control the temperature, humidity, and purity of the air in an enclosed space. Its goal is to provide thermal comfort and acceptable indoor air quality.</p>\r\n\r\n<p>Applying mechanical engineering theoretical concepts such as thermodynamics, heat transfer, fluid mechanics, you will translate these theories into valuable and applicable skill that is specific to HVAC industry. Equal friction method for duct sizing, analyzing heat load in space, design of VRF systems (centralized Systems) by using software.</p>\r\n', 'AutoCAD MEP'),
(26, 'Plumbing and Drainage system design', '900263648.jpg', '<p>This course has been crafted to deliver plumbing and water professionals with comprehensive skills in areas related to water supply and drainage systems. Our project delivery-based training aims to help you understand and design plumbing projects from scratch with confidence. After participating in this course, you will be able to know the key design considerations for building plumbing and drainage systems, apply codes and standards, make sound materials selection decisions, select specific equipment and corresponding piping, and understand why and when specialized piping is used.</p>\r\n\r\n<p>Plumbing and Drainage Design course train the kinds of drainage systems, supply water distribution systems to hot water systems with the smart system design &amp; energy upkeep. Plumbing is one of the most critical features of the building design for the delivery and use of water in a building. Learn to produce plumbing and piping systems that work within the specific needs or specifications of a building or construction project.</p>\r\n', 'AutoCAD MEP'),
(27, 'Electrical Systems Design', '672445763.jpg', '<p>Due to drastic changes in electrical engineering industry, need of the trained electrical individuals is growing hurriedly. There will be an increase of 24% in occupations for skilled electrical pros by the close of this decade because power utilization has been increasing over the past few years, most rapidly. We introduce to you the innovative electrical design skills development course, which intends to tackle the planning, creating, testing or supervising the development and installation of electrical equipment, including lighting equipment, power systems, power distribution, fire alarms, life safety systems and other related systems</p>\r\n', 'AutoCAD Electrical'),
(28, 'Product Design and Manufacturing', '953410234.jpg', '<p>Providing a full product design skillset, necessary to accelerate the design, virtual prototyping and manufacturing process. An emphasis of this course is put on practical work and timesaving tips and tricks directly drawn from the professional world. Through this course, you will also benefit from skills on how to structure an engineering design project. We provide high-level professional practices on 3D mechanical design, documentation, and product simulation tools. Work efficiently with a powerful blend of parametric, direct, freeform, and rules-based design capabilities. That is why, we introduce to you the product design and manufacturing skills development course.</p>\r\n', 'AutoCAD, Solidworks, Inventor'),
(29, 'Project & BIM Management', '503088455.png', '<p>The project management course is designed for almost all construction project members either in office or on-site works, from site agent to the managing director because we know that having skills on the software that helps you in planning and scheduling your project performance and back it with understanding the philosophy or technical theories needed by a professional project manager is a must. You will also be able to organize projects, control access to projects, organize and control resources and in effective planning, monitoring and controlling any construction project.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'MS Project, Primavera, Navisworks'),
(30, 'Physical planning and Land surveying', '365316508.jpg', '<p>Physical Planning is the active process of organizing the physical activities and land uses in order to ensure orderly and eï¬€ective siting and coordination of land uses. It encompasses deliberate determination of spatial plans with an aim of achieving optimum level of land utilization in a sustainable manner. Land surveying is the technique, profession, art, and science of determining the terrestrial two-dimensional or three-dimensional positions of points and the distances and angles between them.</p>\r\n\r\n<p>Through the course, you will learn different CAD software to aid spatial analysis and modeling, which can contribute to a variety of important urban planning tasks. These tasks include site selection, land suitability analysis, land use and transport modeling, the identification of planning action areas, and impact assessments.</p>\r\n', 'ArcGIS,AutoCAD,AutoCAD Civil 3D'),
(31, 'Public Health & Environmentalists', '326073055.jpg', '<p>Environmental and public health focuses on the relationships between people and their environment; promotes human health and well-being; and fosters healthy and safe communities. Environmental health is a key part of any comprehensive public health system.</p>\r\n\r\n<p>This course trains health and environmental professionals with the essential skills to map and analyze routinely collected health and environmental data. You will also learn what data and methods are used to detect areas of high disease risk and to compare these with geographic patterns of health and environment service delivery.</p>\r\n', 'ArcGIS, Stata 12, SPSS Statistics 20'),
(32, 'Graphic Design', '943792091.jpg', '<p>Graphic Design is the art or skill of combining text and pictures in advertisements, magazines or books. Graphic design is made up of several key concepts that anyone interested in pursuing this art form needs to know. In this course, you&rsquo;ll learn the four cornerstones of graphic design; shape, typography, color, and composition. You&rsquo;ll discover how to mold your ideas around these key concepts and create a visual universe based on your imagination, creativity, and graphic resources.</p>\r\n', 'Photoshop, Illustrator, InDesign, AfterEffects'),
(33, 'Photo editing', '242489319.jpg', '<p>Gain full mastery of the most useful and powerful tools in Photoshop and Lightroom, the best software for professional photo editing. Learn how to take full advantage of your images in this course. It will teach you in-depth and from scratch how to use layers, selections, channels, and masks like a pro. In this course you will learn, step by step, all the basic concepts of photo editing and the most important tools for retouching and color balance to handle your first photographs like a professional.</p>\r\n', 'Photoshop, Lightroom'),
(34, 'Video editing', '737165044.jpg', '<p>If you want to master Adobe Premiere Pro and edit videos like a professional, this course is for you. It will teach you the essential skills needed for reaching your goal. You will learn how to create and establish a good workflow to achieve optimal results for your visual projects. You will learn the ins and outs of Premiere Pro to create high-quality videos, whether you&#39;re just getting started in video editing or you already have some experience.</p>\r\n', 'Premiere Pro');

-- --------------------------------------------------------

--
-- Table structure for table `site_users`
--

CREATE TABLE `site_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reset_code` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_users`
--

INSERT INTO `site_users` (`id`, `username`, `email`, `password`, `reset_code`, `status`, `phone`, `names`, `gender`) VALUES
(7, 'brucekyl', 'scheneider@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '691949', 1, '0773155093', 'Bruce Bagarukayo', 'Male'),
(8, 'bagarukayo', 'bbagarukayo5@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '239352', 1, '0773155093', 'BRUCE BAGARUKAYO', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `tid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(30) NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `flw_ref` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_added` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `amount`, `currency`, `user`, `course`, `flw_ref`, `status`, `date_added`) VALUES
('12182012912', 500, 'UGX', 4, 11, '', 'successful', '2022-02-07 11:43:09 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `reset_code` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  `plain_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `password`, `contact`, `role`, `reset_code`, `active`, `plain_password`) VALUES
(3, 'Web Admin', '', 'admin@zadecadacademy.com', '4a65e7baf1828701f8e3f43acd2b435a', '+256771234567', 'admin', '45841', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`vid`, `course`, `title`, `link`) VALUES
(7, 11, 'intro', 'https://player.vimeo.com/video/682719578?h=4ac5b2fc9a'),
(8, 11, 'the intro', 'https://player.vimeo.com/video/682719578?h=4ac5b2fc9a'),
(9, 11, 'teting', 'https://player.vimeo.com/video/682719578?h=4ac5b2fc9a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choose_us`
--
ALTER TABLE `choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `site_users`
--
ALTER TABLE `site_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`email`,`password`,`reset_code`,`status`),
  ADD KEY `names` (`names`,`gender`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choose_us`
--
ALTER TABLE `choose_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `site_users`
--
ALTER TABLE `site_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
