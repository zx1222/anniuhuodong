# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.19)
# Database: anniuzhuanpan
# Generation Time: 2016-06-15 05:29:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_fathersday_config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_fathersday_config`;

CREATE TABLE `tbl_fathersday_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `praisefeild` varchar(10) NOT NULL COMMENT '奖项标识字段',
  `praisename` varchar(20) NOT NULL COMMENT '奖项名称',
  `min` varchar(100) NOT NULL COMMENT '最小角度',
  `max` varchar(100) NOT NULL COMMENT '最大角度',
  `praisecontent` text NOT NULL COMMENT '奖项内容',
  `praisenumber` int(5) NOT NULL COMMENT '奖项库存',
  `chance` int(10) NOT NULL COMMENT '获奖几率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_fathersday_config` WRITE;
/*!40000 ALTER TABLE `tbl_fathersday_config` DISABLE KEYS */;

INSERT INTO `tbl_fathersday_config` (`id`, `praisefeild`, `praisename`, `min`, `max`, `praisecontent`, `praisenumber`, `chance`)
VALUES
	(1,'5','现金红包','120','179','现金红包',10000,10),
	(2,'third','拔罐器','60','119','拔罐器',10,10),
	(3,'forth','血压仪','180','239','血压仪',5,5),
	(4,'first','按摩坐垫','240','299','按摩坐垫',0,0),
	(5,'6','安宫牛黄丸','300','359','安宫牛黄丸',2,2),
	(6,'second','谢谢参与','0','59','谢谢参与',-1,100);

/*!40000 ALTER TABLE `tbl_fathersday_config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_fathersday_photo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_fathersday_photo`;

CREATE TABLE `tbl_fathersday_photo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(32) NOT NULL,
  `old_photo` varchar(255) NOT NULL DEFAULT '' COMMENT '老照片',
  `new_photo` varchar(255) NOT NULL DEFAULT '' COMMENT '新照片',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '图说',
  `prize_status` tinyint(4) NOT NULL DEFAULT '10',
  `prize_pid` tinyint(4) NOT NULL DEFAULT '0',
  `lukey_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '抽奖时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `status` enum('pending','approved','refused') NOT NULL DEFAULT 'pending' COMMENT '状态',
  `vote` int(11) NOT NULL DEFAULT '0' COMMENT '投票总数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_fathersday_photo` WRITE;
/*!40000 ALTER TABLE `tbl_fathersday_photo` DISABLE KEYS */;

INSERT INTO `tbl_fathersday_photo` (`id`, `openid`, `old_photo`, `new_photo`, `desc`, `prize_status`, `prize_pid`, `lukey_at`, `created_at`, `status`, `vote`)
VALUES
	(1,'oWwl7s3ULfcMY0fBeLziZGcp389Q','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(2,'oWwl7s3ULfcMY0fBeLziZGcp3891','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(3,'oWwl7s3ULfcMY0fBeLziZGcp3892','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(4,'oWwl7s3ULfcMY0fBeLziZGcp3893','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(5,'oWwl7s3ULfcMY0fBeLziZGcp3894','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(6,'oWwl7s3ULfcMY0fBeLziZGcp3895','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(7,'oWwl7s3ULfcMY0fBeLziZGcp3896','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(8,'oWwl7s3ULfcMY0fBeLziZGcp3897','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(9,'oWwl7s3ULfcMY0fBeLziZGcp3898','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(10,'oWwl7s3ULfcMY0fBeLziZGcp3899','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(11,'oWwl7s3ULfcMY0fBeLziZGcp3801','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(12,'oWwl7s3ULfcMY0fBeLziZGcp3802','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(13,'oWwl7s3ULfcMY0fBeLziZGcp3803','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(14,'oWwl7s3ULfcMY0fBeLziZGcp3804','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(15,'oWwl7s3ULfcMY0fBeLziZGcp3805','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(16,'oWwl7s3ULfcMY0fBeLziZGcp3806','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0),
	(17,'oWwl7s3ULfcMY0fBeLziZGcp3807','tmexu2HEkrJoJk0OhpYA8vP5GzAB5omd.png','2EQicRtqWRjuGv9qwP0lrwc2-u0SWp5f.png','sdsf',10,0,'0000-00-00 00:00:00','2016-06-15 04:13:49','approved',0);

/*!40000 ALTER TABLE `tbl_fathersday_photo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_fathersday_prize_pool
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_fathersday_prize_pool`;

CREATE TABLE `tbl_fathersday_prize_pool` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '奖池ID',
  `aid` tinyint(1) NOT NULL COMMENT '奖项',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态0未中奖，1已中奖',
  `openid` varchar(32) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `order` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `result` text NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;



# Dump of table tbl_fathersday_vote
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_fathersday_vote`;

CREATE TABLE `tbl_fathersday_vote` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(32) NOT NULL DEFAULT '' COMMENT '用户openid',
  `photo_id` int(11) NOT NULL DEFAULT '0' COMMENT '投票对象',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '投票时间',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT 'IP地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table tbl_fathersday_vote_config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_fathersday_vote_config`;

CREATE TABLE `tbl_fathersday_vote_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `praisefeild` varchar(10) NOT NULL COMMENT '奖项标识字段',
  `praisename` varchar(20) NOT NULL COMMENT '奖项名称',
  `min` varchar(100) NOT NULL COMMENT '最小角度',
  `max` varchar(100) NOT NULL COMMENT '最大角度',
  `praisecontent` text NOT NULL COMMENT '奖项内容',
  `praisenumber` int(5) NOT NULL COMMENT '奖项库存',
  `chance` int(10) NOT NULL COMMENT '获奖几率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tbl_fathersday_vote_prize_pool
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_fathersday_vote_prize_pool`;

CREATE TABLE `tbl_fathersday_vote_prize_pool` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '奖池ID',
  `aid` tinyint(1) NOT NULL COMMENT '奖项',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态0未中奖，1已中奖',
  `openid` varchar(32) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `order` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `result` text NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;



# Dump of table tbl_fathersday_weixin_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_fathersday_weixin_user`;

CREATE TABLE `tbl_fathersday_weixin_user` (
  `openid` varchar(32) NOT NULL COMMENT 'OPENID',
  `authKey` varchar(100) NOT NULL DEFAULT '' COMMENT 'cookies认证',
  `wx_username` varchar(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `wx_sex` tinyint(1) NOT NULL COMMENT '性别',
  `wx_country` varchar(30) NOT NULL DEFAULT '' COMMENT '国家',
  `wx_province` varchar(30) NOT NULL DEFAULT '' COMMENT '省份',
  `wx_city` varchar(30) NOT NULL DEFAULT '' COMMENT '城市',
  `wx_avatar` text NOT NULL COMMENT '微信获取的头像链接',
  `wx_subscribe` tinyint(1) NOT NULL COMMENT '是否关注',
  `wx_access_token` text NOT NULL,
  `wx_expires` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL COMMENT 'IP地址',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `realname` varchar(32) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `d1_status` tinyint(2) NOT NULL DEFAULT '10' COMMENT '本日剩余次数',
  `d1_pid` int(11) NOT NULL DEFAULT '0' COMMENT '奖项ID',
  `d2_status` tinyint(2) NOT NULL DEFAULT '10' COMMENT '本日剩余次数',
  `d2_pid` int(11) NOT NULL DEFAULT '0' COMMENT '奖项ID',
  `d3_status` tinyint(2) NOT NULL DEFAULT '10' COMMENT '本日剩余次数',
  `d3_pid` int(11) NOT NULL DEFAULT '0' COMMENT '奖项ID',
  `d4_status` tinyint(2) NOT NULL DEFAULT '10' COMMENT '本日剩余次数',
  `d4_pid` int(11) NOT NULL DEFAULT '0' COMMENT '奖项ID',
  `d5_status` tinyint(2) NOT NULL DEFAULT '10' COMMENT '本日剩余次数',
  `d5_pid` int(11) NOT NULL DEFAULT '0' COMMENT '奖项ID',
  `d6_status` tinyint(2) NOT NULL DEFAULT '10' COMMENT '本日剩余次数',
  `d6_pid` int(11) NOT NULL DEFAULT '0' COMMENT '奖项ID',
  `d7_status` tinyint(2) NOT NULL DEFAULT '10' COMMENT '本日剩余次数',
  `d7_pid` int(11) NOT NULL DEFAULT '0' COMMENT '奖项ID',
  `extra` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`openid`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

LOCK TABLES `tbl_fathersday_weixin_user` WRITE;
/*!40000 ALTER TABLE `tbl_fathersday_weixin_user` DISABLE KEYS */;

INSERT INTO `tbl_fathersday_weixin_user` (`openid`, `authKey`, `wx_username`, `wx_sex`, `wx_country`, `wx_province`, `wx_city`, `wx_avatar`, `wx_subscribe`, `wx_access_token`, `wx_expires`, `ip`, `created_at`, `realname`, `mobile`, `address`, `d1_status`, `d1_pid`, `d2_status`, `d2_pid`, `d3_status`, `d3_pid`, `d4_status`, `d4_pid`, `d5_status`, `d5_pid`, `d6_status`, `d6_pid`, `d7_status`, `d7_pid`, `extra`)
VALUES
	('oWwl7s3ULfcMY0fBeLziZGcp3810','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3811','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3812','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3813','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3814','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3815','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3816','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3817','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3891','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3892','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3893','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3894','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3895','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3896','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3897','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3898','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp3899','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1'),
	('oWwl7s3ULfcMY0fBeLziZGcp389Q','4_x34NSfADiFvFWGwDoKQAX0DpinHfQF','素生',1,'中国','北京','东城','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeD0IbO1kWDd7JcFZUQO2HEcnF8FMjVKW2LVAPz7LVv1BrG4Bnic04aBliaA8YpPYtaN7bAe4KqEgw/0',1,'ReNyNrbMfiAP4FUL_Iv_Od38GIm6zVLAoq14mlWAXyjbPS71wIGFxxzKTvmp1Gg_fCOw5DiSJ4x',7200,'::1','2016-06-15 02:11:26','','','',10,0,10,0,10,0,10,0,10,0,10,0,10,0,'1');

/*!40000 ALTER TABLE `tbl_fathersday_weixin_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
