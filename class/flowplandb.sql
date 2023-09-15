-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 10:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowplandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Code` varchar(100) NOT NULL,
  `CodeID` varchar(100) NOT NULL DEFAULT '0',
  `Date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `googleaccounts`
--

CREATE TABLE `googleaccounts` (
  `googleId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `IsNew` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL,
  `locale` varchar(3) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googleaccounts`
--

INSERT INTO `googleaccounts` (`googleId`, `name`, `email`, `IsNew`, `image`, `locale`, `date`) VALUES
(1, 'Ace Aguilar', 'aguilarace77@gmail.com', 1, 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'en', '2022-08-10 15:32:54.590622'),
(2, 'Flow Plan', 'flowplan77@gmail.com', 1, 'https://lh3.googleusercontent.com/a/AItbvmlbJXPJFs91jX9_jxdT857CYvOmHAgblUEjqDKn=s96-c', 'en', '2022-08-10 15:40:07.392792'),
(3, 'Andrew Aguilar', 'andrew.aguilar1209@gmail.com', 0, 'https://lh3.googleusercontent.com/a-/AFdZucqYLQl2VjoXLHel4P6j1V0ZrOJKQuIiyrNz7-Va=s96-c', 'en', '2022-07-21 11:46:25.024354'),
(4, 'Azem Clence', 'clazem83@gmail.com', 0, 'https://lh3.googleusercontent.com/a/AItbvmk_EHEfkYcsd9tVTu1grb3lPFC7AgQhftogoWnl=s96-c', 'en', '2022-08-01 07:06:27.324352'),
(6, 'Mardy Incenares', 'incenaresm29@gmail.com', 0, 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 'en', '2022-08-02 17:26:31.541159'),
(7, 'Keint Bajao', 'keint.bajao28@gmail.com', 0, 'https://lh3.googleusercontent.com/a-/AFdZucrQGc08mgIeSb4BOYttgYQHUoYf-DQMJf4XIEqiGw=s96-c', 'en-', '2022-08-03 13:11:08.443950');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `priorityId` int(11) NOT NULL,
  `priority` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`priorityId`, `priority`) VALUES
(1, 'should'),
(2, 'could'),
(3, 'maybe'),
(4, 'Unset');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Stories` varchar(100) NOT NULL,
  `entity` varchar(11) DEFAULT NULL,
  `Objective` varchar(100) NOT NULL,
  `projectId` int(11) NOT NULL,
  `sprintId` int(11) NOT NULL,
  `sprint_number` int(11) NOT NULL,
  `priorityId` int(11) NOT NULL,
  `statusId` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Stories`, `entity`, `Objective`, `projectId`, `sprintId`, `sprint_number`, `priorityId`, `statusId`) VALUES
(117, 'New Story here', 'Admin', 'The objective', 3, 6, 2, 1, 1),
(124, 'Website Mockup for the System', 'Designer', 'Show it to my team the actual design of the website', 28, 2, 3, 1, 1),
(125, 'Data Flow for the system', 'Developer', 'Print out of the data flow', 28, 5, 2, 1, 1),
(126, 'login to the website', 'User', 'access and create my projects', 28, 5, 1, 2, 1),
(127, 'dsa', 'User', 'ewqe', 3, 6, 1, 4, 4),
(128, 'dsa', 'User', 'wqewq', 3, 6, 4, 4, 4),
(129, 'Create a task for my members in agile scrum project management', 'User', 'Prepare what my members need to create a software in PMQA', 28, 6, 2, 1, 2),
(130, 'Creating domain', 'User', 'product', 31, 2, 0, 4, 4),
(138, '1', 'sprint 1', '1', 32, 6, 1, 1, 1),
(139, '11', 'sprint 1-1', '11', 32, 6, 1, 2, 2),
(140, '2', 'sprint 2', '2', 32, 6, 2, 3, 3),
(141, '22', 'sprint 2-2', '22', 32, 6, 2, 2, 1),
(142, '3', 'sprint 3', '3', 32, 6, 3, 1, 2),
(143, '33', 'sprint 3-3', '33', 32, 6, 3, 3, 1),
(144, '4', 'sprint 4', '4', 32, 6, 4, 3, 1),
(145, '44', 'sprint 4-4', '44', 32, 6, 4, 2, 2),
(146, '444', 'sprint44-4', '444', 32, 6, 4, 2, 3),
(147, '111', 'sprint11-1', '111', 32, 6, 1, 1, 3),
(148, 'New project', 'User', 'End of the Project', 29, 3, 1, 1, 1),
(149, 'Create a System Project Planning for the Team', 'Admin', 'Organize the project task', 34, 3, 1, 1, 1),
(150, 'Create a Information', 'Manager', 'Provide a Documentation', 36, 3, 1, 1, 2),
(151, 'Fix the system', 'Developer', 'Remove any Bugs', 36, 3, 1, 1, 2),
(152, 'see the ERDs of the system', 'Developer', 'know the flows of the system', 36, 3, 1, 1, 2),
(153, 'see the system in online', 'Users', 'I can share the flowplan application to our fellow students', 36, 3, 1, 2, 2),
(154, 'Create a task in the scrumboard', 'Manager', 'Instantly create a task without going to the sprint', 36, 4, 1, 1, 2),
(155, 'The quick brown ', 'User', 'Fox jumps over the lazy dog', 28, 12, 2, 1, 1),
(157, 'sa', 'User', 'zz', 28, 12, 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectId` int(11) NOT NULL,
  `project` varchar(30) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `googleId` int(11) DEFAULT NULL,
  `currentSprint` int(11) DEFAULT NULL,
  `timeDue` bigint(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectId`, `project`, `userId`, `googleId`, `currentSprint`, `timeDue`) VALUES
(3, 'new project', NULL, 2, 2, 1659929514732),
(4, 'new project', NULL, 3, NULL, NULL),
(28, 'Project Planning 2', NULL, 1, 1, 1663920628210),
(29, 'Computerize Printout', NULL, 1, NULL, NULL),
(31, 'Mardy', NULL, 6, NULL, NULL),
(32, 'project B', NULL, 7, 1, 1660140899041),
(34, 'Email Creating', NULL, 2, 1, 1660193134871),
(36, 'FlowPlan PMQA Thesis', NULL, 1, 1, 1664769382741);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rolesId` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rolesId`, `role`) VALUES
(1, 'Scrum Master'),
(2, 'Product Owner'),
(3, 'Quality Assurance'),
(4, 'Software Engineer'),
(5, 'Designer'),
(6, 'Not Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `sprints`
--

CREATE TABLE `sprints` (
  `sprintId` int(11) NOT NULL,
  `sprintNumber` int(11) NOT NULL,
  `sprintTime` int(11) NOT NULL,
  `projectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sprints`
--

INSERT INTO `sprints` (`sprintId`, `sprintNumber`, `sprintTime`, `projectId`) VALUES
(15, 0, 627, 3),
(16, 1, 627, 3),
(17, 2, 627, 3),
(18, 4, 627, 3),
(19, 5, 627, 3),
(60, 0, 627, 28),
(61, 0, 627, 29),
(62, 1, 627, 28),
(63, 2, 627, 28),
(64, 3, 627, 28),
(65, 4, 627, 28),
(67, 0, 627, 31),
(68, 1, 627, 31),
(69, 2, 627, 31),
(70, 0, 627, 32),
(71, 1, 627, 32),
(72, 2, 627, 32),
(73, 3, 627, 32),
(74, 4, 627, 32),
(75, 1, 627, 29),
(78, 0, 627, 34),
(79, 1, 627, 34),
(82, 5, 627, 28),
(83, 6, 627, 28),
(84, 7, 627, 28),
(85, 8, 627, 28),
(86, 9, 627, 28),
(87, 10, 627, 28),
(88, 0, 627, 36),
(89, 1, 627, 36),
(90, 2, 627, 36);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `status`) VALUES
(1, 'To do'),
(2, 'In Progress'),
(3, 'Done'),
(4, 'unset');

-- --------------------------------------------------------

--
-- Stand-in structure for view `story`
-- (See below for the actual view)
--
CREATE TABLE `story` (
`ProductID` int(11)
,`entity` varchar(11)
,`Stories` varchar(100)
,`Objective` varchar(100)
,`sprint_number` int(11)
,`projectId` int(11)
,`priority` varchar(11)
,`status` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskId` int(11) NOT NULL,
  `taskName` varchar(100) NOT NULL,
  `targetName` varchar(100) NOT NULL,
  `taskComment` varchar(30) DEFAULT NULL,
  `statusId` int(11) NOT NULL DEFAULT 4,
  `productId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `teamName` varchar(40) NOT NULL DEFAULT 'Unset',
  `taskTime` int(11) NOT NULL,
  `color` varchar(15) NOT NULL DEFAULT 'gray',
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskId`, `taskName`, `targetName`, `taskComment`, `statusId`, `productId`, `projectId`, `teamName`, `taskTime`, `color`, `dateCreated`) VALUES
(46, 'my task', 'done', NULL, 1, 117, 3, 'unset', 21, 'gray', '2022-07-26 06:47:50'),
(47, 'Task ni FlowPlan sayo', 'Eto Dpat awtput', NULL, 4, 117, 3, 'unset', 21, 'gray', '2022-07-26 06:47:50'),
(63, 'Setup the Color', 'Combine Coloring', NULL, 3, 124, 28, 'Mardy Incenares', 6, 'violet', '2022-07-27 16:11:07'),
(64, 'Mockup', 'Mockup Output', 'May kulang pa', 2, 124, 28, 'Ace Aguilar', 3, 'yellow', '2022-07-27 16:50:18'),
(65, 'chatbox mockup', 'chatbox design', NULL, 3, 124, 28, 'Flow Plan', 4, 'indigo', '2022-07-27 16:51:03'),
(66, 'login page', 'login page in website', NULL, 3, 126, 28, 'Ace Aguilar', 4, 'yellow', '2022-07-28 03:18:04'),
(69, 'Mockup transition', 'onclick transition', NULL, 3, 124, 28, 'Flow Plan', 2, 'indigo', '2022-07-28 07:14:49'),
(71, 'maglinis', 'malinis na', 're visit', 2, 125, 28, 'Flow Plan', 2, 'indigo', '2022-08-01 04:10:24'),
(72, 'Mockup', 'Designed Mockup', NULL, 4, 126, 28, 'Mardy Incenares', 2, 'violet', '2022-08-01 07:52:19'),
(73, 'Stories for the task', 'Prepared Stories', 'for revise', 2, 129, 28, 'Mardy Incenares', 1, 'violet', '2022-08-02 09:41:44'),
(74, 'Task for the team', 'Prepared Task', NULL, 2, 129, 28, 'Mardy Incenares', 3, 'violet', '2022-08-02 09:42:03'),
(75, 'Layout of the task', 'Actual Output of the task', NULL, 4, 129, 28, 'Flow Plan', 4, 'indigo', '2022-08-02 09:42:32'),
(85, '1', 'to do', NULL, 1, 138, 32, 'Unset', 28, 'gray', '2022-08-03 13:51:28'),
(86, '1-1', 'in progress', NULL, 2, 139, 32, 'Unset', 56, 'gray', '2022-08-03 13:53:13'),
(87, '2', 'done', NULL, 3, 140, 32, 'Unset', 0, 'gray', '2022-08-03 13:54:28'),
(88, '2-2', 'to do', NULL, 1, 141, 32, 'Unset', 128, 'gray', '2022-08-03 13:57:01'),
(89, '3', 'in progress', NULL, 2, 142, 32, 'Unset', 156, 'gray', '2022-08-03 13:58:50'),
(90, '3-3', 'to do', NULL, 1, 143, 32, 'Unset', 56, 'gray', '2022-08-03 13:59:59'),
(91, '44', 'to do', NULL, 1, 144, 32, 'Unset', 44, 'gray', '2022-08-03 14:08:03'),
(92, '4-4', 'in progress', NULL, 2, 145, 32, 'Unset', 44, 'gray', '2022-08-03 14:10:08'),
(93, '44-4', 'done', NULL, 3, 146, 32, 'Unset', 0, 'gray', '2022-08-03 14:12:21'),
(94, '111', 'done', NULL, 3, 147, 32, 'Unset', 111, 'gray', '2022-08-03 14:14:58'),
(95, 'Task Making', 'Done task', NULL, 1, 148, 29, 'unset', 1, 'gray', '2022-08-04 02:37:24'),
(96, 'Mockup of the System', 'Designed Mockup', NULL, 3, 149, 34, 'Flow Plan', 2, 'blue', '2022-08-04 04:44:59'),
(97, 'DFD Diagram', 'Image Output DFD diagram', NULL, 4, 125, 28, 'Flow Plan', 2, 'indigo', '2022-08-10 08:06:40'),
(98, 'ERD diagram', 'Image of ERD Diagram', NULL, 4, 125, 28, 'Flow Plan', 3, 'indigo', '2022-08-10 08:07:04'),
(99, 'Improve Task Apporval', 'notify the team for approval', 'Affect other Set of Data', 3, 151, 36, 'Ace Aguilar', 3, 'blue', '2022-09-12 03:43:36'),
(100, 'Story save alarm remove', 'remove alarm', 'Just Remove Alarm', 3, 151, 36, 'Ace Aguilar', 1, 'blue', '2022-09-12 03:44:46'),
(101, 'member window height', 'fixed height', NULL, 3, 151, 36, 'Ace Aguilar', 1, 'blue', '2022-09-12 03:45:35'),
(102, 'Use Case Diagram', 'The Design', NULL, 3, 152, 36, 'Ace Aguilar', 3, 'blue', '2022-09-12 03:46:37'),
(103, 'Scrum Old methods', 'Delivery to Mardy', NULL, 3, 150, 36, 'Ace Aguilar', 2, 'blue', '2022-09-12 03:47:44'),
(104, 'Know the Flowplan use', 'Delivery to Mardy', NULL, 3, 150, 36, 'Ace Aguilar', 2, 'blue', '2022-09-12 03:48:34'),
(105, 'Recommendation for future devs', 'Deliver to Mardy', NULL, 3, 150, 36, 'Ace Aguilar', 2, 'blue', '2022-09-12 03:49:08'),
(106, 'System deployment', 'flowplan is online', '', 4, 153, 36, 'Ace Aguilar', 5, 'blue', '2022-09-12 03:50:13'),
(107, 'Domain of the system', 'Paid Domain', NULL, 4, 153, 36, 'Ace Aguilar', 5, 'blue', '2022-09-12 03:52:24'),
(108, 'Create FTP account', 'Accessible account', NULL, 4, 153, 36, 'Ace Aguilar', 1, 'blue', '2022-09-12 03:53:51'),
(109, 'Upload the system to online', 'Uploaded System', NULL, 4, 153, 36, 'Ace Aguilar', 10, 'blue', '2022-09-12 03:54:30'),
(110, 'Fix the Invitation', 'Adjust alarmer', 'Fix the sequence', 3, 151, 36, 'Ace Aguilar', 2, 'blue', '2022-09-12 03:55:50'),
(111, 'Instant Task', 'Create task in Scrumboard', '', 2, 154, 36, 'Ace Aguilar', 3, 'blue', '2022-09-15 01:43:17'),
(112, 'running sprint', 'should not change sprint', 'change current should false', 3, 151, 36, 'Ace Aguilar', 2, 'blue', '2022-09-16 07:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamId` int(11) NOT NULL,
  `teamName` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `roleId` int(11) NOT NULL DEFAULT 6,
  `projectId` int(11) NOT NULL,
  `project` varchar(50) NOT NULL,
  `googleId` int(11) DEFAULT NULL,
  `inviteValue` int(11) NOT NULL DEFAULT 0,
  `color` varchar(11) NOT NULL DEFAULT 'gray'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamId`, `teamName`, `emailAddress`, `image`, `roleId`, `projectId`, `project`, `googleId`, `inviteValue`, `color`) VALUES
(34, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 1, 28, 'Flow Plan Project Planning', NULL, 1, 'yellow'),
(35, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 1, 29, 'Computerize Printouts', NULL, 1, 'gray'),
(36, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 4, 28, 'Project Management', NULL, 1, 'indigo'),
(39, 'Mardy Incenares', 'incenaresm29@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 1, 31, 'Mardy', NULL, 1, 'gray'),
(40, 'Mardy Incenares', 'incenaresm29@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 2, 28, 'Project Planning', NULL, 1, 'violet'),
(41, 'Keint Bajao', 'keint.bajao28@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucrQGc08mgIeSb4BOYttgYQHUoYf-DQMJf4XIEqiGw=s96-c', 1, 32, 'project B', NULL, 1, 'yellowgreen'),
(43, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a/AItbvmlbJXPJFs91jX9_jxdT857CYvOmHAgblUEjqDKn=s96-c', 1, 34, 'Project Planning', NULL, 1, 'blue'),
(46, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 6, 34, 'Email Creating', NULL, 1, 'gray'),
(47, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 1, 36, 'FlowPlan PMQA Thesis', NULL, 1, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'google', '115990822926486553742', 'Ace', 'Aguilar', 'aguilarace77@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', '', '2022-07-05 13:08:17', '2022-07-05 13:53:24');

-- --------------------------------------------------------

--
-- Structure for view `story`
--
DROP TABLE IF EXISTS `story`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `story`  AS SELECT `product`.`ProductID` AS `ProductID`, `product`.`entity` AS `entity`, `product`.`Stories` AS `Stories`, `product`.`Objective` AS `Objective`, `product`.`sprint_number` AS `sprint_number`, `product`.`projectId` AS `projectId`, `priority`.`priority` AS `priority`, `status`.`status` AS `status` FROM ((`product` join `priority` on(`product`.`priorityId` = `priority`.`priorityId`)) join `status` on(`product`.`statusId` = `status`.`statusId`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `googleaccounts`
--
ALTER TABLE `googleaccounts`
  ADD PRIMARY KEY (`googleId`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`priorityId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `projectId` (`projectId`,`sprintId`,`priorityId`),
  ADD KEY `sprintId` (`sprintId`),
  ADD KEY `priorityId` (`priorityId`),
  ADD KEY `statusId` (`statusId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectId`),
  ADD KEY `userId` (`userId`,`googleId`),
  ADD KEY `googleId` (`googleId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rolesId`);

--
-- Indexes for table `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`sprintId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskId`),
  ADD KEY `statuId` (`statusId`,`productId`,`projectId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamId`),
  ADD KEY `roleId` (`roleId`,`projectId`),
  ADD KEY `projectId` (`projectId`),
  ADD KEY `googleId` (`googleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `googleaccounts`
--
ALTER TABLE `googleaccounts`
  MODIFY `googleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `priorityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rolesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sprints`
--
ALTER TABLE `sprints`
  MODIFY `sprintId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`priorityId`) REFERENCES `priority` (`priorityId`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`statusId`) REFERENCES `status` (`statusId`),
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `accounts` (`userId`),
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`googleId`) REFERENCES `googleaccounts` (`googleId`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`statusId`) REFERENCES `status` (`statusId`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`),
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `roles` (`rolesId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
