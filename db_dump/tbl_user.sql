/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : peresean

 Target Server Type    : MariaDB
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 19/06/2023 15:52:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_zona` int(10) NULL DEFAULT NULL,
  `tgl_update` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `id_zona`(`id_zona`) USING BTREE,
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `tbl_zona` (`id_zona`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'Administrator', 'administrator', 'Admin1234', 'superadmin', 0, '2023-06-19 08:59:28');
INSERT INTO `tbl_user` VALUES (2, 'Pelaksana', 'pelaksana', '123', 'pelaksana', NULL, NULL);
INSERT INTO `tbl_user` VALUES (3, 'Humas', 'humas', '1234', 'humas', NULL, NULL);
INSERT INTO `tbl_user` VALUES (8, 'Perancang', 'perancang', '1234', 'perancang', 1, NULL);
INSERT INTO `tbl_user` VALUES (9, 'Pemerintah Provinsi NTB', 'pemprov_ntb', '12345', 'pemda', 7, '2023-06-19 09:08:30');
INSERT INTO `tbl_user` VALUES (10, 'Kasub Perancang', 'kasub_perancang', '1234', 'kasub_perancang', 1, NULL);
INSERT INTO `tbl_user` VALUES (11, 'Pemerintah Kota Mataram', 'pemkot_mataram', '1234', 'pemda', 8, NULL);
INSERT INTO `tbl_user` VALUES (12, 'Pemerintah Kota Bima', 'pemkot_bima', '1234', 'pemda', 10, NULL);
INSERT INTO `tbl_user` VALUES (13, 'Pemerintah Kabupaten Sumbawa Barat', 'pemkab_sumbawa_barat', '1234', 'pemda', 13, NULL);
INSERT INTO `tbl_user` VALUES (14, 'Pemerintah Kabupaten Sumbawa', 'pemkab_sumbawa', '1234', 'pemda', 14, NULL);
INSERT INTO `tbl_user` VALUES (15, 'Pemerintah Kabupaten Lombok Utara', 'pemkab_lombok_utara', '1234', 'pemda', 17, NULL);
INSERT INTO `tbl_user` VALUES (16, 'Pemerintah Kabupaten Lombok Timur', 'pemkab_lombok_timur', '1234', 'pemda', 18, NULL);
INSERT INTO `tbl_user` VALUES (17, 'Pemerintah Kabupaten Lombok Tengah', 'pemkab_lombok_tengah', '1234', 'pemda', 19, NULL);
INSERT INTO `tbl_user` VALUES (18, 'Pemerintah Kabupaten Lombok Barat', 'pemkab_lombok_barat', '1234', 'pemda', 20, NULL);
INSERT INTO `tbl_user` VALUES (19, 'Pemerintah Kabupaten Dompu', 'pemkab_dompu', '1234', 'pemda', 21, NULL);
INSERT INTO `tbl_user` VALUES (20, 'Pemerintah Kabupaten Bima', 'pemkab_bima', '1234', 'pemda', 22, NULL);

SET FOREIGN_KEY_CHECKS = 1;
