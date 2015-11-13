-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 05:51 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp4711`
--

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

DROP TABLE IF EXISTS `roster`;
CREATE TABLE IF NOT EXISTS `roster` (
  `ID` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `Name` varchar(22) NOT NULL,
  `Pos` varchar(3) NOT NULL,
  `Status` varchar(3) NOT NULL,
  `Height` varchar(5) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Birthdate` date NOT NULL,
  `Exp` int(11) NOT NULL,
  `College` varchar(19) NOT NULL,
  `Photo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`ID`, `No`, `Name`, `Pos`, `Status`, `Height`, `Weight`, `Birthdate`, `Exp`, `College`, `Photo`) VALUES
(1, 76, 'Adams, Mike', 'T', 'PUP', '6''7"', 323, '0000-00-00', 4, 'Ohio State', NULL),
(2, 28, 'Allen, Cortez', 'CB', 'RES', '6''1"', 197, '0000-00-00', 5, 'The Citadel', NULL),
(3, 20, 'Allen, Will', 'SS', 'ACT', '6''1"', 202, '0000-00-00', 12, 'Ohio State', NULL),
(4, 68, 'Beachum, Kelvin', 'T', 'RES', '6''3"', 303, '0000-00-00', 4, 'Southern Methodist', NULL),
(5, 26, 'Bell, Le''Veon', 'RB', 'RES', '6''1"', 244, '0000-00-00', 3, 'Michigan State', NULL),
(6, 4, 'Berry, Jordan', 'P', 'ACT', '6''5"', 195, '0000-00-00', 1, 'Eastern Kentucky', NULL),
(7, 41, 'Blake, Antwon', 'CB', 'ACT', '5''9"', 198, '0000-00-00', 4, 'Texas-El Paso', NULL),
(8, 87, 'Blanchflower, Rob', 'TE', 'RES', '6''4"', 256, '0000-00-00', 1, 'Massachusetts', NULL),
(9, 6, 'Boswell, Chris', 'K', 'ACT', '6''2"', 185, '0000-00-00', 1, 'Rice', NULL),
(10, 25, 'Boykin, Brandon', 'DB', 'ACT', '5''10"', 182, '0000-00-00', 4, 'Georgia', NULL),
(11, 84, 'Brown, Antonio', 'WR', 'ACT', '5''10"', 181, '0000-00-00', 6, 'Central Michigan', NULL),
(12, 10, 'Bryant, Martavis', 'WR', 'ACT', '6''4"', 211, '0000-00-00', 2, 'Clemson', NULL),
(13, 56, 'Chickillo, Anthony', 'DE', 'ACT', '6''3"', 267, '0000-00-00', 0, 'Miami (Fla.)', NULL),
(14, 14, 'Coates, Sammie', 'WR', 'ACT', '6''1"', 212, '0000-00-00', 0, 'Auburn', NULL),
(15, 31, 'Cockrell, Ross', 'DB', 'ACT', '6''0"', 191, '0000-00-00', 2, 'Duke', NULL),
(16, 66, 'DeCastro, David', 'G', 'ACT', '6''5"', 316, '0000-00-00', 4, 'Stanford', NULL),
(17, 48, 'Dupree, Bud', 'LB', 'ACT', '6''4"', 269, '0000-00-00', 0, 'Kentucky', NULL),
(18, 73, 'Foster, Ramon', 'G', 'ACT', '6''5"', 328, '0000-00-00', 7, 'Tennessee', NULL),
(19, 57, 'Garvin, Terence', 'ILB', 'ACT', '6''2"', 222, '0000-00-00', 3, 'West Virginia', NULL),
(20, 22, 'Gay, William', 'CB', 'ACT', '5''10"', 187, '0000-00-00', 9, 'Louisville', NULL),
(21, 96, 'Geathers, Clifton', 'DT', 'RES', '6''8"', 325, '0000-00-00', 6, 'South Carolina', NULL),
(22, 77, 'Gilbert, Marcus', 'T', 'ACT', '6''6"', 330, '0000-00-00', 5, 'Florida', NULL),
(23, 21, 'Golden, Robert', 'SS', 'ACT', '5''11"', 202, '0000-00-00', 4, 'Arizona', NULL),
(24, 27, 'Golson, Senquez', 'CB', 'RES', '5''9"', 176, '0000-00-00', 0, 'Mississippi', NULL),
(25, 5, 'Gradkowski, Bruce', 'QB', 'RES', '6''1"', 220, '0000-00-00', 10, 'Toledo', NULL),
(26, 24, 'Grant, Doran', 'CB', 'ACT', '5''10"', 200, '0000-00-00', 0, 'Ohio State', NULL),
(27, 92, 'Harrison, James', 'OLB', 'ACT', '6''0"', 242, '0000-00-00', 13, 'Kent State', NULL),
(28, 0, 'Hatchie, Micah', 'T', 'RES', '6''5"', 304, '0000-00-00', 0, 'Washington', NULL),
(29, 97, 'Heyward, Cameron', 'DE', 'ACT', '6''5"', 295, '0000-00-00', 5, 'Ohio State', NULL),
(30, 88, 'Heyward-Bey, Darrius', 'WR', 'ACT', '6''2"', 210, '0000-00-00', 7, 'Maryland', NULL),
(31, 74, 'Hubbard, Chris', 'G', 'ACT', '6''4"', 295, '0000-00-00', 2, 'Alabama-Birmingham', NULL),
(32, 81, 'James, Jesse', 'TE', 'ACT', '6''7"', 261, '0000-00-00', 0, 'Penn State', NULL),
(33, 46, 'Johnson, Will', 'FB', 'ACT', '6''2"', 240, '0000-00-00', 4, 'West Virginia', NULL),
(34, 95, 'Jones, Jarvis', 'OLB', 'ACT', '6''3"', 248, '0000-00-00', 3, 'Georgia', NULL),
(35, 3, 'Jones, Landry', 'QB', 'ACT', '6''4"', 225, '0000-00-00', 3, 'Oklahoma', NULL),
(36, 13, 'Jones, Jacoby', 'WR', 'ACT', '6''4"', 215, '0000-00-00', 9, 'Lane', NULL),
(37, 64, 'Legursky, Doug', 'C', 'ACT', '6''1"', 323, '0000-00-00', 7, 'Marshall', NULL),
(38, 62, 'McCullers-Sanders, Dan', 'NT', 'ACT', '6''7"', 352, '0000-00-00', 2, 'Tennessee', NULL),
(39, 90, 'McLendon, Steve', 'NT', 'ACT', '6''3"', 310, '0000-00-00', 6, 'Troy', NULL),
(40, 83, 'Miller, Heath', 'TE', 'ACT', '6''5"', 256, '0000-00-00', 11, 'Virginia', NULL),
(41, 23, 'Mitchell, Mike', 'FS', 'ACT', '6''1"', 221, '0000-00-00', 7, 'Ohio U.', NULL),
(42, 55, 'Moats, Arthur', 'OLB', 'ACT', '6''0"', 246, '0000-00-00', 6, 'James Madison', NULL),
(43, 15, 'Nelson, David', 'WR', 'RES', '6''5"', 215, '0000-00-00', 6, 'Florida', NULL),
(44, 45, 'Nix, Roosevelt', 'FB', 'ACT', '5''11"', 248, '0000-00-00', 1, 'Kent State', NULL),
(45, 69, 'Palmer, Kelvin', 'OT', 'RES', '6''4"', 290, '0000-00-00', 1, 'Baylor', NULL),
(46, 44, 'Pead, Isaiah', 'RB', 'ACT', '5''10"', 204, '0000-00-00', 4, 'Cincinnati', NULL),
(47, 53, 'Pouncey, Maurkice', 'C', 'RES', '6''4"', 304, '0000-00-00', 6, 'Florida', NULL),
(48, 7, 'Roethlisberger, Ben', 'QB', 'ACT', '6''5"', 240, '0000-00-00', 12, 'Miami (Ohio)', NULL),
(49, 0, 'Rogers, Eli', 'WR', 'RES', '5''10"', 180, '0000-00-00', 0, 'Louisville', NULL),
(50, 50, 'Shazier, Ryan', 'ILB', 'ACT', '6''1"', 230, '0000-00-00', 2, 'Ohio State', NULL),
(51, 89, 'Spaeth, Matt', 'TE', 'ACT', '6''7"', 262, '0000-00-00', 9, 'Minnesota', NULL),
(52, 51, 'Spence, Sean', 'ILB', 'ACT', '5''11"', 231, '0000-00-00', 4, 'Miami (Fla.)', NULL),
(53, 68, 'Stingily, Byron', 'T', 'ACT', '6''5"', 318, '0000-00-00', 5, 'Louisville', NULL),
(54, 6, 'Suisham, Shaun', 'K', 'RES', '6''0"', 200, '0000-00-00', 11, 'Bowling Green State', NULL),
(55, 93, 'Thomas, Cam', 'DE', 'ACT', '6''4"', 335, '0000-00-00', 6, 'North Carolina', NULL),
(56, 29, 'Thomas, Shamarko', 'SS', 'ACT', '5''9"', 205, '0000-00-00', 3, 'Syracuse', NULL),
(57, 94, 'Timmons, Lawrence', 'ILB', 'ACT', '6''1"', 234, '0000-00-00', 9, 'Florida State', NULL),
(58, 30, 'Todman, Jordan', 'RB', 'ACT', '5''9"', 203, '0000-00-00', 4, 'Connecticut', NULL),
(59, 91, 'Tuitt, Stephon', 'DE', 'ACT', '6''6"', 303, '0000-00-00', 2, 'Notre Dame', NULL),
(60, 64, 'Van Dyk, Mitchell', 'T', 'RES', '6''7"', 299, '0000-00-00', 1, 'Portland State', NULL),
(61, 2, 'Vick, Mike', 'QB', 'ACT', '6''0"', 210, '0000-00-00', 15, 'Virginia Tech', NULL),
(62, 78, 'Villanueva, Alejandro', 'T', 'ACT', '6''9"', 320, '0000-00-00', 1, 'Army', NULL),
(63, 72, 'Wallace, Cody', 'C', 'ACT', '6''4"', 296, '0000-00-00', 6, 'Texas A&M', NULL),
(64, 96, 'Walton, L.T.', 'DT', 'ACT', '6''5"', 305, '0000-00-00', 0, 'Central Michigan', NULL),
(65, 60, 'Warren, Greg', 'LS', 'ACT', '6''3"', 252, '0000-00-00', 11, 'North Carolina', NULL),
(66, 11, 'Wheaton, Markus', 'WR', 'ACT', '5''11"', 189, '0000-00-00', 3, 'Oregon State', NULL),
(67, 34, 'Williams, DeAngelo', 'RB', 'ACT', '5''9"', 207, '0000-00-00', 10, 'Memphis', NULL),
(68, 98, 'Williams, Vince', 'ILB', 'ACT', '6''1"', 253, '0000-00-00', 3, 'Florida State', NULL),
(69, 56, 'Zumwalt, Jordan', 'OLB', 'RES', '6''4"', 235, '0000-00-00', 2, 'UCLA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `standings`
--

DROP TABLE IF EXISTS `standings`;
CREATE TABLE IF NOT EXISTS `standings` (
  `ID` int(11) NOT NULL,
  `League` varchar(20) NOT NULL,
  `W` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `T` bit(1) NOT NULL,
  `Pct1` decimal(5,3) NOT NULL,
  `PF` int(11) NOT NULL,
  `PA` int(11) NOT NULL,
  `Net_Pts` int(11) NOT NULL,
  `TD` int(11) NOT NULL,
  `Home` varchar(3) NOT NULL,
  `Road` varchar(3) NOT NULL,
  `Division` varchar(3) NOT NULL,
  `Pct2` decimal(5,3) DEFAULT NULL,
  `Conf` varchar(3) NOT NULL,
  `Pct3` decimal(5,3) DEFAULT NULL,
  `NonConf` varchar(3) NOT NULL,
  `Streak` varchar(2) NOT NULL,
  `Last_5` varchar(3) NOT NULL,
  `Team` varchar(14) NOT NULL,
  `Season` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standings`
--

INSERT INTO `standings` (`ID`, `League`, `W`, `L`, `T`, `Pct1`, `PF`, `PA`, `Net_Pts`, `TD`, `Home`, `Road`, `Division`, `Pct2`, `Conf`, `Pct3`, `NonConf`, `Streak`, `Last_5`, `Team`, `Season`) VALUES
(1, 'New England Patriots', 8, 0, b'0', '1.000', 276, 143, 133, 31, '5-0', '3-0', '3-0', '1.000', '6-0', '1.000', '2-0', '8W', '5-0', 'AFC East Team', 'American Football Conference - 2015 Regular Season'),
(2, 'New York Jets', 5, 3, b'0', '0.625', 200, 162, 38, 23, '3-1', '2-2', '1-1', '0.500', '4-2', '0.667', '1-1', '1W', '3-2', 'AFC East Team', 'American Football Conference - 2015 Regular Season'),
(3, 'Buffalo Bills', 4, 4, b'0', '0.500', 209, 190, 19, 26, '2-3', '2-1', '2-1', '0.667', '4-3', '0.571', '0-1', '1W', '2-3', 'AFC East Team', 'American Football Conference - 2015 Regular Season'),
(4, 'Miami Dolphins', 3, 5, b'0', '0.375', 171, 206, -35, 22, '1-2', '2-3', '0-4', '0.000', '2-5', '0.286', '1-0', '2L', '2-3', 'AFC East Team', 'American Football Conference - 2015 Regular Season'),
(5, 'Cincinnati Bengals', 8, 0, b'0', '1.000', 229, 142, 87, 28, '4-0', '4-0', '3-0', '1.000', '7-0', '1.000', '1-0', '8W', '5-0', 'AFC North Team', 'American Football Conference - 2015 Regular Season'),
(6, 'Pittsburgh Steelers', 5, 4, b'0', '0.556', 206, 182, 24, 22, '3-2', '2-2', '0-2', '0.000', '2-4', '0.333', '3-0', '1W', '3-2', 'AFC North Team', 'American Football Conference - 2015 Regular Season'),
(7, 'Baltimore Ravens', 2, 6, b'0', '0.250', 190, 214, -24, 19, '1-2', '1-4', '1-2', '0.333', '2-4', '0.333', '0-2', '1W', '2-3', 'AFC North Team', 'American Football Conference - 2015 Regular Season'),
(8, 'Cleveland Browns', 2, 7, b'0', '0.222', 177, 247, -70, 19, '1-3', '1-4', '1-1', '0.500', '2-5', '0.286', '0-2', '4L', '1-4', 'AFC North Team', 'American Football Conference - 2015 Regular Season'),
(9, 'Indianapolis Colts', 4, 5, b'0', '0.444', 200, 227, -27, 24, '2-3', '2-2', '3-0', '1.000', '4-3', '0.571', '0-2', '1W', '2-3', 'AFC South Team', 'American Football Conference - 2015 Regular Season'),
(10, 'Houston Texans', 3, 5, b'0', '0.375', 174, 205, -31, 21, '2-2', '1-3', '2-1', '0.667', '2-3', '0.400', '1-2', '1W', '2-3', 'AFC South Team', 'American Football Conference - 2015 Regular Season'),
(11, 'Jacksonville Jaguars', 2, 6, b'0', '0.250', 170, 235, -65, 20, '2-2', '0-4', '0-2', '0.000', '2-4', '0.333', '0-2', '1L', '1-4', 'AFC South Team', 'American Football Conference - 2015 Regular Season'),
(12, 'Tennessee Titans', 2, 6, b'0', '0.250', 159, 187, -28, 19, '0-4', '2-2', '0-2', '0.000', '0-5', '0.000', '2-1', '1W', '1-4', 'AFC South Team', 'American Football Conference - 2015 Regular Season'),
(13, 'Denver Broncos', 7, 1, b'0', '0.875', 192, 139, 53, 19, '3-0', '4-1', '2-0', '1.000', '4-1', '0.800', '3-0', '1L', '4-1', 'AFC West Team', 'American Football Conference - 2015 Regular Season'),
(14, 'Oakland Raiders', 4, 4, b'0', '0.500', 213, 211, 2, 25, '2-2', '2-2', '1-1', '0.500', '4-3', '0.571', '0-1', '1L', '2-3', 'AFC West Team', 'American Football Conference - 2015 Regular Season'),
(15, 'Kansas City Chiefs', 3, 5, b'0', '0.375', 195, 182, 13, 21, '2-2', '1-3', '0-1', '0.000', '2-2', '0.500', '1-3', '2W', '2-3', 'AFC West Team', 'American Football Conference - 2015 Regular Season'),
(16, 'San Diego Chargers', 2, 7, b'0', '0.222', 210, 249, -39, 23, '2-3', '0-4', '0-1', '0.000', '1-4', '0.200', '1-3', '5L', '0-5', 'AFC West Team', 'American Football Conference - 2015 Regular Season'),
(17, 'New York Giants', 5, 4, b'0', '0.556', 247, 226, 21, 27, '3-1', '2-3', '2-2', '0.500', '4-4', '0.500', '1-0', '1W', '3-2', 'NFC East Team', 'National Football Conference - 2015 Regular Season'),
(18, 'Philadelphia Eagles', 4, 4, b'0', '0.500', 193, 164, 29, 22, '2-1', '2-3', '2-2', '0.500', '3-4', '0.429', '1-0', '1W', '3-2', 'NFC East Team', 'National Football Conference - 2015 Regular Season'),
(19, 'Washington Redskins', 3, 5, b'0', '0.375', 158, 195, -37, 17, '3-1', '0-4', '1-1', '0.500', '3-2', '0.600', '0-3', '1L', '2-3', 'NFC East Team', 'National Football Conference - 2015 Regular Season'),
(20, 'Dallas Cowboys', 2, 6, b'0', '0.250', 160, 204, -44, 16, '1-4', '1-2', '2-2', '0.500', '2-5', '0.286', '0-1', '6L', '0-5', 'NFC East Team', 'National Football Conference - 2015 Regular Season'),
(21, 'Green Bay Packers', 6, 2, b'0', '0.750', 203, 167, 36, 24, '4-0', '2-2', '1-0', '1.000', '4-1', '0.800', '2-1', '2L', '3-2', 'NFC North Team', 'National Football Conference - 2015 Regular Season'),
(22, 'Minnesota Vikings', 6, 2, b'0', '0.750', 168, 140, 28, 16, '4-0', '2-2', '3-0', '1.000', '4-1', '0.800', '2-1', '4W', '4-1', 'NFC North Team', 'National Football Conference - 2015 Regular Season'),
(23, 'Chicago Bears', 3, 5, b'0', '0.375', 162, 221, -59, 16, '1-3', '2-2', '0-3', '0.000', '0-5', '0.000', '3-0', '1W', '3-2', 'NFC North Team', 'National Football Conference - 2015 Regular Season'),
(24, 'Detroit Lions', 1, 7, b'0', '0.125', 149, 245, -96, 18, '1-3', '0-4', '1-2', '0.333', '1-4', '0.200', '0-3', '2L', '1-4', 'NFC North Team', 'National Football Conference - 2015 Regular Season'),
(25, 'Carolina Panthers', 8, 0, b'0', '1.000', 228, 165, 63, 26, '5-0', '3-0', '2-0', '1.000', '5-0', '1.000', '3-0', '8W', '5-0', 'NFC South Team', 'National Football Conference - 2015 Regular Season'),
(26, 'Atlanta Falcons', 6, 3, b'0', '0.667', 229, 190, 39, 27, '3-1', '3-2', '0-2', '0.000', '4-3', '0.571', '2-0', '2L', '2-3', 'NFC South Team', 'National Football Conference - 2015 Regular Season'),
(27, 'New Orleans Saints', 4, 5, b'0', '0.444', 241, 268, -27, 31, '3-2', '1-3', '1-2', '0.333', '3-4', '0.429', '1-1', '1L', '3-2', 'NFC South Team', 'National Football Conference - 2015 Regular Season'),
(28, 'Tampa Bay Buccaneers', 3, 5, b'0', '0.375', 181, 231, -50, 18, '1-3', '2-2', '2-1', '0.667', '2-3', '0.400', '1-2', '1L', '2-3', 'NFC South Team', 'National Football Conference - 2015 Regular Season'),
(29, 'Arizona Cardinals', 6, 2, b'0', '0.750', 263, 153, 110, 32, '3-1', '3-1', '1-1', '0.500', '4-1', '0.800', '2-1', '2W', '3-2', 'NFC West Team', 'National Football Conference - 2015 Regular Season'),
(30, 'St. Louis Rams', 4, 4, b'0', '0.500', 153, 146, 7, 16, '3-1', '1-3', '3-0', '1.000', '3-3', '0.500', '1-1', '1L', '3-2', 'NFC West Team', 'National Football Conference - 2015 Regular Season'),
(31, 'Seattle Seahawks', 4, 4, b'0', '0.500', 167, 140, 27, 16, '2-1', '2-3', '1-1', '0.500', '4-3', '0.571', '0-1', '2W', '3-2', 'NFC West Team', 'National Football Conference - 2015 Regular Season'),
(32, 'San Francisco 49ers', 3, 6, b'0', '0.333', 126, 223, -97, 12, '3-2', '0-4', '0-3', '0.000', '2-5', '0.286', '1-1', '1W', '2-3', 'NFC West Team', 'National Football Conference - 2015 Regular Season');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `standings`
--
ALTER TABLE `standings`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
