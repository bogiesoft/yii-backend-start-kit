/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50529
 Source Host           : localhost
 Source Database       : cth_db

 Target Server Type    : MySQL
 Target Server Version : 50529
 File Encoding         : utf-8

 Date: 05/13/2015 14:11:27 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` tinyint(1) DEFAULT '0' COMMENT '1=admin, 2=modurator',
  `active` tinyint(1) DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin@email.com', 'admin', 'f527018312300912dc6cc319e6b25dc28aa013b3', '1', '1', '2015-05-13 12:25:13', '2015-04-10 17:32:18', '2015-04-28 10:38:22'), ('9', 'test@email.com', 'test', '57e10dc349c9426bec91cad8a8e686952a1bfbd5', '2', '1', '2015-05-08 18:03:25', '2015-04-27 18:43:03', '2015-05-08 18:03:16'), ('17', 'demo@gmail.com', 'demo', 'c1b410e4e30455d36f1b0ad3c1ad340426b7cadc', '2', '1', '2015-04-28 16:15:04', '2015-04-28 15:27:36', '2015-04-28 16:14:58'), ('19', 'emailing@email.com', 'emailing', '1ec2f7628209f2a18f3e8e86d8f7329050bf1fd5', '2', '1', '2015-05-12 10:31:58', '2015-05-08 18:24:29', '2015-05-11 12:21:01'), ('20', 'demouser@email.com', 'demouser', '7ad3c8b7dff01723a72868c1015fc92d456d316f', '2', '1', null, '2015-05-13 11:01:25', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
