-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 12:35 AM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `overview` text DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `course_details` text DEFAULT NULL,
  `entry_requirements` text DEFAULT NULL,
  `fees_and_funding_GBP` decimal(10,2) DEFAULT NULL,
  `fees_and_funding_EUR` decimal(10,2) DEFAULT NULL,
  `fees_and_funding_USD` decimal(10,2) DEFAULT NULL,
  `faqs` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `level`, `duration`, `overview`, `highlights`, `course_details`, `entry_requirements`, `fees_and_funding_GBP`, `fees_and_funding_EUR`, `fees_and_funding_USD`, `faqs`, `image_url`) VALUES
(15, 'Accounting and Finance BSc (Hons)', 'Undergraduate', '3 years', 'Accounting is more than just a computational skill and  the University of Northampton’s Accounting and Finance BSc degree will develop your ability to analyse and evaluate real-life situations and effectively communicate your views and opinions.', 'The BSc Accounting and Finance degree at the University of Northampton provides a specialised pathway, a proven student support system and has progression courses available. It also offers significant exemptions from the main professional body exams', 'The Accounting and Finance BSc will begin by considering the practical techniques involved in accounting and finance and then continue to develop skills to critically analyse the theory behind these techniques.)', 'A typical offer for Accounating and Finance would be:BBC at A Level or DDM at BTEC/Cambridge Technical or M at T Level.', 9250.00, 10500.00, 12000.00, 'Why study BSc Accounting and Finance? - There are many benefits of studying for an Accounting and Finance degree, including a wide scope of options to work across multiple sectors, from economics to business law and management.', 'https://www.northampton.ac.uk/wp-content/uploads/2023/04/three-students-end-of-book-shelf-768x512.jpg'),
(18, 'Fashion Marketing & Promotion BA (Hons)', 'Undergraduate', '3 years', 'If you are passionate about fashion and ambitious to work in one of the many areas of the industry which encompasses branding, marketing, merchandising, buying, styling, PR, live events, promotion or digital communications, then this fashion marketing course provides a fantastic platform from which to launch your career.', 'International study tours in first and second year are covered in your tuition fees. Specialise in either Fashion Marketing or Fashion Promotion. Numerous opportunities for work experience. Optional Placement Year. This course is a joint delivery between the Faculty of Business and Law and the Faculty of Arts, Science and Technology.', 'This fashion marketing degree is jointly delivered by experts in fashion, marketing, photography, digital communications and specialist software. Academics are from both the Faculty of Business and Law and the Faculty of Arts, Science and Technology dependent on the specifics of the module being taught.', '\r\nA typical offer for BA Acting is: BBC at A-Level or, DDM at BTEC/Cambridge Technical or M at T Level in conjunction with an extensive audition. We welcome applications from a range of non-traditional education or professional qualifications, and from students with a mix of A levels and BTEC/Cambridge Technical qualifications.', 9250.00, 10500.00, 12000.00, 'How will I learn? - On our Fashion Marketing and Promotion degree, modules are taught using our innovative ‘Active Blended Learning’. This approach is student centred with an emphasis on problem-based learning and enquiry. Varied activities within the programme include conducting primary research, study trips in the UK and abroad, industry guest speakers, live client projects, working in teams, adobe creative suite training, technical training on specialist equipment, Cad software training and staging live events.', 'https://www.northampton.ac.uk/wp-content/uploads/2023/05/two-students-one-in-booth-768x512.jpg'),
(24, 'Biochemistry BSc (Hons)', 'Undergraduate', '3 years', 'Biochemistry underpins the very nature of our existence and acquiring skills and knowledge of this subject will help you solve key biological problems. Our Biochemistry degree is aimed at helping you understand the interconnectedness of chemistry, physics and biology by exploring a range of different topics', 'Modules in emerging subjects such as bioinformatics. Collaborate with international scientists from both academic and industrial backgrounds. Modules with a large number of practical’s to aid your learning and experience. HP laptop and software included with this course for eligible students (see Eligibility criteria and terms and conditions)', 'This degree in Biochemistry gives you a firm understanding of the underlying principles for biochemicals reactions that occur within living organisms. There are key biological themes that create the core of this degree that includes, biochemistry, genetics and microbiology', 'A typical offer for BA Acting is: BBC at A-Level or, DDM at BTEC/Cambridge Technical or M at T Level in conjunction with an extensive audition. We welcome applications from a range of non-traditional education or professional qualifications, and from students with a mix of A levels and BTEC/Cambridge Technical qualifications.', 9250.00, 10500.00, 12000.00, '\"How will I be taught? You will be taught in a variety of ways on this biochemistry degree; traditional face to face small seminars, online sessions through our virtual classroom, asynchronously and through additional support sessions.', 'https://www.northampton.ac.uk/wp-content/uploads/2020/09/research-centres-768x512.jpg'),
(26, 'Computing (Internet Technology and Security) MSc', 'Postgraduate', '1 year', 'The University of Northampton’s Computing (Internet Technology and Security) MSc course allows you to study cyber security and cryptography. You will have the opportunity to develop your research and analytical skills.', 'Access to PC and Linux workstation computers on the MSc Computing (Internet Technology and Security) course\r\n', 'Today’s society relies on computing and Internet technology. This creates a high demand for internet security products and services as well as people with the knowledge and expertise to design, implement and manage secure internet applications. While the University of Northampton’s Computing (Internet Technology and Security) MSc pathway is mostly technical in focus, you will also learn about the business context and develop interpersonal skills that are vital to problem solving in business.', 'Applicants for the master’s in Computing (Internet Technology Security) will normally hold a recognised first or second class honours degree from a UK university or international equivalent in a relevant subject.', 16695.00, 19738.00, 21093.00, 'How will I be taught on Computing (Internet Technology and Security) MSc? - Theoretical lectures and seminars are reinforced by practical examples and case studies, using computer simulation tools and laboratory facilities. How will I be assessed on this MSc Computing (Internet Technology and Security) course? - Assessment is by coursework, oral presentations, group work, practical reports, critical reviews and a substantial independent research dissertation.', 'https://www.northampton.ac.uk/wp-content/uploads/2022/06/tutorial-group-games-design-header-768x512.jpg'),
(31, 'International Marketing Strategy MSc', 'Postgraduate', '1 year', 'The University of Northampton’s MSc International Marketing Strategy degree is specifically designed to provide you with a strong foundation for a successful career in the exciting and fast-paced world of international marketing. The international marketing strategy course also enhances your ability to think strategically about marketing management in an international context.', 'This international marketing management course has a 12-month Industry Placement Option.', 'Marketing is no longer just a business function, it is a way of doing business that places the consumer at the center of organizational activity. Marketing is an essential component of organizational success not only in businesses but also in the public sector and not-for-profit organizations.', 'You will need to hold a First or Second class honours degree (or equivalent) in order to be eligible for the master’s in international marketing strategy. No work experience is required for admission onto this course.', 16695.00, 19738.00, 21093.00, 'What are the assessments for International Marketing Strategy MSc? - An innovative range of individual and group-based assessments are used involving the preparation of essays, marketing plans, case study analyses, portfolios and presentations as well as the dissertation.', 'https://www.northampton.ac.uk/wp-content/uploads/2023/05/two-students-one-in-booth-768x512.jpg'),
(32, 'Master of Business Administration MBA', 'Postgraduate', '1 year', 'The Master of Business Administration (MBA) is a globally recognised postgraduate qualification for ambitious, motivated graduates. If you aspire to be a business professional and do not have any previous business or management experience, studying for a master of business administration degree will allow you to achieve this. Meanwhile, Executive MBAs are best suited to experienced candidates seeking to progress their career further.', 'Interactive learning activities in small groups; no lengthy lectures in big theaters. A special focus on the contemporary and practical knowledge and skills relevant to the markets’ needs.A dedicated module designed to prepare international students to the UK Education System, and to help them develop transformable digital and non-digital skills that are essential to today’s business environments.', 'It’s important to do your research when choosing which MBA degree to study. The right course for you will depend on your personal interests, experience and ambitions. Your options include General MBA courses, which teach a broad range of business skills and are ideal for those with less managerial experience. Alternatively, if you are progressing to finance-related positions at management and board level, MBA Finance could be a more suitable option for you.', 'If you hold a first or second class honours degree from a British university or equivalent, you will be eligible to apply for this MBA business management course. Work experience is useful but is not an essential MBA business entry requirement, so long as you can demonstrate a clear passion and interest in business and/or enterprise.', 11800.00, 13950.00, 14908.00, 'What does an MBA get you? - If you choose to pursue MBA study with a university, you can benefit in a number of different ways. The experience and knowledge gained on MBA courses can lead to more career options being available to you, promotion from your current position and an increased salary. They also come with the advantage of global recognition, making them valuable to individuals working abroad.', 'https://www.northampton.ac.uk/wp-content/uploads/2016/01/studying-students-course-feature-768x274.jpg'),
(33, 'MSc Environmental Management', 'Postgraduate', '1 year', 'Learn about environmental impact assessment, resource management, and sustainability practices.', 'Field trips, industry projects, research opportunities.', 'Modules include Environmental Impact Assessment, Resource Management, Sustainability Practices, Environmental Law, Climate Adaptation, and more.', 'A bachelor\'s degree in a relevant field. English Language Requirements: All International and EU students applying for a course with the University of Northampton must meet the following minimum English language requirements: IELTS 6.0 (or equivalent) with a minimum of 5.5 in all bands for study at undergraduate level. For information regarding English language requirements at the University, please see our IELTS page.', 10500.00, 12395.00, 13266.00, 'Are there fieldwork opportunities? - Yes, there are multiple field trips and industry projects.\",\r\n\"What careers can I pursue with this degree? - Careers in environmental consulting, sustainability management, policy-making, and more.', 'https://www.northampton.ac.uk/wp-content/uploads/2023/04/uon-waterside-sign-creative-hub-768x512.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE `course_modules` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`id`, `course_id`, `module_name`, `credits`) VALUES
(6, 31, 'Global Marketing Strategy ', 20),
(7, 31, 'Dissertation and Research Methods', 60),
(8, 31, 'International Marketing Communications', 20),
(9, 31, 'Strategic Digital Marketing', 20),
(10, 31, 'Global Marketing Issues', 20),
(11, 32, 'Academic and Digital Skills for Professionals ', 20),
(12, 32, 'People Development and Leadership', 20),
(13, 32, 'Strategy and Decision Making ', 20),
(14, 32, 'Career Futures: Employability Skills ', 0),
(15, 32, 'Major Project – Placement', 40),
(16, 33, 'Introduction to Ecology', 20),
(17, 33, 'Fieldwork Module', 20),
(18, 33, 'Data Technologies', 20),
(19, 33, 'Weather and Climate', 30),
(20, 33, 'Environmental Law and Justice', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'root', 'root'),
(2, 'test', 'test'),
(3, 'admin', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD CONSTRAINT `course_modules_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
