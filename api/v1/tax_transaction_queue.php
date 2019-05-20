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
/* * ************************************************insert data in tax_transaction_queue ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-transaction-queue', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('transaction_queue_id','transaction_dt','transaction_dept','transaction_ddo','transaction_head','payment_dt','payment_bank','payment_amount','transaction_status','challan_cin','challan_brn','challan_himgrn','challan_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
            $params['tax_transaction_queue_id'] = $VARS['transaction_queue_id'];
            $params['tax_transaction_dt'] = $VARS['transaction_dt'];
            $params['tax_transaction_dept'] = $VARS['transaction_dept'];
            $params['tax_transaction_ddo'] = $VARS['transaction_ddo'];                                                       
            $params['tax_transaction_head'] =$VARS['transaction_head']; 
            $params['tax_payment_dt'] =$VARS['payment_dt']; 
            $params['tax_payment_bank'] =$VARS['payment_bank']; 
            $params['tax_payment_amount'] =$VARS['payment_amount']; 
            $params['tax_transaction_status'] =$VARS['transaction_status']; 
            $params['tax_challan_cin'] =$VARS['challan_cin']; 
            $params['tax_challan_brn'] =$VARS['challan_brn']; 
            $params['tax_challan_himgrn'] =$VARS['challan_himgrn']; 
            $params['tax_challan_id'] =$VARS['challan_id'];                         
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_transaction_queue');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax tax type inserted successfully", $data);
            }                    
            return array(false, "Tax tax type process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax_transaction_queue****************************** */
/******************************************************************************************* */
$APP->get('get-tax-transaction-queue', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_transaction_queue',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax_transaction_queue****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-transaction-queue', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_transaction_queue',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax_transaction_queue************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-transaction-queue', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
           verifyRequiredParams(array('transaction_dt','transaction_dept','transaction_ddo','transaction_head','payment_dt','payment_bank','payment_amount','transaction_status','challan_cin','challan_brn','challan_himgrn','challan_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();                        
            $params['tax_transaction_dt'] = $VARS['transaction_dt'];
            $params['tax_transaction_dept'] = $VARS['transaction_dept'];
            $params['tax_transaction_ddo'] = $VARS['transaction_ddo'];                                                       
            $params['tax_transaction_head'] =$VARS['transaction_head']; 
            $params['tax_payment_dt'] =$VARS['payment_dt']; 
            $params['tax_payment_bank'] =$VARS['payment_bank']; 
            $params['tax_payment_amount'] =$VARS['payment_amount']; 
            $params['tax_transaction_status'] =$VARS['transaction_status']; 
            $params['tax_challan_cin'] =$VARS['challan_cin']; 
            $params['tax_challan_brn'] =$VARS['challan_brn']; 
            $params['tax_challan_himgrn'] =$VARS['challan_himgrn']; 
            $params['tax_challan_id'] =$VARS['challan_id'];                         
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                       
            return DEFAULT_PUT_METHOD('tax_transaction_queue',$params,$ID,false,"tax_transaction_queue_id");
        });         
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>