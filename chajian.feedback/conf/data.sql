DROP TABLE IF EXISTS `pw_app_feedback`;
CREATE TABLE `pw_app_feedback` (
  `fid` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL DEFAULT '' COMMENT '留言标题',
  `usertel` varchar(255) NOT NULL COMMENT '留言电话',
  `content` mediumtext,
  `created_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;