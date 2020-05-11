-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 02:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: geet
--

-- --------------------------------------------------------

--
-- Table structure for table admin
--

CREATE TABLE admin (
  id_admin int(11) NOT NULL,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table admin
--

INSERT INTO admin (id_admin, username, password) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'thony', 'costales');

-- --------------------------------------------------------

--
-- Table structure for table albums
--

CREATE TABLE albums (
  id int(11) NOT NULL,
  title varchar(250) NOT NULL,
  artist int(11) NOT NULL,
  genre int(11) NOT NULL,
  artworkPath varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table albums
--

INSERT INTO albums (id, title, artist, genre, artworkPath) VALUES
(6, 'December Avenue', 3, 12, 'assets/images/artwork/decem.jpg'),
(7, 'Mundo', 4, 11, 'assets/images/artwork/spads.jpg'),
(8, 'Kathang isip', 5, 14, 'assets/images/artwork/benben.JPG'),
(9, 'Pahinga', 6, 15, 'assets/images/artwork/parengpirata.blogspot.com.jpg');

-- --------------------------------------------------------

--
-- Table structure for table artists
--

CREATE TABLE artists (
  id int(11) NOT NULL,
  name varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table artists
--

INSERT INTO artists (id, name) VALUES
(3, 'December Avenue'),
(4, 'IV of Spades'),
(5, 'Ben&Ben'),
(6, 'Al james'),
(7, 'Urbandub');

-- --------------------------------------------------------

--
-- Table structure for table genres
--

CREATE TABLE genres (
  id int(11) NOT NULL,
  name varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table genres
--

INSERT INTO genres (id, name) VALUES
(3, 'Hip-hop'),
(9, 'Folk'),
(11, 'Funky'),
(12, 'Rock'),
(13, 'Acoustic'),
(14, 'Indie'),
(15, 'Rap');

-- --------------------------------------------------------

--
-- Table structure for table playlists
--

CREATE TABLE playlists (
  id int(11) NOT NULL,
  name varchar(50) NOT NULL,
  owner varchar(50) NOT NULL,
  date datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table playlistsongs
--

CREATE TABLE playlistsongs (
  id int(11) NOT NULL,
  songId int(11) NOT NULL,
  playlistId int(11) NOT NULL,
  playlistOrder int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table songs
--

CREATE TABLE songs (
  id int(11) NOT NULL,
  title varchar(250) NOT NULL,
  artist int(11) NOT NULL,
  album int(11) NOT NULL,
  genre int(11) NOT NULL,
  duration varchar(8) NOT NULL,
  path varchar(500) NOT NULL,
  albumOrder int(11) NOT NULL,
  plays int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table songs
--

INSERT INTO songs (id, title, artist, album, genre, duration, path, albumOrder, plays) VALUES
(11, 'Eroplanong Papel', 3, 6, 12, '4:38', 'assets/music/decem_eroplano.mp3', 1, 67),
(12, 'Kahit Di mo na alam', 3, 6, 12, '5:03', 'assets/music/decem_kahitdimonaalam.mp3', 2, 63),
(13, 'Time to go by', 3, 6, 12, '4:25', 'assets/music/decem_timetogo.mp3', 3, 40),
(14, 'Mundo', 4, 7, 11, '5:45', 'assets/music/Spades_mundo.mp3', 1, 79),
(15, 'Ilaw sa daan', 4, 7, 11, '4:04', 'assets/music/Spades_ilaw.mp3', 2, 41),
(16, 'Hey barbara', 4, 7, 11, '3:51', 'assets/music/Spades_heybarbara.mp3', 3, 21),
(17, 'Kathang isip', 5, 8, 14, '5:18', 'assets/music/Ben&Ben - Kathang Isip.mp3', 1, 19),
(18, 'Pahinga', 6, 9, 15, '3:43', 'assets/music/1 - Al James - Pahinga.mp3', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  id int(11) NOT NULL,
  firstName varchar(50) NOT NULL,
  lastName varchar(50) NOT NULL,
  email varchar(200) NOT NULL,
  password varchar(32) NOT NULL,
  signUpDate datetime NOT NULL,
  image varchar(100) NOT NULL,
  quote text NOT NULL,
  status enum('not verified','verified') NOT NULL,
  user_activation_code varchar(250) NOT NULL,
  oauth_pro varchar(50) NOT NULL,
  oauthid varchar(100) NOT NULL,
  locale varchar(20) NOT NULL,
  cover varchar(255) NOT NULL,
  url text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table users
--

INSERT INTO users (id, firstName, lastName, email, password, signUpDate, image, quote, status, user_activation_code, oauth_pro, oauthid, locale, cover, url) VALUES
(41, 'Mark', 'Remetio', 'pinoyplayclaytonecille@gmail.com', '4297f44b13955235245b2497399d7a93', '2018-05-19 00:00:00', 'z.jpg', 'asdasda', 'not verified', 'b3749986531b8880cbc8eddc575ad6dc', '', '', '', '', ''),
(62, 'Markjoseph', 'Remetio', 'mj.remetio001@gmail.com', '4297f44b13955235245b2497399d7a93', '2018-05-19 00:00:00', 'z.jpg', 'Ako Si Super Inggo', 'verified', 'a305ad9e00480a03423e8fe84f479054', '', '', '', '', ''),
(64, 'Thony John', 'Costales', 'cthonyjohn@gmail.com', '84f3e8839eecc391035c28e2a7a89064', '2018-05-22 00:00:00', 'WIN_20171229_23_25_20_Pro.jpg', 'Heaven In Earth', 'not verified', '7d771e0e8f3633ab54856925ecdefc5d', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table admin
--
ALTER TABLE admin
  ADD PRIMARY KEY (id_admin);

--
-- Indexes for table albums
--
ALTER TABLE albums
  ADD PRIMARY KEY (id);

--
-- Indexes for table artists
--
ALTER TABLE artists
  ADD PRIMARY KEY (id);

--
-- Indexes for table genres
--
ALTER TABLE genres
  ADD PRIMARY KEY (id);

--
-- Indexes for table playlists
--
ALTER TABLE playlists
  ADD PRIMARY KEY (id);

--
-- Indexes for table playlistsongs
--
ALTER TABLE playlistsongs
  ADD PRIMARY KEY (id);

--
-- Indexes for table songs
--
ALTER TABLE songs
  ADD PRIMARY KEY (id);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table admin
--
ALTER TABLE admin
  MODIFY id_admin int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table albums
--
ALTER TABLE albums
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table artists
--
ALTER TABLE artists
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table genres
--
ALTER TABLE genres
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table playlists
--
ALTER TABLE playlists
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table playlistsongs
--
ALTER TABLE playlistsongs
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table songs
--
ALTER TABLE songs
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;