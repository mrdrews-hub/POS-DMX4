-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 06:48 AM
-- Server version: 10.4.8-MariaDB-log
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmx4`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `invoice`, `item`, `price`, `qty`, `subtotal`, `created`) VALUES
(1, 'TR2104160001', 'Kuota Axis 50GB', 78000, 1, 78000, '2021-04-16'),
(2, 'TR2104160002', 'Kuota XL 21 GB', 65000, 1, 65000, '2021-04-16'),
(3, 'TR2104160002', 'Install ulang', 50000, 1, 50000, '2021-04-16'),
(4, 'TR2104160003', 'Kuota Axis 50GB', 78000, 1, 78000, '2021-04-16'),
(5, 'TR2104160003', 'VGEN 32GB', 90000, 1, 90000, '2021-04-16'),
(6, 'TR2104160003', 'Kuota XL 21 GB', 65000, 1, 65000, '2021-04-16'),
(7, 'TR2104170001', 'Kuota XL 21 GB', 65000, 1, 65000, '2021-04-17'),
(51, 'TR2104180001', 'ganti speaker', 30000, 1, 30000, '2021-04-18'),
(52, 'TR2104180002', 'Kuota Axis 50GB', 78000, 2, 156000, '2021-04-18'),
(53, 'TR2104180002', 'Kuota XL 21 GB', 65000, 1, 65000, '2021-04-18'),
(54, 'TR2104180003', 'Service', 15000, 1, 15000, '2021-04-18'),
(55, 'TR2104180003', 'Kuota Axis 50GB', 78000, 1, 78000, '2021-04-18'),
(56, 'TR2104230001', 'VGEN 32GB', 90000, 2, 180000, '2021-04-23'),
(57, 'TR2104250001', 'Kuota XL 100 GB', 150000, 2, 300000, '2021-04-25'),
(58, 'TR2104250002', 'Kuota Axis 50GB', 78000, 2, 156000, '2021-04-25'),
(59, 'TR2104250002', 'ganti speaker', 30000, 1, 30000, '2021-04-25'),
(60, 'TR2105270001', 'Kuota XL 21 GB', 65000, 3, 195000, '2021-05-27'),
(61, 'TR2105270002', 'KZ ZSN-PRO Wireless', 150000, 1, 150000, '2021-05-27'),
(62, 'TR2105270003', 'KZ ZSN-PRO Wireless', 150000, 1, 150000, '2021-05-27'),
(63, 'TR2105270004', 'KZ ZSN-PRO Wireless', 150000, 1, 150000, '2021-05-27'),
(64, 'TR2105270005', 'KZ ZSN-PRO Wireless', 150000, 1, 150000, '2021-05-27'),
(65, 'TR2105270006', 'KZ ZSN-PRO Wireless', 150000, 1, 150000, '2021-05-27'),
(66, 'TR2105270007', 'KZ ZSN-PRO Wireless', 150000, 1, 150000, '2021-05-27'),
(67, 'TR2105270008', 'KZ ZSN-PRO Wireless', 150000, 1, 150000, '2021-05-27'),
(68, 'TR2105270009', 'Vortex Series VX 7 PRO', 350000, 1, 350000, '2021-05-27'),
(69, 'TR2105270010', 'Vortex Series VX 7 PRO', 350000, 1, 350000, '2021-05-27'),
(70, 'TR2105270011', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27'),
(71, 'TR2105270012', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27'),
(72, 'TR2105270013', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27'),
(73, 'TR2105270014', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27'),
(74, 'TR2105270015', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27'),
(75, 'TR2105270016', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27'),
(76, 'TR2105270017', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27'),
(77, 'TR2105270018', 'Vortex Series VX 7 PRO', 350000, 2, 700000, '2021-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `nama_category` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `nama_category`, `created`, `updated`) VALUES
(2, 'Voucher', '2021-03-14 20:43:51', NULL),
(3, 'Token', '2021-03-14 21:29:51', NULL),
(4, 'Pulsa', '2021-03-15 13:06:47', NULL),
(5, 'Wifi', '2021-03-15 13:10:16', '2021-03-28 12:39:21'),
(6, 'Memori', '2021-03-17 20:09:30', NULL),
(7, 'Laptop', '2021-03-17 20:10:21', NULL),
(8, 'Keyboard', '2021-03-17 20:24:32', '2021-03-28 12:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `nama_item`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`) VALUES
(1, 'DMX0001', 'Kuota XL 21 GB', 2, 1, 65000, 14, '2021-03-15 11:43:25', '2021-03-29 09:33:50'),
(4, 'DMX0002', 'Token Listrik', 3, 2, 120000, 0, '2021-03-15 12:22:20', '2021-03-15 06:33:12'),
(5, 'DMX0003', 'KZ ZSN-PRO Wireless', 5, 2, 150000, 10, '2021-03-15 13:09:59', '2021-03-17 14:15:49'),
(8, 'DMX0005', 'Vortex Series VX 7 PRO', 8, 2, 350000, 10, '2021-03-16 11:39:27', '2021-03-17 14:24:44'),
(10, 'DMX0007', 'Kuota XL 100 GB', 2, 1, 150000, 16, '2021-03-17 20:21:04', NULL),
(11, 'DMX0008', 'Kuota Axis 50GB', 2, 2, 78000, 19, '2021-03-17 20:23:14', NULL),
(13, 'DMX0010', 'VGEN 32GB', 6, 2, 90000, 7, '2021-03-17 20:26:44', NULL),
(14, 'DMX0011', 'Samsung 16GB', 6, 2, 45000, 22, '2021-03-17 20:27:19', NULL),
(15, 'DMX0012', 'HyperX Cloud alpha', 5, 3, 1200000, 3, '2021-03-17 20:28:18', '2021-03-23 08:30:47'),
(16, 'DMX0013', 'SteelSeries Arctis 7', 5, 3, 2100000, 1, '2021-03-17 20:29:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `nama_unit` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `nama_unit`, `created`, `updated`) VALUES
(1, 'Pack', '2021-03-14 12:06:09', '2021-04-01 14:56:54'),
(2, 'Pcs', '2021-03-14 13:58:19', NULL),
(3, 'Unit', '2021-03-15 13:06:57', '2021-03-17 14:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `serv_data`
--

CREATE TABLE `serv_data` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `perangkat` varchar(30) NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `status` varchar(15) DEFAULT 'pending',
  `keterangan` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jasa` int(11) DEFAULT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `nama_supplier`, `no_telp`, `alamat`, `keterangan`, `created`, `updated`) VALUES
(1, 'MrDrews Corporation', '6285223719870', 'Jl.Paseh No.69', 'Distributor Voucher', '2021-03-13 17:03:29', '2021-04-18 15:50:34'),
(2, 'PT.MENCARI CINTA SEJATI', '08123456789', 'Jl.Amerika No.96', 'Distributor laptop', '2021-03-13 17:03:29', NULL),
(5, 'Tiki Toko', '08978623512', 'Jl.Kebenaran', 'Supplier Kartu', '2021-03-13 21:07:44', '2021-04-18 15:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail`
--

CREATE TABLE `t_detail` (
  `detail_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detail`
--

INSERT INTO `t_detail` (`detail_id`, `invoice`, `kasir`, `tgl`, `total`, `cash`, `kembalian`) VALUES
(1, 'TR2104160001', 'Andre', '2021-04-16', 78000, 80000, 2000),
(2, 'TR2104160002', 'Andre', '2021-04-16', 115000, 120000, 5000),
(3, 'TR2104160003', 'Andre', '2021-04-16', 233000, 250000, 17000),
(27, 'TR2104180001', 'Andre', '2021-04-18', 30000, 30000, 0),
(28, 'TR2104180002', 'Mohammad Rizals', '2021-04-18', 221000, 230000, 9000),
(29, 'TR2104180003', 'Mohammad Rizals', '2021-04-18', 93000, 100000, 7000),
(30, 'TR2104230001', 'Mohammad Rizals', '2021-04-23', 180000, 180000, 0),
(31, 'TR2104250001', 'Andre', '2021-04-25', 300000, 300000, 0),
(32, 'TR2104250002', 'Jono', '2021-04-25', 186000, 190000, 4000),
(33, 'TR2105270001', 'Jono', '2021-05-27', 195000, 200000, 5000),
(34, 'TR2105270002', 'Jono', '2021-05-27', 150000, 165000, 15000),
(35, 'TR2105270002', 'Jono', '2021-05-27', 150000, 165000, 15000),
(36, 'TR2105270002', 'Jono', '2021-05-27', 150000, 165000, 15000),
(37, 'TR2105270002', 'Jono', '2021-05-27', 150000, 165000, 15000),
(38, 'TR2105270002', 'Jono', '2021-05-27', 150000, 165000, 15000),
(39, 'TR2105270002', 'Jono', '2021-05-27', 150000, 165000, 15000),
(40, 'TR2105270002', 'Jono', '2021-05-27', 150000, 165000, 15000),
(41, 'TR2105270009', 'Jono', '2021-05-27', 350000, 400000, 50000),
(42, 'TR2105270009', 'Jono', '2021-05-27', 350000, 400000, 50000),
(43, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0),
(44, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0),
(45, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0),
(46, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0),
(47, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0),
(48, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0),
(49, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0),
(50, 'TR2105270011', 'Mohammad Rizals', '2021-05-27', 700000, 700000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(1, 1, 'in', 'Tambah Stock', 1, 20, '2021-03-16', '2021-03-16 14:47:15', 3),
(3, 8, 'in', 'Tambah Stock', 1, 15, '2021-03-16', '2021-03-16 20:20:14', 3),
(5, 8, 'in', 'Bonus', 1, 2, '2021-03-16', '2021-03-16 21:55:40', 3),
(15, 16, 'in', 'Tambah Stock', 2, 6, '2021-03-17', '2021-03-17 20:36:13', 1),
(16, 16, 'in', 'Bonus', 2, 7, '2021-03-17', '2021-03-17 20:37:04', 1),
(17, 16, 'out', 'LOBA TEUING', NULL, 3, '2021-03-17', '2021-03-17 20:38:50', 1),
(18, 16, 'out', 'Barang Rusak', NULL, 1, '2021-03-17', '2021-03-17 20:39:41', 1),
(20, 10, 'in', 'Tambah Stock', 1, 25, '2021-03-22', '2021-03-22 22:35:24', 3),
(21, 10, 'in', 'Bonus', 1, 5, '2021-03-22', '2021-03-22 22:36:29', 3),
(23, 11, 'in', 'Tambah Stock', 1, 19, '2021-03-30', '2021-03-30 19:29:31', 1),
(24, 5, 'in', 'Tambah Stock', 1, 12, '2021-04-13', '2021-04-13 20:35:55', 3),
(25, 13, 'in', 'Tambah Stock', 1, 12, '2021-04-15', '2021-04-15 14:32:29', 3),
(26, 1, 'in', 'Tambah Stock', 1, 21, '2021-04-18', '2021-04-18 15:03:53', 3),
(27, 10, 'in', 'Tambah Stock', 1, 16, '2021-04-18', '2021-04-18 15:04:16', 3),
(28, 11, 'in', 'Tambah Stock', 2, 21, '2021-04-18', '2021-04-18 15:04:39', 3),
(29, 14, 'in', 'Tambah Stock', 1, 17, '2021-04-18', '2021-04-18 15:04:54', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin 2=pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Mohammad Rizals', 'JL.Cinehel no.10 Kec.Cipedes Kel.Cipedes Kota Tasikmalaya                                ', 1),
(2, 'candakur', 'b2cd1767b618b24489dc1301917f8e7f429b474f', 'CandaHard', 'Planet atata tiga                                                                                                                                ', 2),
(3, 'root', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Andre', 'Jl.paseh', 1),
(8, 'joni', '2b6e565c24a22691c61bcfebd7ceed5298000380', 'Jono', 'Cinehel                               ', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `serv_data`
--
ALTER TABLE `serv_data`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_detail`
--
ALTER TABLE `t_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `t_stock_ibfk_1` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `serv_data`
--
ALTER TABLE `serv_data`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_detail`
--
ALTER TABLE `t_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Constraints for table `serv_data`
--
ALTER TABLE `serv_data`
  ADD CONSTRAINT `serv_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
