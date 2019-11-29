<?php
/*
 * ---------------------------------------------------------------
 * System initialization
 * ---------------------------------------------------------------
 */

include_once("../config/init.php");

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
/* * ************************************************insert data in tax_challan ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-challan', false, function() use($APP) {   
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('challan_id','tax_dealer_id', 'challan_title', 'depositors_name', 'depositors_phone','depositors_city','depositors_zip', 'depositors_address','challan_location','challan_duration','challan_from_dt','challan_to_dt','challan_purpose','challan_amount','transaction_no','transaction_status','challan_status','type_code','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }
//            print_r($VARS);die;
            $params = array();           
            $params['tax_challan_id'] = $VARS['challan_id'];
            $params['tax_dealer_id']=$VARS['tax_dealer_id'];
            $params['tax_challan_title'] = $VARS['challan_title'];
            $params['tax_depositors_name'] = $VARS['depositors_name'];
            $params['tax_depositors_phone'] = $VARS['depositors_phone'];   
            $params['tax_depositors_city'] = $VARS['depositors_city'];
            $params['tax_depositors_zip'] = $VARS['depositors_zip'];
            $params['tax_depositors_address'] =$VARS['depositors_address'];                 
            $params['tax_challan_location'] =$VARS['challan_location']; 
            $params['tax_challan_duration'] = $VARS['challan_duration'];
            $params['tax_challan_from_dt'] = dateFormatterMysql($VARS['challan_from_dt']);
            $params['tax_challan_to_dt'] = dateFormatterMysql($VARS['challan_to_dt']);
            $params['tax_challan_purpose'] =   $VARS['challan_purpose'];          
            $params['tax_challan_amount'] = $VARS['challan_amount'];
            $params['tax_transaction_no'] = $VARS['transaction_no'];
            $params['tax_challan_status'] = $VARS['challan_status'];            
            $params['tax_transaction_status'] = $VARS['transaction_status'];           
            $params['tax_type_id'] = $VARS['type_code'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_challan');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax challan inserted successfully", $data);
            }                    
            return array(false, "Tax challan process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET Tax challan****************************** */
/******************************************************************************************* */
$APP->post('get-tax-challan', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID();            
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                                  
            $result=$controller->getSingleRecordById('tax_challan',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete Tax challan****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-challan', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);
            
            issetID();
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            } 
            return DEFAULT_DELETE_METHOD('tax_challan',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update Tax challan************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-challan', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID();             
            verifyRequiredParams(array('challan_title', 'depositors_name', 'depositors_phone', 'depositors_address','challan_location','challan_duration','challan_from_dt','challan_to_dt','challan_purpose','challan_amount','transaction_no','transaction_status','challan_status','type_code','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }
            $params = array();                        
            $params['tax_challan_title'] = $VARS['challan_title'];
            $params['tax_depositors_name'] = $VARS['depositors_name'];
            $params['tax_depositors_phone'] = $VARS['depositors_phone'];           
            $params['tax_depositors_address'] =$VARS['depositors_address'];                 
            $params['tax_challan_location'] =$VARS['challan_location']; 
            $params['tax_challan_duration'] = $VARS['challan_duration'];
            $params['tax_challan_from_dt'] = $VARS['challan_from_dt'];
            $params['tax_challan_to_dt'] = $VARS['challan_to_dt'];
            $params['tax_challan_purpose'] =   $VARS['challan_purpose'];          
            $params['tax_challan_amount'] = $VARS['challan_amount'];
            $params['tax_transaction_no'] = $VARS['transaction_no'];
            $params['tax_challan_status'] = $VARS['challan_status'];            
            $params['tax_transaction_status'] = $VARS['transaction_status'];           
            $params['tax_type_id'] = $VARS['type_code'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                      
            return DEFAULT_PUT_METHOD('tax_challan',$params,$ID,false,"tax_challan_id");
        });  
               
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>