-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 02:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
use camping;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_time` int(11) NULL,
  `last_updated` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(7, 'Lều'),
(8, 'Vật dụng'),
(9, 'Thức ăn'),
(10, 'Đồ uống'),
(11, 'Nội thất');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_time` int(11) NULL,
  `last_updated` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_library`
--

CREATE TABLE `image_library` (
  `id` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `thumbails` varchar(255) DEFAULT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_library`
--

INSERT INTO `image_library` (`id`, `path`, `product_id`, `thumbails`, `created_time`, `last_updated`) VALUES
(15, 'uploads/23-11-2023/4-1(1).png', 5, NULL, 1700795143, 1700795143),
(16, 'uploads/23-11-2023/3-1(1).png', 5, NULL, 1700795143, 1700795143),
(17, 'uploads/23-11-2023/1-1(1).png', 5, NULL, 1700795143, 1700795143),
(18, 'uploads/29-11-2023/Leu-2-nguoi-5-1.jpg', 6, NULL, 1701279248, 1701279248),
(19, 'uploads/29-11-2023/Leu-2-nguoi-3-1.jpg', 6, NULL, 1701279248, 1701279248),
(20, 'uploads/29-11-2023/Leu-2-nguoi-1-1.jpg', 6, NULL, 1701279248, 1701279248);

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `order_date` varchar(200) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `user_id`, `fullname`, `email`, `phone`, `address`, `note`, `order_date`, `status`) VALUES
(1, 4, 'Lê Long Thiên', 'longthienl80@gmail.com', '0787626825', 'Hòa Vang', '', '2023-12-01 00:38:58', 'Đã thanh toán'),
(2, 5, 'Lê Long Thiên', 'quynh11112004@gmail.com', '0787626825', 'Việt Nam', 'noteeee', '2023-12-01 00:41:41', 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `oder_details`
--

CREATE TABLE `oder_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `day_rent` int(11) NOT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oder_details`
--

INSERT INTO `oder_details` (`id`, `order_id`, `product_id`, `price`, `num`, `day_rent`, `total_money`) VALUES
(1, 1, 6, 40000, 3, 4, 480000),
(2, 2, 5, 800000, 3, 2, 4800000),
(3, 2, 6, 40000, 6, 3, 720000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(350) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `content` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `image_path`, `price`, `content`, `created_time`, `last_updated`) VALUES
(5, 7, 'Lều Mông Cổ Glamping', 'uploads/23-11-2023/Leucamtrai-3(1).png', NULL, 800000, '<ul>\r\n	<li>Tổng trọng lượng lều : 23kg</li>\r\n	<li>K&iacute;ch thước: DxRxC: 4mx4mx2,5m, ph&ugrave; hợp cho 6-8 người sử dụng</li>\r\n	<li>Lều được thiết kế hiện đại, gọn nhẹ,&nbsp;dễ d&agrave;ng lắp đặt v&agrave; thu gọn rất tiện &iacute;ch.</li>\r\n	<li>Khung lều l&agrave;m bằng th&eacute;p hợp kim cao cấp bền bỉ</li>\r\n	<li><strong>Chất liệu vải :</strong>&nbsp;200g TC cao cấp chống tia cực&nbsp; t&iacute;m, tuổi thọ cao, đường chỉ may được &eacute;p keo gi&uacute;p chống nước tuyệt đối,&nbsp;độ bền cực cao</li>\r\n	<li>Vải đ&aacute;y&nbsp;lều 420g PVC chống m&agrave;i m&ograve;n, chống hơi ẩm từ b&ecirc;n dưới</li>\r\n	<li>Kh&oacute;a k&eacute;o loại xịn, k&eacute;o rất nhẹ nh&agrave;ng, v&agrave; bền đẹp</li>\r\n	<li>Lều c&oacute; 1 cửa ch&iacute;nh rộng v&agrave; nhiều cửa sổ xung quanh rất tho&aacute;ng</li>\r\n</ul>\r\n', 1700795142, 1700795142),
(6, 7, 'Cho Thuê Lều Cắm Trại 2 Người Salida', 'uploads/29-11-2023/Them-tieu-de-4.png', NULL, 40000, '<ul>\r\n	<li>Chất Liệu: vải 190t PU 2000 .Lưới Lỗ 68.</li>\r\n	<li>K&iacute;ch Thước: D&agrave;i 2.0m, Rộng 1.4 m, Cao 1.3m.</li>\r\n	<li>C&acirc;n nặng: 2.0Kg, đựng trong t&uacute;i 60cmx20xm20cm</li>\r\n	<li>Khung Lều: Khung sợi thủy tinh 8.5mm .veron inox , cọc th&eacute;p 5.5mm 4 c&acirc;y.</li>\r\n	<li>M&ocirc; Tả: Lớp trong lưới 68 ,lều c&oacute; 1 cửa ch&iacute;nh,cửa c&oacute; 2 lớp .Lớp Vải Ngo&agrave;i 190t chống thấm tuyệt đối, c&oacute; tăng đưa tăng giảm .</li>\r\n</ul>\r\n', 1701279248, 1701279248);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'custom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `birthday` int(11) NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `birthday`, `created_time`, `last_updated`) VALUES
(1, 1, 'admin', '123', 'admin', 'admin@gmail.com', '0123456789', 'Da Nang', 2004, 20112023, 20112023),
(4, 2, 'longthien', '123', 'Lê Long Thiên', 'longthienl80@gmail.com', '0787626825', 'Hòa Vang', 0, 0, 0),
(5, 2, 'longthien_17', '123', 'Lê Long Thiên', 'quynh11112004@gmail.com', '048204221', 'Việt Nam', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `image_library`
--
ALTER TABLE `image_library`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `oder_details`
--
ALTER TABLE `oder_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_library`
--
ALTER TABLE `image_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oder_details`
--
ALTER TABLE `oder_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `image_library`
--
ALTER TABLE `image_library`
  ADD CONSTRAINT `image_library_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oders`
--
ALTER TABLE `oders`
  ADD CONSTRAINT `oders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `oder_details`
--
ALTER TABLE `oder_details`
  ADD CONSTRAINT `oder_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `oders` (`id`),
  ADD CONSTRAINT `oder_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
