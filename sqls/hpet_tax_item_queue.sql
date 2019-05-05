-- --------------------------------------------------------

DROP TABLE IF EXISTS `hpet_tax_item_queue` ;

--
-- Table structure for table `hpet_tax_item_queue`
-- Item wise details for the which will later be moved to hpet_tax_challan_items once ading editing is finished (save or next). 
-- Will be gererated for user session and deleted after Challan Code generation, Challan Code will not be avaliable at this time and will be generated once user is ready to submit.

CREATE TABLE IF NOT EXISTS `hpet_tax_item_queue` (
  `tax_queue_item_id` bigint(20) NOT NULL,
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
  `tax_commodity_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,  
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
-- Indexes for table `hpet_tax_item_queue`
--
ALTER TABLE `hpet_tax_item_queue`
  ADD PRIMARY KEY (`tax_queue_item_id`),
  ADD UNIQUE KEY `tax_queue_vehicle_UK` (`tax_queue_session`, `tax_vehicle_number`, `tax_commodity_name`);
