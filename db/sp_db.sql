-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 05:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE IF NOT EXISTS `coordinator` (
  `c_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(11) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(2, 'BS-IT'),
(3, 'BS-CS'),
(4, 'BS-Physics'),
(5, 'BS-Chemistr'),
(6, 'BS-Botny'),
(7, 'BS-Math'),
(8, 'BS-zeology'),
(9, 'BS-geology'),
(10, 'BS-urdu'),
(11, 'BS-eng');

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
(1, 'cricket'),
(2, 'football'),
(3, 'hockey'),
(4, 'cbasketball'),
(5, 'vollyball'),
(6, 'chess'),
(7, 'snooker'),
(8, 'squash'),
(9, 'tabletennis'),
(10, 'tennis');

-- --------------------------------------------------------

--
-- Table structure for table `livescores`
--

CREATE TABLE IF NOT EXISTS `livescores` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `match_id` int(22) NOT NULL,
  `teaminnings` int(255) NOT NULL,
  `is_playing` tinyint(1) NOT NULL,
  `over` int(12) NOT NULL,
  `runs` int(30) NOT NULL,
  `wicket` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `match_id` (`match_id`),
  KEY `teaminnings` (`teaminnings`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(255) NOT NULL AUTO_INCREMENT,
  `news_heading` varchar(255) NOT NULL,
  `newsdescription` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `featured` tinyint(1) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_heading`, `newsdescription`, `date`, `featured`, `img`) VALUES
(1, 'Breaking news', 'the captain of ....................', '2015-10-20 19:00:00', 0, ''),
(2, 'Up coming ', 'match between afridi and tuk tuk', '2015-10-22 19:00:00', 0, ''),
(3, 'Bad news', 'afridi is not playing in tomorrow match due to serious injury', '2015-10-29 19:00:00', 0, ''),
(4, 'Shocking news', 'who take more than 4 wickets in a match ives a cash of 100$', '2015-10-28 19:00:00', 0, ''),
(6, 'lala g is injured', 'lala gya', '2015-11-10 19:00:00', 0, ''),
(10, 'Final is on monday', 'mondy........................', '2015-11-07 12:42:14', 0, ''),
(11, 'kal match ni', 'ssffdh', '2015-11-07 13:32:37', 0, ''),
(13, 'MEHMAN', 'KHUSUSI', '2015-11-07 13:52:17', 1, ''),
(14, 'BARISH KA IMKAN H', 'KAL REHMAT BARAS SAKTI H', '2015-11-07 13:52:43', 1, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_coordinator`
--

INSERT INTO `sub_coordinator` (`sc_id`, `user_id`, `dept_id`, `g_id`) VALUES
(4, 3, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `email`, `password`, `age`, `gender`, `dept_id`, `user_role`, `g_id`, `status_id`, `languages`, `introduction`, `images`) VALUES
(1, 'juni', 'junaid anwar', 'j@j.com', 'juni123', 23, 'male', 2, 'Admin', 1, 0, 'English', 'i am admin in this portal and responsible for this sitre management', ''),
(3, 'imran', 'imraan shukat', 'i@g.com', 'imran11', 22, 'male', 2, 'Sub-coordinator', 1, 0, 'Urdu', 'i am here to finalize the teams of individual game', ''),
(4, 'faian', 'faizan iqbal', 'fazi@f.com', 'faizan33', 23, 'male', 3, 'Sub-coordinator', 1, 0, 'English', 'i am here to finalize the teams of individual game', ''),
(7, 'rashid', 'rashid nawaz', 'rashid@gmail.com', 'rashid', 24, 'male', 3, 'Player', 1, 0, 'Urdu', 'i am a player speciaality in batting', ''),
(8, 'rehan', 'rehan quersi', 'r@r.com', 'asdf', 23, 'male', 2, 'Player', 1, 0, 'Arabic', 'i am a player speciaality in bowling', ''),
(10, 'md1122', 'mudassarr iqbal', 'md81334@gmail.com', 'mudassar', 20, 'male', 2, 'Admin', 1, 0, 'English', '', ''),
(11, 'kala', 'kala khan', 'kal@k.com', 'kala123', 20, 'male', 2, 'Admin', 1, 0, 'English', '', ''),
(12, 'hatti', 'hatti khan', 'hati@h.com', 'hatti', 20, 'male', 2, 'Admin', 1, 0, 'English', '', ''),
(13, 'Admin', 'Admin mirza', 'admin@sport.com', 'abc', 20, 'male', 2, 'Admin', 1, 0, 'English', '', ''),
(15, 'kaka', 'kaka don', 'k@k.com', 'asd', 0, NULL, 2, 'Admin', 1, 0, NULL, NULL, NULL),
(16, 'mano', 'mano', 'm@m.com', 'mano', 23, NULL, NULL, 'Admin', NULL, 0, NULL, NULL, NULL),
(27, 'abid', 'abid ali', 'abid@a.com', 'abid', 21, 'male', 4, 'Sub-coordinator', 2, 0, NULL, NULL, NULL),
(28, 'Sadi', 'Sadi Raja', 'rajakhotyaan@gmail.com', 'abc123', 33, 'male', 2, '', 1, 0, NULL, NULL, NULL),
(29, 'sadi-raja', 'Khotyoon wala', 'khotyan@gmail.com', 'abc123', 32, 'male', 2, '', 1, 0, NULL, NULL, NULL),
(30, 'Sadi pedepa', 'Sadi Raja', 'rajdakhotyaan@gmail.com', 'abc123', 33, 'male', 2, 'Player', 1, 0, NULL, NULL, NULL),
(31, 'Peepal', 'Admin', 'peepal@gmail.com', 'abc123', 23, 'male', 2, 'Player', 1, 0, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livescores`
--
ALTER TABLE `livescores`
  ADD CONSTRAINT `livescores_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livescores_ibfk_2` FOREIGN KEY (`teaminnings`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_4` FOREIGN KEY (`winningteam`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_ibfk_4` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
  ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `sub_coordinator` (`sc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`sc_id`) REFERENCES `sub_coordinator` (`sc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
