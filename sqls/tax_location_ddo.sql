-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_location_ddo`;

--
-- Table structure for table `tax_location_ddo`
-- Location wise DDO code



CREATE TABLE IF NOT EXISTS `tax_location_ddo` (
  `tax_location_ddo_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Unique Row ID",
  `tax_location_ddo_location` varchar(50) COLLATE utf8_unicode_ci NULL COMMENT "DDO Location to be avaliable for user to select. A location can have Multiple DDO Codes so the user has to select one",
  `tax_location_ddo_code` varchar(20) COLLATE utf8_unicode_ci NULL COMMENT "DDO Code to be sent to Payment Gateway and saved for refrence",
  `tax_location_ddo_name` varchar(255) COLLATE utf8_unicode_ci NULL COMMENT "DDO Name to be Displayed to the User",
  `tax_location_ddo_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_location_ddo`
--
ALTER TABLE `tax_location_ddo`
  ADD PRIMARY KEY (`tax_location_ddo_id`),
  ADD UNIQUE KEY `tax_location_ddo_code_UK` (`tax_location_ddo_code`),
  ADD UNIQUE KEY `tax_location_ddo_name_UK` (`tax_location_ddo_name`);

  
--
-- AUTO_INCREMENT for table `tax_location_ddo`
--
ALTER TABLE `tax_location_ddo`
  MODIFY `tax_location_ddo_id` bigint(20) NOT NULL AUTO_INCREMENT;
