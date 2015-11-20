-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2015 at 09:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE IF NOT EXISTS `coordinator` (
  `c_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dept_id` int(255) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `user_id` (`user_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`c_id`, `user_id`, `dept_id`) VALUES
(1, 73, 1),
(2, 74, 2),
(3, 75, 3),
(4, 76, 4),
(5, 77, 5),
(6, 78, 6),
(7, 79, 7),
(8, 80, 8);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(20) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(1, 'BS-IT'),
(2, 'BS-CS'),
(3, 'BS-Physics'),
(4, 'BS-Chemistry'),
(5, 'BS-English'),
(6, 'BS-Math'),
(7, 'BS-Economics'),
(8, 'BS-Stats');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `g_id` int(255) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(255) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`g_id`, `g_name`) VALUES
(1, 'Cricket'),
(2, 'Football'),
(3, 'Hockey'),
(4, 'Basketball'),
(5, 'Vollyball'),
(6, 'Chess'),
(7, 'Snooker'),
(8, 'Squash'),
(9, 'Tabletennis'),
(10, 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `livescores`
--

CREATE TABLE IF NOT EXISTS `livescores` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `match_id` int(22) NOT NULL,
  `teaminnings` int(255) NOT NULL,
  `over` int(12) NOT NULL,
  `runs` int(30) NOT NULL,
  `wicket` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `match_id` (`match_id`),
  KEY `teaminnings` (`teaminnings`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `match_id` int(255) NOT NULL AUTO_INCREMENT,
  `team1_id` int(255) NOT NULL,
  `team2_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `match_date_time` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `matchstatus` enum('live','completed','scheduled','') NOT NULL,
  `winningteam` int(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`match_id`),
  KEY `team1_id` (`team1_id`),
  KEY `team2_id` (`team2_id`),
  KEY `g_id` (`g_id`),
  KEY `winningteam` (`winningteam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(255) NOT NULL AUTO_INCREMENT,
  `news_heading` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `newsdescription` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `featured` tinyint(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `player_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `game_role` enum('Batsman','Bowler','All rounder','Goal keeper','wicket keeper','Snooker player','Table tennis player','tennis player','Squash player','vollyball player','football player','hockey player','basketball player') NOT NULL,
  `dept_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  PRIMARY KEY (`player_id`),
  KEY `user_id` (`user_id`),
  KEY `dept_id` (`dept_id`),
  KEY `g_id` (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
  `r_id` int(255) NOT NULL AUTO_INCREMENT,
  `sc_id` int(255) NOT NULL,
  PRIMARY KEY (`r_id`),
  KEY `sc_id` (`sc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `result_id` int(255) NOT NULL AUTO_INCREMENT,
  `team_id` int(255) NOT NULL,
  `match_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` enum('completed','','','') NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `team_id` (`team_id`),
  KEY `match_id` (`match_id`),
  KEY `g_id` (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_coordinator`
--

CREATE TABLE IF NOT EXISTS `sub_coordinator` (
  `sc_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  PRIMARY KEY (`sc_id`),
  KEY `user_id` (`user_id`),
  KEY `dept_id` (`dept_id`),
  KEY `g_id` (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `sub_coordinator`
--

INSERT INTO `sub_coordinator` (`sc_id`, `user_id`, `dept_id`, `g_id`) VALUES
(26, 82, 1, 1),
(27, 83, 2, 1),
(28, 84, 3, 1),
(29, 85, 4, 1),
(30, 86, 5, 1),
(31, 87, 6, 1),
(32, 88, 7, 1),
(33, 89, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team record`
--

CREATE TABLE IF NOT EXISTS `team record` (
  `team_record_id` int(255) NOT NULL AUTO_INCREMENT,
  `team_id` int(255) NOT NULL,
  `played` int(255) NOT NULL,
  `win` int(255) NOT NULL,
  `lose` int(255) NOT NULL,
  `draw` int(255) NOT NULL,
  `points` int(255) NOT NULL,
  PRIMARY KEY (`team_record_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(255) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `sc_id` int(255) NOT NULL,
  `teamlogo` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`),
  KEY `g_id` (`g_id`),
  KEY `sc_id` (`sc_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `age` int(40) NOT NULL,
  `gender` enum('male','female','','') DEFAULT NULL,
  `dept_id` int(255) DEFAULT NULL,
  `user_role` enum('Admin','Coordinator','Sub-coordinator','Player') NOT NULL,
  `g_id` int(255) DEFAULT NULL,
  `status_id` tinyint(1) NOT NULL,
  `languages` text,
  `introduction` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `dept_id` (`dept_id`),
  KEY `g_id` (`g_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `email`, `password`, `age`, `gender`, `dept_id`, `user_role`, `g_id`, `status_id`, `languages`, `introduction`, `images`) VALUES
(1, 'juni', 'junaid anwar', 'j@j.com', 'juni123', 23, 'male', 1, 'Admin', 1, 1, 'English', 'i am admin in this portal and responsible for this sitre management', ''),
(73, 'Ali', 'Ali zahid', 'ali@gmail.com', 'asdf', 23, 'male', 1, 'Coordinator', 1, 1, NULL, NULL, NULL),
(74, 'Haseeb', 'Haseeb ahmed', 'haseeb@gmail.com', 'asdf', 23, 'male', 2, 'Coordinator', 1, 1, NULL, NULL, NULL),
(75, 'Zohaib', 'Zohaib najeeb', 'zohaib@gmail.com', 'asdf', 23, 'male', 3, 'Coordinator', 1, 1, NULL, NULL, NULL),
(76, 'Nouman', 'Nouman Ali', 'nomi@gmail.com', 'asdf', 23, 'male', 4, 'Coordinator', 1, 1, NULL, NULL, NULL),
(77, 'Raza', 'Ali raza', 'raza@gmail.com', 'asdf', 23, 'male', 5, 'Coordinator', 1, 1, NULL, NULL, NULL),
(78, 'Iqbal', 'Mudassar Iqbal', 'iqbal@gmail.com', 'asdf', 23, 'male', 6, 'Coordinator', 1, 1, NULL, NULL, NULL),
(79, 'Samar', 'Samar ali', 'samar@gmail.com', 'asdf', 23, 'male', 7, 'Coordinator', 1, 1, NULL, NULL, NULL),
(80, 'Mumtaz', 'Mumtaz ali', 'mumtaz@gmail.com', 'asdf', 23, 'male', 8, 'Coordinator', 1, 1, NULL, NULL, NULL),
(82, 'Hamayoun', 'Hamayoun butt', 'butt@gmail.com', 'asdf', 23, 'male', 1, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(83, 'Zafar', 'Zafar khan', 'zafar@gmail.com', 'asdf', 23, 'male', 2, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(84, 'Ishaq', 'Ishaq ali', 'ishaq@gmail.com', 'asdf', 23, 'male', 3, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(85, 'Nabeel', 'Nabeel Ali', 'nabeel@gmail.com', 'asdf', 23, 'male', 4, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(86, 'Tahir', 'Tahir Mughal', 'tahir@gail.com', 'asdf', 23, 'male', 5, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(87, 'Ahmed', 'Ahmed ali', 'ahmed@gmail.com', 'asdf', 23, 'male', 6, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(88, 'Anwar', 'Saeed Anwar', 'saeed@gmail.com', 'asdf', 23, 'male', 7, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(89, 'Saleem', 'Muhammad saleem', 'saleem@gmail.com', 'asdf', 23, 'male', 8, 'Sub-coordinator', 1, 1, NULL, NULL, NULL),
(90, 'Adnan', 'Adnan ali', 'adnan@gmail.com', 'asdf', 24, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(91, 'Ashraf', 'Ashraf ali', 'ashraf11@gmail.com', 'asdf', 23, 'male', 2, 'Player', 1, 0, NULL, NULL, NULL),
(92, 'Javed', 'Javed ali', 'javed@gmail.com', 'asdf', 23, 'male', 3, 'Player', 1, 0, NULL, NULL, NULL),
(93, 'Tiwana', 'Tiwana akhtar', 'tiwana@gmail.com', 'asdf', 23, 'male', 4, 'Player', 1, 0, NULL, NULL, NULL),
(94, 'Raees', 'muhammad raees', 'raees@gmail.com', 'asdf', 23, 'male', 5, 'Player', 1, 0, NULL, NULL, NULL),
(95, 'Bukhsh', 'Allah bukhsh', 'bukhsh@gmail.com', 'asdf', 23, 'male', 6, 'Player', 1, 0, NULL, NULL, NULL),
(96, 'Nasir', 'Nasir khan', 'nasir@gmail.com', 'asdf', 23, 'male', 7, 'Player', 1, 0, NULL, NULL, NULL),
(97, 'Abrar', 'abrar khalil', 'braro@gmail.com', 'asdf', 23, 'male', 8, 'Player', 1, 0, NULL, NULL, NULL),
(98, 'Khalid', 'Khalid ali', 'khalid@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(99, 'Majeed', 'majeed ali', 'majeed@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(100, 'Rehan', 'rehan ali', 'rehan@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(101, 'Azam', 'Azam ali', 'azam@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(102, 'Nisar', 'nisar ali', 'nisar@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(103, 'Bilal', 'bilal ahmed', 'billu@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(104, 'Imran', 'imran qureshi', 'imran@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(105, 'Huma', 'Huma ali', 'huma@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL),
(106, 'Saima', 'Saima ali', 'saima@gmail.com', 'asdf', 23, 'male', 1, 'Player', 1, 0, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `coordinator_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livescores`
--
ALTER TABLE `livescores`
  ADD CONSTRAINT `livescores_ibfk_2` FOREIGN KEY (`teaminnings`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livescores_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_4` FOREIGN KEY (`winningteam`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_4` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `sub_coordinator` (`sc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_coordinator`
--
ALTER TABLE `sub_coordinator`
  ADD CONSTRAINT `sub_coordinator_ibfk_3` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_coordinator_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_coordinator_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team record`
--
ALTER TABLE `team record`
  ADD CONSTRAINT `team record_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`sc_id`) REFERENCES `sub_coordinator` (`sc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
