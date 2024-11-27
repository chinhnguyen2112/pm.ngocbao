-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2024 lúc 09:29 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nbm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `acronym` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bank`
--

INSERT INTO `bank` (`id`, `name`, `acronym`) VALUES
(1, 'Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam (Agribank)', 'Agribank'),
(2, 'Ngân hàng Công Thương Việt Nam (VietinBank)', 'VietinBank'),
(3, 'Ngân hàng Đầu tư và Phát triển Việt Nam (BIDV)', 'BIDV'),
(4, 'Ngân hàng Ngoại Thương Việt Nam (Vietcombank)', 'Vietcombank'),
(5, 'Ngân hàng Chính sách Xã hội (VBSP)', 'VBSP'),
(6, 'Ngân hàng Phát triển Việt Nam (VDB)', 'VDB'),
(7, 'Ngân hàng TNHH MTV Dầu khí Toàn cầu (GPBank)', 'GPBank'),
(8, 'Ngân hàng TNHH MTV Đại Dương (OceanBank)', 'OceanBank'),
(9, 'Ngân hàng TNHH MTV Xây dựng (CB)', 'CB'),
(10, 'Ngân hàng TMCP Á Châu (ACB)', 'ACB'),
(11, 'Ngân hàng TMCP An Bình (ABBANK)', 'ABBANK'),
(12, 'Ngân hàng TMCP Bản Việt (Viet Capital Bank)', 'Viet Capital Bank'),
(13, 'Ngân hàng TMCP Bảo Việt (BAOVIET Bank)', 'BAOVIET Bank'),
(14, 'Ngân hàng TMCP Bắc Á (Bac A Bank)', 'Bac A Bank'),
(15, 'Ngân hàng TMCP Bưu điện Liên Việt (LienVietPostBank)', 'LienVietPostBank'),
(16, 'Ngân hàng TMCP Đại Chúng Việt Nam (PVcomBank)', 'PVcomBank'),
(17, 'Ngân hàng TMCP Đông Á (DongA Bank)', 'DongA Bank'),
(18, 'Ngân hàng TMCP Đông Nam Á (SeABank)', 'SeABank'),
(19, 'Ngân hàng TMCP Hàng Hải (MSB)', 'MSB'),
(20, 'Ngân hàng TMCP Kiên Long (Kienlongbank)', 'Kienlongbank'),
(21, 'Ngân hàng TMCP Kỹ Thương (Techcombank)', 'Techcombank'),
(22, 'Ngân hàng TMCP Nam Á (Nam A Bank)', 'Nam A Bank'),
(23, 'Ngân hàng TMCP Phương Đông (OCB)', 'OCB'),
(24, 'Ngân hàng TMCP Quân Đội (MB)', 'MB'),
(25, 'Ngân hàng TMCP Quốc Tế (VIB)', 'VIB'),
(26, 'Ngân hàng TMCP Quốc Dân (NCB)', 'NCB'),
(27, 'Ngân hàng TMCP Sài Gòn (SCB)', 'SCB'),
(28, 'Ngân hàng TMCP Sài Gòn Công Thương (SAIGONBANK)', 'SAIGONBANK'),
(29, 'Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)', 'SHB'),
(30, 'Ngân hàng TMCP Sài Gòn Thương Tín (Sacombank)', 'Sacombank'),
(31, 'Ngân hàng TMCP Tiên Phong (TPBank)', 'TPBank'),
(32, 'Ngân hàng TMCP Việt Á (VietABank)', 'VietABank'),
(33, 'Ngân hàng TMCP Việt Nam Thịnh Vượng (VPBank)', 'VPBank'),
(34, 'Ngân hàng TMCP Việt Nam Thương Tín (Vietbank)', 'Vietbank'),
(35, 'Ngân hàng TMCP Xăng dầu Petrolimex (PG Bank)', 'PG Bank'),
(36, 'Ngân hàng TMCP Xuất Nhập Khẩu (Eximbank)', 'Eximbank'),
(37, 'Ngân hàng TMCP Phát triển Thành phố Hồ Chí Minh (HDBank)', 'HDBank'),
(38, 'Ngân hàng TNHH Indovina (IVB)', 'IVB'),
(39, 'Ngân hàng Liên doanh Việt Nga (VRB)', 'VRB'),
(40, 'Ngân hàng TNHH MTV ANZ Việt Nam (ANZVL)', 'ANZVL'),
(41, 'Ngân hàng TNHH MTV Hong Leong Việt Nam (HLBVN)', 'HLBVN'),
(42, 'Ngân hàng TNHH MTV HSBC Việt Nam (HSBC)', 'HSBC'),
(43, 'Ngân hàng TNHH MTV Shinhan Việt Nam (SHBVN)', 'SHBVN'),
(44, 'Ngân hàng TNHH MTV Standard Chartered Việt Nam (SCBVL)', 'SCBVL'),
(45, 'Ngân hàng TNHH MTV Public Bank Việt Nam (PBVN)', 'PBVN'),
(46, 'Ngân hàng TNHH MTV CIMB Việt Nam (CIMB)', 'CIMB'),
(47, 'Ngân hàng TNHH MTV Woori Việt Nam (Woori)', 'Woori'),
(48, 'Ngân hàng TNHH MTV UOB Việt Nam (UOB)', 'UOB'),
(49, 'Ngân hàng Hợp tác xã Việt Nam (Co-opBank)', 'Co-opBank');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collect_money`
--

CREATE TABLE `collect_money` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `bank_code` int(11) DEFAULT NULL,
  `bank_time` int(11) DEFAULT NULL,
  `bank_type` int(11) DEFAULT NULL,
  `bank_status` int(11) DEFAULT 0,
  `money` int(11) DEFAULT 0,
  `input_source` int(11) DEFAULT NULL,
  `bank_content` varchar(255) DEFAULT NULL,
  `bank_image` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctv_jobs`
--

CREATE TABLE `ctv_jobs` (
  `id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `ctv` int(11) DEFAULT NULL,
  `deadline` int(11) DEFAULT NULL,
  `completion_time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `check_replly` int(11) DEFAULT 0,
  `qa_id` int(11) DEFAULT NULL,
  `time_qa_check` int(11) DEFAULT NULL,
  `status_qa_check` int(11) DEFAULT 0,
  `content_qa_check` varchar(255) DEFAULT NULL,
  `file_qa_check` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `input_source`
--

CREATE TABLE `input_source` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stk` int(255) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `info` longtext DEFAULT NULL,
  `job_type` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `punish` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `completion_time` int(11) DEFAULT NULL,
  `z_index` int(11) DEFAULT 0,
  `note_qa` longtext DEFAULT NULL,
  `note_ctv` longtext DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `status_qa` int(11) DEFAULT NULL,
  `status_index` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_index`
--

CREATE TABLE `job_index` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `project_type` int(11) DEFAULT NULL,
  `deadline` int(11) DEFAULT 0,
  `revenue` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `info` longtext DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `note_index` longtext DEFAULT NULL,
  `status_index` int(11) DEFAULT 1,
  `data_index` longtext DEFAULT NULL,
  `check_index` int(11) DEFAULT 0,
  `time_index` int(11) DEFAULT NULL,
  `time_index_next` int(11) DEFAULT NULL,
  `user_check_index` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `received` int(11) DEFAULT 0,
  `debt_status` int(11) DEFAULT 0,
  `time_urges` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `time_start` int(11) DEFAULT NULL,
  `time_end` int(11) DEFAULT NULL,
  `time_cancel` int(11) DEFAULT NULL,
  `time_pause` int(11) DEFAULT NULL,
  `handover_status` int(11) DEFAULT 0,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_type`
--

CREATE TABLE `project_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `phone`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Nguyễn Văn A', '96e79218965eb72c92a549dd5a330112', 0, '0', 1, 1, 0, 0),
(2, 'test', 'Chỉnh Nguyễn Văn', '96e79218965eb72c92a549dd5a330112', 384983082, '0', 5, 1, 1716915773, 0),
(3, 'test1', 'Chỉnh Nguyễn Văn', '96e79218965eb72c92a549dd5a330112', 384983082, 'id.chinhnguyen@gmail.com', 4, 2, 1716915832, 1716923192),
(4, 'index', 'Chỉnh Nguyễn Văn', '96e79218965eb72c92a549dd5a330112', 384983082, 'id.chinhnguyen@gmail.com', 3, 1, 1716915847, 0),
(5, 'pm', 'Chỉnh Nguyễn Vănn', '96e79218965eb72c92a549dd5a330112', 384983082, 'id.chinhnguyen@gmail.com', 2, 1, 1716915864, 1716923257);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `collect_money`
--
ALTER TABLE `collect_money`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ctv_jobs`
--
ALTER TABLE `ctv_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `input_source`
--
ALTER TABLE `input_source`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `job_index`
--
ALTER TABLE `job_index`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `collect_money`
--
ALTER TABLE `collect_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ctv_jobs`
--
ALTER TABLE `ctv_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `input_source`
--
ALTER TABLE `input_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `job_index`
--
ALTER TABLE `job_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `project_type`
--
ALTER TABLE `project_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
