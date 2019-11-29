<?php

function token($email) {
    return sha1(mt_rand(10000, 99999) . time() . $email);
}
function subId() {
    return mt_rand(10000, 99999);
}
function dateFormatterMysql($old_date) {    
    $date =date_create($old_date);
    $new_date = date_format($date, "Y-m-d");
    return $new_date;
}
?>