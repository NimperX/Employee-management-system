-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 24, 2020 at 06:29 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdbnew2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

-- DROP TABLE IF EXISTS `customers`;
-- CREATE TABLE IF NOT EXISTS `customers` (
--   `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name_of_contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `nic_of_contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `contact_number` bigint(11) NOT NULL,
--   `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `company_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `project_id` int(10) UNSIGNED DEFAULT NULL,
--   `project_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `project_location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `project_start_date` date DEFAULT NULL,
--   `estimated_project_end_date` date DEFAULT NULL,
--   `warranty_id` int(11) DEFAULT NULL,
--   `warranty_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   PRIMARY KEY (`customer_id`),
--   KEY `project_id` (`project_id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- Dumping data for table `customers`
--

INSERT INTO `projects` (`project_id`, `project_type`, `project_type_id`, `project_name`, `project_location`, `customer_id`, `customer_name`, `contact_number`, `email`, `project_start_date`, `estimated_project_end_date`, `estimate_id`, `quotation_id`, `timeline_id`, `employee_id`, `labor_id`, `machine_id`, `supplier_id`, `warranty_id`, `expense_id`, `updated_at`, `created_at`) VALUES
(1, 'Marine', 1, 'Pipe fitting', 'Colombo Dockyard', 1, 'Kumara Silva DIMO LTD', 94785612383, 'kumara@gmail.com', '2020-06-01', '2020-06-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-29 08:47:49', '2020-06-23 13:01:13'),
(2, 'Electrical', 4, 'Generator repairing', 'Moraketiya', 1, 'Kumara Silva DIMO LTD', 94785612383, 'kumara@gmail.com', '2020-06-01', '2020-06-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-29 08:45:14', '2020-06-29 08:45:14');

INSERT INTO `customers` (`customer_id`, `company_name`, `name_of_contact_person`, `nic_of_contact_person`, `contact_number`, `designation`, `company_address`, `email`, `project_id`, `project_name`, `project_location`, `project_start_date`, `estimated_project_end_date`, `warranty_id`, `warranty_details`) VALUES
(1, 'DIMO LTD', 'Kumara Silva', '789853214v', 94785612383, 'Manager', 'DIMO Ltd, Colombo', 'kumara@gmail.com', 0, '', '', '0000-00-00', '0000-00-00', 0, '');



-- --------------------------------------------------------

--
-- Table structure for table `employees_new`
--

-- DROP TABLE IF EXISTS `employees_new`;
-- CREATE TABLE IF NOT EXISTS `employees_new` (
--   `employee_nic` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `employee_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `employee_type_id` int(11) UNSIGNED DEFAULT NULL,
--   `employee_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `employee_category_id` int(10) UNSIGNED DEFAULT NULL,
--   `designation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `employee_contact_number` bigint(11) NOT NULL,
--   `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `employee_availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `project_id` int(10) UNSIGNED DEFAULT NULL,
--   `project_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`employee_nic`),
--   KEY `employee_type_id` (`employee_type_id`),
--   KEY `employee_category_id` (`employee_category_id`),
--   KEY `FK_project_id` (`project_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_new`
--

INSERT INTO `employees_new` (`employee_nic`, `first_name`, `last_name`, `employee_type`, `employee_type_id`, `employee_category`, `employee_category_id`, `designation`, `employee_contact_number`, `email`, `employee_availability`, `project_id`, `project_details`, `created_at`, `updated_at`) VALUES
('7896457953', 'Ranjith', 'Jinasena', 'Marine', NULL, 'Other', NULL, NULL, 94853761253, 'ranjith@gmail.com', 'Available', NULL, NULL, '2020-06-23 12:57:24', '2020-07-17 20:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `employee_categories`
--

-- DROP TABLE IF EXISTS `employee_categories`;
-- CREATE TABLE IF NOT EXISTS `employee_categories` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `employee_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_categories`
--

-- INSERT INTO `employee_categories` (`id`, `employee_category`) VALUES
-- (1, 'Senior Engineer'),
-- (2, 'Junior Engineer'),
-- (3, 'Project Supervisor'),
-- (4, 'Foreman'),
-- (5, 'Helper'),
-- (6, 'Multi-skilled laborers'),
-- (7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_new`
--

-- DROP TABLE IF EXISTS `expenses_new`;
-- CREATE TABLE IF NOT EXISTS `expenses_new` (
--   `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `project_id` int(10) UNSIGNED DEFAULT NULL,
--   `project_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `money_given_start_date` date NOT NULL,
--   `money_given_end_date` date NOT NULL,
--   `amount_given` decimal(8,2) NOT NULL,
--   `amount_spent` decimal(8,2) DEFAULT NULL,
--   `amount_leftover` decimal(8,2) DEFAULT NULL,
--   `employee_nic` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `receiver_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`expense_id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses_new`
--

INSERT INTO `expenses_new` (`expense_id`, `project_id`, `project_name`, `money_given_start_date`, `money_given_end_date`, `amount_given`, `amount_spent`, `amount_leftover`, `employee_nic`, `receiver_name`, `created_at`, `updated_at`) VALUES
(1, NULL, '1 Pipe fitting Marine Colombo Dockyard', '2020-07-01', '2020-07-08', '5000.00', '500.00', '4500.00', NULL, 'Ranjith Jinasena Marine Other', NULL, '2020-07-17 23:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

-- DROP TABLE IF EXISTS `failed_jobs`;
-- CREATE TABLE IF NOT EXISTS `failed_jobs` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
--   `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
--   `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

-- DROP TABLE IF EXISTS `labor`;
-- CREATE TABLE IF NOT EXISTS `labor` (
--   `supplier_id` int(10) UNSIGNED DEFAULT NULL,
--   `supplier_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `labor_nic` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `labor_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `labor_type_id` bigint(20) DEFAULT NULL,
--   `labor_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `labor_category_id` bigint(20) DEFAULT NULL,
--   `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `labor_contact_number` bigint(11) NOT NULL,
--   `labor_availability` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `labor_hired_date` date NOT NULL,
--   `labor_end_date` date NOT NULL,
--   `project_id` int(10) UNSIGNED DEFAULT NULL,
--   `project_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`labor_nic`),
--   KEY `labor_labor_type_id_foreign` (`labor_type_id`),
--   KEY `labor_labor_category_id_foreign` (`labor_category_id`),
--   KEY `FK_labor_project_id` (`project_id`),
--   KEY `FK_labor_supplier_id` (`supplier_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`supplier_id`, `supplier_details`, `labor_nic`, `first_name`, `last_name`, `labor_type`, `labor_type_id`, `labor_category`, `labor_category_id`, `designation`, `labor_contact_number`, `labor_availability`, `labor_hired_date`, `labor_end_date`, `project_id`, `project_details`, `created_at`, `updated_at`) VALUES
(1, '1 Human Capital Solutions', '897456321v', 'Saman', 'Wijesiri', 'Marine', NULL, 'Foreman', NULL, NULL, 94756941286, 'Available', '2020-06-01', '2020-07-24', 1, '1 Pipe fitting Marine Colombo Dockyard', NULL, '2020-07-06 12:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

-- DROP TABLE IF EXISTS `links`;
-- CREATE TABLE IF NOT EXISTS `links` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `source` int(11) NOT NULL,
--   `target` int(11) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

-- DROP TABLE IF EXISTS `machines`;
-- CREATE TABLE IF NOT EXISTS `machines` (
--   `machine_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `machine_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `machine_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `model_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `machine_purchase_date` date NOT NULL,
--   `machine_availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `additional_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `project_id` int(10) UNSIGNED DEFAULT NULL,
--   `project_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `work_start_date` date DEFAULT NULL,
--   `work_end_date` date DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`machine_id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`machine_id`, `machine_type`, `machine_name`, `model_number`, `machine_purchase_date`, `machine_availability`, `additional_details`, `project_id`, `project_name`, `work_start_date`, `work_end_date`, `created_at`, `updated_at`) VALUES
(1, 'Backhoe', NULL, 'SLP214FCXE0484824', '2020-05-01', 'Available', 'Need to service', 1, '1 Pipe fitting Marine Colombo Dockyard', '2020-06-22', NULL, NULL, '2020-07-01 09:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `machine_types`
--

-- DROP TABLE IF EXISTS `machine_types`;
-- CREATE TABLE IF NOT EXISTS `machine_types` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `machine_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_types`
--

-- INSERT INTO `machine_types` (`id`, `machine_type_name`) VALUES
-- (1, 'Backhoe'),
-- (2, 'Wacker'),
-- (3, 'Welding machine'),
-- (4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

-- DROP TABLE IF EXISTS `migrations`;
-- CREATE TABLE IF NOT EXISTS `migrations` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `batch` int(11) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

-- INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
-- (1, '2014_10_12_000000_create_users_table', 1),
-- (2, '2014_10_12_100000_create_password_resets_table', 1),
-- (3, '2019_08_19_000000_create_failed_jobs_table', 1),
-- (4, '2020_06_15_050340_project_types', 2),
-- (5, '2020_06_20_174833_employee_categories', 3),
-- (6, '2020_06_09_015932_suppliers', 4),
-- (7, '2020_06_22_164128_machine_types', 5),
-- (9, '2020_07_06_184827_warranties_new', 6),
-- (10, '2020_07_07_125339_expenses_new', 7),
-- (11, '2020_07_08_164841_create_tasks_table', 8),
-- (12, '2020_07_08_165244_create_links_table', 9),
-- (13, '2020_07_09_162835_add_sortorder_to_tasks_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

-- DROP TABLE IF EXISTS `password_resets`;
-- CREATE TABLE IF NOT EXISTS `password_resets` (
--   `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   KEY `password_resets_email_index` (`email`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

-- DROP TABLE IF EXISTS `projects`;
-- CREATE TABLE IF NOT EXISTS `projects` (
--   `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `project_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `project_type_id` int(11) UNSIGNED DEFAULT NULL,
--   `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `project_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `customer_id` int(11) UNSIGNED DEFAULT NULL,
--   `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `contact_number` bigint(11) NOT NULL,
--   `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `project_start_date` date NOT NULL,
--   `estimated_project_end_date` date NOT NULL,
--   `estimate_id` int(11) DEFAULT NULL,
--   `quotation_id` int(11) DEFAULT NULL,
--   `timeline_id` int(11) DEFAULT NULL,
--   `employee_id` int(11) DEFAULT NULL,
--   `labor_id` int(11) DEFAULT NULL,
--   `machine_id` int(11) DEFAULT NULL,
--   `supplier_id` int(11) DEFAULT NULL,
--   `warranty_id` int(11) DEFAULT NULL,
--   `expense_id` int(11) DEFAULT NULL,
--   `updated_at` datetime DEFAULT NULL,
--   `created_at` datetime DEFAULT NULL,
--   PRIMARY KEY (`project_id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--



-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

-- DROP TABLE IF EXISTS `project_types`;
-- CREATE TABLE IF NOT EXISTS `project_types` (
--   `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `project_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

-- INSERT INTO `project_types` (`id`, `project_type_name`) VALUES
-- (1, 'Marine'),
-- (2, 'Mechanical'),
-- (3, 'Civil'),
-- (4, 'Electrical');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

-- DROP TABLE IF EXISTS `suppliers`;
-- CREATE TABLE IF NOT EXISTS `suppliers` (
--   `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `supplier_company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name_of_contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `supplier_contact_number` bigint(11) NOT NULL,
--   `supplier_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `supplier_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `hired_date` date NOT NULL,
--   `estimated_work_end_date` date NOT NULL,
--   `additional_remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`supplier_id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_company_name`, `name_of_contact_person`, `supplier_contact_number`, `supplier_email`, `supplier_address`, `hired_date`, `estimated_work_end_date`, `additional_remarks`, `created_at`, `updated_at`) VALUES
(1, 'Human Capital Solutions', 'Mr. Ajith Siriwardane', 94635789125, 'ajith@humancapital.slt.net', 'Sri Lanka Telecom Office,Maradana Rd Colombo 08', '2020-06-01', '2020-07-10', NULL, NULL, '2020-07-03 02:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

-- DROP TABLE IF EXISTS `tasks`;
-- CREATE TABLE IF NOT EXISTS `tasks` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `duration` int(11) NOT NULL,
--   `progress` double(8,2) NOT NULL,
--   `start_date` datetime NOT NULL,
--   `parent` int(11) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `sortorder` int(11) NOT NULL DEFAULT '0',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --
-- -- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `text`, `duration`, `progress`, `start_date`, `parent`, `created_at`, `updated_at`, `sortorder`) VALUES
(1, 'Project 1', 5, 0.80, '2020-07-01 00:00:00', 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

-- DROP TABLE IF EXISTS `users`;
-- CREATE TABLE IF NOT EXISTS `users` (
--   `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `nic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email_verified_at` timestamp NULL DEFAULT NULL,
--   `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`nic`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `nic`, `designation`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('Kumara', 'Nanayakkara', '857496321v', 'Senior Engineer', 'kumara@gmail.com', NULL, '$2y$10$vcddgQGmIHtWMg0LR5aM0e8UfU6ZSIvWX2DpGkFKwy1PxqEoq5vuW', NULL, '2020-06-22 12:58:53', '2020-06-22 12:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `warranties_new`
--

-- DROP TABLE IF EXISTS `warranties_new`;
-- CREATE TABLE IF NOT EXISTS `warranties_new` (
--   `warranty_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `project_id` int(10) UNSIGNED DEFAULT NULL,
--   `project_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `customer_id` int(10) UNSIGNED DEFAULT NULL,
--   `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `warranty_start_date` date DEFAULT NULL,
--   `warranty_end_date` date DEFAULT NULL,
--   `machine_hours` int(11) DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`warranty_id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranties_new`
--

INSERT INTO `warranties_new` (`warranty_id`, `project_id`, `project_name`, `customer_id`, `customer_name`, `warranty_start_date`, `warranty_end_date`, `machine_hours`, `created_at`, `updated_at`) VALUES
(1, 1, '1 Pipe fitting', 1, 'Kumara Silva', NULL, NULL, 2500, NULL, '2020-07-06 14:29:50');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees_new`
--
-- ALTER TABLE `employees_new`
--   ADD CONSTRAINT `FK_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
--   ADD CONSTRAINT `Fk_employee_type` FOREIGN KEY (`employee_type_id`) REFERENCES `project_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `labor`
--
-- ALTER TABLE `labor`
--   ADD CONSTRAINT `FK_labor_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
--   ADD CONSTRAINT `FK_labor_supplier_id` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
