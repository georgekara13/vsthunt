-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2017 at 07:05 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsthuntdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactmsg`
--

CREATE TABLE `contactmsg` (
  `msgid` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phonenumber` varchar(100) DEFAULT NULL,
  `Message` varchar(255) NOT NULL DEFAULT 'NOT NULL'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactmsg`
--

INSERT INTO `contactmsg` (`msgid`, `Email`, `Phonenumber`, `Message`) VALUES
(1, 'giagia@netmail.gr', '', 'Exei kruo eksw zmre, fora thn flokath.'),
(12, 'lordnigeria@mail.net', '', 'Hello friend I am lord of nigeria,And want to get rid of 10% of my money for tax reasons.Pls send me back your bank details,we talk about 2milion USD.Thanks,I hope we talk soon!'),
(17, 'gorj@mail.net', '6598', 'csweijcdm dv');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `userloginid` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`userloginid`, `time`) VALUES
(11, '1494189230'),
(11, '1494189239'),
(11, '1494189255'),
(11, '1494189264'),
(11, '1494189271'),
(11, '1494189289'),
(8, '1494604401'),
(8, '1495624280'),
(8, '1495624301'),
(8, '1498333673');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `mark_id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`mark_id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Athens Pro Audio', '26 Asklhpiou Street, Athens, Greece', 37.983, 23.7374, 'Digital Synth retailer'),
(2, 'Sweetwater', '5501 U.S. Hwy 30 W, Fort Wayne, IN 46818, United States', 41.1242, -85.2129, 'Digital Synth retailer'),
(3, 'Decks', '4-6, Burlington Parade, Edgware Rd, London NW2 6QG, UK', 51.5599, -0.218759, 'Mixer effect retailer'),
(4, 'Music store professional', 'Instabulstrade 22-26, 51103 Koln, Germany', 50.9458, 6.99716, 'Digital Synth retailer'),
(5, 'Audiomidi', 'Leof. Mesogeion 392, Ag. Paraskevi 153 41, Greece', 38.0124, 23.8171, 'Digital Synth retailer'),
(6, 'ZAXOS music store', 'I. Michail 1, Sikies 566 25, Greece', 40.6465, 22.9486, 'Mixer effect retailer');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`userid`, `username`, `email`, `password`, `firstname`, `lastname`) VALUES
(8, 'gorj', 'gorjlee@mail.com', '$2y$10$tqY9E20li4t.jDzmR58E4ON5DWU3h3aq.NPKv.vEIpWdiglPDz3rK', 'gorj', 'lee'),
(9, 'foufoutos', 'kyr_foufoutos@mail.uop.gr', '$2y$10$DFmnYR8kGLOB1Ofn7NZpmOtPRiw26brhC3/mwWJT/7GeNI7qypOFm', 'foufoutos', 'foufoufoufoutidhs'),
(10, 'ayylmao', 'ayylmao@netspace.com', '$2y$10$LdsIxDf7kN5hvKhGQZnY0Oco2WzPhX02aOxg7GANmYL8Jiyw8EadC', 'ayy', 'lmao'),
(11, 'madcst', 'mad@yahoo.gr', '$2y$10$9u1fNF2xyoqv9uxzhTHutu3of.Ebi2Rx9L7utBJC4GYUmnjuKRPi2', 'cst', 'mad'),
(12, 'teriblol', 'terib-lol@mail.net', '$2y$10$X9uX//XrKKbUU8o3cq/PLevjmm985lJ78GJRWI0u3V/p6DKcHX4A6', 'teri', 'blol'),
(13, 'filip', 'filip@yahoo.gr', '$2y$10$ui2Exe1A29u9F2kyDnXtDO28jDQOoXd1aCFqgTtqQvxwd1VsYwZv6', 'filip', 'panits'),
(14, 'gorjlee', 'dasijc@mail.net', '$2y$10$ZH/2k2rAEPD54Bwjg6oMWOJPLYC07WoSGmuGNaup3fMYMrpZlon..', 'gorj', 'lee'),
(15, 'odysnutellas', 'odys420@mail.net', '$2y$10$vG5V/.Nz3jJ.JjXFYzYAU.FkJcm08TtA3p0tLl/CHx027tSztRBYG', 'odys', 'koutelas');

-- --------------------------------------------------------

--
-- Table structure for table `pluginslist`
--

CREATE TABLE `pluginslist` (
  `id` int(11) NOT NULL,
  `Ranking` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Category` text NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `imagethumb` varchar(200) DEFAULT NULL,
  `imagefull` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pluginslist`
--

INSERT INTO `pluginslist` (`id`, `Ranking`, `Name`, `Category`, `Rating`, `imagethumb`, `imagefull`) VALUES
(1, 1, 'Xfer Serum', 'Digital synth', 5, 'F:\\wamp64\\www\\public_html\\img\\xfer-serum-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\xfer-serum.jpg'),
(2, 2, 'NI Massive', 'Digital synth', 4, 'F:\\wamp64\\www\\public_html\\img\\ni-massive-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\ni-massive.jpg'),
(3, 3, 'izotope trash 2', 'Mixer effect', 4, 'F:\\wamp64\\www\\public_html\\img\\izotope-trash2-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\izotope-trash2.jpg'),
(4, 4, 'Tone2 Gladiator2', 'Digital synth', 3, 'F:\\wamp64\\www\\public_html\\img\\tone2-gladiator-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\tone2-gladiator.jpg'),
(5, 5, 'Fabfilter Pro-Q 2\r\n', 'Mixer effect', 5, 'F:\\wamp64\\www\\public_html\\img\\fabfilter-proq2-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\fabfilter-proq2.jpg'),
(6, 6, 'dblue Glitch 2', 'Mixer effect', 4, 'F:\\wamp64\\www\\public_html\\img\\dblue-glitch2-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\dblue-glitch2.jpg'),
(7, 7, 'Lennar Digital Sylenth1', 'Digital synth', 4, 'F:\\wamp64\\www\\public_html\\img\\Lennardigital-sylenth1-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\Lennardigital-sylenth1.jpg'),
(8, 8, 'ValhallaDSP Valhalla Room', 'Mixer effect ', 3, 'F:\\wamp64\\www\\public_html\\img\\valhalladsp-valhallaroom-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\valhalladsp-valhallaroom.jpg'),
(9, 9, 'refx Nexus 2', 'Mixer effect', 3, 'F:\\wamp64\\www\\public_html\\img\\refx-nexus2-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\refx-nexus2.jpg'),
(10, 10, 'Fabfilter Saturn', 'Mixer effect', 3, 'F:\\wamp64\\www\\public_html\\img\\fabfilter-saturn-thumb.jpg', 'F:\\wamp64\\www\\public_html\\img\\fabfilter-saturn.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactmsg`
--
ALTER TABLE `contactmsg`
  ADD PRIMARY KEY (`msgid`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `pluginslist`
--
ALTER TABLE `pluginslist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactmsg`
--
ALTER TABLE `contactmsg`
  MODIFY `msgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pluginslist`
--
ALTER TABLE `pluginslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
