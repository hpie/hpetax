<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'tax_edt_invoice';

//$table = <<<EOT
// (
//    SELECT 
//      ttq.*,
//      tc.tax_challan_id AS tcChallan_id,
//      tc.tax_type_id  
//    FROM tax_transaction_queue ttq
//    INNER JOIN tax_challan tc ON ttq.tax_challan_id = tc.tax_challan_id
// ) temp
//EOT;

// Table's primary key
$primaryKey = 'tax_edt_invoice_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'tax_edt_invoice_id', 'dt' =>'tax_edt_invoice_id'), 
    array('db' => 'invoice_no', 'dt' => 'invoice_no'),
    array('db' => 'invoice_date', 'dt' => 'invoice_date'),
    array('db' => 'invoice_amount', 'dt' => 'invoice_amount'),
    array('db' => 'vehicle_number', 'dt' => 'vehicle_number'),
    array('db' => 'transaction_type', 'dt' => 'transaction_type'),
    array('db' => 'consigner_gst', 'dt' => 'consigner_gst'),
    array('db' => 'consigner_firm_name', 'dt' => 'consigner_firm_name'),
    array('db' => 'consigner_firm_address', 'dt' => 'consigner_firm_address'),
    array('db' => 'consignee_gst', 'dt' => 'consignee_gst'),
    array('db' => 'consignee_firm_name', 'dt' => 'consignee_firm_name'),
    array('db' => 'consignee_bill_to', 'dt' => 'consignee_bill_to'),
    array('db' => 'consignee_ship_to', 'dt' => 'consignee_ship_to'),   
    array('db' => 'tax_dealer_code', 'dt' => 'tax_dealer_code'),
    array('db' => 'inspected_date', 'dt' => 'inspected_date'),
    array('db' => 'tax_employee_code', 'dt' => 'tax_employee_code')

);
include 'conn.php';

$where="";
$consigner_gst=$_POST['consigner_gst'];
$consigner_firm_name=$_POST['consigner_firm_name'];
$consigner_firm_address=$_POST['consigner_firm_address'];
$invoice_no=$_POST['invoice_no'];
$invoice_date=$_POST['invoice_date'];
$invoice_amount=$_POST['invoice_amount'];
$vehicle_number=$_POST['vehicle_number'];
$transaction_type=$_POST['transaction_type'];
$consignee_gst=$_POST['consignee_gst'];
$consignee_firm_name=$_POST['consignee_firm_name'];
$consignee_bill_to=$_POST['consignee_bill_to'];
$consignee_ship_to=$_POST['consignee_ship_to'];
$where.="   consigner_gst LIKE '%$consigner_gst%'
            OR consigner_firm_name LIKE '%$consigner_firm_name%'
            OR consigner_firm_address LIKE '%$consigner_firm_address%'
            OR invoice_no LIKE '%$invoice_no%'
            OR invoice_date LIKE '%$invoice_date%'
            OR invoice_amount LIKE '%$invoice_amount%'
            OR vehicle_number LIKE '%$vehicle_number%'
            OR transaction_type LIKE '%$transaction_type%'
            OR consignee_gst LIKE '%$consignee_gst%'
            OR consignee_firm_name LIKE '%$consignee_firm_name%'
            OR consignee_bill_to LIKE '%$consignee_bill_to%'
            OR consignee_ship_to LIKE '%$consignee_ship_to%'
            ";



//echo $where;die;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::edtList($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);


