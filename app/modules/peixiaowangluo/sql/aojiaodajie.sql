/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : aojiaodajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-02 15:57:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_peixiao_company
-- ----------------------------
DROP TABLE IF EXISTS `tbl_peixiao_company`;
CREATE TABLE `tbl_peixiao_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `shop_name` varchar(100) NOT NULL DEFAULT '' COMMENT '店名',
  `region` varchar(255) NOT NULL DEFAULT '' COMMENT '区域',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '显示或隐藏；0-隐藏，1-显示',
  `telephone` varchar(15) NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `created_by` int(11) NOT NULL DEFAULT '0' COMMENT '创建人',
  `updated_by` int(11) NOT NULL DEFAULT '0' COMMENT '修改人',
  PRIMARY KEY (`id`),
  KEY `region` (`region`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='配销网络店铺管理';

-- ----------------------------
-- Records of tbl_peixiao_company
-- ----------------------------
INSERT INTO `tbl_peixiao_company` VALUES ('1', '北京同仁堂粤东有限公司', '广西壮族自治区 福建省 广东省', '广东省潮州市饶平县黄冈镇清华路华涛园四栋', '1', '0768-8866318', '1509588129', '1509588129', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('2', '北京同仁堂山西药业有限责任公司', '内蒙古自治区西部 河北省 陕西省 山西省', '山西省太原市小店区清控创新基地D座17层', '1', '0351-7035620', '1509588162', '1509588162', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('3', '北京同仁堂合肥药店有限责任公司经营分公司', '山东省 安徽省 江苏省', '安徽省合肥市经济技术开发区医药健康产业园北京同仁堂合肥经营分公司', '1', '0551-65625452', '1509588186', '1509588186', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('4', '辽宁同仁药业有限公司', '黑龙江省 吉林省 辽宁省 内蒙古自治区东部', '沈阳市铁西区兴工北街106号', '1', '024-25841166', '1509588208', '1509588208', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('5', '北京同仁堂河南药业有限责任公司', '河南省', '河南省郑州市城东路兴亚商务506室', '1', '0371-63358739', '1509588236', '1509588236', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('6', '北京同仁堂广州药业连锁有限公司', '自有连锁药店 海南省', '广州市越秀区农林下路121号6楼', '1', '020-87762050', '1509588259', '1509588259', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('7', '江西康城药业有限公司', '江西省', '江西省樟树市仁和东路68号', '1', '0795-7841888', '1509588290', '1509588290', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('8', '昆明鸿成药业有限公司', '贵州省 云南省', '昆明市高新区昌源中路19号', '1', '0871-68189337', '1509588311', '1509588311', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('9', '北京同仁堂(成都）健康酒有限公司', '四川省', '成都市新都区工业东区同仁堂路一号', '1', '028-67322222', '1509588480', '1509588480', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('10', '甘肃同仁药业有限公司', '甘肃省 宁夏回族自治区 青海省', '兰州市安宁区众邦大道北端', '1', '0931-4286999', '1509588595', '1509588595', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('11', '天津旭日康华医药有限公司', '天津市', '天津市南开区黄河道17号方正中心大厦底商', '1', '022-87479789', '1509588616', '1509588616', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('12', '浙江众成医药有限公司', '浙江省', '浙江省杭州市西湖区三墩镇振华路210号主楼5楼', '1', '0571-88966670', '1509588644', '1509588644', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('13', '丰沃达医药物流(湖南)有限公司', '湖南省', '湖南省长沙经济技术开发区开元西路一号', '1', '0731-88757201', '1509588665', '1509588665', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('14', '上海蔡同德药业有限公司', '上海市', '上海市杨浦区许昌路485号408室', '1', '139-0166-3036', '1509588686', '1509588686', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('15', '重庆通海药业有限公司', '重庆市', '', '1', '', '1509588704', '1509588704', '2', '2');


-- ----------------------------
-- Table structure for tbl_peixiao_weixin_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_peixiao_weixin_user`;
CREATE TABLE `tbl_peixiao_weixin_user` (
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