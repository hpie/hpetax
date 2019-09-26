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
//function sendSMS_Client($mobile, $message) {
//    $ch = curl_init();
//    $message=$message;
//    $quotes=QUOTES;
//    $encoded_message = urlencode($message);
//    $encoded_quotes = urlencode($quotes);
//    $url = "sms.skylinepro.in/smsapi.aspx?username=Codexives&password=jeny7001&sender=CDXIVS&to=" . $mobile . "&message=" . $encoded_message ."%0a".$encoded_quotes. "&route=route3";
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_URL, $url);
//    $result=curl_exec($ch);
//    $res=curl_close($ch);
//     return true;
//}
//function sendSMS_Schedule($message) {
//    $mobile=9099384773;
//    $ch = curl_init();     
//    $encoded_message = urlencode($message);   
//    $datetime= urldecode('2018-03-23 09:30:01');
//    $url = "sms.skylinepro.in/SendScheduleTextMessage.aspx?username=Codexives&password=jeny7001&route=route3&sender=CDXIVS&message=$encoded_message&messagetype=TEXTSMS&mobileno=$mobile&datetime=$datetime";
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_URL, $url);
//    $res=curl_exec($ch);
//    curl_close($ch);
//     return true;
//}
//function sendSMS_Admin($message) {
//    $ch = curl_init();
//    $encoded_message = urlencode($message);
//    $url = "sms.skylinepro.in/GroupMessageSend.aspx?username=Codexives&password=jeny7001&groupNo=22358&route=route3&sender=CDXIVS&message=" . $encoded_message . "&messagetype=TEXTSMS";
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_URL, $url);
//    $a = curl_exec($ch);
//    curl_close($ch);   
//     return true;
//}
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
?>