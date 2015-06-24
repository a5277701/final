-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `movie_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '電影編號',
  `movie_name` varchar(20) NOT NULL COMMENT '電影名稱',
  `movie_ENname` varchar(20) NOT NULL COMMENT '電影英文名稱',
  `movie_style` enum('''動作''','''愛情''','''恐怖''','''喜劇''','''科幻''') NOT NULL COMMENT '電影類型',
  `movie_level` enum('''普遍級''','''保護級''','''輔導級''','''限制級''') NOT NULL COMMENT '電影級別',
  `movie_length` time NOT NULL COMMENT '電影長度',
  `movie_introduction` longtext NOT NULL COMMENT '電影介紹',
  PRIMARY KEY (`movie_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='電影';

INSERT INTO `movie` (`movie_no`, `movie_name`, `movie_ENname`, `movie_style`, `movie_level`, `movie_length`, `movie_introduction`) VALUES
(0001,	'麻辣賤諜',	'SPY',	'\'喜劇\'',	'\'輔導級\'',	'01:59:00',	'一向行事低調、在中情局擔任分析師的蘇珊，是位專門執行危險任務卻不為人知的無名英雄，然而，她的搭檔在行動中因為不明原因消失無蹤，也連帶波及另一位頂尖中情局探員的安危。為了找出搭檔的下落，並且拯救這個岌岌可危的世界，她自願臥底，混進史上最危險的軍火商，企圖查出真相。');

DROP TABLE IF EXISTS `movie_hall`;
CREATE TABLE `movie_hall` (
  `hall_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '廳別編號',
  `hall_name` varchar(2) NOT NULL COMMENT '廳別名稱',
  PRIMARY KEY (`hall_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='聽別';

INSERT INTO `movie_hall` (`hall_no`, `hall_name`) VALUES
(0001,	'A1'),
(0002,	'A2'),
(0003,	'B1'),
(0004,	'B2');

DROP TABLE IF EXISTS `movie_order`;
CREATE TABLE `movie_order` (
  `order_no` int(4) NOT NULL AUTO_INCREMENT COMMENT '場次編號',
  `movie_theater_no` int(4) unsigned zerofill NOT NULL COMMENT '戲院編號',
  `movie_hall_no` int(4) unsigned zerofill NOT NULL COMMENT '廳別編號',
  `movie-no` int(4) unsigned zerofill NOT NULL COMMENT '電影編號',
  `time_no` int(4) unsigned zerofill NOT NULL COMMENT '時刻編號',
  PRIMARY KEY (`order_no`),
  KEY `movie_theater_no` (`movie_theater_no`),
  KEY `movie_hall_no` (`movie_hall_no`),
  KEY `movie-no` (`movie-no`),
  KEY `time_no` (`time_no`),
  CONSTRAINT `movie_order_ibfk_1` FOREIGN KEY (`movie_theater_no`) REFERENCES `movie_theater` (`theater_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `movie_order_ibfk_2` FOREIGN KEY (`movie_hall_no`) REFERENCES `movie_hall` (`hall_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `movie_order_ibfk_3` FOREIGN KEY (`movie-no`) REFERENCES `movie` (`movie_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `movie_order_ibfk_4` FOREIGN KEY (`time_no`) REFERENCES `time` (`time_no`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='電影場次';


DROP TABLE IF EXISTS `movie_theater`;
CREATE TABLE `movie_theater` (
  `theater_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '戲院編號',
  `theater_name` varchar(8) NOT NULL COMMENT '戲院名稱',
  `theater_place` varchar(8) NOT NULL COMMENT '戲院地點',
  PRIMARY KEY (`theater_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='戲院';

INSERT INTO `movie_theater` (`theater_no`, `theater_name`, `theater_place`) VALUES
(0001,	'小貓戲院',	'澎湖'),
(0002,	'小貓戲院',	'高雄'),
(0003,	'小貓戲院',	'屏東');

DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `time_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '時刻編號',
  `time_start` varchar(5) NOT NULL COMMENT '開始時間',
  PRIMARY KEY (`time_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='電影時刻';

INSERT INTO `time` (`time_no`, `time_start`) VALUES
(0001,	'10:30');

-- 2015-05-28 09:31:33
