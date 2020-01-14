-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_challan` ;

--
-- Table structure for table `tax_challan`
-- Details of the challan

CREATE TABLE IF NOT EXISTS `tax_challan` (
  `tax_challan_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL  COMMENT "not an auto incriment value",
  `tax_challan_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_depositors_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_duration` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT "daily , week month",
  `tax_challan_from_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_to_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_purpose` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_challan_amount` DOUBLE(10, 2) NOT NULL DEFAULT '0.00',
  `tax_transaction_no` bigint(20) NOT NULL COMMENT "from transaction table tax_transaction_queue",
  `tax_transaction_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDING' COMMENT "'FAILURE' 'SUCCESS' 'PENDING' 'AWAITNG CONFIRMATION'",
  `tax_challan_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `tax_type_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Foreign Key from tax_type", 
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_challan`
--
ALTER TABLE `tax_challan`
  ADD PRIMARY KEY (`tax_challan_id`);

--
-- Modification table `tax_challan`
--  
ALTER TABLE `tax_challan` ADD `tax_dealer_id` BIGINT NOT NULL COMMENT 'Foreign key from tax_dealer' AFTER `tax_type_id`;
  
ALTER TABLE `tax_challan` ADD `tax_depositors_city` VARCHAR(20) NOT NULL COMMENT 'Post Code of Depisitor' AFTER `tax_depositors_address`;

ALTER TABLE `tax_challan` ADD `tax_depositors_zip` VARCHAR(10) NOT NULL COMMENT 'Post Code of Depisitor' AFTER `tax_depositors_city`;

