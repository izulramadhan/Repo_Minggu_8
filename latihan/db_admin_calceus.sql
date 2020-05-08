-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 02:00 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_admin_calceus`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` varchar(62) NOT NULL,
  `name` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `name`) VALUES
('5e98011ff379a', 'Running'),
('5e9801ed846c6', 'Converse'),
('5e9801f79ce8e', 'Skate'),
('5e980209bd6ee', 'Hight Heels'),
('5e98021235782', 'Boots'),
('5e980216f1fca', 'Lain-Lain');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `description`) VALUES
('5eb37beb2f54e', 'Original Brand Under_Armour Curry_6 Low Top MEN', 980000, '5eb37beb2f54e.jpg', '100 % Original, Size 40-45'),
('5eb37d383c7ed', 'Sepatu Converse Chuck Taylor All Star 1970S', 3700000, 'default.jpg', 'Premium BNIB, Size 37-44'),
('5eb37d57946a6', 'Sepatu futsal Nike mercurial superfly VI', 700000, 'default.jpg', 'Original BNIB, Size 40,40.5'),
('5eb37d7f052a5', 'Boots Brodo Pria Formal Kerja Kantor Original handmade', 288000, '5eb37d7f052a5.jpg', 'WOLF FOOTWEAR, High quality leather pull up ( KULIT ASLI), Size 39-44'),
('5eb37da1c30ab', 'Vans Slip On Old Skool Classic Checkerboard', 708000, '5eb37da1c30ab.jpg', 'VANS SLIP ON CHECKERBOARD BLACK WHITE ORIGINAL, ORIGINAL, 100% ORIGINAL BNIB , Size 40,41,42,42.5'),
('5eb37dba984ce', 'Monna Vania Hells Series Original Brand', 240000, '5eb37dba984ce.jpg', 'Sepatu Monna Vania Cindy Elegant Heels 332-5 Original Brand* Size 36-40');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `hapus_barang` AFTER DELETE ON `products` FOR EACH ROW begin
insert into produk_hapus
(product_id,name,price,image,description,tgl_hapus,user)
values 
(OLD.product_id, OLD.name, OLD.price, OLD.image, OLD.description, SYSDATE(), CURRENT_USER);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk_hapus`
--

CREATE TABLE `produk_hapus` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL,
  `tgl_hapus` date NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_hapus`
--

INSERT INTO `produk_hapus` (`product_id`, `name`, `price`, `image`, `description`, `tgl_hapus`, `user`) VALUES
('5eb3bb3097e6a', 'Sepatu Murah', 250000, '5eb3bb3097e6a.jpg', 'Bagus', '2020-05-07', 'root@localhost'),
('5eb42b1b20c51', 'Sepatu', 100000, '5eb42b1b20c51.jpg', 'Bagus', '2020-05-07', 'root@localhost');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
