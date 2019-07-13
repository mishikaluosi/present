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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*

活动表添加字段
Date: 2019-07-12 17:25:13
*/
ALTER TABLE `bestop_event`
  ADD COLUMN `is_draw` tinyint(1) DEFAULT 0 COMMENT '是否抽奖',
  ADD COLUMN `is_order` tinyint(1) DEFAULT 0 COMMENT '是否预约保费',
  ADD COLUMN `max_member` int(11) DEFAULT 0 COMMENT '活动限制人数';

ALTER TABLE `bestop_event`
ADD COLUMN `area`  tinyint(1) NULL DEFAULT 1 COMMENT '活动区域';


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*

添加菜单
Date: 2019-07-13 23:08
*/
INSERT INTO bestop_menu` (`name`, `pid`, `module`, `action`, `parameter`, `quick`, `status`, `sort`) VALUES ('抽奖管理', '1', 'Award', '', NULL, NULL, '1', '12');
INSERT INTO bestop_menu` (`name`, `pid`, `module`, `action`, `parameter`, `quick`, `status`, `sort`) VALUES ('奖品列表', '107', 'Award', 'index', NULL, NULL, '1', '1');
