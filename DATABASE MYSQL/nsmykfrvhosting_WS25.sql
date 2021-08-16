-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 15, 2021 lúc 04:46 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nsmykfrvhosting_ws25`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_account`
--

CREATE TABLE `admin_account` (
  `UserName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PassWord` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_account`
--

INSERT INTO `admin_account` (`UserName`, `PassWord`) VALUES
('vanhung201', '123456'),
('chithanh', '123456'),
('longluu', '123456'),
('thanhan', '123456'),
('donduong', '123456'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `IDCart` int(11) UNSIGNED NOT NULL,
  `IDProduct` int(11) NOT NULL,
  `IDTypeProduct` int(11) NOT NULL,
  `NameProduct` varchar(150) DEFAULT NULL,
  `QuantityBuying` int(11) DEFAULT NULL,
  `UnitPrice` float DEFAULT NULL,
  `Img` varchar(150) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `UserName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PassWord` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNumber` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`UserName`, `PassWord`, `Email`, `Name`, `Gender`, `PhoneNumber`, `DateOfBirth`, `Address`) VALUES
('vanhung201', '123456', 'hungsky15@gmail.com', 'Lê Văn Hùng', 'Nam', '0355012525', '2001-03-20', '566/169 Nguyễn Thái Sơn, Phường 5, Quận Gò Vấp, Tp. Hồ Chí Minh'),
('phantan', '123456', 'phantan@gmail.com', 'Nguyễn Phan Tân', 'Nam', '0379353889', '2001-09-28', 'Chợ Bà Tô, Bà Rịa - Vũng Tàu'),
('giangnguyen', '123456', 'giangnguyen@gmail.com', 'Nguyễn Thị Giang', 'Nữ', '0328237637', '2001-07-10', 'Phước Tân, Bà Rịa - Vũng Tàu'),
('anhthu', '123456', 'nguyenthu@gmail.com', 'Nguyễn Phạm Anh Thư', 'Nữ', '0944087025', '2001-12-25', 'Ấp Trang Hoàng, Xã Bông Trang, Bà Rịa - Vũng Tàu'),
('nguyenchithanh', '123456', 'nguyenchithanh@gmail.com', 'Nguyễn Chí Thành', 'Nam', '0522905064', '2001-06-05', 'HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order`
--

CREATE TABLE `detail_order` (
  `IDDetailOrder` int(11) NOT NULL,
  `IDOrderProduct` int(11) DEFAULT NULL,
  `IDProduct` int(11) NOT NULL,
  `TotalProduct` int(11) DEFAULT NULL,
  `Amount` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `TotalAmount` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_order`
--

INSERT INTO `detail_order` (`IDDetailOrder`, `IDOrderProduct`, `IDProduct`, `TotalProduct`, `Amount`, `Discount`, `TotalAmount`) VALUES
(1, 1, 17, 1, '7830000', 0, '7830000'),
(2, 1, 1, 2, '1246000', 0, '2492000'),
(3, 1, 5, 3, '36940000', 0, '110820000'),
(4, 2, 6, 1, '20900000', 0, '20900000'),
(5, 2, 21, 2, '42000000', 0, '84000000'),
(6, 3, 4, 3, '7140000', 0, '21420000'),
(7, 3, 8, 1, '18830000', 0, '18830000'),
(8, 4, 14, 1, '2340000', 10, '2106000'),
(9, 4, 11, 1, '4230000', 0, '4230000'),
(13, 27, 2, 2, '4230000', 0, '8460000'),
(12, 27, 1, 3, '1246000', 0, '3738000'),
(14, 28, 1, 3, '1246000', 0, '3738000'),
(15, 28, 11, 2, '4230000', 0, '8460000'),
(16, 29, 2, 1, '4230000', 0, '4230000'),
(17, 29, 1, 1, '1246000', 0, '1246000'),
(18, 30, 1, 7, '1246000', 0, '8722000'),
(19, 30, 11, 1, '4230000', 0, '4230000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `IDManufacturer` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Origin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`IDManufacturer`, `Name`, `Origin`) VALUES
(1, 'Casio', NULL),
(2, 'Daniel Wellington', NULL),
(3, 'Doxa', NULL),
(4, 'Longines', NULL),
(5, 'Orient', NULL),
(6, 'Tissot', NULL),
(7, 'Fossil', NULL),
(8, 'Asio', NULL),
(9, 'Skagen', NULL),
(10, 'Movado', NULL),
(11, 'Calvin Klein', NULL),
(12, 'Ogival', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `IDOrderProduct` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `UpdateDate` date DEFAULT NULL,
  `NoteOrder` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Total` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`IDOrderProduct`, `UserName`, `Status`, `StartDate`, `UpdateDate`, `NoteOrder`, `Total`) VALUES
(1, 'vanhung201', 'Pending', '2021-05-15', '2021-05-15', NULL, NULL),
(2, 'anhthu', 'Pending', '2021-05-01', '2021-05-03', NULL, NULL),
(3, 'phantan', 'Pending', '2021-04-30', '2021-05-03', NULL, NULL),
(4, 'giangnguyen', 'Pending', '2021-03-10', '2021-03-10', NULL, NULL),
(27, 'nguyenchithanh', 'Pending', '2021-06-10', '2021-06-10', 'My Note', '12198000'),
(28, 'nguyenchithanh', 'Pending', '2021-06-14', '2021-06-14', 'My Note', '12198000'),
(29, 'nguyenchithanh', 'Pending', '2021-06-14', '2021-06-14', 'My Note', '5476000'),
(30, 'nguyenchithanh', 'Pending', '2021-06-15', '2021-06-15', 'My Note', '12952000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `IDProduct` int(11) NOT NULL,
  `Name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDTypeProduct` int(11) DEFAULT NULL,
  `Detail` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Inventory` int(11) DEFAULT NULL,
  `Amount` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDManufacturer` int(11) DEFAULT NULL,
  `Img` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`IDProduct`, `Name`, `IDTypeProduct`, `Detail`, `Inventory`, `Amount`, `IDManufacturer`, `Img`, `PurchaseDate`) VALUES
(1, 'Casio AE-1200WHD-1AVDF – Nam – Kính Nhựa – Quartz (Pin) – Dây Kim Loại', 0, 'Đồng hồ nam Casio AE1200WHD có mặt đồng hồ vuông to với phong cách thể thao, mặt số điện tử với những tính năng hiện đại tiện dụng, kết hợp với dây đeo bằng kim loại đem lại vẻ mạnh mẽ cá tính dành cho phái nam.', 10, '1246000', 1, 'SanPham1.png', '2021-04-30'),
(2, 'G-Shock GA-400-1BDR – Nam – Quartz (Pin) – Dây Cao Su', 0, 'Đồng hồ G-Shock GA-400-1BDR với thiết kế mặt số lớn phong cách thể thao nam tính mạnh mẽ, mặt số thiết kế đa chiều nổi bật, cùng nút vặn độc đáo để tùy chỉnh chế độ trong chiếc đồng hồ.', 10, '4230000', 1, 'SanPham2.png', '2021-05-01'),
(3, 'Daniel Wellington DW00100148 – Nam – Quartz (Pin) – Dây Vải – Mặt Số 40mm', 0, 'Đồng hồ nam Daniel Wellington DW00100148 với thiết kế giản dị, vỏ máy bằng thép không gỉ màu đồng, kim chỉ cùng vạch số được làm mỏng tinh tế sang trọng, phối cùng dây vải màu đen tạo nên vẻ trẻ trung thời trang cho phái mạnh.', 15, '4600000', 2, 'SanPham3.png', '2021-05-30'),
(4, 'Casio AE-1200WHD-1AVDF – Nam – Kính Nhựa – Quartz (Pin) – Dây Kim Loại', 0, 'Đồng hồ nam Casio AE1200WHD có mặt đồng hồ vuông to với phong cách thể thao, mặt số điện tử với những tính năng hiện đại tiện dụng, kết hợp với dây đeo bằng kim loại đem lại vẻ mạnh mẽ cá tính dành cho phái nam.', 6, '7140000', 1, 'SanPham4.png', '2021-03-05'),
(5, 'Doxa D173TCM – Nam – Kính Sapphire – Automatic (Tự Động) – Dây Kim Loại', 0, 'Mẫu Doxa nam D173TCM khoác lên phong cách đẳng cấp khi mặt số với thiết kế tinh xảo đính kèm các viên kim cương nổi bật trên nền kính Sapphire thời trang sang trọng phối cùng mẫu dây đeo demi.', 7, '36940000', 3, 'SanPham5.png', '2021-03-07'),
(6, 'LONGINES L4.759.4.11.2 – NAM – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY DA', 0, 'Dây đeo đồng hồ Longines L4.759.4.11.2 bằng da vân thanh lịch, mặt số tròn size 35mm kiểu dáng 3 kim cùng cọc số la mã tạo nét mỏng thời trang.', 16, '20900000', 4, 'SanPham6.png', '2021-01-01'),
(7, 'Orient SUND6002W0 – Nam – Quartz (Pin) – Dây Kim Loại', 0, 'Mẫu Orient SUND6002W0 vẻ ngoài sang trọng với các chi tiết vạch số mỏng cho đến núm vặn điểu chỉnh đều được mạ vàng nổi bật dành cho phái mạnh.', 9, '2810000', 5, 'SanPham7.png', '2021-01-01'),
(8, 'Tissot T006.407.36.263.00 – Nam – Kính Sapphire – Automatic (Tự Động) – Dây Da', 0, 'Mẫu Tissot T006.407.36.263.00 nổi bật với phần vỏ máy được mạ vàng khoác lên sự sang trọng dành cho phái mạnh, với trải nghiệm bộ máy cơ tạo nên vẻ đặc trưng nam tính kết hợp cùng bộ dây đeo bằng da đầy lịch lãm.', 20, '18830000', 6, 'SanPham8.png', '2021-03-20'),
(10, 'FOSSIL ES4431 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 1, 'Mẫu đồng hồ Fossil ES4431 với thiết kế chi tiết kim chỉ được được tạo hình thanh mảnh nhẹ nhàng đầy nữ tính, kết hợp cùng dây đeo demi vàng hồng tạo nên vẻ thời trang cho phái đẹp.', 4, '1246000', 7, 'SanPham10.png', '2021-03-20'),
(11, 'FOSSIL ES4298 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 1, 'Mẫu đồng hồ ES4298 luôn mang đến cho phái đẹp một vẻ ngoài trẻ trung đến từ thương hiệu Fossil nổi bật với phần gia công tinh xảo tỉ mỉ đính kèm các viên pha lê trên đồng hồ tạo nên vẻ kiêu sa lộng lẫy.', 13, '4230000', 7, 'SanPham11.png', '2021-04-18'),
(12, 'FOSSIL ES4437 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 1, 'Vẻ ngoài quý phái được ẩn mình của mẫu đồng hồ thời trang Fossil ES4437 với thiết kế ô số kim giây được đính kèm các viên pha lê xung quanh tạo nên vẻ đẹp kiêu sa đầy sang trọng dành cho phái đẹp.', 20, '46000000', 7, 'SanPham12.png', '2021-04-10'),
(13, 'ASIO B640WDG-7DF – NỮ – KÍNH NHỰA – QUARTZ (PIN) – DÂY KIM LOẠI – MẶT SỐ 35MM', 1, 'Mẫu Casio B640WDG-7DF mặt số vuông điện tử hiện thị đa chức năng kiểu dáng năng động phối cùng mẫu dây đeo kim loại mạ bạc.', 13, '7140000', 8, 'SanPham13.png', '2021-05-25'),
(14, 'SKAGEN SKW2839 – NỮ – QUARTZ (PIN) – DÂY DA – MẶT SỐ 30MM', 1, 'Mẫu Skagen SKW2839 dây da phiên bản dây da trơn phối tone màu kem thời trang cho phái đẹp cùng với thiết kế tối giản chức năng 2 kim trên nền mặt số size 30mm.', 18, '2340000', 9, 'SanPham14.png', '2021-05-25'),
(15, 'SKAGEN SKW2906 – NỮ – QUARTZ (PIN) – DÂY DA – MẶT SỐ 30MM', 1, 'Mẫu Skagen SKW2906 dây da phiên bản da trơn họa tiết đa màu sắc kết hợp cùng nền mặt số size 30mm tone màu xanh xà cừ thời trang nổi bật cho phái đẹp.', 3, '20900000', 9, 'SanPham15.png', '2021-05-25'),
(16, 'MOVADO 3600435 – NỮ – QUARTZ (PIN) – DÂY KIM LOẠI', 1, 'Mẫu 3600435 thiết kế sang trọng với sự kết hợp giữa vỏ máy cùng dây đeo bằng kim loại màu vàng hồng sang trọng, đồng hồ với thiết kế 2 kim đặc trưng đến từ hãng Movado.', 8, '28100000', 10, 'SanPham16.png', '2021-06-01'),
(17, 'CALVIN KLEIN K8M21421 – NAM – QUARTZ (PIN) – DÂY KIM LOẠI', 0, 'Mẫu Calvin Klein K8M21421 phiên bản chi tiết kim chỉ vạch số vàng hồng thời trang nổi bật trên mặt số tone nền đen cá tính với kích thước mặt 40mm.', 36, '7830000', 11, 'SanPham17.png', '2021-06-01'),
(18, 'CALVIN KLEIN K8M214CB – NAM – QUARTZ (PIN) – DÂY DA', 0, 'Mẫu đồng hồ nam Calvin Klein mặt số tone nền đen kích thước 40mm kiểu dáng giản dị 3 kim cùng chi tiết vạch số tạo nét mỏng mạ vàng hồng thời trang.', 13, '7200000', 11, 'SanPham18.png', '2021-06-01'),
(19, 'OGIVAL 358-351AG42R-GL-V – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY DA – MẶT SỐ 40MM', 0, 'Mẫu Ogival 358-351AG42R-GL-V phiên bản kim chỉ xanh cùng với nền cọc số la mã tạo hình mỏng cách tân trẻ trung trên nền mặt số size 40mm.', 20, '23990000', 12, 'SanPham19.png', '2021-06-01'),
(20, 'OGIVAL 3357JAMS-T – NAM – KÍNH SAPPHIRE – AUTOMATIC (TỰ ĐỘNG) – DÂY KIM LOẠI – MẶT SỐ 40MM', 0, 'Mẫu Ogival 3357JAMS-T phiên bản kim chỉ xanh tone màu thời trang sang trọng với thiết kế 11 viên kim cương đính trên nền mặt số trắng size 40mm.', 6, '18420000', 12, 'SanPham20.png', '2021-06-01'),
(21, 'MOVADO 0607209 – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY KIM LOẠI – MẶT SỐ 28MM', 1, 'Mẫu Movado 0607209 phiên bản dây đeo demi tone màu vàng hồng thời trang sang trọng cùng với thiết kế nổi bật đính 11 viên kim cương trên nền mặt số.', 14, '42000000', 10, 'SanPham21.png', '2021-06-01'),
(22, 'DOXA D158KWH – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY DA', 1, 'Mẫu Doxa D158KWH với xu hướng hoài cổ dành cho nữ, với thiết kế gia công đính kèm 8 viên kim cương nổi bật trên nền mặt số trắng size 29mm.', 50, '15800000', 3, 'SanPham22.png', '2021-06-13'),
(23, 'DOXA D182SWB – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN) – DÂY DA', 1, 'Mẫu Doxa nữ D182SWB mặt số tròn truyền thống size 35mm sang trọng nổi bật đính kèm 8 viên kim cương tạo nên vẻ thời trang cho phái đẹp.', 19, '18720000', 3, 'SanPham23.png', '2021-06-13'),
(24, 'CASIO LA670WEGB-1BDF – NỮ – KÍNH NHỰA – QUARTZ (PIN) – DÂY KIM LOẠI', 1, 'Mẫu đồng hồ Casio LA670WEGB-1BDF với thiết kế bộ máy nhỏ gọn tạo nên vẻ ngoài thanh mảnh nữ tính, vỏ máy tông màu vàng phối cùng mẫu dây đeo kim loại đen tăng thêm vẻ đẹp thời trang.', 23, '1950000', 1, 'SanPham24.png', '2021-06-08'),
(25, 'CASIO NỮ – QUARTZ (PIN) – KÍNH NHỰA – DÂY CAO SU (LW-200-1BVDF)', 1, 'Đồng hồ nữ Casio LW-200-1BVDF với mặt đồng hồ điện tử kính nhựa cao cấp, vỏ niềng làm bằng thép không gỉ màu đen, dây đeo là cao su siêu bền màu đen, với các tính năng của đồng hồ điện tử.', 42, '864000', 1, 'SanPham25.png', '2021-06-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `IDTypeProduct` int(11) NOT NULL,
  `NameTypeProduct` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`IDTypeProduct`, `NameTypeProduct`) VALUES
(0, 'Đồng hồ Nam'),
(1, 'Đồng hồ Nữ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`UserName`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IDCart`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`UserName`);

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`IDDetailOrder`),
  ADD KEY `FK_DETAIL_ORDER_ORDER_PRODUCT` (`IDOrderProduct`),
  ADD KEY `FK_DETAIL_ORDER_PRODUCT` (`IDProduct`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`IDManufacturer`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`IDOrderProduct`),
  ADD KEY `FK_ORDER_PRODUCT_CUSTOMER` (`UserName`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IDProduct`),
  ADD KEY `FK_PRODUCT_TYPE_PRODUCT` (`IDTypeProduct`),
  ADD KEY `FK_PRODUCT_MANUFACTURER` (`IDManufacturer`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`IDTypeProduct`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `IDCart` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `IDDetailOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `IDManufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `IDOrderProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `IDProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
