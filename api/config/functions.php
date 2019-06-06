<?php

function token($email) {
    return sha1(mt_rand(10000, 99999) . time() . $email);
}


function dateFormatterMysql($old_date) {
    //echo $old_date;
    $date = date_create($old_date);
    //echo "<pre>1=-".$old_date." ";print_r($date);
    $new_date = date_format($date, "Y-m-d");
    return $new_date;
}

?>