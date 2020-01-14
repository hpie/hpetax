
-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_employee` ;

--
-- Table structure for table `tax_employee`
-- Employee for Tax Application. Oficial who will login to extract reports

CREATE TABLE IF NOT EXISTS `tax_employee` (
  `tax_employee_id` bigint(20) NOT NULL,
  `tax_employee_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "not an auto incriment value will assigned by the department",
  `tax_employee_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tax_employee_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT "Employee name",
  `tax_employee_mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT "Registered Mobile number",
  `tax_employee_security_q` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT "Password retrival Security question",
  `tax_employee_security_a` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT "Password retrival Security answer",
  `tax_employee_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_employee_lastlogin` timestamp NOT NULL,
  `tax_employee_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE, INACTIVE, DELETED',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_employee`
--
ALTER TABLE `tax_employee`
  ADD PRIMARY KEY (`tax_employee_id`),
  ADD UNIQUE KEY `tax_employee_code_UK` (`tax_employee_code`),
  ADD UNIQUE KEY `tax_employee_email_UK` (`tax_employee_email`),
  ADD UNIQUE KEY `tax_employee_mobile_UK` (`tax_employee_mobile`);

  
--
-- AUTO_INCREMENT for table `tax_employee_id`
--
ALTER TABLE `tax_employee`
  MODIFY `tax_employee_id` bigint(20) NOT NULL AUTO_INCREMENT;