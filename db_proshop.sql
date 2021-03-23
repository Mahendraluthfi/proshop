-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 03:30 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `g_invoice`
--

CREATE TABLE `g_invoice` (
  `idInvoice` varchar(255) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `dateInvoice` date NOT NULL,
  `totalPrice` bigint(20) NOT NULL,
  `discount` int(11) NOT NULL,
  `payment` bigint(20) NOT NULL,
  `pay_change` int(11) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `notice` text NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_invoice`
--

INSERT INTO `g_invoice` (`idInvoice`, `customer`, `dateInvoice`, `totalPrice`, `discount`, `payment`, `pay_change`, `pay_method`, `notice`, `kasir`, `status`) VALUES
('20210322226ED70E12', '', '0000-00-00', 0, 0, 0, 0, '', '', '', 0),
('2021032234F6FC06DE', 'Umum', '2021-03-22', 45000, 0, 50000, 5000, 'CASH', '', 'admin', 1),
('202103224601B5D787', 'Umum', '2021-03-22', 42500, 0, 45000, 2500, 'CASH', '', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_invoice_det`
--

CREATE TABLE `g_invoice_det` (
  `idInvoiceDet` int(11) NOT NULL,
  `idInvoice` varchar(255) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `priceIn` int(11) NOT NULL,
  `qtyProduct` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_invoice_det`
--

INSERT INTO `g_invoice_det` (`idInvoiceDet`, `idInvoice`, `idProduct`, `priceIn`, `qtyProduct`, `totalPrice`) VALUES
(22, '2021032234F6FC06DE', 7, 15000, 1, 15000),
(23, '2021032234F6FC06DE', 7, 15000, 1, 15000),
(24, '2021032234F6FC06DE', 7, 15000, 1, 15000),
(25, '202103224601B5D787', 8, 25000, 1, 25000),
(26, '202103224601B5D787', 6, 17500, 1, 17500);

-- --------------------------------------------------------

--
-- Table structure for table `g_log`
--

CREATE TABLE `g_log` (
  `idLog` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `user` varchar(20) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_log`
--

INSERT INTO `g_log` (`idLog`, `datetime`, `user`, `log`) VALUES
(1, '2018-11-24 13:27:10', 'admin', 'admin menambahkan Data Jenis baru'),
(2, '2018-11-24 13:28:56', 'admin', 'admin menambahkan Data Produk baru'),
(3, '2018-11-24 13:29:38', 'admin', 'admin menambahkan Data Produk baru'),
(4, '2018-11-24 15:09:56', 'admin', 'admin mengubah Data Produk'),
(5, '2018-11-24 15:13:23', 'admin', 'admin menghapus Data Produk'),
(6, '2018-11-24 15:38:27', 'admin', 'admin menambahkan Data Supplier baru'),
(7, '2018-11-24 15:47:04', 'admin', 'admin mengubah Data Supplier'),
(8, '2018-11-24 15:54:09', 'admin', 'admin menghapus Data Jenis'),
(9, '2018-11-24 15:55:31', 'admin', 'admin menghapus Data Supplier'),
(10, '2018-11-24 21:48:51', 'admin', 'admin menambahkan Data Jenis baru'),
(11, '2018-11-24 21:49:03', 'admin', 'admin mengubah Data Produk'),
(12, '2018-11-24 21:49:29', 'admin', 'admin menambahkan Data Produk baru'),
(13, '2018-11-24 21:50:09', 'admin', 'admin menambahkan Data Supplier baru'),
(14, '2018-11-28 16:18:54', 'admin', 'admin menambahkan Data Produk baru'),
(15, '2018-12-05 09:34:21', 'admin', 'admin mengubah Data Produk'),
(16, '2018-12-11 16:12:50', 'admin', 'admin menambahkan Data Retur baru'),
(17, '2018-12-11 16:28:24', 'admin', 'admin menambahkan Data Retur baru'),
(18, '2021-01-23 11:55:19', 'admin', 'admin menghapus Data Supplier');

-- --------------------------------------------------------

--
-- Table structure for table `g_products`
--

CREATE TABLE `g_products` (
  `idProduct` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `buy` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `productStock` int(11) NOT NULL,
  `productIndex` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_products`
--

INSERT INTO `g_products` (`idProduct`, `idType`, `productName`, `barcode`, `buy`, `price`, `productStock`, `productIndex`) VALUES
(6, 5, 'Bola Golf Vicasihose', 'A150M00857', 15000, 17500, 2, 1),
(7, 1, 'AGAR DBL SWALL NO.1 PUTIH', '008497', 15000, 15000, 0, 1),
(8, 1, '123 BENDERA COKLAT 300G', 'A150M00582', 15000, 25000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_purchase`
--

CREATE TABLE `g_purchase` (
  `purchaseOrder` varchar(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `totalItem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_purchase`
--

INSERT INTO `g_purchase` (`purchaseOrder`, `idSupplier`, `date`, `totalItem`) VALUES
('PO-10001', 3, '2021-02-08', 20),
('PO-10002', 2, '2021-03-22', 10);

-- --------------------------------------------------------

--
-- Table structure for table `g_purchase_det`
--

CREATE TABLE `g_purchase_det` (
  `idProductsIn` int(11) NOT NULL,
  `purchaseOrder` varchar(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `pricebuy` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `notice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_purchase_det`
--

INSERT INTO `g_purchase_det` (`idProductsIn`, `purchaseOrder`, `idProduct`, `pricebuy`, `qty`, `notice`) VALUES
(15, 'PO-10001', 7, 15000, 10, ''),
(16, 'PO-10001', 6, 12750, 10, ''),
(17, 'PO-10002', 8, 12000, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `g_retur`
--

CREATE TABLE `g_retur` (
  `idRetur` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `notice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_retur`
--

INSERT INTO `g_retur` (`idRetur`, `idProduct`, `idSupplier`, `date`, `qty`, `notice`) VALUES
(1, 3, 2, '2018-12-11', 1, 'Rusak'),
(2, 1, 2, '2018-12-11', 1, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `g_service`
--

CREATE TABLE `g_service` (
  `idService` varchar(100) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `total` bigint(20) NOT NULL,
  `discount` int(11) NOT NULL,
  `payment` bigint(20) NOT NULL,
  `pay_change` int(11) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `notice` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `g_service`
--

INSERT INTO `g_service` (`idService`, `customer`, `date`, `total`, `discount`, `payment`, `pay_change`, `pay_method`, `kasir`, `notice`, `status`) VALUES
('SRVC20210229475DC7C5', '0', '0000-00-00', 0, 0, 0, 0, '', '', '', 0),
('SRVC202102C798D43824', 'umum', '2021-02-17', 300000, 0, 300000, 0, 'CASH', 'admin', 'tes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_service_det`
--

CREATE TABLE `g_service_det` (
  `id` int(11) NOT NULL,
  `idService` varchar(255) NOT NULL,
  `namaBarang` text NOT NULL,
  `tindakan` text NOT NULL,
  `biaya` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `g_service_det`
--

INSERT INTO `g_service_det` (`id`, `idService`, `namaBarang`, `tindakan`, `biaya`, `qty`, `subtotal`) VALUES
(2, 'SRVC202102C798D43824', 'Stick Golf', 'Repair', 250000, 1, 250000),
(3, 'SRVC202102C798D43824', 'Kicker', 'Ganti Sparepart', 50000, 1, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `g_supplier`
--

CREATE TABLE `g_supplier` (
  `idSupplier` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `supplierIndex` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_supplier`
--

INSERT INTO `g_supplier` (`idSupplier`, `supplierName`, `contact`, `alamat`, `supplierIndex`) VALUES
(2, 'PT. Angga', '0861116111', '', 1),
(3, 'PT. Maju Jaya', '+628544566', 'Jogja Asli', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_type`
--

CREATE TABLE `g_type` (
  `idType` int(11) NOT NULL,
  `typeName` varchar(50) NOT NULL,
  `typeIndex` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_type`
--

INSERT INTO `g_type` (`idType`, `typeName`, `typeIndex`) VALUES
(1, 'Kategori', 1),
(3, 'Kategori 2', 0),
(4, 'Kategori 2', 0),
(5, 'Bola Golf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `g_users`
--

CREATE TABLE `g_users` (
  `idUsers` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_users`
--

INSERT INTO `g_users` (`idUsers`, `user`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'INDAH', 'f3385c508ce54d577fd205a1b2ecdfb7', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `g_invoice`
--
ALTER TABLE `g_invoice`
  ADD PRIMARY KEY (`idInvoice`);

--
-- Indexes for table `g_invoice_det`
--
ALTER TABLE `g_invoice_det`
  ADD PRIMARY KEY (`idInvoiceDet`);

--
-- Indexes for table `g_log`
--
ALTER TABLE `g_log`
  ADD PRIMARY KEY (`idLog`);

--
-- Indexes for table `g_products`
--
ALTER TABLE `g_products`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indexes for table `g_purchase`
--
ALTER TABLE `g_purchase`
  ADD PRIMARY KEY (`purchaseOrder`);

--
-- Indexes for table `g_purchase_det`
--
ALTER TABLE `g_purchase_det`
  ADD PRIMARY KEY (`idProductsIn`);

--
-- Indexes for table `g_retur`
--
ALTER TABLE `g_retur`
  ADD PRIMARY KEY (`idRetur`);

--
-- Indexes for table `g_service`
--
ALTER TABLE `g_service`
  ADD PRIMARY KEY (`idService`);

--
-- Indexes for table `g_service_det`
--
ALTER TABLE `g_service_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_supplier`
--
ALTER TABLE `g_supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `g_type`
--
ALTER TABLE `g_type`
  ADD PRIMARY KEY (`idType`);

--
-- Indexes for table `g_users`
--
ALTER TABLE `g_users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `g_invoice_det`
--
ALTER TABLE `g_invoice_det`
  MODIFY `idInvoiceDet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `g_log`
--
ALTER TABLE `g_log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `g_products`
--
ALTER TABLE `g_products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `g_purchase_det`
--
ALTER TABLE `g_purchase_det`
  MODIFY `idProductsIn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `g_retur`
--
ALTER TABLE `g_retur`
  MODIFY `idRetur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `g_service_det`
--
ALTER TABLE `g_service_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `g_supplier`
--
ALTER TABLE `g_supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
