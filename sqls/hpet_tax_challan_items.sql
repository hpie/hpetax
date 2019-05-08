-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_challan_item` ;

--
-- Table structure for table `tax_challan_item`
-- Item wise details for consituants of the challan

CREATE TABLE IF NOT EXISTS `tax_challan_item` (
  `tax_challan_item_id` bigint(20) NOT NULL COMMENT "Autoincrement records will be copied from tax_item_queue",	
  `tax_type_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_commodity_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_vehicle_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_weight` int NOT NULL,
  `tax_item_weight_units` int NOT NULL,
  `tax_item_quantity` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_quantity_units` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_source_location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_destination_location` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_item_distanceinkm` int NOT NULL,
  `tax_item_tax_amount` DOUBLE(10, 2) NOT NULL DEFAULT '0.00',  
  `tax_item_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `tax_challan_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tax_commodity_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Foreign Key from tax_commodity",   
  `tax_type_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Foreign Key from tax_type", 
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_challan_item`
--
ALTER TABLE `tax_challan_item`
  ADD PRIMARY KEY (`tax_challan_item_id`),
  ADD UNIQUE KEY `tax_challan_vehicle_UK` (`tax_vehicle_number`, `tax_challan_code`, `tax_commodity_name`);
  
  
--
-- AUTO_INCREMENT for table `tax_challan_item`
--
ALTER TABLE `tax_challan_item`
  MODIFY `tax_challan_item_id` bigint(20) NOT NULL AUTO_INCREMENT;
