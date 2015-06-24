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
(0020,	'洪帥哥',	'1969-03-29',	'男',	'0906666666',	'ttt@gmail.com',	'a0019',	'123456'),
(0021,	'何彥儒',	'1986-08-05',	'男',	'0972035555',	'QWEQE@gmail.com',	'test1',	'1');

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '訂單編號',
  `id` varchar(20) NOT NULL COMMENT '帳號',
  `store_name` varchar(10) NOT NULL COMMENT '店舖名稱',
  `pickup_date` date NOT NULL COMMENT '取貨日期',
  `check` enum('ok','no') NOT NULL COMMENT '確認領取',
  PRIMARY KEY (`order_no`),
  KEY `store_name` (`store_name`),
  KEY `id` (`id`),
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`store_name`) REFERENCES `store` (`store_name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單';

INSERT INTO `order` (`order_no`, `id`, `store_name`, `pickup_date`, `check`) VALUES
(0001,	'mk816017',	'高雄總店',	'2014-06-09',	'ok'),
(0002,	'a0003',	'高雄總店',	'2014-06-10',	'no');

DROP TABLE IF EXISTS `order_content`;
CREATE TABLE `order_content` (
  `order_no` int(4) unsigned zerofill NOT NULL COMMENT '訂單編號',
  `product_name` varchar(12) NOT NULL COMMENT '產品名稱',
  `quantity` int(2) unsigned NOT NULL COMMENT '數量',
  PRIMARY KEY (`order_no`,`product_name`),
  KEY `product_name` (`product_name`),
  CONSTRAINT `order_content_ibfk_1` FOREIGN KEY (`order_no`) REFERENCES `order` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_content_ibfk_3` FOREIGN KEY (`product_name`) REFERENCES `product` (`product_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='訂單';

INSERT INTO `order_content` (`order_no`, `product_name`, `quantity`) VALUES
(0001,	'巧克力捲心酥',	10),
(0001,	'巧克力棒',	1),
(0001,	'草莓餅乾',	15),
(0002,	'草莓餅乾',	4);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '產品編號',
  `product_name` varchar(12) NOT NULL COMMENT '產品名稱',
  `type_name` varchar(8) NOT NULL COMMENT '類型編號',
  `ingredients` varchar(100) NOT NULL COMMENT '產品成份',
  PRIMARY KEY (`product_no`),
  UNIQUE KEY `product_name` (`product_name`),
  KEY `type_name` (`type_name`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_name`) REFERENCES `product_type` (`type_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品';

INSERT INTO `product` (`product_no`, `product_name`, `type_name`, `ingredients`) VALUES
(0001,	'巧克力餅乾',	'手工餅乾',	'可可粉、進口奶油、蛋、珍珠糖'),
(0002,	'草莓餅乾',	'手工餅乾',	'乾燥草莓、蛋白、糖'),
(0003,	'奶油餅乾',	'手工餅乾',	'新鮮香草籽、奶油、夏威夷果仁'),
(0004,	'抹茶餅乾',	'手工餅乾',	'選抹茶、進口奶油、蛋白、糖'),
(0005,	'原味蛋捲',	'蛋捲',	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油'),
(0006,	'芝麻蛋捲',	'蛋捲',	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油、黑白芝麻'),
(0007,	'咖啡蛋捲',	'蛋捲',	'阿拉比卡咖啡、新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油'),
(0008,	'抹茶蛋捲',	'蛋捲',	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油、抹茶粉'),
(0009,	'蜂蜜蛋捲',	'蛋捲',	'新鮮雞蛋、澳洲奶粉、砂糖、麵粉、植物油、蜂蜜'),
(0010,	'巧克力捲心酥',	'捲心酥',	'可可粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0011,	'奶油捲心酥',	'捲心酥',	'乳清粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0012,	'草莓捲心酥',	'捲心酥',	'草莓粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0013,	'花生捲心酥',	'捲心酥',	'花生粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0014,	'咖啡捲心酥',	'捲心酥',	'咖啡粉、高級麵粉、蛋、奶粉、糖、轉化糖、乳糖、植物性油脂、卵磷脂、食鹽、香料、焦糖色素'),
(0015,	'奶油煎餅',	'煎餅',	'麵粉、砂糖、植物油、奶粉、蛋、奶油、乳化劑、膨脹劑'),
(0016,	'海苔煎餅',	'煎餅',	'海苔、麵粉、砂糖、植物油(棕櫚油)、奶粉、雞蛋、奶油、乳化劑、膨賬劑'),
(0017,	'花生煎餅',	'煎餅',	'麵粉、砂糖、植物油、奶粉、蛋、奶油、花生、乳化劑、膨脹劑'),
(0018,	'巧克力棒',	'棒狀餅乾',	'小麥粉、砂糖、可可塊、棕櫚油、全脂奶粉、酥油(棕櫚油)、食鹽、可可脂、奶油、酵母、大豆卵磷脂、香料、氯化鉀、食用色素(婀娜多)、(原材料的一部分由大豆提煉)'),
(0019,	'草莓棒',	'棒狀餅乾',	'小麥粉、砂糖、棕櫚油、乳糖、全脂奶粉、酥油(棕櫚油)、草莓粉、奶油、食鹽、酵母、食用色素(紅甜菜,婀娜多)、大豆卵磷脂、氯化鉀、香料、膨脹劑(碳酸氫鈉)、(原材料一部分由大豆提煉)'),
(0020,	'奶油棒',	'棒狀餅乾',	'小麥粉、砂糖、全脂奶粉、塊、棕櫚油、、酥油(棕櫚油)、食鹽、奶油、酵母、香料、大豆卵磷脂、膨脹劑(碳酸氫鈉)、甜味劑(蔗糖素)'),
(0021,	'哈密瓜棒',	'棒狀餅乾',	'小麥粉、砂糖、棕櫚油、乳糖、酥油(棕櫚油)、加糖煉乳、哈密瓜果汁粉、全脂奶粉、食鹽、水飴、酵母、大豆卵磷脂、香料、甜味劑(D-山梨醇)、膨脹劑(碳酸氫鈉)、食用色素(婀娜多,胡蘿蔔)');

DROP TABLE IF EXISTS `product_price`;
CREATE TABLE `product_price` (
  `product_name` varchar(12) NOT NULL COMMENT '產品名稱',
  `size_name` char(4) NOT NULL COMMENT '尺寸名稱',
  `price` int(3) unsigned NOT NULL COMMENT '單價',
  PRIMARY KEY (`product_name`,`size_name`),
  KEY `size_name` (`size_name`),
  CONSTRAINT `product_price_ibfk_1` FOREIGN KEY (`product_name`) REFERENCES `product` (`product_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_price_ibfk_2` FOREIGN KEY (`size_name`) REFERENCES `product_size` (`size_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品價格';

INSERT INTO `product_price` (`product_name`, `size_name`, `price`) VALUES
('原味蛋捲',	'禮盒',	220),
('原味蛋捲',	'罐裝',	170),
('原味蛋捲',	'袋子',	120),
('咖啡捲心酥',	'禮盒',	190),
('咖啡捲心酥',	'罐裝',	140),
('咖啡捲心酥',	'袋子',	90),
('咖啡蛋捲',	'禮盒',	240),
('咖啡蛋捲',	'罐裝',	190),
('咖啡蛋捲',	'袋子',	140),
('哈密瓜棒',	'禮盒',	80),
('哈密瓜棒',	'罐裝',	60),
('哈密瓜棒',	'袋子',	40),
('奶油捲心酥',	'禮盒',	180),
('奶油捲心酥',	'罐裝',	130),
('奶油捲心酥',	'袋子',	80),
('奶油棒',	'禮盒',	80),
('奶油棒',	'罐裝',	60),
('奶油棒',	'袋子',	40),
('奶油煎餅',	'禮盒',	150),
('奶油煎餅',	'罐裝',	100),
('奶油煎餅',	'袋子',	50),
('奶油餅乾',	'禮盒',	200),
('奶油餅乾',	'罐裝',	150),
('奶油餅乾',	'袋子',	100),
('巧克力捲心酥',	'禮盒',	180),
('巧克力捲心酥',	'罐裝',	130),
('巧克力捲心酥',	'袋子',	80),
('巧克力棒',	'禮盒',	80),
('巧克力棒',	'罐裝',	60),
('巧克力棒',	'袋子',	40),
('巧克力餅乾',	'禮盒',	200),
('巧克力餅乾',	'罐裝',	150),
('巧克力餅乾',	'袋子',	100),
('抹茶蛋捲',	'禮盒',	240),
('抹茶蛋捲',	'罐裝',	190),
('抹茶蛋捲',	'袋子',	140),
('抹茶餅乾',	'禮盒',	220),
('抹茶餅乾',	'罐裝',	170),
('抹茶餅乾',	'袋子',	120),
('海苔煎餅',	'禮盒',	150),
('海苔煎餅',	'罐裝',	100),
('海苔煎餅',	'袋子',	50),
('芝麻蛋捲',	'禮盒',	220),
('芝麻蛋捲',	'罐裝',	170),
('芝麻蛋捲',	'袋子',	120),
('花生捲心酥',	'禮盒',	180),
('花生捲心酥',	'罐裝',	130),
('花生捲心酥',	'袋子',	80),
('花生煎餅',	'禮盒',	150),
('花生煎餅',	'罐裝',	100),
('花生煎餅',	'袋子',	50),
('草莓捲心酥',	'禮盒',	180),
('草莓捲心酥',	'罐裝',	130),
('草莓捲心酥',	'袋子',	80),
('草莓棒',	'禮盒',	80),
('草莓棒',	'罐裝',	60),
('草莓棒',	'袋子',	40),
('草莓餅乾',	'禮盒',	200),
('草莓餅乾',	'罐裝',	150),
('草莓餅乾',	'袋子',	100),
('蜂蜜蛋捲',	'禮盒',	220),
('蜂蜜蛋捲',	'罐裝',	170),
('蜂蜜蛋捲',	'袋子',	120);

DROP TABLE IF EXISTS `product_size`;
CREATE TABLE `product_size` (
  `size_no` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '尺寸編號',
  `size_name` char(4) NOT NULL COMMENT '尺寸名稱',
  PRIMARY KEY (`size_no`),
  UNIQUE KEY `size_name` (`size_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='產品尺寸';

INSERT INTO `product_size` (`size_no`, `size_name`) VALUES
(0001,	'禮盒'),
(0002,	'罐裝'),
(0003,	'袋子');

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

-- 2014-06-10 13:18:41
