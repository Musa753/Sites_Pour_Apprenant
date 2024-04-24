-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2022 at 12:57 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `core`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `difficulty` varchar(20) NOT NULL,
  `thumbnail` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `text`, `author_id`, `difficulty`, `thumbnail`) VALUES
(4, 'Apprenez les bases du langage Python', 'Python est très demandé et accessible pour les débutants. Apprenez à coder avec Python pour écrire des programmes simples mais puissants et pour automatiser les tâches.', 'oui', 3, 'confirmed', 'Images/thumbnails/f344153d44f3f0c47b72fd29a37a7cce.jpg'),
(5, 'Apprenez les technologies du web', 'Établissez une base solide en développement web en apprenant et en pratiquant JavaScript, l\'un des principaux langages de programmation sur le web, et créez une application simple !', 'oui !', 3, 'expert', 'Images/thumbnails/07b915841fb4f53de75ae566ed739c4d.jpg'),
(60, 'Maîtrisez les fondamentaux d\'Excel', 'La maîtrise des fonctionnalités d\'Excel est souvent indispensable. Prenez en main le logiciel puis allez plus loin avec les tableaux, les formules et les tableaux croisés dynamiques !', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla excel c\'est bien!', 4, 'expert', 'Images/thumbnails/ed735d55415bee976b771989be8f7005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courses_subs`
--

CREATE TABLE `courses_subs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses_subs`
--

INSERT INTO `courses_subs` (`id`, `user_id`, `course_id`, `date`) VALUES
(14, 6, 54, '2022-04-25'),
(65, 3, 4, '2022-05-01'),
(66, 3, 5, '2022-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `author_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `topic_id`, `message`, `date`, `author_id`) VALUES
(56, 1, 'msg', '2022-04-10', '3'),
(57, 1, 'feafea', '2022-04-10', '3'),
(58, 1, 'msg', '2022-04-15', '1'),
(59, 1, 'fea', '2022-04-15', '2'),
(60, 1, 'fea', '2022-04-15', '3'),
(61, 1, 'test', '2022-04-19', '6'),
(68, 1, 'gervds', '2022-04-19', '4'),
(69, 1, 'FZEESED', '2022-04-19', '3'),
(70, 1, 'gerd', '2022-04-19', '2'),
(75, 1, 'gerd', '2022-04-19', '4'),
(77, 1, 'fzacqvs', '2022-04-19', '3'),
(80, 1, 'trop fort wola', '2022-04-19', '4'),
(96, 1, 'rzgsd', '2022-04-19', '3'),
(97, 1, 'fegeq', '2022-04-21', '3'),
(98, 1, 'oui', '2022-04-21', '6'),
(99, 1, 'test', '2022-04-24', '3'),
(100, 2, 'aa', '2022-04-24', '6'),
(101, 2, 'aa', '2022-04-24', '4'),
(102, 2, 'topic site', '2022-04-24', '6'),
(105, 15, 'zafrezfsq', '2022-04-25', '3'),
(106, 1, 'aaa', '2022-05-01', '3'),
(107, 1, 'aaa', '2022-05-01', '3'),
(110, 2, 'oui', '2022-05-01', '3'),
(111, 18, 'aaa', '2022-05-01', '3');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `author_id` int(11) NOT NULL,
  `creation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `author_id`, `creation_date`) VALUES
(1, 'Topic #1', 3, '2022-04-24'),
(2, 'Topic créé via le site', 3, '2022-04-24'),
(15, 'topic 3', 3, '2022-04-25'),
(18, 'aaa', 3, '2022-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `admin`, `level`) VALUES
(1, 'Aboubacar Altine', 'Mamane Bello', 'belloaltine@geek.com', 'alldebridalldebrid1', 0, 'beginner'),
(2, 'Zerouali', 'Feriel', 'ferielzerouali@feriel.com', 'Maquette1', 0, 'beginner'),
(3, 'MARTIN', 'Alexandre', 'alexfurious71@protonmail.ch', 'abcabc', 1, 'expert'),
(4, 'ROUSSELET', 'Quentin', 'quentinr82@protonmail.com', 'kekw', 1, 'expert'),
(6, 'VIRAUD', 'Florian', 'b3cflo36@gmail.com', 'bite', 0, 'confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_subs`
--
ALTER TABLE `courses_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `courses_subs`
--
ALTER TABLE `courses_subs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
