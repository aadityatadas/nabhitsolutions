/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : test_db_old

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 16/08/2019 15:20:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_blood_upld
-- ----------------------------
DROP TABLE IF EXISTS `tbl_blood_upld`;
CREATE TABLE `tbl_blood_upld`  (
  `blood_upld_id` int(10) NOT NULL AUTO_INCREMENT,
  `blood_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blood_upld_doc` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blood_extra_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`blood_upld_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
