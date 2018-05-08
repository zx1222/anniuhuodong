/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : ejiao

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-07-12 14:30:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `address` varchar(100) NOT NULL DEFAULT '' COMMENT '地址',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '相信', '15506656802', '111', '1499135945');
INSERT INTO `user` VALUES ('2', 'ew', 'ew', 'ew', '1499135980');
INSERT INTO `user` VALUES ('3', 'ew', 'ew', 'ew', '1499136013');
INSERT INTO `user` VALUES ('4', 'ew', 'ew', 'ew', '1499136056');
INSERT INTO `user` VALUES ('5', 'adad', '15506658256', 'ada', '1499150612');
INSERT INTO `user` VALUES ('6', '张鑫', '15506656802', '111', '1499154219');
INSERT INTO `user` VALUES ('7', '1', '15215432342', '1', '1499222294');
