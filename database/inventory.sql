/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : inventory

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 21/03/2024 20:35:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_server
-- ----------------------------
DROP TABLE IF EXISTS `data_server`;
CREATE TABLE `data_server`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `server_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `passwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `backup_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_server
-- ----------------------------
INSERT INTO `data_server` VALUES (13, 'Promox Server', '1.1.1.1', 'Access Port : 8006', '13.24.01/2559', 'XX', 'XXX', '', '');
INSERT INTO `data_server` VALUES (16, 'Vm-Nginx', '1.1.1.2', 'OS Ubuntu', 'Vm', 'XXX', 'iuIXPKHH28XXX', '', '');

-- ----------------------------
-- Table structure for ref_permission
-- ----------------------------
DROP TABLE IF EXISTS `ref_permission`;
CREATE TABLE `ref_permission`  (
  `permission_id` int NOT NULL AUTO_INCREMENT,
  `permission_detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_permission
-- ----------------------------
INSERT INTO `ref_permission` VALUES (1, 'ผู้ดูแลระบบ');
INSERT INTO `ref_permission` VALUES (2, 'ผู้ใช้งานทั่วไป');

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `permission_id` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES (1, 'wongvian', '002170ca2ca9033044343fe4b52a7e42', 'Mr.Wongvian Wongkaso', '2');
INSERT INTO `tb_admin` VALUES (2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrator', '1');

SET FOREIGN_KEY_CHECKS = 1;
