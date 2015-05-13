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

 Date: 05/13/2015 14:11:33 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `user_permission`
-- ----------------------------
DROP TABLE IF EXISTS `user_permission`;
CREATE TABLE `user_permission` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_permission`
-- ----------------------------
BEGIN;
INSERT INTO `user_permission` VALUES ('1', 'search'), ('2', 'import'), ('3', 'export');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
