-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2018 at 12:00 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_my_movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `name_alt` text NOT NULL,
  `id_url` text NOT NULL,
  `id_url_alt` text NOT NULL,
  `image` text NOT NULL,
  `ep_last` text NOT NULL,
  `ep_total` text NOT NULL,
  `sinopsis` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie_tag`
--

CREATE TABLE `movie_tag` (
  `id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `id_url` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_tag`
--

INSERT INTO `movie_tag` (`id`, `name`, `id_url`, `created`, `updated`, `active`) VALUES
('MjE0XzE1NDE2MDc3ODMuMjM3XzU1OF86OjE=', 'Martial Art', '', '2018-11-07 23:23:03', '2018-11-07 23:23:03', 0),
('OTRfMTU0MTYwNDgzNi42MjNfNjY2Xzo6MQ==', 'Action', '', '2018-11-07 22:33:56', '2018-11-08 21:11:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_tags`
--

CREATE TABLE `movie_tags` (
  `list_id` varchar(255) NOT NULL,
  `tag_id` varchar(255) NOT NULL,
  `movie_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `value`) VALUES
('NDI4XzE1NDE1MTc0NTkuNDkyXzkyNV86OjE=', 'logo', 'logo.png'),
('ODkyXzE1NDE1MTc0NTMuMTAzXzg4NV86OjE=', 'def_password', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `access` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `access`, `name`, `email`, `image`, `params`, `created`, `updated`, `active`) VALUES
('OTQ4XzE1NDE1MTcxNjguNTM2XzMyMV86OjE=', 'admin', 'amhicmZNVEl6TkRVMjg3MzRoZmg=', '1', 'Admin', 'admin@gmail.com', 'OTQ4XzE1NDE1MTcxNjguNTM2XzMyMV86OjE=.png', '[]', '2018-11-06 22:13:53', '2018-11-06 22:23:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `php_movies` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `name`, `url`, `php_movies`, `created`, `updated`, `active`) VALUES
('NDA2XzE1NDE2MDA5ODguNDQ4XzkyMl86OjE=', 'N Anime', 'https://nanime.in/', '$out = file_get_contents(\'https://nanime.in/index/anime/\');\r\n\r\n$out = explode(\'<div class=\"content shadow\">\', $out)[1];\r\n$out = explode(\'<div class=\"clearfix\">\', $out)[1];\r\npreg_match_all(\'~href=\"(.*?)<\\/a>~m\', $out, $out,PREG_SET_ORDER, 0);\r\n\r\n$out1 = array();\r\n\r\nforeach ($out as $key => $value) {\r\n	$a = explode(\'\">\', @$value[1]);\r\n	if (count($a)==2) \r\n	{\r\n		$out1[] = array(\r\n			\'link\'  => $a[\'0\'],\r\n			\'title\' => $a[\'1\']\r\n		);\r\n	}\r\n}\r\n//$out = config_encode($out1);\r\n//echo $out;\r\nreturn $out;', '2018-11-07 21:29:48', '2018-11-08 23:56:06', 0),
('NDAxXzE1NDE2ODYzODIuMDE3XzczMF86OjE=', 'Animeindo.net', 'http://animeindo.moe/', '', '2018-11-08 21:13:02', '2018-11-08 21:13:02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_tag`
--
ALTER TABLE `movie_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_tags`
--
ALTER TABLE `movie_tags`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_tags`
--
ALTER TABLE `movie_tags`
  ADD CONSTRAINT `movie_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `movie_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_tags_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
