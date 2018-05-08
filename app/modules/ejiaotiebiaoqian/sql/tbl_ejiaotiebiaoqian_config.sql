/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : aojiaodajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-27 15:43:53
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
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('3', '', '钥匙包', '', '', '纪念奖', '0', '2017-09/Tf3fv7Gtnj-P27zxsiW1uGdRhCEODzY4.jpg', '0');
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('4', '', '阿胶', '', '', '一等奖', '3', '2017-09/5qQH4ZTVYag2Z34ZfJRR2-vdVytU51h4.jpg', '5');
INSERT INTO `tbl_ejiaotiebiaoqian_config` VALUES ('5', '', '谢谢参与', '', '', '谢谢参与', '0', '', '75');
