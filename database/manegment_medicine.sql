-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 04:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manegment_medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_rule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_fullname`, `admin_username`, `admin_password`, `admin_rule`) VALUES
(1, 'Hussam Kamal', 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cashiers`
--

CREATE TABLE `cashiers` (
  `cashier_id` int(11) NOT NULL,
  `cashier_fullname` varchar(255) NOT NULL,
  `cashier_contact` varchar(255) NOT NULL,
  `cashier_username` varchar(255) NOT NULL,
  `cashier_password` varchar(255) NOT NULL,
  `cashier_rule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cashiers`
--

INSERT INTO `cashiers` (`cashier_id`, `cashier_fullname`, `cashier_contact`, `cashier_username`, `cashier_password`, `cashier_rule`) VALUES
(1, 'Abdallah Rashad', '01095320462', 'user', 'user', 'Cashier'),
(4, 'Ahmed Kamal', '01095320462', 'user', 'user', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_sup` int(11) NOT NULL,
  `medicine_sup_email` int(11) NOT NULL,
  `med_cat_name` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_purchase_price` varchar(255) NOT NULL,
  `medicine_retail_price` varchar(255) NOT NULL,
  `medicine_unit_of_box` varchar(255) NOT NULL,
  `medicine_unit_of_picec` varchar(255) NOT NULL,
  `medicine_quantity_box` varchar(255) NOT NULL,
  `medicine_quantity_picec` varchar(255) NOT NULL,
  `medicine_expirys_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_sup`, `medicine_sup_email`, `med_cat_name`, `medicine_name`, `medicine_purchase_price`, `medicine_retail_price`, `medicine_unit_of_box`, `medicine_unit_of_picec`, `medicine_quantity_box`, `medicine_quantity_picec`, `medicine_expirys_date`) VALUES
(1, 1, 1, 6, 'panadol', '20', '30', '1', '2', '50', '100', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `med_cat_id` int(11) NOT NULL,
  `med_cat_category_name` varchar(255) NOT NULL,
  `med_cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`med_cat_id`, `med_cat_category_name`, `med_cat_description`) VALUES
(6, 'Hot', 'vero ea excepturi voluptatem vel cupiditate, harum ullam, natus, porro facilis ab!	');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_client_name` varchar(255) NOT NULL,
  `sales_qty_box` varchar(255) NOT NULL,
  `sales_qty_tape` varchar(255) NOT NULL,
  `sales_total_price` varchar(255) NOT NULL,
  `sales_date` date NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `cashier_fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_client_name`, `sales_qty_box`, `sales_qty_tape`, `sales_total_price`, `sales_date`, `medicine_name`, `cashier_fullname`) VALUES
(3, 'Hussam', '40', '5', '40', '2022-12-16', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_company_name` varchar(255) NOT NULL,
  `setting_logo` text NOT NULL,
  `setting_description` text NOT NULL,
  `setting_keywords` text NOT NULL,
  `setting_address` text NOT NULL,
  `setting_email` varchar(255) NOT NULL,
  `setting_contact` varchar(255) NOT NULL,
  `setting_leave_message` text NOT NULL,
  `setting_close` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_company_name`, `setting_logo`, `setting_description`, `setting_keywords`, `setting_address`, `setting_email`, `setting_contact`, `setting_leave_message`, `setting_close`) VALUES
(1, 'Manegment Medicine', '', 'Description', 'Keywords', 'Cairo', 'mail@mail.com', '01065423017', 'updating', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `suppliers_id` int(11) NOT NULL,
  `suppliers_name` varchar(255) NOT NULL,
  `suppliers_contact` varchar(255) NOT NULL,
  `suppliers_email` varchar(255) NOT NULL,
  `suppliers_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`suppliers_id`, `suppliers_name`, `suppliers_contact`, `suppliers_email`, `suppliers_address`) VALUES
(1, 'muh', '9022255', 'ahmed@mail.com	', 'street name	'),
(4, 'asf', 'asfasffa', 'saf@gmail.com', 'asfasf'),
(5, 'asf', 'asf', 'weg@gmail.com', 'asf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cashiers`
--
ALTER TABLE `cashiers`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`med_cat_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`suppliers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashiers`
--
ALTER TABLE `cashiers`
  MODIFY `cashier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `med_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `suppliers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
