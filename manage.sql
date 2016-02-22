-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-11-24 12:53:31
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manage`
--

-- --------------------------------------------------------

--
-- 表的结构 `ma_cat`
--

CREATE TABLE IF NOT EXISTS `ma_cat` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) DEFAULT NULL,
  `cat_intro` varchar(1000) DEFAULT NULL,
  `cat_dep` int(20) NOT NULL COMMENT '负责学科的部门',
  `cat_type` int(5) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `ma_cat`
--

INSERT INTO `ma_cat` (`cat_id`, `cat_name`, `cat_intro`, `cat_dep`, `cat_type`) VALUES
(1, '英语', '', 3, 2),
(2, '教学设计部', NULL, 0, 1),
(3, '社科编辑部', NULL, 0, 1),
(4, '英语编辑部', '编辑英语学科', 0, 1),
(5, '视频开发', NULL, 0, 1),
(6, '设计制作', '制作课程，设计页面', 0, 1),
(7, '市场部', '课程资源市场的相关工作', 0, 1),
(8, '统计', '数学类', 0, 2),
(9, '通识课', '公共类课程，包含马克思、近代史。。。', 0, 2),
(10, '开发部', '课件课程开发', 0, 1),
(13, '汉语', '服务于国外学生', 0, 2),
(14, '管理', '管理层人员', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ma_chapter`
--

CREATE TABLE IF NOT EXISTS `ma_chapter` (
  `ch_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '课程章节',
  `ch_short` varchar(20) NOT NULL COMMENT '简称',
  `ch_name` varchar(50) DEFAULT NULL,
  `co_id` int(20) DEFAULT NULL COMMENT '课程id',
  `ch_num` int(20) DEFAULT NULL,
  `ch_time_s` varchar(20) NOT NULL,
  `ch_time_e` varchar(20) NOT NULL,
  `ch_pro` int(20) NOT NULL,
  PRIMARY KEY (`ch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ma_chapter`
--

INSERT INTO `ma_chapter` (`ch_id`, `ch_short`, `ch_name`, `co_id`, `ch_num`, `ch_time_s`, `ch_time_e`, `ch_pro`) VALUES
(1, '', '章节1', 1, 1, '1440126413', '', 50),
(2, '', '章节2', 1, 2, '1440126422', '', 20),
(4, '', '测试章节1', 3, 1, '1440144285', '', 0),
(5, '', '测试章节2', 3, 2, '1440144345', '', 0),
(6, '', 'gu', 2, 1, '1441085664', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ma_course`
--

CREATE TABLE IF NOT EXISTS `ma_course` (
  `co_id` int(10) NOT NULL AUTO_INCREMENT,
  `co_short` varchar(20) NOT NULL COMMENT '简称',
  `co_name` varchar(200) DEFAULT NULL,
  `co_time_s` int(20) NOT NULL,
  `co_time_e` int(20) NOT NULL,
  `co_manager` int(20) NOT NULL,
  `co_process` int(5) DEFAULT NULL,
  `co_cat` int(20) NOT NULL,
  `co_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ma_course`
--

INSERT INTO `ma_course` (`co_id`, `co_short`, `co_name`, `co_time_s`, `co_time_e`, `co_manager`, `co_process`, `co_cat`, `co_type`) VALUES
(1, '', '测试课程1', 1440126381, 1441900800, 3, 35, 1, '0'),
(2, '', '测试课程2', 1440129074, 1443628800, 1, 0, 1, '1'),
(3, '', '测试课程3', 1440129121, 1441209600, 5, 0, 2, '1'),
(4, '', '测试课程4', 1440479740, 1441382400, 6, 0, 3, '1'),
(5, '', '测试课程5', 1441594786, 1442937600, 0, 0, 1, '0'),
(6, '', '测试课程6', 1441602772, 1443542400, 1, 0, 2, '1');

-- --------------------------------------------------------

--
-- 表的结构 `ma_modu`
--

CREATE TABLE IF NOT EXISTS `ma_modu` (
  `mo_id` int(20) NOT NULL AUTO_INCREMENT,
  `mo_short` varchar(20) NOT NULL COMMENT '简称',
  `mo_stats` int(5) NOT NULL,
  `mo_name` varchar(50) DEFAULT NULL,
  `mo_manager` int(20) DEFAULT NULL,
  `mo_pro` int(20) DEFAULT NULL,
  `ch_id` int(20) DEFAULT NULL COMMENT '模块',
  `co_id` int(20) DEFAULT NULL,
  `mo_time_s` varchar(20) NOT NULL,
  `mo_time_e` varchar(20) NOT NULL,
  PRIMARY KEY (`mo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ma_modu`
--

INSERT INTO `ma_modu` (`mo_id`, `mo_short`, `mo_stats`, `mo_name`, `mo_manager`, `mo_pro`, `ch_id`, `co_id`, `mo_time_s`, `mo_time_e`) VALUES
(1, '', 0, '稿件审核', 1, 70, 1, 1, '1440126438', ''),
(2, '', 0, '教学设计', 1, 30, 1, 1, '1440126449', ''),
(3, '', 0, '教学设计', 1, 20, 2, 1, '1440126469', ''),
(4, '', 0, '教学设计', 1, 20, 3, 1, '1440127521', ''),
(5, '', 0, '稿件审核', 1, 30, 3, 1, '1440127529', ''),
(6, '', 0, '视频剪辑', 1, 50, 3, 1, '1440127539', ''),
(7, '', 0, '视频剪辑', 1, 20, 3, 1, '1440127550', ''),
(8, '', 0, '测试模块1', 1, 20, 4, 3, '1440144403', '');

-- --------------------------------------------------------

--
-- 表的结构 `ma_page`
--

CREATE TABLE IF NOT EXISTS `ma_page` (
  `pa_id` int(20) NOT NULL,
  `pa_co` int(20) NOT NULL,
  `pa_ch` int(20) NOT NULL,
  `pa_mo` int(20) NOT NULL,
  `pa_short` varchar(20) NOT NULL COMMENT '简称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='页面';

-- --------------------------------------------------------

--
-- 表的结构 `ma_user`
--

CREATE TABLE IF NOT EXISTS `ma_user` (
  `u_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) DEFAULT NULL,
  `u_role` varchar(20) NOT NULL COMMENT '用户角色',
  `u_email` varchar(50) DEFAULT NULL,
  `u_cat` int(50) DEFAULT NULL,
  `u_pid` int(20) DEFAULT NULL,
  `u_qq` int(20) NOT NULL COMMENT 'qq',
  `u_tel` int(30) NOT NULL COMMENT '电话',
  `u_real_name` varchar(20) NOT NULL,
  `u_pwd` varchar(20) NOT NULL,
  `u_time` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `ma_user`
--

INSERT INTO `ma_user` (`u_id`, `u_name`, `u_role`, `u_email`, `u_cat`, `u_pid`, `u_qq`, `u_tel`, `u_real_name`, `u_pwd`, `u_time`) VALUES
(1, 'nanlinying', 'admin', 'nanlinying@ulearning.com', 2, NULL, 0, 0, '南林英', '891d0854e36210b888b6', '1439428918'),
(2, 'zhangchengcheng', 'admin', 'zhangchengcheng@uleaning.com', 2, NULL, 0, 0, '张程程', '624bc6615c4372b4b9f4', '1439800333'),
(3, 'zhangyuanyuan', 'admin', 'zhangyuanyuan@ulearning.com', 6, NULL, 0, 0, '张媛媛', '36d2fdf27c229d6b5da0', '1439800457'),
(4, 'yanglili', 'course', 'yanglili@ulearning.com', 4, NULL, 0, 0, '杨莉莉', '05d1ec61604b21ea890b', ''),
(5, 'pengminxia', 'course', 'pengminxia@ulearning.com', 3, NULL, 0, 0, '彭敏霞', '598aace43fb324b3f25d', ''),
(6, 'liuhongfang', 'modu', 'liuhongfang@ulearning.com', 2, NULL, 0, 0, '刘红芳', '05d1ec61604b21ea890b', ''),
(7, 'jinhao', 'modu', 'jinhao@ulearning.com', 5, NULL, 0, 0, '金昊', '05d1ec61604b21ea890b', ''),
(8, 'wangjingxiao', 'modu', 'wangjingxiao@ulearning.com', 7, NULL, 0, 0, '王静肖', '72db024008de086fefa8', ''),
(9, 'wanglinghuan', 'modu', 'zhanglilin', 4, NULL, 0, 0, '王灵涣', 'a04cdef7a1ad772e87d7', '1440039019'),
(10, 'chenxiaohan', 'modu', 'lisi', 4, NULL, 0, 0, '陈筱涵', 'dc3a8f1670d65bea69b7', '1440039118'),
(11, 'haoxurui', 'modu', 'zhangsan', 3, NULL, 0, 0, '郝旭瑞', 'd41d8cd98f00b204e980', '1440039141'),
(12, 'zhouai', 'modu', 'zhouai@ulearning.cn', 3, NULL, 0, 0, '周爱', 'd41d8cd98f00b204e980', '1440039187'),
(13, 'wenhua', 'admin', 'wenhua@ulearning.cn', 10, NULL, 0, 0, '文华', '05d1ec61604b21ea890b', '1440378338'),
(14, 'admin', 'admin', '', 14, NULL, 0, 0, 'admin', '21232f297a57a5a74389', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
