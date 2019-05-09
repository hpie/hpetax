-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_commodity` ;

--
-- Table structure for table `tax_commodity`
-- Sub category under a tax type every comodity can have a different calculation logic

CREATE TABLE IF NOT EXISTS `tax_commodity` (
  `tax_commodity_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "not an auto incriment value",
  `tax_commodity_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_commodity_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_commodity_rate` DOUBLE(10, 2) NOT NULL DEFAULT '0.00',  
  `tax_commodity_rate_unit` int NOT NULL DEFAULT '10' COMMENT "minimum requires and in multiples of",
  `tax_commodity_unit_measure` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Kg' COMMENT "pull from central table",
  `tax_commodity_taxcalculation` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BY_WEIGHT' COMMENT "By_Weight, By_Count, Flat_Rate",
  `tax_commodity_isdistancedependent` varchar(10) NOT NULL DEFAULT 'NO',
  `tax_commodity_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
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
-- Indexes for table `tax_commodity`
--
ALTER TABLE `tax_commodity`
  ADD PRIMARY KEY (`tax_commodity_id`),
  ADD UNIQUE KEY `tax_commodity_name_UK` (`tax_commodity_name`);
