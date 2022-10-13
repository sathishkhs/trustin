-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 07:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `durafil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menuitems`
--

DROP TABLE IF EXISTS `admin_menuitems`;
CREATE TABLE `admin_menuitems` (
  `menuitem_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_menuitem_id` int(11) DEFAULT NULL,
  `menuitem_target` varchar(100) NOT NULL,
  `menuitem_link` varchar(255) NOT NULL,
  `menuitem_text` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `status_ind` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menuitems`
--

INSERT INTO `admin_menuitems` (`menuitem_id`, `menu_id`, `parent_menuitem_id`, `menuitem_target`, `menuitem_link`, `menuitem_text`, `display_order`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `last_modified_by`) VALUES
(1, 1, NULL, '', '#', 'Admin Users', 1, 1, '2018-05-07 00:00:00', '2020-11-14 17:31:03', 1, 1),
(2, 1, 1, '', 'adminusers', 'Admin Users LIst', 2, 1, '2018-05-07 00:00:00', '2020-11-14 17:31:10', 1, 1),
(3, 1, NULL, '', '#', 'Pages', 2, 1, '2018-05-07 00:00:00', '2020-11-14 17:31:13', 1, 1),
(4, 1, 3, '', 'pages', 'Pages List', 4, 1, '2018-05-07 00:00:00', '2020-11-14 17:46:53', 1, 1),
(5, 1, NULL, '', '#', 'Menuitems', 5, 1, '2018-05-07 00:00:00', '2020-11-14 17:46:56', 1, 1),
(6, 1, 5, '', 'menuitems', 'Menuitems List', 6, 1, '2018-05-07 00:00:00', '2020-11-14 17:46:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

DROP TABLE IF EXISTS `admin_menus`;
CREATE TABLE `admin_menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `status_ind` smallint(6) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` smallint(6) DEFAULT NULL,
  `modified_by` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`role_id`, `role_name`, `status_ind`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(1, 'Admin', 1, '2018-05-07 00:00:00', NULL, 1, 1),
(3, 'Others', 1, '2018-05-07 00:00:00', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles_accesses`
--

DROP TABLE IF EXISTS `admin_roles_accesses`;
CREATE TABLE `admin_roles_accesses` (
  `role_id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sessions_id` varchar(60) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `user_photo` varchar(500) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status_ind` smallint(6) DEFAULT 0 COMMENT '1=active,0=inactive',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `created_by` smallint(6) DEFAULT 0,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` smallint(6) DEFAULT 0,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `role_id`, `username`, `email`, `password`, `sessions_id`, `first_name`, `last_name`, `mobile`, `user_photo`, `address`, `status_ind`, `created_date`, `created_by`, `modified_date`, `modified_by`, `last_login`) VALUES
(1, 1, 'sharanu@creativeyogi.com', 'sharanu@creativeyogi.com', '8ceb6cc913c9953d1a85a2bf94565b9b', '8291488671f1cab31ff6ec8519eca47c', 'Sharanu', 'Akkur', '9945099450', NULL, 'cy@1234', 1, '2018-05-03 02:08:56', 0, '2020-09-28 00:00:00', 1, '2020-11-14 23:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users_accesses`
--

DROP TABLE IF EXISTS `admin_users_accesses`;
CREATE TABLE `admin_users_accesses` (
  `user_id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL,
  `add_permission` smallint(6) NOT NULL DEFAULT 0,
  `edit_permission` smallint(6) NOT NULL DEFAULT 0,
  `delete_permission` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users_accesses`
--

INSERT INTO `admin_users_accesses` (`user_id`, `menuitem_id`, `add_permission`, `edit_permission`, `delete_permission`) VALUES
(1, 1, 1, 1, 1),
(1, 2, 1, 1, 1),
(1, 3, 1, 1, 1),
(1, 4, 1, 1, 1),
(1, 5, 1, 1, 1),
(1, 6, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

DROP TABLE IF EXISTS `menuitems`;
CREATE TABLE `menuitems` (
  `menuitem_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_menuitem_id` int(11) DEFAULT NULL,
  `menuitem_target` varchar(255) COLLATE utf8_unicode_ci DEFAULT '_self',
  `menuitem_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menuitem_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `http_protocol` enum('https','https') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https',
  `status_ind` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Active, 0=Inactive',
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`menuitem_id`, `menu_id`, `parent_menuitem_id`, `menuitem_target`, `menuitem_link`, `menuitem_text`, `display_order`, `http_protocol`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `last_modified_by`) VALUES
(1, 1, NULL, '_self', 'home', 'Home', 1, 'https', 1, '2020-09-26 13:53:41', '2020-11-14 18:02:08', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `status_ind`) VALUES
(1, 'Header Menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `template_id` int(11) NOT NULL DEFAULT 2,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `display_image` tinyint(1) NOT NULL,
  `page_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `page_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `page_content_2` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_meta_tags` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `nofollow_ind` tinyint(1) NOT NULL DEFAULT 0,
  `noindex_ind` tinyint(1) DEFAULT 0,
  `canonical_index` tinyint(1) NOT NULL DEFAULT 0,
  `canonical_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `redirection_link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Active, 0=Inactive',
  `display_order` tinyint(4) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `type_id`, `template_id`, `page_title`, `page_path`, `display_image`, `page_slug`, `page_short_description`, `page_content`, `page_content_2`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`, `canonical_index`, `canonical_url`, `redirection_link`, `status_ind`, `display_order`, `created_date`, `last_modified_date`, `created_by`, `last_modified_by`) VALUES
(1, 1, 1, 'Home', '', 0, 'home', '', '<h2 class=\"feat\">Home</h2>\r\n', '', 'Home', 'Home', 'Home', '', 0, 0, 0, '', '', 1, NULL, '2020-09-01 13:01:48', '2020-11-14 18:02:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_types`
--

DROP TABLE IF EXISTS `page_types`;
CREATE TABLE `page_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `widget_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_ind` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `type_status` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `last_modified_by` int(11) NOT NULL,
  `widget_exit` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_types`
--

INSERT INTO `page_types` (`type_id`, `type_name`, `view_path`, `widget_path`, `model_name`, `value_field`, `text_field`, `status_ind`, `type_status`, `created_date`, `last_modified_date`, `created_by`, `last_modified_by`, `widget_exit`) VALUES
(1, 'Home', '', '', '', '', '', 1, 1, '0000-00-00 00:00:00', '2020-09-04 07:39:03', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `template_id` int(11) NOT NULL,
  `template_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `template_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_ind` tinyint(1) DEFAULT 1,
  `created_date` timestamp NULL DEFAULT NULL,
  `allow_customize` int(1) DEFAULT NULL COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`template_id`, `template_name`, `template_path`, `status_ind`, `created_date`, `allow_customize`) VALUES
(1, 'Home Template', 'templates/home', 1, '2013-12-19 08:00:00', 1),
(2, 'Inner Template', 'templates/inner_page', 1, '2013-12-27 08:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menuitems`
--
ALTER TABLE `admin_menuitems`
  ADD PRIMARY KEY (`menuitem_id`);

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `admin_roles_accesses`
--
ALTER TABLE `admin_roles_accesses`
  ADD KEY `admin_roles_accesses_ibfk_1` (`role_id`),
  ADD KEY `admin_roles_accesses_ibfk_2` (`menuitem_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `admin_users_accesses`
--
ALTER TABLE `admin_users_accesses`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menuitem_id` (`menuitem_id`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`menuitem_id`) USING BTREE,
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `parent_menuitem_id` (`parent_menuitem_id`),
  ADD KEY `status_ind` (`status_ind`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `template_id` (`template_id`),
  ADD KEY `unique_slug` (`page_slug`) USING BTREE;

--
-- Indexes for table `page_types`
--
ALTER TABLE `page_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`template_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menuitems`
--
ALTER TABLE `admin_menuitems`
  MODIFY `menuitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `menuitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `page_types`
--
ALTER TABLE `page_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
