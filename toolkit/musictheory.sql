-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 09:07 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musictheory`
--
CREATE DATABASE IF NOT EXISTS `musictheory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `musictheory`;

-- --------------------------------------------------------

--
-- Table structure for table `chord_images`
--

CREATE TABLE IF NOT EXISTS `chord_images` (
  `chord_name` varchar(5) NOT NULL,
  `image_path` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chord_images`
--

INSERT INTO `chord_images` (`chord_name`, `image_path`) VALUES
('A#dim', 'images/Asharpdim.jpg'),
('A#m', 'images/Asharpm.jpg'),
('A', 'images/A.jpg'),
('Ab', 'images/Ab.jpg'),
('Adim', 'images/Adim.jpg'),
('Am', 'images/Am.jpg'),
('B', 'images/B.jpg'),
('Bb', 'images/Bb.jpg'),
('Bbm', 'images/Bbm.jpg'),
('Bdim', 'images/Bdim.jpg'),
('Bm', 'images/Bm.jpg'),
('C#', 'images/Csharp.jpg'),
('C#dim', 'images/Csharpdim.jpg'),
('C#m', 'images/Csharpm.jpg'),
('C', 'images/C.jpg'),
('Cdim', 'images/Cdim.jpg'),
('Cm', 'images/Cm.jpg'),
('D#dim', 'images/Dsharpdim.jpg'),
('D#m', 'images/Dsharpm.jpg'),
('D', 'images/D.jpg'),
('Db', 'images/Db.jpg'),
('Ddim', 'images/Ddim.jpg'),
('Dm', 'images/Dm.jpg'),
('E#dim', 'images/Esharpdim.jpg'),
('E', 'images/E.jpg'),
('Eb', 'images/Eb.jpg'),
('Ebm', 'images/Ebm.jpg'),
('Edim', 'images/Edim.jpg'),
('Em', 'images/Em.jpg'),
('F#', 'images/Fsharp.jpg'),
('F#m', 'images/Fsharpm.jpg'),
('F#dim', 'images/Fsharpdim.jpg'),
('F', 'images/F.jpg'),
('Fm', 'images/Fm.jpg'),
('G#dim', 'images/Gsharpdim.jpg'),
('G#m', 'images/Gsharpm.jpg'),
('G', 'images/G.jpg'),
('Gb', 'images/Gb.jpg'),
('Gdim', 'images/Gdim.jpg'),
('Gm', 'images/Gm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `major_scale`
--

CREATE TABLE IF NOT EXISTS `major_scale` (
  `tonic` varchar(5) NOT NULL,
  `supertonic` varchar(5) NOT NULL,
  `mediant` varchar(5) NOT NULL,
  `subdominant` varchar(5) NOT NULL,
  `dominant` varchar(5) NOT NULL,
  `submediant` varchar(5) NOT NULL,
  `leading_tone` varchar(5) NOT NULL,
  PRIMARY KEY (`tonic`),
  KEY `submediant` (`submediant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major_scale`
--

INSERT INTO `major_scale` (`tonic`, `supertonic`, `mediant`, `subdominant`, `dominant`, `submediant`, `leading_tone`) VALUES
('A', 'Bm', 'C#m', 'D', 'E', 'F#m', 'G#dim'),
('Ab', 'Bbm', 'Cm', 'Db', 'Eb', 'Fm', 'Gdim'),
('B', 'C#m', 'D#m', 'E', 'F#', 'G#m', 'A#dim'),
('Bb', 'Cm', 'Dm', 'Eb', 'F', 'Gm', 'Adim'),
('C', 'Dm', 'Em', 'F', 'G', 'Am', 'Bdim'),
('D', 'Em', 'F#m', 'G', 'A', 'Bm', 'C#dim'),
('Db', 'Ebm', 'Fm', 'Gb', 'Ab', 'Bbm', 'Cdim'),
('E', 'F#m', 'G#m', 'A', 'B', 'C#m', 'D#dim'),
('Eb', 'Fm', 'Gm', 'Ab', 'Bb', 'Cm', 'Ddim'),
('F', 'Gm', 'Am', 'Bb', 'C', 'Dm', 'Edim'),
('F#', 'G#m', 'A#m', 'B', 'C#', 'D#m', 'E#dim'),
('G', 'Am', 'Bm', 'C', 'D', 'Em', 'F#dim');

-- --------------------------------------------------------

--
-- Table structure for table `minor_scale`
--

CREATE TABLE IF NOT EXISTS `minor_scale` (
  `tonic` varchar(5) NOT NULL,
  `supertonic` varchar(5) NOT NULL,
  `mediant` varchar(5) NOT NULL,
  `subdominant` varchar(5) NOT NULL,
  `dominant` varchar(5) NOT NULL,
  `submediant` varchar(5) NOT NULL,
  `subtonic` varchar(5) NOT NULL,
  PRIMARY KEY (`tonic`),
  KEY `mediant` (`mediant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minor_scale`
--

INSERT INTO `minor_scale` (`tonic`, `supertonic`, `mediant`, `subdominant`, `dominant`, `submediant`, `subtonic`) VALUES
('Am', 'Bdim', 'C', 'Dm', 'Em', 'F', 'G'),
('Bbm', 'Cdim', 'Db', 'Ebm', 'Fm', 'Gb', 'Ab'),
('Bm', 'C#dim', 'D', 'Em', 'F#m', 'G', 'A'),
('C#m', 'D#dim', 'E', 'F#m', 'G#m', 'A', 'B'),
('Cm', 'Ddim', 'Eb', 'Fm', 'Gm', 'Ab', 'Bb'),
('D#m', 'E#dim', 'F#', 'G#m', 'A#m', 'B', 'C#'),
('Dm', 'Edim', 'F', 'Gm', 'Am', 'Bb', 'C'),
('Em', 'F#dim', 'G', 'Am', 'Bm', 'C', 'D'),
('F#m', 'G#dim', 'A', 'Bm', 'C#m', 'D', 'E'),
('Fm', 'Gdim', 'Ab', 'Bbm', 'Cm', 'Db', 'Eb'),
('G#m', 'A#dim', 'B', 'C#m', 'D#m', 'E', 'F#'),
('Gm', 'Adim', 'Bb', 'Cm', 'Dm', 'Eb', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `musictheory_user`
--

CREATE TABLE IF NOT EXISTS `musictheory_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `musictheory_user`
--

INSERT INTO `musictheory_user` (`user_id`, `user_name`, `user_email`, `password`) VALUES
(1, 'Vinny', 'vinny@vinny.ie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(2, 'William', 'will@wil.ie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(3, 'Donna', 'donna@don.ie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(4, 'Mark', 'mark@mark.ie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
(5, 'Damien', 'damo@damo.ie', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `major_scale`
--
ALTER TABLE `major_scale`
  ADD CONSTRAINT `major_scale_ibfk_1` FOREIGN KEY (`submediant`) REFERENCES `minor_scale` (`tonic`);

--
-- Constraints for table `minor_scale`
--
ALTER TABLE `minor_scale`
  ADD CONSTRAINT `minor_scale_ibfk_1` FOREIGN KEY (`mediant`) REFERENCES `major_scale` (`tonic`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
