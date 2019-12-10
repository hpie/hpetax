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
/* * ************************************************insert data in tax item queue ****************************** */
/* * ***************************************************************************************** */
$APP->post('register-dealer', false, function() use($APP) {
                $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('tax_dealer_password', 'tax_dealer_tin', 'tax_dealer_tin_expiry', 'tax_dealer_mobile', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            
            $result=$controller->getSingleRecordByparameter('tax_dealer', $VARS['tax_dealer_email'], 'tax_dealer_email');
            if ($result) {
                $data['Result']=$result;
                return array(false, "Dealer with email already exists", $data);
            }
        
            
            $params = array();           
            $params['tax_dealer_id']        = $VARS['tax_dealer_id']; 
            $params['tax_dealer_name']        = $VARS['tax_dealer_name'];
            $params['tax_dealer_code']      = $VARS['tax_dealer_code'];
            $params['tax_dealer_password']  = md5($VARS['tax_dealer_password']);
            $params['tax_dealer_tin'] = $VARS['tax_dealer_tin'];
            $params['tax_dealer_tin_expiry'] = $VARS['tax_dealer_tin_expiry'];           
            $params['tax_dealer_mobile'] =$VARS['tax_dealer_mobile'];                 
            $params['tax_dealer_pan'] =$VARS['tax_dealer_pan']; 
            $params['tax_dealer_aadhar'] = $VARS['tax_dealer_aadhar'];
            $params['tax_dealer_security_q'] = $VARS['tax_dealer_security_q'];
            $params['tax_dealer_security_a'] = $VARS['tax_dealer_security_a'];
            $params['tax_dealer_email'] =   $VARS['tax_dealer_email'];            
            $params['tax_dealer_lastlogin'] =   $VARS['tax_dealer_lastlogin'];
            $params['tax_delaer_status'] =   $VARS['tax_delaer_status'];
            $params['created_by'] =   $VARS['created_by'];
            //$params['created_dt'] =   $VARS['created_dt'];
            $params['modified_by'] =   $VARS['modified_by'];
            $params['modified_dt'] =   $VARS['modified_dt'];                       
            $res = $controller->addData($params,'tax_dealer');           
            
            if(!empty($res)){  
                //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                
                if ($res['success'] == 1) { 
                    //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                    return array(true, "Dealer Registration Successful", $data);
                } else if ($res['success'] == 0) { 
                    //echo "in else if "; exit;
                    return array(false, $res['response'], $data);
                }
                
            }    
            //echo "=========in else===>>>>>>>>> <pre>"; print_r($res); exit;
            return array(false, "Dealer registration failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax item queue****************************** */
/******************************************************************************************* */
$APP->post('get-tax-item-queue', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_item_queue_suresh',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax item queue****************************** */
/* * ***************************************************************************************** */
$APP->post('delete-tax-item-queue', false, function() use($APP) {
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
            //return DEFAULT_DELETE_METHOD('tax_item_queue_suresh',$ID, 'tax_item_id');
            $data = array('tax_item_id' => $ID);
            
           // return array(false, "No Record found", $data);
            
            $result=$controller->deleteSingleRecordById('tax_item_queue_suresh',$ID, 'tax_item_id');
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data deleted successfully", $data);
            }
            return array(false, "No Record found", $data);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax item queue************************************ */
/* * ****************************************************************************************** */
$APP->post('update-tax-item-queue', false, function() {
            $data = array();
            //return array(false, "Tax tax item queue process failed", $data);
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
        
            
       verifyRequiredParams(array('queue_session','type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','commodity_id','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
           // print_r($VARS);die;
            $params = array();  
            $params['tax_item_id'] = $VARS['tax_item_id'];
            $params['tax_item_queue_id'] = $VARS['tax_item_queue_id'];
            
            $params['tax_queue_session'] = $VARS['queue_session'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];           
            $params['tax_vehicle_number'] =$VARS['vehicle_number'];                 
            $params['tax_item_weight'] =$VARS['item_weight']; 
            $params['tax_item_weight_units'] = $VARS['item_weight_units'];
            $params['tax_item_quantity'] = $VARS['item_quantity'];
            $params['tax_item_quantity_units'] = $VARS['item_quantity_units'];
            $params['tax_item_source_location'] =   $VARS['item_source_location'];            
            $params['tax_item_destination_location'] =   $VARS['item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['item_distanceinkm'];
            $params['tax_item_tax_amount'] =   $VARS['item_tax_amount'];
            $params['tax_item_status'] =   $VARS['item_status'];
            $params['tax_commodity_id'] =   $VARS['commodity_id'];
            $params['tax_type_id'] =   $VARS['type_id'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                      
            //return DEFAULT_PUT_METHOD('tax_item_queue_suresh',$params,$ID,false,"tax_item_id");
            
            $res = $controller->updateData($params,'tax_item_queue_suresh', 'tax_item_id', $ID);            
            
            if(!empty($res)){  
                //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                
                if ($res['success'] == 1) { 
                    //echo "============in if>>>>>>>>> <pre>"; print_r($res); exit;
                    return array(true, "Tax item queue updated successfully", $data);
                } else if ($res['success'] == 0) { 
                    //echo "in else if "; exit;
                    return array(false, $res['response'], $data);
                }
                
            }    
            //echo "=========in else===>>>>>>>>> <pre>"; print_r($res); exit;
            return array(false, "Tax tax item queue process failed", $data);
        }); 
        
        /******************************************************************************************* */
/************************************GET all tax item queue****************************** */
/******************************************************************************************* */
$APP->post('list-tax-item-queue', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);
            
            //issetID();            
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                                  
            $result=$controller->getTaxQueueList('tax_item_queue_suresh', $VARS['queue_session']);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });
        
$APP->post('get-challan-data', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
            
            $VARS=json_decode(file_get_contents("php://input"),true);
            
            //issetID();            
            verifyRequiredParams(array('token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                                  
            $result=$controller->getChallanData('tax_item_queue_suresh', $VARS['queue_session']);
            if ($result) {
                
                
                $result[0]["challan_purpose"] = "Default Purpose";
                $result[0]["challan_code"] = "Default Code";
                
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });
$APP->stop();
/* * *******
 * * finish all the function working
 * ***** */
?>