-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2015 at 02:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
`dept_id` int(11) NOT NULL,
  `dept_name` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
`g_id` int(255) NOT NULL,
  `g_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
`id` int(255) NOT NULL,
  `match_id` int(22) NOT NULL,
  `teaminnings` int(255) NOT NULL,
  `is_playing` tinyint(1) NOT NULL,
  `over` int(12) NOT NULL,
  `runs` int(30) NOT NULL,
  `wicket` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livescores`
--

INSERT INTO `livescores` (`id`, `match_id`, `teaminnings`, `is_playing`, `over`, `runs`, `wicket`, `datetime`) VALUES
(1, 5, 1, 0, 1, 12, 1, '2015-11-05 05:54:27'),
(2, 5, 1, 0, 2, 34, 2, '2015-11-05 05:54:27'),
(5, 5, 1, 0, 3, 13, 1, '2015-11-05 05:54:27'),
(7, 5, 1, 0, 4, 11, 0, '2015-11-05 05:54:27'),
(9, 5, 1, 0, 5, 3, 0, '2015-11-05 05:54:27'),
(10, 5, 1, 0, 6, 4, 0, '2015-11-05 05:54:27'),
(11, 5, 1, 0, 7, 4, 1, '2015-11-05 05:54:27'),
(12, 5, 1, 0, 8, 12, 0, '2015-11-05 05:54:27'),
(27, 5, 1, 0, 9, 12, 0, '2015-11-05 05:54:27'),
(28, 5, 1, 0, 10, 12, 0, '2015-11-05 05:54:27'),
(40, 5, 1, 0, 12, 1, 1, '2015-11-05 05:54:27'),
(42, 5, 1, 0, 11, 12, 1, '2015-11-05 05:54:27'),
(48, 4, 2, 0, 1, 11, 1, '2015-11-07 12:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
`match_id` int(255) NOT NULL,
  `team1_id` int(255) NOT NULL,
  `team2_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `match_date_time` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `matchstatus` enum('live','completed','scheduled','') NOT NULL,
  `winningteam` int(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `team1_id`, `team2_id`, `g_id`, `match_date_time`, `location`, `matchstatus`, `winningteam`, `comments`) VALUES
(4, 1, 2, 1, '2015-09-09 12:19:00', 'rwp stadium', 'live', NULL, ''),
(5, 2, 1, 1, '2015-09-16 14:36:43', 'nawaz sharif park', 'completed', 2, 'by 33 runs'),
(6, 1, 1, 1, '2015-09-23 00:00:00', 'jinnah park', 'live', NULL, ''),
(7, 2, 1, 2, '2015-09-24 00:00:00', 'football stadium', 'live', NULL, ''),
(8, 2, 2, 1, '2015-09-24 00:00:00', 'Jhanda ground', 'scheduled', NULL, ''),
(9, 1, 2, 2, '2015-09-27 00:00:00', 'footbal ground', 'scheduled', NULL, ''),
(10, 3, 4, 2, '2015-10-20 05:14:14', 'ground', 'live', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `match scores`
--

CREATE TABLE IF NOT EXISTS `match scores` (
`ms_id` int(255) NOT NULL,
  `team1_id` int(255) NOT NULL,
  `team2_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `team1_score` int(255) NOT NULL,
  `team2_score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(255) NOT NULL,
  `news_heading` varchar(255) NOT NULL,
  `newsdescription` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `featured` tinyint(1) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_heading`, `newsdescription`, `date`, `featured`, `img`) VALUES
(1, 'Breaking news', 'the captain of ....................', '2015-10-20 19:00:00', 0, ''),
(2, 'Up coming ', 'match between afridi and tuk tuk', '2015-10-22 19:00:00', 0, ''),
(3, 'Bad news', 'afridi is not playing in tomorrow match due to serious injury', '2015-10-29 19:00:00', 0, ''),
(4, 'Shocking news', 'who take more than 4 wickets in a match ives a cash of 100$', '2015-10-28 19:00:00', 0, ''),
(6, 'lala g is injured', 'lala gya', '2015-11-10 19:00:00', 0, ''),
(10, 'Final is on monday', 'mondy........................', '2015-11-07 12:42:14', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
`player_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `game_role` enum('Batsman','Bowler','All rounder','Goal keeper','wicket keeper','Snooker player','Table tennis player','tennis player','Squash player','vollyball player','football player','hockey player','basketball player') NOT NULL,
  `dept_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `st_id` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `user_id`, `game_role`, `dept_id`, `g_id`, `st_id`) VALUES
(3, 7, 'Bowler', 3, 1, 2),
(4, 8, 'All rounder', 4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
`r_id` int(255) NOT NULL,
  `sc_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
`result_id` int(255) NOT NULL,
  `team_id` int(255) NOT NULL,
  `match_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `status` enum('completed','','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `team_id`, `match_id`, `g_id`, `comments`, `status`) VALUES
(2, 2, 5, 1, 'by 33 runs', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `sub-coordinator`
--

CREATE TABLE IF NOT EXISTS `sub-coordinator` (
`sc_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub-coordinator`
--

INSERT INTO `sub-coordinator` (`sc_id`, `user_id`) VALUES
(1, 3),
(2, 4),
(3, 27),
(4, 28);

-- --------------------------------------------------------

--
-- Table structure for table `team record`
--

CREATE TABLE IF NOT EXISTS `team record` (
`team_record_id` int(255) NOT NULL,
  `team_id` int(255) NOT NULL,
  `played` int(255) NOT NULL,
  `win` int(255) NOT NULL,
  `lose` int(255) NOT NULL,
  `draw` int(255) NOT NULL,
  `points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
`team_id` int(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `g_id` int(255) NOT NULL,
  `sc_id` int(255) NOT NULL,
  `teamlogo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `dept_id`, `g_id`, `sc_id`, `teamlogo`) VALUES
(1, 'bs 11', 2, 1, 1, ''),
(2, 'cs 11', 3, 1, 2, ''),
(3, 'football army', 4, 2, 3, ''),
(4, 'cheta', 5, 2, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `user-status`
--

CREATE TABLE IF NOT EXISTS `user-status` (
`st_id` int(10) NOT NULL,
  `st_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-status`
--

INSERT INTO `user-status` (`st_id`, `st_name`) VALUES
(1, 'active'),
(2, 'acccepted'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `age` int(40) NOT NULL,
  `gender` enum('male','female','','') DEFAULT NULL,
  `dept_id` int(255) DEFAULT NULL,
  `user_role` enum('Admin','Coordinator','Sub-coordinator','Player') NOT NULL,
  `g_id` int(255) DEFAULT NULL,
  `status_id` int(10) NOT NULL,
  `languages` text,
  `introduction` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `email`, `password`, `age`, `gender`, `dept_id`, `user_role`, `g_id`, `status_id`, `languages`, `introduction`, `images`) VALUES
(1, 'juni', 'junaid anwar', 'j@j.com', 'juni123', 23, 'male', 2, 'Admin', 1, 1, 'English', 'i am admin in this portal and responsible for this sitre management', ''),
(3, 'imran', 'imraan shukat', 'i@g.com', 'imran11', 22, 'male', 2, 'Sub-coordinator', 1, 1, 'Urdu', 'i am here to finalize the teams of individual game', ''),
(4, 'faian', 'faizan iqbal', 'fazi@f.com', 'faizan33', 23, 'male', 3, 'Sub-coordinator', 1, 1, 'English', 'i am here to finalize the teams of individual game', ''),
(7, 'rashid', 'rashid nawaz', 'rashid@gmail.com', 'rashid', 24, 'male', 3, 'Player', 1, 1, 'Urdu', 'i am a player speciaality in batting', ''),
(8, 'rehan', 'rehan quersi', 'r@r.com', 'asdf', 23, 'male', 4, 'Player', 1, 1, 'Arabic', 'i am a player speciaality in bowling', ''),
(10, 'md1122', 'mudassarr iqbal', 'md81334@gmail.com', 'mudassar', 20, 'male', 2, 'Admin', 1, 1, 'English', '', ''),
(11, 'kala', 'kala khan', 'kal@k.com', 'kala123', 20, 'male', 2, 'Admin', 1, 1, 'English', '', ''),
(12, 'hatti', 'hatti khan', 'hati@h.com', 'hatti', 20, 'male', 2, 'Admin', 1, 1, 'English', '', ''),
(13, 'Admin', 'Admin mirza', 'admin@sport.com', 'abc', 20, 'male', 2, 'Admin', 1, 1, 'English', '', ''),
(15, 'kaka', 'kaka don', 'k@k.com', 'asd', 0, NULL, 2, 'Admin', 1, 1, NULL, NULL, NULL),
(16, 'mano', 'mano', 'm@m.com', 'mano', 23, NULL, NULL, 'Admin', NULL, 1, NULL, NULL, NULL),
(18, 'ali', 'ali raza', 'ali@g.com', 'asd', 23, 'male', 2, '', 1, 1, NULL, NULL, NULL),
(20, 'alu', 'ali ali', 'ali@a.com', 'alualu', 22, 'male', 5, 'Player', 2, 2, 'urdu english', 'i wanna to play fb', NULL),
(21, 'lgr bgr', 'lgrlu', 'lgr@lgr.com', 'lgrbgr', 22, 'male', 4, 'Player', 2, 2, NULL, NULL, NULL),
(22, 'mani', 'mani kala', 'mani@m.com', 'mani', 22, 'male', 10, 'Player', 4, 2, NULL, NULL, NULL),
(24, 'abuu', 'aba j', 'aba@papa.com', 'papag', 23, 'male', 2, 'Player', 1, 2, NULL, NULL, NULL),
(27, 'abid', 'abid ali', 'abid@a.com', 'abid', 21, 'male', 4, 'Sub-coordinator', 2, 1, NULL, NULL, NULL),
(28, 'azam', 'azam', 'azam@a.com', 'azam', 21, 'male', 5, 'Sub-coordinator', 2, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
 ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `livescores`
--
ALTER TABLE `livescores`
 ADD PRIMARY KEY (`id`), ADD KEY `match_id` (`match_id`), ADD KEY `teaminnings` (`teaminnings`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
 ADD PRIMARY KEY (`match_id`), ADD KEY `team1_id` (`team1_id`), ADD KEY `team2_id` (`team2_id`), ADD KEY `g_id` (`g_id`), ADD KEY `winningteam` (`winningteam`);

--
-- Indexes for table `match scores`
--
ALTER TABLE `match scores`
 ADD PRIMARY KEY (`ms_id`), ADD KEY `team1_id` (`team1_id`), ADD KEY `team2_id` (`team2_id`), ADD KEY `g_id` (`g_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
 ADD PRIMARY KEY (`player_id`), ADD KEY `user_id` (`user_id`), ADD KEY `dept_id` (`dept_id`), ADD KEY `g_id` (`g_id`), ADD KEY `st_id` (`st_id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
 ADD PRIMARY KEY (`r_id`), ADD KEY `sc_id` (`sc_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
 ADD PRIMARY KEY (`result_id`), ADD KEY `team_id` (`team_id`), ADD KEY `match_id` (`match_id`), ADD KEY `g_id` (`g_id`);

--
-- Indexes for table `sub-coordinator`
--
ALTER TABLE `sub-coordinator`
 ADD PRIMARY KEY (`sc_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `team record`
--
ALTER TABLE `team record`
 ADD PRIMARY KEY (`team_record_id`), ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
 ADD PRIMARY KEY (`team_id`), ADD KEY `g_id` (`g_id`), ADD KEY `sc_id` (`sc_id`), ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `user-status`
--
ALTER TABLE `user-status`
 ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD KEY `dept_id` (`dept_id`), ADD KEY `g_id` (`g_id`), ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
MODIFY `g_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `livescores`
--
ALTER TABLE `livescores`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
MODIFY `match_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `match scores`
--
ALTER TABLE `match scores`
MODIFY `ms_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
MODIFY `player_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
MODIFY `result_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub-coordinator`
--
ALTER TABLE `sub-coordinator`
MODIFY `sc_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `team record`
--
ALTER TABLE `team record`
MODIFY `team_record_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
MODIFY `team_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user-status`
--
ALTER TABLE `user-status`
MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `match scores`
--
ALTER TABLE `match scores`
ADD CONSTRAINT `match scores_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `match scores_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `match scores_ibfk_3` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `player`
--
ALTER TABLE `player`
ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `player_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `player_ibfk_4` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `player_ibfk_5` FOREIGN KEY (`st_id`) REFERENCES `user-status` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminder`
--
ALTER TABLE `reminder`
ADD CONSTRAINT `reminder_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `sub-coordinator` (`sc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub-coordinator`
--
ALTER TABLE `sub-coordinator`
ADD CONSTRAINT `sub-coordinator_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ADD CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`sc_id`) REFERENCES `sub-coordinator` (`sc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`g_id`) REFERENCES `games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `user-status` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
