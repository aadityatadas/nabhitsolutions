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

 Date: 20/07/2019 10:16:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_eqp_indic
-- ----------------------------
DROP TABLE IF EXISTS `tbl_eqp_indic`;
CREATE TABLE `tbl_eqp_indic`  (
  `eqp_id` int(10) NOT NULL,
  `eqpid` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_brkdwn_date` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_amcs` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_amc1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_amc2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch3` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch4` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_csch1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_csch2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_brkd` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_dtbr` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_tmbr` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_dtrp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_tmrp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_cond1` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_lic1` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_recd` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`eqp_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
