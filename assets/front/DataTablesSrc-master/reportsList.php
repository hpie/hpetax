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
    array('db' => 'ttq.tax_challan_id', 'dt' =>'tax_challan_id') ,
    array('db' => 'tc.tax_type_id', 'dt' =>'tax_type_id') 
);
include 'conn.php';


$status=$_REQUEST['status'];
if($status=="ALL"){
    $statusArray=array('SUCCESS','FAILURE','PENDING');
}else{
    $statusArray[0]=$status;
} 
$status = join("','",$statusArray); 

$where =" ttq.tax_transaction_status IN('$status') ";


$year=$_REQUEST['year'];
$month=$_REQUEST['month'];
$taxtype=$_REQUEST['taxtype'];
$searchFromToDate=$_REQUEST['searchFromToDate'];
//$uploaded_file_tag=$_REQUEST['uploaded_file_tag'];
//
//
if(!empty($year)){
    $year2=$year+1;
    $where.=" AND ttq.tax_transaction_dt BETWEEN '$year-04-01' AND '$year2-03-31' ";    
}
if(!empty($month)){
    $monthrArray=explode('-', $month);  
    $month=$monthrArray[0];
    $year=$monthrArray[1];
    $where.=" AND month(ttq.tax_transaction_dt) = '$month' AND year(ttq.tax_transaction_dt) = '$year' ";    
}
if(!empty($taxtype)){    
    $where.=" AND tc.tax_type_id = '$taxtype'";    
}
if(!empty($searchFromToDate)){ 
    $searchFromToDate=explode('To', $searchFromToDate);
    $from=$searchFromToDate[0];
    $to=$searchFromToDate[1];
    $where.=" AND ttq.tax_transaction_dt BETWEEN '$from' AND '$to' ";     
}
//else{
//    $where =" uploaded_file_status='ACTIVE' AND uploaded_file_category = '$uploaded_file_category' AND uploaded_file_tag LIKE '%$uploaded_file_tag%' ";
//}




//if(!empty($_REQUEST['search']['value'])){
//    $value=$_REQUEST['search']['value'];
//    $where.=" tax_transaction_dept LIKE '%$value%' OR tax_AppRefNo LIKE '%$value%' OR tax_payment_dt LIKE '%$value%' OR tax_payment_bank LIKE '%$value%' ";
//}



//echo $where;die;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::reportsList($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);


