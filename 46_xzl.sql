/*
MySQL Data Transfer
Source Host: localhost
Source Database: 46_xzl
Target Host: localhost
Target Database: 46_xzl
Date: 2019/6/24 20:19:19
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for bestop_abc
-- ----------------------------
DROP TABLE IF EXISTS `bestop_abc`;
CREATE TABLE `bestop_abc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `setting` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `items` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_abc_detail
-- ----------------------------
DROP TABLE IF EXISTS `bestop_abc_detail`;
CREATE TABLE `bestop_abc_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_access
-- ----------------------------
DROP TABLE IF EXISTS `bestop_access`;
CREATE TABLE `bestop_access` (
  `role_id` int(11) DEFAULT NULL,
  `node_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_active
-- ----------------------------
DROP TABLE IF EXISTS `bestop_active`;
CREATE TABLE `bestop_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `expire` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_admin
-- ----------------------------
DROP TABLE IF EXISTS `bestop_admin`;
CREATE TABLE `bestop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `encrypt` varchar(255) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `loginip` varchar(255) DEFAULT NULL,
  `islock` int(11) DEFAULT NULL,
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `zc_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_announce
-- ----------------------------
DROP TABLE IF EXISTS `bestop_announce`;
CREATE TABLE `bestop_announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `posttime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_area
-- ----------------------------
DROP TABLE IF EXISTS `bestop_area`;
CREATE TABLE `bestop_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `ename` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6019 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_article
-- ----------------------------
DROP TABLE IF EXISTS `bestop_article`;
CREATE TABLE `bestop_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `shorttitle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `copyfrom` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `content` text,
  `description` text,
  `publishtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `commentflag` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `jumpurl` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `asort` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `texta` varchar(255) DEFAULT NULL,
  `textb` varchar(255) DEFAULT NULL,
  `textc` varchar(255) DEFAULT NULL,
  `textd` varchar(255) DEFAULT NULL,
  `texte` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_attachment
-- ----------------------------
DROP TABLE IF EXISTS `bestop_attachment`;
CREATE TABLE `bestop_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `filetype` int(11) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `haslitpic` int(11) DEFAULT NULL,
  `uploadtime` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=313 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_attachmentindex
-- ----------------------------
DROP TABLE IF EXISTS `bestop_attachmentindex`;
CREATE TABLE `bestop_attachmentindex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arcid` int(11) DEFAULT NULL,
  `modelid` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_block
-- ----------------------------
DROP TABLE IF EXISTS `bestop_block`;
CREATE TABLE `bestop_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `content` text,
  `blocktype` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_cart
-- ----------------------------
DROP TABLE IF EXISTS `bestop_cart`;
CREATE TABLE `bestop_cart` (
  `cart_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_act` varchar(10) NOT NULL DEFAULT 'cart' COMMENT '购买方式(cart加入购物车/buy立即购买)',
  `cart_type` varchar(10) NOT NULL,
  `cart_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0',
  `product_guid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '唯一id',
  `product_name` varchar(100) NOT NULL,
  `product_rule` varchar(255) NOT NULL COMMENT '规格数据集',
  `product_logo` varchar(100) NOT NULL,
  `product_money` decimal(10,1) unsigned NOT NULL DEFAULT '0.0',
  `product_num` smallint(5) unsigned NOT NULL DEFAULT '1',
  `user_id` varchar(32) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `cart_type` (`cart_act`),
  KEY `product_id` (`product_id`),
  KEY `product_guid` (`product_guid`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=416 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_cases
-- ----------------------------
DROP TABLE IF EXISTS `bestop_cases`;
CREATE TABLE `bestop_cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `shorttitle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `copyfrom` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `content` text,
  `description` varchar(255) DEFAULT NULL,
  `publishtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `commentflag` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `jumpurl` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `csort` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_category
-- ----------------------------
DROP TABLE IF EXISTS `bestop_category`;
CREATE TABLE `bestop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ename` varchar(255) DEFAULT NULL,
  `catpic` varchar(255) DEFAULT NULL,
  `links` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `modelid` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `seotitle` varchar(255) DEFAULT NULL,
  `keywords` text,
  `description` text,
  `template_category` varchar(255) DEFAULT NULL,
  `template_list` varchar(255) DEFAULT NULL,
  `template_show` varchar(255) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_category_access
-- ----------------------------
DROP TABLE IF EXISTS `bestop_category_access`;
CREATE TABLE `bestop_category_access` (
  `catid` int(11) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_comment
-- ----------------------------
DROP TABLE IF EXISTS `bestop_comment`;
CREATE TABLE `bestop_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) DEFAULT NULL,
  `modelid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `posttime` int(11) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_config
-- ----------------------------
DROP TABLE IF EXISTS `bestop_config`;
CREATE TABLE `bestop_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `tvalue` varchar(255) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `value` text,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_copyfrom
-- ----------------------------
DROP TABLE IF EXISTS `bestop_copyfrom`;
CREATE TABLE `bestop_copyfrom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(255) DEFAULT NULL,
  `siteurl` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_event
-- ----------------------------
DROP TABLE IF EXISTS `bestop_event`;
CREATE TABLE `bestop_event` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `stime` bigint(11) DEFAULT NULL,
  `etime` bigint(11) DEFAULT NULL,
  `addtime` bigint(11) DEFAULT NULL,
  `zc_ids` varchar(500) DEFAULT NULL,
  `zc_info` text,
  `address` varchar(255) DEFAULT NULL,
  `adduser` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_event_info
-- ----------------------------
DROP TABLE IF EXISTS `bestop_event_info`;
CREATE TABLE `bestop_event_info` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `addtime` bigint(11) DEFAULT NULL,
  `yq_userid` bigint(11) DEFAULT NULL,
  `yq_username` varchar(255) DEFAULT NULL,
  `zc_id` bigint(11) DEFAULT NULL,
  `zc_name` varchar(255) DEFAULT NULL,
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_field
-- ----------------------------
DROP TABLE IF EXISTS `bestop_field`;
CREATE TABLE `bestop_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `bestop_guestbook`;
CREATE TABLE `bestop_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `homepage` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `posttime` int(11) DEFAULT NULL,
  `replytime` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `content` text,
  `reply` text,
  `userid` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `fp_type` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_guestbook_attr
-- ----------------------------
DROP TABLE IF EXISTS `bestop_guestbook_attr`;
CREATE TABLE `bestop_guestbook_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attrname` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT '1',
  `sort` int(11) DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_itemgroup
-- ----------------------------
DROP TABLE IF EXISTS `bestop_itemgroup`;
CREATE TABLE `bestop_itemgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_iteminfo
-- ----------------------------
DROP TABLE IF EXISTS `bestop_iteminfo`;
CREATE TABLE `bestop_iteminfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `itemgroup` varchar(255) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_link
-- ----------------------------
DROP TABLE IF EXISTS `bestop_link`;
CREATE TABLE `bestop_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ischeck` int(11) DEFAULT NULL,
  `posttime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_member
-- ----------------------------
DROP TABLE IF EXISTS `bestop_member`;
CREATE TABLE `bestop_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `encrypt` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `regtime` int(11) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `loginip` varchar(255) DEFAULT NULL,
  `loginnum` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `islock` int(11) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `zc_id` int(11) DEFAULT NULL,
  `group_no` varchar(255) DEFAULT NULL,
  `work_no` varchar(255) DEFAULT NULL,
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `user_money` decimal(10,1) DEFAULT NULL,
  `user_ordernum` int(11) DEFAULT NULL,
  `user_wx_openid` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1304 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_memberdetail
-- ----------------------------
DROP TABLE IF EXISTS `bestop_memberdetail`;
CREATE TABLE `bestop_memberdetail` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `sex` int(11) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `animal` int(11) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `blood` int(11) DEFAULT NULL,
  `marital` int(11) DEFAULT NULL,
  `education` int(11) DEFAULT NULL,
  `vocation` int(11) DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `maxim` varchar(255) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_membergroup
-- ----------------------------
DROP TABLE IF EXISTS `bestop_membergroup`;
CREATE TABLE `bestop_membergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_menu
-- ----------------------------
DROP TABLE IF EXISTS `bestop_menu`;
CREATE TABLE `bestop_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `quick` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_meta
-- ----------------------------
DROP TABLE IF EXISTS `bestop_meta`;
CREATE TABLE `bestop_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_model
-- ----------------------------
DROP TABLE IF EXISTS `bestop_model`;
CREATE TABLE `bestop_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tablename` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `template_category` varchar(255) DEFAULT NULL,
  `template_list` varchar(255) DEFAULT NULL,
  `template_show` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_node
-- ----------------------------
DROP TABLE IF EXISTS `bestop_node`;
CREATE TABLE `bestop_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_order
-- ----------------------------
DROP TABLE IF EXISTS `bestop_order`;
CREATE TABLE `bestop_order` (
  `order_id` bigint(15) unsigned NOT NULL COMMENT '订单id',
  `order_outid` varchar(50) DEFAULT NULL COMMENT '第三方支付订单号',
  `order_type` varchar(10) DEFAULT NULL COMMENT '订单类型(fixed/pintuan)',
  `order_virtual` tinyint(1) unsigned DEFAULT '0' COMMENT '是否虚拟商品订单',
  `order_name` varchar(50) DEFAULT NULL,
  `order_money` decimal(10,1) unsigned DEFAULT '0.0' COMMENT '订单金额',
  `order_product_money` decimal(10,1) unsigned DEFAULT '0.0',
  `order_wl_id` varchar(20) DEFAULT NULL,
  `order_wl_name` varchar(20) DEFAULT NULL,
  `order_wl_money` decimal(5,1) unsigned DEFAULT '0.0',
  `order_atime` int(10) unsigned DEFAULT '0' COMMENT '下单时间',
  `order_ptime` int(10) unsigned DEFAULT '0' COMMENT '付款时间',
  `order_stime` int(10) unsigned DEFAULT '0' COMMENT '发货时间',
  `order_ftime` int(10) unsigned DEFAULT '0' COMMENT '完成时间',
  `order_payment` varchar(10) DEFAULT 'alipay_js' COMMENT '支付方式类型',
  `order_payment_name` varchar(20) DEFAULT NULL COMMENT '支付方式名称',
  `order_comment` tinyint(1) unsigned DEFAULT '0',
  `order_state` varchar(10) DEFAULT 'wpay',
  `order_pstate` tinyint(1) unsigned DEFAULT '0' COMMENT '付款状态',
  `order_sstate` tinyint(1) unsigned DEFAULT '0' COMMENT '发货状态',
  `order_text` varchar(255) DEFAULT NULL COMMENT '订单留言',
  `order_closetext` varchar(255) DEFAULT NULL COMMENT '订单关闭原因',
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_tname` varchar(10) DEFAULT NULL,
  `user_phone` char(11) DEFAULT NULL COMMENT '用户手机',
  `user_tel` varchar(20) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL COMMENT '用户地址',
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `zc_id` bigint(11) DEFAULT NULL,
  `zc` varchar(255) DEFAULT NULL,
  `edit_flag` tinyint(1) DEFAULT '0',
  `edit_text` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_orderdata
-- ----------------------------
DROP TABLE IF EXISTS `bestop_orderdata`;
CREATE TABLE `bestop_orderdata` (
  `orderdata_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单数据id',
  `order_id` bigint(15) unsigned DEFAULT '0' COMMENT '订单id',
  `product_guid` char(32) DEFAULT NULL COMMENT '唯一id',
  `product_id` int(10) unsigned DEFAULT '0' COMMENT '商品id',
  `product_name` varchar(50) DEFAULT NULL COMMENT '订单名称',
  `product_rule` varchar(255) DEFAULT NULL,
  `product_logo` varchar(200) DEFAULT NULL COMMENT '商品logo',
  `product_money` decimal(10,1) DEFAULT '0.0',
  `product_jjmoney` decimal(10,1) DEFAULT '0.0' COMMENT '加减价格',
  `product_allmoney` decimal(10,1) unsigned DEFAULT '0.0',
  `product_num` smallint(5) unsigned DEFAULT NULL,
  `refund_id` bigint(15) unsigned DEFAULT '0',
  `refund_state` varchar(10) DEFAULT NULL,
  `prorule_key` varchar(30) DEFAULT NULL COMMENT '规格id组合',
  `prorule_name` varchar(255) DEFAULT NULL COMMENT '规格名称组合',
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `zc` varchar(255) DEFAULT NULL,
  `zc_id` bigint(11) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `uid` bigint(11) DEFAULT NULL,
  PRIMARY KEY (`orderdata_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=307 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_payment
-- ----------------------------
DROP TABLE IF EXISTS `bestop_payment`;
CREATE TABLE `bestop_payment` (
  `payment_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(10) DEFAULT NULL,
  `payment_type` varchar(15) DEFAULT NULL,
  `payment_desc` varchar(255) DEFAULT NULL COMMENT '支付描述',
  `payment_model` text,
  `payment_config` text,
  `payment_order` tinyint(3) unsigned DEFAULT '0',
  `payment_state` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_picture
-- ----------------------------
DROP TABLE IF EXISTS `bestop_picture`;
CREATE TABLE `bestop_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `description` text,
  `copyfrom` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `pictureurls` text,
  `content` text,
  `publishtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `commentflag` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `jumpurl` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_prodata
-- ----------------------------
DROP TABLE IF EXISTS `bestop_prodata`;
CREATE TABLE `bestop_prodata` (
  `product_guid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品规格id',
  `product_id` int(10) unsigned DEFAULT '0' COMMENT '商品id',
  `product_ruleid` varchar(30) DEFAULT NULL COMMENT '规格id组合',
  `product_rulename` varchar(50) DEFAULT NULL COMMENT '规格名组合',
  `product_rule` varchar(255) DEFAULT NULL COMMENT '规格数据集',
  `product_money` decimal(10,1) unsigned DEFAULT '0.0' COMMENT '真实售价（有活动即活动价）',
  `product_num` int(10) unsigned DEFAULT '0' COMMENT '剩余库存',
  `sort` smallint(5) unsigned DEFAULT '1',
  PRIMARY KEY (`product_guid`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_product
-- ----------------------------
DROP TABLE IF EXISTS `bestop_product`;
CREATE TABLE `bestop_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `pictureurls` text,
  `content` text,
  `description` text,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `publishtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `commentflag` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `jumpurl` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `psort` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `sellnum` int(11) DEFAULT NULL,
  `clicknum` int(11) DEFAULT NULL,
  `rules` text,
  `wlmoney` decimal(10,2) DEFAULT NULL,
  `zc_info` text,
  `zc_ids` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_question_type
-- ----------------------------
DROP TABLE IF EXISTS `bestop_question_type`;
CREATE TABLE `bestop_question_type` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `has_sort` tinyint(1) DEFAULT NULL,
  `has_prev` tinyint(1) DEFAULT NULL,
  `has_next` tinyint(1) DEFAULT NULL,
  `has_title_des` tinyint(1) DEFAULT NULL,
  `has_answer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_region
-- ----------------------------
DROP TABLE IF EXISTS `bestop_region`;
CREATE TABLE `bestop_region` (
  `region_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) unsigned DEFAULT '0',
  `region_name` varchar(120) DEFAULT '',
  `region_type` tinyint(1) DEFAULT '2',
  `sort` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`region_id`),
  KEY `parent_id` (`parent_id`),
  KEY `region_type` (`region_type`),
  KEY `agency_id` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=3417 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_register
-- ----------------------------
DROP TABLE IF EXISTS `bestop_register`;
CREATE TABLE `bestop_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `trip` varchar(255) DEFAULT NULL,
  `count` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `transfer` varchar(255) DEFAULT NULL,
  `posttime` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_role
-- ----------------------------
DROP TABLE IF EXISTS `bestop_role`;
CREATE TABLE `bestop_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_role_user
-- ----------------------------
DROP TABLE IF EXISTS `bestop_role_user`;
CREATE TABLE `bestop_role_user` (
  `role_id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_rule
-- ----------------------------
DROP TABLE IF EXISTS `bestop_rule`;
CREATE TABLE `bestop_rule` (
  `rule_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '规格id',
  `rule_name` varchar(20) NOT NULL COMMENT '规格名称',
  `rule_memo` varchar(20) NOT NULL COMMENT '规格备注',
  PRIMARY KEY (`rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_ruledata
-- ----------------------------
DROP TABLE IF EXISTS `bestop_ruledata`;
CREATE TABLE `bestop_ruledata` (
  `ruledata_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '规格值id',
  `ruledata_name` varchar(20) NOT NULL COMMENT '规格值名',
  `ruledata_logo` varchar(100) NOT NULL COMMENT '规格值图',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '规格值排序',
  `rule_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '规格id',
  PRIMARY KEY (`ruledata_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_soft
-- ----------------------------
DROP TABLE IF EXISTS `bestop_soft`;
CREATE TABLE `bestop_soft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `pictureurls` text,
  `content` text,
  `updatelog` text,
  `downlink` text,
  `description` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `softtype` int(11) DEFAULT NULL,
  `copytype` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `filesize` varchar(255) DEFAULT NULL,
  `officialurl` varchar(255) DEFAULT NULL,
  `publishtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `commentflag` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `jumpurl` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_special
-- ----------------------------
DROP TABLE IF EXISTS `bestop_special`;
CREATE TABLE `bestop_special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `shorttitle` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `litpic` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `publishtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `commentflag` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `jumpurl` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_statistic
-- ----------------------------
DROP TABLE IF EXISTS `bestop_statistic`;
CREATE TABLE `bestop_statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `tablename` varchar(255) DEFAULT NULL,
  `showid` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_wenjuan
-- ----------------------------
DROP TABLE IF EXISTS `bestop_wenjuan`;
CREATE TABLE `bestop_wenjuan` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `name_style` varchar(500) DEFAULT NULL,
  `title_style` varchar(500) DEFAULT NULL,
  `one_title_style` varchar(500) DEFAULT NULL,
  `two_title_style` varchar(500) DEFAULT NULL,
  `answer_style` varchar(500) DEFAULT NULL,
  `des` text,
  `tips` text,
  `stime` bigint(11) DEFAULT NULL,
  `etime` bigint(11) DEFAULT NULL,
  `addtime` bigint(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `tjkh_desc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_wenjuan_answer
-- ----------------------------
DROP TABLE IF EXISTS `bestop_wenjuan_answer`;
CREATE TABLE `bestop_wenjuan_answer` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `zc_id` bigint(11) DEFAULT NULL,
  `zc` varchar(255) DEFAULT NULL,
  `wenjuan_id` bigint(11) DEFAULT NULL,
  `answer` text,
  `addtime` bigint(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dep` varchar(255) DEFAULT NULL,
  `txt1` text,
  `txt2` text,
  `txt3` text,
  `txt4` text,
  `txt5` text,
  `txt6` text,
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `khname1` varchar(255) DEFAULT NULL,
  `khtel1` varchar(255) DEFAULT NULL,
  `khname2` varchar(255) DEFAULT NULL,
  `khtel2` varchar(255) DEFAULT NULL,
  `khname3` varchar(255) DEFAULT NULL,
  `khtel3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_wenjuan_question
-- ----------------------------
DROP TABLE IF EXISTS `bestop_wenjuan_question`;
CREATE TABLE `bestop_wenjuan_question` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `wenjuan_id` bigint(11) DEFAULT NULL,
  `sort` bigint(11) DEFAULT NULL,
  `title_des` text,
  `name` varchar(800) DEFAULT NULL,
  `q_type` tinyint(1) DEFAULT NULL,
  `content` text,
  `tips` text,
  `display_sort` tinyint(1) DEFAULT NULL,
  `prev` varchar(500) DEFAULT NULL,
  `next` varchar(500) DEFAULT NULL,
  `is_del` tinyint(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for bestop_zc
-- ----------------------------
DROP TABLE IF EXISTS `bestop_zc`;
CREATE TABLE `bestop_zc` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `prov` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `addr` varchar(500) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `addtime` bigint(11) DEFAULT NULL,
  `edittime` bigint(11) DEFAULT NULL,
  `sort` bigint(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `bestop_abc` VALUES ('1', '手机banner', '用于手机站banner展示', null, null, '<loop><a href=\"{$url}\"><img src=\"{$content}\" /></a></loop>', '2', null, null);
INSERT INTO `bestop_abc_detail` VALUES ('6', '古风食器', '', 'abc1/20190301/5c792f88030d4.png', '', null, null, '1', '1', '1');
INSERT INTO `bestop_abc_detail` VALUES ('5', '淘米盆三件套', '', 'abc1/20190301/5c792f4e7cbb4.png', '', null, null, '1', '1', '1');
INSERT INTO `bestop_access` VALUES ('2', '1', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '2', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '3', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '4', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '5', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '6', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '8', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '9', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '10', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '11', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '12', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '17', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '18', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '55', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '100', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '19', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '20', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '21', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '22', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '23', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '24', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '25', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '26', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '27', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '28', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '29', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '30', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '31', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '32', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '33', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '34', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '35', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '36', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '37', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '38', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '39', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '40', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '41', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '42', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '43', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '44', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '45', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '46', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '47', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '48', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '49', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '50', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '51', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '52', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '53', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '54', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '56', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '57', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '58', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '59', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '60', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '61', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '62', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '63', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '64', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '65', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '66', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '67', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '68', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '69', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '70', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '71', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '72', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '73', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '74', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '75', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '76', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '77', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '78', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '79', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '80', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '81', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '82', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '83', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '84', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '85', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '86', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '87', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '88', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '89', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '90', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '91', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '92', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '93', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '94', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '95', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '96', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '97', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '98', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '99', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '101', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '102', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '103', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '104', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '105', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '106', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '107', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '108', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '109', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '110', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '111', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '112', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '113', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '114', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '115', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '116', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '117', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '118', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '119', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '120', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '121', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '122', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '123', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '124', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '125', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '126', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '127', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '1', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '2', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '3', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '4', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '5', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '6', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '8', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '9', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '10', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '11', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '12', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '17', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '18', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '55', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '100', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '19', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '20', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '21', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '22', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '23', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '24', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '25', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '26', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '27', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '28', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '29', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '30', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '31', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '32', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '33', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '34', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '35', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '36', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '37', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '38', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '39', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '40', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '41', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '42', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '43', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '44', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '45', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '46', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '47', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '48', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '49', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '50', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '51', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '52', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '53', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '54', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '56', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '57', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '58', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '59', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '60', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '61', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '62', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '63', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '64', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '65', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '66', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '67', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '68', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '69', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '70', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '71', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '72', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '73', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '74', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '75', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '76', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '77', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '78', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '79', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '80', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '81', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '82', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '83', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '84', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '85', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '86', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '87', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '88', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '89', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '90', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '91', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '92', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '93', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '94', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '95', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '96', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '97', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '98', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '99', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '101', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '102', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '103', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '104', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '105', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '106', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '107', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '108', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '109', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '110', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '111', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '112', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '113', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '114', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '115', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '116', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '117', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '118', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '119', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '120', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '121', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '122', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '123', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '124', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '125', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '126', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '127', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '1', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '2', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '3', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '4', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '5', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '6', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '8', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '9', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '10', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '11', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '12', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '17', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '18', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '55', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '100', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '19', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '20', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '21', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '22', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '23', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '24', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '25', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '26', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '27', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '28', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '29', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '30', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '31', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '32', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '33', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '34', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '35', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '36', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '37', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '38', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '39', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '40', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '41', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '42', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '43', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '44', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '45', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '46', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '47', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '48', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '49', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '50', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '51', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '52', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '53', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '54', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '56', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '57', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '58', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '59', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '60', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '61', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '62', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '63', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '64', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '65', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '66', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '67', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '68', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '69', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '70', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '71', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '72', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '73', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '74', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '75', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '76', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '77', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '78', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '79', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '80', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '81', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '82', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '83', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '84', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '85', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '86', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '87', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '88', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '89', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '90', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '91', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '92', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '93', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '94', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '95', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '96', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '97', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '98', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '99', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '101', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '102', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '103', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '104', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '105', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '106', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '107', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '108', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '109', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '110', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '111', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '112', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '113', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '114', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '115', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '116', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '117', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '118', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '119', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '120', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '121', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '122', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '123', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '124', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '125', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '126', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '127', '1', '');
INSERT INTO `bestop_access` VALUES ('2', '1', '1', null);
INSERT INTO `bestop_access` VALUES ('2', '2', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '3', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '4', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '5', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '6', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '8', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '9', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '10', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '11', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '12', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '17', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '18', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '55', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '100', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '19', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '20', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '21', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '22', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '23', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '24', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '25', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '26', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '27', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '28', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '29', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '30', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '31', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '32', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '33', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '34', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '35', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '36', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '37', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '38', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '39', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '40', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '41', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '42', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '43', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '44', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '45', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '46', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '47', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '48', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '49', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '50', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '51', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '52', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '53', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '54', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '56', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '57', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '58', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '59', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '60', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '61', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '62', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '63', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '64', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '65', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '66', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '67', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '68', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '69', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '70', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '71', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '72', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '73', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '74', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '75', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '76', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '77', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '78', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '79', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '80', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '81', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '82', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '83', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '84', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '85', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '86', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '87', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '88', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '89', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '90', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '91', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '92', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '93', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '94', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '95', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '96', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '97', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '98', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '99', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '101', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '102', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '103', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '104', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '105', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '106', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '107', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '108', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '109', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '110', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '111', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '112', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '113', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '114', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '115', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '116', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '117', '2', null);
INSERT INTO `bestop_access` VALUES ('2', '118', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '119', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '120', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '121', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '122', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '123', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '124', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '125', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '126', '3', null);
INSERT INTO `bestop_access` VALUES ('2', '127', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '153', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '152', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '151', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '150', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '149', '2', null);
INSERT INTO `bestop_access` VALUES ('4', '145', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '144', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '143', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '142', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '141', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '140', '2', null);
INSERT INTO `bestop_access` VALUES ('4', '148', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '147', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '146', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '139', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '138', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '137', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '136', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '135', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '134', '2', null);
INSERT INTO `bestop_access` VALUES ('4', '130', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '129', '3', null);
INSERT INTO `bestop_access` VALUES ('4', '128', '2', null);
INSERT INTO `bestop_access` VALUES ('4', '1', '1', null);
INSERT INTO `bestop_admin` VALUES ('1', 'admin', '48b88220f5bee067d88ff17a38ed8ba9', 'CGKSnX', '', '', '9', '1559351362', '127.0.0.1', '0', null, null, null, null);
INSERT INTO `bestop_admin` VALUES ('54', '18352527315', 'e4d986837e9fbda680c99447d44b7e71', 'ewzhMP', '刘晔', null, null, '1554099468', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '54');
INSERT INTO `bestop_admin` VALUES ('55', '13961711617', '73de26a4113992496c75aa21cc1aa594', 'CqiFRl', '倪俊炜', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '55');
INSERT INTO `bestop_admin` VALUES ('56', '13912361321', 'cfe8c1fdafe386bf0c3b432bfa26179f', 'fHLaMY', '陈婷婷', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '56');
INSERT INTO `bestop_admin` VALUES ('57', '15295432162', 'e31c00b47da8f944b3e0a4def2993bd1', 'HtARMV', '杨晓迎', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '57');
INSERT INTO `bestop_admin` VALUES ('58', '13912472765', '577e2f72357413ad2a256ff706f6989a', 'UbsQF7', '华慧', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '58');
INSERT INTO `bestop_admin` VALUES ('59', '15152218555', '7710f3dedf7704f76f1d79f82c9e55fe', 'jfJQx8', '薛佳敏', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '60');
INSERT INTO `bestop_admin` VALUES ('60', '15061897264', 'c0dcca0976bfb360d6ad30d1d6fc9996', 'JnwVd9', '蒋梦薇', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '61');
INSERT INTO `bestop_admin` VALUES ('61', '13915279895', '5c38d67a1d074108cb64f166a7921587', 'WkYkZ6', '张萍', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '62');
INSERT INTO `bestop_admin` VALUES ('62', '18751585975', '5bfff0a937caacc4077b99943d6f4941', '6vTaLc', '吴海锋', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '63');
INSERT INTO `bestop_admin` VALUES ('63', '13915261102', '6c786fed1cafdcb6df5ffe2933b02539', 'w1zJNi', '张海燕', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '64');
INSERT INTO `bestop_admin` VALUES ('64', '18262275050', '829afab9cd0faab41d5527e3cd106c5c', 'w4WaJ5', '管延红', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '65');
INSERT INTO `bestop_admin` VALUES ('65', '18762618626', '1934c6066cca49d07d1e2ec6a3d5cf40', 'TVCBf2', '何梅', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '66');
INSERT INTO `bestop_admin` VALUES ('66', '15895351009', '337833ec47bd962c162c8f4623261d52', 'kyV1RV', '范愿愿', null, null, '1554099346', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '67');
INSERT INTO `bestop_admin` VALUES ('67', '15852735580', 'c14f168c850d7cbbeec5bef6973bb607', '1K1VTv', '郁玲焱', null, null, '1554099347', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '68');
INSERT INTO `bestop_admin` VALUES ('68', '13921107713', 'aa77694a64345321ba54c1ee2a833351', 'n2JB6W', '李灵', null, null, '1554099347', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '69');
INSERT INTO `bestop_admin` VALUES ('69', '15951586140', '748c17f32752cf46f35fce5c9d949518', 'MSjiMC', '陈林', null, null, '1554099347', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '70');
INSERT INTO `bestop_admin` VALUES ('70', '13921154314', 'eea074a809b4c1470407fe7c0a97d309', 'ftg8pg', '李晓航', null, null, '1554099347', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '71');
INSERT INTO `bestop_admin` VALUES ('71', '15061799125', '1eeaeb3f66dcf26a44730af930ce3caa', 'yZhSyQ', '严辛', null, null, '1554099347', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '73');
INSERT INTO `bestop_admin` VALUES ('72', '13500000000', '658c512784481e8f5ce1621ecbf698e5', 'KT6FIV', '营业部', null, null, '1554099347', '127.0.0.1', '0', '江苏', '南京', '国寿南京银保营业部', '53');
INSERT INTO `bestop_admin` VALUES ('73', '17768337551', '2ccc9555beb16209bb5b5e006cf280d3', 'lniY2N', '邱戴琰', null, null, '1554099347', '127.0.0.1', '0', '江苏', '无锡', '国寿惠山支公司', '74');
INSERT INTO `bestop_admin` VALUES ('74', '13356789000', '989d3b9834d849a8b109e737a793f54a', 't1QHxg', '营业部', null, null, '1554099347', '127.0.0.1', '0', '江苏', '南京', '国寿高淳支公司', '52');
INSERT INTO `bestop_area` VALUES ('1', '北京市', '北京', '', '0', '0');
INSERT INTO `bestop_area` VALUES ('8', '江苏省', '江苏', '', '0', '0');
INSERT INTO `bestop_area` VALUES ('105', '朝阳区', '朝阳区', '', '1', '0');
INSERT INTO `bestop_area` VALUES ('801', '南京市', '南京', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('802', '徐州市', '徐州', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('803', '连云港市', '连云港', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('804', '淮安市', '淮安', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('805', '宿迁市', '宿迁', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('806', '盐城市', '盐城', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('807', '扬州市', '扬州', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('808', '泰州市', '泰州', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('809', '南通市', '南通', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('810', '镇江市', '镇江', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('811', '常州市', '常州', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('812', '无锡市', '无锡', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('813', '苏州市', '苏州', '', '8', '0');
INSERT INTO `bestop_area` VALUES ('2408', '万宁市', '万宁', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2409', '东方市', '东方', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2410', '澄迈县', '澄迈县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2411', '定安县', '定安县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2412', '屯昌县', '屯昌县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2413', '临高县', '临高县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2414', '白沙县', '白沙县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2415', '昌江县', '昌江县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2416', '乐东县', '乐东县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2417', '陵水县', '陵水县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2418', '保亭县', '保亭县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2419', '琼中县', '琼中县', '', '24', '0');
INSERT INTO `bestop_area` VALUES ('2501', '昆明市', '昆明', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2502', '曲靖市', '曲靖', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2503', '玉溪市', '玉溪', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2504', '保山市', '保山', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2505', '昭通市', '昭通', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2506', ' 普洱市', ' 普洱', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2507', '临沧市', '临沧', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2508', '丽江市', '丽江', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2509', '文山州', '文山', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2510', '红河州', '红河', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2511', '西双版纳', '西双版纳', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2512', '楚雄州', '楚雄', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2513', '大理州', '大理', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2514', '德宏州', '德宏', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2515', '怒江州', '怒江', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2516', '迪庆州', '迪庆', '', '25', '0');
INSERT INTO `bestop_area` VALUES ('2601', '贵阳市', '贵阳', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2602', '六盘水市', '六盘水', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2603', '遵义市', '遵义', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2604', '安顺市', '安顺', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2605', '铜仁地区', '铜仁地区', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2606', '毕节地区', '毕节地区', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2607', '黔西南州', '黔西南', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2608', '黔东南州', '黔东南', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2609', '黔南州', '黔南', '', '26', '0');
INSERT INTO `bestop_area` VALUES ('2701', '拉萨市', '拉萨', '', '27', '0');
INSERT INTO `bestop_area` VALUES ('2702', '那曲地区', '那曲地区', '', '27', '0');
INSERT INTO `bestop_area` VALUES ('2703', '昌都地区', '昌都地区', '', '27', '0');
INSERT INTO `bestop_area` VALUES ('2704', '山南地区', '山南地区', '', '27', '0');
INSERT INTO `bestop_area` VALUES ('2705', '日喀则', '日喀则', '', '27', '0');
INSERT INTO `bestop_area` VALUES ('2706', '阿里地区', '阿里地区', '', '27', '0');
INSERT INTO `bestop_area` VALUES ('2707', '林芝地区', '林芝地区', '', '27', '0');
INSERT INTO `bestop_area` VALUES ('2801', '兰州市', '兰州', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2802', '金昌市', '金昌', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2803', '白银市', '白银', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2804', '天水市', '天水', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2805', '嘉峪关市', '嘉峪关', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2806', '武威市', '武威', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2807', '定西地区', '定西地区', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2808', '平凉地区', '平凉地区', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2809', '庆阳地区', '庆阳地区', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2810', '陇南地区', '陇南地区', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2811', '张掖地区', '张掖地区', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2812', '酒泉地区', '酒泉地区', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2813', '甘南州', '甘南', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2814', '临夏州', '临夏', '', '28', '0');
INSERT INTO `bestop_area` VALUES ('2901', '银川市', '银川', '', '29', '0');
INSERT INTO `bestop_area` VALUES ('2902', '石嘴山市', '石嘴山', '', '29', '0');
INSERT INTO `bestop_area` VALUES ('2903', '吴忠市', '吴忠', '', '29', '0');
INSERT INTO `bestop_area` VALUES ('2904', '固原市', '固原', '', '29', '0');
INSERT INTO `bestop_area` VALUES ('3001', '西宁市', '西宁', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3002', '海东地区', '海东地区', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3003', '海北州', '海北', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3004', '黄南州', '黄南', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3005', '海南州', '海南', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3006', '果洛州', '果洛', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3007', '玉树州', '玉树', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3008', '海西州', '海西', '', '30', '0');
INSERT INTO `bestop_area` VALUES ('3101', '乌鲁木齐', '乌鲁木齐', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3102', '克拉玛依', '克拉玛依', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3103', '石河子市', '石河子', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3104', '吐鲁番', '吐鲁番', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3105', '哈密地区', '哈密地区', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3106', '和田地区', '和田地区', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3107', '阿克苏', '阿克苏', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3108', '喀什地区', '喀什地区', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3109', '克孜勒苏', '克孜勒苏', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3110', '巴音郭楞', '巴音郭楞', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3111', '昌吉州', '昌吉', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3112', '博尔塔拉', '博尔塔拉', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3113', '伊犁州', '伊犁', '', '31', '0');
INSERT INTO `bestop_area` VALUES ('3114', '西安市', '西安', '', '13', '0');
INSERT INTO `bestop_area` VALUES ('3201', '香港岛', '香港岛', '', '32', '0');
INSERT INTO `bestop_area` VALUES ('3202', '九龙', '九龙', '', '32', '0');
INSERT INTO `bestop_area` VALUES ('3203', '新界', '新界', '', '32', '0');
INSERT INTO `bestop_area` VALUES ('3301', '澳门半岛', '澳门半岛', '', '33', '0');
INSERT INTO `bestop_area` VALUES ('3302', '离岛', '离岛', '', '33', '0');
INSERT INTO `bestop_area` VALUES ('3401', '台北市', '台北', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3402', '高雄市', '高雄', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3403', '台南市', '台南', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3404', '台中市', '台中', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3405', '金门县', '金门县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3406', '南投县', '南投县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3407', '基隆市', '基隆', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3408', '新竹市', '新竹', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3409', '嘉义市', '嘉义', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3410', '新北市', '新北', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3411', '宜兰县', '宜兰县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3412', '新竹县', '新竹县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3413', '桃园县', '桃园县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3414', '苗栗县', '苗栗县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3415', '彰化县', '彰化县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3416', '嘉义县', '嘉义县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3417', '云林县', '云林县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3418', '屏东县', '屏东县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3419', '台东县', '台东县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3420', '花莲县', '花莲县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('3421', '澎湖县', '澎湖县', '', '34', '0');
INSERT INTO `bestop_area` VALUES ('6001', '美国', '美国', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6002', '英国', '英国', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6003', '法国', '法国', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6004', '俄罗斯', '俄罗斯', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6005', '加拿大', '加拿大', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6006', '巴西', '巴西', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6007', '澳大利亚', '澳大利亚', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6008', '印尼', '印尼', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6009', '马来西亚', '马来西亚', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6010', '新加坡', '新加坡', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6011', '菲律宾', '菲律宾', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6012', '越南', '越南', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6013', '印度', '印度', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6014', '日本', '日本', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6015', '韩国', '韩国', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6016', '泰国', '泰国', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6017', '缅甸', '缅甸', '', '60', '0');
INSERT INTO `bestop_area` VALUES ('6018', '其他', '其他', '', '60', '0');
INSERT INTO `bestop_article` VALUES ('6', '热烈祝贺“保礼街”正式上线！', '', '', null, null, '', '', '<p style=\"margin-top: 1px; margin-bottom: 0px; padding: 0px 0px 8px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 15px; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp; <strong><span style=\"color: rgb(255, 0, 0); font-size: 24px;\">热烈祝贺“保礼街”正式上线！</span></strong></p>', '  1、都来买实惠多，早来早得。　　2、都来买，不仅是购物……　　3、最高品质，最低价格，都来买在等着你。　　4、每天都来买，天天乐悠悠。　　5、百货风景线，天下都来买。　　6、生活都来买，网购全名牌。　　7、都来买商城', '1549720838', '1551278344', '45', '8', '1', '1', '', '0', '1', null, '1', '', '', '', '', '');
INSERT INTO `bestop_article` VALUES ('7', '800家企业300家供应商入驻新之礼', '', '', null, null, '', '', '<div>作者：牛客网<br/>链接：https://zhuanlan.zhihu.com/p/53865600<br/>来源：知乎<br/>著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。<br/><br/><div><h2>为什么要优化</h2><ul class=\" list-paddingleft-2\"><li><p>系统的吞吐量瓶颈往往出现在数据库的访问速度上</p></li><li><p>随着应用程序的运行，数据库的中的数据会越来越多，处理时间会相应变慢</p></li><li><p>数据是存放在磁盘上的，读写速度无法和内存相比</p></li></ul><h2>如何优化</h2><ul class=\" list-paddingleft-2\"><li><p>设计数据库时：数据库表、字段的设计，存储引擎</p></li><li><p>利用好MySQL自身提供的功能，如索引等</p></li><li><p>横向扩展：MySQL集群、负载均衡、读写分离</p></li><li><p>SQL语句的优化（收效甚微）</p></li></ul><h2><strong>字段设计</strong></h2><blockquote>字段类型的选择，设计规范，范式，常见设计案例</blockquote><h2>原则：尽量使用整型表示字符串</h2><h2>存储IP</h2><p>INET_ATON(str)，address to number</p><p>INET_NTOA(number)，number to address</p><h2>MySQL内部的枚举类型（单选）和集合（多选）类型</h2><p>但是因为维护成本较高因此不常使用，使用<strong>关联表</strong>的方式来替代enum</p><h2>原则：定长和非定长数据类型的选择</h2><blockquote>decimal不会损失精度，存储空间会随数据的增大而增大。double占用固定空间，较大数的存储会损失精度。非定长的还有varchar、text</blockquote><h2>金额</h2><blockquote>对数据的精度要求较高，小数的运算和存储存在精度问题（不能将所有小数转换成二进制）</blockquote><h2>定点数decimal</h2><p>price decimal(8,2)有2位小数的定点数，定点数支持很大的数（甚至是超过int,bigint存储范围的数）</p><h2>小单位大数额避免出现小数</h2><p>元-&gt;分</p><h2>字符串存储</h2><p>定长char，非定长varchar、text（上限65535，其中varchar还会消耗1-3字节记录长度，而text使用额外空间记录长度）</p><h2>原则：尽可能选择小的数据类型和指定短的长度</h2><h2>原则：尽可能使用 not null</h2><p>非null字段的处理要比null字段的处理高效些！且不需要判断是否为null。</p><p>null在MySQL中，不好处理，存储需要额外空间，运算也需要特殊的运算符。如select null = null和select null &lt;&gt; null（&lt;&gt;为不等号）有着同样的结果，只能通过is null和is not null来判断字段是否为null。</p><p>如何存储？MySQL中每条记录都需要额外的存储空间，表示每个字段是否为null。因此通常使用特殊的数据进行占位，比如int not null default 0、string not null default ‘’</p><h2>原则：字段注释要完整，见名知意</h2></div></div><p><br/></p>', '作者：牛客网链接：https://zhuanlan.zhihu.com/p/53865600来源：知乎著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。为什么要优化系统的吞吐量瓶颈往往出现在数据库的访问速度上随着应用程序的', '1549720970', '1549721076', '80', '8', '1', '0', '', '1', '1', null, '1', '', '', '', '', '');
INSERT INTO `bestop_article` VALUES ('8', '货物一旦售出该不退', '', '', null, null, '', '', '<p>货物一旦售出该不退</p><p>货物一旦售出该不退</p><p>货物一旦售出该不退</p><p>货物一旦售出该不退</p><p>货物一旦售出该不退</p><p>货物一旦售出该不退</p>', '货物一旦售出该不退货物一旦售出该不退货物一旦售出该不退货物一旦售出该不退货物一旦售出该不退货物一旦售出该不退', '1549721082', '1549721117', '83', '9', '1', '0', '', '0', '1', null, '1', '', '', '', '', '');
INSERT INTO `bestop_article` VALUES ('9', '如何查看自己的专属二维码', '', '', null, null, '', '', '<p>登录个人中心即可查看自己的专属二维码！！！</p><p>登录个人中心即可查看自己的专属二维码！！！</p><p><br/></p>', '登录个人中心即可查看自己的专属二维码！！！登录个人中心即可查看自己的专属二维码！！！登录个人中心即可查看自己的专属二维码！！！登录个人中心即可查看自己的专属二维码！！！登录个人中心即可查看自己的专属二维码！！！登录个人中心即可查看自己的专属', '1549721121', '1551278370', '32', '9', '1', '1', '', '0', '1', null, '1', '', '', '', '', '');
INSERT INTO `bestop_attachment` VALUES ('274', 'timg (2).jpg', 'abc1/20190210/5c5fa86f9b9ea.jpg', '1', '72951', '0', '1549772911', '1', null);
INSERT INTO `bestop_attachment` VALUES ('275', 't012c852c8f981d6a00.jpg', 'img1/20190212/5c625a25dd712.jpg', '1', '837637', '1', '1549949478', '1', null);
INSERT INTO `bestop_attachment` VALUES ('276', 't012c852c8f981d6a00.jpg', 'img1/20190212/5c6266f8ce7e7.jpg', '1', '837637', '1', '1549952761', '1', null);
INSERT INTO `bestop_attachment` VALUES ('277', 'DSC01870.JPG', 'img1/20190212/5c626708aa182.JPG', '0', '2058073', '1', '1549952777', '1', null);
INSERT INTO `bestop_attachment` VALUES ('278', 'DSC01870.JPG', 'img1/20190212/5c6269e6cfef1.JPG', '0', '2058073', '1', '1549953511', '1', null);
INSERT INTO `bestop_attachment` VALUES ('279', '100_9971.jpg', 'img1/20190212/5c6269eebc44e.jpg', '1', '790715', '1', '1549953519', '1', null);
INSERT INTO `bestop_attachment` VALUES ('280', '图片 009.jpg', 'img1/20190212/5c626a7f5a30d.jpg', '1', '34660', '1', '1549953663', '1', null);
INSERT INTO `bestop_attachment` VALUES ('281', '图片 020.jpg', 'img1/20190212/5c626b0b57fec.jpg', '1', '41672', '1', '1549953803', '1', null);
INSERT INTO `bestop_attachment` VALUES ('282', '图片 010.jpg', 'img1/20190212/5c626b0f33ac0.jpg', '1', '33546', '1', '1549953807', '1', null);
INSERT INTO `bestop_attachment` VALUES ('283', 'DSC00514.JPG', 'img1/20190212/5c626b9f5a0fd.JPG', '0', '1444275', '1', '1549953952', '1', null);
INSERT INTO `bestop_attachment` VALUES ('284', 'DSC00515.JPG', 'img1/20190212/5c626ce59175e.JPG', '0', '1376213', '1', '1549954278', '1', null);
INSERT INTO `bestop_attachment` VALUES ('285', 'DSC00515.JPG', 'img1/20190212/5c626d1a6352a.JPG', '0', '1376213', '1', '1549954331', '1', null);
INSERT INTO `bestop_attachment` VALUES ('286', 'S40330-214651-001.jpg', 'img1/20190212/5c62868013a46.jpg', '1', '214486', '1', '1549960832', '1', null);
INSERT INTO `bestop_attachment` VALUES ('287', 'S40404-102436-001.jpg', 'img1/20190212/5c628683a2453.jpg', '1', '130757', '1', '1549960835', '1', null);
INSERT INTO `bestop_attachment` VALUES ('288', 'S40316-222908-001.jpg', 'img1/20190213/5c63ab4824696.jpg', '1', '247025', '1', '1550035784', '1', null);
INSERT INTO `bestop_attachment` VALUES ('289', 'S40612-094755.jpg', 'img1/20190213/5c63ab5c1ce0c.jpg', '1', '947230', '1', '1550035804', '1', null);
INSERT INTO `bestop_attachment` VALUES ('290', 't012c852c8f981d6a00.jpg', 'img1/20190214/5c652c43721d0.jpg', '1', '837637', '1', '1550134339', '1', null);
INSERT INTO `bestop_attachment` VALUES ('291', 'QQ图片20140402123943.jpg', 'img1/20190218/5c6aa8a3babb9.jpg', '1', '132365', '1', '1550493859', '1', null);
INSERT INTO `bestop_attachment` VALUES ('292', '100_9963.jpg', 'img1/20190222/5c6fa75977156.jpg', '1', '894294', '1', '1550821209', '1', null);
INSERT INTO `bestop_attachment` VALUES ('272', 'u=1522435514,1830576494&fm=11&gp=0.jpg', 'abc1/20190203/5c5707a2625cd.jpg', '1', '239658', '0', '1549207458', '1', null);
INSERT INTO `bestop_attachment` VALUES ('273', 'u=3091446863,1061118238&fm=26&gp=0.jpg', 'abc1/20190203/5c5707ba7fe43.jpg', '1', '26960', '0', '1549207482', '1', null);
INSERT INTO `bestop_attachment` VALUES ('293', '1.jpg', 'img1/20190223/5c70c693cb390.jpg', '1', '20743', '1', '1550894740', '1', null);
INSERT INTO `bestop_attachment` VALUES ('294', 'O1CN019nmQ7J1VkWIAfqFCe_!!2-item_pic.png_230x230.jpg', 'img1/20190223/5c70c74e17890.jpg', '1', '43887', '1', '1550894926', '1', null);
INSERT INTO `bestop_attachment` VALUES ('295', 'O1CN01hXJwNp2HMKx2at7vV_!!0-item_pic.jpg_230x230.jpg', 'img1/20190223/5c70c7bc8c870.jpg', '1', '36144', '1', '1550895036', '1', null);
INSERT INTO `bestop_attachment` VALUES ('296', '图片013.png', 'img1/20190225/5c7364feb6080.png', '1', '220941', '1', '1551066367', '1', null);
INSERT INTO `bestop_attachment` VALUES ('297', '图片014.png', 'img1/20190225/5c7365a593440.png', '1', '127610', '1', '1551066534', '1', null);
INSERT INTO `bestop_attachment` VALUES ('298', '图片013.png', 'img1/20190225/5c7366406d920.png', '1', '220941', '1', '1551066688', '1', null);
INSERT INTO `bestop_attachment` VALUES ('299', '图片014.png', 'img1/20190225/5c7366bd35200.png', '1', '127610', '1', '1551066813', '1', null);
INSERT INTO `bestop_attachment` VALUES ('300', '图片013.png', 'abc1/20190226/5c74983c74fe0.png', '1', '220941', '0', '1551145020', '1', null);
INSERT INTO `bestop_attachment` VALUES ('301', '图片013.png', 'abc1/20190226/5c749855ecb80.png', '1', '220941', '0', '1551145045', '1', null);
INSERT INTO `bestop_attachment` VALUES ('302', '图片013.png', 'abc1/20190226/5c7498fe886d0.png', '1', '220941', '0', '1551145214', '1', null);
INSERT INTO `bestop_attachment` VALUES ('303', '图片015.png', 'img1/20190227/5c762da1c4cd4.png', '1', '241031', '1', '1551248802', '1', null);
INSERT INTO `bestop_attachment` VALUES ('304', '图片018.png', 'img1/20190301/5c7926fe1aaf4.png', '1', '492228', '1', '1551443710', '1', null);
INSERT INTO `bestop_attachment` VALUES ('305', '图片017.png', 'img1/20190301/5c79277c7a314.png', '1', '441322', '1', '1551443836', '1', null);
INSERT INTO `bestop_attachment` VALUES ('306', '图片017.png', 'img1/20190301/5c792a0256f04.png', '1', '91635', '1', '1551444482', '1', null);
INSERT INTO `bestop_attachment` VALUES ('307', '图片019.png', 'img1/20190301/5c792c2787474.png', '1', '392825', '1', '1551445032', '1', null);
INSERT INTO `bestop_attachment` VALUES ('308', '图片018.png', 'img1/20190301/5c792e02ef2f4.png', '1', '492228', '1', '1551445507', '1', null);
INSERT INTO `bestop_attachment` VALUES ('309', '图片017.png', 'img1/20190301/5c792ec50aab4.png', '1', '91635', '1', '1551445701', '1', null);
INSERT INTO `bestop_attachment` VALUES ('310', '图片019.png', 'abc1/20190301/5c792f4e7cbb4.png', '1', '392825', '0', '1551445838', '1', null);
INSERT INTO `bestop_attachment` VALUES ('311', '图片018.png', 'abc1/20190301/5c792f88030d4.png', '1', '492228', '0', '1551445896', '1', null);
INSERT INTO `bestop_attachment` VALUES ('312', '图片029.png', 'img1/20190305/5c7e128d22218.png', '1', '370422', '1', '1551766157', '1', null);
INSERT INTO `bestop_cart` VALUES ('93', 'cart', 'fixed', '1551502288', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '2', '108');
INSERT INTO `bestop_cart` VALUES ('87', 'buy', 'fixed', '1551277984', '42', '95', '吉宴五谷杂粮', '', 'img1/20190227/5c762da1c4cd4.png', '0.1', '10', '7');
INSERT INTO `bestop_cart` VALUES ('88', 'buy', 'fixed', '1551278035', '42', '95', '吉宴五谷杂粮', '', 'img1/20190227/5c762da1c4cd4.png', '0.1', '1', '7');
INSERT INTO `bestop_cart` VALUES ('92', 'cart', 'fixed', '1551446249', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '4');
INSERT INTO `bestop_cart` VALUES ('266', 'buy', 'fixed', '1551758107', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '23');
INSERT INTO `bestop_cart` VALUES ('94', 'buy', 'fixed', '1551502305', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '2', '108');
INSERT INTO `bestop_cart` VALUES ('95', 'buy', 'fixed', '1551507724', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '23');
INSERT INTO `bestop_cart` VALUES ('96', 'buy', 'fixed', '1551519747', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '328');
INSERT INTO `bestop_cart` VALUES ('174', 'buy', 'fixed', '1551706511', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '15', '538');
INSERT INTO `bestop_cart` VALUES ('99', 'buy', 'fixed', '1551659688', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '71');
INSERT INTO `bestop_cart` VALUES ('101', 'buy', 'fixed', '1551659810', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '15', '130');
INSERT INTO `bestop_cart` VALUES ('102', 'cart', 'fixed', '1551660861', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '6', '68');
INSERT INTO `bestop_cart` VALUES ('103', 'cart', 'fixed', '1551661981', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '3', '1213');
INSERT INTO `bestop_cart` VALUES ('104', 'buy', 'fixed', '1551661982', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '1120');
INSERT INTO `bestop_cart` VALUES ('105', 'buy', 'fixed', '1551661985', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '1249');
INSERT INTO `bestop_cart` VALUES ('106', 'cart', 'fixed', '1551661993', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '636');
INSERT INTO `bestop_cart` VALUES ('117', 'cart', 'fixed', '1551662281', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '30', '1215');
INSERT INTO `bestop_cart` VALUES ('108', 'cart', 'fixed', '1551661996', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '2', '1213');
INSERT INTO `bestop_cart` VALUES ('109', 'cart', 'fixed', '1551661997', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '1129');
INSERT INTO `bestop_cart` VALUES ('116', 'buy', 'fixed', '1551662022', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '1110');
INSERT INTO `bestop_cart` VALUES ('111', 'buy', 'fixed', '1551662003', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '2', '1213');
INSERT INTO `bestop_cart` VALUES ('112', 'cart', 'fixed', '1551662007', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '1227');
INSERT INTO `bestop_cart` VALUES ('113', 'buy', 'fixed', '1551662010', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '1196');
INSERT INTO `bestop_cart` VALUES ('114', 'buy', 'fixed', '1551662010', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '1227');
INSERT INTO `bestop_cart` VALUES ('115', 'buy', 'fixed', '1551662010', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '1147');
INSERT INTO `bestop_cart` VALUES ('118', 'cart', 'fixed', '1551662285', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '420');
INSERT INTO `bestop_cart` VALUES ('119', 'cart', 'fixed', '1551662295', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '420');
INSERT INTO `bestop_cart` VALUES ('326', 'buy', 'fixed', '1551835291', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '10', '1104');
INSERT INTO `bestop_cart` VALUES ('121', 'cart', 'fixed', '1551662316', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '109');
INSERT INTO `bestop_cart` VALUES ('123', 'buy', 'fixed', '1551662458', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '405');
INSERT INTO `bestop_cart` VALUES ('125', 'cart', 'fixed', '1551663217', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '57');
INSERT INTO `bestop_cart` VALUES ('128', 'cart', 'fixed', '1551663948', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '20', '1144');
INSERT INTO `bestop_cart` VALUES ('127', 'cart', 'fixed', '1551663394', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '216');
INSERT INTO `bestop_cart` VALUES ('129', 'cart', 'fixed', '1551663964', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '1143');
INSERT INTO `bestop_cart` VALUES ('152', 'cart', 'fixed', '1551668679', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '328');
INSERT INTO `bestop_cart` VALUES ('177', 'cart', 'fixed', '1551745488', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '134');
INSERT INTO `bestop_cart` VALUES ('146', 'cart', 'fixed', '1551664396', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '930');
INSERT INTO `bestop_cart` VALUES ('164', 'buy', 'fixed', '1551675030', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '10', '67');
INSERT INTO `bestop_cart` VALUES ('155', 'cart', 'fixed', '1551670911', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '637');
INSERT INTO `bestop_cart` VALUES ('162', 'cart', 'fixed', '1551672361', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '354');
INSERT INTO `bestop_cart` VALUES ('165', 'buy', 'fixed', '1551675215', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '67');
INSERT INTO `bestop_cart` VALUES ('211', 'buy', 'fixed', '1551747062', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '150');
INSERT INTO `bestop_cart` VALUES ('167', 'cart', 'fixed', '1551675295', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '15', '67');
INSERT INTO `bestop_cart` VALUES ('168', 'buy', 'fixed', '1551676603', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '3', '1286');
INSERT INTO `bestop_cart` VALUES ('214', 'buy', 'fixed', '1551747264', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '152');
INSERT INTO `bestop_cart` VALUES ('175', 'buy', 'fixed', '1551706671', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '538');
INSERT INTO `bestop_cart` VALUES ('300', 'buy', 'fixed', '1551798073', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '5', '778');
INSERT INTO `bestop_cart` VALUES ('217', 'cart', 'fixed', '1551749470', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '4', '1289');
INSERT INTO `bestop_cart` VALUES ('188', 'buy', 'fixed', '1551745710', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '25', '73');
INSERT INTO `bestop_cart` VALUES ('186', 'cart', 'fixed', '1551745653', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '73');
INSERT INTO `bestop_cart` VALUES ('190', 'cart', 'fixed', '1551745775', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '4', '573');
INSERT INTO `bestop_cart` VALUES ('207', 'buy', 'fixed', '1551746931', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '150');
INSERT INTO `bestop_cart` VALUES ('209', 'cart', 'fixed', '1551746983', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '4', '137');
INSERT INTO `bestop_cart` VALUES ('228', 'buy', 'fixed', '1551750880', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '90');
INSERT INTO `bestop_cart` VALUES ('219', 'buy', 'fixed', '1551749801', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '242');
INSERT INTO `bestop_cart` VALUES ('221', 'buy', 'fixed', '1551749962', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '176');
INSERT INTO `bestop_cart` VALUES ('224', 'cart', 'fixed', '1551750349', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '673');
INSERT INTO `bestop_cart` VALUES ('223', 'buy', 'fixed', '1551750291', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '176');
INSERT INTO `bestop_cart` VALUES ('227', 'cart', 'fixed', '1551750597', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '3', '1289');
INSERT INTO `bestop_cart` VALUES ('226', 'cart', 'fixed', '1551750475', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '15', '538');
INSERT INTO `bestop_cart` VALUES ('265', 'cart', 'fixed', '1551756152', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '3', '713');
INSERT INTO `bestop_cart` VALUES ('233', 'cart', 'fixed', '1551751048', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '2', '1073');
INSERT INTO `bestop_cart` VALUES ('289', 'cart', 'fixed', '1551771821', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '1237');
INSERT INTO `bestop_cart` VALUES ('236', 'cart', 'fixed', '1551751072', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '3', '1234');
INSERT INTO `bestop_cart` VALUES ('237', 'cart', 'fixed', '1551751095', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '4', '1242');
INSERT INTO `bestop_cart` VALUES ('238', 'buy', 'fixed', '1551751127', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '3', '778');
INSERT INTO `bestop_cart` VALUES ('250', 'cart', 'fixed', '1551751465', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '756');
INSERT INTO `bestop_cart` VALUES ('240', 'buy', 'fixed', '1551751158', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '778');
INSERT INTO `bestop_cart` VALUES ('242', 'cart', 'fixed', '1551751195', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '10', '1177');
INSERT INTO `bestop_cart` VALUES ('256', 'cart', 'fixed', '1551752246', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '2', '1084');
INSERT INTO `bestop_cart` VALUES ('245', 'buy', 'fixed', '1551751256', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '1177');
INSERT INTO `bestop_cart` VALUES ('246', 'cart', 'fixed', '1551751282', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '15', '48');
INSERT INTO `bestop_cart` VALUES ('254', 'buy', 'fixed', '1551752179', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '1291');
INSERT INTO `bestop_cart` VALUES ('259', 'cart', 'fixed', '1551752454', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '1290');
INSERT INTO `bestop_cart` VALUES ('258', 'cart', 'fixed', '1551752275', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '1291');
INSERT INTO `bestop_cart` VALUES ('277', 'cart', 'fixed', '1551768802', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '1027');
INSERT INTO `bestop_cart` VALUES ('269', 'buy', 'fixed', '1551766887', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '994');
INSERT INTO `bestop_cart` VALUES ('274', 'cart', 'fixed', '1551767764', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '4', '994');
INSERT INTO `bestop_cart` VALUES ('271', 'cart', 'fixed', '1551766929', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '1040');
INSERT INTO `bestop_cart` VALUES ('344', 'cart', 'fixed', '1551836620', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '15');
INSERT INTO `bestop_cart` VALUES ('278', 'buy', 'fixed', '1551768827', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '1027');
INSERT INTO `bestop_cart` VALUES ('279', 'buy', 'fixed', '1551768964', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '1', '1027');
INSERT INTO `bestop_cart` VALUES ('301', 'buy', 'fixed', '1551798334', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '778');
INSERT INTO `bestop_cart` VALUES ('281', 'cart', 'fixed', '1551768993', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '1037');
INSERT INTO `bestop_cart` VALUES ('291', 'cart', 'fixed', '1551771955', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '3', '1230');
INSERT INTO `bestop_cart` VALUES ('302', 'buy', 'fixed', '1551798571', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '5', '778');
INSERT INTO `bestop_cart` VALUES ('303', 'buy', 'fixed', '1551798621', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '778');
INSERT INTO `bestop_cart` VALUES ('307', 'buy', 'fixed', '1551831294', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '566');
INSERT INTO `bestop_cart` VALUES ('313', 'buy', 'fixed', '1551832743', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '10', '207');
INSERT INTO `bestop_cart` VALUES ('314', 'buy', 'fixed', '1551832973', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '1', '107');
INSERT INTO `bestop_cart` VALUES ('320', 'cart', 'fixed', '1551833405', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '3', '922');
INSERT INTO `bestop_cart` VALUES ('321', 'cart', 'fixed', '1551834041', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '2', '922');
INSERT INTO `bestop_cart` VALUES ('325', 'cart', 'fixed', '1551835141', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '1152');
INSERT INTO `bestop_cart` VALUES ('364', 'buy', 'fixed', '1551842332', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '423');
INSERT INTO `bestop_cart` VALUES ('330', 'cart', 'fixed', '1551835417', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '3', '887');
INSERT INTO `bestop_cart` VALUES ('332', 'cart', 'fixed', '1551835446', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '4', '887');
INSERT INTO `bestop_cart` VALUES ('337', 'cart', 'fixed', '1551835747', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '940');
INSERT INTO `bestop_cart` VALUES ('345', 'cart', 'fixed', '1551836631', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '20', '15');
INSERT INTO `bestop_cart` VALUES ('341', 'cart', 'fixed', '1551835988', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '10', '38');
INSERT INTO `bestop_cart` VALUES ('342', 'buy', 'fixed', '1551836000', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '10', '38');
INSERT INTO `bestop_cart` VALUES ('347', 'cart', 'fixed', '1551837016', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '4', '1035');
INSERT INTO `bestop_cart` VALUES ('348', 'cart', 'fixed', '1551837044', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '15', '34');
INSERT INTO `bestop_cart` VALUES ('384', 'cart', 'fixed', '1551854597', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '5', '869');
INSERT INTO `bestop_cart` VALUES ('350', 'cart', 'fixed', '1551837064', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '1185');
INSERT INTO `bestop_cart` VALUES ('351', 'cart', 'fixed', '1551837080', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '1185');
INSERT INTO `bestop_cart` VALUES ('352', 'buy', 'fixed', '1551837090', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '4', '1035');
INSERT INTO `bestop_cart` VALUES ('357', 'cart', 'fixed', '1551838061', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '2', '787');
INSERT INTO `bestop_cart` VALUES ('362', 'cart', 'fixed', '1551840083', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '957');
INSERT INTO `bestop_cart` VALUES ('382', 'cart', 'fixed', '1551852244', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '1212');
INSERT INTO `bestop_cart` VALUES ('373', 'cart', 'fixed', '1551846466', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '5', '1033');
INSERT INTO `bestop_cart` VALUES ('374', 'buy', 'fixed', '1551846477', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '5', '1033');
INSERT INTO `bestop_cart` VALUES ('390', 'buy', 'fixed', '1551863476', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '242');
INSERT INTO `bestop_cart` VALUES ('376', 'cart', 'fixed', '1551846617', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '5', '947');
INSERT INTO `bestop_cart` VALUES ('391', 'cart', 'fixed', '1551863541', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '10', '1058');
INSERT INTO `bestop_cart` VALUES ('393', 'buy', 'fixed', '1551865648', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '5', '222');
INSERT INTO `bestop_cart` VALUES ('395', 'buy', 'fixed', '1551865711', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '2', '222');
INSERT INTO `bestop_cart` VALUES ('407', 'cart', 'fixed', '1551878286', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '362');
INSERT INTO `bestop_cart` VALUES ('398', 'cart', 'fixed', '1551870425', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '83');
INSERT INTO `bestop_cart` VALUES ('402', 'buy', 'fixed', '1551875990', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '1', '992');
INSERT INTO `bestop_cart` VALUES ('404', 'buy', 'fixed', '1551876143', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '3', '992');
INSERT INTO `bestop_cart` VALUES ('412', 'buy', 'fixed', '1552008953', '43', '96', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '1', '4');
INSERT INTO `bestop_cart` VALUES ('410', 'cart', 'fixed', '1551881855', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '5', '53');
INSERT INTO `bestop_cart` VALUES ('411', 'cart', 'fixed', '1551881917', '44', '97', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '5', '53');
INSERT INTO `bestop_cart` VALUES ('415', 'buy', 'fixed', '1552031266', '47', '100', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '1', '266');
INSERT INTO `bestop_category` VALUES ('9', '帮助中心', 'bangzhuzhongxin', '', '', '7', '1', '0', '', '', '', null, 'List_article.html', 'Show_article.html', null, '1', '1');
INSERT INTO `bestop_category` VALUES ('8', '商城公告', 'shangchenggonggao', '', '', '7', '1', '0', '', '', '', null, 'List_article.html', 'Show_article.html', null, '1', '1');
INSERT INTO `bestop_category` VALUES ('7', '文章列表', 'wenzhangliebiao', '', '', '0', '1', '0', '', '', '', null, 'List_article.html', 'Show_article.html', null, '1', '1');
INSERT INTO `bestop_config` VALUES ('1', 'CFG_WEBNAME', '网站名称', '', '', '2', '1', '保礼街', '0');
INSERT INTO `bestop_config` VALUES ('3', 'CFG_WEBTITLE', '网站标题', '站点首页title(SEO)的设置', '', '2', '1', '', '0');
INSERT INTO `bestop_config` VALUES ('4', 'CFG_KEYWORDS', '站点关键词', '', '', '2', '1', '保礼街', '0');
INSERT INTO `bestop_config` VALUES ('5', 'CFG_DESCRIPTION', '站点描述', '', '', '3', '1', '保礼街', '0');
INSERT INTO `bestop_config` VALUES ('6', 'CFG_THEMESTYLE', '模板风格', '', 'select', '2', '1', 'default', '0');
INSERT INTO `bestop_config` VALUES ('7', 'CFG_COOKIE_ENCODE', 'cookie加密码', '', '', '2', '1', 'rDiFShjcP', '0');
INSERT INTO `bestop_config` VALUES ('8', 'CFG_POWERBY', '网站版权信息', '', '', '3', '1', '保礼街版权所有', '0');
INSERT INTO `bestop_config` VALUES ('9', 'CFG_BEIAN', '网站备案号', '', '', '2', '1', '', '0');
INSERT INTO `bestop_config` VALUES ('10', 'CFG_STATS', 'PC商桥', '', '', '3', '1', '', '0');
INSERT INTO `bestop_config` VALUES ('13', 'CFG_WEBSITE_CLOSE', '关闭网站', '', '', '4', '2', '0', '0');
INSERT INTO `bestop_config` VALUES ('14', 'CFG_WEBSITE_CLOSE_INFO', '关站提示', '', '', '3', '2', '站点维护中，请稍等一会...', '0');
INSERT INTO `bestop_config` VALUES ('15', 'CFG_MOBILE_AUTO', '手机版开启', '', '', '4', '2', '1', '1');
INSERT INTO `bestop_config` VALUES ('16', 'CFG_EMAIL_FROM', '发件邮箱地址', '', '', '2', '3', '', '0');
INSERT INTO `bestop_config` VALUES ('17', 'CFG_EMAIL_FROM_NAME', '发件人名称', '', '', '2', '3', '', '0');
INSERT INTO `bestop_config` VALUES ('18', 'CFG_EMAIL_HOST', 'STMP服务器', '', '', '2', '3', '', '0');
INSERT INTO `bestop_config` VALUES ('19', 'CFG_EMAIL_PORT', '服务器端口', '', '', '1', '3', '0', '0');
INSERT INTO `bestop_config` VALUES ('20', 'CFG_EMAIL_LOGINNAME', '邮箱帐号', '', '', '2', '3', '', '0');
INSERT INTO `bestop_config` VALUES ('21', 'CFG_EMAIL_PASSWORD', '邮箱密码', '', '', '2', '3', '', '0');
INSERT INTO `bestop_config` VALUES ('22', 'CFG_BADWORD', '禁用词语', '', '', '3', '2', '艾滋病|中国共产党', '0');
INSERT INTO `bestop_config` VALUES ('23', 'CFG_FEEDBACK_GUEST', '允许匿名评论', '', '', '4', '2', '1', '0');
INSERT INTO `bestop_config` VALUES ('24', 'CFG_MEMBER_OPEN', '开启会员功能', '', '', '4', '5', '0', '0');
INSERT INTO `bestop_config` VALUES ('25', 'CFG_MEMBER_VERIFYEMAIL', ' 开启邮件验证', '', '', '4', '5', '0', '0');
INSERT INTO `bestop_config` VALUES ('26', 'CFG_MEMBER_NOTALLOW', '禁止使用的昵称', '', '', '3', '5', 'www,bbs,ftp,mail,user,users,admin,administrator', '0');
INSERT INTO `bestop_config` VALUES ('27', 'CFG_UPLOAD_MAXSIZE', '允许上传大小', 'KB', '', '0', '0', '2048', '0');
INSERT INTO `bestop_config` VALUES ('28', 'CFG_IMGTHUMB_SIZE', '缩略图组尺寸', '', '', '0', '0', '', '0');
INSERT INTO `bestop_config` VALUES ('29', 'CFG_IMGTHUMB_TYPE', '缩略图生成方式', '固定大小截取 ,原图等比例缩略', 'radio\r\n0|原图等比例缩略\r\n1|固定大小截取', '0', '0', '1', '0');
INSERT INTO `bestop_config` VALUES ('30', 'CFG_IMGTHUMB_WIDTH', '固宽缩略图组长度', '固定宽度等比缩略,如60,50', '', '0', '0', '480,360', '0');
INSERT INTO `bestop_config` VALUES ('31', 'CFG_UPLOAD_ROOTPATH', '上传根目录', '', '', '0', '0', './uploads/', '0');
INSERT INTO `bestop_config` VALUES ('32', 'CFG_UPLOAD_FILE_EXT', '允许附件类型', '', '', '0', '0', 'jpg,gif,png,jpeg,txt,doc,docx,xls,ppt,zip,rar,mp3', '0');
INSERT INTO `bestop_config` VALUES ('33', 'CFG_UPLOAD_IMG_EXT', '允许图片类型', '带缩略图的图片', '', '0', '0', 'jpg,gif,png,jpeg', '0');
INSERT INTO `bestop_config` VALUES ('34', 'CFG_VERIFY_REGISTER', '开启注册验证码', '', '', '4', '2', '0', '0');
INSERT INTO `bestop_config` VALUES ('35', 'CFG_VERIFY_LOGIN', '开启登录验证码', '', '', '4', '2', '0', '0');
INSERT INTO `bestop_config` VALUES ('36', 'CFG_VERIFY_GUESTBOOK', '开启留言板验证码', '', '', '4', '2', '0', '0');
INSERT INTO `bestop_config` VALUES ('37', 'CFG_VERIFY_REVIEW', '开启评论验证码', '', '', '4', '2', '1', '0');
INSERT INTO `bestop_config` VALUES ('38', 'CFG_SQL_FILESIZE', 'sql文件大小', '备份数据库，值不可太大，否则会导致内存溢出备份、恢复失败，合理大小在512K~10M间，建议3M一卷。单位字节,5M=5*1024*1024=5242880', '', '1', '0', '5242880', '0');
INSERT INTO `bestop_config` VALUES ('39', 'CFG_DOWNLOAD_HIDE', '隐藏下载地址', '', '', '0', '0', '0', '0');
INSERT INTO `bestop_config` VALUES ('40', 'CFG_MOBILE_THEMESTYLE', '手机模板风格', '', 'select', '2', '2', 'default', '1');
INSERT INTO `bestop_config` VALUES ('41', 'CFG_WAPSQ', '手机商桥', '', '', '3', '1', '', '0');
INSERT INTO `bestop_config` VALUES ('42', 'CFG_WATER_MARK', '水印位置', '', 'radio\n0|中间\n1|左上\n2|右上\n3|右下\n4|左下\n5|顶中\n6|右中\n7|底中\n8|左中', '0', '0', '9', '0');
INSERT INTO `bestop_config` VALUES ('43', 'CFG_WATER_TEXT', '水印文字', '', '', '0', '0', 'bestop', '0');
INSERT INTO `bestop_config` VALUES ('44', 'CFG_WATER_SIZE', '水印文字大小', '', '', '0', '0', '16', '0');
INSERT INTO `bestop_config` VALUES ('45', 'CFG_WATER_COLOR', '水印字体颜色', '', 'select\n#FFFFFF|白色\n#000000|黑色\n#FF0000|红色\n', '0', '0', '#FFFFFF', '0');
INSERT INTO `bestop_config` VALUES ('46', 'CFG_WATER_IF', '是否添加水印', '', '', '0', '0', '0', '0');
INSERT INTO `bestop_config` VALUES ('47', 'CFG_WATER_TYPE', '选择水印类型', '', '', '0', '0', '1', '0');
INSERT INTO `bestop_config` VALUES ('48', 'CFG_WATER_IMG', '水印图片', '', '', '0', '0', 'img1/20151123/5652b26741b82.png', '0');
INSERT INTO `bestop_config` VALUES ('49', 'CFG_PRODUCT_THUMB', '产品缩略图大小', '', '', '0', '0', '480,360', '0');
INSERT INTO `bestop_config` VALUES ('50', 'CFG_CASE_THUMB', '案例缩略图大小', '', '', '0', '0', '480,360', '0');
INSERT INTO `bestop_config` VALUES ('51', 'CFG_NEWS_THUMB', '新闻缩略图大小', '', '', '0', '0', '480,360', '0');
INSERT INTO `bestop_config` VALUES ('52', 'CFG_PRODUCT_TYPE', '产品缩略图生成方式', '', '', '0', '0', '1', '0');
INSERT INTO `bestop_config` VALUES ('53', 'CFG_CASE_TYPE', '案例缩略图生成方式', '', '', '0', '0', '1', '0');
INSERT INTO `bestop_config` VALUES ('54', 'CFG_NEWS_TYPE', '新闻缩略图生成方式', '', '', '0', '0', '1', '0');
INSERT INTO `bestop_config` VALUES ('55', 'CFG_DEFAULT_THUMB', '默认缩略图大小', '', '', '0', '0', '480,360', '0');
INSERT INTO `bestop_config` VALUES ('56', 'CFG_WEIXIN_APPID', '微信appid', '', '', '2', '6', 'wxb3f8ef628c1ea803', '0');
INSERT INTO `bestop_config` VALUES ('57', 'CFG_WEIXIN_APPSECRET', '微信appsecret', '', '', '2', '6', 'd4a045bd42cba166666a815e99074e59', '0');
INSERT INTO `bestop_config` VALUES ('58', 'CFG_WEIXIN_SHANGHUHAO', '商户号', '', '', '2', '6', '1525619611', '0');
INSERT INTO `bestop_config` VALUES ('59', 'CFG_WEIXIN_SHANGHUMIYAO', '商户密钥', '', '', '2', '6', 'ee5d81983cad510957b77e8de8255ad4', '0');
INSERT INTO `bestop_config` VALUES ('60', 'MSG_ADD_TYPE', null, null, null, null, null, 'a:1:{i:0;a:2:{s:4:\"name\";s:18:\"用户扫码反馈\";s:5:\"value\";s:1:\"1\";}}', null);
INSERT INTO `bestop_event` VALUES ('2', '2323', '<p>是多少6<img src=\"/ueditor/php/upload/image/20190329/1553828977501879.jpg\" title=\"1553828977501879.jpg\" alt=\"t012c852c8f981d6a00.jpg\"/></p>', '1553961600', '1553961600', '1553828058', '$$$52$$$53$$$55$$$', 'a:3:{i:52;a:2:{s:2:\"id\";s:2:\"52\";s:4:\"name\";s:9:\"营业部\";}i:53;a:2:{s:2:\"id\";s:2:\"53\";s:4:\"name\";s:15:\"银保营业部\";}i:55;a:2:{s:2:\"id\";s:2:\"55\";s:4:\"name\";s:6:\"雄鹰\";}}', '977二位翁', 'admin', '1');
INSERT INTO `bestop_event` VALUES ('4', '232323', '', null, null, '1554106833', '', '', '232', 'admin', '1');
INSERT INTO `bestop_event` VALUES ('3', '1212', '', '1553011200', '1576771200', '1553844123', '', '', '', '18352527315', '1');
INSERT INTO `bestop_event_info` VALUES ('1', '2', '121212', '15152231721', '1553840421', '1', '陈珊珊', '55', '雄鹰', '江苏', '无锡', '国寿惠山支公司');
INSERT INTO `bestop_event_info` VALUES ('2', '2', '3323', '15152231722', '1553840462', '1', '陈珊珊', '55', '雄鹰', '江苏', '无锡', '国寿惠山支公司');
INSERT INTO `bestop_event_info` VALUES ('3', '3', '测试', '15215121212', '1553846653', '1239', '张姗姗', '57', '天一', '江苏', '无锡', '国寿惠山支公司');
INSERT INTO `bestop_itemgroup` VALUES ('1', 'flagtype', '文档属性', '0');
INSERT INTO `bestop_itemgroup` VALUES ('2', 'blocktype', '自由块类别', '0');
INSERT INTO `bestop_itemgroup` VALUES ('3', 'softtype', '软件类型', '0');
INSERT INTO `bestop_itemgroup` VALUES ('4', 'softlanguage', '软件语言', '0');
INSERT INTO `bestop_itemgroup` VALUES ('5', 'star', '星座', '0');
INSERT INTO `bestop_itemgroup` VALUES ('6', 'animal', '生肖', '0');
INSERT INTO `bestop_itemgroup` VALUES ('7', 'education', '教育程度', '0');
INSERT INTO `bestop_itemgroup` VALUES ('8', 'configgroup', '配置分组', '0');
INSERT INTO `bestop_itemgroup` VALUES ('9', 'configtype', '配置变量类型', '0');
INSERT INTO `bestop_iteminfo` VALUES ('1', '图片', 'flagtype', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('2', '头条', 'flagtype1', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('3', '推荐', 'flagtype', '4', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('4', '特荐', 'flagtype', '8', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('5', '幻灯', 'flagtype1', '16', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('6', '跳转', 'flagtype', '32', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('7', '其他', 'flagtype1', '64', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('8', '文字', 'blocktype', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('9', '图片', 'blocktype', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('10', '丰富', 'blocktype', '3', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('11', '国产', 'softtype', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('12', '中文版', 'softlanguage', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('13', '英文版', 'softlanguage', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('14', '多语言版', 'softlanguage', '3', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('15', '白羊座', 'star', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('16', '金牛座', 'star', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('17', '双子座', 'star', '3', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('18', '巨蟹座', 'star', '4', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('19', '狮子座', 'star', '5', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('20', '处女座', 'star', '6', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('21', '天枰座', 'star', '7', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('22', '天蝎座', 'star', '8', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('23', '射手座', 'star', '9', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('24', '摩羯座', 'star', '10', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('25', '水瓶座', 'star', '11', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('26', '双鱼座', 'star', '12', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('27', '鼠', 'animal', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('28', '牛', 'animal', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('29', '虎', 'animal', '3', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('30', '兔', 'animal', '4', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('31', '龙', 'animal', '5', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('32', '蛇', 'animal', '6', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('33', '马', 'animal', '7', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('34', '羊', 'animal', '8', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('35', '猴', 'animal', '9', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('36', '鸡', 'animal', '10', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('37', '狗', 'animal', '11', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('38', '猪', 'animal', '12', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('39', '小学', 'education', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('40', '初中', 'education', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('41', '高中/中专', 'education', '3', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('42', '大学专科', 'education', '4', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('43', '大学本科', 'education', '5', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('44', '硕士', 'education', '6', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('45', '博士以上', 'education', '7', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('46', '站点配置', 'configgroup', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('47', '核心配置', 'configgroup', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('48', '邮箱配置', 'configgroup', '3', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('50', '会员配置', 'configgroup', '5', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('51', '微信配置', 'configgroup', '6', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('52', '数字', 'configtype', '1', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('53', '字符', 'configtype', '2', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('54', '文本', 'configtype', '3', '0', '0');
INSERT INTO `bestop_iteminfo` VALUES ('55', '布尔(真假)', 'configtype', '4', '0', '0');
INSERT INTO `bestop_member` VALUES ('1', null, 'fda0e2a85f302a08c83a20333b4b284f', 'Hspf1M', '陈珊珊', '1550895187', '1554106189', '127.0.0.1', null, null, '0', '15152231721', null, '73', '55555555555', '6666666666', '江苏', '无锡', '国寿惠山支公司', null, '5', 'oK_961LGY0pIZLsGmyiAbb1TZA0U');
INSERT INTO `bestop_member` VALUES ('2', null, '66b8d16a519726df7f2b281abc0d4d15', 'ewBpab', '赵连英', '1550900292', '1551672859', '192.168.23.1', null, null, '0', '13771176711', null, '52', '1234', '1234', '江苏', '南京', '国寿高淳支公司', null, '2', 'oK_961K5_xSXhsrGsbfpbWYfGuQ0');
INSERT INTO `bestop_member` VALUES ('3', null, '60a5cd21faf2a7461b9cd6937ddd4e1d', 'qxFzvE', '王二', '1550901208', '1550901208', '192.168.23.1', null, null, '1', '13771158061', null, '48', '1234', '1234', '江苏', '无锡', '梁溪区', null, '1', 'oK_961GLc5uj281QS9pc8uNyukSM');
INSERT INTO `bestop_member` VALUES ('5', null, '2ba0679fd43b36476880e85da9be52b6', 'AqNVx1', '王俊超', '1551079840', '1551453499', '192.168.23.1', null, null, '0', '15052207973', null, '57', '32020661007', '32110250000000', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961B9d_yG8eYeEF3zKEcCA2Ts');
INSERT INTO `bestop_member` VALUES ('4', null, '3bf673806568899fa56b201b34d69bcb', '74na9Z', '谭立东', '1550902544', '1552027606', '192.168.23.1', null, null, '0', '13861752112', null, '52', '32020158800', '00000000000000', '江苏', '南京', '国寿高淳支公司', null, '4', 'oK_961JvyKspDa9obgx2CQ8jxSHs');
INSERT INTO `bestop_member` VALUES ('6', null, '4f0e6acd75bd74313a4a3447f71992db', 'hBdxk9', '杨明华', '1551160410', '1551160410', '192.168.23.1', null, null, '0', '18652005157', null, '53', '0000001', '0000001', '江苏', '南京', '国寿南京银保营业部', null, null, 'oK_961Jxmj0pZaENTDyg8jEcNZzo');
INSERT INTO `bestop_member` VALUES ('7', null, '745dd5b762bf2fbf85f6218459c9b06e', '7iiwW7', '保礼街', '1551248139', '1551277936', '192.168.23.1', null, null, '1', '13345678900', null, '51', '00000000', '000000000', '北京', '北京', '朝阳区', null, '1', 'oK_961K5_xSXhsrGsbfpbWYfGuQ0');
INSERT INTO `bestop_member` VALUES ('8', null, '6668b7f40c0e5c03e02d7e226b5f7bbc', 'hppbnq', '李伯荣', '1551340818', null, null, null, null, '0', '13861847798', null, '60', '32020601002', '32020688001453', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('9', null, 'ec2f953459b6ca89982832dd3bd83e91', 'U2nEqy', '吴静红', '1551340818', null, null, null, null, '0', '15895311432', null, '60', '32020601002', '32020688001580', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('10', null, '2633e2a83297adf928896a17a15bc5f2', 'd7yRJh', '孙菊萍', '1551340818', null, null, null, null, '0', '13812089317', null, '55', '32020601001', '32020688002020', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('11', null, 'f8265ab2bc64fd9930c774f532160469', 'pj1NBr', '刘小敏', '1551340818', null, null, null, null, '0', '13616180121', null, '55', '32020601001', '32020688002214', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('12', null, 'd2d0cad56c8a08990a0faf101e722a18', 'MByhlN', '张文仙', '1551340818', '1551919135', '192.168.23.1', null, null, '0', '13511653639', null, '55', '32020601001', '32020688000687', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961BHfW91buHroy0wpyFfO_xQ');
INSERT INTO `bestop_member` VALUES ('13', null, '2f61d8f9ba58fff0418c0dc883aad3e9', 'bcBwtN', '赵贵美', '1551340818', null, null, null, null, '0', '13861753091', null, '55', '32020601001', '32020688010866', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('14', null, '7d07a747aad311d8a46af655e9758de7', '8GKqwV', '陆琴秀', '1551340818', null, null, null, null, '0', '13915266090', null, '55', '32020601001', '32020688001616', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('15', null, 'e5a6ded62bba0627e8186c0238c98f45', 'gUiBN5', '陈琴萍', '1551340818', '1551832656', '192.168.23.1', null, null, '0', '13812186562', null, '55', '32020601212', '32020688000898', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961J2hGYSDuz3temKPjEbPZJY');
INSERT INTO `bestop_member` VALUES ('16', null, 'aa545f12c87112b310e1c1f95e73f065', 'XEjIQK', '徐敏', '1551340818', '1551749681', '192.168.23.1', null, null, '0', '13861732703', null, '64', '32020601015', '32020688010631', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961H3t1HEfoQYSNAGGTLBvKWs');
INSERT INTO `bestop_member` VALUES ('17', null, 'faa9b86cf52c89fc2618a59193269d62', '2tCwgz', '吕蓉', '1551340818', '1551835320', '192.168.23.1', null, null, '0', '13961820552', null, '64', '32020601015', '32020688002475', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961DODredffj9nTQtxQyp65M0');
INSERT INTO `bestop_member` VALUES ('18', null, 'ffde90d7b7a5c0ed68bef09f9d39aaa8', 'zhXIYv', '陈建凤', '1551340818', '1551749727', '192.168.23.1', null, null, '0', '13861805318', null, '64', '32020601015', '32020688000906', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961JJJP8XvMYXSlSs4TIgLOdQ');
INSERT INTO `bestop_member` VALUES ('19', null, '574e69cd6575c571673fdf526e9201c0', 'zi9CMA', '吕银凤', '1551340818', '1552014047', '192.168.23.1', null, null, '0', '13771506265', null, '62', '32020601029', '32020688002396', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961MJjiKMQF1EgI28ErE7wwUo');
INSERT INTO `bestop_member` VALUES ('20', null, '32a44fbc740e07336b2757358b5e75a0', 'iS1yG5', '丁晔瑾', '1551340818', null, null, null, null, '0', '18921527067', null, '56', '32020601005', '32020688012184', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('21', null, '17ae53c78f2716420fb562a30bf26a40', '1yTXut', '孙红娣', '1551340818', null, null, null, null, '0', '15861685890', null, '60', '32020601002', '32020688200017', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('22', null, '332ad34968c99ef2da86431447423c48', 'Z2Rpr4', '朱颖颖', '1551340818', null, null, null, null, '0', '15961777705', null, '60', '32020601107', '32020688011206', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('23', null, '5425293232159472fe950142be6d7f77', 'kkEkJp', '唐云芬', '1551340818', '1551757972', '192.168.23.1', null, null, '0', '15961841680', null, '56', '32020601169', '32020688011548', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961NL4HMxdFvFFUGwBAYib-ao');
INSERT INTO `bestop_member` VALUES ('24', null, '91d9ec50602f3cb3ebf3d743331fd8c9', 'vHuNUZ', '诸剑英', '1551340818', '1551830968', '192.168.23.1', null, null, '0', '13812286815', null, '56', '32020601005', '32020688001187', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961Dp_eFF8Fbi4_XEay00SeDU');
INSERT INTO `bestop_member` VALUES ('25', null, '3f2ced1c11e954a7453dba30a91ddbce', 'u3pTk8', '冯海燕', '1551340818', '1551507617', '192.168.23.1', null, null, '0', '13961702502', null, '56', '32020601005', '32020688000669', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961CDspH0cusKaduCPjPh3ryQ');
INSERT INTO `bestop_member` VALUES ('26', null, 'ca482713b20ae5154b8a796f05744d63', 'Gl4Anb', '孙晓敏', '1551340818', null, null, null, null, '0', '13665184492', null, '56', '32020601005', '32020688012931', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('27', null, '010db17ef38670d4940e21b56cb284d6', 'nD6QNJ', '李爱琴', '1551340818', null, null, null, null, '0', '15052108483', null, '60', '32020601002', '32020688001495', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('28', null, '6b6f44c600d152c59b7bb4c6032b081b', 'TXJn9r', '徐爱娣', '1551340818', null, null, null, null, '0', '13914152630', null, '60', '32020601224', '32020688001870', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('29', null, '882219319af25fc504888750e199b5b0', 'sFARXq', '丁建华', '1551340818', null, null, null, null, '0', '13952463559', null, '60', '32020601002', '32020688001810', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('30', null, 'a00af82bcdda9aa4ca90f6fd6cf6b3df', 'gV3jIF', '许庆', '1551340818', null, null, null, null, '0', '13093012345', null, '60', '32020601002', '32020688000046', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('31', null, '44dd8955a35f3c858393a6af718a54a4', '8KFP7x', '陈惠新', '1551340818', '1551832773', '192.168.23.1', null, null, '0', '13771576612', null, '55', '32020601011', '32020688001121', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961NfSvwCVvisRiMiB99k4H7Q');
INSERT INTO `bestop_member` VALUES ('32', null, 'b9fb3fcc1165326c2f1064146086cd33', 'JH4Yra', '钱秀亚', '1551340818', '1551871370', '192.168.23.1', null, null, '0', '18915332931', null, '55', '32020601011', '32020688000915', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961N5-E68aRatoGgP0GpE3ODg');
INSERT INTO `bestop_member` VALUES ('33', null, '6b5e920f5dfbee0915804992e44ab345', 'M267Ey', '唐丽亚', '1551340818', '1552367721', '192.168.23.1', null, null, '0', '15852543058', null, '55', '32020601076', '32020688011512', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961BC4k0xfxXsduCzweBW8q2E');
INSERT INTO `bestop_member` VALUES ('34', null, '5a288995d2568dc7aedd2ad78531a39c', 'Ys4Ygr', '虞红', '1551340818', '1551836944', '192.168.23.1', null, null, '0', '13063676824', null, '55', '32020601112', '32020688001964', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961PzjTX-FAX3wbu5uK65fG0k');
INSERT INTO `bestop_member` VALUES ('35', null, '20b0407d59ab20c5db0c0a821fe94517', 'wPDJLJ', '陈志强', '1551340818', null, null, null, null, '0', '13656170700', null, '55', '32020601011', '32020688200045', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('36', null, 'f3f78bea5dcbde0275b9986af85984d8', 'vvGrtE', '汤玉萍', '1551340818', '1551832663', '192.168.23.1', null, null, '0', '13771532922', null, '55', '32020601012', '32020688012109', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LUnMLGlz33MOCAfW5TW3VQ');
INSERT INTO `bestop_member` VALUES ('37', null, '7d6130677eaa4f48de813fc336eda1fb', 'f4eBkh', '曹勇毅', '1551340818', null, null, null, null, '0', '13961726893', null, '55', '32020601012', '32020688013075', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('38', null, '9d2ab7b4e79b16b1d2e141038fb104fa', '7cBgDv', '孙亚敏', '1551340818', '1551871341', '192.168.23.1', null, null, '0', '13915281195', null, '55', '32020601012', '32020688002347', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961C6BO_N_Zd9MRYqpBjV6ur0');
INSERT INTO `bestop_member` VALUES ('39', null, 'a89189f5aaf947b052c9bcdd2f543c85', 'rwaWvv', '边末珍', '1551340818', '1551838770', '192.168.23.1', null, null, '0', '13961892528', null, '55', '32020601023', '32020688000839', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961BtXNcaS14yFlNAIvks0xTw');
INSERT INTO `bestop_member` VALUES ('40', null, '297773a171a38e8c44940462b3500bc9', 'Jqvb3e', '陈芙红', '1551340818', null, null, null, null, '0', '13912365262', null, '55', '32020601023', '32020688001718', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('41', null, '4d48a77989d1a40ba2077ebcbce0100f', 'EtInEp', '姚玉琴', '1551340818', '1551832800', '192.168.23.1', null, null, '0', '13961797569', null, '55', '32020601023', '32020688011854', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961DeMlUyAVHUX-H-qROw8Wxg');
INSERT INTO `bestop_member` VALUES ('42', null, '27f86c8bd6711ec0fdaf2aa79afedd73', 'GD3gSb', '钱洁', '1551340818', null, null, null, null, '0', '13921295616', null, '55', '32020601023', '32020688200162', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('43', null, '65a7fc79f4b57a340784e55c670c987c', '7eQDfH', '吴佩玲', '1551340818', null, null, null, null, '0', '13771021615', null, '55', '32020601023', '32020688001037', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('44', null, 'c84f75298ff0a744d5b7e209f43cee24', 'bGnhC4', '席美娟', '1551340818', '1551749751', '192.168.23.1', null, null, '0', '13961895986', null, '64', '32020601009', '32020688000709', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961Inzo0suV00OPkh_r1OTLCI');
INSERT INTO `bestop_member` VALUES ('45', null, '09f9311ee143f504fc9433ab9d123dd8', 'bYxsc3', '张淼', '1551340818', null, null, null, null, '0', '13951585234', null, '64', '32020601009', '32020688009545', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('46', null, 'f7d36c22c94b2648dcd33b4103fce6d3', 'Zyi1sM', '管一华', '1551340818', null, null, null, null, '0', '13151016015', null, '64', '32020601010', '32020688012011', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('47', null, 'd9667060eec098dd336c00bea261bbb6', 'lbxvuA', '顾惠明', '1551340818', null, null, null, null, '0', '13961892565', null, '64', '32020601010', '32020688200076', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('48', null, 'bcf07adab6d56d9cd144ab96a73cc3fd', 'hWLu95', '沈学凤', '1551340818', '1551866751', '192.168.23.1', null, null, '0', '13812545162', null, '64', '32020601010', '32020688002271', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961OtK-ooxlli9AjNLWubYMbg');
INSERT INTO `bestop_member` VALUES ('49', null, '6c776048ae5cddda26ce134b70930851', 'h67687', '冯丹', '1551340818', '1551749662', '192.168.23.1', null, null, '0', '13057202598', null, '64', '32020601010', '32020688001124', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961B7W6VlKLgd1KeN4y8xjAlE');
INSERT INTO `bestop_member` VALUES ('50', null, '46e327f3df47c6d6ad042c596882c616', 'WalnC7', '许兰平', '1551340818', null, null, null, null, '0', '13616195874', null, '55', '32020601024', '32020688009151', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('51', null, '6413a1c991de86ce07738c4563cb39f4', 'cmzAI6', '刘华英', '1551340818', null, null, null, null, '0', '13861885386', null, '55', '32020601024', '32020688001282', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('52', null, '02737894b06723da7dea13b04284a0e5', 'mqv5FS', '顾敏敏', '1551340818', '1551832690', '192.168.23.1', null, null, '0', '15961741150', null, '55', '32020601012', '32020688011248', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961PjDOvywQpXJEUhkvZEZtR0');
INSERT INTO `bestop_member` VALUES ('53', null, '17a06fd880323bfd79932d4893c9048c', '9qpkTy', '龚静红', '1551340818', '1551881680', '192.168.23.1', null, null, '0', '15312219703', null, '64', '32020601096', '32020688001199', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961JhJY2rdStWeXlNU4Ai3fNc');
INSERT INTO `bestop_member` VALUES ('54', null, 'dd1db0aa184a2ac922381d545b1b6eb1', 'tHlw3Z', '臧英', '1551340818', '1551662308', '192.168.23.1', null, null, '0', '13861720800', null, '74', '32020601019', '32020688011143', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961AADHizx8w61MViOW_PHcU0');
INSERT INTO `bestop_member` VALUES ('55', null, 'f0da36db73ab6b5b8141aa76aa847b8a', 'dBZKci', '张丽君', '1551340818', null, null, null, null, '0', '13961789008', null, '55', '32020601024', '32020688200197', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('56', null, '31f8b1f315199466f13b01c73aae2e09', 'xgblm1', '陆涛', '1551340818', null, null, null, null, '0', '18015339953', null, '74', '32020601004', '32020688200186', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('57', null, 'e8ab1fde1569a841bc573b145a7fde69', 'lGFZVi', '钱惠华', '1551340818', '1551662998', '192.168.23.1', null, null, '0', '13921184335', null, '74', '32020601125', '32020688011957', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961IypbWTMf82lwZ21hPLFsjc');
INSERT INTO `bestop_member` VALUES ('58', null, '758a728e18c94081cb696bc736f36050', 'v8qgdp', '秦洲', '1551340818', null, null, null, null, '0', '13951568516', null, '74', '32020601004', '32020688000156', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('59', null, '81e3e1163b42306839bef6668202174d', 'GXMfcp', '张海燕', '1551340818', '1551749801', '192.168.23.1', null, null, '0', '13915261102', null, '64', '32020601xxx', '32020688200315', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961OGp7iqen7ID_wO6bH8Bnjc');
INSERT INTO `bestop_member` VALUES ('60', null, 'fb2e8e498f0b84a0bf37fbc5851627b1', 'aAyFyp', '张莲', '1551340818', '1551832656', '192.168.23.1', null, null, '0', '13915335283', null, '55', '32020601061', '32020688200291', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961IzYIV8kY4eZ5MWC2dq3jQ8');
INSERT INTO `bestop_member` VALUES ('61', null, '7270ea49bbee6f1d99f11cb32a819299', '4iKZyk', '龚伟霞', '1551340818', '1551749668', '192.168.23.1', null, null, '0', '13861758405', null, '64', '32020601069', '32020688200333', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961CnLanHhMpsbHesP6fkJ5V4');
INSERT INTO `bestop_member` VALUES ('62', null, '4031f9110fbff89e9512cb56ec16166a', 'NnsFLC', '丁丽红', '1551340818', null, null, null, null, '0', '15152243308', null, '74', '32020601019', '32020688200240', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('63', null, 'e714cc26391964f9a2878e37d5b44944', 'WTgV35', '严辛', '1551340818', '1551661162', '192.168.23.1', null, null, '0', '15061799125', null, '64', '32020601xxx', '32020688200278', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961FLodBZCkGJ_mzrLBA8Ye7Q');
INSERT INTO `bestop_member` VALUES ('64', null, '8aae7068fa1530c509b6a54c67522cbf', 'gTFzLt', '张蓉', '1551340818', null, null, null, null, '0', '15152228998', null, '56', '32020601005', '32020688200438', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('65', null, '51e62e110d251b50a911c0deca9539bb', 'BuyvcJ', '陆丽华', '1551340818', '1551797323', '192.168.23.1', null, null, '0', '13338779070', null, '58', '32020601003', '32020688001963', '江苏', '无锡', '国寿惠山支公司', null, '7', 'oK_961GYvq943Zm7ttIqrle5WJ_w');
INSERT INTO `bestop_member` VALUES ('66', null, '9c9fd98521bbe486693feb72ea7a6df3', 'vPNPF3', '徐丽蓉', '1551340818', null, null, null, null, '0', '13646181534', null, '58', '32020601018', '32020688011255', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('67', null, '4253250200589427017e52792c9746af', 'ehG4LD', '周小凤', '1551340818', '1551677872', '192.168.23.1', null, null, '0', '18762659935', null, '59', '32020601055', '32020688200168', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961P3ZEqvnjjD9kFsCUp0DAZk');
INSERT INTO `bestop_member` VALUES ('68', null, 'd918519fb5ee7565ec868335e667f9ce', 'CZSRFv', '姜琴芬', '1551340818', '1551832326', '192.168.23.1', null, null, '0', '15061871806', null, '59', '32020601127', '32020688200255', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961M_7Zsdb4LLyHVG5wDTb2D8');
INSERT INTO `bestop_member` VALUES ('69', null, 'e75261bc241347a3aa3173e8af85fe5d', 'fsiG1I', '夏秀兰', '1551340818', '1551745371', '192.168.23.1', null, null, '0', '13861766758', null, '58', '32020601003', '32020688001042', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961Nb8B8g25Snc6YbH6nLgqNc');
INSERT INTO `bestop_member` VALUES ('70', null, '413304f25dbb44f625fc1a615e08ad3c', 'nbbCaS', '管美娟', '1551340818', null, null, null, null, '0', '13961752181', null, '58', '32020601003', '32020688000749', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('71', null, 'd543c26a1d0b4496057788180bf7a6db', 'UY9zk1', '陈秀梅', '1551340818', '1551659599', '192.168.23.1', null, null, '0', '15358992030', null, '59', '32020601098', '32020688200251', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961ORo-Y-q_nFidU3ef8bIuBY');
INSERT INTO `bestop_member` VALUES ('72', null, '36b053a160324cccba8005e2a754418a', 'ZFFgpf', '杨敏华', '1551340818', null, null, null, null, '0', '13861816805', null, '58', '32020601003', '32020688001125', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('73', null, '7b50fb3af553c7c3810c82169acaa161', 'vviDm4', '陈银姐', '1551340818', '1551745589', '192.168.23.1', null, null, '0', '13914135913', null, '58', '32020601067', '32020688012151', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961MOL4YbnJ0JYwjSJsA_MZu4');
INSERT INTO `bestop_member` VALUES ('74', null, '3877ae3045d2887ad5d48f64021ad5f4', 'ANw8Z7', '陆丽平', '1551340818', null, null, null, null, '0', '15061508889', null, '58', '32020601003', '32020688200387', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('75', null, '521376709065266b8f00088f2eab1b22', 'xJFzpR', '蒋依', '1551340818', null, null, null, null, '0', '13771456989', null, '74', '32020601004', '32020688200415', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('76', null, '8c1837932dd177878bd4b5bda9ab6a47', '5HNzer', '钱凤兰', '1551340818', null, null, null, null, '0', '13382885303', null, '55', '32020601023', '32020688200430', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('77', null, '9c4f11aa221ea4d828347836045d2be3', 'VJK2dd', '孙俊伟', '1551340818', null, null, null, null, '0', '15852766739', null, '55', '32020601061', '32020688200397', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('78', null, '7d69e77e93966639d4ca2ce5c448b4b1', 'IeQvyD', '高惠英', '1551340818', '1551834217', '192.168.23.1', null, null, '0', '15190230908', null, '64', '32020601010', '32020688200395', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961DGt9iAkCs7JGI04lwu_sVo');
INSERT INTO `bestop_member` VALUES ('79', null, 'baeedb3193bc554ec8c5fb19f217da2f', 'UqsdwS', '高雅婷', '1551340818', null, null, null, null, '0', '15961899220', null, '64', '32020601xxx', '32020688200425', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('80', null, '91c4524905cbbe44ceb945888f8fc40e', 'UBZl7w', '徐涯新', '1551340818', null, null, null, null, '0', '15995250755', null, '74', '32020601004', '32020688200458', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('81', null, '88f7f7384f73262f1bd6a31169f2ba41', 'VjP8Dy', '周娟芬', '1551340818', null, null, null, null, '0', '15306193902', null, '63', '32020601083', '32020688200394', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('82', null, 'ecd6e47feb86e036fd7fe65c34133baa', 'bWAZAc', '沈建良', '1551340818', '1551838024', '192.168.23.1', null, null, '0', '18061516259', null, '74', '32020601109', '32020688200365', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LwMZY4--VCHHIus3e3Jm6g');
INSERT INTO `bestop_member` VALUES ('83', null, 'a785a74fef64a81965d086d2dfa0987d', 'Vn4kMQ', '姚丽英', '1551340818', '1551870189', '192.168.23.1', null, null, '0', '13951516635', null, '74', '32020601004', '32020688200352', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961MakjA5piXwF9XSnu4wedak');
INSERT INTO `bestop_member` VALUES ('84', null, '81c00f18c2fe27e8875ccf8395d82ec9', 'dkYsCw', '徐菁', '1551340818', null, null, null, null, '0', '13921549429', null, '59', '32020601055', '32020688200486', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('85', null, 'cda56edd02d34274754aca67e7487759', 'BcEqFQ', '吴强', '1551340818', null, null, null, null, '0', '13306189098', null, '60', '32020601002', '32020688200548', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('86', null, '2d5f44c94e94f15e48ce9097df958f4d', 'G54suW', '吴冬妹', '1551340818', null, null, null, null, '0', '13616163913', null, '58', '32020601003', '32020688200515', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('87', null, '52faef375fa0330862d8b7958bc7d570', 'cQjTwg', '孙舜临', '1551340818', null, null, null, null, '0', '13961858430', null, '56', '32020601005', '32020688200631', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('88', null, 'd7f20b5599619f92c8f2615e26ebc028', 'HrdteW', '肖培连', '1551340818', null, null, null, null, '0', '13771572605', null, '62', '32020601200', '32020688200652', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('89', null, '5b3fa22f0ff7687369935ad7fdab2dbe', '8dBCIb', '章航宇', '1551340818', null, null, null, null, '0', '13338762325', null, '58', '32020601225', '32020688200649', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('90', null, 'ae6aab19300bae02984270b7468f0ad3', 'F3LtqS', '刘伟', '1551340818', '1551749712', '192.168.23.1', null, null, '0', '18921298153', null, '64', '32020601015', '32020688200535', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961JLcz6g-eRUpuVixTwCikRM');
INSERT INTO `bestop_member` VALUES ('91', null, '9e21454f79558c1d3f3c011c59d08e23', 'sl1DFv', '沈丹', '1551340818', null, null, null, null, '0', '13921278382', null, '55', '32020601001', '32020688200580', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('92', null, '566fb559881e2f45b8a543ab88d8f1e3', 'nVd4fB', '李玲', '1551340818', '1551830948', '192.168.23.1', null, null, '0', '15061811225', null, '56', '32020601087', '32020688200671', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961N6nEHjOgRMcpDSPnF4aXZY');
INSERT INTO `bestop_member` VALUES ('93', null, '7b09e92bd46bf842c4342dc3e55dfdf9', 'XW5Zaj', '梁佳君', '1551340818', null, null, null, null, '0', '13951565397', null, '62', '32020601173', '32020688200606', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('94', null, '97d2902771b679138514418e28af5c40', 'NZb8bi', '夏文厚', '1551340818', null, null, null, null, '0', '13861848347', null, '61', '32020601086', '32020688200657', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('95', null, '71de23c02052cd72c922bc0b0fd58b98', 'eSLsNY', '张莉', '1551340818', '1552022609', '192.168.23.1', null, null, '0', '13861822509', null, '60', '32020601170', '32020688200552', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961MlN33EhE_FVr_cE1oRg3Ag');
INSERT INTO `bestop_member` VALUES ('96', null, '2e1875e278d84dc18e3fcf5be0f15310', 'Ns9QCq', '顾华佳', '1551340818', '1551830797', '192.168.23.1', null, null, '0', '13665108117', null, '56', '32020601201', '32020688200789', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961KL3lo5YeasAhxEDMnT--jM');
INSERT INTO `bestop_member` VALUES ('97', null, '5c590d6d4a8798ec31a20f2f9c5a125e', '3ysE21', '邵志刚', '1551340818', null, null, null, null, '0', '18601558980', null, '64', '32020601009', '32020688200720', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('98', null, '6e49603e7bfb132eb7fdadc09763446b', 'BkhxV1', '秦敏洁', '1551340818', null, null, null, null, '0', '18661299517', null, '59', '32020601055', '32020688200821', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('99', null, '128dbad6c856ca02e00f161be5a4b485', 'syUqNq', '俞菊', '1551340818', null, null, null, null, '0', '13921173058', null, '58', '32020601003', '32020688200780', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('100', null, 'fb10b259c2ebf8c329003e4e85db9616', 'yuhHAr', '强明娟', '1551340818', '1552012074', '192.168.23.1', null, null, '0', '18961812345', null, '60', '32020601002', '32020688200737', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961EDc21bOz9DHd_86QfhbZv8');
INSERT INTO `bestop_member` VALUES ('101', null, '24cd7750d6dc80a4516ee017c16b5854', 'Ic1Vx3', '朱华明', '1551340818', null, null, null, null, '0', '13606173352', null, '56', '32020601005', '32020688200800', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('102', null, 'ef07eecc4fabca4e6699e6a822ce8a67', 'vSpCRz', '陈斐', '1551340818', null, null, null, null, '0', '13771025891', null, '56', '32020601094', '32020688200807', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('103', null, '482f0bfef46b15927b03d06186277e2f', '6y3JD7', '周丽芳', '1551340818', null, null, null, null, '0', '13861689840', null, '61', '32020601086', '32020688200820', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('104', null, '067d7e59a34297c4bccc34f51aa450c3', 'kPthSk', '陈静霞', '1551340818', null, null, null, null, '0', '15358011256', null, '56', '32020601005', '32020688200841', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('105', null, '57aa156052cdcfa778b19fb33af47f1e', '7WyqyL', '陈旭妹', '1551340818', null, null, null, null, '0', '13771007919', null, '56', '32020601094', '32020688200839', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('106', null, '636e25a1b747e28c17a28552359c0c13', 'b85YQc', '徐佳', '1551340818', null, null, null, null, '0', '13585017876', null, '60', '32020601162', '32020688200876', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('107', null, '260b6b56d6fc2c1c598af24715878ec1', 'qGu7nY', '杨晓琴', '1551340818', '1551851280', '192.168.23.1', null, null, '0', '15806177801', null, '58', '32020601067', '32020688200893', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961O1B88thTnuKgcemJr7K8K0');
INSERT INTO `bestop_member` VALUES ('108', null, 'b51494f8494ccfce4c1db566bde743a6', 'AFfu1A', '陈婷婷', '1551340818', '1551507694', '192.168.23.1', null, null, '0', '13912361321', null, '56', '32020601005', '32020688200988', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Jj810mW_OcxmYGobDBXnbo');
INSERT INTO `bestop_member` VALUES ('109', null, '2e029ff8a714412c5b3bd998f59d28f0', 'lM8YjZ', '李凤娟', '1551340818', '1552346918', '192.168.23.1', null, null, '0', '13812529502', null, '74', '32020601109', '32020688201039', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961NSNnGczep9Q49ZUGjJg380');
INSERT INTO `bestop_member` VALUES ('110', null, 'f5f15fcf8cf0f18e15a3a7c3707bcde1', 'QJLXuB', '茅永美', '1551340818', null, null, null, null, '0', '13057387080', null, '64', '32020601069', '32020688201080', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('111', null, '2ddc9d9970f61df95a8311a9be8bde6a', 'CiNafL', '王锦兰', '1551340818', null, null, null, null, '0', '13771160815', null, '74', '32020601218', '32020688200978', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('112', null, 'c8d18878c8564b986b8bb455b527ccee', 'FDYaVw', '陆雪英', '1551340818', null, null, null, null, '0', '18868303013', null, '55', '32020601061', '32020688201161', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('113', null, '5ea84f75aa2a1d3085ed51fa7aa7030f', 'Zfc8RL', '臧明', '1551340818', null, null, null, null, '0', '15861669657', null, '74', '32020601019', '32020688201119', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('114', null, '42199d4201e3857b2d6822830f5ef137', 'elc1e9', '尤杰', '1551340818', null, null, null, null, '0', '18306187201', null, '62', '32020601029', '32020688201142', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('115', null, '66996fd007220d8f60ac164db594d076', 'JKiU3Z', '邵明亚', '1551340818', null, null, null, null, '0', '13961839682', null, '55', '32020601011', '32020688201125', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('116', null, '1016c1d7e0bb608e395d015c897670df', 'c69xjg', '张凤', '1551340818', null, null, null, null, '0', '13806183712', null, '55', '32020601061', '32020688201139', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('117', null, 'a4bbe47e7154a2ff86003a056903f8bc', 'YKiT5b', '刘洲洋', '1551340818', null, null, null, null, '0', '18260723330', null, '59', '32020601168', '32020688201085', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('118', null, '1edd25d68be0eefe65c60ea62ea73c52', '4XlwpW', '刘晓青', '1551340818', null, null, null, null, '0', '15261588309', null, '58', '32020601067', '32020688201152', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('119', null, 'aa022c83e306341bdb5dc91e1e744071', 'HU5Xrv', '虞紫磊', '1551340818', null, null, null, null, '0', '13665103066', null, '64', '32020601009', '32020688201153', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('120', null, 'b4c0ef0f1105656c93f41df24137d1b9', '4eGvr1', '沈秀娣', '1551340818', null, null, null, null, '0', '13961726745', null, '58', '32020601003', '32020688201197', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('121', null, '339ce9c7eb2812bdc30f532e80b3d6c8', 'mTrBn4', '杨怡', '1551340818', null, null, null, null, '0', '18761516424', null, '58', '32020601018', '32020688201087', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('122', null, '97860f85f500b11eee0a37069ab1c11d', 'N73xPB', '张建芳', '1551340818', null, null, null, null, '0', '13358105657', null, '55', '32020601112', '32020688200975', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('123', null, '9fa6d86becf47da80cf3a70c447cad99', 'RVSCkq', '季咏梅', '1551340818', '1551751332', '192.168.23.1', null, null, '0', '13961710879', null, '73', '32020601007', '32020688009827', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961HJk7RSRuGZ3LdVVq63R5NA');
INSERT INTO `bestop_member` VALUES ('124', null, 'dde1770e39c8d52211c7b9a5b3ccb376', '3zL6Bj', '王焕菊', '1551340818', null, null, null, null, '0', '13093023613', null, '73', '32020601007', '32020688001621', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('125', null, '0f8975395bcf2231015139570c8992f9', 'EIzfmZ', '李方', '1551340818', '1551826312', '192.168.23.1', null, null, '0', '13912376780', null, '73', '32020601007', '32020688001631', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961KVHUQtXglaBR-CGkvDF5aI');
INSERT INTO `bestop_member` VALUES ('126', null, '87f50cd915e8bb729cf40c3ff6eee1c8', 'CjyRSX', '李建芳', '1551340818', '1551833217', '192.168.23.1', null, null, '0', '15961807536', null, '73', '32020601007', '32020688200914', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961F-aB8KZr2I3l51BQIZa8EU');
INSERT INTO `bestop_member` VALUES ('127', null, 'f980065dd616895f32c65d38057b227e', 'UFEJfW', '万凤娟', '1551340818', null, null, null, null, '0', '13961752277', null, '71', '32020601198', '32020688012054', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('128', null, 'c6e41340857d0abdffdbe0edf9329c79', 'mQ9Jyq', '强露艳', '1551340818', null, null, null, null, '0', '13861710079', null, '60', '32020601139', '32020688201259', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('129', null, '9fcf7831ec880c94643f783771f7d161', '82H1FZ', '支芬', '1551340818', null, null, null, null, '0', '13771188020', null, '71', '32020601006', '32020688200651', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('130', null, 'beaf5048ceaa57b523334faa693f2b04', 'NlZII8', '江彩英', '1551340818', '1551877730', '192.168.23.1', null, null, '0', '13706188942', null, '58', '32020601110', '32020688012921', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961LzIv1Uzm1WJ6p57P8z8Bqw');
INSERT INTO `bestop_member` VALUES ('131', null, '692fcb6298843adb3e2e3dc26a2ca4cd', 'hKYcjj', '许秋华', '1551340818', '1551831968', '192.168.23.1', null, null, '0', '13585029772', null, '58', '32020601008', '32020688000861', '江苏', '无锡', '国寿惠山支公司', null, '5', 'oK_961ORnpyX0cJlzQDLO5SYFAwc');
INSERT INTO `bestop_member` VALUES ('132', null, 'f95754200ae383053a0c6599d4c6f24c', 'nRspc3', '徐惠兰', '1551340818', '1551831973', '192.168.23.1', null, null, '0', '13921523061', null, '58', '32020601008', '32020688000759', '江苏', '无锡', '国寿惠山支公司', null, '4', 'oK_961LBOVLolFiDdqMD-GaWWegk');
INSERT INTO `bestop_member` VALUES ('133', null, 'e0aadc57c1f5eea5ed20d83664181bd3', 'CuxZZd', '陈凤仙', '1551340818', '1551745843', '192.168.23.1', null, null, '0', '13616175512', null, '58', '32020601008', '32020688000889', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961CWq_PHclld0nHMLMVNJwgo');
INSERT INTO `bestop_member` VALUES ('134', null, '528b056d5bd0593a69da03c8e862817a', 'PgcBW6', '周文华', '1551340818', '1552651864', '192.168.23.1', null, null, '0', '13013613099', null, '58', '32020601008', '32020688000788', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961GnuP9x8PuRkxP3uyyk-A0M');
INSERT INTO `bestop_member` VALUES ('135', null, 'ab20917d7fa283b99935c8fb5e9f5e9b', 'I3bmdX', '钱玉华', '1551340818', '1551856596', '192.168.23.1', null, null, '0', '13506193618', null, '58', '32020601110', '32020688201040', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961CmyqhMj-DX82Zg5U-LYNMI');
INSERT INTO `bestop_member` VALUES ('136', null, '20f2e42e06fa37a5d70f9e95ef290ccc', 'J71KpF', '顾燕', '1551340818', null, null, null, null, '0', '13814204219', null, '58', '32020601008', '32020688200686', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('137', null, 'e98afbd6f832926c323667bc9fd328b3', 'KNrpVu', '虞浓琴', '1551340818', '1551746802', '192.168.23.1', null, null, '0', '13915270689', null, '58', '32020601008', '32020688200626', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961BaB-Oty_bT95VGGGFtjPEY');
INSERT INTO `bestop_member` VALUES ('138', null, '584895485c90d6872e1e80c1d589601b', 'UIRsvE', '薛忠', '1551340818', null, null, null, null, '0', '13771119779', null, '58', '32020601008', '32020688200549', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('139', null, 'dd1b661d8960417a2e4cf773a907a49d', 'uSRjGc', '吴小琴', '1551340818', '1551745964', '192.168.23.1', null, null, '0', '13616195781', null, '58', '32020601008', '32020688001989', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961J7zOzN29UvTcjoAA-LjRW0');
INSERT INTO `bestop_member` VALUES ('140', null, '8fee8f0b89097f7bf956dc52eeee3113', '452tLi', '华建兴', '1551340818', null, null, null, null, '0', '13771128592', null, '71', '32020601006', '32020688201144', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('141', null, '903f08f2d6ca6fa00635e14e9cc0ea55', 'Z5TJRq', '周彩萍', '1551340818', null, null, null, null, '0', '13921103022', null, '59', '32020601055', '32020688201248', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('142', null, 'ec936a88e28e949c081f6c1e52dac121', 'Z5XCsN', '臧明皎', '1551340818', null, null, null, null, '0', '13306189232', null, '58', '32020601067', '32020688201224', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('143', null, '4658cf784780cd8b0360bee9eb627ba0', 'cElXy5', '吴平', '1551340818', null, null, null, null, '0', '15261673027', null, '63', '32020601083', '32020688201227', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('144', null, '8d1671ebe27f6d45f85278b40e0ccb7f', 'kUNvAy', '张楠楠', '1551340818', null, null, null, null, '0', '15961794700', null, '62', '32020601029', '32020688201237', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('145', null, 'dea3a24c29f192d9a849de9c29f6765e', 'ffLcLR', '王守全', '1551340818', null, null, null, null, '0', '15961819010', null, '74', '32020601109', '32020688201229', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('146', null, 'b1a1ab2e3491f575904209fd2f9fc374', 'pkXNNE', '冯艳丹', '1551340818', null, null, null, null, '0', '13395196016', null, '56', '32020601005', '32020688201216', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('147', null, '872d603138e2990118cb457972734c25', 'TzWB3g', '樊晓星', '1551340818', null, null, null, null, '0', '13906179583', null, '59', '32020601055', '32020688201277', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('148', null, '1fe21997652d13d3db913584a782db4a', 'Wv3vyU', '单晓燕', '1551340818', '1551831700', '192.168.23.1', null, null, '0', '13812013117', null, '59', '32020601171', '32020688201282', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961KU54CkdqHsqaU2-OGXRG00');
INSERT INTO `bestop_member` VALUES ('149', null, '66e583379298578abea5fb8047c2918a', 'WSX8uy', '秦月波', '1551340818', '1551746840', '192.168.23.1', null, null, '0', '13093052688', null, '73', '32020601021', '32020688011199', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961BvuHORGzw86uKgfVKhwOsA');
INSERT INTO `bestop_member` VALUES ('150', null, '2357713b99bc9f1817b5b6a2a1426ab1', 'yb1W7d', '沈亚芬', '1551340818', '1551833211', '192.168.23.1', null, null, '0', '15895354702', null, '73', '32020601021', '32020688011083', '江苏', '无锡', '国寿惠山支公司', null, '4', 'oK_961LxEHmgdfndmxJOcsPnJ_Wo');
INSERT INTO `bestop_member` VALUES ('151', null, '35789dddfecfe668438c0c7cdf04a19f', 'nM4FV3', '钱灵洁', '1551340818', null, null, null, null, '0', '15961868544', null, '73', '32020601021', '32020688201018', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('152', null, '22232ff2043218f6b6451c307026bc2f', 'r6aBWd', '虞志琦', '1551340818', '1551746844', '192.168.23.1', null, null, '0', '13665109819', null, '73', '32020601021', '32020688201207', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961ORm6jCueiItqeZRKmbG14I');
INSERT INTO `bestop_member` VALUES ('153', null, 'f080217a88b5ac14900c4ede5c982cba', 'QTcRfz', '李建良', '1551340818', null, null, null, null, '0', '18751558810', null, '71', '32020601006', '32020688200409', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('154', null, '9584d27b1904305e8cf45143176d144d', 'd6GiXw', '张静芳', '1551340818', null, null, null, null, '0', '13921155918', null, '71', '32020601006', '32020688000853', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('155', null, '0a647562ecd245968d804a669cc0ce2c', 'B19FFx', '秦煜琳', '1551340818', null, null, null, null, '0', '13951516606', null, '71', '32020601006', '32020688200883', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('156', null, 'dfb9a86e6bad670bd0809c8d115618c1', 'pBnv4F', '吴艳玲', '1551340818', null, null, null, null, '0', '13115056832', null, '71', '32020601006', '32020688200755', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('157', null, '49879ce1218657ccea970a85f5827767', '3b3Hni', '韩兰', '1551340818', null, null, null, null, '0', '13901515378', null, '71', '32020601006', '32020688200565', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('158', null, '36ae01232e3321be85ed46f30a879dc1', 'kxpfFA', '陈远', '1551340818', null, null, null, null, '0', '13701510978', null, '71', '32020601006', '32020688200472', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('159', null, '31097a4e8fcae1f371fc74f248e8db4e', 'sdAeEB', '严夏沁', '1551340818', null, null, null, null, '0', '15961860029', null, '71', '32020601030', '32020688200711', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('160', null, '223d8c1dc7f05c15c7c0757952eaf454', 'exgaFh', '顾秋娟', '1551340818', null, null, null, null, '0', '15152231807', null, '71', '32020601006', '32020688201236', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('161', null, '47254594bc393bcc4f462cb37a49843b', 'nVJ1yM', '陶素华', '1551340818', '1551833100', '192.168.23.1', null, null, '0', '13814209485', null, '73', '32020601021', '32020688012932', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961PagrPrRkc3iUv6uucI4ysg');
INSERT INTO `bestop_member` VALUES ('162', null, '34a42bd7b5eb17c105defd5a9938a09b', 'TgCAvx', '周丰雷', '1551340818', null, null, null, null, '0', '15995289323', null, '73', '32020601021', '32020688201184', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('163', null, '54f54016cf6cb062359172082c3fa627', 'kXSx4F', '余笠', '1551340818', null, null, null, null, '0', '13861893293', null, '71', '32020601030', '32020688200370', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('164', null, 'b64d567c0dc456ab8deffd2f8735b4ad', 'FLyQFF', '冯金妹', '1551340818', null, null, null, null, '0', '15995214495', null, '71', '32020601030', '32020688011180', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('165', null, '69534b3ead7d0d94d3490ac98c773dda', '1G4bfm', '冯凯俐', '1551340818', null, null, null, null, '0', '15995228323', null, '71', '32020601030', '32020688010282', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('166', null, '5a0b8eab74736e9da11cf02beb12ff16', 'GBnsKe', '唐雪丹', '1551340818', null, null, null, null, '0', '13812298061', null, '71', '32020601030', '32020688200691', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('167', null, '79e35de9a71eaaba104302c3ea4fcecb', 'fqFqvB', '顾丽萍', '1551340818', null, null, null, null, '0', '15852771667', null, '71', '32020601006', '32020688201304', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('168', null, '2885f4506c818ef54254a9b4662b4240', '1ZNyNB', '陆燕平', '1551340818', '1551831948', '192.168.23.1', null, null, '0', '15961829793', null, '58', '32020601003', '32020688201257', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961HnUA7Pxu98JLdF9pmaC2XI');
INSERT INTO `bestop_member` VALUES ('169', null, 'a9d466e6e3ad2a1d2478891336e6147f', 'Sek8fE', '许士杰', '1551340818', '1551832712', '192.168.23.1', null, null, '0', '13606181709', null, '55', '32020601011', '32020688201350', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Hhtjx6neFX8Qe8wvhgj8yM');
INSERT INTO `bestop_member` VALUES ('170', null, '1c96d18f32dee751d027698152a5d00a', 'FSGrly', '陈向红', '1551340818', null, null, null, null, '0', '13812039650', null, '58', '32020601110', '32020688201377', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('171', null, '59b693b197d8726639e8264184822428', '6efHtZ', '陈晓勇', '1551340818', null, null, null, null, '0', '13771073045', null, '71', '32020601006', '32020688201316', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('172', null, '47740682e590a1a83a74362965ef1a62', 'xPcY1n', '叶洁', '1551340818', null, null, null, null, '0', '13656183680', null, '56', '32020601005', '32020688201330', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('173', null, '5c1503f4d4e1003190005e0bbfd34b4f', 'VuhHif', '陈建英', '1551340818', '1551832301', '192.168.23.1', null, null, '0', '18914167586', null, '58', '32020601018', '32020688201376', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961MxkCMjwe1r85QJCPXBps10');
INSERT INTO `bestop_member` VALUES ('174', null, '0003614af8d80ac839879bdac4633684', 'Xz4fEN', '吕余榜', '1551340818', null, null, null, null, '0', '15261508287', null, '58', '32020601003', '32020688201347', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('175', null, '6b1402dea905a2152044e6be0f04b983', 'jJ3zdg', '费银娣', '1551340818', null, null, null, null, '0', '18051597823', null, '73', '32020601007', '32020688201331', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('176', null, 'a80e409b0465c719b7476b0983e26162', 'cD84HU', '倪玲娟', '1551340818', '1551781163', '192.168.23.1', null, null, '0', '13921521831', null, '64', '32020601069', '32020688201352', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961AIJDLUlHBIxbtx5jMlI95Q');
INSERT INTO `bestop_member` VALUES ('177', null, '4971b988bf6c51774067feda2749130d', 'y291lf', '陈捷燕', '1551340818', null, null, null, null, '0', '15251515025', null, '74', '32020601109', '32020688201354', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('178', null, '21518a112b62e7847207d35c87bc63b7', 'ppxfZB', '边亚珍', '1551340818', null, null, null, null, '0', '13771548535', null, '55', '32020601023', '32020688201306', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('179', null, 'b17911fa0611c630a85cfec153375737', 'qqBmXQ', '许勤', '1551340818', null, null, null, null, '0', '13584199033', null, '55', '32020601112', '32020688201396', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('180', null, '993787c72e0f8c6495db15ff26971d7c', 'WTU6uX', '叶钰', '1551340818', null, null, null, null, '0', '18961836192', null, '56', '32020601149', '32020688201301', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('181', null, 'e0116481bc30f4c54fd074a0478e955d', '4JvUlV', '王润霞', '1551340818', null, null, null, null, '0', '13861883811', null, '60', '32020601170', '32020688201400', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('182', null, 'cbd064931e2ed8ec1b4ef833d1d41cae', 'hZEkwG', '石英', '1551340818', null, null, null, null, '0', '13912388991', null, '73', '32020601007', '32020688201333', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('183', null, '43947a5b6513b1179a7f771710796979', 'ewvfrF', '李渊', '1551340818', null, null, null, null, '0', '18051587819', null, '60', '32020601162', '32020688201442', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('184', null, 'a178d5cd8aba467e4535c4efe515176e', '7M2AEg', '倪克平', '1551340818', '1551842539', '192.168.23.1', null, null, '0', '13706193177', null, '73', '32020601146', '32020688201431', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961KmrwzYjv1santIhsYgOIHQ');
INSERT INTO `bestop_member` VALUES ('185', null, '3199bb428aa5f47ce7c31acc184f550c', 'Qma1I7', '黄小洁', '1551340818', null, null, null, null, '0', '13961730966', null, '55', '32020601112', '32020688201452', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('186', null, '2ee2afe2bd76abb0e79c3ed1e8de9b08', 'dVsjtd', '胡平', '1551340818', null, null, null, null, '0', '13646188428', null, '59', '32020601098', '32020688201424', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('187', null, '05cf2fa602a23b69d7d16c36d9313e4c', 'ie61fY', '华银', '1551340818', '1551832672', '192.168.23.1', null, null, '0', '18921162766', null, '55', '32020601011', '32020688201446', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961KH0wkeCKIFRDPdFHTYJx3I');
INSERT INTO `bestop_member` VALUES ('188', null, '4833a203f56c1c22655d37d1a18ded29', '9GM9EZ', '陈年英', '1551340818', null, null, null, null, '0', '13585004893', null, '61', '32020601179', '32020688201456', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('189', null, 'e685b2e10e385fc85f3d82034c5ef2f6', 'Hub6y7', '陆国英', '1551340818', null, null, null, null, '0', '15949232717', null, '58', '32020601003', '32020688201434', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('190', null, 'acf479c34095d8b1480539ae8565c368', 'syRuyx', '邱丽虹', '1551340818', null, null, null, null, '0', '18951562277', null, '55', '32020601076', '32020688201428', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('191', null, '37f44a702ac7a12bab3229eb6cc6cc0c', 'rZWzym', '龚丽美', '1551340818', null, null, null, null, '0', '18912362189', null, '61', '32020601086', '32020688201470', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('192', null, '6d7768247c0f7c8c8ddf20a3f8d88e7c', 'yIs9sW', '吴海雁', '1551340818', null, null, null, null, '0', '15895306217', null, '74', '32020601125', '32020688201523', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('193', null, '38059270e2f5100c61f3b01f601280ef', 'DCzg7p', '朱义玲', '1551340818', null, null, null, null, '0', '13861788712', null, '64', '32020601015', '32020688201567', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('194', null, 'a6f06a96d682aeab8b2cb9ccb9e72dbb', 'YIeeJT', '顾智芬', '1551340818', null, null, null, null, '0', '13921393720', null, '56', '32020601094', '32020688201577', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('195', null, 'f6b8ec4826bf968e637f61c6140fa836', 'Muzvcn', '杨琴峰', '1551340818', null, null, null, null, '0', '13063630701', null, '74', '32020601125', '32020688201555', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('196', null, '5f052078257b800fc5f58d46ff8ca6a3', '3XZQ2H', '虞春燕', '1551340818', null, null, null, null, '0', '15052200121', null, '59', '32020601127', '32020688201549', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('197', null, '2624d014340191fee29a34539e8d1ccd', 'Sn3jWH', '陈建萍', '1551340818', null, null, null, null, '0', '13912390304', null, '56', '32020601169', '32020688201578', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('198', null, '2a133ac822949bc4ed8af896fdb6cab9', '3bEIKG', '胡岳英', '1551340818', '1551830897', '192.168.23.1', null, null, '0', '13328119121', null, '56', '32020601005', '32020688201588', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961Bp0MIC6CjthwVMZbcTNINI');
INSERT INTO `bestop_member` VALUES ('199', null, '86a7dc9e07f52a9ad011af05d99aedca', 'YIbQSR', '许晓芳', '1551340818', null, null, null, null, '0', '13812280310', null, '61', '32020601153', '32020688201595', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('200', null, '4e8f0dd7d1b9d67a4cde8cb7a9f6209f', 'EmUXlW', '李惠芬', '1551340818', null, null, null, null, '0', '15961789565', null, '55', '32020601024', '32020688201688', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('201', null, 'b7f4f34e4642aa91c3c7e9e252a3c1c2', 'M1KA8L', '袁寅菊', '1551340818', null, null, null, null, '0', '15312886289', null, '55', '32020601061', '32020688201667', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('202', null, '88848c53896983a4ee3787c8f3d70cf1', 'NNmEfx', '杜红亚', '1551340818', null, null, null, null, '0', '13601519653', null, '74', '32020601019', '32020688201662', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('203', null, '4df03e53e13655814577e72ce244d468', 'sD6LE3', '顾春燕', '1551340818', '1551830794', '192.168.23.1', null, null, '0', '13812192870', null, '56', '32020601201', '32020688201619', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Mn-uXmQSJSY4-tmmUVVZnQ');
INSERT INTO `bestop_member` VALUES ('204', null, 'c395f8a37fb4b1d832a8c33bbd020385', 'NDXazz', '邹杨健', '1551340818', null, null, null, null, '0', '18552073086', null, '58', '32020601067', '32020688201605', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('205', null, '1c6d270b8b44afdc890d810cb49aa612', 'wwlVq2', '邵艳', '1551340819', null, null, null, null, '0', '13395182280', null, '74', '32020601154', '32020688201641', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('206', null, 'b9c1d9ca4d854ab5bc75a6095e411b08', 'qryBHK', '赵红洁', '1551340819', null, null, null, null, '0', '13616181293', null, '64', '32020601069', '32020688201680', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('207', null, '086f5bce1377a4fed3f8abb3a579e8bd', 'ws5F2u', '倪俊炜', '1551340819', '1551832655', '192.168.23.1', null, null, '0', '13961711617', null, '73', '32020601146', '32020688201637', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961ApsUybaccox0z74DWJ1-wc');
INSERT INTO `bestop_member` VALUES ('208', null, 'ad06bfcd29169b155f1491103eef34b0', 'Ara62n', '顾敏珍', '1551340819', null, null, null, null, '0', '13771055086', null, '56', '32020601201', '32020688201631', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('209', null, '51209055e812ccd83e6646671122e210', 'tNUgxi', '严丹琳', '1551340819', null, null, null, null, '0', '18118911998', null, '60', '32020601139', '32020688201616', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('210', null, 'ce171c0b6d9bcd455b73297db825ffa0', 'QNpCmp', '沈健', '1551340819', null, null, null, null, '0', '13815106088', null, '58', '32020601003', '32020688201591', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('211', null, '5bf09d1e560a483c8a51ad5398eafd70', 'vEe8nZ', '黄何', '1551340819', null, null, null, null, '0', '13961893854', null, '74', '32020601019', '32020688201592', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('212', null, 'd4dc3a370f35d60dd95ce7b5262c8d67', 'DSDHbB', '钱佳芳', '1551340819', null, null, null, null, '0', '13771491200', null, '74', '32020601109', '32020688201731', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('213', null, '3cb333665b6d3aa5dacbb44a5a07159a', '9TT7Qc', '陆柯妤', '1551340819', '1551859532', '192.168.23.1', null, null, '0', '13338118435', null, '55', '32020601011', '32020688201745', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961FrzqNg2m-Zdcx7dqL0gyDI');
INSERT INTO `bestop_member` VALUES ('214', null, '1999fd265597169e14cfdd71dc8b15fe', 'sKmRVM', '马周颍', '1551340819', null, null, null, null, '0', '13812524171', null, '56', '32020601087', '32020688201753', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('215', null, 'a69bd077001953268c1b6fa66db9fd24', '8pEbZ3', '周宏', '1551340819', null, null, null, null, '0', '13585012951', null, '63', '32020601181', '32020688201779', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('216', null, '31902c49a161b4358591492d717efbfb', 's7Z7Jq', '濮寅', '1551340819', '1551663319', '192.168.23.1', null, null, '0', '13915299109', null, '74', '32020601154', '32020688201737', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961G36ZUS3kGczfFAJiX7AKdw');
INSERT INTO `bestop_member` VALUES ('217', null, '1303318216bf14e9612ce5d56693d276', 'VnfxbJ', '俞凤娟', '1551340819', null, null, null, null, '0', '13915327982', null, '55', '32020601023', '32020688201744', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('218', null, '336fb823992d42bfb1c9660a85eefb76', 'Bfr1ta', '杨红英', '1551340819', null, null, null, null, '0', '15852550378', null, '64', '32020601010', '32020688201767', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('219', null, '4b3c73aa96ca98413343b83d684e74de', 'FrnMTb', '叶川', '1551340819', null, null, null, null, '0', '13338119096', null, '55', '32020601011', '32020688201901', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('220', null, '8d91ef2b73489068bf5602816abc53d8', 'XJaPBH', '马红霞', '1551340819', null, null, null, null, '0', '15961600230', null, '60', '32020601162', '32020688201840', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('221', null, 'd88fb195afb69f5b97c5d45db1e1983e', 'SfLbHF', '凌鹰', '1551340819', null, null, null, null, '0', '13812221552', null, '74', '32020601154', '32020688201820', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('222', null, '073bc8ceaf4b822d0338f1159541c509', 'zKwPc7', '肖丽君', '1551340819', '1551844792', '192.168.23.1', null, null, '0', '18706183258', null, '73', '32020601190', '32020688201865', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961IUdQRyJ_mLvtTyYBU2xlDk');
INSERT INTO `bestop_member` VALUES ('223', null, 'b0a7c025241dcc937c832ffe0ad53248', '12ranz', '张雁', '1551340819', null, null, null, null, '0', '13861831613', null, '55', '32020601061', '32020688201874', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('224', null, '094f7f8217bf49db8d07769c7d9634eb', 'NBhwNI', '刘亚英', '1551340819', null, null, null, null, '0', '13961766755', null, '62', '32020601172', '32020688201856', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('225', null, 'efd089bd07333ddd6b1df16e9b3c0354', 'vqWTdt', '邹莉', '1551340819', null, null, null, null, '0', '15190284335', null, '74', '32020601125', '32020688201872', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('226', null, '838164cf144966e9eda4d79e7964ce93', 'Ms43rJ', '李建萍', '1551340819', '1551676324', '192.168.23.1', null, null, '0', '13861467687', null, '56', '32020601191', '32020688201888', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961A9W3yubhqWZSgICv5zqFwA');
INSERT INTO `bestop_member` VALUES ('227', null, '287cc28732ff784be6e13cd419f38410', 'tAqGG8', '吴先召', '1551340819', null, null, null, null, '0', '13771130069', null, '55', '32020601011', '32020688201883', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('228', null, 'f39473d83d09efbfcbb1d773c4a0063a', 'yA3ets', '管振宇', '1551340819', null, null, null, null, '0', '15948686069', null, '73', '32020601007', '32020688201898', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('229', null, '4db8667f0089f14fca042199d25dfab5', 'vnfHpp', '时红洁', '1551340819', '1551784209', '192.168.23.1', null, null, '0', '13182759799', null, '64', '32020601069', '32020688201814', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961OZddIMRb-lqiCJIov3ckm4');
INSERT INTO `bestop_member` VALUES ('230', null, '8223d47f0a8162b3cbe453512d28ce6e', '4ca1Rm', '周海云', '1551340819', '1552352794', '192.168.23.1', null, null, '0', '18915341583', null, '59', '32020601055', '32020688201849', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961Cng4eGrDwvmh0yS3fZdU-A');
INSERT INTO `bestop_member` VALUES ('231', null, '3a4785f48dd54df57bccf0cf4305cdde', 'bnrDLG', '强耀丹', '1551340819', null, null, null, null, '0', '13861747125', null, '55', '32020601023', '32020688201850', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('232', null, 'c31bfc65285397b6e12df88ab2a9f067', 'kEfQP9', '谈雨婷', '1551340819', null, null, null, null, '0', '16621100872', null, '59', '32020601171', '32020688201938', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('233', null, 'db56e8e0882b0cb60072bdfe6e5fe8a4', 'xG5WxA', '王锦焕', '1551340819', null, null, null, null, '0', '15852533261', null, '64', '32020601009', '32020688201946', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('234', null, '0d2e01ed3c782aff1a2f253aecb93774', '9KdzuR', '王志韬', '1551340819', null, null, null, null, '0', '18906192598', null, '64', '32020601010', '32020688201908', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('235', null, '4a78541bbc733dbbc2f3d7f547372d70', 'knURbF', '张莉琴', '1551340819', null, null, null, null, '0', '13373630810', null, '54', '32020601016', '32020688200885', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('236', null, 'fc627f865f6ae0fa72f6dd2ecc289a7a', 'KyXhg9', '周维静', '1551340819', null, null, null, null, '0', '18921272573', null, '54', '32020601016', '32020688201232', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('237', null, 'd47d5325446596cab064a0756af5df99', 'zW4B8L', '陆明辉', '1551340819', null, null, null, null, '0', '13771098973', null, '54', '32020601119', '32020688201239', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('238', null, 'd1590b2709f58ec2bd92cf3950117527', 'C8Ep2v', '沈逸斌', '1551340819', null, null, null, null, '0', '15152237503', null, '54', '32020601119', '32020688201418', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('239', null, '2dc1c531e89c48299bd37fd8e3b38f1e', 't9wnVp', '林秀珍', '1551340819', '1551831932', '192.168.23.1', null, null, '0', '13961897030', null, '58', '32020601003', '32020688201972', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Hr847MlGuH-uYG0TCn-Bts');
INSERT INTO `bestop_member` VALUES ('240', null, 'ce42962e11a4bfe41abd2d4121c870f5', 'c3iSuL', '刘杰', '1551340819', null, null, null, null, '0', '13812189305', null, '59', '32020601168', '32020688201968', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('241', null, '988d5fe46b1979f6b4a952ce7e5168db', 'RPILkM', '沈斌英', '1551340819', '1551678562', '192.168.23.1', null, null, '0', '13961885351', null, '54', '32020601131', '32020688200969', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961EowuFFCqT8BZBR_o-gp4uI');
INSERT INTO `bestop_member` VALUES ('242', null, '6f27ddb3c263313b35088a9d8f742584', 'lPx25D', '陈涛', '1551340819', '1551863442', '192.168.23.1', null, null, '0', '15861589289', null, '64', '32020601183', '32020688201980', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961IHJkPZyQzcdzasMRBvmzTY');
INSERT INTO `bestop_member` VALUES ('243', null, '8b58f16d379b880bb0f79105055ef42f', 'hxT5un', '王琳', '1551340819', null, null, null, null, '0', '15961892714', null, '60', '32020601002', '32020688201986', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('244', null, '27ace534706920bcc652eca3f49b2051', '47Iuzb', '吴晓华', '1551340819', null, null, null, null, '0', '13915291974', null, '64', '32020601069', '32020688201998', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('245', null, 'f57514284be621d5fe83003337a4316d', '4NUriE', '钱启芳', '1551340819', null, null, null, null, '0', '13921196330', null, '58', '32020601008', '32020688201971', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('246', null, '4f0e12f3c8bcad44a3434392d56aea5a', 'ehLKin', '张加丽', '1551340819', null, null, null, null, '0', '13812047761', null, '54', '32020601213', '32020688200861', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('247', null, '9df64b802c00da21bbe61fa9ed9f5a5c', '2MIjCf', '钱一苗', '1551340819', null, null, null, null, '0', '13771086553', null, '54', '32020601016', '32020688200760', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('248', null, '41d06a84e7da7eb68f78b40ee57913c1', 'UVeerg', '周美红', '1551340819', null, null, null, null, '0', '13771040494', null, '56', '32020601087', '32020688201977', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('249', null, 'f7a469e19e8870a3a4d152b0a07143fa', 'lKDn2i', '费继江', '1551340819', null, null, null, null, '0', '13906181769', null, '54', '32020601213', '32020688200296', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('250', null, '9862c713244f74ad7cdcd6a3b704f0da', 'AwdzgR', '陈月侃', '1551340819', null, null, null, null, '0', '13812195199', null, '54', '32020601016', '32020688011636', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('251', null, '95724428feecf94ed87b087db7a5f4fe', 'gbGXXa', '陆锡娟', '1551340819', '1551671497', '192.168.23.1', null, null, '0', '13961819218', null, '54', '32020601016', '32020688001934', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961OkGptoKrDu021pHbbRD_YA');
INSERT INTO `bestop_member` VALUES ('252', null, '0f566a3db0df8e5d469cf60b77e11e9e', 'kpXahb', '闫书景', '1551340819', null, null, null, null, '0', '15061876870', null, '54', '32020601016', '32020688201146', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('253', null, 'f6fb97980f60e368dc503d43d8c8f219', 'wCC2fi', '葛沛林', '1551340819', null, null, null, null, '0', '13961692843', null, '54', '32020601016', '32020688200742', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('254', null, '302ae8740fd095cb2195f9b339b0f86c', 'g2x85s', '张讯虹', '1551340819', null, null, null, null, '0', '13861768500', null, '54', '32020601106', '32020688201312', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('255', null, '95a2835eedbe7238a02cc5ab8b31100b', 'kArwlS', '徐雪芬', '1551340819', null, null, null, null, '0', '13812537752', null, '54', '32020601106', '32020688009700', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('256', null, '1cbd5bf35e35cf5fe570944e8e8b1f3c', 'Y4tkDk', '陈镔蔚', '1551340819', null, null, null, null, '0', '13665123836', null, '54', '32020601106', '32020688201556', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('257', null, '7a3323bff1a613c132a4d1892eb2c69c', 'YGwbR5', '俞敏玉', '1551340819', null, null, null, null, '0', '15995270125', null, '54', '32020601106', '32020688201876', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('258', null, 'c2023026aeb273b9a4d34a03f65a8016', 'lLpIQU', '张丽君', '1551340819', null, null, null, null, '0', '13814258767', null, '54', '32020601106', '32020688201583', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('259', null, 'c9a85c8bacf1c82137feb1d8c6ed41ae', 'MA2GMB', '何菊芬', '1551340819', null, null, null, null, '0', '13771184006', null, '54', '32020601115', '32020688200973', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('260', null, '4649c56599fb6dcb8b4a5c25e649679c', 'bQFnCc', '谭阿琴', '1551340819', null, null, null, null, '0', '18921105870', null, '54', '32020601115', '32020688200864', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('261', null, 'cccd7b7ca75a9917d5231ef16a64bd27', 'B1PxmL', '孙香苗', '1551340819', null, null, null, null, '0', '15261520121', null, '74', '32020601004', '32020688202019', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('262', null, '2334ffd1f91be4e18a9400429dea02eb', '3Ynijs', '于青春', '1551340819', null, null, null, null, '0', '13912368082', null, '74', '32020601109', '32020688202070', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('263', null, '8a2677644d009f5fdf04f494cb01dda9', 'ZM9CNX', '唐云鹤', '1551340819', null, null, null, null, '0', '13585095372', null, '55', '32020601011', '32020688202075', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('264', null, '5ad26762913f1667e750b8fb4687800d', 'jN2Hqe', '吴烨', '1551340819', null, null, null, null, '0', '15106185630', null, '54', '32020601131', '32020688202077', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('265', null, '8a5d1d66d92b243a23658e2a95bf8e41', 'JWhIYs', '王绘绘', '1551340819', null, null, null, null, '0', '13915353801', null, '74', '32020601218', '32020688202038', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('266', null, 'c2937b098746ce65dcce870e0210ef03', 'waqiZa', '张利敏', '1551340819', '1552799395', '192.168.23.1', null, null, '0', '13814293911', null, '62', '32020601184', '32020688202014', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961MllM41uFsv-Gr1sAne71dc');
INSERT INTO `bestop_member` VALUES ('267', null, 'ef6378510ceaee7fa774962a7847fd0c', 'HvTyYZ', '邱逸晴', '1551340819', null, null, null, null, '0', '18306189789', null, '60', '32020601170', '32020688202083', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('268', null, 'bc2a9fb5041bd19579b227ca69f7cb3a', 'WgJeyj', '王琴昌', '1551340819', null, null, null, null, '0', '15961868229', null, '56', '32020601169', '32020688202093', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('269', null, 'fce1517c95731b5459c77444313747ac', 'fXNi4P', '胡文', '1551340819', null, null, null, null, '0', '13306178038', null, '56', '32020601149', '32020688202137', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('270', null, '1f7a28c9e8c3432c4056bdba19e59c2c', 'uhj4dn', '刘晓静', '1551340819', null, null, null, null, '0', '15995257533', null, '62', '32020601172', '32020688202098', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('271', null, 'fb30a09cc6c26be8c175924a0fecaa62', '9bIQ38', '毛琬懿', '1551340819', null, null, null, null, '0', '18362370390', null, '74', '32020601019', '32020688202100', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('272', null, '991b4dfcbf0b1c4af64be3ea58dd9e84', 'lB2NgT', '陆海英', '1551340819', '1551749768', '192.168.23.1', null, null, '0', '13656179656', null, '54', '32020601186', '32020688202122', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961KDL-fRxPTIvlJfOF9wOfq8');
INSERT INTO `bestop_member` VALUES ('273', null, '0606d6a0ad5e0d41143ce3aa62885fdf', 'VL6rA3', '郑月英', '1551340819', null, null, null, null, '0', '15152263018', null, '56', '32020601191', '32020688202105', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('274', null, '89fcdf62b2913f85979caa068933311a', 'bPgDXc', '姚海霞', '1551340819', null, null, null, null, '0', '15861682568', null, '62', '32020601192', '32020688202114', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('275', null, '433d099429a0a21d93520f5eb3ca1bf0', 'Jqt9X7', '朱菊亚', '1551340819', null, null, null, null, '0', '15190268962', null, '56', '32020601201', '32020688202113', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('276', null, '5156999c30b36fedd0cb4ecf1200d6a5', 'P9BTBg', '华荷娣', '1551340819', null, null, null, null, '0', '13861887962', null, '62', '32020601184', '32020688202123', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('277', null, 'a225fa0b9ff4a25f6834a64a875b1402', 'eTM6Iz', '殷兰娟', '1551340819', null, null, null, null, '0', '18012387569', null, '74', '32020601125', '32020688202242', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('278', null, 'a6d3f8c6aa6c62c2ba86faecbc89f180', 'KAnFCI', '杨春花', '1551340819', null, null, null, null, '0', '18762804224', null, '62', '32020601172', '32020688202208', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('279', null, '66b5d0ea7f787a284ec44d3b6e03b494', 'bGPjWS', '周晓霞', '1551340819', null, null, null, null, '0', '13616190887', null, '58', '32020601003', '32020688202189', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('280', null, '482413ef22ce21611bb2c9b610eec6e8', '4KZc1l', '俞建平', '1551340819', null, null, null, null, '0', '13706179215', null, '71', '32020601188', '32020688202203', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('281', null, 'a0d411ed880753080aeac5d719c71023', 'eK9FJ3', '顾冰', '1551340819', null, null, null, null, '0', '13771039038', null, '55', '32020601012', '32020688202239', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('282', null, '1d71ad013cc7eec4ec106b517d43c0db', 'NpG6FA', '王晓敏', '1551340819', null, null, null, null, '0', '15365238271', null, '55', '32020601112', '32020688202243', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('283', null, '3e01a7d9c56b13b7ea452973c6484687', 'p9F1nf', '顾燕红', '1551340819', null, null, null, null, '0', '15961725259', null, '71', '32020601187', '32020688202174', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('284', null, 'd76a67097092c93eb14052b744129a29', 'gcSyaq', '吴一心', '1551340819', null, null, null, null, '0', '13921139211', null, '54', '32020601186', '32020688202217', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('285', null, '3f73379eafe0f12d0a85b2dcb6361fac', '8ZC9br', '李德明', '1551340819', null, null, null, null, '0', '13961725897', null, '71', '32020601006', '32020688202173', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('286', null, '1e502d153aa0a1da0dc598e764437db8', 'qsdrms', '朱伟杰', '1551340819', null, null, null, null, '0', '18036000700', null, '74', '32020601019', '32020688202195', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('287', null, '0a19398fdede9ca84208a0eb77c47010', 'tZY5Jy', '虞燕峰', '1551340819', null, null, null, null, '0', '18020305049', null, '55', '32020601112', '32020688202251', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('288', null, '09f48576dbc20855fedc3d353143d25c', 'Qmxiua', '包小凤', '1551340819', null, null, null, null, '0', '15951568206', null, '62', '32020601029', '32020688202319', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('289', null, 'c8c7a61b914cd9048f0c29fddbcf560e', '9fKgRq', '朱丹', '1551340819', '1551851980', '192.168.23.1', null, null, '0', '15961895073', null, '56', '32020601226', '32020688202231', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961Da8mhMlTMPCcQnQ8VooId4');
INSERT INTO `bestop_member` VALUES ('290', null, 'b2757ee18d30cd8ec4d62fbe990be324', 'npnsWV', '张萍', '1551340819', null, null, null, null, '0', '13915279895', null, '62', '32020601029', '32020688202158', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('291', null, '4863eb1c125f045d4bc4d021a3c7fffd', 'KYcd8G', '吕凤仙', '1551340819', null, null, null, null, '0', '13961737677', null, '62', '32020601029', '32020688202228', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('292', null, '1d71a09b2f01e67b10ac9fe10d521e14', 'QxE28E', '张俊仕', '1551340819', null, null, null, null, '0', '15261556320', null, '73', '32020601146', '32020688202166', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('293', null, 'fab4b3fa7f8196cccd79316cd7088c99', 'SDUPB6', '强晓东', '1551340819', null, null, null, null, '0', '13601513959', null, '64', '32020601010', '32020688202315', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('294', null, 'b6df189c8b80d3fce82c212cf797ab9d', 'SCMZdB', '张刘杰', '1551340819', null, null, null, null, '0', '13771065400', null, '71', '32020601188', '32020688202327', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('295', null, '6aefd9c9204f9b37e781b65446513517', 'U7rz7H', '张见侃', '1551340819', null, null, null, null, '0', '13921138654', null, '73', '32020601146', '32020688202332', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('296', null, 'c6556ada01634ecc2c21be073b06507c', 'IWuVmV', '路艳', '1551340819', null, null, null, null, '0', '13511653156', null, '71', '32020601187', '32020688202334', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('297', null, 'b7f8de3455ef7326fdd627613c409280', 'q4b4ky', '赵建华', '1551340819', null, null, null, null, '0', '13961743379', null, '54', '32020601106', '32020688202355', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('298', null, 'ccf50572705489148d11e48af726e9c3', 'QEef1q', '余向忠', '1551340819', null, null, null, null, '0', '13771434593', null, '71', '32020601198', '32020688202356', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('299', null, '88e1fd4fa7ae757830edde9db2c2f35e', 'xy5HRb', '王善莉', '1551340819', null, null, null, null, '0', '15852500083', null, '56', '32020601094', '32020688202370', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('300', null, '45929e2f439cad32bd68cdbb3c321afd', 'tFll4s', '庄艳芬', '1551340819', null, null, null, null, '0', '13585088821', null, '73', '32020601204', '32020688202360', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('301', null, '017db5800846cda0d076f77f7d56783d', 'WcfMHY', '张红星', '1551340819', null, null, null, null, '0', '15152231991', null, '64', '32020601xxx', '32020688202389', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('302', null, 'b9db88a28c36d12bfa1ac11ad5bb09f6', 'sk9a56', '蒋源钦', '1551340819', null, null, null, null, '0', '13812194887', null, '56', '32020601149', '32020688202381', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('303', null, '0ade05eb9bc6dcf910f330284ab4b7d2', '5arFbC', '张燕英', '1551340819', null, null, null, null, '0', '13405779845', null, '61', '32020601205', '32020688202400', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('304', null, '56e8ca43ab9cdf46ea544df407aa1519', 'wfLrVl', '管晓刚', '1551340819', null, null, null, null, '0', '13506170373', null, '55', '32020601061', '32020688202408', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('305', null, '3aaa02f7271b709e13429ea7617d9c82', 'Uj3Q81', '杨夏晨', '1551340819', null, null, null, null, '0', '15852819150', null, '55', '32020601178', '32020688202393', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('306', null, 'd3be5864c3b18c094280d8eed8994aef', 'UzcJc2', '华琴珍', '1551340819', null, null, null, null, '0', '13616191299', null, '56', '32020601094', '32020688202430', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('307', null, 'a6902730e17240c862cc0d67b0ff3c32', 'BnfzFa', '俞涛', '1551340819', '1551749636', '192.168.23.1', null, null, '0', '15190319527', null, '64', '32020601194', '32020688202455', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961My-9orKD4M8NGSnm-XZjBc');
INSERT INTO `bestop_member` VALUES ('308', null, '8641da3aec6a069e5866dc3cc8538b8d', 'EAGY1E', '周静华', '1551340819', null, null, null, null, '0', '18921197539', null, '74', '32020601206', '32020688202433', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('309', null, 'efd9580f87baed50e278585a05e5a4d3', 'sZ8rIe', '华立军', '1551340819', null, null, null, null, '0', '15061823262', null, '71', '32020601006', '32020688202442', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('310', null, 'ac22b9e3310bfff74bc2bd227a616b67', 'Jc98Va', '汪娟', '1551340819', null, null, null, null, '0', '13812037950', null, '60', '32020601196', '32020688202471', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('311', null, '0e75a30aa0a0bcb9ef415841b5cbe5eb', 'VyqU6F', '管澄澄', '1551340819', null, null, null, null, '0', '15251616283', null, '64', '32020601194', '32020688202534', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('312', null, 'd04d6c7909c2f2fddc6db630d81b122d', 'P9zAwQ', '于光碧', '1551340819', null, null, null, null, '0', '13584181750', null, '54', '32020601016', '32020688202463', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('313', null, '0ea099730993263e6df978b2cfe9ee87', 'TPypdR', '吴松远', '1551340819', '1551834201', '192.168.23.1', null, null, '0', '13861761030', null, '64', '32020601096', '32020688202529', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LYjZcKVSA5EmLOjL7Nxw_I');
INSERT INTO `bestop_member` VALUES ('314', null, '03215028ea9b58742cbaba11dfc78278', 'hRhHU3', '孙城琳', '1551340819', null, null, null, null, '0', '13961789627', null, '63', '32020601083', '32020688202496', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('315', null, 'da350bff00baed32e6d4f5b543c8f832', '7RF72l', '李云', '1551340819', null, null, null, null, '0', '13961842314', null, '56', '32020601191', '32020688202499', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('316', null, 'b1c966ed05ba061ad2ad9496b8a3e619', 'Iz28WM', '吴宇红', '1551340819', null, null, null, null, '0', '18921104367', null, '64', '32020601069', '32020688202489', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('317', null, '61b106795eca15165cbe4196ab4817b2', '2XNSCi', '卫柯明', '1551340819', '1551774692', '192.168.23.1', null, null, '0', '13506195981', null, '55', '32020601024', '32020688202493', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961PIMIyMTgX1GyPh1yaaJLV8');
INSERT INTO `bestop_member` VALUES ('318', null, 'e51801fb24dc7059920548ba27169ca0', 'W6ZzEm', '杨潇玲', '1551340819', null, null, null, null, '0', '15152238651', null, '64', '32020601183', '32020688202477', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('319', null, 'b391539a8e80a18001a90ea5dea0b753', 'q6wxRu', '费玥', '1551340819', null, null, null, null, '0', '15995276162', null, '59', '32020601098', '32020688202510', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('320', null, '5ad44a6ec754cef49376a103825a2f5a', '82Dx8A', '冯晓军', '1551340819', null, null, null, null, '0', '13861875995', null, '55', '32020601011', '32020688202513', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('321', null, '77af8d3399546cba734e1c2e2ee1199d', 'Ufh6z8', '顾金忠', '1551340819', null, null, null, null, '0', '13812530510', null, '71', '32020601187', '32020688202474', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('322', null, '39524c9ee7c31ded7db5ce1b6b181e3a', 'UqxXMj', '沈凤鸣', '1551340819', null, null, null, null, '0', '13812541813', null, '64', '32020601009', '32020688202480', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('323', null, '1a0c27ef0480073732feabba87ec781a', 'rvQ32l', '陈君红', '1551340819', null, null, null, null, '0', '13771472853', null, '60', '32020601170', '32020688202470', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('324', null, '9df3be7a21086e2499137f89978a182d', 'hHzgx7', '陈玉萍', '1551340819', null, null, null, null, '0', '15951509662', null, '58', '32020601003', '32020688202475', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('325', null, '4f248d5910eb92caf23592544237ecb6', '22bhgU', '张红英', '1551340819', null, null, null, null, '0', '15852811276', null, '59', '32020601127', '32020688202628', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('326', null, '0d1f3a3899f489231894172951f2863b', 'kYqZf4', '许敏娟', '1551340819', '1551832585', '192.168.23.1', null, null, '0', '13585073961', null, '58', '32020601110', '32020688202563', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Ef2KcBvhyunUJEyaR-mLUo');
INSERT INTO `bestop_member` VALUES ('327', null, 'f37d28129d35ee8d8612a3a53f633c93', 'em2CLd', '顾红', '1551340819', null, null, null, null, '0', '18915287385', null, '59', '32020601098', '32020688202581', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('328', null, '97213e178469280601d6db17eb7ed246', 'gvRBG4', '谷静', '1551340819', '1551668641', '192.168.23.1', null, null, '0', '18906178352', null, '54', '32020601016', '32020688202559', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961DnajTtfBsd_buZ0bu6O3wU');
INSERT INTO `bestop_member` VALUES ('329', null, 'd1f05ce5e3ebe4cef4bdb7a0ec128974', 'Y79hND', '冯斌', '1551340819', null, null, null, null, '0', '15852506650', null, '60', '32020601162', '32020688202572', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('330', null, '4e27b9eb4d227a7edf8734453143e204', 'Njcttd', '谢娟', '1551340819', null, null, null, null, '0', '15061867869', null, '58', '32020601003', '32020688202576', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('331', null, '35d40e373afb5ea1a6f56436a6b87fed', 'B1gXWU', '季惠娣', '1551340819', null, null, null, null, '0', '13812084365', null, '56', '32020601169', '32020688202586', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('332', null, 'ce44d99143c1bdb3e5dbc2144a40ba0d', 'Ke2mu9', '肖国强', '1551340819', null, null, null, null, '0', '13585000701', null, '73', '32020601208', '32020688202631', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('333', null, '778699c8ad9d8b3ef8ccaf60028dee2e', 'ILVbmB', '袁良草', '1551340819', null, null, null, null, '0', '13812288267', null, '73', '32020601146', '32020688202625', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('334', null, 'e732cbced9331b0cb51a0bba42dde7b5', 'BVKEMe', '石中珉', '1551340819', null, null, null, null, '0', '15345105808', null, '74', '32020601004', '32020688202549', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('335', null, 'f119382c46fdc2b415ca3989eb5dd5a6', 'vYZ8wm', '钱耀琴', '1551340819', null, null, null, null, '0', '13771115730', null, '62', '32020601192', '32020688202539', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('336', null, '65fd51c1d20bf04f97773b7469c5b7d5', 'MMe1g4', '王竹青', '1551340819', '1551659348', '192.168.23.1', null, null, '0', '15006175349', null, '58', '32020601110', '32020688202567', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961JirehViyD7nEz9NFL1UZKY');
INSERT INTO `bestop_member` VALUES ('337', null, 'de768704e2d3b434216ff32e6c33b69f', 'TZHhZE', '沈聪', '1551340819', null, null, null, null, '0', '13812509128', null, '62', '32020601214', '32020688202604', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('338', null, 'a6371c2ad1fdfc97071ea221a5fd4e2d', 'htZc5I', '肖丽菊', '1551340819', null, null, null, null, '0', '13861708987', null, '73', '32020601190', '32020688202606', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('339', null, 'c7f2919cade32cb42dfd7d91f4c6d6f6', 'ZjySzt', '章凤兰', '1551340819', null, null, null, null, '0', '13585008300', null, '73', '32020601007', '32020688202582', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('340', null, '366570063bc89688d79c3609d02df3fb', 'AjQlyg', '陈君祥', '1551340819', null, null, null, null, '0', '13616193921', null, '60', '32020601196', '32020688202575', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('341', null, 'c8b12f41e8b6f9812a3c902f4fc2dc3c', 'sUUdVz', '庄艳红', '1551340819', null, null, null, null, '0', '13771151019', null, '73', '32020601215', '32020688202633', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('342', null, '5ba0cc3fd1a4b1144e3d53cc1389e993', 'lSsYI9', '王红娟', '1551340819', null, null, null, null, '0', '15895301162', null, '63', '32020601227', '32020688202695', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('343', null, '756c5acd9c359eced17f72f43db14a0a', '9vswr7', '沈波', '1551340819', null, null, null, null, '0', '18061972968', null, '74', '32020601109', '32020688202706', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('344', null, 'a7c5c6c2c5af12a497bbdeec22db2357', 'SB1Yj2', '石慧', '1551340819', null, null, null, null, '0', '13861702930', null, '71', '32020601006', '32020688202659', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('345', null, '055dfd80fdab55510e6415178234f217', '3Gqe2E', '何燕', '1551340819', null, null, null, null, '0', '15161585929', null, '60', '32020601224', '32020688202716', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('346', null, '5092ab77d6c3ef8be6e63baf3181b8ca', '6pIkW5', '俞灵姣', '1551340819', null, null, null, null, '0', '13771175437', null, '71', '32020601188', '32020688202730', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('347', null, 'bbcf25e88dde956870e96a2b9e721655', '8uiJlD', '徐俊烨', '1551340819', null, null, null, null, '0', '15261599203', null, '71', '32020601187', '32020688202644', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('348', null, '1db2d68e1664ede3cb0be6a8d5d0902e', '7YYI1M', '李洁', '1551340819', '1551746846', '192.168.23.1', null, null, '0', '18961838883', null, '73', '32020601007', '32020688202686', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961HmGaoWV3fML6u2y6TJqX3k');
INSERT INTO `bestop_member` VALUES ('349', null, 'fe8373d5e7570b08e60ddd3d93e1cb2e', 'utXZAI', '陈霞', '1551340819', null, null, null, null, '0', '15306172018', null, '54', '32020601106', '32020688202694', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('350', null, '027a9a1c799b09b2892981940ec00438', 'gsYNYL', '奚冬英', '1551340819', null, null, null, null, '0', '13606172275', null, '62', '32020601173', '32020688202689', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('351', null, '31f95fef885d4f271f161419b48fcac6', '66wvqw', '钱映红', '1551340819', null, null, null, null, '0', '15061502920', null, '73', '32020601204', '32020688202665', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('352', null, '5f4760e31b455c76fa85f286de5b47e4', 'ltCGdS', '周燕云', '1551340819', null, null, null, null, '0', '15006172996', null, '74', '32020601004', '32020688202703', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('353', null, 'f524d7ce6c6d33c92084d098c406104e', 'GC717y', '丁蓉', '1551340819', null, null, null, null, '0', '13921176600', null, '64', '32020601069', '32020688202667', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('354', null, 'cd292d48ed57c605c0df1233bc01c268', 'BLnvBx', '刘秋华', '1551340819', '1551672324', '192.168.23.1', null, null, '0', '13606198614', null, '54', '32020601186', '32020688202653', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961NQONn9muaJtfI7H5_L4Gls');
INSERT INTO `bestop_member` VALUES ('355', null, 'b67d084b2868664b16f090af3cf6fd3d', 'CduXb8', '黄鹤明', '1551340819', null, null, null, null, '0', '18762622781', null, '60', '32020601002', '32020688202698', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('356', null, '4efbf031fe8de25a981c1e487b8f6699', 'HFcHRx', '曹燕', '1551340819', null, null, null, null, '0', '13961893218', null, '60', '32020601196', '32020688202642', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('357', null, '856679e34cd6080b148f2aa71dd27f32', 's38uhi', '吴裕亚', '1551340819', null, null, null, null, '0', '15295443039', null, '62', '32020601200', '32020688202965', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('358', null, '291c20e7bc2146d3ac7f6a88167bcc9c', 'fI5e9R', '彭云', '1551340819', null, null, null, null, '0', '18651025652', null, '74', '32020601125', '32020688202973', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('359', null, 'be2c4007ba269be1fa43198c80a93ea8', 'GWcCp2', '匡雨妹', '1551340819', null, null, null, null, '0', '13013683592', null, '71', '32020601030', '32020688202775', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('360', null, 'ca3bc53a0e9443ea2f0204e6170abac8', '8Qd6iZ', '朱义梅', '1551340819', null, null, null, null, '0', '13338782786', null, '58', '32020601225', '32020688202839', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('361', null, '20b74c6627b9e4666a04faebe74aac7e', 'Mg1w2Y', '时彩琴', '1551340819', null, null, null, null, '0', '13951572518', null, '74', '32020601206', '32020688202956', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('362', null, 'c717d89ff4e12d2d904f3d3ff1c2dea1', 'WPwMCw', '平惠波', '1551340819', '1551878234', '192.168.23.1', null, null, '0', '13400022058', null, '74', '32020601206', '32020688202776', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961LE21LLBvRf_14xa9NY4DQM');
INSERT INTO `bestop_member` VALUES ('363', null, '2f24c7e05f2c9d07d6b0f4dfe11edc13', 'Kw7J2y', '顾青', '1551340819', null, null, null, null, '0', '15716172977', null, '54', '32020601213', '32020688202777', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('364', null, 'c2c5ff31cc2c141a731f80005c6151c4', 'i64qJi', '沈莉', '1551340819', null, null, null, null, '0', '13812513132', null, '60', '32020601162', '32020688202791', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('365', null, 'fb37bc2e4f9a0a8154934cb1811b9fea', 'QWxmyI', '冯薪霖', '1551340819', null, null, null, null, '0', '13665119908', null, '55', '32020601076', '32020688202884', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('366', null, 'ff4850c3ff99d222c56d2db84581bbda', 'yd2jBg', '蒋虎英', '1551340819', null, null, null, null, '0', '13961793182', null, '58', '32020601110', '32020688202747', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('367', null, '03ff4bb8efac30b8f39924620c248596', 'qIWjTw', '郭晓娜', '1551340819', null, null, null, null, '0', '13506190709', null, '55', '32020601178', '32020688202893', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('368', null, '89bf783d6ec7c57b99997eb7aa264145', 'n3pvk1', '赵美英', '1551340819', null, null, null, null, '0', '13771028612', null, '62', '32020601184', '32020688202857', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('369', null, 'd9ea366f44ea48235754ef66dfc9f5cd', 'riypSm', '秦梦娟', '1551340819', null, null, null, null, '0', '13951588390', null, '73', '32020601208', '32020688202919', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('370', null, 'ce45499e8fe8d446aaf1e7ab712c184e', 'D5GbSB', '刘洪霞', '1551340819', null, null, null, null, '0', '15190286525', null, '60', '32020601196', '32020688202948', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('371', null, '78311b35a36003dd03d987b653f6472f', '85wki5', '张燕琴', '1551340819', null, null, null, null, '0', '13861727297', null, '58', '32020601110', '32020688202846', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('372', null, '69506b8c2d100eabf8bbc092fd6726ed', 'WMi6fe', '刘华', '1551340819', null, null, null, null, '0', '15861691655', null, '64', '32020601183', '32020688202943', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('373', null, '2ca7563b0e086941dd57211cbe4522ea', 'aRVarw', '吕聚科', '1551340819', null, null, null, null, '0', '13861825936', null, '55', '32020601012', '32020688202756', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('374', null, 'd123ae223c8aa0d39d39e112f4b86e6e', '8IAE4P', '仰素林', '1551340819', null, null, null, null, '0', '13914151057', null, '61', '32020601210', '32020688202937', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('375', null, '2b39e42eb66aa20680d50310890c09bd', 'ITffuE', '周秋兰', '1551340819', null, null, null, null, '0', '13585018373', null, '64', '32020601015', '32020688202779', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('376', null, 'c744151fabc9007f7d39c990b0ae9f69', '3DVB4D', '宋琳颖', '1551340819', null, null, null, null, '0', '13585003315', null, '55', '32020601178', '32020688202763', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('377', null, '775423ade66c545295bdf71d716893f3', 'Erv3Dr', '包若君', '1551340819', null, null, null, null, '0', '18921523952', null, '62', '32020601200', '32020688202746', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('378', null, 'b9dc23c720563109ec8f1946dbceb708', '2SHiGR', '张湘英', '1551340819', null, null, null, null, '0', '13912385115', null, '61', '32020601205', '32020688202861', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('379', null, '21d42c7d1b4c013166fbcab27f9ea842', 'k3rUFC', '田茂敬', '1551340819', null, null, null, null, '0', '18168907985', null, '56', '32020601191', '32020688202868', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('380', null, 'eddb69bfa14de329a7719c1933335dcd', '7mXIXw', '陈金秀', '1551340819', null, null, null, null, '0', '18851585384', null, '56', '32020601226', '32020688202871', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('381', null, 'c93a6e293b9f1f406a164d9b7b078a02', 'JsJMMt', '李晓航', '1551340819', null, null, null, null, '0', '18051571839', null, '71', '32020601228', '32020688202939', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('382', null, 'eff7fb62126efc87d8f2a32f83e5350e', 'quehfE', '叶芳兰', '1551340819', null, null, null, null, '0', '13921129147', null, '73', '32020601146', '32020688202924', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('383', null, '9fb3e2b7d4e3aac7f1be2e4bc954bf92', 'EZRUiu', '芮一犇', '1551340819', null, null, null, null, '0', '18861810391', null, '64', '32020601096', '32020688202932', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('384', null, 'ff5ce00f8038321bcde4944b7481898c', 'MFGv5h', '王华琴', '1551340819', null, null, null, null, '0', '13921266258', null, '56', '32020601169', '32020688202870', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('385', null, 'afb2b785b6b9da1b1aa482deae3838d5', 'vXi1Vf', '管建芬', '1551340819', null, null, null, null, '0', '15852712953', null, '54', '32020601186', '32020688202901', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('386', null, '020775638fb6cf8a519c7a3afae91d51', '1dN5QA', '潘静', '1551340819', null, null, null, null, '0', '18961789912', null, '74', '32020601154', '32020688202957', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('387', null, '31323ef1f09b56e4d09678f77271073b', 'nnxPYk', '张妙', '1551340819', null, null, null, null, '0', '18006181068', null, '58', '32020601003', '32020688202963', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('388', null, '81139dc5183e56d492f1104a5f18f6da', 'x5bjLj', '李英', '1551340819', null, null, null, null, '0', '13915353292', null, '62', '32020601029', '32020688202864', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('389', null, 'd8a717dcd7e370ac30c417cc85910a28', 'ysjTD1', '左银平', '1551340819', null, null, null, null, '0', '18914160978', null, '61', '32020601153', '32020688203004', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('390', null, '94450189a611e3c27a739571e2525d31', 'c2PhqN', '吴建锋', '1551340819', null, null, null, null, '0', '13771488772', null, '54', '32020601150', '32020688201962', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('391', null, 'df204b04a9fe757a92a10f58ffbc2792', 'tg7eZR', '颜凯', '1551340819', null, null, null, null, '0', '13656198207', null, '54', '32020601131', '32020688201726', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('392', null, 'dc46bd61d9f3580e0389173aff5a196d', 'Kfw8iz', '曹雪萍', '1551340819', null, null, null, null, '0', '13013645525', null, '54', '32020601131', '32020688201735', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('393', null, 'd78701a95843d777860f48013fb790bb', 'wpbfeD', '周琴', '1551340819', null, null, null, null, '0', '13771128031', null, '61', '32020601220', '32020688203012', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('394', null, 'ad0a29ff9c89087f68ce09e3a3b8dce2', 'EtvHSQ', '杨洁茹', '1551340819', '1551487692', '192.168.23.1', null, null, '0', '13861879691', null, '54', '32020601219', '32020688201642', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961BuCa0rQhuSJkWLvhPUzSHY');
INSERT INTO `bestop_member` VALUES ('395', null, '8d0dbeb34b69815c0e8e99bd550c572c', 'c3w3a3', '陈丽娜', '1551340819', null, null, null, null, '0', '18961703111', null, '61', '32020601205', '32020688202997', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('396', null, 'de6a3af2e592162b89a825d133117a65', 'IVHqhj', '戚凌云', '1551340819', null, null, null, null, '0', '13771553382', null, '54', '32020601150', '32020688201355', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('397', null, 'f8e1232b0034a4db86e69df7c872d109', 'W5S1Hk', '许燕萍', '1551340819', null, null, null, null, '0', '13912352078', null, '64', '32020601015', '32020688203016', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('398', null, '93c46e81ee860ccd09738f33096741c3', 'a3DnFK', '唐晓红', '1551340819', null, null, null, null, '0', '13665151572', null, '71', '32020601006', '32020688203026', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('399', null, '9c66c0b74a214c9aa0c79f45b6a4dd4c', 'MaA13Q', '张燕芳', '1551340819', null, null, null, null, '0', '13771020342', null, '64', '32020601015', '32020688203036', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('400', null, '122cfc2180fbb520acb596745ab643f1', 'kYL5mA', '倪丽娟', '1551340819', null, null, null, null, '0', '13861700313', null, '55', '32020601212', '32020688203042', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('401', null, '9c4620eda500669ceacb9740c1a5caf3', 'vMcnmF', '史科伟', '1551340819', null, null, null, null, '0', '18661023778', null, '60', '32020601229', '32020688203056', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('402', null, '29a4e450443379ffafa32a5615ef94da', 'SRrcBm', '周彐珂', '1551340819', null, null, null, null, '0', '15206182559', null, '61', '32020601210', '32020688203043', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('403', null, 'ac745707717d5ef938bea590ca4138ad', 'TKvijp', '郑丽红', '1551340819', null, null, null, null, '0', '13961855218', null, null, '32020601032', '32020688000868', null, null, null, null, null, null);
INSERT INTO `bestop_member` VALUES ('404', null, '536344750f2541672b54202ca47c8394', '1Njd17', '周燕坭', '1551340819', null, null, null, null, '0', '18020303890', null, '64', '32020601xxx', '32020688200953', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('405', null, 'c2261c319b6b76edfc2805e8db6ba7cb', 'pvBimd', '刘晔', '1551340819', '1551662145', '192.168.23.1', null, null, '0', '18352527315', null, '64', '32020601xxx', '32020688201288', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Me6-s1rRzt5rRTUiCEUdbc');
INSERT INTO `bestop_member` VALUES ('406', null, '8d2cd3d0af440a8c5293788652233bfc', '3LQEeY', '余迪', '1551340819', '1551668117', '192.168.23.1', null, null, '0', '18861772298', null, '55', '32020601178', '32020688201425', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LX4rSEpcdJeLu27Iu_B6-E');
INSERT INTO `bestop_member` VALUES ('407', null, '3b1e1f777272cf7ab713cf7f0bbc51d7', 'pVREbk', '何雪', '1551340819', null, null, null, null, '0', '15251676670', null, '55', '32020601178', '32020688201720', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('408', null, '17fc25304acc17217c0796db1d1d940f', '1Ik1fP', '吴新生', '1551340819', null, null, null, null, '0', '13812005159', null, '64', '32020601015', '32020688203025', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('409', null, 'dc0977ab82b147db26ec16f963eb12a3', 'zg8ymY', '刘浩萍', '1551340819', null, null, null, null, '0', '18014948382', null, '62', '32020601214', '32020688203060', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('410', null, '78f353a8a79b6060c937b9576521496a', 'RswVHl', '蔡敏红', '1551340819', null, null, null, null, '0', '13861868082', null, '54', '32020601186', '32020688203065', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('411', null, 'e2dc405a4bf6f6263be3d89bbf269475', 'MqGmVY', '金建琴', '1551340819', null, null, null, null, '0', '13914128008', null, '60', '32020601229', '32020688203051', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('412', null, '200692cc4377129e72b2ee9445b753ce', 'dKe5Ku', '殷树英', '1551340819', null, null, null, null, '0', '13921394703', null, '62', '32020601184', '32020688203052', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('413', null, '9b727384901ece8e8f768f9397c12f36', '7BN27Z', '蒋向红', '1551340819', null, null, null, null, '0', '13812088261', null, '64', '32020601069', '32020688203053', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('414', null, '9fe19436ed95a191c33f55b450e12104', 'ygrQCv', '万志华', '1551340819', null, null, null, null, '0', '15961765200', null, '62', '32020601029', '32020688203021', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('415', null, '57d2a9f688fb273d06156a573060c36a', 'Vqh2gb', '严长度', '1551340819', null, null, null, null, '0', '15895369532', null, '54', '32020601115', '32020688203078', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('416', null, '3a458799444a03b2551e8e2d7f416c0c', 'ZbhFnm', '张小华', '1551340819', null, null, null, null, '0', '15852849530', null, '73', '32020601190', '32020688203079', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('417', null, 'a8625a8ae1ec37c2d18e4fe325744f55', 'qLD95f', '陆萍', '1551340819', null, null, null, null, '0', '13861887280', null, '60', '32020601224', '32020688203024', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('418', null, 'aa68e23d955b2eedc8f5a15384323e93', 'ch5sne', '周峰', '1551340819', null, null, null, null, '0', '13961776134', null, '61', '32020601210', '32020688203029', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('419', null, '82d7e1ab4834eeafaeea6c13c18a8655', 'RRdDT9', '华慧', '1551340819', '1551659347', '192.168.23.1', null, null, '0', '13912472765', null, '58', '32020601003', '32020688203073', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Cht3z9qdD8NgzmGAd8p8YQ');
INSERT INTO `bestop_member` VALUES ('420', null, 'f4adbf53a61573569fc22d61b56fb06c', 'R51tPY', '杨静', '1551340819', '1551662232', '192.168.23.1', null, null, '0', '13806192823', null, '59', '32020601098', '32020688203067', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961G7mwqFCyhma1wyrhg8hQd8');
INSERT INTO `bestop_member` VALUES ('421', null, 'd080e25024304a71de7abe794f9705cb', 'NsAwta', '孙伟春', '1551340819', null, null, null, null, '0', '13921503220', null, '61', '32020601221', '32020688203082', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('422', null, '25803f9fee5750507a33ae1a46c6a966', 'cQtnVY', '王晓波', '1551340819', null, null, null, null, '0', '13585071078', null, '64', '32020601194', '32020688203100', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('423', null, 'e91d5818e7ef119878d80f9d8015e78d', 'cXcgnm', '高珊红', '1551340819', '1551841550', '192.168.23.1', null, null, '0', '18762801585', null, '56', '32020601201', '32020688203088', '江苏', '无锡', '国寿惠山支公司', null, '5', 'oK_961BoBlf3QnnMGpgtdAxcPGHQ');
INSERT INTO `bestop_member` VALUES ('424', null, 'a73e3501b5e72471aa1936459783e3c0', '7fxuF8', '张洁', '1551340819', null, null, null, null, '0', '13961717804', null, '60', '32020601162', '32020688203112', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('425', null, '31757ea0f02a9bdc1ed10a22381d3ca8', 'dlYEjd', '高仁伟', '1551340819', null, null, null, null, '0', '13921114900', null, '61', '32020601222', '32020688203092', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('426', null, '86ed6817e88f46e6e0bb58cc0b434f9d', 'yJdUpj', '王勇', '1551340819', null, null, null, null, '0', '13914126066', null, '63', '32020601083', '32020688203118', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('427', null, '0e16394a3353da6b2e4be36f0f7f09e6', 'ZTy9cp', '徐志界', '1551340819', null, null, null, null, '0', '13506175802', null, '64', '32020601010', '32020688203121', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('428', null, '550c7e7e7185080f81ae427d2186e69f', 'h7kmbd', '高群红', '1551340819', null, null, null, null, '0', '13861872080', null, '71', '32020601188', '32020688203113', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('429', null, 'fdfaa66905f78ab47fc6613e1a36a255', 'JvjEM3', '胡新亚', '1551340819', null, null, null, null, '0', '13327906802', null, '73', '32020601204', '32020688203105', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('430', null, '08b94cfce6d88b6b708becefbc563adb', 'GN27ZG', '周雪芳', '1551340819', null, null, null, null, '0', '13771508952', null, '62', '32020601216', '32020688203114', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('431', null, '67e1d5b0d8152510e77e5dd5ae740c83', 'gj2FWQ', '吴晓华', '1551340819', null, null, null, null, '0', '15852512369', null, '62', '32020601173', '32020688203094', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('432', null, 'c26748b1fbc9b6a69d390ffbf4c99625', 'KuPdpH', '吴海锋', '1551340819', '1551341414', '192.168.23.1', null, null, '0', '18751585975', null, '63', '32020601197', '32020688203096', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961JvyKspDa9obgx2CQ8jxSHs');
INSERT INTO `bestop_member` VALUES ('433', null, 'c4b4e720410741ee235f46db5a997e0d', 'P9KYJf', '张红艳', '1551340819', null, null, null, null, '0', '15861458590', null, '55', '32020601112', '32020688203074', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('434', null, '90cac247b981cdce73157786d85cbc10', 'BUxKT5', '周莉', '1551340819', null, null, null, null, '0', '13701516540', null, '63', '32020601083', '32020688203211', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('435', null, '4dc030f14b0bbb202860cbf6cdd69757', 'aiGPqK', '殷丽芳', '1551340819', null, null, null, null, '0', '18762814057', null, '62', '32020601216', '32020688203150', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('436', null, '8c265acf410c78b1e082d0a89df2ff31', 'aaXhi7', '赵红亚', '1551340819', null, null, null, null, '0', '13961899778', null, '62', '32020601216', '32020688203177', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('437', null, 'a6d3a7af93ad56ede492fabeaf1cbd09', 'AxAYAV', '奚东孝', '1551340819', null, null, null, null, '0', '18952473221', null, '62', '32020601173', '32020688203205', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('438', null, '7b7090ba363dccc422a4776f2b7d35c3', 'HAW2ZY', '黄恺', '1551340819', null, null, null, null, '0', '15852737399', null, '73', '32020601007', '32020688203204', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('439', null, '586205942e4a5eb4f9d7768d5a18cde8', 'PjVQWF', '陈丽', '1551340819', null, null, null, null, '0', '13665135080', null, '63', '32020601211', '32020688203174', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('440', null, '73471f2b006c2bd5e03eefebd6996876', 'xQumkL', '陈扬', '1551340819', null, null, null, null, '0', '13915325068', null, '58', '32020601003', '32020688203176', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('441', null, 'c6e5e8b74fb138eef2ce0704dd33bd65', 'QdA6fN', '俞建媛', '1551340819', null, null, null, null, '0', '13921273551', null, '54', '32020601213', '32020688203212', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('442', null, '1149929471566921cdb329886725198b', 'mz3jZL', '吴春亚', '1551340819', null, null, null, null, '0', '13951564754', null, '63', '32020601211', '32020688203238', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('443', null, '88f1174005ea3d2a51af1227f382ac56', 'IPFXKK', '陈晨', '1551340819', null, null, null, null, '0', '15995229433', null, '74', '32020601004', '32020688203229', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('444', null, 'c456683fa6268f88812dd6447e48aced', 'gkpQLZ', '刘日彬', '1551340819', null, null, null, null, '0', '15006173963', null, '60', '32020601002', '32020688203221', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('445', null, 'd2826d8097016bbc5bab5e6f143db786', '8DpvCm', '余仁桂', '1551340819', null, null, null, null, '0', '18112367632', null, '61', '32020601222', '32020688203247', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('446', null, '8e556079cd833d9bbc52a3d9f315056c', 'v818lv', '肖文兰', '1551340819', null, null, null, null, '0', '13915358948', null, '73', '32020601190', '32020688203250', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('447', null, '78fb0a5c28e0eb3e3374ae8c692f9dae', 'ttqMNy', '吴萍', '1551340819', null, null, null, null, '0', '13906193128', null, '71', '32020601188', '32020688203244', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('448', null, '296156ff1548ae92bdfe8fdba68dd15c', 'd9tcNI', '陈红兰', '1551340819', null, null, null, null, '0', '13616145074', null, '63', '32020601083', '32020688203170', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('449', null, '73917d1145179518df9afbe0a9395ff6', 'x3wzBV', '秦淼', '1551340819', null, null, null, null, '0', '18961797319', null, '74', '32020601206', '32020688203182', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('450', null, '4606062d5df20594927e68eb228277e9', 'ZsF8aR', '殷玉兰', '1551340819', null, null, null, null, '0', '15806178318', null, '59', '32020601168', '32020688203216', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('451', null, '9ff95bf927ee10768ec532ef2b22bd31', '6WYu85', '程敏雪', '1551340819', null, null, null, null, '0', '13812295339', null, '60', '32020601196', '32020688203224', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('452', null, 'dff8a97613757c8f5a950542a1146e25', 'DeQMmi', '朱珍', '1551340819', null, null, null, null, '0', '13921539155', null, '54', '32020601213', '32020688203232', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('453', null, '89cb6af555c85dff4acd20d63e74034c', 'rEkIVB', '谈新芳', '1551340819', null, null, null, null, '0', '18921102637', null, '60', '32020601229', '32020688203235', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('454', null, 'bc7754db966ecbbcee985e46cdee2595', '3t2dWJ', '冯伟', '1551340819', null, null, null, null, '0', '13961440000', null, '61', '32020601205', '32020688203183', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('455', null, '2c0857e37ab4933440c765deb50e0809', 'yQSfcH', '韦燕', '1551340819', null, null, null, null, '0', '13812181453', null, '62', '32020601029', '32020688203246', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('456', null, 'a27392a97d72d4d19bd89678db142f47', 'zlU6z1', '陈莉', '1551340819', null, null, null, null, '0', '13358100659', null, '73', '32020601215', '32020688203249', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('457', null, '23131cdafad6abeedfa171e609f31d03', 'TR1BP1', '余娴', '1551340819', null, null, null, null, '0', '13914104365', null, '62', '32020601216', '32020688203248', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('458', null, 'aec8f228d80739bb8227496cebb4c5e7', 'jhQIlB', '杨娟', '1551340820', null, null, null, null, '0', '13961729987', null, '73', '32020601146', '32020688203252', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('459', null, 'fb0dca80bf2d4545cead92a79f3ff9a5', 'zUzshJ', '邬笑宁', '1551340820', null, null, null, null, '0', '18861509301', null, '63', '32020601211', '32020688203171', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('460', null, 'aa075f3422cc65fc39742cb05e96f1bb', 'Ba28Bz', '金艳', '1551340820', null, null, null, null, '0', '13771027962', null, '54', '32020601016', '32020688203239', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('461', null, 'b440c777eef98f7a7cb48d63ddf9fcfc', 'QB47VR', '计静波', '1551340820', null, null, null, null, '0', '13812283323', null, '73', '32020601007', '32020688203240', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('462', null, '2a954be048f352c6a66953ccf61e3fb4', 'W3fDU3', '华伟道', '1551340820', null, null, null, null, '0', '13771439908', null, '73', '32020601208', '32020688203201', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('463', null, '331b42b17dfc3f10b6e6484c9e848280', 'khWNrm', '张银华', '1551340820', null, null, null, null, '0', '13961868587', null, '73', '32020601021', '32020688203215', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('464', null, 'e40122b7e530fac770442645de04518b', 'prfQ2p', '李金杰', '1551340820', null, null, null, null, '0', '15861587941', null, '58', '32020601003', '32020688203237', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('465', null, '7d7851bb7aa4595d804aad05fdded24b', 'Nvm9ZZ', '丁夏敏', '1551340820', null, null, null, null, '0', '13951560228', null, '63', '32020601211', '32020688203163', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('466', null, '6e07f71296bc01bcdce61f42cb82c0cb', 'NnXGwy', '张丹', '1551340820', null, null, null, null, '0', '13861712460', null, '61', '32020601153', '32020688203263', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('467', null, '3b3541b5616b6660ac07994612cda719', 'NUY5wI', '刘莉萍', '1551340820', null, null, null, null, '0', '15251660655', null, '74', '32020601109', '32020688203268', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('468', null, '4b78b4a809dd040fd1624b81cf414890', 'Gs9ETr', '吴涛', '1551340820', null, null, null, null, '0', '15052107489', null, '71', '32020601228', '32020688203392', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('469', null, '4e316c21adf2f8d8463f03d07f34951b', 'XqYj2F', '彭芳艳', '1551340820', null, null, null, null, '0', '15961786381', null, '60', '32020601224', '32020688203295', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('470', null, 'b81860c690fd3da759ea03a994ab3376', 'JvY4w7', '钱秋香', '1551340820', null, null, null, null, '0', '13961724274', null, '64', '32020601069', '32020688203303', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('471', null, 'ac3bbbd468031e84be5f00fc08f10425', 'JNQ6Nt', '潘琼', '1551340820', null, null, null, null, '0', '13861884034', null, '63', '32020601083', '32020688203358', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('472', null, '49bb0217a2f1cea59dca7949a0a35521', 'XUIg7p', '吴海霞', '1551340820', null, null, null, null, '0', '13915356027', null, '62', '32020601172', '32020688203291', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('473', null, '49932d5f8906bd7422604572671f5c7b', '9AB2Wn', '刘亚娟', '1551340820', null, null, null, null, '0', '13961763200', null, '62', '32020601172', '32020688203292', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('474', null, 'bd6db854c010a14361fa2a5cfbcd554b', 'cVeKqH', '戈佳伟', '1551340820', null, null, null, null, '0', '13912396189', null, '55', '32020601112', '32020688203309', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('475', null, '4cb50016e1c16cad72f344fe60031e5a', 'iyK8eb', '周嘉威', '1551340820', null, null, null, null, '0', '15161545421', null, '63', '32020601083', '32020688203389', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('476', null, '3544e3c79729a74389858b4491dff4ef', 'hq8Hgf', '王小凤', '1551340820', null, null, null, null, '0', '15261508722', null, '73', '32020601215', '32020688203359', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('477', null, '20757bf464352609e2d6cfb554a6ef54', 'Rd7xh4', '董小娣', '1551340820', null, null, null, null, '0', '15190200979', null, '73', '32020601146', '32020688203388', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('478', null, 'c64244f2097fe663f7833badc26513e2', '2CgHfI', '叶荷凤', '1551340820', null, null, null, null, '0', '18018392560', null, '56', '32020601169', '32020688203387', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('479', null, '620fd3d551432d6991ef6556a11dba1b', 'mb5d1v', '郑燕萍', '1551340820', null, null, null, null, '0', '18861873898', null, '59', '32020601055', '32020688203306', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('480', null, '35156cf65703e97e4598aa3acfda7257', '4uQkvZ', '廉柯萍', '1551340820', null, null, null, null, '0', '13706193699', null, '60', '32020601002', '32020688203403', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('481', null, '01962fbd7fe991ddcbdd7e6b88b585a8', 'ns9yWu', '肖静', '1551340820', null, null, null, null, '0', '13812529785', null, '55', '32020601212', '32020688203342', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('482', null, '2adf5de5ad1bd4e307e7e829b5ab9a48', 'DSAvwK', '管春玉', '1551340820', null, null, null, null, '0', '15861573772', null, '64', '32020601015', '32020688203305', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('483', null, 'f9fcad7aa6c7dd8190aed93ab3a1e492', 'brDshv', '张庆鸣', '1551340820', null, null, null, null, '0', '13063623896', null, '55', '32020601001', '32020688203259', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('484', null, '425781c278bd0ec39668429706bcc4c9', 'mFxsqJ', '胡雯', '1551340820', null, null, null, null, '0', '13921399171', null, '73', '32020601215', '32020688203280', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('485', null, 'f6a3d02408b115fd6e16c13e9199aeb5', 'ZRKG4w', '丁燕芬', '1551340820', null, null, null, null, '0', '15306190395', null, '55', '32020601011', '32020688203404', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('486', null, 'e786c55d25af2790995e62a7f71c21ec', 'vDLxhr', '向莹', '1551340820', null, null, null, null, '0', '13861716510', null, '60', '32020601107', '32020688203260', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('487', null, '0b34c49f17e9bb51385a72d3f2edbadb', 'rx9cxP', '陈晓红', '1551340820', null, null, null, null, '0', '13584183080', null, '61', '32020601222', '32020688203366', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('488', null, 'afb9841e25c52f562b8cffb45570053d', 'at5c2G', '居志平', '1551340820', null, null, null, null, '0', '13771180947', null, '62', '32020601214', '32020688203421', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('489', null, '937279006a19598710d901a9ff7d3c2c', 'a45t4F', '周晓华', '1551340820', null, null, null, null, '0', '13400009960', null, '63', '32020601230', '32020688203345', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('490', null, 'f5413ec2919e70dcf9dd2c73ab63e80a', 'N3cKhb', '沈叶', '1551340820', null, null, null, null, '0', '13771013698', null, '63', '32020601083', '32020688203267', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('491', null, '11aaf9c53386caa7ae32c955cf4d7dce', 'B42MV4', '丁小宝', '1551340820', null, null, null, null, '0', '15806173899', null, '63', '32020601211', '32020688203419', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('492', null, '9128d34c87fc1645475c6b0eda87253e', 'FREv1z', '吴晓峰', '1551340820', null, null, null, null, '0', '15052286912', null, '62', '32020601029', '32020688203300', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('493', null, 'c90faf30e5ef7583b8e079546ac9da4b', 'STfsev', '钱士芬', '1551340820', null, null, null, null, '0', '15251661600', null, '55', '32020601178', '32020688203296', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('494', null, 'ef96a5d41421b8638c0a2eccce50bbb2', 'wmiUV5', '刘燕萍', '1551340820', null, null, null, null, '0', '18018391866', null, '61', '32020601221', '32020688203283', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('495', null, '22b83d1b9d8516fb6c2c0ffdbe535698', 'NkaMJc', '宋冬林', '1551340820', null, null, null, null, '0', '18906171583', null, '60', '32020601224', '32020688203261', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('496', null, 'c1daeafeba80dc42e0c203c9834814ab', 'jmTP2I', '刘坤', '1551340820', null, null, null, null, '0', '13584196911', null, '63', '32020601083', '32020688203412', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('497', null, 'c397bb91bd898658acc9bf5f3f833a41', 'YGl2zQ', '张亚东', '1551340820', null, null, null, null, '0', '15756137255', null, '54', '32020601213', '32020688203509', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('498', null, '045575f384cd43bd94aacb505c694460', '1HcQVb', '缪建平', '1551340820', null, null, null, null, '0', '13301517297', null, '73', '32020601215', '32020688203445', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('499', null, '0d4b5bf4f0075dc09d896f4b0df88049', 'UySkBA', '高菲菲', '1551340820', null, null, null, null, '0', '15852766989', null, '56', '32020601226', '32020688203447', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('500', null, '84aa8e2e8e8c81d93e2f162ccdea426c', '9CjiRN', '朱小丹', '1551340820', null, null, null, null, '0', '17768302151', null, '74', '32020601004', '32020688203436', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('501', null, '5ad743279a0feb44110ca31bceef1433', 'd2jNbk', '施振翼', '1551340820', null, null, null, null, '0', '13584197509', null, '71', '32020601030', '32020688203443', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('502', null, '2d30c163afc5cf987173278bbb4a3b07', 'yQ5WGQ', '许虹', '1551340820', null, null, null, null, '0', '13771525572', null, '74', '32020601125', '32020688203429', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('503', null, 'e58efdd19ed60dd74857f465494a2334', 'A72ICC', '蔡海洋', '1551340820', null, null, null, null, '0', '18552146710', null, '63', '32020601230', '32020688203424', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('504', null, '7baad37d44cfc849d4159b970ce1920d', 'eWYxkD', '徐明', '1551340820', null, null, null, null, '0', '13616195630', null, '54', '32020601150', '32020688203460', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('505', null, 'ec167743ba83bd627495ee5cd8ea24e0', 'PrI2qv', '许均', '1551340820', null, null, null, null, '0', '13921534694', null, '74', '32020601019', '32020688203435', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('506', null, '606ec5b520ed391997eff2cf7a5b2731', 'rtmAaH', '徐桦晨', '1551340820', null, null, null, null, '0', '18751552692', null, '73', '32020601007', '32020688203465', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('507', null, '22b52aaa459c8c3ab9aed131b56b1fa3', 'b4zch9', '蒋琴珠', '1551340820', null, null, null, null, '0', '13701516015', null, '56', '32020601005', '32020688203485', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('508', null, '4c3c85563a733bfb4eea36a8d46f2e79', 'YitIYR', '项丽华', '1551340820', null, null, null, null, '0', '13812288098', null, '63', '32020601083', '32020688203471', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('509', null, '19ad2b277117facaaa99cab235e407ab', 'D4r7jr', '邵桂秀', '1551340820', null, null, null, null, '0', '18951582759', null, '55', '32020601212', '32020688203496', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('510', null, '380cc6b796580131c2b7036f1f5f6bf7', 'GwKHpz', '沈柯', '1551340820', null, null, null, null, '0', '13771006633', null, '54', '32020601219', '32020688203511', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('511', null, '503355dc6f25a958b5190fd09b527b73', 'cMDjna', '钱新妹', '1551340820', null, null, null, null, '0', '13485039521', null, '71', '32020601030', '32020688203463', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('512', null, '45eb73abf06bdc1849ea9436e03304c8', 'swGQLx', '沙如玉', '1551340820', null, null, null, null, '0', '13921295292', null, '59', '32020601168', '32020688203477', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('513', null, '34cef5ac84d18e69a08a083f3d2542b9', 'jdkm6F', '石冬娜', '1551340820', null, null, null, null, '0', '15895330615', null, '73', '32020601146', '32020688203491', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('514', null, '4bce259a493a939b271ef00f03465838', '3paVnm', '冯龙军', '1551340820', null, null, null, null, '0', '15312234227', null, '54', '32020601219', '32020688203494', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('515', null, '301f430677da1c726d03aeb8bbb386f3', 'DJUV7H', '张文州', '1551340820', null, null, null, null, '0', '18626307748', null, '54', '32020601219', '32020688203498', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('516', null, '656e49e645619c91c159ffca326dfa0b', 'Jn3jJK', '张云', '1551340820', null, null, null, null, '0', '15806178961', null, '58', '32020601225', '32020688203444', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('517', null, '5e426b9471bb7ee25c1383e4d9d5fcf6', 'Wm7iyA', '尹岚', '1551340820', '1551832662', '192.168.23.1', null, null, '0', '13921515754', null, '55', '32020601012', '32020688203428', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961BWcpTPrb7s3qK1yMaUiJ5E');
INSERT INTO `bestop_member` VALUES ('518', null, 'ebc12086fd3de6d452e61ff95112aa7d', 'gMu8AM', '张婷霞', '1551340820', null, null, null, null, '0', '18351589828', null, '73', '32020601208', '32020688203456', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('519', null, '6762b5fbd611876ece1eb4f12d85427e', 'WED1lg', '杨敏娟', '1551340820', null, null, null, null, '0', '15365226122', null, '63', '32020601083', '32020688203457', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('520', null, '2e8579890ed9502c6e6e426929fc0e21', 'tLTQYX', '周哲铭', '1551340820', null, null, null, null, '0', '13771137283', null, '55', '32020601178', '32020688203455', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('521', null, '61a05fc3edfe288a35ab12d880489ece', '9TX2zX', '张志强', '1551340820', null, null, null, null, '0', '13906190506', null, '61', '32020601210', '32020688203478', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('522', null, '62f81a2e7086b4f1159119839b91acc2', 'AIGj3N', '殷佳运', '1551340820', null, null, null, null, '0', '13771423882', null, '61', '32020601222', '32020688203481', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('523', null, '12847d49e090458b2bf0065248a0927f', '7PddtD', '李敏', '1551340820', null, null, null, null, '0', '15312481399', null, '71', '32020601228', '32020688203482', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('524', null, '68c1944a71a30dc3846f3c3012817144', 'ErdErZ', '华杰', '1551340820', null, null, null, null, '0', '13861752138', null, '56', '32020601005', '32020688203484', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('525', null, '43f2dcbdca63d530a5a0b849df319693', '5BQphR', '张琴霞', '1551340820', null, null, null, null, '0', '13506187071', null, '59', '32020601055', '32020688203467', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('526', null, 'cdd0eaebd354784df479251dbdd69741', 'QSSLFZ', '张菊芳', '1551340820', '1551749806', '192.168.23.1', null, null, '0', '15951589305', null, '64', '32020601096', '32020688203469', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Ej_LMarnT5zE2GTEpaYjWw');
INSERT INTO `bestop_member` VALUES ('527', null, 'f337a379f4a1ecfe522f8488e945e2d5', 'bNcI3X', '陈香', '1551340820', null, null, null, null, '0', '13921102686', null, '61', '32020601221', '32020688203470', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('528', null, 'a36da25aa3a740dbacc820838bdf35b3', 'GEpQ7D', '邓丽君', '1551340820', null, null, null, null, '0', '15152218560', null, '56', '32020601005', '32020688203468', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('529', null, 'daa0f2db2a9cc10d7ba2c8f92b2407bc', 'sefsB7', '谈泽强', '1551340820', null, null, null, null, '0', '13814201155', null, '64', '32020601xxx', '32020688203488', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('530', null, '198c3b8c927feb72f7d937df92077011', '4BEqt8', '张加玲', '1551340820', null, null, null, null, '0', '19952706725', null, '73', '32020601146', '32020688203464', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('531', null, '70ce85939d6fcaa095228bdae90f6ba0', 'IstuaT', '朱瑜颖', '1551340820', null, null, null, null, '0', '15961891975', null, '54', '32020601213', '32020688203430', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('532', null, '9f5fa1e2df48fd227b6aecaae8e81e5a', '137us8', '封峥', '1551340820', null, null, null, null, '0', '13861855557', null, '74', '32020601109', '32020688203438', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('533', null, 'a46302077da1459e859d07f4b7de85d8', 'lZsT31', '刘燕群', '1551340820', null, null, null, null, '0', '13771140063', null, '61', '32020601221', '32020688203449', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('534', null, '06183ce14d11901aa401c85fb79402ef', 'AeNLd5', '朱丽萍', '1551340820', null, null, null, null, '0', '13338772400', null, '73', '32020601007', '32020688203492', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('535', null, '76a01ce52ae6f64288311f6db17e4eff', 'RdKx8g', '陈亚军', '1551340820', null, null, null, null, '0', '13665186081', null, '64', '32020601069', '32020688203576', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('536', null, '84b1a9f0ba3705acb87f322f7f671d08', 'dR9UHh', '王正斌', '1551340820', null, null, null, null, '0', '18651568835', null, '74', '32020601231', '32020688203503', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('537', null, 'ce5738e6a2a7c413ded57c343ac645ef', 'HAnd1j', '陈小艳', '1551340820', null, null, null, null, '0', '13861686197', null, '74', '32020601231', '32020688203504', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('538', null, '19b42c8e24817ab847b2c182a2577ddc', 'qiQh8u', '王云兰', '1551340820', '1551706370', '192.168.23.1', null, null, '0', '13861738631', null, '74', '32020601231', '32020688203501', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961L8LSnNPLRP8NZEd8KqXGg0');
INSERT INTO `bestop_member` VALUES ('539', null, '6d5b7805c71c090300475417b9cb2a1f', 'WSyXLf', '刘婕', '1551340820', null, null, null, null, '0', '15251635975', null, '74', '32020601019', '32020688203540', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('540', null, '1f4977569214d68dc91a2fb3589c2526', 'PCvq37', '宋诗锦', '1551340820', null, null, null, null, '0', '15261500969', null, '54', '32020601219', '32020688203541', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('541', null, '7ceb7b550f98d0224a66d2364cad184f', 'fwVR3r', '王燕', '1551340820', null, null, null, null, '0', '18706182339', null, '74', '32020601019', '32020688203559', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('542', null, 'b902f7fee378a9520eb733363003db3f', 'qBWbid', '王婷', '1551340820', null, null, null, null, '0', '18861520577', null, '58', '32020601110', '32020688203550', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('543', null, '1d678a5eb2d297f838169b0e4ee55644', 'qC1zki', '吴雪梦', '1551340820', null, null, null, null, '0', '15152207744', null, '63', '32020601083', '32020688203523', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('544', null, 'a820a8a242866a2dd3ff3f0b85338865', 'sbHv6V', '张道平', '1551340820', null, null, null, null, '0', '18261539586', null, '71', '32020601228', '32020688203524', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('545', null, '92031fc56ee9833a7454ee3288146258', '3b7HZf', '何成杰', '1551340820', null, null, null, null, '0', '18800542842', null, '54', '32020601219', '32020688203589', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('546', null, '3db7a1c408395caaf616b89b5fd146ba', 'cKbuvf', '邓丹萍', '1551340820', null, null, null, null, '0', '15906184266', null, '56', '32020601226', '32020688203551', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('547', null, 'f498d18dde96418828753299c9f3f86f', 'JYHyJi', '薛业艳', '1551340820', null, null, null, null, '0', '15161556177', null, '74', '32020601004', '32020688203602', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('548', null, '41b12939121272b84de15436c39cb2a6', '7UJmwa', '刘核云', '1551340820', '1551959394', '192.168.23.1', null, null, '0', '13812195219', null, '56', '32020601169', '32020688203573', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961IjJTONB2Omerr7_EM726DE');
INSERT INTO `bestop_member` VALUES ('549', null, '49bd062531de1c4309a1ceaa172ade19', 'zI388X', '潘盼盼', '1551340820', null, null, null, null, '0', '13276280018', null, '74', '32020601154', '32020688203571', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('550', null, '39ad9cba50892f8d27be86adc3950b83', 'en7my1', '顾琴红', '1551340820', null, null, null, null, '0', '13771163852', null, '74', '32020601019', '32020688203572', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('551', null, '9c842f1e12990026095e0beba72e85ca', 'bvDGML', '赵全利', '1551340820', null, null, null, null, '0', '18012399379', null, '58', '32020601225', '32020688203574', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('552', null, 'abf4dc7d5b6ef26b64a589a41c3014aa', 'Xe3PXf', '杨巧凤', '1551340820', null, null, null, null, '0', '18068285760', null, '61', '32020601220', '32020688203578', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('553', null, 'a85b497ad6dc13027593a90f026bf2aa', 'Y1KIt9', '杨红', '1551340820', null, null, null, null, '0', '13771093953', null, '59', '32020601127', '32020688203543', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('554', null, '8cb4ad017ce06431761b6e175ff4c892', 'shPQVA', '王颖', '1551340820', null, null, null, null, '0', '15240455886', null, '61', '32020601086', '32020688203603', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('555', null, 'b8d02e71ad492f8e419317343c24e632', 'Ds26Is', '杨亚悟', '1551340820', null, null, null, null, '0', '15995231002', null, '59', '32020601055', '32020688203545', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('556', null, 'f965df6000159e738d34a487d18f79ff', 'Lrpy3t', '陈志芬', '1551340820', null, null, null, null, '0', '13914244488', null, '60', '32020601139', '32020688203582', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('557', null, 'f5b79a6fb30c9e372fbf0236c8baa096', 't4MHVz', '史朝秦', '1551340820', null, null, null, null, '0', '15152250922', null, '62', '32020601216', '32020688203522', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('558', null, 'f91d861b09330288b70c84b5c873dd28', 'YqCFkm', '张少华', '1551340820', null, null, null, null, '0', '13961884561', null, '64', '32020601010', '32020688203542', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('559', null, 'f0250777af374afc8ae37c901225ff48', 'BdfQII', '匡黎红', '1551340820', null, null, null, null, '0', '13621501930', null, '55', '32020601061', '32020688203495', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('560', null, '5a73c8e17e42b30b38ea6411218de614', 'bxDvyz', '钱海娟', '1551340820', null, null, null, null, '0', '15358986662', null, '60', '32020601139', '32020688203513', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('561', null, '1e45850317bb3e583c25d1f3ab510f34', 'AH3ghr', '管晓煜', '1551340820', null, null, null, null, '0', '15052419559', null, '63', '32020601211', '32020688203548', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('562', null, '73c4206b7832cff2c12aaf8314225f69', 'RKm3qM', '沈晓慧', '1551340820', null, null, null, null, '0', '13701516024', null, '56', '32020601087', '32020688203549', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('563', null, 'bb7fcaf2842039b79a57385077330452', '1xJ5zn', '高骏翔', '1551340820', null, null, null, null, '0', '15106187486', null, '56', '32020601087', '32020688203520', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('564', null, '3ea78aaa44b752ae66534065aab5611b', 'TjPVik', '朱越峰', '1551340820', null, null, null, null, '0', '13861801922', null, '61', '32020601153', '32020688203537', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('565', null, '03904a3c17a339ff3ad136bb1893632a', 'JPrj8A', '孙斯祥', '1551340820', null, null, null, null, '0', '18961703315', null, '61', '32020601220', '32020688203533', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('566', null, 'ac5b9f514a68294f12015c0d1498dc24', 'jFdgJD', '朱翠娟', '1551340820', '1551831205', '192.168.23.1', null, null, '0', '13665148158', null, '74', '32020601019', '32020688203539', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961Fn7-d2IBaezqMk2HVUZNIo');
INSERT INTO `bestop_member` VALUES ('567', null, 'bc1a97d99a308c1b77a4d56d3ee65323', '2CuAxe', '倪淑金', '1551340820', null, null, null, null, '0', '13951579618', null, '59', '32020601098', '32020688203558', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('568', null, '19ce1f1be4d2b56d182fe05c47fd3fec', 'yYT7rn', '吴菲', '1551340820', null, null, null, null, '0', '15896470867', null, '64', '32020601015', '32020688203554', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('569', null, '35cd223811c42c691307d311400080f8', '5zqBKc', '谢原原', '1551340820', null, null, null, null, '0', '13222856877', null, '73', '32020601021', '32020688203555', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('570', null, 'e052966fce22fc88473a935cde28202b', 'SBXE2t', '顾渊杰', '1551340820', null, null, null, null, '0', '13665182289', null, '56', '32020601005', '32020688203557', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('571', null, '823ae18c61f2563eb86a485a040a8d93', 'hTGxJY', '胡宗瑜', '1551340820', null, null, null, null, '0', '13771077519', null, '71', '32020601228', '32020688203561', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('572', null, '1119091e4b04151aa8f71f5961c9debd', 'ZLUZLG', '朱茂新', '1551340820', null, null, null, null, '0', '15193720202', null, '74', '32020601125', '32020688203569', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('573', null, '82df637913d5402b8b2231e705e7eb19', '1unhfx', '虞吉铖', '1551340820', '1552565606', '192.168.23.1', null, null, '0', '18961786163', null, '59', '32020601168', '32020688203562', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961JFfsFdH0rxQAD4URXQut0U');
INSERT INTO `bestop_member` VALUES ('574', null, '795007c4b7ef2f47423510398be001d6', 'z3Ba9K', '潘东兴', '1551340820', null, null, null, null, '0', '13812291335', null, '63', '32020601230', '32020688203565', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('575', null, 'ef801d38f768c3577f696eea8bfc3fd3', 'BWcgrX', '唐琦善', '1551340820', null, null, null, null, '0', '13506196788', null, '59', '32020601055', '32020688203563', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('576', null, '9e65ad9d993811848242339fc0c879eb', 'UPlH5m', '张红娟', '1551340820', null, null, null, null, '0', '13806196797', null, '63', '32020601211', '32020688203564', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('577', null, '62b812328165ef11bf6fbd1203b3f4d4', 'CVpAzJ', '张晓红', '1551340820', '1552012540', '192.168.23.1', null, null, '0', '13915328358', null, '61', '32020601179', '32020688203566', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961O3L-ZJUYT3SG_LkuxhanhE');
INSERT INTO `bestop_member` VALUES ('578', null, '19a86bcc11b46d592315f742ad12cbc0', 'KvNGNk', '张成云', '1551340820', null, null, null, null, '0', '15961461928', null, '62', '32020601216', '32020688203567', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('579', null, '948ff51c9a90d635a41303a64a126c3c', 'aRqZyY', '赵淑静', '1551340820', null, null, null, null, '0', '13338116646', null, '63', '32020601083', '32020688203553', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('580', null, '0b01112feaa72d18a9482cf32f0d4cab', 'zsmwHK', '吴丽萍', '1551340820', null, null, null, null, '0', '13665169570', null, '71', '32020601198', '32020688203515', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('581', null, '76392aca72d447cd74d07dae3549f39a', 'GkaMCJ', '饶俊峰', '1551340820', null, null, null, null, '0', '13601487603', null, '54', '32020601219', '32020688203527', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('582', null, '7d98780a20d6207d5eb6d4da3bd06cfb', '1g2C85', '冯玲', '1551340820', null, null, null, null, '0', '13861461802', null, '64', '32020601015', '32020688203577', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('583', null, '6a311a2a5a0ae848120051d858a8196f', 'lUBNHj', '肖继红', '1551340820', null, null, null, null, '0', '15827059799', null, '55', '32020601001', '32020688203583', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('584', null, '1e718e4c15dc5ccad90bc8c8c3f93047', 'lSePFN', '仲云', '1551340820', null, null, null, null, '0', '18961845273', null, '74', '32020601019', '32020688203585', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('585', null, '23aaf07db1b4e179857e40314782bb1b', 'DphbuF', '代书肖', '1551340820', null, null, null, null, '0', '13205279019', null, '63', '32020601230', '32020688203601', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('586', null, '6090ed68d2308be71560baadb8329029', 'Qm6ZmR', '张艳伟', '1551340820', null, null, null, null, '0', '18068285679', null, '60', '32020601002', '32020688203607', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('587', null, '7f6627432f2ae32eb4646cafe344088f', 'leUiTK', '周绪', '1551340820', null, null, null, null, '0', '15061462790', null, '64', '32020601069', '32020688203628', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('588', null, 'ae3f07cf00750aa368b808b36d1812e0', 'ZSc1i9', '张琳', '1551340820', null, null, null, null, '0', '18151716596', null, '55', '32020601076', '32020688203629', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('589', null, '641414fb2de7b5ad15386ce7972fbee1', 'qXkYgJ', '刘晓芳', '1551340820', null, null, null, null, '0', '13771152395', null, '58', '32020601232', '32020688203640', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('590', null, 'c56726b93b1141687960d666b1601316', 'a33wZy', '季琳玉', '1551340820', null, null, null, null, '0', '13400015597', null, '64', '32020601015', '32020688203635', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('591', null, '94ab80f6f3d19d9ded8f80ad85d9840e', 'Qx4Tm6', '张玉', '1551340820', null, null, null, null, '0', '15251519645', null, '74', '32020601231', '32020688203632', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('592', null, '356cd02ab32e49d5021f600f7d287300', 'ZKzw2u', '樊诗城', '1551340820', null, null, null, null, '0', '18861858086', null, '54', '32020601016', '32020688203594', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('593', null, '2857fa0349357ae2a5241402bfe3182f', '2Y3pqI', '李书其', '1551340820', null, null, null, null, '0', '15896487647', null, '64', '32020601069', '32020688203613', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('594', null, '05bc8934b4464bd7e080c0acd347bff7', 'tJIQSk', '袁凯', '1551340820', null, null, null, null, '0', '15062001446', null, '64', '32020601069', '32020688203614', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('595', null, '9832d0180398e693f3e880548f7a5855', 'maShMY', '顾明芬', '1551340820', null, null, null, null, '0', '15995275731', null, '58', '32020601225', '32020688203638', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('596', null, '9a2c2c2d2e9ab4559bff0f112e24ca4d', 'UQTMN2', '陈柯亲', '1551340820', null, null, null, null, '0', '15370212877', null, '58', '32020601232', '32020688203625', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('597', null, '84db5af21ce60c4a7f78ce1779dbb998', 'EkU645', '王琦', '1551340820', null, null, null, null, '0', '13616172083', null, '54', '32020601106', '32020688203618', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('598', null, 'ee22de36b10072ead405c5c603f2e50e', 'EGsffw', '俞霞萍', '1551340820', null, null, null, null, '0', '13771189591', null, '74', '32020601206', '32020688203623', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('599', null, '3b972d125fb8b0b71f8701809c92a728', 'r1cxHa', '刘冬庆', '1551340820', null, null, null, null, '0', '13585040539', null, '74', '32020601231', '32020688203611', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('600', null, 'd9c11afab2c84a14ebcce042b739bc33', 'KkQfdA', '冯萍', '1551340820', null, null, null, null, '0', '15852798832', null, '55', '32020601011', '32020688203633', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('601', null, '55500b6a566ce26d6146c9dc3b855787', '2nhyty', '张栋', '1551340820', null, null, null, null, '0', '18151511221', null, '55', '32020601112', '32020688203634', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('602', null, '5a05931d72fbe7ddc3bf5ea41e9b4b34', 'QBuYeb', '朱雪燕', '1551340820', null, null, null, null, '0', '13306173008', null, '58', '32020601232', '32020688203644', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('603', null, '3893bf40f8ecf4e301b3635c6c7a36e9', 'BJLWZC', '冯亦武', '1551340820', '1551744451', '192.168.23.1', null, null, '0', '18921519886', null, '54', '32020601016', '32020688203637', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961HvlmLz_yKR_w2CV8xVkHtE');
INSERT INTO `bestop_member` VALUES ('604', null, 'b5401b5c7eafc7dfadc01e8f6e46b368', 'H2L1kq', '殷建明', '1551340820', null, null, null, null, '0', '13961731985', null, '62', '32020601192', '32020688203642', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('605', null, 'f24934895d677d0ee9e0012025356a7f', 'TYg6IR', '王栋', '1551340820', null, null, null, null, '0', '15251625036', null, '74', '32020601004', '32020688203595', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('606', null, '6aeed085cf1e8548fda48888f12866af', 'KeTPW9', '周琳琳', '1551340820', null, null, null, null, '0', '13961827175', null, '58', '32020601232', '32020688203643', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('607', null, 'cc1205e04c036259eb690d9c811d8101', '4rPiU9', '吴银花', '1551340820', null, null, null, null, '0', '13656171595', null, '59', '32020601055', '32020688203645', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('608', null, '41ed1392c0fb3ca01cca7accd0f7337e', 'Vqahca', '陈亚铃', '1551340820', null, null, null, null, '0', '15861558378', null, '63', '32020601227', '32020688203619', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('609', null, '584d74edfa98e9f261de192c1a313bd3', 'c5fKwv', '魏其', '1551340820', null, null, null, null, '0', '13812076239', null, '62', '32020601172', '32020688203588', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('610', null, '01dbad1b1649acacaf9a5cf3176058d0', 'bA2QFx', '夏光美', '1551340820', null, null, null, null, '0', '15895173568', null, '74', '32020601019', '32020688203592', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('611', null, '735491af637386c4d4843cd8b74bdf18', 'UNwcai', '董宇新', '1551340820', null, null, null, null, '0', '18205528153', null, '63', '32020601083', '32020688203604', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('612', null, '095bd52a27b4827b8760a2cd1a1d5bba', 'jLy5kX', '何雯', '1551340820', null, null, null, null, '0', '18761537330', null, '61', '32020601086', '32020688203630', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('613', null, '924d4e93061fae7626fc06f08bf3cb19', 'BGlhqX', '张韬', '1551340820', null, null, null, null, '0', '17625819607', null, '54', '32020601219', '32020688203631', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('614', null, '6fa0c0afbb51b4b0e925eabed2f0e855', 'h2jxiF', '姚维', '1551340820', null, null, null, null, '0', '15951505862', null, '60', '32020601196', '32020688203593', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('615', null, 'c382d8e4cd1722a1fdcb508b3ba3fbc2', 'UBB6AY', '钱艺雯', '1551340820', null, null, null, null, '0', '13771562872', null, '55', '32020601178', '32020688203626', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('616', null, 'b75aef4be1ac29b40fb9c6988f9f34e3', 'vN5FSw', '俞燕敏', '1551340820', null, null, null, null, '0', '13961889059', null, '54', '32020601016', '32020688203615', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('617', null, 'a3720f576d51df83582c4765f873c923', 'Qa6ggN', '孟令荣', '1551340820', null, null, null, null, '0', '19952232292', null, '74', '32020601231', '32020688203610', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('618', null, 'ac24a726170f71591c3b86de8ad9c472', 'JKCNGE', '何玉', '1551340820', null, null, null, null, '0', '18800597550', null, '55', '32020601001', '32020688203617', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('619', null, '0eff247f10f8bdba2e8e398b277645b9', 'zVGDc1', '姚依凡', '1551340820', null, null, null, null, '0', '19901425135', null, '54', '32020601219', '32020688203647', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('620', null, 'bdfc069455a00779e7642dd0e9d1b45d', 'RamU7C', '杜锡阳', '1551340820', null, null, null, null, '0', '18861861543', null, '63', '32020601227', '32020688203648', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('621', null, 'd0c8c80a4bba8ba307739f6ce412e559', 'EARlb7', '闫娜娜', '1551340820', null, null, null, null, '0', '17715828944', null, '63', '32020601230', '32020688203649', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('622', null, '04c87850e15609c18d283d0ed97279fb', 'zz7bWN', '沈逸新', '1551340820', null, null, null, null, '0', '13951565363', null, '60', '32020601162', '32020688203606', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('623', null, '5896ad6a871c2d997626ef7192109853', 'nEkjp1', '陈丽萍', '1551340820', '1551676551', '192.168.23.1', null, null, '0', '18914144010', null, '54', '32020601016', '32020688203636', '江苏', '无锡', '国寿惠山支公司', null, '5', 'oK_961GQporiRAbVtpsg2GSk1dpo');
INSERT INTO `bestop_member` VALUES ('624', null, 'ad6ca9333c18496292e6740a6268e4c4', 'w2BUmq', '沈晓琴', '1551340820', null, null, null, null, '0', '15152253793', null, '62', '32020601172', '32020688203655', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('625', null, 'eee16bf19f95fc5c4b24bf38fef65b7d', 'QH3ZYL', '虞远卓', '1551340820', null, null, null, null, '0', '18762806677', null, '58', '32020601232', '32020688203641', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('626', null, '097564bb26211eebfa61023ad8dc1503', 'pBA3Zf', '张雷英', '1551340820', '1551849636', '192.168.23.1', null, null, '0', '15900572322', null, '74', '32020601231', '32020688203624', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961KjcjAki3KnumUihXWp56zE');
INSERT INTO `bestop_member` VALUES ('627', null, 'fecaab9163c535fe5925913444950efe', 'mZQhNk', '徐巧珍', '1551340820', null, null, null, null, '0', '13348100881', null, '71', '32020601006', '32020688203646', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('628', null, 'f41543438ec2f65a5c8e57b36654bb9a', 'CbhBvh', '朱海辉', '1551340820', null, null, null, null, '0', '13656185791', null, '64', '32020601069', '32020688203599', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('629', null, 'df2f780a403b609508a0fbb591f880bf', 'jZatd8', '徐娟', '1551340820', null, null, null, null, '0', '18751578943', null, '62', '32020601029', '32020688203600', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('630', null, 'e23fc6b15baaffee9c809b351e0e9e86', 'egXFlj', '胡永进', '1551340820', null, null, null, null, '0', '13961715000', null, '71', '32020601228', '32020688203650', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('631', null, 'c39e13355bbb914b1728430c4c193e46', 'lbQ2G2', '周秀秀', '1551340820', null, null, null, null, '0', '18552408812', null, '74', '32020601231', '32020688203651', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('632', null, '5ef28282ece5eb7449eeacfd7d60bfbb', 'K2bUXl', '焦影影', '1551340820', null, null, null, null, '0', '13395188520', null, '74', '32020601206', '32020688203616', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('633', null, '841de488f2f9f538b4de80f0f6420b21', 'VZyl6s', '张国兰', '1551340820', null, null, null, null, '0', '15358002656', null, '74', '32020601231', '32020688203612', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('634', null, '5343c7e8e9c32b49f2a84e22dff3e177', '3q3cl2', '刘晓斌', '1551340820', null, null, null, null, '0', '15161589708', null, '62', '32020601214', '32020688203622', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('635', null, 'cf9005aceff545fef03cf875a52be50a', 'CdRfN8', '金娜', '1551340820', null, null, null, null, '0', '18206188796', null, '63', '32020601083', '32020688203620', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('636', null, '5ff82315d95b7f57784e8dc8aadc4af8', 'eQysRp', '衡凤', '1551340820', '1551837498', '192.168.23.1', null, null, '0', '18051932029', null, '55', '32020601178', '32020688203598', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961OuMdIzADujMS3DRo_Fxrcg');
INSERT INTO `bestop_member` VALUES ('637', null, '33f50f5395235281d5ed88460febfd04', '3kl1qh', '杨念念', '1551340820', '1551670766', '192.168.23.1', null, null, '0', '13043616138', null, '54', '32020601016', '32020688203627', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961DNrFukcg7K91OTt97PJCok');
INSERT INTO `bestop_member` VALUES ('638', null, '1f04766494054e896a979bbefbed882a', 'sBgGju', '余炯', '1551340820', null, null, null, null, '0', '15052122870', null, '60', '32020601162', '32020688203666', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('639', null, '9fcd3fa1304b1cc70bd8bbba6cc2c08a', 'UhGigj', '王晓庆', '1551340820', null, null, null, null, '0', '13306196619', null, '61', '32020601210', '32020688203661', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('640', null, '091fa9e4b85362b92615d740829ac253', 'ZMXqKp', '马丽', '1551340820', null, null, null, null, '0', '15961772976', null, '62', '32020601200', '32020688203665', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('641', null, '2706b63a200851333b39a0c2cad08f05', 'uhVIxL', '周建琴', '1551340820', null, null, null, null, '0', '15152231520', null, '55', '32020601011', '32020688203667', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('642', null, '7dd2a55eb242246412d572c99f3f8b5a', 'lxBpCR', '曹凤', '1551340820', null, null, null, null, '0', '18361857608', null, '63', '32020601083', '32020688203658', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('643', null, '01f6ee002475cef13099c80e2edcba6c', 'gcFtmn', '褚琴芳', '1551340820', null, null, null, null, '0', '13861823856', null, '54', '32020601119', '32020688203711', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('644', null, '09f7e2c7e299665ddaf2b6879504b193', 'weNpjM', '吴荷君', '1551340820', null, null, null, null, '0', '15050695058', null, '71', '32020601030', '32020688203676', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('645', null, 'ec4ae4fb5497cb85f3cd8ebc956e4bba', 'HE8iWV', '余亚新', '1551340820', null, null, null, null, '0', '13771129282', null, '71', '32020601188', '32020688203677', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('646', null, '0c2121619de316c7167fa5b6212ba60c', 'mG69WC', '杨进', '1551340820', null, null, null, null, '0', '18661055051', null, '63', '32020601083', '32020688203728', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('647', null, 'cbd73a167265e9167397ad4d4a84ac6a', 'zrMkWN', '任洁', '1551340820', null, null, null, null, '0', '15358013672', null, '63', '32020601083', '32020688203729', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('648', null, '1305927727485c32b4b91e96f0e7c846', 'ZYblp9', '刘小燕', '1551340820', null, null, null, null, '0', '15861591135', null, '54', '32020601016', '32020688203688', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('649', null, '637f37effbd07406ae0b60482e6632d3', 'Z3yHDJ', '张叶红', '1551340820', null, null, null, null, '0', '13921131708', null, '63', '32020601227', '32020688203701', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('650', null, 'b4cd328575a52fd79764307bb8a32f29', 'RgLwK5', '左林', '1551340820', null, null, null, null, '0', '15061868562', null, '74', '32020601019', '32020688203703', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('651', null, '26d28be0c7b0e1e1684980a32851adf7', 'tr3bGQ', '朱李强', '1551340820', null, null, null, null, '0', '18261566809', null, '71', '32020601187', '32020688203704', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('652', null, '99cb3a1eac7abe40962cf2c678ccf0ce', '4wu18x', '朱萍', '1551340820', null, null, null, null, '0', '13812287518', null, '56', '32020601201', '32020688203707', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('653', null, 'fb5e45eabfa93e82fa92dedbbd1b93b4', '6j1BCb', '倪金菊', '1551340820', null, null, null, null, '0', '18915336690', null, '71', '32020601030', '32020688203719', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('654', null, '62bec83f9780d9d6b13e7efa30dda7c4', '5RQtVa', '刘敏', '1551340820', null, null, null, null, '0', '13912385513', null, '71', '32020601006', '32020688203721', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('655', null, '18374ec40f8943f3382e9a606e8757ce', 'DAVep2', '陈峰', '1551340820', null, null, null, null, '0', '13584188199', null, '58', '32020601008', '32020688203723', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('656', null, '295fa5c36467c14c59da27ae8b082f90', 'CxrRUy', '刘苗娣', '1551340820', null, null, null, null, '0', '13812189438', null, '60', '32020601196', '32020688203739', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('657', null, '902ec62c65e5a6c46dd34bbe8c40b21a', 'ebzYuN', '陆海艳', '1551340820', null, null, null, null, '0', '15961561195', null, '54', '32020601186', '32020688203750', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('658', null, '5680d9ab6196038a6eb6a7e2e9fee6a6', 'zIQQsQ', '汪菊萍', '1551340820', null, null, null, null, '0', '13585005078', null, '62', '32020601029', '32020688203753', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('659', null, '502af20547a05f894b81b8b4fe39ee6f', 'Btf6rY', '刘雁', '1551340820', null, null, null, null, '0', '13771506873', null, '62', '32020601184', '32020688203754', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('660', null, '5ea7198337ba57663f7964d6a0717c22', '5Tz92N', '韩文凤', '1551340820', null, null, null, null, '0', '18538082554', null, '64', '32020601069', '32020688203653', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('661', null, '700b0eb3c9580b801548c637b8d3208f', '4PRt4u', '王侠', '1551340820', null, null, null, null, '0', '15861557853', null, '74', '32020601019', '32020688203690', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('662', null, '1b28ed1f2fe8fe7c9d9fbedd758caebe', 'RKFQI7', '高芳', '1551340820', null, null, null, null, '0', '13961737168', null, '71', '32020601030', '32020688203691', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('663', null, 'fe12d682aa798e1c80ee08fbe54563b7', 'hgUHU1', '蒋梦丹', '1551340820', null, null, null, null, '0', '13814276278', null, '60', '32020601002', '32020688203674', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('664', null, 'cac5536bc9aa6aec28341d9857e19000', 'CbGcF7', '张寒珍', '1551340820', null, null, null, null, '0', '18951069027', null, '61', '32020601086', '32020688203694', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('665', null, '44fb2a2a93b3e6ebd8b4ff6e5d90b153', 'vnvEqs', '朱晓东', '1551340820', null, null, null, null, '0', '18915272188', null, '60', '32020601229', '32020688203695', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('666', null, '2cd350e097b0d10685ac962e2e79b03c', '4UVcGx', '朱冬妮', '1551340820', null, null, null, null, '0', '18921107218', null, '60', '32020601229', '32020688203696', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('667', null, '2671629267d60a7a955eb44ce00cc80b', 'bvmeAH', '高玲亚', '1551340820', null, null, null, null, '0', '15951562820', null, '56', '32020601226', '32020688203652', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('668', null, '37fc758a7e0c853e6f1fa2588affcbae', 'KGFhwt', '吴杰', '1551340820', null, null, null, null, '0', '13771193282', null, '54', '32020601186', '32020688203714', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('669', null, '660c45bc025a2ac334d79ffdd460f7d4', '371ZNk', '何红梅', '1551340820', null, null, null, null, '0', '18762060486', null, '55', '32020601001', '32020688203712', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('670', null, '9f550b9174480d04904da1a2cd46ad65', 'kRmGPx', '王金凤', '1551340820', null, null, null, null, '0', '15256427881', null, '74', '32020601004', '32020688203702', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('671', null, '2c67700faa5806a2aeac6de69556d83c', '4LHjA9', '张喜红', '1551340820', null, null, null, null, '0', '13585025470', null, '71', '32020601006', '32020688203705', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('672', null, '5a6a449e48e29178a6aad2bd922cc942', 'DnFb2Y', '俞松', '1551340820', null, null, null, null, '0', '13812287717', null, '55', '32020601001', '32020688203737', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('673', null, '5df48381c7305f2c2b14f703681fd5bb', 'fapcMR', '朱瑛', '1551340820', '1551750096', '192.168.23.1', null, null, '0', '13861820547', null, '74', '32020601019', '32020688203738', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961IzhNg_Pe356pXYznJMWIe0');
INSERT INTO `bestop_member` VALUES ('674', null, '9d057c8a5de5ab71b379921ce5224250', 'kftQ2x', '廖敏达', '1551340821', null, null, null, null, '0', '18261188115', null, '74', '32020601125', '32020688203758', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('675', null, 'f3542aeaad58af0a640b0ff160343c69', 'VrgM46', '潘涛', '1551340821', null, null, null, null, '0', '15861499007', null, '61', '32020601222', '32020688203762', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('676', null, '5e5ff0117e7430e86517d3b44ecd1dd5', '3lL9CE', '刘燕群', '1551340821', null, null, null, null, '0', '13395191931', null, '62', '32020601173', '32020688203722', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('677', null, '9a094f7c8455bde0de64943fae950b57', 'uZxXD7', '袁莉', '1551340821', null, null, null, null, '0', '13814256296', null, '61', '32020601220', '32020688203763', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('678', null, '626befedf79a02c8f7b0bbbf57e6eafa', '2BsIKh', '钱士芬', '1551340821', null, null, null, null, '0', '13961826843', null, '56', '32020601094', '32020688203764', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('679', null, '27df34d921160faa9814bc3f569e768c', 'hne1ZM', '黄燕琴', '1551340821', null, null, null, null, '0', '13222910392', null, '71', '32020601188', '32020688203731', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('680', null, '2bcf9b22f8e323f730cd3646571d6a97', 'lI56FG', '严红', '1551340821', null, null, null, null, '0', '19850139722', null, '59', '32020601171', '32020688203733', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('681', null, 'a8d56004c1d40f303a7cd5f02474508d', 'FRDywH', '杭建平', '1551340821', null, null, null, null, '0', '13771402664', null, '58', '32020601110', '32020688203734', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('682', null, 'c27198b103a256d9348cfe38062a14f0', 'iRUe9J', '周莉', '1551340821', null, null, null, null, '0', '13382885521', null, '61', '32020601220', '32020688203656', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('683', null, '032254c4b41e674297413c885bd1dbfc', 'R9ckkP', '王国锋', '1551340821', null, null, null, null, '0', '13961833126', null, '61', '32020601221', '32020688203657', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('684', null, '5b1071d80201baee7de556d84fa3214d', 'bV2nLK', '诸芸', '1551340821', null, null, null, null, '0', '13771081355', null, '62', '32020601173', '32020688203662', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('685', null, '731475454857f9d8b4def63bb394b9b9', 'T5AkNS', '张伟霞', '1551340821', null, null, null, null, '0', '13814209008', null, '62', '32020601173', '32020688203740', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('686', null, 'f558b5a31522bb3218080c1fb31c60b7', 'LwPLPV', '王庆', '1551340821', null, null, null, null, '0', '15861552064', null, '59', '32020601127', '32020688203743', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('687', null, '87d6467a075d3a7739340ab7d30e2b53', '4QVMPD', '张小燕', '1551340821', null, null, null, null, '0', '13771022936', null, '56', '32020601169', '32020688203747', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('688', null, '1099e77f0a7d686b1d67f0042efc9dc9', 'p9GQQX', '杨丽君', '1551340821', null, null, null, null, '0', '13921290211', null, '59', '32020601127', '32020688203751', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('689', null, '81403033166093d52e4b056987c64016', '6GbYlz', '李广杰', '1551340821', null, null, null, null, '0', '15161523675', null, '73', '32020601007', '32020688203752', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('690', null, '93793e0f100ec065bf7b9581df8ada81', 'uUAYnb', '张西凤', '1551340821', null, null, null, null, '0', '15052201696', null, '55', '32020601012', '32020688203755', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('691', null, '6afcca503e92ed2cb885176b94fa13eb', 'Zw2EvE', '杨小初', '1551340821', null, null, null, null, '0', '15106198611', null, '61', '32020601210', '32020688203756', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('692', null, '4fb49746064a12a1ccc9b6fb86990e83', '6QUMe5', '金晓琳', '1551340821', null, null, null, null, '0', '17826102256', null, '61', '32020601086', '32020688203772', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('693', null, 'babfeadfae804e5184ed1b5b30d61090', 'ZJ4XDT', '邓濛', '1551340821', null, null, null, null, '0', '18951569929', null, '54', '32020601219', '32020688203774', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('694', null, 'e81e1ba9f891b6e9936aec80b53a5358', '27iGRI', '黄广倩', '1551340821', null, null, null, null, '0', '15988505827', null, '73', '32020601146', '32020688203782', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('695', null, 'bd061eff264f3b2ee977ed8fc7358863', '6gnZXE', '袁涛', '1551340821', null, null, null, null, '0', '13291893910', null, '64', '32020601015', '32020688203784', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('696', null, '0f4a3d82bedae1df4742d87a500fb44d', 'TcQR8B', '朱丽静', '1551340821', null, null, null, null, '0', '15050697681', null, '59', '32020601168', '32020688203779', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('697', null, '53deeca18c1141db1261938a9b4feee0', 'wLqyJj', '嵇美荣', '1551340821', null, null, null, null, '0', '18921362731', null, '73', '32020601215', '32020688203781', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('698', null, 'f1c55db68268184fc4f1512aa4f7380b', 'RjA6Sd', '王飞虎', '1551340821', null, null, null, null, '0', '13270120519', null, '54', '32020601016', '32020688203787', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('699', null, '7cd9edd5f04a47165000a6972128b1f1', 'CPUpiP', '李孝芬', '1551340821', null, null, null, null, '0', '13771410721', null, '54', '32020601186', '32020688203775', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('700', null, 'e27ca2c91e20be798ba26f9bd8fe7136', 'IWyTGb', '施勤康', '1551340821', null, null, null, null, '0', '13665161613', null, '55', '32020601112', '32020688203776', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('701', null, 'c868effb01cbcfe0f4461a8abb92a259', 'IuwEFn', '贾银花', '1551340821', null, null, null, null, '0', '15261551395', null, '54', '32020601150', '32020688203777', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('702', null, 'a3f3a12bc465056fa8371851c7e87d52', 'V6WWd3', '王小坤', '1551340821', null, null, null, null, '0', '15906186597', null, '58', '32020601003', '32020688203778', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('703', null, '971023cbf0ffc51e7977a0556bff645e', 'lEXUEF', '易建方', '1551340821', null, null, null, null, '0', '13861465140', null, '54', '32020601115', '32020688203785', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('704', null, 'b724c9f6fb8cf3a4507c4567c88694b0', 'iAAd1K', '王金春', '1551340821', null, null, null, null, '0', '13921277372', null, '61', '32020601222', '32020688203786', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('705', null, 'ba0e26a776b4f87a3a825e6c29289291', 'wRS4qS', '殷羽晶', '1551340821', null, null, null, null, '0', '13812521753', null, '63', '32020601083', '32020688203770', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('706', null, '191c2d7431aca21a739fc9ab2f1e9a1d', 'HK8EdH', '诸琴', '1551340821', null, null, null, null, '0', '18921162500', null, '62', '32020601173', '32020688203773', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('707', null, '0d59ab0ece04d185e13956050316f7a1', 'e9Em9c', '顾涛', '1551340821', null, null, null, null, '0', '15961723058', null, '54', '32020601119', '32020688203761', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('708', null, '9727571d0c3fd7a84af731b3488331d0', 'XFEj61', '谢洁', '1551340821', null, null, null, null, '0', '13665128122', null, '58', '32020601003', '32020688203678', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('709', null, 'a67b0f0fd11358eac918b18302bd92de', '1ENPkn', '荣丹丹', '1551340821', null, null, null, null, '0', '15062485294', null, '58', '32020601225', '32020688203685', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('710', null, '65cb58d20e15607dd7a0fc4537a09ddb', 'rsrMgm', '肖凤芹', '1551340821', null, null, null, null, '0', '15106175976', null, '55', '32020601212', '32020688203686', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('711', null, 'f85b0c02a32f5c2b5e36b7b93b621eee', '32wWMG', '刘亚', '1551340821', null, null, null, null, '0', '15190209812', null, '62', '32020601029', '32020688203687', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('712', null, '0b0a3529e32e1e4c637054b6d6728844', 'KvE4W9', '李秀', '1551340821', null, null, null, null, '0', '13606183560', null, '59', '32020601127', '32020688203671', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('713', null, '8d46bd36925492d5ab9377e5a57c77cf', 'vjyu5y', '谈佳菁', '1551340821', '1551755981', '192.168.23.1', null, null, '0', '15306195552', null, '74', '32020601019', '32020688203713', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961EmJl_E9Bk5dDee5XHTdBjQ');
INSERT INTO `bestop_member` VALUES ('714', null, '7cae35e18dbb4e29f8b53b0d772bdce6', 'GW3T4i', '谢君品', '1551340821', null, null, null, null, '0', '18762671468', null, '63', '32020601083', '32020688203669', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('715', null, '9b6d4b612ee1553a32c94da93876a10d', 'uxZmjP', '刘芳', '1551340821', null, null, null, null, '0', '15861436209', null, '56', '32020601149', '32020688203717', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('716', null, 'edac5bb66cff1d2ca120c5e678de18d3', '99WDE8', '徐菊宏', '1551340821', null, null, null, null, '0', '13771034174', null, '71', '32020601198', '32020688203718', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('717', null, 'ef8794ab74c242decbc571d3905a2c99', 'uDXuyv', '俞萍', '1551340821', null, null, null, null, '0', '15261568308', null, '71', '32020601006', '32020688203720', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('718', null, '81b9cd02893cd8fcb46acf60cd3c9993', 'LsVjwL', '贾丙亮', '1551340821', null, null, null, null, '0', '16605103218', null, '63', '32020601083', '32020688203725', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('719', null, 'e3ca4429e7ec0e6a8446e1aba19c89ac', 'bnhz5C', '盛正秀', '1551340821', null, null, null, null, '0', '18921393866', null, '59', '32020601055', '32020688203681', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('720', null, '9d94ef68efa95d364725fdeef7ea672e', 'fC4shb', '袁仲伟', '1551340821', null, null, null, null, '0', '18921101522', null, '58', '32020601067', '32020688203683', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('721', null, 'c8e952af3eeba104792c1128eb7ad2c4', 'H3pa49', '张鼎', '1551340821', null, null, null, null, '0', '15896463651', null, '62', '32020601172', '32020688203689', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('722', null, '99772c27dc0302f8703419331b41411e', 'mK1kp8', '严鑫磊', '1551340821', null, null, null, null, '0', '13912480310', null, '61', '32020601086', '32020688203736', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('723', null, 'f277bfc51fc52ae5f21d1bb9af2ae319', 'BaddlJ', '韩培华', '1551340821', null, null, null, null, '0', '18706187965', null, '58', '32020601003', '32020688203699', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('724', null, '341572dcaff76454bd7a2d8043236a36', '8h7zFI', '宋金锁', '1551340821', null, null, null, null, '0', '13921175328', null, '63', '32020601227', '32020688203700', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('725', null, 'bb0cde98119031d771fb8a9a1ef78edb', 'HC15TW', '唐玲霞', '1551340821', null, null, null, null, '0', '13961798049', null, '61', '32020601221', '32020688203727', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('726', null, '3fb18c1a1b7dd63021ce7e1179c2d551', 'G6ejqL', '蒋梦薇', '1551340821', null, null, null, null, '0', '15061897264', null, '61', '32020601210', '32020688203659', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('727', null, '6e15a4c1ca2c28efe8bf153608389bb6', 'scTSRY', '刘晓', '1551340821', null, null, null, null, '0', '15851990932', null, '63', '32020601083', '32020688203769', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('728', null, '72be26b6d7d9d9ea6a0607f157e0a2f1', 'q5rA9l', '秦元杰', '1551340821', null, null, null, null, '0', '13771195867', null, '63', '32020601083', '32020688203771', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('729', null, '77a11a0a7d8952832e6fd6f34e2bb347', 'gB7uwY', '龚晨烨', '1551340821', null, null, null, null, '0', '15052260660', null, '58', '32020601232', '32020688203668', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('730', null, '8126138d33787da11fdf4331c0269f06', '2Ujeba', '薛小华', '1551340821', null, null, null, null, '0', '13812081889', null, '71', '32020601198', '32020688203692', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('731', null, '865b115247e8cc04b6b186f11d79ee92', 'uBHx1W', '李正', '1551340821', null, null, null, null, '0', '15906176946', null, '61', '32020601222', '32020688203693', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('732', null, '6e41c8be942fff2318ac00e0babfe0a0', 'vRuQcH', '祝琳', '1551340821', null, null, null, null, '0', '15251529731', null, '56', '32020601087', '32020688203706', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('733', null, 'af1889a4113516c659b13a94ef99ecd7', '973YNx', '徐科英', '1551340821', null, null, null, null, '0', '13196533023', null, '58', '32020601018', '32020688203709', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('734', null, 'ae69028b448e5474f742aac12eb90079', 'u7tpVM', '王娣娟', '1551340821', null, null, null, null, '0', '15161527928', null, '55', '32020601023', '32020688203672', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('735', null, 'd32781b4ad0b4ed8f7567fbb6fdedf6d', 'WmN658', '杜春英', '1551340821', null, null, null, null, '0', '13706197703', null, '71', '32020601188', '32020688203730', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('736', null, '2b05aa3629667ddd33e671b2f0553c86', 'hih6tb', '石海兰', '1551340821', null, null, null, null, '0', '17135100725', null, '74', '32020601004', '32020688203732', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('737', null, '4969e8fd71d1ae86fe860c107defd54c', 'PDb7ra', '周琴妹', '1551340821', null, null, null, null, '0', '15251520821', null, '64', '32020601015', '32020688203741', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('738', null, 'b0d6ff31a65d13ac66f6dd0f6837ba2d', 'YsuWi8', '汤浩烨', '1551340821', null, null, null, null, '0', '13706171727', null, '73', '32020601021', '32020688203748', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('739', null, '40b079a33ed1565551a7550971572574', 'KtT6BL', '崔辉', '1551340821', null, null, null, null, '0', '15961868520', null, '56', '32020601005', '32020688203735', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('740', null, '97c8385085d00a4bf0450866b870690b', '3NzV34', '许春娟', '1551340821', '1551837841', '192.168.23.1', null, null, '0', '13914250247', null, '74', '32020601109', '32020688203670', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961OTGLKNa4YPUALal36qU0zc');
INSERT INTO `bestop_member` VALUES ('741', null, 'c9803e8e63f454799ca29e32cfc97ba4', 'AZ9rZk', '焦苛苛', '1551340821', null, null, null, null, '0', '19952706186', null, '63', '32020601083', '32020688203673', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('742', null, '73052b2f95ec359edf5c88e0a01bbfd3', 'rdaS8u', '朱必胜', '1551340821', null, null, null, null, '0', '15061872469', null, '63', '32020601083', '32020688203726', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('743', null, '4bff057943806814d7bc58acb26c6822', 'yEgSUL', '李维红', '1551340821', null, null, null, null, '0', '13771161393', null, '61', '32020601210', '32020688203660', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('744', null, 'bd55408c6e0b396e0245dcea6c9a08f0', 'CdkRFV', '袁晓峰', '1551340821', null, null, null, null, '0', '15852816452', null, '61', '32020601221', '32020688203757', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('745', null, 'daad9415e45f8a668d0d8e636571a5df', 'PYmxCc', '杨丽芹', '1551340821', null, null, null, null, '0', '15961755791', null, '54', '32020601016', '32020688203767', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('746', null, 'b895e42e2c3edf51b24c65da3efa95bb', 'VmkHU8', '王全英', '1551340821', null, null, null, null, '0', '13405784641', null, '59', '32020601055', '32020688203780', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('747', null, '1e25c49123550931eb8fec1907217422', 'uJAAUS', '李淳', '1551340821', null, null, null, null, '0', '18800563787', null, '54', '32020601106', '32020688203766', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('748', null, '60a4e88b1c861b7c005b108696a88c83', '4eUpqg', '王寅洁', '1551340821', null, null, null, null, '0', '13506199687', null, '62', '32020601172', '32020688203783', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('749', null, '206c5eadc5da102a3342609d82c4bac8', 'J1wn8S', '沈金霞', '1551340821', null, null, null, null, '0', '13921152332', null, '58', '32020601003', '32020688203679', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('750', null, '298e0f38c8c41a23da72de8a3431751d', 'yi2qsS', '曹七妹', '1551340821', '1551659442', '192.168.23.1', null, null, '0', '13196566888', null, '58', '32020601003', '32020688203680', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Pu_2rzQ0PXCmPmIE6RPYs4');
INSERT INTO `bestop_member` VALUES ('751', null, 'c32c544976ac2c73e54c72766f31337e', 'nSQTB2', '倪丽君', '1551340821', null, null, null, null, '0', '13771105386', null, '55', '32020601212', '32020688203697', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('752', null, '86c1e1304dd7ea8a3d1f1856ec6ad477', 'zw56HR', '周淼苗', '1551340821', null, null, null, null, '0', '13771180680', null, '58', '32020601110', '32020688203698', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('753', null, '20dc8476f4c9a2da4dd2a9cc48bc692f', 'v1R2bt', '肖敏', '1551340821', null, null, null, null, '0', '18951570631', null, '54', '32020601150', '32020688203710', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('754', null, '62dd27e57e8506f54fe070a29eb1d582', '6Z4hyr', '顾炎青', '1551340821', null, null, null, null, '0', '17601510742', null, '63', '32020601083', '32020688203788', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('755', null, '80998d19c859692beaf0506fdb870d39', '3aMZv3', '黄扣英', '1551340821', null, null, null, null, '0', '18800588994', null, '55', '32020601061', '32020688203765', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('756', null, '4989648060e5fab927c8a5910c1be093', '93kce2', '周新华', '1551340821', '1551750916', '192.168.23.1', null, null, '0', '15995221255', null, '64', '32020601069', '32020688203768', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961CSkD3v0Gmd9blOkyvhDPeY');
INSERT INTO `bestop_member` VALUES ('757', null, '34d252c1b1b1dc36ce92bcf510c6a142', '4syNfd', '赵士琴', '1551340821', null, null, null, null, '0', '18861843856', null, '58', '32020601067', '32020688203724', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('758', null, 'cadd1eb140be49ed633d61b81bad209b', 'lpmp2V', '冯广群', '1551340821', null, null, null, null, '0', '13921299529', null, '55', '32020601061', '32020688203715', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('759', null, '4fb963fbaff03ca2405e7df36cc24346', 'd2yZ9m', '唐勤兰', '1551340821', null, null, null, null, '0', '15251669207', null, '56', '32020601169', '32020688203716', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('760', null, '7e37f1db520570e15b6461d178c29be2', '3eZZdf', '张锦群', '1551340821', null, null, null, null, '0', '18706182556', null, '56', '32020601005', '32020688203708', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('761', null, '0a09f9b5b1f84af8ad85efb4f0cc7fe3', 'svuhpP', '吴彩萍', '1551340821', null, null, null, null, '0', '13771510921', null, '62', '32020601184', '32020688203663', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('762', null, '814404cda2d3f477c664f51f32116090', '7r75DC', '臧红英', '1551340821', null, null, null, null, '0', '13771553385', null, '59', '32020601171', '32020688203682', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('763', null, '5de08e085efa2bc8652361daf16191b9', 'ZZvgHQ', '薛伟', '1551340821', null, null, null, null, '0', '18921163109', null, '58', '32020601225', '32020688203684', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('764', null, 'cba9b27f498985b351ec1351bdd0562f', '8daq2e', '高兴凤', '1551340821', null, null, null, null, '0', '18851518779', null, '62', '32020601172', '32020688203664', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('765', null, 'bf13474e48bb27b715f3ca69eb6f979b', 'ILZFyg', '吉虎', '1551340821', null, null, null, null, '0', '15861466051', null, '60', '32020601229', '32020688203811', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('766', null, 'e8f5d2c08961e99a4e663f8fc9e0271e', 'HtZKTQ', '杨敏华', '1551340821', null, null, null, null, '0', '15951568331', null, '54', '32020601219', '32020688203817', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('767', null, 'c9362b03f08f13f23e8083eb95f59a5b', 'i2RyFb', '陈凌杰', '1551340821', null, null, null, null, '0', '15261592018', null, '61', '32020601086', '32020688203799', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('768', null, 'a94a64295c50cfaf57b7b62ebe71c5fd', 'K6PjBL', '胡玉环', '1551340821', null, null, null, null, '0', '18816200990', null, '73', '32020601146', '32020688203833', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('769', null, '3e528b2d8a295d5bb850624b3d4d4549', '4gRhKg', '杨亚萍', '1551340821', null, null, null, null, '0', '13921133086', null, '74', '32020601019', '32020688203834', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('770', null, 'b57f3d80751f7184257e5e5286035336', '7SBTns', '胡晓英', '1551340821', null, null, null, null, '0', '15306192816', null, '58', '32020601003', '32020688203835', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('771', null, '41ec110329cdceefad1a4ac73535e4ff', 'YGzZ6J', '王建花', '1551340821', null, null, null, null, '0', '13921195041', null, '54', '32020601131', '32020688203804', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('772', null, '6c6872431825dd75c500bd4029cddacb', '1ra6y9', '余静亚', '1551340821', null, null, null, null, '0', '18206194392', null, '56', '32020601169', '32020688203842', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('773', null, '192fa1f83f37356debda6682391133b5', 'IVFqdH', '高华萍', '1551340821', null, null, null, null, '0', '15861566069', null, '61', '32020601205', '32020688203828', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('774', null, '658e8829722181eccc871f743494309b', 'X2Kfba', '张晓峰', '1551340821', null, null, null, null, '0', '13861883879', null, '63', '32020601211', '32020688203829', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('775', null, 'a23054ee63c52b2d2aa1bff60d495af0', 'ElzdPP', '晏大菊', '1551340821', null, null, null, null, '0', '13861782084', null, '56', '32020601226', '32020688203792', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('776', null, '73fc16f3b0f98a0fe882ed9b66a4132d', 'arFpPe', '王长先', '1551340821', null, null, null, null, '0', '18961775451', null, '60', '32020601229', '32020688203810', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('777', null, 'bca9d25f1c4c2d099326283ae9f1e866', 'Xv2xtt', '陈国宝', '1551340821', null, null, null, null, '0', '13861233377', null, '62', '32020601216', '32020688203790', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('778', null, '5e0e96b88f62e9da6b567b91a4fe936e', 'pGQQax', '丁常志', '1551340821', '1552367451', '192.168.23.1', null, null, '0', '15062414071', null, '64', '32020601069', '32020688203814', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961B3g-TMDLoCN16N9GhStfoc');
INSERT INTO `bestop_member` VALUES ('779', null, '6e5fdb4474343692d1638b6d72722e27', 'MdiDDx', '郑坚刚', '1551340821', null, null, null, null, '0', '13921533754', null, '61', '32020601179', '32020688203818', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('780', null, 'c9c94024c49e3f38593966f61426633b', 'MhyiRb', '丁炎军', '1551340821', null, null, null, null, '0', '18552077191', null, '63', '32020601227', '32020688203822', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('781', null, '1c5cab442e9c57c37f2393e2765d91df', 'Zn8Ss6', '唐叶波', '1551340821', null, null, null, null, '0', '15852535619', null, '63', '32020601083', '32020688203825', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('782', null, 'bebe946fc4a2342b2d1e55b8348a2ba7', 'nCwlBW', '余李鑫', '1551340821', null, null, null, null, '0', '18626308895', null, '56', '32020601226', '32020688203815', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('783', null, '8572dce205a653cd3393909b1c99c8b7', 'ffnvIW', '刘俊', '1551340821', null, null, null, null, '0', '13861851550', null, '74', '32020601206', '32020688203816', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('784', null, '9ae86e6346bdf81d3df2510039cbd130', '8KhWDC', '丁立坤', '1551340821', null, null, null, null, '0', '13013618685', null, '61', '32020601086', '32020688203819', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('785', null, '1273733c085d7b8ac173e2789678e99f', 'jnVNvv', '徐晓亚', '1551340821', null, null, null, null, '0', '19952257139', null, '61', '32020601221', '32020688203820', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('786', null, '3847ec99fd2c20c0d1dda268c703ae51', 'cIuZYx', '杨涵名', '1551340821', null, null, null, null, '0', '18914147717', null, '60', '32020601002', '32020688203823', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('787', null, '5c9d31b6c33028fff8134e0cca75d348', '17BKHq', '朱春霞', '1551340821', '1551934291', '192.168.23.1', null, null, '0', '18921297873', null, '74', '32020601109', '32020688203840', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961POJAOnmt18polGlbI0foWc');
INSERT INTO `bestop_member` VALUES ('788', null, '199458d15c826f003cbab76e1af669d7', 'tzmWKH', '李安培', '1551340821', null, null, null, null, '0', '15052203723', null, '54', '32020601016', '32020688203841', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('789', null, 'ce1bcd64d08c393b59243cb554f50138', 'FIwayL', '张经荣', '1551340821', null, null, null, null, '0', '18761519807', null, '74', '32020601019', '32020688203836', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('790', null, 'abe330149eda41b0b2504a9ac98b107a', '85e93V', '陈西艳', '1551340821', null, null, null, null, '0', '15371058037', null, '56', '32020601226', '32020688203832', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('791', null, 'a913199828939b84a7dc9d241a940cbb', 'YeewyV', '贾娉婷', '1551340821', null, null, null, null, '0', '15190222355', null, '59', '32020601098', '32020688203838', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('792', null, '0b09ae501867a9bc45e7989c7b167761', 't4MZc6', '金月娣', '1551340821', null, null, null, null, '0', '13771056684', null, '74', '32020601109', '32020688203801', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('793', null, '881fa29503a2373e6426f485df45ba25', 'aFWicF', '胡燕', '1551340821', null, null, null, null, '0', '15861662648', null, '60', '32020601229', '32020688203812', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('794', null, '2fd8f2a5d95e56b60b290467131e605b', 'gWN6M7', '彭放', '1551340821', null, null, null, null, '0', '17712361466', null, '54', '32020601219', '32020688203813', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('795', null, 'bb1565d2747f2f2f13caf81b4a1224a3', 'AtWKVx', '张成芳', '1551340821', null, null, null, null, '0', '18961427867', null, '62', '32020601216', '32020688203831', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('796', null, '18f428ca075860f8988fd9043a7936dc', 'WQS6cg', '陈国红', '1551340821', null, null, null, null, '0', '13952460518', null, '73', '32020601146', '32020688203796', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('797', null, '501b15f889652b9b820663f17816261e', 'Eu1yUT', '李兆梅', '1551340821', null, null, null, null, '0', '15961895802', null, '74', '32020601218', '32020688203791', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('798', null, 'd1b9a321a1b50b7808caab96af742749', 'ncTScV', '冯梦圆', '1551340821', null, null, null, null, '0', '13771054369', null, '60', '32020601002', '32020688203789', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('799', null, 'd67fd371d66ccf3faa778f9aad32ce7c', 'SWgrbU', '吴春莹', '1551340821', null, null, null, null, '0', '13328101923', null, '74', '32020601206', '32020688203797', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('800', null, 'd941d4be05080fd5e77b2deb986a7c17', '2m6IDJ', '徐惠琴', '1551340821', null, null, null, null, '0', '13405756432', null, '74', '32020601019', '32020688203824', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('801', null, 'b3a2e199001d0cb4eadb36cd63c87cc1', 'ixpjuW', '单争鸣', '1551340821', null, null, null, null, '0', '18262270825', null, '59', '32020601055', '32020688203807', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('802', null, 'a92d32a00e235a559f2297412448292e', 'Xj3bG3', '杨荷英', '1551340821', null, null, null, null, '0', '18020292102', null, '56', '32020601169', '32020688203805', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('803', null, '2927e0c012fea656f5bbf759775f2efa', '55IuBb', '周月英', '1551340821', null, null, null, null, '0', '15951515665', null, '60', '32020601170', '32020688203827', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('804', null, 'b2074596177c7feba88f9c1173e4e4dd', 'KJHXRX', '项澄', '1551340821', null, null, null, null, '0', '18915325401', null, '63', '32020601083', '32020688203830', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('805', null, 'c845b41ab355460aa486f59af89866df', 'fYw5FL', '姚云龙', '1551340821', null, null, null, null, '0', '13771191201', null, '59', '32020601168', '32020688203837', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('806', null, '6f94e9932e7b002867a31cd1b61b20dd', 'Aq6LjE', '徐杨', '1551340821', null, null, null, null, '0', '15961721912', null, '58', '32020601110', '32020688203839', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('807', null, '684af56356acf96f1f7998dfbdf07d4b', 'VBCDxy', '蔡玲梅', '1551340821', '1551832685', '192.168.23.1', null, null, '0', '13801518709', null, '55', '32020601012', '32020688203803', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Ld2uvKLFH9-iWjLfu69Q80');
INSERT INTO `bestop_member` VALUES ('808', null, '3243c2efa272e92f4060e477beeff666', 'wwQMjd', '周玉梅', '1551340821', null, null, null, null, '0', '13771577890', null, '56', '32020601169', '32020688203806', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('809', null, '565d04e2c81f38864ecc0837233aceee', 'XZbP39', '邵文韬', '1551340821', null, null, null, null, '0', '18915347688', null, '74', '32020601154', '32020688203798', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('810', null, '8cfb7d4da4708c562a0d48fb69e88704', 'Lm8ZbB', '吴国新', '1551340821', null, null, null, null, '0', '13771183772', null, '63', '32020601083', '32020688203821', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('811', null, 'b49cee6f247efc6596e3b327bfdfdc8a', 'XIcTdW', '张燕英', '1551340821', null, null, null, null, '0', '13812036766', null, '63', '32020601227', '32020688203809', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('812', null, '8c73a3e4669c9fd7650f8a128d84b634', 'aKvYE1', '时榴芬', '1551340821', null, null, null, null, '0', '13812276983', null, '73', '32020601190', '32020688203808', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('813', null, 'fbed161ad7b10d760ba3593447aeca08', '55YWjW', '董志姣', '1551340821', null, null, null, null, '0', '15161179177', null, '70', '32020661067', '32020666301141', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('814', null, 'e5a2d6ecce573880f1e8dfbc317b1cdd', '6MqnA6', '王秋霞', '1551340821', null, null, null, null, '0', '15189000876', null, '70', '32020661067', '32020666301096', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('815', null, '32ce5d9351589807dd57b382a677c165', 'GCMMNq', '张家琴', '1551340821', null, null, null, null, '0', '18762690564', null, '70', '32020661067', '32020666301017', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('816', null, 'df449a4e6699ababa4b84081c3f8947e', 'dxSzWK', '夏可文', '1551340821', null, null, null, null, '0', '13812518019', null, '70', '32020661067', '32020666301016', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('817', null, '37ffaf10d5cdc023740ba91c3dafaea8', 'fs45YE', '谢柯菁', '1551340821', null, null, null, null, '0', '18068330353', null, '70', '32020661067', '32020666301087', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('818', null, '5f269769d858dddaffa97663bb95227e', 'CDCfLf', '李青', '1551340821', null, null, null, null, '0', '13961742439', null, '70', '32020661067', '32020666301166', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('819', null, '1634ebce1f88a5a4554f0819af50b080', 'WtG5mW', '罗树保', '1551340821', null, null, null, null, '0', '13914168353', null, '70', '32020661067', '32020666301106', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('820', null, 'fa7836d100fd4d6e9f61937f210790b5', 'g1NBYA', '莫叶东', '1551340821', null, null, null, null, '0', '13961830742', null, '70', '32020661067', '32020666301022', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('821', null, '89f59325634c971c545674c0e7ee5bd3', 'X979Ln', '尹布凯', '1551340821', null, null, null, null, '0', '18352508177', null, '70', '32020661067', '32020666300967', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('822', null, 'b95cc5a6483b42f560e5730b452d166c', '9Uvmil', '刘翠翠', '1551340821', null, null, null, null, '0', '17706191120', null, '70', '32020661067', '32020666301303', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('823', null, '1ecebfcdd6c256182bb8eeed1a13437c', 'IPHYld', '吴亚军', '1551340821', null, null, null, null, '0', '15855684167', null, '70', '32020661067', '32020666300806', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('824', null, '91a8a6282bb71e32d361119644bc1599', 'pcpyEz', '吕卫江', '1551340821', null, null, null, null, '0', '13915331575', null, '70', '32020661067', '32020666300782', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('825', null, '14f15014f6836681510e5e10d2336a74', '5rDeyp', '谢静雯', '1551340821', null, null, null, null, '0', '13771256753', null, '70', '32020661067', '32020666300644', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('826', null, '592ae7143efbc598393c48d981b05443', 'bpuTQG', '薛峰', '1551340821', null, null, null, null, '0', '13861895539', null, '70', '32020661067', '32020666300741', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('827', null, 'fd797a327871e00d1277b369161e6dbc', 'EsYvIv', '冯涛', '1551340821', null, null, null, null, '0', '18851572819', null, '70', '32020661067', '32020666300587', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('828', null, '96625133e324fe24069e008b83ea2e17', 'Ktv65n', '沈丽君', '1551340821', null, null, null, null, '0', '15006178175', null, '70', '32020661067', '32020666300419', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('829', null, '04a817cdc83b93d9e7ffa685b68602e3', '3KenPl', '徐安卫', '1551340821', null, null, null, null, '0', '15358015357', null, '70', '32020661067', '32020666300074', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('830', null, '29c603464c6ccf322818c88423c524ec', 'GcUmbI', '李艳娟', '1551340821', null, null, null, null, '0', '15370224633', null, '70', '32020661067', '32020666300110', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('831', null, '66ba49ec784b20fe2808c61f5a32ecc9', 'jHiEUz', '陈敏', '1551340821', '1551661955', '192.168.23.1', null, null, '0', '13218775278', null, '70', '32020661067', '32020666200579', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961GHYUK3sNs7fCuWZ6c60llQ');
INSERT INTO `bestop_member` VALUES ('832', null, 'e7c1d6f192ac9c3575ed1f4884a5ecde', 'eQn3bi', '刘陈丽', '1551340821', null, null, null, null, '0', '17351515985', null, '66', '32020661062', '32020666301178', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('833', null, '7826a4d3ceb1c619cfab56bff8b28191', 'f6iZvG', '周芮', '1551340821', null, null, null, null, '0', '18661001951', null, '66', '32020661062', '32020666301143', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('834', null, 'ddd5d56c27bccaf8015f23abbcf2f622', 'hmuPkY', '丁媛媛', '1551340821', null, null, null, null, '0', '18921163060', null, '66', '32020661062', '32020666301241', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('835', null, '0afe1023b6d319ef3fe73f60de057219', 'Q1vgaW', '吴梅', '1551340821', null, null, null, null, '0', '15506182527', null, '66', '32020661062', '32020666300646', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('836', null, 'd7bbc74df22b760db0cbe2ed5bd06cd9', 'rluRj4', '刘绍娟', '1551340821', null, null, null, null, '0', '18816202860', null, '66', '32020661062', '32020666300542', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('837', null, '9426dcddc59e02259394d1b416033a3f', 'UEpWbB', '陈雪琴', '1551340821', null, null, null, null, '0', '15061866068', null, '66', '32020661062', '32020666300288', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('838', null, '6894b6a2aec08ca63af6a534e76dccac', 'ustGIF', '陈国兰', '1551340821', null, null, null, null, '0', '13328115783', null, '66', '32020661062', '32020666300312', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('839', null, '022f18ec542b6f15246603740d6c5208', 'yH6sdb', '冯笑林', '1551340821', null, null, null, null, '0', '15852532276', null, '66', '32020661062', '32020666200602', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('840', null, '0a4efb13a03022f21427bc9a9c9cc82a', '44Z624', '习久飞', '1551340821', null, null, null, null, '0', '15961826285', null, '66', '32020661062', '32020666200387', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('841', null, '0b2a376995631280d5df891dc374887d', 'V6VeIa', '游玲', '1551340821', null, null, null, null, '0', '15190254846', null, '66', '32020661062', '32020666200195', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('842', null, '85449634112a6b061b5271c8d72b7a4a', 'nE6ckl', '边一花', '1551340821', null, null, null, null, '0', '13771039820', null, '57', '32020661007', '32020666301175', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('843', null, 'c17666b2b87aa944c1f1e2e2d5ac5226', 'id5vfT', '胡瑛洁', '1551340821', null, null, null, null, '0', '15052209793', null, '57', '32020661007', '32020666301231', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('844', null, 'f4c55d51148d0826e5c0599aed5b71c2', 'g7xYyC', '姚国芬', '1551340821', null, null, null, null, '0', '18762613524', null, '57', '32020661007', '32020666301125', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('845', null, '91c6579f570d83c9ab16f081604740c0', 'KXjjrW', '李和军', '1551340821', null, null, null, null, '0', '13814220526', null, '57', '32020661007', '32020666301093', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('846', null, 'ee99f3a8198f40aac12b718100a4a17b', 'uUzXKq', '罗张英', '1551340821', null, null, null, null, '0', '13338789780', null, '57', '32020661007', '32020666301278', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('847', null, 'cfa5e7a89a2111d5a2e735b8a26c68d0', 'EXmUyM', '霍永波', '1551340821', null, null, null, null, '0', '18352863673', null, '57', '32020661007', '32020666301343', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('848', null, '2486adc4889a1b60730a223268b7a639', 'nVu1RR', '叶寅', '1551340821', null, null, null, null, '0', '18015325255', null, '57', '32020661007', '32020666301337', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('849', null, 'e5a81cc4ab5db0bd4888af0b7fcf114f', 'WzpsuS', '孙晓霞', '1551340821', null, null, null, null, '0', '13466692037', null, '57', '32020661007', '32020666301333', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('850', null, '82641aefdc9b874b886c3681c0ee42d9', 'Wiydp6', '邹黎黎', '1551340821', null, null, null, null, '0', '13961703950', null, '57', '32020661007', '32020666200502', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('851', null, 'fb3565426f4d185b40d63b36e0f01c08', 'zMZpml', '孙毅嘉', '1551340821', null, null, null, null, '0', '13921194687', null, '57', '32020661007', '32020666200136', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('852', null, '82e602a204458faca7d2b2cf83c9296c', 'yaCXTT', '俞鸿源', '1551340821', '1551766825', '192.168.23.1', null, null, '0', '13912472575', null, '57', '32020661007', '32020666200107', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961FTv-eOxkGVfGyG2zH4s3n8');
INSERT INTO `bestop_member` VALUES ('853', null, 'cea22d868bd82d2095a1dacda0bf2856', '861Eh6', '孙晶晶', '1551340821', null, null, null, null, '0', '18261292209', null, '65', '32020661036', '32020666301160', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('854', null, 'bafb37a4e984c73d448b656cf93feeeb', 'GDzc6T', '郑阳阳', '1551340821', null, null, null, null, '0', '15951507157', null, '65', '32020661036', '32020666300976', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('855', null, 'fc6ce7d4ffdb0d0c20ba2486e45efcf9', 'rJAa2k', '宋佳', '1551340821', null, null, null, null, '0', '13914165301', null, '65', '32020661036', '32020666301232', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('856', null, '670d3d79c5faedf9c6f9b40f3eac924d', 'IGPcG4', '高飞', '1551340821', null, null, null, null, '0', '15251536225', null, '65', '32020661036', '32020666301057', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('857', null, '5537610b40eb605ea8c69d6e4b3a3c99', 'qP7JkI', '王雅婷', '1551340821', null, null, null, null, '0', '15083665623', null, '65', '32020661036', '32020666301264', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('858', null, 'd8c77509e761f83ed45504f32ddf4bd2', 'ESaa55', '徐雷', '1551340821', null, null, null, null, '0', '18556010597', null, '65', '32020661036', '32020666301335', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('859', null, '50d0a123b26bd1275491f46d1b1426e7', 'KlKIqV', '龚学仁', '1551340821', null, null, null, null, '0', '18261571966', null, '65', '32020661036', '32020666301283', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('860', null, 'fd1983ab7ceaa3557c8c5063b425168f', 'lWN4XU', '张婷', '1551340821', null, null, null, null, '0', '13585046518', null, '65', '32020661036', '32020666301271', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('861', null, '16e4d5a0a4c35c1afb7e0d51ff1f4d5b', 'gts8Lk', '唐琴英', '1551340821', null, null, null, null, '0', '13921180971', null, '65', '32020661036', '32020666300921', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('862', null, '0f4a65d9576a9c952de923f78c36c766', 'IlH2Qi', '王建军', '1551340821', null, null, null, null, '0', '15061508628', null, '65', '32020661036', '32020666300686', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('863', null, '08cf7eb64d41463e2589a7b4d3bcb7ce', 'FGVKMZ', '周晨杰', '1551340821', null, null, null, null, '0', '13771501955', null, '65', '32020661036', '32020666300668', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('864', null, 'accfe8d6d9172c52718727a324eb0d41', 'llhvuC', '缪菲', '1551340821', null, null, null, null, '0', '13771531001', null, '65', '32020661036', '32020666300380', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('865', null, '5c5dd02df9ab5ed4f27dfcee54fafe45', '36G2yi', '王蕊', '1551340821', null, null, null, null, '0', '13951765239', null, '65', '32020661036', '32020666300196', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('866', null, '7c864160a5ef0ce60a369abc80266f6e', 'qGFq3G', '虞小味', '1551340821', null, null, null, null, '0', '13812076905', null, '65', '32020661036', '32020666200016', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('867', null, '1972d322f6476f350d7b4c3e7c031f89', 'DdBVUY', '陈雪萍', '1551340821', null, null, null, null, '0', '13665128904', null, '65', '32020661036', '32020666050779', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('868', null, 'f41b668d366bf81ac3e71ea47a289bbd', 'UsLFis', '张秋菊', '1551340821', '1551834707', '192.168.23.1', null, null, '0', '13358118410', null, '65', '32020661036', '32020666050462', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961ALNxsKJ7Coe9_9U1kuXuhI');
INSERT INTO `bestop_member` VALUES ('869', null, 'd35aced35b439072ee6dc6c671e1a09a', '3FlFUJ', '孙美娟', '1551340821', '1551845693', '192.168.23.1', null, null, '0', '13861827927', null, '65', '32020661036', '32020666200018', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961BhW9VKpMs9m5-rbpJnv3Pw');
INSERT INTO `bestop_member` VALUES ('870', null, '83e19ec8d162e1a463fb44954119b3c2', 'Vwe5bq', '王丹凤', '1551340821', null, null, null, null, '0', '13656198162', null, '66', '32020661048', '32020666301266', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('871', null, '7ee38ee556107e94a4b3b55eb0de4988', 'rC558m', '张文翼', '1551340821', null, null, null, null, '0', '13585029359', null, '66', '32020661048', '32020666301267', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('872', null, 'f94a02bd2f524ed09f5fa81ede4df3c0', 'nVuSk3', '王威斐', '1551340821', null, null, null, null, '0', '13771100008', null, '66', '32020661048', '32020666301218', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('873', null, '8b3008aed1a7dcc4b42bd81dc4c69ec7', 'FRPBrK', '赵斌', '1551340821', null, null, null, null, '0', '15052284046', null, '66', '32020661048', '32020666301142', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('874', null, '2fc6eb4a8c84e7a7a836051a4e54a9fe', '8BeqXk', '盛林林', '1551340821', null, null, null, null, '0', '18762666603', null, '66', '32020661048', '32020666301086', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('875', null, 'e38ee3a099757d7d7643b3143d67102c', 'TfzI4E', '高传友', '1551340821', null, null, null, null, '0', '13914242421', null, '66', '32020661048', '32020666301246', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('876', null, '5ec1aa02969ff47295ad3a53c397b192', 'GvMvfv', '徐婷婷', '1551340821', null, null, null, null, '0', '13665176074', null, '66', '32020661048', '32020666301230', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('877', null, '075982c9f9d763ac5cab7cb10dfb018a', 'GD4pkp', '陈洁', '1551340821', null, null, null, null, '0', '13771054569', null, '66', '32020661048', '32020666301326', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('878', null, '519507d767c69767714c0ebf5233b3fa', '91nHnc', '任贵丽', '1551340821', null, null, null, null, '0', '13003341350', null, '66', '32020661048', '32020666301332', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('879', null, 'dfbfe3ad9da48202c0b6f2ce52b9d01d', 'F9lly8', '吴凡', '1551340821', null, null, null, null, '0', '15106180035', null, '66', '32020661048', '32020666301327', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('880', null, 'd431f52e681b0c9bc5cfa2eeb6dda1d4', 'QBICBT', '唐朋进', '1551340821', null, null, null, null, '0', '15051053745', null, '66', '32020661048', '32020666300649', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('881', null, '86380afd9ae75c96a2aa4ff4893f10bf', 'URZSKL', '钱玲玲', '1551340821', null, null, null, null, '0', '18762731877', null, '66', '32020661048', '32020666300592', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('882', null, 'db5cc3cc815de29224399b90549e0020', 'Euhnlt', '钱丹丹', '1551340821', null, null, null, null, '0', '13771520659', null, '66', '32020661048', '32020666300363', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('883', null, '70b1ce4431a0a4ec47ade3895c58e252', 'pC7tq9', '袁久静', '1551340821', null, null, null, null, '0', '15852557836', null, '66', '32020661048', '32020666300230', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('884', null, 'fa17c5b1cee0c231858bf804d1f19fad', 'sXR8Ab', '邓鹏', '1551340821', null, null, null, null, '0', '14751023284', null, '66', '32020661048', '32020666300187', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('885', null, '2e184a314fa746a48a94f0e0bbe28b51', 'Dw249m', '杨连龙', '1551340821', '1552370437', '192.168.23.1', null, null, '0', '13961776957', null, '66', '32020661048', '32020666050543', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961CfHq-DZA9VIzisLNy_gRo8');
INSERT INTO `bestop_member` VALUES ('886', null, '81574a68c9b18ed1c9566ed8bab38778', 'KDAp7A', '周静', '1551340821', null, null, null, null, '0', '17135100914', null, '66', '32020661048', '32020666300047', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('887', null, '41274e137336942b46b20dba4a6ec7b2', 'vH2Qdd', '丁康勤', '1551340821', '1552730443', '192.168.23.1', null, null, '0', '13812535185', null, '65', '32020661050', '32020666301202', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961AAIZcz2BA-hjgrutWMgo9U');
INSERT INTO `bestop_member` VALUES ('888', null, 'e7bc16fab22129054823fb82dd51d494', 'DGak4G', '吴晓清', '1551340821', null, null, null, null, '0', '13812278221', null, '65', '32020661050', '32020666301133', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('889', null, '67c5a4212546f7ade42728c1b496d5bc', 'J98ifa', '高志雯', '1551340821', null, null, null, null, '0', '13697030319', null, '65', '32020661050', '32020666301006', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('890', null, '861d8a9b31155eeeb294da85e24a936a', 'XMtUYR', '吴满娥', '1551340821', null, null, null, null, '0', '18915324739', null, '65', '32020661050', '32020666300796', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('891', null, '9e2d3aaf4593030b6402939b1519a392', 'Plpa15', '高应俭', '1551340821', null, null, null, null, '0', '18607933083', null, '65', '32020661050', '32020666300540', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('892', null, '854f2f7a0ac056ab43a3ca4ddc0780c6', 'JBFtSU', '徐玲', '1551340821', null, null, null, null, '0', '15961876022', null, '65', '32020661050', '32020666200581', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('893', null, '30998f20399f1b1a92b2ba4c5885f876', 'qS1RwF', '陈芳', '1551340821', null, null, null, null, '0', '15861680387', null, '65', '32020661050', '32020666200478', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('894', null, '9cfa9bb434e6236a8e629c5392dedf16', 'h6KKZd', '陆斌良', '1551340821', null, null, null, null, '0', '13814221622', null, '65', '32020661050', '32020666200449', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('895', null, 'ef5db1c0b48c8c23326a7f976d383607', '9EZUjR', '高应梅', '1551340821', '1551834731', '192.168.23.1', null, null, '0', '13921300387', null, '65', '32020661050', '32020666050385', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961G3TK_iQ2bbMNunBj2oX0w0');
INSERT INTO `bestop_member` VALUES ('896', null, '69172961552cd3ffd2808fa6d8439019', 'EmAVPT', '范赛男', '1551340821', null, null, null, null, '0', '18051335952', null, '69', '32020661051', '32020666301004', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('897', null, '7b578e61160d0e86057797eb03b28811', 'hkjPLH', '邹林峰', '1551340821', null, null, null, null, '0', '13861709551', null, '69', '32020661051', '32020666301137', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('898', null, '047e67d751d35f8f5dfe16063beceeda', 'DXeRpK', '徐千诚', '1551340821', null, null, null, null, '0', '18551200384', null, '69', '32020661051', '32020666301282', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('899', null, 'ffb038022b1e6d4a99c4d4abf46d7bc1', 'bVgwU1', '李灵', '1551340821', '1551775990', '192.168.23.1', null, null, '0', '13921107713', null, '69', '32020661051', '32020666300940', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961IRdR30i2eCzJLfu8TM5wXY');
INSERT INTO `bestop_member` VALUES ('900', null, '635568f4f778090174264bc4637a21f5', 'lWShdn', '殷燕珠', '1551340821', null, null, null, null, '0', '18015357655', null, '69', '32020661051', '32020666300836', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('901', null, '607d0b2f6ffa5a8e8f246d9a29c31cc0', 'mx7Wan', '尤丹婷', '1551340821', null, null, null, null, '0', '15852809905', null, '69', '32020661051', '32020666300593', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('902', null, 'fc603ffd2a8464aca90a11334cd86ecc', '3R5Fpp', '周玲玲', '1551340821', null, null, null, null, '0', '13382213170', null, '69', '32020661051', '32020666300558', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('903', null, 'fd0d1275f8695542f4d0391ca0e41a10', 'd472yA', '费涛', '1551340821', null, null, null, null, '0', '15295003372', null, '69', '32020661051', '32020666300581', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('904', null, '58022290b1431afd555a5ac1b3c3428e', 'g2dLEH', '马晓云', '1551340821', null, null, null, null, '0', '15852759000', null, '69', '32020661051', '32020666300394', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('905', null, '296ef06395664fe54d4f16a65a773242', 'MB1GZ7', '肖林华', '1551340821', null, null, null, null, '0', '13921105523', null, '69', '32020661051', '32020666300112', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('906', null, 'ff2be7ea1c927e0cc81d277de6e0fa16', '75nj9I', '张英珠', '1551340821', null, null, null, null, '0', '13861637379', null, '69', '32020661051', '32020666200389', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('907', null, '63feb59944e7b6d6fa6beb869f16e0ac', '9ctkFA', '唐丹丹', '1551340821', null, null, null, null, '0', '13901523409', null, '69', '32020661051', '32020666050854', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('908', null, '5b28c7841d86533d67f73de126fab006', 'azFwq7', '戴亚萍', '1551340821', null, null, null, null, '0', '13771043559', null, '69', '32020661051', '32020666200487', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('909', null, 'cf67bb44e7d07ffe4c046afc1bd97a46', 'dDu25r', '尤碧华', '1551340821', '1551663463', '192.168.23.1', null, null, '0', '13376201690', null, '69', '32020661051', '32020666050265', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Gumyn2T4TPa_DHgwSQPcCM');
INSERT INTO `bestop_member` VALUES ('910', null, '9dc6c6e7c098198699ae31d7754c0b56', 'MwagE7', '尤俐萍', '1551340821', null, null, null, null, '0', '13616187320', null, '69', '32020661053', '32020666301090', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('911', null, '1019f768d4de93c125860af1bfdbcd39', 'mE2E2N', '刘嘉欣', '1551340821', null, null, null, null, '0', '15852593661', null, '69', '32020661053', '32020666301245', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('912', null, '7c282ea8aeee335c43f616353044b155', 'b2URF3', '李荣', '1551340821', null, null, null, null, '0', '15995265758', null, '69', '32020661053', '32020666301316', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('913', null, 'bdf334e40b3985a3a1ec36bc338dcd86', 'ab8ALe', '杨莲俊', '1551340821', null, null, null, null, '0', '15006195827', null, '69', '32020661053', '32020666300881', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('914', null, 'df748c5160094394e5d09e1f694bb54f', 'v4yUcH', '薛梦凡', '1551340821', null, null, null, null, '0', '18206192497', null, '69', '32020661053', '32020666300706', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('915', null, '692dfdaee04115e10005cb4c6e8a47db', 'CA3lHm', '付冰霞', '1551340821', null, null, null, null, '0', '17706191713', null, '69', '32020661053', '32020666300909', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('916', null, '972d8f8d03087d563285ad4ac18322db', 'QYLV1Q', '尤辰', '1551340821', null, null, null, null, '0', '13771115336', null, '69', '32020661053', '32020666300232', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('917', null, '530894c50c0c6f3dba1377e46889e7d1', 'MLyXJv', '王涛', '1551340821', null, null, null, null, '0', '15161695755', null, '69', '32020661053', '32020666200092', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('918', null, 'd4d1842c52d5807b599d575297f9c3ce', 'TTMbgw', '杨金萍', '1551340821', '1551663644', '192.168.23.1', null, null, '0', '13771529612', null, '69', '32020661053', '32020666050778', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961Nw1LT69enRhhDXfy2kKwfk');
INSERT INTO `bestop_member` VALUES ('919', null, '002effbe4f51ec70c6baa70d5689f6c0', 'rQp9zt', '吴敏', '1551340821', null, null, null, null, '0', '18921181299', null, '69', '32020661053', '32020666300013', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('920', null, 'c01a5ec2cd202aec5602c2bf7b9e8b59', 'dN9Gz9', '高钰淼', '1551340821', null, null, null, null, '0', '13961832601', null, '69', '32020661054', '32020666301219', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('921', null, 'fa74c52c3d3cb46f67d29e52f1cae674', 'BTw5hB', '王清君', '1551340822', null, null, null, null, '0', '18851582239', null, '69', '32020661054', '32020666301157', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('922', null, '3ae51637cb48a0cf80b8556c2924ac96', 'BlKxTI', '胡兰兰', '1551340822', '1551866618', '192.168.23.1', null, null, '0', '13327903657', null, '69', '32020661054', '32020666301111', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961IAmJtvY17FNBgEvULLV1QQ');
INSERT INTO `bestop_member` VALUES ('923', null, '7c4efc80692251aeca4a46bb27df3bd4', 'XpeFjD', '潘丽敏', '1551340822', '1552113937', '192.168.23.1', null, null, '0', '13338742717', null, '69', '32020661054', '32020666301344', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961A6ml1o-nBvS86wD45N-nEc');
INSERT INTO `bestop_member` VALUES ('924', null, '8b2d580223b1c2e16e0610ad12ed4309', 'i5vTf4', '郑勤妹', '1551340822', null, null, null, null, '0', '13771482665', null, '69', '32020661054', '32020666301284', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('925', null, '471d029fe9ce0eb6a68731ea1e66256c', 'J1qrL8', '王浩波', '1551340822', '1551873201', '192.168.23.1', null, null, '0', '13338100123', null, '69', '32020661054', '32020666300694', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961JKFAx_5Q9T9rS0W15cp6w4');
INSERT INTO `bestop_member` VALUES ('926', null, '3d2c5a55af96742db16947cd69ff8648', 'rmIjGG', '胡伟琴', '1551340822', null, null, null, null, '0', '13812161236', null, '69', '32020661054', '32020666300867', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('927', null, '0ae825e4e9151f46eaf0e23fc28e5990', 'a99w8r', '姜小连', '1551340822', '1551663494', '192.168.23.1', null, null, '0', '15961709690', null, '69', '32020661054', '32020666300870', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961LOerjGkgmMUdxYZzuxg2vg');
INSERT INTO `bestop_member` VALUES ('928', null, '9bf8a54f7de5f835a2774a00af76a530', 'UlLrh4', '陈菊萍', '1551340822', null, null, null, null, '0', '13621507221', null, '69', '32020661054', '32020666300573', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('929', null, '1e9527afb0ac000583ffbb01cc62f2f9', 'auP4m3', '杨夏怡', '1551340822', null, null, null, null, '0', '18861607870', null, '69', '32020661054', '32020666300355', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('930', null, 'c76cf5c544d99a6529226247a1e22c63', 'Enb7q2', '高建平', '1551340822', '1551831261', '192.168.23.1', null, null, '0', '13901510432', null, '69', '32020661054', '32020666300235', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961KAKsL27ZvBkeb4hrVKfagw');
INSERT INTO `bestop_member` VALUES ('931', null, 'cfb27f96c88b7544b1b347e99ac1292d', 'skJBDe', '杨黎明', '1551340822', null, null, null, null, '0', '13806187807', null, '69', '32020661054', '32020666200522', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('932', null, 'aaa8020fc311def47706c100bfd75d4a', 'irSq23', '胡成娟', '1551340822', '1551663500', '192.168.23.1', null, null, '0', '15951566647', null, '69', '32020661054', '32020666200390', '江苏', '无锡', '国寿惠山支公司', null, '4', 'oK_961Px7IPAP8dg3wtpjfjzK80c');
INSERT INTO `bestop_member` VALUES ('933', null, 'fff55c0627823831be6db003389ccc10', '22mctx', '夏红', '1551340822', '1551844588', '192.168.23.1', null, null, '0', '18861836816', null, '69', '32020661054', '32020666200298', '江苏', '无锡', '国寿惠山支公司', null, '4', 'oK_961JlpGi63Ma89Nu6Vvk4-BWU');
INSERT INTO `bestop_member` VALUES ('934', null, '653399f25d8c3b688c64acc3263af3d9', 'hYdS2S', '严淼', '1551340822', null, null, null, null, '0', '13771539133', null, null, '32020661xxx', '32020666300125', null, null, null, null, null, null);
INSERT INTO `bestop_member` VALUES ('935', null, '4bfd99eaf975326d364011b5dc78d7d8', 'LVbZ1D', '虚拟主管', '1551340822', null, null, null, null, '0', '13011111111', null, null, '32020661xxx', '32020661000000', null, null, null, null, null, null);
INSERT INTO `bestop_member` VALUES ('936', null, '8b22298ce7c31f8529030687312c83e0', 'xuU9Ui', '辅孝坤', '1551340822', null, null, null, null, '0', '15861695266', null, null, '32020661xxx', '32020666050134', null, null, null, null, null, null);
INSERT INTO `bestop_member` VALUES ('937', null, '2a78648d338fdc02a818095c13961d15', '2Fk58n', '肖伟', '1551340822', null, null, null, null, '0', '13358107872', null, null, '32020661xxx', '32020666050091', null, null, null, null, null, null);
INSERT INTO `bestop_member` VALUES ('938', null, '80ea4094ba34525a27188d3ef96e31f7', 'J9uhGU', '石玲', '1551340822', null, null, null, null, '0', '13395119613', null, null, '32020661xxx', '32020666050190', null, null, null, null, null, null);
INSERT INTO `bestop_member` VALUES ('939', null, 'c64d473e4f3e280265216f147b696fa2', 'isIVam', '于玲', '1551340822', null, null, null, null, '0', '18115383732', null, '57', '32020661087', '32020666300975', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('940', null, '986300a4108319b2106dfba85b1a5991', 'CKNv1S', '李建琴', '1551340822', '1551835657', '192.168.23.1', null, null, '0', '13921271472', null, '57', '32020661087', '32020666301025', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961B97DCrIbVQEhCJh3GoGXPk');
INSERT INTO `bestop_member` VALUES ('941', null, '08a83ec8cb4dcccbf5420c72d4b36026', 'BD3EqC', '张金兰', '1551340822', null, null, null, null, '0', '15852843610', null, '57', '32020661087', '32020666301114', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('942', null, '40090861ee71551e6bba3cce55314b87', 'abkS4U', '资平花', '1551340822', '1551847199', '192.168.23.1', null, null, '0', '13861723305', null, '57', '32020661087', '32020666301191', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961PFlG88Tl8ELrSuvNCA8oc0');
INSERT INTO `bestop_member` VALUES ('943', null, '266140b2bc315f955dcddedbb392c419', 'v7wzXZ', '李小燕', '1551340822', null, null, null, null, '0', '15852801739', null, '57', '32020661087', '32020666301292', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('944', null, 'f68f571a87812772c06e1249187c06ee', 'KQiBMt', '陈玉禄', '1551340822', '1551847600', '192.168.23.1', null, null, '0', '13357918982', null, '57', '32020661087', '32020666300911', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961OP2LQvPRCMeOjhI9mGWoaE');
INSERT INTO `bestop_member` VALUES ('945', null, '72d528d48f5adcf9a5ff5d7586008b60', 'neid2z', '殷凤娣', '1551340822', null, null, null, null, '0', '18626371651', null, '57', '32020661087', '32020666300786', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('946', null, 'a1160c6216a43bcc0162ce7c72beacf4', '319q7f', '陈强', '1551340822', null, null, null, null, '0', '13616196135', null, '57', '32020661087', '32020666300658', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('947', null, '84f217033ebeb01eb436155b2dd74bd4', 'zZWhrp', '黄维维', '1551340822', '1551846428', '192.168.23.1', null, null, '0', '15161699359', null, '57', '32020661087', '32020666300277', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961Fv8HCvveN_yRWHEIsD0gF0');
INSERT INTO `bestop_member` VALUES ('948', null, 'da5016533746b81cfb2980f9aabdc23f', 'S6YxTE', '冯学彦', '1551340822', null, null, null, null, '0', '18036070276', null, '67', '32020661089', '32020666301023', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('949', null, 'f621c28159f8593729305628db2da314', 'wIskxS', '孙跃婷', '1551340822', '1551776653', '192.168.23.1', null, null, '0', '18706173055', null, '67', '32020661089', '32020666301251', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961MPpZOzwZ5mnfWZe3_N55xI');
INSERT INTO `bestop_member` VALUES ('950', null, '44d368a4afb6d253ed274f354b96ddd1', 'felMip', '陈学荣', '1551340822', null, null, null, null, '0', '13812525041', null, '67', '32020661089', '32020666301113', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('951', null, '39e7805aa8066efb13b89ab28718b89d', '3i9ESu', '刘方方', '1551340822', null, null, null, null, '0', '15861432923', null, '67', '32020661089', '32020666301223', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('952', null, '052d54e539a30e0ceeaeffb60af99afa', 'gSAtly', '田学花', '1551340822', null, null, null, null, '0', '13598700106', null, '67', '32020661089', '32020666301250', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('953', null, '7871c82c84122f8c6c04f7eb6fa739d7', 'zseHKv', '蒋在杰', '1551340822', null, null, null, null, '0', '15856795983', null, '67', '32020661089', '32020666300987', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('954', null, 'b724de6409012de32faf5800530e9b29', 'CwafYm', '金希南', '1551340822', null, null, null, null, '0', '13382240799', null, '67', '32020661089', '32020666301302', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('955', null, '40be42f7f7e7c92ad87ee508e42ffc0e', '1rmzAu', '李洪霞', '1551340822', '1551852311', '192.168.23.1', null, null, '0', '15206185092', null, '67', '32020661089', '32020666300803', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961BvAViUNPOEbN9MXPbuXvac');
INSERT INTO `bestop_member` VALUES ('956', null, '96b9ca23129eff916a3272e10961dbe7', 'beI9sh', '蒋在亮', '1551340822', null, null, null, null, '0', '15298426795', null, '67', '32020661089', '32020666300432', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('957', null, '1402063539430ea2981f1e27cba4b37c', 'HDxg5c', '李敬敬', '1551340822', '1551840027', '192.168.23.1', null, null, '0', '15052123473', null, '67', '32020661089', '32020666300275', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961MPpZOzwZ5mnfWZe3_N55xI');
INSERT INTO `bestop_member` VALUES ('958', null, 'bed6b4f1e060762fc5d4fca02c67d6bf', 'Yaur7b', '李梅', '1551340822', '1551775385', '192.168.23.1', null, null, '0', '15050690578', null, '67', '32020661089', '32020666300325', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Nh51ylgW7l3ttpKzcT8E9k');
INSERT INTO `bestop_member` VALUES ('959', null, 'b00317290023026f1f3762bb9632a840', 'UhhXU8', '刘亚瑛', '1551340822', null, null, null, null, '0', '13585003297', null, '67', '32020661100', '32020666301030', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('960', null, '998a19297288ec8ee0c9584e969df94b', '3SIZDj', '黄燕飞', '1551340822', null, null, null, null, '0', '13921503655', null, '67', '32020661100', '32020666301165', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('961', null, '5b298afe3e7f6bbeebe8427040eeb87f', 'bK9A1W', '王荣香', '1551340822', null, null, null, null, '0', '13952410637', null, '67', '32020661100', '32020666301355', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('962', null, '13ada6086b34ad3759c2eee37cb6cff5', 'fbPY5F', '沈振东', '1551340822', '1551837053', '192.168.23.1', null, null, '0', '13812075178', null, '67', '32020661100', '32020666300932', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961MivUGgphN3W0eNfYVNGHWY');
INSERT INTO `bestop_member` VALUES ('963', null, '078134b4905e9cd627f6849e7196ddc4', 'x1E4Fb', '董娟娣', '1551340822', '1551833852', '192.168.23.1', null, null, '0', '13921521513', null, '67', '32020661100', '32020666300438', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961KwdXDuw5dVjQ7543bQDiHQ');
INSERT INTO `bestop_member` VALUES ('964', null, '3591ae8ba32a9ac3bb036cb2e3233536', 'pwUH9r', '吕燕蓉', '1551340822', null, null, null, null, '0', '13861762075', null, '67', '32020661100', '32020666300584', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('965', null, 'ef495d92676ed5b46abb1c95dbb0899b', 'GqlgFZ', '周佳琦', '1551340822', null, null, null, null, '0', '13951505102', null, '67', '32020661100', '32020666300448', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('966', null, '1f635915c0990df47c25520a0dc7f46a', 'hgZb4n', '杨炯林', '1551340822', null, null, null, null, '0', '13906135114', null, '69', '32020661077', '32020666301220', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('967', null, '1b0364983e3193b7ac2d61ff559ad015', 'wXxgkt', '陆婷婷', '1551340822', null, null, null, null, '0', '13382254604', null, '69', '32020661077', '32020666301078', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('968', null, '6d3fd078316d2ee1e814a3f29f7d4e23', '1nxG7A', '鹿瑶瑶', '1551340822', null, null, null, null, '0', '13912377657', null, '69', '32020661077', '32020666301270', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('969', null, '14fcbc290072ad189cd0ae0d39e75407', '4ywvNN', '张小红', '1551340822', null, null, null, null, '0', '13083513616', null, '69', '32020661077', '32020666300934', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('970', null, '5a1a57a25cfdcf14256f40c67677db15', 'CJyNxn', '金梦莹', '1551340822', null, null, null, null, '0', '15961854604', null, '69', '32020661077', '32020666300610', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('971', null, 'a8788844da25d0a00d3f49e840a30514', 'YjnbNY', '高冬红', '1551340822', null, null, null, null, '0', '13665182727', null, '69', '32020661077', '32020666300120', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('972', null, 'f346be6cd9f404823b23ad6ddc33621a', 'KLl29Q', '周小萍', '1551340822', null, null, null, null, '0', '18914106939', null, '69', '32020661077', '32020666300066', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('973', null, '542e2db3d2672c4e795767850692198b', 'PWRmCU', '李惠超', '1551340822', null, null, null, null, '0', '18651566527', null, '69', '32020661077', '32020666300138', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('974', null, 'e5eaa854c52134d6b58b11740ddfeb99', 'eHnaCk', '高二华', '1551340822', '1551663450', '192.168.23.1', null, null, '0', '13511644665', null, '69', '32020661077', '32020666200360', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961LMakSXFWq7OjKZGBWQM60k');
INSERT INTO `bestop_member` VALUES ('975', null, '744d6a1e308cc60f79bad2ac719d86a3', 'hhMCfF', '陈文', '1551340822', null, null, null, null, '0', '13914001126', null, '67', '32020661098', '32020666301117', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('976', null, '74180491c6346335ee385891d3ab6d85', 'zQ2X4A', '姚雷', '1551340822', null, null, null, null, '0', '15161503141', null, '67', '32020661098', '32020666300980', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('977', null, 'a719173d1bb579dde5328fafb8aa1248', '27jq9Y', '丁晨成', '1551340822', null, null, null, null, '0', '18001514782', null, '67', '32020661098', '32020666301210', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('978', null, 'deb018a6b98312040454ca2ba95eb4c8', 'pwT8zP', '孙波', '1551340822', null, null, null, null, '0', '15061845536', null, '67', '32020661098', '32020666301225', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('979', null, 'c8a7b599acccce92652e27e50f66b4c8', 'RgNNQY', '柯丽萍', '1551340822', '1551852525', '192.168.23.1', null, null, '0', '13003396308', null, '67', '32020661098', '32020666301035', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961KH7OqpOu33zcfy6g4aYPsg');
INSERT INTO `bestop_member` VALUES ('980', null, 'ecb87607a7b54475fe00151c875a10a4', 'Utrg4j', '张红丽', '1551340822', null, null, null, null, '0', '18295703635', null, '67', '32020661098', '32020666301261', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('981', null, '73f626cb11a6936eb451dc99a431850f', 'kt1tuB', '郭莉莉', '1551340822', null, null, null, null, '0', '15961883369', null, '67', '32020661098', '32020666301314', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('982', null, 'dfd350a844c7fed1b6480367a13fda01', 'HR7Alx', '欧敏', '1551340822', null, null, null, null, '0', '17312959010', null, '67', '32020661098', '32020666301272', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('983', null, 'e3db8697e8398286967f732ff75a9344', 'XNffnQ', '俞晓栋', '1551340822', null, null, null, null, '0', '18921505536', null, '67', '32020661098', '32020666300384', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('984', null, '89853835f3f4abd289f1c622a157b14f', '7Rf96b', '周莹', '1551340822', null, null, null, null, '0', '13914240125', null, '57', '32020661096', '32020666301049', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('985', null, '84b854f14c26090c68a3196a3864f0fe', 'VJltCS', '韩玉丹', '1551340822', null, null, null, null, '0', '18851570686', null, '57', '32020661096', '32020666301184', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('986', null, '7ca9f466942d6f98bb4472213a829f57', 'rtBP9W', '罗金辉', '1551340822', null, null, null, null, '0', '13771167786', null, '57', '32020661096', '32020666301001', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('987', null, 'e894c4ba114655c62657e6251ed59514', '1uj3y2', '王娟', '1551340822', null, null, null, null, '0', '15151110929', null, '57', '32020661096', '32020666301026', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('988', null, '2ec4411459bb673e9f7ce55f4091ae4f', 'q7wqAa', '胡瑞', '1551340822', null, null, null, null, '0', '18652486278', null, '57', '32020661096', '32020666301298', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('989', null, '6434b067ed4c600bcf18dfe8cd0d0958', '8raYLD', '唐显荣', '1551340822', '1551835430', '192.168.23.1', null, null, '0', '13901511276', null, '57', '32020661096', '32020666301279', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Ht0fq3rVWsQiugfQXI8n28');
INSERT INTO `bestop_member` VALUES ('990', null, 'd50e6d01b5a70328d38f29c3df5d5788', 'yKgPIv', '陈国萍', '1551340822', '1551835459', '192.168.23.1', null, null, '0', '13506173762', null, '57', '32020661096', '32020666301310', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Lyf6tFSXnYL45HZAItfowo');
INSERT INTO `bestop_member` VALUES ('991', null, 'be0a8539f1b98a5709586b1b4b662f56', 'KMJdLa', '甄小翠', '1551340822', null, null, null, null, '0', '18861862433', null, '57', '32020661096', '32020666300818', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('992', null, '273db8543ab6f85b605f43c8c5bcdfc2', 'dAlsP4', '黄新玉', '1551340822', '1551875937', '192.168.23.1', null, null, '0', '13338107560', null, '57', '32020661096', '32020666300923', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961Pi3U3KqoF4zamPSNoI-aUw');
INSERT INTO `bestop_member` VALUES ('993', null, '2f4aabf592c8b7fa5240d3eca87e8ce3', 'jnpWhj', '徐双越', '1551340822', null, null, null, null, '0', '15852504610', null, '57', '32020661096', '32020666300619', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('994', null, 'fcaf3b5605ab18875b99774ac76c7413', 'h8sAt9', '甄玉芳', '1551340822', '1551835437', '192.168.23.1', null, null, '0', '15161530881', null, '57', '32020661096', '32020666300369', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961F2e-JU7lwM06r0tmd4uo_k');
INSERT INTO `bestop_member` VALUES ('995', null, '7758f9d3ff2acaefa2eacc1584fadda4', 'FkdAbX', '华建英', '1551340822', '1551835595', '192.168.23.1', null, null, '0', '15161582903', null, '57', '32020661079', '32020666301139', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961B73xS9MuQ3fnkhxcH797oQ');
INSERT INTO `bestop_member` VALUES ('996', null, '2f95ebacf54749fcad13d65916ccc6eb', 'lsulCg', '韩晓雯', '1551340822', null, null, null, null, '0', '13806188274', null, '57', '32020661079', '32020666301239', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('997', null, '46ce3807e4e1483aeebc4f20bbebdc8e', 'h32Gi9', '杜亚丽', '1551340822', null, null, null, null, '0', '13196766075', null, '57', '32020661079', '32020666301009', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('998', null, 'a99ea42b0b2003245985864fff2446a8', 'eIg71C', '蒋丽娟', '1551340822', null, null, null, null, '0', '13812283432', null, '57', '32020661079', '32020666301168', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('999', null, '9961246a6cc5d58a620e0155058b7ba7', 'NnxUew', '刘舒一', '1551340822', null, null, null, null, '0', '15351975099', null, '57', '32020661079', '32020666301043', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1000', null, 'a775d1918794c01427e0ed3fb81efe89', 'CzMXn8', '李烨琪', '1551340822', '1551835367', '192.168.23.1', null, null, '0', '13023355183', null, '57', '32020661079', '32020666301334', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961HVjaIWyUheGK6zo5aENwS4');
INSERT INTO `bestop_member` VALUES ('1001', null, '597766ae788a4c48056bf2a7a8975756', 'pYBpvE', '陈晓樱', '1551340822', null, null, null, null, '0', '13812068650', null, '57', '32020661079', '32020666301345', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1002', null, '6610a0a7b30c78c0e264be9e5773c718', '7ZaghZ', '鲍静', '1551340822', '1551835420', '192.168.23.1', null, null, '0', '13616193869', null, '57', '32020661079', '32020666301350', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961EXE_7LvmvC9sRqZY4llUyw');
INSERT INTO `bestop_member` VALUES ('1003', null, 'd6eeba456d86e239371377cfed30844e', 'JnuqZG', '陶飞', '1551340822', null, null, null, null, '0', '15251664081', null, '57', '32020661079', '32020666301299', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1004', null, '6caec9b1cb50e5a21d0541bea19d1c14', 'z4ULqN', '朱洪华', '1551340822', null, null, null, null, '0', '15861402997', null, '57', '32020661079', '32020666301354', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1005', null, 'a8c16e504d29978277f850334b6608b8', 'LxNA54', '白沁', '1551340822', null, null, null, null, '0', '15852743322', null, '57', '32020661079', '32020666301338', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1006', null, '1ac21dc2e039b22ce7c7d9cd14416518', 'ltR9gr', '朱林凤', '1551340822', null, null, null, null, '0', '18206183857', null, '57', '32020661079', '32020666301317', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1007', null, 'e58d154dd273c871d8bf665b456bc426', 'u9FYdM', '张磊', '1551340822', null, null, null, null, '0', '18626319803', null, '57', '32020661079', '32020666301311', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1008', null, 'd7d174a465b873ba3dede100037fde22', 'M7kYGs', '皮居引', '1551340822', null, null, null, null, '0', '15261599867', null, '57', '32020661079', '32020666301293', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1009', null, '8e032e3d8e6f943914c2e98a072b9291', '2tRLb4', '饶进忠', '1551340822', null, null, null, null, '0', '13915343619', null, '57', '32020661079', '32020666301342', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1010', null, '704685caa5c76a8a00f4c700ceb43aca', 'zWbIle', '孙焕娣', '1551340822', null, null, null, null, '0', '15861666933', null, '57', '32020661079', '32020666300916', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1011', null, 'cf8d9cdb599222e6e6e09f68ca4cf7c4', '1czCda', '章利娟', '1551340822', null, null, null, null, '0', '13912359428', null, '57', '32020661079', '32020666300795', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1012', null, 'd5cf8310cf73c3d40524976414fcb11e', 'Q8YbKU', '宋梦婷', '1551340822', null, null, null, null, '0', '18915284997', null, '57', '32020661079', '32020666300670', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1013', null, 'b3ced9bcf144c0f73d8c506249165bc3', 'LGJE2s', '刘贵梅', '1551340822', '1551835450', '192.168.23.1', null, null, '0', '15161592487', null, '57', '32020661079', '32020666300852', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961HGOLRNDF3_eRZSiKsf1-FQ');
INSERT INTO `bestop_member` VALUES ('1014', null, 'b8f5100d1bbe8d10292453fdd6561421', 'eHkFhx', '华雅洁', '1551340822', '1551835624', '192.168.23.1', null, null, '0', '13771466698', null, '57', '32020661079', '32020666300608', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961CNOUf9Vt2U_NMJ0lOti1T0');
INSERT INTO `bestop_member` VALUES ('1015', null, 'e72887cb3e2b54aaac955c9767dfd630', 'N8sL3m', '李秀娟', '1551340822', null, null, null, null, '0', '13222901637', null, '57', '32020661079', '32020666300330', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1016', null, '5b71dbdcde48efaf642836bb50586af3', 'PqnC25', '陶丽', '1551340822', '1551835393', '192.168.23.1', null, null, '0', '13337906817', null, '57', '32020661079', '32020666300188', '江苏', '无锡', '国寿惠山支公司', null, '3', 'oK_961I8C1J9PhStUl2wDMDJGQaY');
INSERT INTO `bestop_member` VALUES ('1017', null, 'b40e1f4199bc44d7127a065b7a7eb0f6', 'BIhSTN', '贾媛', '1551340822', null, null, null, null, '0', '18852472880', null, '67', '32020661110', '32020666301253', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1018', null, 'ba6a03136ff338885853d6e1038c8836', '7n6teu', '王宏', '1551340822', null, null, null, null, '0', '13771538190', null, '67', '32020661110', '32020666301212', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1019', null, '127318c91034cd4c8be12c5bf33aba8e', 'FstgCj', '缪琰芬', '1551340822', '1551837019', '192.168.23.1', null, null, '0', '13961787311', null, '67', '32020661110', '32020666301289', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961DAlMo-sacJvK0ho15Cgt24');
INSERT INTO `bestop_member` VALUES ('1020', null, '81730c47e7b90956f6bd34a72d61d14d', 'xvZR2L', '钱跃', '1551340822', null, null, null, null, '0', '15251622820', null, '67', '32020661110', '32020666301321', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1021', null, 'eb046f657c94666859b8beccb0aa2482', 'VwmKE1', '张娟', '1551340822', null, null, null, null, '0', '15961806089', null, '67', '32020661110', '32020666301330', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1022', null, '530cfaa4ec3819e29bbb05d53e0d05b0', 'VyTTu3', '缪崎芬', '1551340822', null, null, null, null, '0', '15052125207', null, '67', '32020661110', '32020666301320', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1023', null, '87fea750258141c7d6f416ae442f9619', 'kPE6DG', '李宗凯', '1551340822', null, null, null, null, '0', '15052279179', null, '67', '32020661110', '32020666300884', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1024', null, 'a41c49594833386cbdc3cbe683db2403', 'bBgBaD', '王水琴', '1551340822', null, null, null, null, '0', '13806174252', null, '67', '32020661110', '32020666300928', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1025', null, 'a2d0ef3603b2fb9e6650566ce890a69c', 'zZgC9M', '冯林刚', '1551340822', null, null, null, null, '0', '13665143766', null, '67', '32020661110', '32020666300842', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1026', null, '746dae61ef9fa7b0812f995cb47a0f78', '6z5yXG', '刘灵', '1551340822', null, null, null, null, '0', '13771114606', null, '67', '32020661110', '32020666300769', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1027', null, '0b5bf70f373a6d1ed6e190efa9279829', 'nxYwCg', '韩广霞', '1551340822', '1551768667', '192.168.23.1', null, null, '0', '15251699642', null, '67', '32020661110', '32020666300401', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961EQ4Btm0Qbd4OdNufra3Jpw');
INSERT INTO `bestop_member` VALUES ('1028', null, 'a67154f561e8ecfe7737ecaf6b3a4133', 'P7sTqf', '宁佳佳', '1551340822', null, null, null, null, '0', '18661053165', null, '67', '32020661074', '32020666301170', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1029', null, '256973b9845e9a5fd93df233c0c94319', '2SgcE3', '徐娟', '1551340822', null, null, null, null, '0', '18023678980', null, '67', '32020661074', '32020666300969', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1030', null, '9ae7ea932e5e4af836f1bd09f8909bd1', 'ukwmnB', '高培培', '1551340822', null, null, null, null, '0', '18751563662', null, '67', '32020661074', '32020666301054', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1031', null, '95a4588d755b079f9c7d849558416224', 'yeT7am', '杨伟', '1551340822', '1551837059', '192.168.23.1', null, null, '0', '13814236776', null, '67', '32020661074', '32020666301346', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Gk766KUWHFj0mg49MeGZIQ');
INSERT INTO `bestop_member` VALUES ('1032', null, '9d2788cdc4b5288d2984c49454f20a21', 'lXg6S2', '江苗苗', '1551340822', null, null, null, null, '0', '13814258861', null, '67', '32020661074', '32020666301291', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1033', null, '9519689ce967414f9597b9e1343de652', '2sxEQS', '张贤丽', '1551340822', '1551846342', '192.168.23.1', null, null, '0', '18018366936', null, '67', '32020661074', '32020666301357', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961NVM6SjfGy8BOz8vrEKK8Vw');
INSERT INTO `bestop_member` VALUES ('1034', null, '76640dd06845d222d4d2fbab8744e10b', 'SNywnt', '汪娅艳', '1551340822', '1551768471', '192.168.23.1', null, null, '0', '13771414859', null, '67', '32020661074', '32020666300859', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Gk766KUWHFj0mg49MeGZIQ');
INSERT INTO `bestop_member` VALUES ('1035', null, '0e7cea7fe09877a92ae7c902f1eab2c2', 'HNdUcL', '薛余诚佳', '1551340822', '1551836977', '192.168.23.1', null, null, '0', '18851574420', null, '67', '32020661074', '32020666300824', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961CjYwj3C8GW4MStasyZ8_yQ');
INSERT INTO `bestop_member` VALUES ('1036', null, '9f3faa324e416e5fd4e247f26fc4b05e', 'a7brqq', '洪保琴', '1551340822', '1551837079', '192.168.23.1', null, null, '0', '18261550530', null, '67', '32020661074', '32020666300755', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961CuWWoUESc_KpUDtVgP78JA');
INSERT INTO `bestop_member` VALUES ('1037', null, '6a8efb4f6de8adcdbe9aa742279e9b6e', 'StHHsJ', '范愿愿', '1551340822', '1551837011', '192.168.23.1', null, null, '0', '15895351009', null, '67', '32020661074', '32020666300443', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961IaZp95E68O3qatT_WIKcoA');
INSERT INTO `bestop_member` VALUES ('1038', null, 'e39b850dc9c625fb72ba11354c12b003', 'H9WmY3', '惠煜', '1551340822', null, null, null, null, '0', '13812099534', null, '67', '32020661074', '32020666300599', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1039', null, 'f24f94d517e5d5e862abe5f3f4360bd3', '7GgVLe', '冯林洋', '1551340822', null, null, null, null, '0', '13771545974', null, '67', '32020661074', '32020666300238', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1040', null, 'f2ebd42318681752355a059bd20d304a', 'SXvajk', '冯林和', '1551340822', '1552366599', '192.168.23.1', null, null, '0', '13912486157', null, '67', '32020661074', '32020666200580', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961MoKFK50CivfbmDp65cNj5A');
INSERT INTO `bestop_member` VALUES ('1041', null, '923fabc11ac921ca9b9e78f4626a030d', 'rH5DN2', '叶中勤', '1551340822', null, null, null, null, '0', '13915277374', null, '70', '32020661088', '32020666301046', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1042', null, '0f8d8f40294b7b05f8f41dd0ed312967', 'MLHNEn', '张庆香', '1551340822', null, null, null, null, '0', '13013679866', null, '70', '32020661088', '32020666300953', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1043', null, '29d9dd0f49769052f9277ee454f413ea', '135yCV', '杨帆', '1551340822', null, null, null, null, '0', '13656196486', null, '70', '32020661088', '32020666301088', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1044', null, 'ca675c0b90aebebe26442b7526d42b7d', 'NfymHI', '梁程', '1551340822', null, null, null, null, '0', '13621501611', null, '70', '32020661088', '32020666300783', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1045', null, '25c65fb04f6588770704cb482f0b4a30', 'Rc418K', '赵加亮', '1551340822', null, null, null, null, '0', '15722989631', null, '70', '32020661088', '32020666300779', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1046', null, 'd182a7abef6125f3c5d4b8db666d5bdf', 'nb7icT', '汪飞', '1551340822', null, null, null, null, '0', '18601587381', null, '70', '32020661088', '32020666300399', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1047', null, '7ace91e43b2e41a50df9897e53ba90af', 'a29kcG', '陈杰', '1551340822', null, null, null, null, '0', '13921180824', null, '70', '32020661088', '32020666300440', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1048', null, '4fd705a8c58c62d5f458de8da7922cba', '4TzY4y', '石学永', '1551340822', null, null, null, null, '0', '13506173919', null, '70', '32020661088', '32020666300453', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1049', null, '1bf1245fa9e0dfd2b4f34df89a6a11e7', 'IiwuFa', '赵利斌', '1551340822', null, null, null, null, '0', '13027018096', null, '65', '32020661090', '32020666301269', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1050', null, 'b0b784188fbda5a51c670fc3cea1e384', 'jwcdKi', '杜彩虹', '1551340822', null, null, null, null, '0', '17534920957', null, '65', '32020661090', '32020666301268', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1051', null, '8fc19ca38399c9e97d0375984619cf65', 'NRfx8N', '韩丽娜', '1551340822', null, null, null, null, '0', '18762807899', null, '65', '32020661090', '32020666301196', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1052', null, 'c9363ed5970bea9b75afea4641b854f0', 'fCHLaz', '刘静', '1551340822', null, null, null, null, '0', '18051951729', null, '65', '32020661090', '32020666301207', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1053', null, '95a263f335dc12fbe18d05566b4db17f', 'DxStkA', '查丽雅', '1551340822', null, null, null, null, '0', '18018351259', null, '65', '32020661090', '32020666301309', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1054', null, '159eb48a042ba96588fd68405d3ebffa', 'VlDwsk', '朱光成', '1551340822', null, null, null, null, '0', '18352576590', null, '65', '32020661090', '32020666300919', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1055', null, '87a6306899b48f2f7b2cf48daf97563a', 'LTJa1y', '查小娇', '1551340822', null, null, null, null, '0', '18852475068', null, '65', '32020661090', '32020666300931', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1056', null, '10f83710b23af52da91d488f98bf0cac', 'LkL8Ty', '刘丹', '1551340822', null, null, null, null, '0', '13921512561', null, '65', '32020661090', '32020666300449', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1057', null, 'f92867f62d55ef8c4856e61d64634758', 'UZdCN9', '孙广慧', '1551340822', null, null, null, null, '0', '18912371027', null, '65', '32020661090', '32020666300367', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1058', null, '3168967e013841bcb410270bf226307d', '7U5kxG', '管延红', '1551340822', '1551863498', '192.168.23.1', null, null, '0', '18262275050', null, '65', '32020661090', '32020666200232', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961HtIHc1N-fHePgVOwa07xuI');
INSERT INTO `bestop_member` VALUES ('1059', null, '8bce7e3aad0f05781d0b7b559d8a8e1d', 'PhNvvz', '卢利', '1551340822', null, null, null, null, '0', '15094396310', null, '67', '32020661091', '32020666301254', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1060', null, 'bbd30a2fdfc152f6f271540bb7c12027', 'rVQadg', '张文庄', '1551340822', null, null, null, null, '0', '15287809806', null, '67', '32020661091', '32020666301211', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1061', null, '9304565d0eefe2c387bc4a36557cc42b', 'EPhZKl', '孙培良', '1551340822', null, null, null, null, '0', '18168831675', null, '67', '32020661091', '32020666300979', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1062', null, '6ae702f3bf410ecfe59856d63d4f1a4e', '2iQ9w5', '王健', '1551340822', null, null, null, null, '0', '17768345701', null, '67', '32020661091', '32020666301091', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1063', null, '638e29a42d12dafe8ad7d34dd1a27a4c', '4F86rZ', '潘晓苑', '1551340822', null, null, null, null, '0', '15052722270', null, '67', '32020661091', '32020666301080', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1064', null, 'afed5da0a1b2bc44af3fef5135e0137e', 'ih7fGL', '李艳平', '1551340822', null, null, null, null, '0', '18168872973', null, '67', '32020661091', '32020666301116', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1065', null, '6fa32c800e842b9af1dfd5152f2c3a2c', 'rBc3YR', '陈韵亦', '1551340822', '1551837028', '192.168.23.1', null, null, '0', '15895316885', null, '67', '32020661091', '32020666301352', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Gydp2jpwaAc13ZayTB-mOc');
INSERT INTO `bestop_member` VALUES ('1066', null, 'fb109e3a2242170fc0980072711b2b24', 'jlUbWH', '张莉', '1551340822', '1551836988', '192.168.23.1', null, null, '0', '18552011607', null, '67', '32020661091', '32020666301360', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Hfo3ogFMsxSIrQJE_RmToY');
INSERT INTO `bestop_member` VALUES ('1067', null, 'b59d7cd28908e374c24ec3a3c57f8b62', 'kEfp9B', '吴雄伟', '1551340822', null, null, null, null, '0', '13812021213', null, '67', '32020661091', '32020666301339', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1068', null, 'e6298670d27ff4973f895242a1fb3ad3', 'jwvsGA', '周彬', '1551340822', null, null, null, null, '0', '15370859266', null, '67', '32020661091', '32020666300915', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1069', null, '2345a0199f96148968fc67cc723ec72c', 'bykwcK', '吴苏杨', '1551340822', null, null, null, null, '0', '18915555799', null, '67', '32020661091', '32020666300638', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1070', null, 'cc302340ef10563724f208f651510c1f', '5B1x3u', '张玲霞', '1551340822', '1551836993', '192.168.23.1', null, null, '0', '18168852675', null, '67', '32020661091', '32020666300753', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961GFx0x9Vo-IutvR80DHV6fE');
INSERT INTO `bestop_member` VALUES ('1071', null, '48aa011d70dcea226c50415ead521eb2', 'vhQ1Q6', '吴新腾', '1551340822', '1551767175', '192.168.23.1', null, null, '0', '13915280545', null, '67', '32020661091', '32020666300243', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961AsUZW8YV7P4Ko5cVaXOZK0');
INSERT INTO `bestop_member` VALUES ('1072', null, '9e679dab6289e623ece60930631328c1', 'H1Mwz1', '季畅', '1551340822', null, null, null, null, '0', '17315032561', null, '57', '32020661114', '32020666301228', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1073', null, 'eed8490bb557b1ac5023876f50b3695c', 'kgXphV', '周刚', '1551340822', '1551750988', '192.168.23.1', null, null, '0', '13328109991', null, '57', '32020661114', '32020666301187', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961LkgFL_wY0QeNspaX-i85as');
INSERT INTO `bestop_member` VALUES ('1074', null, '4b9e574558819efa65b51c3c4cbd0f96', 'NliFHx', '景逸', '1551340822', null, null, null, null, '0', '13921517755', null, '57', '32020661114', '32020666301138', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1075', null, 'cb1ce72b3004872c27db83c8eeab4509', 'xixG7s', '王舒佳', '1551340822', null, null, null, null, '0', '13770262977', null, '57', '32020661114', '32020666301021', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1076', null, '5a212b22398806b9feb81859467136f7', 'CCytLh', '薛宇', '1551340822', null, null, null, null, '0', '18118286651', null, '57', '32020661114', '32020666301247', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1077', null, 'fdee5310b9a76f9d5f71813b18a6eed1', 'lnSCm6', '李艳', '1551340822', null, null, null, null, '0', '13861763858', null, '57', '32020661114', '32020666301065', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1078', null, '21dc886b3482dd59e741856b7fd78062', 'ZB7EFi', '王畅宁', '1551340822', null, null, null, null, '0', '13814256552', null, '57', '32020661114', '32020666301186', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1079', null, '3e2dcdc0ba233b33eb5680d2624d29fe', 'gnHyeB', '汤东升', '1551340822', null, null, null, null, '0', '13773675627', null, '57', '32020661114', '32020666301123', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1080', null, 'ec7fc23b3f0f6f9e35b0e26782e53f66', 'XgRy4Q', '丁晓健', '1551340822', null, null, null, null, '0', '18206185623', null, '57', '32020661114', '32020666301221', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1081', null, 'dded42a790bdccd9f19437cc2b39986e', '1V2qPm', '何欢', '1551340822', null, null, null, null, '0', '15821739511', null, '57', '32020661114', '32020666301124', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1082', null, '31fd2824ddb1a7e066903e878db4a47e', 'wLdqmD', '吴雄', '1551340822', null, null, null, null, '0', '15056765182', null, '57', '32020661114', '32020666301288', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1083', null, '2e839cde3c9223a155e14bac41488d70', 'VDvHcB', '卢定杰', '1551340822', '1551750958', '192.168.23.1', null, null, '0', '15061895519', null, '57', '32020661114', '32020666300851', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961NAu5JF5Sr2-rt8tMhiD5P0');
INSERT INTO `bestop_member` VALUES ('1084', null, '67e8fbc9b7d29e1714850f84bf5724e0', 'Ya6Lz2', '杨晓迎', '1551340822', '1551852740', '192.168.23.1', null, null, '0', '15295432162', null, '57', '32020661114', '32020666200125', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961PfsuLZWy4wuYilnsDtA2FA');
INSERT INTO `bestop_member` VALUES ('1085', null, '3c3643558e8e33aa4011299bb210b92d', 'A9mLpa', '叶芹', '1551340822', null, null, null, null, '0', '19895739132', null, '70', '32020661115', '32020666301140', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1086', null, '7affbf9dfd67cc238d35c571aa273501', 'kp8mX1', '李海丽', '1551340822', null, null, null, null, '0', '13819618208', null, '70', '32020661115', '32020666301328', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1087', null, '0a4f4a0f6413989b330d76cd472fba4f', 'cVngRP', '徐慎洁', '1551340822', null, null, null, null, '0', '15365253796', null, '70', '32020661115', '32020666300914', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1088', null, '773ebbf306dc1290d6563d36efa712e0', 'NJ4q1Q', '张步春', '1551340822', null, null, null, null, '0', '13813327725', null, '70', '32020661115', '32020666300899', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1089', null, 'e7a5dab32cc56a2018e76b868283066f', 'bATixz', '杨海燕', '1551340822', null, null, null, null, '0', '15995236575', null, '70', '32020661115', '32020666300738', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1090', null, 'a859de66b1403318c26649bb49b322f9', 'gvHseM', '向久燕', '1551340822', null, null, null, null, '0', '18914137973', null, '67', '32020661117', '32020666300965', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1091', null, '6210e783b1573da6e60aca7e4c6a0253', '8Z5RXC', '郭丽品', '1551340822', '1551858703', '192.168.23.1', null, null, '0', '15006183309', null, '67', '32020661117', '32020666300433', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961Ej0Rh8v0-30p6ZKSRb3xXk');
INSERT INTO `bestop_member` VALUES ('1092', null, '54a8048f530b77747ce890d1134cad14', 'dsYner', '张全玲', '1551340822', null, null, null, null, '0', '15190236152', null, '57', '32020661071', '32020666300950', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1093', null, '6911445f0cb56f617480be10b084fe75', 'UPcDxH', '沈代娣', '1551340822', '1551835423', '192.168.23.1', null, null, '0', '18861526889', null, '57', '32020661071', '32020666301205', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961O6W6qIXggRlrHXbG1qgCpk');
INSERT INTO `bestop_member` VALUES ('1094', null, '715c77ba37c935eae1b25e3f64cf4278', 'bQjawW', '艾加秀', '1551340822', '1551835455', '192.168.23.1', null, null, '0', '13616188907', null, '57', '32020661071', '32020666301185', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961NJkDyE2w7pnPAClpFEfL5Q');
INSERT INTO `bestop_member` VALUES ('1095', null, '495ca65e664a65ad5905f2be0597fcf1', 'cyhTQy', '伏勤芳', '1551340822', null, null, null, null, '0', '13921128587', null, '57', '32020661071', '32020666301182', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1096', null, '2bd627575838dada2d141aaa80ef32e9', 'LufI3l', '叶颖', '1551340822', null, null, null, null, '0', '18961778170', null, '57', '32020661071', '32020666301135', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1097', null, '253c74e4f040b4b3771afe5ed809ef63', 'cX7FD4', '殷树芳', '1551340822', '1551835133', '192.168.23.1', null, null, '0', '18751561797', null, '57', '32020661071', '32020666301018', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961JDOSDPGaGge3M6mkDu30zM');
INSERT INTO `bestop_member` VALUES ('1098', null, '03b02a651fe7baebe9be7d9eecbdc7f4', 'I2DwZ6', '董丁玲', '1551340822', null, null, null, null, '0', '13621513107', null, '57', '32020661071', '32020666301300', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1099', null, '06a61679d07d48bee6fa8aa34d0a6391', '5CR8SF', '于海奇', '1551340822', null, null, null, null, '0', '13621509224', null, '57', '32020661071', '32020666301315', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1100', null, '97f6898f15e9b4e4ebbd02bdd2d9bc06', 'tqJ5LY', '柳允', '1551340822', null, null, null, null, '0', '13706189300', null, '57', '32020661071', '32020666301308', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1101', null, '17a12b2de2347a0e8be462e41f37c0e7', 'PdKKDa', '罗明慧', '1551340822', null, null, null, null, '0', '15061879675', null, '57', '32020661071', '32020666301307', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1102', null, '3aaf371fad8b1c6d2a1a9300d7b2b7ce', '7WuPGa', '马秀丽', '1551340822', null, null, null, null, '0', '15852505582', null, '57', '32020661071', '32020666300179', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1103', null, '3738f80db53bbb92dccc0d0cd79447e1', '3xvY5U', '徐帆', '1551340823', null, null, null, null, '0', '15861665727', null, '57', '32020661071', '32020666300144', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1104', null, 'fcfd62bac7f8410bb1cd5b6eb4bf134a', 'JlpjHX', '朱章红', '1551340823', '1551835124', '192.168.23.1', null, null, '0', '15052172658', null, '57', '32020661071', '32020666200511', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961H0c1yAbZO9AGvVbusAX0ac');
INSERT INTO `bestop_member` VALUES ('1105', null, '7d85b5c11b44f73155a31a54501c9a77', 'FsYdIS', '杨为', '1551340823', null, null, null, null, '0', '15071112744', null, '68', '32020661119', '32020666301019', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1106', null, '0397c9cc5dc863db18bf92754ead60fa', '4RbwWg', '林皎婷', '1551340823', null, null, null, null, '0', '13771098091', null, '68', '32020661119', '32020666301024', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1107', null, '59079e0033d7f7e0cc509edf09fa0ded', '29TI7S', '蔡璐', '1551340823', null, null, null, null, '0', '18576213060', null, '68', '32020661119', '32020666301150', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1108', null, '0ef1a515478c0de8c2bc974974196118', 'vcqmp1', '伍敏杰', '1551340823', null, null, null, null, '0', '15358052850', null, '68', '32020661119', '32020666301089', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1109', null, '20ab84a1480d9c9a7c228d01ddcfc3f9', 'zqiSJP', '廖丽娟', '1551340823', null, null, null, null, '0', '15270658441', null, '68', '32020661119', '32020666301020', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1110', null, '50280ffe8a74a045d53f04cc5522622c', 'H52xrN', '张赛金', '1551340823', '1551661878', '192.168.23.1', null, null, '0', '13771422246', null, '68', '32020661119', '32020666301073', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961PsA-EsQjfGq-ChS9vtSeuY');
INSERT INTO `bestop_member` VALUES ('1111', null, '0ccd11218dcc815c8742a36dcac22a55', 'r9BtPJ', '顾浩', '1551340823', null, null, null, null, '0', '18352076722', null, '68', '32020661119', '32020666301148', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1112', null, '6bac87f4c3f935ff0cb7d026575d5dfa', 'UjKYZs', '鲁兵', '1551340823', null, null, null, null, '0', '13399550776', null, '68', '32020661119', '32020666301147', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1113', null, '74b6cc22a36170ed6be253474858556d', 'fTGidB', '张翔', '1551340823', null, null, null, null, '0', '18552180191', null, '68', '32020661119', '32020666301094', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1114', null, '0b64f5f68a446005d84cf2f5303dc722', 'zFYFvB', '顾凯丽', '1551340823', null, null, null, null, '0', '13706173340', null, '68', '32020661119', '32020666301341', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1115', null, '672c075a984b77d9878d3774bcd5644c', 'ZdC22q', '张秋', '1551340823', null, null, null, null, '0', '15206198632', null, '68', '32020661119', '32020666301280', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1116', null, 'a2d5b5f9d5c64466b90cb1af2c514e4b', 'CKeFXz', '叶红琴', '1551340823', null, null, null, null, '0', '13914358596', null, '68', '32020661119', '32020666301275', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1117', null, '946d6e03877b5e478c0a52e6a5777c4b', 'HXptKx', '许双枫', '1551340823', null, null, null, null, '0', '13921393219', null, '68', '32020661119', '32020666301319', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1118', null, 'f491bab6131a46eb8a8f1e18b4486ae2', '5bHXRE', '徐熙', '1551340823', null, null, null, null, '0', '15152229573', null, '68', '32020661119', '32020666301312', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1119', null, 'e56910845c8f757a853dccb78a016c78', 'vXkLmX', '陆芸', '1551340823', null, null, null, null, '0', '13961830416', null, '68', '32020661119', '32020666301318', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1120', null, '3aa27fda9b962311c9d41f20f275f6f4', 'XUN8lb', '王芳', '1551340823', '1551661761', '192.168.23.1', null, null, '0', '15895317894', null, '68', '32020661119', '32020666301296', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961KI4pgK1ZdxwEQN6C1dGzt0');
INSERT INTO `bestop_member` VALUES ('1121', null, '545871c1150fe7a7c95f3dec61dbcdf6', 'zWIyBY', '王倩', '1551340823', null, null, null, null, '0', '13665170649', null, '68', '32020661119', '32020666301295', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1122', null, '5828283801f3ec8475425b5932624ab0', 'Yjncjj', '张玲', '1551340823', null, null, null, null, '0', '13812278122', null, '68', '32020661119', '32020666301340', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1123', null, '07314dd2572cf807000fec1a56d6e09b', 'kXUCJE', '李静娜', '1551340823', null, null, null, null, '0', '18061900607', null, '68', '32020661119', '32020666300784', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1124', null, '143c2d02a8818a92430fe1022315678a', '1RXmRU', '江水洁', '1551340823', null, null, null, null, '0', '15951519537', null, '68', '32020661119', '32020666300924', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1125', null, 'ced90efc3bbe0a17e5d28a17a31e5572', 'LFBbNF', '焦胜云', '1551340823', null, null, null, null, '0', '18921191126', null, '68', '32020661119', '32020666300854', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1126', null, 'd2816ed93ec69b007d2f8641faa700ee', 'jvVvqS', '郁玲焱', '1551340823', '1551661796', '192.168.23.1', null, null, '0', '15852735580', null, '68', '32020661119', '32020666300941', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Fbw2-jZwLHRRseKvR8wKUM');
INSERT INTO `bestop_member` VALUES ('1127', null, 'c19838d87ac1149684339a4416282277', 'sDTY1A', '张燕华', '1551340823', null, null, null, null, '0', '13914145786', null, '68', '32020661119', '32020666300942', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1128', null, '9f34a14f174c50200ffe9e09264e137f', '4A8Jnw', '邱凌艳', '1551340823', null, null, null, null, '0', '13771140599', null, '68', '32020661119', '32020666300927', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1129', null, '30096156ef5f1c9302b24b0e12751340', 'PhNQeh', '孙静芳', '1551340823', '1551661885', '192.168.23.1', null, null, '0', '13338105280', null, '68', '32020661119', '32020666300749', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961A03BMI8bMNZA0SJYW98odM');
INSERT INTO `bestop_member` VALUES ('1130', null, '2b7e24d83cb2fe27481dc3cabc3691e9', 'DndWgp', '田兴成', '1551340823', null, null, null, null, '0', '13439398895', null, '57', '32020661103', '32020666301104', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1131', null, 'ac6c5a5f4bc077e20b5547c2b3c394e9', 'w3l5cD', '孙作伟', '1551340823', null, null, null, null, '0', '13914256803', null, '57', '32020661103', '32020666301214', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1132', null, 'ad3b25174d85986edd17f6633cb775e0', 'PxxjCB', '马文利', '1551340823', '1551750984', '192.168.23.1', null, null, '0', '18661036620', null, '57', '32020661103', '32020666300347', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Iy2u4_pE6xBfpFO5wRBa_I');
INSERT INTO `bestop_member` VALUES ('1133', null, 'eb527ddef2a1960b528d9a7a474142c9', 'Jb8q1G', '许静', '1551340823', null, null, null, null, '0', '13915325050', null, '57', '32020661103', '32020666300107', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1134', null, '72a41ffad993ef9f8ccdfb774069f501', 'WyVYHS', '马文明', '1551340823', null, null, null, null, '0', '13921170581', null, '57', '32020661103', '32020666200505', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1135', null, '04f3d7f207650632d52ee3e590220f34', 'f3mL3t', '尤云丽', '1551340823', null, null, null, null, '0', '18851562677', null, '65', '32020661111', '32020666301084', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1136', null, '490fce2f6d3cd431a34ba43ec6bd2047', 'NB3piu', '张思远', '1551340823', null, null, null, null, '0', '18706191795', null, '65', '32020661111', '32020666301252', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1137', null, '9d89ef4c931fc3b8b57972d7ab3a5b36', 'VhMXZF', '杨振华', '1551340823', null, null, null, null, '0', '18915270932', null, '65', '32020661111', '32020666301092', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1138', null, '0955e91c243f8fa5b8a5429a860ee653', '1dLA2u', '陈岁妮', '1551340823', null, null, null, null, '0', '13861457923', null, '65', '32020661111', '32020666301190', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1139', null, '4ab180c8ce5bdc01f0e8bda92a527970', 'y2yqfr', '王冬', '1551340823', null, null, null, null, '0', '15601529630', null, '65', '32020661111', '32020666301255', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1140', null, 'a01efcf608d8340e2aaf4d5d04e0f725', 'gu2HEM', '陈晓雷', '1551340823', null, null, null, null, '0', '15961505598', null, '65', '32020661111', '32020666301322', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1141', null, '57b86f412dcae0d985121ad9159a3e77', '7Q4S54', '吴小军', '1551340823', null, null, null, null, '0', '15261589166', null, '65', '32020661111', '32020666300716', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1142', null, '9d9334be70f8d9ad56738774fdab27c1', 'rgPVmq', '张学建', '1551340823', null, null, null, null, '0', '13812016362', null, '65', '32020661111', '32020666300682', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1143', null, '0d6eb9f3cc410036f3213b421b45f662', 'rXrBwc', '石婷婷', '1551340823', '1551663830', '192.168.23.1', null, null, '0', '18762462272', null, '65', '32020661111', '32020666300521', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961I_ZWMDBpVzsapn_fHp5NsE');
INSERT INTO `bestop_member` VALUES ('1144', null, 'dc38fc10f04e84dae4231628910712a7', '1YFKj6', '尤云漫', '1551340823', '1551834719', '192.168.23.1', null, null, '0', '18551044435', null, '65', '32020661111', '32020666300117', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961NEnz8AZU63-aKwc6IM8MAU');
INSERT INTO `bestop_member` VALUES ('1145', null, '66bb75eb0aa8a80e70dfbf43d8e85c2f', 'iqq96N', '潘明翠', '1551340823', null, null, null, null, '0', '13861793490', null, '68', '32020661131', '32020666301053', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1146', null, '6bd9e471a7e55aff47b2e912fe7e270d', 'uMu7YL', '肖利', '1551340823', null, null, null, null, '0', '18405178227', null, '68', '32020661131', '32020666301238', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1147', null, '7d228884164037905293f25ef89519b0', '3Usea1', '潘璠', '1551340823', '1551661863', '192.168.23.1', null, null, '0', '13861519484', null, '68', '32020661131', '32020666301294', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961DLRS6WVl6iQ00lm1xJHut4');
INSERT INTO `bestop_member` VALUES ('1148', null, '1a90261e9a2d1262ac1145fa501464d1', 'AEBguI', '陶金', '1551340823', '1551661961', '192.168.23.1', null, null, '0', '13373664699', null, '68', '32020661131', '32020666300785', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961K_FFgT4Uqs1koMdSgwea_0');
INSERT INTO `bestop_member` VALUES ('1149', null, '8a87f3f2741b2f4b4b3be4b148c3834c', '3Cm16G', '朱博文', '1551340823', null, null, null, null, '0', '18206197871', null, '65', '32020661068', '32020666301263', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1150', null, '3f738ee078ca6e7cfb997a4989dee09d', 'wfUhvy', '张卫波', '1551340823', null, null, null, null, '0', '18061906721', null, '65', '32020661068', '32020666301173', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1151', null, '13690a572ee6f392a6decb95c50543e5', 'ym2Au2', '颜红', '1551340823', null, null, null, null, '0', '15861684024', null, '65', '32020661068', '32020666301101', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1152', null, 'b3927219bf52dc211775347c1cf906b4', 'B6wKpM', '宋倍', '1551340823', '1551835118', '192.168.23.1', null, null, '0', '13348103075', null, '65', '32020661068', '32020666300998', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961CWir5vCTgyTHCKwl4P6l-0');
INSERT INTO `bestop_member` VALUES ('1153', null, '9296580a44594112ef5a169d6c383406', 'PnuSRJ', '傅成兰', '1551340823', null, null, null, null, '0', '18262263915', null, '65', '32020661068', '32020666301099', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1154', null, 'cdd83b3eb180303edb4ff78543dc5e46', 'lttiTa', '张晖', '1551340823', null, null, null, null, '0', '18921528328', null, '65', '32020661068', '32020666301071', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1155', null, 'd1dfaff39c7c5b81926d7c7b7e729705', '5uxyK7', '朱锡晨', '1551340823', '1551834665', '192.168.23.1', null, null, '0', '13301511665', null, '65', '32020661068', '32020666301336', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961OzlZcBv4uIJR4I6QDXc6QA');
INSERT INTO `bestop_member` VALUES ('1156', null, 'a2e287247b04f4e5d718e402ebc67b5d', 'RwaJTx', '蒋安栋', '1551340823', null, null, null, null, '0', '13358107716', null, '65', '32020661068', '32020666300757', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1157', null, 'acacb71f02764b191b0565927c3c7c9d', 'aEJaBu', '张玉珍', '1551340823', null, null, null, null, '0', '18068331816', null, '65', '32020661068', '32020666300895', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1158', null, 'da8f2616214307a23be4a4e6367fb759', 'IZQXD3', '刘兰', '1551340823', null, null, null, null, '0', '13812508813', null, '65', '32020661068', '32020666300888', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1159', null, 'b5349bc4ae25f8ca7dc3e20ade0c48a7', 'GANnRF', '于爱玲', '1551340823', null, null, null, null, '0', '13861703547', null, '65', '32020661068', '32020666300863', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1160', null, '26c8bd2dc5e67f804a7226a68ca4257f', '8Q7LEL', '汪树俊', '1551340823', null, null, null, null, '0', '15861690860', null, '65', '32020661068', '32020666300853', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1161', null, '91e5bc48d373e176f3613a4783a06017', 'A3rS8H', '戴海华', '1551340823', null, null, null, null, '0', '13921544918', null, '65', '32020661068', '32020666300286', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1162', null, 'f1319959ef1d9c0cdbc28f852c42b3eb', 'BLUCUi', '卞月琴', '1551340823', null, null, null, null, '0', '13961870033', null, '65', '32020661068', '32020666300123', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1163', null, '3cb57dbfafc4c45ad7f7ce6d8825cf33', 'qYh7cv', '刘雷', '1551340823', null, null, null, null, '0', '18852473803', null, '65', '32020661068', '32020666300147', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1164', null, '03fd4988f74102f8130f3ffef8711740', '7sh8Xu', '王红梅', '1551340823', '1551663849', '192.168.23.1', null, null, '0', '15161507331', null, '65', '32020661068', '32020666200017', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961HSTzh05XXIClS4r4cLKRi0');
INSERT INTO `bestop_member` VALUES ('1165', null, '50c1ca465e9b49280fd203b81d4fa90d', 'gF7Akf', '周玉花', '1551340823', null, null, null, null, '0', '18861649919', null, '57', '32020661069', '32020666301013', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1166', null, '4253f648a9e1a12c86b7b8e9b5714fdd', 'kwxR7t', '胡薇薇', '1551340823', null, null, null, null, '0', '18151702333', null, '57', '32020661069', '32020666301215', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1167', null, 'b26abb5fc12c96194b02fc4ef6ee8457', '7qd3Ve', '李波', '1551340823', '1551771612', '192.168.23.1', null, null, '0', '15995286590', null, '57', '32020661069', '32020666300995', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961KWvesa8suQilNDBLAuNprU');
INSERT INTO `bestop_member` VALUES ('1168', null, '0283855a655daf20e9bbc7711bc26955', 'DdHisA', '陈莹', '1551340823', null, null, null, null, '0', '13915292638', null, '57', '32020661069', '32020666301075', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1169', null, 'ac1b6572c4e6d30c087e785cebee3cd7', 'GdQzG4', '张伟城', '1551340823', null, null, null, null, '0', '18052493101', null, '57', '32020661069', '32020666301325', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1170', null, '57477b609d441b2c44bf17d12b999acf', 'qrUg9g', '徐旺芹', '1551340823', null, null, null, null, '0', '18961774395', null, '57', '32020661069', '32020666300918', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1171', null, 'c9fae8e91ab6457b0cb715a670e64508', 'cEHuqN', '邓桂华', '1551340823', '1551839040', '192.168.23.1', null, null, '0', '13921536572', null, '57', '32020661069', '32020666300190', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LlwcGqVrpCtxuiM5Nv1JfA');
INSERT INTO `bestop_member` VALUES ('1172', null, '97ee7f151daea91d1d0a4e7511c0c0fe', 'TWpeAL', '张磊', '1551340823', '1552376424', '192.168.23.1', null, null, '0', '13861812959', null, '57', '32020661069', '32020666200152', '江苏', '无锡', '国寿惠山支公司', null, '4', 'oK_961PSe9gCrpXU_NBmOhTnp1Og');
INSERT INTO `bestop_member` VALUES ('1173', null, '1e5d47e885fce96df66959bb7e814e5d', 'ieZCtj', '沈会会', '1551340823', null, null, null, null, '0', '18352504733', null, '57', '32020661122', '32020666300983', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1174', null, '62a77d0fdaadc60e3e4b9b8917a77595', 'takAnk', '邹双喜', '1551340823', null, null, null, null, '0', '13382220727', null, '57', '32020661122', '32020666301222', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1175', null, '69ddfe874c85d5c68ae1c2ed4a9ec26d', 'mVpB9z', '沈国婷', '1551340823', null, null, null, null, '0', '13861453515', null, '57', '32020661122', '32020666301204', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1176', null, 'fc9d1c3e2ad0263950896bece6089ab2', 'FdZz8V', '王尚', '1551340823', null, null, null, null, '0', '15861477507', null, '57', '32020661122', '32020666301323', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1177', null, '85072130558f59c316fdaf5e422a1a07', 'cDccXY', '王朝', '1551340823', '1551751021', '192.168.23.1', null, null, '0', '15850229912', null, '57', '32020661122', '32020666300787', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961HbNeNHvU4rOFqDS49q9J7k');
INSERT INTO `bestop_member` VALUES ('1178', null, 'a212f9d36824f39d6a74b65f9d1a33ec', 'cYnw9C', '王秀丽', '1551340823', null, null, null, null, '0', '18261584170', null, '67', '32020661123', '32020666301209', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1179', null, '1b1a340c5230f64ded03cf87eeb801ac', 'AXpdLc', '韩露', '1551340823', null, null, null, null, '0', '18921130985', null, '67', '32020661123', '32020666301061', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1180', null, 'd79364ec7b5ab722e5d7ebc04b032f80', 'LJGq2b', '秦杰', '1551340823', null, null, null, null, '0', '13812045237', null, '67', '32020661123', '32020666300968', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1181', null, '5a2895643bce62daafcba2a5069ab999', 'ZiE8Il', '李新国', '1551340823', null, null, null, null, '0', '15949211591', null, '67', '32020661123', '32020666301055', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1182', null, '6efe6f9374138d42c329673cec06b49c', 'kbr1pR', '张沛沛', '1551340823', null, null, null, null, '0', '17697276947', null, '67', '32020661123', '32020666301224', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1183', null, '6a55b807d99fa5c4903732ec62d7ffed', 'T7hzKB', '邸同爱', '1551340823', '1551837489', '192.168.23.1', null, null, '0', '15861565708', null, '67', '32020661123', '32020666301256', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961JRLaYV2Q8WUvPQmNFS185g');
INSERT INTO `bestop_member` VALUES ('1184', null, '6c30f6d340b1029a1d2c443927d8cd58', 'n3m5sk', '崔晓翠', '1551340823', '1552013270', '192.168.23.1', null, null, '0', '18021161688', null, '67', '32020661123', '32020666301304', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961CdYy-EYZRA0jtA_JKJYaTA');
INSERT INTO `bestop_member` VALUES ('1185', null, '6ca106f913cedf15ef622daa0af6daaa', 'EGpwBb', '沈玥沄', '1551340823', '1551847149', '192.168.23.1', null, null, '0', '13338717588', null, '67', '32020661123', '32020666301358', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961E9TF_w-aGxtLXjl2C6O8Do');
INSERT INTO `bestop_member` VALUES ('1186', null, '6f547fc4d7aa00c93bcf02820a906165', 'jYWY2L', '刘艳', '1551340823', null, null, null, null, '0', '13093008506', null, '67', '32020661123', '32020666300170', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1187', null, 'e17fe55b349be5f80c35ed7a65250bfe', '4CySiG', '吴国东', '1551340823', null, null, null, null, '0', '13606181855', null, '67', '32020661127', '32020666301200', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1188', null, '1a7480e83b8fcc49b9a276fe5e67528a', 'a96z2l', '蔡艳芬', '1551340823', null, null, null, null, '0', '13961732084', null, '67', '32020661127', '32020666301305', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1189', null, '8bfff90a0389c45b09b38cd2506905ad', 'BdDKLl', '王红霞', '1551340823', null, null, null, null, '0', '13400037327', null, '67', '32020661127', '32020666301290', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1190', null, '6d575365f97b231bc4210b2fe7a8faa5', 'yneFFH', '孙敏娟', '1551340823', '1551832425', '192.168.23.1', null, null, '0', '13621518160', null, '67', '32020661127', '32020666300908', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LdrbJjesoxr10JRD093R1E');
INSERT INTO `bestop_member` VALUES ('1191', null, '5935a3a9592c2b6473049335ff5c2a7c', 'kTIbDR', '许静音', '1551340823', '1551832399', '192.168.23.1', null, null, '0', '13656156366', null, '67', '32020661127', '32020666300815', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961BqKFiVvdtKZjg-Ceaz0oVo');
INSERT INTO `bestop_member` VALUES ('1192', null, '37a0375a13cc6f87e88fb086e536d919', 'AmHGZp', '王华', '1551340823', '1551661872', '192.168.23.1', null, null, '0', '15061830638', null, '68', '32020661136', '32020666301236', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961KhzKAkGftHjxTxrZ74N90o');
INSERT INTO `bestop_member` VALUES ('1193', null, '433cadfc240f5ef472dc598fc374ebfe', 'q6iYQR', '乔玲', '1551340823', null, null, null, null, '0', '15951588528', null, '68', '32020661136', '32020666301240', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1194', null, '319d9e800b2e237d9e4cf9d4bdd72958', 'Z71frY', '张斌', '1551340823', null, null, null, null, '0', '13771160119', null, '68', '32020661136', '32020666301287', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1195', null, '0e44a875585f70ea345f28f6bb3818da', 'vrGx6U', '刘琦', '1551340823', null, null, null, null, '0', '18921177725', null, '68', '32020661136', '32020666301276', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1196', null, 'cf7110a487477df526ff9871e650080d', 'uDudVv', '王非廷', '1551340823', '1551661894', '192.168.23.1', null, null, '0', '15301512115', null, '68', '32020661136', '32020666300890', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LdrKcXzW8Y3Rhj1NGpQHy0');
INSERT INTO `bestop_member` VALUES ('1197', null, '4f27e051a8159f0806a0dd2e593a09a7', '3nDiju', '邱翠红', '1551340823', null, null, null, null, '0', '15052250657', null, '67', '32020661130', '32020666301119', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1198', null, '2d6ef820e32c8d9bc7331078e05d5f5b', 'TGd5Cv', '汪燕宁', '1551340823', null, null, null, null, '0', '18921187059', null, '67', '32020661130', '32020666301258', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1199', null, 'd3cec86af33c410c52d7b3b1dc3ee7c4', 'ZvesTt', '方宝霞', '1551340823', null, null, null, null, '0', '18168901282', null, '67', '32020661130', '32020666301199', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1200', null, '89a09c13a3aa585050e1c944fc75a889', 'YvkDEl', '郁海霞', '1551340823', null, null, null, null, '0', '18352506469', null, '67', '32020661130', '32020666301081', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1201', null, '82b21188e2cc3373884acf677e73a020', 'nDNZlT', '郁菁菁', '1551340823', null, null, null, null, '0', '15106191077', null, '67', '32020661130', '32020666300957', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1202', null, '3016abd84030ed5871b698edbbda5a97', 'JvyRjw', '庄珍萍', '1551340823', null, null, null, null, '0', '18051571166', null, '67', '32020661130', '32020666301103', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1203', null, '7ea1df709405c6b610a2094b7e1910e2', 'ctLtkp', '张丽', '1551340823', '1551788518', '192.168.23.1', null, null, '0', '18751571702', null, '67', '32020661130', '32020666301259', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961H3m94gYAP82rhVn1RMwhN4');
INSERT INTO `bestop_member` VALUES ('1204', null, '256d822b55ca767ac2e620eebe969da0', 'X4SMzN', '李春明', '1551340823', null, null, null, null, '0', '15006230714', null, '67', '32020661130', '32020666300781', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1205', null, '46d9d2f1e78e1b17c123d8e645f4dfd6', '6pTq8p', '马亚东', '1551340823', null, null, null, null, '0', '15949256486', null, '67', '32020661130', '32020666300820', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1206', null, 'b12ca3a7fbded10642ffbafd3a75d438', 'u2HiiP', '缪凤娇', '1551340823', null, null, null, null, '0', '15250801899', null, '69', '32020661121', '32020666301008', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1207', null, '0d6530de47652812e695777e42145226', 'lQvHVe', '李光华', '1551340823', null, null, null, null, '0', '15152239476', null, '69', '32020661121', '32020666301244', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1208', null, '41f272f285f3f0a880affe14c238565c', 'GDlA4l', '纪丹丹', '1551340823', null, null, null, null, '0', '15365272820', null, '69', '32020661121', '32020666301077', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1209', null, 'fde25d00139a4de0a664cc215581c3ed', 'rYjca2', '袁彦', '1551340823', null, null, null, null, '0', '15601525938', null, '69', '32020661121', '32020666301349', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1210', null, 'a56d7281223a4d9e4c4050b6e4fdf405', 'TVIJty', '宋冬梅', '1551340823', null, null, null, null, '0', '18601578997', null, '69', '32020661121', '32020666300873', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1211', null, '3be7ebb19758a07ebf47a5dce697d7d4', 'xqWTTd', '肖英娟', '1551340823', null, null, null, null, '0', '13861869234', null, '69', '32020661121', '32020666300091', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1212', null, '1924da26c1d03753cd97ad45d5fd4459', 'bNWCpZ', '顾宏伟', '1551340823', '1552233592', '192.168.23.1', null, null, '0', '13912388213', null, '69', '32020661121', '32020666300083', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961NMgylsVknTf2-dqSjrZYEg');
INSERT INTO `bestop_member` VALUES ('1213', null, '43b9ea8de15681ad212906446f771253', 'q37YCC', '陆明', '1551340823', '1551661926', '192.168.23.1', null, null, '0', '13814219619', null, '70', '32020661129', '32020666301059', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961OvLaEpR1J3TtJNceifS2AE');
INSERT INTO `bestop_member` VALUES ('1214', null, '5df9db6b559d209f6d09b03ebeeb19d5', 'WVb8GD', '陈雪娟', '1551340823', null, null, null, null, '0', '15195721620', null, '70', '32020661129', '32020666301037', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1215', null, 'b224b72b03ff13d8d54d796e161e5ce4', 'Z6b4XY', '陈林', '1551340823', '1551661894', '192.168.23.1', null, null, '0', '15951586140', null, '70', '32020661129', '32020666301167', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961N_huB9r0iAhXbHBtQbVhS4');
INSERT INTO `bestop_member` VALUES ('1216', null, '7f7397b87a98b0cca7f6760b7061dd6b', 'M6MNCl', '刘广志', '1551340823', null, null, null, null, '0', '17005106999', null, '70', '32020661129', '32020666301047', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1217', null, '938fd7a42a1b838e7e62623c0f2b2841', 'r1ygjF', '夏桂珍', '1551340823', null, null, null, null, '0', '15161548900', null, '70', '32020661129', '32020666301040', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1218', null, '1bc480fd1422d6ea21d721381a55a9fa', 'mzHQhR', '陈雪琴', '1551340823', null, null, null, null, '0', '18006195282', null, '70', '32020661129', '32020666301313', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1219', null, 'd92b53903062662fb2d1992d269abefa', 'yjWVGJ', '宋咏梅', '1551340823', null, null, null, null, '0', '15804017998', null, '70', '32020661129', '32020666300906', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1220', null, '0e84a166a85425e311990f6d470a36ed', '9K6yt8', '杨乾', '1551340823', null, null, null, null, '0', '13671933393', null, '68', '32020661132', '32020666301062', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1221', null, 'f73c35a29c1d5e1ad414272fe86ff7d9', 'v3jdeJ', '庞云芳', '1551340823', null, null, null, null, '0', '18068903724', null, '68', '32020661132', '32020666301237', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1222', null, 'fed89baf60dfc52ad9a9d15128df98a0', 'tGbH9v', '陶伟明', '1551340823', null, null, null, null, '0', '13861830161', null, '68', '32020661132', '32020666301029', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1223', null, '2f160d549ad9e79d420d28ecf80cf7a3', 'fLSYGY', '孙亚雪', '1551340823', null, null, null, null, '0', '17715827979', null, '68', '32020661132', '32020666301235', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1224', null, 'b5452ade91c33ec0c88f7a150f0d5583', 'XFiB75', '董天舒', '1551340823', null, null, null, null, '0', '15861488833', null, '68', '32020661132', '32020666301074', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1225', null, '5746b203fd5ce647a6184337640ced43', 'qMUTUc', '赵阿倩', '1551340823', null, null, null, null, '0', '17625755843', null, '68', '32020661132', '32020666301002', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1226', null, '6317f6c3eb89501e7f117a8944545b33', 'mel9EG', '刘妍', '1551340823', null, null, null, null, '0', '18651588498', null, '68', '32020661132', '32020666301162', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1227', null, '4c72007470152d626642673f908590d3', 'jPg1dR', '金彩萍', '1551340823', '1551756897', '192.168.23.1', null, null, '0', '13348105517', null, '68', '32020661132', '32020666301359', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961IavwLUil2pGFUjs6teSNgg');
INSERT INTO `bestop_member` VALUES ('1228', null, 'ad6dcd3fbcdfaf51683cf283d6c868fa', '4u2hRt', '曾满', '1551340823', '1551661874', '192.168.23.1', null, null, '0', '15298437315', null, '68', '32020661132', '32020666300900', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961AoJiGNKMXKzJNYHFP20jWs');
INSERT INTO `bestop_member` VALUES ('1229', null, '6d8da283617d591f56ee3754f90a88d5', 'jw3d4z', '杨忠义', '1551340823', null, null, null, null, '0', '18551033059', null, '67', '32020661133', '32020666301243', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1230', null, 'faf0c38a177feeb0e02a4af0be173b9f', 'DgaIir', '胡凤磊', '1551340823', '1551837445', '192.168.23.1', null, null, '0', '18014253868', null, '67', '32020661133', '32020666301171', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961AI_B21P2V3NmEVj4oQ2Vvk');
INSERT INTO `bestop_member` VALUES ('1231', null, '2bace7a2eef0054ff4daddaf52edfe8a', 'JppdvU', '刘起凡', '1551340823', null, null, null, null, '0', '13665117544', null, '67', '32020661133', '32020666301132', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1232', null, '1b8f24469f1d608ec9efcb3113958743', 'ImJUCm', '陆铭鸣', '1551340823', null, null, null, null, '0', '15306197902', null, '67', '32020661133', '32020666301277', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1233', null, '7f6b58cd383b6fbec1f4c231750be9ca', 'FKDNBc', '张月娥', '1551340823', '1551852973', '192.168.23.1', null, null, '0', '13584186028', null, '67', '32020661133', '32020666300814', '江苏', '无锡', '国寿惠山支公司', null, '2', 'oK_961E6fOdBHbDSp61uDjY9AYvs');
INSERT INTO `bestop_member` VALUES ('1234', null, 'bc43019ae04fc5c32dd42e9ea1efcec9', 'mxSRy9', '胡慧', '1551340823', '1551750981', '192.168.23.1', null, null, '0', '18068284896', null, '57', '32020661128', '32020666301051', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961PPTxmiC_U0fvKeCgacLBw8');
INSERT INTO `bestop_member` VALUES ('1235', null, '424c5b6b5d81f0f7c8d5714c4a1401f5', 'H61j22', '刘平', '1551340823', null, null, null, null, '0', '18168892960', null, '57', '32020661128', '32020666301181', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1236', null, 'b2a8da9c4971d66ea258614fc1329b28', 'Yv63ei', '毕沙沙', '1551340823', null, null, null, null, '0', '18851513947', null, '57', '32020661128', '32020666301169', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1237', null, 'da044f75291244790340005019885dae', '3fgzuS', '夏艳芳', '1551340823', '1551769897', '192.168.23.1', null, null, '0', '13771117448', null, '57', '32020661128', '32020666300961', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961E8SF-b6bDHtll5khnuQWCI');
INSERT INTO `bestop_member` VALUES ('1238', null, '26c769d02bf346db7e62af9692566c47', 'Hw3Cvg', '戴敏', '1551340823', null, null, null, null, '0', '15861663398', null, '57', '32020661128', '32020666301158', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1239', null, 'a7dccb7e45c60b2e533e9b2f88348284', 'Hkxl12', '张姗姗', '1551340823', null, null, null, null, '0', '13236430528', null, '57', '32020661128', '32020666301048', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1240', null, '495a8e06dc4fb0196e1c2ae676a9a2bb', 'tyGSZY', '孙左成', '1551340823', null, null, null, null, '0', '15995890422', null, '57', '32020661128', '32020666301324', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1241', null, '988b315cd947c5d2d1a7e75af7016f71', 'sNmk5T', '张晓婷', '1551340823', null, null, null, null, '0', '13921275300', null, '57', '32020661128', '32020666300891', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1242', null, '57f4cf00b76a5c9269fd473f505df747', 'QCsUY4', '孙婷婷', '1551340823', '1552445764', '192.168.23.1', null, null, '0', '18651514056', null, '57', '32020661128', '32020666300598', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961E8SF-b6bDHtll5khnuQWCI');
INSERT INTO `bestop_member` VALUES ('1243', null, '74b4af3ff3ac062ea86f1e2a190fc940', 'QShSqR', '朱俊帆', '1551340823', null, null, null, null, '0', '18861840784', null, '67', '32020661134', '32020666301260', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1244', null, '13845f16aba92d42ac2ea8a5dca63250', 'rgiUFA', '贺香玲', '1551340823', null, null, null, null, '0', '18606280778', null, '67', '32020661134', '32020666301115', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1245', null, '042b20010a46e18649b9ce974ae0c049', 'p75NAK', '杨君', '1551340823', null, null, null, null, '0', '13550972857', null, '67', '32020661134', '32020666301180', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1246', null, '652e068346dbc01cb884e31546a92f1b', 'rNKYwM', '郑思婷', '1551340823', null, null, null, null, '0', '15852732798', null, '67', '32020661134', '32020666301110', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1247', null, 'ed175cd5032196456e2d095769d2eb42', '1YxFND', '杨婷', '1551340823', null, null, null, null, '0', '13656188861', null, '67', '32020661134', '32020666301331', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1248', null, '15c8ca74ff654afc807174c8afcc20d9', 'YhnM8l', '贺兆香', '1551340823', '1551767423', '192.168.23.1', null, null, '0', '15190277254', null, '67', '32020661134', '32020666300823', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961F35DknVAEO5oNYKAjylH0s');
INSERT INTO `bestop_member` VALUES ('1249', null, '0b2d9e8c83c3115abb2ea09896ea510b', 'XWanEi', '耿林杰', '1551340823', '1551661891', '192.168.23.1', null, null, '0', '17861860572', null, '68', '32020661135', '32020666301234', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961AebMX-ec5SyKyucW6LCk_E');
INSERT INTO `bestop_member` VALUES ('1250', null, '575240d6ae5f0286172995ca9b4f9e5b', 'ijs2zF', '王峰', '1551340823', null, null, null, null, '0', '13771463516', null, '68', '32020661135', '32020666301233', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1251', null, '16dd8bb8fed67632c8c11eb340f3719e', 'JC2qC1', '喻仲毅', '1551340823', null, null, null, null, '0', '13771137712', null, '68', '32020661135', '32020666301281', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1252', null, '20158673722d2f524b329e92b3d8afa4', 'Mqfiag', '顾渊', '1551340823', null, null, null, null, '0', '18626326363', null, '68', '32020661135', '32020666301285', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1253', null, '92336b9300cc7843a5082a5a15ac16df', 'gcZbvu', '强丽媛', '1551340823', null, null, null, null, '0', '15906176368', null, '68', '32020661135', '32020666301286', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1254', null, '846845160994ae059dc2dc3562996657', 'Jr9Sji', '王维', '1551340823', null, null, null, null, '0', '18661002838', null, '68', '32020661135', '32020666300869', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1255', null, '9c6695931377b63a515a3192e92260e6', 'njBBvD', '熊艳玲', '1551340823', null, null, null, null, '0', '18912463130', null, '57', '32020661137', '32020666301122', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1256', null, '8f8c98505635e218ac71435c7322daa0', 'tgH52x', '陈彩溶', '1551340823', null, null, null, null, '0', '15952468157', null, '57', '32020661137', '32020666301038', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1257', null, '547edd81c5d1de7835a6782046aaa862', 'IuZBtC', '周斌', '1551340823', null, null, null, null, '0', '15961717731', null, '57', '32020661137', '32020666301052', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1258', null, '7c91318c3e9dbb47923e92120cd0441b', 'DYnZhc', '唐丽娜', '1551340823', '1551750975', '192.168.23.1', null, null, '0', '18651001959', null, '57', '32020661137', '32020666301050', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961MRL5vmlobjyJJG9vij3A28');
INSERT INTO `bestop_member` VALUES ('1259', null, '9915cd5a89a158026359eec510b2c72c', 'm1REjg', '李越园', '1551340823', null, null, null, null, '0', '18362363768', null, '57', '32020661137', '32020666301203', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1260', null, '9cf68707de5a1bb257e3bb7bd9fae284', 'e23KXf', '张洪艳', '1551340823', null, null, null, null, '0', '18168853116', null, '57', '32020661137', '32020666301213', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1261', null, 'b0d89328b313cc73b3dae3a6baaac5cf', 'KFFyq2', '王贤莉', '1551340823', '1551751015', '192.168.23.1', null, null, '0', '15161599859', null, '57', '32020661137', '32020666301121', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961BC5SP_893EjQNSdH7BCxUI');
INSERT INTO `bestop_member` VALUES ('1262', null, '073faaff6f69ddc6edc17bd589a0f60e', '52l269', '李燕', '1551340823', '1551767593', '192.168.23.1', null, null, '0', '13720772586', null, '57', '32020661137', '32020666300943', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961PcPzhPIsFXYLE-5eG2z8OE');
INSERT INTO `bestop_member` VALUES ('1263', null, 'fb0b238969c80c954bd228bdf42b8e54', '5H7gGU', '王红梅', '1551340823', null, null, null, null, '0', '15861497752', null, '66', '32020661120', '32020666301192', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1264', null, 'bdf80dbc4d1f4d906a184c5fdbcd3ce9', 'qk2EDs', '安玲堤', '1551340823', null, null, null, null, '0', '15961805090', null, '66', '32020661120', '32020666301242', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1265', null, '9af70b373cb59fe5b86bd2feec35c573', '1Tgl1U', '郭亚丽', '1551340823', null, null, null, null, '0', '13255210039', null, '66', '32020661120', '32020666301015', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1266', null, '86777a97b085c5c98d705eb2a2cd10f5', 'ghN5jc', '刘沙', '1551340823', null, null, null, null, '0', '18312567565', null, '66', '32020661120', '32020666301149', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1267', null, '867f45f401b20fc8d2bd55ee988999f5', 'NCLNtY', '李辉', '1551340823', null, null, null, null, '0', '13814280925', null, '66', '32020661120', '32020666301058', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1268', null, '18d23a64231f1b7470e9180d6cf2f0c2', 'HeAaXB', '张芹', '1551340823', null, null, null, null, '0', '13057240362', null, '66', '32020661120', '32020666301044', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1269', null, '83f85591327b7e5bee3d46a5ed710610', 'RhR9Zd', '王阿英', '1551340823', null, null, null, null, '0', '15190201002', null, '66', '32020661120', '32020666300986', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1270', null, 'c6eeb091df805638b2556a165284e6bd', 'JlJB7G', '何梅', '1551340824', '1552358058', '192.168.23.1', null, null, '0', '18762618626', null, '66', '32020661120', '32020666300625', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961J9x6u9T8QBoXDyPALZyj3c');
INSERT INTO `bestop_member` VALUES ('1271', null, '8778702676faa0644c0ddf7c5bdd7663', 'EhPYY4', '王奇', '1551340824', null, null, null, null, '0', '13771167344', null, '67', '32020661125', '32020666301153', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1272', null, '7c42b3605ca75bf7d5746aaf663d74e2', 'hTAuGZ', '孟维维', '1551340824', null, null, null, null, '0', '18262349090', null, '67', '32020661125', '32020666301127', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1273', null, '7068472857796d9259693477e63cb61e', 'bPeuUD', '刘冲', '1551340824', null, null, null, null, '0', '13400008510', null, '67', '32020661125', '32020666301105', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1274', null, 'dd83b84d2d7315499f680b1f9ad024a6', '9U1NzT', '樊志芳', '1551340824', null, null, null, null, '0', '15161576220', null, '67', '32020661125', '32020666301068', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1275', null, '2d683d9ccfb081b08c3304ecf0984e40', 'VMk8X5', '郭彦伽', '1551340824', null, null, null, null, '0', '18651515152', null, '67', '32020661125', '32020666300847', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1276', null, 'd18274a4fd3dffb5dee181b03489db75', 'Fnh58c', '张来川', '1551340824', null, null, null, null, '0', '13951568541', null, '67', '32020661126', '32020666301179', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1277', null, '38b4385e6075273a83acfa13381402e5', '8AK2qF', '俞嘉莹', '1551340824', null, null, null, null, '0', '15995246892', null, '67', '32020661126', '32020666301056', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1278', null, 'a1bdfa336231499b6465f985d189d5f3', '5X4wwU', '凌兴平', '1551340824', null, null, null, null, '0', '18961133129', null, '67', '32020661126', '32020666301042', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1279', null, 'ec505f17ae7aec6b4f23b9ad3e526f1e', '1ULTeQ', '张梦歆', '1551340824', null, null, null, null, '0', '13776050409', null, '67', '32020661126', '32020666301041', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1280', null, '9f0a1a63640df5a750f469c53ab8fe7b', 'NhLB1W', '朱凤森', '1551340824', null, null, null, null, '0', '15961757653', null, '67', '32020661126', '32020666301273', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1281', null, '6557522c4303c472c8d141d7fa6f1a04', 'TII7UG', '许莲', '1551340824', null, null, null, null, '0', '15050670774', null, '67', '32020661126', '32020666301274', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1282', null, 'f46ad0ef0a8dd22b39671300952f64f3', 'EMqD2w', '马玉球', '1551340824', null, null, null, null, '0', '15861575536', null, '67', '32020661126', '32020666301306', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1283', null, '84490ff4a41b02e6774c481902b2475a', 'P93SA1', '张梦垚', '1551340824', null, null, null, null, '0', '15006187726', null, '67', '32020661126', '32020666300933', '江苏', '无锡', '国寿惠山支公司', null, null, null);
INSERT INTO `bestop_member` VALUES ('1284', null, '3bf513219c32ae9137d385e876fa8f26', 'z8x8yX', '张梅', '1551340824', '1551767430', '192.168.23.1', null, null, '0', '15852833394', null, '67', '32020661126', '32020666300864', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961CfIv0QdM-ku5Dk7Jc0giqs');
INSERT INTO `bestop_member` VALUES ('1285', null, '2c87f697037cfecc0465bf8fa4b58245', 'mlTmAa', '周斌', '1551528879', '1551528879', '192.168.23.1', null, null, '0', '15335202669', null, '66', '32020666301', '32020666301367', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961LLESMPKy4do-j1xd5Oc1IU');
INSERT INTO `bestop_member` VALUES ('1286', null, 'b76aca4cd2ce5387587effe0dbdd1293', 'TKGbGw', '徐佳朦', '1551662248', '1551676565', '192.168.23.1', null, null, '0', '13961735814', null, '68', '32020661119', '32020666301374', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961AOhisJqWrzw6hO25KGy6lU');
INSERT INTO `bestop_member` VALUES ('1287', null, '6986e31c2e3023c883225eb9daa4bed0', '88ZCQK', '陆秀月', '1551662315', '1551662315', '192.168.23.1', null, null, '0', '18261751287', null, '68', '32020661132', '32020666301371', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961ByLaJqoTxhu2_8j5NAHGkg');
INSERT INTO `bestop_member` VALUES ('1288', null, '37d31b5195a1870976e631161b890e39', '564saq', '李静', '1551662317', '1551662317', '192.168.23.1', null, null, '0', '18762632605', null, '68', '32020661132', '32020666301372', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961G6kq9k9WGXW4MvnBLixhmo');
INSERT INTO `bestop_member` VALUES ('1289', null, '95999c362859850430bee86bca7f7d07', 'FIQEks', '赵振友', '1551749243', '1551830794', '192.168.23.1', null, null, '0', '15895429309', null, '74', '32020060231', '32020688203873', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961ETqAOXAJ_AMfMxRIVy4f9o');
INSERT INTO `bestop_member` VALUES ('1290', null, '5ce0969c9ebe98561541c0f5ef2ed5de', 'xkKT3s', '赵静', '1551749605', '1551830847', '192.168.23.1', null, null, '0', '15190201599', null, '74', '32020060231', '32020688203874', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961H3RtofXszlizU1xLlAK-oM');
INSERT INTO `bestop_member` VALUES ('1291', null, '68bc94fb2edfb2204d5af6d1c236fc88', '4PzusE', '陈萍', '1551752119', '1551752119', '192.168.23.1', null, null, '0', '15052129714', null, '74', '32020601231', '32020688203875', '江苏', '无锡', '国寿惠山支公司', null, '1', 'oK_961DJWeGFdWzRuf74iF-BtZoM');
INSERT INTO `bestop_member` VALUES ('1292', null, '66c7f72ac908abb49d5d697f8f110072', 'qw9r7t', '李春明', '1551767086', '1551767086', '192.168.23.1', null, null, '0', '15094387695', null, '67', '32020661130', '32020666300781', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961Cug9tH6BY20abxWV5fLtAM');
INSERT INTO `bestop_member` VALUES ('1293', null, '4d88e172fd54ea55a57d5bc3c399e948', 'W4GbCH', '虞红', '1551794480', '1551794480', '192.168.23.1', null, null, '0', '15358094564', null, '55', '32020601112', '32020688001964', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961PzjTX-FAX3wbu5uK65fG0k');
INSERT INTO `bestop_member` VALUES ('1294', null, '37b59e60eea5aeb10b6aac02725f3230', 'FSXyGX', '张加玲', '1552440433', '1552440433', '192.168.23.1', null, null, '0', '13771101380', null, '73', '33333333333', '32020688203464', '江苏', '无锡', '国寿惠山支公司', null, null, 'oK_961NSEhMvSjOOxXQEFe_8ICrs');
INSERT INTO `bestop_member` VALUES ('1295', null, '1295b778565cf66b3dd304ae83e41002', 'sayvWt', '李春明', '1554108631', null, null, null, null, '0', '李春明', null, null, '11111111111', '22222211111111', null, null, null, null, null, null);
INSERT INTO `bestop_member` VALUES ('1296', null, '94f0eda2f314daa77a4ed328e4e0c9b7', 'm38ZTH', 'lal来了', '1559352330', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_member` VALUES ('1297', null, 'edb65b9b2fa81d89fcb2c1acf8a576f7', '4Am5A5', '+++', '1559352548', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_member` VALUES ('1298', null, '5540830b30edf366a1632b55b944c05a', 'hba712', '+++', '1559352588', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_member` VALUES ('1299', null, 'f9b1734095d2a9a938c2a4bea60c3c69', '34Mbfz', '+++', '1559352632', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_member` VALUES ('1300', null, '06e66778eb747dec0a5f78f0070c8242', 'NdNriA', 'lal来了', '1559352663', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_member` VALUES ('1301', null, '9bff4f7c39e3d9973a57da577a20598c', '1xuZfn', 'lal来了', '1559352773', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_member` VALUES ('1302', null, 'ad83cb326ad93325b8418e4e3d64e64a', 'x5RPFT', 'lal来了', '1559352818', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_member` VALUES ('1303', null, 'aa0bc312edb79edea48fb152aa413547', 'SBjwC3', 'lal来了', '1559352866', null, null, null, null, '0', '15152231733', null, '0', '222', '121212', '', '', '', null, null, null);
INSERT INTO `bestop_membergroup` VALUES ('1', '游客', '', '0', '0', '0');
INSERT INTO `bestop_membergroup` VALUES ('2', '注册会员', '', '10', '0', '0');
INSERT INTO `bestop_membergroup` VALUES ('3', '中级会员', '', '30', '0', '0');
INSERT INTO `bestop_menu` VALUES ('1', '常规管理', '0', '', '', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('2', '模块管理', '50', '', '', '', '0', '1', '5');
INSERT INTO `bestop_menu` VALUES ('6', '网站内容管理', '1', '', '', '', '0', '1', '2');
INSERT INTO `bestop_menu` VALUES ('8', '导航设置', '47', 'Category', 'index', '', '0', '1', '2');
INSERT INTO `bestop_menu` VALUES ('10', '图文自定义', '47', 'Block', 'index', '', '0', '1', '4');
INSERT INTO `bestop_menu` VALUES ('12', '专题管理', '2', 'Special', 'index', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('13', '公告管理', '52', 'Announce', 'index', '', '0', '1', '6');
INSERT INTO `bestop_menu` VALUES ('14', '友情链接', '52', 'Link', 'index', '', '0', '1', '7');
INSERT INTO `bestop_menu` VALUES ('16', '评论管理', '52', 'Comment', 'index', '', '0', '1', '9');
INSERT INTO `bestop_menu` VALUES ('18', '会员管理', '50', '', '', '', '0', '1', '3');
INSERT INTO `bestop_menu` VALUES ('20', '网站设置', '47', 'System', 'site', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('21', '静态缓存设置', '52', 'System', 'url', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('22', '清除系统缓存', '52', 'System', 'clearCache', '', '0', '0', '10');
INSERT INTO `bestop_menu` VALUES ('24', '静态缓存', '50', '', '', '', '0', '0', '2');
INSERT INTO `bestop_menu` VALUES ('25', '一键更新全站', '47', 'ClearHtml', 'all', '', '0', '0', '3');
INSERT INTO `bestop_menu` VALUES ('26', '更新首页', '24', 'ClearHtml', 'home', '', '0', '0', '3');
INSERT INTO `bestop_menu` VALUES ('27', '更新栏目', '24', 'ClearHtml', 'lists', '', '0', '0', '4');
INSERT INTO `bestop_menu` VALUES ('28', '更新文档', '24', 'ClearHtml', 'shows', '', '0', '0', '5');
INSERT INTO `bestop_menu` VALUES ('29', '更新专题', '24', 'ClearHtml', 'special', '', '0', '0', '6');
INSERT INTO `bestop_menu` VALUES ('30', '会员管理', '18', 'Member', 'index', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('31', '会员组管理', '18', 'Membergroup', 'index', '', '0', '1', '2');
INSERT INTO `bestop_menu` VALUES ('32', '职场管理人设置', '49', 'Rbac', 'index', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('33', '权限设置', '49', 'Rbac', 'role', '', '0', '1', '2');
INSERT INTO `bestop_menu` VALUES ('34', '节点列表', '35', 'Rbac', 'node', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('35', '扩展管理', '50', '', '', '', '0', '1', '4');
INSERT INTO `bestop_menu` VALUES ('37', '模型管理', '35', 'Model', 'index', '', '0', '1', '2');
INSERT INTO `bestop_menu` VALUES ('38', '菜单管理', '35', 'Menu', 'index', '', '0', '1', '3');
INSERT INTO `bestop_menu` VALUES ('39', '数据库管理', '35', 'Database', 'index', '', '0', '1', '4');
INSERT INTO `bestop_menu` VALUES ('40', '联动管理', '35', 'Itemgroup', 'index', '', '0', '1', '5');
INSERT INTO `bestop_menu` VALUES ('41', '区域管理', '35', 'Area', 'index', '', '0', '1', '6');
INSERT INTO `bestop_menu` VALUES ('42', '修改个人信息', '48', 'Personal', 'index', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('43', '修改密码', '48', 'Personal', 'pwd', '', '0', '1', '2');
INSERT INTO `bestop_menu` VALUES ('45', '已传文件管理', '47', 'Attachment', 'index', '', '0', '0', '5');
INSERT INTO `bestop_menu` VALUES ('46', '数据元管理', '35', 'Meta', 'index', '', '0', '1', '7');
INSERT INTO `bestop_menu` VALUES ('47', '网站高级设置', '1', '', '', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('48', '我的账户', '1', '', '', '', '0', '1', '9');
INSERT INTO `bestop_menu` VALUES ('49', '权限管理', '1', '', '', '', '0', '1', '8');
INSERT INTO `bestop_menu` VALUES ('50', '开发者设置', '0', '', '', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('52', '网站高级设置', '50', '', '', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('53', '导航设置', '52', 'Category', 'index', 'admin', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('54', '网站设置', '52', 'System', 'site2', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('56', '广告管理', '47', 'Abc', 'index', '', '0', '1', '3');
INSERT INTO `bestop_menu` VALUES ('57', '水印及缩略图', '52', 'System', 'site3', '', '0', '1', '1');
INSERT INTO `bestop_menu` VALUES ('75', '产品管理', '1', 'Product', 'index', '', null, '1', '3');
INSERT INTO `bestop_menu` VALUES ('76', '产品列表', '75', 'Product', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('84', '添加产品', '75', 'Product', 'msg', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('78', '地区&amp;职场管理', '1', 'Product', 'index', '', null, '1', '4');
INSERT INTO `bestop_menu` VALUES ('79', '地区管理', '78', 'Region', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('80', '职场管理', '78', 'Zc', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('81', '业务员管理', '1', 'Member', 'index', '', null, '1', '5');
INSERT INTO `bestop_menu` VALUES ('82', '业务员列表', '81', 'Member', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('83', '添加业务员', '81', 'Member', 'add', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('85', '订单管理', '1', '', '', '', null, '1', '6');
INSERT INTO `bestop_menu` VALUES ('86', '订单列表', '85', 'Order', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('87', '职场统计', '85', 'Order', 'zctj', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('88', '留言管理', '1', 'Dmsg', 'dmsg', '', null, '0', '7');
INSERT INTO `bestop_menu` VALUES ('89', '留言列表', '88', 'Dmsg', 'msg', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('90', '留言设置', '88', 'Dmsg', 'config', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('91', '规格管理', '75', 'Rule', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('92', '业务员统计', '85', 'Order', 'ywytj', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('93', '问卷管理', '1', 'Wenjuan', '', '', null, '1', '10');
INSERT INTO `bestop_menu` VALUES ('94', '添加问卷', '93', 'Wenjuan', 'msg', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('95', '问卷列表', '93', 'Wenjuan', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('96', '问卷结果', '93', 'Wenjuan', 'answer', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('97', '职场商品统计', '85', 'Order', 'zccptj', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('98', '业务员商品统计', '85', 'Order', 'zcrytj', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('99', '职场业务员统计', '93', 'Wenjuan', 'zcywy', '', null, '0', '1');
INSERT INTO `bestop_menu` VALUES ('100', '职场问卷统计', '93', 'Wenjuan', 'zc', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('101', '业务员统计', '93', 'Wenjuan', 'ywy', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('102', '活动管理', '1', 'Event', '', '', null, '1', '11');
INSERT INTO `bestop_menu` VALUES ('103', '活动列表', '102', 'Event', 'index', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('104', '活动数据', '102', 'Event', 'info', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('105', '职场活动统计', '102', 'Event', 'zc', '', null, '1', '1');
INSERT INTO `bestop_menu` VALUES ('106', '业务员活动统计', '102', 'Event', 'ywy', '', null, '1', '1');
INSERT INTO `bestop_meta` VALUES ('1', '1', 'HOME_URL_MODEL', '1');
INSERT INTO `bestop_meta` VALUES ('2', '1', 'HOME_URL_PATHINFO_DEPR', '/');
INSERT INTO `bestop_meta` VALUES ('3', '1', 'HOME_URL_ROUTER_ON', '0');
INSERT INTO `bestop_meta` VALUES ('4', '1', 'HOME_URL_ROUTE_RULES', 'Mobile$=>Mobile/Index/index\r\nSpecial/:id\\d=>Special/shows\r\n:e/p/:p\\d=>List/index\r\n:e/:id\\d=>Show/index\r\n/^(\\w+)$/=>List/index?e=:1');
INSERT INTO `bestop_meta` VALUES ('5', '1', 'HOME_HTML_CACHE_ON', '0');
INSERT INTO `bestop_meta` VALUES ('6', '1', 'MOBILE_HTML_CACHE_ON', '0');
INSERT INTO `bestop_meta` VALUES ('7', '1', 'HTML_CACHE_INDEX_ON', '1');
INSERT INTO `bestop_meta` VALUES ('8', '1', 'HTML_CACHE_INDEX_TIME', '0');
INSERT INTO `bestop_meta` VALUES ('9', '1', 'HTML_CACHE_LIST_ON', '1');
INSERT INTO `bestop_meta` VALUES ('10', '1', 'HTML_CACHE_LIST_TIME', '0');
INSERT INTO `bestop_meta` VALUES ('11', '1', 'HTML_CACHE_SHOW_ON', '1');
INSERT INTO `bestop_meta` VALUES ('12', '1', 'HTML_CACHE_SHOW_TIME', '0');
INSERT INTO `bestop_meta` VALUES ('13', '1', 'HTML_CACHE_SPECIAL_ON', '1');
INSERT INTO `bestop_meta` VALUES ('14', '1', 'HTML_CACHE_SPECIAL_TIME', '0');
INSERT INTO `bestop_meta` VALUES ('15', '9', 'ONLINE_CFG_MODE', '1');
INSERT INTO `bestop_meta` VALUES ('16', '9', 'ONLINE_CFG_STYLE', 'blue');
INSERT INTO `bestop_meta` VALUES ('17', '9', 'ONLINE_CFG_H', '1');
INSERT INTO `bestop_meta` VALUES ('18', '9', 'ONLINE_CFG_H_MARGIN', '0');
INSERT INTO `bestop_meta` VALUES ('19', '9', 'ONLINE_CFG_V', '2');
INSERT INTO `bestop_meta` VALUES ('20', '9', 'ONLINE_CFG_V_MARGIN', '0');
INSERT INTO `bestop_meta` VALUES ('21', '9', 'ONLINE_CFG_QQ', '');
INSERT INTO `bestop_meta` VALUES ('22', '9', 'ONLINE_CFG_WANGWANG', '');
INSERT INTO `bestop_meta` VALUES ('23', '9', 'ONLINE_CFG_PHONE_ON', '1');
INSERT INTO `bestop_meta` VALUES ('24', '9', 'ONLINE_CFG_PHONE', '0871665441');
INSERT INTO `bestop_meta` VALUES ('25', '9', 'ONLINE_CFG_GUESTBOOK_ON', '0');
INSERT INTO `bestop_meta` VALUES ('26', '9', 'ONLINE_CFG_QQ_PARAM', '<a target=\\\'\'_blank\\\'\' href=\\\"http://wpa.qq.com/msgrd?v=3&uin=[客服号]&site=qq&menu=yes\\\"><img border=\\\"0\\\" src=\\\"http://wpa.qq.com/pa?p=2:[客服号]:51\\\" alt=\\\"[客服说明]\\\" title=\\\"[客服说明]\\\"/></a>');
INSERT INTO `bestop_meta` VALUES ('27', '9', 'ONLINE_CFG_WANGWANG_PARAM', '<a target=\\\"_blank\\\" href=\\\"http://www.taobao.com/webww/ww.php?ver=3&touid=[客服号]&siteid=cntaobao&status=1&charset=utf-8\\\" ><img border=\\\"0\\\" src=\\\"http://amos.alicdn.com/online.aw?v=2&uid=[客服号]&site=cntaobao&s=10&charset=UTF-8\\\" alt=\\\"[客服说明]\\\" /></a>');
INSERT INTO `bestop_model` VALUES ('1', '文章模型', '', 'article', '1', '', 'List_article.html', 'Show_article.html', '1');
INSERT INTO `bestop_model` VALUES ('2', '单页模型', '', 'page', '1', '', 'List_page.html', 'Show_page.html', '2');
INSERT INTO `bestop_model` VALUES ('3', '产品模型', '', 'product', '1', '', 'List_product.html', 'Show_product.html', '2');
INSERT INTO `bestop_model` VALUES ('5', '软件下载模型', '', 'soft', '1', '', 'List_soft.html', 'Show_soft.html', '5');
INSERT INTO `bestop_model` VALUES ('6', '案例模板', '', 'cases', '1', '', 'List_cases.html', 'Show_case.html', '6');
INSERT INTO `bestop_model` VALUES ('9', '产品V1', '', 'product', '1', '', 'List_productA.html', 'Show_productA.html', '2');
INSERT INTO `bestop_model` VALUES ('10', '产品V2', '', 'product', '1', '', 'List_productB.html', 'Show_product.html', '2');
INSERT INTO `bestop_model` VALUES ('14', '留言模块', '', 'guestbook', '1', '', 'List_Guestbook.html', 'Show_article.html', '7');
INSERT INTO `bestop_model` VALUES ('15', '文章模型（有图）', '', 'article', '1', null, 'List_article2.html', 'Show_article.html', '1');
INSERT INTO `bestop_node` VALUES ('1', 'Manage', '后台应用', '1', null, '1', '0', '1');
INSERT INTO `bestop_node` VALUES ('128', 'Personal', '我的账户', '1', null, '1', '1', '2');
INSERT INTO `bestop_node` VALUES ('129', 'index', '个人信息修改', '1', null, '1', '128', '3');
INSERT INTO `bestop_node` VALUES ('130', 'pwd', '修改密码', '1', null, '1', '128', '3');
INSERT INTO `bestop_node` VALUES ('134', 'Event', '活动管理', '1', null, '1', '1', '2');
INSERT INTO `bestop_node` VALUES ('135', 'msg', '添加修改活动页面', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('136', 'index', '活动列表', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('137', 'info', '活动数据', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('138', 'ywy', '业务员活动统计', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('139', 'export_ywytj_ex', '业务员活动统计导出', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('140', 'Zc', '通用，请全勾选', '1', null, '1', '1', '2');
INSERT INTO `bestop_node` VALUES ('141', 'get_region_jsdata', '查询的省市区', '1', null, '1', '140', '3');
INSERT INTO `bestop_node` VALUES ('142', 'get_prov_jsdata', '省数据', '1', null, '1', '140', '3');
INSERT INTO `bestop_node` VALUES ('143', 'get_city_jsdata', '市数据', '1', null, '1', '140', '3');
INSERT INTO `bestop_node` VALUES ('144', 'get_area_jsdata', '区域数据', '1', null, '1', '140', '3');
INSERT INTO `bestop_node` VALUES ('145', 'get_zc_jsdata', '职场数据', '1', null, '1', '140', '3');
INSERT INTO `bestop_node` VALUES ('146', 'msg_save', '保存活动', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('147', 'status', '更新活动状态', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('148', 'del', '删除活动', '1', null, '1', '134', '3');
INSERT INTO `bestop_node` VALUES ('149', 'Order', '订单管理', '1', null, '1', '1', '2');
INSERT INTO `bestop_node` VALUES ('150', 'zctj', '职场统计', '1', null, '1', '149', '3');
INSERT INTO `bestop_node` VALUES ('151', 'export_zctj_ex', '职场统计导出', '1', null, '1', '149', '3');
INSERT INTO `bestop_node` VALUES ('152', 'ywytj', '业务员统计', '1', null, '1', '149', '3');
INSERT INTO `bestop_node` VALUES ('153', 'export_ywytj_ex', '业务员统计导出', '1', null, '1', '149', '3');
INSERT INTO `bestop_order` VALUES ('190223122233890', '4200000247201902237194613880', 'fixed', '0', '商务礼物【测试】', '0.3', '0.3', null, null, '0.0', '1550895753', '1550895764', '1550895906', '1550895906', 'wechat', '微信支付', '0', 'success', '1', '1', '测试', null, '1', '陈珊珊', '陈珊珊', '15152231721', null, '江苏无锡梁溪区清明桥六中附近', '江苏', '无锡', '梁溪区', '48', '清明桥职场', '2', '[2019-02-23 12:23:52] [用户申请内容：]我要三个|||[2019-02-23 12:24:17] 商务礼物【测试】 (id:37) 购买数量由 1 更改为 3');
INSERT INTO `bestop_order` VALUES ('190223125936705', null, 'fixed', '0', '情人节礼品;儿童节礼品', '0.8', '0.8', null, null, '0.0', '1550897977', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '1', '陈珊珊', '陈珊珊', '15152231721', null, '江苏无锡梁溪区清明桥六中附近', '江苏', '无锡', '梁溪区', '48', '清明桥职场', '0', null);
INSERT INTO `bestop_order` VALUES ('190223133925078', null, 'fixed', '0', '商务礼物【测试】', '0.1', '0.1', null, null, '0.0', '1550900365', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '2', '赵连英', '赵连英', '13771176711', null, '江苏无锡锡山区锡山大桥大润发超市3-20', '江苏', '无锡', '锡山区', '49', '锡山大桥区', '0', null);
INSERT INTO `bestop_order` VALUES ('190223134711703', '4200000247201902235980258578', 'fixed', '0', '商务礼物【测试】', '0.4', '0.4', null, null, '0.0', '1550900831', '1550900840', '1551489909', '1551489909', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1', '陈珊珊', '陈珊珊', '15152231721', null, '江苏无锡梁溪区清明桥六中附近', '江苏', '无锡', '梁溪区', '48', '清明桥职场', '2', '[2019-02-23 14:07:45] [用户申请内容：]数量变更为4|||[2019-02-23 14:08:24] 商务礼物【测试】 (id:37) 购买数量由 1 更改为 4');
INSERT INTO `bestop_order` VALUES ('190223134800187', '4200000256201902232769266794', 'fixed', '0', '儿童节礼品', '0.3', '0.3', null, null, '0.0', '1550900880', '1550901756', '1551489900', '1551489900', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '2', '赵连英', '赵连英', '13771176711', null, '江苏无锡锡山区锡山大桥大润发超市3-20', '江苏', '无锡', '锡山区', '49', '锡山大桥区', '0', null);
INSERT INTO `bestop_order` VALUES ('190223135343574', null, 'fixed', '0', '儿童节礼品', '0.3', '0.3', null, null, '0.0', '1550901223', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '3', '中二病患者', '中二病患者', '13771158061', null, '江苏无锡梁溪区清明桥六中附近', '江苏', '无锡', '梁溪区', '48', '清明桥职场', '0', null);
INSERT INTO `bestop_order` VALUES ('190223141659607', '4200000241201902237631085271', 'fixed', '0', '情人节礼品;儿童节礼品', '8.0', '8.0', null, null, '0.0', '1550902619', '1550902636', '1550903812', '1550903812', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '4', '谭立东', '谭立东', '13861752112', null, '江苏无锡锡山区锡山大桥大润发超市3-20', '江苏', '无锡', '锡山区', '49', '锡山大桥区', '2', '[2019-02-23 14:20:05] [用户申请内容：]礼品退10个|||[2019-02-23 14:20:23] 情人节礼品 (id:38) 购买数量由 20 更改为 10');
INSERT INTO `bestop_order` VALUES ('190223141709258', null, 'fixed', '0', '儿童节礼品;商务礼物【测试】', '0.7', '0.7', null, null, '0.0', '1550902629', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '1', '陈珊珊', '陈珊珊', '15152231721', null, '江苏无锡梁溪区清明桥六中附近', '江苏', '无锡', '梁溪区', '48', '清明桥职场', '0', null);
INSERT INTO `bestop_order` VALUES ('190225153153683', null, 'fixed', '0', '信源-复合钢奶锅', '240.0', '240.0', null, null, '0.0', '1551079913', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '5', '王俊超', '王俊超', '15052207973', null, '江苏无锡惠山区藕塘', '江苏', '无锡', '惠山区', '50', '藕塘职场', '0', null);
INSERT INTO `bestop_order` VALUES ('190226190010543', null, 'fixed', '0', '北欧印象系列 7件套', '180.0', '180.0', null, null, '0.0', '1551178810', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '5', '王俊超', '王俊超', '15052207973', null, '江苏无锡惠山区藕塘', '江苏', '无锡', '惠山区', '50', '藕塘职场', '0', null);
INSERT INTO `bestop_order` VALUES ('190227224207048', null, 'fixed', '0', '吉宴五谷杂粮', '1.0', '1.0', null, null, '0.0', '1551278527', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '7', '保礼街', '保礼街', '13345678900', null, '北京北京朝阳区北京', '北京', '北京', '朝阳区', '51', '保礼街', '2', '');
INSERT INTO `bestop_order` VALUES ('190302180358126', '4200000251201903023683793614', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551521038', '1551521048', '1551883944', '1551883944', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '885', '杨连龙', '杨连龙', '13961776957', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '66', '亮剑一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190228103716492', '4200000245201902281733369664', 'fixed', '0', '吉宴五谷杂粮', '0.6', '0.6', null, null, '0.0', '1551321436', '1551321446', '1551489857', '1551489857', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '4', '谭立东', '谭立东', '13861752112', null, '江苏南京国寿高淳支公司高淳宝塔路', '江苏', '南京', '国寿高淳支公司', '52', '营业部', '0', null);
INSERT INTO `bestop_order` VALUES ('190301211742587', '4200000246201903014263828569', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '42.0', '42.0', null, null, '0.0', '1551446262', '1551446275', '1551489848', '1551489848', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '4', '谭立东', '谭立东', '13861752112', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190304083624090', '4200000252201903044275595551', 'fixed', '0', '信源 淘米盆三件套', '570.0', '570.0', null, null, '0.0', '1551659784', '1551659800', '1551883944', '1551883944', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '71', '陈秀梅', '陈秀梅', '15358992030', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304091342249', '4200000244201903045472172986', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551662022', '1551662031', '1551883944', '1551883944', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1129', '孙静芳', '孙静芳', '13338105280', null, '江苏无锡国寿惠山支公司无锡市北塘大街124—128号1楼', '江苏', '无锡', '国寿惠山支公司', '68', '蓝海', '0', null);
INSERT INTO `bestop_order` VALUES ('190304091344892', null, 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551662024', '0', '0', '1551662058', 'wechat', '微信支付', '0', 'close', '0', '0', '', '未付', '1249', '耿林杰', '耿林杰', '17861860572', null, '江苏无锡国寿惠山支公司无锡市北塘大街124—128号1楼', '江苏', '无锡', '国寿惠山支公司', '68', '蓝海', '0', null);
INSERT INTO `bestop_order` VALUES ('190304091948645', '4200000247201903041800413088', 'fixed', '0', '信源 淘米盆三件套', '57.0', '57.0', null, null, '0.0', '1551662388', '1551662403', '1551883944', '1551883944', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '54', '臧英', '臧英', '13861720800', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190304092814362', '4200000240201903044376621337', 'fixed', '0', '古风食器四碗套装', '46.0', '46.0', null, null, '0.0', '1551662894', '1551662954', '1551883944', '1551883944', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '54', '臧英', '臧英', '13861720800', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190304093642670', '4200000245201903040879101340', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551663402', '1551663416', '1551883944', '1551883944', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '57', '钱惠华', '钱惠华', '13921184335', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094621629', '4200000245201903042063134067', 'fixed', '0', '信源 淘米盆三件套', '380.0', '380.0', null, null, '0.0', '1551663981', '1551663999', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1164', '王红梅', '王红梅', '15161507331', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094630654', null, 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551663990', '0', '0', '1551666957', 'wechat', '微信支付', '0', 'close', '0', '0', '', '不想买了', '930', '高建平', '高建平', '13901510432', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094706726', '4200000253201903040974391276', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551664026', '1551664062', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '918', '杨金萍', '杨金萍', '13771529612', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094730237', '4200000243201903044619597980', 'fixed', '0', '信源 淘米盆三件套', '380.0', '380.0', null, null, '0.0', '1551664050', '1551664074', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '868', '张秋菊', '张秋菊', '13358118410', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094751336', '4200000248201903042668396050', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551664071', '1551664526', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '932', '胡成娟', '胡成娟', '15951566647', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094837171', '4200000254201903043214352562', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551664117', '1551664137', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '918', '杨金萍', '杨金萍', '13771529612', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094903152', null, 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551664143', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '566', '朱翠娟', '朱翠娟', '13665148158', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094904904', '4200000243201903047835693770', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551664144', '1551664160', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '927', '姜小连', '姜小连', '15961709690', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094915604', null, 'fixed', '0', '信源 淘米盆三件套', '19.0', '19.0', null, null, '0.0', '1551664155', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '932', '胡成娟', '胡成娟', '15951566647', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094935225', '4200000240201903040669411233', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551664175', '1551664188', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '974', '高二华', '高二华', '13511644665', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304094945615', '4200000241201903049439482808', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551664185', '1551664197', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '927', '姜小连', '姜小连', '15961709690', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304095010791', '4200000258201903044317702008', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551664210', '1551664299', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '974', '高二华', '高二华', '13511644665', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304095220914', '4200000245201903046661439223', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551664340', '1551664542', '1551883931', '1551883931', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '933', '夏红', '夏红', '18861836816', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304095228195', null, 'fixed', '0', '信源 淘米盆三件套', '76.0', '76.0', null, null, '0.0', '1551664348', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '932', '胡成娟', '胡成娟', '15951566647', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304095606649', '4200000257201903042440545461', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551664566', '1551664577', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '932', '胡成娟', '胡成娟', '15951566647', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304095624574', '4200000254201903041289810987', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551664584', '1551664623', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '933', '夏红', '夏红', '18861836816', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304100240886', '4200000241201903041621529290', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551664960', '1551664970', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '740', '许春娟', '许春娟', '13914250247', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190304103514009', '4200000247201903042846089411', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '210.0', '210.0', null, null, '0.0', '1551666914', '1551666998', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '930', '高建平', '高建平', '13901510432', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304104713481', '4200000256201903041984218150', 'fixed', '0', '信源 淘米盆三件套', '38.0', '38.0', null, null, '0.0', '1551667633', '1551667657', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '623', '陈丽萍', '陈丽萍', '18914144010', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304104806911', '4200000255201903048550375505', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551667686', '1551667725', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '626', '张雷英', '张雷英', '15900572322', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190304110454626', '4200000243201903041628210796', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551668694', '1551668706', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '328', '谷静', '谷静', '18906178352', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304114210104', '4200000241201903046543886443', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '210.0', '210.0', null, null, '0.0', '1551670930', '1551670940', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '637', '杨念念', '杨念念', '13043616138', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304115316539', '4200000247201903048364767179', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551671596', '1551671609', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '272', '陆海英', '陆海英', '13656179656', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304115317898', '4200000253201903042280727956', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551671597', '1551671617', '1551883916', '1551883916', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '251', '陆锡娟', '陆锡娟', '13961819218', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304115507636', null, 'fixed', '0', '信源 淘米盆三件套', '19.0', '19.0', null, null, '0.0', '1551671707', '0', '0', '1551671914', 'wechat', '微信支付', '0', 'close', '0', '0', '', '无法付款', '623', '陈丽萍', '陈丽萍', '18914144010', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304115541532', '4200000243201903049860937252', 'fixed', '0', '信源 淘米盆三件套', '19.0', '19.0', null, null, '0.0', '1551671741', '1551671755', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '623', '陈丽萍', '陈丽萍', '18914144010', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304115621411', null, 'fixed', '0', '信源 淘米盆三件套', '38.0', '38.0', null, null, '0.0', '1551671781', '0', '0', '1551671874', 'wechat', '微信支付', '0', 'close', '0', '0', '', '无法支付', '623', '陈丽萍', '陈丽萍', '18914144010', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304115908091', '4200000240201903041762768860', 'fixed', '0', '信源 淘米盆三件套', '38.0', '38.0', null, null, '0.0', '1551671948', '1551676580', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '623', '陈丽萍', '陈丽萍', '18914144010', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304120612670', '4200000257201903040630295337', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551672372', '1551672383', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '354', '刘秋华', '刘秋华', '13606198614', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190304133920214', null, 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '630.0', '630.0', null, null, '0.0', '1551677960', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '67', '周小凤', '周小凤', '18762659935', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304134019547', '4200000239201903045758531455', 'fixed', '0', '古风食器四碗套装', '345.0', '345.0', null, null, '0.0', '1551678019', '1551678032', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '67', '周小凤', '周小凤', '18762659935', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304134253570', '4200000240201903044861633963', 'fixed', '0', '信源 淘米盆三件套', '285.0', '285.0', null, null, '0.0', '1551678173', '1551678200', '1551883837', '1551883837', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '67', '周小凤', '周小凤', '18762659935', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304153200821', '4200000247201903049485021707', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551684720', '1551684736', '1551883837', '1551883837', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '125', '李方', '李方', '13912376780', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190304154142784', null, 'fixed', '0', '信源 淘米盆三件套', '475.0', '475.0', null, null, '0.0', '1551685302', '0', '0', '1551747037', 'wechat', '微信支付', '0', 'close', '0', '0', '', '数量改变', '65', '陆丽华', '陆丽华', '13338779070', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190304154207977', null, 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551685327', '0', '0', '1551747001', 'wechat', '微信支付', '0', 'close', '0', '0', '', '数量改变', '65', '陆丽华', '陆丽华', '13338779070', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305080809461', '4200000255201903057462532438', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551744489', '1551744502', '1551883837', '1551883837', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '603', '冯亦武', '冯亦武', '18921519886', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号3楼', '江苏', '无锡', '国寿惠山支公司', '54', '雪狼', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082345719', '4200000252201903059999591621', 'fixed', '0', '古风食器四碗套装', '460.0', '460.0', null, null, '0.0', '1551745425', '1551745455', '1551883837', '1551883837', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '134', '周文华', '周文华', '13013613099', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082505289', '4200000247201903059773036401', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551745505', '1551745526', '1551883837', '1551883837', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '69', '夏秀兰', '夏秀兰', '13861766758', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082516232', '4200000250201903059380590553', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551745516', '1551745553', '1551883837', '1551883837', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '134', '周文华', '周文华', '13013613099', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082625340', '4200000247201903054175539699', 'fixed', '0', '古风食器四碗套装', '575.0', '575.0', null, null, '0.0', '1551745585', '1551745867', '1551883837', '1551883837', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '69', '夏秀兰', '夏秀兰', '13861766758', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082706832', null, 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551745626', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '131', '许秋华', '许秋华', '13585029772', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082729384', null, 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551745649', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '135', '钱玉华', '钱玉华', '13506193618', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082735911', '4200000243201903059875089205', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551745655', '1551746861', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '148', '单晓燕', '单晓燕', '13812013117', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082745966', null, 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551745665', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '132', '徐惠兰', '徐惠兰', '13921523061', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082811794', '4200000253201903064690103589', 'fixed', '0', '古风食器四碗套装', '414.0', '414.0', null, null, '0.0', '1551745691', '1551877801', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '130', '江彩英', '江彩英', '13706188942', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305082959295', '4200000244201903058600109815', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '670.0', '670.0', null, null, '0.0', '1551745799', '1551745908', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '73', '陈银姐', '陈银姐', '13914135913', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083108701', '4200000249201903059400642006', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551745868', '1551745882', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '133', '陈凤仙', '陈凤仙', '13616175512', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083120707', null, 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551745880', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '131', '许秋华', '许秋华', '13585029772', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083209464', '4200000255201903054611390056', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551745929', '1551745940', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '133', '陈凤仙', '陈凤仙', '13616175512', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083236160', '4200000248201903054908673233', 'fixed', '0', '信源 淘米盆三件套', '19.0', '19.0', null, null, '0.0', '1551745956', '1551745969', '1551883904', '1551883904', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '4', '谭立东', '谭立东', '13861752112', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083325526', '4200000249201903057810936270', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551746005', '1551746053', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '139', '吴小琴', '吴小琴', '13616195781', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083458708', '4200000258201903059047346903', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551746098', '1551746197', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '139', '吴小琴', '吴小琴', '13616195781', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083705665', '4200000255201903059046423305', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551746225', '1551746243', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '131', '许秋华', '许秋华', '13585029772', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083756966', '4200000253201903054445696589', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551746276', '1551746299', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '131', '许秋华', '许秋华', '13585029772', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083828639', null, 'fixed', '0', '信源 淘米盆三件套', '19.0', '19.0', null, null, '0.0', '1551746308', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '132', '徐惠兰', '徐惠兰', '13921523061', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305083933302', '4200000253201903051593061991', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551746373', '1551746390', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '132', '徐惠兰', '徐惠兰', '13921523061', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305084621645', '4200000244201903051341890724', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551746781', '1551746795', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '135', '钱玉华', '钱玉华', '13506193618', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305084655154', '4200000255201903050291963822', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '650.0', '650.0', null, null, '0.0', '1551746815', '1551748105', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '230', '周海云', '周海云', '18915341583', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305084706189', '4200000245201903053713233251', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551746826', '1551746858', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '135', '钱玉华', '钱玉华', '13506193618', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305084736289', '4200000256201903052759952686', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551746856', '1551746874', '1551883868', '1551883868', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '132', '徐惠兰', '徐惠兰', '13921523061', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305084813987', null, 'fixed', '0', '信源 淘米盆三件套', '285.0', '285.0', null, null, '0.0', '1551746893', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '65', '陆丽华', '陆丽华', '13338779070', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305084856737', null, 'fixed', '0', '古风食器四碗套装', '345.0', '345.0', null, null, '0.0', '1551746936', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '65', '陆丽华', '陆丽华', '13338779070', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305084946834', null, 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551746986', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '150', '沈亚芬', '沈亚芬', '15895354702', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190305085049069', '4200000241201903054315011011', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551747049', '1551747152', '1551883811', '1551883811', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '137', '虞浓琴', '虞浓琴', '13915270689', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305085118335', null, 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551747078', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '150', '沈亚芬', '沈亚芬', '15895354702', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190305085405961', '4200000254201903052187778376', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551747245', '1551747256', '1551883811', '1551883811', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '137', '虞浓琴', '虞浓琴', '13915270689', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305085426475', '4200000248201903057451621261', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551747266', '1551747280', '1551883811', '1551883811', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '150', '沈亚芬', '沈亚芬', '15895354702', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190305085518845', '4200000249201903051937906395', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551747318', '1551747331', '1551883811', '1551883811', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '152', '虞志琦', '虞志琦', '13665109819', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190305091127127', '4200000248201903057040636368', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551748287', '1551748307', '1551883811', '1551883811', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '923', '潘丽敏', '潘丽敏', '13338742717', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305093744483', null, 'fixed', '0', '古风食器四碗套装', '23.0', '23.0', null, null, '0.0', '1551749864', '0', '0', '1551750750', 'wechat', '微信支付', '0', 'close', '0', '0', '', '重新买入，数量不足', '44', '席美娟', '席美娟', '13961895986', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305094504283', '4200000246201903054078679810', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551750304', '1551750359', '1551883811', '1551883811', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '626', '张雷英', '张雷英', '15900572322', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190305094928881', '4200000255201903054273276913', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '630.0', '630.0', null, null, '0.0', '1551750568', '1551750581', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '538', '王云兰', '王云兰', '13861738631', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190305095518902', '4200000239201903052466762379', 'fixed', '0', '古风食器四碗套装', '230.0', '230.0', null, null, '0.0', '1551750918', '1551750930', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '307', '俞涛', '俞涛', '15190319527', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305095649727', '4200000252201903057258339560', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551751009', '1551751038', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '307', '俞涛', '俞涛', '15190319527', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305095705529', '4200000242201903054187183687', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551751025', '1551751078', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '78', '高惠英', '高惠英', '15190230908', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305095716249', '4200000245201903052644635995', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551751036', '1551751051', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1258', '唐丽娜', '唐丽娜', '18651001959', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305095926061', '4200000250201903057783446416', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551751166', '1551751189', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '78', '高惠英', '高惠英', '15190230908', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305100007200', null, 'fixed', '0', '信源 淘米盆三件套', '285.0', '285.0', null, null, '0.0', '1551751207', '0', '0', '1551867004', 'wechat', '微信支付', '0', 'close', '0', '0', '', '重复订单，取消一单', '48', '沈学凤', '沈学凤', '13812545162', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305100025868', null, 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551751225', '0', '0', '1551751308', 'wechat', '微信支付', '0', 'close', '0', '0', '', '无法交流', '778', '丁常志', '丁常志', '15062414071', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305100144250', '4200000258201903056771586372', 'fixed', '0', '信源 淘米盆三件套', '285.0', '285.0', null, null, '0.0', '1551751304', '1551751325', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '48', '沈学凤', '沈学凤', '13812545162', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305100217508', '4200000257201903056241089837', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551751337', '1551751353', '1551883786', '1551883786', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '778', '丁常志', '丁常志', '15062414071', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305100248113', '4200000241201903050704215962', 'fixed', '0', '古风食器四碗套装;信源 淘米盆三件套', '325.0', '325.0', null, null, '0.0', '1551751368', '1551751387', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1177', '王朝', '王朝', '15850229912', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305100311656', '4200000253201903059419973299', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551751391', '1551751416', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '123', '季咏梅', '季咏梅', '13961710879', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190305100441097', '4200000250201903059078389502', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551751481', '1551751527', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '756', '周新华', '周新华', '15995221255', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305101345314', '4200000241201903057150523642', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551752025', '1551752050', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '44', '席美娟', '席美娟', '13961895986', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305101550043', '4200000247201903053660506875', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551752150', '1551752167', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '44', '席美娟', '席美娟', '13961895986', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305101711471', '4200000246201903054190593257', 'fixed', '0', '古风食器四碗套装;信源 淘米盆三件套', '103.0', '103.0', null, null, '0.0', '1551752231', '1551752244', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1073', '周刚', '周刚', '13328109991', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305101823749', '4200000255201903053978195345', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551752303', '1551752315', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1291', '陈萍', '陈萍', '15052129714', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190305102631262', '4200000253201903057364494120', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '198.0', '198.0', null, null, '0.0', '1551752791', '1551752804', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1084', '杨晓迎', '杨晓迎', '15295432162', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305103410268', null, 'fixed', '0', '信源-复合钢奶锅', '48.0', '48.0', null, null, '0.0', '1551753250', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '1', '陈珊珊', '陈珊珊', '15152231721', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190305104956383', '4200000246201903052367769081', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551754196', '1551754206', '1551883754', '1551883754', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1172', '张磊', '张磊', '13861812959', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305105027140', '4200000253201903052420905732', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551754227', '1551754234', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1172', '张磊', '张磊', '13861812959', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305105044127', '4200000258201903053651680327', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551754244', '1551754258', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '673', '朱瑛', '朱瑛', '13861820547', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190305110738458', '4200000258201903059279295869', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551755258', '1551755269', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '126', '李建芳', '李建芳', '15961807536', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190305112311484', '4200000258201903051549936540', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '126.0', '126.0', null, null, '0.0', '1551756191', '1551756222', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '713', '谈佳菁', '谈佳菁', '15306195552', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190305115624358', '4200000239201903051173275700', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551758184', '1551758203', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '23', '唐云芬', '唐云芬', '15961841680', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190305142229476', '4200000254201903059891148121', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551766949', '1551766964', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1191', '许静音', '许静音', '13656156366', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305142229919', '4200000241201903053428316713', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551766949', '1551766959', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1040', '冯林和', '冯林和', '13912486157', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305143644580', '4200000244201903056843473087', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '233.0', '233.0', null, null, '0.0', '1551767804', '1551767820', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '994', '甄玉芳', '甄玉芳', '15161530881', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '1', '[2019-03-05 14:41:11] [用户申请内容：]收货地址输错了');
INSERT INTO `bestop_order` VALUES ('190305145014136', null, 'fixed', '0', '信源复合钢奶锅', '500.0', '500.0', null, null, '0.0', '1551768614', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '1071', '吴新腾', '吴新腾', '13915280545', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305145113455', '4200000257201903056937168499', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551768673', '1551768689', '1551883729', '1551883729', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1071', '吴新腾', '吴新腾', '13915280545', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305145652148', '4200000250201903052760504729', 'fixed', '0', '信源 淘米盆三件套', '380.0', '380.0', null, null, '0.0', '1551769012', '1551769032', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '61', '龚伟霞', '龚伟霞', '13861758405', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305145723380', '4200000244201903059705876694', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551769043', '1551796002', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '963', '董娟娣', '董娟娣', '13921521513', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305145738319', '4200000244201903051310218694', 'fixed', '0', '古风食器四碗套装', '230.0', '230.0', null, null, '0.0', '1551769058', '1551769091', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '61', '龚伟霞', '龚伟霞', '13861758405', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190305145816141', '4200000239201903052754976301', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551769096', '1551769122', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1037', '范愿愿', '范愿愿', '15895351009', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305145820950', '4200000241201903059907107202', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551769100', '1551769113', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1027', '韩广霞', '韩广霞', '15251699642', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305150435730', '4200000251201903054338776984', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '206.0', '206.0', null, null, '0.0', '1551769475', '1551769501', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1242', '孙婷婷', '孙婷婷', '18651514056', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305151239515', '4200000258201903055741842156', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551769959', '1551769977', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1237', '夏艳芳', '夏艳芳', '13771117448', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305153227171', null, 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551771147', '0', '0', '1551852557', 'wechat', '微信支付', '0', 'close', '0', '0', '', '订错了', '979', '柯丽萍', '柯丽萍', '13003396308', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305153335218', '4200000257201903053705274005', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551771215', '1551771224', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '979', '柯丽萍', '柯丽萍', '13003396308', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305154626169', '4200000245201903050544463290', 'fixed', '0', '信源复合钢奶锅;古风食器四碗套装', '144.0', '144.0', null, null, '0.0', '1551771986', '1551772000', '1551883699', '1551883699', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1230', '胡凤磊', '胡凤磊', '18014253868', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305174734529', '4200000240201903053472213586', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551779254', '1551779343', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1203', '张丽', '张丽', '18751571702', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305192623073', '4200000247201903066800324704', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551785183', '1551852379', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '955', '李洪霞', '李洪霞', '15206185092', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305201710163', '4200000255201903054273794915', 'fixed', '0', '信源 淘米盆三件套', '38.0', '38.0', null, null, '0.0', '1551788230', '1551788247', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '944', '陈玉禄', '陈玉禄', '13357918982', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190305201730339', null, 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551788250', '0', '0', '1551873233', 'wechat', '微信支付', '0', 'close', '0', '0', '', '己订', '925', '王浩波', '王浩波', '13338100123', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305202510311', '4200000247201903051163556268', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551788710', '1551788723', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '925', '王浩波', '王浩波', '13338100123', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305204521235', '4200000239201903053733572901', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '130.0', '130.0', null, null, '0.0', '1551789921', '1551789953', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '573', '虞吉铖', '虞吉铖', '18961786163', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305225032842', '4200000246201903055728209607', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551797432', '1551797441', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '65', '陆丽华', '陆丽华', '13338779070', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305225131688', '4200000241201903050695291289', 'fixed', '0', '古风食器四碗套装', '230.0', '230.0', null, null, '0.0', '1551797491', '1551797501', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '65', '陆丽华', '陆丽华', '13338779070', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190305225207544', '4200000240201903050958880531', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551797527', '1551797537', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '65', '陆丽华', '陆丽华', '13338779070', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306065240394', '4200000251201903066856229787', 'fixed', '0', '信源 淘米盆三件套', '380.0', '380.0', null, null, '0.0', '1551826360', '1551826372', '1551883679', '1551883679', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '125', '李方', '李方', '13912376780', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190306080920371', '4200000246201903069963039453', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551830960', '1551830984', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '198', '胡岳英', '胡岳英', '13328119121', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306081317851', '4200000252201903063916838644', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551831197', '1551831212', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '24', '诸剑英', '诸剑英', '13812286815', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306082356832', '4200000244201903061066904959', 'fixed', '0', '古风食器四碗套装', '230.0', '230.0', null, null, '0.0', '1551831836', '1551831854', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '148', '单晓燕', '单晓燕', '13812013117', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306083130437', '4200000257201903060933630255', 'fixed', '0', '信源复合钢奶锅', '25.0', '25.0', null, null, '0.0', '1551832290', '1551832304', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '131', '许秋华', '许秋华', '13585029772', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306083658314', '4200000249201903060241072566', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551832618', '1551832647', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '68', '姜琴芬', '姜琴芬', '15061871806', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306083759293', '4200000250201903068973791230', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551832679', '1551832702', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '68', '姜琴芬', '姜琴芬', '15061871806', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306083847322', '4200000239201903064389983495', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551832727', '1551832747', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '68', '姜琴芬', '姜琴芬', '15061871806', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '59', '双联二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306084304539', '4200000245201903065378953838', 'fixed', '0', '信源复合钢奶锅', '75.0', '75.0', null, null, '0.0', '1551832984', '1551833013', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '213', '陆柯妤', '陆柯妤', '13338118435', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306084345329', '4200000252201903060961272658', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551833025', '1551833051', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '107', '杨晓琴', '杨晓琴', '15806177801', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306084833567', '4200000258201903063497400163', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551833313', '1551833331', '1551883591', '1551883591', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '161', '陶素华', '陶素华', '13814209485', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190306084838244', null, 'fixed', '0', '信源复合钢奶锅', '100.0', '100.0', null, null, '0.0', '1551833318', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '150', '沈亚芬', '沈亚芬', '15895354702', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190306084951662', '4200000250201903066757961556', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551833391', '1551833406', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '161', '陶素华', '陶素华', '13814209485', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190306090426559', '4200000256201903068936533692', 'fixed', '0', '信源复合钢奶锅', '50.0', '50.0', null, null, '0.0', '1551834266', '1551834278', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '778', '丁常志', '丁常志', '15062414071', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190306090717118', '4200000248201903060564075212', 'fixed', '0', '古风食器四碗套装;信源 淘米盆三件套', '210.0', '210.0', null, null, '0.0', '1551834437', '1551834446', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '109', '李凤娟', '李凤娟', '13812529502', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190306091522921', '4200000239201903063047369515', 'fixed', '0', '古风食器四碗套装', '230.0', '230.0', null, null, '0.0', '1551834922', '1551834958', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '895', '高应梅', '高应梅', '13921300387', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092019009', '4200000248201903066256268938', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551835219', '1551835245', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '895', '高应梅', '高应梅', '13921300387', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092218927', '4200000239201903065758425111', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551835338', '1551835353', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '33', '唐丽亚', '唐丽亚', '15852543058', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092248073', '4200000256201903065939703500', 'fixed', '0', '信源复合钢奶锅', '200.0', '200.0', null, null, '0.0', '1551835368', '1551835380', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '895', '高应梅', '高应梅', '13921300387', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092341515', '4200000251201903062936956763', 'fixed', '0', '信源 淘米盆三件套', '285.0', '285.0', null, null, '0.0', '1551835421', '1551835431', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1016', '陶丽', '陶丽', '13337906817', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092425917', '4200000251201903061466438974', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551835465', '1551835472', '1551883574', '1551883574', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1016', '陶丽', '陶丽', '13337906817', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092521589', '4200000243201903069973996569', 'fixed', '0', '信源复合钢奶锅;古风食器四碗套装;信源 淘米盆三件套', '346.0', '346.0', null, null, '0.0', '1551835521', '1551835531', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '887', '丁康勤', '丁康勤', '13812535185', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092526605', '4200000245201903063388015276', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551835526', '1551835535', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1016', '陶丽', '陶丽', '13337906817', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092802448', '4200000246201903069881270830', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551835682', '1551835694', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '41', '姚玉琴', '姚玉琴', '13961797569', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306092956091', '4200000254201903069722665776', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551835796', '1551835818', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '930', '高建平', '高建平', '13901510432', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306093017321', '4200000246201903066175158604', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551835817', '1551835878', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '940', '李建琴', '李建琴', '13921271472', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306093400008', '4200000258201903061106055960', 'fixed', '0', '信源复合钢奶锅;古风食器四碗套装', '480.0', '480.0', null, null, '0.0', '1551836040', '1551836074', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '38', '孙亚敏', '孙亚敏', '13915281195', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306093629185', '4200000242201903061006196822', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551836189', '1551836200', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '994', '甄玉芳', '甄玉芳', '15161530881', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306094612066', '4200000247201903066451540319', 'fixed', '0', '古风食器四碗套装;信源复合钢奶锅', '730.0', '730.0', null, null, '0.0', '1551836772', '1551836820', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '15', '陈琴萍', '陈琴萍', '13812186562', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306095247140', '4200000243201903060452928187', 'fixed', '0', '信源复合钢奶锅;古风食器四碗套装', '720.0', '720.0', null, null, '0.0', '1551837167', '1551837177', '1551883894', '1551883894', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '34', '虞红', '虞红', '13063676824', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306095702370', null, 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551837422', '0', '0', '1551853001', 'wechat', '微信支付', '0', 'close', '0', '0', '', '误操作', '1233', '张月娥', '张月娥', '13584186028', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306095741649', '4200000254201903061843116646', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1551837461', '1551837470', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1233', '张月娥', '张月娥', '13584186028', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306100805366', null, 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '103.0', '103.0', null, null, '0.0', '1551838085', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '787', '朱春霞', '朱春霞', '18921297873', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190306101022502', '4200000253201903067085328860', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551838222', '1551838241', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '787', '朱春霞', '朱春霞', '18921297873', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190306102046126', '4200000242201903068638165821', 'fixed', '0', '信源复合钢奶锅', '100.0', '100.0', null, null, '0.0', '1551838846', '1551838864', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '39', '边末珍', '边末珍', '13961892528', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306102207207', '4200000254201903063481095114', 'fixed', '0', '古风食器四碗套装', '138.0', '138.0', null, null, '0.0', '1551838927', '1551838940', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '39', '边末珍', '边末珍', '13961892528', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306104217228', '4200000251201903064796834844', 'fixed', '0', '信源复合钢奶锅;信源 淘米盆三件套', '220.0', '220.0', null, null, '0.0', '1551840137', '1551840168', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '957', '李敬敬', '李敬敬', '15052123473', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306111023699', '4200000251201903066289533529', 'fixed', '0', '古风食器四碗套装', '23.0', '23.0', null, null, '0.0', '1551841823', '1551841861', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '423', '高珊红', '高珊红', '18762801585', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306111948212', '4200000252201903063146382801', 'fixed', '0', '古风食器四碗套装', '23.0', '23.0', null, null, '0.0', '1551842388', '1551842408', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '423', '高珊红', '高珊红', '18762801585', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306112058701', '4200000241201903066491418334', 'fixed', '0', '古风食器四碗套装', '23.0', '23.0', null, null, '0.0', '1551842458', '1551842470', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '423', '高珊红', '高珊红', '18762801585', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306112210066', '4200000241201903061604443233', 'fixed', '0', '古风食器四碗套装', '23.0', '23.0', null, null, '0.0', '1551842530', '1551842546', '1551883557', '1551883557', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '423', '高珊红', '高珊红', '18762801585', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306112259531', '4200000248201903068752106606', 'fixed', '0', '古风食器四碗套装', '23.0', '23.0', null, null, '0.0', '1551842579', '1551842593', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '423', '高珊红', '高珊红', '18762801585', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306112408985', '4200000256201903063549140581', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551842648', '1551842660', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '184', '倪克平', '倪克平', '13706193177', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190306115724945', '4200000249201903060740714196', 'fixed', '0', '信源复合钢奶锅', '100.0', '100.0', null, null, '0.0', '1551844644', '1551844656', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '933', '夏红', '夏红', '18861836816', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306120235360', '4200000249201903063476210964', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551844955', '1551844965', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '933', '夏红', '夏红', '18861836816', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306123132120', '4200000245201903061366539665', 'fixed', '0', '信源 淘米盆三件套;古风食器四碗套装', '210.0', '210.0', null, null, '0.0', '1551846692', '1551846710', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '947', '黄维维', '黄维维', '15161699359', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306123340977', '4200000255201903062715684317', 'fixed', '0', '信源 淘米盆三件套;信源复合钢奶锅', '220.0', '220.0', null, null, '0.0', '1551846820', '1551846858', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1033', '张贤丽', '张贤丽', '18018366936', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306123933957', '4200000244201903060856926021', 'fixed', '0', '信源复合钢奶锅;信源 淘米盆三件套', '220.0', '220.0', null, null, '0.0', '1551847173', '1551847184', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1185', '沈玥沄', '沈玥沄', '13338717588', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306124112086', '4200000242201903061962941549', 'fixed', '0', '信源 淘米盆三件套', '38.0', '38.0', null, null, '0.0', '1551847272', '1551847286', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '942', '资平花', '资平花', '13861723305', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306125955894', '4200000239201903069960714495', 'fixed', '0', '古风食器四碗套装', '23.0', '23.0', null, null, '0.0', '1551848395', '1551848408', '1551883518', '1551883518', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '944', '陈玉禄', '陈玉禄', '13357918982', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306130050925', '4200000240201903062957417751', 'fixed', '0', '信源复合钢奶锅', '50.0', '50.0', null, null, '0.0', '1551848450', '1551848461', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '944', '陈玉禄', '陈玉禄', '13357918982', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306140058100', '4200000242201903068353653580', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551852058', '1551852078', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '289', '朱丹', '朱丹', '15961895073', null, '江苏无锡国寿惠山支公司惠山区前洲街道北溪青城西路（中国银行西隔壁）', '江苏', '无锡', '国寿惠山支公司', '56', '希望', '0', null);
INSERT INTO `bestop_order` VALUES ('190306140429121', '4200000247201903066217093100', 'fixed', '0', '信源复合钢奶锅;信源 淘米盆三件套', '220.0', '220.0', null, null, '0.0', '1551852269', '1551852280', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1212', '顾宏伟', '顾宏伟', '13912388213', null, '江苏无锡国寿惠山支公司惠山区堰桥街道锡澄北路10号2楼', '江苏', '无锡', '国寿惠山支公司', '69', '辉煌一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306143749673', '4200000258201903065766727345', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551854269', '1551854696', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '869', '孙美娟', '孙美娟', '13861827927', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306144521864', '4200000244201903060166793281', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551854721', '1551854730', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '869', '孙美娟', '孙美娟', '13861827927', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306151921364', '4200000241201903063050446233', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551856761', '1551856770', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '869', '孙美娟', '孙美娟', '13861827927', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306153045561', '4200000256201903065966549256', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551857445', '1551857460', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1172', '张磊', '张磊', '13861812959', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306153113198', '4200000244201903060309864244', 'fixed', '0', '古风食器四碗套装', '115.0', '115.0', null, null, '0.0', '1551857473', '1551857490', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1172', '张磊', '张磊', '13861812959', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306155306268', '4200000246201903062165454378', 'fixed', '0', '信源复合钢奶锅', '125.0', '125.0', null, null, '0.0', '1551858786', '1551858798', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1091', '郭丽品', '郭丽品', '15006183309', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（205）', '江苏', '无锡', '国寿惠山支公司', '67', '亮剑二部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306171247266', '4200000242201903064134989124', 'fixed', '0', '信源 淘米盆三件套', '190.0', '190.0', null, null, '0.0', '1551863567', '1551863581', '1551883431', '1551883431', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '1058', '管延红', '管延红', '18262275050', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（207）', '江苏', '无锡', '国寿惠山支公司', '65', '凌云', '0', null);
INSERT INTO `bestop_order` VALUES ('190306174802459', '4200000257201903068127314146', 'fixed', '0', '信源复合钢奶锅', '100.0', '100.0', null, null, '0.0', '1551865682', '1551865692', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '222', '肖丽君', '肖丽君', '18706183258', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190306174852506', '4200000245201903066396792545', 'fixed', '0', '古风食器四碗套装', '69.0', '69.0', null, null, '0.0', '1551865732', '1551865742', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '222', '肖丽君', '肖丽君', '18706183258', null, '江苏无锡国寿惠山支公司惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '江苏', '无锡', '国寿惠山支公司', '73', '朝阳', '0', null);
INSERT INTO `bestop_order` VALUES ('190306190805150', '4200000245201903065876610647', 'fixed', '0', '古风食器四碗套装;信源 淘米盆三件套', '153.0', '153.0', null, null, '0.0', '1551870485', '1551870555', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '83', '姚丽英', '姚丽英', '13951516635', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190306191017169', '4200000253201903068499730638', 'fixed', '0', '信源 淘米盆三件套', '57.0', '57.0', null, null, '0.0', '1551870617', '1551870630', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '83', '姚丽英', '姚丽英', '13951516635', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190306202745589', null, 'fixed', '0', '古风食器四碗套装', '230.0', '230.0', null, null, '0.0', '1551875265', '0', '0', '0', 'wechat', '微信支付', '0', 'wpay', '0', '0', '', null, '32', '钱秀亚', '钱秀亚', '18915332931', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306204115851', '4200000250201903063380067439', 'fixed', '0', '信源复合钢奶锅', '50.0', '50.0', null, null, '0.0', '1551876075', '1551876100', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '992', '黄新玉', '黄新玉', '13338107560', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306204349020', '4200000249201903063080619232', 'fixed', '0', '古风食器四碗套装', '230.0', '230.0', null, null, '0.0', '1551876229', '1551876250', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '32', '钱秀亚', '钱秀亚', '18915332931', null, '江苏无锡国寿惠山支公司惠山区洛社镇洛城大道109-201号（204）', '江苏', '无锡', '国寿惠山支公司', '55', '雄鹰', '0', null);
INSERT INTO `bestop_order` VALUES ('190306210214442', '4200000246201903062401403355', 'fixed', '0', '信源 淘米盆三件套', '57.0', '57.0', null, null, '0.0', '1551877334', '1551877361', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '992', '黄新玉', '黄新玉', '13338107560', null, '江苏无锡国寿惠山支公司惠山区长安街道绿地世纪城613号（华惠路）', '江苏', '无锡', '国寿惠山支公司', '57', '天一', '0', null);
INSERT INTO `bestop_order` VALUES ('190306211114511', '4200000240201903066758730010', 'fixed', '0', '信源 淘米盆三件套', '228.0', '228.0', null, null, '0.0', '1551877874', '1551877894', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '130', '江彩英', '江彩英', '13706188942', null, '江苏无锡国寿惠山支公司惠山区阳山镇胜利路24号', '江苏', '无锡', '国寿惠山支公司', '58', '双联一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190306211831884', '4200000246201903064140881711', 'fixed', '0', '信源 淘米盆三件套', '95.0', '95.0', null, null, '0.0', '1551878311', '1551878321', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '362', '平惠波', '平惠波', '13400022058', null, '江苏无锡国寿惠山支公司惠山区钱桥街道钱桥大街103号2楼', '江苏', '无锡', '国寿惠山支公司', '74', '超越', '0', null);
INSERT INTO `bestop_order` VALUES ('190306222045889', '4200000239201903069925918183', 'fixed', '0', '古风食器四碗套装;信源复合钢奶锅;信源 淘米盆三件套', '450.0', '450.0', null, null, '0.0', '1551882045', '1551882145', '1551883107', '1551883107', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '53', '龚静红', '龚静红', '15312219703', null, '江苏无锡国寿惠山支公司惠山区钱桥街道藕塘北路132号1楼', '江苏', '无锡', '国寿惠山支公司', '64', '前进', '0', null);
INSERT INTO `bestop_order` VALUES ('190308132455598', '4200000247201903083091989795', 'fixed', '0', '古风食器四碗套装', '460.0', '460.0', null, null, '0.0', '1552022695', '1552024665', '1552269152', '1552269152', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '95', '张莉', '张莉', '13861822509', null, '江苏无锡国寿惠山支公司惠山区玉祁街道镇中路5号', '江苏', '无锡', '国寿惠山支公司', '60', '双成一部', '0', null);
INSERT INTO `bestop_order` VALUES ('190308135702365', '4200000248201903083025568040', 'fixed', '0', '信源复合钢奶锅', '250.0', '250.0', null, null, '0.0', '1552024622', '1552024639', '1552269145', '1552269145', 'wechat', '微信支付', '0', 'success', '1', '1', '', null, '95', '张莉', '张莉', '13861822509', null, '江苏无锡国寿惠山支公司惠山区玉祁街道镇中路5号', '江苏', '无锡', '国寿惠山支公司', '60', '双成一部', '0', null);
INSERT INTO `bestop_orderdata` VALUES ('60', '190223122233890', '90', '37', '商务礼物【测试】', '', 'img1/20190223/5c70c693cb390.jpg', '0.1', '0.0', '0.3', '3', '0', null, null, null, '江苏', '无锡', '梁溪区', '清明桥职场', '48', '陈珊珊', '1');
INSERT INTO `bestop_orderdata` VALUES ('61', '190223125936705', '91', '38', '情人节礼品', '', 'img1/20190223/5c70c74e17890.jpg', '0.2', '0.0', '0.2', '1', '0', null, null, null, '江苏', '无锡', '梁溪区', '清明桥职场', '48', '陈珊珊', '1');
INSERT INTO `bestop_orderdata` VALUES ('62', '190223125936705', '92', '39', '儿童节礼品', '', 'img1/20190223/5c70c7bc8c870.jpg', '0.3', '0.0', '0.6', '2', '0', null, null, null, '江苏', '无锡', '梁溪区', '清明桥职场', '48', '陈珊珊', '1');
INSERT INTO `bestop_orderdata` VALUES ('63', '190223133925078', '90', '37', '商务礼物【测试】', '', 'img1/20190223/5c70c693cb390.jpg', '0.1', '0.0', '0.1', '1', '0', null, null, null, '江苏', '无锡', '锡山区', '锡山大桥区', '49', '赵连英', '2');
INSERT INTO `bestop_orderdata` VALUES ('64', '190223134711703', '90', '37', '商务礼物【测试】', '', 'img1/20190223/5c70c693cb390.jpg', '0.1', '0.0', '0.4', '4', '0', null, null, null, '江苏', '无锡', '梁溪区', '清明桥职场', '48', '陈珊珊', '1');
INSERT INTO `bestop_orderdata` VALUES ('65', '190223134800187', '92', '39', '儿童节礼品', '', 'img1/20190223/5c70c7bc8c870.jpg', '0.3', '0.0', '0.3', '1', '0', null, null, null, '江苏', '无锡', '锡山区', '锡山大桥区', '49', '赵连英', '2');
INSERT INTO `bestop_orderdata` VALUES ('66', '190223135343574', '92', '39', '儿童节礼品', '', 'img1/20190223/5c70c7bc8c870.jpg', '0.3', '0.0', '0.3', '1', '0', null, null, null, '江苏', '无锡', '梁溪区', '清明桥职场', '48', '中二病患者', '3');
INSERT INTO `bestop_orderdata` VALUES ('67', '190223141659607', '91', '38', '情人节礼品', '', 'img1/20190223/5c70c74e17890.jpg', '0.2', '0.0', '2.0', '10', '0', null, null, null, '江苏', '无锡', '锡山区', '锡山大桥区', '49', '谭立东', '4');
INSERT INTO `bestop_orderdata` VALUES ('68', '190223141659607', '92', '39', '儿童节礼品', '', 'img1/20190223/5c70c7bc8c870.jpg', '0.3', '0.0', '6.0', '20', '0', null, null, null, '江苏', '无锡', '锡山区', '锡山大桥区', '49', '谭立东', '4');
INSERT INTO `bestop_orderdata` VALUES ('69', '190223141709258', '92', '39', '儿童节礼品', '', 'img1/20190223/5c70c7bc8c870.jpg', '0.3', '0.0', '0.6', '2', '0', null, null, null, '江苏', '无锡', '梁溪区', '清明桥职场', '48', '陈珊珊', '1');
INSERT INTO `bestop_orderdata` VALUES ('70', '190223141709258', '90', '37', '商务礼物【测试】', '', 'img1/20190223/5c70c693cb390.jpg', '0.1', '0.0', '0.1', '1', '0', null, null, null, '江苏', '无锡', '梁溪区', '清明桥职场', '48', '陈珊珊', '1');
INSERT INTO `bestop_orderdata` VALUES ('71', '190225153153683', '94', '41', '信源-复合钢奶锅', '', 'img1/20190225/5c7366bd35200.png', '24.0', '0.0', '240.0', '10', '0', null, null, null, '江苏', '无锡', '惠山区', '藕塘职场', '50', '王俊超', '5');
INSERT INTO `bestop_orderdata` VALUES ('72', '190226190010543', '93', '40', '北欧印象系列 7件套', '', 'img1/20190225/5c7366406d920.png', '18.0', '0.0', '180.0', '10', '0', null, null, null, '江苏', '无锡', '惠山区', '藕塘职场', '50', '王俊超', '5');
INSERT INTO `bestop_orderdata` VALUES ('73', '190227224207048', '95', '42', '吉宴五谷杂粮', '', 'img1/20190227/5c762da1c4cd4.png', '0.1', '0.0', '1.0', '10', '0', null, null, null, '北京', '北京', '朝阳区', '保礼街', '51', '保礼街', '7');
INSERT INTO `bestop_orderdata` VALUES ('78', '190302180358126', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑一部', '66', '杨连龙', '885');
INSERT INTO `bestop_orderdata` VALUES ('75', '190228103716492', '95', '42', '吉宴五谷杂粮', '', 'img1/20190227/5c762da1c4cd4.png', '0.1', '0.0', '0.6', '6', '0', null, null, null, '江苏', '南京', '国寿高淳支公司', '营业部', '52', '谭立东', '4');
INSERT INTO `bestop_orderdata` VALUES ('76', '190301211742587', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '19.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '谭立东', '4');
INSERT INTO `bestop_orderdata` VALUES ('77', '190301211742587', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '谭立东', '4');
INSERT INTO `bestop_orderdata` VALUES ('79', '190304083624090', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '570.0', '30', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '陈秀梅', '71');
INSERT INTO `bestop_orderdata` VALUES ('80', '190304091342249', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '蓝海', '68', '孙静芳', '1129');
INSERT INTO `bestop_orderdata` VALUES ('81', '190304091344892', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '蓝海', '68', '耿林杰', '1249');
INSERT INTO `bestop_orderdata` VALUES ('82', '190304091948645', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '57.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '臧英', '54');
INSERT INTO `bestop_orderdata` VALUES ('83', '190304092814362', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '46.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '臧英', '54');
INSERT INTO `bestop_orderdata` VALUES ('84', '190304093642670', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '钱惠华', '57');
INSERT INTO `bestop_orderdata` VALUES ('85', '190304094621629', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '380.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '王红梅', '1164');
INSERT INTO `bestop_orderdata` VALUES ('86', '190304094630654', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '高建平', '930');
INSERT INTO `bestop_orderdata` VALUES ('87', '190304094706726', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '杨金萍', '918');
INSERT INTO `bestop_orderdata` VALUES ('88', '190304094730237', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '380.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '张秋菊', '868');
INSERT INTO `bestop_orderdata` VALUES ('89', '190304094751336', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '胡成娟', '932');
INSERT INTO `bestop_orderdata` VALUES ('90', '190304094837171', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '杨金萍', '918');
INSERT INTO `bestop_orderdata` VALUES ('91', '190304094903152', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '朱翠娟', '566');
INSERT INTO `bestop_orderdata` VALUES ('92', '190304094904904', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '姜小连', '927');
INSERT INTO `bestop_orderdata` VALUES ('93', '190304094915604', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '19.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '胡成娟', '932');
INSERT INTO `bestop_orderdata` VALUES ('94', '190304094935225', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '高二华', '974');
INSERT INTO `bestop_orderdata` VALUES ('95', '190304094945615', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '姜小连', '927');
INSERT INTO `bestop_orderdata` VALUES ('96', '190304095010791', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '高二华', '974');
INSERT INTO `bestop_orderdata` VALUES ('97', '190304095220914', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '夏红', '933');
INSERT INTO `bestop_orderdata` VALUES ('98', '190304095228195', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '76.0', '4', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '胡成娟', '932');
INSERT INTO `bestop_orderdata` VALUES ('99', '190304095606649', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '胡成娟', '932');
INSERT INTO `bestop_orderdata` VALUES ('100', '190304095624574', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '夏红', '933');
INSERT INTO `bestop_orderdata` VALUES ('101', '190304100240886', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '许春娟', '740');
INSERT INTO `bestop_orderdata` VALUES ('102', '190304103514009', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '高建平', '930');
INSERT INTO `bestop_orderdata` VALUES ('103', '190304103514009', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '高建平', '930');
INSERT INTO `bestop_orderdata` VALUES ('104', '190304104713481', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '38.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '陈丽萍', '623');
INSERT INTO `bestop_orderdata` VALUES ('105', '190304104806911', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '张雷英', '626');
INSERT INTO `bestop_orderdata` VALUES ('106', '190304110454626', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '谷静', '328');
INSERT INTO `bestop_orderdata` VALUES ('107', '190304114210104', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '杨念念', '637');
INSERT INTO `bestop_orderdata` VALUES ('108', '190304114210104', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '杨念念', '637');
INSERT INTO `bestop_orderdata` VALUES ('109', '190304115316539', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '陆海英', '272');
INSERT INTO `bestop_orderdata` VALUES ('110', '190304115317898', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '陆锡娟', '251');
INSERT INTO `bestop_orderdata` VALUES ('111', '190304115507636', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '19.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '陈丽萍', '623');
INSERT INTO `bestop_orderdata` VALUES ('112', '190304115541532', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '19.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '陈丽萍', '623');
INSERT INTO `bestop_orderdata` VALUES ('113', '190304115621411', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '38.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '陈丽萍', '623');
INSERT INTO `bestop_orderdata` VALUES ('114', '190304115908091', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '38.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '陈丽萍', '623');
INSERT INTO `bestop_orderdata` VALUES ('115', '190304120612670', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '刘秋华', '354');
INSERT INTO `bestop_orderdata` VALUES ('116', '190304133920214', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '285.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '周小凤', '67');
INSERT INTO `bestop_orderdata` VALUES ('117', '190304133920214', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '345.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '周小凤', '67');
INSERT INTO `bestop_orderdata` VALUES ('118', '190304134019547', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '345.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '周小凤', '67');
INSERT INTO `bestop_orderdata` VALUES ('119', '190304134253570', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '285.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '周小凤', '67');
INSERT INTO `bestop_orderdata` VALUES ('120', '190304153200821', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '李方', '125');
INSERT INTO `bestop_orderdata` VALUES ('121', '190304154142784', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '475.0', '25', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陆丽华', '65');
INSERT INTO `bestop_orderdata` VALUES ('122', '190304154207977', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陆丽华', '65');
INSERT INTO `bestop_orderdata` VALUES ('123', '190305080809461', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雪狼', '54', '冯亦武', '603');
INSERT INTO `bestop_orderdata` VALUES ('124', '190305082345719', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '460.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '周文华', '134');
INSERT INTO `bestop_orderdata` VALUES ('125', '190305082505289', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '夏秀兰', '69');
INSERT INTO `bestop_orderdata` VALUES ('126', '190305082516232', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '周文华', '134');
INSERT INTO `bestop_orderdata` VALUES ('127', '190305082625340', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '575.0', '25', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '夏秀兰', '69');
INSERT INTO `bestop_orderdata` VALUES ('128', '190305082706832', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '许秋华', '131');
INSERT INTO `bestop_orderdata` VALUES ('129', '190305082729384', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '钱玉华', '135');
INSERT INTO `bestop_orderdata` VALUES ('130', '190305082735911', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '单晓燕', '148');
INSERT INTO `bestop_orderdata` VALUES ('131', '190305082745966', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '徐惠兰', '132');
INSERT INTO `bestop_orderdata` VALUES ('132', '190305082811794', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '414.0', '18', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '江彩英', '130');
INSERT INTO `bestop_orderdata` VALUES ('133', '190305082959295', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陈银姐', '73');
INSERT INTO `bestop_orderdata` VALUES ('134', '190305082959295', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '575.0', '25', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陈银姐', '73');
INSERT INTO `bestop_orderdata` VALUES ('135', '190305083108701', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陈凤仙', '133');
INSERT INTO `bestop_orderdata` VALUES ('136', '190305083120707', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '许秋华', '131');
INSERT INTO `bestop_orderdata` VALUES ('137', '190305083209464', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陈凤仙', '133');
INSERT INTO `bestop_orderdata` VALUES ('138', '190305083236160', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '19.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '谭立东', '4');
INSERT INTO `bestop_orderdata` VALUES ('139', '190305083325526', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '吴小琴', '139');
INSERT INTO `bestop_orderdata` VALUES ('140', '190305083458708', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '吴小琴', '139');
INSERT INTO `bestop_orderdata` VALUES ('141', '190305083705665', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '许秋华', '131');
INSERT INTO `bestop_orderdata` VALUES ('142', '190305083756966', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '许秋华', '131');
INSERT INTO `bestop_orderdata` VALUES ('143', '190305083828639', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '19.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '徐惠兰', '132');
INSERT INTO `bestop_orderdata` VALUES ('144', '190305083933302', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '徐惠兰', '132');
INSERT INTO `bestop_orderdata` VALUES ('145', '190305084621645', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '钱玉华', '135');
INSERT INTO `bestop_orderdata` VALUES ('146', '190305084655154', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '周海云', '230');
INSERT INTO `bestop_orderdata` VALUES ('147', '190305084655154', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '460.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '周海云', '230');
INSERT INTO `bestop_orderdata` VALUES ('148', '190305084706189', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '钱玉华', '135');
INSERT INTO `bestop_orderdata` VALUES ('149', '190305084736289', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '徐惠兰', '132');
INSERT INTO `bestop_orderdata` VALUES ('150', '190305084813987', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '285.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陆丽华', '65');
INSERT INTO `bestop_orderdata` VALUES ('151', '190305084856737', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '345.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陆丽华', '65');
INSERT INTO `bestop_orderdata` VALUES ('152', '190305084946834', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '沈亚芬', '150');
INSERT INTO `bestop_orderdata` VALUES ('153', '190305085049069', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '虞浓琴', '137');
INSERT INTO `bestop_orderdata` VALUES ('154', '190305085118335', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '沈亚芬', '150');
INSERT INTO `bestop_orderdata` VALUES ('155', '190305085405961', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '虞浓琴', '137');
INSERT INTO `bestop_orderdata` VALUES ('156', '190305085426475', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '沈亚芬', '150');
INSERT INTO `bestop_orderdata` VALUES ('157', '190305085518845', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '虞志琦', '152');
INSERT INTO `bestop_orderdata` VALUES ('158', '190305091127127', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '潘丽敏', '923');
INSERT INTO `bestop_orderdata` VALUES ('159', '190305093744483', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '席美娟', '44');
INSERT INTO `bestop_orderdata` VALUES ('160', '190305094504283', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '张雷英', '626');
INSERT INTO `bestop_orderdata` VALUES ('161', '190305094928881', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '285.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '王云兰', '538');
INSERT INTO `bestop_orderdata` VALUES ('162', '190305094928881', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '345.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '王云兰', '538');
INSERT INTO `bestop_orderdata` VALUES ('163', '190305095518902', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '俞涛', '307');
INSERT INTO `bestop_orderdata` VALUES ('164', '190305095649727', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '俞涛', '307');
INSERT INTO `bestop_orderdata` VALUES ('165', '190305095705529', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '高惠英', '78');
INSERT INTO `bestop_orderdata` VALUES ('166', '190305095716249', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '唐丽娜', '1258');
INSERT INTO `bestop_orderdata` VALUES ('167', '190305095926061', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '高惠英', '78');
INSERT INTO `bestop_orderdata` VALUES ('168', '190305100007200', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '285.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '沈学凤', '48');
INSERT INTO `bestop_orderdata` VALUES ('169', '190305100025868', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '丁常志', '778');
INSERT INTO `bestop_orderdata` VALUES ('170', '190305100144250', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '285.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '沈学凤', '48');
INSERT INTO `bestop_orderdata` VALUES ('171', '190305100217508', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '丁常志', '778');
INSERT INTO `bestop_orderdata` VALUES ('172', '190305100248113', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '王朝', '1177');
INSERT INTO `bestop_orderdata` VALUES ('173', '190305100248113', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '王朝', '1177');
INSERT INTO `bestop_orderdata` VALUES ('174', '190305100311656', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '季咏梅', '123');
INSERT INTO `bestop_orderdata` VALUES ('175', '190305100441097', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '周新华', '756');
INSERT INTO `bestop_orderdata` VALUES ('176', '190305101345314', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '席美娟', '44');
INSERT INTO `bestop_orderdata` VALUES ('177', '190305101550043', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '席美娟', '44');
INSERT INTO `bestop_orderdata` VALUES ('178', '190305101711471', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '46.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '周刚', '1073');
INSERT INTO `bestop_orderdata` VALUES ('179', '190305101711471', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '57.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '周刚', '1073');
INSERT INTO `bestop_orderdata` VALUES ('180', '190305101823749', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '陈萍', '1291');
INSERT INTO `bestop_orderdata` VALUES ('181', '190305102631262', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '152.0', '8', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '杨晓迎', '1084');
INSERT INTO `bestop_orderdata` VALUES ('182', '190305102631262', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '46.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '杨晓迎', '1084');
INSERT INTO `bestop_orderdata` VALUES ('183', '190305103410268', '94', '41', '信源-复合钢奶锅', '', 'img1/20190225/5c7366bd35200.png', '24.0', '0.0', '48.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '陈珊珊', '1');
INSERT INTO `bestop_orderdata` VALUES ('184', '190305104956383', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '张磊', '1172');
INSERT INTO `bestop_orderdata` VALUES ('185', '190305105027140', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '张磊', '1172');
INSERT INTO `bestop_orderdata` VALUES ('186', '190305105044127', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '朱瑛', '673');
INSERT INTO `bestop_orderdata` VALUES ('187', '190305110738458', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '李建芳', '126');
INSERT INTO `bestop_orderdata` VALUES ('188', '190305112311484', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '57.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '谈佳菁', '713');
INSERT INTO `bestop_orderdata` VALUES ('189', '190305112311484', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '69.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '谈佳菁', '713');
INSERT INTO `bestop_orderdata` VALUES ('190', '190305115624358', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '唐云芬', '23');
INSERT INTO `bestop_orderdata` VALUES ('191', '190305142229476', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '许静音', '1191');
INSERT INTO `bestop_orderdata` VALUES ('192', '190305142229919', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '冯林和', '1040');
INSERT INTO `bestop_orderdata` VALUES ('193', '190305143644580', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '甄玉芳', '994');
INSERT INTO `bestop_orderdata` VALUES ('194', '190305143644580', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '138.0', '6', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '甄玉芳', '994');
INSERT INTO `bestop_orderdata` VALUES ('195', '190305145014136', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '500.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '吴新腾', '1071');
INSERT INTO `bestop_orderdata` VALUES ('196', '190305145113455', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '吴新腾', '1071');
INSERT INTO `bestop_orderdata` VALUES ('197', '190305145652148', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '380.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '龚伟霞', '61');
INSERT INTO `bestop_orderdata` VALUES ('198', '190305145723380', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '董娟娣', '963');
INSERT INTO `bestop_orderdata` VALUES ('199', '190305145738319', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '龚伟霞', '61');
INSERT INTO `bestop_orderdata` VALUES ('200', '190305145816141', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '范愿愿', '1037');
INSERT INTO `bestop_orderdata` VALUES ('201', '190305145820950', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '韩广霞', '1027');
INSERT INTO `bestop_orderdata` VALUES ('202', '190305150435730', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '114.0', '6', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '孙婷婷', '1242');
INSERT INTO `bestop_orderdata` VALUES ('203', '190305150435730', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '92.0', '4', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '孙婷婷', '1242');
INSERT INTO `bestop_orderdata` VALUES ('204', '190305151239515', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '夏艳芳', '1237');
INSERT INTO `bestop_orderdata` VALUES ('205', '190305153227171', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '柯丽萍', '979');
INSERT INTO `bestop_orderdata` VALUES ('206', '190305153335218', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '柯丽萍', '979');
INSERT INTO `bestop_orderdata` VALUES ('207', '190305154626169', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '75.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '胡凤磊', '1230');
INSERT INTO `bestop_orderdata` VALUES ('208', '190305154626169', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '69.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '胡凤磊', '1230');
INSERT INTO `bestop_orderdata` VALUES ('209', '190305174734529', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '张丽', '1203');
INSERT INTO `bestop_orderdata` VALUES ('210', '190305192623073', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '李洪霞', '955');
INSERT INTO `bestop_orderdata` VALUES ('211', '190305201710163', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '38.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '陈玉禄', '944');
INSERT INTO `bestop_orderdata` VALUES ('212', '190305201730339', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '王浩波', '925');
INSERT INTO `bestop_orderdata` VALUES ('213', '190305202510311', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '王浩波', '925');
INSERT INTO `bestop_orderdata` VALUES ('214', '190305204521235', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '38.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '虞吉铖', '573');
INSERT INTO `bestop_orderdata` VALUES ('215', '190305204521235', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '92.0', '4', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '虞吉铖', '573');
INSERT INTO `bestop_orderdata` VALUES ('216', '190305225032842', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陆丽华', '65');
INSERT INTO `bestop_orderdata` VALUES ('217', '190305225131688', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陆丽华', '65');
INSERT INTO `bestop_orderdata` VALUES ('218', '190305225207544', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '陆丽华', '65');
INSERT INTO `bestop_orderdata` VALUES ('219', '190306065240394', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '380.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '李方', '125');
INSERT INTO `bestop_orderdata` VALUES ('220', '190306080920371', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '胡岳英', '198');
INSERT INTO `bestop_orderdata` VALUES ('221', '190306081317851', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '诸剑英', '24');
INSERT INTO `bestop_orderdata` VALUES ('222', '190306082356832', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '单晓燕', '148');
INSERT INTO `bestop_orderdata` VALUES ('223', '190306083130437', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '25.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '许秋华', '131');
INSERT INTO `bestop_orderdata` VALUES ('224', '190306083658314', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '姜琴芬', '68');
INSERT INTO `bestop_orderdata` VALUES ('225', '190306083759293', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '姜琴芬', '68');
INSERT INTO `bestop_orderdata` VALUES ('226', '190306083847322', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联二部', '59', '姜琴芬', '68');
INSERT INTO `bestop_orderdata` VALUES ('227', '190306084304539', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '75.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '陆柯妤', '213');
INSERT INTO `bestop_orderdata` VALUES ('228', '190306084345329', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '杨晓琴', '107');
INSERT INTO `bestop_orderdata` VALUES ('229', '190306084833567', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '陶素华', '161');
INSERT INTO `bestop_orderdata` VALUES ('230', '190306084838244', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '100.0', '4', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '沈亚芬', '150');
INSERT INTO `bestop_orderdata` VALUES ('231', '190306084951662', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '陶素华', '161');
INSERT INTO `bestop_orderdata` VALUES ('232', '190306090426559', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '50.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '丁常志', '778');
INSERT INTO `bestop_orderdata` VALUES ('233', '190306090717118', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '李凤娟', '109');
INSERT INTO `bestop_orderdata` VALUES ('234', '190306090717118', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '李凤娟', '109');
INSERT INTO `bestop_orderdata` VALUES ('235', '190306091522921', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '高应梅', '895');
INSERT INTO `bestop_orderdata` VALUES ('236', '190306092019009', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '高应梅', '895');
INSERT INTO `bestop_orderdata` VALUES ('237', '190306092218927', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '唐丽亚', '33');
INSERT INTO `bestop_orderdata` VALUES ('238', '190306092248073', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '200.0', '8', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '高应梅', '895');
INSERT INTO `bestop_orderdata` VALUES ('239', '190306092341515', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '285.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '陶丽', '1016');
INSERT INTO `bestop_orderdata` VALUES ('240', '190306092425917', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '陶丽', '1016');
INSERT INTO `bestop_orderdata` VALUES ('241', '190306092521589', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '丁康勤', '887');
INSERT INTO `bestop_orderdata` VALUES ('242', '190306092521589', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '69.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '丁康勤', '887');
INSERT INTO `bestop_orderdata` VALUES ('243', '190306092521589', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '152.0', '8', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '丁康勤', '887');
INSERT INTO `bestop_orderdata` VALUES ('244', '190306092526605', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '陶丽', '1016');
INSERT INTO `bestop_orderdata` VALUES ('245', '190306092802448', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '姚玉琴', '41');
INSERT INTO `bestop_orderdata` VALUES ('246', '190306092956091', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '高建平', '930');
INSERT INTO `bestop_orderdata` VALUES ('247', '190306093017321', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '李建琴', '940');
INSERT INTO `bestop_orderdata` VALUES ('248', '190306093400008', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '孙亚敏', '38');
INSERT INTO `bestop_orderdata` VALUES ('249', '190306093400008', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '孙亚敏', '38');
INSERT INTO `bestop_orderdata` VALUES ('250', '190306093629185', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '甄玉芳', '994');
INSERT INTO `bestop_orderdata` VALUES ('251', '190306094612066', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '陈琴萍', '15');
INSERT INTO `bestop_orderdata` VALUES ('252', '190306094612066', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '500.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '陈琴萍', '15');
INSERT INTO `bestop_orderdata` VALUES ('253', '190306095247140', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '375.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '虞红', '34');
INSERT INTO `bestop_orderdata` VALUES ('254', '190306095247140', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '345.0', '15', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '虞红', '34');
INSERT INTO `bestop_orderdata` VALUES ('255', '190306095702370', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '张月娥', '1233');
INSERT INTO `bestop_orderdata` VALUES ('256', '190306095741649', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '张月娥', '1233');
INSERT INTO `bestop_orderdata` VALUES ('257', '190306100805366', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '57.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '朱春霞', '787');
INSERT INTO `bestop_orderdata` VALUES ('258', '190306100805366', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '46.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '朱春霞', '787');
INSERT INTO `bestop_orderdata` VALUES ('259', '190306101022502', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '朱春霞', '787');
INSERT INTO `bestop_orderdata` VALUES ('260', '190306102046126', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '100.0', '4', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '边末珍', '39');
INSERT INTO `bestop_orderdata` VALUES ('261', '190306102207207', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '138.0', '6', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '边末珍', '39');
INSERT INTO `bestop_orderdata` VALUES ('262', '190306104217228', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '李敬敬', '957');
INSERT INTO `bestop_orderdata` VALUES ('263', '190306104217228', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '李敬敬', '957');
INSERT INTO `bestop_orderdata` VALUES ('264', '190306111023699', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '高珊红', '423');
INSERT INTO `bestop_orderdata` VALUES ('265', '190306111948212', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '高珊红', '423');
INSERT INTO `bestop_orderdata` VALUES ('266', '190306112058701', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '高珊红', '423');
INSERT INTO `bestop_orderdata` VALUES ('267', '190306112210066', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '高珊红', '423');
INSERT INTO `bestop_orderdata` VALUES ('268', '190306112259531', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '高珊红', '423');
INSERT INTO `bestop_orderdata` VALUES ('269', '190306112408985', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '倪克平', '184');
INSERT INTO `bestop_orderdata` VALUES ('270', '190306115724945', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '100.0', '4', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '夏红', '933');
INSERT INTO `bestop_orderdata` VALUES ('271', '190306120235360', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '夏红', '933');
INSERT INTO `bestop_orderdata` VALUES ('272', '190306123132120', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '黄维维', '947');
INSERT INTO `bestop_orderdata` VALUES ('273', '190306123132120', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '黄维维', '947');
INSERT INTO `bestop_orderdata` VALUES ('274', '190306123340977', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '张贤丽', '1033');
INSERT INTO `bestop_orderdata` VALUES ('275', '190306123340977', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '张贤丽', '1033');
INSERT INTO `bestop_orderdata` VALUES ('276', '190306123933957', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '沈玥沄', '1185');
INSERT INTO `bestop_orderdata` VALUES ('277', '190306123933957', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '沈玥沄', '1185');
INSERT INTO `bestop_orderdata` VALUES ('278', '190306124112086', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '38.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '资平花', '942');
INSERT INTO `bestop_orderdata` VALUES ('279', '190306125955894', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '23.0', '1', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '陈玉禄', '944');
INSERT INTO `bestop_orderdata` VALUES ('280', '190306130050925', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '50.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '陈玉禄', '944');
INSERT INTO `bestop_orderdata` VALUES ('281', '190306140058100', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '希望', '56', '朱丹', '289');
INSERT INTO `bestop_orderdata` VALUES ('282', '190306140429121', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '顾宏伟', '1212');
INSERT INTO `bestop_orderdata` VALUES ('283', '190306140429121', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '辉煌一部', '69', '顾宏伟', '1212');
INSERT INTO `bestop_orderdata` VALUES ('284', '190306143749673', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '孙美娟', '869');
INSERT INTO `bestop_orderdata` VALUES ('285', '190306144521864', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '孙美娟', '869');
INSERT INTO `bestop_orderdata` VALUES ('286', '190306151921364', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '孙美娟', '869');
INSERT INTO `bestop_orderdata` VALUES ('287', '190306153045561', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '张磊', '1172');
INSERT INTO `bestop_orderdata` VALUES ('288', '190306153113198', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '张磊', '1172');
INSERT INTO `bestop_orderdata` VALUES ('289', '190306155306268', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '亮剑二部', '67', '郭丽品', '1091');
INSERT INTO `bestop_orderdata` VALUES ('290', '190306171247266', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '190.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '凌云', '65', '管延红', '1058');
INSERT INTO `bestop_orderdata` VALUES ('291', '190306174802459', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '100.0', '4', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '肖丽君', '222');
INSERT INTO `bestop_orderdata` VALUES ('292', '190306174852506', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '69.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '朝阳', '73', '肖丽君', '222');
INSERT INTO `bestop_orderdata` VALUES ('293', '190306190805150', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '115.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '姚丽英', '83');
INSERT INTO `bestop_orderdata` VALUES ('294', '190306190805150', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '38.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '姚丽英', '83');
INSERT INTO `bestop_orderdata` VALUES ('295', '190306191017169', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '57.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '姚丽英', '83');
INSERT INTO `bestop_orderdata` VALUES ('296', '190306202745589', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '钱秀亚', '32');
INSERT INTO `bestop_orderdata` VALUES ('297', '190306204115851', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '50.0', '2', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '黄新玉', '992');
INSERT INTO `bestop_orderdata` VALUES ('298', '190306204349020', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '雄鹰', '55', '钱秀亚', '32');
INSERT INTO `bestop_orderdata` VALUES ('299', '190306210214442', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '57.0', '3', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '天一', '57', '黄新玉', '992');
INSERT INTO `bestop_orderdata` VALUES ('300', '190306211114511', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '228.0', '12', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双联一部', '58', '江彩英', '130');
INSERT INTO `bestop_orderdata` VALUES ('301', '190306211831884', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '超越', '74', '平惠波', '362');
INSERT INTO `bestop_orderdata` VALUES ('302', '190306222045889', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '230.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '龚静红', '53');
INSERT INTO `bestop_orderdata` VALUES ('303', '190306222045889', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '125.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '龚静红', '53');
INSERT INTO `bestop_orderdata` VALUES ('304', '190306222045889', '97', '44', '信源 淘米盆三件套', '', 'img1/20190301/5c792c2787474.png', '19.0', '0.0', '95.0', '5', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '前进', '64', '龚静红', '53');
INSERT INTO `bestop_orderdata` VALUES ('305', '190308132455598', '96', '43', '古风食器四碗套装', '', 'img1/20190301/5c792e02ef2f4.png', '23.0', '0.0', '460.0', '20', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双成一部', '60', '张莉', '95');
INSERT INTO `bestop_orderdata` VALUES ('306', '190308135702365', '100', '47', '信源复合钢奶锅', '', 'img1/20190305/5c7e128d22218.png', '25.0', '0.0', '250.0', '10', '0', null, null, null, '江苏', '无锡', '国寿惠山支公司', '双成一部', '60', '张莉', '95');
INSERT INTO `bestop_payment` VALUES ('1', '余额支付', 'balance', '使用帐户余额支付，只有会员才能使用。', '', '', '0', '0');
INSERT INTO `bestop_payment` VALUES ('2', '支付宝', 'alipay', '即时到帐接口，买家交易金额直接转入卖家支付宝账户。', 'a:5:{s:10:\"alipay_pid\";a:2:{s:4:\"name\";s:18:\"合作者身份Pid\";s:4:\"type\";s:4:\"text\";}s:10:\"alipay_key\";a:2:{s:4:\"name\";s:18:\"安全校验码Key\";s:4:\"type\";s:4:\"text\";}s:12:\"alipay_appid\";a:2:{s:4:\"name\";s:20:\"支付宝应用APPid\";s:4:\"type\";s:4:\"text\";}s:17:\"alipay_public_key\";a:2:{s:4:\"name\";s:15:\"支付宝公钥\";s:4:\"type\";s:8:\"textarea\";}s:21:\"alipay_my_private_key\";a:2:{s:4:\"name\";s:15:\"开发者私钥\";s:4:\"type\";s:8:\"textarea\";}}', 'a:5:{s:10:\"alipay_pid\";s:16:\"2088021585845716\";s:10:\"alipay_key\";s:32:\"qw18tlu605zdia5nfro1uhn8xpas5x1t\";s:12:\"alipay_appid\";s:0:\"\";s:17:\"alipay_public_key\";s:0:\"\";s:21:\"alipay_my_private_key\";s:0:\"\";}', '0', '0');
INSERT INTO `bestop_payment` VALUES ('3', '微信支付', 'wechat', '用户使用微信扫码支付', 'a:3:{s:12:\"wechat_appid\";a:2:{s:4:\"name\";s:14:\"开发者AppID\";s:4:\"type\";s:4:\"text\";}s:12:\"wechat_mchid\";a:2:{s:4:\"name\";s:9:\"商户号\";s:4:\"type\";s:4:\"text\";}s:10:\"wechat_key\";a:2:{s:4:\"name\";s:9:\"API密钥\";s:4:\"type\";s:4:\"text\";}}', 'a:3:{s:12:\"wechat_appid\";s:18:\"wx8b026db911dcd71c\";s:12:\"wechat_mchid\";s:10:\"1491856222\";s:10:\"wechat_key\";s:32:\"ba77d3bc9cd557deb0f2338abc114153\";}', '0', '1');
INSERT INTO `bestop_payment` VALUES ('4', '转账汇款', 'bank', '通过线下汇款方式支付，汇款帐号：建设银行 621700254000005xxxx 刘某某', 'a:1:{s:9:\"bank_text\";a:2:{s:4:\"name\";s:12:\"收款信息\";s:4:\"type\";s:8:\"textarea\";}}', 'a:1:{s:9:\"bank_text\";s:168:\"请将款项汇款至以下账户：\r\n建设银行 621700254000005xxxx 刘某某\r\n工商银行 621700254000005xxxx 刘某某\r\n农业银行 621700254000005xxxx 刘某某\";}', '0', '0');
INSERT INTO `bestop_payment` VALUES ('5', '货到付款', 'cod', '送货上门后再收款，支持现金、POS机刷卡、支票支付', '', '', '0', '0');
INSERT INTO `bestop_prodata` VALUES ('95', '42', '', '', '', '0.1', '99984', '1');
INSERT INTO `bestop_prodata` VALUES ('96', '43', '', '', '', '23.0', '9455', '1');
INSERT INTO `bestop_prodata` VALUES ('97', '44', '', '', '', '19.0', '9272', '1');
INSERT INTO `bestop_prodata` VALUES ('100', '47', '', '', '', '25.0', '713', '1');
INSERT INTO `bestop_prodata` VALUES ('101', '48', '', '', '', '122.0', '12', '1');
INSERT INTO `bestop_product` VALUES ('42', '吉宴五谷杂粮', null, null, 'img1/20190227/5c762da1c4cd4.png', 'img1/20190227/5c762da1c4cd4.png$$$$$$', '<p style=\"line-height: 24px;margin-top: 0;margin-bottom: 0;margin-left: 0in;direction: ltr;unicode-bidi: embed\"><span style=\"font-size:32px;font-family:黑体;color:red;font-weight:bold\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong><span style=\"color: red; font-weight: bold; font-size: 24px; font-family: 宋体, SimSun;\">吉宴 五谷杂粮</span></strong></span></p><p style=\"line-height: 24px;margin-top: 0;margin-bottom: 0;margin-left: 0in;direction: ltr;unicode-bidi: embed\"><span style=\"font-size:32px;font-family:黑体;color:red;font-weight:bold\"><img src=\"/ueditor/php/upload/image/20190227/1551248841130536.png\" title=\"1551248841130536.png\" alt=\"图片015.png\"/>&nbsp;</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; line-height: 1.75em;\"><span style=\"color:#ff0000;font-family:黑体\"><span style=\"font-family: 宋体, SimSun; font-size: 16px; color: rgb(0, 0, 0);\"><strong>配置：</strong></span></span></p><p style=\"margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; direction: ltr; unicode-bidi: embed; word-break: normal; line-height: 1.75em;\"><span style=\"font-family: 宋体; font-size: 16px;\">卡宴高粱米200g*1&nbsp; 卡宴白豌豆200g*1</span></p><p style=\"margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; direction: ltr; unicode-bidi: embed; word-break: normal; line-height: 1.75em;\"><span style=\"font-family: 宋体; font-size: 16px;\">卡宴玉米糁200g*1&nbsp; 卡宴麦仁米200g*1</span></p><p style=\"margin-top: 0pt; margin-bottom: 0pt; margin-left: 0in; direction: ltr; unicode-bidi: embed; word-break: normal; line-height: 1.75em;\"><span style=\"font-family: 宋体; font-size: 16px;\">卡宴江米200g*1</span></p><p style=\"line-height: 1.75em;\"><span style=\"font-family: 宋体; font-weight: bold; font-size: 16px;\">净重：1000g</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; line-height: 1.75em;\"><span style=\"color: red; font-weight: bold; font-family: 宋体, SimSun; font-size: 16px;\">&nbsp; </span> <br/></p><p><br/></p>', null, null, null, null, null, '1551248988', '1551357530', null, null, null, null, null, '1', '50', null, null, '0.10', '99984', '6', '0', '', '0.00', 'a:1:{i:53;a:2:{s:2:\"id\";s:2:\"53\";s:4:\"name\";s:15:\"银保营业部\";}}', '$$$53$$$');
INSERT INTO `bestop_product` VALUES ('43', '古风食器四碗套装', null, null, 'img1/20190301/5c792e02ef2f4.png', 'img1/20190301/5c792e02ef2f4.png$$$$$$|||img1/20190301/5c792ec50aab4.png$$$$$$', '<p style=\"margin-top: 0px; margin-bottom: 0px; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline;\"><strong><span style=\"font-size: 32px; font-family: 宋体; color: red;\">&nbsp; &nbsp; &nbsp; &nbsp; 古风食器 四碗套装</span></strong><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; text-align: left; direction: ltr; unicode-bidi: embed; vertical-align: baseline;\"><strong><span style=\"font-size: 32px; font-family: 宋体; color: red;\"><img src=\"/ueditor/php/upload/image/20190301/1551445525774830.png\" title=\"1551445525774830.png\" alt=\"图片018.png\"/></span></strong></p><p style=\"text-align: left;\"><img src=\"/ueditor/php/upload/image/20190301/1551444528641646.png\" title=\"1551444528641646.png\" alt=\"图片017.png\" width=\"514\" height=\"290\" style=\"width: 514px; height: 290px;\"/></p><p style=\"text-align: center;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; text-align: left; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">材&nbsp;&nbsp;&nbsp;&nbsp; 质</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：高温雪花瓷</span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; text-align: left; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">组&nbsp;&nbsp;&nbsp;&nbsp; 建</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：5寸手彩水纹螺纹碗4个</span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; text-align: left; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">产品 尺寸</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：碗直径12.5cm、高度6.5cm</span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; text-align: left; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">包装 尺寸</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：29*29*7.5cm</span></span></p><p><br/></p><p><br/></p>', null, null, null, null, null, '1551443947', '1552402886', null, null, null, null, null, '1', '50', null, null, '23.00', '9455', '503', '0', '', '0.00', 'a:1:{i:53;a:2:{s:2:\"id\";s:2:\"53\";s:4:\"name\";s:15:\"银保营业部\";}}', '$$$53$$$');
INSERT INTO `bestop_product` VALUES ('44', '信源 淘米盆三件套', null, null, 'img1/20190301/5c792c2787474.png', 'img1/20190301/5c792c2787474.png$$$$$$', '<p><span style=\"color: rgb(255, 0, 0); font-family: 宋体, SimSun; font-size: 24px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><strong style=\"color: rgb(255, 0, 0); font-family: 宋体, SimSun; font-size: 24px; text-align: center;\">信源 淘米盆三件套</strong></p><p><span style=\"font-family: 宋体, SimSun; font-size: 24px; color: rgb(255, 0, 0);\"><br/></span></p><p><span style=\"font-family: 宋体, SimSun; font-size: 24px; color: rgb(255, 0, 0);\"><img src=\"/ueditor/php/upload/image/20190301/1551445101123875.png\" title=\"1551445101123875.png\" alt=\"图片019.png\"/></span></p><p><span style=\"font-family: 宋体, SimSun; font-size: 24px; color: rgb(255, 0, 0);\"></span></p><p style=\"line-height: 150%;margin-top: 0;margin-bottom: 0;margin-left: 0in;direction: ltr;unicode-bidi: embed\"><span style=\"font-size:19px;font-family:宋体;color:#404040;font-weight:bold\"><br/></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">产品规格</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：<span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">24-26-28CM</span></span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-size: 16px; font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">产品组件</span><span style=\"font-size: 16px; font-family: 宋体; color: rgb(64, 64, 64);\">：<span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-size: 14px;\">淘米盆+和面盆+果蔬盆</span></span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">产品材质</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">优质不锈钢</span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; line-height: 2em;\"><span style=\"font-size: 16px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">包装方式</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：0PP袋+手提彩盒</span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; direction: ltr; unicode-bidi: embed; line-height: 2em;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold; font-size: 16px;\">功能特点：</span></p><p style=\"line-height: 2em;\"><span style=\"font-size: 14px;\"><span style=\"font-size: 14px; font-family: Arial;\">•</span><span style=\"font-size: 16px; font-family: 宋体; color: rgb(64, 64, 64);\">淘米盆：精工过滤孔，沥水顺畅，淘米洗菜更快速。</span> <span style=\"font-size: 14px; font-family: Arial;\">•</span><span style=\"font-size: 16px; font-family: 宋体; color: rgb(64, 64, 64);\">和面盆：盆壁鱼鳞形状凹凸设计，和面时，面粉不会黏在盆子上</span> <span style=\"font-size: 14px; font-family: Arial;\">•</span><span style=\"font-size: 16px; font-family: 宋体; color: rgb(64, 64, 64);\">果蔬盆：优美的曲线设计，装菜、水果、肉类等，实用性超广泛</span> &nbsp;<span style=\"font-size: 14px; font-family: Arial;\">•</span><span style=\"font-size: 16px; font-family: 宋体; color: rgb(64, 64, 64);\">三位一体，设计独具匠心，盆盆相套，易于叠放，更加节省空间</span></span></p><p><span style=\"font-family: 宋体, SimSun; font-size: 24px; color: rgb(255, 0, 0);\"><br/></span><br/></p>', null, null, null, null, null, '1551445298', '1552402780', null, null, null, null, null, '1', '50', null, null, '19.00', '9272', '639', '0', '', '0.00', 'a:1:{i:53;a:2:{s:2:\"id\";s:2:\"53\";s:4:\"name\";s:15:\"银保营业部\";}}', '$$$53$$$');
INSERT INTO `bestop_product` VALUES ('47', '信源复合钢奶锅', null, null, 'img1/20190305/5c7e128d22218.png', 'img1/20190305/5c7e128d22218.png$$$$$$', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong><span style=\"color: rgb(255, 0, 0); font-size: 24px;\">信源复合钢奶锅</span></strong></p><p><strong><span style=\"color: rgb(255, 0, 0); font-size: 24px;\"><br/></span></strong></p><p><img src=\"/ueditor/php/upload/image/20190305/1551766233200226.png\" title=\"1551766233200226.png\" alt=\"图片029.png\"/></p><p><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; line-height: 24px; direction: ltr; unicode-bidi: embed;\"><span style=\"color: rgb(64, 64, 64); font-family: 宋体; font-size: 14px; font-weight: bold;\">产品组件</span><span style=\"color: rgb(64, 64, 64); font-family: 宋体; font-size: 14px;\">：汤锅+玻璃盖</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; line-height: 24px; direction: ltr; unicode-bidi: embed;\"><span style=\"font-size: 14px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">产品规格</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：18CM</span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; line-height: 24px; direction: ltr; unicode-bidi: embed;\"><span style=\"font-size: 14px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">产品材质</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：优质不锈钢</span></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; margin-left: 0in; line-height: 24px; direction: ltr; unicode-bidi: embed;\"><span style=\"font-size: 14px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-weight: bold;\">包装方式</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">：0PP袋+手提彩盒</span></span></p><p style=\"line-height: 150%;margin-top: 0;margin-bottom: 0;margin-left: 0in;direction: ltr;unicode-bidi: embed\"><span style=\"color: rgb(64, 64, 64); font-family: 微软雅黑; font-size: 14px; font-weight: bold;\">功能特点：</span></p><p><span style=\"font-size: 10px;\"><span style=\"font-family: Arial;\">•</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-size: 12px;\">采用国际标准不锈钢板材精工制作，拉丝砂光工艺，尽显尊贵档次。</span>&nbsp;</span></p><p><span style=\"font-size: 10px;\"><span style=\"font-size: 14px; font-family: Arial;\">•</span><span style=\"font-size: 12px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">一锅多用，煮牛奶，熬粥，煮面，煮甜品，煲汤，不在话下</span>&nbsp;</span></span></p><p><span style=\"font-size: 10px;\"><span style=\"font-size: 14px; font-family: Arial;\">•</span><span style=\"font-size: 12px;\"><span style=\"font-family: 宋体; color: rgb(64, 64, 64);\">复合三层钢加厚锅底，导热均匀，高效节能，上乘品质。</span>&nbsp;</span></span></p><p><span style=\"font-size: 10px;\"><span style=\"font-size: 14px; font-family: Arial;\">•</span><span style=\"font-family: 宋体; color: rgb(64, 64, 64); font-size: 12px;\">兼容多种炉具，可用于燃气炉，电磁炉、电陶炉、光波炉。</span></span></p><p><br/></p>', null, null, null, null, null, '1551766474', '1552402767', null, null, null, null, null, '1', '50', null, null, '25.00', '713', '263', '0', '', '0.00', 'a:1:{i:53;a:2:{s:2:\"id\";s:2:\"53\";s:4:\"name\";s:15:\"银保营业部\";}}', '$$$53$$$');
INSERT INTO `bestop_product` VALUES ('48', '11212', null, null, '', '', '', null, null, null, null, null, '1553150907', '1553152776', null, null, null, null, null, '2', '50', null, null, '122.00', '12', '0', '0', '', '0.00', 'a:20:{i:54;a:2:{s:2:\"id\";s:2:\"54\";s:4:\"name\";s:6:\"雪狼\";}i:55;a:2:{s:2:\"id\";s:2:\"55\";s:4:\"name\";s:6:\"雄鹰\";}i:56;a:2:{s:2:\"id\";s:2:\"56\";s:4:\"name\";s:6:\"希望\";}i:57;a:2:{s:2:\"id\";s:2:\"57\";s:4:\"name\";s:6:\"天一\";}i:58;a:2:{s:2:\"id\";s:2:\"58\";s:4:\"name\";s:12:\"双联一部\";}i:59;a:2:{s:2:\"id\";s:2:\"59\";s:4:\"name\";s:12:\"双联二部\";}i:60;a:2:{s:2:\"id\";s:2:\"60\";s:4:\"name\";s:12:\"双成一部\";}i:61;a:2:{s:2:\"id\";s:2:\"61\";s:4:\"name\";s:12:\"双成五部\";}i:62;a:2:{s:2:\"id\";s:2:\"62\";s:4:\"name\";s:12:\"双成三部\";}i:63;a:2:{s:2:\"id\";s:2:\"63\";s:4:\"name\";s:12:\"双成二部\";}i:64;a:2:{s:2:\"id\";s:2:\"64\";s:4:\"name\";s:6:\"前进\";}i:65;a:2:{s:2:\"id\";s:2:\"65\";s:4:\"name\";s:6:\"凌云\";}i:66;a:2:{s:2:\"id\";s:2:\"66\";s:4:\"name\";s:12:\"亮剑一部\";}i:67;a:2:{s:2:\"id\";s:2:\"67\";s:4:\"name\";s:12:\"亮剑二部\";}i:68;a:2:{s:2:\"id\";s:2:\"68\";s:4:\"name\";s:6:\"蓝海\";}i:69;a:2:{s:2:\"id\";s:2:\"69\";s:4:\"name\";s:12:\"辉煌一部\";}i:70;a:2:{s:2:\"id\";s:2:\"70\";s:4:\"name\";s:12:\"辉煌二部\";}i:71;a:2:{s:2:\"id\";s:2:\"71\";s:4:\"name\";s:6:\"飞扬\";}i:73;a:2:{s:2:\"id\";s:2:\"73\";s:4:\"name\";s:6:\"朝阳\";}i:74;a:2:{s:2:\"id\";s:2:\"74\";s:4:\"name\";s:6:\"超越\";}}', '$$$54$$$55$$$56$$$57$$$58$$$59$$$60$$$61$$$62$$$63$$$64$$$65$$$66$$$67$$$68$$$69$$$70$$$71$$$73$$$74$$$');
INSERT INTO `bestop_question_type` VALUES ('1', '单选', '1', null, null, '1', '1');
INSERT INTO `bestop_question_type` VALUES ('2', '多选', '1', null, null, '1', '1');
INSERT INTO `bestop_question_type` VALUES ('3', '单行文本', '1', '1', '1', '1', null);
INSERT INTO `bestop_question_type` VALUES ('5', '填空', '1', '1', '1', '1', null);
INSERT INTO `bestop_question_type` VALUES ('6', '多行文本', '1', null, null, '1', null);
INSERT INTO `bestop_question_type` VALUES ('8', '日期时间', '1', '1', '1', '1', null);
INSERT INTO `bestop_question_type` VALUES ('9', '评分', '1', '1', '1', '1', '0');
INSERT INTO `bestop_question_type` VALUES ('13', '下拉框', '1', '1', '1', '1', '1');
INSERT INTO `bestop_region` VALUES ('1', '0', '中国', '0', '2');
INSERT INTO `bestop_region` VALUES ('3415', '220', '国寿南京银保营业部', '3', '1');
INSERT INTO `bestop_region` VALUES ('3416', '222', '国寿惠山支公司', '3', '1');
INSERT INTO `bestop_region` VALUES ('16', '1', '江苏', '1', '1');
INSERT INTO `bestop_region` VALUES ('220', '16', '南京', '2', '1');
INSERT INTO `bestop_region` VALUES ('221', '16', '苏州', '2', '1');
INSERT INTO `bestop_region` VALUES ('222', '16', '无锡', '2', '1');
INSERT INTO `bestop_region` VALUES ('223', '16', '常州', '2', '1');
INSERT INTO `bestop_region` VALUES ('224', '16', '淮安', '2', '1');
INSERT INTO `bestop_region` VALUES ('225', '16', '连云港', '2', '1');
INSERT INTO `bestop_region` VALUES ('226', '16', '南通', '2', '1');
INSERT INTO `bestop_region` VALUES ('227', '16', '宿迁', '2', '1');
INSERT INTO `bestop_region` VALUES ('228', '16', '泰州', '2', '1');
INSERT INTO `bestop_region` VALUES ('229', '16', '徐州', '2', '1');
INSERT INTO `bestop_region` VALUES ('230', '16', '盐城', '2', '1');
INSERT INTO `bestop_region` VALUES ('231', '16', '扬州', '2', '1');
INSERT INTO `bestop_region` VALUES ('232', '16', '镇江', '2', '1');
INSERT INTO `bestop_region` VALUES ('3414', '220', '国寿高淳支公司', '3', '1');
INSERT INTO `bestop_role` VALUES ('2', '超级管理员', '0', '1', '超级管理员');
INSERT INTO `bestop_role` VALUES ('4', '职场管理人', '0', '1', '职场管理人');
INSERT INTO `bestop_role_user` VALUES ('2', '1');
INSERT INTO `bestop_role_user` VALUES ('4', '74');
INSERT INTO `bestop_role_user` VALUES ('4', '73');
INSERT INTO `bestop_role_user` VALUES ('4', '72');
INSERT INTO `bestop_role_user` VALUES ('4', '71');
INSERT INTO `bestop_role_user` VALUES ('4', '70');
INSERT INTO `bestop_role_user` VALUES ('4', '69');
INSERT INTO `bestop_role_user` VALUES ('4', '68');
INSERT INTO `bestop_role_user` VALUES ('4', '67');
INSERT INTO `bestop_role_user` VALUES ('4', '66');
INSERT INTO `bestop_role_user` VALUES ('4', '65');
INSERT INTO `bestop_role_user` VALUES ('4', '64');
INSERT INTO `bestop_role_user` VALUES ('4', '63');
INSERT INTO `bestop_role_user` VALUES ('4', '62');
INSERT INTO `bestop_role_user` VALUES ('4', '61');
INSERT INTO `bestop_role_user` VALUES ('4', '60');
INSERT INTO `bestop_role_user` VALUES ('4', '59');
INSERT INTO `bestop_role_user` VALUES ('4', '58');
INSERT INTO `bestop_role_user` VALUES ('4', '57');
INSERT INTO `bestop_role_user` VALUES ('4', '56');
INSERT INTO `bestop_role_user` VALUES ('4', '55');
INSERT INTO `bestop_role_user` VALUES ('4', '54');
INSERT INTO `bestop_rule` VALUES ('6', '产地', '');
INSERT INTO `bestop_rule` VALUES ('5', '颜色', '外');
INSERT INTO `bestop_rule` VALUES ('4', '尺寸', '');
INSERT INTO `bestop_ruledata` VALUES ('42', '白', '', '5', '5');
INSERT INTO `bestop_ruledata` VALUES ('41', '黑', '', '4', '5');
INSERT INTO `bestop_ruledata` VALUES ('32', '美国', '', '2', '6');
INSERT INTO `bestop_ruledata` VALUES ('40', '蓝', '', '3', '5');
INSERT INTO `bestop_ruledata` VALUES ('39', '黄', '', '2', '5');
INSERT INTO `bestop_ruledata` VALUES ('38', '红', '', '1', '5');
INSERT INTO `bestop_ruledata` VALUES ('23', '150*150', '', '3', '4');
INSERT INTO `bestop_ruledata` VALUES ('22', '120*120', '', '2', '4');
INSERT INTO `bestop_ruledata` VALUES ('21', '100*100', '', '1', '4');
INSERT INTO `bestop_ruledata` VALUES ('31', '中国', '', '1', '6');
INSERT INTO `bestop_wenjuan` VALUES ('6', '大学生职业生涯规划调查问卷', '/img1/20190319/5c90a24a091d8.jpg', 'color: #19a8ee;', 'color: #19a8ee;font-weight:bold;font-size:12px;', 'color: #fbb800;font-size:28px;', 'color: #e4570d;font-size:12px;', 'color: red;font-size:12px;', '                大学生的就业一直是大家非常关注的问题，为研究当前大学生对职业生涯规划的了解及职业生涯规划现状，帮助大学生真实的了解自己，更明确就业时需要努力的方向。我们特设此卷，请大家认真填写，非常感谢您的支持。            ', '                                该问卷不记名，调查内容不会影响到个人隐私', '1552406400', '1553875200', '1553074086', '0', '江苏', '南京', '国寿南京银保营业部', null);
INSERT INTO `bestop_wenjuan` VALUES ('7', '大学生职业生涯规划调查问卷_复制', '/img1/20190319/5c90a24a091d8.jpg', 'color: #19a8ee;', 'color: #19a8ee;font-weight:bold;font-size:12px;', 'color: #fbb800;font-size:28px;', 'color: #e4570d;font-size:12px;', 'color: red;font-size:12px;', '大学生的就业一直是大家非常关注的问题，为研究当前大学生对职业生涯规划的了解及职业生涯规划现状，帮助大学生真实的了解自己，更明确就业时需要努力的方向。我们特设此卷，请大家认真填写，非常感谢您的支持。            ', '该问卷不记名，调查内容不会影响到个人隐私', '1552406400', '1567094400', '1553131844', '1', '江苏', '南京', '国寿高淳支公司', null);
INSERT INTO `bestop_wenjuan` VALUES ('11', '333', '', '', '', '', '', '', '232', '232', '1554825600', '1555084800', '1554104403', '0', null, null, null, null);
INSERT INTO `bestop_wenjuan` VALUES ('12', '大学生职业生涯规划调查问卷_复制_复制', '/img1/20190319/5c90a24a091d8.jpg', 'color: #19a8ee;', 'color: #19a8ee;font-weight:bold;font-size:12px;', 'color: #fbb800;font-size:28px;', 'color: #e4570d;font-size:12px;', 'color: red;font-size:12px;', '大学生的就业一直是大家非常关注的问题，为研究当前大学生对职业生涯规划的了解及职业生涯规划现状，帮助大学生真实的了解自己，更明确就业时需要努力的方向。我们特设此卷，请大家认真填写，非常感谢您的支持。            ', '该问卷不记名，调查内容不会影响到个人隐私', '1552406400', '1558713600', '1554104445', '1', '江苏', '南京', '国寿南京银保营业部', '232323231131');
INSERT INTO `bestop_wenjuan` VALUES ('13', '大学生职业生涯规划调查问卷_复制_复制_复制', '/img1/20190319/5c90a24a091d8.jpg', 'color: #19a8ee;', 'color: #19a8ee;font-weight:bold;font-size:12px;', 'color: #fbb800;font-size:28px;', 'color: #e4570d;font-size:12px;', 'color: red;font-size:12px;', '大学生的就业一直是大家非常关注的问题，为研究当前大学生对职业生涯规划的了解及职业生涯规划现状，帮助大学生真实的了解自己，更明确就业时需要努力的方向。我们特设此卷，请大家认真填写，非常感谢您的支持。            ', '该问卷不记名，调查内容不会影响到个人隐私', '1552406400', '1558713600', '1554965565', '0', '江苏', '南京', '国寿南京银保营业部', null);
INSERT INTO `bestop_wenjuan_answer` VALUES ('5', '1294', '0', '73', '朝阳', '6', 'a:12:{i:20;s:6:\"大二\";i:21;s:3:\"女\";i:22;s:4:\"deee\";i:23;s:6:\"同学\";i:24;s:27:\"好家家爱数据就就业\";i:25;s:5:\"derer\";i:26;s:6:\"ererer\";i:27;s:6:\"ererer\";i:28;s:1:\"3\";i:30;s:10:\"8000以上\";i:32;s:10:\"2019-03-22\";i:31;s:5:\"ewewe\";}', '1553148849', '15152231721', 'chenshanshan', null, '张加玲', null, null, null, null, null, null, '江苏', '无锡', '国寿惠山支公司', null, null, null, null, null, null);
INSERT INTO `bestop_wenjuan_answer` VALUES ('6', '444', '刘日彬', '60', '双成一部', '6', 'a:12:{i:20;s:6:\"大一\";i:21;s:3:\"女\";i:22;s:3:\"ddd\";i:23;s:6:\"网络\";i:24;s:27:\"无所谓阿加莎假按揭\";i:25;s:4:\"wqwe\";i:26;s:5:\"wewew\";i:27;s:5:\"sdswe\";i:28;s:1:\"3\";i:30;s:9:\"5000~8000\";i:32;s:10:\"2019-03-19\";i:31;s:6:\"sdwewe\";}', '1553149192', '15152231721', 'chenshanshan', 'dde', '刘日彬', null, null, null, null, null, null, '江苏', '无锡', '国寿惠山支公司', null, null, null, null, null, null);
INSERT INTO `bestop_wenjuan_answer` VALUES ('7', '444', '刘日彬', '60', '双成一部', '7', 'a:12:{i:34;s:6:\"大一\";i:35;s:3:\"男\";i:36;s:5:\"dsdwd\";i:37;s:6:\"网络\";i:38;s:27:\"无所谓阿加莎假按揭\";i:39;s:4:\"sewe\";i:40;s:5:\"ewewe\";i:41;s:4:\"wewe\";i:42;s:1:\"5\";i:44;s:9:\"5000~8000\";i:45;s:10:\"2019-03-11\";i:46;s:6:\"wewewe\";}', '1553149305', '15152231721', 'chenshanshan', null, '刘日彬', null, null, null, null, null, null, '江苏', '无锡', '国寿惠山支公司', null, null, null, null, null, null);
INSERT INTO `bestop_wenjuan_question` VALUES ('20', '6', '1', null, '年级', '1', '大一|大二|大三|大四', '|一：学校信息', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('21', '6', '2', null, '性别', '1', '男|女', '雄兔脚扑朔,雌兔眼迷离;双兔傍地走,安能辨我是雄雌?', '2', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('22', '6', '3', null, '专业', '3', '', '闻道有先后，术业有专攻，如是而已', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('23', '6', '4', null, '（ ）决定选择现在专业的是：', '2', '自己|老师|同学|家长|网络', '《师说》大约是作者于贞元十七年至十八年（801—802），在京任国子监四门博士时所作。贞元十七年（801），辞退徐州官职，闲居洛阳传道授徒的作者，经过两次赴京调选，方于当年十月授予国子监四门博士之职。此时的作者决心借助国子监这个平台来振兴儒教、改革文坛，以实现其报国之志。', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('24', '6', '5', null, '（  ）选择现在专业的依据是：', '2', '适合自己还撒谎卡号的哈佛的|好家家爱数据就就业|随假假按揭啊机|无所谓阿加莎假按揭', '三百六十行,行行出状元 ：', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('25', '6', '6', null, '4个字形容你的优势', '5', '', '|二：个人信息', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('26', '6', '7', null, '4个字形容你的劣势', '5', '', '', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('27', '6', '8', null, '你的特长有哪些', '6', '', '人生得意须尽欢，莫使金樽空对月。 \r\n天生我材必有用，千金散尽还复来。 ', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('28', '6', '9', null, '你对自己的评分？', '9', '', '|三：自我评价', '3', '评价等级：', '【备注：满分是5分】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('30', '6', '10', null, '你的理想薪资是多少？', '13', '3000以下|3000~5000|5000~8000|8000以上', '金钱如粪土，朋友值千金', '2', '三到五年内你的目标：', '【备注：要自信哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('31', '6', '12', null, '问卷暗号是？', '5', '', '天王盖地虎，小鸡炖蘑菇', '3', '他强任他强，', '【提示：金庸】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('32', '6', '11', null, '毕业时间？', '8', '', '', '3', '拿到毕业证书的时间：', '【备注：辍学不好哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('34', '7', '1', null, '年级1', '1', '大一|大二|大三|大四', '|一：学校信息', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('35', '7', '2', null, '性别', '1', '男|女', '雄兔脚扑朔,雌兔眼迷离;双兔傍地走,安能辨我是雄雌?', '2', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('36', '7', '3', null, '专业', '3', '', '闻道有先后，术业有专攻，如是而已', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('37', '7', '4', null, '（ ）决定选择现在专业的是：', '2', '自己|老师|同学|家长|网络', '《师说》大约是作者于贞元十七年至十八年（801—802），在京任国子监四门博士时所作。贞元十七年（801），辞退徐州官职，闲居洛阳传道授徒的作者，经过两次赴京调选，方于当年十月授予国子监四门博士之职。此时的作者决心借助国子监这个平台来振兴儒教、改革文坛，以实现其报国之志。', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('38', '7', '5', null, '（  ）选择现在专业的依据是：', '2', '适合自己还撒谎卡号的哈佛的|好家家爱数据就就业|随假假按揭啊机|无所谓阿加莎假按揭', '三百六十行,行行出状元 ：', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('39', '7', '6', null, '4个字形容你的优势', '5', '', '|二：个人信息', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('40', '7', '7', null, '4个字形容你的劣势', '5', '', '', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('41', '7', '8', null, '你的特长有哪些', '6', '', '人生得意须尽欢，莫使金樽空对月。 \r\n天生我材必有用，千金散尽还复来。 ', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('42', '7', '9', null, '你对自己的评分？', '9', '', '|三：自我评价', '3', '评价等级：', '【备注：满分是5分】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('44', '7', '10', null, '你的理想薪资是多少？', '13', '3000以下|3000~5000|5000~8000|8000以上', '金钱如粪土，朋友值千金', '2', '三到五年内你的目标：', '【备注：要自信哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('45', '7', '11', null, '毕业时间？', '8', '', '', '3', '拿到毕业证书的时间：', '【备注：辍学不好哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('46', '7', '12', null, '问卷暗号是？', '5', '', '天王盖地虎，小鸡炖蘑菇', '3', '他强任他强，', '【提示：金庸】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('83', '12', '1', null, '年级1', '1', '大一|大二|大三|大四', '|一：学校信息', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('84', '12', '2', null, '性别', '1', '男|女', '雄兔脚扑朔,雌兔眼迷离;双兔傍地走,安能辨我是雄雌?', '2', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('85', '12', '3', null, '专业', '3', '', '闻道有先后，术业有专攻，如是而已', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('86', '12', '4', null, '（ ）决定选择现在专业的是：', '2', '自己|老师|同学|家长|网络', '《师说》大约是作者于贞元十七年至十八年（801—802），在京任国子监四门博士时所作。贞元十七年（801），辞退徐州官职，闲居洛阳传道授徒的作者，经过两次赴京调选，方于当年十月授予国子监四门博士之职。此时的作者决心借助国子监这个平台来振兴儒教、改革文坛，以实现其报国之志。', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('87', '12', '5', null, '（  ）选择现在专业的依据是：', '2', '适合自己还撒谎卡号的哈佛的|好家家爱数据就就业|随假假按揭啊机|无所谓阿加莎假按揭', '三百六十行,行行出状元 ：', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('88', '12', '6', null, '4个字形容你的优势', '5', '', '|二：个人信息', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('89', '12', '7', null, '4个字形容你的劣势', '5', '', '', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('90', '12', '8', null, '你的特长有哪些', '6', '', '人生得意须尽欢，莫使金樽空对月。 \r\n天生我材必有用，千金散尽还复来。 ', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('91', '12', '9', null, '你对自己的评分？', '9', '', '|三：自我评价', '3', '评价等级：', '【备注：满分是5分】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('92', '12', '10', null, '你的理想薪资是多少？', '13', '3000以下|3000~5000|5000~8000|8000以上', '金钱如粪土，朋友值千金', '2', '三到五年内你的目标：', '【备注：要自信哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('93', '12', '11', null, '毕业时间？', '8', '', '', '3', '拿到毕业证书的时间：', '【备注：辍学不好哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('94', '12', '12', null, '问卷暗号是？', '5', '', '天王盖地虎，小鸡炖蘑菇', '3', '他强任他强，', '【提示：金庸】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('95', '13', '1', null, '年级1', '1', '大一|大二|大三|大四', '|一：学校信息', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('96', '13', '2', null, '性别', '1', '男|女', '雄兔脚扑朔,雌兔眼迷离;双兔傍地走,安能辨我是雄雌?', '2', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('97', '13', '3', null, '专业', '3', '', '闻道有先后，术业有专攻，如是而已', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('98', '13', '4', null, '（ ）决定选择现在专业的是：', '2', '自己|老师|同学|家长|网络', '《师说》大约是作者于贞元十七年至十八年（801—802），在京任国子监四门博士时所作。贞元十七年（801），辞退徐州官职，闲居洛阳传道授徒的作者，经过两次赴京调选，方于当年十月授予国子监四门博士之职。此时的作者决心借助国子监这个平台来振兴儒教、改革文坛，以实现其报国之志。', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('99', '13', '5', null, '（  ）选择现在专业的依据是：', '2', '适合自己还撒谎卡号的哈佛的|好家家爱数据就就业|随假假按揭啊机|无所谓阿加莎假按揭', '三百六十行,行行出状元 ：', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('100', '13', '6', null, '4个字形容你的优势', '5', '', '|二：个人信息', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('101', '13', '7', null, '4个字形容你的劣势', '5', '', '', '1', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('102', '13', '8', null, '你的特长有哪些', '6', '', '人生得意须尽欢，莫使金樽空对月。 \r\n天生我材必有用，千金散尽还复来。 ', '3', '', '', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('103', '13', '9', null, '你对自己的评分？', '9', '', '|三：自我评价', '3', '评价等级：', '【备注：满分是5分】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('104', '13', '10', null, '你的理想薪资是多少？', '13', '3000以下|3000~5000|5000~8000|8000以上', '金钱如粪土，朋友值千金', '2', '三到五年内你的目标：', '【备注：要自信哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('105', '13', '11', null, '毕业时间？', '8', '', '', '3', '拿到毕业证书的时间：', '【备注：辍学不好哦】', null);
INSERT INTO `bestop_wenjuan_question` VALUES ('106', '13', '12', null, '问卷暗号是？', '5', '', '天王盖地虎，小鸡炖蘑菇', '3', '他强任他强，', '【提示：金庸】', null);
INSERT INTO `bestop_zc` VALUES ('53', '江苏', '南京', '国寿南京银保营业部', '营业部', '营业部', '13500000000', '银保营业部', '1551322606', '1551342171', '20');
INSERT INTO `bestop_zc` VALUES ('54', '江苏', '无锡', '国寿惠山支公司', '惠山区钱桥街道藕塘北路132号3楼', '刘晔', '18352527315', '雪狼', '1551339716', null, '1');
INSERT INTO `bestop_zc` VALUES ('55', '江苏', '无锡', '国寿惠山支公司', '惠山区洛社镇洛城大道109-201号（204）', '倪俊炜', '13961711617', '雄鹰', '1551339716', null, '2');
INSERT INTO `bestop_zc` VALUES ('52', '江苏', '南京', '国寿高淳支公司', '高淳宝塔路', '营业部', '13356789000', '营业部', '1551320884', '1551357406', '21');
INSERT INTO `bestop_zc` VALUES ('56', '江苏', '无锡', '国寿惠山支公司', '惠山区前洲街道北溪青城西路（中国银行西隔壁）', '陈婷婷', '13912361321', '希望', '1551339716', null, '3');
INSERT INTO `bestop_zc` VALUES ('57', '江苏', '无锡', '国寿惠山支公司', '惠山区长安街道绿地世纪城613号（华惠路）', '杨晓迎', '15295432162', '天一', '1551339716', null, '4');
INSERT INTO `bestop_zc` VALUES ('58', '江苏', '无锡', '国寿惠山支公司', '惠山区阳山镇胜利路24号', '华慧', '13912472765', '双联一部', '1551339716', null, '5');
INSERT INTO `bestop_zc` VALUES ('59', '江苏', '无锡', '国寿惠山支公司', '惠山区阳山镇胜利路24号', '华慧', '13912472765', '双联二部', '1551339716', null, '6');
INSERT INTO `bestop_zc` VALUES ('60', '江苏', '无锡', '国寿惠山支公司', '惠山区玉祁街道镇中路5号', '薛佳敏', '15152218555', '双成一部', '1551339716', null, '7');
INSERT INTO `bestop_zc` VALUES ('61', '江苏', '无锡', '国寿惠山支公司', '惠山区洛洲路溪秀苑商铺28号门店', '蒋梦薇', '15061897264', '双成五部', '1551339716', null, '8');
INSERT INTO `bestop_zc` VALUES ('62', '江苏', '无锡', '国寿惠山支公司', '惠山区玉祁镇汇秀苑兔八哥装饰二楼', '张萍', '13915279895', '双成三部', '1551339716', null, '9');
INSERT INTO `bestop_zc` VALUES ('63', '江苏', '无锡', '国寿惠山支公司', '惠山区玉祁街道溪秀苑南门100米', '吴海锋', '18751585975', '双成二部', '1551339716', null, '10');
INSERT INTO `bestop_zc` VALUES ('64', '江苏', '无锡', '国寿惠山支公司', '惠山区钱桥街道藕塘北路132号1楼', '张海燕', '13915261102', '前进', '1551339716', null, '11');
INSERT INTO `bestop_zc` VALUES ('65', '江苏', '无锡', '国寿惠山支公司', '惠山区洛社镇洛城大道109-201号（207）', '管延红', '18262275050', '凌云', '1551339716', null, '12');
INSERT INTO `bestop_zc` VALUES ('66', '江苏', '无锡', '国寿惠山支公司', '惠山区钱桥街道钱桥大街103号2楼', '何梅', '18762618626', '亮剑一部', '1551339716', null, '13');
INSERT INTO `bestop_zc` VALUES ('67', '江苏', '无锡', '国寿惠山支公司', '惠山区洛社镇洛城大道109-201号（205）', '范愿愿', '15895351009', '亮剑二部', '1551339716', null, '14');
INSERT INTO `bestop_zc` VALUES ('68', '江苏', '无锡', '国寿惠山支公司', '无锡市北塘大街124—128号1楼', '郁玲焱', '15852735580', '蓝海', '1551339716', null, '15');
INSERT INTO `bestop_zc` VALUES ('69', '江苏', '无锡', '国寿惠山支公司', '惠山区堰桥街道锡澄北路10号2楼', '李灵', '13921107713', '辉煌一部', '1551339716', null, '16');
INSERT INTO `bestop_zc` VALUES ('70', '江苏', '无锡', '国寿惠山支公司', '无锡市北塘大街124—128号2楼', '陈林', '15951586140', '辉煌二部', '1551339716', null, '17');
INSERT INTO `bestop_zc` VALUES ('71', '江苏', '无锡', '国寿惠山支公司', '惠山区前洲街道崇文东路130号', '李晓航', '13921154314', '飞扬', '1551339716', null, '18');
INSERT INTO `bestop_zc` VALUES ('73', '江苏', '无锡', '国寿惠山支公司', '惠山区洛社镇杨市园大街西汽车站01号二楼（杨市）', '严辛', '15061799125', '朝阳', '1551339716', '1551340716', '20');
INSERT INTO `bestop_zc` VALUES ('74', '江苏', '无锡', '国寿惠山支公司', '惠山区钱桥街道钱桥大街103号2楼', '邱戴琰', '17768337551', '超越', '1551339716', null, '21');
