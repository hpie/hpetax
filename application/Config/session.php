<?php
/*
 * ---------------------------------------------------------------
 * Functions Intialization
 * ---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
function getLanguage() {
    if (!isset($_SESSION['SYSTEM_LANGUAGE'])) {
        $_SESSION['SYSTEM_LANGUAGE'] = DEFAULT_LANG;                
    }
    return $_SESSION['SYSTEM_LANGUAGE'];
}
function setLanguage($lang) {
    $_SESSION['SYSTEM_LANGUAGE'] = $lang;
}

function sessionCheck() {
    if (!isset($_SESSION['adminDetails']['admin_user_id'])) {
        redirect(LOGIN);
        return false;
    }
    return true;
}
function sessionCheckDealer() {
    if (!isset($_SESSION['dealerDetails']['tax_dealer_id'])) {
        redirect(FRONT_LOGIN_DEALER_LINK);
        return false;
    }
    return true;
}
function sessionCheckEmployee() {
    if (!isset($_SESSION['employeeDetails']['tax_employee_id'])) {
        redirect(FRONT_LOGIN_EMPLOYEE_LINK);
        return false;
    }
    return true;
}
function sessionDestroy() {
    session_regenerate_id();        
    session_destroy();
}
function sessionAdmin($row) {
    session_regenerate_id();        
    $_SESSION['adminDetails']=$row;
    $_SESSION['user_id']=$row['admin_user_id'];
    $_SESSION['usertype']='admin_token';
    $_SESSION['user_time'] = time();
}
function sessionDealer($row) {
    session_regenerate_id();        
    $_SESSION['dealerDetails']=$row;
    $_SESSION['user_id']=$row['tax_dealer_id'];
    $_SESSION['usertype']='dealer_token';
    $_SESSION['user_time'] = time();
}
function sessionEmployee($row) {
    session_regenerate_id();        
    $_SESSION['employeeDetails']=$row;
    $_SESSION['user_id']=$row['tax_employee_id'];
    $_SESSION['usertype']='employee_token';
    $_SESSION['user_time'] = time();
}
function get_AdminName($name) {
    if (isset($_SESSION['adminDetails'][$name])) {
        $name = $_SESSION['adminDetails'][$name];
        return $name;
    }
    return FALSE;
}
?>