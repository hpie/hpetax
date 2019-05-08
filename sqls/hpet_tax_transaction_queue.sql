-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_transaction_queue` ;

--
-- Table structure for table `tax_transaction_queue`
-- To record paymment transaction attempts for the challan done on https://himkosh.hp.nic.in/echallan/  payment gateway

CREATE TABLE IF NOT EXISTS `tax_transaction_queue` (
  `tax_transaction_queue_id` bigint(20) NOT NULL COMMENT "Autoincrement",		
  `tax_transaction_dt` timestamp NOT NULL,
  `tax_transaction_dept` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "fixed value for department who will receive paymnet",
  `tax_transaction_ddo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "fixed value for DDO of receiveing department",
  `tax_transaction_head` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "fixed Main Scheme under which payment is made",
  `tax_payment_dt` timestamp NOT NULL,
  `tax_payment_bank` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_payment_amount` DOUBLE(10, 2) NOT NULL DEFAULT '0.00',
  `tax_transaction_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDING' COMMENT "'FAILURE' 'SUCCESS' 'PENDING' 'AWAITNG CONFIRMATION'",
  `tax_challan_cin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "Challan Identification Number",
  `tax_challan_brn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "Bank Refrence Number",
  `tax_challan_himgrn` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "HIMGRN by himkosh.hp.nic.in",
  `tax_challan_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "FK from tax_challan for which payment is made",
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_transaction_queue`
--
ALTER TABLE `tax_transaction_queue`
  ADD PRIMARY KEY (`tax_transaction_queue_id`);
  
  
--
-- AUTO_INCREMENT for table `tax_transaction_queue`
--
ALTER TABLE `tax_transaction_queue`
  MODIFY `tax_transaction_queue_id` bigint(20) NOT NULL AUTO_INCREMENT;