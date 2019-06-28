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
/* * ************************************************insert data in  tax_master ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-master', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('master_id','transaction_head','transaction_dept','transaction_ddo','master_status','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
            $params['tax_master_id'] = $VARS['master_id'];
            $params['tax_transaction_head'] = $VARS['transaction_head'];
            $params['tax_transaction_dept'] = $VARS['transaction_dept'];
            $params['tax_transaction_ddo'] = $VARS['transaction_ddo'];           
            $params['tax_master_status'] =$VARS['master_status'];                            
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_master');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax tax master inserted successfully", $data);
            }                    
            return array(false, "Tax tax master process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax_master****************************** */
/******************************************************************************************* */
$APP->post('get-tax-master', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_master',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax_master****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-master', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_master',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax_master************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-master', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
            verifyRequiredParams(array('transaction_head','transaction_dept','transaction_ddo','master_status','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();                       
            $params['tax_transaction_head'] = $VARS['transaction_head'];
            $params['tax_transaction_dept'] = $VARS['transaction_dept'];
            $params['tax_transaction_ddo'] = $VARS['transaction_ddo'];           
            $params['tax_master_status'] =$VARS['master_status'];                            
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                          
            return DEFAULT_PUT_METHOD('tax_master',$params,$ID,false,"tax_master_id");
        });                                    
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>