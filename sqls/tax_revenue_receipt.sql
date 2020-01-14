-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_revenue_receipt`;

--
-- Table structure for table `tax_revenue_receipt`
-- Main tax type for which challan will be generated
-- 01- Receipt from Passenger Tax
-- 02- Surcharge on Passenger Tax
-- 03- Passenger Tax Stamps
-- 04- Receipts from Penalty


CREATE TABLE IF NOT EXISTS `tax_revenue_receipt` (
  `tax_revenue_receipt_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Unique Receipt ID",
  `tax_revenue_receipt_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_revenue_receipt_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_receipt_head` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Cumulative Head and Subhead from tax_type.tax_type_head-tax_commodity.tax_commodity_subhead",
  `tax_revenue_receipt_head` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT "Will be the Receipt Code agains which the payment will be recorded. To be appended with Head and Sub-head",
  `tax_revenue_receipt_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_revenue_receipt`
--
ALTER TABLE `tax_revenue_receipt`
  ADD PRIMARY KEY (`tax_revenue_receipt_id`),
  ADD UNIQUE KEY `tax_revenue_receipt_name_UK` (`tax_revenue_receipt_name`);

