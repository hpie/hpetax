-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_type`;

--
-- Table structure for table `tax_type`
-- Main tax type for which challan will be generated

CREATE TABLE IF NOT EXISTS `tax_type` (
  `tax_type_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "AG, PGT, PTCG, CGCR",
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
-- Indexes for table `tax_type`
--
ALTER TABLE `tax_type`
  ADD PRIMARY KEY (`tax_type_id`),
  ADD UNIQUE KEY `tax_type_name_UK` (`tax_type_name`);

  
--
-- Added tax_type_head  for Tax Collection Heads 
--  
ALTER TABLE `tax_type` ADD `tax_type_head` VARCHAR(10) NOT NULL COMMENT ' Tax Collection Heads for Accounts' AFTER `tax_type_description`;  