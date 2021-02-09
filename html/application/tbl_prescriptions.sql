/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : test_db

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 02/04/2019 22:45:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_prescriptions
-- ----------------------------
DROP TABLE IF EXISTS `tbl_prescriptions`;
CREATE TABLE `tbl_prescriptions`  (
  `prescriptions_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_done` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `time_done` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `other_advices` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `diet_orders` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `dis_tras_advices` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`prescriptions_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_prescriptions
-- ----------------------------
INSERT INTO `tbl_prescriptions` VALUES (1, 'Aditya ', '2019-03-29', '11:11', 'OTHER ADVISED', 'DIET ORDER', 'DISCHARGE / TRANSFER ADVICE');
INSERT INTO `tbl_prescriptions` VALUES (2, 'Aditya ', '2019-03-28', '11:11', 'Time 11:11 AM OTHER ADVISED', 'DIET ORDER', 'DISCHARGE / TRANSFER ADVICE');

SET FOREIGN_KEY_CHECKS = 1;
