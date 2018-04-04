-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Abr-2018 às 04:45
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pop-culture`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'TV'),
(2, 'Games');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`id`, `src`) VALUES
(1, 'test.jpg'),
(2, 'tests.jpg'),
(3, 'aaaa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name_ms` varchar(255) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `message`, `email`, `name_ms`, `deleted`) VALUES
(1, 'test', 'test@gmail.com', 'test', 0),
(2, 'test', 'test@gmail.com', 'test', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `article` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `date_time` date NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `dtupdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `article`, `title`, `date_time`, `deleted`, `dtupdate`) VALUES
(1, 'test', 'test', '2018-03-19', 0, NULL),
(2, 'test', 'testerson', '2018-03-19', 0, '2018-03-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `news_has_imagem`
--

CREATE TABLE `news_has_imagem` (
  `idnews` int(11) NOT NULL,
  `idimagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `news_has_imagem`
--

INSERT INTO `news_has_imagem` (`idnews`, `idimagem`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `news_has_video`
--

CREATE TABLE `news_has_video` (
  `idnews` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `news_has_video`
--

INSERT INTO `news_has_video` (`idnews`, `idvideo`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `article` varchar(45) NOT NULL,
  `date_time` date NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `dtupdate` date DEFAULT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `title`, `article`, `date_time`, `deleted`, `dtupdate`, `idcategoria`) VALUES
(1, 'Test', 'Test', '2018-03-14', 0, NULL, 1),
(2, 'Test', 'Testerson', '2018-03-14', 0, '2018-03-19', 1),
(3, 'Test', 'Testersonssssss', '2018-03-14', 0, '2018-03-19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_has_imagem`
--

CREATE TABLE `post_has_imagem` (
  `idpost` int(11) NOT NULL,
  `idimagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post_has_imagem`
--

INSERT INTO `post_has_imagem` (`idpost`, `idimagem`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_has_video`
--

CREATE TABLE `post_has_video` (
  `idpost` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post_has_video`
--

INSERT INTO `post_has_video` (`idpost`, `idvideo`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `dtupdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `deleted`, `dtupdate`) VALUES
(3, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'mickael.souza.if@gmail.com', 0, '2018-04-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `code`) VALUES
(1, 'asadsda'),
(2, 'asadsda'),
(3, 'dasdsada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videopage`
--

CREATE TABLE `videopage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `date_time` date NOT NULL,
  `dtupdate` date DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videopage`
--

INSERT INTO `videopage` (`id`, `title`, `article`, `date_time`, `dtupdate`, `deleted`) VALUES
(1, 'Test', 'Test', '2018-03-16', '2018-03-17', 0),
(2, 'Test', 'Tester', '2018-03-16', '2018-03-19', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videopage_has_imagem`
--

CREATE TABLE `videopage_has_imagem` (
  `idvideopage` int(11) NOT NULL,
  `idimagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videopage_has_imagem`
--

INSERT INTO `videopage_has_imagem` (`idvideopage`, `idimagem`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `videopage_has_video`
--

CREATE TABLE `videopage_has_video` (
  `idvideopage` int(11) NOT NULL,
  `idvideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videopage_has_video`
--

INSERT INTO `videopage_has_video` (`idvideopage`, `idvideo`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_has_imagem`
--
ALTER TABLE `news_has_imagem`
  ADD PRIMARY KEY (`idnews`,`idimagem`),
  ADD KEY `fk_news_has_imagem_imagem1_idx` (`idimagem`),
  ADD KEY `fk_news_has_imagem_news1_idx` (`idnews`);

--
-- Indexes for table `news_has_video`
--
ALTER TABLE `news_has_video`
  ADD PRIMARY KEY (`idnews`,`idvideo`),
  ADD KEY `fk_news_has_video_video1_idx` (`idvideo`),
  ADD KEY `fk_news_has_video_news1_idx` (`idnews`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`,`idcategoria`),
  ADD KEY `fk_post_categoria_idx` (`idcategoria`);

--
-- Indexes for table `post_has_imagem`
--
ALTER TABLE `post_has_imagem`
  ADD PRIMARY KEY (`idpost`,`idimagem`),
  ADD KEY `fk_post_has_imagem_imagem1_idx` (`idimagem`),
  ADD KEY `fk_post_has_imagem_post1_idx` (`idpost`);

--
-- Indexes for table `post_has_video`
--
ALTER TABLE `post_has_video`
  ADD PRIMARY KEY (`idpost`,`idvideo`),
  ADD KEY `fk_post_has_video_video1_idx` (`idvideo`),
  ADD KEY `fk_post_has_video_post1_idx` (`idpost`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videopage`
--
ALTER TABLE `videopage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videopage_has_imagem`
--
ALTER TABLE `videopage_has_imagem`
  ADD PRIMARY KEY (`idvideopage`,`idimagem`),
  ADD KEY `fk_videopage_has_imagem_imagem1_idx` (`idimagem`),
  ADD KEY `fk_videopage_has_imagem_videopage1_idx` (`idvideopage`);

--
-- Indexes for table `videopage_has_video`
--
ALTER TABLE `videopage_has_video`
  ADD PRIMARY KEY (`idvideopage`,`idvideo`),
  ADD KEY `fk_videopage_has_video_video1_idx` (`idvideo`),
  ADD KEY `fk_videopage_has_video_videopage1_idx` (`idvideopage`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `videopage`
--
ALTER TABLE `videopage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `news_has_imagem`
--
ALTER TABLE `news_has_imagem`
  ADD CONSTRAINT `fk_news_has_imagem_imagem1` FOREIGN KEY (`idimagem`) REFERENCES `imagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_has_imagem_news1` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `news_has_video`
--
ALTER TABLE `news_has_video`
  ADD CONSTRAINT `fk_news_has_video_news1` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_has_video_video1` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post_has_imagem`
--
ALTER TABLE `post_has_imagem`
  ADD CONSTRAINT `fk_post_has_imagem_imagem1` FOREIGN KEY (`idimagem`) REFERENCES `imagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_has_imagem_post1` FOREIGN KEY (`idpost`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post_has_video`
--
ALTER TABLE `post_has_video`
  ADD CONSTRAINT `fk_post_has_video_post1` FOREIGN KEY (`idpost`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_has_video_video1` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `videopage_has_imagem`
--
ALTER TABLE `videopage_has_imagem`
  ADD CONSTRAINT `fk_videopage_has_imagem_imagem1` FOREIGN KEY (`idimagem`) REFERENCES `imagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_videopage_has_imagem_videopage1` FOREIGN KEY (`idvideopage`) REFERENCES `videopage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `videopage_has_video`
--
ALTER TABLE `videopage_has_video`
  ADD CONSTRAINT `fk_videopage_has_video_video1` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_videopage_has_video_videopage1` FOREIGN KEY (`idvideopage`) REFERENCES `videopage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
