-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 05, 2024 lúc 02:06 AM
-- Phiên bản máy phục vụ: 10.6.18-MariaDB-cll-lve-log
-- Phiên bản PHP: 8.1.29

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
(49, 'Ngân hàng Hợp tác xã Việt Nam (Co-opBank)', 'Co-opBank'),
(50, 'USDT', 'USTD');

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

--
-- Đang đổ dữ liệu cho bảng `collect_money`
--

INSERT INTO `collect_money` (`id`, `project_id`, `customer`, `bank_code`, `bank_time`, `bank_type`, `bank_status`, `money`, `input_source`, `bank_content`, `bank_image`, `note`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 2, 'test 15', '767378', 1719717780, 1, 1, 1000000008, 1, 'jjj', NULL, 'yhshs', 1719545036, 1719545036, 1),
(2, 6, 'ffdd', '01234', 1719741060, 1, 1, 13322, 1, '', NULL, '', 1719568283, 1719568283, 1),
(3, 21, 'Kiều Ngọc Anh', '', 1719834120, 1, 1, -1, 8, '', NULL, '', 1719747793, 1719747793, 1),
(4, 21, 'Kiều Ngọc Anh', '0', 1719920640, 1, 0, -45, 8, '', NULL, '', 1719747909, 1719747909, 1),
(5, 20, 'Kiều Ngọc Anh', '0', 1720007100, 1, 1, 78788, 8, '', NULL, '', 1719747932, 1719747932, 1),
(6, 22, 'y8jhhguj', '0', 1719575220, 1, 1, 98787, 8, '', NULL, '', 1719748053, 1719748053, 1),
(7, 22, 'Kiều Ngọc Anh', '0', 1719834540, 1, 1, 2147483647, 8, '', NULL, '', 1719748180, 1719748180, 1),
(8, 23, 'Kiều Ngọc Anh', '0', 1720237200, 1, 1, 2147483647, 8, 'hhh', NULL, 'ngày hôm nay cần hoàn thiện dự án', 1719805223, 1719805223, 1),
(9, 23, 'Kiều Ngọc Anh', '0', 1721707800, 1, 1, 2147483647, 8, 'hhh', NULL, 'ngày hôm nay cần hoàn thiện dự án', 1719807027, 1719807027, 1),
(10, 43, 'ggg', '0', 1720718820, 1, 1, 17888, 8, '', NULL, '', 1719854830, 1719854830, 1),
(11, 48, 'hghjjh', '0', 1720718820, 1, 1, 33454335, 8, '', NULL, '', 1719854860, 1719854860, 1),
(12, 47, 'Kiều Ngọc Anh', '0', 1720719060, 1, 0, 83843664, 8, 'hhh', NULL, '', 1719855076, 1719855076, 1),
(13, 44, 'Kiều Ngọc Anh', '0', 1724347860, 2, 1, 2243333, 8, 'hhh', NULL, '', 1719855110, 1719855110, 1),
(14, 61, 'Bùi Thị Anh', '0', 1719925080, 1, 1, 100000, 8, 'ffffđ', 'upload/bank_image/HHH12345-23431224.jpg', 'abcxyz ', 1719917843, 1719917843, 1),
(15, 61, 'Bùi Thị Anh', '0', 1719925080, 1, 1, 100000, 8, 'ffffđ', 'upload/bank_image/HHH12345-23431224.jpg', 'abcxyz ', 1719917843, 1719917843, 1),
(16, 66, 'Kiều Ngjhuọc Anh', '103545', 1720695960, 1, 1, 20000, 8, 'hhhjjk', 'upload/bank_image/103545.jpg', 'aaaaa', 1722969764, 1722969764, 0),
(17, 31, 'Lê Minh Anh ', '0', 1719832020, 1, 0, 10000, 8, 'ffffđ', 'upload/bank_image/HHH12345-23431224.jpg', 'abcxyz ', 1719918472, 1719918472, 1),
(18, 67, 'Lê Minh Anh ', '0', 1719927420, 1, 1, 50000, 1, 'ffffđ', 'upload/bank_image/HHH12345-23431224.jpg', 'abcxyz ', 1719920175, 1719920175, 1),
(19, 68, 'Lê Minh Anh ', '0', 1719970920, 1, 1, 50000, 1, 'ffffđ', NULL, 'abcxyz ', 1719920476, 1719920476, 1),
(20, 64, 'Lê Minh Anh ', '0', 1719924180, 1, 1, 100000, 8, 'ffffđ', NULL, 'abcxyz ', 1719920540, 1719920540, 1),
(21, 2, 'Lê Minh Anh ', '0', 1719794580, 1, 1, 10000, 8, 'ffffđ', NULL, 'abcxyz ', 1719920571, 1719920571, 1),
(22, 75, 'Kiều Ngọc Anh', '329894', 1721792580, 1, 1, 2147483647, 9, 'rrerr', NULL, 'fffrrt', 1719978212, 1719978212, 0),
(23, 73, 'Kiều Ngọc Anh', '0', 1722656880, 1, 1, 2147483647, 10, 'rrerr', NULL, 'fffrrt', 1719978536, 1719978536, 1),
(24, 76, 'Kiều Ngọc Anh', 'ere34344', 1720670220, 1, 1, 2147483647, 9, 'rrerr', NULL, 'fffrrt', 1719979044, 1719979044, 0),
(25, 77, 'Kiều Ngọc Anh', 'ere34344', 1720756860, 1, 1, 3222, 9, 'rrerr', NULL, 'fffrrt', 1719979279, 1719979279, 0),
(26, 77, 'Bùi Thị Anh', 'HHH12345-23431224', 1719766980, 1, 1, 50000, 8, 'ffffđ', NULL, 'abcxyz ', 1719979281, 1719979281, 1),
(27, 40, 'bgbgbgbg', 'ere34344', 1721466300, 1, 1, 23242, 10, 'rrerr', NULL, '23332', 1721207126, 1721207126, 0),
(28, 48, 'Hồ Ba Mạnh', 'HHH12345-23431224', 1721218560, 1, 1, 10000, 8, 'aaaaa', NULL, 'aaaaa', 1721290433, 1721290433, 1),
(29, 45, 'Hồ Bá Mạnh ', 'HHH12345-23431224', 1720685700, 1, 1, 10000, 8, 'aaaaa', NULL, 'aaaaa', 1721290511, 1721290511, 1),
(30, 77, 'hoàng văn lương', '', 1721809020, 1, 2, 10000, 8, '', NULL, 'ngày hôm nay cần hoàn thiện dự án', 1721290657, 1721290657, 1),
(31, 87, 'lương văn anh', '', 1721981940, 1, 0, 1000000, 8, 'hhh', NULL, '', 1721290794, 1721290794, 1),
(32, 87, 'lương văn anh', '', 1721377260, 1, 1, 1008993, 9, '', NULL, 'ngày hôm nay cần hoàn thiện dự án', 1721290886, 1721290886, 1),
(33, 87, 'Nguyễn Long An ', '', 1721983080, 1, 2, 100000, 9, '', NULL, '10000000', 1721291898, 1721291898, 1),
(34, 81, 'hu hu ', '', 1721702580, 1, 0, 13333, 9, '', NULL, '765567', 1721357037, 1721357037, 1),
(35, 96, 'thén', '', 1721901180, 1, 2, 8878218, 8, '', NULL, 'sdd', 1721728398, 1721728398, 1),
(36, 90, 'abcxyz', '', 1721296620, 2, 0, 782387832, 9, '', NULL, '', 1721728632, 1721728632, 1),
(37, 96, 'abcxyzkl', '', 1721815080, 2, 1, 76776, 9, '', NULL, '', 1721728719, 1721728719, 0),
(38, 102, 'thằng thắng', '', 1721897940, 1, 1, 100, 8, '', NULL, '', 1721898012, 1721898012, 0),
(39, 102, 'thằng thắng', '', 1721898540, 1, 1, 100, 11, '', NULL, '765567', 1721898552, 1721898552, 0),
(40, 103, 'thằng thún ', '', 1721899380, 1, 1, 100, 8, '', NULL, '', 1721899432, 1721899432, 0),
(41, 103, 'jjjjkkj', '', 1722395880, 1, 2, 888998, 9, '', NULL, '', 1721963916, 1721963916, 0),
(42, 103, 'Kiều Ngọc Anh', '', 1721789220, 2, 2, 10920990, 14, '', NULL, '', 1722221251, 1722221251, 0),
(43, 103, 'Kiều Long Anh', '', 1720753140, 2, 1, 121212, 11, '', NULL, '', 1722221974, 1722221974, 0),
(44, 19, 'aaaaa', '', 1722222000, 1, 1, 10000, 11, 'aaaaa', NULL, 'aaaa', 1722222049, 1722222049, 0),
(45, 60, 'thằng thắng', '1234', 1722323100, 1, 1, 11223, 16, '', NULL, '', 1723661883, 1723661883, 0),
(46, 51, 'Khách hàng 1', '', 1720250700, 1, 1, 123456789, 17, 'Nội dung chuyển hkoarn', NULL, 'ghi chú dự án', 1722237922, 1722237922, 0),
(47, 104, 'thryu', '', 1721116860, 2, 2, 2113, 17, '', NULL, '765567', 1722240084, 1722240084, 0),
(48, 105, 'Kiều Long Anh', '', 1723263360, 2, 0, 2211, 18, 'test', 'upload/bank_image/.jpg', 'test', 1723514723, 1723514723, 0),
(49, 109, 'hoàng long an', '89899g', 1724921220, 2, 1, 386889, 18, 'uhhjjh', 'upload/bank_image/89899g.jpg', '7888jhhggh', 1723514491, 1723514491, 0),
(50, 126, 'Kiều Ngọc Anh', '89899g', 1723190580, 2, 1, 90000, 18, 'hhh', NULL, 'ngày hôm nay cần hoàn thiện dự án', 1723622635, 1723622635, 0),
(51, 125, 'j', '89899g', 1724293620, 2, 1, 10000, 18, 'hhh', NULL, 'ngày hôm nay cần hoàn thiện dự án', 1723688848, 1723688848, 0),
(52, 127, 'HGHG', '89899g', 1724297700, 1, 0, 1000000, 18, 'hhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 'ngày hôm nay cần hoàn thiện dự ánjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1724295967, 1724295967, 0),
(53, 128, 'hshshh', '8999', 1724901240, 2, 1, 2147483647, 18, 'hhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 'ngày hôm nay cần hoàn thiện dự ánjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1724313768, 1724313768, 0),
(54, 130, 'Khách hàng 3', '111111AAA', 1723795440, 1, 1, 12212, 18, 'Nội dung chuyển hkoarn', NULL, 'ghi chú dự án', 1724313868, 1724313868, 0),
(55, 130, 'hshshh', '8999', 1724729580, 1, 0, 1222233, 18, 'hhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 'ngày hôm nay cần hoàn thiện dự ánjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1724384051, 1724384051, 0),
(56, 129, '2', '8999', 1724384100, 1, 1, 12, 18, 'hhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 'ngày hôm nay cần hoàn thiện dự ánjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1724384160, 1724384160, 0),
(57, 129, '2', '8999', 1724729760, 1, 2, 130000, 18, 'hhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 'ngày hôm nay cần hoàn thiện dự ánjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1724384304, 1724384304, 0),
(58, 138, '2', '8999', 1727690100, 1, 1, 13, 20, 'hhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 'ngày hôm nay cần hoàn thiện dự ánjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 1724406961, 1724406961, 0);

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

--
-- Đang đổ dữ liệu cho bảng `ctv_jobs`
--

INSERT INTO `ctv_jobs` (`id`, `job_id`, `project_id`, `ctv`, `deadline`, `completion_time`, `status`, `check_replly`, `qa_id`, `time_qa_check`, `status_qa_check`, `content_qa_check`, `file_qa_check`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 11, 1719713580, 1719542304, 1, 2, 8, 1719542628, 1, '666', NULL, 1719540839, 1719540839),
(2, 1, 2, 10, 1719709200, 1719542280, 1, 2, 8, 1719544408, 1, NULL, NULL, 1719540859, 1719540859),
(3, 5, 4, 10, 1719719040, 1719546381, 1, 0, NULL, NULL, 2, NULL, NULL, 1719546277, 1719546277),
(4, 6, 5, 10, 1719719400, 1719546784, 1, 2, 8, 1719546862, 1, NULL, NULL, 1719546625, 1719546625),
(5, 7, 5, 11, 1719633060, 1719546795, 1, 2, 8, 1719546825, 1, NULL, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 1719546729, 1719546729),
(6, 8, 6, 10, 1719634200, 1719547877, 1, 0, NULL, NULL, 0, NULL, NULL, 1719547839, 1719547839),
(7, 4, 1, 10, NULL, 1719638873, 1, 1, 20, 1723005000, 1, 'aaaaaa', 'https://www.youtube.com/', 1719548084, 1719548084),
(8, 3, 1, 10, NULL, 1719627232, 1, 1, 20, 1724314184, 1, 'sddssd', '', 1719548087, 1719548087),
(9, 10, 8, 10, 1719712020, 1719625745, 1, 2, 8, 1719626307, 1, NULL, NULL, 1719625705, 1719625705),
(10, 11, 8, 11, 1719712080, 1719626127, 1, 2, 8, 1719626192, 1, NULL, NULL, 1719625732, 1719625732),
(11, 12, 8, 10, 1719716220, 1719630008, 1, 0, NULL, NULL, 0, NULL, NULL, 1719629873, 1719629873),
(12, 13, 11, 10, 1720850760, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719641191, 1719641191),
(13, 14, 10, 10, 1719728520, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719642172, 1719642172),
(14, 15, 12, 10, 1719728760, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719642424, 1719642424),
(15, 16, 12, 10, 1719728760, 1719642433, 1, 1, 20, 1723865880, 1, 'UUY', 'https://www.youtube.com/watch?v=qESUoOwzwaI', 1719642424, 1719642424),
(16, 17, 13, 10, 1719728880, 1719643054, 1, 1, 8, 1719643112, 1, '', NULL, 1719642516, 1723437099),
(17, 18, 7, 11, 1719729240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719642887, 1719642887),
(18, 19, 7, 11, 1719729240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719642887, 1719642887),
(19, 20, 7, 11, 1719729240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719642887, 1719642887),
(20, 21, 14, 12, 1719759600, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719673268, 1719673268),
(21, 22, 16, 10, 1720003920, 1719745595, 1, 2, 8, 1719745683, 1, NULL, NULL, 1719744777, 1719744777),
(22, 23, 16, 11, 1720263180, 1719745611, 1, 1, 8, 1719745839, 1, NULL, NULL, 1719744799, 1719744799),
(23, 24, 17, 10, 1720005420, 1719746265, 1, 0, NULL, NULL, 0, NULL, NULL, 1719746248, 1719746248),
(24, 25, 18, 10, 1719919140, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719746372, 1719746372),
(25, 26, 19, 10, 1719832980, 1719746648, 1, 0, NULL, NULL, 0, NULL, NULL, 1719746638, 1719746638),
(26, 27, 20, 10, 1719833100, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719746744, 1719746744),
(27, 28, 21, 10, 1720006260, 1719747253, 1, 2, 8, 1719747549, 1, NULL, NULL, 1719747146, 1719747146),
(28, 29, 23, 10, 1721272320, 1719804360, 1, 2, 8, 1719805057, 1, NULL, NULL, 1719803563, 1719803563),
(29, 30, 23, 11, 1720149120, 1719804409, 1, 2, 8, 1719804807, 1, NULL, NULL, 1719803584, 1719803584),
(30, 31, 25, 10, 1720757460, 1719807127, 1, 0, NULL, NULL, 0, NULL, NULL, 1719807106, 1719807106),
(31, 32, 26, 11, 1721189580, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719807241, 1719807241),
(32, 33, 27, 10, 1721189820, 1719807453, 1, 0, NULL, NULL, 0, NULL, NULL, 1719807436, 1719807436),
(33, 34, 28, 10, 1720757880, 1719807575, 1, 2, 8, 1719807820, 1, NULL, NULL, 1719807548, 1719807548),
(34, 35, 29, 10, 1719980880, 1719808199, 1, 2, 8, 1719808227, 1, NULL, NULL, 1719808148, 1719808148),
(35, 36, 29, 11, 1720153740, 1719808207, 1, 2, 8, 1719808238, 1, NULL, NULL, 1719808176, 1719808176),
(36, 37, 30, 11, 1720585920, 1719808890, 1, 2, 8, 1719808909, 1, NULL, NULL, 1719808371, 1719808371),
(37, 38, 30, 10, 1720499640, 1719808836, 1, 2, 8, 1719808913, 1, NULL, NULL, 1719808466, 1719808466),
(38, 39, 31, 10, 1720586820, 1719809417, 1, 2, 8, 1719809429, 1, NULL, NULL, 1719809275, 1719809275),
(39, 40, 31, 10, 1720673280, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719809330, 1719809330),
(40, 41, 33, 10, 1720069080, 1719810246, 1, 1, 20, 1722659847, 1, 'kkjk', 'https://dev.ngocbaomedia.com/tai-khoan/', 1719809922, 1719809922),
(41, 42, 33, 12, 1720587540, 1719810847, 1, 0, NULL, NULL, 0, NULL, NULL, 1719809987, 1719809987),
(42, 43, 23, 10, 1720682460, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719818540, 1719818540),
(43, 44, 33, 11, 1720596180, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719818616, 1719818616),
(44, 45, 34, 10, 1720603620, 1719826511, 1, 0, NULL, NULL, 0, NULL, NULL, 1719826044, 1719826044),
(45, 46, 34, 12, 1720603620, 1719826488, 1, 0, NULL, NULL, 0, NULL, NULL, 1719826077, 1719826077),
(46, 47, 35, 11, 1719915000, 1719828978, 1, 0, NULL, NULL, 0, NULL, NULL, 1719828634, 1719828634),
(47, 48, 35, 10, 1720606200, 1719828669, 1, 2, 8, 1719828695, 1, NULL, NULL, 1719828652, 1719828652),
(48, 49, 36, 11, 1721298240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719829476, 1719829476),
(49, 50, 40, 10, 1720781580, 1719831207, 1, 2, 8, 1719831218, 1, NULL, NULL, 1719831198, 1719831198),
(50, 51, 43, 10, 1719917940, 1719831756, 1, 2, 8, 1719831811, 1, NULL, NULL, 1719831573, 1719831573),
(51, 52, 43, 12, 1722509940, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719831591, 1719831591),
(52, 53, 43, 10, 1722510000, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719831608, 1719831608),
(53, 54, 44, 10, 1720695660, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719831695, 1719831695),
(54, 55, 44, 11, 1720695840, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719831867, 1719831867),
(55, 56, 45, 10, 1720541880, 1719850992, 1, 2, 8, 1719851004, 1, NULL, NULL, 1719850711, 1719850711),
(56, 57, 45, 11, 1720887480, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719850737, 1719850737),
(57, 58, 46, 17, 1721579340, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719851398, 1719851398),
(58, 59, 47, 12, 1721752320, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719851586, 1719851586),
(59, 60, 47, 11, 1720715580, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719851606, 1719851606),
(60, 61, 46, 17, 1721493420, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719851869, 1719851869),
(61, 62, 34, 11, 1720802280, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719851921, 1719851921),
(62, 63, 48, 17, 1721839200, 1719852098, 1, 2, 8, 1719852164, 1, NULL, NULL, 1719852029, 1719852029),
(63, 64, 48, 17, 1720802400, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719852053, 1719852053),
(64, 65, 49, 11, 1720114440, 1719855272, 1, 2, 8, 1719855282, 1, NULL, NULL, 1719855259, 1719855259),
(65, 66, 50, 11, 1720633080, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719855511, 1719855511),
(66, 67, 50, 11, 1719941880, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719855536, 1719855536),
(67, 68, 50, 12, 1900800, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719855581, 1719855581),
(68, 69, 51, 17, 1720810260, 1719859948, 1, 2, 8, 1719859971, 1, NULL, NULL, 1719859889, 1719859889),
(69, 70, 51, 17, 1722019860, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719859913, 1719859913),
(70, 71, 55, 17, 1723258200, 1719888685, 1, 2, 8, 1719888705, 1, NULL, NULL, 1719888661, 1719888661),
(71, 72, 53, 10, 1719854040, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719889986, 1719889986),
(72, 73, 54, 12, 1719681300, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719890375, 1719890375),
(73, 74, 54, 17, 1720064400, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719891665, 1719891665),
(74, 75, 53, 10, 1719852120, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719891737, 1719891737),
(75, 76, 54, 11, 1719812520, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719891774, 1719891774),
(76, 77, 54, 11, 1719852240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719891806, 1719891806),
(77, 78, 56, 10, 1719812940, 1719892222, 1, 2, 8, 1719911510, 1, NULL, NULL, 1719892050, 1719892050),
(78, 79, 57, 29, 1720030200, 1719893855, 1, 2, 8, 1719894006, 1, 'abcxyz', NULL, 1719893331, 1723004065),
(79, 80, 57, 10, 1719780000, 1719902809, 1, 2, 8, 1719903914, 1, 'abcxyzzzzzzzzssd', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1719902385, 1719902385),
(80, 81, 57, 10, 1719990600, 1719904284, 1, 2, 8, 1719904422, 1, 'aaaaaaaaaaa', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1719904258, 1719904258),
(81, 82, 57, 10, 1719825360, 1719904973, 1, 2, 8, 1719905040, 1, 'aaaaaaaaaaa', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1719904526, 1719904526),
(82, 83, 57, 12, 1720131120, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719907881, 1719907881),
(83, 84, 58, 11, 1720082220, 1719909481, 1, 2, 8, 1719909499, 1, NULL, NULL, 1719909441, 1719909441),
(84, 85, 59, 11, 1720860120, 1719910045, 1, 2, 8, 1719910062, 1, NULL, NULL, 1719909751, 1719909751),
(85, 86, 59, 10, 1721205720, 1719910278, 1, 2, 8, 1719910315, 1, NULL, NULL, 1719909781, 1719909781),
(86, 87, 60, 11, 1720170420, 1719911317, 1, 0, NULL, NULL, 0, NULL, NULL, 1719911297, 1719911297),
(87, 88, 57, 11, 1720005660, 1719926068, 1, 0, NULL, NULL, 0, NULL, NULL, 1719911990, 1719911990),
(88, 89, 61, 24, 1721085960, 1719912488, 1, 2, 8, 1719912599, 1, 'eeeeeeee', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1719912293, 1722909955),
(89, 90, 61, 29, 1720045500, 1719916664, 1, 2, 8, 1719916725, 1, 'hhh', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1719912363, 1722833619),
(90, 91, 61, 10, 1719790020, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719912400, 1719912400),
(91, 92, 61, 10, 1719786420, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719912435, 1719912435),
(92, 93, 62, 11, 1720863060, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719912728, 1719912728),
(93, 94, 63, 10, 1720692480, 1719915347, 1, 0, NULL, NULL, 0, NULL, NULL, 1719914893, 1719914893),
(94, 95, 63, 11, 1720779300, 1719915432, 1, 2, 8, 1719915505, 1, NULL, NULL, 1719915332, 1719915332),
(95, 97, 64, 11, 691200, 1719916134, 1, 0, NULL, NULL, 0, NULL, NULL, 1719916095, 1719916095),
(96, 96, 64, 10, 777600, 1719916292, 1, 2, 8, 1719916343, 1, NULL, NULL, 1719916273, 1719916273),
(97, 98, 65, 10, 1721212440, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719916496, 1719916496),
(98, 99, 66, 10, 1720694160, 1719916701, 1, 2, 8, 1719916752, 1, NULL, NULL, 1719916620, 1719916620),
(99, 100, 66, 11, 1720694220, 1719916738, 1, 0, NULL, NULL, 2, NULL, NULL, 1719916670, 1719916670),
(100, 101, 66, 10, 1721213280, 1719998708, 1, 1, 20, 1723865891, 1, 'aaaaaaaaaa', 'https://dev.ngocbaomedia.com/tai-khoan/', 1719917345, 1719917345),
(101, 102, 68, 10, 1720611360, 1719920234, 1, 2, 8, 1719920355, 1, NULL, NULL, 1719920213, 1719920213),
(102, 103, 69, 10, 1720699860, 1719922307, 1, 2, 8, 1719922331, 1, NULL, NULL, 1719922277, 1719922277),
(103, 104, 69, 11, 1720786500, 1719922564, 1, 1, 8, 1719923404, 1, NULL, NULL, 1719922554, 1719922554),
(104, 105, 71, 11, 1720096500, 1719923756, 1, 0, NULL, NULL, 0, NULL, NULL, 1719923746, 1719923746),
(105, 106, 72, 11, 1721220000, 1719924049, 1, 0, NULL, NULL, 0, NULL, NULL, 1719924039, 1719924039),
(106, 107, 72, 10, 1720701840, 1719924310, 1, 2, 8, 1719925199, 1, NULL, NULL, 1719924298, 1719924298),
(107, 108, 74, 10, 1720839960, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1719976034, 1719976034),
(108, 109, 75, 11, 1720494660, 1719976324, 1, 2, 8, 1719977839, 1, 'dfsdsfs', NULL, 1719976311, 1719976311),
(109, 110, 75, 11, 1720841580, 1719977667, 1, 2, 8, 1719977860, 1, NULL, NULL, 1719977620, 1719977620),
(110, 111, 77, 11, 1721360760, 1719978450, 1, 0, NULL, NULL, 0, NULL, NULL, 1719978439, 1719978439),
(111, 112, 77, 11, 1720670880, 1719979766, 1, 0, NULL, NULL, 0, NULL, NULL, 1719979754, 1719979754),
(112, 113, 77, 11, 1721103000, 1719979857, 1, 2, 8, 1719979889, 1, NULL, NULL, 1719979847, 1719979847),
(113, 114, 78, 11, 1721379540, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721206788, 1721206788),
(114, 115, 78, 10, 1721206740, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721206806, 1721206806),
(115, 116, 78, 10, 1721206740, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721206807, 1721206807),
(116, 117, 85, 10, 1721355240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721268869, 1721268869),
(117, 119, 84, 10, 1721442240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721269462, 1721269462),
(118, 120, 88, 11, 1721379780, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721293397, 1721293397),
(119, 121, 91, 10, 1721325480, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721357768, 1721357768),
(120, 122, 91, 10, 1721325480, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721357769, 1721357769),
(121, 123, 91, 10, 1721408220, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721357800, 1721357800),
(122, 124, 89, 12, 1721876400, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721358029, 1721358029),
(123, 125, 23, 10, 1721741220, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721726691, 1721726691),
(124, 127, 93, 10, 1721739000, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721727565, 1721727565),
(125, 128, 98, 12, 1721488080, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721747107, 1721747107),
(126, 129, 98, 12, 1721488080, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721747109, 1721747109),
(127, 130, 98, 12, 1721714880, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721747159, 1721747159),
(128, 131, 98, 12, 1721714880, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721747159, 1721747159),
(129, 132, 99, 17, 1721142540, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721747361, 1721747361),
(130, 133, 99, 12, 1721704140, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721747406, 1721747406),
(131, 134, 99, 12, 1721715420, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721747874, 1721747874),
(132, 135, 30, 17, 1721704860, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721748000, 1721748000),
(133, 136, 103, 29, 1721881320, 1721984252, 1, 2, 20, 1723865946, 1, 'jj', 'https://dev.ngocbaomedia.com/tai-khoan/', 1721967762, 1721967762),
(134, 137, 102, 29, 1722328860, 1721983601, 1, 2, 20, 1722915881, 1, 'eeeeeeee', 'https://www.youtube.com/watch?v=qESUoOwzwaI', 1721983313, 1721983313),
(135, 138, 102, 29, 1722328920, 1721983792, 1, 2, 20, 1721983951, 1, NULL, NULL, 1721983340, 1721983340),
(136, 140, 102, 29, 1721812200, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1721985018, 1721985018),
(137, 142, 104, 29, 1721980560, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1722239796, 1722239796),
(138, 143, 103, 28, 1725004620, 1722239915, 1, 0, NULL, NULL, 0, 'eeeeeee', NULL, 1722239844, 1722911371),
(139, 144, 19, 24, 1721730420, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1722248836, 1722248836),
(140, 145, 104, 7, 1722209280, NULL, 3, 0, NULL, NULL, 0, '', NULL, 1722248868, 1722658965),
(141, 146, 60, 7, 1724300460, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1722658918, 1722658918),
(142, 147, NULL, 24, 1719786420, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1722910014, 1722910014),
(143, 148, 105, 29, 1723608900, 1722917805, 1, 2, 20, 1722917865, 1, 'ddda', 'https://www.youtube.com/watch?v=qESUoOwzwaI', 1722917764, 1722917764),
(144, 149, 106, 24, 1724215560, 1724233812, 1, 0, NULL, NULL, 0, NULL, NULL, 1722919595, 1722919595),
(145, 150, 109, 24, 1723024740, 1723868230, 1, 0, NULL, NULL, 2, NULL, NULL, 1722938399, 1722938399),
(146, 151, 108, 28, 1723047780, 1723018604, 1, 1, 20, 1723514577, 1, 'kjds', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1722961424, 1722961424),
(147, 152, 110, 29, 1724472900, 1723004268, 1, 2, 20, 1723004756, 1, 'huhuuuu', 'https://dev.ngocbaomedia.com/quan-ly-cong-viec/', 1723004144, 1723086444),
(148, 153, 110, 29, 1724401380, 1723019085, 1, 1, 20, 1723019148, 1, '333333333', 'https://dev.ngocbaomedia.com/quan-ly-cong-viec/', 1723018998, 1723109874),
(149, 154, 110, 29, 1723883280, 1723019454, 1, 2, 20, 1723086907, 1, 'sai \r\n', 'https://dev.ngocbaomedia.com/quan-ly-cong-viec/', 1723019329, 1723086545),
(150, 155, 112, 29, 1723767060, 1723421540, 1, 2, 20, 1723520467, 1, 'jndj', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1723421507, 1723421507),
(151, 156, 102, 24, 1723517460, 1724233808, 1, 0, NULL, NULL, 2, NULL, NULL, 1723427424, 1723427424),
(152, 157, 112, 29, 1723427580, 1723513740, 1, 0, NULL, NULL, 2, '', NULL, 1723427584, 1723520433),
(153, 158, 113, 24, 1723479000, 1723428752, 1, 2, 20, 1723428930, 1, 'q', 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 1723428559, 1723428559),
(154, 159, 113, 24, 1723561800, 1723428759, 1, 2, 20, 1723428907, 1, 'ahhhhhh ', 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 1723428626, 1723428626),
(155, 162, 113, 24, 1723454100, 1723452484, 1, 2, 20, 1723452983, 1, 'aaaaaaaa', 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 1723450534, 1723450534),
(156, 163, 113, 29, 1723500960, 1723452362, 1, 2, 20, 1723452997, 1, 'aaaaaa', 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 1723450595, 1723450595),
(157, 164, 115, 24, 1722810240, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1723450904, 1723450904),
(158, 165, 113, 24, 1723626540, 1724233803, 1, 0, NULL, NULL, 2, NULL, NULL, 1723453797, 1723453797),
(159, 166, 117, 29, 1724232120, 1723455025, 1, 2, 20, 1723455219, 1, 'vdsdd', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1723454625, 1723454652),
(160, 167, 118, 29, 1724751780, 1723456012, 1, 0, NULL, NULL, 0, '', NULL, 1723455863, 1723455998),
(161, 168, 118, 24, 1724406240, 1723456098, 1, 0, NULL, NULL, 0, NULL, NULL, 1723455905, 1723455905),
(162, 169, 119, 29, 1724407140, 1723456913, 1, 2, 20, 1723456942, 1, 'ị', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1723456765, 1723456765),
(163, 170, 119, 24, 1724234340, 1723457052, 1, 0, NULL, NULL, 0, '', NULL, 1723456815, 1723456893),
(164, 171, 120, 29, 1724293260, 1723515691, 1, 0, NULL, NULL, 0, NULL, NULL, 1723515679, 1723515679),
(165, 172, 121, 29, 1724209860, 1723518921, 1, 2, 20, 1723519642, 1, 'hhhh\r\n\r\n', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1723518692, 1723518692),
(166, 173, 121, 24, 1724211060, 1723519993, 1, 0, NULL, NULL, 0, NULL, NULL, 1723519917, 1723519917),
(167, 174, 122, 29, 1723779780, 1723520668, 1, 0, NULL, NULL, 0, NULL, NULL, 1723520632, 1723520632),
(168, 175, 122, 29, 1723779840, 1723520674, 1, 2, 20, 1723520700, 1, 'hj', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1723520654, 1723520654),
(169, 176, 122, 28, 1724212200, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1723521008, 1723521008),
(170, 178, 124, 29, 1723694280, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1723521500, 1723521500),
(171, 179, 123, 24, 1723694340, 1723521716, 1, 0, NULL, NULL, 2, NULL, NULL, 1723521591, 1723521591),
(172, 177, 123, 29, 1724212920, 1723521760, 1, 1, 26, 1723522517, 1, '355', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1723521735, 1723521735),
(173, 180, 125, 29, 1723954740, 1723522795, 1, 0, NULL, NULL, 2, NULL, NULL, 1723522759, 1723522759),
(174, 181, 125, 24, 1724386740, 1723522804, 1, 0, NULL, NULL, 2, NULL, NULL, 1723522779, 1723522779),
(175, 182, 126, 29, 1724905260, 1723522916, 1, 0, NULL, NULL, 2, NULL, NULL, 1723522906, 1723522906),
(176, 183, 126, 29, 1723609920, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1723523582, 1723523582),
(177, 184, 125, 29, 1724205120, 1724032436, 1, 2, 20, 1724032888, 1, 'huhu', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1724032394, 1724032394),
(178, 185, 118, 29, 1724897280, 1724810789, 1, 0, NULL, NULL, 2, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', NULL, 1724206136, 1724295911),
(179, 186, 117, 29, 1724811060, 1724811163, 1, 0, NULL, NULL, 0, NULL, NULL, 1724206292, 1724206292),
(180, 187, 72, 29, 1724293020, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1724206700, 1724206700),
(181, 188, 77, 29, 1724900520, 1724209516, 1, 0, NULL, NULL, 0, NULL, NULL, 1724209379, 1724209379),
(182, 189, 128, 29, 1724815080, 1724296743, 1, 0, NULL, NULL, 0, NULL, NULL, 1724296710, 1724296710),
(183, 190, 127, 29, 1724728920, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1724296955, 1724296955),
(184, 191, 129, 29, 1724643420, 1724297944, 1, 2, 20, 1724298197, 1, 'hhhhhhhhhhhhh\r\n', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724297842, 1724297842),
(185, 192, 130, 24, 1724817060, 1724298792, 1, 2, 26, 1724298866, 1, 'hhh', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724298694, 1724298694),
(186, 193, 130, 29, 1724817060, 1724298803, 1, 2, 20, 1724298895, 1, '1000', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724298739, 1724298739),
(187, 194, 2, 29, 1724905200, 1724300443, 1, 0, NULL, NULL, 2, NULL, NULL, 1724300410, 1724300410),
(188, 195, 130, 24, 1724754540, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1724322560, 1724322560),
(189, 196, 131, 29, 1724813340, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1724381383, 1724381383),
(190, 197, 130, 29, 1724730720, 1724385199, 1, 2, 20, 1724385233, 1, '1111', 'https://dev.ngocbaomedia.com/cong-viec-qa/', 1724385180, 1724385180),
(191, 198, 132, 24, 1722932700, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1724401562, 1724401562),
(192, 199, 130, 28, 1724228760, 1724808661, 1, 0, NULL, NULL, 2, NULL, NULL, 1724401601, 1724401601),
(193, 200, 132, 24, 1724401740, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1724401781, 1724401781),
(194, 201, 133, 29, 1724833920, 1724402038, 1, 2, 20, 1724402074, 1, 'hghghg\r\n', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724401969, 1724401969),
(195, 202, 133, 29, 1724229180, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1724401995, 1724401995),
(196, 203, 134, 29, 1724661960, 1724402861, 1, 2, 20, 1724402887, 1, 'hhh', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724402801, 1724402829),
(197, 204, 135, 29, 1724666880, 1724407799, 1, 0, NULL, NULL, 0, '', NULL, 1724407713, 1724407777),
(198, 205, 135, 29, 1724666880, 1724407759, 1, 2, 20, 1724407908, 1, 'hhh', 'https://www.youtube.com/watch?v=qESUoOwzwaI', 1724407745, 1724407745),
(199, 207, 136, 29, 1724236080, 1724408909, 1, 2, 20, 1724408943, 1, 'jhhj', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724408891, 1724408891),
(200, 208, 137, 29, 1724841240, 1724409417, 1, 1, 20, 1724409527, 1, 'yy', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724409284, 1724409371),
(201, 209, 137, 24, 1724754900, 1724409483, 1, 1, 26, 1724409608, 1, '', 'https://dev.ngocbaomedia.com/cong-viec-qa/?id=209', 1724409317, 1724409317),
(202, 210, 141, 29, 1726656540, 1724410297, 1, 0, NULL, NULL, 0, NULL, NULL, 1724410230, 1724410230),
(203, 211, 137, 29, 1724757660, 1724811611, 1, 1, 20, 1724811789, 1, 'hhh', 'https://dev.ngocbaomedia.com/cong-viec-qa/?id=211', 1724412111, 1724412111),
(204, 212, 138, 29, 1724757840, 1724412290, 1, 0, NULL, NULL, 2, NULL, NULL, 1724412274, 1724412274),
(205, 206, 140, 24, 1724498700, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1724412349, 1724412349),
(206, 213, 144, 24, 1724575920, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1724435359, 1724435359),
(207, 214, 147, 29, 1724726640, 1724468815, 1, 2, 20, 1724468842, 1, '1000', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724467542, 1724468698),
(208, 215, 147, 29, 1724814660, 1724469107, 1, 2, 20, 1724469196, 1, '1000', 'https://dev.ngocbaomedia.com/tai-khoan/', 1724469066, 1724469066),
(209, 216, 147, 31, 1724574720, NULL, 0, 0, NULL, NULL, 0, NULL, NULL, 1724481038, 1724481038),
(210, 217, 136, 29, 1724660280, NULL, 3, 0, NULL, NULL, 0, NULL, NULL, 1724487549, 1724487549),
(211, 218, 136, 29, 1724833260, 1724487757, 1, 0, NULL, NULL, 2, NULL, NULL, 1724487701, 1724487701);

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

--
-- Đang đổ dữ liệu cho bảng `input_source`
--

INSERT INTO `input_source` (`id`, `name`, `stk`, `bank`, `author`, `status`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'Nguyễn Văn A', '2147483647', 1, 1, 1, 1719538342, 1719538342, 1),
(2, 'Nguyễn Văn A', '', 1, 1, 1, 1719538376, 1719538376, 1),
(3, 'Nguyễn Văn A', '', 50, 1, 1, 1719538492, 1719538492, 1),
(4, 'Nguyễn Văn A', '77465454664', 1, 1, 1, 1719538550, 1719538550, 1),
(5, 'Nguyễn Văn A', '', 42, 1, 1, 1719538807, 1719538807, 1),
(6, 'KIEU NGOC ANH', '57726638990828', 4, 1, 1, 1719544870, 1719544870, 1),
(7, 'Kiều long anh ', '739398', 3, 1, 1, 1719548565, 1719548565, 1),
(8, 'Nguyênc long an ', '1905002200201', 1, 7, 2, 1719634141, 1719634141, 1),
(9, 'Nguyễn Văn A', '2192983', 1, 7, 1, 1719637260, 1719637260, 1),
(10, 'nguyễn văn á', '343335533443', 4, 1, 1, 1719886372, 1719886372, 1),
(11, 'Nguyễn Văn C1111', '1234567891', 3, 1, 1, 1719886401, 1719886401, 1),
(12, 'Lan Anh ', '11111111111111111111111111111112223', 1, 1, 2, 1719972627, 1719972627, 1),
(13, 'bui anhanh', '123548024842', 2, 1, 1, 1721816290, 1721816290, 1),
(14, 'bá mạnh', '54454444455', 2, 1, 1, 1722221094, 1722221094, 1),
(15, 'mạnh ', '919912921', 2, 1, 1, 1722222719, 1722222719, 1),
(16, 'huhu', '777888887', 3, 1, 2, 1722222753, 1723523665, 1),
(17, 'kn', 'test', 49, 1, 1, 1722236305, 1722236305, 1),
(18, 'Nguyễn đinhg long anh ', '9292773', 49, 1, 2, 1722656280, 1724404220, 1),
(19, 'test 111', '1234567892', 4, 1, 1, 1724292141, 1724404363, 1),
(20, 'Bùi Thị Anh', '19050022002013456', 1, 1, 1, 1724385264, 1724727013, 0);

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

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `code`, `project_id`, `file_job`, `info`, `job_type`, `author`, `price`, `punish`, `status`, `completion_time`, `z_index`, `note_qa`, `note_ctv`, `note`, `status_qa`, `status_index`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, '000002_CV1', 2, NULL, 'test', 1, 1, 100000, 0, 1, NULL, 1, 'hhh', 'hh', 'hhh', 1, 1, 1719540806, 1719540806, 0),
(2, '000002_CV2', 2, NULL, 'test1', 2, 1, 20000, 1000, 1, NULL, 3, '', '', '', 1, 1, 1719540839, 1719540839, 0),
(3, '000001_CV1', 1, NULL, 'aaaaaaaaaaa', 2, 1, 10000000, 1, 0, NULL, 2, 'aaaaaaaaaa', 'aaaaaaa', 'aaaaaaaaaa', 1, 1, 1719542302, 1719542302, 0),
(4, '000001_CV2', 1, NULL, 'aaaaaaaaaaa', 1, 1, 10000000, 100000, 0, NULL, 2, 'aaaaaaaaaa', 'aaaaaaa', 'aaaaaaaaaa', 1, 1, 1719542303, 1719542303, 0),
(5, '000004_CV1', 4, '', 'test ', 2, 1, 10000, 0, 0, NULL, 5, '', '', '', 1, 0, 1719546277, 1724118713, 0),
(6, '000005_CV1', 5, NULL, 'test ', 2, 1, 10000, 0, 1, NULL, 2, '', '', '', 1, 0, 1719546625, 1719546625, 0),
(7, '000005_CV2', 5, NULL, 'hôm nay ', 2, 1, 10000, 0, 1, NULL, 1, '', '', '', 1, 0, 1719546729, 1719546729, 0),
(8, '000006_CV1', 6, NULL, 'gjggf', 2, 1, 7696, 0, 1, 1719547877, 2, '', '', '', 0, 1, 1719547839, 1719547839, 0),
(9, '000006_CV2', 6, NULL, 'hi', 2, 1, 1000, 0, 3, NULL, 0, '', '', '', 1, 1, 1719564931, 1719564931, 1),
(10, '000008_CV1', 8, NULL, 'hiki', 2, 7, 100000, 0, 1, NULL, 1, '', '', '', 1, 1, 1719625705, 1719625705, 0),
(11, '000008_CV2', 8, NULL, 'test ', 2, 7, 10000, 0, 1, NULL, 0, '', '', '', 1, 1, 1719625732, 1719625732, 0),
(12, '000008_CV3', 8, NULL, 'hihku', 2, 7, 10000, 0, 1, 1719630008, 2, '', '', '', 0, 1, 1719629873, 1719629873, 0),
(13, '000011_CV1', 11, NULL, 'hihh', 2, 7, 21000, 0, 3, NULL, 1, '', '', '', 1, 1, 1719641191, 1719641191, 1),
(14, '000010_CV1', 10, NULL, 'ihh\r\n', 2, 7, 89979, 0, 3, NULL, 5, '', '', '', 1, 1, 1719642172, 1719642172, 1),
(15, '000012_CV1', 12, NULL, 'test ', 2, 7, 1993823, 0, 3, NULL, 0, '', '', '', 1, 0, 1719642424, 1719642424, 1),
(16, '000012_CV2', 12, NULL, 'test ', 2, 7, 1993823, 7731, 0, NULL, 0, '', '', '', 1, 0, 1719642424, 1719642424, 0),
(17, '000013_CV1', 13, '', '86', 1, 1, 57887, 0, 0, NULL, 5, 'aaaaa\r\naaaaaa\r\naaaa\r\naaaa', '', 'aaaaaa\r\naaa', 0, 1, 1719642516, 1724118655, 0),
(18, '000007_CV1', 7, NULL, '7557', 2, 7, 788, 0, 3, NULL, 1, '', '', '', 1, 1, 1719642887, 1719642887, 1),
(19, '000007_CV2', 7, NULL, '7557', 2, 7, 788, 0, 3, NULL, 1, '', '', '', 1, 1, 1719642887, 1719642887, 1),
(20, '000007_CV3', 7, NULL, '7557', 2, 7, 788, 0, 3, NULL, 1, '', '', '', 1, 1, 1719642887, 1719642887, 1),
(21, '000014_CV1', 14, NULL, 'hiki', 2, 7, 10000, 0, 3, NULL, 1, '', '', '', 1, 1, 1719673268, 1719673268, 1),
(22, '000016_CV1', 16, NULL, 'hiki', 2, 7, 7736, 0, 1, NULL, 1, '', '', '', 1, 1, 1719744777, 1719744777, 0),
(23, '000016_CV2', 16, NULL, 'hii', 2, 7, 10000, 62773, 0, NULL, 1, '', '', '', 1, 0, 1719744799, 1719744799, 0),
(24, '000017_CV1', 17, NULL, 'hiki', 2, 7, 1000, 0, 1, 1719746265, 2, '', '', '', 0, 1, 1719746248, 1719746248, 0),
(25, '000018_CV1', 18, NULL, 'hiki', 2, 7, 1000, 0, 3, NULL, 1, '', '', '', 1, 1, 1719746372, 1719746372, 1),
(26, '000019_CV1', 19, NULL, '89484', 2, 7, 9309348, 0, 1, 1719746648, 0, '', '', '', 0, 0, 1719746638, 1719746638, 0),
(27, '000020_CV1', 20, NULL, 'hiki', 2, 7, 1000, 0, 3, NULL, 1, '', '', '', 0, 0, 1719746744, 1719746744, 1),
(28, '000021_CV1', 21, NULL, 'kihjd', 2, 7, 73837, 0, 1, NULL, 12, '', '', '', 1, 0, 1719747146, 1719747146, 0),
(29, '000023_CV1', 23, NULL, 'hiki', 2, 7, 10000, 776572, 1, NULL, 1, '', '', '', 1, 1, 1719803563, 1719803563, 0),
(30, '000023_CV2', 23, NULL, 'kiki', 2, 7, 12000, 7737, 1, NULL, 2, '', '', '', 1, 1, 1719803584, 1719803584, 0),
(31, '000025_CV1', 25, NULL, 'fff', 2, 7, 2243, 0, 1, 1719807127, 1, '', '', '', 0, 1, 1719807106, 1719807106, 0),
(32, '000026_CV1', 26, NULL, 'ff', 2, 7, 1213, 0, 3, NULL, 3, '', '', '', 0, 1, 1719807241, 1719807241, 1),
(33, '000027_CV1', 27, NULL, 'hiuu', 2, 7, 8987, 0, 1, 1719807453, 1, '', '', '', 0, 1, 1719807436, 1719807436, 0),
(34, '000028_CV1', 28, NULL, 'f', 2, 7, 445, 777, 1, NULL, 1, '', '', '', 1, 0, 1719807548, 1719807548, 0),
(35, '000029_CV1', 29, NULL, 'gjjb', 2, 7, 76788, 0, 1, NULL, 1, '', '', '', 1, 1, 1719808148, 1719808148, 0),
(36, '000029_CV2', 29, NULL, 'hkj', 2, 7, 667, 0, 1, NULL, 2, '', '', '', 1, 0, 1719808176, 1719808176, 0),
(37, '000030_CV1', 30, NULL, '333', 2, 7, 222, 0, 1, NULL, 0, '', '', '', 1, 1, 1719808371, 1719808371, 0),
(38, '000030_CV2', 30, NULL, '878', 2, 7, 2323, 0, 1, NULL, 0, '', '', '', 1, 0, 1719808466, 1719808466, 0),
(39, '000031_CV1', 31, NULL, 'hskskj', 2, 7, 1093993, 0, 1, NULL, 1, '', '', '', 1, 1, 1719809275, 1719809275, 0),
(40, '000031_CV2', 31, NULL, 'hikis', 2, 7, 1002929, 0, 3, NULL, 1, '', '', '', 1, 0, 1719809330, 1719809330, 1),
(41, '000033_CV1', 33, NULL, 'hikid', 1, 7, 89827, 10, 0, NULL, 1, '', '', '', 1, 0, 1719809922, 1719809922, 0),
(42, '000033_CV2', 33, NULL, 'hkskhdhdi', 1, 7, 928737, 0, 1, 1719810847, 1, '', '', '', 0, 1, 1719809987, 1719809987, 0),
(43, '000023_CV3', 23, NULL, 'hhhh\r\n', 2, 8, NULL, 0, 3, NULL, 1, NULL, '', NULL, 1, 0, 1719818540, 1719818540, 1),
(44, '000033_CV3', 33, NULL, 'hikijji', 2, 8, NULL, 0, 3, NULL, 1, NULL, '', NULL, 1, 1, 1719818616, 1719818616, 1),
(45, '000034_CV1', 34, NULL, 'hiki ', 2, 7, 1000, 0, 1, 1719826511, 1, '', '', '', 0, 1, 1719826044, 1719826044, 0),
(46, '000034_CV2', 34, NULL, 'hiki', 2, 7, 101028, 0, 1, 1719826488, 1, '', '', '', 0, 0, 1719826077, 1719826077, 0),
(47, '000035_CV1', 35, NULL, 'hkoisj', 2, 1, 232322, 0, 1, 1719828978, 0, '', '', '', 0, 0, 1719828634, 1719828634, 0),
(48, '000035_CV2', 35, NULL, 'hdkd', 2, 1, 92983273, 883, 1, NULL, 1, '', '', '', 1, 1, 1719828652, 1719828652, 0),
(49, '000036_CV1', 36, NULL, 'kihi', 2, 1, 9190837, 0, 3, NULL, 1, '', '', '', 1, 1, 1719829476, 1719829476, 1),
(50, '000040_CV1', 40, NULL, 'ksksjd', 2, 1, 2193938, 0, 1, NULL, 1, '', '', '', 1, 0, 1719831198, 1719831198, 0),
(51, '000043_CV1', 43, NULL, 'kjhh', 1, 1, 63938383, 0, 1, NULL, 1, '', '', '', 1, 1, 1719831573, 1719831573, 0),
(52, '000043_CV2', 43, NULL, 'd', 2, 1, 12343, 0, 3, NULL, 0, 'd', 'd', 'd', 1, 1, 1719831591, 1719831591, 1),
(53, '000043_CV3', 43, NULL, 'd', 2, 1, 123123, 0, 3, NULL, 0, 'd', 'd', 'd', 1, 0, 1719831608, 1719831608, 1),
(54, '000044_CV1', 44, NULL, 'hhhd', 1, 1, 7829732, 0, 3, NULL, 0, '', '', '', 1, 1, 1719831695, 1719831695, 1),
(55, '000044_CV2', 44, NULL, 'fff', 2, 1, 2133, 0, 3, NULL, 4, '', '', '', 1, 0, 1719831867, 1719831867, 1),
(56, '000045_CV1', 45, NULL, 'jojkdkj', 2, 1, 983939, 0, 1, NULL, 1, '', '', '', 1, 1, 1719850711, 1719850711, 0),
(57, '000045_CV2', 45, NULL, 'hj', 1, 1, 7799, 0, 3, NULL, 2, '', '', '', 1, 0, 1719850737, 1719850737, 1),
(58, '000046_CV1', 46, NULL, 'f', 2, 1, 12345, 0, 3, NULL, 0, 'f', 'd', 'f', 1, 1, 1719851398, 1719851398, 1),
(59, '000047_CV1', 47, NULL, 'jhjd\r\n', 1, 1, 929982, 0, 3, NULL, 1, '', '', '', 1, 1, 1719851586, 1719851586, 1),
(60, '000047_CV2', 47, NULL, 'jhjdkkd', 2, 1, 203, 0, 3, NULL, 0, '', '', '', 1, 0, 1719851606, 1719851606, 1),
(61, '000046_CV2', 46, NULL, 'ừ', 1, 1, 12323, 0, 3, NULL, 0, 'à', 'dfw', 'ăf', 0, 0, 1719851869, 1719851869, 1),
(62, '000034_CV3', 34, NULL, 'jhkhd', 1, 1, 8939, 0, 3, NULL, 1, '', '', '', 1, 1, 1719851921, 1719851921, 1),
(63, '000048_CV1', 48, NULL, 'ưefwef', 2, 1, 1234, 0, 1, NULL, 0, 'd', 'qưqwfef', 'ewfwef', 1, 1, 1719852029, 1719852029, 0),
(64, '000048_CV2', 48, NULL, 'ưqfqfwf', 2, 1, 123, 0, 3, NULL, 0, 'v', 'ừegrsvwe', 'gưegweg', 1, 0, 1719852053, 1719852053, 1),
(65, '000049_CV1', 49, NULL, 'gshsh', 2, 1, 2333, 0, 1, NULL, 1, '', '', '', 1, 0, 1719855259, 1719855259, 0),
(66, '000050_CV1', 50, NULL, 'hshsg', 1, 1, 1333, 0, 3, NULL, 1, '', '', '', 1, 0, 1719855511, 1719855511, 1),
(67, '000050_CV2', 50, NULL, '222', 2, 1, 233, 0, 3, NULL, 0, '', '', '', 1, 1, 1719855536, 1719855536, 1),
(68, '000050_CV3', 50, NULL, '222', 1, 1, 111, 0, 3, NULL, 0, '', '', '', 1, 1, 1719855550, 1719855550, 1),
(69, '000051_CV1', 51, NULL, 'f', 2, 1, 345432, 0, 1, NULL, 0, 'f', 'f', 'f', 1, 1, 1719859889, 1719859889, 0),
(70, '000051_CV2', 51, NULL, 'fasf', 2, 1, 323, 0, 3, NULL, 0, 'af', 'wrw', 'asfas', 1, 0, 1719859913, 1719859913, 1),
(71, '000055_CV1', 55, NULL, 'c', 2, 1, 234, 0, 1, NULL, 0, 'c', 'c', 'c', 1, 0, 1719888661, 1719888661, 0),
(72, '000053_CV1', 53, NULL, 'aaaaaaaa', 2, 1, 100000, 0, 3, NULL, 30, 'aaaaaa', 'aaaaaaaa', 'aaaaaaa', 1, 1, 1719889986, 1719889986, 1),
(73, '000054_CV1', 54, NULL, 'anadama', 1, 1, 100000, 0, 3, NULL, 30, 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaa', 'aaaaaaaaaaaa', 1, 1, 1719890375, 1719890375, 1),
(74, '000054_CV2', 54, NULL, 'aaaaaa', 4, 1, 100000, 0, 3, NULL, 30, 'aaaaaaaa', 'aaaaaaa', 'aaaaaa', 1, 1, 1719891665, 1719891665, 1),
(75, '000053_CV2', 53, NULL, 'aaaaa', 4, 1, 100000, 0, 3, NULL, 30, 'aaaaaaa', 'aaaaaaa', 'aaaaaa', 0, 1, 1719891737, 1719891737, 1),
(76, '000054_CV3', 54, NULL, 'aaaaaaaa', 4, 1, 100000, 0, 3, NULL, 30, 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaa', 1, 0, 1719891774, 1719891774, 1),
(77, '000054_CV4', 54, NULL, 'aaaaaaaaa', 2, 1, 10000, 0, 3, NULL, 30, 'aaaaaaaa', 'aaaaaaa', 'aaaaaaaaaaa', 0, 0, 1719891806, 1719891806, 1),
(78, '000056_CV1', 56, NULL, 'aaaaaa', 1, 1, 100000, 0, 1, NULL, 31, 'aaaaa', 'aaaaa', 'aaaaaa', 1, 1, 1719892050, 1719892050, 0),
(79, '000057_CV1', 57, 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=022222', 'aaaaaaaa', 17, 1, 100000, 0, 1, NULL, 30, 'aaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaa', 1, 1, 1719893331, 1723004073, 0),
(80, '000057_CV2', 57, NULL, 'aaaa', 1, 1, 100000, 0, 1, NULL, 31, 'aaaaaaa', 'aaaaaa', 'aaaaa', 1, 1, 1719902385, 1719902385, 0),
(81, '000057_CV3', 57, NULL, 'aaaaaaaa', 1, 8, NULL, 0, 1, NULL, 31, NULL, 'aaaa', NULL, 1, 0, 1719904258, 1719904258, 0),
(82, '000057_CV4', 57, '', 'aaaaaaaaa', 1, 1, 100000, 10000, 1, NULL, 50, '', 'aaaaaa', '', 1, 0, 1719904526, 1723419568, 0),
(83, '000057_CV5', 57, NULL, 'aaaaaaa', 2, 1, 100000, 0, 3, NULL, 60, 'aaaaaaaa', 'aaaaa', 'aaaaaaa', 0, 1, 1719907881, 1719907881, 1),
(84, '000058_CV1', 58, NULL, 'kshsh', 6, 1, 12212, 0, 1, NULL, 1, '', '', '', 1, 0, 1719909441, 1719909441, 0),
(85, '000059_CV1', 59, NULL, 'hikihh', 5, 1, 19837, 0, 1, NULL, 1, '', '', '', 1, 1, 1719909751, 1719909751, 0),
(86, '000059_CV2', 59, NULL, 'kidhi', 5, 1, 1838763, 0, 1, NULL, 1, '', '', '', 1, 0, 1719909781, 1719909781, 0),
(87, '000060_CV1', 60, NULL, 'kiki', 5, 1, 10099, 0, 1, 1719911317, 1, '', '', '', 0, 0, 1719911297, 1719911297, 0),
(88, '000057_CV6', 57, NULL, 'aaaaa', 1, 1, 100000, 0, 1, 1719926068, 0, 'aaaaaaaaa', 'aaaaaa', 'aaaaaaaa', 0, 0, 1719911990, 1719911990, 0),
(89, '000061_CV1', 61, 'https://www.youtube.com/watch?v=qESUoOwzwaI', 'eeeeee', 16, 1, 200, 10000, 1, NULL, 1, 'eeeeeeeeee', 'eeeeeee', 'eeeeeeeee', 1, 1, 1719912293, 1722909955, 0),
(90, '000061_CV2', 61, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'kaka', 16, 1, 200000, 9000, 1, NULL, 1, 'ajs', 'nnnnnnnn', 'nnnnnn', 0, 0, 1719912363, 1722833619, 0),
(91, '000061_CV3', 61, NULL, 'aaaaaaa', 1, 1, 100300, 0, 3, NULL, 61, 'aaaaaa', 'aaaaa', 'aaaaaaa', 0, 1, 1719912400, 1719912400, 1),
(92, '000061_CV4', 61, NULL, 'aaaaaa', 1, 1, 100304, 0, 3, NULL, 60, 'aaaaaaaa', 'aaaaaaa', 'aaaaaaa', 1, 1, 1719912435, 1719912435, 1),
(93, '000062_CV1', 62, NULL, '9383747', 5, 1, 44455, 0, 3, NULL, 11, '', '', '', 1, 1, 1719912728, 1719912728, 1),
(94, '000063_CV1', 63, NULL, 'jddjjd', 6, 1, 1333, 0, 1, 1719915347, 2, '', '', '', 0, 1, 1719914893, 1719914893, 0),
(95, '000063_CV2', 63, NULL, 'hiki', 5, 1, 899338, 0, 1, NULL, 2, '', '', '', 1, 0, 1719915332, 1719915332, 0),
(96, '000064_CV1', 64, NULL, 'dd', 2, 1, 8988, 388383, 1, NULL, 1, '', '', '', 1, 0, 1719915961, 1719915961, 0),
(97, '000064_CV2', 64, NULL, 'jhh', 4, 1, 899, 0, 1, 1719916134, 0, '', '', '', 0, 0, 1719915981, 1719915981, 0),
(98, '000065_CV1', 65, NULL, 'ddd', 4, 1, 1232, 0, 3, NULL, 2, '', '', '', 1, 0, 1719916496, 1719916496, 1),
(99, '000066_CV1', 66, NULL, '9934887', 4, 1, 789992, 0, 1, NULL, 1, '', '', '', 1, 1, 1719916620, 1719916620, 0),
(100, '000066_CV2', 66, NULL, 'kihi ', 5, 1, 8933988, 0, 0, NULL, 1, '', '', '', 1, 1, 1719916670, 1719916670, 0),
(101, '000066_CV3', 66, NULL, 'fff', 4, 8, NULL, 100000, 0, NULL, 1, NULL, '', NULL, 1, 0, 1719917345, 1719917345, 0),
(102, '000068_CV1', 68, NULL, 'hiki', 2, 1, 133, 0, 1, NULL, 1, '', '', '', 1, 1, 1719920213, 1719920213, 0),
(103, '000069_CV1', 69, NULL, '89', 2, 16, 987, 0, 1, NULL, 1, '', '', '', 1, 1, 1719922277, 1719922277, 0),
(104, '000069_CV2', 69, NULL, 'ljh\r\n', 5, 16, 9898, 87874, 0, NULL, 1, '', '', '', 1, 1, 1719922554, 1719922554, 0),
(105, '000071_CV1', 71, NULL, 'dcdss', 5, 16, 223224, 0, 1, 1719923756, 1, '', '', '', 0, 0, 1719923746, 1719923746, 0),
(106, '000072_CV1', 72, NULL, 'sdssd', 5, 16, 11232, 0, 1, 1719924049, 1, '', '', '', 0, 0, 1719924039, 1719924039, 0),
(107, '000072_CV2', 72, NULL, 'hjsjjs', 4, 16, 882727, 7373, 1, NULL, 1, '', '', '', 1, 0, 1719924298, 1719924298, 0),
(108, '000074_CV1', 74, NULL, 'dddaaddaad', 9, 1, 123112, 0, 3, NULL, 1, '', '', '', 1, 0, 1719976034, 1719976034, 1),
(109, '000075_CV1', 75, NULL, 'fdsfsdffghfh', 5, 1, 42345, 773734, 1, NULL, 1, '', '', '', 1, 0, 1719976311, 1719976311, 0),
(110, '000075_CV2', 75, NULL, 'ưdjidhud', 6, 1, 133, 33, 1, NULL, 1, '', '', '', 1, 0, 1719977620, 1719977620, 0),
(111, '000077_CV1', 77, NULL, 'fef', 5, 1, 38983, 0, 1, 1719978450, 1, '', '', '', 0, 0, 1719978439, 1719978439, 0),
(112, '000077_CV2', 77, NULL, 'ffds', 4, 1, 10000000, 0, 1, 1719979766, 1, '', '', '', 0, 0, 1719979754, 1719979754, 0),
(113, '000077_CV3', 77, NULL, 'đjhd', 4, 1, 100000000, 10000000, 1, NULL, 1, '', '', '', 1, 0, 1719979847, 1719979847, 0),
(114, '000078_CV1', 78, NULL, 'kmns\r\n', 4, 16, 99898, 0, 3, NULL, 1, '', '', '', 1, 1, 1721206788, 1721206788, 1),
(115, '000078_CV2', 78, NULL, '1111', 2, 1, 1111, 0, 3, NULL, 1, '11', '1111', '111', 1, 1, 1721206805, 1721206805, 1),
(116, '000078_CV3', 78, NULL, '1111', 2, 1, 1111, 0, 3, NULL, 1, '11', '1111', '111', 1, 1, 1721206806, 1721206806, 1),
(117, '000085_CV1', 85, NULL, 'ett', 4, 1, 10000, 0, 3, NULL, 1, '', '', '', 1, 1, 1721268869, 1721268869, 1),
(118, '000085_CV2', 85, NULL, 'dff', 4, 1, 443434, 0, 3, NULL, 1, '', '', '', 1, 1, 1721268916, 1721268916, 1),
(119, '000084_CV1', 84, NULL, 'jhjhhsh', 5, 1, 100000, 0, 3, NULL, 0, '', '', '', 1, 1, 1721269462, 1721269462, 1),
(120, '000088_CV1', 88, NULL, 'kịii', 2, 1, 10000000, 0, 3, NULL, 1, '', '', '', 1, 1, 1721293397, 1721293397, 1),
(121, '000091_CV1', 91, NULL, 'aaaaaa', 1, 1, 10000, 0, 3, NULL, 21, 'aaaaaaa', 'aaaa', 'aaaaaaaaa', 1, 1, 1721357768, 1721357768, 1),
(122, '000091_CV2', 91, NULL, 'aaaaaa', 1, 1, 10000, 0, 3, NULL, 21, 'aaaaaaa', 'aaaa', 'aaaaaaaaa', 1, 1, 1721357769, 1721357769, 1),
(123, '000091_CV3', 91, NULL, 'aaaaaaaaa', 5, 1, 100000, 0, 3, NULL, 25, 'aaaaaaaa', 'aaaaaaaaa', 'aaaaaaaa', 1, 1, 1721357800, 1721357800, 1),
(124, '000089_CV1', 89, NULL, 'gggh', 8, 1, 356677, 0, 3, NULL, 1, '', '', '', 1, 1, 1721358029, 1721358029, 1),
(125, '000023_CV4', 23, 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaa', 2, 1, 10000, 0, 3, NULL, 10, '', '', '', 1, 1, 1721726691, 1721726691, 1),
(126, '000092_CV1', 92, 'https://www.figma.com/design/fyM7n5O62zO4f1wYD28M2W/Untitled?node-id=0-1&t=KnqaOG6oJVSZQqfZ-1', 'ssdsdsaas', 8, 1, 132311, 0, 3, NULL, 1, '', '', '', 1, 1, 1721726758, 1721726758, 1),
(127, '000093_CV1', 93, 'https://vietqr.io/hien-trang-vietqr/', 'aaaa', 2, 1, 10000, 0, 3, NULL, 10, 'aaaa', 'aaa', 'aaaa', 1, 1, 1721727565, 1721727565, 1),
(128, '000098_CV1', 98, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'aaaaa', 5, 1, 10000, 0, 3, NULL, 1, 'aaaa', 'aa', 'aaaaaaaa', 1, 1, 1721747106, 1721747106, 1),
(129, '000098_CV2', 98, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'aaaaa', 5, 1, 10000, 0, 3, NULL, 1, 'aaaa', 'aa', 'aaaaaaaa', 1, 1, 1721747108, 1721747108, 1),
(130, '000098_CV3', 98, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'aaaaa', 4, 1, 10000, 0, 3, NULL, 10, 'aaaa', 'aaaaaa', 'aaaa', 1, 1, 1721747159, 1721747159, 1),
(131, '000098_CV4', 98, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'aaaaa', 4, 1, 10000, 0, 3, NULL, 10, 'aaaa', 'aaaaaa', 'aaaa', 1, 1, 1721747159, 1721747159, 1),
(132, '000099_CV1', 99, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'aaaaaaa', 2, 1, 10000, 0, 3, NULL, 10, 'aaaaaaaa', 'aaaaaa', 'aaaaaa', 1, 1, 1721747361, 1721747361, 1),
(133, '000099_CV2', 99, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'aaaaaa', 4, 1, 100000, 0, 3, NULL, 10, 'aaaaa', 'aaa', 'aaaaa', 1, 1, 1721747406, 1721747406, 1),
(134, '000099_CV3', 99, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'a', 2, 1, 10000, 0, 3, NULL, 10, 'a', 'a', 'a', 1, 1, 1721747874, 1721747874, 1),
(135, '000030_CV3', 30, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'aaaaaa', 4, 1, 10000, 0, 3, NULL, 10, 'aaaaaa', 'aaaa', 'aaaaaaa', 1, 1, 1721748000, 1721748000, 1),
(136, '000103_CV1', 103, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jj', 8, 20, NULL, 100000, 1, NULL, 1, NULL, '', NULL, 1, 1, 1721967762, 1721967762, 0),
(137, '000102_CV1', 102, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'ygu', 5, 1, 78878, 1000, 1, NULL, 1, '', '', '', 1, 1, 1721983313, 1721983313, 0),
(138, '000102_CV2', 102, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'Hu hu ', 10, 1, 78878, 0, 1, NULL, 2, '', '', '', 1, 1, 1721983340, 1721983340, 0),
(139, '000103_CV2', 103, '', 'gghjjh', 6, 1, 87887, 0, 3, NULL, 0, '', '', '', 1, 1, 1721983544, 1721983544, 1),
(140, '000102_CV3', 102, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhjhjh\r\n', 11, 1, 87999909, 0, 3, NULL, 1, '', '', '', 1, 1, 1721985018, 1721985018, 1),
(141, '000019_CV2', 19, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'ij', 15, 20, NULL, 0, 3, NULL, 1, NULL, '', NULL, 1, 0, 1722235342, 1722235342, 1),
(142, '000104_CV1', 104, '', 'jhhjj', 15, 1, 878, 0, 3, NULL, 0, '', '', '', 1, 1, 1722239796, 1722239796, 1),
(143, '000103_CV3', 103, 'https://www.youtube.com/watch?v=qESUoOwzwaI', 'jhsjs', 17, 1, 19090099, 19909, 1, 1722239915, 1, 'eeeeeeeeee', 'eeeeeeee', 'eeeeeeeee', 1, 1, 1722239844, 1722911371, 0),
(144, '000019_CV3', 19, 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaaaaaaaaaaa', 15, 20, NULL, 0, 3, NULL, 0, NULL, 'aaaaaaaaa', NULL, 1, 0, 1722248836, 1722248836, 1),
(145, '000104_CV2', 104, 'https://pm.ngocbaomedia.com/them-du-an/', '444', 16, 1, 33443, 0, 3, NULL, 60, '', 'aaaaaaaaa', '', 1, 1, 1722248868, 1722658965, 1),
(146, '000060_CV2', 60, '', 'kjskj', 17, 1, 0, 0, 3, NULL, 0, '', '', '', 1, 0, 1722658918, 1722658918, 1),
(148, '000105_CV1', 105, 'https://www.figma.com/design/fyM7n5O62zO4f1wYD28M2W/Untitled?node-id=0-1&t=KnqaOG6oJVSZQqfZ-1', 'ffs', 17, 1, 10000, 1001, 1, NULL, 1, '', '', '', 1, 1, 1722917764, 1722917764, 0),
(149, '000106_CV1', 106, 'https://www.figma.com/design/fyM7n5O62zO4f1wYD28M2W/Untitled?node-id=0-1&t=KnqaOG6oJVSZQqfZ-1', 'jjjhjh', 17, 1, 232332, 1000, 1, 1724233812, 1, '', '', '', 0, 1, 1722918445, 1722919595, 0),
(150, '000109_CV1', 109, 'https://www.youtube.com/watch?v=LQbTRcJKbUI', 'aaa', 16, 1, 1000000, 0, 0, NULL, 1, 'aaa', 'aaa', 'aaa', 1, 1, 1722938399, 1722938399, 0),
(151, '000108_CV1', 108, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'eeeeeee', 17, 1, 200000, 29, 0, NULL, 1, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '', 'hhhhhhhhhhhhhhhhhhhh', 1, 1, 1722961424, 1724295832, 0),
(152, '000110_CV1', 110, 'https://dev.ngocbaomedia.com/quan-ly-cong-viec/', 'hhhhh', 16, 1, 10000, 1000, 1, NULL, 1, 'uuuuuuu', 'uuuuuu', 'uuuuuuuu', 1, 1, 1723004144, 1723086444, 0),
(153, '000110_CV2', 110, 'https://dev.ngocbaomedia.com/sua-cong-viec/153', 'hiuhu', 16, 1, 10000, 2000, 0, NULL, 1, '333333333', '3333333333', '33333333', 1, 1, 1723018998, 1723109874, 0),
(154, '000110_CV3', 110, 'https://dev.ngocbaomedia.com/quan-ly-cong-viec/', 'eeee', 16, 1, 10000, 1000, 1, NULL, 1, 'eee', 'eee', 'eee', 1, 1, 1723019329, 1723086545, 0),
(155, '000112_CV1', 112, 'https://sic88.art/', 'e', 17, 1, 2345, 200, 1, NULL, 0, '', '', '', 1, 1, 1723421507, 1723436239, 0),
(156, '000102_CV4', 102, 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaa', 16, 1, 100000, 0, 0, NULL, 1, 'aaaa', 'aaaa', 'aaa', 1, 1, 1723427424, 1723427424, 0),
(157, '000112_CV2', 112, 'https://vietqr.io/hien-trang-vietqr/', 'aaa', 16, 1, 10, 0, 0, NULL, 1, '', 'a', '', 0, 1, 1723427584, 1723520433, 0),
(158, '000113_CV1', 113, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'aaa', 16, 1, 10000, 10, 1, NULL, 1, 'aaaa', 'aa', 'aaa', 1, 1, 1723428558, 1723428558, 0),
(159, '000113_CV2', 113, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'aaaaaaaaa', 16, 1, 1000, 10000, 1, NULL, 1, 'aaaaaa', 'aaaa', 'aaaaaaa', 1, 1, 1723428626, 1723428626, 0),
(160, '000114_CV1', 114, '', 'fff', 17, 1, 1332, 0, 3, NULL, 0, '', '', '', 1, 1, 1723435220, 1723435220, 0),
(161, '000114_CV2', 114, '', 'fff', 17, 1, 1332, 0, 3, NULL, 0, '', '', '', 1, 1, 1723435223, 1723435223, 0),
(162, '000113_CV3', 113, 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=022222', 'aaaa', 17, 1, 1000, 0, 1, NULL, 1, 'aaaa', 'aaaa', 'aaaa', 1, 1, 1723450534, 1723450534, 0),
(163, '000113_CV4', 113, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'aaaaaaa', 16, 1, 10000, 10000, 1, NULL, 1, 'aaaaa', 'aaaaaa', 'aaaaaa', 1, 1, 1723450595, 1723450595, 0),
(164, '000115_CV1', 115, 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=022222', 'aaa', 17, 1, 10000, 0, 3, NULL, 1, 'aaa', 'aa', 'aaa', 1, 1, 1723450904, 1723450904, 0),
(165, '000113_CV5', 113, 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=022222', 'aaa', 17, 1, 1000, 0, 0, NULL, 1, 'aaa', 'aa', 'aa', 1, 1, 1723453797, 1723453797, 0),
(166, '000117_CV1', 117, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'uyhh', 17, 1, 200000, 10, 1, NULL, 1, '', '', '', 1, 1, 1723454624, 1723454652, 0),
(167, '000118_CV1', 118, 'https://www.youtube.com/', 'hjjasjsjs', 17, 1, 200000, 0, 1, 1723456012, 1, '', '', '', 0, 1, 1723455863, 1723455998, 0),
(168, '000118_CV2', 118, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jjd', 17, 1, 200000, 0, 1, 1723456098, 1, '', '', '', 0, 1, 1723455905, 1723455905, 0),
(169, '000119_CV1', 119, 'https://www.youtube.com/', 'hgghg', 17, 1, 200000, 0, 1, NULL, 1, '', '', '', 1, 1, 1723456765, 1723456765, 0),
(170, '000119_CV2', 119, 'https://www.youtube.com/', 'huhuhuhuhhuh', 16, 1, 200, 0, 1, 1723457052, 1, '', '', '', 0, 1, 1723456815, 1723456893, 0),
(171, '000120_CV1', 120, 'https://www.youtube.com/', 'huhu', 17, 1, 200000000, 0, 1, 1723515691, 1, 'h', 'h', 'h', 0, 0, 1723515679, 1723515679, 0),
(172, '000121_CV1', 121, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 't', 17, 1, 200000, 12, 1, NULL, 1, 't', 't', 't', 1, 1, 1723518692, 1723518692, 0),
(173, '000121_CV2', 121, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'fdjfdjfj', 16, 1, 200000, 0, 1, 1723519993, 1, '', '', '', 0, 1, 1723519917, 1723519917, 0),
(174, '000122_CV1', 122, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'h', 17, 1, 200000, 0, 1, 1723520668, 1, '', '', '', 0, 1, 1723520632, 1723520632, 0),
(175, '000122_CV2', 122, '', 'jhjh', 17, 1, 200000, 545, 1, NULL, 1, '', '', '', 1, 1, 1723520654, 1723520654, 0),
(176, '000122_CV3', 122, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'h', 17, 1, 20000, 0, 0, NULL, 1, '', '', '', 1, 1, 1723521008, 1723521008, 0),
(177, '000123_CV1', 123, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', '1', 16, 1, 20000, 1132, 0, NULL, 1, '', '', '', 1, 1, 1723521258, 1723521735, 0),
(178, '000124_CV1', 124, '', 'h\r\n', 17, 1, 20000, 0, 3, NULL, 1, '', '', '', 1, 1, 1723521500, 1723521500, 0),
(179, '000123_CV2', 123, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'h\r\n', 17, 1, 20000, 0, 0, NULL, 1, '', '', '', 1, 1, 1723521591, 1723521591, 0),
(180, '000125_CV1', 125, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'h\r\n', 17, 1, 200000, 0, 0, NULL, 1, '', '', '', 1, 1, 1723522759, 1723522759, 0),
(181, '000125_CV2', 125, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'ghhg', 17, 1, 200000, 0, 0, NULL, 1, '', '', '', 1, 1, 1723522779, 1723522779, 0),
(182, '000126_CV1', 126, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'kjd\r\n', 17, 1, 11, 0, 0, NULL, 1, '', '', '', 1, 1, 1723522906, 1723522906, 0),
(183, '000126_CV2', 126, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'uhh', 16, 1, 200000, 0, 3, NULL, 1, '', '', '', 1, 1, 1723523582, 1723523582, 1),
(184, '000125_CV3', 125, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 17, 1, 20000, 1000, 1, NULL, 1, 'h', 'h', 'h', 1, 0, 1724032394, 1724032394, 0),
(185, '000118_CV3', 118, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 16, 1, 200000, 0, 0, NULL, 1, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1, 1, 1724206136, 1724295911, 0),
(186, '000117_CV2', 117, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'h', 17, 1, 200000, 0, 1, 1724811163, 1, 'h', 'h', 'h', 0, 0, 1724206292, 1724206292, 0),
(187, '000072_CV3', 72, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'huhu', 17, 1, 200000, 0, 0, NULL, 1, 'huhu', 'huhu', 'huhu', 0, 1, 1724206700, 1724206700, 0),
(188, '000077_CV4', 77, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'h', 17, 1, 200000, 0, 1, 1724209516, 1, '', '', '', 0, 1, 1724209379, 1724209379, 0),
(189, '000128_CV1', 128, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhhh', 17, 1, 20000, 0, 1, 1724296743, 1, '', '', '', 0, 0, 1724296710, 1724296710, 0),
(190, '000127_CV1', 127, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhjhjj', 17, 1, 20000, 0, 0, NULL, 1, '', '', '', 1, 0, 1724296955, 1724296955, 0),
(191, '000129_CV1', 129, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', '12', 18, 1, 20000, 1, 1, NULL, 1, '', '', '', 1, 0, 1724297842, 1724297842, 0),
(192, '000130_CV1', 130, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhh', 16, 1, 20000, 1000, 1, NULL, 1, '', '', '', 1, 1, 1724298694, 1724298694, 0),
(193, '000130_CV2', 130, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhhh\r\n', 16, 1, 20000, 1, 1, NULL, 1, '', '', '', 1, 0, 1724298739, 1724298739, 0),
(194, '000002_CV3', 2, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', '1', 17, 30, 11, 0, 0, NULL, 0, '', '', '', 1, 1, 1724300410, 1724300410, 0),
(195, '000130_CV3', 130, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 19, 1, 20000, 0, 3, NULL, 1, 'h', 'h', 'h', 1, 1, 1724322560, 1724322560, 1),
(196, '000131_CV1', 131, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhd', 18, 30, 20000, 0, 3, NULL, 1, '', '', '', 1, 1, 1724381383, 1724381383, 0),
(197, '000130_CV4', 130, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', '1', 17, 30, 20000, 1, 1, NULL, 1, '1', '1', '1', 1, 0, 1724385180, 1724385180, 0),
(198, '000132_CV1', 132, 'https://dev.ngocbaomedia.com/them-du-an/', 'a', 16, 1, 100000, 0, 0, NULL, 1, 'a', 'â', 'a', 1, 1, 1724401562, 1724401562, 0),
(199, '000130_CV5', 130, 'https://dev.ngocbaomedia.com/them-du-an/', 'a', 16, 1, 100000, 0, 0, NULL, 1, 'a', 'a', 'a', 1, 1, 1724401601, 1724401601, 0),
(200, '000132_CV2', 132, 'https://dev.ngocbaomedia.com/them-du-an/', 'a', 17, 1, 100000, 0, 0, NULL, 1, 'a', 'a', 'a', 1, 1, 1724401781, 1724401781, 0),
(201, '000133_CV1', 133, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 16, 30, 20000, 10000, 1, NULL, 1, 'h', 'h', 'h', 1, 1, 1724401969, 1724401969, 0),
(202, '000133_CV2', 133, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 18, 30, 20000, 0, 3, NULL, 1, '', '', '', 1, 1, 1724401995, 1724401995, 1),
(203, '000134_CV1', 134, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhh', 16, 30, 20000, 87, 1, NULL, 1, '', '', '', 1, 1, 1724402801, 1724402829, 0),
(204, '000135_CV1', 135, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 16, 30, 20000, 0, 1, 1724407799, 1, 'h', 'h', 'h', 0, 1, 1724407713, 1724407777, 0),
(205, '000135_CV2', 135, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hh', 21, 30, 20000, 12000, 1, NULL, 1, '', '', '', 1, 1, 1724407745, 1724407745, 0),
(206, '000140_CV1', 140, 'https://www.facebook.com/groups/hoireviewcongtycotam/', 'Dự án này tập trung vào việc phát triển một ứng dụng hoặc công cụ có khả năng nhận diện các vật thể màu xanh lá cây với tốc độ di chuyển nhanh, sau đó tự động click vào các vật thể này.\r\n\r\nMột yêu cầu quan trọng của dự án là chương trình phải hoạt động một cách hoàn toàn tự động mà không cần sự can thiệp của người dùng. Điều này bao gồm việc không hiển thị cửa sổ \'Live Screen\' cho người dùng, giúp đảm bảo trải nghiệm mượt mà và không gây rối loạn cho họ.\r\n\r\nMục tiêu của dự án là tạo ra một công cụ mạnh mẽ và chính xác, có thể hoạt động trên các ứng dụng khác đang mở trên màn hình. Điều này đòi hỏi kỹ thuật cao trong việc nhận diện màu sắc và xử lý hình ảnh theo thời gian thực, đồng thời đảm bảo rằng tốc độ click luôn nhanh và chính xác để bắt kịp với tốc độ di chuyển của vật thể.\r\n\r\nNgoài ra, dự án cần đảm bảo rằng việc click vào vật thể không gây ra bất kỳ ảnh hưởng tiêu cực nào đến hoạt động của các ứng dụng khác, đồng thời duy trì sự ổn định của hệ thống trong suốt quá trình vận hành.', 18, 1, 100000, 0, 0, NULL, 1, 'Dự án này tập trung vào việc phát triển một ứng dụng hoặc công cụ có khả năng nhận diện các vật thể màu xanh lá cây với tốc độ di chuyển nhanh, sau đó tự động click vào các vật thể này.\r\n\r\nMột yêu cầu quan trọng của dự án là chương trình phải hoạt động một cách hoàn toàn tự động mà không cần sự can thiệp của người dùng. Điều này bao gồm việc không hiển thị cửa sổ \'Live Screen\' cho người dùng, giúp đảm bảo trải nghiệm mượt mà và không gây rối loạn cho họ.\r\n\r\nMục tiêu của dự án là tạo ra một công cụ mạnh mẽ và chính xác, có thể hoạt động trên các ứng dụng khác đang mở trên màn hình. Điều này đòi hỏi kỹ thuật cao trong việc nhận diện màu sắc và xử lý hình ảnh theo thời gian thực, đồng thời đảm bảo rằng tốc độ click luôn nhanh và chính xác để bắt kịp với tốc độ di chuyển của vật thể.\r\n\r\nNgoài ra, dự án cần đảm bảo rằng việc click vào vật thể không gây ra bất kỳ ảnh hưởng tiêu cực nào đến hoạt động của các ứng dụng khác, đồng thời duy trì sự ổn định của hệ thống trong suốt quá trình vận hành.', 'Dự án này tập trung vào việc phát triển một ứng dụng hoặc công cụ có khả năng nhận diện các vật thể màu xanh lá cây với tốc độ di chuyển nhanh, sau đó tự động click vào các vật thể này.\r\n\r\nMột yêu cầu quan trọng của dự án là chương trình phải hoạt động một cách hoàn toàn tự động mà không cần sự can thiệp của người dùng. Điều này bao gồm việc không hiển thị cửa sổ \'Live Screen\' cho người dùng, giúp đảm bảo trải nghiệm mượt mà và không gây rối loạn cho họ.\r\n\r\nMục tiêu của dự án là tạo ra một công cụ mạnh mẽ và chính xác, có thể hoạt động trên các ứng dụng khác đang mở trên màn hình. Điều này đòi hỏi kỹ thuật cao trong việc nhận diện màu sắc và xử lý hình ảnh theo thời gian thực, đồng thời đảm bảo rằng tốc độ click luôn nhanh và chính xác để bắt kịp với tốc độ di chuyển của vật thể.\r\n\r\nNgoài ra, dự án cần đảm bảo rằng việc click vào vật thể không gây ra bất kỳ ảnh hưởng tiêu cực nào đến hoạt động của các ứng dụng khác, đồng thời duy trì sự ổn định của hệ thống trong suốt quá trình vận hành.', 'Dự án này tập trung vào việc phát triển một ứng dụng hoặc công cụ có khả năng nhận diện các vật thể màu xanh lá cây với tốc độ di chuyển nhanh, sau đó tự động click vào các vật thể này.\r\n\r\nMột yêu cầu quan trọng của dự án là chương trình phải hoạt động một cách hoàn toàn tự động mà không cần sự can thiệp của người dùng. Điều này bao gồm việc không hiển thị cửa sổ \'Live Screen\' cho người dùng, giúp đảm bảo trải nghiệm mượt mà và không gây rối loạn cho họ.\r\n\r\nMục tiêu của dự án là tạo ra một công cụ mạnh mẽ và chính xác, có thể hoạt động trên các ứng dụng khác đang mở trên màn hình. Điều này đòi hỏi kỹ thuật cao trong việc nhận diện màu sắc và xử lý hình ảnh theo thời gian thực, đồng thời đảm bảo rằng tốc độ click luôn nhanh và chính xác để bắt kịp với tốc độ di chuyển của vật thể.\r\n\r\nNgoài ra, dự án cần đảm bảo rằng việc click vào vật thể không gây ra bất kỳ ảnh hưởng tiêu cực nào đến hoạt động của các ứng dụng khác, đồng thời duy trì sự ổn định của hệ thống trong suốt quá trình vận hành.', 1, 1, 1724407999, 1724412349, 0),
(207, '000136_CV1', 136, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhhj', 21, 30, 20000, 1, 1, NULL, 1, '', '', '', 1, 0, 1724408891, 1724408891, 0),
(208, '000137_CV1', 137, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 16, 30, 20000, 1, 0, NULL, 1, '', '', '', 1, 1, 1724409284, 1724409371, 0),
(209, '000137_CV2', 137, '', 'h', 16, 30, 346, 0, 0, NULL, 0, '', '', '', 1, 1, 1724409317, 1724409317, 0),
(210, '000141_CV1', 141, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 18, 30, 788787, 0, 1, 1724410297, 1, 'h', 'h', 'h', 0, 0, 1724410230, 1724410230, 0),
(211, '000137_CV3', 137, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 18, 30, 788787, 100, 0, NULL, 1, '', '', '', 1, 1, 1724412111, 1724412111, 0),
(212, '000138_CV1', 138, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhh', 18, 30, 788787, 0, 0, NULL, 0, '', '1', '', 1, 1, 1724412274, 1724412274, 0),
(213, '000144_CV1', 144, 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaaa', 18, 1, 10000, 0, 0, NULL, 1, 'aaaa', 'aaa', 'aaaa', 1, 1, 1724435359, 1724435359, 0),
(214, '000147_CV1', 147, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'hhhh', 18, 30, 1000, 1, 1, NULL, 1, '', 'h', '', 1, 1, 1724467542, 1724468698, 0),
(215, '000147_CV2', 147, 'https://dev.ngocbaomedia.com/them-cong-viec/', 'hhh', 18, 20, NULL, 1, 1, NULL, 1, NULL, '', NULL, 1, 1, 1724469066, 1724469066, 0),
(216, '000147_CV3', 147, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'aaaaaaa', 16, 1, 1000, 0, 0, NULL, 1, 'aaaaaaa', 'aaaaaa', 'aaaa', 1, 1, 1724481038, 1724481038, 0),
(217, '000136_CV2', 136, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhj', 18, 30, 788787, 0, 3, NULL, 1, '', '', '', 1, 1, 1724487549, 1724487549, 1),
(218, '000136_CV3', 136, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 18, 30, 788787, 0, 0, NULL, 1, '', '', '', 1, 1, 1724487701, 1724487701, 0);

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

--
-- Đang đổ dữ liệu cho bảng `job_index`
--

INSERT INTO `job_index` (`id`, `name`, `author`, `status`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'hôm nay ', 1, 1, 1719538625, 1719538625, 1),
(2, 'Nguyễn Văn AAa', 7, 1, 1719638073, 1719638073, 1),
(3, 'KIEU NGOC ANH1', 1, 2, 1719828482, 1719828482, 1),
(4, 'đầu viêc 11', 1, 1, 1719885998, 1719885998, 1),
(5, 'Đầu việc 2', 1, 2, 1719886008, 1719886008, 1),
(6, 'Đầu việc 3', 1, 1, 1719886017, 1719886017, 1),
(7, 'Đầu việc 4', 1, 1, 1719886029, 1719886029, 1),
(8, 'Bùi Thị Anh', 1, 1, 1719973386, 1719973386, 1),
(9, 'Nguyễn Văn A', 1, 1, 1719975311, 1719975311, 1),
(10, 'bui anhanh', 1, 1, 1721815062, 1721815062, 1),
(11, 'Anh Mạnh', 1, 1, 1722049326, 1722049326, 1),
(12, 'mạnh 1', 1, 1, 1722226098, 1722658714, 0),
(13, 'test ', 1, 1, 1722226107, 1722226107, 0),
(14, 'mạnhhghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1, 1, 1722658724, 1724385123, 0),
(15, 'test 1', 1, 1, 1724292167, 1724292167, 0),
(16, 'Nguyễn Thị Anh 111', 1, 1, 1724384822, 1724384833, 1);

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
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `job_type`
--

INSERT INTO `job_type` (`id`, `name`, `author`, `status`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test', 1, 1, 1719540672, 1719540672, 1),
(2, 'hôm nay', 1, 1, 1719542508, 1719542508, 1),
(3, 'Nhập 1111333', 7, 1, 1719638436, 1719638436, 1),
(4, 'test 2', 1, 1, 1719886305, 1719886305, 1),
(5, 'test 321', 1, 1, 1719886316, 1719886316, 1),
(6, 'test 4', 1, 1, 1719891912, 1719891912, 1),
(7, 'test 55', 16, 1, 1719927413, 1719927413, 1),
(8, 'Nguyễn Văn A', 1, 1, 1719975855, 1719975855, 1),
(9, 'Quà tặng112', 1, 1, 1719975871, 1719975871, 1),
(10, 'Lan Anh ', 1, 1, 1720578419, 1720578419, 1),
(11, 'bui anhanh111', 1, 1, 1721816176, 1721816176, 1),
(12, 'mạnh líu li', 1, 1, 1721883027, 1721883027, 1),
(13, 'bá mạnh ', 1, 1, 1721961216, 1721961216, 1),
(14, 'bá mạnh he he', 1, 1, 1722220601, 1722220601, 1),
(15, 'oky ', 1, 2, 1722226049, 1722655590, 0),
(16, 'kn', 1, 1, 1722226061, 1722226061, 0),
(17, 'mạnh 1', 1, 1, 1722656176, 1722656240, 1),
(18, 'test 1', 1, 1, 1724292127, 1724292127, 0),
(19, 'ghét con bùi anh ', 1, 1, 1724322528, 1724322528, 1),
(20, 'bui anhanhjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhhhiihhhhhhhhhhiiiiiiiiiiiiiiiiiiihhhhhhhhhhhh', 30, 1, 1724380737, 1724380737, 0),
(21, 'mạnh111', 1, 1, 1724405733, 1724406064, 0);

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

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `customer`, `project_type`, `deadline`, `revenue`, `website`, `file`, `info`, `note`, `note_index`, `status_index`, `data_index_real`, `data_index`, `check_index`, `time_index`, `time_index_next`, `user_check_index`, `author`, `received`, `debt_status`, `time_urges`, `status`, `time_start`, `time_end`, `time_cancel`, `time_pause`, `handover_status`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test ', 1, 1719711420, 533, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'test', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719538683, 1879440, NULL, 1, 0, 0, NULL, 2, 1719542302, NULL, NULL, NULL, 0, 1719538683, 1719538683, 1),
(2, 'test ', 3, 1719713460, 10000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'test', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 3, 1722918071, NULL, '9', 1, 0, 1, '1719724680,1719724680', 2, 1719540806, 1722918071, NULL, NULL, 3, 1719540716, 1719540716, 0),
(3, 'Bùi Thị Anh ', 1, 1719510000, 1000009, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaa', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719542239, 0, NULL, 1, 0, 0, NULL, 2, NULL, NULL, NULL, NULL, 0, 1719542239, 1719542239, 1),
(4, 'Kiều Ngọc Anh ', 2, 1719718980, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'test đến trầm kam', '', '', 0, NULL, NULL, 0, 1719546207, NULL, NULL, 1, 0, 0, NULL, 3, 1719546277, NULL, NULL, NULL, 0, 1719546207, 1719546207, 1),
(5, 'Kiều Ngọc Anh ', 2, 1719719340, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'dự án ', '', '', 0, NULL, NULL, 0, 1719546594, NULL, NULL, 1, 0, 0, NULL, 3, 1719546625, NULL, NULL, NULL, 0, 1719546594, 1719546594, 1),
(6, 'Kiều Ngọc Anh ', 1, 1719720540, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hgff', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719547811, NULL, NULL, 1, 0, 2, NULL, 3, 1719547839, NULL, NULL, NULL, 0, 1719547811, 1719547811, 1),
(7, 'Kiều Ngọc Anh ', 2, 1719710340, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'test1', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719623956, NULL, NULL, 7, 0, 2, NULL, 3, 1719642887, NULL, NULL, NULL, 0, 1719623956, 1719623956, 1),
(8, 'khách hàng 29/6', 3, 1719711900, 100000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'dự án 29/6', '', '', 1, '[{\"name\":\"1\",\"number\":\"789\"}]', '[{\"name\":\"1\",\"number\":\"75\"}]', 2, 1719627908, NULL, '9', 7, 0, 0, NULL, 3, 1719625705, NULL, NULL, NULL, 0, 1719625556, 1719625556, 1),
(9, 'Kiều Ngọc Anh ', 3, 1719716100, 100000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'test 1', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719629788, NULL, NULL, 7, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719629788, 1719629788, 1),
(10, 'Kiều Ngọc Anh ', 5, 1719724620, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hôm nay ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719638252, NULL, NULL, 7, 0, 0, '1719724680', 3, 1719642172, NULL, NULL, NULL, 0, 1719638252, 1719638252, 1),
(11, 'Bùi Thị Anh ', 3, 1719653280, 10000, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaa', 'aaaaaaaa', 'aaaa', 1, NULL, '[{\"name\":\"1\",\"number\":\"85\"}]', 4, 1719638689, NULL, NULL, 7, 0, 0, NULL, 2, 1719641191, NULL, NULL, NULL, 0, 1719638689, 1719638689, 1),
(12, 'Kiều Ngọc Anh ', 3, 1719728760, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'dự án ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 3, 1719642403, NULL, NULL, 7, 0, 0, NULL, 3, 1719642424, NULL, NULL, NULL, 0, 1719642403, 1719642403, 1),
(13, 'Kiều Ngọc Anh ', 3, 1719728880, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hghjhg', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719642495, NULL, NULL, 7, 0, 0, NULL, 3, 1719642516, NULL, NULL, NULL, 0, 1719642495, 1719642495, 1),
(14, 'Kiều Ngọc Anh ', 3, 1719759600, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hi ki ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719673241, NULL, NULL, 7, 0, 0, NULL, 3, 1719673268, NULL, NULL, NULL, 0, 1719673241, 1719673241, 1),
(15, 'Kiều Ngọc Anh ', 4, 1720077780, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719732207, NULL, NULL, 7, 0, 0, NULL, 3, 1719744962, NULL, NULL, NULL, 2, 1719732207, 1719732207, 1),
(16, 'Kiều Ngọc Anh ', 4, 1720003920, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719744750, NULL, NULL, 7, 0, 2, NULL, 3, 1719744777, NULL, NULL, NULL, 0, 1719744750, 1719744750, 1),
(17, 'Kiều Ngọc Anh ', 3, 1719918900, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719746277, NULL, '9', 7, 0, 2, NULL, 1, 1719746248, 1719746277, NULL, NULL, 0, 1719746213, 1719746213, 0),
(18, 'Kiều Ngọc Anh ', 3, 1719659880, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719746339, NULL, NULL, 7, 0, 0, NULL, 3, 1719746372, NULL, NULL, NULL, 0, 1719746339, 1719746339, 1),
(19, 'Kiều Ngọc Anh ', 3, 1719832980, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki ki', '', '', 0, NULL, NULL, 0, 1719746615, NULL, NULL, 7, 0, 0, NULL, 2, 1719746638, 1719746648, NULL, NULL, 0, 1719746615, 1719746615, 0),
(20, 'Kiều Ngọc Anh ', 3, 1722597900, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki', '', '', 0, NULL, '[{\"name\":\"1\",\"number\":\"75\"},{\"name\":\"1\",\"number\":\"75\"}]', 0, 1719746713, NULL, NULL, 7, 0, 0, NULL, 3, 1719746744, NULL, NULL, NULL, 0, 1719746713, 1719746713, 1),
(21, 'Kiều Ngọc Anh ', 3, 1720006260, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki', '', '', 0, NULL, NULL, 0, 1719747103, NULL, NULL, 7, 0, 0, NULL, 3, 1719747146, NULL, NULL, NULL, 3, 1719747103, 1719747103, 1),
(22, 'Kiều Ngọc Anh ', 3, 1720352700, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhugu', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719747967, NULL, NULL, 7, 0, 0, NULL, 3, 1719807261, NULL, NULL, NULL, 0, 1719747967, 1719747967, 1),
(23, 'Kiều Ngọc Anh ', 9, 1720062540, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki', '', '', 1, '[{\"name\":\"1\",\"number\":\"45\"}]', '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719805110, 1722214800, '9', 7, 0, 1, NULL, 2, 1719803563, 1719805110, NULL, NULL, 3, 1719803392, 1719803392, 0),
(24, 'Kiều Ngọc Anh ', 3, 1720062720, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719803541, NULL, NULL, 7, 0, 0, NULL, 3, 1719805159, NULL, NULL, NULL, 0, 1719803541, 1719803541, 1),
(25, 'Kiều Ngọc Anh ', 3, 1722053460, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhff', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719807137, NULL, '9', 7, 0, 0, NULL, 1, 1719807106, 1719807137, NULL, NULL, 0, 1719807079, 1719807079, 0),
(26, 'Kiều Ngọc Anh ', 3, 1720843980, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'dd', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719807221, NULL, NULL, 7, 0, 1, NULL, 3, 1719807241, NULL, NULL, NULL, 0, 1719807221, 1719807221, 1),
(27, 'Kiều Ngọc Anh ', 2, 1720894560, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhh', '', 'fff', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719807470, 2332800, '9', 7, 0, 0, NULL, 1, 1719807436, 1719807470, NULL, NULL, 0, 1719807413, 1719807413, 0),
(28, 'Kiều Ngọc Anh ', 3, 1720844280, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki', '', '', 0, NULL, NULL, 0, 1719807514, NULL, NULL, 7, 0, 0, NULL, 3, 1719807548, NULL, NULL, NULL, 0, 1719807514, 1719807514, 1),
(29, 'Kiều Ngọc Anh ', 3, 1720758480, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jjbjjhjkk', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719808320, NULL, '9', 7, 0, 0, NULL, 1, 1719808148, 1719808320, NULL, NULL, 0, 1719808117, 1719808117, 0),
(30, 'Kiều Ngọc Anh ', 2, 1720895520, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'cc', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719809124, NULL, '9', 7, 0, 0, NULL, 2, 1719808371, 1719809124, NULL, NULL, 0, 1719808354, 1719808354, 0),
(31, 'Kiều Ngọc Anh ', 2, 1720241220, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hii ', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719809455, NULL, '9', 7, 0, 0, NULL, 1, 1719809275, 1719809455, NULL, NULL, 0, 1719809243, 1719809243, 0),
(32, 'Kiều Ngọc Anh ', 2, 1720328160, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jkhhshjsjhdhhjdhjd', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 4, 1719809783, NULL, NULL, 7, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719809783, 1719809783, 1),
(33, 'Kiều Ngọc Anh ', 4, 1721365020, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hkihih', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719810855, NULL, '9', 7, 0, 0, NULL, 2, 1719809922, 1719810855, NULL, NULL, 0, 1719809885, 1719809885, 0),
(34, 'Kiều Ngọc Anh ', 3, 1720949160, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hikii', '', '', 1, NULL, '[{\"name\":\"1\",\"number\":\"75\"}]', 1, 1719826519, NULL, '9', 7, 0, 0, NULL, 2, 1719826044, 1719826519, NULL, NULL, 0, 1719826018, 1719826018, 0),
(35, 'Kiều Ngọc Anh ', 3, 1721988600, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hkijjs', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719828608, NULL, NULL, 1, 0, 0, NULL, 3, 1719828634, NULL, NULL, NULL, 0, 1719828608, 1719828608, 1),
(36, 'Kiều Ngọc Anh ', 2, 1721298180, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'kihi', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 3, 1719829450, NULL, NULL, 1, 0, 0, NULL, 3, 1719829476, NULL, NULL, NULL, 0, 1719829450, 1719829450, 1),
(37, 'Kiều Ngọc Anh ', 3, 1721559120, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'kih', '', '', 0, NULL, NULL, 0, 1719831151, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719831151, 1719831151, 1),
(38, 'Kiều Ngọc Anh ', 3, 1721559120, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'kih', '', '', 0, NULL, NULL, 0, 1719831151, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719831151, 1719831151, 1),
(39, 'Kiều Ngọc Anh ', 2, 1720867920, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'cdd', '', '', 0, NULL, NULL, 0, 1719831166, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719831166, 1719831166, 1),
(40, 'Kiều Ngọc Anh ', 2, 1720867920, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'cdd', '', '', 0, NULL, NULL, 0, 1719831166, NULL, NULL, 1, 0, 0, NULL, 3, 1719831198, NULL, NULL, NULL, 0, 1719831166, 1719831166, 1),
(41, 'Kiều Ngọc Anh ', 2, 1720867920, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'cdd', '', '', 0, NULL, NULL, 0, 1719831166, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719831166, 1719831166, 1),
(42, 'Kiều Ngọc Anh ', 3, 1721386680, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiik', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719831533, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719831533, 1719831533, 1),
(43, 'Khách hàng 3', 2, 1722077880, 2147483647, 'https://bahanu.com', 'https://sic88.art/', 's', 's', 's', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719831537, NULL, NULL, 1, 0, 0, NULL, 3, 1719831573, NULL, NULL, NULL, 0, 1719831537, 1719831537, 1),
(44, 'Kiều Ngọc Anh ', 3, 1720350060, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jjhsh', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719831672, NULL, NULL, 1, 0, 0, NULL, 3, 1719831695, NULL, NULL, NULL, 0, 1719831672, 1719831672, 1),
(45, 'Kiều Ngọc Anh ', 3, 1720628220, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 1, 1719851041, NULL, '9', 1, 0, 0, NULL, 1, 1719850711, 1719851041, NULL, NULL, 0, 1719850676, 1719850676, 0),
(46, 'Khách hàng 111', 4, 1722702420, 2147483647, 'https://bahanu.com', 'https://sic88.art/', '1234', '231232', '1234', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719851331, NULL, NULL, 1, 0, 0, NULL, 3, 1719851398, NULL, NULL, NULL, 0, 1719851331, 1719851331, 1),
(47, 'Kiều Ngọc Anh ', 2, 1720888320, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'gikjdh', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719851562, NULL, NULL, 1, 0, 0, NULL, 3, 1719851586, NULL, NULL, NULL, 0, 1719851562, 1719851562, 1),
(48, 'Khách hàng 111', 3, 1722703140, 2147483647, 'https://bahanu.com', 'https://sic88.art/', 'dưqfq', 'qừ', 'w', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 1, 1719859741, NULL, '9', 1, 0, 0, NULL, 1, 1719852029, 1719859741, NULL, NULL, 0, 1719852009, 1719852009, 0),
(49, 'Kiều Ngọc Anh ', 2, 1720114380, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'fddd', '', '', 0, NULL, NULL, 0, 1719855205, NULL, NULL, 1, 0, 0, NULL, 3, 1719855259, NULL, NULL, NULL, 0, 1719855205, 1719855205, 1),
(50, 'Kiều Ngọc Anh ', 4, 1720201020, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'fff', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719855482, NULL, NULL, 1, 0, 0, '1719697440,1719697440,1719697440,1719808740', 3, 1719855511, NULL, NULL, NULL, 0, 1719855482, 1719855482, 1),
(51, 'Khách hàng 3', 2, 1721328600, 2147483647, 'https://bahanu.com', 'https://sic88.art/', 'd', 'r', 'r', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 1, 1719860152, NULL, '9', 1, 0, 0, '1719808680,1719808680', 2, 1719859889, NULL, NULL, NULL, 0, 1719859867, 1719859867, 0),
(52, 'Bùi thị anh', 3, 1720584000, 100000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaa', '', 'aaaaaaa', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719885512, NULL, NULL, 16, 0, 0, '1719682740,1719891420', 3, 1719906720, NULL, NULL, NULL, 0, 1719885512, 1719885512, 1),
(53, 'Bùi Thị Anh ', 4, 1719980280, 100000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaa', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"},{\"name\":\"5\",\"number\":\"75\"},{\"name\":\"5\",\"number\":\"75\"},{\"name\":\"7\",\"number\":\"75\"},{\"name\":\"4\",\"number\":\"75\"},{\"name\":\"6\",\"number\":\"75\"}]', 4, 1719886637, NULL, NULL, 1, 0, 0, '1720985880,1719808500,1719808500', 3, 1719889986, NULL, NULL, NULL, 0, 1719886637, 1719886637, 1),
(54, 'Dự án n1', 4, 1720545960, 200000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaa', 'aaaa', 'aaaa', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"},{\"name\":\"5\",\"number\":\"75\"},{\"name\":\"6\",\"number\":\"75\"},{\"name\":\"4\",\"number\":\"75\"}]', 4, 1719887368, NULL, NULL, 1, 0, 0, '1720028100,1719973800,1719973800,1719973800', 3, 1719890375, NULL, NULL, NULL, 0, 1719887368, 1719887368, 1),
(55, 'Khách hàng 111', 4, 1722019800, 12345, 'https://bahanu.com', 'https://sic88.art/', 'qwqf', 'qừqwf', 'c', 0, NULL, NULL, 0, 1719888640, NULL, NULL, 1, 0, 0, '1719766620,1719766620,1719806160', 3, 1719888661, NULL, NULL, NULL, 0, 1719888640, 1719888640, 1),
(56, 'Bùi Thị Anh ', 7, 1719852420, 100000, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaaaaa', 'aaaaaaaa', 'aaaaaaa', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"},{\"name\":\"4\",\"number\":\"75\"},{\"name\":\"5\",\"number\":\"75\"},{\"name\":\"6\",\"number\":\"75\"},{\"name\":\"7\",\"number\":\"75\"}]', 4, 1719891978, NULL, NULL, 1, 0, 0, NULL, 3, 1719892050, NULL, NULL, NULL, 0, 1719891978, 1719891978, 1),
(57, 'Bùi Thị Anh ', 2, 1719810480, 100000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaa', 'aaaaaaaa', 'aaaaaaaa', 1, '[{\"name\":\"3\",\"number\":\"0\"},{\"name\":\"4\",\"number\":\"34\"},{\"name\":\"5\",\"number\":\"35\"},{\"name\":\"6\",\"number\":\"36\"}]', '[{\"name\":\"3\",\"number\":\"85\"},{\"name\":\"4\",\"number\":\"75\"},{\"name\":\"5\",\"number\":\"75\"},{\"name\":\"6\",\"number\":\"75\"}]', 3, 1719906642, 223380, '9', 1, 0, 1, NULL, 3, 1719893331, 1719909652, NULL, NULL, 0, 1719893265, 1719893265, 1),
(58, 'Kiều Ngọc Anh ', 3, 1720859700, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hjjs\\', '', '', 0, NULL, NULL, 0, 1719909409, NULL, NULL, 1, 0, 0, NULL, 1, 1719909441, 1719909509, NULL, NULL, 0, 1719909409, 1719909409, 0),
(59, 'Kiều Ngọc Anh ', 7, 1720168860, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hikii', '', '', 1, '[{\"name\":\"3\",\"number\":\"22\"}]', '[{\"name\":\"3\",\"number\":\"75\"}]', 1, 1719910135, NULL, '9', 1, 0, 0, NULL, 1, 1719909751, 1719910363, NULL, NULL, 0, 1719909702, 1719909702, 0),
(60, 'Kiều Ngọc Anh ', 6, 1720861560, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hiki', '', '', 0, NULL, NULL, 0, 1719911244, NULL, NULL, 1, 0, 1, NULL, 2, 1719911297, 1719911317, NULL, NULL, 0, 1719911244, 1719911244, 0),
(61, 'Anh Anh ', 2, 1719746640, 1000000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"},{\"name\":\"4\",\"number\":\"75\"},{\"name\":\"5\",\"number\":\"75\"},{\"name\":\"6\",\"number\":\"75\"}]', 4, 1719912185, NULL, NULL, 1, 0, 0, NULL, 3, 1719912293, NULL, NULL, NULL, 0, 1719912185, 1719912185, 1),
(62, 'Kiều Ngọc Anh ', 3, 1720776660, 333, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', '333', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719912706, NULL, NULL, 1, 0, 0, NULL, 3, 1719912728, NULL, NULL, NULL, 0, 1719912706, 1719912706, 1),
(63, 'Kiều Ngọc Anh ', 2, 1720865220, 333, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'ddsass', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 1, 1722918185, 1724905320, '9', 1, 0, 1, NULL, 1, 1719914893, 1722918185, NULL, NULL, 0, 1719914857, 1719914857, 0),
(64, 'Kiều Ngọc Anh ', 2, 1720261500, 333, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'kihi', '', '', 0, NULL, NULL, 0, 1719915941, NULL, NULL, 1, 0, 1, '1722416160', 1, 1719915961, 1719916361, NULL, NULL, 0, 1719915941, 1719915941, 0),
(65, 'Kiều Ngọc Anh ', 6, 1721557980, 333, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhdd', '', '', 0, NULL, NULL, 0, 1719916422, NULL, NULL, 1, 0, 0, NULL, 3, 1719916496, NULL, NULL, NULL, 0, 1719916422, 1719916422, 1),
(66, 'Kiều Ngọc Anh ', 2, 1721471580, 333, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'kịh', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719916444, NULL, NULL, 1, 0, 1, NULL, 3, 1719916620, NULL, NULL, NULL, 0, 1719916444, 1719916444, 1),
(67, 'Anh Anh ', 2, 1719927360, 100000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaa', 'aaaaaa', 'aaaaaaaa', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719920085, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719920085, 1719920085, 1),
(68, 'Kiều Ngọc Anh ', 3, 1720179360, 333, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhh', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 3, 1719920188, NULL, NULL, 1, 0, 1, NULL, 3, 1719920213, NULL, NULL, NULL, 0, 1719920188, 1719920188, 1),
(69, 'Kiều Ngọc Anh ', 6, 1720871760, 21488, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'kshjd', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719921409, NULL, NULL, 1, 0, 1, NULL, 3, 1719921855, NULL, NULL, NULL, 0, 1719921409, 1719921409, 1),
(70, 'Kiều Ngọc Anh ', 3, 1720960260, 13333, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hggg', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719923521, NULL, NULL, 16, 0, 0, NULL, 3, 1719925225, NULL, NULL, NULL, 0, 1719923521, 1719923521, 1),
(71, 'Kiều Ngọc Anh ', 2, 1720874100, 1236553, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'dfsddf', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 3, 1719923720, NULL, NULL, 16, 0, 0, NULL, 3, 1719923746, NULL, NULL, NULL, 0, 1719923720, 1719923720, 1),
(72, 'Kiều Ngọc Anh ', 2, 1720874400, 1236553, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'sss', '', '', 1, '[{\"name\":\"3\",\"number\":\"99\"}]', '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1722712979, NULL, '9', 16, 0, 1, NULL, 2, 1719924039, 1722712979, NULL, NULL, 0, 1719924015, 1719924015, 0),
(73, 'Kiều Ngọc Anh ', 3, 1720359240, 2147483647, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'ssda', '', '', 1, NULL, '[{\"name\":\"3\",\"number\":\"75\"}]', 4, 1719927270, NULL, NULL, 16, 0, 1, NULL, 3, 1719977895, NULL, NULL, NULL, 0, 1719927270, 1719927270, 1),
(74, 'Kiều Ngọc Anh ', 2, 1720663740, 1236553, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'ehjd', '', '', 0, NULL, NULL, 0, 1719972562, NULL, NULL, 1, 0, 0, NULL, 3, 1719976034, NULL, NULL, NULL, 0, 1719972562, 1719972562, 1),
(75, 'Kiều Ngọc Anh ', 3, 1721358660, 1236553434, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'gfff', '', '', 0, NULL, NULL, 0, 1719976271, NULL, NULL, 1, 0, 1, NULL, 1, 1719976311, 1719978342, NULL, NULL, 0, 1719976271, 1719976271, 0),
(76, 'Anh Anh ', 2, 1719768660, 0, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaa', 'aaaaaaa', 'aaaaaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"},{\"name\":\"4\",\"number\":\"75\"}]', 4, 1719977395, NULL, NULL, 1, 0, 1, NULL, 3, NULL, NULL, NULL, NULL, 0, 1719977395, 1719977395, 1),
(77, 'Kiều Ngọc Anh', 19, 1720928760, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'đsdd', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 3, 1723430348, NULL, NULL, 1, 0, 1, NULL, 2, 1719978439, 1719979905, NULL, NULL, 1, 1719978373, 1723430348, 0),
(78, 'Lương văn anh', 3, 1721379180, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'sss', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721206394, NULL, NULL, 16, 0, 0, NULL, 3, 1721206788, NULL, NULL, NULL, 0, 1721206394, 1721206394, 1),
(79, 'Lương văn anh', 7, 1722070500, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'ưdddsd', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721206520, NULL, NULL, 16, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1721206520, 1721206520, 1),
(80, 'khách hàng test', 2, 1721424120, 123456789, 'https://bahanu.com', 'https://sic88.art/', 'tt', 'tt', 'tt', 0, NULL, NULL, 0, 1721251389, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1721251389, 1721251389, 1),
(81, 'Anh Anh', 3, 1721266380, 100000, 'NỘI QUY CÔNG TY MỚI ', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaaaaaaaa', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"},{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721266223, 1721955600, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1721266223, 1721266223, 0),
(82, 'Lê Minh Anh', 2, 1721359980, 100000, 'https://dev.admin.shopcloud.vn/Home/Login', 'https://dev.admin.shopcloud.vn/Home/Login', 'aaaaaaaa\r\n', 'aaaaaaaaa', 'aaaaaaaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721266347, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1721266347, 1721266347, 1),
(83, 'Hồ Bá Mạnh', 2, 1721439480, 100000, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://pm.ngocbaomedia.com/them-du-an/', 'zaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721266712, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1721266712, 1721266712, 1),
(84, 'Lương văn anh', 2, 0, 1000000, '8789292', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhhdj', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721268668, NULL, NULL, 1, 0, 0, NULL, 3, 1721269462, NULL, NULL, NULL, 0, 1721268668, 1721268668, 1),
(85, 'Lương văn anh', 6, 0, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', '', 'gguj', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721268693, NULL, NULL, 1, 0, 0, NULL, 3, 1721268869, NULL, NULL, NULL, 0, 1721268693, 1721268693, 1),
(86, 'Lương văn anh', 3, 1721463180, 1000000, 'youtube - Search (bing.com)youtube - Search (bing.com)', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhuuh\r\n', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721290443, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1721290443, 1721290443, 1),
(87, 'Lương văn anh', 7, 0, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhhjd', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721290709, NULL, NULL, 1, 0, 1, NULL, 3, 1721291187, NULL, NULL, NULL, 0, 1721290709, 1721290709, 1),
(88, 'Kiều Hoàng Anh', 7, 0, 1000000, 'hhhh', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hôm nay \r\n', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"72\"}]', 4, 1721293280, NULL, NULL, 1, 0, 0, NULL, 3, 1721293397, NULL, NULL, NULL, 3, 1721293280, 1721293280, 1),
(89, 'thryu', 6, 1721443860, 122112, 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=0', 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=0', 'dsdss', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721357510, 1721869200, NULL, 1, 0, 0, NULL, 2, 1721358029, NULL, NULL, NULL, 3, 1721357510, 1721357510, 0),
(90, 'abcxyz', 3, 1721325420, 100000, 'https://docs.google.com/', 'https://docs.google.com/', 'aaaaaaaa', 'aaaaaaa', 'aaaaaaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721357719, 1721782800, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1721357719, 1721357719, 0),
(91, 'abcxyz', 3, 1721325420, 100000, 'https://docs.google.com/', 'https://docs.google.com/', 'aaaaaaaa', 'aaaaaaa', 'aaaaaaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721357720, NULL, NULL, 1, 0, 0, '1721672640,1721672640,1721672640,1721672640,1721672640', 2, 1721357768, NULL, NULL, NULL, 0, 1721357720, 1721357720, 0),
(92, 'Nguyên long an', 8, 1721957280, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'sds', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721611733, NULL, NULL, 1, 0, 0, NULL, 2, 1721726758, NULL, NULL, NULL, 0, 1721611733, 1721611733, 0),
(93, 'Bùi Thị Anh', 2, 1721731080, 100000, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaaa', 'aaaaa', 'aaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721727486, NULL, NULL, 1, 0, 0, NULL, 2, 1721727565, NULL, NULL, NULL, 0, 1721727486, 1721727486, 0),
(94, 'thằng thắng', 6, 0, 2147483647, 'https://www.youtube.com/', 'https://www.figma.com/design/fyM7n5O62zO4f1wYD28M2W/Untitled?node-id=0-1&t=KnqaOG6oJVSZQqfZ-1', 'jhgjjsjgasgj', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721727493, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1721727493, 1721727493, 1),
(95, 'thằng thắng', 6, 0, 2147483647, 'https://www.youtube.com/', 'https://www.youtube.com/', 'jhgjjsjgasgj', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721727494, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1721727494, 1721727494, 1),
(96, 'thằng thắng', 6, 0, 22121, 'Sự tích cây Xương Rồng [Truyện cổ tích Việt Nam] - Thế giới cổ tích (thegioicotich.vn)Sự tích cây Xương Rồng [Truyện cổ tích Việt Nam] - Thế giới cổ tích (thegioicotich.vn)', 'https://www.figma.com/design/fyM7n5O62zO4f1wYD28M2W/Untitled?node-id=0-1&t=KnqaOG6oJVSZQqfZ-1', 'sddsd', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721727689, NULL, NULL, 1, 0, 0, NULL, 2, 1721959944, NULL, NULL, NULL, 0, 1721727689, 1721727689, 0),
(97, 'Anh Anh', 7, 1721711160, 100000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaa', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721747020, NULL, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1721747020, 1721747020, 0),
(98, 'Anh Anh', 7, 1721711160, 100000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaa', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721747021, NULL, NULL, 1, 0, 0, NULL, 2, 1721747107, NULL, NULL, NULL, 0, 1721747021, 1721747021, 0),
(99, 'Anh Anh', 3, 0, 100000, 'Hội Review Công Ty Có Tâm! | FacebookHội Review Công Ty Có Tâm! | Facebook', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaaaa', 'aaaaaaaa', 'aaaaaaaaaa', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721747286, NULL, NULL, 1, 0, 0, NULL, 3, 1721747361, NULL, NULL, NULL, 0, 1721747286, 1721747286, 1),
(100, 'fefffd', 6, 0, 1939398, 'https://www.youtube.com/watch?v=0N_ZtUXnTj4', 'https://www.youtube.com/watch?v=0N_ZtUXnTj4', 'hjhjhdsjdjsj', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721787332, NULL, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1721787332, 1721787332, 0),
(101, 'fefffd', 8, 1721877420, 21122, 'https://www.youtube.com/watch?v=0N_ZtUXnTj4', 'https://www.youtube.com/watch?v=0N_ZtUXnTj4', 'hgjhsjsjh', '', '', 1, NULL, '[{\"name\":\"4\",\"number\":\"75\"}]', 4, 1721791066, NULL, NULL, 1, 0, 1, NULL, 2, 1721791079, NULL, NULL, NULL, 0, 1721791066, 1721791066, 0),
(102, 'fefffd', 8, 0, 100, 'https://www.youtube.com/watch?v=0N_ZtUXnTj4', 'https://www.youtube.com/watch?v=0N_ZtUXnTj4', 'jjh', '', '', 1, '[{\"name\":\"4\",\"number\":\"15\"}]', '[{\"name\":\"4\",\"number\":\"75\"}]', 1, 1723428086, 1723600860, '9', 1, 0, 1, NULL, 2, 1721983313, NULL, NULL, NULL, 0, 1721819769, 1721819769, 0),
(103, 'hoang anh', 16, 1722646800, 8009, 'https://www.youtube.com/', 'https://www.youtube.com/', 'hôm nay ', 'hôm nay ', 'hôm nay ', 1, '[{\"name\":\"12\",\"number\":\"75\"},{\"name\":\"12\",\"number\":\"77\"}]', '[{\"name\":\"12\",\"number\":\"75\"},{\"name\":\"12\",\"number\":\"75\"}]', 1, 1723657740, 1724206740, '9', 1, 0, 1, '1723255740,1722020940', 1, 1721967762, 1724385245, NULL, NULL, 1, 1721899398, 1723429072, 0),
(104, 'thryu', 16, 1721279100, 998980, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'jhjhjh', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1722649651, NULL, NULL, 1, 0, 2, NULL, 1, 1722239796, NULL, NULL, NULL, 0, 1722229530, 1722649651, 0),
(105, 'Kha Văn Lương', 16, 0, 888888, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=01', 'https://dev.admin.shopcloud.vn/Home/Login', 'kjjk', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1722920226, NULL, NULL, 1, 0, 0, '1722958200,1723434060,1723002000', 2, 1722654730, NULL, NULL, NULL, 0, 1722654701, 1722920226, 0),
(106, 'thằng thắng', 19, 1724387160, 122121, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', '', 'gggt', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 3, 1722918403, NULL, NULL, 1, 0, 0, NULL, 2, 1722918445, NULL, NULL, NULL, 0, 1722918403, 1722918403, 0),
(107, 'thằng thắng', 19, 1724302080, 10000, 'https://www.youtube.com/', 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=022222', '1111111', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"},{\"name\":\"13\",\"number\":\"85\"}]', 4, 1722930011, NULL, NULL, 1, 0, 0, NULL, 2, NULL, NULL, NULL, NULL, 0, 1722919763, 1722930011, 0),
(108, 'hum', 16, 1723675740, 66666, 'https://www.youtube.com/', 'https://www.youtube.com/', 'eeeeee', 'eeeee', 'eeeeee', 1, NULL, '[{\"name\":\"13\",\"number\":\"15\"}]', 3, 1722961792, NULL, NULL, 1, 0, 0, '1723047660,1723589700,1722894840,1723193520', 3, 1722961424, NULL, NULL, NULL, 0, 1722930490, 1722961792, 0),
(109, 'văn mạnh', 16, 1722906000, 100000, 'https://www.youtube.com/watch?v=qESUoOwzwaI', 'https://www.youtube.com/watch?v=LQbTRcJKbUI', 'Bùi\r\nb\r\nb\r\nffffffff\r\nccccccc\r\ns\r\nsss', 'eeeeee', 'Buud\r\nsfafwe\r\nvdsver\r\ngegr\r\n\r\n\r\nffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffweefegvdvw', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723003087, NULL, NULL, 1, 0, 1, '1722937080,1722940140,1722900540', 2, 1722938399, NULL, NULL, NULL, 0, 1722930543, 1723003087, 0),
(110, 'Kiều Ngọc Anh', 16, 1724385480, 190000, 'https://www.youtube.com/', 'https://www.youtube.com/', 'hihi', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723415371, NULL, NULL, 1, 0, 1, NULL, 2, 1723004144, NULL, NULL, NULL, 1, 1723003145, 1723415371, 0),
(111, 'bùi văn an', 16, 1724395560, 666666, 'https://s.shopee.vn/7zsv6rjwyi', 'https://appstg.ahamove.com/', 'eeeeeeeeeeeeee', 'eeeeeeeeeeee', 'eeeeeeee', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723415791, NULL, NULL, 1, 0, 0, '1723777020', 2, 1723415791, NULL, NULL, NULL, 3, 1723005990, 1723415791, 0),
(112, 'Khách hàng 3', 19, 1724457240, 234567890, 'https://bahanu.com', 'https://sic88.art/', 'QƯ', 'Ư', 'QƯQ', 1, '[{\"name\":\"12\",\"number\":\"14\"},{\"name\":\"12\",\"number\":\"16\"},{\"name\":\"12\",\"number\":\"17\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723434392, NULL, '9', 1, 0, 0, NULL, 2, 1723421507, NULL, NULL, NULL, 1, 1723420479, 1723434392, 0),
(113, 'Bùi Thị Anh', 16, 1722305280, 100000, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'aaaaaaaa', 'aaaaaaaa', 'aaaaaaaaaaaaaaa', 1, '[{\"name\":\"12\",\"number\":\"23\"},{\"name\":\"13\",\"number\":\"23\"}]', '[{\"name\":\"12\",\"number\":\"75\"},{\"name\":\"13\",\"number\":\"75\"}]', 1, 1723866128, 1724379300, '9', 1, 0, 1, '1723779720', 2, 1723428559, NULL, NULL, NULL, 1, 1723428525, 1723434356, 0),
(114, 'Lương văn anh', 19, 0, 1000000, 'https://www.youtube.com/', 'https://www.youtube.com/', '8888', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723434533, NULL, NULL, 1, 0, 0, NULL, 3, 1723434533, NULL, NULL, NULL, 1, 1723434509, 1723434533, 1),
(115, 'Kha Văn Lương', 16, 1723623540, 888888, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=01', 'https://docs.google.com/spreadsheets/d/1EJUCYCnCYyR7TUxKVAdTkvrNcX5Mq8WkTwMnCBNDAfU/edit?fbclid=IwZXh0bgNhZW0CMTAAAR3yxObExUv_mm6ah20jEtKgjQmZC1PTndGB81PGLVgCeTpeMOCiPSy3y48_aem_v9z71pTK2jTKkNssguIxWA&gid=0#gid=022222', 'aaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaaa', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723450815, NULL, NULL, 1, 0, 0, NULL, 3, 1723450904, NULL, NULL, NULL, 0, 1723450815, 1723450815, 1),
(116, 'dddsa', 16, 1724404680, 998980, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'bvsvgshgshg', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723454295, NULL, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1723454295, 1723454295, 0),
(117, 'tớ neg', 20, 1723540800, 1000000, 'https://docs.google.com/spreadsheets/d/1lukOhRUCZ6ZCXd-NxW5elfa-roujyOOm37i6L07TUw0/edit?pli=1&gid=1612330755#gid=1612330755', 'https://www.youtube.com/', 'fddgf\r\n', '', '', 1, '[{\"name\":\"12\",\"number\":\"89\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 3, 1723859959, 1724233020, '9', 1, 0, 0, NULL, 2, 1723454625, 1723455552, NULL, NULL, 0, 1723454450, 1723859959, 0),
(118, 'tớ dây', 16, 1724232060, 1000000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'ffdssss', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 3, 1723866162, NULL, '9', 1, 0, 0, NULL, 2, 1723455863, 1723866162, NULL, NULL, 0, 1723454487, 1723454487, 0),
(119, 'hi', 19, 1724320200, 8009, 'https://www.youtube.com/', 'https://www.youtube.com/', 'hjhjh\r\naa\r\ndda\r\nđvsv\r\nadf', 'dừaq\r\nfqwfqf\r\nwetweg\r\nfsdfwe\r\n1.fsdvd\r\n2.fdgvdfg', 'dừaq\r\nfqwfqf\r\nwetweg\r\nfsdfwe\r\n1.fsdvd\r\n2.fdgvdfg\r\n', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724119321, NULL, NULL, 1, 0, 0, NULL, 2, 1723456765, NULL, NULL, NULL, 1, 1723456239, 1724119321, 0),
(120, 'mạnh', 16, 0, 10000, 'https://www.youtube.com/', 'https://www.youtube.com/', 'hhhh', '', '', 0, NULL, '', 0, 1723515582, NULL, NULL, 1, 0, 1, '1724206620', 1, 1723515679, 1723515691, NULL, NULL, 1, 1723515324, 1723515582, 0),
(121, 'hôm nay 1', 19, 1723602960, 1000000, 'https://www.youtube.com/', 'https://www.youtube.com/', 'h', 'h', 'h', 1, '[{\"name\":\"12\",\"number\":\"56\"},{\"name\":\"13\",\"number\":\"78\"}]', '[{\"name\":\"12\",\"number\":\"75\"},{\"name\":\"13\",\"number\":\"60\"}]', 1, 1723519876, NULL, '9', 1, 0, 2, NULL, 1, 1723516725, 1723519993, NULL, NULL, 1, 1723516643, 1723516753, 0),
(122, 'hôm nay 2', 19, 1724380740, 1000000, 'https://www.youtube.com/', 'https://www.youtube.com/', 't', 't', 't', 1, '[{\"name\":\"12\",\"number\":\"25\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723622362, 1724298300, '9', 1, 0, 0, NULL, 2, 1723520632, 1723520753, NULL, NULL, 2, 1723516787, 1723622362, 0),
(123, 'hum', 16, 1723693980, 8009, 'https://www.youtube.com/', 'https://www.youtube.com/', 'h', '', '', 1, '[{\"name\":\"12\",\"number\":\"67\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723863837, NULL, '9', 1, 0, 0, '1724177160', 2, 1723521258, NULL, NULL, NULL, 0, 1723521204, 1723863837, 0),
(124, 'huim', 16, 1724471580, 8009, 'https://www.youtube.com/', 'https://www.youtube.com/', 'hkk', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723521228, NULL, NULL, 1, 0, 0, NULL, 3, 1723521500, NULL, NULL, NULL, 0, 1723521228, 1723521228, 1),
(125, 'bhh', 20, 1723781760, 8009, 'https://www.youtube.com/', '', 'ghgf', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1723862857, NULL, NULL, 1, 0, 1, NULL, 2, 1723522759, NULL, NULL, NULL, 2, 1723522624, 1723862857, 0),
(126, 'hhg', 16, 1723695660, 8009, 'https://www.youtube.com/', 'https://www.youtube.com/', 'aa', 'aaaaaaa\r\naaaa\r\nqqqq\r\n1111\r\n222\r\n333\r\n\r\n', '1111 wefw qwrqw qwrqwr qwrqw rqwrwqrqwr qwrqwr ưq\r\n2222\r\n3333\r\n444\r\n555\r\n666', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724119452, NULL, NULL, 1, 0, 1, NULL, 2, 1723522906, NULL, NULL, NULL, 0, 1723522876, 1724119452, 0);
INSERT INTO `projects` (`id`, `customer`, `project_type`, `deadline`, `revenue`, `website`, `file`, `info`, `note`, `note_index`, `status_index`, `data_index_real`, `data_index`, `check_index`, `time_index`, `time_index_next`, `user_check_index`, `author`, `received`, `debt_status`, `time_urges`, `status`, `time_start`, `time_end`, `time_cancel`, `time_pause`, `handover_status`, `created_at`, `updated_at`, `delete_status`) VALUES
(127, 'Anh Anh', 19, 0, 100000, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0trtydrydyfytrt', 'aaaaaaaaallllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', 'aaaaaaaaaaaaaaaaaaallllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', 'aaaaaaaaaaaaaaaaaallllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', 0, NULL, '', 0, 1724296928, NULL, NULL, 1, 0, 0, NULL, 2, 1724296955, NULL, NULL, NULL, 0, 1723862843, 1724296928, 0),
(128, 'Hoàng Nguyên An', 21, 1724288400, 2147483647, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhhhhhhhhh', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"87\"}]', 4, 1724408240, NULL, NULL, 30, 0, 1, '1724408220,1724728620', 2, 1724296405, NULL, NULL, NULL, 0, 1724292361, 1724408240, 0),
(129, 'Hoàng Nguyên An', 21, 1725593760, 12212, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhhhhhhhhh', '', '', 0, NULL, '', 3, 1724297808, NULL, NULL, 1, 0, 0, NULL, 1, 1724297842, 1724298223, NULL, NULL, 0, 1724297808, 1724297808, 0),
(130, 'Hoàng Nguyên An', 21, 1724903400, 12212, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', '', 'hhh', 'hhh', 'hh', 1, '[{\"name\":\"12\",\"number\":\"100\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724385504, 1724903760, '9', 1, 0, 1, NULL, 2, 1724298694, 1724385504, NULL, NULL, 0, 1724298653, 1724298653, 0),
(131, 'Hoàng Nguyên An', 21, 1724986080, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'gkfkjkjfg', 'hh', 'hh', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724381352, NULL, NULL, 30, 0, 0, NULL, 3, 1724381383, NULL, NULL, NULL, 0, 1724381352, 1724381352, 1),
(132, 'Bùi Thị Anh', 22, 1723677960, 998981, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaa', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724401528, NULL, NULL, 1, 0, 0, NULL, 2, 1724401562, NULL, NULL, NULL, 0, 1724401528, 1724401528, 0),
(133, 'Hoàng Nguyên An', 16, 1724747520, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 'h', 'h', 1, '[{\"name\":\"12\",\"number\":\"36\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 1, 1724402152, NULL, '9', 30, 0, 0, NULL, 1, 1724401969, 1724402152, NULL, NULL, 0, 1724401935, 1724401935, 0),
(134, 'Hoàng Nguyên Anhhhhhhhhhhhhhhhhhhhhhhhhhhh', 19, 1726562580, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'uyhgh', '', '', 0, NULL, '', 0, 1724402762, NULL, NULL, 30, 0, 0, NULL, 1, 1724402801, 1724402931, NULL, NULL, 0, 1724402610, 1724402762, 0),
(135, 'Hoàng Nguyên Anhhhhhhhhhhhhhhhhhhhhhhhhhhh', 16, 1724924520, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhhhhhhhh', 'hh', 'hhhhhhhhhhhhhhhhh', 1, '[{\"name\":\"12\",\"number\":\"67\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 3, 1724406791, 1725444780, '15', 30, 0, 2, NULL, 2, 1724406791, NULL, NULL, NULL, 1, 1724406179, 1724406791, 0),
(136, 'Hoàng Nguyên Anhhhhhhhhhhhhhhhhhhhhhhhhhhh', 20, 1725010980, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'g', 'g', 'g', 1, '[{\"name\":\"12\",\"number\":\"57\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724409041, NULL, '9', 30, 0, 0, NULL, 2, 1724408891, 1724409041, NULL, NULL, 0, 1724406190, 1724406190, 0),
(137, 'Hoàng Nguyên Anhhhhhhhhhhhhhhhhhhhhhhhhhhh', 20, 1724838180, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'g', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724406200, NULL, NULL, 30, 0, 0, NULL, 2, 1724409284, NULL, NULL, NULL, 0, 1724406200, 1724406200, 0),
(138, 'Hoàng Nguyên Anhhhhhhhhhhhhhhhhhhhhhhhhhhh', 16, 1724147460, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhh', '', '', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724406668, NULL, NULL, 30, 0, 0, NULL, 2, 1724412274, NULL, NULL, NULL, 0, 1724406668, 1724406668, 0),
(139, 'Hoàng Nguyên Anhhhhhhhhhhhhhhhhhhhhhhhhhhh', 16, 1724752620, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhhh', 'hhh', 'hhhh', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724407070, NULL, NULL, 30, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1724407070, 1724407070, 0),
(140, 'Thị Anh', 16, 0, 100000, 'https://www.facebook.com/groups/1496701560683140/search/?q=tai%20n%E1%BA%A1n%20', 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaaaaaaaa\r\naaaaaaaaaaaaa\r\naaaaaaaaaa\r\naaaaaaaaaaaa\r\naaaaaaa\r\naaaaaaaaaa\r\naaaaaaaaaaaaa', 'aaaaaaaaaaa\r\naaaaaaaaaaa\r\naaaaa\r\naaaaaa\r\na\r\naa', 'aaaaaaaaaaa\r\naaaaaaaa\r\naaaaaaaaaaa', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724410110, NULL, NULL, 1, 0, 0, NULL, 0, 1724407999, NULL, NULL, NULL, 0, 1724407875, 1724410110, 0),
(141, 'Hoàng Nguyên Anhhhhhhhhhhhhhhhhhhhhhhhhhhh', 16, 1725101280, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hh', '', '', 0, NULL, '', 0, 1724410127, NULL, NULL, 30, 0, 0, NULL, 1, 1724410230, 1724410297, NULL, NULL, 0, 1724410127, 1724410127, 0),
(142, 'Kiều Ngọc Báo', 16, 1723933740, 100000, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaaaaaaaa\r\naaaaaaa\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\naaaaaaaaaaaaaaa\r\naaaaaaaaaaaa\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\naaaaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaa\r\naaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaaaaaaa\r\n', 1, NULL, '[{\"name\":\"14\",\"number\":\"86\"},{\"name\":\"13\",\"number\":\"75\"},{\"name\":\"14\",\"number\":\"75\"},{\"name\":\"13\",\"number\":\"75\"},{\"name\":\"14\",\"number\":\"75\"}]', 4, 1724434258, NULL, NULL, 1, 0, 0, NULL, 3, NULL, NULL, NULL, NULL, 0, 1724433926, 1724434258, 1),
(143, 'Kiều Ngọc Báo', 16, 1723138380, 100000, 'https://pm.ngocbaomedia.com/them-du-an/', 'https://pm.ngocbaomedia.com/them-du-an/', 'aaaaaaaaaaaa\r\naaaaaaaaaa\r\naaaaaaaaaaaaaa\r\naaaaaaaaaaaaaaaaa\r\naaaaaaaaaa\r\naaaaaaaaaa\r\naaaaaaaa\r\naaaaaaaaaaa\r\na\r\n\r\naaaaaaaaaaa\r\naaaaaaaaaaaaa\r\na\r\n\r\naaaaaaaaa\r\naaaaaaaaaaa\r\n\r\n\r\n\r\n\r\n', 'aaaaaaaaaaaa\r\naaaaaaaaaa\r\naaaaaaaaaaaaaa\r\naaaaaaa', 'aaaaaaaaaaaa\r\naaaaaaaaaa\r\naaaaaaaaaaaaaa\r\naaaaaaa', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724434500, NULL, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1724434500, 1724434500, 0),
(144, 'Kiều ngọc anh báo thủ 1', 16, 1723225320, 100001, 'https://dev.ngocbaomedia.com/them-du-an/', 'https://dev.ngocbaomedia.com/them-du-an/', 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa', 1, NULL, '[{\"name\":\"12\",\"number\":\"97\"}]', 4, 1724435098, NULL, NULL, 1, 0, 2, NULL, 2, 1724435090, NULL, NULL, NULL, 1, 1724434980, 1724435098, 0),
(145, 'Test 123', 16, 1722446460, 10000, 'https://www.topcv.vn/viec-lam', 'https://www.topcv.vn/viec-lam', 'aaaaaaaaaaa\r\naaaaaaaaaa\r\naaaaaaaa\r\naaaaaaaaaaa\r\naaaaaaaaaaa\r\naaaaaa', 'aaaaaaaaa', 'aaaaaaaa', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724436012, NULL, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1724436012, 1724436012, 0),
(146, 'Hoàng Nguyên Anh', 16, 1724722800, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hh', 'hh', 'hhh', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724680801, NULL, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1724463624, 1724680801, 0),
(147, 'Hoàng Nguyên Anh', 16, 1724899380, 10000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'hhh', 'hh', '', 1, '[{\"name\":\"12\",\"number\":\"69\"}]', '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724726367, NULL, '9', 1, 0, 0, NULL, 2, 1724467542, 1724469226, NULL, NULL, 0, 1724467427, 1724726367, 0),
(148, 'Hoàng Nguyên An', 24, 1724982540, 1000, 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'https://docs.google.com/spreadsheets/d/1GcFtjn8FQxoaszDJ6pKqIJMUB-Q0oOyi0RWfV1hhNf4/edit#gid=0', 'h', 'h', 'h', 1, NULL, '[{\"name\":\"12\",\"number\":\"75\"}]', 4, 1724896159, NULL, NULL, 1, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 0, 1724896159, 1724896159, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_type`
--

CREATE TABLE `project_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `author` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` int(11) DEFAULT 0,
  `updated_at` int(11) DEFAULT 0,
  `delete_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `project_type`
--

INSERT INTO `project_type` (`id`, `name`, `price`, `author`, `status`, `created_at`, `updated_at`, `delete_status`) VALUES
(1, 'test', 0, 1, 2, 1719538654, 1719538654, 1),
(2, 'hjkjk', 0, 1, 1, 1719541322, 1719541322, 1),
(3, 'mạnh he he', 0, 1, 1, 1719549231, 1719549231, 1),
(4, 'Nguyễn Văn A', 0, 7, 2, 1719633152, 1719633152, 1),
(5, 'Nguyễn Văn A111111', 0, 7, 1, 1719638300, 1719638300, 1),
(6, 'Nguyễn Văn B', 0, 1, 2, 1719886518, 1719886518, 1),
(7, 'Nguyễn Văn C', 0, 1, 1, 1719886526, 1719886526, 1),
(8, 'Nguyễn Văn D', 0, 1, 1, 1719886539, 1719886539, 1),
(9, 'Nguyễn Văn A11', 0, 1, 1, 1719976336, 1719976336, 1),
(10, 'bui anhanh', 0, 1, 1, 1721814229, 1721814229, 1),
(11, 'hahhaha', 0, 1, 1, 1721882814, 1721882814, 1),
(12, 'hihi ', 0, 1, 1, 1721960458, 1721960458, 1),
(13, 'bá mạnh he he', 0, 1, 1, 1721966779, 1721966779, 1),
(14, 'Anh Mạnh', 0, 1, 1, 1722045483, 1722045483, 1),
(15, 'bá mạnh', 0, 1, 1, 1722219977, 1722219977, 1),
(16, 'mạnh 1', 10000, 1, 1, 1722226070, 1724895863, 1),
(17, 'test1', 0, 1, 1, 1722226079, 1722226079, 1),
(18, 'Nguyễn Văn A', 0, 1, 1, 1722853468, 1722853468, 1),
(19, 'bui anhanhjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhh', 0, 1, 1, 1722853543, 1724296116, 0),
(20, 'bui anhanh12', 0, 1, 1, 1723434664, 1723434671, 0),
(21, 'test 1', 10000, 1, 1, 1724292115, 1724896187, 1),
(22, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhiiiiiiiiiiiiiiiiiiihhhhhhhh', 0, 30, 1, 1724380673, 1724380673, 1),
(23, 'mạnh 1234', 0, 1, 2, 1724406819, 1724406852, 0),
(24, 'hum nya ', 1000, 1, 1, 1724896132, 1724896132, 0);

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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `money`, `phone`, `email`, `role`, `status`, `created_at`, `updated_at`, `delete_user`) VALUES
(1, 'admin', 'Admin', '96e79218965eb72c92a549dd5a330112', 0, '24587964', 'mail@gmail.com', 1, 1, 0, 0, 0),
(7, 'Om', 'om ', '96e79218965eb72c92a549dd5a330112', 0, '0397863425', 'tsh@gmail.com', 3, 1, 1719539830, 1722659509, 0),
(8, 'qa', 'test', '96e79218965eb72c92a549dd5a330112', 0, '397863425', 'test1@gamil.com', 4, 1, 1719539852, 1721790555, 1),
(9, 'index', 'test', '96e79218965eb72c92a549dd5a330112', 0, '397863425', 'test1@gamil.com', 3, 1, 1719539871, 1719890408, 0),
(10, 'ctv', 'test 1', '96e79218965eb72c92a549dd5a330112', 174549167, '397863425', 'test1@gamil.com', 5, 1, 1719539890, 1719893406, 1),
(11, 'ctv1', 'tẹhggf', '96e79218965eb72c92a549dd5a330112', 100863342, '397863425', 'test1@gamil.com', 5, 1, 1719539915, 1719804394, 1),
(12, 'abcyz', 'test', '96e79218965eb72c92a549dd5a330112', 1029765, '1738731212', 'test1@gamil.com', 5, 1, 1719633101, 1719890428, 1),
(13, 'qa1', 'test1', '96e79218965eb72c92a549dd5a330112', 0, '1738731212', 'test1@gamil.com', 4, 1, 1719633309, 1721790477, 1),
(14, 'qa1111', 'test', '96e79218965eb72c92a549dd5a330112', 0, '1738731212', 'test1@gamil.com', 4, 2, 1719634034, 1719634097, 1),
(15, 'abc', 'húhh', '96e79218965eb72c92a549dd5a330112', 0, '397863425', 'test1@gamil.com', 3, 1, 1719827140, 1719827169, 0),
(16, 'ctv123', 'Nguyễn Thị Aanh', '96e79218965eb72c92a549dd5a330112', 0, '397863425', 'test1@gamil.com', 4, 1, 1719827348, 1724409198, 0),
(17, 'chinhcttt', 'Tiêu viêm', '96e79218965eb72c92a549dd5a330112', 346900, '2147483647', 'tieuviem@gmail.com', 5, 1, 1719851382, 1721787986, 1),
(18, 'qa11', 'test', '96e79218965eb72c92a549dd5a330112', 0, '1738731212', 'test1@gamil.com', 3, 1, 1719901305, 1721790570, 0),
(19, 'admin1112', 'Bùi Thị Anh', '96e79218965eb72c92a549dd5a330112', 0, '333446389', 'chuphuonghien82@gmail.com', 4, 1, 1719971767, 1719971767, 1),
(20, 'qa', 'aaaaaaaaaaa', '96e79218965eb72c92a549dd5a330112', 0, '16666666', 'anhhamhap000@gmail.com', 4, 1, 1719972378, 1721879757, 0),
(21, 'ctv111', 'AnhBT', '96e79218965eb72c92a549dd5a330112', 0, '333446387', 'anhhamhap000@gmail.com', 5, 1, 1720421662, 1720421662, 1),
(22, 'ctv11', 'test', '96e79218965eb72c92a549dd5a330112', 0, '397863425', 'test1@gamil.com', 5, 2, 1720422391, 1720422391, 1),
(23, 'ctv123', 'AnhBT', '96e79218965eb72c92a549dd5a330112', 0, '333446387', 'anhhamhap000@gmail.com', 5, 1, 1721787622, 1721787622, 1),
(24, 'ctv1234', 'AnhBT', '96e79218965eb72c92a549dd5a330112', 653522, '333443870', 'anhhamhap000@gmail.com', 5, 1, 1721788016, 1721980330, 0),
(25, 'anhbuithi111', 'bui anhanh', '81dc9bdb52d04dc20036dbd8313ed055', 0, '11112234', 'annham@gmail.com', 4, 1, 1721813736, 1721813736, 0),
(26, 'anhbuithi', 'bui anhanh', '96e79218965eb72c92a549dd5a330112', 0, '1111111111', 'annham@gmail.com', 4, 1, 1721813786, 1721813786, 0),
(27, 'ctv', 'test1', '96e79218965eb72c92a549dd5a330112', 0, '1738731212', 'test1@gamil.com', 5, 1, 1721879284, 1721879284, 1),
(28, 'ctv', 'hahhaha', '96e79218965eb72c92a549dd5a330112', 0, '0838481898', 'anhkieu218@gmail.com', 5, 1, 1721897629, 1721897629, 0),
(29, 'admin1', 'Bùi Thị Anh1', '96e79218965eb72c92a549dd5a330112', 192843028, '01234567', 'anhhamhap000@gmail.com', 5, 1, 1721960887, 1724385155, 0),
(30, 'admin11111111111111111111', 'Admin11111111111111111111', '96e79218965eb72c92a549dd5a330112', 0, '24587964', 'mail@gmail.com', 2, 1, 1724292298, 1724292439, 0),
(31, 'ctv1112', 'Bùi Thị Anh', '96e79218965eb72c92a549dd5a330112', 0, '0333446389', 'anhbt@wind.com', 5, 1, 1724383236, 1724383546, 0),
(32, 'qa111', 'Bùi Thị Anh', '96e79218965eb72c92a549dd5a330112', 0, '0333446389', 'anhbt@wind.com', 2, 1, 1724383254, 1724383254, 0),
(33, 'index111', 'Bùi Thị Anh', '96e79218965eb72c92a549dd5a330112', 0, '0333446389', 'anhbt@wind.com', 3, 2, 1724383273, 1724383987, 0),
(34, 'pm111', 'Bùi Thị Anh', '96e79218965eb72c92a549dd5a330112', 0, '0333446389', 'anhbt@wind.com', 2, 1, 1724383316, 1724383316, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `collect_money`
--
ALTER TABLE `collect_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `ctv_jobs`
--
ALTER TABLE `ctv_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `input_source`
--
ALTER TABLE `input_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT cho bảng `job_index`
--
ALTER TABLE `job_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `project_type`
--
ALTER TABLE `project_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
