/*

新增短信验证码表
Date: 2019-07-11 09:05:34
*/
CREATE TABLE `bestop_send_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `code` varchar(6) NOT NULL COMMENT '验证码',
  `type` varchar(255) DEFAULT NULL COMMENT '验证码类型',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*

活动表添加字段
Date: 2019-07-12 17:25:13
*/
ALTER TABLE `bestop_event`
  ADD COLUMN `is_draw` tinyint(1) DEFAULT 0 COMMENT '是否抽奖',
  ADD COLUMN `is_order` tinyint(1) DEFAULT 0 COMMENT '是否预约保费',
  ADD COLUMN `max_member` int(11) DEFAULT 0 COMMENT '活动限制人数';

ALTER TABLE `bestop_event`
ADD COLUMN `area`  tinyint(1) NULL DEFAULT 3 COMMENT '活动区域';


/*

添加奖品表
Date: 2019-07-13 14:08
*/
CREATE TABLE `bestop_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` int(10) DEFAULT NULL,
  `adduser` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*

添加菜单
Date: 2019-07-13 23:08
*/
INSERT INTO `bestop_menu` (`name`, `pid`, `module`, `action`, `parameter`, `quick`, `status`, `sort`) VALUES ('抽奖管理', '1', 'Award', '', NULL, NULL, '1', '12');
INSERT INTO `bestop_menu` (`name`, `pid`, `module`, `action`, `parameter`, `quick`, `status`, `sort`) VALUES ('奖品列表', '107', 'Award', 'index', NULL, NULL, '1', '1');

/*

添加活动抽奖表
Date: 2019-07-14 10:39
*/
CREATE TABLE `bestop_event_draw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) DEFAULT NULL COMMENT '活动id',
  `draw_level` varchar(255) DEFAULT NULL COMMENT '奖品等级',
  `award_id` int(11) DEFAULT NULL COMMENT '奖品id',
  `draw_num` int(11) DEFAULT NULL COMMENT '奖品数量',
  `draw_percent` int(11) DEFAULT NULL COMMENT '中奖率 0-100',
  `adduser` varchar(255) DEFAULT NULL,
  `created_at` int(10) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
添加活动中奖表
Date: 2019-07-16 21:09
*/
CREATE TABLE `bestop_prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `e_id` int(11) DEFAULT NULL COMMENT '活动id',
  `draw_id` int(11) DEFAULT NULL COMMENT '奖项id',
  `created_at` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
添加参加活动用户表
Date: 2019-07-16 21:45
*/
CREATE TABLE `bestop_event_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) DEFAULT NULL COMMENT '活动id',
  `name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `image` varchar(255) DEFAULT NULL COMMENT '头像',
  `thumb_image` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `created_at` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*

中奖列表添加字段是否禁用
Date: 2019-07-17 17:25:13
*/
ALTER TABLE `bestop_prize`
  ADD COLUMN `is_disabled`  tinyint(1) NULL DEFAULT 0 COMMENT '是否禁用';

/*

添加活动预约表
Date: 2019-07-20 10:45:13
*/
CREATE TABLE `bestop_appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) DEFAULT NULL COMMENT '活动id',
  `member_id` int(11) DEFAULT NULL COMMENT '业务员id',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `sex` varchar(255) DEFAULT NULL COMMENT '男|女',
  `room_num` varchar(255) DEFAULT NULL COMMENT '房间号',
  `created_at` int(10) DEFAULT NULL,
  `adduser` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*

活动签到表新增字段
Date: 2019-07-21 22:45:13
*/
ALTER TABLE `bestop_event_user`
ADD COLUMN `province`  varchar(255) NULL COMMENT '省' ,
ADD COLUMN `city`  varchar(255) NULL COMMENT '城市' ,
ADD COLUMN `member_id`  int(11) NULL DEFAULT 0 COMMENT '业务员_id' ,
ADD COLUMN `open_id`  varchar(255) NULL COMMENT '微信授权id',
ADD COLUMN `sex` varchar(255) DEFAULT NULL COMMENT '男|女',
ADD COLUMN `phone` varchar(11) DEFAULT NULL COMMENT '手机号';


/*

活动签到表新增字段
Date: 2019-07-25 22:03:13
*/
ALTER TABLE `bestop_event_user`
ADD COLUMN `username` varchar(255) NULL COMMENT '姓名';

/*

活动签到表新增字段
Date: 2019-07-27 17:05:13
*/
ALTER TABLE `bestop_event_user`
ADD COLUMN `apply_at` int(10) DEFAULT '0' COMMENT '同步预约时间';

/**
活动签到用户表新增字段
Date: 2019-07-28 12:10:02
 */
ALTER TABLE `bestop_event_user`
ADD COLUMN `is_appointment` tinyint(2) NULL DEFAULT 1 COMMENT '是否预约保费 1否 2是',
ADD COLUMN `appointment_money` decimal(10, 2) NULL COMMENT '预约保费',
ADD COLUMN `appointment_money_actual` decimal(10, 2) NULL COMMENT '实际预约保费';

/**
活动表新增字段
Date: 2019-08-03 15:52
 */
ALTER TABLE `bestop_event`
ADD COLUMN `areas`  varchar(255) NULL DEFAULT NULL COMMENT '分公司',
ADD COLUMN `citys`  varchar(255) NULL DEFAULT NULL COMMENT '市';

/**
新增活动统计表
Date: 2019-08-04 17:52
 */
CREATE TABLE `bestop_event_tongji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) DEFAULT NULL COMMENT '活动id',
  `zc_id` int(11) DEFAULT NULL COMMENT '职场id',
  `app_num` int(11) DEFAULT '0' COMMENT '预约人数',
  `check_num` int(11) DEFAULT '0' COMMENT '签到人数',
  `appointment_money` decimal(10,2) DEFAULT '0.00' COMMENT '预约保费',
  `appointment_money_actual` decimal(10,2) DEFAULT '0.00' COMMENT '实际预约保费',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/**
业务员表新增业务员权限字段
Date: 2019-08-11 10:15
 */
ALTER TABLE `bestop_member`
ADD COLUMN   `area_level` int(1) DEFAULT '0' COMMENT '是否有支公司权限',
ADD COLUMN   `city_level` int(1) DEFAULT '0' COMMENT '是否有市级权限';

/**
活动表添加场次别名
Date: 2019-08-27 13:31
 */
ALTER TABLE `bestop_event`
    ADD COLUMN `alias` varchar(255) NULL COMMENT '场次';


/**
业务员表添加角色权限
Date: 2019-08-30 14:58
 */
ALTER TABLE `bestop_member`
ADD COLUMN `role_level` tinyint(1) NULL DEFAULT 1 COMMENT '1职场权限 2支公司权限 3市级权限';
