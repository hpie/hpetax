
-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_dealer` ;

--
-- Table structure for table `tax_dealer`
-- Dealers or Registered Users

CREATE TABLE IF NOT EXISTS `tax_dealer` (
  `tax_dealer_id` bigint(20) NOT NULL,
  `tax_dealer_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "not an auto incriment value will assigned by the department",
  `tax_dealer_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_dealer_tin` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Tin Number",
  `tax_dealer_tin_expiry` date NOT NULL COMMENT "Tin Validity",
  `tax_dealer_mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT "Registered Mobile number",
  `tax_dealer_pan` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT "PAN number",
  `tax_dealer_aadhar` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Aadhar number",
  `tax_dealer_security_q` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT "Password retrival Security question",
  `tax_dealer_security_a` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT "Password retrival Security answer",
  `tax_dealer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_dealer_lastlogin` timestamp NOT NULL,
  `tax_delaer_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE, INACTIVE, DELETED',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_dealer`
--
ALTER TABLE `tax_dealer`
  ADD PRIMARY KEY (`tax_dealer_id`);

--
-- AUTO_INCREMENT for table `tax_item_queue`
--
ALTER TABLE `tax_dealer`
  MODIFY `tax_dealer_id` bigint(20) NOT NULL AUTO_INCREMENT;
