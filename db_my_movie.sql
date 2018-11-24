-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2018 at 12:07 PM
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
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` varchar(255) NOT NULL,
  `profill_id` varchar(255) NOT NULL,
  `position` text NOT NULL,
  `orderby` int(11) NOT NULL,
  `title` text NOT NULL,
  `name` text NOT NULL,
  `show` text NOT NULL,
  `tpl` text NOT NULL,
  `config` text NOT NULL,
  `title_show` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `profill_id`, `position`, `orderby`, `title`, `name`, `show`, `tpl`, `config`, `title_show`, `created`, `updated`, `active`) VALUES
('MjdfMTU0MzAzNDc1MC4yMTdfNzc2Xzo6MQ==', 'default', 'header_menu', 1, 'Search Movie', 'movie_search', '[]', 'default', '[]', 1, '2018-11-24 11:45:50', '2018-11-24 11:45:50', 1),
('MTk1XzE1NDMwMzQ3NTAuMjE3XzI2MF86OjE=', 'default', 'web_view', 1, 'header', 'layout', '[]', 'navbar', '[]', 1, '2018-11-24 11:45:50', '2018-11-24 11:45:50', 1),
('MTUzXzE1NDMwMzQ3NTAuMjE3Xzg0OV86OjE=', 'default', 'web_view', 2, 'content', 'layout', '[]', 'div', '{\"add_class\":\"container\",\"add_style\":\"\"}', 1, '2018-11-24 11:45:50', '2018-11-24 11:45:50', 1),
('MzNfMTU0MzAzNDc1MC4yMTdfODY3Xzo6MQ==', 'default', 'header_menu', 3, 'Administrator', 'menu', '{\"access\":[\"1\"],\"mod\":[\"admin\"]}', 'header_menu', '[{\"name\":\"Movie\",\"icon\":\"fa-film\",\"link\":\"admin.movie\"},{\"name\":\"Series\",\"icon\":\"fa-clone\",\"link\":\"admin.movie_series\"},{\"name\":\"Movie+Tag\",\"icon\":\"fa-tags\",\"link\":\"admin.movie_tag\"},{\"name\":\"Website\",\"icon\":\"fa-chrome\",\"link\":\"admin.website\"},{\"name\":\"Setting\",\"icon\":\"fa-cogs\",\"link\":\"admin.setting\"},{\"name\":\"Setting+Block\",\"icon\":\"fa-cog\",\"link\":\"admin.setting_block\"}]', 1, '2018-11-24 11:45:50', '2018-11-24 11:45:50', 1),
('NDQwXzE1NDMwMzQ3NTAuMjE3Xzg0N186OjE=', 'default', 'header_menu', 4, 'Main Menu', 'menu', '{\"mod\":[\"movie\",\"tag\",\"user\"]}', 'header_menu', '[{\"name\":\"Movies\",\"icon\":\"fa-film\",\"link\":\"movie.main\"},{\"name\":\"Movie+Tags\",\"icon\":\"fa-tags\",\"link\":\"tag.main\"}]', 1, '2018-11-24 11:45:50', '2018-11-24 11:45:50', 1),
('NjI2XzE1NDMwMzQ3NTAuMjE3XzU5MF86OjE=', 'default', 'header_menu', 2, 'Login', 'menu', '[]', 'user_menu', '[{\"name\":\"Profill\",\"icon\":\"fa-user\",\"link\":\"user.profill\"},{\"name\":\"Change+Password\",\"icon\":\"fa-key\",\"link\":\"user.change_password\"},{\"name\":\"Logout\",\"icon\":\"fa-power-off\",\"link\":\"user.logout\"}]', 1, '2018-11-24 11:45:50', '2018-11-24 11:45:50', 1),
('NTEzXzE1NDMwMzQ3NTAuMjE3XzQ2Xzo6MQ==', 'default', 'content', 1, 'Content Stream', 'mod_trim', '[]', 'default', '[]', 1, '2018-11-24 11:45:50', '2018-11-24 11:45:50', 1),
('NTI2XzE1NDMwMzQ3NTAuMjE3XzMyNF86OjE=', 'default', 'header_intro', 1, 'Logo', 'image', '[]', 'default', '{\"url\":\"\",\"is_url\":\"1\"}', 0, '2018-11-24 11:45:50', '2018-11-24 11:46:12', 1);

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
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=OnGoing, 2=Completed',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `name_alt`, `id_url`, `id_url_alt`, `image`, `ep_last`, `ep_total`, `sinopsis`, `status`, `created`, `updated`, `active`) VALUES
('MjA0XzE1NDIyOTY0MDYuMDM0XzUyM186OjE=', 'One Piece', 'One Piece', 'one+piece', 'one+piece', 'MjA0XzE1NDIyOTY0MDYuMDM0XzUyM186OjE=.jpg', '858', '?', 'l', 1, '2018-11-15 22:40:06', '2018-11-17 14:18:44', 1),
('MjUwXzE1NDIzNDk3MDYuOTg4Xzg1OV86OjE=', 'Tales Of Demons And Gods', 'Tales Of Demons And Gods', 'tales+of+demons+and+gods', 'tales+of+demons+and+gods', 'MjUwXzE1NDIzNDk3MDYuOTg4Xzg1OV86OjE=.png', '', '40', 'a', 2, '2018-11-16 13:28:27', '2018-11-16 21:40:06', 1),
('NjYzXzE1NDIzMDMzMzkuMDE5XzQ4MF86OjE=', 'Tales Of Demons And Gods S3', 'Tales Of Demons And Gods S3', 'tales+of+demons+and+gods+s3', 'tales+of+demons+and+gods+s3', 'NjYzXzE1NDIzMDMzMzkuMDE5XzQ4MF86OjE=.png', '15', '40', 'jnjkn', 1, '2018-11-16 00:35:39', '2018-11-17 14:18:44', 1),
('NzE4XzE1NDE3NzA5MTQuMDUyXzk2Ml86OjE=', 'Boruto Naruto Next Generation', 'Boruto Naruto Next Generation', 'boruto+naruto+next+generation', 'boruto+naruto+next+generation', 'NzE4XzE1NDE3NzA5MTQuMDUyXzk2Ml86OjE=.png', '81', '?', 'Japan movie', 1, '2018-11-09 20:41:54', '2018-11-17 14:18:44', 1),
('OTQyXzE1NDIzNDk2NDIuODc1XzY5M186OjE=', 'Tales Of Demons And Gods S2', 'Tales Of Demons And Gods S2', 'tales+of+demons+and+gods+s2', 'tales+of+demons+and+gods+s2', 'OTQyXzE1NDIzNDk2NDIuODc1XzY5M186OjE=.png', '', '40', 'a', 2, '2018-11-16 13:27:22', '2018-11-16 13:27:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie_episode`
--

CREATE TABLE `movie_episode` (
  `movie_website_id` varchar(255) NOT NULL,
  `eps` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie_series`
--

CREATE TABLE `movie_series` (
  `serie_id` varchar(255) NOT NULL,
  `movie_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_series`
--

INSERT INTO `movie_series` (`serie_id`, `movie_id`) VALUES
('Mzc1XzE1NDIzNzUyMTkuNTQyXzE1OV86OjE=', 'MjA0XzE1NDIyOTY0MDYuMDM0XzUyM186OjE='),
('NDU4XzE1NDIzNzc4MjYuODgzXzE5NF86OjE=', 'MjUwXzE1NDIzNDk3MDYuOTg4Xzg1OV86OjE='),
('NDU4XzE1NDIzNzc4MjYuODgzXzE5NF86OjE=', 'NjYzXzE1NDIzMDMzMzkuMDE5XzQ4MF86OjE='),
('NDU4XzE1NDIzNzc4MjYuODgzXzE5NF86OjE=', 'OTQyXzE1NDIzNDk2NDIuODc1XzY5M186OjE=');

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
('MjE0XzE1NDE2MDc3ODMuMjM3XzU1OF86OjE=', 'Martial Art', 'martial+art', '2018-11-07 23:23:03', '2018-11-16 21:39:48', 1),
('OTRfMTU0MTYwNDgzNi42MjNfNjY2Xzo6MQ==', 'Action', 'action', '2018-11-07 22:33:56', '2018-11-15 22:11:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie_tags`
--

CREATE TABLE `movie_tags` (
  `list_id` varchar(255) NOT NULL,
  `tag_id` varchar(255) NOT NULL,
  `movie_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_tags`
--

INSERT INTO `movie_tags` (`list_id`, `tag_id`, `movie_id`) VALUES
('MjkyXzE1NDIzMDAxNzguNzEzXzgyMF86OjE=', 'OTRfMTU0MTYwNDgzNi42MjNfNjY2Xzo6MQ==', 'NzE4XzE1NDE3NzA5MTQuMDUyXzk2Ml86OjE='),
('MzBfMTU0MjM3ODQ0My41MDZfOTdfOjox', 'OTRfMTU0MTYwNDgzNi42MjNfNjY2Xzo6MQ==', 'OTQyXzE1NDIzNDk2NDIuODc1XzY5M186OjE='),
('NDA5XzE1NDIzMDAxMzcuMDMzXzI2MF86OjE=', 'MjE0XzE1NDE2MDc3ODMuMjM3XzU1OF86OjE=', 'MjA0XzE1NDIyOTY0MDYuMDM0XzUyM186OjE='),
('NzQ5XzE1NDIzNzg0MzYuMDI5Xzc3Ml86OjE=', 'MjE0XzE1NDE2MDc3ODMuMjM3XzU1OF86OjE=', 'OTQyXzE1NDIzNDk2NDIuODc1XzY5M186OjE='),
('OTgzXzE1NDIzMDAxNjMuMDYyXzg1MF86OjE=', 'MjE0XzE1NDE2MDc3ODMuMjM3XzU1OF86OjE=', 'NzE4XzE1NDE3NzA5MTQuMDUyXzk2Ml86OjE=');

-- --------------------------------------------------------

--
-- Table structure for table `movie_website`
--

CREATE TABLE `movie_website` (
  `list_id` varchar(255) NOT NULL,
  `movie_id` varchar(255) NOT NULL,
  `website_id` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `ep_last` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_website`
--

INSERT INTO `movie_website` (`list_id`, `movie_id`, `website_id`, `url`, `ep_last`) VALUES
('MzdfMTU0MTc3MTAwMi4zNjNfMTcwXzo6MQ==', 'NzE4XzE1NDE3NzA5MTQuMDUyXzk2Ml86OjE=', 'NDA2XzE1NDE2MDA5ODguNDQ4XzkyMl86OjE=', 'https://nanime.in/anime/boruto-naruto-next-generations', '81'),
('NDc1XzE1NDIzNDYxODUuMTg3Xzc0OV86OjE=', 'MjA0XzE1NDIyOTY0MDYuMDM0XzUyM186OjE=', 'NDA2XzE1NDE2MDA5ODguNDQ4XzkyMl86OjE=', 'https://nanime.in/anime/one-piece', '858'),
('NDIyXzE1NDE3NzQ5NDkuNThfMTgzXzo6MQ==', 'NzE4XzE1NDE3NzA5MTQuMDUyXzk2Ml86OjE=', 'NDAxXzE1NDE2ODYzODIuMDE3XzczMF86OjE=', '', '1'),
('NzEwXzE1NDIzNDYyMTcuMjg2XzkzOV86OjE=', 'NjYzXzE1NDIzMDMzMzkuMDE5XzQ4MF86OjE=', 'NDA2XzE1NDE2MDA5ODguNDQ4XzkyMl86OjE=', 'https://nanime.in/anime/tales-of-demons-and-gods-s3', '15'),
('ODEzXzE1NDIzODczMDkuMTc4XzEwMF86OjE=', 'NjYzXzE1NDIzMDMzMzkuMDE5XzQ4MF86OjE=', 'NDAxXzE1NDE2ODYzODIuMDE3XzczMF86OjE=', '', '1');

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
('MjYzXzE1NDIzODA0NzEuMzc3XzEwNV86OjE=', 'background', 'background.jpg'),
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
('OTQ4XzE1NDE1MTcxNjguNTM2XzMyMV86OjE=', 'admin', 'amhicmZNVEl6TkRVMjg3MzRoZmg=', '1', 'Admin', 'admin@gmail.com', 'OTQ4XzE1NDE1MTcxNjguNTM2XzMyMV86OjE=.jpeg', '[]', '2018-11-06 22:13:53', '2018-11-16 23:26:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `php_movies` text NOT NULL,
  `php_episodes` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `name`, `url`, `php_movies`, `php_episodes`, `created`, `updated`, `active`) VALUES
('NDA2XzE1NDE2MDA5ODguNDQ4XzkyMl86OjE=', 'N Anime', 'https://nanime.in', '$out = file_get_contents(\'https://nanime.in/index/anime/\');\r\n\r\n$out = explode(\'<div class=\"content shadow\">\', $out)[1];\r\n$out = explode(\'<div class=\"clearfix\">\', $out)[1];\r\npreg_match_all(\'~href=\"(.*?)<\\/a>~m\', $out, $out,PREG_SET_ORDER, 0);\r\n\r\n$out1 = array();\r\n\r\nforeach ($out as $key => $value) {\r\n	$a = explode(\'\">\', @$value[1]);\r\n	if (count($a)==2) \r\n	{\r\n		$out1[] = array(\r\n			\'link\'  => $a[\'0\'],\r\n			\'title\' => $a[\'1\']\r\n		);\r\n	}\r\n}\r\n\r\nreturn $out1;', '\r\n//pr($params);\r\n$out = file_get_contents($params);\r\n\r\n$out = explode(\'<div class=\"episodelist list-group\">\', $out)[1];\r\n$out = explode(\'<div class=\"col-md-12\">\', $out)[0];\r\npreg_match_all(\'~href=\"(.*?)<\\/a>~m\', $out, $out,PREG_SET_ORDER, 0);\r\n\r\n$out1 = array();\r\n\r\nforeach ($out as $key => $value) {\r\n	$a = explode(\'\" class=\"list-group-item list-episode-item \">\', @$value[1]);\r\n	if (@$a[0]) \r\n	{\r\n		$a[1] = explode(\'-episode-\', $a[0]);\r\n		if (@$a[1][1]) \r\n		{\r\n			$a[1] = $a[1][1];\r\n			$out1[] = array(\r\n				\'link\'  => $a[\'0\'],\r\n				\'eps\' => $a[\'1\']\r\n			);\r\n		}\r\n	}\r\n}\r\n\r\nreturn $out1;', '2018-11-07 21:29:48', '2018-11-15 22:46:49', 1),
('NDAxXzE1NDE2ODYzODIuMDE3XzczMF86OjE=', 'Animeindo.net', 'http://animeindo.moe', '', '', '2018-11-08 21:13:02', '2018-11-15 22:47:02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_episode`
--
ALTER TABLE `movie_episode`
  ADD KEY `movie_website_id` (`movie_website_id`);

--
-- Indexes for table `movie_series`
--
ALTER TABLE `movie_series`
  ADD KEY `movie_id` (`movie_id`);

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
-- Indexes for table `movie_website`
--
ALTER TABLE `movie_website`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `movie_website_ibfk_2` (`website_id`);

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
-- Constraints for table `movie_episode`
--
ALTER TABLE `movie_episode`
  ADD CONSTRAINT `movie_episode_ibfk_1` FOREIGN KEY (`movie_website_id`) REFERENCES `movie_website` (`list_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_series`
--
ALTER TABLE `movie_series`
  ADD CONSTRAINT `movie_series_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_tags`
--
ALTER TABLE `movie_tags`
  ADD CONSTRAINT `movie_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `movie_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_tags_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_website`
--
ALTER TABLE `movie_website`
  ADD CONSTRAINT `movie_website_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_website_ibfk_2` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
