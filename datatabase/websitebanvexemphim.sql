-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 27, 2022 lúc 10:24 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--


CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'huy', 'huy@gmail.com', 'huy', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Pixar'),
(2, 'DC Entertaiment'),
(3, '20th Century Fox'),
(4, 'Walt Disney'),
(5, 'Universal'),
(6, 'Warner Bros'),
(7, 'Columbia Pictures'),
(8, 'Walt Disney'),
(9, 'Pixaraaa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(27, 17, '2khp4qv8pnks6b2k1u29s5jkhj', 'Sá»± im Láº·ng Cá»§a Báº§y Cá»«u', '99000', 1, '64227366f4.jpg'),
(28, 9, '2khp4qv8pnks6b2k1u29s5jkhj', 'Khá»‰ Con Lon Ton Tháº¿ Giá»›i', '80000', 1, 'db72b26a23.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'HÃ nh Äá»™ng'),
(2, 'Thiếu Nhi'),
(3, 'TÃ¬nh Cáº£m'),
(4, 'HÃ i HÆ°á»›c'),
(5, 'PhiÃªu LÆ°u'),
(6, 'Khoa Há»c Viá»…n TÆ°á»Ÿng'),
(7, 'TÃ¢m LÃ½'),
(8, 'Truyá»n HÃ¬nh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

DROP TABLE IF EXISTS `tbl_compare`;
CREATE TABLE IF NOT EXISTS `tbl_compare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'Duc Huy', 'Tam Giang', 'a', 'hcm', 'a', '0975478414', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(1, 9, 'Khá»‰ Con Lon Ton Tháº¿ Giá»›i', 6, 1, '80000', 'db72b26a23.jpg', 1, '2022-11-22 13:22:53'),
(2, 9, 'Khá»‰ Con Lon Ton Tháº¿ Giá»›i', 6, 1, '80000', 'db72b26a23.jpg', 0, '2022-11-22 13:30:21'),
(3, 17, 'Sá»± im Láº·ng Cá»§a Báº§y Cá»«u', 6, 1, '99000', '64227366f4.jpg', 0, '2022-11-22 13:42:01'),
(4, 17, 'Sá»± im Láº·ng Cá»§a Báº§y Cá»«u', 6, 2, '198000', '64227366f4.jpg', 0, '2022-11-22 13:44:08'),
(5, 17, 'Sá»± im Láº·ng Cá»§a Báº§y Cá»«u', 1, 1, '99000', '64227366f4.jpg', 0, '2022-11-22 14:21:03'),
(6, 7, 'Black Adam', 1, 1, '72000', '1bd1524930.jpg', 0, '2022-11-22 14:23:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_remain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `product_code`, `productQuantity`, `product_soldout`, `product_remain`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(1, 'Avatar 2', 'MP1', '30', '0', '30', 1, 1, '<p><span>Avatar: D&ograve;ng cháº£y cá»§a nÆ°á»›c l&agrave; má»™t bá»™ phim Ä‘iá»‡n áº£nh thuá»™c thá»ƒ loáº¡i khoa há»c viá»…n tÆ°á»Ÿng v&agrave; sá»­ thi cá»§a Má»¹ dá»± kiáº¿n ra máº¯t nÄƒm 2022. T&aacute;c pháº©m do James Cameron Ä‘áº¡o diá»…n, viáº¿t ká»‹ch báº£n v&agrave; há»£p t&aacute;c sáº£n xuáº¥t vá»›i 20th Century Studios. Ä&acirc;y sáº½ l&agrave; pháº§n phim thá»© hai trong loáº¡t phim Avatar, sau pháº§n má»™t c&ugrave;ng t&ecirc;n nÄƒm 2009</span></p> là', 0, '79000', '2c73595c7f.jpg'),
(6, 'Ant Man', 'MH1122', '50', '0', '50', 3, 10, '<p>M&aacute;y t&iacute;nh Dell A503M&aacute;y t&iacute;nh Dell A503M&aacute;y t&iacute;nh Dell A503M&aacute;y t&iacute;nh Dell A503M&aacute;y t&iacute;nh Dell A503</p>', 1, '10000000', 'quantum.jpg'),
(7, 'Black Adam', 'MH1123', '60', '0', '60', 5, 6, '<p><span>Black Adam l&agrave; má»™t bá»™ phim Ä‘iá»‡n áº£nh si&ecirc;u anh h&ugrave;ng cá»§a Hoa Ká»³ ra máº¯t nÄƒm 2022, dá»±a tr&ecirc;n nh&acirc;n váº­t c&ugrave;ng t&ecirc;n cá»§a DC Comics. ÄÆ°á»£c sáº£n xuáº¥t bá»Ÿi New Line Cinema, DC Films, Seven Bucks Productions v&agrave; Flynn Picture, Ä‘&acirc;y l&agrave; pháº§n phim ngoáº¡i truyá»‡n cá»§a Shazam!, v&agrave; l&agrave; phim thá»© 11 trong VÅ© trá»¥ Má»Ÿ rá»™ng DC.</span></p>', 0, '72000', '1bd1524930.jpg'),
(8, 'Cruella', 'MH1124', '70', '0', '70', 5, 8, '<p><span>Cruella l&agrave; má»™t bá»™ phim h&agrave;i - ch&iacute;nh ká»‹ch tá»™i pháº¡m Ä‘&atilde; Ä‘Æ°á»£c ra máº¯t cá»§a Má»¹ dá»±a tr&ecirc;n nh&acirc;n váº­t Cruella de Vil, Ä‘Æ°á»£c giá»›i thiá»‡u trong tiá»ƒu thuyáº¿t TrÄƒm linh má»™t ch&uacute; ch&oacute; Ä‘á»‘m cá»§a nh&agrave; vÄƒn Dodie Smith nÄƒm 1956 v&agrave; bá»™ phim hoáº¡t h&igrave;nh Má»™t trÄƒm linh má»™t ch&uacute; ch&oacute; Ä‘á»‘m cá»§a h&atilde;ng Walt Disney ra máº¯t nÄƒm 1961 v&agrave; Ä‘Æ°á»£c sáº£n xuáº¥t bá»Ÿi Walt Disney</span></p>', 0, '50000', '1a423bec34.jpg'),
(9, 'Khá»‰ Con Lon Ton Tháº¿ Giá»›i', 'MH1125', '100', '0', '100', 3, 7, '<p>Má»™t bá»™ phim Ä‘áº¿n tá»« H&atilde;ng phim ná»•i tiáº¿ng Columbia Pictures</p>', 0, '80000', 'db72b26a23.jpg'),
(13, 'MoonKnight', 'MH1126', '30', '0', '30', 16, 13, 'Thám tử lừng danh Conan là một series manga trinh thám được sáng tác bởi Aoyama Gōshō. Tác phẩm được đăng tải trên tạp chí Weekly Shōnen Sunday của nhà xuất bản Shogakukan vào năm 1994 và được đóng gói thành 101 tập tankōbon tính đến tháng', 1, '4690000', 'moonknight.jpg'),
(17, 'Sá»± im Láº·ng Cá»§a Báº§y Cá»«u', 'MH1129', '100', '0', '100', 7, 6, '<p><span>Sá»± im láº·ng cá»§a báº§y cá»«u l&agrave; má»™t bá»™ phim t&acirc;m l&yacute; kinh dá»‹ Má»¹ Ä‘Æ°á»£c sáº£n xuáº¥t v&agrave;o nÄƒm 1991 do Jonathan Demme Ä‘áº¡o diá»…n vá»›i sá»± tham gia cá»§a c&aacute;c ng&ocirc;i sao Ä‘iá»‡n áº£nh Jodie Foster, Anthony Hopkins, Scott Glenn, Anthony Heald v&agrave; Ted Levine. Bá»™ phim Ä‘Æ°á»£c x&acirc;y dá»±ng dá»±a theo tiá»ƒu thuyáº¿t c&ugrave;ng t&ecirc;n cá»§a Thomas Harris.</span></p>', 0, '99000', '64227366f4.jpg'),
(19, 'Conan', 'MH1140', '65', '0', '65', 16, 7, 'Thám tử lừng danh Conan là một series manga trinh thám được sáng tác bởi Aoyama Gōshō. Tác phẩm được đăng tải trên tạp chí Weekly Shōnen Sunday của nhà xuất bản Shogakukan vào năm 1994 và được đóng gói thành 101 tập tankōbon tính đến tháng', 1, '9700000', 'conan.jpg'),
(20, 'Thor 4', 'MH1150', '70', '10', '65', 17, 8, 'a du', 1, '1240000', 'tho4.jpg'),
(22, 'Tom and Jerry', 'MH1111', '95', '19', '76', 17, 14, '<p>Apple New For Mysql Server</p>', 1, '60000', 'tom.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `sliderId` int(11) NOT NULL AUTO_INCREMENT,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`sliderId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(1, 'Avatar 2', '9076fbe2e3.jpg', 1),
(2, 'K', 'e63411100f.jpg', 1),
(3, 'Lion King', 'ceb2fccaad.jpg', 1),
(4, 'slide1', 'db2b3d4555.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_warehouse`
--

DROP TABLE IF EXISTS `tbl_warehouse`;
CREATE TABLE IF NOT EXISTS `tbl_warehouse` (
  `id_warehouse` int(11) NOT NULL AUTO_INCREMENT,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sl_ngaynhap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_warehouse`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`id_warehouse`, `id_sanpham`, `sl_nhap`, `sl_ngaynhap`) VALUES
(1, 22, '5', '2019-07-16 18:31:22'),
(2, 21, '10', '2019-07-16 18:32:03'),
(3, 21, '3', '2019-07-16 18:42:59'),
(4, 20, '5', '2019-07-16 18:51:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
