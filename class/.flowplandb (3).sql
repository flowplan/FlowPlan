-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 02:16 PM
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
  `image` varchar(100) NOT NULL,
  `locale` varchar(3) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googleaccounts`
--

INSERT INTO `googleaccounts` (`googleId`, `name`, `email`, `image`, `locale`, `date`) VALUES
(1, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 'en', '2022-07-13 14:30:18.296127'),
(2, 'Flow Plan', 'flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a/AItbvmlbJXPJFs91jX9_jxdT857CYvOmHAgblUEjqDKn=s96-c', 'en', '2022-07-20 09:41:36.307109'),
(3, 'Andrew Aguilar', 'andrew.aguilar1209@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucqYLQl2VjoXLHel4P6j1V0ZrOJKQuIiyrNz7-Va=s96-c', 'en', '2022-07-21 11:46:25.024354');

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
(11, 'See the design of my website of each pages and the popups windows', 'Client', 'visualize the process of the system I created.', 1, 2, 0, 1, 4),
(12, 'New project for my website', 'Admin', 'My Project outputs for the week 4', 1, 2, 2, 3, 2),
(13, 'login using my google account to my website we', 'Users', 'they can use my website to for their works inside our company', 1, 2, 0, 3, 1),
(14, 'create a task for my development team', 'User', 'organize who will be assign on each task', 1, 11, 0, 1, 2),
(113, 'see all the users who access on the website', 'Admin', 'see the information flow in the web system', 1, 11, 1, 2, 1),
(114, 'New Project Creation', 'User', 'Listed Project', 1, 11, 0, 3, 4),
(115, 'Logout to the website', 'User', 'Remove my access and secure my account', 1, 11, 1, 1, 1),
(116, 'New Story', 'User', 'End Story', 2, 5, 1, 1, 1),
(117, 'New Story here', 'Admin', 'The objective', 3, 6, 0, 1, 1),
(119, 'Documentation the system progresses', 'Admin', 'Provide information to my product owners', 1, 11, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectId` int(11) NOT NULL,
  `project` varchar(30) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `googleId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectId`, `project`, `userId`, `googleId`) VALUES
(1, 'my project 1', NULL, 1),
(2, 'FlowPlan', NULL, 1),
(3, 'new project', NULL, 2),
(4, 'new project', NULL, 3);

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
(1, 0, 627, 1),
(2, 1, 627, 1),
(3, 2, 627, 1),
(4, 4, 627, 1),
(5, 5, 627, 1),
(6, 6, 627, 1),
(7, 7, 627, 1),
(8, 8, 627, 1),
(9, 9, 627, 1),
(10, 10, 627, 1),
(11, 0, 627, 2),
(12, 1, 627, 2),
(13, 2, 627, 2),
(14, 4, 627, 2),
(15, 0, 627, 3),
(16, 1, 627, 3),
(17, 2, 627, 3),
(18, 4, 627, 3),
(19, 5, 627, 3);

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
  `statusId` int(11) NOT NULL DEFAULT 4,
  `productId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `teamName` varchar(40) NOT NULL DEFAULT 'Unset',
  `taskTime` int(11) NOT NULL,
  `color` varchar(15) NOT NULL DEFAULT 'gray'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`taskId`, `taskName`, `targetName`, `statusId`, `productId`, `projectId`, `teamName`, `taskTime`, `color`) VALUES
(1, 'Website Backend', 'Functional Website', 3, 12, 1, 'Flow Plan', 240, 'orange'),
(2, 'Mockup design', 'Finished design', 1, 12, 1, 'Andrew Aguilar', 20, 'red'),
(3, 'Website Layout', 'Website Finished layout', 3, 12, 1, 'Flow Plan', 48, 'orange'),
(7, 'Creation of task', 'Task for all members', 2, 14, 1, 'Andrew Aguilar', 5, 'red'),
(9, 'backend view users', 'view users in website', 1, 113, 1, 'Andrew Aguilar', 3, 'red'),
(10, 'design view of user', 'finished task design', 3, 113, 1, 'Flow Plan', 3, 'orange'),
(30, 'dsa', 'dsa', 3, 13, 1, 'Andrew Aguilar', 21, 'red'),
(46, 'my task', 'done', 1, 117, 3, 'Ace Aguilar', 21, 'blue'),
(47, 'Task ni FlowPlan sayo', 'Eto Dpat awtput', 4, 117, 3, 'Ace Aguilar', 21, 'blue'),
(48, 'sadsa', 'dsad2', 3, 114, 1, 'Andrew Aguilar', 22, 'red'),
(49, 'Story here', 'Make it Done ', 4, 11, 1, 'Andrew Aguilar', 22, 'red'),
(50, 'sdadqq asasqq', 'Lorem Ipsum', 4, 11, 1, 'Flow Plan', 11, 'orange'),
(51, 'Lorum Pordonum', 'ipsum', 4, 11, 1, 'Flow Plan', 2, 'orange'),
(52, 'sas', 'asa', 2, 11, 1, 'Flow Plan', 2, 'orange'),
(53, 'Secure Password', 'Password Encryption', 3, 115, 1, 'Andrew Aguilar', 1, 'red'),
(54, 'Documentation', 'Reports', 3, 119, 1, 'Andrew Aguilar', 7, 'red');

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
(1, 'Ace Aguilar', 'aguilarace77@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucpeAgXDJkTQDwI2y3DwE4ENSMwBoAU7OXJkRb4dFg=s96-c', 3, 3, 'new project', NULL, 1, 'blue'),
(4, 'Andrew Aguilar', 'andrew.aguilar1209@gmail.com', 'https://lh3.googleusercontent.com/a-/AFdZucqYLQl2VjoXLHel4P6j1V0ZrOJKQuIiyrNz7-Va=s96-c', 3, 1, 'my project 1', NULL, 1, 'red'),
(5, 'Flow Plan', 'Flowplan77@gmail.com', 'https://lh3.googleusercontent.com/a/AItbvmlbJXPJFs91jX9_jxdT857CYvOmHAgblUEjqDKn=s96-c', 5, 1, 'my project 1', NULL, 1, 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `update_logs`
--

CREATE TABLE `update_logs` (
  `ul_id` int(11) NOT NULL,
  `teamName` varchar(30) NOT NULL,
  `logMessage` varchar(100) NOT NULL,
  `taskName` varchar(50) NOT NULL,
  `dateTime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `confirmId` int(2) NOT NULL DEFAULT 0,
  `fromStory` varchar(100) NOT NULL,
  `projectId` int(11) NOT NULL,
  `taskId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_logs`
--

INSERT INTO `update_logs` (`ul_id`, `teamName`, `logMessage`, `taskName`, `dateTime`, `confirmId`, `fromStory`, `projectId`, `taskId`) VALUES
(1, 'Flow Plan', 'Move this task', 'Website Layout', '2022-07-24 11:35:29.995894', 1, 'New project for my website', 1, 3),
(2, 'Andrew Aguilar', 'Move this task', 'Creation of task', '2022-07-24 11:36:58.113070', 1, 'create a task for my development team', 1, 7),
(3, 'Andrew Aguilar', 'Move this task', 'sadsa', '2022-07-24 10:48:58.671819', 1, 'New Project Creation', 1, 48),
(4, 'Flow Plan', 'Move this task', 'design view of user', '2022-07-24 11:37:18.447053', 1, 'see all the users who access on the website', 1, 10),
(5, 'Andrew Aguilar', 'Move this task', 'dsa', '2022-07-24 10:49:05.646815', 1, 'login using my google account to my website we', 1, 30),
(6, 'Flow Plan', 'Move this task', 'Website Backend', '2022-07-24 10:49:10.565942', 1, 'New project for my website', 1, 1),
(7, 'Andrew Aguilar', 'Move this task', 'Secure Password', '2022-07-24 10:49:16.839473', 1, 'Logout to the website', 1, 53),
(8, 'Flow Plan', 'Move this task', 'sas', '2022-07-24 11:37:34.415648', 1, 'See the design of my website of each pages and the popups windows', 1, 52),
(9, 'Flow Plan', 'Move this task', 'design view of user', '2022-07-24 11:37:35.295287', 1, 'see all the users who access on the website', 1, 10),
(10, 'Flow Plan', 'Move this task', 'design view of user', '2022-07-24 11:41:00.098369', 1, 'see all the users who access on the website', 1, 10),
(11, 'Andrew Aguilar', 'Move this task', 'Creation of task', '2022-07-24 11:40:57.424176', 1, 'create a task for my development team', 1, 7),
(12, 'Unset', 'Move this task', 'Documentation', '2022-07-24 11:56:49.871545', 1, 'Documentation the system progresses', 1, 54),
(13, 'Flow Plan', 'Move this task', 'design view of user', '2022-07-24 12:03:42.934330', 1, 'see all the users who access on the website', 1, 10),
(14, 'Andrew Aguilar', 'Move this task', 'Documentation', '2022-07-24 12:03:46.052258', 1, 'Documentation the system progresses', 1, 54),
(15, 'Flow Plan', 'Move this task', 'design view of user', '2022-07-24 12:07:46.565933', 1, 'see all the users who access on the website', 1, 10);

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
  MODIFY `googleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `priorityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rolesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sprints`
--
ALTER TABLE `sprints`
  MODIFY `sprintId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `update_logs`
--
ALTER TABLE `update_logs`
  MODIFY `ul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
