/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : aojiaodajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-20 14:31:15
*/

SET FOREIGN_KEY_CHECKS=0;


-- ----------------------------
-- Table structure for tbl_ejiaoyuandan_config
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaoyuandan_config`;
CREATE TABLE `tbl_ejiaoyuandan_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `praisefeild` varchar(10) NOT NULL COMMENT '奖项标识字段',
  `praisename` varchar(20) NOT NULL COMMENT '奖项名称',
  `min` varchar(100) NOT NULL COMMENT '最小角度',
  `max` varchar(100) NOT NULL COMMENT '最大角度',
  `praisecontent` text NOT NULL COMMENT '奖项内容',
  `praisenumber` int(5) NOT NULL COMMENT '奖项库存',
  `praiseimage` varchar(200) NOT NULL DEFAULT '' COMMENT '奖品图片',
  `chance` int(10) NOT NULL DEFAULT '0' COMMENT '获奖几率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_ejiaoyuandan_config
-- ----------------------------
INSERT INTO `tbl_ejiaoyuandan_config` VALUES ('1', '', '阿胶500g', '0', '71', '阿胶500g', '2', '2017-12/1sppNXQcD909p6EKL6HvhZUd1JkttU3X.png', '2');
INSERT INTO `tbl_ejiaoyuandan_config` VALUES ('2', '', '阿胶250g', '72', '143', '阿胶250g', '3', '2017-12/1sppNXQcD909p6EKL6HvhZUd1JkttU3X.png', '2');
INSERT INTO `tbl_ejiaoyuandan_config` VALUES ('3', '', '阿胶糕', '144', '215', '阿胶糕', '5', '2017-12/zxiORCxjeLyCfRimKdDXcuCQGs6cC7ij.png', '20');
INSERT INTO `tbl_ejiaoyuandan_config` VALUES ('4', '', '阿胶果丹皮', '216', '287', '阿胶果丹皮', '3', '2017-12/1ruAM-DPf9YjbHBlxvTyFsbe8mZOXEDh.png', '2');
INSERT INTO `tbl_ejiaoyuandan_config` VALUES ('6', '', '祝福礼', '288', '359', '祝福礼', '-1', '', '74');

-- ----------------------------
-- Table structure for tbl_ejiaoyuandan_prize_pool
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaoyuandan_prize_pool`;
CREATE TABLE `tbl_ejiaoyuandan_prize_pool` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '奖池ID',
  `aid` tinyint(1) NOT NULL COMMENT '奖项',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态0未中奖，1已中奖',
  `openid` varchar(32) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `order` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `result` text NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`),
  KEY `aid` (`aid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


-- ----------------------------
-- Table structure for tbl_ejiaoyuandan_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaoyuandan_userinfo`;
CREATE TABLE `tbl_ejiaoyuandan_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `openid` varchar(100) NOT NULL DEFAULT '' COMMENT '用户openid标识',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` varchar(15) NOT NULL DEFAULT '' COMMENT '电话',
  `address` text COMMENT '收货地址',
  `prize_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '奖品id',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户收货信息表';

-- ----------------------------
-- Table structure for tbl_ejiaoyuandan_weixin_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaoyuandan_weixin_user`;
CREATE TABLE `tbl_ejiaoyuandan_weixin_user` (
  `openid` varchar(32) NOT NULL DEFAULT '' COMMENT 'OPENID',
  `authKey` varchar(100) NOT NULL DEFAULT '' COMMENT 'cookies认证',
  `wx_username` varchar(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `wx_sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `wx_country` varchar(30) NOT NULL DEFAULT '' COMMENT '国家',
  `wx_province` varchar(30) NOT NULL DEFAULT '' COMMENT '省份',
  `wx_city` varchar(30) NOT NULL DEFAULT '' COMMENT '城市',
  `wx_avatar` text COMMENT '微信获取的头像链接',
  `wx_subscribe` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否关注',
  `wx_access_token` text,
  `wx_expires` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '0' COMMENT 'IP地址',
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













