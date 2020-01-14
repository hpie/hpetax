
-- --------------------------------------------------------

--
-- Table structure for table `tax_edt_invoice`
--

CREATE TABLE `tax_edt_invoice` (
  `tax_edt_invoice_id` bigint(20) NOT NULL,
  `invoice_no` varchar(20) DEFAULT NULL COMMENT 'Presented Invoice Number',
  `invoice_date` datetime DEFAULT NULL COMMENT 'Presented Invoice Date',
  `invoice_amount` double DEFAULT NULL COMMENT 'Invoice amount on the presented invoice',
  `vehicle_number` varchar(20) DEFAULT NULL COMMENT 'Vehicle number at the time of inspection',
  `transaction_type` varchar(20) DEFAULT NULL COMMENT 'Should be a foreign Key from Master Table',
  `consigner_gst` varchar(20) DEFAULT NULL,
  `consigner_firm_name` varchar(255) DEFAULT NULL,
  `consigner_firm_address` varchar(255),
  `consignee_gst` varchar(20) DEFAULT NULL,
  `consignee_firm_name` varchar(255) DEFAULT NULL,
  `consignee_bill_to` varchar(255),
  `consignee_ship_to` varchar(255),
  `identification_type` varchar(20) DEFAULT NULL COMMENT 'AADHAAR, DRIVING LISENCE, PAN, Should be a foreign Key from Master Table',
  `identification_number` varchar(50) DEFAULT NULL COMMENT 'Identification number presented by Unregistered User',
  `is_registered` int(1) DEFAULT '0' COMMENT '0 - unregistered, 1 - registered',
  `tax_dealer_code` varchar(100) DEFAULT NULL COMMENT 'Dealer code from tax_dealer table',
  `inspected_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Date when inspected',
  `tax_employee_code` varchar(20) NOT NULL COMMENT 'Employee code of who did the inspection',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Indexes for table `tax_edt_invoice`
--
ALTER TABLE `tax_edt_invoice`
  ADD PRIMARY KEY (`tax_edt_invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tax_edt_invoice`
--
ALTER TABLE `tax_edt_invoice`
  MODIFY `tax_edt_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT;
