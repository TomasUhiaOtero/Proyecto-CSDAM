-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2024 at 05:57 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musica`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Artista` int(11) NOT NULL,
  `Fecha_Lanzamiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`Id`, `Nombre`, `Artista`, `Fecha_Lanzamiento`) VALUES
(1, 'Abbey Road', 1, '1969-09-26'),
(2, 'Let It Be', 2, '1970-05-08'),
(3, 'A Night at the Opera', 3, '1975-11-21'),
(4, 'Goodbye Yellow Brick Road', 4, '1973-10-05'),
(5, 'Heroes', 5, '1977-10-14'),
(6, 'Nevermind', 6, '1991-09-24'),
(7, 'Thriller', 7, '1982-11-30'),
(8, '21', 8, '2011-01-24'),
(9, 'Unorthodox Jukebox', 9, '2012-12-07'),
(10, 'Lemonade', 10, '2016-04-23'),
(11, 'Highway 61 Revisited', 11, '1965-08-30'),
(12, '1989', 12, '2014-10-27'),
(13, 'When We All Fall Asleep, Where Do We Go?', 13, '2019-03-29'),
(14, 'Divide', 14, '2017-03-03'),
(15, 'El Dorado', 15, '2017-05-26'),
(16, 'Anti', 16, '2016-01-28'),
(17, 'Vida', 17, '2019-01-25'),
(18, 'YHLQMDLG', 18, '2020-02-29'),
(19, 'Colores', 19, '2020-03-19'),
(20, 'Barrio Fino', 20, '2004-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `artistas`
--

CREATE TABLE `artistas` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Nacionalidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artistas`
--

INSERT INTO `artistas` (`Id`, `Nombre`, `Apellido`, `Nacionalidad`) VALUES
(1, 'John', 'Lennon', 'UK'),
(2, 'Paul', 'McCartney', 'UK'),
(3, 'Freddie', 'Mercury', 'UK'),
(4, 'Elton', 'John', 'UK'),
(5, 'David', 'Bowie', 'UK'),
(6, 'Kurt', 'Cobain', 'USA'),
(7, 'Michael', 'Jackson', 'USA'),
(8, 'Adele', 'Adkins', 'UK'),
(9, 'Bruno', 'Mars', 'USA'),
(10, 'Beyoncé', 'Knowles', 'USA'),
(11, 'Bob', 'Dylan', 'USA'),
(12, 'Taylor', 'Swift', 'USA'),
(13, 'Billie', 'Eilish', 'USA'),
(14, 'Ed', 'Sheeran', 'UK'),
(15, 'Shakira', '', 'Colombia'),
(16, 'Rihanna', '', 'Barbados'),
(17, 'Luis', 'Fonsi', 'Puerto Rico'),
(18, 'Bad', 'Bunny', 'Puerto Rico'),
(19, 'J Balvin', '', 'Colombia'),
(20, 'Daddy', 'Yankee', 'Puerto Rico');

-- --------------------------------------------------------

--
-- Table structure for table `canciones`
--

CREATE TABLE `canciones` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Puntuacion` int(11) NOT NULL DEFAULT '0',
  `Artista` int(11) NOT NULL,
  `Album` int(11) NOT NULL,
  `nombre_artista` varchar(255) DEFAULT NULL,
  `nombre_album` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canciones`
--

INSERT INTO `canciones` (`Id`, `Nombre`, `Puntuacion`, `Artista`, `Album`, `nombre_artista`, `nombre_album`) VALUES
(1, 'Come Together', 9, 1, 1, NULL, NULL),
(2, 'Let It Be', 8, 2, 2, NULL, NULL),
(3, 'Bohemian Rhapsody', 8, 3, 3, NULL, NULL),
(4, 'Candle in the Wind', 6, 4, 4, NULL, NULL),
(5, 'Heroes', 7, 5, 5, NULL, NULL),
(6, 'Smells Like Teen Spirit', 5, 6, 6, NULL, NULL),
(7, 'Billie Jean', 8, 7, 7, NULL, NULL),
(8, 'Rolling in the Deep', 3, 8, 8, NULL, NULL),
(9, 'Locked Out of Heaven', 7, 9, 9, NULL, NULL),
(10, 'Formation', 2, 10, 10, NULL, NULL),
(11, 'Like a Rolling Stone', 4, 11, 11, NULL, NULL),
(12, 'Shake It Off', 1, 12, 12, NULL, NULL),
(13, 'Bad Guy', 0, 13, 13, NULL, NULL),
(14, 'Shape of You', 2, 14, 14, NULL, NULL),
(15, 'Chantaje', 2, 15, 15, NULL, NULL),
(16, 'Work', 7, 16, 16, NULL, NULL),
(17, 'Despacito', 2, 17, 17, NULL, NULL),
(18, 'Safaera', 9, 18, 18, NULL, NULL),
(19, 'Morado', 3, 19, 19, NULL, NULL),
(20, 'Gasolina', 8, 20, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `canciones_escuchadas`
--

CREATE TABLE `canciones_escuchadas` (
  `Id` int(11) NOT NULL,
  `Usuario` int(11) NOT NULL,
  `Cancion` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canciones_escuchadas`
--

INSERT INTO `canciones_escuchadas` (`Id`, `Usuario`, `Cancion`, `Fecha`) VALUES
(1, 1, 1, '2023-01-10'),
(2, 2, 2, '2023-01-15'),
(3, 3, 3, '2023-01-18'),
(4, 4, 4, '2023-01-20'),
(5, 5, 5, '2023-01-22'),
(6, 6, 6, '2023-01-25'),
(7, 7, 7, '2023-01-27'),
(8, 8, 8, '2023-01-29'),
(9, 9, 9, '2023-01-30'),
(10, 10, 10, '2023-02-01'),
(11, 11, 11, '2023-02-03'),
(12, 12, 12, '2023-02-06'),
(13, 13, 13, '2023-02-09'),
(14, 14, 14, '2023-02-12'),
(15, 15, 15, '2023-02-14'),
(16, 16, 16, '2023-02-17'),
(17, 17, 17, '2023-02-20'),
(18, 18, 18, '2023-02-23'),
(19, 19, 19, '2023-02-25'),
(20, 20, 20, '2023-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `canciones_listas_reproduccion`
--

CREATE TABLE `canciones_listas_reproduccion` (
  `Id` int(11) NOT NULL,
  `Lista_Reproduccion` int(11) NOT NULL,
  `Cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canciones_listas_reproduccion`
--

INSERT INTO `canciones_listas_reproduccion` (`Id`, `Lista_Reproduccion`, `Cancion`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14),
(15, 15, 15),
(16, 16, 16),
(17, 17, 17),
(18, 18, 18),
(19, 19, 19),
(20, 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `listas_reproduccion`
--

CREATE TABLE `listas_reproduccion` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listas_reproduccion`
--

INSERT INTO `listas_reproduccion` (`Id`, `Nombre`, `Usuario`) VALUES
(1, 'Favoritas Carlos', 1),
(2, 'Top Ana', 2),
(3, 'Canciones Luis', 3),
(4, 'Mix Maria', 4),
(5, 'Playlist Jose', 5),
(6, 'Lucia Hits', 6),
(7, 'Diego Collection', 7),
(8, 'Best of Laura', 8),
(9, 'Antonio Songs', 9),
(10, 'Marta Tracks', 10),
(11, 'Javier Playlist', 11),
(12, 'Sara Best', 12),
(13, 'Miguel Top', 13),
(14, 'Cristina Tunes', 14),
(15, 'David Replays', 15),
(16, 'Patricia Favorites', 16),
(17, 'Raul Selections', 17),
(18, 'Sofia Jams', 18),
(19, 'Roberto Classics', 19),
(20, 'Elena Melodies', 20);

-- --------------------------------------------------------

--
-- Table structure for table `multimedia`
--

CREATE TABLE `multimedia` (
  `Id` int(11) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `Tipo_Enlace` varchar(50) NOT NULL,
  `Cancion` int(11) NOT NULL,
  `Artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `multimedia`
--

INSERT INTO `multimedia` (`Id`, `Url`, `Tipo_Enlace`, `Cancion`, `Artista`) VALUES
(1, 'https://www.youtube.com/watch?v=example1', 'YouTube', 1, 1),
(2, 'https://open.spotify.com/track/example1', 'Spotify', 1, 1),
(3, 'https://www.youtube.com/watch?v=example2', 'YouTube', 2, 2),
(4, 'https://open.spotify.com/track/example2', 'Spotify', 2, 2),
(5, 'https://www.youtube.com/watch?v=example3', 'YouTube', 3, 3),
(6, 'https://open.spotify.com/track/example3', 'Spotify', 3, 3),
(7, 'https://www.youtube.com/watch?v=example4', 'YouTube', 4, 4),
(8, 'https://open.spotify.com/track/example4', 'Spotify', 4, 4),
(9, 'https://www.youtube.com/watch?v=example5', 'YouTube', 5, 5),
(10, 'https://open.spotify.com/track/example5', 'Spotify', 5, 5),
(11, 'https://www.youtube.com/watch?v=example6', 'YouTube', 6, 6),
(12, 'https://open.spotify.com/track/example6', 'Spotify', 6, 6),
(13, 'https://www.youtube.com/watch?v=example7', 'YouTube', 7, 7),
(14, 'https://open.spotify.com/track/example7', 'Spotify', 7, 7),
(15, 'https://www.youtube.com/watch?v=example8', 'YouTube', 8, 8),
(16, 'https://open.spotify.com/track/example8', 'Spotify', 8, 8),
(17, 'https://www.youtube.com/watch?v=example9', 'YouTube', 9, 9),
(18, 'https://open.spotify.com/track/example9', 'Spotify', 9, 9),
(19, 'https://www.youtube.com/watch?v=example10', 'YouTube', 10, 10),
(20, 'https://open.spotify.com/track/example10', 'Spotify', 10, 10),
(21, 'https://www.youtube.com/watch?v=example11', 'YouTube', 11, 11),
(22, 'https://open.spotify.com/track/example11', 'Spotify', 11, 11),
(23, 'https://www.youtube.com/watch?v=example12', 'YouTube', 12, 12),
(24, 'https://open.spotify.com/track/example12', 'Spotify', 12, 12),
(25, 'https://www.youtube.com/watch?v=example13', 'YouTube', 13, 13),
(26, 'https://open.spotify.com/track/example13', 'Spotify', 13, 13),
(27, 'https://www.youtube.com/watch?v=example14', 'YouTube', 14, 14),
(28, 'https://open.spotify.com/track/example14', 'Spotify', 14, 14),
(29, 'https://www.youtube.com/watch?v=example15', 'YouTube', 15, 15),
(30, 'https://open.spotify.com/track/example15', 'Spotify', 15, 15),
(31, 'https://www.youtube.com/watch?v=example16', 'YouTube', 16, 16),
(32, 'https://open.spotify.com/track/example16', 'Spotify', 16, 16),
(33, 'https://www.youtube.com/watch?v=example17', 'YouTube', 17, 17),
(34, 'https://open.spotify.com/track/example17', 'Spotify', 17, 17),
(35, 'https://www.youtube.com/watch?v=example18', 'YouTube', 18, 18),
(36, 'https://open.spotify.com/track/example18', 'Spotify', 18, 18),
(37, 'https://www.youtube.com/watch?v=example19', 'YouTube', 19, 19),
(38, 'https://open.spotify.com/track/example19', 'Spotify', 19, 19),
(39, 'https://www.youtube.com/watch?v=example20', 'YouTube', 20, 20),
(40, 'https://open.spotify.com/track/example20', 'Spotify', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo_Electronico` varchar(100) NOT NULL,
  `Fecha_Creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Correo_Electronico`, `Fecha_Creacion`) VALUES
(1, 'Carlos Perez', 'carlos.perez@mail.com', '2020-01-15'),
(2, 'Ana Martinez', 'ana.martinez@mail.com', '2020-02-20'),
(3, 'Luis Gomez', 'luis.gomez@mail.com', '2020-03-10'),
(4, 'Maria Torres', 'maria.torres@mail.com', '2020-04-25'),
(5, 'Jose Fernandez', 'jose.fernandez@mail.com', '2020-05-05'),
(6, 'Lucia Ruiz', 'lucia.ruiz@mail.com', '2020-06-18'),
(7, 'Diego Sanchez', 'diego.sanchez@mail.com', '2020-07-14'),
(8, 'Laura Garcia', 'laura.garcia@mail.com', '2020-08-22'),
(9, 'Antonio Ramos', 'antonio.ramos@mail.com', '2020-09-12'),
(10, 'Marta Flores', 'marta.flores@mail.com', '2020-10-30'),
(11, 'Javier Lopez', 'javier.lopez@mail.com', '2020-11-10'),
(12, 'Sara Diaz', 'sara.diaz@mail.com', '2021-01-08'),
(13, 'Miguel Vargas', 'miguel.vargas@mail.com', '2021-02-17'),
(14, 'Cristina Jimenez', 'cristina.jimenez@mail.com', '2021-03-04'),
(15, 'David Morales', 'david.morales@mail.com', '2021-04-22'),
(16, 'Patricia Castillo', 'patricia.castillo@mail.com', '2021-05-15'),
(17, 'Raul Mendez', 'raul.mendez@mail.com', '2021-06-10'),
(18, 'Sofia Ortiz', 'sofia.ortiz@mail.com', '2021-07-05'),
(19, 'Roberto Blanco', 'roberto.blanco@mail.com', '2021-08-23'),
(20, 'Elena Herrera', 'elena.herrera@mail.com', '2021-09-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Artista` (`Artista`);

--
-- Indexes for table `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Artista` (`Artista`),
  ADD KEY `Album` (`Album`);

--
-- Indexes for table `canciones_escuchadas`
--
ALTER TABLE `canciones_escuchadas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Cancion` (`Cancion`);

--
-- Indexes for table `canciones_listas_reproduccion`
--
ALTER TABLE `canciones_listas_reproduccion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Lista_Reproduccion` (`Lista_Reproduccion`),
  ADD KEY `Cancion` (`Cancion`);

--
-- Indexes for table `listas_reproduccion`
--
ALTER TABLE `listas_reproduccion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indexes for table `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Cancion` (`Cancion`),
  ADD KEY `Artista` (`Artista`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `artistas`
--
ALTER TABLE `artistas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `canciones`
--
ALTER TABLE `canciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `canciones_escuchadas`
--
ALTER TABLE `canciones_escuchadas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `canciones_listas_reproduccion`
--
ALTER TABLE `canciones_listas_reproduccion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `listas_reproduccion`
--
ALTER TABLE `listas_reproduccion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`Artista`) REFERENCES `artistas` (`Id`);

--
-- Constraints for table `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`Artista`) REFERENCES `artistas` (`Id`),
  ADD CONSTRAINT `canciones_ibfk_2` FOREIGN KEY (`Album`) REFERENCES `albums` (`Id`);

--
-- Constraints for table `canciones_escuchadas`
--
ALTER TABLE `canciones_escuchadas`
  ADD CONSTRAINT `canciones_escuchadas_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Id`),
  ADD CONSTRAINT `canciones_escuchadas_ibfk_2` FOREIGN KEY (`Cancion`) REFERENCES `canciones` (`Id`);

--
-- Constraints for table `canciones_listas_reproduccion`
--
ALTER TABLE `canciones_listas_reproduccion`
  ADD CONSTRAINT `canciones_listas_reproduccion_ibfk_1` FOREIGN KEY (`Lista_Reproduccion`) REFERENCES `listas_reproduccion` (`Id`),
  ADD CONSTRAINT `canciones_listas_reproduccion_ibfk_2` FOREIGN KEY (`Cancion`) REFERENCES `canciones` (`Id`);

--
-- Constraints for table `listas_reproduccion`
--
ALTER TABLE `listas_reproduccion`
  ADD CONSTRAINT `listas_reproduccion_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Id`);

--
-- Constraints for table `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`Cancion`) REFERENCES `canciones` (`Id`),
  ADD CONSTRAINT `multimedia_ibfk_2` FOREIGN KEY (`Artista`) REFERENCES `artistas` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
