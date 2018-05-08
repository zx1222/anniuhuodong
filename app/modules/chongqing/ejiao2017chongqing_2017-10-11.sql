# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: ejiao2017chongqing
# Generation Time: 2017-10-11 10:48:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_ejiao2017chongqing_config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_ejiao2017chongqing_config`;

CREATE TABLE `tbl_ejiao2017chongqing_config` (
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

LOCK TABLES `tbl_ejiao2017chongqing_config` WRITE;
/*!40000 ALTER TABLE `tbl_ejiao2017chongqing_config` DISABLE KEYS */;

INSERT INTO `tbl_ejiao2017chongqing_config` (`id`, `praisefeild`, `praisename`, `min`, `max`, `praisecontent`, `praisenumber`, `chance`)
VALUES
	(1,'','现金红包','120','179','现金红包',10,2),
	(2,'','阿胶饼干','0','59','阿胶饼干',30,2),
	(3,'','阿胶枣','240','299','阿胶饼干',30,2),
	(6,'','谢谢参与','60,300','119,359','谢谢参与',-1,94);

/*!40000 ALTER TABLE `tbl_ejiao2017chongqing_config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_ejiao2017chongqing_prize_pool
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_ejiao2017chongqing_prize_pool`;

CREATE TABLE `tbl_ejiao2017chongqing_prize_pool` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '奖池ID',
  `aid` tinyint(1) NOT NULL COMMENT '奖项',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态0未中奖，1已中奖',
  `openid` varchar(32) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `order` varchar(100) NOT NULL DEFAULT '',
  `result` text NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pid`),
  KEY `status` (`status`) USING BTREE,
  KEY `aid` (`aid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;



# Dump of table tbl_ejiao2017chongqing_weixin_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_ejiao2017chongqing_weixin_user`;

CREATE TABLE `tbl_ejiao2017chongqing_weixin_user` (
  `openid` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT 'OPENID',
  `authKey` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT 'cookies认证',
  `wx_username` varchar(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `wx_sex` tinyint(1) NOT NULL COMMENT '性别',
  `wx_country` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '国家',
  `wx_province` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '省份',
  `wx_city` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '城市',
  `wx_avatar` text CHARACTER SET utf8 NOT NULL COMMENT '微信获取的头像链接',
  `wx_subscribe` tinyint(1) NOT NULL COMMENT '是否关注',
  `wx_access_token` text CHARACTER SET utf8 NOT NULL,
  `wx_expires` int(11) NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 NOT NULL COMMENT 'IP地址',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `realname` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '真实姓名',
  `mobile` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '手机号',
  `address` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '地址',
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
  `extra` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`openid`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户表';




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
