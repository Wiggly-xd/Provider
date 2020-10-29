-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 29 okt 2020 kl 10:59
-- Serverversion: 10.4.14-MariaDB
-- PHP-version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `provider`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `cText` text NOT NULL,
  `cDate` varchar(255) NOT NULL,
  `pageID` int(11) NOT NULL COMMENT 'foreign_key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `comment`
--

INSERT INTO `comment` (`commentID`, `cText`, `cDate`, `pageID`) VALUES
(9, 'yes', 'October 29, 2020, 9:50 am', 5),
(11, 'lmaonoob', 'October 29, 2020, 9:57 am', 7);

-- --------------------------------------------------------

--
-- Tabellstruktur `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `eventTitle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `history`
--

CREATE TABLE `history` (
  `historyID` int(11) NOT NULL,
  `historyDate` varchar(255) NOT NULL,
  `historyText` text NOT NULL,
  `historyImage` varchar(255) DEFAULT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `image`
--

CREATE TABLE `image` (
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `serviceID` int(11) NOT NULL COMMENT 'foreign_key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `image`
--

INSERT INTO `image` (`name`, `path`, `type`, `serviceID`) VALUES
('kim.jpg', 'bilder/kim.jpg', 'image/jpeg', 1),
('marsvin.jpg', 'bilder/marsvin.jpg', 'image/jpeg', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `pText` text NOT NULL,
  `lastUpdate` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  `postTitle` varchar(255) NOT NULL,
  `pageID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL COMMENT 'foreign_key',
  `username` varchar(255) NOT NULL COMMENT 'foreign_key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`postID`, `pText`, `lastUpdate`, `postDate`, `imageURL`, `postTitle`, `pageID`, `serviceID`, `username`) VALUES
(9, 'cool', '', '2020-10-29', 'bilder/kim.jpg', 'wow', 5, 1, 'nj'),
(11, 'weeewo', '', '2020-10-29', 'bilder/marsvin.jpg', 'testermanbigwow', 7, 2, 'nj');

-- --------------------------------------------------------

--
-- Tabellstruktur `privilege`
--

CREATE TABLE `privilege` (
  `moderator` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `privilege`
--

INSERT INTO `privilege` (`moderator`, `admin`, `userID`) VALUES
(1, 1, 5),
(0, 0, 6),
(1, 1, 7);

-- --------------------------------------------------------

--
-- Tabellstruktur `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceDate` varchar(255) NOT NULL,
  `serviceTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `service`
--

INSERT INTO `service` (`serviceID`, `serviceDate`, `serviceTitle`) VALUES
(1, '2020-10-29', 'test'),
(2, '2020-10-29', 'testnr2');

-- --------------------------------------------------------

--
-- Tabellstruktur `spage`
--

CREATE TABLE `spage` (
  `pageID` int(11) NOT NULL,
  `serviceType` tinyint(4) NOT NULL,
  `serviceID` int(11) NOT NULL COMMENT 'foreign_key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `spage`
--

INSERT INTO `spage` (`pageID`, `serviceType`, `serviceID`) VALUES
(5, 1, 1),
(7, 0, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `firstName`, `middleName`, `lastName`) VALUES
(5, 'wiggly', '123', 'Noah', 'noob', 'Richardson'),
(6, 'elGustapo', '123', 'Gustav', 'test', 'idk'),
(7, 'nj', '123', 'Niklas', '', 'Jörgensen');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Index för tabell `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Index för tabell `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyID`);

--
-- Index för tabell `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Index för tabell `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`userID`);

--
-- Index för tabell `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Index för tabell `spage`
--
ALTER TABLE `spage`
  ADD PRIMARY KEY (`pageID`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT för tabell `privilege`
--
ALTER TABLE `privilege`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `spage`
--
ALTER TABLE `spage`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
