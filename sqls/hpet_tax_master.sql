-- --------------------------------------------------------

DROP TABLE IF EXISTS `hpet_tax_master` ;

--
-- Table structure for table `hpet_tax_master`
-- This table masters the Transaction Heads under which the transactions will recorded

CREATE TABLE IF NOT EXISTS `hpet_tax_master` (
  `tax_master_id` bigint(20) NOT NULL,		
  `tax_transaction_head` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "fixed Main Scheme under which payment is made, should be unique",
  `tax_transaction_dept` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "fixed value for department who will receive paymnet",
  `tax_transaction_ddo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT "fixed value for DDO of receiveing department",
  `tax_master_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `hpet_tax_master`
--
ALTER TABLE `hpet_tax_master`
  ADD PRIMARY KEY (`tax_master_id`),
  ADD UNIQUE KEY `tax_transaction_head_UK` (`tax_transaction_head`),
  ADD UNIQUE KEY `tax_transaction_UK` (`tax_transaction_dept`, `tax_transaction_ddo`, `tax_transaction_head`);
