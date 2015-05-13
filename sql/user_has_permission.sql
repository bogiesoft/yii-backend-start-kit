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

 Date: 05/13/2015 14:11:41 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `user_has_permission`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_permission`;
CREATE TABLE `user_has_permission` (
  `user_id` int(10) NOT NULL,
  `user_permission_id` tinyint(2) NOT NULL,
  PRIMARY KEY (`user_id`,`user_permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_has_permission`
-- ----------------------------
BEGIN;
INSERT INTO `user_has_permission` VALUES ('9', '1'), ('17', '1'), ('17', '2'), ('17', '3'), ('19', '1'), ('19', '2');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
