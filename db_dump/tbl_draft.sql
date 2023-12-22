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

 Date: 19/06/2023 15:47:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_draft
-- ----------------------------
DROP TABLE IF EXISTS `tbl_draft`;
CREATE TABLE `tbl_draft`  (
  `id_draft_permohonan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_draft_permohonan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_input` datetime(0) NULL DEFAULT NULL,
  `status` enum('belum_diproses','perbaikan','sedang_diproses','draft_sedang_dibuat','menunggu_koreksi','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lamp_surat_permohonan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `url_data_dukung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int(10) NOT NULL,
  `jenis_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `zona_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_update` datetime(0) NULL DEFAULT NULL,
  `id_perancang` int(10) NOT NULL,
  `nama_perancang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_draft_permohonan`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 116 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_draft
-- ----------------------------
INSERT INTO `tbl_draft` VALUES (106, 'TAMBAH DRAFT RAPERDA PEMPROV NTB VX', '2023-06-09 08:49:03', 'selesai', 'file/bahan_draft_raperda/1._MHH04KU0303THN2017.pdf', '[\"file\\/bahan_draft_raperda\\/1._Peraturan-Menteri-Keuangan-Nomor-52PMK062016.pdf\",\"file\\/bahan_draft_raperda\\/1._Permenkumham_Ttg_41_Tahun_2021.pdf\"]', 9, 'raperda', 'pemprov_ntb', '2023-06-09 08:54:13', 0, 'Rara Perancang');
INSERT INTO `tbl_draft` VALUES (108, 'tambah 2 pemprov ntb', '2023-06-09 09:04:27', 'selesai', 'file/bahan_draft_raperda/2._SOP_TUSI_KEUANGAN.pdf', '[\"file\\/bahan_draft_raperda\\/1._Permenkumham_ttg_orta.pdf\"]', 9, 'raperda', 'pemprov_ntb', '2023-06-09 09:06:01', 0, 'dini ');
INSERT INTO `tbl_draft` VALUES (109, 'Tambah Draft pemkot MTRM', '2023-06-09 09:10:23', 'selesai', 'file/bahan_draft_raperda/1._MHH04KU0303THN20171.pdf', '[\"file\\/bahan_draft_raperda\\/1._Permenkumham_Nomor_27_Tahun_20191.pdf\"]', 11, 'raperda', 'pemkot_mataram', '2023-06-09 09:19:50', 0, 'ryan');
INSERT INTO `tbl_draft` VALUES (110, 'Pemkot BIMA Raperkada', '2023-06-09 14:29:10', 'selesai', 'file/bahan_draft_raperda/3._SOP_Perencanaan_dan_Pengelolaan_Aset.pdf', '[\"file\\/bahan_draft_raperda\\/3._Permenkumham_Nomor_38_Tahun_2015.pdf\",\"file\\/bahan_draft_raperda\\/50~PMK.05~2018Per.pdf\"]', 12, 'raperkada', 'pemkot_bima', '2023-06-09 14:35:41', 0, 'Fina Perancang');
INSERT INTO `tbl_draft` VALUES (111, 'coba input pemprov ntb', '2023-06-12 12:03:57', 'selesai', 'file/bahan_draft_raperda/202306071335134150.pdf', '[\"file\\/bahan_draft_raperda\\/Laporan_Evaluasi_Terhadap_Penggunaan_dan_Kondisi_perangkat_jaringan_utama_dan_nirkabel.docx_(1).pdf\",\"file\\/bahan_draft_raperda\\/Panduan_Aplikasi_Katamaran_(3).pdf\"]', 9, 'raperda', 'pemprov_ntb', '2023-06-12 12:14:56', 0, 'Rio');
INSERT INTO `tbl_draft` VALUES (112, 'IDR', '2023-06-13 14:18:53', 'selesai', 'file/bahan_draft_raperda/Surat_Penyampaian_RKT_RB_Tahun_2023_Kantor_Wilayah.pdf', '[\"file\\/bahan_draft_raperda\\/1151_-_Penyampaian_Hasil_Evaluasi_SPBE_Tahun_2022_dan_Pemberitahuan_Penyusunan_Rencana_Aksi_SPBE_(1)_(1).pdf\",\"file\\/bahan_draft_raperda\\/_Laporan_Evaluasi_Tingkat_Kematangan_Pengelolaan_Perangkat_TI.docx_(1).pdf\",\"file\\/bahan_draft_raperda\\/Dokumentasi_Kegiatan_CAT_CATAR_Hari_I_Kanwil_NTB_230612_191728.pdf\"]', 9, 'raperda', 'pemprov_ntb', '2023-06-13 15:31:51', 0, 'Fina Panduwinata');
INSERT INTO `tbl_draft` VALUES (113, 'Coba Raperda Pemkot Mataram 2', '2023-06-14 09:44:45', 'selesai', 'file/bahan_draft_raperda/Undangan_Rekon_HUKDIS_TW_II_Tahun_2023_230603_081839.pdf', '[\"file\\/bahan_draft_raperda\\/Surat_Penyampaian_RKT_RB_Tahun_2023_Kantor_Wilayah1.pdf\",\"file\\/bahan_draft_raperda\\/Undangan_Pembukaan_FMD_Petugas_Pemasyarakatan.pdf\"]', 11, 'raperda', 'pemkot_mataram', '2023-06-14 10:17:59', 0, 'Hermi Sakinna');
INSERT INTO `tbl_draft` VALUES (114, 'RAPERKADA BIMA PEMKAB', '2023-06-14 10:24:56', 'selesai', 'file/bahan_draft_raperda/_Laporan_Evaluasi_Tingkat_Kematangan_Pengelolaan_Perangkat_TI.docx_(1)1.pdf', '[\"file\\/bahan_draft_raperda\\/Buku_Pedoman_Orientasi_CPNS_KUMHAM_2022.pdf\",\"file\\/bahan_draft_raperda\\/Akte_Kelahiran_Kalila_Shezani_Iswara.pdf\"]', 20, 'raperkada', 'pemkab_bima', '2023-06-14 10:30:14', 0, 'Yanto Madya');
INSERT INTO `tbl_draft` VALUES (115, 'Pemprov NTB Raperda III', '2023-06-14 14:07:59', 'belum_diproses', 'file/bahan_draft_raperda/1._Permenkumham_57_tahun_2016_tentang_pengelolaan.pdf', '[\"file\\/bahan_draft_raperda\\/1._Permenkumham_Ttg_41_Tahun_20212.pdf\",\"file\\/bahan_draft_raperda\\/1._Peraturan-Menteri-Keuangan-Nomor-52PMK0620161.pdf\"]', 9, 'raperda', 'pemprov_ntb', '2023-06-14 15:22:32', 0, 'Rio');

SET FOREIGN_KEY_CHECKS = 1;
