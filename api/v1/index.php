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
            verifyRequiredParams(array('challan_id', 'challan_title', 'depositors_name', 'depositors_phone', 'depositors_address','challan_location','challan_duration','challan_from_dt','challan_to_dt','challan_purpose','challan_amount','transaction_no','transaction_status','challan_status','type_code','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }
           // print_r($VARS);die;
            $params = array();            
            $params['tax_challan_id'] = $VARS['challan_id'];
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
            $res = $controller->addData($params,'tax_challan');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax challan inserted successfully", $data);
            }                    
            return array(false, "Tax challan process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET Tax challan****************************** */
/******************************************************************************************* */
$APP->get('get-tax-challan', false, function() use($APP) {
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
        
        
        
        
        
        
/* * ***************************************************************************************** */
/* * ************************************************insert data in tax_challan_item ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-challan-item', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('challan_item_id', 'type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','challan_id','commodity_id','type_code','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();            
            $params['tax_challan_item_id'] = $VARS['challan_item_id'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_vehicle_number'] = $VARS['vehicle_number'];           
            $params['tax_item_weight'] =$VARS['item_weight'];                 
            $params['tax_item_weight_units'] =$VARS['item_weight_units']; 
            $params['tax_item_quantity_units'] = $VARS['item_quantity_units'];
            $params['tax_item_source_location'] = $VARS['item_source_location'];
            $params['tax_item_destination_location'] = $VARS['item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['item_distanceinkm'];          
            $params['tax_item_tax_amount'] = $VARS['item_tax_amount'];
            $params['tax_item_status'] = $VARS['item_status'];
            $params['tax_challan_id'] = $VARS['challan_id'];            
            $params['tax_commodity_id'] = $VARS['commodity_id'];           
            $params['tax_type_code'] = $VARS['type_code'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_challan_item');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax challan item inserted successfully", $data);
            }                    
            return array(false, "Tax challan item process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET Tax challan item****************************** */
/******************************************************************************************* */
$APP->get('get-tax-challan-item', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_challan_item',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete Tax challan item****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-challan-item', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_challan_item',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update Tax challan Item************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-challan-item', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
            verifyRequiredParams(array('challan_item_id', 'type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','challan_id','commodity_id','type_code','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();            
            $params['tax_challan_item_id'] = $VARS['challan_item_id'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_vehicle_number'] = $VARS['vehicle_number'];           
            $params['tax_item_weight'] =$VARS['item_weight'];                 
            $params['tax_item_weight_units'] =$VARS['item_weight_units']; 
            $params['tax_item_quantity_units'] = $VARS['item_quantity_units'];
            $params['tax_item_source_location'] = $VARS['item_source_location'];
            $params['tax_item_destination_location'] = $VARS['item_destination_location'];
            $params['tax_item_distanceinkm'] =   $VARS['item_distanceinkm'];          
            $params['tax_item_tax_amount'] = $VARS['item_tax_amount'];
            $params['tax_item_status'] = $VARS['item_status'];
            $params['tax_challan_id'] = $VARS['challan_id'];            
            $params['tax_commodity_id'] = $VARS['commodity_id'];           
            $params['tax_type_code'] = $VARS['type_code'];
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                     
            return DEFAULT_PUT_METHOD('tax_challan_item',$params,$ID,false,"tax_challan_item_id");
        });  
        
        
        
        
        
        
        
                
/* * ***************************************************************************************** */
/* * ************************************************insert data in tax_commodity ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-commodity', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('commodity_id','commodity_name','commodity_description','commodity_rate','commodity_rate_unit','commodity_unit_measure','commodity_taxcalculation','commodity_isdistancedependent','commodity_status','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();            
            $params['tax_commodity_id'] = $VARS['commodity_id'];
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_commodity_description'] = $VARS['commodity_description'];
            $params['tax_commodity_rate'] = $VARS['commodity_rate'];           
            $params['tax_commodity_rate_unit'] =$VARS['commodity_rate_unit'];                 
            $params['tax_commodity_unit_measure'] =$VARS['commodity_unit_measure']; 
            $params['tax_commodity_taxcalculation'] = $VARS['commodity_taxcalculation'];
            $params['tax_commodity_isdistancedependent'] = $VARS['commodity_isdistancedependent'];
            $params['tax_commodity_status'] = $VARS['commodity_status'];
            $params['tax_type_id'] =   $VARS['type_id'];                  
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_commodity');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax commodity inserted successfully", $data);
            }                    
            return array(false, "Tax commodity process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET Tax commodity****************************** */
/******************************************************************************************* */
$APP->get('get-commodity', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_commodity',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete Tax commodity****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-commodity', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_commodity',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update Tax commodity************************************ */
/* * ****************************************************************************************** */
$APP->put('update-commodity', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
            verifyRequiredParams(array('commodity_name','commodity_description','commodity_rate','commodity_rate_unit','commodity_unit_measure','commodity_taxcalculation','commodity_isdistancedependent','commodity_status','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }            
           // print_r($VARS);die;
            $params = array();                        
            $params['tax_commodity_name'] = $VARS['commodity_name'];
            $params['tax_commodity_description'] = $VARS['commodity_description'];
            $params['tax_commodity_rate'] = $VARS['commodity_rate'];           
            $params['tax_commodity_rate_unit'] =$VARS['commodity_rate_unit'];                 
            $params['tax_commodity_unit_measure'] =$VARS['commodity_unit_measure']; 
            $params['tax_commodity_taxcalculation'] = $VARS['commodity_taxcalculation'];
            $params['tax_commodity_isdistancedependent'] = $VARS['commodity_isdistancedependent'];
            $params['tax_commodity_status'] = $VARS['commodity_status'];
            $params['tax_type_id'] =   $VARS['type_id'];                  
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                     
            return DEFAULT_PUT_METHOD('tax_commodity',$params,$ID,false,"tax_commodity_id");
        });   
        
        
        

/* * ***************************************************************************************** */
/* * ************************************************insert data in tax item queue ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-item-queue', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('item_queue_id','queue_session','type_name','commodity_name','vehicle_number','item_weight','item_weight_units','item_quantity','item_quantity_units','item_source_location','item_destination_location','item_distanceinkm','item_tax_amount','item_status','commodity_id','type_id','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
            $params['tax_item_queue_id'] = $VARS['item_queue_id'];
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
            $res = $controller->addData($params,'tax_item_queue');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax tax item queue inserted successfully", $data);
            }                    
            return array(false, "Tax tax item queue process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax item queue****************************** */
/******************************************************************************************* */
$APP->get('get-tax-item-queue', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_item_queue',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax item queue****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-item-queue', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_item_queue',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax item queue************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-item-queue', false, function() {
            $data = array();
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
            return DEFAULT_PUT_METHOD('tax_item_queue',$params,$ID,false,"tax_item_queue_id");
        });    
        
        
        

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
$APP->get('get-tax-master', false, function() use($APP) {
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
        
  
        
        
        
/* * ***************************************************************************************** */
/* * ************************************************insert data in  tax_type ****************************** */
/* * ***************************************************************************************** */
$APP->post('add-tax-type', false, function() use($APP) {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;
              
            $VARS=json_decode(file_get_contents("php://input"),true);
//                        
//            $APP->generateApiKey();
//             promocode();                        
            verifyRequiredParams(array('type_id','type_name','type_description','type_status','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
            $params['tax_type_id'] = $VARS['type_id'];
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_type_description'] = $VARS['type_description'];
            $params['tax_type_status'] = $VARS['type_status'];                                           
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                           
            $res = $controller->addData($params,'tax_type');              
            if($res==0 || !empty($res)){                
                return array(true, "Tax tax type inserted successfully", $data);
            }                    
            return array(false, "Tax tax type process failed", $data);
        }); 

/******************************************************************************************* */
/************************************GET tax_type****************************** */
/******************************************************************************************* */
$APP->get('get-tax-type', false, function() use($APP) {
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
            $result=$controller->getSingleRecordById('tax_type',$ID);
            if ($result) {
                $data['Result']=$result;
                return array(true, "Data Loaded successfully", $data);
            }
            return array(false, "No Record found", $data);
        });  
        
/* * ***************************************************************************************** */
/* * ************************************************Delete tax_type****************************** */
/* * ***************************************************************************************** */
$APP->delete('delete-tax-type', false, function() use($APP) {
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
            return DEFAULT_DELETE_METHOD('tax_type',$ID);
        });
        
/* * ****************************************************************************************** */
/* * ************************************Update tax_type************************************ */
/* * ****************************************************************************************** */
$APP->put('update-tax-type', false, function() {
            $data = array();
            global $USERID;
            global $controller;
            global $VARS;
            global $ID;            
            $VARS=json_decode(file_get_contents("php://input"),true);            
            issetID(); 
            
            verifyRequiredParams(array('type_name','type_description','type_status','created_by','modified_by', 'token', 'device'));
            if (!in_array($VARS['device'], array('iphone', 'android'))) {
                return array(false, "device name is invalid", $data);
            }                          
            // print_r($VARS);die;
            $params = array();            
           
            $params['tax_type_name'] = $VARS['type_name'];
            $params['tax_type_description'] = $VARS['type_description'];
            $params['tax_type_status'] = $VARS['type_status'];                                           
            $params['created_by'] =$VARS['created_by'];  
            $params['modified_by'] = $VARS['modified_by'];                        
            return DEFAULT_PUT_METHOD('tax_type',$params,$ID,false,"tax_type_id");
        });     
        
        
        
       
        
        
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