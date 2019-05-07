<?php

/*
 * ---------------------------------------------------------------
 * System initialization
 * ---------------------------------------------------------------
 */

include_once("../config/init.php");
//echo 1;die;
/* * *******
 * * Configure to use all the function from system 
 * * (1) REQUESTED action method name
 * * (2) Function name
 * * (3) use($APP) you can use to access data from my_base
 * * global $USERID;
 * * global $controller;
 * * global $VARS;
 * * global $ID;
 * * X-Authorization
 * ******* */

/* ################################# START REST API FROM HERE ############################ */




/* * ***************************************************************************************** */
/* * ************************************************insert data in hpet_tax_challan ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-challan', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
//            $APP->generateApiKey();
//             promocode();
            
            
            verifyRequiredParams(array('code', 'title', 'depositors_name', 'depositors_phone', 'depositors_address','challan_location','challan_duration','challan_from_dt','challan_to_dt','challan_purpose','challan_amount','transaction_no','transaction_status','challan_status','type_code','created_by','modified_by'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }
            $params = array();
            $params['tax_challan_code'] = $VARS['code'];
            $params['tax_challan_title'] = $VARS['title'];
            $params['tax_challan_name'] = $VARS['depositors_name'];
            $params['tax_depositors_phone'] = $VARS['depositors_phone'];           
            $params['tax_depositors_address'] =       $VARS['depositors_address'];                 
            $params['tax_challan_location'] =$VARS['challan_location']; 
            $params['tax_challan_duration'] = $VARS['challan_duration'];
            $params['tax_challan_from_dt'] = $VARS['challan_from_dt'];
            $params['tax_challan_to_dt'] = $VARS['challan_to_dt'];
            $params['tax_challan_purpose'] =   $VARS['challan_purpose'];          
            $params['tax_challan_amount'] = $VARS['challan_amount'];
            $params['tax_transaction_no'] = $VARS['transaction_no'];
            $params['tax_challan_status'] = $VARS['challan_status'];            
            $params['tax_transaction_status'] = $VARS['transaction_status'];           
            $params['tax_type_code'] = $VARS['type_code'];
            $params['created_by'] =       $VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];           

            $res = $controller->addData($params);
                if ($res) {
                    $userprofile= $controller->getUserProfile($user);
                    $email = $userprofile['user_email'];
                    $name = $userprofile['user_name'];
                    $params = array();
                    $params['refUser_id'] = $userprofile['user_id'];
                    $params['token_url'] = token($email);
                    $controller->tokenInsert($params);
//                    $smtp = new SMTP_mail();
//                $mail_res = $smtp->send_email_Confirmation($email, $params['token_url'], $name);   
                 //echo"<prE>";print_r($mail_res);die;
                    $data['Result'] = $controller->getUserProfile($user);
                    return array(true, "Registration successfully", $data);
                }
            
            return array(false, "Registration failed", $data);
        });       
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>