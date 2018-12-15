-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2018 lúc 01:30 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content_group_scheduel`
--

CREATE TABLE `content_group_scheduel` (
  `id_content` int(10) UNSIGNED NOT NULL,
  `id_scheduel` int(10) UNSIGNED NOT NULL,
  `time_deadline` date NOT NULL,
  `require` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descript` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penalty` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `content_group_scheduel`
--

INSERT INTO `content_group_scheduel` (`id_content`, `id_scheduel`, `time_deadline`, `require`, `descript`, `penalty`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-10-10', 'SRS', 'Tài liệu mô tả yêu cầu phần mềm', 0.25, NULL, NULL),
(2, 1, '2018-11-10', 'SDD', 'Tài liệu thiết kế hệ thống', 0.25, NULL, NULL),
(3, 1, '2018-12-15', 'FR', 'Báo cáo tổng kết', 0.50, NULL, NULL),
(4, 1, '2018-12-10', 'CODE', 'mã nguồn sản phẩm', 1.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content_sub_scheduel`
--

CREATE TABLE `content_sub_scheduel` (
  `id_content_scheduel` int(10) UNSIGNED NOT NULL,
  `id_subject_scheduel` int(10) UNSIGNED NOT NULL,
  `require` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_deadline` date NOT NULL,
  `descript` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penalty` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `content_sub_scheduel`
--

INSERT INTO `content_sub_scheduel` (`id_content_scheduel`, `id_subject_scheduel`, `require`, `time_deadline`, `descript`, `penalty`, `created_at`, `updated_at`) VALUES
(1, 1, 'PROPOSAL', '2018-09-26', 'Tài liệu mô tả đề xuất đề tài (project proposal)', 0.25, NULL, NULL),
(2, 1, 'SRS', '2018-10-21', 'Tài liệu mô tả phân tích yêu cầu phần mềm (software requirement specifications - SRS)', 0.25, NULL, NULL),
(3, 1, 'SDD', '2018-11-18', 'Tài liệu mô tả thiết kế phần mềm (software design description - SDD)', 0.25, NULL, NULL),
(4, 1, 'TC', '2018-11-18', 'Tài liệu mô tả đặc tả kiểm thử (test cases: Bắt buộc, test scripts: Tùy chọn)', 0.25, NULL, NULL),
(5, 1, 'FR', '2018-12-29', 'Tài liệu báo cáo tổng kết kết quả thực hiện đề tài', 0.50, NULL, NULL),
(6, 1, 'STD', '2018-12-20', 'Tài liệu mô tả kết quả kiểm thử phần mềm', 0.25, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document`
--

CREATE TABLE `document` (
  `id_document` int(10) UNSIGNED NOT NULL,
  `id_group` int(10) UNSIGNED NOT NULL,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluate` double(8,2) DEFAULT NULL,
  `user_upload` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `document`
--

INSERT INTO `document` (`id_document`, `id_group`, `type`, `path`, `evaluate`, `user_upload`, `created_at`) VALUES
(1, 4, 'SRS', '20181/Khac/4/student/Software requirement specifications_final.docx', 8.00, '20152128', '2018-12-15 00:23:09'),
(4, 4, 'SDD', '20181/Khac/4/student/TongHopThietKeHT.docx', 8.00, '20152128', '2018-12-15 00:26:51'),
(5, 4, 'FR', '20181/Khac/4/student/TongHopThietKeHT(1).docx', 0.00, '20151566', '2018-12-15 00:29:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evalution_criteria`
--

CREATE TABLE `evalution_criteria` (
  `id_evalution_criteria` int(10) UNSIGNED NOT NULL,
  `id_group` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group`
--

CREATE TABLE `group` (
  `id_group` int(10) UNSIGNED NOT NULL,
  `id_subject` int(10) UNSIGNED NOT NULL,
  `id_teacher` int(10) UNSIGNED NOT NULL,
  `group_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finish_project` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group`
--

INSERT INTO `group` (`id_group`, `id_subject`, `id_teacher`, `group_name`, `project_name`, `semester`, `finish_project`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Do an', 'QLDA', '20181', 0, NULL, NULL),
(4, 2, 1, 'project1', 'Hệ thống quản lí thư viện', '20181', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_scheduel`
--

CREATE TABLE `group_scheduel` (
  `id_scheduel` int(10) UNSIGNED NOT NULL,
  `id_group` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_scheduel`
--

INSERT INTO `group_scheduel` (`id_scheduel`, `id_group`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_student`
--

CREATE TABLE `group_student` (
  `id_group_student` int(10) UNSIGNED NOT NULL,
  `id_group` int(10) UNSIGNED NOT NULL,
  `id_student` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_student`
--

INSERT INTO `group_student` (`id_group_student`, `id_group`, `id_student`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 4, 4, NULL, NULL),
(6, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2018_11_18_014903_create_user_table', 1),
(14, '2018_11_18_015838_create_student_table', 1),
(15, '2018_11_18_022555_create_teacher_table', 1),
(16, '2018_11_18_023241_create_subject_table', 1),
(17, '2018_11_18_023516_create_group_table', 1),
(18, '2018_11_18_025533_create_group_student_table', 1),
(19, '2018_11_18_030145_create_document_table', 1),
(20, '2018_11_18_031019_create_evalution_criteria_table', 1),
(21, '2018_11_18_031540_create_group_scheduel_table', 1),
(22, '2018_11_18_031858_create_content_group_scheduel_table', 1),
(23, '2018_11_18_032224_create_subject_scheduel_table', 1),
(24, '2018_11_18_032450_create_content_sub_scheduel_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id_student` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id_student`, `username`, `class`, `created_at`, `updated_at`) VALUES
(1, '20152023', 'CNTT2.01', NULL, NULL),
(2, '20152408', 'CNTT2.04', NULL, NULL),
(3, '20151566', 'CNTT2.01', NULL, NULL),
(4, '20152128', 'CNTT2.01', NULL, NULL),
(5, '20152453', 'CNTT2.01', NULL, NULL),
(6, '20152644', 'CNTT2.01', NULL, NULL),
(7, '20151589', 'CNTT2.01', NULL, NULL),
(8, '20141840', 'CNTT2.3', NULL, NULL),
(9, '20150569', NULL, NULL, NULL),
(10, '20152369', NULL, NULL, NULL),
(11, '20152416', NULL, NULL, NULL),
(12, '20154153', NULL, NULL, NULL),
(13, '20143223', NULL, NULL, NULL),
(14, '20140235', NULL, NULL, NULL),
(15, '20150838', NULL, NULL, NULL),
(16, '20152223', NULL, NULL, NULL),
(17, '20152821', NULL, NULL, NULL),
(18, '20154002', NULL, NULL, NULL),
(19, '20153245', NULL, NULL, NULL),
(20, '20144838', NULL, NULL, NULL),
(21, '20151128', NULL, NULL, NULL),
(22, '20151998', NULL, NULL, NULL),
(23, '20144282', NULL, NULL, NULL),
(24, '20153150', NULL, NULL, NULL),
(25, '20151094', NULL, NULL, NULL),
(26, '20160576', NULL, NULL, NULL),
(27, '20165081', NULL, NULL, NULL),
(28, '20155109', NULL, NULL, NULL),
(29, '20163344', NULL, NULL, NULL),
(30, '20160790', NULL, NULL, NULL),
(31, '20163834', NULL, NULL, NULL),
(32, '20143158', NULL, NULL, NULL),
(33, '20153528', NULL, NULL, NULL),
(34, '20153380', NULL, NULL, NULL),
(35, '20150755', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`id_subject`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, 'IT4421', NULL, NULL),
(2, 'Khac', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject_scheduel`
--

CREATE TABLE `subject_scheduel` (
  `id_subject_scheduel` int(10) UNSIGNED NOT NULL,
  `id_subject` int(10) UNSIGNED NOT NULL,
  `semester` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject_scheduel`
--

INSERT INTO `subject_scheduel` (`id_subject_scheduel`, `id_subject`, `semester`, `created_at`, `updated_at`) VALUES
(1, 1, '20181', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workplace` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `username`, `workplace`, `created_at`, `updated_at`) VALUES
(1, 'GV01', 'B1-702', NULL, NULL),
(2, 'GV02', 'P.702 B1', NULL, NULL),
(3, 'GV03', NULL, NULL, NULL),
(4, 'GV04', '702-B1', NULL, NULL),
(5, 'GV05', 'P.702 B1', NULL, NULL),
(6, 'GV06', 'P.604 B1', NULL, NULL),
(7, 'GV07', 'P.604 B1', NULL, NULL),
(8, 'GV08', 'P.702 B1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `position`, `full_name`, `email`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
('20140235', '$2y$10$P1n3ub4yeOSsCja7Msz2fu64Sd.I3ILkPJyE5wgfgorkUYKZ9aVGW', 1, 'Trần Nam Anh', 'anh@gmail.com', NULL, NULL, NULL, NULL),
('20141840', '$2y$10$XcpVT1eQ/Rs4CaUY8ctTcetCI6qkuMRTwicA1/t52gVplhPWfPgTy', 1, 'Ngô Quang Hòa', 'haonq@gmail.com', '0123456789', NULL, NULL, NULL),
('20143158', '$2y$10$WfYjehikQnNJBfaSWm.Zu.hXpQgJ451B/S.Q0qW0pKWTXH/N/CjH2', 1, 'Dương Trung Nghĩa', 'nghia@gmail.com', NULL, NULL, NULL, NULL),
('20143223', '$2y$10$B4E2glmJ6p09zevni9eBeOtkQOHn1It3rAAGDGi8HW.ZnsvRbr7lm', 1, 'Nguyễn Văn Ngọc', 'ngoc@gmail.com', NULL, NULL, NULL, NULL),
('20144282', '$2y$10$AXg/G9EAmPKMGgATbLGNiuqTInqQZ0f6ffrF4J32LGaYzScyryBSm', 1, 'Lê Văn Thịnh', 'thinh@gmail.com', NULL, NULL, NULL, NULL),
('20144838', '$2y$10$ZfXtB/D9zZnzaBd9UQZHuugOFN2ro6nKwxDZl27z4NexKmMC4zLwS', 1, 'Nguyễn Văn Tuân', 'tuannv@gmail.com', NULL, NULL, NULL, NULL),
('20150569', '$2y$10$zikSQYN.RAPQ6jxp.QzztOhlYVXvV5AbAM9BsB6SyY.8.pbGzk4f6', 1, 'Mai Quốc Doanh', 'doanh@gmail.com', NULL, NULL, NULL, NULL),
('20150755', '$2y$10$XEVbJvpC7QW4dCHMBtDKhOuGHQ/V8dxkrhwVY8eQzWMrXKA9LMpBq', 1, 'Nguyễn Đại Dương', 'duong@gmail.com', NULL, NULL, NULL, NULL),
('20150838', '$2y$10$6a9Rxkq8D.TUArpVEqgSkuriC.zGjdiwejCM3OJB1tuSQLqu.YGQO', 1, 'Ngô Tiến Đạt', 'dat@gmail.com', NULL, NULL, NULL, NULL),
('20151094', '$2y$10$gBSrAA/wodK0ZYP.2LHdE.MO76aR2KgyKfc9bf7QLeR9nLG/097xy', 1, 'Nguyễn Hoàng Giang', 'giang@gmail.com', NULL, NULL, NULL, NULL),
('20151128', '$2y$10$weSQQjnVKovXq034BHT8NOZ/I4R6.X/ano9KjwtmxtbVd5l8HqZP2', 1, 'Hồ Hữu Hai', 'hai@gmail.com', NULL, NULL, NULL, NULL),
('20151566', '$2y$10$WUNnLUvBUk1pGNuSfJBpIuH4cbW36QOVcT3IgusGHcqLUx7Y6py.2', 1, 'Pham Huy Hoang', 'hadinhkhoe@gmail.com', '0388446430', NULL, NULL, NULL),
('20151589', '$2y$10$ckyEZknEK0TxdpffN7kpTufQ/ozmOPrpSWit5X5dHvshlefWfVW0K', 1, 'Đào Duy Hòa', 'hoa@gmail.com', '0123456789', NULL, NULL, NULL),
('20151998', '$2y$10$f4adxNd7cTCAXlRK/pxQre5yALuIsywBVK56Qb5575i1yo085ptAi', 1, 'Nguyễn Bá Khải', 'khai@gmail.com', NULL, NULL, NULL, NULL),
('20152023', '$2y$10$Rll1MQAzcmQUxegs99z4f.6hzDP6PPaZlNiQg43REpxeo9qmp/9k.', 1, 'Ha Dinh Khoe', 'hadinhkhoe@gmail.com', '0388446430', NULL, NULL, NULL),
('20152128', '$2y$10$gGDQKJvdFyIi5lrZoO/bkuDhKLbbbeb6jjChNh22YVXS0speokkna', 1, 'Nguyen Quoc Lam', 'hadinhkhoe@gmail.com', '0388446430', 'hIRlHKSDcohFApl6VMQObEvsbgIFySvNUSYMsBEFGjSmOGiMU9605n7VE807', NULL, NULL),
('20152223', '$2y$10$3MbknBLfJ/9z52/QJaSjFuVVB32KzNLFxAk2VEooi6E8H/vG/K6nW', 1, 'Nguyễn Văn Công Linh', 'linh@gmail.com', NULL, NULL, NULL, NULL),
('20152369', '$2y$10$TN3Wu7TqxTy3PdW5J98fuOC.a0S7maD3iG6DH.Kc717z5W2fn/gOy', 1, 'Đinh Thị Ngọc Mai', 'mai@gmail.com', NULL, NULL, NULL, NULL),
('20152408', '$2y$10$BlPeUR9rZMecaEFCNwIwlOHcvN.U1J3y76.HUJZbhbg4n5TZzBOnS', 1, 'Pham Cong Manh', 'hadinhkhoe@gmail.com', '0388446430', NULL, NULL, NULL),
('20152416', '$2y$10$5SXcdh6sO/.c5BFXkSVlbOrpDT6FdD4mQbGsvN9F4obwxOwKAYRJu', 1, 'Vũ Đức Mạnh', 'manh@gmail.com', NULL, NULL, NULL, NULL),
('20152453', '$2y$10$xt2c89FUKpodj1yRG4tUgOYdXVlAF2qZCFuaDxXw1HZd4BPlT3kdC', 1, 'Nguyễn Bình Minh', 'minh@gmail.com', '0123456789', NULL, NULL, NULL),
('20152644', '$2y$10$OGcqmoAd/jZDt2yJkyjJ1OeRSlVi7b8xtyQTgyXsCjK6TASgPHhim', 1, 'Đào Văn Nghĩa', 'nghia@gmail.com', '0123456789', NULL, NULL, NULL),
('20152821', '$2y$10$VNIhRkLrs32FTp9avSOh7.RURU3hB2rt9AMCe00ccqvhUGgcgi02u', 1, 'Đinh Qúy Phiên', 'phien@gmail.com', NULL, NULL, NULL, NULL),
('20153150', '$2y$10$I4hhkftZmXirM3IyNLoEGuJGyJJ42Eo2EJtn/fAW2YqLGcNlAqUny', 1, 'Trần Văn Sang', 'sang@gmail.com', NULL, NULL, NULL, NULL),
('20153245', '$2y$10$lKqV51C/cCMFGVy.zz.X6Om8l/NpDyy66gWzT8XeDHcpQfarkMITa', 1, 'Trịnh Văn Sơn', 'son@gmail.com', NULL, NULL, NULL, NULL),
('20153380', '$2y$10$TBkaSP5GE9lFKQzL0R.V3uVVXYPoFQtkJnfbi0p9wbb5.wYlMuPdW', 1, 'Lê Trịnh Thành', 'thanh@gmail.com', NULL, NULL, NULL, NULL),
('20153528', '$2y$10$sxKIVdgIyhXaJtXPY3YFxOXeqnqsKYH26c2ID0OPD0ZozQB3e/2.K', 1, 'Nguyễn Văn Thắng', 'thang@gmail.com', NULL, NULL, NULL, NULL),
('20154002', '$2y$10$i6F/S62H93eMbJaKxGBpBe/Vf0YrbHB0wjj2rbn7skjCkeKkrH5hW', 1, 'Trần Quang Trung', 'trung@gmail.com', NULL, NULL, NULL, NULL),
('20154153', '$2y$10$RFYNi5/sHsZ5xx3JSWBLIO9M1PkxeP8b3ggvNGIrBb3YCiOwwxXr.', 1, 'Vũ Đức Anh Tuấn', 'tuan@gmail.com', NULL, NULL, NULL, NULL),
('20155109', '$2y$10$w8SnA0fEgMtr5O4KOBRmGeIeRO6hW6ZJW.h6qTnyoAC.ulFCfdrOe', 1, 'Trần Văn Báu', 'bau@gmail.com', NULL, NULL, NULL, NULL),
('20160576', '$2y$10$fMM2Ae62FwNPLFTYfn2Fru15I6T3Tuk1btrRfpCxm5YRI3AJ8rWqS', 1, 'Phạm Hùng Cường', 'cuong@gmail.com', NULL, NULL, NULL, NULL),
('20160790', '$2y$10$..phdUHgGSysTKWrOzvFN.kKPuRWTmG/b/zTxakGocOu07A4Kskjy', 1, 'Trương Thành Duy', 'duy@gmail.com', NULL, NULL, NULL, NULL),
('20163344', '$2y$10$EzHEGY02rHlg93LV2g4tQuKheZ.gt3WRszprMlEGFj.KhSuavvb/i', 1, 'Đào Đình Quân', 'quan@gmail.com', NULL, NULL, NULL, NULL),
('20163834', '$2y$10$I3FMi5IZY4pKOswMD04we.AO52rjdB6KaNs9xq.g8RmllepKn9Ugy', 1, 'Lê Khắc Minh Thắng', 'thang@gmail.com', NULL, NULL, NULL, NULL),
('20165081', '$2y$10$MaS7IWfaItWBtejMZ8yQx.aT2wqLO055jOK9e9EqfKwZ/oRB1qOyy', 1, 'Phạm Văn Cử', 'cupv@gmail.com', NULL, NULL, NULL, NULL),
('admin', '$2y$10$472sTTInTsJoZHifeHmMquQlP7NchCzlhMFMOXd5h6SW4O3OnUbRS', 3, 'Admin', 'admin@gmail.com', '0388446430', 'AeW0g0Pkmqe83mVMZ1afyUo49pFKTT8LZNwbha0mYLgUceUt71NEPuH8sTzr', NULL, NULL),
('admin1', '$2y$10$uYubivKLuEfCZ5Y7VBz/ceMUYjpk/010GBvjvDszMVn40kw5x/d7e', 3, 'Trần Đình Khang', 'khangtd@gmail.com', NULL, NULL, NULL, NULL),
('GV01', '$2y$10$IWhGbkpZarezTJgxv8E51Or1QTdQP0sJbLUlxx4p92lCkvPotcQg.', 2, 'Trần Đình Khang', 'khangtd@gmail.com', '0388446430', 'tLUexaqbr2YqEJOWScaO5LnPFxWTV7Z1hyvnx6rdpFUvVgdsiWtPIhm7qsLh', NULL, NULL),
('GV02', '$2y$10$Yf60qhEfdRrWwoN7HkOMi.5LyxalOE5m3qzgRUqwLCSNoI446l0pi', 2, 'Nguyễn Kiêm Hiếu', 'hieunk@soict.hust.edu.vn', NULL, NULL, NULL, NULL),
('GV03', '$2y$10$5p3uHkZ/1bfUxDScVjHMwuEV7qbObb.k8IuGb6RWhUSwhk5WKP17m', 2, 'Đào Thành Chung', 'chungdt@soict.hust.edu.vn', NULL, NULL, NULL, NULL),
('GV04', '$2y$10$cxKsXxG/9Mp3TgNjXLo17uOxQaFLerb7gKZHCNYhE/jHN5T42mt/K', 2, 'Đỗ Bá Lâm', 'lamdb@soict.hust.edu.vn', NULL, NULL, NULL, NULL),
('GV05', '$2y$10$xU6wKM01eVHnES2PWMk88eSs.fFk63/ITS3HenBLKpYQpyYYmQb8S', 2, 'Trần Việt Trung', 'trungtv@soict.hust.edu.vn', NULL, NULL, NULL, NULL),
('GV06', '$2y$10$FD9huzI6UdHYCm9iC6YPJu6eYXLsWN.m37aa2jd3qYdi6bejtIkBm', 2, 'Nguyễn Hữu Đức', 'ducnh@soict.hust.edu.vn', NULL, NULL, NULL, NULL),
('GV07', '$2y$10$B/gcaU4Nqrr5ad.nC24fau/6luR.HZc9gEhz4Pev4pcW.BX7.ZSHm', 2, 'Nguyễn Bình Minh', 'minhnb@soict.hust.edu.vn', NULL, NULL, NULL, NULL),
('GV08', '$2y$10$nGmbs7DLEwLDrlIs1Ok3N.j3xo43puTLzIGzsnu/2ZjdNgJmnsxJS', 2, 'Nguyễn Nhật Quang', 'quangnn@soict.hust.edu.vn', NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `content_group_scheduel`
--
ALTER TABLE `content_group_scheduel`
  ADD PRIMARY KEY (`id_content`),
  ADD KEY `content_group_scheduel_id_scheduel_foreign` (`id_scheduel`);

--
-- Chỉ mục cho bảng `content_sub_scheduel`
--
ALTER TABLE `content_sub_scheduel`
  ADD PRIMARY KEY (`id_content_scheduel`),
  ADD KEY `content_sub_scheduel_id_subject_scheduel_foreign` (`id_subject_scheduel`);

--
-- Chỉ mục cho bảng `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `document_id_group_foreign` (`id_group`);

--
-- Chỉ mục cho bảng `evalution_criteria`
--
ALTER TABLE `evalution_criteria`
  ADD PRIMARY KEY (`id_evalution_criteria`),
  ADD KEY `evalution_criteria_id_group_foreign` (`id_group`);

--
-- Chỉ mục cho bảng `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `group_id_subject_foreign` (`id_subject`),
  ADD KEY `group_id_teacher_foreign` (`id_teacher`);

--
-- Chỉ mục cho bảng `group_scheduel`
--
ALTER TABLE `group_scheduel`
  ADD PRIMARY KEY (`id_scheduel`),
  ADD KEY `group_scheduel_id_group_foreign` (`id_group`);

--
-- Chỉ mục cho bảng `group_student`
--
ALTER TABLE `group_student`
  ADD PRIMARY KEY (`id_group_student`),
  ADD KEY `group_student_id_group_foreign` (`id_group`),
  ADD KEY `group_student_id_student_foreign` (`id_student`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `student_username_foreign` (`username`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Chỉ mục cho bảng `subject_scheduel`
--
ALTER TABLE `subject_scheduel`
  ADD PRIMARY KEY (`id_subject_scheduel`),
  ADD KEY `subject_scheduel_id_subject_foreign` (`id_subject`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`),
  ADD KEY `teacher_username_foreign` (`username`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `content_group_scheduel`
--
ALTER TABLE `content_group_scheduel`
  MODIFY `id_content` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `content_sub_scheduel`
--
ALTER TABLE `content_sub_scheduel`
  MODIFY `id_content_scheduel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `evalution_criteria`
--
ALTER TABLE `evalution_criteria`
  MODIFY `id_evalution_criteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `group_scheduel`
--
ALTER TABLE `group_scheduel`
  MODIFY `id_scheduel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `group_student`
--
ALTER TABLE `group_student`
  MODIFY `id_group_student` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `subject_scheduel`
--
ALTER TABLE `subject_scheduel`
  MODIFY `id_subject_scheduel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `content_group_scheduel`
--
ALTER TABLE `content_group_scheduel`
  ADD CONSTRAINT `content_group_scheduel_id_scheduel_foreign` FOREIGN KEY (`id_scheduel`) REFERENCES `group_scheduel` (`id_scheduel`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `content_sub_scheduel`
--
ALTER TABLE `content_sub_scheduel`
  ADD CONSTRAINT `content_sub_scheduel_id_subject_scheduel_foreign` FOREIGN KEY (`id_subject_scheduel`) REFERENCES `subject_scheduel` (`id_subject_scheduel`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `evalution_criteria`
--
ALTER TABLE `evalution_criteria`
  ADD CONSTRAINT `evalution_criteria_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `group_scheduel`
--
ALTER TABLE `group_scheduel`
  ADD CONSTRAINT `group_scheduel_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `group_student`
--
ALTER TABLE `group_student`
  ADD CONSTRAINT `group_student_id_group_foreign` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_student_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_username_foreign` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subject_scheduel`
--
ALTER TABLE `subject_scheduel`
  ADD CONSTRAINT `subject_scheduel_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_username_foreign` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
