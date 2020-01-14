-- --------------------------------------------------------

DROP TABLE IF EXISTS `tax_item_queue` ;

--
-- Table structure for table `tax_item_queue`
-- Item wise details for the which will later be moved to tax_challan_items once ading editing is finished (save or next). 
-- Will be gererated for user session and deleted after Challan Code generation, Challan Code will not be avaliable at this time and will be generated once user is ready to submit.

CREATE TABLE IF NOT EXISTS `tax_item_queue` (
  `tax_item_queue_id` bigint(20) NOT NULL COMMENT "Autoincrement and will be deleted once data is moved to tax_challan_items",
  `tax_queue_session` varchar(20) COLLATE utf8_unicode_ci NOT NULL,  
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
  `tax_commodity_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT "Foreign Key from tax_commodity",  
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
-- Indexes for table `tax_item_queue`
--
ALTER TABLE `tax_item_queue`
  ADD PRIMARY KEY (`tax_item_queue_id`),
  ADD UNIQUE KEY `tax_queue_vehicle_UK` (`tax_queue_session`, `tax_vehicle_number`, `tax_commodity_id`);
  

--
-- AUTO_INCREMENT for table `tax_item_queue`
--
ALTER TABLE `tax_item_queue`
  MODIFY `tax_item_queue_id` bigint(20) NOT NULL AUTO_INCREMENT;
