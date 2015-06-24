-- phpMyAdmin SQL Dump
-- version 3.0.1.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Apr 09, 2009, 03:56 AM
-- 伺服器版本: 5.0.67
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `selectboxes`
--
CREATE DATABASE `selectboxes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `selectboxes`;

-- --------------------------------------------------------

--
-- 資料表格式： `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '自動編號',
  `parentId` int(10) unsigned default NULL COMMENT '父類別編號',
  `levelNum` int(10) unsigned NOT NULL default '1' COMMENT '階層數',
  `name` varchar(255) default NULL COMMENT '名稱',
  PRIMARY KEY  (`id`),
  KEY `parentId` (`parentId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=28 ;

--
-- 列出以下資料庫的數據： `games`
--

INSERT INTO `games` (`id`, `parentId`, `levelNum`, `name`) VALUES
(1, NULL, 1, 'Wii'),
(2, NULL, 1, 'PS3'),
(3, NULL, 1, 'XBOX360'),
(4, 1, 2, 'RPG'),
(5, 1, 2, 'ACT'),
(6, 2, 2, 'AVG'),
(7, 2, 2, 'FTG'),
(8, 3, 2, 'FPS'),
(9, 3, 2, 'SPG'),
(10, 4, 3, '交響曲傳奇'),
(11, 4, 3, '仮假面女王與鏡之塔'),
(12, 4, 3, '風塵英雄3'),
(13, 5, 3, '超級紙片馬力歐'),
(14, 5, 3, '飛天幽夢'),
(15, 5, 3, '英雄不再'),
(16, 6, 3, '異魂傳承'),
(17, 6, 3, '惡靈古堡5'),
(18, 6, 3, '人中之龍3'),
(19, 7, 3, '快打旋風4'),
(20, 7, 3, '爆炸頭武士'),
(21, 7, 3, '鋼彈無雙 2'),
(22, 8, 3, '戰爭機器 2'),
(23, 8, 3, 'R-TYPE 重製版'),
(24, 8, 3, '刺客聯盟'),
(25, 9, 3, '職棒大聯盟 2K9'),
(26, 9, 3, '極限滑板 2'),
(27, 9, 3, 'NBA 2K9');
