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

 Date: 20/07/2019 10:17:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_eqp_mast
-- ----------------------------
DROP TABLE IF EXISTS `tbl_eqp_mast`;
CREATE TABLE `tbl_eqp_mast`  (
  `eqpid` int(10) NOT NULL,
  `eqp_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_idno` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_idno_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_srno` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_model` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_make` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_dtpur` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_dtins` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_dtins_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_wty1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_wty2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_amc1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_amc2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch3` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_psch4` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_csch1` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_csch2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_csch_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_cond` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_lic` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_lic_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_recd` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `eqp_lic_frm` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `eqp_lic_to` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`eqpid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
