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

 Date: 20/07/2019 10:17:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_eqp_upld
-- ----------------------------
DROP TABLE IF EXISTS `tbl_eqp_upld`;
CREATE TABLE `tbl_eqp_upld`  (
  `eqp_upld_id` int(10) NOT NULL AUTO_INCREMENT,
  `eqp_id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_srno` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_upld_doc` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`eqp_upld_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
