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
