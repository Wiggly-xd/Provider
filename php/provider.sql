-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 23 okt 2020 kl 14:24
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.2.29

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

DELIMITER $$
--
-- Procedurer
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `imageInsert` (IN `getName` VARCHAR(100), IN `getPath` VARCHAR(200), IN `getType` VARCHAR(100))  BEGIN
INSERT INTO image (name,path,type) VALUES (getName,getPath,getType);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellstruktur `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `cText` text NOT NULL,
  `cDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `image`
--

INSERT INTO `image` (`id`, `name`, `path`, `type`) VALUES
(2, 'marsvin.jpg', 'bilder/marsvin.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `postType` tinyint(4) NOT NULL,
  `pText` text NOT NULL,
  `lastUpdate` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  `postTitle` varchar(255) NOT NULL,
  `pageID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL COMMENT 'foreign_key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`postID`, `postType`, `pText`, `lastUpdate`, `postDate`, `imageURL`, `postTitle`, `pageID`, `serviceID`) VALUES
(32, 0, 'En marsvinshona är brunstig ungefär var femtonde dag och dräktig i omkring 70 dygn. Riskerna under dräktighet och förlossning ökar med åldern. Det rekommenderas att honan är minst sju månader när hon får sin första kull, gärna runt nio-tio månader men hon bör få sin första kull under första levnadsåret. Hanen kan gå tillsammans med honan i ungefär fem veckor men han ska skiljas från honan före förlossningen annars kommer han att para sig med honan direkt efter, vilket kan äventyra honans hälsa och liv. Hon behöver vila efter varje kull och bör inte få fler än två kullar per år. Toxicos (havandeskapsförgiftning) är en relativt vanlig komplikation vid marsvinsuppfödning varför honan inte bör utsättas för stress under dräktigheten. Om honan utvecklar toxicos är det i princip omöjligt att häva tillståndet och det slutar oftast att honan och hennes oftast ofödda ungar dör.', '', '2020-10-22', 'bilder/marsvin.jpg', 'Parning', 43, 1);

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
(1, 1, 3);

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
(1, '2020-10-22', 'Marsvin');

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
(43, 1, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `type`
--

CREATE TABLE `type` (
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'nj', '123', 'Niklas', '', 'Jörgensen');

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
-- Index för tabell `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

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
-- Index för tabell `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

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
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT för tabell `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT för tabell `privilege`
--
ALTER TABLE `privilege`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `spage`
--
ALTER TABLE `spage`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT för tabell `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
