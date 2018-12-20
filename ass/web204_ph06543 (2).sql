-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2018 lúc 02:45 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web204_ph06543`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `url`) VALUES
(1, 'huyndai', 'image/Hyundai-logo-C41591E6EF-seeklogo.com.png', 'https://www.hyundaivn.com'),
(2, 'kia', 'image/Kia_motors_logo.png', 'http://www.kiamotorsvietnam.com.vn/'),
(4, 'Vinfast', 'image/vinfastblack-e1531912535363.jpg', 'http://www.vinfast.com/'),
(5, 'audi', 'image/Audi_Logo_1985.png', 'http://www.vinfast.com'),
(15, 'mada', 'image/doi-tac/5bc36c70176a0.png', 'mada'),
(16, 'hgfhgfh', 'image/doi-tac/5bc435a1d144a.jpg', 'thgfhgf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descsription` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `descsription`) VALUES
(1, 'Xe Sports', '16-09-2018'),
(2, 'Xe Gia Đình', '15-09-2018'),
(6, 'xe xịn', 'xịn quá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `email`, `content`, `product_id`, `status`) VALUES
(1, 'dungcnph06543@fpt.edu.vn', 'xe đẹp mà1', 3, -1),
(6, 'dungvnph06543@fpt.edu.vn', 'xe này rất là đẹp33', 12, 1),
(24, 'admin@gmail.com', '1111', 24, 1),
(25, '8yuy', '8y8y', 26, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `conten` text,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `conten`, `address`) VALUES
(1, 'Dung Ruồi', 1693079176, 'dungvnph06543@fpt.edu.vn', 'sản phẩm tốt chất lượng tốt', 'phú diễn'),
(3, 'Dung Ruồi', 1693079176, 'admin@gmail.com', 'hi đẹp quá1', 'Phú Diễn,Bắc Từ Liêm, Hà Nội'),
(6, 'rung đẹp trai', 1693079176, '', '11111', ''),
(7, '453454', 35345, '', 'lkl', ''),
(10, 'dffds', 342424, 'dungvnph06543@fpt.edu.vn', '<p>ewrewrwerwer</p>', ''),
(13, 'dfgdfg', 0, 'gdfgdf@gmail.com', '<p>gdgfd</p>', 'dfgdfg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `detail` text,
  `list_price` int(11) DEFAULT '0',
  `sell_price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `product_name`, `detail`, `list_price`, `sell_price`, `image`, `status`, `views`) VALUES
(1, 1, 'Ranger SM-2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 500000000, 450000000, 'image/oto1.jpg', 1, 50),
(2, 2, 'Ranger SMx-2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 420000000, 370000000, 'image/oto2.jpg', 1, 180),
(3, 1, 'Ranger SLX-2018', 'Quisque imperdiet dignissim enim dictum finibus. Sed consectetutr convallis enim eget laoreet', 600000000, 580000000, 'image/oto3.jpg', 1, 200),
(4, 1, 'Ranger Su64X-2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 780000000, 640000000, 'image/oto4.jpg', 1, 230),
(6, 1, 'Ranger-Ford 640U_2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 550000000, 450000000, 'image/oto6.jpg', 1, 1),
(7, 2, 'Ranger-Focus 640U_2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 550000000, 450000000, 'image/oto7.jpg', 2, 180),
(8, 2, 'Ranger-Focus 65y0U_2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s conteoto8.jpgnt', 350000000, 300000000, 'image/oto8.jpg', 2, 300),
(9, 2, 'Ranger-Focus 670U_2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 650000000, 500000000, 'image/oto9.jpg', 1, 800),
(10, 2, 'Ranger-Focus 63l0U_2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 450000000, 425000000, 'image/oto10.jpg', 1, 142),
(11, 2, 'Ranger-Focus 63l0U_2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 420000000, 370000000, 'image/oto11.jpg', 2, 250),
(12, 2, 'Ranger-Focus 63l0U_2018', 'Some quick example text to build on the card title and make up the bulk of the card\'s content', 420000000, 370000000, 'image/oto13.jpg', 2, 123),
(18, 2, 'Ranger SM-2018', '<p>\r\n\r\nSome quick example text to build on the card title and make up the bulk of the card\'s content 1<br></p>', 450000000, 420000000, 'image/san-pham/5bbf1c73e416c.jpg', 1, 1),
(20, 1, 'Focus Blue 2018', '<p>\r\n\r\n<b></b></p><div><div><div><div><div><div><p><b>Etiam sit amet ex pharetra, venenatis ante vehicula, gravida sapien. Fusce eleifend vulputate nibh, non cursus augue placerat pellentesque. Sed venenatis risus nec felis mollis, in pharetra urna euismod. Morbi aliquam ut turpis sit amet ultrices. Vestibulum mattis blandit nisl, et tristique elit scelerisque nec. Fusce eleifend laoreet dui eget aliquet. Ut rutrum risus et nunc pretium scelerisque. Fusce viverra, ligula quis pellentesque interdum, leo felis congue dui, ac accumsan sem nulla id lorem. Praesent ut tristique dui, nec condimentum lacus. Maecenas lobortis ante id egestas placerat. Nullam at ultricies lacus. Nam in nulla consectetur, suscipit mauris eu, fringilla augue. Phasellus gravida, dui quis dignissim tempus, tortor orci tristique leo, ut congue diam ipsum at massa. Pellentesque ut vestibulum erat. Donec a felis eget </b></p></div></div></div></div></div></div>\r\n\r\n<p></p>', 424234, 4234234, 'image/san-pham/5bc0ba88afc51.jpeg', 1, 1),
(21, 1, 'Ranger SMH-2018', '<p>\r\n\r\nEtiam sit amet ex pharetra, venenatis ante vehicula, gravida sapien. Fusce eleifend vulputate nibh,&nbsp;<br></p>', 800000000, 750000000, 'image/san-pham/5bc218783f756.jpg', 1, 1),
(23, 1, 'Focus RED 2018', '<p>\r\n\r\n<b></b></p><div><div><div><div><div><div><p><b>Etiam sit amet ex pharetra, venenatis ante vehicula, gravida sapien. Fusce eleifend vulputate nibh,</b></p></div></div></div></div></div></div><p></p>', 720000000, 650000000, 'image/san-pham/5bc2190dbd8ed.jpg', 1, 1),
(24, 1, 'Focus Black 2018', '<p>\r\n\r\nEtiam sit amet ex pharetra, venenatis ante vehicula, gravida sapien. Fusce eleifend vulputate nibh, non cursus augue placerat pellentesque.<br></p>', 740000000, 700000000, 'image/san-pham/5bc21b8163372.jpeg', 1, 1),
(25, 1, 'Ranger Red-2018', '<p>\r\n\r\nEtiam sit amet ex pharetra, venenatis ante vehicula, gravida sapien. Fusce eleifend vulputate nibh, non cursus augue placerat pellentesque.<br></p>', 900000000, 850000000, 'image/san-pham/5bc21c4aad71c.jpg', 1, 1),
(26, 6, '111111', '<p>22222</p>', 423000000, 342000000, 'image/san-pham/5bc3041cc787e.jpg', -1, 1),
(27, 2, 'fsfsdf', '<p>1111</p>', 5345345, 45345325, 'image/san-pham/5bc557cbd7b06.jpg', 1, 1),
(29, 6, '43534543', '<p>54353453</p>', 534534543, 435345345, 'image/san-pham/5bc560a610de3.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desct` text,
  `url` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slideshows`
--

INSERT INTO `slideshows` (`id`, `image`, `desct`, `url`, `status`, `order_number`) VALUES
(1, 'image/oto.jpg', '16-09-2018', 'http://localhost:81/lab1_dungvnph06543/index.php', 1, 1),
(2, 'image/xe.jpg', '15-09-2018', 'http://localhost:81/lab1_dungvnph06543/index.php', 1, 2),
(3, 'image/xe1.jpg', '15-09-2018', 'http://localhost:81/lab1_dungvnph06543/index.php', 1, 4),
(4, 'image/xe2.jpg', '15-09-2018', 'http://localhost:81/lab1_dungvnph06543/index.php', 1, 3),
(5, 'image/slide/5bc342cf49b7c.jpg', '8', '8888', -1, 8),
(6, 'image/slide/5bc3545f90673.jpg', 'uiuyi', '76iy', -1, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT '1',
  `address` varchar(1000) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `gender` int(11) DEFAULT '1',
  `phone_number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `role`, `address`, `avatar`, `gender`, `phone_number`) VALUES
(30, 'admin@gmail.com', 'Dung Ruồi', '$2y$10$hciVg48zgpDrfZcRjgdvpe8V6asZ8l6QvJeV42dgfoA0u7JecVMpu', 500, '<p>admin</p>', NULL, 1, '1693079176'),
(33, 'dungvnph06543@fpt.edu.vn', 'Dung Ruồi', '$2y$10$wVEq958r59aG0wmzaVdCluyaaIRL7yzvhAsjVqGrDDQIFNckoTy42', 300, '<p>hi</p>', NULL, 1, '1693079176');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `hotline` varchar(11) DEFAULT NULL,
  `map` text,
  `email` varchar(255) DEFAULT NULL,
  `fb` text,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `web_settings`
--

INSERT INTO `web_settings` (`id`, `logo`, `hotline`, `map`, `email`, `fb`, `address`) VALUES
(1, 'image/logo.png', '1111111', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1872.5727993710998!2d106.08281731430658!3d20.16966238647002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3136721485e620f1%3A0x88a38bab14e40e70!2zxJBp4buDbSDEkeG6v24gTUlP!5e0!3m2!1svi!2s!4v1539507728087\" width=\"100%\" height=\"200\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'dungvnph06543@fpt.edu.vn', '<iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FKemCuonVaDoUong%2F&tabs=timeline&width=340&height=200&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=130877934196121\" width=\"340\" height=\"200\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" allow=\"encrypted-media\"></iframe>', '612 Phú Diễn, Bắc Từ Liêm, Hà Nội');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`cate_id`);

--
-- Chỉ mục cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
