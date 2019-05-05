-- --------------------------------------------------------

DROP TABLE IF EXISTS `hpet_tax_type`;

--
-- Table structure for table `hpet_tax_type`
-- Main tax type for which challan will be generated

CREATE TABLE IF NOT EXISTS `hpet_tax_type` (
  `tax_type_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_type_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_type_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `hpet_tax_type`
--
ALTER TABLE `hpet_tax_type`
  ADD PRIMARY KEY (`tax_type_code`),
  ADD UNIQUE KEY `tax_type_name_UK` (`tax_type_name`);
