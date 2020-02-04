-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 04, 2020 at 03:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `camping`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `arrive` date NOT NULL,
  `depart` date NOT NULL,
  `electrique` varchar(255) NOT NULL,
  `disco` varchar(255) NOT NULL,
  `activites` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `nb_emplacement` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `lieu`, `type`, `arrive`, `depart`, `electrique`, `disco`, `activites`, `prix`, `nb_emplacement`, `id_utilisateurs`) VALUES
(57, 'Le Maquis', 'Camping Car', '2020-02-04', '2020-02-14', 'on', 'on', 'off', 239, 2, 3),
(58, 'Les Pins', 'Camping Car', '2020-02-19', '2020-02-29', 'on', 'off', 'on', 552, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `img_profil_folder` varchar(255) NOT NULL,
  `img_profil` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `prenom`, `nom`, `img_profil_folder`, `img_profil`, `date_inscription`) VALUES
(1, 'vanderluc', '$2y$10$733vuQLlkO7ky60Os27A6Om0qjhiNPe66NeYTx7ZGgrmTP8uJJOJ.', 'vanderluc@icloud.com', 'Luc', 'van der MEIJDEN', 'Images/profils/vanderluc/', 'IMG_2869.jpg', '2020-01-24 15:01:30'),
(2, 'darkskull', '$2y$10$2JI4PZWUU7LXaEOKf6uAd.tUa.9IhxYTYH0Wli2AbM/lurPsgn09K', 'julia13118@orange.fr', 'Julia', 'Denivet', 'Images/profils/darkskull/', 'IMG_9420.jpg', '2020-01-24 16:25:18'),
(3, 'admin', '$2y$10$DObgmwm.SEGKkHI2BBfivuwJNjMQpzgqq4Jb6rsZiPt2SV/rrdEl6', 'luc.van-der-meijden@laplateforme.io', 'Luc', 'Van Der MEIJDEN', 'Images/profils/admin/', 'IMG_2869.jpg', '2020-02-04 10:17:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
