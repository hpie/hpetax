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
$table = 'tax_dealer';

// Table's primary key
$primaryKey = 'tax_dealer_id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'tax_dealer_id', 'dt' =>'tax_dealer_id'),
    array('db' => 'tax_dealer_name', 'dt' => 'tax_dealer_name'),
    array('db' => 'tax_dealer_code', 'dt' =>'tax_dealer_code'),
    array('db' => 'tax_dealer_tin', 'dt' =>'tax_dealer_tin'),
    array('db' => 'tax_dealer_tin_expiry', 'dt' =>'tax_dealer_tin_expiry'),
    array('db' => 'tax_dealer_mobile', 'dt' =>'tax_dealer_mobile'),
    array('db' => 'tax_delaer_status', 'dt' =>'tax_delaer_status')
);
include 'conn.php';
//// SQL server connection information
//$sql_details = array(
//    'user' => 'root',
//    'pass' => '',
//    'db' => 'rmsa',
//    'host' => 'localhost'
//);
$where =" tax_dealer_code!='' AND tax_dealer_password!='' "; 
if(!empty($_REQUEST['search']['value'])){
    $value=$_REQUEST['search']['value'];
    $where.=" AND (tax_dealer_name LIKE '%$value%' OR tax_dealer_code LIKE '%$value%' OR tax_dealer_tin LIKE '%$value%' OR tax_dealer_tin_expiry LIKE '%$value%') ";
}
//echo $where;die;

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require( 'ssp.class.php' );
echo json_encode(
    SSP::simple($_REQUEST, $sql_details, $table, $primaryKey, $columns,$where)
);


