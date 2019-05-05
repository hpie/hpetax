-- --------------------------------------------------------

DROP TABLE IF EXISTS `hpet_tax_challan` ;

--
-- Table structure for table `hpet_tax_challan`
-- Details of the challan

CREATE TABLE IF NOT EXISTS `hpet_tax_challan` (
  `tax_challan_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_duration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,  -- daily , week month
  `tax_challan_from_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_to_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_purpose` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_amount` DOUBLE(10, 2) NOT NULL DEFAULT '0.00',
  `tax_transaction_no` bigint(20) NOT NULL,  -- from transaction table hpet_tax_transaction_queue
  `tax_transaction_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDING', -- "FAILURE" "SUCCESS" "PENDING" "AWAITNG CONFIRMATION"  
  `tax_challan_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `tax_type_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL, 
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `hpet_tax_challan`
--
ALTER TABLE `hpet_tax_challan`
  ADD PRIMARY KEY (`tax_challan_code`);
