/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : tongrentang

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-03-23 18:30:59
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='配销网络店铺管理';

-- ----------------------------
-- Records of tbl_peixiao_company
-- ----------------------------
INSERT INTO `tbl_peixiao_company` VALUES ('1', '北京同仁堂粤东有限公司', '广东省、福建省、广西壮族自治区', '广东省潮州市饶平县黄冈镇6号路同仁堂仓库', '1', '13513603710', '1511510635', '1521783619', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('2', '北京同仁堂合肥药店有限责任公司经营分公司', '安徽省、山东省、江苏省', '安徽省合肥市经济技术开发区医药健康产业园北京同仁堂合肥经营分公司', '1', '13866688893', '1511510665', '1521785014', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('3', '昆明鸿成药业有限公司', '云南省、贵州省', '云南省昆明市呈贡新区中豪新册产业园小商品加工基地D区12栋3楼301', '1', '13577186192', '1511510700', '1521784150', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('4', '江西康成药业有限公司', '江西省', '江西省樟树市仁和东路68号', '1', '15279573456', '1511510743', '1521784869', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('5', '北京同仁堂广州药业连锁有限公司', '海南省、广州同仁堂自有连锁', '广州市荔湾区塞坝路27号三甲仓B幢二楼2号仓', '1', '020-81564316', '1511510827', '1521784549', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('6', '北京同仁堂山西药业有限责任公司', '山西省、河北省、陕西省、内蒙古自治区西部', '山西省太原市高新技术开发区中心北街11号1幢1-2号', '1', '13513603710', '1511510864', '1521784626', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('7', '北京同仁堂河南药业有限责任公司', '河南省', '河南省郑州市城东路兴亚商务506室', '1', '18210256916', '1511510893', '1521784986', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('8', '辽宁同仁药业有限公司', '辽宁省、吉林省、黑龙江省、内蒙古自治区东部', '沈阳市东陵路区下河湾303-7号（一层部分 二层）', '1', '024-23711426', '1511510924', '1521785069', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('9', '甘肃同仁药业有限公司', '甘肃省、宁夏回族自治区、青海省', '甘肃省兰州市安宁区城临路21号甘肃同仁药业', '1', '0931-4286985', '1511510954', '1521785144', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('10', '浙江众成药业有限公司', '浙江省', '浙江省杭州市西湖区振华路210号5楼', '1', '13165999699', '1511510983', '1521785242', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('11', '上海虹桥药业有限公司', '上海市', '上海徐汇区复兴西路37弄2号', '1', '021-55217323', '1511511013', '1521784001', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('12', '天津医药集团太平医药有限公司第二药品分公司', '天津市', '天津市河北区南口路，荣泽大厦，2号楼，1908室', '1', '15502269489', '1511511041', '1521785407', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('13', '湖南名裕龙行医药销售有限公司', '湖南省、湖北省', '湖南长沙经济开发区（星沙）开元西路1号', '1', '13207494790', '1511511069', '1521785466', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('14', '华润重庆医药有限公司', '重庆市', '重庆市南岸区茶园牡丹路14号', '1', '023-86355873', '1511511103', '1511511103', '2', '2');
INSERT INTO `tbl_peixiao_company` VALUES ('15', '新疆昌吉神瑞药业有限公司', '新疆自治区', '新疆昌吉北京南路80号', '1', '0994-2713967', '1511511133', '1511511133', '2', '2');
