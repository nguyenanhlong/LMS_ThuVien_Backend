-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2026 at 01:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_thuvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `user` varchar(255) NOT NULL DEFAULT 'System',
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `action`, `details`, `user`, `date`, `created_at`, `updated_at`) VALUES
('AL-20260608224717-5STW', 'Đăng nhập', 'Tài khoản: admin@gmail.com', 'System', '2026-06-08 15:47:17', '2026-06-08 15:47:17', '2026-06-08 15:47:17'),
('AL-20260608224858-7XI3', 'Đăng xuất', 'Người dùng đăng xuất hệ thống', 'admin', '2026-06-08 15:48:58', '2026-06-08 15:48:58', '2026-06-08 15:48:58'),
('AL-20260608230435-WTZF', 'Đăng nhập', 'Tài khoản: admin@gmail.com', 'System', '2026-06-08 16:04:35', '2026-06-08 16:04:35', '2026-06-08 16:04:35'),
('AL-20260608230813-FARW', 'Thêm sách mới', 'Mã sách: BK-9135', 'admin', '2026-06-08 16:08:13', '2026-06-08 16:08:13', '2026-06-08 16:08:13'),
('AL-20260609110218-KQD1', 'Đăng xuất', 'Người dùng đăng xuất hệ thống', 'admin', '2026-06-09 04:02:18', '2026-06-09 04:02:18', '2026-06-09 04:02:18'),
('AL-20260609110230-HHAC', 'Đăng nhập', 'Tài khoản: admin@gmail.com', 'System', '2026-06-09 04:02:30', '2026-06-09 04:02:30', '2026-06-09 04:02:30'),
('AL-20260609112809-HZKE', 'Cập nhật sách', 'Mã sách: BK-9135', 'admin', '2026-06-09 04:28:09', '2026-06-09 04:28:09', '2026-06-09 04:28:09'),
('AL-20260609112940-C3OI', 'Thêm sách mới', 'Mã sách: BK-5782', 'admin', '2026-06-09 04:29:40', '2026-06-09 04:29:40', '2026-06-09 04:29:40'),
('AL-20260609113021-WHVU', 'Thêm sách mới', 'Mã sách: BK-3726', 'admin', '2026-06-09 04:30:21', '2026-06-09 04:30:21', '2026-06-09 04:30:21'),
('AL-20260609113030-SNLC', 'Cập nhật sách', 'Mã sách: BK-3726', 'admin', '2026-06-09 04:30:30', '2026-06-09 04:30:30', '2026-06-09 04:30:30'),
('AL-20260609113339-UKOL', 'Thêm sách mới', 'Mã sách: BK-5142', 'admin', '2026-06-09 04:33:39', '2026-06-09 04:33:39', '2026-06-09 04:33:39'),
('AL-20260609113500-WIFW', 'Thêm sách mới', 'Mã sách: BK-6008', 'admin', '2026-06-09 04:35:00', '2026-06-09 04:35:00', '2026-06-09 04:35:00'),
('AL-20260609113640-TADG', 'Thêm sách mới', 'Mã sách: BK-9594', 'admin', '2026-06-09 04:36:40', '2026-06-09 04:36:40', '2026-06-09 04:36:40'),
('AL-20260609113755-SVL3', 'Thêm sách mới', 'Mã sách: BK-3946', 'admin', '2026-06-09 04:37:55', '2026-06-09 04:37:55', '2026-06-09 04:37:55'),
('AL-20260609113857-CTEY', 'Thêm sách mới', 'Mã sách: BK-7908', 'admin', '2026-06-09 04:38:57', '2026-06-09 04:38:57', '2026-06-09 04:38:57'),
('AL-20260609114027-RPMD', 'Thêm sách mới', 'Mã sách: BK-5706', 'admin', '2026-06-09 04:40:27', '2026-06-09 04:40:27', '2026-06-09 04:40:27'),
('AL-20260609114144-KZWE', 'Thêm sách mới', 'Mã sách: BK-3460', 'admin', '2026-06-09 04:41:44', '2026-06-09 04:41:44', '2026-06-09 04:41:44'),
('AL-20260609114317-UTZ4', 'Thêm sách mới', 'Mã sách: BK-5811', 'admin', '2026-06-09 04:43:17', '2026-06-09 04:43:17', '2026-06-09 04:43:17'),
('AL-20260609114428-THVV', 'Thêm sách mới', 'Mã sách: BK-5040', 'admin', '2026-06-09 04:44:28', '2026-06-09 04:44:28', '2026-06-09 04:44:28'),
('AL-20260609114546-NCC2', 'Thêm sách mới', 'Mã sách: BK-4983', 'admin', '2026-06-09 04:45:46', '2026-06-09 04:45:46', '2026-06-09 04:45:46'),
('AL-20260609114701-HNLB', 'Thêm sách mới', 'Mã sách: BK-4138', 'admin', '2026-06-09 04:47:01', '2026-06-09 04:47:01', '2026-06-09 04:47:01'),
('AL-20260609114824-MGKQ', 'Thêm sách mới', 'Mã sách: BK-8263', 'admin', '2026-06-09 04:48:24', '2026-06-09 04:48:24', '2026-06-09 04:48:24'),
('AL-20260609114948-RIRN', 'Thêm sách mới', 'Mã sách: BK-6568', 'admin', '2026-06-09 04:49:48', '2026-06-09 04:49:48', '2026-06-09 04:49:48'),
('AL-20260609115030-KKWF', 'Thêm sách mới', 'Mã sách: BK-6941', 'admin', '2026-06-09 04:50:30', '2026-06-09 04:50:30', '2026-06-09 04:50:30'),
('AL-20260609115110-9B2X', 'Thêm sách mới', 'Mã sách: BK-2531', 'admin', '2026-06-09 04:51:10', '2026-06-09 04:51:10', '2026-06-09 04:51:10'),
('AL-20260609115201-SNCZ', 'Thêm sách mới', 'Mã sách: BK-6844', 'admin', '2026-06-09 04:52:01', '2026-06-09 04:52:01', '2026-06-09 04:52:01'),
('AL-20260609115312-M3V5', 'Thêm sách mới', 'Mã sách: BK-8663', 'admin', '2026-06-09 04:53:12', '2026-06-09 04:53:12', '2026-06-09 04:53:12'),
('AL-20260609115413-YQMW', 'Thêm sách mới', 'Mã sách: BK-9292', 'admin', '2026-06-09 04:54:13', '2026-06-09 04:54:13', '2026-06-09 04:54:13'),
('AL-20260609115844-MT7B', 'Thêm sách mới', 'Mã sách: BK-7614', 'admin', '2026-06-09 04:58:44', '2026-06-09 04:58:44', '2026-06-09 04:58:44'),
('AL-20260609115953-4KNI', 'Thêm sách mới', 'Mã sách: BK-5031', 'admin', '2026-06-09 04:59:53', '2026-06-09 04:59:53', '2026-06-09 04:59:53'),
('AL-20260609120122-FNYU', 'Thêm sách mới', 'Mã sách: BK-1459', 'admin', '2026-06-09 05:01:22', '2026-06-09 05:01:22', '2026-06-09 05:01:22'),
('AL-20260609120214-DUER', 'Thêm sách mới', 'Mã sách: BK-8888', 'admin', '2026-06-09 05:02:14', '2026-06-09 05:02:14', '2026-06-09 05:02:14'),
('AL-20260609120333-QWVS', 'Thêm độc giả', 'Mã độc giả: RD-6530', 'admin', '2026-06-09 05:03:33', '2026-06-09 05:03:33', '2026-06-09 05:03:33'),
('AL-20260609120418-7TJA', 'Thêm độc giả', 'Mã độc giả: RD-8530', 'admin', '2026-06-09 05:04:18', '2026-06-09 05:04:18', '2026-06-09 05:04:18'),
('AL-20260609120508-UKOY', 'Thêm độc giả', 'Mã độc giả: RD-5431', 'admin', '2026-06-09 05:05:08', '2026-06-09 05:05:08', '2026-06-09 05:05:08'),
('AL-20260609120537-8SZJ', 'Thêm độc giả', 'Mã độc giả: RD-2668', 'admin', '2026-06-09 05:05:37', '2026-06-09 05:05:37', '2026-06-09 05:05:37'),
('AL-20260609120709-QYKV', 'Thêm độc giả', 'Mã độc giả: RD-7722', 'admin', '2026-06-09 05:07:09', '2026-06-09 05:07:09', '2026-06-09 05:07:09'),
('AL-20260609120843-VJFR', 'Tạo phiếu mượn', 'Phiếu mượn: LN-2862', 'admin', '2026-06-09 05:08:43', '2026-06-09 05:08:43', '2026-06-09 05:08:43'),
('AL-20260609121035-J8C8', 'Tạo phiếu mượn', 'Phiếu mượn: LN-6473', 'admin', '2026-06-09 05:10:35', '2026-06-09 05:10:35', '2026-06-09 05:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `code` varchar(255) NOT NULL,
  `cover` text DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Sẵn sàng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`code`, `cover`, `title`, `author`, `category`, `status`, `created_at`, `updated_at`) VALUES
('BK-1459', 'http://127.0.0.1:8000/storage/covers/5ZUElJjB3yUk0n5XWv6nJ16VXA5F3XmgQBNcIMC3.webp', 'Bài Tập Ngữ Văn 12 - Tập 2', 'Nhiều Tác Giả', 'Kỹ thuật', 'Đang mượn', '2026-06-09 05:01:22', '2026-06-09 05:10:35'),
('BK-2531', 'http://127.0.0.1:8000/storage/covers/DjPZzkegIOvgsvfWi7dD8VlHRPJRfhODwzC5kYSB.webp', 'Chuyên Đề Học Tập Sinh Học 10 (Kết Nối Trí Thức)', 'Nhiều Tác Giả', 'Kỹ thuật', 'Đang mượn', '2026-06-09 04:51:10', '2026-06-09 05:08:43'),
('BK-3460', 'http://127.0.0.1:8000/storage/covers/c3XbONonuM4vHtlXLvfVyzVsmlLoKeeqbZebZTER.webp', 'Tập Bản Đồ Và Tư Liệu Lịch Sử 11', 'Nhiều Tác Giả', 'Lịch sử', 'Sẵn sàng', '2026-06-09 04:41:44', '2026-06-09 04:41:44'),
('BK-3726', 'http://127.0.0.1:8000/storage/covers/13nl1KcTFIfRjrZfGDPN4wEmcBBBVJG5VkXXSHpO.webp', 'Mĩ thuật 10', 'SGK', 'Nghệ thuật', 'Sẵn sàng', '2026-06-09 04:30:21', '2026-06-09 04:30:30'),
('BK-3946', 'http://127.0.0.1:8000/storage/covers/6BXPgym8mSIrxWe4OobPxQU9O8junyZYNRTOTBe8.webp', 'Bài Tập Ngữ Văn 11 - Tập 2', 'Nhiều tác giả', 'Kỹ thuật', 'Bảo trì', '2026-06-09 04:37:55', '2026-06-09 04:37:55'),
('BK-4138', 'http://127.0.0.1:8000/storage/covers/tjvwn9Gmv0EzVDNLCgl3yVOuYBacZd33vBWT21iI.webp', 'Giáo Dục Kinh Tế Và Pháp Luật 10', 'Bộ Giáo Dục Và Đào Tạo', 'Kỹ năng mềm', 'Sẵn sàng', '2026-06-09 04:47:01', '2026-06-09 04:47:01'),
('BK-4983', 'http://127.0.0.1:8000/storage/covers/9bVFlKtggw95Q2TYSNTgkG02YpxwrjVWyxGBXVAf.webp', 'Tập Bản Đồ Địa Lí 11', 'Nhiều Tác Giả', 'Lịch sử', 'Sẵn sàng', '2026-06-09 04:45:46', '2026-06-09 04:45:46'),
('BK-5031', 'http://127.0.0.1:8000/storage/covers/l72ym68LNDLCyip2qc2DTm5zJ3WRg5hEDXfpvqPQ.webp', 'Chính sách ưu đãi của Fahasa Thời gian giao hàng :  Giao nhanh và uy tín Chính sách đổi trả :  Đổi trả miễn phí toàn quốc Chính sách khách sỉ :  Ưu đãi khi mua số lượng lớn Tiếng Anh 12 - C21 Smart - WorkBook (2024)', 'Lê Hoàng Dũng, Quản Lê Duy, Trần Thị Minh Phượng, Trịnh Quốc Anh', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:59:53', '2026-06-09 04:59:53'),
('BK-5040', 'http://127.0.0.1:8000/storage/covers/K9K42CpoqDtTBXD4Ev8vtAQj6u3GVNZhuP9cAiFa.webp', 'Tiếng Anh 11 - C21 Smart', 'Lê Hoàng Dũng, Quản Lê Duy, Trần Thị Minh Phượng, Trịnh Quốc Anh', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:44:28', '2026-06-09 04:44:28'),
('BK-5142', 'http://127.0.0.1:8000/storage/covers/DlOFw04zoTxjSdyVXvsLpXX8kB1n4t7vzBLrdsHo.webp', 'Hoạt Động Trải Nghiệm, Hướng Nghiệp 10 (Kết Nối)', 'SGK', 'Kỹ năng mềm', 'Đang mượn', '2026-06-09 04:33:39', '2026-06-09 04:33:39'),
('BK-5706', 'http://127.0.0.1:8000/storage/covers/jK8NnTPIkFV3nJyPzalBxkSZqYIgZfLIbVj6nR3g.webp', 'Giáo Dục Văn Hóa-Nghệ Thuật - Lớp 11', 'Nhiều Tác Giả', 'Nghệ thuật', 'Sẵn sàng', '2026-06-09 04:40:27', '2026-06-09 04:40:27'),
('BK-5782', 'http://127.0.0.1:8000/storage/covers/58AMnc2EAnptfKUV7KgH07YLlDVc9D8s80JaQF9p.webp', 'Chuyên đề Toán 10', 'SGK', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:29:40', '2026-06-09 04:29:40'),
('BK-5811', 'http://127.0.0.1:8000/storage/covers/dpYju6nwOgEEtYFPr1YyIKJvTgV2zYFcSMPxzZrG.webp', 'Chuyên Đề Học Tập Âm Nhạc 11', 'Phạm Phương Hoa, Trần Thị Thu Hà, Phạm Hoàng Trung, Nguyễn Quang Tùng', 'Nghệ thuật', 'Sẵn sàng', '2026-06-09 04:43:17', '2026-06-09 04:43:17'),
('BK-6008', 'http://127.0.0.1:8000/storage/covers/WyaW5CJLeqHSUILVpuVnyhLAsZOlYpDhLgo1FzLQ.webp', '165 Bài Văn Mẫu Chọn Lọc Lớp 11', 'Thái Quang Vinh', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:35:00', '2026-06-09 04:35:00'),
('BK-6568', 'http://127.0.0.1:8000/storage/covers/ZdjE0cnAIMnlp9i7EenykC2fvlQeTxyBNbMucA3G.webp', 'Tiếng Anh 10 - C21 - Smart - Student\'s Book', 'Nhiều Tác Giả', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:49:48', '2026-06-09 04:49:48'),
('BK-6844', 'http://127.0.0.1:8000/storage/covers/TvFy1sNb7DUinm8rClGTf1CsZegVu386p3ojaVYY.webp', 'Chuyên Đề Học Tập Hóa Học 10 (Kết Nối Trí Thức)', 'Nhiều Tác Giả', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:52:01', '2026-06-09 04:52:01'),
('BK-6941', 'http://127.0.0.1:8000/storage/covers/2Hy3vdpO1fhZdv8hChiilik6ZenzA0AfiRurgQOR.webp', 'Mĩ Thuật 10 - Thiết Kế Mĩ Thuật Sân Khấu, Điện Ảnh', 'Nhiều Tác Giả', 'Nghệ thuật', 'Sẵn sàng', '2026-06-09 04:50:30', '2026-06-09 04:50:30'),
('BK-7614', 'http://127.0.0.1:8000/storage/covers/fT9frlP2WZbLpbMKqUfTvrl9LjzKSOXDoIelqXY8.webp', 'Bài Tập Giáo Dục Kinh Tế Và Pháp Luật 12', 'Nhiều tác giả', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:58:44', '2026-06-09 04:58:44'),
('BK-7908', 'http://127.0.0.1:8000/storage/covers/CVIz3a6QZOi7WWL10AFCu1YOWnI9KXRIFjNcQVGA.webp', 'Chuyên Đề Học Tập Công Nghệ 11 - Công Nghệ Cơ Khí', 'Nhiều Tác Giả', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:38:57', '2026-06-09 04:38:57'),
('BK-8263', 'http://127.0.0.1:8000/storage/covers/XVoUPNqqvYkGVKJu8DQsn2vdvlkZsp67lSZhX80p.jpg', 'Tập Bản Đồ Và Tư Liệu Lịch Sử 10', 'Nhiều Tác Giả', 'Lịch sử', 'Sẵn sàng', '2026-06-09 04:48:24', '2026-06-09 04:48:24'),
('BK-8663', 'http://127.0.0.1:8000/storage/covers/HrDSAjdh6TEbPShZaLGyq6Gk6b9f8OgonPVHqsE1.webp', 'Mĩ Thuật 10 - Điêu Khắc', 'Nhiều Tác Giả', 'Nghệ thuật', 'Sẵn sàng', '2026-06-09 04:53:12', '2026-06-09 04:53:12'),
('BK-8888', 'http://127.0.0.1:8000/storage/covers/2uguL1D0t2okOknAypb0RJ1dS5o0dxlrqYMxAuAJ.webp', 'Chuyên Đề Học Tập Công Nghệ 12 - Lâm Nghiệp - Thủy Sản', 'Nhiều Tác Giả', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 05:02:14', '2026-06-09 05:02:14'),
('BK-9135', 'http://127.0.0.1:8000/storage/covers/kKEgIIa3JP8qdUk69VFujqGMnIEpyvfbk9q9fIEK.webp', 'Toán Lớp 10 tập 1', 'SGK', 'Kỹ thuật', 'Sẵn sàng', '2026-06-08 16:08:13', '2026-06-09 04:28:09'),
('BK-9292', 'http://127.0.0.1:8000/storage/covers/atR3B5ikZbjLrXN4TrTxCMv4Fs6r3c5WOHDMlhDu.webp', 'Mĩ Thuật 12 - Thiết Kế Mĩ Thuật Đa Phương Tiện', 'Nhiều tác giả', 'Kỹ thuật', 'Sẵn sàng', '2026-06-09 04:54:13', '2026-06-09 04:54:13'),
('BK-9594', 'http://127.0.0.1:8000/storage/covers/kOMPrdYY8TyJ2JTqd9191xc4xk8ona0v7AUmU4jd.webp', 'Giáo Dục Kinh Tế Và Pháp Luật 11 (Kết Nối Tri Thức)', 'SGK', 'Kỹ năng mềm', 'Sẵn sàng', '2026-06-09 04:36:40', '2026-06-09 04:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` varchar(255) NOT NULL,
  `loanId` varchar(255) DEFAULT NULL,
  `readerId` varchar(255) NOT NULL,
  `readerName` varchar(255) NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `reason` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Chưa thu',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` varchar(255) NOT NULL,
  `readerId` varchar(255) NOT NULL,
  `readerName` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `due` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Đang mượn',
  `books` longtext NOT NULL CHECK (json_valid(`books`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `readerId`, `readerName`, `date`, `due`, `status`, `books`, `created_at`, `updated_at`) VALUES
('LN-2862', 'RD-5431', 'Tạ Xuân Bắc', '2026-06-09', '2026-06-23', 'Đang mượn', '[\"BK-2531\"]', '2026-06-09 05:08:43', '2026-06-09 05:08:43'),
('LN-6473', 'RD-6530', 'Nguyễn Anh Long', '2026-06-09', '2026-06-23', 'Đang mượn', '[\"BK-1459\"]', '2026-06-09 05:10:35', '2026-06-09 05:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_06_08_000001_create_users_table', 1),
(2, '2026_06_08_000002_create_books_table', 1),
(3, '2026_06_08_000003_create_readers_table', 1),
(4, '2026_06_08_000004_create_loans_table', 1),
(5, '2026_06_08_000005_create_fines_table', 1),
(6, '2026_06_08_000006_create_suppliers_table', 1),
(7, '2026_06_08_000007_create_notifications_table', 1),
(8, '2026_06_08_000008_create_audit_logs_table', 1),
(9, '2026_06_08_000009_create_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'info',
  `date` timestamp NULL DEFAULT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `readers`
--

CREATE TABLE `readers` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `card` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readers`
--

INSERT INTO `readers` (`id`, `name`, `card`, `phone`, `email`, `type`, `status`, `created_at`, `updated_at`) VALUES
('RD-2668', 'Bùi Ngọc Hội', 'LIB-2026-422', '0903778678', 'hoi@gmail.com', 'Sinh vien', 'Da khoa', '2026-06-09 05:05:37', '2026-06-09 05:05:37'),
('RD-5431', 'Tạ Xuân Bắc', 'LIB-2026-346', '0902882781', 'bac@gmail.com', 'Sinh vien', 'Hoat dong', '2026-06-09 05:05:08', '2026-06-09 05:05:08'),
('RD-6530', 'Nguyễn Anh Long', 'LIB-2026-141', '0909652112', 'long@gmail.com', 'Sinh vien', 'Hoat dong', '2026-06-09 05:03:33', '2026-06-09 05:03:33'),
('RD-7722', 'Huỳnh Xuân Phụng', 'LIB-2026-575', '0933874081', 'phung@gmail.com', 'Giang vien', 'Hoat dong', '2026-06-09 05:07:09', '2026-06-09 05:07:09'),
('RD-8530', 'Phan Anh Tuấn', 'LIB-2026-902', '0906772981', 'tuan@gmail.com', 'Sinh vien', 'Hoat dong', '2026-06-09 05:04:18', '2026-06-09 05:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` varchar(255) NOT NULL,
  `bookCode` varchar(255) NOT NULL,
  `readerName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `notifyMethod` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Chờ nhận',
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `books` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'librarian',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'librarian', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readers`
--
ALTER TABLE `readers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
