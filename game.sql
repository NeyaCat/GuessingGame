/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : game

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-11-04 18:27:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) DEFAULT NULL COMMENT '后台用户用',
  `admin_password` varchar(60) DEFAULT NULL COMMENT '密码',
  `admin_status` int(1) DEFAULT '1' COMMENT '状态，1位正常，0为冻结',
  `create_time` varchar(50) DEFAULT NULL,
  `update_time` varchar(50) DEFAULT NULL,
  `last_login_time` varchar(50) DEFAULT NULL,
  `admin_tel` varchar(20) DEFAULT NULL COMMENT '管理员电话',
  `email` varchar(255) DEFAULT NULL,
  `delete` int(11) DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, '1508849004', '18615797713', '1126266505@qq.com', '0');
INSERT INTO `admin_user` VALUES ('2', 'joker', 'e10adc3949ba59abbe56e057f20f883e', '1', null, null, '1508044161', '18628323551', '1126266505@qq.com', '0');
INSERT INTO `admin_user` VALUES ('3', 'php', 'e10adc3949ba59abbe56e057f20f883e', '1', '1507053115', null, '1507109193', null, 'php@qq.com', '1');
INSERT INTO `admin_user` VALUES ('4', 'html1', 'e10adc3949ba59abbe56e057f20f883e', '1', '1507053269', null, '1507111332', null, 'html@qq.com', '1');

-- ----------------------------
-- Table structure for `analyst`
-- ----------------------------
DROP TABLE IF EXISTS `analyst`;
CREATE TABLE `analyst` (
  `analyst_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分析师表ID',
  `analyst_title` varchar(255) NOT NULL COMMENT '分析标题',
  `analyst_content` text NOT NULL COMMENT ' 分析内容',
  `analyst` varchar(255) NOT NULL COMMENT '分析师',
  `status` int(11) NOT NULL COMMENT ' 分析师表发布状态',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`analyst_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of analyst
-- ----------------------------
INSERT INTO `analyst` VALUES ('1', 'gjhdfkhgsdlh', '<p>hdjdkjhgjgk</p>', 'user', '1', '1507811048', '1507812107');

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '轮播id',
  `banner_image` varchar(255) NOT NULL COMMENT '轮播图片链接',
  `banner_url` varchar(255) NOT NULL COMMENT '跳转链接',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `banner_delete` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除',
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('1', '/game/public/upload\\20171015\\83399f8a12f55bbd664af2bde5374821.png', 'index/index', '0', '1508045104', '1');
INSERT INTO `banner` VALUES ('2', '/game/public/upload\\20171015\\83399f8a12f55bbd664af2bde5374821.png', 'index/index', '0', '1508045169', '1');
INSERT INTO `banner` VALUES ('3', '/game/public/upload\\20171015\\83399f8a12f55bbd664af2bde5374821.png', 'index/index', '1507214998', '1508045184', '1');
INSERT INTO `banner` VALUES ('4', '', 'index/index', '1507215009', '1507216440', '0');

-- ----------------------------
-- Table structure for `bets`
-- ----------------------------
DROP TABLE IF EXISTS `bets`;
CREATE TABLE `bets` (
  `bets_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '投注表ID',
  `gues_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '关联用户表',
  `team_id` int(11) NOT NULL,
  `matchs_id` int(11) NOT NULL,
  `bmoney` int(11) NOT NULL COMMENT '下注金币',
  `get_money` decimal(11,0) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '投注状态',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`bets_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bets
-- ----------------------------
INSERT INTO `bets` VALUES ('35', '8', '1', '13', '34', '1', '0', '1', '1508351511', '1508351511');
INSERT INTO `bets` VALUES ('36', '6', '1', '12', '34', '10', '0', '2', '1508351830', '1508351830');

-- ----------------------------
-- Table structure for `games`
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `game_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '游戏表ID',
  `gname` varchar(255) NOT NULL COMMENT '游戏标题',
  `gcontent` varchar(255) NOT NULL COMMENT '游戏简介',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of games
-- ----------------------------
INSERT INTO `games` VALUES ('3', '波动少女', '', '0', '0');
INSERT INTO `games` VALUES ('4', '饥荒', '<p>这就是饥荒咯</p>', '0', '1508319782');
INSERT INTO `games` VALUES ('7', '瘟疫公司', '<p>好的话</p>', '1507987624', '0');
INSERT INTO `games` VALUES ('8', '君彼', '<p>苟利国家生死以</p>', '1508318394', '1508318394');
INSERT INTO `games` VALUES ('9', 'LOL', '', '1508340578', '1508340578');
INSERT INTO `games` VALUES ('10', '300Hero', '<p>这是个辣鸡游戏</p>', '1508340601', '1508340601');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_count` int(11) NOT NULL COMMENT '商品数量',
  `goods_gold` int(11) NOT NULL COMMENT '兑换积分',
  `goods_create_time` int(11) NOT NULL COMMENT '商品上传时间',
  `goods_image` varchar(255) NOT NULL COMMENT '商品图片',
  `goods_status` int(11) NOT NULL COMMENT '商品状态，0上架，1下架',
  `goods_delete` int(11) unsigned NOT NULL COMMENT '0代表正常，1代表删除',
  `goods_cid` int(11) NOT NULL COMMENT '关联分类表',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('5', '100', '300', '1507297457', '/game/public/upload\\20171006\\bf35cb6070e111ebc0dc3580524f2692.jpg', '0', '0', '10');
INSERT INTO `goods` VALUES ('7', '2000', '1000', '1507298467', '/game/public/upload\\20171007\\1d50f9860ee33b03968f9a50dc823d22.jpg', '0', '0', '15');
INSERT INTO `goods` VALUES ('4', '120', '300', '1507296589', '/game/public/upload\\20171006\\134709029babc5f611bd0bf9a1cc5dff.jpg', '0', '0', '9');
INSERT INTO `goods` VALUES ('8', '20', '8888', '1507298590', '/game/public/upload\\20171006\\a8fd3b885ef66e6a863aa50903d9f66a.jpg', '0', '0', '16');
INSERT INTO `goods` VALUES ('9', '1000', '60', '1507298896', '/game/public/upload\\20171006\\6a050cf1cf3750401332a84f730f6aa6.jpg', '0', '0', '11');
INSERT INTO `goods` VALUES ('10', '100', '500', '1507298955', '/game/public/upload\\20171006\\f5aaae2f2673ad20c149021cb5604255.jpg', '0', '0', '17');
INSERT INTO `goods` VALUES ('11', '100', '3000', '1507299030', '/game/public/upload\\20171007\\0c897cd8379b3fa4053a5d6df30eda3c.jpg', '0', '0', '14');

-- ----------------------------
-- Table structure for `goods_category`
-- ----------------------------
DROP TABLE IF EXISTS `goods_category`;
CREATE TABLE `goods_category` (
  `goods_cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_title` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_pid` int(11) NOT NULL DEFAULT '0' COMMENT '商品父ID',
  PRIMARY KEY (`goods_cid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_category
-- ----------------------------
INSERT INTO `goods_category` VALUES ('1', '硬件外设', '0');
INSERT INTO `goods_category` VALUES ('2', '游戏周边', '0');
INSERT INTO `goods_category` VALUES ('3', '游戏道具', '0');
INSERT INTO `goods_category` VALUES ('4', '虚拟充值', '0');
INSERT INTO `goods_category` VALUES ('9', '键盘', '1');
INSERT INTO `goods_category` VALUES ('10', '鼠标', '1');
INSERT INTO `goods_category` VALUES ('11', '耳机', '1');
INSERT INTO `goods_category` VALUES ('12', '英雄联盟', '2');
INSERT INTO `goods_category` VALUES ('13', 'Dota2', '2');
INSERT INTO `goods_category` VALUES ('14', 'DNF', '2');
INSERT INTO `goods_category` VALUES ('15', '充值卡', '4');
INSERT INTO `goods_category` VALUES ('16', '购物卡', '4');
INSERT INTO `goods_category` VALUES ('17', 'Q币', '4');
INSERT INTO `goods_category` VALUES ('18', '手办', '3');

-- ----------------------------
-- Table structure for `goods_exchange_copy`
-- ----------------------------
DROP TABLE IF EXISTS `goods_exchange_copy`;
CREATE TABLE `goods_exchange_copy` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `user_id` int(11) NOT NULL COMMENT '关联用户表',
  `goods_title` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_count` int(11) NOT NULL COMMENT '商品数量',
  `goods_intgral` int(11) NOT NULL COMMENT '兑换积分',
  `goods_time` int(11) NOT NULL COMMENT '商品兑换时间',
  `user_address` varchar(255) NOT NULL COMMENT '收获地址',
  `goods_tel` int(11) NOT NULL COMMENT '收获人手机号',
  `goods_person` varchar(255) NOT NULL COMMENT '收货人姓名',
  `shouhuo_status` int(11) NOT NULL COMMENT '收货状态，0为收货，1为未收货',
  `guess_over_time` int(11) NOT NULL COMMENT '竞猜结束时间',
  `guess_status` int(11) NOT NULL COMMENT '胜负状态，0A方胜，1B方胜',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_exchange_copy
-- ----------------------------

-- ----------------------------
-- Table structure for `gues`
-- ----------------------------
DROP TABLE IF EXISTS `gues`;
CREATE TABLE `gues` (
  `gues_id` int(11) NOT NULL AUTO_INCREMENT,
  `gues_name` varchar(120) NOT NULL,
  `guess_type` tinyint(2) NOT NULL,
  `match_id` int(11) NOT NULL,
  `match_name` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(120) NOT NULL,
  `peilv` tinyint(4) NOT NULL,
  `point` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`gues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gues
-- ----------------------------
INSERT INTO `gues` VALUES ('6', '谁牛逼6', '1', '34', '异形大战铁血战士', '0', '平台', '16', '0', '4', '3', '1508344514');
INSERT INTO `gues` VALUES ('8', '哪个最先获得胜利', '1', '34', '异形大战铁血战士', '0', '平台', '18', '0', '1', '1', '1508348537');
INSERT INTO `gues` VALUES ('9', '谁先拿一血', '1', '34', '异形大战铁血战士', '1', 'joker', '115', '0', '0', '1', '1508354375');
INSERT INTO `gues` VALUES ('10', '谁会先死', '1', '34', '异形大战铁血战士', '1', 'joker', '11', '0', '0', '0', '1508355339');
INSERT INTO `gues` VALUES ('11', '谁会先摧毁停车场', '1', '34', '异形大战铁血战士', '1', 'joker', '11', '0', '0', '0', '1508355360');

-- ----------------------------
-- Table structure for `integral`
-- ----------------------------
DROP TABLE IF EXISTS `integral`;
CREATE TABLE `integral` (
  `integral_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '积分兑换详情表ID',
  `integral_title` varchar(255) NOT NULL COMMENT '积分兑换详情标题',
  `integral_content` text NOT NULL COMMENT '积分兑换详情内容',
  `status` int(11) NOT NULL COMMENT ' 分析师表发布状态',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`integral_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of integral
-- ----------------------------
INSERT INTO `integral` VALUES ('1', '杰哈德公司打工', '<p>和幅度将袁腾飞</p>', '1', '1507735856', '1507736429');
INSERT INTO `integral` VALUES ('2', '哈哈大环境', '<p>法国和环境的</p>', '0', '1507736813', '1507736813');

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `items_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '投注项目',
  `iname` varchar(255) NOT NULL COMMENT '投注项名称',
  `content` varchar(255) NOT NULL,
  `match_id` int(11) NOT NULL,
  `peilv` smallint(8) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
  `status` int(255) NOT NULL DEFAULT '1' COMMENT '投注状态',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`items_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', 'gd', '谁将获得此次比赛的胜利shenglu？', '1', '0', '110', '0', '1507988487', '1507988952');
INSERT INTO `items` VALUES ('3', 'sds', 'fdsfsd', '1', '2', '0', '1', '1508091615', '1508091615');
INSERT INTO `items` VALUES ('4', 'dfsf', 'sdfsdf', '1', '1', '0', '1', '1508091615', '1508091615');
INSERT INTO `items` VALUES ('5', 'dfgdf', 'fgdf', '1', '3', '0', '1', '1508091615', '1508091615');
INSERT INTO `items` VALUES ('6', '谁会赢', '到底谁赢', '32', '1', '0', '1', '1508091701', '1508091701');
INSERT INTO `items` VALUES ('7', '赢多少', '赢了多少呢', '32', '2', '0', '1', '1508091701', '1508091701');
INSERT INTO `items` VALUES ('8', '你猜猜看', '我就不猜', '32', '2', '0', '1', '1508091701', '1508091701');
INSERT INTO `items` VALUES ('9', '猜猜谁会赢', '你猜我猜不猜', '33', '2', '2', '1', '1508092036', '1508092036');
INSERT INTO `items` VALUES ('10', '老杨好无聊', '真的好无聊', '33', '2', '1', '1', '1508092036', '1508092036');
INSERT INTO `items` VALUES ('11', '老杨说关他屁事', '妈的智障', '33', '2', '1', '1', '1508092036', '1508092036');
INSERT INTO `items` VALUES ('12', '1', '1', '29', '1', '0', '1', '1508093108', '1508093108');
INSERT INTO `items` VALUES ('13', '2', '2', '29', '2', '0', '1', '1508093108', '1508093108');
INSERT INTO `items` VALUES ('14', '3', '3', '29', '3', '0', '1', '1508093108', '1508093108');

-- ----------------------------
-- Table structure for `matchs`
-- ----------------------------
DROP TABLE IF EXISTS `matchs`;
CREATE TABLE `matchs` (
  `matchs_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '赛事表ID',
  `mname` varchar(255) NOT NULL COMMENT '赛事名称',
  `team1_id` int(11) NOT NULL COMMENT '关联队伍表id',
  `team2_id` int(11) NOT NULL,
  `point` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '关联用户表',
  `game_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '赛事状态',
  `starttime` int(11) NOT NULL COMMENT '赛事开始时间',
  `endtime` int(11) NOT NULL COMMENT '赛事结束时间',
  `create_time` int(11) NOT NULL COMMENT '赛事创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`matchs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matchs
-- ----------------------------
INSERT INTO `matchs` VALUES ('34', '异形大战铁血战士', '12', '13', '3:1', '0', '10', '3', '1508945580', '1509031980', '1508341984', '1508526224');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '论坛ID',
  `message_title` varchar(255) NOT NULL COMMENT '论坛标题',
  `message_content` text NOT NULL COMMENT '论坛内容',
  `user_id` int(11) NOT NULL COMMENT '关联用户表',
  `create_time` int(11) NOT NULL COMMENT '论坛发布时间',
  `update_time` int(11) NOT NULL,
  `message_reply` int(11) NOT NULL COMMENT '回复量',
  `message_look` varchar(11) NOT NULL COMMENT '查看量',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '交话费', '<p><span style=\"color: rgb(51, 51, 51); font-family: ΢���ź�; font-size: 12px; background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio eligendi exercitationem ipsa iste minus nesciunt praesentium qui reprehenderit. Eum ipsum natus repellendus sit veniam! Eos explicabo odit quidem ullam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio eligendi exercitationem ipsa iste minus nesciunt praesentium qui reprehenderit. Eum ipsum natus repellendus sit veniam! Eos explicabo odit quidem ullam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio eligendi exercitationem ipsa iste minus nesciunt praesentium qui reprehenderit. Eum ipsum natus repellendus sit veniam! Eos explicabo odit quidem ullam! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio eligendi exercitationem ipsa iste minus nesciunt praesentium qui reprehenderit. Eum ipsum natus repellendus sit veniam! Eos explicabo odit quidem ullam!</span></p>', '1', '0', '1507343155', '10', '46');
INSERT INTO `message` VALUES ('2', '巨化股', '<p>&lt;span', '1', '1506954366', '1507219215', '0', '10');
INSERT INTO `message` VALUES ('3', 'fvd', '<p>fvxdv&lt', '1', '1506954483', '1507219230', '0', '3');
INSERT INTO `message` VALUES ('4', '很严肃', '<p>返回手机打开后果', '1', '1506954621', '1507219248', '0', '10');
INSERT INTO `message` VALUES ('8', 'fdsf', 'dfgs', '3', '1507390638', '1507390638', '0', '4');
INSERT INTO `message` VALUES ('6', '女孩聚', '', '1', '1506954683', '1507219277', '0', '9');
INSERT INTO `message` VALUES ('7', ' 法规规范', '<p>发电公司同花顺</p>', '1', '1507343067', '1507343067', '2', '3');
INSERT INTO `message` VALUES ('9', '哈哈公司的更好', '结构和世界观和苏果预算', '3', '1507390739', '1507390739', '0', '');
INSERT INTO `message` VALUES ('12', 'jgkgykui', 'jkgyuliu;', '0', '1507816394', '1507816394', '0', '');
INSERT INTO `message` VALUES ('13', 'fgdh', 'fdhdh', '0', '1507817042', '1507817042', '0', '');
INSERT INTO `message` VALUES ('14', 'hftyutyi', 'gjyufoiulfyr', '0', '1507903410', '1507903410', '0', '');
INSERT INTO `message` VALUES ('15', 'hdrth', '', '0', '1507905469', '1507905469', '0', '');
INSERT INTO `message` VALUES ('16', '', '', '0', '1507907235', '1507907235', '0', '');
INSERT INTO `message` VALUES ('17', '', '', '0', '1507907246', '1507907246', '0', '');
INSERT INTO `message` VALUES ('18', 'GFDH', '', '0', '1507907455', '1507907455', '0', '');
INSERT INTO `message` VALUES ('19', '', 'cvbhfcg', '0', '1507907512', '1507907512', '0', '');
INSERT INTO `message` VALUES ('20', '和房管局', '', '0', '1507907631', '1507907631', '0', '');
INSERT INTO `message` VALUES ('21', '结果解放', '<p>和结构规范</p>', '3', '1507991413', '1507991413', '0', '0');

-- ----------------------------
-- Table structure for `message_re`
-- ----------------------------
DROP TABLE IF EXISTS `message_re`;
CREATE TABLE `message_re` (
  `re_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` int(10) unsigned NOT NULL COMMENT '父键',
  `messagere_content` text NOT NULL COMMENT '论坛回复内容',
  `user_id` int(11) NOT NULL COMMENT '关联用户表',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL COMMENT '论坛回复时间',
  PRIMARY KEY (`re_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message_re
-- ----------------------------
INSERT INTO `message_re` VALUES ('1', '1', '<p><span style=\"color: rgb(51, 51, 51); font-family: ΢���ź�; font-size: 12px; background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur distinctio eligendi exercitationem ipsa iste minus nesciunt praesent', '1', '150', '1507295787');
INSERT INTO `message_re` VALUES ('2', '1', '<p>gfdg公司噶过', '1', '1507276216', '1507287837');
INSERT INTO `message_re` VALUES ('3', '1', '<p>gfdfg</p', '1', '1507277039', '1507277039');
INSERT INTO `message_re` VALUES ('4', '4', '<p>dfGTS</p', '1', '1507277365', '1507287927');
INSERT INTO `message_re` VALUES ('6', '3', '开发的公交卡说过哈根', '3', '1507391378', '1507391378');
INSERT INTO `message_re` VALUES ('7', '2', '开发的公交卡说过哈根', '3', '1507391393', '1507391393');
INSERT INTO `message_re` VALUES ('8', '3', '和认同感和规划', '3', '1507391733', '1507391733');
INSERT INTO `message_re` VALUES ('9', '4', '个', '1', '1507431595', '1507431595');
INSERT INTO `message_re` VALUES ('10', '8', '和入户', '1', '1507431654', '1507431654');
INSERT INTO `message_re` VALUES ('11', '8', '和入户', '1', '1507431661', '1507431661');
INSERT INTO `message_re` VALUES ('12', '8', '和入户', '1', '1507431698', '1507431698');
INSERT INTO `message_re` VALUES ('13', '8', '和入户', '1', '1507431726', '1507431726');
INSERT INTO `message_re` VALUES ('14', '4', '高hi噢工业i深入骨髓', '1', '1507431783', '1507431783');
INSERT INTO `message_re` VALUES ('15', '1', 'gfvnfdkgblf', '0', '1507903378', '1507903378');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT ' 新闻 ID',
  `news_title` varchar(255) NOT NULL COMMENT '新闻名称',
  `news_content` text NOT NULL COMMENT '新闻内容',
  `status` int(11) NOT NULL COMMENT '公告状态，1发布，0未发布',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '更好发挥热特瑞实业', '<p>回访电话预定乳业与福特和交通与</p>', '1', '0', '1507468906');
INSERT INTO `news` VALUES ('2', '发给对方和', '<p>规范化的话</p>', '0', '0', '1507469048');
INSERT INTO `news` VALUES ('3', '', '', '0', '1507466680', '0');
INSERT INTO `news` VALUES ('4', '', '', '0', '1507466757', '0');
INSERT INTO `news` VALUES ('6', '', '', '0', '1507466965', '0');
INSERT INTO `news` VALUES ('7', '', '', '0', '1507467051', '0');
INSERT INTO `news` VALUES ('8', '', '', '0', '1507467248', '0');
INSERT INTO `news` VALUES ('9', '就好', '<p>和规范化</p>', '0', '1507467368', '0');

-- ----------------------------
-- Table structure for `notice`
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `notice_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `notice_title` varchar(255) NOT NULL COMMENT '公告名称',
  `notice_content` text NOT NULL COMMENT '公告内容',
  `status` int(11) NOT NULL COMMENT '公告状态，1发布，0未发布',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('1', '非官方的话', '<p>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头7022</p>', '1', '1507648370', '1507648865');

-- ----------------------------
-- Table structure for `recharge`
-- ----------------------------
DROP TABLE IF EXISTS `recharge`;
CREATE TABLE `recharge` (
  `recharge_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '充值ID',
  `user_id` int(11) NOT NULL COMMENT '关联用户表',
  `recharge_money` int(11) NOT NULL COMMENT '充值金额',
  `recharge_giveintgral` int(11) NOT NULL COMMENT '赠送积分',
  `recharge_type` int(11) NOT NULL COMMENT '充值类型',
  `recharge_status` int(10) unsigned NOT NULL COMMENT '充值状态',
  `recharge_time` int(11) NOT NULL COMMENT '充值时间',
  PRIMARY KEY (`recharge_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recharge
-- ----------------------------

-- ----------------------------
-- Table structure for `schedule`
-- ----------------------------
DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `match_name` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schedule
-- ----------------------------

-- ----------------------------
-- Table structure for `teams`
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `team_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '比赛队伍表ID',
  `tname` varchar(11) NOT NULL COMMENT '比赛队伍名称',
  `timage` varchar(255) NOT NULL COMMENT '比赛队伍图片',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES ('13', '铁血队', '/game/public/upload\\20171018\\00b37f71391abaeb9d47c2b04c25c6d1.jpg', '1508340767', '1508340767');

-- ----------------------------
-- Table structure for `team_match`
-- ----------------------------
DROP TABLE IF EXISTS `team_match`;
CREATE TABLE `team_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `match_name` varchar(255) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of team_match
-- ----------------------------
INSERT INTO `team_match` VALUES ('1', '12', '34', '异形大战铁血战士', '1508945580', '1509031980', '0');
INSERT INTO `team_match` VALUES ('2', '13', '34', '异形大战铁血战士', '1508945580', '1509031980', '0');

-- ----------------------------
-- Table structure for `toupiao`
-- ----------------------------
DROP TABLE IF EXISTS `toupiao`;
CREATE TABLE `toupiao` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of toupiao
-- ----------------------------
INSERT INTO `toupiao` VALUES ('0', '厦门鼓浪屿三日游投票中', '0');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(255) NOT NULL COMMENT '用户名称',
  `user_password` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `user_tel` varchar(255) NOT NULL COMMENT '用户手机号',
  `user_email` varchar(255) NOT NULL COMMENT '用户邮箱',
  `user_lastlogin_time` varchar(255) NOT NULL COMMENT '上次登录时间',
  `user_create_time` int(10) unsigned NOT NULL COMMENT '注册时间',
  `user_delete` int(11) NOT NULL COMMENT '删除0代表正常，1代表删除',
  `user_head` varchar(255) NOT NULL COMMENT '用户头像',
  `user_intgral` int(11) NOT NULL COMMENT '用户积分',
  `user_intgral_status` tinyint(4) NOT NULL COMMENT '积分冻结状态，0正常，1冻结',
  `user_gold` int(11) NOT NULL COMMENT '用户金币',
  `user_address` varchar(255) NOT NULL COMMENT '用户收货地址',
  `gold_present` int(11) NOT NULL COMMENT '金币转赠',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'joker', 'f418cc38002820fc077c663e77e9495f', '18628323551', '1126266505@qq.com', '1508349907', '1501060830', '0', '', '2065', '0', '0', '用户收货地址', '0');
INSERT INTO `user` VALUES ('3', '差不多先生', 'f418cc38002820fc077c663e77e9495f', '18628323552', '1126266505@qq.com', '1507378991', '1507309610', '0', '/game/public/upload\\20171007\\97ce20859f5f7c02d6735fdd3bdf806e.jpg', '0', '0', '0', '用户收货地址', '0');
INSERT INTO `user` VALUES ('4', '卖身葬青人', 'f418cc38002820fc077c663e77e9495f', '15828049227', '764117459@qq.com', '1501060830', '1507309610', '0', '/game/public/upload\\20171007\\29ff6b5977a2604518db901509a47827.jpg', '0', '0', '0', '', '0');

-- ----------------------------
-- Table structure for `user_log`
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `type_name` varchar(80) NOT NULL,
  `pay` decimal(10,2) NOT NULL,
  `user_money` decimal(10,2) NOT NULL,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_log
-- ----------------------------
INSERT INTO `user_log` VALUES ('1', '1', '1', '某某比赛某队胜（投注）', '100.00', '500.00', '1508060557');
INSERT INTO `user_log` VALUES ('8', '1', '2', '竞猜投注', '10.00', '71.00', '1508070214');
INSERT INTO `user_log` VALUES ('9', '1', '2', '竞猜投注', '10.00', '61.00', '1508070228');
INSERT INTO `user_log` VALUES ('10', '1', '3', '竞猜中奖', '30.00', '91.00', '1508080174');
INSERT INTO `user_log` VALUES ('11', '1', '3', '竞猜中奖', '6.00', '97.00', '1508080174');
INSERT INTO `user_log` VALUES ('7', '1', '2', '竞猜投注', '2.00', '81.00', '1508068950');
INSERT INTO `user_log` VALUES ('12', '1', '3', '竞猜中奖', '30.00', '127.00', '1508080175');
INSERT INTO `user_log` VALUES ('13', '1', '3', '竞猜中奖', '6.00', '133.00', '1508080175');
INSERT INTO `user_log` VALUES ('14', '1', '2', '竞猜投注', '10.00', '123.00', '1508125167');
INSERT INTO `user_log` VALUES ('15', '1', '2', '竞猜投注', '10.00', '113.00', '1508125626');
INSERT INTO `user_log` VALUES ('16', '1', '2', '竞猜投注', '1.00', '112.00', '1508126369');
INSERT INTO `user_log` VALUES ('17', '1', '2', '竞猜投注', '1.00', '111.00', '1508335239');
INSERT INTO `user_log` VALUES ('18', '1', '2', '竞猜投注', '1.00', '110.00', '1508350470');
INSERT INTO `user_log` VALUES ('19', '1', '2', '竞猜投注', '1.00', '109.00', '1508350829');
INSERT INTO `user_log` VALUES ('20', '1', '2', '竞猜投注', '1.00', '108.00', '1508351391');
INSERT INTO `user_log` VALUES ('21', '1', '2', '竞猜投注', '1.00', '107.00', '1508351511');
INSERT INTO `user_log` VALUES ('22', '1', '2', '竞猜投注', '10.00', '97.00', '1508351830');
INSERT INTO `user_log` VALUES ('23', '1', '3', '竞猜中奖', '0.00', '1857.00', '1508525902');
INSERT INTO `user_log` VALUES ('24', '1', '3', '竞猜中奖', '19.00', '1876.00', '1508526169');
INSERT INTO `user_log` VALUES ('25', '1', '3', '竞猜中奖', '19.00', '1895.00', '1508526192');
INSERT INTO `user_log` VALUES ('26', '1', '3', '竞猜中奖', '170.00', '2065.00', '1508526224');

-- ----------------------------
-- Table structure for `website`
-- ----------------------------
DROP TABLE IF EXISTS `website`;
CREATE TABLE `website` (
  `website_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '充值ID',
  `website_name` varchar(255) NOT NULL COMMENT '网站名称',
  `website_introduce` text NOT NULL COMMENT '网站简介',
  `website_type` varchar(255) NOT NULL COMMENT ' 网站类型',
  `website_tel` int(11) NOT NULL COMMENT '官方电话',
  `website_email` varchar(255) NOT NULL COMMENT '官方邮箱',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`website_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of website
-- ----------------------------
INSERT INTO `website` VALUES ('1', 'xkfdkfghd', '<p>fgd&nbsp;</p>', '游戏', '2147483647', '结婚的法国', '1507731566', '1507732521');
