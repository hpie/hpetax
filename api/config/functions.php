<?php

//**********************************************************************//
//***********************Generate referral Code************************//
//********************************************************************//
function promocode() {
    $characters = 'ACEFHJKMNPRTUVWXY4937';
    $string = '';
    for ($i = 0; $i < 6; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
}

function ratingAverage($array, $field) {
    $total = 0;
    $i = 0;
    foreach ($array as $row) {
        $total = $total + $row[$field];
        $i = $i + 1;
    }
    $averageRating = $total / $i;
    return $averageRating;
}

function token($email) {
    return sha1(mt_rand(10000, 99999) . time() . $email);
}

?>