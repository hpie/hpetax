-- --------------------------------------------------------

DROP TABLE IF EXISTS `admin_users`;

--
-- Table structure for table `admin_users`
-- Admin access to the backend

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `admin_user_id` bigint(20) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `forgotten_password_code` varchar(50) DEFAULT NULL,
  `forgotten_password_time` timestamp,
  `remember_code` varchar(50) DEFAULT NULL,
  `last_login` timestamp,
  `admin_user_status` varchar(10) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_user_id` bigint(20) NOT NULL AUTO_INCREMENT;