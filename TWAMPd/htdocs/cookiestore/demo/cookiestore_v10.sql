-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `cookiestore` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cookiestore`;

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `member_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '會員編號',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `birthday` date NOT NULL COMMENT '生日',
  `sex` enum('男','女') NOT NULL COMMENT '性別',
  `phone` char(10) NOT NULL COMMENT '電話',
  `e-mail` varchar(30) NOT NULL COMMENT '電子信箱',
  `id` varchar(20) NOT NULL COMMENT '帳號',
  `code` varchar(20) NOT NULL COMMENT '密碼',
  PRIMARY KEY (`member_no`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `e-mail` (`e-mail`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='會員';

INSERT INTO `member` (`member_no`, `name`, `birthday`, `sex`, `phone`, `e-mail`, `id`, `code`) VALUES
(0001,	'呂忠祐',	'1993-10-30',	'男',	'0972035551',	'mk816017@gmail.com',	'mk816017',	'123456'),
(0002,	'王大頭',	'1965-10-31',	'男',	'0972000001',	'bbb@gmail.com',	'a0001',	'123456'),
(0003,	'王小花',	'1977-09-04',	'女',	'0972035550',	'ccc@yahoo.com.tw',	'a0002',	'123456'),
(0004,	'莊大頭',	'1994-01-02',	'男',	'0912322123',	'ddd@gmail.com',	'a0003',	'123456'),
(0005,	'彭銘楷',	'1993-11-03',	'男',	'0975142791',	'eee@gmail.com',	'a0004',	'123456'),
(0006,	'彭型男',	'1993-01-31',	'男',	'0911111111',	'fff@hotmail.com.tw',	'a0005',	'123456'),
(0007,	'彭帥哥',	'1980-09-12',	'男',	'0922222222',	'ggg@gmail.com',	'a0006',	'123456'),
(0008,	'彭小美',	'1971-04-02',	'女',	'0933333333',	'hhh@nkfust.edu.tw',	'a0007',	'123456'),
(0009,	'呂帥哥',	'1961-10-30',	'男',	'0944444444',	'iii@gmail.com',	'a0008',	'123456'),
(0010,	'何帥哥',	'1980-12-31',	'男',	'0955555555',	'jjj@yahoo.com.tw',	'a0009',	'123456'),
(0011,	'劉帥哥',	'1975-09-07',	'男',	'0966666666',	'kkk@gmail.com',	'a0010',	'123456'),
(0012,	'林小花',	'2002-01-05',	'女',	'0977777777',	'lll@gmail.com',	'a0011',	'123456'),
(0013,	'郭定睿',	'1965-01-11',	'男',	'0988888888',	'm1m@gmail.com',	'a0012',	'123456'),
(0014,	'葉大雄',	'1983-05-23',	'男',	'0999999999',	'nnnn@gmail.com',	'a0013',	'123456'),
(0015,	'陳靜香',	'1979-10-30',	'女',	'0901111111',	'o1o2o3@gmail.com',	'a0014',	'123456'),
(0016,	'李珊珊',	'1948-06-03',	'女',	'0902222222',	'1p2p3p@gmail.com',	'a0015',	'123456'),
(0017,	'謝大帥',	'1973-08-02',	'男',	'0903333333',	'qqqqq@gmail.com',	'a0016',	'123456'),
(0018,	'蕭帥帥',	'1995-07-12',	'男',	'0904444444',	'rr123@gmail.com',	'a0017',	'123456'),
(0019,	'吳美女',	'1986-12-23',	'女',	'0905555555',	'123sss@gmail.com',	'a0018',	'123456'),
(0020,	'洪帥哥',	'1969-03-29',	'男',	'0906666666',	'ttt@gmail.com',	'a0019',	'123456');

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_no` int(4) unsigned zerofill NOT NULL COMMENT '訂單編號',
  `member_no` int(4) unsigned zerofill NOT NULL COMMENT '會員編號',
  `store_no` int(4) unsigned zerofill NOT NULL COMMENT '店舖編號',
  `pickup_date` date NOT NULL COMMENT '取貨日期',
  `total` int(6) NOT NULL COMMENT '總額',
  `check` enum('ok','no') NOT NULL COMMENT '訂單狀態',
  PRIMARY KEY (`order_no`),
  KEY `member_no` (`member_no`),
  KEY `store_no` (`store_no`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`member_no`) REFERENCES `member` (`member_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`store_no`) REFERENCES `store` (`store_no`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單';


DROP TABLE IF EXISTS `order_content`;
CREATE TABLE `order_content` (
  `order_no` int(4) unsigned zerofill NOT NULL COMMENT '訂單編號',
  `pp_no` int(4) unsigned zerofill NOT NULL COMMENT '產品價錢流水號',
  `quantity` int(4) unsigned NOT NULL COMMENT '訂購數量',
  PRIMARY KEY (`order_no`,`pp_no`),
  KEY `product_no` (`pp_no`),
  CONSTRAINT `order_content_ibfk_2` FOREIGN KEY (`pp_no`) REFERENCES `product_price` (`pp_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `order_content_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `order` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='訂單內容';


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '產品編號',
  `product_name` varchar(12) NOT NULL COMMENT '產品名稱',
  `type_no` int(4) unsigned zerofill NOT NULL COMMENT '類型編號',
  `ingredients` varchar(100) NOT NULL COMMENT '產品成份',
  PRIMARY KEY (`product_no`),
  UNIQUE KEY `product_name` (`product_name`),
  KEY `type_no` (`type_no`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`type_no`) REFERENCES `product_type` (`type_no`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品';

INSERT INTO `product` (`product_no`, `product_name`, `type_no`, `ingredients`) VALUES
(0001,	'巧克力餅乾',	0001,	'可可粉、進口奶油、蛋、珍珠糖'),
(0002,	'草莓餅乾',	0001,	'乾燥草莓、蛋白、糖'),
(0003,	'奶油餅乾',	0001,	'新鮮香草籽、奶油、夏威夷果仁'),
(0004,	'抹茶餅乾',	0001,	'選抹茶、進口奶油、蛋白、糖'),
(0005,	'原味蛋捲',	0002,	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油'),
(0006,	'芝麻蛋捲',	0002,	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油、黑白芝麻'),
(0007,	'咖啡蛋捲',	0002,	'阿拉比卡咖啡、新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油'),
(0008,	'抹茶蛋捲',	0002,	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油、抹茶粉'),
(0009,	'蜂蜜蛋捲',	0002,	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油、蜂蜜'),
(0010,	'巧克力捲心酥',	0003,	'可可粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0011,	'奶油捲心酥',	0003,	'乳清粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0012,	'草莓捲心酥',	0003,	'草莓粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0013,	'花生捲心酥',	0003,	'花生粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0014,	'咖啡捲心酥',	0003,	'咖啡粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0015,	'原味煎餅',	0004,	'麵粉、砂糖、植物油、奶粉、蛋、奶油、乳化劑、膨脹劑'),
(0016,	'海苔煎餅',	0004,	'海苔、麵粉、砂糖、植物油(棕櫚油)、奶粉、雞蛋、奶油、乳化劑、膨賬劑'),
(0017,	'花生煎餅',	0004,	'麵粉、砂糖、植物油、奶粉、蛋、奶油、花生、乳化劑、膨脹劑'),
(0018,	'巧克力棒',	0005,	'小麥粉、砂糖、可可塊、棕櫚油、全脂奶粉、酥油(棕櫚油)、食鹽、可可脂、奶油、酵母、大豆卵磷脂、香料、氯化鉀、食用色素(婀娜多)、(原材料的一部分由大豆提煉)'),
(0019,	'草莓棒',	0005,	'小麥粉、砂糖、棕櫚油、乳糖、全脂奶粉、酥油(棕櫚油)、草莓粉、奶油、食鹽、酵母、食用色素(紅甜菜,婀娜多)、大豆卵磷脂、氯化鉀、香料、膨脹劑(碳酸氫鈉)、(原材料一部分由大豆提煉)'),
(0020,	'牛奶棒',	0005,	'小麥粉、砂糖、全脂奶粉、塊、棕櫚油、、酥油(棕櫚油)、食鹽、奶油、酵母、香料、大豆卵磷脂、膨脹劑(碳酸氫鈉)、甜味劑(蔗糖素)'),
(0021,	'哈密瓜棒',	0005,	'小麥粉、砂糖、棕櫚油、乳糖、酥油(棕櫚油)、加糖煉乳、哈密瓜果汁粉、全脂奶粉、食鹽、水飴、酵母、大豆卵磷脂、香料、甜味劑(D-山梨醇)、膨脹劑(碳酸氫鈉)、食用色素(婀娜多,胡蘿蔔)');

DROP TABLE IF EXISTS `product_price`;
CREATE TABLE `product_price` (
  `pp_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '產品價格流水號',
  `product_no` int(4) unsigned zerofill NOT NULL COMMENT '產品編號',
  `size_no` int(4) unsigned zerofill NOT NULL COMMENT '尺寸編號',
  `price` int(3) unsigned NOT NULL COMMENT '單價',
  PRIMARY KEY (`product_no`,`size_no`),
  UNIQUE KEY `pp_no` (`pp_no`),
  KEY `size_no` (`size_no`),
  CONSTRAINT `product_price_ibfk_6` FOREIGN KEY (`size_no`) REFERENCES `product_size` (`size_no`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `product_price_ibfk_7` FOREIGN KEY (`product_no`) REFERENCES `product` (`product_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品價格';

INSERT INTO `product_price` (`pp_no`, `product_no`, `size_no`, `price`) VALUES
(0001,	0001,	0001,	200),
(0002,	0001,	0002,	150),
(0003,	0001,	0003,	100),
(0004,	0002,	0001,	200),
(0005,	0002,	0002,	150),
(0006,	0002,	0003,	100),
(0007,	0003,	0001,	200),
(0008,	0003,	0002,	150),
(0009,	0003,	0003,	100),
(0010,	0004,	0001,	220),
(0011,	0004,	0002,	170),
(0012,	0004,	0003,	120),
(0013,	0005,	0001,	220),
(0014,	0005,	0002,	170),
(0015,	0005,	0003,	120),
(0016,	0006,	0001,	220),
(0017,	0006,	0002,	170),
(0018,	0006,	0003,	120),
(0019,	0007,	0001,	240),
(0020,	0007,	0002,	190),
(0021,	0007,	0003,	140),
(0022,	0008,	0001,	240),
(0023,	0008,	0002,	190),
(0024,	0008,	0003,	140),
(0025,	0009,	0001,	220),
(0026,	0009,	0002,	170),
(0027,	0009,	0003,	120),
(0028,	0010,	0001,	180),
(0029,	0010,	0002,	130),
(0030,	0010,	0003,	80),
(0031,	0011,	0001,	180),
(0032,	0011,	0002,	130),
(0033,	0011,	0003,	80),
(0034,	0012,	0001,	180),
(0035,	0012,	0002,	130),
(0036,	0012,	0003,	80),
(0037,	0013,	0001,	180),
(0038,	0013,	0002,	130),
(0039,	0013,	0003,	80),
(0040,	0014,	0001,	190),
(0041,	0014,	0002,	140),
(0042,	0014,	0003,	90),
(0043,	0015,	0001,	150),
(0044,	0015,	0002,	100),
(0045,	0015,	0003,	50),
(0046,	0016,	0001,	150),
(0047,	0016,	0002,	100),
(0048,	0016,	0003,	50),
(0049,	0017,	0001,	150),
(0050,	0017,	0002,	100),
(0051,	0017,	0003,	50),
(0052,	0018,	0001,	80),
(0053,	0018,	0002,	60),
(0054,	0018,	0003,	40),
(0055,	0019,	0001,	80),
(0056,	0019,	0002,	60),
(0057,	0019,	0003,	40),
(0058,	0020,	0001,	80),
(0059,	0020,	0002,	60),
(0060,	0020,	0003,	40),
(0061,	0021,	0001,	80),
(0062,	0021,	0002,	60),
(0063,	0021,	0003,	40);

DROP TABLE IF EXISTS `product_size`;
CREATE TABLE `product_size` (
  `size_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '尺寸編號',
  `size_name` char(4) NOT NULL COMMENT '尺寸名稱',
  PRIMARY KEY (`size_no`),
  UNIQUE KEY `size_name` (`size_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品尺寸';

INSERT INTO `product_size` (`size_no`, `size_name`) VALUES
(0002,	'中'),
(0001,	'大'),
(0003,	'小');

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `type_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '類型編號',
  `type_name` varchar(8) NOT NULL COMMENT '類型名稱',
  PRIMARY KEY (`type_no`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品類型';

INSERT INTO `product_type` (`type_no`, `type_name`) VALUES
(0001,	'手工餅乾'),
(0003,	'捲心酥'),
(0005,	'棒狀餅乾'),
(0004,	'煎餅'),
(0002,	'蛋捲');

DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `store_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '店鋪編號',
  `store_name` varchar(10) NOT NULL COMMENT '店鋪名稱',
  `store_add` text NOT NULL COMMENT '店鋪地址',
  `store_phone` char(10) NOT NULL COMMENT '店鋪電話',
  `manager` varchar(10) NOT NULL COMMENT '負責人',
  `manager_phone` char(10) NOT NULL COMMENT '負責人電話',
  PRIMARY KEY (`store_no`),
  UNIQUE KEY `store_phone` (`store_phone`),
  UNIQUE KEY `manager_phone` (`manager_phone`),
  UNIQUE KEY `store_name` (`store_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店鋪';

INSERT INTO `store` (`store_no`, `store_name`, `store_add`, `store_phone`, `manager`, `manager_phone`) VALUES
(0001,	'高雄總店',	'高雄市楠梓區卓越路2號',	'(07)666666',	'呂忠祐',	'0972035551'),
(0002,	'台北分店',	'台北市大安區基隆路四段43號',	'(02)222222',	'王曉明',	'0987654321'),
(0003,	'桃園分店',	'桃園縣成功路三段38號',	'(03)333333',	'林曉慧',	'0900000000'),
(0004,	'新竹分店',	'新竹市竹光路17巷49號',	'(03)555555',	'彭明偉',	'0975757575'),
(0005,	'苗栗分店',	'苗栗市恭敬里聯大1號',	'(037)32132',	'高駿騰',	'0912121212'),
(0006,	'台中分店',	'台中市北區三民路三段129號',	'(04)212121',	'何彥儒',	'0987631396'),
(0007,	'雲林分店',	'雲林縣大學路三段123號',	'(05)770777',	'劉晉維',	'0975202132'),
(0008,	'台南分店',	'台南市中西區樹林街二段33號',	'(06)234234',	'林武震',	'0985913399'),
(0009,	'屏東分店',	'屏東縣學府路1號 ',	'(08)777777',	'黃大大',	'0913131313'),
(0010,	'花蓮分店',	'花蓮縣壽豐鄉志學村大學路二段1號 ',	'(03)888888',	'陳雅芳 ',	'0912345678'),
(0011,	'澎湖分店',	'澎湖縣六合路300號 ',	'(06)988988',	'許勝傑 ',	'0985858585');

-- 2014-06-12 15:47:25
