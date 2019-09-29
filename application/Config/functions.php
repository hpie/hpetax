<?php
function accountnumber($userid){
    $length=strlen($userid);
    $str='';   
    for($i=$length;$i<10;$i++){
        $str=$str.'0';
    }
    $str=$str.$userid;
    return $str;
}
function addYearInDate($date,$year){   
    $date=date('Y-m-d', strtotime($date .'+'.$year.' years'));
    return $date;
}
function dbDatetime($prefix) {
    $_POST[$prefix . '_datetime'] = date('Y-m-d H:i:s');
    $_POST[$prefix . '_date'] = date('Y-m-d');
    return $_POST;
}
function dbImage($Image) {
    $image = singleImageUpload($Image);           
    if (($_FILES[$Image]['name']) != '') {
            $str = $image[2]['image_name'];
            $_POST[$Image] = $str;             
        }       
    return $_POST;
}
function dateFormatter($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "d-m-Y");
    return $new_date;
}
function returnMonth($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "m");
    return $new_date;
}
function returnYear($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "Y");
    return $new_date;
}
function dateFormatterComma($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "m,d,Y");
    return $new_date;
}
function dateFormatterMysql($old_date) {
//    echo $old_date;die;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);    
    $new_date = date_format (new DateTime($date), "Y-m-d");
//    echo $new_date;die;
    return $new_date;
}
function datetimeFormatter($old_date) {
    $date = date_create($old_date);
    $convert_date = date_format($date, "d/m/Y H:i");
    $new_date = $convert_date;
    return $new_date;
}
function unixTimestampToDT($timestamp) {
    $timestamp = $timestamp * 0.001;
    $new_date = date('d/m/Y H:i', $timestamp);
    return $new_date;
}

function unixTimestampToD($timestamp) {
    $timestamp = $timestamp * 0.001;
    $new_date = date('d/m/Y', $timestamp);
    return $new_date;
}
function datetimeFormatterC($old_date) {

    $date = date_create($old_date);
    $new_date = date_format($date, 'j M, H:i A');
    return $new_date;
}
function set_selected($desired_value, $new_value) {
    if ($desired_value == $new_value) {
        echo ' selected="selected"';
    }
}

function returnSingleImage($imgArray,$field) {
    $arr = array();
    $img_field=$field.'_image';
    if (!empty($imgArray)) {
        foreach ($imgArray as $row) {
            $image = explode(',', $row[$img_field]);
            $row['product_image'] = $image[0];
            array_push($arr, $row);
        }
    }
    return $arr;
}
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
?>