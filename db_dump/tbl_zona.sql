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

 Date: 19/06/2023 15:48:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_zona
-- ----------------------------
DROP TABLE IF EXISTS `tbl_zona`;
CREATE TABLE `tbl_zona`  (
  `id_zona` int(10) NOT NULL AUTO_INCREMENT,
  `nama_zona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_input` datetime(0) NULL DEFAULT NULL,
  `status` enum('belum_diproses','perbaikan','draft_sedang_dibuat','menunggu_koreksi','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_panjang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `warna_background` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_zona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_zona
-- ----------------------------
INSERT INTO `tbl_zona` VALUES (0, 'superadmin', '2023-06-07 16:03:35', NULL, 'Superadmin', 'bg-gradient-purple');
INSERT INTO `tbl_zona` VALUES (1, 'kasub_perancang', '2023-06-07 16:03:35', NULL, 'Kasub Perancang', 'bg-gradient-purple');
INSERT INTO `tbl_zona` VALUES (7, 'pemprov_ntb', '2023-05-08 11:25:22', '', 'Pemerintah Provinsi NTB', 'bg-gradient-purple');
INSERT INTO `tbl_zona` VALUES (8, 'pemkot_mataram', '2023-05-08 11:25:22', '', 'Pemerintah Kota Mataram', 'bg-gradient-orange');
INSERT INTO `tbl_zona` VALUES (10, 'pemkot_bima', '2023-05-08 11:25:22', 'menunggu_koreksi', 'Pemerintah Kota Bima', 'bg-gradient-dark-blue-light');
INSERT INTO `tbl_zona` VALUES (13, 'pemkab_sumbawa_barat', '2023-05-08 11:25:22', 'belum_diproses', 'Pemerintah Kabupaten Sumbawa Barat', 'bg-gradient-red');
INSERT INTO `tbl_zona` VALUES (14, 'pemkab_sumbawa', '2023-05-08 11:25:22', 'belum_diproses', 'Pemerintah Kabupaten Sumbawa', 'bg-gradient-green');
INSERT INTO `tbl_zona` VALUES (17, 'pemkab_lombok_utara', '2023-05-08 11:25:22', 'draft_sedang_dibuat', 'Pemerintah Kabupaten Lombok Utara', 'bg-gradient-blue-inverse');
INSERT INTO `tbl_zona` VALUES (18, 'pemkab_lombok_timur', '2023-05-08 11:25:22', 'belum_diproses', 'Pemerintah Kabupaten Lombok Timur', 'bg-gradient-yellow');
INSERT INTO `tbl_zona` VALUES (19, 'pemkab_lombok_tengah', '2023-05-08 11:25:22', 'draft_sedang_dibuat', 'Pemerintah Kabupaten Lombok Tengah', 'bg-gradient-red-orange');
INSERT INTO `tbl_zona` VALUES (20, 'pemkab_lombok_barat', '2023-05-08 11:25:22', 'draft_sedang_dibuat', 'Pemerintah Kabupaten Lombok Barat', 'bg-gradient-blue-dark');
INSERT INTO `tbl_zona` VALUES (21, 'pemkab_dompu', '2023-05-08 11:25:22', 'menunggu_koreksi', 'Pemerintah Kabupaten Dompu', 'bg-gradient-red-orange');
INSERT INTO `tbl_zona` VALUES (22, 'pemkab_bima', '2023-05-08 11:25:22', 'selesai', 'Pemerintah Kabupaten Bima', 'bg-gradient-pink');

SET FOREIGN_KEY_CHECKS = 1;
