-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016-02-15 18:00:47
-- 服务器版本： 5.6.26
-- PHP Version: 5.5.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stumanager`
--

-- --------------------------------------------------------

--
-- 表的结构 `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(20) unsigned NOT NULL,
  `courseid` int(40) unsigned NOT NULL,
  `coursename` varchar(25) NOT NULL,
  `coursedesc` text
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `courses`
--

INSERT INTO `courses` (`id`, `courseid`, `coursename`, `coursedesc`) VALUES
(1, 1, '数据结构', '认识数据在计算机中的存储模型'),
(2, 2, '计算机导论', '讲解计算机的基础知识，认识计算机的工作原理'),
(3, 3, '软件工程', '学习软件开发方法和研究软件开发周期和模型以及软件的管理'),
(4, 4, 'jingshen', 'haha,buzhidao'),
(5, 5, '笑傲江湖曲', '这是一个什么玩意'),
(6, 0, '{$name}', '{$desc}'),
(7, 0, ' . 笑傲小鬼 . ', ' . iiiiiaaa . '),
(8, 6, ' . 笑傲大鬼 . ', ' . 贵 . '),
(9, 7, ' .{ 笑傲老鬼 }. ', ' . 鬼鬼 . '),
(10, 8, ' { 你妹的 } ', '  还不好？？？ '),
(11, 9, 'bb', 'jjfid'),
(12, 10, '终于成功了', '哈哈哈哈哈哈哈哈'),
(13, 11, 'doudoudou', 'do都'),
(14, 12, '我叫小狗', '汪汪汪汪汪'),
(15, 13, '天堂伞', '这是一个品牌的力量，注意我这里使用了逗号鴭'),
(16, 14, '天堂伞', '这是一个品牌的力量，注意我这里使用了逗号鴭');

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(20) unsigned NOT NULL,
  `stuid` char(15) NOT NULL,
  `stuname` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `students`
--

INSERT INTO `students` (`id`, `stuid`, `stuname`) VALUES
(1, '1', 'wlz'),
(2, '2', 'xiaolei'),
(3, '3', 'haha'),
(4, '4', '外星人'),
(5, '5', '小黑');

-- --------------------------------------------------------

--
-- 表的结构 `stu_cou`
--

CREATE TABLE IF NOT EXISTS `stu_cou` (
  `id` int(11) NOT NULL,
  `stuid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `aimmark` smallint(6) NOT NULL,
  `infos` varchar(45) DEFAULT NULL,
  `grade` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生选课表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_cou`
--
ALTER TABLE `stu_cou`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
