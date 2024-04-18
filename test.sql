-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 02:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `FilmID` bigint(20) UNSIGNED NOT NULL,
  `Titel` varchar(255) NOT NULL,
  `RegisseurID` int(11) UNSIGNED NOT NULL,
  `GenreID` int(11) UNSIGNED NOT NULL,
  `ReleaseDatum` date NOT NULL,
  `Beschrijving` longtext NOT NULL,
  `Poster` varchar(255) NOT NULL,
  `Beoordeling` decimal(8,1) NOT NULL,
  `VideoURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`FilmID`, `Titel`, `RegisseurID`, `GenreID`, `ReleaseDatum`, `Beschrijving`, `Poster`, `Beoordeling`, `VideoURL`) VALUES
(1, 'Home Alone', 1, 2, '1990-11-16', 'An eight-year-old troublemaker, mistakenly left home alone, must defend his home against a pair of burglars on Christmas Eve.', './Poster/7a6fd6bb4b53325ecad618feffe9fd8c.jpg', 7.7, 'https://www.youtube.com/embed/jEDaVHmw7r4'),
(2, 'Pirates of the Caribbean: The Curse of the Black Pearl', 2, 4, '2003-06-09', 'Blacksmith Will Turner teams up with eccentric pirate \"Captain\" Jack Sparrow to save his love, the governor\'s daughter, from Jack\'s former pirate allies, who are now undead.', './Poster/32cc805e1d18ffaed2c98463a608b2a7.png', 8.1, 'https://www.youtube.com/embed/naQr0uTrH_s'),
(3, 'Avatar: The Way of Water', 8, 11, '2022-12-06', 'Jake Sully lives with his newfound family formed on the extrasolar moon Pandora. Once a familiar threat returns to finish what was previously started, Jake must work with Neytiri and the army of the Na\'vi race to protect their home.', './Poster/f8c19467fb9b09e802f67646a58a41b5.jpg', 7.6, 'https://www.youtube.com/embed/d9MyW72ELq0'),
(4, 'Oppenheimer', 5, 12, '2023-07-11', 'A dramatization of the life story of J. Robert Oppenheimer, the physicist who had a large hand in the development of the atomic bomb, thus helping end World War 2. We see his life from university days all the way to post-WW2, where his fame saw him embroiled in political machinations.', './Poster/f2edbe3734bcae2712239fee532358e7.jpg', 8.3, 'https://www.youtube.com/embed/uYPbbksJxIg'),
(5, 'The Beekeeper', 6, 4, '2024-01-12', 'Adam Clay is a beekeeper, but someone very important to him is scammed and driven to harm. However, what these power and money hungry scammers dont know, is that Clay is an agent in a classified program called Beekeepers, and they underestimate how much of a threat he is. Adam sets out on a quest of vengeance, where he hunts and kills those responsible for the incident.', './Poster/d10f824325246d13b66cf0c96d5b0918.jpg', 6.4, 'https://www.youtube.com/embed/SzINZZ6iqxY'),
(21, 'Elemental (2023)', 7, 9, '2023-05-27', 'The film journeys alongside an unlikely pair, Ember and Wade, in a city where fire-, water-, land- and air-residents live together. The fiery young woman and the go-with-the-flow guy are about to discover something elemental: how much they actually have in common.', './Poster/e416542166fc2d819d28e210f2cdd538.jpg', 7.0, 'https://www.youtube.com/embed/hXzcyx9V0xw'),
(22, 'Luca', 9, 5, '2021-06-18', 'A young boy experiences an unforgettable seaside summer on the Italian Riviera filled with gelato, pasta and endless scooter rides. Luca shares these adventures with his newfound best friend, but all the fun is threatened by a deeply-held secret: he is a sea monster from another world just below the ocean\'s surface.', './Poster/ada1c23ebf7c672e20bb6724369ceb2f.png', 7.4, 'https://www.youtube.com/embed/mYfJxlgR2jw'),
(24, 'Transformers: The Last Knight', 10, 11, '2017-06-18', 'Optimus Prime finds his dead home planet, Cybertron, in which he comes to find he was responsible for its destruction. He finds a way to bring Cybertron back to life, but in order to do so, Optimus needs to find an artifact that is on Earth.', './Poster/5e1a3a28642edccddf4a3ab0886720e5.jpg', 5.2, 'https://www.youtube.com/embed/6Vtf0MszgP8'),
(25, 'Alice in Wonderland', 11, 5, '2010-02-25', 'Alice, an unpretentious and individual 19-year-old, is betrothed to a dunce of an English nobleman. At her engagement party, she escapes the crowd to consider whether to go through with the marriage and falls down a hole in the garden after spotting an unusual rabbit. Arriving in a strange and surreal place called \"Underland,\" she finds herself in a world that resembles the nightmares she had as a child, filled with talking animals, villainous queens and knights, and frumious bandersnatches. Alice realizes that she is there for a reason--to conquer the horrific Jabberwocky and restore the rightful queen to her throne.', './Poster/46ebfba0e9c4da7313396abb14a5516d.png', 6.4, 'https://www.youtube.com/embed/9POCgSRVvf0'),
(26, 'Playing with Fire', 12, 5, '2019-11-08', 'A crew of rugged firefighters meet their match when attempting to rescue three rambunctious kids.', './Poster/5f9c7b8e29335147e1258a5b10c75edb.jpeg', 5.1, 'https://www.youtube.com/embed/0MNxkCoKlUc'),
(27, 'It', 13, 3, '2017-09-08', 'In the Town of Derry, the local kids are disappearing one by one. In a place known as \'The Barrens\', a group of seven kids are united by their horrifying and strange encounters with an evil clown and their determination to kill It.', './Poster/ce89a61d0f0912795bdb37e56b278e4a.jpg', 7.3, 'https://www.youtube.com/embed/hAUTdjf9rko'),
(28, 'Moana', 14, 8, '2016-11-23', 'Moana Waialiki is a sea voyaging enthusiast and the only daughter of a chief in a long line of navigators. When her island\'s fishermen can\'t catch any fish and the crops fail, she learns that the demigod Maui caused the blight by stealing the heart of the goddess, Te Fiti. The only way to heal the island is to persuade Maui to return Te Fiti\'s heart, so Moana sets off on an epic journey across the Pacific. The film is based on stories from Polynesian mythology.', './Poster/997bc2ec7c749a1493a2842f8a1f7520.jpg', 7.6, 'https://www.youtube.com/embed/LKFuXETZUsI');

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE `gebruikers` (
  `GebruikersID` bigint(20) UNSIGNED NOT NULL,
  `GebruikersNaam` text NOT NULL,
  `EmailAdres` varchar(255) NOT NULL,
  `Wachtwoord_Hash` varchar(255) NOT NULL,
  `Rol_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`GebruikersID`, `GebruikersNaam`, `EmailAdres`, `Wachtwoord_Hash`, `Rol_ID`) VALUES
(1, 'GamingredMC', 'nealsoempeno@gmail.com', '$2y$10$cAGRG1jd7AlVM3RwHjgdLeZ1OgCzzYg8hye22vvlIKnW0G2Yw66g.', 1),
(2, 'Admin', 'admin@gmail.com', '$2y$10$WOcoutA29k2E3SWprA0BGuDNQky45pWGmQHqAokIQzt72167bKejq', 1),
(3, 'ShyAngelWolf', 'regeffiobaarn@gmail.com', '$2y$10$5lxEZS7n4E/bjybjf1L5eOwDHu//VmXQyhtbWWw1.I8WklhS/WfC.', 1),
(4, 'ChaCha_Nelle<3', 'chanelle@gmail.com', '$2y$10$J1QNWPnxjgKmO9tLH73OEuqzY5NGxIfXfswj0l2KIJ29XREDwhriS', 2),
(5, 'chingchong1010', 'chingchong@gmail.com', '$2y$10$JiZtScZTbr1In98lBVmuYuhg4FIQsNK1dQg3IaAFimJ3/.5Lg1tna', 2),
(6, 'test', 'test@gmail.com', '$2y$10$qYK5Yhi8RuTg8B8qzmQ5x.92MGvJgkVN9mE7AM.60qQs1SLmWScqW', 2),
(7, 'test2', 'test2@gmail.com', '$2y$10$zDepsEIlJxksxzFB5a7Tlu7eKdML/HwwegbyFa8uJj.lgIi7l6Zci', 2),
(11, 'BigGuy465', 'b.guy465@gmail.com', '$2y$10$JSqrv5a2Wh4G1Mfrxg546OFDxyGWzQdXialqxfHaYur.U2PywqGYq', 2),
(12, 'Jampanesi', 'nasi@gmail.com', '$2y$10$7pKa1CrsvnlqTplP5KqoHeHwEWOoIXUpXXHJ2ZVtuukS4SMD3zaee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreID` int(10) UNSIGNED NOT NULL,
  `GenreNaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreID`, `GenreNaam`) VALUES
(1, 'Drama'),
(2, 'Comedy'),
(3, 'Horror'),
(4, 'Action'),
(5, 'Family'),
(6, 'Fantasy'),
(7, 'Historical'),
(8, 'Adventure'),
(9, 'Romance'),
(10, 'Thriller'),
(11, 'Science fiction'),
(12, 'Crime Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `regisseur`
--

CREATE TABLE `regisseur` (
  `RegisseurID` int(11) UNSIGNED NOT NULL,
  `RegisseurNaam` text NOT NULL,
  `AantalFilms` int(11) NOT NULL,
  `GeboorteDatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regisseur`
--

INSERT INTO `regisseur` (`RegisseurID`, `RegisseurNaam`, `AantalFilms`, `GeboorteDatum`) VALUES
(1, 'Chris Columbus', 21, '1958-09-10'),
(2, 'Gore Verbinski', 22, '1964-03-16'),
(5, 'Christopher Nolan', 17, '1970-07-30'),
(6, 'David Ayer', 15, '1968-01-18'),
(7, 'Peter Sohn', 4, '0077-10-18'),
(8, 'James Cameron', 22, '1954-08-16'),
(9, 'Enrico Casarosa', 2, '1971-11-20'),
(10, 'Michael Bay', 59, '1965-02-16'),
(11, 'Tim Burton', 44, '1958-08-25'),
(12, 'Andy Fickman', 24, '1970-12-25'),
(13, 'Andrés Muschietti', 7, '1973-08-26'),
(14, 'John Musker', 14, '1953-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `Rol_ID` int(10) UNSIGNED NOT NULL,
  `RolNaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`Rol_ID`, `RolNaam`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`FilmID`),
  ADD KEY `Genre_Key` (`GenreID`),
  ADD KEY `Regisseur_Key` (`RegisseurID`);

--
-- Indexes for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`GebruikersID`),
  ADD KEY `Rol_Key` (`Rol_ID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreID`);

--
-- Indexes for table `regisseur`
--
ALTER TABLE `regisseur`
  ADD PRIMARY KEY (`RegisseurID`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Rol_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `FilmID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `GebruikersID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `regisseur`
--
ALTER TABLE `regisseur`
  MODIFY `RegisseurID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `Rol_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `Genre_Key` FOREIGN KEY (`GenreID`) REFERENCES `genre` (`GenreID`),
  ADD CONSTRAINT `Regisseur_Key` FOREIGN KEY (`RegisseurID`) REFERENCES `regisseur` (`RegisseurID`);

--
-- Constraints for table `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD CONSTRAINT `Rol_Key` FOREIGN KEY (`Rol_ID`) REFERENCES `rol` (`Rol_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
