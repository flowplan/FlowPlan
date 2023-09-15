-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 05:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `Date_created` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userId`, `username`, `password`, `email`, `Code`, `CodeID`, `Date_created`) VALUES
(1, 'AceAguilar', '321321', 'AceAguilar123@gmail.com', '', '0', '2022-07-05 02:09:37.978926'),
(19, 'huzaa', '321321', 'aguilarace77@gmail.com', 'f371621c8cfded87f46da321cabb2797', '1', '2022-07-05 07:08:56.174076'),
(20, 'admin', 'root', 'flowplan77@gmail.com', '78be145b618b00756e19afa2d57bc723', '1', '2022-07-05 07:17:57.318028');

-- --------------------------------------------------------

--
-- Table structure for table `googleaccounts`
--

CREATE TABLE `googleaccounts` (
  `googleId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googleaccounts`
--

INSERT INTO `googleaccounts` (`googleId`, `name`, `email`) VALUES
(1, 'Ace Aguilar', 'aguilarace77@gmail.com');

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
  `priorityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Stories`, `entity`, `Objective`, `projectId`, `sprintId`, `priorityId`) VALUES
(1, 'ace', 'user', 'aa', 1, 1, 4),
(2, 'Create project for the system', 'User', 'I can provide the task I need for the project', 1, 1, 4),
(3, 'Access my database', 'User', 'I can able to see all the Data that created', 1, 1, 4),
(4, 'Project that i can provide to my development Team', 'User', 'I can able to assign task to my members', 2, 1, 4),
(5, 'Problema ko', 'User', 'Sagot ko', 3, 1, 4),
(6, 'login page for the website', 'User', 'i can able to access the website', 4, 1, 4),
(7, 'Project', 'User', 'Result', 5, 1, 4);

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
(3, 'Ace Project', NULL, 1),
(4, 'huzaa project', 19, NULL),
(5, 'Project', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sprints`
--

CREATE TABLE `sprints` (
  `sprintId` int(11) NOT NULL,
  `sprintNumber` int(11) NOT NULL,
  `sprintTime` int(11) NOT NULL,
  `projectId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sprints`
--

INSERT INTO `sprints` (`sprintId`, `sprintNumber`, `sprintTime`, `projectId`) VALUES
(1, 0, 627, 1),
(2, 0, 627, 2),
(3, 0, 627, 3),
(4, 0, 627, 4),
(5, 0, 627, 5);

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
  ADD KEY `priorityId` (`priorityId`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectId`),
  ADD KEY `userId` (`userId`,`googleId`),
  ADD KEY `googleId` (`googleId`);

--
-- Indexes for table `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`sprintId`),
  ADD UNIQUE KEY `ProductID` (`projectId`);

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
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `googleaccounts`
--
ALTER TABLE `googleaccounts`
  MODIFY `googleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `priorityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sprints`
--
ALTER TABLE `sprints`
  MODIFY `sprintId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sprintId`) REFERENCES `sprints` (`sprintId`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`priorityId`) REFERENCES `priority` (`priorityId`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `accounts` (`userId`),
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`googleId`) REFERENCES `googleaccounts` (`googleId`);

--
-- Constraints for table `sprints`
--
ALTER TABLE `sprints`
  ADD CONSTRAINT `sprints_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
