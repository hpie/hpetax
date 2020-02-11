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
$table = 'tax_transaction_queue ttq';

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
$primaryKey = 'tax_transaction_queue_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'ttq.tax_transaction_queue_id', 'dt' =>'tax_transaction_queue_id'), 
    array('db' => 'ttq.tax_transaction_dept', 'dt' => 'tax_transaction_dept'),
    array('db' => 'ttq.tax_transaction_dt', 'dt' =>'tax_transaction_dt'),
    array('db' => 'ttq.tax_AppRefNo', 'dt' =>'tax_AppRefNo'),
    array('db' => 'ttq.tax_payment_dt', 'dt' =>'tax_payment_dt'),
    array('db' => 'ttq.tax_payment_bank', 'dt' =>'tax_payment_bank'),
    array('db' => 'ttq.tax_payment_amount', 'dt' =>'tax_payment_amount'),
    array('db' => 'ttq.tax_transaction_status', 'dt' =>'tax_transaction_status'),
    array('db' => 'ttq.tax_challan_brn', 'dt' =>'tax_challan_brn'),
    array('db' => 'ttq.tax_challan_himgrn', 'dt' =>'tax_challan_himgrn'),
    array('db' => 'ttq.tax_challan_id', 'dt' =>'tax_challan_id'),
    array('db' => 'tc.tax_type_id', 'dt' =>'tax_type_id'), 
    array('db' => 'tc.tax_depositors_email', 'dt' =>'tax_depositors_email'), 
    array('db' => 'tc.tax_depositors_phone', 'dt' =>'tax_depositors_phone'), 
);
include 'conn.php';

$delear=$_REQUEST['delear'];

//echo $delear;die;

$where =" tc.tax_dealer_id=$delear ";

$status=$_REQUEST['status'];
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
$transactionNo=$_REQUEST['transactionNo'];
$mobileNo=$_REQUEST['mobileNo'];
$email=$_REQUEST['email'];
if(!empty($status)){
    $where .=" AND ttq.tax_transaction_status='$status' ";
}
if(!empty($from) && !empty($to)){
    
    $fromdate = str_replace('/', '-', $from); 
    $fromdate = date_create($fromdate . ' 00:00:00');
    $fromdate = date_format($fromdate, 'Y-m-d');
    
    $todate = str_replace('/', '-', $to); 
    $todate = date_create($todate . ' 00:00:00');
    $todate = date_format($todate, 'Y-m-d');
    
//    $fromdate = date_create($from);
//    $fromdate = date_format($fromdate, "d-m-Y");
//    
//    $todate = date_create($to);
//    $todate = date_format($todate, "d-m-Y");
    
//    echo $todate;die;
    
    $where.=" AND ttq.tax_transaction_dt BETWEEN '$fromdate' AND '$todate' ";    
}
if(!empty($transactionNo)){
    $where .=" AND ttq.tax_challan_himgrn='$transactionNo' ";
}
if(!empty($mobileNo)){
    $where .=" AND tc.tax_depositors_phone='$mobileNo' ";
}
if(!empty($email)){
    $where .=" AND tc.tax_depositors_email='$email' ";
}
//echo $where;die;
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::verifyepayment($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);


