-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 22, 2024 lúc 05:37 PM
-- Phiên bản máy phục vụ: 10.6.18-MariaDB-cll-lve-log
-- Phiên bản PHP: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `seogameb_dev_nbm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `acronym` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collect_money`
--

CREATE TABLE `collect_money` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `bank_code` varchar(255) DEFAULT NULL,
  `bank_time` int(11) DEFAULT NULL,
  `bank_type` int(11) DEFAULT NULL,
  `bank_status` int(11) DEFAULT 0,
  `money` int(11) DEFAULT 0,
  `input_source` int(11) DEFAULT NULL,
  `bank_content` varchar(255) DEFAULT NULL,
  `bank_image` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `input_source`
--

CREATE TABLE `input_source` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stk` varchar(255) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0,
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `file_job` varchar(255) DEFAULT NULL,
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
  `updated_at` int(11) NOT NULL,
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `updated_at` int(11) DEFAULT 0,
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `updated_at` int(11) DEFAULT 0,
  `delete_status` int(11) DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `info` longtext DEFAULT NULL,
  `status_index` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `project_type` int(11) DEFAULT NULL,
  `deadline` int(11) DEFAULT 0,
  `revenue` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `info` longtext DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `note_index` longtext DEFAULT NULL,
  `status_index` int(11) DEFAULT 1,
  `data_index_real` longtext DEFAULT NULL,
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
  `updated_at` int(11) DEFAULT 0,
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_type`
--

CREATE TABLE `project_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `author` int(11) DEFAULT NULL,
  `file_ex` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0,
  `delete_status` int(11) DEFAULT 0,
  `job_type` varchar(255) DEFAULT NULL,
  `status_index` int(11) NOT NULL DEFAULT 0,
  `data_index` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `unit_price`
--

CREATE TABLE `unit_price` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `project_type` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `discount` float DEFAULT 0,
  `revenue` int(11) DEFAULT 0,
  `author_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0,
  `delete_user` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Chỉ mục cho bảng `unit_price`
--
ALTER TABLE `unit_price`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT cho bảng `unit_price`
--
ALTER TABLE `unit_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
