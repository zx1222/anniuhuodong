/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : aojiaodajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-10-17 11:51:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_anniuzhengwen_weixin_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuzhengwen_weixin_user`;
CREATE TABLE `tbl_anniuzhengwen_weixin_user` (
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

-- ----------------------------
-- Records of tbl_anniuzhengwen_weixin_user
-- ----------------------------
INSERT INTO `tbl_anniuzhengwen_weixin_user` VALUES ('o_P7SwLw3vgSa9dhkgHMDiaDskqk', '6i0OSjtgbSudGJ8UDD1PGkh_Dge1auLy', '素生', '0', '', '', '', 'http://wx.qlogo.cn/mmopen/vi_32/Q3auHgzwzM664mlBvfKEwMZDtBdfcRHkgkY469GAJLLklLONryMib0JwHmooKnW3wFu5EFovo4PUmBUtTssPr1w/0', '0', null, '0', '::1', '2017-10-17 11:50:19', '', '', '', '10', '0', '10', '0', '10', '0', '10', '0', '10', '0', '10', '0', '10', '0', '');
-- ----------------------------
-- Table structure for tbl_anniuzhengwen_vote
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuzhengwen_vote`;
CREATE TABLE `tbl_anniuzhengwen_vote` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(32) NOT NULL DEFAULT '' COMMENT '用户openid',
  `article_id` int(11) NOT NULL DEFAULT '0' COMMENT '投票文章',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '投票时间',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT 'IP地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_anniuzhengwen_vote
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_anniuzhengwen_article
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuzhengwen_article`;
CREATE TABLE `tbl_anniuzhengwen_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `author` varchar(100) NOT NULL DEFAULT '' COMMENT '作者',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '文章内容',
  `vote` int(11) NOT NULL DEFAULT '0' COMMENT '总票数',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COMMENT='文章表';

-- ----------------------------
-- Records of tbl_anniuzhengwen_article
-- ----------------------------
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('1', '安宫牛黄丸是救命药', '赵香鸿', '2017-10/ZHoX_USMVxGqKQGOI-7Z27u1o8d4BD89.png', '0', '1508143307', '1508143307');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('2', '常备的意义----亲眼见证北京同仁堂安宫牛黄丸的神奇功效', '吴声英', '2017-10/62-XmBmetkT_7I7B2D2C8JU5DIhWsjh_.png', '0', '1508143368', '1508143368');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('3', '感谢有你——北京同仁堂安宫牛黄丸', '李科', '2017-10/fcYaM28SOakAGSZF3PxBTP-5erMJiDUP.png', '0', '1508143418', '1508143418');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('4', '记一个救死扶伤的神奇古药——安宫牛黄丸', '邓迎春', '2017-10/QQkHTAXFXsyi1wyNPX-gPbcpuZHrGVDs.png', '0', '1508143465', '1508143465');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('5', '老伴已经去世3年，我以这个故事怀念他', '金子', '2017-10/-e2Nnqt0eLft6ytnWaWlLr2OXR3n8qYO.png', '0', '1508143502', '1508143502');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('6', '欧洲之行，有惊无险——安宫牛黄丸保驾护航', '张大志/程志华', '2017-10/EX7ENmXXyQetvjRb7XvjgVM9uf0v1I-L.png', '0', '1508143615', '1508143615');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('7', '我和安宫牛黄丸的故事', '罗建双', '2017-10/1jqtIKKe_KWrEHEtMkugqpor4pAWkN0i.png', '0', '1508143646', '1508143646');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('8', '孝敬父母，关爱家人，善待父母', '王康任', '2017-10/a8Z63qtjhIGFxlzOxx8-uWjB-Z8GZ5cT.png', '0', '1508143670', '1508143670');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('9', '要不是爷爷的两次中风，舅姥爷又怎会得救呢？ ', '张秀芹', '2017-10/bMcYtaqJ1WIMmfISFMhIGj_z1WgajVxy.png', '0', '1508143692', '1508143692');
INSERT INTO `tbl_anniuzhengwen_article` VALUES ('10', '最好的，要给最爱的人，让亲情不留遗憾', '戥小星', '2017-10/C1QJw5dVzJ3HZW1D28o6l9-59mriKNbl.png', '0', '1508143750', '1508143750');