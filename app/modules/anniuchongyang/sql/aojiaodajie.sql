/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : aojiaodajie

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-10-25 10:03:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_anniuchongyang_answer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuchongyang_answer`;
CREATE TABLE `tbl_anniuchongyang_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) NOT NULL DEFAULT '' COMMENT '答题用户',
  `question_id` int(11) NOT NULL DEFAULT '0' COMMENT '对应的题目id',
  `answer` varchar(10) NOT NULL DEFAULT '' COMMENT '用户答案',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '答题时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for tbl_anniuchongyang_config
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuchongyang_config`;
CREATE TABLE `tbl_anniuchongyang_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `praisefeild` varchar(10) NOT NULL COMMENT '奖项标识字段',
  `praisename` varchar(20) NOT NULL COMMENT '奖项名称',
  `min` varchar(100) NOT NULL COMMENT '最小角度',
  `max` varchar(100) NOT NULL COMMENT '最大角度',
  `praisecontent` text NOT NULL COMMENT '奖项内容',
  `praisenumber` int(5) NOT NULL COMMENT '奖项库存',
  `chance` int(10) NOT NULL COMMENT '获奖几率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_anniuchongyang_config
-- ----------------------------
INSERT INTO `tbl_anniuchongyang_config` VALUES ('1', '', '1元', '300', '359', '1元', '4', '2');
INSERT INTO `tbl_anniuchongyang_config` VALUES ('2', '', '2元', '60', '119', '2元', '5', '2');
INSERT INTO `tbl_anniuchongyang_config` VALUES ('3', '', '5元', '180', '239', '5元', '3', '20');
INSERT INTO `tbl_anniuchongyang_config` VALUES ('6', '', '谢谢参与', '0,120,240', '59,179,299', '谢谢参与', '-1', '76');

-- ----------------------------
-- Table structure for tbl_anniuchongyang_prize_pool
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuchongyang_prize_pool`;
CREATE TABLE `tbl_anniuchongyang_prize_pool` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for tbl_anniuchongyang_question
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuchongyang_question`;
CREATE TABLE `tbl_anniuchongyang_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_category` int(11) NOT NULL DEFAULT '0' COMMENT '问题分类；1-第一关2-第二关，3-第三关',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `author` varchar(100) NOT NULL DEFAULT '' COMMENT '作者',
  `question` text COMMENT '问题',
  `choiceA` varchar(255) NOT NULL DEFAULT '' COMMENT '选项A',
  `choiceB` varchar(255) NOT NULL DEFAULT '' COMMENT '选项B',
  `choiceC` varchar(255) NOT NULL DEFAULT '' COMMENT '选项C',
  `choiceD` varchar(255) NOT NULL DEFAULT '' COMMENT '选项D',
  `right_choice` varchar(255) NOT NULL DEFAULT '' COMMENT '正确答案',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COMMENT='问题记录表';

-- ----------------------------
-- Records of tbl_anniuchongyang_question
-- ----------------------------
INSERT INTO `tbl_anniuchongyang_question` VALUES ('1', '1', '感遇二首', '张九龄', '兰叶春葳蕤，桂华秋皎洁。\r\n欣欣此生意，__________。', '自尔为佳节', '何求美人折', '', '', 'A', '1508751604', '1508751604');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('2', '1', '下终南山过斛斯山人宿置酒', '李白', '暮从碧山下，__________。\r\n却顾所来径，苍苍横翠微。', '曲尽河星稀', '山月随人归', '', '', 'B', '1508751663', '1508752010');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('3', '1', '月下独酌', '李白', '花间一壶酒，独酌无相亲。\r\n举杯邀明月，__________。', '影徒随我身', '对影成三人', '', '', 'B', '1508751723', '1508751723');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('4', '1', '春思', '李白', '春风不相识，__________。', '秦桑低绿枝', '何事入罗帏', '', '', 'B', '1508751770', '1508751770');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('5', '1', '送杜少府之任蜀州', '王勃', '海内存知己，天涯若比邻。\r\n无为在歧路，__________。', '儿女共沾巾', '欢言得所憩', '', '', 'A', '1508751841', '1508751841');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('6', '1', '酬乐天扬州初逢席上见赠', '刘禹锡', '沉舟侧畔千帆过，病树前头万木春。\r\n今日听君歌一曲，______________。', '暂凭杯酒长精神', '我醉陶然共忘机', '', '', 'A', '1508751885', '1508751885');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('7', '1', '夜雨寄北', '李商隐', '君问归期未有期，______________。', '巴山夜雨涨秋池', '却话巴山夜雨时', '', '', 'A', '1508751924', '1508751924');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('8', '1', '回乡偶书', '贺知章', '少小离家老大回，乡音无改鬓毛衰。\r\n______________，笑问客从何处来。', '儿童相见不相识', '借问酒家何处有', '', '', 'A', '1508751960', '1508751960');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('9', '1', '望岳', '杜甫', '荡胸生层云，决眦入归鸟。\r\n__________，一览众山小。', '山上千寻塔', '会当凌绝顶', '', '', 'B', '1508752064', '1508752064');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('10', '1', '早春呈水部张十八员外', '韩愈', '天街小雨润如酥，______________。', '草色遥看近却无', '常记溪亭花深处', '', '', 'A', '1508752154', '1508752154');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('11', '1', '渡荆门送别', '李白', '渡远荆门外，来从楚国游。\r\n山随平野尽，__________。', '江入大荒流', '江河入海流', '', '', 'A', '1508752207', '1508752207');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('12', '1', '春望', '杜甫', '国破山河在，城春草木深。\r\n感时花溅泪，__________。', '恨别鸟惊心', '青天夜夜心', '', '', 'A', '1508752250', '1508752250');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('13', '1', '白雪歌送武判官归京', '岑参', '北风卷地白草折，胡天八月即飞雪。\r\n______________，千树万树梨花开。', '忽如一夜春风来', '去年天气旧亭台', '', '', 'A', '1508752322', '1508752322');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('14', '1', '登飞来峰', '王安石', '飞来山上千寻塔，闻说鸡鸣见日升。\r\n不畏浮云遮望眼，______________。', '只缘身在最高层', '只缘身在此山中', '', '', 'A', '1508752359', '1508752359');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('15', '1', '天净沙·秋思', '马致远', '枯藤老树昏鸦，_____________，古道西风瘦马。', '断肠人在天涯', '小桥流水人家', '', '', 'B', '1508752398', '1508752398');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('16', '1', '送别', '无名氏', '杨柳青青著地垂，扬花漫漫搅天飞。\r\n______________，借问行人归不归。', '杨柳折花花飞尽', '柳条折尽花飞尽', '', '', 'B', '1508752436', '1508752436');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('17', '1', '鹅', '骆宾王', '鹅　鹅　鹅　曲项向天歌。白毛浮绿水，__________。', '红掌拨清波', '红掌拔轻波', '', '', 'A', '1508752482', '1508752482');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('18', '1', '虞美人', '李煜', '雕栏玉砌应犹在，只是朱颜改。\r\n问君能有几多愁？______________。', '恰似一江春水向东流', '奈何明月照沟渠', '', '', 'A', '1508752518', '1508752525');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('19', '1', '相见欢', '李煜', '剪不断，理还乱，是离愁。\r\n______________。', '别是一番滋味在心头', '寂寞梧桐深院锁清秋', '', '', 'A', '1508752672', '1508752672');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('20', '1', '如梦令', '李清照', '试问卷帘人，却道“海棠依旧”。\r\n“知否？知否？___________”。', '应是绿肥红瘦', '应是红肥绿瘦', '', '', 'A', '1508752733', '1508752733');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('21', '1', '小池', '杨万里', '小荷才露尖尖角，\r\n______________。', '早有蜻蜓立上头', '树阴照水爱晴柔', '', '', 'A', '1508752767', '1508752767');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('22', '1', '山行', '杜牧', '______________，白云生处有人家。', '霜叶红于二月花', '远上寒山石径斜', '', '', 'B', '1508752804', '1508752804');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('23', '1', '饮湖上初晴后雨', '苏轼', '欲把西湖比西子，______________。', '一曲新词酒一杯', '淡妆浓抹总相宜', '', '', 'B', '1508752842', '1508752842');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('24', '1', '咏柳', '贺知章', '______________，二月春风似剪刀。', '碧玉妆成一树高', '不知细叶谁裁出', '', '', 'B', '1508752877', '1508752877');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('25', '1', '望天门山', '李白', '______________，孤帆一片日边来。', '两岸青山相对出', '两岸猿声啼不住', '', '', 'A', '1508752917', '1508752917');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('26', '1', '望庐山瀑布', '李白', '日照香炉生紫烟，______________。', '春来江水绿如蓝', '遥看瀑布挂前川', '', '', 'B', '1508752960', '1508752960');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('27', '1', '春日', '朱熹', '等闲识得东风面，______________。', '拂堤扬柳醉春烟', '万紫千红总是春', '', '', 'B', '1508753409', '1508753409');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('28', '1', '题西林壁', '苏轼', '不识庐山真面目，______________。', '只缘身在此山中', '只缘身在最高层', '', '', 'A', '1508753471', '1508753471');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('29', '1', '黄鹤楼送孟浩然之广陵', '李白', '孤帆远影碧空尽，______________。', '唯见长江天际流', '碧水东流至此回', '', '', 'A', '1508753507', '1508753507');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('30', '1', '送元二使安西', '王维', '劝君更尽一杯酒，______________。', '西出阳关无故人', '烟花三月下扬州', '', '', 'A', '1508753544', '1508753544');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('31', '1', '登幽州台歌', '陈子昂', '念天地之悠悠，____________。', '独怆然而涕下', '独怅然而泪下', '', '', 'A', '1508753587', '1508753587');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('32', '1', '钱塘湖春行', '白居易', '几处早莺争暖树，______________。', '谁家新燕啄春泥', '湖光秋月两相和', '', '', 'A', '1508753624', '1508753624');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('33', '1', '泊船瓜洲', '王安石', '春风又绿江南岸，______________。', '水光潋滟晴方好', '明月何时照我还', '', '', 'B', '1508753665', '1508753665');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('34', '1', '约客', '赵师秀', '______________，青草池塘处处蛙。', '客舍青青柳色新', '黄梅时节家家雨', '', '', 'B', '1508753701', '1508753701');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('35', '1', '卜算子-咏梅', '毛泽东', '待到山花烂漫时，____________。', '她在丛中笑', '只把春来报', '', '', 'A', '1508753737', '1508753737');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('36', '1', '登高', '杜甫', '无边落木萧萧下，_____________。', '不尽长江滚滚来', '唯见长江天际流', '', '', 'A', '1508753779', '1508753779');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('37', '1', '蜀相', '杜甫', '出师未捷身先死，_____________。', '不教胡马度阴山', '长使英雄泪满襟', '', '', 'B', '1508753814', '1508753814');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('38', '1', '兵车行', '杜甫', '信知生男恶，反是生女好。\r\n生女犹得嫁比邻，_____________。', '生男白骨无人收', '生男埋没随百草', '', '', 'B', '1508753871', '1508753871');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('39', '1', '客至', '杜甫', '花径不曾缘客扫，_____________。', '水面初平云脚低', '蓬门今始为君开', '', '', 'B', '1508753907', '1508753907');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('40', '1', '旅夜书怀', '杜甫', '星垂平野阔，___________。', '黄河入海流', '月涌大江流', '', '', 'B', '1508753940', '1508753940');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('41', '1', '阁夜', '杜甫', '五更鼓角声悲壮，___________。', '三峡星河影动摇', '云雨荒台岂梦思', '', '', 'A', '1508753973', '1508753973');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('42', '1', '石头城', '刘禹锡', '淮水东边旧时月，___________。', '潮打空城寂寞回', '夜深还过女墙来', '', '', 'B', '1508754010', '1508754010');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('43', '1', '闻乐天左降江州司马', '元稹', '垂死病中惊坐起，___________。', '家祭无忘告乃翁', '暗风吹雨入寒窗', '', '', 'B', '1508754052', '1508754052');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('44', '1', '琵琶行', '白居易', '___________，犹抱琵琶半遮面。', '移船相近邀相见', '千呼万唤始出来', '', '', 'B', '1508754086', '1508754086');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('45', '1', '琵琶行', '白居易', '银瓶乍破水浆迸，___________。', '大珠小珠落玉盘', '铁骑突出刀枪鸣', '', '', 'B', '1508754143', '1508754143');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('46', '1', '锦瑟', '李商隐', '庄生晓梦迷蝴蝶，___________。', '望帝春心托杜鹃', '潦倒新停浊酒杯', '', '', 'A', '1508754184', '1508754184');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('47', '1', '锦瑟', '李商隐', '___________，只是当时已惘然。', '此情可待成追忆', '无边落木萧萧下', '', '', 'A', '1508754249', '1508754249');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('48', '1', '临安春雨初霁', '陆游', '小楼一夜听春雨，___________。', '深巷明朝卖杏花', '犹及清明可到家', '', '', 'A', '1508754284', '1508754284');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('49', '2', '观沧海', '曹操', '东临碣石，以观沧海。\r\n水何____，山岛竦峙。', '澹澹', '潺潺', '', '', 'A', '1508754424', '1508754424');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('50', '2', '闻王昌龄左迁龙标遥有此寄', '李白', '杨花落尽子规啼，闻道龙标过五溪。\r\n我寄____与明月，随君直到夜郎西。', '惆怅', '愁心', '', '', 'B', '1508754459', '1508754459');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('51', '2', '观沧海', '曹操', '日月之行，若出其中；\r\n星汉____，若出其里。', '涌起', '灿烂', '', '', 'B', '1508754498', '1508754505');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('52', '2', '早春呈水部张十八员外', '韩愈', '天街小雨润如酥，草色遥看近却无。\r\n最是一年_____，绝胜烟柳满皇都。', '春好处', '好春处', '', '', 'A', '1508754550', '1508754557');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('53', '2', '迢迢牵牛星', '《古诗十九首》', '迢迢牵牛星，_____河汉女。', '晈晈', '皎皎', '', '', 'B', '1508754627', '1508754633');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('54', '2', '西江月', '辛弃疾', '七八个星天外，________雨山前。\r\n旧时茅店社林边，路转溪头忽见。', '两三点', '三两点', '', '', 'A', '1508754675', '1508754675');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('55', '2', '过故人庄', '孟浩然', '故人具鸡黍，邀我至____。\r\n绿树村边合，青山郭外斜。', '田家', '农家', '', '', 'A', '1508754738', '1508754738');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('56', '2', '游山西村', '陆游', '莫笑农家腊酒浑，丰年留客足鸡豚。\r\n________疑无路，柳暗花明又一村。', '山重水复', '山穷水尽', '', '', 'A', '1508754776', '1508754776');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('57', '2', '己亥杂诗', '龚自珍', '落红不是无情物，化作____更护花。', '春泥', '肥泥', '', '', 'A', '1508754849', '1508754849');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('58', '2', '山坡羊·潼关怀古', '张养浩', '伤心秦汉经行处，宫阙万间都做了土。\r\n兴，_____； 亡，百姓苦!', '百姓乐', '百姓苦', '', '', 'B', '1508754893', '1508754893');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('59', '2', '虞美人', '李煜', '春花秋月何时了？往事知多少！\r\n小楼____又东风，故国不堪回首月明中。', '昨夜', '昨日', '', '', 'A', '1508754932', '1508754932');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('60', '2', '破阵子·为陈同甫赋壮词以寄之', '辛弃疾', '醉里挑灯看剑，____吹角连营。\r\n八百里分麾下炙，五十弦翻塞外声，沙场秋点兵。', '梦中', '梦回', '', '', 'B', '1508754978', '1508754978');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('61', '2', '凉州词', '王翰', '____美酒夜光杯，欲饮琵琶马上催。\r\n醉卧沙场君莫笑，古来征战几人回？', '兰陵', '葡萄', '', '', 'B', '1508755022', '1508755022');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('62', '2', '闻官军收河南河北', '杜甫', '却看妻子愁何在，_______喜欲狂。', '万卷诗书', '漫卷诗书', '', '', 'B', '1508755061', '1508755061');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('63', '2', '赠汪伦', '李白', '____乘舟将欲行，忽闻岸上踏歌声。', '杜甫', '李白', '', '', 'B', '1508755105', '1508755105');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('64', '2', '登高', '杜甫', '万里悲秋常作客，百年___独登台。', '孤独', '多病', '', '', 'B', '1508755147', '1508755147');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('65', '2', '咏怀古迹五首', '杜甫', '三分割据纡筹策，万古云霄____。', '一羽毛', '万丈霞', '', '', 'A', '1508755243', '1508755243');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('66', '2', '琵琶行', '白居易', '同是天涯沦落人，____何必曾相识！', '相逢', '相见', '', '', 'A', '1508755285', '1508755285');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('67', '2', '锦瑟', '李商隐', '沧海___珠有泪，蓝田日暖玉生烟。', '月明', '月圆', '', '', 'A', '1508755322', '1508755322');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('68', '2', '长恨歌', '白居易', '________难自弃，一朝选在君王侧。', '天生丽质', '貌若天仙', '', '', 'A', '1508755370', '1508755370');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('69', '2', '相见欢', '李煜', '剪不断，______，是离愁。', '理还乱', '相见欢', '', '', 'A', '1508755433', '1508755433');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('70', '2', '醉花阴', '李清照', '莫道不消魂，_______，人比黄花瘦。', '帘卷西风', '梧桐更兼细雨', '', '', 'A', '1508755473', '1508755473');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('71', '2', '声声慢·寻寻觅觅', '李清照', '寻寻觅觅，冷冷清清，____惨惨戚戚。', '凄凄', '戚戚', '', '', 'A', '1508755509', '1508755509');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('72', '2', '鹊桥仙·纤云弄巧', '秦观', '___玉露一相逢，便胜却人间无数。', '金风', '金枝', '', '', 'A', '1508755545', '1508755545');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('86', '2', '鹊桥仙·纤云弄巧', '秦观', '纤云弄巧，飞星____，银汉迢迢暗度。', '传恨', '传情', '', '', 'A', '1508827573', '1508827573');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('87', '2', '鹊桥仙·纤云弄巧', '秦观', '两情若是____时，又岂在朝朝暮暮！', '久长', '长久', '', '', 'A', '1508827611', '1508827611');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('88', '2', '浪淘沙', '李煜', '流水落花春去也，________。', '天上人间', '素年锦时', '', '', 'A', '1508827678', '1508827678');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('89', '2', '浪淘沙', '李煜', '帘外雨潺潺，春意___。', '阑干', '阑珊', '', '', 'B', '1508827714', '1508827714');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('90', '2', '满江红·怒发冲冠', '岳飞', '三十功名尘与土，八千里路_____。', '云和月', '艰与阻', '', '', 'A', '1508827761', '1508827761');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('91', '2', '满江红·怒发冲冠', '岳飞', '莫等闲、白了____头，空悲切！', '少年', '壮士', '', '', 'A', '1508827812', '1508827812');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('92', '2', '念奴娇·赤壁怀古', '苏轼', '大江东去，浪淘尽，____风流人物。', '历史', '千古', '', '', 'B', '1508827845', '1508827845');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('93', '2', '一剪梅', '李清照', '此情无计可消除，\r\n____眉头，却上心头。', '才下', '方下', '', '', 'A', '1508827916', '1508827916');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('94', '2', '念奴娇·赤壁怀古', '苏轼', '乱石穿空，惊涛拍岸，\r\n卷起______。', '千堆雪', '千层浪', '', '', 'A', '1508827963', '1508827963');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('95', '2', '念奴娇·赤壁怀古', '苏轼', '羽扇纶巾，_____樯橹灰飞烟灭。', '谈笑间', '一时间', '', '', 'A', '1508828005', '1508828005');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('96', '2', '念奴娇·赤壁怀古', '苏轼', '遥想公瑾当年，小乔初嫁了，________。', '雄姿英发', '英姿勃发', '', '', 'A', '1508828052', '1508828052');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('97', '2', '阁夜', '杜甫', '岁暮阴阳催短景，天涯____寒宵。', '霜雪霁', '霁雪霜', '', '', 'A', '1508828338', '1508828338');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('98', '2', '蜀相', '杜甫', '三顾____天下计，两朝开济老臣心。', '茅庐', '频烦', '', '', 'B', '1508828377', '1508828377');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('99', '2', '木兰辞', '佚名', '将军百战死，____十年归。', '兵士', '壮士', '', '', 'B', '1508828409', '1508828409');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('100', '2', '春晓', '孟浩然', '夜来风雨声，__知多少。', '花落', '落花', '', '', 'A', '1508828444', '1508828444');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('101', '2', '卖炭翁', '白居易', '满面尘灰____色，两鬓苍苍十指黑。', '烟火', '黄褐', '', '', 'A', '1508828486', '1508828486');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('102', '2', '池上', '白居易', '不解藏踪迹，浮萍____开。', '一道', '自然', '', '', 'A', '1508828520', '1508828520');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('103', '2', '花非花', '白居易', '花非花，______。\r\n夜半来，天明去。', '水中月', '雾非雾', '', '', 'B', '1508828704', '1508828704');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('104', '2', '画', '王维', '春去花还在，人来______。', '捉蜻蜓', '鸟不惊', '', '', 'B', '1508828779', '1508828779');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('105', '2', '芙蓉楼送辛渐', '王昌龄', '洛阳亲友如相问，一片____在玉壶。', '冰心', '丹心', '', '', 'A', '1508828820', '1508828820');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('106', '2', '江雪', '柳宗元', '千山鸟飞绝，___人踪灭。', '山间', '万径', '', '', 'B', '1508828884', '1508828884');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('107', '2', '梅', '王安', '遥知不是雪，为有____来。', '暗香', '幽香', '', '', 'A', '1508828915', '1508828915');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('108', '2', '竹枝词二首·其一', '刘禹锡', '东边日出西边雨，道是无__却有__。', '情，晴', '晴，晴', '', '', 'B', '1508828948', '1508828948');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('109', '2', '赏牡丹', '刘禹锡', '唯有牡丹真国色，花开____动京城。', '时节', '雍容', '', '', 'A', '1508828986', '1508828986');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('110', '2', '江南春', '杜牧', '南朝四百八十寺，多少____烟雨中。', '楼台', '亭台', '', '', 'A', '1508829017', '1508829017');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('111', '3', '饮酒', '陶渊明', '采__东篱下，悠然见南山。', '菊', '桑', '', '', 'A', '1508829365', '1508829365');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('112', '3', '过故人庄', '孟浩然', '开轩面场圃，把酒话桑麻。\r\n待到重阳日，还来__菊花。', '观', '就', '', '', 'B', '1508829400', '1508829400');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('113', '3', '浣溪沙', '晏殊', '无可奈何花落去，似曾相识__归来。', '燕', '雁', '', '', 'A', '1508829438', '1508829438');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('114', '3', '水调歌头', '苏轼', '明月几时有?把酒问青天。不知天上宫阙，今__是何年。', '昔', '夕', '', '', 'B', '1508829501', '1508829501');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('115', '3', '闻官军收河南河北', '杜甫', '剑外忽传收__北，初闻涕泪满衣裳。', '骥', '蓟', '', '', 'B', '1508829536', '1508829536');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('116', '3', '水调歌头', '苏轼', '起舞弄__影，何似在人间。', '清', '轻', '', '', 'A', '1508829573', '1508829573');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('117', '3', '水调歌头', '苏轼', '不应有恨，何事长__别时圆?', '向', '相', '', '', 'A', '1508829645', '1508829645');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('118', '3', '水调歌头', '苏轼', '但愿人长久，千里共婵__。', '娟', '绢', '', '', 'A', '1508829687', '1508829687');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('119', '3', '关雎', '诗经', '关关雎鸠，在河之洲。\r\n窈窕淑女，君子好__。', '求', '逑', '', '', 'B', '1508829720', '1508829720');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('120', '3', '声声慢·寻寻觅觅', '李清照', '___过也，正伤心，却是旧时相识。', '雁', '燕', '', '', 'A', '1508829751', '1508829751');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('121', '3', '如梦令·常记溪亭日暮', '李清照', '兴尽晚回舟，误入___花深处。', '荷', '藕', '', '', 'B', '1508829899', '1508829899');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('122', '3', '浪淘沙', '李煜', '梦里不___身是客，一晌贪欢。', '知', '识', '', '', 'A', '1508832217', '1508832217');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('123', '3', '雨霖铃', '柳永', '今宵酒醒何处？杨柳岸、__风残月。', '拂', '晓', '', '', 'B', '1508832251', '1508832251');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('124', '3', '清平调', '李白', '一枝红艳露凝香，云雨巫山__断肠。', '枉', '望', '', '', 'A', '1508832300', '1508832300');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('125', '3', '一剪梅·红藕香残玉簟秋', '李清照', '云中谁寄___书来，雁字回时，\r\n月满西楼。', '锦', '帛', '', '', 'A', '1508832367', '1508832367');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('126', '3', '木兰辞', '佚名', '__气传金柝，寒光照铁衣。', '霸', '朔', '', '', 'B', '1508832401', '1508832401');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('127', '3', '木兰辞', '佚名', '万里赴戎机，关山__若飞。', '渡', '度', '', '', 'B', '1508832469', '1508832469');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('128', '3', '木兰辞', '佚名', '当窗理云鬓，对镜__花黄。', '贴', '帖', '', '', 'A', '1508832573', '1508832573');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('129', '3', '陋室铭', '刘禹锡', '斯是陋室，惟吾德__。', '馨', '新', '', '', 'A', '1508832617', '1508832617');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('130', '3', '九月九日忆山东兄弟', '王维', '独在异乡为__客，每逢佳节倍思亲。', '异', '一', '', '', 'A', '1508832669', '1508832669');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('131', '3', '鹿柴', '王维', '空山不见人，但___人语响。', '觉', '闻', '', '', 'B', '1508832706', '1508832706');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('132', '3', '相思', '王维', '红豆生南国，春来__几枝。', '发', '花', '', '', 'A', '1508832743', '1508832743');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('133', '3', '明月几时有', '苏轼', '转朱阁，低__户，照无眠。', '倚', '绮', '', '', 'B', '1508832773', '1508832773');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('134', '3', '过华清宫绝句三首', '杜牧', '一___红尘妃子笑，无人知是荔枝来。', '骑', '计', '', '', 'A', '1508832857', '1508832857');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('135', '3', '蜀相', '杜甫', '映阶碧草自春色，隔叶黄__空好音。', '鹂', '莺', '', '', 'A', '1508832898', '1508832898');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('136', '3', '蜀道难', '李白', '剑阁峥嵘而崔嵬，一夫当关，万__莫开。', '夫', '人', '', '', 'A', '1508832937', '1508832937');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('137', '3', '古朗月行', '李白', '小时不__月，呼作白玉盘。', '知', '识', '', '', 'B', '1508833065', '1508833065');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('138', '3', '九月十日即事', '李白', '菊花何太___，遭此两重阳？', '苦', '哀', '', '', 'A', '1508833096', '1508833096');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('139', '3', '钱塘湖春行', '白居易', '乱花渐欲迷人眼，___草才能没马蹄。', '绿', '浅', '', '', 'B', '1508833126', '1508833126');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('140', '3', '孔雀东南飞', '焦仲卿', '孔雀东南飞，__里一徘徊。', '五', '十', '', '', 'A', '1508833156', '1508833156');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('141', '3', '秋浦歌', '李白', '白发三千__，缘愁似个长。', '丈', '尺', '', '', 'A', '1508833203', '1508833203');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('142', '3', '宣州谢脁楼饯别校书叔云', '李白', '抽刀断水水更流，举杯__愁愁更愁。', '浇', '销', '', '', 'B', '1508833304', '1508833304');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('143', '3', '朝天子·咏喇叭', '王磐', '喇叭，唢呐，曲儿小__儿大。', '腔', '响', '', '', 'A', '1508833328', '1508833328');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('144', '3', '国风·周南·桃夭', '佚名', '桃之____，灼灼其华。', '夭夭', '幺幺', '', '', 'A', '1508833354', '1508833354');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('145', '3', '国风·王风·黍离', '佚名', '知我者，谓我心忧，不知我者，谓我何__。', '求', '逑', '', '', 'A', '1508833388', '1508833388');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('146', '3', '关雎', '佚名', '关关雎鸠，在__之洲。', '野', '河', '', '', 'B', '1508833411', '1508833411');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('147', '3', '青玉案·元夕', '辛弃疾', '__然回首， 那人却在，火阑珊处。', '蓦', '暮', '', '', 'A', '1508833436', '1508833436');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('148', '3', '蝶恋花·伫倚危楼风细细', '柳永', '衣带渐宽终不悔，为伊__得人憔悴。', '消', '销', '', '', 'A', '1508833497', '1508833497');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('149', '3', '江城子', '苏轼', '十年生死两茫茫，不思量， 自难忘。\r\n千里孤__，无处话凄凉。', '烟', '坟', '', '', 'B', '1508833538', '1508833538');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('150', '3', '摸鱼儿', '元好问', '问世间情是何物，直__生死相许？', '教', '叫', '', '', 'A', '1508833568', '1508833568');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('151', '3', '诗经·王风·采葛', '佚名', '一日不见，如三__兮。', '秋', '冬', '', '', 'A', '1508833594', '1508833594');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('152', '3', '诗经·小雅·鹤鸣', '佚名', '他__之石，可以攻玉。', '山', '川', '', '', 'A', '1508833621', '1508833621');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('153', '3', '沁园春· 长沙', '毛泽东', '恰同学少年， \r\n风华正__；', '茂', '貌', '', '', 'A', '1508833704', '1508833704');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('154', '3', '采桑子·重阳', '毛泽东', '不似春光， \r\n胜似春光， \r\n寥廓江天万里__。', '霜', '光', '', '', 'A', '1508833743', '1508833743');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('155', '3', '沁园春·雪', '毛泽东', '山舞银蛇， \r\n原驰蜡象， \r\n欲与天公__比高。', '势', '试', '', '', 'B', '1508833784', '1508833784');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('156', '3', '沁园春·雪', '毛泽东', '江山如此多娇， \r\n引无数英雄__折腰。', '竟', '竞', '', '', 'A', '1508833828', '1508833828');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('157', '3', '人民解放军占领南京', '毛泽东', '钟山风雨起苍黄， \r\n百万雄__过大江。', '师', '狮', '', '', 'A', '1508833864', '1508833864');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('158', '3', '人民解放军占领南京', '毛泽东', '天若有情天亦老， \r\n人间正道是__桑。', '沧', '苍', '', '', 'A', '1508833905', '1508833905');
INSERT INTO `tbl_anniuchongyang_question` VALUES ('159', '3', '卜算子·咏梅', '毛泽东', '待到山花__漫时， \r\n她在丛中笑。', '浪', '烂', '', '', 'B', '1508833976', '1508833976');

-- ----------------------------
-- Table structure for tbl_anniuchongyang_weixin_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_anniuchongyang_weixin_user`;
CREATE TABLE `tbl_anniuchongyang_weixin_user` (
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

