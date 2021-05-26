-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2021 lúc 09:24 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hem-store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Lộ Phú Tấn Phát', 'tanphat@admin.com.vn', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(150) NOT NULL,
  `category_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_image`, `category_link`) VALUES
(1, 'áo', 'sb_1610520105_507.jpg', 'ao'),
(2, 'quần', 'sb_1610520152_436.jpg', 'quan'),
(3, 'phụ kiện', 'sb_1610520343_428.jpg', 'phu-kien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `checkout_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deal` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `cancel` int(11) NOT NULL,
  `checkout_condition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`checkout_id`, `product_id`, `size`, `quantity`, `code`, `customer_id`, `phone`, `date`, `deal`, `status`, `cancel`, `checkout_condition`) VALUES
(10, 8, '28', 1, 34254, 131, 339761703, '2021-05-26 06:41:54', 'Banking', 'Giao hàng nhanh', 0, ''),
(11, 5, '31', 2, 39979, 132, 372975922, '2021-05-26 07:17:55', 'COD', 'Giao nhanh', 0, ''),
(12, 9, '', 1, 85252, 133, 339761703, '2021-05-26 06:42:11', 'COD', 'test', 0, ''),
(13, 8, '30', 1, 85252, 133, 339761703, '2021-05-26 06:41:51', 'COD', 'test', 0, ''),
(14, 15, 'S', 1, 13172, 134, 339761703, '2021-05-26 06:40:58', 'Banking', 'giao hàng nhanh', 0, ''),
(15, 8, '28', 1, 43487, 135, 339761703, '2021-05-26 07:14:13', 'Banking', 'phat', 0, ''),
(16, 8, '31', 2, 22514, 136, 339761703, '2021-05-26 07:16:27', 'Banking', 'ádasd', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `name`, `phone`, `address`, `note`, `email`, `password`) VALUES
(131, 'Lộ Phú Tấn Phát', 339761703, 'Văn lâm 2', 'Giao hàng nhanh', 'lophat59@gmail.com', ''),
(132, 'Cao Văn Thông', 372975922, 'Văn lâm 3', 'Giao nhanh', 'thonlong@email.com', ''),
(133, 'Lộ Phú Tấn Phát	', 339761703, 'Van lam 3', 'test', 'lophat59@gmail.com', ''),
(134, 'Lộ Phú Tấn Phát', 339761703, 'Văn lâm 2', 'giao hàng nhanh', 'lophat59@gmail.com', ''),
(135, 'Lộ Phú Tấn Phát', 339761703, 'Văn lâm 2', 'phat', 'lophat59@gmail.com', ''),
(136, 'Lộ phú Tấn Phát', 339761703, 'văn lâm 2', 'ádasd', 'lophat59@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_news`
--

CREATE TABLE `tbl_news` (
  `new_id` int(11) NOT NULL,
  `new_image` varchar(150) NOT NULL,
  `new_status` text NOT NULL,
  `new_title` varchar(150) NOT NULL,
  `new_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_news`
--

INSERT INTO `tbl_news` (`new_id`, `new_image`, `new_status`, `new_title`, `new_date`) VALUES
(1, 'news1.jpg', 'Là một chất liệu phổ biến và thông dụng, chất liệu denim được biến tấu trong vô vàn trang phục. Không chỉ ở quần, denim còn được áp dụng trên cả áo khoác. Sự dày dặn của denim giúp những chiếc áo khoác Jeans bảo vệ người mặc khỏi những con gió lạnh mùa đông.\r\n\r\nCó nhiều cách sáng tạo với áo khoác Jeans. Bên cạnh những chiếc áo 100% Jeans, các nhà mốt tân tiến còn biết biến tấu chúng với tay áo làm bằng các chất liệu khác như vải, da,...</br>\r\n\r\nDo đã mang sẵn sự bụi bặm, nên chỉ cần kết hợp cùng áo thun trơn đơn giản, bạn cũng đã có thể làm nổi bật bản thân mình lên một cách đáng kể.', '5 KIỂU ÁO KHOÁC KINH ĐIỂN TRONG PHONG CÁCH MÙA ĐÔNG', '2021-05-23 14:24:38'),
(6, 'news2.png', 'Nếu bạn đang mặc một chiếc quần jeans tối màu và mang giày tây thì nên tránh xa khỏi tất trắng. Sự nổi bật của đôi vớ trắng giữa một “cây đen” cũng sẽ vô tình làm lộ ra sự thiếu hiểu biết và thiếu tinh tế về thời trang của bạn. </br>\r\nThay vào đó, hãy chọn một đôi vớ tối màu để tổng thể được đồng bộ, hợp nhất với nhau. Tắt trắng chỉ nên đồng hành với quần jeans sáng màu và các đôi giày thể thao mà thôi.', '4 CÁCH PHỐI ĐỒ CƠ BẢN GIỮA TẤT VÀ QUẦN JEANS', '2021-05-23 14:27:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `product_image_hover` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_active` int(11) NOT NULL,
  `product_details` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_code`, `category_id`, `product_name`, `product_image`, `product_image_hover`, `product_price`, `product_discount`, `product_active`, `product_details`, `product_desc`, `product_quantity`) VALUES
(1, 'SAPL49 ', 1, 'Áo sơ mi nam Phat', '_MG_3827.jpg', '_MG_3826_thumb.jpg', 350000, 375000, 1, '[OFFICIAL MP3] CÒN TUỔI NÀO CHO EM - MIU LÊ', 'Áo sơ mi nam', 12),
(2, 'SAPL3', 2, 'Quần tây', '2794fc31148de6d3bf9c21_thumb.jpg', '3be7c5722dcedf9086df6.jpg', 350000, 375000, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, temporibus?', '', 21),
(5, 'SAPL44', 2, 'Quần Jean HT', 'img_6968_copy_min_thumb.jpg', 'img_6970_copy_min.jpg', 400000, 425000, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, temporibus?', '', 24),
(6, 'S5556', 1, 'Áo thun nam', '93a7ccbecd0d3f53661c26_thumb.jpg', 'img_6226.jpg', 255000, 280000, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, temporibus?', '', 30),
(8, 'KEO-502', 2, 'Quần Short nam', 'SAQS32_1.jpg', 'SAQS32_thumb.jpg', 285000, 0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, temporibus?', '', 13),
(9, 'TP0809', 3, 'Mũ thời trang nam', 'img_4097_copy_thumb.jpg', 'img_4097_copy_thumb.jpg', 200000, 0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, temporibus?', '', 7),
(10, 'MSP124', 1, 'Áo sơ mi thời trang', 'untitled_31_thumb.jpg', 'untitled_32.jpg', 320000, 340000, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, temporibus?', '', 9),
(11, 'SAPL123', 2, 'Quần jean nam lịch lãm', 'img_6970_copy_min.jpg', 'img_6968_copy_min_thumb.jpg', 475000, 0, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, temporibus?', '', 16),
(15, '', 1, 'Áo sơ mi nam', 'img_7818_thumb.jpg', 'img_7776.jpg', 225000, 250000, 0, '[OFFICIAL MP3] CÒN TUỔI NÀO CHO EM - MIU LÊ', 'Áo sơ mi nam', 12),
(19, '', 3, 'tất thời trang', 'photo6257934382006381290_thumb.jpg', 'photo6257934382006381290_thumb.jpg', 150000, 175000, 0, 'tấn phát cute phomaique', 'tất nam', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `slide_id` int(11) NOT NULL,
  `slide_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slide`
--

INSERT INTO `tbl_slide` (`slide_id`, `slide_image`) VALUES
(1, 'carousel1.jpg'),
(2, 'carousel2.png'),
(3, 'carousel3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`new_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
