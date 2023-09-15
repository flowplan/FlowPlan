-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 02:35 PM
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

--
-- RELATIONSHIPS FOR TABLE `accounts`:
--

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
-- RELATIONSHIPS FOR TABLE `googleaccounts`:
--

--
-- Dumping data for table `googleaccounts`
--

INSERT INTO `googleaccounts` (`googleId`, `name`, `email`, `IsNew`, `image`, `locale`, `date`) VALUES
(1, 'Ace Aguilar (Huzaa)', 'aguilarace77@gmail.com', 1, 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'en', '2022-09-16 18:11:07.412930'),
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
-- RELATIONSHIPS FOR TABLE `priority`:
--

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
-- RELATIONSHIPS FOR TABLE `product`:
--   `priorityId`
--       `priority` -> `priorityId`
--   `statusId`
--       `status` -> `statusId`
--   `projectId`
--       `projects` -> `projectId`
--

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Stories`, `entity`, `Objective`, `projectId`, `sprintId`, `sprint_number`, `priorityId`, `statusId`) VALUES
(124, 'Website Mockup for the System', 'Designer', 'Show it to my team the actual design of the website', 28, 2, 1, 1, 1),
(125, 'Data Flow for the system', 'Developer', 'Print out of the data flow', 28, 5, 1, 1, 1),
(126, 'login to the website', 'User', 'access and create my projects', 28, 5, 1, 2, 1),
(129, 'Create a task for my members in agile scrum project management', 'User', 'Prepare what my members need to create a software in PMQA', 28, 6, 1, 1, 2),
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
(155, 'The quick brown ', 'User', 'Fox jumps over the lazy dog', 28, 12, 1, 1, 1),
(157, 'sa', 'User', 'zz', 28, 12, 1, 4, 4),
(159, 'instantStoryMakerforInstantTask', 'User', 'instantStoryMakerforInstantTask', 28, 1, 1, 4, 4),
(160, 'instantStoryMakerforInstantTask', 'User', 'instantStoryMakerforInstantTask', 36, 1, 1, 4, 4),
(161, 'instantStoryMakerforInstantTask', 'User', 'instantStoryMakerforInstantTask', 36, 1, 2, 4, 4),
(162, 'instantStoryMakerforInstantTask', 'User', 'instantStoryMakerforInstantTask', 34, 1, 1, 4, 4),
(163, 'new task', 'User', 'avail it now', 28, 12, 5, 2, 1),
(164, 'New Story', 'User', 'OUtput', 28, 12, 0, 4, 4),
(167, 'instantStoryMakerforInstantTask', 'User', 'instantStoryMakerforInstantTask', 28, 1, 2, 4, 4);

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
-- RELATIONSHIPS FOR TABLE `projects`:
--   `userId`
--       `accounts` -> `userId`
--   `googleId`
--       `googleaccounts` -> `googleId`
--

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectId`, `project`, `userId`, `googleId`, `currentSprint`, `timeDue`) VALUES
(4, 'new project', NULL, 3, NULL, NULL),
(28, 'Project Planning 3        ', NULL, 1, 1, 1665212152485),
(29, 'Computerize Printout', NULL, 1, NULL, NULL),
(31, 'Mardy', NULL, 6, NULL, NULL),
(32, 'project B', NULL, 7, 1, 1660140899041),
(34, 'Email Creating', NULL, 2, 1, 1660193134871),
(36, 'FlowPlan PMQA Thesis', NULL, 1, 1, 1664769382741),
(37, 'aaaa', NULL, 2, NULL, NULL),
(38, 'qqq', NULL, 2, NULL, NULL),
(41, 'New Project', NULL, 1, NULL, NULL),
(42, 'Project a', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rolesId` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `roles`:
--

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
-- RELATIONSHIPS FOR TABLE `sprints`:
--

--
-- Dumping data for table `sprints`
--

INSERT INTO `sprints` (`sprintId`, `sprintNumber`, `sprintTime`, `projectId`) VALUES
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
(90, 2, 627, 36),
(91, 0, 627, 37),
(92, 1, 627, 37),
(93, 0, 627, 38),
(94, 1, 627, 38),
(99, 0, 627, 41),
(100, 1, 627, 41),
(101, 0, 627, 42),
(102, 1, 627, 42);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `status`:
--

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
-- RELATIONSHIPS FOR TABLE `task`:
--   `productId`
--       `product` -> `ProductID`
--   `projectId`
--       `projects` -> `projectId`
--   `statusId`
--       `status` -> `statusId`
--

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskId`, `taskName`, `targetName`, `taskComment`, `statusId`, `productId`, `projectId`, `teamName`, `taskTime`, `color`, `dateCreated`) VALUES
(63, 'Setup the Color', 'Combine Coloring', NULL, 3, 124, 28, 'Mardy Incenares', 6, 'aquamarine', '2022-07-27 16:11:07'),
(64, 'Mockup', 'Mockup Output', '', 2, 124, 28, 'Ace Aguilar', 3, 'gold', '2022-07-27 16:50:18'),
(65, 'chatbox mockup', 'chatbox design', NULL, 3, 124, 28, 'Flow Plan', 4, 'purple', '2022-07-27 16:51:03'),
(66, 'login page', 'login page in website', NULL, 3, 126, 28, 'Ace Aguilar', 4, 'gold', '2022-07-28 03:18:04'),
(69, 'Mockup transition', 'onclick transition', NULL, 3, 124, 28, 'Flow Plan', 2, 'purple', '2022-07-28 07:14:49'),
(71, 'maglinis', 'malinis na', '', 4, 125, 28, 'Mardy Incenares', 2, 'aquamarine', '2022-08-01 04:10:24'),
(72, 'Mockup', 'Designed Mockup', NULL, 1, 126, 28, 'Mardy Incenares', 2, 'aquamarine', '2022-08-01 07:52:19'),
(73, 'Stories for the task', 'Prepared Stories', 'for revise', 1, 129, 28, 'Mardy Incenares', 1, 'aquamarine', '2022-08-02 09:41:44'),
(74, 'Task for the team', 'Prepared Task', '', 3, 129, 28, 'Mardy Incenares', 3, 'aquamarine', '2022-08-02 09:42:03'),
(75, 'Layout of the task', 'Actual Output of the task', '', 2, 129, 28, 'Flow Plan', 4, 'purple', '2022-08-02 09:42:32'),
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
(96, 'Mockup of the System', 'Designed Mockup', NULL, 3, 149, 34, 'unset', 2, 'gray', '2022-08-04 04:44:59'),
(97, 'DFD Diagram', 'Image Output DFD diagram', '', 2, 125, 28, 'Flow Plan', 2, 'purple', '2022-08-10 08:06:40'),
(98, 'ERD diagram 2', 'Image of ERD Diagram', '', 2, 125, 28, 'Flow Plan', 3, 'purple', '2022-08-10 08:07:04'),
(99, 'Improve Task Approval', 'notify the team for approval', 'Affect other Set of Data', 3, 151, 36, 'Ace Aguilar', 3, 'purple', '2022-09-12 03:43:36'),
(100, 'Story save alarm remove', 'remove alarm', 'Just Remove Alarm', 3, 151, 36, 'Ace Aguilar', 1, 'purple', '2022-09-12 03:44:46'),
(101, 'member window height', 'fixed height', NULL, 3, 151, 36, 'Ace Aguilar', 1, 'purple', '2022-09-12 03:45:35'),
(102, 'Use Case Diagram', 'The Design', NULL, 3, 152, 36, 'Ace Aguilar', 3, 'purple', '2022-09-12 03:46:37'),
(103, 'Scrum Old methods', 'Delivery to Mardy', NULL, 3, 150, 36, 'Ace Aguilar', 2, 'purple', '2022-09-12 03:47:44'),
(104, 'Know the Flowplan use', 'Delivery to Mardy', NULL, 3, 150, 36, 'Ace Aguilar', 2, 'purple', '2022-09-12 03:48:34'),
(105, 'Recommendation for future devs', 'Deliver to Mardy', NULL, 3, 150, 36, 'Ace Aguilar', 2, 'purple', '2022-09-12 03:49:08'),
(106, 'System deployment', 'flowplan is online', '', 4, 153, 36, 'Ace Aguilar', 5, 'purple', '2022-09-12 03:50:13'),
(107, 'Domain of the system', 'Paid Domain', NULL, 4, 153, 36, 'Ace Aguilar', 5, 'purple', '2022-09-12 03:52:24'),
(108, 'Create FTP account', 'Accessible account', NULL, 4, 153, 36, 'Ace Aguilar', 1, 'purple', '2022-09-12 03:53:51'),
(109, 'Upload the system to online', 'Uploaded System', NULL, 4, 153, 36, 'Ace Aguilar', 10, 'purple', '2022-09-12 03:54:30'),
(110, 'Fix the Invitation', 'Adjust alarmer', 'Fix the sequence', 3, 151, 36, 'Ace Aguilar', 2, 'purple', '2022-09-12 03:55:50'),
(111, 'Instant Task', 'Create task in Scrumboard', 'Hide from Story, Sprint, Tile', 3, 154, 36, 'Ace Aguilar', 3, 'purple', '2022-09-15 01:43:17'),
(112, 'running sprint', 'should not change sprint', 'change current should false', 3, 151, 36, 'Ace Aguilar', 2, 'purple', '2022-09-16 07:00:59'),
(113, 'Video Turtorial', 'Available UI', '100% System', 4, 151, 36, 'Ace Aguilar', 5, 'purple', '2022-09-17 12:52:12'),
(114, 'create', 'done lng', 'error', 4, 159, 28, 'Ace Aguilar', 2, 'gold', '2022-09-17 19:27:42'),
(115, 'Session Checker', 'if its logout redirect page', 'Every Sec Checking', 1, 160, 36, 'Ace Aguilar', 1, 'purple', '2022-09-18 10:56:37'),
(116, 'Instant Edit Scrum Task', 'Edit Task', NULL, 3, 160, 36, 'Ace Aguilar', 1, 'purple', '2022-09-18 12:38:46'),
(118, 'Fix Status Instant task', 'can add', '', 3, 160, 36, 'Ace Aguilar', 1, 'purple', '2022-09-18 15:49:16'),
(120, 'Adjust Sprint Backlog', 'Fix some labels and alerts', 'Make a button for Stop Sprint', 2, 160, 36, 'Ace Aguilar', 3, 'purple', '2022-09-18 15:59:35'),
(121, 'Features of the System', 'On Documentation', '', 1, 160, 36, 'Ace Aguilar', 1, 'purple', '2022-09-19 09:26:26'),
(122, 'Draggable', 'Scrum Task Can be Drag', 'Drag Outside', 3, 160, 36, 'Ace Aguilar', 5, 'purple', '2022-09-20 12:45:18'),
(123, 'Select Option Default', 'Default after Edit story', 'study form.reset', 2, 160, 36, 'Ace Aguilar', 2, 'purple', '2022-09-20 15:48:58'),
(124, 'ace', 'das', NULL, 1, 162, 34, 'Unset', 2, 'gray', '2022-09-21 03:48:21'),
(135, 'Learn SWAL', 'Applicable to the System', 'Yes No Argument', 2, 160, 36, 'Ace Aguilar', 5, 'purple', '2022-09-23 04:38:00'),
(136, 'WebView.EXE', 'Can be open as Pc App', NULL, 1, 160, 36, 'Ace Aguilar', 5, 'purple', '2022-09-23 04:38:30'),
(137, 'Redesign the summary', 'UI Design', 'Finish Project summary', 3, 160, 36, 'Ace Aguilar', 7, 'purple', '2022-09-23 04:39:18'),
(138, 'Form Reset', 'Functional Reset to edit story', NULL, 4, 160, 36, 'Ace Aguilar', 2, 'purple', '2022-09-23 04:40:43'),
(139, 'Sprint task limit', '1 only the minimum', NULL, 4, 160, 36, 'Ace Aguilar', 1, 'purple', '2022-09-23 04:41:35'),
(140, 'Testing', 'Software Testing', NULL, 3, 159, 28, 'Mardy Incenares', 3, 'aquamarine', '2022-09-28 07:43:42'),
(141, 'dasdas', 'dsa', NULL, 4, 161, 36, 'Unset', 21, 'gray', '2022-09-28 08:52:44'),
(142, 'sad', 'eqw', NULL, 4, 167, 28, 'Unset', 33, 'gray', '2022-09-28 08:53:10'),
(143, 'Instant Add Comment', 'Apply to Scrum Board', NULL, 2, 160, 36, 'Ace Aguilar', 3, 'purple', '2022-09-30 06:59:20');

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
-- RELATIONSHIPS FOR TABLE `team`:
--   `projectId`
--       `projects` -> `projectId`
--   `roleId`
--       `roles` -> `rolesId`
--

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamId`, `teamName`, `emailAddress`, `image`, `roleId`, `projectId`, `project`, `googleId`, `inviteValue`, `color`) VALUES
(34, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 1, 28, 'Flow Plan Project Planning', NULL, 1, 'gold'),
(35, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 1, 29, 'Computerize Printouts', NULL, 1, 'gray'),
(39, 'Mardy Incenares', 'incenaresm29@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 1, 31, 'Mardy', NULL, 1, 'gray'),
(40, 'Mardy Incenares', 'incenaresm29@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 4, 28, 'Project Planning', NULL, 1, 'aquamarine'),
(41, 'Keint Bajao', 'keint.bajao28@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucrQGc08mgIeSb4BOYttgYQHUoYf-DQMJf4XIEqiGw=s96-c', 1, 32, 'project B', NULL, 1, 'yellowgreen'),
(43, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a/AItbvmlbJXPJFs91jX9_jxdT857CYvOmHAgblUEjqDKn=s96-c', 1, 34, 'Project Planning', NULL, 1, 'blue'),
(46, 'Ace Aguilar (Huzaa)', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/ACNPEu98x6l1IOJqoF6up5KrdpmwQEoz30qU8wEu97aQUw=s96-c', 6, 34, 'Email Creating', NULL, 1, 'gray'),
(47, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 1, 36, 'FlowPlan PMQA Thesis', NULL, 1, 'purple'),
(48, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 1, 37, 'aaaa', NULL, 1, 'gray'),
(49, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 1, 38, 'qqq', NULL, 1, 'gray'),
(51, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a-/ACNPEu_BWJpKlVscTP-m76-mtARMLM2LwAKNValrA2hv=s96-c', 3, 28, 'Project Planning 2', NULL, 1, 'purple'),
(54, 'Ace Aguilar (Huzaa)', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/ACNPEu98x6l1IOJqoF6up5KrdpmwQEoz30qU8wEu97aQUw=s96-c', 1, 41, 'New Project', NULL, 1, 'gray'),
(55, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a-/ACNPEu_BWJpKlVscTP-m76-mtARMLM2LwAKNValrA2hv=s96-c', 3, 36, 'FlowPlan PMQA Thesis', NULL, 1, 'chocolate'),
(56, 'Ace Aguilar (Huzaa)', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/ACNPEu98x6l1IOJqoF6up5KrdpmwQEoz30qU8wEu97aQUw=s96-c', 1, 42, 'Project a', NULL, 1, 'gray');

-- --------------------------------------------------------

--
-- Table structure for table `update_logs`
--

CREATE TABLE `update_logs` (
  `ul_id` int(11) NOT NULL,
  `teamName` varchar(30) NOT NULL,
  `teamPic` varchar(100) NOT NULL DEFAULT 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c',
  `logMessage` varchar(100) NOT NULL,
  `taskName` varchar(50) NOT NULL,
  `estimateTime` int(11) NOT NULL DEFAULT 2,
  `dateTime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `confirmId` int(2) NOT NULL DEFAULT 0,
  `fromStory` varchar(100) NOT NULL,
  `projectId` int(11) NOT NULL,
  `taskId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `update_logs`:
--   `projectId`
--       `projects` -> `projectId`
--

--
-- Dumping data for table `update_logs`
--

INSERT INTO `update_logs` (`ul_id`, `teamName`, `teamPic`, `logMessage`, `taskName`, `estimateTime`, `dateTime`, `confirmId`, `fromStory`, `projectId`, `taskId`) VALUES
(33, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Setup the Color', 2, '2022-07-27 16:25:37.357190', 2, 'Website Mockup for the System', 28, 63),
(34, 'Unset', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'dsadsadsa<br>dsadsadsa<br>dsad', 2, '2022-07-28 03:33:39.181625', 2, 'Website Mockup for the System', 28, 65),
(35, 'Unset', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', '<i>Italic</i>', 2, '2022-07-28 03:36:31.271873', 2, '<i><strong style=\"color:red\">Hi Hello</Strong></i>', 28, 66),
(36, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Mockup', 2, '2022-07-30 03:11:30.324873', 1, 'Website Mockup for the System', 28, 64),
(37, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Stories for the task', 2, '2022-08-02 09:50:19.725373', 1, 'Create a task for my members in agile scrum project management', 28, 73),
(38, 'Unset', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'hh', 2, '2022-08-03 13:34:28.255405', 2, '33', 32, 78),
(39, 'Unset', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', '2', 2, '2022-08-03 13:54:52.053597', 0, '2', 32, 87),
(40, 'Unset', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', '44-4', 2, '2022-08-03 14:12:30.572265', 0, '444', 32, 93),
(41, 'Unset', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', '111', 2, '2022-08-03 14:15:08.327661', 0, '111', 32, 94),
(42, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Layout of the task', 2, '2022-08-04 04:16:58.254538', 1, 'Create a task for my members in agile scrum project management', 28, 75),
(43, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Mockup of the System', 2, '2022-08-04 04:55:44.094960', 2, 'Create a System Project Planning for the Team', 34, 96),
(44, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Layout of the task', 2, '2022-08-12 10:05:19.033772', 1, 'Create a task for my members in agile scrum project management', 28, 75),
(45, 'Mardy Incenares', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Task for the team', 2, '2022-08-12 10:07:45.558975', 1, 'Create a task for my members in agile scrum project management', 28, 74),
(46, 'Mardy Incenares', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'maglinis', 2, '2022-08-13 11:02:18.713425', 1, 'Data Flow for the system', 28, 71),
(47, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Mockup transition', 2, '2022-08-14 03:20:20.158017', 1, 'Website Mockup for the System', 28, 69),
(48, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Mockup transition', 2, '2022-09-09 15:20:55.727810', 2, 'Website Mockup for the System', 28, 69),
(49, 'Mardy Incenares', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'maglinis', 2, '2022-09-16 04:54:36.724598', 1, 'Data Flow for the system', 28, 71),
(50, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Scrum Old methods', 2, '2022-09-14 02:22:03.008767', 1, 'Create a Information', 36, 103),
(51, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Know the Flowplan use', 2, '2022-09-14 13:03:31.769683', 2, 'Create a Information', 36, 104),
(52, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Scrum Old methods', 2, '2022-09-14 13:03:32.610740', 2, 'Create a Information', 36, 103),
(53, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Recommendation for future devs', 2, '2022-09-14 13:03:33.324897', 2, 'Create a Information', 36, 105),
(54, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Use Case Diagram', 2, '2022-09-14 13:03:34.011701', 2, 'see the ERDs of the system', 36, 102),
(55, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Improve Task Apporval', 2, '2022-09-14 17:07:16.856626', 1, 'Fix the system', 36, 99),
(56, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Improve Task Apporval', 2, '2022-09-14 17:08:11.282201', 2, 'Fix the system', 36, 99),
(57, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Improve Task Apporval', 2, '2022-09-14 17:09:57.960785', 1, 'Fix the system', 36, 99),
(58, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Story save alarm remove', 2, '2022-09-14 17:15:41.587099', 1, 'Fix the system', 36, 100),
(59, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Improve Task Apporval', 2, '2022-09-14 17:15:00.431858', 1, 'Fix the system', 36, 99),
(60, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Improve Task Apporval', 2, '2022-09-14 17:16:54.506536', 1, 'Fix the system', 36, 99),
(61, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'System deployment', 2, '2022-09-14 17:20:51.116432', 1, 'see the system in online', 36, 106),
(62, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Story save alarm remove', 2, '2022-09-14 17:35:23.832909', 1, 'Fix the system', 36, 100),
(63, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix the Invitation', 2, '2022-09-14 17:44:01.534308', 1, 'Fix the system', 36, 110),
(64, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Story save alarm remove', 2, '2022-09-14 17:44:28.381903', 1, 'Fix the system', 36, 100),
(65, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix the Invitation', 2, '2022-09-14 17:45:20.451608', 1, 'Fix the system', 36, 110),
(66, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Story save alarm remove', 2, '2022-09-14 17:45:00.393163', 1, 'Fix the system', 36, 100),
(67, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Improve Task Apporval', 2, '2022-09-14 17:45:43.944069', 2, 'Fix the system', 36, 99),
(68, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Story save alarm remove', 2, '2022-09-15 01:39:43.320025', 2, 'Fix the system', 36, 100),
(69, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix the Invitation', 2, '2022-09-15 01:39:40.643073', 2, 'Fix the system', 36, 110),
(70, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Instant Task', 2, '2022-09-16 02:41:42.873634', 1, 'Create a task in the scrumboard', 36, 111),
(71, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Instant Task', 2, '2022-09-16 02:46:30.731053', 1, 'Create a task in the scrumboard', 36, 111),
(72, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Instant Task', 2, '2022-09-16 02:55:39.658091', 1, 'Create a task in the scrumboard', 36, 111),
(73, 'Mardy Incenares', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Stories for the task', 2, '2022-09-16 04:54:21.788087', 1, 'Create a task for my members in agile scrum project management', 28, 73),
(74, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Mockup', 2, '2022-09-16 06:43:07.036276', 1, 'Website Mockup for the System', 28, 64),
(75, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'member window height', 2, '2022-09-16 07:12:08.207543', 2, 'Fix the system', 36, 101),
(76, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'running sprint', 2, '2022-09-16 07:15:09.743783', 1, 'Fix the system', 36, 112),
(77, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'running sprint', 2, '2022-09-16 08:29:10.953296', 2, 'Fix the system', 36, 112),
(78, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'DFD Diagram', 2, '2022-09-17 16:54:40.226176', 1, 'Data Flow for the system', 28, 97),
(79, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Instant Task', 2, '2022-09-17 19:40:14.199343', 1, 'Create a task in the scrumboard', 36, 111),
(80, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Session Checker', 2, '2022-09-18 11:23:36.345555', 1, 'instantStoryMakerforInstantTask', 36, 115),
(81, 'Unset', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'create', 2, '2022-09-18 11:26:01.828488', 1, 'instantStoryMakerforInstantTask', 28, 114),
(82, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Instant Task', 2, '2022-09-18 12:35:05.442390', 2, 'Create a task in the scrumboard', 36, 111),
(83, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Instant Edit Scrum Task', 2, '2022-09-18 15:47:48.850428', 2, 'instantStoryMakerforInstantTask', 36, 116),
(84, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix Status Instant task', 2, '2022-09-19 09:43:24.438475', 1, 'instantStoryMakerforInstantTask', 36, 118),
(85, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix Status Instant task', 2, '2022-09-19 09:43:48.352638', 1, 'instantStoryMakerforInstantTask', 36, 118),
(86, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix Status Instant task', 2, '2022-09-19 09:44:26.870495', 2, 'instantStoryMakerforInstantTask', 36, 118),
(87, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix Status Instant task', 2, '2022-09-20 14:50:47.059603', 2, 'instantStoryMakerforInstantTask', 36, 118),
(88, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Summary text replace', 2, '2022-09-20 14:54:16.286156', 1, 'instantStoryMakerforInstantTask', 36, 120),
(89, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Draggable', 2, '2022-09-20 15:35:22.994177', 1, 'instantStoryMakerforInstantTask', 36, 122),
(90, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'maglinis', 2, '2022-09-21 04:02:03.781583', 1, 'Data Flow for the system', 28, 71),
(91, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Video Turtorial', 2, '2022-09-21 05:53:16.871664', 1, 'Fix the system', 36, 113),
(92, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix Status Instant task', 2, '2022-09-22 12:20:56.508855', 2, 'instantStoryMakerforInstantTask', 36, 118),
(93, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix Status Instant task', 2, '2022-09-22 12:20:55.760580', 2, 'instantStoryMakerforInstantTask', 36, 118),
(94, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Fix Status Instant task', 2, '2022-09-22 12:20:54.700781', 2, 'instantStoryMakerforInstantTask', 36, 118),
(95, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Draggable', 2, '2022-09-22 12:31:49.539527', 2, 'instantStoryMakerforInstantTask', 36, 122),
(96, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'DFD Diagram', 2, '2022-09-23 04:09:55.868923', 1, 'Data Flow for the system', 28, 97),
(97, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Features of the System', 2, '2022-09-27 15:31:29.002878', 1, 'instantStoryMakerforInstantTask', 36, 121),
(98, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Redesign the summary', 2, '2022-09-27 17:29:01.981150', 2, 'instantStoryMakerforInstantTask', 36, 137),
(99, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucrqbXrw7X3BHGbltmOWHmxKSwmzy4yJeVMLiMRG=s96-c', 'Move this task', 'Redesign the summary', 2, '2022-09-27 17:32:12.524164', 1, 'instantStoryMakerforInstantTask', 36, 137),
(100, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Learn SWAL', 2, '2022-09-27 17:40:34.142391', 1, 'instantStoryMakerforInstantTask', 36, 135),
(101, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Learn SWAL', 2, '2022-09-28 05:56:36.516486', 1, 'instantStoryMakerforInstantTask', 36, 135),
(102, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Redesign the summary', 2, '2022-09-28 06:02:34.347454', 1, 'instantStoryMakerforInstantTask', 36, 137),
(103, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/ACNPEu_BWJpKlVscTP-m76-mtARMLM2LwAKNValrA2hv=s96-c', 'Move this task', 'Layout of the task', 2, '2022-09-28 06:05:31.181588', 1, 'Create a task for my members in agile scrum project management', 28, 75),
(104, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/ACNPEu_BWJpKlVscTP-m76-mtARMLM2LwAKNValrA2hv=s96-c', 'Move this task', 'DFD Diagram', 2, '2022-09-28 06:05:29.954397', 1, 'Data Flow for the system', 28, 97),
(105, 'Mardy Incenares', 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 'Move this task', 'Task for the team', 2, '2022-09-28 06:05:28.881977', 1, 'Create a task for my members in agile scrum project management', 28, 74),
(106, 'Flow Plan', 'https://lh3.googleusercontent.com/a-/ACNPEu_BWJpKlVscTP-m76-mtARMLM2LwAKNValrA2hv=s96-c', 'Move this task', 'ERD diagram 2', 2, '2022-09-28 06:05:28.139749', 1, 'Data Flow for the system', 28, 98),
(107, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Mockup', 2, '2022-09-28 06:05:27.438300', 1, 'Website Mockup for the System', 28, 64),
(108, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Redesign the summary', 2, '2022-09-28 06:17:35.894005', 1, 'instantStoryMakerforInstantTask', 36, 137),
(109, 'Mardy Incenares', 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 'Move this task', 'Task for the team', 0, '2022-09-28 07:34:13.105965', 2, 'Create a task for my members in agile scrum project management', 28, 74),
(110, 'Mardy Incenares', 'https://lh3.googleusercontent.com/a-/AFdZucpl8LcSNw73CTjej_6eBrOAZf6YV3hQh4BawKYAyA=s96-c', 'Move this task', 'Testing', 3, '2022-09-28 07:44:02.705302', 2, 'instantStoryMakerforInstantTask', 28, 140),
(111, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Redesign the summary', 7, '2022-09-28 08:43:42.730555', 2, 'instantStoryMakerforInstantTask', 36, 137),
(112, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Learn SWAL', 5, '2022-09-30 06:58:14.215959', 1, 'instantStoryMakerforInstantTask', 36, 135),
(113, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Adjust Sprint Backlog', 3, '2022-09-30 06:58:13.232023', 1, 'instantStoryMakerforInstantTask', 36, 120),
(114, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Learn SWAL', 5, '2022-09-30 06:58:39.282783', 1, 'instantStoryMakerforInstantTask', 36, 135),
(115, 'Ace Aguilar', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'Move this task', 'Select Option Default', 2, '2022-09-30 07:00:41.785367', 1, 'instantStoryMakerforInstantTask', 36, 123);

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
-- RELATIONSHIPS FOR TABLE `users`:
--

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
-- Indexes for table `update_logs`
--
ALTER TABLE `update_logs`
  ADD PRIMARY KEY (`ul_id`),
  ADD KEY `projectId` (`projectId`);

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
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rolesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sprints`
--
ALTER TABLE `sprints`
  MODIFY `sprintId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `update_logs`
--
ALTER TABLE `update_logs`
  MODIFY `ul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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

--
-- Constraints for table `update_logs`
--
ALTER TABLE `update_logs`
  ADD CONSTRAINT `update_logs_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
