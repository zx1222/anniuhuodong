/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : aojiaodajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-14 18:27:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_ejiaotiebiaoqian_config
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaotiebiaoqian_config`;
CREATE TABLE `tbl_ejiaotiebiaoqian_config` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `praisefeild` varchar(10) NOT NULL COMMENT '奖项标识字段',
  `praisename` varchar(20) NOT NULL COMMENT '奖项名称',
  `min` varchar(100) NOT NULL COMMENT '最小角度',
  `max` varchar(100) NOT NULL COMMENT '最大角度',
  `praisecontent` text NOT NULL COMMENT '奖项内容',
  `praisenumber` int(5) NOT NULL COMMENT '奖项库存',
  `praiseimage` varchar(200) NOT NULL DEFAULT '' COMMENT '奖品图片',
  `chance` int(10) NOT NULL COMMENT '获奖几率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_ejiaotiebiaoqian_config
-- ----------------------------
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('1', '', '金丝枣', '', '', '三等奖', '20', '2017-09/SCeSbkOznWeViRAXl6JSaZrw0ygw31YZ.jpg', '10');
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('2', '', '阿胶糕', '', '', '二等奖', '10', '2017-09/puHKbGousqRphmdgy_siKaLOuc_ayQng.jpg', '10');
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('3', '', '钥匙包', '', '', '参与奖', '0', '2017-09/Tf3fv7Gtnj-P27zxsiW1uGdRhCEODzY4.jpg', '0');
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('4', '', '阿胶', '', '', '一等奖', '3', '2017-09/5qQH4ZTVYag2Z34ZfJRR2-vdVytU51h4.jpg', '5');
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('5', '', '谢谢参与', '', '', '谢谢参与', '0', '', '75');


-- ----------------------------
-- Table structure for tbl_ejiaotiebiaoqian_friends
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaotiebiaoqian_friends`;
CREATE TABLE `tbl_ejiaotiebiaoqian_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `friends` varchar(100) NOT NULL DEFAULT '' COMMENT '好友',
  `myself` varchar(100) NOT NULL DEFAULT '' COMMENT '当前自己',
  `labels` varchar(100) NOT NULL DEFAULT '' COMMENT '好友为自己贴的标签',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='好友贴标签';

-- ----------------------------
-- Table structure for tbl_ejiaotiebiaoqian_labels
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaotiebiaoqian_labels`;
CREATE TABLE `tbl_ejiaotiebiaoqian_labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `labels` varchar(100) NOT NULL DEFAULT '' COMMENT '标签名称',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态；0-显示；1-隐藏',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COMMENT='标签表';

-- ----------------------------
-- Records of tbl_ejiaotiebiaoqian_labels
-- ----------------------------
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('1', '高富帅', '1', '1505446736', '1505446736');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('2', '暖男', '1', '1505446769', '1505446769');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('3', '万人迷', '1', '1505446777', '1505446777');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('4', '学霸', '1', '1505446783', '1505446783');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('5', '吃货', '1', '1505446788', '1505446788');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('6', '王者', '1', '1505446794', '1505446794');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('7', '傲娇', '1', '1505446803', '1505446803');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('8', '老司机', '1', '1505446810', '1505446810');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('9', '有眼光', '1', '1505446822', '1505446822');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('10', '工作狂', '1', '1505446829', '1505446829');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('11', '烟篓子', '1', '1505446891', '1505446891');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('12', '腹黑', '1', '1505446901', '1505446901');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('13', '小太妹', '1', '1505446909', '1505446909');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('14', '高颜值', '1', '1505446924', '1505446924');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('15', '戏精', '1', '1505446950', '1505446950');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('16', '吃不胖', '1', '1505446960', '1505446960');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('17', '夜猫子', '1', '1505446973', '1505446973');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('18', '欠削', '1', '1505446982', '1505446982');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('19', '虚', '1', '1505446991', '1505446991');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('20', '作', '1', '1505446999', '1505446999');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('21', '弯的', '1', '1505447012', '1505447012');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('22', '有范儿', '1', '1505447081', '1505447081');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('23', '肉食汪', '1', '1505447090', '1505454911');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('24', '素食', '1', '1505447098', '1505454939');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('25', '妻管严', '1', '1505447133', '1505447133');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('26', '闷骚', '1', '1505447154', '1505447154');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('27', '嘴炮', '1', '1505447180', '1505447180');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('28', '高冷', '1', '1505447194', '1505447194');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('29', '呆萌', '1', '1505447203', '1505447203');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('30', '宅男', '1', '1505447214', '1505447214');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('31', '腐女', '1', '1505447220', '1505447220');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('32', '小公举', '1', '1505447244', '1505447244');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('33', '直男', '1', '1505447261', '1505447261');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('34', '强迫症', '1', '1505447276', '1505447276');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('35', '爱折腾', '1', '1505447294', '1505447294');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('36', '有逼格', '1', '1505447315', '1505447315');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('37', '女王', '1', '1505447340', '1505447340');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('38', '小可爱', '1', '1505447347', '1505447347');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('39', '少根筋儿', '1', '1505447364', '1505447364');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('40', '穿搭好', '1', '1505447380', '1505447380');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('41', '饭桶', '1', '1505447389', '1505447389');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('42', '逗B', '1', '1505447405', '1505447405');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('43', '靠谱', '1', '1505447415', '1505447415');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('44', '仙儿', '1', '1505447429', '1505454866');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('45', '表里如一', '1', '1505447439', '1505447439');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('46', '绿茶', '1', '1505447457', '1505447457');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('47', '简单', '1', '1505447471', '1505447471');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('48', '爱笑', '1', '1505447477', '1505447477');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('49', '俗', '1', '1505447496', '1505447496');
INSERT INTO `tbl_ejiaotiebiaoqian_labels` VALUES ('50', '情怀', '1', '1505447545', '1505447545');


-- ----------------------------
-- Table structure for tbl_ejiaotiebiaoqian_prize
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaotiebiaoqian_prize`;
CREATE TABLE `tbl_ejiaotiebiaoqian_prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `user` varchar(100) NOT NULL DEFAULT '' COMMENT '抽奖用户',
  `prize_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '奖品id',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态；0-未中奖；1-已中奖',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='抽奖记录表';

-- ----------------------------
-- Table structure for tbl_ejiaotiebiaoqian_selflabels
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaotiebiaoqian_selflabels`;
CREATE TABLE `tbl_ejiaotiebiaoqian_selflabels` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `myself` varchar(100) NOT NULL DEFAULT '' COMMENT '用户自己',
  `labels` varchar(100) NOT NULL DEFAULT '' COMMENT '用户给自己贴的标签',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户给自己贴标签';

-- ----------------------------
-- Table structure for tbl_ejiaotiebiaoqian_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaotiebiaoqian_userinfo`;
CREATE TABLE `tbl_ejiaotiebiaoqian_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` varchar(15) NOT NULL DEFAULT '' COMMENT '电话',
  `address` text COMMENT '收货地址',
  `prize_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '奖品id',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户收货信息表';

-- ----------------------------
-- Table structure for tbl_ejiaotiebiaoqian_weixin_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ejiaotiebiaoqian_weixin_user`;
CREATE TABLE `tbl_ejiaotiebiaoqian_weixin_user` (
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
-- Records of tbl_ejiaotiebiaoqian_weixin_user
-- ----------------------------
INSERT INTO `tbl_ejiaotiebiaoqian_weixin_user` VALUES ('o_P7SwLw3vgSa9dhkgHMDiaDskqk', '3obfLfbymofx1pmUnrW6a3G6sTLDOAeD', '', '0', '', '', '', '', '0', '', '0', '::1', '2017-08-25 14:07:31', '', '', '', '10', '0', '10', '0', '10', '0', '10', '0', '10', '0', '10', '0', '10', '0', '');

