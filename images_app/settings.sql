-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2021 at 02:55 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.3.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queen_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aleas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `aleas`, `option`, `option_type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'name_ar', 'اسم', NULL, 'text', 'queen tech solutions', NULL, '2021-03-10 10:01:55'),
(2, 'name_en', 'اسم', NULL, 'text', 'كوين لحلول التكنولوجيا', NULL, '2021-03-11 12:00:54'),
(3, 'logo', 'logo', NULL, 'file', '/uploads//161537778593199.png', NULL, '2021-03-10 10:03:05'),
(6, 'phone', 'رقم التليفون', NULL, 'text', '0122554788555', NULL, '2021-02-14 18:55:26'),
(7, 'email', 'البريد الإلكتروني', NULL, 'text', 'admin@gmail.com', NULL, '2021-02-14 18:55:26'),
(22, 'mobile_language', NULL, NULL, 'text', 'en_US', NULL, '2021-02-14 18:55:26'),
(26, 'default_currency_decimal_digits', NULL, NULL, 'text', '2', NULL, '2021-02-14 18:55:26'),
(27, 'favicon', NULL, NULL, 'file', '/uploads//161537778593199.png', NULL, '2021-03-10 10:03:05'),
(28, 'sales_phone', ' رقم التليفون  مبيعات', NULL, 'text', '+1 (408) 786-5555', NULL, '2021-02-14 18:55:26'),
(29, 'support_phone', 'رقم التليفون  الدعم', NULL, 'text', '+91 862-000-5555', NULL, '2021-02-14 18:55:26'),
(30, 'sales_email', 'البريد الإلكتروني للمبيعات', NULL, 'text', 'sales@queentechsolutions.net', NULL, '2021-03-11 12:00:54'),
(31, 'support_email', 'البريد الإلكتروني للدعم', NULL, 'text', 'support@queentechsolutions.net', NULL, '2021-02-14 18:55:26'),
(32, 'first_address_en', 'العنوان الأول (بالإنجليزية)', NULL, 'text', 'Bengal Eco Intelligent Park', NULL, '2021-02-14 18:55:26'),
(33, 'secound_address_en', 'العنوان الثاني (بالإنجليزية)', NULL, 'text', 'Sector V, Saltlake, Kolkata 700091', NULL, '2021-02-14 18:55:26'),
(34, 'facebook', 'الفيسبوك', NULL, 'text', 'test', NULL, '2021-02-14 18:55:26'),
(35, 'twitter', 'تويتر', NULL, 'text', 'test', NULL, '2021-02-14 18:55:26'),
(36, 'google', 'google', NULL, 'text', 'google', NULL, '2021-02-14 18:55:26'),
(37, 'pinterest', 'بينتيريست', NULL, 'text', 'pinterest', NULL, '2021-02-14 18:55:26'),
(38, 'first_address_ar', 'العنوان الأول (باللغة العربية)', NULL, 'text', 'Bengal Eco Intelligent Park', NULL, '2021-02-14 18:55:26'),
(39, 'secound_address_ar', 'العنوان الثاني (باللغة العربية)', NULL, 'text', 'Sector V, Saltlake, Kolkata 700091', NULL, '2021-02-14 18:55:26'),
(40, 'why_we_do_it_ar', NULL, NULL, 'textarea', 'Each of us loves what we do and we feel that spirit helps translate into the quality of our work. Working with clients who love their work combines into a fun, wonderful partnership for everyone involved.', NULL, '2021-02-14 18:55:26'),
(41, 'why_we_do_it_en', NULL, NULL, 'textarea', 'Each of us loves what we do and we feel that spirit helps translate into the quality of our work. Working with clients who love their work combines into a fun, wonderful partnership for everyone involved.', NULL, '2021-02-14 18:55:26'),
(42, 'what_we_do_ar', NULL, NULL, 'textarea', 'We’re focused on honing our crafts and bringing everything we have to the table for our clients. We create custom, functional websites focused on converting your users into customers.', NULL, '2021-02-14 18:55:26'),
(43, 'what_we_do_en', NULL, NULL, 'textarea', 'We’re focused on honing our crafts and bringing everything we have to the table for our clients. We create custom, functional websites focused on converting your users into customers.', NULL, '2021-02-14 18:55:26'),
(44, 'who_we_are_ar', NULL, NULL, 'textarea', 'We are a team of web design and development professionals who love partnering with good people and businesses to help them achieve online success.', NULL, '2021-02-14 18:55:26'),
(45, 'who_we_are_en', NULL, NULL, 'textarea', 'We are a team of web design and development professionals who love partnering with good people and businesses to help them achieve online success.', NULL, '2021-02-14 18:55:26'),
(46, 'map', NULL, NULL, 'textarea', '<iframe src="https://www.google.com/maps/embed/v1/place?q=Bengal Eco Intelligent Park, EM Block, Sector V, Saltlake, Kolkata 700091&zoom=17&key=AIzaSyCXV9O0hBrMwfc-lcGlRyA5GQWZG7Wouig" width=100% height="500" style=\'border:0; margin-top:20px;\'></iframe>', NULL, '2021-02-14 18:55:26'),
(47, 'meta_title_en', NULL, NULL, 'text', 'Queen Tech Solutions', NULL, '2021-02-14 18:55:26'),
(48, 'meta_title_ar', NULL, NULL, 'text', 'Queen Tech Solutions', NULL, '2021-02-14 18:55:26'),
(49, 'meta_description_ar', NULL, NULL, 'textarea', 'we are the highest quality, software solutions provider', NULL, '2021-02-14 18:55:26'),
(50, 'meta_description_en', NULL, NULL, 'textarea', 'we are the highest quality, software solutions provider', NULL, '2021-02-14 18:55:26'),
(51, 'meta_keywords_en', NULL, NULL, 'textarea', 'php scripts, clone scripts, web design, web development, android development, ios development, custom development, remote staffing, remote programmer', NULL, '2021-02-14 18:55:26'),
(52, 'meta_keywords_ar', NULL, NULL, 'textarea', 'نصوص php ، نسخ البرامج النصية ، تصميم الويب ، تطوير الويب ، تطوير android ، تطوير ios ، التطوير المخصص ، التوظيف عن بُعد ، مبرمج عن بُعد', NULL, '2021-02-14 18:55:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
